-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2016 at 08:46 PM
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
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Name` varchar(10) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `Password`) VALUES
('admin', 'admin');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_file`
--

INSERT INTO `assign_file` (`Assign_id`, `file`, `deadline`, `type`, `size`) VALUES
(6, '3081-how-to-build-muscle.pdf', '0000-00-00', 'applicatio', 216),
(7, '81794-cp36517280.pdf', '0000-00-00', 'applicatio', 43),
(8, '24562-new_tgh_form_front_page.pdf', '0000-00-00', 'applicatio', 19);

-- --------------------------------------------------------

--
-- Table structure for table `contain_assign`
--

CREATE TABLE IF NOT EXISTS `contain_assign` (
  `Assign_id` int(11) DEFAULT NULL,
  `Course_id` int(11) DEFAULT NULL,
  `week` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contain_assign`
--

INSERT INTO `contain_assign` (`Assign_id`, `Course_id`, `week`) VALUES
(0, 2, NULL),
(0, 4, NULL),
(0, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contain_lecture`
--

CREATE TABLE IF NOT EXISTS `contain_lecture` (
  `Lec_id` int(11) DEFAULT NULL,
  `Course_id` int(11) DEFAULT NULL,
  `week` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contain_lecture`
--

INSERT INTO `contain_lecture` (`Lec_id`, `Course_id`, `week`) VALUES
(10, 2, NULL),
(11, 2, NULL),
(12, 2, NULL),
(13, 4, NULL),
(14, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
`Course_id` int(11) NOT NULL,
  `Course_name` varchar(255) DEFAULT NULL,
  `Start_date` date DEFAULT NULL,
  `Duration` varchar(30) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `End_date` date NOT NULL,
  `File` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_id`, `Course_name`, `Start_date`, `Duration`, `Department`, `End_date`, `File`) VALUES
(2, 'PDS', '2016-01-15', '12 weeks', 'Computer science', '0000-00-00', ''),
(3, 'Algorithms', '2015-08-15', '11 weeks', 'Computer science', '0000-00-00', ''),
(4, 'CAOS', '2016-02-11', '9 weeks', 'Computer science', '0000-00-00', ''),
(9, 'DBMS', '2016-09-22', '10 weeks', 'Computer science', '0000-00-00', 'syll_DBMS_67845-pat syllabus.pdf'),
(10, 'Web Design', '2016-10-25', '11 weeks', 'IT', '0000-00-00', 'syllabus_Web Design_40161-cdc_guide.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_in`
--

CREATE TABLE IF NOT EXISTS `enrolled_in` (
  `Student_id` int(11) DEFAULT NULL,
  `Grade` varchar(2) DEFAULT NULL,
  `Course_id` int(11) DEFAULT NULL,
  `Payment_status` varchar(10) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolled_in`
--

INSERT INTO `enrolled_in` (`Student_id`, `Grade`, `Course_id`, `Payment_status`) VALUES
(2, 'B', 2, 'No'),
(2, 'C', 3, 'No'),
(1, 'B', 2, 'No'),
(1, 'C', 3, 'No'),
(4, 'C', 3, 'No'),
(1, 'C', 1, 'No'),
(4, 'B', 2, 'No'),
(5, 'B', 2, 'No');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture_file`
--

INSERT INTO `lecture_file` (`Lec_id`, `file`, `Lec_name`, `type`, `size`) VALUES
(10, '80069-data-structures.pdf', 'data structure', 'applicatio', 324),
(11, '39164-algorithms.pdf', 'algo lec 1', 'applicatio', 326),
(12, '53274-feedbackcompressed.pdf', 'feed', 'applicatio', 185),
(13, '34327-eat-schedule.pdf', 'eat', 'applicatio', 37),
(14, '5568-mcm-renewal-form.pdf', 'dre', 'applicatio', 15);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
`Notification_id` int(11) NOT NULL,
  `Course_id` int(11) NOT NULL,
  `Message` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`Notification_id`, `Course_id`, `Message`, `Date`) VALUES
(2, 2, 'Lecture file 2 uploaded!', '2016-02-27 05:00:26');

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
-- Table structure for table `prerequisite`
--

CREATE TABLE IF NOT EXISTS `prerequisite` (
  `c_id` int(11) NOT NULL,
  `pre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prerequisite`
--

INSERT INTO `prerequisite` (`c_id`, `pre_id`) VALUES
(3, 2),
(10, 9),
(4, 2),
(4, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`Professor_id`, `Firstname`, `Lastname`, `email_id`, `username`, `password`, `DOB`, `Institute`) VALUES
(1, 'debapriya', 'das', 'daddycool@gmail.com', 'daddy', '1234', '2001-08-03', NULL),
(2, 'pabitra', 'mitra', 'pabitra@gmail.com', 'prof1', '1234', '1962-08-07', NULL);

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
(2, 1),
(3, 1),
(4, 1),
(9, 2),
(10, 2);

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
 ADD PRIMARY KEY (`Notification_id`);

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
MODIFY `Assign_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `Course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `lecture_file`
--
ALTER TABLE `lecture_file`
MODIFY `Lec_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
MODIFY `Notification_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
MODIFY `Parent_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
MODIFY `Professor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `Student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
