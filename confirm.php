<?php

require_once ('db/dbhelper.php');	
			
    session_start();
    if (!isset($_SESSION["username"])  )
        {     header("Location:index.php");

        }

if (isset($_GET['id'])) {
	$id      = $_GET['id'];
	$sql     = 'select trangthai from directory where id = '.$id;
	$ress    = executeSingleResult($sql);
	if ($ress['trangthai'] == 0) {
		$convert  = 'update directory set trangthai = 1 where id = '.$id;
	}
	execute($convert);

	 echo "<script>
      alert('Thao Tác Thành Công');
      window.location='http://localhost/vin/manage.php';
      </script>";
	// header('Location: index.php');
	die();
}

?>