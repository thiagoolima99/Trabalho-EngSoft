<?php 
	namespace App\Models;

	class User {
		private $id;
		private $nome;
		private $senha;
		private $foto;

		protected $db;

		public function __get($atributo) {
			return $this->$atributo;
		}

		public function __set($atributo, $valor) {
			$this->$atributo = $valor;
		}

		public function __construct(\PDO $db) {
			$this->db = $db;
		}

		//salvar
		public function salvar() {

			$sql = "INSERT INTO users(us_username, us_password, us_photo) VALUES (:nome, :pass, :foto)";
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(':nome', $this->__get('nome'));
			$stmt->bindValue(':pass', $this->__get('senha'));
			$stmt->bindValue(':foto', $this->__get('foto'));
			$stmt->execute();

			return $this;
		}

		public function autenticar() {
			$sql = "SELECT us_id, us_username, us_password FROM users WHERE us_id = :id AND us_password = :senha";
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(':id', $this->__get('id'));
			$stmt->bindValue(':senha', $this->__get('senha'));

			$stmt->execute();

			$user = $stmt->fetch(\PDO::FETCH_ASSOC);
	
			if($user['us_id'] != '' && $user['us_username'] != '') {
				$this->__set('id', $user['us_id']);
				$this->__set('nome', $user['us_username']);
			}
			return $this;
		}

		public function deletar($id) {
			$sql = "DELETE FROM user WHERE us_id = ".$id;
			return $this->db->query($sql);
		}

		public function getId($name) {
			$sql = "SELECT us_id, us_username FROM users WHERE us_username = '".$name."'";
			return $this->db->query($sql)->fetchAll();
		}
	}
?>