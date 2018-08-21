<?php
error_reporting(0);
$_POST['tel'] = (int)($_POST['tel']);
if ($_POST['tel'] == 0 && $_POST['fio'] != null && $_POST['address'] != null) {
	echo "Введите правильный номер телефона<br><br>";
} elseif ($_POST['fio'] != null && $_POST['address'] != null && $_POST['tel']) {
	require_once '../database/database.php';
	insertPeople($_POST['fio'], $_POST['tel'], $_POST['address']);
	header("Location: /index.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<table width="490" bgcolor="#D2691E" border="2" align="center">
		<form method="post" action="add.php">
			<p>
			<label>Введите фамилию, имя и отчество:</label><br>
			<input type="text" name="fio" value="<?=$_POST['fio']?>" required><br>
			<p>
			<label>Введите номер телефона:</label><br>
			<input type="text" name="tel" value="<?=$_POST['tel']?>" <?php if ($_POST['tel'] == 0 && $_POST['fio'] != null && $_POST['address'] != null) { ?> autofocus <?php } ?> minlength="6" maxlength="10" required><br>
			<p>
			<label>Введите адрес:</label><br>
			<input type="text" name="address" value="<?=$_POST['address']?>" required><br>
			<input type="submit" value="Добавить">
		</form>
	</body>
</html>
