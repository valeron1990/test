<?php

header("Content-type: text/html; charset=utf-8");
error_reporting(-1);
require_once 'conect.php';
require_once 'funcs.php';

if (!empty($_POST)) {
	generate_a_message();
	header("Location: {$_SERVER['PHP_SELF']}");
	exit;
}
$arr_with_mess = get_message ();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form method="post">
		<p>
			<label for="name">Имя:</label><br>
			<input type="text" name="name" id="name">
		</p>
		<p>
			<label for="text">Текст:</label><br>
			<textarea name="text" id="text"></textarea>
		</p>
		<button type="submit">Написать</button>
	</form>
	<hr>

	<?if(!empty($arr_with_mess)) :?>
		<?foreach ($arr_with_mess as $key):?>
			<p>Автор: <?=$key['name']?> | Дата: <?=$key['date']?></p>
			<?=nl2br(htmlspecialchars($key['text']))?>
			<hr>
		<?php endforeach;?>
	<? endif; ?>
</body>
</html>