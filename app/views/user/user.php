<div class="block">
	<form method="POST" action="/user">
		<h2>Вход/Регистрация</h2>
		<?
			if (!empty($errors))
			{
				?><p><?=$errors;?></p><?
			}
		?>
		<input type="text" name="login" id="auth_login" placeholder="Логин" required>
		<input type="password" name="password" id="auth_password" placeholder="Пароль" required>
		<input type="submit" name="submit" value="Отправить">
	</form>
</div>