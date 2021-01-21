-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2021 at 02:55 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(35) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'IRFAN SHOLEH', 'irfansholeh2001@gmail.com', '363586fd7ea030c932e395cdd11150ba7a5985e6'),
(2, 'sholeh', 'sholeh@gmail.com', '363586fd7ea030c932e395cdd11150ba7a5985e6');

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `antrian_id` int(35) NOT NULL,
  `no_antrian` int(100) NOT NULL,
  `nim` varchar(35) NOT NULL,
  `bagian_id` int(35) NOT NULL,
  `keperluan` text NOT NULL,
  `status` enum('tunggu','dipanggil','selesai') NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`antrian_id`, `no_antrian`, `nim`, `bagian_id`, `keperluan`, `status`, `tanggal`) VALUES
(5, 2, '1901117', 2, 'Bayar Ukt', 'selesai', '2021-01-20 01:00:04'),
(8, 3, '1901110', 2, 'Bayar Ukt', 'dipanggil', '2021-01-20 01:00:04'),
(9, 4, '1901116', 2, 'Bayar Ukt', 'tunggu', '2021-01-20 01:00:04'),
(10, 1, '1901119', 3, 'bayar ukt mamang', 'tunggu', '2021-01-21 01:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `bagian_id` int(35) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('ready','break') NOT NULL DEFAULT 'break'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`bagian_id`, `name`, `status`) VALUES
(1, 'Umum Angkot', 'break'),
(2, 'Jurusan', 'ready'),
(3, 'Keuangan', 'ready');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(35) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `name`, `email`, `password`) VALUES
('1901110', 'Sholeh', 'sholeh@gmail.com', 'd12f14157c21b39cc8cc257dc5662f34217524f9'),
('1901116', 'Irfan sholeh', 'irfgmail.com', 'd12f14157c21b39cc8cc257dc5662f34217524f9'),
('1901117', 'Irfan irf', 'irfansholeh2001@gmail.com', 'd12f14157c21b39cc8cc257dc5662f34217524f9'),
('1901119', 'Irfan', 'irfan@gmail.com', 'd12f14157c21b39cc8cc257dc5662f34217524f9');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(35) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `email`, `password`) VALUES
(1, 'irfan Sholeh', 'irfan@sawala.com', 'd12f14157c21b39cc8cc257dc5662f34217524f9'),
(2, 'Irfan', 'irfansholeh2001@gmail.com', 'd12f14157c21b39cc8cc257dc5662f34217524f9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`antrian_id`);

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`bagian_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `antrian_id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `bagian_id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
