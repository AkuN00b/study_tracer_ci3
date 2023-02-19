-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Feb 19, 2023 at 11:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracer_study`
--

-- --------------------------------------------------------

--
-- Table structure for table `ts_admin`
--

CREATE TABLE `ts_admin` (
  `email` varchar(50) NOT NULL,
  `id_admin` varchar(5) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ts_admin`
--

INSERT INTO `ts_admin` (`email`, `id_admin`, `jenis_kelamin`, `nama`, `password`, `username`) VALUES
('email1@gmail.com', 'AD001', 'Laki-laki', 'nama1', '7f08175a3d8459d7e42c3db9aa9b00bf9062d968eb2fcd01c5c5a0b8839045123591e79464514cf88cfb4a814880b22983876a334698eb02a8b5e02645b0c6d7uMgN4BasEF9BAvEMY8LiX87OnTnmpY7N6rFse4uhp2c=', 'username1');

-- --------------------------------------------------------

--
-- Table structure for table `ts_daftarurutandata`
--

CREATE TABLE `ts_daftarurutandata` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `id_detailPeriode` int(11) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_date` datetime NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ts_daftarurutandata`
--

INSERT INTO `ts_daftarurutandata` (`id`, `kode`, `alias`, `id_detailPeriode`, `created_by`, `created_date`, `modified_by`, `modified_date`, `status`) VALUES
(1, 'kdptimsmh', '', 4, 'nama1', '2023-02-14 11:41:37', 'nama1', '2023-02-14 11:41:37', 'Aktif'),
(2, 'kdpstmsmh', '', 4, 'nama1', '2023-02-14 11:44:34', 'nama1', '2023-02-14 11:44:34', 'Aktif'),
(3, 'nimhsmsmh', '', 4, 'nama1', '2023-02-14 11:44:42', 'nama1', '2023-02-14 11:44:42', 'Aktif'),
(4, 'nmmhsmsmh', '', 4, 'nama1', '2023-02-14 11:44:55', 'nama1', '2023-02-14 11:44:55', 'Aktif'),
(5, 'telpomsmh', '', 4, 'nama1', '2023-02-14 11:45:05', 'nama1', '2023-02-14 11:45:05', 'Aktif'),
(6, 'emailmsmh', '', 4, 'nama1', '2023-02-14 11:45:13', 'nama1', '2023-02-14 11:45:13', 'Aktif'),
(7, 'tahun_lulus', '', 4, 'nama1', '2023-02-14 11:45:20', 'nama1', '2023-02-14 11:45:20', 'Aktif'),
(8, 'nik', '', 4, 'nama1', '2023-02-14 11:45:30', 'nama1', '2023-02-14 11:45:30', 'Aktif'),
(9, 'npwp', '', 4, 'nama1', '2023-02-14 11:45:38', 'nama1', '2023-02-14 11:45:38', 'Aktif'),
(10, 'f8', '', 4, 'nama1', '2023-02-14 11:45:45', 'nama1', '2023-02-14 11:45:45', 'Aktif'),
(11, 'f504', '', 4, 'nama1', '2023-02-14 11:45:54', 'nama1', '2023-02-14 11:45:54', 'Aktif'),
(12, 'f502', '', 4, 'nama1', '2023-02-14 11:46:00', 'nama1', '2023-02-14 11:46:00', 'Aktif'),
(13, 'f505', '', 4, 'nama1', '2023-02-14 11:46:07', 'nama1', '2023-02-14 11:46:07', 'Aktif'),
(14, 'f506', '', 4, 'nama1', '2023-02-14 11:46:15', 'nama1', '2023-02-14 11:46:15', 'Aktif'),
(15, 'f5a1', '', 4, 'nama1', '2023-02-14 11:46:27', 'nama1', '2023-02-14 11:46:27', 'Aktif'),
(16, 'f5a2', '', 4, 'nama1', '2023-02-14 11:46:33', 'nama1', '2023-02-14 11:46:33', 'Aktif'),
(17, 'f1101', '', 4, 'nama1', '2023-02-14 11:46:40', 'nama1', '2023-02-14 11:46:40', 'Aktif'),
(18, 'f1102', '', 4, 'nama1', '2023-02-14 11:46:47', 'nama1', '2023-02-14 11:46:47', 'Aktif'),
(19, 'f5b', '', 4, 'nama1', '2023-02-14 11:46:54', 'nama1', '2023-02-14 11:46:54', 'Aktif'),
(20, 'f5c', '', 4, 'nama1', '2023-02-14 11:47:00', 'nama1', '2023-02-14 11:47:00', 'Aktif'),
(21, 'f5d', '', 4, 'nama1', '2023-02-14 11:47:07', 'nama1', '2023-02-14 11:47:07', 'Aktif'),
(22, 'f18a', '', 4, 'nama1', '2023-02-14 11:47:15', 'nama1', '2023-02-14 11:47:15', 'Aktif'),
(23, 'f18b', '', 4, 'nama1', '2023-02-14 11:47:32', 'nama1', '2023-02-14 11:47:32', 'Aktif'),
(24, 'f18c', '', 4, 'nama1', '2023-02-14 11:47:41', 'nama1', '2023-02-14 11:47:41', 'Aktif'),
(25, 'f18d', '', 4, 'nama1', '2023-02-14 11:47:47', 'nama1', '2023-02-14 11:47:47', 'Aktif'),
(26, 'f1201', '', 4, 'nama1', '2023-02-14 11:47:53', 'nama1', '2023-02-14 11:47:53', 'Aktif'),
(27, 'f1202', '', 4, 'nama1', '2023-02-14 11:47:58', 'nama1', '2023-02-14 11:47:58', 'Aktif'),
(28, 'f14', '', 4, 'nama1', '2023-02-14 11:48:04', 'nama1', '2023-02-14 11:48:04', 'Aktif'),
(29, 'f15', '', 4, 'nama1', '2023-02-14 11:48:10', 'nama1', '2023-02-14 11:48:10', 'Aktif'),
(30, 'f1761', '', 4, 'nama1', '2023-02-14 11:48:16', 'nama1', '2023-02-14 11:48:16', 'Aktif'),
(31, 'f1762', '', 4, 'nama1', '2023-02-14 11:48:22', 'nama1', '2023-02-14 11:48:22', 'Aktif'),
(32, 'f1763', '', 4, 'nama1', '2023-02-14 11:48:31', 'nama1', '2023-02-14 11:54:23', 'Aktif'),
(33, 'f1764', '', 4, 'nama1', '2023-02-14 11:54:40', 'nama1', '2023-02-14 11:54:40', 'Aktif'),
(34, 'f1765', '', 4, 'nama1', '2023-02-14 11:54:48', 'nama1', '2023-02-14 11:54:48', 'Aktif'),
(35, 'f1766', '', 4, 'nama1', '2023-02-14 11:54:55', 'nama1', '2023-02-14 11:54:55', 'Aktif'),
(36, 'f1767', '', 4, 'nama1', '2023-02-14 11:55:02', 'nama1', '2023-02-14 11:55:02', 'Aktif'),
(37, 'f1768', '', 4, 'nama1', '2023-02-14 11:55:09', 'nama1', '2023-02-14 11:55:09', 'Aktif'),
(38, 'f1769', '', 4, 'nama1', '2023-02-14 11:55:16', 'nama1', '2023-02-14 11:55:16', 'Aktif'),
(39, 'f1770', '', 4, 'nama1', '2023-02-14 11:55:22', 'nama1', '2023-02-14 11:55:22', 'Aktif'),
(40, 'f1771', '', 4, 'nama1', '2023-02-14 11:55:30', 'nama1', '2023-02-14 11:55:30', 'Aktif'),
(41, 'f1772', '', 4, 'nama1', '2023-02-14 11:55:38', 'nama1', '2023-02-14 11:55:38', 'Aktif'),
(42, 'f1773', '', 4, 'nama1', '2023-02-14 11:55:44', 'nama1', '2023-02-14 11:55:44', 'Aktif'),
(43, 'f1774', '', 4, 'nama1', '2023-02-14 11:55:50', 'nama1', '2023-02-14 11:55:50', 'Aktif'),
(44, 'f21', '', 4, 'nama1', '2023-02-14 11:55:56', 'nama1', '2023-02-14 11:55:56', 'Aktif'),
(45, 'f22', '', 4, 'nama1', '2023-02-14 11:56:02', 'nama1', '2023-02-14 11:56:02', 'Aktif'),
(46, 'f23', '', 4, 'nama1', '2023-02-14 11:56:08', 'nama1', '2023-02-14 11:56:08', 'Aktif'),
(47, 'f24', '', 4, 'nama1', '2023-02-14 11:59:40', 'nama1', '2023-02-14 11:59:40', 'Aktif'),
(48, 'f25', '', 4, 'nama1', '2023-02-14 11:59:47', 'nama1', '2023-02-14 11:59:47', 'Aktif'),
(49, 'f26', '', 4, 'nama1', '2023-02-14 11:59:56', 'nama1', '2023-02-14 11:59:56', 'Aktif'),
(50, 'f27', '', 4, 'nama1', '2023-02-14 12:00:02', 'nama1', '2023-02-14 12:00:02', 'Aktif'),
(51, 'f301', '', 4, 'nama1', '2023-02-14 12:00:09', 'nama1', '2023-02-14 12:00:09', 'Aktif'),
(52, 'f302', '', 4, 'nama1', '2023-02-14 12:00:15', 'nama1', '2023-02-14 12:00:15', 'Aktif'),
(53, 'f303', '', 4, 'nama1', '2023-02-14 12:00:35', 'nama1', '2023-02-14 12:00:35', 'Aktif'),
(54, 'f401', '', 4, 'nama1', '2023-02-14 12:00:41', 'nama1', '2023-02-14 12:00:41', 'Aktif'),
(55, 'f402', '', 4, 'nama1', '2023-02-14 12:00:47', 'nama1', '2023-02-14 12:00:47', 'Aktif'),
(56, 'f403', '', 4, 'nama1', '2023-02-14 12:00:53', 'nama1', '2023-02-14 12:00:53', 'Aktif'),
(57, 'f404', '', 4, 'nama1', '2023-02-14 12:00:58', 'nama1', '2023-02-14 12:00:58', 'Aktif'),
(58, 'f405', '', 4, 'nama1', '2023-02-14 12:01:04', 'nama1', '2023-02-14 12:01:04', 'Aktif'),
(59, 'f406', '', 4, 'nama1', '2023-02-14 12:01:23', 'nama1', '2023-02-14 12:01:23', 'Aktif'),
(60, 'f407', '', 4, 'nama1', '2023-02-14 12:01:31', 'nama1', '2023-02-14 12:01:31', 'Aktif'),
(61, 'f408', '', 4, 'nama1', '2023-02-14 12:01:39', 'nama1', '2023-02-14 12:01:39', 'Aktif'),
(62, 'f409', '', 4, 'nama1', '2023-02-14 12:01:45', 'nama1', '2023-02-14 12:01:45', 'Aktif'),
(63, 'f410', '', 4, 'nama1', '2023-02-14 12:01:53', 'nama1', '2023-02-14 12:01:53', 'Aktif'),
(64, 'f411', '', 4, 'nama1', '2023-02-14 12:01:59', 'nama1', '2023-02-14 12:01:59', 'Aktif'),
(65, 'f412', '', 4, 'nama1', '2023-02-14 12:02:05', 'nama1', '2023-02-14 12:02:05', 'Aktif'),
(66, 'f413', '', 4, 'nama1', '2023-02-14 12:02:11', 'nama1', '2023-02-14 12:02:11', 'Aktif'),
(67, 'f414', '', 4, 'nama1', '2023-02-14 12:02:24', 'nama1', '2023-02-14 12:02:24', 'Aktif'),
(68, 'f415', '', 4, 'nama1', '2023-02-14 12:02:31', 'nama1', '2023-02-14 12:02:31', 'Aktif'),
(69, 'f416', '', 4, 'nama1', '2023-02-14 12:02:38', 'nama1', '2023-02-14 12:02:38', 'Aktif'),
(70, 'f6', '', 4, 'nama1', '2023-02-14 12:02:46', 'nama1', '2023-02-14 12:02:46', 'Aktif'),
(71, 'f7', '', 4, 'nama1', '2023-02-14 12:02:52', 'nama1', '2023-02-14 12:02:52', 'Aktif'),
(72, 'f7a', '', 4, 'nama1', '2023-02-14 12:02:57', 'nama1', '2023-02-14 12:02:57', 'Aktif'),
(73, 'f1001', '', 4, 'nama1', '2023-02-14 12:03:03', 'nama1', '2023-02-14 12:03:03', 'Aktif'),
(74, 'f1002', '', 4, 'nama1', '2023-02-14 12:03:09', 'nama1', '2023-02-14 12:03:09', 'Aktif'),
(75, 'f1601', '', 4, 'nama1', '2023-02-14 12:03:14', 'nama1', '2023-02-14 12:03:14', 'Aktif'),
(76, 'f1602', '', 4, 'nama1', '2023-02-14 12:03:21', 'nama1', '2023-02-14 12:03:21', 'Aktif'),
(77, 'f1603', '', 4, 'nama1', '2023-02-14 12:03:29', 'nama1', '2023-02-14 12:03:29', 'Aktif'),
(78, 'f1604', '', 4, 'nama1', '2023-02-14 12:03:35', 'nama1', '2023-02-14 12:03:35', 'Aktif'),
(79, 'f1605', '', 4, 'nama1', '2023-02-14 12:03:40', 'nama1', '2023-02-14 12:03:40', 'Aktif'),
(80, 'f1606', '', 4, 'nama1', '2023-02-14 12:04:13', 'nama1', '2023-02-14 12:04:13', 'Aktif'),
(81, 'f1607', '', 4, 'nama1', '2023-02-14 12:04:19', 'nama1', '2023-02-14 12:04:19', 'Aktif'),
(82, 'f1608', '', 4, 'nama1', '2023-02-14 12:04:26', 'nama1', '2023-02-14 12:04:26', 'Aktif'),
(83, 'f1609', '', 4, 'nama1', '2023-02-14 12:04:34', 'nama1', '2023-02-14 12:04:34', 'Aktif'),
(84, 'f1610', '', 4, 'nama1', '2023-02-14 12:04:41', 'nama1', '2023-02-14 12:04:41', 'Aktif'),
(85, 'f1611', '', 4, 'nama1', '2023-02-14 12:04:47', 'nama1', '2023-02-14 12:04:47', 'Aktif'),
(86, 'f1612', '', 4, 'nama1', '2023-02-14 12:04:54', 'nama1', '2023-02-14 12:04:54', 'Aktif'),
(87, 'f1613', '', 4, 'nama1', '2023-02-14 12:05:21', 'nama1', '2023-02-14 12:05:21', 'Aktif'),
(88, 'f1614', '', 4, 'nama1', '2023-02-14 12:05:28', 'nama1', '2023-02-14 12:05:28', 'Aktif'),
(89, 'AlamatPerusahaanandabekerja', '', 3, 'nama1', '2023-02-14 12:06:17', 'nama1', '2023-02-19 18:15:29', 'Tidak Aktif'),
(90, 'ApakahandabekerjadigroupperusahaanAstra', '', 3, 'nama1', '2023-02-14 12:06:24', 'nama1', '2023-02-19 18:15:31', 'Tidak Aktif'),
(91, 'ApasarandarialumniuntukPolmanAstra', '', 3, 'nama1', '2023-02-14 12:06:30', 'nama1', '2023-02-19 18:15:33', 'Tidak Aktif'),
(92, 'Dalamduatahunsetelahlulussudahberapakalipindahperusahaan', '', 3, 'nama1', '2023-02-14 12:06:37', 'nama1', '2023-02-19 18:15:35', 'Tidak Aktif'),
(93, 'Dalamlimatahunsetelahlulussudahberapakalipindahperusahaan', '', 3, 'nama1', '2023-02-14 12:06:43', 'nama1', '2023-02-19 18:15:37', 'Tidak Aktif'),
(94, 'DeskripsiPekerjaan', '', 3, 'nama1', '2023-02-14 12:06:49', 'nama1', '2023-02-19 18:15:39', 'Tidak Aktif'),
(95, 'emailmsmh', '', 3, 'nama1', '2023-02-14 12:06:56', 'nama1', '2023-02-19 18:15:41', 'Tidak Aktif'),
(96, 'kdpstmsmh', '', 3, 'nama1', '2023-02-14 12:07:15', 'nama1', '2023-02-19 18:15:44', 'Tidak Aktif'),
(97, 'kdptimsmh', '', 3, 'nama1', '2023-02-14 12:07:37', 'nama1', '2023-02-19 18:15:47', 'Tidak Aktif'),
(98, 'NamaDepartemenBagian', '', 3, 'nama1', '2023-02-14 12:07:43', 'nama1', '2023-02-19 18:15:49', 'Tidak Aktif'),
(99, 'namaperusahaanbekerja', '', 3, 'nama1', '2023-02-14 12:07:49', 'nama1', '2023-02-19 18:15:51', 'Tidak Aktif'),
(100, 'nik', '', 3, 'nama1', '2023-02-14 12:07:56', 'nama1', '2023-02-19 18:15:54', 'Tidak Aktif'),
(101, 'nimhsmsmh', '', 3, 'nama1', '2023-02-14 12:08:02', 'nama1', '2023-02-19 18:15:56', 'Tidak Aktif'),
(102, 'nmmhsmsmh', '', 3, 'nama1', '2023-02-14 12:08:08', 'nama1', '2023-02-19 18:15:59', 'Tidak Aktif'),
(103, 'Nomortelponperusahaanyangbisadihubungi', '', 3, 'nama1', '2023-02-14 12:08:16', 'nama1', '2023-02-19 18:16:01', 'Tidak Aktif'),
(104, 'npwp', '', 3, 'nama1', '2023-02-14 12:08:23', 'nama1', '2023-02-19 18:16:03', 'Tidak Aktif'),
(105, 'OrganisasiKemahasiswaanyangpernahAndaikutiselamakuliahdiPolmanAstrabolehlebihdarisatu', '', 3, 'nama1', '2023-02-14 12:08:30', 'nama1', '2023-02-19 18:16:05', 'Tidak Aktif'),
(106, 'Pilihlahhadiahyangmenarikbagialumni', '', 3, 'nama1', '2023-02-14 12:08:37', 'nama1', '2023-02-19 18:16:09', 'Tidak Aktif'),
(107, 'Posisiandadiperusahaandisaatandapertamakalimendapatpekerjaan', '', 3, 'nama1', '2023-02-14 12:08:43', 'nama1', '2023-02-19 18:16:12', 'Tidak Aktif'),
(108, 'tahun_lulus', '', 3, 'nama1', '2023-02-14 12:08:50', 'nama1', '2023-02-19 18:16:15', 'Tidak Aktif'),
(109, 'telpomsmh', '', 3, 'nama1', '2023-02-14 12:08:56', 'nama1', '2023-02-19 18:16:18', 'Tidak Aktif'),
(110, 'Tempatandabekerjasaatinibergerakdibidangapa', '', 3, 'nama1', '2023-02-14 12:09:02', 'nama1', '2023-02-19 18:16:21', 'Tidak Aktif'),
(111, 'Apapekerjaananda', '', 4, 'nama1', '2023-02-16 14:32:17', 'nama1', '2023-02-16 14:32:47', 'Tidak Aktif'),
(112, 'tes', 'tes', 3, 'nama1', '2023-02-19 18:04:26', 'nama1', '2023-02-19 18:04:42', 'Tidak Aktif'),
(113, 'nimhsmsmh', 'NIM', 3, 'nama1', '2023-02-19 18:16:53', 'nama1', '2023-02-19 18:16:53', 'Aktif'),
(114, 'nmmhsmsmh', 'NAMA', 3, 'nama1', '2023-02-19 18:26:52', 'nama1', '2023-02-19 18:26:52', 'Aktif'),
(115, 'telpomsmh', 'TELP', 3, 'nama1', '2023-02-19 18:27:04', 'nama1', '2023-02-19 18:27:04', 'Aktif'),
(116, 'emailmsmh', 'EMAIL', 3, 'nama1', '2023-02-19 18:27:20', 'nama1', '2023-02-19 18:27:20', 'Aktif'),
(117, 'tahun_lulus', 'LULUS', 3, 'nama1', '2023-02-19 18:27:33', 'nama1', '2023-02-19 18:27:33', 'Aktif'),
(118, 'namaperusahaanbekerja', 'Nama Perusahaan bekerja?', 3, 'nama1', '2023-02-19 18:27:49', 'nama1', '2023-02-19 18:27:49', 'Aktif'),
(119, 'Dalamlimatahunsetelahlulussudahberapakalipindahperusahaan', 'Dalam 5 tahun setelah lulus sudah berapa kali pindah perusahaan? (Deskripsikan)', 3, 'nama1', '2023-02-19 18:28:07', 'nama1', '2023-02-19 18:28:07', 'Aktif'),
(120, 'AlamatPerusahaanandabekerja', 'Alamat Perusahaan anda bekerja?', 3, 'nama1', '2023-02-19 18:28:23', 'nama1', '2023-02-19 18:28:23', 'Aktif'),
(121, 'OrganisasiKemahasiswaanyangpernahAndaikutiselamakuliahdiPolmanAstrabolehlebihdarisatu', 'Organisasi Kemahasiswaan yang pernah Anda ikuti selama kuliah di Polman Astra (boleh lebih dari satu)', 3, 'nama1', '2023-02-19 18:28:37', 'nama1', '2023-02-19 18:28:37', 'Aktif'),
(122, 'Nomortelponperusahaanyangbisadihubungi', 'Nomor telpon perusahaan yang bisa dihubungi ? (masukkan kode daerah 021xxxxxxxxxx)', 3, 'nama1', '2023-02-19 18:28:49', 'nama1', '2023-02-19 18:28:49', 'Aktif'),
(123, 'ApakahandabekerjadigroupperusahaanAstra', 'Apakah anda bekerja di group perusahaan Astra?', 3, 'nama1', '2023-02-19 18:29:12', 'nama1', '2023-02-19 18:29:12', 'Aktif'),
(124, 'Tempatandabekerjasaatinibergerakdibidangapa', 'Tempat anda bekerja saat ini bergerak di bidang apa?', 3, 'nama1', '2023-02-19 18:29:24', 'nama1', '2023-02-19 18:29:24', 'Aktif'),
(125, 'ApasarandarialumniuntukPolmanAstra', 'Apa saran dari alumni untuk Polman Astra?', 3, 'nama1', '2023-02-19 18:29:37', 'nama1', '2023-02-19 18:29:37', 'Aktif'),
(126, 'NamaDepartemenBagian', 'Nama Departemen/Bagian', 3, 'nama1', '2023-02-19 18:29:54', 'nama1', '2023-02-19 18:29:54', 'Aktif'),
(127, 'Dalamduatahunsetelahlulussudahberapakalipindahperusahaan', 'Dalam 2 tahun setelah lulus sudah berapa kali pindah perusahaan? (Deskripsikan)', 3, 'nama1', '2023-02-19 18:30:24', 'nama1', '2023-02-19 18:30:24', 'Aktif'),
(128, 'Pilihlahhadiahyangmenarikbagialumni', 'Pilihlah hadiah yang menarik bagi alumni ! (Lucky Draw)', 3, 'nama1', '2023-02-19 18:30:38', 'nama1', '2023-02-19 18:36:02', 'Aktif'),
(129, 'Posisiandadiperusahaandisaatandapertamakalimendapatpekerjaan', 'Posisi anda di perusahaan disaat anda pertama kali mendapat pekerjaan?', 3, 'nama1', '2023-02-19 18:30:49', 'nama1', '2023-02-19 18:30:49', 'Aktif'),
(130, 'DeskripsiPekerjaan', 'Deskripsi Pekerjaan', 3, 'nama1', '2023-02-19 18:31:06', 'nama1', '2023-02-19 18:31:06', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `ts_detailjenisperiode`
--

CREATE TABLE `ts_detailjenisperiode` (
  `id_detailPeriode` int(11) NOT NULL,
  `jenis_kuesioner` varchar(30) NOT NULL,
  `periode` int(11) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_date` datetime NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ts_detailjenisperiode`
--

INSERT INTO `ts_detailjenisperiode` (`id_detailPeriode`, `jenis_kuesioner`, `periode`, `created_by`, `created_date`, `modified_by`, `modified_date`, `status`) VALUES
(1, 'Polman', 2023, 'nama1', '2023-01-29 10:53:41', 'nama1', '2023-01-29 19:12:11', 'Tidak Aktif'),
(2, 'Polman', 2025, 'nama1', '2023-01-29 18:20:45', 'nama1', '2023-01-29 19:11:52', 'Tidak Aktif'),
(3, 'Politeknik Astra', 2023, 'nama1', '2023-01-29 20:00:46', 'nama1', '2023-02-20 05:12:47', 'Aktif'),
(4, 'Dikti', 2023, 'nama1', '2023-01-29 20:00:53', 'nama1', '2023-01-29 20:00:53', 'Aktif'),
(5, 'Dikti', 112, 'nama1', '2023-02-03 01:28:57', 'nama1', '2023-02-03 01:29:06', 'Tidak Aktif'),
(6, 'Dikti', 11, 'nama1', '2023-02-05 22:03:40', 'nama1', '2023-02-05 22:04:08', 'Tidak Aktif'),
(7, 'Dikti', 22, 'nama1', '2023-02-06 22:47:12', 'nama1', '2023-02-06 22:49:27', 'Tidak Aktif'),
(8, 'Dikti', 22, 'nama1', '2023-02-06 22:49:18', 'nama1', '2023-02-06 22:49:30', 'Tidak Aktif'),
(9, 'Politeknik Astra', 2024, 'nama1', '2023-02-07 09:02:42', 'nama1', '2023-02-20 05:12:52', 'Aktif'),
(10, 'Dikti', 2024, 'nama1', '2023-02-07 09:04:45', 'nama1', '2023-02-07 09:04:45', 'Aktif'),
(11, 'Polman', 402, 'nama1', '2023-02-09 03:03:17', 'nama1', '2023-02-09 03:03:40', 'Tidak Aktif'),
(12, 'Dikti', 2025, 'nama1', '2023-02-10 10:10:16', 'nama1', '2023-02-10 10:10:55', 'Tidak Aktif'),
(13, 'Dikti', 2025, 'nama1', '2023-02-16 14:29:39', 'nama1', '2023-02-16 14:30:12', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `ts_detailpertanyaanjawaban`
--

CREATE TABLE `ts_detailpertanyaanjawaban` (
  `id_detailPertanyaanJawaban` int(11) NOT NULL,
  `id_jawabanKuesioner` varchar(10) NOT NULL,
  `id_pku_answer` varchar(10) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_date` datetime NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ts_detailpertanyaanjawaban`
--

INSERT INTO `ts_detailpertanyaanjawaban` (`id_detailPertanyaanJawaban`, `id_jawabanKuesioner`, `id_pku_answer`, `created_by`, `created_date`, `modified_by`, `modified_date`, `status`) VALUES
(1, 'JK003', 'PKU004', 'nama1', '2023-01-30 00:29:26', 'nama1', '2023-01-30 00:42:10', 'Tidak Aktif'),
(2, 'JK005', 'PKU049', 'nama1', '2023-01-31 16:03:22', 'nama1', '2023-01-31 16:03:22', 'Aktif'),
(3, 'JK005', 'PKU047', 'nama1', '2023-01-31 16:03:56', 'nama1', '2023-01-31 16:03:56', 'Aktif'),
(4, 'JK005', 'PKU046', 'nama1', '2023-01-31 16:04:07', 'nama1', '2023-01-31 16:04:07', 'Aktif'),
(5, 'JK005', 'PKU045', 'nama1', '2023-01-31 16:04:18', 'nama1', '2023-01-31 16:04:18', 'Aktif'),
(6, 'JK005', 'PKU044', 'nama1', '2023-01-31 16:04:29', 'nama1', '2023-01-31 16:04:29', 'Aktif'),
(7, 'JK005', 'PKU021', 'nama1', '2023-01-31 16:04:45', 'nama1', '2023-01-31 16:04:45', 'Aktif'),
(8, 'JK005', 'PKU020', 'nama1', '2023-01-31 16:05:01', 'nama1', '2023-01-31 16:05:01', 'Aktif'),
(9, 'JK008', 'PKU018', 'nama1', '2023-01-31 16:05:35', 'nama1', '2023-01-31 16:05:35', 'Aktif'),
(10, 'JK008', 'PKU017', 'nama1', '2023-01-31 16:05:48', 'nama1', '2023-01-31 16:05:48', 'Aktif'),
(11, 'JK008', 'PKU016', 'nama1', '2023-01-31 16:05:58', 'nama1', '2023-01-31 16:05:58', 'Aktif'),
(12, 'JK008', 'PKU015', 'nama1', '2023-01-31 16:06:15', 'nama1', '2023-01-31 16:06:15', 'Aktif'),
(13, 'JK005', 'PKU014', 'nama1', '2023-01-31 16:06:42', 'nama1', '2023-01-31 16:06:42', 'Aktif'),
(14, 'JK007', 'PKU013', 'nama1', '2023-01-31 16:06:58', 'nama1', '2023-01-31 16:06:58', 'Aktif'),
(15, 'JK005', 'PKU012', 'nama1', '2023-01-31 16:07:11', 'nama1', '2023-01-31 16:07:11', 'Aktif'),
(16, 'JK005', 'PKU011', 'nama1', '2023-01-31 16:07:19', 'nama1', '2023-01-31 16:07:19', 'Aktif'),
(17, 'JK005', 'PKU008', 'nama1', '2023-01-31 16:07:29', 'nama1', '2023-01-31 16:07:29', 'Aktif'),
(18, 'JK005', 'PKU010', 'nama1', '2023-01-31 16:07:46', 'nama1', '2023-01-31 16:07:46', 'Aktif'),
(19, 'JK005', 'PKU009', 'nama1', '2023-01-31 16:07:53', 'nama1', '2023-01-31 16:07:53', 'Aktif'),
(20, 'JK011', 'PKU007', 'nama1', '2023-01-31 16:08:04', 'nama1', '2023-01-31 16:08:04', 'Aktif'),
(21, 'JK005', 'PKU006', 'nama1', '2023-01-31 16:08:13', 'nama1', '2023-01-31 16:08:13', 'Aktif'),
(22, 'JK010', 'PKU012', 'nama1', '2023-02-03 01:34:42', 'nama1', '2023-02-03 01:35:23', 'Tidak Aktif'),
(23, 'JK005', 'PKU006', 'nama1', '2023-02-05 22:07:16', 'nama1', '2023-02-05 22:08:01', 'Tidak Aktif'),
(24, 'JK140', 'PKU010', 'nama1', '2023-02-09 03:04:57', 'nama1', '2023-02-09 03:05:47', 'Tidak Aktif'),
(25, 'JK019', 'PKU018', 'nama1', '2023-02-10 10:11:36', 'nama1', '2023-02-10 10:12:18', 'Tidak Aktif'),
(26, 'JK019', 'PKU018', 'nama1', '2023-02-16 14:30:54', 'nama1', '2023-02-16 14:31:28', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `ts_hasilkuesioner`
--

CREATE TABLE `ts_hasilkuesioner` (
  `id_hasilKuesioner` varchar(10) NOT NULL,
  `id_detailPeriode` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `tanggal_pengisian` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ts_hasilkuesioner`
--

INSERT INTO `ts_hasilkuesioner` (`id_hasilKuesioner`, `id_detailPeriode`, `nim`, `tanggal_pengisian`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
('HKU001', 3, '0320170002', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU002', 4, '0320170002', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU003', 4, '0320170007', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU004', 3, '0320180011', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU005', 4, '0320180011', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `ts_jawabankuesioner`
--

CREATE TABLE `ts_jawabankuesioner` (
  `deskripsiJawaban` text NOT NULL,
  `id_jawabanKuesioner` varchar(10) NOT NULL,
  `id_pku` varchar(10) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `textbox` varchar(11) NOT NULL,
  `nilaiJawaban` text NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_date` datetime NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ts_jawabankuesioner`
--

INSERT INTO `ts_jawabankuesioner` (`deskripsiJawaban`, `id_jawabanKuesioner`, `id_pku`, `kode`, `textbox`, `nilaiJawaban`, `created_by`, `created_date`, `modified_by`, `modified_date`, `status`) VALUES
('dj233', 'JK001', 'PKU003', 'kj233', 'Tidak', '233', 'nama1', '2023-01-29 23:56:18', 'nama1', '2023-01-30 00:19:21', 'Tidak Aktif'),
('dj2', 'JK002', 'PKU002', 'kj2', 'Ya', '2', 'nama1', '2023-01-30 00:19:42', 'nama1', '2023-01-31 08:51:36', 'Tidak Aktif'),
('dj3', 'JK003', 'PKU003', 'kj3', 'Ya', '3', 'nama1', '2023-01-30 00:19:54', 'nama1', '2023-01-31 08:51:45', 'Tidak Aktif'),
('dj444', 'JK004', 'PKU004', 'kj444', 'Tidak', '444', 'nama1', '2023-01-30 00:20:06', 'nama1', '2023-01-31 08:51:49', 'Tidak Aktif'),
('Bekerja (full time / part time)', 'JK005', 'PKU005', '', 'Tidak', '1', 'nama1', '2023-01-31 14:31:51', 'nama1', '2023-01-31 14:31:51', 'Aktif'),
('Belum memungkinkan bekerja', 'JK006', 'PKU005', '', 'Tidak', '2', 'nama1', '2023-01-31 14:52:01', 'nama1', '2023-02-05 14:24:34', 'Aktif'),
('Wiraswasta', 'JK007', 'PKU005', '', 'Tidak', '3', 'nama1', '2023-01-31 14:52:15', 'nama1', '2023-01-31 14:52:15', 'Aktif'),
('Melanjutkan Pendidikan', 'JK008', 'PKU005', '', 'Tidak', '4', 'nama1', '2023-01-31 14:52:32', 'nama1', '2023-01-31 14:52:44', 'Aktif'),
('Tidak kerja tetapi sedang mencari kerja	', 'JK009', 'PKU005', '', 'Tidak', '5', 'nama1', '2023-01-31 14:53:01', 'nama1', '2023-01-31 14:53:01', 'Aktif'),
('Ya', 'JK010', 'PKU006', '', 'Tidak', '1', 'nama1', '2023-01-31 14:53:17', 'nama1', '2023-01-31 14:53:17', 'Aktif'),
('Tidak', 'JK011', 'PKU006', '', 'Tidak', '2', 'nama1', '2023-01-31 14:53:27', 'nama1', '2023-01-31 14:53:27', 'Aktif'),
('Instansi pemerintah', 'JK012', 'PKU011', '', 'Tidak', '1', 'nama1', '2023-01-31 14:54:28', 'nama1', '2023-01-31 14:54:28', 'Aktif'),
('BUMN/BUMD', 'JK013', 'PKU011', '', 'Tidak', '6', 'nama1', '2023-01-31 14:54:45', 'nama1', '2023-01-31 14:54:45', 'Aktif'),
('Institusi/Organisasi Multilateral', 'JK014', 'PKU011', '', 'Tidak', '7', 'nama1', '2023-01-31 14:54:57', 'nama1', '2023-01-31 14:54:57', 'Aktif'),
('Organisasi non-profit/Lembaga Swadaya Masyarakat', 'JK015', 'PKU011', '', 'Tidak', '2', 'nama1', '2023-01-31 14:55:36', 'nama1', '2023-01-31 14:55:36', 'Aktif'),
('Perusahaan swasta', 'JK016', 'PKU011', '', 'Tidak', '3', 'nama1', '2023-01-31 14:55:49', 'nama1', '2023-01-31 14:55:49', 'Aktif'),
('Wiraswasta/perusahaan sendiri', 'JK017', 'PKU011', '', 'Tidak', '4', 'nama1', '2023-01-31 14:56:06', 'nama1', '2023-01-31 14:56:06', 'Aktif'),
('Lainnya, tuliskan', 'JK018', 'PKU011', 'f1102', 'Ya', '5', 'nama1', '2023-01-31 14:56:20', 'nama1', '2023-02-01 05:48:49', 'Aktif'),
('Founder', 'JK019', 'PKU013', '', 'Tidak', '1', 'nama1', '2023-01-31 14:56:46', 'nama1', '2023-02-11 17:52:35', 'Aktif'),
('Co-Founder', 'JK020', 'PKU013', '', 'Tidak', '2', 'nama1', '2023-01-31 14:57:22', 'nama1', '2023-02-11 17:52:50', 'Aktif'),
('Staff', 'JK021', 'PKU013', '', 'Tidak', '3', 'nama1', '2023-01-31 14:57:34', 'nama1', '2023-02-11 17:53:03', 'Aktif'),
('Lokal/Wilayah/Wiraswasta tidak berbadan hukum', 'JK022', 'PKU014', '', 'Tidak', '1', 'nama1', '2023-01-31 14:57:50', 'nama1', '2023-02-11 17:55:50', 'Aktif'),
('Nasional/Wiraswasta berbadan hukum', 'JK023', 'PKU014', '', 'Tidak', '2', 'nama1', '2023-01-31 14:58:36', 'nama1', '2023-02-11 17:56:11', 'Aktif'),
('Multinasional/Internasional', 'JK024', 'PKU014', '', 'Tidak', '3', 'nama1', '2023-01-31 14:58:48', 'nama1', '2023-02-11 17:56:29', 'Aktif'),
('Biaya Sendiri', 'JK025', 'PKU015', '', 'Tidak', '1', 'nama1', '2023-01-31 14:59:23', 'nama1', '2023-02-11 17:57:13', 'Aktif'),
('Beasiswa', 'JK026', 'PKU015', '', 'Tidak', '2', 'nama1', '2023-01-31 14:59:35', 'nama1', '2023-02-11 17:57:21', 'Aktif'),
('sumberBiaya3', 'JK027', 'PKU015', '', 'Tidak', '3', 'nama1', '2023-01-31 14:59:46', 'nama1', '2023-02-11 17:56:59', 'Tidak Aktif'),
('Biaya Sendiri/Keluarga', 'JK028', 'PKU019', '', 'Tidak', '1', 'nama1', '2023-01-31 15:00:16', 'nama1', '2023-01-31 15:00:16', 'Aktif'),
('Beasiswa ADIK', 'JK029', 'PKU019', '', 'Tidak', '2', 'nama1', '2023-01-31 15:00:29', 'nama1', '2023-01-31 15:00:29', 'Aktif'),
('Beasiswa BIDIKMISI', 'JK030', 'PKU019', '', 'Tidak', '3', 'nama1', '2023-01-31 15:00:46', 'nama1', '2023-01-31 15:00:46', 'Aktif'),
('Beasiswa PPA', 'JK031', 'PKU019', '', 'Tidak', '4', 'nama1', '2023-01-31 15:01:01', 'nama1', '2023-01-31 15:01:01', 'Aktif'),
('Beasiswa AFIRMASI', 'JK032', 'PKU019', '', 'Tidak', '5', 'nama1', '2023-01-31 15:01:15', 'nama1', '2023-01-31 15:01:15', 'Aktif'),
('Beasiswa Perusahaan/Swasta', 'JK033', 'PKU019', '', 'Tidak', '6', 'nama1', '2023-01-31 15:01:32', 'nama1', '2023-01-31 15:01:32', 'Aktif'),
('Lainnya, tuliskan', 'JK034', 'PKU019', 'f1202', 'Ya', '7', 'nama1', '2023-01-31 15:01:49', 'nama1', '2023-02-01 05:42:56', 'Aktif'),
('Sangat Erat', 'JK035', 'PKU020', '', 'Tidak', '1', 'nama1', '2023-01-31 15:02:15', 'nama1', '2023-01-31 15:02:15', 'Aktif'),
('Erat', 'JK036', 'PKU020', '', 'Tidak', '2', 'nama1', '2023-01-31 15:02:26', 'nama1', '2023-01-31 15:02:26', 'Aktif'),
('Cukup Erat', 'JK037', 'PKU020', '', 'Tidak', '3', 'nama1', '2023-01-31 15:02:38', 'nama1', '2023-01-31 15:02:38', 'Aktif'),
('Kurang Erat', 'JK038', 'PKU020', '', 'Tidak', '4', 'nama1', '2023-01-31 15:02:54', 'nama1', '2023-01-31 15:02:54', 'Aktif'),
('Tidak Sama Sekali', 'JK039', 'PKU020', '', 'Tidak', '5', 'nama1', '2023-01-31 15:03:04', 'nama1', '2023-01-31 15:03:04', 'Aktif'),
('Setingkat Lebih Tinggi', 'JK040', 'PKU021', '', 'Tidak', '1', 'nama1', '2023-01-31 15:03:19', 'nama1', '2023-01-31 15:03:19', 'Aktif'),
('Tingkat yang Sama', 'JK041', 'PKU021', '', 'Tidak', '2', 'nama1', '2023-01-31 15:03:33', 'nama1', '2023-01-31 15:03:33', 'Aktif'),
('Setingkat Lebih Rendah', 'JK042', 'PKU021', '', 'Tidak', '3', 'nama1', '2023-01-31 15:03:54', 'nama1', '2023-01-31 15:03:54', 'Aktif'),
('Tidak Perlu Pendidikan Tinggi', 'JK043', 'PKU021', '', 'Tidak', '4', 'nama1', '2023-01-31 15:04:16', 'nama1', '2023-01-31 15:04:16', 'Aktif'),
('Sangat Rendah', 'JK044', 'PKU022', '', 'Tidak', '1', 'nama1', '2023-01-31 15:04:25', 'nama1', '2023-01-31 15:04:25', 'Aktif'),
('Rendah', 'JK045', 'PKU022', '', 'Tidak', '2', 'nama1', '2023-01-31 15:04:50', 'nama1', '2023-01-31 15:04:50', 'Aktif'),
('Sedang', 'JK046', 'PKU022', '', 'Tidak', '3', 'nama1', '2023-01-31 15:05:00', 'nama1', '2023-01-31 15:05:00', 'Aktif'),
('Tinggi', 'JK047', 'PKU022', '', 'Tidak', '4', 'nama1', '2023-01-31 15:05:10', 'nama1', '2023-01-31 15:05:10', 'Aktif'),
('Sangat Tinggi', 'JK048', 'PKU022', '', 'Tidak', '5', 'nama1', '2023-01-31 15:05:19', 'nama1', '2023-01-31 15:05:19', 'Aktif'),
('Sangat Rendah', 'JK049', 'PKU023', '', 'Tidak', '1', 'nama1', '2023-01-31 15:05:33', 'nama1', '2023-01-31 15:05:33', 'Aktif'),
('Rendah', 'JK050', 'PKU023', '', 'Tidak', '2', 'nama1', '2023-01-31 15:05:44', 'nama1', '2023-01-31 15:05:44', 'Aktif'),
('Sedang', 'JK051', 'PKU023', '', 'Tidak', '3', 'nama1', '2023-01-31 15:06:14', 'nama1', '2023-01-31 15:06:14', 'Aktif'),
('Tinggi', 'JK052', 'PKU023', '', 'Tidak', '4', 'nama1', '2023-01-31 15:06:21', 'nama1', '2023-01-31 15:06:21', 'Aktif'),
('Sangat Tinggi', 'JK053', 'PKU023', '', 'Tidak', '5', 'nama1', '2023-01-31 15:06:32', 'nama1', '2023-01-31 15:06:32', 'Aktif'),
('Sangat Rendah', 'JK054', 'PKU024', '', 'Tidak', '1', 'nama1', '2023-01-31 15:06:44', 'nama1', '2023-01-31 15:06:44', 'Aktif'),
('Rendah', 'JK055', 'PKU024', '', 'Tidak', '2', 'nama1', '2023-01-31 15:07:10', 'nama1', '2023-01-31 15:07:10', 'Aktif'),
('Sedang', 'JK056', 'PKU024', '', 'Tidak', '3', 'nama1', '2023-01-31 15:07:18', 'nama1', '2023-01-31 15:07:18', 'Aktif'),
('Tinggi', 'JK057', 'PKU024', '', 'Tidak', '4', 'nama1', '2023-01-31 15:07:31', 'nama1', '2023-01-31 15:07:31', 'Aktif'),
('Sangat Tinggi', 'JK058', 'PKU024', '', 'Tidak', '5', 'nama1', '2023-01-31 15:07:45', 'nama1', '2023-01-31 15:07:45', 'Aktif'),
('Sangat Rendah', 'JK059', 'PKU025', '', 'Tidak', '1', 'nama1', '2023-01-31 15:07:56', 'nama1', '2023-01-31 15:07:56', 'Aktif'),
('Rendah', 'JK060', 'PKU025', '', 'Tidak', '2', 'nama1', '2023-01-31 15:08:12', 'nama1', '2023-01-31 15:08:12', 'Aktif'),
('Sedang', 'JK061', 'PKU025', '', 'Tidak', '3', 'nama1', '2023-01-31 15:08:29', 'nama1', '2023-01-31 15:08:29', 'Aktif'),
('Tinggi', 'JK062', 'PKU025', '', 'Tidak', '4', 'nama1', '2023-01-31 15:08:38', 'nama1', '2023-01-31 15:08:38', 'Aktif'),
('Sangat Tinggi', 'JK063', 'PKU025', '', 'Tidak', '5', 'nama1', '2023-01-31 15:08:50', 'nama1', '2023-01-31 15:08:50', 'Aktif'),
('Sangat Rendah', 'JK064', 'PKU026', '', 'Tidak', '1', 'nama1', '2023-01-31 15:09:16', 'nama1', '2023-01-31 15:09:16', 'Aktif'),
('Rendah', 'JK065', 'PKU026', '', 'Tidak', '2', 'nama1', '2023-01-31 15:09:42', 'nama1', '2023-01-31 15:09:42', 'Aktif'),
('Sedang', 'JK066', 'PKU026', '', 'Tidak', '3', 'nama1', '2023-01-31 15:09:51', 'nama1', '2023-01-31 15:09:51', 'Aktif'),
('Tinggi', 'JK067', 'PKU026', '', 'Tidak', '4', 'nama1', '2023-01-31 15:10:05', 'nama1', '2023-01-31 15:10:05', 'Aktif'),
('Sangat Tinggi', 'JK068', 'PKU026', '', 'Tidak', '5', 'nama1', '2023-01-31 15:10:18', 'nama1', '2023-01-31 15:10:18', 'Aktif'),
('Sangat Rendah', 'JK069', 'PKU027', '', 'Tidak', '1', 'nama1', '2023-01-31 15:10:32', 'nama1', '2023-01-31 15:10:32', 'Aktif'),
('Rendah', 'JK070', 'PKU027', '', 'Tidak', '2', 'nama1', '2023-01-31 15:10:39', 'nama1', '2023-01-31 15:10:39', 'Aktif'),
('Sedang', 'JK071', 'PKU027', '', 'Tidak', '3', 'nama1', '2023-01-31 15:10:50', 'nama1', '2023-01-31 15:10:50', 'Aktif'),
('Tinggi', 'JK072', 'PKU027', '', 'Tidak', '4', 'nama1', '2023-01-31 15:11:02', 'nama1', '2023-01-31 15:11:02', 'Aktif'),
('Sangat Tinggi', 'JK073', 'PKU027', '', 'Tidak', '5', 'nama1', '2023-01-31 15:11:15', 'nama1', '2023-01-31 15:11:15', 'Aktif'),
('Sangat Rendah', 'JK074', 'PKU028', '', 'Tidak', '1', 'nama1', '2023-01-31 15:11:27', 'nama1', '2023-01-31 15:11:27', 'Aktif'),
('Rendah', 'JK075', 'PKU028', '', 'Tidak', '2', 'nama1', '2023-01-31 15:11:46', 'nama1', '2023-01-31 15:11:46', 'Aktif'),
('Sedang', 'JK076', 'PKU028', '', 'Tidak', '3', 'nama1', '2023-01-31 15:11:56', 'nama1', '2023-01-31 15:11:56', 'Aktif'),
('Tinggi', 'JK077', 'PKU028', '', 'Tidak', '4', 'nama1', '2023-01-31 15:12:07', 'nama1', '2023-01-31 15:12:07', 'Aktif'),
('Sangat Tinggi', 'JK078', 'PKU028', '', 'Tidak', '5', 'nama1', '2023-01-31 15:12:20', 'nama1', '2023-01-31 15:12:20', 'Aktif'),
('Sangat Rendah', 'JK079', 'PKU029', '', 'Tidak', '1', 'nama1', '2023-01-31 15:12:29', 'nama1', '2023-01-31 15:12:29', 'Aktif'),
('Rendah', 'JK080', 'PKU029', '', 'Tidak', '2', 'nama1', '2023-01-31 15:12:37', 'nama1', '2023-01-31 15:12:37', 'Aktif'),
('Sedang', 'JK081', 'PKU029', '', 'Tidak', '3', 'nama1', '2023-01-31 15:12:44', 'nama1', '2023-01-31 15:12:44', 'Aktif'),
('Tinggi', 'JK082', 'PKU029', '', 'Tidak', '4', 'nama1', '2023-01-31 15:12:54', 'nama1', '2023-01-31 15:12:54', 'Aktif'),
('Sangat Tinggi', 'JK083', 'PKU029', '', 'Tidak', '5', 'nama1', '2023-01-31 15:13:01', 'nama1', '2023-01-31 15:13:01', 'Aktif'),
('Sangat Rendah', 'JK084', 'PKU030', '', 'Tidak', '1', 'nama1', '2023-01-31 15:13:09', 'nama1', '2023-01-31 15:13:09', 'Aktif'),
('Rendah', 'JK085', 'PKU030', '', 'Tidak', '2', 'nama1', '2023-01-31 15:13:28', 'nama1', '2023-01-31 15:13:28', 'Aktif'),
('Sedang', 'JK086', 'PKU030', '', 'Tidak', '3', 'nama1', '2023-01-31 15:13:35', 'nama1', '2023-01-31 15:13:35', 'Aktif'),
('Tinggi', 'JK087', 'PKU030', '', 'Tidak', '4', 'nama1', '2023-01-31 15:14:05', 'nama1', '2023-01-31 15:14:05', 'Aktif'),
('Sangat Tinggi', 'JK088', 'PKU030', '', 'Tidak', '5', 'nama1', '2023-01-31 15:14:29', 'nama1', '2023-01-31 15:14:29', 'Aktif'),
('Sangat Rendah', 'JK089', 'PKU031', '', 'Tidak', '1', 'nama1', '2023-01-31 15:14:41', 'nama1', '2023-01-31 15:14:41', 'Aktif'),
('Rendah', 'JK090', 'PKU031', '', 'Tidak', '2', 'nama1', '2023-01-31 15:14:49', 'nama1', '2023-01-31 15:14:49', 'Aktif'),
('Sedang', 'JK091', 'PKU031', '', 'Tidak', '3', 'nama1', '2023-01-31 15:14:56', 'nama1', '2023-01-31 15:14:56', 'Aktif'),
('Tinggi', 'JK092', 'PKU031', '', 'Tidak', '4', 'nama1', '2023-01-31 15:15:06', 'nama1', '2023-01-31 15:15:06', 'Aktif'),
('Sangat Tinggi', 'JK093', 'PKU031', '', 'Tidak', '5', 'nama1', '2023-01-31 15:15:14', 'nama1', '2023-01-31 15:15:14', 'Aktif'),
('Sangat Rendah', 'JK094', 'PKU032', '', 'Tidak', '1', 'nama1', '2023-01-31 15:15:26', 'nama1', '2023-01-31 15:15:26', 'Aktif'),
('Rendah', 'JK095', 'PKU032', '', 'Tidak', '2', 'nama1', '2023-01-31 15:15:50', 'nama1', '2023-01-31 15:15:50', 'Aktif'),
('Sedang', 'JK096', 'PKU032', '', 'Tidak', '3', 'nama1', '2023-01-31 15:15:56', 'nama1', '2023-01-31 15:15:56', 'Aktif'),
('Tinggi', 'JK097', 'PKU032', '', 'Tidak', '4', 'nama1', '2023-01-31 15:16:05', 'nama1', '2023-01-31 15:16:05', 'Aktif'),
('Sangat Tinggi', 'JK098', 'PKU032', '', 'Tidak', '5', 'nama1', '2023-01-31 15:16:13', 'nama1', '2023-01-31 15:16:13', 'Aktif'),
('Sangat Rendah', 'JK099', 'PKU033', '', 'Tidak', '1', 'nama1', '2023-01-31 15:16:27', 'nama1', '2023-01-31 15:16:27', 'Aktif'),
('Rendah', 'JK100', 'PKU033', '', 'Tidak', '2', 'nama1', '2023-01-31 15:16:34', 'nama1', '2023-01-31 15:16:34', 'Aktif'),
('Sedang', 'JK101', 'PKU033', '', 'Tidak', '3', 'nama1', '2023-01-31 15:16:41', 'nama1', '2023-01-31 15:16:41', 'Aktif'),
('Tinggi', 'JK102', 'PKU033', '', 'Tidak', '4', 'nama1', '2023-01-31 15:16:55', 'nama1', '2023-01-31 15:16:55', 'Aktif'),
('Sangat Tinggi', 'JK103', 'PKU033', '', 'Tidak', '5', 'nama1', '2023-01-31 15:17:06', 'nama1', '2023-01-31 15:17:06', 'Aktif'),
('Sangat Rendah', 'JK104', 'PKU034', '', 'Tidak', '1', 'nama1', '2023-01-31 15:17:20', 'nama1', '2023-01-31 15:17:20', 'Aktif'),
('Rendah', 'JK105', 'PKU034', '', 'Tidak', '2', 'nama1', '2023-01-31 15:17:35', 'nama1', '2023-01-31 15:17:35', 'Aktif'),
('Sedang', 'JK106', 'PKU034', '', 'Tidak', '3', 'nama1', '2023-01-31 15:17:46', 'nama1', '2023-01-31 15:17:46', 'Aktif'),
('Tinggi', 'JK107', 'PKU034', '', 'Tidak', '4', 'nama1', '2023-01-31 15:18:14', 'nama1', '2023-01-31 15:18:14', 'Aktif'),
('Sangat Tinggi', 'JK108', 'PKU034', '', 'Tidak', '5', 'nama1', '2023-01-31 15:18:24', 'nama1', '2023-01-31 15:18:24', 'Aktif'),
('Sangat Rendah', 'JK109', 'PKU035', '', 'Tidak', '1', 'nama1', '2023-01-31 15:18:33', 'nama1', '2023-01-31 15:18:33', 'Aktif'),
('Rendah', 'JK110', 'PKU035', '', 'Tidak', '2', 'nama1', '2023-01-31 15:18:42', 'nama1', '2023-01-31 15:18:42', 'Aktif'),
('Sedang', 'JK111', 'PKU035', '', 'Tidak', '3', 'nama1', '2023-01-31 15:18:51', 'nama1', '2023-01-31 15:18:51', 'Aktif'),
('Tinggi', 'JK112', 'PKU035', '', 'Tidak', '4', 'nama1', '2023-01-31 15:18:58', 'nama1', '2023-01-31 15:18:58', 'Aktif'),
('Sangat Tinggi', 'JK113', 'PKU035', '', 'Tidak', '5', 'nama1', '2023-01-31 15:19:19', 'nama1', '2023-01-31 15:19:19', 'Aktif'),
('Sangat Besar', 'JK114', 'PKU036', '', 'Tidak', '1', 'nama1', '2023-01-31 15:19:39', 'nama1', '2023-01-31 15:19:39', 'Aktif'),
('Besar', 'JK115', 'PKU036', '', 'Tidak', '2', 'nama1', '2023-01-31 15:23:58', 'nama1', '2023-01-31 15:23:58', 'Aktif'),
('Cukup Besar', 'JK116', 'PKU036', '', 'Tidak', '3', 'nama1', '2023-01-31 15:24:10', 'nama1', '2023-01-31 15:24:10', 'Aktif'),
('Kurang Besar', 'JK117', 'PKU036', '', 'Tidak', '4', 'nama1', '2023-01-31 15:24:24', 'nama1', '2023-01-31 15:24:24', 'Aktif'),
('Tidak Sama Sekali', 'JK118', 'PKU036', '', 'Tidak', '5', 'nama1', '2023-01-31 15:24:36', 'nama1', '2023-01-31 15:24:36', 'Aktif'),
('Sangat Besar', 'JK119', 'PKU037', '', 'Tidak', '1', 'nama1', '2023-01-31 15:24:53', 'nama1', '2023-01-31 15:24:53', 'Aktif'),
('Besar', 'JK120', 'PKU037', '', 'Tidak', '2', 'nama1', '2023-01-31 15:25:02', 'nama1', '2023-01-31 15:25:02', 'Aktif'),
('Cukup Besar', 'JK121', 'PKU037', '', 'Tidak', '3', 'nama1', '2023-01-31 15:25:15', 'nama1', '2023-01-31 15:25:15', 'Aktif'),
('Kurang Besar', 'JK122', 'PKU037', '', 'Tidak', '4', 'nama1', '2023-01-31 15:25:24', 'nama1', '2023-01-31 15:25:24', 'Aktif'),
('Tidak Sama Sekali', 'JK123', 'PKU037', '', 'Tidak', '5', 'nama1', '2023-01-31 15:25:37', 'nama1', '2023-01-31 15:25:37', 'Aktif'),
('Sangat Besar', 'JK124', 'PKU038', '', 'Tidak', '1', 'nama1', '2023-01-31 15:25:48', 'nama1', '2023-01-31 15:25:48', 'Aktif'),
('Besar', 'JK125', 'PKU038', '', 'Tidak', '2', 'nama1', '2023-01-31 15:26:14', 'nama1', '2023-01-31 15:26:14', 'Aktif'),
('Cukup Besar', 'JK126', 'PKU038', '', 'Tidak', '3', 'nama1', '2023-01-31 15:26:24', 'nama1', '2023-01-31 15:26:24', 'Aktif'),
('Kurang Besar', 'JK127', 'PKU038', '', 'Tidak', '4', 'nama1', '2023-01-31 15:26:37', 'nama1', '2023-01-31 15:26:37', 'Aktif'),
('Tidak Sama Sekali', 'JK128', 'PKU038', '', 'Tidak', '5', 'nama1', '2023-01-31 15:27:32', 'nama1', '2023-01-31 15:27:32', 'Aktif'),
('Sangat Besar', 'JK129', 'PKU039', '', 'Tidak', '1', 'nama1', '2023-01-31 15:27:44', 'nama1', '2023-01-31 15:27:44', 'Aktif'),
('Besar', 'JK130', 'PKU039', '', 'Tidak', '2', 'nama1', '2023-01-31 15:27:51', 'nama1', '2023-01-31 15:27:51', 'Aktif'),
('Cukup Besar', 'JK131', 'PKU039', '', 'Tidak', '3', 'nama1', '2023-01-31 15:28:00', 'nama1', '2023-01-31 15:28:00', 'Aktif'),
('Kurang Besar', 'JK132', 'PKU039', '', 'Tidak', '4', 'nama1', '2023-01-31 15:28:09', 'nama1', '2023-01-31 15:28:09', 'Aktif'),
('Tidak Sama Sekali', 'JK133', 'PKU039', '', 'Tidak', '5', 'nama1', '2023-01-31 15:28:19', 'nama1', '2023-01-31 15:28:19', 'Aktif'),
('Sangat Besar', 'JK134', 'PKU040', '', 'Tidak', '1', 'nama1', '2023-01-31 15:28:35', 'nama1', '2023-01-31 15:28:35', 'Aktif'),
('Besar', 'JK135', 'PKU040', '', 'Tidak', '2', 'nama1', '2023-01-31 15:28:52', 'nama1', '2023-01-31 15:28:52', 'Aktif'),
('Cukup Besar', 'JK136', 'PKU040', '', 'Tidak', '3', 'nama1', '2023-01-31 15:29:04', 'nama1', '2023-01-31 15:29:04', 'Aktif'),
('Kurang Besar', 'JK137', 'PKU040', '', 'Tidak', '4', 'nama1', '2023-01-31 15:29:15', 'nama1', '2023-01-31 15:29:15', 'Aktif'),
('Tidak Sama Sekali', 'JK138', 'PKU040', '', 'Tidak', '5', 'nama1', '2023-01-31 15:29:25', 'nama1', '2023-01-31 15:29:25', 'Aktif'),
('Sangat Besar', 'JK139', 'PKU041', '', 'Tidak', '1', 'nama1', '2023-01-31 15:29:36', 'nama1', '2023-01-31 15:29:36', 'Aktif'),
('Besar', 'JK140', 'PKU041', '', 'Tidak', '2', 'nama1', '2023-01-31 15:29:48', 'nama1', '2023-01-31 15:29:48', 'Aktif'),
('Cukup Besar', 'JK141', 'PKU041', '', 'Tidak', '3', 'nama1', '2023-01-31 15:29:57', 'nama1', '2023-01-31 15:29:57', 'Aktif'),
('Kurang Besar', 'JK142', 'PKU041', '', 'Tidak', '4', 'nama1', '2023-01-31 15:30:10', 'nama1', '2023-01-31 15:30:10', 'Aktif'),
('Tidak Sama Sekali', 'JK143', 'PKU041', '', 'Tidak', '5', 'nama1', '2023-01-31 15:30:21', 'nama1', '2023-01-31 15:30:21', 'Aktif'),
('Sangat Besar', 'JK144', 'PKU042', '', 'Tidak', '1', 'nama1', '2023-01-31 15:30:33', 'nama1', '2023-01-31 15:30:33', 'Aktif'),
('Besar', 'JK145', 'PKU042', '', 'Tidak', '2', 'nama1', '2023-01-31 15:31:42', 'nama1', '2023-01-31 15:31:42', 'Aktif'),
('Cukup Besar', 'JK146', 'PKU042', '', 'Tidak', '3', 'nama1', '2023-01-31 15:32:01', 'nama1', '2023-01-31 15:32:01', 'Aktif'),
('Kurang Besar', 'JK147', 'PKU042', '', 'Tidak', '4', 'nama1', '2023-01-31 15:32:10', 'nama1', '2023-01-31 15:32:10', 'Aktif'),
('Tidak Sama Sekali', 'JK148', 'PKU042', '', 'Tidak', '5', 'nama1', '2023-01-31 15:32:23', 'nama1', '2023-01-31 15:32:23', 'Aktif'),
('Kira-kira berapa bulan sebelum lulus?', 'JK149', 'PKU043', 'f302', 'Ya', '1', 'nama1', '2023-01-31 15:32:41', 'nama1', '2023-02-01 05:48:17', 'Aktif'),
('Kira-kira berapa bulan sesudah lulus?', 'JK150', 'PKU043', 'f303', 'Ya', '2', 'nama1', '2023-01-31 15:33:12', 'nama1', '2023-02-11 14:49:01', 'Aktif'),
('Saya tidak mencari kerja', 'JK151', 'PKU043', '', 'Tidak', '3', 'nama1', '2023-01-31 15:33:34', 'nama1', '2023-01-31 15:33:34', 'Aktif'),
('Melalui iklan di koran/majalah, brosur', 'JK152', 'PKU044', 'f401', 'Tidak', '', 'nama1', '2023-01-31 15:34:00', 'nama1', '2023-01-31 15:34:00', 'Aktif'),
('Melamar ke perusahaan tanpa mengetahui lowongan yang ada', 'JK153', 'PKU044', 'f402', 'Tidak', '', 'nama1', '2023-01-31 15:34:27', 'nama1', '2023-01-31 15:34:27', 'Aktif'),
('Pergi ke bursa / pameran kerja', 'JK154', 'PKU044', 'f403', 'Tidak', '', 'nama1', '2023-01-31 15:34:47', 'nama1', '2023-01-31 15:34:47', 'Aktif'),
('Mencari lewat internet / iklan online / milis', 'JK155', 'PKU044', 'f404', 'Tidak', '', 'nama1', '2023-01-31 15:35:26', 'nama1', '2023-01-31 15:35:26', 'Aktif'),
('Dihubungi oleh perusahaan', 'JK156', 'PKU044', 'f405', 'Tidak', '', 'nama1', '2023-01-31 15:35:39', 'nama1', '2023-01-31 15:35:39', 'Aktif'),
('Menghubungi Kemenakertrans', 'JK157', 'PKU044', 'f406', 'Tidak', '', 'nama1', '2023-01-31 15:35:55', 'nama1', '2023-01-31 15:35:55', 'Aktif'),
('Menghubungi agen tenaga kerja komersial/swasta', 'JK158', 'PKU044', 'f407', 'Tidak', '', 'nama1', '2023-01-31 15:36:07', 'nama1', '2023-01-31 15:36:07', 'Aktif'),
('Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas	', 'JK159', 'PKU044', 'f408', 'Tidak', '', 'nama1', '2023-01-31 15:36:23', 'nama1', '2023-01-31 15:36:23', 'Aktif'),
('Menghubungi kantor kemahasiswaan / hubungan alumni', 'JK160', 'PKU044', 'f409', 'Tidak', '', 'nama1', '2023-01-31 15:36:37', 'nama1', '2023-01-31 15:36:37', 'Aktif'),
('Membangun jejaring (network) sejak masih kuliah', 'JK161', 'PKU044', 'f410', 'Tidak', '', 'nama1', '2023-01-31 15:37:00', 'nama1', '2023-01-31 15:37:00', 'Aktif'),
('Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)', 'JK162', 'PKU044', 'f411', 'Tidak', '', 'nama1', '2023-01-31 15:37:13', 'nama1', '2023-01-31 15:37:13', 'Aktif'),
('Membangun bisnis sendiri', 'JK163', 'PKU044', 'f412', 'Tidak', '', 'nama1', '2023-01-31 15:37:28', 'nama1', '2023-01-31 15:37:28', 'Aktif'),
('Melalui penempatan kerja atau magang', 'JK164', 'PKU044', 'f413', 'Tidak', '', 'nama1', '2023-01-31 15:37:43', 'nama1', '2023-01-31 15:37:43', 'Aktif'),
('Bekerja di tempat yang sama dengan tempat kerja semasa kuliah', 'JK165', 'PKU044', 'f414', 'Tidak', '', 'nama1', '2023-01-31 15:38:11', 'nama1', '2023-01-31 15:38:11', 'Aktif'),
('Lainnya', 'JK166', 'PKU044', 'f415', 'Ya', '', 'nama1', '2023-01-31 15:38:28', 'nama1', '2023-01-31 15:38:28', 'Aktif'),
('Tidak', 'JK167', 'PKU048', '', 'Tidak', '1', 'nama1', '2023-01-31 15:38:48', 'nama1', '2023-01-31 15:38:48', 'Aktif'),
('Tidak, tapi saya sedang menunggu hasil lamaran kerja', 'JK168', 'PKU048', '', 'Tidak', '2', 'nama1', '2023-01-31 15:39:09', 'nama1', '2023-01-31 15:39:09', 'Aktif'),
('Ya, saya akan mulai bekerja dalam 2 minggu ke depan', 'JK169', 'PKU048', '', 'Tidak', '3', 'nama1', '2023-01-31 15:39:25', 'nama1', '2023-01-31 15:39:25', 'Aktif'),
('Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan', 'JK170', 'PKU048', '', 'Tidak', '4', 'nama1', '2023-01-31 15:39:39', 'nama1', '2023-01-31 15:39:39', 'Aktif'),
('Lainnya', 'JK171', 'PKU048', 'f1002', 'Ya', '5', 'nama1', '2023-01-31 15:39:51', 'nama1', '2023-02-01 05:49:24', 'Aktif'),
('Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya.	', 'JK172', 'PKU049', 'f1601', 'Tidak', '', 'nama1', '2023-01-31 15:40:46', 'nama1', '2023-01-31 15:40:46', 'Aktif'),
('Saya belum mendapatkan pekerjaan yang lebih sesuai.', 'JK173', 'PKU049', 'f1602', 'Tidak', '', 'nama1', '2023-01-31 15:41:00', 'nama1', '2023-01-31 15:41:00', 'Aktif'),
('Di pekerjaan ini saya memeroleh prospek karir yang baik.', 'JK174', 'PKU049', 'f1603', 'Tidak', '', 'nama1', '2023-01-31 15:41:14', 'nama1', '2023-02-05 14:24:46', 'Aktif'),
('Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya.', 'JK175', 'PKU049', 'f1604', 'Tidak', '', 'nama1', '2023-01-31 15:43:09', 'nama1', '2023-01-31 15:43:09', 'Aktif'),
('Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya.	', 'JK176', 'PKU049', 'f1605', 'Tidak', '', 'nama1', '2023-01-31 15:43:20', 'nama1', '2023-01-31 15:43:20', 'Aktif'),
('Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini.', 'JK177', 'PKU049', 'f1606', 'Tidak', '', 'nama1', '2023-01-31 15:43:32', 'nama1', '2023-01-31 15:43:32', 'Aktif'),
('Pekerjaan saya saat ini lebih aman/terjamin/secure', 'JK178', 'PKU049', 'f1607', 'Tidak', '', 'nama1', '2023-01-31 15:43:45', 'nama1', '2023-01-31 15:43:45', 'Aktif'),
('Pekerjaan saya saat ini lebih menarik', 'JK179', 'PKU049', 'f1608', 'Tidak', '', 'nama1', '2023-01-31 15:43:58', 'nama1', '2023-01-31 15:43:58', 'Aktif'),
('Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll.', 'JK180', 'PKU049', 'f1609', 'Tidak', '', 'nama1', '2023-01-31 15:44:53', 'nama1', '2023-01-31 15:44:53', 'Aktif'),
('Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya.', 'JK181', 'PKU049', 'f1610', 'Tidak', '', 'nama1', '2023-01-31 15:45:06', 'nama1', '2023-01-31 15:45:06', 'Aktif'),
('Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya.', 'JK182', 'PKU049', 'f1611', 'Tidak', '', 'nama1', '2023-01-31 15:45:16', 'nama1', '2023-01-31 15:45:16', 'Aktif'),
('Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya	', 'JK183', 'PKU049', 'f1612', 'Tidak', '', 'nama1', '2023-01-31 15:45:33', 'nama1', '2023-01-31 15:45:33', 'Aktif'),
('Lainnya', 'JK184', 'PKU049', 'f1613', 'Ya', '', 'nama1', '2023-01-31 15:45:58', 'nama1', '2023-01-31 15:45:58', 'Aktif'),
('Ya', 'JK185', 'PKU055', '', 'Tidak', 'Ya', 'nama1', '2023-02-01 06:49:54', 'nama1', '2023-02-01 06:49:54', 'Aktif'),
('Tidak', 'JK186', 'PKU055', '', 'Tidak', 'Tidak', 'nama1', '2023-02-01 06:50:09', 'nama1', '2023-02-01 06:50:09', 'Aktif'),
('Industri kendaraan bermotor, trailer dan semi trailer', 'JK187', 'PKU056', '', 'Tidak', 'Industri kendaraan bermotor, trailer dan semi trailer', 'nama1', '2023-02-01 06:50:34', 'nama1', '2023-02-01 08:18:14', 'Aktif'),
('Jasa hukum dan akuntansi', 'JK188', 'PKU056', '', 'Tidak', 'Jasa hukum dan akuntansi', 'nama1', '2023-02-01 06:50:52', 'nama1', '2023-02-01 08:18:32', 'Aktif'),
('Perdagangan, reparasi dan perawatan mobil dan sepeda motor', 'JK189', 'PKU056', '', 'Tidak', 'Perdagangan, reparasi dan perawatan mobil dan sepeda motor', 'nama1', '2023-02-01 06:51:03', 'nama1', '2023-02-01 08:18:49', 'Aktif'),
('Industri mesin dan perlengkapan', 'JK190', 'PKU056', '', 'Tidak', 'Industri mesin dan perlengkapan', 'nama1', '2023-02-01 06:51:25', 'nama1', '2023-02-01 08:19:00', 'Aktif'),
('Jasa pendidikan', 'JK191', 'PKU056', '', 'Tidak', 'Jasa pendidikan', 'nama1', '2023-02-01 06:51:41', 'nama1', '2023-02-01 08:19:18', 'Aktif'),
('Industri bahan kimia dan barang dari bahan kimia', 'JK192', 'PKU056', '', 'Tidak', 'Industri bahan kimia dan barang dari bahan kimia', 'nama1', '2023-02-01 06:51:54', 'nama1', '2023-02-01 08:19:26', 'Aktif'),
('Industri kayu, barang dari kayu dan gabus (tidak termasuk furnitur) dan barang anyaman dari bambu, rotan dan sejenisnya', 'JK193', 'PKU056', '', 'Tidak', 'Industri kayu, barang dari kayu dan gabus (tidak termasuk furnitur) dan barang anyaman dari bambu, rotan dan sejenisnya', 'nama1', '2023-02-01 06:52:11', 'nama1', '2023-02-01 08:19:34', 'Aktif'),
('Industri barang logam, bukan mesin dan peralatan', 'JK194', 'PKU056', '', 'Tidak', 'Industri barang logam, bukan mesin dan peralatan', 'nama1', '2023-02-01 06:52:25', 'nama1', '2023-02-01 08:19:43', 'Aktif'),
('Industri karet, barang dari karet dan plastik', 'JK195', 'PKU056', '', 'Tidak', 'Industri karet, barang dari karet dan plastik', 'nama1', '2023-02-01 06:52:35', 'nama1', '2023-02-01 08:19:51', 'Aktif'),
('Earphone Bluetooth', 'JK196', 'PKU060', '', 'Tidak', 'Earphone Bluetooth', 'nama1', '2023-02-01 08:23:45', 'nama1', '2023-02-01 08:23:45', 'Aktif'),
('Hardisk', 'JK197', 'PKU060', '', 'Tidak', 'Hardisk', 'nama1', '2023-02-01 08:23:56', 'nama1', '2023-02-01 08:23:56', 'Aktif'),
('Tas', 'JK198', 'PKU060', '', 'Tidak', 'Tas', 'nama1', '2023-02-01 08:24:11', 'nama1', '2023-02-01 08:24:11', 'Aktif'),
('Powerbank', 'JK199', 'PKU060', '', 'Tidak', 'Powerbank', 'nama1', '2023-02-01 08:24:42', 'nama1', '2023-02-01 08:24:42', 'Aktif'),
('Tripod HP Ringlight Stand', 'JK200', 'PKU060', '', 'Tidak', 'Tripod HP Ringlight Stand', 'nama1', '2023-02-01 08:24:58', 'nama1', '2023-02-01 08:24:58', 'Aktif'),
('Staff', 'JK201', 'PKU061', '', 'Tidak', 'Staff', 'nama1', '2023-02-01 08:26:04', 'nama1', '2023-02-01 08:26:04', 'Aktif'),
('Foreman / Service Advisor', 'JK202', 'PKU061', '', 'Tidak', 'Foreman / Service Advisor', 'nama1', '2023-02-01 08:26:27', 'nama1', '2023-02-01 08:26:27', 'Aktif'),
('Teknisi Maintenance', 'JK203', 'PKU061', '', 'Tidak', 'Teknisi Maintenance', 'nama1', '2023-02-01 08:26:47', 'nama1', '2023-02-01 08:26:47', 'Aktif'),
('Guru / Instruktur / Dosen', 'JK204', 'PKU061', '', 'Tidak', 'Guru / Instruktur / Dosen', 'nama1', '2023-02-01 08:27:34', 'nama1', '2023-02-01 08:27:34', 'Aktif'),
('Supervisor', 'JK205', 'PKU061', '', 'Tidak', 'Supervisor', 'nama1', '2023-02-01 08:28:31', 'nama1', '2023-02-01 08:28:31', 'Aktif'),
('des99', 'JK206', 'PKU027', 'kod199', 'Ya', '119', 'nama1', '2023-02-03 01:27:35', 'nama1', '2023-02-03 01:28:36', 'Tidak Aktif'),
('23', 'JK207', 'PKU056', '23', 'Ya', '23', 'nama1', '2023-02-05 22:00:41', 'nama1', '2023-02-05 22:01:00', 'Tidak Aktif'),
('tesy', 'JK208', 'PKU041', 'tesyy', 'Tidak', 'tesy', 'nama1', '2023-02-09 03:02:05', 'nama1', '2023-02-09 03:02:52', 'Tidak Aktif'),
('Freelance', 'JK209', 'PKU005', '', 'Tidak', '6', 'nama1', '2023-02-10 10:08:22', 'nama1', '2023-02-10 10:09:34', 'Tidak Aktif'),
('Freelance/Kerja Lepas', 'JK210', 'PKU013', '', 'Tidak', '4', 'nama1', '2023-02-11 17:53:46', 'nama1', '2023-02-11 17:53:46', 'Aktif'),
('Freelance', 'JK211', 'PKU005', '', 'Tidak', '6', 'nama1', '2023-02-16 14:28:26', 'nama1', '2023-02-16 14:29:16', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `ts_kabkota`
--

CREATE TABLE `ts_kabkota` (
  `kabkota_deskripsi` varchar(100) NOT NULL,
  `kabkota_id` varchar(10) NOT NULL,
  `kabkota_provinsi_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ts_kabkota`
--

INSERT INTO `ts_kabkota` (`kabkota_deskripsi`, `kabkota_id`, `kabkota_provinsi_id`) VALUES
('Kab. Batang Hari', '100100', '100000'),
('Kab. Bungo', '100200', '100000'),
('Kab. Sarolangun', '100300', '100000'),
('Kab. Tanjung Jabung Barat', '100400', '100000'),
('Kab. Kerinci', '100500', '100000'),
('Kab. Tebo', '100600', '100000'),
('Kab. Muaro Jambi', '100700', '100000'),
('Kab. Tanjung Jabung Timur', '100800', '100000'),
('Kab. Merangin', '100900', '100000'),
('Kab. Kepulauan Seribu', '10100', '10000'),
('Kota Jambi', '106000', '100000'),
('Kota Sungai Penuh', '106100', '100000'),
('Kab. Musi Banyuasin', '110100', '110000'),
('Kab. Ogan Komering Ilir', '110200', '110000'),
('Kab. Ogan Komering Ulu', '110300', '110000'),
('Kab. Muara Enim', '110400', '110000'),
('Kab. Lahat', '110500', '110000'),
('Kab. Musi Rawas', '110600', '110000'),
('Kab. Banyuasin', '110700', '110000'),
('Kab. Ogan Komering Ulu Timur', '110800', '110000'),
('Kab. Ogan Komering Ulu Selatan', '110900', '110000'),
('Kab. Ogan Ilir', '111000', '110000'),
('Kab. Empat Lawang', '111100', '110000'),
('Kab. Penukal Abab Lematang Ilir', '111200', '110000'),
('Kab. Musi Rawas Utara', '111300', '110000'),
('Kota Palembang', '116000', '110000'),
('Kota Prabumulih', '116100', '110000'),
('Kota Lubuk Linggau', '116200', '110000'),
('Kota Pagar Alam', '116300', '110000'),
('Kab. Lampung Selatan', '120100', '120000'),
('Kab. Lampung Tengah', '120200', '120000'),
('Kab. Lampung Utara', '120300', '120000'),
('Kab. Lampung Barat', '120400', '120000'),
('Kab. Tulang Bawang', '120500', '120000'),
('Kab. Tanggamus', '120600', '120000'),
('Kab. Lampung Timur', '120700', '120000'),
('Kab. Way Kanan', '120800', '120000'),
('Kab. Pesawaran', '120900', '120000'),
('Kab. Pringsewu', '121000', '120000'),
('Kab. Mesuji', '121100', '120000'),
('Kab. Tulang Bawang Barat', '121200', '120000'),
('Kab. Pesisir Barat', '121300', '120000'),
('Kota Bandar Lampung', '126000', '120000'),
('Kota Metro', '126100', '120000'),
('Kab. Sambas', '130100', '130000'),
('Kab. Mempawah', '130200', '130000'),
('Kab. Sanggau', '130300', '130000'),
('Kab. Sintang', '130400', '130000'),
('Kab. Kapuas Hulu', '130500', '130000'),
('Kab. Ketapang', '130600', '130000'),
('Kab. Bengkayang', '130800', '130000'),
('Kab. Landak', '130900', '130000'),
('Kab. Sekadau', '131000', '130000'),
('Kab. Melawi', '131100', '130000'),
('Kab. Kayong Utara', '131200', '130000'),
('Kab. Kuburaya', '131300', '130000'),
('Kota Pontianak', '136000', '130000'),
('Kota Singkawang', '136100', '130000'),
('Kab. Kapuas', '140100', '140000'),
('Kab. Barito Selatan', '140200', '140000'),
('Kab. Barito Utara', '140300', '140000'),
('Kab. Kotawaringin Timur', '140400', '140000'),
('Kab. Kotawaringin Barat', '140500', '140000'),
('Kab. Katingan', '140600', '140000'),
('Kab. Seruyan', '140700', '140000'),
('Kab. Sukamara', '140800', '140000'),
('Kab. Lamandau', '140900', '140000'),
('Kab. Gunung Mas', '141000', '140000'),
('Kab. Pulang Pisau', '141100', '140000'),
('Kab. Murung Raya', '141200', '140000'),
('Kab. Barito Timur', '141300', '140000'),
('Kota Palangka Raya', '146000', '140000'),
('Kab. Banjar', '150100', '150000'),
('Kab. Tanah Laut', '150200', '150000'),
('Kab. Barito Kuala', '150300', '150000'),
('Kab. Tapin', '150400', '150000'),
('Kab. Hulu Sungai Selatan', '150500', '150000'),
('Kab. Hulu Sungai Tengah', '150600', '150000'),
('Kab. Hulu Sungai Utara', '150700', '150000'),
('Kab. Tabalong', '150800', '150000'),
('Kab. Kotabaru', '150900', '150000'),
('Kab. Balangan', '151000', '150000'),
('Kab. Tanah Bumbu', '151100', '150000'),
('Kota Banjarmasin', '156000', '150000'),
('Kota Banjarbaru', '156100', '150000'),
('Kota Jakarta Pusat', '16000', '10000'),
('Kab. Paser', '160100', '160000'),
('Kab. Kutai Kartanegara', '160200', '160000'),
('Kab. Berau', '160300', '160000'),
('Kab. Kutai Barat', '160900', '160000'),
('Kota Jakarta Utara', '16100', '10000'),
('Kab. Kutai Timur', '161000', '160000'),
('Kab. Penajam Paser Utara', '161100', '160000'),
('Kab. Mahakam Ulu', '161200', '160000'),
('Kota Jakarta Barat', '16200', '10000'),
('Kota Jakarta Selatan', '16300', '10000'),
('Kota Jakarta Timur', '16400', '10000'),
('Kota Samarinda', '166000', '160000'),
('Kota Balikpapan', '166100', '160000'),
('Kota Bontang', '166300', '160000'),
('Kab. Bolaang Mongondow', '170100', '170000'),
('Kab. Minahasa', '170200', '170000'),
('Kab. Kep. Sangihe', '170300', '170000'),
('Kab. Kepulauan Talaud', '170400', '170000'),
('Kab. Minahasa Selatan', '170500', '170000'),
('Kab. Minahasa Utara', '170600', '170000'),
('Kab. Bolaang Mongondow Utara', '170800', '170000'),
('Kab. Kepulauan Siau Tagulandang Biaro', '170900', '170000'),
('Kab. Minahasa Tenggara', '171000', '170000'),
('Kab. Bolaang Mongondow Timur', '171100', '170000'),
('Kab. Bolaang Mongondow Selatan', '171200', '170000'),
('Kota Manado', '176000', '170000'),
('Kota Bitung', '176100', '170000'),
('Kota Tomohon', '176200', '170000'),
('Kota Kotamobagu', '176300', '170000'),
('Kab. Banggai Kepulauan', '180100', '180000'),
('Kab. Donggala', '180200', '180000'),
('Kab. Poso', '180300', '180000'),
('Kab. Banggai', '180400', '180000'),
('Kab. Buol', '180500', '180000'),
('Kab. Tolitoli', '180600', '180000'),
('Kab. Morowali', '180700', '180000'),
('Kab. Parigi Moutong', '180800', '180000'),
('Kab. Tojo Una-Una', '180900', '180000'),
('Kab. Sigi', '181000', '180000'),
('Kab. Banggai Laut', '181100', '180000'),
('Kab. Morowali Utara', '181200', '180000'),
('Kota Palu', '186000', '180000'),
('Kab. Maros', '190100', '190000'),
('Kab. Pangkajene Kepulauan', '190200', '190000'),
('Kab. Gowa', '190300', '190000'),
('Kab. Takalar', '190400', '190000'),
('Kab. Jeneponto', '190500', '190000'),
('Kab. Barru', '190600', '190000'),
('Kab. Bone', '190700', '190000'),
('Kab. Wajo', '190800', '190000'),
('Kab. Soppeng', '190900', '190000'),
('Kab. Bantaeng', '191000', '190000'),
('Kab. Bulukumba', '191100', '190000'),
('Kab. Sinjai', '191200', '190000'),
('Kab. Kepulauan Selayar', '191300', '190000'),
('Kab. Pinrang', '191400', '190000'),
('Kab. Sidenreng Rappang', '191500', '190000'),
('Kab. Enrekang', '191600', '190000'),
('Kab. Luwu', '191700', '190000'),
('Kab. Tana Toraja', '191800', '190000'),
('Kab. Luwu Utara', '192400', '190000'),
('Kab. Luwu Timur', '192600', '190000'),
('Kab. Toraja Utara', '192700', '190000'),
('Kota Makassar', '196000', '190000'),
('Kota Parepare', '196100', '190000'),
('Kota Palopo', '196200', '190000'),
('Kab. Konawe', '200100', '200000'),
('Kab. Muna', '200200', '200000'),
('Kab. Buton', '200300', '200000'),
('Kab. Kolaka', '200400', '200000'),
('Kab. Konawe Selatan', '200500', '200000'),
('Kab. Wakatobi', '200600', '200000'),
('Kab. Bombana', '200700', '200000'),
('Kab. Kolaka Utara', '200800', '200000'),
('Kab. Konawe Utara', '200900', '200000'),
('Kab. Buton Utara', '201000', '200000'),
('Kab. Kolaka Timur', '201100', '200000'),
('Kab. Konawe Kepulauan', '201200', '200000'),
('Kab. Muna Barat', '201300', '200000'),
('Kab. Buton Selatan', '201400', '200000'),
('Kab. Buton Tengah', '201600', '200000'),
('Kab. Bogor', '20500', '20000'),
('Kab. Sukabumi', '20600', '20000'),
('Kota Kendari', '206000', '200000'),
('Kota Baubau', '206100', '200000'),
('Kab. Cianjur', '20700', '20000'),
('Kab. Bandung', '20800', '20000'),
('Kab. Sumedang', '21000', '20000'),
('Kab. Maluku Tengah', '210100', '210000'),
('Kab. Maluku Tenggara', '210200', '210000'),
('Kab. Buru', '210300', '210000'),
('Kab. Kepulauan Tanimbar', '210400', '210000'),
('Kab. Seram Bagian Barat', '210500', '210000'),
('Kab. Seram Bagian Timur', '210600', '210000'),
('Kab. Kepulauan Aru', '210700', '210000'),
('Kab. Maluku Barat Daya', '210800', '210000'),
('Kab. Buru Selatan', '210900', '210000'),
('Kab. Garut', '21100', '20000'),
('Kab. Tasikmalaya', '21200', '20000'),
('Kab. Ciamis', '21400', '20000'),
('Kab. Kuningan', '21500', '20000'),
('Kab. Majalengka', '21600', '20000'),
('Kota Ambon', '216000', '210000'),
('Kota Tual', '216100', '210000'),
('Kab. Cirebon', '21700', '20000'),
('Kab. Indramayu', '21800', '20000'),
('Kab. Subang', '21900', '20000'),
('Kab. Purwakarta', '22000', '20000'),
('Kab. Buleleng', '220100', '220000'),
('Kab. Jembrana', '220200', '220000'),
('Kab. Tabanan', '220300', '220000'),
('Kab. Badung', '220400', '220000'),
('Kab. Gianyar', '220500', '220000'),
('Kab. Klungkung', '220600', '220000'),
('Kab. Bangli', '220700', '220000'),
('Kab. Karang Asem', '220800', '220000'),
('Kab. Karawang', '22100', '20000'),
('Kab. Bekasi', '22200', '20000'),
('Kab. Bandung Barat', '22300', '20000'),
('Kab. Pangandaran', '22500', '20000'),
('Kota Denpasar', '226000', '220000'),
('Kab. Lombok Barat', '230100', '230000'),
('Kab. Lombok Tengah', '230200', '230000'),
('Kab. Lombok Timur', '230300', '230000'),
('Kab. Sumbawa', '230400', '230000'),
('Kab. Dompu', '230500', '230000'),
('Kab. Bima', '230600', '230000'),
('Kab. Sumbawa Barat', '230700', '230000'),
('Kab. Lombok Utara', '230800', '230000'),
('Kota Mataram', '236000', '230000'),
('Kota Bima', '236100', '230000'),
('Kab. Kupang', '240100', '240000'),
('Kab. Timor Tengah Selatan', '240300', '240000'),
('Kab. Timor Tengah Utara', '240400', '240000'),
('Kab. Belu', '240500', '240000'),
('Kab. Alor', '240600', '240000'),
('Kab. Flores Timur', '240700', '240000'),
('Kab. Sikka', '240800', '240000'),
('Kab. Ende', '240900', '240000'),
('Kab. Ngada', '241000', '240000'),
('Kab. Manggarai', '241100', '240000'),
('Kab. Sumba Timur', '241200', '240000'),
('Kab. Sumba Barat', '241300', '240000'),
('Kab. Lembata', '241400', '240000'),
('Kab. Rote-Ndao', '241500', '240000'),
('Kab. Manggarai Barat', '241600', '240000'),
('Kab. Nagakeo', '241700', '240000'),
('Kab. Sumba Tengah', '241800', '240000'),
('Kab. Sumba Barat Daya', '241900', '240000'),
('Kab. Manggarai Timur', '242000', '240000'),
('Kab. Sabu Raijua', '242100', '240000'),
('Kab. Malaka', '242200', '240000'),
('Kota Kupang', '246000', '240000'),
('Kab. Jayapura', '250100', '250000'),
('Kab. Biak Numfor', '250200', '250000'),
('Kab. Kepulauan Yapen', '250300', '250000'),
('Kab. Merauke', '250700', '250000'),
('Kab. Jaya Wijaya', '250800', '250000'),
('Kab. Nabire', '250900', '250000'),
('Kab. Paniai', '251000', '250000'),
('Kab. Puncak Jaya', '251100', '250000'),
('Kab. Mimika', '251200', '250000'),
('Kab. Boven Digoel', '251300', '250000'),
('Kab. Mappi', '251400', '250000'),
('Kab. Asmat', '251500', '250000'),
('Kab. Yahukimo', '251600', '250000'),
('Kab. Pegunungan Bintang', '251700', '250000'),
('Kab. Tolikara', '251800', '250000'),
('Kab. Sarmi', '251900', '250000'),
('Kab. Keerom', '252000', '250000'),
('Kab. Waropen', '252600', '250000'),
('Kab. Supiori', '252700', '250000'),
('Kab. Memberamo Raya', '252800', '250000'),
('Kab. Nduga', '252900', '250000'),
('Kab. Lanny Jaya', '253000', '250000'),
('Kab. Membramo Tengah', '253100', '250000'),
('Kab. Yalimo', '253200', '250000'),
('kab. Puncak', '253300', '250000'),
('Kab. Dogiyai', '253400', '250000'),
('Kab. Deiyai', '253500', '250000'),
('Kab. Intan Jaya', '253600', '250000'),
('Kota Jayapura', '256000', '250000'),
('Kota Bandung', '26000', '20000'),
('Kab. Bengkulu Utara', '260100', '260000'),
('Kab. Rejang Lebong', '260200', '260000'),
('Kab. Bengkulu Selatan', '260300', '260000'),
('Kab. Muko-muko', '260400', '260000'),
('Kab. Kepahiang', '260500', '260000'),
('Kab. Lebong', '260600', '260000'),
('Kab. Kaur', '260700', '260000'),
('Kab. Seluma', '260800', '260000'),
('Kab. Bengkulu Tengah', '260900', '260000'),
('Kota Bogor', '26100', '20000'),
('Kota Sukabumi', '26200', '20000'),
('Kota Cirebon', '26300', '20000'),
('Kota Bekasi', '26500', '20000'),
('Kota Depok', '26600', '20000'),
('Kota Bengkulu', '266000', '260000'),
('Kota Cimahi', '26700', '20000'),
('Kota Tasikmalaya', '26800', '20000'),
('Kota Banjar', '26900', '20000'),
('Kab. Pulau Taliabu', '270100', '270000'),
('Kab. Halmahera Tengah', '270200', '270000'),
('Kab. Halmahera Barat', '270300', '270000'),
('Kab. halmahera Utara', '270400', '270000'),
('Kab. Halmahera Selatan', '270500', '270000'),
('Kab. Halmahera Timur', '270600', '270000'),
('Kab. Kepulauan Sula', '270700', '270000'),
('Kab. Kepulauan Morotai', '270800', '270000'),
('Kota Ternate', '276000', '270000'),
('Kota Tidore Kepulauan', '276100', '270000'),
('Kab. Pandeglang', '280100', '280000'),
('Kab. Lebak', '280200', '280000'),
('Kab. Tangerang', '280300', '280000'),
('Kab. Serang', '280400', '280000'),
('Kota Cilegon', '286000', '280000'),
('Kota Tangerang', '286100', '280000'),
('Kota Serang', '286200', '280000'),
('Kota Tangerang Selatan', '286300', '280000'),
('Kab. Bangka', '290100', '290000'),
('Kab. Belitung', '290200', '290000'),
('Kab. Bangka Tengah', '290300', '290000'),
('Kab. Bangka Barat', '290400', '290000'),
('Kab. Bangka Selatan', '290500', '290000'),
('Kab. Belitung Timur', '290600', '290000'),
('Kota Pangkalpinang', '296000', '290000'),
('Kab. Boalemo', '300100', '300000'),
('Kab. Gorontalo', '300200', '300000'),
('Kab. Pohuwato', '300300', '300000'),
('Kab. Bone Bolango', '300400', '300000'),
('Kab. Gorontalo Utara', '300500', '300000'),
('Kab. Cilacap', '30100', '30000'),
('Kab. Banyumas', '30200', '30000'),
('Kab. Purbalingga', '30300', '30000'),
('Kab. Banjarnegara', '30400', '30000'),
('Kab. Kebumen', '30500', '30000'),
('Kab. Purworejo', '30600', '30000'),
('Kota Gorontalo', '306000', '300000'),
('Kab. Wonosobo', '30700', '30000'),
('Kab. Magelang', '30800', '30000'),
('Kab. Boyolali', '30900', '30000'),
('Kab. Klaten', '31000', '30000'),
('Kab. Bintan', '310100', '310000'),
('Kab. Karimun', '310200', '310000'),
('Kab. Natuna', '310300', '310000'),
('Kab. Lingga', '310400', '310000'),
('Kab. Kepulauan Anambas', '310500', '310000'),
('Kab. Sukoharjo', '31100', '30000'),
('Kab. Wonogiri', '31200', '30000'),
('Kab. Karanganyar', '31300', '30000'),
('Kab. Sragen', '31400', '30000'),
('Kab. Grobogan', '31500', '30000'),
('Kab. Blora', '31600', '30000'),
('Kota Batam', '316000', '310000'),
('Kota Tanjungpinang', '316100', '310000'),
('Kab. Rembang', '31700', '30000'),
('Kab. Pati', '31800', '30000'),
('Kab. Kudus', '31900', '30000'),
('Kab. Jepara', '32000', '30000'),
('Kab. Fak-Fak', '320100', '320000'),
('Kab. Kaimana', '320200', '320000'),
('Kab. Teluk Wondama', '320300', '320000'),
('Kab. Teluk Bintuni', '320400', '320000'),
('Kab. Manokwari', '320500', '320000'),
('Kab. Sorong Selatan', '320600', '320000'),
('Kab. Sorong', '320700', '320000'),
('Kab. Raja Ampat', '320800', '320000'),
('Kab. Tambrauw', '320900', '320000'),
('Kab. Demak', '32100', '30000'),
('Kab. Maybrat', '321000', '320000'),
('Kab. Pegunungan Arfak', '321100', '320000'),
('Kab. Manokwari Selatan', '321200', '320000'),
('Kab. Semarang', '32200', '30000'),
('Kab. Temanggung', '32300', '30000'),
('Kab. Kendal', '32400', '30000'),
('Kab. Batang', '32500', '30000'),
('Kab. Pekalongan', '32600', '30000'),
('Kota Sorong', '326000', '320000'),
('Kab. Pemalang', '32700', '30000'),
('Kab. Tegal', '32800', '30000'),
('Kab. Brebes', '32900', '30000'),
('Kab. Mamuju', '330100', '330000'),
('Kab. Pasangkayu', '330200', '330000'),
('Kab. Polewali Mandar', '330300', '330000'),
('Kab. Mamasa', '330400', '330000'),
('Kab. Majene', '330500', '330000'),
('Kab. Mamuju Tengah', '330600', '330000'),
('Kab. Malinau', '340100', '340000'),
('Kab. Bulungan', '340200', '340000'),
('Kab. Tana Tidung', '340300', '340000'),
('Kab. Nunukan', '340500', '340000'),
('Kota Tarakan', '346000', '340000'),
('Belanda', '350100', '350000'),
('Japan', '350200', '350000'),
('Mesir', '350300', '350000'),
('Malaysia', '350400', '350000'),
('Myanmar', '350500', '350000'),
('Filipina', '350600', '350000'),
('Rusia', '350700', '350000'),
('Arab Saudi', '350800', '350000'),
('Singapura', '351000', '350000'),
('Thailand', '351200', '350000'),
('Taiwan', '351300', '350000'),
('Cina', '351400', '350000'),
('Brunei Darussalam', '351500', '350000'),
('Kota Magelang', '36000', '30000'),
('Kota Surakarta', '36100', '30000'),
('Kota Salatiga', '36200', '30000'),
('Kota Semarang', '36300', '30000'),
('Kota Pekalongan', '36400', '30000'),
('Kota Tegal', '36500', '30000'),
('Kab. Bantul', '40100', '40000'),
('Kab. Sleman', '40200', '40000'),
('Kab. Gunung Kidul', '40300', '40000'),
('Kab. Kulon Progo', '40400', '40000'),
('Kota Yogyakarta', '46000', '40000'),
('Kab. Gresik', '50100', '50000'),
('Kab. Sidoarjo', '50200', '50000'),
('Kab. Mojokerto', '50300', '50000'),
('Kab. Jombang', '50400', '50000'),
('Kab. Bojonegoro', '50500', '50000'),
('Kab. Tuban', '50600', '50000'),
('Kab. Lamongan', '50700', '50000'),
('Kab. Madiun', '50800', '50000'),
('Kab. Ngawi', '50900', '50000'),
('Kab. Magetan', '51000', '50000'),
('Kab. Ponorogo', '51100', '50000'),
('Kab. Pacitan', '51200', '50000'),
('Kab. Kediri', '51300', '50000'),
('Kab. Nganjuk', '51400', '50000'),
('Kab. Blitar', '51500', '50000'),
('Kab. Tulungagung', '51600', '50000'),
('Kab. Trenggalek', '51700', '50000'),
('Kab. Malang', '51800', '50000'),
('Kab. Pasuruan', '51900', '50000'),
('Kab. Probolinggo', '52000', '50000'),
('Kab. Lumajang', '52100', '50000'),
('Kab. Bondowoso', '52200', '50000'),
('Kab. Situbondo', '52300', '50000'),
('Kab. Jember', '52400', '50000'),
('Kab. Banyuwangi', '52500', '50000'),
('Kab. Pamekasan', '52600', '50000'),
('Kab. Sampang', '52700', '50000'),
('Kab. Sumenep', '52800', '50000'),
('Kab. Bangkalan', '52900', '50000'),
('Kota Surabaya', '56000', '50000'),
('Kota Malang', '56100', '50000'),
('Kota Madiun', '56200', '50000'),
('Kota Kediri', '56300', '50000'),
('Kota Mojokerto', '56400', '50000'),
('Kota Blitar', '56500', '50000'),
('Kota Pasuruan', '56600', '50000'),
('Kota Probolinggo', '56700', '50000'),
('Kota Batu', '56800', '50000'),
('Kab. Aceh Besar', '60100', '60000'),
('Kab. Pidie', '60200', '60000'),
('Kab. Aceh Utara', '60300', '60000'),
('Kab. Aceh Timur', '60400', '60000'),
('Kab. Aceh Tengah', '60500', '60000'),
('Kab. Aceh Barat', '60600', '60000'),
('Kab. Aceh Selatan', '60700', '60000'),
('Kab. Aceh Tenggara', '60800', '60000'),
('Kab. Simeulue', '61100', '60000'),
('Kab. Bireuen', '61200', '60000'),
('Kab. Aceh Singkil', '61300', '60000'),
('Kab. Aceh Tamiang', '61400', '60000'),
('Kab. Nagan Raya', '61500', '60000'),
('Kab. Aceh Jaya', '61600', '60000'),
('Kab. Aceh Barat Daya', '61700', '60000'),
('Kab. Gayo Lues', '61800', '60000'),
('Kab. Bener Meriah', '61900', '60000'),
('Kab. Pidie Jaya', '62000', '60000'),
('Kota Sabang', '66000', '60000'),
('Kota Banda Aceh', '66100', '60000'),
('Kota Lhokseumawe', '66200', '60000'),
('Kota Langsa', '66300', '60000'),
('Kota Subulussalam', '66400', '60000'),
('Kab. Deli Serdang', '70100', '70000'),
('Kab. Langkat', '70200', '70000'),
('Kab. Karo', '70300', '70000'),
('Kab. Simalungun', '70400', '70000'),
('Kab. Dairi', '70500', '70000'),
('Kab. Asahan', '70600', '70000'),
('Kab. Labuhan Batu', '70700', '70000'),
('Kab. Tapanuli Utara', '70800', '70000'),
('Kab. Tapanuli Tengah', '70900', '70000'),
('Kab. Tapanuli Selatan', '71000', '70000'),
('Kab. Nias', '71100', '70000'),
('Kab. Mandailing Natal', '71500', '70000'),
('Kab. Toba Samosir', '71600', '70000'),
('Kab. Nias Selatan', '71700', '70000'),
('Kab. Pakpak Bharat', '71800', '70000'),
('Kab. Humbang Hasudutan', '71900', '70000'),
('Kab. Samosir', '72000', '70000'),
('Kab. Serdang Bedagai', '72100', '70000'),
('Kab. Batubara', '72200', '70000'),
('Kab. Padang Lawas utara', '72300', '70000'),
('Kab. Padang Lawas', '72400', '70000'),
('Kab. Labuhan Batu Utara', '72500', '70000'),
('Kab. Labuhan Batu Selatan', '72600', '70000'),
('Kab. Nias Barat', '72700', '70000'),
('Kab. Nias Utara', '72800', '70000'),
('Kota Medan', '76000', '70000'),
('Kota Binjai', '76100', '70000'),
('Kota Tebing Tinggi', '76200', '70000'),
('Kota Pematangsiantar', '76300', '70000'),
('Kota Tanjung Balai', '76400', '70000'),
('Kota Sibolga', '76500', '70000'),
('Kota Padang Sidimpuan', '76600', '70000'),
('Kota Gunungsitoli', '76700', '70000'),
('Kab. Agam', '80100', '80000'),
('Kab. Pasaman', '80200', '80000'),
('Kab. Lima Puluh Koto', '80300', '80000'),
('Kab. Solok', '80400', '80000'),
('Kab. Padang Pariaman', '80500', '80000'),
('Kab. Pesisir Selatan', '80600', '80000'),
('Kab. Tanah Datar', '80700', '80000'),
('Kab. Sijunjung', '80800', '80000'),
('Kab. Kepulauan Mentawai', '81000', '80000'),
('Kab. Solok Selatan', '81100', '80000'),
('Kab. Dharmasraya', '81200', '80000'),
('Kab. Pasaman Barat', '81300', '80000'),
('Kota Bukittinggi', '86000', '80000'),
('Kota Padang', '86100', '80000'),
('Kota Padang Panjang', '86200', '80000'),
('Kota Sawah Lunto', '86300', '80000'),
('Kota Solok', '86400', '80000'),
('Kota Payakumbuh', '86500', '80000'),
('Kota Pariaman', '86600', '80000'),
('Kab. Kampar', '90100', '90000'),
('Kab. Bengkalis', '90200', '90000'),
('Kab. Indragiri Hulu', '90400', '90000'),
('Kab. Indragiri Hilir', '90500', '90000'),
('Kab. Pelalawan', '90800', '90000'),
('Kab. Rokan Hulu', '90900', '90000'),
('Kab. Rokan Hilir', '91000', '90000'),
('Kab. Siak', '91100', '90000'),
('Kab. Kuantan Singingi', '91400', '90000'),
('Kab. Kepulauan Meranti', '91500', '90000'),
('Kota Pekanbaru', '96000', '90000'),
('Kota Dumai', '96200', '90000');

-- --------------------------------------------------------

--
-- Table structure for table `ts_laporankuesioner`
--

CREATE TABLE `ts_laporankuesioner` (
  `id_hasilKuesioner` varchar(10) NOT NULL,
  `jawabanKuesioner` text NOT NULL,
  `kode` varchar(255) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ts_laporankuesioner`
--

INSERT INTO `ts_laporankuesioner` (`id_hasilKuesioner`, `jawabanKuesioner`, `kode`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
('HKU001', 'alamat perusahaan', 'AlamatPerusahaanandabekerja', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', 'Ya', 'ApakahandabekerjadigroupperusahaanAstra', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', 'sarann', 'ApasarandarialumniuntukPolmanAstra', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', '2 tahu', 'Dalamduatahunsetelahlulussudahberapakalipindahperusahaan', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', 'dalam 5 tahun', 'Dalamlimatahunsetelahlulussudahberapakalipindahperusahaan', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', 'deskripsi', 'DeskripsiPekerjaan', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', 'doniseptrian17@gmail.com', 'emailmsmh', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', '57401', 'kdpstmsmh', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', '35003', 'kdptimsmh', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', 'nama departmene', 'NamaDepartemenBagian', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', 'nama perrusahaan', 'namaperusahaanbekerja', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', '0320170002170002', 'nik', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', '0320170002', 'nimhsmsmh', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', 'Doni Septrian', 'nmmhsmsmh', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', '12345678', 'Nomortelponperusahaanyangbisadihubungi', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', '123456789123456', 'npwp', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', 'organisasi kemahasiswan', 'OrganisasiKemahasiswaanyangpernahAndaikutiselamakuliahdiPolmanAstrabolehlebihdarisatu', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', 'Earphone Bluetooth', 'Pilihlahhadiahyangmenarikbagialumni', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', 'Staff', 'Posisiandadiperusahaandisaatandapertamakalimendapatpekerjaan', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', '2020', 'tahun_lulus', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', '085747821298', 'telpomsmh', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU001', 'Industri kendaraan bermotor, trailer dan semi trailer', 'Tempatandabekerjasaatinibergerakdibidangapa', 'Doni Septrian', '2023-02-16 07:49:23', 'Doni Septrian', '2023-02-16 07:49:23'),
('HKU002', 'doniseptrian17@gmail.com', 'emailmsmh', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '2', 'f1001', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '', 'f1002', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '4', 'f1101', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '', 'f1102', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f1201', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '', 'f1202', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '5', 'f14', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '1', 'f15', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f1601', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f1602', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f1603', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f1604', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '5', 'f1605', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f1606', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f1607', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f1608', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f1609', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '10', 'f1610', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f1611', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f1612', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '13', 'f1613', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', 'f1614', 'f1614', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '3', 'f1761', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '3', 'f1762', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '3', 'f1763', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '3', 'f1764', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '3', 'f1765', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '3', 'f1766', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '3', 'f1767', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '3', 'f1768', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '3', 'f1769', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '3', 'f1770', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '3', 'f1771', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '3', 'f1772', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '3', 'f1773', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '3', 'f1774', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '', 'f18a', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '', 'f18b', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '', 'f18c', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '', 'f18d', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '1', 'f21', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '2', 'f22', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '3', 'f23', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '4', 'f24', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '5', 'f25', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '5', 'f26', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '5', 'f27', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '1', 'f301', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '3', 'f302', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '', 'f303', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '1', 'f401', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f402', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '1', 'f403', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f404', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '1', 'f405', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f406', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f407', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f408', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f409', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f410', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f411', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f412', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f413', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f414', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', ' ', 'f415', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '', 'f416', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '500', 'f502', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '1', 'f504', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '500', 'f505', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '', 'f506', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '20000', 'f5a1', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '20500', 'f5a2', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', 'namaperusahaan', 'f5b', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '1', 'f5c', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '1', 'f5d', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '3', 'f6', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '1', 'f7', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '1', 'f7a', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '3', 'f8', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '57401', 'kdpstmsmh', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '35003', 'kdptimsmh', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '0320170002170002', 'nik', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '0320170002', 'nimhsmsmh', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', 'Doni Septrian', 'nmmhsmsmh', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '123456789123456', 'npwp', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '2020', 'tahun_lulus', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU002', '085747821298', 'telpomsmh', 'Doni Septrian', '2023-02-16 07:59:31', 'Doni Septrian', '2023-02-16 07:59:31'),
('HKU003', 'rachmadrizkywidodo@gmail.com', 'emailmsmh', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '4', 'f1001', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '', 'f1002', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '4', 'f1101', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '', 'f1102', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '7', 'f1201', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', 'sumberdana lain', 'f1202', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '5', 'f14', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '1', 'f15', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '1', 'f1601', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', ' ', 'f1602', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', ' ', 'f1603', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', ' ', 'f1604', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', ' ', 'f1605', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', ' ', 'f1606', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', ' ', 'f1607', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', ' ', 'f1608', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', ' ', 'f1609', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', ' ', 'f1610', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '11', 'f1611', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '12', 'f1612', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '13', 'f1613', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', 'keterangan lain', 'f1614', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '5', 'f1761', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '5', 'f1762', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '5', 'f1763', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '5', 'f1764', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '5', 'f1765', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '5', 'f1766', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '5', 'f1767', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '5', 'f1768', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '5', 'f1769', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '5', 'f1770', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '5', 'f1771', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '5', 'f1772', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '5', 'f1773', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '5', 'f1774', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '', 'f18a', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '', 'f18b', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '', 'f18c', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '', 'f18d', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '1', 'f21', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '2', 'f22', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '3', 'f23', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '4', 'f24', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '5', 'f25', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '5', 'f26', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '5', 'f27', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '1', 'f301', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '3', 'f302', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '', 'f303', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '1', 'f401', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', ' ', 'f402', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '1', 'f403', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', ' ', 'f404', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '1', 'f405', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', ' ', 'f406', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', ' ', 'f407', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', ' ', 'f408', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', ' ', 'f409', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', ' ', 'f410', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', ' ', 'f411', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', ' ', 'f412', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', ' ', 'f413', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '1', 'f414', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', ' ', 'f415', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '', 'f416', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '500', 'f502', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '1', 'f504', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '500', 'f505', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '', 'f506', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '10000', 'f5a1', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '16000', 'f5a2', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', 'namaPerusahaan', 'f5b', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '1', 'f5c', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '1', 'f5d', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '3', 'f6', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '3', 'f7', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '1', 'f7a', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '3', 'f8', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '57401', 'kdpstmsmh', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '35003', 'kdptimsmh', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '0320170007170007', 'nik', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '0320170007', 'nimhsmsmh', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', 'RACHMAD RIZKY WIDODO', 'nmmhsmsmh', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '123456789012345', 'npwp', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '2020', 'tahun_lulus', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU003', '085814232252', 'telpomsmh', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02', 'RACHMAD RIZKY WIDODO', '2023-02-16 13:57:02'),
('HKU004', 'bekasi', 'AlamatPerusahaanandabekerja', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', 'Tidak', 'ApakahandabekerjadigroupperusahaanAstra', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', 'saran', 'ApasarandarialumniuntukPolmanAstra', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', '4', 'Dalamduatahunsetelahlulussudahberapakalipindahperusahaan', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', '3 kali', 'Dalamlimatahunsetelahlulussudahberapakalipindahperusahaan', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', 'deskripsi pekerjaan', 'DeskripsiPekerjaan', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', 'sitinur@gmail.com', 'emailmsmh', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', '57401', 'kdpstmsmh', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', '35003', 'kdptimsmh', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', 'namabagian', 'NamaDepartemenBagian', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', 'namaPerusahaan', 'namaperusahaanbekerja', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', '0320180011180011', 'nik', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', '0320180011', 'nimhsmsmh', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', 'Siti Nurlaeli', 'nmmhsmsmh', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', '02513432689', 'Nomortelponperusahaanyangbisadihubungi', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', '', 'npwp', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', 'mpm', 'OrganisasiKemahasiswaanyangpernahAndaikutiselamakuliahdiPolmanAstrabolehlebihdarisatu', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', 'Earphone Bluetooth', 'Pilihlahhadiahyangmenarikbagialumni', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', 'Staff', 'Posisiandadiperusahaandisaatandapertamakalimendapatpekerjaan', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', '2021', 'tahun_lulus', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', '089674539188', 'telpomsmh', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU004', 'Industri kendaraan bermotor, trailer dan semi trailer', 'Tempatandabekerjasaatinibergerakdibidangapa', 'Siti Nurlaeli', '2023-02-16 14:46:27', 'Siti Nurlaeli', '2023-02-16 14:46:27'),
('HKU005', 'sitinur@gmail.com', 'emailmsmh', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '5', 'f1001', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', 'freelance', 'f1002', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '4', 'f1101', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '', 'f1102', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '6', 'f1201', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '', 'f1202', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '1', 'f14', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '1', 'f15', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f1601', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f1602', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f1603', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f1604', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f1605', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f1606', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f1607', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f1608', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f1609', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f1610', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '11', 'f1611', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '12', 'f1612', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '13', 'f1613', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', 'keterangan pertanyaan', 'f1614', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '3', 'f1761', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '2', 'f1762', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '4', 'f1763', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '5', 'f1764', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '2', 'f1765', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '5', 'f1766', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '4', 'f1767', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '4', 'f1768', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '3', 'f1769', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '3', 'f1770', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '3', 'f1771', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '3', 'f1772', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '2', 'f1773', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '5', 'f1774', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '', 'f18a', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '', 'f18b', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '', 'f18c', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '', 'f18d', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '2', 'f21', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '3', 'f22', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '3', 'f23', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '3', 'f24', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '3', 'f25', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '3', 'f26', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '4', 'f27', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '2', 'f301', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '', 'f302', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '5', 'f303', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '1', 'f401', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f402', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '1', 'f403', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f404', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '1', 'f405', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f406', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '1', 'f407', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f408', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f409', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f410', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f411', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f412', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f413', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f414', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', ' ', 'f415', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '', 'f416', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '4 bulan', 'f502', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '1', 'f504', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '5000000', 'f505', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '', 'f506', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '10000', 'f5a1', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '16000', 'f5a2', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', 'namaKantor', 'f5b', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '3', 'f5c', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '1', 'f5d', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '3', 'f6', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '3', 'f7', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '1', 'f7a', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '1', 'f8', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '57401', 'kdpstmsmh', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '35003', 'kdptimsmh', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '0320180011180011', 'nik', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '0320180011', 'nimhsmsmh', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', 'Siti Nurlaeli', 'nmmhsmsmh', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '', 'npwp', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '2021', 'tahun_lulus', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08'),
('HKU005', '089674539188', 'telpomsmh', 'Siti Nurlaeli', '2023-02-16 14:50:08', 'Siti Nurlaeli', '2023-02-16 14:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `ts_pertanyaankuesioner`
--

CREATE TABLE `ts_pertanyaankuesioner` (
  `deskripsiPertanyaan` text NOT NULL,
  `id_pku` varchar(10) NOT NULL,
  `kode` text DEFAULT NULL,
  `id_detailPeriode` int(11) NOT NULL,
  `pertanyaan_utama` varchar(11) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_date` datetime NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ts_pertanyaankuesioner`
--

INSERT INTO `ts_pertanyaankuesioner` (`deskripsiPertanyaan`, `id_pku`, `kode`, `id_detailPeriode`, `pertanyaan_utama`, `jenis`, `created_by`, `created_date`, `modified_by`, `modified_date`, `status`) VALUES
('deskripsi12', 'PKU001', 'kode12', 3, 'Ya', 'Combo Box', 'nama1', '2023-01-29 21:05:23', 'nama1', '2023-01-31 08:49:52', 'Tidak Aktif'),
('deskripsi2', 'PKU002', 'kode2', 3, 'Ya', 'Combo Box', 'nama1', '2023-01-29 22:08:57', 'nama1', '2023-01-31 08:49:52', 'Tidak Aktif'),
('deskripsi3', 'PKU003', 'kode3', 3, 'Tidak', 'Combo Box', 'nama1', '2023-01-29 22:11:46', 'nama1', '2023-01-31 08:49:52', 'Tidak Aktif'),
('deskripsi4', 'PKU004', 'kode4', 3, 'Tidak', 'Combo Box', 'nama1', '2023-01-29 22:20:49', 'nama1', '2023-01-31 08:49:52', 'Tidak Aktif'),
('Jelaskan status Anda saat ini?', 'PKU005', 'f8', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:02:29', 'nama1', '2023-01-31 09:02:29', 'Aktif'),
('Apakah Anda telah mendapatkan pekerjaan <= 6 bulan / termasuk bekerja sebelum lulus', 'PKU006', 'f504', 4, 'Tidak', 'Radio Button', 'nama1', '2023-01-31 09:03:16', 'nama1', '2023-01-31 09:03:16', 'Aktif'),
('Dalam berapa bulan Anda mendapatkan pekerjaan?', 'PKU007', 'f502', 4, 'Tidak', 'Text Box', 'nama1', '2023-01-31 09:03:33', 'nama1', '2023-01-31 09:03:33', 'Aktif'),
('Berapa rata-rata pendapatan Anda per bulan? (take home pay)?', 'PKU008', 'f505', 4, 'Tidak', 'Text Box', 'nama1', '2023-01-31 09:03:50', 'nama1', '2023-01-31 09:03:50', 'Aktif'),
('Provinsi, lokasi tempat Anda bekerja?', 'PKU009', 'f5a1', 4, 'Tidak', 'Text Box', 'nama1', '2023-01-31 09:04:11', 'nama1', '2023-01-31 09:05:49', 'Aktif'),
('Kota/Kabupaten, lokasi tempat Anda bekerja?', 'PKU010', 'f5a2', 4, 'Tidak', 'Text Box', 'nama1', '2023-01-31 09:16:23', 'nama1', '2023-01-31 09:16:23', 'Aktif'),
('Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?', 'PKU011', 'f1101', 4, 'Tidak', 'Radio Button', 'nama1', '2023-01-31 09:16:53', 'nama1', '2023-01-31 09:16:53', 'Aktif'),
('Apa nama perusahaan/kantor tempat Anda bekerja?', 'PKU012', 'f5b', 4, 'Tidak', 'Text Box', 'nama1', '2023-01-31 09:17:30', 'nama1', '2023-01-31 09:17:30', 'Aktif'),
('Bila berwiraswasta, apa posisi/jabatan Anda saat ini? (Apabila 1 Menjawab [3] wiraswasta)', 'PKU013', 'f5c', 4, 'Tidak', 'Combo Box', 'nama1', '2023-01-31 09:17:48', 'nama1', '2023-01-31 09:17:48', 'Aktif'),
('Apa tingkat tempat kerja Anda?', 'PKU014', 'f5d', 4, 'Tidak', 'Combo Box', 'nama1', '2023-01-31 09:18:06', 'nama1', '2023-01-31 09:18:06', 'Aktif'),
('Sumber biaya studi lanjut', 'PKU015', 'f18a', 4, 'Tidak', 'Combo Box', 'nama1', '2023-01-31 09:18:28', 'nama1', '2023-01-31 09:18:28', 'Aktif'),
('Nama Perguruan Tinggi studi lanjut', 'PKU016', 'f18b', 4, 'Tidak', 'Text Box', 'nama1', '2023-01-31 09:21:29', 'nama1', '2023-01-31 09:21:29', 'Aktif'),
('Program Studi pada studi lanjut', 'PKU017', 'f18c', 4, 'Tidak', 'Text Box', 'nama1', '2023-01-31 09:21:48', 'nama1', '2023-01-31 09:21:48', 'Aktif'),
('Tanggal masuk pada studi lanjut', 'PKU018', 'f18d', 4, 'Tidak', 'DateTime Picker', 'nama1', '2023-01-31 09:22:12', 'nama1', '2023-01-31 09:22:12', 'Aktif'),
('Sebutkan sumberdana dalam pembiayaan kuliah? (bukan ketika Studi Lanjut)', 'PKU019', 'f1201', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:22:30', 'nama1', '2023-01-31 09:22:30', 'Aktif'),
('Seberapa erat hubungan bidang studi dengan pekerjaan Anda?', 'PKU020', 'f14', 4, 'Tidak', 'Radio Button', 'nama1', '2023-01-31 09:22:46', 'nama1', '2023-01-31 09:22:46', 'Aktif'),
('Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?', 'PKU021', 'f15', 4, 'Tidak', 'Radio Button', 'nama1', '2023-01-31 09:22:59', 'nama1', '2023-01-31 09:22:59', 'Aktif'),
('Pada saat lulus, pada tingkat mana kompetensi Etika di bawah ini anda kuasai? 1 = Sangat Rendah, 5 = Sangat Tinggi', 'PKU022', 'f1761', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:23:17', 'nama1', '2023-01-31 23:22:25', 'Aktif'),
('Pada saat lulus, pada tingkat mana kompetensi Keahlian berdasarkan bidang ilmu di bawah ini anda kuasai? 1 = Sangat Rendah, 5 = Sangat Tinggi', 'PKU023', 'f1763', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:23:37', 'nama1', '2023-01-31 23:22:42', 'Aktif'),
('Pada saat lulus, pada tingkat mana kompetensi Bahasa Inggris di bawah ini anda kuasai? 1 = Sangat Rendah, 5 = Sangat Tinggi', 'PKU024', 'f1765', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:23:52', 'nama1', '2023-01-31 23:22:55', 'Aktif'),
('Pada saat lulus, pada tingkat mana kompetensi Penggunaan Teknologi Informasi di bawah ini anda kuasai? 1 = Sangat Rendah, 5 = Sangat Tinggi', 'PKU025', 'f1767', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:24:16', 'nama1', '2023-01-31 23:23:15', 'Aktif'),
('Pada saat lulus, pada tingkat mana kompetensi Komunikasi di bawah ini anda kuasai? 1 = Sangat Rendah, 5 = Sangat Tinggi', 'PKU026', 'f1769', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:24:34', 'nama1', '2023-01-31 23:23:30', 'Aktif'),
('Pada saat ini, pada tingkat mana kompetensi Etika di bawah ini diperlukan dalam pekerjaan? 1 = Sangat Rendah, 5 = Sangat Tinggi', 'PKU027', 'f1762', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:24:51', 'nama1', '2023-01-31 23:23:38', 'Aktif'),
('Pada saat ini, pada tingkat mana kompetensi Keahlian berdasarkan bidang ilmu di bawah ini diperlukan dalam pekerjaan? 1 = Sangat Rendah, 5 = Sangat Tinggi', 'PKU028', 'f1764', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:25:04', 'nama1', '2023-01-31 23:23:45', 'Aktif'),
('Pada saat ini, pada tingkat mana kompetensi Bahasa Inggris di bawah ini diperlukan dalam pekerjaan? 1 = Sangat Rendah, 5 = Sangat Tinggi', 'PKU029', 'f1766', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:25:18', 'nama1', '2023-01-31 23:23:53', 'Aktif'),
('Pada saat ini, pada tingkat mana kompetensi Penggunaan Teknologi Informasi di bawah ini diperlukan dalam pekerjaan? 1 = Sangat Rendah, 5 = Sangat Tinggi', 'PKU030', 'f1768', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:25:37', 'nama1', '2023-01-31 23:24:02', 'Aktif'),
('Pada saat ini, pada tingkat mana kompetensi Komunikasi di bawah ini diperlukan dalam pekerjaan? 1 = Sangat Rendah, 5 = Sangat Tinggi', 'PKU031', 'f1770', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:25:55', 'nama1', '2023-01-31 23:24:57', 'Aktif'),
('Pada saat ini, pada tingkat mana kompetensi Kerja sama tim di bawah ini diperlukan dalam pekerjaan? 1 = Sangat Rendah, 5 = Sangat Tinggi', 'PKU032', 'f1771', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:26:09', 'nama1', '2023-02-15 14:07:33', 'Aktif'),
('Pada saat lulus, pada tingkat mana kompetensi Pengembangan di bawah ini anda kuasai? 1 = Sangat Rendah, 5 = Sangat Tinggi', 'PKU033', 'f1773', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:26:21', 'nama1', '2023-01-31 23:24:46', 'Aktif'),
('Pada saat ini, pada tingkat mana kompetensi Kerja sama tim di bawah ini diperlukan dalam pekerjaan? 1 = Sangat Rendah, 5 = Sangat Tinggi', 'PKU034', 'f1772', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:26:39', 'nama1', '2023-01-31 23:24:38', 'Aktif'),
('Pada saat ini, pada tingkat mana kompetensi Pengembangan di bawah ini diperlukan dalam pekerjaan? 1 = Sangat Rendah, 5 = Sangat Tinggi', 'PKU035', 'f1774', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:27:00', 'nama1', '2023-01-31 23:24:32', 'Aktif'),
('Menurut anda seberapa besar penekanan pada metode pembelajaran Perkuliahan dilaksanakan di program studi anda?', 'PKU036', 'f21', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:27:44', 'nama1', '2023-01-31 09:27:44', 'Aktif'),
('Menurut anda seberapa besar penekanan pada metode pembelajaran Demonstrasi dilaksanakan di program studi anda?', 'PKU037', 'f22', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:28:03', 'nama1', '2023-01-31 09:28:03', 'Aktif'),
('Menurut anda seberapa besar penekanan pada metode pembelajaran Partisipasi dalam proyek riset dilaksanakan di program studi anda?', 'PKU038', 'f23', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:28:18', 'nama1', '2023-01-31 09:28:18', 'Aktif'),
('Menurut anda seberapa besar penekanan pada metode pembelajaran Magang dilaksanakan di program studi anda?', 'PKU039', 'f24', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:28:30', 'nama1', '2023-01-31 09:28:30', 'Aktif'),
('Menurut anda seberapa besar penekanan pada metode pembelajaran Praktikum dilaksanakan di program studi anda?', 'PKU040', 'f25', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:28:40', 'nama1', '2023-01-31 09:28:40', 'Aktif'),
('Menurut anda seberapa besar penekanan pada metode pembelajaran Kerja Lapangan dilaksanakan di program studi anda?', 'PKU041', 'f26', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:28:59', 'nama1', '2023-01-31 09:28:59', 'Aktif'),
('Menurut anda seberapa besar penekanan pada metode pembelajaran Diskusi dilaksanakan di program studi anda?', 'PKU042', 'f27', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:29:14', 'nama1', '2023-01-31 09:29:14', 'Aktif'),
('Kapan anda mulai mencari pekerjaan? Mohon pekerjaan sambilan tidak dimasukkan', 'PKU043', 'f301', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:29:28', 'nama1', '2023-01-31 09:29:28', 'Aktif'),
('Bagaimana anda mencari pekerjaan tersebut? Jawaban bisa lebih dari satu', 'PKU044', '', 4, 'Tidak', 'Check Box', 'nama1', '2023-01-31 09:29:55', 'nama1', '2023-02-15 14:21:23', 'Aktif'),
('Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?', 'PKU045', 'f6', 4, 'Tidak', 'Text Box', 'nama1', '2023-01-31 10:21:34', 'nama1', '2023-01-31 10:21:34', 'Aktif'),
('Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda?', 'PKU046', 'f7', 4, 'Tidak', 'Text Box', 'nama1', '2023-01-31 10:21:49', 'nama1', '2023-01-31 10:21:49', 'Aktif'),
('Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara?', 'PKU047', 'f7a', 4, 'Tidak', 'Text Box', 'nama1', '2023-01-31 10:22:10', 'nama1', '2023-01-31 10:22:10', 'Aktif'),
('Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir? Pilihlah satu jawaban', 'PKU048', 'f1001', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 10:22:25', 'nama1', '2023-01-31 10:22:25', 'Aktif'),
('Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan : pendidikan anda, mengapa anda mengambilnya? Jawaban bisa lebih dari satu', 'PKU049', '', 4, 'Tidak', 'Check Box Value Berurutan', 'nama1', '2023-01-31 10:22:42', 'nama1', '2023-02-19 19:11:28', 'Aktif'),
('Nama perusahaan bekerja?', 'PKU050', 'namaperusahaanbekerja', 3, 'Ya', 'Text Box', 'nama1', '2023-02-01 06:03:56', 'nama1', '2023-02-01 06:09:21', 'Aktif'),
('Dalam 5 tahun setelah lulus sudah berapa kali pindah perusahaan? (Deskripsikan)', 'PKU051', 'Dalamlimatahunsetelahlulussudahberapakalipindahperusahaan', 3, 'Ya', 'Text Area', 'nama1', '2023-02-01 06:06:03', 'nama1', '2023-02-01 06:09:59', 'Aktif'),
('Alamat Perusahaan anda bekerja?', 'PKU052', 'AlamatPerusahaanandabekerja', 3, 'Ya', 'Text Box', 'nama1', '2023-02-01 06:11:06', 'nama1', '2023-02-01 06:11:06', 'Aktif'),
('Organisasi Kemahasiswaan yang pernah Anda ikuti selama kuliah di Polman Astra (boleh lebih dari satu)', 'PKU053', 'OrganisasiKemahasiswaanyangpernahAndaikutiselamakuliahdiPolmanAstrabolehlebihdarisatu', 3, 'Ya', 'Text Box', 'nama1', '2023-02-01 06:11:44', 'nama1', '2023-02-01 06:11:44', 'Aktif'),
('Nomor telpon perusahaan yang bisa dihubungi ? (masukkan kode daerah 021xxxxxxxxxx)', 'PKU054', 'Nomortelponperusahaanyangbisadihubungi', 3, 'Ya', 'Text Box', 'nama1', '2023-02-01 06:12:20', 'nama1', '2023-02-01 06:12:20', 'Aktif'),
('Apakah anda bekerja di group perusahaan Astra?', 'PKU055', 'ApakahandabekerjadigroupperusahaanAstra', 3, 'Ya', 'Combo Box', 'nama1', '2023-02-01 06:12:35', 'nama1', '2023-02-01 06:18:16', 'Aktif'),
('Tempat anda bekerja saat ini bergerak di bidang apa?', 'PKU056', 'Tempatandabekerjasaatinibergerakdibidangapa', 3, 'Ya', 'Combo Box', 'nama1', '2023-02-01 06:13:13', 'nama1', '2023-02-01 06:18:56', 'Aktif'),
('Apa saran dari alumni untuk Polman Astra?', 'PKU057', 'ApasarandarialumniuntukPolmanAstra', 3, 'Ya', 'Text Area', 'nama1', '2023-02-01 06:13:59', 'nama1', '2023-02-01 06:19:54', 'Aktif'),
('Nama Departemen/Bagian', 'PKU058', 'NamaDepartemenBagian', 3, 'Ya', 'Text Box', 'nama1', '2023-02-01 06:14:25', 'nama1', '2023-02-01 08:23:22', 'Aktif'),
('Dalam 2 tahun setelah lulus sudah berapa kali pindah perusahaan? (Deskripsikan)', 'PKU059', 'Dalamduatahunsetelahlulussudahberapakalipindahperusahaan', 3, 'Ya', 'Text Box', 'nama1', '2023-02-01 06:15:06', 'nama1', '2023-02-01 06:15:06', 'Aktif'),
('Pilihlah hadiah yang menarik bagi alumni ! (Lucky Draw)', 'PKU060', 'Pilihlahhadiahyangmenarikbagialumni', 3, 'Ya', 'Combo Box', 'nama1', '2023-02-01 06:15:29', 'nama1', '2023-02-01 06:15:29', 'Aktif'),
('Posisi anda di perusahaan disaat anda pertama kali mendapat pekerjaan?', 'PKU061', 'Posisiandadiperusahaandisaatandapertamakalimendapatpekerjaan', 3, 'Ya', 'Combo Box', 'nama1', '2023-02-01 06:16:06', 'nama1', '2023-02-01 06:21:20', 'Aktif'),
('Deskripsi Pekerjaan', 'PKU062', 'DeskripsiPekerjaan', 3, 'Ya', 'Text Area', 'nama1', '2023-02-01 06:16:31', 'nama1', '2023-02-01 06:16:31', 'Aktif'),
('tesy', 'PKU063', 'tesy', 4, 'Tidak', 'Combo Box', 'nama1', '2023-02-03 01:07:35', 'nama1', '2023-02-03 01:09:28', 'Tidak Aktif'),
('tes hapus', 'PKU064', 'tes hapus', 3, 'Ya', 'Radio Button', 'nama1', '2023-02-05 20:14:06', 'nama1', '2023-02-05 20:22:16', 'Tidak Aktif'),
('tes hapus', 'PKU065', 'tes hapus', 3, 'Ya', 'Combo Box', 'nama1', '2023-02-05 20:14:50', 'nama1', '2023-02-05 20:22:07', 'Tidak Aktif'),
('tesy', 'PKU066', 'tesy', 4, 'Tidak', 'Radio Button', 'nama1', '2023-02-09 03:00:58', 'nama1', '2023-02-09 03:01:37', 'Tidak Aktif'),
('Dimanakah Anda bekerja?', 'PKU067', 'Dimanakah Anda bekerja?', 3, 'Tidak', 'Combo Box', 'nama1', '2023-02-10 10:06:19', 'nama1', '2023-02-10 10:07:17', 'Tidak Aktif'),
('Pertanyaan f506', 'PKU068', 'f506', 4, 'Ya', 'Hidden', 'nama1', '2023-02-12 01:18:15', 'nama1', '2023-02-19 18:43:19', 'Aktif'),
('Dimanakah anda bekerja?', 'PKU069', 'Dimanakahandabekerja', 3, 'Tidak', 'Combo Box', 'nama1', '2023-02-16 14:26:16', 'nama1', '2023-02-16 14:27:38', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `ts_provinsi`
--

CREATE TABLE `ts_provinsi` (
  `provinsi_deskripsi` varchar(100) NOT NULL,
  `provinsi_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ts_provinsi`
--

INSERT INTO `ts_provinsi` (`provinsi_deskripsi`, `provinsi_id`) VALUES
('Prov. D.K.I. Jakarta', '10000'),
('Prov. Jambi', '100000'),
('Prov. Sumatera Selatan', '110000'),
('Prov. Lampung', '120000'),
('Prov. Kalimantan Barat', '130000'),
('Prov. Kalimantan Tengah', '140000'),
('Prov. Kalimantan Selatan', '150000'),
('Prov. Kalimantan Timur', '160000'),
('Prov. Sulawesi Utara', '170000'),
('Prov. Sulawesi Tengah', '180000'),
('Prov. Sulawesi Selatan', '190000'),
('Prov. Jawa Barat', '20000'),
('Prov. Sulawesi Tenggara', '200000'),
('Prov. Maluku', '210000'),
('Prov. Bali', '220000'),
('Prov. Nusa Tenggara Barat', '230000'),
('Prov. Nusa Tenggara Timur', '240000'),
('Prov. Papua', '250000'),
('Prov. Bengkulu', '260000'),
('Prov. Maluku Utara', '270000'),
('Prov. Banten', '280000'),
('Prov. Kepulauan Bangka Belitung', '290000'),
('Prov. Jawa Tengah', '30000'),
('Prov. Gorontalo', '300000'),
('Prov. Kepulauan Riau', '310000'),
('Prov. Papua Barat', '320000'),
('Prov. Sulawesi Barat', '330000'),
('Prov. Kalimantan Utara', '340000'),
('Luar Negeri', '350000'),
('Prov. D.I. Yogyakarta', '40000'),
('Prov. Jawa Timur', '50000'),
('Prov. Aceh', '60000'),
('Prov. Sumatera Utara', '70000'),
('Prov. Sumatera Barat', '80000'),
('Prov. Riau', '90000');

-- --------------------------------------------------------

--
-- Table structure for table `ts_registrasialumni`
--

CREATE TABLE `ts_registrasialumni` (
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `npwp` varchar(15) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(30) NOT NULL,
  `tahun_lulus` varchar(4) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ts_registrasialumni`
--

INSERT INTO `ts_registrasialumni` (`alamat`, `email`, `id`, `nama`, `nik`, `nim`, `npwp`, `password`, `status`, `tahun_lulus`, `tanggal_lahir`, `telepon`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
('alamat170001', 'amanina.ulya1@gmail.com', 23, 'Amanina Ulya Safira', '0320170001170001', '0320170001', '', 'c67a30a7bea459a24f9fe1389e2cfff1943e0cd819e73f0c72264991e60cbfeecbf1b25bdc5d112a4babf28877c79290360276b997a7806a37b535e5c54f8d94lhcgqCuvTu0c6uCBaAJW1o3tJr8E8YInzehuJKEkWHM=', 'Diterima', '2020', '1999-06-08', '082227464002', 'Amanina Ulya Safira', '2023-02-05 17:26:21', 'nama1', '2023-02-09 14:55:46'),
('alamat170002', 'doniseptrian17@gmail.com', 24, 'Doni Septrian', '0320170002170002', '0320170002', '123456789123456', '30485c2a0aeccd2a4fdc46295ce5b321a13cce477a12f5764d03ef8f8a1ab40932c6c6398ea4509a0efda4f93b93e9bb41b669a6e29fde1a5f4ce667c243c7c9pdfu1ZX3u6NW5tk4UJrH5Nf+SLbK90ZdZ8mLmZKPrFY=', 'Diterima', '2020', '1999-08-19', '085747821298', 'Doni Septrian', '2023-02-05 17:27:38', 'Doni Septrian', '2023-02-12 02:07:19'),
('alamat170003', 'melamela.hidayah@gmail.com', 25, 'Mela Hidayah', '0320170003170003', '0320170003', '', '33e0d1f35a3018a1664cb53b68ba0dcf08cd3064615cfe2488e3564421d2178953c7d870bb3d77f7165219de82eee6151add5638688ab118b7b9ca0df2b22b2ejZDRtlgoFUJmhyGn8lxio1pqStABbQnbJBncfHAahIQ=', 'Ditolak', '2020', '1999-02-09', '085591990224', 'Mela Hidayah', '2023-02-05 17:28:39', 'nama1', '2023-02-05 23:36:21'),
('alamat170004', 'muthiakandza30@gmail.com', 26, 'Muthia Kandza', '0320170004170004', '0320170004', '', '148ff789cc8010597cb78e13e73af16058c8d680795040df61acfb83b006aaf9adc3a1718687fe6e3e72a21d7c3b280774c9e8108f5e89361985d5d78382dc78fKPMja8kV5odvhJcskZSzy9f+6Oi+RaPkzZ1PPmCjas=', 'Diterima', '2020', '1999-07-30', '085742092637', 'Muthia Kandza', '2023-02-05 18:17:28', 'nama1', '2023-02-10 10:04:43'),
('alamat170005', 'nindyoktanovianti@gmail.com', 27, 'Nindy Okta Novianti', '0320170005170005', '0320170005', '', '851113a3f02ec38926c894ab7989ab41de96b432507f5c7cce6d25482777d67fe072688cf0061c3867f9dc88371f7d38054ebe84007cd17408d21dde433ea6caLi7/25vTPaI1pc7TbYTyu7jGm1AUa7uJ2ignt4VnjnU=', 'Ditolak', '2020', '1999-07-07', '081217146328', 'Nindy Okta Novianti', '2023-02-05 18:18:32', 'nama1', '2023-02-10 10:04:56'),
('alamat170006', 'Noerlisnaa@gmail.com', 28, 'Noer lisna anjani', '0320170006170006', '0320170006', '', 'bac2d318520d09d899795a6949e48a57b3e847a6332656e8ac86401e9d75a0b670a9eb0a299e6da28f43c9eca1e1074727a6a81f414d9b61aafa61cf03edbc35tZNDmrGRhv0n24z+JPOLte2MlTy6BHgzIUf+zYE3jl4=', 'Ditolak', '2020', '1999-06-08', '085870391945', 'Noer lisna anjani', '2023-02-05 18:19:41', 'nama1', '2023-02-06 01:40:32'),
('alamat170007', 'rachmadrizkywidodo@gmail.com', 29, 'RACHMAD RIZKY WIDODO', '0320170007170007', '0320170007', '123456789012345', 'f85f8914bf10b34f24b464e48c46845e2a831618ba73c9112e825e68ad376b25cef0fbee98891335105d7395f2bf8a46e695a8e2b151c4535b5f30d4bba9ccd7Wae6sYWYbB6MNFNXH803E8zBbhhLKOwVC3Xxn8ENUjo=', 'Diterima', '2020', '1999-09-13', '085814232252', 'RACHMAD RIZKY WIDODO', '2023-02-05 18:20:26', 'RACHMAD RIZKY WIDODO', '2023-02-12 04:57:51'),
('alamat170008', 'taqiyahcantika24@gmail.com', 30, 'TAQIYAH CANTIKA', '0320170008170008', '0320170008', '', 'faedc3b1495f629d47d55b1c71754229b9edbc2b3366da6ee8aa13221eb1fe096e4e6ae1c0d229b1b227b2e7bc66a5f114403412a60417795d277500d7174db7Z8iW8NLsGcTxgoZFN8RzZoLgTqG67F5yij5hIHkZ7ZE=', 'Diterima', '2020', '1999-02-09', '082281907624', 'TAQIYAH CANTIKA', '2023-02-05 18:21:11', 'nama1', '2023-02-08 21:24:08'),
('alamat170009', 'fhzhafirah@gmail.com', 31, 'Farah Hana Zhafirah', '0320170009170009', '0320170009', '', '86d499fc73856f26227311d6b50678acb03c2724f8c280f539591bc8e464b3b6b4486d0257265091b76885d48c96e939b83eb6190cc019bf85e7af74a227a768nVZpjjda/2c7PgGzg+HdZ8/efxbSEjTK3Kc8QYLNLII=', 'Diterima', '2020', '1999-05-03', '089603979495', 'Farah Hana Zhafirah', '2023-02-05 18:21:56', 'nama1', '2023-02-08 12:00:53'),
('alamat170010', 'ferdypudyas@gmail.com', 32, 'Ferdy Pudyas Rahmansyah', '0320170010170010', '0320170010', '', '9f6ce106c68e78d587486e482b34b6a701d688df34c584daf7d389fb3200427178170414236ec3ea2790e087bf4699e4c2d992e6350e700373341900b7eca7c4J9MF5o6XuirAqbRcIpcG4vHeucvfXYqVZwkzpMdrJmU=', 'Ditolak', '2020', '1999-02-26', '081282193063', 'Ferdy Pudyas Rahmansyah', '2023-02-05 18:23:14', 'nama1', '2023-02-08 21:24:04'),
('alamat180001', 'rahmatalfiyanto@gmail.com', 33, 'Rahmat Alfiyanto', '0320180001180001', '0320180001', '', '57d09e89e27d9ec0848e53aa6b7d2f1f3795b5eb59aabafe54758fb1b426fc56bd4ebe9e4f857b82393db602406d801ccea48d9dda0199640060afdeea560befz8IAGimxcO9yx4+7gm64loEgRx5PQGVimcYN/t9Nt+I=', 'Ditolak', '2021', '2000-06-15', '0828377832765', 'Rahmat Alfiyanto', '2023-02-07 17:05:00', 'nama1', '2023-02-10 10:14:21'),
('alamat190001', 'bimonugroho@gmail.com', 34, 'Bimo Nugroho', '0320190001190001', '0320190001', '', '93756054739b347ca2a59fdf0bc91ce4bb8d8a8228878f5e04f425272c0547e9d85f18ffd80d33ce56830a521c3e8070c73adc64ccf9f0d0d07d1cc6f15cf327svH0S2CRmlFBB2nBjjTzlO0SVMjDylWv7fNd0ihxkCw=', 'Diterima', '2022', '2001-06-14', '0888390472387', 'Bimo Nugroho', '2023-02-07 17:45:03', 'nama1', '2023-02-09 03:14:10'),
('alamat1', 'email1@gmail.com', 35, 'nama9', '9999999999999999', '9999999999', '', 'dbdde2b06725332ff5288a72b51b97730d31e44c4d8d8d315a452a84df6f897b643d56f78cde3c3aa1080df929d91ad3651deca6121b45c8412484578ee02b36p97uQRQ1yhSZ1SK6UHwESg3JqO28JKGZI7q2a9IG8xE=', 'Ditolak', '2022', '2023-02-09', '9999999999999', 'nama9', '2023-02-08 20:58:23', 'nama1', '2023-02-09 03:10:03'),
('Jakarta Timur', 'siti@gmail.com', 36, 'Siti Nurlaela Sari', '0320180010180010', '0320180010', '', 'c90e392f82c862056e8dd683d67b8dc9b18c9de3754be7664e403d17fb8d663da03632ec66ecc7e13f017575cbdf2637c8cbfaeb3f46d39f74c51b4516f9598acE7D6BBnJKHEAynfUgNnFlSQgPRPRenoa4lJU8M07Bs=', 'Diterima', '2021', '2001-01-01', '089674539187', 'Siti Nurlaela', '2023-02-10 04:02:24', 'nama1', '2023-02-10 10:16:45'),
('Jakarta Timur', 'sitinur@gmail.com', 37, 'Siti Nurlaeli', '0320180011180011', '0320180011', NULL, 'f8d2e7a51c252f4e9fdccc20f075cbf2f0486355fcf0e22426fa838ea3264af9f1aa2ea1c3f6663d678c353c727b23550c66735199873f77241fe31e67fab996lKfKag2/1neG/XZuU6pXNbuA3MqtYxq8b5+gTtmSGi4=', 'Diterima', '2021', '2001-01-01', '089674539188', 'Siti Nurlaeli', '2023-02-16 08:23:11', 'nama1', '2023-02-16 14:25:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ts_admin`
--
ALTER TABLE `ts_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ts_daftarurutandata`
--
ALTER TABLE `ts_daftarurutandata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_detailPeriode` (`id_detailPeriode`);

--
-- Indexes for table `ts_detailjenisperiode`
--
ALTER TABLE `ts_detailjenisperiode`
  ADD PRIMARY KEY (`id_detailPeriode`);

--
-- Indexes for table `ts_detailpertanyaanjawaban`
--
ALTER TABLE `ts_detailpertanyaanjawaban`
  ADD PRIMARY KEY (`id_detailPertanyaanJawaban`),
  ADD KEY `id_jawabanKuesioner` (`id_jawabanKuesioner`,`id_pku_answer`),
  ADD KEY `id_pku_answer` (`id_pku_answer`);

--
-- Indexes for table `ts_hasilkuesioner`
--
ALTER TABLE `ts_hasilkuesioner`
  ADD PRIMARY KEY (`id_hasilKuesioner`,`id_detailPeriode`,`nim`) USING BTREE,
  ADD KEY `id_detailPeriode` (`id_detailPeriode`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `ts_jawabankuesioner`
--
ALTER TABLE `ts_jawabankuesioner`
  ADD PRIMARY KEY (`id_jawabanKuesioner`),
  ADD KEY `id_pku` (`id_pku`);

--
-- Indexes for table `ts_kabkota`
--
ALTER TABLE `ts_kabkota`
  ADD PRIMARY KEY (`kabkota_id`),
  ADD KEY `kabkota_provinsi_id` (`kabkota_provinsi_id`);

--
-- Indexes for table `ts_laporankuesioner`
--
ALTER TABLE `ts_laporankuesioner`
  ADD PRIMARY KEY (`id_hasilKuesioner`,`kode`),
  ADD KEY `id_hasilKuesioner` (`id_hasilKuesioner`);

--
-- Indexes for table `ts_pertanyaankuesioner`
--
ALTER TABLE `ts_pertanyaankuesioner`
  ADD PRIMARY KEY (`id_pku`),
  ADD KEY `id_detailPeriode` (`id_detailPeriode`);

--
-- Indexes for table `ts_provinsi`
--
ALTER TABLE `ts_provinsi`
  ADD PRIMARY KEY (`provinsi_id`);

--
-- Indexes for table `ts_registrasialumni`
--
ALTER TABLE `ts_registrasialumni`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ts_daftarurutandata`
--
ALTER TABLE `ts_daftarurutandata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=542;

--
-- AUTO_INCREMENT for table `ts_detailjenisperiode`
--
ALTER TABLE `ts_detailjenisperiode`
  MODIFY `id_detailPeriode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ts_detailpertanyaanjawaban`
--
ALTER TABLE `ts_detailpertanyaanjawaban`
  MODIFY `id_detailPertanyaanJawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `ts_registrasialumni`
--
ALTER TABLE `ts_registrasialumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ts_daftarurutandata`
--
ALTER TABLE `ts_daftarurutandata`
  ADD CONSTRAINT `ts_daftarurutandata_ibfk_1` FOREIGN KEY (`id_detailPeriode`) REFERENCES `ts_detailjenisperiode` (`id_detailPeriode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ts_detailpertanyaanjawaban`
--
ALTER TABLE `ts_detailpertanyaanjawaban`
  ADD CONSTRAINT `ts_detailpertanyaanjawaban_ibfk_1` FOREIGN KEY (`id_jawabanKuesioner`) REFERENCES `ts_jawabankuesioner` (`id_jawabanKuesioner`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ts_detailpertanyaanjawaban_ibfk_2` FOREIGN KEY (`id_pku_answer`) REFERENCES `ts_pertanyaankuesioner` (`id_pku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ts_hasilkuesioner`
--
ALTER TABLE `ts_hasilkuesioner`
  ADD CONSTRAINT `ts_hasilkuesioner_ibfk_1` FOREIGN KEY (`id_detailPeriode`) REFERENCES `ts_detailjenisperiode` (`id_detailPeriode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ts_hasilkuesioner_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `ts_registrasialumni` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ts_jawabankuesioner`
--
ALTER TABLE `ts_jawabankuesioner`
  ADD CONSTRAINT `ts_jawabankuesioner_ibfk_1` FOREIGN KEY (`id_pku`) REFERENCES `ts_pertanyaankuesioner` (`id_pku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ts_kabkota`
--
ALTER TABLE `ts_kabkota`
  ADD CONSTRAINT `ts_kabkota_ibfk_1` FOREIGN KEY (`kabkota_provinsi_id`) REFERENCES `ts_provinsi` (`provinsi_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ts_laporankuesioner`
--
ALTER TABLE `ts_laporankuesioner`
  ADD CONSTRAINT `ts_laporankuesioner_ibfk_1` FOREIGN KEY (`id_hasilKuesioner`) REFERENCES `ts_hasilkuesioner` (`id_hasilKuesioner`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ts_pertanyaankuesioner`
--
ALTER TABLE `ts_pertanyaankuesioner`
  ADD CONSTRAINT `ts_pertanyaankuesioner_ibfk_2` FOREIGN KEY (`id_detailPeriode`) REFERENCES `ts_detailjenisperiode` (`id_detailPeriode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
