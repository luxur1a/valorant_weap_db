<?php include_once ("config.php"); 
session_start();
if(empty($_SESSION['username']) || $_SESSION['username'] == ''){
    header("Location: ./index.php");
    die();
}

// Fetch data
$username = $_SESSION["username"];
$filter = (isset($_GET['filter'])) ? $_GET['filter'] : 'A.name';
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'ASC';

$query = mysqli_query($db, "SELECT A.name, A.price, B.name_subtype, C.name_type
 FROM weapon A INNER JOIN subtype B INNER JOIN type C ON A.id_subtype = B.id_subtype AND B.id_type = C.id_type 
 WHERE is_delete=0 ORDER BY $filter $sort");
$query_sub = mysqli_query($db, "SELECT * FROM subtype ORDER BY id_subtype ASC");
$query_type = mysqli_query($db, "SELECT * FROM type ORDER BY id_type ASC");

$favcolor = "red";

switch ($filter) {
    case "A.name":
        $filtertxt = "Name";
        break;
    case "A.price":
        $filtertxt = "Price";
        break;
    case "B.name_subtype":
        $filtertxt = "Subtype";
        break;
    case "C.name_type":
        $filtertxt = "Type";
        break;
    default:
        echo "Error!";
}

switch ($sort) {
    case "ASC":
        $sorttxt = "Ascending";
        break;
    case "DESC":
        $sorttxt = "Descending";
        break;
    default:
        echo "Error!";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Valorant Weapon.db</title>
</head>


<body>
    <header>
        <h2>Valorant Weapon.Db</h2>

    </header>

    <body>
    <h3>Selamat datang, <?php echo $username  ?></h3>
    <form method="GET">
    <p>Search :</p> 
    <input type="text" name="search"> 
    <p>Sort by :</p> 
    <select name="filter" id="filter">
        <option value="A.name">Name</option>
        <option value="A.price">Price</option>
        <option value="B.name_subtype">Subtype</option>
        <option value="C.name_type">Type</option>
    </select>
    <select name="sort" id="sort" >
        <option value="ASC">Ascending</option>
        <option value="DESC">Descending</option>
    </select>
    <button type="submit" name="Submit" value="Add">Submit</button>
    </form>
    
    <p>Weapon Table</p> 
    <p>Sorted by : <?php echo $filtertxt?> <?php echo $sorttxt?></p>

    <?php 
    $search = (isset($_GET['search'])) ? $_GET['search'] : '';
    
    if ( $username == "admin" ) {
        echo "<a href='weap_tambah.php'>[+] Tambah Baru</a>";
    }
    ?>
    <?php
    
        if($search != ''){
            $query = mysqli_query($db, "SELECT A.name, A.price, B.name_subtype, C.name_type FROM weapon A 
            INNER JOIN subtype B INNER JOIN type C ON A.id_subtype = B.id_subtype AND B.id_type = C.id_type 
            WHERE is_delete=0 AND A.name LIKE '%$search%' ORDER BY $filter $sort;");
        }
        else{
            $query = mysqli_query($db, "SELECT A.name, A.price, B.name_subtype, C.name_type
            FROM weapon A INNER JOIN subtype B INNER JOIN type C ON A.id_subtype = B.id_subtype AND B.id_type = C.id_type 
            WHERE is_delete=0 ORDER BY $filter $sort;");
        };
    ?>
    
    <table width = '60%' border = "1">
    <thead>
        <tr>
            <th>Name</th>
            <th style="width:10%">Price</th>
            <th>Subtype</th>
            <th>Type</th>
            <?php 
    if ( $username == "admin" ) {
        echo "<th style='width:15%'>Action</th>";
    }
    ?>
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
            echo "<a href='weap_edit.php?id=".$item['name']."'>Edit</a> | ";
            echo "<a href='weap_hapus.php?id=".$item['name']."'>Hapus</a>";
            echo "</td>";
            }
            echo "</tr>";
        }
        ?>
    </tbody>
    </table>

    

    <br/>
    <br/>

    <p>Subtype List</p>
    <table width = '10%' border = "1">
    <thead>
        <tr>
            <th style="width:20%">ID</th>
            <th>Subtype</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($item = mysqli_fetch_array($query_sub)){
            echo "<tr>";
            echo "<td>".$item['id_subtype']."</td>";
            echo "<td>".$item['name_subtype']."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
    </table>

    <br/>
    <br/>

    <p>Type List</p>
    <table width = '10%' border = "1">
    <thead>
        <tr>
            <th style="width:20%">ID</th>
            <th>Type</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($item = mysqli_fetch_array($query_type)){
            echo "<tr>";
            echo "<td>".$item['id_type']."</td>";
            echo "<td>".$item['name_type']."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
    </table>

    <br>
    <br>
    <?php 
    if ( $username == "admin" ) {
        echo "<a href='recycle_bin.php'>Buka Recycle Bin</a>";
    }
    ?>
    <br>
    <a href="./logout.php" class="btn">Logout</a>

    </body>
</html>
