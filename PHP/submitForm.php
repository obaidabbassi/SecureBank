<?php
  
ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);

require("dbconfig.php");
 
$name = "";
$email = "";
$password = "";
$securePass = "";
$phone = $address = "";

if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["phone"]) && isset($_POST["address"])) {
    // Sanitizing the input fields...
    $name = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $securePass = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    isemailExist($email);
}

function isemailExist($email) {
    global $conn,$isEmailExist;
    global $conn, $name, $securePass, $phone, $address;
    // Check whether email already exists or not ...
    $emailExist = "SELECT * FROM `userrecord` WHERE `U_Email` = '$email'";
    $result = mysqli_query($conn, $emailExist);

    if (mysqli_num_rows($result) > 0) {
        $isEmailExist = true;
        session_start();
        $_SESSION["mail"] = true;
     

header("Location:signup.php");
exit();
    } else {
        // Proceed with the insertion since the email doesn't exist
        $query = "INSERT INTO `userrecord` (`U_Name`, `U_Email`, `U_Password`, `U_Phone`, `U_Address`) VALUES ('$name', '$email', '$securePass', '$phone', '$address')";

        if (mysqli_query($conn, $query)) {
            session_start();
            $_SESSION["Data"] = "Data successfully entered..";
            
            header("Location:signup.php");
            exit();

        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}




mysqli_close($conn);
?>
