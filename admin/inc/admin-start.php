<div class="app-dashboard shrink-medium">
<div class="row expanded app-dashboard-top-nav-bar">
<div class="columns medium-2">
  <button data-toggle="app-dashboard-sidebar" class="menu-icon hide-for-medium"></button>
  <a href="<?php echo ROOT_URL; ?>" class="app-dashboard-logo"><i class="large fa fa-diamond"></i></a>
</div>
<div class="columns show-for-medium">
  <div class="app-dashboard-search-bar-container">
    <input class="app-dashboard-search" type="search" placeholder="Search">
    <i class="app-dashboard-search-icon fa fa-search"></i>
  </div>
</div>
<div class="columns shrink app-dashboard-top-bar-actions">
    <?php echo '<span class="welcome_message">Welcome, ' . $_SESSION['username'] . '!</span>'; ?>
</div>
</div>

<div class="app-dashboard-body off-canvas-wrapper">
<div id="app-dashboard-sidebar" class="app-dashboard-sidebar position-left off-canvas off-canvas-absolute reveal-for-medium" data-off-canvas>
  <div class="app-dashboard-sidebar-title-area">
    <div class="app-dashboard-close-sidebar">
        <a href="index.php">
            <h4 class="app-dashboard-sidebar-block-title">Dashboard</h4>
        </a>
      <!-- Close button -->
      <button id="close-sidebar" data-app-dashboard-toggle-shrink class="app-dashboard-sidebar-close-button show-for-medium" aria-label="Close menu" type="button">
        <span aria-hidden="true"><a href="#"><i class="large fa fa-angle-double-left"></i></a></span>
      </button>
    </div>
    <div class="app-dashboard-open-sidebar">
      <button id="open-sidebar" data-app-dashboard-toggle-shrink class="app-dashboard-open-sidebar-button show-for-medium" aria-label="open menu" type="button">
        <span aria-hidden="true"><a href="#"><i class="large fa fa-angle-double-right"></i></a></span>
      </button>
    </div>
  </div>
  <div class="app-dashboard-sidebar-inner">
    <ul class="menu vertical">
     <li>
        <a href="posts.php" class="is-active">
        <i class="large fa fa-archive"></i><span class="app-dashboard-sidebar-text">Manage Posts</span>
        </a>
      </li>
      <li>
        <a href="categories.php" class="is-active">
        <i class="large fa fa-list-alt"></i><span class="app-dashboard-sidebar-text">Manage Categories</span>
        </a>
      </li>
<!--
      <li>
        <a href="calendar.php">
        <i class="large fa fa-calendar"></i><span class="app-dashboard-sidebar-text">Calendar</span>
        </a>
      </li>
-->
      <li>
        <a href="logout.php">
        <i class="large fa fa-connectdevelop"></i><span class="app-dashboard-sidebar-text">Log Out</span>
        </a>
      </li>
    </ul>
  </div>
</div><!-- end of sidebar -->

<div class="app-dashboard-body-content off-canvas-content" data-off-canvas-content>