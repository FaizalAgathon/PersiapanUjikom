-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 03:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ujikom_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `faskes`
--

CREATE TABLE `faskes` (
  `idFaskes` int(50) NOT NULL,
  `namaFaskes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faskes`
--

INSERT INTO `faskes` (`idFaskes`, `namaFaskes`) VALUES
(4, 'JETIS'),
(5, 'DRAJAT'),
(6, 'SUMBER'),
(7, 'GUNUNG DJATI');

-- --------------------------------------------------------

--
-- Table structure for table `kis`
--

CREATE TABLE `kis` (
  `noKIS` varchar(255) NOT NULL,
  `nikWarga` varchar(255) NOT NULL,
  `idFaskes` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kis`
--

INSERT INTO `kis` (`noKIS`, `nikWarga`, `idFaskes`) VALUES
('375040756131', '3274051601060001', 4),
('928833987821', '3274051601060001', 7);

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `nikWarga` varchar(255) NOT NULL,
  `namaWarga` varchar(255) NOT NULL,
  `tglLahirWarga` date NOT NULL,
  `alamatWarga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`nikWarga`, `namaWarga`, `tglLahirWarga`, `alamatWarga`) VALUES
('3274051601060001', 'Mohamad Faizal ', '2006-01-16', 'JL.CIPTO GG.TERATE NO.144'),
('3274051601060002', 'Ahmad Akhtar Rafisqi', '2020-11-24', 'JL.CIPTO GG.TERATE NO.144');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faskes`
--
ALTER TABLE `faskes`
  ADD PRIMARY KEY (`idFaskes`);

--
-- Indexes for table `kis`
--
ALTER TABLE `kis`
  ADD PRIMARY KEY (`noKIS`),
  ADD KEY `fk_kis_nik` (`nikWarga`),
  ADD KEY `fk_kis_faskes` (`idFaskes`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`nikWarga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faskes`
--
ALTER TABLE `faskes`
  MODIFY `idFaskes` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kis`
--
ALTER TABLE `kis`
  ADD CONSTRAINT `fk_kis_faskes` FOREIGN KEY (`idFaskes`) REFERENCES `faskes` (`idFaskes`),
  ADD CONSTRAINT `fk_kis_nik` FOREIGN KEY (`nikWarga`) REFERENCES `warga` (`nikWarga`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
