<?php
	require_once "connect.php";

	$login_username = $_POST['login_username'];
	$login_password = $_POST['login_password'];
	$status_id = $_POST['status_id'];

	$query = "SELECT * FROM users WHERE username = '$login_username' AND password = '$login_password' AND status_id = '$status_id'";
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result) == 0){
		echo "Invalid credentials";	
	}
?>