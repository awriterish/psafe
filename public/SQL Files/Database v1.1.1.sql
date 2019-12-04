-- Adminer 4.7.4 MySQL dump
CREATE DATABASE PSAFE;
USE PSAFE;

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE TABLE `Classes` (
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
  CONSTRAINT `Classes_ibfk_7` FOREIGN KEY (`Domain_ID`) REFERENCES `Learning Domains` (`Domain_ID`) ON DELETE SET NULL,
  CONSTRAINT `Classes_ibfk_8` FOREIGN KEY (`Domain_ID2`) REFERENCES `Learning Domains` (`Domain_ID`) ON DELETE SET NULL,
  CONSTRAINT `Classes_ibfk_9` FOREIGN KEY (`Domain_ID3`) REFERENCES `Learning Domains` (`Domain_ID`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Classes` (`Class_ID`, `Course Code`, `Name`, `Teacher_ID`, `Teacher_ID2`, `Domain_ID`, `Domain_ID2`, `Domain_ID3`, `Num_Students`) VALUES
(26780,	'ANTH 100  01',	'Intro  to Cultural  Anthropology ',	76,	NULL,	39,	NULL,	NULL,	NULL),
(26784,	'ANTH 102  01',	'Intro  Archaeology  ',	79,	NULL,	39,	NULL,	NULL,	NULL),
(26790,	'ANTH 245  01',	'Maya : Global Citizens /Ancient Culture ',	77,	NULL,	39,	NULL,	NULL,	NULL),
(26792,	'ANTH 317  01',	'Society , Culture , and History ',	77,	NULL,	40,	39,	NULL,	NULL),
(26793,	'ANTH 365  01',	'Anthropological  Theory ',	79,	NULL,	39,	42,	NULL,	NULL),
(26794,	'ANTH 497  01',	'Advanced  Research  ',	76,	NULL,	39,	41,	42,	NULL),
(27093,	'ANTH 100  01',	'Intro  to Cultural  Anthropology ',	77,	NULL,	39,	NULL,	NULL,	NULL),
(27094,	'ANTH 200  01',	'Buried  Cities  and Lost  Tribes ',	79,	NULL,	39,	40,	NULL,	NULL),
(27095,	'ANTH 300  01',	'Ethnographic  Methods ',	77,	NULL,	39,	41,	NULL,	NULL),
(27096,	'ANTH 330  01',	'Human  Impact  onAncient  Environments ',	79,	NULL,	39,	42,	NULL,	NULL),
(27097,	'ANTH 335  01',	'Geographic  Information  Science ',	79,	NULL,	39,	NULL,	NULL,	NULL),
(27234,	'ARTH 170  01',	'Western  Art  History  Survey  I',	81,	NULL,	40,	NULL,	NULL,	NULL),
(27235,	'ARTH 340  01',	'American  Art  History ',	81,	NULL,	40,	NULL,	NULL,	NULL),
(27236,	'ARTH 430  01',	'Practicum : Senior  Seminar ',	81,	NULL,	43,	NULL,	NULL,	NULL),
(27448,	'ANTH 385  C1',	'Topics : Medical  Anthropology ',	80,	NULL,	39,	NULL,	NULL,	NULL),
(27461,	'ANTH 100  02',	'Intro  to Cultural  Anthropology ',	78,	NULL,	39,	NULL,	NULL,	NULL),
(27628,	'ANTH 499  01',	'Ind St :Political  Archaeology ',	79,	NULL,	43,	NULL,	NULL,	NULL),
(27760,	'ANTH 365  01   W',	'Anthropological  Theory -WII',	79,	NULL,	42,	NULL,	NULL,	NULL),
(27761,	'ANTH 497  01   W',	'Advanced  Research -WII',	76,	NULL,	42,	NULL,	NULL,	NULL);

CREATE TABLE `Learning Domains` (
  `Domain_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text,
  `Abbr` varchar(2) NOT NULL,
  `Active` bit(1) NOT NULL,
  PRIMARY KEY (`Domain_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

INSERT INTO `Learning Domains` (`Domain_ID`, `Name`, `Abbr`, `Active`) VALUES
(39,	NULL,	'SB',	CONV('1', 2, 10) + 0),
(40,	NULL,	'HP',	CONV('1', 2, 10) + 0),
(41,	NULL,	'UR',	CONV('1', 2, 10) + 0),
(42,	NULL,	'W2',	CONV('1', 2, 10) + 0),
(43,	NULL,	'',	CONV('1', 2, 10) + 0);

CREATE TABLE `Questions` (
  `Question_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Domain_ID` int(11) NOT NULL,
  `Text` text NOT NULL,
  `Active` bit(1) NOT NULL,
  PRIMARY KEY (`Question_ID`),
  KEY `Domain_ID` (`Domain_ID`),
  CONSTRAINT `Questions_ibfk_2` FOREIGN KEY (`Domain_ID`) REFERENCES `Learning Domains` (`Domain_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `Responses` (
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
  CONSTRAINT `Responses_ibfk_3` FOREIGN KEY (`Submission_ID`) REFERENCES `Submissions` (`Submission_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Responses_ibfk_4` FOREIGN KEY (`Question_ID`) REFERENCES `Questions` (`Question_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `Submissions` (
  `Submission_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Teacher_ID` int(11) NOT NULL,
  `Class_ID` int(11) NOT NULL,
  `Timestamp` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `IP` bigint(20) NOT NULL,
  PRIMARY KEY (`Submission_ID`),
  KEY `Teacher_ID` (`Teacher_ID`),
  KEY `Class_ID` (`Class_ID`),
  CONSTRAINT `Submissions_ibfk_4` FOREIGN KEY (`Class_ID`) REFERENCES `Classes` (`Class_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `Teachers` (
  `Teacher_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `AAD_KEY` text,
  PRIMARY KEY (`Teacher_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

INSERT INTO `Teachers` (`Teacher_ID`, `Name`, `AAD_KEY`) VALUES
(76,	'Anne Goldberg',	NULL),
(77,	'Stacey Schwartzkopf',	NULL),
(78,	'Alexandra Veselka-Bush',	NULL),
(79,	'Brett Hill',	NULL),
(80,	'Sydney Yeager',	NULL),
(81,	'Rod Miller',	NULL);

-- 2019-12-04 15:24:02
