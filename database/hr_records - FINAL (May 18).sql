-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 18, 2025 at 03:43 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr_records`
--

-- --------------------------------------------------------

--
-- Table structure for table `201_files`
--

DROP TABLE IF EXISTS `201_files`;
CREATE TABLE IF NOT EXISTS `201_files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `folder_id` int NOT NULL,
  `filename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `folder_id` (`folder_id`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `201_files`
--

INSERT INTO `201_files` (`id`, `folder_id`, `filename`, `uploaded_at`) VALUES
(1, 1, 'ABRAHAM, ELLEN M..pdf', '2025-05-03 13:15:47'),
(2, 2, 'AGBING, MICKAELA M..pdf', '2025-05-03 13:15:53'),
(3, 3, 'AGUILA, LOTALIE V..pdf', '2025-05-03 13:16:17'),
(4, 4, 'ALFILER, EMMANUEL A..pdf', '2025-05-03 13:16:25'),
(5, 5, 'ANDAL, AILEEN L..pdf', '2025-05-03 13:16:30'),
(6, 6, 'ARIOLA, ALWIN E..pdf', '2025-05-03 13:16:37'),
(7, 7, 'ATIENZA, JEFFREY C..pdf', '2025-05-03 13:16:43'),
(8, 8, 'AVEO, MYLENE B..pdf', '2025-05-03 13:16:49'),
(9, 9, 'BABADILLA, ROWENA R..pdf', '2025-05-03 13:16:56'),
(10, 10, 'BAGIOEN, MARY CLAIRE S..pdf', '2025-05-03 13:17:02'),
(11, 11, 'BALITA, ANNABELLE S..pdf', '2025-05-03 13:17:10'),
(12, 12, 'BARROGO, AL JOHNRY S..pdf', '2025-05-03 13:17:16'),
(13, 13, 'BAUTISTA, CAMILLE GRACE O..pdf', '2025-05-03 13:17:22'),
(14, 14, 'BAUTISTA, MARIO D..pdf', '2025-05-03 13:17:50'),
(15, 15, 'BENEDICTO, RONALD A..pdf', '2025-05-03 13:17:56'),
(16, 16, 'BINAY, ARLYN O..pdf', '2025-05-03 13:18:02'),
(17, 17, 'BISCOCHO, MYLENE M..pdf', '2025-05-03 13:18:08'),
(18, 18, 'BRUCAL, RICHARD C..pdf', '2025-05-03 13:18:15'),
(19, 19, 'CABRERA, MARJORIE O..pdf', '2025-05-03 13:18:25'),
(20, 20, 'CALINISAN, LOURDES O..pdf', '2025-05-03 13:18:35'),
(21, 21, 'CARAAN, KARLA M..pdf', '2025-05-03 13:18:53'),
(22, 22, 'CARAAN, LENILYN C..pdf', '2025-05-03 13:19:08'),
(23, 23, 'CARINGAL, LILIAN E..pdf', '2025-05-03 13:19:19'),
(24, 24, 'CASTILLO, LORENA M..pdf', '2025-05-03 13:19:35'),
(25, 25, 'CASTILLO, MIAN S..pdf', '2025-05-03 13:19:44'),
(26, 26, 'CUEVAS, REA MAE C..pdf', '2025-05-03 13:19:55'),
(27, 27, 'DE LA PAZ, ROSARIE C..pdf', '2025-05-03 13:20:05'),
(28, 28, 'DE LEON, RODANTE G..pdf', '2025-05-03 13:20:14'),
(29, 29, 'DE OCAMPO, LEMUEL B..pdf', '2025-05-03 13:20:22'),
(30, 30, 'DEL MUNDO, HERWIN D..pdf', '2025-05-03 13:20:34'),
(31, 31, 'DEL MUNDO, RONALDO A..pdf', '2025-05-03 13:20:48'),
(32, 32, 'DIMAANO, FERDINAND L..pdf', '2025-05-03 13:20:59'),
(33, 33, 'DIMAYUGA, EVA P..pdf', '2025-05-03 13:21:09'),
(34, 34, 'ESMEDILLA, GLENN JOSHUA M..pdf', '2025-05-03 13:21:20'),
(35, 35, 'ESMEDILLA, RUEL A..pdf', '2025-05-03 13:21:31'),
(36, 36, 'FEDERICO, JELLO MAE I..pdf', '2025-05-03 13:21:41'),
(37, 37, 'FELIPE, CHRISTIAN M..pdf', '2025-05-03 13:21:52'),
(38, 38, 'FLORES, KIMBERLY M..pdf', '2025-05-03 13:22:01'),
(39, 39, 'FLORO, ARNEL D..pdf', '2025-05-03 13:22:10'),
(40, 40, 'GONZALES, ABEGAEL L..pdf', '2025-05-03 13:22:20'),
(41, 41, 'GONZALES, GILBERT O..pdf', '2025-05-03 13:22:28'),
(42, 42, 'GONZALES, MARK JOHN DANNYL D..pdf', '2025-05-03 13:22:44'),
(43, 43, 'GORDO, CAMILLE C..pdf', '2025-05-03 13:22:53'),
(44, 44, 'GUEVARRA, GRACE L..pdf', '2025-05-03 13:23:05'),
(45, 45, 'GUNDA, JUDIEL A..pdf', '2025-05-03 13:23:16'),
(46, 46, 'HERNANDEZ, CHRISTIAN JAMES C..pdf', '2025-05-03 13:23:28'),
(47, 47, 'HERNANDEZ, MARY ANN M..pdf', '2025-05-03 13:23:42'),
(48, 48, 'HERNANDEZ, NENET M..pdf', '2025-05-03 13:23:53'),
(49, 49, 'HIDALGO, LADY IVY T..pdf', '2025-05-03 13:24:04'),
(50, 50, 'ILAGAN, JANET M..pdf', '2025-05-03 13:24:15'),
(51, 51, 'ILAGAN, JAY M..pdf', '2025-05-03 13:24:24'),
(52, 52, 'ILAGAN, KRISNO O..pdf', '2025-05-03 13:24:37'),
(53, 53, 'ILAGAN, WILKIM D..pdf', '2025-05-03 13:24:46'),
(54, 54, 'INGALLA, SAMANTHA ABIGAIL M..pdf', '2025-05-03 13:25:00'),
(55, 55, 'KASILAG, KAREN U..pdf', '2025-05-03 13:25:10'),
(56, 56, 'KATIGBAK, REVELYN G..pdf', '2025-05-03 13:25:22'),
(57, 57, 'KATIMBANG, GELYN M..pdf', '2025-05-03 13:25:35'),
(58, 58, 'LACSON, JOEY G..pdf', '2025-05-03 13:25:44'),
(59, 59, 'LALAMUNAN, YVAN JAMES H..pdf', '2025-05-03 13:25:52'),
(60, 60, 'LAQUI, KAREN JOY A..pdf', '2025-05-03 13:26:04'),
(61, 61, 'LAQUI, MERLYN C..pdf', '2025-05-03 13:26:14'),
(62, 62, 'LESCANO, DEBBIE M..pdf', '2025-05-03 13:26:24'),
(63, 63, 'LEYESA, GERARD T..pdf', '2025-05-03 13:26:32'),
(64, 64, 'LEYESA, MA. TERESA T..pdf', '2025-05-03 13:26:44'),
(65, 65, 'LITAN, RHODA P..pdf', '2025-05-03 13:26:55'),
(66, 66, 'LOJO, NOREEN M..pdf', '2025-05-03 13:27:03'),
(67, 67, 'LUBI, MICHAEL L..pdf', '2025-05-03 13:27:13'),
(68, 68, 'LUBIS, HILDA L..pdf', '2025-05-03 13:27:24'),
(69, 69, 'MAGPANTAY, CONCEPCION M..pdf', '2025-05-03 13:27:46'),
(70, 70, 'MAGPANTAY, ERWIN L..pdf', '2025-05-03 13:27:55'),
(71, 72, 'MALABANAN, MIRASOL E..pdf', '2025-05-03 13:28:11'),
(72, 73, 'MALALUAN, EMILIA R..pdf', '2025-05-03 13:28:22'),
(73, 74, 'MANALO, ALVIN L..pdf', '2025-05-03 13:28:35'),
(74, 75, 'MANALO, ANGELITA L..pdf', '2025-05-03 13:28:50'),
(75, 76, 'MANALO, JOEL L..pdf', '2025-05-03 13:28:59'),
(76, 78, 'MANALO, NOVILITO M..pdf', '2025-05-03 13:29:20'),
(77, 79, 'MANALO, PRIMROSE B..pdf', '2025-05-03 13:29:42'),
(78, 80, 'MANALO, ROY A..pdf', '2025-05-03 13:30:17'),
(79, 81, 'MANDIGMA, ALAIZA L..pdf', '2025-05-03 13:30:26'),
(80, 82, 'MANIGBAS, SHERYL A..pdf', '2025-05-03 13:30:38'),
(81, 83, 'MANIGBAS, VICKY K..pdf', '2025-05-03 13:30:48'),
(82, 84, 'MARALIT, JOCELYN D..pdf', '2025-05-03 13:31:02'),
(83, 85, 'MARANAN, ALONA MAE M..pdf', '2025-05-03 13:31:11'),
(84, 86, 'MATANGUIHAN, EDWIN C..pdf', '2025-05-03 13:31:25'),
(85, 87, 'MATANGUIHAN, JAY V..pdf', '2025-05-03 13:31:51'),
(86, 88, 'MATANGUIHAN, MARIBEL L..pdf', '2025-05-03 13:32:00'),
(87, 89, 'MATIBAG, MARIBEL L..pdf', '2025-05-03 13:32:11'),
(88, 90, 'MAUHAY, MARILYN S..pdf', '2025-05-03 13:32:19'),
(89, 91, 'MENDOZA, ELAINE D..pdf', '2025-05-03 13:32:27'),
(90, 92, 'METRILLO, JAY A..pdf', '2025-05-03 13:32:38'),
(91, 93, 'NARIO, ANA ROSE M..pdf', '2025-05-03 13:32:45'),
(92, 94, 'OBTIAL, ANGELA JOYCE L..pdf', '2025-05-03 13:32:57'),
(93, 95, 'OCAMPO, GINA D..pdf', '2025-05-03 13:33:05'),
(94, 96, 'OLARTE, MICHAEL R..pdf', '2025-05-03 13:33:16'),
(95, 97, 'OLAVE, FE R..pdf', '2025-05-03 13:33:23'),
(96, 98, 'ORENSE, JONAS KING L..pdf', '2025-05-03 13:33:32'),
(97, 99, 'ORENSE, TRINA CORINNE E..pdf', '2025-05-03 13:33:41'),
(98, 100, 'OSEÑA, NILDA T..pdf', '2025-05-03 13:33:49'),
(99, 101, 'PALCUTO, LANY B..pdf', '2025-05-03 13:33:57'),
(100, 102, 'PALO, CHERYL P..pdf', '2025-05-03 13:34:06'),
(101, 103, 'PANGANIBAN, ELMIE H..pdf', '2025-05-03 13:34:23'),
(102, 104, 'PASIA, JENNY E..pdf', '2025-05-03 13:34:31'),
(103, 105, 'PURA, PRISCILA I..pdf', '2025-05-03 13:34:41'),
(104, 106, 'RABUSA, BABYLYN M..pdf', '2025-05-03 13:34:49'),
(105, 107, 'REYES, GIO H..pdf', '2025-05-03 13:34:58'),
(106, 108, 'REYES, HARLEY ALEXIS V..pdf', '2025-05-03 13:35:06'),
(107, 109, 'REYES, JOAN R..pdf', '2025-05-03 13:35:13'),
(108, 110, 'SADSAD, ELNIÑA JANE L..pdf', '2025-05-03 13:35:24'),
(109, 111, 'SAGUN, SHERLYN T..pdf', '2025-05-03 13:35:30'),
(110, 112, 'SARMIENTO, EDWIN T..pdf', '2025-05-03 13:35:38'),
(111, 113, 'SARMIENTO, MAE ANN M..pdf', '2025-05-03 13:35:47'),
(112, 114, 'SILVA, JONABETH N..pdf', '2025-05-03 13:35:55'),
(113, 115, 'SISCAR, MORENA S..pdf', '2025-05-03 13:36:05'),
(114, 116, 'TAPEL, FLORY I..pdf', '2025-05-03 13:36:13'),
(115, 117, 'TIBAYAN, KRIZA JOY R..pdf', '2025-05-03 13:36:20'),
(116, 118, 'TIPAN, ELSA B..pdf', '2025-05-03 13:36:27'),
(117, 119, 'TIPAN, GALLY D..pdf', '2025-05-03 13:36:34'),
(118, 120, 'TIPAN, LALAINE B..pdf', '2025-05-03 13:36:41'),
(119, 121, 'TIPAN, MARY ROSE L..pdf', '2025-05-03 13:36:48'),
(120, 122, 'TIPAN, NOIME T..pdf', '2025-05-03 13:36:56'),
(121, 123, 'TUMAMBING, OLIVER A..pdf', '2025-05-03 13:37:03'),
(122, 124, 'UMALI, MARA M..pdf', '2025-05-03 13:37:16'),
(123, 125, 'VELASQUEZ, GIAN MARCO R..pdf', '2025-05-03 13:37:24'),
(124, 126, 'VERGARA, GIAN LORENZ S..pdf', '2025-05-03 13:37:34'),
(125, 127, 'VERGARA, JOCELYN R..pdf', '2025-05-03 13:37:47'),
(126, 128, 'VERGARA, PEPITO D..pdf', '2025-05-03 13:37:57'),
(127, 77, 'MANALO, MELITON A..pdf', '2025-05-07 20:11:57'),
(128, 71, 'MALABAG, ROWELL B..pdf', '2025-05-07 20:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `201_folders`
--

DROP TABLE IF EXISTS `201_folders`;
CREATE TABLE IF NOT EXISTS `201_folders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parent_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `201_folders`
--

INSERT INTO `201_folders` (`id`, `name`, `parent_id`) VALUES
(1, 'ABRAHAM, ELLEN M', NULL),
(2, 'AGBING, MICKAELA M', NULL),
(3, 'AGUILA, LOTALIE V', NULL),
(4, 'ALFILER, EMMANUEL A', NULL),
(5, 'ANDAL, AILEEN L', NULL),
(6, 'ARIOLA, ALWIN E', NULL),
(7, 'ATIENZA, JEFFREY C', NULL),
(8, 'AVEO, MYLENE B', NULL),
(9, 'BABADILLA, ROWENA R', NULL),
(10, 'BAGIOEN, MARY CLAIRE S', NULL),
(11, 'BALITA, ANNABELLE S', NULL),
(12, 'BARROGO, AL JOHNRY S', NULL),
(13, 'BAUTISTA, CAMILLE GRACE O', NULL),
(14, 'BAUTISTA, MARIO D', NULL),
(15, 'BENEDICTO, RONALD A', NULL),
(16, 'BINAY, ARLYN O', NULL),
(17, 'BISCOCHO, MYLENE M', NULL),
(18, 'BRUCAL, RICHARD C', NULL),
(19, 'CABRERA, MARJORIE O', NULL),
(20, 'CALINISAN, LOURDES O', NULL),
(21, 'CARAAN, KARLA M', NULL),
(22, 'CARAAN, LENILYN C', NULL),
(23, 'CARINGAL, LILIAN E', NULL),
(24, 'CASTILLO, LORENA M', NULL),
(25, 'CASTILLO, MIAN S', NULL),
(26, 'CUEVAS, REA MAE C', NULL),
(27, 'DE LA PAZ, ROSARIE C', NULL),
(28, 'DE LEON, RODANTE G', NULL),
(29, 'DE OCAMPO, LEMUEL B', NULL),
(30, 'DEL MUNDO, HERWIN D', NULL),
(31, 'DEL MUNDO, RONALDO A', NULL),
(32, 'DIMAANO, FERDINAND L', NULL),
(33, 'DIMAYUGA, EVA P', NULL),
(34, 'ESMEDILLA, GLENN JOSHUA M', NULL),
(35, 'ESMEDILLA, RUEL A', NULL),
(36, 'FEDERICO, JELLO MAE I', NULL),
(37, 'FELIPE, CHRISTIAN M', NULL),
(38, 'FLORES, KIMBERLY M', NULL),
(39, 'FLORO, ARNEL D', NULL),
(40, 'GONZALES, ABEGAEL L', NULL),
(41, 'GONZALES, GILBERT O', NULL),
(42, 'GONZALES, MARK JOHN DANNYL D', NULL),
(43, 'GORDO, CAMILLE C', NULL),
(44, 'GUEVARRA, GRACE L', NULL),
(45, 'GUNDA, JUDIEL A', NULL),
(46, 'HERNANDEZ, CHRISTIAN JAMES C', NULL),
(47, 'HERNANDEZ, MARY ANN M', NULL),
(48, 'HERNANDEZ, NENET M', NULL),
(49, 'HIDALGO, LADY IVY T', NULL),
(50, 'ILAGAN, JANET M', NULL),
(51, 'ILAGAN, JAY M', NULL),
(52, 'ILAGAN, KRISNO O', NULL),
(53, 'ILAGAN, WILKIM D', NULL),
(54, 'INGALLA, SAMANTHA ABIGAIL M', NULL),
(55, 'KASILAG, KAREN U', NULL),
(56, 'KATIGBAK, REVELYN G', NULL),
(57, 'KATIMBANG, GELYN M', NULL),
(58, 'LACSON, JOEY G', NULL),
(59, 'LALAMUNAN, YVAN JAMES H', NULL),
(60, 'LAQUI, KAREN JOY A', NULL),
(61, 'LAQUI, MERLYN C', NULL),
(62, 'LESCANO, DEBBIE M', NULL),
(63, 'LEYESA, GERARD T', NULL),
(64, 'LEYESA, MA. TERESA T', NULL),
(65, 'LITAN, RHODA P', NULL),
(66, 'LOJO, NOREEN M', NULL),
(67, 'LUBI, MICHAEL L', NULL),
(68, 'LUBIS, HILDA L', NULL),
(69, 'MAGPANTAY, CONCEPCION M', NULL),
(70, 'MAGPANTAY, ERWIN L', NULL),
(71, 'MALABAG, ROWELL B', NULL),
(72, 'MALABANAN, MIRASOL E', NULL),
(73, 'MALALUAN, EMILIA R', NULL),
(74, 'MANALO, ALVIN L', NULL),
(75, 'MANALO, ANGELITA L', NULL),
(76, 'MANALO, JOEL L', NULL),
(77, 'MANALO, MELITON A', NULL),
(78, 'MANALO, NOVILITO M', NULL),
(79, 'MANALO, PRIMROSE B', NULL),
(80, 'MANALO, ROY A', NULL),
(81, 'MANDIGMA, ALAIZA L', NULL),
(82, 'MANIGBAS, SHERYL A', NULL),
(83, 'MANIGBAS, VICKY K', NULL),
(84, 'MARALIT, JOCELYN D', NULL),
(85, 'MARANAN, ALONA MAE M', NULL),
(86, 'MATANGUIHAN, EDWIN C', NULL),
(87, 'MATANGUIHAN, JAY V', NULL),
(88, 'MATANGUIHAN, MARIBEL L', NULL),
(89, 'MATIBAG, MARIBEL L', NULL),
(90, 'MAUHAY, MARILYN S', NULL),
(91, 'MENDOZA, ELAINE D', NULL),
(92, 'METRILLO, JAY A', NULL),
(93, 'NARIO, ANA ROSE M', NULL),
(94, 'OBTIAL, ANGELA JOYCE L', NULL),
(95, 'OCAMPO, GINA D', NULL),
(96, 'OLARTE, MICHAEL R', NULL),
(97, 'OLAVE, FE R', NULL),
(98, 'ORENSE, JONAS KING L', NULL),
(99, 'ORENSE, TRINA CORINNE E', NULL),
(100, 'OSEÑA, NILDA T', NULL),
(101, 'PALCUTO, LANY B', NULL),
(102, 'PALO, CHERYL P', NULL),
(103, 'PANGANIBAN, ELMIE H', NULL),
(104, 'PASIA, JENNY E', NULL),
(105, 'PURA, PRISCILA I', NULL),
(106, 'RABUSA, BABYLYN M', NULL),
(107, 'REYES, GIO H', NULL),
(108, 'REYES, HARLEY ALEXIS V', NULL),
(109, 'REYES, JOAN R', NULL),
(110, 'SADSAD, ELNIÑA JANE L', NULL),
(111, 'SAGUN, SHERLYN T', NULL),
(112, 'SARMIENTO, EDWIN T', NULL),
(113, 'SARMIENTO, MAE ANN M', NULL),
(114, 'SILVA, JONABETH N', NULL),
(115, 'SISCAR, MORENA S', NULL),
(116, 'TAPEL, FLORY I', NULL),
(117, 'TIBAYAN, KRIZA JOY R', NULL),
(118, 'TIPAN, ELSA B', NULL),
(119, 'TIPAN, GALLY D', NULL),
(120, 'TIPAN, LALAINE B', NULL),
(121, 'TIPAN, MARY ROSE L', NULL),
(122, 'TIPAN, NOIME T', NULL),
(123, 'TUMAMBING, OLIVER A', NULL),
(124, 'UMALI, MARA M', NULL),
(125, 'VELASQUEZ, GIAN MARCO R', NULL),
(126, 'VERGARA, GIAN LORENZ S', NULL),
(127, 'VERGARA, JOCELYN R', NULL),
(128, 'VERGARA, PEPITO D', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('superadmin','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reset_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `employee_no` (`employee_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `employee_no`, `username`, `password`, `email`, `role`, `created_at`, `updated_at`, `reset_token`, `reset_expires`) VALUES
(1, 'LDR001', 'admin', '$2y$10$wqvEaTtRI0nEDhPjE9c6yujXvGzJ/ySeu5/ULFfYSiO1MMjYbY1sS', 'gally.tipan@gmail.com', 'superadmin', '2025-05-18 03:26:55', '2025-05-18 03:26:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointed_cert_issuance`
--

DROP TABLE IF EXISTS `appointed_cert_issuance`;
CREATE TABLE IF NOT EXISTS `appointed_cert_issuance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sex` enum('Male','Female') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `start_date` date NOT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `office_appointed` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `pera` decimal(10,2) NOT NULL,
  `rta` decimal(10,2) NOT NULL,
  `clothing` decimal(10,2) NOT NULL,
  `mid_year_bonus` decimal(10,2) NOT NULL,
  `year_end_bonus` decimal(10,2) NOT NULL,
  `cash_gift` decimal(10,2) NOT NULL,
  `productivity_enhancement` decimal(10,2) NOT NULL,
  `date_issued` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `extra_salary` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elected_cert_issuance`
--

DROP TABLE IF EXISTS `elected_cert_issuance`;
CREATE TABLE IF NOT EXISTS `elected_cert_issuance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sex` enum('Male','Female') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `start_date` date NOT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `pera` decimal(10,2) NOT NULL,
  `rta` decimal(10,2) NOT NULL,
  `clothing` decimal(10,2) NOT NULL,
  `mid_year_bonus` decimal(10,2) NOT NULL,
  `year_end_bonus` decimal(10,2) NOT NULL,
  `cash_gift` decimal(10,2) NOT NULL,
  `productivity_enhancement` decimal(10,2) NOT NULL,
  `date_issued` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `extra_salary` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `employee_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `middlename` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name_extension` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `pob` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sex` enum('Male','Female') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `civil_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `blood_type` enum('A+','A-','B+','B-','AB+','AB-','O+','O-','Unknown') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Unknown',
  `mobile_no` bigint DEFAULT NULL,
  `email_address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `account_status` tinyint(1) NOT NULL DEFAULT '1',
  `hr_staff` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`employee_no`),
  UNIQUE KEY `email_address` (`email_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_no`, `firstname`, `middlename`, `lastname`, `name_extension`, `dob`, `pob`, `sex`, `civil_status`, `address`, `blood_type`, `mobile_no`, `email_address`, `image`, `designation`, `role`, `account_status`, `hr_staff`, `created_at`, `updated_at`) VALUES
('148', 'Gerard', 'Tibayan', 'Leyesa', '', '1995-11-02', 'Mataasnakahoy, Batangas', 'Male', 'Single', 'Bryg. Calingatan Mataasnakahoy, Batangas', 'A+', 9278669681, 'gerard.8k@gmail.com', NULL, 'Office of the Municipal Planning and Development Coordinator', 'Planning Officer II', 1, 0, '2025-05-08 17:48:01', '2025-05-08 17:48:01'),
('ACT-003', 'Rowena', 'Robles', 'Babadilla', '', '1982-07-30', 'Mataasnakahoy, Batangas', 'Female', 'Single', 'Bayorbor Mataasnakahoy, Batangas', 'B+', 9171598751, 'babadillawhena@yahoo.com', NULL, 'Office of the Municipal Accountant', 'Administrative Assistant I (Bookbinder III)', 1, 0, '2025-05-07 01:29:30', '2025-05-07 01:29:30'),
('ACT001', 'Lenilyn', 'Carpo', 'Caraan', '', '1985-03-18', 'Calasiao, Pangasinan', 'Female', 'Married', '419 Rafael Lubis St. 2A Mataasnakahoy, Batangas', 'A+', 9258817882, 'carpo_lenilyn@yahoo.com', NULL, 'Office of the Municipal Accountant', 'Mun. Gov\'t Dept. Head ( Municipal Accountant) ', 1, 0, '2025-05-07 16:03:15', '2025-05-07 16:03:15'),
('ACT002', 'Mylene', 'Matanguihan', 'Biscocho', '', '1976-02-18', 'FAB Hospital, Lipa City', 'Female', 'Married', 'Purok 4 Brgy. Upa Mataasnakahoy, Batangas', 'B+', 9237179997, 'biscocho_mylene@yahoo.com', NULL, 'Office of the Municipal Accounting', 'Administrative Officer IV (Management and Audit Analyst II)', 1, 0, '2025-05-07 12:37:37', '2025-05-07 12:37:37'),
('ACT004', 'Mylene', 'Binay', 'Aveo', '', '1983-08-28', 'Mataasnakahoy, Batangas', 'Female', 'Married', '094 Rizal St. Longos Mataasnakahoy, Batangas', 'O+', 9308684595, 'mylezaveo@gmail.com', NULL, 'Office of the Municipal Accounting', 'Administrative Aide III (Utility Worker II)', 1, 0, '2025-05-07 01:19:15', '2025-05-13 06:54:58'),
('ACT005', 'NILDA', 'TISBE', 'OSEÑA', '', '0972-11-12', 'MATAASNAKAHOY, BATANGAS', 'Female', 'Single', 'BRGY. IV, MATAASNAKAHOY, BATANGAS', 'O+', 9483102571, 'nildaosena1@gmail.com', NULL, 'Mayor\'s Office - Office of the Municipal General Services Officer', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-10 00:41:50', '2025-05-13 07:03:47'),
('AGR001', 'Aileen', 'Leyesa', 'Andal', '', '1976-09-30', 'Mataasnakahoy', 'Female', 'Married', 'Calingatan Mataasnakahoy, Batangas', 'A+', 9171890486, 'aileenleyesaandal@gmail.com', NULL, 'Office of the Municipal Agriculture ', 'Municipal Government Department Head (Municipal Agriculturist SG-24)', 1, 0, '2025-05-06 16:21:19', '2025-05-06 16:21:19'),
('AGR002', 'JAY', 'VERGARA', 'MATANGUIHAN', '', '1978-12-31', 'MATAASNAKAHOY', 'Male', 'Married', 'UPA, MATAASNAKAHOY, BATANGAS', 'AB+', 9759096259, 'NA2@gmail.com', NULL, 'Office of the Municipal Agriculture', 'Administrative Aide VI (labor Foreman)', 1, 0, '2025-05-08 22:36:04', '2025-05-08 22:36:04'),
('AGR004', 'EDWIN', 'TIBAYAN', 'SARMIENTO', '', '1968-03-25', 'MATAASNAKAHOY', 'Male', 'Married', 'BRGY. III, MATAASNAKAHOY, BATANGAS', 'O+', 9397621083, 'NA5@gmail.com', NULL, 'Office of the Municipal Agriculture', 'Farm Foreman', 1, 0, '2025-05-09 16:47:14', '2025-05-09 16:47:14'),
('AGR005', 'RHODA', 'PAGARAN', 'LITAN', '', '1971-08-28', 'TUPI SOUTH COTABATO', 'Female', 'Married', 'CRISANTA HOMES SUBDIVISION, CALINGATAN, MATAAS NA KAHOY, BATANGAS', 'A+', 9202539331, 'rhoda_litann46@yahoo.com', NULL, 'Office of the Municipal Engineer', 'Administrative Assistant I', 1, 0, '2025-05-07 11:19:49', '2025-05-07 11:19:49'),
('AGR008', 'Christian James', 'Castillo', 'Hernandez', '', '1998-10-10', 'Bubuyan, Mataasnakahoy, Batangas', 'Male', 'Single', '024 Brgy. Bubuyan Mataasnakahoy, Batangas', 'B+', 9122711811, 'cjzaihernandez@gmail.com', NULL, 'Office of the Municipal Agriculture', 'Administrative Officer I', 1, 0, '2025-05-08 16:12:04', '2025-05-13 06:56:06'),
('AGR013', 'Joey', 'Gonzales', 'Lacson', '', '1984-03-08', 'Mataasnakahoy', 'Male', 'Single', 'Brgy. Nangkaan Mataasnakahoy, Batangas', 'O+', 9396150670, 'lacsonjoey8@gmail.com', NULL, 'Office of the Municipal Accounting', 'Administrative Aide I (Utility Worker I) ', 1, 0, '2025-05-08 17:23:32', '2025-05-08 17:23:32'),
('AGR023', 'MICHAEL', 'LUBI', 'LUBI', '', '1978-09-29', 'NANGKAAN, MATAASNAKAHOY, BATANGAS', 'Male', 'Married', '109, PUROK 2, NANGKAAN, MATAASNAKAHOY, BATANGAS', 'B+', 9476212325, 'lubi9790@gmail.com', NULL, 'Office of the Municipal Accounting', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-09 23:26:44', '2025-05-13 06:54:48'),
('AGR028', 'SHERYL', 'ARMSTRONG', 'MANIGBAS', '', '1979-02-08', 'PIODURAN, ALBAY', 'Female', 'Married', 'CARMA ST., BRGY. II,  MATAASNAKAHOY, BATANGAS', 'A+', 9217918635, 'sherylm321@gmail.com', NULL, 'Office of the Municipal Agriculture', 'Administrative Aide III (Clerk I)', 1, 0, '2025-05-10 00:00:43', '2025-05-13 06:55:58'),
('AGR031', 'Judiel', 'Aguilera', 'Gunda', '', '1997-09-16', 'Candelaria, Quezon', 'Male', 'Single', 'Sitio Lansonesan Sta. Catalina Norte Brgy. Sta Catalina, Norte Candelaria Quezon', 'O+', 9455684438, 'judielgunda16@gmail.com', NULL, 'Office of the Municipal Agriculture', 'Agricultural Technician II', 1, 0, '2025-05-13 01:44:10', '2025-05-13 01:44:10'),
('AGRI007', 'CHERYL', 'PRESTO', 'PALO', '', '1980-05-16', 'PUERTO PRINCESA, PALAWAN', 'Female', 'Married', 'F.SILVA, CALINGATAN, MATAASNAKAHOY, BATANGAS', 'A+', 9068149427, 'chechepresto@yahoo.com', NULL, 'Office of the Municipal Agriculture', 'Administrative Aide VI (Utility Foreman)', 1, 0, '2025-05-09 11:36:53', '2025-05-09 11:36:53'),
('ASS001', 'Ruel', 'Acar', 'Esmedilla', '', '1976-06-19', 'Mataasnakahoy, Batangas', 'Male', 'Married', 'Purok 3 Brgy. Bayorbor Mataasnakahoy, Batangas', 'O+', 9369426634, 'ruel14esmedilla@gmail.com', NULL, 'Office of the Municipal Assesor', 'Municipal Government Department Head (Municipal Assessor)', 1, 0, '2025-05-13 01:32:30', '2025-05-13 01:32:30'),
('ASS004', 'ROY', 'ABARINTOS', 'MANALO', '', '1977-02-03', 'MATAASNAKAHOY, BATANGAS', 'Male', 'Married', 'CALINGATAN, MATAASNAKAHOY, BATANGAS', 'O+', 9272322274, 'roprinicar@yahoo.com', NULL, 'Office of the Municipal Assessor', 'Administrative Assistant I (Bookbinder III)', 1, 0, '2025-05-08 17:22:12', '2025-05-08 17:22:12'),
('ASS007', 'Jeffrey', 'Cuarto', 'Atienza', '', '1990-05-18', 'Mataasnakahoy, Batangas', 'Male', 'Single', '63 Lobrin St. Purok IV Upa Mataasnakahoy, Batangas', 'A+', 9108558507, 'jeffreyatienzac@gmail.com', NULL, 'Office of the Municipal Assessor ', 'Administrative Aide I (Utility Worker I) ', 1, 0, '2025-05-06 16:44:31', '2025-05-06 16:44:31'),
('ASS010', 'Mark John Dannyl', 'De Leon', 'Gonzales', '', '1995-11-29', 'Mataasnakahoy, Batangas', 'Male', 'Single', 'Brgy. Kinalaglagan Mataasnakahoy, Batangas', 'B+', 9758321502, 'gonzalesdannyl669@gmail.com', NULL, 'Office of the Municipal Disaster Risk Reduction and Management', 'Administrative Aide III (Driver I) ', 1, 0, '2025-05-08 15:53:07', '2025-05-08 15:53:07'),
('ASS012', 'BABYLYN', 'MASANGKAY', 'RABUSA', '', '1986-02-14', 'PANGAO, LIPA CITY', 'Female', 'Married', 'PUROK 1, CALINGATAN, MATAASNAKAHOY, BATANGAS', 'A+', 9685911890, 'ayeshazyril.azr@gmail.com', NULL, 'Office of the Municipal Assessor', 'AdministratIve Aide I (Utility worker I)', 1, 0, '2025-05-09 15:19:39', '2025-05-09 15:19:39'),
('ASS013', 'ELNIÑA JANE', 'LUMBERA', 'SADSAD', '', '1997-06-03', 'MATAASNAKAHOY, BATANGAS', 'Female', 'Single', 'PUROK 5, UPA, MATAASNAKAHOY, BATANGAS', 'B+', 9996599179, 'ejanelsadsad@gmail.com', NULL, 'Office of the Municipal Assessor', 'Administrative Assistant II (Clerk IV)', 1, 0, '2025-05-09 16:01:12', '2025-05-09 16:01:12'),
('EMP006', 'Lenard Joseph', 'V.', 'Ariola', '', '1993-11-15', 'Iloilo City', 'Male', 'Single', '303 Jaro St., Iloilo', 'A-', 9691234567, 'elena.torres@email.com', 'Lenard.png', 'HR Coordinator', 'Job Order', 1, 1, '2025-02-19 06:09:03', '2025-04-22 21:50:52'),
('EMP008', 'Isabel', 'T.', 'Mendoza', '', '1998-02-25', 'Laguna', 'Female', 'Single', '505 Calamba Rd., Laguna', 'AB-', 9891234567, 'isabel.mendoza@email.com', NULL, '', '', 1, 0, '2025-02-19 06:09:03', '2025-04-22 21:50:52'),
('EMP009', 'Miguel', 'R.', 'Domingo', '', '1991-08-09', 'Pampanga', 'Male', 'Married', '606 Angeles St., Pampanga', 'O+', 9991234567, 'miguel.domingo@email.com', NULL, '', '', 1, 0, '2025-02-19 06:09:03', '2025-04-22 21:50:52'),
('GSO-002', 'SHERLYN', 'TAPAY', 'SAGUN', '', '1980-03-09', 'MATAASNAKAHOY, BATANGAS', 'Female', 'Married', '333, LONGOS ST, MACALINTAL SUBD., BRGY.III, MATAASNAKAHOY, BATANGAS', 'O+', 9171192604, 'lovely_lhen03@yahoo.com', NULL, 'Office of the Mayor', 'Labor and Employment Officer I', 1, 0, '2025-05-09 16:39:33', '2025-05-09 16:39:33'),
('GSO-006', 'Eva', 'Precilla', 'Dimayuga', '', '1977-04-25', 'Mataasnakahoy, Batangas', 'Female', 'Married', 'Purok II Sitio Parang Brgy II Mataasnakahoy, Batangas', 'B+', 9173113215, 'gimayugaeva46@gmail.com', NULL, 'Office of the Mayor-Office of the General Services Officer', 'Administrative Aide III (Utility Worker II)', 1, 0, '2025-05-08 15:15:21', '2025-05-08 15:15:21'),
('GSO001', 'EMILIA', 'REYES', 'MALALUAN', '', '1968-11-18', 'SAMPALOC, MANILA', 'Female', 'Single', 'BRGY. I, MATAASNAKAHOY, BATANGAS', 'B+', 9175491663, 'supermelowtouch@yahoo.com', NULL, 'Mayor\'s Office - Office of the Municipal General Services Officer', 'Municipal Government Assistant Department Head', 1, 0, '2025-05-09 23:43:09', '2025-05-13 07:02:13'),
('GSO006', 'MAE ANN', 'MALIBIRAN', 'SARMIENTO', '', '1999-02-26', 'MATAASNAKAHOY, BATANGAS', 'Female', 'Single', '257, PUROK 7, LUMANG LIPA, MATAASNAKAHOY, BATANGAS', 'O+', 9266096076, 'seansarmientoM@gmail.com', NULL, 'Office of the Mayor- Office of the General Services Officer', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-09 17:19:37', '2025-05-13 07:07:10'),
('GSO008', 'Christian', 'Manalo', 'Felipe', '', '1996-05-01', 'Mataasnakahoy', 'Male', 'Single', '242 Nangkaan Mataasnakahoy, Batangas', 'B+', 9567222425, 'felipechristian.23@gmail.com', NULL, 'Mayors Office of the Municipal General Services Officer', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-08 15:23:13', '2025-05-08 15:23:13'),
('HRM-003', 'LANY', 'BUNYI', 'PALCUTO', '', '1965-08-28', 'ORIENTAL MINDORO', 'Female', 'Married', 'CRISANTA HOMES SUBDIVISION, CALINGATAN, MATAASNAKAHOY, BATANGAS', 'O+', 9171852210, 'lanybpalcuto@yahoo.com', NULL, 'Office of the Municipal Health', 'Dental Aide ', 1, 0, '2025-05-09 11:21:49', '2025-05-09 11:21:49'),
('HRM002', 'NOIME', 'TAPAT', 'TIPAN', '', '1972-02-05', 'LIPA CITY', 'Female', 'Widowed', '#200, BRGY. II, MATAASNAKAHOY, BATANGAS', 'B+', 9206311387, 'noimetipan@yahoo.com.ph', 'Noims.png', 'Office of the Municipal Human Resource Management', 'Administrative Officer IV (Human Resource Management Officer II)', 1, 1, '2025-05-09 22:25:00', '2025-05-09 22:25:00'),
('HRM004', 'Gelyn', 'Matibag', 'Katimbang', '', '1981-05-28', 'Dita, Cuenca, Batangas', 'Female', 'Married', 'Brgy. Dita Cuenca, Batangas', 'B+', 9772866201, 'gmatibag10581@yahoo.com', 'Gelyn.png', 'Office of the Municipal Human Resource Management ', 'Administrative Officer II ( Human Resource Management Officer I)', 1, 1, '2025-02-19 06:09:03', '2025-05-11 05:48:08'),
('HRM005', 'ELMIE', 'HERNANDEZ', 'PANAGANIBAN', '', '1976-12-02', 'MATAASNAKAHOY, BATANGAS', 'Female', 'Married', 'PUROK 3, BUBUYAN, MATAASNAKAHOY, BATANGAS', 'O+', 9293470507, 'elmiehp@gmail.com', 'Elmie.png', 'Office of the Municipal Human Resource Management', 'Administrative Aide VI (Clerk III)', 1, 1, '2025-05-09 11:46:56', '2025-05-10 16:00:00'),
('HRM007', 'Marjorie', 'Orense', 'Cabrera', '', '1999-08-23', 'Nangkaan Mataasnakahoy, Batangas', 'Female', 'Single', '155 Purok 3 Nangkaan Mataasnakahoy, Batangas', 'A-', 9474077036, 'marjoriecabrera2399@gmail.com', 'Marjorie.png', 'Office of the Municipal Human Resource Management', 'Administrative Aide IV ( Human Resource Management Aide)', 1, 1, '2025-02-19 06:09:03', '2025-05-13 07:14:43'),
('LDR001', 'GALLY', 'DIMAYUGA', 'TIPAN', '', '1990-06-28', 'CUENCA, BATANGAS', 'Male', 'Single', 'CUENCA, BATANGAS', 'A+', 9175633720, 'gally.tipan@gmail.com', 'Gally.png', 'Office of the Municipal Human Resource Management', 'Municipal Government Department Head (Municipal Human Resource Management Officer)', 1, 1, '2025-02-16 22:33:54', '2025-05-18 03:16:29'),
('LDR002', 'KRIZA JOY', 'RECIO', 'TIBAYAN', '', '1991-03-25', 'MATAASNAKAHOY, BATANGAS', 'Female', 'Married', 'KINALAGLAGAN, MATAASNAKAHOY, BATANGAS', 'B+', 9171081992, 'azirk_17@yahoo.com', NULL, 'Office of the Mayor', 'Youth Development Assistant II', 1, 0, '2025-05-09 17:47:48', '2025-05-13 06:51:47'),
('LDR003', 'Ronald', 'Acar', 'Benedicto', '', '1978-10-26', 'Mataasnakahoy, Batangas', 'Male', 'Married', '001 Zone 1 Brgy. Bayorbor Mataasnakahoy, Batangas', 'B+', 9776825025, 'ronaldbenedicto26@gmail.com', NULL, 'Office of the Local Disaster Risk Reduction and Management', 'Administrative Aide VI (Utility Foreman) ', 1, 0, '2025-05-13 00:24:56', '2025-05-13 06:52:04'),
('LDR008', 'Gilbert', 'Oseña', 'Gonzales', '', '1976-10-14', 'Batangas City', 'Male', 'Married', '19 Sarmiento St. Brgy III Mataasnakahoy, Batangas', 'O+', 9770923216, 'blank08162005@gmail.com', 'Gilbert.png', 'Office of the Local Disaster Risk Reduction and Management', 'Administrative Aide I', 1, 1, '2025-02-19 06:09:03', '2025-05-13 07:14:59'),
('LDR010', 'Ronaldo', 'Albuñan', 'Del Mundo', '', '1973-12-02', 'Sariaya, Quezon', 'Male', 'Married', '68 Purok 1 Brgy 3 Mataasnakahoy, Batangas', 'AB+', 9565995790, 'delmundoronaldo04@gmail.com', NULL, 'Office of the Mayor- Office of the Business Permits and Licensing Officer', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-13 01:22:46', '2025-05-13 01:22:46'),
('LDR014', 'JONAS KING', 'LUBI', 'ORENSE', '', '1997-11-09', 'MATAASNAKAHOY, BATANGAS', 'Male', 'Single', '051, PUROK 1, NANGKAAN, MATAASNAKAHOY, BATANGAS', 'O+', 9652814876, 'jkorense@gmail.com', NULL, 'Mayor\'s Office - Office of the Municipal Disaster Risk Reduction and Management', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-09 11:01:11', '2025-05-13 07:21:06'),
('LDR024', 'ALONA MAE', 'MANALO', 'MARANAN', '', '1998-08-10', 'MATAASNAKAHOY, BATANGAS', 'Female', 'Single', '60, SAN SEBASTIAN, MATAASNAKAHOY, BATANGAS', 'O+', 9363843868, 'alonamaran@yahoo.com', NULL, 'Mayor\'s Office - Office of the Municipal Disaster Risk Reduction and Management', 'Administrative Aide III (Clerk I)', 1, 0, '2025-05-10 00:08:05', '2025-05-13 07:02:52'),
('MBO-003', 'VICKY', 'KATIMBANG', 'MANIGBAS', '', '1974-12-21', 'BRGY. I, MATAASNAKAHOY, BATANGAS', 'Female', 'Single', 'BRGY. I, MATAASNAKAHOY, BATANGAS', 'O+', 9171381847, 'vkmanigbas@yahoo.com', NULL, 'Office of the Municipal Budget', 'Administrative Officer II (Budget Officer I)', 1, 0, '2025-05-08 17:32:59', '2025-05-08 17:32:59'),
('MBO001', 'Rosarie', 'Decastro', 'Delapaz', '', '1964-10-15', 'Lipa City', 'Female', 'Married', 'Banaybanay Concepcion Lipa City, Batangas', 'O+', 9178578111, 'rhose_mark@yahoo.com', NULL, 'Office of the Municipal Budget', 'Municipal Government Department Head (Mun. Budget)', 1, 0, '2025-05-08 14:36:34', '2025-05-13 07:01:22'),
('MBO004', 'MARY ROSE', 'LESCANO', 'TIPAN', '', '1988-12-20', 'LIPA CITY, BATANGAS', 'Female', 'Married', '#144, ZONE 1, BUBUYAN, MATAASNAKAHOY, BATANGAS', 'B+', 9764771424, 'mhadelrose@gmail.com', NULL, 'Office of the Municipal Budget', 'Administrative Assistant I (Bookbinder III)', 1, 0, '2025-05-09 22:18:05', '2025-05-09 22:18:05'),
('MBO006', 'Rea Mae', 'Cardiño', 'Cuevas', '', '1997-02-16', 'Lipa City, Batangas', 'Female', 'Single', '83 Purok 4 Brgy. Calingatan Mataasnakahoy, Batangas', 'AB+', 9563902379, 'rm.cuevas16@gmail.com', NULL, 'Office of the Municipal Budget', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-13 01:12:33', '2025-05-13 01:12:33'),
('MBO_003', 'ELAINE', 'DESPOJO', 'MENDOZA', '', '1994-02-17', 'MATAASNAKAHOY', 'Female', 'Single', 'BRGY. I, MATAASNAKAHOY, BATANGAS', 'O+', 9171239593, 'mendozaelaine1726@yahoo.com', NULL, 'Office of the Municipal Budget', 'Administrative Office I (Records Officer I)', 1, 0, '2025-05-09 00:08:48', '2025-05-09 00:08:48'),
('MCR-001', 'LALAINE', 'BATHAN', 'TIPAN', '', '1964-02-19', 'MATAASNAKAHOY, BATANGAS', 'Female', 'Married', 'CALINGATAN, MATAASNAKAHOY, BATANGAS', 'O+', 9173291964, 'tipanlalaine2@gmail.com', NULL, 'Office of the Municipal Civil Registry', 'Municipal Civil Registrar', 1, 0, '2025-05-09 18:14:36', '2025-05-09 18:14:36'),
('MCR002', 'PRIMROSE', 'BAYANI', 'MANALO', '', '1976-03-15', 'MATAASNAKAHOY, BATANGAS', 'Female', 'Married', 'CALINGATAN, MATAASNAKAHOY, BATANGAS', 'B+', 9669477873, 'NA1@gmail.com', NULL, 'Office of the Municipal Civil Registry', 'Registration Officer II', 1, 0, '2025-05-08 17:14:22', '2025-05-08 17:14:22'),
('MCR003', 'ANA ROSE', 'MENDOZA', 'NARIO', '', '1974-05-16', 'DON CARLOS, BUKIDNON', 'Female', 'Married', 'CALINGATAN, MATAASNAKAHOY, BATANGAS', 'O+', 9175636887, 'narioana26@yahoo.com', NULL, 'Office of the Municipal Civil Registry', 'Administrative Officer II (Public Relations Officer I)', 1, 0, '2025-05-09 10:32:39', '2025-05-13 07:01:07'),
('MCR004', 'ELSA', 'BACEA', 'TIPAN', '', '1980-08-04', 'PANAY, CAPIZ', 'Female', 'Married', 'NANGKAAN, MATAASNAKAHOY, BATANGAS', 'O+', 9384197916, 'aliyahanthony054@gmail.com', NULL, 'Office of the Municipal Civil Registry', 'Administrative Assistant I (Bookbinder III)', 1, 0, '2025-05-09 17:53:49', '2025-05-09 17:53:49'),
('MCRO05', 'MARA', 'MANALO', 'UMALI', '', '1996-09-12', 'MATAASNAKAHOY, BATANGAS', 'Female', 'Single', '#244, LUMANG LIPA, MATAASNAKAHOY, BATANGAS', 'B+', 9157018196, 'umalimara70@gmail.com', NULL, 'Office of the Municipal Civil Registry', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-09 22:46:56', '2025-05-09 22:46:56'),
('MEO001', 'Nenet', 'Matanguihan', 'Hernandez', '', '1959-12-28', 'Mataasnakahoy', 'Female', 'Married', 'Rizal St. Brgy. II-A Mataasnakahoy, Batangas', 'B+', 9778320407, 'nenet_h@yahoo.com', NULL, 'Office of the Municipal Engineer', 'Municipal Engineer - SG24', 1, 0, '2025-05-08 16:26:45', '2025-05-08 16:26:45'),
('MEO002', 'MARILYN', 'SUBOL', 'MAUHAY', '', '1962-10-20', 'MATAASNAKAHOY', 'Female', 'Married', '178, LUBIS, BRGY.IV, MATAASNAKAHOY, BATANGAS', 'O+', 9175163032, 'msmauhay55@gmail.com', NULL, 'Office of the Municipal Engineering', 'Engineer II', 1, 0, '2025-05-10 00:15:41', '2025-05-13 07:03:05'),
('MEO003', 'Grace', 'Lobrin', 'Guevarra', '', '1961-12-05', 'Mataasnakahoy, Batangas', 'Female', 'Married', 'Brgy. II-A Mataasnakahoy, Batangas', 'O+', 9297422844, 'none@gmail.com', NULL, 'Office of the Municipal Engineering', 'Engineering Assistant', 1, 0, '2025-05-08 16:04:29', '2025-05-08 16:04:29'),
('MEO005', 'MELITON', 'AGOJO', 'MANALO', '', '1962-03-10', 'MATAASNAKAHOY', 'Male', 'Married', 'NANGKAAN, MATAASNAKAHOY, BATANGAS', 'AB+', 9532251492, 'NA@gmail.com', NULL, 'Office of the Municipal Engineering', 'Administrative Assistant I (Reproduction Machine Operator III)', 1, 0, '2025-05-08 17:02:32', '2025-05-08 17:02:32'),
('MEO008', 'Wilkim', 'De Roxas', 'Ilagan', '', '1994-05-02', 'Mataasnakahoy', 'Male', 'Married', '040 Sarmiento St. Mataasnakahoy, Batangas', 'B+', 9121023527, 'kimzhel12@gmail.com', NULL, 'Office of the Municipal Engineering', 'Administrative Aide III (Clerk I) ', 1, 0, '2025-05-08 17:04:26', '2025-05-08 17:04:26'),
('MEO012', 'Richard', 'Cawaring', 'Brucal', '', '1985-04-28', 'Brgy. Upa Mataasnakahoy, Batangas', 'Male', 'Married', 'Ariola St. Brgy. Upa Mataasnakahoy, Batangas', 'O+', 9125840695, 'richardbrucal19@yahoo.com.ph', NULL, 'Office of the Municipal Engineering ', 'Administrative Aide I (Utility WorkerI)', 1, 0, '2025-05-13 00:30:57', '2025-05-13 06:52:43'),
('MEO03', 'Samantha Abigail', 'Manalo', 'Ingalla', '', '1998-03-14', 'Sta. Cruz, Manila', 'Female', 'Single', 'BLK  3 Lot 10, Crisanta Homes Subd. Brgy. Calingatan Mataasnakahoy, Batangas', 'O+', 9354615130, 'samantha.m.ingalla@gmail.com', NULL, 'Office of the Municipal Engineering ', 'Engineer I ', 1, 0, '2025-05-08 17:09:33', '2025-05-08 17:09:33'),
('MH009', 'Revelyn', 'Ga-as', 'Katigbak', '', '1974-08-13', 'Pob. Tagbina Surigao Del Sur', 'Female', 'Married', 'Kapalaran St. Brgy. III Mataasnakahoy, Batangas', 'O+', 9305030818, 'revelynkatigbak13@gmail.com', NULL, 'Office of the Municipal Health ', 'Sanitation Inspector I', 1, 0, '2025-05-13 01:54:45', '2025-05-13 01:54:45'),
('MH024', 'JONABETH', 'NIEVA', 'SILVA', '', '1988-07-24', 'ABRA DE ILOG OCCIDENTAL MINDORO', 'Female', 'Married', '055, RIZAL, BRGY. III, MATAASNAKAHOY, BATANGAS', 'O+', 9353780459, 'sjonabeth@yahoo.com', NULL, 'Office of the Municipal Health', 'Nurse I', 1, 0, '2025-05-09 17:27:31', '2025-05-09 17:27:31'),
('MHO-001', 'Karla', 'Manalo', 'Caraan', '', '1979-08-07', 'Manila', 'Female', 'Married', 'Shercon Resort San Sebastian Mataasnakahoy, Batangas', 'A+', 9256070879, 'karlacaraanmd@gmail.com', NULL, 'Municipal Health Officer SG-24', 'Municipal Government Department Head', 1, 0, '2025-05-07 13:13:03', '2025-05-07 13:13:03'),
('MHO-002', 'MARIBEL', 'LACORTE', 'MATANGUIHAN', '', '1972-11-18', 'LIPA CITY', 'Female', 'Married', 'BRGY. 2A, MATAASNAKAHOY, BATANGAS', 'O+', 9190005014, 'mimatanguihanm@gmail.com', NULL, 'Office of the Municipal Health', 'Nurse I', 1, 0, '2025-05-08 22:42:27', '2025-05-08 22:42:27'),
('MHO-014', 'PRISCILA', 'INCIONG', 'PURA', '', '1967-07-08', 'MATAASNAKAHOY, BATANGAS', 'Female', 'Married', '119, MATAASNAKAHOY, BATANGAS', 'B+', 9216603090, 'NA4@gmail.com', NULL, 'Office of the Municipal Health', 'Midwife II', 1, 0, '2025-05-09 12:16:25', '2025-05-09 12:16:25'),
('MHO003', 'Debbie', 'Matanguihan', 'Lescano', '', '1968-12-19', 'Mataasnakahoy, Batangas', 'Female', 'Single', '090 Rizal St. Brgy. II- A Mataasnakahoy, Batangas', 'B+', 9158816400, 'dmlescano1219@gmail.com', NULL, 'Office of the Municipal Health', 'Medical Technologist II', 1, 0, '2025-05-08 17:43:31', '2025-05-08 17:43:31'),
('MHO005', 'CONCEPCION', 'MEDINA', 'MAGPANTAY', '', '1969-12-08', 'LIPA CITY', 'Female', 'Married', 'POBLACION III, MATAASNAKAHOY, BATANGAS', 'O+', 9237417017, 'connie.magpantay_08@yahoo.com', NULL, 'Office of the Municipal Health', 'Midwife II', 1, 0, '2025-05-07 16:26:48', '2025-05-08 08:00:00'),
('MHO007', 'JOCELYN', 'DE OCAMPO', 'MARALIT', '', '1974-02-09', 'MATAASNAKAHOY, BATANGAS', 'Female', 'Married', 'PUROK  V, BAYORBOR, MATAASNAKAHOY, BATANGAS', 'O+', 9082846721, 'jhoymaralit_74@gmail.com', NULL, 'Office of the Municipal Health', 'Midwife II', 1, 0, '2025-05-08 17:42:38', '2025-05-08 17:42:38'),
('MHO009', 'OLIVER', 'AGUILA', 'TUMAMBING', '', '1965-01-16', 'MATAASNAKAHOY', 'Male', 'Single', 'BRGY. I, MATAASNAKAHOY, BATANGAS', 'O+', 9338294184, 'oliver.tumambing65@yahoo.com', NULL, 'Office of the Municipal Health', 'Administrative Aide III (Driver I)', 1, 0, '2025-05-09 22:41:48', '2025-05-09 22:41:48'),
('MHO010', 'EDWIN', 'CUENCA', 'MATANGUIHAN', '', '1973-08-03', 'LIPA CITY', 'Male', 'Married', 'NANGKAAN, MATAASNAKAHOY, BATANGAS', 'O+', 9153859657, 'edwin.matanguihan@yahoo.com', NULL, 'Office of the Municipal Health', 'Nursing Attendant I', 1, 0, '2025-05-08 17:51:26', '2025-05-08 17:51:26'),
('MHO019', 'Kimberly', 'Magpantay', 'Flores', '', '1997-10-12', 'Lipa City District Hospital', 'Female', 'Married', '066 Rizal Brgy. III Mataasnakahoy, Batangas', 'O+', 9265962426, 'khmmymflrs@gmail.com', NULL, 'Office of the Municipal Health', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-13 01:40:06', '2025-05-13 01:40:06'),
('MHO_005', 'MIRASOL', 'ENRIQUEZ', 'MALABANAN', '', '1968-01-06', 'MATAASNAKAHOY, BATANGAS', 'Female', 'Married', 'UPA, MATAASNAKAHOY, BATANGAS', 'B+', 9519633299, 'N/a@gmail.com', NULL, 'Office of the Municipal Health', 'Midwife II', 1, 0, '2025-05-08 15:42:21', '2025-05-08 15:42:21'),
('MT002', 'JAY', 'ATIENZA', 'METRILLO', '', '1984-03-04', 'MATAASNAKAHOY, BATANGAS', 'Male', 'Married', 'UPA, MATAASNAKAHOY, BATANGAS', 'O+', 9186204164, 'metrillojay069@gmail.com', NULL, 'Municipal Treasury Office (MTO)', 'Assistant Municipal Treasurer', 1, 0, '2025-05-09 00:14:59', '2025-05-13 06:53:56'),
('MTO-006', 'Mian', 'Subol', 'Castillo', '', '1976-01-15', 'Mataasnakahoy, Batangas', 'Female', 'Single', '188 Rafael Lubis St. Barangay IV Mataasnakahoy, Batangas', 'O+', 9175236213, 'mianell1976@yahoo.com', NULL, 'Office of the Municipal Treasury', 'Administrative Assistant I (Reproduction Machine Operator III)', 1, 0, '2025-05-07 16:27:41', '2025-05-07 16:27:41'),
('MTO-007', 'JOEL', 'LITONG', 'MANALO', '', '1989-06-08', 'MATAASNAKAHOY, BATANGAS', 'Male', 'Single', 'SANTOL, MATAASNAKAHOY, BATANGAS', 'B+', 9458411157, 'maryjaneabu199@gmail.com', NULL, 'Office of the Municipal Treasury', 'Administratuve Aide I (Utility Worker I)', 1, 0, '2025-05-08 16:43:47', '2025-05-08 16:43:47'),
('MTO-008', 'Mickaela', 'Manalo', 'Agbing', '', '1999-10-05', 'Mataasnakahoy Batangas', 'Female', 'Single', '065 Purok 6 San Sebastian Mataasnakahoy, Batangas ', 'O+', 9068461286, 'mickaelaagbing05@gmail.com', NULL, 'Office of the Municipal Treasury', 'Revenue Collection Clerk I SG-5', 1, 0, '2025-05-06 15:50:46', '2025-05-06 15:50:46'),
('MTO001', 'Lady Ivy', 'Tipan', 'Hidalgo', '', '1981-08-31', 'Mataasnakahoy, Batangas', 'Female', 'Married', 'Ibaba St. Brgy. Calingatan Mataasnakahoy, Batangas', 'AB+', 9171284810, 'ladyivyhidalgo@gmail.com', NULL, 'Municipal Treasury Office ', 'Municipal Treasurer', 1, 0, '2025-05-08 16:32:38', '2025-05-08 16:32:38'),
('MTO006', 'Mario', 'Diaz', 'Bautista', '', '1985-07-16', 'Malabanan Balete Batangas', 'Male', 'Married', 'Loob Mataasnakahoy, Batangas', 'O+', 9097875935, 'marz1617@yahoo.com', NULL, 'Office of the Municipal Treasury', 'Administrative Aide III (Utility Worker II)', 1, 0, '2025-05-07 02:14:38', '2025-05-07 02:14:38'),
('MTOOO3', 'Arlyn', 'Oseña', 'Binay', '', '1974-11-19', 'Mataasnakahoy, Batangas', 'Female', 'Single', '094 Rizal Mataasnakahoy, Batangas', 'O+', 0, 'osenaarlyn@gmail.com', NULL, 'Office of the Municipal Treasury', 'Local Revenue Collection Officer I', 1, 0, '2025-05-07 02:27:36', '2025-05-07 08:00:00'),
('OMM-0011', 'Camille', 'Corpuz', 'Gordo', '', '1994-08-14', 'Lipa City', 'Female', 'Married', '032 Mandigma St. Purok 1 Brgy. I Mataasnakahoy, Batangas', 'O+', 9065537343, 'camillecrpz47@gmail.com', NULL, 'Office of the Mayor', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-08 15:58:27', '2025-05-08 15:58:27'),
('OMM001', 'Janet', 'Magpantay', 'Ilagan', '', '1967-12-07', 'Mataasnakahoy, Batangas', 'Female', 'Married', 'JMI Farm Brgy. Santol Mataasnakahoy, Barangay', 'O+', 9175781717, 'jayne_168@yahoo.com', 'Janet.png', 'Office of the Mayor', 'Municipal Mayor', 0, 0, '2025-02-19 06:09:03', '2025-05-17 16:00:00'),
('OMM003', 'Ma. Teresa', 'Tibayan', 'Leyesa', '', '1995-07-12', 'Brgy. Loob Mataasnakahoy, Batangas', 'Female', 'Single', '107 Purok 6 Brgy. Loob Mataasnakahoy, Batangas', 'O+', 9452664979, 'teresaleyesa15@gmail.com', NULL, 'Office of the Mayor', 'Administrative Assistant II (Clerk IV)', 1, 0, '2025-05-08 17:53:24', '2025-05-08 17:53:24'),
('OMM004', 'Annabelle', 'Subol', 'Balita', '', '1975-09-06', 'Mataasnakahoy, Batangas', 'Female', 'Married', '55 Victomar Subd. Brgy IV Mataasnakahoy, Batangas', 'B+', 9778194809, 'belle.balita@gmail.com', NULL, 'Office of the Mayor', 'Administrative Officer II', 1, 0, '2025-05-07 01:46:06', '2025-05-13 06:51:34'),
('OMM005', 'Lorena', 'Morada', 'Castillo', '', '1970-11-20', 'Poblacion Mataasnakahoy, Batangas', 'Female', 'Married', '132 Rafael Lubis Brgy. IV Mataasnakahoy, Batangas', 'O+', 9151963398, 'lhorencastillo20@yahoo.com', NULL, 'Office of the Mayor', 'Administrative Aide I (Utility Worker I) SG-1', 1, 0, '2025-05-07 16:17:29', '2025-05-07 16:17:29'),
('OMM006', 'Rodante', 'Gonzales', 'De Leon', '', '1961-01-20', 'Calingatan, Mataasnakahoy', 'Male', 'Single', 'Calingatan Mataasnakahoy, Batangas', 'O+', 9175798863, 'deleonrodante20@yahoo.com', NULL, 'Office of Mayor Office of the Business Permits and Licensing Officer', 'Municipal Government Assistant Department Head', 1, 0, '2025-05-08 14:48:26', '2025-05-08 14:48:26'),
('OMM012', 'FE', 'RIMORIN', 'OLAVE ', '', '1968-03-03', 'LIPA CITY', 'Female', 'Married', 'SANTOL, MATAASNAKAHOY, BATANGAS', 'O+', 9177979409, 'fe.olave0503@gmail.com', NULL, 'Mayor\'s Office - Office of the Municipal General Services Officer', 'Administrative Assistant I (Bookbinder III)', 1, 0, '2025-05-09 10:53:44', '2025-05-09 10:53:44'),
('OMM019', 'MARIBEL', 'LANDICHO', 'MATIBAG', '', '1984-10-15', 'KINALAGLAGAN, MATAASNAKHAOY', 'Female', 'Married', 'PUROK 2, SAN SEBASTIAN, MATAASNAKAHOY, BATANGAS', 'B+', 9270533559, 'jrbebzmatibag1715@yahoo.com', NULL, 'Office of the Mayor- Office of the Business Permits and Licensing Office', 'Administrative Aide III (Utility Worker II)', 1, 0, '2025-05-08 22:56:11', '2025-05-08 22:56:11'),
('OMM026', 'MORENA', 'SAYAS', 'SISCAR', '', '1994-06-12', 'MATAASNAKAHOY, BATANGAS', 'Female', 'Married', 'UPA, MATAASNAKAHOY, BATANGAS', 'O+', 9197715005, 'siscarmorena6@gmail.com', NULL, 'Office of the Municipal Social Welfare and Development', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-09 17:36:31', '2025-05-09 17:36:31'),
('OMM033', 'Emmanuel', 'Azurin', 'Alfiler', '', '1964-12-19', 'Quezon City', 'Male', 'N/A', '18 Col.Divino St. Concepcion Uno Marikina City, Metro Manila', 'O+', 9171786179, 'bunnyalfiler@yahoo.com', NULL, 'Office off the Sangguniang Bayan', 'Secretary to the Sangguniang Bayan ', 1, 0, '2025-05-06 16:12:14', '2025-05-06 16:12:14'),
('OMM034', 'Mary Claire', 'Sayas', 'Bagioen', '', '1997-03-10', 'Mataasnakahoy', 'Female', 'Single', '150 Nangkaan Mataasnakahoy, Batangas', 'B+', 9060050076, 'maryclairesbagioen@gmail.com', NULL, 'Mayor\'s Office- Office of the Municipal General Services Officer', 'Administrative Officer I (Supply Officer I)', 1, 0, '2025-05-07 01:35:17', '2025-05-13 07:06:57'),
('OMM046', 'Glenn Joshua', 'Mercado', 'Esmedilla', '', '2000-01-27', 'Lipa City, Batangas', 'Male', 'Single', 'Sitio Parang Brgy. II Mataasnakahoy, Batangas', 'B+', 9395714499, 'esmedillaglenn@gmail.com', NULL, 'Office of the Mayor- Office of the Business Permits and Licensing Officer', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-13 01:28:59', '2025-05-13 01:28:59'),
('OMM055', 'GIAN MARCO', 'RIATA', 'VELASQUEZ', '', '1997-05-09', 'MILAN, ITALY', 'Male', 'Married', '17, PUROK 1, SAN SEBASTIAN, MATAASNAKAHOY, BATANGAS', 'O+', 9674783907, 'marco.velasquez0905@gmail.com', NULL, 'Office of the Mayor', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-09 22:54:33', '2025-05-13 07:07:22'),
('OMM075', 'GIO', 'HERNANDEZ', 'REYES', '', '1996-01-21', 'BRGY II-A, MATAASNAKAHOY, BATANGAS', 'Male', 'Married', '043, VERGARA, BRGY. II-A, MATAASNAKAHOY, BATANGAS', 'A+', 9976092020, 'ghr012196@gmail.com', NULL, 'Mayor\'s Office - Office of the Business Permits and Licensing Officer', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-09 15:36:50', '2025-05-13 07:03:59'),
('OMM084', 'Lotalie', 'Villapando', 'Aguila', '', '1965-12-23', 'Mataasnakahoy, Batangas', 'Female', 'Single', 'Poblacion III Mataasnakahoy, Batangas', 'A+', 9108586249, 'utah_jas@yahoo.com', NULL, 'Office of the Municipal Treasury', 'Administrative Assistant I (Bookbinder III) ', 1, 0, '2025-05-06 16:02:42', '2025-05-06 16:02:42'),
('OMN038', 'Arnel', 'Dela Vega', 'Floro', '', '1977-12-27', 'Tondo Manila', 'Male', 'Single', 'J. Hernandez St. Brgy I Mataasnakahoy, Batangas', 'O+', 9776297370, 'floroarnel12@gmail.com', NULL, 'Office of the Mayor (Business Permits and Licensing Section)', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-08 15:28:39', '2025-05-08 15:28:39'),
('OMO41', 'ERWIN', 'LANDICHO', 'MAGPANTAY', '', '1978-05-09', 'MATAASNAKAHOY, BATANGAS', 'Male', 'Married', 'BARANGAY III, MATAASNAKAHOY, BATANGAS', 'A+', 9298586998, 'emagpantay72@gmail.com', NULL, 'Office of the Mayor', 'Administratuve Aide III (Driver I)', 1, 0, '2025-05-08 15:30:06', '2025-05-08 15:30:06'),
('PDC001', 'MICHAEL', 'REYES', 'OLARTE', '', '1981-06-05', 'UPA, MATAASNAKAHOY, BATANGAS', 'Male', 'Married', 'UPA, MATAASNAKAHOY, BATANGAS', 'B+', 9171890536, 'mike_olarte_ce@yahoo.com', NULL, 'Municipal Planning and Development Office', 'Municipal Government Department Head (Municipal Planning and Development Coordinator)', 1, 0, '2025-05-09 10:44:20', '2025-05-09 10:44:20'),
('PDC004', 'JOCELYN', 'RECIO', 'VERGARA', '', '1972-10-27', 'Mataasnakahoy, Batangas', 'Female', 'Single', '#41 Kinalaglagan, Mataasnakahoy, Batangas', 'B+', 9207779987, 'jocelynvergara584@gmail.com', NULL, 'Office of the Municipal Planning and Development Coordinator', 'Administrative Assistant I (Bookbinder III) SG-7', 1, 0, '2025-05-09 23:10:28', '2025-05-12 16:00:00'),
('PDC005', 'HARLEY ALEXIS', 'VERGARA', 'REYES', '', '1999-01-25', 'MATAASNAKAHOY, BATANGAS', 'Male', 'Single', '130, SITIO PARANG, MATAASNAKAHOY, BATANGAS', 'A+', 9971028053, 'reyesharley25@gmail.com', NULL, 'Office of the Municipal Planning and Development Coordinator', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-09 15:43:08', '2025-05-09 15:43:08'),
('PDC006', 'TRINA CORINNE', 'ESMIDILLA', 'ORENSE', '', '1997-06-20', 'BATANGAS CITY', 'Female', 'Single', 'PUROK 1, NANGKAAN, MATAASNAKAHOY, BATANGAS', 'B+', 9559832173, 'trinaorense20@gmail.com', NULL, 'office of the Municipal Planning and Development Coordinator', 'Administrative Officer II', 1, 0, '2025-05-09 11:16:04', '2025-05-09 11:16:04'),
('PDC008', 'Yvan James', 'Hernandez', 'Lalamunan', '', '1999-03-22', 'Mataasnakahoy, Batangas', 'Male', 'Single', 'Purok 2 Brgy. Bubuyan Mataasnakahoy, Batangas', 'B+', 9978198207, 'yvanjamesh22@gmail.com', NULL, 'Office of the Municipal Planning and Development Coordinator', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-13 01:59:14', '2025-05-13 01:59:14'),
('PDO005', 'ANGELITA', 'LESCANO', 'MANALO', '', '1978-12-28', 'MATAASNAKAHOY, BATANGAS', 'Female', 'Married', 'PUROK 1, STA. FE VILLAS, UPA, MATAASNAKAHOY, BATANGAS', 'O+', 9297609075, 'angelitamanalo783@gmail.com', NULL, 'Office of the Municipal Disaster Risk Reduction and Management', 'Administratuve Aide I (Utility worker I)', 1, 0, '2025-05-08 16:28:46', '2025-05-08 16:28:46'),
('PDO006', 'GIAN LORENZ', 'SOLIS', 'VERGARA', '', '1992-09-23', 'MATAASNAKAHOY, BATANGAS', 'Male', 'Single', 'IMMACULATE CONCEPCION VILLAGE, UPA, MATAASNAKAHOY, BATANGAS', 'A+', 9997563835, 'gianlvergara@gmail.com', NULL, 'Mayor\'s Office - Office of the Municipal Disaster Risk Reduction Management', 'Local Disaster Risk Reduction and Management Officer II', 1, 0, '2025-05-09 23:01:46', '2025-05-09 23:01:46'),
('SB2022-03', 'Karen Joy', 'Araneta', 'Laqui', '', '1991-05-13', 'Mataasnakahoy, Batangas', 'Female', 'Single', '113 C. Recinto St. Brgy. I Mataasnakahoy, Batangas', 'O+', 9171882093, 'k.laqui@yahoo.com', NULL, 'Office of the Sangguniang Bayan', 'Sangguniang Bayan Member ', 1, 0, '2025-05-08 17:31:37', '2025-05-13 06:56:40'),
('SB2022-04', 'ROWELL', 'BENEDICTO', 'MALABAG', '', '1988-08-18', 'BATANGAS CITY', 'Male', 'Single', 'RIZAL, BRGY. III, MATAASNAKAHOY, BATANGAS', 'B+', 9453264015, 'rowellmalabag_88@yahoo.com', NULL, 'Office of the Sanguniang Bayan', 'Municipal Councilor', 1, 0, '2025-05-09 23:33:54', '2025-05-13 07:01:57'),
('SB2022-06', 'PEPITO', 'DELEON', 'VERGARA', '', '1964-07-28', 'MATAASNAKAHOY, BATANGAS', 'Male', 'Married', 'IMMACULATE CONCEPCION VILLAGE, UPA, MATAASNAKAHOY, BATANGAS', 'A+', 9151120998, 'agavergs@yahoo.com', NULL, 'Office of the Sanguniang Bayan', 'Municipal Councilor', 1, 0, '2025-05-09 23:19:58', '2025-05-13 06:56:23'),
('SB2022-07', 'Lemuel', 'Villanueva', 'De Ocampo', '', '1985-05-19', 'Mataasnakahoy, Batangas', 'Male', 'Single', 'Bayorbor Mataasnakahoy, Batangas', 'A+', 9052417240, 'konlem1985@gmail.com', NULL, 'Office of the Sangguniang Bayan', 'Sangguniang Bayan Member', 1, 0, '2025-05-08 14:54:19', '2025-05-13 06:57:13'),
('SB2022-08', 'Lourdes', 'Orozo', 'Calinisan', '', '1976-02-09', 'Mataasnakahoy', 'Female', 'Married', 'Purok 1 Kinalaglagan Mataasnakahoy, Batangas', 'O+', 9108558332, 'calinisanlourdesorozo@gmail.com', NULL, 'Office of the Sangguniang Bayan', 'Sangguniang Bayan Member ', 1, 0, '2025-05-07 12:58:41', '2025-05-13 06:56:58'),
('SBO-004', 'Merlyn', 'Caraan', 'Laqui', '', '1968-02-26', 'Mataasnakahoy, Batangas', 'Female', 'Married', 'Brgy. III Mataasnakahoy, Batangas', 'AB+', 9171385500, 'merlynlaqui@yahoo.com', NULL, 'Office of the Sangguniang Bayan', 'Sangguniang Bayan Member ', 1, 0, '2025-05-08 17:37:18', '2025-05-08 17:37:18'),
('SBO-014', 'ALVIN', 'LITONG', 'MANALO', '', '1988-05-27', 'MATAASNAKAHOY, BATANGAS', 'Male', 'Single', 'SANTOL, MATAASNAKAHOY, BATANGAS', 'B+', 9217150542, 'galvinmanalo@gmail.com', NULL, 'Office of the Sanguniang Bayan', 'Administratuve Assistant II (Clerk IV)', 1, 0, '2025-05-08 15:52:34', '2025-05-08 15:52:34'),
('SBO-015', 'Mary Ann', 'Mendoza', 'Hernandez', '', '1981-07-11', 'Mataasnakahoy', 'Female', 'Married', 'Purok 5 Brgy. Bubuyan Mataasnakahoy, Batangas', 'O+', 9194618093, 'meann_ajboy@yahoo.com', NULL, 'Office of the Sangguniang Bayan', 'Administrative Assistant I (Reproduction Machine Operator III) ', 1, 0, '2025-05-08 16:17:04', '2025-05-08 16:17:04'),
('SBO001', 'Jay', 'Manalo', 'Ilagan', '', '1973-12-30', 'Mataasnakahoy, Batangas', 'Male', 'Married', 'JMI Farm Brgy. Santol Mataasnakahoy, Batangas', 'O+', 9175177337, 'jaymanaloilagan31@gmail.com', 'JMi.png', 'Office of Vice Mayor', 'Vice Mayor', 0, 0, '2025-05-08 16:56:40', '2025-05-17 16:00:00'),
('SBO002', 'Ferdinand', 'Loleng', 'Dimaano ', '', '1972-10-22', 'Mataasnakahoy', 'Male', 'Married', 'Brgy I Mataasnakahoy, Batangas', 'O+', 9673666467, 'dimaanoputo@gmail.com', NULL, 'Office of the Sangguniang Bayan', 'Sangguniang Bayan Member ', 1, 0, '2025-05-08 15:10:12', '2025-05-08 08:00:00'),
('SBO004', 'Herwin', 'Dimaano', 'Del Mundo', '', '1973-06-05', 'Mataasnakahoy, Batangas', 'Male', 'Married', 'Subdivision Brgy III Mataasnakahoy, Batangas', 'O-', 9171882350, 'hd5delmundo@gmail.com', NULL, 'Office of the Sangguniang Bayan', 'Sangguniang Bayan Member ', 1, 0, '2025-05-08 14:59:07', '2025-05-08 08:00:00'),
('SBO010', 'Al Johnry', 'Salazar', 'Barrogo', '', '2001-03-24', 'Lipa City', 'Male', 'Single', 'Purok 6 Calingatan Mataasnakahoy, Batangas', 'B+', 9558225167, 'aljbarrogo@gmail.com', NULL, 'N/A', 'Chairperson, Sangguniang Kabataan ', 1, 0, '2025-05-07 12:20:26', '2025-05-07 12:20:26'),
('SBO012', 'GINA', 'DIMAANO', 'OCAMPO', '', '1974-11-29', 'MATAASNAKAHOY, BATANGAS', 'Female', 'Married', 'PUROK 3, MATAASNAKAHOY, BATANGAS', 'A+', 9912005913, 'ginadocampo@gmail.com', NULL, 'Office of the Sangguniang Bayan', 'Secretary to the Sangguniang Bayan I', 1, 0, '2025-05-10 00:32:02', '2025-05-13 06:57:32'),
('SBO013', 'HILDA', 'LESCANO', 'LUBIS', '', '1970-05-14', 'MATAASNAKAHOY', 'Female', 'Married', 'CALINGATAN, MATAASNAKAHOY, BATANGAS', 'O+', 9237427757, 'lubishilda@yahoo.com', NULL, 'Office of the Municipal Vice -  Mayor', 'Administrative Assistant I (Reproduction machine operator III)', 1, 0, '2025-05-07 12:15:03', '2025-05-07 12:15:03'),
('SBO014', 'FLORY', 'ILAGAN', 'TAPEL', '', '1973-04-07', 'MATAASNAKAHOY, BATANGAS', 'Female', 'Married', '#53, SANTOL, MATAASNAKAHOY, BATANGAS', 'A+', 9187503861, 'orytapel@yahoo.com', NULL, 'Office of the Sanguniang Bayan', 'Administrative Assistant I (Bookbinder III)', 1, 0, '2025-05-09 17:42:17', '2025-05-09 17:42:17'),
('SBO015', 'Abegael', 'Lubis', 'Gonzales', '', '1993-05-20', 'Mataasnakahoy, Batangas', 'Female', 'Married', 'Calingatan Mataasnakahoy, Batangas', 'B+', 9951196985, 'abegail.lubis@gmail.com', NULL, 'Office of the Sangguniang Bayan', 'Administrative Aide III (Utility Worker II) ', 1, 0, '2025-05-08 15:33:07', '2025-05-08 15:33:07'),
('SBO019', 'Jello Mae', 'Inciong', 'Federico', '', '1995-02-27', 'Mataasnakahoy, Batangas', 'Female', 'Single', '036 Purok 2 Brgy. Bubuyan Mataasnakahoy, Batangas', 'O+', 9666931131, 'jelmefed@gmail.com', NULL, 'Office of the Municipal Vice Mayor', 'Administrative Aide III (Utillity Worker II)', 1, 0, '2025-05-13 01:36:29', '2025-05-13 01:36:29'),
('SBO044', 'ALAIZA', 'LUMBERA', 'MANDIGMA', '', '1999-08-07', 'LIPA CITY, BATANGAS', 'Female', 'Single', 'PUROK 4, SAN SEBASTIAN, MATAASNAKAHOY, BATANGAS', 'O+', 9079537315, 'mandigmaaa@gmail.com', NULL, 'Office of the Sangguniang Bayan', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-09 23:48:31', '2025-05-13 07:02:29'),
('SWD-002', 'Lilian', 'Esparagoza', 'Caringal', '', '1971-10-01', 'Lipa City', 'Female', 'Married', '14 Boundary Barangay II Mataasnakahoy, Batangas', 'O+', 9194505807, 'caringalilian@gmail.com', NULL, 'Office of the Municipal Social Welfare & Development', 'Day Care Worker II (SG-8)', 1, 0, '2025-05-07 16:08:35', '2025-05-07 16:08:35'),
('SWD001', 'Karen', 'Umali', 'Kasilag', '', '1980-11-08', 'Lipa City', 'Female', 'Married', 'Immaculate Concepcion Village Brgy. Upa  Mataasnakahoy, Batangas', 'O+', 9359086441, 'karen08kasilag@gmail.com', NULL, 'Office of the Municipal Social Welfare and Development ', 'Municipal Government Department Head (Municipal  Social Welfare and Development Officer)', 1, 0, '2025-05-13 01:50:51', '2025-05-13 01:50:51'),
('SWD003', 'Ellen', 'Macasaet', 'Abraham', '', '1978-01-27', 'Batangas', 'Female', 'Married', '158 Rafael Lubis St. Brgy IV Mataasnakahoy, Batangas', 'O+', 9771423142, 'ellenmabraham101518@gmail.com', NULL, 'Office of the Municipal Social Welfare and Development', 'Administrative Officer I (Records Officer I)', 1, 0, '2025-05-06 13:05:01', '2025-05-13 07:00:54'),
('SWD005', 'NOREEN', 'MATANGUIHAN', 'LOJO', '', '1985-05-20', 'MATAASNAKAHOY, BATANGAS', 'Female', 'Married', 'II-A, MATAASNAKAHOY, BATANGAS', 'B+', 9991939737, 'noreenjun@gmail.com', NULL, 'Office of the Municipal Social Welfare & Development', 'Social Welfare Aide', 1, 0, '2025-05-07 11:32:42', '2025-05-07 11:32:42'),
('SWD006', 'Krisno', 'De Castro', 'Ilagan', '', '1990-03-31', 'Batangas City, Batangas', 'Male', 'Single', '126 Rizal St. Brgy. 3 Mataasnakahoy, Batangas', 'B+', 9386731594, 'ilagankris31@gmail.com', NULL, 'Office of the Municipal Social Welfare and Development', 'Administrative Aide I (Utility Worker II) ', 1, 0, '2025-05-08 17:00:38', '2025-05-08 17:00:38'),
('SWD012', 'JENNY', 'ESMIDILLA', 'PASIA', '', '1998-11-22', 'MATAASNAKAHOY, BATANGAS', 'Female', 'Single', '111, SAN SEBASTIAN, MATAASNAKAHOY, BATANGAS', 'AB+', 9352571084, 'jennypasia8@gmail.com', NULL, 'Office of the Municipal Social Welfare and Development', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-09 12:04:52', '2025-05-09 12:04:52'),
('SWD016', 'ANGELA JOYCE', 'LUBI', 'OBTIAL', '', '1996-01-25', 'MATAASNAKAHOY', 'Female', 'Single', 'PUROK 2, NANGKAAN, MATAASNAKAHOY, BATANGAS', 'Unknown', 9672560724, 'ajobtial@gmail.com', NULL, 'Office of the Municipal Social Welfare and Development', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-10 00:27:51', '2025-05-13 07:03:21'),
('SWD018', 'JOAN', 'ROBLES', 'REYES', '', '1988-10-26', 'LIPA CITY, BATANGAS', 'Female', 'Married', 'SICO, LIPA CITY, BATANGAS', 'B+', 9093489106, 'lgumkahoy.joanreyes@gmail.com', NULL, 'Office of the Municipal Social Welfare and Development', 'Administrative Aide I (Utility Worker I)', 1, 0, '2025-05-09 15:51:32', '2025-05-13 07:04:09'),
('SWD026', 'Camille Grace', 'Orense', 'Bautista', '', '1999-07-12', 'Lipa City', 'Female', 'Single', 'Brgy. Nangkaan Mataasnakahoy, Batangas', NULL, 9171509110, 'camille.bauts@gmail.com', NULL, 'Office of the Municipal Social Welfare and Development', 'Social Welfare Officer I', 1, 0, '2025-05-13 00:19:42', '2025-05-13 06:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sent_mail` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_date`, `end_date`, `description`, `color`, `sent_mail`) VALUES
(1, 'sdsdsd', '2025-03-15 13:15:00', '2025-03-16 13:15:00', 'dsderewr', '#ff8585', 0),
(2, 'Zumba', '2025-03-24 08:00:00', '2025-03-24 10:00:00', 'Zumba Wellness Fitness activity for the elders and youth!', '', 0),
(8, 'sa', '2025-03-15 12:58:00', '2025-03-15 13:00:00', 'sasa', '', 0),
(11, 'start and end', '2025-03-18 00:00:00', '2025-03-20 00:00:00', 'sdhsjdsa', '#ff0000', 0),
(14, 'backup okay', '2025-04-16 20:45:00', '2025-04-16 20:55:00', 'okii', '#d5343c', 1);

-- --------------------------------------------------------

--
-- Table structure for table `government_info`
--

DROP TABLE IF EXISTS `government_info`;
CREATE TABLE IF NOT EXISTS `government_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gsis_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pag_ibig_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `philhealth_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sss_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tin_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_employee_no` (`employee_no`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `government_info`
--

INSERT INTO `government_info` (`id`, `employee_no`, `gsis_no`, `pag_ibig_no`, `philhealth_no`, `sss_no`, `tin_no`, `created_at`, `updated_at`) VALUES
(2, 'LDR001', '2004647207', '1211-3530-8011', '09-000092019-2', 'N/A', '463-485-211', '2025-03-11 00:25:50', '2025-05-11 05:54:48'),
(9, 'AGR005', '71082800543', '04032100280-9', '09-00000-1165-6', 'N/A', '903-001-029', '2025-05-07 11:19:49', '2025-05-07 11:19:49'),
(10, 'SWD005', '2005693524', '919316807850', '230021300344', '0425549861', '252-558-874', '2025-05-07 11:32:42', '2025-05-07 11:32:42'),
(11, 'SBO013', '20022006641', '040139258609', '09-000057356-5', '04-3078124-5', '194-235-577', '2025-05-07 12:15:03', '2025-05-07 12:15:03'),
(12, 'MHO005', '2002006601', '1490-0022-0379', '09-200523324-2', 'N/A', '941-367-812', '2025-05-07 16:26:48', '2025-05-08 08:00:00'),
(13, 'OMO41', '2006020447', '1210-6050-8038', '02-025500045-5', '04-0982692-4', '495-0430223', '2025-05-08 15:30:06', '2025-05-08 15:30:06'),
(14, 'MHO_005', '2002006722', '149000206322', '090445796', 'N/A', '183-234-185', '2025-05-08 15:42:21', '2025-05-08 15:42:21'),
(15, 'SBO-014', '2004793270', '1211-58940661', '030505866572', '04-1959195-1', '281-445-059-000', '2025-05-08 15:52:34', '2025-05-08 15:52:34'),
(16, 'PDO005', 'N/A', '121292801967', '09-250692094-0', '04-3411661-2', '471-606-229-000', '2025-05-08 16:28:46', '2025-05-08 16:28:46'),
(17, 'MTO-007', '2006127891', '121169738809', '01-050751782-5', 'N/A', '296-355-508-000', '2025-05-08 16:43:47', '2025-05-08 16:43:47'),
(18, 'MEO005', 'LP62031003186', '044990554901', '09-200520003-4', '03-8403236-7', '2507436999', '2025-05-08 17:02:32', '2025-05-08 17:02:32'),
(19, 'MCR002', '006-0120-0559-2', '149000216682', '09-000044584-2', 'N/A', '908-739-855', '2025-05-08 17:14:22', '2025-05-08 17:14:22'),
(20, 'ASS004', '006-0104-0118-5', '040138806110', '09-025009700-9', '04-1037634-0', '908-740-638', '2025-05-08 17:22:12', '2025-05-08 17:22:12'),
(21, 'MBO-003', '2002006119', '040138806208', '09-00044572-9', 'N/A', '903-001-044', '2025-05-08 17:32:59', '2025-05-08 17:32:59'),
(22, 'MHO007', '2004106763', '121064742174', '09-200846164-5', '0430625026', '186-358-512', '2025-05-08 17:42:38', '2025-05-08 17:42:38'),
(23, 'MHO010', '02003965005', '1211-4567-2705', '09-0000-77994-5', '04-0919549-3', '289-634-245', '2025-05-08 17:51:26', '2025-05-08 17:51:26'),
(24, 'AGR002', 'LP-78123101668', '149000218241', '09-200280566-0', 'N/A', '938-864-813', '2025-05-08 22:36:04', '2025-05-08 22:36:04'),
(25, 'MHO-002', '2005677620', '1490-0049-2230', '09-050184211-6', '04-0920657-3', '918-812-791', '2025-05-08 22:42:27', '2025-05-08 22:42:27'),
(26, 'OMM019', '2005693526', '12123294902', '09-200925397-3', '04-1377721-8', '260721248-000', '2025-05-08 22:56:11', '2025-05-08 22:56:11'),
(27, 'MBO_003', '200-569-3522', '1212-3295-0244', '09-025636679-6', '04-295-2463-3', '709-349-175-000', '2025-05-09 00:08:48', '2025-05-09 00:08:48'),
(28, 'MT002', '2004106761', '1210-6476-2778', '09-200519873-0', 'N/A', '260-518-883', '2025-05-09 00:14:59', '2025-05-09 00:14:59'),
(29, 'MCR003', 'B74KGAMN013', '040139258903', '09-00000-1135-4', 'N/A', '903-000-971', '2025-05-09 10:32:39', '2025-05-09 10:32:39'),
(30, 'PDC001', '2000831254', '1020-0046-1045', '09-025159534-7', '34-0836649-5', '239-368-868', '2025-05-09 10:44:20', '2025-05-09 10:44:20'),
(31, 'OMM012', '2003965006', '090251016258', '09-025100625-8', 'N/A', '289-699-332', '2025-05-09 10:53:44', '2025-05-09 10:53:44'),
(32, 'LDR014', 'N/A', '1212-5565-3045', '09-050562519-5', 'N/A', '631-282-442', '2025-05-09 11:01:11', '2025-05-09 11:01:11'),
(33, 'PDC006', '200-594-9271', '1212-8943-5543', '09-250686971-6', 'N/A', '505-905-854-000', '2025-05-09 11:16:04', '2025-05-09 11:16:04'),
(34, 'HRM-003', '2002006646', '1490-0020-6367', '09-025009696-7', 'N/A', '903-000-989', '2025-05-09 11:21:49', '2025-05-09 11:21:49'),
(35, 'AGRI007', '200--556-6430', '1211-6983-8179', '09-200925388-4', '0432474518', '912827875', '2025-05-09 11:36:53', '2025-05-09 11:36:53'),
(36, 'HRM005', '2005832266', '1030-0024-9608', '092023951896', '04-3173606-06', '206-869-629', '2025-05-09 11:46:56', '2025-05-10 16:00:00'),
(37, 'SWD012', 'N/A', '1212-6119-4958', '09-250684861-1', '044251660-2', '767-586-860', '2025-05-09 12:04:52', '2025-05-09 12:04:52'),
(38, 'MHO-014', '2004821355', '1211-0752-8823', '09-200979613-6', 'N/A', '139-900-099', '2025-05-09 12:16:25', '2025-05-09 12:16:25'),
(39, 'ASS012', '200-6020-448', '1212-9227-6862', '09-200925373-6', '04-162-78772', '395-418-299-00000', '2025-05-09 15:19:39', '2025-05-09 15:19:39'),
(40, 'OMM075', 'N/A', '1211-6960-6461', '09-250691840-7', '04-3817228-3', '701-748-616-000', '2025-05-09 15:36:50', '2025-05-09 15:36:50'),
(41, 'PDC005', '200-612-796-9', '121-306-7114-14', '09-254267152-3', 'N/A', '746-482-887', '2025-05-09 15:43:08', '2025-05-09 15:43:08'),
(42, 'SWD018', 'N/A', '1210-4718-2833', '09-050301894-1', '04-0982692-4', '410-509-437-000', '2025-05-09 15:51:32', '2025-05-09 15:51:32'),
(43, 'ASS013', 'N/A', '1212-4297-3423', '09-250692087-8', '34-8029626-6', '357-307-680-000', '2025-05-09 16:01:12', '2025-05-09 16:01:12'),
(44, 'GSO-002', '2005849720', '1090-0109-5577', '080504609697', '04-1220267-4', '240-789-790', '2025-05-09 16:39:33', '2025-05-09 16:39:33'),
(45, 'AGR004', '2003964278', '121077810180', '09-2002-80534-2', 'N/A', '943-206-092', '2025-05-09 16:47:14', '2025-05-09 16:47:14'),
(46, 'GSO006', 'N/A', '121249392443', '09-250395445-3', '34-8427265-5', '378-610-255-000', '2025-05-09 17:19:37', '2025-05-09 17:19:37'),
(47, 'MH024', 'N/A', '121158550891', '090252481892', '0423624966', '402756603', '2025-05-09 17:27:31', '2025-05-09 17:27:31'),
(48, 'OMM026', 'N/A', 'N/A', '09-253685354-7', '04-4709490-9', '747-779-943-000', '2025-05-09 17:36:31', '2025-05-09 17:36:31'),
(49, 'SBO014', '730-407-005-50', '0401-4044-6307', '09-0000-479-10-0', '33-5219211-3', '924-555-105-000', '2025-05-09 17:42:17', '2025-05-09 17:42:17'),
(50, 'LDR002', '2005639878', '1211-79456613', '09201591054', '0420995698', '419-879-816-000', '2025-05-09 17:47:48', '2025-05-09 17:47:48'),
(51, 'MCR004', '006-0174-4319-9', '1210-1842-1636', '09-200925378-7', 'N/A', '413-528-892', '2025-05-09 17:53:49', '2025-05-09 17:53:49'),
(52, 'MCR-001', '2002006645', '1490-0022-5217', '09-00001112-5', 'N/A', '138-936-203', '2025-05-09 18:14:36', '2025-05-09 18:14:36'),
(53, 'MBO004', '2005693528', '121232873912', '080508787662', '0421373387', '284-914-194-000', '2025-05-09 22:18:05', '2025-05-09 22:18:05'),
(54, 'HRM002', '02004146714', '12108421647', '09-200755798-3', '33-1669575-3', '151-695-590-000', '2025-05-09 22:25:00', '2025-05-09 22:25:00'),
(55, 'MHO009', '2004155020', '121032021740', '09-200750017-5', '04-00158505-8', '287-950-145-000', '2025-05-09 22:41:48', '2025-05-09 22:41:48'),
(56, 'MCRO05', 'N/A', '1211-484-54729', '010520552346', '0435-8290-05', '322-997-568', '2025-05-09 22:46:56', '2025-05-09 22:46:56'),
(57, 'OMM055', 'N/A', 'N/A', '09-050533861-7', 'N/A', '735-251-738', '2025-05-09 22:54:33', '2025-05-09 22:54:33'),
(58, 'PDO006', 'N/A', '1211-7257-8396', '0905-0488-7420', '04-3756999-4', '328-649-823', '2025-05-09 23:01:46', '2025-05-09 23:01:46'),
(59, 'PDC004', '2002006049', '1490-0021-8412', '09-025009697-5', 'N/A', '185-399-690', '2025-05-09 23:10:28', '2025-05-12 16:00:00'),
(60, 'SB2022-06', '2000560160', '1040-0053-8423', '09-000088047-6', 'N/A', '127-254-920', '2025-05-09 23:19:58', '2025-05-09 23:19:58'),
(61, 'AGR023', 'N/A', 'N/A', '09-202327863-6', 'N/A', '631402800', '2025-05-09 23:26:44', '2025-05-09 23:26:44'),
(62, 'SB2022-04', '2005331910', '1211 1551 8131', '0905 0296 5009', '04-2329231-4', '260 787 670', '2025-05-09 23:33:54', '2025-05-09 23:33:54'),
(63, 'GSO001', '2002006045', '040321002907', '09-000001158-3', 'N/A', '903-001-037', '2025-05-09 23:43:09', '2025-05-09 23:43:09'),
(64, 'SBO044', 'N/A', '1212-5404-9027', '09-250689078-2', '0443721921', '631-278-884-00000', '2025-05-09 23:48:31', '2025-05-09 23:48:31'),
(65, 'AGR028', 'N/A', 'N/A', 'N/A', '33-5900898-3', '931-327-051', '2025-05-10 00:00:43', '2025-05-10 00:00:43'),
(66, 'LDR024', 'N/A', 'N/A', '09-050550143-7', '04-4072814-6', '352-878-850', '2025-05-10 00:08:05', '2025-05-10 00:08:05'),
(67, 'MEO002', '2001176739', '121201025878', '09-00005832-7', '0385227126', '126-226-056-000', '2025-05-10 00:15:41', '2025-05-10 00:15:41'),
(68, 'SWD016', 'N/A', '1212-2841-5700', '090257628352', 'N/A', '375-566-384', '2025-05-10 00:27:51', '2025-05-10 00:27:51'),
(69, 'SBO012', 'N/A', '1490-0112-3142', '09-200027954', '04-0983412-3', '915-285-730', '2025-05-10 00:32:02', '2025-05-10 00:32:02'),
(70, 'ACT005', 'N/A', '121309702266', '09-201165011-4', '04-1516437-9', '617-230-141-00000', '2025-05-10 00:41:50', '2025-05-10 00:41:50'),
(71, 'SWD003', '2005948975', '1020-0146-7005', '19-051630642-8', '33-566-45666', '205-960-853-000', '2025-05-06 13:05:01', '2025-05-06 08:00:00'),
(72, 'MTO-008', '2006194189', '121305179969', '092506961191', '04-4396206-4', '514-337-662-00000', '2025-05-06 15:50:46', '2025-05-06 15:50:46'),
(73, 'OMM084', '651223301413', '040139081410', '09-0000-44578-8', 'N/A', '903-000-930', '2025-05-06 16:02:42', '2025-05-06 16:02:42'),
(74, 'OMM033', '2001866922', '1211-06621133', '1900-00146580', '03-8317115-1', '129-421-600', '2025-05-06 16:12:14', '2025-05-06 16:12:14'),
(75, 'AGR001', '000-4316-8726-7', '121183325315', '09256903957', '04-3168726-7', '219-719-156-000', '2025-05-06 16:21:19', '2025-05-06 16:21:19'),
(76, 'ASS007', 'N/A', '121306638677', '09-201139986-1', '0423984567', '411- 511-289-001', '2025-05-06 16:44:31', '2025-05-06 16:44:31'),
(77, 'ACT004', '2005975270', '121290541003', '09-250352721-0', '0415203214', '300-527-598', '2025-05-07 01:19:15', '2025-05-07 01:19:15'),
(78, 'ACT-003', '006-0179-4315-6', '121077084225', '09-025037864-4', '0429523634', '408-865-142', '2025-05-07 01:29:30', '2025-05-07 01:29:30'),
(79, 'OMM034', '2005948976', '121213855328', '09-250691077-5', 'NA', '728-091-314-000', '2025-05-06 08:00:00', '2025-05-06 08:00:00'),
(80, 'OMM004', '2006095027', '149000043767', '090500276249', '0431504887', '613-857-085', '2025-05-07 01:46:06', '2025-05-07 01:46:06'),
(81, 'MTO006', '2005693527', '1212-6258-0019', '09-201524328-9', '04-1519140-7', '259-225-089-000', '2025-05-07 02:14:38', '2025-05-07 02:14:38'),
(82, 'SBO010', 'N/A', 'N/A', 'N/A', 'N/A', '472-371-172', '2025-05-07 12:20:26', '2025-05-07 12:20:26'),
(83, 'MTOOO3', '2002006033', '1490-0020-6309', '09-000044576-1', 'N/A', '903-001-011', '2025-05-07 08:00:00', '2025-05-07 08:00:00'),
(84, 'ACT002', '2005693529', '121173188561', '090000981817', '04-3410762-1', '943-214-531', '2025-05-07 12:37:37', '2025-05-07 12:37:37'),
(85, 'SB2022-08', 'N/A', 'N/A', 'N/A', '04-0859030-3', '268-708-603-000', '2025-05-07 12:58:41', '2025-05-08 08:00:00'),
(86, 'MHO-001', '2003625436', '1210-98700773', '03-000237410-9', 'N/A', '264-052-519', '2025-05-07 13:13:03', '2025-05-07 13:13:03'),
(87, 'ACT001', 'N/A', '1211-0599-3096', '01-050738494-9', '02-2477278-7', '306-597-853-000', '2025-05-07 16:03:15', '2025-05-07 16:03:15'),
(88, 'SWD-002', '02004041821', '1210-0582-3452', '09-2000-387810', 'N/A', '306-224-964-000', '2025-05-07 16:08:35', '2025-05-07 16:08:35'),
(89, 'OMM005', '2006127966', '121307333233', '092538214533', 'UMID 0111-5764121-4', '614809051', '2025-05-07 16:17:29', '2025-05-07 16:17:29'),
(90, 'MTO-006', '200 200 6095', '1490-0026-6311', '09-000044573-7', '33-2066-641-9', '908-739-863', '2025-05-07 16:27:41', '2025-05-07 16:27:41'),
(91, 'MBO001', 'B64VF-RDD-02-9', '040133166107', '09-00000-1184-2', 'N/A', '138-936-373', '2025-05-08 14:36:34', '2025-05-08 14:36:34'),
(92, 'OMM006', '61012001991', '040140876101', '09-050018211-2', '03-9028316-8', '131-212-894', '2025-05-08 14:48:26', '2025-05-08 14:48:26'),
(93, 'SB2022-07', '2004990343', '1211-76340895', 'N/A', '0414528864', '934-021-866', '2025-05-08 14:54:19', '2025-05-08 08:00:00'),
(94, 'SBO004', '02005612332', '1490-0012-5116', '09-050072861-1', '04-3281614-7', '922-152-861', '2025-05-08 14:59:07', '2025-05-08 08:00:00'),
(95, 'SBO002', '72102201915', '040134315310', '09-2002806101', '33-9248766-0', '901-553-465', '2025-05-08 15:10:12', '2025-05-08 08:00:00'),
(96, 'GSO-006', '2005693525', '121262629131', '09-100665650-3', '04-0941292-7', '175-950-829-000', '2025-05-08 15:15:21', '2025-05-08 15:15:21'),
(97, 'GSO008', 'N/A', '1211-8951-8705', '09-050500785-8', '04-35120526-8', '473-735-397-000', '2025-05-08 15:23:13', '2025-05-08 15:23:13'),
(98, 'OMN038', 'N/A', 'N/A', '09-025545486-1', '3465259794', '345-914-679', '2025-05-08 15:28:39', '2025-05-08 15:28:39'),
(99, 'SBO015', '2005695134', '121232661120', '09-025636675-3', '0429465378', '295-942-806-000', '2025-05-08 15:33:07', '2025-05-08 15:33:07'),
(100, 'LDR008', 'N/A', 'N/A', '04-1018003-5818-0003', '040983229-3', '918-812-146', '2025-05-08 08:00:00', '2025-05-08 08:00:00'),
(101, 'HRM007', 'N/A', '1213-0367-1062', '09-025867503-6', '04-4373121-1', '367-324-779-000', '2025-05-08 08:00:00', '2025-05-08 08:00:00'),
(102, 'ASS010', 'N/A', 'N/A', '09-250685938-9', 'N/A', 'N/A', '2025-05-08 15:53:07', '2025-05-08 15:53:07'),
(103, 'OMM-0011', 'N/A', 'N/A', '09-25184289-5', '04-4323708-7', '399-025-2546-00000', '2025-05-08 15:58:27', '2025-05-08 15:58:27'),
(104, 'MEO003', '2003965003', '121077691205', '09-200755791-6', 'N/A', '293-010-901', '2025-05-08 16:04:29', '2025-05-08 16:04:29'),
(105, 'AGR008', '2006020460', '121253192640', '09-250688893-1', '0442559261', '643-757-613-00000', '2025-05-08 16:12:04', '2025-05-08 16:12:04'),
(106, 'SBO-015', '2004146715', '1210 1840 9855', '09-200923584-1', 'N/A', '933-190-240', '2025-05-08 16:17:04', '2025-05-08 16:17:04'),
(107, 'MEO001', '2003965004', '1210-6964-8666', '0920087161', '04-0600415-0', '146-053-871', '2025-05-08 16:26:45', '2025-05-08 16:26:45'),
(108, 'MTO001', '2002006644', '1490-0022-0368', '09-000063740-7', 'N/A', '926-939-054', '2025-05-08 16:32:38', '2025-05-08 16:32:38'),
(109, 'OMM001', '2000977466', '1210-41006116', '19-090002573-8', '33-1281047-7', '130-102-600', '2025-05-08 08:00:00', '2025-05-17 16:00:00'),
(110, 'SBO001', '2002000417', '040314342103', '18-000084762-7', 'N/A', '174-055-369-000', '2025-05-08 16:56:40', '2025-05-17 16:00:00'),
(111, 'SWD006', 'N/A', '1212-3967-6351', '09201133559-6', '04-1849647-1', '251-767-137', '2025-05-08 17:00:38', '2025-05-08 17:00:38'),
(112, 'MEO008', 'N/A', '121093481888', '090503730064', '0426612289', '317240808000', '2025-05-08 17:04:26', '2025-05-08 17:04:26'),
(113, 'MEO03', '2006127967', '121292415548', '012625537582', 'N/A', '748-134-405-000', '2025-05-08 17:09:33', '2025-05-08 17:09:33'),
(114, 'HRM004', '2004155019', '121031928133', '09-2007100924', '04-218-6722-0', '934-490-296', '2025-05-08 08:00:00', '2025-05-11 05:54:17'),
(115, 'AGR013', 'N/A', 'N/A', '09-200846244-7', '04-2575645-0', '707-494-231', '2025-05-08 17:23:32', '2025-05-08 17:23:32'),
(116, 'SB2022-03', '2005612333', 'N/A', '03-050556521-1', '0111-0416659-3', '275-043-694-000', '2025-05-08 17:31:37', '2025-05-08 17:31:37'),
(117, 'SBO-004', '2002006696', '1210-20309997', '090000947325', '0111-0389651-8', '151-041-449', '2025-05-08 17:37:18', '2025-05-08 17:37:18'),
(118, 'MHO003', '2005-205-830', '1210-2666-0584', '19-052272263-8', '33-0881487-2', '177-477-455', '2025-05-08 17:43:31', '2025-05-08 17:43:31'),
(119, '148', 'N/A', '1212-1754-1748', '0105-2269-9212', '34-7277567-2', '476-182-580-000', '2025-05-08 17:48:01', '2025-05-08 17:48:01'),
(120, 'OMM003', '2003285966', '1211-6997-0222', '09-2506840920', '0437467371', '3282-44437-0000', '2025-05-08 17:53:24', '2025-05-08 17:53:24'),
(121, 'SWD026', 'N/A', '121311482714', '09-250536377-0', 'N/A', '769-882-955', '2025-05-13 00:19:42', '2025-05-13 00:19:42'),
(122, 'LDR003', '2001001173', '104000767313', '09-200011316-8', '33-5909358-7', '246-777-855', '2025-05-13 00:24:56', '2025-05-12 16:00:00'),
(123, 'MEO012', 'N/A', '1210-5621-2025', '09-200929748-2', '04-2131625-0', '281-175-767', '2025-05-13 00:30:57', '2025-05-13 00:30:57'),
(124, 'MBO006', 'N/A', '1212-3296-6251', '09-250687922-3', '04-3817958-7', '752-103-694-000', '2025-05-13 01:12:33', '2025-05-13 01:12:33'),
(125, 'LDR010', 'N/A', '1213-1034-7386', '07-025104331-9', 'N/A', '484802201', '2025-05-13 01:22:46', '2025-05-13 01:22:46'),
(126, 'OMM046', 'N/A', 'N/A', '09-250687354-3', '04-42336798', '722-896-132', '2025-05-13 01:28:59', '2025-05-13 01:28:59'),
(127, 'ASS001', 'N/A', '149001114873', '09-050182290-5', 'N/A', '939-815-823', '2025-05-13 01:32:30', '2025-05-13 01:32:30'),
(128, 'SBO019', '2006019837', '1211-7963-6010', '09-0504-94247-2', 'N/A', '356-727-190-000', '2025-05-13 01:36:29', '2025-05-13 01:36:29'),
(129, 'MHO019', 'N/A', 'N/A', '09-025605330-5', '04-4447818-8', '361-373-899-000', '2025-05-13 01:40:06', '2025-05-13 01:40:06'),
(130, 'AGR031', 'N/A', '1212-9538-9162', '0802-6668-4944', '04-4307502-7', '360-885-963-000', '2025-05-13 01:44:10', '2025-05-13 01:44:10'),
(131, 'SWD001', 'BP-2002085362', '149060243158', '19-089821472', 'N/A', '220-398-890', '2025-05-13 01:50:51', '2025-05-13 01:50:51'),
(132, 'MH009', 'N/A', '121187802018', '092008572374', 'N/A', '3368372050000', '2025-05-13 01:54:45', '2025-05-13 01:54:45'),
(133, 'PDC008', 'N/A', '121253220525', '09-025676748-0', '0442559397', '631-291-034-000', '2025-05-13 01:59:14', '2025-05-13 01:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `leave_files`
--

DROP TABLE IF EXISTS `leave_files`;
CREATE TABLE IF NOT EXISTS `leave_files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `folder_id` int NOT NULL,
  `filename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `folder_id` (`folder_id`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_files`
--

INSERT INTO `leave_files` (`id`, `folder_id`, `filename`, `uploaded_at`) VALUES
(1, 1, 'ABRAHAM, ELLEN M. .pdf', '2025-05-13 13:41:05'),
(2, 2, 'ACERIMO, CARMELITA V..pdf', '2025-05-13 16:06:08'),
(3, 3, 'AGBING, MICKAELA M. .pdf', '2025-05-13 16:06:13'),
(4, 4, 'AGUILA, LOTALIE V. .pdf', '2025-05-13 16:06:22'),
(5, 5, 'ALFILER, EMMANUEL A. .pdf', '2025-05-13 16:06:32'),
(6, 6, 'ANDAL, AILEEN L. .pdf', '2025-05-13 16:06:38'),
(7, 7, 'ARIOLA, ALWIN E..pdf', '2025-05-13 16:06:43'),
(8, 8, 'ATIENZA, JEFFREY C..pdf', '2025-05-13 16:06:49'),
(9, 9, 'AVEO, MYLENE B..pdf', '2025-05-13 16:06:54'),
(10, 10, 'BABADILLA, ROWENA R..pdf', '2025-05-13 16:06:58'),
(11, 11, 'BAGIOEN, MARY CLAIRE S..pdf', '2025-05-13 16:07:03'),
(12, 12, 'BALITA, ANNABELLE S..pdf', '2025-05-13 16:07:08'),
(13, 13, 'BARROGO, ALJOHNRY S..pdf', '2025-05-13 16:07:14'),
(14, 14, 'BAUTISTA, CAMILLE O..pdf', '2025-05-13 16:07:20'),
(15, 15, 'BAUTISTA, MARIO D..pdf', '2025-05-13 16:07:27'),
(16, 16, 'BENEDICTO, RONALDO A..pdf', '2025-05-13 16:07:35'),
(17, 17, 'BINAY, ARLYN O..pdf', '2025-05-13 16:07:42'),
(18, 18, 'BISCOCHO, MYLENE M..pdf', '2025-05-13 16:07:49'),
(19, 19, 'BRUCAL, RICHARD C. .pdf', '2025-05-13 16:07:55'),
(20, 20, 'CABRERA, MARJORIE O..pdf', '2025-05-13 16:08:02'),
(21, 21, 'CALINISAN, LOURDES O..pdf', '2025-05-13 16:08:10'),
(22, 22, 'CARAAN, KARLA M. .pdf', '2025-05-13 16:08:18'),
(23, 23, 'CARAAN, LENILYN C. .pdf', '2025-05-13 16:08:25'),
(24, 24, 'CARINGAL, LILIAN E. .pdf', '2025-05-13 16:08:33'),
(25, 25, 'CASTILLO, LORENA M. .pdf', '2025-05-13 16:08:45'),
(26, 26, 'CASTILLO, MIAN S..pdf', '2025-05-13 16:08:52'),
(27, 27, 'CUEVAS, REA MAE C..pdf', '2025-05-13 16:08:59'),
(28, 28, 'DE LA PAZ, ROSARIE C..pdf', '2025-05-13 16:09:07'),
(29, 29, 'DE LEON, RODANTE G..pdf', '2025-05-13 16:09:16'),
(30, 30, 'DE OCAMPO, LEMUEL V..pdf', '2025-05-13 16:09:22'),
(31, 31, 'DEL MUNDO, HERWIN D..pdf', '2025-05-13 16:09:32'),
(32, 32, 'DEL MUNDO, RONALDO A..pdf', '2025-05-13 16:09:43'),
(33, 33, 'DELA PAZ, ROSARIE D..pdf', '2025-05-13 16:09:57'),
(34, 34, 'DIMAANO, FERDINAND L. .pdf', '2025-05-13 16:10:08'),
(35, 35, 'DIMAYUGA, EVA P..pdf', '2025-05-13 16:10:29'),
(36, 36, 'ESMEDILLA, GLENN JOSHUA M..pdf', '2025-05-13 16:10:36'),
(37, 37, 'ESMEDILLA, RUEL A..pdf', '2025-05-13 16:10:43'),
(38, 38, 'FEDERICO, JELLO MAE I..pdf', '2025-05-13 16:11:01'),
(39, 39, 'FELIPE, CHRISTIAN M..pdf', '2025-05-13 16:11:16'),
(40, 40, 'FLORES, KIMBERLY M..pdf', '2025-05-13 16:11:22'),
(41, 41, 'FLORO, ARNEL D..pdf', '2025-05-13 16:11:30'),
(42, 42, 'GONZALES, ABEGAEL L..pdf', '2025-05-13 16:11:38'),
(43, 45, 'GONZALES, FELICIANO O..pdf', '2025-05-13 16:11:47'),
(44, 43, 'GONZALES, GILBERT O..pdf', '2025-05-13 16:11:55'),
(45, 44, 'GONZALES, MARK JOHN DANNYL D..pdf', '2025-05-13 16:12:04'),
(46, 46, 'GORDO, CAMILLE C..pdf', '2025-05-13 16:12:14'),
(47, 47, 'GUEVARRA, GRACE L..pdf', '2025-05-13 16:12:21'),
(48, 48, 'GUNDA, JUDIEL A..pdf', '2025-05-13 16:12:30'),
(49, 49, 'HERNANDEZ, CHRISTIAN JAMES C..pdf', '2025-05-13 16:29:06'),
(50, 50, 'HERNANDEZ, NENET M..pdf', '2025-05-13 16:29:15'),
(51, 51, 'HERNANDEZ. MARY ANN M..pdf', '2025-05-13 16:29:22'),
(52, 52, 'HIDALGO, LADY IVY T..pdf', '2025-05-13 16:29:30'),
(53, 53, 'ILAGAN, JANET M. .pdf', '2025-05-13 16:29:36'),
(54, 54, 'ILAGAN, JAY M..pdf', '2025-05-13 16:29:44'),
(55, 55, 'ILAGAN, KRISNO D..pdf', '2025-05-13 16:29:56'),
(56, 56, 'ILAGAN, WILKIM D..pdf', '2025-05-13 16:30:19'),
(57, 57, 'INGALLA, SAMANTHA ABIGAIL M..pdf', '2025-05-13 19:17:48'),
(58, 58, 'KASILAG, KAREN U..pdf', '2025-05-13 19:18:17'),
(59, 59, 'KATIGBAK, REVELYN G..pdf', '2025-05-13 19:18:28'),
(60, 60, 'KATIMBANG, GELYN M..pdf', '2025-05-13 19:18:38'),
(61, 61, 'LACSON, JOEY G. .pdf', '2025-05-13 19:18:47'),
(62, 62, 'LALAMUNAN, YVAN JAMES H. .pdf', '2025-05-13 19:18:55'),
(63, 63, 'LAQUI, KAREN JOY A..pdf', '2025-05-13 19:19:06'),
(64, 64, 'LAQUI, MERLYN C. .pdf', '2025-05-13 19:19:15'),
(65, 65, 'LESCANO, DEBBIE M..pdf', '2025-05-13 19:19:26'),
(66, 66, 'LEYESA, GERARD T..pdf', '2025-05-13 19:19:35'),
(67, 67, 'LEYESA, MA. TERESA T..pdf', '2025-05-13 19:19:43'),
(70, 68, 'LITAN, RHODA P..pdf', '2025-05-13 19:20:47'),
(71, 69, 'LOJO, NOREEN M..pdf', '2025-05-13 19:21:08'),
(72, 70, 'LUBI, MICHAEL L. .pdf', '2025-05-13 19:21:20'),
(73, 71, 'LUBIS, ABEGAEL.pdf', '2025-05-13 19:21:31'),
(74, 72, 'LUBIS, HILDA L. .pdf', '2025-05-13 19:21:40'),
(75, 73, 'MAGPANTAY, CONCEPCION M..pdf', '2025-05-13 19:21:50'),
(76, 74, 'MAGPANTAY, ERWIN L..pdf', '2025-05-13 19:22:03'),
(77, 75, 'MALABAG, ROWELL B..pdf', '2025-05-13 19:22:15'),
(78, 76, 'MALABANAN, MIRASOL E..pdf', '2025-05-13 19:22:24'),
(79, 77, 'MALALUAN, EMILIA R..pdf', '2025-05-13 19:22:38'),
(80, 78, 'MANALO, ALVIN L..pdf', '2025-05-13 19:22:48'),
(81, 79, 'MANALO, ANGELITA L..pdf', '2025-05-13 19:22:58'),
(82, 80, 'MANALO, JOEL L..pdf', '2025-05-13 19:23:06'),
(83, 81, 'MANALO, MELITON A..pdf', '2025-05-13 19:23:17'),
(84, 82, 'MANALO, NOVILITO M..pdf', '2025-05-13 19:23:28'),
(85, 83, 'MANALO, PRIMROSE B..pdf', '2025-05-13 19:23:35'),
(86, 84, 'MANALO, ROY A..pdf', '2025-05-13 19:23:42'),
(87, 85, 'MANDIGMA, ALAIZA L..pdf', '2025-05-13 19:23:51'),
(88, 86, 'MANIGBAS, SHERYL A..pdf', '2025-05-13 19:24:01'),
(89, 87, 'MANIGBAS, VICKY K..pdf', '2025-05-13 19:24:14'),
(90, 88, 'MARALIT, JOCELYN D..pdf', '2025-05-13 19:24:25'),
(91, 89, 'MARANAN, ALONA MAE M..pdf', '2025-05-13 19:24:48'),
(92, 90, 'MATANGUIHAN, EDWIN C..pdf', '2025-05-13 19:24:57'),
(93, 91, 'MATANGUIHAN, JAY V..pdf', '2025-05-13 19:25:07'),
(94, 92, 'MATANGUIHAN, MARIBEL L. .pdf', '2025-05-13 19:25:24'),
(95, 94, 'MATIBAG, MARIBEL L..pdf', '2025-05-13 19:25:34'),
(96, 95, 'MAUHAY, MARILYN S..pdf', '2025-05-13 19:25:45'),
(97, 96, 'MENDOZA, ELAINE D..pdf', '2025-05-13 19:25:55'),
(98, 97, 'METRILLO, JAY A..pdf', '2025-05-13 19:26:03'),
(99, 98, 'NARIO, ANA ROSE M..pdf', '2025-05-13 19:26:12'),
(100, 99, 'OBTIAL, ANGELA JOYCE L..pdf', '2025-05-13 19:26:20'),
(101, 100, 'OCAMPO. GINA D..pdf', '2025-05-13 19:26:30'),
(102, 101, 'OLARTE, MICHAEL R..pdf', '2025-05-13 19:26:38'),
(103, 102, 'OLAVE, FE R..pdf', '2025-05-13 19:26:47'),
(104, 103, 'ORENSE, JONAS KING L..pdf', '2025-05-13 19:26:56'),
(105, 104, 'ORENSE, TRINA CORRINE E..pdf', '2025-05-13 19:27:03'),
(106, 105, 'OSEÑA, NILDA T..pdf', '2025-05-13 19:27:12'),
(107, 106, 'PALCUTO, LANY B..pdf', '2025-05-13 19:27:19'),
(108, 107, 'PALO, CHERYL P..pdf', '2025-05-13 19:27:27'),
(109, 108, 'PANGANIBAN, ELMIE H..pdf', '2025-05-13 19:27:35'),
(110, 109, 'PASIA, JENNY E..pdf', '2025-05-13 19:27:43'),
(111, 110, 'PURA, PRISCILA I..pdf', '2025-05-13 19:27:52'),
(112, 111, 'RABUSA, BABYLYN M..pdf', '2025-05-13 19:28:00'),
(113, 112, 'REYES, GIO H..pdf', '2025-05-13 19:28:09'),
(114, 113, 'REYES, HARLEY ALEXIS V..pdf', '2025-05-13 19:28:17'),
(115, 114, 'REYES, JOAN R..pdf', '2025-05-13 19:28:26'),
(116, 115, 'SADSAD, ELNIÑA JANE L..pdf', '2025-05-13 19:28:33'),
(117, 116, 'SAGUN, SHERLYN T..pdf', '2025-05-13 19:28:39'),
(118, 117, 'SARMIENTO, EDWIN T..pdf', '2025-05-13 19:28:47'),
(119, 118, 'SARMIENTO, MAE ANN M..pdf', '2025-05-13 19:28:53'),
(120, 119, 'SILVA, JONABETH N..pdf', '2025-05-13 19:29:08'),
(121, 120, 'SISCAR, MORENA S..pdf', '2025-05-13 19:29:19'),
(122, 121, 'TAPEL, FLORY I..pdf', '2025-05-13 19:29:28'),
(123, 122, 'TIBAYAN, KRIZA JOY R..pdf', '2025-05-13 19:29:37'),
(124, 123, 'TIPAN, ELSA B..pdf', '2025-05-13 19:29:46'),
(125, 124, 'TIPAN, GALLY D..pdf', '2025-05-13 19:29:55'),
(126, 125, 'TIPAN, LALAINE B..pdf', '2025-05-13 19:30:09'),
(127, 126, 'TIPAN, MARY ROSE L..pdf', '2025-05-13 19:30:20'),
(128, 127, 'TIPAN, NOIME T..pdf', '2025-05-13 19:30:33'),
(129, 128, 'TIQUES, ZAIRELL ROSE I..pdf', '2025-05-13 19:31:09'),
(130, 129, 'TUMAMBING, OLIVER A..pdf', '2025-05-13 19:31:16'),
(131, 130, 'UMALI, MARA M..pdf', '2025-05-13 19:31:24'),
(132, 131, 'VELASQUEZ, GIAN MARCO R..pdf', '2025-05-13 19:31:34'),
(133, 132, 'VERGARA, GIAN LORENZ S..pdf', '2025-05-13 19:31:44'),
(134, 133, 'VERGARA, JOCELYN R..pdf', '2025-05-13 19:31:53'),
(135, 134, 'VERGARA, PEPITO D..pdf', '2025-05-13 19:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `leave_folders`
--

DROP TABLE IF EXISTS `leave_folders`;
CREATE TABLE IF NOT EXISTS `leave_folders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parent_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=135 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_folders`
--

INSERT INTO `leave_folders` (`id`, `name`, `parent_id`) VALUES
(1, 'ABRAHAM, ELLEN M', NULL),
(2, 'ACERIMO, CARMELITA V', NULL),
(3, 'AGBING, MICKAELA M', NULL),
(4, 'AGUILA, LOTALIE V', NULL),
(5, 'ALFILER, EMMANUEL A', NULL),
(6, 'ANDAL, AILEEN L', NULL),
(7, 'ARIOLA, ALWIN E', NULL),
(8, 'ATIENZA, JEFFREY C', NULL),
(9, 'AVEO, MYLENE B', NULL),
(10, 'BABADILLA, ROWENA R', NULL),
(11, 'BAGIOEN, MARY CLAIRE S', NULL),
(12, 'BALITA, ANNABELLE S', NULL),
(13, 'BARROGO, ALJOHNRY S', NULL),
(14, 'BAUTISTA, CAMILLE O', NULL),
(15, 'BAUTISTA, MARIO D', NULL),
(16, 'BENEDICTO, RONALDO A', NULL),
(17, 'BINAY, ARLYN O', NULL),
(18, 'BISCOCHO, MYLENE M', NULL),
(19, 'BRUCAL, RICHARD C', NULL),
(20, 'CABRERA, MARJORIE O', NULL),
(21, 'CALINISAN, LOURDES O', NULL),
(22, 'CARAAN, KARLA M', NULL),
(23, 'CARAAN, LENILYN C', NULL),
(24, 'CARINGAL, LILIAN E', NULL),
(25, 'CASTILLO, LORENA M', NULL),
(26, 'CASTILLO, MIAN S', NULL),
(27, 'CUEVAS, REA MAE C', NULL),
(28, 'DE LA PAZ, ROSARIE C', NULL),
(29, 'DE LEON, RODANTE G', NULL),
(30, 'DE OCAMPO, LEMUEL V', NULL),
(31, 'DEL MUNDO, HERWIN D', NULL),
(32, 'DEL MUNDO, RONALDO A', NULL),
(33, 'DELA PAZ, ROSARIE D', NULL),
(34, 'DIMAANO, FERDINAND L', NULL),
(35, 'DIMAYUGA, EVA P', NULL),
(36, 'ESMEDILLA, GLENN JOSHUA M', NULL),
(37, 'ESMEDILLA, RUEL A', NULL),
(38, 'FEDERICO, JELLO MAE I', NULL),
(39, 'FELIPE, CHRISTIAN M', NULL),
(40, 'FLORES, KIMBERLY M', NULL),
(41, 'FLORO, ARNEL D', NULL),
(42, 'GONZALES, ABEGAEL L', NULL),
(43, 'GONZALES, GILBERT O', NULL),
(44, 'GONZALES, MARK JOHN DANNYL D', NULL),
(45, 'GONZALES, FELICIANO O', NULL),
(46, 'GORDO, CAMILLE C', NULL),
(47, 'GUEVARRA, GRACE L', NULL),
(48, 'GUNDA, JUDIEL A', NULL),
(49, 'HERNANDEZ, CHRISTIAN JAMES C', NULL),
(50, 'HERNANDEZ, NENET M', NULL),
(51, 'HERNANDEZ. MARY ANN M', NULL),
(52, 'HIDALGO, LADY IVY T', NULL),
(53, 'ILAGAN, JANET M', NULL),
(54, 'ILAGAN, JAY M', NULL),
(55, 'ILAGAN, KRISNO D', NULL),
(56, 'ILAGAN, WILKIM D', NULL),
(57, 'INGALLA, SAMANTHA ABIGAIL M', NULL),
(58, 'KASILAG, KAREN U', NULL),
(59, 'KATIGBAK, REVELYN G', NULL),
(60, 'KATIMBANG, GELYN M', NULL),
(61, 'LACSON, JOEY G', NULL),
(62, 'LALAMUNAN, YVAN JAMES H', NULL),
(63, 'LAQUI, KAREN JOY A', NULL),
(64, 'LAQUI, MERLYN C', NULL),
(65, 'LESCANO, DEBBIE M', NULL),
(66, 'LEYESA, GERARD T', NULL),
(67, 'LEYESA, MA. TERESA T', NULL),
(68, 'LITAN, RHODA P', NULL),
(69, 'LOJO, NOREEN M', NULL),
(70, 'LUBI, MICHAEL L', NULL),
(71, 'LUBIS, ABEGAEL', NULL),
(72, 'LUBIS, HILDA L', NULL),
(73, 'MAGPANTAY, CONCEPCION M', NULL),
(74, 'MAGPANTAY, ERWIN L', NULL),
(75, 'MALABAG, ROWELL B', NULL),
(76, 'MALABANAN, MIRASOL E', NULL),
(77, 'MALALUAN, EMILIA R', NULL),
(78, 'MANALO, ALVIN L', NULL),
(79, 'MANALO, ANGELITA L', NULL),
(80, 'MANALO, JOEL L', NULL),
(81, 'MANALO, MELITON A', NULL),
(82, 'MANALO, NOVILITO M', NULL),
(83, 'MANALO, PRIMROSE B', NULL),
(84, 'MANALO, ROY A', NULL),
(85, 'MANDIGMA, ALAIZA L', NULL),
(86, 'MANIGBAS, SHERYL A', NULL),
(87, 'MANIGBAS, VICKY K', NULL),
(88, 'MARALIT, JOCELYN D', NULL),
(89, 'MARANAN, ALONA MAE M', NULL),
(90, 'MATANGUIHAN, EDWIN C', NULL),
(91, 'MATANGUIHAN, JAY V', NULL),
(92, 'MATANGUIHAN, MARIBEL L', NULL),
(94, 'MATIBAG, MARIBEL L', NULL),
(95, 'MAUHAY, MARILYN S', NULL),
(96, 'MENDOZA, ELAINE D', NULL),
(97, 'METRILLO, JAY A', NULL),
(98, 'NARIO, ANA ROSE M', NULL),
(99, 'OBTIAL, ANGELA JOYCE L', NULL),
(100, 'OCAMPO. GINA D', NULL),
(101, 'OLARTE, MICHAEL R', NULL),
(102, 'OLAVE, FE R', NULL),
(103, 'ORENSE, JONAS KING L', NULL),
(104, 'ORENSE, TRINA CORRINE E', NULL),
(105, 'OSEÑA, NILDA T', NULL),
(106, 'PALCUTO, LANY B', NULL),
(107, 'PALO, CHERYL P', NULL),
(108, 'PANGANIBAN, ELMIE H', NULL),
(109, 'PASIA, JENNY E', NULL),
(110, 'PURA, PRISCILA I', NULL),
(111, 'RABUSA, BABYLYN M', NULL),
(112, 'REYES, GIO H', NULL),
(113, 'REYES, HARLEY ALEXIS V', NULL),
(114, 'REYES, JOAN R', NULL),
(115, 'SADSAD, ELNIÑA JANE L', NULL),
(116, 'SAGUN, SHERLYN T', NULL),
(117, 'SARMIENTO, EDWIN T', NULL),
(118, 'SARMIENTO, MAE ANN M', NULL),
(119, 'SILVA, JONABETH N', NULL),
(120, 'SISCAR, MORENA S', NULL),
(121, 'TAPEL, FLORY I', NULL),
(122, 'TIBAYAN, KRIZA JOY R', NULL),
(123, 'TIPAN, ELSA B', NULL),
(124, 'TIPAN, GALLY D', NULL),
(125, 'TIPAN, LALAINE B', NULL),
(126, 'TIPAN, MARY ROSE L', NULL),
(127, 'TIPAN, NOIME T', NULL),
(128, 'TIQUES, ZAIRELL ROSE I', NULL),
(129, 'TUMAMBING, OLIVER A', NULL),
(130, 'UMALI, MARA M', NULL),
(131, 'VELASQUEZ, GIAN MARCO R', NULL),
(132, 'VERGARA, GIAN LORENZ S', NULL),
(133, 'VERGARA, JOCELYN R', NULL),
(134, 'VERGARA, PEPITO D', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_records`
--

DROP TABLE IF EXISTS `service_records`;
CREATE TABLE IF NOT EXISTS `service_records` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `salary` decimal(15,2) NOT NULL,
  `station_place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `abs_wo_pay` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_separated` date DEFAULT NULL,
  `cause_of_separation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `employee_no` (`employee_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`employee_no`) REFERENCES `employee` (`employee_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `government_info`
--
ALTER TABLE `government_info`
  ADD CONSTRAINT `fk_employee_no` FOREIGN KEY (`employee_no`) REFERENCES `employee` (`employee_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_records`
--
ALTER TABLE `service_records`
  ADD CONSTRAINT `service_records_ibfk_1` FOREIGN KEY (`employee_no`) REFERENCES `employee` (`employee_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
