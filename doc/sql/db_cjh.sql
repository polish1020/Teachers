-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: localhost    Database: db_cjh
-- ------------------------------------------------------
-- Server version	5.6.24-log

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

--
-- Table structure for table `t_class`
--

DROP TABLE IF EXISTS `t_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_class` (
  `classID` int(11) NOT NULL AUTO_INCREMENT,
  `className` varchar(50) DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  `classStatus` tinyint(4) DEFAULT '1',
  `classDesc` varchar(100) DEFAULT NULL,
  `coID` int(11) DEFAULT NULL,
  PRIMARY KEY (`classID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_class`
--

LOCK TABLES `t_class` WRITE;
/*!40000 ALTER TABLE `t_class` DISABLE KEYS */;
INSERT INTO `t_class` VALUES (1,'1','2015-05-08 21:05:07',1,'1',7),(2,'2','2015-05-09 14:05:23',1,'2',7);
/*!40000 ALTER TABLE `t_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_course`
--

DROP TABLE IF EXISTS `t_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_course` (
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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_course`
--

LOCK TABLES `t_course` WRITE;
/*!40000 ALTER TABLE `t_course` DISABLE KEYS */;
INSERT INTO `t_course` VALUES (5,'CC01','计算机科学基础',2,'2014-2015','秋冬','2015-05-08 21:05:44','计算机学院','计算机科学基础','计算机科学基础','',1,2),(6,'CC04','PYTHON语言程序设计基础及实验',2,'2014-2015','秋冬','2015-05-08 21:05:56','计算机学院','PYTHON语言程序设计基础及实验','PYTHON语言程序设计基础及实验','',1,5),(7,'CC89','自定义课程',2,'2014-2015','秋冬','2015-05-08 21:05:17','计算机学院','ppt','ppt','',1,0),(10,'qwe','自定义课程\"asf\"adasd as\'a\'a',2,'2014-2015','秋冬','2015-05-09 01:05:15','计算机学院','a','a','a',1,0),(9,'324','自定义课程\"dsf\"sdf',2,'2014-2015','秋冬','2015-05-09 01:05:26','计算机学院','234','23','243',1,0),(15,'sd','自定义课程\"dads\"ads\'dsads\'ad',2,'2014-2015','秋冬','2015-05-09 01:05:57','计算机学院','asd','ad','ads',1,0),(16,'da','自定义课程asd\"das\"daas\'ad\'as',2,'2014-2015','秋冬','2015-05-09 01:05:03','计算机学院','d','s','asd',1,0),(17,'sd','自定义课程<img src=\"img.png\">',2,'2014-2015','秋冬','2015-05-09 01:05:15','计算机学院','asd','sada','asd',1,0),(18,'asd','自定义课程<img src=\'img.png\' class=\"sd\">',2,'2014-2015','秋冬','2015-05-09 01:05:56','计算机学院','ad','ad','asd',1,0);
/*!40000 ALTER TABLE `t_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_examdef`
--

DROP TABLE IF EXISTS `t_examdef`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_examdef` (
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
  `endDate` datetime DEFAULT NULL,
  `examFileName` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`examDefID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_examdef`
--

LOCK TABLES `t_examdef` WRITE;
/*!40000 ALTER TABLE `t_examdef` DISABLE KEYS */;
INSERT INTO `t_examdef` VALUES (6,'实验一','要求完成实验','../../teacherdata/cjh/lesson/2014-2015/7/exam/web.java','2015-05-09 22:05:21','2015-05-09 22:05:21',0,0,2,7,0,0,0,0,1,'2015-05-16 11:55:00','web.java');
/*!40000 ALTER TABLE `t_examdef` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_examinst`
--

DROP TABLE IF EXISTS `t_examinst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_examinst` (
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
-- Dumping data for table `t_examinst`
--

LOCK TABLES `t_examinst` WRITE;
/*!40000 ALTER TABLE `t_examinst` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_examinst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_examsubdef`
--

DROP TABLE IF EXISTS `t_examsubdef`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_examsubdef` (
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
-- Dumping data for table `t_examsubdef`
--

LOCK TABLES `t_examsubdef` WRITE;
/*!40000 ALTER TABLE `t_examsubdef` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_examsubdef` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_examsubinst`
--

DROP TABLE IF EXISTS `t_examsubinst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_examsubinst` (
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
-- Dumping data for table `t_examsubinst`
--

LOCK TABLES `t_examsubinst` WRITE;
/*!40000 ALTER TABLE `t_examsubinst` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_examsubinst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_lecture`
--

DROP TABLE IF EXISTS `t_lecture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_lecture` (
  `lectID` int(11) NOT NULL AUTO_INCREMENT,
  `lectNum` varchar(30) DEFAULT NULL,
  `lectTitle` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `lectNote` varchar(200) DEFAULT NULL,
  `lectUrl` varchar(100) DEFAULT NULL,
  `lectDesc` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `lectCreateDate` datetime DEFAULT NULL,
  `lectStatus` tinyint(4) DEFAULT NULL,
  `coID` int(11) DEFAULT NULL,
  `lectFile` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`lectID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_lecture`
--

LOCK TABLES `t_lecture` WRITE;
/*!40000 ALTER TABLE `t_lecture` DISABLE KEYS */;
INSERT INTO `t_lecture` VALUES (1,'1','1','1','../../teacherdata/cjh/lesson/2014-2015/7/cource/Assignment 3.pdf','Assignment 3.pdf:1','2015-05-08 21:05:26',1,7,NULL),(2,'2','2','2','../../teacherdata/cjh/lesson/2014-2015/7/cource/stu','stu:2','2015-05-08 22:05:50',1,7,NULL),(3,'3','3','3','../../teacherdata/cjh/lesson/2014-2015/7/cource/5.ppt','5.ppt:3','2015-05-08 22:05:35',1,7,NULL),(9,'f','f','f','../../teacherdata/cjh/lesson/2014-2015/7/cource/er.jpg','er.jpg:f','2015-05-09 20:05:46',1,7,NULL),(5,'d','d','d','../../teacherdata/cjh/lesson/2014-2015/7/cource/stu.txt','stu.txt:d','2015-05-09 20:05:47',1,7,NULL),(10,'d','d','d','../../teacherdata/cjh/lesson/2014-2015/7/cource/串讲遗留问题.docx','串讲遗留问题.docx:d','2015-05-09 20:05:13',1,7,NULL),(12,'f','f','f','../../teacherdata/cjh/lesson/2014-2015/7/cource/图片1.jpg','图片1.jpg:f','2015-05-09 20:05:41',1,7,'图片1.jpg');
/*!40000 ALTER TABLE `t_lecture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_news`
--

DROP TABLE IF EXISTS `t_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_news` (
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
-- Dumping data for table `t_news`
--

LOCK TABLES `t_news` WRITE;
/*!40000 ALTER TABLE `t_news` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_paperlib`
--

DROP TABLE IF EXISTS `t_paperlib`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_paperlib` (
  `PaperLibID` int(11) NOT NULL,
  `PaperLibTitle` varchar(100) NOT NULL,
  `PaperLibDesc` varchar(200) DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `coID` int(11) NOT NULL,
  `PaperType` tinyint(4) NOT NULL,
  `ComPaperLibID` int(11) NOT NULL,
  PRIMARY KEY (`PaperLibID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_paperlib`
--

LOCK TABLES `t_paperlib` WRITE;
/*!40000 ALTER TABLE `t_paperlib` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_paperlib` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_relclassstudent`
--

DROP TABLE IF EXISTS `t_relclassstudent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_relclassstudent` (
  `relCSID` int(11) NOT NULL AUTO_INCREMENT,
  `classID` int(11) DEFAULT NULL,
  `stuID` int(11) DEFAULT NULL,
  PRIMARY KEY (`relCSID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_relclassstudent`
--

LOCK TABLES `t_relclassstudent` WRITE;
/*!40000 ALTER TABLE `t_relclassstudent` DISABLE KEYS */;
INSERT INTO `t_relclassstudent` VALUES (1,1,5),(2,1,6),(3,1,7);
/*!40000 ALTER TABLE `t_relclassstudent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_relcourceclass`
--

DROP TABLE IF EXISTS `t_relcourceclass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_relcourceclass` (
  `relccID` int(11) NOT NULL AUTO_INCREMENT,
  `coID` int(11) DEFAULT NULL,
  `classID` int(11) DEFAULT NULL,
  PRIMARY KEY (`relccID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_relcourceclass`
--

LOCK TABLES `t_relcourceclass` WRITE;
/*!40000 ALTER TABLE `t_relcourceclass` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_relcourceclass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_relexampaper`
--

DROP TABLE IF EXISTS `t_relexampaper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_relexampaper` (
  `RelEPID` int(11) NOT NULL,
  `ExamDefID` int(11) NOT NULL,
  `PaperLibID` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `coID` int(11) NOT NULL,
  `PaperType` tinyint(4) NOT NULL,
  PRIMARY KEY (`RelEPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_relexampaper`
--

LOCK TABLES `t_relexampaper` WRITE;
/*!40000 ALTER TABLE `t_relexampaper` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_relexampaper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_relpapersub`
--

DROP TABLE IF EXISTS `t_relpapersub`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_relpapersub` (
  `RelPSID` int(11) NOT NULL,
  `PaperLibID` int(11) NOT NULL,
  `SubID` int(11) NOT NULL,
  `ThisOrder` int(11) DEFAULT NULL,
  `Status` tinyint(4) NOT NULL,
  `coID` int(11) NOT NULL,
  `isCommonPaper` tinyint(4) NOT NULL,
  PRIMARY KEY (`RelPSID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_relpapersub`
--

LOCK TABLES `t_relpapersub` WRITE;
/*!40000 ALTER TABLE `t_relpapersub` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_relpapersub` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_resource`
--

DROP TABLE IF EXISTS `t_resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_resource` (
  `resID` int(11) NOT NULL AUTO_INCREMENT,
  `resNum` varchar(20) DEFAULT NULL,
  `resTitle` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `resNote` varchar(100) DEFAULT NULL,
  `resUrl` varchar(100) DEFAULT NULL,
  `resCreateDate` datetime DEFAULT NULL,
  `resStatus` tinyint(4) DEFAULT NULL,
  `coID` int(11) DEFAULT NULL,
  `Public` tinyint(4) DEFAULT NULL,
  `resFile` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`resID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_resource`
--

LOCK TABLES `t_resource` WRITE;
/*!40000 ALTER TABLE `t_resource` DISABLE KEYS */;
INSERT INTO `t_resource` VALUES (2,NULL,'sd','asd','../../teacherdata/cjh/lesson/2014-2015/7/resource/2.html','2015-05-10 14:05:53',1,7,1,'2.html'),(3,NULL,'萨达','撒是','../../teacherdata/cjh/lesson/2014-2015/7/resource/图片1.jpg','2015-05-10 15:05:40',1,7,1,'图片1.jpg');
/*!40000 ALTER TABLE `t_resource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_schoollink`
--

DROP TABLE IF EXISTS `t_schoollink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_schoollink` (
  `schID` int(11) NOT NULL,
  `schName` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `schUrl` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`schID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_schoollink`
--

LOCK TABLES `t_schoollink` WRITE;
/*!40000 ALTER TABLE `t_schoollink` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_schoollink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_scorerule`
--

DROP TABLE IF EXISTS `t_scorerule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_scorerule` (
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
-- Dumping data for table `t_scorerule`
--

LOCK TABLES `t_scorerule` WRITE;
/*!40000 ALTER TABLE `t_scorerule` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_scorerule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_student`
--

DROP TABLE IF EXISTS `t_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_student` (
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_student`
--

LOCK TABLES `t_student` WRITE;
/*!40000 ALTER TABLE `t_student` DISABLE KEYS */;
INSERT INTO `t_student` VALUES (1,'王皓然','3120000448','3120000448','3120000448',NULL,'0000-00-00 00:00:00',0,'0.0.0.0','0000-00-00 00:00:00','0000-00-00 00:00:00',1,NULL,NULL,NULL,NULL),(2,'陈素','3120100621','3120100621','3120100621',NULL,'0000-00-00 00:00:00',0,'0.0.0.0','0000-00-00 00:00:00','0000-00-00 00:00:00',1,NULL,NULL,NULL,NULL),(3,'付纹琦','3120101135','3120101135','3120101135',NULL,'0000-00-00 00:00:00',0,'0.0.0.0','0000-00-00 00:00:00','0000-00-00 00:00:00',1,NULL,NULL,NULL,NULL),(4,'普通学生1','Common Student1','stu01','stu01',NULL,'0000-00-00 00:00:00',0,'0.0.0.0','0000-00-00 00:00:00','0000-00-00 00:00:00',1,NULL,NULL,NULL,NULL),(5,'wangbo','','3120102139','123456','','2015-05-08 22:05:48',0,'0.0.0.0','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'计算机学院','','',''),(6,'王博','','3120102138','123456','','2015-05-08 22:05:00',0,'0.0.0.0','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'计算机学院','','',''),(7,'什么鬼\r\n','','3120104238','3120104238','','2015-05-09 00:05:10',0,'0.0.0.0','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'','','','');
/*!40000 ALTER TABLE `t_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_subject`
--

DROP TABLE IF EXISTS `t_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_subject` (
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
-- Dumping data for table `t_subject`
--

LOCK TABLES `t_subject` WRITE;
/*!40000 ALTER TABLE `t_subject` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_sublib`
--

DROP TABLE IF EXISTS `t_sublib`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_sublib` (
  `SID` int(11) NOT NULL AUTO_INCREMENT,
  `SubID` int(11) NOT NULL,
  `SubTitle` varchar(40) NOT NULL,
  `SubCont` varchar(400) DEFAULT NULL,
  `SubCatID` int(11) DEFAULT NULL,
  `SubType` int(11) NOT NULL,
  `SubDifficulty` int(11) NOT NULL,
  `Answer` varchar(600) NOT NULL,
  `AnswerRule` varchar(60) DEFAULT NULL,
  `AnswerCount` smallint(6) DEFAULT NULL,
  `Status` tinyint(4) NOT NULL,
  `SubFlag` tinyint(4) DEFAULT NULL,
  `ImgUrl` varchar(200) DEFAULT NULL,
  `Creator` int(11) NOT NULL,
  `SubSimilar` varchar(200) DEFAULT NULL,
  `coID` int(11) NOT NULL,
  `SubDesc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_sublib`
--

LOCK TABLES `t_sublib` WRITE;
/*!40000 ALTER TABLE `t_sublib` DISABLE KEYS */;
INSERT INTO `t_sublib` VALUES (1,0,'1','1',0,1,1,'1',NULL,NULL,1,0,NULL,2,NULL,7,'1'),(2,0,'2','2',0,1,1,'2',NULL,NULL,1,0,NULL,2,NULL,7,'1'),(3,0,'asd','sda',0,1,1,'asd',NULL,NULL,1,0,NULL,2,NULL,7,''),(4,0,'题目','内容',0,1,1,'答案',NULL,NULL,1,0,NULL,2,NULL,7,''),(5,0,'真实的','实打实的',0,1,1,'是的',NULL,NULL,1,0,NULL,2,NULL,7,''),(6,0,'是的撒','按时',0,1,1,'按时',NULL,NULL,1,0,NULL,2,NULL,7,''),(7,0,'sd','萨达',0,1,1,'萨达',NULL,NULL,1,0,NULL,2,NULL,7,''),(8,0,'地方',' 地方',0,1,1,'的分',NULL,NULL,1,0,NULL,2,NULL,7,''),(9,0,'萨达','是啊',0,1,1,' 啊',NULL,NULL,1,0,NULL,2,NULL,7,''),(10,0,'国防观 ','  分',0,1,1,' f',NULL,NULL,1,0,NULL,2,NULL,7,''),(11,0,'地方',' 地方',0,1,1,'辅导费',NULL,NULL,1,0,NULL,2,NULL,7,'');
/*!40000 ALTER TABLE `t_sublib` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_url`
--

DROP TABLE IF EXISTS `t_url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_url` (
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
-- Dumping data for table `t_url`
--

LOCK TABLES `t_url` WRITE;
/*!40000 ALTER TABLE `t_url` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_url` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `v_examsubinst`
--

DROP TABLE IF EXISTS `v_examsubinst`;
/*!50001 DROP VIEW IF EXISTS `v_examsubinst`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_examsubinst` AS SELECT 
 1 AS `esDefID`,
 1 AS `esInsFileUrl`,
 1 AS `esInsUploadDate`,
 1 AS `examDefID`,
 1 AS `subID`,
 1 AS `coID`,
 1 AS `subBH`,
 1 AS `subTitle`,
 1 AS `subCont`,
 1 AS `subLx`,
 1 AS `subInput`,
 1 AS `subOutput`,
 1 AS `subStatus`,
 1 AS `subDesc`,
 1 AS `esUploadStatus`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_examsubinst`
--

/*!50001 DROP VIEW IF EXISTS `v_examsubinst`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_examsubinst` AS select `a`.`esDefID` AS `esDefID`,`a`.`esInsFileUrl` AS `esInsFileUrl`,`a`.`esInsUploadDate` AS `esInsUploadDate`,`b`.`examDefID` AS `examDefID`,`c`.`subID` AS `subID`,`c`.`coID` AS `coID`,`c`.`subBH` AS `subBH`,`c`.`subTitle` AS `subTitle`,`c`.`subCont` AS `subCont`,`c`.`subLx` AS `subLx`,`c`.`subInput` AS `subInput`,`c`.`subOutput` AS `subOutput`,`c`.`subStatus` AS `subStatus`,`c`.`subDesc` AS `subDesc`,'??' AS `esUploadStatus` from ((`t_examsubinst` `a` join `t_examsubdef` `b`) join `t_subject` `c`) where ((`a`.`esDefID` = `b`.`esDefID`) and (`b`.`subID` = `c`.`subID`)) union select `a`.`esDefID` AS `esDefID`,'' AS `esInsFileUrl`,'' AS `esInsUploadDate`,`a`.`examDefID` AS `examDefID`,`b`.`subID` AS `subID`,`b`.`coID` AS `coID`,`b`.`subBH` AS `subBH`,`b`.`subTitle` AS `subTitle`,`b`.`subCont` AS `subCont`,`b`.`subLx` AS `subLx`,`b`.`subInput` AS `subInput`,`b`.`subOutput` AS `subOutput`,`b`.`subStatus` AS `subStatus`,`b`.`subDesc` AS `subDesc`,'??' AS `esUploadStatus` from (`t_examsubdef` `a` join `t_subject` `b`) where ((`a`.`subID` = `b`.`subID`) and (not(`a`.`esDefID` in (select `a`.`esDefID` from ((`t_examsubinst` `a` join `t_examsubdef` `b`) join `t_subject` `c`) where ((`a`.`esDefID` = `b`.`esDefID`) and (`b`.`subID` = `c`.`subID`)))))) */;
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

-- Dump completed on 2015-05-10 15:42:13
