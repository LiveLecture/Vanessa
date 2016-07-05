<?php
	require_once("Mapper/Dozent.php");

	include("inc/check_session.php");

	if($_SESSION ["login"] == 1) {
		$dozent = $_SESSION ["dozent"];
	} else {
		header("Location: index.php");
	}
?>