<?php
include 'conn.php';
include 'admin.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0">
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Stok Opname Data Barang</title>
</head>

<body>
    <!-- Nav Bar -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="barang_masuk.php"> Barang Masuk </a></li>
                        <li class="nav-item"><a class="nav-link" href="barang_keluar.php"> Barang Keluar </a></li>
                        <li class="nav-item"><a class="nav-link" href="transaksi.php"> Laporan Transaksi </a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php"> Logout </a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Nav Bar -->
    <!-- Table Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-tittle">Stok Opname Barang</h3>
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
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Table Content -->

    <!-- Javascript Booststrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>