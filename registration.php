<!DOCTYPE HTML>
<html>
<head>
  <title>Register Form</title>
   

    <link href="css/signUpCss.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>

<?php 
    include 'lib/User.php'; 
?>

<!-- <div class="container" id="wrap"> -->
  <div class="container" id="">    
    <div class="row" style="margin: 15px 5px 5px 5px;">

<?php
    $user = new User();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
        $usergi =$user->userRegistration($_POST);   
    }
?>

        <div class="col-md-6 col-md-offset-3">
<!-- succes messege -->
<h2><?php
    if (isset($usergi)) {
        echo $usergi;
    }
?></h2>
            <form action="" method="POST" name="registrationForm"  accept-charset="utf-8" class="form" role="form"> <legend class="text-center"><img src="img/CDIP-Logo-189-x-67.png"></legend> 
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <input type="text" name="firstname" value="" class="form-control input-lg" placeholder="First Name"  />                        </div>
                        <div class="col-xs-6 col-md-6">
                            <input type="text" name="lastname" value="" class="form-control input-lg" placeholder="Last Name"  />                        </div>
                    </div>

                    <input type="Number" name="phone" value="" class="form-control input-lg" placeholder="Phone Number"  />

                    <input type="text" name="skill" value="" class="form-control input-lg" placeholder="Language Skills"  />
                    
                    <input type="text" name="email" value="" class="form-control input-lg" placeholder="Your Email"  /><input type="password" name="password" value="" class="form-control input-lg" placeholder="Password"  /><input type="password" name="confirm_password" value="" class="form-control input-lg" placeholder="Confirm Password"  /> 
                    
                     <label>Gender : </label>                    <label class="radio-inline">
                        <input type="radio" name="gender" value="Male" checked="" id=male />                        Male 
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="Female" id=female />                        Female
                    </label>
                    <br />
              <span class="help-block">By clicking Create my account, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.</span>
                    <button class="btn btn-lg btn-primary btn-block signup-btn" name='register' type="submit">
                        Create my account</button>
            </form> 
            <div class="text-center">Already have an account?

             <a href="login.php">Sign in</a>

            </div>
           
        </div>
      </div>
    </div>

  
 </form>
</body>
</html>