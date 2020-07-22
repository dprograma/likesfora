<?php
//start a session
session_start();
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
                $url = "https://localhost/likesfora/controllers/usercontroller.php";
                $redirect = "../index.php";
                $subject = "User Registration";
                $from  = "info@likesfora.com";
                $list = [$userid, $email, $password, $firstname, $lastname, $username, $phone];
                $signup = new Signup;
                $signup->create($user, $firstname, $url, $redirect, $subject, $from, $password, $confirm, $email, $list);
                break;

            case 'Sign In To LikesFora':
                if (!empty($_POST['csrf_token'])) {
                    if (hash_equals((string) $_SESSION['csrf_token'], (string) $_POST['csrf_token'])) {
                        include '../classes/Signin.php';

                        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
                        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $table = "user";
                        $url = "../view/home.php";
                        $selfRedirect = "../view/login.php";
                        $signin = new Signin();
                        $signin->login($table, $email, $password, $url, $selfRedirect);
                    } else {
                        echo "Invalid request!";
                    }
                } else {
                    echo "Invalid request!";
                }

                break;

            case 'confirm':
                if (!empty($_REQUEST['verify'])) {
                    if (hash_equals((string) $_SESSION['verify'], (string) $_REQUEST['verify'])) {
                        header('location:http://localhost/likesfora/view/home.php');
                    } else {
                        echo "Invalid request!";
                    }
                } else {
                    echo "Invalid request!";
                }
                break;

            case 'logout':
                include "../classes/Destroy.php";
                $table = "user";
                $redirect = "../index.php";
                $logout = new Destroy;
                $logout->signout($table, $redirect);
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
