-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2022 at 10:40 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `type_of_activities` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `user_id`, `type_of_activities`, `created_at`, `updated_at`, `deleted_at`, `is_deleted`) VALUES
(3, 1, 'Login', '2022-09-24 03:42:23', NULL, NULL, 0),
(4, 1, 'Login', '2022-09-24 03:58:49', NULL, NULL, 0),
(5, 1, 'Logout', '2022-09-24 04:48:12', NULL, NULL, 0),
(6, 1, 'Login', '2022-09-24 04:53:52', NULL, NULL, 0),
(7, 1, 'Logout', '2022-09-24 05:28:36', NULL, NULL, 0),
(8, 1, 'Login', '2022-09-24 05:28:40', NULL, NULL, 0),
(9, 1, 'Tambah User Baru', '2022-09-24 06:50:31', NULL, NULL, 0),
(10, 1, 'Logout', '2022-09-24 06:52:16', NULL, NULL, 0),
(11, 3, 'Login', '2022-09-24 06:52:21', NULL, NULL, 0),
(12, 3, 'Logout', '2022-09-24 06:52:40', NULL, NULL, 0),
(13, 1, 'Login', '2022-09-24 06:52:43', NULL, NULL, 0),
(14, 1, 'Logout', '2022-09-24 07:54:46', NULL, NULL, 0),
(15, 2, 'Login', '2022-09-24 07:54:49', NULL, NULL, 0),
(16, 2, 'Logout', '2022-09-24 07:55:33', NULL, NULL, 0),
(17, 3, 'Login', '2022-09-24 07:55:36', NULL, NULL, 0),
(18, 3, 'Logout', '2022-09-24 08:16:48', NULL, NULL, 0),
(19, 4, 'Login', '2022-09-24 08:16:52', NULL, NULL, 0),
(20, 4, 'Logout', '2022-09-24 09:53:56', NULL, NULL, 0),
(21, 1, 'Login', '2022-09-24 10:10:05', NULL, NULL, 0),
(22, 1, 'Logout', '2022-09-24 10:10:15', NULL, NULL, 0),
(23, 3, 'Login', '2022-09-24 10:10:19', NULL, NULL, 0),
(24, 3, 'Logout', '2022-09-24 10:10:22', NULL, NULL, 0),
(25, 4, 'Login', '2022-09-24 10:10:27', NULL, NULL, 0),
(26, 4, 'Login', '2022-09-24 10:12:30', NULL, NULL, 0),
(27, 4, 'Tambah Pesanan Baru', '2022-09-24 11:56:27', NULL, NULL, 0),
(28, 4, 'Tambah Pesanan Baru', '2022-09-24 11:58:15', NULL, NULL, 0),
(29, 4, 'Logout', '2022-09-24 12:11:28', NULL, NULL, 0),
(30, 2, 'Login', '2022-09-24 12:11:32', NULL, NULL, 0),
(31, 2, 'Ubah Data Menu', '2022-09-24 12:11:37', NULL, NULL, 0),
(32, 2, 'Ubah Data Menu', '2022-09-24 12:11:41', NULL, NULL, 0),
(33, 2, 'Ubah Data Menu', '2022-09-24 12:11:47', NULL, NULL, 0),
(34, 2, 'Ubah Data Menu', '2022-09-24 12:11:52', NULL, NULL, 0),
(35, 2, 'Logout', '2022-09-24 12:11:53', NULL, NULL, 0),
(36, 4, 'Login', '2022-09-24 12:11:57', NULL, NULL, 0),
(37, 4, 'Tambah Pesanan Baru', '2022-09-24 12:17:19', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `is_deleted`) VALUES
(1, 'admin', '2022-09-23 11:56:26', NULL, NULL, 0),
(2, 'koki', '2022-09-23 11:56:26', NULL, NULL, 0),
(3, 'kasir', '2022-09-23 11:56:26', NULL, NULL, 0),
(4, 'pelayan', '2022-09-23 11:56:26', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `qty_ready` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `is_food` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `qty_ready`, `price`, `is_food`, `created_at`, `updated_at`, `deleted_at`, `is_deleted`) VALUES
(1, 'Menu ke-1 edit', 8, 20000, 1, '2022-09-23 11:56:37', '2022-09-24 12:17:19', NULL, 0),
(2, 'Menu ke-2', 8, 20000, 0, '2022-09-23 11:56:37', '2022-09-24 12:11:41', NULL, 0),
(3, 'Menu ke-3', 6, 30000, 1, '2022-09-23 11:56:37', '2022-09-24 12:11:47', NULL, 0),
(4, 'Menu ke-4', 2, 40000, 0, '2022-09-23 11:56:37', '2022-09-24 12:17:19', NULL, 0),
(5, 'tambah data', 20, 87679, 0, NULL, '2022-09-24 07:50:21', '2022-09-24 07:51:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(19, '2022-09-22-151725', 'App\\Database\\Migrations\\Level', 'default', 'App', 1663861441, 1),
(20, '2022-09-22-151728', 'App\\Database\\Migrations\\Users', 'default', 'App', 1663861441, 1),
(21, '2022-09-22-151734', 'App\\Database\\Migrations\\History', 'default', 'App', 1663861441, 1),
(22, '2022-09-22-151742', 'App\\Database\\Migrations\\Menu', 'default', 'App', 1663861441, 1),
(23, '2022-09-22-151746', 'App\\Database\\Migrations\\Orders', 'default', 'App', 1663861441, 1),
(24, '2022-09-22-151800', 'App\\Database\\Migrations\\OrderLists', 'default', 'App', 1663861441, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `number_of_table` int(11) DEFAULT NULL,
  `is_finish` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number_of_table`, `is_finish`, `created_at`, `updated_at`, `deleted_at`, `is_deleted`) VALUES
(4, 4, 'ABC24092022-22', 22, 0, '2022-09-24 11:58:15', NULL, NULL, 0),
(5, 4, 'ABC24092022-33', 33, 0, '2022-09-24 12:17:19', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders_lists`
--

CREATE TABLE `orders_lists` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `menu_id` int(11) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_lists`
--

INSERT INTO `orders_lists` (`id`, `order_id`, `menu_id`, `total`, `price`, `created_at`, `updated_at`, `deleted_at`, `is_deleted`) VALUES
(1, 4, 1, 1, 20000, '2022-09-24 11:58:15', NULL, NULL, 0),
(2, 4, 3, 2, 30000, '2022-09-24 11:58:15', NULL, NULL, 0),
(3, 4, 4, 3, 40000, '2022-09-24 11:58:15', NULL, NULL, 0),
(4, 5, 1, 2, 20000, '2022-09-24 12:17:19', NULL, NULL, 0),
(5, 5, 4, 5, 40000, '2022-09-24 12:17:19', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `level_id` int(11) UNSIGNED NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `level_id`, `username`, `password`, `name`, `is_active`, `created_at`, `updated_at`, `deleted_at`, `is_deleted`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1, '2022-09-23 11:56:32', NULL, NULL, 0),
(2, 2, 'koki', 'c38be0f1f87d0e77a0cd2fe6941253eb', 'koki', 1, '2022-09-23 11:56:32', NULL, NULL, 0),
(3, 3, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'kasir', 1, '2022-09-23 11:56:32', NULL, NULL, 0),
(4, 4, 'pelayan', '511cc40443f2a1ab03ab373b77d28091', 'pelayan', 1, '2022-09-23 11:56:32', NULL, NULL, 0),
(7, 2, '1880', '3214a6d842cc69597f9edf26df552e43', 'testing', 1, '2022-09-24 06:50:31', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `histories_user_id_foreign` (`user_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders_lists`
--
ALTER TABLE `orders_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_lists_menu_id_foreign` (`menu_id`),
  ADD KEY `orders_lists_order_id_foreign` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_level_id_foreign` (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders_lists`
--
ALTER TABLE `orders_lists`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders_lists`
--
ALTER TABLE `orders_lists`
  ADD CONSTRAINT `orders_lists_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `orders_lists_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
