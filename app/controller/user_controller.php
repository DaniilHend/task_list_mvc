<?
	namespace app\controller;

	use app\core\controller;

	class user_controller extends controller
	{
		public function user_action() {
			if (!empty($_POST)) {
				$errors = $this->model->sign_in($_POST);
			}
			$this->view->render('task list - вход/регистрация', ['errors' => $errors]);
		}
	}