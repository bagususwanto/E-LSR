-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 06:29 PM
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
(3, 'bagus', '$2y$10$FZZeHmM.Q3VJAyfTOIqgee1owAqaW2RCVJ6XKMePao6/L.TtnCDMi', 'Bagus Uswanto', 'CCR & Ordering', 'Red', 'Team Member', 'dev'),
(4, 'hendro', '$2y$10$.z/UsSbhGj0HLY8NMrX6Su0g3xxFoKZHkeBuTb0plVeZGIUhZ9dQ.', 'Hendro Sujatmiko', 'CCR & Ordering', 'Red', 'Line Head', 'admin'),
(5, 'rasty', '$2y$10$JyEUSzjROkdLE8KXyu8H0.nXQ0x6mwsyIR7VYDRX5ErizrQHaRy/q', 'Dayudya Luthfiarasty', 'CCR & Ordering', 'Non Shift', 'Team Member', 'admin'),
(6, 'alex', '$2y$10$B8Elt4/WXJbXVL.CLjwZp.jqFOHJh/y7e0DNqOg01KfT2VRehSUNa', 'Alex Kurniawan', 'CCR & Ordering', 'Non Shift', 'Section Head', 'admin'),
(7, 'nurrohman', '$2y$10$H2jz/AY7bMqcJxZoTILxve2qCNJ9h3DKKsE4f5rMMU0k9JBO4SwR6', 'nurrohman', 'Die Casting', 'White', 'Line Head', 'public'),
(8, 'sujarwo.ch', '$2y$10$1OkWaGbyoDCQ.6mpirBKRece7sU0Gj0WY7a12n9nqy8cwWLqDNb8m', 'Sujarwo', 'Cylinder Head', 'Red', 'Line Head', 'public'),
(9, 'ferdian.cb', '$2y$10$mdwoifA918JQxiHoJw0iVu8CXkKrZw9GhpcXIb4zVUiGyZEe3RmO.', 'Ferdian', 'Cylinder Block', 'Red', 'Line Head', 'public'),
(10, 'ferdian.cr', '$2y$10$TOCwRyx37etzbehAOxRot.fIP76SCmc2h/vmpK.Cj//s3Q3JFVVxi', 'Ferdian', 'Crankshaft', 'Red', 'Line Head', 'public'),
(11, 'suhardi', '$2y$10$i64q40POYISw45GU1XqsGetVWdkiiNTDwr0o8rOAGPUOsHtQSvtgi', 'Suhardi', 'CCR & Ordering', 'White', 'Line Head', 'admin'),
(12, 'jae', '$2y$10$7Rqvj9ddMPS2HcobtwFAr.Cu5KwauJctHNV1Kp7wvWrfzyPz.KGfO', 'Djaenudin', 'Logistic Operational', 'White', 'Line Head', 'common'),
(13, 'yamin', '$2y$10$X3s.YRpgfFsW0qetbhl9FOIVc7pNHQU47C0RlvUo.hKU.mIC3aDF2', 'Muhamad Yamin', 'Quality', 'Red', 'Line Head', 'common'),
(14, 'suhandi', '$2y$10$0N1oFAUYf/h2IPF/0n77NeVZfVPw2zhv2Y8KIFRm857SREVrv4fXi', 'Suhandi', 'Quality', 'White', 'Line Head', 'common'),
(15, 'sujatna', '$2y$10$Gc1sviHq36Wv9VR4CIYgq.nc71x.5BRc7NgI6GbyLCyx7UWgRPJPS', 'Sujatna', 'Maintenance Casting', 'NonShift', 'Staff', 'common'),
(16, 'herman', '$2y$10$QrujKhA6ToiRjrDhadPrEuzQBdNzz1lKu1O.6zIF1omlm1kdow.QO', 'Herman', 'Maintenance', 'NonShift', 'Staff', 'common'),
(17, 'nuzwar', '$2y$10$zbiwT9bXXqtW9bnADBlob.J1rECzn0BDVxG9Qo42R8dpDN1taY0F.', 'Nuzwar', 'Engser', 'NonShift', 'Section Head', 'common'),
(18, 'robby', '$2y$10$K50GpYHJ2yyutSX/MEmGw.mysR8tQh5UV1TvLKn1Qt9g2fDUNRyRC', 'Robby Cahyadi', 'Engser Casting', 'NonShift', 'Staff', 'common'),
(19, 'ipul', '$2y$10$oi/XVD3CLY0A2/523/nfrej.g82qlXjenoXahpTsN.OLGZpZYW3EW', 'Andi Rustandi', 'Logistic Operational', 'Red', 'Line Head', 'common'),
(20, 'purnomo.cb', '$2y$10$DMMlK0tR54IRuvjXNOX7E.ms4./gZpC54TQUmWy6BWvFWJgLWJ3ka', 'Purnomo Wahyudin', 'Cylinder Block', 'White', 'Line Head', 'public'),
(21, 'purnomo.cr', '$2y$10$sF3vC1YVdRbgDPqYbOlrj.zctWK.zU7qgxOa04TxbEMvitXobuqtG', 'Purnomo Wahyudin', 'Cylinder Block', 'White', 'Line Head', 'public'),
(22, 'jhon.ca', '$2y$10$fuST5CXiri3z7rfeqNrJ3.WzgbJhjCYmhtk6.0uju9UkxilnBfuN6', 'Yohanes F.H', 'Camshaft', 'White', 'Line Head', 'public'),
(23, 'jhon.ch', '$2y$10$qbOn73AYCpy/xi702yqRde11KOc2TkRnabw7ShouuJNJcLJl0qrQ2', 'Yohanes F.H', 'Cylinder Head', 'White', 'Line Head', 'public'),
(24, 'purwanto', '$2y$10$okhdsvQcx6kVjGCtKKYgv.N.ypdUarJeDglGBKsA9L2GDeZRwaE4a', 'Purwanto', 'Sub Line', 'White', 'Line Head', 'common'),
(25, 'bambang', '$2y$10$1wjrklxh20QtemGw5DTRAOjtnAsTIesUHcQA8d0lA9n/vVVLDqfra', 'Bambang Supriyono', 'Main Line', 'White', 'Line Head', 'common'),
(26, 'yunizar', '$2y$10$vt/Hv08xl5rh5suYdMMPOuK3OKSXsMJUdtT02exf14kfTfRj1fqMS', 'Yunizar', 'Main Line', 'Red', 'Line Head', 'common'),
(27, 'waryo', '$2y$10$NITwce8kLLqs02kGlVUTZeiKI57D2v1.Mvwx8zZbiS7pYmi4vKQc.', 'Waryo Sutoto', 'Sub Line', 'Red', 'Line Head', 'common'),
(28, 'prima', '$2y$10$i7c/9ombLo3E6mIPMIS5TeuS2DxNAGbylDElL05RgbDfOUDymclFi', 'Primaantara Rezky D.A', 'Technical Support', 'NonShift', 'Line Head', 'common'),
(29, 'triyanto', '$2y$10$OnANkZEo.WdFqwen6JOvau/decD4FT1suVIH5uNWYuFsXYQu0/n9i', 'Triyanto', 'Low Pressure', 'Red', 'Line Head', 'public'),
(30, 'buset', '$2y$10$t1hjv1RbaM.I3aK0XcsJqew2u32q68nutEqyJR270P38OgCPaMy7O', 'Budi Setiya', 'Low Pressure', 'White', 'Line Head', 'public');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
