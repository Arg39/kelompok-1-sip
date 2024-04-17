-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2024 at 02:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dp_sip`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `alamat` tinytext NOT NULL,
  `telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `jenis_kelamin`, `alamat`, `telp`) VALUES
(1, 'Haikal', 'Perempuan', 'Tirto', '097986');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `isbn` varchar(45) NOT NULL,
  `pengarang` varchar(128) NOT NULL,
  `penerbit` varchar(128) NOT NULL,
  `id_kategori` varchar(5) NOT NULL,
  `kode_rak` varchar(10) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `tahun_terbit`, `jumlah`, `isbn`, `pengarang`, `penerbit`, `id_kategori`, `kode_rak`, `gambar`) VALUES
(6, 'Harry Potter', 2016, 12, '978-0-545-01022-1', 'J.K Rowling', 'Gramedia', 'BJKYQ', 'R001', '65f6e2fe304c2-harry-potter.jpg'),
(7, 'Naruto Shippuden', 2016, 45, '978-9-3354-5930-1', 'Masashi Kishimoto', 'Gramedia', 'BJKYQ', 'R002', '65f6e54a97c5f-naruto.jpeg'),
(8, 'Harry Potter & Prisoner', 2020, 12, '978-0-7352-6590-5', 'J.K Rowling', 'Gramedia', 'BJKYQ', 'R003', '65f6ec2832ace-azkaban.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` varchar(5) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
('BJKYQ', 'Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `peminjaman_id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `alamat` tinytext NOT NULL,
  `role` enum('super_admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `username`, `password`, `nama`, `telp`, `alamat`, `role`) VALUES
(1, 'admin', 'admin', 'admin', '08123456789', 'Surabaya', 'super_admin'),
(2, 'sabina', 'sabina', 'Sabina', '089539140353', 'Brebes', 'user'),
(3, 'nasyath', 'faykar30', 'nasyath', '08808213786', 'Tirto', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `kode` varchar(10) NOT NULL,
  `lokasi` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`kode`, `lokasi`) VALUES
('R001', 'Rak Supernatural'),
('R002', 'Rak Fantasy 1'),
('R003', 'Rak Psychological');

-- --------------------------------------------------------

--
-- Table structure for table `trans_peminjaman`
--

CREATE TABLE `trans_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trans_pengembalian`
--

CREATE TABLE `trans_pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_rak` (`kode_rak`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggota_id` (`anggota_id`),
  ADD KEY `petugas_id` (`petugas_id`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_id` (`peminjaman_id`),
  ADD KEY `anggota_id` (`anggota_id`),
  ADD KEY `petugas_id` (`petugas_id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`kode`),
  ADD UNIQUE KEY `lokasi` (`lokasi`) USING HASH;

--
-- Indexes for table `trans_peminjaman`
--
ALTER TABLE `trans_peminjaman`
  ADD KEY `id_peminjaman` (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `trans_pengembalian`
--
ALTER TABLE `trans_pengembalian`
  ADD KEY `id_pengembalian` (`id_pengembalian`),
  ADD KEY `id_buku` (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kode_rak`) REFERENCES `rak` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengembalian_ibfk_3` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trans_peminjaman`
--
ALTER TABLE `trans_peminjaman`
  ADD CONSTRAINT `trans_peminjaman_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id`),
  ADD CONSTRAINT `trans_peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`);

--
-- Constraints for table `trans_pengembalian`
--
ALTER TABLE `trans_pengembalian`
  ADD CONSTRAINT `trans_pengembalian_ibfk_1` FOREIGN KEY (`id_pengembalian`) REFERENCES `pengembalian` (`id`),
  ADD CONSTRAINT `trans_pengembalian_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
