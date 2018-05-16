<?php

session_start();

$login_name = $_SESSION['current_user'];
// Request DB connection
require './lib/connect.php';

$query = "SELECT r.role_title, u.username, u.address, u.email, u.date_of_birth, u.first_name, u.last_name, u.contact_number, u.gender FROM users u, roles r WHERE u.role_id = r.id AND u.username = '$login_name'";
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
    <li><a href="./home.php">Home</a></li>
    <li><a href="./cart.php">My Cart</a></li>
    <li><a href="./profile.php">Profile</a></li>
    <li><a href="./catalog.php">Catalog</a></li>
    <li><a href="./logout.php">Log Out</a></li>
</ul>
</div>
</nav>

	<main class="wrapper">

	<h1>Profile Page</h1>

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
							<th colspan = 4>Actions To Do</th>
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
							<td><a href="edit_profile.php" class="btn btn-primary" role="button">Edit Profile</a></td>
							<td><a href="view_items.php" class="btn btn-primary" role="button">View Items</a></td>
							<td><a href="view_account.php" class="btn btn-primary" role="button">View User Accounts</a></td>
							<td><a href="add_item.php" class="btn btn-primary" role="button">Add Item</a></td>
						</tr>
			<div class="buttons">
			</div>
					';
				} else {
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
			          <p>Are you sure you want to deactivate your account?</p>
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

	</main>	<!-- /.wrapper -->

	<?php include "./partials/footer.php"; ?>

<?php include "./partials/foot.php"; ?>