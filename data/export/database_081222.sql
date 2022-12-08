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


-- Dumping database structure for gexportdb
DROP DATABASE IF EXISTS `gexportdb`;
CREATE DATABASE IF NOT EXISTS `gexportdb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `gexportdb`;

-- Dumping structure for table gexportdb.master_bank
DROP TABLE IF EXISTS `master_bank`;
CREATE TABLE IF NOT EXISTS `master_bank` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `account` varchar(100) NOT NULL,
  `branch` text NOT NULL,
  `address` text NOT NULL,
  `swift_code` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  UNIQUE KEY `swift_code` (`swift_code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_bank: ~1 rows (approximately)
DELETE FROM `master_bank`;
INSERT INTO `master_bank` (`id`, `code`, `name`, `account`, `branch`, `address`, `swift_code`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
	(1, '12', 'BCA2', 'ASDAGFG', 'JAKARTA BARAT', 'DKI JAKARTA', '3453temer', '2022-12-08 08:09:35', 1, '2022-12-08 15:07:47', 1, '0');

-- Dumping structure for table gexportdb.master_beneficiary
DROP TABLE IF EXISTS `master_beneficiary`;
CREATE TABLE IF NOT EXISTS `master_beneficiary` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `office` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_master_beneficiary_master_country` (`country_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `FK_master_beneficiary_master_country` FOREIGN KEY (`country_id`) REFERENCES `master_country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_beneficiary: ~1 rows (approximately)
DELETE FROM `master_beneficiary`;
INSERT INTO `master_beneficiary` (`id`, `name`, `office`, `address`, `country_id`, `contact_person`, `phone_no`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
	(1, 'SUMBER KOPI PRIMA OKE', 'GEDUNG GADJAH', 'JALAN S. PARMAN - JAKARTA BARAT', 1, 'KURNAIN ARSYI RAMADHAN', '085774439141', '2022-12-08 10:28:24', 1, '2022-12-08 17:37:37', 1, '0');

-- Dumping structure for table gexportdb.master_container
DROP TABLE IF EXISTS `master_container`;
CREATE TABLE IF NOT EXISTS `master_container` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `max_cbm` decimal(3,0) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_container: ~0 rows (approximately)
DELETE FROM `master_container`;
INSERT INTO `master_container` (`id`, `name`, `max_cbm`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
	(1, '20 FT', 33, '2022-12-07 09:59:14', 1, '2022-12-07 17:39:41', 1, '0');

-- Dumping structure for table gexportdb.master_country
DROP TABLE IF EXISTS `master_country`;
CREATE TABLE IF NOT EXISTS `master_country` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_country: ~1 rows (approximately)
DELETE FROM `master_country`;
INSERT INTO `master_country` (`id`, `code`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
	(1, 'INA', 'Indonesias', '2022-12-07 06:37:35', 1, '2022-12-07 13:54:16', 1, '0');

-- Dumping structure for table gexportdb.master_incoterm
DROP TABLE IF EXISTS `master_incoterm`;
CREATE TABLE IF NOT EXISTS `master_incoterm` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_incoterm: ~2 rows (approximately)
DELETE FROM `master_incoterm`;
INSERT INTO `master_incoterm` (`id`, `code`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
	(1, 'FOB', 'Freight On Board', '2022-12-08 02:27:20', 1, NULL, NULL, '0'),
	(2, 'CNF', 'Cost And Freight', '2022-12-08 02:28:12', 1, '2022-12-08 10:16:59', 1, '0');

-- Dumping structure for table gexportdb.master_item
DROP TABLE IF EXISTS `master_item`;
CREATE TABLE IF NOT EXISTS `master_item` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `item_category_id` tinyint(4) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `wh_name` varchar(100) NOT NULL,
  `pack_desc` varchar(100) NOT NULL,
  `net_weight` decimal(10,2) NOT NULL DEFAULT 0.00,
  `gross_weight` decimal(10,2) NOT NULL DEFAULT 0.00,
  `length` decimal(10,0) NOT NULL DEFAULT 0,
  `width` decimal(10,0) NOT NULL DEFAULT 0,
  `height` decimal(10,0) NOT NULL DEFAULT 0,
  `md_no` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` tinyint(4) NOT NULL DEFAULT 0,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `FK_master_item_master_item_category` (`item_category_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `FK_master_item_master_item_category` FOREIGN KEY (`item_category_id`) REFERENCES `master_item_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_item: ~2 rows (approximately)
DELETE FROM `master_item`;
INSERT INTO `master_item` (`id`, `item_category_id`, `code`, `name`, `wh_name`, `pack_desc`, `net_weight`, `gross_weight`, `length`, `width`, `height`, `md_no`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
	(1, 2, '30000041', 'CAFFINO COFFEE LATTE CLASSIC', 'CAFFINO COFFEE LATTE CLASSIC', '24 POUCH X 10 SACHET X 20GR', 4.80, 5.92, 505, 220, 267, NULL, '2022-12-08 05:03:12', 1, NULL, NULL, '0'),
	(2, 2, '30000042', 'CAFFINO COFFEE LATTE HAZELNUT', 'CAFFINO COFFEE LATTE HAZELNUT', '24 POUCH X 10 SACHET X 20GR', 4.80, 5.92, 505, 220, 267, NULL, '2022-12-08 07:00:26', 1, '2022-12-08 13:57:19', 1, '0');

-- Dumping structure for table gexportdb.master_item_category
DROP TABLE IF EXISTS `master_item_category`;
CREATE TABLE IF NOT EXISTS `master_item_category` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_item_category: ~2 rows (approximately)
DELETE FROM `master_item_category`;
INSERT INTO `master_item_category` (`id`, `name`, `is_deleted`) VALUES
	(1, 'GADJAH', '0'),
	(2, 'CAFFINO', '0');

-- Dumping structure for table gexportdb.master_item_spec
DROP TABLE IF EXISTS `master_item_spec`;
CREATE TABLE IF NOT EXISTS `master_item_spec` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `item_id` tinyint(4) NOT NULL,
  `description` text NOT NULL,
  `form` varchar(100) NOT NULL,
  `texture` varchar(100) NOT NULL,
  `colour` varchar(100) NOT NULL,
  `taste` varchar(100) NOT NULL,
  `odour` varchar(100) NOT NULL,
  `fat` varchar(100) NOT NULL,
  `moisture` varchar(100) NOT NULL,
  `caffeine` varchar(100) NOT NULL,
  `ingredients` text NOT NULL,
  `product_shelf` varchar(100) NOT NULL,
  `packaging` varchar(100) NOT NULL,
  `storage` varchar(100) NOT NULL,
  `functions` varchar(100) NOT NULL,
  `usage` varchar(100) NOT NULL,
  `source` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `item_id` (`item_id`),
  CONSTRAINT `FK_master_item_spec_master_item` FOREIGN KEY (`item_id`) REFERENCES `master_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_item_spec: ~2 rows (approximately)
DELETE FROM `master_item_spec`;
INSERT INTO `master_item_spec` (`id`, `item_id`, `description`, `form`, `texture`, `colour`, `taste`, `odour`, `fat`, `moisture`, `caffeine`, `ingredients`, `product_shelf`, `packaging`, `storage`, `functions`, `usage`, `source`, `country`) VALUES
	(1, 1, 'description', 'form', 'texture', 'colour', 'taste', 'odour', '10', '10', 'caffeine', 'ingredients', 'product', 'packaging', 'storage', 'function', 'usage', 'source', 'country'),
	(2, 2, 'desc 2', 'form 2', 'texture 2', 'colour 2', 'taste 2', 'odour 2', '20', '200', 'as', 'ingredient 2', 'product 2', 'packaging 2', 'storage 2', 'function 2', 'usage 2', 'source 2', 'country 2');

-- Dumping structure for table gexportdb.master_loading_port
DROP TABLE IF EXISTS `master_loading_port`;
CREATE TABLE IF NOT EXISTS `master_loading_port` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_loading_port: ~1 rows (approximately)
DELETE FROM `master_loading_port`;
INSERT INTO `master_loading_port` (`id`, `code`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
	(1, 'INA', 'Indonesiaa', '2022-12-08 09:52:26', 1, '2022-12-08 17:02:25', 1, '0');

-- Dumping structure for table gexportdb.master_top
DROP TABLE IF EXISTS `master_top`;
CREATE TABLE IF NOT EXISTS `master_top` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_top: ~1 rows (approximately)
DELETE FROM `master_top`;
INSERT INTO `master_top` (`id`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
	(1, '30 days', '2022-12-07 03:44:28', 1, NULL, NULL, '0');

-- Dumping structure for view gexportdb.view_master_bank
DROP VIEW IF EXISTS `view_master_bank`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_master_bank` (
	`id` TINYINT(4) NOT NULL,
	`code` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`name` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`account` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`branch` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`address` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`swift_code` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`created_at` TIMESTAMP NOT NULL,
	`created_by` TINYINT(4) NOT NULL,
	`updated_at` DATETIME NULL,
	`updated_by` TINYINT(4) NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'latin1_swedish_ci',
	`creator_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`updated_name` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`is_active` VARCHAR(10) NOT NULL COLLATE 'utf8mb4_general_ci',
	`flags` VARCHAR(33) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gexportdb.view_master_beneficiary
DROP VIEW IF EXISTS `view_master_beneficiary`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_master_beneficiary` (
	`id` TINYINT(4) NOT NULL,
	`name` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`office` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`address` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`country_id` TINYINT(4) NOT NULL,
	`contact_person` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`phone_no` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
	`created_at` TIMESTAMP NOT NULL,
	`created_by` TINYINT(4) NOT NULL,
	`updated_at` DATETIME NULL,
	`updated_by` TINYINT(4) NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'latin1_swedish_ci',
	`country_name` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`creator_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`updated_name` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`is_active` VARCHAR(10) NOT NULL COLLATE 'utf8mb4_general_ci',
	`flags` VARCHAR(33) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gexportdb.view_master_container
DROP VIEW IF EXISTS `view_master_container`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_master_container` (
	`id` TINYINT(4) NOT NULL,
	`name` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`max_cbm` DECIMAL(3,0) NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`created_by` TINYINT(4) NOT NULL,
	`updated_at` DATETIME NULL,
	`updated_by` TINYINT(4) NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'latin1_swedish_ci',
	`creator_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`updated_name` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`is_active` VARCHAR(10) NOT NULL COLLATE 'utf8mb4_general_ci',
	`flags` VARCHAR(33) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gexportdb.view_master_country
DROP VIEW IF EXISTS `view_master_country`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_master_country` (
	`id` TINYINT(4) NOT NULL,
	`code` VARCHAR(3) NOT NULL COLLATE 'latin1_swedish_ci',
	`name` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`created_at` TIMESTAMP NOT NULL,
	`created_by` TINYINT(4) NOT NULL,
	`updated_at` DATETIME NULL,
	`updated_by` TINYINT(4) NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'latin1_swedish_ci',
	`creator_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`updated_name` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`is_active` VARCHAR(10) NOT NULL COLLATE 'utf8mb4_general_ci',
	`flags` VARCHAR(33) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gexportdb.view_master_incoterm
DROP VIEW IF EXISTS `view_master_incoterm`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_master_incoterm` (
	`id` TINYINT(4) NOT NULL,
	`code` VARCHAR(3) NOT NULL COLLATE 'latin1_swedish_ci',
	`name` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`created_at` TIMESTAMP NOT NULL,
	`created_by` TINYINT(4) NOT NULL,
	`updated_at` DATETIME NULL,
	`updated_by` TINYINT(4) NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'latin1_swedish_ci',
	`creator_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`updated_name` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`is_active` VARCHAR(10) NOT NULL COLLATE 'utf8mb4_general_ci',
	`flags` VARCHAR(33) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gexportdb.view_master_item
DROP VIEW IF EXISTS `view_master_item`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_master_item` (
	`id` TINYINT(4) NOT NULL,
	`item_category_id` TINYINT(4) NOT NULL,
	`code` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`name` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`wh_name` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`pack_desc` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`net_weight` DECIMAL(10,2) NOT NULL,
	`gross_weight` DECIMAL(10,2) NOT NULL,
	`length` DECIMAL(10,0) NOT NULL,
	`width` DECIMAL(10,0) NOT NULL,
	`height` DECIMAL(10,0) NOT NULL,
	`md_no` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`created_at` TIMESTAMP NOT NULL,
	`created_by` TINYINT(4) NOT NULL,
	`updated_at` DATETIME NULL,
	`updated_by` TINYINT(4) NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'latin1_swedish_ci',
	`dimensions` VARCHAR(39) NOT NULL COLLATE 'utf8mb4_general_ci',
	`creator_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`updated_name` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`is_active` VARCHAR(10) NOT NULL COLLATE 'utf8mb4_general_ci',
	`flags` VARCHAR(33) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gexportdb.view_master_loading_port
DROP VIEW IF EXISTS `view_master_loading_port`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_master_loading_port` (
	`id` TINYINT(4) NOT NULL,
	`code` VARCHAR(3) NOT NULL COLLATE 'latin1_swedish_ci',
	`name` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`created_at` TIMESTAMP NOT NULL,
	`created_by` TINYINT(4) NOT NULL,
	`updated_at` DATETIME NULL,
	`updated_by` TINYINT(4) NULL,
	`is_deleted` ENUM('0','1') NOT NULL COLLATE 'latin1_swedish_ci',
	`creator_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`updated_name` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`is_active` VARCHAR(10) NOT NULL COLLATE 'utf8mb4_general_ci',
	`flags` VARCHAR(33) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gexportdb.view_master_top
DROP VIEW IF EXISTS `view_master_top`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_master_top` (
	`id` TINYINT(4) NOT NULL,
	`name` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`created_at` TIMESTAMP NOT NULL,
	`created_by` TINYINT(4) NOT NULL,
	`updated_at` DATETIME NULL,
	`updated_by` TINYINT(4) NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'latin1_swedish_ci',
	`creator_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`updated_name` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`is_active` VARCHAR(10) NOT NULL COLLATE 'utf8mb4_general_ci',
	`flags` VARCHAR(33) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gexportdb.view_master_bank
DROP VIEW IF EXISTS `view_master_bank`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_master_bank`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_master_bank` AS SELECT
	a.*, b.fullname creator_name, c.fullname updated_name,
	IF(a.is_deleted = '0', 'Active', 'Non active') is_active,
	IF(a.is_deleted = '0', '<i class="fas fa-toggle-off"></i>', '<i class="fas fa-toggle-on"></i>') flags
FROM master_bank a
JOIN gportaldb.`master_user` b ON a.created_by = b.id
LEFT JOIN gportaldb.`master_user` c ON a.updated_by = c.id ;

-- Dumping structure for view gexportdb.view_master_beneficiary
DROP VIEW IF EXISTS `view_master_beneficiary`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_master_beneficiary`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_master_beneficiary` AS SELECT
	a.*, d.name country_name, 
	b.fullname creator_name, c.fullname updated_name,
	IF(a.is_deleted = '0', 'Active', 'Non active') is_active,
	IF(a.is_deleted = '0', '<i class="fas fa-toggle-off"></i>', '<i class="fas fa-toggle-on"></i>') flags
FROM master_beneficiary a
JOIN gportaldb.`master_user` b ON a.created_by = b.id
LEFT JOIN gportaldb.`master_user` c ON a.updated_by = c.id 
JOIN master_country d ON a.country_id = d.id ;

-- Dumping structure for view gexportdb.view_master_container
DROP VIEW IF EXISTS `view_master_container`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_master_container`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_master_container` AS SELECT
	a.*, b.fullname creator_name, c.fullname updated_name,
	IF(a.is_deleted = '0', 'Active', 'Non active') is_active,
	IF(a.is_deleted = '0', '<i class="fas fa-toggle-off"></i>', '<i class="fas fa-toggle-on"></i>') flags
FROM master_container a
JOIN gportaldb.`master_user` b ON a.created_by = b.id
LEFT JOIN gportaldb.`master_user` c ON a.updated_by = c.id ;

-- Dumping structure for view gexportdb.view_master_country
DROP VIEW IF EXISTS `view_master_country`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_master_country`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_master_country` AS SELECT
	a.*, b.fullname creator_name, c.fullname updated_name,
	IF(a.is_deleted = '0', 'Active', 'Non active') is_active,
	IF(a.is_deleted = '0', '<i class="fas fa-toggle-off"></i>', '<i class="fas fa-toggle-on"></i>') flags
FROM master_country a
JOIN gportaldb.`master_user` b ON a.created_by = b.id
LEFT JOIN gportaldb.`master_user` c ON a.updated_by = c.id ;

-- Dumping structure for view gexportdb.view_master_incoterm
DROP VIEW IF EXISTS `view_master_incoterm`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_master_incoterm`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_master_incoterm` AS SELECT
	a.*, b.fullname creator_name, c.fullname updated_name,
	IF(a.is_deleted = '0', 'Active', 'Non active') is_active,
	IF(a.is_deleted = '0', '<i class="fas fa-toggle-off"></i>', '<i class="fas fa-toggle-on"></i>') flags
FROM master_incoterm a
JOIN gportaldb.`master_user` b ON a.created_by = b.id
LEFT JOIN gportaldb.`master_user` c ON a.updated_by = c.id ;

-- Dumping structure for view gexportdb.view_master_item
DROP VIEW IF EXISTS `view_master_item`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_master_item`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_master_item` AS SELECT
	a.*, CONCAT(a.`length`, ' X ', a.width, ' X ', a.height) dimensions,
	b.fullname creator_name, c.fullname updated_name,
	IF(a.is_deleted = '0', 'Active', 'Non active') is_active,
	IF(a.is_deleted = '0', '<i class="fas fa-toggle-off"></i>', '<i class="fas fa-toggle-on"></i>') flags
FROM master_item a
JOIN gportaldb.`master_user` b ON a.created_by = b.id
LEFT JOIN gportaldb.`master_user` c ON a.updated_by = c.id ;

-- Dumping structure for view gexportdb.view_master_loading_port
DROP VIEW IF EXISTS `view_master_loading_port`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_master_loading_port`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_master_loading_port` AS SELECT
	a.*, b.fullname creator_name, c.fullname updated_name,
	IF(a.is_deleted = '0', 'Active', 'Non active') is_active,
	IF(a.is_deleted = '0', '<i class="fas fa-toggle-off"></i>', '<i class="fas fa-toggle-on"></i>') flags
FROM master_loading_port a
JOIN gportaldb.`master_user` b ON a.created_by = b.id
LEFT JOIN gportaldb.`master_user` c ON a.updated_by = c.id ;

-- Dumping structure for view gexportdb.view_master_top
DROP VIEW IF EXISTS `view_master_top`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_master_top`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_master_top` AS SELECT
	a.*, b.fullname creator_name, c.fullname updated_name,
	IF(a.is_deleted = '0', 'Active', 'Non active') is_active,
	IF(a.is_deleted = '0', '<i class="fas fa-toggle-off"></i>', '<i class="fas fa-toggle-on"></i>') flags
FROM master_top a
JOIN gportaldb.`master_user` b ON a.created_by = b.id
LEFT JOIN gportaldb.`master_user` c ON a.updated_by = c.id ;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
