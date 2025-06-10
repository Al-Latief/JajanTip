-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 20, 2025 at 01:26 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jajantip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`) VALUES
(4, 'admin1', '$2y$10$3/hDKmnYoO3ga1mXMiTnM.A8uuZDWzDaFhzpDRoBd.zY/7L.srCeW');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kontak`
--

CREATE TABLE `tb_kontak` (
  `id_kontak` int NOT NULL,
  `nama_kontak` varchar(255) NOT NULL,
  `email_kontak` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `status_pesan` enum('Terbaca','Belum Terbaca') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_kontak`
--

INSERT INTO `tb_kontak` (`id_kontak`, `nama_kontak`, `email_kontak`, `pesan`, `status_pesan`) VALUES
(1, 'Latip', 'latip@gmail.com', 'Apa kabar? Apakah kamu baik-baik saja?', 'Terbaca'),
(3, 'Alika', 'alika@gmail.com', 'Hayooo. Ngapain sih??', 'Terbaca'),
(4, 'userlatip', 'latip@gmail.com', 'Saya siap untuk lari sepanjang masa.', 'Belum Terbaca');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `username`, `password`) VALUES
(4, 'latip', '$2y$10$BHWk01ZCxw7jSv0bb5I9xupBABkglwn...Xh3fm37P9KRRzicOqbu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `kategori` enum('Makanan','Minuman') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga_produk` int NOT NULL,
  `stok_produk` int NOT NULL,
  `tanggal_ditambahkan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `gambar_produk`, `nama_produk`, `deskripsi_produk`, `kategori`, `harga_produk`, `stok_produk`, `tanggal_ditambahkan`) VALUES
(10, '6781083fca6dc.png', 'Bubur Sumsum', 'Bubur Sumsum ini sudah diedit', 'Minuman', 3000, 150, '2025-01-05'),
(11, '6781086c23c1d.png', 'Es Dawet Ayu', 'Ini Es Dawet Ayu', 'Minuman', 1000, 50, '2025-01-01'),
(12, '67810893be041.png', 'Getuk', 'Makanan dari singkong rebus yang dihaluskan, dicampur gula, dan sering diberi pewarna alami.', 'Makanan', 2000, 500, '2025-01-05'),
(13, '678108c382176.png', 'Grontol', 'Jagung pipil yang direbus hingga empuk, disajikan dengan parutan kelapa dan sedikit garam.', 'Makanan', 4000, 400, '2025-01-04'),
(14, '678108e8c7497.png', 'Jenang', 'Ini Jenang', 'Makanan', 2500, 250, '2025-01-02'),
(15, '67810918b7550.png', 'Kue Mendut', 'Ini Kue Mendut', 'Makanan', 1000, 20, '2025-01-04'),
(16, '678109446ffb7.png', 'Lupis', 'Ini Lupis', 'Makanan', 3500, 100, '2025-01-04'),
(17, '678109a095e0a.png', 'Semar Mendem', 'Ini Semar Mendem', 'Makanan', 5000, 900, '2025-01-05'),
(18, '67810a0a8ab0f.png', 'Tiwul', 'Ini Tiwul', 'Makanan', 2500, 10, '2025-01-04'),
(19, '67810a31b567e.png', 'Wedang Jahe', 'Ini Wedang Jahe', 'Minuman', 5000, 20, '2025-01-04'),
(20, '67811e53b3c5f.png', 'Bajigur', 'Minuman santan dengan gula merah, sering ditambah jahe dan garam, cocok diminum hangat.', 'Minuman', 1000, 25, '2025-01-06'),
(21, '6781d996a137d.png', 'Arem-Arem', 'Mirip dengan lemper, tetapi menggunakan nasi yang diisi dengan isian seperti sambal goreng daging, ayam, atau sayur, lalu dibungkus daun pisang dan dikukus.', 'Makanan', 4000, 60, '2025-01-02'),
(22, '6781da114a89c.png', 'Ketan Bakar', 'Olahan ketan yang dibakar, sering disajikan dengan sambal kelapa pedas atau gula merah cair.', 'Makanan', 1500, 45, '2025-01-06'),
(23, '6781da40347e6.jpg', 'Nogosari', 'Dibuat dari adonan tepung beras dan santan, diisi pisang, lalu dibungkus daun pisang dan dikukus.', 'Makanan', 4500, 10, '2025-01-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_kontak`
--
ALTER TABLE `tb_kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kontak`
--
ALTER TABLE `tb_kontak`
  MODIFY `id_kontak` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
