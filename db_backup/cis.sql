-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2024 at 11:13 AM
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
-- Database: `cis`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` int(11) NOT NULL,
  `dell_department` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `paper_id` int(10) UNSIGNED NOT NULL,
  `paper_number` int(11) NOT NULL,
  `serial_number_start` varchar(255) NOT NULL,
  `serial_number_end` varchar(11) NOT NULL,
  `reminded_paper` int(11) NOT NULL,
  `canceled_paper` int(11) NOT NULL,
  `dell_paper` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`paper_id`, `paper_number`, `serial_number_start`, `serial_number_end`, `reminded_paper`, `canceled_paper`, `dell_paper`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 100, '0000001', '0', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 500, '10000009', '0', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 12, '12', '0', 0, 0, 0, 0, '2024-08-07 22:00:00', '0000-00-00 00:00:00'),
(4, 780, '00002', '0', 0, 0, 0, 0, '2024-08-07 22:00:00', '0000-00-00 00:00:00'),
(5, 780, '00002', '0', 0, 0, 0, 0, '2024-08-07 22:00:00', '0000-00-00 00:00:00'),
(6, 780, '00002', '0', 0, 0, 0, 0, '2024-08-07 22:00:00', '0000-00-00 00:00:00'),
(7, 780, '00002', '0', 0, 0, 0, 0, '2024-08-07 22:00:00', '0000-00-00 00:00:00'),
(8, 200, '1', '100', 0, 0, 0, 0, '2024-08-07 22:00:00', '0000-00-00 00:00:00'),
(9, 200, '1', '100', 0, 0, 0, 0, '2024-08-07 22:00:00', '0000-00-00 00:00:00'),
(10, 30, '30', '90', 0, 0, 0, 0, '2024-08-07 22:00:00', '0000-00-00 00:00:00'),
(11, 30, '30', '90', 0, 0, 0, 0, '2024-08-07 22:00:00', '0000-00-00 00:00:00'),
(12, 5, '5050001', '50500099', 0, 0, 0, 0, '2024-08-07 22:00:00', '0000-00-00 00:00:00'),
(13, 5, '5050001', '50500099', 0, 0, 0, 0, '2024-08-07 22:00:00', '0000-00-00 00:00:00'),
(14, 20, '11100', '11199', 0, 0, 0, 0, '2024-08-07 22:00:00', '0000-00-00 00:00:00'),
(15, 20, '11100', '11199', 0, 0, 0, 0, '2024-08-07 22:00:00', '0000-00-00 00:00:00'),
(16, 20, '11100', '11199', 0, 0, 0, 0, '2024-08-07 22:00:00', '0000-00-00 00:00:00'),
(17, 20, '11100', '11199', 0, 0, 0, 0, '2024-08-07 22:00:00', '0000-00-00 00:00:00'),
(18, 20, '11100', '11199', 0, 0, 0, 0, '2024-08-07 22:00:00', '0000-00-00 00:00:00'),
(19, 20, '11100', '11199', 0, 0, 0, 0, '2024-08-07 22:00:00', '0000-00-00 00:00:00'),
(20, 20, '11100', '11199', 0, 0, 0, 0, '2024-08-07 22:00:00', '0000-00-00 00:00:00'),
(21, 12, '12', '19', 0, 0, 0, 0, '2024-08-08 22:00:00', '0000-00-00 00:00:00'),
(22, 11, '1234', '33', 0, 0, 0, 0, '2024-08-08 22:00:00', '0000-00-00 00:00:00'),
(23, 600, '1', '599', 0, 0, 0, 0, '2024-08-08 22:00:00', '0000-00-00 00:00:00'),
(24, 200, '200', '199', 0, 0, 0, 0, '2024-08-08 22:00:00', '0000-00-00 00:00:00'),
(25, 200, '1', '200', 0, 0, 0, 0, '2024-08-08 22:00:00', '0000-00-00 00:00:00'),
(26, 500, '1101001', '11010500', 0, 0, 0, 0, '2024-08-08 22:00:00', '0000-00-00 00:00:00'),
(27, 1, '1', '2', 0, 0, 0, 0, '2024-08-09 00:38:17', '2024-08-09 00:38:17'),
(28, 1, '1', '2', 0, 0, 0, 0, '2024-08-09 00:38:24', '2024-08-09 00:38:24'),
(29, 12, '1', '9', 0, 0, 0, 0, '2024-08-10 09:33:06', '2024-08-10 09:33:06'),
(30, 12, '1', '9', 0, 0, 0, 0, '2024-08-10 09:33:08', '2024-08-10 09:33:08'),
(31, 300, '2020300', '2020299', 0, 0, 0, 0, '2024-08-10 10:31:13', '2024-08-10 10:31:13'),
(32, 11, '11', '11', 0, 0, 0, 0, '2024-08-11 03:41:46', '2024-08-11 03:41:46'),
(33, 11, '11', '11', 0, 0, 0, 0, '2024-08-11 03:43:45', '2024-08-11 03:43:45'),
(34, 1, '1', '1', 0, 0, 0, 0, '2024-08-11 04:54:09', '2024-08-11 04:54:09'),
(35, 1212, '2223', '22270', 0, 0, 0, 0, '2024-08-11 15:08:38', '2024-08-11 15:08:38'),
(36, 1, '1', '1', 0, 0, 0, 0, '2024-08-12 08:34:15', '2024-08-12 08:34:15'),
(37, 12, '221', '233', 0, 0, 0, 0, '2024-08-14 13:12:47', '2024-08-14 13:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `paper_update`
--

CREATE TABLE `paper_update` (
  `paper_update_id` int(10) UNSIGNED NOT NULL,
  `certificate_id` int(11) NOT NULL,
  `dell_paper_update` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` int(11) NOT NULL,
  `program_name` varchar(20) NOT NULL,
  `dell_program` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_id`, `program_name`, `dell_program`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Bachelor', 0, 0, '2024-08-19 10:48:10', '2024-08-19 10:48:30'),
(2, 'Diploma', 0, 0, '2024-08-19 10:48:10', '2024-08-19 10:48:30'),
(3, 'Master', 0, 0, '2024-08-19 10:48:10', '2024-08-19 10:48:30'),
(4, 'PhD', 0, 0, '2024-08-19 10:48:10', '2024-08-19 10:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `std_cert_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_status` int(11) NOT NULL,
  `request_comment` varchar(255) NOT NULL,
  `certificate_type` int(11) NOT NULL,
  `dell_request` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `std_cert_id`, `user_id`, `request_status`, `request_comment`, `certificate_type`, `dell_request`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 1, 'All do you can print', 1, 0, 0, '2024-08-13 23:36:08', '2024-08-13 23:36:08'),
(2, 15, 0, 0, '', 0, 0, 0, '2024-08-17 11:30:38', '2024-08-17 11:30:38'),
(3, 16, 2, 0, '', 0, 0, 0, '2024-08-17 11:33:49', '2024-08-17 11:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `scanned_issue`
--

CREATE TABLE `scanned_issue` (
  `scanned_id` int(10) UNSIGNED NOT NULL,
  `request_id` int(11) NOT NULL,
  `scaann_photo` varchar(255) NOT NULL,
  `ceritificat_id` int(11) NOT NULL,
  `dell_scanned` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_basic_info`
--

CREATE TABLE `student_basic_info` (
  `student_basic_info_id` int(10) UNSIGNED NOT NULL,
  `std_index` int(11) NOT NULL,
  `std_full_name_en` varchar(100) NOT NULL,
  `std_full_name_ar` varchar(100) NOT NULL,
  `std_first_name_en` varchar(10) NOT NULL,
  `std_second_name_en` varchar(10) NOT NULL,
  `std_third_name_en` varchar(10) NOT NULL,
  `std_fourth_name_en` varchar(10) NOT NULL,
  `std_first_name_ar` varchar(10) NOT NULL,
  `std_second_name_ar` varchar(10) NOT NULL,
  `std_third_name_ar` varchar(10) NOT NULL,
  `std_fourth_name_ar` varchar(10) NOT NULL,
  `std_email` varchar(50) NOT NULL,
  `std_mobail` int(11) NOT NULL,
  `std_photo` varchar(255) NOT NULL,
  `std_passport` varchar(255) NOT NULL,
  `dell_std_basic_info` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_basic_info`
--

INSERT INTO `student_basic_info` (`student_basic_info_id`, `std_index`, `std_full_name_en`, `std_full_name_ar`, `std_first_name_en`, `std_second_name_en`, `std_third_name_en`, `std_fourth_name_en`, `std_first_name_ar`, `std_second_name_ar`, `std_third_name_ar`, `std_fourth_name_ar`, `std_email`, `std_mobail`, `std_photo`, `std_passport`, `dell_std_basic_info`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 201602018, 'Ghazi AbdallahOmer Mustafa', 'غازي عبدالله عمر مصطفي ', 'Ghazi', 'Abdallah', 'Omer', 'Mustafa', 'غازي', 'عبدالله', 'عمر', 'مصطفي', '', 0, '', '', 0, 0, '2024-08-14 14:58:39', '2024-08-14 14:58:39'),
(2, 0, 'Ghazi Abdallah Omer Mustafa ', 'غازي عبدالله عمر مصطفي ', 'Ghazi ', 'Abdallah ', 'Omer ', 'Mustafa ', 'غازي ', 'عبدالله ', 'عمر ', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 1104257, '', '', 0, 0, '2024-08-16 19:40:58', '2024-08-16 19:40:58'),
(3, 0, 'Ghazi Abdallah Omer Mustafa ', 'غازي عبدالله عمر مصطفي ', 'Ghazi ', 'Abdallah ', 'Omer ', 'Mustafa ', 'غازي ', 'عبدالله ', 'عمر ', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-08-16 20:07:43', '2024-08-16 20:07:43'),
(4, 0, 'Ghazi Abdallah Omer Mustafa ', 'غازي عبدالله عمر مصطفي ', 'Ghazi ', 'Abdallah ', 'Omer ', 'Mustafa ', 'غازي ', 'عبدالله ', 'عمر ', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-08-16 20:17:24', '2024-08-16 20:17:24'),
(5, 0, 'Ghazi Abdallah Omer Mustafa ', 'غازي عبدالله عمر مصطفي ', 'Ghazi ', 'Abdallah ', 'Omer ', 'Mustafa ', 'غازي ', 'عبدالله ', 'عمر ', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-08-16 20:27:55', '2024-08-16 20:27:55'),
(6, 0, 'Ghazi Abdallah Omer Mustafa ', 'غازي عبدالله عمر مصطفي ', 'Ghazi ', 'Abdallah ', 'Omer ', 'Mustafa ', 'غازي ', 'عبدالله ', 'عمر ', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-08-16 20:37:13', '2024-08-16 20:37:13'),
(7, 0, 'Ghazi Abdallah Omer Mustafa ', 'غازي عبدالله عمر مصطفي ', 'Ghazi ', 'Abdallah ', 'Omer ', 'Mustafa ', 'غازي ', 'عبدالله ', 'عمر ', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-08-16 20:39:29', '2024-08-16 20:39:29'),
(8, 0, 'Ghazi Abdallah Omer Mustafa ', 'غازي عبدالله عمر مصطفي ', 'Ghazi ', 'Abdallah ', 'Omer ', 'Mustafa ', 'غازي ', 'عبدالله ', 'عمر ', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-08-16 22:21:37', '2024-08-16 22:21:37'),
(9, 0, 'Ghazi Abdallah Omer Mustafa ', 'غازي عبدالله عمر مصطفي ', 'Ghazi ', 'Abdallah ', 'Omer ', 'Mustafa ', 'غازي ', 'عبدالله ', 'عمر ', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-08-16 22:34:03', '2024-08-16 22:34:03'),
(10, 0, 'Abdallah Omer Mustafa Ghazi', 'عبدالله عمر مصطفي غازي', 'Abdallah', 'Omer ', 'Mustafa ', 'Ghazi', 'Ghazi', 'عمر ', 'مصطفي ', 'غازي', 'localhost.4rffq@passinbox.com', 110104257, '', '', 0, 0, '2024-08-16 22:54:11', '2024-08-16 22:54:11'),
(11, 0, 'Abdallah Omer Mustafa Ghazi', 'عبدالله عمر مصطفي غازي', 'Abdallah', 'Abdallah ', 'Omer ', 'Ghazi', 'غازي ', 'عبدالله ', 'مصطفي ', 'غازي', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-08-16 22:59:30', '2024-08-16 22:59:30'),
(12, 0, 'Abdallah Omer Mustafa Ghazi', 'غازي عبدالله عمر مصطفي ', 'Ghazi ', 's', 'S', 'de', 'de', 'de', 'de', 'de', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-08-16 23:13:45', '2024-08-16 23:13:45'),
(13, 0, 'Ghazi Abdallah Omer Mustafa ', 'غازي عبدالله عمر مصطفي ', 'Ghazi ', 'Abdallah ', 'Omer ', 'Mustafa ', 'غازي ', 'عبدالله ', 'عمر ', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-08-17 08:09:59', '2024-08-17 08:09:59'),
(14, 0, 'Abdallah Omer Mustafa Ghazi', 'غازي عبدالله عمر مصطفي ', 'Ghazi ', 'Abdallah ', 'Omer ', 'Mustafa ', 'غازي ', 'عبدالله ', 'عمر ', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-08-17 08:18:24', '2024-08-17 08:18:24'),
(15, 0, 'Ghazi Abdallah Omer Mustafa ', 'غازي عبدالله عمر مصطفي ', 'Ghazi ', 'Abdallah ', 'Mustafa ', 'Mustafa ', 'غازي ', 'عمر ', 'عمر ', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-08-17 08:21:26', '2024-08-17 08:21:26'),
(16, 0, 'Ghazi Abdallah Omer Mustafa ', 'غازي عبدالله عمر مصطفي ', 'Ghazi ', 'Omer ', 'Mustafa ', 'Mustafa ', 'غازي ', 'عبدالله ', 'عمر ', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-08-17 08:29:54', '2024-08-17 08:29:54'),
(17, 0, 'Ghazi Abdallah Omer Mustafa ', 'غازي عبدالله عمر مصطفي ', 'Ghazi ', 'Abdallah ', 'Omer ', 'Ghazi', 'غازي ', 'عمر ', 'مصطفي ', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-08-17 10:35:24', '2024-08-17 10:35:24'),
(18, 0, 'Ghazi Abdallah Omer Mustafa ', 'غازي عبدالله عمر مصطفي ', 'Ghazi ', 'Omer ', 'Omer ', 'Mustafa ', 'غازي ', 'عبدالله ', 'مصطفي ', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-08-17 11:02:19', '2024-08-17 11:02:19'),
(19, 0, 'Ghazi Abdallah Omer Mustafa ', 'عبدالله عمر مصطفي غازي', 'Ghazi ', 'Abdallah ', 'Omer ', 'Mustafa ', 'غازي ', 'عبدالله ', 'عمر ', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-08-17 11:17:48', '2024-08-17 11:17:48'),
(20, 0, 'Ghazi Abdallah Omer Mustafa ', 'عبدالله عمر مصطفي غازي', 'Ghazi ', 'Abdallah ', 'Omer ', 'Mustafa ', 'Ghazi', 'عمر ', 'مصطفي ', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-08-17 11:20:25', '2024-08-17 11:20:25'),
(21, 0, 'Ghazi Abdallah Omer Mustafa ', 'غازي عبدالله عمر مصطفي ', 'Ghazi ', 'Omer ', 'Omer ', 'Ghazi', 'غازي ', 'عبدالله ', 'مصطفي ', 'مصطفي ', 'localhost.4rffq@passinbox.com', 110104257, '', '', 0, 0, '2024-08-17 11:29:58', '2024-08-17 11:29:58'),
(22, 0, 'Ghazi Abdallah Omer Mustafa ', 'غازي عبدالله عمر مصطفي ', 'Ghazi ', 'Omer ', 'Omer ', 'Ghazi', 'غازي ', 'عبدالله ', 'مصطفي ', 'مصطفي ', 'localhost.4rffq@passinbox.com', 110104257, '', '', 0, 0, '2024-08-17 11:30:38', '2024-08-17 11:30:38'),
(23, 201602018, 'Ghazi Abdallah Omer Mustafa ', 'غازي عبدالله عمر مصطفي ', 'Ghazi ', 'Omer ', 'Omer ', 'Ghazi', 'غازي ', 'عبدالله ', 'مصطفي ', 'مصطفي ', 'localhost.4rffq@passinbox.com', 110104257, '', '', 0, 0, '2024-08-17 11:33:49', '2024-08-17 11:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `student_cert_info`
--

CREATE TABLE `student_cert_info` (
  `std_cert_id` int(10) UNSIGNED NOT NULL,
  `student_basic_info_id` int(11) NOT NULL,
  `program` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `majer` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `national_number` int(11) NOT NULL,
  `ministery_number` int(11) NOT NULL,
  `certificate_type` varchar(15) NOT NULL,
  `cert_printed_place` varchar(15) NOT NULL,
  `cert_printed_at` date NOT NULL,
  `gpa` float NOT NULL,
  `cgpa` float NOT NULL,
  `total_graduate_hour` int(11) NOT NULL,
  `mode` varchar(15) NOT NULL,
  `divition` varchar(50) NOT NULL,
  `senate_on` date NOT NULL,
  `dell_std_cert_info` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_cert_info`
--

INSERT INTO `student_cert_info` (`std_cert_id`, `student_basic_info_id`, `program`, `department`, `majer`, `nationality`, `national_number`, `ministery_number`, `certificate_type`, `cert_printed_place`, `cert_printed_at`, `gpa`, `cgpa`, `total_graduate_hour`, `mode`, `divition`, `senate_on`, `dell_std_cert_info`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 0, '', '', '', '', 0, 0, '', 'Khartoum', '2021-06-07', 2.74, 3.14, 214, 'Full Time', 'Secand Class Division-Two', '2021-06-02', 0, 0, '2024-08-14 15:38:32', '2024-08-14 15:38:32'),
(2, 0, '2', '3', '2', '1', 2147483647, 2147483647, '', '', '0000-00-00', 2.6, 3.4, 0, '1', '2', '2024-08-16', 0, 0, '2024-08-16 20:07:43', '2024-08-16 20:07:43'),
(3, 0, '2', '1', '1', '3', 2147483647, 2147483647, '', '', '0000-00-00', 1.2, 3.9, 0, '1', '2', '0000-00-00', 0, 0, '2024-08-16 20:17:24', '2024-08-16 20:17:24'),
(4, 0, '2', '2', '4', '2', 2147483647, 2147483647, '', '', '0000-00-00', 1.1, 4, 0, '2', '2', '0000-00-00', 0, 0, '2024-08-16 20:27:55', '2024-08-16 20:27:55'),
(5, 0, '3', '2', '2', '1', 2147483647, 2147483647, '', '', '0000-00-00', 1.2, 3.2, 0, '2', '3', '0000-00-00', 0, 0, '2024-08-16 20:37:13', '2024-08-16 20:37:13'),
(6, 0, '1', '3', '4', '3', 2147483647, 2147483647, '', '', '0000-00-00', 2.3, 3.5, 0, '3', '2', '0000-00-00', 0, 0, '2024-08-16 20:39:29', '2024-08-16 20:39:29'),
(7, 0, '2', '4', '3', '2', 3, 3, '', '', '0000-00-00', 2.4, 2.1, 0, '3', '2', '0000-00-00', 0, 0, '2024-08-16 22:21:37', '2024-08-16 22:21:37'),
(8, 0, '1', '6', '6', '1', 2147483647, 2147483647, '', '1', '2024-08-17', 3.2, 2.9, 240, '1', '1', '0000-00-00', 0, 0, '2024-08-16 22:34:03', '2024-08-16 22:34:03'),
(9, 0, '2', '2', '2', '2', 2147483647, 2147483647, '2', '1', '2024-08-17', 3.2, 3.5, 200, '3', '1', '2024-08-17', 0, 0, '2024-08-17 08:29:54', '2024-08-17 08:29:54'),
(10, 17, '3', '2', '2', '3', 2147483647, 2147483647, '1', '1', '2024-08-17', 3.2, 2.2, 200, '3', '1', '2024-08-17', 0, 0, '2024-08-17 10:35:24', '2024-08-17 10:35:24'),
(11, 18, '1', '4', '3', '2', 1, 3, '2', '2', '2024-08-21', 1, 1, 11, '1', '2', '2024-08-13', 0, 0, '2024-08-17 11:02:19', '2024-08-17 11:02:19'),
(12, 19, '2', '4', '4', '2', 11, 11, '2', '2', '0000-00-00', 1, 1, 1, '3', '1', '2024-08-19', 0, 0, '2024-08-17 11:17:48', '2024-08-17 11:17:48'),
(13, 20, '1', '2', '3', '2', 3, 2147483647, '1', '2', '2024-08-17', 1, 1, 11, '3', '2', '2024-08-17', 0, 0, '2024-08-17 11:20:25', '2024-08-17 11:20:25'),
(14, 21, '2', '3', '3', '3', 2147483647, 11, '1', '1', '2024-08-28', 1, 1, 111, '1', '3', '2024-08-23', 0, 0, '2024-08-17 11:29:58', '2024-08-17 11:29:58'),
(15, 22, '2', '3', '3', '3', 2147483647, 11, '1', '1', '2024-08-28', 1, 1, 111, '1', '3', '2024-08-23', 0, 0, '2024-08-17 11:30:38', '2024-08-17 11:30:38'),
(16, 23, '2', '3', '3', '3', 2147483647, 11, '1', '1', '2024-08-28', 1, 1, 111, '1', '3', '2024-08-23', 0, 0, '2024-08-17 11:33:49', '2024-08-17 11:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl-log`
--

CREATE TABLE `tbl-log` (
  `log_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` int(11) NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `action` int(11) NOT NULL,
  `action_detalis` int(11) NOT NULL,
  `action_time` datetime NOT NULL,
  `location` int(11) NOT NULL,
  `log_time` varchar(255) NOT NULL,
  `dell_log` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `crreates_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_staff_id` int(11) NOT NULL,
  `dell_user` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_full_name`, `username`, `user_email`, `password`, `user_type`, `user_staff_id`, `dell_user`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Ghazi Abdallah Omer', 'ghazi', 'ghazi.abdallah@fu.edu.sd', '202cb962ac59075b964b07152d234b70', 1, 0, 0, 0, '2024-08-06 11:03:20', '2024-08-09 00:35:48'),
(2, 'Kawther', 'Kawther', 'Kawther@fu.edu.sd', '202cb962ac59075b964b07152d234b70', 2, 0, 1, 0, '2024-08-06 11:09:23', '2024-08-09 00:35:48'),
(3, 'Dena', 'dena', 'dena@fu.edu.sd', '202cb962ac59075b964b07152d234b70', 3, 0, 1, 0, '2024-08-06 11:10:04', '2024-08-09 00:35:48'),
(18, 'Nadir Njeeb', 'nedo', 'localhost.4tj0k@passinbox.com', '202cb962ac59075b964b07152d234b70', 2, 0, 1, 0, '2024-08-11 05:27:14', '2024-08-11 05:27:14'),
(19, 'kamil ahmed ', 'kamil', 'localhost.beo28@passinbox.com', '202cb962ac59075b964b07152d234b70', 3, 0, 1, 0, '2024-08-11 05:27:45', '2024-08-11 05:27:45'),
(20, 'omer muhammed', 'omer', 'omer@mail.com', '202cb962ac59075b964b07152d234b70', 1, 0, 1, 0, '2024-08-12 09:12:20', '2024-08-12 09:12:20'),
(21, 'Asia Ahmed', 'Asia', 'Asia.Ahmed@protonmail.com', '202cb962ac59075b964b07152d234b70', 3, 0, 0, 0, '2024-08-12 10:40:14', '2024-08-12 10:40:14'),
(22, 'Nadir Njeeb', 'nedo', 'nedo@mail.com', '202cb962ac59075b964b07152d234b70', 2, 0, 0, 0, '2024-08-12 13:38:23', '2024-08-12 13:38:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`paper_id`);

--
-- Indexes for table `paper_update`
--
ALTER TABLE `paper_update`
  ADD PRIMARY KEY (`paper_update_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `scanned_issue`
--
ALTER TABLE `scanned_issue`
  ADD PRIMARY KEY (`scanned_id`);

--
-- Indexes for table `student_basic_info`
--
ALTER TABLE `student_basic_info`
  ADD PRIMARY KEY (`student_basic_info_id`);

--
-- Indexes for table `student_cert_info`
--
ALTER TABLE `student_cert_info`
  ADD PRIMARY KEY (`std_cert_id`);

--
-- Indexes for table `tbl-log`
--
ALTER TABLE `tbl-log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `paper_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `paper_update`
--
ALTER TABLE `paper_update`
  MODIFY `paper_update_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `scanned_issue`
--
ALTER TABLE `scanned_issue`
  MODIFY `scanned_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_basic_info`
--
ALTER TABLE `student_basic_info`
  MODIFY `student_basic_info_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `student_cert_info`
--
ALTER TABLE `student_cert_info`
  MODIFY `std_cert_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl-log`
--
ALTER TABLE `tbl-log`
  MODIFY `log_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
