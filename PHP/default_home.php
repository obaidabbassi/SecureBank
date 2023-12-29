<?php

require("template.php");
require("dbconfig.php");

// if (isset($_SESSION["user_email"])) {

    
//     require ("header.php");
// }



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="mystyles.css">


</head>
<body>

<?php

require("header.php");




?>




<div class="container-fluid bg text-center d-flex justified-content-center align-items-center ">

<div class="container">
   <h1 class="text-white">Welcome to Secure Online Banking</h1> 
   <p class="text-white w-50 m-auto">Experience the convenience and efficiency of managing your 
    finances from the comfort of your home or on the go 
    with Secure Online Banking. Our secure and user-friendly platform empowers you to take control of your accounts,
     make transactions, and stay informed about your financial activities 24/7.</p>


     <a href ="login.php" type="" class="btn btn-outline-danger mt-2 w-50">Get Started</a>
</div>



</div>

<section class="services text-center">
<h1>Our Services!</h1>

<div class="container">
<div class="row row-cols-1 row-cols-md-3 g-2">
  <div class="col">
    <div class="card h-80">
      <img src="deposit.png " class="card-img-top" alt="...">
      <div class="card-body ">
        <h5 class="card-title">Deposit Money</h5>
        <p class="card-text">Grow your savings securely with Secure Bank. Easily deposit funds and watch your 
            financial goals come to life with each contribution.</p>
            <a href ="login.php" type="" class="btn btn-outline-danger mt-2 w-50">Get Started</a>


      </div>

    </div>
  </div>
  <div class="col">
    <div class="card h-80">
    <img src="withdraw.png " class="card-img-top mt-1" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title">Withdraw Money</h5>
        <p class="card-text">Access your funds with confidence at Secure Bank. Withdraw money seamlessly, ensuring your financial freedom is just a transaction away.</p>
            <a href ="login.php" type="" class="btn btn-outline-danger mt-2 w-50">Get Started</a>


      </div>



    </div>


  </div>

  <div class="col">
    <div class="card h-80">
    <img src="bank-account.png " class="card-img-top mt-1" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title">Bank Account</h5>
        <p class="card-text">
        Explore modern banking at Secure Bank—swiftly 
        create your online account for 24/7 access and secure transactions.
         Welcome to the future of convenience.</p>
            <a href ="login.php" type="" class="btn btn-outline-danger mt-2 w-50">Get Started</a>

      </div>
    </div>
  </div>

</div>

</div>




</div>




</section>





<script src="app.js"></script>
</body>
</html>
