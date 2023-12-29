
<?php

$_server="localhost";
$username= "root";
$password="";
$db="loginsystem";


$conn =mysqli_connect($_server,$username,$password,$db);


if($conn){


    echo "";
}
else{
    die("Connection failed: " . mysqli_connect_error());
 

}

// $name=$_POST["username"];
// $mail=$_POST["email"];
// $password=$_POST["password"];


?>
