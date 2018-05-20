<?php

function getTitle()
{
	echo "My Cart Page";
}

require "./lib/connect.php";
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
    <li><a href="./login.php">Log In</a></li>
    <li><a href="./register.php">Register</a></li>
</ul>
</div>
</nav>

	<main class="wrapper">

		<h1>My Cart Page</h1>

		<div class="grid cart">

		<?php if(isset($_SESSION['cart'])):?>

			<?php
				$indexarrays = array_keys($_SESSION['cart']); //gets all indexes of session cart
				$strarray = implode("','",$indexarrays); //return string of array 
				$products_qry = "SELECT * FROM products WHERE id IN('".$strarray."') ORDER BY pName";
				$result_products = mysqli_query($conn,$products_qry); 
			?>
			<div class="grid btshop">
				<h2>Your Cart</h2>
				<p><a href="./catalog.php#mainnav">&#8592;Back to shopping</a></p>
			</div>
			<span class="deletemessage"></span>
			<div class="grid cartheader">
				<h4>Product</h4>
				<h4>Quantity</h4>
				<h4>Price</h4>
				<h4>Subtotal</h4>
			</div>

			<?php while($products = mysqli_fetch_assoc($result_products)):?>

				<div class="grid cartitems" data-productid="<?=$products['id'] ?>">
					<p><?= $products['pName']?></p>
					<div class="editqty">
						<input class="editinputqty" type="number" name="qtyproduct" value="<?= $_SESSION['cart'][$products['id']] ?>">	
						<i class="fa fa-pencil" aria-hidden="true"></i>
						<i class="deletecartitem fa fa-trash" aria-hidden="true"></i>
					</div>
					<p class="unitprice" data-unitprice="<?= $products['pPrice'] ?>"><?= "₱".$products['pPrice'] ?></p>
					<p class="subprice"><?= "₱".$products['pPrice'] * $_SESSION['cart'][$products['id']] ?></p>
				</div>

			<?php endwhile;?>

			<div class="grid totalcont">

				<?php if(isset($_SESSION['user'])):?>
					<button class="btn checkoutbtn"><i class="fa fa-check-square-o" aria-hidden="true"></i>Checkout</button>
				<?php endif;?>

				<?php if(!isset($_SESSION['user'])):?>
					<button class="btn" data-toggle="modal" data-target="#checkoutmodal"><i class="fa fa-check-square-o" aria-hidden="true"></i>Checkout</button>
				<?php endif;?>

				<div class="grid totalcont">
					<h4 class="text-center">Total Amount : </h4>
					<h5 class="totalpricebot"><?= "₱".$_SESSION['total_amount'] ?></h5>
				</div>
			</div>	
		<?php endif;?>

		<?php if(!isset($_SESSION['cart'])):?>
			<h2>Your Cart is Empty!</h2>
		<?php endif;?>

	</div>
	<!-- /Project ends here-->

	<!-- Central Modal Small -->
		<div class="modal fade" id="checkoutmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Log in Required</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body grid">
						<p>Please log in to continue purchasing</p>
						<button type="button" class="btn registercart">Register</button>
						<p class="text-center">or</p>
						<button type="button" class="btn btn-info logincart">Log IN</button>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-brown" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

	</main>	<!-- /.wrapper -->

	<?php include "./partials/footer.php"; ?>

<?php include "./partials/foot.php"; ?>