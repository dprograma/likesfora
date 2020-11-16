<?php
session_start();
//create mysqli connection
include "../config/config.php";
include "../classes/Notifications.php";
$commentId = isset($_POST['commentid']) ? $_POST['commentid'] : "";
$comment = isset($_POST['comment']) ? filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : "";
$postid = isset($_POST['postid']) ? $_POST['postid'] : "";
$senderid = isset($_POST['senderid']) ? $_POST['senderid'] : "";
$datecreated = date('Y-m-d H:i:s');

$query = $mysqli->query("SELECT `firstname`,`lastname` FROM user WHERE `userId` = '$senderid'");
$select = $query->fetch_assoc();
$firstname = $select['firstname'];
$lastname = $select['lastname'];
$commentsendername = $firstname . " " . $lastname;
$_SESSION['cmtpostid'] = $postid;
$_SESSION['pstuserid'] = $senderid;
if (!empty($comment)) {
    $sql = "INSERT INTO comment(postid,parentcommentid,senderid,comment_sender_name,comment,datecreated,dateupdated) VALUES ('" . $postid . "','" . $commentId . "','" . $senderid . "','" . $commentsendername . "','" . $comment . "','" . $datecreated . "','" . $datecreated . "')";

    $result = $mysqli->query($sql);
    if (empty($result->error)) {
        $type = "Add Comment";
        $title = "Comment added to post.";
        $body = "commented on your post.";
        $notification = new Notifications();
        $notification->notify($senderid,$type,$title,$body,$datecreated,$datecreated);
    }
}

if ($result == FALSE) {
    $result = $mysqli->error;
}
echo $result;

// $error = $commentcontent = "";

// if(empty($_POST['comment']) || $_POST['comment'] == ""){
//     $error = "<p class='text-danger'>Comment is required!</p>";
// }else{
//     $commentcontent = $mysqli->real_escape_string($_POST['comment']);
// }
// $postid = $mysqli->real_escape_string($_POST['postid']);
// $senderid = $mysqli->real_escape_string($_POST['senderid']);
// $loggedinuserid = $mysqli->real_escape_string($_POST['loggedinuserid']);
// $commentid = $mysqli->real_escape_string($_POST['commentid']);
// $query = $mysqli->query("SELECT `firstname`,`lastname` FROM user WHERE `userId` = '$senderid'");
// $result = $query->fetch_assoc();
// $firstname = $result['firstname'];
// $lastname = $result['lastname'];
// $commentsendername = $firstname . " " . $lastname;
// $datecreated = date("Y-m-d H:i:s");
// if($mysqli->error !== ""){
//     $error = $mysqli->error;
// }
// if($error == ""){
//     $sql = "INSERT INTO comment(postid, userid, senderid, comment_sender_name, comment, datecreated, dateupdated) VALUES('$postid', '$loggedinuserid','$senderid', '$commentsendername', '$commentcontent', '$datecreated', '$datecreated')";
//     $stmt = $mysqli->query($sql);
//     if($mysqli->error !== ""){
//         $error = "<p class='text-success'>Comment added successfully!</p>";
//     }
// }
// //$_SESSION['postid'] = $postid;
// $data = ['error'=> $error];
// echo json_encode($data, JSON_PRETTY_PRINT);
