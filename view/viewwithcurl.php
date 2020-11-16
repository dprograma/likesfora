<?php
session_start();
if(isset($_POST['firstname']) || isset($_POST['lastname'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
}else{
    $firstname = "";
    $lastname = "";
}
$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] = $lastname;




