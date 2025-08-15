<h2>Edit Barang Masuk</h2>
<p>Halo, <?= htmlspecialchars($data['username']) ?>! Silakan ubah jumlah atau tanggal masuk.</p>

<form action="<?= BASE_URL ?>/BarangMasuk/update/<?= $data['barangMasuk']['id'] ?>" method="POST">
    <div class="form-group">
        <label for="kode_barang">Nama Barang</label>
        <input type="text" name="kode_barang" id="kode_barang" class="form-control"
            value="<?= htmlspecialchars($data['barangMasuk']['kode_barang']) ?>" readonly>
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah Masuk</label>
        <input type="number" name="jumlah" id="jumlah" class="form-control"
            value="<?= htmlspecialchars($data['barangMasuk']['jumlah_masuk']) ?>" required>
    </div>
    <div class="form-group">
        <label for="tanggal">Tanggal Masuk</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control"
            value="<?= htmlspecialchars($data['barangMasuk']['tanggal_masuk']) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Update</button>
</form>