-- Adminer 4.7.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `PSAFE` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `PSAFE`;

DROP TABLE IF EXISTS `Classes`;
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
  CONSTRAINT `Classes_ibfk_10` FOREIGN KEY (`Teacher_ID`) REFERENCES `Teachers` (`Teacher_ID`),
  CONSTRAINT `Classes_ibfk_11` FOREIGN KEY (`Teacher_ID2`) REFERENCES `Teachers` (`Teacher_ID`),
  CONSTRAINT `Classes_ibfk_7` FOREIGN KEY (`Domain_ID`) REFERENCES `Learning Domains` (`Domain_ID`) ON DELETE SET NULL,
  CONSTRAINT `Classes_ibfk_8` FOREIGN KEY (`Domain_ID2`) REFERENCES `Learning Domains` (`Domain_ID`) ON DELETE SET NULL,
  CONSTRAINT `Classes_ibfk_9` FOREIGN KEY (`Domain_ID3`) REFERENCES `Learning Domains` (`Domain_ID`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `Learning Domains`;
CREATE TABLE `Learning Domains` (
  `Domain_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text,
  `Abbr` varchar(4) NOT NULL,
  `Active` bit(1) NOT NULL,
  PRIMARY KEY (`Domain_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

INSERT INTO `Learning Domains` (`Domain_ID`, `Name`, `Abbr`, `Active`) VALUES
(39,	'Social and Behavioral Analysis',	'SB',	CONV('1', 2, 10) + 0),
(40,	'Historical Perspectives',	'HP',	CONV('1', 2, 10) + 0),
(41,	'Undergraduate Research',	'UR',	CONV('0', 2, 10) + 0),
(42,	'Writing Level 2',	'W2',	CONV('0', 2, 10) + 0),
(43,	NULL,	'',	CONV('0', 2, 10) + 0),
(44,	'Expressive Arts',	'EA',	CONV('1', 2, 10) + 0),
(45,	'Literary Studies',	'LS',	CONV('1', 2, 10) + 0),
(46,	'Natural Science Inquiry ',	'NS',	CONV('1', 2, 10) + 0),
(47,	'Values, Beliefs and Ethics',	'VA',	CONV('1', 2, 10) + 0),
(48,	'Foreign Language',	'FL',	CONV('0', 2, 10) + 0),
(49,	'Physical Activity ',	'PA',	CONV('0', 2, 10) + 0),
(50,	'Writing Level 1',	'W1',	CONV('0', 2, 10) + 0),
(51,	'Artistic Creativity',	'AC',	CONV('0', 2, 10) + 0),
(52,	'Global Awareness',	'GA',	CONV('0', 2, 10) + 0),
(53,	'Professional and Leadership Development',	'PL',	CONV('0', 2, 10) + 0),
(54,	'Service to the World',	'SW',	CONV('0', 2, 10) + 0),
(55,	'Special Projects',	'SP',	CONV('0', 2, 10) + 0),
(56,	'Natural Science Inquiry with Lab',	'NS-L',	CONV('1', 2, 10) + 0);

DROP TABLE IF EXISTS `Questions`;
CREATE TABLE `Questions` (
  `Question_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Domain_ID` int(11) NOT NULL,
  `Text` text NOT NULL,
  `Active` bit(1) NOT NULL,
  PRIMARY KEY (`Question_ID`),
  KEY `Domain_ID` (`Domain_ID`),
  CONSTRAINT `Questions_ibfk_2` FOREIGN KEY (`Domain_ID`) REFERENCES `Learning Domains` (`Domain_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

INSERT INTO `Questions` (`Question_ID`, `Domain_ID`, `Text`, `Active`) VALUES
(1,	39,	'Begin to understand human and social behavior through the use of appropriate disciplinary techniques.',	CONV('1', 2, 10) + 0),
(2,	39,	'Use their understanding of human behavior and relationships to discuss policy and/or other interventions.',	CONV('1', 2, 10) + 0),
(3,	39,	'Grasp how human experience is shaped by the social and institutional landscape',	CONV('1', 2, 10) + 0),
(4,	40,	'Understand some of the diverse ways in which human beings in different cultures and societies have responded to temporal change.',	CONV('1', 2, 10) + 0),
(5,	40,	'Examine contemporary issues from a historical perspective.',	CONV('1', 2, 10) + 0),
(6,	40,	'Use historical perspective to gain insight into their own convictions and actions.',	CONV('1', 2, 10) + 0),
(7,	44,	'Understand and respond to works of art in an informed manner',	CONV('1', 2, 10) + 0),
(8,	44,	'Recognize the manner in which artistic content communicates ideas and feelings',	CONV('1', 2, 10) + 0),
(9,	44,	'Comprehend the formal processes which go into the creation of selected works of art',	CONV('1', 2, 10) + 0),
(10,	45,	'Engage in the practice of written and oral expression.',	CONV('1', 2, 10) + 0),
(11,	45,	'Read a text critically to determine what meanings it holds, how and why those meanings are produced, and the effects of these choices.',	CONV('1', 2, 10) + 0),
(12,	45,	'Examine how literary works provide insight into the human experience.',	CONV('1', 2, 10) + 0),
(13,	46,	'Understand and apply the scientific and mathematical principles of their discipline.',	CONV('1', 2, 10) + 0),
(14,	46,	'Understand the distinction between science and dogma.',	CONV('1', 2, 10) + 0),
(15,	46,	'Use basic scientific principles to place information in a larger context.',	CONV('1', 2, 10) + 0),
(16,	46,	'Understand how science does and does not work.',	CONV('1', 2, 10) + 0),
(17,	47,	'Articulate an understanding of different value and belief systems that follow upon critical exploration of those systems',	CONV('1', 2, 10) + 0),
(18,	47,	'Express the commonalities discovered in value and belief systems across historical, philosophical, religious, and/or cultural boundaries.',	CONV('1', 2, 10) + 0),
(19,	47,	'Demonstrate familiarity with ways of making reasoned value judgments',	CONV('1', 2, 10) + 0),
(20,	56,	'Use the scientific method to gather, interpret and evaluate data.',	CONV('1', 2, 10) + 0),
(21,	56,	'Employ tools to assess the validity of observations related to the natural world.',	CONV('1', 2, 10) + 0),
(22,	56,	'Join scientific principles with critical analysis in a manner that is appropriate to the discipline.',	CONV('1', 2, 10) + 0),
(23,	56,	'Relate their analysis and conclusions to those of the larger scientific community.',	CONV('1', 2, 10) + 0);

DROP TABLE IF EXISTS `Responses`;
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


DROP TABLE IF EXISTS `Submissions`;
CREATE TABLE `Submissions` (
  `Submission_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Teacher_ID` int(11) NOT NULL,
  `Class_ID` int(11) NOT NULL,
  `Timestamp` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `IP` bigint(20) NOT NULL,
  `Grades` bit(1) NOT NULL,
  `Papers` bit(1) NOT NULL,
  `Presentations` bit(1) NOT NULL,
  `Exams` bit(1) NOT NULL,
  `Other` text NOT NULL,
  PRIMARY KEY (`Submission_ID`),
  KEY `Teacher_ID` (`Teacher_ID`),
  KEY `Class_ID` (`Class_ID`),
  CONSTRAINT `Submissions_ibfk_4` FOREIGN KEY (`Class_ID`) REFERENCES `Classes` (`Class_ID`) ON UPDATE CASCADE,
  CONSTRAINT `Submissions_ibfk_5` FOREIGN KEY (`Teacher_ID`) REFERENCES `Teachers` (`Teacher_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `Teachers`;
CREATE TABLE `Teachers` (
  `Teacher_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `AAD_KEY` text,
  PRIMARY KEY (`Teacher_ID`),
  KEY `Teacher_ID` (`Teacher_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;


-- 2019-12-06 02:14:26
