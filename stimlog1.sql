-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2017 at 05:25 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stimlog1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin2`
--

CREATE TABLE `admin2` (
  `admin_id` int(5) NOT NULL,
  `admin_nama` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_level` int(11) NOT NULL,
  `oauth_provider` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `picture_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `profile_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin2`
--

INSERT INTO `admin2` (`admin_id`, `admin_nama`, `admin_password`, `admin_username`, `admin_level`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture_url`, `profile_url`, `created`, `modified`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1, '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'staf', '7b8a17c3f48d4453fde0fd74b4fa9212', 'staf', 2, '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `angkatan`
--

CREATE TABLE `angkatan` (
  `angkatan_id` int(10) NOT NULL,
  `tahun_id` int(11) NOT NULL,
  `angkatan_biaya` int(100) NOT NULL,
  `semester_id` int(10) NOT NULL,
  `jurusan_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angkatan`
--

INSERT INTO `angkatan` (`angkatan_id`, `tahun_id`, `angkatan_biaya`, `semester_id`, `jurusan_id`) VALUES
(28, 3, 6900000, 1, 2),
(29, 3, 6900000, 2, 2),
(30, 3, 6900000, 3, 2),
(31, 1, 6900000, 5, 2),
(32, 3, 6900000, 6, 2),
(33, 2, 6900000, 7, 2),
(35, 1, 20000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `dosen_nip` char(20) NOT NULL,
  `dosen_nama` varchar(30) NOT NULL,
  `dosen_alamat` text NOT NULL,
  `dosen_notelp` char(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`dosen_nip`, `dosen_nama`, `dosen_alamat`, `dosen_notelp`) VALUES
('1234', 'M.Nurkamal F, S.T., M.T', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `jurusan_id` int(10) NOT NULL,
  `jurusan_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`jurusan_id`, `jurusan_nama`) VALUES
(1, 'MANAJEMEN TRANSPORTASI'),
(2, 'MANAJEMEN LOGISTIK');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mahasiswa_npm` char(20) NOT NULL,
  `mahasiswa_nama` varchar(30) NOT NULL,
  `mahasiswa_password` varchar(100) NOT NULL,
  `mahasiswa_jk` enum('L','P') NOT NULL DEFAULT 'L',
  `mahasiswa_notelp` char(20) NOT NULL,
  `jurusan_id` int(5) NOT NULL,
  `prodi_id` int(10) NOT NULL,
  `tahun_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`mahasiswa_npm`, `mahasiswa_nama`, `mahasiswa_password`, `mahasiswa_jk`, `mahasiswa_notelp`, `jurusan_id`, `prodi_id`, `tahun_id`) VALUES
('1144049', 'Firman Rasyid', '9cfe6a6aa7de9be46e9e35ae40b635c4', 'L', '0865444667', 2, 13, 2017),
('1144101', 'Bayu Rizki', '9b71b9251e45092fe7d7c9bcebd6a98e', 'L', '085240249473', 1, 1, 2016),
('1144102', 'Ketut', '71faaa6ef51115f9aa696eeeb9b90ab6', 'L', '085321234677', 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` int(10) NOT NULL,
  `pembayaran_tanggal` date NOT NULL,
  `mahasiswa_npm` varchar(10) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `pembayaran_jumlah` int(50) NOT NULL,
  `pembayaran_sisa` char(50) NOT NULL,
  `jurusan_id` int(10) NOT NULL,
  `tahun_id` int(10) NOT NULL,
  `pembayaran_keterangan` text NOT NULL,
  `pembayaran_status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`pembayaran_id`, `pembayaran_tanggal`, `mahasiswa_npm`, `semester_id`, `pembayaran_jumlah`, `pembayaran_sisa`, `jurusan_id`, `tahun_id`, `pembayaran_keterangan`, `pembayaran_status`) VALUES
(6, '2017-09-20', '1144091', 5, 6800000, '', 2, 1, 'Lunas', 'Y'),
(7, '2017-09-09', '1144096', 5, 6800000, '', 1, 1, '', 'Y'),
(8, '2017-09-21', '1144096', 7, 6600000, '', 1, 1, '', 'Y'),
(9, '2017-10-04', '1144049', 3, 7900000, '', 0, 2, '', 'Y'),
(10, '2017-10-10', '1144049', 1, 6900000, '', 0, 3, '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `prodi_id` int(10) NOT NULL,
  `prodi_nama` varchar(100) NOT NULL,
  `jurusan_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`prodi_id`, `prodi_nama`, `jurusan_id`) VALUES
(1, 'MT1A', 1),
(2, 'MT1B', 1),
(3, 'MT1C', 1),
(4, 'MT2A', 1),
(5, 'MT2B', 1),
(6, 'MT2C', 1),
(7, 'MT3A', 1),
(8, 'MT3B', 1),
(9, 'MT3C', 1),
(10, 'ML1A', 2),
(11, 'ML1B', 2),
(12, 'ML1C', 2),
(13, 'ML2A', 2),
(14, 'ML2B', 2),
(15, 'ML2C', 2),
(16, 'ML3A', 2),
(17, 'ML3B', 2),
(18, 'ML3C', 2);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(5) NOT NULL,
  `semester_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester_nama`) VALUES
(1, 'SEMESTER 1'),
(2, 'SEMESTER 2'),
(3, 'SEMESTER 3'),
(4, 'SEMESTER 4'),
(5, 'SEMESTER 5'),
(6, 'SEMESTER 6'),
(7, 'SEMESTER 7'),
(8, 'SEMESTER 8');

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `tahun_id` int(11) NOT NULL,
  `tahun_nama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`tahun_id`, `tahun_nama`) VALUES
(1, '2015'),
(2, '2016'),
(3, '2017'),
(4, '2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin2`
--
ALTER TABLE `admin2`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `angkatan`
--
ALTER TABLE `angkatan`
  ADD PRIMARY KEY (`angkatan_id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`dosen_nip`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`jurusan_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mahasiswa_npm`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`prodi_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`tahun_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin2`
--
ALTER TABLE `admin2`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `angkatan`
--
ALTER TABLE `angkatan`
  MODIFY `angkatan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `jurusan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaran_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `prodi_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `tahun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
