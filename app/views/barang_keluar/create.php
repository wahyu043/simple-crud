<h2>Tambah Barang Keluar</h2>

<form action="<?= BASE_URL ?>/BarangKeluar/store" method="POST">
    <label>Kode Barang</label><br>
    <select name="kode_barang" required>
        <option value="">-- Pilih Barang --</option>
        <?php foreach ($data['barangList'] as $barang): ?>
            <option value="<?= htmlspecialchars($barang['kode_barang']) ?>">
                <?= htmlspecialchars($barang['kode_barang']) ?> - <?= htmlspecialchars($barang['nama_barang']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Jumlah Keluar</label><br>
    <input type="number" name="jumlah" min="1" required><br><br>

    <label>Tanggal Keluar</label><br>
    <input type="date" name="tanggal" required><br><br>

    <label>Tujuan</label><br>
    <input type="text" name="tujuan" placeholder="Tujuan pengiriman" required><br><br>

    <button type="submit">Simpan</button>
</form>