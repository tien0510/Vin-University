<?php
require_once ('db/dbhelper.php');	
	  date_default_timezone_set('Asia/Ho_Chi_Minh');		
		$create = date('Y-m-d');
    session_start();
    $id_now = ' select id from login where taikhoan = "'.$_SESSION['username'].'"';
		$id_user     = executeSingleResult($id_now);
		if ($id_user != null) {
			$id_user = $id_user['id'];
		}
    $check = "select trangthai from login where taikhoan = '".$_SESSION['username']."'" ;

    if (!isset($_SESSION["username"]) )
        {     header("Location:index.php");
       
        }

$id =  $title = $status = $mota = $thumbnail = $content =  '';
if (!empty($_POST)) {
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}	
	if (isset($_POST['tenbai'])) {
			$title = $_POST['tenbai'];
			$title = str_replace('"', '\\"', $title);
		}
		if (isset($_POST['trangthai'])) {
		$status = $_POST['trangthai'];
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

			$sql = 'insert into directory(name, thumbnail, intro, overview, create_date, trangthai ,id_user) values("'.$title.'", "'.$thumbnail.'", "'.$mota.'", "'.$content.'", "'.$create.'", '.$status.', '.$id_user.')';
		} else {
			$id      = $_GET['id'];
			$sql = 'update directory set name = "'.$title.'", thumbnail = "'.$thumbnail.'", intro = "'.$mota.'", overview = "'.$content.'", create_date = "'.$create.'", trangthai = '.$status.' where id = '.$id;
		}

		execute($sql);
		// print($sql);
		// exit();
		echo "<script>
      alert('Bài đăng sẽ được chờ để xét duyệt');
      window.location='http://localhost/vin/manage.php';
      </script>";
		die();
	}
}
if (isset($_GET['id'])) {
	$id      = $_GET['id'];
	$sql     = 'select * from directory where id = '.$id;
	$post = executeSingleResult($sql);
	if ($post != null) {
		$title       = $post['name'];
		$status 	 = 1 ;
		$create    = $post['create_date'];
		$mota        = $post['intro'];
		$a='../../';
		$b=" ".$post["thumbnail"];

		if(strpos($b,$a)){ //  kiểm tra a có trong b không
		    $post["thumbnail"] = str_replace('../../images','images' ,$post["thumbnail"]);	
		 }
		else{
			 $post["thumbnail"] = $post["thumbnail"] ;
		}
		
		$thumbnail   = $post['thumbnail'];	
		$content     = $post['overview'];
		;
	}
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm/Sửa Bài Đăng</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	         <link rel="stylesheet" type="text/css" href="css/post.css">
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
<body style="background-color : #F6F0F0">

				<h2 class="text-center">Thêm/Sửa Bài Đăng</h2>


	<div class="container">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
          <div id="info"><div>
            <hr> 
            <label for="title_r" style="color: #a52a2a; font-size:22px; margin-left:5px ; ">Tên </label>
            <input style="margin-left: 20%; width: 50% ;" class="text-center" type="text" name="tenbai" id="tenbai" maxlength="500" value="<?=$title?>">
          </div>
            <hr>
            

          <h2>Trạng Thái</h2>
            <div class="row">
              <label for="" class="col-4">Trạng Thái</label>
              <select class="form-control" style="width: 200px; " name="trangthai" id="trangthai">					  	
					  	<option  	value=1 <?php if( $status!="" && $status==1) echo "selected"?>>Chờ Duyệt</option>	 
					  	 </select>
            </div>

            <hr>

            <h2>Ngày viết bài</h2>
            <div class="row">
              <label for="" class="col-4">Ngày</label>
              <input  style="width: 200px;" type="date" name="create_date" id="create_date" min="0" value="<?=$create?>">
              
            </div>
            
           <hr>

         
          <div style="margin-left:0px;" id="contact">
          <h2>Mô tả</h2>

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
					  
					  <input required="true" placeholder="" type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?=$thumbnail?>" onchange="updateThumbnail()">
					  <img src="<?=$thumbnail?>" style="max-width: 200px" id="img_thumbnail">

           <hr>
            <div class="form-group"  style="background-color:  white;" >
          				  <label for="noidung" style="color: #a52a2a;">Nội Dung:</label>
           				 <textarea class="form-control" rows="6" name="overview" id="noidung"?><?=$content?></textarea>
          	</div>
		</div>

   
        	<button class="btn btn-success">Lưu</button>

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