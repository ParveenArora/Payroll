-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2011 at 01:17 AM
-- Server version: 5.1.58
-- PHP Version: 5.3.6-13ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(300) NOT NULL,
  `password` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE IF NOT EXISTS `workers` (
  `id` int(2) NOT NULL,
  `worker_fname` varchar(10) NOT NULL,
  `worker_lname` varchar(9) DEFAULT NULL,
  `profilepic` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `worker_acc`
--

CREATE TABLE IF NOT EXISTS `worker_acc` (
  `id` int(2) NOT NULL,
  `accno` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `worker_fixeds`
--

CREATE TABLE IF NOT EXISTS `worker_fixeds` (
  `worker_id` int(2) NOT NULL DEFAULT '0',
  `gross` int(4) NOT NULL,
  `hra` int(4) NOT NULL,
  PRIMARY KEY (`worker_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `worker_rest_sheet`
--

CREATE TABLE IF NOT EXISTS `worker_rest_sheet` (
  `id` int(11) NOT NULL,
  `day` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(11) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`id`,`month`,`year`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `worker_varys`
--

CREATE TABLE IF NOT EXISTS `worker_varys` (
  `id` int(11) NOT NULL,
  `rate` float NOT NULL,
  `workdays` float NOT NULL,
  `pf` int(11) NOT NULL,
  `esi` int(11) NOT NULL,
  `advance` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(60) NOT NULL DEFAULT '2011',
  PRIMARY KEY (`id`,`month`,`year`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
