<?php
session_start();

require_once "connect.php";

$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$description = $_POST['description'];
$price = $_POST['price'];


$updateitem_qry = "UPDATE items SET product_name = '$product_name', description = '$description', price = '$price' WHERE id = '$product_id'";
$result = mysqli_query($conn, $updateitem_qry);
mysqli_close($conn);

header("location: ../admin_viewitems.php?id=" . $product_id);

?>