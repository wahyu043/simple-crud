<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h2>Welcome, <?= htmlspecialchars($data['username']) ?></h2>

    <h2>Stok Terkini</h2>
    <div style="margin-top: 20px;">
        <a href="<?= BASE_URL ?>/BarangMasuk" class="btn btn-success">➕ Barang Masuk</a>

        <a href="<?= BASE_URL ?>/barang-keluar"
            class="btn btn-warning">➖ Barang Keluar</a>

        <a href="<?= BASE_URL ?>/laporan"
            class="btn btn-primary">🖨 Cetak Laporan</a>

        <a href="<?= BASE_URL ?>/login/logout">Logout</a>
    </div>

    <table border="1" cellpadding="8">
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
            <?php $no = 1;
            foreach ($data['barang'] as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['kode_barang'] ?></td>
                    <td><?= $row['nama_barang'] ?></td>
                    <td><?= $row['satuan'] ?></td>
                    <td><?= number_format($row['harga_beli']) ?></td>
                    <td><?= number_format($row['harga_jual']) ?></td>
                    <td><?= $row['pemasok'] ?></td>
                    <td><?= $row['stok'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- <p>Ini halaman dashboard setelah login berhasil.</p> -->


</body>

</html>