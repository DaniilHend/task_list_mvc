<?
	$log_status = "";
	$data = $_POST;
	require_once $_SERVER['DOCUMENT_ROOT']."/api/db.php";

	function get_user($login)
	{
		include "db.php";
		$user = $db->select(
			"users",
			'*',[
			'login' => htmlspecialchars($login, ENT_QUOTES)], [
			'LIMIT' => 1
		]);
		if ($user)
		{
			return $user;
		} else {
			return false;
		}
	}

	if (isset($data['submit']))
	{	
		$user_check = get_user($data['login']);
		if ($user_check)
		{
			if (password_verify($data['password'], $user_check[0]['password_hash']))
			{
				session_start();
				$_SESSION['id'] = $user_check[0]['id'];
				$_SESSION['login'] = $user_check[0]['login'];
				header('Location: /');
			} else {
				echo "Пароль не совпадает!";
			}
		} else {
			if (iconv_strlen($data['login']) <= 16 && iconv_strlen($data['login']) >= 3)
			{
				$db->insert(
					'users', [
					'login' => htmlspecialchars($data['login'], ENT_QUOTES),
					'password_hash' => password_hash($data['password'], PASSWORD_BCRYPT)
				]);
				$current_user = get_user($data['login']);
				session_start();
				$_SESSION['id'] = $current_user[0]['id'];
				$_SESSION['login'] = $current_user[0]['login'];
				header('Location: /');
			} else {
				echo "Логин должен содержать от 3 до 16 символов!";
			}
			
		}
	}
?>