-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2024 at 09:41 AM
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
-- Database: `ezpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `C_id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`C_id`, `uid`, `item_id`) VALUES
(7, 2, 1),
(8, 2, 11),
(9, 2, 9),
(13, 2, 14),
(14, 2, 4),
(15, 2, 19);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'cpu', 'cpa best', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `socket` varchar(100) DEFAULT NULL,
  `mb_size` varchar(100) DEFAULT NULL,
  `ddr` int(11) DEFAULT NULL,
  `ram_speed` int(11) DEFAULT NULL,
  `nvme_slot` int(11) DEFAULT NULL,
  `ram_slot` int(11) DEFAULT NULL,
  `watt` int(11) DEFAULT NULL,
  `sata` int(11) DEFAULT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `ssd_type` varchar(100) DEFAULT NULL,
  `ssd_size` int(11) DEFAULT NULL,
  `pro_link_amz` varchar(256) DEFAULT NULL,
  `pro_link_flip` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `name`, `type`, `socket`, `mb_size`, `ddr`, `ram_speed`, `nvme_slot`, `ram_slot`, `watt`, `sata`, `photo`, `ssd_type`, `ssd_size`, `pro_link_amz`, `pro_link_flip`) VALUES
(1, 'rog mother board', 'motherboard', 'lga100', 'mini', 5, 5600, 2, 8, 80, 4, 'f1.jpg', NULL, NULL, 'https://amzn.in/d/8wRFtJt', NULL),
(3, 'MSI mother board', 'motherboard', 'am5', 'atx', 6, 7200, 2, 4, 60, 4, '', NULL, NULL, NULL, NULL),
(4, 'i5 10th', 'cpu', 'lga100', '', 0, 0, 0, 0, 75, 0, '', NULL, NULL, NULL, NULL),
(5, 'Ryzen 5', 'cpu', 'am5', '', 0, 0, 0, 0, 80, 0, '', NULL, NULL, NULL, NULL),
(8, 'crucial', 'ssd', '', '', 0, 0, 0, 0, 0, 0, '', 'sata', 1000, NULL, NULL),
(9, 'crucial', 'ssd', '', '', 0, 0, 0, 0, 0, 0, '', 'nvme', 1000, NULL, NULL),
(10, 'rog psu', 'psu', '', '', 0, 0, 0, 0, 550, 0, '', '', 0, NULL, NULL),
(11, 'msi psu', 'psu', '', '', 0, 0, 0, 0, 450, 0, '', '', 0, NULL, NULL),
(12, 'rog ex', 'psu', '', '', 0, 0, 0, 0, 1200, 0, '', '', 0, NULL, NULL),
(13, 'rog mini case', 'case', '', 'mini', 0, 0, 0, 0, 0, 0, '', '', 0, NULL, NULL),
(14, 'rog atx case', 'case', '', 'atx', 0, 0, 0, 0, 0, 0, '', '', 0, NULL, NULL),
(18, 'ram', 'ram', '', '', 5, 5600, 0, 0, 0, 0, '', '', 0, NULL, NULL),
(19, 'ram speed', 'ram', '', '', 6, 7200, 0, 0, 0, 0, '', '', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `description`, `price`, `image`, `created_at`) VALUES
(1, 'Rog cpu', 1, 'asdf', 20000.00, 'f8.jpg', '2024-09-07 05:51:04'),
(2, 'ram 16 gb', 1, 'ghghg', 444.00, 'f4.jpg', '2024-09-09 05:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `password`, `created_at`) VALUES
(2, 'Hari krishnan', 'Hari7109', 'harikrishnan7109@gmail.com', 'ass', '2024-09-21 11:32:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`C_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `C_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
