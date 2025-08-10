-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: task_manager
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(255) DEFAULT 'default.png',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Mansi','test@gmail.com','$2y$10$7GL3DNZ7JDIrtWXoAGGGHO2ueRmMmc7mkkH5PFLbV5m9HVeAy8Y.2','2025-07-28 10:23:59','nature.webp'),(4,'rohan','rohan@gmail.com','$2y$10$pyNHlKN5OoT1GWDKjuMUTOvBNWyFIVXfjJwB90So2p9TV7Qf.nHMC','2025-07-28 10:26:03','nature.webp'),(5,'mansu','mansu@gmail.com','$2y$10$f34NfsRT3AMmQX/FjiyP1uXnVqsFT13X0IIAqJSwipfZi8Dh3SwTm','2025-07-28 10:26:36','default.png'),(6,'mansi','mansi@gmail.com','$2y$10$y8Wi.RLp1im2jo5M5UoW.uVz0N243QfnM87G6Ieg7njtnshotYKg6','2025-07-28 11:02:07','photos.webp'),(7,'','','$2y$10$PG5acuZCgdXrry6OkLugneo6rlcroV3zs62sXo/UDqtiJcYdA43BG','2025-07-28 11:32:13','default.png'),(10,'mansuu','mansuu@gmail.com','$2y$10$8sv1jE/lmDAoCLaeNtPzIOz9pq3/4YC0kAHC1AH/uV6x14gofENpu','2025-07-28 12:17:26','nature.webp'),(17,'dee','dee@gmail.com','$2y$10$ljo88rJDETbYmLA9heQEsu1Zg603CYum2ZMzvfsAXgPUbEO.A0A.S','2025-07-28 14:20:35','photos.webp'),(18,'rohu','rohu@gmail.com','$2y$10$bfoxM7cXxrfAih5LO.4NEOMkYkw58XNPVV4HI3.UXALIlaFwinezW','2025-07-29 10:16:22','photos.webp'),(21,'r','ro@gmail.com','$2y$10$i4C2O0s.oW8asV6m/mwgQuuUBbwK9Lq3fy972F965pQfeqI0kLz56','2025-08-03 13:57:52','default.png');
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

-- Dump completed on 2025-08-11  0:13:55
