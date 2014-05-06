-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2014 at 12:51 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `btl`
--
CREATE DATABASE IF NOT EXISTS `btl` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `btl`;

-- --------------------------------------------------------

--
-- Table structure for table `occupancy`
--

CREATE TABLE IF NOT EXISTS `occupancy` (
  `psensorid` varchar(3) DEFAULT NULL,
  `istaken` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occupancy`
--

INSERT INTO `occupancy` (`psensorid`, `istaken`) VALUES
('101', 0),
('102', 0),
('103', 0),
('104', 0),
('105', 0),
('106', 0),
('107', 0),
('108', 0),
('109', 0),
('201', 0),
('202', 0),
('203', 0),
('204', 0),
('205', 0),
('206', 0),
('207', 0),
('208', 0),
('209', 0),
('301', 0),
('302', 0),
('303', 0),
('304', 0),
('305', 0),
('306', 0),
('307', 0),
('308', 0),
('309', 0),
('401', 0),
('402', 0),
('403', 0),
('404', 0),
('405', 0),
('406', 0),
('407', 0),
('408', 0),
('409', 0),
('501', 0),
('502', 0),
('503', 0),
('504', 0),
('505', 0),
('506', 0),
('507', 0),
('508', 0),
('509', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `username` varchar(255) DEFAULT NULL,
  `reservationid` int(10) DEFAULT NULL,
  `licenseplate` varchar(10) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `startdatetime` datetime DEFAULT NULL,
  `enddatetime` datetime DEFAULT NULL,
  `startdatetimesec` int(10) DEFAULT NULL,
  `enddatetimesec` int(10) DEFAULT NULL,
  `cc` varchar(16) DEFAULT NULL,
  `cvv` int(4) DEFAULT NULL,
  `ccexpdate` date DEFAULT NULL,
  `completed` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
