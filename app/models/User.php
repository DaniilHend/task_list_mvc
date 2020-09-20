<?
	namespace app\models;

	use app\core\model;

	class User extends Model
	{
		public $errors;
		
		public function get_user($login)
		{
			$result_user = $this->db->select(
				'users', 
				'*', [
					'login' => htmlspecialchars($login, ENT_QUOTES)
			]);
			if (empty($result_user)) {
				return false;
			} else {
				return $result_user;
			}
		}

		public function sign_in($data)
		{
			if (iconv_strlen($data['login']) <= 16 && iconv_strlen($data['login']) >= 3)
			{
				$user_check = $this->get_user($data['login']);
			
				if (!empty($user_check))
				{
					if (password_verify($data['password'], $user_check[0]['password_hash']))
					{
						$this->session_set($user_check[0]['id'], $user_check[0]['login']);
					} else {
						$errors = 'Неверный пароль!';
						return $errors;
					}
				} else {
					$this->sign_up($data);
				}
			} else {
				$errors = 'Логин должен содержать от 3 до 16 символов!';
				return $errors;
			}
		}

		public function sign_up($data)
		{
			$this->db->insert(
				'users', [
				'login' => htmlspecialchars($data['login'], ENT_QUOTES),
				'password_hash' => password_hash($data['password'], PASSWORD_BCRYPT)
			]);
			$current_user = $this->get_user($data['login']);
			$this->session_set($current_user[0]['id'], $current_user[0]['login']);
		}

		public function session_set($id, $login)
		{
			$_SESSION['id'] = $id;
			$_SESSION['login'] = $login;
			header('Location: /');
		}
	}