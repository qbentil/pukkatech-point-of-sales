-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2020 at 01:29 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `status`) VALUES
(0, '-', '1'),
(1, 'APSONIC', '1'),
(2, 'HAOJUE', '1');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`) VALUES
(1, 'General Electricals', '1'),
(2, 'Motorcycles', '1'),
(3, 'Tricycles', '1'),
(4, 'Spare parts', '1'),
(5, 'Building Materials', '1');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `vendor` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `discount` double NOT NULL,
  `net_total` decimal(10,2) NOT NULL,
  `payment_method` varchar(25) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `iid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cid`, `bid`, `product_name`, `stock`, `selling_price`, `cost_price`, `date_added`) VALUES
(1, 2, 1, 'AP 110', 48, '4000.00', '3700.00', '2020-09-19'),
(2, 2, 1, 'AP 110-88', 42, '3500.00', '3150.00', '2020-09-19'),
(3, 2, 1, 'AP 110-9', 47, '2800.00', '2550.00', '2020-09-19'),
(4, 2, 1, 'AP 125-18 (P/E)', 48, '3500.00', '3250.00', '2020-09-19'),
(5, 2, 1, 'AP 125-19(STAR)', 20, '3600.00', '3250.00', '2020-09-20'),
(6, 2, 1, 'AP 125-30 (ALUBA)', 50, '4250.00', '3850.00', '2020-09-20'),
(7, 2, 1, 'AP 150-66', 50, '3200.00', '2950.00', '2020-09-20'),
(8, 2, 1, 'AP 125-8   ', 50, '3700.00', '3350.00', '2020-09-20'),
(9, 2, 1, 'AP 125-9G', 50, '3500.00', '3200.00', '2020-09-20'),
(10, 2, 1, 'AP 125-A', 25, '3300.00', '3050.00', '2020-09-20'),
(11, 2, 1, 'AP 150-60', 50, '4100.00', '3800.00', '2020-09-20'),
(12, 2, 1, 'AP 150N (YOROBO)', 50, '4100.00', '3800.00', '2020-09-20'),
(13, 2, 1, 'AP 150X', 50, '4000.00', '3650.00', '2020-09-20'),
(14, 2, 1, 'AP 150X-II (Flecher II)', 50, '4150.00', '3900.00', '2020-09-20'),
(15, 2, 1, 'AP200GY-7', 50, '5000.00', '4600.00', '2020-09-20'),
(16, 2, 1, 'AP =200GY-3', 50, '5000.00', '4500.00', '2020-09-20'),
(17, 2, 1, 'AP Z-ONE 170', 50, '5300.00', '5050.00', '2020-09-20'),
(18, 2, 1, 'AP125-50', 50, '4200.00', '3800.00', '2020-09-20'),
(19, 3, 1, 'AP 150ZH-175 ', 50, '8200.00', '7500.00', '2020-09-20'),
(20, 3, 1, 'AP150ZH-20(A)', 50, '7600.00', '6600.00', '2020-09-20'),
(21, 3, 1, 'AP150ZH-20(AH)', 50, '7900.00', '6900.00', '2020-09-20'),
(22, 3, 1, 'AP150ZH-20(H)', 50, '7900.00', '6900.00', '2020-09-20'),
(23, 3, 1, 'AP 150ZH-Q7', 50, '9300.00', '8600.00', '2020-09-20'),
(24, 3, 1, 'AP200ZH-A ', 50, '9500.00', '8500.00', '2020-09-20'),
(25, 3, 1, 'AP150-200ZH-200', 50, '9600.00', '8900.00', '2020-09-20'),
(26, 3, 1, 'AP 150ZK ', 50, '7600.00', '6800.00', '2020-09-20'),
(27, 3, 1, 'AP150ZH-200 ', 50, '9600.00', '8900.00', '2020-09-20'),
(28, 2, 2, 'HJ 125 – 8 New ', 50, '5200.00', '5000.00', '2020-09-20'),
(29, 2, 0, 'HJ125 - 8 Star ', 50, '5200.00', '5000.00', '2020-09-20'),
(30, 2, 2, 'HJ EG 125N', 50, '5000.00', '4800.00', '2020-09-20'),
(31, 1, 0, 'Multi Double Socket ', 50, '13.00', '11.00', '2020-09-20'),
(32, 1, 0, 'I Gug 2 way switch - UK', 50, '7.00', '4.30', '2020-09-20'),
(33, 1, 0, '2 Gang 2 way switch - UK', 50, '9.00', '4.80', '2020-09-20'),
(34, 1, 0, '3 Gang 2 way switch - UK', 50, '12.00', '6.00', '2020-09-20'),
(35, 1, 0, '3 Gang 2 way switch - British', 50, '8.00', '6.00', '2020-09-20'),
(36, 1, 0, '2 Gang 2 way switch - British', 50, '6.00', '4.00', '2020-09-20'),
(37, 1, 0, 'AC switch', 50, '25.00', '11.00', '2020-09-20'),
(38, 1, 0, 'TV Sockect', 50, '8.00', '5.00', '2020-09-20'),
(39, 1, 0, '3x3 Partress box', 50, '2.00', '1.30', '2020-09-20'),
(40, 1, 0, '3X6 Patress box', 50, '2.50', '2.00', '2020-09-20'),
(41, 1, 0, '3x3 Conduct Box', 50, '2.50', '1.60', '2020-09-20'),
(42, 1, 0, 'Straight Lamp Holder', 50, '2.50', '2.20', '2020-09-20'),
(43, 1, 0, 'Hanging Holder', 50, '2.50', '2.20', '2020-09-20'),
(44, 1, 0, 'PVC Pipe- normal', 50, '4.50', '2.90', '2020-09-20'),
(45, 1, 0, '1.5mm Red - Turkey', 47, '95.00', '77.00', '2020-09-20'),
(46, 1, 0, '1.5mm Black', 50, '95.00', '77.00', '2020-09-20'),
(47, 1, 0, '2.5mm Red - Turkey', 50, '135.00', '115.00', '2020-09-20'),
(48, 1, 0, '2.5mm Black', 50, '135.00', '115.00', '2020-09-20'),
(49, 1, 0, '2.5mm Yellow', 50, '153.00', '115.00', '2020-09-20'),
(50, 1, 0, '4mm Red - Turkey', 50, '210.00', '187.00', '2020-09-20'),
(51, 1, 0, '4mm Black', 50, '210.00', '187.00', '2020-09-20'),
(52, 1, 0, '4mm Yellow', 48, '210.00', '187.00', '2020-09-20'),
(53, 1, 0, '10mm Red - Turkey', 47, '500.00', '492.00', '2020-09-20'),
(54, 1, 0, '10mm Cable Black Turkey', 50, '500.00', '492.00', '2020-09-20'),
(55, 1, 0, '16mm Cable Red Turkey', 49, '750.00', '690.00', '2020-09-20'),
(56, 1, 0, '16mm Black Cable - Turkey', 48, '750.00', '690.00', '2020-09-20'),
(57, 1, 0, '4 Way Single Face ', 50, '150.00', '135.00', '2020-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` enum('Admin','Employee') NOT NULL,
  `status` enum('0','1') NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `password`, `user_type`, `status`, `date_added`) VALUES
(1, 'John', 'Doe', 'employee@test.com', '0556844331', 'Manhyia North', 'employee', 'Employee', '1', '2020-09-08'),
(2, 'Admin', 'Default', 'admin@test.com', '0000000000', 'P.O.Box NT33, New Tafo- Kumasi', 'Admin', 'Admin', '1', '2020-09-08'),
(3, 'Quadjo', 'Bentil', 'employee1@test.com', '0547338172', 'Ayawaso South', 'sUtfc7lEWI', 'Employee', '1', '2020-09-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
