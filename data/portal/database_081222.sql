-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.2.0.6576
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for gportaldb
DROP DATABASE IF EXISTS `gportaldb`;
CREATE DATABASE IF NOT EXISTS `gportaldb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `gportaldb`;

-- Dumping structure for table gportaldb.master_menu_group
DROP TABLE IF EXISTS `master_menu_group`;
CREATE TABLE IF NOT EXISTS `master_menu_group` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gportaldb.master_menu_group: ~4 rows (approximately)
DELETE FROM `master_menu_group`;
INSERT INTO `master_menu_group` (`id`, `name`, `icon`, `url`, `is_deleted`) VALUES
	(1, 'Master', 'programming.png', 'master', '0'),
	(2, 'Transaction', 'transaction.png', 'transaction', '0'),
	(3, 'Report', 'report.png', 'report', '0'),
	(4, 'System', 'content-management-system.png', 'system', '0');

-- Dumping structure for table gportaldb.master_menu_module
DROP TABLE IF EXISTS `master_menu_module`;
CREATE TABLE IF NOT EXISTS `master_menu_module` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_master_module_master_user` (`created_by`),
  KEY `FK_master_module_master_user_2` (`updated_by`),
  CONSTRAINT `FK_master_module_master_user` FOREIGN KEY (`created_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_master_module_master_user_2` FOREIGN KEY (`updated_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gportaldb.master_menu_module: ~3 rows (approximately)
DELETE FROM `master_menu_module`;
INSERT INTO `master_menu_module` (`id`, `name`, `icon`, `url`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
	(1, 'UAC', 'monitoring.png', 'uac', '2022-08-09 08:17:35', 1, NULL, NULL, '0'),
	(2, 'EXPORT', 'logistics.png', 'export', '2022-08-09 08:20:51', 1, '2022-08-10 14:03:48', NULL, '0'),
	(3, 'FORCE', 'work.png', 'force', '2022-12-06 07:09:23', 1, '2022-12-06 15:06:07', 1, '0');

-- Dumping structure for table gportaldb.master_menu_sub
DROP TABLE IF EXISTS `master_menu_sub`;
CREATE TABLE IF NOT EXISTS `master_menu_sub` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `menu_module_id` tinyint(4) NOT NULL,
  `menu_group_id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_master_menu_sub_master_menu_module` (`menu_module_id`),
  KEY `FK_master_menu_sub_master_menu_group` (`menu_group_id`),
  KEY `FK_master_menu_sub_master_user` (`created_by`),
  KEY `FK_master_menu_sub_master_user_2` (`updated_by`),
  CONSTRAINT `FK_master_menu_sub_master_menu_group` FOREIGN KEY (`menu_group_id`) REFERENCES `master_menu_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_master_menu_sub_master_menu_module` FOREIGN KEY (`menu_module_id`) REFERENCES `master_menu_module` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_master_menu_sub_master_user` FOREIGN KEY (`created_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_master_menu_sub_master_user_2` FOREIGN KEY (`updated_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gportaldb.master_menu_sub: ~18 rows (approximately)
DELETE FROM `master_menu_sub`;
INSERT INTO `master_menu_sub` (`id`, `menu_module_id`, `menu_group_id`, `name`, `icon`, `url`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
	(1, 1, 1, 'User', 'fas fa-users', 'user', '2022-08-09 10:55:18', 1, NULL, NULL, '0'),
	(2, 1, 1, 'Module', 'far fa-file-alt', 'modules', '2022-08-09 10:58:26', 1, NULL, NULL, '0'),
	(3, 1, 1, 'Menu', 'fas fa-bars', 'menu', '2022-08-09 10:59:09', 1, NULL, NULL, '0'),
	(4, 1, 2, 'Assign Menu', 'fas fa-users-cog', 'assignmenu', '2022-08-10 04:13:07', NULL, NULL, NULL, '0'),
	(5, 2, 1, 'Terms Of Payment', 'fas fa-ruler-combined', 'top', '2022-08-10 07:00:11', NULL, '2022-08-10 14:19:39', NULL, '0'),
	(6, 2, 1, 'Country', 'fas fa-globe', 'country', '2022-08-10 09:09:26', NULL, NULL, NULL, '0'),
	(7, 2, 1, 'Container', 'fas fa-box', 'container', '2022-08-19 03:20:09', NULL, NULL, NULL, '0'),
	(8, 2, 1, 'Incoterm', 'fas fa-dumpster', 'incoterm', '2022-08-19 08:26:16', NULL, NULL, NULL, '0'),
	(9, 2, 1, 'Item', 'fab fa-product-hunt', 'item', '2022-08-19 11:45:21', NULL, NULL, NULL, '0'),
	(10, 2, 1, 'Item Mapping', 'fas fa-map', 'item_mapping', '2022-08-22 05:21:43', NULL, '2022-08-22 13:07:48', NULL, '1'),
	(11, 2, 1, 'Bank', 'fas fa-money-check', 'bank', '2022-08-22 07:09:17', NULL, NULL, NULL, '0'),
	(12, 2, 1, 'Loading Port', 'fas fa-truck-loading', 'loading_port', '2022-08-22 08:13:04', NULL, NULL, NULL, '0'),
	(13, 2, 1, 'Beneficiary', 'fas fa-sync-alt', 'beneficiary', '2022-08-22 10:18:35', NULL, NULL, NULL, '0'),
	(14, 2, 1, 'Customer', 'fas fa-building', 'customer', '2022-08-23 02:25:34', NULL, NULL, NULL, '0'),
	(15, 2, 2, 'Proforma Invoice', 'fas fa-file-invoice-dollar', 'proforma', '2022-09-01 04:28:10', NULL, NULL, NULL, '0'),
	(16, 2, 2, 'Signed PI', 'fas fa-signature', 'signedpi', '2022-09-09 09:07:44', NULL, NULL, NULL, '0'),
	(17, 2, 1, 'Tester', 'fas fa-cubes', 'tester', '2022-12-06 09:45:32', NULL, '2022-12-06 17:26:45', NULL, '0'),
	(18, 1, 3, 'Log Access', 'fas file-alt', 'log_auth', '2022-12-07 02:12:51', NULL, NULL, NULL, '0');

-- Dumping structure for table gportaldb.master_position
DROP TABLE IF EXISTS `master_position`;
CREATE TABLE IF NOT EXISTS `master_position` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `role_id` tinyint(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_master_position_master_role` (`role_id`),
  CONSTRAINT `FK_master_position_master_role` FOREIGN KEY (`role_id`) REFERENCES `master_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gportaldb.master_position: ~4 rows (approximately)
DELETE FROM `master_position`;
INSERT INTO `master_position` (`id`, `role_id`, `name`, `is_deleted`) VALUES
	(1, 2, 'Fullstack Developer', '0'),
	(2, 3, 'Business Development Manager', '0'),
	(3, 1, 'Superuser', '0'),
	(4, 4, 'Supervisor Warehouse', '0');

-- Dumping structure for table gportaldb.master_role
DROP TABLE IF EXISTS `master_role`;
CREATE TABLE IF NOT EXISTS `master_role` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table gportaldb.master_role: ~9 rows (approximately)
DELETE FROM `master_role`;
INSERT INTO `master_role` (`id`, `name`, `is_deleted`) VALUES
	(1, 'System Administrator', '0'),
	(2, 'IT', '0'),
	(3, 'Sales', '0'),
	(4, 'Warehouse', '0'),
	(5, 'PPIC', '0'),
	(6, 'Finance', '0'),
	(7, 'Procurement', '0'),
	(8, 'QC', '0'),
	(9, 'QA', '0');

-- Dumping structure for table gportaldb.master_user
DROP TABLE IF EXISTS `master_user`;
CREATE TABLE IF NOT EXISTS `master_user` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `signature` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gportaldb.master_user: ~6 rows (approximately)
DELETE FROM `master_user`;
INSERT INTO `master_user` (`id`, `fullname`, `username`, `email`, `password`, `signature`, `created_at`, `updated_at`, `is_deleted`) VALUES
	(1, 'System Administrator', 'sysadmin', 'sysadmin@gonusa-distribusi.com', '$2y$10$vX22N1Rfn.ljsHmBzDF.CebNv287qAgkPelWq2WxEGcNWA3HC4j4i', 'assets/attachment/uac/user/signature_sysadmin_1550490543.png', '2022-08-09 04:14:01', '2022-08-09 05:27:56', '0'),
	(2, 'Kurnain Arsyi Ramadhan', 'kurnainar', 'kurnain.arsyi@gonusa-distribusi.com', '$2y$10$PSdyMxTgSiv5.ADOhHx7oOEVe2YxJaVf5UL5Su55k5v7.Ecqcjlh.', NULL, '2022-08-09 04:19:16', '2022-08-09 09:40:05', '0'),
	(3, 'Fahna Nur Santika', 'fahna.nur.santika', 'fahna.nur.santika@gonusa-distribusi.com', '$2y$10$k.ke10o.25utg.9eFyaRq.62QVdQ0RCXv1DzupcYfBYh8dtNwon1m', NULL, '2022-09-07 10:59:48', NULL, '0'),
	(4, 'Yosi Subiyantoro', 'yosi.s', 'spv.whs.kds@sumberkopiprima.com', '$2y$10$A6wzK5kQJXTaZwfXJXIra.YjlLcLRun8a6FmpSMRs6.caZxMj0Pr6', NULL, '2022-09-07 11:05:57', NULL, '0'),
	(5, 'Berlian Nisaazizah', 'berlian', 'berlian@sumberkopiprima.com', '$2y$10$IX9.ZCUhXvKekgqDoAjkxO08fkkHoJi7Mwsck4cWbkfu8bJ26b4Za', NULL, '2022-09-07 11:06:54', NULL, '0'),
	(6, 'Nico Christian Lysander', 'nico.cl', 'spv.whs.mjk@sumberkopiprima.com', '$2y$10$Wivnga99IbdvmYpCXPB0huPX4uvC7AzcYiCI5Mu1wW4LzsXE2aVVm', NULL, '2022-09-07 11:07:24', NULL, '0'),
	(7, 'Tester1', 'tester', 'test@mail.com', '$2y$10$kB2obYnOHegbMY0umyTr6uADxpBU7HHEzLXQAnExi5oz/vFUmdmD.', NULL, '2022-12-05 10:53:32', '2022-12-05 11:24:30', '0');

-- Dumping structure for table gportaldb.master_user_role
DROP TABLE IF EXISTS `master_user_role`;
CREATE TABLE IF NOT EXISTS `master_user_role` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `user_id` tinyint(4) NOT NULL,
  `role_id` tinyint(4) NOT NULL,
  `position_id` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `FK__master_role` (`role_id`),
  KEY `FK_master_user_role_master_position` (`position_id`),
  CONSTRAINT `FK__master_role` FOREIGN KEY (`role_id`) REFERENCES `master_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__master_user` FOREIGN KEY (`user_id`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_master_user_role_master_position` FOREIGN KEY (`position_id`) REFERENCES `master_position` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gportaldb.master_user_role: ~6 rows (approximately)
DELETE FROM `master_user_role`;
INSERT INTO `master_user_role` (`id`, `user_id`, `role_id`, `position_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 3, '2022-09-07 10:37:40', NULL),
	(2, 2, 2, 1, '2022-09-07 10:38:24', NULL),
	(3, 3, 3, 2, '2022-09-07 10:59:48', NULL),
	(4, 4, 4, 4, '2022-09-07 11:05:58', NULL),
	(5, 5, 4, 4, '2022-09-07 11:06:54', NULL),
	(6, 6, 4, 4, '2022-09-07 11:07:24', NULL),
	(7, 7, 1, 3, '2022-12-05 10:53:32', NULL);

-- Dumping structure for table gportaldb.trans_auth
DROP TABLE IF EXISTS `trans_auth`;
CREATE TABLE IF NOT EXISTS `trans_auth` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `user_id` tinyint(4) NOT NULL,
  `flag` enum('1','2') NOT NULL COMMENT '1 = Login; 2 = Logout;',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_trans_auth_master_user` (`user_id`),
  CONSTRAINT `FK_trans_auth_master_user` FOREIGN KEY (`user_id`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table gportaldb.trans_auth: ~9 rows (approximately)
DELETE FROM `trans_auth`;
INSERT INTO `trans_auth` (`id`, `user_id`, `flag`, `created_at`) VALUES
	(1, 1, '1', '2022-12-05 06:56:14'),
	(2, 1, '2', '2022-12-05 06:56:25'),
	(3, 1, '1', '2022-12-05 06:57:01'),
	(4, 1, '2', '2022-12-05 06:57:06'),
	(5, 1, '1', '2022-12-05 06:58:51'),
	(6, 1, '2', '2022-12-05 11:28:19'),
	(7, 1, '1', '2022-12-06 02:36:15'),
	(8, 1, '2', '2022-12-06 04:39:33'),
	(9, 1, '1', '2022-12-06 06:14:28'),
	(10, 1, '2', '2022-12-06 11:06:09'),
	(11, 1, '1', '2022-12-07 02:07:31'),
	(12, 1, '2', '2022-12-07 11:12:16'),
	(13, 1, '1', '2022-12-08 01:57:41');

-- Dumping structure for table gportaldb.trans_menu_assign
DROP TABLE IF EXISTS `trans_menu_assign`;
CREATE TABLE IF NOT EXISTS `trans_menu_assign` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `menu_sub_id` tinyint(4) NOT NULL,
  `role_id` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_trans_menu_assign_master_menu_sub` (`menu_sub_id`),
  KEY `FK_trans_menu_assign_master_role` (`role_id`),
  KEY `FK_trans_menu_assign_master_user` (`created_by`),
  CONSTRAINT `FK_trans_menu_assign_master_menu_sub` FOREIGN KEY (`menu_sub_id`) REFERENCES `master_menu_sub` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_menu_assign_master_role` FOREIGN KEY (`role_id`) REFERENCES `master_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_menu_assign_master_user` FOREIGN KEY (`created_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gportaldb.trans_menu_assign: ~23 rows (approximately)
DELETE FROM `trans_menu_assign`;
INSERT INTO `trans_menu_assign` (`id`, `menu_sub_id`, `role_id`, `created_at`, `created_by`) VALUES
	(1, 1, 1, '2022-08-10 04:02:28', NULL),
	(2, 2, 1, '2022-08-10 04:03:03', NULL),
	(3, 3, 1, '2022-08-10 04:12:24', NULL),
	(4, 4, 1, '2022-08-10 04:13:16', NULL),
	(5, 1, 2, '2022-08-10 04:13:28', NULL),
	(6, 2, 2, '2022-08-10 04:13:34', NULL),
	(7, 3, 2, '2022-08-10 04:13:41', NULL),
	(9, 4, 2, '2022-08-10 04:18:51', NULL),
	(10, 5, 1, '2022-08-10 07:00:56', NULL),
	(11, 6, 1, '2022-08-10 09:09:44', NULL),
	(12, 7, 1, '2022-08-19 03:20:30', NULL),
	(13, 8, 1, '2022-08-19 08:26:28', NULL),
	(14, 9, 1, '2022-08-19 11:45:31', NULL),
	(16, 11, 1, '2022-08-22 07:09:27', NULL),
	(17, 12, 1, '2022-08-22 08:13:13', NULL),
	(18, 13, 1, '2022-08-22 10:18:47', NULL),
	(19, 14, 1, '2022-08-23 02:25:56', NULL),
	(20, 15, 1, '2022-09-01 04:28:23', NULL),
	(21, 15, 4, '2022-09-07 10:23:26', NULL),
	(22, 15, 3, '2022-09-08 09:25:37', NULL),
	(23, 16, 1, '2022-09-09 09:07:57', NULL),
	(24, 16, 3, '2022-09-09 09:08:05', NULL),
	(25, 18, 1, '2022-12-07 02:13:18', NULL);

-- Dumping structure for view gportaldb.view_master_menu_sub
DROP VIEW IF EXISTS `view_master_menu_sub`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_master_menu_sub` (
	`id` TINYINT(4) NOT NULL,
	`menu_module_id` TINYINT(4) NOT NULL,
	`menu_group_id` TINYINT(4) NOT NULL,
	`name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`icon` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`url` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`created_at` TIMESTAMP NOT NULL,
	`created_by` TINYINT(4) NULL,
	`updated_at` DATETIME NULL,
	`updated_by` TINYINT(4) NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci',
	`menu_module_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menu_group_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gportaldb.view_master_user_list
DROP VIEW IF EXISTS `view_master_user_list`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_master_user_list` (
	`id` TINYINT(4) NOT NULL,
	`fullname` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`username` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`password` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`signature` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci',
	`role_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`position_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gportaldb.view_master_user_role
DROP VIEW IF EXISTS `view_master_user_role`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_master_user_role` (
	`id` TINYINT(4) NOT NULL,
	`fullname` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`username` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`password` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`signature` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci',
	`role_id` TINYINT(4) NOT NULL,
	`role_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`position_id` TINYINT(4) NOT NULL,
	`position_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gportaldb.view_trans_assign_group
DROP VIEW IF EXISTS `view_trans_assign_group`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trans_assign_group` (
	`role_id` TINYINT(4) NOT NULL,
	`menu_module_id` TINYINT(4) NOT NULL,
	`menu_module_url` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menu_group_id` TINYINT(4) NOT NULL,
	`menu_group_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menu_group_image` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menu_group_url` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`is_deleted` ENUM('0','1') NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gportaldb.view_trans_assign_module
DROP VIEW IF EXISTS `view_trans_assign_module`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trans_assign_module` (
	`menu_module_id` TINYINT(4) NOT NULL,
	`menu_module_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menu_module_image` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menu_module_url` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`role_id` TINYINT(4) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view gportaldb.view_trans_assign_sub
DROP VIEW IF EXISTS `view_trans_assign_sub`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trans_assign_sub` (
	`id` TINYINT(4) NOT NULL,
	`menu_sub_id` TINYINT(4) NOT NULL,
	`role_id` TINYINT(4) NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`created_by` TINYINT(4) NULL,
	`menu_module_url` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menu_group_url` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menu_sub_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menu_sub_icon` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menu_sub_url` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`module_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`group_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`role_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gportaldb.view_trans_auth
DROP VIEW IF EXISTS `view_trans_auth`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trans_auth` (
	`id` MEDIUMINT(9) NOT NULL,
	`user_id` TINYINT(4) NOT NULL,
	`flag` ENUM('1','2') NOT NULL COMMENT '1 = Login; 2 = Logout;' COLLATE 'latin1_swedish_ci',
	`created_at` TIMESTAMP NOT NULL,
	`fullname` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`role_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`position_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`flags` VARCHAR(6) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gportaldb.view_master_menu_sub
DROP VIEW IF EXISTS `view_master_menu_sub`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_master_menu_sub`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_master_menu_sub` AS SELECT
	a.*, b.name menu_module_name, c.name menu_group_name
FROM master_menu_sub a
JOIN master_menu_module b ON a.menu_module_id = b.id
JOIN master_menu_group c ON a.menu_group_id = c.id
ORDER BY a.menu_module_id, a.menu_group_id, a.id ;

-- Dumping structure for view gportaldb.view_master_user_list
DROP VIEW IF EXISTS `view_master_user_list`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_master_user_list`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_master_user_list` AS SELECT
	a.*, c.name role_name, d.name position_name
FROM `master_user` a
JOIN master_user_role b ON a.id = b.user_id
JOIN master_role c ON b.role_id = c.id
JOIN master_position d ON b.position_id = d.id 
ORDER BY a.id ;

-- Dumping structure for view gportaldb.view_master_user_role
DROP VIEW IF EXISTS `view_master_user_role`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_master_user_role`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_master_user_role` AS SELECT
	a.*, b.role_id, c.name role_name, b.position_id, d.name position_name
FROM `master_user` a
JOIN master_user_role b ON a.id = b.user_id
JOIN master_role c ON b.role_id = c.id
JOIN master_position d ON b.position_id = d.id
ORDER BY a.id ;

-- Dumping structure for view gportaldb.view_trans_assign_group
DROP VIEW IF EXISTS `view_trans_assign_group`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trans_assign_group`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_trans_assign_group` AS SELECT
	a.role_id, b.menu_module_id, d.url menu_module_url, b.menu_group_id, c.name menu_group_name, c.icon menu_group_image, c.url menu_group_url, c.is_deleted
FROM trans_menu_assign a
JOIN master_menu_sub b ON a.menu_sub_id = b.id
JOIN master_menu_group c ON b.menu_group_id = c.id
JOIN master_menu_module d ON b.menu_module_id = d.id
GROUP BY a.role_id, b.menu_module_id, b.menu_group_id ;

-- Dumping structure for view gportaldb.view_trans_assign_module
DROP VIEW IF EXISTS `view_trans_assign_module`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trans_assign_module`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_trans_assign_module` AS SELECT
	b.menu_module_id, c.name menu_module_name, c.icon menu_module_image, c.url menu_module_url, a.role_id
FROM trans_menu_assign a
JOIN master_menu_sub b ON a.menu_sub_id = b.id
JOIN master_menu_module c ON b.menu_module_id = c.id
GROUP BY b.menu_module_id, a.role_id ;

-- Dumping structure for view gportaldb.view_trans_assign_sub
DROP VIEW IF EXISTS `view_trans_assign_sub`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trans_assign_sub`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_trans_assign_sub` AS SELECT
	a.*, d.url menu_module_url, c.url menu_group_url, 
	b.name menu_sub_name, b.icon menu_sub_icon, b.url menu_sub_url, 
	d.name module_name, c.name group_name, e.name role_name,
	b.is_deleted
FROM trans_menu_assign a
JOIN master_menu_sub b ON a.menu_sub_id = b.id
JOIN master_menu_group c ON b.menu_group_id = c.id
JOIN master_menu_module d ON b.menu_module_id = d.id
JOIN master_role e ON a.role_id = e.id ;

-- Dumping structure for view gportaldb.view_trans_auth
DROP VIEW IF EXISTS `view_trans_auth`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trans_auth`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_trans_auth` AS SELECT
	a.*, b.fullname, d.name role_name, e.name position_name,
	IF(a.flag = '1', 'Login', 'Logout') flags
FROM trans_auth a
JOIN `master_user` b ON a.user_id = b.id
JOIN master_user_role c ON b.id = c.user_id
JOIN master_role d ON c.role_id = d.id
JOIN master_position e ON c.position_id = e.id
ORDER BY a.created_at DESC ;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
