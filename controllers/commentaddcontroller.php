<?php
include "../config/config.php";
$commentId = filter_input('INPUT_POST','comment_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$comment = filter_input('INPUT_POST','comment', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$currentuserid = filter_input('INPUT_POST','currentuserid', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$postuserid = filter_input('INPUT_POST','userid', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$commentSenderName = isset($_POST['name']) ? $_POST['name'] : "";
$date = date('Y-m-d H:i:s');

$sql = "INSERT INTO comment(id,userid,senderid,comment_sender_name,comment,datecreated,dateupdated) VALUES ('" . $commentId . "','" . $postuserid . "','" . $currentuserid . "','" . $commentSenderName . "','" . $comment . "','" . $date . "','" . $date . "')";

$result = $mysqli->query($sql);

if (! $result) {
    $result = $mysqli->mysqli_error;
}
echo json_encode($result);

