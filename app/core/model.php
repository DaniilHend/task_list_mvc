<?
	namespace app\core;

	use vendor\Medoo\Medoo;

	abstract class Model
	{
		public $db;
		
		public function __construct() // подключение бд и старт сессии
		{
			require_once $_SERVER['DOCUMENT_ROOT']."/app/vendor/medoo.php";
            $config_db = require_once $_SERVER['DOCUMENT_ROOT']."/app/config/db.php";
			$this->db = new medoo([
				'database_type'=>$config_db['database_type'],
				'database_name'=>$config_db['database_name'],
				'server'=>$config_db['server'],
				'username'=>$config_db['username'],
				'password'=>$config_db['password'],
				'charset'=>$config_db['charset'],
			]);
			session_start();
		}


	}