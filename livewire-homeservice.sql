-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 06:41 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livewire-homeservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'rawan', 'rawan@gmail.com', '1015177817', 'kkkkkkkkkkkkkk', '2021-11-22 03:20:18', '2021-11-22 03:20:18');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_11_12_211027_create_sessions_table', 1),
(7, '2021_11_13_002429_add_phone_to_users_table', 2),
(8, '2021_11_13_013633_create_service_categories_table', 3),
(9, '2021_11_16_153943_create_services_table', 4),
(10, '2021_11_21_004905_add_featured_to_services_table', 5),
(11, '2021_11_21_013205_add_featured_to_service_categories_table', 6),
(12, '2021_11_21_020832_create_sliders_table', 7),
(13, '2021_11_22_015054_create_service_providers_table', 8),
(14, '2021_11_22_043011_create_contacts_table', 9);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `discount_type` enum('fixed','percent') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inclusion` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exclusion` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Featured` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `slug`, `tagline`, `service_category_id`, `price`, `discount`, `discount_type`, `image`, `thumbnail`, `description`, `inclusion`, `exclusion`, `status`, `created_at`, `updated_at`, `Featured`) VALUES
(2, 'Ahmed helper', 'ahmed-helper', 'service_3.jpg', 3, '200.00', NULL, NULL, NULL, 'service_3.jpg', NULL, NULL, NULL, 1, '2021-11-18 15:12:41', '2021-11-18 15:12:41', 1),
(3, 'laborum in doloribus aliquam', 'laborum-in-doloribus-aliquam', 'Dolorum qui sit in.', 6, '152.00', NULL, NULL, 'service_6.jpg', 'service_6.jpg', 'Est voluptates explicabo aut nobis sapiente nulla praesentium ut. Aperiam harum quam recusandae quia impedit sit perspiciatis. Magnam consequatur voluptatibus tempora velit laborum dolorum beatae. Possimus molestiae nihil qui ut. Quam at et aperiam perferendis qui mollitia. Corrupti et mollitia sit minus. Qui nisi libero rerum id voluptate et cum. Molestiae sunt id provident recusandae est quas. Cupiditate est nulla beatae dolores.', 'Enim nulla nisi ea.|Iusto aut quia.|Quod velit laborum.|Quia est voluptatem.|Reprehenderit aut.', 'Voluptatem repellat.|Nam et earum iusto.|Consequuntur velit.|Sint sapiente.|Sunt esse.', 1, '2021-11-17 02:43:36', '2021-11-17 02:43:36', 1),
(4, 'tommy catsh', 'tommy-cash', 'service_4.jpg', 4, '200.00', '10.00', 'percent', 'service_4.jpg', 'service_4.jpg', NULL, NULL, NULL, 1, NULL, NULL, 1),
(5, 'gaz', 'gaz', 'service_2.jpg', 2, '200.00', '10.00', 'percent', 'service_2.jpg', 'service_2.jpg', NULL, NULL, NULL, 1, '2021-11-18 15:16:46', '2021-11-18 15:16:46', 0),
(6, 'et voluptate aperiam et', 'et-voluptate-aperiam-et', 'Aperiam culpa optio.', 5, '374.00', NULL, NULL, 'service_1.jpg', 'service_1.jpg', 'Omnis minus aperiam voluptatem amet aut consequatur quisquam fugiat. Sint accusamus vitae facilis autem dolorum aut delectus quia. Excepturi vel expedita corrupti quam eum dolorem. Consequatur molestiae nisi quis est eum ad numquam. Nam et quis esse commodi totam. Voluptatem ipsa explicabo at omnis nemo perspiciatis. Ut dolor occaecati corporis dolore.', 'Iusto iste ad eos.|Consequatur placeat.|Laudantium.|Quia rem voluptatem.|Corrupti quo.', 'Est eum at.|Nemo quia est rerum.|Tenetur rerum aut.|Ipsum illo soluta.|Quia id asperiores.', 1, '2021-11-17 18:49:28', '2021-11-17 18:49:28', 1),
(9, 'Tommy Helper', 'tommy-helper', 'Tommy', 6, '500.00', '50.00', 'fixed', '1637381141.jpg', '1637381141.png', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Etiam pulvinar eros eu felis varius, nec eleifend risus faucibus.|Donec gravida sem vel nibh feugiat tincidunt.|Ut at dui id turpis gravida ultricies id interdum enim.|Donec posuere velit non sem viverra rutrum.|In sodales risus ac felis aliquam finibus.|Fusce sed lorem non massa tristique commodo.|Cras efficitur dolor commodo urna pulvinar aliquam.', 'Suspendisse mattis erat non erat blandit luctus id vitae ligula.|Quisque vestibulum arcu non odio aliquet, sed laoreet turpis fringilla.|Vestibulum ac velit vel lectus blandit pulvinar sed convallis odio.|Aenean non ante feugiat nisi tempus facilisis.|Sed ac eros non nulla pharetra consequat.|Nulla maximus nibh in facilisis placerat.|Morbi id velit id libero blandit luctus.|Sed hendrerit ex non lacus ultricies porttitor.', 1, '2021-11-20 02:05:41', '2021-11-20 02:05:41', 0),
(10, 'Ac', 'ac', 'Ac', 7, '500.00', '50.00', 'percent', '1637460369.jpg', '1637460369.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Etiam pulvinar eros eu felis varius, nec eleifend risus faucibus.|Donec gravida sem vel nibh feugiat tincidunt.|Ut at dui id turpis gravida ultricies id interdum enim.|Donec posuere velit non sem viverra rutrum.|In sodales risus ac felis aliquam finibus.|Fusce sed lorem non massa tristique commodo.|Cras efficitur dolor commodo urna pulvinar aliquam', 'Suspendisse mattis erat non erat blandit luctus id vitae ligula.|Quisque vestibulum arcu non odio aliquet, sed laoreet turpis fringilla.|Vestibulum ac velit vel lectus blandit pulvinar sed convallis odio.|Aenean non ante feugiat nisi tempus facilisis.|Sed ac eros non nulla pharetra consequat.|Nulla maximus nibh in facilisis placerat.|Morbi id velit id libero blandit luctus.|Sed hendrerit ex non lacus ultricies porttitor.', 1, '2021-11-21 00:06:09', '2021-11-21 00:06:09', 0),
(11, 'Ac', 'ac', 'Ac', 7, '500.00', '50.00', 'percent', '1637460370.jpg', '1637460370.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Etiam pulvinar eros eu felis varius, nec eleifend risus faucibus.|Donec gravida sem vel nibh feugiat tincidunt.|Ut at dui id turpis gravida ultricies id interdum enim.|Donec posuere velit non sem viverra rutrum.|In sodales risus ac felis aliquam finibus.|Fusce sed lorem non massa tristique commodo.|Cras efficitur dolor commodo urna pulvinar aliquam', 'Suspendisse mattis erat non erat blandit luctus id vitae ligula.|Quisque vestibulum arcu non odio aliquet, sed laoreet turpis fringilla.|Vestibulum ac velit vel lectus blandit pulvinar sed convallis odio.|Aenean non ante feugiat nisi tempus facilisis.|Sed ac eros non nulla pharetra consequat.|Nulla maximus nibh in facilisis placerat.|Morbi id velit id libero blandit luctus.|Sed hendrerit ex non lacus ultricies porttitor.', 1, '2021-11-21 00:06:10', '2021-11-21 00:06:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`, `featured`) VALUES
(2, 'Beauty', 'beauty', '1521969358.png', NULL, '2021-11-20 23:38:08', 1),
(3, 'plumbing', 'plumbing', '1521969409.png', NULL, NULL, 1),
(4, 'Electrical', 'electrical', '1521969419.png', NULL, NULL, 1),
(5, 'water', 'water', '1521969430.png', NULL, NULL, 1),
(6, 'House service', 'house-service', '1636774953.png', '2021-11-13 01:42:33', '2021-11-20 23:35:29', 1),
(7, 'Ac', 'ac', '1637460040.png', '2021-11-21 00:00:40', '2021-11-21 00:00:40', 0),
(8, 'Tv', 'tv', '1637460062.png', '2021-11-21 00:01:02', '2021-11-21 00:01:02', 0),
(9, 'refrigerator', 'refrigerator', '1637460082.png', '2021-11-21 00:01:22', '2021-11-21 00:01:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_providers`
--

CREATE TABLE `service_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_locations` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_providers`
--

INSERT INTO `service_providers` (`id`, `user_id`, `image`, `about`, `city`, `service_category_id`, `service_locations`, `created_at`, `updated_at`) VALUES
(1, 7, '1637552907.png', 'the best one', 'alex', 7, NULL, '2021-11-22 00:55:36', '2021-11-22 01:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `utype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'CST',
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `utype`, `last_activity`) VALUES
('MpnjVRhp2PkO8JZHqteX4MnFLrNFzz5pJLaaXyll', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNWI5aERrdkhFUWJ5WFNhOVVFSnQxWVlsNUtQWFdObkpJUEFTR2Q0TyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9BbGxzZXJ2aWNlcyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRjZlo2VTk2dU5oU1NGWWpvRDJ6Vlp1S09USUU1NHJ2VzFXR1JNSzNTZ1piWTY2c3NSRlRubSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkY2ZaNlU5NnVOaFNTRllqb0QyelZadUtPVElFNTRydlcxV0dSTUszU2daYlk2NnNzUkZUbm0iO30=', 'CST', 1637559630);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'first slider', '1637462473.jpg', 1, '2021-11-21 00:41:13', '2021-11-21 00:41:13'),
(2, 'Second slider', '1637462487.jpg', 1, '2021-11-21 00:41:27', '2021-11-21 00:41:27');

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'CST',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `utype`, `created_at`, `updated_at`, `phone`) VALUES
(1, 'Admin', 'Admin@admin.com', NULL, '$2y$10$cfZ6U96uNhSSFYjoD2zVZuKOTIE54rvW1WGRMK3SgZbY66ssRFTnm', NULL, NULL, NULL, NULL, NULL, 'ADM', '2021-11-12 20:32:36', '2021-11-12 20:32:36', NULL),
(2, 'S provider', 'sprovider@service.com', NULL, '$2y$10$rWac8SajYHzN.8e7uDgfB.7SOanlDB6XPdihOvVRaycH2/V05PSsW', NULL, NULL, NULL, NULL, NULL, 'SVP', '2021-11-12 20:33:40', '2021-11-12 20:33:40', NULL),
(3, 'Juedi', 'jude@gmail.com', NULL, '$2y$10$7rgPrrF0zwIakEqY3D4asu.e/x/0NCCb2wqGUoNqXVBWhu5bDQlcW', NULL, NULL, NULL, NULL, NULL, 'CST', '2021-11-12 20:34:19', '2021-11-12 20:34:19', NULL),
(4, 'mazen', 'mazen@gmail.com', NULL, '$2y$10$GLEChu5kUsZ91oJ0qICtsuVxPdK/1HC23DssYkahw41YqA7WJDvLm', NULL, NULL, NULL, NULL, NULL, 'CST', '2021-11-12 23:29:20', '2021-11-12 23:29:20', '1015177817'),
(6, 'rawan', 'rawan@gmail.com', NULL, '$2y$10$G5gk/5n2D3IS8OIZc90meedzQxNwuFBh28YUCpJ.smtZhJATzAba6', NULL, NULL, NULL, NULL, NULL, 'SVP', '2021-11-12 23:33:23', '2021-11-12 23:33:23', '1288437786'),
(7, 'ahmed El3bet', 'ahmed@gmail.com', NULL, '$2y$10$z5h1j3TG3.gNrkLIOM8E2OGQoB3KqKv9zRDWNF2TAFOxtBPLmLM8C', NULL, NULL, NULL, NULL, NULL, 'SVP', '2021-11-22 00:55:36', '2021-11-22 00:55:36', '1288437786');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_service_category_id_foreign` (`service_category_id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_categories_slug_index` (`slug`);

--
-- Indexes for table `service_providers`
--
ALTER TABLE `service_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_providers_user_id_foreign` (`user_id`),
  ADD KEY `service_providers_service_category_id_foreign` (`service_category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service_providers`
--
ALTER TABLE `service_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_service_category_id_foreign` FOREIGN KEY (`service_category_id`) REFERENCES `service_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_providers`
--
ALTER TABLE `service_providers`
  ADD CONSTRAINT `service_providers_service_category_id_foreign` FOREIGN KEY (`service_category_id`) REFERENCES `service_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_providers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
