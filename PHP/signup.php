<?php
session_start();
require("template.php");
require("submitForm.php");




?>


<!--  -->


<?php
if(isset($_SESSION["mail"])) {
echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Email already exist!</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
unset($_SESSION["mail"]);

}

if(isset($_SESSION["Data"])) {

  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Account created successfully!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  unset($_SESSION["Data"]);


}

?>


<div class="container mt-5">
    <h2>Signup Here!</h2>
</div>
<div class="container signupmain border mt-2">


 <form class="row g-3" method="post" action="submitForm.php" id="FormId">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Name</label>
    <input type="text" class="form-control" id="inputEmail4" placeholder="Name" name="username" required autocomplete="off">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputPassword4" placeholder="Email" name="email" required>
    




  </div>

  <div class="col-6">
    <label for="inputAddress2" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputAddress2" placeholder="password" name="password" required>
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Phone</label>
    <input type="tel" class="form-control" id="inputAddress2" placeholder="Phone" name="phone" required>
  </div>

  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"name="address">
  </div>



  <div class="col-12 text-center">
    <button type="submit" class="btn btn-outline-success w-25">Sign up</button>
  </div>
  <p>already have account?<a href="login.php">login</a></p>
</form>   
</div>


