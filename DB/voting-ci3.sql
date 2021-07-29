-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 29, 2021 at 03:20 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting-ci3`
--

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE `kandidat` (
  `id_kandidat` int(11) NOT NULL,
  `nama_kandidat` varchar(100) NOT NULL,
  `no_kandidat` varchar(20) NOT NULL,
  `foto_kandidat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`id_kandidat`, `nama_kandidat`, `no_kandidat`, `foto_kandidat`) VALUES
(1, 'harun', 'asd', 'ridho_ssss_20200611_000934_0.jpg'),
(3, 'Gani - Dani', 'DMHAsJ3kjXYVpub72ioS', '2194c905c48da7079a6c8a5d92bf842f.png');

-- --------------------------------------------------------

--
-- Table structure for table `pemilih`
--

CREATE TABLE `pemilih` (
  `id_pemilih` int(11) NOT NULL,
  `nama_pemilih` varchar(100) DEFAULT NULL,
  `jenkel` enum('W','P') DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status_pemilih` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemilih`
--

INSERT INTO `pemilih` (`id_pemilih`, `nama_pemilih`, `jenkel`, `username`, `password`, `status_pemilih`) VALUES
(1, 'Safitri', 'W', 'safitri', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
(2, 'Dani Saputra', 'P', 'dani123', '8fc828b696ba1cd92eab8d0a6ffb17d6', NULL),
(3, 'Harun Saputra', 'P', 'harun123', '6f1faa616614c07e6adb238a329f0541', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`) VALUES
(1, 'Ridho Surya', 'ridho008', '926a161c6419512d711089538c80ac70'),
(2, 'Petugas I', 'petugas2', '202cb962ac59075b964b07152d234b70'),
(5, 'Petugas II', 'petugas1', '202cb962ac59075b964b07152d234b70'),
(6, 'Petugas III', 'petugas3', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `pilih`
--

CREATE TABLE `pilih` (
  `id_pilih` int(11) NOT NULL,
  `id_kandidat` int(11) NOT NULL,
  `id_pemilih` int(11) NOT NULL,
  `tgl_rekam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pilih`
--

INSERT INTO `pilih` (`id_pilih`, `id_kandidat`, `id_pemilih`, `tgl_rekam`) VALUES
(1, 1, 2, '2021-07-07 00:00:00'),
(2, 1, 2, '2021-07-27 16:49:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id_kandidat`);

--
-- Indexes for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`id_pemilih`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `pilih`
--
ALTER TABLE `pilih`
  ADD PRIMARY KEY (`id_pilih`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id_kandidat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemilih`
--
ALTER TABLE `pemilih`
  MODIFY `id_pemilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pilih`
--
ALTER TABLE `pilih`
  MODIFY `id_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
