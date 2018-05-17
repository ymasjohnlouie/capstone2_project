<?php
session_start();

require_once "./lib/connect.php";

if (isset($_GET['id'])) {
	$user_id = $_GET['id'];
	$status_qry = "UPDATE users SET status_id = 1 WHERE id = $user_id";
	$result = mysqli_query($conn, $status_qry);
	// print_r($status_qry);
	header("Location: ./view_account.php");
}
mysqli_close($conn);
?>