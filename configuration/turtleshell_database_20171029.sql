-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 29, 2017 at 07:10 AM
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
-- Table structure for table `ts_article_basic`
--

DROP TABLE IF EXISTS `ts_article_basic`;
CREATE TABLE IF NOT EXISTS `ts_article_basic` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `article_category_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `created_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ARTICLE_CATEGORY_ID` (`article_category_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='ArticleBasicEntity';

--
-- Dumping data for table `ts_article_basic`
--

INSERT INTO `ts_article_basic` (`id`, `article_category_id`, `title`, `content`, `created_timestamp`, `updated_timestamp`) VALUES
(1, 1, 'Welcome', 'This is first artile!', '2017-10-29 07:09:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ts_article_category`
--

DROP TABLE IF EXISTS `ts_article_category`;
CREATE TABLE IF NOT EXISTS `ts_article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `name` varchar(60) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='ArticleCategoryEntity';

--
-- Dumping data for table `ts_article_category`
--

INSERT INTO `ts_article_category` (`id`, `name`, `description`, `created_timestamp`, `updated_timestamp`) VALUES
(1, 'Default', 'Default Category', '2017-10-29 07:08:35', NULL);

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
  KEY `USER_BASIC_ID` (`user_basic_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='UserAuthEntity';

--
-- Dumping data for table `ts_user_auth`
--

INSERT INTO `ts_user_auth` (`id`, `user_basic_id`, `username`, `password`, `created_timestamp`, `updated_timestamp`) VALUES
(1, 1, 'jacke', '123456', '2017-10-29 03:52:59', NULL);

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
  `gender` int(1) DEFAULT '0',
  `email` varchar(60) DEFAULT NULL,
  `unique_identity` varchar(60) NOT NULL,
  `created_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='UserBasicEntity';

--
-- Dumping data for table `ts_user_basic`
--

INSERT INTO `ts_user_basic` (`id`, `first_name`, `middle_name`, `last_name`, `nick_name`, `gender`, `email`, `unique_identity`, `created_timestamp`, `updated_timestamp`) VALUES
(1, 'Jackey', 'Mor', 'Nollor', 'Jackey', 1, 'jack.mor.nollor@hotmail.com', 'SY7496869HFI750083452872095', '2017-10-29 03:49:40', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ts_article_basic`
--
ALTER TABLE `ts_article_basic`
  ADD CONSTRAINT `FK_ARTICLE_BASIC_AND_ARTICLE_CATEGORY` FOREIGN KEY (`article_category_id`) REFERENCES `ts_article_category` (`id`);

--
-- Constraints for table `ts_user_auth`
--
ALTER TABLE `ts_user_auth`
  ADD CONSTRAINT `FK_USER_AUTH_AND_USER_BASIC` FOREIGN KEY (`user_basic_id`) REFERENCES `ts_user_basic` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
