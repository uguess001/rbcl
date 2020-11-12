-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.11 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table site.log
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity` text CHARACTER SET utf8 NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user` varchar(11) NOT NULL,
  `user_type` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table site.log: ~0 rows (approximately)
DELETE FROM `log`;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;


-- Dumping structure for table site.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `show_menu` int(1) NOT NULL DEFAULT '1',
  `show_order` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(255) DEFAULT NULL,
  `type` enum('SYS','CUST') NOT NULL DEFAULT 'CUST',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- Dumping data for table site.menu: 1 rows
DELETE FROM `menu`;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `name`, `slug`, `parent_id`, `show_menu`, `show_order`, `icon`, `type`) VALUES
	(60, 'Menu', NULL, NULL, 1, 0, NULL, 'CUST');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


-- Dumping structure for table site.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `offline` enum('0','1') NOT NULL DEFAULT '0',
  `offline_message` text NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `page_limit` int(11) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_tags` text NOT NULL,
  `google_analytics_script` text,
  `admin_email` varchar(255) NOT NULL,
  `email_from_text` varchar(50) NOT NULL,
  `address` varchar(1200) DEFAULT NULL,
  `copyright_year` varchar(1200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table site.settings: 1 rows
DELETE FROM `settings`;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `offline`, `offline_message`, `site_name`, `short_name`, `page_limit`, `meta_description`, `meta_keywords`, `meta_tags`, `google_analytics_script`, `admin_email`, `email_from_text`, `address`, `copyright_year`) VALUES
	(1, '0', 'The site is currently under maintenance. Please visit shortly.', 'Site Name', 'SITE', 5, '', '', '', '', 'shyam@dryicesolutions.net', 'Site From', NULL, '2014-2016');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;


-- Dumping structure for table site.user
CREATE TABLE IF NOT EXISTS `user` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `UserType` int(11) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `office` varchar(50) DEFAULT NULL,
  `Status` enum('1','2') DEFAULT NULL,
  `CreatedOn` varchar(50) DEFAULT NULL,
  `ModifiedOn` varchar(50) DEFAULT NULL,
  `ModifiedBy` varchar(50) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table site.user: ~1 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`UserId`, `UserType`, `UserName`, `Password`, `name`, `designation`, `office`, `Status`, `CreatedOn`, `ModifiedOn`, `ModifiedBy`, `CreatedBy`) VALUES
	(1, 1, 'admin', '0192023a7bbd73250516f069df18b500', 'Admin Admin', 'Designation', 'Adin Office', '1', '2016-06-05', '2016-09-28', '1', '');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
