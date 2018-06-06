<?php

session_start();

if(isset($_SESSION['current_user'])){
	$current_user = $_SESSION['current_user'];
}

function getTitle()
{
	echo "Confirmation Page";
}

include "partials/head.php";

?>

</head>
<body>

	<?php include "partials/header.php"; ?>

	<main class="wrapper">
		

<?php

echo '
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="panel panel-default">
						<div class="panel-heading"></div>
							<div class="panel-body">
							<h1>Thank You For Your Order! </h1>
							<hr/>
							<p>Hello, '.$current_user.'. You can check the status of your order <a href="profile.php" style="color:blue">here</a>.<br/></p><a href="catalog.php" class="btn btn-success btn-lg">Continue Shopping</a>
							</div>
						<div class="panel-footer"></div>
					</div>
				</div>
			<div class="col-md-2"></div>
		</div>
	</div>
';

?>

</main>	<!-- /.wrapper -->

<?php include "partials/footer.php"; ?>

<?php include "partials/foot.php"; ?>