<?php
	require_once("inc/check_logout.php");

	require_once("Mapper/ErrorHandler.php");

	$errorHandler = new ErrorHandler();
	$error = $errorHandler->getError("login");
?>

<!DOCTYPE html>
<html>

	<?php include("inc/head.php"); ?>

	<body>

		<?php include("inc/navbar_loggedout.php"); ?>

		<?php include("inc/fehlermeldung.php") ?>

		<div class="container panel hauptbereich">
			<h2 class="panel-heading">Login</h2>

			<form class="form-horizontal" role="form" action="login_do.php" method="post">

				<div class="form-group">
					<label class="control-label col-sm-2" for="login">Benutzername:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="login" id="login" placeholder="Benutzername">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2" for="password">Kennwort:</label>
					<div class="col-sm-4">
						<input type="password" class="form-control" name="password" id="password"
							   placeholder="Kennwort">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Login</button>
					</div>
				</div>
			</form>

		</div>

		<?php include("inc/footer.php"); ?>

	</body>
</html>