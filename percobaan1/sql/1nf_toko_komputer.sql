-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2023 pada 10.31
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1nf_toko_komputer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `faskes`
--

CREATE TABLE `faskes` (
  `id_faskes` int(11) NOT NULL,
  `nama_faskes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faskes`
--

INSERT INTO `faskes` (`id_faskes`, `nama_faskes`) VALUES
(1, 'Puskesmas'),
(2, 'Apotek'),
(3, 'Rumah Sakit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kis`
--

CREATE TABLE `kis` (
  `no_kartu` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `id_fakes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kis`
--

INSERT INTO `kis` (`no_kartu`, `nik`, `id_fakes`) VALUES
(1, 12127601, 1),
(2, 12127602, 2),
(3, 12127603, 3),
(4, 12127604, 4),
(5, 12127605, 5),
(6, 12127606, 6),
(7, 12127607, 7),
(8, 12127608, 8),
(9, 12127609, 9),
(10, 12127610, 10),
(11, 12127611, 11),
(12, 12127612, 12),
(13, 12127613, 13),
(14, 12127614, 14),
(15, 12127615, 15),
(16, 12127616, 16),
(17, 12127617, 17),
(18, 12127618, 18),
(19, 12127619, 19),
(20, 12127620, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `warga`
--

CREATE TABLE `warga` (
  `nik` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `warga`
--

INSERT INTO `warga` (`nik`, `nama`, `alamat`, `tanggal_lahir`) VALUES
(12127601, 'Joko', 'Cirebon', '0000-00-00'),
(12127602, 'Widodo', 'Bandung', '0000-00-00'),
(12127603, 'Doni', 'Jakarta', '0000-00-00'),
(12127604, 'Siti', 'Cirebon', '0000-00-00'),
(12127605, 'Layla', 'Bali', '0000-00-00'),
(12127606, 'Kaesya', 'Jakarta', '0000-00-00'),
(12127607, 'Bruno', 'Jakarta', '0000-00-00'),
(12127608, 'Cici', 'Cirebon', '0000-00-00'),
(12127609, 'Farsa', 'Cirebon', '0000-00-00'),
(12127610, 'Benno', 'Jogja', '0000-00-00'),
(12127611, 'Ibnu', 'Ciamis', '0000-00-00'),
(12127612, 'Faizal', 'Cianjur', '0000-00-00'),
(12127613, 'Bainun', 'Semarang', '0000-00-00'),
(12127614, 'Munim', 'Bogor', '0000-00-00'),
(12127615, 'Cakra', 'Ciamis', '0000-00-00'),
(12127616, 'Rafli', 'Cirebon', '0000-00-00'),
(12127617, 'Intan', 'Cirebon', '0000-00-00'),
(12127618, 'Fajri', 'Kuningan', '0000-00-00'),
(12127619, 'Nabila', 'Kuningan', '0000-00-00'),
(12127620, 'Ahmad', 'Bandung', '0000-00-00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
