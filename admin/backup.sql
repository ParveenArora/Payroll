-- MySQL dump 10.13  Distrib 5.1.41, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: payroll
-- ------------------------------------------------------
-- Server version	5.1.41-3ubuntu12.6

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(300) NOT NULL,
  `password` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','02b8884e689b824c7b43bf2d75e612f1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worker_acc`
--

DROP TABLE IF EXISTS `worker_acc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `worker_acc` (
  `id` int(2) NOT NULL,
  `accno` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worker_acc`
--

LOCK TABLES `worker_acc` WRITE;
/*!40000 ALTER TABLE `worker_acc` DISABLE KEYS */;
INSERT INTO `worker_acc` VALUES (1,1752),(2,1745),(3,1743),(4,1744),(5,1736),(6,1732),(7,1739),(8,1761),(9,971),(10,1785),(11,1738),(12,1728),(13,1758),(14,1760),(15,1735),(16,1734),(17,1763),(18,1706),(19,1762),(20,1756),(21,1733),(22,1757),(24,1970),(25,2131),(27,NULL),(28,0),(30,1770),(31,1771),(32,NULL);
/*!40000 ALTER TABLE `worker_acc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worker_fixeds`
--

DROP TABLE IF EXISTS `worker_fixeds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `worker_fixeds` (
  `worker_id` int(2) NOT NULL DEFAULT '0',
  `gross` int(4) NOT NULL,
  `hra` int(4) NOT NULL,
  PRIMARY KEY (`worker_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worker_fixeds`
--

LOCK TABLES `worker_fixeds` WRITE;
/*!40000 ALTER TABLE `worker_fixeds` DISABLE KEYS */;
INSERT INTO `worker_fixeds` VALUES (1,6400,500),(2,5100,400),(3,6100,400),(4,4900,400),(5,5600,400),(6,5400,400),(7,5200,400),(8,7300,500),(9,9300,600),(10,9500,500),(11,7700,500),(12,9000,600),(13,8500,600),(14,8000,500),(15,6200,400),(16,6400,500),(17,8500,700),(18,9500,1000),(19,5000,400),(20,5500,400),(21,8000,600),(22,8000,500),(24,6000,400),(25,4900,300),(27,8000,0),(28,8000,400),(30,3000,0),(31,3000,0),(32,4500,300);
/*!40000 ALTER TABLE `worker_fixeds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worker_varys`
--

DROP TABLE IF EXISTS `worker_varys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `worker_varys` (
  `id` int(11) NOT NULL,
  `rate` float NOT NULL,
  `workdays` float NOT NULL,
  `pf` int(11) NOT NULL,
  `esi` int(11) NOT NULL,
  `advance` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(60) NOT NULL DEFAULT '2011',
  PRIMARY KEY (`id`,`month`,`year`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worker_varys`
--

LOCK TABLES `worker_varys` WRITE;
/*!40000 ALTER TABLE `worker_varys` DISABLE KEYS */;
INSERT INTO `worker_varys` VALUES (1,206.45,31,462,97,0,8,2011),(2,164.52,35.875,444,93,0,8,2011),(3,196.77,28.125,426,89,3200,8,2011),(4,158.06,21.8,373,78,856,8,2011),(5,180.65,32,444,93,2600,8,2011),(6,174.19,37.675,462,97,2700,8,2011),(7,167.74,24,355,75,1400,8,2011),(8,235.48,27.825,426,89,1400,8,2011),(9,300,36.25,479,100,10525,8,2011),(10,306.45,36.875,462,97,500,8,2011),(11,248.39,29.375,462,97,1500,8,2011),(12,290.32,38.75,497,104,1000,8,2011),(13,274.19,24,355,75,7500,8,2011),(14,258.06,38.625,480,100,1000,8,2011),(15,200,37.625,462,97,0,8,2011),(16,206.45,31,409,86,5000,8,2011),(17,274.19,10,18,4,700,8,2011),(18,306.45,23,424,89,5000,8,2011),(19,161.29,29,426,89,500,8,2011),(20,177.42,18,284,60,1500,8,2011),(21,266.67,34.75,480,100,0,8,2011),(22,258.06,35.5,462,97,0,8,2011),(32,150,37.1,462,97,2000,9,2011),(24,193.55,24.875,462,97,0,8,2011),(25,158.06,29.437,426,89,1000,8,2011),(31,100,15,0,0,500,9,2011),(27,258.06,33.875,409,86,6840,8,2011),(28,266.67,32.25,338,71,1900,8,2011),(30,100,27,0,0,600,9,2011),(30,96.77,31,0,0,0,8,2011),(31,96.77,15,0,0,450,8,2011),(32,145.16,27,0,0,3000,8,2011),(28,266.67,31.125,444,93,6386,9,2011),(27,266.67,34.625,444,93,4195,9,2011),(25,163.33,39,444,93,1500,9,2011),(24,200,36.6,462,97,1000,9,2011),(22,266.67,39,462,97,0,9,2011),(21,266.67,33.625,444,93,0,9,2011),(20,183.33,23,338,71,3350,9,2011),(19,166.67,33.4,462,97,1000,9,2011),(18,316.67,20,368,77,6160,9,2011),(17,283.33,2,36,8,0,9,2011),(16,213.33,32,444,93,5500,9,2011),(15,206.67,36.5,462,97,3100,9,2011),(14,266.67,38,462,97,0,9,2011),(13,283.33,29,355,75,4135,9,2011),(12,300,38.1,479,100,2000,9,2011),(11,256.67,37.5,444,93,4600,9,2011),(10,316.67,39.125,462,97,1500,9,2011),(9,310,36.125,479,100,7235,9,2011),(8,243.33,31.5,409,86,3300,9,2011),(7,173.33,32.5,462,97,4300,9,2011),(6,180,35.25,444,93,5000,9,2011),(5,186.67,35,426,89,2300,9,2011),(4,163.33,4.4,71,15,0,9,2011),(3,203.33,34.125,426,89,3000,9,2011),(2,170,41,462,97,1000,9,2011),(1,213.33,30,462,97,0,9,2011);
/*!40000 ALTER TABLE `worker_varys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workers`
--

DROP TABLE IF EXISTS `workers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workers` (
  `id` int(2) NOT NULL,
  `worker_fname` varchar(10) NOT NULL,
  `worker_lname` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workers`
--

LOCK TABLES `workers` WRITE;
/*!40000 ALTER TABLE `workers` DISABLE KEYS */;
INSERT INTO `workers` VALUES (1,'Jagroop','Singh'),(2,'Jagtar','Das'),(3,'Amandeep','Singh'),(4,'Vikey','Dalla'),(5,'Dilip','Giri'),(6,'Bhola','Singh'),(7,'Avtar','Singh'),(8,'Sonu','Kumar'),(9,'Nirbhay','Singh'),(10,'Ram','Pher'),(11,'Rafiq','Mohammed'),(12,'Ram','Sakal'),(13,'Krishan','Gopal'),(14,'Darshan','Singh'),(15,'Kedar','Chaudhary'),(16,'Gurmeet','Singh'),(17,'Jaspreet','Singh'),(18,'Daljit','Singh'),(19,'Surjit','Singh'),(20,'Rajwant','Singh'),(21,'Sunil','Bhagat'),(22,'Santosh','Kumar'),(24,'Ram','Parsad'),(25,'Parmod','Patel'),(27,'Jaspreet ','Singh'),(28,'kuljit','Singh'),(30,'Inderjeet ','Singh'),(31,'Gurdeep ','Singh'),(32,'Manoj','Kumar');
/*!40000 ALTER TABLE `workers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-11-04  0:23:37
