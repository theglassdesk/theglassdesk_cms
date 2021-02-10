<?php 
session_start();

if(!isset($_POST['post_id'])) {
    header('Location: posts.php');
    $message = 'Not a valid post ID';
}

if(isset($_SESSION["username"])) {
    require_once('../conf/config.php');
    include('../functions.php');
    include('../inc/header.php');
    include('inc/admin-start.php');
    
    $message = '';
    
    $post_id = filter_input(INPUT_POST, 'post_id');
    $query = "SELECT * FROM posts
        WHERE post_id = '$post_id'";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $post = $stmt->fetch();
    $stmt->closeCursor();

    $post_id = $post['post_id'];
    $post_title = $post['post_title'];
    $post_image = $post['post_image'];
    $post_body = $post['post_body'];


    
    if(isset($_POST['submit'])) {
        $post_id = filter_input(INPUT_POST, 'post_id');
        $post_title = filter_input(INPUT_POST, 'post_title');
        $post_image = filter_input(INPUT_POST, 'post_image');
        $post_body = filter_input(INPUT_POST, 'post_body');
        
        $query = 'UPDATE posts
                    SET post_title = :post_title, 
                    post_image = :post_image, 
                    post_body = :post_body
                    WHERE post_id = :post_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':post_id', $post_id);
        $statement->bindValue(':post_title', $post_title);
        $statement->bindValue(':post_image', $post_image);
        $statement->bindValue(':post_body', $post_body);
        $statement->execute();
        $statement->closeCursor();
        $message = '<label>Post has been updated!</label>';
    }
        
    ?>
    <div class="row" style="margin-top: 60px;">
        <div id="login-card" class="large-6 columns">
            <div class="card">
                <div class="card-divider">
                    <h3>Edit Post</h3>
                </div>
                <div class="card-section">
                    <form action="update_post.php" method="post">
                        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                        <input type="text" name="post_title" value="<?php echo $post_title; ?>">
                        <input type="text" name="post_image" value="<?php echo $post_image; ?>">
                        <textarea rows="4" name="post_body"><?php echo $post_body; ?></textarea>
                        <input type="submit" name="submit" class="button success" value="Edit">
                    </form> 
                </div>
            </div>
            <?php
                if(!empty($message)) { ?>
                    <div class="callout success" style="margin-top: 20px;">
                        <?php 
                            echo $message;
                        ?>
                    </div>
            <?php } ?>
        </div>
    </div>

    <?php
    include('inc/admin-finish.php');
    include('../inc/footer.php'); 
    
} else { 
    header('Location: auth.php');

}