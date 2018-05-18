<?php

session_start();

// Request DB connection
require './lib/connect.php';

// Get ID of current item
if (isset($_GET['id'])) {
	$brand_id = $_GET['id'];
	$brand_sql = "SELECT i.id, i.image_path, i.product_name, i.description, i.price, c.name FROM items i, categories c WHERE i.id='$brand_id' AND i.category_id = c.id";
	$brand = mysqli_query($conn, $brand_sql) or die(mysqli_error($conn));	// $conn is from ./lib/connect.php
}

function getTitle()
{
	echo "Edit Profile Page";
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
    <!-- <li><a href="./cart.php">My Cart</a></li> -->
    <!-- <li><a href="./catalog.php">Catalog</a></li> -->
    <li><a href="edit_profile.php">Edit Profile</a></li>
    <li><a href="view_items.php">View Items</a></li>
    <li><a href="./logout.php">Log Out</a></li>
    <li><a href="view_account.php">View User Accounts</a></li>
    <li><a href="add_item.php">Add Item</a></li>
</ul>
</div>
</nav>

	<main class="wrapper">

		<h1>Update Item</h1>

		<div class="row">
			<div class="col-md-6 offset-md-3">
				<?php

				foreach ($brand as $value) {

					extract($value);

					echo '
				<form action="./lib/admin_updateitem.php" method="POST">
					<div class="form-group">
						<label for="product_name" hidden readonly>Product Name:</label>
						<input type="number" class="form-control" name="product_id" id="product_id" value='.$id.' hidden readonly>
					</div>
					<div class="form-group">
						<label for="image">Image:</label>
						<img src="'.$image_path.'">
					<input type="file" name="file">
					</div>
					<div class="form-group">
						<label for="product_name">Product Name:</label>
						<input type="text" class="form-control" name="product_name" id="product_name" value='.$product_name.'>
					</div>
					<div class="form-group">
						<label for="description">Description:</label>
						<input type="text" class="form-control" name="description" id="description" value='.$description.'>
					</div>
					<div class="form-group">
						<label for="price">Price:</label>
						<input type="text" class="form-control" name="price" id="price" value='.$price.'>
					</div>
					<button type="submit" class="btn btn-primary" id="update" name="submit">Update</button>
				</form>
		';
	}
		?>
			</div>
		</div>


	</main>	<!-- /.wrapper -->

	<?php include "./partials/footer.php"; ?>

<?php include "./partials/foot.php"; ?>