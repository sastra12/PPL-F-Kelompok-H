-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 03:44 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppl2`
--

-- --------------------------------------------------------

--
-- Table structure for table `biouser`
--

CREATE TABLE `biouser` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rekening` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biouser`
--

INSERT INTO `biouser` (`id`, `id_user`, `nik`, `alamat`, `rekening`, `notelepon`, `created_at`, `updated_at`) VALUES
(2, 2, '2222000034563345', 'Jln Kalimantan 10, Jember', '121212343367222', '082200981234', NULL, '2020-10-31 21:55:58'),
(3, 3, '3333110134495626', 'Jln Riau, Jember', '130011551240111', '083100091055', NULL, NULL),
(4, 12, '0098667833451100', 'Alasmalang, Singojuruh', '008766890123', '081124335767', '2020-11-02 04:28:32', '2020-11-02 04:28:32'),
(6, 14, '1119813817301221', 'Alasmalang', '89123819031', '082233445566', '2020-11-16 05:34:30', '2020-11-16 05:34:30'),
(7, 15, '0099887766009911', 'Alasmalang', '98123819231321', '082200987766', '2020-11-16 05:42:34', '2020-11-16 05:42:34'),
(8, 16, '0000999988887777', 'Alasmalang', '82139120937213', '083122551232', '2020-11-16 05:44:08', '2020-11-16 05:44:08'),
(9, 17, '0000888822223443', 'Glenmore', '0938029842734829', '081126778900', '2020-11-16 05:54:33', '2020-11-16 05:54:33'),
(10, 18, '0000666634342222', 'Jember', '09123901273812', '082254678809', '2020-11-16 06:20:49', '2020-11-16 06:20:49'),
(11, 19, '0000888866663421', 'Alasmalang', '901831097318', '083345667132', '2020-11-16 06:34:28', '2020-11-16 06:34:28'),
(12, 21, '0099800755610009', 'Dsn Krajan Alasmalang', '921731923718073', '084451320044', '2020-11-16 06:49:22', '2020-11-16 06:49:22'),
(13, 22, '0099713244332211', 'Sumbersari', '09128390710932', '084500001243', '2020-11-16 06:53:16', '2020-11-16 06:53:16');

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
(3, '2020_10_30_165643_create_biouser_table', 1),
(4, '2020_10_30_170547_add_role_id_to_users_table', 2),
(5, '2020_10_30_173559_create_roles_table', 3),
(6, '2020_10_30_174104_create_roles_table', 4),
(7, '2020_10_30_175643_create_roles_table', 5),
(8, '2020_10_30_181711_create_roles_table', 6),
(9, '2020_11_15_101658_create_peternakan_table', 7);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Peternak', NULL, NULL),
(3, 'Investor', NULL, NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Sastra Rianto', 'rsastra901@gmail.com', NULL, '$2y$10$FWI./taN5nQxrySCipB7l.YLOghCFHcpKnBMpCT7N.PtinFznPCey', NULL, NULL, NULL, 1),
(2, 'Gugus Prasetyo', 'gugusp901@gmail.com', NULL, '$2y$10$BtQRdG2fVO1gjbSB0ap95OAn1iFp5/5StZJpdT.ua4n0zFEhG.2A.', NULL, NULL, '2020-11-03 23:23:41', 2),
(3, 'Aisyah Dewi', 'aisyah@gmail.com', NULL, '$2y$10$L3v8FMlf38k9b11DlZwWGenfe6CQlYASObf88H3CzDAYlHovfK5by', NULL, NULL, '2020-11-02 08:38:17', 3),
(12, 'Safitri', 'Safitri@gmail.com', NULL, '$2y$10$fE3Yc1EZMy2WjLm7s66ReeQ4Hk37KMBt1oHkfTk4H1u685SDfTek2', 'k5a1RZPsMifrQQomPXPF016FtniGKRBl78GkvLb8TwQ9gf1jlpiDnFTHPEiN', '2020-11-02 04:28:32', '2020-11-02 04:28:32', 3),
(16, 'Gundo', 'gundo@gmail.com', NULL, '$2y$10$noT3QjL3ZTDsRJ/GM69HH.qTD6ZKbHgZKavKAvMJcMKLf.e9GxcHS', 'a4thdju3ZktpL1IUUhgTf76WYe2EOhrXAC8262ijL60bujfXxot0H7Yp5FjI', '2020-11-16 05:44:08', '2020-11-16 05:44:08', 2),
(17, 'Daus', 'd@gmail.com', NULL, '$2y$10$ESlveAU/0mSioeEUoZpGAOM4FIxu2XevSYoqcRq1s3Ci5/dFlTdEW', '095do2x1b6yVwBBch0dw3cUh3u2N5mMFbr9UnAdcx06CeTMjkdgZbVrVatG3', '2020-11-16 05:54:33', '2020-11-16 05:54:33', 2),
(19, 'edo', 'e@gmail.com', NULL, '$2y$10$FdVgR6lTK7ummbrlcokl6.CdivYiAgEJgPNj0PGABQIYQBMmyE/02', 'v7qn40Au6eD8mqixikpVaBqkxeCZuwWt7czn9t9n8mUcQ1zi8w5ks2JzMhBR', '2020-11-16 06:34:28', '2020-11-16 06:34:28', 2),
(21, 'ilma', 'i@gmail.com', NULL, '$2y$10$K.ht0KFMUrEkTrqmG6z2muwvXfV7KwAUw/7SDYd4/Fpwng4CPW566', 'KM879RnzKTuZWFRsA39V2t7EyppO1fKyznowLpwgcjz8phHDQNl4TLS57XlU', '2020-11-16 06:49:22', '2020-11-16 06:49:22', 3),
(22, 'Sofyan', 's@gmail.com', NULL, '$2y$10$p1Ye8d6XlcD6oJuaxgB0T.w1J7Xw35.EgMLat1UIEitPLDCNw/UgO', 'uOtQ7siZW9X6Aa0xY8JGlRWC9VKGIqUVz459fOhlW68UDKb5gg5PlQ26Cr8Z', '2020-11-16 06:53:16', '2020-11-16 06:53:16', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biouser`
--
ALTER TABLE `biouser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `biouser_nik_unique` (`nik`),
  ADD UNIQUE KEY `biouser_rekening_unique` (`rekening`),
  ADD UNIQUE KEY `biouser_notelepon_unique` (`notelepon`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `biouser`
--
ALTER TABLE `biouser`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
