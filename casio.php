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
$casio_sql = "SELECT i.id, i.image_path, i.product_name, i.description, i.price, i.category_id FROM items i WHERE i.category_id = 1 ORDER BY price";
$result = mysqli_query($conn, $casio_sql);

?>

</head>
<body>

	<?php

	include "./partials/header.php";

	?>

	<main class="wrapper">

		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h3>Sort Items By Brand:</h3>
						<a href="casio.php" class="btn btn-primary">Casio</a>
						<a href="gshock.php" class="btn btn-primary">G-Shock</a>
						<a href="babyg.php" class="btn btn-primary">Baby-G</a>
						<a href="edifice.php" class="btn btn-primary">Edifice</a>
						<a href="catalog.php" class="btn btn-primary">Show All</a>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">

		<?php

		foreach ($result as $item) {
			//var_dump($item);
			// echo $item['product_name'] . '<br>';
			// echo $item['description'] . '<br>';
			// echo $item['image_path'] . '<br>';

			extract($item);	// Built-in function of php; it converts column names to variables

			echo '
				<div class="card col-md-4" style="width: 18rem;" id="item_table">
					<img class="card-img-top" src="'.$image_path.'" alt="Card image cap">
					<div class="card-body">
						<div class="col-md-6 offset-md-3">
						<p class="card-title">'.$product_name.'</p>
						<p class="card-title">&#8369 '.$english_format_number = number_format($price).'.00</p>
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