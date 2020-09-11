<?php
//start a session
session_start();
if (isset($_SERVER['REQUEST_METHOD'])) {
    if (isset($_REQUEST['action'])) {
        include "../config/directory.php";
        $action  = $_REQUEST['action'];
        switch ($action) {
            case 'Add Friend':
                if (!empty($_POST['csrf_token'])) {
                    if (hash_equals((string) $_SESSION['csrf_token'], (string) $_POST['csrf_token'])) {
                        include "../config/config.php";
                        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $userid = filter_input(INPUT_POST, 'userid', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $friendsid = filter_input(INPUT_POST, 'friendsid', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $added = date('Y-m-d H:i:s');
                        $updated =  date('Y-m-d H:i:s');
                        $sql = "INSERT INTO request (userid, requesterid, datecreated, dateupdated) VALUES('$userid', '$friendsid', '$added', '$updated')";
                        $stmt = $mysqli->query($sql);

                        $type = "Friend Request";
                        $title = "Friend request to user";
                        $body = "Your friend request has been sent to " . $firstname . " " . $lastname;

                        $mysqli->query("INSERT INTO notifications (userid, friendsid, notificationtype, title, body, datecreated, dateupdated) VALUES('$userid','$friendsid', '$type', '$title', '$body', '$added', '$updated')");

                        if ($mysqli->error == false) {
                            $_SESSION['success'] = "Your friend request has been sent to " . $firstname . " " . $lastname . ".";
                            header("Location:../view/friendlist.php");
                        } else {
                            $_SESSION['success'] = "Error sending request";
                            header("Location:../view/friendlist.php");
                        }
                    } else {
                        header("Location:../index.php");
                    }
                } else {
                    header("Location:../index.php");
                }
                break;

            case 'Tag':
                if (!empty($_POST['csrf_token'])) {
                    if (hash_equals((string) $_SESSION['csrf_token'], (string) $_POST['csrf_token'])) {
                        include "../config/config.php";
                        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $userid = filter_input(INPUT_POST, 'userid', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $friendsid = filter_input(INPUT_POST, 'friendsid', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $tag = $firstname . " " . $lastname;
                        echo json_encode($tag, JSON_PRETTY_PRINT);
                    } else {
                        header("Location:../index.php");
                    }
                } else {
                    header("Location:../index.php");
                }
                break;
            case 'Confirm':
                if (!empty($_POST['csrf_token'])) {
                    if (hash_equals((string) $_SESSION['csrf_token'], (string) $_POST['csrf_token'])) {
                        include "../config/config.php";
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

                        $mysqli->query("DELETE FROM `request` WHERE `requesterid` = '$friendsid'");

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
                if (!empty($_POST['csrf_token'])) {
                    if (hash_equals((string) $_SESSION['csrf_token'], (string) $_POST['csrf_token'])) {
                        include "../config/config.php";
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

            case 'Submit Post':
                if (!empty($_POST['csrf_token'])) {
                    if (hash_equals((string) $_SESSION['csrf_token'], (string) $_POST['csrf_token'])) {
                        include "../config/config.php";
                        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $title = "User Post";
                        $imagepath = "../assets/images/post/";
                        $redirecturl = "{$directory}view/user.php";
                        $id = $_SESSION['userid'];
                        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'mp4', 'wma', 'webm', 'ogv', 'm4v', 'avi', 'mpg');
                        $statusMsg = $successmsg = $errormsg = $insertValuesSQL = $insertTagSQL = '';
                        $x = 1111;
                        $y = 999999;
                        $postid = rand($x, $y);
                        $datetime = date('Y-m-d H:i:s');
                        $fileNames = array_filter($_FILES['img']['name']);
                        if (!empty($fileNames)) {
                            foreach ($_FILES['img']['name'] as $key => $val) {
                                // File upload path 
                                $fileName = basename($_FILES['img']['name'][$key]);
                                $targetFilePath = $imagepath . $fileName;
                                $dt = str_replace(" ", "", str_replace(":", "", str_replace("-", "", $datetime)));
                                // Check whether file type is valid 
                                $ext = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                                $fullimagepath = trim($imagepath . $id . $fileName . $dt . "." . $ext);
                                $imagename = trim($id . $fileName . $dt . "." . $ext);
                                if (in_array($ext, $allowTypes)) {
                                    // Upload file to server 
                                    if (move_uploaded_file($_FILES["img"]["tmp_name"][$key], $fullimagepath)) {
                                        // Image db insert sql 
                                        $insertValuesSQL .= "('" . $postid . "','" . $id . "','" . $imagename . "','" . $datetime . "','" .  $datetime . "'),";
                                    } else {
                                        $errormsg .= $_FILES['img']['name'][$key] . ' | ';
                                    }
                                } else {
                                    $errormsg .= $_FILES['img']['name'][$key] . ' | ';
                                }
                            }

                            if (!empty($insertValuesSQL)) {
                                $insertValuesSQL = trim($insertValuesSQL, ',');
                                // Insert image file name into database 
                                $insert = $mysqli->query("INSERT INTO postimage (postid, userid, media, datecreated, dateupdated) VALUES $insertValuesSQL");
                                if ($insert) {
                                    $errormsg = !empty($errormsg) ? 'Upload Error: ' . trim($errormsg, ' | ') : '';
                                    $successmsg = "Files are uploaded successfully." . $errormsg;
                                } else {
                                    $errormsg = "Sorry, there was an error uploading your file.";
                                }
                            }
                        } else {
                            $errormsg = 'Please select a file to upload.';
                        }

                        if (!empty($_POST)) {
                            foreach ($_POST as $key => $value) {
                                if ($key == 'content' || $key == 'csrf_token') {
                                    continue;
                                }
                                $insertTagSQL .= "('" . $postid . "','" . $value . "'),";
                            }
                            $insertTagSQL = trim($insertTagSQL, ',');

                            if (!empty($insertTagSQL)) {
                                $sql = "INSERT INTO tags (postid, tag) VALUES $insertTagSQL";
                                $stmt = $mysqli->query($sql);
                            }

                            if ($mysqli->error) {
                                $errormsg = "Error tagging friends!";
                            }
                        }

                        $mysqli->query("INSERT INTO post (postid, userid, title, body, datecreated, dateupdated) VALUES ('$postid', '$id', '$title', '$content', '$datetime', '$datetime')");

                        if ($mysqli->error) {
                            $errormsg = "Error sending your post!";
                        } else {
                            $successmsg = "Post sent successfully!";
                        }

                        echo json_encode(['successmsg' => $successmsg, 'errormsg' => $errormsg], JSON_PRETTY_PRINT);
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
