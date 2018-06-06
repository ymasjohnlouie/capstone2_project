<?php

session_start();

// Request DB connection
require './lib/connect.php';

$login_name = $_SESSION['current_user'];
$query = "SELECT r.role_title, u.id, u.username, u.address, u.email, u.date_of_birth, u.first_name, u.last_name, u.contact_number, u.gender FROM users u, roles r WHERE u.role_id = r.id AND u.username = '$login_name'";
$profile = mysqli_query($conn, $query) or die(mysqli_error($conn));	// $conn is from ./lib/connect.php


// Get ID of current item
if (isset($_GET['id'])) {
	$role_id = $_GET['id'];
}

function getTitle()
{
	echo "Item Page";
}

include "./partials/head.php";

?>


</head>
<body>

	<div class="container">
<nav class="navbar navbar-expand-lg">
    <img src="assets/img/time_machine.png">
    <div class="collapse navbar-collapse" id="navbarText">
        <div class="navbar-nav mr-auto">
        </div>
          <span class="navbar-text" style="color: black">
              <p class="time">Philippine Standard Time | <span class="date" id="time"></span> |
                <?php
                  date_default_timezone_set('Asia/Manila');
                  echo date('l | F d, Y');
                ?>
              </p>
          </span>
    </div>
</nav>
</div>
<div class="container2">
  <ul class="block-menu">
    <li><a href="./cart.php">My Cart</a></li>
    <li><a href="./catalog.php">Catalog</a></li>
    <li><a href="./logout.php">Log Out</a></li>
    <li><a href="profile.php">Profile</a></li>
</ul>
</div>
</nav>

	<main class="wrapper">

	<?php
		echo "<h1>Welcome, " .$_SESSION['current_user'] . "</h1>";
	?>

	<table>
			<tbody>
				<?php
				foreach ($profile as $column) {

					extract($column);

					if(($_SESSION['current_user']) == "johnlouie"){
					echo '
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Contact Number</th>
							<th>Role Title</th>
							<th>Username</th>
							<th>Address</th>
							<th>Email</th>
							<th>Gender</th>
							<th>Date of Birth</th>
						</tr>
						<tr>
							<td>'.$first_name.'</td>
							<td>'.$last_name.'</td>
							<td>'.$contact_number.'</td>
							<td>'.$role_title.'</td>
							<td>'.$username.'</td>
							<td>'.$address.'</td>
							<td>'.$email.'</td>
							<td>'.$gender.'</td>
							<td>'.$date_of_birth.'</td>
						</tr>
			<div class="buttons">
			</div>

					';
				} 
				else {
					echo '
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Contact Number</th>
							<th>Role Title</th>
							<th>Username</th>
							<th>Address</th>
							<th>Email</th>
							<th>Gender</th>
							<th>Date of Birth</th>
							<th colspan = 2>Actions To Do</td>
						</tr>
							<td>'.$first_name.'</td>
							<td>'.$last_name.'</td>
							<td>'.$contact_number.'</td>
							<td>'.$role_title.'</td>
							<td>'.$username.'</td>
							<td>'.$address.'</td>
							<td>'.$email.'</td>
							<td>'.$gender.'</td>
							<td>'.$date_of_birth.'</td>
							<td><a href="edit_profile.php" class="btn btn-primary" role="button">Edit Profile</a></td>
							<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Deactivate Profile</button></td>
						<tr>
			  <div class="modal fade" id="myModal" role="dialog">
			    <div class="modal-dialog">
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        <div class="modal-body">
			          <p>Are you sure you want to deactivate this account?</p>
			        </div>
			        <div class="modal-footer">
			          <a href="deactivate.php" class="btn btn-danger" role="button">Deactivate Profile</a>
			          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
			        </div>
			      </div>
			    </div>
			  </div>
				
				';

				}
			}
			
				?>
			</tbody>
		</table>
		<br>
				<h1>Transaction History</h1>
			<table>
			<tbody>
		<?php

		echo '
			<tr>
				<th>Reference Number</th>
				<th>Total(&#8369)</th>
				<th>Order Date</th>
				<th>Status</th>
			</tr>
		';

		if(isset($_SESSION['current_user'])){
			$current_user = $_SESSION['current_user'];
			$select_qry = "SELECT id FROM users WHERE username = '$current_user'";
			$resulta = mysqli_query($conn, $select_qry);

			foreach($resulta as $result){
				extract($result);

				$current_user_id = $result;
				$new_select_qry = "SELECT status_id, reference_number, total, order_date FROM orders WHERE user_id = '$id'";
				$res_new_select = mysqli_query($conn, $new_select_qry);

				foreach($res_new_select as $select_new){
					extract($select_new);

				$id_stat = $status_id;
				$status_qry = "SELECT description FROM order_status WHERE id = '$id_stat'";
				$res_stat = mysqli_query($conn, $status_qry);

					foreach($res_stat as $new_stat){
						extract($new_stat);
						
						echo '
						<tr>
							<td>'.$reference_number.'</td>
							<td>'.$total.'.00</td>
							<td>'.$order_date.'</td>
							<td>'.$description.'</td>
						</tr>
						';
					}
				}
			}
		}
		?>
		</tbody>
		</table>

		<?php
		// if(($_SESSION['current_user']) == "johnlouie"){
		// 	$admin_user = $_SESSION['current_user'];
		// 	$admin_query = "SELECT r.role_title, u.id, u.username, u.first_name, u.last_name FROM users u, roles r WHERE u.username = '$admin_user'";
		// 	$res_adm_qry = mysqli_query($conn, $admin_query);
		// 	// var_dump($res_adm_qry);

		// 	foreach($res_adm_qry as $adm_qry){
		// 		extract($adm_qry);
		// 		var_dump($adm_qry);
		// 	}
			
		// }
		?>

	</main>	<!-- /.wrapper -->


	<?php include "./partials/footer.php"; ?>

<?php include "./partials/foot.php"; ?>