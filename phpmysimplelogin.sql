-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2014 at 10:27 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpmysimplelogin`
--
CREATE DATABASE IF NOT EXISTS `phpmysimplelogin` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `phpmysimplelogin`;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `username` varchar(25) NOT NULL,
  `reservationid` int(10) NOT NULL,
  `licenseplate` varchar(10) NOT NULL,
  UNIQUE KEY `reservationid` (`reservationid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`username`, `reservationid`, `licenseplate`) VALUES
('akash12321', 1, ''),
('akash12321', 3, ''),
('akash12321', 12321, 'NJXYZ123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  UNIQUE KEY `fullname` (`firstname`),
  UNIQUE KEY `username` (`username`),
  KEY `fullname_2` (`firstname`),
  FULLTEXT KEY `fullname_3` (`firstname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `firstname`, `lastname`, `email`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '', ''),
('akash12321', '96ddd573da16901afb5be345cee64734', 'Akash', 'Patel', 'akashpatel712@yahoo.com'),
('emanz13', '9dee45a24efffc78483a02cfcfd83433', 'Ian', 'zieder', 'emanz13@aol.com'),
('', '', 'luciano', 'taranto', ''),
('saucylion', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Mihail', 'Stantchev', 'mihailsports@yahoo.com'),
('jj', '0421008445828ceb46f496700a5fa65e', 'sak', 'kjkj', 'jkn');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
