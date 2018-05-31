<?php
	session_start();

	$id = $_POST['cartItem_id'];
	$cartItemQuantity = $_POST['cartQty'];
	
	$_SESSION['cart'][$id] = $cartItemQuantity;

	$_SESSION['item_count'] = array_sum($_SESSION['cart']);

	echo '<label style="color: black;">Cart</label> <strong style="color:red;">( '.$_SESSION['item_count'].' )</strong>';
?>