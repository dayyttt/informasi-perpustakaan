-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2023 at 08:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nis` char(10) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(32) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `gambar` varchar(64) NOT NULL,
  `dibuat_pada` varchar(64) NOT NULL,
  `diedit_pada` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nis`, `username`, `password`, `nama`, `alamat`, `telepon`, `tanggal_lahir`, `jenis_kelamin`, `kelas_id`, `gambar`, `dibuat_pada`, `diedit_pada`) VALUES
(1, '90193121', 'dayat123', '$2y$10$fOmmdO8u3MZVG6KJr9.1cOxHJC8MvNdqYX/SVqY9nbo7h8n2jv7am', 'dayat', 'sasas', '0903382383', '2000-11-11', 'Laki-laki', 2, 'default.png', '1679555389', '1679555389');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `isbn` varchar(64) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `pengarang` varchar(128) NOT NULL,
  `penerbit` varchar(128) NOT NULL,
  `tahun_terbit` char(4) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `lokasi_id` int(11) NOT NULL,
  `total_halaman` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `sampul` varchar(64) NOT NULL,
  `peminat` int(11) DEFAULT NULL,
  `dibuat_pada` varchar(64) NOT NULL,
  `diedit_pada` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buku_hilang`
--

CREATE TABLE `buku_hilang` (
  `id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catatan_pengguna`
--

CREATE TABLE `catatan_pengguna` (
  `id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `isi_catatan` text NOT NULL,
  `dibuat_pada` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id` int(11) NOT NULL,
  `besaran_denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`id`, `besaran_denda`) VALUES
(1, 500);

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id` int(11) NOT NULL,
  `peminjaman_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_dikembalikan` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman_guru`
--

CREATE TABLE `detail_peminjaman_guru` (
  `id` int(11) NOT NULL,
  `peminjaman_guru_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_dikembalikan` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `pend_terakhir` varchar(20) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `dibuat_pada` varchar(64) NOT NULL,
  `diedit_pada` varchar(64) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `nip`, `tanggal_lahir`, `alamat`, `telepon`, `pend_terakhir`, `jenis_kelamin`, `dibuat_pada`, `diedit_pada`, `username`, `password`, `gambar`) VALUES
(2, 'diaana11', '23213113', '2023-01-04', 'jl. sdmslkds', '121342323', 'S2', 'Perempuan', '1673929278', '1673929278', 'dianaaa', '$2y$10$90TUnYslkcmc.438qhCkTO.wOdmZMffBge1AiEx02pTR4MJ3kv9SC', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int(11) NOT NULL,
  `nama_perpustakaan` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `website` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `tentang` text NOT NULL,
  `dibuat_pada` varchar(64) NOT NULL,
  `diedit_pada` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `nama_perpustakaan`, `alamat`, `website`, `email`, `tentang`, `dibuat_pada`, `diedit_pada`) VALUES
(1, 'Perpustakaan 15 Maluku Tengah', 'Jl. Puncak Sugiarto', 'https://perpussmalibes.com', 'ngawiperpus@gmail.com', 'Perpustakaan sekolah yang bertujuan untuk meminjamkan buku kepada siswa dan siswi sebagai usaha sekolah agar memperdalam literasi membaca buku. Perpustakaan ini juga mengelola dan merawat buku lama dan baru.', '1679554786', '1679555217');

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id` int(11) NOT NULL,
  `tabel_id` varchar(32) DEFAULT NULL,
  `besaran_kas` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `tipe_kas` enum('pemasukan','pengeluaran') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_anggota`
--

CREATE TABLE `kelas_anggota` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas_anggota`
--

INSERT INTO `kelas_anggota` (`id`, `nama_kelas`) VALUES
(1, 'X 1'),
(2, 'X 2'),
(3, 'X 3');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_buku`
--

CREATE TABLE `lokasi_buku` (
  `id` int(11) NOT NULL,
  `nama_lokasi` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `isi_notifikasi` text NOT NULL,
  `dibuat_pada` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE `online` (
  `id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `type` varchar(32) NOT NULL,
  `terakhir_dilihat` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `batas_pengembalian` date NOT NULL,
  `tanggal_dikembalikan` date DEFAULT NULL,
  `denda` int(11) NOT NULL,
  `denda_dibayarkan` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_guru`
--

CREATE TABLE `peminjaman_guru` (
  `id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `batas_pengembalian` date NOT NULL,
  `tanggal_dikembalikan` date DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `denda_dibayarkan` int(11) NOT NULL,
  `pengguna_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman_guru`
--

INSERT INTO `peminjaman_guru` (`id`, `guru_id`, `tanggal_peminjaman`, `batas_pengembalian`, `tanggal_dikembalikan`, `denda`, `denda_dibayarkan`, `pengguna_id`, `status`) VALUES
(1, 2, '2023-01-17', '2023-03-14', NULL, NULL, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `telepon` varchar(32) NOT NULL,
  `role` enum('admin','petugas') NOT NULL,
  `dibuat_pada` varchar(64) NOT NULL,
  `diedit_pada` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `nama`, `alamat`, `jenis_kelamin`, `telepon`, `role`, `dibuat_pada`, `diedit_pada`) VALUES
(1, 'admin', '$2y$10$bzSGM6YizIjYcMo6Ol9q.O7io.Esm9KMjrwGCWEgc.oakdFCM9EZi', 'Hidayat Syahidin Ambo', 'Jl. Pancasila', 'Laki-laki', '81234567890', 'admin', '1679554786', '1679555255');

-- --------------------------------------------------------

--
-- Table structure for table `rombongan`
--

CREATE TABLE `rombongan` (
  `id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `batas_pengembalian` date NOT NULL,
  `tanggal_dikembalikan` date DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `denda_dibayarkan` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `pengguna_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rombongan`
--

INSERT INTO `rombongan` (`id`, `anggota_id`, `kelas_id`, `tanggal_peminjaman`, `batas_pengembalian`, `tanggal_dikembalikan`, `denda`, `denda_dibayarkan`, `status`, `pengguna_id`) VALUES
(8, 3, 3, '2023-01-17', '2023-03-14', NULL, 2000, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama_sub_kategori` varchar(200) NOT NULL,
  `kode_sub_kategori` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_kategori`
--

INSERT INTO `sub_kategori` (`id`, `kategori_id`, `nama_sub_kategori`, `kode_sub_kategori`) VALUES
(2, 1, 'Bahasa arab2', '492.3'),
(5, 1, 'Akidah Ahklak', '492.2'),
(7, 1, 'Bahasa arab1', '492.9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas` (`kelas_id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori` (`kategori_id`),
  ADD KEY `lokasi` (`lokasi_id`);

--
-- Indexes for table `buku_hilang`
--
ALTER TABLE `buku_hilang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_id` (`buku_id`);

--
-- Indexes for table `catatan_pengguna`
--
ALTER TABLE `catatan_pengguna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengguna_id` (`pengguna_id`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `judul_buku` (`buku_id`),
  ADD KEY `transaksi_id` (`peminjaman_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas_anggota`
--
ALTER TABLE `kelas_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi_buku`
--
ALTER TABLE `lokasi_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggota_id` (`anggota_id`),
  ADD KEY `pengguna_id` (`pengguna_id`);

--
-- Indexes for table `peminjaman_guru`
--
ALTER TABLE `peminjaman_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rombongan`
--
ALTER TABLE `rombongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buku_hilang`
--
ALTER TABLE `buku_hilang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catatan_pengguna`
--
ALTER TABLE `catatan_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas_anggota`
--
ALTER TABLE `kelas_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lokasi_buku`
--
ALTER TABLE `lokasi_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online`
--
ALTER TABLE `online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `peminjaman_guru`
--
ALTER TABLE `peminjaman_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rombongan`
--
ALTER TABLE `rombongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
