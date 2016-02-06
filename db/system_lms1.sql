-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2016 at 01:18 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `system_lms1`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `type` varchar(50) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_register` date NOT NULL,
  PRIMARY KEY (`id_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`type`, `id_number`, `password`, `date_register`) VALUES
('student', '1', 'hi', '2016-01-23'),
('faculty', '2', 'bb', '2016-01-23'),
('student', '3', 'hello', '2016-01-23'),
('faculty', '4', 'happy', '2016-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `acc_admin`
--

CREATE TABLE IF NOT EXISTS `acc_admin` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `position` varchar(50) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `acc_admin`
--

INSERT INTO `acc_admin` (`user_id`, `type`, `username`, `password`, `position`, `firstname`, `lastname`) VALUES
(1, 'admin', 'admin', 'admin', 'Librarian', 'Cristhel', 'Gadi'),
(2, 'staff', 'staff', 'staff', 'Assistant', 'Cris', 'Gad');

-- --------------------------------------------------------

--
-- Table structure for table `acquisition`
--

CREATE TABLE IF NOT EXISTS `acquisition` (
  `acq_id` int(11) NOT NULL AUTO_INCREMENT,
  `acq_name` varchar(50) NOT NULL,
  PRIMARY KEY (`acq_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `acquisition`
--

INSERT INTO `acquisition` (`acq_id`, `acq_name`) VALUES
(1, 'Exchange'),
(2, 'Donate'),
(3, 'Purchase');

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE IF NOT EXISTS `book_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`category_id`, `classname`) VALUES
(1, 'General Works'),
(2, 'History'),
(3, 'Agriculture'),
(4, 'Technology'),
(5, 'Music'),
(6, 'Fine Arts'),
(7, 'Language and Literature'),
(8, 'Sciences'),
(9, 'Social Sciences'),
(10, 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `book_copy`
--

CREATE TABLE IF NOT EXISTS `book_copy` (
  `copy_id` int(11) NOT NULL AUTO_INCREMENT,
  `access_id` int(11) NOT NULL,
  `copy` int(11) NOT NULL,
  `available_no` varchar(50) NOT NULL,
  PRIMARY KEY (`copy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `book_copy`
--

INSERT INTO `book_copy` (`copy_id`, `access_id`, `copy`, `available_no`) VALUES
(46, 1, 9, '8'),
(47, 2, 2, '1'),
(48, 3, 3, '2'),
(49, 4, 10, '9'),
(50, 5, 4, '3'),
(51, 6, 5, '4'),
(52, 7, 5, '4'),
(53, 8, 3, '2'),
(54, 9, 4, '3'),
(55, 10, 2, '1'),
(56, 11, 11, '16'),
(57, 12, 2, '1'),
(58, 13, 4, '3'),
(59, 14, 5, '4'),
(60, 15, 1, '0'),
(61, 16, 1, '0'),
(62, 17, 1, '0'),
(63, 18, 2, '1'),
(64, 19, 2, '1'),
(65, 20, 2, '1'),
(66, 21, 2, 'N/A'),
(67, 22, 2, '1'),
(68, 23, 4, '3'),
(69, 24, 2, '1'),
(70, 25, 4, '3'),
(71, 26, 2, '1'),
(72, 27, 3, '2'),
(73, 28, 2, '1'),
(74, 29, 2, '1'),
(75, 30, 3, '2'),
(76, 31, 2, '1'),
(77, 32, 2, '1'),
(78, 33, 3, '2'),
(79, 34, 2, '1'),
(80, 35, 2, '1'),
(81, 36, 2, '1'),
(82, 37, 2, '1'),
(83, 38, 2, '1'),
(84, 39, 2, '1'),
(85, 40, 5, '4'),
(86, 41, 4, '3'),
(87, 42, 4, '3'),
(88, 43, 5, '4'),
(89, 44, 5, '4'),
(90, 45, 4, '3'),
(91, 46, 5, '4'),
(92, 47, 2, '1'),
(93, 48, 2, '1'),
(94, 49, 3, '2'),
(95, 50, 4, '3'),
(96, 51, 1, '0'),
(97, 52, 2, 'N/A'),
(98, 53, 3, '2'),
(99, 54, 10, '9'),
(100, 55, 5, '4');

-- --------------------------------------------------------

--
-- Table structure for table `book_info`
--

CREATE TABLE IF NOT EXISTS `book_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `publisher_name` varchar(100) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `copyright_date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `book_info`
--

INSERT INTO `book_info` (`id`, `access_id`, `category_id`, `Author`, `publisher_name`, `isbn`, `copyright_date`) VALUES
(59, 1, 1, '1', '1', '1', '2015'),
(60, 2, 2, 'b', 'a', '1', '2015'),
(61, 3, 6, 'a', 'asd', '0', '2015'),
(62, 4, 5, 'asd', 'asdsd', '12', '2015'),
(63, 5, 7, 'baran, stanley', 'hhgk kj', '123-39238-234', '2015'),
(64, 6, 2, 'sd', 'sd', 'sds', '2015'),
(65, 7, 2, 'd', 'd', 'd', '2015'),
(66, 8, 3, 'd', 'd', 'f', '2015'),
(67, 9, 6, 'fg', 'fg', 'fg', '2015'),
(68, 10, 3, 'df', '1', '123', '2015'),
(69, 11, 5, 'zzzz', 'zzzz', '123', '2015'),
(70, 12, 3, 'df', 'fd', '123', '2015'),
(71, 13, 1, 'tttttt', '1', '123', '2015'),
(72, 14, 4, 'gadi, cristhel', 'nnnnnnnda', '12345-3942', '2018'),
(73, 15, 5, 'md, dlfs ; djd, kd', 'dkfal', '1', '2015'),
(74, 16, 9, 'gadi, cristhel', 'hhgk kj', '123-39238-234', '2010'),
(75, 17, 10, 'gadi, cristhel', 'hhgk kj', '123-39238-234', '2010'),
(76, 18, 2, 'df', 'hhbbb', '2', '2018'),
(77, 19, 5, 'gadi, cristhel', 'hhgk kj', '123-39238-234', '2010'),
(78, 20, 3, 'gadi, cristhel', 'hhgk kj', '9829', '2010'),
(79, 21, 3, 'gadi, cristhel', '1', '123-39238-234', '2010'),
(80, 22, 2, 'gadi, cristhel', 'hhgk kj', '123-39238-234', '2010'),
(81, 23, 3, 'gadi, cristhel', 'hhgk kj', '123-39238-234', '2010'),
(82, 24, 6, 'gadi, cristhel', 'hhgk kj', '1', '2018'),
(83, 25, 3, '1', 'yu', '1', '2010'),
(84, 26, 1, 'df', '1', '123', '2010'),
(85, 27, 2, 'df', 'yu', '123', '2018'),
(86, 28, 1, 'a', 'yu', '13', '2015'),
(87, 29, 1, 'asd', 'hhgk kj', '1', '2010'),
(88, 30, 8, 'yu', 'hhgk kj', '123-39238-234', '2015'),
(89, 31, 4, 'df', 'hhgk kj', '1', '2010'),
(90, 32, 3, 'gadi, cristhel', 'hhgk kj', '1', '2015'),
(91, 33, 3, 's', 'sd', '13', '2019'),
(92, 34, 10, 'gadi, cristhel', 'hhgk kj', '1', '2010'),
(93, 35, 2, 'ad', 'hi', '13', '2001'),
(94, 36, 10, 'hi', 'hi', '2132', '2010'),
(95, 37, 2, 'af', 'afa', '1341', '2001'),
(96, 38, 9, 'a', 'yu', '1314', '2009'),
(97, 39, 4, 'df', 'gh', '1230-897-9', '2007'),
(98, 40, 2, 'f', 'f', 'f', '2015'),
(99, 41, 2, 'g', 'g', 'g', '2010'),
(100, 42, 2, 'gadi, cristhel', 'hhgk kj', '123-39238-234', '2015'),
(101, 43, 1, 'df', 'yu', '123-39238-234', '2010'),
(102, 44, 3, 'df', 'hhgk kj', '123-39238-234', '2015'),
(103, 45, 1, 'gadi, cristhel', 'yu', '123', '2010'),
(104, 46, 2, 'gadi, cristhel', 'yu', '123-39238-234', '2015'),
(105, 47, 1, 'df', 'yu', '1', '2010'),
(106, 48, 2, 'gadi, cristhel', 'hhgk kj', '123-39238-234', '2010'),
(107, 49, 3, 'sdsds', 'sds', '3434', '2010'),
(108, 50, 2, 'fdg', 'yu', '123-39238-234', '2010'),
(109, 51, 2, 'gadi, cristhel', 'yu', '34534', '2010'),
(110, 52, 2, 'df', 'hhgk kj', '123-39238-234', '2010'),
(111, 53, 1, 'gadi, cristhel', 'yu', '123-39238-234', '2015'),
(112, 54, 2, 'gadi, cristhel', 'hhgk kj', '123-39238-234', '2015'),
(113, 55, 2, 'gadi, cristhel', 'yu', '123-39238-234', '2015');

-- --------------------------------------------------------

--
-- Table structure for table `book_title`
--

CREATE TABLE IF NOT EXISTS `book_title` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `access_id` int(11) NOT NULL,
  `acc_num` int(11) DEFAULT NULL,
  `call_num` varchar(100) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `stat_book` varchar(55) NOT NULL,
  `acquisition_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=612 ;

--
-- Dumping data for table `book_title`
--

INSERT INTO `book_title` (`book_id`, `access_id`, `acc_num`, `call_num`, `book_title`, `stat_book`, `acquisition_id`, `date_added`) VALUES
(419, 1, 1, '1', '1', 'Reserve', 1, '2016-01-11 09:05:45'),
(420, 1, 2, '1', '1', 'Borrow', 1, '2016-01-11 09:05:45'),
(421, 1, 3, '1', '1', 'Borrow', 1, '2016-01-11 09:05:45'),
(422, 1, 4, '1', '1', 'Borrow', 1, '2016-01-11 09:05:45'),
(423, 1, 5, '1', '1', 'Borrow', 1, '2016-01-11 09:05:45'),
(424, 2, 6, '1', 'b', 'Reserve', 1, '2016-01-11 09:09:39'),
(425, 2, 7, '1', 'b akeetitit', 'Borrow', 1, '2016-01-11 09:09:39'),
(426, 1, 8, '1', '1', 'Borrow', 1, '2016-01-11 09:10:16'),
(427, 1, 9, '1', '1', 'Borrow', 1, '2016-01-11 09:10:16'),
(428, 1, 10, '1', '1', 'Borrow', 1, '2016-01-11 09:40:54'),
(429, 1, 11, '1', '1', 'Borrow', 1, '2016-01-11 09:40:54'),
(430, 3, 12, 'asd', 'd', 'Reserve', 2, '2016-01-12 06:20:44'),
(431, 3, 13, 'asd', 'd', 'Available', 2, '2016-01-12 06:20:44'),
(432, 3, 14, 'asd', 'd', 'Borrow', 2, '2016-01-12 06:20:44'),
(433, 4, 15, '201ks', 'ccc', 'Reserve', 2, '2016-01-12 09:22:25'),
(434, 4, 16, '201ks', 'ccc', 'Borrow', 2, '2016-01-12 09:22:25'),
(435, 4, 17, '201ks', 'ccc', 'Borrow', 2, '2016-01-12 09:22:25'),
(436, 4, 18, '201ks', 'ccc', 'Borrow', 2, '2016-01-12 09:22:25'),
(437, 4, 19, '201ks', 'ccc', 'Borrow', 2, '2016-01-12 09:22:25'),
(438, 4, 20, '201ks', 'ccc', 'Borrow', 2, '2016-01-12 09:22:25'),
(439, 4, 21, '201ks', 'ccc', 'Available', 2, '2016-01-12 09:22:25'),
(440, 4, 22, '201ks', 'ccc', 'Borrow', 1, '2016-01-12 09:22:25'),
(441, 4, 23, '201ks', 'ccc', 'Borrow', 1, '2016-01-12 09:22:25'),
(442, 4, 24, '201ks', 'ccc', 'Borrow', 1, '2016-01-12 09:22:25'),
(443, 5, 25, '103-s', 'Introduction to Mass Media Communications & Media Literacy & Culture', 'Reserve', 1, '2016-01-16 14:23:29'),
(444, 5, 26, '103-s', 'Introduction to Mass Media Communications & Media Literacy & Culture', 'Available', 1, '2016-01-16 14:23:29'),
(445, 5, 27, '103-s', 'Introduction to Mass Media Communications & Media Literacy & Culture', 'Available', 1, '2016-01-16 14:23:29'),
(446, 5, 28, '103-s', 'Introduction to Mass Media Communications & Media Literacy & Culture', 'Available', 1, '2016-01-16 14:23:29'),
(447, 6, 29, 'sd', 'sd', 'Reserve', 2, '2016-01-18 13:33:02'),
(448, 6, 30, 'sd', 'sd', 'Available', 2, '2016-01-18 13:33:02'),
(449, 6, 31, 'sd', 'sd', 'Available', 2, '2016-01-18 13:33:02'),
(450, 6, 32, 'sd', 'sd', 'Available', 2, '2016-01-18 13:33:02'),
(451, 6, 33, 'sd', 'sd', 'Available', 2, '2016-01-18 13:33:02'),
(452, 7, 34, '5', 'd', 'Reserve', 2, '2016-01-18 13:33:49'),
(453, 7, 35, '5', 'd', 'Available', 2, '2016-01-18 13:33:49'),
(454, 7, 36, '5', 'd', 'Available', 2, '2016-01-18 13:33:49'),
(455, 7, 37, '5', 'd', 'Available', 2, '2016-01-18 13:33:50'),
(456, 7, 38, '5', 'd', 'Available', 2, '2016-01-18 13:33:50'),
(457, 8, 39, '5', 'd', 'Reserve', 2, '2016-01-18 13:35:07'),
(458, 8, 40, '5', 'd', 'Lost', 2, '2016-01-18 13:35:07'),
(459, 8, 41, '5', 'd', 'Available', 2, '2016-01-18 13:35:07'),
(460, 9, 42, '5', 'fg', 'Reserve', 3, '2016-01-18 13:37:12'),
(461, 9, 43, '5', 'fg', 'Available', 3, '2016-01-18 13:37:12'),
(462, 9, 44, '5', 'fg', 'Available', 3, '2016-01-18 13:37:12'),
(463, 9, 45, '5', 'fg', 'Available', 3, '2016-01-18 13:37:12'),
(464, 10, 46, '5', 'r', 'Reserve', 3, '2016-01-18 14:17:57'),
(465, 10, 47, '5', 'r', 'Available', 3, '2016-01-18 14:17:57'),
(466, 11, 48, '5', 'zzz', 'Reserve', 3, '2016-01-18 14:25:57'),
(467, 11, 49, '5', 'zzz', 'Available', 3, '2016-01-18 14:25:57'),
(468, 11, 50, '5', 'zzz', 'Available', 3, '2016-01-18 14:25:57'),
(469, 11, 51, '5', 'zzz', 'Available', 3, '2016-01-18 14:25:57'),
(470, 11, 52, '5', 'zzz', 'Available', 3, '2016-01-18 14:25:57'),
(471, 12, 53, '5', 'df', 'Reserve', 3, '2016-01-18 14:42:53'),
(472, 12, 54, '5', 'df', 'Available', 3, '2016-01-18 14:42:53'),
(473, 13, 55, '5', 'tttttt', 'Reserve', 2, '2016-01-18 14:45:49'),
(474, 13, 56, '5', 'tttttt', 'Available', 2, '2016-01-18 14:45:49'),
(475, 13, 57, '5', 'tttttt', 'Available', 2, '2016-01-18 14:45:49'),
(476, 13, 58, '5', 'tttttt', 'Available', 2, '2016-01-18 14:45:49'),
(477, 14, 59, 'G12-293-829', 'Programming', 'Reserve', 1, '2016-01-18 19:24:21'),
(478, 14, 60, 'G12-293-829', 'Programming', 'Available', 1, '2016-01-18 19:24:21'),
(479, 14, 61, 'G12-293-829', 'Programming', 'Available', 1, '2016-01-18 19:24:57'),
(480, 14, 62, 'G12-293-829', 'Programming', 'Available', 1, '2016-01-18 19:24:57'),
(481, 14, 63, 'G12-293-829', 'Programming', 'Available', 1, '2016-01-18 19:24:57'),
(482, 11, 64, '5', 'zzz', 'Available', 3, '2016-01-18 19:27:39'),
(483, 11, 65, '5', 'zzz', 'Available', 3, '2016-01-18 19:27:40'),
(484, 11, 66, '5', 'zzz', 'Available', 3, '2016-01-18 19:27:40'),
(485, 11, 67, '5', 'zzz', 'Available', 3, '2016-01-18 19:27:40'),
(486, 11, 68, '5', 'zzz', 'Available', 3, '2016-01-18 19:27:40'),
(487, 11, 69, '5', 'zzz', 'Available', 3, '2016-01-18 19:27:45'),
(488, 11, 70, '5', 'zzz', 'Available', 3, '2016-01-18 19:27:45'),
(489, 11, 71, '5', 'zzz', 'Available', 3, '2016-01-18 19:27:45'),
(490, 11, 72, '5', 'zzz', 'Available', 3, '2016-01-18 19:27:45'),
(491, 11, 73, '5', 'zzz', 'Available', 3, '2016-01-18 19:27:45'),
(492, 11, 74, '5', 'zzz', 'Available', 3, '2016-01-18 19:28:13'),
(493, 11, 75, '5', 'zzz', 'Available', 3, '2016-01-18 19:28:15'),
(494, 15, 76, '1', 'lll', 'Reserve', 2, '2016-01-24 20:31:09'),
(495, 16, 77, 'F93-H30', 'abcd', 'Reserve', 1, '2016-01-24 21:27:20'),
(496, 17, 78, 'G12-293-829', 'abcde', 'Reserve', 2, '2016-01-24 21:32:31'),
(497, 18, 79, 'G12-293-829', 'a', 'Reserve', 3, '2016-01-24 21:42:42'),
(498, 18, 80, 'G12-293-829', 'a', 'Borrow', 3, '2016-01-24 21:42:42'),
(499, 19, 81, 'G12-293-829', 'hello', 'Reserve', 1, '2016-01-24 21:45:30'),
(500, 19, 82, 'G12-293-829', 'hello', 'Available', 1, '2016-01-24 21:45:30'),
(501, 20, 83, 'G12-293-829', 'hello me', 'Reserve', 2, '2016-01-24 21:46:36'),
(502, 20, 84, 'G12-293-829', 'hello me', 'Available', 2, '2016-01-24 21:46:37'),
(503, 21, 85, 'G12-293-829', 'sd', 'Reserve', 2, '2016-01-24 22:24:54'),
(504, 21, 86, 'G12-293-829', 'sd', 'Not Available', 2, '2016-01-24 22:24:54'),
(505, 22, 87, 'G12-293-829', '1', 'Reserve', 2, '2016-01-24 22:41:16'),
(506, 22, 88, 'G12-293-829', '1', 'Borrow', 2, '2016-01-24 22:41:16'),
(507, 23, 89, 'G12-293-829', 'mn', 'Reserve', 2, '2016-01-24 22:43:04'),
(508, 23, 90, 'G12-293-829', 'mn', 'Available', 2, '2016-01-24 22:43:04'),
(509, 23, 91, 'G12-293-829', 'mn', 'Available', 2, '2016-01-24 22:43:04'),
(510, 23, 92, 'G12-293-829', 'mn', 'Available', 2, '2016-01-24 22:43:04'),
(511, 24, 93, 'G12-293-829', 'aaaaaa', 'Reserve', 2, '2016-01-24 23:01:16'),
(512, 24, 94, 'G12-293-829', 'aaaaaa', 'Borrow', 2, '2016-01-24 23:01:16'),
(513, 25, 95, 'G12-293-829', 'aaa', 'Reserve', 3, '2016-01-24 23:05:27'),
(514, 25, 96, 'G12-293-829', 'aaa', 'Borrow', 3, '2016-01-24 23:05:27'),
(515, 25, 97, 'G12-293-829', 'aaa', 'Borrow', 3, '2016-01-24 23:05:27'),
(516, 25, 98, 'G12-293-829', 'aaa', 'Borrow', 3, '2016-01-24 23:05:27'),
(517, 26, 99, 'G12-293-829', 'sd', 'Reserve', 1, '2016-01-24 23:09:11'),
(518, 26, 100, 'G12-293-829', 'sd', 'Available', 1, '2016-01-24 23:09:11'),
(519, 27, 101, '5', 'df', 'Reserve', 2, '2016-01-24 23:13:36'),
(520, 27, 102, '5', 'df', 'Available', 2, '2016-01-24 23:13:36'),
(521, 27, 103, '5', 'df', 'Available', 2, '2016-01-24 23:13:37'),
(522, 28, 104, 'G12-293-829', 'im tired', 'Reserve', 2, '2016-01-24 23:17:32'),
(523, 28, 105, 'G12-293-829', 'im tired', 'Available', 2, '2016-01-24 23:17:32'),
(524, 29, 106, 'G12-293-829', 'sd', 'Reserve', 1, '2016-01-24 23:18:57'),
(525, 29, 107, 'G12-293-829', 'sd', 'Available', 1, '2016-01-24 23:18:57'),
(526, 30, 108, 'G12-293-829-32J', 'a', 'Reserve', 3, '2016-01-24 23:19:39'),
(527, 30, 109, 'G12-293-829-32J', 'a', 'Borrow', 3, '2016-01-24 23:19:39'),
(528, 30, 110, 'G12-293-829-32J', 'a', 'Borrow', 3, '2016-01-24 23:19:39'),
(529, 31, 111, 'G12-293-829', 'manuel', 'Reserve', 2, '2016-01-24 23:21:41'),
(530, 31, 112, 'G12-293-829', 'manuel', 'Available', 2, '2016-01-24 23:21:41'),
(531, 32, 113, 'G12-293-829', 'man', 'Reserve', 3, '2016-01-24 23:22:18'),
(532, 32, 114, 'G12-293-829', 'man', 'Available', 3, '2016-01-24 23:22:18'),
(533, 33, 115, 'w', 'd', 'Reserve', 1, '2016-01-24 23:49:49'),
(534, 33, 116, 'w', 'd', 'Available', 1, '2016-01-24 23:49:49'),
(535, 33, 117, 'w', 'd', 'Available', 1, '2016-01-24 23:49:49'),
(536, 34, 118, 'G12-293-829-2008', 'god', 'Reserve', 1, '2016-01-25 08:47:24'),
(537, 34, 119, 'G12-293-829-2008', 'god', 'Available', 1, '2016-01-25 08:47:24'),
(538, 35, 120, 'hi-23', 'lmnop', 'Reserve', 1, '2016-01-25 08:50:36'),
(539, 35, 121, 'hi-23', 'lmnop', 'Available', 1, '2016-01-25 08:50:36'),
(540, 36, 122, 'F93-H30', 'hhhhiiiiiiiii', 'Reserve', 3, '2016-01-25 08:52:24'),
(541, 36, 123, 'F93-H30', 'hhhhiiiiiiiii', 'Available', 3, '2016-01-25 08:52:24'),
(542, 37, 124, 'GH-9402-Fj', 'afkagj', 'Reserve', 2, '2016-01-25 08:53:22'),
(543, 37, 125, 'GH-9402-Fj', 'afkagj', 'Borrow', 2, '2016-01-25 08:53:22'),
(544, 38, 126, 'F93-H30', 'adaad', 'Reserve', 2, '2016-01-25 08:54:25'),
(545, 38, 127, 'F93-H30', 'adaad', 'Borrow', 2, '2016-01-25 08:54:25'),
(546, 39, 128, 'G12-293-829', 'aaa', 'Reserve', 1, '2016-01-25 13:27:41'),
(547, 39, 129, 'G12-293-829', 'aaa', 'Borrow', 1, '2016-01-25 13:27:42'),
(548, 40, 130, 'G12-293-829', 'abcd', 'Reserve', 2, '2016-01-25 14:24:33'),
(549, 40, 131, 'G12-293-829', 'abcd', 'Borrow', 2, '2016-01-25 14:24:33'),
(550, 40, 132, 'G12-293-829', 'abcd', 'Borrow', 2, '2016-01-25 14:24:33'),
(551, 40, 133, 'G12-293-829', 'abcd', 'Borrow', 2, '2016-01-25 14:24:33'),
(552, 40, 134, 'G12-293-829', 'abcd', 'Borrow', 2, '2016-01-25 14:24:33'),
(553, 41, 135, 'G12-293-829', 'g', 'Reserve', 1, '2016-01-25 14:30:29'),
(554, 41, 136, 'G12-293-829', 'g', 'Available', 1, '2016-01-25 14:30:29'),
(555, 41, 137, 'G12-293-829', 'g', 'Available', 1, '2016-01-25 14:30:29'),
(556, 41, 138, 'G12-293-829', 'g', 'Available', 1, '2016-01-25 14:30:29'),
(557, 42, 139, 'G12-293-829', 'fre', 'Reserve', 2, '2016-01-25 14:43:47'),
(558, 42, 140, 'G12-293-829', 'fre', 'Available', 2, '2016-01-25 14:43:48'),
(559, 42, 141, 'G12-293-829', 'fre', 'Available', 2, '2016-01-25 14:43:48'),
(560, 42, 142, 'G12-293-829', 'fre', 'Available', 2, '2016-01-25 14:43:48'),
(561, 43, 143, 'G12-293-829', 'a', 'Reserve', 1, '2016-01-25 15:21:28'),
(562, 43, 144, 'G12-293-829', 'a', 'Borrow', 1, '2016-01-25 15:21:29'),
(563, 43, 145, 'G12-293-829', 'a', 'Borrow', 1, '2016-01-25 15:21:29'),
(564, 43, 146, 'G12-293-829', 'a', 'Borrow', 1, '2016-01-25 15:21:29'),
(565, 43, 147, 'G12-293-829', 'a', 'Borrow', 1, '2016-01-25 15:21:29'),
(566, 44, 148, 'G12-293-829', 'sd', 'Reserve', 1, '2016-01-25 16:01:43'),
(567, 44, 149, 'G12-293-829', 'sd', 'Available', 1, '2016-01-25 16:01:43'),
(568, 44, 150, 'G12-293-829', 'sd', 'Available', 1, '2016-01-25 16:01:43'),
(569, 44, 151, 'G12-293-829', 'sd', 'Available', 1, '2016-01-25 16:01:43'),
(570, 44, 152, 'G12-293-829', 'sd', 'Available', 1, '2016-01-25 16:01:43'),
(571, 45, 153, 'G12-293-829', 'e', 'Reserve', 1, '2016-01-25 16:03:13'),
(572, 45, 154, 'G12-293-829', 'e', 'Available', 1, '2016-01-25 16:03:13'),
(573, 45, 155, 'G12-293-829', 'e', 'Available', 1, '2016-01-25 16:03:13'),
(574, 45, 156, 'G12-293-829', 'e', 'Available', 1, '2016-01-25 16:03:13'),
(575, 46, 157, 'G12-293-829', 'er', 'Reserve', 1, '2016-01-25 16:04:11'),
(576, 46, 158, 'G12-293-829', 'er', 'Available', 1, '2016-01-25 16:04:11'),
(577, 46, 159, 'G12-293-829', 'er', 'Available', 1, '2016-01-25 16:04:11'),
(578, 46, 160, 'G12-293-829', 'er', 'Available', 1, '2016-01-25 16:04:11'),
(579, 46, 161, 'G12-293-829', 'er', 'Available', 1, '2016-01-25 16:04:11'),
(580, 47, 162, 'G12-293-829', 'e', 'Reserve', 2, '2016-01-25 16:14:14'),
(581, 47, 163, 'G12-293-829', 'e', 'Available', 2, '2016-01-25 16:14:14'),
(582, 48, 164, 'G12-293-829', 'e', 'Reserve', 2, '2016-01-25 16:15:56'),
(583, 48, 165, 'G12-293-829', 'e', 'Available', 2, '2016-01-25 16:15:57'),
(584, 49, 166, '343', 'sd', 'Reserve', 1, '2016-01-25 16:19:44'),
(585, 49, 167, '343', 'sd', 'Available', 1, '2016-01-25 16:19:44'),
(586, 49, 168, '343', 'sd', 'Available', 1, '2016-01-25 16:19:44'),
(587, 50, 169, 'G12-293-829', 'dgfdg', 'Reserve', 2, '2016-01-25 16:22:19'),
(588, 50, 170, 'G12-293-829', 'dgfdg', 'Available', 2, '2016-01-25 16:22:19'),
(589, 50, 171, 'G12-293-829', 'dgfdg', 'Available', 2, '2016-01-25 16:22:19'),
(590, 50, 172, 'G12-293-829', 'dgfdg', 'Available', 2, '2016-01-25 16:22:19'),
(591, 51, 173, 'G12-293-829', 'erf', 'Reserve', 2, '2016-01-25 16:23:37'),
(592, 52, 174, '5', 'ertert', 'Reserve', 1, '2016-01-25 16:30:39'),
(593, 52, 175, '5', 'ertert', 'Not Available', 1, '2016-01-25 16:30:39'),
(594, 53, 176, 'F93-H30', 'dfgdf', 'Reserve', 2, '2016-01-25 16:31:32'),
(595, 53, 177, 'F93-H30', 'dfgdf', 'Available', 2, '2016-01-25 16:31:32'),
(596, 53, 178, 'F93-H30', 'dfgdf', 'Available', 2, '2016-01-25 16:31:32'),
(597, 54, 179, 'G12-293-829', 'fsdfd', 'Reserve', 2, '2016-01-25 16:32:29'),
(598, 54, 180, 'G12-293-829', 'fsdfd', 'Available', 2, '2016-01-25 16:32:29'),
(599, 54, 181, 'G12-293-829', 'fsdfd', 'Available', 2, '2016-01-25 16:32:29'),
(600, 54, 182, 'G12-293-829', 'fsdfd', 'Available', 2, '2016-01-25 16:32:29'),
(601, 54, 183, 'G12-293-829', 'fsdfd', 'Available', 2, '2016-01-25 16:32:29'),
(602, 54, 184, 'G12-293-829', 'fsdfd', 'Available', 2, '2016-01-25 16:32:29'),
(603, 54, 185, 'G12-293-829', 'fsdfd', 'Available', 2, '2016-01-25 16:32:29'),
(604, 54, 186, 'G12-293-829', 'fsdfd', 'Available', 2, '2016-01-25 16:32:29'),
(605, 54, 187, 'G12-293-829', 'fsdfd', 'Available', 2, '2016-01-25 16:32:30'),
(606, 54, 188, 'G12-293-829', 'fsdfd', 'Available', 2, '2016-01-25 16:32:30'),
(607, 55, 189, 'G12-293-829', 'dfgdf', 'Reserve', 2, '2016-01-26 09:33:14'),
(608, 55, 190, 'G12-293-829', 'dfgdf', 'Available', 2, '2016-01-26 09:33:14'),
(609, 55, 191, 'G12-293-829', 'dfgdf', 'Available', 2, '2016-01-26 09:33:14'),
(610, 55, 192, 'G12-293-829', 'dfgdf', 'Available', 2, '2016-01-26 09:33:14'),
(611, 55, 193, 'G12-293-829', 'dfgdf', 'Available', 2, '2016-01-26 09:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_info`
--

CREATE TABLE IF NOT EXISTS `borrow_info` (
  `borrow_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_number` varchar(50) NOT NULL,
  `acc_num` int(11) NOT NULL,
  `date_borrow` date NOT NULL,
  `time_borrow` time NOT NULL,
  `due_time` time NOT NULL,
  `due_date` date NOT NULL,
  `borrow_stat` varchar(50) NOT NULL,
  PRIMARY KEY (`borrow_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `borrow_info`
--

INSERT INTO `borrow_info` (`borrow_id`, `id_number`, `acc_num`, `date_borrow`, `time_borrow`, `due_time`, `due_date`, `borrow_stat`) VALUES
(33, '1', 88, '2016-01-27', '20:09:18', '13:00:00', '2016-01-28', 'Returned'),
(34, '1', 147, '2016-01-27', '20:09:18', '13:00:00', '2016-01-28', 'Returned'),
(38, '3', 98, '2016-01-27', '20:37:44', '13:00:00', '2016-01-28', 'Returned'),
(39, '3', 129, '2016-01-27', '20:38:29', '13:00:00', '2016-01-28', 'Returned'),
(40, '12345', 88, '2016-01-28', '00:34:31', '13:00:00', '2016-01-28', 'Returned'),
(41, '12345', 132, '2016-01-28', '13:41:48', '13:00:00', '2016-01-29', 'Pending'),
(42, '12345', 127, '2016-01-28', '13:41:48', '13:00:00', '2016-01-29', 'Returned'),
(45, '1', 125, '2016-01-28', '15:13:27', '13:00:00', '2016-01-29', 'Returned'),
(46, '1', 7, '2016-01-28', '15:13:27', '13:00:00', '2016-01-29', 'Pending'),
(49, '1211', 134, '2016-01-28', '22:44:28', '13:00:00', '2016-01-29', 'Returned'),
(50, '1211', 20, '2016-01-28', '22:44:29', '13:00:00', '2016-01-29', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_return`
--

CREATE TABLE IF NOT EXISTS `borrow_return` (
  `id_return` int(11) NOT NULL AUTO_INCREMENT,
  `borrow_id` int(11) NOT NULL,
  `date_return` date NOT NULL,
  `time_return` time NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id_return`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `borrow_return`
--

INSERT INTO `borrow_return` (`id_return`, `borrow_id`, `date_return`, `time_return`, `status`) VALUES
(1, 33, '2016-01-29', '03:31:08', 'nofines'),
(2, 49, '2016-01-29', '03:32:54', 'nofines');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_time`
--

CREATE TABLE IF NOT EXISTS `borrow_time` (
  `id` int(11) NOT NULL DEFAULT '0',
  `borrow_start` time DEFAULT NULL,
  `borrow_due` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow_time`
--

INSERT INTO `borrow_time` (`id`, `borrow_start`, `borrow_due`) VALUES
(1, '12:58:00', '16:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(50) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`) VALUES
(1, 'BEED'),
(2, 'BSED'),
(3, 'BSIED'),
(4, 'BSHTE'),
(5, 'BSIT'),
(6, 'BSHRM'),
(7, 'BSInfoTech'),
(8, 'BSFi');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `id` varchar(50) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `d` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `fname`, `lname`, `d`) VALUES
('10', 'sf', 'sf', '2016-01-25 00:29:32'),
('11', 'df', 's', '2016-01-25 00:29:38'),
('12', 'sdf', 'sd', '2016-01-25 00:29:44'),
('13', 's', 's', '2016-01-25 00:29:58'),
('14', 'b', 'b', '2016-01-25 00:30:04'),
('15', 'h', 'h', '2016-01-25 00:30:13'),
('16', 'f', 'h', '2016-01-25 00:30:21'),
('17', 'asd', 'ad', '2016-01-25 00:30:32'),
('19', 'adg', 's', '2016-01-25 00:30:46'),
('2', 'cs', 'cs', '2016-01-01 13:25:52'),
('20', 'sfsg', 'sfdg', '2016-01-25 00:30:54'),
('21', 's', 'fg', '2016-01-25 00:31:15'),
('24', 'er', 're', '2016-01-25 00:31:28'),
('25', 'e', 'e', '2016-01-25 00:32:23'),
('26', 's', 'fs', '2016-01-25 00:32:30'),
('27', 'dg', 'sf', '2016-01-25 00:32:38'),
('28', 'ffs', 'sg', '2016-01-25 00:32:45'),
('29', 'e', 'f', '2016-01-25 00:33:06'),
('30', 'e', 'e', '2016-01-25 00:33:27'),
('32', 'dfd', 'dfg', '2016-01-25 00:32:53'),
('353', 'ew', 'we', '2016-01-25 00:31:37'),
('4', 'Yuseph', 'Gadi', '2016-01-02 21:18:05'),
('5', 's', 's', '2016-01-25 00:28:22'),
('6', 's', 'fs', '2016-01-25 00:28:32'),
('7', 't', 'h', '2016-01-25 00:29:07'),
('8', 'sf', 's', '2016-01-25 00:29:16'),
('9', 'f', 's', '2016-01-25 00:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_borrow`
--

CREATE TABLE IF NOT EXISTS `faculty_borrow` (
  `faculty_borrow_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_number` int(11) NOT NULL,
  `acc_num` int(11) NOT NULL,
  `date_borrow` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`faculty_borrow_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `faculty_borrow`
--

INSERT INTO `faculty_borrow` (`faculty_borrow_id`, `id_number`, `acc_num`, `date_borrow`, `status`) VALUES
(9, 2, 19, '2016-01-12 09:57:59', 'Returned'),
(10, 4, 20, '2016-01-12 09:58:35', 'Returned'),
(11, 2, 21, '2016-01-12 10:09:03', 'Returned'),
(12, 2, 2, '2016-01-12 22:31:05', 'Returned'),
(13, 2, 3, '2016-01-12 22:32:04', 'Returned'),
(14, 2, 3, '2016-01-12 22:32:54', 'Returned'),
(15, 2, 7, '2016-01-12 22:32:54', 'Returned'),
(16, 2, 2, '2016-01-16 21:27:29', 'Returned'),
(17, 2, 7, '2016-01-16 21:27:29', 'Returned'),
(18, 2, 26, '2016-01-16 21:27:29', 'Returned');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_return`
--

CREATE TABLE IF NOT EXISTS `faculty_return` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_borrow_id` varchar(50) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `acc_num` int(11) NOT NULL,
  `date_return` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `faculty_return`
--

INSERT INTO `faculty_return` (`id`, `faculty_borrow_id`, `id_number`, `acc_num`, `date_return`) VALUES
(38, '9', '2', 19, '2016-01-29 00:47:22'),
(39, '9', '2', 21, '2016-01-29 00:47:23'),
(40, '10', '4', 20, '2016-01-29 00:48:17'),
(41, '9', '2', 19, '2016-01-29 00:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

CREATE TABLE IF NOT EXISTS `fines` (
  `id_fines` int(11) NOT NULL AUTO_INCREMENT,
  `acc_num` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `fines_payment` int(11) NOT NULL,
  `fines_status` varchar(50) NOT NULL,
  PRIMARY KEY (`id_fines`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fine_payment`
--

CREATE TABLE IF NOT EXISTS `fine_payment` (
  `fines_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `borrow_id` int(11) NOT NULL,
  `fines_payment` int(11) NOT NULL,
  PRIMARY KEY (`fines_payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fine_status`
--

CREATE TABLE IF NOT EXISTS `fine_status` (
  `fine_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `fines_payment_id` int(11) NOT NULL,
  `fines_status` varchar(50) NOT NULL,
  PRIMARY KEY (`fine_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `id_user`
--

CREATE TABLE IF NOT EXISTS `id_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `id_user`
--

INSERT INTO `id_user` (`user_id`, `id`, `user_type`) VALUES
(1, 1, 'student'),
(2, 2, 'faculty'),
(3, 3, 'student'),
(4, 4, 'faculty'),
(5, 12345, 'student'),
(6, 5, 'faculty'),
(7, 6, 'faculty'),
(8, 7, 'faculty'),
(9, 8, 'faculty'),
(10, 9, 'faculty'),
(11, 10, 'faculty'),
(12, 11, 'faculty'),
(13, 12, 'faculty'),
(14, 13, 'faculty'),
(15, 14, 'faculty'),
(16, 15, 'faculty'),
(17, 16, 'faculty'),
(18, 17, 'faculty'),
(19, 19, 'faculty'),
(20, 20, 'faculty'),
(21, 21, 'faculty'),
(22, 24, 'faculty'),
(23, 353, 'faculty'),
(24, 25, 'faculty'),
(25, 26, 'faculty'),
(26, 27, 'faculty'),
(27, 28, 'faculty'),
(28, 32, 'faculty'),
(29, 29, 'faculty'),
(30, 30, 'faculty'),
(31, 1211, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `lost_book`
--

CREATE TABLE IF NOT EXISTS `lost_book` (
  `Book_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ISBN` int(11) NOT NULL,
  `Member_No` varchar(50) NOT NULL,
  `Date Lost` date NOT NULL,
  PRIMARY KEY (`Book_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `magazines`
--

CREATE TABLE IF NOT EXISTS `magazines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access_id` int(11) NOT NULL,
  `magazine_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date_added` date NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- Dumping data for table `magazines`
--

INSERT INTO `magazines` (`id`, `access_id`, `magazine_id`, `title`, `date_added`, `status`) VALUES
(85, 1, 1, 'a', '2016-01-11', 'Available'),
(86, 1, 2, 'a', '2016-01-11', 'Available'),
(87, 1, 3, 'a', '2016-01-11', 'Available'),
(88, 1, 4, 'a', '2016-01-11', 'Available'),
(89, 1, 5, 'a', '2016-01-11', 'Available'),
(90, 1, 6, 'a', '2016-01-11', 'Available'),
(91, 2, 7, 'bb', '2016-01-11', 'Available'),
(92, 2, 8, 'bb', '2016-01-11', 'Available'),
(93, 2, 9, 'bb', '2016-01-11', 'Available'),
(94, 2, 10, 'bb', '2016-01-11', 'Available'),
(95, 2, 11, 'bb', '2016-01-11', 'Available'),
(96, 1, 12, 'a', '2016-01-11', 'Available'),
(97, 1, 13, 'a', '2016-01-11', 'Available'),
(98, 1, 14, 'a', '2016-01-11', 'Available'),
(99, 1, 15, 'a', '2016-01-11', 'Available'),
(100, 1, 16, 'a', '2016-01-11', 'Available'),
(101, 3, 17, 'a', '2016-01-11', 'Available'),
(102, 3, 18, 'a', '2016-01-11', 'Available'),
(103, 3, 19, 'a', '2016-01-11', 'Available'),
(104, 3, 20, 'a', '2016-01-11', 'Available'),
(105, 4, 21, 'a', '2016-01-17', 'Available'),
(106, 4, 22, 'a', '2016-01-17', 'Available'),
(107, 5, 23, 'a', '2016-01-17', 'Available'),
(108, 5, 24, 'a', '2016-01-17', 'Available'),
(109, 5, 25, 'a', '2016-01-17', 'Available'),
(110, 5, 26, 'a', '2016-01-17', 'Available'),
(111, 5, 27, 'a', '2016-01-17', 'Available'),
(112, 4, 28, 'a', '2016-01-24', 'Available'),
(113, 6, 29, 'n', '2016-01-24', 'Available'),
(114, 6, 30, 'n', '2016-01-24', 'Available'),
(115, 7, 31, 'aamsn', '2016-01-24', 'Available'),
(116, 7, 32, 'aamsn', '2016-01-24', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `magazines_copy`
--

CREATE TABLE IF NOT EXISTS `magazines_copy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access_id` int(11) NOT NULL,
  `copy` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `magazines_copy`
--

INSERT INTO `magazines_copy` (`id`, `access_id`, `copy`) VALUES
(44, 1, 11),
(45, 2, 5),
(46, 3, 4),
(47, 4, 3),
(48, 5, 5),
(49, 6, 2),
(50, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `magazines_info`
--

CREATE TABLE IF NOT EXISTS `magazines_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access_id` int(11) NOT NULL,
  `pub_name` varchar(50) NOT NULL,
  `date_issue` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `magazines_info`
--

INSERT INTO `magazines_info` (`id`, `access_id`, `pub_name`, `date_issue`) VALUES
(63, 1, 'a', '11/01/2016'),
(64, 2, 'bb', '11/01/2016'),
(65, 3, 'a', '12/01/2016'),
(66, 4, '', ''),
(67, 5, '', '18/01/2016');

-- --------------------------------------------------------

--
-- Table structure for table `narrative`
--

CREATE TABLE IF NOT EXISTS `narrative` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `narrative_acc_num` int(11) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `course` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `narrative`
--

INSERT INTO `narrative` (`id`, `narrative_acc_num`, `fname`, `mi`, `lname`, `course`) VALUES
(13, 1, 'as', 'a', 'sadjk', 1),
(15, 2, 'cristhel', 'A.', 'ghf', 3),
(16, 3, 'cristhelddd', 'S.', 'Gadi', 0),
(17, 4, 'cristhel', 'a', 'ghfas', 7);

-- --------------------------------------------------------

--
-- Table structure for table `narrative_info`
--

CREATE TABLE IF NOT EXISTS `narrative_info` (
  `narrative_acc_num` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `sy` varchar(50) NOT NULL,
  PRIMARY KEY (`narrative_acc_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `narrative_info`
--

INSERT INTO `narrative_info` (`narrative_acc_num`, `date_added`, `sy`) VALUES
(1, '2016-01-22', '2000'),
(2, '2016-01-22', '2015-2017'),
(3, '2016-01-22', '2015'),
(4, '2016-01-22', '2014');

-- --------------------------------------------------------

--
-- Table structure for table `research_log`
--

CREATE TABLE IF NOT EXISTS `research_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_num` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `research_log`
--

INSERT INTO `research_log` (`id`, `id_num`, `course_id`, `date`, `time`, `purpose`, `status`) VALUES
(75, 12345, 7, '2016-01-08', '15:26:38', 'Research', 'Login'),
(76, 12345, 7, '2016-01-08', '15:26:48', 'Research', 'Logout'),
(77, 1, 7, '2016-01-08', '15:27:29', 'Research', 'Login'),
(78, 1, 7, '2016-01-08', '15:27:59', 'Research', 'Logout'),
(79, 1, 7, '2016-01-08', '21:11:55', 'Research', 'Login'),
(80, 1, 7, '2016-01-11', '21:08:28', 'Research', 'Login'),
(81, 1, 7, '2016-01-11', '21:12:03', 'Research', 'Logout'),
(82, 1, 7, '2016-01-12', '06:07:28', 'Research', 'Login'),
(83, 1, 7, '2016-01-12', '11:21:44', 'Research', 'Login'),
(84, 1, 7, '2016-01-12', '11:23:23', 'Research', 'Logout');

-- --------------------------------------------------------

--
-- Table structure for table `return_time`
--

CREATE TABLE IF NOT EXISTS `return_time` (
  `id` int(11) NOT NULL DEFAULT '0',
  `return_start` time DEFAULT NULL,
  `return_due` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return_time`
--

INSERT INTO `return_time` (`id`, `return_start`, `return_due`) VALUES
(1, '07:30:00', '13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `set_book`
--

CREATE TABLE IF NOT EXISTS `set_book` (
  `max_id` int(11) NOT NULL AUTO_INCREMENT,
  `max_book` int(11) NOT NULL,
  PRIMARY KEY (`max_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `set_book`
--

INSERT INTO `set_book` (`max_id`, `max_book`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `set_fines`
--

CREATE TABLE IF NOT EXISTS `set_fines` (
  `fines_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_fines` int(11) NOT NULL,
  PRIMARY KEY (`fines_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `set_fines`
--

INSERT INTO `set_fines` (`fines_id`, `student_fines`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `d` datetime NOT NULL,
  `id` varchar(25) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `crs_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`d`, `id`, `fname`, `lname`, `crs_id`) VALUES
('2016-01-01 12:50:25', '1', 'Cristhel', 'Gadi', 1),
('2016-01-28 22:31:19', '1211', 'c', 'c', 3),
('2016-01-09 12:08:11', '12345', 'ariel', 'pepito', 7),
('2016-01-02 08:02:55', '3', 'Vilma', 'Gadi', 8);

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
--

CREATE TABLE IF NOT EXISTS `thesis` (
  `thesis_id` int(11) NOT NULL AUTO_INCREMENT,
  `thesis_acc_num` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`thesis_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`thesis_id`, `thesis_acc_num`, `title`, `date_added`) VALUES
(5, 1, 'a', '2016-01-15'),
(7, 2, 'fgf', '2016-01-15'),
(8, 3, 'Library Management System', '2016-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `thesis_info`
--

CREATE TABLE IF NOT EXISTS `thesis_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thesis_acc_num` int(11) NOT NULL,
  `student_name` varchar(250) NOT NULL,
  `course` int(50) NOT NULL,
  `sy` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `thesis_info`
--

INSERT INTO `thesis_info` (`id`, `thesis_acc_num`, `student_name`, `course`, `sy`) VALUES
(3, 1, 'assds', 0, 2000),
(5, 2, 'jk', 0, 2014),
(6, 3, 'Cristhel Gadi', 0, 2015);

-- --------------------------------------------------------

--
-- Table structure for table `userlevel`
--

CREATE TABLE IF NOT EXISTS `userlevel` (
  `userlevel` int(11) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlevel`
--

INSERT INTO `userlevel` (`userlevel`, `type`) VALUES
(-1, 'admin'),
(0, 'staff'),
(1, 'student'),
(2, 'faculty');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `purpose` varchar(255) NOT NULL,
  `user_login_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_num` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `login_date` date NOT NULL,
  `login_time` time NOT NULL,
  `stat_login` varchar(50) NOT NULL,
  PRIMARY KEY (`user_login_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`purpose`, `user_login_id`, `id_num`, `course_id`, `login_date`, `login_time`, `stat_login`) VALUES
('Research', 50, 1, 7, '2016-01-12', '12:50:44', 'DONE'),
('Research', 52, 12345, 7, '2016-01-12', '13:20:35', 'DONE'),
('Research', 61, 1, 7, '2016-01-12', '14:20:29', 'DONE'),
('Research', 62, 1, 7, '2016-01-12', '14:39:51', 'DONE'),
('Research', 63, 1, 0, '2016-01-12', '21:45:13', 'DONE'),
('Research', 64, 1, 7, '2016-01-12', '21:49:51', 'DONE'),
('Research', 65, 1, 7, '2016-01-12', '21:57:03', 'DONE'),
('Research', 66, 1, 7, '2016-01-14', '12:21:56', 'DONE'),
('Research', 67, 1, 7, '2016-01-24', '03:56:09', 'DONE'),
('Research', 68, 3, 8, '2016-01-24', '03:58:42', 'DONE'),
('Research', 69, 1, 7, '2016-01-24', '04:01:19', 'DONE'),
('Research', 70, 1, 7, '2016-01-26', '22:58:51', 'Login'),
('Research', 71, 1, 7, '2016-01-26', '22:58:51', 'Login'),
('Research', 72, 1, 7, '2016-01-27', '15:06:10', 'Login'),
('Research', 73, 1, 7, '2016-01-27', '15:21:42', 'Login'),
('Research', 74, 1, 7, '2016-01-27', '15:21:42', 'Login'),
('Research', 75, 1, 7, '2016-01-27', '15:23:20', 'Login'),
('Research', 76, 1, 7, '2016-01-27', '15:23:20', 'Login'),
('Research', 77, 3, 0, '2016-01-27', '15:38:42', 'Login'),
('Research', 78, 3, 0, '2016-01-27', '15:39:48', 'Login'),
('Research', 79, 3, 0, '2016-01-27', '15:39:48', 'Login'),
('Research', 80, 3, 0, '2016-01-27', '15:42:49', 'Login'),
('Research', 81, 3, 0, '2016-01-27', '15:42:49', 'Login'),
('Research', 82, 3, 0, '2016-01-27', '20:06:44', 'Login'),
('Research', 83, 3, 0, '2016-01-27', '20:06:45', 'Login'),
('Research', 84, 1, 0, '2016-01-27', '20:09:18', 'Login'),
('Research', 85, 1, 0, '2016-01-27', '20:09:18', 'Login'),
('Research', 86, 1, 0, '2016-01-27', '20:09:35', 'Login'),
('Research', 87, 0, 8, '2016-01-27', '20:34:59', 'Login'),
('Research', 88, 0, 8, '2016-01-27', '20:34:59', 'Login'),
('Research', 89, 0, 8, '2016-01-27', '20:37:44', 'Login'),
('Research', 90, 0, 8, '2016-01-27', '20:38:29', 'Login'),
('Research', 91, 0, 8, '2016-01-27', '20:38:49', 'Login'),
('Research', 92, 0, 7, '2016-01-28', '00:34:31', 'Login'),
('Research', 93, 12345, 7, '2016-01-28', '13:41:48', 'Login'),
('Research', 94, 12345, 7, '2016-01-28', '13:41:48', 'Login'),
('Research', 95, 1211, 3, '2016-01-28', '22:31:40', 'Login'),
('Research', 96, 1211, 3, '2016-01-28', '22:31:40', 'Login'),
('Research', 97, 1211, 3, '2016-01-28', '22:44:29', 'Login'),
('Research', 98, 1211, 3, '2016-01-28', '22:44:29', 'Login');

-- --------------------------------------------------------

--
-- Table structure for table `user_logout`
--

CREATE TABLE IF NOT EXISTS `user_logout` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_log_id` int(11) NOT NULL,
  `id_num` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `logout_date` date NOT NULL,
  `logout_time` time NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `user_logout`
--

INSERT INTO `user_logout` (`log_id`, `user_log_id`, `id_num`, `course_id`, `logout_date`, `logout_time`) VALUES
(47, 61, 1, 7, '2016-01-12', '14:20:34'),
(48, 62, 1, 7, '2016-01-12', '14:40:02'),
(49, 63, 1, 0, '2016-01-12', '21:49:47'),
(50, 64, 1, 7, '2016-01-12', '21:49:55'),
(51, 65, 1, 7, '2016-01-14', '12:20:50'),
(52, 66, 1, 7, '2016-01-14', '12:22:30'),
(53, 67, 1, 7, '2016-01-24', '03:57:19'),
(54, 68, 3, 8, '2016-01-24', '03:59:04'),
(55, 69, 1, 7, '2016-01-25', '13:29:47');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
