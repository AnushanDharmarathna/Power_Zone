-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 12:02 PM
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
-- Database: `power_zone`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `no` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `tel1` text NOT NULL,
  `tel2` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `uname` text NOT NULL,
  `upass` text NOT NULL,
  `plans` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`no`, `fname`, `lname`, `address`, `tel1`, `tel2`, `email`, `uname`, `upass`, `plans`) VALUES
(5, 'gnei', 'Zuhara', '118/E', '+94773262268', '+94773262268', 'gneizuhara@gmail.com', 'zuhara', '123', ''),
(19, 'dilmi', 'savishka', '46, Seargent S. Prentiss Drive Suite 300', 'bdgbg', 'bgbdg', 'gneizuhara@gmail.com', 'dilmi', 'dilmi', ''),
(61, 'gnei', 'Zuhara', '118/E', '+94773262268', '+94773262268', 'gneizuhara@gmail.com', 'miya', '123', 'Basic'),
(62, 'gnei', 'Zuhara', '118/E', '+94773262268', '+94773262268', 'gneizuhara@gmail.com', 'vdsv', 'vv', 'Basic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `uname(768)` (`no`),
  ADD UNIQUE KEY `username` (`no`),
  ADD KEY `uname` (`uname`(768));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
