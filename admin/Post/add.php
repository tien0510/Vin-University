<?php
session_start();
require_once ('../../db/dbhelper.php');	
require_once('../check_admin.php');	
    
$id_now = ' select id from user where user_name = "'.$_SESSION['username'].'"';
		$id_user     = select_one($id_now);
		if ($id_user != null) {
			$id_user = $id_user['id'];
		}
$id =  $title = $thumbnail = $content=$intro = $category  = '';
if (!empty($_POST)) {
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}	
	if (isset($_POST['name'])) {
			$title = $_POST['name'];
			$title = str_replace('"', '\\"', $title);
		}
	if (isset($_POST['category'])) {
		$category = $_POST['category'];
	}
	if (isset($_POST['thumbnail'])) {
		$thumbnail = $_POST['thumbnail'];
		$thumbnail = str_replace('"', '\\"', $thumbnail);
	}
	if (isset($_POST['content'])) {
		$content = $_POST['content'];
		$content = str_replace('"', '\\"', $content);
	}
	if (isset($_POST['intro'])) {
		$intro = $_POST['intro'];
		$intro = str_replace('"', '\\"', $intro);
	}


	if (!empty($title)) {
		//Luu vao database
		if ( (!isset($_GET['id'])) && $id == '') {

			$sql = 'insert into post(name, thumbnail, content, intro, id_category,id_user) values("'.$title.'", "'.$thumbnail.'", "'.$content.'", "'.$intro.'", '.$category.','.$id_user.')';
		} else {
			$id      = $_GET['id'];
			$sql = 'update post set name = "'.$title.'", thumbnail = "'.$thumbnail.'", content = "'.$content.'", intro = "'.$intro.'", id_category = '.$category.' where id = '.$id;
		}

			 select($sql);
		header('Location: index.php');
		die();
	}
}

if (isset($_GET['id'])) {
	$id      = $_GET['id'];
	$sql     = 'select * from post where id = '.$id;
	$post = select_one($sql);
	if ($post != null) {
		$title       = $post['name'];
		$a='../../';
		$b=" ".$post["thumbnail"];

		if(strpos($b,$a)){ //  kiểm tra a có trong b không
		          		 $post["thumbnail"] = $post["thumbnail"] ;
		 }
		else{
			$post["thumbnail"] = str_replace('images', '../../images',$post["thumbnail"]);
		}
		$id_cate = $post['id_category'];
		$thumbnail   = $post['thumbnail'];	
		$content     = $post['content'];
		$intro     = $post['intro'];
		;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add/Update Post</title>
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
	    <a class="nav-link active" href="#">Post Management</a>
	  </li>
	   <li class="nav-item">
	    <a class="nav-link "  href="../Directory/">Directory Management</a>
	  </li>
	</ul>

	

				<h2 class="text-center">Add/Update Post</h2>


	<div class="container">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
          <div id="info"><div>
            <hr> 
            <label for="title_r" style="color: #a52a2a; font-size:22px; margin-left:5px ; ">Name </label>
            <input required="true" style="margin-left: 20%; width: 50% ;" class="text-center" type="text" name="name" id="name" maxlength="500" value="<?=$title?>">
          </div>
            <hr>
            

          <h2>Category</h2>
            <div class="row">
              <label for="" class="col-4">Category</label>
              <select class="form-control" style="width: 200px; " name="category" id="category">					  	
              <?php 

					  		$sql = "select * from category " ;
					  		$variable = select_list($sql);
					  		foreach ($variable as  $value) { ?>
					  				
					  		<option value="<?=$value['id']?>"<?php if (isset($id_cate) && $id_cate ==$value['id']) { echo "selected";} ?>><?=$value['name_category']?></option>

					  	<?php } ?>
					  	 </select>
					  	  







        </div>

		<div style="margin-left:0px;" id="contact">
          <h2>Description</h2>

          <div>
            <textarea id="intro" name="intro" rows="10" cols="50" maxlength="4000" ><?=$intro?></textarea>
          </div>

            </div>

            <hr>
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
          				  <label for="content" style="color: #a52a2a;">Content:</label>
           				 <textarea class="form-control"  rows="6" name="content" id="content"?><?=$content?></textarea>
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
			$('#content').summernote({
			  height: 250
			});
		})
	</script>
</body>
</html>