<?php 
session_start(); 

$old_user = $_SESSION['username'];
unset($_SESSION['username']);
session_destroy();

?>  
<!DOCTYPE html>
<html>
<head>
   <title>Log Out</title>
</head>
<body>
<h1>Log Out</h1>
<?php
    if(!empty($old_user)) {
        echo '<p>You have been logged out</p>';
        echo '<a href="../index.php">Go home.</a>';
    } else {
        echo '<p>You were not logged in, so you have not been logged out.</p>';
        echo '<a href="auth.php">Log in.</a>';
    }
?>
    </body>
</html>