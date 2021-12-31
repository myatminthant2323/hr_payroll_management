-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2021 at 05:06 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `backup_hr_payroll_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `working_date` date NOT NULL,
  `in_time` time NOT NULL,
  `out_time` time NOT NULL,
  `overtime_hour` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 'Web Development', '2020-10-10 09:22:42', '2020-10-12 00:15:22'),
(2, 'Application Development', '2020-10-10 09:22:42', '2020-10-12 00:15:29'),
(3, 'IT Management', '2020-10-10 09:22:45', '2020-10-12 00:15:39'),
(4, 'Accounts Management', '2020-10-10 09:22:48', '2020-10-12 00:15:47'),
(5, 'Support Management', '2020-10-10 09:22:49', '2020-10-12 00:16:02'),
(6, 'Marketing', '2020-10-10 09:22:51', '2020-10-12 00:16:10'),
(7, 'System Management', '2020-10-10 09:22:53', '2020-10-12 00:16:22'),
(8, 'HR', '2020-10-10 09:22:56', '2020-10-12 00:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation_name`, `created_at`, `updated_at`) VALUES
(1, 'UX Designer', '2020-10-10 09:22:42', '2020-10-12 00:18:36'),
(2, 'UI Designer', '2020-10-10 09:22:43', '2020-10-12 00:18:25'),
(3, 'Android Developer', '2020-10-10 09:22:46', '2020-10-12 00:18:46'),
(4, 'IOS Developer', '2020-10-10 09:22:48', '2020-10-12 00:18:54'),
(5, 'Web Designer', '2020-10-10 09:22:49', '2020-10-12 00:19:18'),
(6, 'Web Developer', '2020-10-10 09:22:51', '2020-10-12 00:19:29'),
(7, 'IT Technician', '2020-10-10 09:22:53', '2020-10-12 00:19:44'),
(8, 'Product Manager', '2020-10-10 09:22:56', '2020-10-12 00:19:52'),
(9, 'Project Manager', '2020-10-10 09:22:58', '2020-10-12 00:20:03'),
(10, 'Front End Designer', '2020-10-10 09:23:00', '2020-10-12 00:20:15'),
(13, 'HR Staff', '2020-10-12 00:21:36', '2020-10-12 00:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phno1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phno2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `martial_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `join_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `photo`, `fname`, `lname`, `username`, `email`, `address`, `phno1`, `phno2`, `date_of_birth`, `gender`, `martial_status`, `department_id`, `designation_id`, `join_date`, `created_at`, `updated_at`) VALUES
(11, 17, 'backendtemplate/employeeimg/1602485717.jpeg', 'Donald', 'Alaniz', 'Donald', 'kgkgkkgg1234@gmail.com', '4454  Tori Lane', '8015906904', NULL, '1998-08-12', 'male', 'single', 8, 7, '2016-07-05', '2020-10-10 09:25:40', '2021-12-30 13:20:41'),
(12, 18, 'backendtemplate/employeeimg/1602485740.jpeg', 'Priscilla', 'Montes', 'Priscilla Montes', 'priscilla@gmail.com', '3626  Villa Drive', '5743706447', NULL, '1999-11-17', 'female', 'single', 2, 4, '2020-10-20', '2020-10-10 10:24:26', '2020-10-12 00:25:40'),
(13, 19, 'backendtemplate/employeeimg/1602485682.jpeg', 'Steven', 'Wierd', 'Steven Wierd', 'stevenweird@gmail.com', 'Insein, Yangon', '09796432037', '09694527348', '1997-07-10', 'Male', 'Single', 1, 6, '2019-07-10', '2020-10-12 00:24:42', '2020-10-12 00:24:42'),
(14, 20, 'backendtemplate/employeeimg/1602485882.jpeg', 'Julius', 'Lisa', 'Julius Lisa', 'myatminthant.mmt23@gmail.com', 'Hlaing, Yangon', '09796740309', '09796423581', '1997-03-07', 'male', 'single', 1, 5, '2020-06-23', '2020-10-12 00:28:02', '2020-10-12 02:33:58'),
(15, 21, 'backendtemplate/employeeimg/1602497728.jpeg', 'Steven', 'Howard', 'Steven', 'steven@gmail.com', 'Pathein', '097967584961', NULL, '1999-07-08', 'Male', 'Single', 1, 5, '2020-08-05', '2020-10-12 03:45:29', '2020-10-12 03:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `leave_date` date NOT NULL,
  `total_leave_day` int(11) NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `employee_id`, `leave_date`, `total_leave_day`, `reason`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 11, '2019-04-29', 3, 'Sick', 1, 18, '2020-10-10 09:35:52', '2020-10-10 11:08:58'),
(8, 11, '2020-09-17', 2, 'Sick', 2, 18, '2020-10-10 10:29:07', '2020-10-10 11:09:40'),
(9, 11, '2020-09-05', 5, 'Sick', 1, 1, '2020-10-10 10:56:02', '2020-10-10 21:33:09'),
(10, 12, '2005-09-26', 5, 'dssd', 2, 1, '2020-10-10 11:21:28', '2020-10-10 12:00:44'),
(11, 12, '2020-11-11', 5, 'Sick', 1, 1, '2020-10-10 21:08:40', '2020-10-10 21:37:04'),
(12, 11, '2019-04-01', 1, 'Sick', 2, NULL, '2020-10-10 21:35:29', '2020-10-10 21:35:29'),
(13, 11, '2020-10-11', 5, 'ds', 2, NULL, '2020-10-11 01:20:08', '2020-10-11 01:20:08'),
(15, 14, '2019-04-29', 2, 'Sick', 2, NULL, '2020-10-12 00:46:10', '2020-10-12 00:47:15'),
(16, 14, '2020-12-03', 2, 'Hello', 1, 18, '2020-10-12 00:47:32', '2020-10-12 00:50:58'),
(17, 11, '2020-10-07', 2, 'Sick', 2, NULL, '2020-10-12 03:41:22', '2020-10-12 03:41:22'),
(18, 15, '2020-10-14', 5, 'Sick', 1, 1, '2020-10-12 03:46:16', '2020-10-12 03:47:04'),
(19, 13, '2022-12-04', 2, 'Corona', 1, 1, '2021-12-30 13:36:02', '2021-12-30 13:37:02');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_08_22_071152_create_departments_table', 1),
(5, '2020_08_22_071220_create_designations_table', 1),
(6, '2020_08_22_071446_create_employees_table', 1),
(7, '2020_08_22_071500_create_attendances_table', 1),
(8, '2020_08_24_030612_create_permission_tables', 1),
(9, '2020_09_18_055427_create_leaves_table', 1),
(10, '2020_09_18_143847_create_salaries_table', 1),
(11, '2020_09_19_121524_create_payrolls_table', 1),
(12, '2020_09_19_140406_create_overtimes_table', 1),
(13, '2020_09_27_144051_add_new_fields_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 18),
(3, 'App\\User', 17),
(3, 'App\\User', 19),
(3, 'App\\User', 20),
(3, 'App\\User', 21);

-- --------------------------------------------------------

--
-- Table structure for table `overtimes`
--

CREATE TABLE `overtimes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `overtime_date` date NOT NULL,
  `overtime_hour` int(11) NOT NULL,
  `overtime_rate` decimal(2,1) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `overtimes`
--

INSERT INTO `overtimes` (`id`, `employee_id`, `overtime_date`, `overtime_hour`, `overtime_rate`, `description`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 11, '2019-09-20', 2, '1.5', 'HH', 0, 1, '2020-10-10 21:49:31', '2020-10-10 21:49:31'),
(3, 12, '2019-08-01', 5, '1.5', 'Hi', 0, 1, '2020-10-10 21:51:30', '2020-10-10 21:51:30'),
(4, 12, '2020-09-20', 2, '1.5', 'KK', 0, 1, '2020-10-10 21:52:50', '2020-10-11 01:08:10'),
(5, 11, '2020-11-05', 5, '1.5', 'KK', 1, 1, '2020-10-11 00:59:52', '2020-10-11 01:02:13'),
(6, 11, '2020-10-11', 2, '1.5', 'as', 0, 1, '2020-10-11 01:02:44', '2020-10-11 01:08:01'),
(7, 13, '2020-09-11', 8, '1.5', 'OT', 0, 19, '2021-12-30 13:35:15', '2021-12-30 13:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` date NOT NULL,
  `overtime_bonus` decimal(15,2) DEFAULT '0.00',
  `leave_deduction` decimal(15,2) DEFAULT '0.00',
  `attendance_bonus` decimal(15,2) DEFAULT '0.00',
  `other_bonus` decimal(15,2) DEFAULT '0.00',
  `attendance_deduction` decimal(15,2) DEFAULT '0.00',
  `other_deduction` decimal(15,2) DEFAULT '0.00',
  `total_bonus` decimal(15,2) DEFAULT '0.00',
  `total_deduction` decimal(15,2) DEFAULT '0.00',
  `net_pay` decimal(15,2) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payrolls`
--

INSERT INTO `payrolls` (`id`, `employee_id`, `user_id`, `payment_month`, `payment_date`, `overtime_bonus`, `leave_deduction`, `attendance_bonus`, `other_bonus`, `attendance_deduction`, `other_deduction`, `total_bonus`, `total_deduction`, `net_pay`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 18, '2020-09', '2020-10-01', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '500000.00', 'Total leave - 5 days. \r\n *You have no leave day (deduction) in current Month*', 1, '2020-10-11 07:54:00', '2020-10-11 07:59:17'),
(3, 11, 1, '2020-11', '2020-12-01', '19668.00', '0.00', '0.00', '0.00', '0.00', '0.00', '19668.00', '0.00', '519668.00', 'Total leave - 5 days. \r\n *You have no leave day (deduction) in current Month*', 1, '2020-10-11 22:20:32', '2020-10-12 03:49:51'),
(4, 14, 1, '2020-02', '2020-03-01', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1650366.00', 'Total leave - 0 days. \r\n *You have no leave day (deduction) in current Month*', 1, '2020-10-12 00:33:32', '2020-10-12 00:35:54'),
(5, 14, 1, '2020-12', '2021-01-01', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1022130.00', 'Total leave - 0 days. \r\n *You have no leave day (deduction) in current Month*', 1, '2020-10-12 00:35:24', '2020-10-12 03:53:14'),
(6, 11, 1, '2016-07', '2020-10-12', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '435484.00', 'Total leave - 0 days. \r\n *You have no leave day (deduction) in current Month*', 0, '2020-10-12 03:39:14', '2020-10-12 03:39:14'),
(7, 15, 1, '2020-01', '2020-02-01', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '800000.00', 'Total leave - 0 days. \r\n *You have no leave day (deduction) in current Month*', 0, '2020-10-12 03:52:21', '2020-10-12 03:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', NULL, NULL),
(2, 'hr', 'web', NULL, NULL),
(3, 'staff', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `basic_salary` decimal(15,2) NOT NULL,
  `basic_working_time_per_day` int(11) NOT NULL,
  `medical_allowance` decimal(15,2) DEFAULT '0.00',
  `transport_allowance` decimal(15,2) DEFAULT '0.00',
  `accomodation_allowance` decimal(15,2) DEFAULT '0.00',
  `other_allowance` decimal(15,2) DEFAULT '0.00',
  `leave_allowance` int(11) DEFAULT '0',
  `epf` decimal(5,2) DEFAULT '0.00',
  `esi` decimal(5,2) DEFAULT '0.00',
  `other_insurance` decimal(15,2) DEFAULT '0.00',
  `other_deduction` decimal(15,2) DEFAULT '0.00',
  `gross_salary` decimal(15,2) DEFAULT '0.00',
  `total_deduction` decimal(15,2) DEFAULT '0.00',
  `net_salary` decimal(15,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `employee_id`, `user_id`, `basic_salary`, `basic_working_time_per_day`, `medical_allowance`, `transport_allowance`, `accomodation_allowance`, `other_allowance`, `leave_allowance`, `epf`, `esi`, `other_insurance`, `other_deduction`, `gross_salary`, `total_deduction`, `net_salary`, `created_at`, `updated_at`) VALUES
(1, 11, 1, '500000.00', 8, '0.00', '0.00', '0.00', '0.00', 16, '0.00', '0.00', '0.00', '0.00', '500000.00', '0.00', '500000.00', '2020-10-10 10:18:38', '2020-10-10 10:18:38'),
(2, 12, 1, '700000.00', 8, '50000.00', '5000.00', '50000.00', '0.00', 20, '0.20', '0.15', '0.00', '0.00', '805000.00', '2818.00', '802182.00', '2020-10-12 00:29:25', '2020-10-12 00:29:25'),
(3, 13, 1, '600000.00', 8, '50000.00', '5000.00', '0.00', '0.00', 15, '0.00', '0.00', '0.00', '0.00', '655000.00', '0.00', '655000.00', '2020-10-12 00:29:50', '2020-10-12 00:30:27'),
(4, 14, 1, '900000.00', 8, '70000.00', '5000.00', '50000.00', '0.00', 18, '0.10', '0.18', '0.00', '0.00', '1025000.00', '2870.00', '1022130.00', '2020-10-12 00:31:21', '2020-10-12 00:34:44'),
(5, 15, 1, '800000.00', 8, '0.00', '0.00', '0.00', '0.00', 16, '0.00', '0.00', '0.00', '0.00', '800000.00', '0.00', '800000.00', '2020-10-12 03:51:27', '2020-10-12 03:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Myat', 'myat@gmail.com', NULL, '$2y$10$5cJTYH47kt1rFpRLUf3kAePqDMdJP.rBeGt1qTKHc.zJBDl1iinJG', NULL, '2020-10-10 09:22:43', '2020-10-10 09:22:43'),
(17, 'Donald', 'kgkgkkgg1234@gmail.com', NULL, '$2y$10$GZLCbaCQ4We82fkRgNUs5.MnsjAh5Po7hEsuOiHzrd1kBV2QJpdg2', NULL, '2020-10-10 09:25:40', '2021-12-30 13:20:41'),
(18, 'Priscilla Montes', 'priscilla@gmail.com', NULL, '$2y$10$OREsF7pUNl1lNzQmVPj1E..LOIUUMHD0R56L5JWTw1UbUNJWNjsbu', NULL, '2020-10-10 10:24:26', '2020-10-12 00:50:16'),
(19, 'Steven Wierd', 'stevenweird@gmail.com', NULL, '$2y$10$g.ImIr8B65IniJOG8PR6TuPf.1wbDEfmCqQWuj5fAwp3GiGRhof0a', NULL, '2020-10-12 00:24:42', '2020-10-12 00:24:42'),
(20, 'Julius Lisa', 'myatminthant.mmt23@gmail.com', NULL, '$2y$10$Z6vfK5LSIE.hpyDtBStjkO0p8as3IJHOsTDOKE0uv4vPu20BwEIJC', NULL, '2020-10-12 00:28:02', '2020-10-12 02:33:58'),
(21, 'Steven', 'steven@gmail.com', NULL, '$2y$10$0zqtHEjgOOlk4c920xH6i.CtWqiRjVIxHaz59lcZ5QNewnw1zxbre', NULL, '2020-10-12 03:45:28', '2020-10-12 03:45:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD KEY `employees_department_id_foreign` (`department_id`),
  ADD KEY `employees_designation_id_foreign` (`designation_id`),
  ADD KEY `employees_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaves_employee_id_foreign` (`employee_id`),
  ADD KEY `leaves_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `overtimes`
--
ALTER TABLE `overtimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `overtimes_employee_id_foreign` (`employee_id`),
  ADD KEY `overtimes_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payrolls_employee_id_foreign` (`employee_id`),
  ADD KEY `payrolls_user_id_foreign` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `salaries_employee_id_unique` (`employee_id`),
  ADD KEY `salaries_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `overtimes`
--
ALTER TABLE `overtimes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leaves_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `overtimes`
--
ALTER TABLE `overtimes`
  ADD CONSTRAINT `overtimes_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `overtimes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD CONSTRAINT `payrolls_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payrolls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `salaries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
