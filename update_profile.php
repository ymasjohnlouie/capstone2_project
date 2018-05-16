<?php
session_start();

require_once "./lib/connect.php";

$login_user = $_SESSION['current_user'];
$username = $_POST['username'];
$address = $_POST['address'];
$email = $_POST['email'];
$date_of_birth = $_POST['date_of_birth'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$contact_number = $_POST['contact_number'];
$gender = $_POST['gender'];

$update_qry = "UPDATE users SET username = '$username', address = '$address', email = '$email', date_of_birth = '$date_of_birth', first_name = '$first_name', last_name = '$last_name', contact_number = '$contact_number', gender = '$gender' WHERE username = '$login_user'";
$result = mysqli_query($conn, $update_qry);
header("Location: ./profile.php");
mysqli_close($conn);

?>