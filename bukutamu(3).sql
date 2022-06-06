-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 12:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bukutamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_keperluan`
--

CREATE TABLE `master_keperluan` (
  `id_keperluan` bigint(20) UNSIGNED NOT NULL,
  `nama_keperluan` varchar(516) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_keperluan`
--

INSERT INTO `master_keperluan` (`id_keperluan`, `nama_keperluan`) VALUES
(1, 'Layanan Penerimaan, Penyimpanan Basan Baran'),
(2, 'Layanan Penggunaan Basan Baran Untuk Keperluan Proses Sidang'),
(3, 'Layanan Peninjauan/Kunjungan Basan Baran'),
(4, 'Layanan Penyampaian Informasi Basan Baran'),
(5, 'Layanan Pengambilan Terhadap Basan Baran');

-- --------------------------------------------------------

--
-- Table structure for table `master_resepsionis`
--

CREATE TABLE `master_resepsionis` (
  `id_resepsionis` int(16) NOT NULL,
  `nama_resepsionis` varchar(256) DEFAULT NULL,
  `gambar_resepsionis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_resepsionis`
--

INSERT INTO `master_resepsionis` (`id_resepsionis`, `nama_resepsionis`, `gambar_resepsionis`) VALUES
(1, 'Deby Heryanti Sagita, S.E.', '08182021033856611c80d07deb5.jpg'),
(2, 'Revica Febriyeni', '0630202106495060dc140e9dd84.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_22_040050_create_signatures_table', 1),
(5, '2021_04_22_064944_create_keperluan_table', 2),
(6, '2021_04_22_065401_create_tamu_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_instruksi`
--

CREATE TABLE `tabel_instruksi` (
  `id` int(11) NOT NULL,
  `id_tamu` int(16) NOT NULL,
  `nama_tamu` varchar(255) NOT NULL,
  `jabatan_tamu` varchar(255) NOT NULL,
  `instruksi` varchar(255) NOT NULL,
  `ttd` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_keperluan`
--

CREATE TABLE `tabel_keperluan` (
  `id` int(16) NOT NULL,
  `id_tamu` int(16) NOT NULL,
  `nama_keperluan` varchar(256) DEFAULT '-',
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_resepsionis`
--

CREATE TABLE `tabel_resepsionis` (
  `id` int(16) NOT NULL,
  `id_tamu` int(16) NOT NULL,
  `nama_resepsionis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tamu`
--

CREATE TABLE `tabel_tamu` (
  `id` int(16) NOT NULL,
  `id_tamu` int(16) NOT NULL,
  `nama_tamu` varchar(256) DEFAULT NULL,
  `alamat` varchar(256) DEFAULT '-',
  `no_telp` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `ttd` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'daffa', 'dafaraihan03@gmail.com', NULL, '', NULL, '2021-06-17 00:39:52', '2021-06-17 00:39:52'),
(2, 'anjay', 'daffaraihan03@gmail.com', NULL, '', NULL, '2022-04-05 21:13:38', '2022-04-05 21:13:38'),
(3, 'asd', 'asd@gmail.com', NULL, '$2y$10$eQmPegCoWbsLkKh4GwJw4e6XzOOSOKGt1zyvYom4zQcXvnfMOTxUS', NULL, '2022-04-05 21:31:33', '2022-04-05 21:31:33'),
(4, 'qwe', 'qwe@gmail.com', NULL, '$2y$10$CY.hf4z8LJWfOwvZPopnxeySd3.j8vcujRhY5e8aJTlzvv/DxNhy.', NULL, '2022-04-05 21:32:06', '2022-04-05 21:32:06'),
(5, 'zxc', 'zxc@gmail.com', NULL, '$2y$10$.IHYTmn2ZNH0JetUfDjZdeNHJ0a0pyRyOKqTtbrayYGR5WDI8vMee', NULL, '2022-04-05 21:34:44', '2022-04-05 21:34:44'),
(6, 'sdf', 'sdf@gmail.com', NULL, '$2y$10$6gNuCiectaJ34iFOtum3DeF295G1VasER5ilPCBp8UIVKOAM/cMLm', NULL, '2022-04-05 21:36:38', '2022-04-05 21:36:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `master_keperluan`
--
ALTER TABLE `master_keperluan`
  ADD PRIMARY KEY (`id_keperluan`);

--
-- Indexes for table `master_resepsionis`
--
ALTER TABLE `master_resepsionis`
  ADD PRIMARY KEY (`id_resepsionis`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tabel_instruksi`
--
ALTER TABLE `tabel_instruksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_keperluan`
--
ALTER TABLE `tabel_keperluan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_resepsionis`
--
ALTER TABLE `tabel_resepsionis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_tamu`
--
ALTER TABLE `tabel_tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_keperluan`
--
ALTER TABLE `master_keperluan`
  MODIFY `id_keperluan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `master_resepsionis`
--
ALTER TABLE `master_resepsionis`
  MODIFY `id_resepsionis` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabel_instruksi`
--
ALTER TABLE `tabel_instruksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_keperluan`
--
ALTER TABLE `tabel_keperluan`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_resepsionis`
--
ALTER TABLE `tabel_resepsionis`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_tamu`
--
ALTER TABLE `tabel_tamu`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
