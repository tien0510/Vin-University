<?php
session_start();
require_once ('../../db/dbhelper.php');	
require_once('../check_admin.php');	
    
     $id_now = ' select id from user where user_name = "'.$_SESSION['username'].'"';
		$id_user     = select_one($id_now);
		if ($id_user != null) {
			$id_user = $id_user['id'];
		}
     date_default_timezone_set('Asia/Ho_Chi_Minh');		
		$create = date('Y-m-d');

$id =  $title = $thumbnail = $content = $status =$vin_leader  = $mota = '';
if (!empty($_POST)) {
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}	
	if (isset($_POST['name'])) {
			$title = $_POST['name'];
			$title = str_replace('"', '\\"', $title);
		}
	if (isset($_POST['status'])) {
		$status = $_POST['status'];
	}
	if (isset($_POST['vin_leader'])) {
		$vin_leader = $_POST['vin_leader'];
	}
	if (isset($_POST['mota'])) {
		$mota = $_POST['mota'];
		$mota = str_replace('"', '\\"', $mota);
	}
	if (isset($_POST['thumbnail'])) {
		$thumbnail = $_POST['thumbnail'];
		$thumbnail = str_replace('"', '\\"', $thumbnail);
	}
	if (isset($_POST['overview'])) {
		$content = $_POST['overview'];
		$content = str_replace('"', '\\"', $content);
	}
	if (isset($_POST['create_date'])) {
		$create = $_POST['create_date'];
	
	}


	if (!empty($title)) {
		//Luu vao database
		if ( (!isset($_GET['id'])) && $id == '') {

			$sql = 'insert into directory(name, thumbnail, intro, overview, create_date, status, vin_leader,id_user) values("'.$title.'", "'.$thumbnail.'", "'.$mota.'", "'.$content.'", "'.$create.'", '.$status.', '.$vin_leader.','.$id_user.')';
		} else {
			$id      = $_GET['id'];
			$sql = 'update directory set name = "'.$title.'", thumbnail = "'.$thumbnail.'", intro = "'.$mota.'", overview = "'.$content.'", create_date = "'.$create.'", status = '.$status.', vin_leader = '.$vin_leader.' where id = '.$id;
		}

			 select($sql);
		header('Location: index.php');
		die();
	}
}

if (isset($_GET['id'])) {
	$id      = $_GET['id'];
	$sql     = 'select * from directory where id = '.$id;
	$post = select_one($sql);
	if ($post != null) {
		$title       = $post['name'];
		$status 	 = $post['status'];
		$vin_leader 	 = $post['vin_leader'];
		$create    = $post['create_date'];
		$mota        = $post['intro'];
		$a='../../';
		$b=" ".$post["thumbnail"];

		if(strpos($b,$a)){ //  ki???m tra a c?? trong b kh??ng
		          		 $post["thumbnail"] = $post["thumbnail"] ;
		 }
		else{
			$post["thumbnail"] = str_replace('images', '../../images',$post["thumbnail"]);
		}
		
		$thumbnail   = $post['thumbnail'];	
		// echo(strpos($b,$a));
		// print($thumbnail);
		// exit();
		$content     = $post['overview'];
		;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add/Update Directory</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	         <link rel="stylesheet" type="text/css" href="add.css">
	<link rel="shortcut icon" type="image/ico" href="../icon/logo.ico">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<!-- summernote -->
	<!-- include summernote css/js -->
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body  style="    background:url('https://st.quantrimang.com/photos/image/2020/07/30/Hinh-Nen-Trang-9.jpg');">
	<ul class="nav nav-tabs">
	  <li class="nav-item">
	    <a class="nav-link" href="../account/">Account Management</a>
	  </li>
	   <li class="nav-item">
	    <a class="nav-link "  href="../Post/">Post Management</a>
	  </li>
	   <li class="nav-item">
	    <a class="nav-link active" href="#">Directory Management</a>
	  </li>
	</ul>

	

				<h2 class="text-center">Add/Update Directory</h2>


	<div class="container">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
          <div id="info"><div>
            <hr> 
            <label for="title_r" style="color: #a52a2a; font-size:22px; margin-left:5px ; ">Name </label>
            <input required="true" style="margin-left: 20%; width: 50% ;" class="text-center" type="text" name="name" id="name" maxlength="500" value="<?=$title?>">
          </div>
            <hr>
            

          <h2>Status</h2>
            <div class="row">
              <label for="" class="col-4">Status</label>
              <select class="form-control" style="width: 200px; " name="status" id="status">					  	
              <option  	value=0 selected>Post now</option>
					  	<option  	value=1 <?php if($status==1) echo "selected"?>>Waiting for confirm</option>	 
					  	 </select>
					  	  <label for="" class="col-2" style=" margin-left : 50px">Vin-Leader</label>
              <select class="form-control" style="width: 200px; " name="vin_leader" id="vin_leader">					  	
              <option  	value=0 selected>No</option>
					  	<option  	value=1 <?php if($vin_leader==1) echo "selected"?>>Yes</option>	 
					  	 </select>
            </div>

            <hr>

            <h2>Date of writing</h2>
            <div class="row">
              <label for="" class="col-4">Date</label>
              <input  style="width: 200px;" type="date" name="create_date" id="create_date" min="0" value="<?=$create?>">
              
            </div>
            
           <hr>

         
          <div style="margin-left:0px;" id="contact">
          <h2>Description</h2>

          <div>
            <textarea id="mota" name="mota" rows="10" cols="50" maxlength="4000" ><?=$mota?></textarea>
          </div>




        </div>



          </div>                    
    
            <hr>
          </div>

        <!-- address -->
       

        
          
         <div class="form-group">
					  <label for="thumbnail">Thumbnail:</label>
					  
					  <input required="true" placeholder="../../" type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?=$thumbnail?>" onchange="updateThumbnail()">
					  <img src="<?=$thumbnail?>" style="max-width: 200px" id="img_thumbnail">

           <hr>
            <div class="form-group" style="background-color:  white;">
          				  <label for="noidung" style="color: #a52a2a;">Content:</label>
           				 <textarea class="form-control"  rows="6" name="overview" id="noidung"?><?=$content?></textarea>
          	</div>
		</div>

   
        	<button class="btn btn-success">Save</button>

    </form>
    </div>

  </div>
					</div>
				
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function updateThumbnail() {
			$('#img_thumbnail').attr('src', $('#thumbnail').val())
		}

		$(function() {
			//doi website load noi dung => xu ly phan js
			$('#noidung').summernote({
			  height: 250
			});
		})
	</script>
</body>
</html>