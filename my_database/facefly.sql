-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2019 at 09:09 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facefly`
--

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

DROP TABLE IF EXISTS `airlines`;
CREATE TABLE IF NOT EXISTS `airlines` (
  `airline_id` int(11) NOT NULL AUTO_INCREMENT,
  `airline_name` varchar(55) CHARACTER SET utf8 NOT NULL,
  `airline_nation_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`airline_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`airline_id`, `airline_name`, `airline_nation_id`) VALUES
(1, 'Viet Nam Airline', 1),
(2, 'VietJet', 1),
(3, 'Jetstar', 2);

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

DROP TABLE IF EXISTS `airports`;
CREATE TABLE IF NOT EXISTS `airports` (
  `airport_id` int(11) NOT NULL AUTO_INCREMENT,
  `airport_name` varchar(55) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`airport_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`airport_id`, `airport_name`) VALUES
(1, 'Tân Sơn Nhất'),
(2, '	Nội Bài'),
(3, '	Cam Ranh');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(55) CHARACTER SET utf8 NOT NULL,
  `city_code` varchar(15) CHARACTER SET utf8 NOT NULL,
  `city_airport_id` int(11) DEFAULT NULL,
  `city_nation_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `city_code`, `city_airport_id`, `city_nation_id`) VALUES
(1, 'Hồ Chí Minh', 'SGN', 1, 1),
(2, 'Cần Thơ', 'CT', 2, 1),
(3, 'Đà Nẵng', 'DN', 3, 3),
(4, 'Hà Nội', 'HN', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_user_id` int(11) DEFAULT NULL,
  `customer_first_name` varchar(55) CHARACTER SET utf8 NOT NULL,
  `customer_last_name` varchar(16) CHARACTER SET utf8 NOT NULL,
  `customer_title` varchar(16) CHARACTER SET utf8 NOT NULL,
  `customer_transfer` varchar(55) CHARACTER SET utf8 NOT NULL,
  `customer_paypal` varchar(55) CHARACTER SET utf8 NOT NULL,
  `customer_credit_card` int(16) DEFAULT NULL,
  `customer_credit_name` varchar(55) CHARACTER SET utf8 NOT NULL,
  `customer_credit_ccv` varchar(8) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_user_id`, `customer_first_name`, `customer_last_name`, `customer_title`, `customer_transfer`, `customer_paypal`, `customer_credit_card`, `customer_credit_name`, `customer_credit_ccv`) VALUES
(1, 1, 'Nguyễn', 'user1', 'Mr.', '', '', NULL, '', ''),
(2, 2, 'Trần', 'user2', 'Mrs.', '', '', NULL, '', ''),
(3, 3, 'Lê', 'user3', 'Mr.', '', '', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `flight_booking`
--

DROP TABLE IF EXISTS `flight_booking`;
CREATE TABLE IF NOT EXISTS `flight_booking` (
  `fb_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`fb_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flight_booking`
--

INSERT INTO `flight_booking` (`fb_id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `flight_classes`
--

DROP TABLE IF EXISTS `flight_classes`;
CREATE TABLE IF NOT EXISTS `flight_classes` (
  `fc_id` int(11) NOT NULL AUTO_INCREMENT,
  `fc_name` varchar(55) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`fc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flight_classes`
--

INSERT INTO `flight_classes` (`fc_id`, `fc_name`) VALUES
(1, 'Economy'),
(2, 'Business'),
(3, 'Premium Economy');

-- --------------------------------------------------------

--
-- Table structure for table `flight_list`
--

DROP TABLE IF EXISTS `flight_list`;
CREATE TABLE IF NOT EXISTS `flight_list` (
  `fl_id` int(11) NOT NULL AUTO_INCREMENT,
  `fl_fc_id` int(11) DEFAULT NULL,
  `fl_airline_id` int(11) DEFAULT NULL,
  `fl_code` varchar(15) CHARACTER SET utf8 NOT NULL,
  `fl_total` int(11) DEFAULT NULL,
  `fl_cost` float DEFAULT NULL,
  `fl_city_from_id` int(11) DEFAULT NULL,
  `fl_city_to_id` int(11) DEFAULT NULL,
  `fl_departure_date` datetime DEFAULT NULL,
  `fl_landing_date` datetime DEFAULT NULL,
  `fl_return_date` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`fl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flight_list`
--

INSERT INTO `flight_list` (`fl_id`, `fl_fc_id`, `fl_airline_id`, `fl_code`, `fl_total`, `fl_cost`, `fl_city_from_id`, `fl_city_to_id`, `fl_departure_date`, `fl_landing_date`, `fl_return_date`, `updated_at`) VALUES
(1, 2, 1, 'VVCS/VCS', 100, 1500000, 1, 2, '2019-03-06 06:00:00', '2019-03-06 12:00:00', '2019-03-08 09:00:00', '2019-03-19 09:52:13'),
(2, 2, 2, 'VVCT/VCA', 150, 800000, 1, 3, '2019-03-07 07:20:00', '2019-03-08 10:00:00', '2019-03-10 08:08:00', NULL),
(3, 3, 3, 'VVTS/SGN', 200, 500000, 2, 3, '2019-03-06 10:20:00', '2019-03-07 06:00:00', '2019-03-11 08:00:00', NULL),
(4, 2, 1, 'test', 1, 1, 1, 1, '2019-03-29 00:00:00', '2019-03-29 00:00:00', '2019-03-29 00:00:00', NULL),
(5, 2, 1, 'test1', 10, 10000, 1, 4, '2019-03-29 00:00:00', '2019-03-29 00:00:00', '2019-03-29 00:00:00', NULL),
(6, 1, 3, 'test1', 1, 1, 1, 2, '2019-03-29 00:00:00', '2019-03-14 00:00:00', '2019-03-28 00:00:00', NULL),
(7, 3, 1, 'test1', 10, 10000, 1, 2, '2019-03-29 00:00:00', '2019-03-29 00:00:00', '2019-03-29 00:00:00', NULL),
(8, 1, 1, 'test3', 1, 1, 1, 4, '2019-03-15 00:00:00', '2019-03-21 00:00:00', '2019-03-21 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nations`
--

DROP TABLE IF EXISTS `nations`;
CREATE TABLE IF NOT EXISTS `nations` (
  `nation_id` int(11) NOT NULL AUTO_INCREMENT,
  `nation_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`nation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nations`
--

INSERT INTO `nations` (`nation_id`, `nation_name`, `country_id`) VALUES
(1, 'Mỹ', '2'),
(2, 'Hàn Quốc', '1,3'),
(3, 'Nhật Bản', '2');

-- --------------------------------------------------------

--
-- Table structure for table `transits`
--

DROP TABLE IF EXISTS `transits`;
CREATE TABLE IF NOT EXISTS `transits` (
  `transit_id` int(11) NOT NULL AUTO_INCREMENT,
  `transit_city_id` int(11) DEFAULT NULL,
  `transit_departure_date` datetime DEFAULT NULL,
  `transit_landing_date` datetime DEFAULT NULL,
  `transit_fl_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`transit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transits`
--

INSERT INTO `transits` (`transit_id`, `transit_city_id`, `transit_departure_date`, `transit_landing_date`, `transit_fl_id`) VALUES
(1, 3, '2019-03-07 04:00:00', '2019-03-07 09:00:00', 1),
(2, 4, '2019-03-07 12:00:00', '2019-03-07 13:00:00', 3),
(3, 3, '2019-03-07 03:00:00', '2019-03-07 12:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_first_name` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `user_last_name` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `user_phone` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `user_address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_last_access` datetime DEFAULT NULL,
  `user_attempt` int(11) DEFAULT NULL,
  `user_status` tinyint(4) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `user_first_name`, `user_last_name`, `user_phone`, `user_address`, `user_last_access`, `user_attempt`, `user_status`, `updated_at`) VALUES
(4, 'user1@gmail.com', '$2y$10$xD6pn.CawsS41YRPf0g1q.1gxQqYF5AFuVSqVjw5ui/TGkhMig1j6', 'user1', NULL, '01234567', 'Quận 9', '2019-03-12 02:38:53', 4, 0, '2019-03-12 02:38:53'),
(5, 'user2@gmail.com', '$2y$10$eFl6HY8TmEqrDoqdMcEXsulSJPYUOiDOwKomrLbJjKocO9iSd8PjK', 'user2', NULL, '01234567', NULL, '2019-03-06 06:13:37', 4, 0, '2019-03-06 06:13:37'),
(6, 'user3@gmail.com', '$2y$10$ZlzckoqUnXzq/If3Etk9AO2I1sK0R1cmO95ucQbYVKsLGyRJIk9yy', 'user3', NULL, '0123456789', 'Quận 9, Thủ Đức', '2019-03-05 07:53:52', 0, 1, '2019-03-05 08:00:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
