-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2016 at 06:23 AM
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
  `t_id` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `uname` varchar(20) NOT NULL,
  `pwd` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `counsellor`
--

CREATE TABLE `counsellor` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `no_of_leads` int(11) NOT NULL,
  `no_of_followups` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `followup`
--

CREATE TABLE `followup` (
  `f_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `l_id` int(11) NOT NULL,
  `feedback` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `next_followup` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `top_mgmt`
--

CREATE TABLE `top_mgmt` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `uname` (`uname`),
  ADD UNIQUE KEY `pwd` (`pwd`),
  ADD UNIQUE KEY `t_id` (`t_id`),
  ADD UNIQUE KEY `c_id` (`c_id`);

--
-- Indexes for table `counsellor`
--
ALTER TABLE `counsellor`
  ADD PRIMARY KEY (`c_id`);

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
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `top_mgmt`
--
ALTER TABLE `top_mgmt`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `counsellor`
--
ALTER TABLE `counsellor`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `followup`
--
ALTER TABLE `followup`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lead`
--
ALTER TABLE `lead`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `top_mgmt`
--
ALTER TABLE `top_mgmt`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `top_mgmt` (`t_id`),
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `counsellor` (`c_id`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
