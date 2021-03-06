<?php

session_start();

// Request DB connection
require './lib/connect.php';

$query = "SELECT u.id, r.role_title, u.username, u.address, u.email, u.date_of_birth, u.first_name, u.last_name, u.contact_number, u.gender FROM users u, roles r WHERE u.role_id = r.id AND r.role_title = 'user' AND u.status_id = 1";
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
    <li><a href="view_account.php">View User Accounts</a></li>
    <li><a href="./admin_page.php">Profile</a></li>
    <li><a href="edit_profile.php">Edit Profile</a></li>
    <li><a href="view_items.php">View Items</a></li>
    <li><a href="./lib/admin_additem.php">Add Item</a></li>
    <li><a href="./logout.php">Log Out</a></li>
</ul>
</div>
</nav>

<main class="wrapper">

  <h2>Active User Accounts</h2>

  <table>
      <tbody>
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
              <th>Action To Do</th>
            </tr>
        <?php

        foreach ($profile as $column) {

          extract($column);
          echo '
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
              <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal'.$id.'">Deactivate Profile</button></td>
            </tr>
            
        <div class="modal fade" id="myModal'.$id.'" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Account Deactivation</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to deactivate this account?</p>
                <p>'.$first_name.'</p>
              </div>
              <div class="modal-footer">
                <a href="admin_deactivate.php?id='.$id.'" class="btn btn-danger" role="button">Deactivate Profile</a>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
        ';
        }
        ?>
      </tbody>
    </table>
    <br>

        <h2>Inactive User Accounts</h2>

        <table>
            <tbody>
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
                    <th>Action To Do</th>
                  </tr>

        <?php

        $querying = "SELECT * FROM users WHERE status_id = 2";
        $result_quer = mysqli_query($conn, $querying) or die(mysqli_error($conn)); // $conn is from ./lib/connect.php

          foreach($result_quer as $bagoto){
            extract($bagoto);
            echo '
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
              <th><a href="admin_activate.php?id='.$id.'" class="btn btn-primary" role="button">Activate</a></th>
            </tr>
        ';
          }
        ?>
                  </tbody>
          </table>


  </main> <!-- /.wrapper -->

  <?php include "./partials/footer.php"; ?>

<?php include "./partials/foot.php"; ?>