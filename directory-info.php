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
	<title>Information-Directory-VinUni</title>
		<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/directory-info.css">
    <link rel="shortcut icon" type="image/ico" href="icon/logo.ico">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="css/directory-info.css">
</head>
<body>
	


<?php require_once('header.php') ?>

<div class="intro">
    <?php 

      $sql =  " select * from directory where id =".$_GET['id']." ";

      $directory =  select_one($sql) ;
      if($directory != null) {
        
      $name = $directory['name'];

          $a='../../';
          $b=" ".$directory["thumbnail"];
          if(strpos($b,$a)){ //  kiểm tra a có trong b không
            $directory["thumbnail"] = str_replace('../../images','images' ,$directory["thumbnail"]);
           }
          else{
               $directory["thumbnail"] = $directory["thumbnail"] ;
         
          }
          

      $thumbnail = $directory['thumbnail'];
      $intro = $directory['intro'];
      $overview = $directory['overview'];

      }  ?>

  
      <div class="container-fliud" style="padding : 7%">

        <div class="wrapper row" style="margin-top : -80px">
          <div class="preview col-md-4">
              <div class="tab-pane active" id="pic-1"><img style=" margin-top : 20px;" alt="Hình ảnh" src="<?=$thumbnail?>">

              </div>
            </div>

          <div class="details col-md-6">
            <h1 class="name"><?=$name?></h1>
            <div class="details col-md-12">
            <h3 class="sizes"><?=$intro?></h3>
        </div>
          </div>
        </div>
	 </div>
</div>


<div class="overview">


		<section class="recruitment-detail">
              <div class="container col-12">
               <article class="recruitment-detail-article post-detail">
               	<p> <?=$overview?> </p>
					
                 </article>
                </div>
            </section>

</div>
<?php require_once('footer.php') ?>



</body>
</html>