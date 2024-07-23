-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para trabalho_php
CREATE DATABASE IF NOT EXISTS `trabalho_php` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `trabalho_php`;

-- Copiando estrutura para tabela trabalho_php.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(200) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela trabalho_php.dados
CREATE TABLE IF NOT EXISTS `dados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ativo` varchar(255) NOT NULL,
  `re` varchar(255) NOT NULL,
  `ch_regularizacao` varchar(255) NOT NULL,
  `sites` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=461 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela trabalho_php.fornecedor
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_fornecedor` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela trabalho_php.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_text` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela trabalho_php.notebook
CREATE TABLE IF NOT EXISTS `notebook` (
  `id_notebook` int(11) NOT NULL AUTO_INCREMENT,
  `ativo` varchar(150) DEFAULT NULL,
  `serie` varchar(150) DEFAULT NULL,
  `marca` varchar(150) DEFAULT NULL,
  `modelo` varchar(150) DEFAULT NULL,
  `statuss` varchar(150) DEFAULT NULL,
  `config` varchar(150) DEFAULT NULL,
  `descri` varchar(500) DEFAULT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `re` varchar(150) DEFAULT NULL,
  `sites` varchar(150) DEFAULT NULL,
  `area` varchar(150) DEFAULT NULL,
  `cargo` varchar(150) DEFAULT NULL,
  `lider` varchar(150) DEFAULT NULL,
  `obs` varchar(150) DEFAULT NULL,
  `grupo` varchar(150) DEFAULT NULL,
  `Atualizado` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_notebook`) USING BTREE,
  UNIQUE KEY `ativo` (`ativo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela trabalho_php.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(200) NOT NULL,
  `mail_usuario` varchar(150) NOT NULL,
  `senha_usuario` varchar(60) NOT NULL,
  `nivel_usuario` int(2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `cat` varchar(50) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
