<h2>Riwayat Transaksi Barang</h2>
<p>Halo, <?= htmlspecialchars($data['username']) ?>! Gunakan filter di bawah untuk melihat transaksi berdasarkan tanggal.</p>

<form method="GET" action="<?= BASE_URL ?>/Transaksi" class="mb-4">
    <label for="tanggal_awal">Dari tanggal:</label>
    <input type="date" name="tanggal_awal" id="tanggal_awal" value="<?= htmlspecialchars($data['tanggal_awal']) ?>">

    <label for="tanggal_akhir">Sampai tanggal:</label>
    <input type="date" name="tanggal_akhir" id="tanggal_akhir" value="<?= htmlspecialchars($data['tanggal_akhir']) ?>">

    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
    <a href="<?= BASE_URL ?>/Transaksi" class="btn btn-secondary btn-sm">Reset</a>
</form>

<div class="mb-3">
    <a href="<?= BASE_URL ?>/Transaksi/exportCsv?tanggal_awal=<?= $data['tanggal_awal'] ?>&tanggal_akhir=<?= $data['tanggal_akhir'] ?>" class="btn btn-success btn-sm">⬇ Export CSV</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Kode Barang</th>
            <th>Jenis</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data['transaksi'])): ?>
            <?php foreach ($data['transaksi'] as $index => $row): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($row['tanggal']) ?></td>
                    <td><?= htmlspecialchars($row['kode_barang']) ?></td>
                    <td>
                        <?php if ($row['jenis'] === 'MASUK'): ?>
                            <span class="badge bg-success">MASUK</span>
                        <?php else: ?>
                            <span class="badge bg-danger">KELUAR</span>
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($row['jumlah']) ?></td>
                    <td><?= htmlspecialchars($row['tujuan'] ?? '-') ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">Tidak ada transaksi pada rentang tanggal ini.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>