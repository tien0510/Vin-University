<?php $check = "select type from user where user_name = '".$_SESSION['username']."'" ;

 	$check = select_one($check);
 	if ($check != null) {
 		$status = $check['type'];
 	}
    if (!isset($_SESSION["username"]) || $status == 0 )
        {     header("Location:../../index.php");
            // header("Location:index.php");
        }
?>