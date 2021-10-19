-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.13-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para calendar_system
CREATE DATABASE IF NOT EXISTS `calendar_system` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `calendar_system`;

-- Copiando estrutura para tabela calendar_system.tb_scheduled
CREATE TABLE IF NOT EXISTS `tb_scheduled` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `room` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `timetable` datetime NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela calendar_system.tb_scheduled: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_scheduled` DISABLE KEYS */;
INSERT INTO `tb_scheduled` (`id`, `name`, `room`, `timetable`, `end`) VALUES
	(11, 'FINANCEIRO', 'Sala 1', '2021-10-27 08:00:00', '2021-10-27 10:00:00'),
	(12, 'FINANCEIRO', 'Sala 2', '2021-10-28 09:00:00', '2021-10-28 12:00:00'),
	(13, 'TI', 'Centro', '2021-10-27 11:00:00', '2021-10-27 14:00:00'),
	(14, 'CONTABIL', 'Sala 2', '2021-10-21 07:00:00', '2021-10-21 16:00:00'),
	(15, 'PLANEJAMENTO', 'Planejamento', '2021-10-23 10:00:00', '2021-10-23 14:00:00');
/*!40000 ALTER TABLE `tb_scheduled` ENABLE KEYS */;

-- Copiando estrutura para tabela calendar_system.tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela calendar_system.tb_users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` (`id`, `name`, `password`) VALUES
	(2, 'recepcao', '202cb962ac59075b964b07152d234b70');
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
