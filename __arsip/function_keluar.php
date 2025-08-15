<?php
    include ("../../koneksi.php");
    $id= $_GET['id'];
    $id_barang= $_GET['idbrg'];
    $cekstok= "SELECT * FROM barang WHERE id_barang='$id_barang'";
    $datacekstok= mysqli_query($koneksi,$cekstok);
    if (mysqli_num_rows($datacekstok)>0)
    {
        // melihat hasil cek barang dan menambah / mengembalikan data pada row stok
        $hasilcek= mysqli_fetch_array($datacekstok);
        $stok= $hasilcek['stok']+1;
        $updatestok= "UPDATE barang SET stok= '$stok' WHERE id_barang='$id_barang'";
        $dataupdate= mysqli_query($koneksi,$updatestok);
        // update keranjang 
        $cekkeranjang= "SELECT * FROM detail_beli WHERE id_detail='$id'";
        $datacekkeranjang= mysqli_query($koneksi,$cekkeranjang);
        if (mysqli_num_rows($datacekkeranjang)>0)
        {
            // mengurangi pilihan pada keranjang
            $hasilkeranjang= mysqli_fetch_array($datacekkeranjang);
            $total= $hasilkeranjang['jumlah']-1;
            $updatekeranjang= "UPDATE detail_beli SET jumlah='$total' WHERE id_detail='$id'";
            $dataupdate= mysqli_query($koneksi,$updatekeranjang);
            header ("location:adminarea.php?hal=keranjang");
        }
    }
    else
    {
        echo "Ada Kesalahan";
    }
?>