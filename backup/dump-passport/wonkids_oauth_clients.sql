-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: wonkids
-- ------------------------------------------------------
-- Server version	8.0.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_clients` (
  `id` char(36) NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES ('9b014f8d-23dd-41be-811b-61793f1fa404',NULL,'Laravel Personal Access Client','iad9hHMHl18Pq9EYsksjZ23nL2uVy9NcGZgbDRWB',NULL,'http://localhost',1,0,0,'2024-01-03 09:28:39','2024-01-03 09:28:39'),('9b014f8d-3e6c-44a9-bc7c-2a38705bb0c8',NULL,'Laravel Password Grant Client','eGquD3USCu7a72798GZnUQhLHWChWUhKwC7D8nDo','users','http://localhost',0,1,0,'2024-01-03 09:28:39','2024-01-03 09:28:39'),('9b014fa0-4b20-48c2-ad89-557084834539',NULL,'Laravel Personal Access Client','NLgtnJrnrMYaSfyaYWszp7YDkz7n6lmCge9LbrA9',NULL,'http://localhost',1,0,0,'2024-01-03 09:28:51','2024-01-03 09:28:51'),('9b014fa0-5195-418f-8928-638bbdd9f713',NULL,'Laravel Password Grant Client','pwk9gLO9bRCuArCzOJdRHuinUeCmPoLoH6fhnwuJ','users','http://localhost',0,1,0,'2024-01-03 09:28:51','2024-01-03 09:28:51'),('9b029b2c-fa9f-421e-bc27-4aa704abb5a1',NULL,'Laravel Personal Access Client','UtGYoT3lgtJv6fdf4bwSXpy3zuQl7QstFEe2UAWw',NULL,'http://localhost',1,0,0,'2024-01-04 00:55:56','2024-01-04 00:55:56'),('9b029b2d-0d34-48cf-a1f3-9e893f9c5d03',NULL,'Laravel Password Grant Client','EyiLL6sDaBX5vPG9YhUtfFT39AEAduRDrR4JuPrq','users','http://localhost',0,1,0,'2024-01-04 00:55:56','2024-01-04 00:55:56');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-04 19:16:50
