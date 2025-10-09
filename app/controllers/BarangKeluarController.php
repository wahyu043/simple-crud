<?php

class BarangKeluarController extends Controller
{
    public function index()
    {
        // Proteksi akses (harus login)
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        // Ambil data barang keluar dari DB
        $db = new Database();
        $conn = $db->conn;

        $result = $conn->query("SELECT * FROM barang_keluar ORDER BY tanggal_keluar DESC");
        $barangKeluar = $result->fetch_all(MYSQLI_ASSOC);

        $this->view('barang_keluar/index', [
            'username' => $_SESSION['user'],
            'barangKeluar' => $barangKeluar
        ]);
    }

    public function create()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $db = new Database();
        $conn = $db->conn;

        $result = $conn->query("SELECT kode_barang, nama_barang, stok FROM data_barang ORDER BY nama_barang ASC");
        $barangList = $result->fetch_all(MYSQLI_ASSOC);

        $this->view('barang_keluar/create', [
            'username' => $_SESSION['user'],
            'barangList' => $barangList
        ]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kode_barang = $_POST['kode_barang'];
            $jumlah = (int) $_POST['jumlah'];
            $tanggal = $_POST['tanggal'];
            $tujuan = $_POST['tujuan'];

            $db = new Database();
            $conn = $db->conn;

            // Cek stok dulu
            $cek = $conn->prepare("SELECT stok FROM data_barang WHERE kode_barang = ?");
            $cek->bind_param("s", $kode_barang);
            $cek->execute();
            $stokData = $cek->get_result()->fetch_assoc();

            if (!$stokData || $stokData['stok'] < $jumlah) {
                echo "<script>alert('Stok tidak mencukupi!'); window.location.href='" . BASE_URL . "/BarangKeluar/create';</script>";
                exit;
            }

            // Insert ke tabel barang_keluar
            $stmt = $conn->prepare("INSERT INTO barang_keluar (kode_barang, jumlah_keluar, tanggal_keluar, tujuan) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("siss", $kode_barang, $jumlah, $tanggal, $tujuan);

            if ($stmt->execute()) {
                // Kurangi stok pada data_barang
                $updateStok = $conn->prepare("UPDATE data_barang SET stok = stok - ? WHERE kode_barang = ?");
                $updateStok->bind_param("is", $jumlah, $kode_barang);
                $updateStok->execute();

                header('Location: ' . BASE_URL . '/BarangKeluar');
                exit;
            } else {
                echo "Gagal menambahkan data.";
            }
        }
    }

    public function edit($id)
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $db = new Database();
        $conn = $db->conn;

        // Ambil data berdasarkan ID transaksi
        $stmt = $conn->prepare("SELECT * FROM barang_keluar WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $barangKeluar = $result->fetch_assoc();

        if (!$barangKeluar) {
            echo "Data tidak ditemukan.";
            exit;
        }

        // Ambil data barang untuk dropdown
        $result = $conn->query("SELECT kode_barang, nama_barang FROM data_barang ORDER BY nama_barang ASC");
        $barangList = $result->fetch_all(MYSQLI_ASSOC);

        $this->view('barang_keluar/edit', [
            'username' => $_SESSION['user'],
            'barangKeluar' => $barangKeluar,
            'barangList' => $barangList
        ]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kode_barang = $_POST['kode_barang'];
            $jumlah_baru = (int) $_POST['jumlah'];
            $tanggal_baru = $_POST['tanggal'];
            $tujuan_baru = $_POST['tujuan'];

            $db = new Database();
            $conn = $db->conn;

            // Ambil jumlah lama
            $stmtOld = $conn->prepare("SELECT jumlah_keluar FROM barang_keluar WHERE id = ?");
            $stmtOld->bind_param("i", $id);
            $stmtOld->execute();
            $resultOld = $stmtOld->get_result();
            $rowOld = $resultOld->fetch_assoc();

            if (!$rowOld) {
                echo "Data tidak ditemukan.";
                exit;
            }

            $jumlah_lama = (int) $rowOld['jumlah_keluar'];
            $selisih = $jumlah_baru - $jumlah_lama;

            // Update data transaksi
            $stmtUpdate = $conn->prepare("UPDATE barang_keluar SET jumlah_keluar = ?, tanggal_keluar = ?, tujuan = ? WHERE id = ?");
            $stmtUpdate->bind_param("issi", $jumlah_baru, $tanggal_baru, $tujuan_baru, $id);
            $stmtUpdate->execute();

            // Update stok sesuai selisih (stok berkurang saat tambah jumlah)
            $stmtStok = $conn->prepare("UPDATE data_barang SET stok = stok - ? WHERE kode_barang = ?");
            $stmtStok->bind_param("is", $selisih, $kode_barang);
            $stmtStok->execute();

            header('Location: ' . BASE_URL . '/BarangKeluar');
            exit;
        }
    }

    public function delete($id)
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $db = new Database();
        $conn = $db->conn;

        // Ambil data transaksi dulu
        $stmt = $conn->prepare("SELECT kode_barang, jumlah_keluar FROM barang_keluar WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $barangKeluar = $result->fetch_assoc();

        if (!$barangKeluar) {
            echo "Data tidak ditemukan.";
            exit;
        }

        $kode_barang = $barangKeluar['kode_barang'];
        $jumlah = (int) $barangKeluar['jumlah_keluar'];

        // Hapus data transaksi
        $stmtDelete = $conn->prepare("DELETE FROM barang_keluar WHERE id = ?");
        $stmtDelete->bind_param("i", $id);
        $stmtDelete->execute();

        // Kembalikan stok (karena transaksi dihapus)
        $stmtStok = $conn->prepare("UPDATE data_barang SET stok = stok + ? WHERE kode_barang = ?");
        $stmtStok->bind_param("is", $jumlah, $kode_barang);
        $stmtStok->execute();

        header('Location: ' . BASE_URL . '/BarangKeluar');
        exit;
    }
}
