-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 21 Agu 2023 pada 17.12
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
(1, 2, 20230821, 'Fillah Zaki Alhaqi', '085826389656', '2023-08-21 14:56:45', 'E 1234 ZN', 'Kuningan', 'Menunggu Antrian'),
(2, 5, 20230821, 'Zaki', '0895326850337', '2023-08-21 15:08:17', 'E 3456 PK', 'Cirebon', 'Menunggu Antrian'),
(3, 8, 20230821, 'Fillah', '0892891731111', '2023-08-21 15:09:05', 'E 9451 DF', 'Indramayu', 'Menunggu Antrian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_keluhan`
--

CREATE TABLE `jenis_keluhan` (
  `idjkeluhan` int(11) NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `idservis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `sparepart`
--

CREATE TABLE `sparepart` (
  `idsparepart` int(11) NOT NULL,
  `sparepart` varchar(50) NOT NULL,
  `harga` bigint(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`idjkeluhan`),
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
  ADD PRIMARY KEY (`idsparepart`);

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
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_keluhan`
--
ALTER TABLE `jenis_keluhan`
  MODIFY `idjkeluhan` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `idservis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `idsparepart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT;

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
