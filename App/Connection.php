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

		//Get Heroku ClearDB connection information
	/*$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$cleardb_server = $cleardb_url["us-cdbr-east-04.cleardb.com"];
	$cleardb_username = $cleardb_url["b0b70ddaecd9cc"];
	$cleardb_password = $cleardb_url["603c4f15"];
	$cleardb_db = substr($cleardb_url["heroku_c46bfa8379ea968"],1);
	$active_group = 'default';
	$query_builder = TRUE;
		// Connect to DB
	$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);*/

?>