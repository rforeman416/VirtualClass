CREATE DATABASE  IF NOT EXISTS `virtualclassproj` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `virtualclassproj`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: virtualclassproj
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classes` (
  `idclasses` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `teacher` varchar(45) DEFAULT NULL,
  `room` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idclasses`),
  UNIQUE KEY `idclasses_UNIQUE` (`idclasses`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` VALUES (7,'Physics','Joe Shmoe','300'),(8,'Poetry','Sara Silverman','TBD'),(9,'Art History','Ben Benson','24'),(10,'Calculus','Smarty McGee','S14'),(11,'Chemistry','Jon Jonson','900'),(12,'History','Mike Miller','TBA'),(13,'Sculpture','Gwen Gwenman','341'),(14,'Algoritms','Betty Bettler','46'),(15,'Biology','Luke Luker','TBA'),(16,'Literature','Dylan Dylington','TBA'),(17,'Painting','TBA','111'),(18,'Data Structures','Henry Hemmings','213'),(19,'Sociology','Susan Suser','TBA'),(20,'Algebra','Bob Bobly','246');
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `junctiontable`
--

DROP TABLE IF EXISTS `junctiontable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `junctiontable` (
  `idclasses` int(11) NOT NULL DEFAULT '0',
  `idstudents` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idclasses`,`idstudents`),
  KEY `FKstudent_idx` (`idstudents`),
  CONSTRAINT `FKclass` FOREIGN KEY (`idclasses`) REFERENCES `classes` (`idclasses`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKstudent` FOREIGN KEY (`idstudents`) REFERENCES `students` (`idstudents`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `junctiontable`
--

LOCK TABLES `junctiontable` WRITE;
/*!40000 ALTER TABLE `junctiontable` DISABLE KEYS */;
INSERT INTO `junctiontable` VALUES (9,24),(11,24),(15,24),(18,24),(20,24),(7,25),(8,25),(13,25),(16,25),(11,26),(17,26),(19,26),(10,27),(20,27),(9,28),(12,28),(13,28),(19,28),(20,28),(9,29),(14,29),(15,29),(20,29),(7,34),(8,34),(9,34),(10,34),(10,35),(14,35),(18,35),(20,35),(7,36),(13,36),(16,36),(19,36),(12,37),(14,37),(18,37),(12,38),(14,38),(16,38),(18,38),(20,38),(9,39),(15,39),(16,39),(17,39),(19,39),(8,40),(10,40),(11,40),(7,41),(14,41),(16,41),(18,41),(13,42),(20,42),(11,43),(13,43),(15,43),(17,43),(19,43),(19,44),(10,45),(18,45),(20,45),(10,46),(15,46),(16,46),(15,47);
/*!40000 ALTER TABLE `junctiontable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `idstudents` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `midName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idstudents`),
  UNIQUE KEY `idstudents_UNIQUE` (`idstudents`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (24,'Clara','Oswald','Oswin'),(25,'Rory','Williams',''),(26,'Amy','Pond',''),(27,'Donna','Noble','The Doctor'),(28,'Rose','Tyler',''),(29,'Martha','Jones',''),(30,'River','Song',''),(34,'Ted','Mosby',''),(35,'Barney','Stinson','Awesome'),(36,'Marshall','Eriksen',NULL),(37,'Lily','Aldrin',NULL),(38,'Robin','Scherbatsky',NULL),(39,'Marvin','Eriksen','WaitForIt'),(40,'Shawn','Spencer',NULL),(41,'Burton','Guster','Gus'),(42,'Carlton','Lassiter','Lassie'),(43,'Juliet','O\'Hara','Jules'),(44,'Henry','Spencer',NULL),(45,'Audrey','Parker',NULL),(46,'Natham','Wuornos',NULL),(47,'Duke','Crocker',NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-21 22:23:31
