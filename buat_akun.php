<?php include_once ("config.php"); 
// Fetch data

$query = mysqli_query($db, "SELECT * FROM login");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Valorant Weapon.db</title>
</head>
<h3>Buat akun baru. </h3>
<form action="buat_akun.php" method="post" name="buatakun">
<td>Username</td>
    <input type="text" name="username" required>
    <br/><br/>
    <td>Password</td>
    <input type="text" name="password" required>
<br/><br/>
<button type="submit" name="Submit" value="Add">Submit</button>

</form>


<?php
        // Check If form submitted, insert form data into users table.
        if(isset($_POST['Submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $pwdencrypted = sha1($password);

            // include database connection file
            include_once("config.php");

            // Insert user data into table
            $result = mysqli_query($db, "INSERT INTO
            login(username, password) VALUES('$username', '$pwdencrypted')");

            // Show message when user added
            echo "Berhasil menambahkan Akun. <a
            href='homepage.php'>Kembali ke Home</a>";
            header("Location: index.php");
        }
        ?>

</html>