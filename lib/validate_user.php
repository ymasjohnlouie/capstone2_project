<?php
	require_once "connect.php";

	if(isset($_POST['uname'])){
		$uname = $_POST['uname'];
		$query = "SELECT * FROM users WHERE username = '$uname'";
		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) > 0){	//check the number of rows
			echo "Username already exists";
		} else if(empty($_POST['uname'])) {
			echo "Enter valid username";
		} else
			echo "Username available";
	}

?>