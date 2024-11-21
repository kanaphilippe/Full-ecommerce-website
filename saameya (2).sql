-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 21 nov. 2024 à 18:57
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `saameya`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `mobile`, `email`, `password`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Eden philipeee', 'admin', '4545274878', 'eden@admin.com', '$2y$12$z7xU3x4fQSTx7VxG4N1B0eUJVksl1cHSQypMG6k6VvYDeazQovme2', '83876.webp', 0, NULL, '2024-05-24 21:50:10'),
(2, 'william', 'subadmin', '1234569', 'william@subadmin.com', '$2y$12$C7Fgxd3mRP0.m.hV0CDEs.Lipj/SexSiYfM5zV1GPEZ8CKNXMsosi', '', 1, NULL, '2024-09-06 17:33:28'),
(3, 'kwemi', 'subadmin', '123458769', 'kwemi@subadmin.com', '$2y$12$C7Fgxd3mRP0.m.hV0CDEs.Lipj/SexSiYfM5zV1GPEZ8CKNXMsosi', '', 1, NULL, '2024-07-08 11:13:02'),
(4, 'Kana1', 'subadmin', '3517414205', 'dekanaphilippe@yahoo.com', '$2y$12$4hu/QxhNXdTEiPAzCrNHwOG29387ktuXReiYvMgddOEVhcskX8YgS', '18112.webp', 0, '2024-05-21 21:06:20', '2024-09-06 17:33:32');

-- --------------------------------------------------------

--
-- Structure de la table `admins_roles`
--

DROP TABLE IF EXISTS `admins_roles`;
CREATE TABLE IF NOT EXISTS `admins_roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subadmin_id` int NOT NULL,
  `module` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_access` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_access` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_access` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=165 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admins_roles`
--

INSERT INTO `admins_roles` (`id`, `subadmin_id`, `module`, `view_access`, `edit_access`, `full_access`, `created_at`, `updated_at`) VALUES
(51, 2, 'categories', '1', '1', '1', '2024-05-24 20:15:50', '2024-05-24 20:15:50'),
(105, 4, 'categories', '1', '1', '0', '2024-05-24 21:46:09', '2024-05-24 21:46:09'),
(104, 4, 'cms_pages', '1', '1', '0', '2024-05-24 21:46:09', '2024-05-24 21:46:09'),
(50, 2, 'subadmin_id', '0', '0', '0', '2024-05-24 20:15:50', '2024-05-24 20:15:50'),
(49, 2, '_token', '0', '0', '0', '2024-05-24 20:15:50', '2024-05-24 20:15:50'),
(103, 4, 'subadmin_id', '0', '0', '0', '2024-05-24 21:46:09', '2024-05-24 21:46:09'),
(102, 4, '_token', '0', '0', '0', '2024-05-24 21:46:09', '2024-05-24 21:46:09'),
(164, 3, 'brands', '1', '1', '0', '2024-06-29 18:17:21', '2024-06-29 18:17:21'),
(163, 3, 'products', '1', '1', '0', '2024-06-29 18:17:21', '2024-06-29 18:17:21'),
(162, 3, 'cms_pages', '1', '1', '1', '2024-06-29 18:17:21', '2024-06-29 18:17:21'),
(161, 3, 'subadmin_id', '0', '0', '0', '2024-06-29 18:17:21', '2024-06-29 18:17:21'),
(160, 3, '_token', '0', '0', '0', '2024-06-29 18:17:21', '2024-06-29 18:17:21');

-- --------------------------------------------------------

--
-- Structure de la table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int DEFAULT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `banners`
--

INSERT INTO `banners` (`id`, `image`, `type`, `link`, `title`, `alt`, `sort`, `status`, `created_at`, `updated_at`) VALUES
(1, '49515.jpg', 'Slider', '', 'Mobile Collection', 'Mobile Collection', 1, 1, NULL, '2024-07-17 17:58:41'),
(3, '65953.jpg', '', 'sdhsdhdfhsdzdfb', 'bnmfgfgjdfnjnj', 'xdfhdfhdfzdfb', 4, 1, '2024-07-02 17:57:42', '2024-07-17 17:59:07'),
(4, '95689.jpg', 'Fix', 'dhxdh', 'xcvbnm,', 'good best', 2, 1, '2024-07-17 18:01:11', '2024-07-17 18:01:11'),
(5, '6235.jpg', 'Fix', 'good best', 'sdfghjkl', 'spring collection snow', 3, 1, '2024-07-17 18:01:54', '2024-07-17 18:01:54'),
(7, '43998.jpg', 'Fix', 'good best', 'tdyuhijk', 'spring collection', 4, 1, '2024-07-17 18:32:12', '2024-07-17 18:32:12'),
(8, '68803.jpg', 'Slider', 'good best', 'fgfhjklò', 'fghjklò', 2, 1, '2024-07-17 19:00:05', '2024-07-17 19:00:05');

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_discount` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_image`, `brand_logo`, `brand_discount`, `description`, `url`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Arrow', '28685.jpg', '', 0, '', 'arrow', '', '', '', 1, NULL, '2024-11-07 02:58:15'),
(2, 'Philippe', '65911.jpg', '', 0, '', 'philippe', '', '', '', 1, NULL, '2024-11-07 02:58:41'),
(4, 'Fila', '6003.jpg', '62174.jpg', 0, 'it\'s a very good product you can test it yourself', 'Fila', 'fila', 'fila', 'fila', 1, '2024-06-28 09:35:46', '2024-11-07 02:59:15'),
(5, 'MOISE', '68046.jpg', '7039.jpg', 0, 'cghkfgk', 'shirt', 'sfggj', 'ghjd', 'hgj', 1, '2024-11-07 02:45:34', '2024-11-07 02:59:57'),
(6, 'Puma', '21776.jpg', '80104.jpg', 10, 'dfvvdf', 'denims', 'fdvdf', 'fddd', 'dfdf', 1, '2024-11-07 02:46:53', '2024-11-07 03:00:34'),
(7, 'Adidas', '87278.jpg', '', 10, 'dbfsdbs', 'dfdf', 'sdbsd', 'dfbdf', 'dfdf', 1, '2024-11-07 02:47:50', '2024-11-07 03:00:57');

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_qty` int NOT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=170 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `carts`
--

INSERT INTO `carts` (`id`, `session_id`, `user_id`, `product_id`, `product_qty`, `product_size`, `created_at`, `updated_at`) VALUES
(31, '55e3a162ef4ec6c315e3033e1f160c56', 0, 1, 1, 'Large', '2024-08-11 19:25:42', '2024-08-11 19:25:42'),
(30, '55e3a162ef4ec6c315e3033e1f160c56', 0, 1, 1, 'Medium', '2024-08-11 19:25:26', '2024-08-11 19:25:26'),
(28, '42b01b1f21c88b07110c282bec9036d0', 0, 1, 1, 'Medium', '2024-08-11 10:51:00', '2024-08-11 10:51:00'),
(29, '42b01b1f21c88b07110c282bec9036d0', 0, 1, 1, 'Large', '2024-08-11 10:52:56', '2024-08-11 10:52:56'),
(32, '55e3a162ef4ec6c315e3033e1f160c56', 0, 19, 1, 'Small', '2024-08-11 20:29:20', '2024-08-11 20:29:20'),
(33, '55e3a162ef4ec6c315e3033e1f160c56', 0, 27, 3, 'Small', '2024-08-11 20:30:34', '2024-08-11 20:30:34'),
(37, '74b44004d813c596ace0f63ace8cad98', 0, 24, 1, 'medium', '2024-08-13 10:36:34', '2024-08-13 10:36:34'),
(38, '74b44004d813c596ace0f63ace8cad98', 0, 1, 2, 'Medium', '2024-08-13 10:36:59', '2024-08-13 10:36:59'),
(39, '74b44004d813c596ace0f63ace8cad98', 0, 22, 1, 'XL', '2024-08-13 11:44:25', '2024-08-13 11:44:25'),
(41, 'd50d55742196553eea71ae754d1f6e37', 0, 26, 41, 'Large', '2024-08-19 09:56:16', '2024-08-19 20:11:09'),
(42, 'd50d55742196553eea71ae754d1f6e37', 0, 26, 20, 'Small', '2024-08-19 10:31:47', '2024-08-19 19:58:13'),
(43, 'd50d55742196553eea71ae754d1f6e37', 0, 26, 13, 'medium', '2024-08-19 10:33:41', '2024-08-19 20:11:31'),
(44, 'd50d55742196553eea71ae754d1f6e37', 0, 24, 5, 'Small', '2024-08-19 11:27:14', '2024-08-19 18:47:50'),
(45, 'd50d55742196553eea71ae754d1f6e37', 0, 24, 18, 'medium', '2024-08-19 11:46:46', '2024-08-19 20:51:35'),
(69, 'adf366a9762f342aafc13aedf393e78b', 0, 26, 5, 'Small', '2024-08-22 17:46:35', '2024-08-22 18:12:35'),
(66, '6c02923a28ec7046156c225f8025ee61', 0, 26, 12, 'Small', '2024-08-21 18:14:14', '2024-08-21 19:49:49'),
(169, '530a07ea1d51d143508f79e70ef69ba7', 1, 1, 1, 'Large', '2024-11-08 11:46:54', '2024-11-08 11:46:54'),
(68, '6c02923a28ec7046156c225f8025ee61', 0, 26, 3, 'Large', '2024-08-21 20:01:38', '2024-08-21 20:01:38'),
(71, 'adf366a9762f342aafc13aedf393e78b', 0, 26, 3, 'Large', '2024-08-22 17:46:53', '2024-08-22 17:46:53'),
(121, '0bee3ab7b4315d72e7fec904ddebec79', 0, 24, 3, 'Large', '2024-09-06 17:27:22', '2024-09-06 17:29:31'),
(120, '0bee3ab7b4315d72e7fec904ddebec79', 0, 22, 2, 'XL', '2024-09-06 17:21:31', '2024-09-06 17:29:39'),
(94, '507e1d13deedc249d11c5480fdd383b9', 0, 26, 2, 'Small', '2024-08-23 19:26:11', '2024-08-23 19:26:44'),
(119, 'be6a4beddf288a56d55d6f7c55f64d25', 0, 26, 1, 'Small', '2024-08-23 23:24:40', '2024-08-23 23:24:40'),
(123, '5c116277e394f4ab3caea94b7be5c2b9', 0, 28, 1, 'Large', '2024-09-13 16:04:10', '2024-09-13 16:04:10'),
(124, '5c116277e394f4ab3caea94b7be5c2b9', 0, 22, 1, 'XL', '2024-09-13 16:04:33', '2024-09-13 16:04:33'),
(127, '7445bb95e57426db6eac9684fdfa1a16', 0, 29, 1, '64GB-5GB', '2024-09-15 17:55:07', '2024-09-15 17:55:07');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL,
  `category_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_discount` double NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `category_name`, `category_image`, `category_discount`, `description`, `url`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Clothing', '24883.jpg', 0, NULL, 'clothing', NULL, NULL, NULL, 1, NULL, '2024-11-07 02:11:24'),
(2, 0, 'Electronics', '', 0, '', 'electronics', '', '', '', 1, NULL, '2024-11-13 23:10:16'),
(3, 0, 'Appliances', '', 0, '', 'appliances', '', '', '', 1, NULL, '2024-06-02 22:41:21'),
(4, 1, 'Men', '', 0, '', 'men', '', '', '', 1, NULL, '2024-05-24 09:19:32'),
(5, 1, 'Women', '', 0, '', 'women', '', '', '', 1, NULL, '2024-05-23 10:50:29'),
(6, 1, 'Kids', '', 0, '', 'kids', '', '', '', 1, NULL, '2024-05-23 11:50:53'),
(7, 5, 'Women T-shirts', '', 10, 'fghjkjlkkjhgf vvsvsdvsv', 'women-tops', 'women tops', 'women tops', 'tops', 1, '2024-05-24 06:54:14', '2024-07-03 10:45:27'),
(8, 3, 'mobile', '53547.jpg', 10, 'xcfghjklò', 'mobile', 'fghjk', 'mobile', 'mobile', 1, '2024-07-18 21:00:57', '2024-07-18 21:00:57'),
(9, 8, 'mobile', '', 0, 'SDFGFHJKLò', 'shirt', 'DFGFGHHJKJLL', 'rouge', 'smartphones', 1, '2024-07-18 21:08:15', '2024-07-19 12:12:50'),
(10, 2, 'Phones', '29403.png', 10, 'sthfghdfghdfgh', 'phones', 'dfg', 'dfghj', 'rouge', 1, '2024-11-14 16:05:36', '2024-11-14 16:05:36');

-- --------------------------------------------------------

--
-- Structure de la table `cms_pages`
--

DROP TABLE IF EXISTS `cms_pages`;
CREATE TABLE IF NOT EXISTS `cms_pages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `description`, `url`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Terms & Conditions', '<p>sdgfghjklkhgfdffgghj</p>', 'terms-conditions', 'just', 'just', 'just', 1, '2024-05-20 13:21:29', '2024-11-02 13:34:13');

-- --------------------------------------------------------

--
-- Structure de la table `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `color_name` varchar(255) NOT NULL,
  `color_code` varchar(255) NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `color_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Black', '#000000', 1, '2024-06-03 13:36:04', '2024-06-03 13:39:05'),
(2, 'Blue', '#0000FF', 1, '2024-06-03 13:36:04', '2024-06-03 13:39:05'),
(3, 'Brown', '#964B00', 1, '2024-06-03 13:40:28', '2024-06-03 13:42:20'),
(4, 'Green', '#00FF00', 1, '2024-06-03 13:40:28', '2024-06-03 13:42:20'),
(5, 'Grey', '#808080', 1, '2024-06-03 13:45:10', '2024-06-03 13:46:37'),
(6, 'Multi', '', 1, '2024-06-03 13:45:10', '2024-06-03 13:46:37'),
(7, 'Olive', '#808000', 1, '2024-06-03 13:47:41', '2024-06-03 13:48:46'),
(8, 'Orange', '#FFA500', 1, '2024-06-03 13:47:41', '2024-06-03 13:48:46'),
(9, 'Pink', '#FFC0CB', 1, '2024-06-03 13:49:35', '2024-06-03 13:51:07'),
(10, 'Purple', '#A020F0', 1, '2024-06-03 13:49:35', '2024-06-03 13:51:07'),
(11, 'Red', '#FF0000', 1, '2024-06-03 13:52:05', '2024-06-03 13:53:05'),
(12, 'White', '#FFFFFF', 1, '2024-06-03 13:52:05', '2024-06-03 13:53:05'),
(13, 'Yellow', '#FFFF00', 1, '2024-06-03 13:54:22', '2024-06-03 13:54:57');

-- --------------------------------------------------------

--
-- Structure de la table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `status` tinyint NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=247 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'AL', 'Albania', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'DZ', 'Algeria', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'AS', 'American Samoa', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'AD', 'Andorra', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'AO', 'Angola', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'AI', 'Anguilla', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'AQ', 'Antarctica', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'AG', 'Antigua and Barbuda', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'AR', 'Argentina', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'AM', 'Armenia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'AW', 'Aruba', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'AU', 'Australia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'AT', 'Austria', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'AZ', 'Azerbaijan', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'BS', 'Bahamas', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'BH', 'Bahrain', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'BD', 'Bangladesh', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'BB', 'Barbados', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'BY', 'Belarus', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'BE', 'Belgium', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'BZ', 'Belize', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'BJ', 'Benin', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'BM', 'Bermuda', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'BT', 'Bhutan', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'BO', 'Bolivia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'BA', 'Bosnia and Herzegovina', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'BW', 'Botswana', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'BV', 'Bouvet Island', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'BR', 'Brazil', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'IO', 'British Indian Ocean Territory', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'BN', 'Brunei Darussalam', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'BG', 'Bulgaria', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'BF', 'Burkina Faso', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'BI', 'Burundi', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'KH', 'Cambodia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'CM', 'Cameroon', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'CA', 'Canada', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'CV', 'Cape Verde', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'KY', 'Cayman Islands', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'CF', 'Central African Republic', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'TD', 'Chad', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'CL', 'Chile', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'CN', 'China', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'CX', 'Christmas Island', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'CC', 'Cocos (Keeling) Islands', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'CO', 'Colombia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'KM', 'Comoros', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'CD', 'Democratic Republic of the Congo', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'CG', 'Republic of Congo', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'CK', 'Cook Islands', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'CR', 'Costa Rica', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'HR', 'Croatia (Hrvatska)', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'CU', 'Cuba', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'CY', 'Cyprus', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'CZ', 'Czech Republic', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'DK', 'Denmark', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'DJ', 'Djibouti', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'DM', 'Dominica', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'DO', 'Dominican Republic', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'TL', 'East Timor', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'EC', 'Ecuador', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'EG', 'Egypt', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'SV', 'El Salvador', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'GQ', 'Equatorial Guinea', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'ER', 'Eritrea', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'EE', 'Estonia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'ET', 'Ethiopia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'FK', 'Falkland Islands (Malvinas)', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'FO', 'Faroe Islands', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'FJ', 'Fiji', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'FI', 'Finland', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'FR', 'France', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'FX', 'France, Metropolitan', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'GF', 'French Guiana', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'PF', 'French Polynesia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'TF', 'French Southern Territories', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'GA', 'Gabon', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'GM', 'Gambia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'GE', 'Georgia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'DE', 'Germany', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'GH', 'Ghana', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'GI', 'Gibraltar', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'GG', 'Guernsey', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'GR', 'Greece', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'GL', 'Greenland', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'GD', 'Grenada', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'GP', 'Guadeloupe', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'GU', 'Guam', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'GT', 'Guatemala', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'GN', 'Guinea', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'GW', 'Guinea-Bissau', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'GY', 'Guyana', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'HT', 'Haiti', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'HM', 'Heard and Mc Donald Islands', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'HN', 'Honduras', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'HK', 'Hong Kong', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'HU', 'Hungary', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'IS', 'Iceland', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'IN', 'India', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'IM', 'Isle of Man', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'ID', 'Indonesia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'IR', 'Iran (Islamic Republic of)', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'IQ', 'Iraq', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'IE', 'Ireland', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'IL', 'Israel', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'IT', 'Italy', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'CI', 'Ivory Coast', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'JE', 'Jersey', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'JM', 'Jamaica', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'JP', 'Japan', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'JO', 'Jordan', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'KZ', 'Kazakhstan', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'KE', 'Kenya', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'KI', 'Kiribati', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'KP', 'Korea, Democratic People\'s Republic of', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'KR', 'Korea, Republic of', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'XK', 'Kosovo', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'KW', 'Kuwait', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'KG', 'Kyrgyzstan', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'LA', 'Lao People\'s Democratic Republic', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'LV', 'Latvia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'LB', 'Lebanon', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'LS', 'Lesotho', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'LR', 'Liberia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'LY', 'Libyan Arab Jamahiriya', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'LI', 'Liechtenstein', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'LT', 'Lithuania', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'LU', 'Luxembourg', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'MO', 'Macau', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'MK', 'North Macedonia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'MG', 'Madagascar', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'MW', 'Malawi', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'MY', 'Malaysia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'MV', 'Maldives', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'ML', 'Mali', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'MT', 'Malta', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'MH', 'Marshall Islands', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'MQ', 'Martinique', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'MR', 'Mauritania', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'MU', 'Mauritius', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'YT', 'Mayotte', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'MX', 'Mexico', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'FM', 'Micronesia, Federated States of', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'MD', 'Moldova, Republic of', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'MC', 'Monaco', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'MN', 'Mongolia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'ME', 'Montenegro', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'MS', 'Montserrat', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'MA', 'Morocco', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'MZ', 'Mozambique', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'MM', 'Myanmar', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 'NA', 'Namibia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 'NR', 'Nauru', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 'NP', 'Nepal', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 'NL', 'Netherlands', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'AN', 'Netherlands Antilles', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 'NC', 'New Caledonia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 'NZ', 'New Zealand', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 'NI', 'Nicaragua', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'NE', 'Niger', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 'NG', 'Nigeria', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 'NU', 'Niue', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 'NF', 'Norfolk Island', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 'MP', 'Northern Mariana Islands', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 'NO', 'Norway', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 'OM', 'Oman', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 'PK', 'Pakistan', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 'PW', 'Palau', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 'PS', 'Palestine', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 'PA', 'Panama', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 'PG', 'Papua New Guinea', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 'PY', 'Paraguay', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 'PE', 'Peru', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 'PH', 'Philippines', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 'PN', 'Pitcairn', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 'PL', 'Poland', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 'PT', 'Portugal', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 'PR', 'Puerto Rico', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 'QA', 'Qatar', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 'RE', 'Reunion', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 'RO', 'Romania', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 'RU', 'Russian Federation', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 'RW', 'Rwanda', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 'KN', 'Saint Kitts and Nevis', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 'LC', 'Saint Lucia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 'VC', 'Saint Vincent and the Grenadines', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 'WS', 'Samoa', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 'SM', 'San Marino', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 'ST', 'Sao Tome and Principe', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 'SA', 'Saudi Arabia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 'SN', 'Senegal', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 'RS', 'Serbia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 'SC', 'Seychelles', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 'SL', 'Sierra Leone', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 'SG', 'Singapore', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 'SK', 'Slovakia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 'SI', 'Slovenia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 'SB', 'Solomon Islands', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 'SO', 'Somalia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 'ZA', 'South Africa', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 'GS', 'South Georgia South Sandwich Islands', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 'SS', 'South Sudan', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 'ES', 'Spain', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 'LK', 'Sri Lanka', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 'SH', 'St. Helena', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 'PM', 'St. Pierre and Miquelon', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 'SD', 'Sudan', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 'SR', 'Suriname', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 'SZ', 'Eswatini', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 'SE', 'Sweden', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 'CH', 'Switzerland', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 'SY', 'Syrian Arab Republic', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 'TW', 'Taiwan', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 'TJ', 'Tajikistan', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 'TZ', 'Tanzania, United Republic of', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 'TH', 'Thailand', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 'TG', 'Togo', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 'TK', 'Tokelau', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 'TO', 'Tonga', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 'TT', 'Trinidad and Tobago', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 'TN', 'Tunisia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 'TR', 'Turkey', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 'TM', 'Turkmenistan', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 'TC', 'Turks and Caicos Islands', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 'TV', 'Tuvalu', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 'UG', 'Uganda', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 'UA', 'Ukraine', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 'AE', 'United Arab Emirates', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 'GB', 'United Kingdom', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 'US', 'United States', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 'UM', 'United States minor outlying islands', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 'UY', 'Uruguay', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 'UZ', 'Uzbekistan', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 'VU', 'Vanuatu', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 'VA', 'Vatican City State', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 'VE', 'Venezuela', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 'VN', 'Vietnam', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 'VG', 'Virgin Islands (British)', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 'VI', 'Virgin Islands (U.S.)', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 'WF', 'Wallis and Futuna Islands', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 'EH', 'Western Sahara', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 'YE', 'Yemen', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 'ZM', 'Zambia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 'ZW', 'Zimbabwe', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `coupon_option` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brands` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `users` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_option`, `coupon_code`, `categories`, `brands`, `users`, `coupon_type`, `amount_type`, `amount`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Automatic', 'gSwYweE0', '1,4,5,7,6,2,3,8,9', '1,2,4', 'chephilippe65@gmail.com,dekanaphilippe@yahoo.com,dekanaphilippe1@yahoo.com,chephilippe656@gmail.com', 'Single Time', 'Percentage', 10, '2024-10-12', 1, '2024-10-10 10:37:03', '2024-10-10 10:40:38'),
(2, 'Manual', 'test20', '1,4,5,7,6,2,3,8,9', '1,2,4', 'chephilippe65@gmail.com', 'Single Time', 'Percentage', 20, '2024-09-30', 1, NULL, '2024-09-13 19:03:55'),
(4, 'Automatic', 'fkiAhSMW', '7,6', '2,4', 'dekanaphilippe1@yahoo.com', 'Multiple Times', 'Fixed', 50, '2024-09-28', 1, '2024-09-05 17:45:32', '2024-09-07 10:00:56'),
(5, 'Automatic', '10fO2fjG', '4,5', '1,2', 'chephilippe65@gmail.com,dekanaphilippe@yahoo.com', 'Multiple Times', 'Percentage', 20, '2024-09-28', 1, '2024-09-05 17:47:26', '2024-09-05 17:49:26');

-- --------------------------------------------------------

--
-- Structure de la table `delivery_addresses`
--

DROP TABLE IF EXISTS `delivery_addresses`;
CREATE TABLE IF NOT EXISTS `delivery_addresses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint NOT NULL DEFAULT '1',
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `user_id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `is_default`, `status`, `created_at`, `updated_at`) VALUES
(18, 1, 'DE KANA PHILIPPE FOKA CHE', 'casa', 'Alessandria', 'Maschile', 'Algeria', '15121', '3517414205', 0, 1, '2024-11-08 09:49:16', '2024-11-08 11:37:07'),
(16, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', 0, 1, '2024-09-28 13:31:44', '2024-11-08 11:37:07'),
(11, 1, 'DE KANAdddd PHILIPPE FOKA CHE', 'casa', 'Alessandria', 'Maschile', 'Cameroon', '15121', '3517414205', 1, 1, '2024-09-27 17:31:14', '2024-11-08 11:37:07');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `image_models`
--

DROP TABLE IF EXISTS `image_models`;
CREATE TABLE IF NOT EXISTS `image_models` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_14_161555_create_admins_table', 2),
(5, '2024_05_16_230521_create_image_models_table', 3),
(6, '2024_05_18_201641_create_cms_pages_table', 3),
(7, '2024_05_21_232918_create_admins_roles_table', 4),
(8, '2024_05_23_095916_create_categories_table', 5),
(9, '2024_05_25_050216_create_products_table', 6),
(10, '2024_05_27_150659_update_products_table', 7),
(11, '2024_05_27_151717_update_products_table', 8),
(12, '2024_06_03_143416_create_products_images_table', 9),
(13, '2024_06_04_092528_create_products_attributes_table', 10),
(14, '2024_06_13_074044_create_brands_table', 11),
(15, '2024_06_29_204049_create_banners_table', 12),
(16, '2024_07_19_201239_update_products_table', 13),
(17, '2024_07_25_200515_create_products_filters_table', 14),
(18, '2024_08_06_150938_create_recently_viewed_items_table', 15),
(19, '2024_08_09_194238_create_carts_table_table', 16),
(20, '2024_08_24_204957_add_columns_to_users_table', 17),
(21, '2024_09_02_203957_create_coupons_table', 18),
(22, '2024_09_14_173926_create_delivrery_addresses_table', 19),
(23, '2024_09_28_193424_create_orders_table', 20),
(24, '2024_09_28_195541_create_orders_products_table', 21),
(25, '2024_10_07_215109_create_order_statuses_table', 22),
(26, '2024_10_08_214712_create_orders_logs_table', 23),
(27, '2024_10_09_102519_update_orders_table', 24),
(28, '2024_10_10_154705_create_payments_table', 25),
(29, '2024_10_11_114438_create_shipping_charges_table', 26),
(30, '2024_10_19_083555_drop_column_from_shipping_charges_table', 27),
(31, '2024_10_19_083923_add_columns_to_shipping_charges_table', 28),
(32, '2024_10_21_185023_create_ratings_table', 29),
(33, '2024_10_24_094221_create_newsletter_subscribers_table', 30);

-- --------------------------------------------------------

--
-- Structure de la table `newsletter_subscribers`
--

DROP TABLE IF EXISTS `newsletter_subscribers`;
CREATE TABLE IF NOT EXISTS `newsletter_subscribers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'foka@gmail.com', 1, NULL, '2024-10-24 17:06:49'),
(3, 'ghgjdgj@gmail.com', 1, '2024-10-24 16:15:02', '2024-10-24 16:15:02'),
(4, 'dads@vvsdf.com', 1, '2024-10-24 16:23:26', '2024-10-24 16:23:26'),
(5, 'foka1@gmail.com', 1, '2024-11-08 11:52:18', '2024-11-08 11:52:18'),
(6, 'foka3@gmail.com', 1, '2024-11-08 22:29:44', '2024-11-08 22:29:44'),
(7, 'foka5@gmail.com', 1, '2024-11-08 22:39:26', '2024-11-08 22:39:26'),
(8, 'dadss@vvsdf.com', 1, '2024-11-08 22:40:40', '2024-11-08 22:40:40'),
(9, 'kiki22@gmail.com', 1, '2024-11-08 23:12:16', '2024-11-08 23:12:16');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charges` double NOT NULL,
  `coupon_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` double DEFAULT NULL,
  `order_status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_gateway` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` double NOT NULL,
  `courier_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracking_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `shipping_charges`, `coupon_code`, `coupon_amount`, `order_status`, `payment_method`, `payment_gateway`, `grand_total`, `courier_name`, `tracking_number`, `created_at`, `updated_at`) VALUES
(1, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Delivered', 'COD', 'COD', 25, 'Fedex', '2565654545', '2024-09-29 09:37:06', '2024-10-09 18:06:33'),
(2, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Delivered', 'COD', 'COD', 25, 'DHL', '148525485625', '2024-09-29 16:26:46', '2024-10-09 18:11:19'),
(3, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Shipped', 'COD', 'COD', 17.6, 'Posta', '148525485625', '2024-09-29 16:56:08', '2024-10-09 22:00:16'),
(4, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Shipped', 'COD', 'COD', 8.8, 'Fedex', '2565654545', '2024-10-08 14:42:08', '2024-10-10 09:39:09'),
(5, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'New', 'COD', 'COD', 9625, '', '', '2024-10-08 15:52:55', '2024-10-08 15:52:55'),
(6, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Shipped', 'COD', 'COD', 9625, 'Posta', '148525485625', '2024-10-08 15:56:45', '2024-10-09 12:59:23'),
(7, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'New', 'COD', 'COD', 9625, '', '', '2024-10-08 15:58:06', '2024-10-08 15:58:06'),
(8, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'New', 'COD', 'COD', 9625, '', '', '2024-10-08 16:01:39', '2024-10-08 16:01:39'),
(9, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Delivered', 'COD', 'COD', 9625, 'Fedex', '2565654545', '2024-10-08 16:02:51', '2024-10-09 12:53:02'),
(10, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, '', 'COD', 'COD', 9625, 'Fedex', '2565654545', '2024-10-08 16:07:44', '2024-10-17 18:13:49'),
(11, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'New', 'COD', 'COD', 9625, '', '', '2024-10-08 16:11:13', '2024-10-08 16:11:13'),
(12, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, 'gSwYweE0', 2.5, 'New', 'COD', 'COD', 22.5, '', '', '2024-10-10 10:38:47', '2024-10-10 10:38:47'),
(13, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 9600, '', '', '2024-10-10 13:18:46', '2024-10-10 13:18:46'),
(14, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 9600, '', '', '2024-10-10 17:44:01', '2024-10-10 17:44:01'),
(15, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 9600, '', '', '2024-10-10 17:49:35', '2024-10-10 17:49:35'),
(16, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 9600, '', '', '2024-10-10 17:58:17', '2024-10-10 17:58:17'),
(17, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 9600, '', '', '2024-10-10 18:01:48', '2024-10-10 18:01:48'),
(18, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 8.8, '', '', '2024-10-10 18:15:36', '2024-10-10 18:15:36'),
(19, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 8.8, '', '', '2024-10-10 18:18:40', '2024-10-10 18:18:40'),
(20, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 9608.8, '', '', '2024-10-10 18:22:25', '2024-10-10 18:22:25'),
(21, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 8.8, '', '', '2024-10-10 18:27:24', '2024-10-10 18:27:24'),
(22, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 900, '', '', '2024-10-10 18:34:24', '2024-10-10 18:34:24'),
(23, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 1350, '', '', '2024-10-10 18:42:44', '2024-10-10 18:42:44'),
(24, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 1800, '', '', '2024-10-10 18:48:44', '2024-10-10 18:48:44'),
(25, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Payment Capture', 'Prepaid', 'Paypal', 1800, '', '', '2024-10-11 08:00:17', '2024-10-11 08:05:46'),
(26, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Payment Capture', 'Prepaid', 'Paypal', 8.8, '', '', '2024-10-11 08:06:58', '2024-10-11 09:31:27'),
(27, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Payment Capture', 'Prepaid', 'Paypal', 9600, '', '', '2024-10-11 19:08:58', '2024-10-11 19:15:23'),
(28, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'New', 'COD', 'COD', 42.6, '', '', '2024-10-13 21:03:54', '2024-10-13 21:03:54'),
(29, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'New', 'COD', 'COD', 42.6, '', '', '2024-10-13 21:06:56', '2024-10-13 21:06:56'),
(30, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Payment Capture', 'Prepaid', 'Paypal', 25, '', '', '2024-10-13 21:55:37', '2024-10-13 21:57:07'),
(31, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Credit Card', 8.8, '', '', '2024-10-16 13:00:52', '2024-10-16 13:00:52'),
(32, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 8.8, '', '', '2024-10-16 13:01:22', '2024-10-16 13:01:22'),
(33, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Credit Card', 8.8, '', '', '2024-10-16 13:15:29', '2024-10-16 13:15:29'),
(34, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Credit Card', 9617.6, '', '', '2024-10-17 13:58:34', '2024-10-17 13:58:34'),
(35, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Credit Card', 9617.6, '', '', '2024-10-17 15:24:53', '2024-10-17 15:24:53'),
(36, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Credit Card', 9617.6, '', '', '2024-10-17 16:00:00', '2024-10-17 16:00:00'),
(37, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Credit Card', 9617.6, '', '', '2024-10-17 16:07:07', '2024-10-17 16:07:07'),
(38, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Credit Card', 9617.6, '', '', '2024-10-17 16:08:51', '2024-10-17 16:08:51'),
(39, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Credit Card', 9617.6, '', '', '2024-10-17 16:38:43', '2024-10-17 16:38:43'),
(40, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Credit Card', 9617.6, '', '', '2024-10-17 17:12:09', '2024-10-17 17:12:09'),
(41, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Shipped', 'Prepaid', 'Paypal', 9617.6, 'Fedex', '2565654545', '2024-10-17 17:34:26', '2024-10-17 17:37:06'),
(42, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 9617.6, '', '', '2024-10-17 17:42:27', '2024-10-17 17:42:27'),
(43, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 9617.6, '', '', '2024-10-17 17:59:16', '2024-10-17 17:59:16'),
(44, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 9617.6, '', '', '2024-10-17 18:15:22', '2024-10-17 18:15:22'),
(45, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 9617.6, '', '', '2024-10-17 19:02:58', '2024-10-17 19:02:58'),
(46, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 9617.6, '', '', '2024-10-17 19:39:33', '2024-10-17 19:39:33'),
(47, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Shipped', 'Prepaid', 'Paypal', 8.8, 'Fedex', '2565654545', '2024-10-17 19:47:13', '2024-10-17 19:49:47'),
(48, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 8.8, '', '', '2024-10-17 20:11:00', '2024-10-17 20:11:00'),
(49, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 8.8, '', '', '2024-10-17 20:23:23', '2024-10-17 20:23:23'),
(50, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 8.8, '', '', '2024-10-17 20:28:38', '2024-10-17 20:28:38'),
(51, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Payment Captured', 'Prepaid', 'Paypal', 8.8, '', '', '2024-10-17 20:35:27', '2024-10-17 20:42:00'),
(52, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 8.8, '', '', '2024-10-17 20:56:31', '2024-10-17 20:56:31'),
(53, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Payment Captured', 'Prepaid', 'Paypal', 8.8, '', '', '2024-10-17 21:01:39', '2024-10-17 21:03:03'),
(54, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Credit Card', 8.8, '', '', '2024-10-18 06:38:28', '2024-10-18 06:38:28'),
(55, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Credit Card', 8.8, '', '', '2024-10-18 06:43:29', '2024-10-18 06:43:29'),
(56, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Credit Card', 8.8, '', '', '2024-10-18 06:45:57', '2024-10-18 06:45:57'),
(57, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Credit Card', 8.8, '', '', '2024-10-18 06:53:06', '2024-10-18 06:53:06'),
(58, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Credit Card', 8.8, '', '', '2024-10-18 06:53:48', '2024-10-18 06:53:48'),
(59, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Credit Card', 8.8, '', '', '2024-10-18 07:07:59', '2024-10-18 07:07:59'),
(60, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 8.8, '', '', '2024-10-18 07:23:00', '2024-10-18 07:23:00'),
(61, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Credit Card', 8.8, '', '', '2024-10-18 08:13:38', '2024-10-18 08:13:38'),
(62, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Payment Captured', 'Prepaid', 'Credit Card', 8.8, '', '', '2024-10-18 08:46:39', '2024-10-18 08:47:42'),
(63, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Payment Captured', 'Prepaid', 'Credit Card', 8.8, '', '', '2024-10-18 08:52:20', '2024-10-18 08:53:25'),
(64, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Payment Captured', 'Prepaid', 'Paypal', 8.8, '', '', '2024-10-18 09:05:09', '2024-10-18 09:08:28'),
(65, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Payment Captured', 'Prepaid', 'Paypal', 8.8, '', '', '2024-10-18 09:13:41', '2024-10-18 09:14:09'),
(66, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Payment Captured', 'Prepaid', 'Credit Card', 8.8, '', '', '2024-10-18 09:15:01', '2024-10-18 09:15:46'),
(67, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Payment Captured', 'Prepaid', 'Paypal', 8.8, '', '', '2024-10-18 09:42:12', '2024-10-18 09:42:53'),
(68, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Payment Captured', 'Prepaid', 'Paypal', 9600, '', '', '2024-10-18 09:46:54', '2024-10-18 09:47:10'),
(69, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Payment Captured', 'Prepaid', 'Credit Card', 9600, '', '', '2024-10-18 09:48:43', '2024-10-18 09:49:30'),
(70, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 8.8, '', '', '2024-10-19 18:18:28', '2024-10-19 18:18:28'),
(71, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Credit Card', 8.8, '', '', '2024-10-19 18:18:48', '2024-10-19 18:18:48'),
(72, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 0, '', '', '2024-10-19 20:07:39', '2024-10-19 20:07:39'),
(73, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Credit Card', 0, '', '', '2024-10-19 20:08:19', '2024-10-19 20:08:19'),
(74, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 0, '', '', '2024-10-19 20:08:48', '2024-10-19 20:08:48'),
(75, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 0, '', '', '2024-10-19 20:10:13', '2024-10-19 20:10:13'),
(76, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 0, '', '', '2024-10-19 20:13:22', '2024-10-19 20:13:22'),
(77, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Payment Captured', 'Prepaid', 'Credit Card', 0, '', '', '2024-10-19 20:16:26', '2024-10-19 20:17:05'),
(78, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 0, '', '', '2024-10-19 20:22:10', '2024-10-19 20:22:10'),
(79, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Paypal', 0, '', '', '2024-10-19 20:25:30', '2024-10-19 20:25:30'),
(80, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Credit Card', 0, '', '', '2024-10-19 20:31:25', '2024-10-19 20:31:25'),
(81, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Payment Captured', 'Prepaid', 'Paypal', 8.8, '', '', '2024-10-19 20:37:31', '2024-10-19 20:38:18'),
(82, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Payment Captured', 'Prepaid', 'Paypal', 8.8, '', '', '2024-10-22 09:48:21', '2024-10-22 09:50:35'),
(83, 1, 'De kana Philippe Foka Che', 'VIA CERVINO 0', 'Torino', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Payment Captured', 'Prepaid', 'Credit Card', 8.8, '', '', '2024-10-22 09:52:03', '2024-10-22 09:52:54'),
(84, 1, 'DE KANAdddd PHILIPPE FOKA CHE', 'casa', 'Alessandria', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Payment Captured', 'Prepaid', 'Paypal', 9608.8, '', '', '2024-11-08 11:42:31', '2024-11-08 11:44:32'),
(85, 1, 'DE KANAdddd PHILIPPE FOKA CHE', 'casa', 'Alessandria', 'Maschile', 'Cameroon', '15121', '3517414205', '', 0, NULL, NULL, 'Pending', 'Prepaid', 'Credit Card', 9600, '', '', '2024-11-08 11:47:10', '2024-11-08 11:47:10');

-- --------------------------------------------------------

--
-- Structure de la table `orders_logs`
--

DROP TABLE IF EXISTS `orders_logs`;
CREATE TABLE IF NOT EXISTS `orders_logs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `orders_logs`
--

INSERT INTO `orders_logs` (`id`, `order_id`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 10, 'Pending', '2024-10-08 20:59:30', '2024-10-08 20:59:30'),
(2, 10, 'Delivered', '2024-10-08 21:05:51', '2024-10-08 21:05:51'),
(3, 10, 'Shipped', '2024-10-09 10:57:58', '2024-10-09 10:57:58'),
(4, 10, 'Shipped', '2024-10-09 12:01:23', '2024-10-09 12:01:23'),
(5, 10, 'Delivered', '2024-10-09 12:13:55', '2024-10-09 12:13:55'),
(6, 10, 'Shipped', '2024-10-09 12:44:07', '2024-10-09 12:44:07'),
(7, 9, 'Shipped', '2024-10-09 12:50:50', '2024-10-09 12:50:50'),
(8, 9, 'Delivered', '2024-10-09 12:53:02', '2024-10-09 12:53:02'),
(9, 6, 'Shipped', '2024-10-09 12:55:46', '2024-10-09 12:55:46'),
(10, 6, 'Delivered', '2024-10-09 12:56:20', '2024-10-09 12:56:20'),
(11, 6, 'Shipped', '2024-10-09 12:59:26', '2024-10-09 12:59:26'),
(12, 1, 'Shipped', '2024-10-09 18:05:52', '2024-10-09 18:05:52'),
(13, 1, 'Delivered', '2024-10-09 18:06:33', '2024-10-09 18:06:33'),
(14, 2, 'Shipped', '2024-10-09 18:09:39', '2024-10-09 18:09:39'),
(15, 2, 'Delivered', '2024-10-09 18:11:19', '2024-10-09 18:11:19'),
(16, 3, 'Shipped', '2024-10-09 21:58:01', '2024-10-09 21:58:01'),
(17, 3, 'New', '2024-10-09 22:00:01', '2024-10-09 22:00:01'),
(18, 3, 'Shipped', '2024-10-09 22:00:19', '2024-10-09 22:00:19'),
(19, 4, 'Shipped', '2024-10-10 08:57:28', '2024-10-10 08:57:28'),
(20, 4, 'Shipped', '2024-10-10 09:05:54', '2024-10-10 09:05:54'),
(21, 4, 'Shipped', '2024-10-10 09:10:37', '2024-10-10 09:10:37'),
(22, 4, 'Shipped', '2024-10-10 09:14:09', '2024-10-10 09:14:09'),
(23, 4, 'Shipped', '2024-10-10 09:17:53', '2024-10-10 09:17:53'),
(24, 4, 'Shipped', '2024-10-10 09:21:13', '2024-10-10 09:21:13'),
(25, 4, 'Shipped', '2024-10-10 09:23:49', '2024-10-10 09:23:49'),
(26, 4, 'Shipped', '2024-10-10 09:25:12', '2024-10-10 09:25:12'),
(27, 4, 'Shipped', '2024-10-10 09:28:39', '2024-10-10 09:28:39'),
(28, 4, 'Shipped', '2024-10-10 09:31:13', '2024-10-10 09:31:13'),
(29, 4, 'Shipped', '2024-10-10 09:39:12', '2024-10-10 09:39:12'),
(30, 41, 'In Process', '2024-10-17 17:36:18', '2024-10-17 17:36:18'),
(31, 41, 'Shipped', '2024-10-17 17:37:09', '2024-10-17 17:37:09'),
(32, 47, 'Shipped', '2024-10-17 19:49:49', '2024-10-17 19:49:49'),
(33, 51, 'Payment Captured', '2024-10-17 20:42:00', '2024-10-17 20:42:00');

-- --------------------------------------------------------

--
-- Structure de la table `orders_products`
--

DROP TABLE IF EXISTS `orders_products`;
CREATE TABLE IF NOT EXISTS `orders_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double NOT NULL,
  `product_qty` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `user_id`, `product_id`, `product_code`, `product_name`, `product_color`, `product_size`, `product_sku`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 28, 'AT02', 'Phones', 'Blue', 'Large', 'MM1', 25, 1, '2024-09-29 09:37:06', '2024-09-29 09:37:06'),
(2, 2, 1, 28, 'AT02', 'Phones', 'Blue', 'Large', 'MM1', 25, 1, '2024-09-29 16:26:46', '2024-09-29 16:26:46'),
(3, 3, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 2, '2024-09-29 16:56:08', '2024-09-29 16:56:08'),
(4, 4, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-08 14:42:08', '2024-10-08 14:42:08'),
(5, 5, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-08 15:52:55', '2024-10-08 15:52:55'),
(6, 5, 1, 28, 'AT02', 'Phones', 'Blue', 'Large', 'MM1', 25, 1, '2024-10-08 15:52:55', '2024-10-08 15:52:55'),
(7, 6, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-08 15:56:45', '2024-10-08 15:56:45'),
(8, 6, 1, 28, 'AT02', 'Phones', 'Blue', 'Large', 'MM1', 25, 1, '2024-10-08 15:56:45', '2024-10-08 15:56:45'),
(9, 7, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-08 15:58:06', '2024-10-08 15:58:06'),
(10, 7, 1, 28, 'AT02', 'Phones', 'Blue', 'Large', 'MM1', 25, 1, '2024-10-08 15:58:06', '2024-10-08 15:58:06'),
(11, 8, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-08 16:01:39', '2024-10-08 16:01:39'),
(12, 8, 1, 28, 'AT02', 'Phones', 'Blue', 'Large', 'MM1', 25, 1, '2024-10-08 16:01:39', '2024-10-08 16:01:39'),
(13, 9, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-08 16:02:51', '2024-10-08 16:02:51'),
(14, 9, 1, 28, 'AT02', 'Phones', 'Blue', 'Large', 'MM1', 25, 1, '2024-10-08 16:02:51', '2024-10-08 16:02:51'),
(15, 10, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-08 16:07:44', '2024-10-08 16:07:44'),
(16, 10, 1, 28, 'AT02', 'Phones', 'Blue', 'Large', 'MM1', 25, 1, '2024-10-08 16:07:44', '2024-10-08 16:07:44'),
(17, 11, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-08 16:11:13', '2024-10-08 16:11:13'),
(18, 11, 1, 28, 'AT02', 'Phones', 'Blue', 'Large', 'MM1', 25, 1, '2024-10-08 16:11:13', '2024-10-08 16:11:13'),
(19, 12, 1, 28, 'AT02', 'Phones', 'Blue', 'Large', 'MM1', 25, 1, '2024-10-10 10:38:47', '2024-10-10 10:38:47'),
(20, 13, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-10 13:18:46', '2024-10-10 13:18:46'),
(21, 14, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-10 17:44:01', '2024-10-10 17:44:01'),
(22, 15, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-10 17:49:35', '2024-10-10 17:49:35'),
(23, 16, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-10 17:58:17', '2024-10-10 17:58:17'),
(24, 17, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-10 18:01:48', '2024-10-10 18:01:48'),
(25, 18, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-10 18:15:36', '2024-10-10 18:15:36'),
(26, 19, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-10 18:18:40', '2024-10-10 18:18:40'),
(27, 20, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-10 18:22:25', '2024-10-10 18:22:25'),
(28, 20, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-10 18:22:25', '2024-10-10 18:22:25'),
(29, 21, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-10 18:27:24', '2024-10-10 18:27:24'),
(30, 22, 1, 24, 'AT02', 'blue t-shirt', 'Red', 'Small', 'S-S', 900, 1, '2024-10-10 18:34:24', '2024-10-10 18:34:24'),
(31, 23, 1, 24, 'AT02', 'blue t-shirt', 'Red', 'medium', 'M-M', 1350, 1, '2024-10-10 18:42:44', '2024-10-10 18:42:44'),
(32, 24, 1, 24, 'AT02', 'blue t-shirt', 'Red', 'Large', 'L-L', 1800, 1, '2024-10-10 18:48:44', '2024-10-10 18:48:44'),
(33, 25, 1, 24, 'AT02', 'blue t-shirt', 'Red', 'Large', 'L-L', 1800, 1, '2024-10-11 08:00:17', '2024-10-11 08:00:17'),
(34, 26, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-11 08:06:58', '2024-10-11 08:06:58'),
(35, 27, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-11 19:08:58', '2024-10-11 19:08:58'),
(36, 28, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 2, '2024-10-13 21:03:54', '2024-10-13 21:03:54'),
(37, 29, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 2, '2024-10-13 21:06:56', '2024-10-13 21:06:56'),
(38, 29, 1, 28, 'AT02', 'Phones', 'Blue', 'Large', 'MM1', 25, 1, '2024-10-13 21:06:56', '2024-10-13 21:06:56'),
(39, 30, 1, 28, 'AT02', 'Phones', 'Blue', 'Large', 'MM1', 25, 1, '2024-10-13 21:55:37', '2024-10-13 21:55:37'),
(40, 31, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-16 13:00:52', '2024-10-16 13:00:52'),
(41, 32, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-16 13:01:22', '2024-10-16 13:01:22'),
(42, 33, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-16 13:15:29', '2024-10-16 13:15:29'),
(43, 34, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-17 13:58:34', '2024-10-17 13:58:34'),
(44, 34, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 13:58:34', '2024-10-17 13:58:34'),
(45, 34, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 13:58:34', '2024-10-17 13:58:34'),
(46, 35, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-17 15:24:53', '2024-10-17 15:24:53'),
(47, 35, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 15:24:53', '2024-10-17 15:24:53'),
(48, 35, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 15:24:53', '2024-10-17 15:24:53'),
(49, 36, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-17 16:00:00', '2024-10-17 16:00:00'),
(50, 36, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 16:00:00', '2024-10-17 16:00:00'),
(51, 36, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 16:00:00', '2024-10-17 16:00:00'),
(52, 37, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-17 16:07:07', '2024-10-17 16:07:07'),
(53, 37, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 16:07:07', '2024-10-17 16:07:07'),
(54, 37, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 16:07:07', '2024-10-17 16:07:07'),
(55, 38, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-17 16:08:51', '2024-10-17 16:08:51'),
(56, 38, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 16:08:51', '2024-10-17 16:08:51'),
(57, 38, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 16:08:51', '2024-10-17 16:08:51'),
(58, 39, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-17 16:38:43', '2024-10-17 16:38:43'),
(59, 39, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 16:38:43', '2024-10-17 16:38:43'),
(60, 39, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 16:38:43', '2024-10-17 16:38:43'),
(61, 40, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-17 17:12:09', '2024-10-17 17:12:09'),
(62, 40, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 17:12:09', '2024-10-17 17:12:09'),
(63, 40, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 17:12:09', '2024-10-17 17:12:09'),
(64, 41, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-17 17:34:26', '2024-10-17 17:34:26'),
(65, 41, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 17:34:26', '2024-10-17 17:34:26'),
(66, 41, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 17:34:26', '2024-10-17 17:34:26'),
(67, 42, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-17 17:42:27', '2024-10-17 17:42:27'),
(68, 42, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 17:42:27', '2024-10-17 17:42:27'),
(69, 42, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 17:42:27', '2024-10-17 17:42:27'),
(70, 43, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-17 17:59:16', '2024-10-17 17:59:16'),
(71, 43, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 17:59:16', '2024-10-17 17:59:16'),
(72, 43, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 17:59:16', '2024-10-17 17:59:16'),
(73, 44, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-17 18:15:22', '2024-10-17 18:15:22'),
(74, 44, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 18:15:23', '2024-10-17 18:15:23'),
(75, 44, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 18:15:23', '2024-10-17 18:15:23'),
(76, 45, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-17 19:02:58', '2024-10-17 19:02:58'),
(77, 45, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 19:02:58', '2024-10-17 19:02:58'),
(78, 45, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 19:02:58', '2024-10-17 19:02:58'),
(79, 46, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-17 19:39:33', '2024-10-17 19:39:33'),
(80, 46, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 19:39:33', '2024-10-17 19:39:33'),
(81, 46, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 19:39:33', '2024-10-17 19:39:33'),
(82, 47, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 19:47:13', '2024-10-17 19:47:13'),
(83, 48, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 20:11:00', '2024-10-17 20:11:00'),
(84, 49, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 20:23:23', '2024-10-17 20:23:23'),
(85, 50, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 20:28:38', '2024-10-17 20:28:38'),
(86, 51, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 20:35:27', '2024-10-17 20:35:27'),
(87, 52, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 20:56:31', '2024-10-17 20:56:31'),
(88, 53, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-17 21:01:39', '2024-10-17 21:01:39'),
(89, 54, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-18 06:38:28', '2024-10-18 06:38:28'),
(90, 55, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-18 06:43:29', '2024-10-18 06:43:29'),
(91, 56, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-18 06:45:57', '2024-10-18 06:45:57'),
(92, 57, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-18 06:53:06', '2024-10-18 06:53:06'),
(93, 58, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-18 06:53:48', '2024-10-18 06:53:48'),
(94, 59, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-18 07:07:59', '2024-10-18 07:07:59'),
(95, 60, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-18 07:23:00', '2024-10-18 07:23:00'),
(96, 61, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-18 08:13:38', '2024-10-18 08:13:38'),
(97, 62, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-18 08:46:39', '2024-10-18 08:46:39'),
(98, 63, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-18 08:52:20', '2024-10-18 08:52:20'),
(99, 64, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-18 09:05:09', '2024-10-18 09:05:09'),
(100, 65, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-18 09:13:41', '2024-10-18 09:13:41'),
(101, 66, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-18 09:15:01', '2024-10-18 09:15:01'),
(102, 67, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-18 09:42:12', '2024-10-18 09:42:12'),
(103, 68, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-18 09:46:54', '2024-10-18 09:46:54'),
(104, 69, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-10-18 09:48:43', '2024-10-18 09:48:43'),
(105, 70, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-19 18:18:28', '2024-10-19 18:18:28'),
(106, 71, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-19 18:18:48', '2024-10-19 18:18:48'),
(107, 72, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-19 20:07:39', '2024-10-19 20:07:39'),
(108, 73, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-19 20:08:19', '2024-10-19 20:08:19'),
(109, 74, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-19 20:08:48', '2024-10-19 20:08:48'),
(110, 75, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-19 20:10:13', '2024-10-19 20:10:13'),
(111, 76, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-19 20:13:22', '2024-10-19 20:13:22'),
(112, 77, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-19 20:16:26', '2024-10-19 20:16:26'),
(113, 78, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-19 20:22:10', '2024-10-19 20:22:10'),
(114, 79, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-19 20:25:30', '2024-10-19 20:25:30'),
(115, 80, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-19 20:31:25', '2024-10-19 20:31:25'),
(116, 81, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-19 20:37:31', '2024-10-19 20:37:31'),
(117, 82, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-22 09:48:21', '2024-10-22 09:48:21'),
(118, 83, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-10-22 09:52:03', '2024-10-22 09:52:03'),
(119, 84, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-11-08 11:42:31', '2024-11-08 11:42:31'),
(120, 84, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Medium', 'RT001M', 8.8, 1, '2024-11-08 11:42:31', '2024-11-08 11:42:31'),
(121, 85, 1, 1, 'RT001', 'Green T-Shirt', 'Green Blue', 'Large', 'RT001L', 9600, 1, '2024-11-08 11:47:10', '2024-11-08 11:47:10');

-- --------------------------------------------------------

--
-- Structure de la table `order_statuses`
--

DROP TABLE IF EXISTS `order_statuses`;
CREATE TABLE IF NOT EXISTS `order_statuses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'New', 1, NULL, NULL),
(2, 'Pending', 1, NULL, NULL),
(3, 'Cancelled', 1, NULL, NULL),
(4, 'In Process', 1, NULL, NULL),
(5, 'Shipped', 1, NULL, NULL),
(6, 'Partially Shipped', 1, NULL, NULL),
(7, 'Delivered', 1, NULL, NULL),
(8, 'Partially Delivered', 1, NULL, NULL),
(9, 'Payment Captured', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` float NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `payments`
--

INSERT INTO `payments` (`id`, `payment_id`, `payer_id`, `payer_email`, `amount`, `currency`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'PAYID-M4ECXKY92589472DA3002444', 'TB2F4ZQLBMS6L', 'sb-rlqti33295314@personal.example.com', 120, 'USD', 'approved', '2024-10-10 17:33:22', '2024-10-10 17:33:22'),
(2, 'PAYID-M4ECXKY92589472DA3002444', 'TB2F4ZQLBMS6L', 'sb-rlqti33295314@personal.example.com', 120, 'USD', 'approved', '2024-10-10 17:37:31', '2024-10-10 17:37:31'),
(3, 'PAYID-M4EPOQY2UA8567262548584V', 'TB2F4ZQLBMS6L', 'sb-rlqti33295314@personal.example.com', 1967.4, 'USD', 'approved', '2024-10-11 08:01:32', '2024-10-11 08:01:32'),
(4, 'PAYID-M4EPOQY2UA8567262548584V', 'TB2F4ZQLBMS6L', 'sb-rlqti33295314@personal.example.com', 1967.4, 'USD', 'approved', '2024-10-11 08:03:48', '2024-10-11 08:03:48'),
(5, 'PAYID-M4EPOQY2UA8567262548584V', 'TB2F4ZQLBMS6L', 'sb-rlqti33295314@personal.example.com', 1967.4, 'USD', 'approved', '2024-10-11 08:04:58', '2024-10-11 08:04:58'),
(6, 'PAYID-M4EPQ3A7CR150610M481434J', 'TB2F4ZQLBMS6L', 'sb-rlqti33295314@personal.example.com', 1967.4, 'USD', 'approved', '2024-10-11 08:05:46', '2024-10-11 08:05:46'),
(7, 'PAYID-M4EPRTA9N2355759T1836021', 'TB2F4ZQLBMS6L', 'sb-rlqti33295314@personal.example.com', 9.62, 'USD', 'approved', '2024-10-11 08:07:28', '2024-10-11 08:07:28'),
(8, 'PAYID-M4EP2LY18E392951L0379059', 'TB2F4ZQLBMS6L', 'sb-rlqti33295314@personal.example.com', 9.62, 'USD', 'approved', '2024-10-11 08:26:36', '2024-10-11 08:26:36'),
(9, 'PAYID-M4EP2LY18E392951L0379059', 'TB2F4ZQLBMS6L', 'sb-rlqti33295314@personal.example.com', 9.62, 'USD', 'approved', '2024-10-11 08:27:31', '2024-10-11 08:27:31'),
(10, 'PAYID-M4EP7JA4YF20053MB6224723', 'TB2F4ZQLBMS6L', 'sb-rlqti33295314@personal.example.com', 9.62, 'USD', 'approved', '2024-10-11 08:36:35', '2024-10-11 08:36:35'),
(11, 'PAYID-M4EP7JA4YF20053MB6224723', 'TB2F4ZQLBMS6L', 'sb-rlqti33295314@personal.example.com', 9.62, 'USD', 'approved', '2024-10-11 08:37:25', '2024-10-11 08:37:25'),
(12, 'PAYID-M4EP7JA4YF20053MB6224723', 'TB2F4ZQLBMS6L', 'sb-rlqti33295314@personal.example.com', 9.62, 'USD', 'approved', '2024-10-11 08:38:26', '2024-10-11 08:38:26'),
(13, 'PAYID-M4EP7JA4YF20053MB6224723', 'TB2F4ZQLBMS6L', 'sb-rlqti33295314@personal.example.com', 9.62, 'USD', 'approved', '2024-10-11 09:31:27', '2024-10-11 09:31:27'),
(14, 'PAYID-M4EZH7Q4TS30174GD399613L', 'TB2F4ZQLBMS6L', 'sb-rlqti33295314@personal.example.com', 10492.8, 'USD', 'approved', '2024-10-11 19:15:23', '2024-10-11 19:15:23'),
(15, 'PAYID-M4GF4DQ4JM32159LY474614K', 'TB2F4ZQLBMS6L', 'sb-rlqti33295314@personal.example.com', 27.33, 'USD', 'approved', '2024-10-13 21:57:07', '2024-10-13 21:57:07'),
(16, 'PAYID-M4IZOXY0CP03828H25623348', 'TB2F4ZQLBMS6L', 'sb-rlqti33295314@personal.example.com', 9.62, 'USD', 'approved', '2024-10-17 21:03:03', '2024-10-17 21:03:03');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` double NOT NULL,
  `product_discount` double NOT NULL DEFAULT '0',
  `discount_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_price` double NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sleeve` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `wash_care` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `search_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `fabric` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pattern` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fit` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occasion` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` enum('No','Yes') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_bestseller` enum('No','Yes') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `product_name`, `product_code`, `product_color`, `family_color`, `group_code`, `product_price`, `product_discount`, `discount_type`, `final_price`, `product_image`, `sleeve`, `product_weight`, `product_video`, `description`, `wash_care`, `search_keywords`, `fabric`, `pattern`, `fit`, `occasion`, `meta_title`, `meta_description`, `meta_keywords`, `is_featured`, `is_bestseller`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 'Green T-Shirt', 'RT001', 'Green Blue', 'Yellow', 'TSHIRT0000', 100, 20, 'product', 80, '', '', '200', '', 'Test Product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 1, NULL, '2024-11-08 10:02:33'),
(3, 3, 1, 'black', 'AT02', 'Red', 'Yellow', '100', 1000, 50, 'product', 500, '', 'Sleeveless', '10', '', '', 'fghjm', NULL, 'Wool', 'Solid', 'Slim', 'Formal', 't-shirt', 't-shirt', 'shirt', 'Yes', 'No', 1, '2024-05-31 09:12:54', '2024-06-03 23:40:06'),
(4, 9, 1, 'blue t-shirt', 'AT04', 'yellow', 'Yellow', '100', 100, 20, 'product', 80, '', 'Sleeveless', '10', '', '', 'dfghjkl', NULL, 'Wool', 'Solid', 'Slim', 'Formal', 'fghjk', 'rouge', 'rouge', 'Yes', 'No', 1, '2024-05-31 10:46:37', '2024-08-05 19:32:47'),
(5, 9, 1, 'blue t-shirt', 'AT010', 'green', 'Pink', '100', 1000, 50, 'product', 500, '', 'Sleeveless', '10', '', '', 'fghjkl', NULL, 'Wool', 'Solid', 'Slim', 'Formal', 'mobile', 'mobile', 'rouge', 'Yes', 'No', 1, '2024-05-31 10:51:56', '2024-07-23 19:23:57'),
(6, 9, 1, 'blue t-shirt', 'AT011', 'green', 'Yellow', '100', 1000, 0, '', 1000, '', 'Sleeveless', '10', '', '', 'dfghjk', NULL, 'Wool', 'Solid', 'Slim', 'Formal', 'mobile', 'rouge', 'fghjk', 'Yes', 'Yes', 1, '2024-05-31 10:54:42', '2024-07-20 18:37:35'),
(7, 9, 1, 'blue t-shirt', 'AT05', 'green', 'Yellow', '100', 1000, 0, '', 1000, '', 'Sleeveless', '10', '', '', 'dfsfghjklòà', NULL, 'Wool', 'Solid', 'Slim', 'Formal', 'mobile', 'rouge', 'rouge', 'Yes', 'No', 1, '2024-05-31 11:03:36', '2024-07-20 18:45:10'),
(8, 9, 1, 'blue t-shirt', 'AT03', 'green', 'Yellow', '100', 1000, 0, '', 1000, '', 'Sleeveless', '10', '', '', 'dsfdghjhkjlò', NULL, 'Wool', 'Solid', 'Slim', 'Formal', 'mobile', 'mobile', 'rouge', 'Yes', 'No', 1, '2024-05-31 11:17:34', '2024-07-20 18:44:43'),
(9, 9, 1, 'blue t-shirt', 'AT02', 'Red', 'Yellow', '100', 100000, 0, '', 100000, '', 'Sleeveless', '10', '', '', 'dsdfghgjhkj', NULL, 'Wool', 'Solid', 'Slim', 'Formal', 'fghjk', 'rouge', 'fghjk', 'Yes', 'No', 1, '2024-05-31 11:21:36', '2024-07-20 18:43:53'),
(10, 9, 1, 'black', 'AT03', 'green', 'Yellow', '100', 1000, 50, 'product', 500, '', 'Sleeveless', '10', '', '', 'dfghjkl', NULL, 'Wool', 'Solid', 'Slim', 'Formal', 'mobile', 'mobile', 'rouge', 'Yes', 'Yes', 1, '2024-05-31 11:36:46', '2024-07-19 18:58:16'),
(11, 9, 2, 'blue t-shirt', 'AT04', 'green', 'Yellow', '100', 1000, 0, '', 1000, '', 'Sleeveless', '10', '664120873.mp4', '', 'cvcbnm', NULL, 'Wool', 'Solid', 'Slim', 'Formal', 'mobile', 'mobile', 'fghjk', 'Yes', 'No', 1, '2024-05-31 11:51:14', '2024-07-20 18:43:07'),
(12, 9, 1, 'blue t-shirt', 'AT03', 'green', 'Black', '100', 1000, 20, 'product', 800, '', 'Sleeveless', '10', '', 'dgfdgfhgjhkl', 'dfghjk', 'szdxfcgvhbjnkml', 'Wool', 'Solid', 'Slim', 'Formal', 'mobile', 'dfghj', 'rouge', 'Yes', 'Yes', 1, '2024-05-31 11:55:20', '2024-07-23 19:18:03'),
(13, 3, 1, 'blue t-shirt', 'AT011', 'Red', 'Golden', '100', 1000, 50, 'product', 500, '', 'Sleeveless', '10', '', 'xcvbnm,', 'fghjkj', 'xvcbnmm', 'Wool', 'Solid', 'Slim', 'Formal', 'mobile', 'rouge', 'fghjk', 'Yes', 'No', 1, '2024-05-31 12:23:26', '2024-06-02 23:18:49'),
(14, 3, 1, 'blue t-shirt', 'AT02', 'Red', 'Golden', '100', 100000, 50, 'product', 50000, '', 'Sleeveless', '10', '1329671651.mp4', '', 'fdgdhgjhh', NULL, 'Wool', 'Solid', 'Slim', 'Formal', 'mobile', 'mobile', 'rouge', 'Yes', 'No', 1, '2024-05-31 12:42:35', '2024-06-03 09:03:25'),
(15, 9, 1, 'blue t-shirt', 'AT03', 'green', 'Yellow', '100', 1000, 50, 'product', 500, '', 'Sleeveless', '10', '1368984425.mp4', 'SDFGJHKJL', NULL, NULL, 'Wool', 'Solid', 'Slim', 'Formal', NULL, NULL, NULL, 'Yes', 'Yes', 1, '2024-06-03 13:36:27', '2024-08-05 19:31:10'),
(16, 4, 1, 'blue t-shirt', 'AT03', 'green', 'Blue', '100', 1000, 50, 'product', 500, '', 'Full Sleeve', '10', '1351449637.mp4', 'SDFGJHKJL', NULL, NULL, 'Wool', 'Checked', 'Regular', 'Casual', NULL, NULL, NULL, 'Yes', 'No', 1, '2024-06-03 13:39:36', '2024-06-03 13:39:36'),
(17, 4, 1, 'blue t-shirt', 'AT03', 'green', 'Blue', '100', 1000, 50, 'product', 500, '', 'Full Sleeve', '10', '889559348.mp4', 'SDFGJHKJL', NULL, NULL, 'Wool', 'Checked', 'Regular', 'Casual', NULL, NULL, NULL, 'Yes', 'No', 1, '2024-06-03 13:42:50', '2024-06-03 13:42:50'),
(18, 9, 1, 'blue t-shirt', 'AT03', 'green', 'Brown', '100', 1000, 50, 'product', 500, '', 'Sleeveless', '10', '16362086.mp4', 'SDFGJHKJL', NULL, NULL, 'Wool', 'Solid', 'Slim', 'Formal', NULL, NULL, NULL, 'Yes', 'Yes', 1, '2024-06-03 13:43:27', '2024-07-23 19:21:16'),
(19, 9, 1, 'blue t-shirt', 'AT03', 'green', 'Yellow', '100', 1000, 50, 'product', 500, '', 'Sleeveless', '10', '1943994931.mp4', 'SDFGJHKJL', NULL, NULL, 'Wool', 'Solid', 'Slim', 'Formal', NULL, NULL, NULL, 'Yes', 'Yes', 1, '2024-06-03 13:46:31', '2024-08-04 21:52:55'),
(20, 9, 1, 'blue t-shirt', 'AT03', 'green', 'Yellow', '100', 1000, 50, 'product', 500, '', 'Sleeveless', '10', '381098178.mp4', 'SDFGJHKJL', NULL, NULL, 'Wool', 'Solid', 'Slim', 'Formal', NULL, NULL, NULL, 'Yes', 'Yes', 1, '2024-06-03 13:47:08', '2024-07-19 18:39:27'),
(21, 3, 1, 'blue t-shirt', 'AT03', 'green', 'Yellow', '100', 1000, 50, 'product', 500, '', 'Sleeveless', '10', '269468213.mp4', 'SDFGJHKJL', NULL, NULL, 'Wool', 'Solid', 'Slim', 'Formal', NULL, NULL, NULL, 'Yes', 'No', 1, '2024-06-03 14:16:52', '2024-06-03 14:23:53'),
(22, 9, 1, 'blue t-shirt', 'AT05', 'brown', 'Yellow', '100', 3000, 1, 'product', 2970, '', 'Sleeveless', '10', '', 'fghgjkljhgf', NULL, NULL, 'Wool', NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 1, '2024-06-03 22:12:07', '2024-08-13 12:35:08'),
(23, 9, 1, 'blue t-shirt', 'AT02', 'Red', 'Yellow', '100', 2500, 0, '', 2500, '', 'Sleeveless', '10', '', 'rtyghjjgfd', NULL, NULL, NULL, 'Solid', 'Slim', 'Formal', NULL, NULL, NULL, 'Yes', 'Yes', 1, '2024-06-03 22:16:15', '2024-07-20 18:41:21'),
(24, 9, 2, 'blue t-shirt', 'AT02', 'Red', 'Yellow', 'AT02100', 2500, 10, 'product', 2250, '', 'Sleeveless', '10', '', 'rtyghjjgfd', 'GOOD', 'GOOD', 'Wool', 'Solid', 'Slim', 'Formal', NULL, NULL, NULL, 'Yes', 'Yes', 1, '2024-06-03 22:16:51', '2024-08-05 12:41:05'),
(25, 9, 2, 'blue t-shirt', 'AT05', 'Red', 'Yellow', 'AT02100', 1000, 0, '', 1000, '', 'Sleeveless', '10', '1981281316.mp4', 'dfghjkl', 'dfghjkl', NULL, 'Wool', 'Solid', 'Slim', 'Formal', 't-shirt', 'smartphones', 'rouge', 'Yes', 'Yes', 1, '2024-06-05 09:47:07', '2024-08-05 17:06:37'),
(26, 9, 4, 'blue t-shirt', 'AT010', 'green', 'Yellow', 'AT02100', 800, 0, '', 800, '', 'Sleeveless', '10', '', 'fgfhdfgsdghfjkjhgf', 'tyuyrytretyrtuyiu', 'dgfhjkljkhjgfgfhjkk', 'Wool', 'Solid', 'Slim', 'Formal', 'mobile', 'rouge', 'rouge', 'Yes', 'Yes', 1, '2024-06-28 20:00:43', '2024-08-05 12:49:08'),
(27, 9, 2, 'bsext', 'AT011', 'green', 'Yellow', '100', 2500, 20, 'product', 2000, '', 'Sleeveless', '10', '', 'gfxgfkghjhk', 'fdgfghkjhkjkl', 'good', 'Wool', 'Solid', 'Slim', 'Formal', 'dfg', 'mobile', 'smartphones', 'Yes', 'Yes', 1, '2024-07-18 20:57:34', '2024-07-19 18:40:07'),
(28, 9, 2, 'Phones', 'AT02', 'Blue', 'Yellow', '100', 3000, 50, 'product', 1500, '', 'Sleeveless', '10', '', 'dfgfhgjhkjlkòl', 'zdfdghjkl', 'sdfgtyuyiuyutrre', 'Wool', 'Solid', 'Slim', 'Formal', 'smartphones', 'rouge', 'smartphones', 'Yes', 'Yes', 1, '2024-07-18 21:04:33', '2024-07-24 11:21:40'),
(29, 9, 2, 'Phones', 'AT010', 'green', 'Yellow', '100', 2500, 0, '', 2500, '', 'Sleeveless', '10', '', 'SDFGHJKJHGFD', 'DSFGGHJKJHG', 'DSFGHJUIUYF', 'Wool', 'Solid', 'Slim', 'Formal', 'DFGHKHJGF', 'smartphones', 'smartphones', 'Yes', 'Yes', 1, '2024-07-18 21:06:39', '2024-08-02 09:52:49'),
(30, 2, 4, 'Phones', 'AT04', 'Blue', 'Red', '100', 2500, 50, 'product', 1250, '', 'Full Sleeve', '10', '', 'rtrurturetur', 'erurtutru', 'euutyn,gddy', 'Polyester', 'Checked', 'Regular', 'Formal', 'fghjk', 'dfghj', 'mobile', 'Yes', 'Yes', 1, '2024-11-14 15:57:59', '2024-11-14 15:57:59'),
(31, 2, 4, 'Phones', 'AT03', 'green', 'White', 'AT02100', 1000, 0, '', 1000, '', 'Half Sleeve', '10', '', 'sfthsrthsrhsf', 'thsdhdsfh', 'hfghfg', 'Cotton', 'Checked', 'Regular', 'Casual', 'dfg', 'mobile', 'fghjk', 'Yes', 'Yes', 1, '2024-11-14 16:02:04', '2024-11-14 16:02:04'),
(32, 10, 5, 'Phones', 'AT03', 'green', 'Yellow', 'AT02100', 100000, 0, 'category', 90000, '', 'Full Sleeve', '10', '', 'SGDGV', 'DFGFGH', 'XCVFV', 'Cotton', 'Checked', 'Regular', 'Casual', 'DFB', 'FGN', 'FG', 'Yes', 'Yes', 1, '2024-11-14 16:09:30', '2024-11-14 16:09:30');

-- --------------------------------------------------------

--
-- Structure de la table `products_attributes`
--

DROP TABLE IF EXISTS `products_attributes`;
CREATE TABLE IF NOT EXISTS `products_attributes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `stock` int NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `size`, `sku`, `price`, `stock`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Small', 'RT001S', 1, 0, 1, NULL, '2024-08-01 17:49:43'),
(2, 1, 'Medium', 'RT001M', 11, 1091, 1, NULL, '2024-11-08 11:44:32'),
(3, 1, 'Large', 'RT001L', 12000, 1197, 1, NULL, '2024-11-08 11:44:32'),
(6, 26, 'Small', 'AT02-SS011', 1000, 20, 1, '2024-06-28 20:00:43', '2024-06-28 20:00:43'),
(7, 27, 'Small', 'AT02-S', 1000, 50, 1, '2024-07-18 20:57:34', '2024-07-18 20:57:34'),
(8, 29, '64GB-5GB', 'AA10', 55, 5, 1, '2024-07-18 21:06:40', '2024-08-02 09:51:42'),
(9, 28, 'Large', 'MM1', 50, 3, 1, '2024-07-24 11:21:40', '2024-10-13 21:57:07'),
(10, 24, 'Small', 'S-S', 1000, 5, 1, '2024-08-04 18:11:39', '2024-08-04 18:11:39'),
(11, 24, 'medium', 'M-M', 1500, 50, 1, '2024-08-04 18:11:39', '2024-08-04 18:11:39'),
(12, 24, 'Large', 'L-L', 2000, 100, 1, '2024-08-04 18:11:39', '2024-08-04 18:11:39'),
(13, 19, 'Small', 'P', 1000, 50, 1, '2024-08-04 21:52:55', '2024-08-04 21:52:55'),
(14, 19, 'medium', 'M', 1000, 50, 1, '2024-08-04 21:54:00', '2024-08-04 21:54:00'),
(15, 25, 'XL', 'XL-1', 50, 1, 1, '2024-08-05 12:46:00', '2024-08-05 12:46:00'),
(16, 25, 'XXL', 'XXL-1', 100, 150, 1, '2024-08-05 12:46:00', '2024-08-05 12:46:00'),
(17, 25, 'M', 'M-1', 55, 200, 1, '2024-08-05 12:46:00', '2024-08-05 12:46:00'),
(18, 25, 'L', 'L-1', 200, 200, 1, '2024-08-05 12:46:00', '2024-08-05 17:17:43'),
(19, 25, 'S', 'S-1', 250, 300, 0, '2024-08-05 12:46:00', '2024-08-05 17:07:52'),
(20, 26, 'medium', 'M-11', 1000, 20, 1, '2024-08-05 12:53:40', '2024-08-05 12:53:40'),
(21, 26, 'Large', 'L-', 55, 100, 1, '2024-08-05 12:53:40', '2024-08-05 12:53:40'),
(22, 22, 'XL', 'fhghj', 100, 5, 1, '2024-08-13 11:43:36', '2024-08-13 11:43:36'),
(23, 31, 'XL', 'DSF', 55, 5, 1, '2024-11-14 16:02:05', '2024-11-14 16:02:05'),
(24, 31, 'medium', 'SGB', 100, 20, 1, '2024-11-14 16:02:05', '2024-11-14 16:02:05'),
(25, 31, 'Large', 'AT02', 2000, 20, 1, '2024-11-14 16:02:05', '2024-11-14 16:02:05'),
(26, 32, 'Small', 'AT036', 2000, 50, 1, '2024-11-14 16:09:30', '2024-11-14 16:09:30'),
(27, 32, 'medium', 'NNDJ', 2000, 7, 1, '2024-11-14 16:09:30', '2024-11-14 16:09:30'),
(28, 32, 'Large', 'GDTY', 2000, 7, 1, '2024-11-14 16:09:30', '2024-11-14 16:09:30');

-- --------------------------------------------------------

--
-- Structure de la table `products_filters`
--

DROP TABLE IF EXISTS `products_filters`;
CREATE TABLE IF NOT EXISTS `products_filters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `filter_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filter_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products_filters`
--

INSERT INTO `products_filters` (`id`, `filter_name`, `filter_value`, `sort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fabric', 'Cotton', 1, 1, NULL, NULL),
(2, 'Fabric', 'Polyester', 2, 1, NULL, NULL),
(3, 'Fabric', 'Wool', 3, 1, NULL, NULL),
(4, 'Sleeve', 'Full Sleeve', 1, 1, NULL, NULL),
(5, 'Sleeve', 'Half Sleeve', 2, 1, NULL, NULL),
(6, 'Sleeve', 'Short Sleeve', 2, 1, NULL, NULL),
(7, 'Pattern', 'Checked', 1, 1, NULL, NULL),
(8, 'Pattern', 'Plain', 2, 1, NULL, NULL),
(9, 'Pattern', 'Printed', 3, 1, NULL, NULL),
(10, 'Pattern', 'Self', 4, 1, NULL, NULL),
(11, 'Pattern', 'Solid', 5, 1, NULL, NULL),
(12, 'Fit', 'Regular', 1, 1, NULL, NULL),
(13, 'Fit', 'Slim', 2, 1, NULL, NULL),
(14, 'Occasion', 'Casual', 1, 1, NULL, NULL),
(15, 'Occasion', 'Formal', 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `products_images`
--

DROP TABLE IF EXISTS `products_images`;
CREATE TABLE IF NOT EXISTS `products_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_sort` int NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`, `image_sort`, `status`, `created_at`, `updated_at`) VALUES
(19, 4, 'product-9368305.jpg', 0, 1, '2024-08-01 18:11:29', '2024-08-05 19:32:47'),
(5, 24, 'product-3339783.jpg', 2, 1, '2024-06-03 22:51:28', '2024-08-05 12:41:05'),
(4, 24, 'product-8665634.jpg', 1, 1, '2024-06-03 22:50:25', '2024-08-05 12:41:05'),
(23, 1, 'product-6551297.jpg', 0, 1, '2024-08-01 20:11:39', '2024-11-08 10:02:33'),
(21, 4, 'product-4012213.jpg', 0, 1, '2024-08-01 18:15:30', '2024-08-05 19:32:47'),
(20, 4, 'product-6487922.jpg', 0, 1, '2024-08-01 18:13:02', '2024-08-05 19:32:47'),
(13, 3, 'product-1182443.png', 0, 1, '2024-06-03 23:40:07', '2024-06-03 23:40:07'),
(14, 24, 'product-9059705.jpg', 0, 1, '2024-06-04 06:25:27', '2024-08-05 12:41:05'),
(22, 1, 'product-4653634.jpg', 0, 1, '2024-08-01 20:11:38', '2024-11-08 10:02:33'),
(16, 27, 'product-2974103.jpg', 0, 1, '2024-07-18 20:57:34', '2024-07-19 18:40:07'),
(17, 28, 'product-7919191.jpg', 0, 1, '2024-07-18 21:04:33', '2024-10-13 21:02:22'),
(18, 29, 'product-6874165.jpg', 0, 1, '2024-07-18 21:06:40', '2024-08-02 09:52:50'),
(24, 1, 'product-7297072.jpg', 0, 1, '2024-08-01 20:11:39', '2024-11-08 10:02:33'),
(25, 24, 'product-1599333.jpg', 0, 1, '2024-08-02 09:44:25', '2024-08-05 12:41:05'),
(26, 24, 'product-6620075.jpg', 0, 1, '2024-08-02 09:44:25', '2024-08-05 12:41:05'),
(28, 29, 'product-2276636.jpg', 0, 1, '2024-08-02 09:52:49', '2024-08-02 09:52:49'),
(29, 29, 'product-2022697.jpg', 0, 1, '2024-08-02 09:52:50', '2024-08-02 09:52:50'),
(30, 29, 'product-1035973.jpg', 0, 1, '2024-08-02 09:52:50', '2024-08-02 09:52:50'),
(31, 19, 'product-3755962.jpg', 0, 1, '2024-08-04 21:52:55', '2024-08-04 21:54:00'),
(32, 25, 'product-8915054.jpg', 0, 1, '2024-08-05 12:45:58', '2024-08-10 11:08:35'),
(33, 25, 'product-1765884.jpg', 0, 1, '2024-08-05 12:45:59', '2024-08-10 11:08:35'),
(34, 25, 'product-7174733.jpg', 0, 1, '2024-08-05 12:45:59', '2024-08-10 11:08:35'),
(35, 25, 'product-7863001.jpg', 0, 1, '2024-08-05 12:46:00', '2024-08-10 11:08:35'),
(36, 26, 'product-4332610.jpg', 0, 1, '2024-08-05 12:49:08', '2024-08-05 12:53:40'),
(37, 26, 'product-7010581.jpg', 0, 1, '2024-08-05 12:49:09', '2024-08-05 12:53:40'),
(38, 26, 'product-1465690.jpg', 0, 1, '2024-08-05 12:49:10', '2024-08-05 12:53:40'),
(39, 26, 'product-4179331.png', 0, 1, '2024-08-05 12:49:10', '2024-08-05 12:53:40'),
(40, 26, 'product-3316834.png', 0, 1, '2024-08-05 12:49:11', '2024-08-05 12:53:40'),
(41, 15, 'product-7904839.jpg', 0, 1, '2024-08-05 19:31:11', '2024-08-05 19:31:11'),
(42, 22, 'product-2332529.jpg', 0, 1, '2024-08-05 19:37:19', '2024-08-13 12:35:08'),
(43, 30, 'product-3877338.png', 0, 1, '2024-11-14 15:58:00', '2024-11-14 15:58:00'),
(44, 31, 'product-8596730.png', 0, 1, '2024-11-14 16:02:05', '2024-11-14 16:02:05'),
(45, 32, 'product-2103848.png', 0, 1, '2024-11-14 16:09:30', '2024-11-14 16:09:30');

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `product_id`, `review`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Its Very Really Good', 4, 1, NULL, '2024-10-21 19:43:11'),
(4, 1, 22, 'gog', 4, 1, '2024-10-22 20:43:35', '2024-10-23 19:26:36'),
(5, 1, 4, 'dfsghkjkhjhjhfgh', 5, 1, '2024-10-22 21:33:40', '2024-10-23 19:26:41'),
(6, 1, 15, 'arysthdfghfg', 5, 1, NULL, NULL),
(7, 1, 28, 'jfhgjgkhllò', 5, 1, '2024-10-24 12:14:11', '2024-10-24 12:14:47'),
(8, 1, 24, 'better', 4, 1, '2024-10-24 12:38:04', '2024-10-24 12:38:41');

-- --------------------------------------------------------

--
-- Structure de la table `recently_viewed_items`
--

DROP TABLE IF EXISTS `recently_viewed_items`;
CREATE TABLE IF NOT EXISTS `recently_viewed_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `recently_viewed_items`
--

INSERT INTO `recently_viewed_items` (`id`, `product_id`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 28, '13a5b63436af5102d9013aa23ec0800c', NULL, NULL),
(2, 1, '13a5b63436af5102d9013aa23ec0800c', NULL, NULL),
(3, 27, '13a5b63436af5102d9013aa23ec0800c', NULL, NULL),
(4, 22, '13a5b63436af5102d9013aa23ec0800c', NULL, NULL),
(5, 19, '13a5b63436af5102d9013aa23ec0800c', NULL, NULL),
(6, 19, '5f2ddce487981a669f51e2e54f7d17d9', NULL, NULL),
(7, 4, '5f2ddce487981a669f51e2e54f7d17d9', NULL, NULL),
(8, 11, '5f2ddce487981a669f51e2e54f7d17d9', NULL, NULL),
(9, 29, '5f2ddce487981a669f51e2e54f7d17d9', NULL, NULL),
(10, 7, '5f2ddce487981a669f51e2e54f7d17d9', NULL, NULL),
(11, 29, '7533e467dbdf12158b6a8966726887cc', NULL, NULL),
(12, 29, '8650623f991be67eb309f6fab2c449fd', NULL, NULL),
(13, 29, '60c6c05a4a8a17f5f768de378db0203f', NULL, NULL),
(14, 29, 'f349a63d4abf6491656162d3546f81e6', NULL, NULL),
(15, 19, 'f349a63d4abf6491656162d3546f81e6', NULL, NULL),
(16, 1, 'f349a63d4abf6491656162d3546f81e6', NULL, NULL),
(17, 25, '3aabd838da4910c13f46045376d13519', NULL, NULL),
(18, 4, '3aabd838da4910c13f46045376d13519', NULL, NULL),
(19, 1, '3aabd838da4910c13f46045376d13519', NULL, NULL),
(20, 1, '3db58a0e29d1d0e94df7789e9bbb11b9', NULL, NULL),
(21, 4, '3db58a0e29d1d0e94df7789e9bbb11b9', NULL, NULL),
(22, 1, '42b01b1f21c88b07110c282bec9036d0', NULL, NULL),
(23, 1, '55e3a162ef4ec6c315e3033e1f160c56', NULL, NULL),
(24, 19, '55e3a162ef4ec6c315e3033e1f160c56', NULL, NULL),
(25, 21, '55e3a162ef4ec6c315e3033e1f160c56', NULL, NULL),
(26, 15, '55e3a162ef4ec6c315e3033e1f160c56', NULL, NULL),
(27, 27, '55e3a162ef4ec6c315e3033e1f160c56', NULL, NULL),
(28, 29, '74b44004d813c596ace0f63ace8cad98', NULL, NULL),
(29, 26, '74b44004d813c596ace0f63ace8cad98', NULL, NULL),
(30, 4, '74b44004d813c596ace0f63ace8cad98', NULL, NULL),
(31, 24, '74b44004d813c596ace0f63ace8cad98', NULL, NULL),
(32, 1, '74b44004d813c596ace0f63ace8cad98', NULL, NULL),
(33, 15, '74b44004d813c596ace0f63ace8cad98', NULL, NULL),
(34, 10, '74b44004d813c596ace0f63ace8cad98', NULL, NULL),
(35, 22, '74b44004d813c596ace0f63ace8cad98', NULL, NULL),
(36, 4, 'd50d55742196553eea71ae754d1f6e37', NULL, NULL),
(37, 29, 'd50d55742196553eea71ae754d1f6e37', NULL, NULL),
(38, 21, 'd50d55742196553eea71ae754d1f6e37', NULL, NULL),
(39, 26, 'd50d55742196553eea71ae754d1f6e37', NULL, NULL),
(40, 24, 'd50d55742196553eea71ae754d1f6e37', NULL, NULL),
(41, 24, '3da8fa62ed8eae9e2a06b6083a1f50af', NULL, NULL),
(42, 26, '3da8fa62ed8eae9e2a06b6083a1f50af', NULL, NULL),
(43, 26, '6c02923a28ec7046156c225f8025ee61', NULL, NULL),
(44, 26, 'adf366a9762f342aafc13aedf393e78b', NULL, NULL),
(45, 26, 'f02184e5510dbe9b0c46655d37699d13', NULL, NULL),
(46, 26, '69f0e0ec19d8bfabbe77473c68ec7759', NULL, NULL),
(47, 26, '507e1d13deedc249d11c5480fdd383b9', NULL, NULL),
(48, 26, 'be6a4beddf288a56d55d6f7c55f64d25', NULL, NULL),
(49, 4, '0bee3ab7b4315d72e7fec904ddebec79', NULL, NULL),
(50, 22, '0bee3ab7b4315d72e7fec904ddebec79', NULL, NULL),
(51, 1, '0bee3ab7b4315d72e7fec904ddebec79', NULL, NULL),
(52, 8, '0bee3ab7b4315d72e7fec904ddebec79', NULL, NULL),
(53, 24, '0bee3ab7b4315d72e7fec904ddebec79', NULL, NULL),
(54, 16, '2126cd5938b059fc0b6e55ea459a360b', NULL, NULL),
(55, 4, '2126cd5938b059fc0b6e55ea459a360b', NULL, NULL),
(56, 19, '2126cd5938b059fc0b6e55ea459a360b', NULL, NULL),
(57, 4, '5c116277e394f4ab3caea94b7be5c2b9', NULL, NULL),
(58, 5, '5c116277e394f4ab3caea94b7be5c2b9', NULL, NULL),
(59, 9, '5c116277e394f4ab3caea94b7be5c2b9', NULL, NULL),
(60, 21, '5c116277e394f4ab3caea94b7be5c2b9', NULL, NULL),
(61, 28, '5c116277e394f4ab3caea94b7be5c2b9', NULL, NULL),
(62, 22, '5c116277e394f4ab3caea94b7be5c2b9', NULL, NULL),
(63, 1, '5c116277e394f4ab3caea94b7be5c2b9', NULL, NULL),
(64, 29, '5c116277e394f4ab3caea94b7be5c2b9', NULL, NULL),
(65, 29, '7445bb95e57426db6eac9684fdfa1a16', NULL, NULL),
(66, 4, '912ac0dedd003816918d49fd7c9e8ea0', NULL, NULL),
(67, 3, '912ac0dedd003816918d49fd7c9e8ea0', NULL, NULL),
(68, 28, '912ac0dedd003816918d49fd7c9e8ea0', NULL, NULL),
(69, 4, '3c7706a35aa91ee253a1e73ce0e52773', NULL, NULL),
(70, 1, '3c7706a35aa91ee253a1e73ce0e52773', NULL, NULL),
(71, 28, '1b7fa6b4c95c1d1eea42b5df0d1291f4', NULL, NULL),
(72, 28, '99439c00d47d380efc1f628452ffad91', NULL, NULL),
(73, 4, '99439c00d47d380efc1f628452ffad91', NULL, NULL),
(74, 1, '99439c00d47d380efc1f628452ffad91', NULL, NULL),
(75, 4, 'e2500ece61333f3ec08487a0b61f611d', NULL, NULL),
(76, 10, 'e2500ece61333f3ec08487a0b61f611d', NULL, NULL),
(77, 18, 'e2500ece61333f3ec08487a0b61f611d', NULL, NULL),
(78, 5, 'e2500ece61333f3ec08487a0b61f611d', NULL, NULL),
(79, 3, 'e2500ece61333f3ec08487a0b61f611d', NULL, NULL),
(80, 28, 'e2500ece61333f3ec08487a0b61f611d', NULL, NULL),
(81, 1, 'e2500ece61333f3ec08487a0b61f611d', NULL, NULL),
(82, 4, 'b229c7967f82a254c284716961810044', NULL, NULL),
(83, 1, 'b229c7967f82a254c284716961810044', NULL, NULL),
(84, 16, 'b229c7967f82a254c284716961810044', NULL, NULL),
(85, 24, 'b229c7967f82a254c284716961810044', NULL, NULL),
(86, 1, '77f59ae388b8c765d07df3c8815bf189', NULL, NULL),
(87, 1, 'bfede290bc709082a9db289b713f1df3', NULL, NULL),
(88, 1, '4e81868d29484aca86b5fcd2939b0414', NULL, NULL),
(89, 4, '4e81868d29484aca86b5fcd2939b0414', NULL, NULL),
(90, 28, '4e81868d29484aca86b5fcd2939b0414', NULL, NULL),
(91, 6, '54f48c3d189a0d5e4acfb92300f98b5e', NULL, NULL),
(92, 4, 'f7e120c437bbc0da7ca4b71e32f0b363', NULL, NULL),
(93, 1, 'f7e120c437bbc0da7ca4b71e32f0b363', NULL, NULL),
(94, 1, '07d5cc76d29408e670619c66e108ff70', NULL, NULL),
(95, 1, '089377c61f248bc118d2773df6645b37', NULL, NULL),
(96, 1, 'af435278d3e7868f86803065439db8b7', NULL, NULL),
(97, 1, '4fe20644284a73e948a1299999e42d28', NULL, NULL),
(98, 1, 'bafb9e2bc83ff8ef5180c5ff9bef6f10', NULL, NULL),
(99, 1, '8038b1392da5eaba50f4dbf8b042e339', NULL, NULL),
(100, 1, '9f6a03a729af8338421d3124ee2ca4ea', NULL, NULL),
(101, 4, '9f6a03a729af8338421d3124ee2ca4ea', NULL, NULL),
(102, 22, '9f6a03a729af8338421d3124ee2ca4ea', NULL, NULL),
(103, 4, 'e4ec1cfcd560747771e927a1b48f10a4', NULL, NULL),
(104, 4, 'b18a6e272236b8999c5e85c29879e184', NULL, NULL),
(105, 4, '6cd6de3abc0473934cbbe15de8b3276e', NULL, NULL),
(106, 28, '6cd6de3abc0473934cbbe15de8b3276e', NULL, NULL),
(107, 19, '6cd6de3abc0473934cbbe15de8b3276e', NULL, NULL),
(108, 23, '6cd6de3abc0473934cbbe15de8b3276e', NULL, NULL),
(109, 15, '6cd6de3abc0473934cbbe15de8b3276e', NULL, NULL),
(110, 1, '6cd6de3abc0473934cbbe15de8b3276e', NULL, NULL),
(111, 22, '6cd6de3abc0473934cbbe15de8b3276e', NULL, NULL),
(112, 24, '6cd6de3abc0473934cbbe15de8b3276e', NULL, NULL),
(113, 25, '6cd6de3abc0473934cbbe15de8b3276e', NULL, NULL),
(114, 16, '6cd6de3abc0473934cbbe15de8b3276e', NULL, NULL),
(115, 18, '6cd6de3abc0473934cbbe15de8b3276e', NULL, NULL),
(116, 17, '6cd6de3abc0473934cbbe15de8b3276e', NULL, NULL),
(117, 11, '6cd6de3abc0473934cbbe15de8b3276e', NULL, NULL),
(118, 29, '6cd6de3abc0473934cbbe15de8b3276e', NULL, NULL),
(119, 27, '6cd6de3abc0473934cbbe15de8b3276e', NULL, NULL),
(120, 24, 'af89df6d2dfa57430e5bea09d72c3af0', NULL, NULL),
(121, 4, 'd50a86e079a32fd28bce3203086382f8', NULL, NULL),
(122, 1, 'd50a86e079a32fd28bce3203086382f8', NULL, NULL),
(123, 4, 'dc78c1f00c7000ab583cb0607e9b47d8', NULL, NULL),
(124, 1, 'dc78c1f00c7000ab583cb0607e9b47d8', NULL, NULL),
(125, 1, '530a07ea1d51d143508f79e70ef69ba7', NULL, NULL),
(126, 4, '444f7f9bd21a01df2ffde201487353f0', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('IBfOAvHBDwovlRjsZ5kRDwIlXaC6ZuxRlq6ibOIS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZkVsOU9iZ042U0Z1SldlRGZ3cWtJeUF0akE1T3kzWXVsU0NVWHR4RyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1731605113);

-- --------------------------------------------------------

--
-- Structure de la table `shipping_charges`
--

DROP TABLE IF EXISTS `shipping_charges`;
CREATE TABLE IF NOT EXISTS `shipping_charges` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `0_500g` double NOT NULL,
  `501_1000g` double NOT NULL,
  `1001_1500g` double NOT NULL,
  `1501_2000g` double NOT NULL,
  `2001_2500g` double NOT NULL,
  `2501_3000g` double NOT NULL,
  `3001_3500g` double NOT NULL,
  `3501_4000g` double NOT NULL,
  `4001_4500g` double NOT NULL,
  `4501_5000g` double NOT NULL,
  `Above_5000g` double NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=247 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `country`, `0_500g`, `501_1000g`, `1001_1500g`, `1501_2000g`, `2001_2500g`, `2501_3000g`, `3001_3500g`, `3501_4000g`, `4001_4500g`, `4501_5000g`, `Above_5000g`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 100, 200, 25, 24, 24, 87, 54, 85, 52, 100, 464, 1, '2024-10-10 22:00:00', '2024-11-07 14:59:09'),
(2, 'Albania', 100, 200, 25, 24, 24, 87, 54, 85, 52, 0, 464, 1, '2024-10-10 22:00:00', '2024-10-19 08:41:26'),
(3, 'Algeria', 100, 200, 25, 24, 24, 87, 54, 85, 52, 56, 464, 1, '2024-10-10 22:00:00', '2024-11-08 10:52:37'),
(4, 'American Samoa', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-12 09:52:56'),
(5, 'Andorra', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-12 09:52:58'),
(6, 'Angola', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(7, 'Anguilla', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(8, 'Antarctica', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(9, 'Antigua and Barbuda', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(10, 'Argentina', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(11, 'Armenia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(12, 'Aruba', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(13, 'Australia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(14, 'Austria', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(15, 'Azerbaijan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(16, 'Bahamas', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(17, 'Bahrain', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(18, 'Bangladesh', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(19, 'Barbados', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(20, 'Belarus', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(21, 'Belgium', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(22, 'Belize', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(23, 'Benin', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(24, 'Bermuda', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(25, 'Bhutan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(26, 'Bolivia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(27, 'Bosnia and Herzegovina', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(28, 'Botswana', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(29, 'Bouvet Island', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(30, 'Brazil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(31, 'British Indian Ocean Territory', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(32, 'Brunei Darussalam', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(33, 'Bulgaria', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(34, 'Burkina Faso', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(35, 'Burundi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(36, 'Cambodia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(37, 'Cameroon', 100, 200, 25, 24, 24, 87, 54, 85, 52, 56, 464, 1, '2024-10-10 22:00:00', '2024-11-07 17:30:06'),
(38, 'Canada', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(39, 'Cape Verde', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(40, 'Cayman Islands', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(41, 'Central African Republic', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(42, 'Chad', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(43, 'Chile', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(44, 'China', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(45, 'Christmas Island', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(46, 'Cocos (Keeling) Islands', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(47, 'Colombia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(48, 'Comoros', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(49, 'Democratic Republic of the Congo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(50, 'Republic of Congo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(51, 'Cook Islands', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(52, 'Costa Rica', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(53, 'Croatia (Hrvatska)', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(54, 'Cuba', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(55, 'Cyprus', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(56, 'Czech Republic', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(57, 'Denmark', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(58, 'Djibouti', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(59, 'Dominica', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(60, 'Dominican Republic', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(61, 'East Timor', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(62, 'Ecuador', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(63, 'Egypt', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(64, 'El Salvador', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(65, 'Equatorial Guinea', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(66, 'Eritrea', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(67, 'Estonia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(68, 'Ethiopia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(69, 'Falkland Islands (Malvinas)', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(70, 'Faroe Islands', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(71, 'Fiji', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(72, 'Finland', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(73, 'France', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(74, 'France, Metropolitan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(75, 'French Guiana', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(76, 'French Polynesia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(77, 'French Southern Territories', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(78, 'Gabon', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(79, 'Gambia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(80, 'Georgia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(81, 'Germany', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(82, 'Ghana', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(83, 'Gibraltar', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(84, 'Guernsey', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(85, 'Greece', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(86, 'Greenland', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(87, 'Grenada', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(88, 'Guadeloupe', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(89, 'Guam', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(90, 'Guatemala', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(91, 'Guinea', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(92, 'Guinea-Bissau', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(93, 'Guyana', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(94, 'Haiti', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(95, 'Heard and Mc Donald Islands', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(96, 'Honduras', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(97, 'Hong Kong', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(98, 'Hungary', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(99, 'Iceland', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(100, 'India', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(101, 'Isle of Man', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(102, 'Indonesia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(103, 'Iran (Islamic Republic of)', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(104, 'Iraq', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(105, 'Ireland', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(106, 'Israel', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(107, 'Italy', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-18 10:09:39'),
(108, 'Ivory Coast', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(109, 'Jersey', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(110, 'Jamaica', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(111, 'Japan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(112, 'Jordan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(113, 'Kazakhstan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(114, 'Kenya', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(115, 'Kiribati', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(116, 'Korea, Democratic People\'s Republic of', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(117, 'Korea, Republic of', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(118, 'Kosovo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(119, 'Kuwait', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(120, 'Kyrgyzstan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(121, 'Lao People\'s Democratic Republic', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(122, 'Latvia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(123, 'Lebanon', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(124, 'Lesotho', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(125, 'Liberia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(126, 'Libyan Arab Jamahiriya', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(127, 'Liechtenstein', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(128, 'Lithuania', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(129, 'Luxembourg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(130, 'Macau', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(131, 'North Macedonia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(132, 'Madagascar', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(133, 'Malawi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(134, 'Malaysia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(135, 'Maldives', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(136, 'Mali', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(137, 'Malta', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(138, 'Marshall Islands', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(139, 'Martinique', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(140, 'Mauritania', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(141, 'Mauritius', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(142, 'Mayotte', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(143, 'Mexico', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(144, 'Micronesia, Federated States of', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(145, 'Moldova, Republic of', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(146, 'Monaco', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(147, 'Mongolia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(148, 'Montenegro', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(149, 'Montserrat', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(150, 'Morocco', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(151, 'Mozambique', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(152, 'Myanmar', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(153, 'Namibia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(154, 'Nauru', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(155, 'Nepal', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(156, 'Netherlands', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(157, 'Netherlands Antilles', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(158, 'New Caledonia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(159, 'New Zealand', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(160, 'Nicaragua', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(161, 'Niger', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(162, 'Nigeria', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(163, 'Niue', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(164, 'Norfolk Island', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(165, 'Northern Mariana Islands', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(166, 'Norway', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(167, 'Oman', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(168, 'Pakistan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(169, 'Palau', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(170, 'Palestine', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(171, 'Panama', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(172, 'Papua New Guinea', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(173, 'Paraguay', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(174, 'Peru', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(175, 'Philippines', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(176, 'Pitcairn', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(177, 'Poland', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(178, 'Portugal', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(179, 'Puerto Rico', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(180, 'Qatar', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(181, 'Reunion', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(182, 'Romania', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(183, 'Russian Federation', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(184, 'Rwanda', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(185, 'Saint Kitts and Nevis', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(186, 'Saint Lucia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(187, 'Saint Vincent and the Grenadines', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(188, 'Samoa', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(189, 'San Marino', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(190, 'Sao Tome and Principe', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(191, 'Saudi Arabia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(192, 'Senegal', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(193, 'Serbia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(194, 'Seychelles', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(195, 'Sierra Leone', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(196, 'Singapore', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(197, 'Slovakia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(198, 'Slovenia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(199, 'Solomon Islands', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(200, 'Somalia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(201, 'South Africa', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(202, 'South Georgia South Sandwich Islands', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(203, 'South Sudan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(204, 'Spain', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(205, 'Sri Lanka', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(206, 'St. Helena', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(207, 'St. Pierre and Miquelon', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(208, 'Sudan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(209, 'Suriname', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(210, 'Svalbard and Jan Mayen Islands', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(211, 'Eswatini', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(212, 'Sweden', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(213, 'Switzerland', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(214, 'Syrian Arab Republic', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(215, 'Taiwan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(216, 'Tajikistan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(217, 'Tanzania, United Republic of', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(218, 'Thailand', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(219, 'Togo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(220, 'Tokelau', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(221, 'Tonga', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(222, 'Trinidad and Tobago', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(223, 'Tunisia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(224, 'Turkey', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(225, 'Turkmenistan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(226, 'Turks and Caicos Islands', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(227, 'Tuvalu', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(228, 'Uganda', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(229, 'Ukraine', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(230, 'United Arab Emirates', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(231, 'United Kingdom', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(232, 'United States', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(233, 'United States minor outlying islands', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(234, 'Uruguay', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(235, 'Uzbekistan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(236, 'Vanuatu', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(237, 'Vatican City State', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(238, 'Venezuela', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(239, 'Vietnam', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(240, 'Virgin Islands (British)', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(241, 'Virgin Islands (U.S.)', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(242, 'Wallis and Futuna Islands', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(243, 'Western Sahara', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(244, 'Yemen', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(245, 'Zambia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00'),
(246, 'Zimbabwe', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-10-10 22:00:00', '2024-10-10 22:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'cheeeeeeeeeee', 'Cervino, 0', 'Alessandria', 'Seleziona', 'Cameroon', '0000', '3517414205', 'chephilippe65@gmail.com', NULL, '$2y$12$PDVrBvviCn2quzZNbUX4ZOJGmHO6fk7/2s4BdKUJMZKZvYglZMkgi', NULL, 1, '2024-08-25 20:51:22', '2024-09-21 21:18:02'),
(2, 'kiki', '', '', '', '', '', '3935174142', 'dekanaphilippe@yahoo.com', NULL, '$2y$12$s4mSRQBeUxnLhOdnVEZbReDKKUnFdRf8Etux3q./9cduj1yPviBd2', NULL, 1, '2024-08-25 22:03:06', '2024-09-14 12:35:34'),
(3, 'kaka', '', '', '', '', '', '3517414205', 'dekanaphilippe1@yahoo.com', NULL, '$2y$12$Vl0IVWo/hdMiUVcdtn1X3ey4cqxX6XgjLRiA.VnB2/LFTH1EjF4ES', NULL, 1, '2024-08-26 07:33:06', '2024-09-14 12:41:40'),
(4, 'koikou', '', '', '', '', '', '3517414205', 'chephilippe656@gmail.com', NULL, '$2y$12$1YTt1gRGu1HGceu/n6V90O.Zs//PfmyTZblO/zgvPqaTTx2AV2xNu', NULL, 1, '2024-08-26 09:16:54', '2024-09-14 12:35:40'),
(5, 'koikou', '', '', '', '', '', '3517414205', 'chephilippe6546@gmail.com', NULL, '$2y$12$YkfbKRnFCj2KkNYW0KwdXOk8RKwvibt9SgDEt3x//81qzVYnkmxdq', NULL, 0, '2024-08-26 09:17:29', '2024-08-26 09:17:29'),
(6, 'eden@admin.com', '', '', '', '', '', '3517414205', 'chephilippe5@gmail.com', NULL, '$2y$12$0CPKC8tr9Ke7OQxFu2hOre.tQgQMh7fRKpFI3bthDOhVh0SH6gj4K', NULL, 0, '2024-08-26 09:21:08', '2024-08-26 09:22:40'),
(7, 'philippe', '', '', '', '', '', '3517414205', 'chephilippe665@gmail.com', NULL, '$2y$12$C.XN7p/8HRdJIAraIIpiHufmfrE/bDQBGyrWdQnwvIE9tU0voT4.m', NULL, 0, '2024-08-31 10:33:08', '2024-08-31 10:33:08'),
(8, 'poupouf', '', '', '', '', '', '3517414205', 'poupouf@gmail.com', NULL, '$2y$12$Z.2jSTcqgacuWUUZoeyYhuapemBxxaZ.8Vh/9sh0v58TZpeIgCWme', NULL, 1, '2024-11-07 11:02:59', '2024-11-07 11:03:52'),
(9, 'Yan', '', '', '', '', '', '3517414205', 'yan@gmail.com', NULL, '$2y$12$Med.xHTBEFm.3prAfLE3d.irdV.GhaXg9eTP16Typ6nBZhBOhg1sS', NULL, 1, '2024-11-07 11:12:20', '2024-11-07 11:12:40'),
(10, 'mama', '', '', '', '', '', '3517414205', 'mama@gmail.com', NULL, '$2y$12$v07XNsg9/2GC56rtPyT1zeVxaoJsvaXjynm15Z4KS7Tb8VLTcLjwm', NULL, 0, '2024-11-07 11:17:50', '2024-11-07 11:17:50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
