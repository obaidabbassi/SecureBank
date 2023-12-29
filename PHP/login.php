<?php

session_start();


if (isset($_SESSION["failed"])) {

  echo '<div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
  <strong>username or password is incorrect</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div> ';


}

unset($_SESSION["failed"]);

























?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Starter Template</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
  <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<div class="container  mb-5">
  





  <div class="container outer mt-5 ">


  <div class="container inner mt-5">


 <div class="login">

<h1 class="my-3">Login</h1>


<form method="post" action="loginSubmit.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name ="email" required  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name ="password" required class="form-control" id="exampleInputPassword1">
  </div>


  <div class="d-grid">

  <button type="submit" name="submit" class="btn btn-success btn-lg">Submit</button>
  <p class="my-1">Don't have account?<a href="signup.php">Signup</a></p>
</div>

</form>




 </div>





 <div class="img">
<img src="startupcanada_.png" alt="" class="img-fluid" width="">
    </div>
</div>
  </div>










  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>




</body>
</html> 



