<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment</title>
  <link rel="stylesheet" type="text/css" href="css/payment.css">
</head>

<body class="settings">
<?php 
    $filepath=realpath(dirname(__FILE__));
    include_once $filepath.'/lib/Session.php';
    Session::init();
    include 'lib/User.php';
?>

<?php
  if (isset($_GET['course_id'])) {
    $purchase_course=(int)$_GET['course_id'];
  }
?>

<?php
    $user = new User();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['payment'])) {
        $userpay =$user->userPayment($_POST);   
    }
?>

  <div>
    <div class="max-width">
      <section class="payment turquoise">
        <div class="grid-full padded-reverse">
          <div class="grid-whole padded">
            <img src="img/CDIP-Logo-189-x-67.png">
            <h3>Payment Details</h3>
            <h1><?php
    if (isset($userpay)) {
        echo $userpay;
       }
?></h1>
            <hr>
          </div>
          <div class="grid-5 padded m-grid-whole s-grid-whole xs-grid-whole">
            <div class="grid-whole">
              <div class="dark-content-box payment-info">
                <h5>Card on file</h5>
                <hr>
                <div class="grid-3 s-grid-12 padded">
                  <p class="center">
                    <span class="icon-wallet icon-huge">
                    <img src="http://www.thisisstar.com/images/100UI/002/wallet.svg">
                    </span>
                  </p>
                </div>
                <div class="grid-9 s-grid-12 padded">
                  <p>
                    You don't currently have a card on file. Add one here.
                  </p>
                </div>
                <div class="clear"></div>
                <div class="cards">
                  <h6 class="upper-bryant micro">accepted payment types</h6>
                  <p>
                    <span class="pf pf-visa"></span> <span class="pf pf-mastercard"></span> <span class="pf pf-american-express"></span> <span class="pf pf-jcb"></span> <span class="pf pf-discover"></span> <span class="pf pf-diners"></span>
                  </p>
                  <div class="clear"></div>
                </div>
              </div>
            </div>
          </div>

          <!-- Success messege -->
  
 

          <div class="grid-7 padded m-grid-whole s-grid-whole xs-grid-whole">
            <form id="payment-form" action="" method="POST" accept-charset="UTF-8" method="post">
              <input name="utf8" type="hidden" value="✓">
              <div class="grid-whole">
                <label for="card-number">
                  <span class="upper-bryant small-bold">Card Number</span>
                </label>
                <input type="number" class="space" size="20" name="card_number" id="card_number">
              </div>
              <div class="grid-whole padded-reverse">
                <div class="grid-5 padded">
                  <div class="grid-5">
                    <label for="course_id">
                      <span class="upper-bryant small-bold">Course Id</span>
                      <input type="number" class="space" size="4" name="course_id" id="course_id" value="<?php echo $purchase_course ?>" >
                    </label>
                  </div>
                </div>
                <div class="grid-5 padded">
                  <div class="grid-5">
                    <label for="user_id">
                      <span class="upper-bryant small-bold">User Id</span>
                      <input type="number" class="space" size="4" name="user_id" id="user_id" value="<?php $id= Session::get("id");echo $id; ?>" >
                    </label>
                  </div>
                </div>
                <div class="grid-5 padded">
                  <div class="grid-5">
                    <label for="amount">
                      <span class="upper-bryant small-bold">Payment Amount</span>
                      <input type="number" class="space" size="4" name="amount" id="amount">
                    </label>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn" id="payment" name="payment">Submit Payment</button>
            </form>
          </div>
          <div class="clear"></div>
        </div>
      </section>
    </div>
  </div>
</body>
</html>



