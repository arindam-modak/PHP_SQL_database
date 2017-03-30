-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2016 at 10:31 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbuser`
--
CREATE DATABASE IF NOT EXISTS `dbuser` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbuser`;

-- --------------------------------------------------------

--
-- Table structure for table `tbluserinfo`
--

CREATE TABLE IF NOT EXISTS `tbluserinfo` (
  `colId` varchar(100) NOT NULL,
  `colPassword` varchar(100) NOT NULL,
  `colName` varchar(100) NOT NULL,
  `colAge` int(3) NOT NULL,
  PRIMARY KEY (`colId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluserinfo`
--

INSERT INTO `tbluserinfo` (`colId`, `colPassword`, `colName`, `colAge`) VALUES
('1', 'a', 'Amit', 18),
('10', '10', '10', 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
