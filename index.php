<?php

session_start();

function getTitle()
{
	echo "Index Page";
}

include "./partials/head.php";

?>


</head>
<body>

<?php include "./partials/header.php"; ?>

	<main class="wrapper">
		<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  			<div class="carousel-inner">
    			<div class="carousel-item active">
      				<img class="d-block w-100" src="assets/img/watch.jpg" alt="First slide">
    			</div>
    			<div class="carousel-item">
      				<img class="d-block w-100" src="assets/img/watch1.jpg" alt="Second slide">
    			</div>
    			<div class="carousel-item">
      				<img class="d-block w-100" src="assets/img/watch2.jpg" alt="Third slide">
    			</div>
  			</div>
  			<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    			<span class="sr-only">Previous</span>
  			</a>
  			<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    			<span class="carousel-control-next-icon" aria-hidden="true"></span>
    			<span class="sr-only">Next</span>
  			</a>
		</div>
	</main>	<!-- /.wrapper -->

<?php include "./partials/footer.php"; ?>

<?php include "./partials/foot.php"; ?>