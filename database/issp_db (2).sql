-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 30, 2026 at 02:44 AM
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
  `id` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` int UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('ci_session:01ad325948ab5716cc94a925d5656928', '192.168.65.1', 4294967295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313738323738363931303b5f63695f70726576696f75735f75726c7c733a38363a22687474703a2f2f6c6f63616c686f73743a383038302f696e6465782e7068702f656d706c6f7965652f70726f706f7365642d6963742d73747261746567792f706572666f726d616e63652d6d6561737572656d656e74223b69735f6c6f676765645f696e7c623a313b757365725f69647c693a323b6e616d657c733a31323a2256656e696365204120446f6e223b656d61696c7c733a32313a2276656e696365646f6e313740676d61696c2e636f6d223b726f6c655f69647c693a313b726f6c655f6e616d657c733a383a22456d706c6f796565223b726f6c655f736c75677c733a383a22656d706c6f796565223b6465706172746d656e745f69647c733a313a2231223b6465706172746d656e747c733a33393a224d616e6167656d656e7420496e666f726d6174696f6e2053797374656d73204469766973696f6e223b6c6f67696e5f70726f76696465727c733a363a22676f6f676c65223b6c6f67696e5f61747c733a31393a22323032362d30362d33302031303a31363a3134223b),
('ci_session:1b33b30d598f6aafc8a4f8fa060a635a', '192.168.65.1', 4294967295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313738323738373235363b5f63695f70726576696f75735f75726c7c733a35303a22687474703a2f2f6c6f63616c686f73743a383038302f696e6465782e7068702f656d706c6f7965652f64617368626f617264223b69735f6c6f676765645f696e7c623a313b757365725f69647c693a323b6e616d657c733a31323a2256656e696365204120446f6e223b656d61696c7c733a32313a2276656e696365646f6e313740676d61696c2e636f6d223b726f6c655f69647c693a313b726f6c655f6e616d657c733a383a22456d706c6f796565223b726f6c655f736c75677c733a383a22656d706c6f796565223b6465706172746d656e745f69647c733a313a2231223b6465706172746d656e747c733a33393a224d616e6167656d656e7420496e666f726d6174696f6e2053797374656d73204469766973696f6e223b6c6f67696e5f70726f76696465727c733a363a22676f6f676c65223b6c6f67696e5f61747c733a31393a22323032362d30362d33302031303a31363a3134223b),
('ci_session:688f88ae068c1ba2cc2c56d5ef8f2ff4', '192.168.65.1', 4294967295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313738323738363135353b5f63695f70726576696f75735f75726c7c733a37353a22687474703a2f2f6c6f63616c686f73743a383038302f696e6465782e7068702f656d706c6f7965652f70726f706f7365642d6963742d73747261746567792f6963742d70726f6a65637473223b69735f6c6f676765645f696e7c623a313b757365725f69647c693a323b6e616d657c733a31323a2256656e696365204120446f6e223b656d61696c7c733a32313a2276656e696365646f6e313740676d61696c2e636f6d223b726f6c655f69647c693a313b726f6c655f6e616d657c733a383a22456d706c6f796565223b726f6c655f736c75677c733a383a22656d706c6f796565223b6465706172746d656e745f69647c733a313a2231223b6465706172746d656e747c733a33393a224d616e6167656d656e7420496e666f726d6174696f6e2053797374656d73204469766973696f6e223b6c6f67696e5f70726f76696465727c733a363a22676f6f676c65223b6c6f67696e5f61747c733a31393a22323032362d30362d33302031303a31363a3134223b),
('ci_session:8805efcb5271073d44f58c941eb907c3', '192.168.65.1', 4294967295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313738323738373235363b5f63695f70726576696f75735f75726c7c733a36333a22687474703a2f2f6c6f63616c686f73743a383038302f696e6465782e7068702f656d706c6f7965652f7375626d69747465642d6963742d70726f6a65637473223b69735f6c6f676765645f696e7c623a313b757365725f69647c693a323b6e616d657c733a31323a2256656e696365204120446f6e223b656d61696c7c733a32313a2276656e696365646f6e313740676d61696c2e636f6d223b726f6c655f69647c693a313b726f6c655f6e616d657c733a383a22456d706c6f796565223b726f6c655f736c75677c733a383a22656d706c6f796565223b6465706172746d656e745f69647c733a313a2231223b6465706172746d656e747c733a33393a224d616e6167656d656e7420496e666f726d6174696f6e2053797374656d73204469766973696f6e223b6c6f67696e5f70726f76696465727c733a363a22676f6f676c65223b6c6f67696e5f61747c733a31393a22323032362d30362d33302031303a31363a3134223b);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int NOT NULL,
  `name` varchar(120) NOT NULL,
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
-- Table structure for table `issp_records`
--

CREATE TABLE `issp_records` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `department_id` int NOT NULL,
  `created_by` int NOT NULL,
  `status` enum('draft','pending','endorsed','approved','rejected','revision','returned','resubmitted') DEFAULT 'draft',
  `budget` decimal(12,2) DEFAULT '0.00',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `period_start` year DEFAULT NULL,
  `period_end` year DEFAULT NULL,
  `remarks` text,
  `submitted_at` datetime DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `current_editor` int DEFAULT NULL,
  `form_data` longtext,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `issp_records`
--

INSERT INTO `issp_records` (`id`, `title`, `description`, `department_id`, `created_by`, `status`, `budget`, `start_date`, `end_date`, `created_at`, `period_start`, `period_end`, `remarks`, `submitted_at`, `approved_at`, `current_editor`, `form_data`, `updated_at`) VALUES
(1, '1', '', 1, 2, 'draft', 0.00, NULL, NULL, '2026-06-30 09:20:06', NULL, NULL, NULL, NULL, NULL, NULL, '{\"network-infrastructure-form\":{\"csrf_test_name\":\"e708ebc94a1437353f32fbb855cd8371\",\"dept_connectivity_type\":\"dsl\",\"dept_ipv6_ready\":\"\",\"dept_upload_speed\":\"1232\",\"dept_download_speed\":\"\",\"dept_description\":\"asas\",\"regional_connectivity_type\":\"\",\"regional_ipv6_ready\":\"\",\"regional_upload_speed\":\"\",\"regional_download_speed\":\"\",\"regional_offices_details\":\"\"},\"enterprise-architecture-form\":{\"csrf_test_name\":\"e708ebc94a1437353f32fbb855cd8371\",\"ea_description\":\"a\"},\"ict-human-capital-form\":{\"csrf_test_name\":\"e708ebc94a1437353f32fbb855cd8371\",\"position_1\":\"\",\"count_1\":\"\",\"position_2\":\"\",\"count_2\":\"\",\"position_3\":\"\",\"count_3\":\"\",\"position_4\":\"\",\"count_4\":\"\"},\"information-systems-form\":{\"csrf_test_name\":\"e708ebc94a1437353f32fbb855cd8371\",\"is_name_1\":\"1\",\"status_1\":\"\",\"classification_1\":\"operations\",\"description_1\":\"\",\"deployment_1\":\"\",\"owner_1\":\"\",\"dev_strategy_1\":\"\",\"platform_1\":\"\",\"database_1\":\"\",\"storage_1\":\"\",\"internal_users_1\":\"\",\"external_users_1\":\"\",\"system_usage_1\":\"frontline\",\"online_link_1\":\"\",\"interop1_main\":\"shared\",\"interop1_internal_system\":\"\",\"interop1_external_system\":\"\",\"interop1_sub\":\"process\",\"pia_1\":\"no\"},\"ict-projects-form\":{\"csrf_test_name\":\"e708ebc94a1437353f32fbb855cd8371\",\"internal_project_title\":\"1\",\"internal_description\":\"\",\"internal_objectives\":\"\",\"internal_strategic_others_text\":\"\",\"internal_start_date\":\"\",\"internal_end_date\":\"\",\"internal_year1_deliverables\":\"\",\"internal_year2_deliverables\":\"\",\"internal_year3_deliverables\":\"\",\"internal_implementing_unit\":\"\",\"internal_total_cost\":\"\",\"internal_funding_source\":\"\",\"cross_project_title\":\"\",\"cross_description\":\"\",\"cross_objectives\":\"\",\"cross_lead_agency\":\"\",\"cross_implementing_agency\":\"\",\"cross_strategic_others_text\":\"\",\"cross_start_date\":\"\",\"cross_end_date\":\"\",\"cross_year1_deliverables\":\"\",\"cross_year2_deliverables\":\"\",\"cross_year3_deliverables\":\"\",\"cross_implementing_unit\":\"\",\"cross_total_cost\":\"\",\"cross_funding_source\":\"\"},\"performance-measurement-form\":{\"csrf_test_name\":\"2cf9d6541d8ca6904c338dba311ce7dd\",\"internal_projects[1][kpi][intermediate][indicator]\":\"\",\"internal_projects[1][kpi][intermediate][baseline]\":\"\",\"internal_projects[1][kpi][intermediate][target]\":\"\",\"internal_projects[1][kpi][intermediate][method]\":\"\",\"internal_projects[1][kpi][intermediate][responsibility]\":\"\",\"internal_projects[1][kpi][immediate][indicator]\":\"\",\"internal_projects[1][kpi][immediate][baseline]\":\"\",\"internal_projects[1][kpi][immediate][target]\":\"\",\"internal_projects[1][kpi][immediate][method]\":\"\",\"internal_projects[1][kpi][immediate][responsibility]\":\"\",\"internal_projects[1][kpi][output][indicator]\":\"\",\"internal_projects[1][kpi][output][baseline]\":\"\",\"internal_projects[1][kpi][output][target]\":\"\",\"internal_projects[1][kpi][output][method]\":\"\",\"internal_projects[1][kpi][output][responsibility]\":\"\",\"cross_projects[1][kpi][intermediate][indicator]\":\"\",\"cross_projects[1][kpi][intermediate][baseline]\":\"\",\"cross_projects[1][kpi][intermediate][target]\":\"\",\"cross_projects[1][kpi][intermediate][method]\":\"\",\"cross_projects[1][kpi][intermediate][responsibility]\":\"\",\"cross_projects[1][kpi][immediate][indicator]\":\"\",\"cross_projects[1][kpi][immediate][baseline]\":\"\",\"cross_projects[1][kpi][immediate][target]\":\"\",\"cross_projects[1][kpi][immediate][method]\":\"\",\"cross_projects[1][kpi][immediate][responsibility]\":\"\",\"cross_projects[1][kpi][output][indicator]\":\"\",\"cross_projects[1][kpi][output][baseline]\":\"\",\"cross_projects[1][kpi][output][target]\":\"\",\"cross_projects[1][kpi][output][method]\":\"\",\"cross_projects[1][kpi][output][responsibility]\":\"\"}}', '2026-06-30 09:20:13'),
(2, '1', '', 1, 2, 'draft', 0.00, NULL, NULL, '2026-06-30 10:15:36', NULL, NULL, NULL, NULL, NULL, NULL, '{\"network-infrastructure-form\":{\"csrf_test_name\":\"e708ebc94a1437353f32fbb855cd8371\",\"dept_connectivity_type\":\"dsl\",\"dept_ipv6_ready\":\"\",\"dept_upload_speed\":\"1232\",\"dept_download_speed\":\"\",\"dept_description\":\"asas\",\"regional_connectivity_type\":\"\",\"regional_ipv6_ready\":\"\",\"regional_upload_speed\":\"\",\"regional_download_speed\":\"\",\"regional_offices_details\":\"\"},\"enterprise-architecture-form\":{\"csrf_test_name\":\"e708ebc94a1437353f32fbb855cd8371\",\"ea_description\":\"a\"},\"ict-human-capital-form\":{\"csrf_test_name\":\"e708ebc94a1437353f32fbb855cd8371\",\"position_1\":\"\",\"count_1\":\"\",\"position_2\":\"\",\"count_2\":\"\",\"position_3\":\"\",\"count_3\":\"\",\"position_4\":\"\",\"count_4\":\"\"},\"information-systems-form\":{\"csrf_test_name\":\"e708ebc94a1437353f32fbb855cd8371\",\"is_name_1\":\"\",\"status_1\":\"\",\"classification_1\":\"\",\"description_1\":\"\",\"deployment_1\":\"\",\"owner_1\":\"\",\"dev_strategy_1\":\"\",\"platform_1\":\"\",\"database_1\":\"\",\"storage_1\":\"\",\"internal_users_1\":\"\",\"external_users_1\":\"\",\"online_link_1\":\"\",\"interop1_internal_system\":\"\",\"interop1_external_system\":\"\"},\"ict-projects-form\":{\"csrf_test_name\":\"e708ebc94a1437353f32fbb855cd8371\",\"internal_project_title\":\"1\",\"internal_description\":\"\",\"internal_objectives\":\"\",\"internal_strategic_others_text\":\"\",\"internal_start_date\":\"\",\"internal_end_date\":\"\",\"internal_year1_deliverables\":\"\",\"internal_year2_deliverables\":\"\",\"internal_year3_deliverables\":\"\",\"internal_implementing_unit\":\"\",\"internal_total_cost\":\"\",\"internal_funding_source\":\"\",\"cross_project_title\":\"\",\"cross_description\":\"\",\"cross_objectives\":\"\",\"cross_lead_agency\":\"\",\"cross_implementing_agency\":\"\",\"cross_strategic_others_text\":\"\",\"cross_start_date\":\"\",\"cross_end_date\":\"\",\"cross_year1_deliverables\":\"\",\"cross_year2_deliverables\":\"\",\"cross_year3_deliverables\":\"\",\"cross_implementing_unit\":\"\",\"cross_total_cost\":\"\",\"cross_funding_source\":\"\"},\"performance-measurement-form\":{\"csrf_test_name\":\"2cf9d6541d8ca6904c338dba311ce7dd\",\"internal_projects[1][kpi][intermediate][indicator]\":\"s\",\"internal_projects[1][kpi][intermediate][baseline]\":\"\",\"internal_projects[1][kpi][intermediate][target]\":\"\",\"internal_projects[1][kpi][intermediate][method]\":\"\",\"internal_projects[1][kpi][intermediate][responsibility]\":\"\",\"internal_projects[1][kpi][immediate][indicator]\":\"\",\"internal_projects[1][kpi][immediate][baseline]\":\"\",\"internal_projects[1][kpi][immediate][target]\":\"\",\"internal_projects[1][kpi][immediate][method]\":\"\",\"internal_projects[1][kpi][immediate][responsibility]\":\"\",\"internal_projects[1][kpi][output][indicator]\":\"\",\"internal_projects[1][kpi][output][baseline]\":\"\",\"internal_projects[1][kpi][output][target]\":\"\",\"internal_projects[1][kpi][output][method]\":\"\",\"internal_projects[1][kpi][output][responsibility]\":\"\",\"cross_projects[1][kpi][intermediate][indicator]\":\"\",\"cross_projects[1][kpi][intermediate][baseline]\":\"\",\"cross_projects[1][kpi][intermediate][target]\":\"\",\"cross_projects[1][kpi][intermediate][method]\":\"\",\"cross_projects[1][kpi][intermediate][responsibility]\":\"\",\"cross_projects[1][kpi][immediate][indicator]\":\"\",\"cross_projects[1][kpi][immediate][baseline]\":\"\",\"cross_projects[1][kpi][immediate][target]\":\"\",\"cross_projects[1][kpi][immediate][method]\":\"\",\"cross_projects[1][kpi][immediate][responsibility]\":\"\",\"cross_projects[1][kpi][output][indicator]\":\"\",\"cross_projects[1][kpi][output][baseline]\":\"\",\"cross_projects[1][kpi][output][target]\":\"\",\"cross_projects[1][kpi][output][method]\":\"\",\"cross_projects[1][kpi][output][responsibility]\":\"\"}}', '2026-06-30 10:16:28'),
(3, '2', '', 1, 2, 'draft', 0.00, NULL, NULL, '2026-06-30 10:22:37', NULL, NULL, NULL, NULL, NULL, NULL, '{\"network-infrastructure-form\":{\"csrf_test_name\":\"e708ebc94a1437353f32fbb855cd8371\",\"dept_connectivity_type\":\"dsl\",\"dept_ipv6_ready\":\"\",\"dept_upload_speed\":\"1232\",\"dept_download_speed\":\"\",\"dept_description\":\"asas\",\"regional_connectivity_type\":\"\",\"regional_ipv6_ready\":\"\",\"regional_upload_speed\":\"\",\"regional_download_speed\":\"\",\"regional_offices_details\":\"\"},\"enterprise-architecture-form\":{\"csrf_test_name\":\"e708ebc94a1437353f32fbb855cd8371\",\"ea_description\":\"a\"},\"ict-human-capital-form\":{\"csrf_test_name\":\"e708ebc94a1437353f32fbb855cd8371\",\"position_1\":\"\",\"count_1\":\"\",\"position_2\":\"\",\"count_2\":\"\",\"position_3\":\"\",\"count_3\":\"\",\"position_4\":\"\",\"count_4\":\"\"},\"information-systems-form\":{\"csrf_test_name\":\"e708ebc94a1437353f32fbb855cd8371\",\"is_name_1\":\"\",\"status_1\":\"\",\"classification_1\":\"\",\"description_1\":\"\",\"deployment_1\":\"\",\"owner_1\":\"\",\"dev_strategy_1\":\"\",\"platform_1\":\"\",\"database_1\":\"\",\"storage_1\":\"\",\"internal_users_1\":\"\",\"external_users_1\":\"\",\"online_link_1\":\"\",\"interop1_internal_system\":\"\",\"interop1_external_system\":\"\"},\"ict-projects-form\":{\"csrf_test_name\":\"e708ebc94a1437353f32fbb855cd8371\",\"internal_project_title\":\"2\",\"internal_description\":\"\",\"internal_objectives\":\"\",\"internal_strategic_others_text\":\"\",\"internal_start_date\":\"\",\"internal_end_date\":\"\",\"internal_year1_deliverables\":\"\",\"internal_year2_deliverables\":\"\",\"internal_year3_deliverables\":\"\",\"internal_implementing_unit\":\"\",\"internal_total_cost\":\"\",\"internal_funding_source\":\"\",\"cross_project_title\":\"\",\"cross_description\":\"\",\"cross_objectives\":\"\",\"cross_lead_agency\":\"\",\"cross_implementing_agency\":\"\",\"cross_strategic_others_text\":\"\",\"cross_start_date\":\"\",\"cross_end_date\":\"\",\"cross_year1_deliverables\":\"\",\"cross_year2_deliverables\":\"\",\"cross_year3_deliverables\":\"\",\"cross_implementing_unit\":\"\",\"cross_total_cost\":\"\",\"cross_funding_source\":\"\"},\"performance-measurement-form\":{\"csrf_test_name\":\"2cf9d6541d8ca6904c338dba311ce7dd\",\"internal_projects[1][kpi][intermediate][indicator]\":\"s\",\"internal_projects[1][kpi][intermediate][baseline]\":\"\",\"internal_projects[1][kpi][intermediate][target]\":\"\",\"internal_projects[1][kpi][intermediate][method]\":\"\",\"internal_projects[1][kpi][intermediate][responsibility]\":\"\",\"internal_projects[1][kpi][immediate][indicator]\":\"\",\"internal_projects[1][kpi][immediate][baseline]\":\"\",\"internal_projects[1][kpi][immediate][target]\":\"\",\"internal_projects[1][kpi][immediate][method]\":\"\",\"internal_projects[1][kpi][immediate][responsibility]\":\"\",\"internal_projects[1][kpi][output][indicator]\":\"\",\"internal_projects[1][kpi][output][baseline]\":\"\",\"internal_projects[1][kpi][output][target]\":\"\",\"internal_projects[1][kpi][output][method]\":\"\",\"internal_projects[1][kpi][output][responsibility]\":\"\",\"cross_projects[1][kpi][intermediate][indicator]\":\"\",\"cross_projects[1][kpi][intermediate][baseline]\":\"\",\"cross_projects[1][kpi][intermediate][target]\":\"\",\"cross_projects[1][kpi][intermediate][method]\":\"\",\"cross_projects[1][kpi][intermediate][responsibility]\":\"\",\"cross_projects[1][kpi][immediate][indicator]\":\"\",\"cross_projects[1][kpi][immediate][baseline]\":\"\",\"cross_projects[1][kpi][immediate][target]\":\"\",\"cross_projects[1][kpi][immediate][method]\":\"\",\"cross_projects[1][kpi][immediate][responsibility]\":\"\",\"cross_projects[1][kpi][output][indicator]\":\"\",\"cross_projects[1][kpi][output][baseline]\":\"\",\"cross_projects[1][kpi][output][target]\":\"\",\"cross_projects[1][kpi][output][method]\":\"\",\"cross_projects[1][kpi][output][responsibility]\":\"\"}}', '2026-06-30 10:22:48'),
(4, '3', '', 1, 2, 'draft', 0.00, NULL, NULL, '2026-06-30 10:25:52', NULL, NULL, NULL, NULL, NULL, NULL, '{\"network-infrastructure-form\":{\"csrf_test_name\":\"e708ebc94a1437353f32fbb855cd8371\",\"dept_connectivity_type\":\"dsl\",\"dept_ipv6_ready\":\"\",\"dept_upload_speed\":\"1232\",\"dept_download_speed\":\"\",\"dept_description\":\"asas\",\"regional_connectivity_type\":\"\",\"regional_ipv6_ready\":\"\",\"regional_upload_speed\":\"\",\"regional_download_speed\":\"\",\"regional_offices_details\":\"\"},\"enterprise-architecture-form\":{\"csrf_test_name\":\"e708ebc94a1437353f32fbb855cd8371\",\"ea_description\":\"a\"},\"ict-human-capital-form\":{\"csrf_test_name\":\"e708ebc94a1437353f32fbb855cd8371\",\"position_1\":\"\",\"count_1\":\"\",\"position_2\":\"\",\"count_2\":\"\",\"position_3\":\"\",\"count_3\":\"\",\"position_4\":\"\",\"count_4\":\"\"},\"information-systems-form\":{\"csrf_test_name\":\"e708ebc94a1437353f32fbb855cd8371\",\"is_name_1\":\"\",\"status_1\":\"\",\"classification_1\":\"\",\"description_1\":\"\",\"deployment_1\":\"\",\"owner_1\":\"\",\"dev_strategy_1\":\"\",\"platform_1\":\"\",\"database_1\":\"\",\"storage_1\":\"\",\"internal_users_1\":\"\",\"external_users_1\":\"\",\"online_link_1\":\"\",\"interop1_internal_system\":\"\",\"interop1_external_system\":\"\"},\"ict-projects-form\":{\"csrf_test_name\":\"e708ebc94a1437353f32fbb855cd8371\",\"internal_project_title\":\"3\",\"internal_description\":\"\",\"internal_objectives\":\"\",\"internal_strategic_others_text\":\"\",\"internal_start_date\":\"\",\"internal_end_date\":\"\",\"internal_year1_deliverables\":\"\",\"internal_year2_deliverables\":\"\",\"internal_year3_deliverables\":\"\",\"internal_implementing_unit\":\"\",\"internal_total_cost\":\"\",\"internal_funding_source\":\"\",\"cross_project_title\":\"\",\"cross_description\":\"\",\"cross_objectives\":\"\",\"cross_lead_agency\":\"\",\"cross_implementing_agency\":\"\",\"cross_strategic_others_text\":\"\",\"cross_start_date\":\"\",\"cross_end_date\":\"\",\"cross_year1_deliverables\":\"\",\"cross_year2_deliverables\":\"\",\"cross_year3_deliverables\":\"\",\"cross_implementing_unit\":\"\",\"cross_total_cost\":\"\",\"cross_funding_source\":\"\"},\"performance-measurement-form\":{\"csrf_test_name\":\"2cf9d6541d8ca6904c338dba311ce7dd\",\"internal_projects[1][kpi][intermediate][indicator]\":\"s\",\"internal_projects[1][kpi][intermediate][baseline]\":\"\",\"internal_projects[1][kpi][intermediate][target]\":\"\",\"internal_projects[1][kpi][intermediate][method]\":\"\",\"internal_projects[1][kpi][intermediate][responsibility]\":\"\",\"internal_projects[1][kpi][immediate][indicator]\":\"\",\"internal_projects[1][kpi][immediate][baseline]\":\"\",\"internal_projects[1][kpi][immediate][target]\":\"\",\"internal_projects[1][kpi][immediate][method]\":\"\",\"internal_projects[1][kpi][immediate][responsibility]\":\"\",\"internal_projects[1][kpi][output][indicator]\":\"\",\"internal_projects[1][kpi][output][baseline]\":\"\",\"internal_projects[1][kpi][output][target]\":\"\",\"internal_projects[1][kpi][output][method]\":\"\",\"internal_projects[1][kpi][output][responsibility]\":\"\",\"cross_projects[1][kpi][intermediate][indicator]\":\"\",\"cross_projects[1][kpi][intermediate][baseline]\":\"\",\"cross_projects[1][kpi][intermediate][target]\":\"\",\"cross_projects[1][kpi][intermediate][method]\":\"\",\"cross_projects[1][kpi][intermediate][responsibility]\":\"\",\"cross_projects[1][kpi][immediate][indicator]\":\"\",\"cross_projects[1][kpi][immediate][baseline]\":\"\",\"cross_projects[1][kpi][immediate][target]\":\"\",\"cross_projects[1][kpi][immediate][method]\":\"\",\"cross_projects[1][kpi][immediate][responsibility]\":\"\",\"cross_projects[1][kpi][output][indicator]\":\"\",\"cross_projects[1][kpi][output][baseline]\":\"\",\"cross_projects[1][kpi][output][target]\":\"\",\"cross_projects[1][kpi][output][method]\":\"\",\"cross_projects[1][kpi][output][responsibility]\":\"\"}}', '2026-06-30 10:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `description` text,
  `page_url` text,
  `user_agent` text,
  `ip_address` varchar(45) DEFAULT NULL,
  `new_data` longtext,
  `metadata` text,
  `contact_number` varchar(64) DEFAULT NULL,
  `position` varchar(128) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `action`, `description`, `page_url`, `user_agent`, `ip_address`, `new_data`, `metadata`, `contact_number`, `position`, `created_at`, `updated_at`) VALUES
(1, 1, 'login', 'User signed in using password.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 17:35:24', NULL),
(2, 1, 'logout', 'User signed out.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 17:36:45', NULL),
(3, 1, 'login', 'User signed in using password.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 17:37:13', NULL),
(4, 1, 'logout', 'User signed out.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 17:37:54', NULL),
(5, 1, 'login', 'User signed in using password.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 17:40:16', NULL),
(6, 1, 'logout', 'User signed out.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 17:40:27', NULL),
(7, 1, 'login', 'User signed in using password.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 17:41:37', NULL),
(8, 1, 'login', 'User signed in using password.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 17:48:49', NULL),
(9, 1, 'logout', 'User signed out.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 18:07:42', NULL),
(10, 1, 'login', 'User signed in using password.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 18:07:52', NULL),
(11, 1, 'login', 'User signed in using password.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 18:11:20', NULL),
(12, 1, 'logout', 'User signed out.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 18:16:19', NULL),
(13, 1, 'login', 'User signed in using password.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 18:16:20', NULL),
(14, 1, 'logout', 'User signed out.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 18:16:32', NULL),
(15, 1, 'login', 'User signed in using password.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 18:16:33', NULL),
(16, 1, 'logout', 'User signed out.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 18:24:42', NULL),
(17, 1, 'login', 'User signed in using password.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 18:25:03', NULL),
(18, 1, 'login', 'User signed in using password.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 18:27:59', NULL),
(19, 1, 'login', 'User signed in using password.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 18:35:13', NULL),
(20, 1, 'user.created', 'Created user #2 (venicedon17@gmail.com).', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 18:39:25', NULL),
(21, 1, 'login', 'User signed in using password.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 18:42:13', NULL),
(22, 1, 'logout', 'User signed out.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 19:11:57', NULL),
(23, 1, 'login', 'User signed in using password.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 19:12:00', NULL),
(24, 1, 'logout', 'User signed out.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 19:13:21', NULL),
(25, 1, 'login', 'User signed in using password.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 19:13:22', NULL),
(26, 1, 'logout', 'User signed out.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 19:13:52', NULL),
(27, 1, 'login', 'User signed in using password.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-14 19:13:53', NULL),
(28, 1, 'login', 'User signed in using password.', 'http://localhost:8080/index.php/login', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', '{\"email\":\"admin@issp.test\",\"password\":\"Admin@12345\"}', NULL, NULL, NULL, '2026-06-30 09:17:47', NULL),
(29, 1, 'logout', 'User signed out.', 'http://localhost:8080/index.php/logout', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', NULL, NULL, NULL, NULL, '2026-06-30 09:18:00', NULL),
(30, 2, 'login', 'User signed in using google.', 'http://localhost:8080/index.php/auth/google/callback?state=64727946555d55297c2d6a3cdc15bb636faac328f6d288576446f77bac1ecbf7&iss=https%3A%2F%2Faccounts.google.com&code=4%2F0AdkVLPx853MZSeRYK4VrjNS-kzJPi4950BJXMAIrJmklu0DR7TEgyDvoP7ibT4W4RbVc6A&scope=email+profile+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email+openid+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile&authuser=1&prompt=none', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', NULL, NULL, NULL, NULL, '2026-06-30 09:18:04', NULL),
(31, 2, 'login', 'User signed in using google.', 'http://localhost:8080/index.php/auth/google/callback?state=68cec91ac6907de56233fa8638e91f3fb60a10d283819b5df78d59f7636a902f&iss=https%3A%2F%2Faccounts.google.com&code=4%2F0AdkVLPz2OVF2QWutrF2iEMs3sdsd3sDMZn737bW9GdDzTGZkl8JKwEeazx79c0dAA9JOew&scope=email+profile+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile+openid&authuser=1&prompt=none', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', NULL, NULL, NULL, NULL, '2026-06-30 09:19:20', NULL),
(32, 2, 'logout', 'User signed out.', 'http://localhost:8080/index.php/logout', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', NULL, NULL, NULL, NULL, '2026-06-30 09:19:50', NULL),
(33, 2, 'login', 'User signed in using google.', 'http://localhost:8080/index.php/auth/google/callback?state=1d0a29269ca82177d187e6ed51c1d305127e1ef74dca4bb9c9e74cb6c426b9bb&iss=https%3A%2F%2Faccounts.google.com&code=4%2F0AdkVLPxNzTWp8aKOTMlkDZzHJIQMf3NqIbpAe6_RJwsUMzT4rq_-T8p131-eTjrepATh7g&scope=email+profile+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email+openid+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile&authuser=1&prompt=none', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', NULL, NULL, NULL, NULL, '2026-06-30 09:19:55', NULL),
(34, 2, 'issp.draft_updated', 'Updated ISSP draft #1', 'http://localhost:8080/index.php/employee/save-draft', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', '{\"network-infrastructure-form\":\"3 field(s)\",\"enterprise-architecture-form\":\"1 field(s)\",\"information-systems-form\":\"6 field(s)\",\"ict-projects-form\":\"1 field(s)\",\"title\":\"1\"}', NULL, NULL, NULL, '2026-06-30 09:20:06', NULL),
(35, 2, 'issp.draft_updated', 'Updated ISSP draft #1', 'http://localhost:8080/index.php/employee/save-draft', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', '{\"network-infrastructure-form\":\"3 field(s)\",\"enterprise-architecture-form\":\"1 field(s)\",\"information-systems-form\":\"6 field(s)\",\"ict-projects-form\":\"1 field(s)\",\"title\":\"1\"}', NULL, NULL, NULL, '2026-06-30 09:20:13', NULL),
(36, 1, 'login', 'User signed in using password.', 'http://localhost:8080/index.php/login', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', '{\"email\":\"admin@issp.test\",\"password\":\"Admin@12345\"}', NULL, NULL, NULL, '2026-06-30 09:21:29', NULL),
(37, 1, 'logout', 'User signed out.', 'http://localhost:8080/index.php/logout', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', NULL, NULL, NULL, NULL, '2026-06-30 09:21:40', NULL),
(38, 2, 'login', 'User signed in using google.', 'http://localhost:8080/index.php/auth/google/callback?state=ad1d2471cfacf1da37598ee8b0eadbc6d0b7d1f167178df9268cfd84ff341717&iss=https%3A%2F%2Faccounts.google.com&code=4%2F0AdkVLPyQUR02WEqPCDjK4tAE8u5r2-vA4puXx6yqqbZBpmqkwmPihhIbyHbC4NK9Ou-ONw&scope=email+profile+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile+openid+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email&authuser=1&prompt=none', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', NULL, NULL, NULL, NULL, '2026-06-30 09:21:45', NULL),
(39, 2, 'logout', 'User signed out.', 'http://localhost:8080/index.php/logout', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', NULL, NULL, NULL, NULL, '2026-06-30 10:04:48', NULL),
(40, 1, 'login', 'User signed in using password.', 'http://localhost:8080/index.php/login', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', '{\"email\":\"admin@issp.test\",\"password\":\"Admin@12345\"}', NULL, NULL, NULL, '2026-06-30 10:04:49', NULL),
(41, 1, 'user.updated', 'Updated user #2 (venicedon17@gmail.com).', 'http://localhost:8080/index.php/admin/users/2', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', '{\"first_name\":\"Venice\",\"last_name\":\"Don\",\"middle_initial\":\"A\",\"email\":\"venicedon17@gmail.com\",\"status\":\"active\",\"role_id\":\"7\",\"position_id\":\"\",\"department_id\":\"1\",\"password\":\"\",\"password_confirmation\":\"\"}', NULL, NULL, NULL, '2026-06-30 10:05:06', NULL),
(42, 1, 'user.updated', 'Updated user #2 (venicedon17@gmail.com).', 'http://localhost:8080/index.php/admin/users/2', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', '{\"first_name\":\"Venice\",\"last_name\":\"Don\",\"middle_initial\":\"A\",\"email\":\"venicedon17@gmail.com\",\"status\":\"active\",\"role_id\":\"7\",\"position_id\":\"20\",\"department_id\":\"1\",\"password\":\"\",\"password_confirmation\":\"\"}', NULL, NULL, NULL, '2026-06-30 10:05:10', NULL),
(43, 1, 'user.updated', 'Updated user #2 (venicedon17@gmail.com).', 'http://localhost:8080/index.php/admin/users/2', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', '{\"first_name\":\"Venice\",\"last_name\":\"Don\",\"middle_initial\":\"A\",\"email\":\"venicedon17@gmail.com\",\"status\":\"active\",\"role_id\":\"1\",\"position_id\":\"20\",\"department_id\":\"1\",\"password\":\"\",\"password_confirmation\":\"\"}', NULL, NULL, NULL, '2026-06-30 10:05:16', NULL),
(44, 1, 'logout', 'User signed out.', 'http://localhost:8080/index.php/logout', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', NULL, NULL, NULL, NULL, '2026-06-30 10:05:22', NULL),
(45, 2, 'login', 'User signed in using google.', 'http://localhost:8080/index.php/auth/google/callback?state=13de052edc2da7df60650e7ecc9338d2f28ae95cac69045a3020bf3983bca76a&iss=https%3A%2F%2Faccounts.google.com&code=4%2F0AdkVLPyxf_moLk26BgB2CijdOq7KzRZOtxU15hfMpuXiaLwbATb5hNSO5s3o7C-8hKyRsw&scope=email+profile+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile+openid&authuser=1&prompt=none', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', NULL, NULL, NULL, NULL, '2026-06-30 10:05:26', NULL),
(46, 2, 'issp.draft_updated', 'Updated ISSP draft #2', 'http://localhost:8080/index.php/employee/save-draft', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', '{\"network-infrastructure-form\":\"3 field(s)\",\"enterprise-architecture-form\":\"1 field(s)\",\"ict-projects-form\":\"1 field(s)\",\"title\":\"1\"}', NULL, NULL, NULL, '2026-06-30 10:15:36', NULL),
(47, 2, 'logout', 'User signed out.', 'http://localhost:8080/index.php/logout', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', NULL, NULL, NULL, NULL, '2026-06-30 10:15:40', NULL),
(48, 1, 'login', 'User signed in using password.', 'http://localhost:8080/index.php/login', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', '{\"email\":\"admin@issp.test\",\"password\":\"Admin@12345\"}', NULL, NULL, NULL, '2026-06-30 10:15:45', NULL),
(49, 1, 'logout', 'User signed out.', 'http://localhost:8080/index.php/logout', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', NULL, NULL, NULL, NULL, '2026-06-30 10:15:55', NULL),
(50, 2, 'login', 'User signed in using google.', 'http://localhost:8080/index.php/auth/google/callback?state=a4333170444c0426b650812fd8da6994bfab2db00c2737aec50d5073d34b32a5&iss=https%3A%2F%2Faccounts.google.com&code=4%2F0AdkVLPx-8cifwjLZZ90CQQMixLqVWMgGgORKtVsMVg5R6g3U_w3d3LkS8rXhT0G2ELisTQ&scope=email+profile+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile+openid+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email&authuser=1&prompt=none', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', NULL, NULL, NULL, NULL, '2026-06-30 10:15:58', NULL),
(51, 2, 'login', 'User signed in using google.', 'http://localhost:8080/index.php/auth/google/callback?state=1cb49564771141b86cf841263f040a8b5a047f888d2f2d805445a4475821df48&iss=https%3A%2F%2Faccounts.google.com&code=4%2F0AdkVLPz8rkZxVN8c-r3aEVKrdzHGPMqOjWt-nKJLob1kUFSdkcE1DQhRbaSz4JHPAe5E_Q&scope=email+profile+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile+openid+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email&authuser=1&prompt=none', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', NULL, NULL, NULL, NULL, '2026-06-30 10:16:14', NULL),
(52, 2, 'issp.draft_updated', 'Updated ISSP draft #2', 'http://localhost:8080/index.php/employee/save-draft', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', '{\"network-infrastructure-form\":\"3 field(s)\",\"enterprise-architecture-form\":\"1 field(s)\",\"ict-projects-form\":\"1 field(s)\",\"performance-measurement-form\":\"1 field(s)\",\"title\":\"1\"}', NULL, NULL, NULL, '2026-06-30 10:16:28', NULL),
(53, 2, 'issp.draft_updated', 'Updated ISSP draft #3', 'http://localhost:8080/index.php/employee/save-draft', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', '{\"network-infrastructure-form\":\"3 field(s)\",\"enterprise-architecture-form\":\"1 field(s)\",\"ict-projects-form\":\"1 field(s)\",\"performance-measurement-form\":\"1 field(s)\",\"title\":\"1\"}', NULL, NULL, NULL, '2026-06-30 10:22:37', NULL),
(54, 2, 'issp.draft_updated', 'Updated ISSP draft #3', 'http://localhost:8080/index.php/employee/save-draft', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', '{\"network-infrastructure-form\":\"3 field(s)\",\"enterprise-architecture-form\":\"1 field(s)\",\"ict-projects-form\":\"1 field(s)\",\"performance-measurement-form\":\"1 field(s)\",\"title\":\"2\"}', NULL, NULL, NULL, '2026-06-30 10:22:48', NULL),
(55, 2, 'issp.draft_updated', 'Updated ISSP draft #4', 'http://localhost:8080/index.php/employee/save-draft', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', '{\"network-infrastructure-form\":\"3 field(s)\",\"enterprise-architecture-form\":\"1 field(s)\",\"ict-projects-form\":\"1 field(s)\",\"performance-measurement-form\":\"1 field(s)\",\"title\":\"2\"}', NULL, NULL, NULL, '2026-06-30 10:25:52', NULL),
(56, 2, 'issp.draft_updated', 'Updated ISSP draft #4', 'http://localhost:8080/index.php/employee/save-draft', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', '{\"network-infrastructure-form\":\"3 field(s)\",\"enterprise-architecture-form\":\"1 field(s)\",\"ict-projects-form\":\"1 field(s)\",\"performance-measurement-form\":\"1 field(s)\",\"title\":\"3\"}', NULL, NULL, NULL, '2026-06-30 10:26:04', NULL),
(57, 2, 'issp.draft_updated', 'Updated ISSP draft #4', 'http://localhost:8080/index.php/employee/save-draft', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '192.168.65.1', '{\"network-infrastructure-form\":\"3 field(s)\",\"enterprise-architecture-form\":\"1 field(s)\",\"ict-projects-form\":\"1 field(s)\",\"performance-measurement-form\":\"1 field(s)\",\"title\":\"3\"}', NULL, NULL, NULL, '2026-06-30 10:26:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
  `name` varchar(150) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Job Order', NULL, NULL),
(2, 'Chief Administrative Officer', NULL, NULL),
(3, 'Supervising Administrative Officer', NULL, NULL),
(4, 'Information Officer V', NULL, NULL),
(5, 'Information Officer IV', NULL, NULL),
(6, 'Information Officer III', NULL, NULL),
(7, 'Information Officer II', NULL, NULL),
(8, 'Information Officer I', NULL, NULL),
(9, 'Information Technology Officer I', NULL, NULL),
(10, 'Information Systems Analyst II', NULL, NULL),
(11, 'Computer Programmer III', NULL, NULL),
(12, 'Computer Programmer II', NULL, NULL),
(13, 'Administrative Officer V', NULL, NULL),
(14, 'Administrative Officer IV', NULL, NULL),
(15, 'Administrative Officer II', NULL, NULL),
(16, 'Administrative Assistant VI', NULL, NULL),
(17, 'Administrative Assistant V', NULL, NULL),
(18, 'Administrative Assistant IV', NULL, NULL),
(19, 'Administrative Assistant III', NULL, NULL),
(20, 'Administrative Assistant II', NULL, NULL),
(21, 'Computer Maintenance Technologist I', NULL, NULL),
(22, 'Computer Maintenance Technologist II', NULL, NULL),
(23, 'Computer Maintenance Technologist III', NULL, NULL),
(24, 'Director General', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resource_requirements`
--

CREATE TABLE `resource_requirements` (
  `id` int NOT NULL,
  `year` int NOT NULL,
  `strategic_category` varchar(255) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `office_location` varchar(255) DEFAULT NULL,
  `fund_source` varchar(255) DEFAULT NULL,
  `unit_cost` decimal(15,2) DEFAULT NULL,
  `physical_target` int DEFAULT NULL,
  `total_cost` decimal(15,2) DEFAULT NULL,
  `expenditure_type` varchar(255) DEFAULT NULL,
  `object_of_expenditure` varchar(255) DEFAULT NULL,
  `uacs_code` varchar(255) DEFAULT NULL,
  `remarks` text,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(80) NOT NULL,
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
  `email` varchar(190) NOT NULL,
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
(1, 'System', 'Administrator', NULL, 'admin@issp.test', '$2y$10$TL.JLtA/I.DkUbzn2KI44OQCHMMeJ.CTZ4T.T/Lv7txLL4byf2TZe', 5, 27, 'active', '2026-06-14 17:33:40', NULL, NULL, NULL, 1, '2026-06-30 10:15:45', '2026-06-30 10:15:45', 'System Administrator'),
(2, 'Venice', 'Don', 'A', 'venicedon17@gmail.com', '$2y$10$wmfS0ZD9iytJFZr..3/VNuQj2R4j8UADknBOXbK032FUacSt5wmuK', 1, 1, 'active', '2026-06-14 18:39:25', 20, NULL, NULL, 0, '2026-06-30 10:16:14', '2026-06-30 10:16:14', 'Venice A Don');

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
-- Indexes for table `issp_records`
--
ALTER TABLE `issp_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_issp_departments` (`department_id`),
  ADD KEY `fk_issp_users` (`created_by`);

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
-- Indexes for table `resource_requirements`
--
ALTER TABLE `resource_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

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
-- AUTO_INCREMENT for table `issp_records`
--
ALTER TABLE `issp_records`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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
-- AUTO_INCREMENT for table `resource_requirements`
--
ALTER TABLE `resource_requirements`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `issp_records`
--
ALTER TABLE `issp_records`
  ADD CONSTRAINT `fk_issp_departments` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `fk_issp_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

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
