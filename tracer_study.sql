-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Feb 01, 2023 at 04:05 AM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_DeleteDetailJenisPeriode` (IN `Pid` INT, IN `Pnama` VARCHAR(50), IN `Ptanggal_sekarang` DATETIME)  BEGIN
	UPDATE ts_detailjenisperiode 
    SET status = 'Tidak Aktif',
    modified_by = Pnama,
    modified_date = Ptanggal_sekarang
    WHERE id_detailperiode = Pid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_DeleteDetailPertanyaanJawaban` (IN `Pid` INT, IN `Pnama` VARCHAR(50), IN `Ptanggal_sekarang` DATETIME)  BEGIN
	UPDATE ts_detailpertanyaanjawaban 
    SET status = 'Tidak Aktif',
    modified_by = Pnama,
    modified_date = Ptanggal_sekarang
    WHERE id_detailpertanyaanjawaban = Pid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_DeleteJawabanKuesioner` (IN `Pid` VARCHAR(10), IN `Pnama` VARCHAR(50), IN `Ptanggal_sekarang` DATETIME)  BEGIN
	UPDATE ts_jawabankuesioner
    SET status = 'Tidak Aktif',
    modified_by = Pnama,
    modified_date = Ptanggal_sekarang
    WHERE id_jawabankuesioner = Pid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_DeletePertanyaanKuesioner` (IN `Pid` VARCHAR(10), IN `Pnama` VARCHAR(50), IN `Ptanggal_sekarang` DATETIME)  BEGIN
	UPDATE ts_pertanyaankuesioner 
    SET status = 'Tidak Aktif',
    modified_by = Pnama,
    modified_date = Ptanggal_sekarang
    WHERE id_pku = Pid;	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_getDataAdmin` ()  BEGIN
	SELECT *
	FROM ts_admin;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_getDataAlumni` ()  BEGIN
	SELECT *
	FROM ts_registrasialumni;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_getDataDetailJenisPeriode` ()  BEGIN 
	SELECT * FROM ts_detailjenisperiode ORDER BY id_detailPeriode ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_getDataDetailPertanyaanJawaban` ()  BEGIN 
	SELECT dpj.id_detailpertanyaanjawaban, pkuu.kode, jk.nilaiJawaban, jk.deskripsiJawaban, pku.kode AS kodee, pku.deskripsiPertanyaan, dpj.created_by, dpj.created_date, dpj.modified_by, dpj.modified_date, dpj.status
    FROM ts_detailpertanyaanjawaban dpj
    INNER JOIN ts_jawabankuesioner jk ON 
    	jk.id_jawabankuesioner = dpj.id_jawabankuesioner
	INNER JOIN ts_pertanyaankuesioner pku ON 
    	pku.id_pku = dpj.id_pku_answer
	INNER JOIN ts_pertanyaankuesioner pkuu ON 
    	pkuu.id_pku = jk.id_pku
    ORDER BY dpj.id_detailPertanyaanJawaban ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_getDataForUpdateAlumni` (IN `Pid` INT)  BEGIN
	SELECT nama, tahun_lulus
	FROM ts_registrasialumni
	WHERE id = Pid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_getDataForUpdateDetailJenisPeriode` (IN `Pid` INT)  BEGIN
	SELECT jenis_kuesioner, periode, status
	FROM ts_detailjenisperiode
	WHERE id_detailperiode = Pid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_getDataForUpdateDetailPertanyaanJawaban` (IN `Pid` INT)  BEGIN
	SELECT id_jawabankuesioner, id_pku_answer, status
    FROM ts_detailpertanyaanjawaban 
    WHERE id_detailpertanyaanjawaban = Pid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_getDataForUpdateJawabanKuesioner` (IN `Pid` VARCHAR(10))  BEGIN
	SELECT id_pku, deskripsijawaban, kode, nilaijawaban, textbox, status
	FROM ts_jawabankuesioner
	WHERE id_jawabankuesioner = Pid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_getDataForUpdatePertanyaanKuesioner` (IN `Pid` VARCHAR(10))  BEGIN
	SELECT deskripsipertanyaan, jenis, kode, id_detailperiode, pertanyaan_utama
	FROM ts_pertanyaankuesioner
	WHERE id_pku = Pid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_getDataJawabanKuesioner` ()  BEGIN
	SELECT jk.id_jawabankuesioner, pku.kode AS kodepertanyaan, pku.deskripsipertanyaan, jk.deskripsijawaban, jk.kode, jk.nilaijawaban, jk.textbox, jk.created_by, jk.created_date, jk.modified_by, jk.modified_date, pku.id_pku, jk.status
    FROM ts_jawabankuesioner jk
    INNER JOIN ts_pertanyaankuesioner pku ON jk.id_pku = pku.id_pku
    ORDER BY jk.id_jawabanKuesioner ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_getDataPertanyaanKuesioner` ()  BEGIN
	SELECT pku.id_pku, pku.deskripsiPertanyaan, pku.jenis, pku.kode, dp.jenis_kuesioner, dp.periode, pku.pertanyaan_utama, pku.created_by, pku.created_date, pku.modified_by, pku.modified_date, pku.status
    FROM ts_pertanyaanKuesioner pku
	INNER JOIN ts_detailJenisPeriode dp 
    	ON dp.id_detailPeriode = pku.id_detailPeriode
    ORDER BY pku.id_pku ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_getDataPertanyaanKuesionerTidakUtama` ()  BEGIN
	SELECT pku.id_pku, pku.deskripsiPertanyaan, pku.jenis, pku.kode, dp.jenis_kuesioner, dp.periode, pku.pertanyaan_utama, pku.created_by, pku.created_date, pku.modified_by, pku.modified_date
    FROM ts_pertanyaanKuesioner pku
	INNER JOIN ts_detailJenisPeriode dp ON 
    	dp.id_detailPeriode= pku.id_detailPeriode
    WHERE pku.pertanyaan_utama = 'Tidak';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_getDataRegistrasiAlumni` ()  BEGIN
	SELECT *
	FROM ts_registrasiAlumni
    ORDER BY id ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_InsertDetailJenisPeriode` (IN `Pnama` VARCHAR(50), IN `Pjenis_kuesioner` VARCHAR(30), IN `Pperiode` INT(4), IN `Ptanggal_sekarang` DATETIME)  BEGIN
	INSERT INTO ts_detailJenisPeriode 
    	(jenis_kuesioner, periode, created_by, 
         created_date, modified_by, modified_date, status)
	VALUES 
    	(Pjenis_kuesioner, Pperiode, Pnama, Ptanggal_sekarang, Pnama, Ptanggal_sekarang, 'Aktif');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_InsertDetailPertanyaanJawaban` (IN `Pnama` VARCHAR(50), IN `Pid_jawabanKuesioner` VARCHAR(10), IN `Pid_pku_answer` VARCHAR(10), IN `Ptanggal_sekarang` DATETIME)  BEGIN
	INSERT INTO ts_detailPertanyaanJawaban
		(id_jawabanKuesioner, id_pku_answer, created_by,
         created_date, modified_by, modified_date, status)
	VALUES
		(Pid_jawabanKuesioner, Pid_pku_answer, Pnama, Ptanggal_sekarang,
         Pnama, Ptanggal_sekarang, 'Aktif');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_InsertJawabanKuesioner` (IN `Pid_jawabanKuesioner` VARCHAR(10), IN `Pid_pku` VARCHAR(10), IN `PdeskripsiJawaban` TEXT, IN `Pkode` VARCHAR(10), IN `PnilaiJawaban` TEXT, IN `Ptextbox` VARCHAR(10), IN `Pnama` VARCHAR(50), IN `Ptanggal_sekarang` DATETIME)  BEGIN
	INSERT INTO ts_jawabanKuesioner
		VALUES (PdeskripsiJawaban, Pid_jawabanKuesioner, Pid_pku, 
                Pkode, Ptextbox, PnilaiJawaban,
                Pnama, Ptanggal_sekarang, Pnama, Ptanggal_sekarang, 'Aktif');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_InsertPertanyaanKuesioner` (IN `Pid_pku` VARCHAR(10), IN `PdeskripsiPertanyaan` TEXT, IN `Pjenis` VARCHAR(30), IN `Pkode` TEXT, IN `Pid_detailPeriode` INT, IN `Ppertanyaan_utama` VARCHAR(11), IN `Pnama` VARCHAR(50), IN `Ptanggal_sekarang` DATETIME)  BEGIN
	INSERT INTO ts_pertanyaanKuesioner
		VALUES (PdeskripsiPertanyaan, Pid_pku, Pkode, Pid_detailPeriode, Ppertanyaan_utama, Pjenis, Pnama, Ptanggal_sekarang, Pnama, Ptanggal_sekarang, 'Aktif');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_InsertRegistrasiAlumni` (IN `Pnim` VARCHAR(10), IN `Pnik` VARCHAR(16), IN `Pnama` VARCHAR(100), IN `Palamat` TEXT, IN `Ptanggal_lahir` DATE, IN `Ptahun_lulus` VARCHAR(4), IN `Pemail` VARCHAR(100), IN `Ppassword` VARCHAR(200), IN `Ptelepon` VARCHAR(13), IN `Pstatus` VARCHAR(30), IN `Ptanggal_sekarang` DATETIME)  BEGIN
	INSERT INTO ts_registrasialumni
	(nim, nik, nama, alamat, tanggal_lahir, tahun_lulus, email, password, status, telepon, created_by, created_date, modified_by, modified_date)
    VALUES
    (Pnim, Pnik, Pnama, Palamat, Ptanggal_lahir, Ptahun_lulus, Pemail, Ppassword, Pstatus, Ptelepon, Pnama, Ptanggal_sekarang, Pnama, Ptanggal_sekarang);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_UpdateAlumni` (IN `Pid` INT, IN `Pnama` VARCHAR(100), IN `PnamaAdmin` VARCHAR(100), IN `PtahunLulus` INT, IN `Ptanggal_sekarang` DATETIME)  BEGIN
	UPDATE ts_registrasiAlumni
	SET 
	nama = Pnama,
	tahun_lulus = PtahunLulus,
	modified_by = PnamaAdmin,
	modified_date = Ptanggal_sekarang
	WHERE id = Pid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_UpdateAlumniDiterima` (IN `Pid` INT, IN `PnamaAdmin` VARCHAR(100), IN `Ptanggal_sekarang` DATETIME)  BEGIN
	UPDATE ts_registrasiAlumni
	SET status = 'Diterima',
	modified_by = PnamaAdmin,
	modified_date = Ptanggal_sekarang
	WHERE id = Pid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_UpdateAlumniDitolak` (IN `Pid` INT, IN `PnamaAdmin` VARCHAR(100), IN `Ptanggal_sekarang` DATETIME)  BEGIN
	UPDATE ts_registrasiAlumni
	SET status = 'Ditolak',
	modified_by = PnamaAdmin,
	modified_date = Ptanggal_sekarang 
	WHERE id = Pid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_UpdateAlumniResetPassword` (IN `Pid` INT, IN `Ppassword` VARCHAR(200), IN `PnamaAdmin` VARCHAR(100), IN `Ptanggal_sekarang` DATETIME)  BEGIN
	UPDATE ts_registrasiAlumni
	SET password = Ppassword,
	modified_by = PnamaAdmin,
	modified_date = Ptanggal_sekarang
	WHERE id = Pid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_UpdateDetailJenisPeriode` (IN `Pid` INT, IN `Pnama` VARCHAR(50), IN `Pjenis_kuesioner` VARCHAR(30), IN `Pperiode` INT, IN `Ptanggal_sekarang` DATETIME)  BEGIN
	UPDATE ts_detailJenisPeriode 
		SET jenis_kuesioner = Pjenis_kuesioner,
			periode = Pperiode,
			modified_by = Pnama,
			modified_date = Ptanggal_sekarang
	WHERE id_detailPeriode = Pid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_UpdateDetailPertanyaanJawaban` (IN `Pid` INT, IN `Pnama` VARCHAR(50), IN `Pid_jawabanKuesioner` VARCHAR(10), IN `Pid_pku_answer` VARCHAR(10), IN `Ptanggal_sekarang` DATETIME)  BEGIN
	UPDATE ts_detailPertanyaanJawaban
	SET id_jawabanKuesioner = Pid_jawabanKuesioner,
		id_pku_answer = Pid_pku_answer,
		modified_by = Pnama,
		modified_date = Ptanggal_sekarang
	WHERE id_detailPertanyaanJawaban = Pid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_UpdateJawabanKuesioner` (IN `Pid` VARCHAR(10), IN `Pid_pku` VARCHAR(10), IN `PdeskripsiJawaban` TEXT, IN `Pkode` VARCHAR(10), IN `PnilaiJawaban` TEXT, IN `Ptextbox` VARCHAR(10), IN `Pnama` VARCHAR(50), IN `Ptanggal_sekarang` DATETIME)  BEGIN
	UPDATE ts_jawabanKuesioner
	SET id_pku = Pid_pku,
		deskripsiJawaban = PdeskripsiJawaban,
		kode = Pkode,
		nilaiJawaban = PnilaiJawaban,
		textbox = Ptextbox,
		modified_by = Pnama,
		modified_date = Ptanggal_sekarang
	WHERE id_jawabanKuesioner = Pid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ts_UpdatePertanyaanKuesioner` (IN `Pid` VARCHAR(10), IN `PdeskripsiPertanyaan` TEXT, IN `Pjenis` VARCHAR(30), IN `Pkode` TEXT, IN `Pid_detailPeriode` INT, IN `Ppertanyaan_utama` VARCHAR(11), IN `Pnama` VARCHAR(50), IN `Ptanggal_sekarang` DATETIME)  BEGIN
	UPDATE ts_pertanyaanKuesioner
	SET deskripsiPertanyaan = PdeskripsiPertanyaan,
		jenis = Pjenis,
		kode = Pkode,
		id_detailPeriode = Pid_detailPeriode,
		pertanyaan_utama = Ppertanyaan_utama,
		modified_by = Pnama,
		modified_date = Ptanggal_sekarang
	WHERE id_pku = Pid;
END$$

DELIMITER ;

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
(3, 'Polman', 2023, 'nama1', '2023-01-29 20:00:46', 'nama1', '2023-01-29 20:00:46', 'Aktif'),
(4, 'Dikti', 2023, 'nama1', '2023-01-29 20:00:53', 'nama1', '2023-01-29 20:00:53', 'Aktif');

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
(21, 'JK005', 'PKU006', 'nama1', '2023-01-31 16:08:13', 'nama1', '2023-01-31 16:08:13', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `ts_hasilkuesioner`
--

CREATE TABLE `ts_hasilkuesioner` (
  `id_hasilKuesioner` varchar(10) NOT NULL,
  `id_detailPeriode` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `tanggal_pengisian` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('Belum memungkinkan bekerja', 'JK006', 'PKU005', '', 'Tidak', '2', 'nama1', '2023-01-31 14:52:01', 'nama1', '2023-01-31 14:52:01', 'Aktif'),
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
('jabatan1', 'JK019', 'PKU013', '', 'Tidak', '1', 'nama1', '2023-01-31 14:56:46', 'nama1', '2023-01-31 14:56:46', 'Aktif'),
('jabatan2', 'JK020', 'PKU013', '', 'Tidak', '2', 'nama1', '2023-01-31 14:57:22', 'nama1', '2023-01-31 14:57:22', 'Aktif'),
('jabatan3', 'JK021', 'PKU013', '', 'Tidak', '3', 'nama1', '2023-01-31 14:57:34', 'nama1', '2023-01-31 14:57:34', 'Aktif'),
('tingkat1', 'JK022', 'PKU014', '', 'Tidak', '1', 'nama1', '2023-01-31 14:57:50', 'nama1', '2023-01-31 14:57:50', 'Aktif'),
('tingkat2', 'JK023', 'PKU014', '', 'Tidak', '2', 'nama1', '2023-01-31 14:58:36', 'nama1', '2023-01-31 14:58:36', 'Aktif'),
('tingkat3', 'JK024', 'PKU014', '', 'Tidak', '3', 'nama1', '2023-01-31 14:58:48', 'nama1', '2023-01-31 14:58:48', 'Aktif'),
('sumberBiaya1', 'JK025', 'PKU015', '', 'Tidak', '1', 'nama1', '2023-01-31 14:59:23', 'nama1', '2023-01-31 14:59:23', 'Aktif'),
('sumberBiaya2', 'JK026', 'PKU015', '', 'Tidak', '2', 'nama1', '2023-01-31 14:59:35', 'nama1', '2023-01-31 14:59:35', 'Aktif'),
('sumberBiaya3', 'JK027', 'PKU015', '', 'Tidak', '3', 'nama1', '2023-01-31 14:59:46', 'nama1', '2023-01-31 14:59:46', 'Aktif'),
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
('Kira-kira berapa bulan sesudah lulus?', 'JK150', 'PKU043', 'f302', 'Ya', '2', 'nama1', '2023-01-31 15:33:12', 'nama1', '2023-02-01 05:48:30', 'Aktif'),
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
('Di pekerjaan ini saya memeroleh prospek karir yang baik.', 'JK174', 'PKU049', 'f1603', 'Tidak', '', 'nama1', '2023-01-31 15:41:14', 'nama1', '2023-01-31 15:41:14', 'Aktif'),
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
('Supervisor', 'JK205', 'PKU061', '', 'Tidak', 'Supervisor', 'nama1', '2023-02-01 08:28:31', 'nama1', '2023-02-01 08:28:31', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `ts_kabkota`
--

CREATE TABLE `ts_kabkota` (
  `kabkota_deskripsi` varchar(100) NOT NULL,
  `kabkota_id` varchar(10) NOT NULL,
  `kabkota_provinsi_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ts_laporankuesioner`
--

CREATE TABLE `ts_laporankuesioner` (
  `id_hasilKuesioner` varchar(10) NOT NULL,
  `jawabanKuesioner` text NOT NULL,
  `kode` varchar(10) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ts_pertanyaankuesioner`
--

CREATE TABLE `ts_pertanyaankuesioner` (
  `deskripsiPertanyaan` text NOT NULL,
  `id_pku` varchar(10) NOT NULL,
  `kode` text NOT NULL,
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
('Pada saat ini, pada tingkat mana kompetensi Komunikasi di bawah ini diperlukan dalam pekerjaan? 1 = Sangat Rendah, 5 = Sangat Tinggi', 'PKU032', 'f1771', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 09:26:09', 'nama1', '2023-01-31 23:24:52', 'Aktif'),
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
('Bagaimana anda mencari pekerjaan tersebut? Jawaban bisa lebih dari satu', 'PKU044', 'f400', 4, 'Tidak', 'Check Box', 'nama1', '2023-01-31 09:29:55', 'nama1', '2023-01-31 09:29:55', 'Aktif'),
('Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?', 'PKU045', 'f6', 4, 'Tidak', 'Text Box', 'nama1', '2023-01-31 10:21:34', 'nama1', '2023-01-31 10:21:34', 'Aktif'),
('Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda?', 'PKU046', 'f7', 4, 'Tidak', 'Text Box', 'nama1', '2023-01-31 10:21:49', 'nama1', '2023-01-31 10:21:49', 'Aktif'),
('Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara?', 'PKU047', 'f7a', 4, 'Tidak', 'Text Box', 'nama1', '2023-01-31 10:22:10', 'nama1', '2023-01-31 10:22:10', 'Aktif'),
('Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir? Pilihlah satu jawaban', 'PKU048', 'f1001', 4, 'Ya', 'Radio Button', 'nama1', '2023-01-31 10:22:25', 'nama1', '2023-01-31 10:22:25', 'Aktif'),
('Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan : pendidikan anda, mengapa anda mengambilnya? Jawaban bisa lebih dari satu', 'PKU049', 'f1600', 4, 'Tidak', 'Check Box', 'nama1', '2023-01-31 10:22:42', 'nama1', '2023-01-31 10:22:42', 'Aktif'),
('Nama perusahaan bekerja?', 'PKU050', 'Nama perusahaan bekerja?', 3, 'Ya', 'Text Box', 'nama1', '2023-02-01 06:03:56', 'nama1', '2023-02-01 06:09:21', 'Aktif'),
('Dalam 5 tahun setelah lulus sudah berapa kali pindah perusahaan? (Deskripsikan)', 'PKU051', 'Dalam 5 tahun setelah lulus sudah berapa kali pindah perusahaan? (Deskripsikan)', 3, 'Ya', 'Text Area', 'nama1', '2023-02-01 06:06:03', 'nama1', '2023-02-01 06:09:59', 'Aktif'),
('Alamat Perusahaan anda bekerja?', 'PKU052', 'Alamat Perusahaan anda bekerja?', 3, 'Ya', 'Text Box', 'nama1', '2023-02-01 06:11:06', 'nama1', '2023-02-01 06:11:06', 'Aktif'),
('Organisasi Kemahasiswaan yang pernah Anda ikuti selama kuliah di Polman Astra (boleh lebih dari satu)', 'PKU053', 'Organisasi Kemahasiswaan yang pernah Anda ikuti selama kuliah di Polman Astra (boleh lebih dari satu)', 3, 'Ya', 'Text Box', 'nama1', '2023-02-01 06:11:44', 'nama1', '2023-02-01 06:11:44', 'Aktif'),
('Nomor telpon perusahaan yang bisa dihubungi ? (masukkan kode daerah 021xxxxxxxxxx)', 'PKU054', 'Nomor telpon perusahaan yang bisa dihubungi ? (masukkan kode daerah 021xxxxxxxxxx)', 3, 'Ya', 'Text Box', 'nama1', '2023-02-01 06:12:20', 'nama1', '2023-02-01 06:12:20', 'Aktif'),
('Apakah anda bekerja di group perusahaan Astra?', 'PKU055', 'Apakah anda bekerja di group perusahaan Astra?', 3, 'Ya', 'Combo Box', 'nama1', '2023-02-01 06:12:35', 'nama1', '2023-02-01 06:18:16', 'Aktif'),
('Tempat anda bekerja saat ini bergerak di bidang apa?', 'PKU056', 'Tempat anda bekerja saat ini bergerak di bidang apa?', 3, 'Ya', 'Combo Box', 'nama1', '2023-02-01 06:13:13', 'nama1', '2023-02-01 06:18:56', 'Aktif'),
('Apa saran dari alumni untuk Polman Astra?', 'PKU057', 'Apa saran dari alumni untuk Polman Astra?', 3, 'Ya', 'Text Area', 'nama1', '2023-02-01 06:13:59', 'nama1', '2023-02-01 06:19:54', 'Aktif'),
('Nama Departemen/Bagian', 'PKU058', 'Nama Departemen/Bagian', 3, 'Ya', 'Text Box', 'nama1', '2023-02-01 06:14:25', 'nama1', '2023-02-01 08:23:22', 'Aktif'),
('Dalam 2 tahun setelah lulus sudah berapa kali pindah perusahaan? (Deskripsikan)', 'PKU059', 'Dalam 2 tahun setelah lulus sudah berapa kali pindah perusahaan? (Deskripsikan)', 3, 'Ya', 'Text Box', 'nama1', '2023-02-01 06:15:06', 'nama1', '2023-02-01 06:15:06', 'Aktif'),
('Pilihlah hadiah yang menarik bagi alumni ! (Lucky Draw)', 'PKU060', 'Pilihlah hadiah yang menarik bagi alumni ! (Lucky Draw)', 3, 'Ya', 'Combo Box', 'nama1', '2023-02-01 06:15:29', 'nama1', '2023-02-01 06:15:29', 'Aktif'),
('Posisi anda di perusahaan disaat anda pertama kali mendapat pekerjaan?', 'PKU061', 'Posisi anda di perusahaan disaat anda pertama kali mendapat pekerjaan?', 3, 'Ya', 'Combo Box', 'nama1', '2023-02-01 06:16:06', 'nama1', '2023-02-01 06:21:20', 'Aktif'),
('Deskripsi Pekerjaan', 'PKU062', 'Deskripsi Pekerjaan', 3, 'Ya', 'Text Area', 'nama1', '2023-02-01 06:16:31', 'nama1', '2023-02-01 06:16:31', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `ts_provinsi`
--

CREATE TABLE `ts_provinsi` (
  `provinsi_deskripsi` varchar(100) NOT NULL,
  `provinsi_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

INSERT INTO `ts_registrasialumni` (`alamat`, `email`, `id`, `nama`, `nik`, `nim`, `password`, `status`, `tahun_lulus`, `tanggal_lahir`, `telepon`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
('alamat1', 'email1@gmail.com', 17, 'nama1', '1111111111111111', '0320180001', '79d06f8c00a355f8bf9dbb032780e5a5b62ebd46b76460fe664cacebaf41050b10e4697c46a24c406820d9b6a26feecd2564e24e9b06c545871c96e28ed06278lhecZnYC4vOD0UfOAM3EAoDVt8FhSoFpz1vSwvxV5Wk=', 'Belum Diverifikasi', '2021', '2000-08-11', '1111111111111', 'nama1', '2023-01-25 10:36:57', 'nama1', '2023-01-30 08:28:52'),
('alamat2', 'email2@gmail.com', 18, 'nama2', '2222222222222222', '0320190002', '591d7c7c6396f4d1a877cf13b1fb36fe26f4634457fa30ced80b621e8a49e6d214e1adcc0425349d0d1af5795fd00437e9b5746a20f1a7adb9388c14b02d3852+tZEPzbTzx07FHkIUx+wsXciS8MpON74T5Y2xEsGa9o=', 'Diterima', '2022', '2001-07-18', '2222222222222', 'nama2', '2023-01-25 10:38:33', 'nama1', '2023-01-30 02:39:11'),
('alamat3', 'email3@gmail.com', 19, 'nama23', '3333333333333333', '0320190001', '97fc174c4b7292f0eb4f03d45b8a3d2bce710952903da27c8fa276acf66414beb95a13a163ad67a61a515c0b885bd6b8e2d706d684c3feb7da7ee28db29b0a6dm6gPh7om+SBRyv6uKyckBJ+n+Vz833QusuUXhsXaHFU=', 'Ditolak', '2023', '2001-04-06', '3333333333333', 'nama3', '2023-01-27 16:41:47', 'nama1', '2023-01-30 08:09:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ts_admin`
--
ALTER TABLE `ts_admin`
  ADD PRIMARY KEY (`id_admin`);

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
-- AUTO_INCREMENT for table `ts_detailjenisperiode`
--
ALTER TABLE `ts_detailjenisperiode`
  MODIFY `id_detailPeriode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ts_detailpertanyaanjawaban`
--
ALTER TABLE `ts_detailpertanyaanjawaban`
  MODIFY `id_detailPertanyaanJawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ts_registrasialumni`
--
ALTER TABLE `ts_registrasialumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

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
