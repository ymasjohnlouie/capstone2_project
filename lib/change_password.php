<?php
	session_start();
	require_once "connect.php";

	$current_user = $_SESSION['current_user'];
	$curr_pword = $_POST['password1'];
	$new_pword = sha1($_POST['password2']);

	$pword_query = "UPDATE users SET password = '$new_pword' WHERE username = '$current_user'";
	$result_pword = mysqli_query($conn, $pword_query);
		
	$_SESSION['msg'] = "Password Has Been Changed!";
	header("location: ../login.php");
	
?>