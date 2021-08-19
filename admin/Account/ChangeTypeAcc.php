<?php
require_once ('../../db/dbhelper.php');

if (isset($_GET['id'])) {
	$id       = $_GET['id']; 
	$sql      = 'select trangthai from login where id = '.$id;
	$type = executeSingleResult($sql);
	if ($type != null) {
		$type_acc = $type['trangthai'];
	}
	if ($type_acc == 1) {
		$change = 'update login set trangthai = 0 where id = '.$id;
		
	}
	else{
		$change = 'update login set trangthai = 1 where id = '.$id;
		
	}
	// print($change);
	// exit();
	execute($change);
	header('Location:index.php');
	die();
	}
?>