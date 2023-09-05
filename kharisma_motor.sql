-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Sep 2023 pada 13.55
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `id_kendaraan`, `no_antrian`, `nama_pelanggan`, `no_hp`, `tanggal`, `nopol`, `alamat`, `status`) VALUES
(1, 1, '20230902_1', 'User', '085826389656', '2023-09-02 15:13:50', 'E 1234 ZN', 'Kuningan', 'Selesai'),
(2, 2, '20230902_2', 'Sukiman', '082312321312', '2023-09-02 14:27:09', 'E 3456 PK', 'asdsadasd', 'Selesai'),
(3, 1, '20230902_3', 'Sukijan', '0892891731111', '2023-09-02 15:16:45', 'E 9451 DF', 'asdasdasd', 'Selesai'),
(4, 1, '20230903_1', 'Malika Surya', '085324567483', '2023-09-03 15:42:50', 'E1209AE', 'Cirebon', 'Menunggu Antrian'),
(5, 2, '20230903_2', 'Eka Nurseva', '085324567483', '2023-09-03 15:47:33', 'E1209AE', 'Cirebon', 'Selesai'),
(6, 1, '20230903_3', 'User2', '087656793238', '2023-09-03 16:52:27', 'E9831DF', 'Cirebon', 'Selesai'),
(7, 1, '20230904_1', 'Users 3', '085324567483', '2023-09-04 08:15:42', 'E9192DC', 'Cirebon', 'Selesai'),
(8, 1, '20230904_2', 'User 4', '08891236112', '2023-09-04 08:16:46', 'E1209AD', 'Cirebon', 'Selesai'),
(9, 2, '20230904_3', 'User 4', '08891236112', '2023-09-04 08:17:47', 'E1209AD', 'Cirebon', 'Menunggu Antrian'),
(10, 1, '20230904_4', 'User 4', '08891236112', '2023-09-04 08:23:05', 'E1279NM', 'Kuningan', 'Menunggu Antrian'),
(11, 2, '20230904_5', 'User 5', '083912731', '2023-09-04 08:39:11', 'D4J86GH', 'Bandung', 'Menunggu Antrian'),
(12, 22, '20230905_1', 'Eka Nurseva', '0897312631', '2023-09-05 11:27:46', 'E9001DC', 'Cirebon', 'Menunggu Antrian'),
(13, 9, '20230905_2', 'Eka', '087656793238', '2023-09-05 11:33:49', 'E2109AC', 'Indramayu', 'Menunggu Antrian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_sparepart`
--

CREATE TABLE `harga_sparepart` (
  `idharga` int(11) NOT NULL,
  `idkendaraan` int(11) NOT NULL,
  `idsparepart` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(110, 1, 55, 200000),
(112, 3, 1, 1500000),
(113, 3, 2, 300000),
(114, 3, 3, 118000),
(115, 3, 4, 1760000),
(116, 3, 5, 755000),
(117, 3, 6, 470050),
(118, 3, 7, 450000),
(119, 3, 8, 289500),
(120, 3, 9, 410000),
(121, 3, 10, 850000),
(122, 3, 11, 38000),
(123, 3, 12, 910000),
(124, 3, 13, 1620000),
(125, 3, 14, 195000),
(126, 3, 15, 290000),
(127, 3, 16, 187000),
(128, 3, 17, 109000),
(129, 3, 18, 820000),
(130, 3, 19, 190000),
(131, 3, 20, 270000),
(132, 3, 21, 156000),
(133, 3, 22, 111000),
(134, 3, 23, 698000),
(135, 3, 24, 25000),
(136, 3, 25, 550000),
(137, 3, 26, 85000),
(138, 3, 27, 181000),
(139, 3, 28, 350000),
(140, 3, 29, 900000),
(141, 3, 30, 300000),
(142, 3, 31, 430000),
(143, 3, 32, 230000),
(144, 3, 33, 90000),
(145, 3, 34, 250000),
(146, 3, 35, 950000),
(147, 3, 36, 400000),
(148, 3, 37, 87000),
(149, 3, 38, 70000),
(150, 3, 39, 2800000),
(151, 3, 40, 30000),
(152, 3, 41, 300000),
(153, 3, 42, 800000),
(154, 3, 43, 1700000),
(155, 3, 44, 580000),
(156, 3, 45, 900000),
(157, 3, 46, 500000),
(158, 3, 47, 100000),
(159, 3, 48, 400000),
(160, 3, 49, 180000),
(161, 3, 50, 300000),
(162, 3, 51, 310000),
(163, 3, 52, 227000),
(216, 4, 1, 1500000),
(217, 4, 2, 300000),
(218, 4, 3, 118000),
(219, 4, 4, 1760000),
(220, 4, 5, 755000),
(221, 4, 6, 470050),
(222, 4, 7, 450000),
(223, 4, 8, 289500),
(224, 4, 9, 410000),
(225, 4, 10, 850000),
(226, 4, 11, 38000),
(227, 4, 12, 910000),
(228, 4, 13, 1620000),
(229, 4, 14, 195000),
(230, 4, 15, 290000),
(231, 4, 16, 187000),
(232, 4, 17, 109000),
(233, 4, 18, 820000),
(234, 4, 19, 190000),
(235, 4, 20, 270000),
(236, 4, 21, 156000),
(237, 4, 22, 111000),
(238, 4, 23, 698000),
(239, 4, 24, 25000),
(240, 4, 25, 550000),
(241, 4, 26, 85000),
(242, 4, 27, 181000),
(243, 4, 28, 350000),
(244, 4, 29, 900000),
(245, 4, 30, 300000),
(246, 4, 31, 430000),
(247, 4, 32, 230000),
(248, 4, 33, 90000),
(249, 4, 34, 250000),
(250, 4, 35, 950000),
(251, 4, 36, 400000),
(252, 4, 37, 87000),
(253, 4, 38, 70000),
(254, 4, 39, 2800000),
(255, 4, 40, 30000),
(256, 4, 41, 300000),
(257, 4, 42, 800000),
(258, 4, 43, 1700000),
(259, 4, 44, 580000),
(260, 4, 45, 900000),
(261, 4, 46, 500000),
(262, 4, 47, 100000),
(263, 4, 48, 400000),
(264, 4, 49, 180000),
(265, 4, 50, 300000),
(266, 4, 51, 310000),
(267, 4, 52, 227000),
(268, 5, 1, 1500000),
(269, 5, 2, 300000),
(270, 5, 3, 118000),
(271, 5, 4, 1760000),
(272, 5, 5, 755000),
(273, 5, 6, 470050),
(274, 5, 7, 450000),
(275, 5, 8, 289500),
(276, 5, 9, 410000),
(277, 5, 10, 850000),
(278, 5, 11, 38000),
(279, 5, 12, 910000),
(280, 5, 13, 1620000),
(281, 5, 14, 195000),
(282, 5, 15, 290000),
(283, 5, 16, 187000),
(284, 5, 17, 109000),
(285, 5, 18, 820000),
(286, 5, 19, 190000),
(287, 5, 20, 270000),
(288, 5, 21, 156000),
(289, 5, 22, 111000),
(290, 5, 23, 698000),
(291, 5, 24, 25000),
(292, 5, 25, 550000),
(293, 5, 26, 85000),
(294, 5, 27, 181000),
(295, 5, 28, 350000),
(296, 5, 29, 900000),
(297, 5, 30, 300000),
(298, 5, 31, 430000),
(299, 5, 32, 230000),
(300, 5, 33, 90000),
(301, 5, 34, 250000),
(302, 5, 35, 950000),
(303, 5, 36, 400000),
(304, 5, 37, 87000),
(305, 5, 38, 70000),
(306, 5, 39, 2800000),
(307, 5, 40, 30000),
(308, 5, 41, 300000),
(309, 5, 42, 800000),
(310, 5, 43, 1700000),
(311, 5, 44, 580000),
(312, 5, 45, 900000),
(313, 5, 46, 500000),
(314, 5, 47, 100000),
(315, 5, 48, 400000),
(316, 5, 49, 180000),
(317, 5, 50, 300000),
(318, 5, 51, 310000),
(319, 5, 52, 227000),
(320, 6, 1, 1500000),
(321, 6, 2, 300000),
(322, 6, 3, 118000),
(323, 6, 4, 1760000),
(324, 6, 5, 755000),
(325, 6, 6, 470050),
(326, 6, 7, 450000),
(327, 6, 8, 289500),
(328, 6, 9, 410000),
(329, 6, 10, 850000),
(330, 6, 11, 38000),
(331, 6, 12, 910000),
(332, 6, 13, 1620000),
(333, 6, 14, 195000),
(334, 6, 15, 290000),
(335, 6, 16, 187000),
(336, 6, 17, 109000),
(337, 6, 18, 820000),
(338, 6, 19, 190000),
(339, 6, 20, 270000),
(340, 6, 21, 156000),
(341, 6, 22, 111000),
(342, 6, 23, 698000),
(343, 6, 24, 25000),
(344, 6, 25, 550000),
(345, 6, 26, 85000),
(346, 6, 27, 181000),
(347, 6, 28, 350000),
(348, 6, 29, 900000),
(349, 6, 30, 300000),
(350, 6, 31, 430000),
(351, 6, 32, 230000),
(352, 6, 33, 90000),
(353, 6, 34, 250000),
(354, 6, 35, 950000),
(355, 6, 36, 400000),
(356, 6, 37, 87000),
(357, 6, 38, 70000),
(358, 6, 39, 2800000),
(359, 6, 40, 30000),
(360, 6, 41, 300000),
(361, 6, 42, 800000),
(362, 6, 43, 1700000),
(363, 6, 44, 580000),
(364, 6, 45, 900000),
(365, 6, 46, 500000),
(366, 6, 47, 100000),
(367, 6, 48, 400000),
(368, 6, 49, 180000),
(369, 6, 50, 300000),
(370, 6, 51, 310000),
(371, 6, 52, 227000),
(372, 9, 1, 1450000),
(373, 9, 2, 400000),
(374, 9, 3, 130000),
(375, 9, 4, 1900000),
(376, 9, 5, 655000),
(377, 9, 6, 870050),
(378, 9, 7, 550000),
(379, 9, 8, 290500),
(380, 9, 9, 510000),
(381, 9, 10, 890000),
(382, 9, 11, 49000),
(383, 9, 12, 930000),
(384, 9, 13, 2620000),
(385, 9, 14, 195000),
(386, 9, 15, 300000),
(387, 9, 16, 197000),
(388, 9, 17, 129000),
(389, 9, 18, 860000),
(390, 9, 19, 290000),
(391, 9, 20, 300000),
(392, 9, 21, 256000),
(393, 9, 22, 211000),
(394, 9, 23, 700000),
(395, 9, 24, 45000),
(396, 9, 25, 560000),
(397, 9, 26, 55000),
(398, 9, 27, 191000),
(399, 9, 28, 390000),
(400, 9, 29, 950000),
(401, 9, 30, 350000),
(402, 9, 31, 490000),
(403, 9, 32, 280000),
(404, 9, 33, 95000),
(405, 9, 34, 290000),
(406, 9, 35, 990000),
(407, 9, 36, 490000),
(408, 9, 37, 90000),
(409, 9, 38, 80000),
(410, 9, 39, 3800000),
(411, 9, 40, 50000),
(412, 9, 41, 400000),
(413, 9, 42, 900000),
(414, 9, 43, 1790000),
(415, 9, 44, 589000),
(416, 9, 45, 910000),
(417, 9, 46, 520000),
(418, 9, 47, 140000),
(419, 9, 48, 460000),
(420, 9, 49, 190000),
(421, 9, 50, 390000),
(422, 9, 51, 330000),
(423, 9, 52, 297000),
(424, 17, 1, 1450000),
(425, 17, 2, 400000),
(426, 17, 3, 130000),
(427, 17, 4, 1900000),
(428, 17, 5, 655000),
(429, 17, 6, 870050),
(430, 17, 7, 550000),
(431, 17, 8, 290500),
(432, 17, 9, 510000),
(433, 17, 10, 890000),
(434, 17, 11, 49000),
(435, 17, 12, 930000),
(436, 17, 13, 2620000),
(437, 17, 14, 195000),
(438, 17, 15, 300000),
(439, 17, 16, 197000),
(440, 17, 17, 129000),
(441, 17, 18, 860000),
(442, 17, 19, 290000),
(443, 17, 20, 300000),
(444, 17, 21, 256000),
(445, 17, 22, 211000),
(446, 17, 23, 700000),
(447, 17, 24, 45000),
(448, 17, 25, 560000),
(449, 17, 26, 55000),
(450, 17, 27, 191000),
(451, 17, 28, 390000),
(452, 17, 29, 950000),
(453, 17, 30, 350000),
(454, 17, 31, 490000),
(455, 17, 32, 280000),
(456, 17, 33, 95000),
(457, 17, 34, 290000),
(458, 17, 35, 990000),
(459, 17, 36, 490000),
(460, 17, 37, 90000),
(461, 17, 38, 80000),
(462, 17, 39, 3800000),
(463, 17, 40, 50000),
(464, 17, 41, 400000),
(465, 17, 42, 900000),
(466, 17, 43, 1790000),
(467, 17, 44, 589000),
(468, 17, 45, 910000),
(469, 17, 46, 520000),
(470, 17, 47, 140000),
(471, 17, 48, 460000),
(472, 17, 49, 190000),
(473, 17, 50, 390000),
(474, 17, 51, 330000),
(475, 17, 52, 297000),
(476, 24, 1, 1500000),
(477, 24, 2, 300000),
(478, 24, 3, 118000),
(479, 24, 4, 1760000),
(480, 24, 5, 755000),
(481, 24, 6, 470050),
(482, 24, 7, 450000),
(483, 24, 8, 289500),
(484, 24, 9, 410000),
(485, 24, 10, 850000),
(486, 24, 11, 38000),
(487, 24, 12, 910000),
(488, 24, 13, 1620000),
(489, 24, 14, 195000),
(490, 24, 15, 290000),
(491, 24, 16, 187000),
(492, 24, 17, 109000),
(493, 24, 18, 820000),
(494, 24, 19, 190000),
(495, 24, 20, 270000),
(496, 24, 21, 156000),
(497, 24, 22, 111000),
(498, 24, 23, 698000),
(499, 24, 24, 25000),
(500, 24, 25, 550000),
(501, 24, 26, 85000),
(502, 24, 27, 181000),
(503, 24, 28, 350000),
(504, 24, 29, 900000),
(505, 24, 30, 300000),
(506, 24, 31, 430000),
(507, 24, 32, 230000),
(508, 24, 33, 90000),
(509, 24, 34, 250000),
(510, 24, 35, 950000),
(511, 24, 36, 400000),
(512, 24, 37, 87000),
(513, 24, 38, 70000),
(514, 24, 39, 2800000),
(515, 24, 40, 30000),
(516, 24, 41, 300000),
(517, 24, 42, 800000),
(518, 24, 43, 1700000),
(519, 24, 44, 580000),
(520, 24, 45, 900000),
(521, 24, 46, 500000),
(522, 24, 47, 100000),
(523, 24, 48, 400000),
(524, 24, 49, 180000),
(525, 24, 50, 300000),
(526, 24, 51, 310000),
(527, 24, 52, 227000),
(528, 26, 1, 1500000),
(529, 26, 2, 300000),
(530, 26, 3, 118000),
(531, 26, 4, 1760000),
(532, 26, 5, 755000),
(533, 26, 6, 470050),
(534, 26, 7, 450000),
(535, 26, 8, 289500),
(536, 26, 9, 410000),
(537, 26, 10, 850000),
(538, 26, 11, 38000),
(539, 26, 12, 910000),
(540, 26, 13, 1620000),
(541, 26, 14, 195000),
(542, 26, 15, 290000),
(543, 26, 16, 187000),
(544, 26, 17, 109000),
(545, 26, 18, 820000),
(546, 26, 19, 190000),
(547, 26, 20, 270000),
(548, 26, 21, 156000),
(549, 26, 22, 111000),
(550, 26, 23, 698000),
(551, 26, 24, 25000),
(552, 26, 25, 550000),
(553, 26, 26, 85000),
(554, 26, 27, 181000),
(555, 26, 28, 350000),
(556, 26, 29, 900000),
(557, 26, 30, 300000),
(558, 26, 31, 430000),
(559, 26, 32, 230000),
(560, 26, 33, 90000),
(561, 26, 34, 250000),
(562, 26, 35, 950000),
(563, 26, 36, 400000),
(564, 26, 37, 87000),
(565, 26, 38, 70000),
(566, 26, 39, 2800000),
(567, 26, 40, 30000),
(568, 26, 41, 300000),
(569, 26, 42, 800000),
(570, 26, 43, 1700000),
(571, 26, 44, 580000),
(572, 26, 45, 900000),
(573, 26, 46, 500000),
(574, 26, 47, 100000),
(575, 26, 48, 400000),
(576, 26, 49, 180000),
(577, 26, 50, 300000),
(578, 26, 51, 310000),
(579, 26, 52, 227000),
(580, 27, 1, 1500000),
(581, 27, 2, 300000),
(582, 27, 3, 118000),
(583, 27, 4, 1760000),
(584, 27, 5, 755000),
(585, 27, 6, 470050),
(586, 27, 7, 450000),
(587, 27, 8, 289500),
(588, 27, 9, 410000),
(589, 27, 10, 850000),
(590, 27, 11, 38000),
(591, 27, 12, 910000),
(592, 27, 13, 1620000),
(593, 27, 14, 195000),
(594, 27, 15, 290000),
(595, 27, 16, 187000),
(596, 27, 17, 109000),
(597, 27, 18, 820000),
(598, 27, 19, 190000),
(599, 27, 20, 270000),
(600, 27, 21, 156000),
(601, 27, 22, 111000),
(602, 27, 23, 698000),
(603, 27, 24, 25000),
(604, 27, 25, 550000),
(605, 27, 26, 85000),
(606, 27, 27, 181000),
(607, 27, 28, 350000),
(608, 27, 29, 900000),
(609, 27, 30, 300000),
(610, 27, 31, 430000),
(611, 27, 32, 230000),
(612, 27, 33, 90000),
(613, 27, 34, 250000),
(614, 27, 35, 950000),
(615, 27, 36, 400000),
(616, 27, 37, 87000),
(617, 27, 38, 70000),
(618, 27, 39, 2800000),
(619, 27, 40, 30000),
(620, 27, 41, 300000),
(621, 27, 42, 800000),
(622, 27, 43, 1700000),
(623, 27, 44, 580000),
(624, 27, 45, 900000),
(625, 27, 46, 500000),
(626, 27, 47, 100000),
(627, 27, 48, 400000),
(628, 27, 49, 180000),
(629, 27, 50, 300000),
(630, 27, 51, 310000),
(631, 27, 52, 227000),
(632, 22, 1, 1500000),
(633, 22, 2, 300000),
(634, 22, 3, 118000),
(635, 22, 4, 1760000),
(636, 22, 5, 755000),
(637, 22, 6, 470050),
(638, 22, 7, 450000),
(639, 22, 8, 289500),
(640, 22, 9, 410000),
(641, 22, 10, 850000),
(642, 22, 11, 38000),
(643, 22, 12, 910000),
(644, 22, 13, 1620000),
(645, 22, 14, 195000),
(646, 22, 15, 290000),
(647, 22, 16, 187000),
(648, 22, 17, 109000),
(649, 22, 18, 820000),
(650, 22, 19, 190000),
(651, 22, 20, 270000),
(652, 22, 21, 156000),
(653, 22, 22, 111000),
(654, 22, 23, 698000),
(655, 22, 24, 25000),
(656, 22, 25, 550000),
(657, 22, 26, 85000),
(658, 22, 27, 181000),
(659, 22, 28, 350000),
(660, 22, 29, 900000),
(661, 22, 30, 300000),
(662, 22, 31, 430000),
(663, 22, 32, 230000),
(664, 22, 33, 90000),
(665, 22, 34, 250000),
(666, 22, 35, 950000),
(667, 22, 36, 400000),
(668, 22, 37, 87000),
(669, 22, 38, 70000),
(670, 22, 39, 2800000),
(671, 22, 40, 30000),
(672, 22, 41, 300000),
(673, 22, 42, 800000),
(674, 22, 43, 1700000),
(675, 22, 44, 580000),
(676, 22, 45, 900000),
(677, 22, 46, 500000),
(678, 22, 47, 100000),
(679, 22, 48, 400000),
(680, 22, 49, 180000),
(681, 22, 50, 300000),
(682, 22, 51, 310000),
(683, 22, 52, 227000),
(684, 21, 1, 1500000),
(685, 21, 2, 300000),
(686, 21, 3, 118000),
(687, 21, 4, 1760000),
(688, 21, 5, 755000),
(689, 21, 6, 470050),
(690, 21, 7, 450000),
(691, 21, 8, 289500),
(692, 21, 9, 410000),
(693, 21, 10, 850000),
(694, 21, 11, 38000),
(695, 21, 12, 910000),
(696, 21, 13, 1620000),
(697, 21, 14, 195000),
(698, 21, 15, 290000),
(699, 21, 16, 187000),
(700, 21, 17, 109000),
(701, 21, 18, 820000),
(702, 21, 19, 190000),
(703, 21, 20, 270000),
(704, 21, 21, 156000),
(705, 21, 22, 111000),
(706, 21, 23, 698000),
(707, 21, 24, 25000),
(708, 21, 25, 550000),
(709, 21, 26, 85000),
(710, 21, 27, 181000),
(711, 21, 28, 350000),
(712, 21, 29, 900000),
(713, 21, 30, 300000),
(714, 21, 31, 430000),
(715, 21, 32, 230000),
(716, 21, 33, 90000),
(717, 21, 34, 250000),
(718, 21, 35, 950000),
(719, 21, 36, 400000),
(720, 21, 37, 87000),
(721, 21, 38, 70000),
(722, 21, 39, 2800000),
(723, 21, 40, 30000),
(724, 21, 41, 300000),
(725, 21, 42, 800000),
(726, 21, 43, 1700000),
(727, 21, 44, 580000),
(728, 21, 45, 900000),
(729, 21, 46, 500000),
(730, 21, 47, 100000),
(731, 21, 48, 400000),
(732, 21, 49, 180000),
(733, 21, 50, 300000),
(734, 21, 51, 310000),
(735, 21, 52, 227000),
(736, 23, 1, 1500000),
(737, 23, 2, 300000),
(738, 23, 3, 118000),
(739, 23, 4, 1760000),
(740, 23, 5, 755000),
(741, 23, 6, 470050),
(742, 23, 7, 450000),
(743, 23, 8, 289500),
(744, 23, 9, 410000),
(745, 23, 10, 850000),
(746, 23, 11, 38000),
(747, 23, 12, 910000),
(748, 23, 13, 1620000),
(749, 23, 14, 195000),
(750, 23, 15, 290000),
(751, 23, 16, 187000),
(752, 23, 17, 109000),
(753, 23, 18, 820000),
(754, 23, 19, 190000),
(755, 23, 20, 270000),
(756, 23, 21, 156000),
(757, 23, 22, 111000),
(758, 23, 23, 698000),
(759, 23, 24, 25000),
(760, 23, 25, 550000),
(761, 23, 26, 85000),
(762, 23, 27, 181000),
(763, 23, 28, 350000),
(764, 23, 29, 900000),
(765, 23, 30, 300000),
(766, 23, 31, 430000),
(767, 23, 32, 230000),
(768, 23, 33, 90000),
(769, 23, 34, 250000),
(770, 23, 35, 950000),
(771, 23, 36, 400000),
(772, 23, 37, 87000),
(773, 23, 38, 70000),
(774, 23, 39, 2800000),
(775, 23, 40, 30000),
(776, 23, 41, 300000),
(777, 23, 42, 800000),
(778, 23, 43, 1700000),
(779, 23, 44, 580000),
(780, 23, 45, 900000),
(781, 23, 46, 500000),
(782, 23, 47, 100000),
(783, 23, 48, 400000),
(784, 23, 49, 180000),
(785, 23, 50, 300000),
(786, 23, 51, 310000),
(787, 23, 52, 227000),
(788, 23, 1, 1500000),
(789, 23, 2, 300000),
(790, 23, 3, 118000),
(791, 23, 4, 1760000),
(792, 23, 5, 755000),
(793, 23, 6, 470050),
(794, 23, 7, 450000),
(795, 23, 8, 289500),
(796, 23, 9, 410000),
(797, 23, 10, 850000),
(798, 23, 11, 38000),
(799, 23, 12, 910000),
(800, 23, 13, 1620000),
(801, 23, 14, 195000),
(802, 23, 15, 290000),
(803, 23, 16, 187000),
(804, 23, 17, 109000),
(805, 23, 18, 820000),
(806, 23, 19, 190000),
(807, 23, 20, 270000),
(808, 23, 21, 156000),
(809, 23, 22, 111000),
(810, 23, 23, 698000),
(811, 23, 24, 25000),
(812, 23, 25, 550000),
(813, 23, 26, 85000),
(814, 23, 27, 181000),
(815, 23, 28, 350000),
(816, 23, 29, 900000),
(817, 23, 30, 300000),
(818, 23, 31, 430000),
(819, 23, 32, 230000),
(820, 23, 33, 90000),
(821, 23, 34, 250000),
(822, 23, 35, 950000),
(823, 23, 36, 400000),
(824, 23, 37, 87000),
(825, 23, 38, 70000),
(826, 23, 39, 2800000),
(827, 23, 40, 30000),
(828, 23, 41, 300000),
(829, 23, 42, 800000),
(830, 23, 43, 1700000),
(831, 23, 44, 580000),
(832, 23, 45, 900000),
(833, 23, 46, 500000),
(834, 23, 47, 100000),
(835, 23, 48, 400000),
(836, 23, 49, 180000),
(837, 23, 50, 300000),
(838, 23, 51, 310000),
(839, 23, 52, 227000),
(840, 25, 1, 1500000),
(841, 25, 2, 300000),
(842, 25, 3, 118000),
(843, 25, 4, 1760000),
(844, 25, 5, 755000),
(845, 25, 6, 470050),
(846, 25, 7, 450000),
(847, 25, 8, 289500),
(848, 25, 9, 410000),
(849, 25, 10, 850000),
(850, 25, 11, 38000),
(851, 25, 12, 910000),
(852, 25, 13, 1620000),
(853, 25, 14, 195000),
(854, 25, 15, 290000),
(855, 25, 16, 187000),
(856, 25, 17, 109000),
(857, 25, 18, 820000),
(858, 25, 19, 190000),
(859, 25, 20, 270000),
(860, 25, 21, 156000),
(861, 25, 22, 111000),
(862, 25, 23, 698000),
(863, 25, 24, 25000),
(864, 25, 25, 550000),
(865, 25, 26, 85000),
(866, 25, 27, 181000),
(867, 25, 28, 350000),
(868, 25, 29, 900000),
(869, 25, 30, 300000),
(870, 25, 31, 430000),
(871, 25, 32, 230000),
(872, 25, 33, 90000),
(873, 25, 34, 250000),
(874, 25, 35, 950000),
(875, 25, 36, 400000),
(876, 25, 37, 87000),
(877, 25, 38, 70000),
(878, 25, 39, 2800000),
(879, 25, 40, 30000),
(880, 25, 41, 300000),
(881, 25, 42, 800000),
(882, 25, 43, 1700000),
(883, 25, 44, 580000),
(884, 25, 45, 900000),
(885, 25, 46, 500000),
(886, 25, 47, 100000),
(887, 25, 48, 400000),
(888, 25, 49, 180000),
(889, 25, 50, 300000),
(890, 25, 51, 310000),
(892, 25, 52, 227000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_keluhan`
--

CREATE TABLE `jenis_keluhan` (
  `idkeluhan` int(11) NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `idservis` int(11) NOT NULL,
  `idsparepart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(9, 'Nissan Livina'),
(17, 'Daihatsu Sigra'),
(21, 'L 300'),
(22, 'Brio'),
(23, 'Ayla'),
(24, 'Agya'),
(25, 'Futura'),
(26, 'Karimun'),
(27, 'T120SS');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `username`, `password`, `nama`, `no_hp`, `level`) VALUES
(1, 'admin', '$2y$10$gaAwT3zATxganiJjgJYlk.Ydo01F4SZhvpOsp7Wd9lPbH.VKiyFfe', 'Admin', '0896182631', 'Admin'),
(2, 'zidan', '$2y$10$oYd849hLAVXRM1WA76DasOFCJ3KYP0xF6wKLbSYjWRR1neopQxn8C', 'Zidan Kharisma', '08765456786', 'Admin'),
(4, 'user1', '$2y$10$UDRlybR2CQfVahlNoJbkaOyuu2BpSN3M6YNs500Uycyuy6qKyrUzO', 'User', '085826389656', 'User'),
(5, 'admin3', '$2y$10$R3MHyjVYsW996.Fj5yBuR.TOAWlY6yEbqFebF2hpj4nh8mocxv7Kq', 'Admin 3', '085826389656', 'Admin'),
(6, 'kasir', '$2y$10$FGorUm0BpjAQboP4joULBObGa2/dlf92NXZT3RLv3mBVOgT4nxn7S', 'Kasir', '129-9392-3', 'Kasir'),
(8, 'user3', '$2y$10$GXggXDx1ITsAu9elkNfLa.ayWbU4uxFVh2cdLCeWS/IGALtkHcpqG', 'Users 3', '082917489182', 'User'),
(9, 'user4', '$2y$10$zI6So9cYhK0qWr5.aJllG.YZpRZj2vnf00COX8vF2xO7xQc/1is66', 'User 4', '08891236112', 'User'),
(10, 'eka', '$2y$10$wrTFh/CQDKqZab05aA1zReqUXhDW3fhjMRFmYbs3qfpyTMbKZc0R6', 'Eka', '087315135', 'User');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `sparepart` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sparepart`
--

INSERT INTO `sparepart` (`idsparepart`, `sparepart`) VALUES
(1, 'Fullset Engine'),
(2, 'Gasket Cylinder Head'),
(3, 'Gasket Cover Cylinder Head'),
(4, 'Tutup Timing Chain'),
(5, 'Engine Mounting Kanan/Kiri'),
(6, 'Engine Mounting Belakang'),
(7, 'Ring Piston/Seker (Ukuran Standar)'),
(8, 'Piston/Seker & Pen (Ukuran Standar)'),
(9, 'Pulley AS Crank'),
(10, 'Timing Chain'),
(11, 'Saringan Oli'),
(12, 'Kerodong & Kipas Radiator'),
(13, 'Radiator'),
(14, 'Saringan Udara'),
(15, 'Koil'),
(16, 'Van Belt'),
(17, 'Busi'),
(18, 'Sensor ISC'),
(19, 'Injektor'),
(20, 'Thermostat'),
(21, 'Metal'),
(22, 'karet kaliper'),
(23, 'boster rem'),
(24, 'karet rem'),
(25, 'kanvas rem'),
(26, 'baterai remote'),
(27, 'door lock'),
(28, 'remote'),
(29, 'module remote'),
(30, 'per'),
(31, 'shockbreaker'),
(32, 'ball joint'),
(33, 'bantalan suspensi'),
(34, 'regulator kaca'),
(35, 'dinamo ampere'),
(36, 'gulungan dinamo'),
(37, 'belt dinamo'),
(38, 'bohlam'),
(39, 'body repair'),
(40, 'ripet body'),
(41, 'kabel body'),
(42, 'bumper'),
(43, 'kopling set'),
(44, 'kampas kopling'),
(45, 'gigi'),
(46, 'master kopling'),
(47, 'oli gardan'),
(48, 'paking head'),
(49, 'master rem'),
(50, 'speaker'),
(51, 'tie rod'),
(52, 'Kipas Radiator'),
(53, 'Karet Piston'),
(54, 'Dinamo'),
(55, 'Sabuk pengaman'),
(57, 'Stir');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(9, 2, 5, NULL, 'T-20230902-3', '2023-09-03 17:46:01', 'Lunas'),
(10, 2, 11, NULL, 'T-20230902-3', '2023-09-03 17:46:01', 'Lunas'),
(11, 2, 12, NULL, 'T-20230902-3', '2023-09-03 17:46:01', 'Lunas'),
(13, 2, NULL, 30, 'T-20230902-4', '2023-09-03 17:46:01', 'Lunas'),
(14, 2, NULL, 44, 'T-20230902-4', '2023-09-03 17:46:01', 'Lunas'),
(15, 2, NULL, 47, 'T-20230902-4', '2023-09-03 17:46:01', 'Lunas'),
(18, 3, 6, NULL, 'T-20230902-5', '2023-09-03 17:47:45', 'Lunas'),
(19, 3, 7, NULL, 'T-20230902-5', '2023-09-03 17:47:45', 'Lunas'),
(20, 3, 16, NULL, 'T-20230902-5', '2023-09-03 17:47:45', 'Lunas'),
(21, 3, NULL, 34, 'T-20230902-6', '2023-09-03 17:47:45', 'Lunas'),
(22, 3, NULL, 35, 'T-20230902-6', '2023-09-03 17:47:45', 'Lunas'),
(23, 3, NULL, 37, 'T-20230902-6', '2023-09-03 17:47:45', 'Lunas'),
(24, 3, NULL, 2, 'T-20230902-6', '2023-09-03 17:47:45', 'Lunas'),
(26, 2, 4, NULL, 'T-20230902-3', '2023-09-03 17:46:01', 'Lunas'),
(27, 5, 2, NULL, 'T-20230903-1', '2023-09-05 11:36:49', 'Lunas'),
(28, 5, 4, NULL, 'T-20230903-1', '2023-09-05 11:36:49', 'Lunas'),
(29, 5, NULL, 19, 'T-20230903-2', '2023-09-05 11:36:49', 'Lunas'),
(30, 5, NULL, 17, 'T-20230903-2', '2023-09-05 11:36:49', 'Lunas'),
(31, 5, NULL, 27, 'T-20230903-2', '2023-09-05 11:36:49', 'Lunas'),
(32, 5, NULL, 28, 'T-20230903-2', '2023-09-05 11:36:49', 'Lunas'),
(33, 6, 2, NULL, 'T-20230903-3', '2023-09-03 17:46:18', 'Lunas'),
(34, 6, 8, NULL, 'T-20230903-3', '2023-09-03 17:46:18', 'Lunas'),
(35, 6, 14, NULL, 'T-20230903-3', '2023-09-03 17:46:18', 'Lunas'),
(36, 6, NULL, 19, 'T-20230903-4', '2023-09-03 17:46:18', 'Lunas'),
(37, 6, NULL, 38, 'T-20230903-4', '2023-09-03 17:46:18', 'Lunas'),
(38, 6, NULL, 55, 'T-20230903-4', '2023-09-03 17:46:18', 'Lunas'),
(40, 2, 1, NULL, 'T-20230902-3', '2023-09-03 17:46:01', 'Lunas'),
(41, 2, NULL, 10, 'T-20230902-3', '2023-09-03 17:46:01', 'Lunas'),
(42, 7, 3, NULL, 'T-20230904-1', '2023-09-05 11:38:52', 'Lunas'),
(43, 7, NULL, 23, 'T-20230904-2', '2023-09-05 11:38:52', 'Lunas'),
(44, 8, 6, NULL, 'T-20230904-3', '2023-09-04 08:59:26', 'Lunas'),
(45, 8, NULL, 34, 'T-20230904-4', '2023-09-04 08:59:26', 'Lunas'),
(46, 9, 1, NULL, 'T-20230904-5', '2023-09-04 08:17:52', 'Belum'),
(47, 10, 2, NULL, 'T-20230904-6', '2023-09-04 08:23:10', 'Belum'),
(48, 10, NULL, 19, 'T-20230904-7', '2023-09-04 08:23:13', 'Belum'),
(49, 11, 15, NULL, 'T-20230904-8', '2023-09-04 08:40:06', 'Belum'),
(50, 8, 11, NULL, 'T-20230904-3', '2023-09-04 08:59:26', 'Lunas'),
(51, 12, 3, NULL, 'T-20230905-1', '2023-09-05 11:27:59', 'Belum'),
(52, 12, 17, NULL, 'T-20230905-1', '2023-09-05 11:27:59', 'Belum'),
(53, 12, NULL, 22, 'T-20230905-2', '2023-09-05 11:28:59', 'Belum'),
(54, 12, NULL, 25, 'T-20230905-2', '2023-09-05 11:28:59', 'Belum'),
(55, 12, NULL, 8, 'T-20230905-2', '2023-09-05 11:28:59', 'Belum'),
(56, 13, 10, NULL, 'T-20230905-3', '2023-09-05 11:34:00', 'Belum'),
(57, 13, 13, NULL, 'T-20230905-3', '2023-09-05 11:34:00', 'Belum'),
(58, 13, NULL, 41, 'T-20230905-4', '2023-09-05 11:34:20', 'Belum'),
(59, 13, NULL, 52, 'T-20230905-4', '2023-09-05 11:34:20', 'Belum'),
(60, 7, 1, NULL, 'T-20230904-1', '2023-09-05 11:38:52', 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_keluhan`
--

CREATE TABLE `transaksi_keluhan` (
  `idtransaksi_keluhan` int(11) NOT NULL,
  `idantrian` int(11) NOT NULL,
  `idkeluhan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(11, 3, 41),
(12, 5, 2),
(13, 5, 5),
(14, 5, 14),
(15, 5, 15),
(16, 6, 2),
(17, 6, 27),
(18, 6, 39),
(19, 7, 8),
(20, 7, 11),
(21, 8, 25),
(22, 10, 2),
(23, 12, 7),
(24, 12, 12),
(25, 12, 42),
(26, 13, 31),
(27, 13, 38);

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
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `harga_sparepart`
--
ALTER TABLE `harga_sparepart`
  MODIFY `idharga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=893;

--
-- AUTO_INCREMENT untuk tabel `jenis_keluhan`
--
ALTER TABLE `jenis_keluhan`
  MODIFY `idkeluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  MODIFY `idkendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idpengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `servis`
--
ALTER TABLE `servis`
  MODIFY `idservis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `idsparepart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `transaksi_keluhan`
--
ALTER TABLE `transaksi_keluhan`
  MODIFY `idtransaksi_keluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
