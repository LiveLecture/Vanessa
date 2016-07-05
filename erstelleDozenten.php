<?php
	include "../Mapper/DozentManager.php";

	$dozentManager = new DozentManager();

	if($dozentManager->findByLogin("annagessler", "Regen") == null) {
		$dozent = new Dozent([
			"login"    => "annagessler",
			"vorname"  => "Anna",
			"nachname" => "Gessler",
			"hash"     => "Regen"
		]);
		$dozentManager->save($dozent);
	}

	if($dozentManager->findByLogin("annikabader", "Sonne") == null) {
		$dozent = new Dozent([
			"login"    => "annikabader",
			"vorname"  => "Annika",
			"nachname" => "Bader",
			"hash"     => "Sonne"
		]);
		$dozentManager->save($dozent);
	}

	if($dozentManager->findByLogin("vanessaallgeyer", "Mond") == null) {
		$dozent = new Dozent([
			"login"    => "vanessaallgeyer",
			"vorname"  => "Vanessa",
			"nachname" => "Allgeyer",
			"hash"     => "Mond"
		]);
		$dozentManager->save($dozent);
	}
