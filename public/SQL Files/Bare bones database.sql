-- Adminer 4.7.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE TABLE `Class` (
  `Class_ID` int(11) NOT NULL,
  `Course Code` text NOT NULL,
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
  CONSTRAINT `Class_ibfk_7` FOREIGN KEY (`Domain_ID`) REFERENCES `Learning Domains` (`Domain_ID`) ON DELETE SET NULL,
  CONSTRAINT `Class_ibfk_8` FOREIGN KEY (`Domain_ID2`) REFERENCES `Learning Domains` (`Domain_ID`) ON DELETE SET NULL,
  CONSTRAINT `Class_ibfk_9` FOREIGN KEY (`Domain_ID3`) REFERENCES `Learning Domains` (`Domain_ID`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `Learning Domains` (
  `Domain_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text,
  `Abbr` varchar(2) NOT NULL,
  `Active` bit(1) NOT NULL,
  PRIMARY KEY (`Domain_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


CREATE TABLE `Question` (
  `Question_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Domain_ID` int(11) NOT NULL,
  `Text` text NOT NULL,
  `Active` bit(1) NOT NULL,
  PRIMARY KEY (`Question_ID`),
  KEY `Domain_ID` (`Domain_ID`),
  CONSTRAINT `Question_ibfk_2` FOREIGN KEY (`Domain_ID`) REFERENCES `Learning Domains` (`Domain_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


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


CREATE TABLE `Submission` (
  `Submission_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Teacher_ID` int(11) NOT NULL,
  `Class_ID` int(11) NOT NULL,
  `Timestamp` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `IP` bigint(20) NOT NULL,
  PRIMARY KEY (`Submission_ID`),
  KEY `Teacher_ID` (`Teacher_ID`),
  KEY `Class_ID` (`Class_ID`),
  CONSTRAINT `Submission_ibfk_4` FOREIGN KEY (`Class_ID`) REFERENCES `Class` (`Class_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


CREATE TABLE `Teacher` (
  `Teacher_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `AAD_KEY` text,
  PRIMARY KEY (`Teacher_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;


-- 2019-12-02 22:17:45
