<?
	namespace app\config;

	use Medoo\Medoo;

    class Db
    {
        function __construct()
        {
            require_once $_SERVER['DOCUMENT_ROOT']."/vendor/medoo.php";
			$db = new medoo([
			 'database_type'=>'mysql',
			 'database_name'=>'tasklist',
			 'server'=>'localhost',
			 'username'=>'root',
			 'password'=>'',
			 'charset'=>'utf8',
			]);
        }
    }