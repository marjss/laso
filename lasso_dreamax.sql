-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2013 at 06:13 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lasso_dreamax`
--

-- --------------------------------------------------------

--
-- Table structure for table `ld_categories`
--

CREATE TABLE IF NOT EXISTS `ld_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `pos` int(11) DEFAULT NULL,
  `added_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ld_categories`
--

INSERT INTO `ld_categories` (`id`, `title`, `description`, `pos`, `added_date`, `modified_date`, `status`) VALUES
(1, 'place', 'places', 3, '2013-06-20 00:00:00', '2013-06-20 00:00:00', 1),
(2, 'interior', 'interiors', 2, '2013-06-20 00:00:00', '2013-06-20 00:00:00', 1),
(3, 'street', 'street', 4, '2013-06-20 00:00:00', '2013-06-20 00:00:00', 1),
(4, 'views', 'views', 1, '2013-06-20 00:00:00', '2013-06-20 00:00:00', 1),
(5, 'test 2', 'test 2', 5, '2013-06-20 00:00:00', '2013-06-20 00:00:00', 1),
(6, 'test1', 'test1', 6, '2013-06-20 00:00:00', '2013-06-20 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ld_filters`
--

CREATE TABLE IF NOT EXISTS `ld_filters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  `added_date` timestamp NULL DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `note` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ld_filters`
--

INSERT INTO `ld_filters` (`id`, `cat_id`, `title`, `description`, `pos`, `added_date`, `status`, `note`) VALUES
(1, 2, 'refrigerator', 'refrigerator', 1, '2013-06-20 12:02:02', 1, 'asdasd'),
(2, 2, 'A.C', 'A.C', 2, '2013-06-20 12:21:04', 1, 'asdasd'),
(3, 1, 'New Place', 'New okca', 2, '2013-06-20 12:23:13', 1, 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `ld_hotels`
--

CREATE TABLE IF NOT EXISTS `ld_hotels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `avatar` varchar(255) DEFAULT '0',
  `street` varchar(255) DEFAULT '0',
  `city` varchar(255) DEFAULT '0',
  `address` varchar(1024) DEFAULT '0',
  `state` varchar(255) DEFAULT '0',
  `country` varchar(255) DEFAULT '0',
  `album_id` int(11) DEFAULT '0',
  `other` varchar(1024) DEFAULT '0',
  `status` varchar(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ld_hotels`
--

INSERT INTO `ld_hotels` (`id`, `user_id`, `name`, `description`, `avatar`, `street`, `city`, `address`, `state`, `country`, `album_id`, `other`, `status`) VALUES
(1, 0, 'test', 'this is test description in the htoel description', 'avatar/77456665_16.JPG', 'test', 'test', 'test', 'test', 'test', 1, 'test note', '1'),
(2, 0, 'new hotel', 'this is new hotel description', 'avatar/92407226_4zapytj.jpg', 'street', 'city', 'address sddress', 'state', 'country', 2, 'other notes', '1'),
(3, 0, 'tester 2', 'this is test description in the htoel description', 'avatar/40341187_6gvwyn8.jpg', 'street', 'city', 'address', 'state', 'country', 3, 'this', '1'),
(4, 0, 'gifa', 'hello this is one of the most lorem', 'avatar/67675781_18_09_2008_0938361001221752191_soemone.jpg', 'street', 'city', 'adasd0', 'state', 'country', 4, 'test note', '1'),
(5, 0, 'sudhanshu', 'this is awesome site on the web', 'avatar/64334106_663iy6o.jpg', 'street', 'city', 'address', 'state', 'country', 5, 'test note', '1'),
(6, 0, 'human', 'humar cybrg in the modified society of the nature in the q', 'avatar/73529052_18_09_2008_0976336001221752191_soemone.jpg', 'street', 'city', 'address', 'state', 'country', 6, 'test note', '1'),
(7, 0, 'kite', 'kite is one of the most powerful source in the universe.thics can be dont', 'avatar/80465698_18_09_2008_0954610001221752191_soemone.jpg', 'street', 'hiedi', 'address', 'state', 'country', 7, '4', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ld_hotel_filters`
--

CREATE TABLE IF NOT EXISTS `ld_hotel_filters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ld_hotel_filters`
--

INSERT INTO `ld_hotel_filters` (`id`, `hotel_id`, `filter_id`, `status`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ld_users`
--

CREATE TABLE IF NOT EXISTS `ld_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mas_role_id` int(11) NOT NULL DEFAULT '0',
  `merchant_id` int(11) NOT NULL DEFAULT '0',
  `featured` tinyint(4) NOT NULL,
  `onlinebooking` tinyint(4) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `activation_key` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `log` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
