-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 07, 2025 at 12:45 PM
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
  `filename` varchar(255) NOT NULL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `folder_id` (`folder_id`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `name` varchar(255) NOT NULL,
  `parent_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `employee_no` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('superadmin','admin') NOT NULL DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reset_token` varchar(100) DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `employee_no` (`employee_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `employee_no`, `username`, `password`, `email`, `role`, `created_at`, `updated_at`, `reset_token`, `reset_expires`) VALUES
(1, 'HRM-ADMIN', 'admin', '$2y$10$wqvEaTtRI0nEDhPjE9c6yujXvGzJ/ySeu5/ULFfYSiO1MMjYbY1sS', 'jennymaegabuya8@gmail.com', 'superadmin', '2025-02-17 06:35:11', '2025-05-03 02:32:39', '70d595eb8df0e895ef9a01aef3bd56fc307658eb4f7911da752a8da2f4b37d33dac6d38421fba0a9b175e99b106d92d68391', '2025-03-30 11:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `appointed_cert_issuance`
--

DROP TABLE IF EXISTS `appointed_cert_issuance`;
CREATE TABLE IF NOT EXISTS `appointed_cert_issuance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `start_date` date NOT NULL,
  `position` varchar(255) NOT NULL,
  `office_appointed` varchar(255) NOT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointed_cert_issuance`
--

INSERT INTO `appointed_cert_issuance` (`id`, `fullname`, `lastname`, `sex`, `start_date`, `position`, `office_appointed`, `salary`, `pera`, `rta`, `clothing`, `mid_year_bonus`, `year_end_bonus`, `cash_gift`, `productivity_enhancement`, `date_issued`, `created_at`, `updated_at`) VALUES
(3, 'Hon. Atty. Juan Dela Cruz', 'Dela Cruz', 'Male', '2025-02-01', 'Admin Officer II', 'HR Office', 12500.00, 5600.00, 534534.00, 543543.00, 45345.00, 4345435.00, 4345435.00, 543543.00, '2025-03-07', '2025-03-08 08:05:23', '2025-03-12 05:57:44'),
(4, 'Appointed test huhu', 'Test q ko', 'Male', '2024-12-07', 'Admin Officer 321', 'Assesor\'s Office', 56878.00, 987.00, 6578.00, 788.00, 879.00, 796.00, 5666.00, 7769.00, '2025-04-24', '2025-03-08 08:43:48', '2025-04-24 09:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `elected_cert_issuance`
--

DROP TABLE IF EXISTS `elected_cert_issuance`;
CREATE TABLE IF NOT EXISTS `elected_cert_issuance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `start_date` date NOT NULL,
  `position` varchar(255) NOT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `elected_cert_issuance`
--

INSERT INTO `elected_cert_issuance` (`id`, `fullname`, `lastname`, `sex`, `start_date`, `position`, `salary`, `pera`, `rta`, `clothing`, `mid_year_bonus`, `year_end_bonus`, `cash_gift`, `productivity_enhancement`, `date_issued`, `created_at`, `updated_at`) VALUES
(1, 'Jenny Mae A. Gabuya', 'Gabuya', 'Female', '2025-02-02', 'Admin Officer III', 545345.00, 3234.00, 34234.00, 432432.00, 34234.00, 233432.00, 3234324.00, 34324.00, '2025-03-26', '2025-03-01 10:06:55', '2025-03-26 13:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `employee_no` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `name_extension` varchar(10) DEFAULT NULL,
  `dob` date NOT NULL,
  `pob` varchar(255) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `civil_status` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `blood_type` enum('A+','A-','B+','B-','AB+','AB-','O+','O-','Unknown') DEFAULT 'Unknown',
  `mobile_no` bigint DEFAULT NULL,
  `email_address` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `designation` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `account_status` tinyint(1) NOT NULL DEFAULT '1',
  `hr_staff` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`employee_no`),
  UNIQUE KEY `email_address` (`email_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_no`, `firstname`, `middlename`, `lastname`, `name_extension`, `dob`, `pob`, `sex`, `civil_status`, `address`, `blood_type`, `mobile_no`, `email_address`, `image`, `designation`, `role`, `account_status`, `hr_staff`, `created_at`, `updated_at`) VALUES
('dsfd34', 'Jenny', 'Mae', 'Gabuyav2', 'III', '2025-03-13', 'San Luis, Batangas', 'Female', 'soafer latina', 'Sta. Teresita, Batangas', 'O+', 99230232716, 'jenny@gmail.com', NULL, 'Treasure\'s Office', 'Admin Aide', 0, 0, '2025-03-12 18:04:56', '2025-04-29 16:00:00'),
('EMP001', 'Juan', 'Dela', 'Cruz', 'Jr.', '1985-03-25', 'Manila', 'Male', 'Married', '123 Mabini St., Manila', 'O+', 9171234567, 'juan.cruz@email.com', NULL, '', '', 1, 0, '2025-02-19 14:09:03', '2025-04-23 05:50:52'),
('EMP002', 'Noime', 'T.', 'Tipan', '', '1990-07-12', 'Quezon City', 'Male', 'Married', '456 Rizal Ave., QC', 'A+', 9281234567, 'maria.lopez@email.com', 'Noims.png', 'HR Officer', 'Admin Officer IV', 1, 1, '2025-02-19 14:09:03', '2025-04-23 05:50:52'),
('EMP003', 'Gelyn', 'M.', 'Katimbang', NULL, '1988-05-18', 'Cebu City', 'Female', 'Married', '789 Osmena Blvd., Cebu', 'B+', 9391234567, 'pedro.gonzalez@email.com', 'Gelyn.png', 'HR Assistant', 'Admin Officer II', 1, 1, '2025-02-19 14:09:03', '2025-04-23 05:50:52'),
('EMP004', 'Elmie', 'H.', 'Panganiban', '', '1995-01-20', 'Davao City', 'Female', 'Married', '101 Bonifacio St., Davao', 'AB+', 9491234567, 'ana.fernandez@email.com', 'Elmie.png', 'HR Specialist', 'Admin Aide VI', 1, 1, '2025-02-19 14:09:03', '2025-04-23 05:50:52'),
('EMP005', 'Marjorie', 'O.', 'Cabrera', NULL, '1982-09-05', 'Baguio City', 'Female', 'Single', '202 Marcos Hwy, Baguio', 'O-', 9591234567, 'carlos.rivera@email.com', 'Marjorie.png', 'HR Clerk', 'Admin Aide IV', 1, 1, '2025-02-19 14:09:03', '2025-04-23 05:50:52'),
('EMP006', 'Lenard Joseph', 'V.', 'Ariola', '', '1993-11-15', 'Iloilo City', 'Male', 'Single', '303 Jaro St., Iloilo', 'A-', 9691234567, 'elena.torres@email.com', 'Lenard.png', 'HR Coordinator', 'Job Order', 1, 1, '2025-02-19 14:09:03', '2025-04-23 05:50:52'),
('EMP007', 'Gilbert', 'O.', 'Gonzales', NULL, '1987-06-30', 'Batangas City', 'Male', 'Married', '404 Laurel Ave., Batangas', 'B-', 9791234567, 'rafael.velasco@email.com', 'Gilbert.png', 'HR Associate', 'Admin Aide I', 1, 1, '2025-02-19 14:09:03', '2025-04-23 05:50:52'),
('EMP008', 'Isabel', 'T.', 'Mendoza', '', '1998-02-25', 'Laguna', 'Female', 'Single', '505 Calamba Rd., Laguna', 'AB-', 9891234567, 'isabel.mendoza@email.com', NULL, '', '', 1, 0, '2025-02-19 14:09:03', '2025-04-23 05:50:52'),
('EMP009', 'Miguel', 'R.', 'Domingo', '', '1991-08-09', 'Pampanga', 'Male', 'Married', '606 Angeles St., Pampanga', 'O+', 9991234567, 'miguel.domingo@email.com', NULL, '', '', 1, 0, '2025-02-19 14:09:03', '2025-04-23 05:50:52'),
('EMP010', 'Janet', 'M.', 'Ilagan', '', '1984-12-01', 'Zamboanga City', 'Female', 'Married', '707 Pilar St., Zamboanga', 'A+', 9091234567, 'carmen.reyes@email.com', 'Janet.png', 'Executive Officer', 'Municipal Mayor', 1, 1, '2025-02-19 14:09:03', '2025-04-23 05:50:52'),
('HRM-ADMIN', 'Gally', 'Dimayuga', 'Tipan', '', '1990-06-28', 'CUENCA, BATANGAS', 'Male', 'Single', 'CUENCA, BATANGAS', 'A+', 9123456789, 'admin@gmail.com', 'Gally.png', 'Office of the HRM', 'MHRMO', 1, 1, '2025-02-17 06:33:54', '2025-04-23 05:50:52'),
('saS', 'WEQWS', 'DSAD', '2WEWE', 'dsdda', '2025-03-12', 'sasa', 'Female', 'Single', 'sasa', 'AB-', 23221432434, 'sdas@gmail.com', NULL, '', '', 1, 0, '2025-03-11 22:33:56', '2025-04-23 05:50:52'),
('ssa', 'sas', 'sas', 'sas', 'sa', '2025-03-13', 'sasa', 'Male', 'Other', 'asas', 'B+', 23213820982, 'sas@gmailc.om', NULL, 's', 's', 1, 1, '2025-03-12 17:53:18', '2025-05-02 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` text,
  `color` varchar(255) NOT NULL,
  `sent_mail` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `employee_no` varchar(100) NOT NULL,
  `gsis_no` varchar(20) NOT NULL,
  `pag_ibig_no` varchar(20) NOT NULL,
  `philhealth_no` varchar(20) NOT NULL,
  `sss_no` varchar(20) NOT NULL,
  `tin_no` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gsis_no` (`gsis_no`),
  UNIQUE KEY `pag_ibig_no` (`pag_ibig_no`),
  UNIQUE KEY `philhealth_no` (`philhealth_no`),
  UNIQUE KEY `sss_no` (`sss_no`),
  UNIQUE KEY `tin_no` (`tin_no`),
  KEY `employee_no` (`employee_no`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `government_info`
--

INSERT INTO `government_info` (`id`, `employee_no`, `gsis_no`, `pag_ibig_no`, `philhealth_no`, `sss_no`, `tin_no`, `created_at`, `updated_at`) VALUES
(2, 'HRM-ADMIN', '4332423-3423', '3287-387245', '94586-7863', '4353-2435', '325436-32422', '2025-03-11 08:25:50', '2025-03-11 08:25:50'),
(6, 'saS', '31', '32', '325', '536', '61', '2025-03-11 22:33:56', '2025-03-11 22:33:56'),
(7, 'ssa', 'NA', 'NA', 'NA', 'NA', 'NA', '2025-03-12 17:53:18', '2025-05-02 16:00:00'),
(8, 'dsfd34', '3223-4', '3123-4', '12312-4', '3123-4', '2313-4', '2025-03-12 18:04:56', '2025-04-29 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `leave_files`
--

DROP TABLE IF EXISTS `leave_files`;
CREATE TABLE IF NOT EXISTS `leave_files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `folder_id` int NOT NULL,
  `filename` varchar(255) NOT NULL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `folder_id` (`folder_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_folders`
--

DROP TABLE IF EXISTS `leave_folders`;
CREATE TABLE IF NOT EXISTS `leave_folders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_records`
--

DROP TABLE IF EXISTS `service_records`;
CREATE TABLE IF NOT EXISTS `service_records` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(100) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `designation` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `salary` decimal(15,2) NOT NULL,
  `station_place` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `abs_wo_pay` varchar(50) DEFAULT NULL,
  `date_separated` date DEFAULT NULL,
  `cause_of_separation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `employee_no` (`employee_no`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service_records`
--

INSERT INTO `service_records` (`id`, `employee_no`, `from_date`, `to_date`, `designation`, `status`, `salary`, `station_place`, `branch`, `abs_wo_pay`, `date_separated`, `cause_of_separation`, `created_at`, `updated_at`) VALUES
(2, 'HRM-ADMIN', '2025-03-05', '2025-03-07', 'dfsdsfs', 'fdf', 3232.00, 'HRM', 'M-Kahoy', 'NA', '2025-03-11', 'NA', '2025-03-04 16:00:00', '2025-03-24 07:07:28'),
(3, 'HRM-ADMIN', '2024-03-08', '2025-03-06', 'dfsdsfs', 'Regular', 12500.00, 'HRM', 'MKahoy', '--td--', '2025-03-07', 'NA', '2025-03-07 16:00:00', '2025-03-24 07:07:28'),
(4, 'EMP009', '2025-03-08', '2025-04-01', 'sa', 'sa', 1234345.00, 'sdsd', 'dsds', 'dsd', '2025-03-07', 'dsds', '2025-03-07 16:00:00', '0000-00-00 00:00:00'),
(5, 'EMP009', '2025-03-07', '2025-03-04', 'sa', 'NA', 232323.00, 'sa', 'sa', 'NA', '2025-03-04', 'test toast', '2025-03-07 16:00:00', '0000-00-00 00:00:00'),
(6, 'HRM-ADMIN', '2025-03-11', '2025-03-12', 'dfsdsfs', 'sdjhasjd', 38973487.00, 'HRM', 'hsdjah', '--td--', '2025-03-10', 'NA', '2025-03-10 16:00:00', '2025-03-24 07:07:28'),
(7, 'HRM-ADMIN', '2025-03-11', '2025-03-12', 'dfsdsfs', 'sas', 45345.00, 'HRM', '6gdf', '546', '2025-03-12', 'hehehhhe', '2025-03-10 16:00:00', '2025-03-24 07:07:28'),
(8, 'EMP009', '2025-04-30', '2025-05-02', 'ss', 'sa', 21.00, 'sa', 'dfd', 'dfd', '2025-04-29', 'hehe test', '2025-04-29 16:00:00', '0000-00-00 00:00:00');

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
  ADD CONSTRAINT `government_info_ibfk_1` FOREIGN KEY (`employee_no`) REFERENCES `employee` (`employee_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_records`
--
ALTER TABLE `service_records`
  ADD CONSTRAINT `service_records_ibfk_1` FOREIGN KEY (`employee_no`) REFERENCES `employee` (`employee_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
