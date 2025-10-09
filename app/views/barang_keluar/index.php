<h2>Daftar Barang Keluar</h2>
<p>Halo, <?= htmlspecialchars($data['username']) ?>! Berikut data barang keluar terbaru.</p>

<div class="mb-3">
    <a href="<?= BASE_URL ?>/BarangKeluar/create" class="btn btn-success">➕ Tambah Barang Keluar</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Jumlah Keluar</th>
            <th>Tanggal Keluar</th>
            <th>Tujuan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data['barangKeluar'])): ?>
            <?php foreach ($data['barangKeluar'] as $index => $row): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($row['kode_barang']) ?></td>
                    <td><?= htmlspecialchars($row['jumlah_keluar']) ?></td>
                    <td><?= htmlspecialchars($row['tanggal_keluar']) ?></td>
                    <td><?= htmlspecialchars($row['tujuan']) ?></td>
                    <td>
                        <a href="<?= BASE_URL ?>/BarangKeluar/edit/<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= BASE_URL ?>/BarangKeluar/delete/<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">Belum ada data barang keluar</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>