<?php
//start a session
session_start();
if (isset($_SERVER['REQUEST_METHOD'])) {
    if (isset($_REQUEST['action'])) {
        include "../config/directory.php";
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
                $url = "{$directory}controllers/usercontroller.php";
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
                        header("location:../index.php");
                    }
                } else {
                    header("location:../index.php");
                }

                break;

            case 'confirm':
                if (!empty($_REQUEST['verify'])) {
                    if (hash_equals((string) $_SESSION['verify'], (string) $_REQUEST['verify'])) {
                        header('{$directory}view/home.php');
                    } else {
                        header("location:../index.php");
                    }
                } else {
                    header("location:../index.php");
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
                        $url = "{$directory}controllers/usercontroller.php";
                        $redirectSelf = "{$directory}view/reset.php";
                        $from = "info@likesfora.com";
                        $reset = new Reset;
                        $reset->sendMail($table, $subject, $url, $redirectSelf, $from, $email);
                    } else {
                        header("location:../index.php");
                    }
                } else {
                    header("location:../index.php");
                }
                break;

            case 'reset':
                if (!empty($_REQUEST['email_token'])) {
                    if (hash_equals($_SESSION['email_token'], $_REQUEST['email_token'])) {
                        header('{$directory}view/resetpassword.php');
                    } else {
                        echo "Invaild request!";
                    }
                } else {
                    header("location:../index.php");
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
                        $url = "{$directory}";
                        $redirectSelf = "{$directory}view/resetpassword.php";

                        $update = new Reset;
                        $update->update($table, $email, $oldpwd, $password, $confirm, $url, $redirectSelf);
                    } else {
                        echo "Invaild request!";
                    }
                } else {
                    header("location:../index.php");
                }
                break;

            case 'Update Profile Image':
                if (!empty($_REQUEST['csrf_token'])) {
                    if (hash_equals($_SESSION['csrf_token'], $_REQUEST['csrf_token'])) {
                        include "../classes/Upload.php";
                        $table = "user";
                        $fieldname = "profileimage";
                        $imagepath = "../assets/images/profile/";
                        $redirectUrl = "{$directory}view/user.php";
                        $id = $_SESSION['userid'];
                        $upload = new Upload();
                        $upload->uploadfile($table, $fieldname, $imagepath, $redirectUrl, $id);
                    } else {
                        echo "Invalid request!";
                    }
                } else {
                    echo "Invalid request!";
                }
                break;

            case 'Update Cover Image':
                if (!empty($_REQUEST['csrf_token'])) {
                    if (hash_equals($_SESSION['csrf_token'], $_REQUEST['csrf_token'])) {
                        include "../classes/Upload.php";
                        $table = "user";
                        $fieldname = "coverimage";
                        $imagepath = "../assets/images/profile/";
                        $redirectUrl = "{$directory}view/user.php";
                        $id = $_SESSION['userid'] . "coverimg";
                        $upload = new Upload();
                        $upload->uploadfile($table, $fieldname, $imagepath, $redirectUrl, $id);
                    } else {
                        header("location:../index.php");
                    }
                } else {
                    header("location:../index.php");
                }
                break;

            case 'Edit Bio':
                if (!empty($_REQUEST['csrf_token'])) {
                    if (hash_equals($_SESSION['csrf_token'], $_REQUEST['csrf_token'])) {
                        include "../config/config.php";
                        $errormsg = "";
                        $successmsg = "";
                        $bio = htmlspecialchars($_POST['kindofperson']);
                        $description = htmlspecialchars($_POST['whatido']);
                        $email = $_SESSION['email'];

                        $mysqli->query("UPDATE user SET `description` = '$description', `bio` = '$bio' WHERE `email` = '$email'");

                        if ($mysqli->error) {
                            $errormsg = "Error updating record!";
                        } else {
                            $successmsg = "Record updated successfully!";
                        }
                        $_SESSION['description'] = $description;
                        $_SESSION['bio'] = $bio;
                        echo json_encode(['successmsg' => $successmsg, 'errormsg' => $errormsg], JSON_PRETTY_PRINT);
                    } else {
                        header("location:../index.php");
                    }
                } else {
                    header("location:../index.php");
                }
                break;

            case 'Update Info':
                if (!empty($_REQUEST['csrf_token'])) {
                    if (hash_equals($_SESSION['csrf_token'], $_REQUEST['csrf_token'])) {
                        include "../config/config.php";
                        $errormsg = "";
                        $successmsg = "";
                        $id = $_SESSION['userid'];
                        $work = filter_input(INPUT_POST, 'work', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $work1 = filter_input(INPUT_POST, 'work1', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $work2 = filter_input(INPUT_POST, 'work2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $work3 = filter_input(INPUT_POST, 'work3', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $edu = filter_input(INPUT_POST, 'edu', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $edu1 = filter_input(INPUT_POST, 'edu1', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $edu2 = filter_input(INPUT_POST, 'edu2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $edu3 = filter_input(INPUT_POST, 'edu3', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $addr = filter_input(INPUT_POST, 'addr', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $loc = filter_input(INPUT_POST, 'loc', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                        $wk = [$work, $work1, $work2, $work3];
                        $ed = [$edu, $edu1, $edu2, $edu3];

                        $i = 0;
                        while ($i < 4) {
                            $mysqli->query("INSERT INTO userbackground(userid, address, location, education, work) VALUES ('$id', '$addr', '$loc', '$ed[$i]', '$wk[$i]')");
                            ++$i;
                        }

                        //retrieve the inserted values from the database
                        $stmt = $mysqli->query("SELECT DISTINCT * FROM userbackground WHERE `userid` = '$id'");
                        $count = 1;
                        while ($row = $stmt->fetch_assoc()) {
                            $_SESSION['education' . $count] = $row['education'];
                            $_SESSION['work' . $count] = $row['work'];
                            ++$count;
                        }

                        //insert values into session variables
                        $_SESSION['work'] = $row['work'];
                        $_SESSION['address'] = $row['address'];
                        $_SESSION['location'] = $row['location'];

                        //check if mysqli has has no errors
                        if ($mysqli->error == false) {
                            $successmsg = "Your record has been updated successfully.";
                        } else {
                            $errormsg = "There was a problem updating your record.";
                        }

                        echo json_encode(['successmsg' => $successmsg, 'errormsg' => $errormsg], JSON_PRETTY_PRINT);
                    } else {
                        header("location:../index.php");
                    }
                } else {
                    header("location:../index.php");
                }
                break;

            default:
                $url = "../index.php";
                header("location:$url");
                break;
        }
    } else {
        header("location:../index.php");
    }
} else {
    header("location:../index.php");
}
