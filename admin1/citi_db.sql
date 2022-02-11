-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2019 at 10:17 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conisgro_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(536) NOT NULL,
  `password` varchar(536) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'password1234');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `id` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `account_name` text NOT NULL,
  `account_number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beneficiary`
--

INSERT INTO `beneficiary` (`id`, `user_id`, `account_name`, `account_number`) VALUES
(15, 'test', 'test', '5399834711258673'),
(16, 'Firstchoice', 'Bartek polakowski', '81492148085'),
(18, 'Firstchoice', 'Obeyerinure Daniel', '3110604344');

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE `credits` (
  `id` int(255) NOT NULL,
  `card_holder_name` text NOT NULL,
  `bank_name` text NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `expiry_date` varchar(7) NOT NULL,
  `ccv` int(3) NOT NULL,
  `pin` int(4) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credits`
--

INSERT INTO `credits` (`id`, `card_holder_name`, `bank_name`, `card_number`, `expiry_date`, `ccv`, `pin`, `date`) VALUES
(24, 'David Adigwu', 'Union Bank', '0887554214', '(12/23)', 183, 2028, '2019-03-31 10:18:00'),
(25, 'David Adigwu', 'GT Bank', '6584549164846', '(02/12)', 152, 5845, '2019-04-01 13:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `user_id` varchar(536) NOT NULL,
  `password` varchar(536) NOT NULL,
  `email` varchar(536) NOT NULL,
  `account_number` varchar(536) NOT NULL,
  `phone_number` varchar(536) NOT NULL,
  `first_name` varchar(536) NOT NULL,
  `last_name` varchar(536) NOT NULL,
  `address` varchar(536) NOT NULL,
  `account_balance` varchar(536) NOT NULL,
  `account_status` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `user_id`, `password`, `email`, `account_number`, `phone_number`, `first_name`, `last_name`, `address`, `account_balance`, `account_status`, `date`) VALUES
(2, '1234567890', 'password1234', 'admin@g.co', '1234567890', '090909090909', 'admin', 'administrator', '           london ', '9999500000', 0, '2018-05-15 15:09:21'),
(4, 'Firstchoice', 'password1234', 'firstchoiceloanofficial@gmail.com', '17730604344', '+13016604213', 'Ian', 'Khellah ', '       426 MAIN ST # 394\r\nSPOTSWOOD, NJ 08884-1702\r\nUnited State', '10736', 2, '2019-03-29 18:08:44'),
(5, 'test', 'test', 'test@test.com', '0000000000000000000', '+2348149214808', 'test', 'test', '   test', '38227', 0, '2019-03-30 21:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` varchar(536) NOT NULL,
  `amount` varchar(536) NOT NULL,
  `account_number` varchar(536) DEFAULT NULL,
  `account_name` varchar(536) DEFAULT NULL,
  `transaction_type` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `user_id`, `amount`, `account_number`, `account_name`, `transaction_type`, `date`) VALUES
(123, 'Firstchoice', '240000', '3110604344', 'Obeyerinure Daniel', 0, '2019-04-24 19:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `otp_code` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id`, `user_id`, `otp_code`, `date`) VALUES
(111, 'test', 'login 865598', '2019-03-31 10:16:27'),
(112, 'test', 'Credit card 102690', '2019-03-31 10:17:28'),
(113, 'Firstchoice', 'login 808807', '2019-03-31 10:45:49'),
(114, 'Firstchoice', 'login 359450', '2019-03-31 11:01:04'),
(115, 'Firstchoice', 'login 761219', '2019-03-31 11:09:38'),
(116, 'Firstchoice', 'login 365085', '2019-03-31 11:39:26'),
(117, 'test', 'login 248886', '2019-04-01 13:28:02'),
(118, 'test', 'Credit card 740634', '2019-04-01 13:30:00'),
(119, 'Firstchoice', 'login 778507', '2019-04-02 18:20:57'),
(120, 'Firstchoice', 'login 745398', '2019-04-02 18:37:00'),
(121, '', 'login 591996', '2019-04-02 18:47:22'),
(122, 'test', 'login 839253', '2019-04-08 10:41:04'),
(123, 'Firstchoice', 'login 787063', '2019-04-08 19:25:53'),
(124, '', 'login 008553', '2019-04-08 19:36:08'),
(125, 'Firstchoice', 'login 200824', '2019-04-08 20:42:10'),
(126, 'Firstchoice', 'Trans 582119', '2019-04-08 20:43:31'),
(127, 'Firstchoice', 'login 180953', '2019-04-08 21:46:33'),
(128, 'Firstchoice', 'Trans 105380', '2019-04-08 21:48:00'),
(129, 'Firstchoice', 'login 744346', '2019-04-08 22:49:11'),
(130, 'Firstchoice', 'Trans 158049', '2019-04-08 23:03:32'),
(131, 'Firstchoice', 'Trans 809081', '2019-04-08 23:14:13'),
(132, '', 'Trans 108076', '2019-04-08 23:16:12'),
(133, 'test', 'login 593828', '2019-04-15 12:02:34'),
(134, 'Firstchoice', 'login 969159', '2019-04-24 19:15:44'),
(135, 'Firstchoice', 'Trans 155041', '2019-04-24 19:19:25'),
(136, 'Firstchoice', 'login 416286', '2019-04-26 14:42:11'),
(137, 'Test', 'login 683558', '2019-04-27 20:16:45'),
(138, 'test', 'login 019950', '2019-05-10 14:07:22'),
(139, 'Firstchoice', 'login 560689', '2019-05-18 16:04:09'),
(140, 'Quentin', 'login 555685', '2019-05-20 20:39:26'),
(141, 'test', 'login 237115', '2019-06-03 12:32:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_name` (`account_name`(537),`account_number`(537));

--
-- Indexes for table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`email`,`account_number`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
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
-- AUTO_INCREMENT for table `beneficiary`
--
ALTER TABLE `beneficiary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `credits`
--
ALTER TABLE `credits`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
