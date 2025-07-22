-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2024 at 04:44 PM
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
-- Database: `order-food`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(2, 'Eyad ', 'EyadElwakeel', '202cb962ac59075b964b07152d234b70'),
(3, 'Eyad ', 'EyadElwakeel', '202cb962ac59075b964b07152d234b70'),
(7, 'dena', 'dena', '202cb962ac59075b964b07152d234b70'),
(10, 'emad', 'emad12345', '8a94c4f2dd83b64ee9c2a79f54aba4ba'),
(11, 'admin', 'admin', '202cb962ac59075b964b07152d234b70'),
(12, 'rr', 'rr', '2fb1c5cf58867b5bbc9a1b145a86f3a0'),
(14, 'yy', 'yy', '2fb1c5cf58867b5bbc9a1b145a86f3a0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `img_name`, `featured`, `active`) VALUES
(46, 'Pizza', 'food_category_638.jpg', 'yes', 'yes'),
(47, 'Burger', 'food_category_473.jpg', 'yes', 'yes'),
(48, 'Fishes', 'food_category_358.jpg', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `img_name`, `category_id`, `featured`, `active`) VALUES
(32, 'fish 1', 'Eveniet saepe ea se', 706, 'food-name_10448.jpg', 48, 'Yes', 'Yes'),
(36, 'fish 2', 'Voluptatem autem asp', 716, 'food-name_10021.jpg', 48, 'Yes', 'Yes'),
(37, 'fish 3', 'Necessitatibus cupid', 932, 'food_10678.jpg', 48, 'Yes', 'Yes'),
(42, 'pizza 1', 'Eum dolor autem corp', 262, 'food-name_10914.jpg', 46, 'Yes', 'Yes'),
(43, 'pizza 2', 'Sit in dolor eum sin', 814, 'food-name_10122.jpg', 46, 'Yes', 'Yes'),
(44, 'pizza 3', 'Nostrud iste alias c', 500, 'food-name_10988.jpg', 48, 'Yes', 'Yes'),
(45, 'Burger 1', 'Quia ea illum cupid', 915, 'food-name_10501.jpg', 47, 'Yes', 'Yes'),
(46, 'Burger 2', 'Sed nostrum facere d', 580, 'food_10071.jpg', 47, 'Yes', 'Yes'),
(47, 'Burger 3', 'Ea delectus ut solu', 900, 'food-name_10640.jpg', 47, 'Yes', 'Yes'),
(48, 'Vel sit sint porro ', 'Nesciunt voluptate ', 200, 'food-name_10293.jpg', 47, 'Yes', 'Yes'),
(49, 'Irure mollit lorem u', 'Debitis aperiam a qu', 260, 'food-name_10067.jpg', 46, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(150) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `sale` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `sale`) VALUES
(1, 'pizza 3', 641, 4, 2564, '2024-07-11 21:33:41', 'under construction', 'Eyad Elwakeel', '01011588455', 'eyadelwakeel3@gmail.com', 'المنزلة دقهلية بجوار صيدليه سارة البلقا ', 0),
(2, 'Burger 2', 581, 2, 1162, '2024-07-11 21:34:18', 'on Delivery', 'Eagan Ferguson', '+1 (357) 168-1149', '0', 'Magni consequatur la', 0),
(3, 'fish 3', 932, 4, 3728, '2024-07-11 21:35:10', 'Delivered', 'Charlotte Boyle', '+1 (802) 741-5039', '0', 'Porro ipsa doloremq', 0),
(4, 'Burger 1', 915, 4, 3660, '2024-07-11 21:35:48', 'on Delivery', 'Candace Wiley', '+1 (978) 802-1908', '', 'Qui est exercitation', 0),
(5, 'Burger 3', 907, 1, 907, '2024-07-11 21:44:26', 'under construction', 'Lillian Sweet', '+1 (928) 429-000', 'lakonu@mailinator.com', 'Irure non expedita i', 0),
(9, 'Burger 3', 900, 1, 900, '2024-07-14 02:24:04', 'on Delivery', 'Callum Mcleod', '+1 (278) 575-4157', 'zyve@mailinator.com', 'Aliquam omnis nulla ', 0),
(10, 'Vel sit sint porro ', 200, 3, 546, '2024-07-17 04:23:35', 'under construction', 'Gary Craft', '+1 (195) 143-8606', 'qalycyki@mailinator.com', 'Sint aperiam id dol', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
