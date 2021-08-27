<?php
 // session_start();
  require_once('db/dbhelper.php');
  //   $sql_total = "select * from carousel_multiple ";
  // $index     = select($sql_total);
  // $num_row   = mysqli_num_rows($index);
  // print($num_row);
  // exit();

?>
  <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="css/vin-leader.css">
<div class="uiniversity-leader">
    <h2 style="color: #cd3c3f">Our University Leaders</h2>
      <div id="carousel-example-3" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->
      
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
             <div class="row ">


                      <div class="col-6">
                        <div class="row">
                        <div class="col-6 block1" ><img src="images/Carous/carous1.jpg"></div>
                        <div class="col-6 block2" >
                        <div class="box-info "  style="">
                          <h2 ><a href="#" tabindex="-1">Le Mai Lan, PhD</a></h2>
                          <p >Vice Chairwoman of Vingroup JSC.<br>President of the University Council, VinUniversity<br>Distinguished Fellow, College of Business and Management</p>
                        </div></div>
                        </div>
                        <div class="row">
                        <div class="col-6 block3" >
                        <div class="box-info "  style="">
                          <h2 ><a href="#" tabindex="-1">Rohit Verma, PhD</a></h2>
                          <p >Founding Provost, VinUniversity<br>
Professor, College of Business and Management</p>
                        </div></div>
                        <div class="col-6 block4" ><img src="images/Carous/carous2.jpg"></div>
                      </div>
                    </div>
  
  
                    <div class="col-6">
                        <div class="row">
                        <div class="col-6 block5"  ><img  src="images/Carous/carous3.jpg"></div>
                        <div class="col-6 block6" >
                        <div class="box-info "  style="">
                          <h2 ><a href="#" tabindex="-1">Minh Do, ScD</a></h2>
                          <p >Vice-Provost, VinUniversity<br>
Professor, College of Engineering and Computer Science<br>Distinguished Fellow, College of Business and Management</p>
                        </div></div>
                      </div>
                      <div class="row">
                      <div class="col-6 block7" >
                      <div class="box-info "  style="">
                          <h2 ><a href="#" tabindex="-1">Maurizio Trevisan, MD</a></h2>
                          <p >Professor and Dean, College of Heath Sciences</p>
                        </div></div>
                        <div class="col-6 block8" ><img src="images/Carous/carous4.jpg"></div>
                      </div>
                    </div>
              <div class="mask rgba-black-light"></div>
            </div>
            
          </div>

<?php  
  $OFFSET = 0 ;
  $sql       = "select * from carousel_multiple order by id ASC LIMIT 4 OFFSET ".$OFFSET." ";// lấy 4 bản ghi đầu tiên offset từ 0(thứ tự 1)
  $values    = select_list($sql);
  $sql_total = "select * from carousel_multiple ";
  $index     = select($sql_total);
  $num_row   = mysqli_num_rows($index);

  foreach ($values as $value) { ?>

          <div class="carousel-item ">
            <!--Mask color-->
             <div class="row ">
                      <div class="col-6">
                        <div class="row">
                            <?php 
                          $block = "select * from carousel_multiple order by id ASC LIMIT 1 OFFSET ".$OFFSET." ";
                          $key    = select_one($block);
                          if ($key!= null) {
                            $name      = $key['name'];
                            $a='../../';
                            $b=" ".$key["thumbnail"];
                            if(strpos($b,$a)){ //  kiểm tra a có trong b không
                              $key["thumbnail"] = str_replace('../../images','images' ,$key["thumbnail"]);
                             }
                            else{
                                 $key["thumbnail"] = $key["thumbnail"] ;
                           
                            }
                            $thumbnail = $key['thumbnail'];
                            $txt       = $key['intro'];
                          }
                          
                           $OFFSET = $OFFSET + 1 ;
                          

                           ?>
          <div class="col-6 block1" ><img src="<?=$thumbnail?>"></div>
                        <div class="col-6 block2" >
                        <div class="box-info "  style="">
             <h2 ><a href="#" tabindex="-1"><?=$name?></a></h2>
                          <p ><?=$txt?></p>
                        </div></div>
                        </div>
                        <div class="row">
                        <div class="col-6 block3" >
                        <div class="box-info "  style="">
                           <?php 
                          $block = "select * from carousel_multiple order by id ASC LIMIT 1 OFFSET ".$OFFSET." ";
                          $key    = select_one($block);
                          if ($key!= null) {
                            $name      = $key['name'];
                            $a='../../';
                            $b=" ".$key["thumbnail"];
                            if(strpos($b,$a)){ //  kiểm tra a có trong b không
                              $key["thumbnail"] = str_replace('../../images','images' ,$key["thumbnail"]);
                             }
                            else{
                                 $key["thumbnail"] = $key["thumbnail"] ;
                           
                            }
                            $thumbnail = $key['thumbnail'];
                            $txt       = $key['intro'];
                          }
                           
                           $OFFSET = $OFFSET + 1 ;
                          

                           ?>
                          <h2 ><a href="#" tabindex="-1"><?=$name?></a></h2>
                          <p ><?=$txt?></p>
                        </div></div>
                        <div class="col-6 block4" ><img src="<?=$thumbnail?>"></div>
                      </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="row">
                          <?php 
                          $block = "select * from carousel_multiple order by id ASC LIMIT 1 OFFSET ".$OFFSET." ";
                          $key    = select_one($block);
                          if ($key!= null) {
                            $name      = $key['name'];
                            $a='../../';
                            $b=" ".$key["thumbnail"];
                            if(strpos($b,$a)){ //  kiểm tra a có trong b không
                              $key["thumbnail"] = str_replace('../../images','images' ,$key["thumbnail"]);
                             }
                            else{
                                 $key["thumbnail"] = $key["thumbnail"] ;
                           
                            }
                            $thumbnail = $key['thumbnail'];
                            $txt       = $key['intro'];
                          }
                           
                           $OFFSET = $OFFSET + 1 ;
                          

                           ?>
                        <div class="col-6 block5" ><img src="<?=$thumbnail?>"></div>
                        <div class="col-6 block6" >
                        <div class="box-info "  style="">
                          <h2 ><a href="#" tabindex="-1"><?=$name?></a></h2>
                          <p ><?=$txt?></p>
                        </div></div>
                      </div>
                      <div class="row">
                      <div class="col-6 block7" >
                      <div class="box-info "  style="">
                        <?php 
                         
                          $block = "select * from carousel_multiple order by id ASC LIMIT 1 OFFSET ".$OFFSET." ";
                          $key    = select_one($block);
                          if ($key!= null) {
                            $name  = $key['name'];
                            $a='../../';
                            $b=" ".$key["thumbnail"];
                            if(strpos($b,$a)){ //  kiểm tra a có trong b không
                              $key["thumbnail"] = str_replace('../../images','images' ,$key["thumbnail"]);
                             }
                            else{
                                 $key["thumbnail"] = $key["thumbnail"] ;
                           
                            }
                            $thumbnail = $key['thumbnail'];
                            $txt       = $key['intro'];
                          }
                            
                           $OFFSET = $OFFSET + 1 ;
              
                           ?>
                          <h2 ><a href="#" tabindex="-1"><?=$name?></a></h2>
                          <p ><?=$txt?></p>
                        </div></div>
                        <div class="col-6 block8" ><img src="<?=$thumbnail?>"></div>
                      </div>
                    </div>
              <div class="mask rgba-black-light"></div>
            </div>


          </div>
<?php } ?>
        
            
        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-3" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-3" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
      </div>
      <!--/.Carousel Wrapper--> 

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
