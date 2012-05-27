-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2012 at 08:36 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `ci_series`
--

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`userid`, `first_name`, `last_name`, `email_address`, `username`, `password`) VALUES
(1, 'SELVAKUMAR', 'kumar', 'selvakumarvr@gmail.com', 'selvakumar', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'SELVA', 'KUMAR', 'selvakumarvr@gmail.com', 'selva', '79cfac6387e0d582f83a29a04d0bcdc4'),
(3, 'selvakumar', 'rajendren', 'selvakumarvr@gmail.com', 'selva', '79cfac6387e0d582f83a29a04d0bcdc4'),
(4, 'ROSHINI', 'SELVAKUMAR', 'roshiniselvakumar@gmail.com', 'roshini', '47faa6c650c25d2ed9931581cff73608'),
(5, 'suresh', 'govindaraj', 'suresh@yahoo.com', 'suresh', 'b328e805f8825c9a828b08a8d3d185da'),
(6, 'test', 'seret', 'testuser@mailiantor.com', 'test', 'cc03e747a6afbbcbf8be7668acfebee5');

-- --------------------------------------------------------

--
-- Table structure for table `tinyhabit`
--

CREATE TABLE IF NOT EXISTS `tinyhabit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `name` varchar(80) NOT NULL,
  `desc` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `isCurrent` tinyint(1) NOT NULL,
  `completedTimes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tinyhabit`
--

INSERT INTO `tinyhabit` (`id`, `username`, `name`, `desc`, `status`, `isCurrent`, `completedTimes`) VALUES
(1, 'selva', 'After I take bath, I will do 3 pushups', 'After I take bath, I will do 3 pushups', 'active', 0, 1),
(2, 'selva', 'After reach office , i fill my water cup', 'After reach office , i fill my water cup', 'active', 1, 3),
(3, 'selva', 'new habtit is added', 'habits is added', 'active', 1, 0),
(4, 'selva', 'excellent habbti', 'aetete', 'active', 1, 0),
(5, 'test', 'habit new created so far.. this is best you can..', '', 'active', 0, 0),
(6, 'test', 'atetet', '', 'active', 0, 0),
(7, 'selva', 'Teaching roshini anything spl', '', 'active', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trackhabits`
--

CREATE TABLE IF NOT EXISTS `trackhabits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `habitid` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `day1` tinyint(1) NOT NULL,
  `day2` tinyint(1) NOT NULL,
  `day3` tinyint(1) NOT NULL,
  `day4` tinyint(1) NOT NULL,
  `day5` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `trackhabits`
--

INSERT INTO `trackhabits` (`id`, `habitid`, `start_date`, `day1`, `day2`, `day3`, `day4`, `day5`) VALUES
(1, 1, '2012-05-26 14:55:30', 1, 1, 1, 1, 1),
(2, 2, '2012-05-26 15:33:05', 1, 1, 1, 1, 1),
(3, 2, '2012-05-26 15:33:44', 0, 0, 0, 0, 0),
(4, 2, '2012-05-26 15:33:51', 1, 1, 1, 1, 1),
(5, 1, '2012-05-26 15:36:37', 0, 0, 0, 0, 0),
(6, 2, '2012-05-26 22:56:01', 0, 0, 0, 0, 0),
(7, 2, '2012-05-27 02:53:28', 1, 1, 1, 0, 0),
(8, 2, '2012-05-27 02:56:16', 0, 0, 0, 0, 0),
(9, 3, '2012-05-27 05:05:33', 0, 0, 0, 0, 0),
(10, 4, '2012-05-27 05:05:34', 0, 0, 0, 0, 0),
(11, 3, '2012-05-27 05:05:41', 0, 0, 0, 0, 0),
(12, 4, '2012-05-27 05:05:44', 0, 0, 0, 0, 0),
(13, 3, '2012-05-27 19:29:36', 0, 0, 0, 0, 0),
(14, 4, '2012-05-27 19:29:38', 0, 0, 0, 0, 0),
(15, 2, '2012-05-27 19:29:39', 0, 0, 0, 0, 0),
(16, 7, '2012-05-23 23:34:41', 0, 0, 0, 0, 0);
