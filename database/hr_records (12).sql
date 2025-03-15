-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 15, 2025 at 06:01 AM
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('superadmin','admin') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `employee_no` (`employee_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `employee_no`, `username`, `password`, `email`, `role`, `created_at`, `updated_at`) VALUES
(1, 'HRM-ADMIN', 'admin', '$2y$10$T1gtzJXFqsYy6Y7Bujq6KOm9WOjsL7UTT1Czby3L/kL.zRVz0MGPq', 'admin1@gmail.com', 'superadmin', '2025-02-17 06:35:11', '2025-02-18 01:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `appointed_cert_issuance`
--

DROP TABLE IF EXISTS `appointed_cert_issuance`;
CREATE TABLE IF NOT EXISTS `appointed_cert_issuance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sex` enum('Male','Female') COLLATE utf8mb4_general_ci NOT NULL,
  `start_date` date NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `office_appointed` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointed_cert_issuance`
--

INSERT INTO `appointed_cert_issuance` (`id`, `fullname`, `lastname`, `sex`, `start_date`, `position`, `office_appointed`, `salary`, `pera`, `rta`, `clothing`, `mid_year_bonus`, `year_end_bonus`, `cash_gift`, `productivity_enhancement`, `date_issued`, `created_at`, `updated_at`) VALUES
(3, 'Hon. Atty. Juan Dela Cruz', 'Dela Cruz', 'Male', '2025-02-01', 'Admin Officer II', 'HR Office', 12500.00, 5600.00, 534534.00, 543543.00, 45345.00, 4345435.00, 4345435.00, 543543.00, '2025-03-07', '2025-03-08 08:05:23', '2025-03-12 05:57:44'),
(4, 'Appointed test huhu', 'Test q ko', 'Male', '2024-12-07', 'Admin Officer 321', 'Assesor\'s Office', 56878.00, 987.00, 6578.00, 788.00, 879.00, 796.00, 5666.00, 7769.00, '2025-03-12', '2025-03-08 08:43:48', '2025-03-12 01:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `elected_cert_issuance`
--

DROP TABLE IF EXISTS `elected_cert_issuance`;
CREATE TABLE IF NOT EXISTS `elected_cert_issuance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sex` enum('Male','Female') COLLATE utf8mb4_general_ci NOT NULL,
  `start_date` date NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `elected_cert_issuance`
--

INSERT INTO `elected_cert_issuance` (`id`, `fullname`, `lastname`, `sex`, `start_date`, `position`, `salary`, `pera`, `rta`, `clothing`, `mid_year_bonus`, `year_end_bonus`, `cash_gift`, `productivity_enhancement`, `date_issued`, `created_at`, `updated_at`) VALUES
(1, 'Jenny Mae A. Gabuya', 'Gabuya', 'Female', '2025-02-02', 'Admin Officer III', 545345.00, 3234.00, 34234.00, 432432.00, 34234.00, 233432.00, 3234324.00, 34324.00, '2025-03-08', '2025-03-01 10:06:55', '2025-03-08 08:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `employee_no` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `middlename` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `name_extension` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `pob` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sex` enum('Male','Female') COLLATE utf8mb4_general_ci NOT NULL,
  `civil_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `blood_type` enum('A+','A-','B+','B-','AB+','AB-','O+','O-','Unknown') COLLATE utf8mb4_general_ci DEFAULT 'Unknown',
  `mobile_no` bigint DEFAULT NULL,
  `email_address` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`employee_no`),
  UNIQUE KEY `email_address` (`email_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_no`, `firstname`, `middlename`, `lastname`, `name_extension`, `dob`, `pob`, `sex`, `civil_status`, `address`, `blood_type`, `mobile_no`, `email_address`, `image`, `created_at`, `updated_at`) VALUES
('dsfd34', 'Jenny', 'Mae', 'Gabuyav2', 'III', '2025-03-13', 'San Luis, Batangas', 'Male', 'soafer latina', 'Sta. Teresita, Batangas', 'O+', 99230232716, 'jenny@gmail.com', NULL, '2025-03-12 18:04:56', '2025-03-14 05:13:37'),
('EMP001', 'Juan', 'Dela', 'Cruz', 'Jr.', '1985-03-25', 'Manila', 'Male', 'Married', '123 Mabini St., Manila', 'O+', 9171234567, 'juan.cruz@email.com', NULL, '2025-02-19 14:09:03', '2025-02-19 14:14:08'),
('EMP002', 'Noime', 'T.', 'Tipan', '', '1990-07-12', 'Quezon City', 'Male', 'Married', '456 Rizal Ave., QC', 'A+', 9281234567, 'maria.lopez@email.com', 'Noims.png', '2025-02-19 14:09:03', '2025-03-13 16:00:00'),
('EMP003', 'Gelyn', 'M.', 'Katimbang', NULL, '1988-05-18', 'Cebu City', 'Female', 'Married', '789 Osmena Blvd., Cebu', 'B+', 9391234567, 'pedro.gonzalez@email.com', 'Gelyn.png', '2025-02-19 14:09:03', '2025-03-06 04:37:19'),
('EMP004', 'Elmie', 'H.', 'Panganiban', '', '1995-01-20', 'Davao City', 'Female', 'Married', '101 Bonifacio St., Davao', 'AB+', 9491234567, 'ana.fernandez@email.com', 'Elmie.png', '2025-02-19 14:09:03', '2025-03-06 04:35:51'),
('EMP005', 'Marjorie', 'O.', 'Cabrera', NULL, '1982-09-05', 'Baguio City', 'Female', 'Single', '202 Marcos Hwy, Baguio', 'O-', 9591234567, 'carlos.rivera@email.com', 'Marjorie.png', '2025-02-19 14:09:03', '2025-03-06 04:36:07'),
('EMP006', 'Lenard Joseph', 'V.', 'Ariola', '', '1993-11-15', 'Iloilo City', 'Male', 'Single', '303 Jaro St., Iloilo', 'A-', 9691234567, 'elena.torres@email.com', 'Lenard.png', '2025-02-19 14:09:03', '2025-03-06 04:36:38'),
('EMP007', 'Gilbert', 'O.', 'Gonzales', NULL, '1987-06-30', 'Batangas City', 'Male', 'Married', '404 Laurel Ave., Batangas', 'B-', 9791234567, 'rafael.velasco@email.com', 'Gilbert.png', '2025-02-19 14:09:03', '2025-03-06 04:47:28'),
('EMP008', 'Isabel', 'T.', 'Mendoza', '', '1998-02-25', 'Laguna', 'Female', 'Single', '505 Calamba Rd., Laguna', 'AB-', 9891234567, 'isabel.mendoza@email.com', NULL, '2025-02-19 14:09:03', '2025-02-19 14:14:28'),
('EMP009', 'Miguel', 'R.', 'Domingo', '', '1991-08-09', 'Pampanga', 'Male', 'Married', '606 Angeles St., Pampanga', 'O+', 9991234567, 'miguel.domingo@email.com', NULL, '2025-02-19 14:09:03', '2025-02-19 14:14:31'),
('EMP010', 'Janet', 'M.', 'Ilagan', '', '1984-12-01', 'Zamboanga City', 'Female', 'Married', '707 Pilar St., Zamboanga', 'A+', 9091234567, 'carmen.reyes@email.com', 'Janet.png', '2025-02-19 14:09:03', '2025-03-06 04:35:03'),
('HRM-ADMIN', 'Gally', 'Dimayuga', 'Tipan', '', '1990-06-28', 'CUENCA, BATANGAS', 'Male', 'Single', 'CUENCA, BATANGAS', 'A+', 9123456789, 'admin@gmail.com', 'Gally.png', '2025-02-17 06:33:54', '2025-03-14 01:59:04'),
('saS', 'WEQWS', 'DSAD', '2WEWE', 'dsdda', '2025-03-12', 'sasa', 'Female', 'Single', 'sasa', 'AB-', 23221432434, 'sdas@gmail.com', NULL, '2025-03-11 22:33:56', '2025-03-11 22:33:56'),
('ssa', 'sas', 'sas', 'sas', 'sa', '2025-03-13', 'sasa', 'Male', 'Other', 'asas', 'B+', 23213820982, 'sas@gmailc.om', NULL, '2025-03-12 17:53:18', '2025-03-12 16:00:00');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_date`, `end_date`, `description`, `color`) VALUES
(1, 'sdsdsd', '2025-03-15 13:15:00', '2025-03-16 13:15:00', 'dsderewr', '#ff8585'),
(2, 'Zumba', '2025-03-24 08:00:00', '2025-03-24 10:00:00', 'Zumba Wellness Fitness activity for the elders and youth!', ''),
(8, 'sa', '2025-03-15 12:58:00', '2025-03-15 13:00:00', 'sasa', ''),
(11, 'sana gumana ang start and end', '2025-03-18 12:30:00', '2025-03-20 14:30:00', 'sdhsjdsa', '#ff0000');

-- --------------------------------------------------------

--
-- Table structure for table `government_info`
--

DROP TABLE IF EXISTS `government_info`;
CREATE TABLE IF NOT EXISTS `government_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `gsis_no` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `pag_ibig_no` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `philhealth_no` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `sss_no` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tin_no` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gsis_no` (`gsis_no`),
  UNIQUE KEY `pag_ibig_no` (`pag_ibig_no`),
  UNIQUE KEY `philhealth_no` (`philhealth_no`),
  UNIQUE KEY `sss_no` (`sss_no`),
  UNIQUE KEY `tin_no` (`tin_no`),
  KEY `employee_no` (`employee_no`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `government_info`
--

INSERT INTO `government_info` (`id`, `employee_no`, `gsis_no`, `pag_ibig_no`, `philhealth_no`, `sss_no`, `tin_no`, `created_at`, `updated_at`) VALUES
(2, 'HRM-ADMIN', '4332423-3423', '3287-387245', '94586-7863', '4353-2435', '325436-32422', '2025-03-11 08:25:50', '2025-03-11 08:25:50'),
(6, 'saS', '31', '32', '325', '536', '61', '2025-03-11 22:33:56', '2025-03-11 22:33:56'),
(7, 'ssa', 'sawqwe', 'weqwe', '3243', 'dweqw', '3213', '2025-03-12 17:53:18', '2025-03-12 16:00:00'),
(8, 'dsfd34', '3223-4', '3123-4', '12312-4', '3123-4', '2313-4', '2025-03-12 18:04:56', '2025-03-13 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_staffs`
--

DROP TABLE IF EXISTS `hr_staffs`;
CREATE TABLE IF NOT EXISTS `hr_staffs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `designation` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_no` (`employee_no`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hr_staffs`
--

INSERT INTO `hr_staffs` (`id`, `employee_no`, `designation`, `role`) VALUES
(1, 'HRM-ADMIN', 'Office of the HRM', 'MHRMO'),
(2, 'EMP002', 'HR Officer', 'Admin Officer IV'),
(3, 'EMP003', 'HR Assistant', 'Admin Officer II'),
(4, 'EMP004', 'HR Specialist', 'Admin Aide VI'),
(5, 'EMP005', 'HR Clerk', 'Admin Aide IV'),
(6, 'EMP006', 'HR Coordinator', 'Job Order'),
(7, 'EMP007', 'HR Associate', 'Admin Aide I'),
(10, 'EMP010', 'Executive Officer', 'Municipal Mayor');

-- --------------------------------------------------------

--
-- Table structure for table `service_records`
--

DROP TABLE IF EXISTS `service_records`;
CREATE TABLE IF NOT EXISTS `service_records` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `salary` decimal(15,2) NOT NULL,
  `station_place` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `abs_wo_pay` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_separated` date DEFAULT NULL,
  `cause_of_separation` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `employee_no` (`employee_no`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_records`
--

INSERT INTO `service_records` (`id`, `employee_no`, `from_date`, `to_date`, `designation`, `status`, `salary`, `station_place`, `branch`, `abs_wo_pay`, `date_separated`, `cause_of_separation`, `created_at`, `updated_at`) VALUES
(2, 'HRM-ADMIN', '2025-03-05', '2025-03-07', 'fdf', 'fdf', 3232.00, 'HRM', 'M-Kahoy', 'NA', '2025-03-11', 'NA', '2025-03-04 16:00:00', '2025-03-05 03:48:06'),
(3, 'HRM-ADMIN', '2024-03-08', '2025-03-06', 'fdf', 'Regular', 12500.00, 'HRM', 'MKahoy', '--td--', '2025-03-07', 'NA', '2025-03-07 16:00:00', '2025-03-12 01:05:40'),
(4, 'EMP009', '2025-03-08', '2025-04-01', 'sa', 'sa', 1234345.00, 'sdsd', 'dsds', 'dsd', '2025-03-07', 'dsds', '2025-03-07 16:00:00', '2025-03-07 16:00:00'),
(5, 'EMP009', '2025-03-07', '2025-03-04', 'dsd', 'ddsd', 232323.00, 'dsd', 'dsd', 'sdds', '2025-03-04', 'as', '2025-03-07 16:00:00', '2025-03-07 16:00:00'),
(6, 'HRM-ADMIN', '2025-03-11', '2025-03-12', 'fdf', 'sdjhasjd', 38973487.00, 'HRM', 'hsdjah', '--td--', '2025-03-10', 'NA', '2025-03-10 16:00:00', '2025-03-12 01:05:40'),
(7, 'HRM-ADMIN', '2025-03-11', '2025-03-12', 'fdf', 'sas', 45345.00, 'HRM', '6gdf', '546', '2025-03-12', 'hehehhhe', '2025-03-10 16:00:00', '2025-03-12 01:05:40');

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
-- Constraints for table `hr_staffs`
--
ALTER TABLE `hr_staffs`
  ADD CONSTRAINT `hr_staffs_ibfk_1` FOREIGN KEY (`employee_no`) REFERENCES `employee` (`employee_no`) ON DELETE CASCADE;

--
-- Constraints for table `service_records`
--
ALTER TABLE `service_records`
  ADD CONSTRAINT `service_records_ibfk_1` FOREIGN KEY (`employee_no`) REFERENCES `employee` (`employee_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
