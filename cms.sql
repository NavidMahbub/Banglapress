-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 25, 2019 at 06:59 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

DROP TABLE IF EXISTS `activations`;
CREATE TABLE IF NOT EXISTS `activations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, '1234', 1, NULL, NULL, NULL),
(2, 4, '1234', 1, NULL, NULL, NULL),
(3, 5, '1234', 1, NULL, '2019-09-21 16:51:02', '2019-09-21 16:51:02'),
(4, 6, '1234', 1, NULL, '2019-09-22 01:21:31', '2019-09-22 01:21:31'),
(5, 7, '1234', 1, NULL, '2019-09-22 06:18:36', '2019-09-22 06:18:36'),
(6, 9, '1234', 1, NULL, '2019-09-22 06:52:32', '2019-09-22 06:52:32'),
(7, 10, '1234', 1, NULL, '2019-09-25 18:50:58', '2019-09-25 18:50:58'),
(8, 11, '1234', 1, NULL, '2019-09-25 18:51:52', '2019-09-25 18:51:52'),
(9, 12, '1234', 1, NULL, '2019-09-25 18:53:43', '2019-09-25 18:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_id` int(11) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `albums_cover_id_foreign` (`cover_id`),
  KEY `albums_created_by_foreign` (`created_by`),
  KEY `albums_updated_by_foreign` (`updated_by`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `cover_id`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(13, 'test 567 updated', 6, 9, 9, NULL, '2019-09-17 06:55:33', '2019-09-17 09:49:38'),
(15, 'politics', 4, 9, 9, NULL, '2019-09-25 18:47:16', '2019-09-25 18:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `album_contents`
--

DROP TABLE IF EXISTS `album_contents`;
CREATE TABLE IF NOT EXISTS `album_contents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `caption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `album_id` int(10) UNSIGNED DEFAULT NULL,
  `content_id` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `album_contents_album_id_foreign` (`album_id`),
  KEY `album_contents_content_id_foreign` (`content_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `album_contents`
--

INSERT INTO `album_contents` (`id`, `caption`, `album_id`, `content_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 4, 3, NULL, NULL, NULL),
(2, NULL, 4, 5, NULL, NULL, NULL),
(4, NULL, 13, 4, NULL, NULL, NULL),
(5, NULL, 13, 3, NULL, NULL, NULL),
(6, NULL, 14, 13, NULL, NULL, NULL),
(7, NULL, 14, 3, NULL, NULL, NULL),
(8, NULL, 14, 6, NULL, NULL, NULL),
(9, NULL, 15, 13, NULL, NULL, NULL),
(10, NULL, 15, 3, NULL, NULL, NULL),
(11, NULL, 15, 6, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `areas_parent_id_foreign` (`parent_id`),
  KEY `areas_created_by_foreign` (`created_by`),
  KEY `areas_updated_by_foreign` (`updated_by`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `title`, `parent_id`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 'area 52-1', NULL, NULL, NULL, NULL, '2019-09-12 00:18:00', '2019-09-13 09:49:47'),
(13, 'ert', 7, NULL, NULL, NULL, '2019-09-24 13:00:01', '2019-09-24 13:00:01'),
(12, 'area 51-2', NULL, NULL, NULL, NULL, '2019-09-12 00:23:22', '2019-09-13 09:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  KEY `categories_created_by_foreign` (`created_by`),
  KEY `categories_updated_by_foreign` (`updated_by`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'breaking news', NULL, NULL, NULL, NULL, NULL, '2019-09-25 17:17:06'),
(2, 'national', 1, NULL, NULL, NULL, NULL, '2019-09-25 17:17:45'),
(4, 'Dhaka', 2, NULL, NULL, NULL, NULL, '2019-09-25 17:17:58'),
(18, 'category-2-2', 16, NULL, NULL, NULL, '2019-09-25 00:18:06', '2019-09-25 00:18:21'),
(16, 'category-2', NULL, NULL, NULL, NULL, '2019-09-25 00:17:48', '2019-09-25 00:17:48'),
(17, 'category-3', NULL, NULL, NULL, NULL, '2019-09-25 00:17:59', '2019-09-25 00:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_code` int(11) DEFAULT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `subdistrict_id` int(11) DEFAULT NULL,
  `ward_union` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_village` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_para` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_ofiice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contacts_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
CREATE TABLE IF NOT EXISTS `contents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content_category_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_encode_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_thumb_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contents_content_category_id_foreign` (`content_category_id`),
  KEY `contents_created_by_foreign` (`created_by`),
  KEY `contents_updated_by_foreign` (`updated_by`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `content_category_id`, `title`, `type`, `file_name`, `file_encode_path`, `cover_thumb_img`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, NULL, 'demo img', 'image', 'file_82079a38807bc78bc53fafc5b9872c8d11d62c29.png', NULL, NULL, 0, NULL, NULL, NULL, '1970-01-01 00:00:01', '1970-01-01 00:00:01'),
(4, NULL, 'lion', 'image', 'file_9fdc118f1ba8c362cbd0cacede06b90418ebb406.jpg', NULL, NULL, 0, NULL, NULL, NULL, '1970-01-01 00:00:01', '1970-01-01 00:00:01'),
(13, NULL, 'together', 'image', 'file_29ab9303d6516a2cb997e31ca601776eb50c6ad5.jpg', NULL, NULL, 0, NULL, NULL, NULL, '1970-01-01 00:00:09', '1970-01-01 00:00:09'),
(6, NULL, 'kali', 'image', 'file_109fe905c39c1d1b67e8c41e0dd292c3b38e12a6.gif', NULL, NULL, 0, NULL, NULL, NULL, '1970-01-01 00:00:01', '1970-01-01 00:00:01'),
(16, 13, 'sukla', 'image', 'file_e3742263ee711f6817f90d013e96ce64a53083d8.jpg', NULL, NULL, 0, NULL, NULL, NULL, '1970-01-01 00:00:09', '1970-01-01 00:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `content_categories`
--

DROP TABLE IF EXISTS `content_categories`;
CREATE TABLE IF NOT EXISTS `content_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `content_categories_parent_id_foreign` (`parent_id`),
  KEY `content_categories_created_by_foreign` (`created_by`),
  KEY `content_categories_updated_by_foreign` (`updated_by`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_categories`
--

INSERT INTO `content_categories` (`id`, `title`, `status`, `parent_id`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(15, 'five', NULL, NULL, 9, NULL, NULL, '2019-09-24 13:06:24', '2019-09-24 13:06:24'),
(14, 'foure', NULL, NULL, 9, NULL, NULL, '2019-09-24 13:06:18', '2019-09-24 13:06:18'),
(12, 'two', NULL, NULL, 9, NULL, NULL, '2019-09-24 13:06:02', '2019-09-24 13:06:02'),
(11, 'one', NULL, 15, 9, 9, NULL, '2019-09-24 13:05:52', '2019-09-24 13:15:42'),
(13, 'three', NULL, NULL, 9, NULL, NULL, '2019-09-24 13:06:08', '2019-09-24 13:06:08'),
(16, 'six', NULL, NULL, 9, NULL, NULL, '2019-09-24 13:06:31', '2019-09-24 13:06:31'),
(17, 'new', NULL, 11, 9, 9, NULL, '2019-09-24 13:19:17', '2019-09-24 13:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_07_02_230147_migration_cartalyst_sentinel', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2019_01_21_053110_create_contacts_table', 1),
(8, '2019_08_16_042353_create_categories_table', 1),
(9, '2019_09_03_015944_create_content_categories_table', 1),
(10, '2019_09_03_015948_create_contents_table', 1),
(11, '2019_09_08_194903_create_areas_table', 1),
(12, '2019_09_08_194913_create_topics_table', 1),
(13, '2019_09_08_194920_create_tags_table', 1),
(14, '2019_09_08_194943_create_scrolls_table', 1),
(15, '2019_09_08_194951_create_sections_table', 1),
(16, '2019_09_08_200111_create_albums_table', 1),
(17, '2019_09_08_200122_create_album_contents_table', 1),
(18, '2019_09_08_200256_create_posts_table', 1),
(19, '2019_09_08_200257_create_post_categories_table', 1),
(20, '2019_09_08_200303_create_post_contents_table', 1),
(21, '2019_09_08_200319_create_post_areas_table', 1),
(22, '2019_09_08_200357_create_post_topics_table', 1),
(23, '2019_09_08_201335_create_post_sections_table', 1),
(24, '2019_09_08_201407_create_post_scrolls_table', 1),
(25, '2019_09_08_201846_create_post_tags_table', 1),
(26, '2019_09_08_231423_create_foreign_key_c_m_table', 1),
(27, '2019_09_08_231438_create_foreign_key_gallery_table', 1),
(28, '2019_09_08_231450_create_foreign_key_post_table', 1),
(29, '2019_09_08_231504_create_foreign_key_setting_table', 1),
(30, '2019_09_10_081318_update_posts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('46bcdb4b330f08176a343814e5a44a9b98d531e1bbe94ca686f6f1dd79c8af56db01acd9609010a6', 1, 1, 'Password Access Token', '[]', 0, '2019-09-09 09:38:31', '2019-09-09 09:38:31', '2020-09-09 15:38:31'),
('4d3e8e3aa5cf87b227c6282cdf57b8a6149f716816cdabeb48b8a17bacd1ede0cbd83c92aca3520b', 1, 1, 'Password Access Token', '[]', 0, '2019-09-15 14:46:34', '2019-09-15 14:46:34', '2020-09-15 20:46:34'),
('6e7ffb423f8be9456db61bec385b96edf4353cc2d01a81da1eb45468841f7173a8ff0298f12264b9', 4, 1, 'Password Access Token', '[]', 0, '2019-09-21 16:38:08', '2019-09-21 16:38:08', '2020-09-21 22:38:08'),
('ad38f5d3f0fbe0d91154e6525b7209c27d5cc389d6281d3021f9ffedb7a7c556abb5b412574c578a', 1, 1, 'Password Access Token', '[]', 0, '2019-09-22 01:20:58', '2019-09-22 01:20:58', '2020-09-22 07:20:58'),
('a35cfb856a6ae58164ff6918df4d71f1c5c9f8fd3e15b562e3da865f9f81377312958d69a89cc3fb', 6, 1, 'Password Access Token', '[]', 0, '2019-09-22 01:22:06', '2019-09-22 01:22:06', '2020-09-22 07:22:06'),
('2f460caa9722fd59719131b2672a56cec31b53a217b54409245d7b08b771c205752a503d8d9a3d3d', 9, 1, 'Password Access Token', '[]', 0, '2019-09-22 06:56:41', '2019-09-22 06:56:41', '2020-09-22 12:56:41'),
('f40a84f70e9b8bc77d861c2836495bf75a8fef2083a8b353c8ffa8f979d46903131206d4ce80a734', 7, 1, 'Password Access Token', '[]', 0, '2019-09-22 10:08:01', '2019-09-22 10:08:01', '2020-09-22 16:08:01'),
('8ee3b09ce87a471b3ed98638ec768e8788a3a52ce80283b6426fdbf40df1e96988891d662867c808', 9, 1, 'Password Access Token', '[]', 0, '2019-09-22 10:12:02', '2019-09-22 10:12:02', '2020-09-22 16:12:02'),
('5439d249549fd4e2a0296884b95b0adfb74826416339ba9645e74b2243214c6e8dccf1cfca081fca', 12, 1, 'Password Access Token', '[]', 0, '2019-09-25 18:54:45', '2019-09-25 18:54:45', '2020-09-26 00:54:45'),
('c23e785345d5f7adbdacce3e140a07a871d5cdbb7a6a4d5d0c27db33441001fb680215f88689d678', 9, 1, 'Password Access Token', '[]', 0, '2019-09-25 18:56:30', '2019-09-25 18:56:30', '2020-09-26 00:56:30');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'VRWWp632lWT06LmATLddpJfiCSWKeehhS7bYBVXu', 'http://localhost', 1, 0, 0, '2019-09-09 09:36:46', '2019-09-09 09:36:46'),
(2, NULL, 'Laravel Password Grant Client', 'wUDBtwGEinsSxj2z2kVJy4h2FEC0P3hYHJIrTbuD', 'http://localhost', 0, 1, 0, '2019-09-09 09:36:46', '2019-09-09 09:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-09-09 09:36:46', '2019-09-09 09:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

DROP TABLE IF EXISTS `persistences`;
CREATE TABLE IF NOT EXISTS `persistences` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `persistences_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 'BBO5bmrSCoSfxtvORxeRDhc6ROKizE14', '2019-09-09 09:34:13', '2019-09-09 09:34:13'),
(2, 1, 'W2x6gL9xOXY1ooQrFPUCuGcZIjHterMn', '2019-09-09 09:36:54', '2019-09-09 09:36:54'),
(3, 1, 'ohpSIBxQ8WuJxzsAnI5ZrWpQNO1OsDgM', '2019-09-09 09:38:29', '2019-09-09 09:38:29'),
(4, 1, 'WVRlU1NHdgMDlRfIWWT895M8ZoWPcSb9', '2019-09-15 14:46:29', '2019-09-15 14:46:29'),
(5, 4, '7XVHu2QVnYVziOftGcAGLODtyo1kPOkz', '2019-09-21 16:38:07', '2019-09-21 16:38:07'),
(6, 1, 'p6GWg10XH5SnJ2uEXCswvZU03n29fAp6', '2019-09-22 01:20:56', '2019-09-22 01:20:56'),
(7, 6, 'JjYBWcnNfIjSaR1T2q1ep1Y9ZW5ijzxl', '2019-09-22 01:22:06', '2019-09-22 01:22:06'),
(8, 9, 'fOEAY6DRZiSKE0E6ubvy3ud33SfaGvG4', '2019-09-22 06:56:39', '2019-09-22 06:56:39'),
(9, 7, 'dPFtFA8cxzAwtFeEDBkfXHSmeb3W8fEE', '2019-09-22 10:08:01', '2019-09-22 10:08:01'),
(10, 9, 'qoeChXAUQY8VQREWb0V5vjvrtuX8gYya', '2019-09-22 10:12:02', '2019-09-22 10:12:02'),
(11, 12, 'hVS30QzVBwn1VKUJvdXSYacBozuRjtDB', '2019-09-25 18:54:44', '2019-09-25 18:54:44'),
(12, 9, 'DXJyog50ecXrJYTBQaU1dlM7gMICLBaQ', '2019-09-25 18:56:29', '2019-09-25 18:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shoulder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hanger` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` int(10) UNSIGNED DEFAULT NULL,
  `reporter_id` int(10) UNSIGNED DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `featured_image_id` int(10) UNSIGNED DEFAULT NULL,
  `featured_video_id` int(10) UNSIGNED DEFAULT NULL,
  `video_position` int(11) DEFAULT NULL,
  `share_at` timestamp NULL DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instant_article` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_featured_image_id_foreign` (`featured_image_id`),
  KEY `posts_featured_video_id_foreign` (`featured_video_id`),
  KEY `posts_reporter_id_foreign` (`reporter_id`),
  KEY `posts_athor_id_foreign` (`author_id`),
  KEY `posts_created_by_foreign` (`created_by`),
  KEY `posts_updated_by_foreign` (`updated_by`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `shoulder`, `headline`, `hanger`, `author_id`, `reporter_id`, `content`, `featured_image_id`, `featured_video_id`, `video_position`, `share_at`, `published_at`, `status`, `instant_article`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(16, 'DU A UNIT RESULT PULISHED', 'DU A UNIT RESULT PULISHED', 'DU A UNIT RESULT PULISHED', 7, 7, '<p>this is content of</p><blockquote><p><strong>DU A UNIT RESULT PULISHED</strong></p></blockquote>', 13, NULL, NULL, '2019-09-26 18:02:00', '2019-09-27 18:02:00', '1', '1', NULL, NULL, NULL, '2019-09-25 18:04:44', '2019-09-25 18:04:44'),
(14, 'stock market unstable', 'stock market unstable', 'stock', 7, 7, '<p>this is content</p>', 4, 13, NULL, '2019-09-02 00:18:00', '2019-09-04 00:18:00', '1', '1', NULL, 9, NULL, '2019-09-25 00:21:11', '2019-09-25 17:42:35'),
(10, '20 KM JAM IN DHAKA TANGAIL HIGHWAY', 'new', 'hanger', 9, 9, '<p>new content</p>', 4, 6, NULL, '2019-09-13 01:27:00', '2019-09-14 01:27:00', '1', NULL, NULL, 9, NULL, '2019-09-13 01:29:59', '2019-09-25 17:38:58'),
(15, 'JSC result publihed', '20 % fail in JSC', 'jsc result publish', 7, 9, '<p>test jsc&nbsp;</p>', 3, NULL, NULL, '2019-09-05 00:23:00', '2019-09-07 00:23:00', '1', NULL, NULL, 9, NULL, '2019-09-25 00:23:04', '2019-09-25 00:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `post_areas`
--

DROP TABLE IF EXISTS `post_areas`;
CREATE TABLE IF NOT EXISTS `post_areas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `area_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_areas_post_id_foreign` (`post_id`),
  KEY `post_areas_area_id_foreign` (`area_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_areas`
--

INSERT INTO `post_areas` (`id`, `post_id`, `area_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 7, NULL, NULL),
(2, NULL, 11, NULL, NULL),
(3, NULL, 12, NULL, NULL),
(4, 5, 12, NULL, NULL),
(5, 5, 11, NULL, NULL),
(6, 5, 12, NULL, NULL),
(7, 6, 7, NULL, NULL),
(8, 6, 11, NULL, NULL),
(9, 6, 12, NULL, NULL),
(10, 8, 7, NULL, NULL),
(26, 13, 7, NULL, NULL),
(12, 8, 12, NULL, NULL),
(13, 9, 7, NULL, NULL),
(14, 9, 11, NULL, NULL),
(15, 9, 12, NULL, NULL),
(28, 14, 12, NULL, NULL),
(27, 14, 7, NULL, NULL),
(18, 11, 8, NULL, NULL),
(19, 11, 10, NULL, NULL),
(25, 10, 12, NULL, NULL),
(24, 10, 7, NULL, NULL),
(22, 12, 12, NULL, NULL),
(23, 12, 7, NULL, NULL),
(29, 15, 12, NULL, NULL),
(30, 15, 7, NULL, NULL),
(31, 16, 7, NULL, NULL),
(32, 16, 12, NULL, NULL),
(33, 17, 7, NULL, NULL),
(34, 17, 12, NULL, NULL),
(35, 18, 7, NULL, NULL),
(36, 18, 12, NULL, NULL),
(37, 19, 7, NULL, NULL),
(38, 19, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

DROP TABLE IF EXISTS `post_categories`;
CREATE TABLE IF NOT EXISTS `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_categories_post_id_foreign` (`post_id`),
  KEY `post_categories_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `post_id`, `category_id`, `created_at`, `updated_at`) VALUES
(12, 14, 16, NULL, NULL),
(11, 14, 2, NULL, NULL),
(3, 11, 3, NULL, NULL),
(4, 11, 14, NULL, NULL),
(10, 13, 1, NULL, NULL),
(9, 10, 1, NULL, NULL),
(7, 12, 4, NULL, NULL),
(8, 12, 2, NULL, NULL),
(13, 14, 17, NULL, NULL),
(14, 15, 1, NULL, NULL),
(15, 15, 16, NULL, NULL),
(16, 16, 1, NULL, NULL),
(17, 16, 16, NULL, NULL),
(18, 16, 17, NULL, NULL),
(19, 17, 1, NULL, NULL),
(20, 17, 16, NULL, NULL),
(21, 17, 17, NULL, NULL),
(22, 18, 1, NULL, NULL),
(23, 18, 16, NULL, NULL),
(24, 18, 17, NULL, NULL),
(25, 19, 1, NULL, NULL),
(26, 19, 16, NULL, NULL),
(27, 19, 17, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_contents`
--

DROP TABLE IF EXISTS `post_contents`;
CREATE TABLE IF NOT EXISTS `post_contents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `content_id` int(10) UNSIGNED DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_contents_post_id_foreign` (`post_id`),
  KEY `post_contents_content_id_foreign` (`content_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_contents`
--

INSERT INTO `post_contents` (`id`, `post_id`, `content_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 7, 1, NULL, NULL, NULL),
(4, 11, 1, NULL, NULL, NULL),
(5, 11, 1, NULL, NULL, NULL),
(26, 10, 4, NULL, NULL, NULL),
(25, 12, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_scrolls`
--

DROP TABLE IF EXISTS `post_scrolls`;
CREATE TABLE IF NOT EXISTS `post_scrolls` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `scroll_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_scrolls_post_id_foreign` (`post_id`),
  KEY `post_scrolls_scroll_id_foreign` (`scroll_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_scrolls`
--

INSERT INTO `post_scrolls` (`id`, `post_id`, `scroll_id`, `created_at`, `updated_at`) VALUES
(3, 12, 1, NULL, NULL),
(2, 12, 2, NULL, NULL),
(4, 12, 2, NULL, NULL),
(5, 12, 1, NULL, NULL),
(6, 12, 3, NULL, NULL),
(12, 16, 1, NULL, NULL),
(9, 13, 1, NULL, NULL),
(13, 17, 1, NULL, NULL),
(11, 15, 1, NULL, NULL),
(14, 18, 1, NULL, NULL),
(15, 19, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_sections`
--

DROP TABLE IF EXISTS `post_sections`;
CREATE TABLE IF NOT EXISTS `post_sections` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_sections_post_id_foreign` (`post_id`),
  KEY `post_sections_section_id_foreign` (`section_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

DROP TABLE IF EXISTS `post_tags`;
CREATE TABLE IF NOT EXISTS `post_tags` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `tag_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_tags_post_id_foreign` (`post_id`),
  KEY `post_tags_tag_id_foreign` (`tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(2, 10, 2, NULL, NULL),
(3, 8, 2, NULL, NULL),
(4, 13, 2, NULL, NULL),
(5, 14, 2, NULL, NULL),
(6, 15, 2, NULL, NULL),
(7, 16, 5, NULL, NULL),
(8, 16, 4, NULL, NULL),
(9, 16, 3, NULL, NULL),
(10, 16, 2, NULL, NULL),
(11, 17, 5, NULL, NULL),
(12, 17, 4, NULL, NULL),
(13, 17, 3, NULL, NULL),
(14, 17, 2, NULL, NULL),
(15, 18, 5, NULL, NULL),
(16, 18, 4, NULL, NULL),
(17, 18, 3, NULL, NULL),
(18, 18, 2, NULL, NULL),
(19, 19, 5, NULL, NULL),
(20, 19, 4, NULL, NULL),
(21, 19, 3, NULL, NULL),
(22, 19, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_topics`
--

DROP TABLE IF EXISTS `post_topics`;
CREATE TABLE IF NOT EXISTS `post_topics` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `topic_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_topics_post_id_foreign` (`post_id`),
  KEY `post_topics_topic_id_foreign` (`topic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_topics`
--

INSERT INTO `post_topics` (`id`, `post_id`, `topic_id`, `created_at`, `updated_at`) VALUES
(12, 13, 2, NULL, NULL),
(15, 14, 3, NULL, NULL),
(14, 14, 4, NULL, NULL),
(4, 11, 1, NULL, NULL),
(5, 11, 7, NULL, NULL),
(13, 14, 2, NULL, NULL),
(11, 10, 2, NULL, NULL),
(8, 12, 2, NULL, NULL),
(9, 12, 4, NULL, NULL),
(10, 12, 3, NULL, NULL),
(16, 15, 3, NULL, NULL),
(17, 16, 2, NULL, NULL),
(18, 16, 3, NULL, NULL),
(19, 17, 2, NULL, NULL),
(20, 17, 3, NULL, NULL),
(21, 18, 2, NULL, NULL),
(22, 18, 3, NULL, NULL),
(23, 19, 2, NULL, NULL),
(24, 19, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

DROP TABLE IF EXISTS `reminders`;
CREATE TABLE IF NOT EXISTS `reminders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `permissions2` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `permissions2`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(14, 'admin', 'admin', '{\"category.view\":true,\"category.viewall\":true,\"category.create\":true,\"category.update\":true,\"category.updateall\":true,\"category.delete\":true,\"category.deleteall\":true,\"topic.view\":true,\"topic.viewall\":false,\"topic.create\":false,\"topic.update\":false,\"topic.updateall\":false,\"topic.delete\":false,\"topic.deleteall\":false,\"area.view\":true,\"area.viewall\":false,\"area.create\":false,\"area.update\":false,\"area.updateall\":false,\"area.delete\":false,\"area.deleteall\":false,\"scroll.view\":true,\"scroll.viewall\":false,\"scroll.create\":false,\"scroll.update\":false,\"scroll.updateall\":false,\"scroll.delete\":false,\"scroll.deleteall\":false,\"news.view\":true,\"news.viewall\":true,\"news.create\":true,\"news.update\":true,\"news.updateall\":true,\"news.delete\":true,\"news.deleteall\":true,\"album.view\":true,\"album.viewall\":true,\"album.create\":true,\"album.update\":true,\"album.updateall\":true,\"album.delete\":true,\"album.deleteall\":true,\"role.view\":false,\"role.viewall\":false,\"role.create\":false,\"role.update\":false,\"role.updateall\":false,\"role.delete\":false,\"role.deleteall\":false,\"user.view\":false,\"user.viewall\":false,\"user.create\":false,\"user.update\":false,\"user.updateall\":false,\"user.delete\":false,\"user.deleteall\":false}', '{\"category_view\":true,\"category_viewall\":true,\"category_create\":true,\"category_update\":true,\"category_updateall\":true,\"category_delete\":true,\"category_deleteall\":true,\"topic_view\":true,\"topicviewall\":false,\"topic_create\":false,\"topic_update\":false,\"topic_updateall\":false,\"topic_delete\":false,\"topic_deleteall\":false,\"area_view\":true,\"area_viewall\":false,\"area_create\":false,\"area_update\":false,\"area_updateall\":false,\"area_delete\":false,\"area_deleteall\":false,\"scroll_view\":true,\"scroll_viewall\":false,\"scroll_create\":false,\"scroll_update\":false,\"scroll_updateall\":false,\"scroll_delete\":false,\"scroll_deleteall\":false,\"news_view\":true,\"news_viewall\":true,\"news_create\":true,\"news_update\":true,\"news_updateall\":true,\"news_delete\":true,\"news_deleteall\":true,\"album_view\":true,\"album_viewall\":true,\"album_create\":true,\"album_update\":true,\"album_updateall\":true,\"album_delete\":true,\"album_deleteall\":true,\"role_view\":false,\"role_viewall\":false,\"role_create\":false,\"role_update\":false,\"role_updateall\":false,\"role_delete\":false,\"role_deleteall\":false,\"user_view\":false,\"user_viewall\":false,\"user_create\":false,\"user_update\":false,\"user_updateall\":false,\"user_delete\":false,\"user_deleteall\":false}', NULL, NULL, '2019-09-19 17:14:31', '2019-09-24 00:44:53'),
(15, 'super_admin', 'super_admin', '{\"category.view\":true,\"category.viewall\":true,\"category.create\":true,\"category.update\":true,\"category.updateall\":true,\"category.delete\":true,\"category.deleteall\":true,\"topic.view\":true,\"topic.viewall\":false,\"topic.create\":true,\"topic.update\":true,\"topic.updateall\":true,\"topic.delete\":true,\"topic.deleteall\":true,\"area.view\":true,\"area.viewall\":true,\"area.create\":true,\"area.update\":true,\"area.updateall\":true,\"area.delete\":true,\"area.deleteall\":true,\"scroll.view\":true,\"scroll.viewall\":true,\"scroll.create\":true,\"scroll.update\":true,\"scroll.updateall\":true,\"scroll.delete\":true,\"scroll.deleteall\":true,\"news.view\":true,\"news.viewall\":true,\"news.create\":true,\"news.update\":true,\"news.updateall\":true,\"news.delete\":true,\"news.deleteall\":true,\"album.view\":true,\"album.viewall\":true,\"album.create\":true,\"album.update\":true,\"album.updateall\":true,\"album.delete\":true,\"album.deleteall\":true,\"role.view\":true,\"role.viewall\":true,\"role.create\":true,\"role.update\":true,\"role.updateall\":true,\"role.delete\":true,\"role.deleteall\":true,\"user.view\":true,\"user.viewall\":true,\"user.create\":true,\"user.update\":true,\"user.updateall\":true,\"user.delete\":true,\"user.deleteall\":true}', '{\"category_view\":true,\"category_viewall\":true,\"category_create\":true,\"category_update\":true,\"category_updateall\":true,\"category_delete\":true,\"category_deleteall\":true,\"topic_view\":true,\"topicviewall\":false,\"topic_create\":true,\"topic_update\":true,\"topic_updateall\":true,\"topic_delete\":true,\"topic_deleteall\":true,\"area_view\":true,\"area_viewall\":true,\"area_create\":true,\"area_update\":true,\"area_updateall\":true,\"area_delete\":true,\"area_deleteall\":true,\"scroll_view\":true,\"scroll_viewall\":true,\"scroll_create\":true,\"scroll_update\":true,\"scroll_updateall\":true,\"scroll_delete\":true,\"scroll_deleteall\":true,\"news_view\":true,\"news_viewall\":true,\"news_create\":true,\"news_update\":true,\"news_updateall\":true,\"news_delete\":true,\"news_deleteall\":true,\"album_view\":true,\"album_viewall\":true,\"album_create\":true,\"album_update\":true,\"album_updateall\":true,\"album_delete\":true,\"album_deleteall\":true,\"role_view\":true,\"role_viewall\":true,\"role_create\":true,\"role_update\":true,\"role_updateall\":true,\"role_delete\":true,\"role_deleteall\":true,\"user_view\":true,\"user_viewall\":true,\"user_create\":true,\"user_update\":true,\"user_updateall\":true,\"user_delete\":true,\"user_deleteall\":true}', NULL, NULL, '2019-09-19 17:18:47', '2019-09-22 09:56:44'),
(17, 'ajjhg', 'ajjhg', '{\"category.view\":true,\"category.viewall\":false,\"category.create\":false,\"category.update\":false,\"category.updateall\":false,\"category.delete\":false,\"category.deleteall\":false,\"topic.view\":false,\"topic.viewall\":true,\"topic.create\":false,\"topic.update\":false,\"topic.updateall\":false,\"topic.delete\":false,\"topic.deleteall\":false,\"area.view\":false,\"area.viewall\":true,\"area.create\":false,\"area.update\":false,\"area.updateall\":false,\"area.delete\":false,\"area.deleteall\":false,\"scroll.view\":false,\"scroll.viewall\":true,\"scroll.create\":false,\"scroll.update\":false,\"scroll.updateall\":false,\"scroll.delete\":false,\"scroll.deleteall\":false,\"news.view\":false,\"news.viewall\":true,\"news.create\":false,\"news.update\":false,\"news.updateall\":false,\"news.delete\":false,\"news.deleteall\":false}', '{\"category_view\":true,\"category_viewall\":false,\"category_create\":false,\"category_update\":false,\"category_updateall\":false,\"category_delete\":false,\"category_deleteall\":false,\"topic_view\":false,\"topic_viewall\":true,\"topic_create\":false,\"topic_update\":false,\"topic_updateall\":false,\"topic_delete\":false,\"topic_deleteall\":false,\"area_view\":false,\"area_viewall\":true,\"area_create\":false,\"area_update\":false,\"area_updateall\":false,\"area_delete\":false,\"area_deleteall\":false,\"scroll_view\":false,\"scroll_viewall\":true,\"scroll_create\":false,\"scroll_update\":false,\"scroll_updateall\":false,\"scroll_delete\":false,\"scroll_deleteall\":false,\"news_view\":false,\"news_viewall\":true,\"news_create\":false,\"news_update\":false,\"news_updateall\":false,\"news_delete\":false,\"news_deleteall\":false}', NULL, NULL, '2019-09-21 11:21:50', '2019-09-21 11:21:51'),
(18, 'regular_user', 'regular_user', '{\"category.view\":true,\"category.viewall\":false,\"category.create\":false,\"category.update\":false,\"category.updateall\":false,\"category.delete\":false,\"category.deleteall\":false,\"topic.view\":true,\"topic.viewall\":false,\"topic.create\":false,\"topic.update\":false,\"topic.updateall\":false,\"topic.delete\":false,\"topic.deleteall\":false,\"area.view\":true,\"area.viewall\":false,\"area.create\":false,\"area.update\":false,\"area.updateall\":false,\"area.delete\":false,\"area.deleteall\":false,\"scroll.view\":true,\"scroll.viewall\":false,\"scroll.create\":false,\"scroll.update\":false,\"scroll.updateall\":false,\"scroll.delete\":false,\"scroll.deleteall\":false,\"news.view\":true,\"news.viewall\":false,\"news.create\":false,\"news.update\":false,\"news.updateall\":false,\"news.delete\":false,\"news.deleteall\":false,\"album.view\":true,\"album.viewall\":false,\"album.create\":false,\"album.update\":false,\"album.updateall\":false,\"album.delete\":false,\"album.deleteall\":false,\"role.view\":true,\"role.viewall\":false,\"role.create\":false,\"role.update\":false,\"role.updateall\":false,\"role.delete\":false,\"role.deleteall\":false,\"user.view\":true,\"user.viewall\":false,\"user.create\":false,\"user.update\":false,\"user.updateall\":false,\"user.delete\":false,\"user.deleteall\":false}', '{\"category_view\":true,\"category_viewall\":false,\"category_create\":false,\"category_update\":false,\"category_updateall\":false,\"category_delete\":false,\"category_deleteall\":false,\"topic_view\":true,\"topic_viewall\":false,\"topic_create\":false,\"topic_update\":false,\"topic_updateall\":false,\"topic_delete\":false,\"topic_deleteall\":false,\"area_view\":true,\"area_viewall\":false,\"area_create\":false,\"area_update\":false,\"area_updateall\":false,\"area_delete\":false,\"area_deleteall\":false,\"scroll_view\":true,\"scroll_viewall\":false,\"scroll_create\":false,\"scroll_update\":false,\"scroll_updateall\":false,\"scroll_delete\":false,\"scroll_deleteall\":false,\"news_view\":true,\"news_viewall\":false,\"news_create\":false,\"news_update\":false,\"news_updateall\":false,\"news_delete\":false,\"news_deleteall\":false,\"album_view\":true,\"album_viewall\":false,\"album_create\":false,\"album_update\":false,\"album_updateall\":false,\"album_delete\":false,\"album_deleteall\":false,\"role_view\":true,\"role_viewall\":false,\"role_create\":false,\"role_update\":false,\"role_updateall\":false,\"role_delete\":false,\"role_deleteall\":false,\"user_view\":true,\"user_viewall\":false,\"user_create\":false,\"user_update\":false,\"user_updateall\":false,\"user_delete\":false,\"user_deleteall\":false}', NULL, NULL, '2019-09-25 18:50:07', '2019-09-25 18:50:07'),
(19, 'reporter', 'Reporter', '{\"category.view\":false,\"category.viewall\":false,\"category.create\":false,\"category.update\":false,\"category.updateall\":false,\"category.delete\":false,\"category.deleteall\":false,\"topic.view\":false,\"topic.viewall\":false,\"topic.create\":false,\"topic.update\":false,\"topic.updateall\":false,\"topic.delete\":false,\"topic.deleteall\":false,\"area.view\":false,\"area.viewall\":false,\"area.create\":false,\"area.update\":false,\"area.updateall\":false,\"area.delete\":false,\"area.deleteall\":false,\"scroll.view\":false,\"scroll.viewall\":false,\"scroll.create\":false,\"scroll.update\":false,\"scroll.updateall\":false,\"scroll.delete\":false,\"scroll.deleteall\":false,\"news.view\":true,\"news.viewall\":false,\"news.create\":true,\"news.update\":true,\"news.updateall\":false,\"news.delete\":true,\"news.deleteall\":false,\"album.view\":false,\"album.viewall\":false,\"album.create\":false,\"album.update\":false,\"album.updateall\":false,\"album.delete\":false,\"album.deleteall\":false,\"role.view\":false,\"role.viewall\":false,\"role.create\":false,\"role.update\":false,\"role.updateall\":false,\"role.delete\":false,\"role.deleteall\":false,\"user.view\":false,\"user.viewall\":false,\"user.create\":false,\"user.update\":false,\"user.updateall\":false,\"user.delete\":false,\"user.deleteall\":false}', '{\"category_view\":false,\"category_viewall\":false,\"category_create\":false,\"category_update\":false,\"category_updateall\":false,\"category_delete\":false,\"category_deleteall\":false,\"topic_view\":false,\"topic_viewall\":false,\"topic_create\":false,\"topic_update\":false,\"topic_updateall\":false,\"topic_delete\":false,\"topic_deleteall\":false,\"area_view\":false,\"area_viewall\":false,\"area_create\":false,\"area_update\":false,\"area_updateall\":false,\"area_delete\":false,\"area_deleteall\":false,\"scroll_view\":false,\"scroll_viewall\":false,\"scroll_create\":false,\"scroll_update\":false,\"scroll_updateall\":false,\"scroll_delete\":false,\"scroll_deleteall\":false,\"news_view\":true,\"news_viewall\":false,\"news_create\":true,\"news_update\":true,\"news_updateall\":false,\"news_delete\":true,\"news_deleteall\":false,\"album_view\":false,\"album_viewall\":false,\"album_create\":false,\"album_update\":false,\"album_updateall\":false,\"album_delete\":false,\"album_deleteall\":false,\"role_view\":false,\"role_viewall\":false,\"role_create\":false,\"role_update\":false,\"role_updateall\":false,\"role_delete\":false,\"role_deleteall\":false,\"user_view\":false,\"user_viewall\":false,\"user_create\":false,\"user_update\":false,\"user_updateall\":false,\"user_delete\":false,\"user_deleteall\":false}', NULL, NULL, '2019-09-25 18:52:33', '2019-09-25 18:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

DROP TABLE IF EXISTS `role_users`;
CREATE TABLE IF NOT EXISTS `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(7, 14, '2019-09-22 06:18:36', '2019-09-22 10:07:15'),
(9, 15, '2019-09-22 06:52:32', '2019-09-22 06:52:32'),
(10, 18, '2019-09-25 18:50:58', '2019-09-25 18:50:58'),
(11, 19, '2019-09-25 18:51:52', '2019-09-25 18:53:01'),
(12, 19, '2019-09-25 18:53:43', '2019-09-25 18:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `scrolls`
--

DROP TABLE IF EXISTS `scrolls`;
CREATE TABLE IF NOT EXISTS `scrolls` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `scrolls_created_by_foreign` (`created_by`),
  KEY `scrolls_updated_by_foreign` (`updated_by`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scrolls`
--

INSERT INTO `scrolls` (`id`, `title`, `parent_id`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'scroll 1', NULL, NULL, NULL, NULL, '2019-09-15 15:23:31', '2019-09-15 17:38:23'),
(3, 'scroll 2', 1, NULL, NULL, NULL, '2019-09-15 23:50:59', '2019-09-16 00:03:07'),
(4, 'scroll 2-1', 3, NULL, NULL, NULL, '2019-09-16 00:02:08', '2019-09-16 00:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sections_parent_id_foreign` (`parent_id`),
  KEY `sections_created_by_foreign` (`created_by`),
  KEY `sections_updated_by_foreign` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tags_created_by_foreign` (`created_by`),
  KEY `tags_updated_by_foreign` (`updated_by`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'tag 1', NULL, NULL, NULL, '2019-09-14 12:33:51', '2019-09-14 12:33:51'),
(3, 'tag2', NULL, NULL, NULL, '2019-09-25 00:27:06', '2019-09-25 00:27:06'),
(4, 'tag3', NULL, NULL, NULL, '2019-09-25 00:27:21', '2019-09-25 00:27:21'),
(5, 'tag4', NULL, NULL, NULL, '2019-09-25 00:27:32', '2019-09-25 00:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

DROP TABLE IF EXISTS `throttle`;
CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2019-09-09 09:31:22', '2019-09-09 09:31:22'),
(2, NULL, 'ip', '127.0.0.1', '2019-09-09 09:31:22', '2019-09-09 09:31:22'),
(3, 1, 'user', NULL, '2019-09-09 09:31:22', '2019-09-09 09:31:22'),
(4, NULL, 'global', NULL, '2019-09-09 09:31:29', '2019-09-09 09:31:29'),
(5, NULL, 'ip', '127.0.0.1', '2019-09-09 09:31:29', '2019-09-09 09:31:29'),
(6, 1, 'user', NULL, '2019-09-09 09:31:29', '2019-09-09 09:31:29'),
(7, NULL, 'global', NULL, '2019-09-09 09:31:37', '2019-09-09 09:31:37'),
(8, NULL, 'ip', '127.0.0.1', '2019-09-09 09:31:37', '2019-09-09 09:31:37'),
(9, 1, 'user', NULL, '2019-09-09 09:31:37', '2019-09-09 09:31:37'),
(10, NULL, 'global', NULL, '2019-09-21 16:03:56', '2019-09-21 16:03:56'),
(11, NULL, 'ip', '127.0.0.1', '2019-09-21 16:03:56', '2019-09-21 16:03:56'),
(12, 4, 'user', NULL, '2019-09-21 16:03:56', '2019-09-21 16:03:56'),
(13, NULL, 'global', NULL, '2019-09-21 16:37:40', '2019-09-21 16:37:40'),
(14, NULL, 'ip', '127.0.0.1', '2019-09-21 16:37:40', '2019-09-21 16:37:40'),
(15, 4, 'user', NULL, '2019-09-21 16:37:40', '2019-09-21 16:37:40'),
(16, NULL, 'global', NULL, '2019-09-22 01:20:20', '2019-09-22 01:20:20'),
(17, NULL, 'ip', '127.0.0.1', '2019-09-22 01:20:21', '2019-09-22 01:20:21'),
(18, NULL, 'global', NULL, '2019-09-22 01:20:36', '2019-09-22 01:20:36'),
(19, NULL, 'ip', '127.0.0.1', '2019-09-22 01:20:36', '2019-09-22 01:20:36'),
(20, 2, 'user', NULL, '2019-09-22 01:20:36', '2019-09-22 01:20:36'),
(21, NULL, 'global', NULL, '2019-09-22 01:21:47', '2019-09-22 01:21:47'),
(22, NULL, 'ip', '127.0.0.1', '2019-09-22 01:21:47', '2019-09-22 01:21:47'),
(23, 6, 'user', NULL, '2019-09-22 01:21:47', '2019-09-22 01:21:47'),
(24, NULL, 'global', NULL, '2019-09-22 01:21:56', '2019-09-22 01:21:56'),
(25, NULL, 'ip', '127.0.0.1', '2019-09-22 01:21:56', '2019-09-22 01:21:56'),
(26, 6, 'user', NULL, '2019-09-22 01:21:56', '2019-09-22 01:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `topics_parent_id_foreign` (`parent_id`),
  KEY `topics_created_by_foreign` (`created_by`),
  KEY `topics_updated_by_foreign` (`updated_by`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `title`, `parent_id`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'topic 1-1', NULL, 1, 1, NULL, '2019-09-12 08:46:05', '2019-09-13 09:50:26'),
(3, 'topic 1-2', NULL, 1, 1, NULL, '2019-09-12 08:48:01', '2019-09-13 09:50:33'),
(4, 'topic 1-1-1', 2, 1, 1, NULL, '2019-09-12 08:48:18', '2019-09-12 08:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `role_id`, `password`, `permissions`, `last_login`, `email_verified_at`, `name`, `remember_token`, `type`, `created_at`, `updated_at`) VALUES
(7, 'demo@gmail.com', NULL, '$2y$10$hkHabYCjO3wB8Pw8jOQrmuliK8..uwg9jm6r6t9ink/LRRks74Uca', NULL, '2019-09-22 10:08:01', NULL, 'su_user', NULL, NULL, '2019-09-22 06:18:36', '2019-09-22 10:08:01'),
(9, 'admin@gmail.com', NULL, '$2y$10$JCF4P04ZCG62yjYISwoSCe22lXcWtgJLNkrlul0dt1X/uJQW25f7C', NULL, '2019-09-25 18:56:30', NULL, 'admin', NULL, NULL, '2019-09-22 06:52:32', '2019-09-25 18:56:30'),
(10, 'arif@gmail.com', NULL, '$2y$10$rGIwUgk/DOlRqDsojV3WreaXcRzJ9lK7Pj8.Y13bJOK8WiwdDMr5q', NULL, NULL, NULL, 'arif', NULL, NULL, '2019-09-25 18:50:58', '2019-09-25 18:50:58'),
(11, 'sarif@gmail.com', NULL, '$2y$10$gQMO7qvNxVAhHTlEsiZ7fuMBxWumYLxTu5crJ/4.Fud7eVQWacNra', NULL, NULL, NULL, 'sarif', NULL, NULL, '2019-09-25 18:51:52', '2019-09-25 18:53:01'),
(12, 'kader@gmail.com', NULL, '$2y$10$yaWG9T7g7oMWYrzMdZCzGOlpKmaWVTQVNQCGBzThbLKX8124lV5L.', NULL, '2019-09-25 18:54:44', NULL, 'kader', NULL, NULL, '2019-09-25 18:53:43', '2019-09-25 18:54:44');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
