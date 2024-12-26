-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Des 2024 pada 05.18
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antriantujuh`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bpjs`
--

CREATE TABLE `tb_bpjs` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `waktu` varchar(12) NOT NULL,
  `nomor` int(11) NOT NULL,
  `huruf` varchar(12) NOT NULL,
  `loket` int(11) DEFAULT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Belum selesai',
  `panggil` varchar(12) DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_bpjs`
--

INSERT INTO `tb_bpjs` (`id`, `tanggal`, `waktu`, `nomor`, `huruf`, `loket`, `Status`, `panggil`, `id_karyawan`) VALUES
(685, '26 Dec 2024', '01:34', 1, 'D', 1, 'Belum selesai', 'belum', 1),
(686, '26 Dec 2024', '01:38', 2, 'D', 2, 'Belum selesai', 'belum', 2),
(687, '26 Dec 2024', '02:02', 3, 'D', 1, 'Belum selesai', 'belum', 1),
(688, '26 Dec 2024', '02:03', 4, 'D', 1, 'Selesai', 'belum', 1),
(689, '26 Dec 2024', '02:03', 5, 'D', 1, 'Belum selesai', 'belum', 1),
(690, '26 Dec 2024', '02:07', 6, 'D', 2, 'Belum selesai', 'belum', 2),
(691, '26 Dec 2024', '02:08', 7, 'D', 1, 'Belum selesai', 'belum', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `preferensi_loket` enum('desain','siap cetak') NOT NULL,
  `preferensi_meja` enum('1','2','3','4') NOT NULL,
  `status_karyawan` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `tombol_klik` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nama_karyawan`, `username`, `password`, `preferensi_loket`, `preferensi_meja`, `status_karyawan`, `tombol_klik`) VALUES
(1, 'pares', 'pares', '$2y$10$36Hrjz.OKvbEsvYGFIZMcO/SASijvYGsHe1tEq2II2TWR3Z2je7lm', 'desain', '1', 'aktif', NULL),
(2, 'udin', 'udinnn', '$2y$10$H1TzuAh3WftgtUeu8e1u5.T3.fVylsKOeF5mdyEihzPUi2ztBuGxO', 'desain', '1', 'aktif', NULL),
(4, 'user1', 'user1', '$2y$10$GGIVrPQOqpitH01dhaMOYeWaE9xzn3mN1qnDwn3e8FnBoaaKS5O3O', 'desain', '2', 'aktif', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `username`, `password`) VALUES
(10, 'administrator', '$2y$10$IIphNC4TaF1QRibhhZkUx.oftfNJz.BdEu2cw4TPVIKLSrXo.0Veq');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekap_antrian`
--

CREATE TABLE `tb_rekap_antrian` (
  `id_rekap` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `loket` enum('desain','siap cetak') NOT NULL,
  `meja` enum('1','2','3','4') NOT NULL,
  `Status` varchar(255) NOT NULL,
  `nomor` int(10) NOT NULL,
  `huruf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_rekap_antrian`
--

INSERT INTO `tb_rekap_antrian` (`id_rekap`, `id_karyawan`, `tanggal`, `waktu`, `loket`, `meja`, `Status`, `nomor`, `huruf`) VALUES
(381, 1, '2024-12-21', '05:03:23', 'desain', '1', 'Selesai', 1, 'D'),
(382, 2, '2024-12-21', '05:03:35', 'desain', '2', 'Belum Selesai', 2, 'D'),
(383, 1, '2024-12-21', '06:44:11', 'desain', '1', 'Belum Selesai', 3, 'D'),
(384, 1, '2024-12-21', '06:44:41', 'desain', '1', 'Selesai', 4, 'D'),
(385, 1, '2024-12-24', '04:51:06', 'desain', '1', 'Belum Selesai', 5, 'D'),
(386, 1, '2024-12-24', '04:51:07', 'desain', '1', 'Belum Selesai', 6, 'D'),
(387, 1, '2024-12-24', '04:51:09', 'desain', '1', 'Belum Selesai', 7, 'D'),
(388, 1, '2024-12-24', '04:51:10', 'desain', '1', 'Belum Selesai', 8, 'D'),
(389, 1, '2024-12-24', '04:51:12', 'desain', '1', 'Belum Selesai', 9, 'D'),
(390, 1, '2024-12-24', '04:51:13', 'desain', '1', 'Belum Selesai', 10, 'D'),
(391, 1, '2024-12-24', '04:52:51', 'desain', '1', 'Belum Selesai', 1, 'D'),
(392, 1, '2024-12-24', '04:55:34', 'desain', '1', 'Belum Selesai', 2, 'D'),
(393, 1, '2024-12-24', '04:56:07', 'desain', '1', 'Belum Selesai', 3, 'D'),
(394, 1, '2024-12-24', '04:56:30', 'desain', '1', 'Selesai', 4, 'D'),
(395, 1, '2024-12-24', '04:59:21', 'desain', '1', 'Belum Selesai', 5, 'D'),
(396, 1, '2024-12-24', '05:02:57', 'desain', '1', 'Belum Selesai', 6, 'D'),
(397, 1, '2024-12-24', '05:07:01', 'desain', '1', 'Belum Selesai', 7, 'D'),
(398, 1, '2024-12-24', '05:10:43', 'desain', '1', 'Belum Selesai', 8, 'D'),
(399, 1, '2024-12-24', '05:12:55', 'desain', '1', 'Belum Selesai', 9, 'D'),
(400, 1, '2024-12-24', '05:13:12', 'desain', '1', 'Belum Selesai', 10, 'D'),
(401, 1, '2024-12-24', '07:03:03', 'desain', '1', 'Belum Selesai', 11, 'D'),
(402, 1, '2024-12-24', '07:04:11', 'desain', '1', 'Belum Selesai', 12, 'D'),
(403, 1, '2024-12-24', '07:16:54', 'desain', '1', 'Belum Selesai', 13, 'D'),
(404, 1, '2024-12-24', '07:32:40', 'desain', '1', 'Belum Selesai', 14, 'D'),
(405, 1, '2024-12-24', '07:56:35', 'desain', '1', 'Belum Selesai', 15, 'D'),
(406, 1, '2024-12-24', '07:56:58', 'desain', '1', 'Belum Selesai', 16, 'D'),
(407, 1, '2024-12-24', '07:57:16', 'desain', '1', 'Belum Selesai', 17, 'D'),
(408, 1, '2024-12-24', '07:58:09', 'desain', '1', 'Belum Selesai', 18, 'D'),
(409, 1, '2024-12-24', '07:58:29', 'desain', '1', 'Belum Selesai', 19, 'D'),
(410, 1, '2024-12-26', '01:14:20', 'desain', '1', 'Belum Selesai', 20, 'D'),
(411, 1, '2024-12-26', '01:19:12', 'desain', '1', 'Belum Selesai', 21, 'D'),
(412, 1, '2024-12-26', '01:20:08', 'desain', '1', 'Belum Selesai', 22, 'D'),
(413, 1, '2024-12-26', '01:34:33', 'desain', '1', 'Belum Selesai', 1, 'D'),
(414, 2, '2024-12-26', '01:38:33', 'desain', '2', 'Belum Selesai', 2, 'D'),
(415, 4, '2024-12-26', '01:44:43', 'siap cetak', '3', 'Belum Selesai', 5, 'S'),
(416, 4, '2024-12-26', '01:46:33', 'siap cetak', '4', 'Belum Selesai', 6, 'S'),
(417, 4, '2024-12-26', '01:48:34', 'siap cetak', '4', 'Belum Selesai', 7, 'S'),
(418, 1, '2024-12-26', '02:02:24', 'desain', '1', 'Belum Selesai', 3, 'D'),
(419, 1, '2024-12-26', '02:03:43', 'desain', '1', 'Selesai', 4, 'D'),
(420, 1, '2024-12-26', '02:04:00', 'desain', '1', 'Belum Selesai', 5, 'D'),
(421, 2, '2024-12-26', '02:08:02', 'desain', '2', 'Belum Selesai', 6, 'D'),
(422, 2, '2024-12-26', '02:09:26', 'desain', '1', 'Belum Selesai', 7, 'D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_setting`
--

CREATE TABLE `tb_setting` (
  `id_admin` int(11) NOT NULL,
  `video` varchar(200) NOT NULL,
  `text` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_setting`
--

INSERT INTO `tb_setting` (`id_admin`, `video`, `text`) VALUES
(2, 'zRqQcWhcyT4', 'SELAMAT DATANG DI PUSKESMAS XYZ © 2024');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_umum`
--

CREATE TABLE `tb_umum` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `nomor` int(11) NOT NULL,
  `huruf` varchar(50) NOT NULL,
  `loket` int(11) DEFAULT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Belum selesai',
  `panggil` varchar(50) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_umum`
--

INSERT INTO `tb_umum` (`id`, `tanggal`, `waktu`, `nomor`, `huruf`, `loket`, `Status`, `panggil`, `id_karyawan`) VALUES
(165, '21 Dec 2024', '02:29', 1, 'S', 4, 'Belum selesai', 'belum', 1),
(166, '21 Dec 2024', '02:29', 2, 'S', 4, 'Belum selesai', 'belum', 1),
(167, '21 Dec 2024', '03:15', 3, 'S', 1, 'Belum selesai', 'belum', 2),
(168, '21 Dec 2024', '03:16', 4, 'S', 4, 'Selesai', 'belum', 1),
(169, '26 Dec 2024', '01:44', 5, 'S', 3, 'Belum selesai', 'belum', 4),
(170, '26 Dec 2024', '01:46', 6, 'S', 4, 'Belum selesai', 'belum', 4),
(171, '26 Dec 2024', '01:48', 7, 'S', 4, 'Belum selesai', 'belum', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_bpjs`
--
ALTER TABLE `tb_bpjs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bpjs_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `tb_rekap_antrian`
--
ALTER TABLE `tb_rekap_antrian`
  ADD PRIMARY KEY (`id_rekap`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_umum`
--
ALTER TABLE `tb_umum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_umum_karyawan` (`id_karyawan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_bpjs`
--
ALTER TABLE `tb_bpjs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=692;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_rekap_antrian`
--
ALTER TABLE `tb_rekap_antrian`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=423;

--
-- AUTO_INCREMENT untuk tabel `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_umum`
--
ALTER TABLE `tb_umum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_bpjs`
--
ALTER TABLE `tb_bpjs`
  ADD CONSTRAINT `fk_bpjs_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rekap_antrian`
--
ALTER TABLE `tb_rekap_antrian`
  ADD CONSTRAINT `tb_rekap_antrian_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `tb_umum`
--
ALTER TABLE `tb_umum`
  ADD CONSTRAINT `fk_umum_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
