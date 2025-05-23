-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2025 at 08:27 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbf2borgonia`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `employee_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `store_id` bigint(20) NOT NULL,
  `position` varchar(255) NOT NULL,
  `salary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `product_id` bigint(11) NOT NULL,
  `store_id` bigint(11) DEFAULT NULL,
  `quantity_in_stock` int(11) NOT NULL,
  `measurement` varchar(50) DEFAULT NULL,
  `bought_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `manufacturer` varchar(100) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT 1,
  `product_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`product_id`, `store_id`, `quantity_in_stock`, `measurement`, `bought_price`, `selling_price`, `manufacturer`, `category`, `expiration_date`, `isActive`, `product_name`) VALUES
(1, NULL, 14, '1L', '5.00', '15.00', 'Coca-Cola Company', 'Snacks', '2025-04-14', 1, 'Sprite'),
(2, NULL, 100, '500ml', '0.30', '0.75', 'Coca-Cola Co.', 'Beverages', '2025-12-31', 1, 'Coke Classic'),
(3, NULL, 200, '150g', '0.40', '1.00', 'PepsiCo', 'Snacks', '2025-08-15', 1, 'Lays Chips'),
(4, NULL, 50, '250ml', '2.00', '4.50', 'Procter & Gamble', 'Hygiene', '2026-01-01', 1, 'Head & Shoulders Shampoo'),
(5, NULL, 300, '100g', '0.50', '1.20', 'Unilever', 'Hygiene', '2026-05-20', 1, 'Dove Soap'),
(6, NULL, 80, '100g', '1.50', '3.00', 'Nestle', 'Beverages', '2025-10-10', 1, 'Nescafe Instant Coffee'),
(7, NULL, 150, '200g', '0.70', '1.80', 'Mondelez', 'Snacks', '2025-09-05', 1, 'Oreo Cookies'),
(8, NULL, 120, '75ml', '0.90', '2.20', 'Colgate-Palmolive', 'Hygiene', '2026-03-15', 1, 'Colgate Toothpaste'),
(9, NULL, 90, '1L', '0.60', '1.50', 'Danone', 'Beverages', '2025-11-30', 1, 'Evian Water'),
(10, NULL, 60, '42g', '0.30', '1.00', 'General Mills', 'Snacks', '2025-07-01', 1, 'Nature Valley Bar'),
(11, NULL, 70, '500ml', '1.80', '3.90', 'Johnson & Johnson', 'Hygiene', '2026-04-22', 1, 'Listerine Mouthwash');

-- --------------------------------------------------------

--
-- Table structure for table `tblstore`
--

CREATE TABLE `tblstore` (
  `store_id` bigint(20) NOT NULL,
  `store_owner_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `established_year` date NOT NULL DEFAULT current_timestamp(),
  `isActive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblstoreowner`
--

CREATE TABLE `tblstoreowner` (
  `store_owner_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `store_id` bigint(20) NOT NULL,
  `bir_tin` varchar(255) DEFAULT NULL,
  `dti_registration_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `user_id` bigint(20) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthdate` date NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `fk_user` (`user_id`),
  ADD KEY `fk_store` (`store_id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_store_product` (`store_id`);

--
-- Indexes for table `tblstore`
--
ALTER TABLE `tblstore`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `fk_store_owner` (`store_owner_id`);

--
-- Indexes for table `tblstoreowner`
--
ALTER TABLE `tblstoreowner`
  ADD PRIMARY KEY (`store_owner_id`),
  ADD KEY `fk_store_store_owner` (`store_id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblemployee`
--
ALTER TABLE `tblemployee`
  MODIFY `employee_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `product_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblstore`
--
ALTER TABLE `tblstore`
  MODIFY `store_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstoreowner`
--
ALTER TABLE `tblstoreowner`
  MODIFY `store_owner_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD CONSTRAINT `fk_store` FOREIGN KEY (`store_id`) REFERENCES `tblstore` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `tbluser` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD CONSTRAINT `fk_store_product` FOREIGN KEY (`store_id`) REFERENCES `tblstore` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblstore`
--
ALTER TABLE `tblstore`
  ADD CONSTRAINT `fk_store_owner` FOREIGN KEY (`store_owner_id`) REFERENCES `tblstoreowner` (`store_owner_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblstoreowner`
--
ALTER TABLE `tblstoreowner`
  ADD CONSTRAINT `fk_store_store_owner` FOREIGN KEY (`store_id`) REFERENCES `tblstore` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
