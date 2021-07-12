<?php

$servername = 'localhost';
$username = 'root';
$password = 'test';
$dbname = 'website';

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Not connected ". $conn->connect_error);
}

function val($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$id = $_POST["id"];



$name = val($_POST["name"]);
$pass = val($_POST["password"]);
$email = val($_POST["email"]);
$phonenumber = val($_POST["phonenumber"]);





$sql = "UPDATE registeredusers SET name='$name',password='$pass',email='$email',phonenumber = '$phonenumber' WHERE id='$id'";

if($conn->query($sql) === TRUE){
   
    header("location:add.php?id=$id");
}
else{
    echo $conn->error;
}


 $cconn->close(); 
?>