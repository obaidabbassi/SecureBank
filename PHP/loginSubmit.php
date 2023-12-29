<?php

require("dbconfig.php");

$username = mysqli_real_escape_string($conn, $_POST["email"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);

function userLogin($username, $password) {
    global $conn;

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT U_Password FROM userrecord WHERE U_Email=?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_error($stmt)) {
            die("Error executing statement: " . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_store_result($stmt);

        // Check if a user with the given email exists
        if (mysqli_stmt_num_rows($stmt) > 0) {
            // User found based on email

            // Bind the result variables
            mysqli_stmt_bind_result($stmt, $dbU_Password);

            // Fetch the result
            mysqli_stmt_fetch($stmt);

            // Verify the password
            if (password_verify($password, $dbU_Password)) {
                
       // Start the session
       session_start();

       // You can store user information in the session if needed
       $_SESSION['user_email'] = $username;

       // Redirect or perform other actions after login
       header("Location: index.php");
       exit();

           } else {
               
                   // Start the session
       session_start();
       $_SESSION['failed'] = "failed";
       header("Location:default_home.php");
       exit();

            }
        } else {
                            // Start the session
       session_start();
       $_SESSION['failed'] = "failed";
       header("Location:index.php");
 
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Error in preparing the statement
        // Log or handle the error more gracefully
        die("Error in prepared statement: " . mysqli_error($conn));
    }
}



userLogin($username, $password);
?>
