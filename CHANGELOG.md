# 📜 CHANGELOG – Refactor MVC Native

## [Unreleased]

### ✨ Added

- (placeholder untuk fitur selanjutnya)

### 🔨 Refactored

- (placeholder untuk refactor selanjutnya)

### 🛠️ Configuration

- (placeholder untuk konfigurasi selanjutnya)

---

## [v0.3.1] – 2025-08-15

### ✨ Added

- Menambahkan tombol **Edit** dan **Hapus** pada halaman `Barang Masuk`.
- Menambahkan method `edit($id)` di `BarangMasukController` untuk:
  - Menampilkan form dengan data prefilled.
  - Mengubah jumlah & tanggal masuk (kode_barang readonly).
- Menambahkan method `update($id)`:
  - Perubahan jumlah masuk otomatis menyesuaikan stok (`data_barang`).
- Menambahkan method `delete($id)`:
  - Hapus transaksi sekaligus rollback stok ke kondisi sebelumnya.

### ✅ CRUD Barang Masuk sekarang lengkap & sinkron dengan stok gudang.

---

## [v0.3.0] – 2025-07-31

### ✨ Added

- **Controller:** Menambahkan `BarangMasukController` dengan method:

  - `index` → Menampilkan daftar transaksi Barang Masuk.
  - `create` → Form input dengan dropdown daftar barang (`data_barang`).

- **View:**
  - `barang_masuk/index.php` untuk daftar transaksi.
  - `barang_masuk/create.php` untuk form tambah Barang Masuk.

### 🔨 Refactored

- Routing otomatis melalui class `App` tanpa tambahan konfigurasi manual.
- Penggunaan `$db->conn` untuk koneksi database menghindari error undefined method.

---

### ✨ Added

- **Model:** `DataBarang` untuk mengambil data dari tabel `data_barang`.
- **Controller:** Update `DashboardController` untuk menampilkan **stok terkini** dan username user yang login.
- **View:** `dashboard/index.php` untuk menampilkan tabel stok barang.
- **Core:** Autoload `Database.php` ditambahkan di `public/index.php`.

### 🔨 Refactored

- Menggunakan class `Database` yang sudah ada sebagai koneksi utama (menghilangkan ketergantungan `Model.php`).
- Menyesuaikan method `model()` agar tidak mengharuskan inheritance dari `Model`.

### 🛠️ Configuration

- Fix error `Class Model not found` dan `Class Database not found`.
- Pastikan autoload file core `Database.php` berjalan untuk semua model.

## [v0.2.0] – 2025-07-31

- Dashboard kini terintegrasi dengan database `stok_opname`.
- Menampilkan **stok terkini** langsung dari tabel `data_barang` (25 data awal).
- Proses login dan logout tetap berfungsi dengan proteksi session.

---

### ✨ Added

- Implementasi fitur **Login dan Logout** dengan session management.
- Proteksi akses **Dashboard** agar hanya user yang sudah login yang bisa mengaksesnya.

### 🔨 Refactored

- Menyusun ulang struktur folder proyek ke pola **MVC native PHP**:
  - `controllers/`
  - `models/`
  - `views/`
- Routing dasar melalui `index.php` dan `.htaccess`.

### 🛠️ Configuration

- Session otomatis diaktifkan melalui `config.php`.
- Konstanta `BASE_URL` ditambahkan untuk mempermudah redirect dan path.

---

## [v0.1.0] – 2025-07-31

- Initial refactor project to MVC structure.
- Basic setup and configuration completed.
