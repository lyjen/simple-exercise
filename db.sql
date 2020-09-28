-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2020 at 05:11 PM
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
-- Database: `jp_exercise`
--
CREATE DATABASE IF NOT EXISTS `jp_exercise` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `jp_exercise`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_time` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `username`, `password`, `first_name`, `last_name`, `email`, `address`, `is_active`, `create_time`, `update_time`) VALUES
(1, 'admin', '161ebd7d45089b3446ee4e0d86dbcf92', 'Jen', 'Lovendino', 'mslyjen.lyj@gmail.com', 'Philippines', 1, '2020-08-31 15:53:30', '2020-08-31 16:55:43'),
(2, 'dummy', '161ebd7d45089b3446ee4e0d86dbcf92', 'Dummy', 'Account', 'dummy@account.com', 'Somewhere', 0, '2020-08-31 18:25:18', '2020-08-31 21:02:37'),
(3, 'dummy3', '161ebd7d45089b3446ee4e0d86dbcf92', 'Dummy3', 'Account', 'dummy3@account.com', 'Somewhere', 0, '2020-08-31 18:25:18', '2020-08-31 20:59:23'),
(4, 'dummy4', '161ebd7d45089b3446ee4e0d86dbcf92', 'Dummy4', 'Account', 'dummy4@account.com', 'Somewhere', 0, '2020-08-31 18:25:18', NULL),
(5, 'dummy5', '161ebd7d45089b3446ee4e0d86dbcf92', 'Dummy5', 'Account', 'dummy5@account.com', 'Somewhere', 0, '2020-08-31 18:25:18', NULL),
(6, 'dummy6', '161ebd7d45089b3446ee4e0d86dbcf92', 'Dummy6', 'Account', 'dummy6@account.com', 'Somewhere', 0, '2020-08-31 18:25:18', '2020-08-31 20:59:11'),
(7, 'dummy7', '161ebd7d45089b3446ee4e0d86dbcf92', 'Dummy7', 'Account', 'dummy7@account.com', 'Somewhere', 0, '2020-08-31 18:25:18', '2020-08-31 20:59:23'),
(8, 'dummy8', '161ebd7d45089b3446ee4e0d86dbcf92', 'Dummy8', 'Account', 'dummy8@account.com', 'Somewhere', 0, '2020-08-31 18:25:18', NULL),
(9, 'dummy2', '161ebd7d45089b3446ee4e0d86dbcf92', 'Dummy2', 'Account', 'dummy2@account.com', 'Somewhere', 0, '2020-08-31 18:25:18', NULL),
(10, 'dummy10', '161ebd7d45089b3446ee4e0d86dbcf92', 'Dummy10', 'Account', 'dummy10@account.com', 'Somewhere', 0, '2020-08-31 18:25:18', NULL),
(11, 'dsmith', '161ebd7d45089b3446ee4e0d86dbcf92', 'David', 'Smith', 'smithd@gmail.com', 'Singapore', 1, '2020-08-31 18:25:18', '2020-08-31 23:00:23'),
(13, 'John', '5f4dcc3b5aa765d61d8327deb882cf99', 'John', 'Doe', 'john@dummy.com', 'USA', 1, '2020-08-31 22:21:22', '2020-08-31 22:35:04'),
(18, 'David', '5f4dcc3b5aa765d61d8327deb882cf99', 'David', 'Doe', 'davic@dummy.com', 'USA', 1, '2020-08-31 22:30:53', '2020-08-31 22:35:10'),
(19, 'Maki', '5f4dcc3b5aa765d61d8327deb882cf99', 'Maki', 'Ibara', 'maki@dummy.com', 'USA', 1, '2020-08-31 22:34:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `account_role`
--

CREATE TABLE `account_role` (
  `account_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_role`
--

INSERT INTO `account_role` (`account_id`, `role_id`) VALUES
(0, 2),
(1, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(18, 2),
(19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_id` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_terms` varchar(50) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_time` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_id`, `payment_method`, `payment_terms`, `create_time`, `update_time`) VALUES
(1, 'Bank Transfer', '', '2020-08-31 22:56:26', NULL),
(2, 'Cash', '', '2020-08-31 22:56:26', NULL),
(3, 'Paypal', '', '2020-08-31 22:57:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_details` varchar(255) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_time` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_details`, `create_time`, `update_time`) VALUES
(1, 'admin', 'Can do anything', '2020-08-31 16:28:34', NULL),
(2, 'customer', 'Just a customer', '2020-08-31 16:28:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `account_role`
--
ALTER TABLE `account_role`
  ADD PRIMARY KEY (`account_id`,`role_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
