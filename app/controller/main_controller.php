<?
	namespace app\controller;

	use app\core\controller;

	class main_controller extends controller
	{
		public function index_action()
		{
			$data = $_POST;
			if (empty($_SESSION)) // проверка на авторизацию
	        {
	            header('Location: /user'); // если не авторизован, то редирект
	        } else {
	            if (isset($data['logout'])) {
					session_destroy();
					header('Location: /');
				}
	            if (isset($data["submit"]) and !empty($data["description"]))
	            {
	                $this->model->add($data);
	            } elseif (isset($data["delete"]))
	            {
	                $this->model->delete($data);
	            } elseif (isset($data["complete"]))
	            {
	                $this->model->complete($data);
	            }
	            $tasks = $this->model->get_with_condition('tasks', '*', 'user_id', $_SESSION['id']);
	            $this->view->render('проверка', ['tasks' => $tasks]);
	        }
			
			
		}
	}