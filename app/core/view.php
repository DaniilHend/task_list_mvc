<?
	namespace app\core;

	class View
	{
		public $path; // путь до вида
		public $route;
		public $layout = 'default'; // шаблон страницы

		public function __construct($route)
		{
			$this->route = $route;
			$this->path = $route['controller'].'/'.$route['action'];
		}

		public function render($title, $vars = []) // вывод страницы
		{
			extract($vars);
			if (file_exists('app/views/'.$this->path.'.php'))
			{
				ob_start();
				require 'app/views/'.$this->path.'.php';
				$content = ob_get_clean();
				require 'app/views/layout/'.$this->layout.'.php';
			} else {
				echo "Вид ".$this->path." не найден";
			}
		}

		public static function error_code($code) // вывод страницы с ошибкой
		{
			http_response_code($code);
			require 'app/views/errors/'.$code.'.php';
			exit;
		}

		public function redirect($url)
		{
			header('location: '.$url);
			exit;
		}
	}