<?php
session_start();
include "../config/config.php";
include "../classes/Notifications.php";
$memberId = $_POST['sid'];
$postid = $_POST['pid'];
$postlikeOrUnlike = 0;
$datecreated = date('Y:m:d H:i:s');
// if($_POST['post_like_unlike'] == 1)
// {
// $postlikeOrUnlike = $_POST['post_like_unlike'];
// }

$sql = "SELECT * FROM likes WHERE `postid`=" . $postid . " and userid=" . $memberId;
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
if (empty($row)) {
    $postlikeOrUnlike = 1;
    $query = "INSERT INTO likes(postid, userid, post_like_unlike, datecreated, dateupdated) VALUES('$postid', '$memberId', '$postlikeOrUnlike', '$datecreated', '$datecreated')";
    $mysqli->query($query);
    if (empty($mysqli->error)) {
        $type = "Add like";
        $title = "Liked your post.";
        $body = "liked your post.";
        $notification = new Notifications();
        $notification->notify($memberId, $type, $title, $body, $datecreated, $datecreated);
    }
} else {
    $postlike = $row['post_like_unlike'];
    if ($postlike == '0') {
        $postlikeOrUnlike = 1;
        $query = "UPDATE likes SET post_like_unlike = " . $postlikeOrUnlike . " WHERE  `postid`=" . $postid . " and `userid`=" . $memberId;
        $mysqli->query($query);
        if (empty($mysqli->error)) {
            $type = "Add like";
            $title = "Liked your post.";
            $body = "liked your post.";
            $notification = new Notifications();
            $notification->notify($memberId, $type, $title, $body, $datecreated, $datecreated);
        }
    } else {
        $query = "UPDATE likes SET post_like_unlike = " . $postlikeOrUnlike . " WHERE  `postid`=" . $postid . " and `userid`=" . $memberId;
        $mysqli->query($query);
        if (empty($mysqli->error)) {
            $notification = new Notifications();
            $notification->delete($memberId);
        }
    }
}

$posttotallikes = "";
$likeQuery = "SELECT SUM(post_like_unlike) AS likesCount FROM likes WHERE `postid`=" . $postid;
$resultLikeQuery = $mysqli->query($likeQuery);
$fetchLikes = $resultLikeQuery->fetch_assoc();
if (isset($fetchLikes['likesCount'])) {
    $posttotallikes = $fetchLikes['likesCount'];
}

echo json_encode(['posttotallikes' => $posttotallikes, 'postid' => $postid]);
