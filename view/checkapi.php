<?php
include "../config/config.php";
$output = '';
$stmt = $mysqli->query("SELECT * FROM user WHERE `userId` = '6767817'");
while($result = $stmt->fetch_assoc()){
    //$output[] = $result;
    $output .= $result['bio'] . $result['description'];
}
echo json_encode($output, true);
