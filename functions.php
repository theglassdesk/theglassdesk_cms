<?php
require_once('conf/config.php');

//FUNCTION TO GET ALL THE POSTS
function get_posts() {
    global $db;
    $query = 'SELECT * FROM posts ORDER BY post_id DESC';
    $stmt2 = $db->prepare($query);
    $stmt2->execute();
    $posts = $stmt2->fetchAll();
    $stmt2->closeCursor();
    return $posts;
}

//FUNCTION TO LIMIT THE AMOUNT OF CHARACTERS TO SHOW FOR POST BODY
function custom_echo($x, $length) {
    if(strlen($x) <= $length) {
    echo $x;
    } else {
    $y = substr($x, 0, $length) . ' ...';
    echo $y;
    }
}