<?
	namespace app\controller;

	use app\core\controller;

	class main_controller extends controller
	{
		public function index_action() {
			$this->view->render('проверка', ['dadadada', 'fdgfhf']);
		}
	}