<h2>Tambah Barang</h2>
<form action="<?= BASE_URL ?>/barang/store" method="POST">
    <label>Kode Barang</label><br>
    <input type="text" name="kode_barang" required><br><br>

    <label>Nama Barang</label><br>
    <input type="text" name="nama_barang" required><br><br>

    <button type="submit">Simpan</button>
</form>
