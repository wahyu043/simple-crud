-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 12, 2025 at 04:10 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stok_opname`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `kode_barang`, `jumlah_masuk`, `tanggal_masuk`, `created_at`) VALUES
(1, '121212', 100, '2025-07-31', '2025-07-31 15:48:07'),
(2, 'A-2202', 5, '2025-07-31', '2025-07-31 16:05:52'),
(3, 'A-2202', 15, '2025-07-31', '2025-07-31 16:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `pemasok` varchar(100) DEFAULT NULL,
  `stok` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`kode_barang`, `nama_barang`, `satuan`, `harga_beli`, `harga_jual`, `pemasok`, `stok`) VALUES
('A-2202', 'Paramex', 'Strip', 2000, 2500, '', 100),
('A-2226', 'Konidin', 'Strip', 2000, 2500, '', 95),
('A-2310', 'Aspirin', 'Strip', 1800, 2500, '', 98),
('A-4442', 'Decolgen', 'Strip', 2200, 2500, '', 99),
('B-2196', 'Dancow', 'Kaleng 1Kg', 48500, 56000, '', 114),
('B-2250', 'Lactamil', 'Kaleng 600gr', 52000, 59000, '', 78),
('B-5012', 'Blue Band', 'Kaleng 500gr', 17500, 21000, '', 108),
('C-0101', 'Indomie Goreng', 'Dus', 43000, 48000, '', 94),
('C-2298', 'Mie Sedap', 'Dus', 41000, 46500, '', 91),
('D-2232', 'Sampoerna Mild', 'Bungkus', 17500, 20000, '', 83),
('D-2304', 'Dunhill 20', 'Bungkus', 17600, 23000, '', 101),
('D-3201', 'Surya 16', 'Bungkus', 17900, 20000, '', 95),
('F-2286', 'Baygon', 'Kaleng 250ml', 17000, 22000, '', 100),
('G-2208', 'Chetos', 'Dus', 23000, 25000, '', 98),
('G-2274', 'Potato', 'Dus', 24000, 27500, '', 91),
('H-2214', 'Aqua 250ml', 'Dus', 46000, 52000, '', 107),
('H-2262', 'VIT 600ml', 'Dus', 43000, 50000, '', 80),
('K-2190', 'Sapi', 'Ekor', 6500000, 7200000, '', 98),
('K-2244', 'Ayam', 'Ekor', 43000, 52000, '', 103),
('N-2256', 'Honda Mobilio', 'Unit', 216000000, 246000000, '', 90),
('R-2280', 'Yamaha Vixion', 'Unit', 25500000, 28000000, '', 80),
('S-2238', 'Nike Air', 'Set', 325000, 489000, '', 63),
('S-2292', 'Adidas Beckembaur', 'Set', 675000, 899000, '', 88),
('T-2268', 'Sony Vision LED 56', 'Unit', 8500000, 10400000, '', 77),
('W-2220', 'Gamis Batik', 'Pcs', 67000, 110000, '', 76);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
