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
}
