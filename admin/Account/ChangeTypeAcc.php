<?php
require_once ('../../db/dbhelper.php');

if (isset($_GET['id'])) {
	$id       = $_GET['id']; 
	$sql      = 'select type from user where id = '.$id;
	$type = select_one($sql);
	if ($type != null) {
		$type_acc = $type['type'];
	}
	if ($type_acc == 1) {
		$change = 'update user set type = 0 where id = '.$id;
		
	}
	else{
		$change = 'update user set type = 1 where id = '.$id;
		
	}
	// print($change);
	// exit();
	select($change);
	header('Location:index.php');
	die();
	}
?>