<?php
define("SITE_TITLE", "CMS");

// Define URL
define("ROOT_PATH", "#");
define("ROOT_URL", "#");

$dsn = 'YOUR_DB_NAME';
$username = 'YOUR_DB_USERNAME';
$password = 'YOUR_DB_PASSWORD';

try {
    $db = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}