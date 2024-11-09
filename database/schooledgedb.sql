-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2024 at 11:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schooledgedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `gender`, `phone`, `email`, `dob`, `email_verified_at`, `username`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'James', 'Gosling', 'male', '0780000121', 'admin@gmail.com', '20/12/2000', NULL, 'admin123', '$2y$12$eyTqMo1af8KsI6DpkptS/eeg50YZrjT1hgeTptFIZFSLpXRfvy6Ie', 'user.png', NULL, '2024-08-12 07:57:41', '2024-08-12 16:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `admin_social_media`
--

CREATE TABLE `admin_social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gmail` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `allow_customer_to_regiters`
--

CREATE TABLE `allow_customer_to_regiters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_partial_reg_fk_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `registration_done` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `allow_customer_to_regiters`
--

INSERT INTO `allow_customer_to_regiters` (`id`, `customer_partial_reg_fk_id`, `status`, `registration_done`, `created_at`, `updated_at`) VALUES
(19, 23, 'Allowed', 'Done', '2024-09-11 13:39:22', '2024-09-20 12:02:13'),
(20, 24, 'Allowed', 'Done', '2024-09-11 13:47:06', '2024-09-20 12:02:17'),
(22, 26, 'Allowed', 'Done', '2024-09-12 11:36:38', '2024-09-20 11:34:23'),
(23, 27, 'Allowed', 'Done', '2024-09-12 11:37:44', '2024-09-20 12:02:05'),
(24, 28, 'Allowed', 'Done', '2024-09-15 12:15:47', '2024-09-20 11:35:08'),
(25, 29, 'Allowed', 'Done', '2024-09-20 06:58:02', '2024-09-20 11:35:01'),
(26, 30, 'Allowed', 'Done', '2024-09-20 07:34:05', '2024-09-20 11:34:56');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_code` varchar(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `school_code`, `school_name`, `email`, `phone`, `country`, `username`, `password`, `image`, `created_at`, `updated_at`) VALUES
(11, 'SE00001', 'Saint famille nyamasheke', 'ntiruhungwas@gmail.com', '0734392541', 'Rwanda', 'school123', '$2y$12$HUYSk9pSVoAC2HpV04otvOTjqtF5XOKDEuYnaPgori/GGImgLTArq', 'school_logox.jpg', '2024-09-11 13:40:10', '2024-09-30 07:21:37'),
(12, 'SE00002', 'Saint joseph nyamasheke', 'bikmangeek@gmail.com', '0734000542', 'Rwanda', 'admin123', '$2y$12$HUYSk9pSVoAC2HpV04otvOTjqtF5XOKDEuYnaPgori/GGImgLTArq', 'school_logox.jpg', '2024-09-11 13:48:06', '2024-09-27 13:21:14'),
(14, 'SE00004', 'College islamic bugarama', 'indexzero900@gmail.com', '0734392543', 'Rwanda', 'nyamasheke', '$2y$12$HUYSk9pSVoAC2HpV04otvOTjqtF5XOKDEuYnaPgori/GGImgLTArq', 'school_logo.jpg', '2024-09-12 11:50:07', '2024-09-12 11:50:07'),
(15, 'SE00005', 'Epic Tumba', 'diloxyx1@gmail.com', '0734392544', 'Rwanda', 'user1234', '$2y$12$HUYSk9pSVoAC2HpV04otvOTjqtF5XOKDEuYnaPgori/GGImgLTArq', 'school_logo.jpg', '2024-09-15 12:20:31', '2024-09-15 12:20:31'),
(16, 'SE00006', 'Saint joseph muhanga', 'diloxyx2@gmail.com', '0734392545', 'Rwanda', 'admin1994', '$2y$12$HUYSk9pSVoAC2HpV04otvOTjqtF5XOKDEuYnaPgori/GGImgLTArq', 'school_logo.jpg', '2024-09-20 07:20:20', '2024-09-20 07:20:20'),
(17, 'SE00007', 'La collombe', 'diloxyz3@gmail.com', '0734392546', 'Rwanda', 'Dilofwaa', '$2y$12$HUYSk9pSVoAC2HpV04otvOTjqtF5XOKDEuYnaPgori/GGImgLTArq', 'school_logo.jpg', '2024-09-20 11:10:33', '2024-09-20 11:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `customer_partial_registers`
--

CREATE TABLE `customer_partial_registers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_partial_registers`
--

INSERT INTO `customer_partial_registers` (`id`, `school_name`, `email`, `phone`, `country`, `created_at`, `updated_at`) VALUES
(23, 'test', 'ntiruhungwab@gmail.com', '0734392541', 'Rwanda', '2024-09-11 13:39:22', '2024-09-11 13:39:22'),
(24, 'test', 'diloxyx1@gmail.com', '0785389032', 'Rwanda', '2024-09-11 13:47:06', '2024-09-11 13:47:06'),
(26, 'G.S Saint Joseph Nyamasheke', 'diloxyx2@gmail.com', '0785389000', 'Rwanda', '2024-09-12 11:36:38', '2024-09-12 11:36:38'),
(27, 'G.S Saint Joseph Nyamasheke', 'diloxyz2@gmail.com', '0785389001', 'Rwanda', '2024-09-12 11:37:44', '2024-09-12 11:37:44'),
(28, 'Apeki Tumba', 'schools.edges@gmail.com', '0785389123', 'Rwanda', '2024-09-15 12:15:47', '2024-09-15 12:15:47'),
(29, 'Gisovu', 'indexzero900@gmail.com', '0728020883', 'Rwanda', '2024-09-20 06:58:02', '2024-09-20 06:58:02'),
(30, 'La Colombe', 'bikmangeek@gmail.com', '0728020882', 'Rwanda', '2024-09-20 07:34:05', '2024-09-20 07:34:05');

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
-- Table structure for table `guest_contacts`
--

CREATE TABLE `guest_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_contacts`
--

CREATE TABLE `main_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_contacts`
--

INSERT INTO `main_contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@gmail.com', '0785389000', 'test', 'testing', '2024-08-18 10:18:46', '2024-08-18 10:18:46'),
(2, 'Bikman', 'bikmangeek@gmail.com', '0785389012', 'cool', 'cooling system', '2024-08-18 10:19:39', '2024-08-18 10:19:39'),
(3, 'Cool', 'indexzero900@gmail.com', '0728020881', 'Tec', 'Hey', '2024-08-18 11:23:31', '2024-08-18 11:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `main_subscribers`
--

CREATE TABLE `main_subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_subscribers`
--

INSERT INTO `main_subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'test@gmail.com', '2024-08-18 11:30:37', '2024-08-18 11:30:37'),
(2, 'diloxyx1@gmail.com', '2024-08-18 11:34:06', '2024-08-18 11:34:06'),
(3, 'c@gmail.com', '2024-08-26 08:47:46', '2024-08-26 08:47:46');

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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_07_13_073346_create_admins_table', 1),
(5, '2024_07_13_100037_create_guest_contacts_table', 1),
(6, '2024_07_14_104925_create_user_roles_table', 1),
(7, '2024_07_15_081520_2014_10_12_100000_create_users_table', 1),
(8, '2024_07_31_112501_create_admin_social_media_table', 1),
(9, '2024_08_02_082810_create_send_email_to_user_to_registers_table', 1),
(10, '2024_08_06_084131_create_reset_code_passwords_table', 1),
(11, '2024_08_07_114614_add_last_active_at_to_users_table', 1),
(12, '2024_08_11_150502_add_role_id_foreign_key_to_users_table', 1),
(13, '2024_08_12_095249_create_sessions_table', 2),
(14, '2024_08_15_080926_create_share_holders_table', 3),
(15, '2024_08_18_111624_create_main_contacts_table', 3),
(16, '2024_08_18_122220_create_main_subscribers_table', 4),
(17, '2024_08_19_092839_add_image_in_share_holder_table', 5),
(18, '2024_09_02_151544_create_period_prices_table', 6),
(19, '2024_09_02_151614_create_price_ranges_table', 6),
(20, '2024_09_06_090013_create_customer_partial_registers_table', 7),
(21, '2024_09_08_123935_create_allow_customer_to_regiters_table', 8),
(22, '2024_09_09_110107_create_customers_table', 9),
(23, '2024_09_11_092946_add_customer_registration_status', 10),
(24, '2024_09_11_095218_drop_column_from_allow_customer_to_regiters_table', 11),
(25, '2024_09_11_095505_add_customer_registration_status', 12),
(26, '2024_09_11_131843_add_column_school_code_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `period_prices`
--

CREATE TABLE `period_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `period` varchar(255) NOT NULL,
  `student_limit` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `period_prices`
--

INSERT INTO `period_prices` (`id`, `period`, `student_limit`, `created_at`, `updated_at`) VALUES
(1, 'Monthly', '3000', NULL, NULL),
(2, 'Termly', '3000', NULL, NULL),
(3, 'Annually', '3000', NULL, NULL);

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
-- Table structure for table `price_ranges`
--

CREATE TABLE `price_ranges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `period_fk_id` bigint(20) UNSIGNED NOT NULL,
  `min_student` varchar(255) NOT NULL,
  `max_student` varchar(255) NOT NULL,
  `prices` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_ranges`
--

INSERT INTO `price_ranges` (`id`, `period_fk_id`, `min_student`, `max_student`, `prices`, `created_at`, `updated_at`) VALUES
(1, 1, '0', '200', '100,000', NULL, NULL),
(2, 1, '201', '300', '200,000', NULL, NULL),
(3, 1, '301', '400', '300,000', NULL, NULL),
(4, 1, '401', '500', '400,000', NULL, NULL),
(5, 1, '501', '600', '500,000', NULL, NULL),
(6, 1, '601', '700', '600,000', NULL, NULL),
(7, 1, '701', '800', '700,000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reset_code_passwords`
--

CREATE TABLE `reset_code_passwords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reset_code_passwords`
--

INSERT INTO `reset_code_passwords` (`id`, `email`, `code`, `created_at`, `updated_at`) VALUES
(6, 'adamrurangwa@gmail.com', '110508', '2024-08-12 17:19:24', '2024-08-12 17:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `send_email_to_user_to_registers`
--

CREATE TABLE `send_email_to_user_to_registers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `registered` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `send_email_to_user_to_registers`
--

INSERT INTO `send_email_to_user_to_registers` (`id`, `email`, `role_id`, `registered`, `created_at`, `updated_at`) VALUES
(3, 'ntiruhungwab@gmail.com', 2, 'yes', '2024-08-12 10:11:53', '2024-08-12 10:13:54'),
(4, 'adamrurangwa@gmail.com', 2, 'not yet', '2024-08-12 17:06:37', '2024-08-12 17:06:37'),
(5, 'bikmangeek@gmail.com', 2, 'yes', '2024-08-12 17:07:59', '2024-08-12 17:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('V15j7yOU2ezBbsRUHu0UaZOVb1jG72AQpWAzPZ7r', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNGVWT0Y0V1NFT0pXc2x6Mk9lYnpZTWxEQTdEb0pDMWp6VWk4Z0NERyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9fQ==', 1727692511);

-- --------------------------------------------------------

--
-- Table structure for table `share_holders`
--

CREATE TABLE `share_holders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `share_holders`
--

INSERT INTO `share_holders` (`id`, `firstname`, `lastname`, `gender`, `phone`, `email`, `dob`, `email_verified_at`, `username`, `password`, `image`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Kishki', 'Nurdin', 'male', '0780001100', 'ntiruhungwab@gmail.com', '20/12/2000', NULL, 'bikman123', '$2y$12$HUYSk9pSVoAC2HpV04otvOTjqtF5XOKDEuYnaPgori/GGImgLTArq', 'user.png', 'Admin', NULL, NULL, '2024-09-29 15:53:33'),
(3, 'Mustapha', 'Alison', 'male', '0780021100', 'adminx@gmail.com', '20/12/2000', NULL, 'james@gmail.com', '$2y$12$awHnlfCGWHygMWSX8GD.0.DEMG6kC7DZVMowGUmINbmO9WnWP9iuK', 'user.png', 'ShareHolder', NULL, NULL, '2024-09-06 05:17:32'),
(4, 'Bikman', 'Djuma', 'male', '0780001160', 'adminw@gmail.com', '20/12/2000', NULL, 'admin1236', '$2y$12$oga.P1zsZyeXQwP9GeX/v.kcggWX8/DSoPK.WRRRYSrXKdO9YLWoG', 'user.png', 'ShareHolder', NULL, NULL, '2024-09-06 04:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_active_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `gender`, `phone`, `email`, `dob`, `email_verified_at`, `role_id`, `username`, `password`, `image`, `remember_token`, `created_at`, `updated_at`, `last_active_at`) VALUES
(3, 'Uthman', 'Hafan', 'Male', '0785389098', 'adamrurangwa@gmail.com', '2024-08-12', NULL, 1, 'test12345', '$2y$12$bPTuXTfIFd3V2OM3ghGzPuaeUqje/3aHGZ0fPgoAHdE2U60Kif25O', 'user.png', NULL, '2024-08-12 17:03:24', '2024-08-12 17:03:24', NULL),
(4, 'Ibrahim', 'dilo', 'Male', '0785389000', 'bikmangeek@gmail.com', '2024-08-12', NULL, 2, 'test12346', '$2y$12$bRbw2zrB2YsyO3ow1d95JOjIvF2TaY43VXCglyYG0f4MQCnX4mmPS', 'user.png', NULL, '2024-08-12 17:13:46', '2024-08-12 17:34:53', '2024-08-12 17:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Headmaster', '2024-08-12 10:11:00', '2024-08-12 10:11:00'),
(2, 'Teacher', '2024-08-12 10:11:00', '2024-08-12 10:11:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `admin_social_media`
--
ALTER TABLE `admin_social_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_social_media_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `allow_customer_to_regiters`
--
ALTER TABLE `allow_customer_to_regiters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `allow_customer_to_regiters_customer_partial_reg_fk_id_foreign` (`customer_partial_reg_fk_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_partial_registers`
--
ALTER TABLE `customer_partial_registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guest_contacts`
--
ALTER TABLE `guest_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_contacts`
--
ALTER TABLE `main_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_subscribers`
--
ALTER TABLE `main_subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `main_subscribers_email_unique` (`email`);

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
-- Indexes for table `period_prices`
--
ALTER TABLE `period_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `price_ranges`
--
ALTER TABLE `price_ranges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price_ranges_period_fk_id_foreign` (`period_fk_id`);

--
-- Indexes for table `reset_code_passwords`
--
ALTER TABLE `reset_code_passwords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reset_code_passwords_email_index` (`email`);

--
-- Indexes for table `send_email_to_user_to_registers`
--
ALTER TABLE `send_email_to_user_to_registers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `send_email_to_user_to_registers_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `share_holders`
--
ALTER TABLE `share_holders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `share_holders_phone_unique` (`phone`),
  ADD UNIQUE KEY `share_holders_email_unique` (`email`),
  ADD UNIQUE KEY `share_holders_username_unique` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_social_media`
--
ALTER TABLE `admin_social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `allow_customer_to_regiters`
--
ALTER TABLE `allow_customer_to_regiters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customer_partial_registers`
--
ALTER TABLE `customer_partial_registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest_contacts`
--
ALTER TABLE `guest_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_contacts`
--
ALTER TABLE `main_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `main_subscribers`
--
ALTER TABLE `main_subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `period_prices`
--
ALTER TABLE `period_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price_ranges`
--
ALTER TABLE `price_ranges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reset_code_passwords`
--
ALTER TABLE `reset_code_passwords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `send_email_to_user_to_registers`
--
ALTER TABLE `send_email_to_user_to_registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `share_holders`
--
ALTER TABLE `share_holders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_social_media`
--
ALTER TABLE `admin_social_media`
  ADD CONSTRAINT `admin_social_media_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `allow_customer_to_regiters`
--
ALTER TABLE `allow_customer_to_regiters`
  ADD CONSTRAINT `allow_customer_to_regiters_customer_partial_reg_fk_id_foreign` FOREIGN KEY (`customer_partial_reg_fk_id`) REFERENCES `customer_partial_registers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `price_ranges`
--
ALTER TABLE `price_ranges`
  ADD CONSTRAINT `price_ranges_period_fk_id_foreign` FOREIGN KEY (`period_fk_id`) REFERENCES `period_prices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `send_email_to_user_to_registers`
--
ALTER TABLE `send_email_to_user_to_registers`
  ADD CONSTRAINT `send_email_to_user_to_registers_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
