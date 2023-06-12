-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 05:26 AM
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
-- Database: `barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `nama_barang`, `deskripsi`) VALUES
(0, '', ''),
(1, 'Dompet Wanita', 'Kualitas sangat bagus.'),
(3, 'Sepatu Kerja Pria', 'SePatu dengan desain formal classic modern'),
(4, 'Handbag Wanita', 'Tas dengan ukuran yang mini dan menggunakan kulit premium'),
(5, 'Single Shoulder', 'Tas wanita dengan desain minimalis dan bahan premium'),
(6, 'Sepatu Pantofel Casual', 'Desain modern yang dipadukan dengan kulit kualitas premium. '),
(7, 'Sneakers Pria High Quality', 'Sepatu formal yang cocok dipakai untuk ke kantor dab memiliki warna yang unik.'),
(8, 'Sandal Kulit Wanita', 'Memiliki design yang simple dan nyaman digunakan sehari-hari. '),
(9, 'Sandal Pria', 'Memiliki design simple ddan nyaman dipakai'),
(10, 'Dompet Kulit Pria', 'Menggunakan bahan premium dan design yang elegan.'),
(12, 'dompet wanita', 'kualitas saangat bagus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
