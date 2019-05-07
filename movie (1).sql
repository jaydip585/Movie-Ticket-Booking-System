-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 14, 2019 at 03:01 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `accno` varchar(16) NOT NULL,
  `edate` varchar(5) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accno`, `edate`, `cvv`, `balance`) VALUES
('1234567891234560', '05/22', '123', 30185);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `no` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`no`, `name`) VALUES
(1, 'agent327'),
(2, 'aquaman'),
(3, 'avenger'),
(4, 'batman'),
(5, 'firstman'),
(6, 'glass'),
(7, 'gullyboy'),
(8, 'robinhood'),
(9, 'venom');

-- --------------------------------------------------------

--
-- Table structure for table `moviedetail`
--

DROP TABLE IF EXISTS `moviedetail`;
CREATE TABLE IF NOT EXISTS `moviedetail` (
  `movieName` varchar(30) NOT NULL,
  `rd` date NOT NULL,
  `genre` varchar(20) NOT NULL,
  `director` varchar(40) NOT NULL,
  `starcast` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moviedetail`
--

INSERT INTO `moviedetail` (`movieName`, `rd`, `genre`, `director`, `starcast`) VALUES
('agent327', '2019-02-13', 'animation', 'abcd', 'abcdefgh'),
('aquaman', '2019-03-06', 'action', 'momedy exclune', 'xyz , abc');

-- --------------------------------------------------------

--
-- Table structure for table `popular`
--

DROP TABLE IF EXISTS `popular`;
CREATE TABLE IF NOT EXISTS `popular` (
  `movieName` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `popular`
--

INSERT INTO `popular` (`movieName`) VALUES
('aquaman'),
('batman'),
('gullyboy'),
('venom'),
('glass');

-- --------------------------------------------------------

--
-- Table structure for table `sitting`
--

DROP TABLE IF EXISTS `sitting`;
CREATE TABLE IF NOT EXISTS `sitting` (
  `movieName` varchar(30) NOT NULL,
  `theater` varchar(30) NOT NULL,
  `showtime` varchar(8) NOT NULL,
  `sit1` int(1) NOT NULL,
  `sit2` int(1) NOT NULL,
  `sit3` int(1) NOT NULL,
  `sit4` int(1) NOT NULL,
  `sit5` int(1) NOT NULL,
  `sit6` int(1) NOT NULL,
  `sit7` int(1) NOT NULL,
  `sit8` int(1) NOT NULL,
  `sit9` int(1) NOT NULL,
  `sit10` int(1) NOT NULL,
  `sit11` int(1) NOT NULL,
  `sit12` int(1) NOT NULL,
  `sit13` int(1) NOT NULL,
  `sit14` int(1) NOT NULL,
  `sit15` int(1) NOT NULL,
  `sit16` int(1) NOT NULL,
  `sit17` int(1) NOT NULL,
  `sit18` int(1) NOT NULL,
  `sit19` int(1) NOT NULL,
  `sit20` int(1) NOT NULL,
  `sit21` int(1) NOT NULL,
  `sit22` int(1) NOT NULL,
  `sit23` int(1) NOT NULL,
  `sit24` int(1) NOT NULL,
  `sit25` int(1) NOT NULL,
  `sit26` int(1) NOT NULL,
  `sit27` int(1) NOT NULL,
  `sit28` int(1) NOT NULL,
  `sit29` int(1) NOT NULL,
  `sit30` int(1) NOT NULL,
  `sit31` int(1) NOT NULL,
  `sit32` int(1) NOT NULL,
  `sit33` int(1) NOT NULL,
  `sit34` int(1) NOT NULL,
  `sit35` int(1) NOT NULL,
  `sit36` int(1) NOT NULL,
  `sit37` int(1) NOT NULL,
  `sit38` int(1) NOT NULL,
  `sit39` int(1) NOT NULL,
  `sit40` int(1) NOT NULL,
  `price` int(3) NOT NULL,
  `date` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sitting`
--

INSERT INTO `sitting` (`movieName`, `theater`, `showtime`, `sit1`, `sit2`, `sit3`, `sit4`, `sit5`, `sit6`, `sit7`, `sit8`, `sit9`, `sit10`, `sit11`, `sit12`, `sit13`, `sit14`, `sit15`, `sit16`, `sit17`, `sit18`, `sit19`, `sit20`, `sit21`, `sit22`, `sit23`, `sit24`, `sit25`, `sit26`, `sit27`, `sit28`, `sit29`, `sit30`, `sit31`, `sit32`, `sit33`, `sit34`, `sit35`, `sit36`, `sit37`, `sit38`, `sit39`, `sit40`, `price`, `date`) VALUES
('agent327', 'INOX CINEMA', '12:00 PM', 0, 1, 1, 1, 0, 2, 0, 0, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 1, 0, 1, 0, 1, 1, 1, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 1, 1, 0, 200, '09-04-19'),
('agent327', 'INOX CINEMA', '08:00 AM', 1, 1, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 1, 1, 0, 2, 1, 1, 1, 1, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 200, '09-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `theater`
--

DROP TABLE IF EXISTS `theater`;
CREATE TABLE IF NOT EXISTS `theater` (
  `name` varchar(30) NOT NULL,
  `MovieName` varchar(30) NOT NULL,
  `date` varchar(8) NOT NULL,
  `show1` varchar(8) DEFAULT NULL,
  `show2` varchar(8) DEFAULT NULL,
  `show3` varchar(8) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theater`
--

INSERT INTO `theater` (`name`, `MovieName`, `date`, `show1`, `show2`, `show3`) VALUES
('INOX CINEMA', 'agent327', '09-04-19', '08:00 AM', '12:00 PM', '05:00 PM'),
('GOLD CINEMA', 'agent327', '10-04-19', '08:00 AM', '12:00 PM', '05:00 PM'),
('TIME CINEMA', 'agent327', '09-04-19', '08:00 AM', '12:00 PM', '05:00 PM'),
('INOX CINEMA', 'aquaman', '', '09:30 AM', '02:30 PM', '10:00 PM'),
('GOLD CINEMA', 'aquaman', '', '04:30 PM', NULL, NULL),
('TIME CINEMA', 'aquaman', '', '02:30 PM', '09:00 PM', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `mono` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `type`, `mono`) VALUES
('jaydip', 'jkoladiya43@gmail.com', '1234567890', 'normal', '9586001227'),
('jd', 'jdpatelk43@gmail.com', '12345', 'admin', '9879678520'),
('dip', 'asdf@gmail.com', '12345', 'normal', '9865323265');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
