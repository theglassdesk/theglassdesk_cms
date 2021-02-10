<?php
session_start();
require_once('../conf/config.php');


if(isset($_SESSION['username'])) {
    header('Location: index.php');
} else {
    header('Location: login.php');
}