<?
	namespace app\controller;

	use app\core\controller;

	class user_controller extends controller
	{
		public function user_action() {
			$this->view->render('task list - вход/регистрация');
		}

		public function signup_action() {
			echo "Страница регистрации";
		}
	}