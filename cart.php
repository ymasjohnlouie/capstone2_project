<?php

session_start();

// Request DB connection
require './lib/connect.php';

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
			<?php
			echo '<li><a href="./cart.php">My Cart<span class="badge" id="cart_item"></span></a></li>';
			?>
			<li><a href="./catalog.php">Catalog</a></li>
			<li><?php
			if (isset($_SESSION['current_user'])){
				echo '
				<ul class="block-menu">
				<li>
				<a href="./profile.php">Profile</a>
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
				<li>
				<a href="./logout.php">Log Out</a>
				</li>
				</ul>
				';
			}
			?>
		</li>
		<li>
			<?php
			if (isset($_SESSION['cart'])){
				echo '
				<ul class="block-menu">
				<li>
				<a href="checkout.php">Checkout</a>
				</li>
				<li>
				<a href="./lib/clear_cart.php">Clear Cart</a>
				</li>
				</ul>
				';
			}
			?>
		</li>
	</ul>
</div>

<main class="wrapper">


			<?php

			if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

				$total = 0;
				$i = 1;
				foreach($_SESSION['cart'] as $row_key => $row_value){
					$item_chosen_id = $row_key;
					$item_Quantity = $row_value;

					$cart_item_sql = "SELECT i.image_path, i.product_name, i.price, c.name FROM items i, categories c WHERE i.id = '$item_chosen_id' AND i.category_id = c.id";
					$cartitem = mysqli_query($conn, $cart_item_sql) or die(mysqli_error($conn));
					$r = mysqli_fetch_assoc($cartitem);


					
					foreach($cartitem as $item){
						extract($item);
						$subtotal = $price * $item_Quantity;
							// $new_subtotal = $english_format_number = number_format($subtotal);
							// $new_price = $english_format_number = number_format($price);

							// var_dump($subtotal);
						$total = $total + $subtotal;
						$_SESSION['totalitemprice'] = $total;
						$i++;

						echo '
	<table class="cart-tbl">
					<tbody>
						<tr>
							<th>Image</th>
							<th>Product Name</th>
							<th>Price(&#8369)</th>
							<th>Brand</th>
							<th>Subtotal(&#8369)</th>
							<th>Quantity</th>
							<th colspan=2>Action To Do</th>
						</tr>
						<tr>
						<td><img src="'.$image_path.'" class="item_image" style="width:150px; height:150px;"></td>
						<td>'.$product_name.'</td>
						<td><input id="price'.$item_chosen_id.'" type="text" name="price" value='.$price.'.00 readonly></td>
						<td>'.$name.'</td>
						<td><input class="subtotal" id="subtotal'.$item_chosen_id.'" type="number" name="subtotal" value='.$subtotal.' readonly></td>
						<td><input id="itemQuantity'.$item_chosen_id.'" type="number" name="quantity" value='.$item_Quantity.' min="1" onchange="updateCart('.$item_chosen_id.')"></td>
						<td><a href="./lib/delete_cart.php?id='.$item_chosen_id.'" class="btn btn-danger">Remove From Cart</a></td>
						</tr>
						</tbody>
					</table>
					<br>
						';
					}
					
				}
			} else {
				echo "<h3>" . "Your Cart is Empty!" . "</h3>" . '<a href="./catalog.php" style="color:blue">Go To Shopping</a>' . "<br>";
				$total = 0;
			}
			?>
	<strong>Total Price: &#8369</strong>
	<strong><span class="total_price"><?php echo $english_format_number = number_format($total); ?></span>.00</strong>


</main>	<!-- /.wrapper -->

<?php include "./partials/footer.php"; ?>

<?php include "./partials/foot.php"; ?>