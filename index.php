<?php
	session_start();
	require_once('db/dbhelper.php');

?>
<!DOCTYPE html>
<html lang="en" style=" overflow-x: hidden !important;">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home-VinUni</title>
	<link rel="shortcut icon" type="image/ico" href="icon/logo.ico">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


</head>
<body>
<?php 
    require_once ('header.php');

?>

<div class="clearfix"></div>


<div class="main">

				<!--Carousel Wrapper-->
			<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
			  <!--Indicators-->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-2" data-slide-to="1"></li>
			    <li data-target="#carousel-example-2" data-slide-to="2"></li>
			    <li data-target="#carousel-example-2" data-slide-to="3"></li>
			    <li data-target="#carousel-example-2" data-slide-to="4"></li>
			  </ol>
			  <!--/.Indicators-->
			  <!--Slides-->
			  <div class="carousel-inner" role="listbox">
			    <div class="carousel-item active">
			      <div class="view">
			        <img class="d-block w-100" src="images/1.PNG"
			          alt="First slide">
			        <div class="mask rgba-black-light"></div>
			      </div>
			      
			    </div>
			    <div class="carousel-item">
			      <!--Mask color-->
			      <div class="view">
			        <img class="d-block w-100" src="images/2.PNG"
			          alt="Second slide">
			        <div class="mask rgba-black-strong"></div>
			      </div>
			      
			    </div>

			     <div class="carousel-item">
			      <!--Mask color-->
			      <div class="view">
			        <img class="d-block w-100" src="images/3.PNG"
			          alt="Third slide">
			        <div class="mask rgba-black-strong"></div>
			      </div>
			      
			    </div>
			     <div class="carousel-item">
			      <!--Mask color-->
			      <div class="view">
			        <img class="d-block w-100" src="images/4.PNG"
			          alt="Fourth slide">
			        <div class="mask rgba-black-strong"></div>
			      </div>
			      
			    </div>

			    <div class="carousel-item">
			      <!--Mask color-->
			      <div class="view">
			        <img class="d-block w-100" src="images/5.PNG"
			          alt="Fifth slide">
			        <div class="mask rgba-black-slight"></div>
			      </div>
			      
			    </div>
			  </div>
			  <!--/.Slides-->
			  <!--Controls-->
			  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			  <!--/.Controls-->
			</div>
			<!--/.Carousel Wrapper-->
				
</div>
<?php
  require_once('main.php');
?>


<?php

  require_once('vin-leader.php');

?>



<?php

  require_once('strategic.php');
?>


<?php
  require_once('footer.php');
?>
	

</body>

	



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</html>