<?php
	if(session_id() == '') {
		session_start();
	}

	if(isset($_SESSION ["login"])) {
		switch($_SESSION["login"]) {
			case 1:
				header("Location: vorlesungsUebersicht.php");
				exit();
			case 2:
				header("Location: dozentUebersicht.php");
				exit();
		}
	}
?>