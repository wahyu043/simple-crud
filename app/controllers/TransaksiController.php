<?php

class TransaksiController extends Controller
{
    public function index()
    {
        // Proteksi login
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        // Koneksi ke database
        $db = new Database();
        $conn = $db->conn;

        // Default: tanpa filter
        $where = "";
        if (
            isset($_GET['tanggal_awal']) && isset($_GET['tanggal_akhir']) &&
            !empty($_GET['tanggal_awal']) && !empty($_GET['tanggal_akhir'])
        ) {

            $tanggal_awal = $_GET['tanggal_awal'];
            $tanggal_akhir = $_GET['tanggal_akhir'];

            // Tambahkan filter tanggal ke query gabungan
            $where = "WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
        }

        // Query gabungan dari barang_masuk dan barang_keluar
        $sql = "
            SELECT kode_barang, tanggal_masuk AS tanggal, jumlah_masuk AS jumlah, 'MASUK' AS jenis, NULL AS tujuan
            FROM barang_masuk
            UNION ALL
            SELECT kode_barang, tanggal_keluar AS tanggal, jumlah_keluar AS jumlah, 'KELUAR' AS jenis, tujuan
            FROM barang_keluar
        ";

        // Jika ada filter tanggal
        if (!empty($where)) {
            $sql = "SELECT * FROM ($sql) AS gabungan $where ORDER BY tanggal DESC";
        } else {
            $sql = "SELECT * FROM ($sql) AS gabungan ORDER BY tanggal DESC";
        }

        $result = $conn->query($sql);
        $transaksi = $result->fetch_all(MYSQLI_ASSOC);

        // Kirim data ke view
        $this->view('transaksi/index', [
            'username' => $_SESSION['user'],
            'transaksi' => $transaksi,
            'tanggal_awal' => $_GET['tanggal_awal'] ?? '',
            'tanggal_akhir' => $_GET['tanggal_akhir'] ?? ''
        ]);
    }

    // ✅ FITUR EXPORT CSV
    public function exportCsv()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $db = new Database();
        $conn = $db->conn;

        $where = "";
        if (!empty($_GET['tanggal_awal']) && !empty($_GET['tanggal_akhir'])) {
            $tanggal_awal = $_GET['tanggal_awal'];
            $tanggal_akhir = $_GET['tanggal_akhir'];
            $where = "WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
        }

        $sql = "
            SELECT kode_barang, tanggal_masuk AS tanggal, jumlah_masuk AS jumlah, 'MASUK' AS jenis, '' AS tujuan
            FROM barang_masuk
            UNION ALL
            SELECT kode_barang, tanggal_keluar AS tanggal, jumlah_keluar AS jumlah, 'KELUAR' AS jenis, tujuan
            FROM barang_keluar
        ";

        if (!empty($where)) {
            $sql = "SELECT * FROM ($sql) AS gabungan $where ORDER BY tanggal DESC";
        } else {
            $sql = "SELECT * FROM ($sql) AS gabungan ORDER BY tanggal DESC";
        }

        $result = $conn->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);

        // Set header CSV
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="laporan_transaksi.csv"');

        $output = fopen('php://output', 'w');
        fputcsv($output, ['Tanggal', 'Kode Barang', 'Jenis', 'Jumlah', 'Keterangan']);

        foreach ($data as $row) {
            fputcsv($output, [
                $row['tanggal'],
                $row['kode_barang'],
                $row['jenis'],
                $row['jumlah'],
                $row['tujuan'] ?? '-'
            ]);
        }

        fclose($output);
        exit;
    }
}
