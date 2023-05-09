-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 04:29 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_personal`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `kode_artikel` char(10) NOT NULL,
  `judul_artikel` varchar(100) NOT NULL,
  `isi_artikel` longtext NOT NULL,
  `gambar` varchar(100) NOT NULL DEFAULT 'gambar_default.png',
  `tanggal` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `kode_artikel`, `judul_artikel`, `isi_artikel`, `gambar`, `tanggal`, `status`, `id_kategori`, `id_pengguna`) VALUES
(135, 'A0001', 'Cristo-Rei', 'Cristo-Rei nu\'udar fatin Relijiozu ba Katoliku sira iha Timor-Leste no mos sai destinasaun turistiku ne\'ebe kunhesidu tebes laos deit iha Dili maibe mos iha Timor laran tomak.\r\n\r\nSuku: Meti-Aut\r\nPostu-Administrativu: Cristo-Rei\r\nMunisipiu: Dili\r\n\r\nKeta haluha mai vizita!!', 'Cristo-Rei.jpg', '2022-11-12 10:25:15', 1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `gambar_kategori` varchar(200) NOT NULL DEFAULT 'gambar_default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `gambar_kategori`) VALUES
(4, 'Fatin Turizmu', '100b0y000000m2auh7408_D_1180_558.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `isi_komentar` text NOT NULL,
  `status_komentar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_artikel`, `nama`, `email`, `isi_komentar`, `status_komentar`) VALUES
(1, 118, 'Aje', 'leo4@gmail.com', 'WEBSITE LADUN DIAK', 1),
(2, 118, 'Cristiano', 'yyhhh@gmail.com', 'stgsgs', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `kode_pengguna` char(9) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `email` varchar(35) NOT NULL,
  `no_telp` char(14) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `kode_pengguna`, `nama_pengguna`, `email`, `no_telp`, `username`, `password`, `status`) VALUES
(22, 'U022', 'Pedro', 'pedromaalres010102@gmail.com', '75783968', 'arcanjo', 'e8567dbe206e0240e06f1edde026be3a', 1),
(23, 'U023', 'Jesuinho', 'aziu@gmail.com', '77889910', 'aziu', 'b4cfcd8f32ebf0cd27efcc0a4ad72d6c', 1),
(24, 'U024', 'Natasha', 'natasha@gmail.com', '78910111', 'tasha', '641497844d85cd76388bca1f14125055', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `nama_website` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`nama_website`) VALUES
('Fatin Turistiku Dili');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD UNIQUE KEY `judul_artikel` (`judul_artikel`),
  ADD KEY `id_artikel` (`id_artikel`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
