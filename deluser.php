<?php

$servername = 'localhost';
$username = 'root';
$password = 'test';
$dbname = 'website';

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Not connected ". $conn->connect_error);
}

$id = $_GET["id"];



$sql = "DELETE  FROM registeredusers WHERE id='$id'";

if($conn->query($sql) === TRUE){
    echo "Account deleted Succesfully";
   $conn->close();
    header("location:register.php?message=delete");
}
else{
    echo "Error deleting account ". $conn->connect_error;
}


?>