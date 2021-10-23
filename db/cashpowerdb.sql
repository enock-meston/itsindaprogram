-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2021 at 08:36 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cashpowerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcitizen`
--

CREATE TABLE `tblcitizen` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(45) NOT NULL,
  `Lastname` varchar(45) NOT NULL,
  `phoneNumber` varchar(18) NOT NULL,
  `UPI` varchar(45) NOT NULL,
  `EUCL_Branch` varchar(45) NOT NULL,
  `cell` varchar(45) NOT NULL,
  `Sector` varchar(45) NOT NULL,
  `ActiveStatus` varchar(11) NOT NULL,
  `addedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcitizen`
--

INSERT INTO `tblcitizen` (`id`, `Firstname`, `Lastname`, `phoneNumber`, `UPI`, `EUCL_Branch`, `cell`, `Sector`, `ActiveStatus`, `addedDate`) VALUES
(1, 'enock', 'ndagijimana', '0783982872', '123abc', 'kabuga', 'nyagahinga', 'rusororo', '1', '2021-10-21 11:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL,
  `names` varchar(100) NOT NULL,
  `usercategory` varchar(18) NOT NULL,
  `phoneNumber` varchar(18) NOT NULL,
  `district` varchar(45) NOT NULL,
  `sector` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(18) NOT NULL,
  `addedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`id`, `names`, `usercategory`, `phoneNumber`, `district`, `sector`, `username`, `password`, `addedDate`, `Status`) VALUES
(1, 'ndagijimana enock', 'admin', '0783982872', 'gasabo', 'rusororo', 'enock', 'enock@123', '2021-10-21 11:45:21', '1'),
(2, 'muzihirwa christophe', 'engineer', '0783982872', 'gasabo', 'rusororo', 'chris', 'chris@123', '2021-10-21 11:56:10', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcitizen`
--
ALTER TABLE `tblcitizen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcitizen`
--
ALTER TABLE `tblcitizen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
