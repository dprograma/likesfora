<?php
//start a session
session_start();
//create a mysqli connection
include "../config/config.php";
if (isset($_POST['cmtpostid']) || isset($_POST['pstuserid'])) {
    $postid = $_POST['cmtpostid'];
    $userid = $_POST['pstuserid'];
} elseif (isset($_SESSION['cmtpostid']) || isset($_SESSION['pstuserid'])) {
    $postid = $_SESSION['cmtpostid'];
    $userid = $_SESSION['pstuserid'];
} else {
    $postid = "";
    $userid = "";
}

// $sql = "SELECT * FROM comment WHERE `postid` = '$postid' ORDER BY `parentcommentid` DESC, `commentid` DESC, `datecreated` DESC";

$sql = "SELECT comment.*, likes.like_unlike FROM comment LEFT JOIN likes ON comment.commentid = likes.commentid ORDER BY `parentcommentid` DESC, `commentid` DESC, `datecreated` DESC";

$result = $mysqli->query($sql);
$record_set = [];
while ($row = $result->fetch_assoc()) {
    if ($postid == $row['postid']) {
        array_push($record_set, $row);
    }
}

$mysqli->close();
echo json_encode($record_set);

// $loggedinuserid = $mysqli->real_escape_string($_POST['loggedinuserid']);
// $senderid = $mysqli->real_escape_string($_POST['senderid']);
// $postid = $mysqli->real_escape_string($_POST['postid']);
// //unset($_SESSION['postid']);
// $sql = $mysqli->query("SELECT DISTINCT `id`, `postid`, `userid`, `senderid`, `comment_sender_name`, `comment`, `datecreated`, `dateupdated` FROM comment WHERE `senderid` = '$senderid' AND `postid` = '$postid' ORDER BY `userid`, `datecreated` DESC");
// $results = [];
// $output = "";
// while ($row = $sql->fetch_assoc()) {
//     $results[] = $row;
// }

// foreach ($results as $result) {
//     $output .= "<div class='card mt-2 mb-2' style='font-size:0.75rem;'>
//    <div class='card-header'>By <b>" . $result['comment_sender_name'] . "</b> on <i>" . humanreadable($result['datecreated']) . "</i></div>
//    <div class='card-body'>" . $result['comment'] . "</div>
//    <div class='card-footer' align='right'><button type='button' class='rounded-pill p-2 reply' id='" . $result['senderid'] . "'>Reply</button></div>
//   </div>";
//     $output .= getreplycomment($mysqli, $senderid, $postid, $loggedinuserid);  
// }
// echo json_encode(['postid' => $postid, 'message' => $output], JSON_PRETTY_PRINT);

// function getreplycomment($mysqli, $parentid, $post, $userid, $marginleft = 0)
// {
//     $output = "";
//     $result = [];
//     $sql = $mysqli->query("SELECT * FROM comment WHERE `senderid` = '$parentid' AND `postid` = '$post' ORDER BY `datecreated` DESC");
//     while ($row = $sql->fetch_assoc()) {
//         $result[] = $row;
//     }
//     $rowcount = count($result);
//     if ($parentid == $userid) {
//         $marginleft = 0;
//     } else {
//         $marginleft = $marginleft + 48;
//     }
//     if ($rowcount > 0) {
//         foreach ($result as $res) {
//             $output .= "
//    <div class='card mt-2 mb-2' style='font-size:0.75rem;margin-left:" . $marginleft . "px;'>
//     <div class='card-header'>By <b>" . $res['comment_sender_name'] . "</b> on <i>" . humanreadable($res['datecreated']) . "</i></div>
//     <div class='card-body'>" . $res['comment'] . "</div>
//     <div class='card-footer' align='right'><button type='button' class='rounded-pill p-2 reply' id='" . $res['senderid'] . "'>Reply</button></div>
//    </div>
//    ";
//             //$output .= getreplycomment($mysqli, $res["senderid"], $marginleft);
//         }
//     }
//     return $output;
// }
