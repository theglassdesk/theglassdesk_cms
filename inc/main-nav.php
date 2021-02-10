<div data-sticky-container>
    <nav class="top-bar topbar-responsive" data-sticky data-options="marginTop:0;" style="width:100%" data-top-anchor="1">
      <div class="top-bar-title">
        <span data-responsive-toggle="topbar-responsive" data-hide-for="medium">
          <button class="menu-icon" type="button" data-toggle></button>
        </span>
        <a class="topbar-responsive-logo" href="<?php echo ROOT_PATH; ?>index.php"><i class="large fa fa-diamond"></i></a>
      </div>
      <div id="topbar-responsive" class="topbar-responsive-links">
        <div class="top-bar-right">
          <ul class="menu simple vertical medium-horizontal">
            <li><a href="<?php echo ROOT_PATH; ?>index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#works">Works</a></li>
            <li><a href="#blogs">News</a></li>
              <li><a href="#" data-open="contact">Contact</a></li>
            <li><a href="admin/auth.php">
              <button type="button" class="button hollow topbar-responsive-button">Admin</button></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</div>


    
<div class="reveal tiny" id="contact" data-reveal>
  <h1>Contact me</h1>
  <form action="" method="post">
      <input type="text" name="name" placeholder="Full Name">
      <input type="email" name="email" placeholder="Your Email">
      <textarea name="message" placeholder="Your Message"></textarea>
      <button type="submit" class="button success expanded"><i class="white large fa fa-paper-plane-o"></i></button>
    </form>
    <p class="lead">or</p>
    <h3>Download my resume</h3>
    <button type="button" name="resume" class="button expanded"><i class="large fa fa-download"></i></button>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>