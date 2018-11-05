-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2018 at 05:22 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blackjack_delivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `email`, `is_deleted`) VALUES
(1, 'Kenji', 'kenji', '$2y$10$yFbuud04AMX0hfCamx4vd.2ZGiyc5yrQjQfQ8xdg34CPWo2U.zq96', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(11) NOT NULL,
  `ongkir_setting_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL DEFAULT '',
  `shipping_address` text NOT NULL,
  `shipping_method` varchar(20) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `ongkir_setting_id`, `customer_name`, `shipping_address`, `shipping_method`, `order_date`) VALUES
(1, 1, 'Kenji Prahyudi', 'Jl. Jend Sudirman 503', 'GOJEK', '2018-11-04 15:44:49'),
(2, 1, 'Kenji Prahyudi', 'Jl. Jend Sudirman 503', 'GOJEK', '2018-11-04 15:45:27'),
(3, 1, 'Kenji Prahyudi', 'Jl. Jend Sudirman 503', 'GOJEK', '2018-11-04 15:46:37'),
(4, 1, 'Kenji Prahyudi', 'Jl. Jend Sudirman 503', 'GOJEK', '2018-11-04 15:47:20'),
(5, 1, 'Kenji Prahyudi', 'Jl. Jend Sudirman 503', 'GOJEK', '2018-11-04 15:47:34'),
(6, 1, 'Kenji Prahyudi', 'Jl. Jend Sudirman 503', 'GOJEK', '2018-11-04 15:48:02'),
(7, 1, 'Kenji Prahyudi', 'Jl. Jend Sudirman 503', 'GOJEK', '2018-11-04 15:49:14'),
(8, 1, 'Kenji Prahyudi', 'Jl. Jend Sudirman 503', 'GOJEK', '2018-11-04 15:50:36'),
(9, 2, 'Kenji Prahyudi', 'Jl. Jend Sudirman 503', 'TIKI', '2018-11-05 20:24:43'),
(10, 2, 'Kenji Prahyudi', 'Jl. Jend Sudirman 503', 'TIKI', '2018-11-05 20:26:14'),
(11, 2, 'Kenji Prahyudi', 'Jl. Jend Sudirman 503', 'TIKI', '2018-11-05 20:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `image_path` text NOT NULL,
  `sub_name_1` varchar(20) NOT NULL DEFAULT '',
  `sub_name_2` varchar(20) NOT NULL DEFAULT '',
  `description_long` text NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `created_by` varchar(20) NOT NULL DEFAULT '',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(20) NOT NULL DEFAULT '',
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `image_path`, `sub_name_1`, `sub_name_2`, `description_long`, `stock`, `price`, `created_by`, `created_date`, `updated_by`, `updated_date`, `is_deleted`) VALUES
(1, 'Oppo F7', 'img/upload/1/default.jpg', '', 'RAM 4GB', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 22, 200000, 'kenji', '2018-11-03 21:47:34', 'kenji', '2018-11-05 20:24:10', 0),
(2, 'galaxy tab', 'img/upload/2/default.jpg', '6GB', '1GB', 'test', 10, 2400000, 'kenji', '2018-11-04 14:13:52', 'kenji', '2018-11-04 15:31:17', 0),
(3, 'Tiramisu Frostie', 'img/upload/3/default.jpg', '480ml', 'enak', 'enak bingitssss hohoho satu dua tiga lorem ipsum dolor sit amet blablablablablabla baa baa black sheep have you any wooooolll', 3, 28000, 'kenji', '2018-11-04 14:15:50', 'kenji', '2018-11-05 15:50:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ongkir_setting`
--

CREATE TABLE `ongkir_setting` (
  `id` int(11) NOT NULL,
  `minimum_order` int(11) NOT NULL DEFAULT '0',
  `free_value` int(11) NOT NULL DEFAULT '0',
  `per_price` int(11) NOT NULL DEFAULT '0',
  `maximum_free` int(11) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `created_by` varchar(20) NOT NULL DEFAULT '',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir_setting`
--

INSERT INTO `ongkir_setting` (`id`, `minimum_order`, `free_value`, `per_price`, `maximum_free`, `description`, `created_by`, `created_date`) VALUES
(1, 100000, 10000, 100000, 50000, '', '', '2018-11-03 21:17:17'),
(2, 100000, 10000, 100000, 50000, '', '', '2018-11-05 20:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `customer_order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `customer_order_id`, `item_id`, `quantity`, `price`) VALUES
(1, 2, 3, 2, 28000),
(2, 3, 3, 2, 28000),
(3, 4, 3, 2, 28000),
(4, 5, 3, 2, 28000),
(5, 6, 3, 2, 28000),
(6, 7, 3, 2, 28000),
(7, 8, 3, 4, 28000),
(8, 9, 1, 1, 200000),
(9, 9, 3, 1, 28000),
(10, 10, 1, 1, 200000),
(11, 10, 3, 1, 28000),
(12, 11, 1, 1, 200000),
(13, 11, 3, 1, 28000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ongkir_setting`
--
ALTER TABLE `ongkir_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ongkir_setting`
--
ALTER TABLE `ongkir_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
