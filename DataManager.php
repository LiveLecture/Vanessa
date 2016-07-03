<?php
	require_once("Data.php");

	class DataManager {

		protected $pdo;

		public function __construct($connection = null) {
			try {
				$this->pdo = $connection;
				if($this->pdo === null) {
					$this->pdo = new PDO(
						Data::$dsn,
						Data::$dbuser,
						Data::$dbpass
					);
				}
			} catch(PDOException $e) {
				echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
				die();
			}
		}

		public function __destruct() {
			$this->pdo = null;
		}
	}
?>