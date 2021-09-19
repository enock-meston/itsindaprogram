-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2021 at 02:31 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kmndb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintbl`
--

CREATE TABLE `admintbl` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(45) NOT NULL,
  `Lastname` varchar(45) NOT NULL,
  `phoneNumber` varchar(16) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(18) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grouptbl`
--

CREATE TABLE `grouptbl` (
  `id` int(11) NOT NULL,
  `groupName` varchar(45) NOT NULL,
  `groupPhoneNumber` varchar(18) NOT NULL,
  `groupCreator` varchar(11) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `membertbl`
--

CREATE TABLE `membertbl` (
  `mid` int(11) NOT NULL,
  `Firstname` varchar(45) NOT NULL,
  `Lastname` varchar(45) NOT NULL,
  `phoneNumber` varchar(16) NOT NULL,
  `UserName` varchar(45) NOT NULL,
  `Password` varchar(18) NOT NULL,
  `status` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membertbl`
--

INSERT INTO `membertbl` (`mid`, `Firstname`, `Lastname`, `phoneNumber`, `UserName`, `Password`, `status`) VALUES
(1, '$firstname', '$lastname', '$phone', '$username', '$password', 1),
(2, '$firstname', '$lastname', '$phone', '$username', '$password', 1),
(3, 'e', 'jwe', '932734', '894', 'iwe', 1),
(4, '', '', '', '', '', 1),
(5, 'e', 'idf', '00', 'eji', '39e', 1),
(6, '', '', '', '', '', 1),
(7, 'wer', 'w', 'w', 'e', 'r', 1),
(8, '', '', '', '', '', 1),
(9, '', '', '', '', '', 1),
(10, 'enock', 'ndagijimana', '0783982872', 'ENOCK', '123', 1),
(11, 'chris', 'we', '0783982872', 'en', '123', 1),
(12, 'enock', 'jwe', '092', '32', 'e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintbl`
--
ALTER TABLE `admintbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grouptbl`
--
ALTER TABLE `grouptbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membertbl`
--
ALTER TABLE `membertbl`
  ADD PRIMARY KEY (`mid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintbl`
--
ALTER TABLE `admintbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grouptbl`
--
ALTER TABLE `grouptbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membertbl`
--
ALTER TABLE `membertbl`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
