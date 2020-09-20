<?
	namespace app\core;

	use app\core\view;
	use app\config\db;

	abstract class controller
	{
		public $route;
		public $view;
		public $db;

		public function __construct($route)
		{
			$this->route = $route; 
			$this->view = new View($route);
			$this->db = new Db();
		}

		public function get_table()
		{

		}
	}