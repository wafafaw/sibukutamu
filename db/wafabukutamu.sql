-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 05:00 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wafabukutamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `no` int(11) NOT NULL,
  `user` varchar(25) NOT NULL,
  `pass` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`no`, `user`, `pass`) VALUES
(1, 'nurajijahwafa@gmail.com', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `no` int(11) NOT NULL,
  `tanggal` varchar(25) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `instansi` varchar(80) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(50) NOT NULL,
  `kepentingan` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`no`, `tanggal`, `nama`, `instansi`, `alamat`, `nohp`, `kepentingan`, `tujuan`) VALUES
(21, '01-02-2024', 'Nadia', 'SMKN 1 Rongga', 'Kp. Nagrog', '087823865432', 'Koordinasi PKL', 'Bimbingan PKL'),
(32, '28-03-2024', 'Wafa', 'SMKN 1 Rongga', 'Kp. Nagrogg', '083822490866', 'Penjemputan PKL', 'Bimbingan Program'),
(36, '29-02-2024', 'Wafa Nurajijah', 'SMKN 1 Rongga', 'Kp. Nagrog', '088321345679', 'Koordinasi PKL', 'Bimbingan PKL'),
(37, '29-02-2024', 'desi', 'BSIP', 'Sela Awi', '088321345679', 'Koordinasi PKL', 'Bimbingan PKL'),
(38, '04-03-2024', 'Siti maesaroh', 'BSIP', 'Kp. Cibogo', '088321345679', 'Koordinasi PKL', 'Bimbingan PKL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
