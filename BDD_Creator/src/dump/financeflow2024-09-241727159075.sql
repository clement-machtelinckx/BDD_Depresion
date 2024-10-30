-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: financeflow
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
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorie` (
  `id` int NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'default','default','white');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compte`
--

DROP TABLE IF EXISTS `compte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compte` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `compte_name` varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL,
  `description` text NOT NULL,
  `solde` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compte`
--

LOCK TABLES `compte` WRITE;
/*!40000 ALTER TABLE `compte` DISABLE KEYS */;
INSERT INTO `compte` VALUES (2,7,'epargneYazii','2023-11-27 14:14:15','',23200),(3,7,'compte courant ','2023-11-27 15:47:58','',13850),(4,8,'test2','2023-11-28 11:41:01','',970000),(15,10,'lolo_compte_courant','2023-11-30 11:23:06','',400),(21,11,'compte 1 lala','2023-11-30 14:03:34','',550),(22,7,'test','2023-11-30 14:09:28','',400),(24,5,'compte courant','2023-11-30 15:18:29','',540),(25,5,'epargne','2023-11-30 15:18:51','',200),(29,7,'test_graph','2023-12-01 11:37:00','',1400),(31,7,'tes compte bdd creator','2024-09-07 00:00:00','yoyoyoyo',10000),(32,23,'dqzd','2024-09-27 00:00:00','dzqd',2323);
/*!40000 ALTER TABLE `compte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaction` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_compte` int NOT NULL,
  `montant` int NOT NULL,
  `solde_time` int NOT NULL,
  `calculator` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` datetime NOT NULL,
  `id_cate` int NOT NULL,
  `testINT` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES (1,3,200,0,'addition','2023-11-28 15:34:04',1,NULL),(2,2,200,0,'addition','2023-11-28 15:34:34',1,NULL),(3,2,200,0,'addition','2023-11-28 15:37:38',1,NULL),(4,2,400,0,'addition','2023-11-28 15:37:54',1,NULL),(5,2,399,0,'addition','2023-11-28 15:39:24',1,NULL),(6,2,500,0,'addition','2023-11-28 15:45:43',1,NULL),(7,2,200,0,'soustraction','2023-11-28 15:46:23',1,NULL),(8,2,300,0,'addition','2023-11-28 15:46:47',1,NULL),(9,2,200,0,'soustraction','2023-11-28 15:47:18',1,NULL),(10,1,2000,0,'addition','2023-11-28 16:01:44',1,NULL),(11,3,100,0,'soustraction','2023-11-28 16:26:20',1,NULL),(12,3,1000,0,'addition','2023-11-28 16:26:35',1,NULL),(13,2,1,0,'addition','2023-11-28 16:34:24',1,NULL),(14,2,400,0,'addition','2023-11-28 16:34:29',1,NULL),(15,4,30000,0,'soustraction','2023-11-28 16:42:55',1,NULL),(16,3,200,0,'addition','2023-11-29 15:12:11',1,NULL),(17,3,400,0,'addition','2023-11-29 15:12:26',1,NULL),(18,3,200,0,'soustraction','2023-11-29 15:12:30',1,NULL),(19,15,200,0,'addition','2023-11-30 11:23:58',1,NULL),(20,3,200,0,'soustraction','2023-11-30 13:23:22',1,NULL),(21,3,200,0,'addition','2023-11-30 13:23:35',1,NULL),(22,2,200,0,'addition','2023-11-30 13:59:37',1,NULL),(23,21,400,0,'addition','2023-11-30 14:05:15',1,NULL),(24,21,50,0,'soustraction','2023-11-30 14:07:48',1,NULL),(25,22,200,0,'addition','2023-11-30 14:09:44',1,NULL),(26,3,200,2650,'addition','2023-11-30 15:02:51',1,NULL),(27,3,500,2850,'addition','2023-11-30 15:05:24',1,NULL),(28,3,500,3850,'addition','2023-11-30 15:06:54',1,NULL),(29,24,3000,3200,'addition','2023-11-30 15:19:13',1,NULL),(30,24,200,3000,'soustraction','2023-11-30 15:19:18',1,NULL),(31,24,400,2600,'soustraction','2023-11-30 15:19:21',1,NULL),(32,24,20,2580,'soustraction','2023-11-30 15:19:24',1,NULL),(33,24,30,2550,'soustraction','2023-11-30 15:19:28',1,NULL),(34,24,10,2540,'soustraction','2023-11-30 15:19:31',1,NULL),(35,24,100,2440,'soustraction','2023-11-30 15:19:34',1,NULL),(36,24,300,2140,'soustraction','2023-11-30 15:19:54',1,NULL),(37,24,1000,1140,'soustraction','2023-11-30 15:19:58',1,NULL),(38,2,20000,23200,'addition','2023-12-01 09:43:49',1,NULL),(39,28,300,30300,'addition','2023-12-01 09:59:17',1,NULL),(40,24,20000,21140,'addition','2023-12-01 10:51:59',1,NULL),(41,24,200,20940,'soustraction','2023-12-01 10:52:12',1,NULL),(42,24,2000,18940,'soustraction','2023-12-01 10:52:17',1,NULL),(43,24,4000,14940,'soustraction','2023-12-01 10:52:21',1,NULL),(44,24,14000,940,'soustraction','2023-12-01 10:52:59',1,NULL),(45,24,400,540,'soustraction','2023-12-01 11:31:37',1,NULL),(46,3,10000,13850,'addition','2023-12-01 11:32:33',1,NULL),(47,27,5000,25000,'soustraction','2023-12-01 11:35:43',1,NULL),(48,27,200,25200,'addition','2023-12-01 11:36:00',1,NULL),(49,28,20,30320,'addition','2023-12-01 11:36:23',1,NULL),(50,28,5000,25320,'soustraction','2023-12-01 11:36:28',1,NULL),(51,29,100,200,'addition','2023-12-01 11:37:27',1,NULL),(52,29,200,400,'addition','2023-12-01 11:37:30',1,NULL),(53,29,1000,1400,'addition','2023-12-01 11:37:34',1,NULL);
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'clement','clem@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),(7,'Yazii','yazii@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),(8,'clement','clement.machtelinckx@laplateforme.io','7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),(9,'test','test@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),(10,'lolo','lolo@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),(11,'lala','lala@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-24  8:24:35
