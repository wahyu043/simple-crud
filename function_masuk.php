<?php
    include ("conn.php");

if($_GET['act']== 'tambahbarang'){
    $kode_masuk = $_POST['kode_masuk'];
    $nama_barang = $_POST['nama_barang'];
    $satuan=$_POST['satuan'];
    $hbeli=$_POST['hbeli'];
    $hjual = $_POST['hjual'];
    $pemasok=$_POST['pemasok'];
    $jumlah=$_POST['jumlah'];
    $tanggal = DATE ( "Y-m-d");

    //query tambah//
    $querytambah =  mysqli_query($conn, "INSERT INTO barang_masuk VALUES('$kode_masuk' ,'$nama_barang','$satuan','$hbeli','$hjual','$pemasok','$jumlah','$tanggal')");
    if ($querytambah) {
        # code rediret setelah insert ke index
        header("location:barang_masuk.php");
    }
    else{
        echo "ERROR, tidak berhasil". mysqli_error($conn);
    }
}

elseif ($_GET['act'] == 'updatebarang') {
    $kode_masuk = $_POST['kode_masuk'];
    $nama_barang = $_POST['nama_barang'];
    $satuan = $_POST['satuan'];
    $hbeli = $_POST['hbeli'];
    $hjual = $_POST['hjual'];
    $pemasok = $_POST['pemasok'];
    $jumlah = $_POST['jumlah'];

    //query update
    $queryupdate = mysqli_query($conn, "UPDATE barang_masuk SET nama_barang='$nama_barang', satuan='$satuan', hbeli='$hbeli', hjual='$hjual', pemasok='$pemasok', jumlah='$jumlah' WHERE kode_masuk='$kode_masuk'");

    if ($queryupdate) {
        # redirect ke page index
        header("location:barang_masuk.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($conn);
    }
} 

elseif ($_GET['act'] == 'deletebarang') {
    $kode_masuk = $_GET['kode_masuk'];

    //query hapus
    $querydelete = mysqli_query($conn, "DELETE FROM barang_masuk WHERE kode_masuk = '$kode_masuk'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:barang_masuk.php");
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>