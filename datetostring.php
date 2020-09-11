<?php
$datetime = date('Y-m-d H:i:s');
$datetime = str_replace(" ", "", str_replace(":", "", str_replace("-", "", $datetime)));
echo $datetime . ".mp4";
?>