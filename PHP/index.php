<?php

session_start();
require("template.php");
require("dbconfig.php");

if (isset($_SESSION["user_email"])) {

    $userEmail = $_SESSION['user_email'];
    require ("user_header.php");
} else {
    // Redirect or handle accordingly if the user is not logged in

    require ("default_home.php");

    exit();
}



global $email;
global $conn;
if (isset($_SESSION["user_email"])) {
    $email = ($_SESSION["user_email"]);
}
    // Check whether email already exists or not ...
    $isAccountAlready = "SELECT * FROM `account_details` WHERE `U_Email` = '$email'";
    $result = mysqli_query($conn, $isAccountAlready);

    if (mysqli_num_rows($result) > 0) {
        // echo 'already have account';
       
        $_SESSION['old'] = true;
     
    } 


 
    if (isset($_SESSION['Deposited'])) {
       
     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Amount deposited Successfully!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';

        unset($_SESSION['Deposited']);
    }
    
    if (isset($_SESSION['Not_Deposited'])) {
    
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>invalid account number or pin!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';

    unset($_SESSION['Not_Deposited']);
    }

    
    if (isset($_SESSION['Withdrawl'])) {
       
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Amount withdrawl Successfully!</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
 
         unset($_SESSION['Withdrawl']);
     }
     
     if (isset($_SESSION['No_Withdrawl'])) {
     
       echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
       <strong>invalid amount or insufficient balance!</strong>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
 
     unset($_SESSION['No_Withdrawl']);
     }
 
     
     if (isset($_SESSION['invalid'])) {
     
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>invalid account number or pin!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';

    unset($_SESSION['invalid']);
    }











?>
<body>

<div class="container text-center mt-5">
    <h1>WELCOME TO SECURE PAGE!</h1>
</div>


<div class="container">
<div class="card">
  <div class="card-header">

  <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Deposit money</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Withdrawl money</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="balance-tab" data-bs-toggle="pill" data-bs-target="#balance-content" type="button" role="tab" aria-controls="balance-content" aria-selected="false">Available Balance</button>
  </li>

  
<?php
if (isset($_SESSION['old'])) {
    $AccountAlready = $_SESSION['old'];
    echo '';
    unset($_SESSION['old']);
}

else{

  echo '  <li class="nav-item" role="presentation">
  <button class="nav-link" id="create-account" data-bs-toggle="pill" data-bs-target="#pills-create-account" type="button" role="tab" aria-controls="pills-create-account" aria-selected="false">Create Account</button>
</li>';
}
?>


</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">

<h5 class="text-center">
" Welcome to Your Secure Banking Portal, <strong>  <?php
  if (isset($_SESSION["user_email"])) {

$name= $_SESSION["user_email"];
  echo  ''   .$name.'';
  }
  

?>"</strong>!</h5>

We're delighted to have you on board. Explore the various features and services offered through our secure platform. Here are some key actions you can take:

<li>View Balance: </li>Check your account balance to stay updated on your financial status.

<li>Deposit Money:</li> Easily add funds to your account with a few simple clicks.

<li>Withdrawal:</li> Make secure withdrawals whenever you need cash.

Feel free to navigate through the menu to access these services and more. Our user-friendly interface is designed to make your banking experience seamless and convenient.
<li>Don't have bank account:</li>
Don't worry if you don't have account.
Few easy steps you can create your account here without any fee.

If you have any questions or need assistance, our customer support team is here to help. Thank you for choosing SecureBank for your banking needs. Happy banking!"



  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">

<div class="container">

<form method="POST" action="deposit.php">
<div class="mb-3 w-50">
  <label for="formGroupExampleInput" class="form-label">Enter Account No</label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="10 digit account no e:g 5478854412" name="deposit_account_number">
</div>
<div class="mb-3 w-50">
  <label for="formGroupExampleInput2" class="form-label">Enter Your Pin</label>
  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="4 digit pin e:g 1234" name="deposit_pin">
</div>

<div class="mb-3 w-50">
  <label for="formGroupExampleInput2" class="form-label">Enter Your Amount</label>

  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter amount to deposit" name="deposit_amount">
</div>
<button type="submit" class="btn btn-outline-success w-50">Deposit</button>
</form>


</div>





  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">

<form method="post" action="withdrawl.php">

<div class="mb-3 w-50">
  <label for="formGroupExampleInput2" class="form-label">Enter Your Account No</label>

  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Your Account No" name="withdrawl_account_number">
</div>

<div class="mb-3 w-50">

  <label for="formGroupExampleInput2" class="form-label">Enter Your Amount</label>
  <small class="text-danger d-block">Amount must be the multiple of five</small>

  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter amount to withdraw" name="withdrawl_amount">
</div>

<div class="mb-3 w-50">
  <label for="formGroupExampleInput2" class="form-label">Enter Your Pin</label>

  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="4 digit account pin" name="withdrawl_pin">
</div>




<button type="submit" class="btn btn-outline-success w-50">Withdraw</button>







</form>






  </div>

<div class="tab-pane fade" id="balance-content" role="tabpanel" aria-labelledby="balance-tab">


<form action="view_balance.php"method="Post">

  <div class="mb-3 w-50">
  <label for="formGroupExampleInput" class="form-label">Enter Account No</label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="10 digit account no e:g 5478854412" name="vb_account_number">
</div>
<div class="mb-3 w-50">
  <label for="formGroupExampleInput2" class="form-label">Enter Your Pin</label>

  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="4 digit account pin" name="vb_pin">
</div>

<button type="submit" class="btn btn-outline-success w-50">Available Balance</button>


</form>















  </div>


  <div class="tab-pane fade" id="pills-create-account" role="tabpanel" aria-labelledby="pills-create-account" tabindex="0">


  <strong>Few steps to create your bank account </strong>



  <form method="post" action="create_bank_account.php">



  <select class="form-select w-50 m-auto" name="account_type" id="accountType" aria-label="Default select example" >

 
  <option selected>Select Account type</option>
  <option value="1" >Current </option></option>
  <option value="2" >Fixed</option>

</select>


<div class="mb-3 w-50 m-auto mt-2">
    <input type="Number" class="form-control" id="exampleInputPassword1" placeholder="create 4 digit pin" name="Pin" pattern="[0-9]{1,4}" maxlength="4" minlength="4" required>
  </div>






  <button type="submit" class="btn btn-primary text-center m-auto">Create Account</button>





</form>




<?php
if (isset($_SESSION['Fresh'])) {
    $isAccountAlready = $_SESSION['AccountCreated'];
    echo '<span class="text-success">Account created successfully</span>';
    unset($_SESSION['Fresh']);
} elseif (isset($_SESSION['old'])) {
    $isAccountAlready = $_SESSION['isAccountAlready'];
    echo '<span class="text-danger">You already have an account!</span>';
    unset($_SESSION['old']);
}
?>








</div>

</div>
















  </div>

</div>



</div>



<?php
if (isset($_SESSION['Available_Balance'])) {
  $Available_Balance= $_SESSION['Available_Balance'];
  // echo '<div class="container d-flex mt-5">

  // <h5>Available Balance: US$ ' . $Available_Balance . '</h5>
  
  // </div>';

  echo '<div class="alert alert-success alert-dismissible fade show w-50 m-auto mt-5" role="alert">
  <strong> <h5>Available Balance: US$ ' . $Available_Balance . '</h5></strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';




  unset($_SESSION['Available_Balance']);
}






?>




</body>


