-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: db_common
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

DROP DATABASE IF EXISTS `db_common`;
create database `db_common`;
use `db_common`;

--
-- Table structure for table `T_CommonCource`
--

DROP TABLE IF EXISTS `T_CommonCource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_CommonCource`
--

LOCK TABLES `T_CommonCource` WRITE;
/*!40000 ALTER TABLE `T_CommonCource` DISABLE KEYS */;
INSERT INTO `T_CommonCource` VALUES (2,'CC01','计算机科学基础','2014','秋冬','计算机学院','本科','计算机科学基础',NULL,'计算机科学基础',1,'2014-08-11 00:00:00','计算机科学基础'),(3,'CC02','C语言程序设计基础及实验','2014','秋冬','计算机学院','本科','C语言程序设计基础及实验',NULL,'C语言程序设计基础及实验',1,'2014-08-11 00:00:00','C语言程序设计基础及实验'),(4,'CC03','JAVA语言程序设计基础及实验','2014','秋冬','计算机学院','本科','JAVA语言程序设计基础及实验',NULL,'JAVA语言程序设计基础及实验',1,'2014-08-11 00:00:00','JAVA语言程序设计基础及实验'),(5,'CC04','PYTHON语言程序设计基础及实验','2014','秋冬','计算机学院','本科','PYTHON语言程序设计基础及实验',NULL,'PYTHON语言程序设计基础及实验',1,'2014-08-11 00:00:00','PYTHON语言程序设计基础及实验'),(1,NULL,'自定义课程',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `T_CommonCource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_CommonNews`
--

DROP TABLE IF EXISTS `T_CommonNews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_CommonNews`
--

LOCK TABLES `T_CommonNews` WRITE;
/*!40000 ALTER TABLE `T_CommonNews` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_CommonNews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Links`
--

DROP TABLE IF EXISTS `T_Links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `T_Links` (
  `linkID` int(11) NOT NULL AUTO_INCREMENT,
  `linkTitle` varchar(40) DEFAULT NULL,
  `linkUrl` varchar(400) DEFAULT NULL,
  `linkstatus` int(3) DEFAULT '0',
  `linkDesc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`linkID`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Links`
--

LOCK TABLES `T_Links` WRITE;
/*!40000 ALTER TABLE `T_Links` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_Links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_SubType`
--

DROP TABLE IF EXISTS `T_SubType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `T_SubType` (
  `SubTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `SubTypeName` varchar(40) DEFAULT NULL,
  `Status` int(3) DEFAULT '0',
  `SubTypeDesc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`SubTypeID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_SubType`
--

LOCK TABLES `T_SubType` WRITE;
/*!40000 ALTER TABLE `T_SubType` DISABLE KEYS */;
INSERT INTO `T_SubType` VALUES (1,'所有题型',1,''),(2,'判断题',1,''),(3,'单选题',1,''),(4,'选择性填空题',1,''),(5,'填空题',1,''),(6,'连线题',1,''),(7,'程序填空题',1,''),(8,'程序阅读题',1,''),(9,'简答题',1,''),(10,'编程题',1,''),(11,'论述题',1,''),(12,'选择性程序阅读题',1,''),(13,'选择性程序填空题',1,'');
/*!40000 ALTER TABLE `T_SubType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Sublib`
--

DROP TABLE IF EXISTS `T_Sublib`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `T_Sublib` (
  `subID` int(11) NOT NULL AUTO_INCREMENT,
  `subAns` varchar(100) NOT NULL,
  `coID` int(11) DEFAULT NULL,
  `subBH` varchar(20) DEFAULT NULL,
  `subTitle` varchar(100) DEFAULT NULL,
  `subCont` varchar(600) DEFAULT NULL,
  `Opt01` varchar(100) DEFAULT NULL,
  `Opt02` varchar(100) DEFAULT NULL,
  `Opt03` varchar(100) DEFAULT NULL,
  `Opt04` varchar(100) DEFAULT NULL,
  `Opt05` varchar(100) DEFAULT NULL,
  `Opt06` varchar(100) DEFAULT NULL,
  `Opt07` varchar(100) DEFAULT NULL,
  `Opt08` varchar(100) DEFAULT NULL,
  `Opt09` varchar(100) DEFAULT NULL,
  `Opt10` varchar(100) DEFAULT NULL,
  `OptNum` tinyint(3) DEFAULT '0',
  `subTypeID` tinyint(3) DEFAULT '0',
  `subInput` varchar(100) DEFAULT NULL,
  `subOutput` varchar(50) DEFAULT NULL,
  `subStatus` tinyint(4) DEFAULT NULL,
  `creator` int(3) NOT NULL,
  `subDesc` varchar(300) DEFAULT NULL,
  `author_tecid` int(3) NOT NULL,
  PRIMARY KEY (`subID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Sublib`
--

LOCK TABLES `T_Sublib` WRITE;
/*!40000 ALTER TABLE `T_Sublib` DISABLE KEYS */;
INSERT INTO `T_Sublib` VALUES (1,'EAH',1,'0101030001','','1. 在Windows7中，当运行的程序所需内存大于实际内存时，需要使用___(1)___，即把无法装入实际内存的程序或数据保存到___(2)___，如果需要更改该项参数，可以单击___(3)___后逐步进行设置。','硬盘','物理内存','RAM','ROM','虚拟内存 ','设备管理器','系统保护','高级系统设置','','',3,3,NULL,NULL,1,1,'',7),(2,'BEG',1,'0101030002','','按组合键Ctrl+Alt+___(1)___，选择“启动任务管理器”，即可弹出“Windows任务管理器”窗口，如有正在运行的某个程序出现“未响应”状况时，在该窗口中选择“___(2)___”选项卡，选择该程序，并单击“结束任务”按钮，如果想要以图表方式直接查看CPU使用情况则可以选择“___(3)___”选项卡。','Home','Delete','Shift','进程','应用程序','服务','性能','用户','','',3,3,NULL,NULL,1,1,'',7),(3,'BEG',1,'0101030003','','___(1)___是Windows中重要的系统设置工具，系统默认以“___(2)___”的形式来显示功能菜单，分为系统和安全、用户账户和家庭安全、网络和Internet、外观和个性化、硬件和声音、时钟语言和区域、轻松访问、程序等，当然也可以更改其他查看方式。如果需要语音控制计算机，可以在单击“___(3)___”，在其中设置“启动语音识别”来完成。','库','控制面板','资源管理器','图标','类别','时钟语言和区域','轻松访问','硬件和声音','','',3,3,NULL,NULL,1,1,'',7),(4,'BDG',1,'0101030004','','当多个用户使用一台计算机时，可以进行多个用户使用环境的设置，当不同用户用不同身份登录时，系统就会应用该用户的设置。通过单击“控制面板”中的“用户账户和家庭安全”，然后进行“创建用户”，账户类型包括：___(1)___和___(2)___，前者可以使用大多数软件以及更改不影响其他用户或计算机安全的系统设置，而后者有计算机的___(3)___的访问权，可以做任何需要的修改。','关键用户','标准用户','普通用户','管理员','系统员','程序员','完全','绝大部分','','',3,3,NULL,NULL,1,1,'',7),(5,'BEH',1,'0101030005','','Windows7自带了还原系统功能可以还原文件或恢复系统，在控制面板的___(1)___类别下可以使用该项功能，在建立好___(2)___后，需要时就可以进行文件或文件夹的还原，如果需要还原系统，则可以在控制面板中单击“___(3)___”项，然后按向导逐步进行。','家庭安全','系统和安全','轻松访问','还原文件','备份文件','系统文件','还原','恢复','','',3,3,NULL,NULL,1,1,'',7),(6,'T',1,'0101010001','','汇编语言是CPU可以执行的全部指令的符号化表示。','','','','','','','','','','',1,1,NULL,NULL,1,1,'',8),(7,'T',1,'0101010002','','指令是计算机能够直接识别的二进制代码，任何一种高级语言编写的程序都需要翻译为指令代码才能够被CPU执行。','','','','','','','','','','',1,1,NULL,NULL,1,1,'',8),(8,'F',1,'0101010003','','在数据库保护的技术体系中，主要研究控制数据冗余、完整性保护及故障恢复等技术。','','','','','','','','','','',1,1,NULL,NULL,1,1,'',8),(9,'F',1,'0101010004','','在关系代数的专门关系运算中，从表中取出指定的属性的操作称为选择。','','','','','','','','','','',1,1,NULL,NULL,1,1,'',8),(10,'T',1,'0101010005','','数据库中，数据的物理独立性是指用户的应用程序与存储在磁盘上的数据库中的数据是相互独立的。','','','','','','','','','','',1,1,NULL,NULL,1,1,'',8),(11,'T',1,'0101010006','','现实世界 “特征” 术语,对应于数据世界的是数据项而不是属性、联系，也不是记录。','','','','','','','','','','',1,1,NULL,NULL,1,1,'',8),(12,'F',1,'0101010007','','在数据管理技术的发展过程中，经历了人工管理阶段、文件系统阶段和数据库系统阶段。在这几个阶段中，数据独立性最高的是文件系统阶段。','','','','','','','','','','',1,1,NULL,NULL,1,1,'',8);
/*!40000 ALTER TABLE `T_Sublib` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_SystemOption`
--

DROP TABLE IF EXISTS `T_SystemOption`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_SystemOption`
--

LOCK TABLES `T_SystemOption` WRITE;
/*!40000 ALTER TABLE `T_SystemOption` DISABLE KEYS */;
/*!40000 ALTER TABLE `T_SystemOption` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_Teacher`
--

DROP TABLE IF EXISTS `T_Teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `IsAdmin` tinyint(2) DEFAULT '0',
  `teaStatus` tinyint(4) DEFAULT NULL,
  `logOnLine` tinyint(4) DEFAULT NULL,
  `logTime` datetime DEFAULT NULL,
  `logIP` varchar(40) DEFAULT NULL,
  `teaTel` varchar(60) DEFAULT NULL,
  `teaEmail` varchar(40) DEFAULT NULL,
  `teaHomePage` varchar(60) DEFAULT NULL,
  `teaDesc` varchar(200) DEFAULT NULL,
  `logoutTime` datetime DEFAULT NULL,
  PRIMARY KEY (`teaID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_Teacher`
--

LOCK TABLES `T_Teacher` WRITE;
/*!40000 ALTER TABLE `T_Teacher` DISABLE KEYS */;
INSERT INTO `T_Teacher` VALUES (2,'陈建海','Jianhai Chen','cjh','000','cjh','db_cjh','localhost','exam','fcding',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'冯晓霞','Xiaoxia Feng','fxx','000','fxx','db_fxx','localhost','exam','fcding',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'陆汉权','Hanquan Lu','lhq','000','lhq','db_lhq','localhost','exam','fcding',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'方宁','Ning Fang','fn','000','fn','db_fn','localhost','exam','fcding',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'沈钦仙','Qinxian Shen','sqx','000','sqx','db_sqx','localhost','exam','fcding',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1,'管理员','System Administrator','admin','135','common','db_common','localhost','exam','fcding',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'沈睿','Rui Shen','sr','000','sr','db_sr','localhost','exam','fcding',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'王建江','Jianjiang Wang','wjj','000','wjj','db_wjj','localhost','exam','fcding',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'白洪欢','Honghuan Bai','bhh','000','bhh','db_bhh','localhost','exam','fcding',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'李峰','Feng Li','lf','000','lf','db_lf','localhost','exam','fcding',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'潘肖昱','Xiaoyu Pan','pxy','000','pxy','db_pxy','localhost','exam','fcding',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'徐镜春','Jingchun Xu','xjc','000','xjc','db_xjc','localhost','exam','fcding',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'张彤?','Tongyu Zhang','zty','000','zty','db_zty','localhost','exam','fcding',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `T_Teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `V_UserInfo`
--

DROP TABLE IF EXISTS `V_UserInfo`;
/*!50001 DROP VIEW IF EXISTS `V_UserInfo`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `V_UserInfo` (
  `uID` tinyint NOT NULL,
  `uName` tinyint NOT NULL,
  `uPwd` tinyint NOT NULL,
  `uNum` tinyint NOT NULL,
  `uType` tinyint NOT NULL,
  `uStatus` tinyint NOT NULL,
  `online` tinyint NOT NULL,
  `loginIP` tinyint NOT NULL,
  `login_time` tinyint NOT NULL,
  `logout_time` tinyint NOT NULL,
  `telephone` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `V_UserInfo_Stu_01`
--

DROP TABLE IF EXISTS `V_UserInfo_Stu_01`;
/*!50001 DROP VIEW IF EXISTS `V_UserInfo_Stu_01`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `V_UserInfo_Stu_01` (
  `uID` tinyint NOT NULL,
  `uName` tinyint NOT NULL,
  `uPwd` tinyint NOT NULL,
  `uNum` tinyint NOT NULL,
  `uType` tinyint NOT NULL,
  `uStatus` tinyint NOT NULL,
  `online` tinyint NOT NULL,
  `loginIP` tinyint NOT NULL,
  `login_time` tinyint NOT NULL,
  `logout_time` tinyint NOT NULL,
  `telephone` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `V_UserInfo_Stu_02`
--

DROP TABLE IF EXISTS `V_UserInfo_Stu_02`;
/*!50001 DROP VIEW IF EXISTS `V_UserInfo_Stu_02`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `V_UserInfo_Stu_02` (
  `uID` tinyint NOT NULL,
  `uName` tinyint NOT NULL,
  `uPwd` tinyint NOT NULL,
  `uNum` tinyint NOT NULL,
  `uType` tinyint NOT NULL,
  `uStatus` tinyint NOT NULL,
  `online` tinyint NOT NULL,
  `loginIP` tinyint NOT NULL,
  `login_time` tinyint NOT NULL,
  `logout_time` tinyint NOT NULL,
  `telephone` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `V_UserInfo_Tea`
--

DROP TABLE IF EXISTS `V_UserInfo_Tea`;
/*!50001 DROP VIEW IF EXISTS `V_UserInfo_Tea`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `V_UserInfo_Tea` (
  `uID` tinyint NOT NULL,
  `uName` tinyint NOT NULL,
  `uPwd` tinyint NOT NULL,
  `uNum` tinyint NOT NULL,
  `uType` tinyint NOT NULL,
  `uStatus` tinyint NOT NULL,
  `online` tinyint NOT NULL,
  `loginIP` tinyint NOT NULL,
  `telephone` tinyint NOT NULL,
  `login_time` tinyint NOT NULL,
  `logout_time` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `V_UserInfo`
--

/*!50001 DROP TABLE IF EXISTS `V_UserInfo`*/;
/*!50001 DROP VIEW IF EXISTS `V_UserInfo`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`%`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `V_UserInfo` AS select `V_UserInfo_Tea`.`uID` AS `uID`,`V_UserInfo_Tea`.`uName` AS `uName`,`V_UserInfo_Tea`.`uPwd` AS `uPwd`,`V_UserInfo_Tea`.`uNum` AS `uNum`,`V_UserInfo_Tea`.`uType` AS `uType`,`V_UserInfo_Tea`.`uStatus` AS `uStatus`,`V_UserInfo_Tea`.`online` AS `online`,`V_UserInfo_Tea`.`loginIP` AS `loginIP`,`V_UserInfo_Tea`.`login_time` AS `login_time`,`V_UserInfo_Tea`.`logout_time` AS `logout_time`,`V_UserInfo_Tea`.`telephone` AS `telephone` from `db_common`.`V_UserInfo_Tea` union select `V_UserInfo_Stu_01`.`uID` AS `uID`,`V_UserInfo_Stu_01`.`uName` AS `uName`,`V_UserInfo_Stu_01`.`uPwd` AS `uPwd`,`V_UserInfo_Stu_01`.`uNum` AS `uNum`,`V_UserInfo_Stu_01`.`uType` AS `uType`,`V_UserInfo_Stu_01`.`uStatus` AS `uStatus`,`V_UserInfo_Stu_01`.`online` AS `online`,`V_UserInfo_Stu_01`.`loginIP` AS `loginIP`,`V_UserInfo_Stu_01`.`login_time` AS `login_time`,`V_UserInfo_Stu_01`.`logout_time` AS `logout_time`,`V_UserInfo_Stu_01`.`telephone` AS `telephone` from `db_common`.`V_UserInfo_Stu_01` union select `V_UserInfo_Stu_02`.`uID` AS `uID`,`V_UserInfo_Stu_02`.`uName` AS `uName`,`V_UserInfo_Stu_02`.`uPwd` AS `uPwd`,`V_UserInfo_Stu_02`.`uNum` AS `uNum`,`V_UserInfo_Stu_02`.`uType` AS `uType`,`V_UserInfo_Stu_02`.`uStatus` AS `uStatus`,`V_UserInfo_Stu_02`.`online` AS `online`,`V_UserInfo_Stu_02`.`loginIP` AS `loginIP`,`V_UserInfo_Stu_02`.`login_time` AS `login_time`,`V_UserInfo_Stu_02`.`logout_time` AS `logout_time`,`V_UserInfo_Stu_02`.`telephone` AS `telephone` from `db_common`.`V_UserInfo_Stu_02` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `V_UserInfo_Stu_01`
--

/*!50001 DROP TABLE IF EXISTS `V_UserInfo_Stu_01`*/;
/*!50001 DROP VIEW IF EXISTS `V_UserInfo_Stu_01`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`%`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `V_UserInfo_Stu_01` AS select `db_cjh`.`T_Student`.`stuID` AS `uID`,`db_cjh`.`T_Student`.`stuName` AS `uName`,`db_cjh`.`T_Student`.`stuPasswd` AS `uPwd`,`db_cjh`.`T_Student`.`stuNumber` AS `uNum`,'stu' AS `uType`,`db_cjh`.`T_Student`.`stuStatus` AS `uStatus`,`db_cjh`.`T_Student`.`online` AS `online`,`db_cjh`.`T_Student`.`loginIP` AS `loginIP`,`db_cjh`.`T_Student`.`login_at` AS `login_time`,`db_cjh`.`T_Student`.`logout_at` AS `logout_time`,`db_cjh`.`T_Student`.`telphone` AS `telephone` from `db_cjh`.`T_Student` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `V_UserInfo_Stu_02`
--

/*!50001 DROP TABLE IF EXISTS `V_UserInfo_Stu_02`*/;
/*!50001 DROP VIEW IF EXISTS `V_UserInfo_Stu_02`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `V_UserInfo_Stu_02` AS select `db_lhq`.`T_Student`.`stuID` AS `uID`,`db_lhq`.`T_Student`.`stuName` AS `uName`,`db_lhq`.`T_Student`.`stuPasswd` AS `uPwd`,`db_lhq`.`T_Student`.`stuNumber` AS `uNum`,'stu' AS `uType`,`db_lhq`.`T_Student`.`stuStatus` AS `uStatus`,`db_lhq`.`T_Student`.`online` AS `online`,`db_lhq`.`T_Student`.`loginIP` AS `loginIP`,`db_lhq`.`T_Student`.`login_at` AS `login_time`,`db_lhq`.`T_Student`.`logout_at` AS `logout_time`,`db_lhq`.`T_Student`.`telphone` AS `telephone` from `db_lhq`.`T_Student` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `V_UserInfo_Tea`
--

/*!50001 DROP TABLE IF EXISTS `V_UserInfo_Tea`*/;
/*!50001 DROP VIEW IF EXISTS `V_UserInfo_Tea`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`%`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `V_UserInfo_Tea` AS select `T_Teacher`.`teaID` AS `uID`,`T_Teacher`.`teaName` AS `uName`,`T_Teacher`.`teaPasswd` AS `uPwd`,`T_Teacher`.`teaWorkNum` AS `uNum`,'adm' AS `uType`,`T_Teacher`.`teaStatus` AS `uStatus`,`T_Teacher`.`logOnLine` AS `online`,`T_Teacher`.`logIP` AS `loginIP`,`T_Teacher`.`teaTel` AS `telephone`,`T_Teacher`.`logTime` AS `login_time`,`T_Teacher`.`logoutTime` AS `logout_time` from `T_Teacher` where (`T_Teacher`.`IsAdmin` = 1) union select `T_Teacher`.`teaID` AS `uID`,`T_Teacher`.`teaName` AS `uName`,`T_Teacher`.`teaPasswd` AS `uPwd`,`T_Teacher`.`teaWorkNum` AS `uNum`,'tea' AS `uType`,`T_Teacher`.`teaStatus` AS `uStatus`,`T_Teacher`.`logOnLine` AS `online`,`T_Teacher`.`logIP` AS `loginIP`,`T_Teacher`.`teaTel` AS `telephone`,`T_Teacher`.`logTime` AS `login_time`,`T_Teacher`.`logoutTime` AS `logout_time` from `T_Teacher` where (`T_Teacher`.`IsAdmin` = 0) */;
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
