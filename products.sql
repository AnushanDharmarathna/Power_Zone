-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 02:56 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `price`, `image`) VALUES
(1, 'JYM Supplement Science Pro JYM Protein Powder', 'P1', 10.99, 'doc\\Supplements\\pro1.webp'),
(4, 'BODYBUILDING.COM SIGNATURE 100% WHEY PROTEIN POWDER', 'p2', 13.00, 'doc/Supplements/pro2.webp'),
(5, 'BODYBUILDING.COM SIGNATURE 100% WHEY ISOLATE', 'p3', 23.00, 'doc/Supplements/pro3.webp'),
(6, 'DYMATIZE ISO100 HYDROLYZED WHEY PROTEIN ISOLATE', 'p4', 16.20, 'doc/Supplements/pro4.webp'),
(7, 'BODYBUILDING.COM SIGNATURE CLEAR WHEY ISOLATE', 'p5', 11.00, 'doc/Supplements/pro5.webp'),
(8, 'BODYBUILDING.COM SIGNATURE CASEIN PROTEIN', 'p6', 12.20, 'doc/Supplements/pro6.webp'),
(9, 'BODYBUILDING.COM SIGNATURE MASS GAINER', 'p7', 15.00, 'doc/Supplements/pro7.webp'),
(10, 'RSP NUTRITION TRUEFIT GRASS-FED PROTEIN', 'p8', 24.00, 'doc/Supplements/pro8.webp'),
(11, 'KAGED WHEY PROTEIN ISOLATE', 'p9', 14.00, 'doc/Supplements/pro9.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
