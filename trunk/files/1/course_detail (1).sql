-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2012 at 06:52 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smartalloc`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_detail`
--

CREATE TABLE IF NOT EXISTS `course_detail` (
  `course_no` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `expectations` varchar(500) NOT NULL,
  `ta_demand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_detail`
--

INSERT INTO `course_detail` (`course_no`, `year`, `detail`, `expectations`, `ta_demand`) VALUES
('CSE300', 'Advanced Course', 'Flipped Classroom', 'Lots of website stuff', 15);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
