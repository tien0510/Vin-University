<?php 
session_start();

?>
 <!DOCTYPE html>
<html>
<head>
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="shortcut icon" type="image/ico" href="../icon/logo.ico">
          <link rel="stylesheet" type="text/css" href="style1.css">

</head>

<body style="background: url('../images/1.PNG') ; overflow-y: hidden;">

  <form class="modal-content animate" action="login_submit.php" method="post" >
    <div class="imgcontainer">

      <img src="../images/login.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="user_name"><b>User name</b></label>
      
      <input type="text" placeholder="Enter Username" name="user_name" required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit" name="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <a href="../index.php" style="text-decoration: none ; color: black;" title="">
      <span  class="cancelbtn">Cancel</span> </a>

      <span class="psw">Do not have an account? <a class="regist"  href="../register/register.php"> Register now </a></span>
    </div>
  </form>
</div>


</body>
</html>


