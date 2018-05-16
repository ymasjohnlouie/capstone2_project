<?php

session_start();

// Request DB connection
require './lib/connect.php';

function getTitle()
{
	echo "Catalog Page";
}

include "./partials/head.php";

// Request data from DB
$items_sql = "SELECT * FROM items";
$items = mysqli_query($conn, $items_sql);	// $conn is from ./lib/connect.php
//var_dump($items);	//to test if there's a data received

?>


</head>
<body>

	<?php

	include "./partials/header.php";

	?>

	<main class="wrapper">

		<h1>Catalog Page</h1>

		<div class="container">
			<div class="row">

		<?php

		foreach ($items as $item) {
			//var_dump($item);
			// echo $item['product_name'] . '<br>';
			// echo $item['description'] . '<br>';
			// echo $item['image_path'] . '<br>';

			extract($item);	// Built-in function of php; it converts column names to variables

			echo '
				<div class="card col-md-4" style="width: 18rem;" id="item_table">
					<img class="card-img-top" src="'.$image_path.'" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">'.$product_name.'</h5>
						<div class="col-md-6 offset-md-3">
						<a href="item.php?id='.$id.'" class="btn btn-primary">View Details</a>
						</div>
					</div>
				</div>
			';
		}
					
		?>

			</div>
		</div>

	</main>	<!-- /.wrapper -->

	<?php

		include "./partials/footer.php";

	?>


<?php

include "./partials/foot.php";

?>