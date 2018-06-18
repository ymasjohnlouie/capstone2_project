<?php

// Request DB connection
require './lib/connect.php';

$orderId = $_GET['id'];
$ord_stat_qry = "UPDATE orders SET status_id = 1 WHERE id = '$orderId'";
$result = mysqli_query($conn, $ord_stat_qry);
header("Location: admin_page.php");

?>