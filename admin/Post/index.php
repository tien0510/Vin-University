<?php
session_start();
require_once ('../../db/dbhelper.php');
require_once('../check_admin.php');
       $check = "select type from user where user_name = '".$_SESSION['username']."'" ;
$where = "where id_category is not null";
if (isset($_GET['id_category'])) {
	if ($_GET['id_category']=="all") {
		$where = "where id_category is not null";
	}else{
		$id_ca = $_GET['id_category'];
		$where = "where id_category = " .$id_ca ;
		
	}
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
	   <li class="nav-item">
	    <a class="nav-link "  href="../Directory/">Directory Management</a>
	  </li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Post Management</h2>
			</div>
			<div class="panel-body">
				<a href="add.php">
					<button class="btn btn-success" style="margin-bottom: 15px;">New Post</button>
				</a>
				<form action="" method="GET">
					<div class="select" style=" margin-top : -50px; margin-left:150px;">
				<select class="btn btn-primary"  name="id_category" value="<?=$dv?>" style="width: 200px;margin-left: 500px  ; " >
							

							<option value="all">Select category</option>
							<?php 

					  		$sql = "select * from category " ;
					  		$variable = select_list($sql);
					  		foreach ($variable as  $value) { ?>
					  				
					  		<option value="<?=$value['id']?>" <?php if (isset($id_ca) && $id_ca ==$value['id'] ){ echo "selected";} ?>><?=$value['name_category']?></option>

					  	<?php } ?>

					
					</select>
					<button  class="btn btn-info">Show</button>
				</div>
			</form>

				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">Numbers</th>
							<th>Name </th>
							<th>Thumbnail</th>
							<th >Posted by</th>
							<th width="200px">Category</th>
						</tr>
					</thead>
					<tbody>
<?php



  
$sql = "select * from post ".$where."";
$postList = select_list($sql);
$index =1;
foreach ($postList as $item) {
	$poster 	= "select user_name from user where id = " .$item['id_user'];
	$get_name   = select_one($poster);
	if ($get_name != null) {
		$get_name = $get_name['user_name'];
	}
	$cate = " select name_category from category where id = " .$item['id_category'];
	$category = select_one($cate);	
	if ($category != null) {
		$category = $category['name_category'];
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
				<td><img src="<?=$item['thumbnail']?>" style="width: 100px;height :80px"/>
				</td>
				<td width="130px"><?=$get_name?></td>
				<td width="350px"><?=$category?></td>
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

	<script type="text/javascript">
		function deleteProduct(id) {
			var option = confirm('Are you sure you want to delete this post ?')
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