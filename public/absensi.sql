-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2025 at 02:41 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noimage.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `date`, `status`, `created_at`, `updated_at`, `foto`) VALUES
(84, 13, '2024-10-17', 'Hadir', '2024-10-17 05:40:40', '2024-10-17 05:40:40', ''),
(85, 14, '2024-10-17', 'Tidak Hadir', '2024-10-17 05:40:40', '2024-10-17 05:40:40', ''),
(86, 15, '2024-10-17', 'Sakit', '2024-10-17 05:45:48', '2024-11-04 00:51:58', 'products/5xjKqsMBTlx8nvPBxm1jGI3NOAGN9c81s5mr9bnj.jpg'),
(87, 16, '2024-10-17', 'Hadir', '2024-10-17 05:45:48', '2024-10-17 05:45:48', ''),
(88, 13, '2024-10-18', 'Hadir', '2024-10-17 05:46:44', '2024-11-03 19:52:55', 'products/Juj5ng7pjN1azsYmqCHkCMA3YB2yCfUXsgKxnFmT.jpg'),
(89, 14, '2024-10-18', 'Hadir', '2024-10-17 05:46:45', '2024-10-17 05:46:45', ''),
(90, 15, '2024-10-18', 'Hadir', '2024-10-17 05:46:57', '2024-10-17 05:46:57', ''),
(91, 16, '2024-10-18', 'Hadir', '2024-10-17 05:46:57', '2024-10-17 05:46:57', ''),
(95, 13, '2024-11-04', 'Izin', '2024-11-04 00:05:16', '2024-11-04 00:51:19', 'products/A1KSPWvk30ZcaDJ8mq6eSA1CJXlrOOfFVBqGq2vM.jpg'),
(96, 14, '2024-11-04', 'Hadir', '2024-11-04 00:09:34', '2024-11-04 00:09:34', 'noimage.png'),
(97, 15, '2024-11-04', 'Hadir', '2024-11-04 00:10:21', '2024-11-04 00:10:21', 'noimage.png'),
(98, 16, '2024-11-04', 'Sakit', '2024-11-04 00:10:21', '2024-11-04 00:52:00', 'products/Et959inKSp643OhSP7wmWFLGHgOpO6SJ6tZxrAUe.png'),
(99, 13, '2024-11-05', 'Izin', '2024-11-04 19:05:57', '2024-11-05 20:14:32', 'products/9E41t3AS3CIaCK0z69F01x6I06mBpQNjAUEbIYWU.jpg'),
(100, 14, '2024-11-05', 'Hadir', '2024-11-04 19:05:57', '2024-11-04 19:05:57', 'noimage.png'),
(101, 15, '2024-11-05', 'Hadir', '2024-11-04 19:08:50', '2024-11-04 19:08:50', 'noimage.png'),
(102, 16, '2024-11-05', 'Hadir', '2024-11-04 19:08:50', '2024-11-04 19:08:50', 'noimage.png'),
(103, 15, '2024-11-07', 'Sakit', '2024-11-06 19:21:46', '2024-11-06 19:26:14', 'products/BaV5pdqwXMQ76zml4ior3zMmgLjZhnt0I245nUqF.jpg'),
(104, 16, '2024-11-07', 'Hadir', '2024-11-06 19:21:46', '2024-11-06 19:21:46', 'noimage.png'),
(105, 13, '2024-11-07', 'Hadir', '2024-11-06 19:29:58', '2024-11-06 19:29:58', 'noimage.png'),
(106, 14, '2024-11-07', 'izin', '2024-11-06 19:29:58', '2024-11-06 19:31:18', 'products/KUBSYHneY00zQAQl5bSLZJRnmvW7W29AMOdmAAcx.png'),
(107, 13, '2024-11-14', 'Hadir', '2024-11-14 00:15:32', '2024-11-14 00:15:32', 'noimage.png'),
(108, 14, '2024-11-14', 'Hadir', '2024-11-14 00:15:32', '2024-11-14 00:15:32', 'noimage.png'),
(109, 17, '2024-11-14', 'Hadir', '2024-11-14 00:15:32', '2024-11-14 00:15:32', 'noimage.png'),
(110, 13, '2024-11-15', 'izin', '2024-11-14 18:44:52', '2024-11-14 18:46:57', 'products/g7GK3BlLWxYkkYD4g6fnd0nzm7ru04cATQHAXieb.jpg'),
(111, 14, '2024-11-15', 'Hadir', '2024-11-14 18:44:52', '2024-11-14 18:44:52', 'noimage.png'),
(112, 17, '2024-11-15', 'Hadir', '2024-11-14 18:44:52', '2024-11-14 18:44:52', 'noimage.png');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_10_020955_create_attendances_table', 1),
(6, '2024_10_22_071333_add_izin_file_to_attendances_table', 2),
(7, '2024_10_28_062940_create_perizinan_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perizinan`
--

CREATE TABLE `perizinan` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noimage.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perizinan`
--

INSERT INTO `perizinan` (`id`, `user_id`, `date`, `status`, `foto`, `created_at`, `updated_at`) VALUES
(10, 16, '2024-11-04', 'Sakit', 'products/Et959inKSp643OhSP7wmWFLGHgOpO6SJ6tZxrAUe.png', '2024-11-04 00:11:03', '2024-11-04 00:11:03'),
(15, 13, '2024-11-04', 'Izin', 'products/A1KSPWvk30ZcaDJ8mq6eSA1CJXlrOOfFVBqGq2vM.jpg', '2024-11-04 00:51:10', '2024-11-04 00:51:10'),
(16, 13, '2024-11-05', 'Izin', 'products/9E41t3AS3CIaCK0z69F01x6I06mBpQNjAUEbIYWU.jpg', '2024-11-05 20:13:15', '2024-11-05 20:13:15'),
(17, 15, '2024-11-07', 'Sakit', 'products/BaV5pdqwXMQ76zml4ior3zMmgLjZhnt0I245nUqF.jpg', '2024-11-06 19:22:45', '2024-11-06 19:22:45'),
(18, 14, '2024-11-07', 'izin', 'products/KUBSYHneY00zQAQl5bSLZJRnmvW7W29AMOdmAAcx.png', '2024-11-06 19:31:03', '2024-11-06 19:31:03'),
(24, 14, '2024-11-14', 'Izin', 'products/noimage.png', '2024-11-14 00:11:32', '2024-11-14 00:11:32'),
(25, 13, '2024-11-15', 'izin', 'products/g7GK3BlLWxYkkYD4g6fnd0nzm7ru04cATQHAXieb.jpg', '2024-11-14 18:43:49', '2024-11-14 18:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('U9U129EoRTktOK8Udh98tDPZkXMtzWcn35DghMFW', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV3p3bDZBb0Zzb2w1TFFORkYyZ0cyYzljdUl2WFprNjhNT0RaY0FhYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9wcm9qZWthYnNlbi50ZXN0L3VzZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMjt9', 1737383949),
('xoHXFfCa3fW8r7LStieIFW3iIikisiiR6vJNy2er', 13, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU0JqdnpCdEV1RVlUaVlIdFNRZUFIdzl3Sjl6b1k2MUdHcEU3SDNyWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9wcm9qZWthYnNlbi50ZXN0L3Blcml6aW5hbi9jcmVhdGUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMzt9', 1736995814);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kelas` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `kelas`, `usertype`, `jenis_kelamin`, `alamat`, `nisn`) VALUES
(12, 'admin', 'admin@gmail.com', NULL, '$2y$12$1SIub61igsEGzOw47mKRzel8wLyZqBGx20V/4ziJj8C.C2kG5FGXO', NULL, '2024-10-14 19:00:01', '2024-10-14 19:00:01', 'guru', 'admin', '', '', ''),
(13, 'Deta Aprilka Dario Karnavaro', 'deta@gmail.com', NULL, '$2y$12$kZYW0j2m/rPscy57J3QytuXuXn1iHhLZJYrWCrFCg7NGgAJ28m89m', NULL, '2024-10-14 19:00:52', '2024-10-14 19:00:52', 'XII RPL 2', 'user', 'Laki-laki', 'Ds.Jatigunung Kec.Tulakan', '078328657'),
(14, 'Abdul Aziz', 'abdul@gmail.com', NULL, '$2y$12$x3/Hj.uZrlsJpwY2JdCM7OhFMJ1R1rVtZ/jNYYQhPkuAbkDwiq4Ai', NULL, '2024-10-16 20:48:10', '2024-10-16 20:48:10', 'XII RPL 2', 'user', 'Laki-laki', 'Ds. Ngadirejan Kec.Pringkuku', '0988218737'),
(15, 'Fauzan Fadillah', 'fauzan@gmail.com', NULL, '$2y$12$eMjNHfoF1QciG1gEGN4VlukV0q94KvNvP1zRHUlUQHQWvNUzGOLdu', NULL, '2024-10-17 05:43:08', '2024-10-17 05:43:08', 'XII KKKR', 'user', 'Laki-laki', 'Ds.Bangunsari Kec.pacitan', '0886126387'),
(16, 'Muhammad Farid', 'farid@gmail.com', NULL, '$2y$12$ZDnLti.hhCTy4mPAHFABk.IrjEima3UOrlde3eEBOoRhQ26/WzeMS', NULL, '2024-10-17 05:44:58', '2024-10-17 05:44:58', 'XII KKKR', 'user', 'Laki-laki', 'Ds. Tulakan Kec.Tulakan', '087927379'),
(17, 'Rasya Effendi', 'rasya@gmail.com', NULL, '$2y$12$4frdsixXYJQSSgqrNTKYbOoMK3PFOImiwRZTMUJDjBiVMIzEqHioG', NULL, '2024-11-12 19:15:16', '2024-11-12 19:15:16', 'XII RPL 2', 'user', 'Laki_laki', 'Ds.Baleharjo Kec.Pacitan', '0986362178'),
(18, 'Putra Satya', 'putra@gmail.com', NULL, '$2y$12$Drr17LPXXNcofrhdJGMVNenV7OF2fDcZYOHhYny0ijseDSGM96Mme', NULL, '2024-11-12 19:17:40', '2024-11-12 19:17:40', 'XII KKKR', 'user', 'Laki_laki', 'Ds.Sirnoboyo Kec.Pacitan', '028817976'),
(19, 'Farel', 'farel@gmail.com', NULL, '$2y$12$L9TZ.btqqt/pyvCffUsN3.4HkFhqiJFQdho0k6XTRYJrljL0n7oDK', NULL, '2024-12-12 20:11:51', '2024-12-12 20:11:51', 'XII TKJ 2', 'user', 'Laki_laki', 'Arjosari', '23867399108');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `perizinan`
--
ALTER TABLE `perizinan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perizinan_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `perizinan`
--
ALTER TABLE `perizinan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `perizinan`
--
ALTER TABLE `perizinan`
  ADD CONSTRAINT `perizinan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
