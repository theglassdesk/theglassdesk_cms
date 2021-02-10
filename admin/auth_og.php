<?php
session_start();
require_once('../conf/config.php');

$message = '';

if(isset($_POST["login"])) {  
    if(empty($_POST["username"]) || empty($_POST["password"])) {  
        $message = '<label>All fields are required</label>';  
    } else {  
        $username = $_POST['username'];
        $password = sha1($_POST['password']);
        $query = 'SELECT * FROM auth_users WHERE username = :username AND password = :password';
        $statement = $db->prepare($query); 
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute(); 
        $row = $statement->fetch(); 
        if($row) {
            $_SESSION["username"] = $username;  
             header('Location: index.php'); 
        } else {  
             $message = '<label>Wrong Data</label>';  
        }
    }  
}  
?>
<!DOCTYPE html>
<html>
<head>
   <title>Log in</title>
    <link rel="stylesheet" href="../assets/css/foundation.css"/>
    <link rel="stylesheet" href="../assets/css/main.css"/>
    <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css" integrity="sha384-dNpIIXE8U05kAbPhy3G1cz+yZmTzA6CY8Vg/u2L9xRnHjJiAK76m2BIEaSEV+/aU" crossorigin="anonymous">
</head>
<body>


<?php
if($message != '') {
    echo $message;
}
  if(isset($_SESSION['username'])) {
    header('Location: index.php');
  } else {
    echo '<p><button class="button" data-open="exampleModal1">Log In</button></p>';
  }
?>
    
    <script src="../assets/js/vendor/jquery.js"></script>
    <script src="../assets/js/vendor/what-input.js"></script>
    <script src="../assets/js/vendor/foundation.js"></script>
    <script src="../assets/js/vendor/foundation.min.js"></script>
    <script src="../assets/js/app.js"></script>
</body>
</html>