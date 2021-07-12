<?php 
	namespace App\Controllers;
	use MF\Controller\Action;
	use App\Connection;
	use App\Models\Contato;

	class ContatosController extends Action {

		public function contatos(){

			$this->validaAutenticacao();

			//Instancia de conexao
			$conn = Connection::getDb();

			//Instancia do modelo
			$contato = new Contato($conn);

			//Filtros
			if (!empty($_GET['grupo'])) {
				$this->view->contatos = $contato->getByGroup($_GET['q'], $_GET['grupo'], $_SESSION['id']);
			} else if (!empty($_GET['q'])) {
				$this->view->contatos = $contato->getContatos($_GET['q'], $_SESSION['id']);
			} else {
				$this->view->contatos = $contato->getAll($_SESSION['id']);
			}

			$this->render("contatos", "layout");
		}

		public function validaAutenticacao() {
			session_start();

			if(!isset($_SESSION['id']) || $_SESSION['id'] == '') {
				header('Location: /?login');
			}	

		}

		public function formContato() {
			$this->render("form_contato", "layout");
		}

		public function salvar(){
			$this->validaAutenticacao();

			$conn = Connection::getDb();
			$contato = new Contato($conn);

			//Cadastro contato no banco
			$contato->__set('nome', $_POST['nome']);
			$contato->__set('telefone', $_POST['telefone']);
			$contato->__set('cidade', $_POST['cidade']);
			$contato->__set('email', $_POST['email']);
			$contato->__set('cep', $_POST['cep']);
			$contato->__set('user_id', $_SESSION['id']);
			$contato->__set('foto', 'avatar');
			$contato->__set('grupo', $_POST['grupo']);
			$contato->salvar();

			header('Location: /contatos');
			exit();
		}

		public function formEditar(){
			$conn = Connection::getDb();
			$contato = new Contato($conn);

			$this->view->contatos = $contato->getById($_GET['id']);

			$this->render("edit_contato", "layout");
		}

		public function editar(){
			//Alterar dados do contato
			$conn = Connection::getDb();
			$contato = new Contato($conn);

			$contato->__set('id', $_POST['id']);
			$contato->__set('nome', $_POST['nome']);
			$contato->__set('telefone', $_POST['telefone']);
			$contato->__set('cidade', $_POST['cidade']);
			$contato->__set('email', $_POST['email']);
			$contato->__set('cep', $_POST['cep']);
			$contato->__set('foto', 'avatar');
			$contato->editar();

			header('Location: /contatos');
			exit();
		}

		public function deletar(){
			//Instancia de conexao
			$conn = Connection::getDb();

			//Instancia do modelo
			$contato = new Contato($conn);
			$contato->deletar($_GET['id']);
			header('Location: /contatos');
			exit();
		}

	}
?>