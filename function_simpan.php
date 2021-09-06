<?php
    session_start();
    include ("conn.php");
    
    $id= $_GET['id'];
    $kode_masuk= $_GET['kode_masuk'];
    $cekjumlah= "SELECT * FROM barang_masuk WHERE kode_masuk='$kode_masuk'";
    $datacekjumlah= mysqli_query($conn,$cekjumlah);
    if (mysqli_num_rows($datacekjumlah)>0) {
        $hasilcek= mysqli_fetch_array($datacekjumlah);
        $stok= $hasilcek['stok']+['jumlah'];
        $updatestok= "UPDATE data_barang SET stok= '$stok' WHERE kode_barang='$kode_barang'";
        $dataupdate= mysqli_query($conn,$updatestok);
        // update keranjang
        // $cekkeranjang= "SELECT * FROM detail_beli WHERE id_detail='$id'";
        // $datacekkeranjang= mysqli_query($koneksi,$cekkeranjang);
        header("barang_masuk.php");
    }
    else {
        echo "Barang Berhasil Diperbaharui";
    }

    unset($_SESSION['kode_masuk']);
// if (mysqli_num_rows($datacekkeranjang) > 0) {
//     $hasilkeranjang = mysqli_fetch_array($datacekkeranjang);
//     $total = $hasilkeranjang['jumlah'] + 1;
//     $updatekeranjang = "UPDATE detail_beli SET jumlah='$total' WHERE id_detail='$id'";
//     $dataupdate = mysqli_query($koneksi, $updatekeranjang);
//     header("location:adminarea.php?hal=keranjang");
// }