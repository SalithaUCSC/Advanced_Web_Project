-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2018 at 01:20 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobileforu`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `phone_id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `phone_id`, `email`, `created_at`, `updated_at`) VALUES
(12, 2, 9, 'salithachathuranga94@gmail.com', '2018-03-27 04:13:37', '2018-03-27 04:13:37'),
(13, 3, 9, 'poolsaliya@gmai.com', '2018-03-27 04:40:29', '2018-03-27 04:40:29'),
(14, 3, 3, 'poolsaliya@gmai.com', '2018-03-27 04:57:11', '2018-03-27 04:57:11'),
(15, 3, 8, 'poolsaliya@gmai.com', '2018-03-27 04:57:59', '2018-03-27 04:57:59'),
(16, 3, 7, 'poolsaliya@gmai.com', '2018-03-27 06:47:48', '2018-03-27 06:47:48'),
(17, 3, 6, 'poolsaliya@gmai.com', '2018-03-27 06:54:59', '2018-03-27 06:54:59'),
(18, 3, 4, 'poolsaliya@gmai.com', '2018-03-27 06:56:41', '2018-03-27 06:56:41'),
(19, 3, 1, 'poolsaliya@gmai.com', '2018-03-27 06:57:12', '2018-03-27 06:57:12'),
(20, 2, 3, 'salithachathuranga94@gmail.com', '2018-03-27 12:05:31', '2018-03-27 12:05:31'),
(21, 2, 5, 'salithachathuranga94@gmail.com', '2018-03-27 12:05:51', '2018-03-27 12:05:51'),
(22, 2, 2, 'salithachathuranga94@gmail.com', '2018-03-27 12:06:16', '2018-03-27 12:06:16'),
(23, 3, 5, 'poolsaliya@gmail.com', '2018-03-27 23:06:49', '2018-03-27 23:06:49'),
(24, 4, 9, 'techpool94@gmail.com', '2018-03-28 09:44:02', '2018-03-28 09:44:02'),
(25, 4, 3, 'techpool94@gmail.com', '2018-03-28 09:44:50', '2018-03-28 09:44:50'),
(26, 4, 1, 'techpool94@gmail.com', '2018-03-28 09:59:06', '2018-03-28 09:59:06'),
(27, 2, 7, 'salithachathuranga94@gmail.com', '2018-03-29 04:44:54', '2018-03-29 04:44:54'),
(28, 2, 1, 'salithachathuranga94@gmail.com', '2018-03-29 11:06:28', '2018-03-29 11:06:28'),
(29, 2, 6, 'salithachathuranga94@gmail.com', '2018-03-30 09:52:59', '2018-03-30 09:52:59'),
(30, 2, 4, 'salithachathuranga94@gmail.com', '2018-03-31 14:49:34', '2018-03-31 14:49:34'),
(31, 5, 8, 'sudarshi@gmail.com', '2018-04-01 02:43:22', '2018-04-01 02:43:22'),
(32, 2, 8, 'salithachathuranga94@gmail.com', '2018-04-06 08:32:00', '2018-04-06 08:32:00'),
(33, 23, 9, '3dip123456@gmail.com', '2018-04-23 13:58:43', '2018-04-23 13:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2018_03_15_103617_create_tests_table', 4),
(22, '2014_10_12_000000_create_users_table', 5),
(23, '2014_10_12_100000_create_password_resets_table', 5),
(24, '2018_03_03_131325_create_posts_table', 5),
(25, '2018_03_06_030958_add_user_id_to_posts', 5),
(26, '2018_03_06_205449_add_cover_image_to_posts', 5),
(27, '2018_03_10_182701_create_phones_table', 5),
(28, '2018_03_11_185113_create_brands_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `total` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `address`, `number`, `total`, `quantity`, `created_at`, `updated_at`, `status`) VALUES
(1, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', '11/7/2L, 5th lane, Warallahena, Horana', 778787607, '330,000.00', 1, '2018-04-06 08:14:45', '2018-04-06 08:14:45', 0),
(2, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'horana', 777123456, '37,300.00', 1, '2018-04-06 10:36:50', '2018-04-06 10:36:50', 0),
(3, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'horana', 777123456, '37,300.00', 1, '2018-04-06 10:38:19', '2018-04-06 10:38:19', 0),
(4, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'horana', 777123456, '37,300.00', 1, '2018-04-06 10:38:39', '2018-04-06 10:38:39', 0),
(5, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'horana', 777123456, '37,300.00', 1, '2018-04-06 10:39:30', '2018-04-06 10:39:30', 0),
(6, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'horana', 777123456, '37,300.00', 1, '2018-04-06 10:40:37', '2018-04-06 10:40:37', 0),
(7, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'sfsdf', 3534, '37,300.00', 1, '2018-04-06 10:41:12', '2018-04-06 10:41:12', 0),
(8, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'sgsgdf', 4342, '37,300.00', 1, '2018-04-06 10:43:29', '2018-04-06 10:43:29', 0),
(9, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'qerqe', 132131, '330,000.00', 1, '2018-04-06 10:46:01', '2018-04-06 10:46:01', 0),
(10, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'dgd', 4546, '37,300.00', 1, '2018-04-06 10:47:26', '2018-04-06 10:47:26', 0),
(11, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'dgd', 4546, '37,300.00', 1, '2018-04-06 10:47:32', '2018-04-06 10:47:32', 0),
(12, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'fsdsff', 3353, '114,000.00', 1, '2018-04-06 10:50:05', '2018-04-06 10:50:05', 0),
(13, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'fsdsff', 3353, '114,000.00', 1, '2018-04-06 10:50:11', '2018-04-06 10:50:11', 0),
(14, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'fsdsff', 3353, '114,000.00', 1, '2018-04-06 10:50:56', '2018-04-06 10:50:56', 0),
(15, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'fhfh', 4564, '114,000.00', 1, '2018-04-06 10:51:15', '2018-04-06 10:51:15', 0),
(16, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', '424242gdfgd', 24242, '114,000.00', 1, '2018-04-06 10:51:54', '2018-04-06 10:51:54', 0),
(17, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'sdgfdsg', 35235, '114,000.00', 1, '2018-04-06 10:53:16', '2018-04-06 10:53:16', 0),
(18, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'sdgfdsg', 35235, '114,000.00', 1, '2018-04-06 10:53:22', '2018-04-06 10:53:22', 0),
(19, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'sdgfdsg', 35235, '114,000.00', 1, '2018-04-06 10:54:09', '2018-04-06 10:54:09', 0),
(20, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'aerewr', 35243, '37,300.00', 1, '2018-04-06 10:55:38', '2018-04-06 10:55:38', 0),
(21, '6', 'sudarshi94', 'rsmaheshika@gmail.com', 'raigama, horana', 777123456, '114,000.00', 1, '2018-04-06 10:58:22', '2018-04-06 10:58:22', 0),
(22, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'adad', 3424, '31,900.00', 1, '2018-04-06 11:09:35', '2018-04-06 11:09:35', 0),
(23, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'adad', 3424, '31,900.00', 1, '2018-04-06 11:10:01', '2018-04-06 11:10:01', 0),
(24, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'adsa', 535234, '32,300.00', 1, '2018-04-06 11:23:41', '2018-04-06 11:23:41', 0),
(25, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'adsa', 535234, '32,300.00', 1, '2018-04-06 11:24:05', '2018-04-06 11:24:05', 0),
(26, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'adsa', 535234, '32,300.00', 1, '2018-04-06 11:25:18', '2018-04-06 11:25:18', 0),
(27, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'adsa', 535234, '32,300.00', 1, '2018-04-06 11:26:00', '2018-04-06 11:26:00', 0),
(28, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'adsa', 535234, '32,300.00', 1, '2018-04-06 11:28:20', '2018-04-06 11:28:20', 0),
(29, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'zvzv', 2142, '22,300.00', 1, '2018-04-06 14:35:17', '2018-04-06 14:35:17', 0),
(30, '8', 'ishara', 'ish.nirmani@gmail.com', 'Anuradhapura', 777123456, '33,000.00', 1, '2018-04-07 04:21:24', '2018-04-07 04:21:24', 0),
(31, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'horana', 23543, '32,300.00', 1, '2018-04-08 02:37:58', '2018-04-08 02:37:58', 0),
(32, '20', 'Ranga Donz', 'rangadonz@gmail.com', 'horana', 777123456, '33,000.00', 1, '2018-04-08 12:00:52', '2018-04-08 12:00:52', 0),
(33, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'horana', 777667899, '64,600.00', 2, '2018-04-12 15:18:53', '2018-04-12 15:18:53', 0),
(34, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'horana', 777667899, '64,600.00', 2, '2018-04-12 15:19:53', '2018-04-12 15:19:53', 0),
(35, '2', 'Salitha Chathuranga', 'poolsaliya@gmail.com', 'fsdf', 5363463, '64,600.00', 2, '2018-04-12 15:21:14', '2018-04-12 15:21:14', 0),
(36, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'cZCzC', 52353, '32,300.00', 1, '2018-04-12 15:32:04', '2018-04-12 15:32:04', 0),
(37, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'dfsgsd', 2323424, '32,300.00', 1, '2018-04-12 15:32:55', '2018-04-12 15:32:55', 0),
(38, '2', 'Salitha Chathuranga', 'sa@fsd.com', 'xxxxxxxxxxxxxxxxxxxxxx', 777123456, '114,000.00', 1, '2018-04-18 15:19:46', '2018-04-18 15:19:46', 0),
(39, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'horana sfsdfssffssfsfsf', 777123456, '53,900.00', 1, '2018-04-18 15:21:43', '2018-04-18 15:21:43', 0),
(40, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'warallahena, horanagdsfgds', 778787607, '63,800.00', 2, '2018-04-23 14:14:16', '2018-04-23 14:14:16', 0),
(41, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'safsdafsfsdsgfderestsgsd', 777123456, '66,000.00', 2, '2018-04-27 09:33:31', '2018-04-27 09:33:31', 0),
(42, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'safsdafsfsdsgfderestsgsd', 777123456, '66,000.00', 2, '2018-04-27 09:34:06', '2018-04-27 09:34:06', 0),
(43, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'gfsdfgdsgdgdfgdg fhjfjgf gfjgf', 777123456, '33,000.00', 1, '2018-04-27 09:48:37', '2018-04-27 09:48:37', 0),
(44, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'SDGFDSF GSDG DSG DGD DS', 777123456, '32,300.00', 1, '2018-04-27 09:52:34', '2018-04-27 09:52:34', 0),
(45, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'sdgdg dfg dfh dfhfd fdh fh dhfdgh', 778787670, '66,000.00', 2, '2018-05-23 18:09:28', '2018-05-23 18:09:28', 0),
(46, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'asf sf s sf gdsfg sdh shsdf', 778787607, '74,600.00', 2, '2018-06-05 03:04:55', '2018-06-05 03:04:55', 0),
(47, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'asaf sfsfs fsaf saf sf sgfsd', 778787607, '37,300.00', 1, '2018-06-05 03:08:41', '2018-06-05 03:08:41', 0),
(48, '2', 'Salitha Chathuranga', 'salithachathuranga94@gmail.com', 'sfsdf sfsd fs sadadf', 778787607, '64,600.00', 2, '2018-07-02 15:05:56', '2018-07-02 15:05:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('poolsaliya@gmail.com', '$2y$10$CRwKtqjHOaJpoba5Ru3Nj.6pZXnZSIgvKxJEVhcXgwie4kurhSiJi', '2018-04-06 16:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `phone_id` int(5) NOT NULL,
  `name` varchar(40) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `dimension` varchar(50) NOT NULL,
  `sim` varchar(50) NOT NULL,
  `display_type` varchar(50) NOT NULL,
  `display_size` varchar(50) NOT NULL,
  `resolution` varchar(50) NOT NULL,
  `os` varchar(50) NOT NULL,
  `chipset` varchar(50) NOT NULL,
  `cpu` varchar(50) NOT NULL,
  `gpu` varchar(50) NOT NULL,
  `cardslot` varchar(50) NOT NULL,
  `internal` varchar(50) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `cam_primary` varchar(40) NOT NULL,
  `cam_secondary` varchar(40) NOT NULL,
  `battery` varchar(30) NOT NULL,
  `image1` varchar(300) NOT NULL,
  `image2` varchar(300) NOT NULL,
  `image3` varchar(300) NOT NULL,
  `image4` varchar(300) NOT NULL,
  `released_time` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`phone_id`, `name`, `brand_id`, `brand`, `dimension`, `sim`, `display_type`, `display_size`, `resolution`, `os`, `chipset`, `cpu`, `gpu`, `cardslot`, `internal`, `ram`, `cam_primary`, `cam_secondary`, `battery`, `image1`, `image2`, `image3`, `image4`, `released_time`, `price`) VALUES
(1, 'Huawei GR5 2017', 1, 'Huawei', '150.9 x 76.2 x 8.2 mm', 'Hybrid Dual SIM (Nano-SIM, dual stand-by)', 'LTPS IPS LCD 16M colors', '5.5 inches', '1080 x 1920 pixels', 'Android 6.0 (Marshmallow)', 'HiSilicon Kirin 655', 'Octa-core', 'Mali-T830MP2', 'microSD, up to 256 GB', '32 GB', '3 GB RAM', '12 MP + 2MP', '8 MP', '3340mAh', '1.png', '1_2.jpg', '1_3.jpg', '1_4.jpg', '2016, October', '27500'),
(2, 'Samsung Galaxy J7 Prime', 3, 'Samsung', '151.7 x 75 x 8 mm', 'Single SIM (Nano-SIM) or Dual SIM', 'PLS TFT 16M colors', '5.5 inches', '1080 x 1920 pixels', 'Android 6.0.1 (Marshmallow)', 'Exynos 7870 Octa', 'Octa-core 1.6 GHz ', 'Mali-T830 MP1', 'microSD, up to 256 GB', '32 GB', '3 GB RAM', '13 MP ', '8 MP', '3300mAh', '2.png', '2_2.jpg', '2_3.jpg', '2_4.jpg', '2016, August', '31000'),
(3, 'Apple iPhone 7', 2, 'Apple', '138.3 x 67.1 x 7.1 mm', 'Nano-SIM', 'LED-backlit IPS LCD 16M colors', '4.7 inches', '750 x 1334 pixels', 'iOS 10.0.1', 'Apple A10 Fusion', 'Quad-core 2.34 GHz', 'PowerVR Series7XT Plus', 'No', '32 GB', '2 GB RAM', '12 MP', '7 MP ', '1960mAh', '3.png', '3_2.jpg', '3_3.jpg', '3_4.jpg', '2016, September', '114000'),
(4, 'HTC Desire 628', 4, 'HTC', '146.9 x 70.9 x 8.1 mm', 'Dual SIM (Nano-SIM, dual stand-by)', 'IPS LCD 16M colors', '5.0 inches', '720 x 1280 pixels', 'Android 5.1 (Lollipop)', 'Mediatek MT6753', 'Octa-core 1.3 GHz Cortex-A53', 'Mali-T720MP3', 'microSD, up to 256 GB', '32 GB', '3 GB RAM', '13 MP', '5 MP', '2200mAh', '4.png', '4_2.jpg', '4_3.jpg', '4_4.jpg', '2016, May', '22300'),
(5, 'Huawei Nova 2i', 1, 'Huawei', '142.2 x 68.9 x 6.9 mm', 'Hybrid Dual SIM (Nano-SIM, dual stand-by)', 'LTPS IPS LCD 16M colors', '5.0 inches', '1080 x 1920 pixels', 'Android 7.0 (Nougat)', 'HiSilicon Kirin 659', 'Octa-core', 'Mali-T830 MP2', 'microSD, up to 256 GB', '64 GB', '4 GB RAM', '12 MP + 8 MP', '20 MP', '2950mAh', '5.png', '5_2.png', '5_3.jpg', '5_4.png', '2017, May', '37300'),
(6, 'Sony Xperia XZ', 5, 'SONY', '146 x 72 x 8.1 mm', 'Single SIM (Nano-SIM) or Hybrid Dual SIM', 'IPS LCD 16M colors', '5.2 inches', '1080 x 1920 pixels', 'Android 6.0.1 (Marshmallow)', 'Qualcomm MSM8996 Snapdragon 820', 'Quad-core', 'Adreno 530', 'microSD, up to 256 GB', '32 GB', '3 GB RAM', '23 MP', '13MP', '2900mAh', '6.png', '6_2.jpg', '6_3.png', '6_4.png', '2016, October', '53900'),
(7, 'Samsung Galaxy J7 Max', 3, 'Samsung', '148.9 x 71.9 x 7.9 mm', 'Dual SIM (Nano-SIM, dual stand-by)', 'PLS 16M colors', '5.7 inches', '1080 x 1920 pixels', 'Android 7.0 (Nougat)', 'Mediatek MT6757 Helio P20', 'Octa-core 2.4 GHz', 'Mali-T880MP2', 'microSD, up to 256 GB', '32GB', '4GB RAM', '13 MP', '13 MP', '3300mAh', '7.png', '7_2.jpg', '7_3.jpg', '7_4.png', '2017, June', '32300'),
(8, 'HTC ONE A9S ', 4, 'HTC', '146.5 x 71.5 x 8 mm', 'Nano-SIM', 'Super LCD 16M colors', '5.0 inches', '720 x 1280 pixels', 'Android 6.0 (Marshmallow)', 'Mediatek MT6755 Helio P10', 'Octa-core', 'Mali-T860MP2', 'microSD, up to 256 GB', '32GB', '3GB RAM', '13MP', '5 MP', '2300mAh', '8.png', '8_2.jpg', '8_3.jpg', '8_4.jpg', '2016, September', '31900'),
(9, 'Sony Xperia XA1', 5, 'SONY', '145 x 67 x 8 mm', 'Single SIM (Nano-SIM) or Dual SIM', 'IPS LCD 16M colors', '5.0 inches', '720 x 1280 pixels', 'Android 7.0 (Nougat)', 'Mediatek MT6757 Helio P20', 'Octa-core', 'Mali-T880MP2', 'microSD, up to 256 GB', '32 GB', '3 GB RAM', '23 MP', '8 MP', '2300mAh', '9.png', '9_2.jpg', '9_3.png', '9_4.png', '2017, April', '33000');

-- --------------------------------------------------------

--
-- Table structure for table `phone_brands`
--

CREATE TABLE `phone_brands` (
  `brand_id` int(5) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `brand_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone_brands`
--

INSERT INTO `phone_brands` (`brand_id`, `brand`, `brand_image`) VALUES
(1, 'Huawei', 'huawei.png'),
(2, 'Apple', 'apple.png'),
(3, 'Samsung', 'samsung.png'),
(4, 'HTC', 'htc.png'),
(5, 'SONY', 'sony.png');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`, `user_id`, `username`, `cover_image`) VALUES
(1, 'post 1', '<p>post one</p>', '2018-03-27 12:01:20', '2018-03-27 12:02:05', 2, 'salitha', 'angular_1522152125.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `phone_id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `phone_id`, `username`, `review`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 'salitha', 'test review 1', 0, '2018-03-08 04:51:17', '2018-03-26 01:55:16'),
(2, 1, 9, 'salitha', 'test review 2', 0, NULL, NULL),
(3, 1, 9, 'salitha', 'test review 3', 0, '2018-03-08 04:51:17', '2018-03-26 01:55:16'),
(4, 1, 9, 'salitha', 'test review 3', 0, '2018-03-08 04:51:17', '2018-03-26 01:55:16'),
(5, 1, 9, 'salitha', 'test review 3', 0, '2018-03-08 04:51:17', '2018-03-26 01:55:16'),
(6, 1, 9, 'salitha', '<p>xxx</p>', 0, '2018-03-26 02:18:24', '2018-03-26 02:18:24'),
(7, 1, 9, 'salitha', '<p>xxx</p>', 0, '2018-03-26 02:19:47', '2018-03-26 02:19:47'),
(8, 1, 9, 'salitha', '<p>aaaaaaaa</p>', 0, '2018-03-26 02:25:42', '2018-03-26 02:25:42'),
(9, 1, 9, 'salitha', '<p>aaaaaaaa</p>', 0, '2018-03-26 02:27:09', '2018-03-26 02:27:09'),
(10, 1, 9, 'salitha', '<p>aaaaaaaa</p>', 0, '2018-03-26 02:27:48', '2018-03-26 02:27:48'),
(11, 1, 9, 'salitha', '<p>bbbbbbbbbbbbbbbb</p>', 0, '2018-03-26 02:45:36', '2018-03-26 02:45:36'),
(12, 1, 9, 'salitha', '<p>bbbbbbbbbbbbbbbb</p>', 0, '2018-03-26 02:46:49', '2018-03-26 02:46:49'),
(13, 1, 9, 'salitha', '<p>bbbbbbbbbbbbbbbb</p>', 0, '2018-03-26 02:47:20', '2018-03-26 02:47:20'),
(14, 1, 9, 'salitha', '<p>hello</p>', 0, '2018-03-26 02:47:38', '2018-03-26 02:47:38'),
(16, 1, 9, 'salitha', '<p>fucker</p>', 0, '2018-03-26 02:53:09', '2018-03-26 02:53:09'),
(18, 3, 7, 'pool', '<p>nice phone</p>', 0, '2018-03-27 06:48:09', '2018-03-27 06:48:09'),
(20, 3, 8, 'pool', '<p><strong>nice</strong></p>', 0, '2018-03-27 12:46:42', '2018-03-27 12:46:42'),
(21, 3, 9, 'pool', '<p>how are you?</p>', 0, '2018-03-27 12:53:22', '2018-03-27 12:53:22'),
(22, 3, 9, 'pool', '<p>hello</p>', 0, '2018-03-27 14:31:11', '2018-03-27 14:31:11'),
(23, 3, 5, 'pool', '<p>superb one!</p>', 0, '2018-03-28 00:03:08', '2018-03-28 00:03:08'),
(24, 3, 5, 'pool', '<p>superb one!</p>', 0, '2018-03-28 00:03:26', '2018-03-28 00:03:26'),
(29, 4, 3, 'techpool', '<p>amazing product</p>', 0, '2018-03-28 09:45:37', '2018-03-28 09:45:37'),
(31, 2, 4, 'Salitha Chathuranga', '<p>This is a really good phone!</p>', 0, '2018-03-31 14:50:03', '2018-04-18 15:15:41'),
(32, 5, 8, 'sudarshi', '<p>good phone</p>', 0, '2018-04-01 02:44:06', '2018-04-01 02:44:06'),
(33, 2, 5, 'Salitha Chathuranga', '<p>hi guys!</p>', 0, '2018-04-05 05:49:59', '2018-04-05 05:49:59'),
(34, 2, 5, 'Salitha Chathuranga', '<p>sfd</p>', 0, '2018-04-05 06:25:26', '2018-04-05 06:25:26'),
(35, 2, 5, 'Salitha Chathuranga', '<p>ddd</p>', 0, '2018-04-05 06:25:55', '2018-04-05 06:25:55'),
(36, 2, 5, 'Salitha Chathuranga', '<p>gdfjf</p>', 0, '2018-04-05 06:26:32', '2018-04-05 06:26:32'),
(37, 2, 5, 'Salitha Chathuranga', '<p>asd</p>', 0, '2018-04-05 06:27:19', '2018-04-05 06:27:19'),
(38, 2, 5, 'Salitha Chathuranga', 'cccdadadadadas', 0, '2018-04-05 06:34:31', '2018-04-15 08:20:02'),
(58, 2, 2, 'Salitha Chathuranga', 'this is a good product', 0, '2018-04-15 07:56:44', '2018-05-01 11:54:58'),
(59, 2, 9, 'Salitha Chathuranga', 'new review edited', 0, '2018-04-20 10:40:06', '2018-04-20 10:40:21'),
(60, 23, 9, 'Dulitha Perera', 'maru 4n ekak', 0, '2018-04-23 14:10:55', '2018-04-23 14:11:24'),
(61, 2, 8, 'Salitha Chathuranga', 'sfgsdgdsfg', 0, '2018-04-27 09:36:37', '2018-04-27 09:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `review_replies`
--

CREATE TABLE `review_replies` (
  `reply_id` int(10) NOT NULL,
  `review_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `phone_id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `reply_review` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_replies`
--

INSERT INTO `review_replies` (`reply_id`, `review_id`, `user_id`, `phone_id`, `username`, `reply_review`, `created_at`, `updated_at`) VALUES
(1, 16, 3, 9, 'pool', 'xxx', '2018-03-27 13:35:49', '2018-03-27 13:35:49'),
(2, 21, 3, 9, 'pool', '<p>ccc</p>', '2018-03-27 13:39:19', '2018-03-27 13:39:19'),
(6, 16, 2, 9, 'salitha', 'xxx', '2018-03-28 05:03:16', '2018-03-28 05:03:16'),
(12, 16, 2, 9, 'salitha', 'hello', '2018-03-28 06:14:16', '2018-03-28 06:14:16'),
(14, 22, 2, 9, 'salitha', 'hi', '2018-03-28 06:19:45', '2018-03-28 06:19:45'),
(15, 24, 2, 5, 'salitha', 'I agreed!', '2018-03-28 09:01:03', '2018-03-28 09:01:03'),
(18, 18, 2, 7, 'salitha', 'why do you say so?', '2018-03-29 04:46:09', '2018-03-29 04:46:09'),
(19, 20, 2, 8, 'salitha', 'is this good?', '2018-03-29 10:36:27', '2018-03-29 10:36:27'),
(20, 20, 2, 8, 'salitha', 'yes indeed!', '2018-03-29 10:39:58', '2018-03-29 10:39:58'),
(21, 20, 2, 8, 'salitha', 'are you sure?', '2018-03-29 10:43:49', '2018-03-29 10:43:49'),
(25, 20, 2, 8, 'salitha', '<p><strong>hello guys! check this...&nbsp;<a href=\"https://www.facebook.com/\">POST</a></strong></p>', '2018-03-29 11:00:28', '2018-03-29 11:00:28'),
(26, 28, 2, 9, 'salitha chathuranga', '<p>why d oyou say so?</p>', '2018-03-31 06:33:03', '2018-03-31 06:33:03'),
(27, 32, 5, 8, 'sudarshi', '<p>why?</p>', '2018-04-01 02:44:33', '2018-04-01 02:44:33'),
(28, 24, 2, 5, 'Salitha Chathuranga', '<p>marvelous!</p>', '2018-04-03 04:25:04', '2018-04-03 04:25:04'),
(29, 24, 2, 5, 'Salitha Bro', '<p>hello</p>', '2018-04-05 05:48:22', '2018-04-05 05:48:22'),
(30, 45, 2, 1, 'pool', '<p>why do you say so?</p>', '2018-04-06 04:44:56', '2018-04-06 04:44:56'),
(31, 43, 2, 9, 'Salitha Chathuranga', 'reply', '2018-04-15 06:33:17', '2018-04-15 06:33:17'),
(32, 60, 2, 9, 'Salitha Chathuranga', 'ai uba ehema kyne?', '2018-04-23 14:12:31', '2018-04-23 14:12:31'),
(33, 61, 2, 8, 'Salitha Chathuranga', 'why', '2018-04-27 09:37:09', '2018-04-27 09:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `id` int(11) NOT NULL,
  `phone_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '$2y$10$t9MSUZIwqgLuT0g9EaelHO0TmkK04APWEW/NpYwkZAN3kgoN95MEW',
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `google_id`, `email`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Salitha Chathuranga', '', 'salithachathuranga94@gmail.com', '$2y$10$DjGIIxIA9fyKPwkY6hC6a.anhynafbGfjWXG77pN8S.arP4Nn32NC', '1523074473.jpg', 'aUh6B5Zl63keOmm8WDGUfv2lp4kOIihJcmjQqRTa6XxbKlt8uJ9zoBo6iBIf', '2018-03-27 04:12:09', '2018-07-02 15:50:31'),
(3, 'pool', '115175232819042542351', 'poolsaliya@gmail.com', '$2y$10$yVpzGYXPdvDFjbBuaucRHuHKrMWbw0Zo1jLTptkIGHjo54QML6QoS', '', 'jDyHW1G8ofR826ZrgbrUoI3jXVsQuOONzVzdspkGoh6wIYA7YxcrUwN8ATwG', '2018-03-27 04:40:20', '2018-04-06 15:31:44'),
(8, 'ishara', '', 'ish.nirmani@gmail.com', '$2y$10$lCVC0pWfkC9z8Pc74Ybp.eMwJE62B.U3Y/7/O/6c0E5a/ewbwd/E.', '1523076810.png', NULL, '2018-04-07 04:15:56', '2018-04-07 04:53:31'),
(21, 'Studentmate WebPortal', 'NULL', 'studentmate17@gmail.com', '$2y$10$t9MSUZIwqgLuT0g9EaelHO0TmkK04APWEW/NpYwkZAN3kgoN95MEW', 'user.png', 'A0Jr1hoppt6D9i4vcTC5VUnF6IjeE1mQm3NGwT8A05H9eA9LRhQtydLqrBQp', '2018-04-13 04:12:50', '2018-04-13 04:12:50'),
(22, 'Tech Pool', 'NULL', 'techpool94@gmail.com', '$2y$10$t9MSUZIwqgLuT0g9EaelHO0TmkK04APWEW/NpYwkZAN3kgoN95MEW', 'user.png', '2l6bWbU8WTNhKPizI8XcpcM5KqT8RIFLNnZvaf1HrmuBLhu490MzNAk6ZpYY', '2018-04-21 13:23:44', '2018-04-21 13:23:44'),
(24, 'sfsdsf', 'NULL', 'addad@gmail.com', '$2y$10$t8eXAHD2Fy9JPD93J.hKzO424vYbUgVPamvXg3f.K7JKOnPxcBxum', 'user.png', 'Fn6fR50Wh1ec97udupf6kRhp1jLZaeZTL5lRvExxqBTNcHcXZGHDW93NGue4', '2018-05-08 09:19:51', '2018-05-08 09:19:51'),
(25, 'xxxxxx', 'NULL', 'xxx@gmail.com', '$2y$10$i5xZSg6khDGK.QvwRRv5hexm5aQjHUY7L1xqpNpe2uC0VxVjjcGd6', 'user.png', 'dONPkq55SsqPupdf2t0eBA2ikJLj70VmXt45724t2cwK1jwcPnxy9vFQFYB2', '2018-05-27 15:04:47', '2018-05-27 15:06:46');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `phone_id`, `created_at`, `updated_at`) VALUES
(1, 1, 9, '2018-04-03 03:55:16', '2018-04-03 01:55:42'),
(2, 1, 4, '2018-04-03 03:55:21', '2018-04-03 01:59:23'),
(3, 1, 7, '2018-04-03 03:55:24', '2018-04-03 02:44:21'),
(10, 3, 7, '2018-04-04 03:29:45', '2018-04-04 03:29:45'),
(19, 3, 3, '2018-04-06 04:27:19', '2018-04-06 04:27:19'),
(22, 23, 9, '2018-04-23 13:58:19', '2018-04-23 13:58:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`phone_id`);

--
-- Indexes for table `phone_brands`
--
ALTER TABLE `phone_brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_replies`
--
ALTER TABLE `review_replies`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `phone_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `phone_brands`
--
ALTER TABLE `phone_brands`
  MODIFY `brand_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `review_replies`
--
ALTER TABLE `review_replies`
  MODIFY `reply_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
