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
        if ($research != null) {?>
             <div class="view">
        <img class="d-block w-100" src="<?=$research['thumbnail']?>">

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



        
        <div class="end">
            <div class="grid-end">
                <div class="end-item">
                    <div class="end-img">
                        <img src="https://vinuni.edu.vn/wp-content/uploads/2020/05/pexels-photo-136419-e1592720188140-660x410.jpeg" alt="">
                    </div>
                    <div class="end-content">
                        <h2>
                            College of Business & Management
                        </h2>
                        <br>
                        <p>
                            The CBM faculty at VinUniversity is committed to conducting world-class research that is both rigorous and relevant. We aim to provide answers to practical
                            real-world problems that can shape economic policy and influence the way business is done in Vietnam and around the world.
                        </p>
                        <a href="">Read morre</a>
                    </div>
                </div>
                <div class="end-item">
                    <div class="end-img">
                        <img src="https://vinuni.edu.vn/wp-content/uploads/2020/05/pexels-photo-136419-e1592720188140-660x410.jpeg" alt="">
                    </div>
                    <div class="end-content">
                        <h2>
                            College of Business & Management
                        </h2>
                        <br>
                        <p>
                            The CBM faculty at VinUniversity is committed to conducting world-class research that is both rigorous and relevant. We aim to provide answers to practical
                            real-world problems that can shape economic policy and influence the way business is done in Vietnam and around the world.
                        </p>
                        <a href="">Read morre</a>
                    </div>
                </div>

                <div class="end-item">
                    <div class="end-img">
                        <img src="https://vinuni.edu.vn/wp-content/uploads/2020/05/pexels-photo-136419-e1592720188140-660x410.jpeg" alt="">
                    </div>
                    <div class="end-content">
                        <h2>
                            College of Business & Management
                        </h2>
                        <br>
                        <p>
                            The CBM faculty at VinUniversity is committed to conducting world-class research that is both rigorous and relevant. We aim to provide answers to practical
                            real-world problems that can shape economic policy and influence the way business is done in Vietnam and around the world.
                        </p>
                        <a href="">Read morre</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php
  require_once('footer.php');
?>
</body>
</html>