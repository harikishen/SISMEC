-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2015 at 04:33 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `harikishen`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admission_id` int(11) NOT NULL,
  `type` tinyint(2) NOT NULL COMMENT '0-pemenant, 1-present, 2-guardian',
  `house_name` varchar(30) DEFAULT NULL,
  `place1` varchar(30) DEFAULT NULL,
  `place2` varchar(30) DEFAULT NULL,
  `post_office` varchar(30) DEFAULT NULL,
  `district` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `pin` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Addresses of parents and guardians' AUTO_INCREMENT=50 ;

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE IF NOT EXISTS `admissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admission_no` int(11) DEFAULT NULL COMMENT 'Admission Number',
  `name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `date_of_birth` date DEFAULT '0000-00-00',
  `sex` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `caste` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `religion` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `naitivity` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `village` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `taluk` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `relation` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `blood_group` varchar(3) COLLATE latin1_general_ci DEFAULT NULL,
  `annual_income` int(11) DEFAULT NULL,
  `student_mobile` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `student_email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `date_of_admission` date DEFAULT '0000-00-00' COMMENT 'Date of Admission',
  `course_id` tinyint(2) DEFAULT NULL COMMENT 'Foreign key for courses table',
  `category_id` tinyint(2) DEFAULT NULL COMMENT 'Foreign key for categories table',
  `reservation_id` tinyint(2) DEFAULT NULL COMMENT 'Foreign key for quotas table',
  `detail_id` int(11) DEFAULT NULL,
  `transfercertificate_id` int(11) DEFAULT NULL COMMENT 'Foreign key for transfer certificates table',
  `rollno` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `batch` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `semester` varchar(4) COLLATE latin1_general_ci DEFAULT NULL,
  `phone_no` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `class` varchar(6) COLLATE latin1_general_ci DEFAULT NULL,
  `regno` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `year_po` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Main Table for admissions' AUTO_INCREMENT=38 ;

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE IF NOT EXISTS `details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admission_id` int(11) unsigned NOT NULL,
  `previous_institution` varchar(60) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'School where last studied',
  `register_no` varchar(20) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Qualifying Exam''s Register No',
  `tc_no` varchar(25) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'No of TC issued by the previous institution',
  `tc_date` date DEFAULT '0000-00-00' COMMENT 'Date of TC issued by the previous institution',
  `entrance_roll_no` int(11) DEFAULT NULL,
  `entrance_rank` int(11) DEFAULT NULL,
  `qualifying_board` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `qualifying_exam` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `percentage` tinyint(2) DEFAULT '0' COMMENT 'Percentage of marks obtained in the qualifying examination',
  `year_of_pass` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Admission details, not (usually) required \r\n\r\nfor any proces' AUTO_INCREMENT=38 ;

-- --------------------------------------------------------

--
-- Table structure for table `relatives`
--

CREATE TABLE IF NOT EXISTS `relatives` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admission_id` int(11) NOT NULL,
  `type` tinyint(2) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `occupation` varchar(30) DEFAULT NULL,
  `email_address` varchar(60) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Details of parents and guardians' AUTO_INCREMENT=53 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
