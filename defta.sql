-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2019 at 05:29 PM
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
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id` varchar(4) NOT NULL,
  `dapil` int(11) NOT NULL,
  `kabupaten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id`, `dapil`, `kabupaten`) VALUES
('1801', 4, 'KABUPATEN LAMPUNG BARAT'),
('1802', 4, 'KABUPATEN TANGGAMUS'),
('1803', 1, 'LAMPUNG SELATAN'),
('1804', 8, 'LAMPUNG TIMUR'),
('1805', 7, 'LAMPUNG TENGAH'),
('1806', 5, 'LAMPUNG UTARA'),
('1807', 5, 'WAY KANAN'),
('1808', 6, 'TULANGBAWANG'),
('1809', 3, 'PESAWARAN'),
('1810', 3, 'PRINGSEWU'),
('1811', 6, 'MESUJI'),
('1812', 6, 'TULANG BAWANG BARAT'),
('1813', 4, 'PESISIR BARAT'),
('1871', 2, 'BANDAR LAMPUNG'),
('1872', 3, 'METRO');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` varchar(7) NOT NULL,
  `id_kabupaten` varchar(4) NOT NULL,
  `kecamatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `id_kabupaten`, `kecamatan`) VALUES
('1801040', '1801', 'BALIK BUKIT'),
('1801041', '1801', 'SUKAU'),
('1801042', '1801', 'LUMBOK SEMINUNG'),
('1801050', '1801', 'BELALAU'),
('1801051', '1801', 'SEKINCAU'),
('1801052', '1801', 'SUOH'),
('1801053', '1801', 'BATU BRAK'),
('1801054', '1801', 'PAGAR DEWA'),
('1801055', '1801', 'BATU KETULIS'),
('1801056', '1801', 'BANDAR NEGERI SUOH'),
('1801060', '1801', 'SUMBER JAYA'),
('1801061', '1801', 'WAY TENONG'),
('1801062', '1801', 'GEDUNG SURIAN'),
('1801063', '1801', 'KEBUN TEBU'),
('1801064', '1801', 'AIR HITAM'),
('1802010', '1802', 'WONOSOBO'),
('1802011', '1802', 'SEMAKA'),
('1802012', '1802', 'BANDAR NEGERI SEMUONG'),
('1802020', '1802', 'KOTA AGUNG'),
('1802021', '1802', 'PEMATANG SAWA'),
('1802022', '1802', 'KOTA AGUNG TIMUR'),
('1802023', '1802', 'KOTA AGUNG BARAT'),
('1802030', '1802', 'PULAU PANGGUNG'),
('1802031', '1802', 'ULUBELU'),
('1802032', '1802', 'AIR NANINGAN'),
('1802040', '1802', 'TALANG PADANG'),
('1802041', '1802', 'SUMBEREJO'),
('1802042', '1802', 'GISTING'),
('1802043', '1802', 'GUNUNG ALIP'),
('1802050', '1802', 'PUGUNG'),
('1802101', '1802', 'BULOK'),
('1802110', '1802', 'CUKUH BALAK'),
('1802111', '1802', 'KELUMBAYAN'),
('1802112', '1802', 'LIMAU'),
('1802113', '1802', 'KELUMBAYAN BARAT'),
('1803060', '1803', 'NATAR'),
('1803070', '1803', 'JATI AGUNG'),
('1803080', '1803', 'TANJUNG BINTANG'),
('1803081', '1803', 'TANJUNG SARI'),
('1803090', '1803', 'KATIBUNG'),
('1803091', '1803', 'MERBAU MATARAM'),
('1803092', '1803', 'WAY SULAN'),
('1803100', '1803', 'SIDOMULYO'),
('1803101', '1803', 'CANDIPURO'),
('1803102', '1803', 'WAY PANJI'),
('1803110', '1803', 'KALIANDA'),
('1803111', '1803', 'RAJABASA'),
('1803120', '1803', 'PALAS'),
('1803121', '1803', 'SRAGI'),
('1803130', '1803', 'PENENGAHAN'),
('1803131', '1803', 'KETAPANG'),
('1803132', '1803', 'BAKAUHENI'),
('1804010', '1804', 'METRO KIBANG'),
('1804020', '1804', 'BATANGHARI'),
('1804030', '1804', 'SEKAMPUNG'),
('1804040', '1804', 'MARGATIGA'),
('1804050', '1804', 'SEKAMPUNG UDIK'),
('1804060', '1804', 'JABUNG'),
('1804061', '1804', 'PASIR SAKTI'),
('1804062', '1804', 'WAWAY KARYA'),
('1804063', '1804', 'MARGA SEKAMPUNG'),
('1804070', '1804', 'LABUHAN MARINGGAI'),
('1804071', '1804', 'MATARAM BARU'),
('1804072', '1804', 'BANDAR SRIBAWONO'),
('1804073', '1804', 'MELINTING'),
('1804074', '1804', 'GUNUNG PELINDUNG'),
('1804080', '1804', 'WAY JEPARA'),
('1804081', '1804', 'BRAJA SLEBAH'),
('1804082', '1804', 'LABUHAN RATU'),
('1804090', '1804', 'SUKADANA'),
('1804091', '1804', 'BUMI AGUNG'),
('1804092', '1804', 'BATANGHARI NUBAN'),
('1804100', '1804', 'PEKALONGAN'),
('1804110', '1804', 'RAMAN UTARA'),
('1804120', '1804', 'PURBOLINGGO'),
('1804121', '1804', 'WAY BUNGUR'),
('1805010', '1805', 'PADANG RATU'),
('1805011', '1805', 'SELAGAI LINGGA'),
('1805012', '1805', 'PUBIAN'),
('1805013', '1805', 'ANAK TUHA'),
('1805014', '1805', 'ANAK RATU AJI'),
('1805020', '1805', 'KALIREJO'),
('1805021', '1805', 'SENDANG AGUNG'),
('1805030', '1805', 'BANGUNREJO'),
('1805040', '1805', 'GUNUNG SUGIH'),
('1805041', '1805', 'BEKRI'),
('1805042', '1805', 'BUMI RATU NUBAN'),
('1805050', '1805', 'TRIMURJO'),
('1805060', '1805', 'PUNGGUR'),
('1805061', '1805', 'KOTA GAJAH'),
('1805070', '1805', 'SEPUTIH RAMAN'),
('1805080', '1805', 'TERBANGGI BESAR'),
('1805081', '1805', 'SEPUTIH AGUNG'),
('1805082', '1805', 'WAY PENGUBUAN'),
('1805090', '1805', 'TERUSAN NUNYAI'),
('1805100', '1805', 'SEPUTIH MATARAM'),
('1805101', '1805', 'BANDAR MATARAM'),
('1805110', '1805', 'SEPUTIH BANYAK'),
('1805111', '1805', 'WAY SEPUTIH'),
('1805120', '1805', 'RUMBIA'),
('1805121', '1805', 'BUMI NABUNG'),
('1805122', '1805', 'PUTRA RUMBIA'),
('1805130', '1805', 'SEPUTIH SURABAYA'),
('1805131', '1805', 'BANDAR SURABAYA'),
('1806010', '1806', 'BUKIT KEMUNING'),
('1806011', '1806', 'ABUNG TINGGI'),
('1806020', '1806', 'TANJUNG RAJA'),
('1806030', '1806', 'ABUNG BARAT'),
('1806031', '1806', 'ABUNG TENGAH'),
('1806032', '1806', 'ABUNG  KUNANG'),
('1806033', '1806', 'ABUNG PEKURUN'),
('1806040', '1806', 'KOTABUMI'),
('1806041', '1806', 'KOTABUMI UTARA'),
('1806042', '1806', 'KOTABUMI SELATAN'),
('1806050', '1806', 'ABUNG SELATAN'),
('1806051', '1806', 'ABUNG SEMULI'),
('1806052', '1806', 'BLAMBANGAN PAGAR'),
('1806060', '1806', 'ABUNG TIMUR'),
('1806061', '1806', 'ABUNG SURAKARTA'),
('1806070', '1806', 'SUNGKAI SELATAN'),
('1806071', '1806', 'MUARA SUNGKAI'),
('1806072', '1806', 'BUNGA MAYANG'),
('1806073', '1806', 'SUNGKAI  BARAT'),
('1806074', '1806', 'SUNGKAI JAYA'),
('1806080', '1806', 'SUNGKAI UTARA'),
('1806081', '1806', 'HULUSUNGKAI'),
('1806082', '1806', 'SUNGKAI TENGAH'),
('1807010', '1807', 'BANJIT'),
('1807020', '1807', 'BARADATU'),
('1807021', '1807', 'GUNUNG LABUHAN'),
('1807030', '1807', 'KASUI'),
('1807031', '1807', 'REBANG TANGKAS'),
('1807040', '1807', 'BLAMBANGAN UMPU'),
('1807041', '1807', 'WAY TUBA'),
('1807042', '1807', 'NEGERI AGUNG'),
('1807050', '1807', 'BAHUGA'),
('1807051', '1807', 'BUAY  BAHUGA'),
('1807052', '1807', 'BUMI AGUNG'),
('1807060', '1807', 'PAKUAN RATU'),
('1807061', '1807', 'NEGARA BATIN'),
('1807062', '1807', 'NEGERI BESAR'),
('1808030', '1808', 'BANJAR AGUNG'),
('1808031', '1808', 'BANJAR MARGO'),
('1808032', '1808', 'BANJAR BARU'),
('1808040', '1808', 'GEDUNG AJI'),
('1808041', '1808', 'PENAWAR AJI'),
('1808042', '1808', 'MERAKSA AJI'),
('1808050', '1808', 'MENGGALA'),
('1808051', '1808', 'PENAWAR TAMA'),
('1808052', '1808', 'RAWAJITU SELATAN'),
('1808053', '1808', 'GEDUNG MENENG'),
('1808054', '1808', 'RAWAJITU TIMUR'),
('1808055', '1808', 'RAWA PITU'),
('1808056', '1808', 'GEDUNG AJI BARU'),
('1808057', '1808', 'DENTE TELADAS'),
('1808058', '1808', 'MENGGALA TIMUR'),
('1809010', '1809', 'PUNDUH PIDADA'),
('1809011', '1809', 'MARGA PUNDUH'),
('1809020', '1809', 'PADANG CERMIN'),
('1809021', '1809', 'TELUK PANDAN'),
('1809022', '1809', 'WAY RATAI'),
('1809030', '1809', 'KEDONDONG'),
('1809031', '1809', 'WAY KHILAU'),
('1809040', '1809', 'WAY LIMA'),
('1809050', '1809', 'GEDUNG TATAAN'),
('1809060', '1809', 'NEGERI KATON'),
('1809070', '1809', 'TEGINENENG'),
('1810010', '1810', 'PARDASUKA'),
('1810020', '1810', 'AMBARAWA'),
('1810030', '1810', 'PAGELARAN'),
('1810031', '1810', 'PAGELARAN UTARA'),
('1810040', '1810', 'PRINGSEWU'),
('1810050', '1810', 'GADING REJO'),
('1810060', '1810', 'SUKOHARJO'),
('1810070', '1810', 'BANYUMAS'),
('1810080', '1810', 'ADI LUWIH'),
('1811010', '1811', 'WAY SERDANG'),
('1811020', '1811', 'SIMPANG PEMATANG'),
('1811030', '1811', 'PANCA JAYA'),
('1811040', '1811', 'TANJUNG RAYA'),
('1811050', '1811', 'MESUJI'),
('1811060', '1811', 'MESUJI TIMUR'),
('1811070', '1811', 'RAWAJITU UTARA'),
('1812010', '1812', 'TULANG BAWANG UDIK'),
('1812020', '1812', 'TUMI JAJAR'),
('1812030', '1812', 'TULANG BAWANG TENGAH'),
('1812040', '1812', 'PAGAR DEWA'),
('1812050', '1812', 'LAMBU KIBANG'),
('1812060', '1812', 'GUNUNG TERANG'),
('1812061', '1812', 'BATU PUTIH'),
('1812070', '1812', 'GUNUNG AGUNG'),
('1812080', '1812', 'WAY KENANGA'),
('1813010', '1813', 'LEMONG'),
('1813020', '1813', 'PESISIR UTARA'),
('1813030', '1813', 'PULAU PISANG'),
('1813040', '1813', 'KARYA PENGGAWA'),
('1813050', '1813', 'WAY KRUI'),
('1813060', '1813', 'PESISIR TENGAH'),
('1813070', '1813', 'KRUI SELATAN'),
('1813080', '1813', 'PESISIR SELATAN'),
('1813090', '1813', 'NGAMBUR'),
('1813100', '1813', 'BENGKUNAT'),
('1813110', '1813', 'BENGKUNAT BELIMBING'),
('1871010', '1871', 'TELUK BETUNG BARAT'),
('1871011', '1871', 'TELUKBETUNG TIMUR'),
('1871020', '1871', 'TELUK BETUNG SELATAN'),
('1871021', '1871', 'BUMI WARAS'),
('1871030', '1871', 'PANJANG'),
('1871040', '1871', 'TANJUNG KARANG TIMUR'),
('1871041', '1871', 'KEDAMAIAN'),
('1871050', '1871', 'TELUK BETUNG UTARA'),
('1871060', '1871', 'TANJUNG KARANG PUSAT'),
('1871061', '1871', 'ENGGAL'),
('1871070', '1871', 'TANJUNG KARANG BARAT'),
('1871071', '1871', 'KEMILING'),
('1871072', '1871', 'LANGKAPURA'),
('1871080', '1871', 'KEDATON'),
('1871081', '1871', 'RAJABASA'),
('1871082', '1871', 'TANJUNG SENANG'),
('1871083', '1871', 'LABUHAN RATU'),
('1871090', '1871', 'SUKARAME'),
('1871091', '1871', 'SUKABUMI'),
('1871092', '1871', 'WAY HALIM'),
('1872011', '1872', 'METRO SELATAN'),
('1872012', '1872', 'METRO BARAT'),
('1872021', '1872', 'METRO TIMUR'),
('1872022', '1872', 'METRO PUSAT'),
('1872023', '1872', 'METRO UTARA');

-- --------------------------------------------------------

--
-- Table structure for table `partai`
--

CREATE TABLE `partai` (
  `id` int(11) NOT NULL,
  `partai` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paslon_capres`
--

CREATE TABLE `paslon_capres` (
  `id` int(11) NOT NULL,
  `no_urut` varchar(191) NOT NULL,
  `paslon_capres` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemilu_dpd`
--

CREATE TABLE `pemilu_dpd` (
  `id` int(11) NOT NULL,
  `id_kecamatan` varchar(7) NOT NULL,
  `jumlah_kelurahan` int(11) NOT NULL,
  `jumlah_pemilih` int(11) NOT NULL,
  `jumlah_pemilih_terdaftar` int(11) NOT NULL,
  `jumlah_tps` int(11) NOT NULL,
  `suara_sah` int(11) NOT NULL,
  `suara_tidak_sah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemilu_dpr`
--

CREATE TABLE `pemilu_dpr` (
  `id` int(11) NOT NULL,
  `id_kecamatan` varchar(7) NOT NULL,
  `jumlah_kelurahan` int(11) NOT NULL,
  `jumlah_pemilih` int(11) NOT NULL,
  `jumlah_pemilih_terdaftar` int(11) NOT NULL,
  `jumlah_tps` int(11) NOT NULL,
  `suara_sah` int(11) NOT NULL,
  `suara_tidak_sah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemilu_dprd`
--

CREATE TABLE `pemilu_dprd` (
  `id` int(11) NOT NULL,
  `id_kecamatan` varchar(7) NOT NULL,
  `jumlah_kelurahan` int(11) NOT NULL,
  `jumlah_pemilih` int(11) NOT NULL,
  `jumlah_pemilih_terdaftar` int(11) NOT NULL,
  `jumlah_tps` int(11) NOT NULL,
  `suara_sah` int(11) NOT NULL,
  `suara_tidak_sah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pilpres`
--

CREATE TABLE `pilpres` (
  `id` int(11) NOT NULL,
  `id_kecamatan` varchar(7) NOT NULL,
  `jumlah_kelurahan` int(11) NOT NULL,
  `jumlah_pemilih` int(11) NOT NULL,
  `jumlah_pemilih_terdaftar` int(11) NOT NULL,
  `jumlah_tps` int(11) NOT NULL,
  `suara_sah` int(11) NOT NULL,
  `suara_tidak_sah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suara_dpd`
--

CREATE TABLE `suara_dpd` (
  `id_pemilu_dpd` int(11) NOT NULL,
  `id_partai` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suara_dpr`
--

CREATE TABLE `suara_dpr` (
  `id_pemilu_dpr` int(11) NOT NULL,
  `id_partai` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suara_dprd`
--

CREATE TABLE `suara_dprd` (
  `id_pemilu_dprd` int(11) NOT NULL,
  `id_partai` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suara_pilpres`
--

CREATE TABLE `suara_pilpres` (
  `id_pilpres` int(11) NOT NULL,
  `id_paslon_capres` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kab_id` (`id_kabupaten`);

--
-- Indexes for table `partai`
--
ALTER TABLE `partai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paslon_capres`
--
ALTER TABLE `paslon_capres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemilu_dpd`
--
ALTER TABLE `pemilu_dpd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `pemilu_dpr`
--
ALTER TABLE `pemilu_dpr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `pemilu_dprd`
--
ALTER TABLE `pemilu_dprd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `pilpres`
--
ALTER TABLE `pilpres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `suara_dpd`
--
ALTER TABLE `suara_dpd`
  ADD PRIMARY KEY (`id_pemilu_dpd`,`id_partai`),
  ADD KEY `id_partai` (`id_partai`);

--
-- Indexes for table `suara_dpr`
--
ALTER TABLE `suara_dpr`
  ADD PRIMARY KEY (`id_pemilu_dpr`,`id_partai`),
  ADD KEY `id_partai` (`id_partai`);

--
-- Indexes for table `suara_dprd`
--
ALTER TABLE `suara_dprd`
  ADD PRIMARY KEY (`id_pemilu_dprd`,`id_partai`),
  ADD KEY `id_partai` (`id_partai`);

--
-- Indexes for table `suara_pilpres`
--
ALTER TABLE `suara_pilpres`
  ADD PRIMARY KEY (`id_pilpres`,`id_paslon_capres`),
  ADD KEY `id_paslon_capres` (`id_paslon_capres`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `partai`
--
ALTER TABLE `partai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paslon_capres`
--
ALTER TABLE `paslon_capres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemilu_dpd`
--
ALTER TABLE `pemilu_dpd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemilu_dpr`
--
ALTER TABLE `pemilu_dpr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemilu_dprd`
--
ALTER TABLE `pemilu_dprd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pilpres`
--
ALTER TABLE `pilpres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`id_kabupaten`) REFERENCES `kabupaten` (`id`);

--
-- Constraints for table `pemilu_dpd`
--
ALTER TABLE `pemilu_dpd`
  ADD CONSTRAINT `pemilu_dpd_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id`);

--
-- Constraints for table `pemilu_dpr`
--
ALTER TABLE `pemilu_dpr`
  ADD CONSTRAINT `pemilu_dpr_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id`);

--
-- Constraints for table `pemilu_dprd`
--
ALTER TABLE `pemilu_dprd`
  ADD CONSTRAINT `pemilu_dprd_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id`);

--
-- Constraints for table `pilpres`
--
ALTER TABLE `pilpres`
  ADD CONSTRAINT `pilpres_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id`);

--
-- Constraints for table `suara_dpd`
--
ALTER TABLE `suara_dpd`
  ADD CONSTRAINT `suara_dpd_ibfk_1` FOREIGN KEY (`id_partai`) REFERENCES `partai` (`id`),
  ADD CONSTRAINT `suara_dpd_ibfk_2` FOREIGN KEY (`id_pemilu_dpd`) REFERENCES `pemilu_dpd` (`id`);

--
-- Constraints for table `suara_dpr`
--
ALTER TABLE `suara_dpr`
  ADD CONSTRAINT `suara_dpr_ibfk_1` FOREIGN KEY (`id_partai`) REFERENCES `partai` (`id`),
  ADD CONSTRAINT `suara_dpr_ibfk_2` FOREIGN KEY (`id_pemilu_dpr`) REFERENCES `pemilu_dpr` (`id`);

--
-- Constraints for table `suara_dprd`
--
ALTER TABLE `suara_dprd`
  ADD CONSTRAINT `suara_dprd_ibfk_1` FOREIGN KEY (`id_partai`) REFERENCES `partai` (`id`),
  ADD CONSTRAINT `suara_dprd_ibfk_2` FOREIGN KEY (`id_pemilu_dprd`) REFERENCES `pemilu_dprd` (`id`);

--
-- Constraints for table `suara_pilpres`
--
ALTER TABLE `suara_pilpres`
  ADD CONSTRAINT `suara_pilpres_ibfk_1` FOREIGN KEY (`id_paslon_capres`) REFERENCES `paslon_capres` (`id`),
  ADD CONSTRAINT `suara_pilpres_ibfk_2` FOREIGN KEY (`id_pilpres`) REFERENCES `pilpres` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
