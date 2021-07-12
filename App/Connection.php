<?php 
	namespace App;

	class Connection {
		public static function getDb() {
			try {
				$conn = new \PDO(
					"mysql:host=ec2-23-20-124-77.compute-1.amazonaws.com;dbname=agenda_contatos;charset=utf8","zrukxewzxeqxnv", "7447e094b9f100122a544f53b992a16d7049df8fce58e092d5f1e3ac83b75a8b"
				);

				return $conn;
			} catch(\PDOException $e) {
				echo "Erro na conexão: ".$e;
			}
		}
	}
?>