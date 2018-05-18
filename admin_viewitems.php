<?php

session_start();

// Request DB connection
require './lib/connect.php';

// Get ID of current item
if (isset($_GET['id'])) {
	$item_id = $_GET['id'];
	$item_sql = "SELECT i.id, i.image_path, i.product_name, i.description, i.price, c.name FROM items i, categories c WHERE i.id='$item_id' AND i.category_id = c.id";
	$item = mysqli_query($conn, $item_sql) or die(mysqli_error($conn));	// $conn is from ./lib/connect.php
}

// Test display of item details
/*foreach ($item as $column) {
	extract($column);
	echo $image_path . '<br>';
	echo $product_name . '<br>';
	echo $description . '<br>';
	echo $price . '<br>';
	echo $name . '<br>';
}
*/


function getTitle()
{
	echo "Item Page";
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

		<h1>Item Page</h1>

		<table>
			<tbody>
				<?php

				foreach ($item as $column) {
					//var_dump($column);

					extract($column);

					echo '
						<tr>
							<th rowspan = 2><img src="'.$image_path.'"></th>
							<th>Product Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Brand</th>
							<th>Button1</th>
							<th>Button2</th>
						</tr>
						<tr>
							<td>'.$product_name.'</td>
							<td>'.$description.'</td>
							<td>'.$price.'</td>
							<td>'.$name.'</td>
							<td><a href="update_item.php?id='.$id.'" class="btn btn-primary" role="button">Update Item</a></td>
							<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal'.$id.'">Delete Item</button></td>
						</tr>

						<div class="modal fade" id="myModal'.$id.'" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete this item?</p>
              </div>
              <div class="modal-footer">
                <a href="./lib/admin_deleteitem.php?id='.$id.'" class="btn btn-danger" role="button">Delete Item</a>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
					';
				}
				?>
			</tbody>
		</table>

	</main>	<!-- /.wrapper -->

	<?php include "./partials/footer.php"; ?>

<?php include "./partials/foot.php"; ?>