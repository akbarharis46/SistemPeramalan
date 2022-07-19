-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 10:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2111_sinauka-haris-forecast`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahanbaku`
--

CREATE TABLE `bahanbaku` (
  `id_bahanbaku` int(50) NOT NULL,
  `nama_bahanbaku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahanbaku`
--

INSERT INTO `bahanbaku` (`id_bahanbaku`, `nama_bahanbaku`) VALUES
(30, 'Botol'),
(31, 'Tutup Botol Abu-Abu'),
(32, 'Cover Cap Ungu'),
(33, 'Seal'),
(34, 'Stiker'),
(35, 'Kardus'),
(36, 'Plastik'),
(37, 'Lakban'),
(44, 'awasxxxxx'),
(46, 'xxxxxxxxxxxxxxxxxxxxxxxxxx'),
(47, 'zzzz2'),
(48, 'zz3');

-- --------------------------------------------------------

--
-- Table structure for table `detail_hasilproduksi`
--

CREATE TABLE `detail_hasilproduksi` (
  `id_detailhasilproduksi` int(255) NOT NULL,
  `id_hasilproduksi` int(255) NOT NULL,
  `tanggal_stockproduksi` date NOT NULL,
  `stock_produksi` int(255) NOT NULL,
  `produksi_reject` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_hasilproduksi`
--

INSERT INTO `detail_hasilproduksi` (`id_detailhasilproduksi`, `id_hasilproduksi`, `tanggal_stockproduksi`, `stock_produksi`, `produksi_reject`) VALUES
(9, 99, '2022-02-27', 6105, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengiriman`
--

CREATE TABLE `detail_pengiriman` (
  `id_detailpengiriman` int(11) NOT NULL,
  `id_pengiriman` int(50) NOT NULL,
  `id_driver` int(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `jeniskendaraan` varchar(255) NOT NULL,
  `tujuan_pengiriman` varchar(255) NOT NULL,
  `no_kendaraan` varchar(255) NOT NULL,
  `status` enum('Proses Pengiriman','Sudah Terkirim') NOT NULL,
  `jumlah_pengiriman` int(255) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `bukti_surat` varchar(50) NOT NULL,
  `tanggal_diterima` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pengiriman`
--

INSERT INTO `detail_pengiriman` (`id_detailpengiriman`, `id_pengiriman`, `id_driver`, `no_hp`, `jeniskendaraan`, `tujuan_pengiriman`, `no_kendaraan`, `status`, `jumlah_pengiriman`, `tanggal_masuk`, `bukti_surat`, `tanggal_diterima`) VALUES
(81, 109, 3, '0256123', 'Pickup', 'Malang', 'P2032XM', 'Sudah Terkirim', 23, '2021-07-15', '1626267752.jpg', '2021-07-15'),
(82, 114, 3, '0256123', 'Pickup', 'Malang', 'P2032XM', 'Sudah Terkirim', 1000, '2021-07-22', '1626854251.png', '2021-07-22'),
(83, 115, 4, '0256123', 'Pickup', 'Malang', 'P2032XM', 'Sudah Terkirim', 2000, '2021-07-22', '', '2021-07-23'),
(84, 116, 3, '0256123', 'Pickup', 'Malang', 'P2032XM', 'Sudah Terkirim', 23, '2021-07-22', '1626857022.png', '2021-07-24');

-- --------------------------------------------------------

--
-- Table structure for table `detail_suplai`
--

CREATE TABLE `detail_suplai` (
  `id_detailsuplai` int(50) NOT NULL,
  `tanggal_stockgudang` date NOT NULL,
  `id_bahanbaku` int(50) NOT NULL,
  `stock_pabrik` int(255) NOT NULL,
  `barang_pakai` int(50) NOT NULL,
  `data_stockrejetgudang` int(50) NOT NULL,
  `data_stockrejetproduksi` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_suplai`
--

INSERT INTO `detail_suplai` (`id_detailsuplai`, `tanggal_stockgudang`, `id_bahanbaku`, `stock_pabrik`, `barang_pakai`, `data_stockrejetgudang`, `data_stockrejetproduksi`) VALUES
(23, '2021-07-23', 30, 31663, 0, 0, 0),
(38, '2021-07-21', 34, 15559, 0, 0, 0),
(40, '2021-07-21', 31, 5475, 0, 0, 0),
(41, '2021-07-21', 37, 2630, 0, 0, 0),
(43, '2021-07-21', 33, 7550, 0, 0, 0),
(45, '2021-07-21', 47, 20000, 0, 1, 0),
(46, '2021-07-21', 48, 1000, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_suplaimasuk`
--

CREATE TABLE `detail_suplaimasuk` (
  `id_detailsuplaimasuk` int(11) NOT NULL,
  `id_driver` int(50) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `shift` varchar(50) NOT NULL,
  `id_bahanbaku` int(50) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `barang_rejectgudang` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_suplaimasuk`
--

INSERT INTO `detail_suplaimasuk` (`id_detailsuplaimasuk`, `id_driver`, `vendor`, `shift`, `id_bahanbaku`, `tanggal`, `total`, `barang_rejectgudang`) VALUES
(117, 2, 'PT xxx', 'shift1', 30, '2021-07-22', 100, 0),
(118, 3, 'PT xxx', 'shift2', 30, '2021-07-23', 1000, 0),
(119, 3, 'PT xxx', 'shift2', 30, '2021-07-23', 10000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi_produksi`
--

CREATE TABLE `detail_transaksi_produksi` (
  `id_detail_transaksiproduksi` int(50) NOT NULL,
  `id_transaksiproduksi` int(11) NOT NULL,
  `id_detailsuplai` int(50) NOT NULL,
  `jumlah_pengurangan` int(50) NOT NULL,
  `barang_rejectproduksi` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi_produksi`
--

INSERT INTO `detail_transaksi_produksi` (`id_detail_transaksiproduksi`, `id_transaksiproduksi`, `id_detailsuplai`, `jumlah_pengurangan`, `barang_rejectproduksi`) VALUES
(100, 60, 23, 1000, 20),
(101, 60, 38, 1000, 20);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id_driver` int(50) NOT NULL,
  `nama_staff` varchar(50) NOT NULL,
  `shift` varchar(50) NOT NULL,
  `nohp` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id_driver`, `nama_staff`, `shift`, `nohp`) VALUES
(2, 'Haris Akbar', 'shift1', 2147483647),
(3, 'Driver 1', 'shift1', 112333),
(4, 'Driver 2', 'shift1', 12231220),
(5, 'Driver 3', 'shift1', 11111);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_produksi`
--

CREATE TABLE `hasil_produksi` (
  `id_hasilproduksi` int(255) NOT NULL,
  `id` int(50) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `jumlah_produksi` int(255) NOT NULL,
  `produksi_gagal` int(50) NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_produksi`
--

INSERT INTO `hasil_produksi` (`id_hasilproduksi`, `id`, `shift`, `jumlah_produksi`, `produksi_gagal`, `tanggal`) VALUES
(129, 41, 'shift1', 133, 0, '2022-01-01'),
(130, 41, 'shift1', 133, 0, '2022-01-02'),
(131, 41, 'shift1', 55, 0, '2022-02-01'),
(132, 41, 'shift1', 55, 0, '2022-02-02'),
(133, 41, 'shift1', 75, 0, '2022-03-01'),
(134, 41, 'shift1', 75, 0, '2022-03-02'),
(135, 41, 'shift1', 117, 0, '2022-04-01'),
(136, 41, 'shift1', 117, 0, '2022-04-02'),
(137, 41, 'shift1', 177, 0, '2022-05-01'),
(138, 41, 'shift1', 177, 0, '2022-05-02'),
(139, 41, 'shift1', 111, 0, '2022-06-01'),
(140, 41, 'shift1', 111, 0, '2022-06-02'),
(141, 41, 'shift1', 80, 0, '2022-07-01'),
(142, 41, 'shift1', 80, 0, '2022-07-02'),
(143, 41, 'shift1', 100, 0, '2022-08-01'),
(144, 41, 'shift1', 100, 0, '2022-08-02'),
(145, 41, 'shift1', 150, 0, '2022-09-01'),
(146, 41, 'shift1', 150, 0, '2022-09-02'),
(147, 41, 'shift1', 122, 0, '2022-10-01'),
(148, 41, 'shift1', 122, 0, '2022-10-02'),
(149, 41, 'shift1', 75, 0, '2022-11-01'),
(150, 41, 'shift1', 75, 0, '2022-11-02'),
(151, 41, 'shift1', 85, 0, '2022-12-01'),
(152, 41, 'shift1', 85, 0, '2022-12-02'),
(153, 41, 'shift1', 100, 0, '2023-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `dibuat_pada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `read_status` enum('delivery','seen') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `receiver`, `nama`, `notes`, `url`, `dibuat_pada`, `read_status`) VALUES
(1, 'admin', 'Produksi Baru', 'Pengolahan dibagian produksi', '', '2021-06-05 07:45:26', 'seen'),
(2, 'admin', 'Tambah Produksi Baru', 'Telah dibuat produksi baru dengan total 25', 'http://localhost/ta-inventory-hav/produksiclient', '2021-06-05 09:35:27', 'seen'),
(3, 'admin', 'Tambah Produksi Baru', 'Telah dibuat produksi baru dengan total 12', 'http://localhost/ta-inventory-hav-v1.1.0/produksiclient', '2021-06-05 10:02:17', 'seen'),
(4, 'admin', 'Tambah Produksi Baru', 'Telah dibuat produksi baru dengan total asd', 'http://localhost/ta-inventory-hav-v1.1.0/produksiclient', '2021-06-05 10:02:17', 'seen'),
(5, 'admin', 'Tambah Produksi Baru', 'Telah dibuat produksi baru dengan total 12', 'http://localhost/ta-inventory-hav-v1.1.0/produksiclient', '2021-06-06 07:20:57', 'seen'),
(6, 'admin', 'Tambah Produksi Baru', 'Telah dibuat produksi baru dengan total 10', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-06 07:20:57', 'seen'),
(7, 'admin', 'Tambah Produksi Baru', 'Telah dibuat produksi baru dengan total 100', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-06 07:20:57', 'seen'),
(8, 'admin', 'Tambah Barang Baru', 'Telah dibuat produksi baru dengan total 20', 'http://localhost:8080/dummyTAnew/BarangClient', '2021-06-06 07:20:57', 'seen'),
(9, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Botol baru dengan total 20', 'http://localhost:8080/dummyTAnew/BarangClient', '2021-06-06 07:20:57', 'seen'),
(10, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Kardus baru dengan total 10', 'http://localhost:8080/dummyTAnew/BarangClient', '2021-06-06 07:20:57', 'seen'),
(11, 'admin', 'Tambah Barang Baru', 'Telah dibuat  A baru dengan total 1', 'http://localhost:8080/dummyTAnew/BarangClient', '2021-06-06 17:47:58', 'seen'),
(12, 'admin', 'Tambah Barang Baru', 'Telah dibuat  T baru dengan total 2', 'http://localhost:8080/dummyTAnew/ProduksiClient', '2021-06-06 17:47:58', 'seen'),
(13, 'admin', 'Tambah Barang Baru', 'Telah dibuat  H baru dengan total 1', 'http://localhost:8080/dummyTAnew/ProduksiClient', '2021-06-06 17:47:58', 'seen'),
(14, 'admin', 'Tambah Produksi Baru', 'Telah dibuat produksi baru dengan total 100', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-06 17:47:58', 'seen'),
(15, 'admin', 'Tambah Produksi Baru', 'Telah data produksi baru dengan total produksi ', 'http://localhost:8080/dummyTAnew/ProduksiClient', '2021-06-06 17:47:58', 'seen'),
(16, 'admin', 'Tambah Produksi Baru', 'Telah data produksi baru dengan total produksi ', 'http://localhost:8080/dummyTAnew/ProduksiClient', '2021-06-06 17:47:58', 'seen'),
(17, 'admin', 'Tambah Produksi Baru', 'Telah data produksi baru dengan total produksi ', 'http://localhost:8080/dummyTAnew/ProduksiClient', '2021-06-06 17:47:58', 'seen'),
(18, 'admin', 'Tambah Barang Baru', 'Telah dibuat  H baru dengan total s', 'http://localhost:8080/dummyTAnew/ProduksiClient', '2021-06-06 17:47:58', 'seen'),
(19, 'admin', 'Tambah Produksi Baru', 'Telah dibuat  1 baru dengan total z', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-06 17:47:58', 'seen'),
(20, 'admin', 'Tambah Produksi Baru', 'Telah dibuat  1 baru dengan total xxxx', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-06 17:47:58', 'seen'),
(21, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Kardus baru dengan total 1', 'http://localhost:8080/dummyTAnew/BarangClient', '2021-06-06 17:47:58', 'seen'),
(22, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Botol baru dengan total 1', 'http://localhost:8080/dummyTAnew/BarangClient', '2021-06-06 17:47:58', 'seen'),
(23, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Produksi   baru dengan total ', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-06 17:57:05', 'seen'),
(24, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  1Oleh Staff Haris123124Shift shift1', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-06 17:57:05', 'seen'),
(25, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  10Oleh Staff HarisShift shift1', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-07 17:03:38', 'seen'),
(26, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver Akbar HarisDengan Nomor Kendaraan N9023AAB', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-07 17:03:38', 'seen'),
(27, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver awDengan Nomor Kendaraan P2032XM', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-07 17:03:38', 'seen'),
(28, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver HarisDengan Nomor Kendaraan N99293NA', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-07 17:03:38', 'seen'),
(29, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver AkbarDengan Nomor Kendaraan P929NX', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-07 17:03:38', 'seen'),
(30, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver MantapDengan Nomor Kendaraan zxczxczxc', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-07 17:03:38', 'seen'),
(31, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver Haris dengan Nomor Kendaraan N99293NAProses PengirimanSudah Terkirim', 'http://localhost:8080/dummyTAnew/DetailClient', '2021-06-07 17:03:38', 'seen'),
(32, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  100Oleh Staff Staff Soleh shift1', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-09 17:16:00', 'seen'),
(33, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Botol baru dengan total 10', 'http://localhost:8080/dummyTAnew/BarangClient', '2021-06-09 17:16:00', 'seen'),
(34, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Kardus baru dengan total 10', 'http://localhost:8080/dummyTAnew/BarangClient', '2021-06-09 17:16:00', 'seen'),
(35, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Tutup Botol baru dengan total 10', 'http://localhost:8080/dummyTAnew/BarangClient', '2021-06-09 17:16:00', 'seen'),
(36, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver Driver AyasDengan Nomor Kendaraan N999XP', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-09 17:16:00', 'seen'),
(37, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver Driver Ayas dengan Nomor Kendaraan N999XPProses PengirimanSudah Terkirim', 'http://localhost:8080/dummyTAnew/DetailClient', '2021-06-09 17:16:00', 'seen'),
(38, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  1000Oleh Staff Haris shift2', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-09 17:16:00', 'seen'),
(39, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  100Oleh Staff Akbar Haris N shift2', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-09 17:16:00', 'seen'),
(40, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  100Oleh Staff Avdio shift1', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-09 17:16:00', 'seen'),
(41, 'admin', 'Tambah Barang Baru', 'Telah dibuat  isolasi besar baru dengan total 20', 'http://localhost:8080/dummyTAnew/BarangClient', '2021-06-09 17:16:00', 'seen'),
(42, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Isolasi besar baru dengan total 1000', 'http://localhost:8080/dummyTAnew/BarangClient', '2021-06-09 17:16:00', 'seen'),
(43, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Tutup Botol baru dengan total 500', 'http://localhost:8080/dummyTAnew/BarangClient', '2021-06-09 17:16:00', 'seen'),
(44, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Isolasi besar baru dengan total 200', 'http://localhost:8080/dummyTAnew/BarangClient', '2021-06-09 17:16:00', 'seen'),
(45, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver HarisDengan Nomor Kendaraan P2032XM', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-09 17:16:00', 'seen'),
(46, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver Haris dengan Nomor Kendaraan P2032XMProses PengirimanSudah Terkirim', 'http://localhost:8080/dummyTAnew/DetailClient', '2021-06-09 17:16:00', 'seen'),
(47, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver dhioDengan Nomor Kendaraan P2032XM', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-09 17:16:00', 'seen'),
(48, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver dhio dengan Nomor Kendaraan P2032XMProses PengirimanSudah Terkirim', 'http://localhost:8080/dummyTAnew/DetailClient', '2021-06-09 17:16:00', 'seen'),
(49, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  100Oleh Staff Manysur shift2', 'http://localhost:8080/dummyTAnew/produksiclient', '2021-06-09 17:16:00', 'seen'),
(50, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Botol baru dengan total 100', 'http://localhost:8080/dummyTAnew/BarangClient', '2021-06-09 17:17:35', 'seen'),
(51, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Kardus baru dengan total 100', 'http://localhost:8080/dummyTAnew/BarangClient', '2021-06-09 17:17:35', 'seen'),
(52, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Kardus baru dengan total 300', 'http://localhost:8080/dummyTAnew/BarangClient', '2021-06-09 17:25:47', 'seen'),
(53, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Botol baru dengan total 100', 'http://localhost:8080/dummyTAnew/BarangClient', '2021-06-25 06:21:56', 'seen'),
(54, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Kardus baru dengan total 100', 'http://localhost:8080/dummyTAnew/BarangClient', '2021-06-25 06:21:56', 'seen'),
(55, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  100Oleh Staff Haris shift1', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-25 06:21:56', 'seen'),
(56, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  100Oleh Staff zaman shift1', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-25 06:21:56', 'seen'),
(57, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  SurabayaNama Driver Roy dengan Nomor Kendaraan L98128NProses PengirimanSudah Terkirim', 'http://localhost:8080/FinalTA/DetailClient', '2021-06-25 06:21:56', 'seen'),
(58, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver xxxxDengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-25 06:21:56', 'seen'),
(59, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver xxxx dengan Nomor Kendaraan P2032XMProses PengirimanProses Pengiriman', 'http://localhost:8080/FinalTA/DetailClient', '2021-06-25 06:21:56', 'seen'),
(60, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver xxxDengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-25 06:21:56', 'seen'),
(61, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  100Oleh Staff Haris shift1', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-25 06:21:56', 'seen'),
(62, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Kardus baru dengan total 110', 'http://localhost:8080/FinalTA/BarangClient', '2021-06-25 06:21:56', 'seen'),
(63, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  100Oleh Staff Haris2e12ewr shift1', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-25 06:21:56', 'seen'),
(64, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  100Oleh Staff Haris shift1', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-25 06:21:56', 'seen'),
(65, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  100Oleh Staff Rifaldi shift1', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-25 06:21:56', 'seen'),
(66, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  75Oleh Staff Dwi shift1', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-25 06:21:56', 'seen'),
(67, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  100Oleh Staff Lukman shift1', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-25 06:21:56', 'seen'),
(68, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  100Oleh Staff Bocil shift1', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-25 06:21:56', 'seen'),
(69, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Kardus baru dengan total 100', 'http://localhost:8080/FinalTA/BarangClient', '2021-06-25 06:21:56', 'seen'),
(70, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Isolasi baru dengan total 10', 'http://localhost:8080/FinalTA/BarangClient', '2021-06-25 06:21:56', 'seen'),
(71, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  100Oleh Staff Azmat shift1', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-25 06:21:56', 'seen'),
(72, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver LALADengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-27 03:54:52', 'seen'),
(73, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver HarisDengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-27 03:54:52', 'seen'),
(74, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver HarisDengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-27 03:54:52', 'seen'),
(75, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver Haris dengan Nomor Kendaraan P2032XMProses PengirimanSudah Terkirim', 'http://localhost:8080/FinalTA/DetailClient', '2021-06-27 03:54:52', 'seen'),
(76, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  100Oleh Staff zaman12344 shift3', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-27 03:54:52', 'seen'),
(77, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  100Oleh Staff Testing1 shift1', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-27 04:26:47', 'seen'),
(78, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Botol baru dengan total 100', 'http://localhost:8080/FinalTA/BarangClient', '2021-06-27 04:26:47', 'seen'),
(79, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver Testing Staff PengirimanDengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-27 11:21:21', 'seen'),
(80, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver Testing Staff Pengiriman dengan Nomor Kendaraan P2032XMProses PengirimanProses Pengiriman', 'http://localhost:8080/FinalTA/DetailClient', '2021-06-27 11:21:21', 'seen'),
(81, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver Testing Staff Pengiriman dengan Nomor Kendaraan P2032XMProses PengirimanProses Pengiriman', 'http://localhost:8080/FinalTA/DetailClient', '2021-06-27 11:21:21', 'seen'),
(82, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver Testing Staff PengirimanDengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-27 11:21:21', 'seen'),
(83, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver Testing Staff Pengiriman dengan Nomor Kendaraan P2032XMProses PengirimanProses Pengiriman', 'http://localhost:8080/FinalTA/DetailClient', '2021-06-27 11:21:21', 'seen'),
(84, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver AkbarDengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-30 05:57:06', 'seen'),
(85, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver AkbarDengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-30 05:57:06', 'seen'),
(86, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver HarisDengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-30 05:57:06', 'seen'),
(87, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver Haris dengan Nomor Kendaraan P2032XMProses PengirimanSudah Terkirim', 'http://localhost:8080/FinalTA/DetailClient', '2021-06-30 05:57:06', 'seen'),
(88, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver HarisDengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-30 05:57:06', 'seen'),
(89, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver Haris dengan Nomor Kendaraan P2032XMProses PengirimanSudah Terkirim', 'http://localhost:8080/FinalTA/DetailClient', '2021-06-30 05:57:06', 'seen'),
(90, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  100Oleh Staff Staff Produksi shift1', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-30 05:57:06', 'seen'),
(91, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Test Gudangg baru dengan total 5000', 'http://localhost:8080/FinalTA/BarangClient', '2021-06-30 05:57:06', 'seen'),
(92, 'admin', 'Tambah Barang Baru', 'Telah dibuat  Test Gudangg baru dengan total 5000', 'http://localhost:8080/FinalTA/BarangClient', '2021-06-30 05:57:06', 'seen'),
(93, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver Testing Staff PengirimanDengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-30 05:57:06', 'seen'),
(94, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver AkbarDengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-30 05:57:06', 'seen'),
(95, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver Testing Staff Pengiriman dengan Nomor Kendaraan P2032XMProses PengirimanSudah Terkirim', 'http://localhost:8080/FinalTA/DetailClient', '2021-06-30 05:57:06', 'seen'),
(96, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver Akbarxxxx dengan Nomor Kendaraan P2032XMProses PengirimanSudah Terkirim', 'http://localhost:8080/FinalTA/DetailClient', '2021-06-30 05:57:06', 'seen'),
(97, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver x1Dengan Nomor Kendaraan x1', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-30 05:57:06', 'seen'),
(98, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver x2Dengan Nomor Kendaraan x2', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-30 05:57:06', 'seen'),
(99, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver x3Dengan Nomor Kendaraan x3', 'http://localhost:8080/FinalTA/produksiclient', '2021-06-30 05:57:06', 'seen'),
(100, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  x1Nama Driver x1 dengan Nomor Kendaraan x1Proses PengirimanSudah Terkirim', 'http://localhost:8080/FinalTA/DetailClient', '2021-06-30 05:57:06', 'seen'),
(101, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  x2Nama Driver x2 dengan Nomor Kendaraan x2Proses PengirimanSudah Terkirim', 'http://localhost:8080/FinalTA/DetailClient', '2021-06-30 05:57:06', 'seen'),
(102, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  x3Nama Driver x3 dengan Nomor Kendaraan x3Proses PengirimanProses Pengiriman', 'http://localhost:8080/FinalTA/DetailClient', '2021-06-30 05:57:06', 'seen'),
(103, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  x3Nama Driver x3 dengan Nomor Kendaraan x3Proses PengirimanSudah Terkirim', 'http://localhost:8080/FinalTA/DetailClient', '2021-06-30 05:57:06', 'seen'),
(104, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Nama Driver HarisxxxDengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTA/produksiclient', '2021-07-11 05:56:55', 'seen'),
(105, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver xxxxxxxxxxxxDengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTA/produksiclient', '2021-07-11 05:56:55', 'seen'),
(106, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver Harisxxx dengan Nomor Kendaraan P2032XMProses PengirimanProses Pengiriman', 'http://localhost:8080/FinalTA/DetailClient', '2021-07-11 05:56:55', 'seen'),
(107, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver xxxxxxxxxxxx dengan Nomor Kendaraan P2032XMProses PengirimanSudah Terkirim', 'http://localhost:8080/FinalTA/DetailClient', '2021-07-11 05:56:55', 'seen'),
(108, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Malang Nama Driver 3Dengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTArev/produksiclient', '2021-07-11 05:56:55', 'seen'),
(109, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Malang Nama Driver 4Dengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTArev/produksiclient', '2021-07-11 05:56:55', 'seen'),
(110, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver  dengan Nomor Kendaraan P2032XMProses PengirimanSudah Terkirim', 'http://localhost:8080/FinalTArev/DetailClient', '2021-07-11 05:56:55', 'seen'),
(111, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver  dengan Nomor Kendaraan P2032XMProses PengirimanProses Pengiriman', 'http://localhost:8080/FinalTArev/DetailClient', '2021-07-11 05:56:55', 'seen'),
(112, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Malang Nama Driver 4Dengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTArev/produksiclient', '2021-07-11 05:56:55', 'seen'),
(113, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver  dengan Nomor Kendaraan P2032XMProses PengirimanSudah Terkirim', 'http://localhost:8080/FinalTArev/DetailClient', '2021-07-11 05:56:55', 'seen'),
(114, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Malang Nama Driver 2Dengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTArev/produksiclient', '2021-07-11 05:56:55', 'seen'),
(115, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver  dengan Nomor Kendaraan P2032XMProses PengirimanSudah Terkirim', 'http://localhost:8080/FinalTArev/DetailClient', '2021-07-11 05:56:55', 'seen'),
(116, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Malang Nama Driver 2Dengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTArev/produksiclient', '2021-07-11 05:56:55', 'seen'),
(117, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Malang Nama Driver 2Dengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTArev/produksiclient', '2021-07-11 05:56:55', 'seen'),
(118, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver  dengan Nomor Kendaraan P2032XMProses PengirimanSudah Terkirim', 'http://localhost:8080/FinalTArev/DetailClient', '2021-07-11 05:56:55', 'seen'),
(119, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Malang Nama Driver 2Dengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTArev/produksiclient', '2021-07-11 05:59:09', 'seen'),
(120, 'admin', 'Tambah Barang Baru', 'Telah dibuat   baru dengan total 1000', 'http://localhost:8080/FinalTArev/BarangClient', '2021-07-21 07:52:16', 'seen'),
(121, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  1000Oleh Staff  shift2', 'http://localhost:8080/FinalTArev/produksiclient', '2021-07-21 07:52:16', 'seen'),
(122, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  100Oleh Staff  shift2', 'http://localhost:8080/FinalTArev/produksiclient', '2021-07-21 07:52:16', 'seen'),
(123, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Malang Nama Driver 2Dengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTArev/produksiclient', '2021-07-21 07:52:16', 'seen'),
(124, 'admin', 'Tambah Barang Baru', 'Telah dibuat   baru dengan total 2000', 'http://localhost:8080/FinalTArev/BarangClient', '2021-07-21 07:52:16', 'seen'),
(125, 'admin', 'Tambah Barang Baru', 'Telah dibuat   baru dengan total 1000', 'http://localhost:8080/FinalTArev/BarangClient', '2021-07-21 07:52:16', 'seen'),
(126, 'admin', 'Tambah Barang Baru', 'Telah dibuat   baru dengan total 2000', 'http://localhost:8080/FinalTArev/BarangClient', '2021-07-21 07:52:16', 'seen'),
(127, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  3000Oleh Staff  shift1', 'http://localhost:8080/FinalTArev/produksiclient', '2021-07-21 08:11:48', 'delivery'),
(128, 'admin', 'Tambah Produksi Baru', 'Penambahan Data Jumlah Produksi Hari Ini  906Oleh Staff  shift1', 'http://localhost:8080/FinalTArev/produksiclient', '2021-07-21 08:13:09', 'delivery'),
(129, 'admin', 'Tambah Barang Baru', 'Telah dibuat   baru dengan total 1000', 'http://localhost:8080/FinalTArev/BarangClient', '2021-07-21 08:40:10', 'delivery'),
(130, 'admin', 'Tambah Barang Baru', 'Telah dibuat   baru dengan total 10000', 'http://localhost:8080/FinalTArev/BarangClient', '2021-07-21 08:40:10', 'delivery'),
(131, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Malang Nama Driver 3Dengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTArev/produksiclient', '2021-07-21 08:42:20', 'delivery'),
(132, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  Malang Nama Driver 4Dengan Nomor Kendaraan P2032XM', 'http://localhost:8080/FinalTArev/produksiclient', '2021-07-21 08:42:48', 'delivery'),
(133, 'admin', 'Proses Pengiriman', 'Pengiriman Barang dengan tujuan  MalangNama Driver  dengan Nomor Kendaraan P2032XMProses PengirimanSudah Terkirim', 'http://localhost:8080/FinalTArev/DetailClient', '2021-07-21 08:43:43', 'delivery');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `kode_unik` varchar(10) NOT NULL,
  `level` enum('admin','Staff Produksi','Staff Pengiriman','Staff Gudang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `username`, `password`, `kode_unik`, `level`) VALUES
(32, 'Staf Gudang Perusahaan', 'gudang', '123', 'VV4HMZ', 'Staff Gudang'),
(34, 'Admin Perusahaan', 'Admin', 'admin123', 'JVC4CE', 'admin'),
(35, 'Staf Produksi Perusahaan', 'Produksi', '1234', 'AJHHNE', 'Staff Produksi'),
(36, 'Staf Pengiriman Perusahaan', 'pengiriman', '1234', 'IOEJ3X', 'Staff Pengiriman'),
(38, 'Avdio Bayu', 'Avdio', '1234', 'N4SVHV', 'Staff Produksi'),
(41, 'xxxx', '1234', '1234', 'M8RH20', 'Staff Produksi');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(255) NOT NULL,
  `id_driver` int(50) NOT NULL,
  `nomorhp` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL,
  `nomor_kendaraan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti_surat` varchar(50) NOT NULL,
  `status_pengiriman` enum('Proses Pengiriman','Sudah Terkirim') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_driver`, `nomorhp`, `tujuan`, `jumlah`, `jenis_kendaraan`, `nomor_kendaraan`, `tanggal`, `bukti_surat`, `status_pengiriman`) VALUES
(109, 3, '0256123', 'Malang', '23', 'Pickup', 'P2032XM', '2021-07-15', '', 'Sudah Terkirim'),
(114, 3, '0256123', 'Malang', '1000', 'Pickup', 'P2032XM', '2021-07-22', '', 'Sudah Terkirim'),
(115, 4, '0256123', 'Malang', '2000', 'Pickup', 'P2032XM', '2021-07-22', '', 'Sudah Terkirim'),
(116, 3, '0256123', 'Malang', '23', 'Pickup', 'P2032XM', '2021-07-22', '', 'Sudah Terkirim'),
(117, 4, '0256123', 'Malang', '23', 'Pickup', 'P2032XM', '2021-07-24', '1626856967.png', 'Proses Pengiriman');

-- --------------------------------------------------------

--
-- Table structure for table `peramalan`
--

CREATE TABLE `peramalan` (
  `id_peramalan` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL COMMENT 'relasi dengan id pada tabel pegawai',
  `tanggal_awal` varchar(15) NOT NULL,
  `tanggal_akhir` varchar(15) NOT NULL,
  `jenis_pemulusan` enum('keseluruhan','sebagian') NOT NULL,
  `nilai_pemulusan` float DEFAULT NULL,
  `perhitungan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `pengujian` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`pengujian`)),
  `tanggal_peramalan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_produksi`
--

CREATE TABLE `transaksi_produksi` (
  `id_transaksiproduksi` int(50) NOT NULL,
  `id_hasilproduksi` int(50) NOT NULL,
  `id` int(50) NOT NULL,
  `tanggal` date NOT NULL,
  `shift` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahanbaku`
--
ALTER TABLE `bahanbaku`
  ADD PRIMARY KEY (`id_bahanbaku`);

--
-- Indexes for table `detail_hasilproduksi`
--
ALTER TABLE `detail_hasilproduksi`
  ADD PRIMARY KEY (`id_detailhasilproduksi`),
  ADD KEY `id_produksi_idxfk` (`id_hasilproduksi`);

--
-- Indexes for table `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  ADD PRIMARY KEY (`id_detailpengiriman`),
  ADD KEY `id_pengiriman_idxfk` (`id_pengiriman`),
  ADD KEY `id_driver_idxfk2` (`id_driver`);

--
-- Indexes for table `detail_suplai`
--
ALTER TABLE `detail_suplai`
  ADD PRIMARY KEY (`id_detailsuplai`),
  ADD KEY `id_bahanbaku_idxfk` (`id_bahanbaku`);

--
-- Indexes for table `detail_suplaimasuk`
--
ALTER TABLE `detail_suplaimasuk`
  ADD PRIMARY KEY (`id_detailsuplaimasuk`),
  ADD KEY `id_bahanbaku_detail_suplaimasuk_idxfk` (`id_bahanbaku`),
  ADD KEY `id_driver_detail_suplaimasuk_idxfk` (`id_driver`);

--
-- Indexes for table `detail_transaksi_produksi`
--
ALTER TABLE `detail_transaksi_produksi`
  ADD PRIMARY KEY (`id_detail_transaksiproduksi`),
  ADD KEY `id_detail_semuabarang_idxfk` (`id_detailsuplai`),
  ADD KEY `id_detailproduksi_idxfk` (`id_transaksiproduksi`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indexes for table `hasil_produksi`
--
ALTER TABLE `hasil_produksi`
  ADD PRIMARY KEY (`id_hasilproduksi`),
  ADD KEY `id_pegawai_idxfk` (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_driver_idxfk` (`id_driver`);

--
-- Indexes for table `peramalan`
--
ALTER TABLE `peramalan`
  ADD PRIMARY KEY (`id_peramalan`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `transaksi_produksi`
--
ALTER TABLE `transaksi_produksi`
  ADD PRIMARY KEY (`id_transaksiproduksi`),
  ADD KEY `id_produk_idxfk` (`id_hasilproduksi`),
  ADD KEY `id_pegawai_idxfk2` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahanbaku`
--
ALTER TABLE `bahanbaku`
  MODIFY `id_bahanbaku` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `detail_hasilproduksi`
--
ALTER TABLE `detail_hasilproduksi`
  MODIFY `id_detailhasilproduksi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  MODIFY `id_detailpengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `detail_suplai`
--
ALTER TABLE `detail_suplai`
  MODIFY `id_detailsuplai` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `detail_suplaimasuk`
--
ALTER TABLE `detail_suplaimasuk`
  MODIFY `id_detailsuplaimasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `detail_transaksi_produksi`
--
ALTER TABLE `detail_transaksi_produksi`
  MODIFY `id_detail_transaksiproduksi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id_driver` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hasil_produksi`
--
ALTER TABLE `hasil_produksi`
  MODIFY `id_hasilproduksi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `peramalan`
--
ALTER TABLE `peramalan`
  MODIFY `id_peramalan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_produksi`
--
ALTER TABLE `transaksi_produksi`
  MODIFY `id_transaksiproduksi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  ADD CONSTRAINT `id_driver_idxfk2` FOREIGN KEY (`id_driver`) REFERENCES `driver` (`id_driver`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_pengiriman_idxfk` FOREIGN KEY (`id_pengiriman`) REFERENCES `pengiriman` (`id_pengiriman`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_suplai`
--
ALTER TABLE `detail_suplai`
  ADD CONSTRAINT `detail_suplai_ibfk_1` FOREIGN KEY (`id_bahanbaku`) REFERENCES `bahanbaku` (`id_bahanbaku`);

--
-- Constraints for table `detail_suplaimasuk`
--
ALTER TABLE `detail_suplaimasuk`
  ADD CONSTRAINT `detail_suplaimasuk_ibfk_1` FOREIGN KEY (`id_driver`) REFERENCES `driver` (`id_driver`),
  ADD CONSTRAINT `detail_suplaimasuk_ibfk_2` FOREIGN KEY (`id_bahanbaku`) REFERENCES `bahanbaku` (`id_bahanbaku`);

--
-- Constraints for table `detail_transaksi_produksi`
--
ALTER TABLE `detail_transaksi_produksi`
  ADD CONSTRAINT `detail_transaksi_produksi_ibfk_1` FOREIGN KEY (`id_transaksiproduksi`) REFERENCES `transaksi_produksi` (`id_transaksiproduksi`),
  ADD CONSTRAINT `detail_transaksi_produksi_ibfk_2` FOREIGN KEY (`id_detailsuplai`) REFERENCES `detail_suplai` (`id_detailsuplai`);

--
-- Constraints for table `hasil_produksi`
--
ALTER TABLE `hasil_produksi`
  ADD CONSTRAINT `hasil_produksi_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pegawai` (`id`);

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`id_driver`) REFERENCES `driver` (`id_driver`);

--
-- Constraints for table `transaksi_produksi`
--
ALTER TABLE `transaksi_produksi`
  ADD CONSTRAINT `transaksi_produksi_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pegawai` (`id`),
  ADD CONSTRAINT `transaksi_produksi_ibfk_2` FOREIGN KEY (`id_hasilproduksi`) REFERENCES `hasil_produksi` (`id_hasilproduksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
