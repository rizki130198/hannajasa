-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2019 at 03:15 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `balik_nama`
--

CREATE TABLE `balik_nama` (
  `id_balik` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `perhitungan` varchar(200) DEFAULT NULL,
  `no` varchar(20) DEFAULT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `jenis_jasa` varchar(100) DEFAULT NULL,
  `jenis_k` varchar(225) DEFAULT NULL,
  `pkb` varchar(225) DEFAULT NULL,
  `bbnk` varchar(225) DEFAULT NULL,
  `adm_stnk` varchar(225) DEFAULT NULL,
  `ganti` varchar(225) DEFAULT NULL,
  `ganti1` varchar(100) DEFAULT NULL,
  `adm_tnkb` varchar(225) DEFAULT NULL,
  `telat` varchar(225) DEFAULT NULL,
  `telat_t_t` varchar(100) DEFAULT NULL,
  `telat_b_t` varchar(100) DEFAULT NULL,
  `sanksi_pkb` varchar(225) DEFAULT NULL,
  `swdkllj` varchar(225) DEFAULT NULL,
  `sanksi_swdkllj` varchar(225) DEFAULT NULL,
  `biaya_jasa` varchar(100) DEFAULT NULL,
  `total_pajak` varchar(100) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  `wilayah` varchar(100) DEFAULT NULL,
  `jenis_ktahun` varchar(100) DEFAULT NULL,
  `pkb_bulan` varchar(100) DEFAULT NULL,
  `pkb_tahun` varchar(100) DEFAULT NULL,
  `bbnk_bulan` varchar(100) DEFAULT NULL,
  `adm_stnkb` varchar(100) DEFAULT NULL,
  `adm_tnkb_bulan` varchar(100) DEFAULT NULL,
  `sanksi_pkbt` varchar(100) DEFAULT NULL,
  `swdkllj_bulan` varchar(100) DEFAULT NULL,
  `swdkllj_tahun` varchar(100) DEFAULT NULL,
  `sanksi_swdkllj_t` varchar(100) DEFAULT NULL,
  `ganti_lainnya` varchar(100) DEFAULT NULL,
  `kendaraan` varchar(100) DEFAULT NULL,
  `biaya_lainnya` varchar(100) DEFAULT NULL,
  `ganti_bulan` varchar(100) DEFAULT NULL,
  `kendaraan_bulan` varchar(100) DEFAULT NULL,
  `biaya_bulan` varchar(100) DEFAULT NULL,
  `hari` varchar(30) DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balik_nama`
--

INSERT INTO `balik_nama` (`id_balik`, `id_user`, `perhitungan`, `no`, `jenis`, `jenis_jasa`, `jenis_k`, `pkb`, `bbnk`, `adm_stnk`, `ganti`, `ganti1`, `adm_tnkb`, `telat`, `telat_t_t`, `telat_b_t`, `sanksi_pkb`, `swdkllj`, `sanksi_swdkllj`, `biaya_jasa`, `total_pajak`, `total`, `wilayah`, `jenis_ktahun`, `pkb_bulan`, `pkb_tahun`, `bbnk_bulan`, `adm_stnkb`, `adm_tnkb_bulan`, `sanksi_pkbt`, `swdkllj_bulan`, `swdkllj_tahun`, `sanksi_swdkllj_t`, `ganti_lainnya`, `kendaraan`, `biaya_lainnya`, `ganti_bulan`, `kendaraan_bulan`, `biaya_bulan`, `hari`, `tanggal`) VALUES
(5, 1, 'Motor', '084120221593317', 'Pajak Hidup', 'Jasa Konsumen Umum', '', '200000', '134000', '100000', NULL, NULL, '', '', '0', '0', '', '35000', '32000', '20000', '434000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sabtu', '2019-01-19 00:00:00'),
(6, 4, 'Motor', '817909277973411', 'Pajak Hidup', 'Jasa Mediator/Cabang/Agen', '', '435000', '291450', '100000', NULL, NULL, '', '', '0', '0', '', '35000', '32000', '25000', '826450', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sabtu', '2019-01-19 00:00:00'),
(7, 4, 'Motor', '550692572383342', 'Pajak Hidup', 'Jasa Konsumen Umum', '', '300000', '201000', '100000', NULL, NULL, '', '', '0', '0', '', '35000', '32000', '20000', '601000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sabtu', '2019-01-19 00:00:00'),
(8, 1, 'Motor', '591500523548992', 'Pajak Hidup', 'Jasa Konsumen Umum', '', '250000', '1675', '100000', NULL, NULL, '', '', '0', '0', '', '35000', '32000', '25000', '35001675', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rabu', '2019-01-30 00:00:00'),
(9, 1, 'Motor', '190318322202346', 'Pajak Normal', 'Jasa Konsumen Umum', '', '250000', '167500', '100000', 'ada', NULL, '60000', '', '0', '0', '', '35000', '32000', '25000', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kamis', '2019-01-31 00:00:00'),
(10, 1, 'Mobil', '281740976641924', 'Pajak Telat Lebih dari 1 Tahun', 'Distributor', 'Motor', '12121', '8121', '200000', 'ada', 'ada', '60000', '4', '12', '4', '96969', '143000', '100000', '15000', '253045375', '2545454', NULL, 'Mobil', '1212121', '12121', '8121', '200000', '60000', '48484', '143000', '143000', '100000', ',,,,', ',,,,', ',,,,', ',,,,', ',,,,', ',,,,', 'Jumat', '2019-02-01 00:00:00'),
(11, 1, 'Mobil', '201861508458290', 'Pajak Telat Lebih dari 1 Tahun', 'Distributor', 'Mobil', '150500', '100835', '200000', 'ada', NULL, '100000', '4', '24', '2', '9600', '143000', '100000', '15000', '2236935', '2251935', NULL, '', '120000', '120000', '80400', '200000', '100000', '780000', '143000', '143000', '100000', 'ada,ada,ada,ada,', 'Mobil,Motor,Motor,Motor,', '60000,450000,25000,,', ',,,,', ',,,,', ',,,,', 'Jumat', '2019-02-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `blanko`
--

CREATE TABLE `blanko` (
  `id` int(11) NOT NULL,
  `stok_blanko` varchar(100) NOT NULL,
  `tgl_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blanko`
--

INSERT INTO `blanko` (`id`, `stok_blanko`, `tgl_update`) VALUES
(1, '998', '2019-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id_catat` int(11) NOT NULL,
  `proses` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` enum('Motor','Mobil','Mobil Angkutan') NOT NULL,
  `jenis_harga` enum('swdkllj','stnk','tnkb','sanksi','jasa','jasa_select') NOT NULL,
  `wilayah` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id_catat`, `proses`, `nama`, `jenis`, `jenis_harga`, `wilayah`, `harga`, `created_at`) VALUES
(1, '', 'SWDKLLJ Motor', 'Motor', 'swdkllj', '', '35000', '2019-01-14'),
(2, '', 'SWDKLLJ Mobil', 'Mobil', 'swdkllj', '', '143000', '2019-01-14'),
(3, '', 'SWDKLLJ Mobil Angkutan', 'Mobil Angkutan', 'swdkllj', '', '73000', '2019-01-14'),
(4, '', 'Adm STNK Motor', 'Motor', 'stnk', '', '100000', '2019-01-14'),
(5, '', 'Adm STNK Mobil', 'Mobil', 'stnk', '', '200000', '2019-01-14'),
(6, '', 'Adm TNKB Motor', 'Motor', 'tnkb', '', '60000', '2019-01-14'),
(7, '', 'Adm TNKB Mobil', 'Mobil', 'tnkb', '', '100000', '2018-12-29'),
(8, '', 'Adm TNKB Mobil Angkutan', 'Mobil Angkutan', 'tnkb', '', '72000', '2018-12-29'),
(9, '', 'Sanksi SWDKLLJ Motor', 'Motor', 'sanksi', '', '32000', '2019-01-14'),
(10, '', 'Sanksi SWDKLLJ Mobil', 'Mobil', 'sanksi', '', '100000', '2019-01-14'),
(11, '', 'Jasa Konsumen Umum', '', 'jasa_select', '-', '25000', '2019-01-30'),
(12, '', 'Jasa Agen', '', 'jasa_select', '-', '18000', '2019-01-30'),
(13, '', 'Distributor', '', 'jasa_select', '-', '15000', '2019-01-30'),
(14, 'Perpanjang', 'Perpanjang Pajak STNK', 'Motor', 'jasa', 'Jakarta', '25000', '2019-01-14'),
(15, 'Perpanjang', 'Perpanjang Pajak STNK', 'Mobil', 'jasa', 'Jakarta', '35000', '2019-01-14'),
(16, 'Perpanjang', 'Perpanjang Pajak STNK', 'Motor', 'jasa', 'bekasi', '60000', '2019-01-14'),
(17, 'Perpanjang', 'Perpanjang Pajak STNK', 'Mobil', 'jasa', 'Bekasi', '75000', '2019-01-14'),
(18, 'Perpanjang', 'Perpanjang Pajak STNK', 'Motor', 'jasa', 'Tanggerang', '60000', '2019-01-14'),
(19, 'Perpanjang', 'Perpanjang Pajak STNK', 'Mobil', 'jasa', 'Tanggerang', '75000', '2019-01-14'),
(20, 'Perpanjang', 'Perpanjang Pajak STNK', 'Mobil', 'jasa', 'Tanggerang', '75000', '2018-12-29'),
(21, 'Perpanjang', 'Perpanjang Pajak STNK', 'Motor', 'jasa', 'Depok', '60000', '2018-12-29'),
(22, 'Perpanjang', 'Perpanjang Pajak STNK', 'Mobil', 'jasa', 'Depok', '75000', '2019-01-14'),
(23, 'Perpanjang', 'Cek Fisik 5 Tahun', 'Motor', 'jasa', 'Jakarta', '60000', '2019-01-14'),
(24, 'Perpanjang', 'Cek Fisik 5 Tahun', 'Mobil', 'jasa', 'Jakarta', '75000', '2019-01-16'),
(25, 'Perpanjang', 'Cek Fisik 5 Tahun', 'Motor', 'jasa', 'Bekasi', '60000', '0000-00-00'),
(26, 'Perpanjang', 'Cek Fisik 5 Tahun', 'Mobil', 'jasa', 'Bekasi', '75000', '2019-01-17'),
(27, 'Perpanjang', 'Cek Fisik 5 Tahun', 'Motor', 'jasa', 'Tanggerang', '60000', '2019-01-14'),
(28, 'Perpanjang', 'Cek Fisik 5 Tahun', 'Mobil', 'jasa', 'Tanggerang', '75000', '2019-01-14'),
(29, 'Perpanjang', 'Cek Fisik 5 Tahun', 'Motor', 'jasa', 'Depok', '60000', '2019-01-14'),
(30, 'Perpanjang', 'Cek Fisik 5 Tahun', 'Mobil', 'jasa', 'Depok', '75000', '2019-01-14'),
(31, 'Perpanjang', 'ACC BPKB', 'Motor', 'jasa', 'Jakarta', '35000', '2019-01-14'),
(32, 'Perpanjang', 'ACC BPKB', 'Mobil', 'jasa', 'Jakarta', '45000', '2019-01-14'),
(33, 'Perpanjang', 'ACC BPKB', 'Motor', 'jasa', 'Bekasi', '50000', '2018-12-29'),
(34, 'Perpanjang', 'ACC BPKB', 'Mobil', 'jasa', 'Bekasi', '60000', '2018-12-29'),
(35, 'Perpanjang', 'ACC BPKB', 'Motor', 'jasa', 'Tanggerang', '50000', '2019-01-14'),
(36, 'Perpanjang', 'ACC BPKB', 'Mobil', 'jasa', 'Tanggerang', '60000', '2019-01-14'),
(37, 'Perpanjang', 'ACC BPKB', 'Motor', 'jasa', 'Depok', '50000', '2019-01-16'),
(38, 'Perpanjang', 'ACC BPKB', 'Mobil', 'jasa', 'Depok', '75000', '2019-01-21'),
(39, 'Perpanjang', 'Adm SKP', 'Motor', 'jasa', 'Jakarta', '25000', '2019-01-30'),
(40, 'Perpanjang', 'Adm SKP', 'Mobil', 'jasa', 'Jakarta', '30000', '2019-01-30'),
(41, 'Perpanjang', 'Adm SKP', 'Motor', 'jasa', 'Bekasi', '25000', '2019-01-30'),
(42, 'Perpanjang', 'Adm SKP', 'Mobil', 'jasa', 'Bekasi', '30000', '2019-01-30'),
(43, 'Perpanjang', 'Adm SKP', 'Motor', 'jasa', 'Tanggerang', '25000', '2019-01-30'),
(44, 'Perpanjang', 'Adm SKP', 'Mobil', 'jasa', 'Tanggerang', '30000', '2019-01-30'),
(45, 'Perpanjang', 'Adm SKP', 'Motor', 'jasa', 'Depok', '25000', '2019-01-30'),
(46, 'Perpanjang', 'Adm SKP', 'Mobil', 'jasa', 'Depok', '30000', '2019-01-30'),
(47, 'Perpanjang', 'ACC KTP / ACC Perizinan', 'Motor', 'jasa', 'Jakarta', '275000', '2018-12-29'),
(48, 'Perpanjang', 'ACC KTP / ACC Perizinan', 'Mobil', 'jasa', 'Jakarta', '750000', '2019-01-14'),
(49, 'Perpanjang', 'ACC KTP / ACC Perizinan', 'Motor', 'jasa', 'Bekasi', '450000', '2019-01-14'),
(50, 'Perpanjang', 'ACC KTP / ACC Perizinan', 'Mobil', 'jasa', 'Bekasi', '750000', '2019-01-16'),
(51, 'Perpanjang', 'ACC KTP / ACC Perizinan', 'Motor', 'jasa', 'Tanggerang', '450000', '2019-01-21'),
(52, 'Perpanjang', 'ACC KTP / ACC Perizinan', 'Mobil', 'jasa', 'Tanggerang', '750000', '2019-01-21'),
(53, 'Perpanjang', 'ACC KTP / ACC Perizinan', 'Motor', 'jasa', 'Depok', '450000', '2019-01-21'),
(54, 'Perpanjang', 'ACC KTP / ACC Perizinan', 'Mobil', 'jasa', 'Depok', '750000', '2019-01-21'),
(55, 'Perpanjang', 'ACC KTP (Ganti Plat)', 'Motor', 'jasa', 'Jakarta', '325000', '2019-01-21'),
(56, 'Perpanjang', 'ACC KTP (Ganti Plat)', 'Mobil', 'jasa', 'Jakarta', '800000', '2019-01-21'),
(57, 'Perpanjang', 'ACC KTP (Ganti Plat)', 'Motor', 'jasa', 'Tanggerang', '500000', '2019-01-21'),
(58, 'Perpanjang', 'ACC KTP (Ganti Plat)', 'Mobil', 'jasa', 'Tanggerang', '800000', '2019-01-21'),
(59, 'Perpanjang', 'ACC KTP (Ganti Plat)', 'Motor', 'jasa', 'Depok', '500000', '2019-01-21'),
(60, 'Perpanjang', 'ACC KTP (Ganti Plat)', 'Mobil', 'jasa', 'Depok', '800000', '2019-01-21'),
(61, 'Perpanjang', 'Lokus', 'Motor', 'jasa', 'Jakarta', '10000', '2019-01-30'),
(62, 'Perpanjang', 'Lokus', 'Mobil', 'jasa', 'Jakarta', '10000', '2019-01-30'),
(63, 'Perpanjang', 'Lokus', 'Motor', 'jasa', 'Tanggerang', '10000', '2019-01-30'),
(64, 'Perpanjang', 'Lokus', 'Mobil', 'jasa', 'Tanggerang', '10000', '2019-01-30'),
(65, 'Perpanjang', 'Lokus', 'Motor', 'jasa', 'Depok', '10000', '2019-01-30'),
(66, 'Perpanjang', 'Lokus', 'Mobil', 'jasa', 'Depok', '10000', '2019-01-30'),
(67, 'Perpanjang', 'ACC KTP (Ganti Plat)', 'Motor', 'jasa', 'Bekasi', '500000', '2019-01-21'),
(68, 'Perpanjang', 'ACC KTP (Ganti Plat)', 'Mobil', 'jasa', 'Bekasi', '800000', '2019-01-21'),
(69, 'Rubah Identitas STNK / BPKB', 'Balik Nama', 'Motor', 'jasa', 'Jakarta', '510000', '2019-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `cetak_balik`
--

CREATE TABLE `cetak_balik` (
  `id_cetak` int(11) NOT NULL,
  `id_join` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `no_telp` varchar(16) DEFAULT NULL,
  `atas_nama` varchar(100) DEFAULT NULL,
  `uang_dp` varchar(20) DEFAULT NULL,
  `bpkb` varchar(200) DEFAULT NULL,
  `sim` varchar(100) DEFAULT NULL,
  `wilayah` varchar(100) DEFAULT NULL,
  `nopol` varchar(50) DEFAULT NULL,
  `jenis_kendaraan` varchar(20) DEFAULT NULL,
  `tahun_pajak` varchar(9) DEFAULT NULL,
  `lainnya` text,
  `pengurusan` varchar(20) DEFAULT NULL,
  `pajak_ini` varchar(11) DEFAULT NULL,
  `pajak_lalu` varchar(11) DEFAULT NULL,
  `harga_pajak_ini` varchar(9) DEFAULT NULL,
  `harga_pajak_lalu` varchar(10) DEFAULT NULL,
  `total_cpajak` varchar(11) DEFAULT NULL,
  `proses_bn` varchar(11) DEFAULT NULL,
  `adm_skp` varchar(50) DEFAULT NULL,
  `plat` varchar(50) DEFAULT NULL,
  `surat_lp` varchar(50) DEFAULT NULL,
  `p_lainnya` text,
  `proses_lain` varchar(50) DEFAULT NULL,
  `harga_bn` varchar(10) DEFAULT NULL,
  `harga_adm` varchar(10) DEFAULT NULL,
  `harga_plat` varchar(11) DEFAULT NULL,
  `harga_lp` varchar(20) DEFAULT NULL,
  `h_lainnya` varchar(20) DEFAULT NULL,
  `harga_lainnya` varchar(20) DEFAULT NULL,
  `total_proses` varchar(20) DEFAULT NULL,
  `biaya_prediksi` varchar(20) DEFAULT NULL,
  `biaya_kurang` varchar(20) DEFAULT NULL,
  `status` enum('1','0','2') NOT NULL,
  `hari` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cetak_balik`
--

INSERT INTO `cetak_balik` (`id_cetak`, `id_join`, `id_user`, `penerima`, `no_telp`, `atas_nama`, `uang_dp`, `bpkb`, `sim`, `wilayah`, `nopol`, `jenis_kendaraan`, `tahun_pajak`, `lainnya`, `pengurusan`, `pajak_ini`, `pajak_lalu`, `harga_pajak_ini`, `harga_pajak_lalu`, `total_cpajak`, `proses_bn`, `adm_skp`, `plat`, `surat_lp`, `p_lainnya`, `proses_lain`, `harga_bn`, `harga_adm`, `harga_plat`, `harga_lp`, `h_lainnya`, `harga_lainnya`, `total_proses`, `biaya_prediksi`, `biaya_kurang`, `status`, `hari`, `tanggal`) VALUES
(3, 5, 1, 'rizki', '1231231', 'asdaf', '200000', 'ada,,', 'asli,', 'jakarta', '3636 HED', 'motor', '2020', 'asdasd', 'balik nama,', 'ada', 'ada', '200000', '200000', '400,000', 'ada', NULL, NULL, NULL, NULL, NULL, '200000', '', '', '', NULL, NULL, '200,000', '200000', '200000', '1', 'Sabtu', '2019-01-19'),
(4, 6, 4, 'rizki', '1', 'aa', '2', 'ada,ada,', 'asli,fotocopy', 'jakarta', '3123 ABC', 'motor', '2020', 'test', 'balik nama,penyesuai', 'ada', 'ada', '200000', '200000', '400,000', 'ada', 'ada', 'ada', 'ada', '', '', '200000', '200000', '200000', '200000', '200000', '200000', '1,200,000', '400000', '200000', '1', 'Sabtu', '2019-01-19'),
(5, 7, 4, 'a', '1', 'aa', '2', 'ada,,', 'asli,', '', '', 'motor', '', '', ',', 'ada', 'ada', '200000', '200000', '400,000', 'ada', 'ada', 'ada', 'ada', 'a', 'b', '2', '2', '2', '2', '2', '2', '12', '39999', '29999', '1', 'Sabtu', '2019-01-19'),
(6, 11, 1, '', '', '', '2907335', ',,', ',', '', '', 'motor', '', '', ',', '150500', 'ada', '1244335', '1158000', '2372335', 'ada', 'ada', NULL, NULL, NULL, NULL, '60000', '25000', '', '', NULL, NULL, '535000', '2907335', '0', '1', 'Jumat', '2019-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `cetak_berkas`
--

CREATE TABLE `cetak_berkas` (
  `id_berkas` int(11) NOT NULL,
  `id_uri` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis` varchar(200) DEFAULT NULL,
  `nama_pemilik` varchar(100) DEFAULT NULL,
  `nopol` varchar(100) DEFAULT NULL,
  `faktur` varchar(100) DEFAULT NULL,
  `biaya` varchar(100) DEFAULT NULL,
  `tgl_bpkb` date NOT NULL,
  `hari` varchar(100) DEFAULT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cetak_mutasi`
--

CREATE TABLE `cetak_mutasi` (
  `id_cetak` int(11) NOT NULL,
  `id_join` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `no_telp` varchar(16) DEFAULT NULL,
  `atas_nama` varchar(100) DEFAULT NULL,
  `uang_dp` varchar(20) DEFAULT NULL,
  `bpkb` varchar(200) DEFAULT NULL,
  `sim` varchar(100) DEFAULT NULL,
  `stnk` varchar(100) DEFAULT NULL,
  `wilayah` varchar(100) DEFAULT NULL,
  `nopol` varchar(50) DEFAULT NULL,
  `jenis_kendaraan` varchar(20) DEFAULT NULL,
  `tahun_pajak` varchar(9) DEFAULT NULL,
  `lainnya` text,
  `m_stnk` varchar(20) DEFAULT NULL,
  `c_berkas` varchar(20) DEFAULT NULL,
  `pajak_ini` varchar(11) DEFAULT NULL,
  `pajak_lalu` varchar(11) DEFAULT NULL,
  `harga_pajak_ini` varchar(9) DEFAULT NULL,
  `harga_pajak_lalu` varchar(10) DEFAULT NULL,
  `total_cpajak` varchar(100) DEFAULT NULL,
  `proses_pm` varchar(11) DEFAULT NULL,
  `adm_skp` varchar(50) DEFAULT NULL,
  `stnk_hilang` varchar(50) DEFAULT NULL,
  `p_lainnya` text,
  `proses_lain` varchar(50) DEFAULT NULL,
  `harga_pm` varchar(10) DEFAULT NULL,
  `harga_adm` varchar(10) DEFAULT NULL,
  `harga_hilang` varchar(11) DEFAULT NULL,
  `h_lainnya` varchar(20) DEFAULT NULL,
  `harga_lainnya` varchar(20) DEFAULT NULL,
  `total_proses` varchar(20) DEFAULT NULL,
  `biaya_prediksi` varchar(20) DEFAULT NULL,
  `biaya_kurang` varchar(20) DEFAULT NULL,
  `status` enum('1','0','2') NOT NULL,
  `hari` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cetak_mutasi`
--

INSERT INTO `cetak_mutasi` (`id_cetak`, `id_join`, `id_user`, `penerima`, `no_telp`, `atas_nama`, `uang_dp`, `bpkb`, `sim`, `stnk`, `wilayah`, `nopol`, `jenis_kendaraan`, `tahun_pajak`, `lainnya`, `m_stnk`, `c_berkas`, `pajak_ini`, `pajak_lalu`, `harga_pajak_ini`, `harga_pajak_lalu`, `total_cpajak`, `proses_pm`, `adm_skp`, `stnk_hilang`, `p_lainnya`, `proses_lain`, `harga_pm`, `harga_adm`, `harga_hilang`, `h_lainnya`, `harga_lainnya`, `total_proses`, `biaya_prediksi`, `biaya_kurang`, `status`, `hari`, `tanggal`) VALUES
(2, 0, 4, 'rizki', '1231231', 'jaka', '200000', 'ada,,', 'asli,', 'ada,', '', '', 'motor', '', 'asdasd', 'a,a', 'a,a', 'ada', 'ada', '200000', '200000', '400,000', 'ada', 'ada', NULL, NULL, NULL, '200000', '200000', '', NULL, NULL, '400,000', '200000', '200000', '1', 'Sabtu', '2019-01-19'),
(3, 2, 4, 'dono', '1231231', 'Rizki', '200000', 'ada,,', 'asli,fotocopy', 'ada,', 'jakarta', '3123 ABC', 'motor', '2020', 'asd', 'a,a', ',', 'ada', NULL, '200000', '', '200,000', 'ada', NULL, NULL, NULL, NULL, '200000', '', '', NULL, NULL, '200,000', '200000', '29999', '1', 'Sabtu', '2019-01-19'),
(4, 3, 4, 'a', 'a', 'a', 'a', 'ada,ada,', 'asli,fotocopy', 'ada,ada', 'a', 'a', 'motor', 'a', 'a', 'a,b', 'c,d', 'ada', 'ada', '200000', '200000', '400,000', 'ada', 'ada', 'ada', 'a', 'b', '200000', '200000', '200000', '200000', '200000', '1,000,000', '200000', '200000', '1', 'Sabtu', '2019-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `cetak_mutasibn`
--

CREATE TABLE `cetak_mutasibn` (
  `id_cetak` int(11) NOT NULL,
  `id_join` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `no_telp` varchar(16) DEFAULT NULL,
  `atas_nama` varchar(100) DEFAULT NULL,
  `uang_dp` varchar(20) DEFAULT NULL,
  `bpkb` varchar(200) DEFAULT NULL,
  `sim` varchar(100) DEFAULT NULL,
  `stnk` varchar(100) DEFAULT NULL,
  `wilayah` varchar(100) DEFAULT NULL,
  `nopol` varchar(50) DEFAULT NULL,
  `jenis_kendaraan` varchar(20) DEFAULT NULL,
  `tahun_pajak` varchar(9) DEFAULT NULL,
  `lainnya` text,
  `m_stnk` varchar(20) DEFAULT NULL,
  `c_berkas` varchar(20) DEFAULT NULL,
  `pengurusan` varchar(100) DEFAULT NULL,
  `pajak_ini` varchar(11) DEFAULT NULL,
  `pajak_lalu` varchar(11) DEFAULT NULL,
  `harga_pajak_ini` varchar(9) DEFAULT NULL,
  `harga_pajak_lalu` varchar(10) DEFAULT NULL,
  `total_cpajak` varchar(100) DEFAULT NULL,
  `proses_pm` varchar(11) DEFAULT NULL,
  `proses_bn` varchar(100) DEFAULT NULL,
  `adm_skp` varchar(50) DEFAULT NULL,
  `stnk_hilang` varchar(50) DEFAULT NULL,
  `surat_lk` varchar(100) DEFAULT NULL,
  `plat` varchar(100) DEFAULT NULL,
  `p_lainnya` text,
  `proses_lain` varchar(50) DEFAULT NULL,
  `harga_pm` varchar(10) DEFAULT NULL,
  `harga_bn` varchar(100) DEFAULT NULL,
  `harga_adm` varchar(10) DEFAULT NULL,
  `harga_hilang` varchar(11) DEFAULT NULL,
  `harga_lk` varchar(100) DEFAULT NULL,
  `harga_plat` varchar(100) DEFAULT NULL,
  `h_lainnya` varchar(20) DEFAULT NULL,
  `harga_lainnya` varchar(20) DEFAULT NULL,
  `total_proses` varchar(20) DEFAULT NULL,
  `biaya_prediksi` varchar(20) DEFAULT NULL,
  `biaya_kurang` varchar(20) DEFAULT NULL,
  `status` enum('1','0','2') NOT NULL,
  `hari` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cetak_mutasibn`
--

INSERT INTO `cetak_mutasibn` (`id_cetak`, `id_join`, `id_user`, `penerima`, `no_telp`, `atas_nama`, `uang_dp`, `bpkb`, `sim`, `stnk`, `wilayah`, `nopol`, `jenis_kendaraan`, `tahun_pajak`, `lainnya`, `m_stnk`, `c_berkas`, `pengurusan`, `pajak_ini`, `pajak_lalu`, `harga_pajak_ini`, `harga_pajak_lalu`, `total_cpajak`, `proses_pm`, `proses_bn`, `adm_skp`, `stnk_hilang`, `surat_lk`, `plat`, `p_lainnya`, `proses_lain`, `harga_pm`, `harga_bn`, `harga_adm`, `harga_hilang`, `harga_lk`, `harga_plat`, `h_lainnya`, `harga_lainnya`, `total_proses`, `biaya_prediksi`, `biaya_kurang`, `status`, `hari`, `tanggal`) VALUES
(1, 0, 4, 'jamet', '1231231', 'danang', '400000', 'ada,,', 'asli,', 'ada,', 'jakarta', '3636 HED', 'motor', '2020', 'asd', ',', ',', 'balik nama,', 'ada', 'ada', '200000', '200000', '400,000', 'ada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '200000', '', '', '', '', '', NULL, NULL, '200,000', '400000', '200000', '1', 'Sabtu', '2019-01-19'),
(2, 2, 4, 'rizki', '1231231', 'joko', '200000', 'ada,,', ',fotocopy', 'ada,', 'depok', '3636 HED', 'mobil', '', 'asdasd', ',', ',', ',', 'ada', NULL, '200000', '', '200,000', 'ada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '200000', '', '', '', '', '', NULL, NULL, '200,000', '200000', '200000', '1', 'Sabtu', '2019-01-19'),
(3, 3, 4, 'a', 'a', 'a', 'a', 'ada,ada,', 'asli,fotocopy', 'ada,ada', 'a', 'a', 'motor', '2020', 'a', 'a,b', 'c,d', 'balik nama,penyesuaian alamat', 'ada', 'ada', '200000', '200000', '400,000', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'a', 'b', '200000', '200000', '200000', '200000', '200000', '200000', '200000', '200000', '1,600,000', '400000', '200000', '1', 'Sabtu', '2019-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `cetak_perpanjang`
--

CREATE TABLE `cetak_perpanjang` (
  `id_cetak` int(11) NOT NULL,
  `id_join` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `no_telp` varchar(16) DEFAULT NULL,
  `atas_nama` varchar(100) DEFAULT NULL,
  `uang_dp` varchar(20) DEFAULT NULL,
  `bpkb` varchar(200) DEFAULT NULL,
  `sim` varchar(100) DEFAULT NULL,
  `wilayah` varchar(100) DEFAULT NULL,
  `nopol` varchar(50) DEFAULT NULL,
  `jenis_kendaraan` varchar(20) DEFAULT NULL,
  `tahun_pajak` varchar(9) DEFAULT NULL,
  `lainnya` text,
  `pajak_ini` varchar(11) DEFAULT NULL,
  `pajak_lalu` varchar(11) DEFAULT NULL,
  `harga_pajak_ini` varchar(9) DEFAULT NULL,
  `harga_pajak_lalu` varchar(10) DEFAULT NULL,
  `total_cpajak` varchar(100) DEFAULT NULL,
  `biaya_jasa` varchar(11) DEFAULT NULL,
  `acc_bpkb` varchar(50) DEFAULT NULL,
  `plat` varchar(50) DEFAULT NULL,
  `adm_skp` varchar(50) DEFAULT NULL,
  `progresif` varchar(50) DEFAULT NULL,
  `proses_lain` varchar(50) DEFAULT NULL,
  `harga_jasa` varchar(10) DEFAULT NULL,
  `harga_bpkb` varchar(10) DEFAULT NULL,
  `harga_plat` varchar(11) DEFAULT NULL,
  `harga_adm` varchar(20) DEFAULT NULL,
  `harga_blokir` varchar(20) DEFAULT NULL,
  `harga_lainnya` varchar(20) DEFAULT NULL,
  `total_proses` varchar(20) DEFAULT NULL,
  `biaya_prediksi` varchar(20) DEFAULT NULL,
  `biaya_kurang` varchar(20) DEFAULT NULL,
  `status` enum('1','0','2') NOT NULL,
  `hari` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cetak_perpanjang`
--

INSERT INTO `cetak_perpanjang` (`id_cetak`, `id_join`, `id_user`, `penerima`, `no_telp`, `atas_nama`, `uang_dp`, `bpkb`, `sim`, `wilayah`, `nopol`, `jenis_kendaraan`, `tahun_pajak`, `lainnya`, `pajak_ini`, `pajak_lalu`, `harga_pajak_ini`, `harga_pajak_lalu`, `total_cpajak`, `biaya_jasa`, `acc_bpkb`, `plat`, `adm_skp`, `progresif`, `proses_lain`, `harga_jasa`, `harga_bpkb`, `harga_plat`, `harga_adm`, `harga_blokir`, `harga_lainnya`, `total_proses`, `biaya_prediksi`, `biaya_kurang`, `status`, `hari`, `tanggal`) VALUES
(1, 0, 4, 'dodo', '1124121241', 'rizki', '200000', 'Ada + Faktur,,,,,', 'Ada,', 'jakarta', '3636 HED', 'motor', '2020', '', 'ada', NULL, '200000', '', '200,000', 'ada', NULL, NULL, NULL, NULL, NULL, '300000', '', '', NULL, '', NULL, '300,000', '200000', '600', '1', 'Sabtu', '2019-01-19'),
(2, 2, 4, 'jamet', '1231231', 'Rizki', '200000', 'Ada + Faktur,,,,,', 'Ada,', 'jakarta', '3123 ABC', 'motor', '2020', '', 'ada', NULL, '200000', '', '200,000', 'ada', NULL, NULL, NULL, NULL, NULL, '300000', '', '', NULL, '', NULL, '300,000', '400000', '300000', '1', 'Sabtu', '2019-01-19'),
(3, 3, 4, 'a', '1', 'a', '1', 'Ada + Faktur,As Tanpa Faktur,Foto Copy,Surat Leasing,Tidak Ada/Acc,', 'Ada,Tidak Ada/Acc', 'jakarta', '3636 HED', 'motor', '2019', 'asdasd', 'ada', 'ada', '200000', '200000', '400,000', 'ada', 'ada', 'ada', 'ada', 'ada', 'asda', '300000', '200000', '200000', NULL, '200000', '29999', '1,129,999', '600', '600', '1', 'Sabtu', '2019-01-19'),
(5, 8, 1, 'ERNA', '087760500123', 'FITRI', '200000', ',,,,Tidak Ada/Acc,', 'Ada,', 'JAKARTA', '3366 UFI', 'motor', '23-02-201', '', '250000', NULL, '285000', '0', '285000', 'ada', 'on', NULL, NULL, NULL, NULL, '25000', '35000', '0', NULL, '', NULL, '60000', '345000', '110000', '1', 'Rabu', '2019-01-30'),
(6, 9, 1, 'test', '1231231', 'Rizki', '200000', 'Ada + Faktur,As Tanpa Faktur,,,,', 'Ada,', 'jakarta', '3123 ABC', 'motor', '2020', 'asdasd', '300000', NULL, '335000', '0', '335000', 'ada', NULL, NULL, NULL, NULL, NULL, '350000', '', '0', NULL, '', NULL, '350000', '685000', '485000', '1', 'Rabu', '2019-01-30'),
(7, 5, 1, '', '', '', '', ',,,,,', ',', '', '', 'motor', '', '', '300000', '35000', '335000', '267000', '602000', 'ada', 'ada', 'ada', 'ada', NULL, NULL, '25000', '45000', '300000', NULL, '', NULL, '415000', '1017000', '1017000', '1', 'Rabu', '2019-01-30'),
(11, 4, 1, '', '', '', '', ',,,,,', ',', '', '', 'motor', '', '', '300000', NULL, '335000', '0', '335000', 'ada', NULL, NULL, NULL, NULL, NULL, '358000', '', '0', NULL, '', NULL, '358000', '693000', '693000', '1', 'Kamis', '2019-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `cetak_sb`
--

CREATE TABLE `cetak_sb` (
  `id_cetak` int(11) NOT NULL,
  `id_join` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `no_telp` varchar(16) DEFAULT NULL,
  `atas_nama` varchar(100) DEFAULT NULL,
  `uang_dp` varchar(20) DEFAULT NULL,
  `bpkb` varchar(200) DEFAULT NULL,
  `sim` varchar(100) DEFAULT NULL,
  `stnk` varchar(100) DEFAULT NULL,
  `wilayah` varchar(100) DEFAULT NULL,
  `nopol` varchar(50) DEFAULT NULL,
  `jenis_kendaraan` varchar(20) DEFAULT NULL,
  `tahun_pajak` varchar(9) DEFAULT NULL,
  `lainnya` text,
  `pengurusan` varchar(20) DEFAULT NULL,
  `pajak_ini` varchar(11) DEFAULT NULL,
  `pajak_lalu` varchar(11) DEFAULT NULL,
  `harga_pajak_ini` varchar(9) DEFAULT NULL,
  `harga_pajak_lalu` varchar(10) DEFAULT NULL,
  `total_cpajak` varchar(100) DEFAULT NULL,
  `proses_sh` varchar(100) DEFAULT NULL,
  `proses_bn` varchar(11) DEFAULT NULL,
  `adm_skp` varchar(50) DEFAULT NULL,
  `surat_lp` varchar(50) DEFAULT NULL,
  `plat` varchar(50) DEFAULT NULL,
  `balik_nama` varchar(100) DEFAULT NULL,
  `proses_pa` varchar(100) DEFAULT NULL,
  `psl` varchar(100) DEFAULT NULL,
  `p_lainnya` text,
  `proses_lain` varchar(50) DEFAULT NULL,
  `harga_sh` varchar(100) DEFAULT NULL,
  `harga_bn` varchar(10) DEFAULT NULL,
  `harga_adm` varchar(10) DEFAULT NULL,
  `harga_lp` varchar(20) DEFAULT NULL,
  `harga_plat` varchar(11) DEFAULT NULL,
  `harga_balik` varchar(100) DEFAULT NULL,
  `harga_pa` varchar(100) DEFAULT NULL,
  `harga_psl` varchar(100) DEFAULT NULL,
  `h_lainnya` varchar(20) DEFAULT NULL,
  `harga_lainnya` varchar(20) DEFAULT NULL,
  `total_proses` varchar(20) DEFAULT NULL,
  `biaya_prediksi` varchar(20) DEFAULT NULL,
  `biaya_kurang` varchar(20) DEFAULT NULL,
  `status` enum('1','0','2') NOT NULL,
  `hari` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cetak_sb`
--

INSERT INTO `cetak_sb` (`id_cetak`, `id_join`, `id_user`, `penerima`, `no_telp`, `atas_nama`, `uang_dp`, `bpkb`, `sim`, `stnk`, `wilayah`, `nopol`, `jenis_kendaraan`, `tahun_pajak`, `lainnya`, `pengurusan`, `pajak_ini`, `pajak_lalu`, `harga_pajak_ini`, `harga_pajak_lalu`, `total_cpajak`, `proses_sh`, `proses_bn`, `adm_skp`, `surat_lp`, `plat`, `balik_nama`, `proses_pa`, `psl`, `p_lainnya`, `proses_lain`, `harga_sh`, `harga_bn`, `harga_adm`, `harga_lp`, `harga_plat`, `harga_balik`, `harga_pa`, `harga_psl`, `h_lainnya`, `harga_lainnya`, `total_proses`, `biaya_prediksi`, `biaya_kurang`, `status`, `hari`, `tanggal`) VALUES
(1, 0, 4, 'Adit', '92184127129', 'Rizki', '200000', 'ada,,,,', 'asli,', 'ada,', 'jakarta', '3636 HED', 'motor', '2020', '', ',', 'ada', 'ada', '200000', '200000', '400,000', 'ada', 'ada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '200000', '200000', '', '', '', '', '', '', NULL, NULL, '400,000', '200000', '200000', '1', 'Sabtu', '2019-01-19'),
(2, 2, 4, 'Adit', '1231231', 'Rizki', '200000', 'ada,,ada,,', 'asli,', 'ada,', 'depok', '3636 HED', 'motor', '2020', '', ',', 'ada', NULL, '200000', '', '200,000', 'ada', 'ada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '200000', '200000', '', '', '', '', '', '', NULL, NULL, '400,000', '400000', '300000', '1', 'Sabtu', '2019-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `cetak_stnk`
--

CREATE TABLE `cetak_stnk` (
  `id_cetak` int(11) NOT NULL,
  `id_join` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `no_telp` varchar(16) DEFAULT NULL,
  `atas_nama` varchar(100) DEFAULT NULL,
  `uang_dp` varchar(20) DEFAULT NULL,
  `bpkb` varchar(200) DEFAULT NULL,
  `sim` varchar(100) DEFAULT NULL,
  `stnk` varchar(100) DEFAULT NULL,
  `wilayah` varchar(100) DEFAULT NULL,
  `nopol` varchar(50) DEFAULT NULL,
  `jenis_kendaraan` varchar(20) DEFAULT NULL,
  `lainnya` text,
  `pajak_ini` varchar(11) DEFAULT NULL,
  `pajak_lalu` varchar(11) DEFAULT NULL,
  `harga_pajak_ini` varchar(9) DEFAULT NULL,
  `harga_pajak_lalu` varchar(10) DEFAULT NULL,
  `total_cpajak` varchar(100) DEFAULT NULL,
  `biaya_ps` varchar(100) DEFAULT NULL,
  `adm_skp` varchar(50) DEFAULT NULL,
  `slp` varchar(50) DEFAULT NULL,
  `plat` varchar(50) DEFAULT NULL,
  `balik_nama` varchar(50) DEFAULT NULL,
  `p_alamat` varchar(100) DEFAULT NULL,
  `psl` varchar(100) DEFAULT NULL,
  `p_lain` varchar(100) DEFAULT NULL,
  `p_lainnya` varchar(100) DEFAULT NULL,
  `harga_ps` varchar(10) DEFAULT NULL,
  `harga_adm` varchar(10) DEFAULT NULL,
  `harga_slp` varchar(11) DEFAULT NULL,
  `harga_plat` varchar(20) DEFAULT NULL,
  `harga_gb` varchar(20) DEFAULT NULL,
  `harga_pa` varchar(20) DEFAULT NULL,
  `harga_lain` varchar(20) DEFAULT NULL,
  `harga_lainnya` varchar(20) DEFAULT NULL,
  `harga_psl` varchar(20) DEFAULT NULL,
  `total_proses` varchar(20) DEFAULT NULL,
  `biaya_prediksi` varchar(20) DEFAULT NULL,
  `biaya_kurang` varchar(20) DEFAULT NULL,
  `hari` varchar(100) DEFAULT NULL,
  `status` enum('1','0','2') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cetak_stnk`
--

INSERT INTO `cetak_stnk` (`id_cetak`, `id_join`, `id_user`, `penerima`, `no_telp`, `atas_nama`, `uang_dp`, `bpkb`, `sim`, `stnk`, `wilayah`, `nopol`, `jenis_kendaraan`, `lainnya`, `pajak_ini`, `pajak_lalu`, `harga_pajak_ini`, `harga_pajak_lalu`, `total_cpajak`, `biaya_ps`, `adm_skp`, `slp`, `plat`, `balik_nama`, `p_alamat`, `psl`, `p_lain`, `p_lainnya`, `harga_ps`, `harga_adm`, `harga_slp`, `harga_plat`, `harga_gb`, `harga_pa`, `harga_lain`, `harga_lainnya`, `harga_psl`, `total_proses`, `biaya_prediksi`, `biaya_kurang`, `hari`, `status`, `tanggal`) VALUES
(1, 0, 4, 'kelvin', '0892?1312?3123', 'Rizki', '200000', 'ada,,,,', 'asli,', 'ada,', 'jakarta', '3636 HED', 'motor', '', 'ada', NULL, '200000', '', '200,000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, '', '200,000', '200000', '200000', 'Sabtu', '1', '2019-01-19'),
(2, 2, 4, 'koko', '1231231', 'Rizki', '200000', 'ada,,,,', 'asli,', 'ada,', 'depok', '3636 HED', 'motor', '', 'ada', NULL, '200000', '', '200,000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, '', '200,000', '39999', '29999', 'Sabtu', '1', '2019-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_histori` int(11) NOT NULL,
  `id_data` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

CREATE TABLE `mutasi` (
  `id_mutasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `perhitungan` varchar(200) DEFAULT NULL,
  `no` varchar(20) DEFAULT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `jenis_k` varchar(225) DEFAULT NULL,
  `pkb` varchar(225) DEFAULT NULL,
  `pkb1` varchar(100) DEFAULT NULL,
  `swdkllj` varchar(225) DEFAULT NULL,
  `swdkllj1` varchar(225) DEFAULT NULL,
  `sanksi_swdkllj` varchar(225) DEFAULT NULL,
  `adm_stnk` varchar(225) DEFAULT NULL,
  `adm_tnkb` varchar(225) DEFAULT NULL,
  `sanksi_pkb` varchar(225) DEFAULT NULL,
  `jenis_jasa` varchar(100) DEFAULT NULL,
  `biaya_jasa` varchar(100) DEFAULT NULL,
  `total_pajak` varchar(100) DEFAULT NULL,
  `telat` varchar(225) DEFAULT NULL,
  `telat_tahun` varchar(100) DEFAULT NULL,
  `total` varchar(225) DEFAULT NULL,
  `hari` varchar(30) DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`id_mutasi`, `id_user`, `perhitungan`, `no`, `jenis`, `jenis_k`, `pkb`, `pkb1`, `swdkllj`, `swdkllj1`, `sanksi_swdkllj`, `adm_stnk`, `adm_tnkb`, `sanksi_pkb`, `jenis_jasa`, `biaya_jasa`, `total_pajak`, `telat`, `telat_tahun`, `total`, `hari`, `tanggal`) VALUES
(1, 4, NULL, '657081468804157', 'Pajak Hidup', 'Motor', '300000', '', '35000', '35000', '32000', '100000', '60000', NULL, 'Jasa Konsumen Umum', '20000', '495000', '0', NULL, '515000', 'Sabtu', '2019-01-19 00:00:00'),
(2, 4, NULL, '296969748361407', 'Pajak Telat Lebih dari 1 Tahun', 'Mobil', '300000', '100000', '143000', '143000', '100000', '200000', '100000', NULL, 'Jasa Konsumen Umum', '20000', '1986000', '0', NULL, '2006000', 'Sabtu', '2019-01-19 00:00:00'),
(3, 4, NULL, '744198240387884', 'Pajak Hidup', 'Motor', '200', '', '35000', '35000', '32000', '100000', '60000', NULL, 'Jasa Mediator/Cabang/Agen', '25000', '195200', '0', NULL, '220200', 'Sabtu', '2019-01-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_bn`
--

CREATE TABLE `mutasi_bn` (
  `id_mutasibn` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `perhitungan` varchar(200) DEFAULT NULL,
  `no` varchar(20) DEFAULT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `jenis_k` varchar(225) DEFAULT NULL,
  `bbnkb` varchar(100) DEFAULT NULL,
  `pkb` varchar(225) DEFAULT NULL,
  `pkb1` varchar(100) DEFAULT NULL,
  `swdkllj` varchar(225) DEFAULT NULL,
  `swdkllj1` varchar(225) DEFAULT NULL,
  `sanksi_swdkllj` varchar(225) DEFAULT NULL,
  `adm_stnk` varchar(225) DEFAULT NULL,
  `adm_tnkb` varchar(225) DEFAULT NULL,
  `sanksi_pkb` varchar(225) DEFAULT NULL,
  `jenis_jasa` varchar(100) DEFAULT NULL,
  `biaya_jasa` varchar(100) DEFAULT NULL,
  `total_pajak` varchar(100) DEFAULT NULL,
  `telat` varchar(225) DEFAULT NULL,
  `telat_thn` varchar(100) DEFAULT NULL,
  `telat_thn1` varchar(100) DEFAULT NULL,
  `total` varchar(225) DEFAULT NULL,
  `hari` varchar(30) DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mutasi_bn`
--

INSERT INTO `mutasi_bn` (`id_mutasibn`, `id_user`, `perhitungan`, `no`, `jenis`, `jenis_k`, `bbnkb`, `pkb`, `pkb1`, `swdkllj`, `swdkllj1`, `sanksi_swdkllj`, `adm_stnk`, `adm_tnkb`, `sanksi_pkb`, `jenis_jasa`, `biaya_jasa`, `total_pajak`, `telat`, `telat_thn`, `telat_thn1`, `total`, `hari`, `tanggal`) VALUES
(1, 4, NULL, '096922180194309', 'Pajak Telat Lebih dari 1 Tahun', 'Motor', '67000', '300000', '100000', '35000', '35000', '32000', '100000', '60000', '1950000', 'Jasa Konsumen Umum', '20000', '2679000', '2', '24', NULL, '2699000', 'Sabtu', '2019-01-19 00:00:00'),
(2, 4, NULL, '805373319004529', 'Pajak Hidup', 'Motor', '134000', '200000', '', '35000', '35000', '32000', '100000', '60000', '', 'Jasa Konsumen Umum', '20000', '529000', '0', '0.25%', NULL, '549000', 'Sabtu', '2019-01-19 00:00:00'),
(3, 4, NULL, '005254105703046', 'Pajak Hidup', 'Motor', '201000', '300000', '', '35000', '35000', '32000', '100000', '60000', '', 'Jasa Konsumen Umum', '20000', '696000', '0', '0.25%', NULL, '515000', 'Sabtu', '2019-01-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `perpanjang`
--

CREATE TABLE `perpanjang` (
  `id_perpanjang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no` varchar(20) NOT NULL,
  `perhitungan` varchar(200) DEFAULT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `jenis_jasa` varchar(100) DEFAULT NULL,
  `pkb` varchar(9) DEFAULT NULL,
  `pkb_bulan` varchar(100) DEFAULT NULL,
  `pkb_tahun` varchar(100) DEFAULT NULL,
  `telat` varchar(10) DEFAULT NULL,
  `telat_tahun` varchar(9) DEFAULT NULL,
  `telat_bulan` varchar(100) DEFAULT NULL,
  `sanksi_pkb` varchar(9) DEFAULT NULL,
  `sanksi_pkb_t` varchar(9) DEFAULT NULL,
  `swdkllj` varchar(9) DEFAULT NULL,
  `swdkllj_bulan` varchar(100) DEFAULT NULL,
  `swdkllj_tahun` varchar(100) DEFAULT NULL,
  `sanksi_swdkllj` varchar(9) DEFAULT NULL,
  `sanksi_swdkllj_t` varchar(9) DEFAULT NULL,
  `ganti_plat` varchar(9) DEFAULT NULL,
  `ganti_lainnya` varchar(100) DEFAULT NULL,
  `jenis_k` varchar(100) DEFAULT NULL,
  `adm_stnk` varchar(20) DEFAULT NULL,
  `adm_tnkb` varchar(20) DEFAULT NULL,
  `wilayah` varchar(100) DEFAULT NULL,
  `kendaraan` varchar(100) DEFAULT NULL,
  `biaya_lainnya` varchar(100) DEFAULT NULL,
  `biaya_jasa` varchar(100) DEFAULT NULL,
  `total_pajak` varchar(100) DEFAULT NULL,
  `total` varchar(9) DEFAULT NULL,
  `hari` varchar(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perpanjang`
--

INSERT INTO `perpanjang` (`id_perpanjang`, `id_user`, `no`, `perhitungan`, `jenis`, `jenis_jasa`, `pkb`, `pkb_bulan`, `pkb_tahun`, `telat`, `telat_tahun`, `telat_bulan`, `sanksi_pkb`, `sanksi_pkb_t`, `swdkllj`, `swdkllj_bulan`, `swdkllj_tahun`, `sanksi_swdkllj`, `sanksi_swdkllj_t`, `ganti_plat`, `ganti_lainnya`, `jenis_k`, `adm_stnk`, `adm_tnkb`, `wilayah`, `kendaraan`, `biaya_lainnya`, `biaya_jasa`, `total_pajak`, `total`, `hari`, `tanggal`) VALUES
(1, 4, '614984846945716', 'Motor', 'normal', 'Jasa Konsumen Umum', '200000', '', '', '0', '0.25%', '0', '', '', '35000', '35000', '35000', '32000', '32000', NULL, '', 'Motor', '', '', NULL, NULL, NULL, '255000', '235000', '', 'Sabtu', '2019-01-19'),
(2, 4, '187581430491180', 'Mobil', 'normal', 'Jasa Konsumen Umum', '300000', '', '', '0', '0.25%', '0', '', '', '143000 ', '143000', '143000', '100000', '100000', NULL, '', 'Mobil', '', '', NULL, NULL, NULL, '463000', '443000', '', 'Sabtu', '2019-01-19'),
(3, 4, '421093747404453', 'Motor', 'normal', 'Jasa Konsumen Umum', '300000', '', '', '0', '0.25%', '0', '', '', '35000', '35000', '35000', '32000', '32000', NULL, '', 'Motor', '', '', NULL, NULL, NULL, '355000', '335000', '', 'Sabtu', '2019-01-19'),
(4, 1, '429564590640493', 'Motor', 'normal', 'Jasa Agen', '300000', '', '', '0', NULL, '0', '', '', '35000', NULL, NULL, NULL, NULL, NULL, ',,,,', '', '', '', 'Jakarta', ',,,,', ',,,,', '358000', '335000', '', 'Rabu', '2019-01-30'),
(5, 1, '505423317127534', 'Motor', 'Telat lebih dari setahun', 'Distributor', '300000', '2000', '100000', '2', '12', '2', '80', '350000', '35000', '35000', '35000', '32000', '32000', 'ada', 'ada,ada,ada,,', 'Mobil', '100000', '200000', 'Jakarta', 'Mobil Box,Motor,Mobil,,', '45000,275000,45000,,', '25000', '335000', '1611080', 'Rabu', '2019-01-30'),
(6, 1, '729904019634962', 'Motor', 'normal', 'Jasa Agen', '300000', '', '', '0', NULL, '0', '', '', '35000 ', NULL, NULL, NULL, NULL, NULL, ',,,,', '', '', '', 'Jakarta', ',,,,', ',,,,', '358000', '335000', '', 'Rabu', '2019-01-30'),
(7, 1, '571964734395719', 'Motor', 'normal', 'Jasa Konsumen Umum', '230000', '', '', '0', NULL, '0', '', '', '35000', NULL, NULL, NULL, NULL, NULL, ',,,,', '', '', '', 'Jakarta', ',,,,', ',,,,', '290000', '265000', '', 'Rabu', '2019-01-30'),
(8, 1, '387296107168080', 'Motor', 'normal', 'Jasa Konsumen Umum', '250000', '', '', '0', NULL, '0', '', '', '35000', NULL, NULL, NULL, NULL, NULL, ',,,,', '', '', '', 'Jakarta', ',,,,', ',,,,', '25000', '285000', '', 'Rabu', '2019-01-30'),
(9, 1, '728251885664041', 'Motor', 'normal', 'Distributor', '300000', '', '', '0', NULL, '0', '', '', '35000', NULL, NULL, NULL, NULL, NULL, ',,,,', '', '', '', 'Jakarta', ',,,,', ',,,,', '350000', '335000', '', 'Rabu', '2019-01-30'),
(10, 1, '705593735596186', 'Motor', 'normal', 'Jasa Konsumen Umum', '250000', '', '', '0', NULL, '0', '', '', '35000', NULL, NULL, NULL, NULL, NULL, ',,,,', '', '', '', 'Jakarta', ',,,,', ',,,,', '310000', '285000', '', 'Rabu', '2019-01-30'),
(11, 1, '795367989527500', 'Motor', 'Telat lebih dari setahun', 'Jasa Konsumen Umum', '250000', '', '', '0', NULL, '0', '', '', '35000', '', '', '', '', 'ada', 'ada,,,,', 'Motor', '60000', '100000', 'Jakarta', 'Motor,,,,', '35000,,,,', '25000', '285000', '505000', 'Rabu', '2019-01-30'),
(12, 1, '134040204774689', 'Motor', 'normal', 'Jasa Konsumen Umum', '250000', '', '', '0', NULL, '0', '', '', '35000', NULL, NULL, NULL, NULL, NULL, ',,,,', '', '', '', 'Jakarta', ',,,,', ',,,,', '310000', '285000', '', 'Kamis', '2019-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `stnk_balik`
--

CREATE TABLE `stnk_balik` (
  `id_stnkb` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `perhitungan` varchar(200) DEFAULT NULL,
  `no` varchar(20) DEFAULT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `jenis_k` varchar(225) DEFAULT NULL,
  `jenis_kendaraan` varchar(100) DEFAULT NULL,
  `pkb` varchar(225) DEFAULT NULL,
  `pkb1` varchar(100) DEFAULT NULL,
  `bbnk` varchar(100) DEFAULT NULL,
  `swdkllj` varchar(225) DEFAULT NULL,
  `swdkllj1` varchar(225) DEFAULT NULL,
  `sanksi_swdkllj` varchar(225) DEFAULT NULL,
  `sanksi_swdkllj1` varchar(100) DEFAULT NULL,
  `telat_thn` varchar(100) DEFAULT NULL,
  `cek_telat` varchar(100) DEFAULT NULL,
  `jenis_telat` varchar(100) DEFAULT NULL,
  `adm_stnk` varchar(225) DEFAULT NULL,
  `adm_tnkb` varchar(225) DEFAULT NULL,
  `ganti` varchar(100) DEFAULT NULL,
  `sanksi_pkb` varchar(225) DEFAULT NULL,
  `sanksi_pkb1` varchar(100) DEFAULT NULL,
  `jenis_jasa` varchar(100) DEFAULT NULL,
  `biaya_jasa` varchar(100) DEFAULT NULL,
  `total_pajak` varchar(100) DEFAULT NULL,
  `telat` varchar(225) DEFAULT NULL,
  `telat_b_t` varchar(100) DEFAULT NULL,
  `total` varchar(225) DEFAULT NULL,
  `hari` varchar(30) DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stnk_balik`
--

INSERT INTO `stnk_balik` (`id_stnkb`, `id_user`, `perhitungan`, `no`, `jenis`, `jenis_k`, `jenis_kendaraan`, `pkb`, `pkb1`, `bbnk`, `swdkllj`, `swdkllj1`, `sanksi_swdkllj`, `sanksi_swdkllj1`, `telat_thn`, `cek_telat`, `jenis_telat`, `adm_stnk`, `adm_tnkb`, `ganti`, `sanksi_pkb`, `sanksi_pkb1`, `jenis_jasa`, `biaya_jasa`, `total_pajak`, `telat`, `telat_b_t`, `total`, `hari`, `tanggal`) VALUES
(1, 4, 'Motor', '611862637147268', 'Pajak Hidup', NULL, '', '300000', NULL, '201000', '35000', '35000', '32000', '', '0.25%', NULL, '', '100000', '', NULL, '', '', 'Jasa Konsumen Umum', '20000', '601000', '0', NULL, NULL, 'Sabtu', '2019-01-19 00:00:00'),
(2, 4, 'Motor', '242270227478819', 'Pajak Hidup', NULL, '', '435000', NULL, '291450', '35000', '35000', '32000', '', '0.25%', NULL, '', '100000', '', NULL, '', '', 'Jasa Konsumen Umum', '20000', '826450', '0', NULL, NULL, 'Sabtu', '2019-01-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `stnk_hilang`
--

CREATE TABLE `stnk_hilang` (
  `id_stnk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `perhitungan` varchar(200) DEFAULT NULL,
  `no` varchar(20) DEFAULT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `jenis_k` varchar(225) DEFAULT NULL,
  `jenis_k1` varchar(100) DEFAULT NULL,
  `ganti` varchar(100) DEFAULT NULL,
  `pkb` varchar(225) DEFAULT NULL,
  `pkb1` varchar(100) DEFAULT NULL,
  `swdkllj` varchar(225) DEFAULT NULL,
  `swdkllj1` varchar(225) DEFAULT NULL,
  `sanksi_swdkllj` varchar(225) DEFAULT NULL,
  `sanksi_swdkllj1` varchar(100) DEFAULT NULL,
  `adm_stnk` varchar(225) DEFAULT NULL,
  `adm_tnkb` varchar(225) DEFAULT NULL,
  `sanksi_pkb` varchar(225) DEFAULT NULL,
  `sanksi_pkb1` varchar(100) DEFAULT NULL,
  `jenis_jasa` varchar(100) DEFAULT NULL,
  `biaya_jasa` varchar(100) DEFAULT NULL,
  `total_pajak` varchar(100) DEFAULT NULL,
  `telat` varchar(225) DEFAULT NULL,
  `telat1` varchar(100) NOT NULL,
  `telat_t` varchar(100) DEFAULT NULL,
  `telat_b_t` varchar(100) DEFAULT NULL,
  `telat_t2` varchar(100) DEFAULT NULL,
  `k_telat` varchar(100) DEFAULT NULL,
  `total` varchar(225) DEFAULT NULL,
  `hari` varchar(30) DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stnk_hilang`
--

INSERT INTO `stnk_hilang` (`id_stnk`, `id_user`, `perhitungan`, `no`, `jenis`, `jenis_k`, `jenis_k1`, `ganti`, `pkb`, `pkb1`, `swdkllj`, `swdkllj1`, `sanksi_swdkllj`, `sanksi_swdkllj1`, `adm_stnk`, `adm_tnkb`, `sanksi_pkb`, `sanksi_pkb1`, `jenis_jasa`, `biaya_jasa`, `total_pajak`, `telat`, `telat1`, `telat_t`, `telat_b_t`, `telat_t2`, `k_telat`, `total`, `hari`, `tanggal`) VALUES
(1, 4, NULL, '450031357105674', 'Pajak Hidup', 'Mobil', '', NULL, '', '', '143000', '143000', '100000', '', '200000', '', '', '', 'Jasa Konsumen Umum', '20000', '', NULL, '0.02%%', '', NULL, NULL, NULL, '', 'Sabtu', '2019-01-19 00:00:00'),
(2, 4, NULL, '861793240854837', 'Pajak Hidup', 'Mobil', '', NULL, '', '', '143000', '143000', '100000', '', '200000', '', '', '', 'Jasa Mediator/Cabang/Agen', '25000', '', NULL, '0.02%%', '', NULL, NULL, NULL, '', 'Sabtu', '2019-01-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `ulang_password` varchar(225) NOT NULL,
  `hak_akses` enum('cashier','orang_lapangan','super_admin') NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama`, `username`, `email`, `password`, `ulang_password`, `hak_akses`, `created_date`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'super_admin', '2018-12-29 00:00:00'),
(2, 'sony', 'sonysur', 's@yahoo.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'cashier', '2019-01-12 00:46:54'),
(3, 'fahmi', 'fahmi36', 'fauzifahmi55@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'orang_lapangan', '2019-01-12 00:47:20'),
(4, 'kasir', 'kasir1', 'kasir@gmail.com', 'c7911af3adbd12a035b289556d96470a', 'kasir', 'cashier', '2019-01-19 14:47:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balik_nama`
--
ALTER TABLE `balik_nama`
  ADD PRIMARY KEY (`id_balik`);

--
-- Indexes for table `blanko`
--
ALTER TABLE `blanko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catat`);

--
-- Indexes for table `cetak_balik`
--
ALTER TABLE `cetak_balik`
  ADD PRIMARY KEY (`id_cetak`);

--
-- Indexes for table `cetak_berkas`
--
ALTER TABLE `cetak_berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `cetak_mutasi`
--
ALTER TABLE `cetak_mutasi`
  ADD PRIMARY KEY (`id_cetak`);

--
-- Indexes for table `cetak_mutasibn`
--
ALTER TABLE `cetak_mutasibn`
  ADD PRIMARY KEY (`id_cetak`);

--
-- Indexes for table `cetak_perpanjang`
--
ALTER TABLE `cetak_perpanjang`
  ADD PRIMARY KEY (`id_cetak`);

--
-- Indexes for table `cetak_sb`
--
ALTER TABLE `cetak_sb`
  ADD PRIMARY KEY (`id_cetak`);

--
-- Indexes for table `cetak_stnk`
--
ALTER TABLE `cetak_stnk`
  ADD PRIMARY KEY (`id_cetak`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_histori`);

--
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id_mutasi`);

--
-- Indexes for table `mutasi_bn`
--
ALTER TABLE `mutasi_bn`
  ADD PRIMARY KEY (`id_mutasibn`);

--
-- Indexes for table `perpanjang`
--
ALTER TABLE `perpanjang`
  ADD PRIMARY KEY (`id_perpanjang`);

--
-- Indexes for table `stnk_balik`
--
ALTER TABLE `stnk_balik`
  ADD PRIMARY KEY (`id_stnkb`);

--
-- Indexes for table `stnk_hilang`
--
ALTER TABLE `stnk_hilang`
  ADD PRIMARY KEY (`id_stnk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balik_nama`
--
ALTER TABLE `balik_nama`
  MODIFY `id_balik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `blanko`
--
ALTER TABLE `blanko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `cetak_balik`
--
ALTER TABLE `cetak_balik`
  MODIFY `id_cetak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cetak_berkas`
--
ALTER TABLE `cetak_berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cetak_mutasi`
--
ALTER TABLE `cetak_mutasi`
  MODIFY `id_cetak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cetak_mutasibn`
--
ALTER TABLE `cetak_mutasibn`
  MODIFY `id_cetak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cetak_perpanjang`
--
ALTER TABLE `cetak_perpanjang`
  MODIFY `id_cetak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `cetak_sb`
--
ALTER TABLE `cetak_sb`
  MODIFY `id_cetak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cetak_stnk`
--
ALTER TABLE `cetak_stnk`
  MODIFY `id_cetak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id_mutasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mutasi_bn`
--
ALTER TABLE `mutasi_bn`
  MODIFY `id_mutasibn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `perpanjang`
--
ALTER TABLE `perpanjang`
  MODIFY `id_perpanjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `stnk_balik`
--
ALTER TABLE `stnk_balik`
  MODIFY `id_stnkb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stnk_hilang`
--
ALTER TABLE `stnk_hilang`
  MODIFY `id_stnk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
