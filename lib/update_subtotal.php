<?php
	session_start();

	$cartQuantity = $_POST['cartQty'];
	$cartPrice = $_POST['cartPrice'];

	//update the items for session cart
	//cart = [quantity]; ex. [3, 1, 0, 5];
	//item 1 has 3 orders, item 2 has 1 order, item 3 has 0, etc.
	//Let a = $_SESSION['cart'] which is an array.
	//Let a[0] = 10; -> [10], let a[1] = 1; -> [10, 1]
	// $_SESSION['cart'] = array();
	//[id] servers as the INDEX of my variable called $_SESSION['cart'] and transformed into an array
	$subtotal = $cartQuantity * $cartPrice;

	echo $subtotal;
?>