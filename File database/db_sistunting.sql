-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2024 at 05:16 PM
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
-- Database: `db_sistunting`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_data_balita`
--

CREATE TABLE `table_data_balita` (
  `id_balita` int(100) NOT NULL,
  `nik` varchar(225) NOT NULL,
  `nama_balita` varchar(225) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `nama_ibu` varchar(225) NOT NULL,
  `nama_ayah` varchar(225) NOT NULL,
  `bb_lahir` float NOT NULL,
  `tb_lahir` float NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_data_balita`
--

INSERT INTO `table_data_balita` (`id_balita`, `nik`, `nama_balita`, `tgl_lahir`, `jenis_kelamin`, `nama_ibu`, `nama_ayah`, `bb_lahir`, `tb_lahir`, `alamat`) VALUES
(1, '123234534343434', 'asyaa', '2023-10-07', 'Perempuan', 'Bila', 'Wawan', 2, 50, 'Bla'),
(33, '123', 'sella', '0000-00-00', 'Perempuan', '', '', 0, 0, ''),
(34, '12334', 'farel', '0000-00-00', 'Laki-Laki', '', '', 0, 0, ''),
(35, '123', 'vivi', '0000-00-00', 'Perempuan', 'asasas', 'grgrg', 0, 0, 'D3'),
(37, '123123', 'ss', '2023-09-27', 'perempuan', 'Cici', 'Coco', 12, 12, 'Jln. Sudirman');

-- --------------------------------------------------------

--
-- Table structure for table `table_data_gejala`
--

CREATE TABLE `table_data_gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` varchar(50) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL,
  `nilai_cf` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_data_gejala`
--

INSERT INTO `table_data_gejala` (`id_gejala`, `kode_gejala`, `nama_gejala`, `nilai_cf`) VALUES
(2, 'G02', 'Nafsu makan sedikit', 0.6),
(3, 'G03', 'Mudah merasa lelah.', 0.6),
(4, 'G04', 'Mudah tersererang penyakit.', 0.6),
(6, 'G05', 'Pertumbuhan gigi melambat.', 0.8),
(7, 'G06', 'Pertumbuhan tulang melambat', 0.8),
(8, 'G07', 'Berat badan di bawah rata-rata', 0.8),
(9, 'G08', 'Wajah lebih muda dari anak seusianya', 0.8),
(10, 'G09', 'Kemampuan fokus dan memori belajar berkurang', 0.6),
(11, 'G10', 'Penambahan tinggi badan kurang optimal untuk anak seusianya', 0.8);

-- --------------------------------------------------------

--
-- Table structure for table `table_data_konsultasi`
--

CREATE TABLE `table_data_konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `nama_balita` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `usia` int(11) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `hasil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_data_konsultasi`
--

INSERT INTO `table_data_konsultasi` (`id_konsultasi`, `nama_balita`, `jenis_kelamin`, `usia`, `tinggi`, `hasil`) VALUES
(2, 'Testing 1', 'Perempuan', 45, 75, '80'),
(4, 'Testing 2', 'Laki-laki', 4, 75, '60');

-- --------------------------------------------------------

--
-- Table structure for table `table_gizi_balita`
--

CREATE TABLE `table_gizi_balita` (
  `id_timbang` int(100) NOT NULL,
  `nama_balita` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(128) NOT NULL,
  `usia` int(225) NOT NULL,
  `berat_badan` float NOT NULL,
  `tinggi_badan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_gizi_balita`
--

INSERT INTO `table_gizi_balita` (`id_timbang`, `nama_balita`, `jenis_kelamin`, `usia`, `berat_badan`, `tinggi_badan`) VALUES
(44, 'Testing', 'Laki-laki', 15, 9.3, 79);

-- --------------------------------------------------------

--
-- Table structure for table `table_indikator_tinggi`
--

CREATE TABLE `table_indikator_tinggi` (
  `id_indikator` int(11) NOT NULL,
  `usia` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `tinggi` float NOT NULL,
  `nilai_cf` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_indikator_tinggi`
--

INSERT INTO `table_indikator_tinggi` (`id_indikator`, `usia`, `jenis_kelamin`, `tinggi`, `nilai_cf`) VALUES
(4, '0-12', 'Perempuan', 66.3, 0.8),
(5, '0-12', 'Laki-laki', 68.6, 0.8),
(6, '13-24', 'Laki-laki', 78, 0.8),
(7, '13-24', 'Perempuan', 76, 0.8),
(8, '25-36', 'Laki-laki', 85, 0.8),
(9, '25-36', 'Perempuan', 83.6, 0.8),
(10, '37-48', 'Laki-laki', 90.7, 0.8),
(11, '37-48', 'Perempuan', 89.8, 0.8),
(12, '49-60', 'Laki-laki', 96.1, 0.8),
(14, '49-60', 'Perempuan', 95.1, 0.8);

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nohp` int(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`id_user`, `nama`, `nohp`, `username`, `password`, `status`) VALUES
(1, 'Administrator', 1234567, 'admin', 'admin', 'Admin'),
(3, 'Guest1', 123456789, 'guest1', '12345', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_data_balita`
--
ALTER TABLE `table_data_balita`
  ADD PRIMARY KEY (`id_balita`);

--
-- Indexes for table `table_data_gejala`
--
ALTER TABLE `table_data_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `table_data_konsultasi`
--
ALTER TABLE `table_data_konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indexes for table `table_gizi_balita`
--
ALTER TABLE `table_gizi_balita`
  ADD PRIMARY KEY (`id_timbang`);

--
-- Indexes for table `table_indikator_tinggi`
--
ALTER TABLE `table_indikator_tinggi`
  ADD PRIMARY KEY (`id_indikator`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_data_balita`
--
ALTER TABLE `table_data_balita`
  MODIFY `id_balita` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `table_data_gejala`
--
ALTER TABLE `table_data_gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table_data_konsultasi`
--
ALTER TABLE `table_data_konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_gizi_balita`
--
ALTER TABLE `table_gizi_balita`
  MODIFY `id_timbang` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `table_indikator_tinggi`
--
ALTER TABLE `table_indikator_tinggi`
  MODIFY `id_indikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
