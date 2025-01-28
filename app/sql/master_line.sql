-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for lsr
CREATE DATABASE IF NOT EXISTS `lsr` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `lsr`;

-- Dumping structure for table lsr.master_line
CREATE TABLE IF NOT EXISTS `master_line` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_line` varchar(50) NOT NULL,
  `line_code` varchar(3) NOT NULL,
  `cost_center` varchar(6) NOT NULL,
  `material` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lsr.master_line: ~15 rows (approximately)
DELETE FROM `master_line`;
/*!40000 ALTER TABLE `master_line` DISABLE KEYS */;
INSERT INTO `master_line` (`id`, `nama_line`, `line_code`, `cost_center`, `material`) VALUES
	(1, 'Main Line', 'KML', 'AQK200', 'Assembly'),
	(2, 'Sub Line', 'KSL', 'AQK100', 'Assembly'),
	(3, 'Crankshaft', 'MCR', 'AQM300', 'Crankshaft'),
	(4, 'Cylinder Block', 'MCB', 'AQM100', 'Cylinder Block'),
	(5, 'Cylinder Head', 'MCH', 'AQM200', 'Cylinder Head'),
	(6, 'Camshaft', 'MCA', 'AQM400', 'Camshaft'),
	(7, 'Die Casting', 'CDC', 'AQC100', 'Die Casting'),
	(8, 'Quality', 'QC', 'AWM400', 'Assembly'),
	(9, 'Logistic Operational', 'LOG', 'AQN200', 'Assembly'),
	(10, 'Maintenance', 'MT', 'AWM100', 'Assembly'),
	(11, 'Engser', 'ES', 'AWM200', 'Assembly'),
	(12, 'Technical Support', 'TS', 'ADN604', 'Assembly'),
	(13, 'Engser Casting', 'ESC', 'AWC200', 'Die Casting'),
	(14, 'Maintenance Casting', 'MDC', 'AWC100', 'Die Casting'),
	(15, 'CCR & Ordering', 'CCR', 'ADA403', 'Assembly'),
	(16, 'Low Pressure', 'LP', 'AQC200', 'Cylinder Head');
/*!40000 ALTER TABLE `master_line` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
