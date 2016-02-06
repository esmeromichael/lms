-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2016 at 05:50 AM
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
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `id_number` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateregister` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`user_id`, `type`, `id_number`, `password`, `dateregister`) VALUES
(1, 'faculty', '2', 'a', '2016-01-01 13:25:57'),
(2, 'student', '1', 'bbb', '2016-01-02 05:55:38'),
(3, 'faculty', '4', 'n', '2016-01-02 21:18:37');

-- --------------------------------------------------------

--
-- Table structure for table `acc_admin`
--

CREATE TABLE IF NOT EXISTS `acc_admin` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `acc_admin`
--

INSERT INTO `acc_admin` (`user_id`, `type`, `username`, `password`, `firstname`, `lastname`) VALUES
(-1, 'admin', 'admin', 'admin', 'cristhel', 'gadi'),
(0, 'staff', 'staff', 'staff', 'cris', 'gad');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `book_copy`
--

INSERT INTO `book_copy` (`copy_id`, `access_id`, `copy`, `available_no`) VALUES
(31, 1, 15, '14'),
(33, 2, 4, '3');

-- --------------------------------------------------------

--
-- Table structure for table `book_info`
--

CREATE TABLE IF NOT EXISTS `book_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `acquisition_id` int(11) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `publisher_name` varchar(100) NOT NULL,
  `isbn` int(11) NOT NULL,
  `copyright_date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `book_info`
--

INSERT INTO `book_info` (`id`, `access_id`, `category_id`, `acquisition_id`, `Author`, `publisher_name`, `isbn`, `copyright_date`) VALUES
(30, 1, 1, 1, '1', '1', 1, '2015'),
(32, 2, 2, 2, '2', '2', 2, '2000');

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
  `purchase_date` datetime NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=292 ;

--
-- Dumping data for table `book_title`
--

INSERT INTO `book_title` (`book_id`, `access_id`, `acc_num`, `call_num`, `book_title`, `stat_book`, `purchase_date`) VALUES
(272, 1, 1, '1', '1', 'Reserve', '2016-01-05 11:14:40'),
(273, 1, 2, '1', '1', 'Available', '2016-01-05 11:14:40'),
(274, 1, 3, '1', '1', 'Available', '2016-01-05 11:14:40'),
(275, 1, 4, '1', '1', 'Available', '2016-01-05 11:14:40'),
(276, 1, 5, '1', '1', 'Available', '2016-01-05 11:14:40'),
(278, 1, 6, '1', '1', 'Available', '2016-01-05 11:19:26'),
(279, 1, 7, '1', '1', 'Available', '2016-01-05 11:19:26'),
(280, 1, 8, '1', '1', 'Available', '2016-01-05 11:19:26'),
(281, 1, 9, '1', '1', 'Available', '2016-01-05 11:19:26'),
(282, 1, 10, '1', '1', 'Available', '2016-01-05 11:19:26'),
(283, 2, 11, '2', '2', 'Reserve', '2016-01-05 11:20:21'),
(284, 2, 12, '2', '2', 'Available', '2016-01-05 11:20:21'),
(285, 2, 13, '2', '2', 'Available', '2016-01-05 11:20:21'),
(286, 2, 14, '2', '2', 'Available', '2016-01-05 11:20:21'),
(287, 1, 15, '1', '1', 'Available', '2016-01-05 11:21:07'),
(288, 1, 16, '1', '1', 'Available', '2016-01-05 11:21:07'),
(289, 1, 17, '1', '1', 'Available', '2016-01-05 11:21:07'),
(290, 1, 18, '1', '1', 'Available', '2016-01-05 11:21:08'),
(291, 1, 19, '1', '1', 'Available', '2016-01-05 11:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_info`
--

CREATE TABLE IF NOT EXISTS `borrow_info` (
  `borrow_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_number` varchar(50) NOT NULL,
  `date_borrow` date NOT NULL,
  `time_borrow` time NOT NULL,
  `due_time` time NOT NULL,
  `due_date` date NOT NULL,
  PRIMARY KEY (`borrow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(1, '13:00:00', '16:30:00');

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
('2', 'cs', 'cs', '2016-01-01 13:25:52'),
('4', 'Yuseph', 'Gadi', '2016-01-02 21:18:05');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `faculty_borrow`
--

INSERT INTO `faculty_borrow` (`faculty_borrow_id`, `id_number`, `acc_num`, `date_borrow`, `status`) VALUES
(29, 0, 16, '2016-01-02 22:01:29', 'Pending'),
(30, 0, 16, '2016-01-02 22:02:24', 'Pending'),
(31, 0, 0, '2016-01-02 22:05:10', 'pending'),
(32, 0, 0, '2016-01-02 22:05:10', 'pending'),
(33, 0, 16, '2016-01-02 22:06:39', 'Pending'),
(34, 0, 16, '2016-01-02 22:07:26', 'Pending'),
(35, 0, 0, '2016-01-02 22:16:00', 'pending'),
(36, 0, 0, '2016-01-02 22:17:23', 'pending'),
(37, 0, 0, '2016-01-02 22:18:51', 'pending'),
(38, 0, 0, '2016-01-02 22:18:51', 'pending'),
(39, 0, 0, '2016-01-02 22:26:44', 'pending'),
(40, 0, 0, '2016-01-02 22:26:44', 'pending'),
(41, -1, 0, '2016-01-02 22:28:50', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_log`
--

CREATE TABLE IF NOT EXISTS `faculty_log` (
  `user_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_num` int(11) NOT NULL,
  `login_date` datetime NOT NULL,
  `login_time` time NOT NULL,
  `stat_login` varchar(50) NOT NULL,
  PRIMARY KEY (`user_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_logout`
--

CREATE TABLE IF NOT EXISTS `faculty_logout` (
  `user_log_id` int(11) NOT NULL,
  `id_num` int(11) NOT NULL,
  `logout_date` datetime NOT NULL,
  PRIMARY KEY (`user_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_logout`
--

INSERT INTO `faculty_logout` (`user_log_id`, `id_num`, `logout_date`) VALUES
(3, 113, '2015-12-25 15:09:28');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `id_user`
--

INSERT INTO `id_user` (`user_id`, `id`, `user_type`) VALUES
(1, 1, 'student'),
(2, 2, 'faculty'),
(3, 3, 'student'),
(4, 4, 'faculty');

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
(1, '07:30:00', '12:58:00');

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
('2016-01-01 12:50:25', '1', 'Cristhel', 'Gadi', 7),
('2016-01-02 08:02:55', '3', 'Vilma', 'Gadi', 8);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`purpose`, `user_login_id`, `id_num`, `course_id`, `login_date`, `login_time`, `stat_login`) VALUES
('research', 8, 3, 8, '2016-01-04', '22:54:57', 'DONE'),
('research', 9, 1, 7, '2016-01-04', '23:25:56', 'DONE'),
('research', 10, 1, 7, '2016-01-04', '23:38:54', 'DONE');

-- --------------------------------------------------------

--
-- Table structure for table `user_logout`
--

CREATE TABLE IF NOT EXISTS `user_logout` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_log_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `logout_date` date NOT NULL,
  `logout_time` time NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_logout`
--

INSERT INTO `user_logout` (`log_id`, `user_log_id`, `course_id`, `logout_date`, `logout_time`) VALUES
(1, 4, 7, '2016-01-02', '13:36:31'),
(2, 8, 8, '2016-01-04', '22:55:06'),
(3, 9, 7, '2016-01-04', '23:26:08'),
(4, 9, 7, '2016-01-04', '23:42:53'),
(5, 10, 7, '2016-01-04', '23:42:53');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
