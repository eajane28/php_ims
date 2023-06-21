-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 07:41 AM
-- Server version: 8.0.32
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` int NOT NULL,
  `bill_id` varchar(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `packingsize` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `bill_id`, `companyname`, `productname`, `unit`, `packingsize`, `price`, `qty`) VALUES
(17, '18', 'JK Holdings', 'Jungkook mug', 'box', '1', '650', '5'),
(18, '19', 'JK Holdings', 'Jungkook mug', 'box', '1', '650', '1');

-- --------------------------------------------------------

--
-- Table structure for table `billing_header`
--

CREATE TABLE `billing_header` (
  `id` int NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `bill_type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `billing_header`
--

INSERT INTO `billing_header` (`id`, `fullname`, `bill_type`, `date`, `bill_no`, `username`) VALUES
(18, 'lyca', 'Cash', '2023-06-03', '00018', 'admin'),
(19, 'megan', 'Cash', '2023-06-03', '00019', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `packingsize` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `companyname`, `productname`, `unit`, `packingsize`) VALUES
(4, 'JK Holdings', 'Jungkook mug', 'pcs', '235'),
(5, 'retsam and yaya company', 'Jungkook Fan', 'kg', '23'),
(6, 'JK Holdings', 'album', 'pcs', '10'),
(7, 'retsam and yaya company', 'light stick', 'pcs', '50'),
(8, 'JK Holdings', 'photo card', 'pcs', '3'),
(9, 'JK Holdings', 'Jungkook mug', 'box', '1'),
(10, 'Alturas', 'Tinytan Bears', 'pcs', '200'),
(11, 'Big HIt', 'Blue and Grey Album', 'pcs', '5'),
(12, 'retsam and yaya company', 'blackpink lightstick', 'pcs', '10');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `packingsize` varchar(255) NOT NULL,
  `qty` int NOT NULL,
  `price` float NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `companyname`, `productname`, `unit`, `packingsize`, `qty`, `price`, `type`, `date`, `username`) VALUES
(36, 'retsam and yaya company', 'light stick', 'pcs', '50', 30, 3000, 'Cash', '2023-06-02', 'admin'),
(37, 'JK Holdings', 'Jungkook mug', 'box', '1', 1000, 500, 'Cash', '2023-06-02', 'admin'),
(38, 'Alturas', 'Tinytan Bears', 'pcs', '200', 500, 600, 'Cash', '2023-06-04', 'admin'),
(39, 'Big HIt', 'Blue and Grey Album', 'pcs', '5', 1000, 1000, 'Cash', '2023-06-07', 'admin'),
(40, 'JK Holdings', 'Jungkook mug', 'pcs', '235', 500, 300, 'Cash', '2023-06-07', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `packingsize` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `companyname`, `productname`, `unit`, `packingsize`, `qty`, `price`) VALUES
(24, 'retsam and yaya company', 'light stick', 'pcs', '50', '24', 3500),
(25, 'JK Holdings', 'Jungkook mug', 'box', '1', '994', 650),
(26, 'Alturas', 'Tinytan Bears', 'pcs', '200', '500', 1000),
(27, 'Big HIt', 'Blue and Grey Album', 'pcs', '5', '1000', 1500),
(28, 'JK Holdings', 'Jungkook mug', 'pcs', '235', '500', 500);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int NOT NULL,
  `companyname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `companyname`, `firstname`, `lastname`, `mobileno`, `email`, `address`) VALUES
(2, 'JK Holdings', 'Jungkook', 'Jeon', '09282914758', 'jeonjungkook@gmail.com', 'Busan, South Korea'),
(3, 'retsam and yaya company', 'Lyca', 'Lague', '09282914758', 'lycalague@gmail.com', 'Guindaguitan, Dimiao, Bohol'),
(4, 'Alturas', 'John', 'Newton', '09668041906', 'johnnewton@gmail.com', 'Tagbilaran City, Bohol'),
(5, 'Big HIt', 'Bang', 'PD', '09109131141', 'PD@gmail.com', 'Seoul, Korea'),
(7, 'bangtan', 'shjdjhdkkww', 'shgdwhkkw', '091023564', 'ggg@', '');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int NOT NULL,
  `unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `unit`) VALUES
(3, 'kg'),
(6, 'pcs'),
(7, 'box'),
(8, 'lbs');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `id` int NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`id`, `firstname`, `lastname`, `username`, `password`, `role`, `status`) VALUES
(1, 'rhea jane', 'escalona', 'eajane', 'aehra', 'user', 'active'),
(3, 'admin', 'admin', 'admin', 'admin', 'admin', 'active'),
(7, 'Carl Anthony', 'Kapuno', 'ca_kapuno', 'carl', 'user', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_header`
--
ALTER TABLE `billing_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `billing_header`
--
ALTER TABLE `billing_header`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
