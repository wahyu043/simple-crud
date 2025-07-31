<h2>Edit Barang</h2>
<form action="<?= BASE_URL ?>/barang/update/<?= $data['barang']['id'] ?>" method="POST">
    <label>Kode Barang</label><br>
    <input type="text" name="kode_barang" value="<?= $data['barang']['kode_barang'] ?>" required><br><br>

    <label>Nama Barang</label><br>
    <input type="text" name="nama_barang" value="<?= $data['barang']['nama_barang'] ?>" required><br><br>

    <button type="submit">Update</button>
</form>
