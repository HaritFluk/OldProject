-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2020 at 10:56 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thaiorange`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_tb`
--

CREATE TABLE `bill_tb` (
  `bill_id` int(11) NOT NULL,
  `bill_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill_tb`
--

INSERT INTO `bill_tb` (`bill_id`, `bill_name`) VALUES
(1, 'ยังไม่ได้ชำระเงินและส่งมอบ'),
(2, 'ส่งมอบและรับเงินเสร็จสิ้น');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `M_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date` date NOT NULL,
  `C_id` int(11) NOT NULL,
  `get_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `get_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `M_id`, `total_amount`, `total_price`, `date`, `C_id`, `get_id`, `bill_id`, `get_date`) VALUES
(1, 2, 10, 155, '2020-04-14', 1, 1, 1, '2020-04-20'),
(2, 2, 4, 64, '2020-04-14', 3, 1, 2, '2020-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `booking_detail`
--

CREATE TABLE `booking_detail` (
  `id` int(11) NOT NULL,
  `P_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking_detail`
--

INSERT INTO `booking_detail` (`id`, `P_id`, `amount`) VALUES
(1, 1, 5),
(1, 2, 5),
(2, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `id` int(11) NOT NULL,
  `M_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`id`, `M_id`, `total_amount`, `total_price`, `date`) VALUES
(1, 2, 8, 124, '2020-04-13'),
(2, 2, 8, 124, '2020-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `buy_detail`
--

CREATE TABLE `buy_detail` (
  `id` int(11) NOT NULL,
  `P_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `buy_detail`
--

INSERT INTO `buy_detail` (`id`, `P_id`, `amount`) VALUES
(1, 1, 4),
(1, 2, 4),
(2, 1, 4),
(2, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_id` int(11) NOT NULL,
  `C_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `C_add` text COLLATE utf8_unicode_ci NOT NULL,
  `C_tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_id`, `C_name`, `C_add`, `C_tel`) VALUES
(1, 'ประหยัด', 'ลำปาง เมือง 52000', '0949358795'),
(2, 'ปูอัด', 'ลำปาง เมือง 52000', '0916549872'),
(3, 'สมงิ', 'ลำปาง 52000', '0874539874');

-- --------------------------------------------------------

--
-- Table structure for table `get_tb`
--

CREATE TABLE `get_tb` (
  `get_id` int(11) NOT NULL,
  `get_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `get_tb`
--

INSERT INTO `get_tb` (`get_id`, `get_name`) VALUES
(1, 'มารับสินค้าเอง'),
(2, 'ให้ร้านจัดส่งให้');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `M_id` int(11) NOT NULL,
  `M_Fname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `M_Lname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `M_user` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `M_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `M_add` text COLLATE utf8_unicode_ci NOT NULL,
  `M_tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `M_Status` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`M_id`, `M_Fname`, `M_Lname`, `M_user`, `M_pass`, `M_add`, `M_tel`, `M_Status`) VALUES
(1, 'admin', '-', 'admin', '7031346ead43dfc4ba939e3784754757', '-', '-', '1'),
(2, 'หฤษฎ์', 'คำแสน', 'harit', '93b60d77711b5b6cbc6f147b39b8c686', 'ลำพูน บ้านโฮ่ง ป่าพลู 51130', '0650027794', '2');

-- --------------------------------------------------------

--
-- Table structure for table `stock_product`
--

CREATE TABLE `stock_product` (
  `id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(7) NOT NULL,
  `price` int(7) NOT NULL,
  `date_update` date NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock_product`
--

INSERT INTO `stock_product` (`id`, `name`, `amount`, `price`, `date_update`, `image`) VALUES
(1, 'น้ำส้ม', 50, 16, '2020-04-12', 'orange.jpg'),
(2, 'น้ำมะพร้าว', 50, 15, '2020-04-12', 'coconus.jpg'),
(3, 'น้ำองุ่น', 50, 17, '2020-04-12', 'grape.jpg'),
(4, 'น้ำสับปะรด', 50, 15, '2020-04-12', 'pine-apple.jpg'),
(5, 'น้ำสตอเบอรี่', 50, 18, '2020-04-12', 'strawberry.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_tb`
--
ALTER TABLE `bill_tb`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_id`);

--
-- Indexes for table `get_tb`
--
ALTER TABLE `get_tb`
  ADD PRIMARY KEY (`get_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`M_id`);

--
-- Indexes for table `stock_product`
--
ALTER TABLE `stock_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_tb`
--
ALTER TABLE `bill_tb`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `C_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `get_tb`
--
ALTER TABLE `get_tb`
  MODIFY `get_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `M_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock_product`
--
ALTER TABLE `stock_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
