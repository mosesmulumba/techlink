-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 27, 2018 at 08:58 AM
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
-- Database: `authentication`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`no`, `id`, `firstname`, `lastname`, `username`, `password`) VALUES
(18, 'admin1', 'Kalule', 'Frank', 'frank', 'frank'),
(19, 'admin2', 'Kabali', 'Stephen', 'stephen', 'stephen');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(10) DEFAULT NULL,
  `department_name` varchar(100) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`no`, `id`, `department_name`) VALUES
(1, '34354', 'Faculty of Education'),
(2, '12222', 'Faculty of Business Administration and Management'),
(4, '45222', 'Faculty of Built Environment'),
(9, '111', 'Faculty of Science'),
(7, '5676', 'Faculty of Agriculture'),
(8, '6545', 'School of Arts and Social Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

DROP TABLE IF EXISTS `lecturer`;
CREATE TABLE IF NOT EXISTS `lecturer` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `faculty` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`no`, `id`, `firstname`, `lastname`, `faculty`, `email`, `course`, `username`, `password`) VALUES
(23, 'D009-500', 'Ross', 'Barkley', 'Education', 'ross@gmail.com', 'Education', 'D009-500', 'D009-500'),
(22, 'A098-400', 'Marcos', 'Alonso', 'BAM', 'marcos@gmail.com', 'BAM', 'alonso', 'alonso'),
(20, 'B071-200', 'Alvaro', 'Morata', 'Science', 'alvaro@gmail.com', 'Science ', 'morata', 'morata'),
(19, 'E067-100', 'Eden', 'Hazard', 'FOBE', 'eden@gmail.com', 'FOBE', 'eden', 'eden'),
(24, 'S001-600', 'David', 'Luiz', 'SASS', 'david@gmail.com', 'SASS', 'luiz', 'luiz');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
CREATE TABLE IF NOT EXISTS `replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminid` varchar(100) DEFAULT NULL,
  `adminfirstname` varchar(100) DEFAULT NULL,
  `lecturername` varchar(100) DEFAULT NULL,
  `softwaretype` varchar(100) DEFAULT NULL,
  `softwareversion` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `repleydate` varchar(100) DEFAULT NULL,
  `admincomment` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `adminid`, `adminfirstname`, `lecturername`, `softwaretype`, `softwareversion`, `status`, `repleydate`, `admincomment`) VALUES
(1, 'admin1', 'Kalule', 'David Luiz', 'Office 2016', '2016', 'Unavailable', '2018-04-26', 'not yet');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lecturername` varchar(234) NOT NULL,
  `department` varchar(100) NOT NULL,
  `softwaretype` varchar(100) NOT NULL,
  `softwareversion` varchar(100) NOT NULL,
  `requestdate` varchar(100) NOT NULL,
  `lecturercomment` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `lecturername`, `department`, `softwaretype`, `softwareversion`, `requestdate`, `lecturercomment`) VALUES
(1, 'David Luiz', 'SAAS', 'Office 2016', '2016', '2018-04-03', 'please help me '),
(2, 'David Luiz', 'SAAS', 'adobe ', '6', '2018-04-04', 'hope very soon'),
(3, 'David Luiz', 'SAAS', 'smadav', '7.8', '2018-04-02', 'very urgent'),
(4, 'Marcos Alonso', 'Faculty of Business Administration and Management', 'kaspersky', '9.0', '2018-04-05', 'very soon'),
(5, 'Marcos Alonso', 'Faculty of Business Administration and Management', 'eclipse', '9.6', '2018-04-06', 'help please'),
(15, 'Eden Hazard', 'Faculty of Built Environment', 'Edraw max', '4.5', '2018-04-25', 'please so urgent'),
(7, 'Alvaro Morata', 'Faculty of Science', 'mindview', '7', '2018-04-03', 'please need it soon'),
(8, 'Alvaro Morata', 'Faculty of Science', 'avg', '2017', '2018-04-01', 'viruses eating my work'),
(12, 'Ross Barkley', 'Faculty of Education', 'IDM', '9.65', '2018-04-24', 'very soon'),
(13, 'Ross Barkley', 'Faculty of Education', 'WinRar', '8.40', '2018-04-18', 'very soon'),
(14, 'Ross Barkley', 'Faculty of Education', 'KMSpico', '10.1.9', '2018-04-17', 'very soon'),
(16, 'Eden Hazard', 'Faculty of Built Environment', 'VLC', '4.67', '2018-04-11', 'please soon'),
(17, 'Eden Hazard', 'Faculty of Built Environment', 'notepad ++', '9.6', '2018-04-23', 'very soon'),
(18, 'Marcos Alonso', 'Faculty of Business Administration and Management', 'Bitcomet', '59.9.0', '2018-04-12', 'very soon'),
(19, 'Marcos Alonso', 'Faculty of Business Administration and Management', 'Acrobat reader', '7.7', '2018-04-10', 'very soon');

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

DROP TABLE IF EXISTS `software`;
CREATE TABLE IF NOT EXISTS `software` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(100) DEFAULT NULL,
  `softwaretype` varchar(100) DEFAULT NULL,
  `softwareversion` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`no`, `id`, `softwaretype`, `softwareversion`, `status`) VALUES
(16, 3, 'IDM', '9.65', 'installed'),
(15, 1, 'Office2016', '2016', 'installed'),
(17, 4, 'WinRar', '8.40', 'installed'),
(19, 6, 'KMSpico', '10.1.9', 'installed'),
(20, 7, 'smadav', '7.8', 'installed');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`no`, `id`, `firstname`, `lastname`, `email`, `contact`, `username`, `password`) VALUES
(11, 'Staff10', 'Jack', 'Wilshere', 'jack@gmail.com', '0780871727', 'jack', 'pass'),
(13, 'nacho', 'Nacho', 'Moreal', 'nacho@gmail.com', '0758015369', 'nacho', 'nacho');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(10) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `regno` varchar(100) DEFAULT NULL,
  `faculty` varchar(100) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`no`, `id`, `firstname`, `lastname`, `email`, `regno`, `faculty`, `course`, `username`, `password`) VALUES
(8, '1', 'Nemanja', 'Matic', 'matic@gmail.com', '2015-E067-1009', 'FOBE', 'FOBE', 'matic', 'matic'),
(9, '2', 'Phill', 'Jones', 'phill@gmail.com', '2015-B071-1002', 'Science', 'Infromation Technology', 'jones', 'jones'),
(10, '3', 'Eric', 'Baily', 'eric@gmail.com', '2015-X071-1003', 'Agriulture', 'Agriculture', 'baily', 'baily'),
(11, '4', 'Anthony ', 'Martial', 'anthony@gmail.com', '2015-A098-1004', 'BAM', 'BAM', '4', '4'),
(12, '5', 'Paul', 'Pogba', 'paul@gmail.com', '2015-D009-1005', 'Education', 'Education', '5', '5'),
(14, '7', 'Alex', 'Ferguson', 'alex@gmail.com', '2015-E067-1007', 'FOBE', 'FOBE', '7', '7'),
(15, '8', 'Jose', 'Mourinho', 'jose@gmail.com', '2015-B071-1008', 'science', 'Science General', '8', '8'),
(16, '9', 'Ashley', 'Young', 'ashley@gmail.com', '2015-X071-1009', 'Agriulture', 'Agriculture', '9', '9'),
(17, '10', 'Rio', 'Ferdinand', 'rio@gmail.com', '2015-A098-10010', 'BAM', 'BAM', '10', '10'),
(18, '11', 'David', 'Degea', 'degea@gmail.com', '2015-D009-10011', 'Education', 'Education', '11', '11'),
(19, '12', 'Chris', 'Smalling', 'chris@gmail.com', '2015-S001-10012', 'SASS', 'SASS', '12', '12'),
(20, '13', 'Marcus', 'Rashford', 'marcus@gmail.com', '2015-E067-10013', 'FOBE', 'FOBE', '13', '13'),
(21, '14', 'Juan', 'Mata', 'juan@gmail.com', '2015-B071-10014', 'Science', 'Infromation Technology', '14', '14'),
(22, '15', 'Scott', 'Mctominay', 'scott@gmail.com', '2015-X071-10015', 'Agriculture', 'Agriculture', 'scott', 'scott'),
(23, '16', 'Jesse', 'Lingard', 'jesse@gmail.com', '2015-A098-10016', 'BAM', 'BAM', '16', '16'),
(24, '17', 'Romelu', 'Lukaku', 'romelu@gmail.com', '2015-D009-10017', 'Education', 'Education', '17', '17'),
(25, '18', 'Victor', 'Lindelof', 'victor@gmail.com', '2015-E067-10018', 'FOBE', 'FOBE', '18', '18'),
(26, '19', 'Micheal', 'Carrick', 'micheal@gmail.com', '2015-b071-10019', 'Science', 'Science General', '19', '19'),
(27, '20', 'Luke', 'Shaw', 'luke@gmail.com', '2015-S001-10020', 'SASS', 'SASS', '20', '20'),
(28, '21', 'Matteo', 'Damian', 'matteo@gmail.com', '2015-D009-10021', 'Education', 'Education', '21', '21');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `adminid` varchar(50) DEFAULT NULL,
  `adminfirstname` varchar(100) DEFAULT NULL,
  `lecturername` varchar(50) DEFAULT NULL,
  `lecturercomment` varchar(2000) DEFAULT NULL,
  `ICTstaffname` varchar(100) DEFAULT NULL,
  `softwaretype` varchar(100) DEFAULT NULL,
  `softwareversion` varchar(100) DEFAULT NULL,
  `taskdate` date DEFAULT NULL,
  `admincomment` varchar(100) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`no`, `adminid`, `adminfirstname`, `lecturername`, `lecturercomment`, `ICTstaffname`, `softwaretype`, `softwareversion`, `taskdate`, `admincomment`, `status`) VALUES
(1, 'admin1', 'Kalule Frank', 'David Luiz', 'please help me ', 'Nacho Moreal', 'Office 2016', '2016', '2018-04-26', 'please work on this request', 'Installed'),
(2, 'admin1', 'Kalule Frank', 'Ross Barkley', 'very soon', 'Jack Wilshere', 'WinRar', '8.40', '2018-04-26', 'please install this software', 'Installed'),
(3, 'admin1', 'Kalule Frank', 'Ross Barkley', 'very soon', 'Nacho Moreal', 'IDM', '9.65', '2018-04-26', 'please install this software', 'Installed'),
(5, 'admin1', 'Kalule Frank', 'David Luiz', 'very urgent', 'Jack Wilshere', 'smadav', '7.8', '2018-04-27', '', 'Not Installed'),
(7, 'admin1', 'Kalule Frank', 'David Luiz', 'hope very soon', 'Nacho Moreal', 'adobe ', '6', '2018-04-27', 'please work to do..', 'Not Installed'),
(9, 'admin1', 'Kalule Frank', 'Marcos Alonso', 'very soon', 'Nacho Moreal', 'kaspersky', '9.0', '2018-04-27', 'please work on this', 'Not Installed'),
(10, 'admin1', 'Kalule Frank', 'Marcos Alonso', 'help please', 'Nacho Moreal', 'eclipse', '9.6', '2018-04-27', 'please work', 'Not Installed'),
(11, 'admin1', 'Kalule Frank', 'Alvaro Morata', 'please need it soon', 'Jack Wilshere', 'mindview', '7', '2018-04-27', 'please install', 'Not Installed'),
(12, 'admin1', 'Kalule Frank', 'Ross Barkley', 'very soon', 'Jack Wilshere', 'KMSpico', '10.1.9', '2018-04-27', 'please install', 'Not Installed'),
(13, 'admin1', 'Kalule Frank', 'Ross Barkley', 'very soon', 'Nacho Moreal', 'KMSpico', '10.1.9', '2018-04-27', 'pleasee work to do', 'Installed');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
