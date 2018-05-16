<?php

session_start();

// Request DB connection
require './lib/connect.php';

// Get ID of current item
if (isset($_GET['id'])) {
	$item_id = $_GET['id'];
	$item_sql = "SELECT i.image_path, i.product_name, i.description, i.price, c.name FROM items i, categories c WHERE i.id='$item_id' AND i.category_id = c.id";
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

	<?php include "./partials/header.php"; ?>

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
							<th>Image</th>
							<th>Product Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Brand</th>
							<th>Button1</th>
							<th>Button2</th>
						</tr>
						<tr>
							<td><img src="'.$image_path.'" alt=""></td>
							<td>'.$product_name.'</td>
							<td>'.$description.'</td>
							<td>'.$price.'</td>
							<td>'.$name.'</td>
							<td><a href="delete_item.php" class="btn btn-primary" role="button">Delete Item</a></td>
							<td><a href="update_item.php" class="btn btn-primary" role="button">Update Item</a></td>
						</tr>
					';
				}

				?>
			</tbody>
		</table>

	</main>	<!-- /.wrapper -->

	<?php include "./partials/footer.php"; ?>

<?php include "./partials/foot.php"; ?>