<?php
	session_start();

	if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){
		unset($_SESSION['cart']);
		header('location:../cart.php');
	}
?>