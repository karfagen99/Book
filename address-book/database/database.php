<?php
function db_connect() {
	$link = mysqli_connect("localhost", "id6829970_mrtester07", "tester02", "id6829970_tel");
	if (!$link) {
		echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
		echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	if (!mysqli_set_charset($link, "utf8")) {
		printf("Ошибка при загрузке набора символов utf8: %s\n", mysqli_error($link));
		exit;
	}
	return $link;
}
function db_close($link) {
	mysqli_close($link);
}
function cleanString($db, $name) {
	$name = trim($name);
	$name = htmlspecialchars($name, ENT_NOQUOTES, "UTF-8");
	$name = mysqli_real_escape_string($db, $name);
	return $name;
}
function insertPeople($fio, $tel, $address) {
	$db = db_connect();
	$fio = cleanString($db, $fio);
	$address = cleanString($db, $address);
	$tel = (int)($tel);
	mysqli_query($db, "INSERT INTO `People` (`fio`, `tel`, `address`) VALUES ('{$fio}', '{$tel}', '{$address}');");
	db_close($db);
}
function updatePeople($id, $fio, $tel, $address) {
	$db = db_connect();
	$fio = cleanString($db, $fio);
	$address = cleanString($db, $address);
	$id = (int)($id);
	$tel = (int)($tel);
	mysqli_query($db, "UPDATE `People` SET `fio`='{$fio}', `tel`='{$tel}', `address`='{$address}' WHERE `id`='{$id}'");
	db_close($db);
}
function deletePeople($id) {
	$db = db_connect();
	$id = (int)($id);
	mysqli_query($db, "DELETE FROM `People` WHERE `id`='{$id}'");
	db_close($db);
}
function selectPeople() {
	$db = db_connect();
	$result = mysqli_query($db, "SELECT `id`, `fio`, `tel`, `address` FROM `People` ORDER BY `fio` ASC, `address` ASC");
	while ($row = mysqli_fetch_row($result)) {
		$response[] = $row;
	}
	db_close($db);
	return $response;
}
function selectPeopleById($id) {
	$id = (int)($id);
	$db = db_connect();
	$result = mysqli_query($db, "SELECT `id`, `fio`, `tel`, `address` FROM `People` WHERE `id`='{$id}' ORDER BY `fio` ASC, `address` ASC");
	while ($row = mysqli_fetch_row($result)) {
		$response[] = $row;
	}
	db_close($db);
	return $response;
}
function selectPeopleByFio($fio) {
	$db = db_connect();
	$fio = cleanString($db, $fio);
	$result = mysqli_query($db, "SELECT `id`, `fio`, `tel`, `address` FROM `People` WHERE `fio` LIKE '%{$fio}%' ORDER BY `fio` ASC, `address` ASC");
	while ($row = mysqli_fetch_row($result)) {
		$response[] = $row;
	}
	db_close($db);
	return $response;
}
function selectPeopleByTel($tel) {
	$tel = (int)($tel);
	$db = db_connect();
	$result = mysqli_query($db, "SELECT `id`, `fio`, `tel`, `address` FROM `People` WHERE `tel` LIKE '%{$tel}%' ORDER BY `fio` ASC, `address` ASC");
	while ($row = mysqli_fetch_row($result)) {
		$response[] = $row;
	}
	db_close($db);
	return $response;
}
function selectPeopleByAddress($address) {
	$db = db_connect();
	$address = cleanString($db, $address);
	$result = mysqli_query($db, "SELECT `id`, `fio`, `tel`, `address` FROM `People` WHERE `address` LIKE '%{$address}%' ORDER BY `fio` ASC, `address` ASC");
	while ($row = mysqli_fetch_row($result)) {
		$response[] = $row;
	}
	db_close($db);
	return $response;
}
