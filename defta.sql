-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2019 at 04:29 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `defta`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_dpd`
--

CREATE TABLE `calon_dpd` (
  `id` int(11) NOT NULL,
  `nama` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon_dpd`
--

INSERT INTO `calon_dpd` (`id`, `nama`) VALUES
(1, 'Ir. H. ABDUL AZIZ ADYAS, S.H.'),
(2, 'KH. Ir. ABDUL HAKIM, M.M.'),
(3, 'A. BEN BELLA'),
(4, 'Drs. AHMAD BASTIAN SY'),
(5, 'AKHMAD HIDAYAT, S.sos.,M.M.'),
(6, 'AMIR FAISAL SANZAYA'),
(7, 'Ir. ANANG PRIHANTORO'),
(8, 'Dr. H. ANDI SURYA'),
(9, 'H. BUSTAMI ZAINUDIN, S.pd.,M.H.'),
(10, 'DEWI PRATIWI MANDIRI'),
(11, 'HERMAN SISMONO, S.Sos.M.A.P.'),
(12, 'Hj. IDA JAYA, S.E.,M.M.'),
(13, 'I GEDE SUDIATMAJA, S.H.'),
(14, 'ISMUN ALI, M.Pd.I'),
(15, 'Ir. JAMHARI HADIPURWANTA, M.P.'),
(16, 'dr. JIHAN NURLELA'),
(17, 'M. ALZIER DIANIS THABRANIE, S.E., S.H'),
(18, 'H. MARSIDI HASAN'),
(19, 'NAZARUDIN, S.I.P.'),
(20, 'NURLITA ZUBAEDAH, S.E.'),
(21, 'H. OLFI ANWARI, S.E.'),
(22, 'TATANG SUMANTRI'),
(23, 'TAUFIK HIDAYAT'),
(24, 'UMAR SYAH HS, S.I.P.'),
(25, 'YANTI, S.I.P.');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten_kota`
--

CREATE TABLE `kabupaten_kota` (
  `id` int(11) NOT NULL,
  `dapil` int(11) NOT NULL,
  `kabupaten_kota` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kabupaten_kota`
--

INSERT INTO `kabupaten_kota` (`id`, `dapil`, `kabupaten_kota`) VALUES
(1, 1, 'LAMPUNG SELATAN'),
(2, 2, 'BANDAR LAMPUNG'),
(3, 3, 'METRO'),
(4, 3, 'PESAWARAN'),
(5, 3, 'PRINGSEWU'),
(6, 4, 'TANGGAMUS'),
(7, 4, 'LAMPUNG BARAT'),
(8, 4, 'PESISIR BARAT'),
(9, 5, 'LAMPUNG UTARA'),
(10, 5, 'WAY KANAN'),
(11, 6, 'TULANG BAWANG'),
(12, 6, 'TULANG BAWANG BARAT'),
(13, 6, 'MESUJI'),
(14, 7, 'LAMPUNG TENGAH'),
(15, 8, 'LAMPUNG TIMUR');

-- --------------------------------------------------------

--
-- Table structure for table `partai`
--

CREATE TABLE `partai` (
  `id` int(11) NOT NULL,
  `nama` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partai`
--

INSERT INTO `partai` (`id`, `nama`) VALUES
(1, 'PARTAI GERAKAN INDONESIA RAYA'),
(2, 'PARTAI KEADILAN SEJAHTERA'),
(3, 'PARTAI KEBANGKITAN BANGSA'),
(4, 'PDI-PERJUANGAN'),
(5, 'GOLONGAN KARYA'),
(6, 'PARTAI NASDEM'),
(7, 'PARTAI GARUDA'),
(8, 'PARTAI BERKARYA'),
(9, 'PARTAI PERINDO'),
(10, 'PARTAI PERSATUAN PEMBANGUNAN'),
(11, 'PARTAI SOLIDARITAS INDONESIA'),
(12, 'PARTAI AMANAT NASIONAL'),
(13, 'PARTAI HANURA'),
(14, 'PARTAI DEMOKRAT'),
(15, 'PARTAI BULAN BINTANG'),
(16, 'PKPI');

-- --------------------------------------------------------

--
-- Table structure for table `suara_dpd`
--

CREATE TABLE `suara_dpd` (
  `id_kabupaten_kota` int(11) NOT NULL,
  `id_calon_dpd` int(11) NOT NULL,
  `sah` int(11) NOT NULL,
  `tidak_sah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suara_dprd`
--

CREATE TABLE `suara_dprd` (
  `id_kabupaten_kota` int(11) NOT NULL,
  `id_partai` int(11) NOT NULL,
  `sah` int(11) NOT NULL,
  `tidak_sah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_dpd`
--
ALTER TABLE `calon_dpd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabupaten_kota`
--
ALTER TABLE `kabupaten_kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partai`
--
ALTER TABLE `partai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suara_dpd`
--
ALTER TABLE `suara_dpd`
  ADD PRIMARY KEY (`id_kabupaten_kota`,`id_calon_dpd`),
  ADD KEY `id_calon_dpd` (`id_calon_dpd`);

--
-- Indexes for table `suara_dprd`
--
ALTER TABLE `suara_dprd`
  ADD PRIMARY KEY (`id_kabupaten_kota`,`id_partai`),
  ADD KEY `id_partai` (`id_partai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon_dpd`
--
ALTER TABLE `calon_dpd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kabupaten_kota`
--
ALTER TABLE `kabupaten_kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `partai`
--
ALTER TABLE `partai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `suara_dpd`
--
ALTER TABLE `suara_dpd`
  ADD CONSTRAINT `suara_dpd_ibfk_1` FOREIGN KEY (`id_calon_dpd`) REFERENCES `calon_dpd` (`id`),
  ADD CONSTRAINT `suara_dpd_ibfk_2` FOREIGN KEY (`id_kabupaten_kota`) REFERENCES `kabupaten_kota` (`id`);

--
-- Constraints for table `suara_dprd`
--
ALTER TABLE `suara_dprd`
  ADD CONSTRAINT `suara_dprd_ibfk_1` FOREIGN KEY (`id_partai`) REFERENCES `partai` (`id`),
  ADD CONSTRAINT `suara_dprd_ibfk_2` FOREIGN KEY (`id_kabupaten_kota`) REFERENCES `kabupaten_kota` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
