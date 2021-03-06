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
							<th rowspan = 2><img src="'.$image_path.'" class="item_image"></th>
							<th>Product Name</th>
							<th>Description</th>
							<th>Price(&#8369)</th>
							<th>Brand</th>
							<th rowspan = 2><button class="btn btn-primary form-control" onclick="addToCart('.$id.')">Add To Cart</button></th>
							<th rowspan = 2><input id="itemQuantity'.$id.'" type="number" name="quantity" value="0" min="1"></th>
						</tr>
						<tr>
							<td>'.$product_name.'</td>
							<td>'.$description.'</td>
							<td>&#8369 '.$english_format_number = number_format($price).'.00</td>
							<td>'.$name.'</td>
						</tr>
					';
				}
				?>
			</tbody>
		</table>

	</main>	<!-- /.wrapper -->

	<?php include "./partials/footer.php"; ?>

	<?php include "./partials/foot.php"; ?>