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
			$this->view = new View($route);
		}
	}