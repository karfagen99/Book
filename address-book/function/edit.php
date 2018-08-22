<?php
error_reporting(0);
require_once '../database/database.php';
$_POST['tel'] = (int)($_POST['tel']);
if ($_POST['tel'] == 0 && $_POST['fio'] != null && $_POST['address'] != null) {
	echo "Введите правильный номер телефона<br><br>";
} elseif ($_POST['fio'] != null && $_POST['address'] != null && $_POST['tel']) {
	updatePeople($_POST['id'], $_POST['fio'], $_POST['tel'], $_POST['address']);
	header("Location: /index.php");
}
if ($_GET['id'] != null) {
	$_GET['id'] = (int)($_GET['id']);
	if ($_GET['id'] != 0) {
		$res = selectPeopleById($_GET['id']);
		?>
		<body bgcolor="khaki" leftmargin="40" topmargin="10">
		<form method="post" action="edit.php">
			<input name="id" value="<?=$_GET['id']?>" hidden>
			<label>Введите фамилию, имя и отчество:</label><br>
			<input type="text" name="fio" value="<?=$res[0][0]?>" required><br>
			<label>Введите номер телефона:</label><br>
			<input type="text" name="tel" value="<?=$res[0][1]?>" <?php if ($_POST['tel'] == 0 && $_POST['fio'] != null && $_POST['address'] != null) { ?> autofocus <?php } ?> minlength="6" maxlength="10" required><br>
			<label>Введите адрес:</label><br>
			<input type="text" name="address" value="<?=$res[0][2]?>" required><br>
			<input type="submit" value="Изменить">
		</form>
	<?php } else {
		header("Location: /index.php");
	}
} else {
	header("Location: /index.php");
}
