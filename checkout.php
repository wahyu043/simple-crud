<?php
    include("koneksi.php");
    session_start();
    $nota= $_GET['nota'];
    $jumlah= $_GET['jml'];
    $total= $_GET['tot'];
    $checkout= "UPDATE jual SET jumlah='$jumlah', total='$total' WHERE nota='$nota'";
    $datacheckout= mysqli_query($koneksi, $checkout);

    // menghapus session
    unset($_SESSION['nota']);
?>