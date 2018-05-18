<?php

session_start();

require "connect.php";

$product_name = $_POST['product_name'];
$description = $_POST['description'];
$price = $_POST['price'];
$item_id = $_POST['product_id'];

$updateitem_qry = "UPDATE items SET product_name = '$product_name', description = '$description', price = '$price' WHERE id = '$item_id'";
$result = mysqli_query($conn, $updateitem_qry);
mysqli_close($conn);
header("Location: ../view_items.php");
// var_dump($result);
?>