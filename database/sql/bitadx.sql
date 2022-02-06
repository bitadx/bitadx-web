-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2022 at 06:02 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitadx`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `slug`, `keywords`, `image`, `description`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Dry Fruits', 'dry-fruits', 'Dry Fruits', '/uploads/categories/612446321f7b61629767218.dry-fruits.jpg', 'Dry Fruit items', '2021-07-27 20:36:24', '2021-08-23 19:36:58', '1'),
(2, 'Herbs', 'herbs', 'Herbs', '/uploads/categories/6124459e9c7161629767070.herbs.jpg', 'herbs items', '2021-07-27 20:38:36', '2021-08-23 19:34:30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `course_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `ratings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availability` int(11) DEFAULT 1,
  `course_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_seo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_step` int(11) NOT NULL,
  `course_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `is_special` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `category_id`, `course_title`, `course_image`, `price`, `ratings`, `availability`, `course_description`, `seo_title`, `summary`, `keywords`, `slug`, `extra_seo`, `status`, `created_at`, `updated_at`, `active_step`, `course_details`, `is_special`) VALUES
(1, 2, 'Bavari Misal', '/uploads/product/images/6100cceb960d71627442411.single.png', '180', '4', NULL, '<div><div>The lysine contingency - it\'s intended to prevent the spread of the animals is case they ever got off the island. Dr. Wu inserted a gene that makes a single faulty enzyme in protein metabolism. The prevent the spread of the animals isanimals can\'t manufacture the amino acid lysine. Unless they\'re continually supplied with lysine by us, they\'ll slip into a coma and die.</div><div><br></div><div>The lysine contingency - it\'s intended to prevent the spread of the animals is case they ever got off the island. Dr. Wu inserted a gene that makes a single faulty enzyme in protein metabolism.</div></div>', 'main meta title tag hu', 'main summary & descripttion meta hu', 'main keyword meta tg hu', 'bawai-misal', NULL, '1', '2021-07-27 21:50:11', '2021-08-28 02:03:41', 1, '<div>Sorting ? Arranging the data items in some order i.e. in ascending or descending order in case of numerical data and in dictionary order in case of alphanumeric data.<br></div>', '2'),
(3, 1, 'Ut repudiandae et bl', '/uploads/product/images/6104af0ab22ab1627696906.food3.jpg', '109', '2', NULL, '<div>lorem ipsfjd</div>', 'Lorem a fugiat sit', 'Dignissimos nihil mi', 'Rerum mollit quo lab', 'veniam-quaerat-elig', NULL, '1', '2021-07-30 20:31:46', '2021-08-28 02:23:26', 1, '<div>lorem ipsfjd</div>', '2'),
(4, 1, 'Labore veniam incid', '/uploads/product/images/610f6aca43b321628400330.002_f35b73db-b5a9-4bdd-aa89-9c93feecdc2e_1800x.jpg', '747', '2', NULL, 'Dolorem et repudiand.', 'Fuga Sit adipisci', 'Quia quo saepe volup', 'Et et voluptatum a e', 'molestiae-quis-sunt', NULL, '1', '2021-08-07 23:55:30', '2021-08-28 02:27:36', 1, 'Quaerat consequat. Q.', '1'),
(5, 2, 'Sit est sint et sit', '/uploads/product/images/6129e46cbcca51630135404.1589171505.furniture-and-household.png', '471', NULL, NULL, 'Sunt est consectetu', 'Sed laboriosam prae', 'Sint qui velit beat', 'Voluptas exercitatio', 'sit-est-sint-et-sit', NULL, '1', '2021-08-28 01:53:24', '2021-08-28 02:24:56', 1, 'Quasi mollit ullam a', '1');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `exchange` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wallet_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_type` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `get_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `user_id`, `exchange`, `wallet_address`, `amount`, `order_type`, `created_at`, `updated_at`, `get_amount`, `current_price`) VALUES
(20, 4, 'BTC', '12232232', '350', 'buy', '2021-11-29 22:34:07', '2021-11-29 22:34:07', NULL, NULL),
(21, 4, 'Shiba inu', NULL, '3500', 'sell', '2021-11-29 22:39:40', '2021-11-29 22:39:40', NULL, NULL),
(22, 6, 'USDT', '12232232', '500', 'buy', '2021-12-09 10:42:08', '2021-12-09 10:42:08', NULL, NULL),
(23, 7, 'BNB', '12232232', '50', 'buy', '2021-12-09 11:10:00', '2021-12-09 11:10:00', NULL, NULL),
(24, 7, 'BNB', NULL, '80', 'sell', '2021-12-09 11:40:53', '2021-12-09 11:40:53', NULL, NULL),
(25, 7, 'BNB', NULL, '80', 'sell', '2021-12-09 11:59:53', '2021-12-09 11:59:53', NULL, NULL),
(26, 7, 'BNB', NULL, '280', 'sell', '2021-12-09 12:08:12', '2021-12-09 12:08:12', NULL, NULL),
(27, 7, 'USDT', '54545445', '500', 'buy', '2021-12-19 07:16:44', '2021-12-19 07:16:44', '500.21841914248756', NULL),
(28, 7, 'BNB', '12232232', '350', 'buy', '2021-12-19 07:30:14', '2021-12-19 07:30:14', '187031.2461282967', NULL),
(29, 7, 'BNB', '154545', '200', 'buy', '2021-12-19 07:33:42', '2021-12-19 07:33:42', '106949.45621882495', NULL),
(30, 7, 'BTC', NULL, '350', 'sell', '2021-12-19 07:38:09', '2021-12-19 07:38:09', '16561034.047416903', '47317.240135476866'),
(31, 7, 'BNB', '12232232', '50', 'buy', '2021-12-19 11:38:25', '2021-12-19 11:38:25', '26657.226234875714', '533.1445246975143');

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
(21, '2021_11_30_033700_add_user_id_in_enquiries_table', 1),
(22, '2021_12_05_064525_create_wallets_table', 2),
(23, '2021_12_19_124436_add_columns_in_enquiries_table', 3);

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
-- Table structure for table `related_classes`
--

CREATE TABLE `related_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `related_course_id` int(10) UNSIGNED NOT NULL,
  `type` enum('related','popular') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `related_classes`
--

INSERT INTO `related_classes` (`id`, `course_id`, `related_course_id`, `type`, `created_at`, `updated_at`) VALUES
(4, 3, 1, 'related', NULL, NULL),
(5, 5, 4, 'related', NULL, NULL),
(6, 4, 3, 'related', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `contact_no`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@admin.com', 'admin', '2021-07-27 20:25:59', '$2y$10$FcGilSBOIm61G0uyhfpzPewN9E/pjcgZwecE9S13TwEiL5FRE4v7G', '', 1, NULL, '2021-07-27 20:25:59', '2021-07-27 20:25:59'),
(2, 'Test User', 'user@user.com', 'user', '2021-07-27 20:25:59', '$2y$10$6bhUiPuya1.6IVEd/UDrA.mrR5infJiAPbL5ABxy.ztBL9WIaB3Om', '', 1, NULL, '2021-07-27 20:25:59', '2021-07-27 20:25:59'),
(3, 'Muhammad Abad', 'abad.developer@gmail.com', 'user', NULL, '$2y$10$0eQZeGntgmgvgZGEh67MouuGFiZY7gQApKRgwhe08Q7O4G8K8FNUi', '', 1, NULL, '2021-11-27 23:56:16', '2021-11-27 23:56:16'),
(4, 'Griffin Forbes', 'nade@mailinator.com', 'user', NULL, '$2y$10$TgHAV8svUMWSN3Kzrp4/hueonRHMrCmwVFmY/5zyJBVUqVysyHPpa', '+1 (426) 852-6113', 1, 'QDz5ElqmsdvuiKmZcvLwsIj9REjhDTvlF8FY79XyFjOx2ijqcwNwiO1nvjdt', '2021-11-28 11:33:04', '2021-11-28 11:33:04'),
(5, 'Aquib Afzal', 'aquib@yopmail.com', 'user', NULL, '$2y$10$FcGilSBOIm61G0uyhfpzPewN9E/pjcgZwecE9S13TwEiL5FRE4v7G', '8923660497', 1, NULL, '2021-12-05 00:29:32', '2021-12-05 00:29:32'),
(6, 'Keaton Leon', 'bokutevy@mailinator.com', 'user', NULL, '$2y$10$Bb.XYmln0OVnGyG.UNmiH.QTlREhGyKbHBT7d51mZBPIs3rcXSv5K', '8923660497', 1, 'NXNchYbaHdNks3PdnQx2EKNrcz1DEnZNniYRj4B0Bng2vaGC8eC3bjyAVIFf', '2021-12-08 09:49:55', '2021-12-08 09:49:55'),
(7, 'Muhammad Abad', 'abad.dev01@yopmail.com', 'user', NULL, '$2y$10$mha0jXGx2dfIL/GEpZbaX.OTzSjUqRjj52/eBEEDIqKhO0Ng9ILEi', '8923660497', 1, 'L9OecGvBaVndA3rLbvWzhEvAWC3fwkw1WsttZBlTG1r5IzJn8IqaqHG4yX73', '2021-12-09 11:01:37', '2021-12-09 11:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 3, '250', '2021-12-05 04:38:57', '2021-12-05 04:38:57'),
(2, 5, '450', '2021-12-05 04:41:55', '2021-12-05 04:41:55'),
(3, 7, '400', '2021-12-09 11:02:44', '2021-12-19 11:38:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_category_id_foreign` (`category_id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enquiries_user_id_foreign` (`user_id`);

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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `related_classes`
--
ALTER TABLE `related_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `related_classes_course_id_foreign` (`course_id`),
  ADD KEY `related_classes_related_course_id_foreign` (`related_course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallets_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `related_classes`
--
ALTER TABLE `related_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD CONSTRAINT `enquiries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `related_classes`
--
ALTER TABLE `related_classes`
  ADD CONSTRAINT `related_classes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `related_classes_related_course_id_foreign` FOREIGN KEY (`related_course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
