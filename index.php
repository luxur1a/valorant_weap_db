<?php include ("config.php"); 
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $pwdencrypted = sha1($password);

    $sql="select * from login where username='".$username."' AND password='".$pwdencrypted."'";

    $result = mysqli_query($db, $sql);

    $row = mysqli_fetch_array($result);

    if($row["usertype"]=="user"){
        $_SESSION["username"]=$username;
        header("location:homepage.php");
    }

    else if($row["usertype"]=="admin"){
        $_SESSION["username"]=$username;
        header("location:homepage.php");
    }

    else{
        echo "username or password incorrect!";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Valorant Weapon.db</title>
</head>
<h1>Welcome to Valorant.db </h1>
<h3>Please Login to proceed. </h3>
<label>Login</label><br>
<br>
<form action="#" method="POST">
<div>
    <label>Username :</label>
    <input type="text" name="username" required>
</div><br>
<div>
    <label>Password :</label>
    <input type="text" name="password" required>
</div><br>
<div>
    <input type="submit" value="Login">
</div>
<br>
<div>
    <button type="submit" onclick="window.location.href ='buat_akun.php'">Buat Akun Baru</button>
</div>
</form>

</html>


