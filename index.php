<?php

session_start();

// $_SESSION['current_user'] = 'admin';

function getTitle()
{
	echo "Index Page";
}

include "./partials/head.php";

?>


</head>
<body>

	<?php

	include "./partials/header.php";

	?>

	<main class="wrapper">

		<h1>Index Page</h1>

	</main>	<!-- /.wrapper -->

	<?php

		include "./partials/footer.php";

	?>

<?php

include "./partials/foot.php";

?>