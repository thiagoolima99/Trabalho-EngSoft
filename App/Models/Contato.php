<?php 
	namespace App\Models;

	class Contato {
		private $id;
		private $nome;
		private $telefone;
		private $cidade;
		private $email;
		private $cep;
		private $user_id;
		private $foto;
		private $grupo;

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

			$sql = "INSERT INTO contacts(co_name, co_cellphone, co_city, co_email, co_cep, user_id, co_photo, co_grupo)VALUES(:co_nome, :co_cellphone, :co_city, :co_email, :co_cep, :user_id, :co_photo, :co_grupo)";
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(':co_nome', $this->__get('nome'));
			$stmt->bindValue(':co_cellphone', $this->__get('telefone'));
			$stmt->bindValue(':co_city', $this->__get('cidade'));
			$stmt->bindValue(':co_email', $this->__get('email'));
			$stmt->bindValue(':co_cep', $this->__get('cep'));
			$stmt->bindValue(':user_id', $this->__get('user_id'));
			$stmt->bindValue(':co_photo', $this->__get('foto'));
			$stmt->bindValue(':co_grupo', $this->__get('grupo'));
			$stmt->execute();

			return $this;
		}

		public function editar() {

			$sql = "UPDATE contacts SET co_name = :nome, co_cellphone = :telefone, co_city = :cidade, co_email = :email, co_cep = :cep, co_photo = :foto WHERE co_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(':id', $this->__get('id'));
			$stmt->bindValue(':nome', $this->__get('nome'));
			$stmt->bindValue(':telefone', $this->__get('telefone'));
			$stmt->bindValue(':cidade', $this->__get('cidade'));
			$stmt->bindValue(':email', $this->__get('email'));
			$stmt->bindValue(':cep', $this->__get('cep'));
			$stmt->bindValue(':foto', $this->__get('foto'));
			$stmt->execute();

			return $this;
		}

		public function getAll($id) {
			$sql = "SELECT co_id, co_name, co_cellphone, co_city, co_email, co_cep, co_photo FROM contacts WHERE user_id = ".$id."";
		
			return $this->db->query($sql)->fetchAll();
		}

		public function getContatos($q, $id) {
			$sql = "SELECT co_id, co_name, co_cellphone, co_city, co_email, co_cep, co_photo FROM contacts WHERE user_id = ".$id." AND co_name LIKE '%".$q."%' AND co_grupo IN(1,2)";
		
			return $this->db->query($sql)->fetchAll();
		}

		public function getByGroup($q, $group, $id) {
			$sql = "SELECT co_id, co_name, co_cellphone, co_city, co_email, co_cep, co_photo, co_grupo FROM contacts WHERE co_name LIKE '%".$q."%' AND user_id = ".$id." AND co_grupo = ".$group."";
			
				return $this->db->query($sql)->fetchAll();
		}

		public function getById($id) {
			$sql = "SELECT co_id, co_name, co_cellphone, co_city, co_email, co_cep, co_photo FROM contacts WHERE co_id = ".$id; 
			return $this->db->query($sql)->fetchAll();
		}

		public function deletar($id) {
			$sql = "DELETE FROM contacts WHERE co_id = ".$id;
			return $this->db->query($sql);
		}
	}
?>