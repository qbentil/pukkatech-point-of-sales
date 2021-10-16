-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 02:21 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+2:00";


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
(2, 'HAOJUE', '1'),
(4, 'SAMSUNG', '1'),
(6, 'TECHNO', '1');

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
(4, 'Spare Parts', '1'),
(5, 'Building Materials', '1'),
(6, 'Mobile Phone', '1'),
(11, 'Home Appliances', '1');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `vendor` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `net_total` decimal(10,2) NOT NULL,
  `payment_method` varchar(25) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `vendor`, `customer_name`, `customer_phone`, `subtotal`, `discount`, `net_total`, `payment_method`, `order_date`) VALUES
(18, 2, 'Amankwah Kingsley', '1234567890', '76000.00', '0.50', '75620.00', 'momo', '2020-10-30'),
(19, 4, 'Stephen Jobs', '0205678931', '6170.00', '0.15', '6160.75', 'cheque', '2020-10-31'),
(20, 4, 'Joan Doe', '0050102812', '999.90', '0.00', '999.90', 'momo', '2020-10-31'),
(22, 2, 'John Cena', '0987654321', '95.00', '0.00', '95.00', 'cash', '2020-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `description`, `date`) VALUES
(1, 'Admin Login', '2020-11-16');

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

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `iid`, `pid`, `qty`) VALUES
(31, 18, 20, 10),
(32, 19, 51, 2),
(33, 19, 30, 1),
(34, 19, 55, 1),
(35, 20, 59, 1),
(37, 22, 46, 1);

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
(2, 2, 1, 'AP 110-88', 36, '3500.00', '3150.00', '2020-09-19'),
(5, 2, 1, 'AP 125-19(STAR)', 18, '3600.00', '3250.00', '2020-09-20'),
(6, 2, 1, 'AP 125-30 (ALUBA)', 50, '4250.00', '3850.00', '2020-09-20'),
(7, 2, 1, 'AP 150-66', 50, '3200.00', '2950.00', '2020-09-20'),
(8, 2, 1, 'AP 125-8   ', 50, '3700.00', '3350.00', '2020-09-20'),
(10, 2, 1, 'AP 125-A', 5, '3300.00', '3050.00', '2020-10-23'),
(11, 2, 1, 'AP 150-60', 50, '4100.00', '3800.00', '2020-09-20'),
(12, 2, 1, 'AP 150N (YOROBO)', 50, '4100.00', '3800.00', '2020-09-20'),
(15, 2, 1, 'AP200GY-7', 50, '5000.00', '4600.00', '2020-09-20'),
(17, 2, 1, 'AP Z-ONE 170', 49, '5300.00', '5050.00', '2020-09-20'),
(18, 2, 1, 'AP125-50', 50, '4200.00', '3800.00', '2020-09-20'),
(19, 3, 1, 'AP 150ZH-175 ', 0, '8200.00', '7500.00', '2020-11-18'),
(20, 3, 1, 'AP150ZH-20(A)', 40, '7600.00', '6600.00', '2020-09-20'),
(21, 3, 1, 'AP150ZH-20(AH)', 50, '7900.00', '6900.00', '2020-09-20'),
(22, 3, 1, 'AP150ZH-20(H)', 50, '7900.00', '6900.00', '2020-09-20'),
(23, 3, 1, 'AP 150ZH-Q7', 50, '9300.00', '8600.00', '2020-09-20'),
(24, 3, 1, 'AP200ZH-A ', 50, '9500.00', '8500.00', '2020-09-20'),
(25, 3, 1, 'AP150-200ZH-200', 50, '9600.00', '8900.00', '2020-09-20'),
(26, 3, 1, 'AP 150ZK ', 50, '7600.00', '6800.00', '2020-09-20'),
(27, 3, 1, 'AP150ZH-200 ', 50, '9600.00', '8900.00', '2020-09-20'),
(28, 2, 2, 'HJ 125 – 8 New ', 50, '5200.00', '5000.00', '2020-09-20'),
(30, 4, 2, 'HJ EG 125N', 49, '5000.00', '4800.00', '2020-11-18'),
(31, 1, 0, 'Multi Double Socket ', 45, '13.00', '11.00', '2020-09-20'),
(32, 1, 0, 'I Gug 2 way switch - UK', 50, '7.00', '4.30', '2020-09-20'),
(33, 1, 0, '2 Gang 2 way switch - UK', 50, '9.00', '4.80', '2020-09-20'),
(34, 1, 0, '3 Gang 2 way switch - UK', 50, '12.00', '6.00', '2020-09-20'),
(35, 1, 0, '3 Gang 2 way switch - British', 50, '8.00', '6.00', '2020-09-20'),
(36, 1, 0, '2 Gang 2 way switch - British', 50, '6.00', '4.00', '2020-09-20'),
(37, 1, 0, 'AC switch', 44, '25.00', '11.00', '2020-09-20'),
(38, 1, 0, 'TV Sockect', 50, '8.00', '5.00', '2020-09-20'),
(39, 1, 0, '3x3 Partress box', 50, '2.00', '1.30', '2020-09-20'),
(40, 1, 0, '3X6 Patress box', 50, '2.50', '2.00', '2020-09-20'),
(41, 1, 0, '3x3 Conduct Box', 50, '2.50', '1.60', '2020-09-20'),
(42, 1, 0, 'Straight Lamp Holder', 45, '2.50', '2.20', '2020-09-20'),
(43, 1, 0, 'Hanging Holder', 50, '2.50', '2.20', '2020-09-20'),
(44, 1, 0, 'PVC Pipe- normal', 50, '4.50', '2.90', '2020-09-20'),
(45, 1, 0, '1.5mm Red - Turkey', 47, '95.00', '77.00', '2020-09-20'),
(46, 1, 0, '1.5mm Black', 49, '95.00', '77.00', '2020-09-20'),
(47, 1, 0, '2.5mm Red - Turkey', 50, '135.00', '115.00', '2020-09-20'),
(48, 1, 0, '2.5mm Black', 50, '135.00', '115.00', '2020-09-20'),
(49, 1, 0, '2.5mm Yellow', 50, '153.00', '115.00', '2020-09-20'),
(50, 1, 0, '4mm Red - Turkey', 50, '210.00', '187.00', '2020-09-20'),
(51, 1, 0, '4mm Black', 48, '210.00', '187.00', '2020-09-20'),
(52, 1, 0, '4mm Yellow', 46, '210.00', '187.00', '2020-09-20'),
(53, 1, 0, '10mm Red - Turkey', 45, '500.00', '492.00', '2020-09-20'),
(54, 1, 0, '10mm Cable Black Turkey', 50, '500.00', '492.00', '2020-09-20'),
(55, 1, 0, '16mm Cable Red Turkey', 9, '750.00', '690.00', '2020-10-23'),
(56, 1, 0, '16mm Black Cable - Turkey', 48, '750.00', '690.00', '2020-09-20'),
(57, 1, 0, '4 Way Single Face ', 47, '150.00', '135.00', '2020-09-20'),
(58, 6, 4, 'Samsung A30', 4, '1100.00', '950.00', '2020-10-31'),
(59, 6, 4, 'Samsung Galaxy S9', 24, '999.90', '899.00', '2020-10-31');

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
(2, 'Admin', 'Bentil', 'admin@test.com', '1234567890', 'P.O.Box NT33, New Tafo - Kumasi', 'Admin', 'Admin', '1', '2020-09-08'),
(3, 'Mann', 'Bentil', 'employee1@test.com', '0547338172', 'Ayawaso South', 'sUtfc7lEWI', 'Employee', '1', '2020-09-19'),
(4, 'Mann', 'Richard', 'mann@test.com', '0501028071', 'Dansoman, Accra', 'Mann@ims1', 'Employee', '1', '2020-10-31');

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
-- Indexes for table `logs`
--
ALTER TABLE `logs`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
