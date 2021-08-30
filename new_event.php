<?php 

  session_start();
  require_once('db/dbhelper.php');
  $where = ""; 
 ?>

<!DOCTYPE html>
<html lang="en" style="overflow-x: hidden;">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>New & Event</title>
  <link rel="shortcut icon" type="image/ico" href="icon/logo.ico">
		<link rel="stylesheet" type="text/css" href="css/new_event.css">
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>

<?php 
	
	require_once('header.php')

 ?>


    
<section class="wrap-icon-modal">
          <div class="container mt-0 mt-md-5">
            <div class="row mb-3 mb-sm-2">
              <div class="col-12">
                <h2 class="text-center " style="color: #cd3c3f!important;">VinUni New</h2>
                <div class="mb-4"></div>
              </div>
            </div>
          </div>
</section>

<section class="search-wrap pb-5"><hr style="width: 90%;">
          <div class="container pb-5">

          </div>
</section>

<?php 


  $category= "select id from category where name_category = 'new' ";
  $post = select_one($category);
  if ($post != null) {
    $id= $post['id'];
  }
   $sql = "select * from post where id_category = " .$id;
  $datas = select_list($sql);


 ?>

	<div class="container-fluid" style="padding-left:5% ; margin-bottom : 100px" >
        <div class="row">
    <?php 

       foreach( $datas as $data){ 
          $a='../../';
          $b=" ".$data["thumbnail"];
          if(strpos($b,$a)){ //  kiểm tra a có trong b không
            $data["thumbnail"] = str_replace('../../images','images' ,$data["thumbnail"]);
           }
          else{
               $data["thumbnail"] = $data["thumbnail"] ;
         
          }
          
          $thumbnail   = $data['thumbnail'];  
   ?>
       <div class="col-lg-4 col-sm-6 col-12" >
          <a href="detail.php?id=<?=$data['id']?>" style="width: 100%;" >
            <div class="item" style="width: 100%">
              <div class="detail" >
                <span >Detail...</span>
              </div>

              <div class="thumb" >
                <img src=" <?php echo"".$thumbnail."" ?> ">
              </div>

              <div class="info">
                <div class="name_direc">
                  <span style=""><?php echo"".$data['name']."" ?></span>
                </div>

                <div class="infor">
                  <span class="infor_direc" ><?php echo"".substr($data['intro'], 0 , 80)."" ?>[...]</span>

                </div>
              </div>
            </div>
          </a>
        </div>
     <?php } ?>

      </div>
  </div>



  <section class="wrap-icon-modal">
          <div class="container mt-0 mt-md-6">
            <div class="row mb-3 mb-md-2">
              <div class="col-12">
                <h2 class="text-center " style="color: #cd3c3f!important;">VinUni Event</h2>
                <div class="mb-4"></div>
              </div>
            </div>
          </div>
</section>

<section class="search-wrap pb-5"><hr style="width: 90%;">
          <div class="container pb-5">

          </div>
</section>

<?php 


  $category= "select id from category where name_category = 'event' ";
  $post = select_one($category);
  if ($post != null) {
    $id= $post['id'];
  }
   $sql = "select * from post where id_category = " .$id;
  $datas = select_list($sql);


 ?>

  <div class="container-fluid" style="padding-left:5% ; margin-bottom : 100px" >
        <div class="row">
    <?php 

       foreach( $datas as $data){ 
          $a='../../';
          $b=" ".$data["thumbnail"];
          if(strpos($b,$a)){ //  kiểm tra a có trong b không
            $data["thumbnail"] = str_replace('../../images','images' ,$data["thumbnail"]);
           }
          else{
               $data["thumbnail"] = $data["thumbnail"] ;
         
          }
          
          $thumbnail   = $data['thumbnail'];  

        ?>

   
       <div class="col-lg-4 col-sm-6 col-12" >
          <a href="detail.php?id=<?=$data['id']?>" style="width: 100%;" >
            <div class="item" style="width: 100%">
              <div class="detail" >
                <span >Detail...</span>
              </div>

              <div class="thumb" >
                <img src=" <?php echo"".$thumbnail."" ?> ">
              </div>

              <div class="info">
                <div class="name_direc">
                  <span style=""><?php echo"".$data['name']."" ?></span>
                </div>

                <div class="infor">
                  <span class="infor_direc" ><?php echo"".substr($data['intro'], 0 , 80)."" ?>[...]</span>

                </div>
              </div>
            </div>
          </a>
        </div>
     <?php } ?>

      </div>
  </div>


<?php 	
	
	require_once('footer.php');
	
 ?>

</body>
</html>

