-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: db_cjh
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.12.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP DATABASE IF EXISTS `db_lhq`;
create database `db_lhq`;
use `db_lhq`;

--
-- Table structure for table `T_Class`
--

DROP TABLE IF EXISTS `T_Class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `T_Class` (
  `classID` int(11) NOT NULL AUTO_INCREMENT,
  `className` varchar(50) DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  `classStatus` tinyint(4) DEFAULT '1',
  `classDesc` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`classID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Class`
--

LOCK TABLES `T_Class` WRITE;
/*!40000 ALTER TABLE `T_Class` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Cource`
--

DROP TABLE IF EXISTS `T_Cource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `coStatus` tinyint(4) DEFAULT NULL,
  `ccID` int(11) DEFAULT NULL,
  PRIMARY KEY (`coID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Cource`
--

LOCK TABLES `T_Cource` WRITE;
/*!40000 ALTER TABLE `T_Cource` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Cource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_ExamDef`
--

DROP TABLE IF EXISTS `T_ExamDef`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_ExamDef`
--

LOCK TABLES `T_ExamDef` WRITE;
/*!40000 ALTER TABLE `T_ExamDef` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_ExamDef` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_ExamSubDef`
--

DROP TABLE IF EXISTS `T_ExamSubDef`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `T_ExamSubDef` (
  `esDefID` int(11) NOT NULL AUTO_INCREMENT,
  `examDefID` int(11) DEFAULT NULL,
  `subID` int(11) DEFAULT NULL,
  `esDefStatus` tinyint(2) DEFAULT '1',
  `esDefDate` datetime DEFAULT NULL,
  `esDefOrder` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`esDefID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_ExamSubDef`
--

LOCK TABLES `T_ExamSubDef` WRITE;
/*!40000 ALTER TABLE `T_ExamSubDef` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_ExamSubDef` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_ExamSubInst`
--

DROP TABLE IF EXISTS `T_ExamSubInst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_ExamSubInst`
--

LOCK TABLES `T_ExamSubInst` WRITE;
/*!40000 ALTER TABLE `T_ExamSubInst` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_ExamSubInst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Examinst`
--

DROP TABLE IF EXISTS `T_Examinst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  PRIMARY KEY (`examinsID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Examinst`
--

LOCK TABLES `T_Examinst` WRITE;
/*!40000 ALTER TABLE `T_Examinst` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Examinst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Lecture`
--

DROP TABLE IF EXISTS `T_Lecture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Lecture`
--

LOCK TABLES `T_Lecture` WRITE;
/*!40000 ALTER TABLE `T_Lecture` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Lecture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_News`
--

DROP TABLE IF EXISTS `T_News`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_News`
--

LOCK TABLES `T_News` WRITE;
/*!40000 ALTER TABLE `T_News` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_News` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_RelClassStudent`
--

DROP TABLE IF EXISTS `T_RelClassStudent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `T_RelClassStudent` (
  `relCSID` int(11) NOT NULL AUTO_INCREMENT,
  `classID` int(11) DEFAULT NULL,
  `stuID` int(11) DEFAULT NULL,
  PRIMARY KEY (`relCSID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_RelClassStudent`
--

LOCK TABLES `T_RelClassStudent` WRITE;
/*!40000 ALTER TABLE `T_RelClassStudent` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_RelClassStudent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_RelCourceClass`
--

DROP TABLE IF EXISTS `T_RelCourceClass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `T_RelCourceClass` (
  `relccID` int(11) NOT NULL AUTO_INCREMENT,
  `coID` int(11) DEFAULT NULL,
  `classID` int(11) DEFAULT NULL,
  PRIMARY KEY (`relccID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_RelCourceClass`
--

LOCK TABLES `T_RelCourceClass` WRITE;
/*!40000 ALTER TABLE `T_RelCourceClass` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_RelCourceClass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Resource`
--

DROP TABLE IF EXISTS `T_Resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Resource`
--

LOCK TABLES `T_Resource` WRITE;
/*!40000 ALTER TABLE `T_Resource` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Resource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_ScoreRule`
--

DROP TABLE IF EXISTS `T_ScoreRule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_ScoreRule`
--

LOCK TABLES `T_ScoreRule` WRITE;
/*!40000 ALTER TABLE `T_ScoreRule` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_ScoreRule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Student`
--

DROP TABLE IF EXISTS `T_Student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `T_Student` (
  `stuID` int(11) NOT NULL AUTO_INCREMENT,
  `stuName` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `stuEnName` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `stuNumber` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `stuPasswd` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `telphone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `create_at` datetime DEFAULT '0000-00-00 00:00:00',
  `online` int(1) NOT NULL DEFAULT '0',
  `loginIP` varchar(50) CHARACTER SET utf8 DEFAULT '0.0.0.0',
  `login_at` datetime DEFAULT '0000-00-00 00:00:00',
  `logout_at` datetime DEFAULT '0000-00-00 00:00:00',
  `stuStatus` int(1) NOT NULL DEFAULT '0',
  `deptName` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `stuFace` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `stuQQNum` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `stuDesc` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`stuID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Student`
--

LOCK TABLES `T_Student` WRITE;
/*!40000 ALTER TABLE `T_Student` DISABLE KEYS */;
INSERT INTO `T_Student` VALUES (1,'王皓然','3120000448','3120000448','3120000448',NULL,'0000-00-00 00:00:00',0,'0.0.0.0','0000-00-00 00:00:00','0000-00-00 00:00:00',1,NULL,NULL,NULL,NULL),(2,'陈素','3120100621','3120100621','3120100621',NULL,'0000-00-00 00:00:00',0,'0.0.0.0','0000-00-00 00:00:00','0000-00-00 00:00:00',1,NULL,NULL,NULL,NULL),(3,'付纹琦','3120101135','3120101135','3120101135',NULL,'0000-00-00 00:00:00',0,'0.0.0.0','0000-00-00 00:00:00','0000-00-00 00:00:00',1,NULL,NULL,NULL,NULL),(4,'普通学生1','Common Student1','stu01','stu01',NULL,'0000-00-00 00:00:00',0,'0.0.0.0','0000-00-00 00:00:00','0000-00-00 00:00:00',1,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `T_Student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Subject`
--

DROP TABLE IF EXISTS `T_Subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Subject`
--

LOCK TABLES `T_Subject` WRITE;
/*!40000 ALTER TABLE `T_Subject` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Url`
--

DROP TABLE IF EXISTS `T_Url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `T_Url` (
  `urlID` int(11) NOT NULL AUTO_INCREMENT,
  `urlName` varchar(50) DEFAULT NULL,
  `urlPath` varchar(255) DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  `urlStatus` tinyint(4) DEFAULT NULL,
  `urlDesc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`urlID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Url`
--

LOCK TABLES `T_Url` WRITE;
/*!40000 ALTER TABLE `T_Url` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Url` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_schoollink`
--

DROP TABLE IF EXISTS `T_schoollink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `T_schoollink` (
  `schID` int(11) NOT NULL,
  `schName` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `schUrl` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`schID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_schoollink`
--

LOCK TABLES `T_schoollink` WRITE;
/*!40000 ALTER TABLE `T_schoollink` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_schoollink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `v_ExamSubInst`
--

DROP TABLE IF EXISTS `v_ExamSubInst`;
/*!50001 DROP VIEW IF EXISTS `v_ExamSubInst`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_ExamSubInst` (
  `esDefID` tinyint NOT NULL,
  `esInsFileUrl` tinyint NOT NULL,
  `esInsUploadDate` tinyint NOT NULL,
  `examDefID` tinyint NOT NULL,
  `subID` tinyint NOT NULL,
  `coID` tinyint NOT NULL,
  `subBH` tinyint NOT NULL,
  `subTitle` tinyint NOT NULL,
  `subCont` tinyint NOT NULL,
  `subLx` tinyint NOT NULL,
  `subInput` tinyint NOT NULL,
  `subOutput` tinyint NOT NULL,
  `subStatus` tinyint NOT NULL,
  `subDesc` tinyint NOT NULL,
  `esUploadStatus` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_ExamSubInst`
--

/*!50001 DROP TABLE IF EXISTS `v_ExamSubInst`*/;
/*!50001 DROP VIEW IF EXISTS `v_ExamSubInst`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_ExamSubInst` AS select `a`.`esDefID` AS `esDefID`,`a`.`esInsFileUrl` AS `esInsFileUrl`,`a`.`esInsUploadDate` AS `esInsUploadDate`,`b`.`examDefID` AS `examDefID`,`c`.`subID` AS `subID`,`c`.`coID` AS `coID`,`c`.`subBH` AS `subBH`,`c`.`subTitle` AS `subTitle`,`c`.`subCont` AS `subCont`,`c`.`subLx` AS `subLx`,`c`.`subInput` AS `subInput`,`c`.`subOutput` AS `subOutput`,`c`.`subStatus` AS `subStatus`,`c`.`subDesc` AS `subDesc`,'??' AS `esUploadStatus` from ((`T_ExamSubInst` `a` join `T_ExamSubDef` `b`) join `T_Subject` `c`) where ((`a`.`esDefID` = `b`.`esDefID`) and (`b`.`subID` = `c`.`subID`)) union select `a`.`esDefID` AS `esDefID`,'' AS `esInsFileUrl`,'' AS `esInsUploadDate`,`a`.`examDefID` AS `examDefID`,`b`.`subID` AS `subID`,`b`.`coID` AS `coID`,`b`.`subBH` AS `subBH`,`b`.`subTitle` AS `subTitle`,`b`.`subCont` AS `subCont`,`b`.`subLx` AS `subLx`,`b`.`subInput` AS `subInput`,`b`.`subOutput` AS `subOutput`,`b`.`subStatus` AS `subStatus`,`b`.`subDesc` AS `subDesc`,'??' AS `esUploadStatus` from (`T_ExamSubDef` `a` join `T_Subject` `b`) where ((`a`.`subID` = `b`.`subID`) and (not(`a`.`esDefID` in (select `a`.`esDefID` from ((`T_ExamSubInst` `a` join `T_ExamSubDef` `b`) join `T_Subject` `c`) where ((`a`.`esDefID` = `b`.`esDefID`) and (`b`.`subID` = `c`.`subID`)))))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-10  0:00:01
