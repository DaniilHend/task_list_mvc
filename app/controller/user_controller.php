<?
	namespace app\controller;

	use app\core\controller;

	class user_controller extends controller
	{
		public function user_action() {
			echo "Страница входа и регистрации";
		}

		public function signup_action() {
			echo "Страница регистрации";
		}
	}