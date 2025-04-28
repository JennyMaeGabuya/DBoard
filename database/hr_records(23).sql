-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2025 at 05:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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

CREATE TABLE `201_files` (
  `id` int(11) NOT NULL,
  `folder_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `uploaded_at` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `201_files`
--

INSERT INTO `201_files` (`id`, `folder_id`, `filename`, `uploaded_at`) VALUES
(6, 9, 'Bagong-Pilipinas.png', '2025-04-24 18:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `201_folders`
--

CREATE TABLE `201_folders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `employee_no` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('superadmin','admin') NOT NULL DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reset_token` varchar(100) DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `employee_no`, `username`, `password`, `email`, `role`, `created_at`, `updated_at`, `reset_token`, `reset_expires`) VALUES
(1, 'HRM-ADMIN', 'admin', '$2y$10$3AMqxct3hZocbj1VVsdtZeTZwgY8.j4YP.tffVnkPOOVc35/2ekhm', 'jennymaegabuya8@gmail.com', 'superadmin', '2025-02-17 06:35:11', '2025-03-30 03:40:31', '70d595eb8df0e895ef9a01aef3bd56fc307658eb4f7911da752a8da2f4b37d33dac6d38421fba0a9b175e99b106d92d68391', '2025-03-30 11:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `appointed_cert_issuance`
--

CREATE TABLE `appointed_cert_issuance` (
  `id` int(11) NOT NULL,
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `elected_cert_issuance` (
  `id` int(11) NOT NULL,
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `elected_cert_issuance`
--

INSERT INTO `elected_cert_issuance` (`id`, `fullname`, `lastname`, `sex`, `start_date`, `position`, `salary`, `pera`, `rta`, `clothing`, `mid_year_bonus`, `year_end_bonus`, `cash_gift`, `productivity_enhancement`, `date_issued`, `created_at`, `updated_at`) VALUES
(1, 'Jenny Mae A. Gabuya', 'Gabuya', 'Female', '2025-02-02', 'Admin Officer III', 545345.00, 3234.00, 34234.00, 432432.00, 34234.00, 233432.00, 3234324.00, 34324.00, '2025-03-26', '2025-03-01 10:06:55', '2025-03-26 13:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
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
  `mobile_no` bigint(20) DEFAULT NULL,
  `email_address` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `designation` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `account_status` tinyint(1) NOT NULL DEFAULT 1,
  `hr_staff` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_no`, `firstname`, `middlename`, `lastname`, `name_extension`, `dob`, `pob`, `sex`, `civil_status`, `address`, `blood_type`, `mobile_no`, `email_address`, `image`, `designation`, `role`, `account_status`, `hr_staff`, `created_at`, `updated_at`) VALUES
('dsfd34', 'Jenny', 'Mae', 'Gabuyav2', 'III', '2025-03-13', 'San Luis, Batangas', 'Female', 'soafer latina', 'Sta. Teresita, Batangas', 'O+', 99230232716, 'jenny@gmail.com', NULL, 'Treasure\'s Office', 'Admin Aide', 0, 0, '2025-03-12 18:04:56', '2025-04-23 16:00:00'),
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
('ssa', 'sas', 'sas', 'sas', 'sa', '2025-03-13', 'sasa', 'Male', 'Other', 'asas', 'B+', 23213820982, 'sas@gmailc.om', NULL, '', '', 1, 0, '2025-03-12 17:53:18', '2025-04-23 05:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` text DEFAULT NULL,
  `color` varchar(255) NOT NULL,
  `sent_mail` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_date`, `end_date`, `description`, `color`, `sent_mail`) VALUES
(1, 'sdsdsd', '2025-03-15 13:15:00', '2025-03-16 13:15:00', 'dsderewr', '#ff8585', 0),
(2, 'Zumba', '2025-03-24 08:00:00', '2025-03-24 10:00:00', 'Zumba Wellness Fitness activity for the elders and youth!', '', 0),
(8, 'sa', '2025-03-15 12:58:00', '2025-03-15 13:00:00', 'sasa', '', 0),
(11, 'start and end', '2025-03-18 00:00:00', '2025-03-20 00:00:00', 'sdhsjdsa', '#ff0000', 0),
(12, 'test email', '2025-03-30 12:00:00', '2025-03-30 15:00:00', 'hahhaha', '#00dbc2', 1),
(14, 'backup okay', '2025-04-16 20:45:00', '2025-04-16 20:55:00', 'okii', '#d5343c', 1);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `folder_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `uploaded_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `folder_id`, `filename`, `uploaded_at`) VALUES
(6, 11, 'mk-logo.png', '2025-04-24 18:31:53'),
(7, 11, 'CSC-11-Professional-and-Sub-Professional-Levels-v2-version-1-2.pdf', '2025-04-24 18:33:56'),
(11, 12, 'Advisory_PDS 2017.doc', '2025-04-28 09:41:47'),
(12, 12, 'APPENDIX B Category III and IV Positions.docx', '2025-04-28 09:41:49'),
(13, 12, 'APPENDIX A Glossary of Terms.docx', '2025-04-28 09:41:53'),
(14, 12, 'CS Form No. 34-F Renewal of Casual Appointment - LGU.xls', '2025-04-28 09:43:10'),
(15, 12, 'CS Form No. 34-F Plantilla of Casual Appointment - LGU.xls', '2025-04-28 09:47:06'),
(16, 12, 'CS Form No. 34-E Plantilla of Casual Appointments NGA-GOCC-SUC-LUC.xls', '2025-04-28 09:47:31'),
(17, 12, 'CS Form No. 34-E Plantilla of Casual Appointments NGA-GOCC-SUC.xls', '2025-04-28 09:49:26'),
(18, 12, 'CS Form No. 34-D Plantilla of Casual Appointment - LGU Accredited.xls', '2025-04-28 09:49:30'),
(19, 12, 'CS Form No. 34-C Plantilla of Casual Appointment - LGU Regulated.xls', '2025-04-28 09:49:38'),
(20, 12, 'CS Form No. 34-B Plantilla of Casual Appointment - Accredited.xls', '2025-04-28 09:49:45'),
(21, 12, 'CS Form No. 34-A Plantilla of Casual Appointment - Regulated.xls', '2025-04-28 09:49:47'),
(22, 12, 'CS Form No. 33-B Appointment Form - Accredited.docx', '2025-04-28 09:50:38'),
(23, 12, 'CS Form No. 33-A Revised 2018 Appointment Form - Regulated.docx', '2025-04-28 09:50:41'),
(24, 12, 'CS Form No. 32 Oath of Office.doc', '2025-04-28 09:50:49'),
(25, 12, 'CS Form No. 212 Work Experience Sheet.docx', '2025-04-28 09:50:53'),
(26, 12, 'CS Form No. 212 Personal Data Sheet revised.xlsx', '2025-04-28 09:51:55'),
(27, 12, 'CS Form No. 211 Revised 2018 Medical Certificate.xls', '2025-04-28 09:51:57'),
(28, 12, 'CS Form No. 10 Acceptance of  Resignation.docx', '2025-04-28 09:51:59'),
(29, 12, 'CS Form No. 9 Request for Publication.xlsm', '2025-04-28 09:52:01'),
(30, 12, 'CS Form No. 8 Report on DIBAR.xlsx', '2025-04-28 09:52:03'),
(31, 12, 'CS Form No. 7 Clearance Form.xlsx', '2025-04-28 09:52:45'),
(32, 12, 'CS Form No. 5 Certification thatThere is No Applicant Who Meets All the Qualification Requirements.docx', '2025-04-28 09:52:49'),
(33, 12, 'CS Form No. 4 Certification of  Assumption to Duty.docx', '2025-04-28 09:52:52'),
(34, 12, 'CS Form No. 3 Certificate of  Erasures Alteration.docx', '2025-04-28 09:52:55'),
(35, 12, 'CS Form No. 2 Report on  Appointments Issued.xls', '2025-04-28 09:52:57'),
(36, 12, 'CS Form No. 1 Appointment  Transmittal and Action Form.xls', '2025-04-28 09:53:06'),
(37, 12, 'DBM-CSC Form No. 1 Position Description Forms.xlsx', '2025-04-28 09:55:40'),
(38, 12, 'MC No. 14, s. 2018.pdf', '2025-04-28 09:55:42'),
(39, 12, 'CSC Resolution No. 1800692.pdf', '2025-04-28 09:55:44'),
(40, 12, 'MC No. 16, s. 2017.pdf', '2025-04-28 09:55:46'),
(41, 12, 'TABLE OF CONTENTS.docx', '2025-04-28 09:56:01'),
(42, 14, 'MC No. 07, s. 2013.pdf', '2025-04-28 09:59:50'),
(43, 14, 'MC No. 12, s. 2014.pdf', '2025-04-28 09:59:52'),
(44, 14, 'RA No. 10154.pdf', '2025-04-28 09:59:54'),
(45, 14, 'Reso No. 1302242.pdf', '2025-04-28 10:00:01'),
(46, 14, 'Reso No. 1401642.pdf', '2025-04-28 10:00:04'),
(47, 15, 'Issuances on SALN.pdf', '2025-04-28 10:02:03'),
(48, 15, 'MC No. 02, s. 2008.pdf', '2025-04-28 10:02:15'),
(49, 15, 'MC No. 02, s. 2013.pdf', '2025-04-28 10:02:18'),
(50, 15, 'MC No. 03, s. 2013.pdf', '2025-04-28 10:02:20'),
(51, 15, 'MC No. 05, s. 2010.pdf', '2025-04-28 10:02:24'),
(52, 15, 'MC No. 06, s. 2008.pdf', '2025-04-28 10:02:29'),
(53, 15, 'MC No. 07, s. 2004.pdf', '2025-04-28 10:02:37'),
(54, 15, 'MC No. 09, s. 1991.pdf', '2025-04-28 10:02:50'),
(55, 15, 'MC No. 10, s. 2006.pdf', '2025-04-28 10:06:09'),
(56, 15, 'MC No. 14, s. 2009.pdf', '2025-04-28 10:06:13'),
(57, 15, 'MC No. 20, s. 1994.pdf', '2025-04-28 10:06:15'),
(58, 15, 'OM No. 13, s. 2013.pdf', '2025-04-28 10:06:18'),
(59, 15, 'RA No. 6713.pdf', '2025-04-28 10:06:24'),
(60, 15, 'Reso No. 1100356.pdf', '2025-04-28 10:06:27'),
(61, 15, 'Reso No. 1300455.pdf', '2025-04-28 10:06:32'),
(62, 15, 'Reso No. 1500088.pdf', '2025-04-28 10:06:38'),
(63, 15, 'CSC Resolution No. 2300254.pdf', '2025-04-28 10:06:43'),
(64, 15, 'IRR [RA No. 6713].pdf', '2025-04-28 10:06:46'),
(71, 16, 'CSC 2017 Annual Report.pdf', '2025-04-28 10:23:18'),
(67, 17, 'ARTA Memorandum Circular.pdf', '2025-04-28 10:19:20'),
(68, 17, 'ARTA Dekada 3X5 Tarpaulin.jpg', '2025-04-28 10:20:35'),
(69, 17, 'Anti Red Tape Survey.pdf', '2025-04-28 10:22:09'),
(70, 17, 'Anti Red Tape Act.pdf', '2025-04-28 10:22:15'),
(72, 16, 'CSC 2018 Annual Report.pdf', '2025-04-28 10:23:20'),
(89, 21, 'CSC FOR BARMM CITIZEN’S CHARTER.pdf', '2025-04-28 10:40:33'),
(79, 18, 'ARTA Caravan RFQ.jpg', '2025-04-28 10:27:29'),
(78, 18, 'ARTA Caravan shirt.pdf', '2025-04-28 10:27:26'),
(80, 18, 'ARTA Caravan Form.pdf', '2025-04-28 10:27:32'),
(81, 19, 'Makuha Ka Sa ARTA Entry Form.pdf', '2025-04-28 10:28:19'),
(82, 19, 'Makuha Ka Sa ARTA Contest  Mechanics.pdf', '2025-04-28 10:28:23'),
(83, 20, 'The Report Card Survey - Page 3.pdf', '2025-04-28 10:29:29'),
(84, 20, 'The Report Card Survey - Page 2.pdf', '2025-04-28 10:29:31'),
(85, 20, 'The Report Card Survey - Page 1.pdf', '2025-04-28 10:29:33'),
(88, 21, 'CSC List of CART Officials and Focal Persons.pdf', '2025-04-28 10:40:27'),
(90, 21, 'CSC Citizens Charter 2023 5th Edition.pdf', '2025-04-28 10:40:38'),
(91, 21, 'CSC Citizens Charter 2022 4th Edition.pdf', '2025-04-28 10:40:42'),
(92, 21, 'CSC Citizens Charter 3rd Edition.pdf', '2025-04-28 10:40:45'),
(93, 21, 'CSC Citizens Charter 2nd Edition.pdf', '2025-04-28 10:40:48'),
(94, 22, 'CSC-CARAGA CITIZEN’S CHARTER.pdf', '2025-04-28 10:41:36'),
(95, 23, 'Central Office.pdf', '2025-04-28 10:43:47'),
(96, 23, 'Field Office.pdf', '2025-04-28 10:43:51'),
(97, 23, 'RO - Final.pdf', '2025-04-28 10:43:56'),
(98, 25, '4th Issue of the Civil Service Reporter for 2015.pdf', '2025-04-28 10:51:59'),
(99, 25, '3th Issue of the Civil Service Reporter for 2015.pdf', '2025-04-28 10:52:02'),
(100, 25, '2nd Issue of the Civil Service Reporter for 2015.pdf', '2025-04-28 10:52:05'),
(101, 25, '1st Issue of the Civil Service Reporter for 2015.pdf', '2025-04-28 10:52:07'),
(102, 26, '4th Issue of the Civil Service Reporter for 2017.pdf', '2025-04-28 10:53:54'),
(103, 26, '2nd Issue of the Civil Service Reporter for 2017.pdf', '2025-04-28 10:54:09'),
(104, 26, '1st Issue of the Civil Service Reporter for 2017.pdf', '2025-04-28 10:54:12'),
(105, 27, '3rd Issue of the Civil Service Reporter for 2018.pdf', '2025-04-28 10:57:02'),
(106, 27, '2nd Issue of the Civil Service Reporter for 2018.pdf', '2025-04-28 10:57:08'),
(107, 27, '1st Issue of the Civil Service Reporter for 2018.pdf', '2025-04-28 10:57:13'),
(108, 28, '3rd Issue of the Civil Service Reporter for 2019.pdf', '2025-04-28 10:58:55'),
(109, 28, 'Reporter 2 2019.pdf', '2025-04-28 10:59:01'),
(110, 28, '1st Issue of the Civil Service Reporter for 2019.pdf', '2025-04-28 10:59:03'),
(111, 29, 'Reporter 3 2020.pdf', '2025-04-28 11:05:06'),
(112, 29, '2nd Issue of the Civil Service Reporter for 2020.pdf', '2025-04-28 11:05:09'),
(113, 29, '1st Issue of the Civil Service Reporter for 2020.pdf', '2025-04-28 11:05:12'),
(114, 30, '4th Issue of the Civil Service Reporter for 2021.pdf', '2025-04-28 11:08:11'),
(115, 30, '3rd Issue of the Civil Service Reporter for 2021.pdf', '2025-04-28 11:08:14'),
(116, 30, '2nd Issue of the Civil Service Reporter for 2021.pdf', '2025-04-28 11:08:16'),
(117, 30, 'Reporter 1 2021.pdf', '2025-04-28 11:08:19'),
(118, 31, 'CS Reporter 4th Quarter Issue 2022.pdf', '2025-04-28 11:11:27'),
(119, 31, 'CS Reporter 3rd Quarter Issue 2022.pdf', '2025-04-28 11:11:30'),
(120, 31, 'CS Reporter 2nd Quarter Issue 2022.pdf', '2025-04-28 11:11:32'),
(121, 31, 'CS Reporter 1st Quarter Issue 2022.pdf', '2025-04-28 11:11:37'),
(122, 32, 'CS Reporter 4th Quarter Issue 2023.pdf', '2025-04-28 11:13:03'),
(123, 32, 'CS Reporter 2nd Quarter Issue 2023.pdf', '2025-04-28 11:13:11'),
(124, 33, 'CS Reporter 4th Quarter Issue 2024.pdf', '2025-04-28 11:15:24'),
(125, 33, 'CS Reporter 1st Quarter Issue 2024.pdf', '2025-04-28 11:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `name`, `parent_id`) VALUES
(12, '2017 Omnibus Rules on Appointments and Other HR Actions', NULL),
(13, 'Administrative and Legal Matters', NULL),
(14, 'CSC-related Issuances on the Early Release of Retirement Pay pursuant to RA No. 10154', 13),
(15, 'CSC-related Issuances on the use of SALN', 13),
(16, 'Annual Reports', NULL),
(17, 'Anti-Red Tape Act Documents', NULL),
(18, 'Caravan', 17),
(19, 'Makuha Ka sa ARTA', 17),
(20, 'The Report Card Survey', 17),
(21, 'Citizen\'s Charter', NULL),
(22, 'CSC-CARAGA CITIZEN’S CHARTER', 21),
(23, 'Initial updated CSC Citizen\'s Charter', 21),
(24, 'Civil Service Reporter Issues', NULL),
(25, '2015', 24),
(26, '2017', 24),
(27, '2018', 24),
(28, '2019', 24),
(29, '2020', 24),
(30, '2021', 24),
(31, '2022', 24),
(32, '2023', 24),
(33, '2024', 24);

-- --------------------------------------------------------

--
-- Table structure for table `government_info`
--

CREATE TABLE `government_info` (
  `id` int(11) NOT NULL,
  `employee_no` varchar(100) NOT NULL,
  `gsis_no` varchar(20) NOT NULL,
  `pag_ibig_no` varchar(20) NOT NULL,
  `philhealth_no` varchar(20) NOT NULL,
  `sss_no` varchar(20) NOT NULL,
  `tin_no` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `government_info`
--

INSERT INTO `government_info` (`id`, `employee_no`, `gsis_no`, `pag_ibig_no`, `philhealth_no`, `sss_no`, `tin_no`, `created_at`, `updated_at`) VALUES
(2, 'HRM-ADMIN', '4332423-3423', '3287-387245', '94586-7863', '4353-2435', '325436-32422', '2025-03-11 08:25:50', '2025-03-11 08:25:50'),
(6, 'saS', '31', '32', '325', '536', '61', '2025-03-11 22:33:56', '2025-03-11 22:33:56'),
(7, 'ssa', 'sawqwe', 'weqwe', '3243', 'dweqw', '3213', '2025-03-12 17:53:18', '2025-03-12 16:00:00'),
(8, 'dsfd34', '3223-4', '3123-4', '12312-4', '3123-4', '2313-4', '2025-03-12 18:04:56', '2025-04-23 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `service_records`
--

CREATE TABLE `service_records` (
  `id` int(11) NOT NULL,
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_records`
--

INSERT INTO `service_records` (`id`, `employee_no`, `from_date`, `to_date`, `designation`, `status`, `salary`, `station_place`, `branch`, `abs_wo_pay`, `date_separated`, `cause_of_separation`, `created_at`, `updated_at`) VALUES
(2, 'HRM-ADMIN', '2025-03-05', '2025-03-07', 'dfsdsfs', 'fdf', 3232.00, 'HRM', 'M-Kahoy', 'NA', '2025-03-11', 'NA', '2025-03-04 16:00:00', '2025-03-24 07:07:28'),
(3, 'HRM-ADMIN', '2024-03-08', '2025-03-06', 'dfsdsfs', 'Regular', 12500.00, 'HRM', 'MKahoy', '--td--', '2025-03-07', 'NA', '2025-03-07 16:00:00', '2025-03-24 07:07:28'),
(4, 'EMP009', '2025-03-08', '2025-04-01', 'sa', 'sa', 1234345.00, 'sdsd', 'dsds', 'dsd', '2025-03-07', 'dsds', '2025-03-07 16:00:00', '2025-03-07 16:00:00'),
(5, 'EMP009', '2025-03-07', '2025-03-04', 'dsd', 'ddsd', 232323.00, 'dsd', 'dsd', 'sdds', '2025-03-04', 'as', '2025-03-07 16:00:00', '2025-03-07 16:00:00'),
(6, 'HRM-ADMIN', '2025-03-11', '2025-03-12', 'dfsdsfs', 'sdjhasjd', 38973487.00, 'HRM', 'hsdjah', '--td--', '2025-03-10', 'NA', '2025-03-10 16:00:00', '2025-03-24 07:07:28'),
(7, 'HRM-ADMIN', '2025-03-11', '2025-03-12', 'dfsdsfs', 'sas', 45345.00, 'HRM', '6gdf', '546', '2025-03-12', 'hehehhhe', '2025-03-10 16:00:00', '2025-03-24 07:07:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `201_files`
--
ALTER TABLE `201_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `folder_id` (`folder_id`);

--
-- Indexes for table `201_folders`
--
ALTER TABLE `201_folders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `employee_no` (`employee_no`);

--
-- Indexes for table `appointed_cert_issuance`
--
ALTER TABLE `appointed_cert_issuance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elected_cert_issuance`
--
ALTER TABLE `elected_cert_issuance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_no`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `folder_id` (`folder_id`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `government_info`
--
ALTER TABLE `government_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gsis_no` (`gsis_no`),
  ADD UNIQUE KEY `pag_ibig_no` (`pag_ibig_no`),
  ADD UNIQUE KEY `philhealth_no` (`philhealth_no`),
  ADD UNIQUE KEY `sss_no` (`sss_no`),
  ADD UNIQUE KEY `tin_no` (`tin_no`),
  ADD KEY `employee_no` (`employee_no`);

--
-- Indexes for table `service_records`
--
ALTER TABLE `service_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_no` (`employee_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `201_files`
--
ALTER TABLE `201_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `201_folders`
--
ALTER TABLE `201_folders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointed_cert_issuance`
--
ALTER TABLE `appointed_cert_issuance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `elected_cert_issuance`
--
ALTER TABLE `elected_cert_issuance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `government_info`
--
ALTER TABLE `government_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service_records`
--
ALTER TABLE `service_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`employee_no`) REFERENCES `employee` (`employee_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `folders`
--
ALTER TABLE `folders`
  ADD CONSTRAINT `folders_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `folders` (`id`) ON DELETE CASCADE;

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
