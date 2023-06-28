<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "OES";

$conn = new mysqli($servername, $username, $password, $dbname); //Creating connection 

if($conn -> connect_error){ //Checking whether the database is connected successfully
    die("Connection error : " .$conn -> connect_error);
}


?>