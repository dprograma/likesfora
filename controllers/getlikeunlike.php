<?php
include "../config/config.php";

$commentId = $_POST['commentid'];
$totalLikes = "No ";
$likeQuery = "SELECT SUM(like_unlike) AS likesCount FROM likes WHERE `commentid`='$commentId'";
$resultLikeQuery = $mysqli->query($likeQuery);
$fetchLikes = $resultLikeQuery->fetch_array();
if(isset($fetchLikes['likesCount'])) {
    $totalLikes = $fetchLikes['likesCount'];
}

echo json_encode(['totallikes' => $totalLikes, 'commentid' => $commentId]);
?>