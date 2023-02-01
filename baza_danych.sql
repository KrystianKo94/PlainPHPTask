-- MariaDB dump 10.19  Distrib 10.6.11-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: homework2
-- ------------------------------------------------------
-- Server version	10.6.11-MariaDB-0ubuntu0.22.04.1

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
-- Table structure for table `Attributes`
--

DROP TABLE IF EXISTS `Attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Attributes` (
  `id_attributes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code_attributes` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `unit_attributes` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_attributes`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Attributes`
--

LOCK TABLES `Attributes` WRITE;
/*!40000 ALTER TABLE `Attributes` DISABLE KEYS */;
INSERT INTO `Attributes` VALUES (1,'MB','Size','Size (MB)'),(2,'KG','Weight','Weight (kg)'),(3,'Height','Dimension','Height (cm)'),(4,'Width','Dimension','Width (cm)'),(5,'Length','Dimension','Lenght (cm)');
/*!40000 ALTER TABLE `Attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Product`
--

DROP TABLE IF EXISTS `Product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Product` (
  `id_product` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Klucz główny produktu',
  `sku` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `id_product_type` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_product`),
  KEY `id_product_type` (`id_product_type`),
  CONSTRAINT `Product_ibfk_1` FOREIGN KEY (`id_product_type`) REFERENCES `Product_Type` (`id_product_type`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product`
--

LOCK TABLES `Product` WRITE;
/*!40000 ALTER TABLE `Product` DISABLE KEYS */;
INSERT INTO `Product` VALUES (14,'sku002921','33dw',333.00,3),(18,'SKHHjhbhjbhjbhj','dewdewdew',2.00,1),(19,'cdcsc','z',22.00,1);
/*!40000 ALTER TABLE `Product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Product_Attributes_Value`
--

DROP TABLE IF EXISTS `Product_Attributes_Value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Product_Attributes_Value` (
  `id_product_attributes_value` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_product` int(10) unsigned NOT NULL,
  `id_attribute` int(10) unsigned NOT NULL,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id_product_attributes_value`),
  KEY `id_attribute` (`id_attribute`),
  KEY `id_product` (`id_product`),
  CONSTRAINT `Product_Attributes_Value_ibfk_1` FOREIGN KEY (`id_attribute`) REFERENCES `Attributes` (`id_attributes`) ON UPDATE CASCADE,
  CONSTRAINT `Product_Attributes_Value_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `Product` (`id_product`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product_Attributes_Value`
--

LOCK TABLES `Product_Attributes_Value` WRITE;
/*!40000 ALTER TABLE `Product_Attributes_Value` DISABLE KEYS */;
INSERT INTO `Product_Attributes_Value` VALUES (9,14,3,'33'),(10,14,4,'333'),(11,14,5,'323'),(23,14,1,'333'),(27,18,1,'33'),(28,19,1,'333');
/*!40000 ALTER TABLE `Product_Attributes_Value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Product_Type`
--

DROP TABLE IF EXISTS `Product_Type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Product_Type` (
  `id_product_type` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id_product_type`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product_Type`
--

LOCK TABLES `Product_Type` WRITE;
/*!40000 ALTER TABLE `Product_Type` DISABLE KEYS */;
INSERT INTO `Product_Type` VALUES (1,'DVD'),(2,'Book'),(3,'Furniture');
/*!40000 ALTER TABLE `Product_Type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Product_Type_Atributes`
--

DROP TABLE IF EXISTS `Product_Type_Atributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Product_Type_Atributes` (
  `id_product_type_attribute` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_product_type` int(10) unsigned NOT NULL,
  `id_attributes` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_product_type_attribute`),
  KEY `id_product_type` (`id_product_type`),
  KEY `id_attributes` (`id_attributes`),
  CONSTRAINT `Product_Type_Atributes_ibfk_1` FOREIGN KEY (`id_product_type`) REFERENCES `Product_Type` (`id_product_type`) ON UPDATE CASCADE,
  CONSTRAINT `Product_Type_Atributes_ibfk_2` FOREIGN KEY (`id_attributes`) REFERENCES `Attributes` (`id_attributes`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product_Type_Atributes`
--

LOCK TABLES `Product_Type_Atributes` WRITE;
/*!40000 ALTER TABLE `Product_Type_Atributes` DISABLE KEYS */;
INSERT INTO `Product_Type_Atributes` VALUES (1,1,1),(2,2,2),(3,3,3),(4,3,4),(5,3,5);
/*!40000 ALTER TABLE `Product_Type_Atributes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-25 20:31:02
