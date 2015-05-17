# MySQL-Front 3.2  (Build 13.6)

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;

/*!40101 SET NAMES latin1 */;
/*!40103 SET TIME_ZONE='SYSTEM' */;

# Host: 10.77.30.35    Database: db_common
# ------------------------------------------------------
# Server version 5.5.37-0ubuntu0.12.04.1

/*!40101 SET NAMES gb2312 */;

DROP DATABASE IF EXISTS `db_common`;

create database db_common;
use db_common;

#
# Table structure for table T_CommonCource
#

DROP TABLE IF EXISTS `T_CommonCource`;
CREATE TABLE `T_CommonCource` (
  `ccID` int(11) NOT NULL AUTO_INCREMENT,
  `ccBH` varchar(20) DEFAULT NULL,
  `ccName` varchar(50) DEFAULT NULL,
  `ccYear` varchar(20) DEFAULT NULL,
  `ccTerm` varchar(20) DEFAULT NULL,
  `ccDept` varchar(50) DEFAULT NULL,
  `ccObject` varchar(100) DEFAULT NULL,
  `ccNote` varchar(2000) DEFAULT NULL,
  `ccCalender` varchar(2000) DEFAULT NULL,
  `ccPrecis` varchar(2000) DEFAULT NULL,
  `ccStatus` tinyint(4) DEFAULT NULL,
  `ccCreateDate` datetime DEFAULT NULL,
  `ccDesc` text,
  PRIMARY KEY (`ccID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;


#
# Table structure for table T_CommonNews
#

DROP TABLE IF EXISTS `T_CommonNews`;
CREATE TABLE `T_CommonNews` (
  `cnID` int(11) NOT NULL AUTO_INCREMENT,
  `cnTitle` varchar(60) DEFAULT NULL,
  `cnNote` text,
  `cnCreateDate` datetime DEFAULT NULL,
  `cnEndDate` datetime DEFAULT NULL,
  `cnStatus` tinyint(4) DEFAULT '0',
  `cnType` tinyint(4) DEFAULT NULL,
  `cnDesc` text,
  `ccID` int(11) DEFAULT NULL,
  PRIMARY KEY (`cnID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;


#
# Table structure for table T_SystemOption
#

DROP TABLE IF EXISTS `T_SystemOption`;
CREATE TABLE `T_SystemOption` (
  `SysOptID` int(11) NOT NULL AUTO_INCREMENT,
  `SysOptName` varchar(40) DEFAULT NULL,
  `SysOptAlias` varchar(20) DEFAULT NULL,
  `SysOptDesc` varchar(200) DEFAULT NULL,
  `SysOptValue` varchar(20) DEFAULT NULL,
  `SysOptMemo` varchar(200) DEFAULT NULL,
  `SysOptType` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`SysOptID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;


#
# Table structure for table T_Teacher
#

DROP TABLE IF EXISTS `T_Teacher`;
CREATE TABLE `T_Teacher` (
  `teaID` int(11) NOT NULL AUTO_INCREMENT,
  `teaName` varchar(20) DEFAULT NULL,
  `teaEnName` varchar(20) DEFAULT NULL,
  `teaWorkNum` varchar(20) DEFAULT NULL,
  `teaPasswd` varchar(16) DEFAULT NULL,
  `teaDirName` varchar(10) DEFAULT NULL,
  `teaDbName` varchar(30) DEFAULT NULL,
  `teaDbServer` varchar(40) DEFAULT NULL,
  `teaDbUser` varchar(20) DEFAULT NULL,
  `teaDbPassword` varchar(20) DEFAULT NULL,
  `teaStatus` tinyint(4) DEFAULT NULL,  
  `IsAdmin` tinyint(2) DEFAULT NULL,  
  `logOnLine` tinyint(4) DEFAULT NULL,
  `logTime` datetime DEFAULT NULL,
  `logIP` varchar(40) DEFAULT NULL,
  `teaTel` varchar(60) DEFAULT NULL,
  `teaEmail` varchar(40) DEFAULT NULL,
  `teaHomePage` varchar(60) DEFAULT NULL,
  `teaDesc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`teaID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;



DROP TABLE IF EXISTS T_Links;
CREATE TABLE T_Links (
  `linkID` int(11) NOT NULL AUTO_INCREMENT,
  `linkTitle` varchar(40) DEFAULT NULL,
  `linkUrl` varchar(400) DEFAULT NULL,
  `linkstatus` int(3) DEFAULT '0',
  `linkDesc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`linkID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;




################################################################################


#
# Table structure for table T_SubCat
#

DROP TABLE IF EXISTS T_SubCat;
CREATE TABLE T_SubCat (
  `SubCatID` int(11) NOT NULL AUTO_INCREMENT,
  `SubCatAlias` varchar(40) DEFAULT NULL,
  `SubCatName` varchar(400) DEFAULT NULL,
  `Status` int(3) DEFAULT '0',
  `CourceID` int(4) DEFAULT '0',
  `SubCatGrade` int(4) DEFAULT '0',
  `Creator` int(4) DEFAULT '0',
  `SubCatDesc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`SubCatID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;


#
# Table structure for table T_SubType
#

DROP TABLE IF EXISTS T_SubType;
CREATE TABLE T_SubType (
  `SubTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `SubTypeName` varchar(40) DEFAULT NULL,
    `Status` int(3) DEFAULT '0',
  `SubTypeDesc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`SubTypeID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;




#
# Table structure for table T_SubLib
#
DROP TABLE IF EXISTS T_SubLib;

CREATE TABLE T_SubLib(
	SID int(11) NOT NULL AUTO_INCREMENT,
	subID varchar(20) NOT NULL,
	subTitle varchar(40) NULL,
	SubCont varchar(2000) NULL,
	SubTypeID int(3) DEFAULT '0',
	Answer varchar(2000) NULL,
	AnswerCount int(2) DEFAULT '0',
	AnswerRule varchar(100) NULL,
	SubCatID int(3) DEFAULT '0',
	SubDiffculty int(3) DEFAULT '0',
	Status int(3) DEFAULT '0',
	SubFlag int(3) DEFAULT '0',
	Creator int(3) DEFAULT '0',
	CourceID int(3) DEFAULT '0',
	ImagePath varchar(200) NULL,
	SubSimilar varchar(200) NULL,
	subContBak varchar(2000) NULL,
	subDefDes varchar(200) NULL,
	PRIMARY KEY(SID)
);





###################################################################
#
# View structure for view V_UserCourceInfo_01
#

DROP VIEW IF EXISTS `V_UserCourceInfo_01`;

CREATE VIEW `V_UserCourceInfo_01` AS 

/*This is for teacher cjh*/

select `a`.`stuNumber`,`a`.`stuName`,`a`.`stuPasswd`,
`b`.`techID` AS `techID`,`t`.`teaEnName`,`t`.`teaName`,
`c`.`classID`,`c`.`className`,`b`.`coID`,`b`.`coName`,
`b`.`coYear`,`b`.`coTerm` 
from (((((
    `db_cjh`.`T_Student` `a`  
    join `db_cjh`.`T_Cource` `b`) 
    join `db_cjh`.`T_Class` `c`) 
    join  `db_cjh`.`T_RelClassStudent` `cs`) 
    join  `db_cjh`.`T_RelCourceClass` `cc`) 
    join `T_Teacher` `t`)
where ((`cc`.`coID` = `b`.`coID`) 
	and (`cc`.`classID` = `c`.`classID`) 
	and (`cs`.`classID` = `c`.`classID`) 
	and (`cs`.`stuID` = `a`.`stuID`) 
	and (`b`.`techID` = `t`.`teaID`))

 /*For every teacher, add a union*/
union
#
#This if for teacher lhq
#
select `a`.`stuNumber`,`a`.`stuName`,`a`.`stuPasswd`,
`b`.`techID` AS `techID`,`t`.`teaEnName`,`t`.`teaName`,
`c`.`classID`,`c`.`className`,`b`.`coID`,`b`.`coName`,
`b`.`coYear`,`b`.`coTerm` 
from (((((
    `db_luhq`.`T_Student` `a`  
    join `db_luhq`.`T_Cource` `b`) 
    join `db_luhq`.`T_Class` `c`) 
    join  `db_luhq`.`T_RelClassStudent` `cs`) 
    join  `db_luhq`.`T_RelCourceClass` `cc`) 
    join `T_Teacher` `t`)
where ((`cc`.`coID` = `b`.`coID`) 
	and (`cc`.`classID` = `c`.`classID`) 
	and (`cs`.`classID` = `c`.`classID`) 
	and (`cs`.`stuID` = `a`.`stuID`) 
	and (`b`.`techID` = `t`.`teaID`));


 /*For every teacher, add a union*/


###############


#
# View structure for view V_UserCourceInfo
# This view is used to check the validality when user login the system
#

DROP VIEW IF EXISTS `V_UserCourceInfo`;

CREATE  VIEW `V_UserCourceInfo` AS 
select * from `V_UserCourceInfo_01`;




/*!40101 SET NAMES latin1 */;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
