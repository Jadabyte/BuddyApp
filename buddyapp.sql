-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 24, 2020 at 03:48 PM
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
-- Table structure for table `classrooms`
--

DROP TABLE IF EXISTS `classrooms`;
CREATE TABLE IF NOT EXISTS `classrooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `floor` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `name`, `campus`, `floor`, `description`) VALUES
(1, 'Z3.04', 'De Ham', 3, 'description'),
(2, 'G0.22', 'Kruidtuin', 1, 'Creativity Gym'),
(3, 'Z3.04', 'De Ham', 3, 'description');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_1` int(11) NOT NULL,
  `user_id_2` int(11) NOT NULL,
  `accepted` tinyint(1) NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id_1`, `user_id_2`, `accepted`, `reason`) VALUES
(1, 19, 33, 0, NULL),
(2, 30, 34, 0, NULL),
(3, 19, 34, 1, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interesses`
--

INSERT INTO `interesses` (`id`, `klas`, `muziek`, `film`, `hobby`, `favoriet`) VALUES
(1, '1IMDA', 'pop', 'drama', 'niksen', 'designer'),
(2, '', '', '', '', ''),
(3, '2IMDA', 'Metal', 'Sci-fi', 'Guitar', 'developer'),
(4, '1IMDA', 'rap', 'horror', 'sporten', 'designer'),
(5, '', '', '', '', ''),
(6, 'klas', 'muziek', 'film', 'hobby', 'favoriet'),
(7, '2IMDA', 'jazz', 'comic', 'gamen', 'designer'),
(8, '3IMDA', 'schlager', 'actie', 'netflixen', 'developer'),
(9, '1IMDC', 'schlager', 'comic', 'netflixen', 'designer'),
(10, '1IMDB', 'jazz', 'actie', 'sporten', 'developer'),
(11, '1IMDB', 'jazz', 'comic', 'netflixen', 'designer'),
(12, '1IMDB', 'jazz', 'comic', 'sporten', 'developer');

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
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `username`, `interessesId`, `beBuddy`, `findBuddy`) VALUES
(23, 'Thibaud', 'Streignart', 'yh@student.thomasmore.be', '$2y$14$x7J5sBzlERxpJ5nACKZ.T.xgVQoSB57M0Bf.1oLi3BATsBz0.r.7G', 'dfdfdf', 5, 0, 0),
(33, 'George', 'Washington', 'g.w@student.thomasmore.be', 'password', 'username', 6, 0, 0),
(30, 'Thomas', 'Jefferson', 't.j@student.thomasmore.be', 'password', 'username', 8, 0, 0),
(34, 'Abraham', 'Lincoln', 'al@student.thomasmore.be', '$2y$14$CaO2My3VwVrvrTk//1S6sOkC/2ismHO9ZkGE9/nPbpczMbZTLAD9G', 'al', 10, 0, 1),
(38, 'Elizabeth', 'Eldritch', 'elel@student.thomasmore.be', '$2y$14$4T7LmKmJW.ksVsLsMFJoyOPm9rsRU081vEKQlkoOqBeQ8K6/2o/ee', 'Elel2', NULL, NULL, NULL),
(39, 'Ellen', 'Flack', 'eflack@student.thomasmore.be', '$2y$14$SmJZD3PxFtDGM6dgduFJf.7qZHwA3nE/K2K7HtzQFSIUDF4vWUrCi', 'EFlack', NULL, 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
