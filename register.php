<?php

function getTitle()
{
	echo "Register Page";
}

include "./partials/head.php";

?>


</head>
<body>

	<?php

	include "./partials/header.php";

	?>

	<main class="wrapper">

		<h1>Register Page</h1>
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<form action="./lib/create_user.php" method="POST">
					<div class="form-group">
						<label for="email">Email Address:</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="e.g. test@gmail.com" required>
						<span id="mail_avail"></span>
					</div>
					<div class="form-group">
						<label for="username">User Name:</label>
						<input type="text" class="form-control" name="username" id="username" placeholder="e.g. testuser" required>
						<span id="user_avail"></span>
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" class="form-control" name="password" id="password" required>
						<span id="pwlength"></span>
					</div>
					<div class="form-group">
						<label for="confirmpw">Confirm Password:</label>
						<input type="password" class="form-control" name="confirmpw" id="confirmpw" required>
						<span id="match"></span>
					</div>

					<div class="form-group">
						<label for="address">Address:</label>
						<input type="text" class="form-control" name="address" id="address" Placeholder="House No., Street Name, Barangay, City/Municipality" required>
					</div>
					<div class="form-group">
						<label for="date_of_birth">Date of Birth:</label>
						<input type="text" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="mm/dd/yyyy" required>
					</div>
					<div class="form-group">
						<label for="first_name">First Name:</label>
						<input type="text" class="form-control" name="first_name" id="first_name" required>
					</div>
					<div class="form-group">
						<label for="last_name">Last Name:</label>
						<input type="text" class="form-control" name="last_name" id="last_name" required>
					</div>
					<div class="form-group">
						<label for="contact_number">Contact Number:</label>
						<input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="e.g. 09991234567" required>
					</div>
					<div class="form-group">
						<label for="gender">Gender:</label>
						<input type="gender" class="form-control" name="gender" id="gender" placeholder="Male or Female" required>
					</div>
					<button type="submit" class="btn btn-primary" id="register">Register</button>
				</form>
			</div>
		</div>

	</main>	<!-- /.wrapper -->

	<?php

		include "./partials/footer.php";

	?>

<?php

include "./partials/foot.php";

?>