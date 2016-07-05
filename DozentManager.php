<?php

	require_once("Mapper/DataManager.php");
	require_once("Mapper/Dozent.php");
	require_once("Mapper/VorlesungManager.php");

	class DozentManager extends DataManager {

		public function __construct($connection = null) {
			parent::__construct($connection);
		}

		public function __destruct() {
			parent::__destruct();
		}

		public function findByLogin($login, $password) {
			$dozent = $this->findByLoginNotVerified($login);
			if(password_verify($password, $dozent->hash)) {
				return $dozent;
			} else {
				return null;
			}
		}

		public function findByLoginNotVerified($login) {
			try {
				$stmt = $this->pdo->prepare('SELECT * FROM Dozent WHERE login = :login');
				$stmt->bindParam(':login', $login);
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_CLASS, 'Dozent');

				$dozent = $stmt->fetch();
				return $dozent;
			} catch(PDOException $e) {
				echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
				die();
			}
		}

		private function create(Dozent $dozent) {
			try {
				$stmt = $this->pdo->prepare('
				INSERT INTO Dozent (login, vorname, nachname, hash) 
				VALUES(:login, :vorname, :nachname, :hash)');

				$stmt->bindParam(':login', $dozent->login);
				$stmt->bindParam(':vorname', $dozent->vorname);
				$stmt->bindParam(':nachname', $dozent->nachname);
				$stmt->bindParam(':hash', password_hash($dozent->hash, PASSWORD_BCRYPT));
				$result = $stmt->execute();
			} catch(PDOException $e) {
				echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
				die();
			}
		}

		public function save(Dozent $dozent) {
			if(!isset($dozent->id_dozent)) {
				$this->create($dozent);
			}

			try {
				$stmt = $this->pdo->prepare('
					UPDATE Dozent 
					SET vorname=:vorname, nachname=:nachname
					WHERE id_dozent=:id_dozent
					');

				$stmt->bindParam(':id_dozent', $dozent->id_dozent);
				$stmt->bindParam(':vorname', $dozent->vorname);
				$stmt->bindParam(':nachname', $dozent->nachname);
				$result = $stmt->execute();
			} catch(PDOException $e) {
				echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
				die();
			}
		}

		public function updatePasswort($id_dozent, $passwort) {
			$hash = password_hash($passwort, PASSWORD_BCRYPT);

			try {
				$stmt = $this->pdo->prepare('
              UPDATE Dozent
              SET hash = :hash
              WHERE id_dozent = :id_dozent
            ');
				$stmt->bindParam(':hash', $hash);
				$stmt->bindParam(':id_dozent', $id_dozent);
				$stmt->execute();
			} catch(PDOException $e) {
				echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
				die();
			}
			
			return $hash;
		}


		public function findAll() {
			try {
				$stmt = $this->pdo->prepare('SELECT * FROM Dozent');
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_CLASS, 'Dozent');
				return $stmt->fetchAll();
			} catch(PDOException $e) {
				echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
				die();
			}
		}


		public function findbyId($id_dozent) {
			try {
				$stmt = $this->pdo->prepare('SELECT * FROM Dozent WHERE :id_dozent = id_dozent');
				$stmt->bindParam(':id_dozent', $id_dozent);
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_CLASS, 'Dozent');
				$dozent = $stmt->fetch();
				
				return $dozent;
			} catch(PDOException $e) {
				echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
				die();
			}
		}


		public function delete(Dozent $dozent) {
			if($dozent == null) return;

			$vorlesungsManager = new VorlesungManager();
			$vorlesungen = $vorlesungsManager->findAll($dozent->id_dozent);
			foreach($vorlesungen as $vorlesung) {
				$vorlesungsManager->delete($vorlesung);
			}

			try {
				$stmt = $this->pdo->prepare('
                        DELETE FROM Dozent WHERE id_dozent= :id_dozent
                      ');
				$stmt->bindParam(':id_dozent', $dozent->id_dozent);
				$stmt->execute();
			} catch(PDOException $e) {
				echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
				die();
			}
		}

	}

?>