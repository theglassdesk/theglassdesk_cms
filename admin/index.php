<?php 
session_start();

if(isset($_SESSION["username"])) {
    require_once('../conf/config.php');
    header('Location: posts.php');
    
} else {
    header('Location: login.php');
}

?>

    