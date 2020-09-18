<!DOCTYPE html>
<html>
	<head>
		<title>Task list</title>
		<link rel="stylesheet" type="text/css" href="src/style/main.css">
	</head>
	<body>
		<div class="block">
			<form method="POST" action="/api/user.php">
				<h2>Вход/Регистрация</h2>
				<input type="text" name="login" id="auth_login" placeholder="Логин" required>
				<input type="password" name="password" id="auth_password" placeholder="Пароль" required>
				<input type="submit" name="submit" value="Отправить">
			</form>
		</div>
	</body>
</html>