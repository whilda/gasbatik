-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2016 at 01:21 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batikshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset_histories`
--

CREATE TABLE `asset_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `asset` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transactions`
--

CREATE TABLE `detail_transactions` (
  `trans_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `unit_price` int(11) NOT NULL,
  `unit_profit` int(11) NOT NULL,
  `sum_price` int(11) NOT NULL,
  `sum_profit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `material_id` int(10) UNSIGNED NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_histories`
--

CREATE TABLE `item_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `materials`
--

TRUNCATE TABLE `materials`;
--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Katun', '2016-06-05 18:58:25', '2016-06-05 18:58:25'),
(2, 'Sunwosh', '2016-06-05 18:58:37', '2016-06-05 18:58:37'),
(3, 'Semi Sutra', '2016-06-05 18:58:55', '2016-06-05 18:58:55'),
(4, 'Prodo', '2016-06-13 13:22:52', '2016-06-13 13:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trans_date` date NOT NULL,
  `total` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `types`
--

TRUNCATE TABLE `types`;
--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hem', '2016-06-05 18:52:29', '2016-06-05 18:52:29'),
(2, 'Kemeja', '2016-06-05 18:52:38', '2016-06-05 18:52:38'),
(3, 'Blus Pendek', '2016-06-05 18:53:01', '2016-06-05 18:53:01'),
(4, 'Blus Pd', '2016-06-05 18:56:46', '2016-06-05 18:56:46'),
(5, 'Blus 3/4', '2016-06-05 18:57:12', '2016-06-05 18:57:12'),
(6, 'Blus Pj', '2016-06-05 18:57:22', '2016-06-05 18:57:22'),
(7, 'Gamis', '2016-06-05 18:57:58', '2016-06-05 18:57:58'),
(8, 'Sorjan', '2016-06-05 18:58:09', '2016-06-05 18:58:09'),
(9, 'Sarimbit Gamis SRG', '2016-06-13 12:52:29', '2016-06-13 12:52:29'),
(10, 'Sarimbit Dreess SRD', '2016-06-13 12:52:54', '2016-06-13 12:52:54'),
(11, 'Sarimbit Blus SRB', '2016-06-13 12:53:19', '2016-06-13 12:53:19'),
(12, 'Dress', '2016-06-13 12:54:04', '2016-06-13 12:54:04'),
(13, 'JumpSuit JS', '2016-06-13 12:54:32', '2016-06-13 12:54:32'),
(14, 'Setelan Kaos STK', '2016-06-13 12:55:21', '2016-06-13 12:55:21'),
(15, 'Setelan Kebaya STB', '2016-06-13 12:56:02', '2016-06-13 12:56:02'),
(16, 'Kebaya Atasan', '2016-06-13 12:56:35', '2016-06-13 12:56:35'),
(17, 'Blangkon Jogja', '2016-06-13 12:56:59', '2016-06-13 12:56:59'),
(18, 'Blangkon Solo', '2016-06-13 12:57:17', '2016-06-13 12:57:17'),
(19, 'Iket', '2016-06-13 12:57:30', '2016-06-13 12:57:30'),
(20, 'Topi', '2016-06-13 12:57:40', '2016-06-13 12:57:40'),
(21, 'Krudung Paris', '2016-06-13 12:58:07', '2016-06-13 12:58:07'),
(22, 'Krudung Kolong', '2016-06-13 12:58:26', '2016-06-13 12:58:26'),
(23, 'Krudung Pasmina', '2016-06-13 12:58:47', '2016-06-13 12:58:47'),
(24, 'Krudung Dalaman', '2016-06-13 12:59:01', '2016-06-13 12:59:01'),
(25, 'Tas Batik', '2016-06-13 12:59:39', '2016-06-13 12:59:39'),
(26, 'Mukena Batik', '2016-06-13 12:59:52', '2016-06-13 12:59:52'),
(27, 'Kaos Wayang', '2016-06-13 13:00:25', '2016-06-13 13:00:25'),
(28, 'Rok Batik', '2016-06-13 13:00:52', '2016-06-13 13:00:52'),
(29, 'Celana Batik', '2016-06-13 13:01:11', '2016-06-13 13:01:11'),
(30, 'Bolero', '2016-06-13 13:38:42', '2016-06-13 13:38:42'),
(31, 'Bobal Bolero Bolak-balik', '2016-06-13 13:39:08', '2016-06-13 13:39:08'),
(32, 'Daster', '2016-07-09 15:14:28', '2016-07-09 15:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Guyub Hana Haq', 'guyubhana@gmail.com', '$2y$10$3hWeEbMjwggNs32euHEr..kLdyQbM0k4SSZVPcke1.z76uvIIej3u', 'UU7y3rcvSa9ofTIQzQB9Wq8EpIVdMyxLNOlvAZWo04YqCuqNPfldVyua3NTU', NULL, '2016-07-25 18:24:57'),
(2, 'Whilda Chaq', 'whildachaq@gmail.com', '$2y$10$d4Y2wNF6gwW8SEL3eP6vueLxRkjy0e1Riehcf40is/vCNDcfzW2yO', '', NULL, '2016-08-06 13:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `vendors`
--

TRUNCATE TABLE `vendors`;
--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Putri Lestari', '2016-06-05 18:49:09', '2016-06-05 18:49:09'),
(2, 'Arta Klewer', '2016-06-05 18:49:50', '2016-06-05 18:49:50'),
(3, 'Ria Batik', '2016-06-05 18:50:05', '2016-06-05 18:50:05'),
(4, 'Sri Lestari Pantai', '2016-06-05 19:11:41', '2016-06-05 19:11:41'),
(5, 'Yuliani Klewer', '2016-06-13 12:46:27', '2016-06-13 12:46:27'),
(6, 'Mardiyah Klewer', '2016-06-13 12:47:23', '2016-06-13 12:47:23'),
(7, 'H n F Kaos', '2016-06-13 12:47:52', '2016-06-13 12:47:52'),
(8, 'Yuniarti Bringharjo', '2016-06-13 12:48:33', '2016-06-13 12:48:33'),
(9, 'Blangkon Jogja', '2016-06-13 12:48:55', '2016-06-13 12:48:55'),
(10, 'Aini Blangkon Solo', '2016-06-13 12:49:22', '2016-06-13 12:49:22'),
(11, 'Atik Kebaya', '2016-06-13 12:49:42', '2016-06-13 12:49:42'),
(12, 'Benang Raja', '2016-06-13 12:49:54', '2016-06-13 12:49:54'),
(13, 'Asih Klewer', '2016-06-13 12:50:24', '2016-06-13 12:50:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset_histories`
--
ALTER TABLE `asset_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  ADD PRIMARY KEY (`trans_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `items_code_unique` (`code`),
  ADD KEY `vendor_id` (`vendor_id`,`type_id`,`material_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `material_id` (`material_id`);

--
-- Indexes for table `item_histories`
--
ALTER TABLE `item_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `materials_name_unique` (`name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `types_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset_histories`
--
ALTER TABLE `asset_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `item_histories`
--
ALTER TABLE `item_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  ADD CONSTRAINT `detail_transactions_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transactions_ibfk_2` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_ibfk_3` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_histories`
--
ALTER TABLE `item_histories`
  ADD CONSTRAINT `item_histories_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
