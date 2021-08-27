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
	    <a class="nav-link" href="../Post/">Post Management</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link active" href="#">Account Management</a>
	  </li>

	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center" style="color: #FFFFFF;">Account Management</h2>
			</div>
			<div class="panel-body">
				<a href="add.php">
					<button class="btn btn-success" style="margin-left: 10%;margin-bottom: 15px;">Add Account</button>
				</a>
				<a href="../../index.php">
					<button class="btn btn-warning" style="width: 15%;margin-left: 25vh ; margin-bottom: 15px "> Home</button>
				</a>
				<a href="../../logout.php">
					<button class="btn btn-danger" style="width: 15%;margin-left: 25vh ; margin-bottom: 15px "> Log out</button>
				</a>

				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px" class="text-warning">Numbers</th>
							<th class="text-warning"> Account Name</th>
							<th class="text-warning"> Account Tpye</th>
							<th class="text-warning"> Change Type Of Account</th>
							<th width="50px"></th>
							<th width="50px"></th>
						</tr>
					</thead>
					<tbody>
<?php
//Lay danh sach tai khoan tu database
$sql          = 'select * from user';
$userList = select_list($sql);

$index = 1;
foreach ($userList as $item) {
		if ($item['type']==0) {
			
			$type_acc = "Guess";
		}
		else{
			$type_acc = "Admin";
		}
	echo '<tr>
				<td class="text-warning">'.($index++).'</td>
				<td >'.$item['user_name'].'</td>
				
				<td >'.$type_acc.'</td>
				<td style = "width: 18%" >
					
					<a href="ChangeTypeAcc.php?id='.$item['id'].'"><button class="btn btn-info">Change</button></a>

				<td>
					<a href="add.php?id='.$item['id'].'"><button class="btn btn-warning">Update</button></a>
				</td>
				<td>
					<button class="btn btn-danger" onclick="deleteAccount('.$item['id'].')">Delete</button>
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
		function deleteAccount(id) {
			var option = confirm('Are you sure you want to delete this account?')
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