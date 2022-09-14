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

-- Dumping structure for table gpd_gexp.master_pi_item
CREATE TABLE IF NOT EXISTS `master_pi_item` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(100) NOT NULL,
  `option_id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = No; 1 = Yes;',
  PRIMARY KEY (`id`),
  KEY `FK_gexp_master_pi_item_gexp_master_pi_opt` (`option_id`),
  CONSTRAINT `FK_gexp_master_pi_item_gexp_master_pi_opt` FOREIGN KEY (`option_id`) REFERENCES `master_pi_opt` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gpd_gexp.master_pi_item: ~33 rows (approximately)
DELETE FROM `master_pi_item`;
INSERT INTO `master_pi_item` (`id`, `item`, `option_id`, `name`, `created_at`, `is_deleted`) VALUES
	(1, 'Signed PI', 1, 'signed_pi', '2022-08-04 07:26:00', '0'),
	(2, 'Purchase Order (If Any)', 1, 'purchase', '2022-08-04 07:26:39', '0'),
	(3, 'TOP', 2, 'top', '2022-08-04 07:29:19', '0'),
	(4, 'Down Payment Receipt', 1, 'dp_receipt', '2022-08-04 07:30:13', '0'),
	(5, 'Down Payment Received Confirmation', 3, 'dp_confirm', '2022-08-04 07:34:23', '0'),
	(6, 'Shipping Term', 2, 'shipping_term', '2022-08-04 07:36:04', '0'),
	(7, 'Bill of Ladding', 1, 'bill_ladding', '2022-08-04 07:38:57', '0'),
	(8, 'Packing List', 1, 'packing_list', '2022-08-04 07:39:47', '0'),
	(9, 'Invoice', 1, 'invoice', '2022-08-04 07:41:10', '0'),
	(10, 'Invoice Under Value', 1, 'invoice_uv', '2022-08-04 07:41:33', '0'),
	(11, 'COO', 1, 'coo', '2022-08-04 07:57:09', '0'),
	(12, 'Health Certificate / Certificate of Free Sale', 1, 'health_cert', '2022-08-04 07:57:37', '0'),
	(13, 'Material Safety Data Sheet', 1, 'material_safety', '2022-08-04 07:57:38', '0'),
	(14, 'COA', 1, 'coa', '2022-08-04 07:57:38', '0'),
	(15, 'Product Spesification', 1, 'prod_spec', '2022-08-04 07:57:38', '0'),
	(16, 'Surat Pernyataan Produk', 1, 'spp', '2022-08-04 07:57:38', '0'),
	(17, 'Others', 1, 'others', '2022-08-04 07:57:38', '0'),
	(18, 'Ketentuan Export Dokumen', 1, 'ket_exp_doc', '2022-08-04 07:57:38', '0'),
	(19, 'Ketentuan Export Dokumen Approve', 3, 'ket_exp_doc_apprv', '2022-08-04 07:57:38', '0'),
	(20, 'FOC Approval', 3, 'foc_approval', '2022-08-04 07:57:38', '0'),
	(21, 'POSM Availability', 3, 'posm', '2022-08-04 07:57:38', '0'),
	(22, 'Finish Good Ready Date', 3, 'finish_good', '2022-08-04 07:57:38', '0'),
	(23, 'Vessel Schedule', 3, 'vessel_schedule', '2022-08-04 07:57:38', '0'),
	(24, 'Balance Payment', 2, 'balance_payment', '2022-08-04 07:57:38', '0'),
	(25, 'Vessel Booking Confirmation', 3, 'vessel_confirm', '2022-08-04 07:57:38', '0'),
	(26, 'Stuffing', 1, 'stuffing', '2022-08-04 07:57:38', '0'),
	(27, 'Draft BL Sent', 3, 'draft_sent', '2022-08-04 07:57:38', '0'),
	(28, 'Draft BL Approved', 3, 'draft_approved', '2022-08-04 07:57:38', '0'),
	(29, 'Telex Release', 3, 'telex', '2022-08-04 07:57:39', '0'),
	(30, 'Original Document Sent', 3, 'ori_doc_sent', '2022-08-04 07:57:39', '0'),
	(31, 'TOP Payment Balancing', 3, 'top_payment', '2022-08-04 07:57:39', '0'),
	(32, 'Estimation Time of Departure [ETD]', 3, 'etd', '2022-08-04 07:57:39', '0'),
	(33, 'Estimation Time of Arrival [ETA]', 3, 'eta', '2022-08-04 07:57:39', '0');

-- Dumping structure for table gpd_gexp.master_pi_item_opt
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

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
