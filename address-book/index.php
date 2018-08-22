<?php
error_reporting(0);
require_once 'database/database.php';
if ($_POST['search'] == 'fio') {
	$people = selectPeopleByFio($_POST['fio']);
} elseif ($_POST['search'] == 'tel') {
	$people = selectPeopleByTel($_POST['tel']);
} elseif ($_POST['search'] == 'address') {
	$people = selectPeopleByAddress($_POST['address']);
} else {
	$people = selectPeople();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Телефонный справочник</title>
	</head>
	<body bgcolor="khaki" leftmargin="40" topmargin="10">
		     <table width="490" bgcolor="#D2691E" border="2" align="center">
			<tr>
				<p>
				<form action="index.php" method="post">
					<input name="search" value="fio" hidden>
					<td><label>Введите Имя, Фамилию и Отчество: </label></td>
					<td><input type="text" name="fio"></td>
					<td><input type="submit" value="Поиск"></td>
				</form>
			</tr>
			<tr>
				<p>
				<form action="index.php" method="post">
					<input name="search" value="address" hidden>
					<td><label>Поиск по адресу: </label></td>
					<td><input type="text" name="address"></td>
					<td><input type="submit" value="Поиск"></td>
				</form>
			</tr>
			<tr>
				<p>
				<form action="index.php" method="post">
					<input name="search" value="tel" hidden>
					<td><label>Поиск по телефону: </label></td>
					<td><input type="text" name="tel"></td>
					<td><input type="submit" value="Поиск"></td>
				</form>
			</tr>
		</table>
		<?php if ($people != null) { ?>
			<table width="490" bgcolor="#D2691E" border="2" align="center">
				<tr>
					<td>ФИО</td>
					<td>Номер телефона</td>
					<td>Адрес</td>
				</tr>
				<?php for ($i = 0; $i < sizeof($people); $i++) { ?>
					<tr>
						<td><?=$people[$i][1]?></td>
						<td><?=$people[$i][2]?></td>
						<td><?=$people[$i][3]?></td>
						<td><a href="/function/edit.php?id=<?=$people[$i][0]?>">Изменить</a></td>
						<td><a href="/function/delete.php?id=<?=$people[$i][0]?>">Удалить</a></td>
					</tr>
				<?php } ?>
			</table>
		<?php } else { echo "<br>Таблица пустая"; }?>
	</body>
</html>
