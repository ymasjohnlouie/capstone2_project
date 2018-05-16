<?php
	require_once "connect.php";

	if(isset($_POST['email']) && !empty($_POST['email'])){
		$email = $_POST['email'];
		$query = "SELECT * FROM users WHERE email = '$email'";	//check if there's an email existing
		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) > 0){	//check the number of rows
			echo "Email already exists";
		} else if(empty($_POST['email'])) {
			echo "Enter valid email address";
		} else
			echo "Email available";
	}

?>