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
-- Table structure for table `tiporeparacion`
--

DROP TABLE IF EXISTS `tiporeparacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiporeparacion` (
  `idtiporeparacion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`idtiporeparacion`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiporeparacion`
--

LOCK TABLES `tiporeparacion` WRITE;
/*!40000 ALTER TABLE `tiporeparacion` DISABLE KEYS */;
INSERT INTO `tiporeparacion` VALUES (1,'Chapa o latonería y pintura.'),(2,'Entonación puesta a punto e inyección.'),(3,'Instalación de Gas Natural para vehículos.'),(4,'Mantenimiento y reparación de flotas de taxis.'),(5,'Mantenimiento y reparación de flotas de autobuses.'),(6,'Mantenimiento y reparación de flotas de camiones.'),(7,'Mecanica general.'),(8,'Modificación o construcción de vehículos para minusválidos.'),(9,'Modificación o construcción de ambulancias.'),(10,'Modificación o construcción de vehículos fúnebres.'),(11,'Modificación o construcción de limosinas.'),(12,'Modificación o construcción de vehículos blindados.'),(13,'Reparación de transmisiones.'),(14,'Reparación de radiadores.'),(15,'Reparación de silenciadores.'),(16,'Reparación de aire acondicionado de vehículos.'),(17,'Reparación de frenos.'),(18,'Reparación e instalación de cristales y lunas.'),(19,'Reparación de tren delantero.'),(20,'Reparación de motos.'),(21,'Reparación de botes.'),(22,'Restauración de vehículos.'),(23,'Tractores y maquinaria agrícola.');
/*!40000 ALTER TABLE `tiporeparacion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-26 18:41:53
