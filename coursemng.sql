-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2016 at 02:46 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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
`Assign_id` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
`Course_id` int(11) NOT NULL,
  `Course_name` varchar(255) DEFAULT NULL,
  `Start_date` date DEFAULT NULL,
  `Duration` varchar(30) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_id`, `Course_name`, `Start_date`, `Duration`, `Department`) VALUES
(1, 'DBMS', '2016-07-23', '8 weeks', 'Computer science'),
(2, 'PDS', '2016-09-15', '12 weeks', 'Computer science'),
(3, 'Algorithms', '2016-08-15', '11 weeks', 'Computer science'),
(4, 'CAOS', '2016-02-11', '9 weeks', 'Computer science');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_in`
--

CREATE TABLE IF NOT EXISTS `enrolled_in` (
  `Student_id` int(11) DEFAULT NULL,
  `Grade` varchar(2) DEFAULT NULL,
  `Course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolled_in`
--

INSERT INTO `enrolled_in` (`Student_id`, `Grade`, `Course_id`) VALUES
(1, NULL, 1),
(2, NULL, 2),
(2, 'A', 3),
(1, 'EX', 2),
(2, NULL, 1),
(1, 'A', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lecture_file`
--

CREATE TABLE IF NOT EXISTS `lecture_file` (
`Lec_id` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `Lec_name` varchar(255) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
`Parent_id` int(11) NOT NULL,
  `Firstname` varchar(255) DEFAULT NULL,
  `Lastname` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `DOB` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`Parent_id`, `Firstname`, `Lastname`, `email_id`, `username`, `password`, `DOB`) VALUES
(1, 'ramesh', 'lokhande', 'sdflkjj@gmail.com', 'papaji', '1234', '2003-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
`Professor_id` int(11) NOT NULL,
  `Firstname` varchar(255) DEFAULT NULL,
  `Lastname` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Institute` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`Professor_id`, `Firstname`, `Lastname`, `email_id`, `username`, `password`, `DOB`, `Institute`) VALUES
(1, 'debapriya', 'das', 'daddycool@gmail.com', 'daddy', '1234', '2001-08-03', NULL);

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
`Student_id` int(11) NOT NULL,
  `Firstname` varchar(255) DEFAULT NULL,
  `Lastname` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `DOB` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_id`, `Firstname`, `Lastname`, `email_id`, `username`, `password`, `DOB`) VALUES
(1, 'shivang', 'aggarwal', 'shivang1993@gmail.com', 'chotu', '1234', '1993-03-26'),
(2, 'shobhit', 'kumar', 'chiku@gmail.com', 'chiku', 'abcd', '0000-00-00'),
(3, 'asdfkl', 'sldkfjlk', 'adfnk@gmail.com', 'motu', 'motu', '0000-00-00'),
(4, 'cadet', 'mark', 'cadet@gmail.com', 'ankit', 'abcd', '0005-09-06'),
(5, 'anshit', 'mandloi', 'mandu@gmail.com', 'mandu', 'abcd', '0005-09-06'),
(6, 'raunak', 'sdflk', 'biddu@gmail.com', 'biddu', 'abcd', '0008-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE IF NOT EXISTS `teaches` (
  `Course_id` int(11) DEFAULT NULL,
  `Professor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`Course_id`, `Professor_id`) VALUES
(2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_file`
--
ALTER TABLE `assign_file`
 ADD PRIMARY KEY (`Assign_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`Course_id`);

--
-- Indexes for table `lecture_file`
--
ALTER TABLE `lecture_file`
 ADD PRIMARY KEY (`Lec_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
 ADD PRIMARY KEY (`Parent_id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
 ADD PRIMARY KEY (`Professor_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`Student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_file`
--
ALTER TABLE `assign_file`
MODIFY `Assign_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `Course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lecture_file`
--
ALTER TABLE `lecture_file`
MODIFY `Lec_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
MODIFY `Parent_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
MODIFY `Professor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `Student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
