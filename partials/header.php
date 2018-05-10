<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Time Machine</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <?php

      if (isset($_SESSION['current_user'])){
        echo '
          <li class="nav-item">
            <a class="nav-link" href="./home.php">Home</a>
          </li>
        ';
      }

      ?>

      <div class="container">
  <ul class="block-menu">
  </ul>
  <ul class="block-menu">
      <li><h5><?php echo date('l | F d, Y'); ?> | Philippine Standard Time | <span class="date" id="time"></span></h5></li><br>
    <li><a href="/">My Cart</a></li>
    <li><a href="/demos">Catalog</a></li>
    <li><a href="/articles">About</a></li>
      <li><a href="/contact">Log In</a></li>
      <li><a href="/contact">Register</a></li>
   </ul>

  </div>
      <!-- <li class="nav-item">
        <a class="nav-link" href="./cart.php">My Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./catalog.php">Catalog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./about.php">About</a>
      </li> -->
      <?php

      if (isset($_SESSION['current_user'])){
        echo '
          <li class="nav-item">
            <a class="nav-link" href="./logout.php">Log Out</a>
          </li>
        ';
      } else {
        echo '
          <li class="nav-item">
            <a class="nav-link" href="./login.php">Log In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">Register</a>
          </li>
        ';
      }
      ?>

      <?php

      if (isset($_SESSION['current_user'])){
        echo '
          <li class="nav-item">
            <a class="nav-link" href="./profile.php">Profile</a>
          </li>
        ';
      }
      ?>
    </ul>
  </div>
</nav>