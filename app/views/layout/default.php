<?
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title><? echo $title; ?></title>
		<link rel="stylesheet" type="text/css" href="main.css">
	</head>
	<body>
		<?
			echo $content;
		?>
	</body>
</html>