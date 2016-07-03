<?php
	require_once("inc/dozent_check.php");
	require_once("Mapper/DozentManager.php");

	require_once("Mapper/ErrorHandler.php");
	$errorHander = new ErrorHandler();

	if(!isset($_POST["passwort_alt"]) || !isset($_POST["passwort_neu"]) || !isset($_POST["passwort_wiederholt"])) {
		$errorHander->storeError("fehler", "Es wurden nicht alle POST Felder angegeben. Bitte wenden Sie sich an den Administrator.");
		header("Location: fehler.php");
		exit();
	}
	
	$passwort_alt = htmlspecialchars($_POST["passwort_alt"], ENT_QUOTES, "UTF-8");
	$passwort_neu = htmlspecialchars($_POST["passwort_neu"], ENT_QUOTES, "UTF-8");
	$passwort_wiederholt = htmlspecialchars($_POST["passwort_wiederholt"], ENT_QUOTES, "UTF-8");

	if(!empty($passwort_neu) && !empty($passwort_alt) && !empty($passwort_wiederholt)) {
		if(!password_verify($passwort_alt, $dozent->hash)) {
			$errorHander->storeError("dozentprofil", "Das eingegebene Passwort ist falsch.");
			header("Location: dozentprofil_form.php");
			exit();
		}

		if($passwort_neu <> $passwort_wiederholt) {
			$errorHander->storeError("dozentprofil", "Die beiden neuen Passwörter stimmen nicht überein.");
			header("Location: dozentprofil_form.php");
			exit();
		}

		$dozentManager = new DozentManager();
		$dozentManager->updatePasswort($dozent, $passwort_neu);

		header("Location: dozentprofil_form.php");
	} else {
		$errorHander->storeError("dozentprofil", "Sie müssen alle Felder ausfüllen.");
		header("Location: dozentprofil_form.php");
		exit();
	}


