-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2024 at 05:35 AM
-- Server version: 5.7.44
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vetiacke_miceqloud`
--

-- --------------------------------------------------------

--
-- Table structure for table `activeclients`
--

CREATE TABLE `activeclients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activeloanees`
--

CREATE TABLE `activeloanees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payroll_date` date NOT NULL,
  `staff_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `email`, `phone`, `payroll_date`, `staff_count`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Software Engineer 2', 'kimdan2030@gmail.com', '0703894372', '2024-11-08', 200000, '2024-11-07 12:54:21', '2024-11-09 03:22:27', 0),
(2, 'Software Engineer 1', 'kimdan2030@gmail.com', '0703894372', '2024-11-02', 200000, '2024-11-07 12:54:52', '2024-11-09 03:24:23', 0),
(3, 'Software-Engineer', 'kimdan203@gmail.com', '0703894370', '2024-11-08', 3, '2024-11-07 13:02:16', '2024-11-07 13:02:16', 0),
(4, 'Qloud Point Solutions', 'kimdan2880@gmail.com', '0703895472', '2024-11-22', 90000, '2024-11-08 01:19:48', '2024-11-08 01:19:48', 0),
(5, 'Lio College', 'info@liocollege.ac.ke', '0798987898', '2024-11-30', 4, '2024-11-15 14:08:10', '2024-11-15 14:08:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disbursements`
--

CREATE TABLE `disbursements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `company_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone_no`, `amount`, `company_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Daniel Muthoni', 'kimdan2430@gmail.com', '0703894372', 100.00, 1, 1, '2024-11-07 13:50:41', '2024-11-09 03:12:49'),
(2, 'Daniel Muthoni', 'kimdan230@gmail.com', '0703094372', 1000.00, 1, 1, '2024-11-07 13:56:29', '2024-11-09 03:12:54'),
(3, 'Daniel Muthoni', 'kimdan20@gmail.com', '0703094372', 1000.00, 1, 1, '2024-11-07 13:56:56', '2024-11-09 02:39:29'),
(4, 'Daniel Muthoni', 'kimdan2@gmail.com', '0703094372', 1000.00, 1, 1, '2024-11-07 13:57:35', '2024-11-09 02:39:34'),
(5, 'John Mwangi', 'mwangijohn@gmail.com', '07038943734', 2999.00, 1, 1, '2024-11-07 14:34:00', '2024-11-09 03:23:35'),
(6, 'Mwangi Muthoni', 'kimdan223@gmail.com', '0763894372', 29999.00, 1, 0, '2024-11-07 14:38:19', '2024-11-15 02:23:00'),
(7, 'Muthoni', 'muthoni@gmail.com', '0793894372', 20000.00, 1, 1, '2024-11-07 14:46:15', '2024-11-09 03:23:35'),
(8, 'Daniel Muthoni', 'kimdan830@gmail.com', '0793894372', 1000.00, 2, 0, '2024-11-07 14:48:51', '2024-11-07 14:48:51'),
(9, 'Daniel Muthoni', 'kimdan200@gmail.com', '0703895672', 100.00, 2, 0, '2024-11-07 14:49:34', '2024-11-07 14:49:34'),
(31, 'Daniel Muthoni', 'keemdan345@gmail.com', '0703895572', 3000.00, 2, 0, '2024-11-07 16:27:51', '2024-11-09 03:31:14'),
(32, 'Daniel Kimani Muthoni', 'kimdan2030@gmail.com', '0766894372', 454545.00, 2, 1, '2024-11-07 16:32:34', '2024-11-09 03:24:23'),
(33, 'Mary', 'mary@gmail.com', '0703894111', 300.00, 4, 0, '2024-11-08 01:20:48', '2024-11-08 01:20:48'),
(34, 'MARY KAGOTHO', 'marykagotho37@gmail.com', '0702729143', 3000.00, 5, 0, '2024-11-15 14:12:49', '2024-11-15 14:12:49'),
(35, 'Mary Wanjiru Wambui', 'marywwambui09@gmail.com', '0712912257', 3000.00, 5, 0, '2024-11-15 14:15:33', '2024-11-15 14:15:33'),
(36, 'Caroline Njoki Mbugua', 'carolnjoki296@gmail.com', '0768011535', 3000.00, 5, 0, '2024-11-15 14:19:39', '2024-11-15 14:19:39'),
(37, 'Janice', 'luciejanice23@gmail.com', '0707834946', 3000.00, 5, 0, '2024-11-15 14:20:34', '2024-11-15 14:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inactiveclients`
--

CREATE TABLE `inactiveclients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inactiveloanees`
--

CREATE TABLE `inactiveloanees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kes3000products`
--

CREATE TABLE `kes3000products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kes5000products`
--

CREATE TABLE `kes5000products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loanrequests`
--

CREATE TABLE `loanrequests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_10_14_182427_create_disbursements_table', 1),
(7, '2024_10_14_182446_create_repayments_table', 1),
(8, '2024_10_14_182506_create_loanrequests_table', 1),
(9, '2024_10_14_182523_create_pendingpayments_table', 1),
(10, '2024_10_14_182538_create_prospectloans_table', 1),
(11, '2024_10_14_182555_create_activeloanees_table', 1),
(12, '2024_10_14_182613_create_inactiveloanees_table', 1),
(13, '2024_10_14_182632_create_onboardedclients_table', 1),
(14, '2024_10_14_182646_create_activeclients_table', 1),
(15, '2024_10_14_182706_create_inactiveclients_table', 1),
(37, '2024_10_14_182721_create_prospectclients_table', 9),
(17, '2024_10_14_182735_create_systemusers_table', 1),
(18, '2024_10_14_182748_create_roles_table', 1),
(19, '2024_10_14_182805_create_departments_table', 1),
(20, '2024_10_14_182821_create_branches_table', 1),
(21, '2024_10_14_182840_create_kes3000products_table', 1),
(22, '2024_10_14_182850_create_kes5000products_table', 1),
(23, '2024_10_14_183701_create_products_table', 1),
(27, '2024_11_07_131646_create_companies_table', 3),
(32, '2024_11_07_131739_create_employees_table', 4),
(26, '2024_11_07_135437_add_role_to_users', 2),
(33, '2024_11_07_143425_create_transactions_table', 5),
(29, '2024_11_07_145452_create_utilities_table', 3),
(34, '2024_11_09_054257_add_soft_deletes_to_users_table', 6),
(35, '2024_11_09_055302_add_status_to_companies_table', 7),
(36, '2024_11_11_175819_add_profit_to_transactions_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `onboardedclients`
--

CREATE TABLE `onboardedclients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendingpayments`
--

CREATE TABLE `pendingpayments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prospectclients`
--

CREATE TABLE `prospectclients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prospectclients`
--

INSERT INTO `prospectclients` (`id`, `name`, `phone`, `email`, `employer_name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Daniel Muthoni', '0703894372', 'kimdan2030@gmail.com', '332323', 'Wing 2,11thFloor,One Padmore Place', '2024-11-15 07:59:43', '2024-11-15 07:59:43'),
(2, 'Daniel Muthoni', '0703894370', 'kimdan20@gmail.com', '23232323', 'Wing 2,11thFloor,One Padmore Place', '2024-11-15 12:06:50', '2024-11-15 12:06:50'),
(3, 'Daniel Muthoni', '0703894373', 'kimdan210@gmail.com', 'Lio College', 'Wing 2,11thFloor,One Padmore Place', '2024-11-15 12:07:16', '2024-11-15 12:07:16'),
(4, 'Daniel Muthoni', '070389433', 'kimdan230@gmail.com', 'Micro-Qloud', 'Wing 2,11thFloor,One Padmore Place', '2024-11-15 12:07:58', '2024-11-15 12:07:58'),
(6, 'Janice', '0707834946', 'luciejanice23@gmail.com', 'LEO SCHOOL', '00902', '2024-11-15 14:05:21', '2024-11-15 14:05:21'),
(7, 'Caroline Njoki Mbugua', '0768011535', 'carolnjoki296@gmail.com', 'Lio college', '00902', '2024-11-15 14:05:25', '2024-11-15 14:05:25'),
(8, 'Caroline Njoki Mbugua', '0768011535', 'carolnjoki296@gmail.com', 'Lio college', '00902', '2024-11-15 14:05:25', '2024-11-15 14:05:25'),
(9, 'Mary wanjiru Wambui', '0712912257', 'marywwambui09@gmail.com', 'Lio college', 'Kikuyu', '2024-11-15 14:05:35', '2024-11-15 14:05:35'),
(12, 'MARY KAGOTHO', '0702729143', 'marykagotho37@gmail.com', 'Lio college', '00902', '2024-11-15 14:06:15', '2024-11-15 14:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `prospectloans`
--

CREATE TABLE `prospectloans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `repayments`
--

CREATE TABLE `repayments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `systemusers`
--

CREATE TABLE `systemusers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payroll_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profit` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `employee_id`, `amount`, `payroll_date`, `status`, `created_at`, `updated_at`, `profit`) VALUES
(42, 31, 3000.00, '2024-11-02', 4, '2024-11-15 05:02:53', '2024-11-15 05:03:48', 900),
(41, 6, 29999.00, '2024-11-08', 4, '2024-11-15 02:27:16', '2024-11-15 05:01:36', 9000),
(40, 31, 3000.00, '2024-11-02', 4, '2024-11-15 01:38:53', '2024-11-15 05:03:48', 900),
(43, 31, 3000.00, '2024-11-02', 0, '2024-11-15 13:51:48', '2024-11-15 13:51:48', 900);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `deleted_at`) VALUES
(1, 'PHILIP', 'kimdan2630@gmail.com', NULL, '$2y$12$eM8WxSPtWQAWhY9rnCAc1e/.v4BHEE2vPAIhmXy2ARXZ6tGUhWEtK', NULL, '2024-11-07 11:01:10', '2024-11-07 11:01:10', 0, NULL),
(2, 'Daniel Muthoni', 'kimdan230@gmail.com', NULL, '$2y$12$/ebYBG/ngE2xObtRsk4Luu4MJmokKtIXGeBvbeNDyt2uHMBFd8NCS', NULL, '2024-11-07 12:00:34', '2024-11-09 03:23:35', 2, NULL),
(3, 'Daniel', 'kimdan23@gmail.com', NULL, '$2y$12$cCZ.jMDGUVrTN2KwE7C6nuR3/7l6eNDXG4VIRMDtaGJ4ei1W.j2cO', NULL, '2024-11-07 12:01:10', '2024-11-07 12:01:10', 2, NULL),
(4, 'Daniel Muthoni', 'kimdan2@gmail.com', NULL, '$2y$12$ixXZLxS8x7C2pD4/JYugHOi4/9E.Wyt.MI/HgAqk2SKSy1J/BGonO', NULL, '2024-11-07 13:57:35', '2024-11-09 03:23:35', 0, NULL),
(5, 'John Mwangi', 'mwangijohn@gmail.com', NULL, '$2y$12$b13IIyFnZsv.gQByTXo4yu.BLKw.SGnqLOl2095JDd2IGX51CLo2a', NULL, '2024-11-07 14:34:00', '2024-11-09 03:23:35', 0, NULL),
(6, 'Mwangi Muthoni', 'kimdan223@gmail.com', NULL, '$2y$12$JEcjcFGshasnsoXAW9WIvO0RXrM5D7A8w0tC4c.G4anrK1WQTH90.', NULL, '2024-11-07 14:38:19', '2024-11-09 03:23:35', 0, NULL),
(7, 'Muthoni', 'muthoni@gmail.com', NULL, '$2y$12$QKjqK1k9j0f4N/WhtGv5b.oPqOsNjkcFEwkmeDxK5OMZPsJp0ngzK', NULL, '2024-11-07 14:46:15', '2024-11-09 03:23:35', 0, NULL),
(31, 'Mary', 'mary@gmail.com', NULL, '$2y$12$UL5lf.rpi0Jkl6IZJh5UBuxVSjlMuvfZ8iYK6bVUGEGuUufIzK7Dm', NULL, '2024-11-08 01:20:48', '2024-11-08 01:20:48', 0, NULL),
(29, 'Daniel Muthoni', 'keemdan345@gmail.com', NULL, '$2y$12$Z576LXofhJNgpkvCJkH4FOrqKlcArta4qEdIQKKVSxExyPicnKNgW', NULL, '2024-11-07 16:27:51', '2024-11-09 03:24:23', 0, NULL),
(30, 'Daniel Kimani Muthoni', 'kimdan2030@gmail.com', NULL, '$2y$12$SZtABGX/QtPuuCCwqBwrfOdId0HiOqGZ1TM/WQ0pzcgSEb6DAOnRK', NULL, '2024-11-07 16:32:34', '2024-11-09 03:24:23', 0, NULL),
(32, 'MARY KAGOTHO', 'marykagotho37@gmail.com', NULL, '$2y$12$01eQXU.fJ9bT7EtCbmaoROrf4yahwigTOUhxZZvCbaaZ1/1VPIfyi', NULL, '2024-11-15 14:12:49', '2024-11-15 14:12:49', 0, NULL),
(33, 'Mary Wanjiru Wambui', 'marywwambui09@gmail.com', NULL, '$2y$12$JhTx21nFwjy8rN5fo.eQ7eVur0/zy3uM2nU/icqKe5nh8u5lEqIVW', NULL, '2024-11-15 14:15:33', '2024-11-15 14:15:33', 0, NULL),
(34, 'Caroline Njoki Mbugua', 'carolnjoki296@gmail.com', NULL, '$2y$12$jWYhEN8NTGqOfuGA0GVo4.oRxVL/Jkkhuf9.Ya.dBUFX6LDBzPCUm', NULL, '2024-11-15 14:19:39', '2024-11-15 14:19:39', 0, NULL),
(35, 'Janice', 'luciejanice23@gmail.com', NULL, '$2y$12$zNpAgkOBtU6OXTHIgeNOnO7lfEqqlL44KvxWeRr8iDzGtmweKgidC', NULL, '2024-11-15 14:20:34', '2024-11-15 14:20:34', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `utilities`
--

CREATE TABLE `utilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activeclients`
--
ALTER TABLE `activeclients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activeloanees`
--
ALTER TABLE `activeloanees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disbursements`
--
ALTER TABLE `disbursements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inactiveclients`
--
ALTER TABLE `inactiveclients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inactiveloanees`
--
ALTER TABLE `inactiveloanees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kes3000products`
--
ALTER TABLE `kes3000products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kes5000products`
--
ALTER TABLE `kes5000products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanrequests`
--
ALTER TABLE `loanrequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onboardedclients`
--
ALTER TABLE `onboardedclients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pendingpayments`
--
ALTER TABLE `pendingpayments`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prospectclients`
--
ALTER TABLE `prospectclients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prospectloans`
--
ALTER TABLE `prospectloans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repayments`
--
ALTER TABLE `repayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systemusers`
--
ALTER TABLE `systemusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activeclients`
--
ALTER TABLE `activeclients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activeloanees`
--
ALTER TABLE `activeloanees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disbursements`
--
ALTER TABLE `disbursements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inactiveclients`
--
ALTER TABLE `inactiveclients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inactiveloanees`
--
ALTER TABLE `inactiveloanees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kes3000products`
--
ALTER TABLE `kes3000products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kes5000products`
--
ALTER TABLE `kes5000products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loanrequests`
--
ALTER TABLE `loanrequests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `onboardedclients`
--
ALTER TABLE `onboardedclients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendingpayments`
--
ALTER TABLE `pendingpayments`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prospectclients`
--
ALTER TABLE `prospectclients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prospectloans`
--
ALTER TABLE `prospectloans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repayments`
--
ALTER TABLE `repayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `systemusers`
--
ALTER TABLE `systemusers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `utilities`
--
ALTER TABLE `utilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
