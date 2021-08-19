<?php
require_once ('db/dbhelper.php');
    session_start();

    if (!isset($_SESSION["username"]) )
        {     header("Location:index.php");
        }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Bài Đăng</title>
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
<body style="    background:url('http://khohinhdep.com/wp-content/uploads/2017/10/hinh-nen-dien-thoai-lg-v20-chat-luong-qhd-010.jpg');">

	<div class="container-fluid">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản Lý Bài Đăng</h2>
			</div>

			<div class="panel-body">
				<a href="post.php">
					<button class="btn btn-success" style="margin-bottom: 15px;">Đăng Bài Mới</button>
				</a>
				<a href="directory.php">
					<button class="btn btn-warning" style="margin-bottom: 15px;margin-left : 15px">Trở Về</button>
				</a>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">STT</th>
							<th>Tên Bài</th>
							<th>Hình Ảnh</th>
							<th>Ngày Đăng</th>
							<th>Giới Thiệu</th>
							<th>Trạng Thái</th>
							<!-- <td>Thao tác</td> -->
							<!-- <th width="50px"></th>
							<th width="50px"></th> -->
						</tr>
					</thead>
					<tbody>
<?php

$id_now = ' select id from login where taikhoan = "'.$_SESSION['username'].'"';
$id     = executeSingleResult($id_now);
if ($id != null) {
	$id = $id['id'];
}
$sql          = 'select * from directory where id_user = "'.$id.'" ';
// print($sql);
// exit();
$postList = executeResult($sql);

$index = 1;
$show  = '';
foreach ($postList as $item) {
if($item["trangthai"] == 0)
{
	$show1  = "Đã Đăng Tải";
}
else
{
	$show2  = "Chờ xét duyệt";
}
  $a='../../';
  $b=" ".$item["thumbnail"];
  if(strpos($b,$a)){ //  kiểm tra a có trong b không
    $item["thumbnail"] = str_replace('../../images','images' ,$item["thumbnail"]);
   }
  else{
       $item["thumbnail"] = $item["thumbnail"] ;
 
  }
 ?>

	<tr>
				<td><?=($index++)?></td>
				<td width="350px"><?=$item['name']?></td>
				<td><img src="<?=$item['thumbnail']?>" style="max-width: 100px"/></td>
						 
				<td><?=$item['create_date']?></td>
				<td width="350px"><?=$item['intro']?></td>

				 <?php if($item["trangthai"]==0){ ?>
				<td class="text-primary"><?=($show1)?></td>
				<?php } ?>


				 <?php if($item["trangthai"]==1){ ?>
				<td class="text-success"><?=($show2)?></td>
				<?php } ?>



				 <?php if($item["trangthai"]==1){ ?>
				<td style="width : 150px">
				<span  class="text-success">Chờ xét duyệt</span>
				</td>
				<?php } ?>



				<?php if($item["trangthai"]==0){ ?>
					<td>
				<a href="confirm.php?id=<?=$item['id']?>">
				<button class="btn btn-primary">Gỡ Bài</button></a>
				</td>
					<?php } ?> 
				<td>
				<a href="post.php?id=<?=$item['id']?>">
				<button class="btn btn-warning">Sửa</button></a>
				</td>
				
			</tr>
<?php } ?>

</tbody>
				</table>

			</div>
		</div>
	</div>

	
</body>
</html>