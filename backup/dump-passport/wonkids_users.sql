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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `company` varchar(255) NOT NULL DEFAULT 'Wonkids Club',
  `designation` varchar(255) NOT NULL DEFAULT 'Member',
  `role_id` int unsigned NOT NULL DEFAULT '2',
  `church` varchar(255) NOT NULL,
  `birth_year` int NOT NULL DEFAULT '1900',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `fk_users_role1_idx` (`role_id`),
  CONSTRAINT `fk_users_role1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (28,'Trần Thắng Lợi','thangloitran406@gmail.com','2023-06-10 03:12:05','$2y$10$tkbqTgTrDQFu48fw8705Cea7ZQBv7FeNQHu8f5qt0z5uFCpw9jVHq',NULL,'2023-06-10 03:11:38','2023-07-17 03:42:24','https://wonkidsclub.net/uploads/avatars/53af9f21-2080-408b-8126-2f4de009396a.jpg','Trần','Thắng Lợi','0879603547','Wonkids Club','Admin',1,'HTTL Thị Nghè',2003),(47,'WONKIDS CLUB','wonkidsclub20@gmail.com','2023-07-17 02:04:10','$2y$10$.FzmRW/bziMkXyFCjV50vOdKDzvQBMq4JqMIcVLZ71iG0k1LuibDi','reqh7n27BIyGeSeBWp0ftU7IeDU67Tic2jPmWeS4SlQjamVkPjVPGkhZVDpv','2023-07-17 02:03:46','2023-07-17 02:04:10','https://wonkidsclub.net/imgs/avatar/default_avatar.png',NULL,NULL,NULL,'Wonkids Club','Member',1,'HTTL Nha Trang',1900),(52,'Trần Thắng Lợi','21130263@st.hcmuaf.edu.vn',NULL,'$2y$10$hD87hxPOmm7hwfZEd9jqcemxy9YFAtLXjSOk7BEP3C9uzrIusbZl2',NULL,'2024-01-04 04:37:44','2024-01-04 04:37:44',NULL,NULL,NULL,NULL,'Wonkids Club','Member',2,'HTTL Thị Nghè',2003);
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

-- Dump completed on 2024-01-04 19:16:49
