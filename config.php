<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "valorant_db";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( $db===false ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}


?>