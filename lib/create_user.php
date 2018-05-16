<?php
//sha1 - convert password into a certain length

require_once "connect.php";

$uname = $_POST['username'];
$pword = sha1($_POST['password']);
$address = $_POST['address'];
$email = $_POST['email'];
$date_of_birth = $_POST['date_of_birth'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$contact_number = $_POST['contact_number'];
$gender = $_POST['gender'];

$insert_qry = "INSERT INTO users (username, password, address, email, date_of_birth, first_name, last_name, contact_number, gender) VALUES ('$uname', '$pword', '$address', '$email', '$date_of_birth', '$first_name', '$last_name', '$contact_number', '$gender')";
$result = mysqli_query($conn, $insert_qry);
header("Location: ../index.php");
mysqli_close($conn);

?>