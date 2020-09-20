<?
	namespace app\core;

	use app\core\view;

	abstract class controller
	{
		public $route;
		public $view;

		public function __construct($route)
		{
			$this->route = $route;
			$this->model = $this->load_model($route['controller']);
			$this->view = new View($route);
		}

		public function load_model($name)
		{
			$path = 'app\models\\'.ucfirst($name);
			if (class_exists($path))
			{
				return new $path;
			}
		}
	}