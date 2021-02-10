<?php 
session_start();

if(isset($_SESSION["username"])) {
    require_once('../conf/config.php');
    include('../inc/header.php');
    include('inc/admin-start.php');

    if(isset($_POST['add_category'])) {
        $error_message = '';
        $success_message = '';
        $category_name = filter_input(INPUT_POST, 'category_name');

        if($category_name == '') {
            $error_message = '<p class="lead">Fields can not be empty.</p>';
        } else {
            $query = 'INSERT INTO categories (category_name) VALUES(:category_name)';
            $stmt = $db->prepare($query);
            $stmt->bindValue(':category_name', $category_name);
            $stmt->execute();
            $stmt->closeCursor();
            $success_message = '<p class="lead">Category name has beed added!</p>';
        }
    }
    
    $query = 'SELECT * FROM categories ORDER BY category_id DESC';
    $stmt2 = $db->prepare($query);
    $stmt2->execute();
    $categories = $stmt2->fetchAll();
    $stmt2->closeCursor();


    ?>

    <h2 class="text-center">Manage Categories</h2>
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
    <button class="button" data-open="add-new-category">Add New Category</button>
    <div class="reveal" id="add-new-category" data-reveal>
      <div class="card">
            <div class="card-divider">
                <h4>Add a New Category</h4>
            </div>
            <div class="card-section">
                <form id="new_categories" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div>
                    <!--<input type="hidden" name="created_by" value="Bekkah"/>-->
                    <input type="text" name="category_name" placeholder="Category Name"/>
                    </div>
                    <div>
                    <input class="button success" type="submit" name="add_category" value="Add New Category"/>
                    </div>
                </form>
            </div>
        </div>
      <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <div>
    <table class="hover">
      <thead>
        <tr>
          <!--<th width="20">Cat. ID</th>-->
          <th width="150">Category Name</th>
          <th width="100">Date Created</th>
          <th width="150">Delete Category</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          foreach($categories as $category) : ?>
        <tr>
          <!--<td><?php //echo $category['category_id']; ?></td>-->
          <td><?php echo $category['category_name']; ?></td>
          <td><?php echo $category['date_time']; ?></td>
          <!--<td><?php //echo $categories['created_by']; ?></td>-->
            <td>
                <form action="delete_category.php" method="post">
                <input type="hidden" name="category_id" value="<?php echo $category['category_id']; ?>">
                <input class="button alert" type="submit" value="Delete">
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
    header('Location: auth.php');

}

?>