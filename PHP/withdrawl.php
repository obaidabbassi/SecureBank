<?php

session_start();
require "dbconfig.php";

global $withdrawl_account_number, $withdrawl_amount, $withdrawl_pin, $conn;

if (isset($_POST["withdrawl_account_number"]) && isset($_POST["withdrawl_amount"]) && isset($_POST["withdrawl_pin"])) {
    $withdrawl_account_number = mysqli_real_escape_string($conn, $_POST["withdrawl_account_number"]);
    $withdrawl_amount = mysqli_real_escape_string($conn, $_POST["withdrawl_amount"]);
    $withdrawl_pin = mysqli_real_escape_string($conn, $_POST["withdrawl_pin"]);

    // Check if the user exists with the given account number and pin
    $check_user_query = "SELECT * FROM account_details WHERE Account_No = '$withdrawl_account_number' AND Account_Pin = '$withdrawl_pin'";
    $result = mysqli_query($conn, $check_user_query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Retrieve the existing account balance
            $row = mysqli_fetch_assoc($result);
            $existing_balance = $row['Account_Balance'];

            // Check if withdrawal amount is valid
            if ($withdrawl_amount >=500 && $withdrawl_amount % 500 == 0 && $existing_balance - $withdrawl_amount >= 0) {
                // Proceed with the withdrawal
                $update_query = "UPDATE account_details SET Account_Balance = Account_Balance - '$withdrawl_amount' WHERE Account_No = '$withdrawl_account_number'";

                if (mysqli_query($conn, $update_query)) {
                    echo "Withdrawal successful. Account balance updated.";

                    $_SESSION["Withdrawl"] = true;
                    header ("Location:index.php");
                    exit();



                } else {
                    echo "Error updating account balance: " . mysqli_error($conn);
                }
            } else {
                // Handle the case where the withdrawal amount is not valid
                echo "Invalid withdrawal amount or insufficient balance.";
                $_SESSION["No_Withdrawl"] = true;
                header ("Location:index.php");
                exit();


            }
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
