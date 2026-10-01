-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2026 at 05:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_tfa4`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES
(1, 'Janyrose Guelas', 'janyxgarcia@gmail.com', '0917-123-4567', '2026-09-19 18:24:38'),
(2, 'Erinch Nichole Pacheco', 'erinchpacheco@gmail.com', '0918-234-5678', '2026-09-19 18:24:38'),
(3, 'Carlo Reyes', 'carloreyes@gmail.com', '0919-345-6789', '2026-09-19 18:24:38'),
(4, 'Angela Garcia', 'angelagarcia@gmail.com', '0920-456-7890', '2026-09-19 18:24:38'),
(5, 'Paolo Mendoza', 'paolomendoza@gmail.com', '0921-567-8901', '2026-09-19 18:24:38'),
(6, 'Janyrose Guelas', 'jgguelas@fit.edu.ph', '0917-555-2486', '2026-10-01 10:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `password`, `avatar`, `created_at`) VALUES
(1, 'admin01', 'Andrea Lim', '$2y$10$cDNPxisljPWBj5SEqKpzQ.7qKLaffE/SmpRA.I48ovuphCL7hk2aq', NULL, '2026-09-19 18:31:05'),
(2, 'cashier01', 'Joshua Flores', '$2y$10$cDNPxisljPWBj5SEqKpzQ.7qKLaffE/SmpRA.I48ovuphCL7hk2aq', NULL, '2026-09-19 18:31:05'),
(3, 'cashier02', 'Nicole Ramos', '$2y$10$cDNPxisljPWBj5SEqKpzQ.7qKLaffE/SmpRA.I48ovuphCL7hk2aq', NULL, '2026-09-19 18:31:05'),
(4, 'manager01', 'Mark Villanueva', '$2y$10$cDNPxisljPWBj5SEqKpzQ.7qKLaffE/SmpRA.I48ovuphCL7hk2aq', NULL, '2026-09-19 18:31:05'),
(5, 'staff01', 'Sofia Navarro', '$2y$10$cDNPxisljPWBj5SEqKpzQ.7qKLaffE/SmpRA.I48ovuphCL7hk2aq', NULL, '2026-09-19 18:31:05'),
(6, 'jguelas26', 'Janyrose Guelas', '$2y$10$cDNPxisljPWBj5SEqKpzQ.7qKLaffE/SmpRA.I48ovuphCL7hk2aq', '1790854191_00378b535d46dfae752b.jpg', '2026-10-01 11:03:03'),
(7, 'teststaff01', 'Maria Santos', '$2y$10$8xzLDKXZJCnk6y24s.M.W.B5d7SlmGiQuHd6fqSnOYOD3Jz7iPHgW', NULL, '2026-10-01 14:59:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
