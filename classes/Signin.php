<?php

class Signin
{
    public $email;
    public $password;
    public $table;
    public $url;

    public function login($table, $email, $password, $url, $redirectToSelf)
    {

        //connect to mysql database server
        include "../config/config.php";
        //check if email and password exist in database
        $sql = "SELECT * FROM " . $table . " WHERE `email` = ? AND `password` = ?";
        $stmp = $mysqli->prepare($sql);
        $stmp->bind_param('ss', $email, $password);
        $stmp->execute();
        $stmp->store_result();

        if ($stmp->num_rows() > 0) {
            //store session id in database if successfully logged in
            //$sessionid = session_id();
            $loggedin = '1';
            $sql = "UPDATE " . $table . " SET `loggedIn` = ? WHERE `email` = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('ss', $loggedin, $email);
            $stmt->execute();
            
            if ($stmt) {
                $stmt->close();
                $stmp->close();
                $sql = "SELECT * FROM " . $table . " WHERE `email` = ? AND `password` = ?";
                $stmp = $mysqli->prepare($sql);
                $stmp->bind_param('ss', $email, $password);
                $stmp->execute();
                //retrieve all user details from database
                // $stmp->bind_result($userid,$e_mail,$pwd,$firstname,$lastname,$username,$phone,$loggedin,$registered);
                // $stmp->fetch();
                $result = $stmp->get_result();
                $row = $result->fetch_assoc();
                
                $_SESSION['userid'] = $row['userId'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['loggedin'] = $row['loggedin'];
                $_SESSION['registered'] = $row['registered'];
                $_SESSION['description'] = $row['description'];
                $_SESSION['bio'] = $row['bio'];
                $_SESSION['coverimage'] = $row['coverimage'];
                $_SESSION['profileimage'] = $row['profileimage'];


                header("location:$url");
                $stmt->close();
            } else {
                echo "session not saved.";
            }
        } else {
            $_SESSION['error'] = "Invalid username or Email.";
            header("location:$redirectToSelf");
            $stmt->close();
        }
    }
}