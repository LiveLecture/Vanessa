<?php
	session_start();
	$_SESSION = [];
	session_destroy();
?>

<?php include("inc/head.php"); ?>

<body>

	<?php include("inc/navbar_loggedout.php"); ?>


	<div id="logout-container" class="container panel hauptbereich mittig">
		<h1 class="panel-heading">Sie haben sich ausgeloggt.</h1>
		<div class="panel-body">
			<a href='index.php' class="btn btn-default">Zurück zum Login</a>
		</div>
	</div>

	<?php include("inc/footer.php"); ?>

</body>
</html>

