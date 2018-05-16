<?php

session_start();

function getTitle()
{
	echo "Admin Page";
}

include "./partials/head.php";

?>


</head>
<body>

	<?php

	include "./partials/header.php";

	?>

	<main class="wrapper">

		<?php
			echo "<h1>Admin Page of " . $_SESSION['current_user'] . "</h1>";
		?>

	</main>	<!-- /.wrapper -->

	<?php

		include "./partials/footer.php";

	?>

<?php

include "./partials/foot.php";

?>