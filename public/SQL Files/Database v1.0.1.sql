-- Adminer 4.7.4 MySQL dump
CREATE DATABASE PSAFE;
USE PSAFE;

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE TABLE `Class` (
  `Class_ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Teacher_ID` int(11) DEFAULT NULL,
  `Teacher_ID2` int(11) DEFAULT NULL,
  `Domain_ID` int(11) DEFAULT NULL,
  `Domain_ID2` int(11) DEFAULT NULL,
  `Domain_ID3` int(11) DEFAULT NULL,
  `Num_Students` int(8) DEFAULT NULL,
  PRIMARY KEY (`Class_ID`),
  KEY `Teacher_ID` (`Teacher_ID`),
  KEY `Domain_ID` (`Domain_ID`),
  KEY `Teacher_ID2` (`Teacher_ID2`),
  KEY `Domain_ID2` (`Domain_ID2`),
  KEY `Domain_ID3` (`Domain_ID3`),
  CONSTRAINT `Class_ibfk_4` FOREIGN KEY (`Teacher_ID`) REFERENCES `Teacher` (`Teacher_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `Class_ibfk_5` FOREIGN KEY (`Domain_ID`) REFERENCES `Learning Domains` (`Domain_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `Class_ibfk_6` FOREIGN KEY (`Teacher_ID2`) REFERENCES `Teacher` (`Teacher_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `Class_ibfk_7` FOREIGN KEY (`Domain_ID`) REFERENCES `Learning Domains` (`Domain_ID`) ON DELETE SET NULL,
  CONSTRAINT `Class_ibfk_8` FOREIGN KEY (`Domain_ID2`) REFERENCES `Learning Domains` (`Domain_ID`) ON DELETE SET NULL,
  CONSTRAINT `Class_ibfk_9` FOREIGN KEY (`Domain_ID3`) REFERENCES `Learning Domains` (`Domain_ID`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Class` (`Class_ID`, `Name`, `Teacher_ID`, `Teacher_ID2`, `Domain_ID`, `Domain_ID2`, `Domain_ID3`, `Num_Students`) VALUES
(1,	'CSCI340',	1,	NULL,	1,	NULL,	NULL,	10),
(2,	'TEC: French Existentialism',	2,	NULL,	2,	NULL,	NULL,	20),
(3,	'CSCI150',	3,	NULL,	1,	NULL,	NULL,	30);

CREATE TABLE `Learning Domains` (
  `Domain_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Abbr` varchar(2) NOT NULL,
  `Active` bit(1) NOT NULL,
  PRIMARY KEY (`Domain_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `Learning Domains` (`Domain_ID`, `Name`, `Abbr`, `Active`) VALUES
(1,	'Computer Science',	'CS',	CONV('1', 2, 10) + 0),
(2,	'Engaged Citizen',	'EC',	CONV('1', 2, 10) + 0);

CREATE TABLE `Question` (
  `Question_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Domain_ID` int(11) NOT NULL,
  `Text` text NOT NULL,
  `Active` bit(1) NOT NULL,
  PRIMARY KEY (`Question_ID`),
  KEY `Domain_ID` (`Domain_ID`),
  CONSTRAINT `Question_ibfk_2` FOREIGN KEY (`Domain_ID`) REFERENCES `Learning Domains` (`Domain_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `Question` (`Question_ID`, `Domain_ID`, `Text`, `Active`) VALUES
(1,	1,	'Students are able to create functional applications.',	CONV('0', 2, 10) + 0),
(2,	1,	'Students are able to translate their ideas into code.',	CONV('0', 2, 10) + 0),
(3,	2,	'Students have taken the steps to apply their knowledge from this class to the outside world.',	CONV('0', 2, 10) + 0),
(4,	2,	'Students participate in class.',	CONV('0', 2, 10) + 0);

CREATE TABLE `Response` (
  `Response_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Submission_ID` int(11) NOT NULL,
  `Question_ID` int(11) NOT NULL,
  `STR` smallint(6) NOT NULL,
  `SAT` smallint(6) NOT NULL,
  `NG` smallint(6) NOT NULL,
  `UNSAT` smallint(6) NOT NULL,
  `NA` smallint(6) NOT NULL,
  PRIMARY KEY (`Response_ID`),
  KEY `Submission_ID` (`Submission_ID`),
  KEY `Question_ID` (`Question_ID`),
  CONSTRAINT `Response_ibfk_3` FOREIGN KEY (`Submission_ID`) REFERENCES `Submission` (`Submission_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Response_ibfk_4` FOREIGN KEY (`Question_ID`) REFERENCES `Question` (`Question_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `Response` (`Response_ID`, `Submission_ID`, `Question_ID`, `STR`, `SAT`, `NG`, `UNSAT`, `NA`) VALUES
(1,	1,	1,	5,	4,	3,	2,	1),
(2,	1,	2,	1,	2,	3,	4,	5),
(3,	2,	1,	9,	8,	7,	6,	5),
(4,	2,	2,	5,	6,	7,	8,	9),
(5,	3,	3,	1,	4,	7,	2,	5),
(6,	3,	4,	5,	2,	7,	4,	1);

CREATE TABLE `Submission` (
  `Submission_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Teacher_ID` int(11) NOT NULL,
  `Class_ID` int(11) NOT NULL,
  `Timestamp` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `IP` bigint(20) NOT NULL,
  PRIMARY KEY (`Submission_ID`),
  KEY `Teacher_ID` (`Teacher_ID`),
  KEY `Class_ID` (`Class_ID`),
  CONSTRAINT `Submission_ibfk_3` FOREIGN KEY (`Teacher_ID`) REFERENCES `Teacher` (`Teacher_ID`) ON UPDATE CASCADE,
  CONSTRAINT `Submission_ibfk_4` FOREIGN KEY (`Class_ID`) REFERENCES `Class` (`Class_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `Submission` (`Submission_ID`, `Teacher_ID`, `Class_ID`, `Timestamp`, `IP`) VALUES
(1,	1,	1,	'2019-11-08 16:49:26',	123456789),
(2,	3,	3,	'2019-11-08 16:52:22',	987654321),
(3,	2,	2,	'2019-11-08 16:53:30',	147258369);

CREATE TABLE `Teacher` (
  `Teacher_ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  PRIMARY KEY (`Teacher_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Teacher` (`Teacher_ID`, `Name`) VALUES
(1,	'Mark Goadrich'),
(2,	'Catherine Jellinik'),
(3,	'Gabe Ferrer');

-- 2019-11-21 04:05:40
