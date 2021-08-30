<?php 

  session_start();
  require_once('db/dbhelper.php');
  $name = $thumbnail = $intro = $overview = '' ;
 ?>
<!DOCTYPE html>
<html lang="en" style="overflow-x: hidden;">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Information-detail-VinUni</title>
		<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/detail.css">
    <link rel="stylesheet" href="css/new_event.css">

    <link rel="shortcut icon" type="image/ico" href="icon/logo.ico">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
	


<?php require_once('header.php') ?>

<div class="intro">
    <?php 

      $sql =  " select * from post where id =".$_GET['id']." ";

      $detail =  select_one($sql) ;
      if($detail != null) {
        
      $name = $detail['name'];

          $a='../../';
          $b=" ".$detail["thumbnail"];
          if(strpos($b,$a)){ //  kiểm tra a có trong b không
            $detail["thumbnail"] = str_replace('../../images','images' ,$detail["thumbnail"]);
           }
          else{
               $detail["thumbnail"] = $detail["thumbnail"] ;
         
          }
          $thumbnail = $detail['thumbnail'];

          $detail["intro"] = str_replace('[…]','' ,$detail["intro"]);

      $intro = $detail['intro'];
      $overview = $detail['content'];

      }  ?>

  
      <div class="container-fliud" style="padding : 7%">

        <div class="wrapper row" style="margin-top : -80px">


          <div class="details col-md-12">
            <h3 class="mb-3 h3 text-secondary font-weight-bold about-intro-title"><?=$name?></h3>
            <div class="details col-md-12">
            <h3 class="sizes"><?=$intro?></h3>
        </div>
        <div class="imag" style="margin-left: 30% ; margin-top : 5%"><img loading="lazy" class="wp-image-20802 aligncenter" src="<?= $thumbnail?>" sizes="(max-width: 548px) 100vw, 548px"></div>
          </div>
        </div>
	 </div>
</div>


<div class="overview">


		<section class="recruitment-detail">
              <div class="container col-11">
               <article class="recruitment-detail-article post-detail">
               	<p> <?=$overview?> </p>
					
                 </article>
                </div>
            </section>

</div>



<section class="wrap-icon-modal">
          <div class="container mt-0 mt-md-5">
            <div class="row mb-3 mb-sm-2">
              <div class="col-12">
                <?php 
                $category= "select id_category from post where id = " .$_GET['id'];
                $post = select_one($category);
                if ($post != null) {
                  $id= $post['id_category'];
                }
                $name = "select name_category from category where id = " .$id;
                $name_category = select_one($name);
                if ($name_category != null) {?>
                  
                
                <h2 class="text-center " style="color: #cd3c3f!important;">Related <?=$name_category['name_category'];?></h2> <?php }?>
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
  

  $category= "select id_category from post where id = " .$_GET['id'];
  $post = select_one($category);

  if ($post != null) {
    $id= $post['id_category'];
  }
   $sql = "select * FROM post where id_category = ".$id." and id != ".$_GET['id']." ORDER BY RAND() LIMIT 3 ";
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
                  <span class="infor_direc" ><?php echo"".$data['intro']."" ?></span>

                </div>
              </div>
            </div>
          </a>
        </div>
     <?php } ?>

      </div>
  </div>




<?php require_once('footer.php') ?>



</body>
</html>