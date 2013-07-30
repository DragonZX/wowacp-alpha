/*
SQLyog Enterprise - MySQL GUI v7.13 
MySQL - 5.1.32-community : Database - 313lk
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `bagreports` */

DROP TABLE IF EXISTS `bagreports`;

CREATE TABLE `bagreports` (
  `character` int(11) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `theme` varchar(50) NOT NULL,
  `datewrite` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `report` longtext,
  `status` tinyint(3) DEFAULT NULL,
  `admin_note` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `log` */

DROP TABLE IF EXISTS `log`;

CREATE TABLE `log` (
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата',
  `ip` varchar(15) NOT NULL COMMENT 'ип',
  `account` int(11) unsigned NOT NULL COMMENT 'акк',
  `character` int(11) unsigned DEFAULT NULL COMMENT 'чар',
  `mode` tinyint(3) unsigned NOT NULL COMMENT 'что делали',
  `email` varchar(100) DEFAULT NULL COMMENT 'емайл',
  `resultat` longtext COMMENT 'изменили на',
  `note` longtext COMMENT 'описание',
  `old_data` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `mail` */

DROP TABLE IF EXISTS `mail`;

CREATE TABLE `mail` (
  `random` varchar(40) NOT NULL,
  `account` double DEFAULT NULL,
  `email` blob,
  `character` double DEFAULT NULL,
  `mode` tinyint(4) DEFAULT NULL,
  `distination` double DEFAULT NULL,
  `requere_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`random`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
