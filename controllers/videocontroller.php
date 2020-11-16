<?php
include "../config/config.php";
$stmt = $mysqli->query("SELECT * FROM user");
$result = [];

while($row = $stmt->fetch_assoc()){
    if($row['videocall'] != '1'){
        array_push($result, $row);
    }
}

if(empty($mysqli->error)){
    $videocall = 1;
    $stmt = $mysqli->query("UPDATE user SET `videocall` = '$videocall'");
}

$mysqli->close();
echo json_encode($result);