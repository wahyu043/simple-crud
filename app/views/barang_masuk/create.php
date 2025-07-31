<h2>Tambah Barang Masuk</h2>
<p>Halo, <?= htmlspecialchars($data['username']) ?>! Pilih barang dan isi jumlah masuk.</p>

<form action="<?= BASE_URL ?>/BarangMasuk/store" method="POST">
    <div class="form-group">
        <label for="kode_barang">Nama Barang</label>
        <select name="kode_barang" id="kode_barang" class="form-control" required>
            <option value="">-- Pilih Barang --</option>
            <?php foreach ($data['barangList'] as $barang): ?>
                <option value="<?= htmlspecialchars($barang['kode_barang']) ?>">
                    <?= htmlspecialchars($barang['nama_barang']) ?> (<?= htmlspecialchars($barang['kode_barang']) ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah Masuk</label>
        <input type="number" name="jumlah" id="jumlah" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="tanggal">Tanggal Masuk</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
</form>