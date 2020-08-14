<?php

class Signup
{
    //declare variables
    public $table;
    public $userid;
    public $email;
    public $password;
    public $confirm;
    public $subject;
    public $to;
    public $from;
    public $list = [];

    public function create($table, $firstname, $url, $redirectUrl, $subject, $from, $password, $confirm, $email, $list)
    {
        //connect to mysqli database
        include "../config/config.php";
        //check if email already exists
        $sql = "SELECT * FROM " . $table . " WHERE `email` = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        //if email already exists output a message in a session
        if ($stmt->num_rows() > 0) {
            $stmt->close();
            $_SESSION['error'] = "Email already exists!";
            header("location:$redirectUrl");
        } elseif ($password != $confirm) {              //check if password
            $_SESSION['error'] = "Password mismatch!";
            header("location:$redirectUrl"); //is same as re-enter password
        } elseif(strlen($confirm < 6)){ //ensure password length is min 6 length
            $_SESSION['error'] = "Invalid password!";
            header("location:$redirectUrl"); 
            $stmt->close();             
        }else {
            $stmt->close();
            //if all goes well
            $sql = "INSERT IGNORE INTO " . $table . " (userId,email,password,firstname,lastname,dob,sex,phone) VALUES(";
            foreach ($list as $l) {                            //insert into 
                $values[] = "'$l'";                       //database
            }
            $sql .= implode(', ', $values);
            $sql .= ")";
            $stmt = $mysqli->prepare($sql);
            $stmt->execute();
            $stmt->store_result();
            //if insert works send an email to user and update registered status to 1
            if ($stmt->affected_rows > 0) {
                $stmt->close();
                $registered = 1;
                $loggedin = 1;
                $sql = "UPDATE " . $table . " SET `registered` = ? WHERE `email` = ? AND `password` = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param('iss', $registered, $email, $password);
                $stmt->execute();
                if($stmt){
                    $stmt->close();
                    $sql = "SELECT * FROM " . $table . " WHERE `email` = ? AND `password` = ?";
                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param('ss', $email, $password);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                }
                $verify = sha1(time());
                $id = $row['userId'];
                $mail = $row['email'];
                $pwd = $row['password'];
                $fname = $row['firstname'];
                $lname = $row['lastname'];
                $mobile = $row['phone'];
                $log = $row['loggedin'];
                $reg = $row['registered'];
                $message = "<p style='text-align: center;'><img src='{$directory}assets/images/logo.png' style='width:120px; height: 30px;'></p>";
                $message .= "<p style='text-align: center;'><strong>Welcome to LikesFora, " . $firstname . "</strong></p>";
                $message .= "<p style='text-align: center;'> Please, click the button below to confirm your email. </p>";
                $message .= "<p style='text-align: center;'><a href='$url?action=confirm&verify=$verify' style='position: static; margin-left: auto; margin-right: auto; display: block; width: 180px; height: 80px; background-color: #4e80ca; color: #fff; border-radius: 5px; font-size: 22px; text-decoration: none; text-align: center; line-height: 80px; font-weight: bold;'>Confirm</a></p><p style='text-align:center;'>OR</p>";
                $message .= "<p style='text-align: center;'><a href='$url?action=confirm&verify=$verify'>" . $url . "/" . $verify . "</a></p>";
                $message .= "<p></p>";
                $message .= "<p style='font-size: 20px; text-decoration: underline; text-align: center;'>Disclaimer</p>";
                $message .= "<p style='font-size: 12px; color: #3f444a;'>This message has been sent as a part of discussion between you and the addressee whose name is specified above. Should you receive this message by mistake, we would be most grateful if you informed us that the message has been sent to you. In this case, we also ask that you delete this message from your mailbox, and do not forward it or any part of it to anyone else. Thank you for your cooperation and understanding.</p>";
                $message = wordwrap($message, 70);
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: <" . $from . ">" . "\r\n";
                //if mail is sent, output a message in a session
                if (mail($email, $subject, $message, $headers)) {
                    $_SESSION['success'] = "Sign up successful: A message has been sent to you to verify your email account.";
                    $_SESSION['verify'] = $verify;
                    $_SESSION['userid'] = $id;
                    $_SESSION['email'] = $mail;
                    $_SESSION['password'] = $pwd;
                    $_SESSION['firstname'] = $fname;
                    $_SESSION['lastname'] = $lname;
                    $_SESSION['username'] = $uname;
                    $_SESSION['phone'] = $mobile;
                    $_SESSION['loggedin'] = $log;
                    $_SESSION['registered'] = $reg;
                    header("location:$redirectUrl");
                    $stmt->close();
                } else {
                    echo "error: email failed!";
                }
            } else {
                echo "error: insertion failed!";
            }
        }
    }
}