<?php
require_once('../conf/config.php');

// Get ID
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Delete the category from the database
if ($category_id != false && $category_id != false) {
    $query = 'DELETE FROM categories
              WHERE category_id = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Refresh the page
include('categories.php');