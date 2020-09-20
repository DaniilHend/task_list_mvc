<?

	//require "./app/app.php";

	use app\core\Route;
	//use app\config\Db;

	spl_autoload_register(function($class)
	{
		$path = str_replace("\\", "//", $class.".php");
		if (file_exists($path))
		{
			require $path;
		}
	});

	$route = new Route;
	$route->run();
	//$db = new Db;
