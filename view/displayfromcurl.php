<?php
session_start();
if(isset($_SESSION['firstname']) || isset($_SESSION['lastname'])){
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
}
echo "Full name is: " . $firstname . " " . $lastname;