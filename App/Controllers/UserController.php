<?php 
	namespace App\Controllers;
	use MF\Controller\Action;
	use App\Connection;
	use App\Models\User;

	class UserController extends Action {

		public function login(){
			$this->render("login", "layout");
		}

		public function auth(){
			//Autenticar
			$conn = Connection::getDb();
			$user = new User($conn);

			$user->__set('id', $_POST['id']);
			$user->__set('senha', md5($_POST['senha']));
			$user->autenticar();

		if($user->__get('id') != '' && $user->__get('nome')) {
			session_start();

			$_SESSION['id'] = $user->__get('id');
			$_SESSION['nome'] = $user->__get('nome');

			header('Location: /contatos');
		} else {
			header('Location: /login');
		} 
		header('Location: /contatos');

		}

		public function logout(){
			session_start();
			session_destroy();
			header('Location: /');
		}

		public function nova_conta(){
			$this->render("nova_conta", "layout");
		}

		public function cadastrar(){
			$conn = Connection::getDb();
			$user = new User($conn);

			//Cadastro user no banco
			$user->__set('nome', $_POST['nome']);
			$user->__set('senha', md5($_POST['senha']));
			$user->__set('foto', 'avatar');

			$user->salvar();
			$id = $this->getId($_POST['nome']);

			header('Location: /?id='.$id[0]['us_id']);
		}

		public function getId($name){
			$conn = Connection::getDb();
			$user = new User($conn);

			$id = $user->getId($name);
			return $id;
		}

	}
?>