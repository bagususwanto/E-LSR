-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 03:02 PM
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
(3, 'bagus', '$2y$10$FZZeHmM.Q3VJAyfTOIqgee1owAqaW2RCVJ6XKMePao6/L.TtnCDMi', 'Bagus Uswanto', 'CCR & Oredering', 'Red', 'Team Member', 'dev'),
(4, 'hendro', '$2y$10$.z/UsSbhGj0HLY8NMrX6Su0g3xxFoKZHkeBuTb0plVeZGIUhZ9dQ.', 'Hendro Sujatmiko', 'CCR & Oredering', 'Red', 'Line Head', 'admin'),
(5, 'rasty', '$2y$10$JyEUSzjROkdLE8KXyu8H0.nXQ0x6mwsyIR7VYDRX5ErizrQHaRy/q', 'Dayudya Luthfiarasty', 'CCR & Oredering', 'Non Shift', 'Team Member', 'admin'),
(6, 'alex', '$2y$10$B8Elt4/WXJbXVL.CLjwZp.jqFOHJh/y7e0DNqOg01KfT2VRehSUNa', 'Alex Kurniawan', 'CCR & Oredering', 'Non Shift', 'Section Head', 'admin');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
