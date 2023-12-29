<?php

session_start();
require("dbconfig.php");
require("template.php");

$Status = "ACTIVE";
$Account_type = "";
$Balance = 100.0;
global $email;
global $selectedAccountType;
global $Pin;
if (isset($_SESSION["user_email"])) {
    $email = ($_SESSION["user_email"]);
}

    if (isset($_POST["account_type"]) && isset($_POST["Pin"]) ){


    $selectedAccountType = $_POST["account_type"];
    $Pin = $_POST["Pin"];
}


// Do something with the selected value
$Account_type = ($selectedAccountType === "1") ? "CURRENT" : "FIXED";

function generateRandomNumber() {
    // Generate a 10-digit random number
    $min = pow(10, 9); // Minimum 10-digit number
    $max = pow(10, 10) - 1; // Maximum 10-digit number
    return rand($min, $max);
}

$Account_No = generateRandomNumber();


function create_bank_account($Account_type, $Account_No, $Status, $Balance, $Pin, $email, $conn) {
    // Sanitize inputs to prevent SQL injection
    $Account_type = mysqli_real_escape_string($conn, $Account_type);
    $Account_No = mysqli_real_escape_string($conn, $Account_No);
    $Status = mysqli_real_escape_string($conn, $Status);
    $Balance = mysqli_real_escape_string($conn, $Balance);
    $Pin = mysqli_real_escape_string($conn, $Pin);
    $email = mysqli_real_escape_string($conn, $email);


        $sql = "INSERT INTO account_details (Account_Type, Account_No, Account_Status, Account_Balance, Account_Pin, U_Email) 
             VALUES ('$Account_type', '$Account_No', '$Status', '$Balance', '$Pin', '$email')";
    
        if ($conn->query($sql) === TRUE) {
      

            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Account created successfully!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';

         
    
        
           
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }



//get user details 

$userdetails_query = "SELECT * FROM account_details WHERE U_Email = '$email'";

$result = mysqli_query($conn, $userdetails_query);

if (mysqli_num_rows($result) > 0) {

    if ($result) {
        // Process the fetched user details
        $userDetails = mysqli_fetch_assoc($result);
     // Access the specific columns
     $accountNo = $userDetails['Account_No'];
     $accountPin = $userDetails['Account_Pin'];
 
   

  echo'   
<div class="container  ">


<div class="card text-center">

<p class="text-danger">This is one time information of your account.Do not share with anyone.</p>

<h5>
 Account No:'.$accountNo.'</h5>

<h5>
 Account Pin:'.$accountPin.'</h5>

</div>

<a href="index.php">Click here to login again</a>

</div>';




 } else {
        echo "Error: " . mysqli_error($conn);
    }


}















    
}

if (isset($_SESSION["user_email"])) {

  create_bank_account($Account_type, $Account_No, $Status, $Balance, $Pin, $email, $conn);

    unset($_SESSION["user_email"]);
    

  
    }
  else{


        header("Location:default_home.php");
    exit();
  }


// Close the database connection
$conn->close();

?>
