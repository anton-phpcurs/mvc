CREATE DATABASE  IF NOT EXISTS `bazar` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bazar`;
-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: bazar
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `password` varchar(60) NOT NULL,
  `create` timestamp NULL DEFAULT NULL,
  `update` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin@admin.com','$2y$10$JgP9eBYxbyzQPC.iIcBniuoima1B/U2LSKXwhXzJ5is/6uH27GjCy',NULL,NULL);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bid`
--

DROP TABLE IF EXISTS `bid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL,
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  `update` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bid`
--

LOCK TABLES `bid` WRITE;
/*!40000 ALTER TABLE `bid` DISABLE KEYS */;
INSERT INTO `bid` VALUES (1,500,'2015-08-04 07:31:11',1,3,'0000-00-00 00:00:00'),(11,200,'2015-08-03 09:41:31',1,4,'0000-00-00 00:00:00'),(12,600,'2015-08-03 09:42:31',2,3,NULL),(13,700,'2015-08-03 09:43:31',2,4,NULL),(27,600,'2015-08-04 08:02:35',3,5,NULL),(28,700,'2015-08-03 11:43:31',4,5,NULL),(30,800,'2015-08-03 12:43:31',5,5,NULL),(32,1000,'2015-08-03 13:43:31',3,6,NULL),(33,1100,'2015-08-03 13:45:31',5,6,NULL),(34,90,'2015-08-04 13:56:50',3,7,NULL),(35,1300,'2015-08-05 13:26:32',11,12,NULL),(36,5200,'2015-08-05 13:27:44',11,11,NULL),(37,10,'2015-08-05 13:28:00',11,13,NULL),(38,300,'2015-08-05 13:31:44',11,8,NULL),(39,490,'2015-08-05 13:28:19',11,10,NULL),(40,500,'2015-08-06 11:35:44',9,19,NULL);
/*!40000 ALTER TABLE `bid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Category1'),(2,'Category2'),(3,'Category3'),(4,'Category4'),(5,'Category5');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coment`
--

DROP TABLE IF EXISTS `coment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  `update` timestamp NULL DEFAULT NULL,
  `type_comment` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coment`
--

LOCK TABLES `coment` WRITE;
/*!40000 ALTER TABLE `coment` DISABLE KEYS */;
/*!40000 ALTER TABLE `coment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lot`
--

DROP TABLE IF EXISTS `lot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `start_price` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `finished` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  `front_img` varchar(50) DEFAULT NULL,
  `current_price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lot`
--

LOCK TABLES `lot` WRITE;
/*!40000 ALTER TABLE `lot` DISABLE KEYS */;
INSERT INTO `lot` VALUES (3,'call in 1 click','Good phone',20,'2015-08-06 12:12:43',1,1,1,'2015-08-03 09:43:42','2015-08-03 09:43:42','55c34e07861e1.jpg',10),(4,'tea pot','wanna some tea?',30,'2015-08-06 12:12:43',1,2,2,'2015-08-03 09:44:23','2015-08-03 09:44:23','55c34db7c8086.jpg',10),(5,'FOOD','omelette',20,'2015-08-06 12:12:43',1,6,1,'2015-08-03 09:45:09','2015-08-03 09:45:09','55c34e222429b.jpg',20),(6,'fast car','porshe',20,'2015-08-06 12:12:43',1,2,2,'2015-08-03 09:48:00','2015-08-03 09:48:00','55c34e3a35a8a.jpg',30),(7,'Title5','desc5',30,'2015-08-06 12:12:43',1,3,3,'2015-08-03 09:48:20','2015-08-03 09:48:20','55c34e678b4e8.jpg',50),(8,'Title6','fast car',40,'2015-08-06 12:12:43',1,4,4,'2015-08-03 10:01:06','2015-08-03 10:01:06','55c34e838599f.jpg',50),(9,'hot tyfoon','dry your hair quickly',50,'2015-08-06 12:12:43',1,5,3,'2015-08-03 10:01:34','2015-08-03 10:01:34','55c34de6efdfd.jpg',60),(10,'get there amazingly fast','rare bike',500,'2015-08-06 12:12:43',1,4,4,'2015-08-04 11:26:16','2015-08-04 11:26:16','55c34e9ac2ac9.jpg',0),(11,'IDDQD','it can make you immortal',5200,'2015-08-06 12:12:43',1,3,5,'2015-08-04 11:26:16','2015-08-04 11:26:16','55c34eb4d9ce5.jpg',0),(12,'motherboard','computer detail',1000,'2015-08-06 12:12:43',1,5,3,'2015-08-04 14:20:14','2015-08-04 14:20:14','55c34ec9c79c2.jpg',0),(13,'Title11','Description 11 text',20,'2015-08-06 12:12:43',0,3,5,'2015-08-04 14:23:14','2015-08-04 14:23:14','55c34edbd12a2.jpg',0),(14,'recorder','old rare recorder',150,'2015-08-06 12:12:43',1,5,4,'2015-08-04 14:27:42','2015-08-04 14:27:42','55c34ef5c9ac0.jpg',0),(15,'bike','cool bike',666,'2015-08-06 12:12:43',1,10,3,'2015-08-04 14:27:42','2015-08-04 14:27:42','55c34f0aa82ec.jpg',0),(16,'lot of trash','head with trash',99,'2015-08-20 21:08:00',1,9,2,'2015-08-04 14:27:42','2015-08-04 14:27:42','55c345f290b82.jpg',0),(17,'MEAT','MEAT MEAT MEAT MEAT',120,'2015-08-29 21:08:00',1,9,1,'2015-08-04 14:27:42','2015-08-04 14:27:42','55c346105be76.jpg',0),(18,'Sale my soul','Sales',666,'2015-08-06 12:12:43',1,8,4,'2015-08-04 14:27:42','2015-08-04 14:27:42','55c34f1dbdcc7.jpg',0),(19,'More meat','poor rabbit',400,'2015-08-06 12:12:43',1,7,4,'2015-08-05 15:30:13','2015-08-05 15:30:13','55c34f317b9ec.jpg',0),(20,'refrigerator','cool inside',2000,'2015-08-06 12:15:37',1,6,4,'2015-08-05 15:30:13','2015-08-05 15:30:13','55c34f675445d.jpg',0),(21,'tractor','great mech',1111,'2015-08-06 12:15:37',1,5,4,'2015-08-05 15:30:13','2015-08-05 15:30:13','55c34fcfa76ac.jpg',0),(23,'Something','lot of text text text text',500,'2015-08-06 12:12:43',1,9,3,NULL,NULL,'55c352c9bc578.jpg',500),(24,'Another MB','great MB for home use',200,'2015-08-01 12:12:43',1,9,2,NULL,NULL,'55c3509368263.jpg',200),(27,'world','world &amp; universe',80000,'2015-08-06 12:36:08',1,9,1,'2015-08-08 21:08:00',NULL,'55c354b873aed.jpg',80000);
/*!40000 ALTER TABLE `lot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lot_image`
--

DROP TABLE IF EXISTS `lot_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lot_image` (
  `id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  `src` varchar(255) DEFAULT NULL,
  `is_front` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lot_image`
--

LOCK TABLES `lot_image` WRITE;
/*!40000 ALTER TABLE `lot_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `lot_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_Name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update` timestamp NULL DEFAULT NULL,
  `isBan` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'user1 name','user1 surname','user1@email','1234',NULL,'777-77-77','2015-08-04 13:29:49','2015-08-03 09:40:31',0),(2,'user2 name','user2 surname','user2@email','1234',NULL,'888-88-88','2015-08-04 13:29:49','2015-08-03 09:41:06',0),(3,'user3 name','user3 surname','user3@email','1234',NULL,'444-44-44','2015-08-04 13:29:49','2015-08-03 09:41:41',0),(4,'user4 name','user4 surname','user4@email','1234',NULL,'333-33-33','2015-08-04 13:29:49','2015-08-03 09:41:55',0),(5,'user5 name','user5 surname','user5@email','1234',NULL,'222-22-22','2015-08-04 13:29:49','2015-08-03 09:42:10',0),(6,'php','student','php@st.com','1234',NULL,'111-11-11','2015-08-04 13:29:49','2015-08-04 13:29:49',0),(7,'leeroy','jenkins','lr@com','1234',NULL,'000-00-00','2015-08-04 13:29:49',NULL,0),(8,'UserName','UserSurname','user@name.com','e10adc3949ba59abbe56e057f20f883e','','+380(89)879-84-','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(9,'Gitpull','Gitpush','git@git.ru','e10adc3949ba59abbe56e057f20f883e','','+380(96)849-68-','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(10,'Mannn','Mannnnn','man@man.ru','e10adc3949ba59abbe56e057f20f883e','','+380(58)978-65-','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(11,'woman','womansur','woman@w.ru','e10adc3949ba59abbe56e057f20f883e','','+380(46)584-64-','0000-00-00 00:00:00','0000-00-00 00:00:00',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-06 15:38:25
