<?php

session_start();

include_once './lib/connect.php';
require_once './lib/email_sending.php';

function getTitle()
{
	echo "Confirmation Page";
}

?>

<?php include './lib/refnum_generator.php'; ?>
		

<?php

if(isset($_SESSION['current_user'])){
	$current_user = $_SESSION['current_user'];
	$total_price = $_SESSION['totalitemprice'];

	$query = "SELECT id from users WHERE username = '$current_user'";
	$result_query = mysqli_query($conn, $query) or die(mysqli_error($conn));

		foreach($result_query as $id){
			extract($id);
		}

	//Reference Number Generator
	$randid = "";
	$sample = array_merge(range("A","Z"), range(0,9));
		for ($i = 1; $i < 18; $i++){
			$randid = $randid . $sample[array_rand($sample)];
		}

	$today = time();
	$refnumgen = $randid . '-' . $today;

	$userdb_qry = "INSERT INTO orders (reference_number, status_id, user_id, total) VALUES('$refnumgen', 2, '$id', '$total_price')";
	$res_dbqry = mysqli_query($conn, $userdb_qry);


	if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
		foreach($_SESSION['cart'] as $row_key => $key_value){
			$item_chosen_id = $row_key;
			$item_Quantity = $key_value;

			$select_price = "SELECT price FROM items WHERE id = '$item_chosen_id'";
			$price_result = mysqli_query($conn, $select_price);

			foreach($price_result as $getItemPrice){
				extract($getItemPrice);

				$querie = "SELECT id FROM orders WHERE reference_number = '$refnumgen'";
				$result_quer = mysqli_query($conn, $querie);

				foreach($result_quer as $new_result){
					extract($new_result);
				}

				$insert_item_qry = "INSERT INTO order_details(item_id, order_id, quantity, price) VALUES ('$item_chosen_id', '$id', '$item_Quantity', '$price')";
				$result_insert = mysqli_query($conn, $insert_item_qry);
			}
		}
	}
}

$user_email = $_POST['email'];
$user_fullname = $_POST['first_name'];

// Query for sending email
$username = $user_fullname;
$usermail = $user_email;
$mail_subject = "Time Machine Order Confirmation Order # ".$refnumgen;
$mail_body = "<p>Thanks for placing an order. Your order is being processed with reference number ".$refnumgen . ".";

sendMail($usermail,$username,$mail_subject,$mail_body);

unset($_SESSION['cart']);
unset($_SESSION['subtotal']);
unset($_SESSION['total_amount']);

header('Location: confirmation_page2.php');

?>