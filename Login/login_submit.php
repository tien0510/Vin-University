<?php
	require_once ('../db/dbhelper.php');
	session_start();

	if (isset($_POST['submit']) && $_POST["taikhoan"] != '' && $_POST["matkhau"] != '') 
	{
			// $id_user    = $_POST["id"];
			$username      = $_POST["taikhoan"];
			$password  	   = $_POST["matkhau"] ;

			$verf		= "select matkhau from login where taikhoan ='$username' ";
			$verify  = executeSingleResult($verf);
			if ($verify != null) {
				$v = $verify['matkhau'];
			}
			
			$check = password_verify($password, $v) ;


			if ($check) {

			$sql		= "select * from login where taikhoan ='$username'";
			$stt  = executeSingleResult($sql);
			$user = execute($sql); 
			if ( $stt != null) {
				$status = $stt['trangthai'];
			}			
			

			if(mysqli_num_rows($user)>0){
				if($status == 1){	
					echo "<script>
					      alert('--- Xin chào admin ! Chuyển hướng đăng nhập vào trang quản trị----');
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
					      alert('Nhập sai tên Tài Khoản hoặc Mật Khẩu');
						  window.location='http://localhost/Vin/login/login.php';
					      </script>";
					    
			}

	}

?>
