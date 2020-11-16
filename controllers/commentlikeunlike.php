<?php
session_start();
include "../config/config.php";
include "../classes/Notifications.php";
$memberId = $_POST['userid'];
$commentId = $_POST['commentid'];
$likeOrUnlike = 0;
$datecreated = date('Y-m-d H:i:s');
if ($_POST['like_unlike'] == 1) {
    $likeOrUnlike = $_POST['like_unlike'];
}

$sql = "SELECT * FROM likes WHERE `commentid`=" . $commentId . " and userid=" . $memberId;
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();

if (!empty($row)) {
    $query = "UPDATE likes SET like_unlike = " . $likeOrUnlike . " WHERE  `commentid`=" . $commentId . " and `userid`=" . $memberId;
    $mysqli->query($query);
    if ($likeOrUnlike == 1) {
        if (empty($mysqli->error)) {
            $type = "Add like";
            $title = "Add like to comment.";
            $body = "liked your comment.";
            $notification = new Notifications();
            $notification->notify($memberId, $type, $title, $body, $datecreated, $datecreated);
        }
    } else {
        $notification = new Notifications();
        $notification->delete($memberId);
    }
} else {
    $query = "INSERT INTO likes (userid,commentid,like_unlike) VALUES ('" . $memberId . "','" . $commentId . "','" . $likeOrUnlike . "')";
    $mysqli->query($query);
    if (empty($mysqli->error)) {
        $type = "Add like";
        $title = "Add like to comment.";
        $body = "liked on your comment.";
        $notification = new Notifications();
        $notification->notify($memberId, $type, $title, $body, $datecreated, $datecreated);
    }
}

$totalLikes = "No ";
$likeQuery = "SELECT sum(like_unlike) AS likesCount FROM likes WHERE `commentid`=" . $commentId;
$resultLikeQuery = $mysqli->query($likeQuery);
$fetchLikes = $resultLikeQuery->fetch_assoc();
if (isset($fetchLikes['likesCount'])) {
    $totalLikes = $fetchLikes['likesCount'];
}

echo $totalLikes;
