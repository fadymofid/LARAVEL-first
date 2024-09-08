-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2024 at 06:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `username`, `title`, `message`, `created_at`, `updated_at`) VALUES
(1, 'hoda', 'fdasf', 'afdasasfsdafdsfsad fas fdas  asfd asfed', '2024-09-02 16:12:11', '2024-09-02 16:12:11'),
(2, 'hassan', 'there is a contact', 'Thank you ENG/ Mahmoud ElZanklony', '2024-09-02 20:54:57', '2024-09-02 20:54:57'),
(3, 'fadfa', 'dfasdfas', 'asdffafasdfdsafds sa da sadfdsa asdfvsav', '2024-09-02 21:59:03', '2024-09-02 21:59:03'),
(4, 'fady', 'Title', 'very very very very very very big message', '2024-09-02 22:38:45', '2024-09-02 22:38:45');

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imageable_id` varchar(255) NOT NULL,
  `imageable_type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `imageable_id`, `imageable_type`, `name`, `created_at`, `updated_at`) VALUES
(1, '11', 'App\\Models\\User', 'users/1725303626982864606_image_images.jpeg', '2024-09-02 16:00:26', '2024-09-02 16:00:26'),
(2, '12', 'App\\Models\\User', 'default.png', '2024-09-02 17:59:00', '2024-09-02 17:59:00'),
(3, '13', 'App\\Models\\User', 'default.png', '2024-09-02 17:59:35', '2024-09-02 17:59:35'),
(4, '15', 'App\\Models\\User', 'users/1725315746832160315_image_1671625374487.jpg', '2024-09-02 19:22:26', '2024-09-02 19:22:26'),
(5, '16', 'App\\Models\\User', 'users/172531610477680569_image_1671625377624.jpg', '2024-09-02 19:28:24', '2024-09-02 19:28:24'),
(6, '17', 'App\\Models\\User', 'users/1725321203472629455_image_Gaming_5000x3125.jpg', '2024-09-02 20:53:23', '2024-09-02 20:53:23'),
(7, '18', 'App\\Models\\User', 'users/1725321378313792993_image_led.jpg', '2024-09-02 20:56:18', '2024-09-02 20:56:18'),
(8, '20', 'App\\Models\\User', 'users/1725722431238940525_image_table.jpg', '2024-09-07 12:20:32', '2024-09-07 12:20:32'),
(9, '21', 'App\\Models\\User', 'default.png', '2024-09-07 12:22:24', '2024-09-07 12:22:24'),
(10, '22', 'App\\Models\\User', 'users/1725722593576075706_image_sofa.jpg', '2024-09-07 12:23:13', '2024-09-07 12:23:13'),
(11, '23', 'App\\Models\\User', 'users/1725723560228740813_image_sofa.jpg', '2024-09-07 12:39:20', '2024-09-07 12:39:20'),
(12, '24', 'App\\Models\\User', 'users/1725723780199641300_image_store.png', '2024-09-07 12:43:00', '2024-09-07 12:43:00'),
(13, '9', 'App\\Models\\products', 'images/R4ceZDn3i7CMt9MUW0XAGUw701TYvV2evKIA1GT7.jpg', '2024-09-07 16:43:50', '2024-09-07 16:43:50'),
(14, '10', 'App\\Models\\products', 'images/qyZdMGWAnuMx4MNULRzHENDQx4oj4y2vvnHxDdlF.jpg', '2024-09-07 17:19:19', '2024-09-07 17:19:19'),
(15, '11', 'App\\Models\\products', 'images/MYRqrDULGUd6Ty7kEDXEtGB3JilMF3eE2pVol302.jpg', '2024-09-07 17:38:56', '2024-09-07 17:38:56'),
(16, '12', 'App\\Models\\products', 'images/ITCZVMgnQ5eSfSRNjwU8Kpem86O4DSJdmluBvaKN.jpg', '2024-09-07 18:25:04', '2024-09-07 18:25:04'),
(17, '13', 'App\\Models\\products', 'images/hsfCTE1VMPEHsC8IjqmUdWgfhTqNZ8ZXYwScMf2V.jpg', '2024-09-07 18:52:56', '2024-09-07 18:52:56'),
(18, '13', 'App\\Models\\Product', 'products/1725745976147045459_image_chair.jpg', '2024-09-07 18:52:56', '2024-09-07 18:52:56'),
(19, '14', 'App\\Models\\products', 'images/mEpv6Wpfk4h5NYiPgzIlZLIGHvQ3thdTQ7tjfGbG.jpg', '2024-09-08 01:02:53', '2024-09-08 01:02:53'),
(20, '14', 'App\\Models\\Product', 'products/172576817314856903_image_chair.jpg', '2024-09-08 01:02:53', '2024-09-08 01:02:53'),
(21, '15', 'App\\Models\\products', 'images/QacbmnJUy1BhFaJvGGFlozxLC8QnnMCiQ5jISLQC.jpg', '2024-09-08 01:03:49', '2024-09-08 01:03:49'),
(22, '15', 'App\\Models\\Product', 'products/1725768229394439917_image_table.jpg', '2024-09-08 01:03:49', '2024-09-08 01:03:49'),
(23, '16', 'App\\Models\\products', 'images/Wd9d0Br5SsJEIT2RBP6jqH0gCAX6m8Trs8UnoQMj.jpg', '2024-09-08 01:04:08', '2024-09-08 01:04:08'),
(24, '16', 'App\\Models\\Product', 'products/172576824824847894_image_table.jpg', '2024-09-08 01:04:08', '2024-09-08 01:04:08'),
(25, '17', 'App\\Models\\products', 'images/9xy3k11Q3t8hcnbsAIFC44k5jv7zIUz8dpw6EEwl.webp', '2024-09-08 01:04:23', '2024-09-08 01:04:23'),
(26, '17', 'App\\Models\\Product', 'products/1725768263439738357_image_172573665986774893_image_laptop.png', '2024-09-08 01:04:23', '2024-09-08 01:04:23'),
(27, '18', 'App\\Models\\products', 'images/vNiyGPeeE6mxPtIvAAemH48Klgj3VptEnvj8qzrN.jpg', '2024-09-08 01:05:30', '2024-09-08 01:05:30'),
(28, '18', 'App\\Models\\Product', 'products/1725768330717018281_image_led.jpg', '2024-09-08 01:05:30', '2024-09-08 01:05:30'),
(29, '19', 'App\\Models\\products', 'images/iToDFxdWv6vWgs8zi44Ox3OHh679iGrPZ3vv1ARs.jpg', '2024-09-08 01:06:04', '2024-09-08 01:06:04'),
(30, '19', 'App\\Models\\Product', 'products/1725768364788295161_image_sofa.jpg', '2024-09-08 01:06:04', '2024-09-08 01:06:04');

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
(5, '2024_08_30_072016_create_contacts_table', 1),
(6, '2024_08_27_163702_create_subjects_table', 2),
(7, '2024_08_27_164639_create_users_subjects_table', 2),
(8, '2024_08_27_181501_create_questions_table', 2),
(9, '2024_09_01_170529_create_images_table', 2),
(10, '2024_09_03_151747_create_products_table', 3),
(11, '2024_09_07_233205_create_orders_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 16, '2024-09-07 23:50:15', '2024-09-07 23:50:15'),
(2, 13, '2024-09-08 00:59:02', '2024-09-08 00:59:02'),
(3, 24, '2024-09-08 01:09:29', '2024-09-08 01:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` text NOT NULL,
  `price` double(8,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `info`, `price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(10, 24, 'Baseball Jacket', 'Made In the USA', 9000.00, NULL, '2024-09-07 17:19:19', '2024-09-07 17:19:19'),
(14, 24, 'chair', 'Wooden chair', 3234.00, NULL, '2024-09-08 01:02:52', '2024-09-08 01:02:52'),
(15, 24, 'table', 'Wooden table', 10000.00, NULL, '2024-09-08 01:03:49', '2024-09-08 01:03:49'),
(17, 24, 'laptop', 'Gaming Laptop', 20000.00, NULL, '2024-09-08 01:04:23', '2024-09-08 01:04:23'),
(18, 24, 'led', 'rgb', 500.00, NULL, '2024-09-08 01:05:30', '2024-09-08 01:05:30'),
(19, 24, 'sofa', 'comfortable turkish sofa', 500.00, NULL, '2024-09-08 01:06:04', '2024-09-08 01:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `info` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `phone`, `type`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'hoda', 'hoda@gmail.com', NULL, '$2y$10$CKlXIQsq5VLk8UHDZ5dcmeRR6pXuigjAgg6KgxA2H51shuN77TJIq', '01267549387', 'client', NULL, '2024-09-02 16:00:26', '2024-09-02 16:00:26', NULL),
(13, 'khaled', 'khaled@gmail.com', NULL, '$2y$10$ecQzWHtc.u1c2waaaLRvaem26yl0aNsglY1iMdoRT4LCWT10baZT6', '01223274286', 'client', NULL, '2024-09-02 17:59:35', '2024-09-02 19:20:55', NULL),
(14, 'fady', 'fady@gmail.com', NULL, '$2y$10$eFsD4mKFZ0QjnHAmTaLba.LoPoktXyxvCN.4DbSFBTPnP2uH/fjNW', '012222222', 'admin', NULL, '2024-09-02 18:01:32', '2024-09-02 18:01:32', NULL),
(16, 'ali', 'ali@gmail.com', NULL, '$2y$10$3pngCUV/MNqE1UaXU6W4cuxHy4s0U2oG26hpo8pcGxNFMrhUGU9fe', '01223274286', 'client', NULL, '2024-09-02 19:28:24', '2024-09-02 19:28:24', NULL),
(17, 'hassan', 'hassan@gmail.com', NULL, '$2y$10$tBQAk4cBWcsY0.fDjRDRfeTGGs7LHnq2e.nD1pVlMEzfBzQNKOpha', '01228595410', 'client', NULL, '2024-09-02 20:53:23', '2024-09-02 20:53:23', NULL),
(18, 'tony', 'tony@gmail.com', NULL, '$2y$10$hOeqESb.oZmC0ohqiGLmUuT5kXcfsOV1wgjW/oyVXA1jxJTm/fpMm', '01279783959', 'admin', NULL, '2024-09-02 20:56:18', '2024-09-02 20:56:49', NULL),
(20, 'hazem', 'hazem@gmail.com', NULL, '$2y$10$MfEpdhbrEXJI2NtZevLmf.WrJsewI8397tqtghS.MmhLjmnM2e4vy', '01278816303', 'client', NULL, '2024-09-07 12:20:32', '2024-09-07 12:20:32', NULL),
(24, 'tamer', 'tamer@gmail.com', NULL, '$2y$10$XY6gzh7L4TJghq9MtQbszeeGxAVwwpNReLGjaR9E4YFkuHsbuYMMO', '01228595410', 'seller', NULL, '2024-09-07 12:43:00', '2024-09-07 12:43:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_subjects`
--

CREATE TABLE `users_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `images`
--
ALTER TABLE `images`
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
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_user_id_foreign` (`user_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_subjects`
--
ALTER TABLE `users_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_subjects_user_id_foreign` (`user_id`),
  ADD KEY `users_subjects_subject_id_foreign` (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users_subjects`
--
ALTER TABLE `users_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_subjects`
--
ALTER TABLE `users_subjects`
  ADD CONSTRAINT `users_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_subjects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
