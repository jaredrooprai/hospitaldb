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
  `Hospital_Address` varchar(255) NOT NULL,
  Foreign KEY (`Hospital_Address`) references hospital(`Address`),
  PRIMARY KEY (`Name`,`Manufacturer`,`Hospital_Address`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `Number` int NOT NULL,
  `Hospital_Address` varchar(255) NOT NULL,
  Foreign KEY (`Hospital_Address`) references hospital(`Address`),
  PRIMARY KEY (`Number`,`Hospital_Address`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `StaffID` int NOT NULL,
  `Access` varchar(255) DEFAULT NULL,
  `Salary` varchar(255) DEFAULT NULL,
  `Hospital_Address` varchar(255) NOT NULL,
  Foreign KEY (`Hospital_Address`) references hospital(`Address`),
  PRIMARY KEY (`staffID`,`Hospital_Address`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Patient`;
CREATE TABLE `Patient` (
  `SSN` int NOT NULL,
  `Notes` varchar(255) DEFAULT NULL,
  `Date_admitted` varchar(255) DEFAULT NULL,
  `Date_discharged` varchar(255) DEFAULT NULL,
  `Hospital_Address` varchar(255) NOT NULL,
  Foreign KEY (`Hospital_Address`) references hospital(`Address`),
  PRIMARY KEY (`SSN`,`Hospital_Address`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Emergency_Contact`;
CREATE TABLE `Emergency_Contact` (
  `Name`  varchar(255) NOT NULL,
  `Phone_number` int Default Null,
  `Relationship` varchar(255) Default Null,
  `Patient_SSN` int NOT NULL,
  Foreign KEY (`Patient_SSN`) references Patient(`SSN`),
  PRIMARY KEY (`Name`, `Patient_SSN`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Related_to`;
CREATE TABLE `Related_to` (
  `Patient_SSN`  int NOT NULL,
  `Contact_Name` varchar(255) NOT NULL,
  Foreign KEY (`Patient_SSN`) references Patient(`SSN`),
  Foreign KEY (`Contact_Name`) references Emergency_Contact(`Name`),
  PRIMARY KEY (`Patient_SSN`,`Contact_Name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Personal_Details`;
CREATE TABLE `Personal_Details` (
  `Patient_SSN`  int NOT NULL,
  `Age` int Default NULL,
  `Name` varchar(255) Default NULL,
  `Sex` varchar(16) Default NULL,
  `Birthdate` varchar(255) Default NULL,
  `Address` varchar(255) Default NULL,
  Foreign KEY (`Patient_SSN`) references Patient(`SSN`)
  PRIMARY KEY (`Patient_SSN`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Appointment`;
CREATE TABLE `Appointment` (
  `Room_Number`  int NOT NULL,
  `Staff_StaffID`  int NOT NULL,
  `Patient_SSN`  int NOT NULL,
  `Time`  varchar(255) Default NULL,
  Foreign KEY (`Room_number`) references room(`number`),
  Foreign KEY (`Staff_StaffID`) references staff(`StaffID`),
  Foreign KEY (`Patient_SSN`) references Patient(`SSN`),
  PRIMARY KEY (`Room_Number`,` Staff_StaffID`, `Patient_SSN`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Machine`;
CREATE TABLE `Machine` (
  `Equipment_Name`  varchar(255) NOT NULL,
  `Equipment_Manufacturer`  varchar(255) NOT NULL,
  `Equipment_Type`  varchar(255) NOT NULL,
  `Room_Number`  int NOT NULL,
  Foreign KEY (`Equipment_Name`) references equipment(`name`),
  Foreign KEY (`Equipment_Manufacturer`) references equipment(`manufacturer`),
  Foreign KEY (`Equipment_Type`) references equipment(`Type`),
  Foreign KEY (`Room_Number`) references room(`number`),
  PRIMARY KEY (`Equipment_Name`, `Equipment_Manufacturer`, `Equipment_Type`, `Room_Number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Supplies`;
CREATE TABLE `Supplies` (
  `Amount`  int Default NULL,
  `Equipment_Name`  varchar(255) NOT NULL,
  `Equipment_Manufacturer`  varchar(255) NOT NULL,
  `Equipment_Type`  varchar(255) NOT NULL,
  Foreign KEY (`Equipment_Name`) references equipment(`name`),
  Foreign KEY (`Equipment_Manufacturer`) references equipment(`manufacturer`),
  Foreign KEY (`Equipment_Type`) references equipment(`Type`),
  PRIMARY KEY (`Equipment_Name`, `Equipment_Manufacturer`, `Equipment_Type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Other_Staff`;
CREATE TABLE `Other_Staff` (
  `Title`  varchar(255) Default NULL,
  `Staff_StaffID` int NOT NULL,
  `Staff_Access` varchar(255) Default NULL,
  `Staff_Salary` int Default NULL,
  Foreign KEY (`Staff_StaffID`) references staff(`StaffID`),
  Foreign KEY (`Staff_Access`) references staff(`Access`),
  Foreign KEY (`Staff_Salary`) references staff(`Salary`),
  PRIMARY KEY (`Staff_StaffID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Medical_Staff`;
CREATE TABLE `Medical_Staff` (
  `Specialization`  varchar(255) Default NULL,
  `Staff_StaffID` int NOT NULL,
  `Staff_Access` varchar(255) Default NULL,
  `Staff_Salary` int Default NULL,
  Foreign KEY (`Staff_StaffID`) references staff(`StaffID`),
  Foreign KEY (`Staff_Access`) references staff(`Access`),
  Foreign KEY (`Staff_Salary`) references staff(`Salary`),
  PRIMARY KEY (`Staff_StaffID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;