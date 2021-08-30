<?php
// require_once ('db/dbhelper.php');
// session_start();
if (isset($_SESSION['username'])) {
	 $check = "select type from user where user_name = '".$_SESSION['username']."'" ;

 	$check = select_one($check);
 	if ($check != null) {
 		$status = $check['type'];
 	}
}

    
?>
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<header>
	<div class="head">
		<div class="head_top" id="head_top" >
			<div class="head_top_left">
				<ul>
					<li>
						<a href="#">VISIT</a>
					</li>
					<li>
						<a href="directory.php">DIRECTORY</a>
					</li>
					<li style="border: 0px;"> 
						<a  href="contact.php">CONTACT</a>
					</li>
				</ul>
			</div>
			<div class="head_top_right">
				<div class="head_top_right_search">
				  <form id="search" method="GET" action="directory.php">
					<input  type="text" name="searchText">
					<button type="submit" >
					<span class="search-button">
						<img src="https://vinuni.edu.vn/wp-content/themes/vinuni/assets/images/search.png" alt="icon search">
					</span>
					</button>
				 </form>
				</div>
			</div>
		</div>
		<div class="head_bottom"id="head_bottom">
			<div class="head_bottom_left">
				<a class="logo" href="index.php">
					<img src="https://vinuni.edu.vn/wp-content/themes/vinuni/assets/images/logo/logo.svg" alt="Logo VinUni" ></a>
			</div>


			<div class="head_bottom_right">
				<ul class="parent">
					<li class="boder">
						<a href="new_event.php">About VinUniversity</a>
						<div class="head_bottom_right_contenhover">
							<ul>
								<li>
									<a href="#">About The Founding Donor – Vingroup JSC</a>
								</li>
								<li>
									<a href="#">About VinUniversity</a>
								</li>
								<li>
									<a href="#">Governance</a>
								</li>
								<li>
									<a href="#">Strategic Collaborators and Partners</a>
								</li>
								<li>
									<a href="new_event.php">News & Events</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="boder">
						 <?php 


        $sql = "select * from category where name_category = 'academic' ";
        $academic = select_one($sql);
        if ($academic != null) {?>
						<a href="category.php?id=<?=$academic['id']?>">Academics</a>
					<?php }?>
						<div class="head_bottom_right_contenhover">
							<ul>
								<li>
									<a href="#">Academics</a>
								</li>
								<li>
									<a href="#">College of Business & Management</a>
								</li>
								<li>
									<a href="#">College of Engineering & Computer Science</a>
								</li>
								<li>
									<a href="#">College of Health Sciences</a>
								</li>
								<li>
									<a href="#">Faculty of Arts and Sciences</a>
								</li>
								<li>
									<a href="#">Registrar</a>
								</li>
								<li>
									<a href="#">Library</a>
								</li>
								<li>
									<a href="#">Canvas@VinUniversity</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="boder">
						<a href="research.php">Research</a>
						<div class="head_bottom_right_contenhover">
							<ul>
								<li>
									<a href="#">VinUniversity Distinguished Lecture Series</a>
								</li>
								<li>
									<a href="#">Research Seminars</a>
								</li>
								<li>
									<a href="#">Undergraduate Research</a>
								</li>
								<li>
									<a href="#">Seed Funding Program</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="boder">
						<?php 


        $sql = "select * from category where name_category = 'admission' ";
        $admission = select_one($sql);
        if ($admission != null) {?>
						<a href="category.php?id=<?=$admission['id']?>">Admissions & Aid</a>
					<?php }?>
						<div class="head_bottom_right_contenhover">
							<ul>
								<li>
									<a href="#">Undergraduate</a>
								</li>
								<li>
									<a href="#">Postgraduate</a>
								</li>
								<li>
									<a href="#">Overseas Master/PhD Scholarships</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="boder">
						<a href="#">Student Life</a>
						<div class="head_bottom_right_contenhover">
							<ul>
								<li>
									<a href="#">Our Campus</a>
								</li>
								<li>
									<a href="#">Life at VinUni</a>
								</li>
								<li>
									<a href="#">First Year Experience</a>
								</li>
								<li>
									<a href="#">Career Services</a>
								</li>
								<li>
									<a href="#">Library</a>
								</li>
								
							</ul>
						</div>
					</li>
					<li class="boder">
				<?php 
					if (!isset($_SESSION['username'])) { ?>			
					<a href="Login/login.php">Working@VinUn</a>
						<div class="head_bottom_right_contenhover">
							<ul>
								<li>
									<a href="Login/login.php">Login</a>
								</li>
								<li>
									<a href="register/register.php">Register</a>
								</li>
							</ul>
						</div>
				
				<?php } else{ ?>

					<?php if ($status == 1){?>
						<a href="#">Hello <?=$_SESSION['username']?></a>
					<?php }else{?>
						<a href="">Hello <?=$_SESSION['username']?></a>

				<?php	}  ?>
					
						<div class="head_bottom_right_contenhover">
							<ul>
								<li>
									<a href="logout.php">Logout</a>
								</li>

								<?php if ($status == 1) {?>
								<li>
									<a href="admin/Account/index.php">Management page</a>
								</li>
								<?php } ?>
								

							</ul>
						</div>

						<?php  } ?>
						
					</li>
				</ul>
			</div>
		</div>
	</div>
	</header>
	

  <script type="text/javascript">
    window.onscroll = function ()
    {
      if (document.documentElement.scrollTop >10)
      {
        document.getElementById("head_top").style.display = "none";
        document.getElementById("head_bottom").style["boxShadow"] = " 0px 12px 9px -8px black";    
      } 
      else
      {
        document.getElementById("head_top").style.display = "block";
        document.getElementById("head_bottom").style["boxShadow"] = "none";
      }
    };
  </script> 
