<?php 

  session_start();
  require_once('db/dbhelper.php');
  if (isset($_GET['id'])) {
      $id_category = $_GET['id'];
  }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/9a1a0cef63.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/academic.css">
</head>
<body>
    <?php 
    require_once ('header.php');

    ?>



    <?php 


        $sql = "select * from category where id = " .$id_category;
        $academic = select_one($sql);
        if ($academic != null) {?>
    <div class="view">
        <img class="d-block w-100" src="<?=$academic['thumbnail']?>">
</div>
    <div class="container">
        <div class="intro">
           
            <div class="info">
               <?=$academic['intro']?>
            </div>
        </div>
          
        <div class="news-grid1">

        <?php 
        $sql = "select * from post where id_category = " .$academic['id'] ;
        $list = select_list($sql);
        foreach($list as $data) {?>

            <div class="news-grid__col">
                <div class="news-2">
                  <div class="news-2__frame">
                    <img src="<?=$data['thumbnail']?>" alt="">
                  </div>
                  <div class="news-2__body">
                    <div class="news-2__title">
                        <h2>
                            <?=$data['name']?>
                        </h2>
                    </div>
                    <div class="news-2__content">
                       <?=$data['content']?>
                    </div>
                  </div>
                </div>
              </div>
                <?php  }   }  ?>
            
        </div>
    </div>
    <?php
  require_once('footer.php');
?>
</body>
</html>