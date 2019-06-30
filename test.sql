-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2019 at 03:30 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nadaf_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `description` text,
  `photo` text,
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `photo`, `date_time`) VALUES
(5, 'Nokia 8.1 ', '21,980.00', '12MP+13MP dual rear camera | 20MP front camera\r\n15.69 centimeters (6.18-inch) FHD+ multi-touch capacitive touchscreen with 1080 x 2246 pixels resolution and 18.7:9 aspect ratio\r\nMemory, Storage and SIM: 6GB RAM | 128GB internal memory expandable up to 400GB | Dual SIM (nano+nano) dual-standby (4G+4G)', '61sDH4MeM1L._SY741_.jpg', '0000-00-00 00:00:00'),
(9, 'SanDisk 64GB', '1,999.00 ', 'Infy Style Fashion Mall SanDisk 64GB Class 10 microSDXC Memory Card SanDisk 64GB Class 10 microSDXC Memory Card (KG01JK12)', '41flNfpUo1L._AC_SR160,160_.jpg', '0000-00-00 00:00:00'),
(10, 'ASUS VivoBooK Intel Core i5 8th Gen 14-inch Thin and Light Laptop', '39,990.00', 'Processor: 8th Gen Intel Core i5-8250U processor, 1.6GHz base processor speed\r\nOperating System: Preloaded Windows 10 Home with lifetime validity\r\nDisplay: 14-inch Full HD (1920x1080) display | Thin 7.1mm bezel and 73.8 percent screen-to-body ratio the NanoEdge display on X407 provides you with more screen area for more immersive viewing\r\nMemory & Storag', '41htW7trPPL._AC_UL436_.jpg', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
