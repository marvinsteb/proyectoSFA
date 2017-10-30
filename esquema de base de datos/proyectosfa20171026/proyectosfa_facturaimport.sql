-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 192.168.2.254    Database: proyectosfa
-- ------------------------------------------------------
-- Server version	5.7.12-0ubuntu1.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `facturaimport`
--

DROP TABLE IF EXISTS `facturaimport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facturaimport` (
  `idfactura` int(11) NOT NULL AUTO_INCREMENT,
  `nofactura` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_documento` date DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `proveedor_id` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  PRIMARY KEY (`idfactura`),
  KEY `fk_factimport_proveedor_idx` (`proveedor_id`),
  CONSTRAINT `fk_factimport_proveedor` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturaimport`
--

LOCK TABLES `facturaimport` WRITE;
/*!40000 ALTER TABLE `facturaimport` DISABLE KEYS */;
INSERT INTO `facturaimport` VALUES (1,123456789,1,'2017-10-31','2017-10-26',2,0.00),(2,123456,1,'2017-10-24','2017-10-26',2,0.00),(3,123456,1,'2017-11-28','2017-10-26',2,0.00),(4,2147483647,1,'2017-10-31','2017-10-26',2,0.00),(5,650368,1,'2017-10-31','2017-10-26',2,0.00),(6,50652048,1,'2017-10-25','2017-10-26',2,0.00);
/*!40000 ALTER TABLE `facturaimport` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-26 18:41:49
