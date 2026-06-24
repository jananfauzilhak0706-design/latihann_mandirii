-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2026 at 01:25 PM
-- Server version: 8.0.30
-- PHP Version: 8.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uasss_latihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_sekolah` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_prodi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi_kampus` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_prestasi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tingkat_prestasi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sk_ikatan_dinas` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instansi_sponsor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ahmad Fauzi', 'SMA Negeri 1 Cilacap', 85.50, 250000.00, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Siti Aminah', 'MAN 2 Kebumen', 79.80, 250000.00, 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Budi Santoso', 'SMK Negeri 2 Purwokerto', 88.20, 250000.00, 'Reguler', 'Teknik Elektro', 'Kampus Utama', NULL, NULL, NULL, NULL),
(4, 'Dewi Lestari', 'SMA Negeri 1 Gombong', 91.00, 250000.00, 'Reguler', 'Akuntansi', 'Kampus Cabang', NULL, NULL, NULL, NULL),
(5, 'Eko Prasetyo', 'SMK Bhakti Kencana', 76.45, 250000.00, 'Reguler', 'Manajemen Bisnis', 'Kampus Cabang', NULL, NULL, NULL, NULL),
(6, 'Fitriani', 'SMA Negeri 3 Cilacap', 83.15, 250000.00, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(7, 'Gilang Permana', 'MAN 1 Banyumas', 82.00, 250000.00, 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(8, 'Hendra Wijaya', 'SMA Negeri 1 Purwareja', 94.00, 250000.00, 'Prestasi', NULL, NULL, 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(9, 'Indah Permatasari', 'SMA Negeri 2 Kebumen', 89.50, 250000.00, 'Prestasi', NULL, NULL, 'Juara 1 Pencak Silat', 'Provinsi', NULL, NULL),
(10, 'Joko Tarub', 'SMK Negeri 1 Karanganyar', 86.70, 250000.00, 'Prestasi', NULL, NULL, 'Lomba Kompetisi Siswa (LKS)', 'Nasional', NULL, NULL),
(11, 'Kartika Putri', 'SMA Merdeka Cilacap', 92.30, 250000.00, 'Prestasi', NULL, NULL, 'FLS2N Tari Kreasi', 'Kabupaten', NULL, NULL),
(12, 'Lutfi Hakim', 'MAN 2 Purwokerto', 87.85, 250000.00, 'Prestasi', NULL, NULL, 'Hafizh Al-Quran 20 Juz', 'Nasional', NULL, NULL),
(13, 'Mega Utami', 'SMA Negeri 1 Banyumas', 90.10, 250000.00, 'Prestasi', NULL, NULL, 'Karya Ilmiah Remaja (KIR)', 'Provinsi', NULL, NULL),
(14, 'Naufal Abdi', 'SMK Piri Kebumen', 85.60, 250000.00, 'Prestasi', NULL, NULL, 'Juara 2 E-Sport Mobile Legends', 'Kabupaten', NULL, NULL),
(15, 'Putra Pratama', 'SMA Negeri 1 Kroya', 84.20, 300000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DIK-2026-001', 'Kementerian Perhubungan'),
(16, 'Qori Aina', 'MAN Cilacap', 81.50, 300000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DIK-2026-002', 'Badan Siber dan Sandi Negara'),
(17, 'Riyan Hidayat', 'SMK Negeri 1 Cilacap', 87.00, 300000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DIK-2026-003', 'Pemerintah Daerah Cilacap'),
(18, 'Sania Rahma', 'SMA Negeri 1 Prembun', 83.75, 300000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DIK-2026-004', 'Kementerian Komunikasi dan Digital'),
(19, 'Taufik Hidayat', 'SMA Negeri 5 Purwokerto', 85.90, 300000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DIK-2026-005', 'Kementerian Perindustrian'),
(20, 'Umar Bakri', 'MA Swasta Kebumen', 80.10, 300000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DIK-2026-006', 'Badan Meteorologi Klimatologi Geofisika'),
(21, 'Vina Panduwinata', 'SMA Negeri 2 Cilacap', 86.40, 300000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DIK-2026-007', 'Kementerian Lingkungan Hidup');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
