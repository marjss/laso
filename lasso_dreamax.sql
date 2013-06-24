-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2013 at 04:11 PM
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
-- Table structure for table `ld_api`
--

CREATE TABLE IF NOT EXISTS `ld_api` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `api_id` int(20) DEFAULT NULL,
  `api_name` varchar(255) DEFAULT NULL,
  `api_version` varchar(255) DEFAULT NULL,
  `status` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ld_banner`
--

CREATE TABLE IF NOT EXISTS `ld_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_name` varchar(300) DEFAULT NULL,
  `banner_image` varchar(300) DEFAULT NULL,
  `status` varchar(3) DEFAULT NULL,
  `adddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ld_banner`
--

INSERT INTO `ld_banner` (`id`, `banner_name`, `banner_image`, `status`, `adddate`) VALUES
(1, 'test', 'banner/49975586_4utpstg.jpg', '1', '2013-06-23 22:39:41');

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
(3, 'street', 'street', 1, '2013-06-20 00:00:00', '2013-06-20 00:00:00', 1),
(4, 'views', 'views', 4, '2013-06-20 00:00:00', '2013-06-20 00:00:00', 1),
(5, 'test 2', 'test 2', 5, '2013-06-20 00:00:00', '2013-06-20 00:00:00', 1),
(6, 'test1', 'test1', 6, '2013-06-20 00:00:00', '2013-06-20 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ld_cities`
--

CREATE TABLE IF NOT EXISTS `ld_cities` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `state_id` int(20) DEFAULT NULL,
  `country_id` int(20) DEFAULT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ld_contactus`
--

CREATE TABLE IF NOT EXISTS `ld_contactus` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_subject` varchar(255) DEFAULT NULL,
  `contact_message` text,
  `add_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ld_country`
--

CREATE TABLE IF NOT EXISTS `ld_country` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ld_filters`
--

CREATE TABLE IF NOT EXISTS `ld_filters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
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

INSERT INTO `ld_filters` (`id`, `cat_id`, `hotel_id`, `title`, `description`, `pos`, `added_date`, `status`, `note`) VALUES
(1, 2, 1, 'refrigerator', 'refrigerator', 1, '2013-06-20 12:02:02', 1, 'asdasd'),
(2, 2, 1, 'A.C', 'A.C', 2, '2013-06-20 12:21:04', 1, 'asdasd'),
(3, 1, 1, 'New Place', 'New okca', 2, '2013-06-20 12:23:13', 1, 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `ld_gallery`
--

CREATE TABLE IF NOT EXISTS `ld_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `thumb_image` varchar(255) NOT NULL,
  `full_image` varchar(255) NOT NULL,
  `add_date` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `ld_gallery`
--

INSERT INTO `ld_gallery` (`id`, `product_id`, `thumb_image`, `full_image`, `add_date`, `status`) VALUES
(9, 3, '126602_Penguins.jpg', '126602_Penguins.jpg', '2013-06-23 11:02:25', '1'),
(10, 3, '126602_Jellyfish.jpg', '126602_Jellyfish.jpg', '2013-06-23 11:02:25', '0'),
(11, 1, '437789_4utpstg.jpg', '437789_4utpstg.jpg', '2013-06-24 10:31:07', '0'),
(12, 1, '437789_4ytcpxu.jpg', '437789_4ytcpxu.jpg', '2013-06-24 10:31:07', '0'),
(13, 2, '276647_663iy6o.jpg', '276647_663iy6o.jpg', '2013-06-24 10:31:52', '1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ld_hotels`
--

INSERT INTO `ld_hotels` (`id`, `user_id`, `name`, `description`, `avatar`, `street`, `city`, `address`, `state`, `country`, `album_id`, `other`, `status`) VALUES
(1, 0, 'test', 'this is test description in the htoel description', 'avatar/77456665_16.JPG', 'test', 'test', 'test', 'test', 'test', 1, 'test note', '1'),
(2, 0, 'new hotel', 'this is new hotel description', 'avatar/92407226_4zapytj.jpg', 'street', 'city', 'address sddress', 'state', 'country', 2, 'other notes', '1'),
(3, 0, 'tester', 'the main test list', 'avatar/52655029_Penguins.jpg', 'street', 'city', 'address', 'state', 'country', 1, '1', '1');

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
-- Table structure for table `ld_pages`
--

CREATE TABLE IF NOT EXISTS `ld_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` double DEFAULT NULL,
  `pagename` varchar(300) DEFAULT NULL,
  `contents` blob,
  `keyword` varchar(600) DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `description` varchar(1500) DEFAULT NULL,
  `extpage_link` varchar(300) DEFAULT NULL,
  `published` double DEFAULT NULL,
  `parent_id` double DEFAULT NULL,
  `secure_access` double DEFAULT NULL,
  `footer` double DEFAULT NULL,
  `menu_order` varchar(30) DEFAULT NULL,
  `status` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ld_pages`
--

INSERT INTO `ld_pages` (`id`, `section_id`, `pagename`, `contents`, `keyword`, `title`, `description`, `extpage_link`, `published`, `parent_id`, `secure_access`, `footer`, `menu_order`, `status`) VALUES
(1, 1, '1', 0x3c703e3c7370616e207374796c653d226261636b67726f756e642d636f6c6f723a207267622838342c203134312c20323132293b223e266e6273703b746573742074657374207465737420746573742074657374203c2f7370616e3e3c62723e0d0a3c2f703e0d0a0d0a3c7461626c652069643d227461626c653637333638223e0d0a3c74626f64793e0d0a093c74723e0d0a09093c74643e266e6273703b3c2f74643e0d0a0d0a09093c746420636c6173733d22223e266e6273703b61736461733c2f74643e0d0a0d0a09093c746420636c6173733d22223e617364617364617364203c62723e0d0a3c2f74643e0d0a093c2f74723e0d0a0d0a093c74723e0d0a09093c74643e266e6273703b3c2f74643e0d0a0d0a09093c746420636c6173733d22223e266e6273703b6173646173643c2f74643e0d0a0d0a09093c746420636c6173733d2263757272656e74223e266e6273703b61736461736461736461736473643c62723e0d0a3c62723e0d0a0d0a3c626c6f636b71756f74653e3c64697620616c69676e3d226a757374696679223e0d0a3c626c6f636b71756f74653e0d0a3c626c6f636b71756f74653e61666173663c62723e0d0a3c2f626c6f636b71756f74653e0d0a3c2f626c6f636b71756f74653e0d0a3c2f6469763e0d0a3c2f626c6f636b71756f74653e0d0a3c2f74643e0d0a093c2f74723e0d0a3c2f74626f64793e0d0a3c2f7461626c653e0d0a, 'about us', 'About us', 'about us', 'none', 1, 1, 0, 1, '1', '1'),
(2, NULL, NULL, 0x0d0a3c626c6f636b71756f74653e0d0a3c626c6f636b71756f74653e0d0a3c626c6f636b71756f74653e3c703e7468697320697320746573742070616765206e6f7468696e67206973206865726520746f206c6f6f6b2075706f6e3c62723e0d0a3c2f703e0d0a3c2f626c6f636b71756f74653e0d0a3c2f626c6f636b71756f74653e0d0a3c2f626c6f636b71756f74653e0d0a, 'test page, test', 'test page', 'test page', NULL, NULL, NULL, NULL, NULL, '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ld_social_network`
--

CREATE TABLE IF NOT EXISTS `ld_social_network` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) DEFAULT NULL,
  `site_url` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `add_date` datetime DEFAULT NULL,
  `status` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ld_state`
--

CREATE TABLE IF NOT EXISTS `ld_state` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `country_id` int(20) DEFAULT NULL,
  `state_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ld_users`
--

CREATE TABLE IF NOT EXISTS `ld_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mas_role_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `activation_key` varchar(255) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `log` varchar(255) DEFAULT '0',
  `add_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ld_users`
--

INSERT INTO `ld_users` (`id`, `mas_role_id`, `username`, `email`, `password`, `activation_key`, `status`, `log`, `add_date`) VALUES
(1, 1, 'admin', 'admin@admin.com', '123456', NULL, '1', '0', '2013-06-22 17:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `ld_user_details`
--

CREATE TABLE IF NOT EXISTS `ld_user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscriber`
--

CREATE TABLE IF NOT EXISTS `tbl_subscriber` (
  `id` double DEFAULT NULL,
  `subscriber_name` varchar(300) DEFAULT NULL,
  `subscriber_email` varchar(300) DEFAULT NULL,
  `subscriber_group` varchar(30) DEFAULT NULL,
  `status` varchar(3) DEFAULT NULL,
  `adddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modifydate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subscriber`
--

INSERT INTO `tbl_subscriber` (`id`, `subscriber_name`, `subscriber_email`, `subscriber_group`, `status`, `adddate`, `modifydate`) VALUES
(10, 'manjeet singh ghandhi', 'manjeets@gmail.com', '1', 'Y', '2012-11-26 13:49:26', '0000-00-00 00:00:00'),
(11, 'cmdhakar', 'cmcs.dhk@gmail.com', '1', 'Y', '2012-11-26 13:50:01', '0000-00-00 00:00:00'),
(12, 'fdgdf', 'motilalsoni@gamil.com', NULL, 'N', '2013-02-01 06:42:01', '0000-00-00 00:00:00'),
(13, 'ssdfs', 'dfgdf@gmail.com', '1', 'N', '2013-02-01 06:42:17', '0000-00-00 00:00:00'),
(14, 'fddg', 'dfgdf@gmail.com', '2', 'N', '2013-02-04 11:38:07', '0000-00-00 00:00:00'),
(15, 'fgd', 'motilalsoni@gamil.com', '2', 'Y', '2013-02-05 07:46:05', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
