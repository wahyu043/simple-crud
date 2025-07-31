<h2>Daftar Barang</h2>
<a href="<?= BASE_URL ?>/barang/create">Tambah Barang</a>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($data['barang'] as $row): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['kode_barang'] ?></td>
        <td><?= $row['nama_barang'] ?></td>
        <td>
            <a href="<?= BASE_URL ?>/barang/edit/<?= $row['id'] ?>">Edit</a> |
            <a href="<?= BASE_URL ?>/barang/delete/<?= $row['id'] ?>" onclick="return confirm('Yakin mau hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
