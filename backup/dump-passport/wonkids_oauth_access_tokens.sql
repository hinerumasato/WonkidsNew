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
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `client_id` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` VALUES ('01cb62d7247d5ee2b169fe6bf85b079472c3ce90eb8e14392704c68dd417440ccbb92e9cfdb36f00',52,'9b029b2c-fa9f-421e-bc27-4aa704abb5a1','wonkidsclub','[]',0,'2024-01-04 04:37:44','2024-01-04 04:37:44','2024-07-04 11:37:44'),('04151d02b52e328ad407e6d82a06c2816c50e3b2aef1a7092b624f71464a789576cb3c0a705f268a',50,'9b029b2c-fa9f-421e-bc27-4aa704abb5a1','wonkidsclub','[]',0,'2024-01-04 04:04:30','2024-01-04 04:04:30','2024-07-04 11:04:30'),('25629ce318e39dcc88f03a07ab45c9e1490363140e7bfb2cd42fbb879a5e067323f3d7e616a27639',28,'9b029b2c-fa9f-421e-bc27-4aa704abb5a1','wonkidsclub','[]',0,'2024-01-04 04:59:10','2024-01-04 04:59:10','2024-07-04 11:59:10'),('38d1f482dd18f1002dad8eb2124408323116ba744b3b0bc56d831bab41cf28cd4dbc451055b7c3de',28,'9b029b2c-fa9f-421e-bc27-4aa704abb5a1','wonkidsclub','[]',0,'2024-01-04 05:02:02','2024-01-04 05:02:02','2024-07-04 12:02:02'),('5421a65e07ed5ae8c7f23c6e738ee92765ce69001f225a5c2403dfbc2ba76cf6fc3be746dd2d7244',28,'9b014fa0-4b20-48c2-ad89-557084834539','wonkidsclub','[]',0,'2024-01-03 10:19:14','2024-01-03 10:19:14','2024-07-03 17:19:14'),('71df3885726267fb8a0ebc07137cbaef564a9ac82b214703f52957447d55e5564da4544c4ff75d3d',28,'9b029b2c-fa9f-421e-bc27-4aa704abb5a1','wonkidsclub','[]',0,'2024-01-04 00:56:01','2024-01-04 00:56:01','2024-07-04 07:56:01'),('7816f0989d14139e57281229be4f6bf30ac56cde0fbf9851ec98a63dad84eb712d819a2e40a6557f',28,'9b029b2c-fa9f-421e-bc27-4aa704abb5a1','wonkidsclub','[]',0,'2024-01-04 04:28:54','2024-01-04 04:28:54','2024-07-04 11:28:54'),('79f773e3b3fae9effa7bbf85adcd6a8c43ec2868c76cb0f0d38dd0a416d8234efda5dc24881948e1',28,'9b029b2c-fa9f-421e-bc27-4aa704abb5a1','wonkidsclub','[]',0,'2024-01-04 05:02:45','2024-01-04 05:02:45','2024-07-04 12:02:45'),('980bae0aec443b4c72599d01c7c663bddc32fc088e9f5eac7184f3ccd2dc50ba10418a9280b9eac4',49,'9b029b2c-fa9f-421e-bc27-4aa704abb5a1','wonkidsclub','[]',0,'2024-01-04 04:01:28','2024-01-04 04:01:28','2024-07-04 11:01:28'),('9fe77e0734696d86ba1ec261d8e64003fe5e858b59ba103472250eaf1e739c06053663d00cf9113e',28,'9b029b2c-fa9f-421e-bc27-4aa704abb5a1','wonkidsclub','[]',0,'2024-01-04 05:01:47','2024-01-04 05:01:47','2024-07-04 12:01:47'),('b75a81a37477e0d8e6aefe0a24715ebc204a55845ae419f236176a9bc96289ff7b08c04824177fa1',51,'9b029b2c-fa9f-421e-bc27-4aa704abb5a1','wonkidsclub','[]',0,'2024-01-04 04:06:57','2024-01-04 04:06:57','2024-07-04 11:06:57'),('dbb84140762438ecd7fa11a99b5de9de6ea67407ae9151209e9ea546ef5e8055fffaaea720d1f703',28,'9b014fa0-4b20-48c2-ad89-557084834539','wonkidsclub','[]',0,'2024-01-03 10:13:21','2024-01-03 10:13:21','2024-07-03 17:13:21');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-04 19:16:49
