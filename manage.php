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
	<title>Post Management</title>
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
				<h2 class="text-center">Post Management</h2>
			</div>

			<div class="panel-body">
				<a href="post.php">
					<button class="btn btn-success" style="margin-bottom: 15px;">New Post</button>
				</a>
				<a href="directory.php">
					<button class="btn btn-warning" style="margin-bottom: 15px;margin-left : 15px">Return</button>
				</a>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">Numbers</th>
							<th>Name</th>
							<th>Thumbnail</th>
							<th>Date Posted</th>
							<th>Introduce</th>
							<th>Status</th>
							<!-- <td>Thao tác</td> -->
							<!-- <th width="50px"></th>
							<th width="50px"></th> -->
						</tr>
					</thead>
					<tbody>
<?php

$id_now = ' select id from user where user_name = "'.$_SESSION['username'].'"';
$id     = select_one($id_now);
if ($id != null) {
	$id = $id['id'];
}
$sql          = 'select * from directory where id_user = "'.$id.'" ';
// print($sql);
// exit();
$postList = select_list($sql);

$index = 1;
$show  = '';
foreach ($postList as $item) {
if($item["status"] == 0)
{
	$show1  = "Posted";
}
else
{
	$show2  = "Waiting for confirm";
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

				 <?php if($item["status"]==0){ ?>
				<td class="text-primary"><?=($show1)?></td>
				<?php } ?>


				 <?php if($item["status"]==1){ ?>
				<td class="text-success"><?=($show2)?></td>
				<?php } ?>



				 <?php if($item["status"]==1){ ?>
				<td style="width : 150px">
				<span  class="text-success">Waiting for confirm</span>
				</td>
				<?php } ?>



				<?php if($item["status"]==0){ ?>
					<td>
				<a href="confirm.php?id=<?=$item['id']?>">
				<button class="btn btn-primary">Remove</button></a>
				</td>
					<?php } ?> 
				<td>
				<a href="post.php?id=<?=$item['id']?>">
				<button class="btn btn-warning">Update</button></a>
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