-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2012 at 07:11 AM
-- Server version: 5.1.54
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alucio`
--

-- --------------------------------------------------------

--
-- Table structure for table `usertrack`
--

CREATE TABLE IF NOT EXISTS `usertrack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipcity` varchar(200) DEFAULT NULL,
  `referer` varchar(200) DEFAULT NULL,
  `bbrowser` varchar(100) DEFAULT NULL,
  `bversion` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `page` varchar(150) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `usertrack`
--

INSERT INTO `usertrack` (`id`, `ipcity`, `referer`, `bbrowser`, `bversion`, `time`, `ip`, `page`, `date`) VALUES
(21, NULL, 'http://127.0.0.1:8888/aluciosite/webin/index/p/17.atx', 'firefox', '6.0.2', '07:06:36', '127.0.0.1', 'http://127.0.0.1:8888/aluciosite/', '2012-01-13'),
(20, NULL, 'http://127.0.0.1:8888/aluciosite/webin/index/p/15.atx', 'firefox', '6.0.2', '07:06:34', '127.0.0.1', 'http://127.0.0.1:8888/aluciosite/webin/index/p/17.atx', '2012-01-13'),
(19, NULL, 'http://127.0.0.1:8888/home/', 'firefox', '6.0.2', '07:06:30', '127.0.0.1', 'http://127.0.0.1:8888/aluciosite/', '2012-01-13');
