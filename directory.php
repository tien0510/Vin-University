<?php 

  session_start();
  require_once('db/dbhelper.php');
  $wh = ""; 
 ?>

<!DOCTYPE html>
<html lang="en" style="overflow-x: hidden;">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Directory-VinUni</title>
  <link rel="shortcut icon" type="image/ico" href="icon/logo.ico">
		<link rel="stylesheet" type="text/css" href="css/directory.css">
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>

<?php 
	
	require_once('header.php')

 ?>

<div class="view" style=" animation :  trenxuong 1s ease-out;">
		<img class="d-block w-100" src="images/directory.jpg">

</div>
    
<section class="wrap-icon-modal">
          <div class="container mt-0 mt-md-5">
            <div class="row mb-3 mb-sm-2">
              <div class="col-12">
                <h2 class="h3 text-secondary text-capitalize font-weight-bold mb-4">Directory</h2>
                <div class="mb-4"></div>
              </div>
            </div>
          </div>
</section>

<section class="search-wrap pb-5">
          <div class="container pb-5">
           <form class="form-inline" action="" method="get">
              <div class="input-group w-100">
         <?php 
        if (isset($_GET['searchText'])) {
           $searchText= $_GET['searchText'];
           $wh = " where name like '%".$searchText."%'  and trangthai = 0 ";
         }
           else{
             $searchText="";
             $wh = " where name like '%".$searchText."%' and trangthai = 0 ";

           }
            ?>

              <input class='form-control border-primary'  type='text' name='searchText' value='<?=$searchText?>' placeholder='Enter a Name, Academic Program, or College to search for students, staff, faculty, and others affiliated with VinUni'>

           
                <div  class="search" >
                  <button  type="submit"><img  src="images/search.png"></button>
                </div>
              </div>
            </form>
          </div>
</section>

<?php 

  $numberpage = !empty($_GET['per_page'])?$_GET['per_page'] : 9 ;// số lượng trên 1 trang
  $page =  !empty($_GET['page'])?$_GET['page']:1 ;      // trang hiện tại 
  $OFFSET = ($page - 1)*$numberpage; // lấy offset từ trang tương ứng

  $sql= "select * from directory ".$wh." order by id ASC LIMIT " .$numberpage." OFFSET ".$OFFSET."";
  $sql_total      = "select * from directory ".$wh."  ";
  // print($sql);
  // print($sql_total);
  // exit();

   $total_s       = execute($sql_total);
   $total_s       = mysqli_num_rows($total_s);
   $total_page    = ceil($total_s/$numberpage);
   // print($total_page);

  $datas = executeResult($sql);


 ?>

	<div class="container-fluid" style="padding-left:7%" >
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
          <a href="directory-info.php?id=<?=$data['id']?>&per_page=<?=$numberpage ?>&page=<?=$page ?>" style="width: 100%;" >
            <div class="item" style="width: 100%">
              <div class="xemthem" >
                <span >Xem Thêm</span>
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

  <?php 

      require_once('pagination.php');

   ?>

<?php 	
	
	require_once('footer.php');
	
 ?>

</body>
</html>

