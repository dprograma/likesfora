<?php
session_start();
//create site directory
$directory = "C:/xampp/htdocs/likesfora/";
//include config file
include "{$directory}config/config.php";
//retrieve all user details
isset($_GET['id']) ? $id = $_GET['id'] : $id = '';
isset($_SESSION['userid']) ? $userid = $_SESSION['userid'] : $userid = $id;
isset($_SESSION['email']) ? $email = $_SESSION['email'] : $email = '';
isset($_SESSION['password']) ? $password = $_SESSION['password'] : $password =  '';


$stmt = $mysqli->query("SELECT COUNT(*) AS `requests` FROM request WHERE `userid` = '$userid'");
$request = $stmt->fetch_assoc()['requests'];


//retrieve all values from users table
$sql = "SELECT * FROM user WHERE `userid` = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $userid);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $_SESSION['userid'] = $row['userId'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['lastname'] = $row['lastname'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['dob'] = $row['dob'];
    $_SESSION['sex'] = $row['sex'];
    $_SESSION['phone'] = $row['phone'];
    $_SESSION['profileimage'] = $row['profileimage'];
    $_SESSION['coverimage'] = $row['coverimage'];
    $_SESSION['description'] = $row['description'];
    $_SESSION['bio'] = $row['bio'];
    $_SESSION['loggedin'] = $row['loggedin'];
    $_SESSION['registered'] = $row['registered'];
}

$stmt->close();

//retrieve all values from users table
$sql = "SELECT DISTINCT address, location, education, work FROM userbackground WHERE `userid` = ? ORDER BY `id` ASC";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('s', $userid);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $_SESSION['address'] = $row['address'];
    $_SESSION['location'] = $row['location'];
    $_SESSION['education'] = $row['education'];
    $_SESSION['work'] = $row['work'];
}

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

isset($_SESSION['firstname']) ? $firstname = $_SESSION['firstname'] : $firstname = '';
isset($_SESSION['lastname']) ? $lastname = $_SESSION['lastname'] : $lastname = '';
isset($_SESSION['username']) ? $username = $_SESSION['username'] : $username = '';
isset($_SESSION['phone']) ? $phone = $_SESSION['phone'] : $phone = '';
isset($_SESSION['loggedin']) ? $loggedin = $_SESSION['loggedin'] : $loggedin = '';
isset($_SESSION['registered']) ? $registered = $_SESSION['registered'] : $registered = '';
isset($_SESSION['description']) ? $description = $_SESSION['description'] : $description = '';
isset($_SESSION['bio']) ? $bio = $_SESSION['bio'] : $bio = '';
isset($_SESSION['coverimage']) ? $coverimage = $_SESSION['coverimage'] : $coverimage = 'defaultcoverimg.png';
isset($_SESSION['profileimage']) ? $profileimage = $_SESSION['profileimage'] : $profileimage = 'avater.png';
isset($_SESSION['work1']) ? $work1 = $_SESSION['work1'] : $work1 = '';
isset($_SESSION['work2']) ? $work2 = $_SESSION['work2'] : $work2 = '';
isset($_SESSION['work3']) ? $work3 = $_SESSION['work3'] : $work3 = '';
isset($_SESSION['work4']) ? $work4 = $_SESSION['work4'] : $work4 = '';
isset($_SESSION['education']) ? $education = $_SESSION['education'] : $education = '';
isset($_SESSION['education1']) ? $education1 = $_SESSION['education1'] : $education1 = '';
isset($_SESSION['education2']) ? $education2 = $_SESSION['education2'] : $education2 = '';
isset($_SESSION['education3']) ? $education3 = $_SESSION['education3'] : $education3 = '';
isset($_SESSION['address']) ? $address = $_SESSION['address'] : $address = '';
isset($_SESSION['location']) ? $location = $_SESSION['location'] : $location = '';
//create csrf session token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];
