<?php

session_start();

// Request DB connection
require './lib/connect.php';

function getTitle()
{
	echo "Catalog Page";
}

include "./partials/head.php";

// Request data from DB
$items_sql = "SELECT * FROM items";
$items = mysqli_query($conn, $items_sql);

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
    <li><a href="edit_profile.php">Edit Profile</a></li>
    <li><a href="admin_page.php">Profile</a></li>
    <li><a href="view_items.php">View Items</a></li>
    <li><a href="view_account.php">View User Accounts</a></li>
    <li><a href="./lib/admin_additem.php">Add Item</a></li>
    <li><a href="./logout.php">Log Out</a></li>
</ul>
</div>
</nav>

	<main class="wrapper">

		<h1>Catalog Page</h1>

		<div class="container">
			<div class="row">

		<?php

		foreach ($items as $item) {
			//var_dump($item);
			// echo $item['product_name'] . '<br>';
			// echo $item['description'] . '<br>';
			// echo $item['image_path'] . '<br>';

			extract($item);	// Built-in function of php; it converts column names to variables

			echo '
				<div class="card col-md-4" style="width: 18rem;" id="item_table">
					<img class="card-img-top" src="'.$image_path.'" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">'.$product_name.'</h5>
						<div class="col-md-6 offset-md-3">
						<a href="admin_viewitems.php?id='.$id.'" class="btn btn-primary">View Details</a>
						</div>
					</div>
				</div>
			';
		}
					
		?>

			</div>
		</div>

	</main>	<!-- /.wrapper -->

	<?php

		include "./partials/footer.php";

	?>


<?php

include "./partials/foot.php";

?>