<div class="container">
<nav class="navbar navbar-expand-lg">
    <img src="assets/img/time_machine.png">
    <div class="collapse navbar-collapse" id="navbarText">
        <div class="navbar-nav mr-auto">
        </div>
          <span class="navbar-text" style="color: black">
              <p class="time">Philippine Standard Time | <span class="date" id="time"></span> |
                <?php
                  date_default_timezone_set('Asia/Manila');
                  echo date('l | F d, Y');
                ?>
              </p>
          </span>
    </div>
</nav>
</div>
<div class="container2">
  <ul class="block-menu">
    <li><a href="./cart.php">My Cart</a></li>
    <li><a href="./catalog.php">Catalog</a></li>
    <li><a href="./about.php">About</a></li>
    <li><?php
      if (isset($_SESSION['current_user'])){
        echo '
          <ul class="block-menu">
          <li>
            <a href="./logout.php">Log Out</a>
          </li>
          </ul>
        ';
      } else {
        echo '
          <ul class="block-menu">
          <li>
            <a href="./login.php">Log In</a>
          </li>
          <li>
            <a href="./register.php">Register</a>
          </li>
          </ul>
        ';
      }
      ?>
    </li>
    <li>
      <?php
        if (isset($_SESSION['current_user'])){
          echo '
            <ul class="block-menu">
            <li class="nav-item">
              <a class="nav-link" href="./home.php">Home</a>
            </li>
            </ul>
          ';
        }
      ?>
    </li>
    <li>
      <?php
        if (isset($_SESSION['current_user'])){
          echo '
            <ul class="block-menu">
            <li>
              <a href="./profile.php">Profile</a>
            </li>
            </ul>
          ';
        }
      ?>
    </li>
</ul>
</div>
</nav>