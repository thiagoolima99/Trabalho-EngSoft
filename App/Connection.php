<?php 
	namespace App;

	class Connection {
		public static function getDb() {
			try {
				//$conn = new \PDO(
				//	"mysql:host=localhost;dbname=agenda_contatos;charset=utf8","root", ""
				//);

				return new \PDO('sqlite:db/agenda.db');

				return $conn;
			} catch(\PDOException $e) {
				echo "Erro na conexão: ".$e;
			}
		}
	}
?>