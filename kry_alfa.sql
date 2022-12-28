-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2020 at 06:29 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kry_alfa`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `nik` int(10) NOT NULL,
  `nama_kry` varchar(30) NOT NULL,
  `target_toko` int(12) NOT NULL,
  `sikap` varchar(25) NOT NULL,
  `kecerdasan` varchar(25) NOT NULL,
  `marketing` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`nik`, `nama_kry`, `target_toko`, `sikap`, `kecerdasan`, `marketing`) VALUES
(31450, 'Pajar', 265000000, 'sangat baik', 'baik', 'sangat kurang'),
(31580, 'Fitrah', 317000000, 'sangat kurang', 'kurang', 'baik'),
(31598, 'Cindi', 175000000, 'cukup', 'cukup', 'kurang'),
(31602, 'Kunto', 2000000000, 'sangat kurang', 'kurang', 'baik'),
(31632, 'Aji', 1500000000, 'sangat baik', 'cukup', 'baik');

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `b_target_toko` varchar(4) NOT NULL,
  `b_sikap` varchar(4) NOT NULL,
  `b_kecerdasan` varchar(4) NOT NULL,
  `b_marketing` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`b_target_toko`, `b_sikap`, `b_kecerdasan`, `b_marketing`) VALUES
('0.3', '0.25', '0.25', '0.2');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `nik` int(10) NOT NULL,
  `nama_kry` varchar(30) NOT NULL,
  `total` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`nik`, `nama_kry`, `total`) VALUES
(31450, 'Pajar', '0.73'),
(31580, 'Fitrah', '0.615'),
(31598, 'Cindi', '0.558'),
(31602, 'Kunto', '0.675'),
(31632, 'Aji', '0.938');

-- --------------------------------------------------------

--
-- Table structure for table `konversi`
--

CREATE TABLE `konversi` (
  `id_konversi` int(11) NOT NULL,
  `targetKonversi` int(1) NOT NULL,
  `sikapKonversi` int(1) NOT NULL,
  `kecerdasanKonversi` int(1) NOT NULL,
  `marketingKonversi` int(1) NOT NULL,
  `nama_kry` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konversi`
--

INSERT INTO `konversi` (`id_konversi`, `targetKonversi`, `sikapKonversi`, `kecerdasanKonversi`, `marketingKonversi`, `nama_kry`) VALUES
(31450, 3, 5, 4, 1, 'Pajar'),
(31580, 4, 1, 2, 4, 'Fitrah'),
(31598, 2, 3, 3, 2, 'Cindi'),
(31602, 5, 1, 2, 4, 'Kunto'),
(31632, 5, 5, 3, 4, 'Aji');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `konversi`
--
ALTER TABLE `konversi`
  ADD PRIMARY KEY (`id_konversi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konversi`
--
ALTER TABLE `konversi`
  MODIFY `id_konversi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31633;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
