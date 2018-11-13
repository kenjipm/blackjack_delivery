-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2018 at 12:55 PM
-- Server version: 10.2.18-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u5524573_blackjack`
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
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `email`, `is_deleted`) VALUES
(1, 'Kenji', 'kenji', '$2y$10$yFbuud04AMX0hfCamx4vd.2ZGiyc5yrQjQfQ8xdg34CPWo2U.zq96', '', 0),
(2, 'Vanji', 'vanji', '$2y$10$BwmleIXRpJPt9zLCEFu9X./t1kXlD9WeDT47D/YPP/.TktIHpGTY6', '', 0),
(3, 'Reza', 'reza', '$2y$10$t.y2sKVSaVm59vYMxa7io.zG0JgJenev8qP2JgP0SfxKPDpifGvKO', '', 0),
(4, 'Dini', 'dini', '$2y$10$HZiXNeIiYfCFpNVNCRE15.7G87Axqw.zVNpXvmLcLyImeTox1m.4.', '', 0),
(5, 'Cika', 'cika', '$2y$10$pAQuQ46DVpmouyKhj5O4I.6FFczqe.MeQaN/RJiXoLypwkAn2ZC2q', '', 0),
(6, 'Adrian', 'adrian', '$2y$10$gNU1/Q7xXlUBCkOMTq9BjOsQKEoMZk.e052pyjAkxGUrcQGaZxTmG', '', 0);

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
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `stock` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL DEFAULT 0,
  `is_new` tinyint(1) NOT NULL DEFAULT 0,
  `is_best_seller` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(20) NOT NULL DEFAULT '',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(20) NOT NULL DEFAULT '',
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ongkir_setting`
--

CREATE TABLE `ongkir_setting` (
  `id` int(11) NOT NULL,
  `minimum_order` int(11) NOT NULL DEFAULT 0,
  `free_value` int(11) NOT NULL DEFAULT 0,
  `per_price` int(11) NOT NULL DEFAULT 0,
  `maximum_free` int(11) NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `created_by` varchar(20) NOT NULL DEFAULT '',
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir_setting`
--

INSERT INTO `ongkir_setting` (`id`, `minimum_order`, `free_value`, `per_price`, `maximum_free`, `description`, `created_by`, `created_date`) VALUES
(4, 100000, 10000, 100000, 50000, '', 'adrian', '2018-11-10 19:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `customer_order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `variables`
--

CREATE TABLE `variables` (
  `id` int(11) NOT NULL,
  `company_name` varchar(64) NOT NULL DEFAULT '',
  `whatsapp_no` varchar(16) NOT NULL DEFAULT '',
  `line_at_id` varchar(16) NOT NULL DEFAULT '',
  `whatsapp_message` text NOT NULL,
  `line_at_message` text NOT NULL,
  `help_title_1` varchar(256) NOT NULL DEFAULT '',
  `help_content_1` text NOT NULL,
  `help_title_2` varchar(256) NOT NULL DEFAULT '',
  `help_content_2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables`
--

INSERT INTO `variables` (`id`, `company_name`, `whatsapp_no`, `line_at_id`, `whatsapp_message`, `line_at_message`, `help_title_1`, `help_content_1`, `help_title_2`, `help_content_2`) VALUES
(1, 'BlackJack Delivery', '6289610083002', 'iaz8867u', 'Halo! Saya telah melakukan order melalui website [COMPANY_NAME] dengan detail pesanan sebagai berikut:\r\n\r\n[ORDERS]\r\n\r\nMohon dikabari secepatnya mengenai ketersediaan stok, ongkir, dan rekening transfernya. Terima kasih.', 'Halo! Saya telah melakukan order melalui website [COMPANY_NAME] dengan detail pesanan sebagai berikut:\r\n\r\n[ORDERS]\r\n\r\nMohon dikabari secepatnya mengenai ketersediaan stok, ongkir, dan rekening transfernya. Terima kasih.', 'Aplikasi apa ini?', 'BlackJack Delivery adalah aplikasi simpel yang memudahkan pemesanan barang dari toko kami.<br/><br/>\r\n							Dengan stok dan barang baru yang selalu di update, kamu bisa dengan mudah memilih barang mana saja yang <i>ready stock</i> tanpa harus menanyakan satu-satu.<br/>\r\n							Penjelasan barang pun tersedia di aplikasi ini.<br/>', 'Bagaimana cara memesannya?', 'Aplikasi ini menggunakan WhatsApp / Line untuk melakukan pemesanan, sehingga pastikan perangkat yang kamu gunakan terpasang aplikasi WhatsApp / Line (mobile / web).\r\n							<br/>\r\n							<ul>\r\n								<li>\r\n									Setelah memilih barang yang akan dipesan, klik tombol \"Hitung\" di bagian bawah, atau pada menu di atas.\r\n								</li>\r\n								<li>\r\n									Masukkan informasi nama dan alamat kirim lengkap, lalu klik tombol \"Pesan via WhatsApp\" / \"Pesan via Line\".\r\n								</li>\r\n								<li>\r\n									Pesan yang berisi detail pesanan akan terbuat otomatis, kamu tinggal menekan tombol kirim chat pada aplikasi WhatsApp / Line.\r\n								</li>\r\n								<li>\r\n									Kami akan mengonfirmasi kembali ketersediaan stok, serta menginformasikan ongkos kirim, nomor rekening, dan total yang harus dibayarkan.\r\n								</li>\r\n								<li>\r\n									Setelah pembayaran terkonfirmasi, kami akan segera memproses pesanan.\r\n								</li>\r\n							</ul>\r\n							<br/>\r\n							\r\n							<small>NB: Lokasi toko kami dekat dengan pilihan kurir yang kami sediakan, sehingga pesanan dapat kami proses dengan cepat.</small>');

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
-- Indexes for table `variables`
--
ALTER TABLE `variables`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ongkir_setting`
--
ALTER TABLE `ongkir_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `variables`
--
ALTER TABLE `variables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
