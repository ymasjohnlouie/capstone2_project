<?php

require_once "connect.php";

$product_name = $_POST['product_name'];
$description = $_POST['description'];
$price = $_POST['price'];
$category = $_POST['category'];
$image_path = $_GET['id']

$insertitem_qry = "INSERT INTO items (product_name, description, price, category_id, image_path) VALUES ('$product_name', '$description', '$price', '$category', '$image_path')";
$result = mysqli_query($conn, $insertitem_qry);
header("Location: admin_additem.php");
mysqli_close($conn);
?>