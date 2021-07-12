-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: frenchbulldog
-- ------------------------------------------------------
-- Server version	8.0.25-0ubuntu0.20.04.1

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
-- Current Database: `frenchbulldog`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `frenchbulldog` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `frenchbulldog`;

--
-- Table structure for table `advertisements`
--

DROP TABLE IF EXISTS `advertisements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `advertisements` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(2083) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertisements`
--

LOCK TABLES `advertisements` WRITE;
/*!40000 ALTER TABLE `advertisements` DISABLE KEYS */;
/*!40000 ALTER TABLE `advertisements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `breeder__supplies`
--

DROP TABLE IF EXISTS `breeder__supplies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `breeder__supplies` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `logo` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_url` varchar(2083) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_amount` int NOT NULL,
  `price_currency` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FB392A23A76ED395` (`user_id`),
  CONSTRAINT `fk_breeder__supplies_user_id_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `breeder__supplies`
--

LOCK TABLES `breeder__supplies` WRITE;
/*!40000 ALTER TABLE `breeder__supplies` DISABLE KEYS */;
/*!40000 ALTER TABLE `breeder__supplies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `canine__genetics`
--

DROP TABLE IF EXISTS `canine__genetics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `canine__genetics` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `logo` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_url` varchar(2083) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_amount` int NOT NULL,
  `price_currency` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_88C8B34BA76ED395` (`user_id`),
  CONSTRAINT `fk_canine__genetics_user_id_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `canine__genetics`
--

LOCK TABLES `canine__genetics` WRITE;
/*!40000 ALTER TABLE `canine__genetics` DISABLE KEYS */;
/*!40000 ALTER TABLE `canine__genetics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `canine__nutritions`
--

DROP TABLE IF EXISTS `canine__nutritions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `canine__nutritions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `logo` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_url` varchar(2083) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_amount` int NOT NULL,
  `price_currency` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7020967EA76ED395` (`user_id`),
  CONSTRAINT `fk_canine__nutritions_user_id_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `canine__nutritions`
--

LOCK TABLES `canine__nutritions` WRITE;
/*!40000 ALTER TABLE `canine__nutritions` DISABLE KEYS */;
/*!40000 ALTER TABLE `canine__nutritions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dms_analytics`
--

DROP TABLE IF EXISTS `dms_analytics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dms_analytics` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `driver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dms_analytics`
--

LOCK TABLES `dms_analytics` WRITE;
/*!40000 ALTER TABLE `dms_analytics` DISABLE KEYS */;
/*!40000 ALTER TABLE `dms_analytics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dms_password_resets`
--

DROP TABLE IF EXISTS `dms_password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dms_password_resets` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dms_password_resets_token_unique_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dms_password_resets`
--

LOCK TABLES `dms_password_resets` WRITE;
/*!40000 ALTER TABLE `dms_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `dms_password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dms_permissions`
--

DROP TABLE IF EXISTS `dms_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dms_permissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2B0D74A1D60322AC` (`role_id`),
  CONSTRAINT `fk_dms_permissions_role_id_dms_roles` FOREIGN KEY (`role_id`) REFERENCES `dms_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dms_permissions`
--

LOCK TABLES `dms_permissions` WRITE;
/*!40000 ALTER TABLE `dms_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `dms_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dms_roles`
--

DROP TABLE IF EXISTS `dms_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dms_roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dms_roles`
--

LOCK TABLES `dms_roles` WRITE;
/*!40000 ALTER TABLE `dms_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `dms_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dms_temp_files`
--

DROP TABLE IF EXISTS `dms_temp_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dms_temp_files` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('uploaded-image','uploaded-file','stored-image','in-memory','stored-file') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:CustomEnum__uploaded_image__uploaded_file__stored_image__in_memory__stored_file)',
  `expiry_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dms_temp_files_token_unique_index` (`token`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dms_temp_files`
--

LOCK TABLES `dms_temp_files` WRITE;
/*!40000 ALTER TABLE `dms_temp_files` DISABLE KEYS */;
INSERT INTO `dms_temp_files` VALUES (1,'3KLeyYxJvISlj9l2khalF7GqkJeCYUqeol6x3hbI','/home/vagrant/LaravelProjects/frenchbulldog/public/app/breeder/yellowdog-e1504271554119.png',NULL,'stored-image','2021-05-28 07:33:26'),(2,'wB3tpyL6FNGFiW9NCcUT30PlrfgdHIXQhBYCR5RH','/home/vagrant/LaravelProjects/frenchbulldog/public/app/breeder/yellowdog-e1504271554119.png',NULL,'stored-image','2021-05-28 07:33:32'),(3,'fZgrrUvYdDXD6vRmbGxO2rU1U7lrXrbglu0qWlAy','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/qWxU0ICDexQjkjI9k3BjhiFRKwMBcsOv','download.jpg','stored-image','2021-05-28 08:38:38'),(4,'SB1jqu0XLYTkfpEmsiEamjw2rYNll52TPATzSgcp','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/dGztLJBpVfzO0GZznIdjAh63wXKxlHXr','pawsdogbows-e1504292412801.jpg','stored-image','2021-05-28 08:38:44'),(5,'cLDDAlX1mTuDpdv1Ihn7zWMbixfMxqhiRXxapyYx','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/koDbA8BcwF5uwMeV','download.jpg','stored-image','2021-05-28 08:38:46'),(6,'914ewBHLpPbxUF4i88KO1bW6p8q3jXeRCEsdBWrw','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/8ho9oYPzPK3JW5BD','pawsdogbows-e1504292412801.jpg','stored-image','2021-05-28 08:38:46'),(7,'AuT2cosWDFf9NYPfLhmrr1TVbsj6NAlvO9Y8wxCh','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/koDbA8BcwF5uwMeV','download.jpg','stored-image','2021-05-28 08:39:02'),(8,'MQGL6myIrIekpEu4Zd3FuiAwR3yrSsa2RkHQROr6','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/8ho9oYPzPK3JW5BD','pawsdogbows-e1504292412801.jpg','stored-image','2021-05-28 08:39:02'),(9,'U6JlnYtNmmsv3qZ2MGTM66GTgICIbi6o1yXHTcPb','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/koDbA8BcwF5uwMeV','download.jpg','stored-image','2021-05-28 08:39:25'),(10,'N94bXz53GY9KUixnidJv7pa2hEZoJwxLzgcn2sx0','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/8ho9oYPzPK3JW5BD','pawsdogbows-e1504292412801.jpg','stored-image','2021-05-28 08:39:25'),(11,'pbsLdtZ30gH8ubdZYyqdM6tvTVPymNVSnRBKMPZk','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/AC7gzYwK4cw0c4BFRCAsHFL5vKpcWO4H','download (1).jpg','stored-image','2021-05-28 08:39:40'),(12,'X05oKojMPwa89dsJCZP9Z3PukEs9KoCtaD0YQ3Vm','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/xHBcjg11mbgP6NMlg7kDpgB75oFEazUU','yellowdog-e1504271554119.png','stored-image','2021-05-28 08:39:47'),(13,'AerDROREvWDBSSNgqQXx95VnAFTdaFqOha7EiLB6','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/8dhpaupyIGGKJlzB','download (1).jpg','stored-image','2021-05-28 08:39:48'),(14,'VqN34j8GudpXyUWzFhin5RmWc1KMfjfIPNliuVGi','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/tMZGAQCS3qeZMIHP','yellowdog-e1504271554119.png','stored-image','2021-05-28 08:39:48'),(15,'MZ9s5Kt0e5dCxvoP7Q2xVbCa0k4MP6pJMB3QMabn','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/WfuT6bXGXH8oQNZ2fPOieqgywG0Ji1Br','download (2).jpg','stored-image','2021-05-28 08:40:05'),(16,'vC8Ns9bgfc1AXkrY4VOqtBLTFAYNRqGuXqAsfti3','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/vm4dp7umIRs8bihEd4wPo3csxKEYGoVp','yogacorgi.jpg','stored-image','2021-05-28 08:40:12'),(17,'8LPwFW7E20LoRt65ncuczLot1uSLppW3zKUc6qG6','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/HpjwCSpBjwWHOxYN','download (2).jpg','stored-image','2021-05-28 08:40:16'),(18,'pfBKf8LQwFtXyDnAeilC2IC087B3D2ZHx5decuDi','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/g6ttrRCVD1MCU4Ct','yogacorgi.jpg','stored-image','2021-05-28 08:40:16'),(19,'xI6wL3NxrR4RA5Rx1Sx3dRKOZgBNB3fpAJR4w2kG','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/xkZffqW8sOqobHyRvvzOOK5SPzdJ4lP0','young-adult-profile-picture-red-260nw-1655747050.jpg','stored-image','2021-05-28 08:40:33'),(20,'adXkNjwCRUAG3b4bbIdaYFQVX4oHIurBVKftHqNc','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/i3B3AsxxBGn2iZbQYc2BnKXTerFHN3H4','doggievalet-e1504271420512.jpg','stored-image','2021-05-28 08:40:37'),(21,'6ozo6Avz2DAIH6df3XUsmw3odYdtnPvGabNshQt9','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/rsyqsXQ8MRzSJoQt','young-adult-profile-picture-red-260nw-1655747050.jpg','stored-image','2021-05-28 08:40:39'),(22,'XSfKTVM0lMCFNIjP5zX3htChZs8cVaSMcjtTlDEW','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/8Gn5kcISFwV6K9rs','doggievalet-e1504271420512.jpg','stored-image','2021-05-28 08:40:39'),(23,'iFrd8V3ieiVZofvwx88Cu1HdFTXnhPDShU3aKY5g','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/ItsaWltmGNxPnd8b1HQKsgRVrNUSjuUP','01-shutterstock_476340928-Irina-Bg.jpg','stored-image','2021-05-28 08:40:56'),(24,'1P2mHquyY5CgGWt6YXfyhaqMvFK7PU8wbnf4tvxe','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/eUxhAZSsS5VVolo6qLrW1eXdVarJ0kro','animodel-e1504271481599.png','stored-image','2021-05-28 08:40:58'),(25,'byyD8uBVrjzfaNy9CX4UP71hQ1tHB2O7nAL6ClaK','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/W2OORsAfSBp4EjyA','01-shutterstock_476340928-Irina-Bg.jpg','stored-image','2021-05-28 08:41:00'),(26,'oAv24hTjshX4bm4i2OgR1uLuTIriSl64NMfLsPrN','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/uKPOgFOZaA46FPv0','animodel-e1504271481599.png','stored-image','2021-05-28 08:41:00'),(27,'O5sJnhTRDnkVhjhZ15J8l5lIY6lYJgAvAJEe3ZI3','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/HpjwCSpBjwWHOxYN','download (2).jpg','stored-image','2021-05-28 08:41:10'),(28,'DbL14EsQYv4t5MiSzSR7Yi7q41FcP75Ble6OmK81','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/g6ttrRCVD1MCU4Ct','yogacorgi.jpg','stored-image','2021-05-28 08:41:10'),(29,'FDy0bVkLV7F6Ucd4iebjErEyvn4vhtRpAODYLn6A','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/HpjwCSpBjwWHOxYN','download (2).jpg','stored-image','2021-05-28 08:41:18'),(30,'B0XhrOO20wxyIl7nLM4EL4T5Fplqi0csZijTu8iE','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/g6ttrRCVD1MCU4Ct','yogacorgi.jpg','stored-image','2021-05-28 08:41:18'),(31,'E8MCY7A96UypNmz2kAQIgFPXt5x0qmgml1BxvuWa','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/rsyqsXQ8MRzSJoQt','young-adult-profile-picture-red-260nw-1655747050.jpg','stored-image','2021-05-28 08:41:30'),(32,'8SCjSAs2PREFQjZQvc9gFoCyKKjyD0Grqr4xg598','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/8Gn5kcISFwV6K9rs','doggievalet-e1504271420512.jpg','stored-image','2021-05-28 08:41:30'),(33,'v9acBj8NTNpKjPgOURUAPoVwjRvsYBdlLqrDV3hl','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/rsyqsXQ8MRzSJoQt','young-adult-profile-picture-red-260nw-1655747050.jpg','stored-image','2021-05-28 08:41:35'),(34,'4ULJ6v85IaVlhnKvuYSJ5IE1ppTLEu96ihoxUsIZ','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/8Gn5kcISFwV6K9rs','doggievalet-e1504271420512.jpg','stored-image','2021-05-28 08:41:35'),(35,'my6SAK4OuBctnkC4gK9VmQoKwNrxjMKfir2L92Ve','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/koDbA8BcwF5uwMeV','download.jpg','stored-image','2021-05-28 08:41:38'),(36,'P9MfcDFk8OvL1VIM0sdbKiCgATRvkGwlgWwmfuS2','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/8ho9oYPzPK3JW5BD','pawsdogbows-e1504292412801.jpg','stored-image','2021-05-28 08:41:38'),(37,'JyAGcObvXKm3os3z3hWNDiTmvzcYRBLm8w85i9DP','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/koDbA8BcwF5uwMeV','download.jpg','stored-image','2021-05-28 08:41:43'),(38,'eeF5CpBsR8bZzHPjRydfSfosX8tf4akb1HtziuTA','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/8ho9oYPzPK3JW5BD','pawsdogbows-e1504292412801.jpg','stored-image','2021-05-28 08:41:43'),(39,'XXH0sjlDZL6KBIoidzaoLweQ4Vj7ap1ddbaQAJ9r','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/XKuk49uqEUf79EmdwEC5yHjlcVIia8Bp','01-shutterstock_476340928-Irina-Bg.jpg','stored-image','2021-05-28 08:43:02'),(40,'1Nge0Xtjh4KDOC4KCynJXntgYnaMz9hJFDvBzLik','/home/vagrant/LaravelProjects/frenchbulldog/public/app/users/Tx3kmrtYKazlj7b7','01-shutterstock_476340928-Irina-Bg.jpg','stored-image','2021-05-28 08:43:21'),(41,'zFWO8bw3k3flK35i7DXP0kIneLsvt76IbuBFRyML','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/isN5un8JUyV2jBBtsF5Dkd7fDWulZh8k','187264306_3762127890577260_2475796096909161162_n.jpg','stored-image','2021-05-28 10:42:24'),(42,'6q4pM7HmGhf7GuiewDRpNBqLanCwFSKZsMA9Rr72','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/SloS6kFWRKnB8m2vcgm98pNbfxwqYsgQ','170781970_2433058536839674_4317589670987869052_n.jpg','stored-image','2021-05-28 10:42:28'),(43,'ewsQS7HDcLZ06j6BeOEk0QrDRDP3WHxzc1PZlxKB','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/WN92ghGN3Py1oC0yVNIkZNLg6C07IaF8','174079066_1947172448763176_5597061415940140866_n.jpg','stored-image','2021-05-28 10:42:31'),(44,'icegMMxzgPYl4GK1aM74q7uFtyaWNL5onINY0P1J','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/fiojhzi4dWEMpOQizRIy29BmUX01Gatt','174601183_853186432213404_6231598317047973055_n.jpg','stored-image','2021-05-28 10:42:34'),(45,'vwRHRq7VYX9Ublav8CudbyjzbVXHyAbS7zNsZS0n','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/7ufTaZAALIAN7JAVsAzNspWTyEtdFHJq','190854110_801236810533960_2693887204435213639_n.jpg','stored-image','2021-05-28 10:42:37'),(46,'5HwlYw5hZRsDYXM103xcl91RaldCHvBLaTQVUuFK','/home/vagrant/LaravelProjects/frenchbulldog/public/app/listings/M2KYZTQuxEfOv3Dm','187264306_3762127890577260_2475796096909161162_n.jpg','stored-image','2021-05-28 10:42:53'),(47,'4SyzfG7QpS8RrEDQYrYmimMwZS9l7wuGBnNe8p34','/home/vagrant/LaravelProjects/frenchbulldog/public/app/listings/nUuWN143f1kt1e7i','170781970_2433058536839674_4317589670987869052_n.jpg','stored-image','2021-05-28 10:42:53'),(48,'msOn4Dj7c112mKVMxQb5YY5xKitAbocJnRE1vnxo','/home/vagrant/LaravelProjects/frenchbulldog/public/app/listings/d58wBEJjg06cr3LC','174079066_1947172448763176_5597061415940140866_n.jpg','stored-image','2021-05-28 10:42:53'),(49,'swhsbyHYPwJPRDjlTWx7RAThOlBo7dGS9t1gc5cS','/home/vagrant/LaravelProjects/frenchbulldog/public/app/listings/7DyC3s9ra1BoG9lj','174601183_853186432213404_6231598317047973055_n.jpg','stored-image','2021-05-28 10:42:53'),(50,'diEiK8EcwqbQkr58luZcZ28FKPexqQkrpdesi75Z','/home/vagrant/LaravelProjects/frenchbulldog/public/app/listings/Ead8mjU7q6eV0Xf9','190854110_801236810533960_2693887204435213639_n.jpg','stored-image','2021-05-28 10:42:53'),(51,'4XVxu4GQ3xIsnjGVICZ5mn47Cwwb7Ej6BIWBfil2','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/HIGQUIniP8XS6Ivyu5wRm3c1iVj3x8G3','102724368_889084914928173_3876202533887300474_n.jpg','stored-image','2021-05-28 10:43:37'),(52,'FXm7H776OB9gZIuEubf2NWtIfUmgnrYrUMoenjFH','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/sIYkDFVKc06MtURG0vb0PzZvw4yNy3Qb','192446113_951255912294865_1046922462139408151_n.jpg','stored-image','2021-05-28 10:43:53'),(53,'mmCULaUO6YbM3UK9MzLFzWVJUvpR1tX6MQlt2pOz','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/dkQVNmPJJZYC4gC3faaSAO5G5JnuVt1I','193333298_303347981519985_5098649944386364653_n.jpg','stored-image','2021-05-28 10:43:57'),(54,'X2hySiMY3t66g6Re1tIyUqmLg16NFeAOgWIoR4Ge','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/slSfYH6UDQCKr3yhkeXFimEh0vxBVVpl','102724368_889084914928173_3876202533887300474_n.jpg','stored-image','2021-05-28 10:44:00'),(55,'bVQEKOvl2qBCKiskvrcnfiij1tzY5q0ogisnKgBB','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/I2uQNy7nUpGn9FEaWOrIsDdKUN3Q8cpa','137592508_232486101832711_6263543293157143704_n.jpg','stored-image','2021-05-28 10:44:04'),(56,'aFw0RRpvZBpjlFhCb8zDVN9HgF3WrHgUDgmBrTR8','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/WgwEg9NoWNAdWwPopZMbHXGZupjD73Vi','192780833_900159477216195_4590967146185546293_n.jpg','stored-image','2021-05-28 10:44:10'),(57,'bPwb5rTuafCuEcVXk1p8xUI1gGLFDIFRy9c1OzBb','/home/vagrant/LaravelProjects/frenchbulldog/public/app/listings/zAIMka0uPmLXNH2h','192446113_951255912294865_1046922462139408151_n.jpg','stored-image','2021-05-28 10:44:23'),(58,'ZIvnA5nYaRrfub5nayyvFWI1kpbFyHILr3FHplYh','/home/vagrant/LaravelProjects/frenchbulldog/public/app/listings/EaoplTE691GPHom0','193333298_303347981519985_5098649944386364653_n.jpg','stored-image','2021-05-28 10:44:23'),(59,'yCHQXJPS5q4RQVykJXcq8OFzJiJbqTVmZFkY1m6I','/home/vagrant/LaravelProjects/frenchbulldog/public/app/listings/eACZHvqorQJhsa70','102724368_889084914928173_3876202533887300474_n.jpg','stored-image','2021-05-28 10:44:23'),(60,'gMBfR995D0WDNDnr3rdmklNUkpN01jBYhzmcCqmu','/home/vagrant/LaravelProjects/frenchbulldog/public/app/listings/0cIPCLFN69J5PkVf','137592508_232486101832711_6263543293157143704_n.jpg','stored-image','2021-05-28 10:44:23'),(61,'l7ePOqN0OSln03W3WFGzVUNqPMC2lOVgN9W74Gqb','/home/vagrant/LaravelProjects/frenchbulldog/public/app/listings/np3njWtnQ4PYQKGR','192780833_900159477216195_4590967146185546293_n.jpg','stored-image','2021-05-28 10:44:23'),(62,'CBDczwX5ijMc4mhUrjEqFV7g2qgVsNgeKSypIAkk','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/vs024hUVe3g9tTTh7u9rIaaE0zS8Q1fK','45392130_203270327231829_4502731356800680184_n (1).jpg','stored-image','2021-05-28 11:19:52'),(63,'5neV9LHHMGl1RaYghHSA95pSE31mpalj1YmmKqBl','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/8eHDXXHCMruYBp2bB33n7Wewhus8vQMN','192277308_315394633410913_2229865842920665435_n.jpg','stored-image','2021-05-28 11:20:06'),(64,'vBA8VG0ilrPsjmakoQU5rBKAPXkiOvc4sXcPfUp1','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/pEHa6Zk7a0GDirin7Rv51Ye83fELdWlf','102724368_889084914928173_3876202533887300474_n.jpg','stored-image','2021-05-28 11:20:11'),(65,'NxbYnU9v9icQq3ZBFPF3rqNqsiOMO4S69TkpEG42','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/ULed2kgLBZFBxLXiWRxR8IGcgcQ4dryl','192780833_900159477216195_4590967146185546293_n.jpg','stored-image','2021-05-28 11:20:15'),(66,'NDo6Kc56NBstNVn2M8ySkfXXxp72CMdX5Mudibg3','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/m2FtNbQ2Cb6XEd3xo3qEOpyxGakBms0b','192277308_315394633410913_2229865842920665435_n.jpg','stored-image','2021-05-28 11:20:19'),(67,'1uc5yEKhnA6ogWJr0w8H2zWWHzRftKdQwa45tFOo','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/btXzGxUG9xSZvLghBWTIEXPm77KL28vd','191881644_192424902750522_6045676364786490627_n.jpg','stored-image','2021-05-28 11:20:27'),(68,'vthI8RqvclnBvAcZyBVy60nWjEFU9zv8uYudtRmX','/home/vagrant/LaravelProjects/frenchbulldog/public/app/litters/FzsgbxTRYJW8Vksn','45392130_203270327231829_4502731356800680184_n (1).jpg','stored-image','2021-05-28 11:20:55'),(69,'CwPYYAZU2iFIEWo5adNLLVpNkay44ZCjJ1Aswq0c','/home/vagrant/LaravelProjects/frenchbulldog/public/app/litters/C0SxlCISTsbzQ9Ep','192277308_315394633410913_2229865842920665435_n.jpg','stored-image','2021-05-28 11:20:55'),(70,'fCqZvtawM3v5jYcSXSFB0b54W1gWXq8dRHl35gDH','/home/vagrant/LaravelProjects/frenchbulldog/public/app/litters/kPf7BTuWFkmAC6Ky','102724368_889084914928173_3876202533887300474_n.jpg','stored-image','2021-05-28 11:20:55'),(71,'4CI4UYBwWV4ZcLeHbE4JEdh8va7jSp1fGEFdI1L3','/home/vagrant/LaravelProjects/frenchbulldog/public/app/litters/69hlOkQJ1pW0yU6b','192780833_900159477216195_4590967146185546293_n.jpg','stored-image','2021-05-28 11:20:55'),(72,'oFKa3DxrFYDWgnOAN2awIBgkJtjTbjBcbK2RXbBV','/home/vagrant/LaravelProjects/frenchbulldog/public/app/litters/NV4ZAjjOfI3hT2mi','191881644_192424902750522_6045676364786490627_n.jpg','stored-image','2021-05-28 11:20:55'),(73,'HjbZK8y5G7iQQscN2Zi2i8sKbo0kY4JtvTo3p99k','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/Qakd3ZfFVscvxq9d4KwjNpiztE3YmAeL','104418523_583669569254843_4824895328038013540_n.jpg','stored-image','2021-05-28 11:21:35'),(74,'C8yrvkjTCHyjMhfRIXJNgcqEIDM8Vpaponib1lVe','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/OTogoSRZq6xM7KKZQlZmIJFFRlThqBg7','118919417_767032770783947_1737678115861413124_n.jpg','stored-image','2021-05-28 11:21:38'),(75,'teAFpkapyVvpF02lt9gXVATFJdf0Sjl4RcolmVfR','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/rcrXlVRIUH4hCKUDigP2Btk6GAM5z1l8','131887977_223146389378705_7545877018241534003_n.jpg','stored-image','2021-05-28 11:21:43'),(76,'Y11VDrNe99SjTd0Z2FnUuauG1d4YB5Bzd4lLx9BC','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/YLQeShWeMwO7il910vVklzkoAxrn5z4Q','118919417_767032770783947_1737678115861413124_n.jpg','stored-image','2021-05-28 11:21:46'),(77,'zknKVOq4mvhPQsQbyoMKKCohhMEHb0L6vCtlmqYp','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/kU3wrFw2NcJB6vCwIdcTEVFNEOflGs9r','118231882_1076639996072570_1439690117584958695_n.jpg','stored-image','2021-05-28 11:21:48'),(78,'ev2ht5f6uR3wUEwNC1RoVYd1dnBvOZo5MFIjyhY1','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/sC37lXiycZreynCawEeXgUsPHcLfA9Ed','107046316_1956240304509708_883610413323006256_n.jpg','stored-image','2021-05-28 11:21:51'),(79,'g5fTXYn2rjj66a2dtOBeWjFQh28X2wApxmDQXMt1','/home/vagrant/LaravelProjects/frenchbulldog/storage/dms/temp-uploads/Tq2UOuqIAGTf7SQ8Cvpu5NyJpJI6aug8','104418523_583669569254843_4824895328038013540_n.jpg','stored-image','2021-05-28 11:21:54'),(80,'O68c00S5RCUs9Qj316c2lx2THipKYrqk08Yrjalt','/home/vagrant/LaravelProjects/frenchbulldog/public/app/litters/f8qnjrHy5C0LuuW1','131887977_223146389378705_7545877018241534003_n.jpg','stored-image','2021-05-28 11:21:59'),(81,'M4R1J1H2yS7l4rJZwnIK7YACPt1txIdcfUrnaN3a','/home/vagrant/LaravelProjects/frenchbulldog/public/app/litters/Cxm2GYbB24qSRqYg','118919417_767032770783947_1737678115861413124_n.jpg','stored-image','2021-05-28 11:21:59'),(82,'MjKwcSgqFlUhP15EwZXwmkuz1jPuNf9aNBdcCeCc','/home/vagrant/LaravelProjects/frenchbulldog/public/app/litters/T7BG4h5U682FLwxa','118231882_1076639996072570_1439690117584958695_n.jpg','stored-image','2021-05-28 11:21:59'),(83,'JJNDfujpYqW8iAJXC5iHbslfC8FXFkylefHHOMkn','/home/vagrant/LaravelProjects/frenchbulldog/public/app/litters/ReExXoZWkKsFgiog','107046316_1956240304509708_883610413323006256_n.jpg','stored-image','2021-05-28 11:21:59'),(84,'pfDZWTN0Np4fokR1eGmBdULyCkmEKK5WqmoK3po8','/home/vagrant/LaravelProjects/frenchbulldog/public/app/litters/kkuuVMzoRQuQUrIQ','104418523_583669569254843_4824895328038013540_n.jpg','stored-image','2021-05-28 11:21:59');
/*!40000 ALTER TABLE `dms_temp_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dms_user_roles`
--

DROP TABLE IF EXISTS `dms_user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dms_user_roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2F104DAD60322AC` (`role_id`),
  KEY `IDX_2F104DAA76ED395` (`user_id`),
  CONSTRAINT `fk_dms_user_roles_role_id_dms_roles` FOREIGN KEY (`role_id`) REFERENCES `dms_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_dms_user_roles_user_id_dms_users` FOREIGN KEY (`user_id`) REFERENCES `dms_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dms_user_roles`
--

LOCK TABLES `dms_user_roles` WRITE;
/*!40000 ALTER TABLE `dms_user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `dms_user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dms_users`
--

DROP TABLE IF EXISTS `dms_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dms_users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('local','oauth') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:CustomEnum__local__oauth)',
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super_user` tinyint(1) NOT NULL,
  `is_banned` tinyint(1) NOT NULL,
  `password_hash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_algorithm` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_cost_factor` int DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oauth_provider_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oauth_account_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metadata` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dms_users_email_unique_index` (`email`),
  UNIQUE KEY `dms_users_username_unique_index` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dms_users`
--

LOCK TABLES `dms_users` WRITE;
/*!40000 ALTER TABLE `dms_users` DISABLE KEYS */;
INSERT INTO `dms_users` VALUES (1,'local','Admin','admin@admin.com','admin',1,0,'$2y$10$zxwpclQuZ79OiphKUOoNNuxR/ijaN1pteT2wAxL2LSEhOPpanw0cK','bcrypt',10,NULL,NULL,NULL,'[]');
/*!40000 ALTER TABLE `dms_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listings`
--

DROP TABLE IF EXISTS `listings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `listings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:CustomEnum__male__female)',
  `dob` date NOT NULL,
  `photo1` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo1_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo2` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo2_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo3` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo3_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo4` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo4_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo5` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo5_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_sponsored` tinyint(1) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:CustomEnum__active__inactive)',
  `blue` enum('2copies(d/d)','1copy(D/d)','doesnotcarry','unknown') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:CustomEnum__2copies_d_d___1copy_D_d___doesnotcarry__unknown)',
  `chocolate` enum('2copies(co/co)','1copy(Co/co)','doesnotcarry','unknown') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:CustomEnum__2copies_co_co___1copy_Co_co___doesnotcarry__unknown)',
  `agouti` enum('(a,a)','(ay,a)','(ay,at)','(ay,ay)','(at,a)','(at,at)') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:CustomEnum___a_a____ay_a____ay_at____ay_ay____at_a____at_at_)',
  `testable_chocolate` enum('2copies(b/b)','1copy(B/b)','doesnotcarry','unknown') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:CustomEnum__2copies_b_b___1copy_B_b___doesnotcarry__unknown)',
  `fluffy` enum('2copies(l/l)','1copy(L/l)','doesnotcarry','unknown') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:CustomEnum__2copies_l_l___1copy_L_l___doesnotcarry__unknown)',
  `e_mcir` enum('(EM,EM)','(EM,E)','(EM,e)','(E,E)','(E,e)','(e,e)') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:CustomEnum___EM_EM____EM_E____EM_e____E_E____E_e____e_e_)',
  `intensity` enum('2copies(i/i)','1copy(I/i)','doesnotcarry','unknown') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:CustomEnum__2copies_i_i___1copy_I_i___doesnotcarry__unknown)',
  `pied` enum('2copies(s/s)','1copy(s/N)','doesnotcarry','unknown') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:CustomEnum__2copies_s_s___1copy_s_N___doesnotcarry__unknown)',
  `brindle` enum('yes','no','unknown') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:CustomEnum__yes__no__unknown)',
  `merle` enum('yes','no','unknown') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:CustomEnum__yes__no__unknown)',
  PRIMARY KEY (`id`),
  KEY `IDX_9A7BD98EA76ED395` (`user_id`),
  CONSTRAINT `fk_listings_user_id_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listings`
--

LOCK TABLES `listings` WRITE;
/*!40000 ALTER TABLE `listings` DISABLE KEYS */;
INSERT INTO `listings` VALUES (1,6,'Dolor ducimus sunt','Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus nibh. Curabitur aliquet quam id dui posuere blandit. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac diam sit amet quam ','male','2021-07-02','M2KYZTQuxEfOv3Dm','187264306_3762127890577260_2475796096909161162_n.jpg','nUuWN143f1kt1e7i','170781970_2433058536839674_4317589670987869052_n.jpg','d58wBEJjg06cr3LC','174079066_1947172448763176_5597061415940140866_n.jpg','7DyC3s9ra1BoG9lj','174601183_853186432213404_6231598317047973055_n.jpg','Ead8mjU7q6eV0Xf9','190854110_801236810533960_2693887204435213639_n.jpg',0,'inactive','unknown','unknown','(ay,at)','2copies(b/b)','1copy(L/l)','(EM,E)','2copies(i/i)','unknown','no','no'),(2,7,'Dolor blanditiis mol','Est qui officia arch','male','2021-05-29','zAIMka0uPmLXNH2h','192446113_951255912294865_1046922462139408151_n.jpg','EaoplTE691GPHom0','193333298_303347981519985_5098649944386364653_n.jpg','eACZHvqorQJhsa70','102724368_889084914928173_3876202533887300474_n.jpg','0cIPCLFN69J5PkVf','137592508_232486101832711_6263543293157143704_n.jpg','np3njWtnQ4PYQKGR','192780833_900159477216195_4590967146185546293_n.jpg',1,'active','unknown','doesnotcarry','(ay,a)','2copies(b/b)','2copies(l/l)','(E,E)','2copies(i/i)','2copies(s/s)','no','no');
/*!40000 ALTER TABLE `listings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `litters`
--

DROP TABLE IF EXISTS `litters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `litters` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_dob` date NOT NULL,
  `photo1` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo1_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo2` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo2_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo3` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo3_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo4` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo4_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo5` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo5_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_sponsored` tinyint(1) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:CustomEnum__active__inactive)',
  `dam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8C97E480A76ED395` (`user_id`),
  CONSTRAINT `fk_litters_user_id_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `litters`
--

LOCK TABLES `litters` WRITE;
/*!40000 ALTER TABLE `litters` DISABLE KEYS */;
INSERT INTO `litters` VALUES (1,8,'Facere quaerat id d','Et consequatur Qui','2021-05-31','FzsgbxTRYJW8Vksn','45392130_203270327231829_4502731356800680184_n (1).jpg','C0SxlCISTsbzQ9Ep','192277308_315394633410913_2229865842920665435_n.jpg','kPf7BTuWFkmAC6Ky','102724368_889084914928173_3876202533887300474_n.jpg','69hlOkQJ1pW0yU6b','192780833_900159477216195_4590967146185546293_n.jpg','NV4ZAjjOfI3hT2mi','191881644_192424902750522_6045676364786490627_n.jpg',0,'active','Ut molestiae nisi au','Quasi consequat Nis'),(2,8,'Assumenda voluptatem','Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Proin eget tortor risus. Proin eget tortor risus. Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempu','2021-06-05','f8qnjrHy5C0LuuW1','131887977_223146389378705_7545877018241534003_n.jpg','Cxm2GYbB24qSRqYg','118919417_767032770783947_1737678115861413124_n.jpg','T7BG4h5U682FLwxa','118231882_1076639996072570_1439690117584958695_n.jpg','ReExXoZWkKsFgiog','107046316_1956240304509708_883610413323006256_n.jpg','kkuuVMzoRQuQUrIQ','104418523_583669569254843_4824895328038013540_n.jpg',0,'active','Ullamco eu quo archi','Voluptatem ut offic');
/*!40000 ALTER TABLE `litters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2021_05_04_095124_initial_db',1),(3,'2021_05_27_114407_users',1),(4,'2021_05_28_070306_listings_saved-items_resources_advertisements',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saved_listings`
--

DROP TABLE IF EXISTS `saved_listings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `saved_listings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `listing_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F49ADEA6D4619D1A` (`listing_id`),
  KEY `IDX_F49ADEA6A76ED395` (`user_id`),
  CONSTRAINT `fk_saved_listings_listing_id_listings` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_saved_listings_user_id_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saved_listings`
--

LOCK TABLES `saved_listings` WRITE;
/*!40000 ALTER TABLE `saved_listings` DISABLE KEYS */;
/*!40000 ALTER TABLE `saved_listings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saved_litters`
--

DROP TABLE IF EXISTS `saved_litters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `saved_litters` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `litter_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6962B17128AEA69` (`litter_id`),
  KEY `IDX_6962B17A76ED395` (`user_id`),
  CONSTRAINT `fk_saved_litters_litter_id_litters` FOREIGN KEY (`litter_id`) REFERENCES `litters` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_saved_litters_user_id_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saved_litters`
--

LOCK TABLES `saved_litters` WRITE;
/*!40000 ALTER TABLE `saved_litters` DISABLE KEYS */;
/*!40000 ALTER TABLE `saved_litters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saved_searches`
--

DROP TABLE IF EXISTS `saved_searches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `saved_searches` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `blue` enum('2copies(d/d)','1copy(D/d)','doesnotcarry','unknown') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:CustomEnum__2copies_d_d___1copy_D_d___doesnotcarry__unknown)',
  `chocolate` enum('2copies(co/co)','1copy(Co/co)','doesnotcarry','unknown') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:CustomEnum__2copies_co_co___1copy_Co_co___doesnotcarry__unknown)',
  `agouti` enum('(a,a)','(ay,a)','(ay,at)','(ay,ay)','(at,a)','(at,at)') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:CustomEnum___a_a____ay_a____ay_at____ay_ay____at_a____at_at_)',
  `testable_chocolate` enum('2copies(b/b)','1copy(B/b)','doesnotcarry','unknown') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:CustomEnum__2copies_b_b___1copy_B_b___doesnotcarry__unknown)',
  `fluffy` enum('2copies(l/l)','1copy(L/l)','doesnotcarry','unknown') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:CustomEnum__2copies_l_l___1copy_L_l___doesnotcarry__unknown)',
  `e_mcir` enum('(EM,EM)','(EM,E)','(EM,e)','(E,E)','(E,e)','(e,e)') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:CustomEnum___EM_EM____EM_E____EM_e____E_E____E_e____e_e_)',
  `intensity` enum('2copies(i/i)','1copy(I/i)','doesnotcarry','unknown') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:CustomEnum__2copies_i_i___1copy_I_i___doesnotcarry__unknown)',
  `pied` enum('2copies(s/s)','1copy(s/N)','doesnotcarry','unknown') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:CustomEnum__2copies_s_s___1copy_s_N___doesnotcarry__unknown)',
  `brindle` enum('yes','no','unknown') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:CustomEnum__yes__no__unknown)',
  `merle` enum('yes','no','unknown') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:CustomEnum__yes__no__unknown)',
  PRIMARY KEY (`id`),
  KEY `IDX_EF93F31A76ED395` (`user_id`),
  CONSTRAINT `fk_saved_searches_user_id_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saved_searches`
--

LOCK TABLES `saved_searches` WRITE;
/*!40000 ALTER TABLE `saved_searches` DISABLE KEYS */;
/*!40000 ALTER TABLE `saved_searches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('breeder','customer') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:CustomEnum__breeder__customer)',
  `is_active` tinyint(1) NOT NULL,
  `hashed_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kennel_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_account_url` varchar(2083) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ig_account_url` varchar(2083) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(2083) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'Aphrodite','Tanner','niwozeram','breeder',1,'Laborum Ut laboris','Nostrum eum quia vel','fazerurym@mailinator.com','+1 (989) 149-8535','Lacy Sloan','koDbA8BcwF5uwMeV','download.jpg','In officia anim dolo','99886','Sed id inventore re','Ut nostrud ad duis e','https://www.zibituwe.info','https://www.vaza.ca','https://www.lodipoqyjimepoj.me.uk','8ho9oYPzPK3JW5BD','pawsdogbows-e1504292412801.jpg'),(7,'Adele','Hull','kimixedyx','breeder',1,'Sit iste est non qu','Voluptate animi vol','menem@mailinator.com','+1 (518) 443-3444','Lenore Marquez','8dhpaupyIGGKJlzB','download (1).jpg','Ipsum ipsum aliquip','53635','Dolore et exercitati','Aut ex irure eum exc','https://www.fesoqaqyp.co','https://www.tapesuxiqagafex.cc','https://www.wumaxi.cm','tMZGAQCS3qeZMIHP','yellowdog-e1504271554119.png'),(8,'Wanda','Barnett','genusat','breeder',1,'Sint minim quos ill','Earum sit beatae at','kyjyqy@mailinator.com','+1 (684) 507-5851','Deborah Morin','HpjwCSpBjwWHOxYN','download (2).jpg','In dolor non ratione','45483','Dolorem reprehenderi','Velit officiis vero','https://www.ronaxesuguzan.info','https://www.teti.cc','https://www.vagojuzab.org.uk','g6ttrRCVD1MCU4Ct','yogacorgi.jpg'),(9,'Derek','Foster','vejytifita','breeder',1,'Nemo non aut saepe o','Odio tempore doloru','degovujizy@mailinator.com','+1 (841) 798-5476','Iona Callahan','rsyqsXQ8MRzSJoQt','young-adult-profile-picture-red-260nw-1655747050.jpg','Placeat facere pari','68973','Reprehenderit deser','A omnis est eveniet','https://www.kobecobihobiwij.ca','https://www.daketyryte.net','https://www.lozyvyd.co','8Gn5kcISFwV6K9rs','doggievalet-e1504271420512.jpg'),(10,'Laith','Boone','ripidotyti','breeder',1,'Perspiciatis nobis','Doloribus asperiores','moxig@mailinator.com','+1 (637) 999-5941','Brittany Odom','W2OORsAfSBp4EjyA','01-shutterstock_476340928-Irina-Bg.jpg','Voluptas est vero ei','84109','Ea voluptatem ut dol','Iste quaerat sint en','https://www.lov.me.uk','https://www.hinirotuzyvosej.co','https://www.rylyzisilaro.com','uKPOgFOZaA46FPv0','animodel-e1504271481599.png'),(11,'Amery','Baird','wisoguge','customer',1,'Sint voluptatem Ve','Accusantium amet do','kexileva@mailinator.com','+11939946165','Hope Puckett',NULL,NULL,'Et sapiente mollitia','48116','Deserunt vitae digni','Ullamco totam volupt',NULL,NULL,NULL,NULL,NULL),(12,'Jaden','Rogers','cenahuhyv','customer',1,'Dolorum quis dolor d','Voluptates vel aliqu','juheb@mailinator.com','+1 (607) 315-2484',NULL,'Tx3kmrtYKazlj7b7','01-shutterstock_476340928-Irina-Bg.jpg','Aliquid aliqua Nequ','72721','Sunt quam ullam sit','Exercitationem ad ni',NULL,NULL,NULL,NULL,NULL);
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

-- Dump completed on 2021-05-28 10:26:36
