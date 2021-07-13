<?php 
	namespace App;

	class Connection {
		public static function getDb() {
			try {
				$conn = new \PDO(
					"mysql:host=localhost","root", ""
				);

				return $conn;
			} catch(\PDOException $e) {
				echo "Erro na conexão: ".$e;
			}
		}
	}
?>