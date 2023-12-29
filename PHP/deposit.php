<?php
session_start();
require "dbconfig.php";

global $deposit_account_number, $deposit_amount,$deposit_pin,$conn;

if(isset($_POST["deposit_account_number"]) && isset($_POST["deposit_amount"]) && isset($_POST["deposit_pin"])){

    $deposit_account_number = mysqli_real_escape_string($conn, $_POST["deposit_account_number"]);
    $deposit_amount = mysqli_real_escape_string($conn, $_POST["deposit_amount"]);
    $deposit_pin = mysqli_real_escape_string($conn, $_POST["deposit_pin"]);
// Check if the user exists with the given account number and pin


$check_user_query = "SELECT * FROM account_details WHERE Account_No = '$deposit_account_number' AND Account_Pin = '$deposit_pin'";
$result = mysqli_query($conn, $check_user_query);

if (mysqli_num_rows($result) > 0) {
    // User with the specified account number and pin exists, proceed with the update
    $update_query = "UPDATE account_details SET Account_Balance = Account_Balance + '$deposit_amount' WHERE Account_No = '$deposit_account_number'";
    
    if (mysqli_query($conn, $update_query)) {
        echo "Deposit successful. Account balance updated.";
$_SESSION["Deposited"] = true;
header ("Location:index.php");
exit();

    } else {
        echo "Error updating account balance: " . mysqli_error($conn);
    }
} else {
    $_SESSION["Not_Deposited"] = true;
header ("Location:index.php");

    echo "Invalid account number or pin. Please check your credentials.";
exit();


}





}


function deposit_money($deposit_account_number,$deposit_amount,$deposit_pin) {








}





?>