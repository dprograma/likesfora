<?php
session_start();

//retrieve all user details
isset($_SESSION['userid']) ? $userid = $_SESSION['userid']: $userid = '';
isset($_SESSION['firstname']) ? $firstname = $_SESSION['firstname']: $firstname = '';
isset($_SESSION['lastname']) ? $lastname = $_SESSION['lastname']: $lastname = '';
isset($_SESSION['username']) ? $username = $_SESSION['username']: $username = '';
isset($_SESSION['phone']) ? $phone = $_SESSION['phone']: $phone = '';
isset($_SESSION['email']) ? $email = $_SESSION['email']: $email = '';
isset($_SESSION['password']) ? $password = $_SESSION['password']: $password =  '';
isset($_SESSION['loggedin']) ? $loggedin = $_SESSION['loggedin']: $loggedin = '';
isset($_SESSION['registered']) ? $registered = $_SESSION['registered']: $registered = '';
    //create csrf session token
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    $csrf_token = $_SESSION['csrf_token'];
?>

    
