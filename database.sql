-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2019 at 12:48 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ifs_zim_mako2`
--

-- --------------------------------------------------------

--
-- Table structure for table `brokers`
--

CREATE TABLE `brokers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brokers`
--

INSERT INTO `brokers` (`id`, `fullname`, `email`, `password`) VALUES
(1, '123142142', 'hdhdhdh@gahaha.com', 'ed2b1f468c5f915f3f1cf75d7068baae'),
(2, 'King Admin', 'kingadmin@gmail.com', 'ed2b1f468c5f915f3f1cf75d7068baae');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `company` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `shares` double NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company`, `price`, `shares`, `logo`) VALUES
(3, 'Econet Wireless', 2.84, 6, 'econet.png'),
(4, 'Meikles', 778.9, 10, 'meikles.png'),
(5, 'OK Zimbabwe', 23, 10000, 'ok.png'),
(6, 'Hippo Valley', 100, 400, 'icon_hippo.png'),
(7, 'BAT', 700, 45, 'icon_bat_002.png');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `balance` double NOT NULL,
  `bank` varchar(20) NOT NULL,
  `account_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `email`, `password`, `balance`, `bank`, `account_number`) VALUES
(2, 'ggfgf ffggggfg', 'rue@gmail.com', 'ed2b1f468c5f915f3f1cf75d7068baae', 86.04000000000002, '', ''),
(3, 'My name is ', 'investor@gmail.com', 'b49879f0aeead3a151afc523a50b09db', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `knowledge`
--

CREATE TABLE `knowledge` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `summary` text NOT NULL,
  `comment` text NOT NULL,
  `link` text NOT NULL,
  `upload1` varchar(200) NOT NULL,
  `upload2` varchar(200) NOT NULL,
  `upload3` varchar(200) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `knowledge`
--

INSERT INTO `knowledge` (`id`, `company`, `summary`, `comment`, `link`, `upload1`, `upload2`, `upload3`, `date_time`) VALUES
(2, 3, 'gdgdgdgd', 'massive drop in shares', 'hdhdhdh', '_banner_drivers-license.jpeg', '_sidebar_drivers-license.jpeg', '_content_drivers-license.jpeg', '2019-01-09 11:26:21'),
(3, 3, 'hshdshdshds hdsdshdshds hshdshsdh hdsdhdshs', 'hwhdhdsh dhdhdshsd hdshdshdshs dsdhsddshds', 'https://hshsh.com/gdgdhd', '', '', '', '2019-01-14 17:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `investor` int(11) NOT NULL,
  `amount` double NOT NULL,
  `proof` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `investor`, `amount`, `proof`, `status`) VALUES
(1, 2, 450, 'egegegegegegegege', 'decline'),
(2, 2, 254, 'gdgdgdgdgdgd', 'accept');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `investor` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `shares` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `investor`, `company`, `shares`) VALUES
(1, 2, 3, 8),
(2, 2, 4, 10),
(3, 1, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `investor` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `shares` double NOT NULL,
  `cost` double NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `investor`, `company`, `shares`, `cost`, `status`) VALUES
(19, 2, 3, 2, 5.68, 'successful'),
(20, 1, 3, 2, 5.68, 'successful'),
(21, 2, 3, 2, 5.68, '');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `investor` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `shares` double NOT NULL,
  `cost` double NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `investor`, `company`, `shares`, `cost`, `status`) VALUES
(1, 2, 3, 2, 5.68, 'successful');

-- --------------------------------------------------------

--
-- Table structure for table `shares_history`
--

CREATE TABLE `shares_history` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `shares` double NOT NULL,
  `price` double NOT NULL,
  `signature` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shares_history`
--

INSERT INTO `shares_history` (`id`, `company`, `shares`, `price`, `signature`, `date_time`) VALUES
(1, 0, 646464, 2.85, 2, '2019-04-19 15:28:41'),
(2, 3, 646464, 2.85, 2, '2019-04-19 15:30:54'),
(3, 3, 646464, 2.85, 2, '2019-04-19 15:33:35'),
(4, 3, 646464, 2.84, 2, '2019-04-19 15:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `investor` int(11) NOT NULL,
  `amount` double NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brokers`
--
ALTER TABLE `brokers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledge`
--
ALTER TABLE `knowledge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shares_history`
--
ALTER TABLE `shares_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brokers`
--
ALTER TABLE `brokers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `knowledge`
--
ALTER TABLE `knowledge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shares_history`
--
ALTER TABLE `shares_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
