-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: 02yoyoyo
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dqzd`
--

DROP TABLE IF EXISTS `dqzd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dqzd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `testINT` int DEFAULT NULL,
  `dqzdq` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dqzd`
--

LOCK TABLES `dqzd` WRITE;
/*!40000 ALTER TABLE `dqzd` DISABLE KEYS */;
INSERT INTO `dqzd` VALUES (2,344222,'qdzqd'),(3,2323,'dzdzdz'),(5,23,'dzqd'),(6,100,'kokokoko');
/*!40000 ALTER TABLE `dqzd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dzqdqdqqq`
--

DROP TABLE IF EXISTS `dzqdqdqqq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dzqdqdqqq` (
  `id` int NOT NULL AUTO_INCREMENT,
  `testnotype` varchar(255) DEFAULT NULL,
  `fefeef` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dzqdqdqqq`
--

LOCK TABLES `dzqdqdqqq` WRITE;
/*!40000 ALTER TABLE `dzqdqdqqq` DISABLE KEYS */;
INSERT INTO `dzqdqdqqq` VALUES (1,'fefefeef','effeef'),(4,'dzzddz','dzdz'),(5,'dqzdq',NULL),(7,'dsefsf','fesfse');
/*!40000 ALTER TABLE `dzqdqdqqq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yoyoyoyo`
--

DROP TABLE IF EXISTS `yoyoyoyo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `yoyoyoyo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dqzd` varchar(255) DEFAULT NULL,
  `testINT` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yoyoyoyo`
--

LOCK TABLES `yoyoyoyo` WRITE;
/*!40000 ALTER TABLE `yoyoyoyo` DISABLE KEYS */;
INSERT INTO `yoyoyoyo` VALUES (1,'qdzqd',2323),(2,'qzdq',23),(3,'zeqze',23);
/*!40000 ALTER TABLE `yoyoyoyo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-24  9:17:05
