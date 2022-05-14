<?php include_once ("config.php"); 
session_start();
$username = $_SESSION["username"];
// Fetch data
$query = mysqli_query($db, "SELECT A.name, A.price, B.name_subtype, C.name_type
FROM weapon A INNER JOIN subtype B INNER JOIN type C ON A.id_subtype = B.id_subtype AND B.id_type = C.id_type 
WHERE is_delete=1 ORDER BY A.name ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recycle Bin | Valorant DB</title>
</head>

<body>
    <header>
        <h2>Recycle Bin</h2>
    </header>

    <body>

    <p>Deleted Weapon Table</p>  

    <table width = '60%' border = "1">
    <thead>
        <tr>
            <th>Nama</th>
            <th style="width:10%">Harga</th>
            <th>Subtype</th>
            <th>Type</th>
            <th style="width:20%">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($item = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$item['name']."</td>";
            echo "<td>".$item['price']."</td>";
            echo "<td>".$item['name_subtype']."</td>";
            echo "<td>".$item['name_type']."</td>";

            if ( $username == "admin" ) {

            echo "<td>";
            echo "<a href='weap_restore.php?id=".$item['name']."'>Restore</a><br>";
            echo "<a href='weap_destroy.php?id=".$item['name']."'>Hapus Permanen</a>";
           
            echo "</td>";
            }
            echo "</tr>";
        }
        ?>
    </tbody>
    </table>
    <br><br>


    <a href="homepage.php">Go to Home</a>
    </body>
</html>