<?php

session_start();

function getTitle()
{
	echo "Add Item Page";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">

	<title>Time Machine - <?php getTitle(); ?></title>

	<!-- Imports Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">

	<!-- Imports Bootstrap stylesheets -->
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/css/bootstrap.min.css">

	<!-- Imports custom stylesheet -->
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">

	<script type="text/javascript">
		function date_time() {
    	var date = new Date();
    	var am_pm = "AM";
    	var hour = date.getHours();
    		if(hour>=12){
        		am_pm = "PM";
    		}
		    if(hour>12){
		        hour = hour - 12;
		    }
		    if(hour<10){
		        hour = "0"+hour;
		    }

		    var minute = date.getMinutes();
		    if (minute<10){
		        minute = "0"+minute;
		    }
		    var sec = date.getSeconds();
		    if(sec<10){
		        sec = "0"+sec;
		    }

    	document.getElementById("time").innerHTML =  hour+":"+minute+":"+sec+" "+am_pm;
		}
		setInterval(date_time,500);
	</script>



</head>
<body>

	<div class="container">
<nav class="navbar navbar-expand-lg">
    <img src="../assets/img/time_machine.png">
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
    <li><a href="../view_items.php">View Items</a></li>
    <li><a href="../logout.php">Log Out</a></li>
    <li><a href="../view_account.php">View User Accounts</a></li>
    <li><a href="admin_additem.php">Add Item</a></li>
</ul>
</div>
</nav>

	<main class="wrapper">

		<h1>Add An Item</h1>


		<div class="row">
			<div class="col-md-6 offset-md-3">
				<form action="upload.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
					</div>
					<div class="form-group">
						<label for="product_name">Product Name:</label>
						<input type="text" class="form-control" name="product_name" id="product_name" required>
					</div>
					<div class="form-group">
						<label for="description">Description:</label>
						<input type="text" class="form-control" name="description" id="description" required>
					</div>
					<div class="form-group">
						<label for="price">Price:</label>
						<input type="text" class="form-control" name="price" id="price" required>
					</div>
					<div class="form-group">
						<label for="category">Category ID:</label>
						<input type="number" class="form-control" name="category" id="category" required>
						<label for="category_id">Categories: 1 - Casio | 2 - G-Shock | 3 - Baby-G | 4 - Edifice</label>
						<input type="file" name="file">
					</div>
					<button type="submit" class="btn btn-primary" id="add_item" name="submit">Add Item</button>
				</form>
			</div>
		</div>

	</main>	<!-- /.wrapper -->

	<?php include "../partials/footer.php"; ?>

<!-- Imports jQuery -->
<script type="text/javascript" src="../assets/js/jquery.min.js"></script>

<!-- Imports Bootstrap script -->
<script type="text/javascript" src="../assets/css/bootstrap/js/bootstrap.min.js"></script>

<!-- Imports custom script -->
<script type="text/javascript" src="../assets/js/script.js"></script>

</body>
</html>