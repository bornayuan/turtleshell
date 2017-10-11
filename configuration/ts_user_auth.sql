-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 11, 2017 at 07:06 AM
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
-- Table structure for table `ts_user_auth`
--

DROP TABLE IF EXISTS `ts_user_auth`;
CREATE TABLE IF NOT EXISTS `ts_user_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `user_basic_id` int(11) NOT NULL COMMENT 'TS_USER_BASIC Primary Key',
  `username` varchar(60) NOT NULL COMMENT 'Username for signing in',
  `password` varchar(60) NOT NULL COMMENT 'Password for signing in',
  `created_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `USER_BASIC_PRIMARY_KEY` (`user_basic_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='UserAuthEntity';

--
-- Dumping data for table `ts_user_auth`
--

INSERT INTO `ts_user_auth` (`id`, `user_basic_id`, `username`, `password`, `created_timestamp`, `updated_timestamp`) VALUES
(1, 1, 'jacke', '123456', '2017-10-11 06:59:23', NULL),
(3, 2, 'forla', '654321', '2017-10-11 07:05:47', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ts_user_auth`
--
ALTER TABLE `ts_user_auth`
  ADD CONSTRAINT `FK_USER_AUTH_AND_BASIC` FOREIGN KEY (`user_basic_id`) REFERENCES `ts_user_basic` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
