<?php
//start a session
session_start();
if (isset($_SERVER['REQUEST_METHOD'])) {
    if (isset($_REQUEST['action'])) {
        include "../config/directory.php";
        $action  = $_REQUEST['action'];
        switch ($action) {
            case 'Add Friend':
                include "../config/config.php";
                if (!empty($_POST['csrf_token'])) {
                    if (hash_equals((string) $_SESSION['csrf_token'], (string) $_POST['csrf_token'])) {
                        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $userid = filter_input(INPUT_POST, 'userid', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $friendsid = filter_input(INPUT_POST, 'friendsid', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $flag = 1;
                        $added = date('Y-m-d H:i:s');
                        $updated =  date('Y-m-d H:i:s');
                        $sql = "INSERT INTO friends (userid, friendsid, datecreated, dateupdated, flag) VALUES('$userid', '$friendsid', '$added', '$updated', '$flag')";
                        $stmt = $mysqli->query($sql);

                        $type = "Added Friend";
                        $title = "Friend added to user";
                        $body = "You are now friends with " . $firstname . " " . $lastname;

                        $mysqli->query("INSERT INTO notifications (userid, friendsid, notificationtype, title, body, datecreated, dateupdated) VALUES('$userid','$friendsid', '$type', '$title', '$body', '$added', '$updated')");

                        if ($mysqli->error == false) {
                            $_SESSION['success'] = "You are now friends with " . $firstname . " " . $lastname . ".";
                            header("Location:../view/friendlist.php");
                        } else {
                            $_SESSION['success'] = "Error adding friend";
                            header("Location:../view/friendlist.php");
                        }
                    } else {
                        header("Location:../index.php");
                    }
                } else {
                    header("Location:../index.php");
                }
                break;
            case 'Remove':
                include "../config/config.php";
                if (!empty($_POST['csrf_token'])) {
                    if (hash_equals((string) $_SESSION['csrf_token'], (string) $_POST['csrf_token'])) {
                        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $userid = filter_input(INPUT_POST, 'userid', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $friendsid = filter_input(INPUT_POST, 'friendsid', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                        $mysqli->query("DELETE FROM friends WHERE `friendsid` =  '$friendsid'");

                        $mysqli->query("DELETE FROM notifications WHERE `friendsid` =  '$friendsid'");

                        if ($mysqli->error == false) {
                            $_SESSION['success'] = "You have removed " . $firstname . " " . $lastname . ".";
                            header("Location:../view/friendlist.php");
                        } else {
                            $_SESSION['success'] = "Error removing friend";
                            header("Location:../view/friendlist.php");
                        }
                    } else {
                        header("Location:../index.php");
                    }
                } else {
                    header("Location:../index.php");
                }
                break;
            default:
                $url = "../index.php";
                header("location:$url");
                break;
        }
    }
}
