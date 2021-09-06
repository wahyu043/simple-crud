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
    <title>Rekapitulasi Data Barang</title>
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
                        <h3 class="box-tittle">List Data Barang</h3>
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
                                            <th>Opsi</th>
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
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#updatebarang<?php echo $no; ?>"> <i class="fas fa-edit"></i></i> Edit </a>
                                                    <a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#deletebarang<?php echo $no; ?>"> <i class="fa fa-trash"></i> Hapus </a>
                                                    <!-- modal delete item -->
                                                    <div class="example-modal">
                                                        <div id="deletebarang<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <h3 class="modal-title">Konfirmasi Delete Data Barang</h3>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h4 align="center">Apakah anda yakin ingin menghapus <?php echo $row['nama_barang']; ?><strong><span class="grt"></span></strong> ?</h4>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                                                        <a href="function_barang.php?act=deletebarang&kode_barang=<?php echo $row['kode_barang']; ?>" class="btn btn-primary">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end modal delete -->
                                                    <!-- modal edit item -->
                                                    <div class="example-modal">
                                                        <div id="updatebarang<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h3 class="modal-title">Edit Data Barang</h3>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="function_barang.php?act=updatebarang" method="post" role="form">
                                                                            <?php
                                                                            $kode_barang = $row['kode_barang'];
                                                                            $query = "SELECT * FROM data_barang WHERE kode_barang='$kode_barang'";
                                                                            $result = mysqli_query($conn, $query);
                                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                            ?>
                                                                                <div class="form-group">
                                                                                    <div class="row">
                                                                                        <label class="col-sm-3 control-label text-right">Kode Barang <span class="text-red">*</span></label>
                                                                                        <div class="col-sm-8"><input type="text" class="form-control" name="kode_barang" placeholder="Kode Barang" value="<?php echo $row['kode_barang']; ?>" readonly></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="row">
                                                                                        <label class="col-sm-3 control-label text-right">Nama barang <span class="text-red">*</span></label>
                                                                                        <div class="col-sm-8"><input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" value="<?php echo $row['nama_barang']; ?>"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="row">
                                                                                        <label class="col-sm-3 control-label text-right">Satuan <span class="text-red">*</span></label>
                                                                                        <div class="col-sm-8"><input type="text" class="form-control" name="satuan" placeholder="Satuan" value="<?php echo $row['satuan']; ?>"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="row">
                                                                                        <label class="col-sm-3 control-label text-right">Harga beli <span class="text-red">*</span></label>
                                                                                        <div class="col-sm-8"><input type="number" class="form-control" name="hbeli" placeholder="0" value="<?php echo $row['hbeli']; ?>"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="row">
                                                                                        <label class="col-sm-3 control-label text-right">Harga Jual <span class="text-red">*</span></label>
                                                                                        <div class="col-sm-8"><input type="number" class="form-control" name="hjual" placeholder="0" value="<?php echo $row['hjual']; ?>"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="row">
                                                                                        <label class="col-sm-3 control-label text-right">Pemasok <span class="text-red">*</span></label>
                                                                                        <div class="col-sm-8"><input type="text" class="form-control" name="pemasok" placeholder="Pemasok" value="<?php echo $row['pemasok']; ?>"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="row">
                                                                                        <label class="col-sm-3 control-label text-right">Stok <span class="text-red">*</span></label>
                                                                                        <div class="col-sm-8"><input type="number" class="form-control" name="stok" placeholder="Stok barang" value="<?php echo $row['stok']; ?>"></div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                                                                        <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                                                                    </div>
                                                                                <?php
                                                                            }
                                                                                ?>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end modal edit item -->
                                                </td>
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