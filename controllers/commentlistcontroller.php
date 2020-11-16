<?php
include "../config/config.php";

$sql = "SELECT * FROM comment ORDER BY userid asc, id asc";

$result = $mysqli->query($sql);
$record_set = [];
while ($row = mysqli_fetch_assoc($result)) {
    array_push($record_set, $row);
}
mysqli_free_result($result);
$mysqli->close();
echo json_encode($record_set);
?>