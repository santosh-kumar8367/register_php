<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
        <?php 
            $id = $_GET["id"]; 
            $servername = 'localhost';
            $username = 'root';
            $password = 'test';
            $dbname = 'website';

            $conn = new mysqli($servername,$username,$password,$dbname);

            if($conn->connect_error){
                die("Not connected ". $conn->connect_error);
            }

            $sql = "SELECT * FROM registeredusers WHERE id='$id'";


            
            $res = $conn->query($sql);

            if($res->num_rows>0){
                while($row = $res->fetch_assoc()){
                    $name = $row["name"];
                    $pass = $row["password"];
                    $email = $row["email"];
                    $phonenumber = $row["phonenumber"];
                }
            }



        ?>
        <div class='delmsg'><p>Update Details</p></div><br>
    <form action="updateuser.php" method="POST">
        <table>
        
            <tr>
                <td>Name : </td>
                <td>
                    <input class="allin" type="text" name="name" value="<?php echo $name?>">
                </td>
            </tr>
            <tr>
                <td>Password: </td>
                <td>
                    <input class="allin" type="password" name="password" value="<?php echo $pass?>">
                </td>
            </tr>
            <tr>
                <td>Phone Number : </td>
                <td>
                    <input class="allin" type="tel" name="phonenumber" value="<?php echo $phonenumber?>">
                </td>
            </tr>
            <tr>
                <td>Email : </td>
                <td>
                    <input class="allin" type="email" name="email" value="<?php echo $email?>">
                </td>
            </tr>
            <tr>
            <td colspan="2"><button class="btn" type="submit">Update</button></td>

            </tr>
        </table>
        
        <input type="hidden" name="id" value="<?php echo $id ?>">
    </form>
</body>
</html>

<?php  $conn->close(); ?>