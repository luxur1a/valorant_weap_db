<?php

// Getting id from url
$name = $_GET['id'];

// include database connection file
include_once("config.php");
// Check if form is submitted for data update, then redirect to homepage after update
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    // update data
    $result = mysqli_query($db, "UPDATE weapon SET
    name = '$nama', price='$harga' WHERE id_weap = $id");
    header("Location: ./homepage.php");
}
?>

<?php

// Fetch data based on id
$result = mysqli_query($db, "SELECT * FROM weapon WHERE
name='$name'");

while($item = mysqli_fetch_array($result))
    {
    $id = $item['id_weap'];
    $nama = $item['name'];
    $harga = $item['price'];
}

?>

<html>
<head>
    <title>Edit Weapon</title>
</head>
<body>
    <a href="./homepage.php">Home</a>
    <br/><br/>
    <h2>Valorant Weapon Database</h2>
    <h3>Edit Senjata</h3>
        <form name="update_weap" method="post" action="./weap_edit.php?id=<?php echo $nama;?>">
        <table border="0">
            <tr>
                <td>Senjata</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" value=<?php echo $harga;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $id ?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>

