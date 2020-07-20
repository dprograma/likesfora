<?php
//start a session
session_start();
if (!empty($_REQUEST['csrf_token'])) {
    if (hash_equals($_SESSION['csrf_token'], $_REQUEST['csrf_token'])) {
        if (isset($_SERVER['REQUEST_METHOD'])) {
            if (isset($_REQUEST['action'])) {
                $action  = $_REQUEST['action'];
                switch ($action) {
                    case 'Sign Up For LikesFora':                   
                        include "../classes/Signup.php";
                        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $confirm = filter_input(INPUT_POST, 'confirm', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
                        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
                        $start = 100000;
                        $end = 10000000;
                        $userid = rand($start, $end);
                        $user = "user";
                        $url = "https://localhost/likesfora/view/home.php";
                        $redirect = "../index.php";
                        $subject = "User Registration";
                        $from  = "info@likesfora.com";
                        $list = [$userid, $email, $password, $firstname, $lastname, $username, $phone];
                        $signup = new Signup;
                        $signup->create($user, $firstname, $url, $redirect, $subject, $from, $password, $confirm, $email, $list);
                        break;

                    default:
                        $url = "../index.php";
                        header("location:$url");
                        break;
                }
            } else {
                echo "Invaide request!";
            }
        } else {
            echo "Invalid request!";
        }
    } else {
        echo "Invalide request!";
    }
} else {
    echo "Invalid request!";
}
