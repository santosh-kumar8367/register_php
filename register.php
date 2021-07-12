<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <?php
        if(isset($_GET["message"])){
            if($_GET["message"] == 'delete')
                echo "<div class='delmsg'><p>Accout successfully deleted</p></div><br>";
            
        }
    ?>
    <form action="add.php" method="POST">
        <table>
            <tr>
                <td>Name : </td>
                <td>
                    <input class="allin" type="text" name="name" required>
                </td>
            </tr>
            <tr>
                <td>Password: </td>
                <td>
                    <input class="allin" type="password" name="password" required>
                </td>
            </tr>
            <tr>
                <td>Phone Number : </td>
                <td>
                    <input class="allin" type="tel" name="phonenumber" required validate>
                </td>
            </tr>
            <tr>
                <td>Email : </td>
                <td>
                    <input class="allin" type="email" name="email" required>
                </td>
            </tr>
         
        </table>
        <button class="btn" type="submit">Register</button>
    </form>
</body>
</html>