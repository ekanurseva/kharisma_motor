-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 30 Agu 2023 pada 18.43
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
  `no_antrian` int(20) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nopol` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `id_kendaraan`, `no_antrian`, `nama_pelanggan`, `no_hp`, `tanggal`, `nopol`, `alamat`, `status`) VALUES
(1, 1, 20230830, 'Fillah Zaki Alhaqi', '085826389656', '2023-08-30 15:12:02', 'E 3456 PK', 'Kuningan', 'Menunggu Antrian'),
(2, 1, 20230830, 'Fillah Zaki Alhaqi', '085826389656', '2023-08-30 16:00:45', 'E 3456 PK', 'sadasdasdasdsa', 'Menunggu Antrian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_keluhan`
--

CREATE TABLE `jenis_keluhan` (
  `idkeluhan` int(11) NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `idservis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_keluhan`
--

INSERT INTO `jenis_keluhan` (`idkeluhan`, `keluhan`, `idservis`) VALUES
(1, 'Performa mesin menurun', 2),
(2, 'Konsumsi bahan bakar tidak efisien', 2),
(3, 'Mesin terlalu panas', 2),
(4, 'Tidak ada respons saat akselerasi', 2),
(5, 'Mobil mogok saat dinyalakan', 2),
(6, 'Mesin mengeluarkan suara kasar', 2),
(7, 'Mobil menarik ke satu sisi saat menginjak rem', 3),
(8, 'Rem terlalu responsif atau terlalu kuat', 3),
(9, 'Rem mengeluarkan bau aneh', 3),
(10, 'Cairan rem bocor atau berkurang cepat', 3),
(11, 'Pedal rem keras dan sulit ditekan', 3),
(12, 'Rem terasa kurang responsif atau bunyi berdecit saat menginjak rem', 3),
(13, 'Jarak remot berfungsi terbatas', 4),
(14, 'Pintu tidak terkunci atau tidak terbuka saat remote digunakan', 4),
(15, 'Tombol remote tidak berfungsi tertentu', 4),
(16, 'Kesulitan menghubungkan remote dengan mobil', 4),
(17, 'Remote berfungsi sendiri tanpa ditekan', 4),
(18, 'Remote tidak berfungsi atau tidak dapat mengunci/membuka pintu', 4),
(19, 'Mobil miring atau condong ke satu sisi', 5),
(20, 'Ketinggian mobil tidak stabil', 5),
(21, 'Suspensi terasa kaku atau keras', 5),
(22, 'Bunyi berdecil atau berderit saat melewati jalan tidak rata', 5),
(23, 'Mobil terasa berguncang saat melewati jalan tidak rata', 5),
(24, 'Kaca tidak lurus saat dibuka atau ditutup', 6),
(25, 'Bunyi berisik saat kaca dibuka atau ditutup', 6),
(26, 'Kaca tidak dapat diangkat atau diturunkan dengan benar', 6),
(27, 'Lampu yang mati atau sistem kontrol yang tidak berfungsi', 8),
(28, 'Bemper berkarat', 9),
(29, 'Bemper tidak sejajar dengan bodinya', 9),
(30, 'Bemper rusak atau berlubang', 9),
(31, 'Bau terbakar dari bawah kap mobil', 10),
(32, 'Pedal kopling terasa berat atau tidak merespon', 10),
(33, 'Mobil bergoyang saat berpindah gigi', 11),
(34, 'Terdapat bising atau getaran saat mobil melaju di gigi tertentu', 11),
(35, 'Perpindahan gigi terasa kasar atau terjadi guncangan saat berpindah gigi', 11),
(36, 'Suara berisik atau getaran dari bagian gardan', 12),
(37, 'Mobil overheat', 13),
(38, 'Lampu indikator suhu menyala', 13),
(39, 'Sabuk pengaman kaku atau tidak dapat dikunci dengan benar', 14),
(40, 'Sistem audio mati atau kualitas suara buruk', 15),
(41, 'Bocor oli dari bagian silinder head', 16),
(42, 'Performa mesin menurun secara signifikan', 17),
(43, 'Mobil tidak mengarah lurus saat dikemudikan', 18),
(44, 'Performa mesin buruk', 19),
(45, 'Konsumsi bahan bakar tidak efisien', 19),
(46, 'Lampu indikator mesin menyala', 20),
(47, 'Performa mesin tidak seperti biasanya', 20),
(48, 'RPM naik turun tidak stabil', 20);

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
(15, 'Volkswagen Touran');

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
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `servis`
--

INSERT INTO `servis` (`idservis`, `jenis_servis`, `harga_jasa`, `deskripsi`) VALUES
(1, 'Servis Berkala (tanpa pergantian part)', 150000, 'asdasd'),
(2, 'Servis Tune Up Mesin', 200000, 'asdasd'),
(3, 'Servis Rem', 200000, 'asdasdasd'),
(4, 'Servis Kelistrikan Remot', 250000, 'asdasdasd'),
(5, 'Servis Kaki-Kaki', 350000, 'asdassdasd'),
(6, 'Servis Kaca (Power Window)', 200000, 'asdasdasd'),
(7, 'Servis Dynamo', 500000, 'asdasdasd'),
(8, 'Servis Seluruh Kelistrikan', 550000, 'assdassdasd'),
(9, 'Servis Bemper', 150000, 'asdasdasd'),
(10, 'Servis Kopling', 400000, 'adadasd'),
(11, 'Servis Transmisi (Gigi)', 450000, 'asdasdasd'),
(12, 'Servis Gardan', 300000, 'asdaasd'),
(13, 'Servis Radiator', 250000, 'asdsadas'),
(14, 'Servis Sabuk Pengaman', 100000, 'asdasdasd'),
(15, 'Servis Audio', 200000, 'asdasdad'),
(16, 'Servis Mesin (Silinder Head)', 800000, 'asdadasd'),
(17, 'Servis Overhoul', 2000000, 'asdsd'),
(18, 'Spooring', 150000, 'asdasdasd'),
(19, 'Servis Per', 300000, 'asdasd'),
(20, 'Scanning', 100000, 'asdasdasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sparepart`
--

CREATE TABLE `sparepart` (
  `idsparepart` int(11) NOT NULL,
  `idkendaraan` int(11) NOT NULL,
  `sparepart` varchar(50) NOT NULL,
  `harga` bigint(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sparepart`
--

INSERT INTO `sparepart` (`idsparepart`, `idkendaraan`, `sparepart`, `harga`, `deskripsi`) VALUES
(1, 1, 'Fullset Engine', 1450000, 'asdasdasd'),
(2, 1, 'Gasket Cylinder Head', 200000, 'asdasdasd'),
(3, 1, 'Gasket Cover Cylinder Head', 112000, 'asdasdasd'),
(4, 1, 'Tutup Timing Chain', 1550000, 'asdasdasd'),
(5, 1, 'Engine Mounting Kanan/Kiri', 455000, 'asdasdasd'),
(6, 1, 'Engine Mounting Belakang', 475000, 'asdasdasd'),
(7, 1, 'Ring Piston/Seker (Ukuran Standar)', 430000, 'asdasdasd'),
(8, 1, 'Piston/Seker & Pen (Ukuran Standar)', 285000, 'asdasdasd'),
(9, 1, 'Pulley AS Crank', 350000, 'asdasdasd'),
(10, 1, 'Timing Chain', 660000, 'asdasdasd'),
(11, 1, 'Saringan Oli', 27000, 'asdasdasd'),
(12, 1, 'Kerodong & Kipas Radiator', 810000, 'asdasdasd'),
(13, 1, 'Radiator', 1400000, 'asdasdasd'),
(14, 1, 'Saringan Udara', 155000, 'asdasdasd'),
(15, 1, 'Koil', 235000, 'asdasdasd'),
(16, 1, 'Van Belt', 135000, 'asdasdasd'),
(17, 1, 'Busi', 90000, 'asdasdasd'),
(18, 1, 'Sensor ISC', 550000, 'asdasdasd'),
(19, 1, 'Injektor', 150000, 'asdasdasd'),
(20, 1, 'Thermostat', 250000, 'asdasdasd'),
(21, 1, 'Metal', 150000, 'asdasdasd'),
(22, 1, 'karet kaliper', 100000, 'asdasdasd'),
(23, 1, 'boster rem', 600000, 'asdasdasd'),
(24, 1, 'karet rem', 20000, 'asdasdasd'),
(25, 1, 'kanvas rem', 250000, 'asdasdasd'),
(26, 1, 'baterai remote', 55000, 'asdasdasd'),
(27, 1, 'door lock', 170000, 'asdasdasd'),
(28, 1, 'remote', 300000, 'asdasdasd'),
(29, 1, 'module remote', 800000, 'asdasdasd'),
(30, 1, 'per', 215000, 'asdasdasd'),
(31, 1, 'shockbreaker', 400000, 'asdasdasd'),
(32, 1, 'ball joint', 225000, 'asdasdasd'),
(33, 1, 'bantalan suspensi', 80000, 'asdasdasd'),
(34, 1, 'regulator kaca', 250000, 'asdasdasd'),
(35, 1, 'dinamo ampere', 950000, 'asdasdasd'),
(36, 1, 'gulungan dinamo', 300000, 'asdasdasd'),
(37, 1, 'belt dinamo', 75000, 'asdasdasd'),
(38, 1, 'bohlam', 50000, 'asdasdasd'),
(39, 1, 'body repair', 2500000, 'asdasdasd'),
(40, 1, 'ripet body', 15000, 'asdasdasd'),
(41, 1, 'kabel body', 250000, 'asdasdasd'),
(42, 1, 'bumper', 700000, 'asdasdasd'),
(43, 1, 'kopling set', 1500000, 'asdasdasd'),
(44, 1, 'kampas kopling', 500000, 'asdasdasd'),
(45, 1, 'gigi', 800000, 'asdasdasd'),
(46, 1, 'master kopling', 450000, 'asdasdasd'),
(47, 1, 'oli gardan', 80000, 'asdasdasd'),
(48, 1, 'paking head', 300000, 'asdasdasd'),
(49, 1, 'master rem', 150000, 'asdasdasd'),
(50, 1, 'speaker', 200000, 'asdasdasd'),
(51, 1, 'tie rod', 200000, 'asdasdasd'),
(52, 1, 'Kipas Radiator', 215000, 'asdasdasd'),
(53, 2, 'Fullset Engine', 1550000, 'asdasdasd'),
(54, 2, 'Gasket Cylinder Head', 270000, 'asdasdasd'),
(55, 2, 'Gasket Cover Cylinder Head', 117000, 'asdasdasd'),
(56, 2, 'Tutup Timing Chain', 1560000, 'asdasdasd'),
(57, 2, 'Engine Mounting Kanan/Kiri', 555000, 'asdasdasd'),
(58, 2, 'Engine Mounting Belakang', 475050, 'asdasdasd'),
(59, 2, 'Ring Piston/Seker (Ukuran Standar)', 430000, 'asdasdasd'),
(60, 2, 'Piston/Seker & Pen (Ukuran Standar)', 285500, 'asdasdasd'),
(61, 2, 'Pulley AS Crank', 390000, 'asdasdasd'),
(62, 2, 'Timing Chain', 700000, 'asdasdasd'),
(63, 2, 'Saringan Oli', 40000, 'asdasdasd'),
(64, 2, 'Kerodong & Kipas Radiator', 810000, 'asdasdasd'),
(65, 2, 'Radiator', 1400000, 'asdasdasd'),
(66, 2, 'Saringan Udara', 175000, 'asdasdasd'),
(67, 2, 'Koil', 235000, 'asdasdasd'),
(68, 2, 'Van Belt', 135000, 'asdasdasd'),
(69, 2, 'Busi', 100000, 'asdasdasd'),
(70, 2, 'Sensor ISC', 550000, 'asdasdasd'),
(71, 2, 'Injektor', 150000, 'asdasdasd'),
(72, 2, 'Thermostat', 250000, 'asdasdasd'),
(73, 2, 'Metal', 150000, 'asdasdasd'),
(74, 2, 'karet kaliper', 100000, 'asdasdasd'),
(75, 2, 'boster rem', 600000, 'asdasdasd'),
(76, 2, 'karet rem', 20000, 'asdasdasd'),
(77, 2, 'kanvas rem', 250000, 'asdasdasd'),
(78, 2, 'baterai remote', 55000, 'asdasdasd'),
(79, 2, 'door lock', 170000, 'asdasdasd'),
(80, 2, 'remote', 300000, 'asdasdasd'),
(81, 2, 'module remote', 800000, 'asdasdasd'),
(82, 2, 'per', 215000, 'asdasdasd'),
(83, 2, 'shockbreaker', 400000, 'asdasdasd'),
(84, 2, 'ball joint', 225000, 'asdasdasd'),
(85, 2, 'bantalan suspensi', 80000, 'asdasdasd'),
(86, 2, 'regulator kaca', 250000, 'asdasdasd'),
(87, 2, 'dinamo ampere', 950000, 'asdasdasd'),
(88, 2, 'gulungan dinamo', 300000, 'asdasdasd'),
(89, 2, 'belt dinamo', 75000, 'asdasdasd'),
(90, 2, 'bohlam', 50000, 'asdasdasd'),
(91, 2, 'body repair', 2500000, 'asdasdasd'),
(92, 2, 'ripet body', 15000, 'asdasdasd'),
(93, 2, 'kabel body', 250000, 'asdasdasd'),
(94, 2, 'bumper', 700000, 'asdasdasd'),
(95, 2, 'kopling set', 1500000, 'asdasdasd'),
(96, 2, 'kampas kopling', 500000, 'asdasdasd'),
(97, 2, 'gigi', 800000, 'asdasdasd'),
(98, 2, 'master kopling', 450000, 'asdasdasd'),
(99, 2, 'oli gardan', 80000, 'asdasdasd'),
(100, 2, 'paking head', 300000, 'asdasdasd'),
(101, 2, 'master rem', 150000, 'asdasdasd'),
(102, 2, 'speaker', 200000, 'asdasdasd'),
(103, 2, 'tie rod', 200000, 'asdasdasd'),
(104, 2, 'Kipas Radiator', 215000, 'asdasdasd');

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
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_transaksi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `idantrian`, `idservis`, `idsparepart`, `kode_transaksi`, `tanggal`, `status_transaksi`) VALUES
(1, 2, 1, NULL, 'T-20230830-1', '2023-08-30 16:39:27', 'Belum'),
(2, 2, 2, NULL, 'T-20230830-1', '2023-08-30 16:39:27', 'Belum'),
(3, 2, 3, NULL, 'T-20230830-1', '2023-08-30 16:39:27', 'Belum');

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
-- Indeks untuk tabel `jenis_keluhan`
--
ALTER TABLE `jenis_keluhan`
  ADD PRIMARY KEY (`idkeluhan`),
  ADD KEY `jenis_keluhan_ibfk_1` (`idservis`);

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
  ADD PRIMARY KEY (`idsparepart`),
  ADD KEY `idkendaraan` (`idkendaraan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `transaksi_ibfk_1` (`idantrian`),
  ADD KEY `idservis` (`idservis`),
  ADD KEY `idsparepart` (`idsparepart`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenis_keluhan`
--
ALTER TABLE `jenis_keluhan`
  MODIFY `idkeluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  MODIFY `idkendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `idsparepart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `antrian_ibfk_1` FOREIGN KEY (`id_kendaraan`) REFERENCES `jenis_kendaraan` (`idkendaraan`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jenis_keluhan`
--
ALTER TABLE `jenis_keluhan`
  ADD CONSTRAINT `jenis_keluhan_ibfk_1` FOREIGN KEY (`idservis`) REFERENCES `servis` (`idservis`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sparepart`
--
ALTER TABLE `sparepart`
  ADD CONSTRAINT `sparepart_ibfk_1` FOREIGN KEY (`idkendaraan`) REFERENCES `jenis_kendaraan` (`idkendaraan`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`idantrian`) REFERENCES `antrian` (`id_antrian`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`idservis`) REFERENCES `servis` (`idservis`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`idsparepart`) REFERENCES `sparepart` (`idsparepart`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
