-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Mar 2024 pada 08.40
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

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
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `alamat` tinytext NOT NULL,
  `telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
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
  `kode_rak` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` varchar(5) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
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
-- Struktur dari tabel `pengembalian`
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
-- Struktur dari tabel `petugas`
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
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `username`, `password`, `nama`, `telp`, `alamat`, `role`) VALUES
(1, 'admin', 'admin', 'admin', '08123456789', 'Surabaya', 'super_admin'),
(2, 'sabina', 'sabina', 'Sabina', '089539140353', 'Brebes', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak`
--

CREATE TABLE `rak` (
  `kode` varchar(10) NOT NULL,
  `lokasi` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rak`
--

INSERT INTO `rak` (`kode`, `lokasi`) VALUES
('R002', 'Lantai 2'),
('R003', 'Lantai 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_peminjaman`
--

CREATE TABLE `trans_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_pengembalian`
--

CREATE TABLE `trans_pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_rak` (`kode_rak`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggota_id` (`anggota_id`),
  ADD KEY `petugas_id` (`petugas_id`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_id` (`peminjaman_id`),
  ADD KEY `anggota_id` (`anggota_id`),
  ADD KEY `petugas_id` (`petugas_id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `trans_peminjaman`
--
ALTER TABLE `trans_peminjaman`
  ADD KEY `id_peminjaman` (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `trans_pengembalian`
--
ALTER TABLE `trans_pengembalian`
  ADD KEY `id_pengembalian` (`id_pengembalian`),
  ADD KEY `id_buku` (`id_buku`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kode_rak`) REFERENCES `rak` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengembalian_ibfk_3` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `trans_peminjaman`
--
ALTER TABLE `trans_peminjaman`
  ADD CONSTRAINT `trans_peminjaman_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id`),
  ADD CONSTRAINT `trans_peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`);

--
-- Ketidakleluasaan untuk tabel `trans_pengembalian`
--
ALTER TABLE `trans_pengembalian`
  ADD CONSTRAINT `trans_pengembalian_ibfk_1` FOREIGN KEY (`id_pengembalian`) REFERENCES `pengembalian` (`id`),
  ADD CONSTRAINT `trans_pengembalian_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
