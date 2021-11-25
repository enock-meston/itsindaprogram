-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2021 at 11:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itsinda`
--

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `join_date` varchar(40) NOT NULL,
  `membership` varchar(50) NOT NULL,
  `m_status` int(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `group_settings`
--

CREATE TABLE `group_settings` (
  `sett_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `max_members` varchar(10) DEFAULT '250',
  `ini_amount` varchar(50) NOT NULL DEFAULT '0',
  `daily_amount` varchar(50) NOT NULL DEFAULT '0',
  `weekly_amount` varchar(50) NOT NULL DEFAULT '0',
  `monthly_amount` varchar(50) NOT NULL DEFAULT '0',
  `annual_amount` varchar(50) NOT NULL DEFAULT '0',
  `re_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `sett_status` int(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_settings`
--

INSERT INTO `group_settings` (`sett_id`, `group_id`, `max_members`, `ini_amount`, `daily_amount`, `weekly_amount`, `monthly_amount`, `annual_amount`, `re_date`, `sett_status`) VALUES
(3, 8, '250', '0', '0', '0', '0', '0', '2021-11-25 09:55:51', 1),
(4, 9, '250', '0', '0', '0', '0', '0', '2021-11-25 09:57:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_tbl`
--

CREATE TABLE `group_tbl` (
  `group_id` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_details` varchar(255) NOT NULL,
  `group_type` varchar(100) NOT NULL,
  `guserID` int(11) NOT NULL,
  `status` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `reference` varchar(45) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `gender` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(18) NOT NULL,
  `password` varchar(100) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `province` varchar(45) NOT NULL,
  `District` varchar(45) NOT NULL,
  `sector` varchar(45) NOT NULL,
  `Status` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_settings`
--
ALTER TABLE `group_settings`
  ADD PRIMARY KEY (`sett_id`);

--
-- Indexes for table `group_tbl`
--
ALTER TABLE `group_tbl`
  ADD PRIMARY KEY (`group_id`),
  ADD UNIQUE KEY `reference` (`reference`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `group_settings`
--
ALTER TABLE `group_settings`
  MODIFY `sett_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `group_tbl`
--
ALTER TABLE `group_tbl`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
