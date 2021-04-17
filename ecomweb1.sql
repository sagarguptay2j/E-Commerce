-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 01:31 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `sel_id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `sel_id`, `categories`, `status`) VALUES
(1, 4, 'cat8', '1'),
(5, 3, 'cat7', '1'),
(6, 1, 'cat90', '0');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(25) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `date_on` datetime NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `date_on`, `comment`) VALUES
(2, 'sagaa gupta', 'sagar@gmail.com', '0987654321', '2020-08-20 15:54:02', 'mnbvcxz'),
(3, 'amitkumar jaiswar', 'amit@gmail.com', '7083218709', '2020-08-07 15:55:37', 'pqrstuv'),
(4, 'chetan khairnar', 'chetan@gmail.com', '5469978123', '2020-08-15 15:56:33', 'product unavailable'),
(15, 'aniketjha', 'aniketjha@gmail.com', '123456790', '0000-00-00 00:00:00', 'abcdefgh'),
(18, 'john', 'john@gmail.com', '8963257410', '2020-09-07 03:49:46', 'bdnhdmfbh'),
(20, 'Aakash', 'Aakash@gmail.com', '7412589630', '2020-09-07 03:53:37', 'bnvhjgkmn'),
(21, 'roman', 'roman@gmail.com', '147852369', '2020-09-07 03:54:27', 'test'),
(22, 'dhoni', 'dhoni@gmail.com', '3698521470', '2020-09-07 03:56:22', 'nmjkl');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `sel_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `sel_id`, `username`, `password`) VALUES
(4, 0, 'sagar@gmail.com', '123'),
(5, 0, 'aakash@gmail.com', '123'),
(6, 0, 'sagar@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sel_id` int(11) NOT NULL,
  `address` varchar(256) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `order_status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `sel_id`, `address`, `city`, `pincode`, `payment_type`, `total_price`, `payment_status`, `order_status`, `added_on`) VALUES
(17, 1, 4, 'up add', 'up/up', 123012, 'COD', 42, 'success', 3, '2020-09-27 09:18:13'),
(18, 3, 4, 'delhi/delhi', 'thane', 421001, 'COD', 102, 'success', 1, '2020-09-30 11:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `sel_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `sel_id`, `product_id`, `qty`, `price`, `added_on`) VALUES
(26, 17, 4, 8, 1, 20, '2020-09-27 09:18:13'),
(27, 17, 4, 7, 1, 12, '2020-09-27 09:18:13'),
(28, 17, 4, 6, 1, 10, '2020-09-27 09:18:13'),
(29, 18, 4, 8, 4, 20, '2020-09-30 11:27:26'),
(30, 18, 4, 7, 1, 12, '2020-09-30 11:27:26'),
(31, 18, 4, 6, 1, 10, '2020-09-30 11:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'processing'),
(3, 'shipped'),
(4, 'canceled'),
(5, 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sel_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `sel_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(5, 16, 4, 'mobile', 25, 56, 12, '325306843_287733289_3.jpg', 'a', 'b', 'c', 'd', 'e', 1),
(6, 16, 4, 'a1', 12, 10, 1, '449811799_119845920_2.jpg', 'p', 'q', 'r', 's', 't', 1),
(7, 16, 4, 'a2', 14, 12, 1, '733748528_287733289_3.jpg', 'l', 'm', 'n', 'o', 'p', 1),
(8, 16, 4, 'a3', 23, 20, 1, '992923774_578369140_1 (1).jpg', 'x', 'y', 'z', 'a', 'b', 1),
(9, 17, 4, 'lenovo', 21, 23, 2, '395580452_119845920_2.jpg', 'a', 'b', 'c', 'd', 'e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `name`, `email`, `phone`) VALUES
(1, 'Aniket', 'aniket@gmail.com', '1234567890'),
(2, 'Amit', 'Amit@gmail.com', '9874563210'),
(6, '', '', ''),
(7, '', '', ''),
(8, 'sagar', 'sagar@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `s_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(256) NOT NULL,
  `sel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`s_id`, `name`, `address`, `sel_id`) VALUES
(3, 'Gada Electronics', 'kalyan east, thane-421001', 0),
(4, 'gada electronics', 'tarak address', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `email` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `password`, `date`) VALUES
(1, 'amitkumar', '123456', 'amit@gmail.com', '123456', '2020-08-24 21:04:32'),
(3, 'sagar gupta', '123456789', 'sagar@gmail.com', '123456', '2020-09-08 03:46:58'),
(4, 'chetan k', '1234567890', 'chetan@gmail.co', '123456', '2020-09-10 08:29:58'),
(5, 'chandan gosavi', '123456', 'chandu@gmail.co', 'abcd', '2020-10-01 12:59:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
