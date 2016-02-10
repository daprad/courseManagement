-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2016 at 11:15 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coursemng`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_file`
--

CREATE TABLE IF NOT EXISTS `assign_file` (
  `Assign_id` int(11) NOT NULL AUTO_INCREMENT,
  `assign_path` varchar(255) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  PRIMARY KEY (`Assign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contain_assign`
--

CREATE TABLE IF NOT EXISTS `contain_assign` (
  `Assign_id` int(11) DEFAULT NULL,
  `Course_id` int(11) DEFAULT NULL,
  `week` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contain_lecture`
--

CREATE TABLE IF NOT EXISTS `contain_lecture` (
  `Lec_id` int(11) DEFAULT NULL,
  `Course_id` int(11) DEFAULT NULL,
  `week` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `Course_id` int(11) NOT NULL AUTO_INCREMENT,
  `Course_name` varchar(255) DEFAULT NULL,
  `Start_date` date DEFAULT NULL,
  `Duration` time DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_id`, `Course_name`, `Start_date`, `Duration`, `Department`) VALUES
(1, NULL, NULL, NULL, NULL),
(2, 'PDS', '2016-02-09', '00:11:21', 'DFFDFDFS');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_in`
--

CREATE TABLE IF NOT EXISTS `enrolled_in` (
  `Student_id` int(11) DEFAULT NULL,
  `Course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolled_in`
--

INSERT INTO `enrolled_in` (`Student_id`, `Course_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lecture_file`
--

CREATE TABLE IF NOT EXISTS `lecture_file` (
  `Lec_id` int(11) NOT NULL AUTO_INCREMENT,
  `Lec_path` varchar(255) DEFAULT NULL,
  `Lec_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Lec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `Parent_id` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(255) DEFAULT NULL,
  `Lastname` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  PRIMARY KEY (`Parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `Professor_id` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(255) DEFAULT NULL,
  `Lastname` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Institute` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Professor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE IF NOT EXISTS `relationship` (
  `Student_id` int(11) DEFAULT NULL,
  `Parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `Student_id` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(255) DEFAULT NULL,
  `Lastname` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  PRIMARY KEY (`Student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_id`, `Firstname`, `Lastname`, `email_id`, `username`, `password`, `DOB`) VALUES
(1, 'Vardaan', 'Pahuja', 'computerreport@rediffmail.com', 'vardaanpahuja', 'as', '2016-02-10'),
(2, 'Rakesh', 'Kapoor', 'rakesh.prasad@gmail.com', 'Rakesh123', 'qw', '2016-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE IF NOT EXISTS `teaches` (
  `Course_id` int(11) DEFAULT NULL,
  `Professor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
