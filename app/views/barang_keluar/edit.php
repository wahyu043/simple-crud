<h2>Edit Barang Keluar</h2>
<p>Halo, <?= htmlspecialchars($data['username']) ?>! Silakan ubah jumlah, tanggal keluar, atau tujuan pengiriman.</p>

<form action="<?= BASE_URL ?>/BarangKeluar/update/<?= $data['barangKeluar']['id'] ?>" method="POST">
    <div class="form-group">
        <label for="kode_barang">Kode Barang</label>
        <input type="text" name="kode_barang" id="kode_barang" class="form-control"
            value="<?= htmlspecialchars($data['barangKeluar']['kode_barang']) ?>" readonly>
    </div>

    <div class="form-group">
        <label for="jumlah">Jumlah Keluar</label>
        <input type="number" name="jumlah" id="jumlah" class="form-control"
            value="<?= htmlspecialchars($data['barangKeluar']['jumlah_keluar']) ?>" required>
    </div>

    <div class="form-group">
        <label for="tanggal">Tanggal Keluar</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control"
            value="<?= htmlspecialchars($data['barangKeluar']['tanggal_keluar']) ?>" required>
    </div>

    <div class="form-group">
        <label for="tujuan">Tujuan</label>
        <input type="text" name="tujuan" id="tujuan" class="form-control"
            value="<?= htmlspecialchars($data['barangKeluar']['tujuan']) ?>" required>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Update</button>
</form>
