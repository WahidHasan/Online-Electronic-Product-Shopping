-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2019 at 08:01 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gearz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `email`, `password`) VALUES
(1, 'admin@d.com', '1234'),
(2, 'admin1@d.com', '1234'),
(3, 'admin2@d.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `delivary_details`
--

CREATE TABLE `delivary_details` (
  `serial` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivary_details`
--

INSERT INTO `delivary_details` (`serial`, `order_id`, `user_id`, `name`, `division`, `address`, `mobile`) VALUES
(5, '838232', 'e@d.com', 'Wahid', 'Dhaka', 'Puran Dhaka', '01515210000'),
(6, '825479', 'd@d.com', 'Raisa', 'Dhaka', 'Puran Dhaka', '01515216666');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `serial` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`serial`, `order_id`, `product_id`, `user_id`, `quantity`, `price`, `total`) VALUES
(8, '838232', 'p2', 'e@d.com', 1, 10999, 10999),
(9, '838232', 'p9', 'e@d.com', 1, 6000, 6000),
(10, '825479', 'p7', 'd@d.com', 1, 38000, 38000),
(11, '825479', 'p3', 'd@d.com', 1, 34576, 34576);

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `serial` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `item` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `total_cost` double NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`serial`, `order_id`, `user_id`, `item`, `total_quantity`, `total_cost`, `time`) VALUES
(3, '838232', 'e@d.com', 2, 2, 12000, 'Dec,02,2019 , 01:17:17 AM'),
(4, '825479', 'd@d.com', 2, 2, 69152, 'Dec,02,2019 , 01:20:50 AM');

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `p_id` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_type` text NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `p_details` text NOT NULL,
  `p_tag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`p_id`, `p_name`, `p_type`, `p_image`, `brand`, `price`, `quantity`, `date`, `p_details`, `p_tag`) VALUES
('p1', 'Mi 8 Lite', 'Mobile', '1554490424_mi8.jpg', 'Mi', 24000, 3, '05-04-19', '4 & 64 GB', 'New'),
('p2', 'Samsung Galaxy M10', 'Mobile', '1554491896_samsung_M10.jpg', 'Samsung', 10999, 3, '05-04-19', 'Ram:               2GB\r\nRom:               16GB\r\nProcessor:       Octa core, 1.6 GHz\r\nResolution:      5 Megapixel\r\nFeatures: 	In-display flash, f/2.0, HDR, bokeh & more\r\nVideo Recording: Full HD (1080p)\r\nBattery: Lithium-ion 3400 mAh (non-removable)', 'New'),
('p3', 'SONY BRAVIA 40\" Smart HDR TV', 'Smart TV', '1554492492_Sony_Bravia_Smart_TV.jpg', 'Sony', 34576, 5, '05-04-19', 'Size: 40\" Model: KDL40WE663\r\nFull HD 1080p\r\nPicture quality: Motionflow XR 400 Hz\r\nCatch-up TV & Streaming\r\nFreeview HD\r\nHDMI x 2', 'Electronics'),
('p4', 'Asus ROG GL552VW-CN624T Gaming', 'Laptop', '1555122508_asus_rog.jpg', 'Asus', 80000, 5, '13-04-19', 'Asus ROG GL552VW-CN624T Gaming Laptop - Intel Core i7-6700HQ, 15.6 Inch FHD, 1TB, 12GB, 4GB VGA-GTX960M, Win 10, Gray Metal ', 'Gaming Laptop'),
('p6', 'Acer Aspire A114-31-C014 14-inch Laptop', 'Laptop', '1555123403_acer.jpg', 'Acer', 65000, 4, '13-04-19', 'A great companion for school and office tasks, the Acer Aspire A114-31-C014 14\" Laptop packs an Intel Celeron processor for smooth program handling and a 64GB eMMC storage for saving important documents and media files. With an estimated battery life of up to 9 hours, this laptop has enough power to keep you connected for longer.', 'Old'),
('p7', 'LG Double Door Frost', 'Refrigerator', '1555123682_lg_refrigerator.jpg', 'LG', 38000, 5, '13-04-19', 'Model: GL-T432FBLN\r\n437 Litres DUAL Fridgeâ„¢ with Inverter Linear Compressor , Door Cooling+â„¢, Smart ThinQâ„¢ , Hygiene Fresh+, Auto Smart Connectâ„¢', 'Electronics'),
('p8', 'CANON EOS 80D', 'Camera', '1555124118_canon.jpg', 'Canon', 49000, 5, '13-04-19', 'EOS 80D EF-S 18-55mm f/3.5-5.6 IS STM Lens ', 'Electronics'),
('p9', 'Sony Wireless Headphone', 'Accessories', '1555125430_sony_hp.jpg', 'Sony', 6000, 3, '13-04-19', 'Sony Over Ear Noise Cancelling Wireless Headphone Android/iOS - Black WH1000XM2/B ', 'Wireless Headphone');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `fullname`, `email`, `password`, `gender`, `type`) VALUES
(1, 'abc', 'd@d.com', '1234', 'Female', 'user'),
(2, 'abcd', 'e@d.com', '1234', 'Male', 'user'),
(7, 'abcd', 'abcd@d.com', '1234', 'Male', 'user'),
(8, 'abc', 'abc@d.com', '1234', 'Male', 'user'),
(9, 'me', 'me@me.com', '1234', 'Male', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `delivary_details`
--
ALTER TABLE `delivary_details`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `delivary_details`
--
ALTER TABLE `delivary_details`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
