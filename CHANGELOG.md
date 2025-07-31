# 📜 CHANGELOG – Refactor MVC Native

## [Unreleased]

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
