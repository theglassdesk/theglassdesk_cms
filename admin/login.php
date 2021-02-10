<?php
session_start();
require_once('../conf/config.php');

$message = '';

if(isset($_POST["login"])) {  
    if(empty($_POST["username"]) || empty($_POST["password"])) {  
        $message = '<label>All fields are required</label>';  
    } else {  
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $password = sha1($_POST['password']);
        $query = 'SELECT * FROM auth_users WHERE username = :username AND password = :password';
        $statement = $db->prepare($query); 
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute(); 
        $row = $statement->fetch(); 
        if($row) {
            $username = ucwords($username);
            $_SESSION["username"] = $username;  
             header('Location: index.php'); 
        } else {  
             $message = '<label>Username or password is incorrect. Try again.</label>';  
        }
    }  
}

include('../inc/header.php');
include('../inc/main-nav.php');
?>


<div class="row" style="padding: 100px 0px 300px 0px;">
    <div id="login-card" class="large-6 columns">
        <div class="card">
            <div class="card-divider">
                <h4>You are logged out, please sign in.</h4>
            </div>
            <div class="card-section">
                <form action="login.php" method="POST">  
                    <input type="text" name="username" placeholder="Username" />  
                    <input type="password" name="password" placeholder="Password" />  
                    <button type="submit" name="login" class="button expanded"><i class="large fa fa-sign-in"></i>Log in</button>
                </form> 
            </div>
        </div>
        <!--// provide form to log in-->
        <?php
            if(!empty($message)) { ?>
                <div class="callout alert" style="margin-top: 20px;">
                    <?php 
                        echo $message;
                    ?>
                </div>
        <?php } ?>
    </div>
</div>
    
    
<?php include('../inc/footer.php'); ?>