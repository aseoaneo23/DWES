-- MariaDB dump 10.19  Distrib 10.11.3-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: mysitedb
-- ------------------------------------------------------
-- Server version	10.11.3-MariaDB-1

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
-- Table structure for table `tComentarios`
--

DROP TABLE IF EXISTS `tComentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tComentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(2000) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `juego_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iduser` (`usuario_id`),
  KEY `fk_idjuego` (`juego_id`),
  CONSTRAINT `fk_idjuego` FOREIGN KEY (`juego_id`) REFERENCES `tJuegos` (`id`),
  CONSTRAINT `fk_iduser` FOREIGN KEY (`usuario_id`) REFERENCES `tUsuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tComentarios`
--

LOCK TABLES `tComentarios` WRITE;
/*!40000 ALTER TABLE `tComentarios` DISABLE KEYS */;
INSERT INTO `tComentarios` VALUES
(2,'Me ha encantado este juego, no tengo ninguna queja tanto gráficos como la historia; un 10',1,1),
(3,'Me esperaba más acción, creo que le falta chicha.',2,2),
(4,'El dinero mejor gastado de mi vida, increíble juego',3,3),
(5,'Un poco caro pero vale la pena. Gráficos mejorables.',4,4),
(6,'El nuevo motor gráfico sorprende hasta al más exigente. Mis dieces a los desarrolladores.',5,5);
/*!40000 ALTER TABLE `tComentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tJuegos`
--

DROP TABLE IF EXISTS `tJuegos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tJuegos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `url_imagen` varchar(2000) DEFAULT NULL,
  `estudio` varchar(20) DEFAULT NULL,
  `género` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tJuegos`
--

LOCK TABLES `tJuegos` WRITE;
/*!40000 ALTER TABLE `tJuegos` DISABLE KEYS */;
INSERT INTO `tJuegos` VALUES
(1,'Fortnite','https://i.blogs.es/a4641d/fortnite2021/1366_2000.jpeg','Epic Games','Shooter'),
(2,'CSGO','https://media.steampowered.com/apps/csgo/blog/images/fb_image.png?v=6','Valve','Shooter'),
(3,'Fall Guys','https://cdn2.unrealengine.com/fg-10-3-evg-keyart-widthlogo-1920x1080-198587253bf0.png','Epic Games','Aventura'),
(4,'God of War','https://static.wikia.nocookie.net/godofwar/images/a/a7/Portada_God_of_War.png/revision/latest?cb=20211007231413&path-prefix=es','SCS Santa Mónica','Acción'),
(5,'EA Sports FC 2024','https://e00-marca.uecdn.es/assets/multimedia/imgenes/2023/09/21/16952957222613.jpg','EA Sports','Deportes');
/*!40000 ALTER TABLE `tJuegos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tUsuarios`
--

DROP TABLE IF EXISTS `tUsuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tUsuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `contraseña` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tUsuarios`
--

LOCK TABLES `tUsuarios` WRITE;
/*!40000 ALTER TABLE `tUsuarios` DISABLE KEYS */;
INSERT INTO `tUsuarios` VALUES
(1,'Pedro','Martínez','pmart@gmail.com','hardpassword1'),
(2,'Juan','Gómez','jgomez@gmail.com','hardpassword2'),
(3,'Jairo','Suárez','jsuarez@gmail.com','hardpassword3'),
(4,'Martín','Seijas','mseijas@gmail.com','hardpassword4'),
(5,'Samuel','García','sgarcia@gmail.com','hardpassword5');
/*!40000 ALTER TABLE `tUsuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-16 16:25:14
