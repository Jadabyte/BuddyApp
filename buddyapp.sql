-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 06, 2020 at 12:40 PM
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `klas` varchar(300) NOT NULL,
  `muziek` varchar(300) NOT NULL,
  `film` varchar(300) NOT NULL,
  `hobby` varchar(300) NOT NULL,
  `favoriet` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interesses`
--

INSERT INTO `interesses` (`id`, `klas`, `muziek`, `film`, `hobby`, `favoriet`) VALUES
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
  `interessesId` int(11) DEFAULT NULL,
  `beBuddy` tinyint(1) DEFAULT NULL,
  `findBuddy` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `username`, `interessesId`, `beBuddy`, `findBuddy`) VALUES
(21, 'Thibaud', 'Streignart', 'd@student.thomasmore.be', '$2y$14$vCdly9Cp99Et.3yN7iCmVuWMx9WdonMs1lWr9Z2HpOxD4W4KXLkq.', '', 1, 0, 0),
(20, 'Thibaud', 'Streignart', 'baud@student.thomasmore.be', '$2y$14$IAKzzAmr.vLuoJtrnqbI8.RSx4t84wk/s2.v3HQAp5by7oQPRAtxe', '', 2, 0, 0),
(19, 'Thibaud', 'Streignart', 'thibaud@student.thomasmore.be', '$2y$14$kudiTU4nqeA4OjuqOXCwaO5T9xMYhYeQdq66U/QMIHtbbjzMeJa/K', '', 3, 0, 0),
(22, 'Thibaud', 'Streignart', 'ts@student.thomasmore.be', '$2y$14$jxecI4Z74nl.svzy8b.EUerI4S6HSeucVWEU0WGRK.N0.DRtyZvW.', 'TStre', 4, 0, 0),
(23, 'Thibaud', 'Streignart', 'yh@student.thomasmore.be', '$2y$14$x7J5sBzlERxpJ5nACKZ.T.xgVQoSB57M0Bf.1oLi3BATsBz0.r.7G', 'dfdfdf', 5, 0, 0),
(33, 'George', 'Washington', 'g.w@student.thomasmore.be', 'password', 'username', 6, 0, 0),
(32, 'Thomas', 'Jefferson', 't.j@student.thomasmore.be', 'password', 'username', 7, 0, 0),
(30, 'Thomas', 'Jefferson', 't.j@student.thomasmore.be', 'password', 'username', 8, 0, 0),
(31, 'George', 'Washington', 'g.w@student.thomasmore.be', 'password', 'username', 0, 0, 0),
(34, 'Abraham', 'Lincoln', 'al@student.thomasmore.be', '$2y$14$CaO2My3VwVrvrTk//1S6sOkC/2ismHO9ZkGE9/nPbpczMbZTLAD9G', 'al', NULL, 0, 1),
(35, 'Jacob', 'Thomasin', 'jt@student.thomasmore.be', '$2y$14$85yzwFXH7pZV/.TmwjWF/.nnpGnd.xl7BOIejYDXElznfEISN9gN.', 'jt', NULL, NULL, NULL),
(36, 'James', 'Lancaster', 'jl@student.thomasmore.be', '$2y$14$du..ldBbmKFu2O4q7cfIau1Vc8KxMyDsTh4iUHCuvpXV6poH0u9IS', 'JL', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
