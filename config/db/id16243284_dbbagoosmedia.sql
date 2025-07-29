-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Feb 2021 pada 17.10
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbagoosmedia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_keluar` int(10) NOT NULL,
  `kode_barang` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `nama_barang` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `satuan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `hbeli` int(10) NOT NULL,
  `hjual` int(10) NOT NULL,
  `pemasok` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(15) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `kode_barang` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nama_barang` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `satuan` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `hbeli` int(10) NOT NULL,
  `hjual` int(10) NOT NULL,
  `pemasok` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`kode_barang`, `nama_barang`, `satuan`, `hbeli`, `hjual`, `pemasok`, `jumlah`, `tanggal`) VALUES
('A-4422', 'Diapet F', 'Strip', 2500, 3000, 'PT Kimia Farma', 90, '2021-02-24'),
('D-3453', 'Gudang Garam', 'Dus', 52000, 58000, '', 90, '2021-02-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barang`
--

CREATE TABLE `data_barang` (
  `kode_barang` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nama_barang` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `satuan` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `hbeli` int(10) NOT NULL,
  `hjual` int(10) NOT NULL,
  `pemasok` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `stok` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `data_barang`
--

INSERT INTO `data_barang` (`kode_barang`, `nama_barang`, `satuan`, `hbeli`, `hjual`, `pemasok`, `stok`) VALUES
('A-2202', 'Paramex', 'Strip', 2000, 2500, '', 80),
('A-2226', 'Konidin', 'Strip', 2000, 2500, '', 95),
('A-2310', 'Aspirin', 'Strip', 1800, 2500, '', 98),
('A-4442', 'Decolgen', 'Strip', 2200, 2500, '', 99),
('B-2196', 'Dancow', 'Kaleng 1Kg', 48500, 56000, '', 114),
('B-2250', 'Lactamil', 'Kaleng 600ml', 52000, 59000, '', 78),
('B-5012', 'Blue Band', 'Kaleng 500ml', 17500, 21000, '', 108),
('C-0101', 'Indomie Goreng', 'Dus', 43000, 48000, '', 94),
('C-2298', 'Mie Sedap', 'Dus', 41000, 46500, '', 91),
('D-2232', 'Sampoerna Mild', 'Bungkus', 17500, 20000, '', 83),
('D-2304', 'Dunhil 20', 'Bungkus', 17600, 23000, '', 101),
('D-3201', 'Surya 16', 'Bungkus', 17900, 20000, '', 95),
('F-2286', 'Baygon', 'Kaleng 250ml', 17000, 22000, '', 100),
('G-2208', 'Chetos', 'Dus', 23000, 25000, '', 98),
('G-2274', 'Potato', 'Dus', 24000, 27500, '', 91),
('H-2214', 'Aqua 250ml', 'Dus', 46000, 52000, '', 107),
('H-2262', 'VIT 600ml', 'Dus', 43000, 50000, '', 80),
('K-2190', 'Sapi', 'Ekor', 6500000, 7200000, '', 96),
('K-2244', 'Ayam', 'Ekor', 43000, 52000, '', 103),
('N-2256', 'Honda Mobilio', 'Unit', 216000000, 246000000, '', 90),
('R-2280', 'Yamaha Vixion', 'Unit', 25500000, 28000000, '', 80),
('S-2238', 'Nike Air', 'Set', 325000, 489000, '', 63),
('S-2292', 'Adidas Beckembaur', 'Set', 675000, 899000, '', 88),
('T-2268', 'Sony Vision LED 56', 'Unit', 8500000, 10400000, '', 77),
('W-2220', 'Gamis Batik', 'Pcs', 67000, 110000, '', 76);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_keluar`
--

CREATE TABLE `detail_keluar` (
  `id_keluar` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `nota` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `kode_barang` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_masuk`
--

CREATE TABLE `detail_masuk` (
  `id_masuk` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `nota` int(7) NOT NULL,
  `kode_barang` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` tinyint(2) NOT NULL,
  `username` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `user_role` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `user_role`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `detail_keluar`
--
ALTER TABLE `detail_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indeks untuk tabel `detail_masuk`
--
ALTER TABLE `detail_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
