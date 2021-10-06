-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2021 at 07:40 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_goat`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texts` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `texts`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh Livestock Research Institute', 'The institute was founded in 1984 in Savar Upazila, Dhaka division, Bangladesh. The executive head is the Director General and a 14-member Board of Management. The chairman is the Minister for Fisheries and Livestock.[1] In 2014 it developed a new species of Layer chicken whose sex was discernable at day one of their life.[3] It developed cattle feed from moringa tree and vegetable waste.[4]', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `animal_cats`
--

CREATE TABLE `animal_cats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=goat,',
  `parent_id` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animal_cats`
--

INSERT INTO `animal_cats` (`id`, `name`, `type`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Black Bengal Goat', '1', 0, '2021-04-12 08:05:26', '2021-04-12 08:05:26'),
(2, 'Black', '1', 1, '2021-04-12 08:05:39', '2021-04-12 08:05:39'),
(3, 'White Bengal (WB)', '1', 1, '2021-04-12 08:05:52', '2021-04-12 08:05:52'),
(4, 'Dutch Belt (DB)', '1', 1, '2021-04-12 08:06:03', '2021-04-12 08:06:03'),
(5, 'Toggenburg (TB', '1', 1, '2021-04-12 08:06:15', '2021-04-12 08:06:15'),
(6, 'Brown Bengal', '1', 1, '2021-04-12 08:06:24', '2021-04-12 08:06:24'),
(7, 'Jamunapari', '1', 0, '2021-04-12 08:06:35', '2021-04-12 08:06:35'),
(8, 'Boer', '1', 0, '2021-04-12 12:34:18', '2021-04-12 12:34:18'),
(9, 'Jamunapari cross Black Bengal', '1', 0, '2021-04-12 12:34:36', '2021-04-13 13:09:14'),
(10, 'Boer cross Jamunapari', '1', 0, '2021-04-13 13:09:53', '2021-04-13 13:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `animal_infos`
--

CREATE TABLE `animal_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `farm_id` bigint(20) UNSIGNED DEFAULT NULL,
  `community_cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `community_id` bigint(20) UNSIGNED DEFAULT NULL,
  `animal_cat_id` bigint(20) UNSIGNED NOT NULL,
  `animal_sub_cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `animal_tag` int(11) NOT NULL,
  `type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=Goat,2=Sheep',
  `m_type` tinyint(4) DEFAULT NULL COMMENT '1=Patha,2=Khashi',
  `sire` int(11) DEFAULT NULL,
  `dam` int(11) DEFAULT NULL,
  `breed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` enum('M','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_wt` double(4,2) NOT NULL,
  `litter_size` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `generation` int(11) NOT NULL,
  `paity` int(11) DEFAULT NULL,
  `dam_milk` int(11) DEFAULT NULL,
  `d_o_b` date NOT NULL,
  `season_o_birth` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `death_date` date DEFAULT NULL,
  `remark` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `castrated` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animal_infos`
--

INSERT INTO `animal_infos` (`id`, `user_id`, `farm_id`, `community_cat_id`, `community_id`, `animal_cat_id`, `animal_sub_cat_id`, `animal_tag`, `type`, `m_type`, `sire`, `dam`, `breed`, `color`, `sex`, `birth_wt`, `litter_size`, `generation`, `paity`, `dam_milk`, `d_o_b`, `season_o_birth`, `death_date`, `remark`, `castrated`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, 7, NULL, 4001, '1', 1, 104, 3579, 'BBG', NULL, 'F', 1.30, 'single', 2, NULL, NULL, '2015-06-20', 'Summer', NULL, NULL, NULL, NULL, NULL),
(2, 1, 1, NULL, NULL, 7, NULL, 4002, '1', 1, 104, 3579, 'BBG', NULL, 'F', 1.30, 'triplet', 1, NULL, NULL, '2017-06-21', 'Summer', NULL, NULL, NULL, NULL, NULL),
(3, 1, 1, NULL, NULL, 9, NULL, 4003, '1', 1, 104, 3275, 'BBG', NULL, 'M', 1.30, 'triplet', 4, NULL, NULL, '2017-06-27', 'Rainy', NULL, NULL, NULL, NULL, NULL),
(4, 1, 1, NULL, NULL, 10, NULL, 4004, '1', 1, 104, 3275, 'BBG', NULL, 'M', 1.20, 'triplet', 4, NULL, NULL, '2017-06-27', 'Summer', NULL, 'Dead', NULL, NULL, NULL),
(5, 1, 1, NULL, NULL, 7, NULL, 4005, '1', 1, 104, 3275, 'BBG', NULL, 'F', 0.80, 'triplet', 4, NULL, NULL, '2017-06-27', 'Summer', NULL, 'Dead', NULL, NULL, NULL),
(6, 1, 1, NULL, NULL, 7, NULL, 345, '1', NULL, NULL, NULL, '43', '34', 'F', 34.00, 'single', 0, 4, 4, '2021-09-09', 'Rainy', '2021-09-09', '43', '34', '2021-09-09 08:52:30', '2021-09-09 08:52:30'),
(7, 1, 1, NULL, NULL, 7, NULL, 435, '1', NULL, NULL, NULL, '34', '43', 'F', 43.00, 'twin', 1, 43, 43, '2021-09-09', 'Rainy', '2021-09-09', '43', '43', '2021-09-09 08:53:37', '2021-09-09 08:53:37'),
(8, 1, 1, NULL, NULL, 7, NULL, 34, '1', NULL, 34, 3579, NULL, '34', 'F', 4.00, 'single', 3, 3, 4, '2022-02-08', 'Winter', NULL, '4', '4', '2021-09-16 16:02:25', '2021-09-16 16:02:25'),
(9, 1, 1, NULL, NULL, 7, NULL, 345, '1', NULL, 345, 3579, NULL, '345', 'F', 43.00, 'twin', 3, 3, 345, '2022-02-08', 'Winter', NULL, '4', '4', '2021-09-16 16:02:50', '2021-09-16 16:02:50'),
(10, 1, 1, NULL, NULL, 1, NULL, 45, '1', NULL, 45, 3579, NULL, '45', 'F', 54.00, 'twin', 3, 2, 45, '2022-02-08', 'Winter', NULL, '54', '45', '2021-09-16 16:22:38', '2021-09-16 16:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `body_weights`
--

CREATE TABLE `body_weights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `animal_info_id` bigint(20) UNSIGNED NOT NULL,
  `month_1` double(8,2) DEFAULT NULL,
  `month_2` double(8,2) DEFAULT NULL,
  `month_3` double(8,2) DEFAULT NULL,
  `month_4` double(8,2) DEFAULT NULL,
  `month_5` double(8,2) DEFAULT NULL,
  `month_6` double(8,2) DEFAULT NULL,
  `month_7` double(8,2) DEFAULT NULL,
  `month_8` double(8,2) DEFAULT NULL,
  `month_9` double(8,2) DEFAULT NULL,
  `month_10` double(8,2) DEFAULT NULL,
  `month_11` double(8,2) DEFAULT NULL,
  `month_12` double(8,2) DEFAULT NULL,
  `g_rate_month_3` double(8,2) DEFAULT NULL,
  `g_rate_month_6` double(8,2) DEFAULT NULL,
  `g_rate_month_9` double(8,2) DEFAULT NULL,
  `g_rate_month_12` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `castration_records`
--

CREATE TABLE `castration_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `animal_info_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clinical_signs`
--

CREATE TABLE `clinical_signs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clinical_signs`
--

INSERT INTO `clinical_signs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Test', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `communities`
--

CREATE TABLE `communities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `community_cat_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` bigint(20) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `community_cats`
--

CREATE TABLE `community_cats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `upazila_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `community_cats`
--

INSERT INTO `community_cats` (`id`, `district_id`, `upazila_id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, 62, 465, 'Muktagacha', 'Muktagacha', '2021-09-17 16:40:08', '2021-09-17 16:40:08'),
(2, 62, 464, 'Valuka', 'Valuka', '2021-09-17 16:41:27', '2021-09-17 16:41:27'),
(3, 11, 99, 'Naikhongchari', 'Naikhongchari', '2021-09-17 16:42:10', '2021-09-17 16:42:10'),
(4, 20, 177, 'Jossor', 'Jossor', '2021-09-17 16:42:55', '2021-09-17 16:42:55'),
(5, 22, 187, 'Meherpur', 'Meherpur', '2021-09-17 16:43:20', '2021-09-17 16:43:20'),
(6, 25, 196, 'Kustia', 'Kustia', '2021-09-17 16:43:36', '2021-09-17 16:43:36'),
(7, 24, 192, 'Chuadanga', 'Chuadanga', '2021-09-17 16:45:26', '2021-09-17 16:45:26'),
(8, 15, 140, 'Godagari', 'Godagari', '2021-09-17 16:46:01', '2021-09-17 16:46:01');

-- --------------------------------------------------------

--
-- Table structure for table `dead_culleds`
--

CREATE TABLE `dead_culleds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `animal_info_id` bigint(20) UNSIGNED NOT NULL,
  `dead_culled` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_dead_culled` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dead_reports`
--

CREATE TABLE `dead_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dewormings`
--

CREATE TABLE `dewormings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `animal_info_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deworming_date` date NOT NULL,
  `dose` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dippings`
--

CREATE TABLE `dippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `animal_info_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipping_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pneumonia', '2021-09-17 15:41:54', NULL),
(2, 'Diarrhea', '2021-09-17 15:41:54', NULL),
(3, 'PPR', '2021-09-17 15:44:15', NULL),
(4, 'Bloat', '2021-09-17 15:44:29', NULL),
(5, 'Urolithiasis', '2021-09-17 15:44:39', NULL),
(6, 'Actinomycosis', '2021-09-17 15:46:04', NULL),
(7, 'Skin disease', '2021-09-17 15:46:04', NULL),
(8, 'Poisoning', '2021-09-17 15:46:30', NULL),
(9, 'Mechanical', '2021-09-17 15:46:43', NULL),
(10, 'Malnutrition', '2021-09-17 15:46:52', NULL),
(11, 'Ecthyma', '2021-09-17 15:49:29', NULL),
(12, 'Mastitis', '2021-09-17 15:49:29', NULL),
(13, 'Abortion', '2021-09-17 15:49:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `disease_healths`
--

CREATE TABLE `disease_healths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `animal_info_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=Goat,2=Sheep',
  `breed` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disease_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clinical_sign` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disease_season` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deworming_date` date NOT NULL,
  `dipping_date` date NOT NULL,
  `ppr_vac_date` date NOT NULL,
  `fmd_vac_date` date NOT NULL,
  `pox_vacn_date` date NOT NULL,
  `contagious_vac_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disease_treatments`
--

CREATE TABLE `disease_treatments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `animal_info_id` bigint(20) UNSIGNED NOT NULL,
  `animal_cat_id` bigint(20) UNSIGNED NOT NULL,
  `animal_sub_cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=Goat,2=Sheep',
  `disease_id` bigint(20) UNSIGNED NOT NULL,
  `clinical_sign_id` bigint(20) UNSIGNED NOT NULL,
  `disease_season` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disease_date` date NOT NULL,
  `medicine_prescribed` text COLLATE utf8mb4_unicode_ci,
  `recovered_dead` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `distributions`
--

CREATE TABLE `distributions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `animal_info_id` bigint(20) UNSIGNED NOT NULL,
  `dis_date` date DEFAULT NULL,
  `address_of_rec` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) NOT NULL,
  `division_id` int(1) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lon` varchar(15) DEFAULT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `url`) VALUES
(1, 1, 'Comilla', 'কুমিল্লা', '23.4682747', '91.1788135', 'www.comilla.gov.bd'),
(2, 1, 'Feni', 'ফেনী', '23.023231', '91.3840844', 'www.feni.gov.bd'),
(3, 1, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd'),
(4, 1, 'Rangamati', 'রাঙ্গামাটি', NULL, NULL, 'www.rangamati.gov.bd'),
(5, 1, 'Noakhali', 'নোয়াখালী', '22.869563', '91.099398', 'www.noakhali.gov.bd'),
(6, 1, 'Chandpur', 'চাঁদপুর', '23.2332585', '90.6712912', 'www.chandpur.gov.bd'),
(7, 1, 'Lakshmipur', 'লক্ষ্মীপুর', '22.942477', '90.841184', 'www.lakshmipur.gov.bd'),
(8, 1, 'Chattogram', 'চট্টগ্রাম', '22.335109', '91.834073', 'www.chittagong.gov.bd'),
(9, 1, 'Coxsbazar', 'কক্সবাজার', NULL, NULL, 'www.coxsbazar.gov.bd'),
(10, 1, 'Khagrachhari', 'খাগড়াছড়ি', '23.119285', '91.984663', 'www.khagrachhari.gov.bd'),
(11, 1, 'Bandarban', 'বান্দরবান', '22.1953275', '92.2183773', 'www.bandarban.gov.bd'),
(12, 2, 'Sirajganj', 'সিরাজগঞ্জ', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd'),
(13, 2, 'Pabna', 'পাবনা', '23.998524', '89.233645', 'www.pabna.gov.bd'),
(14, 2, 'Bogura', 'বগুড়া', '24.8465228', '89.377755', 'www.bogra.gov.bd'),
(15, 2, 'Rajshahi', 'রাজশাহী', NULL, NULL, 'www.rajshahi.gov.bd'),
(16, 2, 'Natore', 'নাটোর', '24.420556', '89.000282', 'www.natore.gov.bd'),
(17, 2, 'Joypurhat', 'জয়পুরহাট', NULL, NULL, 'www.joypurhat.gov.bd'),
(18, 2, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd'),
(19, 2, 'Naogaon', 'নওগাঁ', NULL, NULL, 'www.naogaon.gov.bd'),
(20, 3, 'Jashore', 'যশোর', '23.16643', '89.2081126', 'www.jessore.gov.bd'),
(21, 3, 'Satkhira', 'সাতক্ষীরা', NULL, NULL, 'www.satkhira.gov.bd'),
(22, 3, 'Meherpur', 'মেহেরপুর', '23.762213', '88.631821', 'www.meherpur.gov.bd'),
(23, 3, 'Narail', 'নড়াইল', '23.172534', '89.512672', 'www.narail.gov.bd'),
(24, 3, 'Chuadanga', 'চুয়াডাঙ্গা', '23.6401961', '88.841841', 'www.chuadanga.gov.bd'),
(25, 3, 'Kushtia', 'কুষ্টিয়া', '23.901258', '89.120482', 'www.kushtia.gov.bd'),
(26, 3, 'Magura', 'মাগুরা', '23.487337', '89.419956', 'www.magura.gov.bd'),
(27, 3, 'Khulna', 'খুলনা', '22.815774', '89.568679', 'www.khulna.gov.bd'),
(28, 3, 'Bagerhat', 'বাগেরহাট', '22.651568', '89.785938', 'www.bagerhat.gov.bd'),
(29, 3, 'Jhenaidah', 'ঝিনাইদহ', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd'),
(30, 4, 'Jhalakathi', 'ঝালকাঠি', NULL, NULL, 'www.jhalakathi.gov.bd'),
(31, 4, 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd'),
(32, 4, 'Pirojpur', 'পিরোজপুর', NULL, NULL, 'www.pirojpur.gov.bd'),
(33, 4, 'Barisal', 'বরিশাল', NULL, NULL, 'www.barisal.gov.bd'),
(34, 4, 'Bhola', 'ভোলা', '22.685923', '90.648179', 'www.bhola.gov.bd'),
(35, 4, 'Barguna', 'বরগুনা', NULL, NULL, 'www.barguna.gov.bd'),
(36, 5, 'Sylhet', 'সিলেট', '24.8897956', '91.8697894', 'www.sylhet.gov.bd'),
(37, 5, 'Moulvibazar', 'মৌলভীবাজার', '24.482934', '91.777417', 'www.moulvibazar.gov.bd'),
(38, 5, 'Habiganj', 'হবিগঞ্জ', '24.374945', '91.41553', 'www.habiganj.gov.bd'),
(39, 5, 'Sunamganj', 'সুনামগঞ্জ', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd'),
(40, 6, 'Narsingdi', 'নরসিংদী', '23.932233', '90.71541', 'www.narsingdi.gov.bd'),
(41, 6, 'Gazipur', 'গাজীপুর', '24.0022858', '90.4264283', 'www.gazipur.gov.bd'),
(42, 6, 'Shariatpur', 'শরীয়তপুর', NULL, NULL, 'www.shariatpur.gov.bd'),
(43, 6, 'Narayanganj', 'নারায়ণগঞ্জ', '23.63366', '90.496482', 'www.narayanganj.gov.bd'),
(44, 6, 'Tangail', 'টাঙ্গাইল', NULL, NULL, 'www.tangail.gov.bd'),
(45, 6, 'Kishoreganj', 'কিশোরগঞ্জ', '24.444937', '90.776575', 'www.kishoreganj.gov.bd'),
(46, 6, 'Manikganj', 'মানিকগঞ্জ', NULL, NULL, 'www.manikganj.gov.bd'),
(47, 6, 'Dhaka', 'ঢাকা', '23.7115253', '90.4111451', 'www.dhaka.gov.bd'),
(48, 6, 'Munshiganj', 'মুন্সিগঞ্জ', NULL, NULL, 'www.munshiganj.gov.bd'),
(49, 6, 'Rajbari', 'রাজবাড়ী', '23.7574305', '89.6444665', 'www.rajbari.gov.bd'),
(50, 6, 'Madaripur', 'মাদারীপুর', '23.164102', '90.1896805', 'www.madaripur.gov.bd'),
(51, 6, 'Gopalganj', 'গোপালগঞ্জ', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd'),
(52, 6, 'Faridpur', 'ফরিদপুর', '23.6070822', '89.8429406', 'www.faridpur.gov.bd'),
(53, 7, 'Panchagarh', 'পঞ্চগড়', '26.3411', '88.5541606', 'www.panchagarh.gov.bd'),
(54, 7, 'Dinajpur', 'দিনাজপুর', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd'),
(55, 7, 'Lalmonirhat', 'লালমনিরহাট', NULL, NULL, 'www.lalmonirhat.gov.bd'),
(56, 7, 'Nilphamari', 'নীলফামারী', '25.931794', '88.856006', 'www.nilphamari.gov.bd'),
(57, 7, 'Gaibandha', 'গাইবান্ধা', '25.328751', '89.528088', 'www.gaibandha.gov.bd'),
(58, 7, 'Thakurgaon', 'ঠাকুরগাঁও', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd'),
(59, 7, 'Rangpur', 'রংপুর', '25.7558096', '89.244462', 'www.rangpur.gov.bd'),
(60, 7, 'Kurigram', 'কুড়িগ্রাম', '25.805445', '89.636174', 'www.kurigram.gov.bd'),
(61, 8, 'Sherpur', 'শেরপুর', '25.0204933', '90.0152966', 'www.sherpur.gov.bd'),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', NULL, NULL, 'www.mymensingh.gov.bd'),
(63, 8, 'Jamalpur', 'জামালপুর', '24.937533', '89.937775', 'www.jamalpur.gov.bd'),
(64, 8, 'Netrokona', 'নেত্রকোণা', '24.870955', '90.727887', 'www.netrokona.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(1) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `url`) VALUES
(1, 'Chattagram', 'চট্টগ্রাম', 'www.chittagongdiv.gov.bd'),
(2, 'Rajshahi', 'রাজশাহী', 'www.rajshahidiv.gov.bd'),
(3, 'Khulna', 'খুলনা', 'www.khulnadiv.gov.bd'),
(4, 'Barisal', 'বরিশাল', 'www.barisaldiv.gov.bd'),
(5, 'Sylhet', 'সিলেট', 'www.sylhetdiv.gov.bd'),
(6, 'Dhaka', 'ঢাকা', 'www.dhakadiv.gov.bd'),
(7, 'Rangpur', 'রংপুর', 'www.rangpurdiv.gov.bd'),
(8, 'Mymensingh', 'ময়মনসিংহ', 'www.mymensinghdiv.gov.bd');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farms`
--

CREATE TABLE `farms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farms`
--

INSERT INTO `farms` (`id`, `name`, `contact_person`, `phone`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BLRI head office', 'Test', 433282508, 'Savar, Dhaka', '2021-02-23 02:17:37', '2021-09-16 17:46:40', NULL),
(2, 'Naikhongehari', 'Test', 43, 'Bandarban', '2021-09-16 17:49:30', '2021-09-16 17:49:30', NULL),
(3, 'Godagari', 'Test', 443, 'Rajshahi', '2021-09-16 17:49:59', '2021-09-16 17:49:59', NULL);

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
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_08_12_070034_create_visitor_infos_table', 1),
(9, '2020_11_07_052301_create_sessions_table', 1),
(10, '2020_12_18_175011_create_permission_tables', 1),
(28, '2021_02_15_144204_create_farms_table', 2),
(30, '2021_02_19_113153_create_communities_table', 2),
(31, '2021_02_20_221542_create_animal_cats_table', 2),
(50, '2021_02_18_113154_create_community_cats_table', 12),
(55, '2021_02_21_221055_create_animal_infos_table', 14),
(74, '2021_06_16_181919_create_clinical_signs_table', 28),
(81, '2021_02_10_232649_create_sliders_table', 31),
(82, '2021_02_13_084313_create_abouts_table', 32),
(111, '2021_02_28_003243_create_disease_healths_table', 33),
(113, '2021_03_26_203041_create_morphometrics_table', 33),
(114, '2021_03_27_142423_create_milk_productions_table', 33),
(115, '2021_04_03_144256_create_semen_analyses_table', 33),
(116, '2021_04_04_091202_create_distributions_table', 33),
(117, '2021_05_27_182209_create_vaccinations_table', 33),
(118, '2021_06_12_111746_create_body_weights_table', 33),
(119, '2021_06_12_202410_create_dead_reports_table', 33),
(120, '2021_06_12_214510_create_dewormings_table', 33),
(121, '2021_06_12_220024_create_dippings_table', 33),
(122, '2021_06_12_221027_create_parasites_table', 33),
(123, '2021_06_15_193028_create_diseases_table', 33),
(124, '2021_07_05_195759_create_services_table', 33),
(125, '2021_07_27_082936_create_disease_treatments_table', 33),
(126, '2021_08_05_074650_create_dead_culleds_table', 33),
(127, '2021_08_05_081854_create_castration_records_table', 33),
(128, '2021_02_28_095712_create_reproductions_table', 34);

-- --------------------------------------------------------

--
-- Table structure for table `milk_productions`
--

CREATE TABLE `milk_productions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `animal_info_id` bigint(20) UNSIGNED NOT NULL,
  `parity_number` double(8,2) NOT NULL,
  `litter_size` double(8,2) NOT NULL,
  `date_of_milking` date DEFAULT NULL,
  `milk_production` double(8,2) DEFAULT NULL,
  `average_milk_production` double(8,2) DEFAULT NULL,
  `lactation_length` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `milk_yield` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `morphometrics`
--

CREATE TABLE `morphometrics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `animal_info_id` bigint(20) UNSIGNED NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_lenght` double(8,2) NOT NULL,
  `weither_height` double(8,2) NOT NULL,
  `horn_pattern` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horn_length` double(8,2) DEFAULT NULL,
  `tail_length` double(8,2) NOT NULL,
  `ear_length` double(8,2) NOT NULL,
  `h_girth_length` double(8,2) NOT NULL,
  `height_of_rump` double(8,2) NOT NULL,
  `head_length` double(8,2) NOT NULL,
  `eye_to_eye_length` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parasites`
--

CREATE TABLE `parasites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `animal_info_id` bigint(20) UNSIGNED NOT NULL,
  `feces_collection_date` date NOT NULL,
  `fecal_egg_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `season` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parasite_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-02-15 01:58:27', NULL),
(2, 'farmer', 'web', '2021-02-15 01:58:27', NULL);

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reproductions`
--

CREATE TABLE `reproductions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `animal_info_id` bigint(20) UNSIGNED NOT NULL,
  `puberty_age` int(11) DEFAULT NULL,
  `service_1st_date` date DEFAULT NULL,
  `kidding_1st_date` date DEFAULT NULL,
  `ges_lenght_1st_kidding` double(8,2) DEFAULT NULL,
  `age_1st_kidding` double(8,2) DEFAULT NULL,
  `litter_size_1st_kidding` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `milk_production` double(8,2) DEFAULT NULL,
  `service_2nd_date` date DEFAULT NULL,
  `kidding_2nd_date` date DEFAULT NULL,
  `kidding_2nd_liter` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_3rd_date` date DEFAULT NULL,
  `kidding_3rd_date` date DEFAULT NULL,
  `kidding_3rd_liter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_4th_date` date DEFAULT NULL,
  `kidding_4th_date` date DEFAULT NULL,
  `kidding_4th_liter` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_5th_date` date DEFAULT NULL,
  `kidding_5th_date` date DEFAULT NULL,
  `kidding_5th_liter` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_6th_date` date DEFAULT NULL,
  `kidding_6th_date` date DEFAULT NULL,
  `kidding_6th_liter` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_7th_date` date DEFAULT NULL,
  `kidding_7th_date` date DEFAULT NULL,
  `kidding_7th_liter` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_8th_date` date DEFAULT NULL,
  `kidding_8th_date` date DEFAULT NULL,
  `kidding_8th_liter` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-02-15 01:57:34', NULL),
(2, 'farmer', 'web', '2021-02-18 03:43:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `semen_analyses`
--

CREATE TABLE `semen_analyses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `animal_info_id` bigint(20) UNSIGNED NOT NULL,
  `coll_date` date NOT NULL,
  `volume` double(8,2) NOT NULL,
  `s_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_straw` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `buck_tag` int(11) NOT NULL,
  `doe_tag` int(11) NOT NULL,
  `is_giving_birth` tinyint(1) NOT NULL DEFAULT '0',
  `date_of_service` date NOT NULL,
  `expected_d_o_b` date NOT NULL,
  `natural` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `repeat_heat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generation` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('jxOGbyPi5gr8Ha0PCpLUTTBaWwFlcNgMhKgAIreh', NULL, '54.36.148.176', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic1VMVHk3aFZXcGFjQUhoam5QMjFiVVkwZEJiS0hxNXZlb0wxWTlUbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vd3d3LmdzbXMtYmxyaS5vcmciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1633021565),
('tWinsHdXuKfWf5CijuljYgzXZmQcRfRRCWBEx3Ok', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUXI1SE8zV2FEZ3dvM0c2N2J3Rkt1VVltdk13MWgySTBnSmRCWWxVNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTY6Imh0dHA6Ly9ibHJpLnRlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1633148519),
('UjLtLR8HKXHobgEfH4XmZ2UWBautjdMr3hL4HeoP', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNEgwU0ZGdjhyQ0ttRGRtZzh2WkI3ZXhUUzUyZ012RHc5eERvNVlwNSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMyOiJodHRwOi8vYmxyaS50ZXN0L2FkbWluL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1633022021);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `sub_title`, `link`, `image`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 'slider_4858.jpg', '2021-07-11 04:08:33', '2021-07-11 04:08:33'),
(2, NULL, NULL, NULL, 'slider_7917.jpg', '2021-07-11 04:16:34', '2021-07-11 04:16:34'),
(3, NULL, NULL, NULL, 'slider_5450.jpg', '2021-09-16 18:16:53', '2021-09-16 18:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin\'s Team', 1, '2021-02-15 01:43:19', '2021-02-15 01:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` int(3) NOT NULL,
  `district_id` int(2) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `name`, `bn_name`, `url`) VALUES
(1, 1, 'Debidwar', 'দেবিদ্বার', 'debidwar.comilla.gov.bd'),
(2, 1, 'Barura', 'বরুড়া', 'barura.comilla.gov.bd'),
(3, 1, 'Brahmanpara', 'ব্রাহ্মণপাড়া', 'brahmanpara.comilla.gov.bd'),
(4, 1, 'Chandina', 'চান্দিনা', 'chandina.comilla.gov.bd'),
(5, 1, 'Chauddagram', 'চৌদ্দগ্রাম', 'chauddagram.comilla.gov.bd'),
(6, 1, 'Daudkandi', 'দাউদকান্দি', 'daudkandi.comilla.gov.bd'),
(7, 1, 'Homna', 'হোমনা', 'homna.comilla.gov.bd'),
(8, 1, 'Laksam', 'লাকসাম', 'laksam.comilla.gov.bd'),
(9, 1, 'Muradnagar', 'মুরাদনগর', 'muradnagar.comilla.gov.bd'),
(10, 1, 'Nangalkot', 'নাঙ্গলকোট', 'nangalkot.comilla.gov.bd'),
(11, 1, 'Comilla Sadar', 'কুমিল্লা সদর', 'comillasadar.comilla.gov.bd'),
(12, 1, 'Meghna', 'মেঘনা', 'meghna.comilla.gov.bd'),
(13, 1, 'Monohargonj', 'মনোহরগঞ্জ', 'monohargonj.comilla.gov.bd'),
(14, 1, 'Sadarsouth', 'সদর দক্ষিণ', 'sadarsouth.comilla.gov.bd'),
(15, 1, 'Titas', 'তিতাস', 'titas.comilla.gov.bd'),
(16, 1, 'Burichang', 'বুড়িচং', 'burichang.comilla.gov.bd'),
(17, 1, 'Lalmai', 'লালমাই', 'lalmai.comilla.gov.bd'),
(18, 2, 'Chhagalnaiya', 'ছাগলনাইয়া', 'chhagalnaiya.feni.gov.bd'),
(19, 2, 'Feni Sadar', 'ফেনী সদর', 'sadar.feni.gov.bd'),
(20, 2, 'Sonagazi', 'সোনাগাজী', 'sonagazi.feni.gov.bd'),
(21, 2, 'Fulgazi', 'ফুলগাজী', 'fulgazi.feni.gov.bd'),
(22, 2, 'Parshuram', 'পরশুরাম', 'parshuram.feni.gov.bd'),
(23, 2, 'Daganbhuiyan', 'দাগনভূঞা', 'daganbhuiyan.feni.gov.bd'),
(24, 3, 'Brahmanbaria Sadar', 'ব্রাহ্মণবাড়িয়া সদর', 'sadar.brahmanbaria.gov.bd'),
(25, 3, 'Kasba', 'কসবা', 'kasba.brahmanbaria.gov.bd'),
(26, 3, 'Nasirnagar', 'নাসিরনগর', 'nasirnagar.brahmanbaria.gov.bd'),
(27, 3, 'Sarail', 'সরাইল', 'sarail.brahmanbaria.gov.bd'),
(28, 3, 'Ashuganj', 'আশুগঞ্জ', 'ashuganj.brahmanbaria.gov.bd'),
(29, 3, 'Akhaura', 'আখাউড়া', 'akhaura.brahmanbaria.gov.bd'),
(30, 3, 'Nabinagar', 'নবীনগর', 'nabinagar.brahmanbaria.gov.bd'),
(31, 3, 'Bancharampur', 'বাঞ্ছারামপুর', 'bancharampur.brahmanbaria.gov.bd'),
(32, 3, 'Bijoynagar', 'বিজয়নগর', 'bijoynagar.brahmanbaria.gov.bd    '),
(33, 4, 'Rangamati Sadar', 'রাঙ্গামাটি সদর', 'sadar.rangamati.gov.bd'),
(34, 4, 'Kaptai', 'কাপ্তাই', 'kaptai.rangamati.gov.bd'),
(35, 4, 'Kawkhali', 'কাউখালী', 'kawkhali.rangamati.gov.bd'),
(36, 4, 'Baghaichari', 'বাঘাইছড়ি', 'baghaichari.rangamati.gov.bd'),
(37, 4, 'Barkal', 'বরকল', 'barkal.rangamati.gov.bd'),
(38, 4, 'Langadu', 'লংগদু', 'langadu.rangamati.gov.bd'),
(39, 4, 'Rajasthali', 'রাজস্থলী', 'rajasthali.rangamati.gov.bd'),
(40, 4, 'Belaichari', 'বিলাইছড়ি', 'belaichari.rangamati.gov.bd'),
(41, 4, 'Juraichari', 'জুরাছড়ি', 'juraichari.rangamati.gov.bd'),
(42, 4, 'Naniarchar', 'নানিয়ারচর', 'naniarchar.rangamati.gov.bd'),
(43, 5, 'Noakhali Sadar', 'নোয়াখালী সদর', 'sadar.noakhali.gov.bd'),
(44, 5, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.noakhali.gov.bd'),
(45, 5, 'Begumganj', 'বেগমগঞ্জ', 'begumganj.noakhali.gov.bd'),
(46, 5, 'Hatia', 'হাতিয়া', 'hatia.noakhali.gov.bd'),
(47, 5, 'Subarnachar', 'সুবর্ণচর', 'subarnachar.noakhali.gov.bd'),
(48, 5, 'Kabirhat', 'কবিরহাট', 'kabirhat.noakhali.gov.bd'),
(49, 5, 'Senbug', 'সেনবাগ', 'senbug.noakhali.gov.bd'),
(50, 5, 'Chatkhil', 'চাটখিল', 'chatkhil.noakhali.gov.bd'),
(51, 5, 'Sonaimori', 'সোনাইমুড়ী', 'sonaimori.noakhali.gov.bd'),
(52, 6, 'Haimchar', 'হাইমচর', 'haimchar.chandpur.gov.bd'),
(53, 6, 'Kachua', 'কচুয়া', 'kachua.chandpur.gov.bd'),
(54, 6, 'Shahrasti', 'শাহরাস্তি	', 'shahrasti.chandpur.gov.bd'),
(55, 6, 'Chandpur Sadar', 'চাঁদপুর সদর', 'sadar.chandpur.gov.bd'),
(56, 6, 'Matlab South', 'মতলব দক্ষিণ', 'matlabsouth.chandpur.gov.bd'),
(57, 6, 'Hajiganj', 'হাজীগঞ্জ', 'hajiganj.chandpur.gov.bd'),
(58, 6, 'Matlab North', 'মতলব উত্তর', 'matlabnorth.chandpur.gov.bd'),
(59, 6, 'Faridgonj', 'ফরিদগঞ্জ', 'faridgonj.chandpur.gov.bd'),
(60, 7, 'Lakshmipur Sadar', 'লক্ষ্মীপুর সদর', 'sadar.lakshmipur.gov.bd'),
(61, 7, 'Kamalnagar', 'কমলনগর', 'kamalnagar.lakshmipur.gov.bd'),
(62, 7, 'Raipur', 'রায়পুর', 'raipur.lakshmipur.gov.bd'),
(63, 7, 'Ramgati', 'রামগতি', 'ramgati.lakshmipur.gov.bd'),
(64, 7, 'Ramganj', 'রামগঞ্জ', 'ramganj.lakshmipur.gov.bd'),
(65, 8, 'Rangunia', 'রাঙ্গুনিয়া', 'rangunia.chittagong.gov.bd'),
(66, 8, 'Sitakunda', 'সীতাকুন্ড', 'sitakunda.chittagong.gov.bd'),
(67, 8, 'Mirsharai', 'মীরসরাই', 'mirsharai.chittagong.gov.bd'),
(68, 8, 'Patiya', 'পটিয়া', 'patiya.chittagong.gov.bd'),
(69, 8, 'Sandwip', 'সন্দ্বীপ', 'sandwip.chittagong.gov.bd'),
(70, 8, 'Banshkhali', 'বাঁশখালী', 'banshkhali.chittagong.gov.bd'),
(71, 8, 'Boalkhali', 'বোয়ালখালী', 'boalkhali.chittagong.gov.bd'),
(72, 8, 'Anwara', 'আনোয়ারা', 'anwara.chittagong.gov.bd'),
(73, 8, 'Chandanaish', 'চন্দনাইশ', 'chandanaish.chittagong.gov.bd'),
(74, 8, 'Satkania', 'সাতকানিয়া', 'satkania.chittagong.gov.bd'),
(75, 8, 'Lohagara', 'লোহাগাড়া', 'lohagara.chittagong.gov.bd'),
(76, 8, 'Hathazari', 'হাটহাজারী', 'hathazari.chittagong.gov.bd'),
(77, 8, 'Fatikchhari', 'ফটিকছড়ি', 'fatikchhari.chittagong.gov.bd'),
(78, 8, 'Raozan', 'রাউজান', 'raozan.chittagong.gov.bd'),
(79, 8, 'Karnafuli', 'কর্ণফুলী', 'karnafuli.chittagong.gov.bd'),
(80, 9, 'Coxsbazar Sadar', 'কক্সবাজার সদর', 'sadar.coxsbazar.gov.bd'),
(81, 9, 'Chakaria', 'চকরিয়া', 'chakaria.coxsbazar.gov.bd'),
(82, 9, 'Kutubdia', 'কুতুবদিয়া', 'kutubdia.coxsbazar.gov.bd'),
(83, 9, 'Ukhiya', 'উখিয়া', 'ukhiya.coxsbazar.gov.bd'),
(84, 9, 'Moheshkhali', 'মহেশখালী', 'moheshkhali.coxsbazar.gov.bd'),
(85, 9, 'Pekua', 'পেকুয়া', 'pekua.coxsbazar.gov.bd'),
(86, 9, 'Ramu', 'রামু', 'ramu.coxsbazar.gov.bd'),
(87, 9, 'Teknaf', 'টেকনাফ', 'teknaf.coxsbazar.gov.bd'),
(88, 10, 'Khagrachhari Sadar', 'খাগড়াছড়ি সদর', 'sadar.khagrachhari.gov.bd'),
(89, 10, 'Dighinala', 'দিঘীনালা', 'dighinala.khagrachhari.gov.bd'),
(90, 10, 'Panchari', 'পানছড়ি', 'panchari.khagrachhari.gov.bd'),
(91, 10, 'Laxmichhari', 'লক্ষীছড়ি', 'laxmichhari.khagrachhari.gov.bd'),
(92, 10, 'Mohalchari', 'মহালছড়ি', 'mohalchari.khagrachhari.gov.bd'),
(93, 10, 'Manikchari', 'মানিকছড়ি', 'manikchari.khagrachhari.gov.bd'),
(94, 10, 'Ramgarh', 'রামগড়', 'ramgarh.khagrachhari.gov.bd'),
(95, 10, 'Matiranga', 'মাটিরাঙ্গা', 'matiranga.khagrachhari.gov.bd'),
(96, 10, 'Guimara', 'গুইমারা', 'guimara.khagrachhari.gov.bd'),
(97, 11, 'Bandarban Sadar', 'বান্দরবান সদর', 'sadar.bandarban.gov.bd'),
(98, 11, 'Alikadam', 'আলীকদম', 'alikadam.bandarban.gov.bd'),
(99, 11, 'Naikhongchhari', 'নাইক্ষ্যংছড়ি', 'naikhongchhari.bandarban.gov.bd'),
(100, 11, 'Rowangchhari', 'রোয়াংছড়ি', 'rowangchhari.bandarban.gov.bd'),
(101, 11, 'Lama', 'লামা', 'lama.bandarban.gov.bd'),
(102, 11, 'Ruma', 'রুমা', 'ruma.bandarban.gov.bd'),
(103, 11, 'Thanchi', 'থানচি', 'thanchi.bandarban.gov.bd'),
(104, 12, 'Belkuchi', 'বেলকুচি', 'belkuchi.sirajganj.gov.bd'),
(105, 12, 'Chauhali', 'চৌহালি', 'chauhali.sirajganj.gov.bd'),
(106, 12, 'Kamarkhand', 'কামারখন্দ', 'kamarkhand.sirajganj.gov.bd'),
(107, 12, 'Kazipur', 'কাজীপুর', 'kazipur.sirajganj.gov.bd'),
(108, 12, 'Raigonj', 'রায়গঞ্জ', 'raigonj.sirajganj.gov.bd'),
(109, 12, 'Shahjadpur', 'শাহজাদপুর', 'shahjadpur.sirajganj.gov.bd'),
(110, 12, 'Sirajganj Sadar', 'সিরাজগঞ্জ সদর', 'sirajganjsadar.sirajganj.gov.bd'),
(111, 12, 'Tarash', 'তাড়াশ', 'tarash.sirajganj.gov.bd'),
(112, 12, 'Ullapara', 'উল্লাপাড়া', 'ullapara.sirajganj.gov.bd'),
(113, 13, 'Sujanagar', 'সুজানগর', 'sujanagar.pabna.gov.bd'),
(114, 13, 'Ishurdi', 'ঈশ্বরদী', 'ishurdi.pabna.gov.bd'),
(115, 13, 'Bhangura', 'ভাঙ্গুড়া', 'bhangura.pabna.gov.bd'),
(116, 13, 'Pabna Sadar', 'পাবনা সদর', 'pabnasadar.pabna.gov.bd'),
(117, 13, 'Bera', 'বেড়া', 'bera.pabna.gov.bd'),
(118, 13, 'Atghoria', 'আটঘরিয়া', 'atghoria.pabna.gov.bd'),
(119, 13, 'Chatmohar', 'চাটমোহর', 'chatmohar.pabna.gov.bd'),
(120, 13, 'Santhia', 'সাঁথিয়া', 'santhia.pabna.gov.bd'),
(121, 13, 'Faridpur', 'ফরিদপুর', 'faridpur.pabna.gov.bd'),
(122, 14, 'Kahaloo', 'কাহালু', 'kahaloo.bogra.gov.bd'),
(123, 14, 'Bogra Sadar', 'বগুড়া সদর', 'sadar.bogra.gov.bd'),
(124, 14, 'Shariakandi', 'সারিয়াকান্দি', 'shariakandi.bogra.gov.bd'),
(125, 14, 'Shajahanpur', 'শাজাহানপুর', 'shajahanpur.bogra.gov.bd'),
(126, 14, 'Dupchanchia', 'দুপচাচিঁয়া', 'dupchanchia.bogra.gov.bd'),
(127, 14, 'Adamdighi', 'আদমদিঘি', 'adamdighi.bogra.gov.bd'),
(128, 14, 'Nondigram', 'নন্দিগ্রাম', 'nondigram.bogra.gov.bd'),
(129, 14, 'Sonatala', 'সোনাতলা', 'sonatala.bogra.gov.bd'),
(130, 14, 'Dhunot', 'ধুনট', 'dhunot.bogra.gov.bd'),
(131, 14, 'Gabtali', 'গাবতলী', 'gabtali.bogra.gov.bd'),
(132, 14, 'Sherpur', 'শেরপুর', 'sherpur.bogra.gov.bd'),
(133, 14, 'Shibganj', 'শিবগঞ্জ', 'shibganj.bogra.gov.bd'),
(134, 15, 'Paba', 'পবা', 'paba.rajshahi.gov.bd'),
(135, 15, 'Durgapur', 'দুর্গাপুর', 'durgapur.rajshahi.gov.bd'),
(136, 15, 'Mohonpur', 'মোহনপুর', 'mohonpur.rajshahi.gov.bd'),
(137, 15, 'Charghat', 'চারঘাট', 'charghat.rajshahi.gov.bd'),
(138, 15, 'Puthia', 'পুঠিয়া', 'puthia.rajshahi.gov.bd'),
(139, 15, 'Bagha', 'বাঘা', 'bagha.rajshahi.gov.bd'),
(140, 15, 'Godagari', 'গোদাগাড়ী', 'godagari.rajshahi.gov.bd'),
(141, 15, 'Tanore', 'তানোর', 'tanore.rajshahi.gov.bd'),
(142, 15, 'Bagmara', 'বাগমারা', 'bagmara.rajshahi.gov.bd'),
(143, 16, 'Natore Sadar', 'নাটোর সদর', 'natoresadar.natore.gov.bd'),
(144, 16, 'Singra', 'সিংড়া', 'singra.natore.gov.bd'),
(145, 16, 'Baraigram', 'বড়াইগ্রাম', 'baraigram.natore.gov.bd'),
(146, 16, 'Bagatipara', 'বাগাতিপাড়া', 'bagatipara.natore.gov.bd'),
(147, 16, 'Lalpur', 'লালপুর', 'lalpur.natore.gov.bd'),
(148, 16, 'Gurudaspur', 'গুরুদাসপুর', 'gurudaspur.natore.gov.bd'),
(149, 16, 'Naldanga', 'নলডাঙ্গা', 'naldanga.natore.gov.bd'),
(150, 17, 'Akkelpur', 'আক্কেলপুর', 'akkelpur.joypurhat.gov.bd'),
(151, 17, 'Kalai', 'কালাই', 'kalai.joypurhat.gov.bd'),
(152, 17, 'Khetlal', 'ক্ষেতলাল', 'khetlal.joypurhat.gov.bd'),
(153, 17, 'Panchbibi', 'পাঁচবিবি', 'panchbibi.joypurhat.gov.bd'),
(154, 17, 'Joypurhat Sadar', 'জয়পুরহাট সদর', 'joypurhatsadar.joypurhat.gov.bd'),
(155, 18, 'Chapainawabganj Sadar', 'চাঁপাইনবাবগঞ্জ সদর', 'chapainawabganjsadar.chapainawabganj.gov.bd'),
(156, 18, 'Gomostapur', 'গোমস্তাপুর', 'gomostapur.chapainawabganj.gov.bd'),
(157, 18, 'Nachol', 'নাচোল', 'nachol.chapainawabganj.gov.bd'),
(158, 18, 'Bholahat', 'ভোলাহাট', 'bholahat.chapainawabganj.gov.bd'),
(159, 18, 'Shibganj', 'শিবগঞ্জ', 'shibganj.chapainawabganj.gov.bd'),
(160, 19, 'Mohadevpur', 'মহাদেবপুর', 'mohadevpur.naogaon.gov.bd'),
(161, 19, 'Badalgachi', 'বদলগাছী', 'badalgachi.naogaon.gov.bd'),
(162, 19, 'Patnitala', 'পত্নিতলা', 'patnitala.naogaon.gov.bd'),
(163, 19, 'Dhamoirhat', 'ধামইরহাট', 'dhamoirhat.naogaon.gov.bd'),
(164, 19, 'Niamatpur', 'নিয়ামতপুর', 'niamatpur.naogaon.gov.bd'),
(165, 19, 'Manda', 'মান্দা', 'manda.naogaon.gov.bd'),
(166, 19, 'Atrai', 'আত্রাই', 'atrai.naogaon.gov.bd'),
(167, 19, 'Raninagar', 'রাণীনগর', 'raninagar.naogaon.gov.bd'),
(168, 19, 'Naogaon Sadar', 'নওগাঁ সদর', 'naogaonsadar.naogaon.gov.bd'),
(169, 19, 'Porsha', 'পোরশা', 'porsha.naogaon.gov.bd'),
(170, 19, 'Sapahar', 'সাপাহার', 'sapahar.naogaon.gov.bd'),
(171, 20, 'Manirampur', 'মণিরামপুর', 'manirampur.jessore.gov.bd'),
(172, 20, 'Abhaynagar', 'অভয়নগর', 'abhaynagar.jessore.gov.bd'),
(173, 20, 'Bagherpara', 'বাঘারপাড়া', 'bagherpara.jessore.gov.bd'),
(174, 20, 'Chougachha', 'চৌগাছা', 'chougachha.jessore.gov.bd'),
(175, 20, 'Jhikargacha', 'ঝিকরগাছা', 'jhikargacha.jessore.gov.bd'),
(176, 20, 'Keshabpur', 'কেশবপুর', 'keshabpur.jessore.gov.bd'),
(177, 20, 'Jessore Sadar', 'যশোর সদর', 'sadar.jessore.gov.bd'),
(178, 20, 'Sharsha', 'শার্শা', 'sharsha.jessore.gov.bd'),
(179, 21, 'Assasuni', 'আশাশুনি', 'assasuni.satkhira.gov.bd'),
(180, 21, 'Debhata', 'দেবহাটা', 'debhata.satkhira.gov.bd'),
(181, 21, 'Kalaroa', 'কলারোয়া', 'kalaroa.satkhira.gov.bd'),
(182, 21, 'Satkhira Sadar', 'সাতক্ষীরা সদর', 'satkhirasadar.satkhira.gov.bd'),
(183, 21, 'Shyamnagar', 'শ্যামনগর', 'shyamnagar.satkhira.gov.bd'),
(184, 21, 'Tala', 'তালা', 'tala.satkhira.gov.bd'),
(185, 21, 'Kaliganj', 'কালিগঞ্জ', 'kaliganj.satkhira.gov.bd'),
(186, 22, 'Mujibnagar', 'মুজিবনগর', 'mujibnagar.meherpur.gov.bd'),
(187, 22, 'Meherpur Sadar', 'মেহেরপুর সদর', 'meherpursadar.meherpur.gov.bd'),
(188, 22, 'Gangni', 'গাংনী', 'gangni.meherpur.gov.bd'),
(189, 23, 'Narail Sadar', 'নড়াইল সদর', 'narailsadar.narail.gov.bd'),
(190, 23, 'Lohagara', 'লোহাগড়া', 'lohagara.narail.gov.bd'),
(191, 23, 'Kalia', 'কালিয়া', 'kalia.narail.gov.bd'),
(192, 24, 'Chuadanga Sadar', 'চুয়াডাঙ্গা সদর', 'chuadangasadar.chuadanga.gov.bd'),
(193, 24, 'Alamdanga', 'আলমডাঙ্গা', 'alamdanga.chuadanga.gov.bd'),
(194, 24, 'Damurhuda', 'দামুড়হুদা', 'damurhuda.chuadanga.gov.bd'),
(195, 24, 'Jibannagar', 'জীবননগর', 'jibannagar.chuadanga.gov.bd'),
(196, 25, 'Kushtia Sadar', 'কুষ্টিয়া সদর', 'kushtiasadar.kushtia.gov.bd'),
(197, 25, 'Kumarkhali', 'কুমারখালী', 'kumarkhali.kushtia.gov.bd'),
(198, 25, 'Khoksa', 'খোকসা', 'khoksa.kushtia.gov.bd'),
(199, 25, 'Mirpur', 'মিরপুর', 'mirpurkushtia.kushtia.gov.bd'),
(200, 25, 'Daulatpur', 'দৌলতপুর', 'daulatpur.kushtia.gov.bd'),
(201, 25, 'Bheramara', 'ভেড়ামারা', 'bheramara.kushtia.gov.bd'),
(202, 26, 'Shalikha', 'শালিখা', 'shalikha.magura.gov.bd'),
(203, 26, 'Sreepur', 'শ্রীপুর', 'sreepur.magura.gov.bd'),
(204, 26, 'Magura Sadar', 'মাগুরা সদর', 'magurasadar.magura.gov.bd'),
(205, 26, 'Mohammadpur', 'মহম্মদপুর', 'mohammadpur.magura.gov.bd'),
(206, 27, 'Paikgasa', 'পাইকগাছা', 'paikgasa.khulna.gov.bd'),
(207, 27, 'Fultola', 'ফুলতলা', 'fultola.khulna.gov.bd'),
(208, 27, 'Digholia', 'দিঘলিয়া', 'digholia.khulna.gov.bd'),
(209, 27, 'Rupsha', 'রূপসা', 'rupsha.khulna.gov.bd'),
(210, 27, 'Terokhada', 'তেরখাদা', 'terokhada.khulna.gov.bd'),
(211, 27, 'Dumuria', 'ডুমুরিয়া', 'dumuria.khulna.gov.bd'),
(212, 27, 'Botiaghata', 'বটিয়াঘাটা', 'botiaghata.khulna.gov.bd'),
(213, 27, 'Dakop', 'দাকোপ', 'dakop.khulna.gov.bd'),
(214, 27, 'Koyra', 'কয়রা', 'koyra.khulna.gov.bd'),
(215, 28, 'Fakirhat', 'ফকিরহাট', 'fakirhat.bagerhat.gov.bd'),
(216, 28, 'Bagerhat Sadar', 'বাগেরহাট সদর', 'sadar.bagerhat.gov.bd'),
(217, 28, 'Mollahat', 'মোল্লাহাট', 'mollahat.bagerhat.gov.bd'),
(218, 28, 'Sarankhola', 'শরণখোলা', 'sarankhola.bagerhat.gov.bd'),
(219, 28, 'Rampal', 'রামপাল', 'rampal.bagerhat.gov.bd'),
(220, 28, 'Morrelganj', 'মোড়েলগঞ্জ', 'morrelganj.bagerhat.gov.bd'),
(221, 28, 'Kachua', 'কচুয়া', 'kachua.bagerhat.gov.bd'),
(222, 28, 'Mongla', 'মোংলা', 'mongla.bagerhat.gov.bd'),
(223, 28, 'Chitalmari', 'চিতলমারী', 'chitalmari.bagerhat.gov.bd'),
(224, 29, 'Jhenaidah Sadar', 'ঝিনাইদহ সদর', 'sadar.jhenaidah.gov.bd'),
(225, 29, 'Shailkupa', 'শৈলকুপা', 'shailkupa.jhenaidah.gov.bd'),
(226, 29, 'Harinakundu', 'হরিণাকুন্ডু', 'harinakundu.jhenaidah.gov.bd'),
(227, 29, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.jhenaidah.gov.bd'),
(228, 29, 'Kotchandpur', 'কোটচাঁদপুর', 'kotchandpur.jhenaidah.gov.bd'),
(229, 29, 'Moheshpur', 'মহেশপুর', 'moheshpur.jhenaidah.gov.bd'),
(230, 30, 'Jhalakathi Sadar', 'ঝালকাঠি সদর', 'sadar.jhalakathi.gov.bd'),
(231, 30, 'Kathalia', 'কাঠালিয়া', 'kathalia.jhalakathi.gov.bd'),
(232, 30, 'Nalchity', 'নলছিটি', 'nalchity.jhalakathi.gov.bd'),
(233, 30, 'Rajapur', 'রাজাপুর', 'rajapur.jhalakathi.gov.bd'),
(234, 31, 'Bauphal', 'বাউফল', 'bauphal.patuakhali.gov.bd'),
(235, 31, 'Patuakhali Sadar', 'পটুয়াখালী সদর', 'sadar.patuakhali.gov.bd'),
(236, 31, 'Dumki', 'দুমকি', 'dumki.patuakhali.gov.bd'),
(237, 31, 'Dashmina', 'দশমিনা', 'dashmina.patuakhali.gov.bd'),
(238, 31, 'Kalapara', 'কলাপাড়া', 'kalapara.patuakhali.gov.bd'),
(239, 31, 'Mirzaganj', 'মির্জাগঞ্জ', 'mirzaganj.patuakhali.gov.bd'),
(240, 31, 'Galachipa', 'গলাচিপা', 'galachipa.patuakhali.gov.bd'),
(241, 31, 'Rangabali', 'রাঙ্গাবালী', 'rangabali.patuakhali.gov.bd'),
(242, 32, 'Pirojpur Sadar', 'পিরোজপুর সদর', 'sadar.pirojpur.gov.bd'),
(243, 32, 'Nazirpur', 'নাজিরপুর', 'nazirpur.pirojpur.gov.bd'),
(244, 32, 'Kawkhali', 'কাউখালী', 'kawkhali.pirojpur.gov.bd'),
(245, 32, 'Zianagar', 'জিয়ানগর', 'zianagar.pirojpur.gov.bd'),
(246, 32, 'Bhandaria', 'ভান্ডারিয়া', 'bhandaria.pirojpur.gov.bd'),
(247, 32, 'Mathbaria', 'মঠবাড়ীয়া', 'mathbaria.pirojpur.gov.bd'),
(248, 32, 'Nesarabad', 'নেছারাবাদ', 'nesarabad.pirojpur.gov.bd'),
(249, 33, 'Barisal Sadar', 'বরিশাল সদর', 'barisalsadar.barisal.gov.bd'),
(250, 33, 'Bakerganj', 'বাকেরগঞ্জ', 'bakerganj.barisal.gov.bd'),
(251, 33, 'Babuganj', 'বাবুগঞ্জ', 'babuganj.barisal.gov.bd'),
(252, 33, 'Wazirpur', 'উজিরপুর', 'wazirpur.barisal.gov.bd'),
(253, 33, 'Banaripara', 'বানারীপাড়া', 'banaripara.barisal.gov.bd'),
(254, 33, 'Gournadi', 'গৌরনদী', 'gournadi.barisal.gov.bd'),
(255, 33, 'Agailjhara', 'আগৈলঝাড়া', 'agailjhara.barisal.gov.bd'),
(256, 33, 'Mehendiganj', 'মেহেন্দিগঞ্জ', 'mehendiganj.barisal.gov.bd'),
(257, 33, 'Muladi', 'মুলাদী', 'muladi.barisal.gov.bd'),
(258, 33, 'Hizla', 'হিজলা', 'hizla.barisal.gov.bd'),
(259, 34, 'Bhola Sadar', 'ভোলা সদর', 'sadar.bhola.gov.bd'),
(260, 34, 'Borhan Sddin', 'বোরহান উদ্দিন', 'borhanuddin.bhola.gov.bd'),
(261, 34, 'Charfesson', 'চরফ্যাশন', 'charfesson.bhola.gov.bd'),
(262, 34, 'Doulatkhan', 'দৌলতখান', 'doulatkhan.bhola.gov.bd'),
(263, 34, 'Monpura', 'মনপুরা', 'monpura.bhola.gov.bd'),
(264, 34, 'Tazumuddin', 'তজুমদ্দিন', 'tazumuddin.bhola.gov.bd'),
(265, 34, 'Lalmohan', 'লালমোহন', 'lalmohan.bhola.gov.bd'),
(266, 35, 'Amtali', 'আমতলী', 'amtali.barguna.gov.bd'),
(267, 35, 'Barguna Sadar', 'বরগুনা সদর', 'sadar.barguna.gov.bd'),
(268, 35, 'Betagi', 'বেতাগী', 'betagi.barguna.gov.bd'),
(269, 35, 'Bamna', 'বামনা', 'bamna.barguna.gov.bd'),
(270, 35, 'Pathorghata', 'পাথরঘাটা', 'pathorghata.barguna.gov.bd'),
(271, 35, 'Taltali', 'তালতলি', 'taltali.barguna.gov.bd'),
(272, 36, 'Balaganj', 'বালাগঞ্জ', 'balaganj.sylhet.gov.bd'),
(273, 36, 'Beanibazar', 'বিয়ানীবাজার', 'beanibazar.sylhet.gov.bd'),
(274, 36, 'Bishwanath', 'বিশ্বনাথ', 'bishwanath.sylhet.gov.bd'),
(275, 36, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.sylhet.gov.bd'),
(276, 36, 'Fenchuganj', 'ফেঞ্চুগঞ্জ', 'fenchuganj.sylhet.gov.bd'),
(277, 36, 'Golapganj', 'গোলাপগঞ্জ', 'golapganj.sylhet.gov.bd'),
(278, 36, 'Gowainghat', 'গোয়াইনঘাট', 'gowainghat.sylhet.gov.bd'),
(279, 36, 'Jaintiapur', 'জৈন্তাপুর', 'jaintiapur.sylhet.gov.bd'),
(280, 36, 'Kanaighat', 'কানাইঘাট', 'kanaighat.sylhet.gov.bd'),
(281, 36, 'Sylhet Sadar', 'সিলেট সদর', 'sylhetsadar.sylhet.gov.bd'),
(282, 36, 'Zakiganj', 'জকিগঞ্জ', 'zakiganj.sylhet.gov.bd'),
(283, 36, 'Dakshinsurma', 'দক্ষিণ সুরমা', 'dakshinsurma.sylhet.gov.bd'),
(284, 36, 'Osmaninagar', 'ওসমানী নগর', 'osmaninagar.sylhet.gov.bd'),
(285, 37, 'Barlekha', 'বড়লেখা', 'barlekha.moulvibazar.gov.bd'),
(286, 37, 'Kamolganj', 'কমলগঞ্জ', 'kamolganj.moulvibazar.gov.bd'),
(287, 37, 'Kulaura', 'কুলাউড়া', 'kulaura.moulvibazar.gov.bd'),
(288, 37, 'Moulvibazar Sadar', 'মৌলভীবাজার সদর', 'moulvibazarsadar.moulvibazar.gov.bd'),
(289, 37, 'Rajnagar', 'রাজনগর', 'rajnagar.moulvibazar.gov.bd'),
(290, 37, 'Sreemangal', 'শ্রীমঙ্গল', 'sreemangal.moulvibazar.gov.bd'),
(291, 37, 'Juri', 'জুড়ী', 'juri.moulvibazar.gov.bd'),
(292, 38, 'Nabiganj', 'নবীগঞ্জ', 'nabiganj.habiganj.gov.bd'),
(293, 38, 'Bahubal', 'বাহুবল', 'bahubal.habiganj.gov.bd'),
(294, 38, 'Ajmiriganj', 'আজমিরীগঞ্জ', 'ajmiriganj.habiganj.gov.bd'),
(295, 38, 'Baniachong', 'বানিয়াচং', 'baniachong.habiganj.gov.bd'),
(296, 38, 'Lakhai', 'লাখাই', 'lakhai.habiganj.gov.bd'),
(297, 38, 'Chunarughat', 'চুনারুঘাট', 'chunarughat.habiganj.gov.bd'),
(298, 38, 'Habiganj Sadar', 'হবিগঞ্জ সদর', 'habiganjsadar.habiganj.gov.bd'),
(299, 38, 'Madhabpur', 'মাধবপুর', 'madhabpur.habiganj.gov.bd'),
(300, 39, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর', 'sadar.sunamganj.gov.bd'),
(301, 39, 'South Sunamganj', 'দক্ষিণ সুনামগঞ্জ', 'southsunamganj.sunamganj.gov.bd'),
(302, 39, 'Bishwambarpur', 'বিশ্বম্ভরপুর', 'bishwambarpur.sunamganj.gov.bd'),
(303, 39, 'Chhatak', 'ছাতক', 'chhatak.sunamganj.gov.bd'),
(304, 39, 'Jagannathpur', 'জগন্নাথপুর', 'jagannathpur.sunamganj.gov.bd'),
(305, 39, 'Dowarabazar', 'দোয়ারাবাজার', 'dowarabazar.sunamganj.gov.bd'),
(306, 39, 'Tahirpur', 'তাহিরপুর', 'tahirpur.sunamganj.gov.bd'),
(307, 39, 'Dharmapasha', 'ধর্মপাশা', 'dharmapasha.sunamganj.gov.bd'),
(308, 39, 'Jamalganj', 'জামালগঞ্জ', 'jamalganj.sunamganj.gov.bd'),
(309, 39, 'Shalla', 'শাল্লা', 'shalla.sunamganj.gov.bd'),
(310, 39, 'Derai', 'দিরাই', 'derai.sunamganj.gov.bd'),
(311, 40, 'Belabo', 'বেলাবো', 'belabo.narsingdi.gov.bd'),
(312, 40, 'Monohardi', 'মনোহরদী', 'monohardi.narsingdi.gov.bd'),
(313, 40, 'Narsingdi Sadar', 'নরসিংদী সদর', 'narsingdisadar.narsingdi.gov.bd'),
(314, 40, 'Palash', 'পলাশ', 'palash.narsingdi.gov.bd'),
(315, 40, 'Raipura', 'রায়পুরা', 'raipura.narsingdi.gov.bd'),
(316, 40, 'Shibpur', 'শিবপুর', 'shibpur.narsingdi.gov.bd'),
(317, 41, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.gazipur.gov.bd'),
(318, 41, 'Kaliakair', 'কালিয়াকৈর', 'kaliakair.gazipur.gov.bd'),
(319, 41, 'Kapasia', 'কাপাসিয়া', 'kapasia.gazipur.gov.bd'),
(320, 41, 'Gazipur Sadar', 'গাজীপুর সদর', 'sadar.gazipur.gov.bd'),
(321, 41, 'Sreepur', 'শ্রীপুর', 'sreepur.gazipur.gov.bd'),
(322, 42, 'Shariatpur Sadar', 'শরিয়তপুর সদর', 'sadar.shariatpur.gov.bd'),
(323, 42, 'Naria', 'নড়িয়া', 'naria.shariatpur.gov.bd'),
(324, 42, 'Zajira', 'জাজিরা', 'zajira.shariatpur.gov.bd'),
(325, 42, 'Gosairhat', 'গোসাইরহাট', 'gosairhat.shariatpur.gov.bd'),
(326, 42, 'Bhedarganj', 'ভেদরগঞ্জ', 'bhedarganj.shariatpur.gov.bd'),
(327, 42, 'Damudya', 'ডামুড্যা', 'damudya.shariatpur.gov.bd'),
(328, 43, 'Araihazar', 'আড়াইহাজার', 'araihazar.narayanganj.gov.bd'),
(329, 43, 'Bandar', 'বন্দর', 'bandar.narayanganj.gov.bd'),
(330, 43, 'Narayanganj Sadar', 'নারায়নগঞ্জ সদর', 'narayanganjsadar.narayanganj.gov.bd'),
(331, 43, 'Rupganj', 'রূপগঞ্জ', 'rupganj.narayanganj.gov.bd'),
(332, 43, 'Sonargaon', 'সোনারগাঁ', 'sonargaon.narayanganj.gov.bd'),
(333, 44, 'Basail', 'বাসাইল', 'basail.tangail.gov.bd'),
(334, 44, 'Bhuapur', 'ভুয়াপুর', 'bhuapur.tangail.gov.bd'),
(335, 44, 'Delduar', 'দেলদুয়ার', 'delduar.tangail.gov.bd'),
(336, 44, 'Ghatail', 'ঘাটাইল', 'ghatail.tangail.gov.bd'),
(337, 44, 'Gopalpur', 'গোপালপুর', 'gopalpur.tangail.gov.bd'),
(338, 44, 'Madhupur', 'মধুপুর', 'madhupur.tangail.gov.bd'),
(339, 44, 'Mirzapur', 'মির্জাপুর', 'mirzapur.tangail.gov.bd'),
(340, 44, 'Nagarpur', 'নাগরপুর', 'nagarpur.tangail.gov.bd'),
(341, 44, 'Sakhipur', 'সখিপুর', 'sakhipur.tangail.gov.bd'),
(342, 44, 'Tangail Sadar', 'টাঙ্গাইল সদর', 'tangailsadar.tangail.gov.bd'),
(343, 44, 'Kalihati', 'কালিহাতী', 'kalihati.tangail.gov.bd'),
(344, 44, 'Dhanbari', 'ধনবাড়ী', 'dhanbari.tangail.gov.bd'),
(345, 45, 'Itna', 'ইটনা', 'itna.kishoreganj.gov.bd'),
(346, 45, 'Katiadi', 'কটিয়াদী', 'katiadi.kishoreganj.gov.bd'),
(347, 45, 'Bhairab', 'ভৈরব', 'bhairab.kishoreganj.gov.bd'),
(348, 45, 'Tarail', 'তাড়াইল', 'tarail.kishoreganj.gov.bd'),
(349, 45, 'Hossainpur', 'হোসেনপুর', 'hossainpur.kishoreganj.gov.bd'),
(350, 45, 'Pakundia', 'পাকুন্দিয়া', 'pakundia.kishoreganj.gov.bd'),
(351, 45, 'Kuliarchar', 'কুলিয়ারচর', 'kuliarchar.kishoreganj.gov.bd'),
(352, 45, 'Kishoreganj Sadar', 'কিশোরগঞ্জ সদর', 'kishoreganjsadar.kishoreganj.gov.bd'),
(353, 45, 'Karimgonj', 'করিমগঞ্জ', 'karimgonj.kishoreganj.gov.bd'),
(354, 45, 'Bajitpur', 'বাজিতপুর', 'bajitpur.kishoreganj.gov.bd'),
(355, 45, 'Austagram', 'অষ্টগ্রাম', 'austagram.kishoreganj.gov.bd'),
(356, 45, 'Mithamoin', 'মিঠামইন', 'mithamoin.kishoreganj.gov.bd'),
(357, 45, 'Nikli', 'নিকলী', 'nikli.kishoreganj.gov.bd'),
(358, 46, 'Harirampur', 'হরিরামপুর', 'harirampur.manikganj.gov.bd'),
(359, 46, 'Saturia', 'সাটুরিয়া', 'saturia.manikganj.gov.bd'),
(360, 46, 'Manikganj Sadar', 'মানিকগঞ্জ সদর', 'sadar.manikganj.gov.bd'),
(361, 46, 'Gior', 'ঘিওর', 'gior.manikganj.gov.bd'),
(362, 46, 'Shibaloy', 'শিবালয়', 'shibaloy.manikganj.gov.bd'),
(363, 46, 'Doulatpur', 'দৌলতপুর', 'doulatpur.manikganj.gov.bd'),
(364, 46, 'Singiar', 'সিংগাইর', 'singiar.manikganj.gov.bd'),
(365, 47, 'Savar', 'সাভার', 'savar.dhaka.gov.bd'),
(366, 47, 'Dhamrai', 'ধামরাই', 'dhamrai.dhaka.gov.bd'),
(367, 47, 'Keraniganj', 'কেরাণীগঞ্জ', 'keraniganj.dhaka.gov.bd'),
(368, 47, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dhaka.gov.bd'),
(369, 47, 'Dohar', 'দোহার', 'dohar.dhaka.gov.bd'),
(370, 48, 'Munshiganj Sadar', 'মুন্সিগঞ্জ সদর', 'sadar.munshiganj.gov.bd'),
(371, 48, 'Sreenagar', 'শ্রীনগর', 'sreenagar.munshiganj.gov.bd'),
(372, 48, 'Sirajdikhan', 'সিরাজদিখান', 'sirajdikhan.munshiganj.gov.bd'),
(373, 48, 'Louhajanj', 'লৌহজং', 'louhajanj.munshiganj.gov.bd'),
(374, 48, 'Gajaria', 'গজারিয়া', 'gajaria.munshiganj.gov.bd'),
(375, 48, 'Tongibari', 'টংগীবাড়ি', 'tongibari.munshiganj.gov.bd'),
(376, 49, 'Rajbari Sadar', 'রাজবাড়ী সদর', 'sadar.rajbari.gov.bd'),
(377, 49, 'Goalanda', 'গোয়ালন্দ', 'goalanda.rajbari.gov.bd'),
(378, 49, 'Pangsa', 'পাংশা', 'pangsa.rajbari.gov.bd'),
(379, 49, 'Baliakandi', 'বালিয়াকান্দি', 'baliakandi.rajbari.gov.bd'),
(380, 49, 'Kalukhali', 'কালুখালী', 'kalukhali.rajbari.gov.bd'),
(381, 50, 'Madaripur Sadar', 'মাদারীপুর সদর', 'sadar.madaripur.gov.bd'),
(382, 50, 'Shibchar', 'শিবচর', 'shibchar.madaripur.gov.bd'),
(383, 50, 'Kalkini', 'কালকিনি', 'kalkini.madaripur.gov.bd'),
(384, 50, 'Rajoir', 'রাজৈর', 'rajoir.madaripur.gov.bd'),
(385, 51, 'Gopalganj Sadar', 'গোপালগঞ্জ সদর', 'sadar.gopalganj.gov.bd'),
(386, 51, 'Kashiani', 'কাশিয়ানী', 'kashiani.gopalganj.gov.bd'),
(387, 51, 'Tungipara', 'টুংগীপাড়া', 'tungipara.gopalganj.gov.bd'),
(388, 51, 'Kotalipara', 'কোটালীপাড়া', 'kotalipara.gopalganj.gov.bd'),
(389, 51, 'Muksudpur', 'মুকসুদপুর', 'muksudpur.gopalganj.gov.bd'),
(390, 52, 'Faridpur Sadar', 'ফরিদপুর সদর', 'sadar.faridpur.gov.bd'),
(391, 52, 'Alfadanga', 'আলফাডাঙ্গা', 'alfadanga.faridpur.gov.bd'),
(392, 52, 'Boalmari', 'বোয়ালমারী', 'boalmari.faridpur.gov.bd'),
(393, 52, 'Sadarpur', 'সদরপুর', 'sadarpur.faridpur.gov.bd'),
(394, 52, 'Nagarkanda', 'নগরকান্দা', 'nagarkanda.faridpur.gov.bd'),
(395, 52, 'Bhanga', 'ভাঙ্গা', 'bhanga.faridpur.gov.bd'),
(396, 52, 'Charbhadrasan', 'চরভদ্রাসন', 'charbhadrasan.faridpur.gov.bd'),
(397, 52, 'Madhukhali', 'মধুখালী', 'madhukhali.faridpur.gov.bd'),
(398, 52, 'Saltha', 'সালথা', 'saltha.faridpur.gov.bd'),
(399, 53, 'Panchagarh Sadar', 'পঞ্চগড় সদর', 'panchagarhsadar.panchagarh.gov.bd'),
(400, 53, 'Debiganj', 'দেবীগঞ্জ', 'debiganj.panchagarh.gov.bd'),
(401, 53, 'Boda', 'বোদা', 'boda.panchagarh.gov.bd'),
(402, 53, 'Atwari', 'আটোয়ারী', 'atwari.panchagarh.gov.bd'),
(403, 53, 'Tetulia', 'তেতুলিয়া', 'tetulia.panchagarh.gov.bd'),
(404, 54, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dinajpur.gov.bd'),
(405, 54, 'Birganj', 'বীরগঞ্জ', 'birganj.dinajpur.gov.bd'),
(406, 54, 'Ghoraghat', 'ঘোড়াঘাট', 'ghoraghat.dinajpur.gov.bd'),
(407, 54, 'Birampur', 'বিরামপুর', 'birampur.dinajpur.gov.bd'),
(408, 54, 'Parbatipur', 'পার্বতীপুর', 'parbatipur.dinajpur.gov.bd'),
(409, 54, 'Bochaganj', 'বোচাগঞ্জ', 'bochaganj.dinajpur.gov.bd'),
(410, 54, 'Kaharol', 'কাহারোল', 'kaharol.dinajpur.gov.bd'),
(411, 54, 'Fulbari', 'ফুলবাড়ী', 'fulbari.dinajpur.gov.bd'),
(412, 54, 'Dinajpur Sadar', 'দিনাজপুর সদর', 'dinajpursadar.dinajpur.gov.bd'),
(413, 54, 'Hakimpur', 'হাকিমপুর', 'hakimpur.dinajpur.gov.bd'),
(414, 54, 'Khansama', 'খানসামা', 'khansama.dinajpur.gov.bd'),
(415, 54, 'Birol', 'বিরল', 'birol.dinajpur.gov.bd'),
(416, 54, 'Chirirbandar', 'চিরিরবন্দর', 'chirirbandar.dinajpur.gov.bd'),
(417, 55, 'Lalmonirhat Sadar', 'লালমনিরহাট সদর', 'sadar.lalmonirhat.gov.bd'),
(418, 55, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.lalmonirhat.gov.bd'),
(419, 55, 'Hatibandha', 'হাতীবান্ধা', 'hatibandha.lalmonirhat.gov.bd'),
(420, 55, 'Patgram', 'পাটগ্রাম', 'patgram.lalmonirhat.gov.bd'),
(421, 55, 'Aditmari', 'আদিতমারী', 'aditmari.lalmonirhat.gov.bd'),
(422, 56, 'Syedpur', 'সৈয়দপুর', 'syedpur.nilphamari.gov.bd'),
(423, 56, 'Domar', 'ডোমার', 'domar.nilphamari.gov.bd'),
(424, 56, 'Dimla', 'ডিমলা', 'dimla.nilphamari.gov.bd'),
(425, 56, 'Jaldhaka', 'জলঢাকা', 'jaldhaka.nilphamari.gov.bd'),
(426, 56, 'Kishorganj', 'কিশোরগঞ্জ', 'kishorganj.nilphamari.gov.bd'),
(427, 56, 'Nilphamari Sadar', 'নীলফামারী সদর', 'nilphamarisadar.nilphamari.gov.bd'),
(428, 57, 'Sadullapur', 'সাদুল্লাপুর', 'sadullapur.gaibandha.gov.bd'),
(429, 57, 'Gaibandha Sadar', 'গাইবান্ধা সদর', 'gaibandhasadar.gaibandha.gov.bd'),
(430, 57, 'Palashbari', 'পলাশবাড়ী', 'palashbari.gaibandha.gov.bd'),
(431, 57, 'Saghata', 'সাঘাটা', 'saghata.gaibandha.gov.bd'),
(432, 57, 'Gobindaganj', 'গোবিন্দগঞ্জ', 'gobindaganj.gaibandha.gov.bd'),
(433, 57, 'Sundarganj', 'সুন্দরগঞ্জ', 'sundarganj.gaibandha.gov.bd'),
(434, 57, 'Phulchari', 'ফুলছড়ি', 'phulchari.gaibandha.gov.bd'),
(435, 58, 'Thakurgaon Sadar', 'ঠাকুরগাঁও সদর', 'thakurgaonsadar.thakurgaon.gov.bd'),
(436, 58, 'Pirganj', 'পীরগঞ্জ', 'pirganj.thakurgaon.gov.bd'),
(437, 58, 'Ranisankail', 'রাণীশংকৈল', 'ranisankail.thakurgaon.gov.bd'),
(438, 58, 'Haripur', 'হরিপুর', 'haripur.thakurgaon.gov.bd'),
(439, 58, 'Baliadangi', 'বালিয়াডাঙ্গী', 'baliadangi.thakurgaon.gov.bd'),
(440, 59, 'Rangpur Sadar', 'রংপুর সদর', 'rangpursadar.rangpur.gov.bd'),
(441, 59, 'Gangachara', 'গংগাচড়া', 'gangachara.rangpur.gov.bd'),
(442, 59, 'Taragonj', 'তারাগঞ্জ', 'taragonj.rangpur.gov.bd'),
(443, 59, 'Badargonj', 'বদরগঞ্জ', 'badargonj.rangpur.gov.bd'),
(444, 59, 'Mithapukur', 'মিঠাপুকুর', 'mithapukur.rangpur.gov.bd'),
(445, 59, 'Pirgonj', 'পীরগঞ্জ', 'pirgonj.rangpur.gov.bd'),
(446, 59, 'Kaunia', 'কাউনিয়া', 'kaunia.rangpur.gov.bd'),
(447, 59, 'Pirgacha', 'পীরগাছা', 'pirgacha.rangpur.gov.bd'),
(448, 60, 'Kurigram Sadar', 'কুড়িগ্রাম সদর', 'kurigramsadar.kurigram.gov.bd'),
(449, 60, 'Nageshwari', 'নাগেশ্বরী', 'nageshwari.kurigram.gov.bd'),
(450, 60, 'Bhurungamari', 'ভুরুঙ্গামারী', 'bhurungamari.kurigram.gov.bd'),
(451, 60, 'Phulbari', 'ফুলবাড়ী', 'phulbari.kurigram.gov.bd'),
(452, 60, 'Rajarhat', 'রাজারহাট', 'rajarhat.kurigram.gov.bd'),
(453, 60, 'Ulipur', 'উলিপুর', 'ulipur.kurigram.gov.bd'),
(454, 60, 'Chilmari', 'চিলমারী', 'chilmari.kurigram.gov.bd'),
(455, 60, 'Rowmari', 'রৌমারী', 'rowmari.kurigram.gov.bd'),
(456, 60, 'Charrajibpur', 'চর রাজিবপুর', 'charrajibpur.kurigram.gov.bd'),
(457, 61, 'Sherpur Sadar', 'শেরপুর সদর', 'sherpursadar.sherpur.gov.bd'),
(458, 61, 'Nalitabari', 'নালিতাবাড়ী', 'nalitabari.sherpur.gov.bd'),
(459, 61, 'Sreebordi', 'শ্রীবরদী', 'sreebordi.sherpur.gov.bd'),
(460, 61, 'Nokla', 'নকলা', 'nokla.sherpur.gov.bd'),
(461, 61, 'Jhenaigati', 'ঝিনাইগাতী', 'jhenaigati.sherpur.gov.bd'),
(462, 62, 'Fulbaria', 'ফুলবাড়ীয়া', 'fulbaria.mymensingh.gov.bd'),
(463, 62, 'Trishal', 'ত্রিশাল', 'trishal.mymensingh.gov.bd'),
(464, 62, 'Bhaluka', 'ভালুকা', 'bhaluka.mymensingh.gov.bd'),
(465, 62, 'Muktagacha', 'মুক্তাগাছা', 'muktagacha.mymensingh.gov.bd'),
(466, 62, 'Mymensingh Sadar', 'ময়মনসিংহ সদর', 'mymensinghsadar.mymensingh.gov.bd'),
(467, 62, 'Dhobaura', 'ধোবাউড়া', 'dhobaura.mymensingh.gov.bd'),
(468, 62, 'Phulpur', 'ফুলপুর', 'phulpur.mymensingh.gov.bd'),
(469, 62, 'Haluaghat', 'হালুয়াঘাট', 'haluaghat.mymensingh.gov.bd'),
(470, 62, 'Gouripur', 'গৌরীপুর', 'gouripur.mymensingh.gov.bd'),
(471, 62, 'Gafargaon', 'গফরগাঁও', 'gafargaon.mymensingh.gov.bd'),
(472, 62, 'Iswarganj', 'ঈশ্বরগঞ্জ', 'iswarganj.mymensingh.gov.bd'),
(473, 62, 'Nandail', 'নান্দাইল', 'nandail.mymensingh.gov.bd'),
(474, 62, 'Tarakanda', 'তারাকান্দা', 'tarakanda.mymensingh.gov.bd'),
(475, 63, 'Jamalpur Sadar', 'জামালপুর সদর', 'jamalpursadar.jamalpur.gov.bd'),
(476, 63, 'Melandah', 'মেলান্দহ', 'melandah.jamalpur.gov.bd'),
(477, 63, 'Islampur', 'ইসলামপুর', 'islampur.jamalpur.gov.bd'),
(478, 63, 'Dewangonj', 'দেওয়ানগঞ্জ', 'dewangonj.jamalpur.gov.bd'),
(479, 63, 'Sarishabari', 'সরিষাবাড়ী', 'sarishabari.jamalpur.gov.bd'),
(480, 63, 'Madarganj', 'মাদারগঞ্জ', 'madarganj.jamalpur.gov.bd'),
(481, 63, 'Bokshiganj', 'বকশীগঞ্জ', 'bokshiganj.jamalpur.gov.bd'),
(482, 64, 'Barhatta', 'বারহাট্টা', 'barhatta.netrokona.gov.bd'),
(483, 64, 'Durgapur', 'দুর্গাপুর', 'durgapur.netrokona.gov.bd'),
(484, 64, 'Kendua', 'কেন্দুয়া', 'kendua.netrokona.gov.bd'),
(485, 64, 'Atpara', 'আটপাড়া', 'atpara.netrokona.gov.bd'),
(486, 64, 'Madan', 'মদন', 'madan.netrokona.gov.bd'),
(487, 64, 'Khaliajuri', 'খালিয়াজুরী', 'khaliajuri.netrokona.gov.bd'),
(488, 64, 'Kalmakanda', 'কলমাকান্দা', 'kalmakanda.netrokona.gov.bd'),
(489, 64, 'Mohongonj', 'মোহনগঞ্জ', 'mohongonj.netrokona.gov.bd'),
(490, 64, 'Purbadhala', 'পূর্বধলা', 'purbadhala.netrokona.gov.bd'),
(491, 64, 'Netrokona Sadar', 'নেত্রকোণা সদর', 'netrokonasadar.netrokona.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `is` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=Admin,0=User',
  `age` int(11) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `gender` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `type`, `is`, `age`, `phone`, `address`, `gender`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@shafi95.com', 1, 1, NULL, NULL, NULL, NULL, NULL, '$2y$10$/j9dC/kBPI7kYc8et/MWFOqCq/jvOfK2ETqepuNwMD95Z4B75Ch2C', NULL, NULL, NULL, NULL, 'company_logo.jpg', '2021-02-15 01:43:19', '2021-02-15 01:43:19', NULL),
(2, 'Test', 'asdf@asdf', 1, 1, NULL, 1284851515, 'asdf', NULL, NULL, '$2y$10$2W9GgHwJVNHQMFHVZUDVneQzuJQ71scSXpARBiFLw6BPmw21IFwgu', NULL, NULL, NULL, NULL, 'company_logo.jpg', '2021-02-15 02:59:16', '2021-08-28 09:19:12', '2021-08-28 09:19:12'),
(3, 'Farmer', 'sadf@df', 2, 1, NULL, 4, 'sdf', NULL, NULL, '$2y$10$w7W2wYekGWJLsXwx4ov7..pF6GQP44asNJqeAkd8FMRINjpdKCa6K', NULL, NULL, NULL, NULL, 'company_logo.jpg', '2021-02-18 03:58:23', '2021-02-18 03:58:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vaccinations`
--

CREATE TABLE `vaccinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `animal_info_id` bigint(20) UNSIGNED NOT NULL,
  `vaccine_name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vaccine_date` date NOT NULL,
  `dose` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_vaccinated` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitor_infos`
--

CREATE TABLE `visitor_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor_infos`
--

INSERT INTO `visitor_infos` (`id`, `ip`, `iso_code`, `country`, `city`, `state_name`, `postal_code`, `lat`, `lon`, `currency`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.0', 'US', 'United States', 'New Haven', 'Connecticut', '06510', '41.31', '-72.92', 'USD', '2021-09-17 17:15:15', '2021-09-17 17:15:15'),
(2, '103.88.142.166', 'BD', 'Bangladesh', 'Dhaka', 'Dhaka Division', '1000', '23.7272', '90.4093', 'BDT', '2021-09-18 05:30:53', '2021-09-18 05:30:53'),
(3, '66.249.64.232', 'US', 'United States', 'Mountain View', 'California', '94043', '37.422', '-122.084', 'USD', '2021-09-18 06:21:05', '2021-09-18 06:21:05'),
(4, '193.56.29.48', 'PL', 'Poland', 'Warsaw', 'Mazovia', '00-202', '52.2484', '21.0026', 'PLN', '2021-09-18 06:34:26', '2021-09-18 06:34:26'),
(5, '66.249.64.234', 'US', 'United States', 'Mountain View', 'California', '94043', '37.422', '-122.084', 'USD', '2021-09-18 07:52:06', '2021-09-18 07:52:06'),
(6, '66.165.227.138', 'US', 'United States', 'Los Angeles', 'California', '90017', '34.0494', '-118.2661', 'USD', '2021-09-18 11:28:37', '2021-09-18 11:28:37'),
(7, '185.254.31.122', 'TR', 'Turkey', 'Izmir', 'Izmir', '35560', '38.4767', '27.0991', 'TRY', '2021-09-18 18:25:16', '2021-09-18 18:25:16'),
(8, '185.254.31.122', 'TR', 'Turkey', 'Izmir', 'Izmir', '35560', '38.4767', '27.0991', 'TRY', '2021-09-18 18:25:16', '2021-09-18 18:25:16'),
(9, '51.222.253.8', 'SG', 'Singapore', 'Singapore', '', '048581', '1.28141', '103.851', 'SGD', '2021-09-18 20:35:09', '2021-09-18 20:35:09'),
(10, '66.249.64.228', 'US', 'United States', 'Mountain View', 'California', '94043', '37.422', '-122.084', 'USD', '2021-09-18 20:51:33', '2021-09-18 20:51:33'),
(11, '66.249.64.254', 'US', 'United States', 'Mountain View', 'California', '94043', '37.422', '-122.084', 'USD', '2021-09-18 20:51:36', '2021-09-18 20:51:36'),
(12, '66.249.64.226', 'US', 'United States', 'Mountain View', 'California', '94043', '37.422', '-122.084', 'USD', '2021-09-18 20:51:38', '2021-09-18 20:51:38'),
(13, '54.187.167.153', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-18 22:05:36', '2021-09-18 22:05:36'),
(14, '52.34.48.79', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-18 22:05:38', '2021-09-18 22:05:38'),
(15, '52.33.83.224', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-18 22:08:38', '2021-09-18 22:08:38'),
(16, '23.19.122.228', 'US', 'United States', 'Palatine', 'Illinois', '60095', '42.1103', '-88.0342', 'USD', '2021-09-18 22:36:05', '2021-09-18 22:36:05'),
(17, '66.249.64.248', 'US', 'United States', 'Mountain View', 'California', '94043', '37.422', '-122.084', 'USD', '2021-09-19 00:22:59', '2021-09-19 00:22:59'),
(18, '66.249.64.250', 'US', 'United States', 'Mountain View', 'California', '94043', '37.422', '-122.084', 'USD', '2021-09-19 00:23:05', '2021-09-19 00:23:05'),
(19, '64.246.161.30', 'US', 'United States', 'Auburn', 'Washington', '98092', '47.2866', '-122.0914', 'USD', '2021-09-19 02:32:57', '2021-09-19 02:32:57'),
(20, '66.249.64.236', 'US', 'United States', 'Mountain View', 'California', '94043', '37.422', '-122.084', 'USD', '2021-09-19 08:14:04', '2021-09-19 08:14:04'),
(21, '18.221.29.15', 'US', 'United States', 'Dublin', 'Ohio', '43017', '40.0992', '-83.1141', 'USD', '2021-09-19 10:30:22', '2021-09-19 10:30:22'),
(22, '162.214.122.88', 'US', 'United States', 'Provo', 'Utah', '84606', '40.2069', '-111.642', 'USD', '2021-09-19 20:06:31', '2021-09-19 20:06:31'),
(23, '216.244.66.247', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5051', '-122.675', 'USD', '2021-09-19 20:53:24', '2021-09-19 20:53:24'),
(24, '35.167.89.223', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-19 22:15:51', '2021-09-19 22:15:51'),
(25, '54.218.22.146', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-19 22:26:57', '2021-09-19 22:26:57'),
(26, '35.164.156.133', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-19 22:26:57', '2021-09-19 22:26:57'),
(27, '185.41.129.186', 'PL', 'Poland', 'Strzyzow', 'Subcarpathia', '38-100', '49.8749', '21.8018', 'PLN', '2021-09-20 02:52:12', '2021-09-20 02:52:12'),
(28, '5.45.207.122', 'RU', 'Russia', 'Moscow', 'Moscow', '101194', '55.734', '37.5883', 'RUB', '2021-09-20 04:09:38', '2021-09-20 04:09:38'),
(29, '5.45.207.111', 'RU', 'Russia', 'Moscow', 'Moscow', '101194', '55.734', '37.5883', 'RUB', '2021-09-20 04:10:56', '2021-09-20 04:10:56'),
(30, '51.222.253.20', 'SG', 'Singapore', 'Singapore', '', '048581', '1.28141', '103.851', 'SGD', '2021-09-20 11:18:28', '2021-09-20 11:18:28'),
(31, '104.131.18.212', 'US', 'United States', 'Clifton', 'New Jersey', '07014', '40.8364', '-74.1403', 'USD', '2021-09-20 12:37:49', '2021-09-20 12:37:49'),
(32, '66.249.66.74', 'US', 'United States', 'Allentown', 'Pennsylvania', '18105', '40.6023', '-75.4714', 'USD', '2021-09-20 19:40:35', '2021-09-20 19:40:35'),
(33, '66.249.66.71', 'US', 'United States', 'Allentown', 'Pennsylvania', '18105', '40.6023', '-75.4714', 'USD', '2021-09-20 21:51:12', '2021-09-20 21:51:12'),
(34, '66.249.66.73', 'US', 'United States', 'Allentown', 'Pennsylvania', '18105', '40.6023', '-75.4714', 'USD', '2021-09-20 21:55:49', '2021-09-20 21:55:49'),
(35, '51.222.253.12', 'SG', 'Singapore', 'Singapore', '', '048581', '1.28141', '103.851', 'SGD', '2021-09-20 22:46:40', '2021-09-20 22:46:40'),
(36, '34.212.238.217', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-20 23:20:25', '2021-09-20 23:20:25'),
(37, '18.236.175.174', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-20 23:23:51', '2021-09-20 23:23:51'),
(38, '54.201.252.57', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-20 23:25:06', '2021-09-20 23:25:06'),
(39, '35.85.53.8', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-20 23:31:51', '2021-09-20 23:31:51'),
(40, '34.220.222.245', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-20 23:34:30', '2021-09-20 23:34:30'),
(41, '34.222.81.126', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-20 23:41:01', '2021-09-20 23:41:01'),
(42, '66.249.66.78', 'US', 'United States', 'Allentown', 'Pennsylvania', '18105', '40.6023', '-75.4714', 'USD', '2021-09-21 03:56:59', '2021-09-21 03:56:59'),
(43, '66.249.66.77', 'US', 'United States', 'Allentown', 'Pennsylvania', '18105', '40.6023', '-75.4714', 'USD', '2021-09-21 03:57:09', '2021-09-21 03:57:09'),
(44, '138.128.176.138', 'US', 'United States', 'Orlando', 'Florida', '32826', '28.5752', '-81.2003', 'USD', '2021-09-21 12:19:48', '2021-09-21 12:19:48'),
(45, '93.158.91.242', 'SE', 'Sweden', 'Stockholm', 'Stockholm County', '100 05', '59.3293', '18.0686', 'SEK', '2021-09-21 20:11:37', '2021-09-21 20:11:37'),
(46, '93.158.91.241', 'SE', 'Sweden', 'Stockholm', 'Stockholm County', '100 05', '59.3293', '18.0686', 'SEK', '2021-09-21 20:11:38', '2021-09-21 20:11:38'),
(47, '93.158.91.245', 'SE', 'Sweden', 'Stockholm', 'Stockholm County', '100 05', '59.3293', '18.0686', 'SEK', '2021-09-21 20:11:39', '2021-09-21 20:11:39'),
(48, '52.35.74.251', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-21 22:47:54', '2021-09-21 22:47:54'),
(49, '54.185.223.122', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-21 22:47:55', '2021-09-21 22:47:55'),
(50, '52.89.159.177', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-21 23:01:59', '2021-09-21 23:01:59'),
(51, '51.158.108.77', 'FR', 'France', 'Paris', 'Île-de-France', '75001', '48.8323', '2.4075', 'EUR', '2021-09-22 04:44:40', '2021-09-22 04:44:40'),
(52, '51.222.253.7', 'SG', 'Singapore', 'Singapore', '', '048581', '1.28141', '103.851', 'SGD', '2021-09-22 07:26:34', '2021-09-22 07:26:34'),
(53, '66.249.66.79', 'US', 'United States', 'Allentown', 'Pennsylvania', '18105', '40.6023', '-75.4714', 'USD', '2021-09-22 08:13:04', '2021-09-22 08:13:04'),
(54, '34.70.19.55', 'US', 'United States', 'Council Bluffs', 'Iowa', '', '41.2619', '-95.8608', 'USD', '2021-09-22 11:41:56', '2021-09-22 11:41:56'),
(55, '20.102.97.27', 'US', 'United States', 'Ashburn', 'Virginia', '20149', '39.0438', '-77.4874', 'USD', '2021-09-22 14:29:13', '2021-09-22 14:29:13'),
(56, '81.88.52.134', 'IT', 'Italy', 'Bergamo', 'Lombardy', '24126', '45.6719', '9.67719', 'EUR', '2021-09-22 14:31:45', '2021-09-22 14:31:45'),
(57, '185.3.235.206', 'DE', 'Germany', 'Halle', 'Saxony-Anhalt', '06118', '51.483', '11.9614', 'EUR', '2021-09-22 16:31:14', '2021-09-22 16:31:14'),
(58, '51.222.253.15', 'SG', 'Singapore', 'Singapore', '', '048581', '1.28141', '103.851', 'SGD', '2021-09-22 16:39:55', '2021-09-22 16:39:55'),
(59, '178.128.115.212', 'SG', 'Singapore', 'Singapore', '', '627753', '1.32123', '103.695', 'SGD', '2021-09-22 19:04:32', '2021-09-22 19:04:32'),
(60, '54.200.72.83', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-22 22:31:52', '2021-09-22 22:31:52'),
(61, '34.220.101.228', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-22 23:00:58', '2021-09-22 23:00:58'),
(62, '34.220.155.81', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-22 23:01:00', '2021-09-22 23:01:00'),
(63, '34.219.181.35', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-22 23:02:56', '2021-09-22 23:02:56'),
(64, '35.82.30.87', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-23 03:16:29', '2021-09-23 03:16:29'),
(65, '42.83.147.35', 'CN', 'China', 'Beijing', 'Beijing', '', '39.9042', '116.407', 'CNY', '2021-09-23 11:33:16', '2021-09-23 11:33:16'),
(66, '77.88.5.159', 'RU', 'Russia', 'Moscow', 'Moscow', '129343', '55.7483', '37.6171', 'RUB', '2021-09-23 12:51:08', '2021-09-23 12:51:08'),
(67, '77.88.5.159', 'RU', 'Russia', 'Moscow', 'Moscow', '129343', '55.7483', '37.6171', 'RUB', '2021-09-23 12:51:08', '2021-09-23 12:51:08'),
(68, '54.93.110.194', 'DE', 'Germany', 'Frankfurt am Main', 'Hesse', '60313', '50.1109', '8.68213', 'EUR', '2021-09-23 14:15:20', '2021-09-23 14:15:20'),
(69, '161.97.178.213', 'DE', 'Germany', 'Düsseldorf', 'North Rhine-Westphalia', '40599', '51.1878', '6.8607', 'EUR', '2021-09-23 20:08:58', '2021-09-23 20:08:58'),
(70, '35.162.161.71', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-23 22:01:10', '2021-09-23 22:01:10'),
(71, '34.220.88.186', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-23 22:01:27', '2021-09-23 22:01:27'),
(72, '52.12.23.21', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-23 22:03:13', '2021-09-23 22:03:13'),
(73, '34.212.120.192', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-23 22:05:10', '2021-09-23 22:05:10'),
(74, '35.163.4.110', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-23 22:07:55', '2021-09-23 22:07:55'),
(75, '77.88.5.245', 'RU', 'Russia', 'Moscow', 'Moscow', '101194', '55.734', '37.5883', 'RUB', '2021-09-23 23:43:19', '2021-09-23 23:43:19'),
(76, '93.158.161.61', 'RU', 'Russia', 'Moscow', 'Moscow', '129090', '55.7483', '37.6171', 'RUB', '2021-09-24 01:48:08', '2021-09-24 01:48:08'),
(77, '67.205.61.32', 'US', 'United States', 'Ashburn', 'Virginia', '20147', '39.018', '-77.539', 'USD', '2021-09-24 03:37:29', '2021-09-24 03:37:29'),
(78, '67.205.61.32', 'US', 'United States', 'Ashburn', 'Virginia', '20147', '39.018', '-77.539', 'USD', '2021-09-24 03:37:29', '2021-09-24 03:37:29'),
(79, '52.247.226.210', 'US', 'United States', 'Quincy', 'Washington', '98848', '47.233', '-119.852', 'USD', '2021-09-24 10:19:07', '2021-09-24 10:19:07'),
(80, '51.222.253.10', 'SG', 'Singapore', 'Singapore', '', '048581', '1.28141', '103.851', 'SGD', '2021-09-24 15:26:02', '2021-09-24 15:26:02'),
(81, '13.77.170.114', 'US', 'United States', 'Quincy', 'Washington', '98848', '47.233', '-119.852', 'USD', '2021-09-24 15:36:09', '2021-09-24 15:36:09'),
(82, '104.45.41.45', 'NL', 'Netherlands', 'Amsterdam', 'North Holland', '1011', '52.3667', '4.9', 'EUR', '2021-09-24 19:35:43', '2021-09-24 19:35:43'),
(83, '54.188.12.2', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-24 22:14:11', '2021-09-24 22:14:11'),
(84, '34.217.10.53', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-24 22:17:53', '2021-09-24 22:17:53'),
(85, '23.88.96.31', 'DE', 'Germany', 'Frankfurt am Main', 'Hesse', '60311', '50.1084', '8.6841', 'EUR', '2021-09-24 23:33:28', '2021-09-24 23:33:28'),
(86, '51.222.253.1', 'SG', 'Singapore', 'Singapore', '', '048581', '1.28141', '103.851', 'SGD', '2021-09-25 10:53:44', '2021-09-25 10:53:44'),
(87, '139.59.112.141', 'SG', 'Singapore', 'Singapore', '', '627753', '1.32123', '103.695', 'SGD', '2021-09-25 14:59:20', '2021-09-25 14:59:20'),
(88, '195.161.114.231', 'RU', 'Russia', 'Moscow', 'Moscow', '144700', '55.7558', '37.6173', 'RUB', '2021-09-25 21:24:52', '2021-09-25 21:24:52'),
(89, '35.158.134.237', 'DE', 'Germany', 'Frankfurt am Main', 'Hesse', '60313', '50.1109', '8.68213', 'EUR', '2021-09-25 21:46:48', '2021-09-25 21:46:48'),
(90, '34.218.74.178', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-25 22:06:52', '2021-09-25 22:06:52'),
(91, '52.38.45.132', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-25 22:06:54', '2021-09-25 22:06:54'),
(92, '54.202.189.231', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-25 22:07:53', '2021-09-25 22:07:53'),
(93, '52.43.164.228', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-25 22:25:51', '2021-09-25 22:25:51'),
(94, '51.104.242.232', 'GB', 'United Kingdom', 'London', 'England', 'EC3N', '51.5113', '-0.079212', 'GBP', '2021-09-25 23:44:35', '2021-09-25 23:44:35'),
(95, '172.104.59.131', 'SG', 'Singapore', 'Singapore', '', '', '1.35208', '103.82', 'SGD', '2021-09-26 01:42:16', '2021-09-26 01:42:16'),
(96, '35.84.142.1', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-26 02:19:04', '2021-09-26 02:19:04'),
(97, '130.255.166.51', 'SE', 'Sweden', 'Uppsala', 'Uppsala County', '741 74', '59.8586', '17.6389', 'SEK', '2021-09-26 07:24:07', '2021-09-26 07:24:07'),
(98, '130.255.166.122', 'SE', 'Sweden', 'Stockholm', 'Stockholm County', '100 05', '59.3293', '18.0686', 'SEK', '2021-09-26 07:24:08', '2021-09-26 07:24:08'),
(99, '154.13.48.35', 'US', 'United States', 'Los Angeles', 'California', '90009', '34.0522', '-118.244', 'USD', '2021-09-26 15:41:59', '2021-09-26 15:41:59'),
(100, '154.3.96.167', 'US', 'United States', 'Pasadena', 'California', '91107', '34.1687', '-118.089', 'USD', '2021-09-26 15:42:01', '2021-09-26 15:42:01'),
(101, '154.3.96.212', 'US', 'United States', 'Pasadena', 'California', '91107', '34.1687', '-118.089', 'USD', '2021-09-26 15:42:05', '2021-09-26 15:42:05'),
(102, '154.3.96.247', 'US', 'United States', 'Pasadena', 'California', '91107', '34.1687', '-118.089', 'USD', '2021-09-26 15:42:12', '2021-09-26 15:42:12'),
(103, '154.13.57.247', 'US', 'United States', 'New York', 'New York', '10004', '40.7055', '-74.0138', 'USD', '2021-09-26 15:42:14', '2021-09-26 15:42:14'),
(104, '134.122.46.215', 'CA', 'Canada', 'Toronto', 'Ontario', 'M5A', '43.6547', '-79.3623', 'CAD', '2021-09-26 16:15:35', '2021-09-26 16:15:35'),
(105, '161.35.106.236', 'US', 'United States', 'North Bergen', 'New Jersey', '07047', '40.793', '-74.0247', 'USD', '2021-09-26 17:31:49', '2021-09-26 17:31:49'),
(106, '54.162.141.56', 'US', 'United States', 'Ashburn', 'Virginia', '20149', '39.0438', '-77.4874', 'USD', '2021-09-26 18:08:59', '2021-09-26 18:08:59'),
(107, '34.218.249.226', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-26 22:28:34', '2021-09-26 22:28:34'),
(108, '54.212.217.50', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-26 22:29:29', '2021-09-26 22:29:29'),
(109, '34.220.19.238', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-26 22:29:44', '2021-09-26 22:29:44'),
(110, '18.236.87.133', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-26 22:31:05', '2021-09-26 22:31:05'),
(111, '103.28.120.38', 'BD', 'Bangladesh', 'Dhaka', 'Dhaka Division', '1208', '23.7801', '90.3739', 'BDT', '2021-09-27 03:46:10', '2021-09-27 03:46:10'),
(112, '66.249.73.37', 'US', 'United States', 'Mountain View', 'California', '94043', '37.422', '-122.084', 'USD', '2021-09-27 09:14:20', '2021-09-27 09:14:20'),
(113, '51.222.253.19', 'SG', 'Singapore', 'Singapore', '', '048581', '1.28141', '103.851', 'SGD', '2021-09-27 15:13:11', '2021-09-27 15:13:11'),
(114, '205.196.222.192', 'US', 'United States', 'Brea', 'California', '92821', '33.9165', '-117.9', 'USD', '2021-09-27 21:59:16', '2021-09-27 21:59:16'),
(115, '205.196.222.192', 'US', 'United States', 'Brea', 'California', '92821', '33.9165', '-117.9', 'USD', '2021-09-27 21:59:16', '2021-09-27 21:59:16'),
(116, '54.191.96.99', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-27 22:53:35', '2021-09-27 22:53:35'),
(117, '52.34.188.89', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-27 23:19:26', '2021-09-27 23:19:26'),
(118, '94.158.36.183', 'UA', 'Ukraine', 'Luhansk', 'Luhansk', '92352', '48.5922', '39.3073', 'UAH', '2021-09-28 01:02:58', '2021-09-28 01:02:58'),
(119, '104.236.120.31', 'US', 'United States', 'Clifton', 'New Jersey', '07014', '40.8364', '-74.1403', 'USD', '2021-09-28 04:52:19', '2021-09-28 04:52:19'),
(120, '104.236.120.31', 'US', 'United States', 'Clifton', 'New Jersey', '07014', '40.8364', '-74.1403', 'USD', '2021-09-28 04:52:19', '2021-09-28 04:52:19'),
(121, '109.237.103.38', 'GB', 'United Kingdom', 'London', 'England', 'W1B', '51.5074', '-0.127758', 'GBP', '2021-09-28 07:32:11', '2021-09-28 07:32:11'),
(122, '109.237.103.38', 'GB', 'United Kingdom', 'London', 'England', 'W1B', '51.5074', '-0.127758', 'GBP', '2021-09-28 07:32:11', '2021-09-28 07:32:11'),
(123, '181.215.204.132', 'US', 'United States', 'Reston', 'Virginia', '20190', '38.9609', '-77.3429', 'USD', '2021-09-28 10:06:47', '2021-09-28 10:06:47'),
(124, '45.124.84.40', 'VN', 'Vietnam', 'Phúc Lai', 'Tinh Bac Ninh', '', '20.9652', '105.79', 'VND', '2021-09-28 10:26:08', '2021-09-28 10:26:08'),
(125, '95.179.129.165', 'NL', 'Netherlands', 'Amsterdam', 'North Holland', '2031', '52.3891', '4.6563', 'EUR', '2021-09-28 16:09:56', '2021-09-28 16:09:56'),
(126, '93.158.161.57', 'RU', 'Russia', 'Moscow', 'Moscow', '129090', '55.7483', '37.6171', 'RUB', '2021-09-28 21:13:09', '2021-09-28 21:13:09'),
(127, '77.88.5.19', 'UA', 'Ukraine', 'Kyiv', 'Kyiv City', '01011', '50.4501', '30.5234', 'UAH', '2021-09-28 21:13:09', '2021-09-28 21:13:09'),
(128, '66.249.65.223', 'US', 'United States', 'Mountain View', 'California', '94043', '37.422', '-122.084', 'USD', '2021-09-28 22:05:08', '2021-09-28 22:05:08'),
(129, '66.249.65.197', 'US', 'United States', 'Mountain View', 'California', '94043', '37.422', '-122.084', 'USD', '2021-09-28 22:05:34', '2021-09-28 22:05:34'),
(130, '66.249.65.213', 'US', 'United States', 'Mountain View', 'California', '94043', '37.422', '-122.084', 'USD', '2021-09-28 22:05:35', '2021-09-28 22:05:35'),
(131, '54.212.86.31', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-28 22:16:35', '2021-09-28 22:16:35'),
(132, '34.218.208.180', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-28 22:40:48', '2021-09-28 22:40:48'),
(133, '34.216.126.203', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-28 22:40:53', '2021-09-28 22:40:53'),
(134, '193.23.3.40', 'NL', 'Netherlands', 'Amsterdam', 'North Holland', '1012', '52.3667', '4.89454', 'EUR', '2021-09-29 01:14:36', '2021-09-29 01:14:36'),
(135, '66.249.65.199', 'US', 'United States', 'Mountain View', 'California', '94043', '37.422', '-122.084', 'USD', '2021-09-29 01:50:10', '2021-09-29 01:50:10'),
(136, '66.249.65.201', 'US', 'United States', 'Mountain View', 'California', '94043', '37.422', '-122.084', 'USD', '2021-09-29 02:27:03', '2021-09-29 02:27:03'),
(137, '76.72.172.170', 'US', 'United States', 'Philadelphia', 'Pennsylvania', '19151', '39.9768', '-75.256', 'USD', '2021-09-29 04:41:48', '2021-09-29 04:41:48'),
(138, '66.249.65.211', 'US', 'United States', 'Mountain View', 'California', '94043', '37.422', '-122.084', 'USD', '2021-09-29 09:36:57', '2021-09-29 09:36:57'),
(139, '54.36.148.93', 'FR', 'France', 'Roubaix', 'Hauts-de-France', '59100', '50.6916', '3.20151', 'EUR', '2021-09-29 21:47:26', '2021-09-29 21:47:26'),
(140, '18.236.113.219', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-29 22:22:52', '2021-09-29 22:22:52'),
(141, '34.220.215.207', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-29 22:33:03', '2021-09-29 22:33:03'),
(142, '54.245.213.154', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2021-09-29 22:33:21', '2021-09-29 22:33:21'),
(143, '54.36.148.19', 'FR', 'France', 'Roubaix', 'Hauts-de-France', '59100', '50.6916', '3.20151', 'EUR', '2021-09-30 01:31:15', '2021-09-30 01:31:15'),
(144, '54.36.148.176', 'FR', 'France', 'Roubaix', 'Hauts-de-France', '59100', '50.6916', '3.20151', 'EUR', '2021-09-30 17:06:05', '2021-09-30 17:06:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animal_cats`
--
ALTER TABLE `animal_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animal_infos`
--
ALTER TABLE `animal_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_infos_farm_id_foreign` (`farm_id`),
  ADD KEY `animal_infos_community_cat_id_foreign` (`community_cat_id`),
  ADD KEY `animal_infos_community_id_foreign` (`community_id`),
  ADD KEY `animal_infos_animal_cat_id_foreign` (`animal_cat_id`),
  ADD KEY `animal_infos_animal_sub_cat_id_foreign` (`animal_sub_cat_id`),
  ADD KEY `animal_infos_user_id_foreign` (`user_id`),
  ADD KEY `animal_infos_animal_tag_index` (`animal_tag`);

--
-- Indexes for table `body_weights`
--
ALTER TABLE `body_weights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_weights_user_id_foreign` (`user_id`),
  ADD KEY `body_weights_animal_info_id_foreign` (`animal_info_id`);

--
-- Indexes for table `castration_records`
--
ALTER TABLE `castration_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `castration_records_user_id_foreign` (`user_id`),
  ADD KEY `castration_records_animal_info_id_foreign` (`animal_info_id`);

--
-- Indexes for table `clinical_signs`
--
ALTER TABLE `clinical_signs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `communities`
--
ALTER TABLE `communities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `communities_community_cat_id_foreign` (`community_cat_id`);

--
-- Indexes for table `community_cats`
--
ALTER TABLE `community_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dead_culleds`
--
ALTER TABLE `dead_culleds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dead_culleds_user_id_foreign` (`user_id`),
  ADD KEY `dead_culleds_animal_info_id_foreign` (`animal_info_id`);

--
-- Indexes for table `dead_reports`
--
ALTER TABLE `dead_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dead_reports_user_id_foreign` (`user_id`);

--
-- Indexes for table `dewormings`
--
ALTER TABLE `dewormings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dewormings_user_id_foreign` (`user_id`),
  ADD KEY `dewormings_animal_info_id_foreign` (`animal_info_id`);

--
-- Indexes for table `dippings`
--
ALTER TABLE `dippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dippings_user_id_foreign` (`user_id`),
  ADD KEY `dippings_animal_info_id_foreign` (`animal_info_id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disease_healths`
--
ALTER TABLE `disease_healths`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disease_healths_user_id_foreign` (`user_id`),
  ADD KEY `disease_healths_animal_info_id_foreign` (`animal_info_id`);

--
-- Indexes for table `disease_treatments`
--
ALTER TABLE `disease_treatments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disease_treatments_user_id_foreign` (`user_id`),
  ADD KEY `disease_treatments_animal_info_id_foreign` (`animal_info_id`),
  ADD KEY `disease_treatments_animal_cat_id_foreign` (`animal_cat_id`),
  ADD KEY `disease_treatments_animal_sub_cat_id_foreign` (`animal_sub_cat_id`),
  ADD KEY `disease_treatments_disease_id_foreign` (`disease_id`),
  ADD KEY `disease_treatments_clinical_sign_id_foreign` (`clinical_sign_id`);

--
-- Indexes for table `distributions`
--
ALTER TABLE `distributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `distributions_user_id_foreign` (`user_id`),
  ADD KEY `distributions_animal_info_id_foreign` (`animal_info_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `farms`
--
ALTER TABLE `farms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milk_productions`
--
ALTER TABLE `milk_productions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `milk_productions_user_id_foreign` (`user_id`),
  ADD KEY `milk_productions_animal_info_id_foreign` (`animal_info_id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `morphometrics`
--
ALTER TABLE `morphometrics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `morphometrics_user_id_foreign` (`user_id`),
  ADD KEY `morphometrics_animal_info_id_foreign` (`animal_info_id`);

--
-- Indexes for table `parasites`
--
ALTER TABLE `parasites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parasites_user_id_foreign` (`user_id`),
  ADD KEY `parasites_animal_info_id_foreign` (`animal_info_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reproductions`
--
ALTER TABLE `reproductions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reproductions_user_id_foreign` (`user_id`),
  ADD KEY `reproductions_animal_info_id_foreign` (`animal_info_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `semen_analyses`
--
ALTER TABLE `semen_analyses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semen_analyses_user_id_foreign` (`user_id`),
  ADD KEY `semen_analyses_animal_info_id_foreign` (`animal_info_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_user_id_foreign` (`user_id`),
  ADD KEY `services_buck_tag_index` (`buck_tag`),
  ADD KEY `services_doe_tag_index` (`doe_tag`);

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
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vaccinations`
--
ALTER TABLE `vaccinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vaccinations_user_id_foreign` (`user_id`),
  ADD KEY `vaccinations_animal_info_id_foreign` (`animal_info_id`);

--
-- Indexes for table `visitor_infos`
--
ALTER TABLE `visitor_infos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `animal_cats`
--
ALTER TABLE `animal_cats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `animal_infos`
--
ALTER TABLE `animal_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `body_weights`
--
ALTER TABLE `body_weights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `castration_records`
--
ALTER TABLE `castration_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clinical_signs`
--
ALTER TABLE `clinical_signs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `communities`
--
ALTER TABLE `communities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `community_cats`
--
ALTER TABLE `community_cats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dead_culleds`
--
ALTER TABLE `dead_culleds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dead_reports`
--
ALTER TABLE `dead_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dewormings`
--
ALTER TABLE `dewormings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dippings`
--
ALTER TABLE `dippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `disease_healths`
--
ALTER TABLE `disease_healths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disease_treatments`
--
ALTER TABLE `disease_treatments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distributions`
--
ALTER TABLE `distributions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farms`
--
ALTER TABLE `farms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `milk_productions`
--
ALTER TABLE `milk_productions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `morphometrics`
--
ALTER TABLE `morphometrics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parasites`
--
ALTER TABLE `parasites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reproductions`
--
ALTER TABLE `reproductions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semen_analyses`
--
ALTER TABLE `semen_analyses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vaccinations`
--
ALTER TABLE `vaccinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitor_infos`
--
ALTER TABLE `visitor_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal_infos`
--
ALTER TABLE `animal_infos`
  ADD CONSTRAINT `animal_infos_animal_cat_id_foreign` FOREIGN KEY (`animal_cat_id`) REFERENCES `animal_cats` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `animal_infos_animal_sub_cat_id_foreign` FOREIGN KEY (`animal_sub_cat_id`) REFERENCES `animal_cats` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `animal_infos_community_cat_id_foreign` FOREIGN KEY (`community_cat_id`) REFERENCES `community_cats` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `animal_infos_community_id_foreign` FOREIGN KEY (`community_id`) REFERENCES `communities` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `animal_infos_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `animal_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `body_weights`
--
ALTER TABLE `body_weights`
  ADD CONSTRAINT `body_weights_animal_info_id_foreign` FOREIGN KEY (`animal_info_id`) REFERENCES `animal_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `body_weights_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `castration_records`
--
ALTER TABLE `castration_records`
  ADD CONSTRAINT `castration_records_animal_info_id_foreign` FOREIGN KEY (`animal_info_id`) REFERENCES `animal_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `castration_records_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `communities`
--
ALTER TABLE `communities`
  ADD CONSTRAINT `communities_community_cat_id_foreign` FOREIGN KEY (`community_cat_id`) REFERENCES `community_cats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dead_culleds`
--
ALTER TABLE `dead_culleds`
  ADD CONSTRAINT `dead_culleds_animal_info_id_foreign` FOREIGN KEY (`animal_info_id`) REFERENCES `animal_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dead_culleds_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `dead_reports`
--
ALTER TABLE `dead_reports`
  ADD CONSTRAINT `dead_reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `dewormings`
--
ALTER TABLE `dewormings`
  ADD CONSTRAINT `dewormings_animal_info_id_foreign` FOREIGN KEY (`animal_info_id`) REFERENCES `animal_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dewormings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `dippings`
--
ALTER TABLE `dippings`
  ADD CONSTRAINT `dippings_animal_info_id_foreign` FOREIGN KEY (`animal_info_id`) REFERENCES `animal_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dippings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `disease_healths`
--
ALTER TABLE `disease_healths`
  ADD CONSTRAINT `disease_healths_animal_info_id_foreign` FOREIGN KEY (`animal_info_id`) REFERENCES `animal_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disease_healths_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `disease_treatments`
--
ALTER TABLE `disease_treatments`
  ADD CONSTRAINT `disease_treatments_animal_cat_id_foreign` FOREIGN KEY (`animal_cat_id`) REFERENCES `animal_cats` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `disease_treatments_animal_info_id_foreign` FOREIGN KEY (`animal_info_id`) REFERENCES `animal_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disease_treatments_animal_sub_cat_id_foreign` FOREIGN KEY (`animal_sub_cat_id`) REFERENCES `animal_cats` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `disease_treatments_clinical_sign_id_foreign` FOREIGN KEY (`clinical_sign_id`) REFERENCES `clinical_signs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disease_treatments_disease_id_foreign` FOREIGN KEY (`disease_id`) REFERENCES `diseases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disease_treatments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `distributions`
--
ALTER TABLE `distributions`
  ADD CONSTRAINT `distributions_animal_info_id_foreign` FOREIGN KEY (`animal_info_id`) REFERENCES `animal_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `distributions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_2` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `milk_productions`
--
ALTER TABLE `milk_productions`
  ADD CONSTRAINT `milk_productions_animal_info_id_foreign` FOREIGN KEY (`animal_info_id`) REFERENCES `animal_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `milk_productions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `morphometrics`
--
ALTER TABLE `morphometrics`
  ADD CONSTRAINT `morphometrics_animal_info_id_foreign` FOREIGN KEY (`animal_info_id`) REFERENCES `animal_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `morphometrics_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `parasites`
--
ALTER TABLE `parasites`
  ADD CONSTRAINT `parasites_animal_info_id_foreign` FOREIGN KEY (`animal_info_id`) REFERENCES `animal_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parasites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `reproductions`
--
ALTER TABLE `reproductions`
  ADD CONSTRAINT `reproductions_animal_info_id_foreign` FOREIGN KEY (`animal_info_id`) REFERENCES `animal_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reproductions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `semen_analyses`
--
ALTER TABLE `semen_analyses`
  ADD CONSTRAINT `semen_analyses_animal_info_id_foreign` FOREIGN KEY (`animal_info_id`) REFERENCES `animal_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `semen_analyses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD CONSTRAINT `upazilas_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vaccinations`
--
ALTER TABLE `vaccinations`
  ADD CONSTRAINT `vaccinations_animal_info_id_foreign` FOREIGN KEY (`animal_info_id`) REFERENCES `animal_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vaccinations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
