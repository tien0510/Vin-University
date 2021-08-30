<?php
session_start();
require_once ('../../db/dbhelper.php');
require_once('../check_admin.php');
       $check = "select type from user where user_name = '".$_SESSION['username']."'" ;
$where = "where status is not null";
// $stt ="All";
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
	    <a class="nav-link active" href="#">Directory Management</a>
	  </li>
	  	  <li class="nav-item">
	    <a class="nav-link" href="../account/">Account Management</a>
	  </li>
	   <li class="nav-item">
	    <a class="nav-link "  href="../Post/">Post Management</a>
	  </li>
	</ul>

	<div class="container-fluid">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Directory Management</h2>
			</div>
			<div class="panel-body">
				<a href="add.php">
					<button class="btn btn-success" style="margin-bottom: 15px;">Add Directory</button>
				</a>
				<form action="" method="GET">
					<div class="select" style=" margin-top : -50px; margin-left:150px;">
				<select class="btn btn-primary"  name="status" value="<?=$dv?>" style="width: 200px;margin-left: 500px  ; " >
							

							<option  selected="true" >Select status</option>
							<option value="All"<?php if (isset($_GET['status']) && $_GET['status'] == "All" ) {echo "selected";}?>>All</option>
							<option value="0" <?php if (isset($_GET['status']) && $_GET['status'] == "0" ) {echo "selected";}?>>Posted</option>
							<option value="1" <?php if (isset($_GET['status']) && $_GET['status'] == "1" ) {echo "selected";}?>>Waiting for confirm</option>

					
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
							<th width="200px">Date Posted</th>
							<th width="300px">Introduce</th>
							<th >Posted by</th>
							<th width="200px">Status</th>
						</tr>
					</thead>
					<tbody>
<?php



  $numberpage = !empty($_GET['per_page'])?$_GET['per_page'] : 15 ;// số lượng trên 1 trang
  $page =  !empty($_GET['page'])?$_GET['page']:1 ;      // trang hiện tại 
  $OFFSET = ($page - 1)*$numberpage; // lấy offset từ trang tương ứng
  if (isset($_GET['status'])) {
  		if ($_GET['status'] == "All"){
  			$where = "where status is not null";
  				;
  		}else if ($_GET['status'] == "0" ) {
  			 $where = "where status = 0";
  				
  		}else if ($_GET['status'] == "1" ) {
  			$where = "where status = 1";
  				
  }}
  $sql= "select * from directory ".$where." order by id ASC LIMIT " .$numberpage." OFFSET ".$OFFSET."";
  $sql_total      = "select * from directory  " .$where;
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
			var option = confirm("Are you sure you want to delete this directory ?")
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