<?php 
	namespace App;

	class Connection {
		public static function getDb() {
			try {
				$conn = new \PDO(
					"mysql:host=pk1l4ihepirw9fob.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=agenda_contatos;charset=utf8","zb0b5lyls87rdkxt", "i8372rmi6v6i4vie"
				);

				return $conn;
			} catch(\PDOException $e) {
				echo "Erro na conexão: ".$e;
			}
		}
	}
?>