<?php 
session_start();

//CHECK FOR AUTHORIZED USER
if(isset($_SESSION['username'])) {
    require_once('../conf/config.php');
    include '../functions.php';
    include('../inc/header.php');
    include('inc/admin-start.php');
    
    //ADD A NEW POST
    if(isset($_POST['add_post'])) {
        $error_message = '';
        $success_message = '';
        if(empty($post_title) || empty($post_body) || empty($post_image)) {
            $error_message = '<p class="lead">Fields can not be empty.</p>';
        } else {
            $post_title = filter_input(INPUT_POST, 'post_title');
            $post_image = filter_input(INPUT_POST, 'post_image');
            $created_by = filter_input(INPUT_POST, 'created_by');
            $post_body = filter_input(INPUT_POST, 'post_body');
            $query = 'INSERT INTO posts(post_title, post_image, created_by, post_body) 
                    VALUES(:post_title, :post_image, :created_by, :post_body)';
            $stmt = $db->prepare($query);
            $stmt->bindValue(':post_title', $post_title);
            $stmt->bindValue(':post_image', $post_image);
            $stmt->bindValue(':created_by', $created_by);
            $stmt->bindValue(':post_body', $post_body);
            $stmt->execute();
            $stmt->closeCursor();
            $success_message = '<p class="lead">New Post has beed added!</p>';
        }
    }
    
    //CALL FUNCTION TO GET QUERY DATABASE FOR POSTS
    $posts = get_posts();


    ?>
    
    <!-- BEIGN BODY OF ADMIN DASHBOARD -->
    <h2 class="text-center">Manage Posts</h2>
    <button class="button" data-open="add-new-post">Add New Post</button>
    <div class="reveal" id="add-new-post" data-reveal>
      <div class="card">
            <div class="card-divider">
                <h4>Add a New Post</h4>
            </div>
            <div class="card-section">
                <form id="new_post" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div>
                        <input type="text" name="post_title" placeholder="Post Title"/>
                        <input type="text" name="post_image" placeholder="Post Image URL"/>
                        <input type="hidden" name="created_by" value="<?php echo $_SESSION['username']; ?>"/>
                        <textarea rows="6" name="post_body" placeholder="Post Body"></textarea>
                    </div>
                    <div>
                        <input class="button success" type="submit" name="add_post" value="Add New Post"/>
                    </div>
                </form>
            </div>
        </div>
      <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <?php 
    // If category field is blank, display an alert
    if(!empty($error_message)) { ?>
        <div class="callout alert">
            <?php echo $error_message; ?>
        </div>
    <?php } ?>

    <?php 
    // If category is added, display success message
    if(!empty($success_message)) { ?>
        <div class="callout success">
            <?php echo $success_message; ?>
        </div>
    <?php } ?>

    <div>
    <!-- TABLE TO SHOW POST INFO -->
    <table class="hover">
      <thead>
        <tr>
          <th width="150">Post Title</th>
          <th width="200">Post Body</th>
          <th width="150">Image URL</th>
            <th width="150">Delete Post</th>
            <th width="150">Edit Post</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          foreach($posts as $post) : ?>
            <tr>
                <td><strong><?php echo $post['post_title']; ?></strong></td>
                <!-- CUSTOM FUNCTION FOR POST TO BE 100 CHARACTERS ONLY -->
                <td><?php custom_echo($post['post_body'], 100);?></td>
                <td><?php echo $post['post_image']; ?></td>
                <td>
                    <form action="delete_post.php" method="post">
                    <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
                    <input class="button alert" type="submit" value="Delete">
                    </form>
                </td>
                <td>
                    <form action="update_post.php" method="post">
                    <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
                    <input class="button success" type="submit" value="Edit">
                    </form>
                </td>
            </tr>
      </tbody>
    <?php endforeach; ?>
    </table>
    </div>


    <?php
    include('inc/admin-finish.php');
    include('../inc/footer.php'); 
    
} else { 
    //IF USER NOT AUTHORIZED, SEND TO LOGIN
    header('Location: auth.php');

}