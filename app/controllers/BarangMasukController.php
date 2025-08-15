<?php

class BarangMasukController extends Controller
{
    public function index()
    {
        // Proteksi akses (harus login)
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        // Ambil data barang masuk dari DB
        $db = new Database();
        $conn = $db->conn;

        $result = $conn->query("SELECT * FROM barang_masuk ORDER BY tanggal_masuk DESC");
        $barangMasuk = $result->fetch_all(MYSQLI_ASSOC);

        $this->view('barang_masuk/index', [
            'username' => $_SESSION['user'],
            'barangMasuk' => $barangMasuk
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

        $result = $conn->query("SELECT kode_barang, nama_barang FROM data_barang ORDER BY nama_barang ASC");
        $barangList = $result->fetch_all(MYSQLI_ASSOC);

        $this->view('barang_masuk/create', [
            'username' => $_SESSION['user'],
            'barangList' => $barangList
        ]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kode_barang = $_POST['kode_barang'];
            $jumlah = $_POST['jumlah'];
            $tanggal = $_POST['tanggal'];

            // Koneksi DB
            $db = new Database();
            $conn = $db->conn;

            // Insert ke tabel barang_masuk
            $stmt = $conn->prepare("INSERT INTO barang_masuk (kode_barang, jumlah_masuk, tanggal_masuk) VALUES (?, ?, ?)");
            $stmt->bind_param("sis", $kode_barang, $jumlah, $tanggal);

            if ($stmt->execute()) {
                // Update stok pada data_barang
                $updateStok = $conn->prepare("UPDATE data_barang SET stok = stok + ? WHERE kode_barang = ?");
                $updateStok->bind_param("is", $jumlah, $kode_barang);
                $updateStok->execute();

                // Redirect balik ke halaman list Barang Masuk
                header('Location: ' . BASE_URL . '/BarangMasuk');
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
        $stmt = $conn->prepare("SELECT * FROM barang_masuk WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $barangMasuk = $result->fetch_assoc();

        if (!$barangMasuk) {
            echo "Data tidak ditemukan.";
            exit;
        }

        // Ambil data barang untuk dropdown (jaga-jaga kalau kode barang diaktifkan nanti)
        $result = $conn->query("SELECT kode_barang, nama_barang FROM data_barang ORDER BY nama_barang ASC");
        $barangList = $result->fetch_all(MYSQLI_ASSOC);

        $this->view('barang_masuk/edit', [
            'username' => $_SESSION['user'],
            'barangMasuk' => $barangMasuk,
            'barangList' => $barangList
        ]);
    }
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kode_barang = $_POST['kode_barang'];
            $jumlah_baru = (int) $_POST['jumlah'];
            $tanggal_baru = $_POST['tanggal'];

            $db = new Database();
            $conn = $db->conn;

            // Ambil jumlah lama
            $stmtOld = $conn->prepare("SELECT jumlah_masuk FROM barang_masuk WHERE id = ?");
            $stmtOld->bind_param("i", $id);
            $stmtOld->execute();
            $resultOld = $stmtOld->get_result();
            $rowOld = $resultOld->fetch_assoc();

            if (!$rowOld) {
                echo "Data tidak ditemukan.";
                exit;
            }

            $jumlah_lama = (int) $rowOld['jumlah_masuk'];
            $selisih = $jumlah_baru - $jumlah_lama;

            // Update data transaksi
            $stmtUpdate = $conn->prepare("UPDATE barang_masuk SET jumlah_masuk = ?, tanggal_masuk = ? WHERE id = ?");
            $stmtUpdate->bind_param("isi", $jumlah_baru, $tanggal_baru, $id);
            $stmtUpdate->execute();

            // Update stok sesuai selisih
            $stmtStok = $conn->prepare("UPDATE data_barang SET stok = stok + ? WHERE kode_barang = ?");
            $stmtStok->bind_param("is", $selisih, $kode_barang);
            $stmtStok->execute();

            // Redirect
            header('Location: ' . BASE_URL . '/BarangMasuk');
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
        $stmt = $conn->prepare("SELECT kode_barang, jumlah_masuk FROM barang_masuk WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $barangMasuk = $result->fetch_assoc();

        if (!$barangMasuk) {
            echo "Data tidak ditemukan.";
            exit;
        }

        $kode_barang = $barangMasuk['kode_barang'];
        $jumlah = (int) $barangMasuk['jumlah_masuk'];

        // Hapus data transaksi
        $stmtDelete = $conn->prepare("DELETE FROM barang_masuk WHERE id = ?");
        $stmtDelete->bind_param("i", $id);
        $stmtDelete->execute();

        // Kurangi stok
        $stmtStok = $conn->prepare("UPDATE data_barang SET stok = stok - ? WHERE kode_barang = ?");
        $stmtStok->bind_param("is", $jumlah, $kode_barang);
        $stmtStok->execute();

        // Redirect
        header('Location: ' . BASE_URL . '/BarangMasuk');
        exit;
    }
}
