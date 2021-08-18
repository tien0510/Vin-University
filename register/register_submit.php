<?php
	require_once ('../db/dbhelper.php');
	session_start();
	if (isset($_POST['submit']) && $_POST["taikhoan"] != '' && $_POST["matkhau"] != '' && $_POST["re-matkhau"] != '') 
	{
		$username   = $_POST["taikhoan"];
		$password   = md5($_POST["matkhau"]);
		$repassword = md5($_POST["re-matkhau"]);



			if( $password != $repassword  ){			
				echo "<script>
					      alert('Mật khẩu không trùng khớp');
							window.location='http://localhost/Vin/register/register.php';
					      </script>";
				}


					$sql      = "select * from login where taikhoan = '$username'";
					$old      = execute($sql);

				if( mysqli_num_rows($old) > 0){
					echo "<script>
					      alert('Tên tài khoản hiện đã được sử dụng');
						  window.location='http://localhost/Vin/register/register.php';
					      </script>";
				}

				else if($password === $repassword){
					$sql="insert into login(taikhoan,matkhau) values('$username','$password')";
					// print($sql);
					// exit();
					execute($sql);

					echo "<script>
					      alert('Đăng kí tài khoản thành công !!!!!');
						  window.location='http://localhost/Vin/login/login.php';
					      </script>";

					}
	}
	else
		{

	header("location:register.php");
		}

?>