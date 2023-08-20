-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2023 at 03:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kharisma_motor`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(11) NOT NULL,
  `no_antrian` int(20) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jenis_kendaraan` varchar(50) NOT NULL,
  `nopol` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_keluhan`
--

CREATE TABLE `jenis_keluhan` (
  `idjkeluhan` int(11) NOT NULL,
  `idservis` int(11) NOT NULL,
  `keluhan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_keluhan`
--

INSERT INTO `jenis_keluhan` (`idjkeluhan`, `idservis`, `keluhan`) VALUES
(1, 6, 'Suara mesin berisik atau tidak wajar saat kendaraan dinyalakan'),
(2, 6, 'Performa kendaraan menurun atau terasa lambat saat dipercepat.'),
(3, 8, 'Rem mobil tidak berfungsi dengan baik atau terlalu keras.'),
(5, 10, 'Transmisi mobil bermasalah, seperti sulit berpindah gigi atau miring saat digunakan.'),
(6, 6, 'Getaran atau gejala tidak stabil pada kendaraan saat berjalan.');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `level` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `username`, `password`, `nama`, `no_hp`, `level`) VALUES
(1, 'eka', '$2y$10$mJ.mmFN1ctsNIJaLalvIveXAc/jHDC7i.6JREJugc3TsTaOjtF6ru', 'Eka Nurseva', '0871268382', 'Admin'),
(2, 'zidan', '$2y$10$TocCBvpUf9GsfjUpVd7TYejrLkHlaxXiVtscweuNtayyGdbBTDym2', 'Zidan Kharisma', '0831923713', 'Admin'),
(3, 'fillah', '$2y$10$nWksEXRCVZpOzBPzGW8TS.r9mqItoDlXTMlNdvaI9lVcHfgQWaMq6', 'Fillah Zaki', '08219087262', 'Kasir'),
(4, 'ali', '$2y$10$Bos4FzwCUP/qjv4IS7nzDOx5S7mOjKVxvzttJGAAZzGom2cp.IIu6', 'Ali Asyidiqiansyah', '087123613182', 'Kasir'),
(5, 'nur', '$2y$10$0/ZRaryTySK7lkl2s/CZwuMA8/st3Qs1EhTds2GmSuhv8idoPy47C', 'Rachamat Nur Janah', '089829179', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `servis`
--

CREATE TABLE `servis` (
  `idservis` int(11) NOT NULL,
  `jenis_servis` varchar(100) NOT NULL,
  `harga_jasa` bigint(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servis`
--

INSERT INTO `servis` (`idservis`, `jenis_servis`, `harga_jasa`, `deskripsi`) VALUES
(1, 'Servis mesin (silinderhead) ', 800000, 'Servis mesin (silinderhead) merupakan jenis servis yang dapat memperbaiki mesin'),
(2, 'Servis overhoul', 2000000, 'Servis overhoul merupakan'),
(3, 'Spooring', 150000, 'Spooring merupakan jenis servis'),
(4, 'Servis Per', 300000, 'Servis Per merupakan jenis servis pada per'),
(6, 'Servis berkala (tanpa pergantian part)', 150000, 'Servis berkala merupakan suatu jenis servis pemeriksaan rutin'),
(7, 'Servis tune up', 200000, 'Servis tune up merupakan '),
(8, 'Servis rem', 200000, 'Servis rem merupakan '),
(9, 'Servis kelistrikan remot', 250000, 'Servis kelistrikan remot merupakan'),
(10, 'Servis transmisi (gigi)', 450000, 'Servis transmisi (gigi) merupakan');

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `idsparepart` int(11) NOT NULL,
  `sparepart` varchar(50) NOT NULL,
  `harga` bigint(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`idsparepart`, `sparepart`, `harga`, `deskripsi`) VALUES
(1, 'Kepala Silinder', 300000, 'Sebagai ruang bakar, tempat busi, dan tempat mekanisme katup hisap dan katup buang.'),
(4, 'Noken As', 20000, 'Mengatur buka tutup katup hisap dan katup buang.'),
(5, 'Katup Hisap', 10000, 'Membuka dan menutup lubang hisap ketika dibutuhkan saat terjadinya pembakaran di dalam ruang bakar.'),
(7, 'Katup Buang', 21000, 'Membuka lubang pembuangan ketika proses pembakaran telah selesai dan menutup ketika proses hisap, kompresi, dan kerja berlangsung.'),
(8, 'Rocker Arm', 20000, 'Tempat batang nok menekan katup hisap dan katup buang.'),
(9, 'Cylinder Head Cover', 100000, 'Cover penutup bagian kepala silinder.'),
(10, 'Busi', 15000, 'Menghasilkan percikan bunga api ketika proses pembakaran di ruang bakar.'),
(11, 'Intake Manifold', 100000, 'Saluran masuk udara ke dalam ruang bakar.');

-- --------------------------------------------------------

--
-- Table structure for table `status_antrian`
--

CREATE TABLE `status_antrian` (
  `idstatus` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_antrian`
--

INSERT INTO `status_antrian` (`idstatus`, `status`, `deskripsi`) VALUES
(1, 'Menunggu Antrian', 'Mobil Anda masih menunggu giliran untuk dilayani'),
(2, 'Diproses', 'Teknisi sedang memeriksa mobil dan mempersiapkan langkah-langkah perbaikan yang diperlukan.'),
(3, 'Dalam Pengerjaan', 'Mobil Anda sedang diperbaiki.'),
(4, 'Menunggu suku cadang', ' Mobil Anda membutuhkan suku cadang tertentu yang tidak tersedia di bengkel.'),
(6, 'Selesai', 'Mobil sudah siap untuk diambil.');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` int(11) NOT NULL,
  `idantrian` int(11) NOT NULL,
  `idservis` int(11) NOT NULL,
  `idsparepart` int(11) NOT NULL,
  `harga_total` bigint(100) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `jenis_keluhan`
--
ALTER TABLE `jenis_keluhan`
  ADD PRIMARY KEY (`idjkeluhan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`idservis`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`idsparepart`);

--
-- Indexes for table `status_antrian`
--
ALTER TABLE `status_antrian`
  ADD PRIMARY KEY (`idstatus`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `idantrian` (`idantrian`),
  ADD KEY `idservis` (`idservis`,`idsparepart`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_keluhan`
--
ALTER TABLE `jenis_keluhan`
  MODIFY `idjkeluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idpengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `servis`
--
ALTER TABLE `servis`
  MODIFY `idservis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `idsparepart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `status_antrian`
--
ALTER TABLE `status_antrian`
  MODIFY `idstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
