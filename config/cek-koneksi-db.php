<?php
$host = "localhost";
$user = "root";
$pass = "root";
$db = "dbbagoosmedia";

// Create connection
$conn= mysqli_connect($host,$user,$pass,$db);

// Check connection
if (!$conn) {
    die("Koneksi Gagal!: " . mysqli_connect_error());
} else {
    echo "Koneksi Sukses!";
}
?>

