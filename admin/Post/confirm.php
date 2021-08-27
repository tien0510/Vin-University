<?php

require_once ('../../db/dbhelper.php');	
			
    session_start();
    $check = "select type from user where user_name = '".$_SESSION['username']."'" ;

 	$check = select_one($check);
 	if ($check != null) {
 		$status = $check['type'];
 	}
    if (!isset($_SESSION["username"]) || $status == 0 )
        {     header("Location:../../index.php");
            // header("Location:index.php");
        }

if (isset($_GET['id'])) {
	$id      = $_GET['id'];
	$sql     = 'select status from directory where id = '.$id;
	$ress    = select_one($sql);
	if ($ress['status'] == 0) {
		$convert  = 'update directory set status = 1 where id = '.$id;
	}
	else{
		$convert  = 'update directory set status = 0 where id = '.$id;
	}
	select($convert);

	 echo "<script>
      alert('Thao Tác Thành Công');
      window.location='http://localhost/vin/admin/Post/index.php';
      </script>";
	// header('Location: index.php');
	die();
}

?>