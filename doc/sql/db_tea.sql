# MySQL-Front 3.2  (Build 13.6)

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;

/*!40101 SET NAMES latin1 */;
/*!40103 SET TIME_ZONE='SYSTEM' */;

# Host: 10.77.30.35    Database: db_cjh
# ------------------------------------------------------
# Server version 5.5.37-0ubuntu0.12.04.1

/*!40101 SET NAMES gb2312 First change db_cjh to a new teacher dbname*/;

DROP DATABASE IF EXISTS `db_cjh`; 

CREATE DATABASE `db_cjh` /*!40100 DEFAULT CHARACTER SET gb2312 */;

use db_cjh;


#
# Table structure for table T_Class
#

DROP TABLE IF EXISTS `T_Class`;
CREATE TABLE `T_Class` (
  `classID` int(11) NOT NULL AUTO_INCREMENT,
  `className` varchar(50)  DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  `classStatus` tinyint(4) DEFAULT 1,
  `classDesc` varchar(100)  DEFAULT NULL,
  PRIMARY KEY (`classID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;



#
# Table structure for table T_Cource
#

DROP TABLE IF EXISTS `T_Cource`;
CREATE TABLE `T_Cource` (
  `coID` int(11) NOT NULL AUTO_INCREMENT,
  `coBH` varchar(50) NOT NULL,
  `coName` varchar(50) DEFAULT NULL,
  `techID` int(11) DEFAULT NULL,
  `coYear` varchar(20) DEFAULT NULL,
  `coTerm` varchar(20) DEFAULT NULL,
  `coCreateDate` datetime DEFAULT NULL,
  `coDept` varchar(40) DEFAULT NULL,
  `coNote` varchar(2000) DEFAULT NULL,
  `coPrecis` varchar(2000) DEFAULT NULL,
  `coCalendar` varchar(2000) DEFAULT NULL,
  `coStatus` tinyint(4) DEFAULT 1,
  `ccID` int(11) DEFAULT NULL,
  PRIMARY KEY (`coID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;


#
# Table structure for table `T_RelCourceClass`
#

DROP TABLE IF EXISTS `T_RelCourceClass`;
CREATE TABLE `T_RelCourceClass` (
  `relccID` int(11) NOT NULL AUTO_INCREMENT,
  `coID` int(11) DEFAULT NULL,
  `classID` int(11) DEFAULT NULL,
  PRIMARY KEY (`relccID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;


#
# Table structure for table T_RelClassStudent
#

DROP TABLE IF EXISTS `T_RelClassStudent`;
CREATE TABLE `T_RelClassStudent` (
  `relCSID` int(11) NOT NULL AUTO_INCREMENT,
  `classID` int(11) DEFAULT NULL,
  `stuID` int(11) DEFAULT NULL,
  PRIMARY KEY (`relCSID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;



#
# Table structure for table T_ExamDef
#

DROP TABLE IF EXISTS `T_ExamDef`;
CREATE TABLE `T_ExamDef` (
  `examDefID` int(11) NOT NULL AUTO_INCREMENT,
  `examDefName` varchar(20) DEFAULT NULL,
  `examDefNote` varchar(1000) DEFAULT NULL,
  `examDeflink` varchar(400) DEFAULT NULL,
  `examDefDate` datetime DEFAULT NULL,
  `StartDate` datetime DEFAULT NULL,
  `maxDayNum` int(11) DEFAULT NULL,
  `examOrder` smallint(6) DEFAULT NULL,
  `techID` int(11) DEFAULT NULL,
  `coID` int(11) DEFAULT NULL,
  `classID` int(11) DEFAULT NULL,
  `scoreRuleID` int(11) DEFAULT NULL,
  `scoreStandard` tinyint(4) DEFAULT NULL,
  `examType` tinyint(4) DEFAULT NULL,
  `examStatus` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`examDefID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;


#
# Table structure for table T_ExamInst
#

DROP TABLE IF EXISTS `T_ExamInst`;
CREATE TABLE `T_Examinst` (
  `examinsID` int(11) NOT NULL AUTO_INCREMENT,
  `examDefID` int(11) DEFAULT NULL,
  `examinsUrl` varchar(255) DEFAULT NULL,
  `examinsDate` datetime DEFAULT NULL,
  `examStatus` tinyint(4) DEFAULT NULL,
  `examSubNum` int(11) DEFAULT NULL,
  `examinsNote` varchar(3000) DEFAULT NULL,
  `examRemark` varchar(1200) DEFAULT NULL,
  `examScore` varchar(50) DEFAULT NULL,
  `stuID` int(11) DEFAULT NULL,
  `stuNumber` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`examInsID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;


#
# Table structure for table T_ExamSubDef
#

DROP TABLE IF EXISTS `T_ExamSubDef`;
CREATE TABLE `T_ExamSubDef` (
  `esDefID` int(11) NOT NULL AUTO_INCREMENT,
  `examDefID` int(11) DEFAULT NULL,
  `subID` int(11) DEFAULT NULL,
  `esDefStatus` tinyint(2) DEFAULT 1,
  `esDefDate` datetime DEFAULT NULL,
  `esDefOrder` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`esDefID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;


#
# Table structure for table T_ExamSubInst
#

DROP TABLE IF EXISTS `T_ExamSubInst`;
CREATE TABLE `T_ExamSubInst` (
  `exsubInsID` int(11) NOT NULL AUTO_INCREMENT,
  `examInsID` int(11) DEFAULT NULL,
  `esDefID` int(11) DEFAULT NULL,
  `esInsFileUrl` varchar(200) DEFAULT NULL,
  `esInsUploadDate` datetime DEFAULT NULL,
  `esInsStatus` tinyint(4) DEFAULT NULL,
  `esInsNote` varchar(300) DEFAULT NULL,
  `UserID` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`exsubInsID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;


#
# Table structure for table T_Lecture
#

DROP TABLE IF EXISTS `T_Lecture`;
CREATE TABLE `T_Lecture` (
  `lectID` int(11) NOT NULL AUTO_INCREMENT,
  `lectNum` varchar(30) DEFAULT NULL,
  `lectTitle` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `lectNote` varchar(200) DEFAULT NULL,
  `lectUrl` varchar(100) DEFAULT NULL,
  `lectDesc` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `lectCreateDate` datetime DEFAULT NULL,
  `lectStatus` tinyint(4) DEFAULT NULL,
  `coID` int(11) DEFAULT NULL,
  PRIMARY KEY (`lectID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;


#
# Table structure for table T_News
#

DROP TABLE IF EXISTS `T_News`;
CREATE TABLE `T_News` (
  `newsID` int(11) NOT NULL AUTO_INCREMENT,
  `newsTitle` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `newsNote` varchar(2000) DEFAULT NULL,
  `creator` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  `coID` int(11) DEFAULT NULL,
  `newsStatus` tinyint(4) DEFAULT NULL,
  `newsType` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`newsID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;


#
# Table structure for table T_Resource
#

DROP TABLE IF EXISTS `T_Resource`;
CREATE TABLE `T_Resource` (
  `resID` int(11) NOT NULL AUTO_INCREMENT,
  `resNum` varchar(20) DEFAULT NULL,
  `resTitle` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `resNote` varchar(100) DEFAULT NULL,
  `resUrl` varchar(100) DEFAULT NULL,
  `resCreateDate` datetime DEFAULT NULL,
  `resStatus` tinyint(4) DEFAULT NULL,
  `coID` int(11) DEFAULT NULL,
  PRIMARY KEY (`resID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;


#
# Table structure for table T_ScoreRule
#

DROP TABLE IF EXISTS `T_ScoreRule`;
CREATE TABLE `T_ScoreRule` (
  `ScoreRuleID` int(11) NOT NULL AUTO_INCREMENT,
  `sRulename` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `day1` int(11) DEFAULT NULL,
  `day1score` int(11) DEFAULT NULL,
  `day2` int(11) DEFAULT NULL,
  `day2score` int(11) DEFAULT NULL,
  `day3` int(11) DEFAULT NULL,
  `day3score` int(11) DEFAULT NULL,
  PRIMARY KEY (`ScoreRuleID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;


#
# Table structure for table T_Subject
#

DROP TABLE IF EXISTS `T_Subject`;
CREATE TABLE `T_Subject` (
  `subID` int(11) NOT NULL AUTO_INCREMENT,
  `coID` int(11) DEFAULT NULL,
  `subBH` varchar(20) DEFAULT NULL,
  `subTitle` varchar(100) DEFAULT NULL,
  `subCont` varchar(400) DEFAULT NULL,
  `subLx` tinyint(4) DEFAULT NULL,
  `subInput` varchar(100) DEFAULT NULL,
  `subOutput` varchar(50) DEFAULT NULL,
  `subStatus` tinyint(4) DEFAULT NULL,
  `subDesc` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`subID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;


#
# Table structure for table T_Url
#

DROP TABLE IF EXISTS `T_Url`;
CREATE TABLE `T_Url` (
  `urlID` int(11) NOT NULL AUTO_INCREMENT,
  `urlName` varchar(50) DEFAULT NULL,
  `urlPath` varchar(255) DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  `urlStatus` tinyint(4) DEFAULT NULL,
  `urlDesc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`urlID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;


#
# Table structure for table T_Student
#

DROP TABLE IF EXISTS `T_Student`;
CREATE TABLE `T_Student` (
  `stuID` int(11) NOT NULL AUTO_INCREMENT,
  `stuName` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `stuEnName` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `stuNumber` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `stuPasswd` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `telphone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `create_at` datetime DEFAULT '0000-00-00 00:00:00',
  `online` int(1) NOT NULL default 0,
  `loginIP` varchar(50) CHARACTER SET utf8 DEFAULT '0.0.0.0',
  `login_at` datetime DEFAULT '0000-00-00 00:00:00',
  `logout_at` datetime DEFAULT '0000-00-00 00:00:00',
  `stuStatus` int(1) NOT NULL default 0,
  `deptName` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `stuFace` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `stuQQNum` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `stuDesc` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`stuid`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;


#
# Table structure for table `T_Schoollink`
#

DROP TABLE IF EXISTS `T_Schoollink`;
CREATE TABLE `T_schoollink` (
  `schID` int(11) NOT NULL,
  `schName` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `schUrl` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`schID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;


#
# View structure for view v_ExamSubInst
#

DROP VIEW IF EXISTS `v_ExamSubInst`;
CREATE VIEW `v_ExamSubInst` AS select `a`.`esDefID` AS `esDefID`,`a`.`esInsFileUrl` AS `esInsFileUrl`,`a`.`esInsUploadDate` AS `esInsUploadDate`,
`b`.`examDefID` AS `examDefID`,`c`.`subID` AS `subID`,`c`.`coID` AS `coID`,`c`.`subBH` AS `subBH`,`c`.`subTitle` AS `subTitle`,`c`.`subCont` AS `subCont`,
`c`.`subLx` AS `subLx`,`c`.`subInput` AS `subInput`,`c`.`subOutput` AS `subOutput`,`c`.`subStatus` AS `subStatus`,`c`.`subDesc` AS `subDesc`,'ÒÑ½»' AS `esUploadStatus` 
from ((`T_ExamSubInst` `a` join `T_ExamSubDef` `b`) join `T_Subject` `c`) 
where ((`a`.`esDefID` = `b`.`esDefID`) and (`b`.`subID` = `c`.`subID`))
 union 
 select `a`.`esDefID` AS `esDefID`,'' AS `esInsFileUrl`,'' AS `esInsUploadDate`,`a`.`examDefID` AS `examDefID`,`b`.`subID` AS `subID`,
 `b`.`coID` AS `coID`,`b`.`subBH` AS `subBH`,`b`.`subTitle` AS `subTitle`,`b`.`subCont` AS `subCont`,`b`.`subLx` AS `subLx`,`b`.`subInput` AS `subInput`,
 `b`.`subOutput` AS `subOutput`,`b`.`subStatus` AS `subStatus`,`b`.`subDesc` AS `subDesc`,'Î´½»' AS `esUploadStatus` 
 from (`T_ExamSubDef` `a` join `T_Subject` `b`) where ((`a`.`subID` = `b`.`subID`) 
 and (not(`a`.`esDefID` in (select `a`.`esDefID` from ((`T_ExamSubInst` `a` join `T_ExamSubDef` `b`) 
 join `T_Subject` `c`) where ((`a`.`esDefID` = `b`.`esDefID`) and (`b`.`subID` = `c`.`subID`))))));
 
 


/*!40101 SET NAMES latin1 */;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
