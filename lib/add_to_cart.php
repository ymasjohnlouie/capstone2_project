<?php
	session_start();
	$id = $_POST['item_id'];
	$quantity = $_POST['item_quantity'];

	//update the items for session cart
	//cart = [quantity]; ex. [3, 1, 0, 5];
	//item 1 has 3 orders, item 2 has 1 order, item 3 has 0, etc.
	//Let a = $_SESSION['cart'] which is an array.
	//Let a[0] = 10; -> [10], let a[1] = 1; -> [10, 1]
	// $_SESSION['cart'] = array();
	//[id] servers as the INDEX of my variable called $_SESSION['cart'] and transformed into an array
	$_SESSION['cart'][$id] = $quantity;
	//update the total quantity of items to be purchased
	$_SESSION['item_count'] = array_sum($_SESSION['cart']);

	echo '<label style="color: black;">Cart</label> <strong style="color:red;">( '.$_SESSION['item_count'].' )</strong>';
?>