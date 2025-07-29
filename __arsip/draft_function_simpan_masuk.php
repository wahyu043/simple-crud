<?php

// Versi dalam satu tabel

if ($_GET['act'] == 'tambahbarang') {
    // Ambil data dari form
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $satuan=$_POST['satuan'];
    $hbeli=$_POST['hbeli'];
    $hjual = $_POST['hjual'];
    $pemasok=$_POST['pemasok'];
    $jumlah=$_POST['jumlah'];
    $tanggal = DATE ( "Y-m-d");

    // Cek apakah barang sudah ada
    $cek_barang = mysqli_query($conn, "SELECT * FROM data_barang WHERE kode_barang='$kode_barang'");
    if (mysqli_num_rows($cek_barang) > 0) {
        // Barang sudah ada, update stok
        $row = mysqli_fetch_assoc($cek_barang);
        $stok_sekarang = $row['stok'];
        $stok_baru = $stok_sekarang + $jumlah;

        $update_stok = mysqli_query($conn, "UPDATE data_barang SET stok='$stok_baru' WHERE kode_barang='$kode_barang'");
        if ($update_stok) {
            echo "Stok barang berhasil diperbarui.";
        } else {
            echo "Gagal memperbarui stok barang.";
        }
    } else {
        // Barang belum ada, insert data baru
        $insert_barang = mysqli_query($conn, "INSERT INTO data_barang (kode_barang, nama_barang, satuan, hbeli, hjual, pemasok, jumlah, tanggal) VALUES ('$kode_barang', '$nama_barang', '$satuan', '$hbeli', '$hjual', '$pemasok', '$jumlah', '$tanggal')");
        if ($insert_barang) {
            echo "Barang baru berhasil ditambahkan.";
        } else {
            echo "Gagal menambahkan barang baru.";
        }
    }
}

// versi JOIN tabel

include ("conn.php");

$query_barang_masuk = mysqli_query($conn, "SELECT kode_barang, jumlah FROM barang_masuk");
while ($row_masuk = mysqli_fetch_assoc($query_barang_masuk)) {
    $kode_barang = $row_masuk['kode_barang'];
    $jumlah = $row_masuk['jumlah'];

    // Cari barang di tabel data_barang
    $query_data_barang = mysqli_query($conn, "SELECT stok FROM data_barang WHERE kode_barang = '$kode_barang'");
    $row_barang = mysqli_fetch_assoc($query_data_barang);

    // Hitung stok baru
    $stok_baru = $row_barang['stok'] + $jumlah;

    // Update stok
    $update_stok = mysqli_query($conn, "UPDATE data_barang SET stok = $stok_baru WHERE kode_barang = '$kode_barang'");
}


?>
