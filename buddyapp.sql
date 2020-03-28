-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 27, 2020 at 06:21 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buddyapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `interesses`
--

DROP TABLE IF EXISTS `interesses`;
CREATE TABLE IF NOT EXISTS `interesses` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `klas` varchar(300) NOT NULL,
  `muziek` varchar(300) NOT NULL,
  `film` varchar(300) NOT NULL,
  `hobby` varchar(300) NOT NULL,
  `favoriet` varchar(300) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interesses`
--

INSERT INTO `interesses` (`ID`, `klas`, `muziek`, `film`, `hobby`, `favoriet`) VALUES
(1, '1IMDA', 'pop', 'drama', 'niksen', 'designer'),
(2, '', '', '', '', ''),
(3, '', '', '', '', ''),
(4, '1IMDA', 'rap', 'horror', 'sporten', 'designer'),
(5, '', '', '', '', ''),
(6, 'klas', 'muziek', 'film', 'hobby', 'favoriet'),
(7, '2IMDA', 'jazz', 'comic', 'gamen', 'designer'),
(8, '3IMDA', 'schlager', 'actie', 'netflixen', 'developer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `username`) VALUES
(21, 'Thibaud', 'Streignart', 'd@student.thomasmore.be', '$2y$14$vCdly9Cp99Et.3yN7iCmVuWMx9WdonMs1lWr9Z2HpOxD4W4KXLkq.', ''),
(20, 'Thibaud', 'Streignart', 'baud@student.thomasmore.be', '$2y$14$IAKzzAmr.vLuoJtrnqbI8.RSx4t84wk/s2.v3HQAp5by7oQPRAtxe', ''),
(19, 'Thibaud', 'Streignart', 'thibaud@student.thomasmore.be', '$2y$14$kudiTU4nqeA4OjuqOXCwaO5T9xMYhYeQdq66U/QMIHtbbjzMeJa/K', ''),
(22, 'Thibaud', 'Streignart', 'ts@student.thomasmore.be', '$2y$14$jxecI4Z74nl.svzy8b.EUerI4S6HSeucVWEU0WGRK.N0.DRtyZvW.', 'TStre'),
(23, 'Thibaud', 'Streignart', 'yh@student.thomasmore.be', '$2y$14$x7J5sBzlERxpJ5nACKZ.T.xgVQoSB57M0Bf.1oLi3BATsBz0.r.7G', 'dfdfdf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
