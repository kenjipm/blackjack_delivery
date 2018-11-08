-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2018 at 08:19 AM
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
(1, 'Kenji', 'kenji', '$2y$10$yFbuud04AMX0hfCamx4vd.2ZGiyc5yrQjQfQ8xdg34CPWo2U.zq96', '', 0),
(2, 'Vanji', 'vanji', '', '', 0),
(3, 'Reza', 'reza', '', '', 0),
(4, 'Dini', 'dini', '', '', 0),
(5, 'Cika', 'cika', '', '', 0),
(6, 'Adrian', 'adrian', '', '', 0);

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
(12, 3, '', '', 'GOJEK', '2018-11-06 10:59:11'),
(13, 3, 'Kenji', 'Jl. Jendral Sudirman 503', 'GOJEK', '2018-11-06 11:00:00'),
(14, 3, 'Kenji', 'Jl. Jendral Sudirman 503', 'GOJEK', '2018-11-06 11:00:38'),
(15, 3, 'Kenji', 'Jl. Jendral Sudirman 503', 'GOJEK', '2018-11-06 11:01:08'),
(16, 3, 'Kenji', 'Jl. Jendral Sudirman 503', 'TIKI', '2018-11-06 12:28:32'),
(17, 3, 'Kenji Prahyudi', 'Jl. Jendral Sudirman 503', 'GOJEK', '2018-11-06 12:29:28'),
(18, 3, 'Vanj', 'Di blackjack itu sendiri', 'GOJEK', '2018-11-06 20:08:50'),
(19, 3, 'Kenji Prahyudi', 'Jl. Jendral Sudirman 503', 'GOJEK', '2018-11-06 20:34:15'),
(20, 3, 'Kenji Prahyudi', 'Jl. Jendral Sudirman 503', 'GOJEK', '2018-11-06 20:34:39'),
(21, 3, 'Kenji Prahyudi', 'Jl. Jendral Sudirman 503', 'GOJEK', '2018-11-06 20:34:56'),
(22, 3, 'Kenji Prahyudi', 'Jl. Jendral Sudirman 503', 'GOJEK', '2018-11-06 20:36:06'),
(23, 3, 'Kenji Prahyudi', 'Jl. Jendral Sudirman 503', 'GOJEK', '2018-11-06 20:36:55'),
(24, 3, 'Kenji Prahyudi', 'Jl. Jendral Sudirman 503', 'GOJEK', '2018-11-06 20:50:28');

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
  `is_new` tinyint(1) NOT NULL DEFAULT '0',
  `is_best_seller` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` varchar(20) NOT NULL DEFAULT '',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(20) NOT NULL DEFAULT '',
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `image_path`, `sub_name_1`, `sub_name_2`, `description_long`, `stock`, `price`, `is_new`, `is_best_seller`, `created_by`, `created_date`, `updated_by`, `updated_date`, `is_deleted`) VALUES
(4, 'Tiramisu Frostie', 'img/upload/4/default.jpg', '480ml', '', 'Frostie rasa Tiramisu', 10, 28000, 1, 1, 'kenji', '2018-11-06 09:08:09', 'kenji', '2018-11-06 20:50:28', 0),
(5, 'Galaxy Tab 3', 'img/upload/5/default.jpg', 'RAM 4GB', 'ROM 8GB', 'Tahun 2016 tapi masih bagus', 1, 250000, 0, 1, 'kenji', '2018-11-06 10:22:12', 'kenji', '2018-11-06 20:08:51', 0),
(6, 'Samsung J5 Putih', 'img/upload/6/default.jpg', 'RAM 4GB', 'ROM 16GB', 'Edisi tahun 2018, bagus', 0, 240000, 1, 0, 'kenji', '2018-11-06 10:24:35', 'kenji', '2018-11-06 12:28:32', 0),
(7, 'Samsung J5 Silver', 'img/upload/7/default.jpg', 'RAM 4GB', 'ROM 16GB', 'Edisi tahun 2018, bagus', 0, 240000, 1, 1, 'kenji', '2018-11-06 10:25:01', 'kenji', '2018-11-06 11:49:33', 0);

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
(3, 100000, 10000, 100000, 50000, '', 'kenji', '2018-11-06 10:59:00');

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
(14, 15, 7, 1, 240000),
(15, 16, 6, 1, 240000),
(16, 17, 4, 1, 28000),
(17, 18, 4, 2, 28000),
(18, 18, 5, 1, 250000),
(19, 19, 4, 1, 28000),
(20, 20, 4, 1, 28000),
(21, 21, 4, 1, 28000),
(22, 22, 4, 1, 28000),
(23, 23, 4, 1, 28000),
(24, 24, 4, 1, 28000);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ongkir_setting`
--
ALTER TABLE `ongkir_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
