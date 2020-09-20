<?
	namespace app\controller;

	use app\core\controller;

	class main_controller extends controller
	{
		public function index_action()
		{
			$data = $_POST;
			if ($this->model->is_logged() == true) {
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
	            $tasks = $this->model->get_tasks();
	            $this->view->render('проверка', ['tasks' => $tasks]);
	        } else {	
	            header('Location: /user');
	        }
			
		}
	}