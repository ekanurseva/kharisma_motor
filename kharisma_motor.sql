-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 03 Sep 2023 pada 09.26
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

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
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(11) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `no_antrian` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `nopol` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `id_kendaraan`, `no_antrian`, `nama_pelanggan`, `no_hp`, `tanggal`, `nopol`, `alamat`, `status`) VALUES
(1, 1, '20230902_1', 'Fillah Zaki Alhaqi', '085826389656', '2023-09-02 15:13:50', 'E 1234 ZN', 'Kuningan', 'Selesai'),
(2, 2, '20230902_2', 'Sukiman', '082312321312', '2023-09-02 14:27:09', 'E 3456 PK', 'asdsadasd', 'Menunggu Antrian'),
(3, 1, '20230902_3', 'Sukijan', '0892891731111', '2023-09-02 15:16:45', 'E 9451 DF', 'asdasdasd', 'Diproses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_sparepart`
--

CREATE TABLE `harga_sparepart` (
  `idharga` int(11) NOT NULL,
  `idkendaraan` int(11) NOT NULL,
  `idsparepart` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `harga_sparepart`
--

INSERT INTO `harga_sparepart` (`idharga`, `idkendaraan`, `idsparepart`, `harga`) VALUES
(1, 1, 1, 1450000),
(2, 2, 1, 1550000),
(3, 1, 2, 200000),
(4, 2, 2, 270000),
(5, 1, 3, 112000),
(6, 2, 3, 117000),
(7, 1, 4, 1550000),
(8, 2, 4, 1560000),
(9, 1, 5, 455000),
(10, 2, 5, 555000),
(11, 1, 6, 475000),
(12, 2, 6, 475050),
(13, 1, 7, 430000),
(14, 2, 7, 430000),
(15, 1, 8, 285000),
(16, 2, 8, 285500),
(17, 1, 9, 350000),
(18, 2, 9, 390000),
(19, 1, 10, 660000),
(20, 2, 10, 700000),
(21, 1, 11, 27000),
(22, 2, 11, 40000),
(23, 1, 12, 810000),
(24, 2, 12, 810000),
(25, 1, 13, 1400000),
(26, 2, 13, 1400000),
(27, 1, 14, 155000),
(28, 2, 14, 175000),
(29, 1, 15, 235000),
(30, 2, 15, 235000),
(31, 1, 16, 135000),
(32, 2, 16, 135000),
(33, 1, 17, 90000),
(34, 2, 17, 100000),
(35, 1, 18, 550000),
(36, 2, 18, 550000),
(37, 1, 19, 150000),
(38, 2, 19, 150000),
(39, 1, 20, 250000),
(40, 2, 20, 250000),
(41, 1, 21, 150000),
(42, 2, 21, 150000),
(43, 1, 22, 100000),
(44, 2, 22, 100000),
(45, 1, 23, 600000),
(46, 2, 23, 600000),
(47, 1, 24, 20000),
(48, 2, 24, 20000),
(49, 1, 25, 250000),
(50, 2, 25, 250000),
(51, 1, 26, 55000),
(52, 2, 26, 55000),
(53, 1, 27, 170000),
(54, 2, 27, 170000),
(55, 1, 28, 300000),
(56, 2, 28, 300000),
(57, 1, 29, 800000),
(58, 2, 29, 800000),
(59, 1, 30, 215000),
(60, 2, 30, 215000),
(61, 1, 31, 400000),
(62, 2, 31, 400000),
(63, 1, 32, 225000),
(64, 2, 32, 225000),
(65, 1, 33, 80000),
(66, 2, 33, 80000),
(67, 1, 34, 250000),
(68, 2, 34, 250000),
(69, 1, 35, 950000),
(70, 2, 35, 950000),
(71, 1, 36, 300000),
(72, 2, 36, 300000),
(73, 1, 37, 75000),
(74, 2, 37, 75000),
(75, 1, 38, 50000),
(76, 2, 38, 50000),
(77, 1, 39, 2500000),
(78, 2, 39, 2500000),
(79, 1, 40, 15000),
(80, 2, 40, 15000),
(81, 1, 41, 250000),
(82, 2, 41, 250000),
(83, 1, 42, 700000),
(84, 2, 42, 700000),
(85, 1, 43, 1500000),
(86, 2, 43, 1500000),
(87, 1, 44, 500000),
(88, 2, 44, 500000),
(89, 1, 45, 800000),
(90, 2, 45, 800000),
(91, 1, 46, 450000),
(92, 2, 46, 450000),
(93, 1, 47, 80000),
(94, 2, 47, 80000),
(95, 1, 48, 300000),
(96, 2, 48, 300000),
(97, 1, 49, 150000),
(98, 2, 49, 150000),
(99, 1, 50, 200000),
(100, 2, 50, 200000),
(101, 1, 51, 200000),
(102, 2, 51, 200000),
(103, 1, 52, 215000),
(104, 2, 52, 215000),
(105, 2, 53, 100000),
(106, 1, 53, 100000),
(107, 2, 54, 500000),
(108, 1, 54, 500000),
(109, 2, 55, 200000),
(110, 1, 55, 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_keluhan`
--

CREATE TABLE `jenis_keluhan` (
  `idkeluhan` int(11) NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `idservis` int(11) NOT NULL,
  `idsparepart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_keluhan`
--

INSERT INTO `jenis_keluhan` (`idkeluhan`, `keluhan`, `idservis`, `idsparepart`) VALUES
(1, 'Performa mesin menurun', 2, 17),
(2, 'Konsumsi bahan bakar tidak efisien', 2, 19),
(3, 'Mesin terlalu panas', 2, 20),
(4, 'Tidak ada respons saat akselerasi', 2, 17),
(5, 'Mobil mogok saat dinyalakan', 2, 17),
(6, 'Mesin mengeluarkan suara kasar', 2, 21),
(7, 'Mobil menarik ke satu sisi saat menginjak rem', 3, 22),
(8, 'Rem terlalu responsif atau terlalu kuat', 3, 23),
(9, 'Rem mengeluarkan bau aneh', 3, 53),
(10, 'Cairan rem bocor atau berkurang cepat', 3, 24),
(11, 'Pedal rem keras dan sulit ditekan', 3, 23),
(12, 'Rem terasa kurang responsif atau bunyi berdecit saat menginjak rem', 3, 25),
(13, 'Jarak remot berfungsi terbatas', 4, 26),
(14, 'Pintu tidak terkunci atau tidak terbuka saat remote digunakan', 4, 27),
(15, 'Tombol remote tidak berfungsi tertentu', 4, 28),
(16, 'Kesulitan menghubungkan remote dengan mobil', 4, 29),
(17, 'Remote berfungsi sendiri tanpa ditekan', 4, 29),
(18, 'Remote tidak berfungsi atau tidak dapat mengunci/membuka pintu', 4, 26),
(19, 'Mobil miring atau condong ke satu sisi', 5, 30),
(20, 'Ketinggian mobil tidak stabil', 5, 30),
(21, 'Suspensi terasa kaku atau keras', 5, 31),
(22, 'Bunyi berdecil atau berderit saat melewati jalan tidak rata', 5, 32),
(23, 'Mobil terasa berguncang saat melewati jalan tidak rata', 5, 33),
(24, 'Kaca tidak lurus saat dibuka atau ditutup', 6, 34),
(25, 'Bunyi berisik saat kaca dibuka atau ditutup', 6, 34),
(26, 'Kaca tidak dapat diangkat atau diturunkan dengan benar', 6, 34),
(27, 'Lampu yang mati atau sistem kontrol yang tidak berfungsi', 8, 38),
(28, 'Bemper berkarat', 9, 39),
(29, 'Bemper tidak sejajar dengan bodinya', 9, 40),
(30, 'Bemper rusak atau berlubang', 9, 42),
(31, 'Bau terbakar dari bawah kap mobil', 10, 41),
(32, 'Pedal kopling terasa berat atau tidak merespon', 10, 43),
(33, 'Mobil bergoyang saat berpindah gigi', 11, 44),
(34, 'Terdapat bising atau getaran saat mobil melaju di gigi tertentu', 11, 45),
(35, 'Perpindahan gigi terasa kasar atau terjadi guncangan saat berpindah gigi', 11, 46),
(36, 'Suara berisik atau getaran dari bagian gardan', 12, 47),
(37, 'Mobil overheat', 13, 48),
(38, 'Lampu indikator suhu menyala', 13, 52),
(39, 'Sabuk pengaman kaku atau tidak dapat dikunci dengan benar', 14, 55),
(40, 'Sistem audio mati atau kualitas suara buruk', 15, 50),
(41, 'Bocor oli dari bagian silinder head', 16, 2),
(42, 'Performa mesin menurun secara signifikan', 17, 8),
(43, 'Mobil tidak mengarah lurus saat dikemudikan', 18, 51),
(44, 'Performa mesin buruk', 19, 4),
(45, 'Konsumsi bahan bakar tidak efisien', 19, 1),
(46, 'Lampu indikator mesin menyala', 20, 18),
(47, 'Performa mesin tidak seperti biasanya', 20, 17),
(48, 'RPM naik turun tidak stabil', 20, 18),
(53, 'Pengisian baterai tidak optimal', 7, 35),
(54, 'Performa elektrikal tidak stabil', 7, 36),
(55, 'Bunyi menggema dari bagian depan mesin', 7, 54),
(56, 'Lampu indikator baterai menyala, baterai sering kehabisan daya', 7, 37);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kendaraan`
--

CREATE TABLE `jenis_kendaraan` (
  `idkendaraan` int(11) NOT NULL,
  `nama_kendaraan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_kendaraan`
--

INSERT INTO `jenis_kendaraan` (`idkendaraan`, `nama_kendaraan`) VALUES
(1, 'Toyota Avanza'),
(2, 'Daihatsu Xenia'),
(3, 'Toyota Kijang Innova'),
(4, 'Honda Mobilio'),
(5, 'Suzuki Ertiga'),
(6, 'Mitsubishi Xpander'),
(7, 'Kia Grand Carnival'),
(8, 'Hyundai Starex'),
(9, 'Nissan Livina'),
(10, 'Chevrolet Spin'),
(11, 'Ford Grand C-MAX'),
(12, 'Renault Scenic'),
(13, 'Mazda5'),
(14, 'Chrysler Pacifica'),
(15, 'Volkswagen Touran'),
(17, 'Daihatsu Sigra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `level` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `username`, `password`, `nama`, `no_hp`, `level`) VALUES
(1, 'eka', '$2y$10$gaAwT3zATxganiJjgJYlk.Ydo01F4SZhvpOsp7Wd9lPbH.VKiyFfe', 'Eka Nurseva', '0896182631', 'Admin'),
(2, 'zidan', '$2y$10$oYd849hLAVXRM1WA76DasOFCJ3KYP0xF6wKLbSYjWRR1neopQxn8C', 'Zidan Kharisma', '08765456786', 'Admin'),
(4, 'fillah', '$2y$10$UDRlybR2CQfVahlNoJbkaOyuu2BpSN3M6YNs500Uycyuy6qKyrUzO', 'Fillah Zaki Alhaqi', '085826389656', 'User'),
(5, 'fillah21', '$2y$10$R3MHyjVYsW996.Fj5yBuR.TOAWlY6yEbqFebF2hpj4nh8mocxv7Kq', 'Fillah Zaki Alhaqi', '085826389656', 'Admin'),
(6, 'kasir', '$2y$10$FGorUm0BpjAQboP4joULBObGa2/dlf92NXZT3RLv3mBVOgT4nxn7S', 'Kasir', '129-9392-3', 'Kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `servis`
--

CREATE TABLE `servis` (
  `idservis` int(11) NOT NULL,
  `jenis_servis` varchar(100) NOT NULL,
  `harga_jasa` bigint(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `waktu_pengerjaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `servis`
--

INSERT INTO `servis` (`idservis`, `jenis_servis`, `harga_jasa`, `deskripsi`, `waktu_pengerjaan`) VALUES
(1, 'Servis Berkala (tanpa pergantian part)', 150000, 'asdasd', 3600),
(2, 'Servis Tune Up Mesin', 200000, 'asdasd', 3600),
(3, 'Servis Rem', 200000, 'asdasdasd', 5400),
(4, 'Servis Kelistrikan Remot', 250000, 'asdasdasd', 7200),
(5, 'Servis Kaki-Kaki', 350000, 'asdassdasd', 7200),
(6, 'Servis Kaca (Power Window)', 200000, 'asdasdasd', 5400),
(7, 'Servis Dynamo', 500000, 'asdasdasd', 7200),
(8, 'Servis Seluruh Kelistrikan', 550000, 'assdassdasd', 14400),
(9, 'Servis Bemper', 150000, 'asdasdasd', 3600),
(10, 'Servis Kopling', 400000, 'adadasd', 14400),
(11, 'Servis Transmisi (Gigi)', 450000, 'asdasdasd', 18000),
(12, 'Servis Gardan', 300000, 'asdaasd', 10800),
(13, 'Servis Radiator', 250000, 'asdsadas', 12600),
(14, 'Servis Sabuk Pengaman', 100000, 'asdasdasd', 3600),
(15, 'Servis Audio', 200000, 'asdasdad', 7200),
(16, 'Servis Mesin (Silinder Head)', 800000, 'asdadasd', 18000),
(17, 'Servis Overhoul', 2000000, 'asdsd', 259200),
(18, 'Spooring', 150000, 'asdasdasd', 3600),
(19, 'Servis Per', 300000, 'asdasd', 7200),
(20, 'Scanning', 100000, 'asdasdasd', 1800);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sparepart`
--

CREATE TABLE `sparepart` (
  `idsparepart` int(11) NOT NULL,
  `sparepart` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sparepart`
--

INSERT INTO `sparepart` (`idsparepart`, `sparepart`, `deskripsi`) VALUES
(1, 'Fullset Engine', 'asdasdasd'),
(2, 'Gasket Cylinder Head', 'asdasdasd'),
(3, 'Gasket Cover Cylinder Head', 'asdasdasd'),
(4, 'Tutup Timing Chain', 'asdasdasd'),
(5, 'Engine Mounting Kanan/Kiri', 'asdasdasd'),
(6, 'Engine Mounting Belakang', 'asdasdasd'),
(7, 'Ring Piston/Seker (Ukuran Standar)', 'asdasdasd'),
(8, 'Piston/Seker & Pen (Ukuran Standar)', 'asdasdasd'),
(9, 'Pulley AS Crank', 'asdasdasd'),
(10, 'Timing Chain', 'asdasdasd'),
(11, 'Saringan Oli', 'asdasdasd'),
(12, 'Kerodong & Kipas Radiator', 'asdasdasd'),
(13, 'Radiator', 'asdasdasd'),
(14, 'Saringan Udara', 'asdasdasd'),
(15, 'Koil', 'asdasdasd'),
(16, 'Van Belt', 'asdasdasd'),
(17, 'Busi', 'asdasdasd'),
(18, 'Sensor ISC', 'asdasdasd'),
(19, 'Injektor', 'asdasdasd'),
(20, 'Thermostat', 'asdasdasd'),
(21, 'Metal', 'asdasdasd'),
(22, 'karet kaliper', 'asdasdasd'),
(23, 'boster rem', 'asdasdasd'),
(24, 'karet rem', 'asdasdasd'),
(25, 'kanvas rem', 'asdasdasd'),
(26, 'baterai remote', 'asdasdasd'),
(27, 'door lock', 'asdasdasd'),
(28, 'remote', 'asdasdasd'),
(29, 'module remote', 'asdasdasd'),
(30, 'per', 'asdasdasd'),
(31, 'shockbreaker', 'asdasdasd'),
(32, 'ball joint', 'asdasdasd'),
(33, 'bantalan suspensi', 'asdasdasd'),
(34, 'regulator kaca', 'asdasdasd'),
(35, 'dinamo ampere', 'asdasdasd'),
(36, 'gulungan dinamo', 'asdasdasd'),
(37, 'belt dinamo', 'asdasdasd'),
(38, 'bohlam', 'asdasdasd'),
(39, 'body repair', 'asdasdasd'),
(40, 'ripet body', 'asdasdasd'),
(41, 'kabel body', 'asdasdasd'),
(42, 'bumper', 'asdasdasd'),
(43, 'kopling set', 'asdasdasd'),
(44, 'kampas kopling', 'asdasdasd'),
(45, 'gigi', 'asdasdasd'),
(46, 'master kopling', 'asdasdasd'),
(47, 'oli gardan', 'asdasdasd'),
(48, 'paking head', 'asdasdasd'),
(49, 'master rem', 'asdasdasd'),
(50, 'speaker', 'asdasdasd'),
(51, 'tie rod', 'asdasdasd'),
(52, 'Kipas Radiator', 'asdasdasd'),
(53, 'Karet Piston', 'adsadsa'),
(54, 'Dinamo', 'asdsadsa'),
(55, 'Sabuk pengaman', 'asdassd'),
(57, 'Stir', 'asdasdassd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` int(11) NOT NULL,
  `idantrian` int(11) NOT NULL,
  `idservis` int(11) DEFAULT NULL,
  `idsparepart` int(11) DEFAULT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `tanggal_pelunasan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_transaksi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `idantrian`, `idservis`, `idsparepart`, `kode_transaksi`, `tanggal_pelunasan`, `status_transaksi`) VALUES
(1, 1, 1, NULL, 'T-20230902-1', '2023-09-02 15:13:22', 'Lunas'),
(2, 1, 2, NULL, 'T-20230902-1', '2023-09-02 15:13:22', 'Lunas'),
(3, 1, 3, NULL, 'T-20230902-1', '2023-09-02 15:13:22', 'Lunas'),
(4, 1, 12, NULL, 'T-20230902-1', '2023-09-02 15:13:22', 'Lunas'),
(5, 1, NULL, 17, 'T-20230902-2', '2023-09-02 15:13:22', 'Lunas'),
(6, 1, NULL, 19, 'T-20230902-2', '2023-09-02 15:13:22', 'Lunas'),
(7, 1, NULL, 22, 'T-20230902-2', '2023-09-02 15:13:22', 'Lunas'),
(8, 1, NULL, 47, 'T-20230902-2', '2023-09-02 15:13:22', 'Lunas'),
(9, 2, 5, NULL, 'T-20230902-3', '2023-09-02 14:27:13', 'Belum'),
(10, 2, 11, NULL, 'T-20230902-3', '2023-09-02 14:27:13', 'Belum'),
(11, 2, 12, NULL, 'T-20230902-3', '2023-09-02 14:27:13', 'Belum'),
(12, 2, 14, NULL, 'T-20230902-3', '2023-09-02 14:27:13', 'Belum'),
(13, 2, NULL, 30, 'T-20230902-4', '2023-09-02 14:27:33', 'Belum'),
(14, 2, NULL, 44, 'T-20230902-4', '2023-09-02 14:27:33', 'Belum'),
(15, 2, NULL, 47, 'T-20230902-4', '2023-09-02 14:27:33', 'Belum'),
(17, 2, 15, NULL, 'T-20230902-3', '2023-09-02 14:50:48', 'Belum'),
(18, 3, 6, NULL, 'T-20230902-5', '2023-09-02 15:16:55', 'Belum'),
(19, 3, 7, NULL, 'T-20230902-5', '2023-09-02 15:16:55', 'Belum'),
(20, 3, 16, NULL, 'T-20230902-5', '2023-09-02 15:16:55', 'Belum'),
(21, 3, NULL, 34, 'T-20230902-6', '2023-09-02 15:17:00', 'Belum'),
(22, 3, NULL, 35, 'T-20230902-6', '2023-09-02 15:17:00', 'Belum'),
(23, 3, NULL, 37, 'T-20230902-6', '2023-09-02 15:17:00', 'Belum'),
(24, 3, NULL, 2, 'T-20230902-6', '2023-09-02 15:17:00', 'Belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_keluhan`
--

CREATE TABLE `transaksi_keluhan` (
  `idtransaksi_keluhan` int(11) NOT NULL,
  `idantrian` int(11) NOT NULL,
  `idkeluhan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_keluhan`
--

INSERT INTO `transaksi_keluhan` (`idtransaksi_keluhan`, `idantrian`, `idkeluhan`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 7),
(4, 1, 36),
(5, 2, 19),
(6, 2, 33),
(7, 2, 36),
(8, 3, 24),
(9, 3, 53),
(10, 3, 56),
(11, 3, 41);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `id_kendaraan` (`id_kendaraan`);

--
-- Indeks untuk tabel `harga_sparepart`
--
ALTER TABLE `harga_sparepart`
  ADD PRIMARY KEY (`idharga`),
  ADD KEY `harga_sparepart_ibfk_1` (`idkendaraan`),
  ADD KEY `harga_sparepart_ibfk_2` (`idsparepart`);

--
-- Indeks untuk tabel `jenis_keluhan`
--
ALTER TABLE `jenis_keluhan`
  ADD PRIMARY KEY (`idkeluhan`),
  ADD KEY `idservis` (`idservis`),
  ADD KEY `idsparepart` (`idsparepart`);

--
-- Indeks untuk tabel `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  ADD PRIMARY KEY (`idkendaraan`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indeks untuk tabel `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`idservis`);

--
-- Indeks untuk tabel `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`idsparepart`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `transaksi_ibfk_1` (`idantrian`),
  ADD KEY `idsparepart` (`idsparepart`),
  ADD KEY `idservis` (`idservis`);

--
-- Indeks untuk tabel `transaksi_keluhan`
--
ALTER TABLE `transaksi_keluhan`
  ADD PRIMARY KEY (`idtransaksi_keluhan`),
  ADD KEY `idantrian` (`idantrian`),
  ADD KEY `idkeluhan` (`idkeluhan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `harga_sparepart`
--
ALTER TABLE `harga_sparepart`
  MODIFY `idharga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `jenis_keluhan`
--
ALTER TABLE `jenis_keluhan`
  MODIFY `idkeluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  MODIFY `idkendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idpengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `servis`
--
ALTER TABLE `servis`
  MODIFY `idservis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `idsparepart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `transaksi_keluhan`
--
ALTER TABLE `transaksi_keluhan`
  MODIFY `idtransaksi_keluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `antrian_ibfk_1` FOREIGN KEY (`id_kendaraan`) REFERENCES `jenis_kendaraan` (`idkendaraan`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `harga_sparepart`
--
ALTER TABLE `harga_sparepart`
  ADD CONSTRAINT `harga_sparepart_ibfk_1` FOREIGN KEY (`idkendaraan`) REFERENCES `jenis_kendaraan` (`idkendaraan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `harga_sparepart_ibfk_2` FOREIGN KEY (`idsparepart`) REFERENCES `sparepart` (`idsparepart`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jenis_keluhan`
--
ALTER TABLE `jenis_keluhan`
  ADD CONSTRAINT `jenis_keluhan_ibfk_1` FOREIGN KEY (`idservis`) REFERENCES `servis` (`idservis`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jenis_keluhan_ibfk_2` FOREIGN KEY (`idsparepart`) REFERENCES `sparepart` (`idsparepart`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`idantrian`) REFERENCES `antrian` (`id_antrian`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`idsparepart`) REFERENCES `sparepart` (`idsparepart`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`idservis`) REFERENCES `servis` (`idservis`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_keluhan`
--
ALTER TABLE `transaksi_keluhan`
  ADD CONSTRAINT `transaksi_keluhan_ibfk_1` FOREIGN KEY (`idantrian`) REFERENCES `antrian` (`id_antrian`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_keluhan_ibfk_2` FOREIGN KEY (`idkeluhan`) REFERENCES `jenis_keluhan` (`idkeluhan`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
