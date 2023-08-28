-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 01:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_18_051326_create_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cabang`
--

CREATE TABLE `tb_cabang` (
  `id_cabang` int(11) NOT NULL,
  `nama_cabang` varchar(3) NOT NULL,
  `pt` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_cabang`
--

INSERT INTO `tb_cabang` (`id_cabang`, `nama_cabang`, `pt`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'PDL', 'PT. ADONAI ALFA OMEGA', 'PADALARANG', NULL, NULL),
(2, 'TGL', 'PT BAHARI MONCER KEMILAU', 'TEGAL', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dept`
--

CREATE TABLE `tb_dept` (
  `id` int(11) NOT NULL,
  `departemen` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_dept`
--

INSERT INTO `tb_dept` (`id`, `departemen`, `catatan`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'asasa', 'asasas', '2023-07-19 21:59:11', NULL, '2023-07-19 21:59:11'),
(3, 'asasas', 'asasassa', '2023-07-19 22:02:29', NULL, '2023-07-19 22:02:29'),
(4, 'Marketing', 'Marketing', '2023-07-23 18:30:53', NULL, '2023-07-23 18:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_loker`
--

CREATE TABLE `tb_loker` (
  `id` int(11) NOT NULL,
  `id_loker` varchar(25) DEFAULT NULL,
  `id_dept` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_cabang` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_loker`
--

INSERT INTO `tb_loker` (`id`, `id_loker`, `id_dept`, `id_user`, `id_cabang`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PDL/LOKER/2307/001', 1, 1, 1, 1, NULL, NULL),
(2, 'PDL/LOKER/2307/001', 1, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'msaepul', 'msaepul@arnonfood.com', '$2y$10$ASAtwCm5vK3MsJMW.TBTxuz9IxbCbzfLMHJl1bGPrGKe0Zt6kA5j6', NULL, '2023-07-17 22:15:49', '2023-07-17 22:15:49'),
(8, 'asas', 'Elsagrazea@arnonfood.com', '$2y$10$dNe5TwKozm/E2pH81a98deewxonJL0YufAcaSSaqyaWchhmtnGCqK', 0, '2023-07-18 00:01:47', '2023-07-18 00:01:47'),
(10, 'sdgsdg', 'enyfarida@arnonfood.com', '$2y$10$MGu9r80OK3Y00U0jI82HP.cEGSq2XB5otdcNz3Ljq7d5LjFpChu9S', 0, '2023-07-18 02:30:21', '2023-07-18 02:30:21'),
(11, 'Msaepul', 'msaepul12@arnonfood.com', '$2y$10$Vp4PnA5l80mTeTXaex45b.MDuo59Znni/qgD2VZe1IKdPyqliIXIO', 0, '2023-07-18 22:09:12', '2023-07-18 22:09:12'),
(12, 'asas', 'adaa@arnonfood.com', '$2y$10$bN1A8XOOMronZY.hxrpZGeStif8GehZ./KDHDdUR.wYHfQhRg8wtq', 0, '2023-07-18 22:18:03', '2023-07-18 22:18:03'),
(13, 'ilybassar', 'ilybassar@gmail.com', '$2y$10$Na2vRTMDtk8FIVmLuENb3unJ8GPqGt2G.ab7coZ65O0sonjEAWrem', 0, '2023-07-19 18:30:29', '2023-07-19 18:30:29'),
(14, 'sasa', 'asarr@arnonfood.com', '$2y$10$84SnqHF/JlzcTKF7GnlK2e7JksZB3ZaCrUE47X9dAMyI4q2f9Lf1a', 0, '2023-07-19 18:31:57', '2023-07-19 18:31:57'),
(15, 'asasas', 'fwf@arnonfood.com', '$2y$10$eaTzTMOCR2ZQ3KAx.j6enOGvMOroz1Hv0eNyra.O5n.RNclDAqsjW', 0, '2023-07-19 18:58:15', '2023-07-19 18:58:15');

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tb_cabang`
--
ALTER TABLE `tb_cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indexes for table `tb_dept`
--
ALTER TABLE `tb_dept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_loker`
--
ALTER TABLE `tb_loker`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_cabang`
--
ALTER TABLE `tb_cabang`
  MODIFY `id_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_dept`
--
ALTER TABLE `tb_dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_loker`
--
ALTER TABLE `tb_loker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
