<?php
	namespace App;
	use MF\Init\Bootstrap;

class Route extends Bootstrap{

	protected function initRoutes() {
		$routes['login'] = array (
			'route' => '/',
			'controller' => 'UserController',
			'action' => 'login'
		);
		$routes['auth'] = array (
			'route' => '/auth',
			'controller' => 'UserController',
			'action' => 'auth'
		);
		$routes['nova_conta'] = array (
			'route' => '/nova_conta',
			'controller' => 'UserController',
			'action' => 'nova_conta'
		);
		$routes['cadastrar'] = array (
			'route' => '/cadastrar',
			'controller' => 'UserController',
			'action' => 'cadastrar'
		);
		$routes['logout'] = array (
			'route' => '/logout',
			'controller' => 'UserController',
			'action' => 'logout'
		);
		$routes['contatos'] = array (
			'route' => '/contatos',
			'controller' => 'ContatosController',
			'action' => 'contatos'
		);
		$routes['novo_contato'] = array (
			'route' => '/add_contato',
			'controller' => 'ContatosController',
			'action' => 'formContato'
		);
		$routes['cadastrar_contato'] = array (
			'route' => '/cadastrar_contato',
			'controller' => 'ContatosController',
			'action' => 'salvar'
		);
		$routes['edit_contato'] = array (
			'route' => '/edit_contato',
			'controller' => 'ContatosController',
			'action' => 'formEditar'
		);
		$routes['editar_contato'] = array (
			'route' => '/editar_contato',
			'controller' => 'ContatosController',
			'action' => 'editar'
		);
		$routes['delete_contato'] = array (
			'route' => '/delete_contato',
			'controller' => 'ContatosController',
			'action' => 'deletar'
		);

		$this->setRoutes($routes);
	}

}
?>