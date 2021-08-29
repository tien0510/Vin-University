<?php 

  session_start();
  require_once('db/dbhelper.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/research.css">
</head>
<body>
      <?php 
    require_once ('header.php');

    ?>

      <?php 


        $sql = "select * from category where name_category = 'research' ";
        $research = select_one($sql);
        if ($research != null) {
            $a='../../';
          $b=" ".$research["thumbnail"];
          if(strpos($b,$a)){ //  kiểm tra a có trong b không
            $research["thumbnail"] = str_replace('../../images','images' ,$research["thumbnail"]);
           }
          else{
               $research["thumbnail"] = $research["thumbnail"] ;
         
          }
          
          $thumbnail   = $research['thumbnail']; 
            ?>
             <div class="view">
        <img class="d-block w-100" src="<?=$thumbnail?>">

        </div>

    <div class="container1">
        <div class="title">
            <?=$research['intro']?>
        </div>
        <br>
        <?php 
         $sql = "select * from post where id_category = " .$research['id'] ;
        $list = select_list($sql);
        foreach($list as $data) {?>
        <div class="content">
            <div class="grid-container">
                <div class="grid-item">
                    <div class="grid-img">
                        <img src="<?=$data['thumbnail']?>" alt="">
                    </div>
                    <div class="grid-content">
                        <h2>
                           <?=$data['name']?>
                        </h2>
                       <?=$data['content']?>
                    </div>
                </div>
            </div>
        </div>
      <?php  }   }  ?>
        <br><br>

    </div>
        <?php
  require_once('footer.php');
?>
</body>
</html>