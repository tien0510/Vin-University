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
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Tài Khoản</title>
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
<style>
	td{
	font-weight : bold ; color : white; font-size : 1.3rem	;}
</style>
<body style="background: url('../../images/6.PNG') ; overflow-y: hidden; ">
	<ul class="nav nav-tabs">
	  
	  <li class="nav-item">
	    <a class="nav-link" href="../Post/">Quản Lý Bài Đăng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link active" href="#">Quản Lý Tài Khoản</a>
	  </li>

	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center" style="color: #FFFFFF;">Quản Lý Tài Khoản</h2>
			</div>
			<div class="panel-body">
				<a href="add.php">
					<button class="btn btn-success" style="margin-left: 10%;margin-bottom: 15px;">Thêm Tài Khoản</button>
				</a>
				<a href="../../index.php">
					<button class="btn btn-warning" style="width: 15%;margin-left: 25vh ; margin-bottom: 15px "> Trang Chủ </button>
				</a>
				<a href="../../logout.php">
					<button class="btn btn-danger" style="width: 15%;margin-left: 25vh ; margin-bottom: 15px "> Đăng Xuất </button>
				</a>

				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px" class="text-warning">STT</th>
							<th class="text-warning">Tên Tài Khoản</th>
					<!-- 		<th class="text-warning"> Mật Khẩu</th> -->
							<th class="text-warning"> Loại Tài Khoản</th>
							<th width="50px"></th>
							<th width="50px"></th>
						</tr>
					</thead>
					<tbody>
<?php
//Lay danh sach tai khoan tu database
$sql          = 'select * from login';
$loginList = executeResult($sql);

$index = 1;
foreach ($loginList as $item) {
		if ($item['trangthai']==0) {

			$type_acc = "Guess";
		}
		else{
			$type_acc = "Admin";
		}
	echo '<tr>
				<td class="text-warning">'.($index++).'</td>
				<td >'.$item['taikhoan'].'</td>
				
				<td >'.$type_acc.'</td>
				<td>
					<a href="add.php?id='.$item['id'].'"><button class="btn btn-warning">Sửa</button></a>
				</td>
				<td>
					<button class="btn btn-danger" onclick="deleteCategory('.$item['id'].')">Xoá</button>
				</td>
			</tr>';
}
?>
					</tbody>
				</table>
			</div>
		</div>
	</div>



	<script type="text/javascript">
		function deleteCategory(id) {
			var option = confirm('Bạn có chắc chắn muốn xoá danh mục này không?')
			if(!option) {
				return;
			}

			console.log(id)
			//ajax - lenh post
			$.post('ajax.php', {
				'id': id,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>

	
</body>
</html>