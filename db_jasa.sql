-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2019 at 11:28 AM
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
  `hari` varchar(30) DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '999', '2019-01-12');

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
  `status` enum('1','0','2') NOT NULL,
  `hari` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `total_pajak` varchar(11) DEFAULT NULL,
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
  `status` enum('1','0','2') NOT NULL,
  `hari` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `status` enum('1','0','2') NOT NULL,
  `hari` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cetak_stnk`
--

CREATE TABLE `cetak_stnk` (
  `id_cetak` int(11) NOT NULL,
  `id_join` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `uang_dp` varchar(20) NOT NULL,
  `bpkb` varchar(200) NOT NULL,
  `sim` varchar(100) NOT NULL,
  `stnk` varchar(100) DEFAULT NULL,
  `wilayah` varchar(100) NOT NULL,
  `nopol` varchar(50) NOT NULL,
  `jenis_kendaraan` varchar(20) NOT NULL,
  `lainnya` text NOT NULL,
  `pajak_ini` varchar(11) NOT NULL,
  `pajak_lalu` varchar(11) DEFAULT NULL,
  `harga_pajak_ini` varchar(9) NOT NULL,
  `harga_pajak_lalu` varchar(10) NOT NULL,
  `total_pajak` varchar(11) NOT NULL,
  `biaya_ps` varchar(100) NOT NULL,
  `adm_skp` varchar(50) NOT NULL,
  `slp` varchar(50) NOT NULL,
  `plat` varchar(50) NOT NULL,
  `balik_nama` varchar(50) NOT NULL,
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
  `total_proses` varchar(20) NOT NULL,
  `biaya_prediksi` varchar(20) NOT NULL,
  `biaya_kurang` varchar(20) NOT NULL,
  `hari` varchar(100) DEFAULT NULL,
  `status` enum('1','0','2') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `telat` varchar(225) DEFAULT NULL,
  `telat_tahun` varchar(100) DEFAULT NULL,
  `total` varchar(225) DEFAULT NULL,
  `hari` varchar(30) DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `telat` varchar(225) DEFAULT NULL,
  `telat_thn` varchar(100) DEFAULT NULL,
  `telat_thn1` varchar(100) DEFAULT NULL,
  `total` varchar(225) DEFAULT NULL,
  `hari` varchar(30) DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perpanjang`
--

CREATE TABLE `perpanjang` (
  `id_perpanjang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no` varchar(20) NOT NULL,
  `perhitungan` varchar(200) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `pkb` varchar(9) NOT NULL,
  `pkb_bulan` varchar(100) NOT NULL,
  `pkb_tahun` varchar(100) NOT NULL,
  `telat` varchar(10) NOT NULL,
  `telat_tahun` varchar(9) NOT NULL,
  `telat_bulan` varchar(100) DEFAULT NULL,
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
  `telat` varchar(225) DEFAULT NULL,
  `telat_b_t` varchar(100) DEFAULT NULL,
  `total` varchar(225) DEFAULT NULL,
  `hari` varchar(30) DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `cetak_mutasi`
--
ALTER TABLE `cetak_mutasi`
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
-- AUTO_INCREMENT for table `cetak_mutasi`
--
ALTER TABLE `cetak_mutasi`
  MODIFY `id_cetak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cetak_perpanjang`
--
ALTER TABLE `cetak_perpanjang`
  MODIFY `id_cetak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cetak_sb`
--
ALTER TABLE `cetak_sb`
  MODIFY `id_cetak` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cetak_stnk`
--
ALTER TABLE `cetak_stnk`
  MODIFY `id_cetak` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id_mutasibn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `perpanjang`
--
ALTER TABLE `perpanjang`
  MODIFY `id_perpanjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `stnk_balik`
--
ALTER TABLE `stnk_balik`
  MODIFY `id_stnkb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `stnk_hilang`
--
ALTER TABLE `stnk_hilang`
  MODIFY `id_stnk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
