<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/vendor/medoo.php";
	use Medoo\Medoo;
	$db = new medoo([
	 'database_type'=>'mysql',
	 'database_name'=>'tasklist',
	 'server'=>'localhost',
	 'username'=>'root',
	 'password'=>'',
	 'charset'=>'utf8',
	]);
?>