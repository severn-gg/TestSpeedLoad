-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: hdeskk
-- ------------------------------------------------------
-- Server version	8.0.37-0ubuntu0.22.04.3

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
-- Table structure for table `aktivis`
--

DROP TABLE IF EXISTS `aktivis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aktivis` (
  `aktivis_id` int NOT NULL AUTO_INCREMENT,
  `nia` varchar(45) DEFAULT NULL,
  `nama_aktivis` varchar(100) NOT NULL,
  `jk` varchar(12) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `asal` text,
  PRIMARY KEY (`aktivis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `area` (
  `area_id` int NOT NULL AUTO_INCREMENT,
  `nama_area` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cabang`
--

DROP TABLE IF EXISTS `cabang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cabang` (
  `cabang_id` int NOT NULL AUTO_INCREMENT,
  `nama_cabang` varchar(100) NOT NULL,
  `alamat_cabang` text,
  `area_id` int DEFAULT NULL,
  PRIMARY KEY (`cabang_id`),
  KEY `branch_office_ibfk_1_idx` (`area_id`),
  CONSTRAINT `cabang_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cabangaktivis`
--

DROP TABLE IF EXISTS `cabangaktivis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cabangaktivis` (
  `aktivis_id` int NOT NULL,
  `cabang_id` int NOT NULL,
  `start_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`aktivis_id`),
  KEY `cabang_id` (`cabang_id`),
  CONSTRAINT `cabangaktivis_ibfk_1` FOREIGN KEY (`aktivis_id`) REFERENCES `aktivis` (`aktivis_id`),
  CONSTRAINT `cabangaktivis_ibfk_2` FOREIGN KEY (`cabang_id`) REFERENCES `cabang` (`cabang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cabangaktivis_history`
--

DROP TABLE IF EXISTS `cabangaktivis_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cabangaktivis_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `aktivis_id` int NOT NULL,
  `cabang_id` int NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aktivis_id` (`aktivis_id`),
  KEY `cabang_id` (`cabang_id`),
  CONSTRAINT `cabangaktivis_history_ibfk_1` FOREIGN KEY (`aktivis_id`) REFERENCES `aktivis` (`aktivis_id`),
  CONSTRAINT `cabangaktivis_history_ibfk_2` FOREIGN KEY (`cabang_id`) REFERENCES `cabang` (`cabang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jabatan` (
  `jabatan_id` int NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(45) NOT NULL,
  PRIMARY KEY (`jabatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `jabatanaktivis`
--

DROP TABLE IF EXISTS `jabatanaktivis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jabatanaktivis` (
  `aktivis_id` int NOT NULL,
  `jabatan_id` int NOT NULL,
  `start_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`aktivis_id`),
  KEY `jabatan_id` (`jabatan_id`),
  CONSTRAINT `jabatanaktivis_ibfk_1` FOREIGN KEY (`aktivis_id`) REFERENCES `aktivis` (`aktivis_id`),
  CONSTRAINT `jabatanaktivis_ibfk_2` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `jabatanaktivis_history`
--

DROP TABLE IF EXISTS `jabatanaktivis_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jabatanaktivis_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `aktivis_id` int NOT NULL,
  `jabatan_id` int NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aktivis_id` (`aktivis_id`),
  KEY `jabatan_id` (`jabatan_id`),
  CONSTRAINT `jabatanaktivis_history_ibfk_1` FOREIGN KEY (`aktivis_id`) REFERENCES `aktivis` (`aktivis_id`),
  CONSTRAINT `jabatanaktivis_history_ibfk_2` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `komentar` (
  `komentar_id` int NOT NULL AUTO_INCREMENT,
  `tiket_id` int NOT NULL,
  `user_id` int NOT NULL,
  `komen` text NOT NULL,
  `tgl_komen` datetime NOT NULL,
  PRIMARY KEY (`komentar_id`),
  KEY `komentar_ibfk_1_idx` (`tiket_id`),
  KEY `komentar_ibfk_2_idx` (`user_id`),
  CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`tiket_id`) REFERENCES `tiket` (`tiket_id`),
  CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `login_view`
--

DROP TABLE IF EXISTS `login_view`;
/*!50001 DROP VIEW IF EXISTS `login_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `login_view` AS SELECT 
 1 AS `user_id`,
 1 AS `aktivis_id`,
 1 AS `nama_pengguna`,
 1 AS `username`,
 1 AS `active`,
 1 AS `password_hash`,
 1 AS `cabang_id`,
 1 AS `kantor`,
 1 AS `jabatan_id`,
 1 AS `posisi`,
 1 AS `namagroup_id`,
 1 AS `nama_group`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `pic`
--

DROP TABLE IF EXISTS `pic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pic` (
  `user_id` int DEFAULT NULL,
  `area_id` int DEFAULT NULL,
  KEY `pic_ibfk_2_idx` (`area_id`),
  KEY `pic_ibfk_1_idx` (`user_id`),
  CONSTRAINT `pic_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pic_ibfk_2` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tiket`
--

DROP TABLE IF EXISTS `tiket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tiket` (
  `tiket_id` int NOT NULL AUTO_INCREMENT,
  `aktivis_id` int NOT NULL,
  `cabang_id` int NOT NULL,
  `jabatan_id` int NOT NULL,
  `tiket_kategori` enum('Network','Software','Hardware','LKD','POLJAK') NOT NULL,
  `deskripsi` text NOT NULL,
  `aktivis_yg_salah` int NOT NULL,
  `file_document` varchar(255) DEFAULT NULL,
  `file_image` varchar(255) DEFAULT NULL,
  `status` enum('Open','In Progress','Resolved','Closed') NOT NULL DEFAULT 'Open',
  `tgl_input` datetime NOT NULL,
  `tgl_update` datetime DEFAULT NULL,
  PRIMARY KEY (`tiket_id`),
  KEY `tiket_ibfk_1_idx` (`aktivis_id`),
  KEY `tiket_ibfk_2_idx` (`cabang_id`),
  KEY `tiket_ibfk_3_idx` (`jabatan_id`),
  KEY `tiket_ibfk_4_idx` (`aktivis_yg_salah`),
  CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`aktivis_id`) REFERENCES `aktivis` (`aktivis_id`),
  CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`cabang_id`) REFERENCES `cabang` (`cabang_id`),
  CONSTRAINT `tiket_ibfk_3` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`),
  CONSTRAINT `tiket_ibfk_4` FOREIGN KEY (`aktivis_yg_salah`) REFERENCES `aktivis` (`aktivis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tugastiket`
--

DROP TABLE IF EXISTS `tugastiket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tugastiket` (
  `tugastiket_id` int NOT NULL AUTO_INCREMENT,
  `tiket_id` int NOT NULL,
  `tugaskan_ke` int NOT NULL,
  `tgl_penugasan` datetime NOT NULL,
  PRIMARY KEY (`tugastiket_id`),
  KEY `tugastiket_ibfk_1_idx` (`tiket_id`),
  KEY `tugastiket_ibfk_2_idx` (`tugaskan_ke`),
  CONSTRAINT `tugastiket_ibfk_1` FOREIGN KEY (`tiket_id`) REFERENCES `tiket` (`tiket_id`),
  CONSTRAINT `tugastiket_ibfk_2` FOREIGN KEY (`tugaskan_ke`) REFERENCES `user` (`aktivis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `aktivis_id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password_hash` varchar(100) NOT NULL,
  `active` int DEFAULT '1',
  `role_id` int NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_ibfk_1_idx` (`aktivis_id`),
  KEY `user_ibfk_2_idx` (`role_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`aktivis_id`) REFERENCES `aktivis` (`aktivis_id`),
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `view_tiket_details`
--

DROP TABLE IF EXISTS `view_tiket_details`;
/*!50001 DROP VIEW IF EXISTS `view_tiket_details`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_tiket_details` AS SELECT 
 1 AS `tiket_id`,
 1 AS `aktivis_id`,
 1 AS `nama_aktivis`,
 1 AS `nama_cabang`,
 1 AS `nama_jabatan`,
 1 AS `area_id`,
 1 AS `area`,
 1 AS `tiket_kategori`,
 1 AS `deskripsi`,
 1 AS `aktivis_id_salah`,
 1 AS `aktivis_yg_salah`,
 1 AS `file_document`,
 1 AS `file_image`,
 1 AS `status`,
 1 AS `tgl_input`,
 1 AS `tgl_update`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `login_view`
--

/*!50001 DROP VIEW IF EXISTS `login_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `login_view` AS select `user`.`user_id` AS `user_id`,`aktivis`.`aktivis_id` AS `aktivis_id`,`aktivis`.`nama_aktivis` AS `nama_pengguna`,`user`.`username` AS `username`,`user`.`active` AS `active`,`user`.`password_hash` AS `password_hash`,`cabang`.`cabang_id` AS `cabang_id`,`cabang`.`nama_cabang` AS `kantor`,`jabatan`.`jabatan_id` AS `jabatan_id`,`jabatan`.`nama_jabatan` AS `posisi`,`role`.`role_id` AS `namagroup_id`,`role`.`role_name` AS `nama_group` from ((((((`user` join `aktivis` on((`user`.`aktivis_id` = `aktivis`.`aktivis_id`))) join `jabatanaktivis` on((`aktivis`.`aktivis_id` = `jabatanaktivis`.`aktivis_id`))) join `jabatan` on((`jabatanaktivis`.`jabatan_id` = `jabatan`.`jabatan_id`))) join `cabangaktivis` on((`aktivis`.`aktivis_id` = `cabangaktivis`.`aktivis_id`))) join `cabang` on((`cabangaktivis`.`cabang_id` = `cabang`.`cabang_id`))) join `role` on((`user`.`role_id` = `role`.`role_id`))) where (`user`.`active` = 2) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_tiket_details`
--

/*!50001 DROP VIEW IF EXISTS `view_tiket_details`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_tiket_details` AS select `t`.`tiket_id` AS `tiket_id`,`t`.`aktivis_id` AS `aktivis_id`,`a`.`nama_aktivis` AS `nama_aktivis`,`c`.`nama_cabang` AS `nama_cabang`,`j`.`nama_jabatan` AS `nama_jabatan`,`ar`.`area_id` AS `area_id`,`ar`.`nama_area` AS `area`,`t`.`tiket_kategori` AS `tiket_kategori`,`t`.`deskripsi` AS `deskripsi`,`t`.`aktivis_yg_salah` AS `aktivis_id_salah`,`salah`.`nama_aktivis` AS `aktivis_yg_salah`,`t`.`file_document` AS `file_document`,`t`.`file_image` AS `file_image`,`t`.`status` AS `status`,`t`.`tgl_input` AS `tgl_input`,`t`.`tgl_update` AS `tgl_update` from (((((`tiket` `t` join `aktivis` `a` on((`t`.`aktivis_id` = `a`.`aktivis_id`))) left join (select `ca`.`aktivis_id` AS `aktivis_id`,group_concat(distinct `c`.`nama_cabang` order by `c`.`nama_cabang` ASC separator ', ') AS `nama_cabang` from (`cabangaktivis` `ca` join `cabang` `c` on((`ca`.`cabang_id` = `c`.`cabang_id`))) group by `ca`.`aktivis_id`) `c` on((`a`.`aktivis_id` = `c`.`aktivis_id`))) left join (select `ja`.`aktivis_id` AS `aktivis_id`,group_concat(distinct `j`.`nama_jabatan` order by `j`.`nama_jabatan` ASC separator ', ') AS `nama_jabatan` from (`jabatanaktivis` `ja` join `jabatan` `j` on((`ja`.`jabatan_id` = `j`.`jabatan_id`))) group by `ja`.`aktivis_id`) `j` on((`a`.`aktivis_id` = `j`.`aktivis_id`))) left join `area` `ar` on((`c`.`aktivis_id` = `ar`.`area_id`))) left join `aktivis` `salah` on((`t`.`aktivis_yg_salah` = `salah`.`aktivis_id`))) where (`t`.`status` = 'Open') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-01 12:42:45
