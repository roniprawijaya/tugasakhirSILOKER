-- MySQL dump 10.19  Distrib 10.3.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: pj_masjid
-- ------------------------------------------------------
-- Server version	10.3.29-MariaDB-0ubuntu0.20.04.1

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
-- Table structure for table `infaq`
--

DROP TABLE IF EXISTS `infaq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `infaq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(200) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `total_infaq` double NOT NULL,
  `deskripsi` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` enum('menunggu_validasi','tidak_disetujui','disetujui') NOT NULL DEFAULT 'menunggu_validasi',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infaq`
--

LOCK TABLES `infaq` WRITE;
/*!40000 ALTER TABLE `infaq` DISABLE KEYS */;
INSERT INTO `infaq` VALUES (1,'Habibi','083873037477','habibijaelani05@gmail.com',1000,'sample ae','Screenshot_from_2021-06-20_20-46-47.png','menunggu_validasi','2021-06-20 18:45:03'),(2,'Habibi 2','083873037477','habibijaelani05@gmail.com',3000,'asdasd','Habibi_2.png','disetujui','2021-06-20 18:45:03'),(3,'Habibi 2','083873037477','habibijaelani05@gmail.com',3000,'asdasd','Habibi_21.png','tidak_disetujui','2021-06-20 18:45:03'),(4,'Habibi 2','083873037477','habibijaelani05@gmail.com',3000,'asdasd','Habibi_22.png','menunggu_validasi','2021-06-20 18:45:03'),(5,'Habibi 2','083873037477','habibijaelani05@gmail.com',3000,'asdasd','Habibi_23.png','tidak_disetujui','2021-06-20 18:45:03'),(6,'Habibi 5','083873037477','habibijaelani05@gmail.com',2000,'asdasd','Habibi_5.png','disetujui','2021-06-20 18:45:03');
/*!40000 ALTER TABLE `infaq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kegiatan`
--

DROP TABLE IF EXISTS `kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kegiatan`
--

LOCK TABLES `kegiatan` WRITE;
/*!40000 ALTER TABLE `kegiatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `single`
--

DROP TABLE IF EXISTS `single`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `single` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `image` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `type` enum('masjid','remaja_masjid','tentang_kami') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `single`
--

LOCK TABLES `single` WRITE;
/*!40000 ALTER TABLE `single` DISABLE KEYS */;
INSERT INTO `single` VALUES (1,'Sejarah Masjid','Screenshot_from_2021-04-15_22-57-10.png','<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>\r\n                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>\r\n                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>\r\n                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>\r\n                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>\r\n                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>\r\n                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>','masjid','2021-06-16 20:20:37'),(2,'Sejarah Remaja Masjid','Screenshot_from_2021-05-01_01-11-39.png','<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>\r\n                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>\r\n                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>\r\n                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>\r\n                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>\r\n                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>\r\n                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>','remaja_masjid','2021-06-16 20:20:37'),(3,'Tentang kami','Screenshot_from_2021-05-01_00-29-10.png','<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>\r\n                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>\r\n                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>\r\n                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>\r\n                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>\r\n                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>\r\n                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nesciunt molestiae, quos hic cupiditate obcaecati, quasi minus reprehenderit deserunt ipsum veniam dolores similique! Totam fugiat illo blanditiis possimus dolorem velit.</p>','tentang_kami','2021-06-16 20:20:37');
/*!40000 ALTER TABLE `single` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_number` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = not active, 1 = active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider`
--

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` VALUES (4,'sample slider 1','Lorem ipsum dolor sit, amet consectetur adipisicing elit.','Screenshot_from_2021-05-01_01-38-16.png','2021-06-16 19:34:00',1,1),(5,'Sample Slider 2','Lorem ipsum dolor sit, amet consectetur adipisicing elit.','Screenshot_from_2021-05-01_01-37-41.png','2021-06-16 19:34:25',2,1),(6,'Sample Slider 3','Lorem ipsum dolor sit, amet consectetur adipisicing elit.','Screenshot_from_2021-05-01_00-33-43.png','2021-06-16 19:34:45',3,1);
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sosmed`
--

DROP TABLE IF EXISTS `sosmed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sosmed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook` varchar(150) NOT NULL,
  `youtube` varchar(150) NOT NULL,
  `instagram` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sosmed`
--

LOCK TABLES `sosmed` WRITE;
/*!40000 ALTER TABLE `sosmed` DISABLE KEYS */;
INSERT INTO `sosmed` VALUES (1,'https://facebook.com','https://youtube.com','https://instagram.com');
/*!40000 ALTER TABLE `sosmed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'column role 1 = admin, 2 = member',
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Habibi Jaelani','habibi','habibi@gmail.com','01823',1,1,'$2y$10$KFWpaESvDTgqVeNLTEm4DewpLmVTvPam0thj0qv6HQWCbSmLd50gK'),(3,'habibi','bibi','habibijaelani05@gmail.com','083873037477',1,1,'$2y$10$asmJmWjQ/Na8//RAwnbSouUIf7.gAOKzb9JPS7Q0cYLqmfApYmlH.');
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

-- Dump completed on 2021-06-22 21:05:08
