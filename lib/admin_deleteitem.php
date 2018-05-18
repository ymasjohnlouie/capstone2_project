<?php
session_start();

require "connect.php";

if(isset($_GET['id'])){
	$item_id = $_GET['id'];

$deleteitem_qry = "DELETE FROM items WHERE id = '$item_id'";
$result = mysqli_query($conn, $deleteitem_qry);
mysqli_close($conn);
header("Location: ../view_items.php");
// var_dump($result);
}
?>