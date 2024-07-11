-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 05:01 AM
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
  `no_lsr` varchar(50) NOT NULL,
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
  `department` varchar(50) NOT NULL,
  `line_lsr` varchar(20) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `user_lsr` varchar(20) NOT NULL,
  `line_code` varchar(10) NOT NULL,
  `cost_center` varchar(10) NOT NULL,
  `status_lsr` varchar(20) NOT NULL,
  `approved_by` varchar(20) NOT NULL,
  `received_by` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `change_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `change_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='tabel data material';

--
-- Dumping data for table `data_lsr`
--

INSERT INTO `data_lsr` (`id`, `no_lsr`, `part_number`, `part_name`, `uniqe_no`, `qty`, `reason`, `condition`, `repair`, `source_type`, `remarks`, `material`, `tanggal`, `waktu`, `department`, `line_lsr`, `shift`, `user_lsr`, `line_code`, `cost_center`, `status_lsr`, `approved_by`, `received_by`, `price`, `total_price`, `change_date`, `change_by`) VALUES
(1, 'M000001', '13411-0Y180-00', 'CRANKSHAFT,1NR', 'D009', 1, 'B. Wrong ( Shortage )', '- Unknow', '1. Plant Repair', 1, 'aa', 'Crankshaft', '2024-07-09', '06:19:00', 'Production', 'Crankshaft', 'Red', 'ferdian.cr', 'MCR', 'AQM300', 'Waiting Approved', '', '', 331410.00, 331410.00, '2024-07-09 06:19:29', 'ferdian.cr'),
(2, 'M000001', '19315-0Y020-00', 'PLATE,CRANK ANGLE SEN', 'D012', 32, 'B. Wrong ( Shortage )', '- Unknow', '1. Plant Repair', 1, 'aa', 'Crankshaft', '2024-07-09', '06:19:00', 'Production', 'Crankshaft', 'Red', 'ferdian.cr', 'MCR', 'AQM300', 'Waiting Approved', '', '', 9360.00, 299520.00, '2024-07-09 06:19:38', 'ferdian.cr'),
(4, 'M000002', '13411-0Y180-00', 'CRANKSHAFT,1NR', 'D009', 3, 'C. Surplus', '- Unknow', '1. Plant Repair', 1, 'ccc', 'Crankshaft', '2024-07-09', '16:07:00', 'Production', 'Crankshaft', 'Red', 'ferdian.cr', 'MCR', 'AQM300', 'Waiting Approved', '', '', 331410.00, 994230.00, '2024-07-09 16:07:57', 'ferdian.cr'),
(5, 'X000001', '12180-0H020-00', 'CAP ASSY, OIL FILLER', 'S100', 12, 'C. Surplus', '- Unknow', '1. Plant Repair', 4, 'ddd', 'Assembly', '2024-07-10', '14:45:00', 'PPIC & Warehouse', 'CCR & Ordering', 'Red', 'bagus', 'CCR', 'ADA403', 'Waiting Approved', '', '', 5383.00, 64596.00, '2024-07-10 14:45:27', 'bagus'),
(6, 'X000001', '13540-0Y010-00', 'TENSIONER ASSY, CHAIN', 'S102', 1, 'D. Damage Origin', '- Unknow', '0. Unrepairable', 4, 'ddd', 'Assembly', '2024-07-10', '14:45:00', 'PPIC & Warehouse', 'CCR & Ordering', 'Red', 'bagus', 'CCR', 'ADA403', 'Waiting Approved', '', '', 70887.00, 70887.00, '2024-07-10 14:45:43', 'bagus');

-- --------------------------------------------------------

--
-- Table structure for table `master_line`
--

CREATE TABLE `master_line` (
  `id` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `nama_line` varchar(50) NOT NULL,
  `line_code` varchar(10) NOT NULL,
  `cost_center` varchar(10) NOT NULL,
  `material` varchar(20) NOT NULL,
  `category` varchar(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `change_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `change_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_line`
--

INSERT INTO `master_line` (`id`, `department`, `nama_line`, `line_code`, `cost_center`, `material`, `category`, `created_date`, `created_by`, `change_date`, `change_by`) VALUES
(1, 'Production', 'Main Line', 'KML', 'AQK200', 'Assembly', 'K', '0000-00-00 00:00:00', '', '2024-07-07 12:56:10', 'bagus'),
(2, 'Production', 'Sub Line', 'KSL', 'AQK100', 'Assembly', 'K', '0000-00-00 00:00:00', '', '2024-07-04 11:23:42', ''),
(3, 'Production', 'Crankshaft', 'MCR', 'AQM300', 'Crankshaft', 'M', '0000-00-00 00:00:00', '', '2024-07-04 11:23:42', ''),
(4, 'Production', 'Cylinder Block', 'MCB', 'AQM100', 'Cylinder Block', 'M', '0000-00-00 00:00:00', '', '2024-07-04 11:23:42', ''),
(5, 'Production', 'Cylinder Head', 'MCH', 'AQM200', 'Cylinder Head', 'M', '0000-00-00 00:00:00', '', '2024-07-04 11:23:42', ''),
(6, 'Production', 'Camshaft', 'MCA', 'AQM400', 'Camshaft', 'M', '0000-00-00 00:00:00', '', '2024-07-04 11:23:42', ''),
(7, 'Production', 'Die Casting', 'CDC', 'AQC100', 'Die Casting', 'C', '0000-00-00 00:00:00', '', '2024-07-04 11:23:42', ''),
(8, 'Quality', 'Quality', 'QC', 'AWM400', 'Assembly', 'X', '0000-00-00 00:00:00', '', '2024-07-04 11:23:57', ''),
(9, 'Logistics Operation', 'Logistic Operational', 'LOG', 'AQN200', 'Assembly', 'X', '0000-00-00 00:00:00', '', '2024-07-04 11:24:06', ''),
(10, 'Maintenance', 'Maintenance', 'MT', 'AWM100', 'Assembly', 'X', '0000-00-00 00:00:00', '', '2024-07-04 11:24:13', ''),
(11, 'Engineering Service', 'Engser', 'ES', 'AWM200', 'Assembly', 'X', '0000-00-00 00:00:00', '', '2024-07-04 11:24:20', ''),
(12, 'Logistics Operation', 'Technical Support', 'TS', 'ADN604', 'Assembly', 'X', '0000-00-00 00:00:00', '', '2024-07-04 11:24:26', ''),
(13, 'Engineering Service', 'Engser Casting', 'ESC', 'AWC200', 'Die Casting', 'X', '0000-00-00 00:00:00', '', '2024-07-04 11:24:34', ''),
(14, 'Maintenance', 'Maintenance Casting', 'MDC', 'AWC100', 'Die Casting', 'X', '0000-00-00 00:00:00', '', '2024-07-04 11:24:54', ''),
(15, 'PPIC & Warehouse', 'CCR & Ordering', 'CCR', 'ADA403', 'Assembly', 'X', '0000-00-00 00:00:00', '', '2024-07-04 11:25:06', ''),
(16, 'Production', 'Low Pressure', 'LP', 'AQC200', 'Cylinder Head', 'C', '0000-00-00 00:00:00', '', '2024-07-04 11:23:42', '');

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
  `price` decimal(10,2) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `change_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `change_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_material`
--

INSERT INTO `master_material` (`id`, `part_number`, `part_name`, `uniqe_no`, `unit_usage`, `source_type`, `material`, `price`, `created_date`, `created_by`, `change_date`, `change_by`) VALUES
(1, '11461-0Y040-00', 'LINER, CYLINDER', 'D001', 4, 1, 'DIE CASTING', 35740.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(2, '11411-0Y060-00', 'BLOCK, CYLINDER (Finish Casting NR)', 'CBDC', 1, 3, 'DIE CASTING', 788787.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(3, '11411-BZ180-00', 'BLOCK, CYLINDER (Finish Casting NH)', 'CBNH', 1, 3, 'DIE CASTING', 142960.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(4, '13411-0Y180-00', 'CRANKSHAFT,1NR', 'D009', 1, 1, 'CRANKSHAFT', 331410.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(5, '13411-0Y140-00', 'CRANKSHAFT,2NR', 'D008', 1, 1, 'CRANKSHAFT', 412445.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(6, '19315-0Y020-00', 'PLATE,CRANK ANGLE SEN', 'D012', 1, 1, 'CRANKSHAFT', 9360.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(7, '90280-04001-00', 'KEY,WOOD RUFF', 'T003', 1, 2, 'CRANKSHAFT', 4634.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(8, '13401-0Y180-00', 'CRANKSHAFT SUB-ASSY,1NR', 'CR1', 1, 3, 'CRANKSHAFT', 345404.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(9, '13401-0Y140-00', 'CRANKSHAFT SUB-ASSY,2NR', 'CR2', 1, 3, 'CRANKSHAFT', 426439.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(10, '11411-0Y060-00', 'BLOCK, CYLINDER (Casting NR)', 'CBDC', 1, 3, 'CYLINDER BLOCK', 788787.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(11, '11411-BZ180-00', 'BLOCK, CYLINDER (Casting NH)', 'CBNH', 1, 3, 'CYLINDER BLOCK', 142960.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(12, '11511-0Y040-00', 'CAP, CRANKSHAFT BEARING, NO.1', 'D006', 4, 1, 'CYLINDER BLOCK', 16090.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(13, '11513-0Y040-00', 'CAP, CRANKSHAFT BEARING, NO.3', 'D007', 1, 1, 'CYLINDER BLOCK', 16920.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(14, '90910-T2013-00', 'BOLT', 'D016', 10, 1, 'CYLINDER BLOCK', 3248.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(15, '90331-T0013-00', 'PLUG, TIGHT', 'S001', 5, 4, 'CYLINDER BLOCK', 898.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(16, '90331-T0014-00', 'PLUG, TIGHT', 'S002', 1, 4, 'CYLINDER BLOCK', 748.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(17, '11401-0Y060-00', 'BLOCK SUB-ASSY, CYLINDER (Finish NR)', 'CBNR', 1, 3, 'CYLINDER BLOCK', 907787.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(18, '11401-BZ220-00', 'BLOCK SUB-ASSY, CYLINDER (Finish HV)', 'CBHV', 1, 3, 'CYLINDER BLOCK', 261960.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(19, '11111-0Y050-00', 'HEAD, CYLINDER (Casting LP)', 'CHLP', 1, 3, 'CYLINDER HEAD', 458958.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(20, '11121-0Y011-00', 'BUSHING, INTAKE VALVE GUIDE', 'D017', 16, 1, 'CYLINDER HEAD', 2320.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(21, '11131-0Y030-00', 'SEAT, INTAKE VALVE', 'D003', 8, 1, 'CYLINDER HEAD', 1240.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(22, '11135-0Y030-00', 'SEAT, EXHAUST VALVE', 'D005', 8, 1, 'CYLINDER HEAD', 1780.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(23, '11131-0Y070-00', 'SEAT, INTAKE VALVE', 'D004', 8, 1, 'CYLINDER HEAD', 2140.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(24, '11135-47030-00', 'SEAT, EXHAUST VALVE', 'T001', 8, 2, 'CYLINDER HEAD', 10579.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(25, '90360-T0012-00', 'BALL', 'D013', 3, 1, 'CYLINDER HEAD', 275.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(26, '90331-T0015-00', 'PLUG, TIGHT', 'S003', 5, 4, 'CYLINDER HEAD', 898.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(27, '11101-0Y050-00', 'HEAD SUB-ASSY, CYLINDER (Finish Gasoline)', 'CHG', 1, 3, 'CYLINDER HEAD', 539244.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(28, '11101-0Y210-00', 'HEAD SUB-ASSY, CYLINDER (Finish Ethanol)', 'CHE', 1, 3, 'CYLINDER HEAD', 611644.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(29, '11101-BZ250-00', 'HEAD SUB-ASSY, CYLINDER (Finish Hybrid)', 'CHEV', 1, 3, 'CYLINDER HEAD', 65749.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(30, '13511-0Y050-00', 'CAMSHAFT NO. 1', 'D010', 1, 1, 'CAMSHAFT', 81220.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(31, '13512-0Y050-00', 'CAMSHAFT NO. 2', 'D011', 1, 1, 'CAMSHAFT', 82460.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(32, '90250-05027-00', 'PIN, STRAIGHT', 'T002', 1, 2, 'CAMSHAFT', 746.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(33, '13511-BZ110-00', 'CAMSHAFT, NO.1', 'D018', 1, 1, 'CAMSHAFT', 81220.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(34, '13512-BZ090-00', 'CAMSHAFT, NO.2', 'D019', 1, 1, 'CAMSHAFT', 82460.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(35, '13501-0Y050-00', 'CAMSHAFT SUB-ASSY, NO.1 (Finish NR IN)', 'CAIN', 1, 3, 'CAMSHAFT', 81966.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(36, '13502-0Y050-00', 'CAMSHAFT SUB-ASSY, NO.2 (Finish NR EX)', 'CAEX', 1, 3, 'CAMSHAFT', 83206.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(37, '13501-BZ090-00', 'CAMSHAFT SUB-ASSY, NO.1 (Finish HV IN)', 'CAHI', 1, 3, 'CAMSHAFT', 81966.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(38, '13502-BZ050-00', 'CAMSHAFT SUB-ASSY, NO.2 (Finish HV EX)', 'CAHX', 1, 3, 'CAMSHAFT', 83206.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(39, '12180-0H020-00', 'CAP ASSY, OIL FILLER', 'S100', 1, 4, 'ASSEMBLY', 5383.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(40, '13506-0Y040-00', 'CHAIN SUB-ASSY', 'S101', 1, 4, 'ASSEMBLY', 117248.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(41, '13540-0Y010-00', 'TENSIONER ASSY, CHAIN', 'S102', 1, 4, 'ASSEMBLY', 70887.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(42, '13562-0Y020-00', 'DAMPER, CHAIN VIBRATION, NO.2', 'S103', 1, 4, 'ASSEMBLY', 14656.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(43, '13566-0Y010-00', 'GUIDE, TIMING CHAIN', 'S104', 1, 4, 'ASSEMBLY', 28116.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(44, '13591-0Y010-00', 'ARM, TIMING CHAIN TENSION', 'S105', 1, 4, 'ASSEMBLY', 37538.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(45, '13734-0C010-00', 'SEAT, VALVE SPRING', 'S106', 16, 4, 'ASSEMBLY', 448.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(46, '15301-0Y070-00', 'GAGE SUB-ASSY, OIL LEVEL', 'S107', 1, 4, 'ASSEMBLY', 12413.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(47, '15678-0Y010-00', 'FILTER, OIL CONTROL VALVE', 'S108', 1, 4, 'ASSEMBLY', 8822.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(48, '16620-0Y061-00', 'TENSIONER ASSY, V-RIBBED BELT', 'S121', 1, 4, 'ASSEMBLY', 161516.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(49, '16620-0Y062-00', 'TENSIONER ASSY, V-RIBBED BELT', 'S125', 1, 4, 'ASSEMBLY', 255136.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(50, '23814-0Y010-00', 'PIPE, FUEL DELIVERY', 'S111', 1, 4, 'ASSEMBLY', 124726.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(51, '90105-T0211-00', 'BOLT, FLANGE', 'S112', 2, 4, 'ASSEMBLY', 2244.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(52, '90250-T0007-00', 'PIN, STRAIGHT', 'S113', 3, 4, 'ASSEMBLY', 448.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(53, '90250-T0018-00', 'PIN, STRAIGHT', 'S114', 2, 4, 'ASSEMBLY', 597.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(54, '90250-T0019-00', 'PIN, STRAIGHT', 'S115', 1, 4, 'ASSEMBLY', 1645.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(55, '90466-T0015-00', 'CLIP, HOSE', 'S116', 4, 4, 'ASSEMBLY', 1047.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(56, '90466-T0050-00', 'CLIP, HOSE', 'S117', 2, 4, 'ASSEMBLY', 1645.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(57, '90501-T0045-00', 'SPRING, COMPRESSION', 'S118', 16, 4, 'ASSEMBLY', 3889.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(58, '90915-TA001-00', 'FILTER, OIL', 'S119', 1, 4, 'ASSEMBLY', 27218.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(59, '90126-T0012-00', 'STUD, HEXALOBULAR', 'S122', 2, 4, 'ASSEMBLY', 448.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(60, '90126-T0019-00', 'STUD, HEXALOBULAR', 'S123', 2, 4, 'ASSEMBLY', 1496.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(61, '90178-T0053-00', 'NUT, FLANGE', 'S124', 2, 4, 'ASSEMBLY', 240.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(62, '15330-0Y050-00', 'VALVE ASSY, CAM TIMING OIL CONTROL', 'V100', 1, 4, 'ASSEMBLY', 127866.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(63, '15330-0Y060-00', 'VALVE ASSY, CAM TIMING OIL CONTROL', 'V101', 1, 4, 'ASSEMBLY', 127866.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(64, '16031-0Y010-00', 'INLET SUB-ASSY, WATER W/THERMOSTAT', 'U100', 1, 4, 'ASSEMBLY', 89582.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(65, '90919-T5001-00', 'SENSOR, CRANK POSITION', 'U101', 1, 4, 'ASSEMBLY', 46659.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(66, '90919-T5002-00', 'SENSOR, CRANK POSITION', 'U102', 2, 4, 'ASSEMBLY', 42472.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(67, '13711-47050-00', 'VALVE, INTAKE', 'T101', 8, 2, 'ASSEMBLY', 25859.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(68, '13715-47050-00', 'VALVE, EXHAUST', 'T102', 8, 2, 'ASSEMBLY', 25112.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(69, '16581-47020-00', 'CLAMP, HOSE', 'T103', 1, 2, 'ASSEMBLY', 2980.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(70, '23891-47040-00', 'SPACER, FUEL DELIVERY, NO.1', 'T104', 2, 2, 'ASSEMBLY', 7748.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(71, '32111-52110-00', 'PLATE, PUMP IMPELLER DRIVE', 'T105', 1, 2, 'ASSEMBLY', 183866.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(72, '32116-12030-00', 'SPACER, DRIVE PLATE, FR', 'T107', 1, 2, 'ASSEMBLY', 23618.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(73, '32117-12040-00', 'SPACER, DRIVE PLATE, RR', 'T108', 1, 2, 'ASSEMBLY', 39612.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(74, '82715-12P80-00', 'BRACKET, WIRING HARNESS CLAMP', 'T109', 1, 2, 'ASSEMBLY', 3737.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(75, '82715-5C360-00', 'BRACKET, WIRING HARNESS CLAMP', 'T110', 1, 2, 'ASSEMBLY', 26607.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(76, '83530-60020-00', 'SWITCH ASSY, OIL PRESSURE', 'T112', 1, 2, 'ASSEMBLY', 44395.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(77, '89422-33030-00', 'SENSOR, WATER TEMPERATURE', 'T113', 1, 2, 'ASSEMBLY', 37520.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(78, '89467-30050-00', 'SENSOR, AIR FUEL RATIO', 'T114', 1, 2, 'ASSEMBLY', 607324.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(79, '89615-20090-00', 'SENSOR, KNOCK CONTROL', 'T115', 1, 2, 'ASSEMBLY', 54710.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(80, '90105-10095-00', 'BOLT, WASHER BASED HEAD HEXAGON', 'T116', 8, 2, 'ASSEMBLY', 4036.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(81, '90126-08063-00', 'STUD, HEXALOBULAR', 'T118', 5, 2, 'ASSEMBLY', 1794.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(82, '90179-08101-00', 'NUT', 'T119', 6, 2, 'ASSEMBLY', 3588.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(83, '90177-08003-00', 'NUT LOCK', 'T137', 6, 2, 'ASSEMBLY', 1345.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(84, '90201-06047-00', 'WASHER, PLATE', 'T120', 2, 2, 'ASSEMBLY', 1943.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(85, '90201-10344-00', 'WASHER, PLATE', 'T121', 10, 2, 'ASSEMBLY', 1943.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(86, '90250-04097-00', 'PIN, STRAIGHT', 'T122', 2, 2, 'ASSEMBLY', 597.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(87, '90253-11004-00', 'PIN, RING', 'T123', 2, 2, 'ASSEMBLY', 1345.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(88, '90253-12002-00', 'PIN, RING', 'T124', 2, 2, 'ASSEMBLY', 1345.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(89, '90253-13017-00', 'PIN, RING', 'T125', 2, 2, 'ASSEMBLY', 1496.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(90, '90344-53008-00', 'PLUG, TAPER SCREW', 'T126', 1, 2, 'ASSEMBLY', 2989.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(91, '90430-12221-00', 'GASKET', 'T127', 1, 2, 'ASSEMBLY', 1496.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(92, '90913-01029-00', 'BOLT, FLYWHEEL', 'T128', 8, 2, 'ASSEMBLY', 4036.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(93, '90913-03028-00', 'LOCK, VALVE SPRING RETAINER', 'T129', 32, 2, 'ASSEMBLY', 299.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(94, '90919-01275-00', 'PLUG, SPARK', 'T130', 4, 2, 'ASSEMBLY', 97009.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(95, '90919-01290-00', 'PLUG, SPARK', 'T131', 4, 2, 'ASSEMBLY', 9117.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(96, '90119-08D36-00', 'BOLT, W/WASHER', 'T134', 1, 2, 'ASSEMBLY', 4185.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(97, '89467-52250-00', 'SENSOR, AIR FUEL RATIO', 'T135', 1, 2, 'ASSEMBLY', 126009.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(98, '90110-06040-00', 'BOLT, HEXAGON SOCKET HEAD CAP', 'T136', 4, 2, 'ASSEMBLY', 10464.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(99, '11791-B0010-00', 'WASHER, CRANKSHAFT THRUST, UPR', 'T400', 2, 2, 'ASSEMBLY', 21754.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(100, '90105-06345-00', 'BOLT, FLANGE', 'T401', 1, 2, 'ASSEMBLY', 1196.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(101, '161A0-B0010-00', 'PUMP ASSY, ELECTRIC WATER', 'T500', 1, 2, 'ASSEMBLY', 1886400.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(102, '16340-B0020-00', 'THERMOSTAT ASSY, W/GASKET', 'T501', 1, 2, 'ASSEMBLY', 100150.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(103, '89422-B2030-00', 'SENSOR, WATER TEMPERATURE', 'T502', 1, 2, 'ASSEMBLY', 368611.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(104, '90105-08373-00', 'BOLT, FLANGE', 'T503', 4, 2, 'ASSEMBLY', 2691.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(105, '90919-01289-00', 'PLUG, SPARK', 'T504', 4, 2, 'ASSEMBLY', 44992.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(106, '91551-10818-00', 'BOLT, FLANGE', 'T505', 6, 2, 'ASSEMBLY', 1345.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(107, '91551-80620-00', 'BOLT, FLANGE', 'T506', 2, 2, 'ASSEMBLY', 448.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(108, '91551-80828-00', 'BOLT, FLANGE', 'T507', 2, 2, 'ASSEMBLY', 1196.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(109, '91551-80890-00', 'BOLT, FLANGE', 'T508', 1, 2, 'ASSEMBLY', 2691.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(110, '91671-80616-00', 'BOLT, FLANGE', 'T509', 1, 2, 'ASSEMBLY', 0.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(111, '96136-42501-00', 'CLIP, HOSE', 'T510', 2, 2, 'ASSEMBLY', 3588.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(112, '96138-41501-00', 'CLIP, HOSE', 'T511', 2, 2, 'ASSEMBLY', 1639.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(113, '16031-0Y030-00', 'INLET SUB-ASSY, WATER W/THERMOSTAT', 'U400', 1, 4, 'ASSEMBLY', 91826.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(114, '9004A-11326-00', 'BOLT, FLANGE W/WASHER', 'S401', 0, 4, 'ASSEMBLY', 1047.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(115, '15601-BZ030-00', 'ELEMENT SUB-ASSY, OIL FILTER', 'S400', 1, 4, 'ASSEMBLY', 17539.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(116, '16271-BZ090-00', 'GASKET, WATER PUMP', 'S500', 1, 4, 'ASSEMBLY', 8225.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(117, '16303-BZ030-00', 'HOUSING SUB-ASSY, WATER OUTLET', 'S501', 1, 4, 'ASSEMBLY', 78814.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(118, '16303-BZ040-00', 'HOUSING SUB-ASSY, WATER OUTLET', 'S502', 1, 4, 'ASSEMBLY', 75972.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(119, '16325-BZ050-00', 'GASKET, WATER INLET HOUSING', 'S503', 1, 4, 'ASSEMBLY', 5981.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(120, '82715-BZQ60-00', 'BRACKET, WIRING HARNESS CLAMP', 'S504', 1, 4, 'ASSEMBLY', 3589.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(121, '82715-BZR60-00', 'BRACKET, WIRING HARNESS CLAMP', 'S505', 1, 4, 'ASSEMBLY', 4786.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(122, '90406-T0009-00', 'TUBE, UNION', 'S506', 1, 4, 'ASSEMBLY', 7778.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(123, '90466-T0020-00', 'CLIP, HOSE', 'S507', 2, 4, 'ASSEMBLY', 0.00, '2024-06-26 23:51:28', 'bagus', '2024-06-26 23:51:28', 'bagus'),
(124, '15301-0Y010-00', 'GAGE SUB-ASSY, OIL LEVEL', 'D189', 1, 1, 'ASSEMBLY', 8600.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(125, '12315-0Y010-00', 'BRACKET, ENGINE MOUNTING, FR NO.1 LH', 'D148', 1, 1, 'ASSEMBLY', 75210.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(126, '13405-0Y080-00', 'FLYWHEEL SUB-ASSY', 'D149', 1, 1, 'ASSEMBLY', 204010.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(127, '13405-0Y110-00', 'FLYWHEEL SUB-ASSY', 'D150', 1, 1, 'ASSEMBLY', 201620.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(128, '82715-0DM60-00', 'BRACKET, WIRING HARNESS CLAMP', 'D192', 1, 1, 'ASSEMBLY', 4860.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(129, '82715-0DM70-00', 'BRACKET, WIRING HARNESS CLAMP', 'D193', 1, 1, 'ASSEMBLY', 1930.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(130, '11201-0Y030-00', 'COVER SUB-ASSY, CYLINDER HEAD', 'D214', 1, 1, 'ASSEMBLY', 326880.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(131, '11310-0Y040-00', 'COVER ASSY, TIMING CHAIN W/WATER PUMP', 'D111', 1, 1, 'ASSEMBLY', 519420.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(132, '12101-0Y040-00', 'PAN SUB-ASSY, OIL', 'D112', 1, 1, 'ASSEMBLY', 339350.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(133, '12101-0Y080-00', 'PAN SUB-ASSY, OIL', 'D113', 1, 1, 'ASSEMBLY', 478340.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(134, '17120-0Y051-00', 'MANIFOLD ASSY, INTAKE', 'D226', 1, 1, 'ASSEMBLY', 330920.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(135, '17120-0Y061-00', 'MANIFOLD ASSY, INTAKE', 'D227', 1, 1, 'ASSEMBLY', 292350.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(136, '31210-0D180-00', 'COVER ASSY, CLUTCH', 'D105', 1, 1, 'ASSEMBLY', 177850.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(137, '31210-0D230-00', 'COVER ASSY, CLUTCH', 'D106', 1, 1, 'ASSEMBLY', 162310.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(138, '31210-0D240-00', 'COVER ASSY, CLUTCH', 'D107', 1, 1, 'ASSEMBLY', 171760.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(139, '31250-0D250-00', 'DISC ASSY, CLUTCH', 'D108', 1, 1, 'ASSEMBLY', 246610.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(140, '31250-0D320-00', 'DISC ASSY, CLUTCH', 'D109', 1, 1, 'ASSEMBLY', 220560.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(141, '31250-0D330-00', 'DISC ASSY, CLUTCH', 'D110', 1, 1, 'ASSEMBLY', 232430.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(142, '13050-0Y020-00', 'GEAR ASSY, CAMSHAFT TIMING', 'D152', 1, 1, 'ASSEMBLY', 203070.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(143, '13070-0Y020-00', 'GEAR ASSY, CAMSHAFT TIMING EXHAUST, RH', 'D153', 1, 1, 'ASSEMBLY', 195720.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(144, '90466-T0061-00', 'CLIP, HOSE', 'D161', 1, 1, 'ASSEMBLY', 345.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(145, '90466-T0062-00', 'CLIP, HOSE', 'D162', 1, 1, 'ASSEMBLY', 395.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(146, '12261-0Y041-00', 'HOSE, VENTILATION, NO.1', 'D221', 1, 1, 'ASSEMBLY', 29210.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(147, '16261-0Y030-00', 'HOSE, WATER BY-PASS, NO.1', 'D164', 1, 1, 'ASSEMBLY', 4670.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(148, '16264-0Y080-00', 'HOSE, WATER BY-PASS, NO.2', 'D165', 1, 1, 'ASSEMBLY', 3570.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(149, '16267-0Y030-00', 'HOSE, WATER BY-PASS, NO.3', 'D166', 1, 1, 'ASSEMBLY', 15470.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(150, '13711-0Y020-00', 'VALVE, INTAKE', 'D100', 8, 1, 'ASSEMBLY', 7747.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(151, '13715-0Y020-00', 'VALVE, EXHAUST', 'D101', 8, 1, 'ASSEMBLY', 8803.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(152, '22030-0Y020-00', 'BODY ASSY, THROTTLE W/MOTOR', 'D102', 1, 1, 'ASSEMBLY', 316640.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(153, '22030-0Y140-00', 'BODY ASSY, THROTTLE W/MOTOR', 'D302', 1, 1, 'ASSEMBLY', 314640.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(154, '13470-0Y020-00', 'PULLEY ASSY, CRANKSHAFT', 'D158', 1, 1, 'ASSEMBLY', 95410.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(155, '11115-0Y030-00', 'GASKET, CYLINDER HEAD', 'D173', 1, 1, 'ASSEMBLY', 72620.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(156, '17173-0Y030-00', 'GASKET, EXHAUST MANIFOLD', 'D174', 1, 1, 'ASSEMBLY', 6560.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(157, '11445-0Y020-00', 'SPACER, CYLINDER BLOCK WATER JACKET', 'D171', 1, 1, 'ASSEMBLY', 23390.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(158, '11103-0Y040-00', 'HOUSING SUB-ASSY, CAMSHAFT', 'D185', 1, 1, 'ASSEMBLY', 386480.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(159, '13716-0C030-00', 'CAP, VALVE STEM', 'D222', 16, 1, 'ASSEMBLY', 1070.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(160, '13750-0C040-00', 'ADJUSTER ASSY, VALVE LASH', 'D187', 16, 1, 'ASSEMBLY', 7660.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(161, '13801-0C030-00', 'ARM SUB-ASSY, VALVE ROCKER', 'D188', 16, 1, 'ASSEMBLY', 8690.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(162, '82219-0D110-00', 'WIRE, THERMOSENSOR', 'D201', 1, 1, 'ASSEMBLY', 13900.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(163, '13741-0Y010-00', 'RETAINER, VALVE SPRING', 'D114', 16, 1, 'ASSEMBLY', 723.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(164, '90105-T0051-00', 'BOLT, FLANGE', 'D115', 1, 1, 'ASSEMBLY', 331.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(165, '90105-T0052-00', 'BOLT, WASHER BASED HEAD HEXAGON', 'D116', 10, 1, 'ASSEMBLY', 403.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(166, '90105-T0085-00', 'BOLT, FLANGE', 'D117', 2, 1, 'ASSEMBLY', 453.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(167, '90105-T0125-00', 'BOLT, FLANGE', 'D118', 2, 1, 'ASSEMBLY', 1481.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(168, '90105-T0126-00', 'BOLT, FLANGE', 'D119', 2, 1, 'ASSEMBLY', 986.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(169, '90105-T0130-00', 'BOLT, FLANGE', 'D120', 7, 1, 'ASSEMBLY', 889.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(170, '90105-T0156-00', 'BOLT, FLANGE', 'D121', 1, 1, 'ASSEMBLY', 862.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(171, '90105-T0247-00', 'BOLT, FLANGE', 'D122', 8, 1, 'ASSEMBLY', 790.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(172, '90105-T0269-00', 'BOLT, FLANGE', 'D123', 12, 1, 'ASSEMBLY', 759.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(173, '90105-T0270-00', 'BOLT, FLANGE', 'D124', 5, 1, 'ASSEMBLY', 1654.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(174, '90105-T0271-00', 'BOLT, FLANGE', 'D125', 17, 1, 'ASSEMBLY', 1874.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(175, '90105-T0272-00', 'BOLT, FLANGE', 'D126', 3, 1, 'ASSEMBLY', 1503.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(176, '90105-T0283-00', 'BOLT, FLANGE', 'D128', 1, 1, 'ASSEMBLY', 461.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(177, '90105-T0347-00', 'BOLT, FLANGE', 'D127', 5, 1, 'ASSEMBLY', 889.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(178, '90109-T0055-00', 'BOLT', 'D218', 14, 1, 'ASSEMBLY', 823.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(179, '90110-T0002-00', 'BOLT, HEXAGON SOCKET HEAD CAP', 'D129', 4, 1, 'ASSEMBLY', 491.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(180, '90119-T0102-00', 'BOLT, W/WASHER', 'D130', 6, 1, 'ASSEMBLY', 481.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(181, '90119-T0136-00', 'BOLT, W/WASHER', 'D131', 7, 1, 'ASSEMBLY', 495.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(182, '90119-T0219-00', 'BOLT, W/WASHER', 'D132', 4, 1, 'ASSEMBLY', 1230.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(183, '90119-T0237-00', 'BOLT, W/WASHER', 'D133', 1, 1, 'ASSEMBLY', 862.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(184, '90119-T0240-00', 'BOLT, W/WASHER', 'D134', 4, 1, 'ASSEMBLY', 456.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(185, '90119-T0260-00', 'BOLT, W/WASHER', 'D135', 7, 1, 'ASSEMBLY', 508.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(186, '90119-T0342-00', 'BOLT, W/WASHER', 'D136', 6, 1, 'ASSEMBLY', 1023.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(187, '90178-T0019-00', 'NUT, FLANGE', 'D139', 2, 1, 'ASSEMBLY', 364.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(188, '90910-T2012-00', 'BOLT', 'D141', 10, 1, 'ASSEMBLY', 5095.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(189, '23209-0Y030-00', 'INJECTOR SET, FUEL', 'D190', 4, 1, 'ASSEMBLY', 62720.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(190, '23209-0Y071-00', 'INJECTOR SET, FUEL', 'D225', 4, 1, 'ASSEMBLY', 65200.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(191, '23209-0Y120-00', 'INJECTOR SET, FUEL', 'D223', 4, 1, 'ASSEMBLY', 65070.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(192, '13201-0Y070-00', 'ROD SUB-ASSY, CONNECTING', 'D216', 4, 1, 'ASSEMBLY', 73660.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(193, '13201-0Y080-00', 'ROD SUB-ASSY, CONNECTING', 'D217', 4, 1, 'ASSEMBLY', 78280.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(194, '11791-0Y040-00', 'WASHER, CRANKSHAFT THRUST, UPR', 'D151', 2, 1, 'ASSEMBLY', 3490.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(195, '11159-0Y020-00', 'GASKET, CAMSHAFT BEARING CAP OIL HOLE', 'D175', 2, 1, 'ASSEMBLY', 2850.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(196, '16258-0Y010-00', 'GASKET', 'D176', 1, 1, 'ASSEMBLY', 1160.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(197, '23291-0Y020-00', 'INSULATOR, INJECTOR VIBRATION', 'D177', 4, 1, 'ASSEMBLY', 1020.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(198, '90301-T0055-00', 'RING, O', 'D178', 1, 1, 'ASSEMBLY', 730.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(199, '90301-T0057-00', 'RING, O', 'D179', 1, 1, 'ASSEMBLY', 970.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(200, '90301-T0059-00', 'RING, O', 'D180', 1, 1, 'ASSEMBLY', 1180.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(201, '90311-T0074-00', 'SEAL, TYPE T OIL', 'D181', 1, 1, 'ASSEMBLY', 23890.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(202, '90311-T0076-00', 'SEAL, TYPE T OIL', 'D182', 1, 1, 'ASSEMBLY', 9300.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(203, '90913-T2004-00', 'SEAL, VALVE STEM OIL', 'D183', 8, 1, 'ASSEMBLY', 1720.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(204, '90913-T2005-00', 'SEAL, VALVE STEM OIL', 'D184', 8, 1, 'ASSEMBLY', 1720.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(205, '15708-0Y040-00', 'NOZZLE SUB-ASSY, OIL', 'D167', 4, 1, 'ASSEMBLY', 5660.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(206, '13211-0Y011-00', 'PISTON', 'D145', 4, 1, 'ASSEMBLY', 53220.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(207, '13211-0Y061-00', 'PISTON', 'D146', 4, 1, 'ASSEMBLY', 51195.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(208, '13251-0Y030-00', 'PIN, PISTON', 'D147', 4, 1, 'ASSEMBLY', 9455.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(209, '90919-T2011-00', 'COIL, IGNITION', 'D156', 4, 1, 'ASSEMBLY', 92038.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(210, '13521-0Y040-00', 'SPROCKET, CRANKSHAFT TIMING', 'D202', 1, 1, 'ASSEMBLY', 10432.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(211, '12121-0Y030-00', 'PLATE, OIL PAN BAFFLE', 'D194', 1, 1, 'ASSEMBLY', 15290.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(212, '12122-0Y010-00', 'PLATE, OIL PAN BAFFLE, NO.2', 'D195', 1, 1, 'ASSEMBLY', 1360.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(213, '12281-0Y010-00', 'HANGER, ENGINE', 'D196', 1, 1, 'ASSEMBLY', 53540.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(214, '12282-0Y050-00', 'HANGER, ENGINE, NO.2', 'D198', 1, 1, 'ASSEMBLY', 22380.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(215, '17118-0Y031-00', 'STAY, MANIFOLD', 'D219', 1, 1, 'ASSEMBLY', 9050.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(216, '12121-0Y090-00', 'PLATE, OIL PAN BAFFLE', 'D224', 1, 1, 'ASSEMBLY', 9362.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(217, '13011-0Y030-00', 'RING SET, PISTON', 'D215', 1, 1, 'ASSEMBLY', 79670.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(218, '11191-0Y010-00', 'TUBE, SPARK PLUG', 'D157', 4, 1, 'ASSEMBLY', 6080.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(219, '90105-T0273-00', 'BOLT, FLANGE', 'D168', 2, 1, 'ASSEMBLY', 1360.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(220, '90119-T0444-00', 'BOLT, W/WASHER', 'D220', 1, 1, 'ASSEMBLY', 9470.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(221, '90469-T0014-00', 'CLAMP', 'D172', 1, 1, 'ASSEMBLY', 520.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(222, '25051-0Y050-00', 'CONVERTER SUB-ASSY, EXHAUST MANIFOLD', 'D159', 1, 1, 'ASSEMBLY', 3074630.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(223, '25051-0Y060-00', 'CONVERTER SUB-ASSY, EXHAUST MANIFOLD', 'D160', 1, 1, 'ASSEMBLY', 3539580.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(224, '11452-0Y020-00', 'GUIDE, OIL LEVEL GAGE', 'D170', 1, 1, 'ASSEMBLY', 13020.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(225, '17167-0Y020-00', 'INSULATOR, EXHAUST MANIFOLD HEAT', 'D154', 1, 1, 'ASSEMBLY', 14525.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(226, '17168-0Y020-00', 'INSULATOR, EXHAUST MANIFOLD HEAT, NO.2', 'D155', 1, 1, 'ASSEMBLY', 14995.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(227, '90210-T0002-00', 'WASHER, SEAL', 'D142', 2, 1, 'ASSEMBLY', 1620.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(228, '90301-T0060-00', 'RING, O', 'D143', 1, 1, 'ASSEMBLY', 200.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(229, '90430-T0023-00', 'GASKET', 'D144', 1, 1, 'ASSEMBLY', 2220.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(230, '11711-0Y020-02', 'BEARING CRANKSHAFT', 'D203', 5, 1, 'ASSEMBLY', 0.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(231, '11711-0Y020-03', 'BEARING CRANKSHAFT', 'D204', 5, 1, 'ASSEMBLY', 0.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(232, '11711-0Y020-04', 'BEARING CRANKSHAFT', 'D205', 5, 1, 'ASSEMBLY', 0.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(233, '11711-0Y020-05', 'BEARING CRANKSHAFT', 'D206', 5, 1, 'ASSEMBLY', 0.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(234, '11721-0Y050-02', 'BEARING CRANKSHAFT NO.2', 'D207', 5, 1, 'ASSEMBLY', 0.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(235, '11721-0Y050-03', 'BEARING CRANKSHAFT NO.3', 'D208', 5, 1, 'ASSEMBLY', 0.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(236, '11721-0Y050-04', 'BEARING CRANKSHAFT NO.4', 'D209', 5, 1, 'ASSEMBLY', 0.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(237, '11721-0Y050-05', 'BEARING CRANKSHAFT NO.5', 'D210', 5, 1, 'ASSEMBLY', 0.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(238, '13281-0Y020-01', 'BEARING CONNECTING ROD', 'D211', 8, 1, 'ASSEMBLY', 0.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(239, '13281-0Y020-02', 'BEARING CONNECTING ROD', 'D212', 8, 1, 'ASSEMBLY', 0.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(240, '13281-0Y020-03', 'BEARING CONNECTING ROD', 'D213', 8, 1, 'ASSEMBLY', 0.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(241, '16268-0Y180-00', 'PIPE, WATER BY-PASS', 'D300', 1, 1, 'ASSEMBLY', 22455.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(242, '16268-0Y190-00', 'PIPE, WATER BY-PASS', 'D301', 1, 1, 'ASSEMBLY', 26245.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(243, '17120-BZ130-00', 'MANIFOLD ASSY, INTAKE', 'D400', 1, 1, 'ASSEMBLY', 305200.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(244, '31210-BZ270-00', 'COVER ASSY, CLUTCH', 'D401', 1, 1, 'ASSEMBLY', 131990.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(245, '31250-BZ320-00', 'DISC ASSY, CLUTCH', 'D402', 1, 1, 'ASSEMBLY', 233150.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(246, '11310-BZ200-00', 'COVER ASSY, TIMING CHAIN W/WATER PUMP', 'D403', 1, 1, 'ASSEMBLY', 621870.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(247, '12101-BZ140-00', 'PAN SUB-ASSY, OIL', 'D404', 1, 1, 'ASSEMBLY', 354110.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(248, '9004A-11240-00', 'BOLT, FLANGE W/WASHER', 'D405', 1, 1, 'ASSEMBLY', 348.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(249, '16267-BZ180-00', 'HOSE, WATER BY-PASS, NO.3', 'D406', 1, 1, 'ASSEMBLY', 9310.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(250, '89467-BZ020-00', 'SENSOR, AIR FUEL RATIO', 'D407', 1, 1, 'ASSEMBLY', 235196.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(251, '31210-BZ320-00', 'COVER ASSY, CLUTCH', 'D408', 1, 1, 'ASSEMBLY', 192530.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(252, '31250-BZ330-00', 'DISC ASSY, CLUTCH', 'D409', 1, 1, 'ASSEMBLY', 191530.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(253, '25051-BZ140-00', 'CONVERTER SUB-ASSY, EXHAUST MANIFOLD', 'D410', 1, 1, 'ASSEMBLY', 3746760.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(254, '25051-BZ150-00', 'CONVERTER SUB-ASSY, EXHAUST MANIFOLD', 'D411', 1, 1, 'ASSEMBLY', 3110910.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(255, '13405-BZ150-00', 'FLYWHEEL SUB-ASSY', 'D412', 1, 1, 'ASSEMBLY', 249250.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(256, '32101-BZ100-00', 'GEAR SUB-ASSY, DRIVE PLATE & RING', 'D413', 1, 1, 'ASSEMBLY', 137400.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(257, '9004A-10200-00', 'BOLT, WASHER BASED HEAD HEXAGON', 'D414', 8, 1, 'ASSEMBLY', 1610.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(258, '82715-BZK60-00', 'BRACKET, WIRING HARNESS CLAMP', 'D415', 1, 1, 'ASSEMBLY', 3400.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(259, '82715-BZK80-00', 'BRACKET, WIRING HARNESS CLAMP', 'D416', 1, 1, 'ASSEMBLY', 2580.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(260, '15301-BZ150-00', 'GAGE SUB-ASSY, OIL LEVEL', 'D417', 1, 1, 'ASSEMBLY', 8680.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(261, '16575-BZ090-00', 'BRACKET, WATER HOSE CLAMP', 'D418', 1, 1, 'ASSEMBLY', 2515.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(262, '32113-BZ070-00', 'PLATE, CENTERING', 'D419', 1, 1, 'ASSEMBLY', 3440.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(263, '89439-BZ210-00', 'BRACKET, SENSOR', 'D420', 1, 1, 'ASSEMBLY', 3090.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(264, '82124-BZ020-00', 'WIRE, ENGINE, NO.4', 'D421', 1, 1, 'ASSEMBLY', 14990.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(265, '11409-BZ150-00', 'GUIDE SUB-ASSY, OIL LEVEL GAGE', 'D422', 1, 1, 'ASSEMBLY', 24785.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(266, '11201-BZ160-00', 'COVER SUB-ASSY, CYLINDER HEAD', 'D423', 1, 1, 'ASSEMBLY', 258300.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(267, '12261-BZ210-00', 'HOSE, VENTILATION, NO.1', 'D424', 1, 1, 'ASSEMBLY', 22390.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(268, '11310-BZ240-00', 'COVER ASSY, TIMING CHAIN', 'D500', 1, 1, 'ASSEMBLY', 568180.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(269, '17120-BZ210-00', 'MANIFOLD ASSY, INTAKE', 'D501', 1, 1, 'ASSEMBLY', 248140.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(270, '31270-0J010-00', 'DAMPER ASSY, TRANSMISSION INPUT', 'D502', 1, 1, 'ASSEMBLY', 568140.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(271, '22030-BZ150-00', 'BODY ASSY, THROTTLE W/MOTOR', 'D503', 1, 1, 'ASSEMBLY', 260592.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(272, '22030-BZ160-00', 'BODY ASSY, THROTTLE W/MOTOR', 'D504', 1, 1, 'ASSEMBLY', 266662.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(273, '22030-BZ180-00', 'BODY ASSY, THROTTLE W/MOTOR', 'D505', 1, 1, 'ASSEMBLY', 375060.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(274, '90105-T0120-00', 'BOLT, FLANGE', 'D506', 2, 1, 'ASSEMBLY', 657.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(275, '9004A-11353-00', 'BOLT, FLANGE W/WASHER', 'D538', 2, 1, 'ASSEMBLY', 6988.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(276, '13211-BZ330-00', 'PISTON', 'D507', 4, 1, 'ASSEMBLY', 71330.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(277, '13405-BZ220-00', 'FLYWHEEL SUB-ASSY', 'D508', 1, 1, 'ASSEMBLY', 248450.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(278, '12101-BZ200-00', 'PAN SUB-ASSY, OIL', 'D509', 1, 1, 'ASSEMBLY', 354110.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(279, '16261-BZ750-00', 'HOSE, WATER BY-PASS, NO.1', 'D510', 1, 1, 'ASSEMBLY', 8330.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(280, '16264-BZ380-00', 'HOSE, WATER BY-PASS, NO.2', 'D511', 1, 1, 'ASSEMBLY', 9666.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(281, '16282-BZ110-00', 'HOSE, WATER BY-PASS, NO.5', 'D512', 1, 1, 'ASSEMBLY', 4885.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(282, '25051-BZ260-00', 'CONVERTER SUB-ASSY, EXHAUST MANIFOLD', 'D513', 1, 1, 'ASSEMBLY', 6019729.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(283, '9004A-46411-00', 'CLIP', 'D514', 1, 1, 'ASSEMBLY', 210.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(284, '23209-BZ100-00', 'INJECTOR SET, FUEL', 'D515', 4, 1, 'ASSEMBLY', 72700.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(285, '13470-BZ120-00', 'PULLEY ASSY, CRANKSHAFT', 'D516', 1, 1, 'ASSEMBLY', 72627.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(286, '16321-BZ130-00', 'INLET, WATER', 'D517', 1, 1, 'ASSEMBLY', 12521.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(287, '16323-BZ040-00', 'HOUSING, WATER INLET', 'D518', 1, 1, 'ASSEMBLY', 50.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(288, '16206-BZ080-00', 'PIPE SUB-ASSY, WATER BY-PASS, NO.1', 'D520', 1, 1, 'ASSEMBLY', 50.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(289, '16270-BZ030-00', 'PIPE ASSY, WATER BY-PASS, NO.2', 'D521', 1, 1, 'ASSEMBLY', 50.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(290, '16270-BZ040-00', 'PIPE ASSY, WATER BY-PASS, NO.2', 'D522', 1, 1, 'ASSEMBLY', 50.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(291, '11711-0Y100-02', 'BEARING, CRANKSHAFT, NO.1', 'D523', 5, 1, 'ASSEMBLY', 0.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(292, '11711-0Y100-03', 'BEARING, CRANKSHAFT, NO.1', 'D524', 5, 1, 'ASSEMBLY', 0.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(293, '11711-0Y100-04', 'BEARING, CRANKSHAFT, NO.1', 'D525', 5, 1, 'ASSEMBLY', 0.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(294, '11711-0Y100-05', 'BEARING, CRANKSHAFT, NO.1', 'D526', 5, 1, 'ASSEMBLY', 0.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(295, '11721-0Y100-02', 'BEARING, CRANKSHAFT, NO.2', 'D527', 5, 1, 'ASSEMBLY', 0.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(296, '11721-0Y100-03', 'BEARING, CRANKSHAFT, NO.2', 'D528', 5, 1, 'ASSEMBLY', 0.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(297, '11721-0Y100-04', 'BEARING, CRANKSHAFT, NO.2', 'D529', 5, 1, 'ASSEMBLY', 0.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(298, '11721-0Y100-05', 'BEARING, CRANKSHAFT, NO.2', 'D530', 5, 1, 'ASSEMBLY', 0.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(299, '11791-BZ140-00', 'WASHER, CRANKSHAFT THRUST, UPR', 'D531', 2, 1, 'ASSEMBLY', 3276.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(300, '11201-BZ180-00', 'COVER SUB-ASSY, CYLINDER HEAD', 'D532', 1, 1, 'ASSEMBLY', 361797.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(301, '13011-BZ210-00', 'RING SET, PISTON', 'D533', 1, 1, 'ASSEMBLY', 118404.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(302, '12261-BZ310-00', 'HOSE, VENTILATION, NO.1', 'D534', 1, 1, 'ASSEMBLY', 21967.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(303, '13050-BZ040-00', 'GEAR ASSY, CAMSHAFT TIMING', 'D535', 1, 1, 'ASSEMBLY', 265850.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(304, '12122-0Y011-00', 'PLATE, OIL PAN BAFFLE, NO.2', 'D536', 1, 1, 'ASSEMBLY', 1360.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus'),
(305, '12281-0Y110-00', 'HANGER ENGINE NO.1', 'D537', 1, 1, 'ASSEMBLY', 53540.00, '2024-06-26 23:51:29', 'bagus', '2024-06-26 23:51:29', 'bagus');

-- --------------------------------------------------------

--
-- Table structure for table `report_c`
--

CREATE TABLE `report_c` (
  `id` int(5) NOT NULL,
  `no_lsr` varchar(7) NOT NULL,
  `line` varchar(50) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report_k`
--

CREATE TABLE `report_k` (
  `id` int(5) NOT NULL,
  `no_lsr` varchar(7) NOT NULL,
  `line` varchar(50) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report_m`
--

CREATE TABLE `report_m` (
  `id` int(5) NOT NULL,
  `no_lsr` varchar(7) NOT NULL,
  `line` varchar(50) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report_m`
--

INSERT INTO `report_m` (`id`, `no_lsr`, `line`, `pic`, `tanggal`, `waktu`) VALUES
(1, 'M000001', 'Crankshaft', 'ferdian.cr', '2024-07-09', '06:19:00'),
(3, 'M000002', 'Crankshaft', 'ferdian.cr', '2024-07-09', '16:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `report_x`
--

CREATE TABLE `report_x` (
  `id` int(5) NOT NULL,
  `no_lsr` varchar(7) NOT NULL,
  `line` varchar(50) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report_x`
--

INSERT INTO `report_x` (`id`, `no_lsr`, `line`, `pic`, `tanggal`, `waktu`) VALUES
(1, 'X000001', 'CCR & Ordering', 'bagus', '2024-07-10', '14:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `line_user` varchar(20) NOT NULL,
  `shift_user` varchar(10) NOT NULL,
  `position` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL,
  `category` varchar(3) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `change_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `change_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `department`, `line_user`, `shift_user`, `position`, `role`, `category`, `created_date`, `created_by`, `change_date`, `change_by`) VALUES
(1, 'murtala', '$2y$10$i4yXskjtABWgGU4IbfUoyuZ3zwFjlhQ55UQfQvx82K3KHglBKSwya', 'Murtala', 'Production', 'Die Casting', 'Red', 'Line Head', 'public', 'C', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(2, 'sujarwo.ca', '$2y$10$LO3TEEwBVYjKzEapZ3TBuOQ3YKOA/QYWvpuD9PLVl4FWfPXKxU74m', 'Sujarwo', 'Production', 'Camshaft', 'Red', 'Line Head', 'public', 'M', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(3, 'bagus', '$2y$10$nnUe1nmUI5Ca05wHuPmL7.R4CzDYTfbAPmx0uBH3zbSjKmJ0qpBUa', 'Bagus Uswanto', 'PPIC & Warehouse', 'CCR & Ordering', 'Red', 'Team Member', 'admin', 'X', '0000-00-00 00:00:00', '', '2024-07-11 09:12:07', ''),
(4, 'hendro', '$2y$10$.z/UsSbhGj0HLY8NMrX6Su0g3xxFoKZHkeBuTb0plVeZGIUhZ9dQ.', 'Hendro Sujatmiko', 'PPIC & Warehouse', 'CCR & Ordering', 'Red', 'Line Head', 'admin', 'X', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(5, 'rasty', '$2y$10$JyEUSzjROkdLE8KXyu8H0.nXQ0x6mwsyIR7VYDRX5ErizrQHaRy/q', 'Dayudya Luthfiarasty', 'PPIC & Warehouse', 'CCR & Ordering', 'NonShift', 'Team Member', 'admin', 'X', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(6, 'iwan', '$2y$10$B8Elt4/WXJbXVL.CLjwZp.jqFOHJh/y7e0DNqOg01KfT2VRehSUNa', 'Iwan Kustiawan', 'PPIC & Warehouse', 'CCR & Ordering', 'NonShift', 'Section Head', 'admin', 'X', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(7, 'nurrohman', '$2y$10$.3I7g.O1iZ0J0K88KYrVpOAq44rruIYquupkmRIQcucquXwiYW97m', 'Nur Rohman', 'Production', 'Die Casting', 'White', 'Line Head', 'public', 'C', '0000-00-00 00:00:00', '', '2024-07-11 09:45:03', 'bagus'),
(8, 'sujarwo.ch', '$2y$10$1OkWaGbyoDCQ.6mpirBKRece7sU0Gj0WY7a12n9nqy8cwWLqDNb8m', 'Sujarwo', 'Production', 'Cylinder Head', 'Red', 'Line Head', 'public', 'M', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(9, 'ferdian.cb', '$2y$10$mdwoifA918JQxiHoJw0iVu8CXkKrZw9GhpcXIb4zVUiGyZEe3RmO.', 'Ferdian', 'Production', 'Cylinder Block', 'Red', 'Line Head', 'public', 'M', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(10, 'ferdian.cr', '$2y$10$TOCwRyx37etzbehAOxRot.fIP76SCmc2h/vmpK.Cj//s3Q3JFVVxi', 'Ferdian', 'Production', 'Crankshaft', 'Red', 'Line Head', 'public', 'M', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(11, 'suhardi', '$2y$10$i64q40POYISw45GU1XqsGetVWdkiiNTDwr0o8rOAGPUOsHtQSvtgi', 'Suhardi', 'PPIC & Warehouse', 'CCR & Ordering', 'White', 'Line Head', 'admin', 'X', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(12, 'jae', '$2y$10$7Rqvj9ddMPS2HcobtwFAr.Cu5KwauJctHNV1Kp7wvWrfzyPz.KGfO', 'Djaenudin', 'Logistics Operation', 'Logistic Operational', 'White', 'Line Head', 'common', 'X', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(13, 'yamin', '$2y$10$X3s.YRpgfFsW0qetbhl9FOIVc7pNHQU47C0RlvUo.hKU.mIC3aDF2', 'Muhamad Yamin', 'Quality', 'Quality', 'Red', 'Line Head', 'common', 'X', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(14, 'suhandi', '$2y$10$0N1oFAUYf/h2IPF/0n77NeVZfVPw2zhv2Y8KIFRm857SREVrv4fXi', 'Suhandi', 'Quality', 'Quality', 'White', 'Line Head', 'common', 'X', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(15, 'sujatna', '$2y$10$Gc1sviHq36Wv9VR4CIYgq.nc71x.5BRc7NgI6GbyLCyx7UWgRPJPS', 'Sujatna', 'Maintenance', 'Maintenance Casting', 'NonShift', 'Staff', 'common', 'X', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(16, 'herman', '$2y$10$QrujKhA6ToiRjrDhadPrEuzQBdNzz1lKu1O.6zIF1omlm1kdow.QO', 'Herman', 'Maintenance', 'Maintenance', 'NonShift', 'Staff', 'common', 'X', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(17, 'nuzwar', '$2y$10$zbiwT9bXXqtW9bnADBlob.J1rECzn0BDVxG9Qo42R8dpDN1taY0F.', 'Nuzwar', 'Engineering Service', 'Engser', 'NonShift', 'Section Head', 'common', 'X', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(18, 'robby', '$2y$10$K50GpYHJ2yyutSX/MEmGw.mysR8tQh5UV1TvLKn1Qt9g2fDUNRyRC', 'Robby Cahyadi', 'Engineering Service', 'Engser Casting', 'NonShift', 'Staff', 'common', 'X', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(19, 'ipul', '$2y$10$oi/XVD3CLY0A2/523/nfrej.g82qlXjenoXahpTsN.OLGZpZYW3EW', 'Andi Rustandi', 'Logistics Operation', 'Logistic Operational', 'Red', 'Line Head', 'common', 'X', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(20, 'purnomo.cb', '$2y$10$DMMlK0tR54IRuvjXNOX7E.ms4./gZpC54TQUmWy6BWvFWJgLWJ3ka', 'Purnomo Wahyudin', 'Production', 'Cylinder Block', 'White', 'Line Head', 'public', 'M', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(21, 'purnomo.cr', '$2y$10$sF3vC1YVdRbgDPqYbOlrj.zctWK.zU7qgxOa04TxbEMvitXobuqtG', 'Purnomo Wahyudin', 'Production', 'Crankshaft', 'White', 'Line Head', 'public', 'M', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(22, 'jhon.ca', '$2y$10$fuST5CXiri3z7rfeqNrJ3.WzgbJhjCYmhtk6.0uju9UkxilnBfuN6', 'Yohanes F.H', 'Production', 'Camshaft', 'White', 'Line Head', 'public', 'M', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(23, 'jhon.ch', '$2y$10$qbOn73AYCpy/xi702yqRde11KOc2TkRnabw7ShouuJNJcLJl0qrQ2', 'Yohanes F.H', 'Production', 'Cylinder Head', 'White', 'Line Head', 'public', 'M', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(24, 'purwanto', '$2y$10$okhdsvQcx6kVjGCtKKYgv.N.ypdUarJeDglGBKsA9L2GDeZRwaE4a', 'Purwanto', 'Production', 'Sub Line', 'White', 'Line Head', 'common', 'K', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(25, 'bambang', '$2y$10$1wjrklxh20QtemGw5DTRAOjtnAsTIesUHcQA8d0lA9n/vVVLDqfra', 'Bambang Supriyono', 'Production', 'Main Line', 'White', 'Line Head', 'common', 'K', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(26, 'yunizar', '$2y$10$vt/Hv08xl5rh5suYdMMPOuK3OKSXsMJUdtT02exf14kfTfRj1fqMS', 'Yunizar', 'Production', 'All', 'White', 'Section Head', 'approver', 'K', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(27, 'waryo', '$2y$10$NITwce8kLLqs02kGlVUTZeiKI57D2v1.Mvwx8zZbiS7pYmi4vKQc.', 'Waryo Sutoto', 'Production', 'Sub Line', 'Red', 'Line Head', 'common', 'K', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(28, 'prima', '$2y$10$i7c/9ombLo3E6mIPMIS5TeuS2DxNAGbylDElL05RgbDfOUDymclFi', 'Primaantara Rezky D.A', 'Logistics Operation', 'Technical Support', 'NonShift', 'Line Head', 'common', 'X', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(29, 'triyanto', '$2y$10$OnANkZEo.WdFqwen6JOvau/decD4FT1suVIH5uNWYuFsXYQu0/n9i', 'Triyanto', 'Production', 'Low Pressure', 'Red', 'Line Head', 'public', 'C', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(30, 'buset', '$2y$10$t1hjv1RbaM.I3aK0XcsJqew2u32q68nutEqyJR270P38OgCPaMy7O', 'Budi Setiya', 'Production', 'Low Pressure', 'White', 'Line Head', 'public', 'C', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(31, 'sunarso', '$2y$10$.2cGjnzAuBo8j06vTRaLbO9EYsQMxgDguHPP7u/K5vBfZFDle9fcG', 'Sunarso', 'Production', 'All', 'Red', 'Section Head', 'approver', 'M', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(32, 'sentot', '$2y$10$L8urxrd3r.LjSM0ctiFJp.gFhGj1.MVBqwlVSZxO0v6V4crZAQKjq', 'M. Sentot', 'Quality', 'Quality', 'NonShift', 'Section Head', 'approveqc', 'X', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(33, 'ika', '$2y$10$x2qLBEwN364e86PTcQYUe.fqcN.xRBLl.ob/yYWj8vR/64kScQ8rm', 'Ika Arlina', 'Production', 'All', 'NonShift', 'Team Member', 'sight', 'All', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(34, 'sukandar', '$2y$10$rCvByj20n2nIb3RFDOQYROnOu9moxfgAsBPEfa4Lu5zLRuKefRPHO', 'Sukandar', 'Production', 'All', 'Red', 'Section Head', 'approver', 'K', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(35, 'ero', '$2y$10$OK/CIw9s2AoQ5xgMOZbhE.zbbWiw4TX/96gPbnWHgJlRqTi.7yQay', 'Ero Rojai', 'Production', 'All', 'Red', 'Section Head', 'approver', 'C', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(37, 'johanes', '$2y$10$0W2yXvq/PvWD2Oo/RS0ohOyITkokp6yuXwUOiooafVTQqublDlV8G', 'Johanes Joko Widodo', 'Production', 'All', 'White', 'Section Head', 'approver', 'C', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(38, 'ferry', '$2y$10$9ohV4vih/OYmF37Wc3h5G.Q6H3CVwClQR6K4/DeozlGnA19nh12p.', 'Ferry D. Sumual', 'Production', 'All', 'White', 'Section Head', 'approver', 'M', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(40, 'ridwan', '$2y$10$TXQQxU5QfAaXBUincA5xtepBKCo9MggZv6i6x5ZzqCDI8xn3Y.sLG', 'Ridwan B.S', 'Production', 'Main Line', 'Red', 'Line Head', 'common', 'K', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(41, 'desti', '$2y$10$ylPoRRUFHK1vqRsMaDTR.uqp8YO2VOcsG8/o4iKZwhe4M6ttbEEKe', 'Desetianto', 'Logistics Operation', 'Logistic Operational', 'NonShift', 'Section Head', 'approver', 'X', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(42, 'arifin', '$2y$10$TTb1X9PPrN08.zHr2u8ys.LiJYI53Yp7olElU.eTTgv3Tu9OiAvJe', 'Arifin', 'Logistics Operation', 'Technical Support', 'NonShift', 'Section Head', 'approver', 'X', '0000-00-00 00:00:00', '', '2024-07-09 08:10:57', ''),
(47, 'sholikin', '$2y$10$TS58gzGxQ7tlhjT14mP83uk5TIgNsZaFPHbqDAp9P5BmT/eqmFa2a', 'Sholikin', 'Quality', 'Quality', 'Red', 'Line Head', 'common', 'K', '2024-07-10 08:18:08', 'bagus', '2024-07-10 13:20:51', 'bagus');

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
-- Indexes for table `report_c`
--
ALTER TABLE `report_c`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_k`
--
ALTER TABLE `report_k`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_m`
--
ALTER TABLE `report_m`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_x`
--
ALTER TABLE `report_x`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_lsr`
--
ALTER TABLE `data_lsr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `master_line`
--
ALTER TABLE `master_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `master_material`
--
ALTER TABLE `master_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `report_c`
--
ALTER TABLE `report_c`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_k`
--
ALTER TABLE `report_k`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_m`
--
ALTER TABLE `report_m`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `report_x`
--
ALTER TABLE `report_x`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
