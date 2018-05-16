<?php

function getTitle()
{
	echo "My Cart Page";
}

include "./partials/head.php";

?>


</head>
<body>

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
    <li><a href="./profile.php">Profile</a></li>
    <li><a href="./logout.php">Log Out</a></li>
</ul>
</div>
</nav>

	<main class="wrapper">

		<h1>My Cart Page</h1>

	</main>	<!-- /.wrapper -->

	<?php

		include "./partials/footer.php";

	?>

<?php

include "./partials/foot.php";

?>