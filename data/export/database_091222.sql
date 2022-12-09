-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
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
  `swift_code` varchar(100) NOT NULL,
  `account_no` varchar(100) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  UNIQUE KEY `swift_code` (`swift_code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_bank: ~2 rows (approximately)
DELETE FROM `master_bank`;
INSERT INTO `master_bank` (`id`, `code`, `name`, `swift_code`, `account_no`, `account_name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
	(1, '12', 'BCA2', '3453temer', '', 'ASDAGFG', '2022-12-08 08:09:35', 1, '2022-12-08 15:07:47', 1, '0'),
	(2, '014', 'BCA', 'cenaidja', '12345', 'KURNAIN ARSYI RAMADHAN', '2022-12-09 04:16:18', 1, NULL, NULL, '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_country: ~2 rows (approximately)
DELETE FROM `master_country`;
INSERT INTO `master_country` (`id`, `code`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
	(1, 'INA', 'INDONESIA', '2022-12-07 06:37:35', 1, '2022-12-08 17:53:09', 1, '0'),
	(2, 'SPG', 'SINGAPORE', '2022-12-09 10:37:40', 1, NULL, NULL, '0');

-- Dumping structure for table gexportdb.master_currency
DROP TABLE IF EXISTS `master_currency`;
CREATE TABLE IF NOT EXISTS `master_currency` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `icon` varchar(5) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_currency: ~0 rows (approximately)
DELETE FROM `master_currency`;

-- Dumping structure for table gexportdb.master_customer
DROP TABLE IF EXISTS `master_customer`;
CREATE TABLE IF NOT EXISTS `master_customer` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(12) NOT NULL COMMENT 'Format: 8801+CountryCode+Running Number 4 Digit',
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  `town` varchar(100) NOT NULL,
  `phone_no_tel` varchar(20) NOT NULL,
  `phone_no_fax` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `FK_master_customer_master_country` (`country_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `FK_master_customer_master_country` FOREIGN KEY (`country_id`) REFERENCES `master_country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_customer: ~2 rows (approximately)
DELETE FROM `master_customer`;

-- Dumping structure for table gexportdb.master_customer_bank
DROP TABLE IF EXISTS `master_customer_bank`;
CREATE TABLE IF NOT EXISTS `master_customer_bank` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `customer_id` tinyint(4) NOT NULL,
  `bank_id` tinyint(4) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_master_customer_bank_master_customer` (`customer_id`),
  KEY `FK_master_customer_bank_master_bank` (`bank_id`),
  CONSTRAINT `FK_master_customer_bank_master_bank` FOREIGN KEY (`bank_id`) REFERENCES `master_bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_master_customer_bank_master_customer` FOREIGN KEY (`customer_id`) REFERENCES `master_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_customer_bank: ~0 rows (approximately)
DELETE FROM `master_customer_bank`;

-- Dumping structure for table gexportdb.master_customer_coding
DROP TABLE IF EXISTS `master_customer_coding`;
CREATE TABLE IF NOT EXISTS `master_customer_coding` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `customer_id` tinyint(4) NOT NULL,
  `sachet_company` varchar(100) NOT NULL,
  `sachet_city` varchar(250) NOT NULL,
  `sachet_postal` varchar(10) NOT NULL,
  `sachet_hotline` varchar(20) NOT NULL,
  `sachet_best_before` date NOT NULL,
  `sachet_batch` varchar(50) NOT NULL,
  `pouch_company` varchar(100) NOT NULL,
  `pouch_city` varchar(250) NOT NULL,
  `pouch_postal` varchar(10) NOT NULL,
  `pouch_hotline` varchar(20) NOT NULL,
  `pouch_best_before` date NOT NULL,
  `pouch_batch` varchar(50) NOT NULL,
  `case_company` varchar(100) NOT NULL,
  `case_city` varchar(250) NOT NULL,
  `case_postal` varchar(10) NOT NULL,
  `case_hotline` varchar(20) NOT NULL,
  `case_best_before` date NOT NULL,
  `case_batch` varchar(50) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_master_customer_coding_master_customer` (`customer_id`),
  CONSTRAINT `FK_master_customer_coding_master_customer` FOREIGN KEY (`customer_id`) REFERENCES `master_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_customer_coding: ~0 rows (approximately)
DELETE FROM `master_customer_coding`;

-- Dumping structure for table gexportdb.master_customer_contact_person
DROP TABLE IF EXISTS `master_customer_contact_person`;
CREATE TABLE IF NOT EXISTS `master_customer_contact_person` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `customer_id` tinyint(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `top_id` tinyint(4) NOT NULL,
  `dp` decimal(3,0) NOT NULL DEFAULT 0,
  `balancing` double(3,0) NOT NULL DEFAULT 0,
  `currency_id` tinyint(4) NOT NULL,
  `incoterm_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_master_customer_contact_person_master_customer` (`customer_id`),
  KEY `FK_master_customer_contact_person_master_top` (`top_id`),
  KEY `FK_master_customer_contact_person_master_currency` (`currency_id`),
  KEY `FK_master_customer_contact_person_master_incoterm` (`incoterm_id`),
  CONSTRAINT `FK_master_customer_contact_person_master_currency` FOREIGN KEY (`currency_id`) REFERENCES `master_currency` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_master_customer_contact_person_master_customer` FOREIGN KEY (`customer_id`) REFERENCES `master_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_master_customer_contact_person_master_incoterm` FOREIGN KEY (`incoterm_id`) REFERENCES `master_incoterm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_master_customer_contact_person_master_top` FOREIGN KEY (`top_id`) REFERENCES `master_top` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_customer_contact_person: ~0 rows (approximately)
DELETE FROM `master_customer_contact_person`;

-- Dumping structure for table gexportdb.master_customer_contact_person_ship
DROP TABLE IF EXISTS `master_customer_contact_person_ship`;
CREATE TABLE IF NOT EXISTS `master_customer_contact_person_ship` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `customer_id` tinyint(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_master_customer_contact_person_ship_master_customer` (`customer_id`),
  CONSTRAINT `FK_master_customer_contact_person_ship_master_customer` FOREIGN KEY (`customer_id`) REFERENCES `master_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_customer_contact_person_ship: ~0 rows (approximately)
DELETE FROM `master_customer_contact_person_ship`;

-- Dumping structure for table gexportdb.master_customer_import_doc
DROP TABLE IF EXISTS `master_customer_import_doc`;
CREATE TABLE IF NOT EXISTS `master_customer_import_doc` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `customer_id` tinyint(4) NOT NULL,
  `bill_of_ladding` tinyint(4) NOT NULL,
  `packing_list` tinyint(4) NOT NULL,
  `invoice` tinyint(4) NOT NULL,
  `invoice_uv` tinyint(4) NOT NULL,
  `coo` tinyint(4) NOT NULL,
  `health_certificate` tinyint(4) NOT NULL,
  `material_savety` tinyint(4) NOT NULL,
  `coa` tinyint(4) NOT NULL,
  `product_spec` tinyint(4) NOT NULL,
  `qcertificate` tinyint(4) NOT NULL,
  `others` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `FK_master_customer_import_doc_master_customer` (`customer_id`),
  CONSTRAINT `FK_master_customer_import_doc_master_customer` FOREIGN KEY (`customer_id`) REFERENCES `master_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_customer_import_doc: ~0 rows (approximately)
DELETE FROM `master_customer_import_doc`;

-- Dumping structure for table gexportdb.master_customer_notify
DROP TABLE IF EXISTS `master_customer_notify`;
CREATE TABLE IF NOT EXISTS `master_customer_notify` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `customer_id` tinyint(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  `phone_no_tel` varchar(20) NOT NULL,
  `phone_no_fax` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_master_customer_notify_master_customer` (`customer_id`),
  KEY `FK_master_customer_notify_master_country` (`country_id`),
  CONSTRAINT `FK_master_customer_notify_master_country` FOREIGN KEY (`country_id`) REFERENCES `master_country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_master_customer_notify_master_customer` FOREIGN KEY (`customer_id`) REFERENCES `master_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_customer_notify: ~2 rows (approximately)
DELETE FROM `master_customer_notify`;

-- Dumping structure for table gexportdb.master_customer_ship
DROP TABLE IF EXISTS `master_customer_ship`;
CREATE TABLE IF NOT EXISTS `master_customer_ship` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `customer_id` tinyint(4) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_master_customer_ship_address_master_customer` (`customer_id`),
  KEY `FK_master_customer_ship_address_master_country` (`country_id`),
  CONSTRAINT `FK_master_customer_ship_address_master_country` FOREIGN KEY (`country_id`) REFERENCES `master_country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_master_customer_ship_address_master_customer` FOREIGN KEY (`customer_id`) REFERENCES `master_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_customer_ship: ~0 rows (approximately)
DELETE FROM `master_customer_ship`;

-- Dumping structure for table gexportdb.master_customer_ship_detail
DROP TABLE IF EXISTS `master_customer_ship_detail`;
CREATE TABLE IF NOT EXISTS `master_customer_ship_detail` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `ship_detail_id` tinyint(4) NOT NULL,
  `discharge` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_master_customer_ship_detail_master_customer_ship` (`ship_detail_id`),
  CONSTRAINT `FK_master_customer_ship_detail_master_customer_ship` FOREIGN KEY (`ship_detail_id`) REFERENCES `master_customer_ship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gexportdb.master_customer_ship_detail: ~0 rows (approximately)
DELETE FROM `master_customer_ship_detail`;

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
	`swift_code` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`account_no` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`account_name` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
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

-- Dumping structure for view gexportdb.view_master_customer
DROP VIEW IF EXISTS `view_master_customer`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_master_customer` (
	`id` TINYINT(4) NOT NULL,
	`code` VARCHAR(12) NOT NULL COMMENT 'Format: 8801+CountryCode+Running Number 4 Digit' COLLATE 'latin1_swedish_ci',
	`name` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`address` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`country_id` TINYINT(4) NOT NULL,
	`town` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`phone_no_tel` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
	`phone_no_fax` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
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

-- Dumping structure for view gexportdb.view_master_customer
DROP VIEW IF EXISTS `view_master_customer`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_master_customer`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_master_customer` AS SELECT
	a.*, d.name country_name,
	b.fullname creator_name, c.fullname updated_name,
	IF(a.is_deleted = '0', 'Active', 'Non active') is_active,
	IF(a.is_deleted = '0', '<i class="fas fa-toggle-off"></i>', '<i class="fas fa-toggle-on"></i>') flags
FROM master_customer a
JOIN gportaldb.`master_user` b ON a.created_by = b.id
LEFT JOIN gportaldb.`master_user` c ON a.updated_by = c.id
JOIN master_country d ON a.country_id = d.id ;

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
