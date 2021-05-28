-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 06:11 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keshmoon`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `weight`) VALUES
(20, 'پونه', 15000, 50),
(21, 'پونه', 15000, 60),
(22, 'پونه', 32000, 160),
(23, 'زعفران', 132000, 6),
(24, 'زعفران', 132000, 6),
(25, 'زعفران', 132000, 6),
(26, 'عسل', 132000, 500),
(27, 'عسل', 132000, 500),
(28, 'عسل', 132000, 500),
(29, 'زرشک', 132000, 500),
(30, 'زرشک', 132000, 500),
(31, 'زرشک', 132000, 500),
(32, 'آلو', 132000, 500),
(33, 'آلو', 132000, 500),
(34, 'سبزی', 125000, 1000),
(35, 'نعنا', 30000, 200),
(36, 'درخت', 15000, 1000),
(37, 'یاس', 15000, 100),
(38, 'یاس', 15000, 10),
(40, 'ذرت', 30000, 500),
(41, 'ذرت', 30000, 600),
(42, 'ذرت', 15000, 100),
(43, 'دارچین', 16000, 100),
(44, 'ذرت', 132000, 3000),
(45, 'نوتلا', 18000, 200),
(46, 'سیر', 45000, 200);

-- --------------------------------------------------------

--
-- Table structure for table `prod_ware`
--

CREATE TABLE `prod_ware` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prod_ware`
--

INSERT INTO `prod_ware` (`id`, `product_id`, `warehouse_id`, `quantity`) VALUES
(11, 20, 1, 1),
(12, 21, 2, 1),
(13, 22, 7, 1),
(14, 23, 3, 1),
(15, 24, 4, 1),
(16, 25, 10, 1),
(17, 26, 8, 1),
(18, 27, 9, 1),
(19, 28, 4, 1),
(20, 29, 2, 1),
(21, 30, 5, 1),
(22, 31, 8, 1),
(23, 32, 10, 1),
(24, 33, 7, 1),
(25, 34, 4, 1),
(26, 35, 11, 1),
(27, 36, 11, 1),
(28, 37, 10, 1),
(29, 37, 1, 1),
(30, 37, 3, 1),
(31, 38, 1, 1),
(59, 40, 1, 56),
(60, 42, 1, 35),
(61, 43, 10, 54),
(62, 44, 1, 7),
(63, 45, 11, 9),
(64, 46, 12, 46),
(65, 46, 11, 23);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `name`, `city`, `address`, `tel`) VALUES
(1, 'انبار رشت 1', 'رشت', 'رشت، مطهری', '0121231415'),
(2, 'انبار اصفهان', 'اصفهان', 'اصفهان، انقلاب', '0131551425'),
(3, 'انبار رشت 2', 'رشت', 'رشت، گیل', '0165554785'),
(4, 'انبار تهران مرکزی', 'تهران', 'تهران، انقلاب', '0212562525'),
(5, 'انبار تهران غرب', 'تهران', 'تهران، شهرک غرب', '0212569668'),
(7, 'انبار شیراز مرکزی', 'شیراز', 'شیراز یکجایی', '0986542514'),
(8, 'انبار اراک', 'اراک', 'اراک حومه', ''),
(9, 'انبار یزد', 'یزد', 'یزد حومه', '0986698514'),
(10, 'انبار لاهیجان', 'لاهیجان', 'شیشه گران', '0986698514'),
(11, 'انبار گرگان', 'گرگان', 'گرگان یک خیابونی', '96385214'),
(12, 'انبار شیراز 3', 'شیراز', 'شیراز یکجایی', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prod_ware`
--
ALTER TABLE `prod_ware`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `prod_ware`
--
ALTER TABLE `prod_ware`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
