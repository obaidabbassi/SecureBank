<?php

session_start();
require "dbconfig.php";

global $check_balance_account_number, $View_balance_pin, $conn;

if (isset($_POST["vb_account_number"])&& isset($_POST["vb_pin"])) {
    $check_balance_account_number = mysqli_real_escape_string($conn, $_POST["vb_account_number"]);

    $View_balance_pin = mysqli_real_escape_string($conn, $_POST["vb_pin"]);

    // Check if the user exists with the given account number and pin
    $check_user_query = "SELECT * FROM account_details WHERE Account_No = '$check_balance_account_number' AND Account_Pin = '$View_balance_pin'";
    $result = mysqli_query($conn, $check_user_query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Retrieve the existing account balance
            $row = mysqli_fetch_assoc($result);
            $existing_balance = $row['Account_Balance'];

            $_SESSION["Available_Balance"] = $existing_balance;
            header ("Location:index.php");
            exit();
        
        } else {
            echo "Invalid account number or pin. Please check your credentials.";
            $_SESSION["invalid"] = true;
            header ("Location:index.php");
            exit();

        }
    } else {
        // Handle the query error
        echo "Query error: " . mysqli_error($conn);
    }
} else {
    // Handle the case where one of the required POST parameters is not set
    echo "Missing required parameters.";
}
?>
