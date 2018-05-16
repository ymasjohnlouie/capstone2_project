<?php
	session_start();
	require_once "connect.php";
	$uname = $_POST['username'];
	$pword = sha1($_POST['password']);

	$query = "SELECT * FROM users WHERE username = '$uname' AND password = '$pword'";
	$result = mysqli_query($conn, $query);

	if(mysqli_num_rows($result) > 0 && ($row['role_id'] = 1)){
		foreach($result as $row){
			$_SESSION['current_user'] = $row['username'];
		}
		header("Location: ../admin_page.php");
	} else {
		$_SESSION['msg'] = "Invalid credentials";
		header("location: ../login.php");
	}

	if(mysqli_num_rows($result) > 0 && ($row['role_id'] != 1)){
		foreach($result as $row){
			$_SESSION['current_user'] = $row['username'];
		}
		header("Location: ../home.php");
	}

	if(mysqli_num_rows($result) > 0 && ($row['status_id'] != 1)){
		foreach($result as $row){
		$_SESSION['msg'] = "Account Has Been Disabled!";
		}
		header("location: ../login.php");
	}
?>