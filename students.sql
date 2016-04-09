-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2016 at 03:13 PM
-- Server version: 5.5.27
-- PHP Version: 5.6.18

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `STUD_ID` char(10) NOT NULL,
  `STUD_NAME` varchar(100) NOT NULL,
  `STUD_DOB` date NOT NULL,
  `STUD_PHONE` varchar(10) NOT NULL,
  `STUD_IC` varchar(12) NOT NULL,
  `STUD_COURSE` char(5) NOT NULL,
  PRIMARY KEY (`STUD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`STUD_ID`, `STUD_NAME`, `STUD_DOB`, `STUD_PHONE`, `STUD_IC`, `STUD_COURSE`) VALUES
('2014240322', 'MUHAMMAD AFIF ZAFRI BIN KHUZAIRI', '1996-05-21', '0124569854', '960521025017', 'CS110');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
