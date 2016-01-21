-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2016 at 10:26 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `a_id` int(11) NOT NULL,
  `usrname` varchar(20) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `type` varchar(11) NOT NULL DEFAULT 'counsellor'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`a_id`, `usrname`, `pwd`, `type`) VALUES
(1, 'chin', 'chang', 'counsellor'),
(10, 'una', 'asdasdad', 'counsellor'),
(12, 'asdasd', 'asdasdsadsada', 'counsellor'),
(14, 'chote', 'miya2054', 'top_mgmt'),
(15, 'dakndjmaklsdj iadj', 'dasdasdndksl jsadkasdkn', 'counsellor'),
(16, 'dakndjmaklsdj iadjas', 'asdasdasdasdasdasd', 'counsellor'),
(17, 'qweqweqwewqe', 'qweqweqeqw', 'counsellor'),
(18, 'sadsani', '', 'top_mgmt'),
(20, 'asdojadasdmlaskdasd', 'iasjdasdjiajsdamsldjalsdljasds', 'counsellor');

-- --------------------------------------------------------

--
-- Table structure for table `counsellor`
--

CREATE TABLE `counsellor` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counsellor`
--

INSERT INTO `counsellor` (`c_id`, `c_name`, `a_id`) VALUES
(7, 'sanu', 18),
(8, 'sabname', 20),
(9, 'asasdasdsad', 12);

-- --------------------------------------------------------

--
-- Table structure for table `followup`
--

CREATE TABLE `followup` (
  `f_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `l_id` int(11) NOT NULL,
  `f_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `feedback` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followup`
--

INSERT INTO `followup` (`f_id`, `c_id`, `l_id`, `f_date`, `feedback`) VALUES
(1, 7, 1, '2016-01-12 23:52:21', NULL),
(2, 9, 1, '2016-01-21 16:17:15', 'malae ta ekdam ramro lagyo'),
(3, 9, 1, '2016-01-21 16:17:50', 'malae ta ekdam ramro lagyo'),
(4, 7, 4, '2016-01-21 17:59:21', 'malae ta ekdam ramro lagyo'),
(5, 9, 1, '2016-01-22 03:02:57', 'yeah'),
(6, 9, 5, '2016-01-22 03:09:13', 'yahoo'),
(7, 9, 5, '2016-01-22 03:09:57', 'yahoo'),
(8, 9, 5, '2016-01-22 03:10:24', 'yahoo'),
(9, 9, 5, '2016-01-22 03:11:17', 'yahoo');

-- --------------------------------------------------------

--
-- Table structure for table `lead`
--

CREATE TABLE `lead` (
  `l_id` int(11) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'active',
  `next_followup` date NOT NULL,
  `semester` varchar(10) NOT NULL DEFAULT 'First'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead`
--

INSERT INTO `lead` (`l_id`, `l_name`, `address`, `contact`, `c_id`, `status`, `next_followup`, `semester`) VALUES
(1, 'Prakash', 'Shekhar ko mutu ko xeu ma', '980584321', 7, 'active', '2016-01-13', 'Fifth'),
(4, 'chote miya', 'asdasdasd', '213123123', 7, 'active', '2016-01-04', 'First'),
(5, 'chote miya ko vai', 'uni ko mutu ko xeu ma', '212123123', 9, 'active', '2017-04-13', 'Final');

-- --------------------------------------------------------

--
-- Table structure for table `top_mgmt`
--

CREATE TABLE `top_mgmt` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(20) NOT NULL,
  `a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `usrname` (`usrname`),
  ADD UNIQUE KEY `pwd` (`pwd`);

--
-- Indexes for table `counsellor`
--
ALTER TABLE `counsellor`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `followup`
--
ALTER TABLE `followup`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `lead`
--
ALTER TABLE `lead`
  ADD PRIMARY KEY (`l_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `next_followup` (`next_followup`);

--
-- Indexes for table `top_mgmt`
--
ALTER TABLE `top_mgmt`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `a_id` (`a_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `counsellor`
--
ALTER TABLE `counsellor`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `followup`
--
ALTER TABLE `followup`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `lead`
--
ALTER TABLE `lead`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `top_mgmt`
--
ALTER TABLE `top_mgmt`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `counsellor`
--
ALTER TABLE `counsellor`
  ADD CONSTRAINT `counsellor_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `account` (`a_id`);

--
-- Constraints for table `followup`
--
ALTER TABLE `followup`
  ADD CONSTRAINT `followup_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `counsellor` (`c_id`),
  ADD CONSTRAINT `followup_ibfk_2` FOREIGN KEY (`l_id`) REFERENCES `lead` (`l_id`);

--
-- Constraints for table `lead`
--
ALTER TABLE `lead`
  ADD CONSTRAINT `lead_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `counsellor` (`c_id`);

--
-- Constraints for table `top_mgmt`
--
ALTER TABLE `top_mgmt`
  ADD CONSTRAINT `top_mgmt_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `account` (`a_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
