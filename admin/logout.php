<?php 
session_start(); 

//clear data from memory && clean up session ID
$_SESSION = array();
session_destroy();

//check session, redirect to home page
if(!isset($_SESSION['username'])) {
    header('Location: ../index.php');
}