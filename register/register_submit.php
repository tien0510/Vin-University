<?php
	require_once ('../db/dbhelper.php');
	session_start();
	if (isset($_POST['submit']) && $_POST["user_name"] != '' && $_POST["password"] != '' && $_POST["re_password"] != '') 
	{
		$username   = $_POST["user_name"];
		$password   =($_POST["password"]);
		$repassword = ($_POST["re_password"]);

			if( $password!=$repassword ){			
				echo "<script>
					      alert('Password does not match');
							window.location='http://localhost/Vin/register/register.php';
					      </script>";
				}


					$sql      = "select * from user where user_name = '$username'";
					$old      = execute($sql);

				if( mysqli_num_rows($old) > 0){
					echo "<script>
					      alert('Account is already in use');
						  window.location='http://localhost/Vin/register/register.php';
					      </script>";
				}

				else if($password==$repassword ){
					$password = password_hash($password, PASSWORD_DEFAULT);
					$sql="insert into user(user_name,password) values('$username','$password')";
					// print($sql);
					// exit();
					execute($sql);

					echo "<script>
					      alert('Successful account registration !!!!!');
						  window.location='http://localhost/Vin/login/login.php';
					      </script>";

					}
	}
	else
		{

			// header("location:register.php");
			print("lỗi");
			exit();
			
		}

?>