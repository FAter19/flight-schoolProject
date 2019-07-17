-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2016 at 07:15 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bus_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `uname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `password`, `name`) VALUES
('flightadmin', '12345', 'flight admin');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE IF NOT EXISTS `bus` (
  `bid` varchar(11) NOT NULL,
  `bname` varchar(50) NOT NULL,
  `type_ac` char(3) NOT NULL,
  `type_sl` char(3) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bid`, `bname`, `type_ac`, `type_sl`) VALUES
('BB001', 'Toyota', 'yes', 'yes'),
('BB002', 'Nissan', 'no', 'yes'),
('BB003', 'VOLVO', 'yes', 'yes'),


-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE IF NOT EXISTS `card` (
  `num` varchar(16) NOT NULL,
  `type` varchar(30) NOT NULL,
  `expdate` date NOT NULL,
  `cvv` int(11) NOT NULL,
  `bank` varchar(30) NOT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`num`, `type`, `expdate`, `cvv`, `bank`) VALUES
('1234567890123456', 'VISA', '2020-01-01', 333, 'SBI');

-- --------------------------------------------------------

--
-- Table structure for table `nb`
--

CREATE TABLE IF NOT EXISTS `nb` (
  `uname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `bank` varchar(30) NOT NULL,
  PRIMARY KEY (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nb`
--

INSERT INTO `nb` (`uname`, `password`, `bank`) VALUES
('flight', '1234', 'SBI');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE IF NOT EXISTS `passenger` (
  `pid` varchar(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` varchar(10) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`pid`, `name`, `email`, `mob`) VALUES
('1111111', 'Admin', 'admin@flight.com', '1234567890'),
('1111112', 'test1', 'test1@gmail.com', '8867159511'),
('1111113', 'test1', 'test1@gmail.com', '8867159511'),
('1111114', 'test1', 'test1@gmail.com', '8867159511'),
('1111115', 'test1', 'test1@gmail.com', '8867159511'),
('1111116', 'test1', 'admin@flight.com', '1234567890'),
('1111117', 'test1', 'test1@gmail.com', '8867159511'),
('1111118', 'test1', 'admin@flight.com', '1234567890'),
('1111119', 'test1', 'test1@gmail.com', '8867159511'),
('1111120', 'test1', 'test1@gmail.com', '8867159511'),
('1111121', 'test1', 'test1@gmail.com', '0886715951'),
('1111122', 'test1', 'test1@gmail.com', '0886715951');

-- --------------------------------------------------------

--
-- Table structure for table `reserves`
--

CREATE TABLE IF NOT EXISTS `reserves` (
  `pnr` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) DEFAULT NULL,
  `pid` varchar(11) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `DOT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pnr`),
  KEY `rid` (`rid`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `reserves`
--

INSERT INTO `reserves` (`pnr`, `rid`, `pid`, `status`, `DOT`) VALUES
(22, 10001, '1111116', 'booked', '2019-07-19 09:29:09'),
(23, 10001, '1111116', 'booked', '2019-07-19 09:29:09'),
(24, 10000, '1111117', 'cancelled', '2019-07-19 09:37:25'),
(25, 10000, '1111117', 'cancelled', '2019-07-19 09:37:26'),
(26, 10001, '1111118', 'booked', '2019-07-25 06:07:19'),
(27, 10001, '1111118', 'booked', '2019-07-25 06:07:19'),
(28, 10001, '1111118', 'booked', '2019-07-25 06:07:19'),
(29, 10000, '1111120', 'cancelled', '2019-08-13 08:26:48'),
(30, 10000, '1111120', 'cancelled', '2019-08-13 08:26:48'),
(31, 10000, '1111120', 'cancelled', '2019-08-13 08:26:48'),
(32, 10000, '1111121', 'booked', '2019-08-30 12:40:21'),
(33, 10000, '1111121', 'booked', '2019-08-30 12:40:21'),
(34, 10000, '1111121', 'booked', '2019-08-30 12:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE IF NOT EXISTS `route` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `bid` varchar(11) DEFAULT NULL,
  `fromLoc` varchar(10) DEFAULT NULL,
  `toLoc` varchar(10) DEFAULT NULL,
  `fare` double DEFAULT NULL,
  `dep_date` date NOT NULL,
  `dep_time` time DEFAULT NULL,
  -- `arr_time` time DEFAULT NULL,
  -- `arr_date` date NOT NULL,
  `avalseats` int(10) NOT NULL DEFAULT '40',
  `maxseats` int(10) NOT NULL DEFAULT '40',
  PRIMARY KEY (`rid`,`dep_date`),
  KEY `bid` (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10002 ;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`rid`, `bid`, `fromLoc`, `toLoc`, `fare`, `dep_date`, `dep_time`, `avalseats`, `maxseats`) VALUES
(10000, 'BB001', 'Abia', 'Abuja', 3000, '2019-07-20', '06-00-00', 11, 11),
(10001, 'BB001', 'Abia', 'Abuja', 4000, '2019-07-20', '03-00-00', 11, 11);
(10002, 'BB003', 'Lagos', 'Benue', 6000, '2019-07-20', '09-00-00', 11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `today`
--

CREATE TABLE IF NOT EXISTS `today` (
  `tod_time` time NOT NULL,
  `tod_date` date NOT NULL,
  `one` date NOT NULL DEFAULT '0000-00-01',
  PRIMARY KEY (`tod_time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `today`
--

INSERT INTO `today` (`tod_time`, `tod_date`, `one`) VALUES
('15:48:22', '2016-01-29', '0000-00-01');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reserves`
--
ALTER TABLE `reserves`
  ADD CONSTRAINT `reserves_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `route` (`rid`),
  ADD CONSTRAINT `reserves_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `passenger` (`pid`);

--
-- Constraints for table `route`
--
ALTER TABLE `route`
  ADD CONSTRAINT `route_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `bus` (`bid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
