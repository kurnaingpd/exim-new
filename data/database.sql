-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for gpd_gexp
DROP DATABASE IF EXISTS `gpd_gexp`;
CREATE DATABASE IF NOT EXISTS `gpd_gexp` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `gpd_gexp`;

-- Dumping structure for table gpd_gexp.gexp_assign_menu
DROP TABLE IF EXISTS `gexp_assign_menu`;
CREATE TABLE IF NOT EXISTS `gexp_assign_menu` (
  `AssignId` int(11) NOT NULL AUTO_INCREMENT,
  `AssignRoleGroup` int(11) DEFAULT NULL COMMENT 'Menu Group',
  `AssignMenusId` int(11) DEFAULT NULL COMMENT 'Menu Id',
  `AssignWrite` int(11) DEFAULT NULL COMMENT '1=Acc 2=Deny',
  `AssignEdit` int(11) DEFAULT NULL COMMENT '1=Acc 2=Deny',
  `AssignDelete` int(11) DEFAULT NULL COMMENT '1=Acc 2=Deny',
  `AssignStats` int(11) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `UpdateAt` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`AssignId`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_assign_menu: ~63 rows (approximately)
DELETE FROM `gexp_assign_menu`;
INSERT INTO `gexp_assign_menu` (`AssignId`, `AssignRoleGroup`, `AssignMenusId`, `AssignWrite`, `AssignEdit`, `AssignDelete`, `AssignStats`, `CreatedAt`, `CreatedBy`, `UpdateAt`, `UpdateBy`) VALUES
	(1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(2, 1, 2, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(3, 1, 7, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(5, 1, 18, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(6, 1, 19, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(7, 1, 20, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(8, 1, 21, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(9, 1, 22, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(10, 1, 23, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(11, 1, 24, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(12, 1, 25, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(13, 1, 26, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(14, 1, 27, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(15, 1, 28, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(16, 1, 29, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(17, 21, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(18, 21, 30, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(19, 22, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(20, 22, 31, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(21, 20, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(22, 20, 18, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(23, 20, 32, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(24, 23, 20, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(25, 25, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(26, 25, 21, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(27, 21, 22, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(28, 26, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(29, 26, 23, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(30, 20, 29, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(31, 21, 29, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(32, 22, 29, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(33, 23, 29, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(34, 25, 29, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(35, 26, 29, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(36, 26, 24, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(37, 26, 33, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(38, 26, 26, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(39, 1, 34, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(40, 1, 35, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(41, 1, 36, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(42, 1, 37, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(43, 26, 29, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(44, 24, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(45, 24, 42, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(46, 24, 29, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(47, 21, 43, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(48, 20, 0, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(49, 20, 17, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(50, 20, 7, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(51, 20, 43, 1, 1, 1, 2, NULL, NULL, NULL, NULL),
	(52, 21, 44, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(53, 20, 45, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(54, 0, 0, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(55, 26, 46, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(56, 20, 46, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(57, 21, 46, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(58, 1, 46, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(59, 22, 46, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(60, 23, 46, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(61, 24, 46, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(62, 25, 46, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(63, 0, 0, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(64, 24, 45, 1, 1, 1, 1, NULL, NULL, NULL, NULL);

-- Dumping structure for table gpd_gexp.gexp_bank_cust
DROP TABLE IF EXISTS `gexp_bank_cust`;
CREATE TABLE IF NOT EXISTS `gexp_bank_cust` (
  `BankCustId` int(11) NOT NULL AUTO_INCREMENT,
  `CustCodeId` varchar(255) DEFAULT NULL,
  `BankCustAccountName` varchar(255) DEFAULT NULL,
  `BankCustAccountNo` varchar(255) DEFAULT NULL,
  `BankCustName` varchar(255) DEFAULT NULL,
  `BankCustBranch` varchar(255) DEFAULT NULL,
  `BankCustAddress` varchar(255) DEFAULT NULL,
  `BankCustSwiftCode` varchar(255) DEFAULT NULL,
  `BankCustCode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`BankCustId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_bank_cust: ~1 rows (approximately)
DELETE FROM `gexp_bank_cust`;
INSERT INTO `gexp_bank_cust` (`BankCustId`, `CustCodeId`, `BankCustAccountName`, `BankCustAccountNo`, `BankCustName`, `BankCustBranch`, `BankCustAddress`, `BankCustSwiftCode`, `BankCustCode`) VALUES
	(1, '1', 'LLP "B3 group"', 'KZ6896502F0012782447', 'АО «ForteBank»', 'NUR SULTAN', '010000, KAZAKHSTAN, G. NUR-SULTAN, R-N ESIL, UL. B', 'IRTYKZKA', '-');

-- Dumping structure for table gpd_gexp.gexp_coa_detail
DROP TABLE IF EXISTS `gexp_coa_detail`;
CREATE TABLE IF NOT EXISTS `gexp_coa_detail` (
  `detail_coa_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_coa_head` int(11) DEFAULT NULL,
  `detail_coa_itemid` int(11) DEFAULT NULL,
  `detail_coa_qcid` int(11) DEFAULT NULL,
  `detail_coa_prodname` varchar(255) DEFAULT NULL,
  `detail_coa_batch` varchar(255) DEFAULT NULL,
  `detail_coa_qc_proddate` varchar(255) DEFAULT NULL,
  `Mercury` varchar(255) DEFAULT NULL,
  `Lead` varchar(255) DEFAULT NULL,
  `Cadmium` varchar(255) DEFAULT NULL,
  `Tin` varchar(255) DEFAULT NULL,
  `Arsenic` varchar(255) DEFAULT NULL,
  `detail_createdAt` datetime DEFAULT NULL,
  `detail_createdBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`detail_coa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_coa_detail: ~4 rows (approximately)
DELETE FROM `gexp_coa_detail`;
INSERT INTO `gexp_coa_detail` (`detail_coa_id`, `detail_coa_head`, `detail_coa_itemid`, `detail_coa_qcid`, `detail_coa_prodname`, `detail_coa_batch`, `detail_coa_qc_proddate`, `Mercury`, `Lead`, `Cadmium`, `Tin`, `Arsenic`, `detail_createdAt`, `detail_createdBy`) VALUES
	(1, 1, 2, 1, NULL, '1123', '1', 'not detected', 'not detected', 'not detected', 'not detected', 'not detected', '2022-07-21 11:55:14', 10),
	(2, 1, 2, 1, NULL, '1123', '1', 'Not Detected', 'Not Detected', 'Not Detected', 'Not Detected', 'Not Detected', '2022-07-21 14:14:36', 10),
	(3, 1, 2, 1, NULL, '1123', '1', 'Not Detected', 'Not Detected', 'Not Detected', 'Not Detected', 'Not Detected', '2022-07-21 14:30:14', 10),
	(4, 1, 2, 2, NULL, '1023', '2', 'Not Detected', 'Not Detected', 'Not Detected', 'Not Detected', 'Not Detected', '2022-07-21 14:32:43', 10);

-- Dumping structure for table gpd_gexp.gexp_coa_signpi
DROP TABLE IF EXISTS `gexp_coa_signpi`;
CREATE TABLE IF NOT EXISTS `gexp_coa_signpi` (
  `coa_detsign_id` int(11) NOT NULL AUTO_INCREMENT,
  `sign_id_pi` int(11) DEFAULT NULL,
  `coa_detsign_date` date DEFAULT NULL,
  `coa_detsign_path` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`coa_detsign_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_coa_signpi: ~1 rows (approximately)
DELETE FROM `gexp_coa_signpi`;
INSERT INTO `gexp_coa_signpi` (`coa_detsign_id`, `sign_id_pi`, `coa_detsign_date`, `coa_detsign_path`, `createdAt`, `createdBy`) VALUES
	(1, 1, '2022-07-21', 'COA-KAZ.pdf', '2022-07-21 13:10:06', 10);

-- Dumping structure for table gpd_gexp.gexp_codingprint_cust
DROP TABLE IF EXISTS `gexp_codingprint_cust`;
CREATE TABLE IF NOT EXISTS `gexp_codingprint_cust` (
  `CodingPrintId` int(11) NOT NULL AUTO_INCREMENT,
  `CodeCustId` varchar(255) DEFAULT NULL,
  `SacImportby` varchar(255) DEFAULT NULL,
  `SacHotline` varchar(255) DEFAULT NULL,
  `SacBestBefore` varchar(255) DEFAULT NULL,
  `PchImportby` varchar(255) DEFAULT NULL,
  `PchHotline` varchar(255) DEFAULT NULL,
  `PchBestBefore` varchar(255) DEFAULT NULL,
  `CasImportby` varchar(255) DEFAULT NULL,
  `CasHotline` varchar(255) DEFAULT NULL,
  `CasBestBefore` varchar(255) DEFAULT NULL,
  `TambahanIsi_carton` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CodingPrintId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_codingprint_cust: ~0 rows (approximately)
DELETE FROM `gexp_codingprint_cust`;

-- Dumping structure for table gpd_gexp.gexp_contact_cust
DROP TABLE IF EXISTS `gexp_contact_cust`;
CREATE TABLE IF NOT EXISTS `gexp_contact_cust` (
  `CtId` int(11) NOT NULL AUTO_INCREMENT,
  `CtTicketCustCode` varchar(255) DEFAULT NULL,
  `CtName` varchar(255) DEFAULT NULL,
  `CtPhone` varchar(255) DEFAULT NULL,
  `CtEmail` varchar(255) DEFAULT NULL,
  `CtTOP` int(11) DEFAULT NULL,
  `CtDp` varchar(255) DEFAULT NULL,
  `CtBalancing` varchar(255) DEFAULT NULL,
  `CtCurrency` varchar(255) DEFAULT NULL,
  `CtIncoterm` int(11) DEFAULT NULL,
  PRIMARY KEY (`CtId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_contact_cust: ~1 rows (approximately)
DELETE FROM `gexp_contact_cust`;
INSERT INTO `gexp_contact_cust` (`CtId`, `CtTicketCustCode`, `CtName`, `CtPhone`, `CtEmail`, `CtTOP`, `CtDp`, `CtBalancing`, `CtCurrency`, `CtIncoterm`) VALUES
	(1, '1', 'Yerkanat Ussenov', '+7777 207 7373', 'Erkanat.ussen81@gmail.com', 8, '30', '70', 'USD', 3);

-- Dumping structure for table gpd_gexp.gexp_currency
DROP TABLE IF EXISTS `gexp_currency`;
CREATE TABLE IF NOT EXISTS `gexp_currency` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `icon` varchar(5) NOT NULL,
  `is_deleted` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1 = Yes; 0 = No;',
  `spell` varchar(50) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `icon` (`icon`) USING BTREE,
  UNIQUE KEY `code` (`code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table gpd_gexp.gexp_currency: ~3 rows (approximately)
DELETE FROM `gexp_currency`;
INSERT INTO `gexp_currency` (`id`, `code`, `name`, `icon`, `is_deleted`, `spell`) VALUES
	(1, 'IDR', 'Rupiah', 'Rp', '0', 'Rupiah'),
	(2, 'CNY', 'Renminbi', '¥', '0', 'Yuan'),
	(3, 'USD', 'United States Dollar', '$', '0', 'Dollar');

-- Dumping structure for view gpd_gexp.gexp_email_list
DROP VIEW IF EXISTS `gexp_email_list`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `gexp_email_list` (
	`id` INT(11) NOT NULL,
	`email` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for table gpd_gexp.gexp_freight_cust
DROP TABLE IF EXISTS `gexp_freight_cust`;
CREATE TABLE IF NOT EXISTS `gexp_freight_cust` (
  `freightid` int(11) NOT NULL AUTO_INCREMENT,
  `freightcust_id` int(11) DEFAULT NULL,
  `freight_company` varchar(255) DEFAULT NULL,
  `freight_company_contact` varchar(255) DEFAULT NULL,
  `freight_company_number` varchar(255) DEFAULT NULL,
  `freight_createdAt` datetime DEFAULT NULL,
  `freight_createdBy` int(11) DEFAULT NULL,
  `freight_updatedAt` datetime DEFAULT NULL,
  `freight_updatedBy` int(11) DEFAULT NULL,
  `freight_status` int(11) DEFAULT 1,
  PRIMARY KEY (`freightid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_freight_cust: ~0 rows (approximately)
DELETE FROM `gexp_freight_cust`;

-- Dumping structure for table gpd_gexp.gexp_importdoc_cust
DROP TABLE IF EXISTS `gexp_importdoc_cust`;
CREATE TABLE IF NOT EXISTS `gexp_importdoc_cust` (
  `ImportdocId` int(11) NOT NULL AUTO_INCREMENT,
  `CustCodeId` varchar(255) DEFAULT NULL,
  `BillOfLadding` varchar(255) DEFAULT NULL,
  `PackingList` varchar(255) DEFAULT NULL,
  `InvoiceA` varchar(255) DEFAULT NULL,
  `InvoiceUV` varchar(255) DEFAULT NULL,
  `COO` varchar(255) DEFAULT NULL,
  `HealthCert` varchar(255) DEFAULT NULL,
  `MaterialSafety` varchar(255) DEFAULT NULL,
  `COA` varchar(255) DEFAULT NULL,
  `ProductSpec` varchar(255) DEFAULT NULL,
  `OthersAdd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ImportdocId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_importdoc_cust: ~1 rows (approximately)
DELETE FROM `gexp_importdoc_cust`;
INSERT INTO `gexp_importdoc_cust` (`ImportdocId`, `CustCodeId`, `BillOfLadding`, `PackingList`, `InvoiceA`, `InvoiceUV`, `COO`, `HealthCert`, `MaterialSafety`, `COA`, `ProductSpec`, `OthersAdd`) VALUES
	(1, '1', 'Send Original Doc', 'Send Original Doc', 'Send Original Doc', 'Not Include', 'Send Original Doc', 'Send Original Doc', 'Not Include', 'Send Original Doc', 'Send Original Doc', 'QUALITY CERTIFICATE');

-- Dumping structure for table gpd_gexp.gexp_invoice_print
DROP TABLE IF EXISTS `gexp_invoice_print`;
CREATE TABLE IF NOT EXISTS `gexp_invoice_print` (
  `inv_print_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Preview On Print',
  `inv_print_no` varchar(255) DEFAULT NULL,
  `inv_print_carton_barcode` int(11) DEFAULT 1 COMMENT '1=Ya 2=Tidak',
  `inv_print_batch` int(11) DEFAULT 1,
  `inv_print_expired_date` int(11) DEFAULT 1,
  `inv_print_production_date` int(11) DEFAULT 1,
  PRIMARY KEY (`inv_print_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_invoice_print: ~1 rows (approximately)
DELETE FROM `gexp_invoice_print`;
INSERT INTO `gexp_invoice_print` (`inv_print_id`, `inv_print_no`, `inv_print_carton_barcode`, `inv_print_batch`, `inv_print_expired_date`, `inv_print_production_date`) VALUES
	(1, '0001/SKP-EXP/INV/07/2022', 1, NULL, NULL, NULL);

-- Dumping structure for table gpd_gexp.gexp_item_mapping
DROP TABLE IF EXISTS `gexp_item_mapping`;
CREATE TABLE IF NOT EXISTS `gexp_item_mapping` (
  `gexp_item_map_id` int(11) NOT NULL AUTO_INCREMENT,
  `gexp_item_id` int(11) DEFAULT NULL,
  `gexp_country_id` int(11) DEFAULT NULL,
  `gexp_item_map_status` int(11) DEFAULT 1,
  `gexp_item_map_createdAt` datetime DEFAULT NULL,
  `gexp_item_map_createdBy` int(11) DEFAULT NULL,
  `gexp_item_map_updateAt` datetime DEFAULT NULL,
  `gexp_item_map_updateBy` int(11) DEFAULT NULL,
  `gexp_item_map_lastupdate` datetime DEFAULT NULL,
  PRIMARY KEY (`gexp_item_map_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_item_mapping: ~0 rows (approximately)
DELETE FROM `gexp_item_mapping`;

-- Dumping structure for table gpd_gexp.gexp_master_bank
DROP TABLE IF EXISTS `gexp_master_bank`;
CREATE TABLE IF NOT EXISTS `gexp_master_bank` (
  `BankId` int(11) NOT NULL AUTO_INCREMENT,
  `BankCode` varchar(255) DEFAULT NULL,
  `BankName` varchar(255) DEFAULT NULL,
  `BankOffice` varchar(255) DEFAULT NULL,
  `BankDesc` varchar(255) DEFAULT NULL,
  `BankAccount` varchar(255) DEFAULT NULL,
  `BankSwiftCode` varchar(255) DEFAULT NULL,
  `BankStats` int(11) DEFAULT NULL COMMENT '1=Active 2=Inactive',
  `CreatedAt` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `UpdateAt` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`BankId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_bank: ~1 rows (approximately)
DELETE FROM `gexp_master_bank`;
INSERT INTO `gexp_master_bank` (`BankId`, `BankCode`, `BankName`, `BankOffice`, `BankDesc`, `BankAccount`, `BankSwiftCode`, `BankStats`, `CreatedAt`, `CreatedBy`, `UpdateAt`, `UpdateBy`) VALUES
	(1, '01', 'DBS INDONESIA', 'DBS BANK TOWER BRANCH', 'JL. PROF. DR. SATRIO KAV 3-5, CIPUTRA WORLD JAKARTA 12940', '3220119139', 'dbsbidja', 1, '2022-06-15 14:09:03', 1, NULL, NULL);

-- Dumping structure for table gpd_gexp.gexp_master_beneficiary
DROP TABLE IF EXISTS `gexp_master_beneficiary`;
CREATE TABLE IF NOT EXISTS `gexp_master_beneficiary` (
  `BeneficiaryId` int(11) NOT NULL AUTO_INCREMENT,
  `BeneficiaryDesc` varchar(255) DEFAULT NULL,
  `BeneficiaryOffice` varchar(255) DEFAULT NULL,
  `BeneficiaryAddr` varchar(255) DEFAULT NULL,
  `BeneficiaryCountry` int(11) DEFAULT NULL,
  `BeneficiaryCP` varchar(255) DEFAULT NULL,
  `BeneficiaryPhone` varchar(100) DEFAULT NULL,
  `BeneficiaryStats` int(11) DEFAULT NULL COMMENT '1=Active 2=Inactive',
  `CreatedAt` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `UpdateAt` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`BeneficiaryId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_beneficiary: ~1 rows (approximately)
DELETE FROM `gexp_master_beneficiary`;
INSERT INTO `gexp_master_beneficiary` (`BeneficiaryId`, `BeneficiaryDesc`, `BeneficiaryOffice`, `BeneficiaryAddr`, `BeneficiaryCountry`, `BeneficiaryCP`, `BeneficiaryPhone`, `BeneficiaryStats`, `CreatedAt`, `CreatedBy`, `UpdateAt`, `UpdateBy`) VALUES
	(1, 'PT. SUMBER KOPI PRIMA', ' JL. LINGKAR TIMUR', 'LORAM WETAN, JATI,  KAB. KUDUS, JAWA TENGAH, 59344', 9, 'EVI SUSANTI', '-', 1, '2022-06-15 14:03:30', 1, '2022-06-15 14:04:02', 1);

-- Dumping structure for table gpd_gexp.gexp_master_coa
DROP TABLE IF EXISTS `gexp_master_coa`;
CREATE TABLE IF NOT EXISTS `gexp_master_coa` (
  `gexp_coa_id` int(11) NOT NULL AUTO_INCREMENT,
  `gexp_coa_no` varchar(255) DEFAULT NULL,
  `gexp_coa_date` date DEFAULT NULL,
  `gexp_coa_invoice` int(11) DEFAULT NULL,
  `gexp_coa_product_name` varchar(255) DEFAULT NULL,
  `gexp_coa_product_date` date DEFAULT NULL,
  `gexp_coa_month` varchar(255) DEFAULT NULL,
  `gexp_coa_years` varchar(255) DEFAULT NULL,
  `gexp_coa_createdAt` datetime DEFAULT NULL,
  `gexp_coa_createdBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`gexp_coa_id`),
  UNIQUE KEY `gexp_coa_no` (`gexp_coa_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_coa: ~1 rows (approximately)
DELETE FROM `gexp_master_coa`;
INSERT INTO `gexp_master_coa` (`gexp_coa_id`, `gexp_coa_no`, `gexp_coa_date`, `gexp_coa_invoice`, `gexp_coa_product_name`, `gexp_coa_product_date`, `gexp_coa_month`, `gexp_coa_years`, `gexp_coa_createdAt`, `gexp_coa_createdBy`) VALUES
	(1, '0001/07/2022/KAZ', '2022-07-18', 1, NULL, NULL, NULL, '2022', '2022-07-18 10:07:21', 10);

-- Dumping structure for table gpd_gexp.gexp_master_container
DROP TABLE IF EXISTS `gexp_master_container`;
CREATE TABLE IF NOT EXISTS `gexp_master_container` (
  `ContainerId` int(11) NOT NULL AUTO_INCREMENT,
  `ContainerDesc` varchar(255) DEFAULT NULL,
  `ContainerStats` int(11) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `UpdateAt` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `MaxCBM` int(11) DEFAULT NULL,
  PRIMARY KEY (`ContainerId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_container: ~3 rows (approximately)
DELETE FROM `gexp_master_container`;
INSERT INTO `gexp_master_container` (`ContainerId`, `ContainerDesc`, `ContainerStats`, `CreatedAt`, `CreatedBy`, `UpdateAt`, `UpdateBy`, `MaxCBM`) VALUES
	(2, '20 FT', 1, NULL, NULL, NULL, NULL, 33),
	(3, '40 FT', 1, NULL, NULL, NULL, NULL, 67),
	(4, '40 HC', 1, NULL, NULL, NULL, NULL, 75);

-- Dumping structure for table gpd_gexp.gexp_master_country
DROP TABLE IF EXISTS `gexp_master_country`;
CREATE TABLE IF NOT EXISTS `gexp_master_country` (
  `CountryId` int(11) NOT NULL AUTO_INCREMENT,
  `CountryCode` varchar(255) DEFAULT NULL,
  `CountryName` varchar(255) DEFAULT NULL,
  `CountryStats` varchar(255) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `UpdateAt` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`CountryId`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_country: ~28 rows (approximately)
DELETE FROM `gexp_master_country`;
INSERT INTO `gexp_master_country` (`CountryId`, `CountryCode`, `CountryName`, `CountryStats`, `CreatedAt`, `CreatedBy`, `UpdateAt`, `UpdateBy`) VALUES
	(3, 'KHM', 'CAMBODIA', '1', NULL, NULL, NULL, NULL),
	(4, 'CAN', 'CANADA', '1', NULL, NULL, NULL, NULL),
	(5, 'CHN', 'CHINA', '1', NULL, NULL, NULL, NULL),
	(6, 'DOM', 'DOMINICAN REPUBLIC', '1', NULL, NULL, NULL, NULL),
	(7, 'ETH', 'ETHIOPIA', '1', NULL, NULL, NULL, NULL),
	(8, 'FRA', 'FRANCE', '1', NULL, NULL, NULL, NULL),
	(9, 'IDN', 'INDONESIA', '1', NULL, NULL, NULL, NULL),
	(10, 'JPN', 'JEPANG', '1', NULL, NULL, NULL, NULL),
	(11, 'POL', 'POLANDIA', '1', NULL, NULL, NULL, NULL),
	(12, 'MYS', 'MALAYSIA', '1', NULL, NULL, NULL, NULL),
	(13, 'USA', 'UNITED STATES', '1', NULL, NULL, NULL, NULL),
	(14, 'LBN', 'LEBANON', '1', NULL, NULL, NULL, NULL),
	(18, 'AZE', 'AZERBAIJAN', '1', '2022-05-24 12:17:37', 1, NULL, NULL),
	(19, 'ZAF', 'SOUTH AFRICA', '1', '2022-06-15 13:27:00', 1, NULL, NULL),
	(20, 'JOR', 'JORDAN', '1', '2022-06-15 13:27:42', 1, NULL, NULL),
	(21, 'BRN', 'BRUNEI DARUSSALAM', '1', '2022-06-15 13:28:23', 1, NULL, NULL),
	(22, 'QAT', 'QATAR', '1', '2022-06-15 13:28:56', 1, NULL, NULL),
	(23, 'KOR', 'REPUBLIC OF KOREA', '1', '2022-06-15 13:29:54', 1, NULL, NULL),
	(24, 'GEO', 'GEORGIA', '1', '2022-06-15 13:30:25', 1, NULL, NULL),
	(25, 'TLS', 'TIMOR LESTE', '1', '2022-06-15 13:32:13', 1, NULL, NULL),
	(26, 'DEU', 'GERMANY', '1', '2022-06-15 13:33:10', 1, NULL, NULL),
	(27, 'AUS', 'AUSTRALIA', '1', '2022-06-15 13:33:53', 1, NULL, NULL),
	(28, 'ITA', 'ITALY', '1', '2022-06-15 13:34:33', 1, NULL, NULL),
	(29, 'PHL', 'PHILIPPINES', '1', '2022-06-15 13:35:36', 1, NULL, NULL),
	(30, 'GRC', 'GREECE', '1', '2022-06-15 13:36:02', 1, NULL, NULL),
	(31, 'IRQ', 'IRAQ', '1', '2022-06-15 13:50:38', 1, NULL, NULL),
	(32, 'TWN', 'TAIWAN', '1', '2022-06-15 13:51:15', 1, '2022-06-15 13:52:29', 1),
	(33, 'KAZ', 'KAZAKHSTAN', '1', '2022-07-15 16:16:36', 1, NULL, NULL);

-- Dumping structure for table gpd_gexp.gexp_master_customer
DROP TABLE IF EXISTS `gexp_master_customer`;
CREATE TABLE IF NOT EXISTS `gexp_master_customer` (
  `CustId` int(11) NOT NULL AUTO_INCREMENT,
  `CustCode` varchar(255) DEFAULT NULL,
  `CustCompanyName` varchar(255) DEFAULT NULL,
  `CustTown` varchar(255) DEFAULT NULL,
  `CustAddress` varchar(255) DEFAULT NULL,
  `CustCountry` varchar(255) DEFAULT NULL,
  `CustPhone` varchar(255) DEFAULT NULL,
  `Cust_gen_Date` date DEFAULT NULL COMMENT 'auto_generated',
  `Cust_gen_Month` varchar(55) DEFAULT NULL COMMENT 'auto_generated',
  `Cust_gen_Year` varchar(100) DEFAULT NULL COMMENT 'auto_generated',
  `CreatedAt` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `isStatCust` int(11) DEFAULT NULL,
  `isApprove` int(11) DEFAULT NULL,
  PRIMARY KEY (`CustId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_customer: ~2 rows (approximately)
DELETE FROM `gexp_master_customer`;
INSERT INTO `gexp_master_customer` (`CustId`, `CustCode`, `CustCompanyName`, `CustTown`, `CustAddress`, `CustCountry`, `CustPhone`, `Cust_gen_Date`, `Cust_gen_Month`, `Cust_gen_Year`, `CreatedAt`, `CreatedBy`, `isStatCust`, `isApprove`) VALUES
	(1, '8801KAZ0001', 'B3 GROUP LLP', 'NUR SULTAN', 'Esil district, st. Bukhar Zhyrau, 36, apt. 98, Nur Sultan', '33', '+7777 207 7373', '2022-07-15', '07', '2022', NULL, NULL, 1, NULL),
	(2, '8801BRN0002', 'SHIV TRADING COMPANY', 'BANDAR SERI BEGAWAN', 'Spg. 1411-43-71, No. 5, Lot 39599, Kg. Tanjong Bunut, Mukim Kilanas,\r\nBF2920, Bandar Seri Begawan, Negara Brunei Darussalam.', '21', '+673 2662236', '2022-07-19', '07', '2022', NULL, NULL, 1, NULL);

-- Dumping structure for table gpd_gexp.gexp_master_expreq
DROP TABLE IF EXISTS `gexp_master_expreq`;
CREATE TABLE IF NOT EXISTS `gexp_master_expreq` (
  `gexp_expreq_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Gexp Export Required',
  `gexp_expreq_pi_id` int(11) DEFAULT NULL,
  `gexp_expreq_remark` varchar(255) DEFAULT NULL,
  `gexp_expreq_doc01` varchar(255) DEFAULT NULL,
  `gexp_expreq_doc02` varchar(255) DEFAULT NULL,
  `gexp_expreq_doc03` varchar(255) DEFAULT NULL,
  `gexp_expreq_date` varchar(50) DEFAULT NULL,
  `gexp_expreq_month` varchar(50) DEFAULT NULL,
  `gexp_expreq_years` year(4) DEFAULT NULL,
  `gexp_expreq_createdAt` datetime DEFAULT NULL,
  `gexp_expreq_createdBy` int(11) DEFAULT NULL,
  `gexp_expreq_statrows` int(11) DEFAULT NULL,
  `gexp_expreq_docval` int(11) DEFAULT NULL COMMENT '1 = Isi doc',
  `gexp_expreq_uploadby` int(11) DEFAULT NULL COMMENT 'Id Upload Doc',
  `gexp_expreq_statusDoc` int(11) DEFAULT 5 COMMENT '1 = Approved, 2=Void, 3=Waiting, 4=Revisi, 5=Draft',
  `gexp_expreq_confirm_id` int(11) DEFAULT NULL COMMENT 'Id Approved',
  `gexp_expreq_confirmedAt` datetime DEFAULT NULL COMMENT 'Confirm date',
  `gexp_expreq_isRevisi` int(11) DEFAULT NULL COMMENT '1=VRevisi',
  `gexp_expreq_ValRevisi` varchar(255) DEFAULT NULL,
  `gexp_expreq_DateRevisi` datetime DEFAULT NULL,
  PRIMARY KEY (`gexp_expreq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_expreq: ~1 rows (approximately)
DELETE FROM `gexp_master_expreq`;
INSERT INTO `gexp_master_expreq` (`gexp_expreq_id`, `gexp_expreq_pi_id`, `gexp_expreq_remark`, `gexp_expreq_doc01`, `gexp_expreq_doc02`, `gexp_expreq_doc03`, `gexp_expreq_date`, `gexp_expreq_month`, `gexp_expreq_years`, `gexp_expreq_createdAt`, `gexp_expreq_createdBy`, `gexp_expreq_statrows`, `gexp_expreq_docval`, `gexp_expreq_uploadby`, `gexp_expreq_statusDoc`, `gexp_expreq_confirm_id`, `gexp_expreq_confirmedAt`, `gexp_expreq_isRevisi`, `gexp_expreq_ValRevisi`, `gexp_expreq_DateRevisi`) VALUES
	(1, 1, '', 'Ketentuan_Kazakhstan_V2_3_(3_Hanger).pdf', NULL, NULL, '2022-07-15', '07', '2022', '2022-07-15 17:14:29', 21, 1, 1, 6, 1, 41, '2022-07-15 17:23:34', 2, NULL, NULL);

-- Dumping structure for table gpd_gexp.gexp_master_group
DROP TABLE IF EXISTS `gexp_master_group`;
CREATE TABLE IF NOT EXISTS `gexp_master_group` (
  `GroupId` int(11) NOT NULL AUTO_INCREMENT,
  `GroupDesc` varchar(255) DEFAULT NULL,
  `GroupVal` varchar(255) DEFAULT NULL,
  `GroupStats` int(11) DEFAULT 1,
  `CreatedAt` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `UpdateAt` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`GroupId`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_group: ~16 rows (approximately)
DELETE FROM `gexp_master_group`;
INSERT INTO `gexp_master_group` (`GroupId`, `GroupDesc`, `GroupVal`, `GroupStats`, `CreatedAt`, `CreatedBy`, `UpdateAt`, `UpdateBy`) VALUES
	(1, 'SUPER ADMIN', 'SUPERADMIN', 1, '2021-09-29 16:30:49', 0, NULL, NULL),
	(2, 'ADMIN', 'ADMIN', 1, NULL, 0, NULL, NULL),
	(3, 'EXPORT TEAM', 'EXPORTTEAM', 2, NULL, 0, NULL, NULL),
	(4, 'FACTORY TEAM', 'FACTORYTEAM', 2, NULL, 0, NULL, NULL),
	(16, 'SUPER START', 'SUPERSTART', 2, NULL, 0, NULL, NULL),
	(18, 'SUPER SEMAR', 'SUPERSEMAR', 2, NULL, 0, NULL, NULL),
	(19, 'SUPER STAR', 'SUPERSTAR', 2, NULL, 0, NULL, NULL),
	(20, 'SALES', 'SALES', 1, NULL, 0, NULL, NULL),
	(21, 'WAREHOUSE', 'WAREHOUSE', 1, NULL, 0, NULL, NULL),
	(22, 'PPIC', 'PPIC', 1, NULL, 0, NULL, NULL),
	(23, 'FINANCE', 'FINANCE', 1, NULL, 0, NULL, NULL),
	(24, 'PROCUREMENT', 'PROCUREMENT', 1, NULL, 0, NULL, NULL),
	(25, 'QC', 'QC', 1, NULL, 0, NULL, NULL),
	(26, 'QA', 'QA', 1, NULL, 0, NULL, NULL),
	(27, 'TEST GROUP 01', 'TESTGROUP01', 2, NULL, NULL, NULL, NULL),
	(28, 'TEST1', 'TEST1', 2, NULL, NULL, NULL, NULL);

-- Dumping structure for table gpd_gexp.gexp_master_icons
DROP TABLE IF EXISTS `gexp_master_icons`;
CREATE TABLE IF NOT EXISTS `gexp_master_icons` (
  `IconsId` int(11) NOT NULL AUTO_INCREMENT,
  `IconsDesc` varchar(255) DEFAULT NULL,
  `IconsStats` int(11) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`IconsId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_icons: ~5 rows (approximately)
DELETE FROM `gexp_master_icons`;
INSERT INTO `gexp_master_icons` (`IconsId`, `IconsDesc`, `IconsStats`, `CreatedAt`, `CreatedBy`) VALUES
	(1, 'fa fa-bell-o', 1, NULL, NULL),
	(2, 'fa fa-file-archive-o', 1, NULL, NULL),
	(3, 'fa fa-copy', 1, NULL, NULL),
	(4, 'fa fa-folder', 1, NULL, NULL),
	(5, 'fa fa-home', 1, NULL, NULL);

-- Dumping structure for table gpd_gexp.gexp_master_incoterm
DROP TABLE IF EXISTS `gexp_master_incoterm`;
CREATE TABLE IF NOT EXISTS `gexp_master_incoterm` (
  `IncotermId` int(11) NOT NULL AUTO_INCREMENT,
  `IncotermCode` varchar(100) DEFAULT NULL,
  `IncotermDesc` varchar(255) DEFAULT NULL,
  `IncotermStats` int(10) DEFAULT NULL,
  PRIMARY KEY (`IncotermId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_incoterm: ~11 rows (approximately)
DELETE FROM `gexp_master_incoterm`;
INSERT INTO `gexp_master_incoterm` (`IncotermId`, `IncotermCode`, `IncotermDesc`, `IncotermStats`) VALUES
	(1, 'FOB', 'FREE ON BOARD', 1),
	(2, 'CFR', 'COST AND FREIGHT', 1),
	(3, 'CIF', 'COST INSURANCE AND FREIGHT', 1),
	(5, 'EXW', 'EXWORKS', 1),
	(9, 'DDP', 'DELIVERED DUTY PAID', 1),
	(10, 'DAP', 'DELIVERED AT PLACE', 1),
	(11, 'FCA', 'FREE CARRIER', 1),
	(12, 'CPT', 'CARRIAGE PAID TO', 1),
	(13, 'CIP', 'CARRIAGE AND INSURANCE PAID TO', 1),
	(14, 'DAT', 'DELIVERY AT TERMINAL', 1),
	(15, 'FAS', 'FREE ALONGSIDE SHIP', 1);

-- Dumping structure for table gpd_gexp.gexp_master_invoice
DROP TABLE IF EXISTS `gexp_master_invoice`;
CREATE TABLE IF NOT EXISTS `gexp_master_invoice` (
  `gexp_invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `gexp_invoice_no` varchar(255) DEFAULT NULL,
  `gexp_invoice_pi` int(11) DEFAULT NULL,
  `gexp_invoice_ffrn` varchar(255) DEFAULT NULL,
  `gexp_invoice_date` date DEFAULT NULL,
  `gexp_invoice_month` varchar(50) DEFAULT NULL,
  `gexp_invoice_years` varchar(100) DEFAULT NULL,
  `gexp_invoice_statrows` int(11) DEFAULT NULL,
  `gexp_invoice_createdAt` datetime DEFAULT NULL,
  `gexp_invoice_createdBy` int(11) DEFAULT NULL,
  `gexp_invoice_isPL` int(11) DEFAULT NULL COMMENT '1=Ada',
  `gexp_invoice_isCoa` int(11) DEFAULT NULL COMMENT '1=Ada',
  `gexp_invoice_isProdspec` int(11) DEFAULT NULL COMMENT '1=Ada',
  `gexp_invoice_isQcert` int(11) DEFAULT NULL COMMENT '1=Ada',
  `gexp_invoice_isSpp` int(11) DEFAULT NULL COMMENT '1=Ada',
  PRIMARY KEY (`gexp_invoice_id`),
  UNIQUE KEY `gexp_invoice_no` (`gexp_invoice_no`),
  UNIQUE KEY `gexp_invoice_pi` (`gexp_invoice_pi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_invoice: ~1 rows (approximately)
DELETE FROM `gexp_master_invoice`;
INSERT INTO `gexp_master_invoice` (`gexp_invoice_id`, `gexp_invoice_no`, `gexp_invoice_pi`, `gexp_invoice_ffrn`, `gexp_invoice_date`, `gexp_invoice_month`, `gexp_invoice_years`, `gexp_invoice_statrows`, `gexp_invoice_createdAt`, `gexp_invoice_createdBy`, `gexp_invoice_isPL`, `gexp_invoice_isCoa`, `gexp_invoice_isProdspec`, `gexp_invoice_isQcert`, `gexp_invoice_isSpp`) VALUES
	(1, '0001/SKP-EXP/INV/07/2022', 1, '-', '2022-07-15', NULL, NULL, 1, '2022-07-15 17:32:43', 7, 1, NULL, NULL, NULL, NULL);

-- Dumping structure for table gpd_gexp.gexp_master_item
DROP TABLE IF EXISTS `gexp_master_item`;
CREATE TABLE IF NOT EXISTS `gexp_master_item` (
  `ItemId` int(11) NOT NULL AUTO_INCREMENT,
  `ItemCodeId` varchar(255) DEFAULT NULL,
  `ItemHsCode` varchar(255) DEFAULT NULL,
  `ItemBrandName` varchar(255) DEFAULT NULL,
  `ItemName` varchar(255) DEFAULT NULL,
  `ItemPackDesc` varchar(255) DEFAULT NULL,
  `ItemNetWeight` varchar(255) DEFAULT NULL,
  `ItemGrossWeight` varchar(255) DEFAULT NULL,
  `ItemDimension` varchar(255) DEFAULT NULL,
  `Length` varchar(255) DEFAULT NULL,
  `Width` varchar(255) DEFAULT NULL,
  `Height` varchar(255) DEFAULT NULL,
  `ItemStats` varchar(255) DEFAULT NULL COMMENT '1=Active 2=Inactive',
  `CreatedAt` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `UpdateAt` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`ItemId`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_item: ~18 rows (approximately)
DELETE FROM `gexp_master_item`;
INSERT INTO `gexp_master_item` (`ItemId`, `ItemCodeId`, `ItemHsCode`, `ItemBrandName`, `ItemName`, `ItemPackDesc`, `ItemNetWeight`, `ItemGrossWeight`, `ItemDimension`, `Length`, `Width`, `Height`, `ItemStats`, `CreatedAt`, `CreatedBy`, `UpdateAt`, `UpdateBy`) VALUES
	(4, '30000041', '2101.11.19', 'CAFFINO', 'CAFFINO COFFEE LATTE CLASSIC', '24 POUCH X 10 SACHET X 20GR', '4.80', '5.92', NULL, '505', '220', '267', '1', '2022-07-29 09:28:25', 21, NULL, NULL),
	(5, '30000042', '2101.11.19', 'CAFFINO', 'CAFFINO COFFEE LATTE HAZELNUT', '24 POUCH X 10 SACHET X 20GR', '4.80', '5.92', NULL, '505', '220', '267', '1', '2022-07-29 09:28:56', 21, NULL, NULL),
	(6, '30000043', '2101.11.19', 'CAFFINO', 'CAFFINO COFFEE LATTE MOCHA', '24 POUCH X 10 SACHET X 20GR', '4.80', '5.92', NULL, '505', '220', '267', '1', '2022-07-29 09:28:56', 21, NULL, NULL),
	(7, '30000046', '2101.11.19', 'CAFFINO', 'CAFFINO COFFEE LATTE CLASSIC', '24 ROLL X 10 SACHET X 20GR', '4.80', '5.57', NULL, '560', '190', '215', '1', '2022-07-29 09:28:56', 21, NULL, NULL),
	(8, '30000047', '2101.11.19', 'CAFFINO', 'CAFFINO COFFEE LATTE HAZELNUT', '24 ROLL X 10 SACHET X 20GR', '4.80', '5.57', NULL, '560', '190', '215', '1', '2022-07-29 09:28:56', 21, NULL, NULL),
	(9, '30000048', '2101.11.19', 'CAFFINO', 'CAFFINO COFFEE LATTE MOCHA', '24 ROLL X 10 SACHET X 20GR', '4.80', '5.57', NULL, '560', '190', '215', '1', '2022-07-29 09:28:56', 21, NULL, NULL),
	(10, '30000065', '2101.11.19', 'CAFFINO', 'CAFFINO 3IN1 STICKPACK CLASSIC', '12 POUCH X 30 SACHET X 20GR', '7.2', '8.40', NULL, '405', '320', '258', '1', '2022-07-29 09:28:56', 21, NULL, NULL),
	(11, '30000066', '2101.11.19', 'CAFFINO', 'CAFFINO 3IN1 STICKPACK HAZELNUT', '12 POUCH X 30 SACHET X 20GR', '7.2', '8.40', NULL, '405', '320', '258', '1', '2022-07-29 09:28:56', 21, NULL, NULL),
	(12, '30000072', '2101.11.19', 'CAFFINO', 'PAPATONK CAFFINO 3IN1 INSTANT COFFEE BOLD', '12 GUSSET X 15 SACHET X 30GR', '5.4', '6.81', NULL, '625', '321', '225', '1', '2022-07-29 09:28:56', 21, NULL, NULL),
	(13, '30000073', '2101.11.19', 'CAFFINO', 'PAPATONK CAFFINO 3IN1 INSTANT COFFEE BOLD', '36 FOLDING BOX X 6 SACHET X 30GR', '6.48', '8.91', NULL, '430', '375', '295', '1', '2022-07-29 09:28:56', 21, NULL, NULL),
	(14, '30000074', '2101.11.19', 'CAFFINO', 'CAFFINO CAPPUCCINO CLASSIC', '24 POUCH X 10 SACHET X 20GR', '4.80', '5.85', NULL, '505', '210', '267', '1', '2022-07-29 09:28:56', 21, NULL, NULL),
	(15, '30000075', '2101.11.19', 'CAFFINO', 'CAFFINO CAPPUCINNO HAZELNUT', '24 POUCH X 10 SACHET X 20GR', '4.80', '5.85', NULL, '505', '210', '267', '1', '2022-07-29 09:28:56', 21, NULL, NULL),
	(16, '30000076', '2101.11.19', 'CAFFINO', 'CAFFINO CAPPUCINNO MOCHA', '24 POUCH X 10 SACHET X 20GR', '4.80', '5.85', NULL, '505', '210', '267', '1', '2022-07-29 09:28:56', 21, NULL, NULL),
	(17, '30000105', '2101.11.19', 'CAFFINO', 'CAFFINO BOLD PREMIUM COFFEE LATTE ', '12 GUSSET X 15 SACHET X 27GR', '4.86', '7.61', NULL, '615', '330', '225', '1', '2022-07-29 09:28:56', 21, NULL, NULL),
	(18, '30000107', '0901.21.20', 'GADJAH', 'GADJAH GROUND COFFEE + SUGAR', '24 POUCH X 10 SACHET X 25GR', '6.00', '7.25', NULL, '510', '246', '295', '1', '2022-07-29 09:28:56', 21, NULL, NULL),
	(19, '30000109', '0901.21.20', 'GADJAH', 'GADJAH TWIN PACK', '24 POUCH X 20 SACHET X 7GR', '3.36', '4.65', NULL, '510', '246', '295', '1', '2022-07-29 09:28:56', 21, NULL, NULL),
	(20, '30000111', '0901.21.20', 'GADJAH', 'GADJAH GROUND COFFEE', '24 POUCH X 150GR', '3.6', '4.31', NULL, '464', '344', '139', '1', '2022-07-29 09:28:56', 21, NULL, NULL),
	(21, '30000134', '0901.21.20', 'GADJAH', 'GADJAH COFFEE BEAN', '24 BAG X 250GR', '6.00', '7.16', NULL, '575', '330', '160', '1', '2022-07-29 09:28:56', 21, NULL, NULL);

-- Dumping structure for table gpd_gexp.gexp_master_loadport
DROP TABLE IF EXISTS `gexp_master_loadport`;
CREATE TABLE IF NOT EXISTS `gexp_master_loadport` (
  `LoadPortId` int(11) NOT NULL AUTO_INCREMENT,
  `LoadPortDescId` varchar(255) DEFAULT NULL,
  `LoadPortDesc` varchar(255) DEFAULT NULL,
  `LoadPortStats` varchar(255) DEFAULT NULL COMMENT '1=Active 2=Inactive',
  `CreatedAt` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `UpdateAt` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`LoadPortId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_loadport: ~3 rows (approximately)
DELETE FROM `gexp_master_loadport`;
INSERT INTO `gexp_master_loadport` (`LoadPortId`, `LoadPortDescId`, `LoadPortDesc`, `LoadPortStats`, `CreatedAt`, `CreatedBy`, `UpdateAt`, `UpdateBy`) VALUES
	(1, 'JKT', 'JAKARTA', '1', '2022-06-15 14:10:17', 1, NULL, NULL),
	(2, 'SMG', 'SEMARANG', '1', '2022-06-15 14:10:28', 1, NULL, NULL),
	(3, 'SBY', 'SURABAYA', '1', '2022-06-15 14:10:39', 1, NULL, NULL);

-- Dumping structure for table gpd_gexp.gexp_master_packlist
DROP TABLE IF EXISTS `gexp_master_packlist`;
CREATE TABLE IF NOT EXISTS `gexp_master_packlist` (
  `gexp_packlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `gexp_packlist_invoice_id` int(11) DEFAULT NULL,
  `gexp_packlist_no` varchar(255) DEFAULT NULL,
  `gexp_packlist_container` varchar(255) DEFAULT NULL,
  `gexp_packlist_date` date DEFAULT NULL,
  `gexp_packlist_month` varchar(255) DEFAULT NULL,
  `gexp_packlist_years` year(4) DEFAULT NULL,
  `gexp_packlist_statrows` int(11) DEFAULT NULL,
  `gexp_packlist_createdAt` datetime DEFAULT NULL,
  `gexp_packlist_createdBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`gexp_packlist_id`),
  UNIQUE KEY `gexp_packlist_no` (`gexp_packlist_no`),
  UNIQUE KEY `gexp_packlist_invoice_id` (`gexp_packlist_invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_packlist: ~1 rows (approximately)
DELETE FROM `gexp_master_packlist`;
INSERT INTO `gexp_master_packlist` (`gexp_packlist_id`, `gexp_packlist_invoice_id`, `gexp_packlist_no`, `gexp_packlist_container`, `gexp_packlist_date`, `gexp_packlist_month`, `gexp_packlist_years`, `gexp_packlist_statrows`, `gexp_packlist_createdAt`, `gexp_packlist_createdBy`) VALUES
	(1, 1, '0001/SKP-EXT/PL/07/2022', '1', '2022-07-15', NULL, NULL, 1, '2022-07-15 17:36:20', 15);

-- Dumping structure for table gpd_gexp.gexp_master_pi
DROP TABLE IF EXISTS `gexp_master_pi`;
CREATE TABLE IF NOT EXISTS `gexp_master_pi` (
  `gexp_pi_id` int(11) NOT NULL AUTO_INCREMENT,
  `gexp_pi_no` varchar(255) DEFAULT NULL COMMENT 'No PI',
  `gexp_pi_po` varchar(255) DEFAULT NULL,
  `gexp_pi_customer` int(11) DEFAULT NULL,
  `gexp_pi_consignee_id` int(11) DEFAULT NULL,
  `gexp_pi_beneficiary_id` int(11) DEFAULT NULL,
  `gexp_pi_loadport_id` int(11) DEFAULT NULL,
  `gexp_pi_dischargeport_id` int(11) DEFAULT NULL,
  `gexp_pi_destinatport_id` int(11) DEFAULT NULL,
  `gexp_pi_container` int(11) DEFAULT NULL,
  `gexp_pi_number_container` varchar(255) DEFAULT NULL,
  `gexp_pi_freight_company` varchar(255) DEFAULT NULL,
  `gexp_pi_freight_compcontact` varchar(255) DEFAULT NULL,
  `gexp_pi_freight_compnumber` varchar(255) DEFAULT NULL,
  `gexp_pi_freight_cost` decimal(20,2) DEFAULT NULL,
  `gexp_pi_insurance` decimal(20,2) DEFAULT NULL,
  `gexp_pi_bank` int(11) DEFAULT NULL,
  `gexp_pi_currency` varchar(11) DEFAULT NULL,
  `gexp_pi_ppn` int(11) DEFAULT NULL,
  `gexp_pi_remark` text DEFAULT NULL COMMENT 'Update Remark By Approved',
  `gexp_pi_attachment01` varchar(255) DEFAULT NULL COMMENT 'Update By Approved',
  `gexp_pi_statrow` int(11) DEFAULT 1,
  `gexp_pi_week` varchar(50) DEFAULT NULL,
  `gexp_pi_date` date DEFAULT NULL COMMENT 'PI creation Date',
  `gexp_pi_month` varchar(10) DEFAULT NULL,
  `gexp_pi_years` varchar(50) DEFAULT NULL,
  `gexp_pi_statusPI` int(11) DEFAULT NULL COMMENT 'Status Doc By Void / Success',
  `gexp_pi_createdAt` datetime DEFAULT NULL,
  `gexp_pi_createdBy` int(11) DEFAULT NULL,
  `gexp_pi_updatedAt` datetime DEFAULT NULL,
  `gexp_pi_updatedBy` int(11) DEFAULT NULL,
  `gexp_pi_parentlogs` int(11) DEFAULT NULL,
  `gexp_pi_ApprovedBy` int(11) DEFAULT NULL,
  `gexp_pi_ApprovedAt` datetime DEFAULT NULL,
  `gexp_pi_isApproved` int(11) DEFAULT NULL COMMENT '1 Apabila sudah di appr',
  `gexp_pi_onSubmit` int(11) DEFAULT NULL COMMENT 'On submit PI By Sender',
  `gexp_pi_Submit_Date` datetime DEFAULT NULL COMMENT 'On submit PI By Sender',
  `gexp_pi_submit_by` int(11) DEFAULT NULL,
  `gexp_pi_isExpreq` int(11) DEFAULT NULL COMMENT 'Butuh Approved Doc',
  `gexp_pi_Expreq_path` varchar(255) DEFAULT NULL,
  `gexp_pi_Expreq_isUpload` int(11) DEFAULT NULL,
  `gexp_pi_Expreq_UpTime` datetime DEFAULT NULL,
  PRIMARY KEY (`gexp_pi_id`),
  UNIQUE KEY `gexp_pi_no` (`gexp_pi_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_pi: ~1 rows (approximately)
DELETE FROM `gexp_master_pi`;
INSERT INTO `gexp_master_pi` (`gexp_pi_id`, `gexp_pi_no`, `gexp_pi_po`, `gexp_pi_customer`, `gexp_pi_consignee_id`, `gexp_pi_beneficiary_id`, `gexp_pi_loadport_id`, `gexp_pi_dischargeport_id`, `gexp_pi_destinatport_id`, `gexp_pi_container`, `gexp_pi_number_container`, `gexp_pi_freight_company`, `gexp_pi_freight_compcontact`, `gexp_pi_freight_compnumber`, `gexp_pi_freight_cost`, `gexp_pi_insurance`, `gexp_pi_bank`, `gexp_pi_currency`, `gexp_pi_ppn`, `gexp_pi_remark`, `gexp_pi_attachment01`, `gexp_pi_statrow`, `gexp_pi_week`, `gexp_pi_date`, `gexp_pi_month`, `gexp_pi_years`, `gexp_pi_statusPI`, `gexp_pi_createdAt`, `gexp_pi_createdBy`, `gexp_pi_updatedAt`, `gexp_pi_updatedBy`, `gexp_pi_parentlogs`, `gexp_pi_ApprovedBy`, `gexp_pi_ApprovedAt`, `gexp_pi_isApproved`, `gexp_pi_onSubmit`, `gexp_pi_Submit_Date`, `gexp_pi_submit_by`, `gexp_pi_isExpreq`, `gexp_pi_Expreq_path`, `gexp_pi_Expreq_isUpload`, `gexp_pi_Expreq_UpTime`) VALUES
	(1, '0058/SKP-EXP/PI/07/2022', '-', NULL, 1, 1, 2, 0, 0, 4, '1', '-', '-', '-', 0.00, 0.00, 1, '3', 2, NULL, NULL, 1, NULL, '2022-07-15', '07', '2022', 1, '2022-07-15 16:46:37', 41, '0000-00-00 00:00:00', NULL, NULL, 21, '2022-07-15 17:14:29', 1, 1, '2022-07-15 17:13:20', 41, NULL, NULL, NULL, NULL);

-- Dumping structure for table gpd_gexp.gexp_master_pi_opt
DROP TABLE IF EXISTS `gexp_master_pi_opt`;
CREATE TABLE IF NOT EXISTS `gexp_master_pi_opt` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_pi_opt: ~3 rows (approximately)
DELETE FROM `gexp_master_pi_opt`;
INSERT INTO `gexp_master_pi_opt` (`id`, `name`, `is_deleted`) VALUES
	(1, 'Attachment', '0'),
	(2, 'Dropdown', '0'),
	(3, 'Empty', '0');

-- Dumping structure for table gpd_gexp.gexp_master_qc
DROP TABLE IF EXISTS `gexp_master_qc`;
CREATE TABLE IF NOT EXISTS `gexp_master_qc` (
  `gexp_qc_id` int(11) NOT NULL AUTO_INCREMENT,
  `gexp_qc_no` varchar(255) DEFAULT NULL,
  `gexp_qc_month` varchar(50) DEFAULT NULL,
  `gexp_qc_year` varchar(100) DEFAULT NULL,
  `gexp_qc_date` date DEFAULT NULL,
  `gexp_qc_item_id` varchar(10) DEFAULT NULL,
  `gexp_qc_production_date` date DEFAULT NULL,
  `gexp_qc_expired_date` date DEFAULT NULL,
  `gexp_qc_aroma` varchar(255) DEFAULT NULL,
  `gexp_qc_taste` varchar(255) DEFAULT NULL,
  `gexp_qc_value` varchar(255) DEFAULT NULL,
  `gexp_qc_moisture` varchar(255) DEFAULT NULL,
  `gexp_qc_ph` varchar(255) DEFAULT NULL,
  `gexp_qc_brix` varchar(255) DEFAULT NULL,
  `gexp_qc_finish_goodcheck` date DEFAULT NULL,
  `gexp_qc_start_analysis` date DEFAULT NULL,
  `gexp_qc_end_analysis` date DEFAULT NULL,
  `gexp_qc_total_plate_count` varchar(255) DEFAULT NULL,
  `gexp_qc_yeast_mold` varchar(255) DEFAULT NULL,
  `gexp_qc_salmonella` varchar(255) DEFAULT NULL,
  `gexp_qc_enterobacteria` varchar(255) DEFAULT NULL,
  `gexp_qc_status` varchar(255) DEFAULT NULL,
  `gexp_qc_release_date` date DEFAULT NULL,
  `gexp_qc_country1` varchar(255) DEFAULT NULL,
  `gexp_qc_doc1` varchar(255) DEFAULT NULL,
  `gexp_qc_country2` varchar(255) DEFAULT NULL,
  `gexp_qc_doc2` varchar(255) DEFAULT NULL,
  `gexp_qc_country3` varchar(255) DEFAULT NULL,
  `gexp_qc_doc3` varchar(255) DEFAULT NULL,
  `gexp_qc_statrows` int(11) DEFAULT NULL,
  `gexp_qc_createdAt` datetime DEFAULT NULL,
  `gexp_qc_createdBy` int(11) DEFAULT NULL,
  `gexp_qc_updatedAt` datetime DEFAULT NULL,
  `gexp_qc_updatedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`gexp_qc_id`),
  UNIQUE KEY `gexp_qc_no` (`gexp_qc_no`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_qc: ~2 rows (approximately)
DELETE FROM `gexp_master_qc`;
INSERT INTO `gexp_master_qc` (`gexp_qc_id`, `gexp_qc_no`, `gexp_qc_month`, `gexp_qc_year`, `gexp_qc_date`, `gexp_qc_item_id`, `gexp_qc_production_date`, `gexp_qc_expired_date`, `gexp_qc_aroma`, `gexp_qc_taste`, `gexp_qc_value`, `gexp_qc_moisture`, `gexp_qc_ph`, `gexp_qc_brix`, `gexp_qc_finish_goodcheck`, `gexp_qc_start_analysis`, `gexp_qc_end_analysis`, `gexp_qc_total_plate_count`, `gexp_qc_yeast_mold`, `gexp_qc_salmonella`, `gexp_qc_enterobacteria`, `gexp_qc_status`, `gexp_qc_release_date`, `gexp_qc_country1`, `gexp_qc_doc1`, `gexp_qc_country2`, `gexp_qc_doc2`, `gexp_qc_country3`, `gexp_qc_doc3`, `gexp_qc_statrows`, `gexp_qc_createdAt`, `gexp_qc_createdBy`, `gexp_qc_updatedAt`, `gexp_qc_updatedBy`) VALUES
	(1, '0001/SKP-QC/07/2022', NULL, NULL, '2022-07-21', '2', '2021-09-06', '2023-09-06', 'normal', 'normal', '-', '1.64', '6.52', '12.9', '2021-09-11', '2021-09-12', '2021-09-16', '25 koloni / gram', '<10 koloni / gram', 'negatif / 25 gram', '<10 koloni / gram', '2', '2021-09-16', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-21 11:23:19', 9, '2022-08-04 12:03:38', 9),
	(2, '0002/SKP-QC/07/2022', NULL, NULL, '2022-07-21', '2', '2021-10-18', '2023-10-18', 'normal', 'normal', '-', '1.5', '6.49', '13', '2021-11-17', '2021-10-25', '2021-10-28', '< 10 koloni / gram', '<10 koloni / gram', 'negatif / 25 gram', '<10 koloni / gram', '1', '2021-11-17', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-21 11:27:44', 9, NULL, NULL);

-- Dumping structure for table gpd_gexp.gexp_master_qs
DROP TABLE IF EXISTS `gexp_master_qs`;
CREATE TABLE IF NOT EXISTS `gexp_master_qs` (
  `gexp_qs_id` int(11) NOT NULL AUTO_INCREMENT,
  `gexp_qs_no` varchar(255) DEFAULT NULL,
  `gexp_qs_coa_id` int(11) DEFAULT NULL,
  `gexp_qs_invoice_id` int(11) DEFAULT NULL,
  `gexp_qs_date` date DEFAULT NULL,
  `gexp_qs_month` varchar(255) DEFAULT NULL,
  `gexp_qs_years` year(4) DEFAULT NULL,
  `gexp_qs_createdAt` datetime DEFAULT NULL,
  `gexp_qs_createdBy` int(11) DEFAULT NULL,
  `gexp_qs_statusrows` int(11) DEFAULT NULL,
  PRIMARY KEY (`gexp_qs_id`),
  UNIQUE KEY `gexp_qs_no` (`gexp_qs_no`),
  UNIQUE KEY `gexp_qs_invoice_id` (`gexp_qs_invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_qs: ~1 rows (approximately)
DELETE FROM `gexp_master_qs`;
INSERT INTO `gexp_master_qs` (`gexp_qs_id`, `gexp_qs_no`, `gexp_qs_coa_id`, `gexp_qs_invoice_id`, `gexp_qs_date`, `gexp_qs_month`, `gexp_qs_years`, `gexp_qs_createdAt`, `gexp_qs_createdBy`, `gexp_qs_statusrows`) VALUES
	(1, '0001/SKP-QS/07/2022', 1, 1, '2022-07-21', '07', '2022', '2022-07-21 12:13:11', 10, 1);

-- Dumping structure for table gpd_gexp.gexp_master_spec
DROP TABLE IF EXISTS `gexp_master_spec`;
CREATE TABLE IF NOT EXISTS `gexp_master_spec` (
  `gexp_spec_id` int(11) NOT NULL AUTO_INCREMENT,
  `gexp_spec_no` varchar(255) DEFAULT NULL,
  `gexp_spec_date` date DEFAULT NULL,
  `gexp_spec_invoice_id` int(11) DEFAULT NULL,
  `gexp_spec_po_no` varchar(255) DEFAULT NULL,
  `gexp_spec_product_id` int(11) DEFAULT NULL,
  `gexp_spec_createdAt` datetime DEFAULT NULL,
  `gexp_spec_createdBy` int(11) DEFAULT NULL,
  `gexp_spec_statrows` int(11) DEFAULT NULL,
  PRIMARY KEY (`gexp_spec_id`),
  UNIQUE KEY `gexp_spec_no` (`gexp_spec_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_spec: ~1 rows (approximately)
DELETE FROM `gexp_master_spec`;
INSERT INTO `gexp_master_spec` (`gexp_spec_id`, `gexp_spec_no`, `gexp_spec_date`, `gexp_spec_invoice_id`, `gexp_spec_po_no`, `gexp_spec_product_id`, `gexp_spec_createdAt`, `gexp_spec_createdBy`, `gexp_spec_statrows`) VALUES
	(1, '0001/SKP-PRDSPEC/07/2022', '2022-07-21', 1, '12345', NULL, '2022-07-21 11:58:11', 10, NULL);

-- Dumping structure for table gpd_gexp.gexp_master_spp
DROP TABLE IF EXISTS `gexp_master_spp`;
CREATE TABLE IF NOT EXISTS `gexp_master_spp` (
  `gexp_spp_id` int(11) NOT NULL AUTO_INCREMENT,
  `gexp_spp_no` varchar(255) DEFAULT NULL,
  `gexp_spp_inv_id` int(11) DEFAULT NULL,
  `gexp_spp_nama` varchar(244) DEFAULT NULL,
  `gexp_spp_jabatan` varchar(255) DEFAULT NULL,
  `gexp_spp_description` text DEFAULT NULL,
  `gexp_spp_date` date DEFAULT NULL,
  `gexp_spp_month` varchar(255) DEFAULT NULL,
  `gexp_spp_years` year(4) DEFAULT NULL,
  `gexp_spp_createdAt` datetime DEFAULT NULL,
  `gexp_spp_createdBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`gexp_spp_id`),
  UNIQUE KEY `gexp_spp_no` (`gexp_spp_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_spp: ~1 rows (approximately)
DELETE FROM `gexp_master_spp`;
INSERT INTO `gexp_master_spp` (`gexp_spp_id`, `gexp_spp_no`, `gexp_spp_inv_id`, `gexp_spp_nama`, `gexp_spp_jabatan`, `gexp_spp_description`, `gexp_spp_date`, `gexp_spp_month`, `gexp_spp_years`, `gexp_spp_createdAt`, `gexp_spp_createdBy`) VALUES
	(1, '0001/SKP-EXP/SPP/07/2022', 1, 'shofa istiana', 'Quality Assurance', 'OK', NULL, NULL, NULL, '0000-00-00 00:00:00', 10);

-- Dumping structure for table gpd_gexp.gexp_master_top
DROP TABLE IF EXISTS `gexp_master_top`;
CREATE TABLE IF NOT EXISTS `gexp_master_top` (
  `TopId` int(11) NOT NULL AUTO_INCREMENT,
  `TopDesc` varchar(255) DEFAULT NULL,
  `TopStats` int(11) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `UpdateAt` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`TopId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_master_top: ~4 rows (approximately)
DELETE FROM `gexp_master_top`;
INSERT INTO `gexp_master_top` (`TopId`, `TopDesc`, `TopStats`, `CreatedAt`, `CreatedBy`, `UpdateAt`, `UpdateBy`) VALUES
	(2, 'TOP 30 DAYS', 1, NULL, NULL, NULL, NULL),
	(3, 'TOP 45 DAYS', 1, NULL, NULL, NULL, NULL),
	(4, 'TOP 90 DAYS', 1, NULL, NULL, NULL, NULL),
	(8, 'TOP 0 DAYS', 1, '2022-07-16 13:49:36', 1, NULL, NULL);

-- Dumping structure for table gpd_gexp.gexp_menus
DROP TABLE IF EXISTS `gexp_menus`;
CREATE TABLE IF NOT EXISTS `gexp_menus` (
  `MenusId` int(11) NOT NULL AUTO_INCREMENT,
  `MenusName` varchar(255) DEFAULT NULL,
  `MenusIcon` varchar(255) DEFAULT NULL,
  `MenusLink` varchar(255) DEFAULT NULL,
  `MenuParents` int(11) DEFAULT NULL,
  `MenuStats` int(11) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `UpdateAt` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`MenusId`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_menus: ~46 rows (approximately)
DELETE FROM `gexp_menus`;
INSERT INTO `gexp_menus` (`MenusId`, `MenusName`, `MenusIcon`, `MenusLink`, `MenuParents`, `MenuStats`, `CreatedAt`, `CreatedBy`, `UpdateAt`, `UpdateBy`) VALUES
	(1, 'Dashboard', NULL, 'DashboardSys/Dashboard', 0, 1, NULL, NULL, NULL, NULL),
	(2, 'Master Syst', NULL, 'MasterSys', 0, 1, NULL, NULL, NULL, NULL),
	(3, 'Master Group', NULL, 'MasterGroup', 2, 1, NULL, NULL, NULL, NULL),
	(4, 'Master User', NULL, 'MasterUser', 2, 1, NULL, NULL, NULL, NULL),
	(5, 'Master Menu', NULL, 'MasterMenu', 2, 1, NULL, NULL, NULL, NULL),
	(6, 'Master Assign Menu', NULL, 'MasterAssignMenu', 2, 1, NULL, NULL, NULL, NULL),
	(7, 'Master Data Set', NULL, 'MasterDataSet', 0, 1, NULL, NULL, NULL, NULL),
	(8, 'Master Set Country', NULL, 'DataSetCountry', 7, 1, NULL, NULL, NULL, NULL),
	(9, 'Master Set TOP', NULL, 'DataSetTop', 7, 1, NULL, NULL, NULL, NULL),
	(10, 'Master Set INCOTERM', NULL, 'DataSetIncoterm', 7, 1, NULL, NULL, NULL, NULL),
	(11, 'Master Set Item', NULL, 'DataSetItem', 7, 1, NULL, NULL, NULL, NULL),
	(12, 'Master Set Bank', NULL, 'DataSetBank', 7, 1, NULL, NULL, NULL, NULL),
	(13, 'Master Set LoadingPort', NULL, 'DataSetLoadport', 7, 1, NULL, NULL, NULL, NULL),
	(14, 'Master Set Beneficiary', NULL, 'DataSetBeneficiary', 7, 1, NULL, NULL, NULL, NULL),
	(15, 'Master Set Icons', NULL, 'MasterIcon', 2, 1, NULL, NULL, NULL, NULL),
	(16, 'Master Set Container', NULL, 'DataSetContainer', 7, 1, NULL, NULL, NULL, NULL),
	(17, 'Master Set Customer', NULL, 'DataSetCustomer', 7, 1, NULL, NULL, NULL, NULL),
	(18, 'Proforma Invoice (PI)', '3', 'MasterBoardPI', 0, 1, NULL, NULL, NULL, NULL),
	(19, 'Export Require', '3', 'ExportRequire', 0, 1, NULL, NULL, NULL, NULL),
	(20, 'Master Invoice', '3', 'MasterInvFin', 0, 1, NULL, NULL, NULL, NULL),
	(21, 'Quality Control', '3', 'MasterQc', 0, 1, NULL, NULL, NULL, NULL),
	(22, 'Packing List', '3', 'MenuPackingList', 0, 1, NULL, NULL, NULL, NULL),
	(23, 'Certificate of Analysis', '3', 'MenuCOA', 0, 1, NULL, NULL, NULL, NULL),
	(24, 'Product Specification', '3', 'MenuProSpec', 0, 1, NULL, NULL, NULL, NULL),
	(25, 'Quality Certificate', '3', 'MenuQcert', 0, 2, NULL, NULL, NULL, NULL),
	(26, 'Surat Pernyataan Product', '3', 'MenuSpp', 0, 1, NULL, NULL, NULL, NULL),
	(27, 'Signed PI (Delete)', '3', 'MenuSignPI', 0, 1, NULL, NULL, NULL, NULL),
	(28, 'Preview PI', '3', 'MenuPreviewPI', 0, 1, NULL, NULL, NULL, NULL),
	(29, 'Quality Certificate', '3', 'MenuQcert', 0, 1, NULL, NULL, NULL, NULL),
	(30, 'Approval Proforma Invoice (PI)', '3', 'MenuApprovalPI', 0, 1, NULL, NULL, NULL, NULL),
	(31, 'Ketentuan Export', '3', 'MenuCheckDocexp', 0, 1, NULL, NULL, NULL, NULL),
	(32, 'Ketentuan Export', '3', 'MenuListDocExp', 0, 1, NULL, NULL, NULL, NULL),
	(33, 'Menu Quality Certification', '3', 'MenuQCert', 0, 2, NULL, NULL, NULL, NULL),
	(34, 'Sign Out', '3', 'LoginSys/doLogout', 0, 1, NULL, NULL, NULL, NULL),
	(35, 'Master Item Mapping', '3', 'MenuItemMap', 7, 1, NULL, NULL, NULL, NULL),
	(36, 'Dashboard ', NULL, 'Root_Dashboard/Dashboard', 0, 1, NULL, NULL, NULL, NULL),
	(37, 'Master System', NULL, 'Root_Dashboard/Dashboard', 0, 1, NULL, NULL, NULL, NULL),
	(38, 'Master Config Group', NULL, 'Root_Dashboard/Config_Group', 37, 1, NULL, NULL, NULL, NULL),
	(39, 'Master Config User', NULL, 'Root_Dashboard/Config_User', 37, 1, NULL, NULL, NULL, NULL),
	(40, 'Master Config Menu', NULL, 'Root_Dashboard/Config_Menu', 37, 1, NULL, NULL, NULL, NULL),
	(41, 'Master Config Assign Menu', NULL, 'Root_Dashboard/Config_Assign_Menu', 37, 1, NULL, NULL, NULL, NULL),
	(42, 'Menu Freight Cost', '3', 'MenuFreightCost', 0, 1, NULL, NULL, NULL, NULL),
	(43, 'Set Customer', '4', 'DataSetCustomer', 0, 1, NULL, NULL, NULL, NULL),
	(44, 'Master Item', '3', 'DataSetItem', 0, 1, NULL, NULL, NULL, NULL),
	(45, 'Master Customer', '3', 'DataSetCustomer', 0, 1, NULL, NULL, NULL, NULL),
	(46, 'Signed PI', '3', 'MenuDocPI', 0, 1, NULL, NULL, NULL, NULL);

-- Dumping structure for table gpd_gexp.gexp_packlist_detail
DROP TABLE IF EXISTS `gexp_packlist_detail`;
CREATE TABLE IF NOT EXISTS `gexp_packlist_detail` (
  `gexp_packlistdet_id` int(11) NOT NULL AUTO_INCREMENT,
  `gexp_packlist_number` varchar(255) DEFAULT NULL,
  `gexp_packlistdet_carton_bar` varchar(255) DEFAULT NULL,
  `gexp_packlistdet_itemid` varchar(255) DEFAULT NULL,
  `gexp_packlistdet_descgod` varchar(255) DEFAULT NULL,
  `gexp_packlistdet_hscode` varchar(255) DEFAULT NULL,
  `gexp_packlistdet_packing` varchar(255) DEFAULT NULL,
  `gexp_packlistdet_qty` varchar(255) DEFAULT NULL,
  `gexp_packlistdet_batch` varchar(255) DEFAULT NULL,
  `gexp_packlistdet_expdate` date DEFAULT NULL,
  `gexp_packlistdet_proddate` date DEFAULT NULL,
  `gexp_packlistdet_netweight` varchar(255) DEFAULT NULL,
  `gexp_packlistdet_grossweight` varchar(255) DEFAULT NULL,
  `gexp_packlistdet_cbm` varchar(255) DEFAULT NULL,
  `gexp_packlistdet_dimension` varchar(255) DEFAULT NULL,
  `gexp_packlistdet_createdAt` datetime DEFAULT NULL,
  `gexp_packlistdet_createdBy` int(11) DEFAULT NULL,
  `gexp_packlistdet_updatedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`gexp_packlistdet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_packlist_detail: ~6 rows (approximately)
DELETE FROM `gexp_packlist_detail`;
INSERT INTO `gexp_packlist_detail` (`gexp_packlistdet_id`, `gexp_packlist_number`, `gexp_packlistdet_carton_bar`, `gexp_packlistdet_itemid`, `gexp_packlistdet_descgod`, `gexp_packlistdet_hscode`, `gexp_packlistdet_packing`, `gexp_packlistdet_qty`, `gexp_packlistdet_batch`, `gexp_packlistdet_expdate`, `gexp_packlistdet_proddate`, `gexp_packlistdet_netweight`, `gexp_packlistdet_grossweight`, `gexp_packlistdet_cbm`, `gexp_packlistdet_dimension`, `gexp_packlistdet_createdAt`, `gexp_packlistdet_createdBy`, `gexp_packlistdet_updatedBy`) VALUES
	(1, '0001/SKP-EXT/PL/07/2022', '-', '1', 'CAFFINO CAPPUCCINO POUCH', '210111', 'POUCH', '822', '1123', '2020-01-01', '2022-07-01', '3945.6', '4767.6', '23.2752177', NULL, '2022-07-15 17:36:20', 15, 15),
	(2, '0001/SKP-EXT/PL/07/2022', '-', '2', 'CAFFINO CAPPUCINNO MOCHA POUCH', '210111', 'POUCH', '822', '1123', '2023-11-15', '2021-11-15', '3945.6', '4767.6', '23.2752177', NULL, '2022-07-15 17:36:20', 15, 15),
	(3, '0001/SKP-EXT/PL/07/2022', NULL, '3', 'CAFFINO CAPPUCINNO HAZELNUT POUCH', '210111', 'POUCH', '411', NULL, NULL, NULL, '1972.8', '2383.8', '11.63760885', NULL, '2022-07-15 17:36:20', 15, NULL),
	(4, '0001/SKP-EXT/PL/07/2022', NULL, '3', 'CAFFINO CAPPUCINNO HAZELNUT POUCH', '210111', 'POUCH', '103', NULL, NULL, NULL, '494.4', '597.4', '2.91648105', NULL, '2022-07-15 17:36:20', 15, NULL),
	(5, '0001/SKP-EXT/PL/07/2022', '-', '2', 'CAFFINO CAPPUCINNO MOCHA POUCH', '210111', 'POUCH', '206', '1023', '2023-10-18', '2021-10-18', '988.8', '1194.8', '5.8329621', NULL, '2022-07-15 17:36:20', 15, 15),
	(6, '0001/SKP-EXT/PL/07/2022', NULL, '1', 'CAFFINO CAPPUCCINO POUCH', '210111', 'POUCH', '206', NULL, NULL, NULL, '988.8', '1194.8', '5.8329621', NULL, '2022-07-15 17:36:20', 15, NULL);

-- Dumping structure for view gpd_gexp.gexp_pi_cbm
DROP VIEW IF EXISTS `gexp_pi_cbm`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `gexp_pi_cbm` (
	`pi_no` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`current_cbm` DECIMAL(42,6) NULL,
	`currenct_remain_cbm` DECIMAL(20,6) UNSIGNED NULL
) ENGINE=MyISAM;

-- Dumping structure for table gpd_gexp.gexp_pi_good
DROP TABLE IF EXISTS `gexp_pi_good`;
CREATE TABLE IF NOT EXISTS `gexp_pi_good` (
  `gexp_good_id` int(11) NOT NULL AUTO_INCREMENT,
  `gexp_good_pi_no` varchar(255) DEFAULT NULL,
  `gexp_good_item_id` int(11) DEFAULT NULL,
  `gexp_good_hs_code` varchar(255) DEFAULT NULL,
  `gexp_good_config` varchar(255) DEFAULT NULL,
  `gexp_good_qty` varchar(255) DEFAULT NULL,
  `gexp_good_price` varchar(255) DEFAULT NULL,
  `gexp_good_totals` varchar(255) DEFAULT NULL,
  `current_cbm` decimal(20,6) unsigned NOT NULL DEFAULT 0.000000,
  `currenct_remain_cbm` decimal(20,6) unsigned NOT NULL DEFAULT 0.000000,
  `gexp_good_statsid` int(11) DEFAULT NULL COMMENT '1=Purchase Goods 2=FreeGoods',
  `gexp_good_date` date DEFAULT NULL,
  `gexp_good_createdAt` datetime DEFAULT NULL,
  `gexp_good_createdBy` int(11) DEFAULT NULL,
  `gexp_good_statsrow` int(11) DEFAULT NULL COMMENT '1=Active 2=Notactive',
  PRIMARY KEY (`gexp_good_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_pi_good: ~6 rows (approximately)
DELETE FROM `gexp_pi_good`;
INSERT INTO `gexp_pi_good` (`gexp_good_id`, `gexp_good_pi_no`, `gexp_good_item_id`, `gexp_good_hs_code`, `gexp_good_config`, `gexp_good_qty`, `gexp_good_price`, `gexp_good_totals`, `current_cbm`, `currenct_remain_cbm`, `gexp_good_statsid`, `gexp_good_date`, `gexp_good_createdAt`, `gexp_good_createdBy`, `gexp_good_statsrow`) VALUES
	(1, '0058/SKP-EXP/PI/07/2022', 1, '210111', NULL, '822', '12.80', '10521.6', 23.275218, 51.724782, 1, '2022-07-15', '2022-07-15 17:07:12', 41, 1),
	(2, '0058/SKP-EXP/PI/07/2022', 2, '210111', NULL, '822', '12.80', '10521.6', 23.275218, 28.449564, 1, '2022-07-15', '2022-07-15 17:07:35', 41, 1),
	(3, '0058/SKP-EXP/PI/07/2022', 3, '210111', NULL, '411', '12.80', '5260.8', 11.637609, 16.811955, 1, '2022-07-15', '2022-07-15 17:07:55', 41, 1),
	(4, '0058/SKP-EXP/PI/07/2022', 3, '210111', NULL, '103', '12.80', '1318.4', 2.916481, 13.895474, 2, '2022-07-15', '2022-07-15 17:08:19', 41, 1),
	(5, '0058/SKP-EXP/PI/07/2022', 2, '210111', NULL, '206', '12.80', '2636.8', 5.832962, 8.062512, 2, '2022-07-15', '2022-07-15 17:08:36', 41, 1),
	(6, '0058/SKP-EXP/PI/07/2022', 1, '210111', NULL, '206', '12.80', '2636.8', 5.832962, 2.229550, 2, '2022-07-15', '2022-07-15 17:08:50', 41, 1);

-- Dumping structure for table gpd_gexp.gexp_pi_log_email
DROP TABLE IF EXISTS `gexp_pi_log_email`;
CREATE TABLE IF NOT EXISTS `gexp_pi_log_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_submit_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sent_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `log_submit_id` (`log_submit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_pi_log_email: ~0 rows (approximately)
DELETE FROM `gexp_pi_log_email`;

-- Dumping structure for table gpd_gexp.gexp_pi_log_submit
DROP TABLE IF EXISTS `gexp_pi_log_submit`;
CREATE TABLE IF NOT EXISTS `gexp_pi_log_submit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pi_no` varchar(50) NOT NULL,
  `pi_type` varchar(100) NOT NULL,
  `pi_progress` decimal(3,0) NOT NULL DEFAULT 0,
  `submit_by_id` tinyint(4) NOT NULL,
  `submit_by_name` varchar(100) NOT NULL,
  `is_sent` enum('1','0') NOT NULL COMMENT '1 = Yes; 0 = No;',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `pi_no` (`pi_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_pi_log_submit: ~0 rows (approximately)
DELETE FROM `gexp_pi_log_submit`;

-- Dumping structure for table gpd_gexp.gexp_pi_type
DROP TABLE IF EXISTS `gexp_pi_type`;
CREATE TABLE IF NOT EXISTS `gexp_pi_type` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `is_deleted` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1 = Yes; 0 = No;',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_pi_type: ~0 rows (approximately)
DELETE FROM `gexp_pi_type`;

-- Dumping structure for table gpd_gexp.gexp_prodspec_signpi
DROP TABLE IF EXISTS `gexp_prodspec_signpi`;
CREATE TABLE IF NOT EXISTS `gexp_prodspec_signpi` (
  `prodspec_signid` int(11) NOT NULL AUTO_INCREMENT,
  `sign_pi_id` int(11) DEFAULT NULL,
  `prodspec_date` date DEFAULT NULL,
  `prodspec_val` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`prodspec_signid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_prodspec_signpi: ~1 rows (approximately)
DELETE FROM `gexp_prodspec_signpi`;
INSERT INTO `gexp_prodspec_signpi` (`prodspec_signid`, `sign_pi_id`, `prodspec_date`, `prodspec_val`, `createdAt`, `createdBy`) VALUES
	(1, 1, '2022-07-21', 'Product_Spec-KAZ.pdf', '2022-07-21 12:04:46', 10);

-- Dumping structure for table gpd_gexp.gexp_qc_file
DROP TABLE IF EXISTS `gexp_qc_file`;
CREATE TABLE IF NOT EXISTS `gexp_qc_file` (
  `qc_file_id` int(11) NOT NULL AUTO_INCREMENT,
  `qc_master_id` int(11) DEFAULT NULL,
  `qc_textct` varchar(255) DEFAULT NULL,
  `qc_pathname` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`qc_file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_qc_file: ~0 rows (approximately)
DELETE FROM `gexp_qc_file`;

-- Dumping structure for table gpd_gexp.gexp_shipto_cust
DROP TABLE IF EXISTS `gexp_shipto_cust`;
CREATE TABLE IF NOT EXISTS `gexp_shipto_cust` (
  `ShiptoId` int(11) NOT NULL AUTO_INCREMENT,
  `ShipCodeCust` varchar(255) DEFAULT NULL,
  `ShipCompanyName` varchar(255) DEFAULT NULL,
  `ShipAddress` varchar(255) DEFAULT NULL,
  `ShipCountry` varchar(255) DEFAULT NULL,
  `ShipPhone` varchar(255) DEFAULT NULL,
  `ShiptoCpName` varchar(255) DEFAULT NULL,
  `ShiptoCpPhone` varchar(255) DEFAULT NULL,
  `ShiptoCpEmail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ShiptoId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_shipto_cust: ~1 rows (approximately)
DELETE FROM `gexp_shipto_cust`;
INSERT INTO `gexp_shipto_cust` (`ShiptoId`, `ShipCodeCust`, `ShipCompanyName`, `ShipAddress`, `ShipCountry`, `ShipPhone`, `ShiptoCpName`, `ShiptoCpPhone`, `ShiptoCpEmail`) VALUES
	(1, '1', 'B3 GROUP LLP', 'Esil district, st. Bukhar Zhyrau, 36, apt. 98, Nur Sultan', 'Kazakhstan', '+7777 207 7373', 'Yerkanat Ussenov', '+7777 207 7373', 'Erkanat.ussen81@gmail.com');

-- Dumping structure for table gpd_gexp.gexp_shipto_port
DROP TABLE IF EXISTS `gexp_shipto_port`;
CREATE TABLE IF NOT EXISTS `gexp_shipto_port` (
  `ShipportId` int(11) NOT NULL AUTO_INCREMENT,
  `ShiptoId` varchar(255) DEFAULT NULL,
  `ShiptoCust` int(11) DEFAULT NULL,
  `PortParam` varchar(255) DEFAULT NULL,
  `PortValue` varchar(255) DEFAULT NULL,
  `DischargePort` varchar(255) DEFAULT NULL,
  `DestinationPort` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ShipportId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_shipto_port: ~2 rows (approximately)
DELETE FROM `gexp_shipto_port`;
INSERT INTO `gexp_shipto_port` (`ShipportId`, `ShiptoId`, `ShiptoCust`, `PortParam`, `PortValue`, `DischargePort`, `DestinationPort`) VALUES
	(1, '1', 1, NULL, NULL, 'Qingdao', 'Almaty'),
	(2, '1', 1, NULL, NULL, 'Qingdao', 'Almaty');

-- Dumping structure for table gpd_gexp.gexp_sign_pi
DROP TABLE IF EXISTS `gexp_sign_pi`;
CREATE TABLE IF NOT EXISTS `gexp_sign_pi` (
  `sign_pi_noid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'SignStatus PI',
  `sign_pi_statrows` int(11) DEFAULT NULL COMMENT '1 Active , 2 Not Activ',
  `sign_pi_id` int(11) DEFAULT NULL COMMENT 'Id PI',
  `sign_pi_no` varchar(255) DEFAULT NULL COMMENT 'No PI (sales)',
  `sign_pi_submitPI` int(11) DEFAULT NULL,
  `sign_pi_submit_path` varchar(255) DEFAULT NULL COMMENT 'Path PI SIGN',
  `sign_pi_submit_date` date DEFAULT NULL COMMENT 'Value Date',
  `sign_pi_submit_at` datetime DEFAULT NULL COMMENT 'Last Update',
  `sign_pi_submit_by` int(11) DEFAULT NULL COMMENT 'Id Submited',
  `sign_pi_po` int(11) DEFAULT NULL,
  `sign_pi_po_path` varchar(255) DEFAULT NULL COMMENT 'Path PO Sign',
  `sign_pi_po_date` date DEFAULT NULL COMMENT 'Value Date',
  `sign_pi_po_at` datetime DEFAULT NULL COMMENT 'Last Update',
  `sign_pi_po_by` int(11) DEFAULT NULL COMMENT 'Id Submited',
  `sign_pi_top` int(11) DEFAULT NULL COMMENT 'input (finance)',
  `sign_pi_top_value` varchar(255) DEFAULT NULL COMMENT 'topvalue',
  `sign_pi_top_path` varchar(255) DEFAULT NULL COMMENT 'Path TOP Sign',
  `sign_pi_top_date` date DEFAULT NULL COMMENT 'Value Date',
  `sign_pi_top_at` datetime DEFAULT NULL COMMENT 'Last Update',
  `sign_pi_top_by` int(11) DEFAULT NULL COMMENT 'Id Submited',
  `sign_dp_receipt` int(11) DEFAULT NULL COMMENT 'input (sales)',
  `sign_dp_receipt_date` date DEFAULT NULL COMMENT 'Value Date',
  `sign_dp_receipt_path` varchar(255) DEFAULT NULL COMMENT 'Path DP Receipt SIGN',
  `sign_dp_receipt_at` datetime DEFAULT NULL COMMENT 'Last Updates',
  `sign_dp_receipt_by` int(11) DEFAULT NULL COMMENT 'Id Submited',
  `sign_dp_receipt_conf` int(11) DEFAULT NULL COMMENT 'input (finance)',
  `sign_dp_receipt_conf_date` date DEFAULT NULL COMMENT 'Value Date',
  `sign_dp_receipt_conf_at` datetime DEFAULT NULL COMMENT 'Last Updates',
  `sign_dp_receipt_conf_by` int(11) DEFAULT NULL COMMENT 'Id Submited',
  `sign_shipping_term` int(11) DEFAULT NULL COMMENT 'input (sales)',
  `sign_shipping_term_value` varchar(255) DEFAULT NULL,
  `sign_shipping_term_date` date DEFAULT NULL,
  `sign_shipping_term_at` datetime DEFAULT NULL,
  `sign_shipping_term_by` int(11) DEFAULT NULL,
  `sign_bill_of_ladding` int(11) DEFAULT NULL,
  `sign_bill_of_ladding_path` varchar(255) DEFAULT NULL,
  `sign_bill_of_ladding_date` date DEFAULT NULL,
  `sign_bill_of_ladding_at` datetime DEFAULT NULL,
  `sign_bill_of_ladding_by` int(11) DEFAULT NULL,
  `sign_packing_list` int(11) DEFAULT NULL,
  `sign_packing_list_path` varchar(255) DEFAULT NULL,
  `sign_packing_list_date` date DEFAULT NULL,
  `sign_packing_list_at` datetime DEFAULT NULL,
  `sign_packing_list_by` int(11) DEFAULT NULL,
  `sign_invoice` int(11) DEFAULT NULL,
  `sign_invoice_path` varchar(255) DEFAULT NULL,
  `sign_invoice_date` date DEFAULT NULL,
  `sign_invoice_at` datetime DEFAULT NULL,
  `sign_invoice_by` int(11) DEFAULT NULL,
  `sign_invoice_underval` int(11) DEFAULT NULL,
  `sign_invoice_underval_path` varchar(255) DEFAULT NULL,
  `sign_invoice_underval_date` date DEFAULT NULL,
  `sign_invoice_underval_at` datetime DEFAULT NULL,
  `sign_invoice_underval_by` int(11) DEFAULT NULL,
  `sign_coo` int(11) DEFAULT NULL,
  `sign_coo_path` varchar(255) DEFAULT NULL,
  `sign_coo_date` date DEFAULT NULL,
  `sign_coo_at` datetime DEFAULT NULL,
  `sign_coo_by` int(11) DEFAULT NULL,
  `sign_healthcert` int(11) DEFAULT NULL,
  `sign_healthcert_path` varchar(255) DEFAULT NULL,
  `sign_healthcert_date` date DEFAULT NULL,
  `sign_healthcert_at` datetime DEFAULT NULL,
  `sign_healthcert_by` int(11) DEFAULT NULL,
  `sign_materialsafe` int(11) DEFAULT NULL,
  `sign_materialsafe_path` varchar(255) DEFAULT NULL,
  `sign_materialsafe_date` date DEFAULT NULL,
  `sign_materialsafe_at` datetime DEFAULT NULL,
  `sign_materialsafe_by` int(11) DEFAULT NULL,
  `sign_coa` int(11) DEFAULT NULL,
  `sign_coa_path` varchar(255) DEFAULT NULL,
  `sign_coa_date` date DEFAULT NULL,
  `sign_coa_at` datetime DEFAULT NULL,
  `sign_coa_by` int(11) DEFAULT NULL,
  `sign_product_specificat` int(11) DEFAULT NULL,
  `sign_product_specificat_path` varchar(255) DEFAULT NULL,
  `sign_product_specificat_date` date DEFAULT NULL,
  `sign_product_specificat_at` datetime DEFAULT NULL,
  `sign_product_specificat_by` int(11) DEFAULT NULL,
  `sign_spp` int(11) DEFAULT NULL,
  `sign_spp_path` varchar(255) DEFAULT NULL,
  `sign_spp_date` date DEFAULT NULL,
  `sign_spp_at` datetime DEFAULT NULL,
  `sign_spp_by` int(11) DEFAULT NULL,
  `sign_others` int(11) DEFAULT NULL,
  `sign_others_path` varchar(255) DEFAULT NULL,
  `sign_others_date` date DEFAULT NULL,
  `sign_others_at` datetime DEFAULT NULL,
  `sign_others_by` int(11) DEFAULT NULL,
  `sign_expprint_trial` int(11) DEFAULT NULL,
  `sign_expprint_trial_path` varchar(255) DEFAULT NULL,
  `sign_expprint_trial_date` date DEFAULT NULL,
  `sign_expprint_trial_at` datetime DEFAULT NULL,
  `sign_expprint_trial_by` int(11) DEFAULT NULL,
  `sign_expprint_apprv` int(11) DEFAULT NULL,
  `sign_expprint_apprv_date` date DEFAULT NULL,
  `sign_expprint_apprv_at` datetime DEFAULT NULL,
  `sign_expprint_apprv_by` int(11) DEFAULT NULL,
  `sign_foc` int(11) DEFAULT NULL,
  `sign_foc_date` date DEFAULT NULL,
  `sign_foc_at` datetime DEFAULT NULL,
  `sign_foc_by` int(11) DEFAULT NULL,
  `sign_posm` int(11) DEFAULT NULL,
  `sign_posm_date` date DEFAULT NULL,
  `sign_posm_at` datetime DEFAULT NULL,
  `sign_posm_by` int(11) DEFAULT NULL,
  `sign_finishgod` int(11) DEFAULT NULL,
  `sign_finishgod_date` date DEFAULT NULL,
  `sign_finishgod_at` datetime DEFAULT NULL,
  `sign_finishgod_by` int(11) DEFAULT NULL,
  `sign_vesselsche` int(11) DEFAULT NULL,
  `sign_vesselsche_date` date DEFAULT NULL,
  `sign_vesselsche_at` datetime DEFAULT NULL,
  `sign_vesselsche_by` int(11) DEFAULT NULL,
  `sign_balancepay` int(11) DEFAULT NULL,
  `sign_balancepay_value` int(11) DEFAULT NULL,
  `sign_balancepay_date` date DEFAULT NULL,
  `sign_balancepay_at` datetime DEFAULT NULL,
  `sign_balancepay_by` int(11) DEFAULT NULL,
  `sign_vesselbookconf` int(11) DEFAULT NULL,
  `sign_vesselbookconf_date` date DEFAULT NULL,
  `sign_vesselbookconf_at` datetime DEFAULT NULL,
  `sign_vesselbookconf_by` int(11) DEFAULT NULL,
  `sign_stuffing` int(11) DEFAULT NULL,
  `sign_stuffing_path` varchar(255) DEFAULT NULL,
  `sign_stuffing_date` date DEFAULT NULL,
  `sign_stuffing_at` datetime DEFAULT NULL,
  `sign_stuffing_by` int(11) DEFAULT NULL,
  `sign_draftbl_sent` int(11) DEFAULT NULL,
  `sign_draftbl_sent_date` date DEFAULT NULL,
  `sign_draftbl_sent_at` datetime DEFAULT NULL,
  `sign_draftbl_sent_by` int(11) DEFAULT NULL,
  `sign_draftbl_apprv` int(11) DEFAULT NULL,
  `sign_draftbl_apprv_date` date DEFAULT NULL,
  `sign_draftbl_apprv_at` datetime DEFAULT NULL,
  `sign_draftbl_apprv_by` int(11) DEFAULT NULL,
  `sign_telex_release` int(11) DEFAULT NULL,
  `sign_telex_release_date` date DEFAULT NULL,
  `sign_telex_release_at` datetime DEFAULT NULL,
  `sign_telex_release_by` int(11) DEFAULT NULL,
  `sign_origin_docsent` int(11) DEFAULT NULL,
  `sign_origin_docsent_date` date DEFAULT NULL,
  `sign_origin_docsent_at` datetime DEFAULT NULL,
  `sign_origin_docsent_by` int(11) DEFAULT NULL,
  `sign_toppay_balance` int(11) DEFAULT NULL,
  `sign_toppay_balance_date` date DEFAULT NULL,
  `sign_toppay_balance_at` datetime DEFAULT NULL,
  `sign_toppay_balance_by` int(11) DEFAULT NULL,
  `sign_etd` int(11) DEFAULT NULL,
  `sign_etd_date` date DEFAULT NULL,
  `sign_etd_at` datetime DEFAULT NULL,
  `sign_etd_by` int(11) DEFAULT NULL,
  `sign_eta` int(11) DEFAULT NULL,
  `sign_eta_date` date DEFAULT NULL,
  `sign_eta_at` datetime DEFAULT NULL,
  `sign_eta_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`sign_pi_noid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_sign_pi: ~1 rows (approximately)
DELETE FROM `gexp_sign_pi`;
INSERT INTO `gexp_sign_pi` (`sign_pi_noid`, `sign_pi_statrows`, `sign_pi_id`, `sign_pi_no`, `sign_pi_submitPI`, `sign_pi_submit_path`, `sign_pi_submit_date`, `sign_pi_submit_at`, `sign_pi_submit_by`, `sign_pi_po`, `sign_pi_po_path`, `sign_pi_po_date`, `sign_pi_po_at`, `sign_pi_po_by`, `sign_pi_top`, `sign_pi_top_value`, `sign_pi_top_path`, `sign_pi_top_date`, `sign_pi_top_at`, `sign_pi_top_by`, `sign_dp_receipt`, `sign_dp_receipt_date`, `sign_dp_receipt_path`, `sign_dp_receipt_at`, `sign_dp_receipt_by`, `sign_dp_receipt_conf`, `sign_dp_receipt_conf_date`, `sign_dp_receipt_conf_at`, `sign_dp_receipt_conf_by`, `sign_shipping_term`, `sign_shipping_term_value`, `sign_shipping_term_date`, `sign_shipping_term_at`, `sign_shipping_term_by`, `sign_bill_of_ladding`, `sign_bill_of_ladding_path`, `sign_bill_of_ladding_date`, `sign_bill_of_ladding_at`, `sign_bill_of_ladding_by`, `sign_packing_list`, `sign_packing_list_path`, `sign_packing_list_date`, `sign_packing_list_at`, `sign_packing_list_by`, `sign_invoice`, `sign_invoice_path`, `sign_invoice_date`, `sign_invoice_at`, `sign_invoice_by`, `sign_invoice_underval`, `sign_invoice_underval_path`, `sign_invoice_underval_date`, `sign_invoice_underval_at`, `sign_invoice_underval_by`, `sign_coo`, `sign_coo_path`, `sign_coo_date`, `sign_coo_at`, `sign_coo_by`, `sign_healthcert`, `sign_healthcert_path`, `sign_healthcert_date`, `sign_healthcert_at`, `sign_healthcert_by`, `sign_materialsafe`, `sign_materialsafe_path`, `sign_materialsafe_date`, `sign_materialsafe_at`, `sign_materialsafe_by`, `sign_coa`, `sign_coa_path`, `sign_coa_date`, `sign_coa_at`, `sign_coa_by`, `sign_product_specificat`, `sign_product_specificat_path`, `sign_product_specificat_date`, `sign_product_specificat_at`, `sign_product_specificat_by`, `sign_spp`, `sign_spp_path`, `sign_spp_date`, `sign_spp_at`, `sign_spp_by`, `sign_others`, `sign_others_path`, `sign_others_date`, `sign_others_at`, `sign_others_by`, `sign_expprint_trial`, `sign_expprint_trial_path`, `sign_expprint_trial_date`, `sign_expprint_trial_at`, `sign_expprint_trial_by`, `sign_expprint_apprv`, `sign_expprint_apprv_date`, `sign_expprint_apprv_at`, `sign_expprint_apprv_by`, `sign_foc`, `sign_foc_date`, `sign_foc_at`, `sign_foc_by`, `sign_posm`, `sign_posm_date`, `sign_posm_at`, `sign_posm_by`, `sign_finishgod`, `sign_finishgod_date`, `sign_finishgod_at`, `sign_finishgod_by`, `sign_vesselsche`, `sign_vesselsche_date`, `sign_vesselsche_at`, `sign_vesselsche_by`, `sign_balancepay`, `sign_balancepay_value`, `sign_balancepay_date`, `sign_balancepay_at`, `sign_balancepay_by`, `sign_vesselbookconf`, `sign_vesselbookconf_date`, `sign_vesselbookconf_at`, `sign_vesselbookconf_by`, `sign_stuffing`, `sign_stuffing_path`, `sign_stuffing_date`, `sign_stuffing_at`, `sign_stuffing_by`, `sign_draftbl_sent`, `sign_draftbl_sent_date`, `sign_draftbl_sent_at`, `sign_draftbl_sent_by`, `sign_draftbl_apprv`, `sign_draftbl_apprv_date`, `sign_draftbl_apprv_at`, `sign_draftbl_apprv_by`, `sign_telex_release`, `sign_telex_release_date`, `sign_telex_release_at`, `sign_telex_release_by`, `sign_origin_docsent`, `sign_origin_docsent_date`, `sign_origin_docsent_at`, `sign_origin_docsent_by`, `sign_toppay_balance`, `sign_toppay_balance_date`, `sign_toppay_balance_at`, `sign_toppay_balance_by`, `sign_etd`, `sign_etd_date`, `sign_etd_at`, `sign_etd_by`, `sign_eta`, `sign_eta_date`, `sign_eta_at`, `sign_eta_by`) VALUES
	(1, 1, 1, '0058/SKP-EXP/PI/07/2022', 1, '06_10_2021__Invoice_585.pdf', '2022-07-15', '2022-07-15 17:23:00', 41, 1, 'CA_-_Libur_Hari_Raya_Idul_Fitri.pdf', '2022-09-02', '2022-09-02 14:11:44', 4, 1, 'TOP 30 DAYS', NULL, '2022-07-21', '2022-07-21 10:30:46', 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'surrender_BL1.pdf', '2022-07-23', '2022-08-01 10:23:07', 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'GMO_Statement-KAZ.pdf', '2022-07-21', '2022-07-21 14:19:03', 10, 1, NULL, '2022-07-21', '2022-07-21 13:10:06', 10, 1, NULL, '2022-07-21', '2022-07-21 12:04:46', 10, 1, 'Surat_Pernyataan_Eksport_-_Produk_Kemasan_Berbeda_KAZ.pdf', '2022-07-21', '2022-07-21 14:05:43', 10, NULL, NULL, NULL, NULL, NULL, 1, 'Ketentuan_Kazakhstan_V2_3_(3_Hanger).pdf', '2021-06-15', '2022-07-21 14:59:50', 6, 1, '2021-06-15', '2022-07-21 14:58:54', 6, NULL, NULL, NULL, NULL, 1, '2021-06-15', '2022-07-21 14:58:04', 6, 1, '2021-07-05', '2022-07-21 14:55:38', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-13', '2022-08-01 10:27:31', 27, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-20', '2022-08-01 10:29:47', 27, 1, '2022-07-22', '2022-08-01 10:33:03', 27, NULL, NULL, NULL, NULL, 1, '2022-07-28', '2022-08-01 10:33:40', 27, NULL, NULL, NULL, NULL, 1, '2022-07-23', '2022-08-01 10:36:38', 27, NULL, NULL, NULL, NULL);

-- Dumping structure for table gpd_gexp.gexp_specdet_product
DROP TABLE IF EXISTS `gexp_specdet_product`;
CREATE TABLE IF NOT EXISTS `gexp_specdet_product` (
  `gexp_specdet_id` int(11) NOT NULL AUTO_INCREMENT,
  `gexp_specdet_head` int(11) DEFAULT NULL,
  `gexp_specdet_invoice` int(11) DEFAULT NULL,
  `gexp_specdet_item` int(11) DEFAULT NULL,
  `gexp_specdet_desc` text DEFAULT NULL,
  `gexp_specdet_physical_form` varchar(255) DEFAULT NULL,
  `gexp_specdet_physical_texture` varchar(255) DEFAULT NULL,
  `gexp_specdet_physical_colour` varchar(255) DEFAULT NULL,
  `gexp_specdet_physical_taste` varchar(255) DEFAULT NULL,
  `gexp_specdet_physical_odour` varchar(255) DEFAULT NULL,
  `gexp_specdet_chemical_fat` varchar(255) DEFAULT NULL,
  `gexp_specdet_chemical_moisture` varchar(255) DEFAULT NULL,
  `gexp_specdet_chemical_caffeine` varchar(255) DEFAULT NULL,
  `gexp_specdet_micro_platecount` varchar(255) DEFAULT NULL,
  `gexp_specdet_micro_mouldyeast` varchar(255) DEFAULT NULL,
  `gexp_specdet_micro_coliform` varchar(255) DEFAULT NULL,
  `gexp_specdet_micro_salmonella` varchar(255) DEFAULT NULL,
  `gexp_specdet_heamet_lead` varchar(255) DEFAULT NULL,
  `gexp_specdet_heamet_arsenic` varchar(255) DEFAULT NULL,
  `gexp_specdet_heamet_mercury` varchar(255) DEFAULT NULL,
  `gexp_specdet_heamet_tin` varchar(255) DEFAULT NULL,
  `gexp_specdet_heamet_cadmium` varchar(255) DEFAULT NULL,
  `gexp_specdet_inregdient` varchar(255) DEFAULT NULL,
  `gexp_specdet_prodshelife` varchar(255) DEFAULT NULL,
  `gexp_specdet_packmate` varchar(255) DEFAULT NULL,
  `gexp_specdet_storeconreq` varchar(255) DEFAULT NULL,
  `gexp_specdet_fun_foodmaterial` varchar(255) DEFAULT NULL,
  `gexp_specdet_usage` varchar(255) DEFAULT NULL,
  `gexp_specdet_allergen` varchar(255) DEFAULT NULL,
  `gexp_specdet_countorigin` varchar(255) DEFAULT NULL,
  `gexp_specdet_createdat` datetime DEFAULT NULL,
  `gexp_specdet_createdby` int(11) DEFAULT NULL,
  PRIMARY KEY (`gexp_specdet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_specdet_product: ~1 rows (approximately)
DELETE FROM `gexp_specdet_product`;
INSERT INTO `gexp_specdet_product` (`gexp_specdet_id`, `gexp_specdet_head`, `gexp_specdet_invoice`, `gexp_specdet_item`, `gexp_specdet_desc`, `gexp_specdet_physical_form`, `gexp_specdet_physical_texture`, `gexp_specdet_physical_colour`, `gexp_specdet_physical_taste`, `gexp_specdet_physical_odour`, `gexp_specdet_chemical_fat`, `gexp_specdet_chemical_moisture`, `gexp_specdet_chemical_caffeine`, `gexp_specdet_micro_platecount`, `gexp_specdet_micro_mouldyeast`, `gexp_specdet_micro_coliform`, `gexp_specdet_micro_salmonella`, `gexp_specdet_heamet_lead`, `gexp_specdet_heamet_arsenic`, `gexp_specdet_heamet_mercury`, `gexp_specdet_heamet_tin`, `gexp_specdet_heamet_cadmium`, `gexp_specdet_inregdient`, `gexp_specdet_prodshelife`, `gexp_specdet_packmate`, `gexp_specdet_storeconreq`, `gexp_specdet_fun_foodmaterial`, `gexp_specdet_usage`, `gexp_specdet_allergen`, `gexp_specdet_countorigin`, `gexp_specdet_createdat`, `gexp_specdet_createdby`) VALUES
	(1, 1, 1, 4, 'asdada', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '<p><br></p>', '<p><br></p>', '<p><br></p>', '<p><br></p>', '<p><br></p>', '<p><br></p>', '<p><br></p>', '<p><br></p>', '2022-08-31 11:15:05', 10);

-- Dumping structure for table gpd_gexp.gexp_spp_item
DROP TABLE IF EXISTS `gexp_spp_item`;
CREATE TABLE IF NOT EXISTS `gexp_spp_item` (
  `spp_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `spp_headid` int(11) DEFAULT NULL,
  `spp_itemid` int(11) DEFAULT NULL,
  `spp_nama_dagang_lokal` varchar(255) DEFAULT NULL,
  `spp_nama_jenis_lokal` varchar(255) DEFAULT NULL,
  `spp_no_md_lokal` varchar(255) DEFAULT NULL,
  `spp_nama_dagang_ekspor` varchar(255) DEFAULT NULL,
  `spp_nama_jenis_ekspor` varchar(255) DEFAULT NULL,
  `spp_det_createdat` datetime DEFAULT NULL,
  `spp_det_createdby` int(11) DEFAULT NULL,
  PRIMARY KEY (`spp_det_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_spp_item: ~2 rows (approximately)
DELETE FROM `gexp_spp_item`;
INSERT INTO `gexp_spp_item` (`spp_det_id`, `spp_headid`, `spp_itemid`, `spp_nama_dagang_lokal`, `spp_nama_jenis_lokal`, `spp_no_md_lokal`, `spp_nama_dagang_ekspor`, `spp_nama_jenis_ekspor`, `spp_det_createdat`, `spp_det_createdby`) VALUES
	(1, 1, NULL, 'Caffino', 'Minuman Serbuk 3 in 1 Kopi Latte Mocca', '267011001430', 'Caffino', 'Caffino Cappuccino Mocca Pouch', '2022-07-21 12:21:25', 10),
	(2, 1, NULL, 'GADJAH', 'Kopi tubruk', '268713001318', 'GADJAH', 'Ground Coffee', '2022-07-21 14:39:21', 10);

-- Dumping structure for table gpd_gexp.gexp_users
DROP TABLE IF EXISTS `gexp_users`;
CREATE TABLE IF NOT EXISTS `gexp_users` (
  `UsersId` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(255) DEFAULT NULL,
  `UserPassword` varchar(255) DEFAULT NULL,
  `AccountName` varchar(255) DEFAULT NULL,
  `UserEmail` varchar(255) DEFAULT NULL,
  `UserPhone` varchar(255) DEFAULT NULL,
  `UserJabatan` varchar(255) DEFAULT NULL,
  `UserGroup` int(11) DEFAULT NULL,
  `isStatus` int(11) DEFAULT 1,
  `HashToken` text DEFAULT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `UpdateAt` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `LastLogin` datetime DEFAULT NULL,
  `isAccess` int(11) DEFAULT 0,
  PRIMARY KEY (`UsersId`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gexp_users: ~32 rows (approximately)
DELETE FROM `gexp_users`;
INSERT INTO `gexp_users` (`UsersId`, `UserName`, `UserPassword`, `AccountName`, `UserEmail`, `UserPhone`, `UserJabatan`, `UserGroup`, `isStatus`, `HashToken`, `CreatedAt`, `CreatedBy`, `UpdateAt`, `UpdateBy`, `LastLogin`, `isAccess`) VALUES
	(1, 'administrator', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'administrator', 'nursaid@gonusa-distribusi.com', '-', 'Bussiness Analyst', 1, 1, 'MTBjMTIxMmY4ZjZmZTMyYTg0MDYzM2ExNDBiZjUwODgyNjJlNDkxZA==', '2021-09-29 13:12:32', 0, NULL, NULL, '2022-08-22 13:58:42', 1),
	(3, 'admin01', '18c6d818ae35a3e8279b5330eda01498', 'admin01', 'r.kurnain@gmail.com', '085695332565', NULL, 2, 1, 'ZTg2ZTY4NWVhMGZmMTBlMWVhOTQyYmE2NDdlNjNmZWEyMzgzZmEwYg==', NULL, NULL, NULL, NULL, '2022-03-26 13:02:56', 0),
	(4, 'sales01', '827ccb0eea8a706c4c34a16891f84e7b', 'Sales 01', 'kurnain.arsyi@gonusa-distribusi.com', '085695332565', 'Sales Officer', 20, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-09-06 09:50:17', 0),
	(5, 'warehouse01', '827ccb0eea8a706c4c34a16891f84e7b', 'warehouse 01', 'warehouse01@gmail.com', '085695332565', NULL, 21, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-08-31 11:08:10', 0),
	(6, 'ppic01', '827ccb0eea8a706c4c34a16891f84e7b', 'PPIC 01', 'ppic01@gmail.com', '085695332565', NULL, 22, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-08-01 14:50:05', 0),
	(7, 'evi.susanti', '827ccb0eea8a706c4c34a16891f84e7b', 'Evi Susanti', 'evi.susanti@sumberkopiprima.com', '-', 'Finance', 23, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-08-22 09:32:13', 0),
	(8, 'procurement01', '827ccb0eea8a706c4c34a16891f84e7b', 'Procurement01', 'procurement01@gmail.com', '085695332565', NULL, 24, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-05-17 10:34:41', 0),
	(9, 'qc01', '827ccb0eea8a706c4c34a16891f84e7b', 'QC 01', 'qc01@gmail.com', '085695332565', NULL, 25, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-08-04 12:03:07', 0),
	(10, 'qa01', '827ccb0eea8a706c4c34a16891f84e7b', 'QA 01', 'qa01@gmail.com', '085695332565', NULL, 26, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-08-31 14:59:57', 0),
	(11, 'root02', '827ccb0eea8a706c4c34a16891f84e7b', 'MUHAMMAD RIFKY', 'muhammadrifky.mrky@gmail.com', '085695332565', NULL, 1, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, 0, NULL, NULL, '2022-05-09 14:34:55', 0),
	(12, 'adrian.tan', '827ccb0eea8a706c4c34a16891f84e7b', 'Adrian Tan', 'adrian.tan@gonusa-distribusi.com', '-', 'Business Development Manager', 20, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-08-25 17:24:01', 0),
	(13, 'stefanus.santoso', '827ccb0eea8a706c4c34a16891f84e7b', 'Stefanus Santoso', 'stefanus.santoso@gonusa-distribusi.com', '-', 'Global Bussiness Manager', 20, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-07-21 13:37:34', 0),
	(14, 'ari.sutanto', '827ccb0eea8a706c4c34a16891f84e7b', 'Yohanes Ari Sutanto', 'ari.sutanto@gonusa-distribusi.com', '-', 'Business Development Manager', 20, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-07-15 16:11:30', 0),
	(15, 'yosi', '827ccb0eea8a706c4c34a16891f84e7b', 'Yosi Subiyantoro', 'spv.whs.kds@sumberkopiprima.com', '-', 'Spv Warehouse', 21, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-08-22 11:37:51', 0),
	(16, 'berlian', '827ccb0eea8a706c4c34a16891f84e7b', 'Berlian Nisaazizah', 'spv.whs.kds@sumberkopiprima.com', '-', 'Spv Warehouse', 21, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-05-27 11:12:22', 0),
	(17, 'simon', '827ccb0eea8a706c4c34a16891f84e7b', 'Simon', 'simon@sumberkopiprima.com', '-', 'PPIC Assistent Manager', 22, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-08-09 11:18:34', 0),
	(18, 'alvin', '827ccb0eea8a706c4c34a16891f84e7b', 'Alvin Cristoby Fenan', 'alvin.c.fenan@sumberkopiprima.com', '-', 'PPIC Staff', 22, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-05-27 14:43:46', 0),
	(19, 'peter', '827ccb0eea8a706c4c34a16891f84e7b', 'Peter Adi Prasetya Gunawan', 'peter.a.prasetya@sumberkopiprima.com', '-', 'PPIC Staff', 22, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-05-31 10:51:03', 0),
	(20, 'annisa', '827ccb0eea8a706c4c34a16891f84e7b', 'Annisa Fitria Ningrum', 'anissa.f.ningrum@sumberkopiprima.com ', '-', 'PPIC Staff', 22, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-05-25 15:44:08', 0),
	(21, 'nico', '827ccb0eea8a706c4c34a16891f84e7b', 'Nico Christian Lysander', 'spv.whs.mjk@sumberkopiprima.com', '-', 'Spv Warehouse', 21, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-08-01 10:42:46', 0),
	(22, 'rizky', '827ccb0eea8a706c4c34a16891f84e7b', 'Rizky Anggriawan', 'spv.whs.mjk@sumberkopiprima.com', '-', 'Spv Warehouse', 21, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-07-16 09:07:14', 0),
	(23, 'yoko', '827ccb0eea8a706c4c34a16891f84e7b', 'Yoko Listiyanto', 'yoko.listiyanto@sumberkopiprima.com', '-', 'QA Staff', 26, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-06-17 14:47:13', 0),
	(24, 'shofa', '827ccb0eea8a706c4c34a16891f84e7b', 'Shofa Istiana', 'yoko.listiyanto@sumberkopiprima.com', '-', 'QA Staff', 26, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-05-27 17:20:03', 0),
	(25, 'slamet.supriyadi', '827ccb0eea8a706c4c34a16891f84e7b', 'Slamet Supriyadi', 'slamet.supriyadi@sumberkopiprima.com', '-', 'QA Manager', 26, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-07-21 13:33:26', 0),
	(26, 'riska', '827ccb0eea8a706c4c34a16891f84e7b', 'Riska Alvia Novita', 'riska.a.novita@sumberkopiprima.com', '-', 'QA Staff', 26, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-05-31 09:48:24', 0),
	(27, 'ricki.harlis', '827ccb0eea8a706c4c34a16891f84e7b', 'Ricki Harlis', 'ricki.harlis@sumberkopiprima.com', '-', 'Procurement', 24, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-08-01 13:43:17', 0),
	(28, 'developer', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'Administrator Dev', 'Muhammad.Rifky@gonusa-distribusi.com', '-', 'IT Developer', 1, 1, 'MTBjMTIxMmY4ZjZmZTMyYTg0MDYzM2ExNDBiZjUwODgyNjJlNDkxZA==', '2021-09-29 13:12:32', 0, NULL, NULL, '2022-04-25 14:45:42', 1),
	(29, 'josep', '827ccb0eea8a706c4c34a16891f84e7b', 'Josep', 'spv.qc.kds@sumberkopiprima.com', '-', 'QC Kudus', 25, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-05-24 15:50:35', 0),
	(30, 'albert', '827ccb0eea8a706c4c34a16891f84e7b', 'Albert', 'spv.qc.kds@sumberkopiprima.com', '-', 'QC Kudus', 25, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-05-25 15:28:05', 0),
	(31, 'anita.margareta', '827ccb0eea8a706c4c34a16891f84e7b', 'Anita Margareta', 'anita.margareta@sumberkopiprima.com', '-', 'QC Manager', 25, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-08-16 15:38:00', 0),
	(32, 'djie.livanny', '827ccb0eea8a706c4c34a16891f84e7b', 'Djie Livanny', 'djie.livanny@sumberkopiprima.com', '-', 'Finance', 23, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-05-31 10:55:00', 0),
	(41, 'fahna.nur.santika', '827ccb0eea8a706c4c34a16891f84e7b', 'Fahna Nur Santika', 'fahna.nur.santika@gonusa-distribusi.com', '-', 'Business Development Manager', 20, 1, 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', NULL, NULL, NULL, NULL, '2022-08-01 11:14:03', 0);

-- Dumping structure for view gpd_gexp.gexp_view_ketentuan_exp
DROP VIEW IF EXISTS `gexp_view_ketentuan_exp`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `gexp_view_ketentuan_exp` (
	`gexp_expreq_id` INT(11) NULL COMMENT 'Gexp Export Required',
	`gexp_expreq_pi_id` INT(11) NULL,
	`gexp_expreq_remark` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`gexp_pi_no` VARCHAR(255) NULL COMMENT 'No PI' COLLATE 'utf8mb4_general_ci',
	`gexp_pi_date` DATE NULL COMMENT 'PI creation Date',
	`CustCompanyName` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`CountryName` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`gexp_pi_statusPI` VARCHAR(8) NULL COLLATE 'utf8mb4_general_ci',
	`gexp_pi_statusPI_label` VARCHAR(7) NULL COLLATE 'utf8mb4_general_ci',
	`gexp_expreq_statusDoc` VARCHAR(8) NULL COLLATE 'utf8mb4_general_ci',
	`gexp_expreq_statusDoc_label` VARCHAR(7) NULL COLLATE 'utf8mb4_general_ci',
	`gexp_expreq_statusDoc_id` INT(11) NULL,
	`gexp_expreq_docval_id` INT(11) NULL,
	`gexp_expreq_doc02_id` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`gexp_expreq_ValRevisi` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`gexp_expreq_DateRevisi` VARCHAR(19) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for table gpd_gexp.gimp_consignee
DROP TABLE IF EXISTS `gimp_consignee`;
CREATE TABLE IF NOT EXISTS `gimp_consignee` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `code` (`code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gimp_consignee: ~3 rows (approximately)
DELETE FROM `gimp_consignee`;
INSERT INTO `gimp_consignee` (`id`, `code`, `name`) VALUES
	(1, 'GDA', 'Global Dairy Alami'),
	(2, 'PTB', 'Prima Top Boga'),
	(3, 'SKP', 'Sumber Kopi Prima');

-- Dumping structure for table gpd_gexp.gimp_docim
DROP TABLE IF EXISTS `gimp_docim`;
CREATE TABLE IF NOT EXISTS `gimp_docim` (
  `docim_id` int(11) NOT NULL AUTO_INCREMENT,
  `docim_po` varchar(255) DEFAULT NULL,
  `docim_ship_numbers` varchar(255) DEFAULT NULL,
  `docim_pengirim` varchar(255) DEFAULT NULL,
  `docim_penjual` varchar(255) DEFAULT NULL,
  `docim_consignee` varchar(255) DEFAULT NULL,
  `docim_commodity` varchar(255) DEFAULT NULL,
  `docim_category` varchar(255) DEFAULT NULL,
  `docim_hscode` varchar(255) DEFAULT NULL,
  `docim_lartas` varchar(255) DEFAULT NULL,
  `docim_term` varchar(255) DEFAULT NULL,
  `docim_HBL` varchar(255) DEFAULT NULL,
  `docim_MBL` varchar(255) DEFAULT NULL,
  `docim_qty_container` varchar(255) DEFAULT NULL,
  `docim_no_container` varchar(255) DEFAULT NULL,
  `docim_good_qty` decimal(20,0) unsigned DEFAULT 0,
  `docim_good_uom` varchar(255) DEFAULT NULL,
  `docim_GW` decimal(20,2) unsigned DEFAULT 0.00,
  `docim_NW` decimal(20,2) unsigned DEFAULT 0.00,
  `docim_CBM` decimal(20,0) DEFAULT 0,
  `docim_POL` varchar(255) DEFAULT NULL,
  `docim_POD` varchar(255) DEFAULT NULL,
  `docim_ETD` date DEFAULT NULL,
  `docim_ETA` date DEFAULT NULL,
  `docim_PIB_AJU` varchar(255) DEFAULT NULL,
  `docim_COO` varchar(255) DEFAULT NULL,
  `docim_masterlist` varchar(255) DEFAULT NULL,
  `docim_rcvd_oridoc` date DEFAULT NULL,
  `docim_billing` date DEFAULT NULL,
  `docim_spjm` date DEFAULT NULL,
  `docim_spjk` date DEFAULT NULL,
  `docim_sppb` date DEFAULT NULL,
  `docim_pickup_do` date DEFAULT NULL,
  `docim_delivery` date DEFAULT NULL,
  `docim_remarks` varchar(255) DEFAULT NULL,
  `docim_currency` decimal(20,2) DEFAULT 0.00,
  `docim_CIF` decimal(20,2) DEFAULT 0.00,
  `docim_Duty` decimal(20,2) DEFAULT 0.00,
  `docim_VAT` decimal(20,3) DEFAULT 0.000,
  `docim_TAX` decimal(20,3) DEFAULT 0.000,
  `docim_freight` decimal(20,2) DEFAULT 0.00,
  `docim_handling` decimal(20,2) DEFAULT 0.00,
  `docim_atcost` decimal(20,2) DEFAULT 0.00,
  `docim_additional` decimal(20,0) DEFAULT 0,
  `docim_leadtime` varchar(255) DEFAULT NULL,
  `docim_time` varchar(255) DEFAULT NULL,
  `docim_percent` varchar(255) DEFAULT NULL,
  `docim_cif2` varchar(255) DEFAULT NULL,
  `docim_landed_cost` varchar(255) DEFAULT NULL,
  `docim_persen` varchar(255) DEFAULT NULL,
  `docim_forwarder` varchar(255) DEFAULT NULL,
  `docim_stats` int(11) NOT NULL DEFAULT 1,
  `docim_createdAt` datetime DEFAULT NULL,
  `docim_createdBy` int(11) DEFAULT NULL,
  `docim_created_month` varchar(255) DEFAULT NULL,
  `docim_created_years` varchar(255) DEFAULT NULL,
  `docim_updatedAt` datetime DEFAULT NULL,
  `docim_updatedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`docim_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gimp_docim: ~53 rows (approximately)
DELETE FROM `gimp_docim`;
INSERT INTO `gimp_docim` (`docim_id`, `docim_po`, `docim_ship_numbers`, `docim_pengirim`, `docim_penjual`, `docim_consignee`, `docim_commodity`, `docim_category`, `docim_hscode`, `docim_lartas`, `docim_term`, `docim_HBL`, `docim_MBL`, `docim_qty_container`, `docim_no_container`, `docim_good_qty`, `docim_good_uom`, `docim_GW`, `docim_NW`, `docim_CBM`, `docim_POL`, `docim_POD`, `docim_ETD`, `docim_ETA`, `docim_PIB_AJU`, `docim_COO`, `docim_masterlist`, `docim_rcvd_oridoc`, `docim_billing`, `docim_spjm`, `docim_spjk`, `docim_sppb`, `docim_pickup_do`, `docim_delivery`, `docim_remarks`, `docim_currency`, `docim_CIF`, `docim_Duty`, `docim_VAT`, `docim_TAX`, `docim_freight`, `docim_handling`, `docim_atcost`, `docim_additional`, `docim_leadtime`, `docim_time`, `docim_percent`, `docim_cif2`, `docim_landed_cost`, `docim_persen`, `docim_forwarder`, `docim_stats`, `docim_createdAt`, `docim_createdBy`, `docim_created_month`, `docim_created_years`, `docim_updatedAt`, `docim_updatedBy`) VALUES
	(1, '6950003319', 'SO#19112614', 'KERRY INGREDIENTS (M) SDN. BHD.', '', '3', 'KERRYKREEM L-8094 FOAMING CREAMER', '3', '21069030', 'SKI / BPOM : ST.06.04.104.1045.05.22.008675', '3', '', 'ONEYJHBC07761400', '2X40HC', 'TGBU5296924, DRYU9320013', 2160, '3', 22420.00, 21600.00, 100, 'PASIR GUDANG', 'SEMARANG', '2022-05-05', '2022-05-11', '060100-000259-20220428-001203', 'E-FORM D: KL-202205-CCF-232329-K-044198', 'NO', '2022-05-09', '2022-05-10', '0000-00-00', '0000-00-00', '2022-05-10', '0000-00-00', '2022-05-13', 'DHL AWB 1526824191', 14353.00, 58968.00, 0.00, 11.000, 2.500, 0.00, 6900000.00, 6790220.00, 0, '1 Days', '2', '0', '846367704', '13690220', '0', 'AEROSWAN', 1, '2022-04-28 15:42:53', 2, '04', '2022', '2022-07-29 13:39:21', 4),
	(2, 'PO-SKP/087-18042022', 'SO#19189976', 'KERRY INGREDIENTS (M) SDN. BHD.', 'NO. 8 JALAN HASIL DUA TAMPOI 81200 JOHOR BAHRU, JOHOR, MALAYSIA', '3', 'KERRYKREEM L-8094 FOAMING CREAMER IMPORTING COUNTRY', '3', '21069030', 'SKI / BPOM :', '3', '', 'ONEYJHBC10044600', '2X40', 'FFAU1865465 / MY323972A, GAOU6535736 / MY323978A', 2160, '3', 22421.00, 21600.00, 0, 'MALAYSIA', 'SEMARANG', '2022-05-15', '2022-05-27', '', 'FORM D :', 'NO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DHL 5160136881', 14441.00, 80568.00, 0.00, 11.000, 2.500, 0.00, 0.00, 0.00, 0, '', '', '0', '1163482488', 'NaN', '0', 'AEROSWAN', 3, '2022-05-17 09:37:17', 4, '05', '2022', '2022-05-30 14:26:30', 4),
	(3, '12375', '81687', 'LIL ORBITS', '', '2', 'PANCAKE MACHINE  COMPLETE UNI – MATIC W/DRIVE MOTORS', '1', '84388021', 'NO LARTAS', '5', 'ORD/CGK/015863', '157-80243273', 'AIR', 'AIR', 1, '2', 44.45, 0.00, 0, 'CHICAGO-USA', 'Jakarta', '2022-05-22', '2022-05-25', '51841', 'NO COO', 'NO', '0000-00-00', '2022-05-27', '0000-00-00', '0000-00-00', '2022-05-27', '0000-00-00', '2022-05-30', '', 14682.00, 7064.50, 5.00, 11.000, 2.500, 0.00, 14747280.00, 772892.00, 5616000, '5 Days', '5', '0', '103720989', '534125117', '5', 'ECULINE', 1, '2022-05-19 13:24:11', 4, '05', '2022', '2022-07-29 13:39:05', 4),
	(4, 'PO-SKP/087-18042022', 'SO#19189976', 'KERRY INGREDIENTS (M) SDN. BHD.', '', '3', 'KERRYKREEM L-8094 FOAMING CREAMER', '3', '21069030', 'SKI / BPOM : NO. ST.06.04.104.1045.05.22.008764', '3', '', 'ONEYJHBC10044600', '2X40', 'FFAU1865465 / MY323972A, GAOU6535736 / MY323978A', 2160, '3', 2242.80, 21600.00, 0, 'PASIR GUDANG-MALAYSIA', 'SEMARANG', '2022-05-15', '2022-05-27', '01205', 'E-FORM D : KL-202205-CCF-232329-K-047661', 'NO', '2022-05-18', '2022-05-27', '0000-00-00', '0000-00-00', '2022-05-30', '0000-00-00', '2022-05-31', 'DHL 5160136881', 14682.00, 80568.00, 0.00, 11.000, 2.500, 0.00, 6900000.00, 6466780.00, 0, '3 Days', '4', '0', '1182899376', '13366780', '0', 'AEROSWAN', 1, '2022-05-19 13:46:18', 4, '05', '2022', '2022-07-29 13:38:48', 4),
	(5, '', 'N.188/E', 'SICEM S.R.L', '', '1', 'WHEAT HAY BIG BALES', '2', '1214.9', 'NO LARTAS', '3', 'RAN0019185', 'MEDULV454565', '14X40HC', 'ATTACHED', 434, '8', 253000.00, 0.00, 0, 'RAVENNA, IT', 'Jakarta', '2022-04-07', '2022-06-05', '830', 'C22410097409', 'NO', '2022-04-22', '2022-06-06', '0000-00-00', '0000-00-00', '2022-06-08', '0000-00-00', '2022-06-09', '', 15679.62, 61985.00, 5.00, 11.000, 2.500, 0.00, 44291800.00, 0.00, 0, '4 Days', '4', '0', '971901245.7', '4903798029', '5', 'MGM', 1, '2022-05-19 15:07:34', 4, '05', '2022', '2022-07-29 13:38:28', 4),
	(6, '12757', '', 'SHANGHAI SANJIN IMPORT & EXPORT CO.,LTD', '', '2', 'TRAY SOVOL MINIS 5 DAYS', '4', '8438.9019', 'NO LARTAS', '1', '', '', '1X20', '', 683, '1', 0.00, 0.00, 0, 'SHANGHAI', 'Jakarta', NULL, NULL, '', '', 'NO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0.00, 4004000.00, 0.00, 11.000, 2.500, 0.00, 0.00, 0.00, 0, '', '', 'NaN', '0', '0', '0', '', 1, '2022-05-19 15:18:37', 4, '05', '2022', NULL, NULL),
	(7, '4960004479, 4960004938', '', 'ARTHA DAIRY PLANNING & SUPPORT', '', '1', 'CRACKER ROLL', '4', '8433.52.00', 'NO LARTAS', '3', 'NEU-58875294', '297-82430596', 'AIR', 'AIR', 1, '1', 568.00, 0.00, 0, 'PORTLAND, USA', 'Jakarta', '2022-06-03', '2022-06-11', '851', 'NO COO', 'NO', '2022-06-10', '2022-06-13', '0000-00-00', '0000-00-00', '2022-06-14', '0000-00-00', '2022-06-16', '', 14.64, 35613.02, 5.00, 11.000, 2.500, 0.00, 3825624.00, 10794511.00, 211000, '5 Days', '6', '28', '521232.1607199999', '17226296', '33', 'MGM', 1, '2022-06-03 10:37:02', 4, '06', '2022', '2022-07-04 14:51:18', 2),
	(8, '4960004479, 4960004938', '', 'ARTHA DAIRY PLANNING & SUPPORT', '', '1', 'CRACKER ROLL', '4', '4010.39.00', 'NO LARTAS', '3', 'NEU-58875294', '297-82430596', 'AIR', 'AIR', 1, '1', 568.00, 0.00, 0, 'USA', 'Jakarta', '2022-06-03', '2022-06-11', '', '', 'NO', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, '', 14636.00, 35613.02, 5.00, 11.000, 2.500, 0.00, 0.00, 0.00, 0, 'NaN Days', '', '0', '521232160.71999997', '2606160804', '5', '', 3, '2022-06-03 10:40:03', 4, '06', '2022', '2022-06-03 10:58:35', 4),
	(9, '1231432424', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0.00, 0.00, 0, '', '', '0000-00-00', NULL, '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, '', 0.00, 0.00, 0.00, 0.000, 0.000, 0.00, 0.00, 0.00, 0, '', '', '', '0', '0', '0', '', 3, '2022-06-03 10:50:06', 1, '06', '2022', '2022-06-03 10:53:03', 1),
	(10, '4960004479, 4960004938', '', 'ARTHA DAIRY PLANNING & SUPPORT', '', '1', 'CRACKER ROLL', '4', '4010.39.00', 'NO LARTAS', '3', 'NEU-58875294', '297-82430596', 'AIR', 'AIR', 1, '1', 568.00, 0.00, 0, 'PORTLAND, USA', 'CGK, Jakarta', '2022-06-03', '2022-06-11', '', '', 'NO', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, '', 14.64, 35613.02, 5.00, 11.000, 2.500, 0.00, 0.00, 0.00, 0, 'NaN Days', '', '0', '521232.1607199999', '2606161', '5', '', 3, '2022-06-03 10:58:23', 4, '06', '2022', '2022-06-03 10:58:49', 4),
	(11, 'PO-SKP/0082-25032022', '', 'RENGER INTERNATIONAL SDN BHD', 'WHC', '3', 'Instant Coffee WHC', '3', '2101.11.10', 'SKI BPOM : ST.06.04.104.1045.06.22.008917', '3', '', '218550977', '1X20', '', 276, '7', 7396.80, 0.00, 25, 'TANJUNG PELEPAS, MALAYSIA', 'SEMARANG', '2022-06-03', '2022-06-11', '1211', 'E-FORM D: KL-202206-CCF-712801-P-056596', 'NO', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 14636.00, 55752.00, 0.00, 11.000, 2.500, 0.00, 0.00, 0.00, 0, 'NaN Days', '', '0', '815986272', '0', '0', 'AEROSWAN', 1, '2022-06-06 10:47:52', 4, '06', '2022', '2022-07-01 10:32:46', 4),
	(12, '4960005518', '', 'Suzhou Enviro Filtration Industry Co.,Ltd', '', '1', 'BELT PRESS FILTER BELT ', '3', '84799090', '', '2', '', '274398636079', 'AIR', 'AIR BY (FEDEX)', 1, '10', 38.00, 0.00, 0, 'Shozou China', 'SUBANG', '2022-06-23', '2022-06-29', 'NO PIB', '', 'NO', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2022-06-29', '', 14837.00, 965.00, 5.00, 11.000, 0.000, 0.00, 802000.00, 0.00, 0, 'NaN Days', '', '0', '14317705', '72390525', '5', 'FEDEX', 1, '2022-06-06 11:06:29', 4, '06', '2022', '2022-07-01 10:53:43', 4),
	(13, '4960004711, 4960004806', '', 'TOTAL DAIRY MANAGEMENT (TDM)', 'NUTRISERVICE S.R.L.', '1', 'PEDOMETER', '4', '8434.9', 'NO LARTAS', '5', 'SLE03400386', '91015536706', 'AIR', 'AIR', 3, '1', 430.20, 0.00, 768, 'MALPENSA, MILANO', 'CGK', '2022-04-21', '2022-05-09', '13425', 'NO COO', 'NO', '0000-00-00', '2022-05-10', '0000-00-00', '0000-00-00', '2022-05-11', '0000-00-00', '2022-05-12', '', 15514.30, 142763.00, 5.00, 11.000, 2.500, 0.00, 88206420.00, 7354204.00, 0, 'NaN Days', '3', '0', '2214868010.9', '11169900679', '5', 'AEROSWAN', 1, '2022-06-07 09:31:07', 4, '06', '2022', '2022-07-29 13:39:38', 4),
	(14, '4960004067, 4960003763, 4960003753', 'INV: 4/328,  INV: 4/329', 'TOTAL DAIRY MANAGEMENT (TDM)', 'NUTRISERVICE S.R.L.', '1', 'MILK METER ASSY', '4', '8434.901', 'NO LARTAS', '5', 'NEC01500709', '618/43622202', '4 PKG', 'AIR', 4, '1', 1013.00, 1013.00, 1013, 'Milan', 'Jakarta', '2022-01-05', '2022-01-09', '12470', 'NO COO', 'NO', '0000-00-00', '2022-01-10', '2022-01-11', '0000-00-00', '2022-01-12', '0000-00-00', '2022-01-13', '', 14255.00, 113944.11, 5.00, 11.000, 2.500, 67671500.00, 9243500.00, 12378015.00, 0, 'NaN Days', '4', '0', '1624273288.05', '8142987955', '5', 'AEROSWAN', 1, '2022-06-07 13:58:52', 4, '06', '2022', '2022-07-29 13:49:43', 4),
	(15, '27720380', '27720380', 'TETRA PAK SOUTH EAST ASIA', 'TETRA PAK', '1', 'GRANULATE SUPPLY UNIT', '1', '84229090', 'NO LARTAS', '3', '27720380', '', 'LCL', 'NYKU5134721 / WWA010158380"', 1, '2', 550.00, 360.00, 4101, 'HAMBURG', 'Jakarta', '2021-12-09', '2022-01-19', '1962', 'NO', 'NO', '0000-00-00', '2022-01-19', '0000-00-00', '0000-00-00', '2022-01-20', '0000-00-00', '2022-01-24', '', 14341.00, 21.00, 5.00, 10.000, 2.500, 0.00, 2095555.00, 8398180.00, 0, 'NaN Days', '5', 'NaN', 'NaN', 'NaN', '0', 'PJL', 1, '2022-06-08 08:52:21', 4, '06', '2022', NULL, NULL),
	(16, 'SO#18755708', 'PO#PO-SKP/063-09112021', 'Kerry Ingredients', '', '3', 'KERRYKREEM L-8094', '3', '2106.903', '', '3', '', 'ONEYJHBB33112600', '1X40HC', 'TLLU5583421 / MY521780A', 660, '3', 11355.40, 0.00, 50, 'PASIR GUDANG', 'SEMARANG', '2021-12-26', '2022-01-08', '1174', '', 'NO', '2022-01-03', '2022-01-07', '0000-00-00', '0000-00-00', '2022-01-10', '0000-00-00', '2022-01-12', '', 14255.00, 21930.00, 0.00, 10.000, 2.500, 0.00, 3525000.00, 3207625.00, 0, 'NaN Days', '4', '0', '312612150', '6732625', '0', 'AEROSWAN', 1, '2022-06-08 08:57:38', 4, '06', '2022', '2022-07-29 13:52:28', 4),
	(17, 'SO#18755708', 'PO#PO-SKP/063-09112021', 'Kerry Ingredients', '', '3', 'KERRYKREEM L-8094', '3', '2106.903', '', '3', '', 'ONEYJHBB33112600', '1X40HC', 'TLLU5583421 / MY521780A', 660, '3', 11355.40, 0.00, 50, 'PASIR GUDANG', 'SEMARANG', '2021-12-26', '2022-01-08', '1174', '', 'NO', '2022-01-03', '2022-01-07', '0000-00-00', '0000-00-00', '2022-01-10', '0000-00-00', '2022-01-12', '', 14255.00, 21930.00, 0.00, 0.000, 0.000, 0.00, 0.00, 0.00, 0, 'NaN Days', '', '0', '312612150', '0', '0', '', 1, '2022-06-08 08:57:38', 4, '06', '2022', '2022-07-29 13:52:44', 4),
	(18, 'PO6950003106', 'PO6950003106', 'Renger International SDN BHD', 'WHC', '3', 'Instant Coffee WHC', '3', '2106.903', 'SKI BPOM: ST.06.04.104.1045.01.22.007875  ', '3', '', 'JHB-HSE-2201-0056', '1X40HC', 'MSMU5647486 / FJ12722343', 552, '7', 14793.60, 0.00, 50, 'TANJUNG PELEPAS, MALAYSIA', 'SEMARANG', '2022-01-19', '2022-01-22', '1178', 'E-FORM D: KL-202112-CCF-232329-K-122088  ', 'NO', '2022-01-21', '2022-01-24', '0000-00-00', '0000-00-00', '2022-01-26', '2022-01-26', '2022-01-27', '', 14341.00, 98325.00, 0.00, 10.000, 2.500, 0.00, 3525000.00, 5531024.00, 0, 'NaN Days', '5', '0', '1410078825', '9056024', '0', 'AEROSWAN', 1, '2022-06-08 09:10:30', 4, '06', '2022', '2022-07-29 13:48:58', 4),
	(19, 'PTG037', 'JTJ-SO005286', 'J.T JOHNSON AND SONS PTY. LTD', '', '1', 'WHEATEN STRAW (FEED GRADE)', '2', '1213', 'Kementan  KARANTINA TUMBUHAN KT.2 atau KT.9  Kementan No: 1030/Kpts/PI.500/F/01/2022  ', '3', '', 'OOLU4052461010', '5X40HC', '', 6200, '8', 129510.00, 0.00, 300, 'ADELAIDE', 'Jakarta', '2022-01-23', '2022-01-30', '2', '', 'NO', '2022-02-04', '2022-02-07', '0000-00-00', '0000-00-00', '2022-02-11', '2022-02-04', '2022-02-12', '', 14344.00, 34320.15, 0.00, 10.000, 2.500, 0.00, 24870000.00, 56756270.00, 0, '15 Days', '13', '0', '492288231.6', '81626270', '0', 'MGM', 1, '2022-06-08 09:16:20', 4, '06', '2022', '2022-07-29 13:48:43', 4),
	(20, 'SO#18803143', 'PO#6950003212', 'Kerry Ingredients', '', '3', 'KERRYKREEM L-8094 FOAMING CREAMER', '3', '2106.90.30', '', '3', '', 'ONEYJHBC00097600', '2x40HC', '', 2160, '3', 22420.00, 0.00, 100, 'PASIR GUDANG', 'SEMARANG', '2022-01-30', '2022-02-11', '1185', '', 'NO', '2022-02-07', '2022-02-10', '0000-00-00', '0000-00-00', '2022-02-11', '2022-02-14', '2022-02-15', '', 14360.00, 59400.00, 0.00, 10.000, 2.500, 0.00, 6900000.00, 6350630.00, 0, '4 Days', '4', '0', '852984000', '13250630', '0', 'AEROSWAN', 1, '2022-06-08 09:30:09', 4, '06', '2022', '2022-07-29 13:48:13', 4),
	(21, '', '', 'SANCASIANO', '', '2', 'MIXERS SPARE PARTS', '4', '84389029', 'NO LARTAS', '2', '775923027422', '2363499796', 'AIR', 'BY FEDEX', 1, '1', 2.00, 2.00, 2, 'LONATE POZZOLO IT', 'CGK', '2022-02-01', '2022-02-03', 'NO PIB', 'NO', 'NO', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2022-02-03', '0000-00-00', '2022-02-04', '', 14360.00, 33.70, 5.00, 10.000, 0.000, 0.00, 55.00, 0.00, 0, 'NaN Days', '1', 'NaN', '483932.00000000006', 'NaN', '0', 'FEDEX', 1, '2022-06-08 09:35:23', 4, '06', '2022', '2022-07-29 13:48:28', 4),
	(22, '', '', 'Monde Nissin Corp', '', '3', 'Instant Coffee', '3', '9012120', 'SKI / BPOM :', '5', '8947617372', '', 'AIR', 'DHL', 1, '1', 6.00, 6.00, 0, 'MANILA', 'SURABAYA', '2022-02-10', '2022-02-14', 'NO PIB', '', 'NO', '0000-00-00', '2022-02-14', '0000-00-00', '0000-00-00', '2022-02-18', '0000-00-00', '2022-02-22', '', 14374.00, 46.72, 20.00, 10.000, 7.500, 0.00, 165000.00, 0.00, 0, 'NaN Days', '8', '1', '671553.28', '13596066', '20', 'DHL', 1, '2022-06-08 10:31:18', 4, '06', '2022', '2022-07-29 13:47:59', 4),
	(23, '12380', '', 'ZOURTOUMIDIS KYRIAKOS SIA', '', '2', 'Stator Netzsch', '4', '8438.90.29', 'NO LARTAS', '3', '240375112', '', 'AIR', 'BY FEDEX', 1, '1', 13.00, 0.00, 94, 'Thessaloniki', 'CGK', '2022-02-15', '2022-02-18', '415888', '', 'NO', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2022-02-21', '0000-00-00', '2022-02-23', '', 16300.40, 1780.00, 5.00, 10.000, 2.500, 0.00, 264902.00, 0.00, 0, 'NaN Days', '5', '0', '29014712', '145338462', '5', 'FEDEX', 1, '2022-06-08 10:53:06', 4, '06', '2022', '2022-07-29 13:47:46', 4),
	(24, 'PO6950003206', '', 'Renger International SDN BHD', 'WHC', '3', 'Instant Coffee WHC', '3', '2101.11.10', '', '3', '', '216584986', '1X20', 'MRKU7753967 / ML-MY0794923', 276, '7', 7396.80, 0.00, 25, 'TANJUNG PELEPAS, MALAYSIA', 'SEMARANG', '2022-02-20', '2022-02-26', '1188', '', 'NO', '2022-02-23', '2022-02-25', '0000-00-00', '0000-00-00', '2022-06-25', '2022-03-01', '2022-03-02', 'DHL: 6376636011', 14310.00, 52854.00, 0.00, 10.000, 7.500, 0.00, 3300000.00, 2835753.00, 0, 'NaN Days', '4', '0', '756340740', '6135753', '0', 'AEROSWAN', 1, '2022-06-08 10:57:27', 4, '06', '2022', '2022-07-29 13:47:14', 4),
	(25, '90000244', '90000244', 'SHANGHAI HITEC PLASTICS', '', '1', 'SILAGE BAG', '3', '3919.90.99', 'NO LARTAS', '3', '', 'OOLU2130755810', '1X20', 'CSLU1433179 / OOLHME2283', 60, '1', 13200.00, 0.00, 20, 'SHANGHAI', 'Jakarta', '2022-02-15', '2022-02-26', '402832', '', 'NO', '2022-03-01', '2022-02-26', '0000-00-00', '0000-00-00', '2022-03-01', '2022-03-01', '2022-03-04', 'DHL: 83 0001 4122', 14310.00, 37926.00, 0.00, 10.000, 2.500, 0.00, 4050000.00, 3506270.00, 0, '6 Days', '', '0', '542721060', '7556270', '0', 'AEROSWAN', 1, '2022-06-16 10:48:55', 4, '06', '2022', '2022-07-29 13:47:32', 4),
	(26, '', '', 'IT0676 MAVIGRAFICA SRL', '', '1', 'SURE GOODS', '4', '39219090', 'NO LARTAS', '9', '270135989340', '2363854136', '1PK', 'FEDEX', 1, '1', 1.10, 0.00, 0, 'ROMA', 'CGK', '2022-02-24', '2022-03-01', 'NO', 'NO', 'NO', '0000-00-00', '2022-03-01', '0000-00-00', '0000-00-00', '2022-03-01', '0000-00-00', '2022-03-02', 'FEDEX', 14310.00, 22.69, 0.00, 10.000, 2.500, 0.00, 55000.00, 0.00, 0, '1 Days', '', '0', '324693.9', '55000', '0', 'FEDEX', 1, '2022-06-16 10:55:13', 4, '06', '2022', '2022-07-29 13:46:59', 4),
	(27, 'PTG036', 'JTJ-SO005999', 'J.T JOHNSON AND SONS PTY. LTD', '', '1', 'LUCERNE HAY', '2', '1214.9', 'NO LARTAS', '3', '', 'OOLU4052605170', '5X40HC', '', 5400, '8', 122240.00, 0.00, 300, 'ADELAIDE', 'Jakarta', '2022-02-19', '2022-03-11', '768', '', 'NO', '2022-03-01', '2022-03-11', '0000-00-00', '0000-00-00', '2022-03-11', '0000-00-00', '2022-03-12', 'DHL AWB: 6016269350', 14369.00, 55619.20, 0.00, 10.000, 2.500, 0.00, 17995000.00, 23699501.00, 0, 'NaN Days', '1', '0', '799192284.8', '41694501', '0', 'MGM', 1, '2022-06-16 11:14:53', 4, '06', '2022', '2022-07-29 13:46:11', 4),
	(28, 'PTG040', 'JTJ-SO006218', 'J.T JOHNSON AND SONS PTY. LTD', '', '1', 'LUCERNE HAY (FEED GRADE)', '2', '1214.9', 'NO LARTAS', '3', '', 'OOLU4052731950', '3X40HC', 'OOCU7225714 / OOLGKW7234  OOCU7628638 / OOLGKW7228  CSNU6193308 / OOLGWU1225', 3240, '8', 72240.00, 0.00, 180, 'ADELAIDE', 'Jakarta', '2022-02-19', '2022-03-11', '770', 'FORM AANZ: EC182247340  21FEB2022', 'NO', '2022-03-01', '2022-03-11', '0000-00-00', '0000-00-00', '2022-03-11', '0000-00-00', '2022-03-12', 'DHL AWB: 6016269350', 14369.00, 33230.40, 0.00, 10.000, 2.500, 0.00, 11285000.00, 14325500.00, 0, 'NaN Days', '', '0', '477487617.6', '25610500', '0', 'MGM', 1, '2022-06-21 08:49:31', 4, '06', '2022', '2022-07-29 13:46:28', 4),
	(29, 'PTG043', 'JTJ-SO006220', 'J.T JOHNSON AND SONS PTY. LTD', '', '1', 'OATEN HAY (FEED GRADE)', '2', '1214.9', 'NO LARTAS', '3', '', 'OOLU4052731970', '5X40HC', 'OOCU7933307 / OOLGWU1149  WBPU7026193 / OOLGWU1327  OOCU7599988 / OOLGWU1228  OOLU9193628 / OOLGWU1226  OOLU9875171 / OOLGWU1224', 5400, '8', 129910.00, 0.00, 300, 'ADELAIDE', 'Jakarta', '2022-02-19', '2022-03-15', '769', '', 'NO', '2022-03-01', '2022-03-15', '0000-00-00', '0000-00-00', '2022-03-16', '0000-00-00', '2022-03-18', 'DHL AWB: 6016269350', 14369.00, 42870.30, 0.00, 10.000, 2.500, 0.00, 17995000.00, 23606770.00, 0, 'NaN Days', '3', '0', '616003340.7', '41601770', '0', 'MGM', 1, '2022-06-21 08:54:08', 4, '06', '2022', '2022-07-29 13:43:51', 4),
	(30, 'PTG038', 'JTJ-SO006081', 'J.T JOHNSON AND SONS PTY. LTD', '', '1', 'OATEN HAY (FEED GRADE)', '2', '1214.9', 'NO LARTAS', '3', '', 'OOLU4052652560', '5X40HC', 'OOLU9682594 / OOLGWU1150  OOLU8992424 / H2777993  OOLU9886469 / OOLGKW7212  OOLU9552306 / OOLGWU1155  OOCU8723250 / OOLGWU1154', 5400, '8', 130820.00, 0.00, 300, 'ADELAIDE', 'Jakarta', '2022-02-19', '2022-03-15', '2006', '', 'NO', '2022-03-01', '2022-03-15', '0000-00-00', '0000-00-00', '2022-03-16', '0000-00-00', '2022-03-18', 'DHL AWB: 6016269350', 14369.00, 42516.50, 0.00, 10.000, 2.500, 0.00, 16621000.00, 21148120.00, 0, 'NaN Days', '3', '0', '610919588.5', '37769120', '0', 'PJL', 1, '2022-06-21 09:06:37', 4, '06', '2022', '2022-07-29 13:44:12', 4),
	(31, 'PTG039', 'JTJ-SO006241', 'J.T JOHNSON AND SONS PTY. LTD', '', '1', '', '2', '1214.9', 'NO LARTAS', '3', '', 'OOLU2688090710', '5X40HC', 'CCLU7608041 / OOLGWU1156  OOCU8302950 / H2777994  OOCU6863334 / OOLGWU1271  OOLU9891974 / H2778000  OOCU7588026 / OOLGWU1320', 5400, '8', 126660.00, 0.00, 300, 'ADELAIDE', 'Jakarta', '2022-02-19', '2022-03-15', '2007', '', 'NO', '2022-03-01', '2022-03-15', '0000-00-00', '0000-00-00', '2022-03-16', '0000-00-00', '2022-03-17', 'DHL AWB: 6016269350', 14369.00, 48072.90, 0.00, 10.000, 2.500, 0.00, 16620000.00, 21048120.00, 0, 'NaN Days', '2', '0', '690759500.1', '37668120', '0', 'PJL', 1, '2022-06-21 09:11:42', 4, '06', '2022', '2022-07-29 13:44:29', 4),
	(32, 'PTG041', 'JTJ-SO006219', 'J.T JOHNSON AND SONS PTY. LTD', '', '1', 'WHEATEN STRAW (FEED GRADE', '2', '1213', '', '3', '', 'OOLU4052731980', '5X40HC', 'TCNU6118531 / OOLGKW7364  OOLU8965711 / OOLGKW7366  OOCU7497245 / OOLGKW7363  OOLU9135318 / OOLGKW7365  OOCU7024350 / OOLGKW7362', 6200, '8', 128060.00, 0.00, 300, 'ADELAIDE', 'Jakarta', '2022-02-19', '2022-03-15', '15', '', 'NO', '2022-03-01', '2022-03-15', '0000-00-00', '0000-00-00', '2022-03-17', '0000-00-00', '2022-03-19', 'DHL AWB: 6016269350', 14369.00, 37777.70, 0.00, 10.000, 2.500, 0.00, 22120000.00, 35180720.00, 0, 'NaN Days', '4', '0', '542827771.3', '57300720', '0', 'PJL', 1, '2022-06-21 09:16:37', 4, '06', '2022', '2022-07-29 13:45:13', 4),
	(33, 'PTG042', 'JTJ-SO006451', 'J.T JOHNSON AND SONS PTY. LTD', '', '1', 'WHEATEN STRAW (FEED GRADE)', '2', '1213', '', '3', '', 'OOLU2690550600', '4X40HC', 'OOCU7543633 / OOLGWU1717  TCNU3641554 / OOLGWU1697  TCNU1736753 / OOLGWU1694  XINU8008436 / OOLGWU1689', 4960, '8', 97740.00, 0.00, 240, 'ADELAIDE', 'Jakarta', '2022-02-17', '2022-03-15', '14', '', 'NO', '2022-03-01', '2022-03-18', '0000-00-00', '0000-00-00', '2022-03-19', '0000-00-00', '2022-03-25', '', 14356.00, 28833.30, 0.00, 10.000, 2.500, 0.00, 26905000.00, 24630596.00, 0, '10 Days', '10', '0', '413930854.8', '51535596', '0', 'PJL', 1, '2022-06-21 09:21:33', 4, '06', '2022', '2022-07-29 13:45:31', 4),
	(34, '', 'IN30001988', 'AUSTRALIAN RURAL EXPORTS PTY LTD', '', '1', 'HEAD BREEDING CATTLE', '1', '10221', 'KEMENTAN, KARANTINA', '3', '1522', '1522', '1SHIP', '1SHIP', 936, '1', 396096.48, 0.00, 0, 'PORTLAND, AUSTRALIA', 'JAKARTA', '2022-03-12', '2022-03-22', '276', '', 'NO', '2022-03-16', '2022-04-18', '0000-00-00', '0000-00-00', '2022-03-21', '0000-00-00', '2022-03-22', 'DHL AWB: 5702806561, TRUCKING: 310,000/EKOR HANDLING: 110,000/EKOR ADD: BIAYA PI ANALISIS 10,000,000 BIAYA KOORDINASI PAKAN+OBAT: 25,000,000 BIAYA PAKAN PTP: 1,500,000 BIAYA DOKUMENTASI: 2,500,000 BURUH BONGKAR PAKAN: 3,000,000 Tambahan biaya angkut pakan', 10496.82, 3327510.00, 0.00, 0.000, 2.500, 0.00, 445073664.00, 0.00, 0, 'NaN Days', '', '0', '34928273518.2', '445073664', '0', 'SINATRA + SRIWIJAYA', 1, '2022-06-21 10:46:17', 4, '06', '2022', '2022-07-29 13:43:36', 4),
	(35, '4960004707', 'CH20220242', 'COMFORT HOOF CARE', '', '1', 'BOND365 40-APPLICATION BULK  KNIFE LEFT & RIGHT', '4', '', 'NO LARTAS', '5', '', '67 9246 6450', '1PK', 'BY AIR DHL', 1, '1', 26.31, 0.00, 0, 'CINCINATI, USA', 'CGK', '2022-03-11', '2022-03-12', '3124', 'NO', 'NO', '0000-00-00', '2022-03-17', '0000-00-00', '0000-00-00', '2022-03-18', '0000-00-00', '2022-03-24', '', 14358.00, 1591.00, 12.50, 10.000, 2.500, 0.00, 15942951.00, 623550.00, 0, 'NaN Days', '12', '1', '22843578', '302111226', '13', 'DHL', 1, '2022-06-21 10:53:12', 4, '06', '2022', '2022-07-29 13:45:51', 4),
	(36, '', 'MARCH EX PORT MELBOURNE', 'AUSTRALIAN RURAL EXPORTS PTY LTD', '', '1', 'DOC CERTIFICATE OF PEDIGREE - CATTLE', '4', '4911.10.90', 'NO LARTAS', '10', '', '7719397092', '1PK', 'BY AIR DHL', 1, '1', 5.00, 0.00, 0, 'MELBOURNE', 'CGK', '2022-03-22', '2022-03-24', '21358', 'NO', 'NO', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2022-03-27', '0000-00-00', '2022-03-28', '', 10496.82, 5000.00, 10.00, 10.000, 2.500, 0.00, 165000.00, 0.00, 0, 'NaN Days', '4', '0', '52484100', '525006000', '10', 'DHL', 1, '2022-06-21 11:04:29', 4, '06', '2022', '2022-07-29 13:43:05', 4),
	(37, '', '', 'ALASKA MILK CORP', 'ALASKA MILK CORP', '3', 'KIEVIT VANA BLACA', '3', '21069030', 'NO LARTAS', '10', '', '8415575755', '1PCS', 'BY AIR DHL', 1, '1', 2.36, 0.00, 0, 'MANILA', 'CGK', '2022-03-15', '2022-03-23', 'NO', 'NO', 'NO', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2022-03-30', '0000-00-00', '2022-04-01', '', 14318.00, 40.55, 5.00, 10.000, 2.500, 0.00, 165000.00, 0.00, 0, 'NaN Days', '9', '0', '580594.8999999999', '3067974', '5', 'DHL', 1, '2022-06-21 11:08:58', 4, '06', '2022', '2022-07-29 13:43:20', 4),
	(38, '4960004667', '15328', 'VERSA CORP', '', '1', 'SPARE PARTS', '4', '84369919', 'NO LARTAS', '5', 'ELC22105457', '297-09825104', '1PK', 'AIR', 1, '1', 0.00, 451.00, 0, 'SEATTLE', 'CGK', '2022-03-21', '2022-03-27', '13106', 'NO', 'NO', '0000-00-00', '2022-03-29', '0000-00-00', '0000-00-00', '2022-03-30', '0000-00-00', '2022-03-31', '', 14318.00, 17143.00, 5.00, 10.000, 2.500, 34425900.00, 4801000.00, 5093885.00, 0, 'NaN Days', '4', '0', '245453474', '1237162255', '5', 'AEROSWAN', 1, '2022-06-21 12:00:44', 4, '06', '2022', '2022-07-29 13:42:47', 4),
	(39, 'PTG044', 'JTJ-SO006604', 'J.T JOHNSON AND SONS PTY. LTD', '', '1', 'OATEN HAY', '2', '1214.9', 'NO LARTAS', '3', '', 'OOLU2691049170', '5X40HC', 'OOCU7098970 /AU110844  OOCU8172440 /OOLGWU1482  OOLU9946758 /OOLGKX1966  CSNU6303658 /OOLGWU1483  OOLU6819657 /AU118043', 5400, '8', 129036.00, 0.00, 300, 'ADELAIDE', 'Jakarta', '2022-03-27', '2022-04-04', '798', 'EC182249047  28MAR2022', 'NO', '2022-04-04', '2022-04-04', '0000-00-00', '0000-00-00', '2022-04-06', '0000-00-00', '2022-04-09', 'DHL AWB: 3281492476', 14351.00, 42581.88, 0.00, 11.000, 2.500, 0.00, 18158500.00, 30452512.00, 0, 'NaN Days', '5', '0', '611092559.88', '48611012', '0', 'MGM', 1, '2022-06-21 15:03:58', 4, '06', '2022', '2022-07-29 13:41:29', 4),
	(40, 'PTG045', 'JTJ-SO006608', 'J.T JOHNSON AND SONS PTY. LTD', '', '1', 'OATEN HAY', '1', '1214.9', 'NO LARTAS', '3', '', 'OOLU2691361330', '6X40HC', 'CCLU7138272 /OOLGWU1175  CSNU6678546 /OOLGWU1479  CSNU6788918 /OOLGWU1432  TLLU4889253 /AU110955  OOCU7996368 /OOLGWU1480  UETU5200810 /AU110956', 6480, '8', 155690.00, 0.00, 360, 'ADELAIDE', 'Jakarta', '2022-03-27', '2022-04-04', '796', 'EC182249050  28MAR2022', 'NO', '2022-04-04', '2022-04-04', '0000-00-00', '0000-00-00', '2022-04-06', '0000-00-00', '2022-04-07', '', 14351.00, 54491.50, 0.00, 11.000, 2.500, 0.00, 21544000.00, 29064996.00, 0, 'NaN Days', '3', '0', '782007516.5', '50608996', '0', 'MGM', 1, '2022-06-21 15:08:37', 4, '06', '2022', '2022-07-29 13:41:48', 4),
	(41, 'PTG046', 'JTJ-SO006907', 'J.T JOHNSON AND SONS PTY. LTD', '', '1', 'OATEN HAY', '1', '1214.9', 'NO LARTAS', '3', '', 'OOLU2692142290', '6X40HC', 'OOLU9432511 /OOLGWU1485  CBHU8899785 /OOLGWU1437  OOLU9212332 /OOLGWU1474  CSNU7541748 /OOLGWU1478  FCIU9650542 /OOLGWU1470  FFAU1777662 /OOLGWU1431', 6480, '8', 156420.00, 0.00, 360, 'ADELAIDE', 'Jakarta', '2022-03-27', '2022-04-04', '797', 'EC182249051  28MAR2022', 'NO', '2022-04-04', '2022-04-04', '0000-00-00', '0000-00-00', '2022-04-06', '0000-00-00', '2022-04-08', 'DHL AWB: 3281492476', 14351.00, 54747.00, 0.00, 11.000, 2.500, 0.00, 21544000.00, 34387113.00, 0, 'NaN Days', '4', '0', '785674197', '55931113', '0', 'MGM', 1, '2022-06-27 14:20:52', 4, '06', '2022', '2022-07-29 13:42:10', 4),
	(42, '', 'TBS-01-001/03/2022', 'Tobe Network', 'Dongsuh', '3', 'XCP5', '3', '2106.903', '', '3', '', 'HDMUSELA02701700', '1X40', 'HDMUSELA02701700', 960, '3', 24768.00, 24000.00, 60, 'BUSAN, KOREA', 'SEMARANG', '2022-03-23', '2022-04-08', '1195', '', 'NO', '2022-04-07', '2022-04-06', '0000-00-00', '0000-00-00', '2022-04-06', '0000-00-00', '2022-04-11', 'DHL: 4131184105  Doc baru diterima 7apr dari DHL, BL Ori u/pickup DO IMPORT belum terlaksana', 14318.00, 54480.00, 0.00, 11.000, 2.500, 0.00, 3750000.00, 4998950.00, 0, 'NaN Days', '3', '0', '780044640', '8748950', '0', 'AEROSWAN', 1, '2022-06-30 11:10:26', 4, '06', '2022', '2022-07-29 13:41:11', 4),
	(43, 'PTG048', 'PTG048', 'J.T JOHNSON AND SONS PTY. LTD', '', '1', 'OATEN HAY', '2', '1214.9', 'NO LARTAS', '3', '', 'OOLU2693159040', '4X40HC', 'TEMU8530511 / OOLGWU1477 CBHU9158642 / OOLGWU1609 OOCU7737623 / OOLGWU1614 OOCU7143426 / OOLGWU1487', 4320, '8', 104560.00, 104560.00, 240, 'ADELAIDE', 'JAKARTA', '2022-04-09', '2022-04-17', '000809', 'EC182249785', 'NO', '2022-04-18', '2022-04-18', '0000-00-00', '0000-00-00', '2022-04-19', '0000-00-00', '2022-05-17', '', 14360.00, 36596.00, 0.00, 11.000, 2.500, 0.00, 13456300.00, 21354190.00, 76896550, '30 Days', '30', '0', '525518560', '34810490', '0', 'MGM', 1, '2022-06-30 11:16:00', 4, '06', '2022', '2022-07-29 13:40:54', 4),
	(44, '1000121', '', 'IPI S.R.L SOCIO UNICO', 'IPI S.R.L SOCIO UNICO', '1', 'ASEPTIC FILLER', '1', '8422.19', '', '3', '', 'GEN1364946', '3X40HC', '', 18, '1', 14587.00, 11020.00, 150, 'LA SPEZIA', 'Jakarta', '2022-03-07', '2022-04-23', '18430', 'NO', 'YES', '2022-03-18', '2022-04-25', '0000-00-00', '0000-00-00', '2022-04-26', '2022-04-25', '2022-04-27', 'DHL AWB: 3654102115', 16195.78, 831510.00, 0.35, 11.000, 2.500, 0.00, 23275000.00, 18466445.00, 0, 'NaN Days', '4', '0', '13466953027.800001', '4755175005', '0', 'AEROSWAN', 1, '2022-06-30 11:22:25', 4, '06', '2022', '2022-07-29 13:40:34', 4),
	(45, 'PI N.01-2022', 'N.112/E', 'SICEM S.R.L', '', '1', 'WHEAT HAY BIG BALES', '2', '1214.9', 'NO LARTAS', '3', 'RAN0018876', 'MEDULV102586', '14x40HC', 'SEE BL', 434, '8', 271460.00, 271460.00, 0, 'RAVENNA, IT', 'Jakarta', '2022-02-27', '2022-04-24', '2009', 'NO', 'NO', '2022-04-01', '2022-05-09', '0000-00-00', '0000-00-00', '2022-05-09', '0000-00-00', '2022-06-06', '', 15514.30, 66507.70, 5.00, 11.000, 2.500, 0.00, 4273500.00, 150722411.00, 377531000, 'NaN Days', '43', '0', '1031820410.1099999', '5314097962', '5', 'PJL', 1, '2022-06-30 11:29:16', 4, '06', '2022', '2022-07-29 13:40:11', 4),
	(46, 'S2208PVA019', '12484', 'SHANGHAI SANJIN IMPORT & EXPORT CO.,LTD', '', '2', 'MINI CROISSANT TRAY', '4', '8438.90.19', 'NO LARTAS', '5', 'HWX2204440', '', 'LCL', 'LCL', 3, '9', 1950.00, 1750.00, 4, 'SHANGHAI', 'JAKARTA', '2022-04-29', '2022-05-06', '2097', 'E220625970410009', 'NO', '0000-00-00', '2022-05-09', '0000-00-00', '0000-00-00', '2022-05-10', '0000-00-00', '2022-05-11', '', 14353.00, 20161.64, 0.00, 11.000, 2.500, 2320000.00, 2553000.00, 5898217.00, 0, 'NaN Days', '5', '0', '289380018.92', '8451217', '0', 'PJL', 1, '2022-06-30 11:37:12', 4, '06', '2022', '2022-07-29 13:39:53', 4),
	(47, 'PO-GDA/0062-14022022', '', 'IPI S.R.L SOCIO UNICO', '', '1', 'ASEPTIC PACKAGING MATERIAL', '3', '4811.59.00, 3923.50.90', 'IZIN PI Kehutanan : 04.PI-64.22.0008.2', '', '', '910-15583256', 'AIR', 'OMAN AIR', 4, '7', 696.00, 0.00, 1652, 'MXP MILAN', 'CGK', '2022-06-10', '2022-06-12', '13674', '', 'NO', '0000-00-00', '2022-06-15', '0000-00-00', '0000-00-00', '2022-06-16', '0000-00-00', '2022-06-17', '', 15448.54, 1626.03, 5.00, 11.000, 2.500, 0.00, 7867600.00, 10161252.00, 0, 'NaN Days', '5', '1', '25119789.496200003', '143627799', '6', ' AEROSWAN', 1, '2022-06-30 11:59:37', 4, '06', '2022', '2022-07-04 14:44:35', 2),
	(48, 'PO/SKP/088-25042022', '', 'Kerry Ingredients', '', '3', 'KERRYKREEM L-8094 FOAMING CREAMER', '3', '21069030', 'SKI BPOM: ST.06.04.104.1045.06.22.008991', '3', '', 'ONEYJHBC12117900', '3x40', '"BMOU5388502 / MY545610A TGBU4612057 / MY545896A GCXU5237425 / MY545895A"', 32400, '3', 33631.20, 32400.00, 0, 'PASIR GUDANG, MALAYSIA', 'SEMARANG', '2022-06-17', '2022-06-24', '1212', 'FORM D : KL-202206-CCF-232329-K-059885', 'NO', '0000-00-00', '2022-06-24', '0000-00-00', '0000-00-00', '2022-06-27', '0000-00-00', '2022-06-29', 'DHL AWB 2606959014', 14744.00, 120852.00, 0.00, 11.000, 2.500, 0.00, 0.00, 0.00, 0, 'NaN Days', '5', '0', '1781841888', '0', '0', ' AEROSWAN', 1, '2022-07-01 10:14:22', 4, '07', '2022', NULL, NULL),
	(49, 'PO-SKP/087-18042022-2', 'SO#19189977', 'Kerry Ingredients', '', '3', 'KERRYKREEM L-8094 FOAMING CREAMER', '3', '21069030', 'SKI BPOM: ST.06.04.104.1045.06.22.009059', '3', '', 'ONEYJHBC10046800', '2X40', '"FFAU1864957 / MY545985A  TCLU8517019 / MY544763A"', 2160, '3', 22420.80, 2160.00, 0, 'PASIR GUDANG, MALAYSIA', 'SEMARANG', '2022-06-19', '2022-07-04', '1213', 'FORM D : KL-202206-CCF-232329-K-060779', 'NO', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 'DHL AWB : 7711825855', 14837.00, 80568.00, 0.00, 11.000, 2.500, 0.00, 0.00, 0.00, 0, 'NaN Days', '', '0', '1195387416', '0', '0', 'AEROSWAN', 1, '2022-07-01 10:37:20', 4, '07', '2022', NULL, NULL),
	(50, '', '', 'Tobe Network', '', '3', 'CREAMER XCP5 25KG/BAG', '3', '2106.90.30', 'SKI / BPOM :', '3', '', 'HDMUSELA60063400', '1x40HC', 'HMMU6053055 / 212081563 ', 960, '3', 24768.00, 24000.00, 60, 'BUSAN, KOREA', 'SEMARANG', '2022-06-26', '2022-07-07', '1215', '', 'NO', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, '', 0.00, 58800.00, 0.00, 11.000, 2.500, 0.00, 0.00, 0.00, 0, 'NaN Days', '', 'NaN', '0', '0', '0', 'AEROSWAN', 1, '2022-07-01 10:40:41', 4, '07', '2022', NULL, NULL),
	(51, '', 'AF22INPTB01', 'ANGEL YEAST HONGKONG CO., LIMITED', '', '2', 'INACTIVE YEAST', '3', '210220', 'SKI / BPOM :', '3', '', 'EURFL22603039JKT', '1X20', 'SEGU2391599/CD653128', 30, '3', 790.00, 750.00, 3, 'SHANGHAI', 'JAKARTA', '2022-06-28', '2022-07-07', '', 'FORM E : E222717563440596', 'NO', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, '', 0.00, 1575.00, 0.00, 11.000, 2.500, 0.00, 0.00, 0.00, 0, 'NaN Days', '', 'NaN', '0', '0', '0', 'MGM', 1, '2022-07-01 10:44:21', 4, '07', '2022', NULL, NULL),
	(52, '', '', 'Comfort Hoof Care', '', '1', '"BOND365 40- APPLICATION BULK"', '3', '3505.20.00', '', '5', '', '2625147394', 'AIR', 'AIR BY (DHL)', 1, '1', 63.00, 0.00, 0, 'USA', 'JAKARTA', '2022-06-26', '2022-07-01', '', '', 'NO', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, '', 0.00, 1.00, 5.00, 11.000, 2.500, 0.00, 0.00, 0.00, 0, 'NaN Days', '', 'NaN', 'NaN', 'NaN', '0', 'DHL', 1, '2022-07-01 10:46:57', 4, '07', '2022', NULL, NULL),
	(53, '', '', 'IPI S.r.l. Socio Unico ', '', '1', 'SUPRALUBE 2000 ', '3', '34029091', 'NO LARTAS', '3', '100.168', ' 910 - 1567 3066', 'AIR', 'OMAN AIR', 13, '7', 130.00, 96.00, 0, 'ITALY', 'CGK', '2022-07-08', '2022-07-11', '', '', 'NO', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, '', 0.00, 1.00, 5.00, 11.000, 2.500, 0.00, 0.00, 0.00, 0, 'NaN Days', '', 'NaN', 'NaN', 'NaN', '0', 'AEROSWAN', 1, '2022-07-01 10:50:47', 4, '07', '2022', NULL, NULL);

-- Dumping structure for table gpd_gexp.gimp_eta_pib
DROP TABLE IF EXISTS `gimp_eta_pib`;
CREATE TABLE IF NOT EXISTS `gimp_eta_pib` (
  `etapib_id` int(11) NOT NULL AUTO_INCREMENT,
  `etapib_shipper` varchar(255) DEFAULT NULL,
  `etapib_po` varchar(255) DEFAULT NULL,
  `etapib_consignee` varchar(255) DEFAULT NULL,
  `etapib_commodity` varchar(255) DEFAULT NULL,
  `etapib_BL_no` varchar(255) DEFAULT NULL,
  `etapib_pol` varchar(255) DEFAULT NULL,
  `etapib_pod` varchar(255) DEFAULT NULL,
  `etapib_etd` varchar(255) DEFAULT NULL,
  `etapib_eta` varchar(255) DEFAULT NULL,
  `etapib_pib_aju` varchar(255) DEFAULT NULL,
  `etapib_currency` varchar(255) DEFAULT NULL,
  `etapib_CIF` varchar(255) DEFAULT NULL,
  `etapib_Duty` varchar(255) DEFAULT NULL,
  `etapib_Vat` varchar(255) DEFAULT NULL,
  `etapib_Tax` varchar(255) DEFAULT NULL,
  `etapib_CIF_2` varchar(255) DEFAULT NULL,
  `etapib_Duty_2` varchar(255) DEFAULT NULL,
  `etapib_Vat_2` varchar(255) DEFAULT NULL,
  `etapib_Tax_2` varchar(255) DEFAULT NULL,
  `etapib_estimasi` varchar(255) DEFAULT NULL,
  `etapib_aktual_pembulatan` varchar(255) DEFAULT NULL,
  `etapib_create_month` varchar(255) DEFAULT NULL,
  `etapib_create_years` varchar(255) DEFAULT NULL,
  `etapib_createdAt` datetime DEFAULT NULL,
  `etapib_createdBy` int(11) DEFAULT NULL,
  `etapib_stats` int(11) DEFAULT NULL,
  `etapib_updatedAt` datetime DEFAULT NULL,
  `etapib_updatedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`etapib_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gimp_eta_pib: ~3 rows (approximately)
DELETE FROM `gimp_eta_pib`;
INSERT INTO `gimp_eta_pib` (`etapib_id`, `etapib_shipper`, `etapib_po`, `etapib_consignee`, `etapib_commodity`, `etapib_BL_no`, `etapib_pol`, `etapib_pod`, `etapib_etd`, `etapib_eta`, `etapib_pib_aju`, `etapib_currency`, `etapib_CIF`, `etapib_Duty`, `etapib_Vat`, `etapib_Tax`, `etapib_CIF_2`, `etapib_Duty_2`, `etapib_Vat_2`, `etapib_Tax_2`, `etapib_estimasi`, `etapib_aktual_pembulatan`, `etapib_create_month`, `etapib_create_years`, `etapib_createdAt`, `etapib_createdBy`, `etapib_stats`, `etapib_updatedAt`, `etapib_updatedBy`) VALUES
	(1, 'SICEM S.R.L', '5', '1', 'WHEAT HAY BIG BALES', '', 'RAVENNA, IT', 'Jakarta', '2022-04-07', '2022-05-19', '830', '1526371.00', '6198500.00', '5.00', '11.000', '2.500', '9461210643500', '47306053217500', '104073317078500', '23653026608750', '175032396904750', '18142000000', '05', '2022', '2022-05-23 08:29:59', NULL, 1, NULL, NULL),
	(2, 'KERRY INGREDIENTS (M) SDN. BHD.', '2', '3', 'KERRYKREEM L-8094 FOAMING CREAMER IMPORTING COUNTRY', '', 'MALAYSIA', 'SEMARANG', '2022-05-15', '2022-05-27', '', '14441.00', '80568.00', '0.00', '11.000', '2.500', '846367704', '0', '9310044744', '2115919260', '11425964004', '15843000000', '05', '2022', '2022-05-23 08:33:30', NULL, 1, NULL, NULL),
	(3, 'LIL ORBITS', '3', '2', 'PANCAKE MACHINE  COMPLETE UNI – MATIC W/DRIVE MOTORS', '', 'USA', 'Jakarta', '', '', '', '0.00', '6295.00', '0.00', '11.000', '2.500', '0', '0', '0', '0', '0', '1.758.300.000', '07', '2022', '2022-07-01 15:05:31', NULL, 2, NULL, NULL);

-- Dumping structure for table gpd_gexp.gimp_mt_category
DROP TABLE IF EXISTS `gimp_mt_category`;
CREATE TABLE IF NOT EXISTS `gimp_mt_category` (
  `mt_categori_id` int(11) NOT NULL AUTO_INCREMENT,
  `mt_categori_name` varchar(255) DEFAULT NULL,
  `mt_categori_stats` int(11) DEFAULT 1,
  `mt_categori_month` varchar(50) DEFAULT NULL,
  `mt_categori_year` varchar(50) DEFAULT NULL,
  `mt_categori_createdAt` datetime DEFAULT NULL,
  `mt_categori_createdBy` int(11) DEFAULT NULL,
  `mt_categori_updatedAt` datetime DEFAULT NULL,
  `mt_categori_updatedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`mt_categori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gimp_mt_category: ~9 rows (approximately)
DELETE FROM `gimp_mt_category`;
INSERT INTO `gimp_mt_category` (`mt_categori_id`, `mt_categori_name`, `mt_categori_stats`, `mt_categori_month`, `mt_categori_year`, `mt_categori_createdAt`, `mt_categori_createdBy`, `mt_categori_updatedAt`, `mt_categori_updatedBy`) VALUES
	(1, 'MACHINE', 1, '03', '2022', '2022-03-15 13:46:51', NULL, NULL, NULL),
	(2, 'HAY', 1, '03', '2022', '2022-03-15 14:16:57', 1, NULL, NULL),
	(3, 'MATERIAL', 1, '03', '2022', '2022-03-15 14:19:21', 1, NULL, NULL),
	(4, 'SPARE PARTS', 1, '03', '2022', '2022-03-15 14:19:40', 1, NULL, NULL),
	(5, 'BEARING', 3, '03', '2022', '2022-03-15 14:19:57', 1, '2022-04-07 11:41:44', NULL),
	(6, 'TESTEDIT', 3, '03', '2022', '2022-03-22 09:18:31', 1, '2022-03-22 09:33:24', NULL),
	(7, '&^%$1214$@%)(KGBJFCHNAKHWFAOIUHNBVGFF2G9^*%&^%&^%$1214$@%)(KGBJFCHNAKHWFAOIUHNBVGFF2G9^*%&^%&^%$1214$@%)(KGBJFCHNAKHWFAOIUHNBVGFF2G9^*%&^%', 3, '03', '2022', '2022-03-23 09:22:47', 1, '2022-03-23 09:31:47', NULL),
	(8, '&^%$1214', 3, '03', '2022', '2022-03-23 09:32:29', 1, '2022-03-23 10:02:21', NULL),
	(9, 'TEST', 3, '03', '2022', '2022-03-23 13:18:54', 1, '2022-03-23 13:23:42', NULL);

-- Dumping structure for table gpd_gexp.gimp_mt_uom
DROP TABLE IF EXISTS `gimp_mt_uom`;
CREATE TABLE IF NOT EXISTS `gimp_mt_uom` (
  `mt_uom_id` int(11) NOT NULL AUTO_INCREMENT,
  `mt_uom_name` varchar(255) DEFAULT NULL,
  `mt_uom_stats` int(11) DEFAULT 1,
  `mt_uom_month` varchar(255) DEFAULT NULL,
  `mt_uom_year` varchar(255) DEFAULT NULL,
  `mt_uom_createdAt` datetime DEFAULT NULL,
  `mt_uom_createdBy` int(11) DEFAULT NULL,
  `mt_uom_updatedAt` datetime DEFAULT NULL,
  `mt_uom_updatedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`mt_uom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gimp_mt_uom: ~10 rows (approximately)
DELETE FROM `gimp_mt_uom`;
INSERT INTO `gimp_mt_uom` (`mt_uom_id`, `mt_uom_name`, `mt_uom_stats`, `mt_uom_month`, `mt_uom_year`, `mt_uom_createdAt`, `mt_uom_createdBy`, `mt_uom_updatedAt`, `mt_uom_updatedBy`) VALUES
	(1, 'PACKAGE', 1, '03', '2022', '2022-03-15 14:25:08', NULL, '2022-04-07 11:41:28', NULL),
	(2, 'UNIT', 1, '03', '2022', '2022-03-15 14:30:38', NULL, '2022-04-07 11:39:45', NULL),
	(3, 'BAG', 1, '03', '2022', '2022-03-15 14:30:48', NULL, '2022-04-07 11:40:23', NULL),
	(4, 'TESTEDIT', 3, '03', '2022', '2022-03-22 09:55:20', NULL, '2022-03-22 10:03:55', NULL),
	(5, '', 3, '03', '2022', '2022-03-23 13:28:56', NULL, '2022-03-23 15:52:34', NULL),
	(6, '', 3, '03', '2022', '2022-03-23 15:52:15', NULL, '2022-03-23 15:52:54', NULL),
	(7, 'CARTON', 1, '04', '2022', '2022-04-07 11:40:47', NULL, NULL, NULL),
	(8, 'BALE', 1, '04', '2022', '2022-04-07 11:40:58', NULL, NULL, NULL),
	(9, 'PALLET', 1, '05', '2022', '2022-05-24 14:41:21', NULL, NULL, NULL),
	(10, 'SET', 1, '06', '2022', '2022-06-06 11:42:31', NULL, NULL, NULL);

-- Dumping structure for table gpd_gexp.gimp_user
DROP TABLE IF EXISTS `gimp_user`;
CREATE TABLE IF NOT EXISTS `gimp_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(255) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `user_encrypt` text DEFAULT NULL,
  `user_nip` varchar(255) DEFAULT NULL,
  `user_accountname` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_phone` varchar(255) DEFAULT NULL,
  `user_status` int(11) DEFAULT 1 COMMENT '1=Active 2=Not Active',
  `user_isOnline` int(11) DEFAULT NULL,
  `user_createdAt` datetime DEFAULT NULL,
  `user_createdBy` int(11) DEFAULT NULL,
  `user_updatedAt` datetime DEFAULT NULL,
  `user_updatedBy` int(11) DEFAULT NULL,
  `user_lastlogin` datetime DEFAULT NULL,
  `user_role` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.gimp_user: ~5 rows (approximately)
DELETE FROM `gimp_user`;
INSERT INTO `gimp_user` (`user_id`, `user_username`, `user_pass`, `user_encrypt`, `user_nip`, `user_accountname`, `user_email`, `user_phone`, `user_status`, `user_isOnline`, `user_createdAt`, `user_createdBy`, `user_updatedAt`, `user_updatedBy`, `user_lastlogin`, `user_role`) VALUES
	(1, 'root01', '9ce24e992f6fd80fa3128be11b1a7525', 'Y2U1NWVmMzkyNDZhZjVlOWE4OWI5MGY1MmQyZjA0M2FhNmFmMjA0Ng==', '7021523', 'IT_Developer', 'Muhammad.Rifky@gonusa-distribusi.com', '085695332565', 1, NULL, NULL, 1, NULL, NULL, '2022-06-07 17:43:15', 1),
	(2, 'ricki.harlis', '827ccb0eea8a706c4c34a16891f84e7b', 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', '-', 'Ricki.Harlis', 'ricki.harlis@sumberkopiprima.com', '-', 1, NULL, NULL, 1, NULL, NULL, '2022-08-02 09:30:20', 2),
	(3, 'selby.hendra', '827ccb0eea8a706c4c34a16891f84e7b', 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', '-', 'Selby.Hendra', 'selby.hendra@gonusa-distribusi.com', '-', 1, NULL, NULL, 1, NULL, NULL, '2022-04-18 11:56:35', 2),
	(4, 'lingga.pradipta', '827ccb0eea8a706c4c34a16891f84e7b', 'ZmU3MDNkMjU4YzdlZjVmNTBiNzFlMDY1NjVhNjVhYTA3MTk0OTA3Zg==', '-', 'Lingga.Pradipta', 'lingga.e.pradipta@sumberkopiprima.com', '-', 1, NULL, NULL, 1, NULL, NULL, '2022-07-29 13:37:55', 2),
	(5, 'support', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '0', 'IT SUPPORT', 'it.support@gonusa-distribusi.com', '0', 1, NULL, '2022-04-18 11:32:38', 2, '2022-04-18 11:32:49', 2, NULL, 1);

-- Dumping structure for table gpd_gexp.master_bank
DROP TABLE IF EXISTS `master_bank`;
CREATE TABLE IF NOT EXISTS `master_bank` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `account` varchar(20) NOT NULL,
  `branch` text NOT NULL,
  `address` text NOT NULL,
  `swift_code` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_bank: ~2 rows (approximately)
DELETE FROM `master_bank`;
INSERT INTO `master_bank` (`id`, `code`, `name`, `account`, `branch`, `address`, `swift_code`, `created_at`, `updated_at`, `is_deleted`) VALUES
	(1, '01', 'DBS INDONESIA', '3220119139', 'DBS BANK TOWER BRANCH', 'JL. PROF. DR. SATRIO KAV 3-5, CIPUTRA WORLD JAKARTA 12940', 'dbsbidja', '2022-08-22 07:50:52', NULL, '0'),
	(2, '02', 'LLP "B3 GROUP"', 'KZ6896502F0012782447', 'NUR SULTAN', '010000, KAZAKHSTAN, G. NUR-SULTAN, R-N ESIL, UL. B', 'irtykzka', '2022-08-24 08:28:46', NULL, '0');

-- Dumping structure for table gpd_gexp.master_beneficiary
DROP TABLE IF EXISTS `master_beneficiary`;
CREATE TABLE IF NOT EXISTS `master_beneficiary` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `office` text NOT NULL,
  `address` text NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  `cp_name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK__master_country` (`country_id`),
  CONSTRAINT `FK__master_country` FOREIGN KEY (`country_id`) REFERENCES `master_country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_beneficiary: ~1 rows (approximately)
DELETE FROM `master_beneficiary`;
INSERT INTO `master_beneficiary` (`id`, `company_name`, `office`, `address`, `country_id`, `cp_name`, `phone`, `created_at`, `updated_at`, `is_deleted`) VALUES
	(1, 'PT. SUMBER KOPI PRIMA', ' JL. LINGKAR TIMUR', 'LORAM WETAN, JATI,  KAB. KUDUS, JAWA TENGAH, 59344', 7, 'EVI SUSANTI', '085774439141', '2022-08-22 10:50:41', NULL, '0');

-- Dumping structure for table gpd_gexp.master_coding_type
DROP TABLE IF EXISTS `master_coding_type`;
CREATE TABLE IF NOT EXISTS `master_coding_type` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_coding_type: ~3 rows (approximately)
DELETE FROM `master_coding_type`;
INSERT INTO `master_coding_type` (`id`, `name`, `is_deleted`) VALUES
	(1, 'Sachet', '0'),
	(2, 'Pouch', '0'),
	(3, 'Case', '0');

-- Dumping structure for table gpd_gexp.master_container
DROP TABLE IF EXISTS `master_container`;
CREATE TABLE IF NOT EXISTS `master_container` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `max_cbm` decimal(3,0) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_container: ~3 rows (approximately)
DELETE FROM `master_container`;
INSERT INTO `master_container` (`id`, `name`, `max_cbm`, `created_at`, `updated_at`, `is_deleted`) VALUES
	(1, '20 FT', 33, '2022-08-19 03:14:52', NULL, '0'),
	(2, '40 FT', 67, '2022-08-19 03:14:52', NULL, '0'),
	(3, '40 HC', 75, '2022-08-19 03:14:52', NULL, '0');

-- Dumping structure for table gpd_gexp.master_country
DROP TABLE IF EXISTS `master_country`;
CREATE TABLE IF NOT EXISTS `master_country` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table gpd_gexp.master_country: ~28 rows (approximately)
DELETE FROM `master_country`;
INSERT INTO `master_country` (`id`, `code`, `name`, `created_at`, `updated_at`, `is_deleted`) VALUES
	(1, 'KHM', 'Cambodia', '2022-08-19 03:06:27', NULL, '0'),
	(2, 'CAN', 'Canada', '2022-08-19 03:06:27', NULL, '0'),
	(3, 'CHN', 'China', '2022-08-19 03:06:27', NULL, '0'),
	(4, 'DOM', 'Dominican Republic', '2022-08-19 03:06:27', NULL, '0'),
	(5, 'ETH', 'Ethiopia', '2022-08-19 03:06:27', NULL, '0'),
	(6, 'FRA', 'France', '2022-08-19 03:06:27', NULL, '0'),
	(7, 'IDN', 'Indonesia', '2022-08-19 03:06:27', NULL, '0'),
	(8, 'JPN', 'Jepang', '2022-08-19 03:06:27', NULL, '0'),
	(9, 'POL', 'Polandia', '2022-08-19 03:06:27', NULL, '0'),
	(10, 'MYS', 'Malaysia', '2022-08-19 03:06:27', NULL, '0'),
	(11, 'USA', 'United States', '2022-08-19 03:06:27', NULL, '0'),
	(12, 'LBN', 'Lebanon', '2022-08-19 03:06:27', NULL, '0'),
	(13, 'AZE', 'Azerbaijan', '2022-08-19 03:06:27', NULL, '0'),
	(14, 'ZAF', 'South Africa', '2022-08-19 03:06:27', NULL, '0'),
	(15, 'JOR', 'Jordan', '2022-08-19 03:06:27', NULL, '0'),
	(16, 'BRN', 'Brunei Darussalam', '2022-08-19 03:06:27', NULL, '0'),
	(17, 'QAT', 'Qatar', '2022-08-19 03:06:27', NULL, '0'),
	(18, 'KOR', 'Republic Of Korea', '2022-08-19 03:06:27', NULL, '0'),
	(19, 'GEO', 'Georgia', '2022-08-19 03:06:27', NULL, '0'),
	(20, 'TLS', 'Timor Leste', '2022-08-19 03:06:27', NULL, '0'),
	(21, 'DEU', 'Germany', '2022-08-19 03:06:27', NULL, '0'),
	(22, 'AUS', 'Australia', '2022-08-19 03:06:27', NULL, '0'),
	(23, 'ITA', 'Italy', '2022-08-19 03:06:27', NULL, '0'),
	(24, 'PHL', 'Philippines', '2022-08-19 03:06:27', NULL, '0'),
	(25, 'GRC', 'Greece', '2022-08-19 03:06:27', NULL, '0'),
	(26, 'IRQ', 'Iraq', '2022-08-19 03:06:27', NULL, '0'),
	(27, 'TWN', 'Taiwan', '2022-08-19 03:06:27', NULL, '0'),
	(28, 'KAZ', 'Kazakhstan', '2022-08-19 03:06:27', NULL, '0');

-- Dumping structure for table gpd_gexp.master_currency
DROP TABLE IF EXISTS `master_currency`;
CREATE TABLE IF NOT EXISTS `master_currency` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `icon` varchar(5) NOT NULL,
  `spell` varchar(50) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `icon` (`icon`) USING BTREE,
  UNIQUE KEY `code` (`code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table gpd_gexp.master_currency: ~3 rows (approximately)
DELETE FROM `master_currency`;
INSERT INTO `master_currency` (`id`, `code`, `name`, `icon`, `spell`, `is_deleted`) VALUES
	(1, 'IDR', 'Rupiah', 'Rp', 'Rupiah', '0'),
	(2, 'CNY', 'Renminbi', '¥', 'Yuan', '0'),
	(3, 'USD', 'United States Dollar', '$', 'Dollar', '0');

-- Dumping structure for table gpd_gexp.master_customer
DROP TABLE IF EXISTS `master_customer`;
CREATE TABLE IF NOT EXISTS `master_customer` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `company_name` varchar(100) NOT NULL COMMENT 'cust consignee name = company name',
  `address` text NOT NULL,
  `town` varchar(100) NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `FK_master_customer_consignee_master_country` (`country_id`),
  KEY `FK_master_customer_master_user` (`created_by`),
  KEY `FK_master_customer_master_user_2` (`updated_by`),
  CONSTRAINT `FK_master_customer_consignee_master_country` FOREIGN KEY (`country_id`) REFERENCES `master_country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_master_customer_master_user` FOREIGN KEY (`created_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_master_customer_master_user_2` FOREIGN KEY (`updated_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_customer: ~1 rows (approximately)
DELETE FROM `master_customer`;
INSERT INTO `master_customer` (`id`, `code`, `company_name`, `address`, `town`, `country_id`, `phone_no`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
	(2, '8801KAZ0001', 'B3 GROUP LLP', 'ESIL DISTRICT, ST. BUKHAR ZHYRAU, 36, APT. 98, NUR SULTAN', 'Nur Sultan', 28, '+77772077373', '2022-09-01 03:51:04', 1, NULL, NULL, '0');

-- Dumping structure for table gpd_gexp.master_customer_backup
DROP TABLE IF EXISTS `master_customer_backup`;
CREATE TABLE IF NOT EXISTS `master_customer_backup` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `code` varchar(12) NOT NULL COMMENT 'Format: 8801+CountryCode+Running Number 4 Digit',
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_customer_backup: ~0 rows (approximately)
DELETE FROM `master_customer_backup`;

-- Dumping structure for table gpd_gexp.master_customer_bank
DROP TABLE IF EXISTS `master_customer_bank`;
CREATE TABLE IF NOT EXISTS `master_customer_bank` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `customer_id` smallint(6) NOT NULL,
  `bank_id` tinyint(4) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_master_customer_bank_master_bank` (`bank_id`),
  KEY `FK_master_customer_bank_master_customer` (`customer_id`),
  CONSTRAINT `FK_master_customer_bank_master_bank` FOREIGN KEY (`bank_id`) REFERENCES `master_bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_master_customer_bank_master_customer` FOREIGN KEY (`customer_id`) REFERENCES `master_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_customer_bank: ~1 rows (approximately)
DELETE FROM `master_customer_bank`;
INSERT INTO `master_customer_bank` (`id`, `customer_id`, `bank_id`, `account_no`, `account_name`, `is_deleted`) VALUES
	(2, 2, 2, 'KZ6896502F0012782447', 'АО «ForteBank»', '0');

-- Dumping structure for table gpd_gexp.master_customer_coding
DROP TABLE IF EXISTS `master_customer_coding`;
CREATE TABLE IF NOT EXISTS `master_customer_coding` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `customer_id` smallint(6) DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `is_deleted` enum('0','1') DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_master_customer_coding_master_customer` (`customer_id`),
  CONSTRAINT `FK_master_customer_coding_master_customer` FOREIGN KEY (`customer_id`) REFERENCES `master_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_customer_coding: ~1 rows (approximately)
DELETE FROM `master_customer_coding`;
INSERT INTO `master_customer_coding` (`id`, `customer_id`, `notes`, `is_deleted`) VALUES
	(1, 2, NULL, '0');

-- Dumping structure for table gpd_gexp.master_customer_coding_detail
DROP TABLE IF EXISTS `master_customer_coding_detail`;
CREATE TABLE IF NOT EXISTS `master_customer_coding_detail` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `customer_coding_id` smallint(6) NOT NULL,
  `coding_type_id` tinyint(4) NOT NULL,
  `import_by` varchar(200) NOT NULL,
  `hotline` varchar(50) NOT NULL,
  `best_before` varchar(100) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_master_customer_coding_master_customer_coding_type` (`coding_type_id`) USING BTREE,
  KEY `FK_master_customer_coding_detail_master_customer_coding` (`customer_coding_id`),
  CONSTRAINT `FK_master_customer_coding_detail_master_customer_coding` FOREIGN KEY (`customer_coding_id`) REFERENCES `master_customer_coding` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `master_customer_coding_detail_ibfk_1` FOREIGN KEY (`coding_type_id`) REFERENCES `master_coding_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table gpd_gexp.master_customer_coding_detail: ~3 rows (approximately)
DELETE FROM `master_customer_coding_detail`;
INSERT INTO `master_customer_coding_detail` (`id`, `customer_coding_id`, `coding_type_id`, `import_by`, `hotline`, `best_before`, `is_deleted`) VALUES
	(1, 1, 1, 'kurnain', '098765132', '123141', '0'),
	(2, 1, 2, 'ramadhan', '93453452', '23421342', '0'),
	(3, 1, 3, 'arsyi', '13123', '131312', '0');

-- Dumping structure for table gpd_gexp.master_customer_cp
DROP TABLE IF EXISTS `master_customer_cp`;
CREATE TABLE IF NOT EXISTS `master_customer_cp` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `customer_id` smallint(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `top_id` tinyint(4) NOT NULL,
  `dp` decimal(3,0) NOT NULL DEFAULT 0 COMMENT 'Format: percentage',
  `balancing` decimal(3,0) NOT NULL DEFAULT 0 COMMENT 'Format: percentage',
  `currency_id` tinyint(4) NOT NULL,
  `incoterm_id` tinyint(4) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_master_customer_cp_master_top` (`top_id`),
  KEY `FK_master_customer_cp_master_currency` (`currency_id`),
  KEY `FK_master_customer_cp_master_incoterm` (`incoterm_id`),
  KEY `FK_master_customer_cp_master_customer` (`customer_id`),
  CONSTRAINT `FK_master_customer_cp_master_currency` FOREIGN KEY (`currency_id`) REFERENCES `master_currency` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_master_customer_cp_master_customer` FOREIGN KEY (`customer_id`) REFERENCES `master_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_master_customer_cp_master_incoterm` FOREIGN KEY (`incoterm_id`) REFERENCES `master_incoterm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_master_customer_cp_master_top` FOREIGN KEY (`top_id`) REFERENCES `master_top` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_customer_cp: ~1 rows (approximately)
DELETE FROM `master_customer_cp`;
INSERT INTO `master_customer_cp` (`id`, `customer_id`, `name`, `phone_no`, `email`, `top_id`, `dp`, `balancing`, `currency_id`, `incoterm_id`, `is_deleted`) VALUES
	(2, 2, 'YERKANAT USSENOV', '+77772077373', 'Erkanat.ussen81@gmail.com', 6, 30, 70, 3, 3, '0');

-- Dumping structure for table gpd_gexp.master_customer_cp_ship
DROP TABLE IF EXISTS `master_customer_cp_ship`;
CREATE TABLE IF NOT EXISTS `master_customer_cp_ship` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `customer_id` smallint(6) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `is_deleted` enum('0','1') DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_master_customer_cp_ship_master_customer` (`customer_id`),
  CONSTRAINT `FK_master_customer_cp_ship_master_customer` FOREIGN KEY (`customer_id`) REFERENCES `master_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_customer_cp_ship: ~1 rows (approximately)
DELETE FROM `master_customer_cp_ship`;
INSERT INTO `master_customer_cp_ship` (`id`, `customer_id`, `name`, `phone`, `email`, `is_deleted`) VALUES
	(1, 2, 'YERKANAT USSENOV', '+77772077373', 'Erkanat.ussen81@gmail.com', '0');

-- Dumping structure for table gpd_gexp.master_customer_import_doc
DROP TABLE IF EXISTS `master_customer_import_doc`;
CREATE TABLE IF NOT EXISTS `master_customer_import_doc` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `customer_id` smallint(6) DEFAULT NULL,
  `bill_of_ladding` enum('1','2') DEFAULT NULL COMMENT '1 = Send Original Doc; 2 = Telex Release;',
  `packing_list` enum('1','2') DEFAULT NULL COMMENT '1 = Send Original Doc; 2 = Send by Email;',
  `invoice` enum('1','2') DEFAULT NULL COMMENT '1 = Send Original Doc; 2 = Send by Email;',
  `invoice_uv` enum('1','2') DEFAULT NULL COMMENT '1 = Send Original Doc; 2 = Send by Email;',
  `coo` enum('1','2') DEFAULT NULL COMMENT '1 = Send Original Doc; 2 = Send by Email;',
  `health_cert` enum('1','2') DEFAULT NULL COMMENT '1 = Send Original Doc; 2 = Send by Email;',
  `material_safety` enum('1','2') DEFAULT NULL COMMENT '1 = Send Original Doc; 2 = Send by Email;',
  `coa` enum('1','2') DEFAULT NULL COMMENT '1 = Send Original Doc; 2 = Send by Email;',
  `prod_spec` enum('1','2') DEFAULT NULL COMMENT '1 = Send Original Doc; 2 = Send by Email;',
  `others` varchar(100) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_master_customer_import_doc_detail_master_customer` (`customer_id`),
  CONSTRAINT `FK_master_customer_import_doc_detail_master_customer` FOREIGN KEY (`customer_id`) REFERENCES `master_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table gpd_gexp.master_customer_import_doc: ~1 rows (approximately)
DELETE FROM `master_customer_import_doc`;
INSERT INTO `master_customer_import_doc` (`id`, `customer_id`, `bill_of_ladding`, `packing_list`, `invoice`, `invoice_uv`, `coo`, `health_cert`, `material_safety`, `coa`, `prod_spec`, `others`, `is_deleted`) VALUES
	(1, 2, '1', '2', '1', '2', '1', '2', '1', '2', '1', 'test others', '0');

-- Dumping structure for table gpd_gexp.master_customer_notify
DROP TABLE IF EXISTS `master_customer_notify`;
CREATE TABLE IF NOT EXISTS `master_customer_notify` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `customer_id` smallint(6) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_master_customer_notify_master_country` (`country_id`),
  KEY `FK_master_customer_notify_master_customer` (`customer_id`),
  CONSTRAINT `FK_master_customer_notify_master_country` FOREIGN KEY (`country_id`) REFERENCES `master_country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_master_customer_notify_master_customer` FOREIGN KEY (`customer_id`) REFERENCES `master_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_customer_notify: ~1 rows (approximately)
DELETE FROM `master_customer_notify`;
INSERT INTO `master_customer_notify` (`id`, `customer_id`, `company_name`, `address`, `country_id`, `phone_no`, `is_deleted`) VALUES
	(2, 2, 'B3 GROUP LLP', 'ESIL DISTRICT, ST. BUKHAR ZHYRAU, 36, APT. 98, NUR SULTAN', 28, '+77772077373', '0');

-- Dumping structure for table gpd_gexp.master_customer_ship
DROP TABLE IF EXISTS `master_customer_ship`;
CREATE TABLE IF NOT EXISTS `master_customer_ship` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `customer_id` smallint(6) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_master_customer_ship_master_country` (`country_id`),
  KEY `FK_master_customer_ship_master_customer` (`customer_id`),
  CONSTRAINT `FK_master_customer_ship_master_country` FOREIGN KEY (`country_id`) REFERENCES `master_country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_master_customer_ship_master_customer` FOREIGN KEY (`customer_id`) REFERENCES `master_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_customer_ship: ~1 rows (approximately)
DELETE FROM `master_customer_ship`;
INSERT INTO `master_customer_ship` (`id`, `customer_id`, `company_name`, `address`, `country_id`, `phone_no`, `is_deleted`) VALUES
	(2, 2, 'B3 GROUP LLP', 'ESIL DISTRICT, ST. BUKHAR ZHYRAU, 36, APT. 98, NUR SULTAN', 28, '+7777 207 7373', '0');

-- Dumping structure for table gpd_gexp.master_customer_ship_detail
DROP TABLE IF EXISTS `master_customer_ship_detail`;
CREATE TABLE IF NOT EXISTS `master_customer_ship_detail` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `customer_ship_id` smallint(6) DEFAULT NULL,
  `discharge_port` varchar(100) DEFAULT NULL,
  `destination_port` varchar(100) DEFAULT NULL,
  `is_deleted` enum('0','1') DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK__master_customer_ship` (`customer_ship_id`),
  CONSTRAINT `FK__master_customer_ship` FOREIGN KEY (`customer_ship_id`) REFERENCES `master_customer_ship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_customer_ship_detail: ~2 rows (approximately)
DELETE FROM `master_customer_ship_detail`;
INSERT INTO `master_customer_ship_detail` (`id`, `customer_ship_id`, `discharge_port`, `destination_port`, `is_deleted`) VALUES
	(3, 2, 'QINGDAO', 'ALMATY', '0'),
	(4, 2, 'SURABAYA', 'JAKARTA', '0');

-- Dumping structure for table gpd_gexp.master_incoterm
DROP TABLE IF EXISTS `master_incoterm`;
CREATE TABLE IF NOT EXISTS `master_incoterm` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_incoterm: ~11 rows (approximately)
DELETE FROM `master_incoterm`;
INSERT INTO `master_incoterm` (`id`, `code`, `name`, `created_at`, `updated_at`, `is_deleted`) VALUES
	(1, 'FOB', 'Free On Board', '2022-08-19 08:22:54', NULL, '0'),
	(2, 'CFR', 'Cost And Freight', '2022-08-19 08:22:54', '2022-08-19 18:17:59', '0'),
	(3, 'CIF', 'Cost, Insurance and Freight', '2022-08-19 08:22:54', NULL, '0'),
	(4, 'EXW', 'Exworks', '2022-08-19 11:05:21', NULL, '0'),
	(5, 'DDP', 'Delivered Duty Paid', '2022-08-19 11:05:45', NULL, '0'),
	(6, 'DAP', 'Delivered At Place', '2022-08-19 11:07:27', NULL, '0'),
	(7, 'FCA', 'Free Carrier', '2022-08-19 11:07:47', NULL, '0'),
	(8, 'CPT', 'Carriage Paid To', '2022-08-19 11:08:03', NULL, '0'),
	(9, 'CIP', 'Carriage And Insurance Paid To', '2022-08-19 11:08:18', NULL, '0'),
	(10, 'DAT', 'Delivery At Terminal', '2022-08-19 11:08:31', NULL, '0'),
	(11, 'FAS', 'Free Alongside Ship', '2022-08-19 11:08:46', NULL, '0');

-- Dumping structure for table gpd_gexp.master_item
DROP TABLE IF EXISTS `master_item`;
CREATE TABLE IF NOT EXISTS `master_item` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `hs_code` varchar(20) NOT NULL,
  `item_category_id` tinyint(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pack_desc` varchar(100) NOT NULL,
  `net_wight` decimal(20,2) NOT NULL DEFAULT 0.00,
  `gross_weight` decimal(20,2) NOT NULL,
  `length` decimal(10,0) NOT NULL,
  `width` decimal(10,0) NOT NULL,
  `height` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `FK_master_item_master_item_category` (`item_category_id`),
  CONSTRAINT `FK_master_item_master_item_category` FOREIGN KEY (`item_category_id`) REFERENCES `master_item_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_item: ~18 rows (approximately)
DELETE FROM `master_item`;
INSERT INTO `master_item` (`id`, `code`, `hs_code`, `item_category_id`, `name`, `pack_desc`, `net_wight`, `gross_weight`, `length`, `width`, `height`, `created_at`, `updated_at`, `is_deleted`) VALUES
	(1, '30000041', '2101.11.19', 1, 'CAFFINO COFFEE LATTE CLASSIC', '24 POUCH X 10 SACHET X 20GR', 4.80, 5.92, 505, 220, 267, '2022-08-22 03:50:27', NULL, '0'),
	(2, '30000042', '2101.11.19', 1, 'CAFFINO COFFEE LATTE HAZELNUT', '24 POUCH X 10 SACHET X 20GR', 4.80, 5.92, 505, 220, 267, '2022-08-22 04:04:31', NULL, '0'),
	(3, '30000043', '2101.11.19', 1, 'CAFFINO COFFEE LATTE MOCHA', '24 POUCH X 10 SACHET X 20GR', 4.80, 5.92, 505, 220, 267, '2022-08-22 04:05:30', '2022-08-22 12:02:02', '0'),
	(4, '30000046', '2101.11.19', 1, 'CAFFINO COFFEE LATTE CLASSIC', '24 ROLL X 10 SACHET X 20GR', 4.80, 5.57, 560, 190, 215, '2022-08-22 04:07:00', NULL, '0'),
	(5, '30000047', '2101.11.19', 1, 'CAFFINO COFFEE LATTE HAZELNUT', '24 ROLL X 10 SACHET X 20GR', 4.80, 5.57, 560, 190, 215, '2022-08-22 04:08:03', NULL, '0'),
	(6, '30000048', '2101.11.19', 1, 'CAFFINO COFFEE LATTE MOCHA', '24 ROLL X 10 SACHET X 20GR', 4.80, 5.57, 560, 190, 215, '2022-08-22 04:09:26', NULL, '0'),
	(7, '30000065', '2101.11.19', 1, 'CAFFINO 3IN1 STICKPACK CLASSIC', '12 POUCH X 30 SACHET X 20GR', 7.20, 8.40, 405, 320, 258, '2022-08-22 04:11:00', NULL, '0'),
	(8, '30000066', '2101.11.19', 1, 'CAFFINO 3IN1 STICKPACK HAZELNUT', '12 POUCH X 30 SACHET X 20GR', 7.20, 8.40, 405, 320, 258, '2022-08-22 04:12:06', NULL, '0'),
	(9, '30000072', '2101.11.19', 1, 'PAPATONK CAFFINO 3IN1 INSTANT COFFEE BOLD', '12 GUSSET X 15 SACHET X 30GR', 5.40, 6.81, 625, 321, 225, '2022-08-22 04:14:27', NULL, '0'),
	(10, '30000073', '2101.11.19', 1, 'PAPATONK CAFFINO 3IN1 INSTANT COFFEE BOLD', '36 FOLDING BOX X 6 SACHET X 30GR', 6.48, 8.91, 430, 375, 295, '2022-08-22 04:15:45', NULL, '0'),
	(11, '30000074', '2101.11.19', 1, 'CAFFINO CAPPUCCINO CLASSIC', '24 POUCH X 10 SACHET X 20GR', 4.80, 5.85, 505, 210, 267, '2022-08-22 04:17:04', NULL, '0'),
	(12, '30000075', '2101.11.19', 1, 'CAFFINO CAPPUCINNO HAZELNUT', '24 POUCH X 10 SACHET X 20GR', 4.80, 5.85, 505, 210, 267, '2022-08-22 04:18:02', NULL, '0'),
	(13, '30000076', '2101.11.19', 1, 'CAFFINO CAPPUCINNO MOCHA', '24 POUCH X 10 SACHET X 20GR', 4.80, 5.85, 505, 210, 267, '2022-08-22 04:19:14', NULL, '0'),
	(14, '30000105', '2101.11.19', 1, 'CAFFINO BOLD PREMIUM COFFEE LATTE ', '12 GUSSET X 15 SACHET X 27GR', 4.86, 7.61, 615, 330, 225, '2022-08-22 04:20:21', NULL, '0'),
	(15, '30000107', '0901.21.20', 2, 'GADJAH GROUND COFFEE + SUGAR', '24 POUCH X 10 SACHET X 25GR', 6.00, 7.25, 510, 246, 295, '2022-08-22 04:21:19', NULL, '0'),
	(16, '30000109', '0901.21.20', 2, 'GADJAH TWIN PACK', '24 POUCH X 20 SACHET X 7GR', 3.36, 4.65, 510, 246, 295, '2022-08-22 04:22:14', NULL, '0'),
	(17, '30000111', '0901.21.20', 2, 'GADJAH GROUND COFFEE', '24 POUCH X 150GR', 3.60, 4.31, 464, 344, 139, '2022-08-22 04:23:19', NULL, '0'),
	(18, '30000134', '0901.21.20', 2, 'GADJAH COFFEE BEAN', '24 BAG X 250GR', 6.00, 7.16, 575, 330, 160, '2022-08-22 04:24:29', NULL, '0');

-- Dumping structure for table gpd_gexp.master_item_category
DROP TABLE IF EXISTS `master_item_category`;
CREATE TABLE IF NOT EXISTS `master_item_category` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_item_category: ~2 rows (approximately)
DELETE FROM `master_item_category`;
INSERT INTO `master_item_category` (`id`, `name`, `is_deleted`) VALUES
	(1, 'CAFFINO', '0'),
	(2, 'GADJAH', '0');

-- Dumping structure for table gpd_gexp.master_item_mapping
DROP TABLE IF EXISTS `master_item_mapping`;
CREATE TABLE IF NOT EXISTS `master_item_mapping` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `item_id` tinyint(4) NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_master_item_mapping_master_item` (`item_id`),
  KEY `FK_master_item_mapping_master_country` (`country_id`),
  CONSTRAINT `FK_master_item_mapping_master_country` FOREIGN KEY (`country_id`) REFERENCES `master_country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_master_item_mapping_master_item` FOREIGN KEY (`item_id`) REFERENCES `master_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_item_mapping: ~0 rows (approximately)
DELETE FROM `master_item_mapping`;

-- Dumping structure for table gpd_gexp.master_loading_port
DROP TABLE IF EXISTS `master_loading_port`;
CREATE TABLE IF NOT EXISTS `master_loading_port` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_loading_port: ~3 rows (approximately)
DELETE FROM `master_loading_port`;
INSERT INTO `master_loading_port` (`id`, `code`, `name`, `created_at`, `updated_at`, `is_deleted`) VALUES
	(1, 'JKT', 'Jakarta', '2022-08-22 09:44:44', NULL, '0'),
	(2, 'SMG', 'Semarang', '2022-08-22 09:45:02', NULL, '0'),
	(3, 'SBY', 'Surabaya', '2022-08-22 09:45:21', NULL, '0');

-- Dumping structure for table gpd_gexp.master_menu_group
DROP TABLE IF EXISTS `master_menu_group`;
CREATE TABLE IF NOT EXISTS `master_menu_group` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_menu_group: ~4 rows (approximately)
DELETE FROM `master_menu_group`;
INSERT INTO `master_menu_group` (`id`, `name`, `icon`, `is_deleted`) VALUES
	(1, 'Master', 'fas fa-database', '0'),
	(2, 'Transaction', 'fas fa-server', '0'),
	(3, 'Report', 'fas fa-folder-open', '0'),
	(4, 'System', 'fas fa-cog', '0');

-- Dumping structure for table gpd_gexp.master_menu_module
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_menu_module: ~2 rows (approximately)
DELETE FROM `master_menu_module`;
INSERT INTO `master_menu_module` (`id`, `name`, `icon`, `url`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
	(1, 'UAC', 'far fa-keyboard', 'uac', '2022-08-09 08:17:35', NULL, NULL, NULL, '0'),
	(2, 'EXPORT', 'fas fa-file-export', 'export', '2022-08-09 08:20:51', NULL, '2022-08-10 14:03:48', NULL, '0');

-- Dumping structure for table gpd_gexp.master_menu_sub
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_menu_sub: ~15 rows (approximately)
DELETE FROM `master_menu_sub`;
INSERT INTO `master_menu_sub` (`id`, `menu_module_id`, `menu_group_id`, `name`, `icon`, `url`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
	(1, 1, 1, 'User', 'fas fa-users', 'uac/user', '2022-08-09 10:55:18', NULL, NULL, NULL, '0'),
	(2, 1, 1, 'Module', 'far fa-file-alt', 'uac/modules', '2022-08-09 10:58:26', NULL, NULL, NULL, '0'),
	(3, 1, 1, 'Menu', 'fas fa-bars', 'uac/menu', '2022-08-09 10:59:09', NULL, NULL, NULL, '0'),
	(4, 1, 2, 'Assign Menu', 'fas fa-users-cog', 'uac/assignmenu', '2022-08-10 04:13:07', NULL, NULL, NULL, '0'),
	(5, 2, 1, 'Terms Of Payment', 'fas fa-ruler-combined', 'export/top', '2022-08-10 07:00:11', NULL, '2022-08-10 14:19:39', NULL, '0'),
	(6, 2, 1, 'Country', 'fas fa-globe', 'export/country', '2022-08-10 09:09:26', NULL, NULL, NULL, '0'),
	(7, 2, 1, 'Container', 'fas fa-box', 'export/container', '2022-08-19 03:20:09', NULL, NULL, NULL, '0'),
	(8, 2, 1, 'Incoterm', 'fas fa-dumpster', 'export/incoterm', '2022-08-19 08:26:16', NULL, NULL, NULL, '0'),
	(9, 2, 1, 'Item', 'fab fa-product-hunt', 'export/item', '2022-08-19 11:45:21', NULL, NULL, NULL, '0'),
	(10, 2, 1, 'Item Mapping', 'fas fa-map', 'export/item_mapping', '2022-08-22 05:21:43', NULL, '2022-08-22 13:07:48', NULL, '0'),
	(11, 2, 1, 'Bank', 'fas fa-money-check', 'export/bank', '2022-08-22 07:09:17', NULL, NULL, NULL, '0'),
	(12, 2, 1, 'Loading Port', 'fas fa-truck-loading', 'export/loading_port', '2022-08-22 08:13:04', NULL, NULL, NULL, '0'),
	(13, 2, 1, 'Beneficiary', 'fas fa-sync-alt', 'export/beneficiary', '2022-08-22 10:18:35', NULL, NULL, NULL, '0'),
	(14, 2, 1, 'Customer', 'fas fa-building', 'export/customer', '2022-08-23 02:25:34', NULL, NULL, NULL, '0'),
	(15, 2, 2, 'Proforma Invoice', 'fas fa-file-invoice-dollar', 'export/proforma', '2022-09-01 04:28:10', NULL, NULL, NULL, '0');

-- Dumping structure for table gpd_gexp.master_pi_item
DROP TABLE IF EXISTS `master_pi_item`;
CREATE TABLE IF NOT EXISTS `master_pi_item` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `option_id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_gexp_master_pi_item_gexp_master_group` (`group_id`),
  KEY `FK_gexp_master_pi_item_gexp_master_pi_opt` (`option_id`),
  CONSTRAINT `FK_gexp_master_pi_item_gexp_master_group` FOREIGN KEY (`group_id`) REFERENCES `gexp_master_group` (`GroupId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_gexp_master_pi_item_gexp_master_pi_opt` FOREIGN KEY (`option_id`) REFERENCES `master_pi_opt` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_pi_item: ~36 rows (approximately)
DELETE FROM `master_pi_item`;
INSERT INTO `master_pi_item` (`id`, `group_id`, `item`, `option_id`, `name`, `created_at`, `is_deleted`) VALUES
	(1, 20, 'Signed PI', 1, 'signed_pi', '2022-08-04 07:26:00', '0'),
	(2, 20, 'Purchase Order (If Any)', 1, 'purchase', '2022-08-04 07:26:39', '0'),
	(3, 23, 'TOP', 2, 'top', '2022-08-04 07:29:19', '0'),
	(4, 23, 'Down Payment Receipt', 1, 'dp_receipt', '2022-08-04 07:30:13', '0'),
	(5, 23, 'Down Payment Received Confirmation', 3, 'dp_confirm', '2022-08-04 07:34:23', '0'),
	(6, 20, 'Shipping Term', 2, 'shipping_term', '2022-08-04 07:36:04', '0'),
	(7, 24, 'Bill of Ladding', 1, 'bill_ladding', '2022-08-04 07:38:57', '0'),
	(8, 21, 'Packing List', 1, 'packing_list', '2022-08-04 07:39:47', '0'),
	(9, 23, 'Invoice', 1, 'invoice', '2022-08-04 07:41:10', '0'),
	(10, 23, 'Invoice Under Value', 1, 'invoice_uv', '2022-08-04 07:41:33', '0'),
	(11, 26, 'COO', 1, 'coo', '2022-08-04 07:57:09', '0'),
	(12, 26, 'Health Certificate / Certificate of Free Sale', 1, 'health_cert', '2022-08-04 07:57:37', '0'),
	(13, 26, 'Material Safety Data Sheet', 1, 'material_safety', '2022-08-04 07:57:38', '0'),
	(14, 26, 'COA', 1, 'coa', '2022-08-04 07:57:38', '0'),
	(15, 26, 'Product Spesification', 1, 'prod_spec', '2022-08-04 07:57:38', '0'),
	(16, 26, 'Surat Pernyataan Produk', 1, 'spp', '2022-08-04 07:57:38', '0'),
	(17, 24, 'Others', 1, 'others', '2022-08-04 07:57:38', '0'),
	(18, 22, 'Ketentuan Export Dokumen', 1, 'ket_exp_doc', '2022-08-04 07:57:38', '0'),
	(19, 22, 'Ketentuan Export Dokumen Approve', 1, 'ket_exp_doc_apprv', '2022-08-04 07:57:38', '0'),
	(20, 23, 'FOC Approval', 3, 'foc_approval', '2022-08-04 07:57:38', '0'),
	(21, 21, 'POSM Availability', 3, 'posm', '2022-08-04 07:57:38', '0'),
	(22, 22, 'Finish Good Ready Date', 3, 'finish_good', '2022-08-04 07:57:38', '0'),
	(23, 24, 'Vessel Schedule', 3, 'vessel_schedule', '2022-08-04 07:57:38', '0'),
	(24, 23, 'Balance Payment', 2, 'balance_payment', '2022-08-04 07:57:38', '0'),
	(25, 24, 'Vessel Booking Confirmation', 3, 'vessel_confirm', '2022-08-04 07:57:38', '0'),
	(26, 21, 'Stuffing', 1, 'stuffing', '2022-08-04 07:57:38', '0'),
	(27, 24, 'Draft BL Sent', 3, 'draft_sent', '2022-08-04 07:57:38', '0'),
	(28, 24, 'Draft BL Approved', 3, 'draft_approved', '2022-08-04 07:57:38', '0'),
	(29, 24, 'Telex Release', 3, 'telex', '2022-08-04 07:57:39', '0'),
	(30, 24, 'Original Document Sent', 3, 'ori_doc_sent', '2022-08-04 07:57:39', '0'),
	(31, 23, 'TOP Payment Balancing', 3, 'top_payment', '2022-08-04 07:57:39', '0'),
	(32, 24, 'Estimation Time of Departure [ETD]', 3, 'etd', '2022-08-04 07:57:39', '0'),
	(33, 24, 'Estimation Time of Arrival [ETA]', 3, 'eta', '2022-08-04 07:57:39', '0'),
	(34, 24, 'COO', 1, 'coo', '2022-08-04 08:24:43', '0'),
	(35, 24, 'Health Certificate / Certificate of Free Sale', 1, 'health_cert', '2022-08-04 08:25:07', '0'),
	(36, 24, 'Stuffing', 1, 'stuffing', '2022-08-04 08:25:48', '0');

-- Dumping structure for table gpd_gexp.master_pi_item_category
DROP TABLE IF EXISTS `master_pi_item_category`;
CREATE TABLE IF NOT EXISTS `master_pi_item_category` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_pi_item_category: ~2 rows (approximately)
DELETE FROM `master_pi_item_category`;
INSERT INTO `master_pi_item_category` (`id`, `name`, `is_deleted`) VALUES
	(1, 'Purchase Goods', '0'),
	(2, 'Free Goods', '0');

-- Dumping structure for table gpd_gexp.master_pi_item_opt
DROP TABLE IF EXISTS `master_pi_item_opt`;
CREATE TABLE IF NOT EXISTS `master_pi_item_opt` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `pi_item_id` tinyint(3) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_gexp_master_pi_item_opt_gexp_master_pi_item` (`pi_item_id`),
  CONSTRAINT `FK_gexp_master_pi_item_opt_gexp_master_pi_item` FOREIGN KEY (`pi_item_id`) REFERENCES `master_pi_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_pi_item_opt: ~8 rows (approximately)
DELETE FROM `master_pi_item_opt`;
INSERT INTO `master_pi_item_opt` (`id`, `pi_item_id`, `name`, `is_deleted`) VALUES
	(1, 3, 'LC', '0'),
	(2, 3, 'TOP 30 Days', '0'),
	(3, 3, 'TOP 45 Days', '0'),
	(4, 3, 'TOP 90 Days', '0'),
	(5, 6, 'FOB', '0'),
	(6, 6, 'CIF', '0'),
	(7, 24, 'Down Payment', '0'),
	(8, 24, 'All Payment', '0');

-- Dumping structure for table gpd_gexp.master_pi_opt
DROP TABLE IF EXISTS `master_pi_opt`;
CREATE TABLE IF NOT EXISTS `master_pi_opt` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_pi_opt: ~3 rows (approximately)
DELETE FROM `master_pi_opt`;
INSERT INTO `master_pi_opt` (`id`, `name`, `is_deleted`) VALUES
	(1, 'Attachment', '0'),
	(2, 'Dropdown', '0'),
	(3, 'Empty', '0');

-- Dumping structure for table gpd_gexp.master_pi_status
DROP TABLE IF EXISTS `master_pi_status`;
CREATE TABLE IF NOT EXISTS `master_pi_status` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `bg_color` varchar(50) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_pi_status: ~6 rows (approximately)
DELETE FROM `master_pi_status`;
INSERT INTO `master_pi_status` (`id`, `name`, `bg_color`, `is_deleted`) VALUES
	(1, 'Submit', 'secondary', '0'),
	(2, 'Finish', 'info', '0'),
	(3, 'Cancel', 'danger', '0'),
	(4, 'Need Approval', 'info', '0'),
	(5, 'Approved', 'success', '0'),
	(6, 'Revise', 'warning', '0');

-- Dumping structure for table gpd_gexp.master_position
DROP TABLE IF EXISTS `master_position`;
CREATE TABLE IF NOT EXISTS `master_position` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `role_id` tinyint(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_master_position_master_role` (`role_id`),
  CONSTRAINT `FK_master_position_master_role` FOREIGN KEY (`role_id`) REFERENCES `master_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_position: ~3 rows (approximately)
DELETE FROM `master_position`;
INSERT INTO `master_position` (`id`, `role_id`, `name`, `is_deleted`) VALUES
	(1, 2, 'Fullstack Developer', '0'),
	(2, 3, 'Business Development Manager', '0'),
	(3, 1, 'Superuser', '0');

-- Dumping structure for table gpd_gexp.master_qc_item_category
DROP TABLE IF EXISTS `master_qc_item_category`;
CREATE TABLE IF NOT EXISTS `master_qc_item_category` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_qc_item_category: ~2 rows (approximately)
DELETE FROM `master_qc_item_category`;
INSERT INTO `master_qc_item_category` (`id`, `name`, `is_deleted`) VALUES
	(1, 'Organoletic, Physical, Chemical Test\r\n', '0'),
	(2, 'Microbiology', '0');

-- Dumping structure for table gpd_gexp.master_qc_status
DROP TABLE IF EXISTS `master_qc_status`;
CREATE TABLE IF NOT EXISTS `master_qc_status` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_qc_status: ~2 rows (approximately)
DELETE FROM `master_qc_status`;
INSERT INTO `master_qc_status` (`id`, `name`, `is_deleted`) VALUES
	(1, 'Aman', '0'),
	(2, 'Tidak Aman', '0');

-- Dumping structure for table gpd_gexp.master_role
DROP TABLE IF EXISTS `master_role`;
CREATE TABLE IF NOT EXISTS `master_role` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table gpd_gexp.master_role: ~9 rows (approximately)
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

-- Dumping structure for table gpd_gexp.master_top
DROP TABLE IF EXISTS `master_top`;
CREATE TABLE IF NOT EXISTS `master_top` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_top: ~6 rows (approximately)
DELETE FROM `master_top`;
INSERT INTO `master_top` (`id`, `name`, `created_at`, `updated_at`, `is_deleted`) VALUES
	(1, 'LC', '2022-08-19 03:03:37', NULL, '0'),
	(2, 'TOP 30 Days', '2022-08-19 03:03:37', NULL, '0'),
	(3, 'TOP 45 Days', '2022-08-19 03:03:37', NULL, '0'),
	(4, 'TOP 90 Days', '2022-08-19 03:03:37', NULL, '0'),
	(5, 'Against Doc', '2022-08-19 03:03:37', NULL, '0'),
	(6, 'TOP 0 DAYS', '2022-08-24 09:24:47', NULL, '0');

-- Dumping structure for table gpd_gexp.master_user
DROP TABLE IF EXISTS `master_user`;
CREATE TABLE IF NOT EXISTS `master_user` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_user: ~2 rows (approximately)
DELETE FROM `master_user`;
INSERT INTO `master_user` (`id`, `fullname`, `username`, `email`, `password`, `created_at`, `updated_at`, `is_deleted`) VALUES
	(1, 'System Administrator', 'sysadmin', 'sysadmin@gonusa-distribusi.com', '$2y$10$vX22N1Rfn.ljsHmBzDF.CebNv287qAgkPelWq2WxEGcNWA3HC4j4i', '2022-08-09 04:14:01', '2022-08-09 05:27:56', '0'),
	(2, 'Kurnain Arsyi Ramadhan', 'kurnainar', 'kurnain.arsyi@gonusa-distribusi.com', '$2y$10$PSdyMxTgSiv5.ADOhHx7oOEVe2YxJaVf5UL5Su55k5v7.Ecqcjlh.', '2022-08-09 04:19:16', '2022-08-09 09:40:05', '0');

-- Dumping structure for table gpd_gexp.master_user_role
DROP TABLE IF EXISTS `master_user_role`;
CREATE TABLE IF NOT EXISTS `master_user_role` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `user_id` tinyint(4) NOT NULL,
  `role_id` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `FK__master_role` (`role_id`),
  CONSTRAINT `FK__master_role` FOREIGN KEY (`role_id`) REFERENCES `master_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__master_user` FOREIGN KEY (`user_id`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_user_role: ~2 rows (approximately)
DELETE FROM `master_user_role`;
INSERT INTO `master_user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '2022-08-09 04:14:01', NULL),
	(2, 2, 2, '2022-08-09 04:19:16', NULL);

-- Dumping structure for table gpd_gexp.trans_coa
DROP TABLE IF EXISTS `trans_coa`;
CREATE TABLE IF NOT EXISTS `trans_coa` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `pi_id` smallint(6) NOT NULL,
  `code` varchar(50) NOT NULL COMMENT 'Format: 000/MM/YYYY/3 Digit Negara',
  `invoice_id` smallint(6) NOT NULL,
  `pi_status_id` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  UNIQUE KEY `pi_id` (`pi_id`),
  UNIQUE KEY `invoice_id` (`invoice_id`),
  KEY `FK_trans_coa_master_user` (`created_by`),
  KEY `FK_trans_coa_master_user_2` (`updated_by`),
  KEY `FK_trans_coa_master_pi_status` (`pi_status_id`),
  CONSTRAINT `FK_trans_coa_master_pi_status` FOREIGN KEY (`pi_status_id`) REFERENCES `master_pi_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_coa_master_user` FOREIGN KEY (`created_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_coa_master_user_2` FOREIGN KEY (`updated_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_coa_trans_invoice` FOREIGN KEY (`invoice_id`) REFERENCES `trans_invoice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_coa_trans_pi` FOREIGN KEY (`pi_id`) REFERENCES `trans_pi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.trans_coa: ~0 rows (approximately)
DELETE FROM `trans_coa`;

-- Dumping structure for table gpd_gexp.trans_coa_heavy
DROP TABLE IF EXISTS `trans_coa_heavy`;
CREATE TABLE IF NOT EXISTS `trans_coa_heavy` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `coa_id` smallint(6) NOT NULL,
  `mercury` varchar(50) NOT NULL,
  `lead` varchar(50) NOT NULL,
  `tin` varchar(50) NOT NULL,
  `arsenic` varchar(50) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_trans_coa_heavy_trans_coa` (`coa_id`),
  CONSTRAINT `FK_trans_coa_heavy_trans_coa` FOREIGN KEY (`coa_id`) REFERENCES `trans_coa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.trans_coa_heavy: ~0 rows (approximately)
DELETE FROM `trans_coa_heavy`;

-- Dumping structure for table gpd_gexp.trans_coa_item
DROP TABLE IF EXISTS `trans_coa_item`;
CREATE TABLE IF NOT EXISTS `trans_coa_item` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `coa_id` smallint(6) NOT NULL,
  `packing_list_id` smallint(6) NOT NULL,
  `qc_check_id` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_trans_coa_item_trans_coa` (`coa_id`),
  KEY `FK_trans_coa_item_trans_packing_list` (`packing_list_id`),
  KEY `FK_trans_coa_item_trans_qc_check` (`qc_check_id`),
  KEY `FK_trans_coa_item_master_user` (`created_by`),
  KEY `FK_trans_coa_item_master_user_2` (`updated_by`),
  CONSTRAINT `FK_trans_coa_item_master_user` FOREIGN KEY (`created_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_coa_item_master_user_2` FOREIGN KEY (`updated_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_coa_item_trans_coa` FOREIGN KEY (`coa_id`) REFERENCES `trans_coa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_coa_item_trans_packing_list` FOREIGN KEY (`packing_list_id`) REFERENCES `trans_packing_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_coa_item_trans_qc_check` FOREIGN KEY (`qc_check_id`) REFERENCES `trans_qcontrol_check` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.trans_coa_item: ~0 rows (approximately)
DELETE FROM `trans_coa_item`;

-- Dumping structure for table gpd_gexp.trans_export_terms
DROP TABLE IF EXISTS `trans_export_terms`;
CREATE TABLE IF NOT EXISTS `trans_export_terms` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `pi_id` smallint(6) NOT NULL,
  `code` varchar(25) NOT NULL COMMENT 'Format: ExpTerm/YYYY/MM/0001',
  `file` varchar(100) NOT NULL,
  `pi_status_id` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pi_id` (`pi_id`),
  UNIQUE KEY `code` (`code`),
  KEY `FK_trans_export_terms_master_user` (`created_by`),
  KEY `FK_trans_export_terms_master_pi_status` (`pi_status_id`),
  CONSTRAINT `FK_trans_export_terms_master_pi_status` FOREIGN KEY (`pi_status_id`) REFERENCES `master_pi_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_export_terms_master_user` FOREIGN KEY (`created_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_export_terms_trans_pi` FOREIGN KEY (`pi_id`) REFERENCES `trans_pi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.trans_export_terms: ~0 rows (approximately)
DELETE FROM `trans_export_terms`;

-- Dumping structure for table gpd_gexp.trans_invoice
DROP TABLE IF EXISTS `trans_invoice`;
CREATE TABLE IF NOT EXISTS `trans_invoice` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `pi_id` smallint(6) NOT NULL,
  `code` varchar(30) NOT NULL COMMENT 'Format: 0001/SKP-EXP/INV/07/2022',
  `ffrn` varchar(50) DEFAULT NULL,
  `pi_status_id` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pi_id` (`pi_id`),
  UNIQUE KEY `code` (`code`),
  KEY `FK_trans_invoice_master_user` (`created_by`),
  KEY `FK_trans_invoice_master_user_2` (`updated_by`),
  KEY `FK_trans_invoice_master_pi_status` (`pi_status_id`),
  CONSTRAINT `FK_trans_invoice_master_pi_status` FOREIGN KEY (`pi_status_id`) REFERENCES `master_pi_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_invoice_master_user` FOREIGN KEY (`created_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_invoice_master_user_2` FOREIGN KEY (`updated_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_invoice_trans_pi` FOREIGN KEY (`pi_id`) REFERENCES `trans_pi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.trans_invoice: ~0 rows (approximately)
DELETE FROM `trans_invoice`;

-- Dumping structure for table gpd_gexp.trans_menu_assign
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.trans_menu_assign: ~19 rows (approximately)
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
	(15, 10, 1, '2022-08-22 05:21:52', NULL),
	(16, 11, 1, '2022-08-22 07:09:27', NULL),
	(17, 12, 1, '2022-08-22 08:13:13', NULL),
	(18, 13, 1, '2022-08-22 10:18:47', NULL),
	(19, 14, 1, '2022-08-23 02:25:56', NULL),
	(20, 15, 1, '2022-09-01 04:28:23', NULL);

-- Dumping structure for table gpd_gexp.trans_packing_list
DROP TABLE IF EXISTS `trans_packing_list`;
CREATE TABLE IF NOT EXISTS `trans_packing_list` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `pi_id` smallint(6) NOT NULL,
  `code` varchar(25) NOT NULL COMMENT 'Format: 000/SKP-EXT/PL/MM[romawi]/YYYY',
  `invoice_id` smallint(6) NOT NULL,
  `container` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pi_id` (`pi_id`),
  UNIQUE KEY `code` (`code`),
  UNIQUE KEY `invoice_id` (`invoice_id`),
  KEY `FK_trans_packing_list_master_user` (`created_by`),
  KEY `FK_trans_packing_list_master_user_2` (`updated_by`),
  CONSTRAINT `FK_trans_packing_list_master_user` FOREIGN KEY (`created_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_packing_list_master_user_2` FOREIGN KEY (`updated_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_packing_list_trans_invoice` FOREIGN KEY (`invoice_id`) REFERENCES `trans_invoice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_packing_list_trans_pi` FOREIGN KEY (`pi_id`) REFERENCES `trans_pi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.trans_packing_list: ~0 rows (approximately)
DELETE FROM `trans_packing_list`;

-- Dumping structure for table gpd_gexp.trans_packing_list_detail
DROP TABLE IF EXISTS `trans_packing_list_detail`;
CREATE TABLE IF NOT EXISTS `trans_packing_list_detail` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `packing_list_id` smallint(6) NOT NULL,
  `item_id` tinyint(4) NOT NULL,
  `carton_barcode` varchar(50) DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `production_date` date DEFAULT NULL,
  `batch` varchar(50) DEFAULT NULL,
  `qty` decimal(20,0) NOT NULL DEFAULT 0,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_trans_packing_list_detail_trans_packing_list` (`packing_list_id`),
  KEY `FK_trans_packing_list_detail_master_item` (`item_id`),
  CONSTRAINT `FK_trans_packing_list_detail_master_item` FOREIGN KEY (`item_id`) REFERENCES `master_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_packing_list_detail_trans_packing_list` FOREIGN KEY (`packing_list_id`) REFERENCES `trans_packing_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.trans_packing_list_detail: ~0 rows (approximately)
DELETE FROM `trans_packing_list_detail`;

-- Dumping structure for table gpd_gexp.trans_pi
DROP TABLE IF EXISTS `trans_pi`;
CREATE TABLE IF NOT EXISTS `trans_pi` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `code` varchar(25) NOT NULL COMMENT 'Format: 0000/SKP-EXP/PI/MM/YYYY',
  `po_no` varchar(25) DEFAULT NULL,
  `customer_id` smallint(6) NOT NULL,
  `consignee_id` smallint(6) NOT NULL,
  `beneficiary_id` tinyint(4) NOT NULL,
  `loading_port_id` tinyint(4) NOT NULL,
  `customer_ship_id` smallint(6) NOT NULL,
  `container_id` tinyint(4) NOT NULL,
  `number_of_container` decimal(20,0) NOT NULL DEFAULT 0,
  `freight_company` varchar(100) NOT NULL,
  `freight_company_contact` varchar(100) NOT NULL,
  `freight_company_no` decimal(20,0) NOT NULL DEFAULT 0,
  `freight_cost` decimal(20,0) NOT NULL DEFAULT 0,
  `insurance` decimal(20,0) NOT NULL DEFAULT 0,
  `bank_id` tinyint(4) NOT NULL,
  `currency_id` tinyint(4) NOT NULL,
  `ppn` enum('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;',
  `top_id` tinyint(4) NOT NULL,
  `remark` text DEFAULT NULL,
  `attachment` varchar(200) DEFAULT NULL,
  `pi_status_id` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `FK_trans_pi_master_loading_port` (`loading_port_id`),
  KEY `FK_trans_pi_master_container` (`container_id`),
  KEY `FK_trans_pi_master_bank` (`bank_id`),
  KEY `FK_trans_pi_master_currency` (`currency_id`),
  KEY `FK_trans_pi_master_top` (`top_id`),
  KEY `FK_trans_pi_master_pi_status` (`pi_status_id`),
  KEY `FK_trans_pi_master_user` (`created_by`),
  KEY `FK_trans_pi_master_user_2` (`updated_by`),
  KEY `FK_trans_pi_master_customer` (`customer_id`),
  KEY `FK_trans_pi_master_customer_2` (`consignee_id`),
  KEY `FK_trans_pi_master_beneficiary` (`beneficiary_id`),
  KEY `FK_trans_pi_master_customer_ship_detail` (`customer_ship_id`),
  CONSTRAINT `FK_trans_pi_master_bank` FOREIGN KEY (`bank_id`) REFERENCES `master_bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_pi_master_beneficiary` FOREIGN KEY (`beneficiary_id`) REFERENCES `master_beneficiary` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_pi_master_container` FOREIGN KEY (`container_id`) REFERENCES `master_container` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_pi_master_currency` FOREIGN KEY (`currency_id`) REFERENCES `master_currency` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_pi_master_customer` FOREIGN KEY (`customer_id`) REFERENCES `master_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_pi_master_customer_2` FOREIGN KEY (`consignee_id`) REFERENCES `master_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_pi_master_customer_ship_detail` FOREIGN KEY (`customer_ship_id`) REFERENCES `master_customer_ship_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_pi_master_loading_port` FOREIGN KEY (`loading_port_id`) REFERENCES `master_loading_port` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_pi_master_pi_status` FOREIGN KEY (`pi_status_id`) REFERENCES `master_pi_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_pi_master_top` FOREIGN KEY (`top_id`) REFERENCES `master_top` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_pi_master_user` FOREIGN KEY (`created_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_pi_master_user_2` FOREIGN KEY (`updated_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.trans_pi: ~1 rows (approximately)
DELETE FROM `trans_pi`;
INSERT INTO `trans_pi` (`id`, `code`, `po_no`, `customer_id`, `consignee_id`, `beneficiary_id`, `loading_port_id`, `customer_ship_id`, `container_id`, `number_of_container`, `freight_company`, `freight_company_contact`, `freight_company_no`, `freight_cost`, `insurance`, `bank_id`, `currency_id`, `ppn`, `top_id`, `remark`, `attachment`, `pi_status_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
	(1, '0001/SKP-EXP/PI/09/2022', NULL, 2, 2, 1, 1, 3, 3, 1, 'test1', 'test2', 0, 0, 0, 1, 3, '0', 6, NULL, NULL, 1, '2022-09-05 10:22:45', 1, NULL, NULL, '0');

-- Dumping structure for table gpd_gexp.trans_pi_detail
DROP TABLE IF EXISTS `trans_pi_detail`;
CREATE TABLE IF NOT EXISTS `trans_pi_detail` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `pi_id` smallint(6) NOT NULL,
  `pi_item_category_id` tinyint(4) NOT NULL,
  `item_id` tinyint(4) NOT NULL,
  `qty` decimal(20,0) NOT NULL DEFAULT 0,
  `price` decimal(20,2) NOT NULL DEFAULT 0.00,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_trans_pi_detail_trans_pi` (`pi_id`),
  KEY `FK_trans_pi_detail_master_item` (`item_id`),
  KEY `FK_trans_pi_detail_master_pi_item_category` (`pi_item_category_id`),
  CONSTRAINT `FK_trans_pi_detail_master_item` FOREIGN KEY (`item_id`) REFERENCES `master_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_pi_detail_master_pi_item_category` FOREIGN KEY (`pi_item_category_id`) REFERENCES `master_pi_item_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_pi_detail_trans_pi` FOREIGN KEY (`pi_id`) REFERENCES `trans_pi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.trans_pi_detail: ~6 rows (approximately)
DELETE FROM `trans_pi_detail`;
INSERT INTO `trans_pi_detail` (`id`, `pi_id`, `pi_item_category_id`, `item_id`, `qty`, `price`, `is_deleted`) VALUES
	(1, 1, 1, 1, 822, 12.80, '0'),
	(2, 1, 1, 2, 822, 12.80, '0'),
	(3, 1, 1, 3, 411, 12.80, '0'),
	(4, 1, 2, 3, 103, 12.80, '0'),
	(5, 1, 2, 2, 206, 12.80, '0'),
	(6, 1, 2, 1, 160, 12.80, '0');

-- Dumping structure for table gpd_gexp.trans_pi_history
DROP TABLE IF EXISTS `trans_pi_history`;
CREATE TABLE IF NOT EXISTS `trans_pi_history` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `pi_id` smallint(6) NOT NULL,
  `pi_status_id` tinyint(4) NOT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_trans_pi_history_trans_pi` (`pi_id`),
  KEY `FK_trans_pi_history_master_pi_status` (`pi_status_id`),
  KEY `FK_trans_pi_history_master_user` (`created_by`),
  CONSTRAINT `FK_trans_pi_history_master_pi_status` FOREIGN KEY (`pi_status_id`) REFERENCES `master_pi_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_pi_history_master_user` FOREIGN KEY (`created_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_pi_history_trans_pi` FOREIGN KEY (`pi_id`) REFERENCES `trans_pi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.trans_pi_history: ~0 rows (approximately)
DELETE FROM `trans_pi_history`;

-- Dumping structure for table gpd_gexp.trans_prod_spec
DROP TABLE IF EXISTS `trans_prod_spec`;
CREATE TABLE IF NOT EXISTS `trans_prod_spec` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `pi_id` smallint(6) NOT NULL,
  `code` varchar(25) NOT NULL,
  `invoice_id` smallint(6) NOT NULL,
  `pi_status_id` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  UNIQUE KEY `pi_id` (`pi_id`),
  UNIQUE KEY `invoice_id` (`invoice_id`),
  KEY `FK_trans_prod_spec_master_pi_status` (`pi_status_id`),
  KEY `FK_trans_prod_spec_master_user` (`created_by`),
  KEY `FK_trans_prod_spec_master_user_2` (`updated_by`),
  CONSTRAINT `FK_trans_prod_spec_master_pi_status` FOREIGN KEY (`pi_status_id`) REFERENCES `master_pi_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_prod_spec_master_user` FOREIGN KEY (`created_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_prod_spec_master_user_2` FOREIGN KEY (`updated_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_prod_spec_trans_invoice` FOREIGN KEY (`invoice_id`) REFERENCES `trans_invoice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_prod_spec_trans_pi` FOREIGN KEY (`pi_id`) REFERENCES `trans_pi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.trans_prod_spec: ~0 rows (approximately)
DELETE FROM `trans_prod_spec`;

-- Dumping structure for table gpd_gexp.trans_prod_spec_detail
DROP TABLE IF EXISTS `trans_prod_spec_detail`;
CREATE TABLE IF NOT EXISTS `trans_prod_spec_detail` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `prod_spec_id` smallint(6) NOT NULL,
  `item_id` tinyint(4) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_trans_prod_spec_detail_trans_prod_spec` (`prod_spec_id`),
  KEY `FK_trans_prod_spec_detail_master_item` (`item_id`),
  CONSTRAINT `FK_trans_prod_spec_detail_master_item` FOREIGN KEY (`item_id`) REFERENCES `master_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_prod_spec_detail_trans_prod_spec` FOREIGN KEY (`prod_spec_id`) REFERENCES `trans_prod_spec` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.trans_prod_spec_detail: ~0 rows (approximately)
DELETE FROM `trans_prod_spec_detail`;

-- Dumping structure for table gpd_gexp.trans_qcertificate
DROP TABLE IF EXISTS `trans_qcertificate`;
CREATE TABLE IF NOT EXISTS `trans_qcertificate` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `pi_id` smallint(6) NOT NULL,
  `code` varchar(25) NOT NULL,
  `coa_id` smallint(6) NOT NULL,
  `invoice_id` smallint(6) NOT NULL,
  `pi_status_id` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  UNIQUE KEY `invoice_id` (`invoice_id`),
  KEY `FK_trans_qc_master_pi_status` (`pi_status_id`),
  KEY `FK_trans_qcertificate_trans_pi` (`pi_id`),
  KEY `FK_trans_qcertificate_trans_coa` (`coa_id`),
  KEY `FK_trans_qcertificate_master_user` (`created_by`),
  KEY `FK_trans_qcertificate_master_user_2` (`updated_by`),
  CONSTRAINT `FK_trans_qc_master_pi_status` FOREIGN KEY (`pi_status_id`) REFERENCES `master_pi_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_qcertificate_master_user` FOREIGN KEY (`created_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_qcertificate_master_user_2` FOREIGN KEY (`updated_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_qcertificate_trans_coa` FOREIGN KEY (`coa_id`) REFERENCES `trans_coa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_qcertificate_trans_invoice` FOREIGN KEY (`invoice_id`) REFERENCES `trans_invoice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_qcertificate_trans_pi` FOREIGN KEY (`pi_id`) REFERENCES `trans_pi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.trans_qcertificate: ~0 rows (approximately)
DELETE FROM `trans_qcertificate`;

-- Dumping structure for table gpd_gexp.trans_qcertificate_detail
DROP TABLE IF EXISTS `trans_qcertificate_detail`;
CREATE TABLE IF NOT EXISTS `trans_qcertificate_detail` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `pi_id` smallint(6) NOT NULL,
  `item_id` tinyint(4) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_trans_qcertificate_detail_trans_pi` (`pi_id`),
  KEY `FK_trans_qcertificate_detail_master_item` (`item_id`),
  CONSTRAINT `FK_trans_qcertificate_detail_master_item` FOREIGN KEY (`item_id`) REFERENCES `master_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_qcertificate_detail_trans_pi` FOREIGN KEY (`pi_id`) REFERENCES `trans_pi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.trans_qcertificate_detail: ~0 rows (approximately)
DELETE FROM `trans_qcertificate_detail`;

-- Dumping structure for table gpd_gexp.trans_qcontrol_check
DROP TABLE IF EXISTS `trans_qcontrol_check`;
CREATE TABLE IF NOT EXISTS `trans_qcontrol_check` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `pi_id` smallint(6) NOT NULL,
  `code` varchar(20) NOT NULL COMMENT 'Format: 0001/SKP-QC/07/2022',
  `item_id` tinyint(4) NOT NULL,
  `production_date` date NOT NULL,
  `expired_date` date NOT NULL,
  `qc_status_id` tinyint(4) NOT NULL,
  `release_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  UNIQUE KEY `pi_id` (`pi_id`),
  KEY `FK_trans_qc_check_master_item` (`item_id`),
  KEY `FK_trans_qc_check_master_user` (`created_by`),
  KEY `FK_trans_qc_check_master_qc_status` (`qc_status_id`),
  CONSTRAINT `FK_trans_qc_check_master_item` FOREIGN KEY (`item_id`) REFERENCES `master_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_qc_check_master_qc_status` FOREIGN KEY (`qc_status_id`) REFERENCES `master_qc_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_qc_check_master_user` FOREIGN KEY (`created_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_qc_check_trans_pi` FOREIGN KEY (`pi_id`) REFERENCES `trans_pi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.trans_qcontrol_check: ~0 rows (approximately)
DELETE FROM `trans_qcontrol_check`;

-- Dumping structure for table gpd_gexp.trans_signed_pi
DROP TABLE IF EXISTS `trans_signed_pi`;
CREATE TABLE IF NOT EXISTS `trans_signed_pi` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `pi_item_id` tinyint(4) unsigned NOT NULL,
  `value` varchar(200) NOT NULL,
  `is_sent` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_gexp_trans_signed_pi_gexp_master_pi_item` (`pi_item_id`),
  CONSTRAINT `FK_gexp_trans_signed_pi_gexp_master_pi_item` FOREIGN KEY (`pi_item_id`) REFERENCES `master_pi_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.trans_signed_pi: ~0 rows (approximately)
DELETE FROM `trans_signed_pi`;

-- Dumping structure for table gpd_gexp.trans_spp
DROP TABLE IF EXISTS `trans_spp`;
CREATE TABLE IF NOT EXISTS `trans_spp` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `pi_id` smallint(6) NOT NULL,
  `code` varchar(25) NOT NULL,
  `invoice_id` smallint(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  UNIQUE KEY `pi_id` (`pi_id`),
  KEY `FK_trans_spp_trans_invoice` (`invoice_id`),
  KEY `FK_trans_spp_master_user` (`created_by`),
  KEY `FK_trans_spp_master_user_2` (`updated_by`),
  CONSTRAINT `FK_trans_spp_master_user` FOREIGN KEY (`created_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_spp_master_user_2` FOREIGN KEY (`updated_by`) REFERENCES `master_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_spp_trans_invoice` FOREIGN KEY (`invoice_id`) REFERENCES `trans_invoice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_trans_spp_trans_pi` FOREIGN KEY (`pi_id`) REFERENCES `trans_pi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.trans_spp: ~0 rows (approximately)
DELETE FROM `trans_spp`;

-- Dumping structure for table gpd_gexp.trans_spp_detail
DROP TABLE IF EXISTS `trans_spp_detail`;
CREATE TABLE IF NOT EXISTS `trans_spp_detail` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `spp_id` smallint(6) NOT NULL,
  `name_local` varchar(100) NOT NULL,
  `type_local` varchar(100) NOT NULL,
  `md_no_local` varchar(100) NOT NULL,
  `name_export` varchar(100) NOT NULL,
  `type_export` varchar(100) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_trans_spp_detail_trans_spp` (`spp_id`),
  CONSTRAINT `FK_trans_spp_detail_trans_spp` FOREIGN KEY (`spp_id`) REFERENCES `trans_spp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.trans_spp_detail: ~0 rows (approximately)
DELETE FROM `trans_spp_detail`;

-- Dumping structure for view gpd_gexp.view_assign_group
DROP VIEW IF EXISTS `view_assign_group`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_assign_group` (
	`menu_module_id` TINYINT(4) NOT NULL,
	`menu_module_url` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menu_group_id` TINYINT(4) NOT NULL,
	`menu_group_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menu_group_icon` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`role_id` TINYINT(4) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_assign_menu
DROP VIEW IF EXISTS `view_assign_menu`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_assign_menu` (
	`menu_module_id` TINYINT(4) NOT NULL,
	`menu_module_url` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menu_group_id` TINYINT(4) NOT NULL,
	`menu_sub_id` TINYINT(4) NOT NULL,
	`menu_sub_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menu_sub_icon` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menu_sub_url` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`role_id` TINYINT(4) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_assign_module
DROP VIEW IF EXISTS `view_assign_module`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_assign_module` (
	`menu_module_id` TINYINT(4) NOT NULL,
	`menu_module_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menu_module_icon` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menu_module_url` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`role_id` TINYINT(4) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_beneficiary
DROP VIEW IF EXISTS `view_beneficiary`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_beneficiary` (
	`id` TINYINT(4) NOT NULL,
	`company_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`office` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`address` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`country_id` TINYINT(4) NOT NULL,
	`cp_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`phone` VARCHAR(20) NULL COLLATE 'utf8mb4_general_ci',
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` DATETIME NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci',
	`country_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_cek_cbm_per_item
DROP VIEW IF EXISTS `view_cek_cbm_per_item`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_cek_cbm_per_item` (
	`pi_no` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`item_code` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`brand_name` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`item_name` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`panjang` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`lebar` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`tinggi` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`qty` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`result_cbm` DOUBLE(19,2) NULL
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_cek_cbm_per_pi
DROP VIEW IF EXISTS `view_cek_cbm_per_pi`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_cek_cbm_per_pi` (
	`pi_no` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`container` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`max_cbm` INT(11) NULL,
	`tot_qty` DOUBLE NULL,
	`result_cbm` DOUBLE(19,2) NULL,
	`remain_cbm` DOUBLE(19,2) NULL
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_customer_coding
DROP VIEW IF EXISTS `view_customer_coding`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_customer_coding` (
	`id` SMALLINT(6) NOT NULL,
	`customer_id` SMALLINT(6) NULL,
	`notes` VARCHAR(200) NULL COLLATE 'utf8mb4_general_ci',
	`is_deleted` ENUM('0','1') NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci',
	`coding_type_id` TINYINT(4) NOT NULL,
	`import_by` VARCHAR(200) NOT NULL COLLATE 'utf8mb4_general_ci',
	`hotline` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`best_before` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_customer_cp
DROP VIEW IF EXISTS `view_customer_cp`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_customer_cp` (
	`id` SMALLINT(6) NOT NULL,
	`customer_id` SMALLINT(6) NOT NULL,
	`name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`phone_no` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`top_id` TINYINT(4) NOT NULL,
	`dp` DECIMAL(3,0) NOT NULL COMMENT 'Format: percentage',
	`balancing` DECIMAL(3,0) NOT NULL COMMENT 'Format: percentage',
	`currency_id` TINYINT(4) NOT NULL,
	`incoterm_id` TINYINT(4) NOT NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci',
	`top_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`currency_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`incoterm_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`address` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`country_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_customer_list
DROP VIEW IF EXISTS `view_customer_list`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_customer_list` (
	`id` SMALLINT(6) NOT NULL,
	`code` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`company_name` VARCHAR(100) NOT NULL COMMENT 'cust consignee name = company name' COLLATE 'utf8mb4_general_ci',
	`address` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`country_id` TINYINT(4) NOT NULL,
	`phone_no` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`created_at` TIMESTAMP NOT NULL,
	`created_by` TINYINT(4) NOT NULL,
	`updated_at` DATETIME NULL,
	`updated_by` TINYINT(4) NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci',
	`country_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_customer_ship_detail
DROP VIEW IF EXISTS `view_customer_ship_detail`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_customer_ship_detail` (
	`id` SMALLINT(6) NOT NULL,
	`customer_ship_id` SMALLINT(6) NULL,
	`discharge_port` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`destination_port` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`is_deleted` ENUM('0','1') NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci',
	`customer_id` SMALLINT(6) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_gimp_doc_import
DROP VIEW IF EXISTS `view_gimp_doc_import`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_gimp_doc_import` (
	`docim_id` INT(11) NOT NULL,
	`doc_status` VARCHAR(10) NOT NULL COLLATE 'utf8mb4_general_ci',
	`doc_label` VARCHAR(7) NOT NULL COLLATE 'utf8mb4_general_ci',
	`po` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`ship_no` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`sender` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`seller` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`consignee` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`commodity` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`category` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`hscode` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`lartas` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`term` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`hbl` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`mbl` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`qty_container` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`container_no` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`uom` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`good_qty` DECIMAL(20,0) UNSIGNED NULL,
	`gw` DECIMAL(20,2) UNSIGNED NULL,
	`nw` DECIMAL(20,2) UNSIGNED NULL,
	`cbm` DECIMAL(20,0) NULL,
	`pol` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`pod` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`etd` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`eta` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`pib_aju` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`coo` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`materlist` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`rcvd` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`billing` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`spjm` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`spjk` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`sppb` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`pickup_do` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`delivery` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`remarks` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`currency` DECIMAL(20,2) NULL,
	`cif` DECIMAL(20,2) NULL,
	`duty` DECIMAL(20,2) NULL,
	`vat` DECIMAL(20,3) NULL,
	`tax` DECIMAL(20,3) NULL,
	`freight` DECIMAL(20,2) NULL,
	`handling` DECIMAL(20,2) NULL,
	`at_cost` DECIMAL(20,2) NULL,
	`additional` DECIMAL(20,0) NULL,
	`lead_time` INT(7) NULL,
	`times` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`percent` DECIMAL(49,8) NULL,
	`cif_2` DECIMAL(40,4) NULL,
	`landed_cost` DECIMAL(65,10) NULL,
	`percentage` DECIMAL(65,14) NULL,
	`forwarder` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`created_years` VARCHAR(4) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_item
DROP VIEW IF EXISTS `view_item`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_item` (
	`id` TINYINT(4) NOT NULL,
	`code` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`hs_code` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`item_category_id` TINYINT(4) NOT NULL,
	`name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`pack_desc` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`net_wight` DECIMAL(20,2) NOT NULL,
	`gross_weight` DECIMAL(20,2) NOT NULL,
	`length` DECIMAL(10,0) NOT NULL,
	`width` DECIMAL(10,0) NOT NULL,
	`height` DECIMAL(10,0) NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` DATETIME NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci',
	`item_category_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`dimensions` VARCHAR(39) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_item_mapping
DROP VIEW IF EXISTS `view_item_mapping`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_item_mapping` (
	`id` SMALLINT(6) NOT NULL,
	`item_id` TINYINT(4) NOT NULL,
	`country_id` TINYINT(4) NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` DATETIME NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci',
	`item_code` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`item_hscode` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`item_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`country_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_menu_assign
DROP VIEW IF EXISTS `view_menu_assign`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_menu_assign` (
	`id` TINYINT(4) NOT NULL,
	`menu_sub_id` TINYINT(4) NOT NULL,
	`role_id` TINYINT(4) NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`created_by` TINYINT(4) NULL,
	`module_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`group_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menu_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`role_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_menu_sub
DROP VIEW IF EXISTS `view_menu_sub`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_menu_sub` (
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

-- Dumping structure for view gpd_gexp.view_print_category_trans_pi
DROP VIEW IF EXISTS `view_print_category_trans_pi`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_print_category_trans_pi` (
	`pi_id` SMALLINT(6) NOT NULL,
	`item_category_id` TINYINT(4) NOT NULL,
	`item_category_name` VARCHAR(64) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_print_detail_trans_pi
DROP VIEW IF EXISTS `view_print_detail_trans_pi`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_print_detail_trans_pi` (
	`id` SMALLINT(6) NOT NULL,
	`pi_id` SMALLINT(6) NOT NULL,
	`pi_item_category_id` TINYINT(4) NOT NULL,
	`item_id` TINYINT(4) NOT NULL,
	`qty` DECIMAL(20,0) NOT NULL,
	`price` DECIMAL(20,2) NOT NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci',
	`item_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`pack_desc` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`total` DECIMAL(40,2) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_print_footer_trans_pi
DROP VIEW IF EXISTS `view_print_footer_trans_pi`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_print_footer_trans_pi` (
	`pi_id` SMALLINT(6) NOT NULL,
	`tot_qty` DECIMAL(42,0) NULL,
	`tot_price` DECIMAL(42,2) NULL,
	`grand_total` DECIMAL(40,2) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_print_header_trans_pi
DROP VIEW IF EXISTS `view_print_header_trans_pi`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_print_header_trans_pi` (
	`id` SMALLINT(6) NOT NULL,
	`inv_no` VARCHAR(25) NOT NULL COMMENT 'Format: 0000/SKP-EXP/PI/MM/YYYY' COLLATE 'utf8mb4_general_ci',
	`po_no` VARCHAR(25) NULL COLLATE 'utf8mb4_general_ci',
	`town` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`consignee` MEDIUMTEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`beneficiary` MEDIUMTEXT NULL COLLATE 'utf8mb4_general_ci',
	`bank` MEDIUMTEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`destination_port` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`estimated` VARCHAR(15) NOT NULL COLLATE 'utf8mb4_general_ci',
	`loading_port` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`country_origin` VARCHAR(9) NOT NULL COLLATE 'utf8mb4_general_ci',
	`container` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`incoterm` VARCHAR(5) NOT NULL COLLATE 'utf8mb4_general_ci',
	`currency_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`currency_icon` VARCHAR(5) NOT NULL COLLATE 'utf8mb4_general_ci',
	`top_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_print_signature_trans_pi
DROP VIEW IF EXISTS `view_print_signature_trans_pi`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_print_signature_trans_pi` (
	`pi_id` SMALLINT(6) NOT NULL,
	`customer_id` SMALLINT(6) NOT NULL,
	`pic` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`positions` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`town` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`company_name` VARCHAR(100) NOT NULL COMMENT 'cust consignee name = company name' COLLATE 'utf8mb4_general_ci',
	`cp_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_trans_pi_list
DROP VIEW IF EXISTS `view_trans_pi_list`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trans_pi_list` (
	`id` SMALLINT(6) NOT NULL,
	`code` VARCHAR(25) NOT NULL COMMENT 'Format: 0000/SKP-EXP/PI/MM/YYYY' COLLATE 'utf8mb4_general_ci',
	`po_no` VARCHAR(25) NULL COLLATE 'utf8mb4_general_ci',
	`customer_id` SMALLINT(6) NOT NULL,
	`consignee_id` SMALLINT(6) NOT NULL,
	`beneficiary_id` TINYINT(4) NOT NULL,
	`loading_port_id` TINYINT(4) NOT NULL,
	`customer_ship_id` SMALLINT(6) NOT NULL,
	`container_id` TINYINT(4) NOT NULL,
	`number_of_container` DECIMAL(20,0) NOT NULL,
	`freight_company` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`freight_company_contact` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`freight_company_no` DECIMAL(20,0) NOT NULL,
	`freight_cost` DECIMAL(20,0) NOT NULL,
	`insurance` DECIMAL(20,0) NOT NULL,
	`bank_id` TINYINT(4) NOT NULL,
	`currency_id` TINYINT(4) NOT NULL,
	`ppn` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci',
	`top_id` TINYINT(4) NOT NULL,
	`remark` TEXT NULL COLLATE 'utf8mb4_general_ci',
	`attachment` VARCHAR(200) NULL COLLATE 'utf8mb4_general_ci',
	`pi_status_id` TINYINT(4) NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`created_by` TINYINT(4) NOT NULL,
	`updated_at` DATETIME NULL,
	`updated_by` TINYINT(4) NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci',
	`pi_date` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`customer` VARCHAR(100) NOT NULL COMMENT 'cust consignee name = company name' COLLATE 'utf8mb4_general_ci',
	`country_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`pic` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`status_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`bg_color` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_user_list
DROP VIEW IF EXISTS `view_user_list`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_user_list` (
	`id` TINYINT(4) NOT NULL,
	`fullname` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`username` VARCHAR(10) NOT NULL COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`role_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` VARCHAR(19) NULL COLLATE 'utf8mb4_general_ci',
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_user_role
DROP VIEW IF EXISTS `view_user_role`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_user_role` (
	`id` TINYINT(4) NOT NULL,
	`fullname` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`username` VARCHAR(10) NOT NULL COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`password` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci',
	`role_id` TINYINT(4) NOT NULL,
	`role_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.gexp_email_list
DROP VIEW IF EXISTS `gexp_email_list`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `gexp_email_list`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `gexp_email_list` AS SELECT
	a.UsersId id, a.UserEmail email
FROM gexp_users a
WHERE a.isStatus = 1 
AND a.UsersId IN (3,4)
-- AND a.UserGroup BETWEEN '20' AND '26' 
-- AND a.UsersId BETWEEN '34' AND '40' ;

-- Dumping structure for view gpd_gexp.gexp_pi_cbm
DROP VIEW IF EXISTS `gexp_pi_cbm`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `gexp_pi_cbm`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `gexp_pi_cbm` AS SELECT
	a.gexp_good_pi_no pi_no, SUM(a.current_cbm) current_cbm,
	(
		select
			b.currenct_remain_cbm
		FROM gexp_pi_good b
		WHERE b.gexp_good_pi_no = a.gexp_good_pi_no
		ORDER BY b.gexp_good_id DESC LIMIT 1
	) currenct_remain_cbm
FROM gexp_pi_good a
GROUP BY a.gexp_good_pi_no ;

-- Dumping structure for view gpd_gexp.gexp_view_ketentuan_exp
DROP VIEW IF EXISTS `gexp_view_ketentuan_exp`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `gexp_view_ketentuan_exp`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `gexp_view_ketentuan_exp` AS SELECT 
	MAX(a.gexp_expreq_id) gexp_expreq_id, a.gexp_expreq_pi_id, IF(a.gexp_expreq_remark IS NULL, '-', a.gexp_expreq_remark) gexp_expreq_remark,
	b.gexp_pi_no, b.gexp_pi_date,
	c.CustCompanyName, d.CountryName,
	
	CASE
		WHEN b.gexp_pi_statusPI = 1 THEN 'Approved'
		WHEN b.gexp_pi_statusPI = 2 THEN 'Void'
		WHEN b.gexp_pi_statusPI = 3 THEN 'Waiting'
	ELSE 'Draft'
	END gexp_pi_statusPI,
	
	CASE
		WHEN b.gexp_pi_statusPI = 1 THEN 'success'
		WHEN b.gexp_pi_statusPI = 2 THEN 'danger'
		WHEN b.gexp_pi_statusPI = 3 THEN 'warning'
	ELSE 'default'
	END gexp_pi_statusPI_label,
	
	CASE
		WHEN (
			SELECT ep.gexp_expreq_statusDoc FROM gexp_master_expreq ep
			WHERE ep.gexp_expreq_pi_id = a.gexp_expreq_pi_id
			ORDER BY ep.gexp_expreq_id DESC LIMIT 1
		) = 1 THEN 'Approved'
		WHEN (
			SELECT ep.gexp_expreq_statusDoc FROM gexp_master_expreq ep
			WHERE ep.gexp_expreq_pi_id = a.gexp_expreq_pi_id
			ORDER BY ep.gexp_expreq_id DESC LIMIT 1
		) = 2 THEN 'Void'
		WHEN (
			SELECT ep.gexp_expreq_statusDoc FROM gexp_master_expreq ep
			WHERE ep.gexp_expreq_pi_id = a.gexp_expreq_pi_id
			ORDER BY ep.gexp_expreq_id DESC LIMIT 1
		) = 3 THEN 'Waiting'
		WHEN (
			SELECT ep.gexp_expreq_statusDoc FROM gexp_master_expreq ep
			WHERE ep.gexp_expreq_pi_id = a.gexp_expreq_pi_id
			ORDER BY ep.gexp_expreq_id DESC LIMIT 1
		) = 4 THEN 'Revised'
	ELSE 'Draft'
	END gexp_expreq_statusDoc,
	
	CASE
		WHEN (
			SELECT ep.gexp_expreq_statusDoc FROM gexp_master_expreq ep
			WHERE ep.gexp_expreq_pi_id = a.gexp_expreq_pi_id
			ORDER BY ep.gexp_expreq_id DESC LIMIT 1
		) = 1 THEN 'success'
		WHEN (
			SELECT ep.gexp_expreq_statusDoc FROM gexp_master_expreq ep
			WHERE ep.gexp_expreq_pi_id = a.gexp_expreq_pi_id
			ORDER BY ep.gexp_expreq_id DESC LIMIT 1
		) = 2 THEN 'danger'
		WHEN (
			SELECT ep.gexp_expreq_statusDoc FROM gexp_master_expreq ep
			WHERE ep.gexp_expreq_pi_id = a.gexp_expreq_pi_id
			ORDER BY ep.gexp_expreq_id DESC LIMIT 1
		) = 3 THEN 'warning'
		WHEN (
			SELECT ep.gexp_expreq_statusDoc FROM gexp_master_expreq ep
			WHERE ep.gexp_expreq_pi_id = a.gexp_expreq_pi_id
			ORDER BY ep.gexp_expreq_id DESC LIMIT 1
		) = 4 THEN 'warning'
	ELSE 'default'
	END gexp_expreq_statusDoc_label,
	
	(
		SELECT ep.gexp_expreq_statusDoc FROM gexp_master_expreq ep
		WHERE ep.gexp_expreq_pi_id = a.gexp_expreq_pi_id
		ORDER BY ep.gexp_expreq_id DESC LIMIT 1
	) gexp_expreq_statusDoc_id,
	
	(
		SELECT ep4.gexp_expreq_docval FROM gexp_master_expreq ep4
		WHERE ep4.gexp_expreq_pi_id = a.gexp_expreq_pi_id
		ORDER BY ep4.gexp_expreq_id DESC LIMIT 1
	) gexp_expreq_docval_id,
	
	(
		SELECT ep5.gexp_expreq_doc02 FROM gexp_master_expreq ep5
		WHERE ep5.gexp_expreq_pi_id = a.gexp_expreq_pi_id
		ORDER BY ep5.gexp_expreq_id DESC LIMIT 1
	) gexp_expreq_doc02_id,

	CASE
		WHEN (
			SELECT ep2.gexp_expreq_isRevisi FROM gexp_master_expreq ep2
			WHERE ep2.gexp_expreq_pi_id = a.gexp_expreq_pi_id
			ORDER BY ep2.gexp_expreq_id DESC LIMIT 1
		) = 1 THEN (
			SELECT ep2.gexp_expreq_ValRevisi FROM gexp_master_expreq ep2
			WHERE ep2.gexp_expreq_pi_id = a.gexp_expreq_pi_id
			ORDER BY ep2.gexp_expreq_id DESC LIMIT 1
		)
	ELSE '-'
	END gexp_expreq_ValRevisi,
	
	CASE
		WHEN (
			SELECT ep3.gexp_expreq_isRevisi FROM gexp_master_expreq ep3
			WHERE ep3.gexp_expreq_pi_id = a.gexp_expreq_pi_id
			ORDER BY ep3.gexp_expreq_id DESC LIMIT 1
		) = 1 THEN (
			SELECT ep3.gexp_expreq_DateRevisi FROM gexp_master_expreq ep3
			WHERE ep3.gexp_expreq_pi_id = a.gexp_expreq_pi_id
			ORDER BY ep3.gexp_expreq_id DESC LIMIT 1
		)
	ELSE '-'
	END gexp_expreq_DateRevisi
FROM gexp_master_expreq a
JOIN gexp_master_pi b ON a.gexp_expreq_pi_id = b.gexp_pi_id
JOIN gexp_master_customer c ON b.gexp_pi_consignee_id = c.CustId
JOIN gexp_master_country d ON c.CustCountry = d.CountryId
WHERE b.gexp_pi_statusPI = '1' AND b.gexp_pi_statrow = '1'
GROUP BY a.gexp_expreq_pi_id
ORDER BY gexp_expreq_id ASC ;

-- Dumping structure for view gpd_gexp.view_assign_group
DROP VIEW IF EXISTS `view_assign_group`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_assign_group`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_assign_group` AS SELECT
	b.menu_module_id, d.url menu_module_url, b.menu_group_id, c.name menu_group_name, c.icon menu_group_icon, a.role_id
FROM trans_menu_assign a
JOIN master_menu_sub b ON a.menu_sub_id = b.id
JOIN master_menu_group c ON b.menu_group_id = c.id
JOIN master_menu_module d ON b.menu_module_id = d.id
GROUP BY b.menu_module_id, b.menu_group_id, a.role_id ;

-- Dumping structure for view gpd_gexp.view_assign_menu
DROP VIEW IF EXISTS `view_assign_menu`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_assign_menu`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_assign_menu` AS SELECT
	b.menu_module_id, c.url menu_module_url, b.menu_group_id, a.menu_sub_id, b.name menu_sub_name, b.icon menu_sub_icon, b.url menu_sub_url, a.role_id
FROM trans_menu_assign a
JOIN master_menu_sub b ON a.menu_sub_id = b.id 
JOIN master_menu_module c ON b.menu_module_id = c.id ;

-- Dumping structure for view gpd_gexp.view_assign_module
DROP VIEW IF EXISTS `view_assign_module`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_assign_module`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_assign_module` AS SELECT
	b.menu_module_id, c.name menu_module_name, c.icon menu_module_icon, c.url menu_module_url, a.role_id
FROM trans_menu_assign a
JOIN master_menu_sub b ON a.menu_sub_id = b.id
JOIN master_menu_module c ON b.menu_module_id = c.id
GROUP BY b.menu_module_id, a.role_id ;

-- Dumping structure for view gpd_gexp.view_beneficiary
DROP VIEW IF EXISTS `view_beneficiary`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_beneficiary`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_beneficiary` AS SELECT
	a.*, b.name country_name
FROM master_beneficiary a
JOIN master_country b ON a.country_id = b.id ;

-- Dumping structure for view gpd_gexp.view_cek_cbm_per_item
DROP VIEW IF EXISTS `view_cek_cbm_per_item`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_cek_cbm_per_item`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_cek_cbm_per_item` AS SELECT
	a.gexp_good_pi_no pi_no, 
	b.ItemCodeId item_code, b.ItemBrandName brand_name, b.ItemName item_name,
	b.`Length` panjang, b.Width lebar, b.Height tinggi, a.gexp_good_qty qty,
	ROUND((((b.`Length` * b.Width * b.Height) / 1000000000) * a.gexp_good_qty), 2) result_cbm
FROM gexp_pi_good a
JOIN gexp_master_item b ON a.gexp_good_item_id = b.ItemId
ORDER BY a.gexp_good_pi_no ;

-- Dumping structure for view gpd_gexp.view_cek_cbm_per_pi
DROP VIEW IF EXISTS `view_cek_cbm_per_pi`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_cek_cbm_per_pi`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_cek_cbm_per_pi` AS SELECT
	a.gexp_good_pi_no pi_no, d.ContainerDesc container, d.MaxCBM max_cbm, SUM(a.gexp_good_qty) tot_qty,
	SUM(ROUND((((b.`Length` * b.Width * b.Height) / 1000000000) * a.gexp_good_qty), 2)) result_cbm,
	(d.MaxCBM - SUM(ROUND((((b.`Length` * b.Width * b.Height) / 1000000000) * a.gexp_good_qty), 2))) remain_cbm
FROM gexp_pi_good a
JOIN gexp_master_item b ON a.gexp_good_item_id = b.ItemId
JOIN gexp_master_pi c ON a.gexp_good_pi_no = c.gexp_pi_no
JOIN gexp_master_container d ON c.gexp_pi_container = d.ContainerId
GROUP BY a.gexp_good_pi_no
ORDER BY a.gexp_good_pi_no ;

-- Dumping structure for view gpd_gexp.view_customer_coding
DROP VIEW IF EXISTS `view_customer_coding`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_customer_coding`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_customer_coding` AS SELECT
	a.*, b.coding_type_id, b.import_by, b.hotline, b.best_before
FROM master_customer_coding a
JOIN master_customer_coding_detail b ON a.id = b.customer_coding_id ;

-- Dumping structure for view gpd_gexp.view_customer_cp
DROP VIEW IF EXISTS `view_customer_cp`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_customer_cp`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_customer_cp` AS SELECT
	a.*, b.name top_name, c.name currency_name, d.name incoterm_name, e.address, f.name country_name
FROM master_customer_cp a
JOIN master_top b ON a.top_id = b.id
JOIN master_currency c ON a.currency_id = c.id
JOIN master_incoterm d ON a.incoterm_id = d.id
JOIN master_customer e ON a.customer_id = e.id
JOIN master_country f ON e.country_id = f.id ;

-- Dumping structure for view gpd_gexp.view_customer_list
DROP VIEW IF EXISTS `view_customer_list`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_customer_list`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_customer_list` AS SELECT
	a.*, b.name country_name
FROM master_customer a
JOIN master_country b ON a.country_id = b.id ;

-- Dumping structure for view gpd_gexp.view_customer_ship_detail
DROP VIEW IF EXISTS `view_customer_ship_detail`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_customer_ship_detail`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_customer_ship_detail` AS SELECT
	a.*, b.customer_id
FROM master_customer_ship_detail a
JOIN master_customer_ship b ON a.customer_ship_id = b.id ;

-- Dumping structure for view gpd_gexp.view_gimp_doc_import
DROP VIEW IF EXISTS `view_gimp_doc_import`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_gimp_doc_import`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_gimp_doc_import` AS SELECT
	a.docim_id,
	IF(a.docim_stats = 1, 'Active', 'Not Active') doc_status,
	IF(a.docim_stats = 1, 'success', 'danger') doc_label,
	IF(a.docim_po IS NULL, '-', a.docim_po) po,
	IF(a.docim_ship_numbers IS NULL, '-', a.docim_ship_numbers) ship_no,
	IF(a.docim_pengirim IS NULL, '-', a.docim_pengirim) sender,
	IF(a.docim_penjual IS NULL, '-', a.docim_penjual) seller,
	IF(a.docim_consignee IS NULL, '-', b.name) consignee,
	IF(a.docim_commodity IS NULL, '-', a.docim_commodity) commodity,
	IF(a.docim_category IS NULL, '-', c.mt_categori_name) category,
	IF(a.docim_hscode IS NULL, '-', a.docim_hscode) hscode,
	IF(a.docim_lartas IS NULL, '-', a.docim_lartas) lartas,
	IF(a.docim_term IS NULL, '-', d.IncotermDesc) term,
	IF(a.docim_HBL IS NULL, '-', a.docim_HBL) hbl,
	IF(a.docim_MBL IS NULL, '-', a.docim_MBL) mbl,
	IF(a.docim_qty_container IS NULL, '-', a.docim_qty_container) qty_container,
	IF(a.docim_no_container IS NULL, '-', a.docim_no_container) container_no,
	IF(e.mt_uom_name IS NULL, '-', e.mt_uom_name) uom,
	a.docim_good_qty good_qty, a.docim_GW gw, a.docim_NW nw, a.docim_CBM cbm,
	IF(a.docim_POL IS NULL, '-', a.docim_POL) pol,
	IF(a.docim_POD IS NULL, '-', a.docim_POD) pod,
	IF(a.docim_ETD IS NULL, '-', a.docim_ETD) etd,
	IF(a.docim_ETA IS NULL, '-', a.docim_ETA) eta,
	IF(a.docim_PIB_AJU IS NULL, '-', a.docim_PIB_AJU) pib_aju,
	IF(a.docim_COO IS NULL, '-', a.docim_COO) coo,
	IF(a.docim_masterlist IS NULL, '-', a.docim_masterlist) materlist,
	IF(a.docim_rcvd_oridoc IS NULL, '-', a.docim_rcvd_oridoc) rcvd,
	IF(a.docim_billing IS NULL, '-', a.docim_billing) billing,
	IF(a.docim_spjm IS NULL, '-', a.docim_spjm) spjm,
	IF(a.docim_spjk IS NULL, '-', a.docim_spjk) spjk,
	IF(a.docim_sppb IS NULL, '-', a.docim_sppb) sppb,
	IF(a.docim_pickup_do IS NULL, '-', a.docim_pickup_do) pickup_do,
	IF(a.docim_delivery IS NULL, '-', a.docim_delivery) delivery,
	IF(a.docim_remarks IS NULL, '-', a.docim_remarks) remarks,
	a.docim_currency currency, a.docim_CIF cif, a.docim_Duty duty,
	a.docim_VAT vat, a.docim_TAX tax, a.docim_freight freight, 
	a.docim_handling handling, a.docim_atcost at_cost, a.docim_additional additional,
	IF(DATEDIFF(a.docim_delivery, a.docim_ETA) IS NULL, 0, DATEDIFF(a.docim_delivery, a.docim_ETA)) lead_time,
	IF(a.docim_time IS NULL, '-', a.docim_time) times,
	
	IF(
		((a.docim_handling + a.docim_atcost + (a.docim_Duty * a.docim_currency)) / ((a.docim_CIF * a.docim_currency) + a.docim_freight)) IS NULL, 0, 
		((a.docim_handling + a.docim_atcost + (a.docim_Duty * a.docim_currency)) / ((a.docim_CIF * a.docim_currency) + a.docim_freight))
	) percent,
	
	(a.docim_CIF * a.docim_currency) cif_2,
	
	IF(
		((a.docim_Duty * ((a.docim_handling + a.docim_atcost + (a.docim_Duty * a.docim_currency)) / ((a.docim_CIF * a.docim_currency) + a.docim_freight))) + a.docim_handling + a.docim_atcost) IS NULL, 0,
		((a.docim_Duty * ((a.docim_handling + a.docim_atcost + (a.docim_Duty * a.docim_currency)) / ((a.docim_CIF * a.docim_currency) + a.docim_freight))) + a.docim_handling + a.docim_atcost)
	) landed_cost,
	
	IF(
		(((a.docim_Duty * ((a.docim_handling + a.docim_atcost + (a.docim_Duty * a.docim_currency)) / ((a.docim_CIF * a.docim_currency) + a.docim_freight))) + a.docim_handling + a.docim_atcost) / (a.docim_CIF * a.docim_currency)) IS NULL, 0,
		(((a.docim_Duty * ((a.docim_handling + a.docim_atcost + (a.docim_Duty * a.docim_currency)) / ((a.docim_CIF * a.docim_currency) + a.docim_freight))) + a.docim_handling + a.docim_atcost) / (a.docim_CIF * a.docim_currency))
	) percentage,
	IF(a.docim_forwarder IS NULL, '-', a.docim_forwarder) forwarder,
	DATE_FORMAT(a.docim_createdAt, '%Y') created_years
FROM gimp_docim a
LEFT JOIN gimp_consignee b ON a.docim_consignee = b.id
LEFT JOIN gimp_mt_category c ON a.docim_category = c.mt_categori_id
LEFT JOIN gexp_master_incoterm d ON a.docim_term = d.IncotermId 
LEFT JOIN gimp_mt_uom e ON a.docim_good_uom = e.mt_uom_id 
WHERE a.docim_stats BETWEEN '1' AND '2' 
ORDER BY eta DESC ;

-- Dumping structure for view gpd_gexp.view_item
DROP VIEW IF EXISTS `view_item`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_item`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_item` AS SELECT
	a.*, b.name item_category_name, CONCAT(a.`length`, ' X ', a.width, ' X ', a.height) dimensions
FROM master_item a
JOIN master_item_category b ON a.item_category_id = b.id ;

-- Dumping structure for view gpd_gexp.view_item_mapping
DROP VIEW IF EXISTS `view_item_mapping`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_item_mapping`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_item_mapping` AS SELECT
	a.*, b.code item_code, b.hs_code item_hscode, b.name item_name, c.name country_name
FROM master_item_mapping a
JOIN master_item b ON a.item_id = b.id
JOIN master_country c ON a.country_id = c.id ;

-- Dumping structure for view gpd_gexp.view_menu_assign
DROP VIEW IF EXISTS `view_menu_assign`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_menu_assign`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_menu_assign` AS SELECT
	a.*, c.name module_name, d.name group_name, b.name menu_name, e.name role_name
FROM trans_menu_assign a
JOIN master_menu_sub b ON a.menu_sub_id = b.id
JOIN master_menu_module c ON b.menu_module_id = c.id
JOIN master_menu_group d ON b.menu_group_id = d.id
JOIN master_role e ON a.role_id = e.id
ORDER BY a.created_at ;

-- Dumping structure for view gpd_gexp.view_menu_sub
DROP VIEW IF EXISTS `view_menu_sub`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_menu_sub`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_menu_sub` AS SELECT
	a.*, b.name menu_module_name, c.name menu_group_name
FROM master_menu_sub a
JOIN master_menu_module b ON a.menu_module_id = b.id
JOIN master_menu_group c ON a.menu_group_id = c.id
ORDER BY a.id ;

-- Dumping structure for view gpd_gexp.view_print_category_trans_pi
DROP VIEW IF EXISTS `view_print_category_trans_pi`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_print_category_trans_pi`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_print_category_trans_pi` AS SELECT
	a.pi_id, a.pi_item_category_id item_category_id,
	IF(a.pi_item_category_id = 1, CONCAT('1 x Container ', c.name), 'Free of Charge') item_category_name
FROM trans_pi_detail a
JOIN trans_pi b ON a.pi_id = b.id
JOIN master_container c ON b.container_id = c.id
GROUP BY a.pi_id, a.pi_item_category_id ;

-- Dumping structure for view gpd_gexp.view_print_detail_trans_pi
DROP VIEW IF EXISTS `view_print_detail_trans_pi`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_print_detail_trans_pi`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_print_detail_trans_pi` AS SELECT
	a.*, b.name item_name, b.pack_desc, (a.qty * a.price) total
FROM trans_pi_detail a
JOIN master_item b ON a.item_id = b.id
ORDER BY a.pi_item_category_id ;

-- Dumping structure for view gpd_gexp.view_print_footer_trans_pi
DROP VIEW IF EXISTS `view_print_footer_trans_pi`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_print_footer_trans_pi`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_print_footer_trans_pi` AS SELECT
	a.pi_id, SUM(a.qty) tot_qty, SUM(a.price) tot_price, (a.qty * a.price) grand_total
FROM trans_pi_detail a
GROUP BY a.pi_id ;

-- Dumping structure for view gpd_gexp.view_print_header_trans_pi
DROP VIEW IF EXISTS `view_print_header_trans_pi`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_print_header_trans_pi`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_print_header_trans_pi` AS SELECT
	a.id, a.code inv_no, 
	IF(a.po_no IS NULL, '-', a.po_no) po_no, b.town,
	
	CONCAT(
		b.company_name, '<br>',
		b.address, '<br>',
		b.phone_no
	) consignee,
	
	CONCAT(
		c.company_name, '<br>',
		c.office, '<br>',
		c.address, '<br>',
		c.phone
	) beneficiary,
	
	CONCAT(
		k.name, '<br>',
		k.branch, '<br>',
		k.address, '<br>',
		'<b>Acc No: </b>', k.account, '<br>',
		'<b>Swift code: </b>', k.swift_code
	) bank,
	
	d.destination_port, '30 Working Days' estimated, e.name loading_port, 'Indonesia' country_origin, 
	f.name container, h.code incoterm, 
	i.name currency_name, i.icon currency_icon, j.name top_name,
	a.is_deleted
FROM trans_pi a
JOIN master_customer b ON a.consignee_id = b.id
JOIN master_beneficiary c ON a.beneficiary_id = c.id
JOIN master_customer_ship_detail d ON a.customer_ship_id = d.id
JOIN master_loading_port e ON a.loading_port_id = e.id
JOIN master_container f ON a.container_id = f.id
JOIN master_customer_cp g ON a.consignee_id = g.customer_id
JOIN master_incoterm h ON g.incoterm_id = h.id
JOIN master_currency i ON a.currency_id = i.id
JOIN master_top j ON a.top_id = j.id
JOIN master_bank k ON a.bank_id = k.id ;

-- Dumping structure for view gpd_gexp.view_print_signature_trans_pi
DROP VIEW IF EXISTS `view_print_signature_trans_pi`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_print_signature_trans_pi`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_print_signature_trans_pi` AS SELECT
	a.id pi_id, a.customer_id, d.fullname pic, f.name positions, b.town, b.company_name, c.name cp_name
FROM trans_pi a
JOIN master_customer b ON a.customer_id = b.id
JOIN master_customer_cp c ON b.id = c.customer_id
JOIN `master_user` d ON a.created_by = d.id
JOIN master_user_role e ON d.id = e.user_id
JOIN master_position f ON e.role_id = f.role_id ;

-- Dumping structure for view gpd_gexp.view_trans_pi_list
DROP VIEW IF EXISTS `view_trans_pi_list`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trans_pi_list`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_trans_pi_list` AS SELECT
	a.*, DATE_FORMAT(a.created_at, '%Y-%m-%d') pi_date, 
	b.company_name customer, c.name country_name, d.fullname pic, e.name status_name, e.bg_color
FROM trans_pi a
JOIN master_customer b ON a.customer_id = b.id
JOIN master_country c ON b.country_id = c.id
JOIN `master_user` d ON a.created_by = d.id
JOIN master_pi_status e ON a.pi_status_id = e.id ;

-- Dumping structure for view gpd_gexp.view_user_list
DROP VIEW IF EXISTS `view_user_list`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_user_list`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_user_list` AS SELECT
	a.id, a.fullname, a.username, a.email, c.name role_name, 
	a.created_at, IF(a.updated_at IS NULL, '-', a.updated_at) updated_at, 
	a.is_deleted
FROM `master_user` a
JOIN master_user_role b ON a.id = b.user_id
JOIN master_role c ON b.role_id = c.id
ORDER BY a.id DESC ;

-- Dumping structure for view gpd_gexp.view_user_role
DROP VIEW IF EXISTS `view_user_role`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_user_role`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_user_role` AS SELECT
	a.*, b.role_id, c.name role_name
FROM `master_user` a
JOIN master_user_role b ON a.id = b.user_id
JOIN master_role c ON b.role_id = c.id
ORDER BY a.id ASC ;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
