<?php

session_start();

$login_name = $_SESSION['current_user'];
// Request DB connection
require './lib/connect.php';

$query = "SELECT r.role_title, u.username, u.password, u.address, u.email, u.date_of_birth, u.first_name, u.last_name, u.contact_number, u.gender FROM users u, roles r WHERE u.role_id = r.id AND u.username = '$login_name'";
$profile = mysqli_query($conn, $query) or die(mysqli_error($conn));	// $conn is from ./lib/connect.php

// Get ID of current item
if (isset($_GET['id'])) {
	$role_id = $_GET['id'];
}

function getTitle()
{
	echo "Edit Profile Page";
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
    <li><a href="edit_profile.php">Edit Profile</a></li>
    <li><?php
      if (($_SESSION['current_user']) == "johnlouie"){
        echo '
          <ul class="block-menu">
          <li>
            <a href="view_items.php">View Items</a>
          </li>
          <li>
            <a href="view_account.php">View User Accounts</a>
          </li>
          <li>
            <a href="add_item.php">Add Item</a>
          </li>
          </ul>
        ';
      } else {
        echo '
          <ul class="block-menu">
          <li>
            <a href="profile.php">Profile</a>
          </li>
          <li>
            <a href="./cart.php">My Cart</a>
          </li>
          <li>
           	<a href="./catalog.php">Catalog</a>
          </li>
          </ul>
        ';
      }
      ?>
  </li>
    <li><a href="./logout.php">Log Out</a></li>
</ul>
</div>
</nav>

	<main class="wrapper">

		<h1>Edit Profile</h1>

		<div class="row">
			<div class="col-md-6 offset-md-3">
				<?php

				foreach ($profile as $column) {

					extract($column);

					echo '
				<form action="./update_profile.php" method="POST">
					<div class="form-group">
						<label for="email">Email Address:</label>
						<input type="email" class="form-control" name="email" id="email" value='.$email.'>
					</div>
					<div class="form-group">
						<label for="username">User Name:</label>
						<input type="text" class="form-control" name="username" id="username" value='.$username.'>
					</div>
					<div class="form-group">
						<label for="address">Address:</label>
						<input type="text" class="form-control" name="address" id="address" value='.$address.'>
					</div>
					<div class="form-group">
						<label for="date_of_birth">Date of Birth:</label>
						<input type="text" class="form-control" name="date_of_birth" id="date_of_birth" value='.$date_of_birth.'>
					</div>
					<div class="form-group">
						<label for="first_name">First Name:</label>
						<input type="text" class="form-control" name="first_name" id="first_name" value='.$first_name.'>
					</div>
					<div class="form-group">
						<label for="last_name">Last Name:</label>
						<input type="text" class="form-control" name="last_name" id="last_name" value='.$last_name.'>
					</div>
					<div class="form-group">
						<label for="contact_number">Contact Number:</label>
						<input type="text" class="form-control" name="contact_number" id="contact_number" value='.$contact_number.'>
					</div>
					<div class="form-group">
						<label for="gender">Gender:</label>
						<input type="gender" class="form-control" name="gender" id="gender" value='.$gender.'>
					</div>
					<button type="submit" class="btn btn-primary" id="update">Update</button>
				</form>
		';
	}
		?>
			</div>
		</div>


	</main>	<!-- /.wrapper -->

	<?php include "./partials/footer.php"; ?>

<?php include "./partials/foot.php"; ?>