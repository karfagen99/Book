<?php
require_once '../database/database.php';
if ($_GET['id'] != null) {
	deletePeople($_GET['id']);
}
header("Location: /index.php");
