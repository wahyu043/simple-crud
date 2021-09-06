<?php
    $host= "localhost";
    $user= "root";
    $pass= "";
    $db= "dbbagoosmedia";
    $conn= mysqli_connect($host,$user,$pass,$db);

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal" . mysqli_connect_error();
}
?>