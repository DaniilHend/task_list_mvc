<?
	namespace app\models;

	use app\core\model;

	class Main extends Model
	{
		public function is_logged() // проверка на авторизацию
		{
			if (!isset($_SESSION['id']) && !isset($_SESSION['login']))
	        {
	            return false;
	        } else {
	            return true;
	        }
		}

		public function get_tasks() // получение всех задач
		{
			$result_tasks = $this->db->select(
				'tasks', 
				'*', [
					'user_id' => $_SESSION['id']
			]);
			return $result_tasks;
		}

		public function add($data) // добавление задачи
		{
			$this->db->insert(
				'tasks', [
				'user_id' => $_SESSION['id'],
				'description' => htmlspecialchars($data['description'], ENT_QUOTES, 'UTF-8'),
				'status_id' => '1'
			]);
		}

		public function delete($data) // удаление задачи
		{
			if (is_array($data['task_id']) == true)
			{
				foreach ($data['task_id'] as $task)
					{
					$delete_task = $this->db->delete(
						'tasks', [
						'AND' => [
							'user_id' => $_SESSION['id'],
							'id' => intval($task)
						]
					]);
				}
			} else {
				$delete_task = $this->db->delete(
					'tasks', [
					'AND' => [
						'user_id' => $_SESSION['id'],
						'id' => intval($data['task_id'])
					]
				]);
			}
		}

		public function complete($data) // статус выполнено
		{
			if (is_array($data['task_id']) == true)
			{
				foreach ($data['task_id'] as $task)
				{
					$new_task = $this->db->update(
						'tasks', [
						'status_id' => '2'], [
						'user_id' => $_SESSION['id'],
						'status_id' => '1',
						'id' => intval($task)
					]);
				}
			} else {
				$new_task = $this->db->update(
					'tasks', [
					'status_id' => '2'], [
					'user_id' => $_SESSION['id'],
					'status_id' => '1',
					'id' => intval($data['task_id'])
				]);
			}
		}
	}