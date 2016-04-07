CREATE Database IF NOT EXISTS hospitaldb;
USE hospitaldb;

DROP TABLE IF EXISTS `hospital`;
CREATE TABLE `hospital` (
  `Address` varchar(255) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Address`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE `equipment` (
  `Name` varchar(255) NOT NULL,
  `Manufacturer` varchar(255) NOT NULL,
  `Type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `Number` int NOT NULL,
  PRIMARY KEY (`Number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `StaffID` int NOT NULL,
  `Access` varchar(255) DEFAULT NULL,
  `Salary` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`staffID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Patient`;
CREATE TABLE `Patient` (
  `SSN` int NOT NULL,
  `Notes` varchar(255) DEFAULT NULL,
  `Date_admitted` varchar(255) DEFAULT NULL,
  `Date_discharged` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SSN`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
