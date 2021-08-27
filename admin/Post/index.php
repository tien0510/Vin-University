<?php
require_once ('../../db/dbhelper.php');
    session_start();
       $check = "select type from user where user_name = '".$_SESSION['username']."'" ;

 	$check = select_one($check);
 	if ($check != null) {
 		$status = $check['type'];
 	}
    if (!isset($_SESSION["username"]) || $status == 0 )
        {     header("Location:../../index.php");
            // header("Location:index.php");
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
<style>

	td{
	 font-weight: 600;
}
	.pagination{
    font-size: 35px;
    position:relative;
    margin-bottom: 2%;
    margin-left: 43%;
}
.pagination .page-item{
    text-align: center;
    margin-right: 15px;
    font-weight: bold;
    color: #962629;
}
.pagination .page-item:hover{
    color: #2e5288;
}
</style>
<body style="    background:url('http://khohinhdep.com/wp-content/uploads/2017/10/hinh-nen-dien-thoai-lg-v20-chat-luong-qhd-010.jpg');">
	<ul class="nav nav-tabs">

	  <li class="nav-item">
	    <a class="nav-link active" href="#">Post Management</a>
	  </li>
	  	  <li class="nav-item">
	    <a class="nav-link" href="../account/">Account Management</a>
	  </li>
	</ul>

	<div class="container-fluid">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Post Management</h2>
			</div>
			<div class="panel-body">
				<a href="add.php">
					<button class="btn btn-success" style="margin-bottom: 15px;">New post</button>
				</a>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">Numbers</th>
							<th>Name </th>
							<th>Thumbnail</th>
							<th width="200px">Date Posted</th>
							<th width="300px">Introduce</th>
							<th >Posted by</th>
							<th width="200px">Status</th>
							
							<!-- <td>Thao tác</td> -->
							<!-- <th width="50px"></th>
							<th width="50px"></th> -->
						</tr>
					</thead>
					<tbody>
<?php



  $numberpage = !empty($_GET['per_page'])?$_GET['per_page'] : 10 ;// số lượng trên 1 trang
  $page =  !empty($_GET['page'])?$_GET['page']:1 ;      // trang hiện tại 
  $OFFSET = ($page - 1)*$numberpage; // lấy offset từ trang tương ứng
// $sql          = 'select * from directory';
  $sql= "select * from directory order by id ASC LIMIT " .$numberpage." OFFSET ".$OFFSET."";
  $sql_total      = "select * from directory  ";
  // print($sql);
  // print($sql_total);
  // exit();

   $total_s       = select($sql_total);
   $total_s       = mysqli_num_rows($total_s);
   $total_page    = ceil($total_s/$numberpage);


$postList = select_list($sql);

$index = ($page*10)-9 ;
$show  = '';
foreach ($postList as $item) {

	$poster 	= "select user_name from user where id = " .$item['id_user'];
	$get_name   = select_one($poster);
	if ($get_name != null) {
		$get_name = $get_name['user_name'];
	}

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
if(strpos($b,$a)){
          		 $item["thumbnail"] = $item["thumbnail"] ;
          }
else{
		$item["thumbnail"] = str_replace('image', '../../image',$item["thumbnail"]);
} ?>

	<tr>
				<td><?=($index++)?></td>
				<td width="350px"><?=$item['name']?></td>
				<td><img src="<?=$item['thumbnail']?>" style="width: 100px;height :80px"/></td>
						 
				<td><?=$item['create_date']?></td>
				<td width="450px"><?=$item['intro']?></td>


				<td width="130px"><?=$get_name?></td>


				 <?php if($item["status"]==0){ ?>
				<td class="text-primary"><?=($show1)?></td>
				<?php } ?>


				 <?php if($item["status"]==1){ ?>
				<td class="text-success"><?=($show2)?></td>
				<?php } ?>



				 <?php if($item["status"]==1){ ?>
				<td>
				<a href="confirm.php?id=<?=$item['id']?>">
				<button class="btn btn-success">Confirm</button></a>
				</td>
				<?php } ?>

				


				<?php if($item["status"]==0){ ?>
					<td>
				<a href="confirm.php?id=<?=$item['id']?>">
				<button class="btn btn-primary">Remove</button></a>
				</td>
					<?php } ?> 
				<td>
				<a href="add.php?id=<?=$item['id']?>">
				<button class="btn btn-warning">Update</button></a>
				</td>
				<td>
				<button class="btn btn-danger" onclick="deleteProduct(<?=$item['id']?>)">Delete</button>
				</td>
			</tr>
<?php } ?>

</tbody>
				</table>

			</div>
		</div>
	</div>
	<?php require_once('pagination.php'); ?>
	<script type="text/javascript">
		function deleteProduct(id) {
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