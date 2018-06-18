<?php

session_start();

function getTitle()
{
	echo "Log In Page";
}

include "./partials/head.php";

?>


</head>
<body>

	<?php include "./partials/header.php"; ?>

	<main class="wrapper">

		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<h3>Change Password</h3>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<form action="./lib/change_password.php" method="POST">
						<div class="form-group">
							<label for="current_password">Current Password:</label>
							<input type="password" name="password1" id="login_current" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="new_password">New Password:</label>
							<input type="password" name="password2" id="login_new" class="form-control" required>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
						<span id="errormsg">
							<?php
								if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])){
									echo $_SESSION['msg'];
									$_SESSION['msg'] = "";
								}
							?>
						</span>
					</form>
				</div>
			</div>
		</div>

	</main>	<!-- /.wrapper -->

	<?php include "./partials/footer.php"; ?>

<?php include "./partials/foot.php"; ?>