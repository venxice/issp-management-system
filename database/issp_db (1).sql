-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 15, 2026 at 03:15 AM
-- Server version: 8.0.46
-- PHP Version: 8.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `issp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int NOT NULL,
  `issp_id` int DEFAULT NULL,
  `uploaded_by` int NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` varchar(50) DEFAULT NULL,
  `file_size` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` int UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('ci_session:4508b3ea5150e8e1a427c91bfbdec364', '192.168.65.1', 4294967295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313738313439333233333b5f63695f70726576696f75735f75726c7c733a34313a22687474703a2f2f6c6f63616c686f73743a383038302f696e6465782e7068702f64617368626f617264223b69735f6c6f676765645f696e7c623a313b757365725f69647c693a313b6e616d657c733a32303a2253797374656d2041646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e40697373702e74657374223b726f6c655f69647c693a353b726f6c655f6e616d657c733a31333a2241646d696e6973747261746f72223b726f6c655f736c75677c733a353a2261646d696e223b6465706172746d656e745f69647c733a323a223237223b6465706172746d656e747c733a33303a224f6666696365206f6620746865204469726563746f722d47656e6572616c223b6c6f67696e5f70726f76696465727c733a383a2270617373776f7264223b6c6f67696e5f61747c733a31393a22323032362d30362d31352030333a31333a3533223b5f5f63695f766172737c613a303a7b7d),
('ci_session:5ca9c01af4ab69ecbae9cb4bbbfb1c63', '192.168.65.1', 4294967295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313738313439323235303b5f63695f70726576696f75735f75726c7c733a34313a22687474703a2f2f6c6f63616c686f73743a383038302f696e6465782e7068702f64617368626f617264223b69735f6c6f676765645f696e7c623a313b757365725f69647c693a313b6e616d657c733a32303a2253797374656d2041646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e40697373702e74657374223b726f6c655f69647c693a353b726f6c655f6e616d657c733a31333a2241646d696e6973747261746f72223b726f6c655f736c75677c733a353a2261646d696e223b6465706172746d656e745f69647c733a323a223237223b6465706172746d656e747c733a33303a224f6666696365206f6620746865204469726563746f722d47656e6572616c223b6c6f67696e5f70726f76696465727c733a383a2270617373776f7264223b6c6f67696e5f61747c733a31393a22323032362d30362d31352030323a34323a3133223b5f5f63695f766172737c613a303a7b7d),
('ci_session:7193fc979510a435eb993ff9f2b2eb26', '192.168.65.1', 4294967295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313738313439323538323b5f63695f70726576696f75735f75726c7c733a34323a22687474703a2f2f6c6f63616c686f73743a383038302f696e6465782e7068702f61756469742d6c6f6773223b69735f6c6f676765645f696e7c623a313b757365725f69647c693a313b6e616d657c733a32303a2253797374656d2041646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e40697373702e74657374223b726f6c655f69647c693a353b726f6c655f6e616d657c733a31333a2241646d696e6973747261746f72223b726f6c655f736c75677c733a353a2261646d696e223b6465706172746d656e745f69647c733a323a223237223b6465706172746d656e747c733a33303a224f6666696365206f6620746865204469726563746f722d47656e6572616c223b6c6f67696e5f70726f76696465727c733a383a2270617373776f7264223b6c6f67696e5f61747c733a31393a22323032362d30362d31352030323a34323a3133223b5f5f63695f766172737c613a303a7b7d),
('ci_session:b027bc40a8d0f34f4bb1045fd3870d19', '192.168.65.1', 4294967295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313738313439323838363b5f63695f70726576696f75735f75726c7c733a34323a22687474703a2f2f6c6f63616c686f73743a383038302f696e6465782e7068702f61756469742d6c6f6773223b69735f6c6f676765645f696e7c623a313b757365725f69647c693a313b6e616d657c733a32303a2253797374656d2041646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e40697373702e74657374223b726f6c655f69647c693a353b726f6c655f6e616d657c733a31333a2241646d696e6973747261746f72223b726f6c655f736c75677c733a353a2261646d696e223b6465706172746d656e745f69647c733a323a223237223b6465706172746d656e747c733a33303a224f6666696365206f6620746865204469726563746f722d47656e6572616c223b6c6f67696e5f70726f76696465727c733a383a2270617373776f7264223b6c6f67696e5f61747c733a31393a22323032362d30362d31352030323a34323a3133223b5f5f63695f766172737c613a303a7b7d);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Management Information Systems Division', NULL, NULL),
(2, 'Office of the Director General', NULL, NULL),
(3, 'Office of the Deputy Director-General for Finance, Legal Administration, and Special Concern', NULL, NULL),
(4, 'Administrative Division', NULL, NULL),
(5, 'Creative and Production Services Division', NULL, NULL),
(6, 'Finance and Management Division', NULL, NULL),
(7, 'Human Resource Development Division', NULL, NULL),
(8, 'Planning and Communication Research Division', NULL, NULL),
(9, 'Program Management Division', NULL, NULL),
(10, 'Regional Operations Division', NULL, NULL),
(11, 'Region I', NULL, NULL),
(12, 'Region II', NULL, NULL),
(13, 'Region III', NULL, NULL),
(14, 'Region IV-A', NULL, NULL),
(15, 'MIMAROPA', NULL, NULL),
(16, 'Region V', NULL, NULL),
(17, 'Region VI', NULL, NULL),
(18, 'Region VII', NULL, NULL),
(19, 'Region VIII', NULL, NULL),
(20, 'Region IX', NULL, NULL),
(21, 'Region X', NULL, NULL),
(22, 'Region XI', NULL, NULL),
(23, 'Region XII', NULL, NULL),
(24, 'Region XIII', NULL, NULL),
(25, 'Cordillera Administrative Region', NULL, NULL),
(26, 'National Capital Region', NULL, NULL),
(27, 'Office of the Director-General', '2026-06-15 01:31:04', '2026-06-15 01:33:40'),
(28, 'Information Technology', '2026-06-15 01:31:04', '2026-06-15 01:33:40'),
(29, 'Finance', '2026-06-15 01:31:04', '2026-06-15 01:33:40'),
(30, 'Planning', '2026-06-15 01:31:04', '2026-06-15 01:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `issp_agency_profile`
--

CREATE TABLE `issp_agency_profile` (
  `id` int NOT NULL,
  `issp_id` int NOT NULL,
  `mandate` text,
  `vision` text,
  `mission` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issp_comments`
--

CREATE TABLE `issp_comments` (
  `id` int NOT NULL,
  `issp_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issp_egov_programs`
--

CREATE TABLE `issp_egov_programs` (
  `id` int NOT NULL,
  `issp_id` int NOT NULL,
  `program_name` varchar(255) DEFAULT NULL,
  `description` text,
  `status` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issp_human_capital`
--

CREATE TABLE `issp_human_capital` (
  `id` int NOT NULL,
  `issp_id` int NOT NULL,
  `training_program` varchar(255) DEFAULT NULL,
  `participants` int DEFAULT NULL,
  `estimated_cost` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issp_investments`
--

CREATE TABLE `issp_investments` (
  `id` int NOT NULL,
  `issp_id` int NOT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `total_cost` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issp_investment_items`
--

CREATE TABLE `issp_investment_items` (
  `id` int NOT NULL,
  `investment_id` int NOT NULL,
  `year` year DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `office_location` varchar(255) DEFAULT NULL,
  `fund_source` varchar(255) DEFAULT NULL,
  `unit_cost` decimal(15,2) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `total_cost` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issp_network_assets`
--

CREATE TABLE `issp_network_assets` (
  `id` int NOT NULL,
  `issp_id` int NOT NULL,
  `asset_name` varchar(255) DEFAULT NULL,
  `description` text,
  `location` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issp_organization_units`
--

CREATE TABLE `issp_organization_units` (
  `id` int NOT NULL,
  `issp_id` int NOT NULL,
  `office_name` varchar(255) NOT NULL,
  `parent_office` varchar(255) DEFAULT NULL,
  `functions` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issp_proposed_infrastructure`
--

CREATE TABLE `issp_proposed_infrastructure` (
  `id` int NOT NULL,
  `issp_id` int NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `justification` text,
  `estimated_cost` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issp_proposed_systems`
--

CREATE TABLE `issp_proposed_systems` (
  `id` int NOT NULL,
  `issp_id` int NOT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `description` text,
  `expected_benefits` text,
  `priority` enum('Low','Medium','High','Critical') DEFAULT 'Medium',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issp_records`
--

CREATE TABLE `issp_records` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `department_id` int NOT NULL,
  `created_by` int NOT NULL,
  `status` enum('draft','pending','approved','rejected','revision') DEFAULT 'draft',
  `budget` decimal(12,2) DEFAULT '0.00',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `period_start` year DEFAULT NULL,
  `period_end` year DEFAULT NULL,
  `remarks` text,
  `submitted_at` datetime DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `current_editor` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issp_stakeholders`
--

CREATE TABLE `issp_stakeholders` (
  `id` int NOT NULL,
  `issp_id` int NOT NULL,
  `stakeholder_name` varchar(255) NOT NULL,
  `transaction_service` varchar(255) DEFAULT NULL,
  `complexity` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issp_strategic_concerns`
--

CREATE TABLE `issp_strategic_concerns` (
  `id` int NOT NULL,
  `issp_id` int NOT NULL,
  `concern` varchar(255) DEFAULT NULL,
  `description` text,
  `impact` text,
  `priority` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issp_system_inventory`
--

CREATE TABLE `issp_system_inventory` (
  `id` int NOT NULL,
  `issp_id` int NOT NULL,
  `system_name` varchar(255) DEFAULT NULL,
  `owner_office` varchar(255) DEFAULT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `remarks` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `action`, `description`, `created_at`) VALUES
(1, 1, 'login', 'User signed in using password.', '2026-06-15 01:35:24'),
(2, 1, 'logout', 'User signed out.', '2026-06-15 01:36:45'),
(3, 1, 'login', 'User signed in using password.', '2026-06-15 01:37:13'),
(4, 1, 'logout', 'User signed out.', '2026-06-15 01:37:54'),
(5, 1, 'login', 'User signed in using password.', '2026-06-15 01:40:16'),
(6, 1, 'logout', 'User signed out.', '2026-06-15 01:40:27'),
(7, 1, 'login', 'User signed in using password.', '2026-06-15 01:41:37'),
(8, 1, 'login', 'User signed in using password.', '2026-06-15 01:48:49'),
(9, 1, 'logout', 'User signed out.', '2026-06-15 02:07:42'),
(10, 1, 'login', 'User signed in using password.', '2026-06-15 02:07:52'),
(11, 1, 'login', 'User signed in using password.', '2026-06-15 02:11:20'),
(12, 1, 'logout', 'User signed out.', '2026-06-15 02:16:19'),
(13, 1, 'login', 'User signed in using password.', '2026-06-15 02:16:20'),
(14, 1, 'logout', 'User signed out.', '2026-06-15 02:16:32'),
(15, 1, 'login', 'User signed in using password.', '2026-06-15 02:16:33'),
(16, 1, 'logout', 'User signed out.', '2026-06-15 02:24:42'),
(17, 1, 'login', 'User signed in using password.', '2026-06-15 02:25:03'),
(18, 1, 'login', 'User signed in using password.', '2026-06-15 02:27:59'),
(19, 1, 'login', 'User signed in using password.', '2026-06-15 02:35:13'),
(20, 1, 'user.created', 'Created user #2 (venicedon17@gmail.com).', '2026-06-15 02:39:25'),
(21, 1, 'login', 'User signed in using password.', '2026-06-15 02:42:13'),
(22, 1, 'logout', 'User signed out.', '2026-06-15 03:11:57'),
(23, 1, 'login', 'User signed in using password.', '2026-06-15 03:12:00'),
(24, 1, 'logout', 'User signed out.', '2026-06-15 03:13:21'),
(25, 1, 'login', 'User signed in using password.', '2026-06-15 03:13:22'),
(26, 1, 'logout', 'User signed out.', '2026-06-15 03:13:52'),
(27, 1, 'login', 'User signed in using password.', '2026-06-15 03:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2026-06-15-000001', 'App\\Database\\Migrations\\CreateAuthTables', 'default', 'App', 1781487055, 1),
(2, '2026-06-15-000002', 'App\\Database\\Migrations\\NormalizeUserNameColumns', 'default', 'App', 1781487212, 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`) VALUES
(1, 'Job Order'),
(2, 'Chief Administrative Officer'),
(3, 'Supervising Administrative Officer'),
(4, 'Information Officer V'),
(5, 'Information Officer IV'),
(6, 'Information Officer III'),
(7, 'Information Officer II'),
(8, 'Information Officer I'),
(9, 'Information Technology Officer I'),
(10, 'Information Systems Analyst II'),
(11, 'Computer Programmer III'),
(12, 'Computer Programmer II'),
(13, 'Administrative Officer V'),
(14, 'Administrative Officer IV'),
(15, 'Administrative Officer II'),
(16, 'Administrative Assistant VI'),
(17, 'Administrative Assistant V'),
(18, 'Administrative Assistant IV'),
(19, 'Administrative Assistant III'),
(20, 'Administrative Assistant II'),
(21, 'Computer Maintenance Technologist I'),
(22, 'Computer Maintenance Technologist II'),
(23, 'Computer Maintenance Technologist III'),
(24, 'Director General');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(80) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_system` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `is_system`, `created_at`, `updated_at`) VALUES
(1, 'Employee', 'employee', 'Encodes assigned ISSP tasks and submissions.', 1, NULL, '2026-06-15 01:33:40'),
(2, 'Network Management Head', NULL, NULL, 0, NULL, NULL),
(3, 'Software Development Head', NULL, NULL, 0, NULL, NULL),
(4, 'Data Management Head', NULL, NULL, 0, NULL, NULL),
(5, 'Administrator', 'admin', 'Full access to system settings, users, roles, and all ISSP records.', 1, NULL, '2026-06-15 01:33:40'),
(6, 'Consolidator', NULL, NULL, 0, NULL, NULL),
(7, 'Department Head', 'department_head', 'Reviews department submissions and monitors assigned work.', 1, '2026-06-15 01:31:04', '2026-06-15 01:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `middle_initial` varchar(10) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int NOT NULL,
  `department_id` int DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `position_id` int DEFAULT NULL,
  `sso_provider` varchar(50) DEFAULT NULL,
  `sso_subject` varchar(190) DEFAULT NULL,
  `email_verified` tinyint(1) DEFAULT '0',
  `last_login_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `middle_initial`, `email`, `password`, `role_id`, `department_id`, `status`, `created_at`, `position_id`, `sso_provider`, `sso_subject`, `email_verified`, `last_login_at`, `updated_at`, `name`) VALUES
(1, 'System', 'Administrator', NULL, 'admin@issp.test', '$2y$10$TL.JLtA/I.DkUbzn2KI44OQCHMMeJ.CTZ4T.T/Lv7txLL4byf2TZe', 5, 27, 'active', '2026-06-15 01:33:40', NULL, NULL, NULL, 1, '2026-06-15 03:13:53', '2026-06-15 03:13:53', 'System Administrator'),
(2, 'Venice', 'Don', 'A', 'venicedon17@gmail.com', '$2y$10$wmfS0ZD9iytJFZr..3/VNuQj2R4j8UADknBOXbK032FUacSt5wmuK', 5, 1, 'active', '2026-06-15 02:39:25', NULL, NULL, NULL, 0, NULL, '2026-06-15 02:39:25', 'Venice A Don');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_attachments_users` (`uploaded_by`),
  ADD KEY `fk_attachments_issp` (`issp_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timestamp` (`timestamp`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issp_agency_profile`
--
ALTER TABLE `issp_agency_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `issp_id` (`issp_id`);

--
-- Indexes for table `issp_comments`
--
ALTER TABLE `issp_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_issp` (`issp_id`),
  ADD KEY `fk_comments_user` (`user_id`);

--
-- Indexes for table `issp_egov_programs`
--
ALTER TABLE `issp_egov_programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_egov_programs_issp` (`issp_id`);

--
-- Indexes for table `issp_human_capital`
--
ALTER TABLE `issp_human_capital`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_human_capital_issp` (`issp_id`);

--
-- Indexes for table `issp_investments`
--
ALTER TABLE `issp_investments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_investments_issp` (`issp_id`);

--
-- Indexes for table `issp_investment_items`
--
ALTER TABLE `issp_investment_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_investment_items` (`investment_id`);

--
-- Indexes for table `issp_network_assets`
--
ALTER TABLE `issp_network_assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_network_assets_issp` (`issp_id`);

--
-- Indexes for table `issp_organization_units`
--
ALTER TABLE `issp_organization_units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_org_units_issp` (`issp_id`);

--
-- Indexes for table `issp_proposed_infrastructure`
--
ALTER TABLE `issp_proposed_infrastructure`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_proposed_infrastructure_issp` (`issp_id`);

--
-- Indexes for table `issp_proposed_systems`
--
ALTER TABLE `issp_proposed_systems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_proposed_systems_issp` (`issp_id`);

--
-- Indexes for table `issp_records`
--
ALTER TABLE `issp_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_issp_departments` (`department_id`),
  ADD KEY `fk_issp_users` (`created_by`);

--
-- Indexes for table `issp_stakeholders`
--
ALTER TABLE `issp_stakeholders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stakeholders_issp` (`issp_id`);

--
-- Indexes for table `issp_strategic_concerns`
--
ALTER TABLE `issp_strategic_concerns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_strategic_concerns_issp` (`issp_id`);

--
-- Indexes for table `issp_system_inventory`
--
ALTER TABLE `issp_system_inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_system_inventory_issp` (`issp_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_logs_users` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_notifications_users` (`user_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_users_roles` (`role_id`),
  ADD KEY `fk_users_departments` (`department_id`),
  ADD KEY `fk_users_positions` (`position_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `issp_agency_profile`
--
ALTER TABLE `issp_agency_profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issp_comments`
--
ALTER TABLE `issp_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issp_egov_programs`
--
ALTER TABLE `issp_egov_programs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issp_human_capital`
--
ALTER TABLE `issp_human_capital`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issp_investments`
--
ALTER TABLE `issp_investments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issp_investment_items`
--
ALTER TABLE `issp_investment_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issp_network_assets`
--
ALTER TABLE `issp_network_assets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issp_organization_units`
--
ALTER TABLE `issp_organization_units`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issp_proposed_infrastructure`
--
ALTER TABLE `issp_proposed_infrastructure`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issp_proposed_systems`
--
ALTER TABLE `issp_proposed_systems`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issp_records`
--
ALTER TABLE `issp_records`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issp_stakeholders`
--
ALTER TABLE `issp_stakeholders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issp_strategic_concerns`
--
ALTER TABLE `issp_strategic_concerns`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issp_system_inventory`
--
ALTER TABLE `issp_system_inventory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `fk_attachments_issp` FOREIGN KEY (`issp_id`) REFERENCES `issp_records` (`id`),
  ADD CONSTRAINT `fk_attachments_users` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `issp_agency_profile`
--
ALTER TABLE `issp_agency_profile`
  ADD CONSTRAINT `fk_agency_profile_issp` FOREIGN KEY (`issp_id`) REFERENCES `issp_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `issp_comments`
--
ALTER TABLE `issp_comments`
  ADD CONSTRAINT `fk_comments_issp` FOREIGN KEY (`issp_id`) REFERENCES `issp_records` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comments_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `issp_egov_programs`
--
ALTER TABLE `issp_egov_programs`
  ADD CONSTRAINT `fk_egov_programs_issp` FOREIGN KEY (`issp_id`) REFERENCES `issp_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `issp_human_capital`
--
ALTER TABLE `issp_human_capital`
  ADD CONSTRAINT `fk_human_capital_issp` FOREIGN KEY (`issp_id`) REFERENCES `issp_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `issp_investments`
--
ALTER TABLE `issp_investments`
  ADD CONSTRAINT `fk_investments_issp` FOREIGN KEY (`issp_id`) REFERENCES `issp_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `issp_investment_items`
--
ALTER TABLE `issp_investment_items`
  ADD CONSTRAINT `fk_investment_items` FOREIGN KEY (`investment_id`) REFERENCES `issp_investments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `issp_network_assets`
--
ALTER TABLE `issp_network_assets`
  ADD CONSTRAINT `fk_network_assets_issp` FOREIGN KEY (`issp_id`) REFERENCES `issp_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `issp_organization_units`
--
ALTER TABLE `issp_organization_units`
  ADD CONSTRAINT `fk_org_units_issp` FOREIGN KEY (`issp_id`) REFERENCES `issp_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `issp_proposed_infrastructure`
--
ALTER TABLE `issp_proposed_infrastructure`
  ADD CONSTRAINT `fk_proposed_infrastructure_issp` FOREIGN KEY (`issp_id`) REFERENCES `issp_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `issp_proposed_systems`
--
ALTER TABLE `issp_proposed_systems`
  ADD CONSTRAINT `fk_proposed_systems_issp` FOREIGN KEY (`issp_id`) REFERENCES `issp_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `issp_records`
--
ALTER TABLE `issp_records`
  ADD CONSTRAINT `fk_issp_departments` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `fk_issp_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `issp_stakeholders`
--
ALTER TABLE `issp_stakeholders`
  ADD CONSTRAINT `fk_stakeholders_issp` FOREIGN KEY (`issp_id`) REFERENCES `issp_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `issp_strategic_concerns`
--
ALTER TABLE `issp_strategic_concerns`
  ADD CONSTRAINT `fk_strategic_concerns_issp` FOREIGN KEY (`issp_id`) REFERENCES `issp_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `issp_system_inventory`
--
ALTER TABLE `issp_system_inventory`
  ADD CONSTRAINT `fk_system_inventory_issp` FOREIGN KEY (`issp_id`) REFERENCES `issp_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_logs_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `fk_notifications_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_departments` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `fk_users_positions` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `fk_users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
