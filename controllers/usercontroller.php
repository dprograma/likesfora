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
                        $selfRedirect = "../index.php";
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

            case 'Reset Password':
                if (!empty($_POST['csrf_token'])) {
                    if (hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
                        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
                        include "../classes/Reset.php";
                        $table = "user";
                        $subject = "Password Reset";
                        $url = "http://localhost/likesfora/controllers/usercontroller.php";
                        $redirectSelf = "http://localhost/likesfora/view/reset.php";
                        $from = "info@likesfora.com";
                        $reset = new Reset;
                        $reset->sendMail($table, $subject, $url, $redirectSelf, $from, $email);
                    } else {
                        echo "Invalid request!";
                    }
                } else {
                    echo "Invalid request!";
                }
                break;

            case 'reset':
                if (!empty($_REQUEST['email_token'])) {
                    if (hash_equals($_SESSION['email_token'], $_REQUEST['email_token'])) {
                        header('location:http://localhost/likesfora/view/resetpassword.php');
                    } else {
                        echo "Invaild request!";
                    }
                } else {
                    echo "Invalid request!";
                }
                break;

            case 'Update password':
                if (!empty($_REQUEST['csrf_token'])) {
                    if (hash_equals($_SESSION['csrf_token'], $_REQUEST['csrf_token'])) {
                        include "../classes/Reset.php";
                        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $confirm = filter_input(INPUT_POST, 'confirm', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $email = $_SESSION['email'];
                        $oldpwd = $_SESSION['password'];
                        $table = "user";
                        $url = "http://localhost/likesfora/";
                        $redirectSelf = "http://localhost/likesfora/view/resetpassword.php";

                        $update = new Reset;
                        $update->update($table, $email, $oldpwd, $password, $confirm, $url, $redirectSelf);
                    } else {
                        echo "Invaild request!";
                    }
                } else {
                    echo "Invalid request!";
                }
                break;

            default:
                $url = "../index.php";
                header("location:$url");
                break;
        }
    } else {
        echo "Invalid request!";
    }
} else {
    echo "Invalid request!";
}
