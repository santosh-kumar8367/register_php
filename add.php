<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>
<?php

$servername = 'localhost';
$username = 'root';
$password = 'test';
$dbname = 'website';


function val($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST["name"])){
$name = val($_POST["name"]);
$pass = val($_POST["password"]);
$email = val($_POST["email"]);
$phonenumber = val($_POST["phonenumber"]);
}

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Not connected ". $conn->connect_error);
}


if(isset($name) ){
    $sql = "SELECT * FROM registeredusers WHERE email='$email'";
    $res = $conn->query($sql);
    if($res->num_rows>=1){
        die("Account Already exist with email : '$email' <br> <a href='register.php'>Go to register Page</a>");
    }

    $sql = "INSERT INTO registeredusers (name,password,email,phonenumber) VALUES('$name','$pass','$email','$phonenumber')";


    if($conn->query($sql) === TRUE){
        echo 'Registertration successful<br>'; 
    }
    $sql = "SELECT * FROM registeredusers WHERE email='$email'";    


    
}
else{
    $id = val($_GET["id"]);
    $sql = "SELECT * FROM registeredusers WHERE id='$id'";
}


$res = $conn->query($sql);

if($res->num_rows==1){
    while($row = $res->fetch_assoc()){
        echo "Data you entered<br>";
        echo "Name : ". $row["name"] ."<br>Password :".$row["password"] ."<br>Email :". $row["email"] ."<br>Phone :" .$row["phonenumber"]."<br>";
        global $id;
        $id=$row["id"];
    
    }
}


if(!isset($name)){
    echo "<br>Account details updation success<br>";
}

$conn->close();
?>
<div class = "editbtn"><a  href="deluser.php?id=<?php echo $id ?>">Delete Account</a></div>
<div class = "editbtn"><a  href="update.php?id=<?php echo $id ?>">Update Details</a></div>
</html>