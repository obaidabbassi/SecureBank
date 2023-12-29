<?php


require("template.php");





?>

<nav class="navbar navbar-expand-lg bg-body-tertiary ">
  <div class="container-fluid w-75 m-auto">
    <a class="navbar-brand" href="#">Secure Bank</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About us</a>
        </li>
  
 
  

        <!-- <?php


if (isset($_SESSION["user_email"])) {

  $name= $_SESSION["user_email"];
    echo  ''.$name.'';
    }
    

?> -->


      

      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>


  
      </form>


<div class="ms-2">








<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">

<img src="user.png" style="width:50px;height:50px;">

</button>
<!-- <button type="button" class="btn btn-primary position-relative">
Notifications
  <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
    <span class="visually-hidden">New alerts</span>
  </span>
</button> -->
<!-- Modal -->
<img src="bell.png" style="width:20px;height:20px;">

<div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
<strong>
  <?php
  if (isset($_SESSION["user_email"])) {

$name= $_SESSION["user_email"];
  echo  ''   .$name.'';
  }
  

?>
</strong>
      </div>
      <div class="modal-footer">
     
        <a href ="logout.php"  class="btn btn-danger w-100">Logout</a>
      </div>
    </div>
  </div>
</div>








</div>

    </div>





  </div>
 

</nav>