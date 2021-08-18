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
$id = $name  = $mk =  $type_acc = '';
if (!empty($_POST)) {
	if (isset($_POST['taikhoan'])) {
		$name = $_POST['taikhoan'];
	}
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}

	if (isset($_POST['matkhau'])) {
		$mk = md5($_POST['matkhau']);
	}
	if (isset($_POST['loaitk'])) {
		$type_acc = $_POST['loaitk'];
	}

	$exist = "select * from login where taikhoan = '".$name."' ";

	

	if (!empty($name)) {
		//Luu vao database
		if ($id == '') {
			if( mysqli_num_rows(execute($exist)) < 1) {
			
				$sql = 'insert into login(taikhoan, matkhau) values("'.$name.'", "'.$mk.'")';
				execute($sql);
				header('Location: index.php');
				die();
			}
			else{
				echo "<script>
			      alert('Tên tài khoản hiện đã được sử dụng');
			      window.location='http://localhost/vin/admin/Account/add.php';
			      </script>" ;	
			      die();
					
				
			}
		}
		 else {
			$sql = 'update login set taikhoan = "'.$name.'", matkhau = "'.$mk.'", trangthai = '.$type_acc.' where id = '.$id;
			execute($sql);
			header('Location: index.php');
			die();
		}

		
	}
}

if (isset($_GET['id'])) {
	$id       = $_GET['id']; 
	$sql      = 'select * from login where id = '.$id;
	$login = executeSingleResult($sql);
	if ($login != null) {
		$name 	  = $login['taikhoan'];
		$mk 	  = $login['matkhau'];
		$type_acc = $login['trangthai'];
	}
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Thêm/Sửa Tài Khoản</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/ico" href="../icon/logo.ico">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background: url('../../images/6.PNG') ; overflow-y: hidden;">
	<ul class="nav nav-tabs">
	  <li class="nav-item">
	    <a class="nav-link " href="../Account/">Quản Lý Tài Khoản</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../Post/">Quản Lý Bài Đăng</a>
	  </li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/Sửa Tài Khoản</h2>
			</div>
			<div class="panel-body">
				<form method="post" style = "width: 50% ;">
					<div class="form-group">
					  <label style="margin-left:30% ;color:#F0F811;font-weight: 600; font-size : 30px" for="taikhoan">Tên Tài Khoản:</label>
					  <input type="text" name="id" value="<?=$id?>" hidden="true">

					  <input style="text-align:center;font-size : 20px;" required="true" type="text" class="form-control" id="taikhoan" name="taikhoan" 
					  value="<?=$name?>" >

					</div>
					<div class="form-group">
					  <label style="margin-left:30% ;color:#F0F811;font-weight: 600; font-size : 30px" for="matkhau">Đặt Mật Khẩu:</label>
					  
					  <input style="text-align:center;font-size : 20px;" required="true" type="text" class="form-control" id="matkhau" name="matkhau" value="<?=$mk?>" >
					</div>
					<div class="form-group">
					  <label style="margin-left:30% ;color:#F0F811;font-weight: 600; font-size : 30px" for="matkhau">Loại tài khoản:</label>
					  
					  <select style="padding-left: 42% ;font-size : 20px;" required="true" type="text" class="form-control" id="loaitk" name="loaitk" value="<?=$type_acc?>" >
					  	<option   value=0 selected><p >Guess</p></option>
					  	<option  value=1 <?php if( $type_acc!="" && $type_acc==1) echo "selected"?> >Admin</option>	 
					  </select>
					</div>

					<button style="width: 50%; margin-left : 20%" class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>