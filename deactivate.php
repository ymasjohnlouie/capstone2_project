<?php
session_start();

$login_name = $_SESSION['current_user'];
require_once "./lib/connect.php";

$status_qry = "UPDATE users SET status_id = 2 WHERE role_id != 1 AND username = '$login_name'";
$result = mysqli_query($conn, $status_qry);
header("Location: ./login.php");
mysqli_close($conn);

?>