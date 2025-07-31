<h2>Daftar Barang Masuk</h2>
<p>Halo, <?= htmlspecialchars($data['username']) ?>! Berikut data barang masuk terbaru.</p>

<div class="mb-3">
    <a href="<?= BASE_URL ?>/BarangMasuk/create" class="btn btn-success">➕ Tambah Barang Masuk</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Jumlah Masuk</th>
            <th>Tanggal Masuk</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data['barangMasuk'])): ?>
            <?php foreach ($data['barangMasuk'] as $index => $row): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($row['kode_barang']) ?></td>
                    <td><?= htmlspecialchars($row['jumlah_masuk']) ?></td>
                    <td><?= htmlspecialchars($row['tanggal_masuk']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">Belum ada data barang masuk</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>