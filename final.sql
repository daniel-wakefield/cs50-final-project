-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 11, 2015 at 10:21 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1-log
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `bets`
--

CREATE TABLE IF NOT EXISTS `bets` (
  `bet` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `maker` int(10) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end` datetime NOT NULL,
  `taker` int(10) unsigned DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) unsigned NOT NULL,
  `Title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `resolved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `bets`
--

INSERT INTO `bets` (`bet`, `maker`, `date`, `end`, `taker`, `description`, `amount`, `Title`, `resolved`) VALUES
(24, 5, '2015-05-11 14:16:56', '2015-08-20 00:00:00', NULL, 'The first word Professor Malan says will be "alright". ', 500.00, 'CS50 fall 2015', 0),
(25, 5, '2015-05-11 14:17:56', '2015-05-29 00:00:00', NULL, 'My grade in CS50 will be higher than a C. ', 500.00, 'My Grade in CS50', 0),
(26, 5, '2015-05-11 14:18:58', '2016-12-30 00:00:00', NULL, 'Hillary Clinton will be the first female president of the united states of america. ', 1000.00, 'Hillary Clinton ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cash` decimal(62,2) unsigned NOT NULL DEFAULT '0.00',
  `pending` int(10) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `hash`, `cash`, `pending`, `admin`) VALUES
(1, 'skroob', '$1$uupVzDiU$0HzqFuc1OXnUtEfYrk0Mf0', 8900.00, 1000, 0),
(2, 'daniel', '$1$6ijF1VZt$MnIN16GILTi7kMpROVmXt/', 10000.00, 0, 0),
(3, 'daniel98', '$1$zE.JU4wr$mnWENg9.ZdbuHB56eB9pg0', 10000.00, 0, 1),
(4, 'daniel77', '$1$iUnP16sl$sY1CV1fNa5MHlGLu7Shiq0', 10000.00, 1800, 1),
(5, 'daniel66', '$1$hDFJp1ET$uNgjo.shE/j/wdthekAJY1', 18000.00, 2000, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
