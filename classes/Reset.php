<?php

class Reset
{
    //declare parameters
    public $subject;
    public $message;
    public $from;
    public $url;
    public $token;
    public $table;
    public $email;
    public $password;

    public function sendMail($table, $subject, $url, $redirectSelf, $from, $email)
    {
        //connect to mysql server 
        include "../config/config.php";
        //check if email sent exist before adding url token to database
        $sql = "SELECT * FROM " . $table . " WHERE `email` = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows() > 0) {
            $stmt->close();
            //create a string token and store in a session
            $sql = "SELECT * FROM " . $table . " WHERE `email` = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $token = bin2hex(random_bytes(32));
            $_SESSION['email_token'] = $token;
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            //create email credentials
            $url = $url . "?action=reset&email_token=" . $token;
            $message = "<p style='text-align: center;'><img src='{$directory}assets/images/logo.png' style='width:120px; height: 30px;'></p>";
            $message .= "<p style='text-align: center;'><strong>Hello,</strong></p>";
            $message .= "<p style='text-align: center;'> Please, click the button below to reset your password. </p>";
            $message .= "<p style='text-align: center;'><a href='$url' style='position: static; margin-left: auto; margin-right: auto; display: block; width: 180px; height: 80px; background-color: #4e80ca; color: #fff; border-radius: 5px; font-size: 22px; text-decoration: none; text-align: center; line-height: 80px; font-weight: bold;'>Reset</a></p><p style='text-align:center;'>OR</p>";
            $message .= "<p style='text-align: center;'><a href='$url'>Reset your password here</a></p>";
            $message .= "<p></p>";
            $message .= "<p style='font-size: 20px; text-decoration: underline; text-align: center;'>Disclaimer</p>";
            $message .= "<p style='font-size: 12px; color: #3f444a;'>This message has been sent as a part of discussion between you and the addressee whose name is specified above. Should you receive this message by mistake, we would be most grateful if you informed us that the message has been sent to you. In this case, we also ask that you delete this message from your mailbox, and do not forward it or any part of it to anyone else. Thank you for your cooperation and understanding.</p>";
            $message = wordwrap($message, 70);
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: <" . $from . ">" . "\r\n";
            if (mail($email, $subject, $message, $headers)) {
                $_SESSION['success'] = "A message has been sent to your email.";
                $stmt->close();
                header("location:$redirectSelf");
            } else {
                echo "error sending email";
            }
        } else {
            $_SESSION['error'] = "Email does not exist!";
            $stmt->close();
        }
    }

    public function update($table, $email, $oldpassword, $password, $confirm, $url, $redirectSelf)
    {
        //load file for mysqli connection to database
        include "../config/config.php";
        if ($password != $confirm) {
            $_SESSION['error'] = "Password mismatch!";
            header("location:$redirectSelf");
            exit;
        } elseif ($oldpassword == $password) {
            $_SESSION['error'] = "Password already exists! Choose another.";
            header("location:$redirectSelf");
            exit;
        } elseif ($password = "") {
            $_SESSION['error'] = "Password field cannot be empty!";
            header("location:$redirectSelf");
            exit;
        } else {
            //check if password to be reset already exist
            $sql = "SELECT * FROM " . $table . " WHERE `email` = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows() > 0) {
                $stmt->close();
                //update the table with the password and email sent
                $sql = "UPDATE " . $table . " SET `password` = ? WHERE `email` = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param('ss', $confirm, $email);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt) {
                    $_SESSION['success'] = "Password reset is successful. Please login.";
                    if (isset($_SESSION['loggedin'])) {
                        $loggedin = $_SESSION['loggedin'];
                    }
                    if ($loggedin != 1) {
                        header("location:$url");
                    }
                } else {
                    echo "Password update failed!";
                }
            } else {
                echo "password field is empty!";
            }
        }
    }
}
