-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 03:12 PM
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
  `tanggal_peramalan` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_pengajuan` enum('pengajuan','diterima','ditolak') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peramalan`
--

INSERT INTO `peramalan` (`id_peramalan`, `id_pegawai`, `tanggal_awal`, `tanggal_akhir`, `jenis_pemulusan`, `nilai_pemulusan`, `perhitungan`, `pengujian`, `tanggal_peramalan`, `status_pengajuan`, `keterangan`) VALUES
(1, 34, '1640970000', '1669827600', 'sebagian', 0.1, '[\n    [\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"January\",\n            \"actual\": \"266\",\n            \"pemulusan_1\": \"266\",\n            \"pemulusan_2\": \"266\",\n            \"pemulusan_3\": \"266\",\n            \"at\": 0,\n            \"bt\": 0,\n            \"ct\": 0,\n            \"Ft\": 0\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"February\",\n            \"actual\": \"110\",\n            \"pemulusan_1\": 250.4,\n            \"pemulusan_2\": 264.44,\n            \"pemulusan_3\": 265.844,\n            \"at\": 223.7240000000001,\n            \"bt\": -0.4445999999999996,\n            \"ct\": -0.1560000000000003,\n            \"Ft\": 223.2014000000001\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"March\",\n            \"actual\": \"150\",\n            \"pemulusan_1\": 240.36,\n            \"pemulusan_2\": 262.03200000000004,\n            \"pemulusan_3\": 265.4628,\n            \"at\": 200.44679999999994,\n            \"bt\": -0.6574200000000012,\n            \"ct\": -0.22520000000000062,\n            \"Ft\": 199.67677999999995\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"April\",\n            \"actual\": \"234\",\n            \"pemulusan_1\": 239.72400000000002,\n            \"pemulusan_2\": 259.80120000000005,\n            \"pemulusan_3\": 264.89664000000005,\n            \"at\": 204.66503999999998,\n            \"bt\": -0.5652559999999984,\n            \"ct\": -0.18496000000000012,\n            \"Ft\": 204.00730399999998\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"May\",\n            \"actual\": \"354\",\n            \"pemulusan_1\": 251.15160000000003,\n            \"pemulusan_2\": 258.93624000000005,\n            \"pemulusan_3\": 264.30060000000003,\n            \"at\": 240.9466799999999,\n            \"bt\": -0.1417740000000016,\n            \"ct\": -0.029880000000000594,\n            \"Ft\": 240.7899659999999\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"June\",\n            \"actual\": \"222\",\n            \"pemulusan_1\": 248.23644000000002,\n            \"pemulusan_2\": 257.86626000000007,\n            \"pemulusan_3\": 263.657166,\n            \"at\": 234.7677059999998,\n            \"bt\": -0.19467690000000232,\n            \"ct\": -0.04739400000000126,\n            \"Ft\": 234.54933209999982\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"July\",\n            \"actual\": \"160\",\n            \"pemulusan_1\": 239.41279600000001,\n            \"pemulusan_2\": 256.0209136000001,\n            \"pemulusan_3\": 262.89354076000006,\n            \"at\": 213.0691879599998,\n            \"bt\": -0.4068884340000011,\n            \"ct\": -0.12019124000000114,\n            \"Ft\": 212.6022039059998\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"August\",\n            \"actual\": \"200\",\n            \"pemulusan_1\": 235.4715164,\n            \"pemulusan_2\": 253.9659738800001,\n            \"pemulusan_3\": 262.0007840720001,\n            \"at\": 206.51741163199983,\n            \"bt\": -0.44438715080000113,\n            \"ct\": -0.12913144800000054,\n            \"Ft\": 206.00845875719983\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"September\",\n            \"actual\": \"300\",\n            \"pemulusan_1\": 241.92436476,\n            \"pemulusan_2\": 252.7618129680001,\n            \"pemulusan_3\": 261.0768869616001,\n            \"at\": 228.5645423375998,\n            \"bt\": -0.1780258726400025,\n            \"ct\": -0.03114042240000109,\n            \"Ft\": 228.37094625375977\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"October\",\n            \"actual\": \"244\",\n            \"pemulusan_1\": 242.13192828400003,\n            \"pemulusan_2\": 251.69882449960008,\n            \"pemulusan_3\": 260.1390807154001,\n            \"at\": 231.43839206859997,\n            \"bt\": -0.13203074807000173,\n            \"ct\": -0.013909135800000418,\n            \"Ft\": 231.29940675262995\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"November\",\n            \"actual\": \"150\",\n            \"pemulusan_1\": 232.91873545560003,\n            \"pemulusan_2\": 249.8208155952001,\n            \"pemulusan_3\": 259.1072542033801,\n            \"at\": 208.40101378457996,\n            \"bt\": -0.36173838220700066,\n            \"ct\": -0.09402026582000084,\n            \"Ft\": 207.99226526946296\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"December\",\n            \"actual\": \"170\",\n            \"pemulusan_1\": 226.62686191004002,\n            \"pemulusan_2\": 247.5014202266841,\n            \"pemulusan_3\": 257.9466708057105,\n            \"at\": 195.32299585577823,\n            \"bt\": -0.4701397753033613,\n            \"ct\": -0.1287568856496013,\n            \"Ft\": 194.7884776376501\n        }\n    ]\n]', '[\n    [\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"January\",\n            \"actual\": \"266\",\n            \"Ft\": 0,\n            \"PE\": \"-\",\n            \"APE\": \"-\"\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"February\",\n            \"actual\": \"110\",\n            \"Ft\": 0,\n            \"PE\": \"-\",\n            \"APE\": \"-\"\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"March\",\n            \"actual\": \"150\",\n            \"Ft\": \"223.20\",\n            \"PE\": -48.79999999999999,\n            \"APE\": 48.79999999999999\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"April\",\n            \"actual\": \"234\",\n            \"Ft\": \"199.68\",\n            \"PE\": 14.666666666666664,\n            \"APE\": 14.666666666666664\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"May\",\n            \"actual\": \"354\",\n            \"Ft\": \"204.01\",\n            \"PE\": 42.37005649717515,\n            \"APE\": 42.37005649717515\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"June\",\n            \"actual\": \"222\",\n            \"Ft\": \"240.79\",\n            \"PE\": -8.46396396396396,\n            \"APE\": 8.46396396396396\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"July\",\n            \"actual\": \"160\",\n            \"Ft\": \"234.55\",\n            \"PE\": -46.59375000000001,\n            \"APE\": 46.59375000000001\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"August\",\n            \"actual\": \"200\",\n            \"Ft\": \"212.60\",\n            \"PE\": -6.299999999999997,\n            \"APE\": 6.299999999999997\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"September\",\n            \"actual\": \"300\",\n            \"Ft\": \"206.01\",\n            \"PE\": 31.330000000000002,\n            \"APE\": 31.330000000000002\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"October\",\n            \"actual\": \"244\",\n            \"Ft\": \"228.37\",\n            \"PE\": 6.405737704918031,\n            \"APE\": 6.405737704918031\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"November\",\n            \"actual\": \"150\",\n            \"Ft\": \"231.30\",\n            \"PE\": -54.2,\n            \"APE\": 54.2\n        },\n        {\n            \"tahun\": \"2022\",\n            \"bulan\": \"December\",\n            \"actual\": \"170\",\n            \"Ft\": \"207.99\",\n            \"PE\": -22.347058823529416,\n            \"APE\": 22.347058823529416\n        }\n    ]\n]', '2022-06-20 12:21:56', 'ditolak', 'Akurasi tidak sesuai ekspektasi, silahkan diubah nilai alphanya\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peramalan`
--
ALTER TABLE `peramalan`
  ADD PRIMARY KEY (`id_peramalan`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peramalan`
--
ALTER TABLE `peramalan`
  MODIFY `id_peramalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
