-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 02:28 PM
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
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_code` int(3) UNSIGNED NOT NULL,
  `school_code` int(3) DEFAULT NULL,
  `faculty_desc` varchar(100) DEFAULT NULL,
  `faculty_desc_e` varchar(100) DEFAULT NULL,
  `abbreviation` varchar(10) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=cp1256 COLLATE=cp1256_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_code`, `school_code`, `faculty_desc`, `faculty_desc_e`, `abbreviation`, `deleted`) VALUES
(1, 1, 'كلية الهندسة', ' Faculty of Engineering', 'ENG', 0),
(2, 27, 'كلية علوم الحاسوب', 'Faculty of Computer Science', 'SCI', 0),
(3, 11, ' كلية تقنية معلومات', ' Faculty of Information Technology', 'IT', 0),
(4, 3, 'كليةهندسة الاتصالات و تكنولوجيا الفضاء', ' Faculty of Telecommunication Engineering', 'TCOM', 0),
(5, 4, 'كلية هندسة العمارة', 'Faculty of Architecture Engineering', 'ARCH', 0),
(6, 18, 'التصميم', '', 'DES', 1),
(7, 18, 'الفنون', ' Faculty of  Fine Arts and Design', 'ARTD', 0),
(11, 11, ' هندسة المعرفة', '', 'KNENG', 1),
(14, 19, ' كلية نظم المعلومات الجغرافية', 'Faculty of Geoinformatics', 'GIS', 0),
(17, 1, 'كلية الهندسة          ', '', 'ENG', 1),
(19, 3, '', '', 'TST', 1),
(20, 27, 'Test Faculty', 'Test Faculty', 'TFAC', 1),
(21, 5, 'Faculty of Basic Sciences', 'Faculty of Basic Sciences', 'BSC', 0),
(22, 3, 'Faculty of Postgraduate Studies', 'Faculty of Postgraduate Studies', 'FPGS', 0),
(23, 29, 'ادارة الاعمال ', 'Business Administration', 'BA', 0);

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `major_code` int(3) UNSIGNED NOT NULL,
  `faculty_code` int(3) UNSIGNED DEFAULT NULL,
  `major_desc` varchar(100) DEFAULT NULL,
  `major_desc_e` varchar(100) DEFAULT NULL,
  `abbreviation` varchar(20) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `mnst_major_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1256 COLLATE=cp1256_general_ci;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`major_code`, `faculty_code`, `major_desc`, `major_desc_e`, `abbreviation`, `deleted`, `mnst_major_code`) VALUES
(1, 1, 'بكالريوس  شرف هندسة الحاسوب', 'B.Sc. in Computer Engineering', 'ENG', 0, '2362'),
(2, 2, 'بكالوريوس شرف  علوم الحاسوب', 'B.Sc. in Computer Science', 'SCI', 0, '2369'),
(3, 3, 'بكلاريوس شرف تقنية المعلومات', 'B.Sc. in Information Technology', 'IT', 0, '2371'),
(4, 4, 'بكالوريوس  شرف هندسة االإتصالات', 'B.Sc. In Telecom. Engineering', 'TCOM', 0, '2366'),
(5, 5, '   بكالوريوس شرف هندسة العمارة ', 'B.Sc. in Architecture Engneering', 'ARCH', 0, '2368'),
(7, 3, 'دبلوم تقنية المعلومات', 'Diploma in Information Technology', 'DIT', 0, '4295'),
(8, 4, 'دبلوم هندسة تقنية الإتصالات', 'Diploma In Telecom. Engineering', 'DCOM', 0, '4291'),
(19, 3, '   بكالوريوس شرف الهندسة المعرفية', 'B.Sc. In Knowledge Engineering', 'KNENG', 0, NULL),
(20, 3, 'بكالوريوس شرف الإدارة المعرفية', 'B.Sc. in Knowledge managment', 'KNMGT', 0, '2372'),
(21, 14, 'بكالوريوس شرف نظم المعلومات الجغرافية', 'B.Sc. In GIS', 'GIS', 0, '2377'),
(22, 1, 'بكلاريوس هندسة الالكترونيات', 'B.Sc in Electronic Eng.', 'ELECT', 0, '2361'),
(25, 7, 'بكالاريوس شرف الوسائط المتعددة', 'B.Sc in Creative Multimedia', 'CMM', 0, '2374'),
(26, 3, 'دبلوم تقنية التجارة الإلكترونية', 'Diploma  in E-Commerce Technology', 'DECOM', 0, NULL),
(27, 3, 'دبلوم  تصميم مواقع الإنترنت', 'Diploma in Web design', 'DWEB', 0, NULL),
(28, 3, 'دبلوم تقنية المعلومات التحارية والمحاسبية', 'Diploma in IT business and accounting', 'DITBUS', 0, '4297'),
(29, 1, 'دبلوم هندسة الحاسوب', 'Diploma in Computer Engineering', 'DENG', 0, NULL),
(30, 1, 'دبلوم هندسة الإلكترونيات  ', 'Diploma in Electronic  Engineering', 'DELECT', 0, NULL),
(31, 1, 'دبلوم هندسة الشبكات', 'Diploma in Network Engineering', 'DNETENG', 0, NULL),
(33, 1, 'بكلاريوس هندسة الليزر', 'B.Sc. in Laser Engineering', 'LASENG', 0, NULL),
(34, 1, 'بكلاريوس الهندسة الطبية الحيوية     ', 'B.Sc. in Biomedical Engineering', 'BIOMED', 0, '2365'),
(35, 1, 'الهندسة الميكانيكية الإلكترونية ', 'B.Sc. in Mechatronics Engineering', 'MECTRONIC', 0, '2364'),
(36, 4, 'بكالوريوس  شرف هندسة الأقمار الصناعية', 'B.Sc. in Satellite Engineering', 'SATENG', 0, NULL),
(37, 7, ' بكالوريوس التصميم الداخلي', 'B.Sc. in Interior Design', 'INTDES', 0, '2376'),
(38, 3, 'بكالوريوس شرف التسويق الرقمى', 'B.Sc. in Digital Marketing', 'DIGMKT', 0, NULL),
(39, 3, 'بكالوريوس شرف  البنوك الرقمية', 'B.Sc. in Digital Banking', 'DIGBNK', 0, NULL),
(40, 3, 'بكالوريوس شرف المعلوماتية الحيوية', 'B.Sc. in Bioinformatics', 'BIOINFO', 0, NULL),
(41, 2, 'بكالريوس شرف الذكاء الصناعى', 'B.Sc. In Artificial Intelligance', 'ARTIN', 0, NULL),
(42, 7, 'بكلاريوس', 'B.Sc. in Graphic Technology Art', 'GRAPHIC', 0, '2375'),
(43, 14, '   بكالوريوس شرف الإستشعار عن بعد', 'B.Sc. in Remote Sensing', 'REMSEN', 0, NULL),
(44, 3, 'B.Sc. in Information Technology(MB)', 'B.Sc. in Information Technology(MB)', 'ITMB', 0, NULL),
(45, 22, 'ماجستير في بيانات الاتصال وهندسة الشبكات', 'Master in Data Communication and Networking Engineering', NULL, 0, NULL),
(46, 22, 'ماجستير في ادارة الاعمال', 'Master in Business Administration', NULL, 0, NULL),
(47, 22, 'ماجستير في هندسة المساحة', 'Master in Landscape Architecture', NULL, 0, NULL),
(48, 22, 'ماجستير في هندسه الاتصالات', 'Master by research in Data Communication and Networking Engineering', NULL, 0, NULL),
(49, 22, 'ماجستير في هندسه الحاسوب', 'Master by research in Computer Engineering', NULL, 0, NULL),
(50, 22, 'ماجستير في تقنية المعلومات وتصميم انظمة المعلومات', 'Master by research in Information Technology & Information System Design', NULL, 0, NULL),
(51, 22, 'ماجستير في الهندسة المعمارية', 'Master by research in Architecture', NULL, 0, NULL),
(52, 22, 'ماجستير في الفنون والتصميم الداخلي', 'Master by research in Art and Interior Design', NULL, 0, NULL),
(53, 22, 'ماجستير في النانوتكنولوجي', 'Master by research in Nanotechnology', NULL, 0, NULL),
(54, 22, 'ماجستير في علوم الحاسوب', 'Master in Computer Science', NULL, 0, NULL),
(55, 22, ' ماجستير في نظم المعلومات', 'Master in Information System', NULL, 0, NULL),
(56, 1, 'بكالوريوس الطاقة المتجددة', 'B.Sc in Renewable Energy', 'REENG', 0, NULL),
(57, 23, 'بكالوريوس ادارة الاعمال ', 'B.Sc of Business Administration', 'BA', 0, NULL),
(58, 22, 'ماجستير في نظم المعلومات الجغرافية', 'Master of Science in Geoinformatics', NULL, 0, NULL),
(59, 22, 'Master by research in Geoinformatics', 'Master by research in Geoinformatics', NULL, 0, NULL),
(60, 22, 'Ph.D. in Data Communication and Networking Engineering', 'Ph.D. in Data Communication and Networking Engineering', NULL, 0, NULL),
(61, 22, 'ماجستير في هندسه الحاسوب', 'Master in Computer Engineering', 'NULL', 0, NULL),
(62, 23, NULL, 'B.Sc of Human Resource', 'HR', 0, NULL),
(63, 23, NULL, 'B.Sc of Marketing', 'MR', 0, NULL),
(64, 2, 'بكالوريوس شرف في هندسة البرمجيات\r\n\r\n', 'B.Sc. in Software Engineering', 'SE', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `paper_id` int(10) UNSIGNED NOT NULL,
  `paper_number` int(11) NOT NULL,
  `serial_number_start` varchar(255) NOT NULL,
  `serial_number_end` varchar(11) NOT NULL,
  `dell_paper` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`paper_id`, `paper_number`, `serial_number_start`, `serial_number_end`, `dell_paper`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 10, 'FU1', '9', 0, 0, '2024-10-23 12:30:56', '2024-10-23 12:30:56'),
(7, 100, 'FU001', '0099', 0, 0, '2024-11-30 22:46:16', '2024-11-30 22:46:16');

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
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `std_cert_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_status` int(11) NOT NULL,
  `request_comment` varchar(255) NOT NULL,
  `return_request` int(11) NOT NULL,
  `canceled_request` int(11) NOT NULL,
  `dell_request` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `std_cert_id`, `user_id`, `request_status`, `request_comment`, `return_request`, `canceled_request`, `dell_request`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 0, '', 0, 1, 1, 0, '2024-09-18 10:09:52', '2024-09-18 10:09:52'),
(2, 2, 2, 0, '', 0, 0, 1, 0, '2024-09-18 10:51:30', '2024-09-18 10:51:30'),
(3, 3, 2, 0, '', 1, 0, 1, 0, '2024-09-18 13:21:50', '2024-09-18 13:21:50'),
(4, 4, 2, 0, '', 0, 0, 1, 0, '2024-09-18 13:42:25', '2024-09-18 13:42:25'),
(24, 24, 1, 0, '', 0, 0, 0, 0, '2024-11-30 22:32:10', '2024-11-30 22:32:10'),
(25, 25, 1, 0, '', 0, 0, 1, 0, '2024-11-30 22:32:50', '2024-11-30 22:32:50'),
(26, 26, 1, 0, '', 0, 0, 0, 0, '2024-11-30 22:33:19', '2024-11-30 22:33:19');

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
  `std_index` varchar(200) NOT NULL,
  `std_full_name_en` varchar(100) NOT NULL,
  `std_full_name_ar` varchar(100) NOT NULL,
  `std_first_name_en` varchar(100) NOT NULL,
  `std_second_name_en` varchar(100) NOT NULL,
  `std_third_name_en` varchar(100) NOT NULL,
  `std_fourth_name_en` varchar(100) NOT NULL,
  `std_first_name_ar` varchar(100) NOT NULL,
  `std_second_name_ar` varchar(100) NOT NULL,
  `std_third_name_ar` varchar(100) NOT NULL,
  `std_fourth_name_ar` varchar(100) NOT NULL,
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
(1, '201705064', 'Mohamed Nihro Noah Ibrahim', 'محمد نوير نوح ابراهيم', 'Mohamed', 'Nihro Noah', '', 'Ibrahim', 'محمد', 'نوير نوح', '', 'ابراهيم ', 'moh@mail.com', 2147483647, '', '', 0, 0, '2024-09-18 10:09:52', '2024-09-18 10:09:52'),
(2, '201403018', 'Nader Nageeb   Abdrhman Hassan', 'نادر نجيب عبدالرحمن حسن', 'Nader', 'Nageeb   Abdrhman', '', 'Hassan', 'نادر ', 'نجيب عبدالرحمن', '', 'حسن', 'nadir@mail.com', 2147483647, '', '', 0, 0, '2024-09-18 10:51:30', '2024-09-18 10:51:30'),
(3, '201602018', 'Ghazi Abdallah Omer Mustafa', 'غازي عبدالله عمر مصطفي ', 'Ghazi', 'Abdallah Omer', '', 'Mustafa', 'غازي ', 'عبدالله عمر', '', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 2147483647, '', '', 0, 0, '2024-09-18 13:21:50', '2024-09-18 13:21:50'),
(4, '201602005', 'Saria Abdallah GHAZI Abuzeid', 'سارية عبدالله حسن عبدالعزيز', 'Saria', 'Abdallah Hussein', '', 'Abuzeid', 'سارية', 'عبدالله حسن', '', 'ابو زيد', 'saria@mail.com', 2147483647, '', '', 0, 0, '2024-09-18 13:42:25', '2024-09-18 13:42:25'),
(5, '201602018', 'Ghazi Abdallah Omer Mustafa', 'غازي عبدالله عمر مصطفي ', 'Ghazi', 'Abdallah Omer', '', 'Mustafa', 'غازي ', 'عبدالله عمر', '', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-09-24 11:05:37', '2024-09-24 11:05:37'),
(6, '201602043', 'Mogahed Sied Mosa Yagoob', 'مجاهد سيد موسي يعقوب', 'Mogahed', 'Sied Mosa', '', 'Yagoob', 'مجاهد', 'سيد موسي', '', 'يعقوب', 'joho@mail.com', 2147483647, '', '', 0, 0, '2024-09-25 02:59:00', '2024-09-25 02:59:00'),
(7, '201602043', 'Mogahed Sied Mosa Yagoob', 'مجاهد سيد موسي يعقوب', 'Mogahed', 'Sied Mosa', '', 'Yagoob', 'مجاهد', 'سيد موسي', '', 'يعقوب', 'joho@mail.com', 2147483647, '', '', 0, 0, '2024-09-25 03:02:02', '2024-09-25 03:02:02'),
(8, '201602043', 'Mogahed Sied Mosa Yagoob', 'مجاهد سيد موسي يعقوب', 'Mogahed', 'Sied Mosa', '', 'Yagoob', 'مجاهد', 'سيد موسي', '', 'يعقوب', 'joho@mail.com', 2147483647, '', '', 0, 0, '2024-09-25 03:06:20', '2024-09-25 03:06:20'),
(9, '201602026', 'Mogahed Musa Mohamed Abdalla ', 'مجاهد موسي حامد عبدالله', 'Mogahed', 'Musa Mohamed', '', 'Abdalla ', 'مجاهد', 'موسي حامد', '', 'عبدالله', 'M@MAIL.COM', 926262547, '', '', 0, 0, '2024-10-21 09:56:38', '2024-10-21 09:56:38'),
(10, '201702006', 'WAAD ELMAMOUN AHMED ELMUSTAFA', 'ولدي محمد المامون', 'WAAD', 'ELMAMOUN', '', 'AHMED ELMUSTAFA', 'وليد', ' محمد لامامون', '', 'حسن', 'mail@mai.com', 2147483647, '', '', 0, 0, '2024-10-23 09:39:02', '2024-10-23 09:39:02'),
(11, '201602043', 'Mogahed Sied Mosa Yagoob', 'غازي عبدالله عمر مصطفي ', 'Mogahed', 'Sied Mosa', '', 'Yagoob', 'غازي ', 'عمر ', '', 'حسن', 'Ghazi.Abdullah.2012@proton.me', 2147483647, '', '', 0, 0, '2024-10-23 09:44:20', '2024-10-23 09:44:20'),
(12, '201602043', 'Mogahed Sied Mosa Yagoob', 'غازي عبدالله عمر مصطفي ', 'Mogahed', 'Sied Mosa', '', 'Yagoob', 'غازي ', 'عمر ', '', 'حسن', 'Ghazi.Abdullah.2012@proton.me', 2147483647, '', '', 0, 0, '2024-10-23 09:44:56', '2024-10-23 09:44:56'),
(13, '201602043', 'Mogahed Sied Mosa Yagoob', 'غازي عبدالله عمر مصطفي ', 'Mogahed', 'Sied Mosa', '', 'Yagoob', 'غازي ', 'عمر ', '', 'حسن', 'Ghazi.Abdullah.2012@proton.me', 2147483647, '', '', 0, 0, '2024-10-23 09:44:58', '2024-10-23 09:44:58'),
(14, '201403006', 'Hussam Alden Abbas Mohammed Elsilawi', 'على عمر احمد على', 'Hussam Alden', 'Abbas Mohammed', '', 'Elsilawi', 'على ', 'نجيب عبدالرحمن', '', 'حسن', 'Ghazi.Abdullah.2012@proton.me', 2147483647, '', '', 0, 0, '2024-10-23 09:48:35', '2024-10-23 09:48:35'),
(15, '201403018', 'Nader Nageeb   Abdrhman Hassan', 'نادر نجيب عبدالرحمن حسن', 'Nader', 'Nageeb   Abdrhman', '', 'Hassan', 'نادر ', 'نجيب عبدالرحمن', '', 'حسن', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-11-16 23:17:35', '2024-11-16 23:17:35'),
(16, '201403017', 'Malaz Mahdi   Abdagadir Modaser', 'ملاذ مهدي عبدالقادر مدثر', 'Malaz', 'Mahdi   Abdagadir', '', 'Modaser', 'ملاذ ', 'مهدي عبدالقادر', '', 'مدثر', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-11-16 23:57:14', '2024-11-16 23:57:14'),
(17, '201602005', 'Saria Abdallah GHAZI Abuzeid', 'سارية عبدالله حسن عبدالعزيز', 'Saria', 'Abdallah Hussein', '', 'Abuzeid', 'سارية ', 'عبدالله حسن', '', 'عبدالعزيز', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-11-17 00:40:26', '2024-11-17 00:40:26'),
(18, '201521004', 'Osama Siddig Khamis  Rihan', 'اسامة صديق ', 'Osama', 'Siddig Khamis ', '', 'Rihan', 'غازي ', 'عبدالله ', '', 'حسن', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-11-17 22:53:02', '2024-11-17 22:53:02'),
(19, 'm19A55002', 'Nader Nageeb Abdrhman Hassan', 'نادر نجيب عبدالرحمن حسن', 'Nader', 'Nageeb', '', 'Abdrhman Hassan', 'نادر ', 'نجيب عبدالرحمن', '', 'حسن', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-11-17 23:02:09', '2024-11-17 23:02:09'),
(20, '201602016', 'Mohamed Elbagir Adam Hassan Adam', ' محمد الباقر ادم حسن ادم', 'Mohamed Elbagir', 'Adam Hassan', '', 'Adam', 'محمد الباقر', 'ادم حسن', '', 'ادم', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-11-21 00:53:19', '2024-11-21 00:53:19'),
(21, '201602003', 'Hisham Isameldin Mohamed Osman', 'هشام عصام الدين محمد', 'Hisham', 'Isameldin Mohamed', '', 'Osman', 'هشام', 'عصام الدين محمد', '', 'عثمان', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-11-21 02:13:12', '2024-11-21 02:13:12'),
(22, '201602019', 'Ahmed Nooraldeen Mohammed Altayeb', 'أحمد نور الدين محمد الطيب', 'Ahmed', 'Nooraldeen Mohammed', '', 'Altayeb', 'احمد', 'نورالدين محمد', '', 'الطيب', 'Ghazi.Abdullah.2012@proton.me', 949926648, '', '', 0, 0, '2024-11-21 04:04:19', '2024-11-21 04:04:19'),
(23, '201602018', 'Ghazi Abdallah Omer Mustafa', 'غازي عبدالله عمر مصطفي ', 'Ghazi', 'Abdallah Omer', '', 'Mustafa', 'غازي ', 'عبدالله عمر', '', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-11-30 21:22:57', '2024-11-30 21:22:57'),
(24, 'm19A55005', 'WAFAA Mustafa Mohammed Mohammed', 'وفاء مصطفي محمد محمد', 'wafaa', 'Mustafa', '', 'Mohammed Mohammed', 'وفاء', 'مصطفي محمد', '', 'محمد', 'wfaa@mail.me', 123456789, '', '', 0, 0, '2024-11-30 21:58:07', '2024-11-30 21:58:07'),
(25, '201602018', 'Ghazi Abdallah Omer Mustafa', 'غازي عبدالله عمر مصطفي ', 'Ghazi', 'Abdallah Omer', '', 'Mustafa', 'غازي ', 'عبدالله عمر', '', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-11-30 22:27:22', '2024-11-30 22:27:22'),
(26, 'm19A55005', 'WAFAA Mustafa Mohammed Mohammed', 'وفاء مصطفي محمد محمد', 'wafaa', 'Mustafa', '', 'Mohammed Mohammed', 'وفاء', 'مصطفي محمد', '', 'عبدالرحمن', 'Ghazi.Abdullah.2012@proton.me', 110425700, '', '', 0, 0, '2024-11-30 22:32:10', '2024-11-30 22:32:10'),
(27, '201602018', 'Ghazi Abdallah Omer Mustafa', 'غازي عبدالله عمر مصطفي ', 'Ghazi', 'Abdallah Omer', '', 'Mustafa', 'إسراء ', 'مصطفي محمد', '', 'عبدالعزيز', 'Ghazi.Abdullah.2012@proton.me', 1234567899, '', '', 0, 0, '2024-11-30 22:32:50', '2024-11-30 22:32:50'),
(28, '201602016', 'Mohamed Elbagir Adam Hassan Adam', 'نادر نجيب عبدالرحمن حسن', 'Mohamed Elbagir', 'Adam Hassan', '', 'Adam', 'نادر ', 'نجيب عبدالرحمن', '', 'مصطفي ', 'Ghazi.Abdullah.2012@proton.me', 110104257, '', '', 0, 0, '2024-11-30 22:33:19', '2024-11-30 22:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `student_cert_info`
--

CREATE TABLE `student_cert_info` (
  `std_cert_id` int(10) UNSIGNED NOT NULL,
  `student_basic_info_id` int(11) NOT NULL,
  `program` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `major` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `national_number` varchar(50) NOT NULL,
  `ministery_number` varchar(50) NOT NULL,
  `certificate_type` varchar(15) NOT NULL,
  `cert_printed_place` varchar(15) NOT NULL,
  `cert_printed_at` date NOT NULL,
  `gpa` float NOT NULL,
  `cgpa` float NOT NULL,
  `total_graduate_hour` int(11) NOT NULL,
  `mode` varchar(15) NOT NULL,
  `division` varchar(50) NOT NULL,
  `senate_on` date NOT NULL,
  `dell_std_cert_info` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_cert_info`
--

INSERT INTO `student_cert_info` (`std_cert_id`, `student_basic_info_id`, `program`, `faculty`, `major`, `nationality`, `national_number`, `ministery_number`, `certificate_type`, `cert_printed_place`, `cert_printed_at`, `gpa`, `cgpa`, `total_graduate_hour`, `mode`, `division`, `senate_on`, `dell_std_cert_info`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'Faculty of Architecture Engineering', 'B.Sc. in Architecture Engneering', '1', '112-202030', '00-0000', '2', '2', '2024-09-18', 3.8, 3.01, 216, '2', '1', '2024-09-18', 0, 0, '2024-09-18 10:09:52', '2024-09-18 10:09:52'),
(2, 2, '1', ' Faculty of Information Technology', 'B.Sc. in Information Technology', '1', '112-202030', '00-0000', '2', '2', '2024-09-18', 2.8, 2.32, 195, '1', '3', '2024-09-18', 0, 0, '2024-09-18 10:51:30', '2024-09-18 10:51:30'),
(3, 3, '1', 'Faculty of Computer Science', 'B.Sc. in Computer Science', '1', '112-202030', '00-0000', '2', '2', '2024-09-18', 3.14, 2.74, 214, '2', '1', '2024-09-18', 0, 0, '2024-09-18 13:21:50', '2024-09-18 13:21:50'),
(4, 4, '1', 'Faculty of Computer Science', 'B.Sc. in Computer Science', '1', '112-202030', '00-0000', '1', '2', '2024-10-10', 2.64, 2.49, 214, '2', '2', '2024-09-18', 0, 0, '2024-09-18 13:42:25', '2024-09-18 13:42:25'),
(5, 5, '1', 'Faculty of Computer Science', 'B.Sc. in Computer Science', '1', '112-202030', '00-0000', '1', '1', '2024-09-24', 3.14, 2.74, 214, '', '', '2024-09-24', 0, 0, '2024-09-24 11:05:37', '2024-09-24 11:05:37'),
(6, 8, '1', 'Faculty of Computer Science', 'B.Sc. in Computer Science', '1', '112-202030', '00-0000', '2', '1', '2020-02-01', 3.62, 3.32, 214, '2', '1', '2024-09-25', 0, 0, '2024-09-25 03:06:20', '2024-09-25 03:06:20'),
(7, 9, '1', 'Faculty of Computer Science', 'B.Sc. in Computer Science', '1', '112-202030', '00-0000', '1', '2', '2024-10-21', 2.76, 2.44, 214, '2', '2', '2024-10-21', 0, 0, '2024-10-21 09:56:38', '2024-10-21 09:56:38'),
(8, 10, '1', 'Faculty of Computer Science', 'B.Sc. in Computer Science', '1', '112-202030', '00-0000', '1', '1', '2024-10-23', 2.61, 2.35, 212, '1', '1', '2024-10-23', 0, 0, '2024-10-23 09:39:02', '2024-10-23 09:39:02'),
(9, 11, '1', 'Faculty of Computer Science', 'B.Sc. in Computer Science', '1', '112-202030', '00-0000', '1', '2', '2024-10-23', 3.62, 3.32, 214, '3', '2', '2024-10-23', 0, 0, '2024-10-23 09:44:20', '2024-10-23 09:44:20'),
(10, 12, '1', 'Faculty of Computer Science', 'B.Sc. in Computer Science', '1', '112-202030', '00-0000', '1', '2', '2024-10-23', 3.62, 3.32, 214, '3', '2', '2024-10-23', 0, 0, '2024-10-23 09:44:56', '2024-10-23 09:44:56'),
(11, 13, '1', 'Faculty of Computer Science', 'B.Sc. in Computer Science', '1', '112-202030', '00-0000', '1', '2', '2024-10-23', 3.62, 3.32, 214, '3', '2', '2024-10-23', 0, 0, '2024-10-23 09:44:58', '2024-10-23 09:44:58'),
(12, 14, '1', ' Faculty of Information Technology', 'B.Sc. in Information Technology', '1', '112-202030', '00-0000', '1', '1', '2024-10-23', 2.71, 2.72, 195, '2', '', '2024-10-23', 0, 0, '2024-10-23 09:48:35', '2024-10-23 09:48:35'),
(13, 15, '1', ' Faculty of Information Technology', 'B.Sc. in Information Technology', '1', '112-202030', '00-0000', '3', '2', '2024-11-17', 2.8, 2.32, 195, '1', '2', '2024-11-17', 0, 0, '2024-11-16 23:17:35', '2024-11-16 23:17:35'),
(14, 16, '1', ' Faculty of Information Technology', 'B.Sc. in Information Technology', '1', '112-202030', '00-0000', '3', '1', '2024-11-17', 2.72, 2.25, 195, '2', '2', '2024-11-17', 0, 0, '2024-11-16 23:57:14', '2024-11-16 23:57:14'),
(15, 17, '1', 'Faculty of Computer Science', 'B.Sc. in Computer Science', '1', '112-202030', '00-0000', '3', '2', '2024-11-17', 2.64, 2.49, 214, '2', '2', '2024-11-17', 0, 0, '2024-11-17 00:40:26', '2024-11-17 00:40:26'),
(16, 18, '1', 'Faculty of Geoinformatics', 'B.Sc. In GIS', '1', '112-202030', '00-0000', '3', '1', '2024-11-18', 1.67, 2.07, 340, '2', '2', '2024-11-18', 0, 0, '2024-11-17 22:53:02', '2024-11-17 22:53:02'),
(17, 19, '3', 'Faculty of Postgraduate Studies', 'Master in Information System', '1', '112-202030', '00-0000', '3', '2', '2024-11-18', 0, 3.25, 36, '2', '1', '2023-05-14', 0, 0, '2024-11-17 23:02:09', '2024-11-17 23:02:09'),
(18, 20, '1', 'Faculty of Computer Science', 'B.Sc. in Computer Science', '1', '112-202030', '00-0000', '3', '2', '2024-11-21', 2.42, 2.12, 271, '2', '2', '2024-11-21', 0, 0, '2024-11-21 00:53:19', '2024-11-21 00:53:19'),
(19, 21, '1', 'Faculty of Computer Science', 'B.Sc. in Computer Science', '1', '112-202030', '00-0000', '3', '2', '2024-11-21', 2.81, 2.16, 214, '1', '2', '2024-11-21', 0, 0, '2024-11-21 02:13:12', '2024-11-21 02:13:12'),
(20, 22, '1', 'Faculty of Computer Science', 'B.Sc. in Computer Science', '1', '112-202030', '00-0000', '3', '2', '2024-11-21', 2.95, 2.16, 214, '3', '2', '2024-11-21', 0, 0, '2024-11-21 04:04:19', '2024-11-21 04:04:19'),
(21, 23, '1', 'Faculty of Computer Science', 'B.Sc. in Computer Science', '1', '112-202030', '00-0000', '3', '2', '2024-11-30', 3.14, 2.74, 214, '2', '2', '2024-11-30', 0, 0, '2024-11-30 21:22:57', '2024-11-30 21:22:57'),
(22, 24, '3', 'Faculty of Postgraduate Studies', 'Master in Information System', '1', '112-202030', '00-0000', '3', '2', '2024-11-30', 0, 3.5, 36, '2', '2', '2024-11-30', 0, 0, '2024-11-30 21:58:07', '2024-11-30 21:58:07'),
(23, 25, '1', 'Faculty of Computer Science', 'B.Sc. in Computer Science', '1', '112-202030', '00-0000', '3', '2', '2024-12-01', 3.14, 2.74, 214, '2', '2', '2024-12-01', 0, 0, '2024-11-30 22:27:22', '2024-11-30 22:27:22'),
(24, 26, '3', 'Faculty of Postgraduate Studies', 'Master in Information System', '1', '112-202030', '00-0000', '3', '2', '2024-12-01', 0, 3.5, 36, '2', '3', '2024-12-01', 0, 0, '2024-11-30 22:32:10', '2024-11-30 22:32:10'),
(25, 27, '1', 'Faculty of Computer Science', 'B.Sc. in Computer Science', '1', '112-202030', '00-0000', '3', '2', '2024-12-01', 3.14, 2.74, 214, '2', '2', '2024-12-01', 0, 0, '2024-11-30 22:32:50', '2024-11-30 22:32:50'),
(26, 28, '1', 'Faculty of Computer Science', 'B.Sc. in Computer Science', '1', '112-202030', '00-0000', '3', '2', '2024-12-01', 2.42, 2.12, 271, '2', '3', '2024-12-01', 0, 0, '2024-11-30 22:33:19', '2024-11-30 22:33:19');

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
(21, 'Asia Ahmed', 'Asia', 'Asia.Ahmed@protonmail.com', '202cb962ac59075b964b07152d234b70', 3, 0, 1, 0, '2024-08-12 10:40:14', '2024-08-12 10:40:14'),
(22, 'Nadir Njeeb', 'nedo', 'nedo@mail.com', '202cb962ac59075b964b07152d234b70', 2, 0, 1, 0, '2024-08-12 13:38:23', '2024-08-12 13:38:23'),
(23, 'Nadir Njeeb', 'Nadir', 'nedo@mail.com', '202cb962ac59075b964b07152d234b70', 2, 0, 1, 0, '2024-08-27 02:12:59', '2024-08-27 02:12:59'),
(24, 'Ghazi Abdallah Omer', 'Ghaz', 'omer@mail.com', '202cb962ac59075b964b07152d234b70', 1, 0, 1, 0, '2024-08-27 02:19:50', '2024-08-27 02:19:50'),
(25, 'khalid', 'kh', 'khalid@fu.sd.com', '202cb962ac59075b964b07152d234b70', 3, 0, 1, 0, '2024-09-03 00:10:45', '2024-09-03 00:10:45'),
(26, 'mazin', 'maz', 'mazi@mail.com', '202cb962ac59075b964b07152d234b70', 3, 0, 1, 0, '2024-09-16 13:36:36', '2024-09-16 13:36:36'),
(27, 'Muhammed Eissa', 'sia', 'sia@mail.com', '202cb962ac59075b964b07152d234b70', 3, 0, 1, 0, '2024-11-17 00:37:29', '2024-11-17 00:37:29'),
(28, 'aa', 'aa', 'Ghazi.Abdullah.2012@proton.me', '202cb962ac59075b964b07152d234b70', 1, 0, 1, 0, '2024-11-30 21:15:41', '2024-11-30 21:15:41'),
(29, 'Nadir Njeeb', 'admin', 'Ghazi.Abdullah.2012@proton.me', '202cb962ac59075b964b07152d234b70', 2, 0, 1, 0, '2024-11-30 21:41:57', '2024-11-30 21:41:57'),
(30, 'Nadir Njeeb', 'admin', 'Ghazi.Abdullah.2012@proton.me', '202cb962ac59075b964b07152d234b70', 2, 0, 1, 0, '2024-11-30 22:03:32', '2024-11-30 22:03:32'),
(31, 'Nadir Njeeb', 'admin', 'nedo@mail.com', '202cb962ac59075b964b07152d234b70', 2, 0, 1, 0, '2024-11-30 22:06:50', '2024-11-30 22:06:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_code`),
  ADD KEY `fac_ind` (`faculty_code`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`major_code`),
  ADD KEY `faculty_code_ind` (`faculty_code`);

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
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_code` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `major_code` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `paper_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `paper_update`
--
ALTER TABLE `paper_update`
  MODIFY `paper_update_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `scanned_issue`
--
ALTER TABLE `scanned_issue`
  MODIFY `scanned_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_basic_info`
--
ALTER TABLE `student_basic_info`
  MODIFY `student_basic_info_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `student_cert_info`
--
ALTER TABLE `student_cert_info`
  MODIFY `std_cert_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl-log`
--
ALTER TABLE `tbl-log`
  MODIFY `log_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
