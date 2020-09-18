<?
    namespace app\core;

    class Route
    {
    	protected $routes = [];
    	protected $params = [];

        public function __construct()
        {
            $routes = require './app/config/routes.php';
            foreach ($routes as $route => $value)
            {
            	$this->add($route, $value);
            }
        }

        public function add($route, $params)
        {
        	$route = '#^'.$route.'$#';
        	$this->routes[$route] = $params;
        }

        public function match()
        {
        	$url = trim($_SERVER['REQUEST_URI'], '/');
        	foreach ($this->routes as $route => $params)
        	{
        		if (preg_match($route, $url, $matches))
        		{
        			$this->params = $params;
        			return true;
        		}
        	}
        	return false;
        }

        public function run()
        {
        	if ($this->match())
        	{
        		$path = 'app\controller\\'.$this->params['controller'].'_controller';
        		if (class_exists($path))
        		{
        			$action = $this->params['action'].'_action';
        			if (method_exists($path, $action))
        			{
        				$controller = new $path($this->params);
        				$controller->$action();
        			} else {
        				echo "Action ".$action." не найден";
        			}
        		} else {
        			echo "Контроллер ".$path." не найден";
        		}
        	} else {
        		echo "Маршрут отсутствует";
        	}
        }
    }