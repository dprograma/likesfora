<?php
session_start();
//create site directory
$directory = "C:/xampp/htdocs/likesfora/";
//include config file
include "{$directory}config/config.php";
//retrieve all user details
if (isset($_GET['id'])) {
    $userid = $_GET['id'];
} elseif(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
}

//retrieve all values from users table
$sql = "SELECT * FROM user WHERE `userid` = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $userid);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $userid = $row['userId'];
    $email = $row['email'];
    $password = $row['password'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $username = $row['username'];
    $dob = $row['dob'];
    $sex = $row['sex'];
    $phone = $row['phone'];
    $profileimage = $row['profileimage'];
    $coverimage = $row['coverimage'];
    $description = $row['description'];
    $bio = $row['bio'];
    $loggedin = $row['loggedin'];
    $registered = $row['registered'];
}

$stmt->close();

//retrieve all values from users table
$sql = "SELECT DISTINCT address, location, education, work FROM userbackground WHERE `userid` = ? ORDER BY `id` ASC";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('s', $userid);
$stmt->execute();
$result = $stmt->get_result();
$work = [];
$education = [];
$i = 1;
while ($row = $result->fetch_assoc()) {
    $address = $row['address'];
    $location = $row['location'];
    $education[$i] = $row['education'];
    $work[$i] = $row['work'];
    $i++;
}

if(!empty($work)){
    $work[1] ? $work1 = $work[1] : $work1 = '';
    $work[2] ? $work2 = $work[2] : $work2 = '';
    $work[3] ? $work3 = $work[3] : $work3 = '';
    $work[4] ? $work4 = $work[4] : $work4 = '';
}else{
    $work1 = '';
    $work2 = '';
    $work3 = '';
    $work4 = '';
}

if(!empty($education)){
    $education[1] ? $education1 = $education[1] : $education1 = '';
    $education[2] ? $education2 = $education[2] : $education2 = '';
    $education[3] ? $education3 = $education[3] : $education3 = '';
    $education[4] ? $education4 = $education[4] : $education4 = '';
}else{
    $education1 = '';
    $education2 = '';
    $education3 = '';
    $education4 = '';
}

!empty($location) ? $location = $location : $location = '';
!empty($address) ? $address = $address : $address = '';

$stmt->close();

$stmt = $mysqli->query("SELECT count(*) as `count` FROM notifications WHERE `userid` = '$userid'");
$noofrows = $stmt->fetch_assoc()['count'];

$stmt = $mysqli->query("SELECT `lastnoofrows` FROM notifications WHERE `userid` = '$userid'");
$row = $stmt->fetch_assoc();
$lastnoofrows = $row['lastnoofrows'];

$notification = $noofrows - $lastnoofrows;

if (basename($_SERVER['SCRIPT_NAME']) == 'notifications.php') {
    $mysqli->query("UPDATE notifications SET `lastnoofrows` = '$noofrows' WHERE `userid` = '$userid'");

    $stmt = $mysqli->query("SELECT `lastnoofrows` FROM notifications WHERE `userid` = '$userid'");
    $row = $stmt->fetch_assoc();
    $lastnoofrows = $row['lastnoofrows'];
}

$notification = $noofrows - $lastnoofrows;

$stms = $mysqli->query("SELECT DISTINCT `friendsid` FROM friends WHERE `userid` = '$userid'");
$friends = $stms->num_rows;

//create csrf session token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];
