<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User-Login</title>

  <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/login.css">



</head>
<body>
<?php 
  include 'lib/User.php'; 
?>
<?php
  $user = new User();
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $userLogin =$user->userLogin($_POST);     
  }
?>
	
 <div class="container"> 
   	   <div class="login-section">
   	    	
           <img src="img/CDIP-Logo-189-x-67.png">

<?php
  if (isset($userLogin)) {
    echo $userLogin;
  }
?>
           
           <!-- <h2>Login</h2> -->

           <form action="" method="POST">
           	
           	<input type="email" name="email" placeholder="Email Address" class="form-control">
           	<input type="password" name="password" placeholder="Enter Password" class="form-control">
           	<input type="submit" value="login" name="login" class="btn">

           </form>

                     <a class="Signup" href="registration.php">Sign Up Here !</a>
                     <a class="reset" href="index.php">Home</a>
        </div>
  </div>
</body>
</html>