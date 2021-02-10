<?php
require_once('../conf/config.php');

// Get IDs
$post_id = filter_input(INPUT_POST, 'post_id', FILTER_VALIDATE_INT);
//$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($post_id != false && $post_id != false) {
    $query = 'DELETE FROM posts
              WHERE post_id = :post_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':post_id', $post_id);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Refresh the page
include('posts.php');