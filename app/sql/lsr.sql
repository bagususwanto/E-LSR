-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 11:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsr`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_lsr`
--

CREATE TABLE `data_lsr` (
  `id` int(11) NOT NULL,
  `part_number` varchar(14) NOT NULL,
  `part_name` varchar(50) NOT NULL,
  `uniqe_no` varchar(4) NOT NULL,
  `qty` int(10) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `condition` varchar(50) NOT NULL,
  `repair` varchar(50) NOT NULL,
  `source_type` int(1) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `material` varchar(15) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `line_lsr` varchar(20) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `user_lsr` varchar(20) NOT NULL,
  `line_code` varchar(3) NOT NULL,
  `cost_center` varchar(6) NOT NULL,
  `status_lsr` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='tabel data material';

--
-- Dumping data for table `data_lsr`
--

INSERT INTO `data_lsr` (`id`, `part_number`, `part_name`, `uniqe_no`, `qty`, `reason`, `condition`, `repair`, `source_type`, `remarks`, `material`, `tanggal`, `waktu`, `line_lsr`, `shift`, `user_lsr`, `line_code`, `cost_center`, `status_lsr`, `price`, `total_price`) VALUES
(3, '13512-0Y050-00', 'CAMSHAFT NO. 2', 'D011', 3, 'P', 'P', 'P', 1, 'tes2', 'Camshaft', '2024-01-10', '11:03:00', 'Camshaft', 'Red', 'sujarwo.ca', 'MCA', 'AQM400', '1', 0.00, 0.00),
(8, '13511-0Y050-00', 'CAMSHAFT NO. 1', 'D010', 3, 'D', '1', '1', 1, 'dfgdfgh', 'Camshaft', '2024-01-13', '21:31:00', 'Camshaft', 'Red', 'Camshaft', 'MCA', 'AQM400', '1', 0.00, 0.00),
(16, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 12, 'G', '1', '0', 1, 'gfhghfdh', 'Die Casting', '2024-01-16', '17:37:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'approved', 0.00, 0.00),
(28, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 2, 'Z', '-', '0', 1, 'dfdf', 'Die Casting', '2024-01-19', '03:43:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'approved', 0.00, 0.00),
(29, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 12, 'B', '-', '0', 1, 'sdfsf', 'Die Casting', '2024-01-19', '03:48:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'approved', 0.00, 0.00),
(30, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 34, 'Z', '-', '0', 1, 'dfdf', 'Die Casting', '2024-01-19', '03:52:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'approved', 0.00, 0.00),
(33, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 12, 'B. Wrong ( Shortage )', '- Unknow', '0. Unrepairable', 1, 'rgdgfg', 'Die Casting', '2024-01-20', '00:41:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(34, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 12, 'A. Shortage / Missing', '- Unknow', '0. Unrepairable', 1, 'sdfsdfsdf', 'Die Casting', '2024-01-20', '00:42:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(38, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 24, 'A. Shortage / Missing', '- Unknow', '0. Unrepairable', 1, 'dfghfdgf', 'Die Casting', '2024-01-20', '22:39:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(39, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 12, 'G. Rusted', '2. Damage', '1. Plant Repair', 1, 'yyyu', 'Die Casting', '2024-01-20', '23:26:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(40, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 12, 'F. Damage Handling', '2. Damage', '0. Unrepairable', 1, 'hrhrh', 'Die Casting', '2024-01-20', '23:28:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(43, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 12, 'E. Wrong ( Surplus )', '3. From TMMIN Unpacking', '6. Unrepairable caused by other parts', 1, 'yyy', 'Die Casting', '2024-01-21', '00:37:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'approved', 0.00, 0.00),
(44, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 24, 'C. Surplus', '2. Damage', '6. Unrepairable caused by other parts', 1, 'sfsfs', 'Die Casting', '2024-01-21', '16:20:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'approved', 0.00, 0.00),
(45, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 24, 'F. Damage Handling', '1. Good', '1. Plant Repair', 1, 'hhh', 'Die Casting', '2024-01-21', '19:22:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'approved', 0.00, 0.00),
(46, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 3, 'C. Surplus', '1. Good', '0. Unrepairable', 1, 'xvffsddf', 'Die Casting', '2024-01-22', '15:41:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(47, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 2, 'D. Damage Origin', '1. Good', '0. Unrepairable', 1, 'dfgfgdf', 'Die Casting', '2024-01-22', '15:41:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(48, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 4, 'C. Surplus', '1. Good', '0. Unrepairable', 1, 'dfgdf', 'Die Casting', '2024-01-22', '15:42:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(49, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 45, 'B. Wrong ( Shortage )', '1. Good', '1. Plant Repair', 1, 'fbgnhn', 'Die Casting', '2024-01-22', '15:44:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(50, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 3, 'B. Wrong ( Shortage )', '- Unknow', '1. Plant Repair', 1, 'dsfgsdgsd', 'Die Casting', '2024-01-22', '15:44:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(51, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 4, 'H. Dented', '- Unknow', '1. Plant Repair', 1, 'asdsad', 'Die Casting', '2024-01-22', '15:48:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(52, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 0, 'A. Shortage / Missing', '1. Good', '0. Unrepairable', 1, 'dfdsfgd', 'Die Casting', '2024-01-22', '15:48:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(53, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 23, 'A. Shortage / Missing', '1. Good', '0. Unrepairable', 1, 'dfdsfgd', 'Die Casting', '2024-01-22', '15:48:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(54, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 12, 'A. Shortage / Missing', '1. Good', '1. Plant Repair', 1, 'fsf', 'Die Casting', '2024-01-22', '15:48:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(55, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 3, 'A. Shortage / Missing', '1. Good', '1. Plant Repair', 1, 'rgreg', 'Die Casting', '2024-01-22', '15:49:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(56, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 23, 'F. Damage Handling', '1. Good', '0. Unrepairable', 1, 'dfgfdg', 'Die Casting', '2024-01-22', '15:53:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(57, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 23, 'B. Wrong ( Shortage )', '1. Good', '1. Plant Repair', 1, 'dffdf', 'Die Casting', '2024-01-22', '15:54:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(58, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 12, 'G. Rusted', '- Unknow', '0. Unrepairable', 1, 'dxvffdsf', 'Die Casting', '2024-01-22', '15:56:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(59, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 12, 'A. Shortage / Missing', '1. Good', '0. Unrepairable', 1, 'dfsdf', 'Die Casting', '2024-01-22', '16:02:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(60, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 12, 'Z. Other', '- Unknow', '1. Plant Repair', 1, 'dsfsdf', 'Die Casting', '2024-01-22', '16:03:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(61, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 12, 'Z. Other', '- Unknow', '1. Plant Repair', 1, 'sdfdsfs', 'Die Casting', '2024-01-22', '16:04:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(62, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 12, 'I. Wet', '- Unknow', '0. Unrepairable', 1, 'sdfsdf', 'Die Casting', '2024-01-22', '16:05:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(63, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 12, 'H. Dented', '- Unknow', '0. Unrepairable', 1, 'dsfds', 'Die Casting', '2024-01-22', '16:14:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(64, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 2, 'D. Damage Origin', '2. Damage', '6. Unrepairable caused by other parts', 1, 'dsg', 'Die Casting', '2024-01-22', '16:14:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(65, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 34, 'B. Wrong ( Shortage )', '1. Good', '1. Plant Repair', 1, 'nmbmnm', 'Die Casting', '2024-01-22', '16:14:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(66, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 12, 'G. Rusted', '1. Good', '0. Unrepairable', 1, 'sdsds', 'Die Casting', '2024-01-22', '17:05:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(67, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 1, 'B. Wrong ( Shortage )', '1. Good', '1. Plant Repair', 1, 'eerr', 'Die Casting', '2024-01-22', '17:06:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(68, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 11, 'A. Shortage / Missing', '1. Good', '1. Plant Repair', 1, 'SDFSD', 'Die Casting', '2024-01-22', '17:21:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(69, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 12, 'B. Wrong ( Shortage )', '2. Damage', '1. Plant Repair', 1, 'sxdsf', 'Die Casting', '2024-01-25', '10:30:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(71, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 23, 'B. Wrong ( Shortage )', '- Unknow', '1. Plant Repair', 1, 'sdfsdfs', 'Die Casting', '2024-01-28', '14:52:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(87, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 23, 'I. Wet', '- Unknow', '0. Unrepairable', 1, 'edsf', 'Die Casting', '2024-01-30', '03:51:00', 'Die Casting', 'Red', 'Die Casting', 'CDC', 'AQC100', 'pending', 0.00, 0.00),
(103, '13511-0Y050-00', 'CAMSHAFT NO. 1', 'D010', 0, '', '', '', 1, '', 'Camshaft', '2024-01-31', '05:22:00', 'Camshaft', 'Red', 'Camshaft', 'MCA', 'AQM400', 'pending', 0.00, 0.00),
(104, '13511-0Y050-00', 'CAMSHAFT NO. 1', 'D010', 0, '', '', '', 1, '', 'Camshaft', '2024-01-31', '05:23:00', 'Camshaft', 'Red', 'Camshaft', 'MCA', 'AQM400', 'pending', 0.00, 0.00),
(105, '13511-0Y050-00', 'CAMSHAFT NO. 1', 'D010', 0, '', '', '', 1, '', 'Camshaft', '2024-01-31', '05:23:00', 'Camshaft', 'Red', 'Camshaft', 'MCA', 'AQM400', 'pending', 0.00, 0.00),
(106, '13511-0Y050-00', 'CAMSHAFT NO. 1', 'D010', 23, 'B. Wrong ( Shortage )', '1. Good', '1. Plant Repair', 1, 'sfsfs', 'Camshaft', '2024-01-31', '18:37:00', 'Camshaft', 'Red', 'Camshaft', 'MCA', 'AQM400', 'pending', 0.00, 0.00),
(107, '13511-0Y050-00', 'CAMSHAFT NO. 1', 'D010', 23, 'B. Wrong ( Shortage )', '1. Good', '1. Plant Repair', 1, 'sfsfs', 'Camshaft', '2024-01-31', '18:37:00', 'Camshaft', 'Red', 'Camshaft', 'MCA', 'AQM400', 'pending', 0.00, 0.00),
(108, '13511-0Y050-00', 'CAMSHAFT NO. 1', 'D010', 12, 'A. Shortage / Missing', '- Unknow', '0. Unrepairable', 1, 'sdsds', 'Camshaft', '2024-01-31', '22:57:00', 'Camshaft', 'Red', 'Camshaft', 'MCA', 'AQM400', 'pending', 0.00, 0.00),
(109, '13502-0Y050-00', 'CAMSHAFT SUB-ASSY. NO.2 (Finish NR EX)', 'CAEX', 22, 'C. Surplus', '1. Good', '0. Unrepairable', 3, 'sdfs', 'Camshaft', '2024-01-31', '22:57:00', 'Camshaft', 'Red', 'Camshaft', 'MCA', 'AQM400', 'pending', 0.00, 0.00),
(110, '13511-0Y050-00', 'CAMSHAFT NO. 1', 'D010', 22, 'B. Wrong ( Shortage )', '1. Good', '0. Unrepairable', 1, 'sddfsf', 'Camshaft', '2024-02-01', '01:00:00', 'Camshaft', 'Red', 'Camshaft', 'MCA', 'AQM400', 'pending', 300000.00, 0.00),
(111, '13511-0Y050-00', 'CAMSHAFT NO. 1', 'D010', 23, 'C. Surplus', '2. Damage', '1. Plant Repair', 1, 'sfsf', 'Camshaft', '2024-02-01', '01:07:00', 'Camshaft', 'Red', 'Camshaft', 'MCA', 'AQM400', 'pending', 300000.00, 6900000.00);

-- --------------------------------------------------------

--
-- Table structure for table `master_line`
--

CREATE TABLE `master_line` (
  `id` int(11) NOT NULL,
  `nama_line` varchar(50) NOT NULL,
  `line_code` varchar(3) NOT NULL,
  `cost_center` varchar(6) NOT NULL,
  `material` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_line`
--

INSERT INTO `master_line` (`id`, `nama_line`, `line_code`, `cost_center`, `material`) VALUES
(1, 'Main Line', 'KML', 'AQK200', 'Assembly'),
(2, 'Sub Line', 'KSL', 'AQK100', 'Assembly'),
(3, 'Crankshaft', 'MCR', 'AQM400', 'Crankshaft'),
(4, 'Cylinder Block', 'MCB', 'AQM100', 'Cylilnder Block'),
(5, 'Cylinder Head', 'MCH', 'AQM200', 'Cylinder Head'),
(6, 'Camshaft', 'MCA', 'AQM400', 'Camshaft'),
(7, 'Die Casting', 'CDC', 'AQC100', 'Die Casting'),
(8, 'Quality', 'QC', 'AWM300', 'Assembly'),
(9, 'Logistic Operational', 'LOG', 'AQN200', 'Assembly'),
(10, 'Maintenance', 'MT', 'AWM300', 'Assembly'),
(11, 'Engser', 'ES', 'AWM200', 'Assembly'),
(12, 'Technical Support', 'TS', 'ADA403', 'Assembly'),
(13, 'Engser Casting', 'ESC', 'AWC200', 'Die Casting'),
(14, 'Maintenance DC', 'MDC', 'AWM100', 'Die Casting');

-- --------------------------------------------------------

--
-- Table structure for table `master_material`
--

CREATE TABLE `master_material` (
  `id` int(11) NOT NULL,
  `part_number` varchar(14) NOT NULL,
  `part_name` varchar(50) NOT NULL,
  `uniqe_no` varchar(4) NOT NULL,
  `unit_usage` int(3) NOT NULL,
  `source_type` int(1) NOT NULL,
  `material` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_material`
--

INSERT INTO `master_material` (`id`, `part_number`, `part_name`, `uniqe_no`, `unit_usage`, `source_type`, `material`, `price`) VALUES
(1, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 4, 1, 'DC', 35740.00),
(2, '11411-0Y060-00', 'BLOCK, CYLINDER (Finish Casting NR)', 'CBDC', 1, 3, 'DC', 788787.00),
(3, '11411-BZ180-00', 'BLOCK, CYLINDER (Finish Casting NH)', 'CBNH', 1, 3, 'DC', 142960.00),
(4, '90280-04001-00', 'KEY,WOOD RUFF', 'T003', 1, 2, 'CRANKSHAFT', 4634.00),
(5, '13401-0Y180-00', 'CRANKSHAFT SUB-ASSY,1NR', 'CR1', 1, 3, 'CRANKSHAFT', 345404.00),
(6, '13401-0Y140-00', 'CRANKSHAFT SUB-ASSY,2NR', 'CR2', 1, 3, 'CRANKSHAFT', 426439.00),
(7, '90331-T0014-00', 'PLUG, TIGHT', 'S002', 1, 4, 'CYLINDER BLOCK', 748.00),
(8, '11401-0Y060-00', 'BLOCK SUB-ASSY, CYLINDER (Finish NR)', 'CBNR', 1, 3, 'CYLINDER BLOCK', 907787.00),
(9, '11401-BZ220-00', 'BLOCK SUB-ASSY, CYLINDER (Finish HV)', 'CBHV', 1, 3, 'CYLINDER BLOCK', 261960.00),
(10, '11101-0Y210-00', 'HEAD SUB-ASSY, CYLINDER (Finish Ethanol)', 'CHE', 1, 3, 'CYLINDER HEAD', 611644.00),
(11, '11101-BZ250-00', 'HEAD SUB-ASSY, CYLINDER (Finish Hybrid)', 'CHEV', 1, 3, 'CYLINDER HEAD', 65749.00),
(12, '23814-0Y010-00', 'PIPE, FUEL DELIVERY', 'S111', 1, 4, 'ASSEMBLY', 124726.00),
(13, '90105-T0211-00', 'BOLT, FLANGE', 'S112', 2, 4, 'ASSEMBLY', 2244.00),
(14, '90250-T0007-00', 'PIN, STRAIGHT', 'S113', 3, 4, 'ASSEMBLY', 448.00),
(15, '90250-T0018-00', 'PIN, STRAIGHT', 'S114', 2, 4, 'ASSEMBLY', 597.00),
(16, '90250-T0019-00', 'PIN, STRAIGHT', 'S115', 1, 4, 'ASSEMBLY', 1645.00),
(17, '90466-T0015-00', 'CLIP, HOSE', 'S116', 4, 4, 'ASSEMBLY', 1047.00),
(18, '90466-T0050-00', 'CLIP, HOSE', 'S117', 2, 4, 'ASSEMBLY', 1645.00),
(19, '90501-T0045-00', 'SPRING, COMPRESSION', 'S118', 16, 4, 'ASSEMBLY', 3889.00),
(20, '90915-TA001-00', 'FILTER, OIL', 'S119', 1, 4, 'ASSEMBLY', 27218.00),
(21, '90126-T0012-00', 'STUD, HEXALOBULAR', 'S122', 2, 4, 'ASSEMBLY', 448.00),
(22, '90126-T0019-00', 'STUD, HEXALOBULAR', 'S123', 2, 4, 'ASSEMBLY', 1496.00),
(23, '90178-T0053-00', 'NUT, FLANGE', 'S124', 2, 4, 'ASSEMBLY', 240.00),
(24, '15330-0Y050-00', 'VALVE ASSY, CAM TIMING OIL CONTROL', 'V100', 1, 4, 'ASSEMBLY', 127866.00),
(25, '15330-0Y060-00', 'VALVE ASSY, CAM TIMING OIL CONTROL', 'V101', 1, 4, 'ASSEMBLY', 127866.00),
(26, '16031-0Y010-00', 'INLET SUB-ASSY, WATER W/THERMOSTAT', 'U100', 1, 4, 'ASSEMBLY', 89582.00),
(27, '90919-T5001-00', 'SENSOR, CRANK POSITION', 'U101', 1, 4, 'ASSEMBLY', 46659.00),
(28, '90919-T5002-00', 'SENSOR, CRANK POSITION', 'U102', 2, 4, 'ASSEMBLY', 42472.00),
(29, '13711-47050-00', 'VALVE, INTAKE', 'T101', 8, 2, 'ASSEMBLY', 25859.00),
(30, '13715-47050-00', 'VALVE, EXHAUST', 'T102', 8, 2, 'ASSEMBLY', 25112.00),
(31, '16581-47020-00', 'CLAMP, HOSE', 'T103', 1, 2, 'ASSEMBLY', 2980.00),
(32, '23891-47040-00', 'SPACER, FUEL DELIVERY, NO.1', 'T104', 2, 2, 'ASSEMBLY', 7748.00),
(33, '32111-52110-00', 'PLATE, PUMP IMPELLER DRIVE              ', 'T105', 1, 2, 'ASSEMBLY', 183866.00),
(34, '32116-12030-00', 'SPACER, DRIVE PLATE, FR                 ', 'T107', 1, 2, 'ASSEMBLY', 23618.00),
(35, '32117-12040-00', 'SPACER, DRIVE PLATE, RR                 ', 'T108', 1, 2, 'ASSEMBLY', 39612.00),
(36, '82715-12P80-00', 'BRACKET, WIRING HARNESS CLAMP           ', 'T109', 1, 2, 'ASSEMBLY', 3737.00),
(37, '82715-5C360-00', 'BRACKET, WIRING HARNESS CLAMP           ', 'T110', 1, 2, 'ASSEMBLY', 26607.00),
(38, '83530-60020-00', 'SWITCH ASSY, OIL PRESSURE               ', 'T112', 1, 2, 'ASSEMBLY', 44395.00),
(39, '89422-33030-00', 'SENSOR, WATER TEMPERATURE               ', 'T113', 1, 2, 'ASSEMBLY', 37520.00),
(40, '89467-30050-00', 'SENSOR, AIR FUEL RATIO                  ', 'T114', 1, 2, 'ASSEMBLY', 607324.00),
(41, '89615-20090-00', 'SENSOR, KNOCK CONTROL                   ', 'T115', 1, 2, 'ASSEMBLY', 54710.00),
(42, '90105-10095-00', 'BOLT, WASHER BASED HEAD HEXAGON         ', 'T116', 8, 2, 'ASSEMBLY', 4036.00),
(43, '90126-08063-00', 'STUD, HEXALOBULAR', 'T118', 5, 2, 'ASSEMBLY', 1794.00),
(44, '90179-08101-00', 'NUT', 'T119', 6, 2, 'ASSEMBLY', 3588.00),
(45, '90177-08003-00', 'NUT LOCK', 'T137', 6, 2, 'ASSEMBLY', 1345.00),
(46, '90201-06047-00', 'WASHER, PLATE', 'T120', 2, 2, 'ASSEMBLY', 1943.00),
(47, '90201-10344-00', 'WASHER, PLATE', 'T121', 10, 2, 'ASSEMBLY', 1943.00),
(48, '90250-04097-00', 'PIN, STRAIGHT', 'T122', 2, 2, 'ASSEMBLY', 597.00),
(49, '90253-11004-00', 'PIN, RING', 'T123', 2, 2, 'ASSEMBLY', 1345.00),
(50, '90253-12002-00', 'PIN, RING', 'T124', 2, 2, 'ASSEMBLY', 1345.00),
(51, '90253-13017-00', 'PIN, RING', 'T125', 2, 2, 'ASSEMBLY', 1496.00),
(52, '90344-53008-00', 'PLUG, TAPER SCREW', 'T126', 1, 2, 'ASSEMBLY', 2989.00),
(53, '90430-12221-00', 'GASKET                                  ', 'T127', 1, 2, 'ASSEMBLY', 1496.00),
(54, '90913-01029-00', 'BOLT, FLYWHEEL', 'T128', 8, 2, 'ASSEMBLY', 4036.00),
(55, '90913-03028-00', 'LOCK, VALVE SPRING RETAINER', 'T129', 32, 2, 'ASSEMBLY', 299.00),
(56, '90919-01275-00', 'PLUG, SPARK', 'T130', 4, 2, 'ASSEMBLY', 97009.00),
(57, '90919-01290-00', 'PLUG, SPARK', 'T131', 4, 2, 'ASSEMBLY', 9117.00),
(58, '90119-08D36-00', 'BOLT, W/WASHER', 'T134', 1, 2, 'ASSEMBLY', 4185.00),
(59, '89467-52250-00', 'SENSOR, AIR FUEL RATIO                  ', 'T135', 1, 2, 'ASSEMBLY', 126009.00),
(60, '90110-06040-00', 'BOLT, HEXAGON SOCKET HEAD CAP           ', 'T136', 4, 2, 'ASSEMBLY', 10464.00),
(61, '11791-B0010-00', 'WASHER, CRANKSHAFT THRUST, UPR', 'T400', 2, 2, 'ASSEMBLY', 21754.00),
(62, '90105-06345-00', 'BOLT, FLANGE', 'T401', 1, 2, 'ASSEMBLY', 1196.00),
(63, '161A0-B0010-00', 'PUMP ASSY, ELECTRIC WATER', 'T500', 1, 2, 'ASSEMBLY', 1886400.00),
(64, '16340-B0020-00', 'THERMOSTAT ASSY, W/GASKET', 'T501', 1, 2, 'ASSEMBLY', 100150.00),
(65, '89422-B2030-00', 'SENSOR, WATER TEMPERATURE', 'T502', 1, 2, 'ASSEMBLY', 368611.00),
(66, '90105-08373-00', 'BOLT, FLANGE', 'T503', 4, 2, 'ASSEMBLY', 2691.00),
(67, '90919-01289-00', 'PLUG, SPARK', 'T504', 4, 2, 'ASSEMBLY', 44992.00),
(68, '91551-10818-00', 'BOLT, FLANGE', 'T505', 6, 2, 'ASSEMBLY', 1345.00),
(69, '91551-80620-00', 'BOLT, FLANGE', 'T506', 2, 2, 'ASSEMBLY', 448.00),
(70, '91551-80828-00', 'BOLT, FLANGE', 'T507', 2, 2, 'ASSEMBLY', 1196.00),
(71, '91551-80890-00', 'BOLT, FLANGE', 'T508', 1, 2, 'ASSEMBLY', 2691.00),
(72, '91671-80616-00', 'BOLT, FLANGE', 'T509', 1, 2, 'ASSEMBLY', 0.00),
(73, '96136-42501-00', 'CLIP, HOSE', 'T510', 2, 2, 'ASSEMBLY', 3588.00),
(74, '96138-41501-00', 'CLIP, HOSE', 'T511', 2, 2, 'ASSEMBLY', 1639.00),
(75, '16031-0Y030-00', 'INLET SUB-ASSY, WATER W/THERMOSTAT', 'U400', 1, 4, 'ASSEMBLY', 91826.00),
(76, '9004A-11326-00', 'BOLT, FLANGE W/WASHER', 'S401', 0, 4, 'ASSEMBLY', 1047.00),
(77, '15601-BZ030-00', 'ELEMENT SUB-ASSY, OIL FILTER', 'S400', 1, 4, 'ASSEMBLY', 17539.00),
(78, '16271-BZ090-00', 'GASKET, WATER PUMP', 'S500', 1, 4, 'ASSEMBLY', 8225.00),
(79, '16303-BZ030-00', 'HOUSING SUB-ASSY, WATER OUTLET', 'S501', 1, 4, 'ASSEMBLY', 78814.00),
(80, '16303-BZ040-00', 'HOUSING SUB-ASSY, WATER OUTLET', 'S502', 1, 4, 'ASSEMBLY', 75972.00),
(81, '16325-BZ050-00', 'GASKET, WATER INLET HOUSING', 'S503', 1, 4, 'ASSEMBLY', 5981.00),
(82, '82715-BZQ60-00', 'BRACKET, WIRING HARNESS CLAMP', 'S504', 1, 4, 'ASSEMBLY', 3589.00),
(83, '82715-BZR60-00', 'BRACKET, WIRING HARNESS CLAMP', 'S505', 1, 4, 'ASSEMBLY', 4786.00),
(84, '90406-T0009-00', 'TUBE, UNION', 'S506', 1, 4, 'ASSEMBLY', 7778.00),
(85, '90466-T0020-00', 'CLIP, HOSE', 'S507', 2, 4, 'ASSEMBLY', 0.00),
(86, '15301-0Y010-00', 'GAGE SUB-ASSY, OIL LEVEL                ', 'D189', 1, 1, 'ASSEMBLY', 8600.00),
(87, '12315-0Y010-00', 'BRACKET, ENGINE MOUNTING, FR NO.1 LH    ', 'D148', 1, 1, 'ASSEMBLY', 75210.00),
(88, '13405-0Y080-00', 'FLYWHEEL SUB-ASSY                       ', 'D149', 1, 1, 'ASSEMBLY', 204010.00),
(89, '13405-0Y110-00', 'FLYWHEEL SUB-ASSY                       ', 'D150', 1, 1, 'ASSEMBLY', 201620.00),
(90, '82715-0DM60-00', 'BRACKET, WIRING HARNESS CLAMP           ', 'D192', 1, 1, 'ASSEMBLY', 4860.00),
(91, '82715-0DM70-00', 'BRACKET, WIRING HARNESS CLAMP           ', 'D193', 1, 1, 'ASSEMBLY', 1930.00),
(92, '11201-0Y030-00', 'COVER SUB-ASSY, CYLINDER HEAD           ', 'D214', 1, 1, 'ASSEMBLY', 326880.00),
(93, '11310-0Y040-00', 'COVER ASSY, TIMING CHAIN W/WATER PUMP   ', 'D111', 1, 1, 'ASSEMBLY', 519420.00),
(94, '12101-0Y040-00', 'PAN SUB-ASSY, OIL                       ', 'D112', 1, 1, 'ASSEMBLY', 339350.00),
(95, '12101-0Y080-00', 'PAN SUB-ASSY, OIL                       ', 'D113', 1, 1, 'ASSEMBLY', 478340.00),
(96, '17120-0Y051-00', 'MANIFOLD ASSY, INTAKE                   ', 'D226', 1, 1, 'ASSEMBLY', 330920.00),
(97, '17120-0Y061-00', 'MANIFOLD ASSY, INTAKE                   ', 'D227', 1, 1, 'ASSEMBLY', 292350.00),
(98, '31210-0D180-00', 'COVER ASSY, CLUTCH                      ', 'D105', 1, 1, 'ASSEMBLY', 177850.00),
(99, '31210-0D230-00', 'COVER ASSY, CLUTCH                      ', 'D106', 1, 1, 'ASSEMBLY', 162310.00),
(100, '31210-0D240-00', 'COVER ASSY, CLUTCH                      ', 'D107', 1, 1, 'ASSEMBLY', 171760.00),
(101, '31250-0D250-00', 'DISC ASSY, CLUTCH                       ', 'D108', 1, 1, 'ASSEMBLY', 246610.00),
(102, '31250-0D320-00', 'DISC ASSY, CLUTCH                       ', 'D109', 1, 1, 'ASSEMBLY', 220560.00),
(103, '31250-0D330-00', 'DISC ASSY, CLUTCH                       ', 'D110', 1, 1, 'ASSEMBLY', 232430.00),
(104, '13050-0Y020-00', 'GEAR ASSY, CAMSHAFT TIMING              ', 'D152', 1, 1, 'ASSEMBLY', 203070.00),
(105, '13070-0Y020-00', 'GEAR ASSY, CAMSHAFT TIMING EXHAUST, RH  ', 'D153', 1, 1, 'ASSEMBLY', 195720.00),
(106, '90466-T0061-00', 'CLIP, HOSE                              ', 'D161', 1, 1, 'ASSEMBLY', 345.00),
(107, '90466-T0062-00', 'CLIP, HOSE                              ', 'D162', 1, 1, 'ASSEMBLY', 395.00),
(108, '12261-0Y041-00', 'HOSE, VENTILATION, NO.1                 ', 'D221', 1, 1, 'ASSEMBLY', 29210.00),
(109, '16261-0Y030-00', 'HOSE, WATER BY-PASS, NO.1               ', 'D164', 1, 1, 'ASSEMBLY', 4670.00),
(110, '16264-0Y080-00', 'HOSE, WATER BY-PASS, NO.2               ', 'D165', 1, 1, 'ASSEMBLY', 3570.00),
(111, '16267-0Y030-00', 'HOSE, WATER BY-PASS, NO.3               ', 'D166', 1, 1, 'ASSEMBLY', 15470.00),
(112, '13711-0Y020-00', 'VALVE, INTAKE                           ', 'D100', 8, 1, 'ASSEMBLY', 7747.00),
(113, '13715-0Y020-00', 'VALVE, EXHAUST                          ', 'D101', 8, 1, 'ASSEMBLY', 8803.00),
(114, '22030-0Y020-00', 'BODY ASSY, THROTTLE W/MOTOR             ', 'D102', 1, 1, 'ASSEMBLY', 316640.00),
(115, '22030-0Y140-00', 'BODY ASSY, THROTTLE W/MOTOR             ', 'D302', 1, 1, 'ASSEMBLY', 314640.00),
(116, '13470-0Y020-00', 'PULLEY ASSY, CRANKSHAFT                 ', 'D158', 1, 1, 'ASSEMBLY', 95410.00),
(117, '11115-0Y030-00', 'GASKET, CYLINDER HEAD                   ', 'D173', 1, 1, 'ASSEMBLY', 72620.00),
(118, '17173-0Y030-00', 'GASKET, EXHAUST MANIFOLD                ', 'D174', 1, 1, 'ASSEMBLY', 6560.00),
(119, '11445-0Y020-00', 'SPACER, CYLINDER BLOCK WATER JACKET     ', 'D171', 1, 1, 'ASSEMBLY', 23390.00),
(120, '11103-0Y040-00', 'HOUSING SUB-ASSY, CAMSHAFT              ', 'D185', 1, 1, 'ASSEMBLY', 386480.00),
(121, '13716-0C030-00', 'CAP, VALVE STEM                         ', 'D222', 16, 1, 'ASSEMBLY', 1070.00),
(122, '13750-0C040-00', 'ADJUSTER ASSY, VALVE LASH               ', 'D187', 16, 1, 'ASSEMBLY', 7660.00),
(123, '13801-0C030-00', 'ARM SUB-ASSY, VALVE ROCKER              ', 'D188', 16, 1, 'ASSEMBLY', 8690.00),
(124, '82219-0D110-00', 'WIRE, THERMOSENSOR                      ', 'D201', 1, 1, 'ASSEMBLY', 13900.00),
(125, '13741-0Y010-00', 'RETAINER, VALVE SPRING                  ', 'D114', 16, 1, 'ASSEMBLY', 723.00),
(126, '90105-T0051-00', 'BOLT, FLANGE                            ', 'D115', 1, 1, 'ASSEMBLY', 331.00),
(127, '90105-T0052-00', 'BOLT, WASHER BASED HEAD HEXAGON         ', 'D116', 10, 1, 'ASSEMBLY', 403.00),
(128, '90105-T0085-00', 'BOLT, FLANGE                            ', 'D117', 2, 1, 'ASSEMBLY', 453.00),
(129, '90105-T0125-00', 'BOLT, FLANGE                            ', 'D118', 2, 1, 'ASSEMBLY', 1481.00),
(130, '90105-T0126-00', 'BOLT, FLANGE                            ', 'D119', 2, 1, 'ASSEMBLY', 986.00),
(131, '90105-T0130-00', 'BOLT, FLANGE                            ', 'D120', 7, 1, 'ASSEMBLY', 889.00),
(132, '90105-T0156-00', 'BOLT, FLANGE                            ', 'D121', 1, 1, 'ASSEMBLY', 862.00),
(133, '90105-T0247-00', 'BOLT, FLANGE                            ', 'D122', 8, 1, 'ASSEMBLY', 790.00),
(134, '90105-T0269-00', 'BOLT, FLANGE                            ', 'D123', 12, 1, 'ASSEMBLY', 759.00),
(135, '90105-T0270-00', 'BOLT, FLANGE                            ', 'D124', 5, 1, 'ASSEMBLY', 1654.00),
(136, '90105-T0271-00', 'BOLT, FLANGE                            ', 'D125', 17, 1, 'ASSEMBLY', 1874.00),
(137, '90105-T0272-00', 'BOLT, FLANGE                            ', 'D126', 3, 1, 'ASSEMBLY', 1503.00),
(138, '90105-T0283-00', 'BOLT, FLANGE                            ', 'D128', 1, 1, 'ASSEMBLY', 461.00),
(139, '90105-T0347-00', 'BOLT, FLANGE                            ', 'D127', 5, 1, 'ASSEMBLY', 889.00),
(140, '90109-T0055-00', 'BOLT                                    ', 'D218', 14, 1, 'ASSEMBLY', 823.00),
(141, '90110-T0002-00', 'BOLT, HEXAGON SOCKET HEAD CAP           ', 'D129', 4, 1, 'ASSEMBLY', 491.00),
(142, '90119-T0102-00', 'BOLT, W/WASHER                          ', 'D130', 6, 1, 'ASSEMBLY', 481.00),
(143, '90119-T0136-00', 'BOLT, W/WASHER                          ', 'D131', 7, 1, 'ASSEMBLY', 495.00),
(144, '90119-T0219-00', 'BOLT, W/WASHER                          ', 'D132', 4, 1, 'ASSEMBLY', 1230.00),
(145, '90119-T0237-00', 'BOLT, W/WASHER                          ', 'D133', 1, 1, 'ASSEMBLY', 862.00),
(146, '90119-T0240-00', 'BOLT, W/WASHER                          ', 'D134', 4, 1, 'ASSEMBLY', 456.00),
(147, '90119-T0260-00', 'BOLT, W/WASHER                          ', 'D135', 7, 1, 'ASSEMBLY', 508.00),
(148, '90119-T0342-00', 'BOLT, W/WASHER                          ', 'D136', 6, 1, 'ASSEMBLY', 1023.00),
(149, '90178-T0019-00', 'NUT, FLANGE                             ', 'D139', 2, 1, 'ASSEMBLY', 364.00),
(150, '90910-T2012-00', 'BOLT                                    ', 'D141', 10, 1, 'ASSEMBLY', 5095.00),
(151, '23209-0Y030-00', 'INJECTOR SET, FUEL                      ', 'D190', 4, 1, 'ASSEMBLY', 62720.00),
(152, '23209-0Y071-00', 'INJECTOR SET, FUEL                      ', 'D225', 4, 1, 'ASSEMBLY', 65200.00),
(153, '23209-0Y120-00', 'INJECTOR SET, FUEL                      ', 'D223', 4, 1, 'ASSEMBLY', 65070.00),
(154, '13201-0Y070-00', 'ROD SUB-ASSY, CONNECTING                ', 'D216', 4, 1, 'ASSEMBLY', 73660.00),
(155, '13201-0Y080-00', 'ROD SUB-ASSY, CONNECTING                ', 'D217', 4, 1, 'ASSEMBLY', 78280.00),
(156, '11791-0Y040-00', 'WASHER, CRANKSHAFT THRUST, UPR          ', 'D151', 2, 1, 'ASSEMBLY', 3490.00),
(157, '11159-0Y020-00', 'GASKET, CAMSHAFT BEARING CAP OIL HOLE   ', 'D175', 2, 1, 'ASSEMBLY', 2850.00),
(158, '16258-0Y010-00', 'GASKET                                  ', 'D176', 1, 1, 'ASSEMBLY', 1160.00),
(159, '23291-0Y020-00', 'INSULATOR, INJECTOR VIBRATION           ', 'D177', 4, 1, 'ASSEMBLY', 1020.00),
(160, '90301-T0055-00', 'RING, O                                 ', 'D178', 1, 1, 'ASSEMBLY', 730.00),
(161, '90301-T0057-00', 'RING, O                                 ', 'D179', 1, 1, 'ASSEMBLY', 970.00),
(162, '90301-T0059-00', 'RING, O                                 ', 'D180', 1, 1, 'ASSEMBLY', 1180.00),
(163, '90311-T0074-00', 'SEAL, TYPE T OIL                        ', 'D181', 1, 1, 'ASSEMBLY', 23890.00),
(164, '90311-T0076-00', 'SEAL, TYPE T OIL                        ', 'D182', 1, 1, 'ASSEMBLY', 9300.00),
(165, '90913-T2004-00', 'SEAL, VALVE STEM OIL                    ', 'D183', 8, 1, 'ASSEMBLY', 1720.00),
(166, '90913-T2005-00', 'SEAL, VALVE STEM OIL                    ', 'D184', 8, 1, 'ASSEMBLY', 1720.00),
(167, '15708-0Y040-00', 'NOZZLE SUB-ASSY, OIL                    ', 'D167', 4, 1, 'ASSEMBLY', 5660.00),
(168, '13211-0Y011-00', 'PISTON                                  ', 'D145', 4, 1, 'ASSEMBLY', 53220.00),
(169, '13211-0Y061-00', 'PISTON                                  ', 'D146', 4, 1, 'ASSEMBLY', 51195.00),
(170, '13251-0Y030-00', 'PIN, PISTON                             ', 'D147', 4, 1, 'ASSEMBLY', 9455.00),
(171, '90919-T2011-00', 'COIL, IGNITION                          ', 'D156', 4, 1, 'ASSEMBLY', 92038.00),
(172, '13521-0Y040-00', 'SPROCKET, CRANKSHAFT TIMING             ', 'D202', 1, 1, 'ASSEMBLY', 10432.00),
(173, '12121-0Y030-00', 'PLATE, OIL PAN BAFFLE                   ', 'D194', 1, 1, 'ASSEMBLY', 15290.00),
(174, '12122-0Y010-00', 'PLATE, OIL PAN BAFFLE, NO.2             ', 'D195', 1, 1, 'ASSEMBLY', 1360.00),
(175, '12281-0Y010-00', 'HANGER, ENGINE                          ', 'D196', 1, 1, 'ASSEMBLY', 53540.00),
(176, '12282-0Y050-00', 'HANGER, ENGINE, NO.2                    ', 'D198', 1, 1, 'ASSEMBLY', 22380.00),
(177, '17118-0Y031-00', 'STAY, MANIFOLD                          ', 'D219', 1, 1, 'ASSEMBLY', 9050.00),
(178, '12121-0Y090-00', 'PLATE, OIL PAN BAFFLE', 'D224', 1, 1, 'ASSEMBLY', 9362.00),
(179, '13011-0Y030-00', 'RING SET, PISTON                        ', 'D215', 1, 1, 'ASSEMBLY', 79670.00),
(180, '11191-0Y010-00', 'TUBE, SPARK PLUG                        ', 'D157', 4, 1, 'ASSEMBLY', 6080.00),
(181, '90105-T0273-00', 'BOLT, FLANGE                            ', 'D168', 2, 1, 'ASSEMBLY', 1360.00),
(182, '90119-T0444-00', 'BOLT, W/WASHER                          ', 'D220', 1, 1, 'ASSEMBLY', 9470.00),
(183, '90469-T0014-00', 'CLAMP                                   ', 'D172', 1, 1, 'ASSEMBLY', 520.00),
(184, '25051-0Y050-00', 'CONVERTER SUB-ASSY, EXHAUST MANIFOLD    ', 'D159', 1, 1, 'ASSEMBLY', 3074630.00),
(185, '25051-0Y060-00', 'CONVERTER SUB-ASSY, EXHAUST MANIFOLD    ', 'D160', 1, 1, 'ASSEMBLY', 3539580.00),
(186, '11452-0Y020-00', 'GUIDE, OIL LEVEL GAGE                   ', 'D170', 1, 1, 'ASSEMBLY', 13020.00),
(187, '17167-0Y020-00', 'INSULATOR, EXHAUST MANIFOLD HEAT        ', 'D154', 1, 1, 'ASSEMBLY', 14525.00),
(188, '17168-0Y020-00', 'INSULATOR, EXHAUST MANIFOLD HEAT, NO.2  ', 'D155', 1, 1, 'ASSEMBLY', 14995.00),
(189, '90210-T0002-00', 'WASHER, SEAL                            ', 'D142', 2, 1, 'ASSEMBLY', 1620.00),
(190, '90301-T0060-00', 'RING, O                                 ', 'D143', 1, 1, 'ASSEMBLY', 200.00),
(191, '90430-T0023-00', 'GASKET                                  ', 'D144', 1, 1, 'ASSEMBLY', 2220.00),
(192, '11711-0Y020-02', 'BEARING CRANKSHAFT', 'D203', 5, 1, 'ASSEMBLY', 0.00),
(193, '11711-0Y020-03', 'BEARING CRANKSHAFT', 'D204', 5, 1, 'ASSEMBLY', 0.00),
(194, '11711-0Y020-04', 'BEARING CRANKSHAFT', 'D205', 5, 1, 'ASSEMBLY', 0.00),
(195, '11711-0Y020-05', 'BEARING CRANKSHAFT', 'D206', 5, 1, 'ASSEMBLY', 0.00),
(196, '11721-0Y050-02', 'BEARING CRANKSHAFT NO.2', 'D207', 5, 1, 'ASSEMBLY', 0.00),
(197, '11721-0Y050-03', 'BEARING CRANKSHAFT NO.3', 'D208', 5, 1, 'ASSEMBLY', 0.00),
(198, '11721-0Y050-04', 'BEARING CRANKSHAFT NO.4', 'D209', 5, 1, 'ASSEMBLY', 0.00),
(199, '11721-0Y050-05', 'BEARING CRANKSHAFT NO.5', 'D210', 5, 1, 'ASSEMBLY', 0.00),
(200, '13281-0Y020-01', 'BEARING CONNECTING ROD', 'D211', 8, 1, 'ASSEMBLY', 0.00),
(201, '13281-0Y020-02', 'BEARING CONNECTING ROD', 'D212', 8, 1, 'ASSEMBLY', 0.00),
(202, '13281-0Y020-03', 'BEARING CONNECTING ROD', 'D213', 8, 1, 'ASSEMBLY', 0.00),
(203, '16268-0Y180-00', 'PIPE, WATER BY-PASS', 'D300', 1, 1, 'ASSEMBLY', 22455.00),
(204, '16268-0Y190-00', 'PIPE, WATER BY-PASS', 'D301', 1, 1, 'ASSEMBLY', 26245.00),
(205, '17120-BZ130-00', 'MANIFOLD ASSY, INTAKE                   ', 'D400', 1, 1, 'ASSEMBLY', 305200.00),
(206, '31210-BZ270-00', 'COVER ASSY, CLUTCH                      ', 'D401', 1, 1, 'ASSEMBLY', 131990.00),
(207, '31250-BZ320-00', 'DISC ASSY, CLUTCH                       ', 'D402', 1, 1, 'ASSEMBLY', 233150.00),
(208, '11310-BZ200-00', 'COVER ASSY, TIMING CHAIN W/WATER PUMP   ', 'D403', 1, 1, 'ASSEMBLY', 621870.00),
(209, '12101-BZ140-00', 'PAN SUB-ASSY, OIL                       ', 'D404', 1, 1, 'ASSEMBLY', 354110.00),
(210, '9004A-11240-00', 'BOLT, FLANGE W/WASHER', 'D405', 1, 1, 'ASSEMBLY', 348.00),
(211, '16267-BZ180-00', 'HOSE, WATER BY-PASS, NO.3               ', 'D406', 1, 1, 'ASSEMBLY', 9310.00),
(212, '89467-BZ020-00', 'SENSOR, AIR FUEL RATIO                  ', 'D407', 1, 1, 'ASSEMBLY', 235196.00),
(213, '31210-BZ320-00', 'COVER ASSY, CLUTCH                      ', 'D408', 1, 1, 'ASSEMBLY', 192530.00),
(214, '31250-BZ330-00', 'DISC ASSY, CLUTCH                       ', 'D409', 1, 1, 'ASSEMBLY', 191530.00),
(215, '25051-BZ140-00', 'CONVERTER SUB-ASSY, EXHAUST MANIFOLD    ', 'D410', 1, 1, 'ASSEMBLY', 3746760.00),
(216, '25051-BZ150-00', 'CONVERTER SUB-ASSY, EXHAUST MANIFOLD    ', 'D411', 1, 1, 'ASSEMBLY', 3110910.00),
(217, '13405-BZ150-00', 'FLYWHEEL SUB-ASSY                       ', 'D412', 1, 1, 'ASSEMBLY', 249250.00),
(218, '32101-BZ100-00', 'GEAR SUB-ASSY, DRIVE PLATE & RING       ', 'D413', 1, 1, 'ASSEMBLY', 137400.00),
(219, '9004A-10200-00', 'BOLT, WASHER BASED HEAD HEXAGON         ', 'D414', 8, 1, 'ASSEMBLY', 1610.00),
(220, '82715-BZK60-00', 'BRACKET, WIRING HARNESS CLAMP           ', 'D415', 1, 1, 'ASSEMBLY', 3400.00),
(221, '82715-BZK80-00', 'BRACKET, WIRING HARNESS CLAMP           ', 'D416', 1, 1, 'ASSEMBLY', 2580.00),
(222, '15301-BZ150-00', 'GAGE SUB-ASSY, OIL LEVEL                ', 'D417', 1, 1, 'ASSEMBLY', 8680.00),
(223, '16575-BZ090-00', 'BRACKET, WATER HOSE CLAMP               ', 'D418', 1, 1, 'ASSEMBLY', 2515.00),
(224, '32113-BZ070-00', 'PLATE, CENTERING                        ', 'D419', 1, 1, 'ASSEMBLY', 3440.00),
(225, '89439-BZ210-00', 'BRACKET, SENSOR                         ', 'D420', 1, 1, 'ASSEMBLY', 3090.00),
(226, '82124-BZ020-00', 'WIRE, ENGINE, NO.4       ', 'D421', 1, 1, 'ASSEMBLY', 14990.00),
(227, '11409-BZ150-00', 'GUIDE SUB-ASSY, OIL LEVEL GAGE     ', 'D422', 1, 1, 'ASSEMBLY', 24785.00),
(228, '11201-BZ160-00', 'COVER SUB-ASSY, CYLINDER HEAD', 'D423', 1, 1, 'ASSEMBLY', 258300.00),
(229, '12261-BZ210-00', 'HOSE, VENTILATION, NO.1                 ', 'D424', 1, 1, 'ASSEMBLY', 22390.00),
(230, '11310-BZ240-00', 'COVER ASSY, TIMING CHAIN', 'D500', 1, 1, 'ASSEMBLY', 568180.00),
(231, '17120-BZ210-00', 'MANIFOLD ASSY, INTAKE', 'D501', 1, 1, 'ASSEMBLY', 248140.00),
(232, '31270-0J010-00', 'DAMPER ASSY, TRANSMISSION INPUT', 'D502', 1, 1, 'ASSEMBLY', 568140.00),
(233, '22030-BZ150-00', 'BODY ASSY, THROTTLE W/MOTOR', 'D503', 1, 1, 'ASSEMBLY', 260592.00),
(234, '22030-BZ160-00', 'BODY ASSY, THROTTLE W/MOTOR', 'D504', 1, 1, 'ASSEMBLY', 266662.00),
(235, '22030-BZ180-00', 'BODY ASSY, THROTTLE W/MOTOR', 'D505', 1, 1, 'ASSEMBLY', 375060.00),
(236, '90105-T0120-00', 'BOLT, FLANGE', 'D506', 2, 1, 'ASSEMBLY', 657.00),
(237, '9004A-11353-00', 'BOLT, FLANGE W/WASHER', 'D538', 2, 1, 'ASSEMBLY', 6988.00),
(238, '13211-BZ330-00', 'PISTON', 'D507', 4, 1, 'ASSEMBLY', 71330.00),
(239, '13405-BZ220-00', 'FLYWHEEL SUB-ASSY', 'D508', 1, 1, 'ASSEMBLY', 248450.00),
(240, '12101-BZ200-00', 'PAN SUB-ASSY, OIL', 'D509', 1, 1, 'ASSEMBLY', 354110.00),
(241, '16261-BZ750-00', 'HOSE, WATER BY-PASS, NO.1', 'D510', 1, 1, 'ASSEMBLY', 8330.00),
(242, '16264-BZ380-00', 'HOSE, WATER BY-PASS, NO.2', 'D511', 1, 1, 'ASSEMBLY', 9666.00),
(243, '16282-BZ110-00', 'HOSE, WATER BY-PASS, NO.5', 'D512', 1, 1, 'ASSEMBLY', 4885.00),
(244, '25051-BZ260-00', 'CONVERTER SUB-ASSY, EXHAUST MANIFOLD', 'D513', 1, 1, 'ASSEMBLY', 6019729.00),
(245, '9004A-46411-00', 'CLIP', 'D514', 1, 1, 'ASSEMBLY', 210.00),
(246, '23209-BZ100-00', 'INJECTOR SET, FUEL', 'D515', 4, 1, 'ASSEMBLY', 72700.00),
(247, '13470-BZ120-00', 'PULLEY ASSY, CRANKSHAFT', 'D516', 1, 1, 'ASSEMBLY', 72627.00),
(248, '16321-BZ130-00', 'INLET, WATER', 'D517', 1, 1, 'ASSEMBLY', 12521.00),
(249, '16323-BZ040-00', 'HOUSING, WATER INLET', 'D518', 1, 1, 'ASSEMBLY', 50.00),
(250, '16206-BZ080-00', 'PIPE SUB-ASSY, WATER BY-PASS, NO.1', 'D520', 1, 1, 'ASSEMBLY', 50.00),
(251, '16270-BZ030-00', 'PIPE ASSY, WATER BY-PASS, NO.2', 'D521', 1, 1, 'ASSEMBLY', 50.00),
(252, '16270-BZ040-00', 'PIPE ASSY, WATER BY-PASS, NO.2', 'D522', 1, 1, 'ASSEMBLY', 50.00),
(253, '11711-0Y100-02', 'BEARING, CRANKSHAFT, NO.1', 'D523', 5, 1, 'ASSEMBLY', 0.00),
(254, '11711-0Y100-03', 'BEARING, CRANKSHAFT, NO.1', 'D524', 5, 1, 'ASSEMBLY', 0.00),
(255, '11711-0Y100-04', 'BEARING, CRANKSHAFT, NO.1', 'D525', 5, 1, 'ASSEMBLY', 0.00),
(256, '11711-0Y100-05', 'BEARING, CRANKSHAFT, NO.1', 'D526', 5, 1, 'ASSEMBLY', 0.00),
(257, '11721-0Y100-02', 'BEARING, CRANKSHAFT, NO.2', 'D527', 5, 1, 'ASSEMBLY', 0.00),
(258, '11721-0Y100-03', 'BEARING, CRANKSHAFT, NO.2', 'D528', 5, 1, 'ASSEMBLY', 0.00),
(259, '11721-0Y100-04', 'BEARING, CRANKSHAFT, NO.2', 'D529', 5, 1, 'ASSEMBLY', 0.00),
(260, '11721-0Y100-05', 'BEARING, CRANKSHAFT, NO.2', 'D530', 5, 1, 'ASSEMBLY', 0.00),
(261, '11791-BZ140-00', 'WASHER, CRANKSHAFT THRUST, UPR', 'D531', 2, 1, 'ASSEMBLY', 3276.00),
(262, '11201-BZ180-00', 'COVER SUB-ASSY, CYLINDER HEAD', 'D532', 1, 1, 'ASSEMBLY', 361797.00),
(263, '13011-BZ210-00', 'RING SET, PISTON', 'D533', 1, 1, 'ASSEMBLY', 118404.00),
(264, '12261-BZ310-00', 'HOSE, VENTILATION, NO.1', 'D534', 1, 1, 'ASSEMBLY', 21967.00),
(265, '13050-BZ040-00', 'GEAR ASSY, CAMSHAFT TIMING', 'D535', 1, 1, 'ASSEMBLY', 265850.00),
(266, '12122-0Y011-00', 'PLATE, OIL PAN BAFFLE, NO.2', 'D536', 1, 1, 'ASSEMBLY', 1360.00),
(267, '12281-0Y110-00', 'HANGER ENGINE NO.1', 'D537', 1, 1, 'ASSEMBLY', 53540.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `line_user` varchar(20) NOT NULL,
  `shift_user` varchar(10) NOT NULL,
  `position` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `line_user`, `shift_user`, `position`, `role`) VALUES
(1, 'murtala', '$2y$10$i4yXskjtABWgGU4IbfUoyuZ3zwFjlhQ55UQfQvx82K3KHglBKSwya', 'Murtala', 'Die Casting', 'Red', 'Line Head', 'public'),
(2, 'sujarwo.ca', '$2y$10$LO3TEEwBVYjKzEapZ3TBuOQ3YKOA/QYWvpuD9PLVl4FWfPXKxU74m', 'Sujarwo', 'Camshaft', 'Red', 'Line Head', 'public'),
(3, 'bagus', '$2y$10$FZZeHmM.Q3VJAyfTOIqgee1owAqaW2RCVJ6XKMePao6/L.TtnCDMi', 'Bagus Uswanto', 'CCR & Oredering', 'Red', 'Team Member', 'dev');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_lsr`
--
ALTER TABLE `data_lsr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_line`
--
ALTER TABLE `master_line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_material`
--
ALTER TABLE `master_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_lsr`
--
ALTER TABLE `data_lsr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `master_line`
--
ALTER TABLE `master_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `master_material`
--
ALTER TABLE `master_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
