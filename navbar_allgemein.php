<?php
	if(!isset($_SESSION["login"])) {
		include("inc/navbar_loggedout.php");
	} else {
		switch($_SESSION["login"]) {
			case 1:
				include("inc/navbar_loggedin_dozent.php");
				break;
			case 2:
				include("inc/navbar_loggedin_admin.php");
				break;
		}
	}
?>