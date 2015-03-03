-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2014 at 12:12 PM
-- Server version: 5.5.35-cll
-- PHP Version: 5.4.24

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `a407804f_srmaakash`
--

-- --------------------------------------------------------

--
-- Table structure for table `non_verified_teacher`
--

CREATE TABLE IF NOT EXISTS `non_verified_teacher` (
  `reg_no` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `secret_code` varchar(32) NOT NULL,
  `create_date` date NOT NULL,
  `create_time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `non_verified_teacher`
--

INSERT INTO `non_verified_teacher` (`reg_no`, `email`, `secret_code`, `create_date`, `create_time`) VALUES
('1061210269', 'anshul_sahni@live.com', '901302fd70b165e1f3669fb0b6facb59', '2014-02-26', '12:49:33'),
('1081210165', 'ghanta@gmail.com', 'd20e23894c0295d78d35d873e9f18ec4', '2014-02-26', '03:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `reg_id` varchar(10) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_of_test` int(3) DEFAULT '0',
  `email_verified` tinyint(1) NOT NULL,
  `reg_date` date NOT NULL,
  `reg_time` time NOT NULL,
  `email_verify_date` date DEFAULT NULL,
  `email_verify_time` time DEFAULT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`reg_id`, `pwd`, `name`, `email`, `no_of_test`, `email_verified`, `reg_date`, `reg_time`, `email_verify_date`, `email_verify_time`) VALUES
('1051210269', '25faad24ce6dedcc53adc553b6e4c7ca', 'Qwerty', 'anshul_sahni@rediffmail.com', 0, 1, '2014-02-23', '07:25:16', '2014-02-23', '10:55:13'),
('1061210270', '25faad24ce6dedcc53adc553b6e4c7ca', 'TERERERE', 'anshul_sahni@123.com', 0, 1, '2014-02-23', '07:27:55', '2014-02-23', '10:56:18'),
('1081210225', 'root', 'Anshul Sahni', '', NULL, 1, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
('1081210255', 'root', 'Krips', '', NULL, 1, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
('1081210269', 'root', 'Anshul Sahni', '', NULL, 1, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
('2081210253', 'root', 'Venkat Raman', '', NULL, 1, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
('2081210256', 'root', 'Lakshmi Nathan', '', NULL, 1, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00'),
('1021210269', '25faad24ce6dedcc53adc553b6e4c7ca', 'XXXXXXx', 'tigers2007@rediffmail.com', 0, 1, '2014-02-26', '12:47:30', '2014-02-26', '12:48:16'),
('1061210269', '25faad24ce6dedcc53adc553b6e4c7ca', 'RRRRRRR', 'anshul_sahni@live.com', 0, 0, '2014-02-26', '12:49:33', '0000-00-00', '00:00:00'),
('1071210269', '25faad24ce6dedcc53adc553b6e4c7ca', 'OOOOOO', 'anshulsahni45@gmail.com', 0, 1, '2014-02-26', '12:53:48', '2014-02-26', '12:54:44'),
('1081210165', '25d55ad283aa400af464c76d713c07ad', 'kripanshu ', 'ghanta@gmail.com', 0, 0, '2014-02-26', '03:38:01', '0000-00-00', '00:00:00'),
('1081210174', '25f9e794323b453885f5181f1b624d0b', 'hemanshu ', 'kripanshubhargava@gmail.com', 0, 1, '2014-02-26', '03:41:41', '2014-02-26', '03:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `test_index`
--

CREATE TABLE IF NOT EXISTS `test_index` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `testid` int(11) NOT NULL,
  `teacher_id` varchar(10) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `test_index`
--

INSERT INTO `test_index` (`sno`, `testid`, `teacher_id`, `enabled`) VALUES
(1, 597378, '1051210269', 1),
(2, 102812, '1051210269', 1),
(3, 103236, '1051210269', 1),
(4, 212966, '1051210269', 1),
(5, 283416, '1051210269', 1),
(6, 997116, '1051210269', 0),
(7, 601910, '1051210269', 0),
(8, 894174, '1051210269', 0),
(9, 176547, '1051210269', 0),
(10, 513030, '1081210174', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_response`
--

CREATE TABLE IF NOT EXISTS `test_response` (
  `reg_no` varchar(10) NOT NULL,
  `testid` int(6) NOT NULL,
  `question` varchar(45) NOT NULL,
  `question_sno` int(3) NOT NULL,
  `response` char(1) NOT NULL,
  `correct` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_response`
--

INSERT INTO `test_response` (`reg_no`, `testid`, `question`, `question_sno`, `response`, `correct`) VALUES
('1081210268', 23013, 'What is the formula for water', 11, 'B', 0),
('1081210268', 23013, 'What is 2*2', 12, 'C', 1),
('1081210268', 23013, 'Where is New Delhi', 13, 'C', 0),
('1081210268', 23013, 'Who is PM', 14, 'D', 1),
('1081210268', 23013, 'Where is SRM', 15, 'C', 0),
('123', 16252, 'Question 1', 16, 'A', 1),
('123', 16252, 'Question 1', 17, 'A', 0),
('123', 16252, 'Question 3', 18, 'A', 0),
('123', 16252, 'question 4', 19, 'A', 0),
('123', 16252, 'Question 5', 20, 'A', 0),
('1081210269', 23013, 'What is the formula for water', 11, 'A', 1),
('1081210269', 23013, 'What is 2*2', 12, 'A', 0),
('1081210269', 23013, 'Where is New Delhi', 13, 'A', 0),
('1081210269', 23013, 'Who is PM', 14, 'B', 0),
('1081210269', 23013, 'Where is SRM', 15, 'C', 0),
('1081210270', 23013, 'What is the formula for water', 11, 'A', 1),
('1081210270', 23013, 'What is 2*2', 12, 'C', 1),
('1081210270', 23013, 'Where is New Delhi', 13, 'B', 1),
('1081210270', 23013, 'Who is PM', 14, 'D', 1),
('1081210270', 23013, 'Where is SRM', 15, 'D', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_table`
--

CREATE TABLE IF NOT EXISTS `test_table` (
  `question` varchar(45) DEFAULT NULL,
  `optiona` varchar(20) DEFAULT NULL,
  `optionb` varchar(20) DEFAULT NULL,
  `optionc` varchar(20) DEFAULT NULL,
  `optiond` varchar(20) DEFAULT NULL,
  `testid` int(6) DEFAULT NULL,
  `teacher_id` varchar(10) DEFAULT NULL,
  `correct_ans` varchar(20) DEFAULT NULL,
  `que_sno` int(3) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`que_sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `test_table`
--

INSERT INTO `test_table` (`question`, `optiona`, `optionb`, `optionc`, `optiond`, `testid`, `teacher_id`, `correct_ans`, `que_sno`) VALUES
('Anshul Sahni', 'Anshul Sahni', 'Anshul Sahni', 'Anshul Sahni', 'Anshul Sahni', 487, '2081210253', 'Anshul Sahni', 1),
('Anshul Sahni', 'Anshul Sahni', 'Anshul Sahni', 'Anshul Sahni', 'Anshul Sahni', 487, '2081210253', 'Anshul Sahni', 2),
('Anshul Sahni', 'Anshul Sahni', 'Anshul Sahni', 'Anshul Sahni', 'Anshul Sahni', 487, '2081210253', 'Anshul Sahni', 3),
('Anshul Sahni', 'Anshul Sahni', 'Anshul Sahni', 'Anshul Sahni', 'Anshul Sahni', 487, '2081210253', 'Anshul Sahni', 4),
('Anshul Sahni', 'Anshul Sahni', 'Anshul Sahni', 'Anshul Sahni', 'Anshul Sahni', 487, '2081210253', 'Anshul Sahni', 5),
('What is the formula for water', 'H20', 'H20', 'H20', 'H20', 5014, '2081210253', 'H20', 6),
('What is the formula for water', 'H20', 'H20', 'H20', 'H20', 5014, '2081210253', 'H20', 7),
('What is the formula for water', 'H20', 'H20', 'H20', 'H20', 5014, '2081210253', 'H20', 8),
('What is the formula for water', 'H20', 'H20', 'H20', 'H20', 5014, '2081210253', 'H20', 9),
('What is the formula for water', 'H2O', 'NaCl', 'MgCl2', 'H2O2', 23300, '2081210253', 'A', 10),
('What is the formula for water', 'H2O', 'NaCl', 'MgCl2', 'H2O2', 23013, '2081210253', 'A', 11),
('What is 2*2', '5', '3', '4', '1', 23013, '2081210253', 'C', 12),
('Where is New Delhi', 'USA', 'India', 'Pakistan', 'BanglaDesh', 23013, '2081210253', 'B', 13),
('Who is PM', 'Narendra Modi', 'Indira Gandhi', 'Rahul Gandhi', 'Manmohan Singh', 23013, '2081210253', 'D', 14),
('Where is SRM', 'Trivandrum', 'Kohima', 'Kashmir', 'Chennai', 23013, '2081210253', 'D', 15),
('Question 1', 'A', 'b', 'c', 'd', 16252, '2081210253', 'A', 16),
('Question 1', 'A', 'b', 'c', 'd', 16252, '2081210253', 'B', 17),
('Question 3', 'a', 'b', 'c', 'd', 16252, '2081210253', 'C', 18),
('question 4', 'a', 'b', 'c', 'd', 16252, '2081210253', 'D', 19),
('Question 5', 'a', 'b', 'c', 'd', 16252, '2081210253', 'B', 20),
('I am god', 'I am god', 'I am god', 'I am god', 'I am god', 898760, '1051210269', 'A', 21),
('I am god', 'I am god', 'I am god', 'I am god', 'I am god', 898760, '1051210269', 'A', 22),
('I am god', 'I am god', 'I am god', 'I am god', 'I am god', 898760, '1051210269', 'C', 23),
('I am god', 'I am god', 'I am god', 'I am god', 'I am god', 898760, '1051210269', 'C', 24),
('I am god', 'I am god', 'I am god', 'I am god', 'I am god', 898760, '1051210269', 'C', 25),
('', '', '', '', '', 320907, '1051210269', '', 26),
('', '', '', '', '', 320907, '1051210269', '', 27),
('', '', '', '', '', 320907, '1051210269', '', 28),
('', '', '', '', '', 320907, '1051210269', '', 29),
('', '', '', '', '', 320907, '1051210269', '', 30),
('question', 'option', 'option', 'option', 'option', 404431, '1051210269', 'B', 31),
('question', 'option', 'option', 'option', 'option', 603311, '1051210269', 'B', 32),
('question', 'option', 'option', 'option', 'option', 603311, '1051210269', 'B', 33),
('question', 'option', 'option', 'option', 'option', 603311, '1051210269', 'B', 34),
('option', 'option', 'option', 'option', 'option', 603311, '1051210269', 'D', 35),
('question', 'option', 'option', 'option', 'option', 603311, '1051210269', 'D', 36),
('question', 'option', 'option', 'option', 'option', 681176, '1051210269', 'B', 37),
('question', 'option', 'option', 'option', 'option', 681176, '1051210269', 'B', 38),
('question', 'option', 'option', 'option', 'option', 681176, '1051210269', 'B', 39),
('option', 'option', 'option', 'option', 'option', 681176, '1051210269', 'D', 40),
('question', 'option', 'option', 'option', 'option', 681176, '1051210269', 'D', 41),
('question', 'option', 'option', 'option', 'option', 597378, '1051210269', 'B', 42),
('question', 'option', 'option', 'option', 'option', 597378, '1051210269', 'B', 43),
('question', 'option', 'option', 'option', 'option', 597378, '1051210269', 'B', 44),
('option', 'option', 'option', 'option', 'option', 597378, '1051210269', 'D', 45),
('question', 'option', 'option', 'option', 'option', 597378, '1051210269', 'D', 46),
('I am the king', 'I am the king', 'I am the king', 'I am the king', 'I am the king', 212966, '1051210269', 'B', 47),
('I am the king', 'I am the king', 'I am the king', 'I am the king', 'I am the king', 212966, '1051210269', 'A', 48),
('I am the king', 'I am the king', 'I am the king', 'I am the king', 'I am the king', 212966, '1051210269', 'A', 49),
('I am the king', 'I am the king', 'I am the king', 'I am the king', 'I am the king', 212966, '1051210269', 'B', 50),
('I am the king', 'I am the king', 'I am the king', 'I am the king', 'I am the king', 212966, '1051210269', 'C', 51),
('This is sample test question 1', 'option1s', 'opiton1b', 'option1c', 'option1d', 283416, '1051210269', 'B', 52),
('This is sample test question 2', 'option2a', 'option2b', 'option2c', 'option2d', 283416, '1051210269', 'C', 53),
('This is sample test question 2', 'This is sample test ', 'This is sample test ', 'This is sample test ', 'This is sample test ', 283416, '1051210269', 'B', 54),
('This is sample test question 2', 'This is sample test ', 'This is sample test ', 'This is sample test ', 'This is sample test ', 283416, '1051210269', 'B', 55),
('This is sample test question 2', 'This is sample test ', 'This is sample test ', 'This is sample test ', 'This is sample test ', 283416, '1051210269', 'B', 56),
('This is sample test question 1', 'option1s', 'opiton1b', 'option1c', 'option1d', 997116, '1051210269', 'B', 57),
('This is sample test question 2', 'option2a', 'option2b', 'option2c', 'option2d', 997116, '1051210269', 'C', 58),
('This is sample test question 2', 'This is sample test ', 'This is sample test ', 'This is sample test ', 'This is sample test ', 997116, '1051210269', 'B', 59),
('This is sample test question 2', 'This is sample test ', 'This is sample test ', 'This is sample test ', 'This is sample test ', 997116, '1051210269', 'B', 60),
('This is sample test question 2', 'This is sample test ', 'This is sample test ', 'This is sample test ', 'This is sample test ', 997116, '1051210269', 'B', 61),
('', '', '', '', '', 601910, '1051210269', '', 62),
('', '', '', '', '', 601910, '1051210269', '', 63),
('', '', '', '', '', 601910, '1051210269', '', 64),
('', '', '', '', '', 601910, '1051210269', '', 65),
('', '', '', '', '', 601910, '1051210269', '', 66),
('', '', '', '', '', 894174, '1051210269', '', 67),
('', '', '', '', '', 894174, '1051210269', '', 68),
('', '', '', '', '', 894174, '1051210269', '', 69),
('', '', '', '', '', 894174, '1051210269', '', 70),
('', '', '', '', '', 894174, '1051210269', '', 71),
('Thhis isalso a smple test yo guuys this is sa', 'Thhis isalso a smple', 'Thhis isalso a smple', 'Thhis isalso a smple', 'Thhis isalso a smple', 176547, '1051210269', 'B', 72),
('Thhis isalso a smple test yo guuys this is sa', 'Thhis isalso a smple', 'Thhis isalso a smple', 'Thhis isalso a smple', 'Thhis isalso a smple', 176547, '1051210269', 'D', 73),
('Thhis isalso a smple test yo guuys this is sa', 'Thhis isalso a smple', 'Thhis isalso a smple', 'Thhis isalso a smple', 'Thhis isalso a smple', 176547, '1051210269', 'B', 74),
('Thhis isalso a smple test yo guuys this is sa', 'Thhis isalso a smple', 'Thhis isalso a smple', 'Thhis isalso a smple', 'Thhis isalso a smple', 176547, '1051210269', 'B', 75),
('Thhis isalso a smple test yo guuys this is sa', 'Thhis isalso a smple', 'Thhis isalso a smple', 'Thhis isalso a smple', 'Thhis isalso a smple', 176547, '1051210269', 'B', 76),
('Question1', 'Question1', 'Question1', 'Question1', 'Question1', 513030, '1081210174', 'B', 77),
('Question1', 'Question1', 'Question1', 'Question1', 'Question1', 513030, '1081210174', 'B', 78),
('Question1', 'Question1', 'Question1', 'Question1', 'Question1', 513030, '1081210174', 'C', 79),
('Question1', 'Question1', 'Question1', 'Question1', 'Question1', 513030, '1081210174', 'D', 80),
('Question1', 'Question1', 'Question1', 'Question1', 'Question1', 513030, '1081210174', 'C', 81);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
