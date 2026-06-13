-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307:3307
-- Generation Time: Jun 12, 2026 at 06:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `id_penulis` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `hari_tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `id_penulis`, `id_kategori`, `judul`, `isi`, `gambar`, `hari_tanggal`) VALUES
(1, 2, 1, 'memasak', 'tutorial memasak sederhana', 'artikel_69f2259b7df882.65930821.jpeg', 'Rabu, 29 April 2026 | 22:36'),
(2, 2, 1, 'Tips Menulis Artikel Blog', 'Menulis artikel blog yang baik dimulai dari menentukan topik, membuat kerangka tulisan, lalu menyusun pembuka yang menarik. Setelah itu, isi artikel dapat dikembangkan dengan bahasa yang sederhana agar mudah dipahami pembaca.', 'artikel_69f2259b7df882.65930821.jpeg', 'Kamis, 30 April 2026 | 09:15'),
(3, 3, 2, 'Uji Coba Tampilan CMS', 'Artikel ini digunakan untuk menguji tampilan halaman pengunjung, mulai dari daftar artikel, tombol kelanjutannya, hingga halaman detail artikel. Data contoh ini membantu proses demonstrasi fitur pada video UAS.', 'artikel_69f2259b7df882.65930821.jpeg', 'Jumat, 01 Mei 2026 | 10:20'),
(4, 2, 1, 'Panduan Mengelola Kategori', 'Kategori membantu pembaca menemukan artikel sesuai minat. Pada aplikasi blog, kategori dapat dibuat, diperbarui, dan dihapus melalui halaman CMS selama kategori tersebut belum digunakan oleh artikel.', 'artikel_69f2259b7df882.65930821.jpeg', 'Sabtu, 02 Mei 2026 | 13:30'),
(5, 3, 2, 'Menguji Halaman Detail Artikel', 'Halaman detail artikel menampilkan judul, tanggal, penulis, kategori, gambar, dan isi lengkap artikel. Di bagian samping terdapat daftar artikel terkait yang berasal dari kategori yang sama.', 'artikel_69f2259b7df882.65930821.jpeg', 'Minggu, 03 Mei 2026 | 15:45'),
(6, 2, 1, 'Tutorial Membuat Konten Blog', 'Konten blog yang rapi memerlukan judul yang jelas, isi yang terstruktur, dan gambar pendukung. Dengan CMS, penulis dapat memperbarui konten kapan saja sehingga blog tetap aktif dan informatif.', 'artikel_69f2259b7df882.65930821.jpeg', 'Senin, 04 Mei 2026 | 08:10');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_artikel`
--

CREATE TABLE `kategori_artikel` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id`, `nama_kategori`, `keterangan`) VALUES
(1, 'tutorial', ''),
(2, 'uji coba', '');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id`, `nama_depan`, `nama_belakang`, `user_name`, `password`, `foto`) VALUES
(2, 'irzya', 'tirtana', 'irzya tirtana', '$2y$10$W19ORtubLuOoKZtaSJtFDuvxgHDiBrMbvwOeLUkf.sdeBjqaSMbg6', 'foto_69f2251e4fd187.33637850.png'),
(3, 'muhammad', 'irzya', 'muhammad irzya', '$2y$10$K1zYSsLvz2WzSDgicvAWGe8U8EUk46sle1e32Dc9anjvOYwvz64cK', 'foto_69f2254ab9e700.14350313.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_artikel_penulis` (`id_penulis`),
  ADD KEY `fk_artikel_kategori` (`id_kategori`);

--
-- Indexes for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_nama_kategori` (`nama_kategori`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `fk_artikel_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_artikel` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_artikel_penulis` FOREIGN KEY (`id_penulis`) REFERENCES `penulis` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
