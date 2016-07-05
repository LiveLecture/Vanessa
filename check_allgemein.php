<?php
	require_once("Mapper/Dozent.php");
	require_once("Mapper/Admin.php");

	if(session_id() == "") {
		session_start();
	}

	if(isset($_SESSION["login"])) {
		if($_SESSION["login"] == 1) {
			$dozent = $_SESSION ["dozent"];
		} else {
			if($_SESSION["login"] == 2) {
				$admin = $_SESSION["admin"];
			}
		}
	}
?>