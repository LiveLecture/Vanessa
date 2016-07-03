<?php

	require_once("DataManager.php");
	require_once("Dozent.php");

	class DozentManager extends DataManager {

		protected $pdo;

		public function __construct($connection = null) {
			parent::__construct($connection);
		}

		public function __destruct() {
			parent::__destruct();
		}

		public function findByLogin($login, $password) {
			try {
				$stmt = $this->pdo->prepare('SELECT * FROM Dozent WHERE login = :login');
				$stmt->bindParam(':login', $login);
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_CLASS, 'Dozent');
				$dozent = $stmt->fetch();

				$err = $stmt->errorInfo();
				if($err[2] !== null) {
					echo "File " . __FILE__ .", line: " + __LINE__ . "<br>";
					print_r($err);
					exit();
				}

				if(password_verify($password, $dozent->hash)) {
					return $dozent;
				} else {
					return null;
				}
			} catch(PDOException $e) {
				echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
				die();
			}
		}

		public function create($dozent) {
			try {
				$stmt = $this->pdo->prepare('
				INSERT INTO Dozent (login, vorname, nachname, hash) 
				VALUES(:login, :vorname, :nachname, :hash)');

				$stmt->bindParam(':login', $dozent->login);
				$stmt->bindParam(':vorname', $dozent->vorname);
				$stmt->bindParam(':nachname', $dozent->nachname);
				$stmt->bindParam(':hash', password_hash($dozent->hash, PASSWORD_BCRYPT));
				$result = $stmt->execute();

				$err = $stmt->errorInfo();
				if($err[2] !== null) {
					echo "File " . __FILE__ .", line: " . __LINE__ . "<br>";
					print_r($err);
					exit();
				}

			} catch(PDOException $e) {
				echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
				die();
			}

			return $result;
		}

		public function updatePasswort(Dozent $dozent, $passwort) {
			$hash = password_hash($passwort, PASSWORD_BCRYPT);

			try {
				$stmt = $this->pdo->prepare('
              UPDATE Dozent
              SET hash = :hash
              WHERE id_dozent = :id_dozent
            ');
				$stmt->bindParam(':hash', $hash);
				$stmt->bindParam(':id_dozent', $dozent->id_dozent);
				$stmt->execute();

				$err = $stmt->errorInfo();
				if($err[2] !== null) {
					echo "File " . __FILE__ .", line: " + __LINE__ . "<br>";
					print_r($err);
					exit();
				}
			} catch(PDOException $e) {
				echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
				die();
			}
		}



        public function findallDozent()
        {
            try {
                $stmt = $this->pdo->prepare('SELECT * FROM Dozent');
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Dozent');
                return $stmt->fetchAll();

                $err = $stmt->errorInfo();
                if($err[2] !== null) {
                    echo "File " . __FILE__ .", line: " + __LINE__ . "<br>";
                    print_r($err);
                    exit();
                }

            } catch (PDOException $e) {
                echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
                die();
            }
        }


        public function findbyId($id_dozent)
            {
                try {
                    $stmt = $this->pdo->prepare('SELECT * FROM Dozent WHERE :id_dozent = id_dozent');
					$stmt->bindParam(':id_dozent', $id_dozent);
                    $stmt->execute();
                    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Dozent');
                    return $stmt->fetchAll();

                    $err = $stmt->errorInfo();
                    if($err[2] !== null) {
                        echo "File " . __FILE__ .", line: " + __LINE__ . "<br>";
                        print_r($err);
                        exit();
                    }

                } catch (PDOException $e) {
                    echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
                    die();
                }
            }


        public function delete(Dozent $dozent)
        {
            if (!isset($dozent->id_dozent)) {
                $dozent = null;
                return $dozent;
            }
            try {
                $stmt = $this->pdo->prepare('
                        DELETE FROM Dozent WHERE id_dozent= :id_dozent
                      ');
                $stmt->bindParam(':id_dozent', $dozent->id_dozent);
                $stmt->execute();

                $err = $stmt->errorInfo();
                if($err[2] !== null) {
                    echo "File " . __FILE__ .", line: " + __LINE__ . "<br>";
                    print_r($err);
                    exit();
                }

            } catch (PDOException $e) {
                echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
                die();
            }
            $dozent = null;
            return $dozent;
        }

    }

?>