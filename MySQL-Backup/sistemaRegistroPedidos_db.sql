-- Adminer 4.8.1 MySQL 8.0.34-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `sistemaRegistroPedidos_db`;
CREATE DATABASE `sistemaRegistroPedidos_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sistemaRegistroPedidos_db`;

DROP TABLE IF EXISTS `torder_item`;
CREATE TABLE `torder_item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_product` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `qtd_product` int NOT NULL,
  `price_product` float NOT NULL,
  `obs_product` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `user_id` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_order_user_id` (`user_id`),
  CONSTRAINT `fk_order_user_id` FOREIGN KEY (`user_id`) REFERENCES `tuser` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `torder_item` (`id`, `name_product`, `qtd_product`, `price_product`, `obs_product`, `user_id`, `deleted_at`, `created_at`) VALUES
(1,	'Mouse Write',	2,	15.5,	'Mouse BRANCO',	1,	NULL,	'2024-06-03 20:09:03'),
(2,	'Mouse',	9,	12.99,	'Black            ',	2,	'2024-06-08 03:16:14',	'2024-06-03 20:09:11'),
(3,	'Mouse',	9,	12.99,	'Black            ',	1,	'2024-06-08 03:16:18',	'2024-06-03 20:09:17'),
(4,	'Teclado',	2,	150,	'GAMER',	2,	NULL,	'2024-06-03 20:36:33'),
(5,	'Monitor',	3,	980.99,	'LG',	NULL,	'2024-06-03 20:41:03',	'2024-06-03 20:41:03'),
(6,	'Notebook DELL',	2,	1500,	'17 Polegadas            ',	NULL,	NULL,	'2024-06-03 20:50:40'),
(7,	'Notebook DELL',	2,	1500,	'17 Polegadas            ',	NULL,	'2024-06-08 03:16:21',	'2024-06-03 20:52:11'),
(8,	'teste',	1,	12,	'teste            ',	NULL,	'2024-06-08 03:15:39',	'2024-06-03 20:52:18'),
(9,	'teste',	3,	44,	'teste            ',	NULL,	'2024-06-08 03:16:24',	'2024-06-03 20:55:05'),
(10,	'teste',	3,	44,	'teste            ',	NULL,	'2024-06-08 03:16:07',	'2024-06-03 21:14:25'),
(11,	'Mouse PAD',	3,	133,	'GAMER            ',	NULL,	'2024-06-08 03:16:29',	'2024-06-03 21:14:43'),
(12,	'Mouse PAD',	3,	133,	'GAMER            ',	NULL,	'2024-06-08 03:16:32',	'2024-06-03 21:14:49'),
(13,	'Mouse PAD',	3,	133,	'GAMER            ',	NULL,	NULL,	'2024-06-03 21:16:01'),
(14,	'SMART',	1,	45.99,	'Write            ',	NULL,	'2024-06-08 03:16:37',	'2024-06-03 21:16:30'),
(15,	'SMART',	1,	45.99,	'Write            ',	NULL,	'2024-06-08 03:16:34',	'2024-06-03 21:27:21'),
(16,	'SMART',	10,	45.99,	'Write            ',	1,	NULL,	'2024-06-03 21:35:42'),
(17,	'Arvore',	2,	23,	'SECA            ',	NULL,	'2024-06-08 03:16:40',	'2024-06-03 21:36:04'),
(18,	'Arvore',	2,	23,	'SECA            ',	NULL,	'2024-06-08 03:16:42',	'2024-06-03 21:36:55'),
(19,	'Arvore',	2,	23,	'SECA            ',	NULL,	NULL,	'2024-06-03 21:37:00'),
(20,	'bala',	10,	2,	'hortela            ',	NULL,	NULL,	'2024-06-03 21:37:23'),
(21,	'agua',	1,	12,	'cristal            ',	NULL,	'2024-06-08 03:16:49',	'2024-06-03 21:39:09'),
(22,	'agua',	1,	12,	'cristal            ',	NULL,	NULL,	'2024-06-03 21:40:09'),
(23,	'aqui',	1,	12,	'aqui            ',	NULL,	'2024-06-08 03:16:57',	'2024-06-03 21:40:22'),
(24,	'Vidro',	1,	1343,	'Fume            ',	NULL,	NULL,	'2024-06-03 21:53:16'),
(25,	'coca-cola',	1,	12,	'gelada            ',	NULL,	NULL,	'2024-06-03 22:02:02'),
(26,	'Mouse',	1,	1111,	'teste            ',	NULL,	'2024-06-08 03:35:56',	'2024-06-08 03:25:02'),
(27,	'aqui',	1,	12.12,	'aqui                ',	1,	NULL,	'2024-06-08 13:30:06');

DROP TABLE IF EXISTS `tproduct`;
CREATE TABLE `tproduct` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `info_additional` longtext COLLATE utf8mb4_general_ci,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_user_id` (`user_id`),
  CONSTRAINT `fk_product_user_id` FOREIGN KEY (`user_id`) REFERENCES `tuser` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tproduct` (`id`, `name`, `category`, `price`, `image`, `info_additional`, `user_id`, `created_at`, `deleted_at`) VALUES
(19,	'Notebook DELL i5',	'Notebook',	3500,	'',	'Dell\r\nCPU i5\r\n8GB\r\n480GB SSD',	NULL,	'2024-06-09 02:17:57',	NULL),
(20,	'Fonte ATX',	'peça',	75,	'',	'450w',	NULL,	'2024-06-09 02:17:57',	NULL),
(21,	'Caixa de SOM',	'periferico',	250,	'',	'Audio 10w                ',	NULL,	'2024-06-09 02:17:57',	NULL),
(24,	'Teclado sem fio',	'sem fio',	154.33,	'',	'Logitec                ',	NULL,	'2024-06-09 02:17:57',	NULL),
(25,	'Teclado sem fio',	'sem fio',	154.33,	'',	'Logitec                ',	NULL,	'2024-06-09 02:17:57',	NULL),
(26,	'Cabo HDMI',	'Peças',	5.5,	'',	'1 metro                ',	NULL,	'2024-06-09 02:08:33',	NULL),
(44,	'1111',	'111',	111,	'',	'                1111',	NULL,	'2024-06-09 02:08:33',	NULL),
(66,	'5555555',	'55',	5,	'',	'             555555555555555555555555555555   ',	NULL,	'2024-06-09 02:08:33',	NULL);

DROP TABLE IF EXISTS `tuser`;
CREATE TABLE `tuser` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `situation` enum('ativo','inativo') COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tuser` (`id`, `name`, `email`, `password`, `situation`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'Clerison Oliveira Da Silva',	'cosclerison@gmail.com',	'ee3a6565bd11ffd1a70b401ea1457ade',	'ativo',	'2024-06-03 14:03:20',	'2024-06-03 14:03:20',	'2024-06-03 14:03:20'),
(2,	'Juliana Vieira Dias Silva',	'juliana@gmail.com',	'49339465c068fb48e796b4e68bdd35d5',	'ativo',	'2024-06-03 18:15:15',	NULL,	NULL);

-- 2024-06-10 13:14:26
