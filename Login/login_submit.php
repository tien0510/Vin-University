<?php
	require_once ('../db/dbhelper.php');
	session_start();

	if (isset($_POST['submit']) && $_POST["user_name"] != '' && $_POST["password"] != '') 
	{
			// $id_user    = $_POST["id"];
			$username      = $_POST["user_name"];
			$password  	   = $_POST["password"] ;

			$verf		= "select password from user where user_name ='$username' ";
			$verify  = executeSingleResult($verf);
			if ($verify != null) {
				$v = $verify['password'];
			}else{
				echo "<script>
					      alert('Account does not exist');
						  window.location='http://localhost/Vin/login/login.php';
					      </script>";
					    
			}
			
			$check = password_verify($password, $v) ;


			if ($check) {

			$sql		= "select * from user where user_name ='$username'";
			$stt 		= executeSingleResult($sql);
			$user 		= execute($sql); 
			if ( $stt != null) {
				$status = $stt['type'];
			}			
			

			if(mysqli_num_rows($user)>0){
				if($status == 1){	
					echo "<script>
					      alert('--- Hello admin! Redirect login to admin page----');
						  window.location='http://localhost/Vin/admin/Account/index.php';
					      </script>";
					      $_SESSION["username"] = $username;
					

				}
				else{

				$_SESSION["username"] = $username;
				header("Location: ../index.php");
				}
			}}
			else{
				echo "<script>
					      alert('Wrong Account name or Password');
						  window.location='http://localhost/Vin/login/login.php';
					      </script>";
					    
			}

	}

?>
