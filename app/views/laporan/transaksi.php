<?php
include 'conn.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Transaksi</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Laporan Transaksi</h2>
            </div>
            <div class="col-md-12">
                <a href="data_barang.php" class="btn btn-primary"> Kembali ke Beranda </a>
                <a href="function_cetak.php" class="btn btn-success"> Cetak </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Pemasok</th>
                            <th>Stok Akhir</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $queryview = mysqli_query($conn, "SELECT * FROM data_barang");
                        while ($row = mysqli_fetch_assoc($queryview)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['kode_barang']; ?></td>
                                <td><?php echo $row['nama_barang']; ?></td>
                                <td><?php echo $row['satuan']; ?></td>
                                <td><?php echo $row['hbeli']; ?></td>
                                <td><?php echo $row['hjual']; ?></td>
                                <td><?php echo $row['pemasok']; ?></td>
                                <td><?php echo $row['stok']; ?></td>
                                <!-- <td><?php echo $row['tanggal']; ?></td> -->
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>