<?php

session_start();

// Request DB connection
require './lib/connect.php';


if (isset($_SESSION['current_user']) && !empty($_SESSION['cart'])){

	$login_name = $_SESSION['current_user'];

	$query = "SELECT r.role_title, u.username, u.address, u.email, u.id, u.date_of_birth, u.first_name, u.last_name, u.contact_number, u.gender FROM users u, roles r WHERE u.role_id = r.id AND u.username = '$login_name'";
$profile_checkout = mysqli_query($conn, $query) or die(mysqli_error($conn));	// $conn is from ./lib/connect.php


// Get ID of current item
if (isset($_GET['id'])) {
	$role_id = $_GET['id'];
}
}

if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
	$total = 0;
	$i = 1;
	foreach($_SESSION['cart'] as $row_key => $row_value){
		$item_chosen_id = $row_key;
		$item_Quantity = $row_value;
		$total = $_SESSION['totalitemprice'];
		$new_total = $english_format_number = number_format($total);

		$cart_item_sql = "SELECT i.image_path, i.product_name, i.price, c.name FROM items i, categories c WHERE i.id = '$item_chosen_id' AND i.category_id = c.id";
		$cartitem = mysqli_query($conn, $cart_item_sql) or die(mysqli_error($conn));
		$r = mysqli_fetch_assoc($cartitem);

		foreach($cartitem as $item){
			extract($item);
			$subtotal = $price * $item_Quantity;
			$new_subtotal = $english_format_number = number_format($subtotal);
		}
	}
}

function getTitle()
{
	echo "Checkout Page";
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

<main class="wrapper">

	<table>
			<tbody>
				<tr>
					<th>Image</th>
					<th>Product Name</th>
					<th>Brand</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Subtotal</th>
				</tr>

	<?php

	if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

	$total = 0;
	$i = 1;
	foreach($_SESSION['cart'] as $row_key => $row_value){
		$item_chosen_id = $row_key;
		$item_Quantity = $row_value;
		$total = $_SESSION['totalitemprice'];
		$new_total = $english_format_number = number_format($total);
		$_SESSION['newtotalprice'] = $new_total;


		$cart_item_sql = "SELECT i.image_path, i.product_name, i.price, c.name FROM items i, categories c WHERE i.id = '$item_chosen_id' AND i.category_id = c.id";
		$cartitem = mysqli_query($conn, $cart_item_sql) or die(mysqli_error($conn));
		$r = mysqli_fetch_assoc($cartitem);

		foreach($cartitem as $item){
			extract($item);
			$subtotal = $price * $item_Quantity;
			$new_subtotal = $english_format_number = number_format($subtotal);
			$new_price = $english_format_number = number_format($price);

			echo '
			<tr>
				<td><img src="'.$image_path.'" class="item_image" style="width:150px; height:150px;"></td>
				<td>'.$product_name.'</td>
				<td>'.$name.'</td>
				<td>&#8369 '.$new_price.'.00</td>
				<td>'.$item_Quantity.'</td>
				<td>&#8369 '.$new_subtotal.'.00</td>
			</tr>
			';
		}
	}
}

	if (isset($_SESSION['current_user']) && !empty($_SESSION['cart'])){
		foreach ($profile_checkout as $column_user) {
			extract($column_user);
			$_SESSION['current_userid'] = $id;
			echo '
			<div class="row">
					<div class="col-md-6">
					<h1>Contact Information</h1>
					<form action="confirmation_page.php" method="POST">
						<div class="form-group">
							<label for="first_name">First Name:</label>
								<input type="text" class="form-control" name="first_name" id="first_name" value='.$first_name.' required>
						</div>
						<div class="form-group">
							<label for="last_name">Last Name:</label>
								<input type="text" class="form-control" name="last_name" id="last_name" value='.$last_name.' required>
						</div>
						<div class="form-group">
							<label for="address">Address:</label>
								<input type="text" class="form-control" name="address" id="address" Placeholder="House No., Street Name, Barangay, City/Municipality" value='.$address.' required>
						</div>
						<div class="form-group">
							<label for="email">Email Address:</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="e.g. test@gmail.com" value='.$email.' required>
						</div>
						<div class="form-group">
							<label for="contact_number">Contact Number:</label>
								<input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="e.g. 09991234567" value='.$contact_number.' required>
						</div>
						<button type="submit" class="btn btn-primary" id="update">Confirm</button>
					</form>
					</div>
					<div class="col-md-6">
						<h1>Payment Guidelines</h1>
						<ul>
							<li>Cash on Delivery</li>
							<li>Thru Bank Deposit
								<ul>
									<li>BPI (Bank of the Philippine Islands) Account Number 3399468107</li>
									<li>PSBank (Philippine Savings Bank) Account Number 001-11122127-9</li>
								</ul>
							</li>
						</ul>
					</div>
			</div>
			';
		} 
	} if (isset($_SESSION['current_user']) && empty($_SESSION['cart'])){
		echo "<a href='catalog.php'>Go To Shopping</a>";
		$total = 0;
	} if(empty($_SESSION['current_user']) && !empty($_SESSION['cart'])){
		echo "You must " . "<a href='login.php'>Log In</a>" . " first or " . "<a href='register.php'>Register</a>" . " to proceed in checkout.";
	} if(empty($_SESSION['current_user']) && empty($_SESSION['cart'])){
		echo "<a href='catalog.php'>Go To Shopping</a>";
		$total = 0;
	}
	
	?>
	<br>
	<h1>Items Ordered</h1>
		</tbody>
	</table>
		<div class="form-group">
			<label for="total_price"><strong>Total Price: &#8369 <?php echo $english_format_number = number_format($total).'.00'; ?></strong></label>
		</div>


</main>	<!-- /.wrapper -->

<?php include "./partials/footer.php"; ?>

<?php include "./partials/foot.php"; ?>