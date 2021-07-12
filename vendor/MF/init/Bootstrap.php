<?php 
namespace MF\Init;

abstract class Bootstrap {
	private $routes;

	abstract protected function initRoutes();

	public function __construct() {
		$this->initRoutes();
		$this->run($this->getUrl());
	}

	public function getRoutes() {
		return $this->routes;
	}
	public function setRoutes(array $routes) {
		$this->routes = $routes;
	}

	protected function run($url) {
		//Percorre o array de rotas
		foreach ($this->getRoutes() as $key => $route) {
			if ($url === $route['route']) {
				
				//Define a classe de acordo com o arota
				$class = "App\\Controllers\\".ucfirst($route['controller']);

				//Instancia dinamicamente a classe
				$controller = new $class;
				
				//Acao
				$action = $route['action'];
				$controller->$action();
			}
		}
	}

	protected function getUrl() {
		return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	}
}

?>