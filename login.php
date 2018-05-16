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

		<h1>Login Page</h1>
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<form action="./lib/login_user.php" method="POST">
						<div class="form-group">
							<label for="username">Username:</label>
							<input type="text" name="username" id="login_username" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" name="password" id="login_password" class="form-control" required>
						</div>
						<button type="submit" class="btn btn-primary">Log In </button>
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