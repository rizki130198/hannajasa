-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2019 at 09:27 AM
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
  `no` int(11) DEFAULT NULL,
  `jenis` int(11) DEFAULT NULL,
  `jenis_k` varchar(225) DEFAULT NULL,
  `pkb` varchar(225) DEFAULT NULL,
  `bbnk` varchar(225) DEFAULT NULL,
  `adm_stnk` varchar(225) DEFAULT NULL,
  `ganti` varchar(225) DEFAULT NULL,
  `adm_tnkb` varchar(225) DEFAULT NULL,
  `telat` varchar(225) DEFAULT NULL,
  `sanksi_pkb` varchar(225) DEFAULT NULL,
  `swdkllj` varchar(225) DEFAULT NULL,
  `sanksi_swdkllj` varchar(225) DEFAULT NULL,
  `hari` varchar(30) DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balik_nama`
--

INSERT INTO `balik_nama` (`id_balik`, `id_user`, `no`, `jenis`, `jenis_k`, `pkb`, `bbnk`, `adm_stnk`, `ganti`, `adm_tnkb`, `telat`, `sanksi_pkb`, `swdkllj`, `sanksi_swdkllj`, `hari`, `tanggal`) VALUES
(1, 1, 2147483647, 0, 'orang lapangan', '1', NULL, '1', NULL, NULL, '', NULL, '', '', 'Senin', '2019-01-07 00:00:00'),
(2, 1, 2147483647, 0, 'orang lapangan', '1', 'Rp. 67', '12', NULL, '100.000', '', '', '', '', 'Senin', '2019-01-07 00:00:00'),
(3, 1, 2147483647, 0, '', '12', '0', '12', NULL, '100.000', '', '0', '0', '0', 'Senin', '2019-01-07 00:00:00'),
(4, 1, 2147483647, 0, 'orang lapangan', '1', '0', '1', NULL, '100.000', '', '0', '0', '0', 'Senin', '2019-01-07 00:00:00');

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
(1, '1001', '2019-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id_catat` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` enum('Motor','Mobil','Mobil Box') NOT NULL,
  `jenis_harga` enum('swdkllj','stnk','tnkb','sanksi') NOT NULL,
  `harga` varchar(100) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id_catat`, `nama`, `jenis`, `jenis_harga`, `harga`, `created_at`) VALUES
(1, 'SWDKLLJ Motor', 'Motor', 'swdkllj', '35000', '2018-12-29'),
(2, 'SWDKLLJ Mobil', 'Mobil', 'swdkllj', '143000', '2018-12-29'),
(3, 'SWDKLLJ Mobil Box', 'Mobil Box', 'swdkllj', '73000', '2018-12-29'),
(4, 'Adm STNK Motor', 'Motor', 'stnk', '100000', '2018-12-29'),
(5, 'Adm STNK Mobil', 'Mobil', 'stnk', '200000', '2018-12-29'),
(6, 'Adm TNKB Motor', 'Motor', 'tnkb', '60000', '2018-12-29'),
(7, 'Adm TNKB Mobil', 'Mobil', 'tnkb', '100000', '2018-12-29'),
(8, 'Adm TNKB Mobil Box', 'Mobil Box', 'tnkb', '72000', '2018-12-29'),
(9, 'Sanksi SWDKLLJ Motor', 'Motor', 'sanksi', '32000', '2018-12-29'),
(10, 'Sanksi SWDKLLJ Mobil', 'Mobil', 'sanksi', '100000', '2019-01-02');

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
  `total_pajak` varchar(11) DEFAULT NULL,
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
  `status` enum('0','1') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cetak_balik`
--

INSERT INTO `cetak_balik` (`id_cetak`, `id_join`, `id_user`, `penerima`, `no_telp`, `atas_nama`, `uang_dp`, `bpkb`, `sim`, `wilayah`, `nopol`, `jenis_kendaraan`, `tahun_pajak`, `lainnya`, `pengurusan`, `pajak_ini`, `pajak_lalu`, `harga_pajak_ini`, `harga_pajak_lalu`, `total_pajak`, `proses_bn`, `adm_skp`, `plat`, `surat_lp`, `p_lainnya`, `proses_lain`, `harga_bn`, `harga_adm`, `harga_plat`, `harga_lp`, `h_lainnya`, `harga_lainnya`, `total_proses`, `biaya_prediksi`, `biaya_kurang`, `status`, `tanggal`) VALUES
(1, 3, 1, '121', '1', '1', '1', ',ada,', ',on', NULL, NULL, 'motor', '', '', ',', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '0', '2019-01-07'),
(2, 4, 1, '1', '1', '1', '1', 'ada,', ',fotocopy', '12', '11212XYZ', 'mobil', '1', '1', ',penyesuaian alamat', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '0', '2019-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `cetak_berkas`
--

CREATE TABLE `cetak_berkas` (
  `id_berkas` int(11) NOT NULL,
  `id_uri` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pemilik` varchar(100) DEFAULT NULL,
  `nopol` varchar(100) DEFAULT NULL,
  `faktur` varchar(100) DEFAULT NULL,
  `biaya` varchar(100) DEFAULT NULL,
  `tgl_bpkb` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cetak_berkas`
--

INSERT INTO `cetak_berkas` (`id_berkas`, `id_uri`, `id_user`, `nama_pemilik`, `nopol`, `faktur`, `biaya`, `tgl_bpkb`, `created_at`) VALUES
(1, 1, 1, '12', '12121', ',tidak ada', '1000', '0000-00-00', '2019-01-07');

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
  `total_pajak` varchar(11) DEFAULT NULL,
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
  `status` enum('1','0') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cetak_perpanjang`
--

INSERT INTO `cetak_perpanjang` (`id_cetak`, `id_join`, `id_user`, `penerima`, `no_telp`, `atas_nama`, `uang_dp`, `bpkb`, `sim`, `wilayah`, `nopol`, `jenis_kendaraan`, `tahun_pajak`, `lainnya`, `pajak_ini`, `pajak_lalu`, `harga_pajak_ini`, `harga_pajak_lalu`, `total_pajak`, `biaya_jasa`, `acc_bpkb`, `plat`, `adm_skp`, `progresif`, `proses_lain`, `harga_jasa`, `harga_bpkb`, `harga_plat`, `harga_adm`, `harga_blokir`, `harga_lainnya`, `total_proses`, `biaya_prediksi`, `biaya_kurang`, `status`, `tanggal`) VALUES
(1, 3, 1, '12', '1', '12', '12', ',,Foto Copy,,,', ',Tidak Ada/Acc', '12121', '12121', 'motor', '121', '121', NULL, NULL, '', '', '12', 'ada', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '', NULL, '', '', '', '1', '2019-01-07');

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
-- Table structure for table `perpanjang`
--

CREATE TABLE `perpanjang` (
  `id_perpanjang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no` varchar(9) NOT NULL,
  `perhitungan` varchar(200) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `pkb` varchar(9) NOT NULL,
  `pkb_bulan` varchar(100) NOT NULL,
  `pkb_tahun` varchar(100) NOT NULL,
  `telat` varchar(10) NOT NULL,
  `telat_tahun` varchar(9) NOT NULL,
  `sanksi_pkb` varchar(9) DEFAULT NULL,
  `sanksi_pkb_t` varchar(9) DEFAULT NULL,
  `swdkllj` varchar(9) DEFAULT NULL,
  `swdkllj_bulan` varchar(100) NOT NULL,
  `swdkllj_tahun` varchar(100) NOT NULL,
  `sanksi_swdkllj` varchar(9) DEFAULT NULL,
  `sanksi_swdkllj_t` varchar(9) DEFAULT NULL,
  `ganti_plat` varchar(9) DEFAULT NULL,
  `jenis_k` varchar(100) NOT NULL,
  `adm_stnk` varchar(20) NOT NULL,
  `adm_tnkb` varchar(20) NOT NULL,
  `total` varchar(9) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perpanjang`
--

INSERT INTO `perpanjang` (`id_perpanjang`, `id_user`, `no`, `perhitungan`, `jenis`, `pkb`, `pkb_bulan`, `pkb_tahun`, `telat`, `telat_tahun`, `sanksi_pkb`, `sanksi_pkb_t`, `swdkllj`, `swdkllj_bulan`, `swdkllj_tahun`, `sanksi_swdkllj`, `sanksi_swdkllj_t`, `ganti_plat`, `jenis_k`, `adm_stnk`, `adm_tnkb`, `total`, `hari`, `tanggal`) VALUES
(1, 1, '127207203', 'Mobil Box', 'normal', '1', '', '', '', '', '', '', '73000', '73000', '73000', '', '', NULL, '', '', '', 'Rp. 73001', 'Kamis', '2019-01-03'),
(2, 1, '354818745', 'Mobil Box', 'telat bulanan', '', '1', '', '1', '', 'Rp. 2', '', '73000', '73000', '73000', '112', '', NULL, '', '', '', '', 'Kamis', '2019-01-03'),
(3, 1, '125504422', 'Motor', 'normal', '11', '', '', '', '', '', '', '35000', '35000', '35000', '32000', '32000', NULL, '', '', '', '0', 'Senin', '2019-01-07');

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
(1, 'admin', 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'super_admin', '2018-12-29 00:00:00');

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
-- Indexes for table `cetak_perpanjang`
--
ALTER TABLE `cetak_perpanjang`
  ADD PRIMARY KEY (`id_cetak`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_histori`);

--
-- Indexes for table `perpanjang`
--
ALTER TABLE `perpanjang`
  ADD PRIMARY KEY (`id_perpanjang`);

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
  MODIFY `id_balik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `blanko`
--
ALTER TABLE `blanko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `cetak_balik`
--
ALTER TABLE `cetak_balik`
  MODIFY `id_cetak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cetak_berkas`
--
ALTER TABLE `cetak_berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cetak_perpanjang`
--
ALTER TABLE `cetak_perpanjang`
  MODIFY `id_cetak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perpanjang`
--
ALTER TABLE `perpanjang`
  MODIFY `id_perpanjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;