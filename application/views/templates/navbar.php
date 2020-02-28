<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-xl">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">Ponto</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php 
        if(isset($_SESSION['logged'])):
          require_once "logged_links.php";
        else: 
      ?>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>register">Sign up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>login">Log in</a>
          </li>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</nav>