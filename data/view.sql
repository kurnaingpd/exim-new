-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.6-MariaDB - mariadb.org binary distribution
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

-- Dumping structure for view gpd_gexp.gexp_email_list
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `gexp_email_list` (
	`id` INT(11) NOT NULL,
	`email` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.gexp_pi_cbm
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `gexp_pi_cbm` (
	`pi_no` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`current_cbm` DECIMAL(42,6) NULL,
	`currenct_remain_cbm` DECIMAL(20,6) UNSIGNED NULL
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.gexp_view_ketentuan_exp
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

-- Dumping structure for view gpd_gexp.view_assign_group
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
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_assign_module` (
	`menu_module_id` TINYINT(4) NOT NULL,
	`menu_module_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menu_module_icon` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`menu_module_url` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`role_id` TINYINT(4) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_beneficiary
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
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_customer_list` (
	`id` SMALLINT(6) NOT NULL,
	`code` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`company_name` VARCHAR(100) NOT NULL COMMENT 'cust consignee name = company name' COLLATE 'utf8mb4_general_ci',
	`address` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`town` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
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
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_print_category_trans_pi` (
	`pi_id` SMALLINT(6) NOT NULL,
	`item_category_id` TINYINT(4) NOT NULL,
	`item_category_name` VARCHAR(84) NOT NULL COLLATE 'utf8mb4_general_ci',
	`category_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_print_detail_trans_pi
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_print_detail_trans_pi` (
	`id` SMALLINT(6) NOT NULL,
	`pi_id` SMALLINT(6) NOT NULL,
	`pi_item_category_id` TINYINT(4) NOT NULL,
	`item_id` TINYINT(4) NOT NULL,
	`qty` DECIMAL(20,0) NOT NULL,
	`price` DECIMAL(20,2) NOT NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci',
	`pi_item_category_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`item_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`hs_code` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`pack_desc` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`total` DECIMAL(40,2) NOT NULL,
	`length` DECIMAL(10,0) NOT NULL,
	`width` DECIMAL(10,0) NOT NULL,
	`height` DECIMAL(10,0) NOT NULL,
	`volume` DECIMAL(34,4) NULL,
	`remain_cbm` DECIMAL(54,4) NULL
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_print_footer_trans_pi
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_print_footer_trans_pi` (
	`pi_id` SMALLINT(6) NOT NULL,
	`tot_qty` DECIMAL(42,0) NULL,
	`tot_price` DECIMAL(42,2) NULL,
	`grand_total` DECIMAL(40,2) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_print_header_trans_pi
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

-- Dumping structure for view gpd_gexp.view_trans_pi_detail
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trans_pi_detail` (
	`id` SMALLINT(6) NOT NULL,
	`pi_no` VARCHAR(25) NOT NULL COMMENT 'Format: 0000/SKP-EXP/PI/MM/YYYY' COLLATE 'utf8mb4_general_ci',
	`pi_date` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`po_no` VARCHAR(25) NULL COLLATE 'utf8mb4_general_ci',
	`consignee_name` VARCHAR(100) NOT NULL COMMENT 'cust consignee name = company name' COLLATE 'utf8mb4_general_ci',
	`consginee_address` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`consignee_country` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`consignee_phone` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`consignee_cp` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`beneficiary_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`beneficiary_address` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`beneficiary_country` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`beneficiary_phone` VARCHAR(20) NULL COLLATE 'utf8mb4_general_ci',
	`beneficiary_cp` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`data_loading_port` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`data_discharge_port` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`data_destination_port` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`container_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`number_of_container` DECIMAL(20,0) NOT NULL,
	`freight_company` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`freight_company_contact` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`freight_company_no` DECIMAL(20,0) NOT NULL,
	`freight_cost` DECIMAL(20,0) NOT NULL,
	`insurance` DECIMAL(20,0) NOT NULL,
	`data_bank_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`data_currency` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`data_ppn` VARCHAR(3) NOT NULL COLLATE 'utf8mb4_general_ci',
	`data_top` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`incoterm_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`incoterm_code` VARCHAR(5) NOT NULL COLLATE 'utf8mb4_general_ci',
	`max_cbm` DECIMAL(3,0) NOT NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci',
	`pi_status_id` TINYINT(4) NOT NULL,
	`pi_status` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_trans_pi_detail_item
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trans_pi_detail_item` (
	`id` SMALLINT(6) NOT NULL,
	`pi_id` SMALLINT(6) NOT NULL,
	`pi_item_category_id` TINYINT(4) NOT NULL,
	`item_id` TINYINT(4) NOT NULL,
	`qty` DECIMAL(20,0) NOT NULL,
	`price` DECIMAL(20,2) NOT NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci',
	`pi_item_category_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`item_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`length` DECIMAL(10,0) NOT NULL,
	`width` DECIMAL(10,0) NOT NULL,
	`height` DECIMAL(10,0) NOT NULL,
	`volume` DECIMAL(34,4) NULL,
	`cbm` DECIMAL(65,4) NULL
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_trans_pi_list
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
	`bg_color` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`display` VARCHAR(22) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_user_list
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_user_list` (
	`id` TINYINT(4) NOT NULL,
	`fullname` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`username` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`role_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`position_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` VARCHAR(19) NULL COLLATE 'utf8mb4_general_ci',
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.view_user_role
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_user_role` (
	`id` TINYINT(4) NOT NULL,
	`fullname` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`username` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`password` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NULL,
	`is_deleted` ENUM('0','1') NOT NULL COMMENT '0 = No; 1 = Yes;' COLLATE 'utf8mb4_general_ci',
	`role_id` TINYINT(4) NOT NULL,
	`role_name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`position_name` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view gpd_gexp.gexp_email_list
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
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_assign_menu`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_assign_menu` AS SELECT
	b.menu_module_id, c.url menu_module_url, b.menu_group_id, a.menu_sub_id, b.name menu_sub_name, b.icon menu_sub_icon, b.url menu_sub_url, a.role_id
FROM trans_menu_assign a
JOIN master_menu_sub b ON a.menu_sub_id = b.id 
JOIN master_menu_module c ON b.menu_module_id = c.id ;

-- Dumping structure for view gpd_gexp.view_assign_module
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_assign_module`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_assign_module` AS SELECT
	b.menu_module_id, c.name menu_module_name, c.icon menu_module_icon, c.url menu_module_url, a.role_id
FROM trans_menu_assign a
JOIN master_menu_sub b ON a.menu_sub_id = b.id
JOIN master_menu_module c ON b.menu_module_id = c.id
GROUP BY b.menu_module_id, a.role_id ;

-- Dumping structure for view gpd_gexp.view_beneficiary
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_beneficiary`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_beneficiary` AS SELECT
	a.*, b.name country_name
FROM master_beneficiary a
JOIN master_country b ON a.country_id = b.id ;

-- Dumping structure for view gpd_gexp.view_cek_cbm_per_item
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
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_customer_coding`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_customer_coding` AS SELECT
	a.*, b.coding_type_id, b.import_by, b.hotline, b.best_before
FROM master_customer_coding a
JOIN master_customer_coding_detail b ON a.id = b.customer_coding_id ;

-- Dumping structure for view gpd_gexp.view_customer_cp
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
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_customer_list`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_customer_list` AS SELECT
	a.*, b.name country_name
FROM master_customer a
JOIN master_country b ON a.country_id = b.id ;

-- Dumping structure for view gpd_gexp.view_customer_ship_detail
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_customer_ship_detail`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_customer_ship_detail` AS SELECT
	a.*, b.customer_id
FROM master_customer_ship_detail a
JOIN master_customer_ship b ON a.customer_ship_id = b.id ;

-- Dumping structure for view gpd_gexp.view_gimp_doc_import
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
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_item`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_item` AS SELECT
	a.*, b.name item_category_name, CONCAT(a.`length`, ' X ', a.width, ' X ', a.height) dimensions
FROM master_item a
JOIN master_item_category b ON a.item_category_id = b.id ;

-- Dumping structure for view gpd_gexp.view_item_mapping
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_item_mapping`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_item_mapping` AS SELECT
	a.*, b.code item_code, b.hs_code item_hscode, b.name item_name, c.name country_name
FROM master_item_mapping a
JOIN master_item b ON a.item_id = b.id
JOIN master_country c ON a.country_id = c.id ;

-- Dumping structure for view gpd_gexp.view_menu_assign
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
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_menu_sub`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_menu_sub` AS SELECT
	a.*, b.name menu_module_name, c.name menu_group_name
FROM master_menu_sub a
JOIN master_menu_module b ON a.menu_module_id = b.id
JOIN master_menu_group c ON a.menu_group_id = c.id
ORDER BY a.id ;

-- Dumping structure for view gpd_gexp.view_print_category_trans_pi
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_print_category_trans_pi`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_print_category_trans_pi` AS SELECT
	a.pi_id, a.pi_item_category_id item_category_id,
	IF(a.pi_item_category_id = 1, CONCAT(b.number_of_container,' x Container ', c.name), 'Free of Charge') item_category_name, d.name category_name
FROM trans_pi_detail a
JOIN trans_pi b ON a.pi_id = b.id
JOIN master_container c ON b.container_id = c.id
JOIN master_pi_item_category d ON a.pi_item_category_id = d.id
WHERE a.is_deleted = '0'
GROUP BY a.pi_id, a.pi_item_category_id ;

-- Dumping structure for view gpd_gexp.view_print_detail_trans_pi
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_print_detail_trans_pi`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_print_detail_trans_pi` AS SELECT
	a.*, c.name pi_item_category_name, b.name item_name, b.hs_code, b.pack_desc, (a.qty * a.price) total,
	b.`length`, b.width, b.height, ((b.`length` * b.width * b.height) / 1000000000) volume,
	(((b.`length` * b.width * b.height) / 1000000000) * a.qty) remain_cbm
FROM trans_pi_detail a
JOIN master_item b ON a.item_id = b.id
JOIN master_pi_item_category c ON a.pi_item_category_id = c.id
ORDER BY a.pi_id, a.pi_item_category_id ;

-- Dumping structure for view gpd_gexp.view_print_footer_trans_pi
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_print_footer_trans_pi`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_print_footer_trans_pi` AS SELECT
	a.pi_id, SUM(a.qty) tot_qty, SUM(a.price) tot_price, (a.qty * a.price) grand_total
FROM trans_pi_detail a
WHERE a.is_deleted = '0'
GROUP BY a.pi_id ;

-- Dumping structure for view gpd_gexp.view_print_header_trans_pi
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

-- Dumping structure for view gpd_gexp.view_trans_pi_detail
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trans_pi_detail`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_trans_pi_detail` AS SELECT
	a.id, a.code pi_no, DATE_FORMAT(a.created_at, '%Y-%m-%d') pi_date, IF(a.po_no IS NULL, '-', a.po_no) po_no,
	
	b.company_name consignee_name, b.address consginee_address, c.name consignee_country, b.phone_no consignee_phone, l.name consignee_cp,
	
	d.company_name beneficiary_name, d.address beneficiary_address, e.name beneficiary_country, d.phone beneficiary_phone, d.cp_name beneficiary_cp,
	
	f.name data_loading_port, g.discharge_port data_discharge_port, g.destination_port data_destination_port, h.name container_name, a.number_of_container, a.freight_company,
	a.freight_company_contact, a.freight_company_no, a.freight_cost, a.insurance, i.name data_bank_name, j.name data_currency, IF(a.ppn = '1', 'Yes', 'No') data_ppn, k.name data_top,
	
	m.name incoterm_name, m.code incoterm_code, h.max_cbm,

	a.is_deleted, a.pi_status_id, n.name pi_status
FROM trans_pi a
JOIN master_customer b ON a.consignee_id = b.id
JOIN master_country c ON b.country_id = c.id
JOIN master_beneficiary d ON a.beneficiary_id = d.id
JOIN master_country e ON d.country_id = e.id
JOIN master_loading_port f ON a.loading_port_id = f.id
JOIN master_customer_ship_detail g ON a.customer_ship_id = g.id
JOIN master_container h ON a.container_id = h.id
JOIN master_bank i ON a.bank_id = i.id
JOIN master_currency j ON a.currency_id = j.id
JOIN master_top k ON a.top_id = k.id
JOIN master_customer_cp l ON a.consignee_id = l.customer_id
JOIN master_incoterm m ON l.incoterm_id = m.id
JOIN master_pi_status n ON a.pi_status_id = n.id ;

-- Dumping structure for view gpd_gexp.view_trans_pi_detail_item
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trans_pi_detail_item`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_trans_pi_detail_item` AS SELECT
	a.*, c.name pi_item_category_name, b.name item_name,
	b.`length`, b.width, b.height, ((b.`length` * b.width * b.height) / 1000000000) volume,
	SUM((((b.`length` * b.width * b.height) / 1000000000) * a.qty)) cbm
FROM trans_pi_detail a
JOIN master_item b ON a.item_id = b.id
JOIN master_pi_item_category c ON a.pi_item_category_id = c.id
WHERE a.is_deleted = '0'
GROUP BY a.pi_id
ORDER BY a.pi_item_category_id ;

-- Dumping structure for view gpd_gexp.view_trans_pi_list
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trans_pi_list`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_trans_pi_list` AS SELECT
	a.*, DATE_FORMAT(a.created_at, '%Y-%m-%d') pi_date, 
	b.company_name customer, c.name country_name, d.fullname pic, e.name status_name, e.bg_color,
	IF(a.pi_status_id IN (1,6,7), '', 'style="display: none;"') display
FROM trans_pi a
JOIN master_customer b ON a.customer_id = b.id
JOIN master_country c ON b.country_id = c.id
JOIN `master_user` d ON a.created_by = d.id
JOIN master_pi_status e ON a.pi_status_id = e.id ;

-- Dumping structure for view gpd_gexp.view_user_list
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_user_list`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_user_list` AS SELECT
	a.id, a.fullname, a.username, a.email, c.name role_name, d.name position_name,
	a.created_at, IF(a.updated_at IS NULL, '-', a.updated_at) updated_at, 
	a.is_deleted
FROM `master_user` a
JOIN master_user_role b ON a.id = b.user_id
JOIN master_role c ON b.role_id = c.id
JOIN master_position d ON b.position_id = d.id
ORDER BY a.id DESC ;

-- Dumping structure for view gpd_gexp.view_user_role
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_user_role`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_user_role` AS SELECT
	a.*, b.role_id, c.name role_name, d.name position_name
FROM `master_user` a
JOIN master_user_role b ON a.id = b.user_id
JOIN master_role c ON b.role_id = c.id
JOIN master_position d ON b.position_id = d.id
ORDER BY a.id ASC ;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
