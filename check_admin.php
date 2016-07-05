<?PHP
	require_once("Mapper/Admin.php");

	include("inc/check_session.php");

	if($_SESSION ["login"] == 2) {
		$admin = $_SESSION ["admin"];
	} else {
		header("Location: index.php");
	}
