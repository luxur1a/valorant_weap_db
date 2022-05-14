<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Tambah Weapon</title>
    </head>
    <body>
        <a href="homepage.php">Back to Home</a>
        <br/><br/>

        <form action="weap_tambah.php" method="post" name="formtambah">
           
            <td>Name Weapon</td>
            <td><input type="text" name="nama"></td>
             <br/><br/>
            <td>Price</td>
            <input type="text" name="harga">
              <br/><br/>
              <label>Subtype </label>
            <select name="subtype" id="type" required>
              <option value=null>---</option>
                <option value="1">Sidearm</option>
                <option value="2">SMGs</option>
                <option value="3">Shotguns</option>
                <option value="4">Rifles</option>
                <option value="5">Sniper</option>
                <option value="6">Heavy</option>
            </select>
            <!-- <br/><br/>
            <label>Type </label>
              <select name="type" id="type" required> 
              <option value=null>---</option>
                <option value="1">Primary</option>
                <option value="2">Secondary</option>
            </select> -->
            <br/><br/>
            <button type="submit" name="Submit" value="Add">Submit</button>
            
              <br />
              
        </form>
        
        <?php
        // Check If form submitted, insert form data into users table.
        if(isset($_POST['Submit'])) {
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $subtype = $_POST['subtype'];

            // include database connection file
            include_once("config.php");

            // Insert user data into table
            $result = mysqli_query($db, "INSERT INTO
            weapon(name, price, id_subtype) VALUES('$nama', '$harga', '$subtype')");

            // Show message when user added
            echo "Berhasil menambahkan Weapon. <a
            href='homepage.php'>Kembali ke Home</a>";
        }
        ?>

    </body>
</html>