-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ptt
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aluno` (
  `email` varchar(254) NOT NULL,
  `nome` varchar(161) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `fk_turma` int(11) NOT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_turma_idx` (`fk_turma`),
  CONSTRAINT `fk_turma` FOREIGN KEY (`fk_turma`) REFERENCES `turma` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` VALUES ('elias@gmail.com','Elias Mafra','123456',1),('gui@gmail.com','Guilherme de Lima','123456',1);
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aluno_has_img_fichamento`
--

DROP TABLE IF EXISTS `aluno_has_img_fichamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aluno_has_img_fichamento` (
  `aluno_email` varchar(254) NOT NULL,
  `img_fichamento_img_id` int(11) NOT NULL,
  PRIMARY KEY (`aluno_email`,`img_fichamento_img_id`),
  KEY `fk_aluno_has_img_fichamento_img_fichamento1_idx` (`img_fichamento_img_id`),
  KEY `fk_aluno_has_img_fichamento_aluno1_idx` (`aluno_email`),
  CONSTRAINT `fk_aluno_has_img_fichamento_aluno1` FOREIGN KEY (`aluno_email`) REFERENCES `aluno` (`email`),
  CONSTRAINT `fk_aluno_has_img_fichamento_img_fichamento1` FOREIGN KEY (`img_fichamento_img_id`) REFERENCES `img_fichamento` (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno_has_img_fichamento`
--

LOCK TABLES `aluno_has_img_fichamento` WRITE;
/*!40000 ALTER TABLE `aluno_has_img_fichamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `aluno_has_img_fichamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fichamento`
--

DROP TABLE IF EXISTS `fichamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fichamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_aluno` varchar(254) DEFAULT NULL,
  `fichamento` varchar(1000) DEFAULT NULL,
  `capitulo` varchar(45) DEFAULT NULL,
  `turma` int(11) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fichamento`
--

LOCK TABLES `fichamento` WRITE;
/*!40000 ALTER TABLE `fichamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `fichamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img_fichamento`
--

DROP TABLE IF EXISTS `img_fichamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `img_fichamento` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img` blob DEFAULT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_fichamento`
--

LOCK TABLES `img_fichamento` WRITE;
/*!40000 ALTER TABLE `img_fichamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `img_fichamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro`
--

DROP TABLE IF EXISTS `livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `livro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `livro` varchar(200) NOT NULL,
  `autor` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro`
--

LOCK TABLES `livro` WRITE;
/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro_has_aluno`
--

DROP TABLE IF EXISTS `livro_has_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `livro_has_aluno` (
  `livro_livro_id` int(11) NOT NULL,
  `aluno_email` varchar(254) NOT NULL,
  PRIMARY KEY (`livro_livro_id`,`aluno_email`),
  KEY `fk_livro_has_aluno_aluno1_idx` (`aluno_email`),
  KEY `fk_livro_has_aluno_livro1_idx` (`livro_livro_id`),
  CONSTRAINT `fk_livro_has_aluno_aluno1` FOREIGN KEY (`aluno_email`) REFERENCES `aluno` (`email`),
  CONSTRAINT `fk_livro_has_aluno_livro1` FOREIGN KEY (`livro_livro_id`) REFERENCES `livro` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro_has_aluno`
--

LOCK TABLES `livro_has_aluno` WRITE;
/*!40000 ALTER TABLE `livro_has_aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `livro_has_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `professor` (
  `email` varchar(254) NOT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `t` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma`
--

LOCK TABLES `turma` WRITE;
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
INSERT INTO `turma` VALUES (1,'EMIDES2AM'),(2,'EMIDES2EM');
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-06  0:49:14
