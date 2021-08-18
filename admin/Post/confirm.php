<?php

require_once ('../../db/dbhelper.php');	
			
    session_start();
    $check = "select trangthai from login where taikhoan = '".$_SESSION['username']."'" ;

 	$check = executeSingleResult($check);
 	if ($check != null) {
 		$status = $check['trangthai'];
 	}
    if (!isset($_SESSION["username"]) || $status == 0 )
        {     header("Location:../../index.php");
            // header("Location:index.php");
        }

if (isset($_GET['id'])) {
	$id      = $_GET['id'];
	$sql     = 'select trangthai from directory where id = '.$id;
	$ress    = executeSingleResult($sql);
	if ($ress['trangthai'] == 0) {
		$convert  = 'update directory set trangthai = 1 where id = '.$id;
	}
	else{
		$convert  = 'update directory set trangthai = 0 where id = '.$id;
	}
	execute($convert);

	 echo "<script>
      alert('Thao Tác Thành Công');
      window.location='http://localhost/vin/admin/Post/index.php';
      </script>";
	// header('Location: index.php');
	die();
}

?>