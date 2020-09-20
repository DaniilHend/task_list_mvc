<div class="block">
    <h1>Task list</h1>
    <form method="POST" action="/">
		<h1>Вы авторизованы как <?=$_SESSION['login']?></h1>
		<input type="submit" name="logout" value="Выйти">
		<div class="card">
			
			<h3>Создать задачу</h3>
			<input type="text" name="description" placeholder="description">
			<input type="submit" name="submit" value="Добавить">
			<input type="submit" name="delete" value="Удалить">
			<input type="submit" name="complete" value="Выполнено">
			
		</div>
		<?
		print_r($vars);
		// $tasks = $db->select(
		// 	"tasks",
		// 	'*',[
		// 	'user_id' => $_SESSION['id']
		// ]);
		// foreach ($tasks as $task):
		?>
		<!-- <div class="card status_<?=$task['status_id']?>">
			<p><?=htmlspecialchars($task['description'], ENT_QUOTES, 'UTF-8')?></p>
			<input type="checkbox" name="task_id[]" id="task<?=$task['id']?>" value="<?=$task['id']?>">
		</div> -->
		<?
		// endforeach;
		?>
	</form>
    <a href="/logout">Logout</a>
</div>