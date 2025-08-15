<?php
include 'conn.php';

if($_GET['act']=='updatebarang'){
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $satuan = $_POST['satuan'];
    $hbeli = $_POST['hbeli'];
    $hjual = $_POST['hjual'];
    $pemasok = $_POST['pemasok'];
    $stok = $_POST['stok'];

    //query update
    $queryupdate = mysqli_query($conn, "UPDATE data_barang SET nama_barang='$nama_barang', satuan='$satuan', hbeli='$hbeli', hjual='$hjual', pemasok='$pemasok', stok='$stok' WHERE kode_barang = '$kode_barang' ");

    if($queryupdate) {
        # redirect ke page index
        header("location:data_barang.php");
    }
else{
        echo "ERROR, data gagal diupdate". mysqli_error($conn);
    }
}

if($_GET['act'] == 'deletebarang'){
    $kode_barang = $_GET['kode_barang'];

    //query hapus
    $querydelete = mysqli_query($conn, "DELETE FROM data_barang WHERE kode_barang = '$kode_barang'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:data_barang.php");
    }
    else{
        echo "ERROR, data gagal dihapus". mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>