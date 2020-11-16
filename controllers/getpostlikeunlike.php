<?php
session_start();
include "../config/config.php";
if (isset($_POST['postid']) || isset($_POST['userid'])) {
    $postid = $_POST['postid'];
    $userid = $_POST['userid'];
} elseif (isset($_SESSION['cmtpostid']) || isset($_SESSION['pstuserid'])) {
    $postid = $_SESSION['cmtpostid'];
    $userid = $_SESSION['pstuserid'];
    unset($_SESSION['cmtpostid']);
    unset($_SESSION['pstuserid']);
} else {
    $postid = "";
    $userid = "";
}
$posttotallikes = "";
$likeQuery = "SELECT SUM(post_like_unlike) AS postLikesCount FROM likes WHERE `postid`='$postid'";
$resultLikeQuery = $mysqli->query($likeQuery);
$fetchLikes = $resultLikeQuery->fetch_array();
if (isset($fetchLikes['postLikesCount'])) {
    $posttotallikes = $fetchLikes['postLikesCount'];
}

echo json_encode(['posttotallikes' => $posttotallikes, 'postid' => $postid]);
