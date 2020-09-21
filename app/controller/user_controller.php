<?
	namespace app\controller;

	use app\core\controller;

	class user_controller extends controller
	{
		public $answer = [];

		public function user_action()
		{
			if (!empty($_POST))
			{
				$answer = $this->model->sign_in($_POST);
				extract($answer);
				if (empty($errors))
				{
					$_SESSION['id'] = $answer[0]['id'];
					$_SESSION['login'] = $answer[0]['login'];
					header('Location: /');
				} else {
					$this->view->render('task list - вход/регистрация', ['errors' => $errors]);
				}
			} else {
				$this->view->render('task list - вход/регистрация');
			}
		}
	}