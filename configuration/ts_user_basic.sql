-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 11, 2017 at 07:04 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turtleshell`
--

-- --------------------------------------------------------

--
-- Table structure for table `ts_user_basic`
--

DROP TABLE IF EXISTS `ts_user_basic`;
CREATE TABLE IF NOT EXISTS `ts_user_basic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(60) DEFAULT NULL,
  `middle_name` varchar(60) DEFAULT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `nick_name` varchar(60) DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `unique_identity` varchar(60) NOT NULL,
  `created_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='UserBasicEntity';

--
-- Dumping data for table `ts_user_basic`
--

INSERT INTO `ts_user_basic` (`id`, `first_name`, `middle_name`, `last_name`, `nick_name`, `gender`, `email`, `unique_identity`, `created_timestamp`, `updated_timestamp`) VALUES
(1, 'Jacke', 'Mor', 'Nollor', 'Jacke', 1, 'jacke.mor.nollor@hotmail.com', 'JH3536KHJHK78KF96NCVWYTU7', '2017-10-01 13:59:24', NULL),
(2, 'Forla', 'Soel', 'Babala', 'Forla', 2, 'forla.soel.babala@gmail.com', 'HGTE8738638459HU9698', '2017-10-11 07:02:49', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
