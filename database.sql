-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2025 at 11:27 PM
-- Server version: 8.0.41-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eorarend`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `user_id`, `group`, `created_at`) VALUES
(1, 1, 'user', '2025-01-28 13:17:57'),
(2, 1, 'admin', '2025-01-28 13:17:57'),
(10, 9, 'student', '2025-02-12 17:52:12'),
(11, 10, 'student', '2025-02-21 09:44:33'),
(13, 12, 'teacher', '2025-02-21 15:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `auth_identities`
--

CREATE TABLE `auth_identities` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `secret` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `secret2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text COLLATE utf8mb4_general_ci,
  `force_reset` tinyint(1) NOT NULL DEFAULT '0',
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_identities`
--

INSERT INTO `auth_identities` (`id`, `user_id`, `type`, `name`, `secret`, `secret2`, `expires`, `extra`, `force_reset`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'email_password', 'Kaló Zoltán', 'admin@gmail.com', '$2y$12$qdJUgwaZQF2F7gqoXEEe2ONcjqZ4bDd1YeXD6OretPz/kzhxkohYq', NULL, NULL, 0, '2025-05-02 20:13:07', '2025-01-28 13:17:57', '2025-05-02 20:13:07'),
(7, 9, 'email_password', NULL, 'stuednt1@gmail.com', '$2y$12$oRfhtVjh/EjN.BeTsjWdjuGnI/2PXQwSneo5onhHN0dKMvHbqkrna', NULL, NULL, 0, '2025-05-02 20:12:56', '2025-02-12 17:52:12', '2025-05-02 20:12:56'),
(8, 1, 'magic-link', NULL, 'f64d4d3f3b5cd84524a3', NULL, '2025-02-17 13:29:19', NULL, 0, NULL, '2025-02-17 12:29:19', '2025-02-17 12:29:19'),
(9, 10, 'email_password', NULL, 'student2@gmail.com', '$2y$12$.Z8nHZROfWVh.AByDIOY7.t2EUw/V39gM1N2YQUeWKXoJL2z./6SK', NULL, NULL, 0, '2025-03-12 14:16:35', '2025-02-21 09:44:33', '2025-03-12 14:16:35'),
(11, 12, 'email_password', NULL, 'teacher1@gmail.com', '$2y$12$QW.jdMIzSUTv01sDLtBEI.p/Cd7iTN.rIMH4tuX3YZ4SDy5EzLTfO', NULL, NULL, 0, '2025-04-01 10:38:08', '2025-02-21 15:30:59', '2025-04-01 10:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `user_agent`, `id_type`, `identifier`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'bajormotoros@gmail.com', 1, '2025-01-28 13:19:54', 1),
(2, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-01-28 13:44:22', 1),
(3, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admins', NULL, '2025-01-28 14:32:55', 0),
(4, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-01-28 14:33:09', 1),
(5, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-01-28 17:42:06', 1),
(6, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-01-29 08:27:19', 1),
(7, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-01-29 13:38:27', 1),
(8, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-01-29 17:44:49', 1),
(9, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-01-30 08:18:56', 1),
(10, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'root', NULL, '2025-01-30 14:23:12', 0),
(11, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-01-30 14:23:16', 1),
(12, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-01-30 14:23:51', 1),
(13, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-01-31 08:49:31', 1),
(14, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'root', NULL, '2025-02-04 09:05:28', 0),
(15, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-04 09:05:35', 1),
(16, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-04 09:12:11', 1),
(17, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-04 15:35:30', 1),
(18, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-04 21:13:29', 1),
(19, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-05 14:35:08', 1),
(20, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-06 14:54:21', 1),
(21, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-07 08:57:53', 1),
(22, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'root', NULL, '2025-02-07 16:00:09', 0),
(23, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-07 16:00:13', 1),
(24, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-11 11:55:36', 1),
(25, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-12 10:37:35', 1),
(26, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'root', NULL, '2025-02-12 13:20:35', 0),
(27, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-12 13:20:38', 1),
(28, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'zkalo', 2, '2025-02-12 14:05:09', 1),
(29, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'zkalo', 2, '2025-02-12 14:05:46', 1),
(30, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-12 16:28:08', 1),
(31, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-12 16:44:43', 1),
(32, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-12 17:53:04', 1),
(33, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-13 12:22:15', 1),
(34, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-14 07:12:58', 1),
(35, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-14 11:44:08', 1),
(36, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-14 18:06:26', 1),
(37, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-14 20:46:57', 1),
(38, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-17 10:44:15', 1),
(39, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-17 12:29:07', 1),
(40, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'zkalo', NULL, '2025-02-17 12:34:42', 0),
(41, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-17 12:34:47', 1),
(42, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-21 09:33:22', 1),
(43, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'korina', 10, '2025-02-21 09:50:39', 1),
(44, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-21 10:12:46', 1),
(45, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'korina', 10, '2025-02-21 10:13:47', 1),
(46, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-21 10:25:07', 1),
(47, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'korina', 10, '2025-02-21 10:36:09', 1),
(48, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-21 11:54:32', 1),
(49, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-21 12:12:37', 1),
(50, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'korina', 10, '2025-02-21 13:06:21', 1),
(51, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-21 13:27:02', 1),
(52, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'korina', 10, '2025-02-21 13:28:39', 1),
(53, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-21 13:43:16', 1),
(54, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'korina', 10, '2025-02-21 13:54:45', 1),
(55, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-21 13:58:47', 1),
(56, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'bkalo', 9, '2025-02-21 14:14:17', 1),
(57, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'korina', 10, '2025-02-21 14:24:27', 1),
(58, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-21 14:24:40', 1),
(59, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'susuk', 12, '2025-02-21 17:34:03', 1),
(60, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'susuk', 12, '2025-02-21 17:40:21', 1),
(61, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-21 17:50:33', 1),
(62, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'korina', 10, '2025-02-21 17:52:10', 1),
(63, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'bkalo', 9, '2025-02-21 17:52:19', 1),
(64, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'susuk', 12, '2025-02-21 17:52:27', 1),
(65, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'korina', 10, '2025-02-21 18:17:08', 1),
(66, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'bkalo', 9, '2025-02-21 18:17:30', 1),
(67, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'susuk', 12, '2025-02-21 18:17:45', 1),
(68, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-21 18:18:04', 1),
(69, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-24 15:01:38', 1),
(70, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-25 08:59:30', 1),
(71, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-25 13:18:25', 1),
(72, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-02-25 14:38:42', 1),
(73, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-03 12:13:42', 1),
(74, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-04 06:26:07', 1),
(75, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-07 11:32:27', 1),
(76, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'susuk', 12, '2025-03-07 11:33:00', 1),
(77, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'root', NULL, '2025-03-07 12:08:22', 0),
(78, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-07 12:08:26', 1),
(79, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'susuk', 12, '2025-03-07 12:09:16', 1),
(80, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-07 12:22:48', 1),
(81, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'susuk', 12, '2025-03-07 12:27:43', 1),
(82, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-07 12:33:33', 1),
(83, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'susuk', 12, '2025-03-07 20:26:33', 1),
(84, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'korina', 10, '2025-03-07 20:26:53', 1),
(85, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-07 20:27:18', 1),
(86, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-11 12:21:20', 1),
(87, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'susuk', 12, '2025-03-11 12:39:06', 1),
(88, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-11 12:50:35', 1),
(89, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-11 12:52:02', 1),
(90, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'username', 'korina', 10, '2025-03-11 12:52:24', 1),
(91, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'korina', NULL, '2025-03-12 14:15:46', 0),
(92, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-12 14:15:53', 1),
(93, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'student1', 9, '2025-03-12 14:16:25', 1),
(94, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'student2', 10, '2025-03-12 14:16:35', 1),
(95, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'teacher1', 12, '2025-03-12 14:16:48', 1),
(96, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-12 14:28:48', 1),
(97, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'student1', 9, '2025-03-12 15:43:57', 1),
(98, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-12 16:15:32', 1),
(99, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-13 07:51:53', 1),
(100, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-13 15:50:46', 1),
(101, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-14 12:20:53', 1),
(102, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'student1', 9, '2025-03-17 16:49:54', 1),
(103, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-17 16:50:21', 1),
(104, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-18 07:06:05', 1),
(105, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-21 09:21:01', 1),
(106, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-21 15:40:12', 1),
(107, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-21 20:24:11', 1),
(108, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-03-31 11:51:57', 1),
(109, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-04-01 07:08:19', 1),
(110, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'teacher1', 12, '2025-04-01 10:38:08', 1),
(111, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-04-01 10:38:57', 1),
(112, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-04-09 13:11:32', 1),
(113, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'root', NULL, '2025-04-30 17:58:06', 0),
(114, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-04-30 17:58:10', 1),
(115, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-05-01 20:00:32', 1),
(116, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'student1', 9, '2025-05-01 20:05:08', 1),
(117, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-05-01 20:28:40', 1),
(118, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-05-02 20:09:54', 1),
(119, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'student1', 9, '2025-05-02 20:12:56', 1),
(120, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'username', 'admin', 1, '2025-05-02 20:13:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions_users`
--

CREATE TABLE `auth_permissions_users` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `permission` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_remember_tokens`
--

CREATE TABLE `auth_remember_tokens` (
  `id` int UNSIGNED NOT NULL,
  `selector` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `hashedValidator` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_token_logins`
--

CREATE TABLE `auth_token_logins` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int NOT NULL COMMENT 'Azonosító',
  `year_id` int NOT NULL COMMENT 'Évfolyam FK',
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL COMMENT 'Megnevezés',
  `class_teacher_id` int NOT NULL COMMENT 'Osztályfőnök FK'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci COMMENT='Osztályok listája';

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `year_id`, `name`, `class_teacher_id`) VALUES
(1, 1, '13/A', 1),
(2, 1, '13/B', 5),
(3, 2, '14/A', 10),
(4, 2, '14/B', 9);

-- --------------------------------------------------------

--
-- Table structure for table `classes_teachers`
--

CREATE TABLE `classes_teachers` (
  `id` int NOT NULL,
  `class_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `teacher_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes_teachers`
--

INSERT INTO `classes_teachers` (`id`, `class_id`, `subject_id`, `teacher_id`) VALUES
(6, 1, 1, 1),
(32, 1, 2, 1),
(3, 1, 3, 5),
(21, 1, 4, 16),
(5, 1, 8, 9),
(31, 1, 9, 10),
(35, 1, 10, 12),
(43, 2, 1, 12),
(39, 2, 2, 16),
(41, 2, 3, 5),
(40, 2, 4, 2),
(37, 2, 8, 19),
(38, 2, 9, 10),
(18, 2, 10, 11),
(42, 2, 10, 12);

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` int NOT NULL,
  `name` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `name`) VALUES
(1, 102),
(2, 101),
(6, 104),
(7, 103),
(8, 201),
(9, 202),
(10, 203);

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `code` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lessons_per_week`
--

CREATE TABLE `lessons_per_week` (
  `id` int NOT NULL,
  `year_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `lesson_number` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `lessons_per_week`
--

INSERT INTO `lessons_per_week` (`id`, `year_id`, `subject_id`, `lesson_number`) VALUES
(1, 1, 3, 8),
(2, 1, 4, 6),
(3, 1, 10, 4),
(4, 1, 8, 4),
(5, 1, 1, 4),
(6, 1, 2, 6),
(7, 1, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-12-28-223112', 'CodeIgniter\\Shield\\Database\\Migrations\\CreateAuthTables', 'default', 'CodeIgniter\\Shield', 1738066834, 1),
(2, '2021-07-04-041948', 'CodeIgniter\\Settings\\Database\\Migrations\\CreateSettingsTable', 'default', 'CodeIgniter\\Settings', 1738066834, 1),
(3, '2021-11-14-143905', 'CodeIgniter\\Settings\\Database\\Migrations\\AddContextColumn', 'default', 'CodeIgniter\\Settings', 1738066834, 1),
(4, '2025-03-12-153000', '\\CreateClassesTeachersTable', 'default', 'App', 1741791544, 2),
(5, '2025-03-21-134400', '\\ModClassesTeachersTable', 'default', 'App', 1742571589, 3);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `value` text COLLATE utf8mb4_general_ci,
  `type` varchar(31) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'string',
  `context` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `educational_id` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `class_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `educational_id`, `class_id`) VALUES
(1, 'Tanuló Kettő', '70000000001', 1),
(2, 'Tanuló Egy', '70000000002', 2);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`) VALUES
(1, 'Webdesign'),
(2, 'Asztali alkalmazások fejlesztése'),
(3, 'Frontend programozás'),
(4, 'Backend programozás'),
(8, 'Adatbázis kezelés'),
(9, 'API fejlesztés'),
(10, 'Szakmai angol');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `user_id`) VALUES
(1, 'Babosa János', 1),
(2, 'Kovács Béla', 0),
(5, 'Antaliczky Istvánné', 0),
(6, 'Horváth Tamás', 0),
(9, 'Szekeres Róbert', 0),
(10, 'Németh Ferenc', 0),
(11, 'Schiller Lajosné', 0),
(12, 'Tóth Adrienn', 0),
(16, 'Szabó Ervin', 0),
(19, 'Petőfi Zoltán', 0),
(20, 'Darvas Iván', 0),
(22, 'Tanár Egy', 12);

-- --------------------------------------------------------

--
-- Table structure for table `teachers_subjects`
--

CREATE TABLE `teachers_subjects` (
  `id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `subject_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `teachers_subjects`
--

INSERT INTO `teachers_subjects` (`id`, `teacher_id`, `subject_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 5, 3),
(6, 20, 2),
(7, 22, 2),
(9, 6, 3),
(10, 2, 3),
(11, 2, 4),
(12, 2, 1),
(13, 10, 1),
(14, 10, 9),
(15, 19, 8),
(16, 19, 2),
(17, 19, 9),
(19, 11, 3),
(20, 11, 8),
(21, 16, 4),
(22, 16, 1),
(23, 16, 2),
(24, 9, 8),
(25, 5, 2),
(26, 12, 10),
(27, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_availability`
--

CREATE TABLE `teacher_availability` (
  `id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `day` int NOT NULL,
  `hour` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `teacher_availability`
--

INSERT INTO `teacher_availability` (`id`, `teacher_id`, `day`, `hour`) VALUES
(0, 1, 2, 2),
(0, 1, 2, 5),
(0, 1, 3, 1),
(0, 1, 3, 3),
(0, 1, 3, 4),
(0, 1, 3, 6),
(0, 1, 3, 8),
(0, 1, 3, 9),
(0, 1, 4, 7),
(0, 1, 5, 4),
(0, 1, 5, 5),
(0, 22, 1, 1),
(0, 22, 1, 2),
(0, 5, 1, 4),
(0, 5, 1, 5),
(0, 5, 1, 6),
(0, 5, 1, 7),
(0, 5, 1, 8),
(0, 5, 1, 9),
(0, 5, 2, 1),
(0, 5, 2, 2),
(0, 5, 2, 3),
(0, 5, 2, 4),
(0, 5, 2, 5),
(0, 5, 2, 6),
(0, 5, 2, 7),
(0, 5, 2, 8),
(0, 5, 2, 9),
(0, 5, 3, 2),
(0, 5, 4, 1),
(0, 5, 4, 2),
(0, 5, 4, 3),
(0, 5, 4, 4),
(0, 5, 4, 5),
(0, 5, 4, 6),
(0, 5, 4, 7),
(0, 5, 4, 8),
(0, 5, 4, 9),
(0, 5, 5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `id` int NOT NULL,
  `class_id` int NOT NULL,
  `day` int NOT NULL,
  `lesson_of_day` int NOT NULL,
  `subject_id` int DEFAULT NULL,
  `teacher_id` int DEFAULT NULL,
  `classroom_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `timetables`
--

INSERT INTO `timetables` (`id`, `class_id`, `day`, `lesson_of_day`, `subject_id`, `teacher_id`, `classroom_id`) VALUES
(10, 2, 2, 1, 2, 22, 6),
(11, 1, 2, 2, 1, 9, 1),
(19, 1, 3, 1, 1, NULL, 2),
(20, 1, 3, 2, 10, 22, 2),
(21, 1, 3, 3, 1, 6, 2),
(23, 1, 3, 5, 2, 1, 1),
(50, 1, 1, 5, 3, NULL, NULL),
(52, 1, 2, 1, 3, NULL, 6),
(55, 1, 1, 2, 2, NULL, 2),
(60, 1, 1, 1, 2, NULL, NULL),
(61, 1, 1, 3, 2, NULL, NULL),
(62, 1, 1, 4, 3, NULL, NULL),
(63, 1, 3, 4, 1, NULL, NULL),
(64, 1, 3, 6, 1, NULL, NULL),
(65, 1, 2, 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `educational_id` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_message` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `educational_id`, `status`, `status_message`, `active`, `last_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'Admin User', NULL, NULL, NULL, 1, '2025-05-02 21:25:35', '2025-01-28 13:17:56', '2025-01-28 13:17:57', NULL),
(9, 'student1', 'Tanuló Egy', '70000000001', NULL, NULL, 1, '2025-05-02 20:12:56', '2025-02-12 17:52:12', '2025-02-12 17:52:12', NULL),
(10, 'student2', 'Tanuló Kettő', '70000000002', NULL, NULL, 1, '2025-03-12 14:16:35', '2025-02-21 09:44:33', '2025-02-21 09:44:33', NULL),
(12, 'teacher1', 'Tanár Egy', '', NULL, NULL, 1, '2025-04-01 10:38:44', '2025-02-21 15:30:59', '2025-02-21 15:30:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` int NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `name`) VALUES
(1, 'Programozás 1. év'),
(2, 'Programozás 2. év');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_secret` (`type`,`secret`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_permissions_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `auth_remember_tokens_user_id_foreign` (`user_id`);

--
-- Indexes for table `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_year_fk` (`year_id`),
  ADD KEY `class_classteacher_fk` (`class_teacher_id`);

--
-- Indexes for table `classes_teachers`
--
ALTER TABLE `classes_teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_id_subject_id_teacher_id` (`class_id`,`subject_id`,`teacher_id`),
  ADD KEY `classes_teachers_subject_id_foreign` (`subject_id`),
  ADD KEY `classes_teachers_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons_per_week`
--
ALTER TABLE `lessons_per_week`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_subjects`
--
ALTER TABLE `teachers_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_availability`
--
ALTER TABLE `teacher_availability`
  ADD KEY `teacher_avail_teacher_id_fk` (`teacher_id`);

--
-- Indexes for table `timetables`
--
ALTER TABLE `timetables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uidx_timetables` (`class_id`,`day`,`lesson_of_day`) USING BTREE,
  ADD KEY `timetable_subject_id_fk` (`subject_id`),
  ADD KEY `timetable_classroom_id_fk` (`classroom_id`),
  ADD KEY `timetable_teacher_id_fk` (`teacher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `auth_identities`
--
ALTER TABLE `auth_identities`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'Azonosító', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `classes_teachers`
--
ALTER TABLE `classes_teachers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lessons_per_week`
--
ALTER TABLE `lessons_per_week`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `teachers_subjects`
--
ALTER TABLE `teachers_subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `class_classteacher_fk` FOREIGN KEY (`class_teacher_id`) REFERENCES `teachers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `class_year_fk` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `classes_teachers`
--
ALTER TABLE `classes_teachers`
  ADD CONSTRAINT `classes_teachers_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `classes_teachers_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `classes_teachers_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `teacher_availability`
--
ALTER TABLE `teacher_availability`
  ADD CONSTRAINT `teacher_avail_teacher_id_fk` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `timetables`
--
ALTER TABLE `timetables`
  ADD CONSTRAINT `timetable_class_id_fk` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `timetable_classroom_id_fk` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `timetable_subject_id_fk` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `timetable_teacher_id_fk` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
