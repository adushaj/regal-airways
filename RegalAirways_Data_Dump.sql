-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2017 at 07:14 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `c9`
--

-- --------------------------------------------------------

--
-- Table structure for table `AIRCRAFT`
--

CREATE TABLE IF NOT EXISTS `AIRCRAFT` (
  `AID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MODEL` varchar(20) NOT NULL,
  `CAPACITY` int(4) NOT NULL,
  `MILEAGE` int(6) NOT NULL,
  `FLIGHT_RANGE` int(6) NOT NULL,
  `CLASS` int(1) NOT NULL,
  `SERVICES` int(11) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `QUANTITY` int(5) NOT NULL,
  `AVAILABLE` int(5) NOT NULL,
  PRIMARY KEY (`AID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `AIRCRAFT`
--

INSERT INTO `AIRCRAFT` (`AID`, `MODEL`, `CAPACITY`, `MILEAGE`, `FLIGHT_RANGE`, `CLASS`, `SERVICES`, `PRICE`, `QUANTITY`, `AVAILABLE`) VALUES
(1, 'Boeing 747-8', 467, 8000, 8000, 3, 1, 10000, 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `BRANCH`
--

CREATE TABLE IF NOT EXISTS `BRANCH` (
  `BID` int(10) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(80) NOT NULL,
  `CITY` varchar(30) NOT NULL,
  `STATE` char(2) DEFAULT NULL,
  `COUNTRY` varchar(30) NOT NULL,
  PRIMARY KEY (`BID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `BRANCH`
--

INSERT INTO `BRANCH` (`BID`, `NAME`, `CITY`, `STATE`, `COUNTRY`) VALUES
(1, 'Detroit Metro Wayne', 'Detroit', 'MI', 'USA'),
(3, 'Test', 'Rochester', 'MI', 'USA'),
(4, 'Willow Run Airport', 'Ypsilanti', 'MI', 'USA'),
(5, 'Bishop International Airport', 'Flint', 'MI', 'USA'),
(6, 'Heathrow Airport', 'Longford', '', 'UK'),
(7, 'Oakland Airport', 'Rochester', 'MI', 'USA'),
(8, 'Los Angeles Airport', 'Los Angeles', 'CA', 'USA'),
(9, 'Daytona Beach International Airport', 'Daytona Beach', 'FL', 'USA'),
(10, 'Denver International Airport', 'Denver', 'CO', 'USA'),
(11, 'Chicago O''Hare International Airport', 'Chicago', 'IL', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `FLIGHT`
--

CREATE TABLE IF NOT EXISTS `FLIGHT` (
  `FID` int(11) NOT NULL AUTO_INCREMENT,
  `ORIGIN_BID` int(10) NOT NULL,
  `DEST_BID` int(10) NOT NULL,
  `DEPARTDATE` date NOT NULL,
  `DEPARTTIME` time NOT NULL,
  `ARRIVALDATE` date NOT NULL,
  `ARRIVALTIME` time NOT NULL,
  `PRICE` int(32) NOT NULL,
  `AID` int(11) NOT NULL,
  PRIMARY KEY (`FID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `FLIGHT`
--

INSERT INTO `FLIGHT` (`FID`, `ORIGIN_BID`, `DEST_BID`, `DEPARTDATE`, `DEPARTTIME`, `ARRIVALDATE`, `ARRIVALTIME`, `PRICE`, `AID`) VALUES
(43, 6, 3, '2017-11-23', '17:00:00', '2017-11-24', '10:00:00', 300, 0),
(44, 4, 1, '2017-11-29', '23:11:00', '2017-11-30', '23:11:00', 200, 0),
(48, 5, 8, '2017-11-01', '11:13:00', '2017-11-02', '11:13:00', 200, 0),
(49, 8, 5, '2018-12-29', '11:14:00', '2018-12-29', '11:14:00', 3, 0),
(50, 8, 7, '2017-12-01', '12:00:00', '2017-12-01', '13:00:00', 100, 0),
(52, 10, 11, '2017-12-31', '20:00:00', '2017-12-31', '23:00:00', 275, 0),
(56, 11, 1, '2017-12-01', '09:30:00', '2017-12-01', '11:00:00', 80, 1),
(57, 1, 11, '2017-12-02', '11:00:00', '2017-12-02', '13:30:00', 95, 1),
(58, 1, 10, '2017-12-01', '14:30:00', '2017-12-01', '17:30:00', 210, 1),
(59, 8, 10, '2017-12-02', '08:00:00', '2017-12-02', '09:45:00', 140, 1);

-- --------------------------------------------------------

--
-- Table structure for table `RESERVE`
--

CREATE TABLE IF NOT EXISTS `RESERVE` (
  `RID` int(10) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(10) NOT NULL,
  `FID` int(10) NOT NULL,
  PRIMARY KEY (`RID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `RESERVE`
--

INSERT INTO `RESERVE` (`RID`, `USER_ID`, `FID`) VALUES
(16, 1, 44),
(18, 2, 44),
(19, 2, 44),
(20, 1, 59);

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE IF NOT EXISTS `USERS` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(1024) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `FNAME` varchar(30) NOT NULL,
  `LNAME` varchar(30) NOT NULL,
  `ADDRESS` varchar(30) NOT NULL,
  `CITY` varchar(30) NOT NULL,
  `STATE` char(2) NOT NULL,
  `ZIP` int(5) NOT NULL,
  `TYPE` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`USER_ID`, `EMAIL`, `PASSWORD`, `FNAME`, `LNAME`, `ADDRESS`, `CITY`, `STATE`, `ZIP`, `TYPE`) VALUES
(1, 'adushaj23@oakland.edu', '$2y$11$zqTrsaJWOUlCAc5CQ.TGe.zCP/nrNTHHsiqAcjPGxJwpgOYPfcpZW', 'Aleks', 'Dushaj', '1337 Coolguy Dr', 'Macomb', '', 48042, 1),
(2, 'trwinowiecki@oakland.edu', '$2y$11$uXK6m1UM2Wh2bLAjvd1giuXyg7q1HaGsw/EOgWKglQrRjZlW219ZG', 'Taylor', 'Winowiecki', '', '', '', 48017, 1),
(3, 'bobsmith@gmail.com', '$2y$11$oneRrZhmsIBNO1saPMRou.O3Bdcffg03ieXOYwOiG8oIvrejC/wiK', 'Bob', 'Smith', '1234 Oakland Ave', 'Rochester', 'MI', 55532, 0),
(5, 'trw0511@yahoo.com', '$2y$11$T/kCdI7Zxq7nSjmHg3uXj.WvHWCSF7vCGtT963cBUcQDQgAQcvD4S', 'John', 'Smith', '1234 Street', 'Clawson', 'Mi', 48017, 0),
(10, 'bbrothers@gmail.com', 'test12345', 'Brock', 'Brothers', '2314 Kanto Road', 'Shelby Twp', 'MI', 48310, 0),
(11, 'napolhemus@oakland.edu', '$2y$11$espEnzDsgt5rjdRLGHeV8Of0Huyuxwk2xRMmpcQlz96MjoAL3KkEO', 'Nick', 'Polhemus', 'Whoa', 'Place', 'MI', 48313, 1),
(55, 'root@regalairways.com', 'root', 'root', 'root', 'Null Street', 'Null City', 'NA', 13337, 1);
--
-- Database: `phpmyadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE IF NOT EXISTS `pma__bookmark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE IF NOT EXISTS `pma__column_info` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin' AUTO_INCREMENT=50 ;

--
-- Dumping data for table `pma__column_info`
--

INSERT INTO `pma__column_info` (`id`, `db_name`, `table_name`, `column_name`, `comment`, `mimetype`, `transformation`, `transformation_options`) VALUES
(1, 'c9', 'USERS', 'USER_ID', '', '', '_', ''),
(2, 'c9', 'USERS', 'EMAIL', '', '', '_', ''),
(3, 'c9', 'USERS', 'PASSWORD', '', '', '_', ''),
(4, 'c9', 'USERS', 'FNAME', '', '', '_', ''),
(5, 'c9', 'USERS', 'LNAME', '', '', '_', ''),
(6, 'c9', 'USERS', 'TYPE', '', '', '_', ''),
(7, 'c9', 'USERS', 'ADDRESS', '', '', '_', ''),
(8, 'c9', 'USERS', 'CITY', '', '', '_', ''),
(9, 'c9', 'USERS', 'ZIP', '', '', '_', ''),
(10, 'c9', 'AIRCRAFT', 'AID', '', '', '_', ''),
(11, 'c9', 'AIRCRAFT', 'Capacity', '', '', '_', ''),
(12, 'c9', 'AIRCRAFT', 'Mileage', '', '', '_', ''),
(13, 'c9', 'AIRCRAFT', 'Range', '', '', '_', ''),
(14, 'c9', 'AIRCRAFT', 'Class', '', '', '_', ''),
(15, 'c9', 'AIRCRAFT', 'Services', '', '', '_', ''),
(16, 'c9', 'AIRCRAFT', 'Price', '', '', '_', ''),
(17, 'c9', 'USERS', 'STATE', '', '', '_', ''),
(18, 'c9', 'FLIGHT', 'FID', '', '', '_', ''),
(19, 'c9', 'FLIGHT', 'ORIGIN', '', '', '_', ''),
(20, 'c9', 'FLIGHT', 'DESTINATION', '', '', '_', ''),
(21, 'c9', 'FLIGHT', 'DEPARTDATE', '', '', '_', ''),
(22, 'c9', 'FLIGHT', 'TIME', '', '', '_', ''),
(23, 'c9', 'FLIGHT', 'ARRIVALDATE', '', '', '_', ''),
(24, 'c9', 'FLIGHT', 'DESTINATIONTIME', '', '', '_', ''),
(25, 'c9', 'FLIGHT', 'PRICE', '', '', '_', ''),
(26, 'c9', 'BRANCH', 'BID', '', '', '_', ''),
(27, 'c9', 'BRANCH', 'NAME', '', '', '_', ''),
(28, 'c9', 'BRANCH', 'CITY', '', '', '_', ''),
(29, 'c9', 'BRANCH', 'STATE', '', '', '_', ''),
(30, 'c9', 'BRANCH', 'COUNTRY', '', '', '_', ''),
(31, 'c9', 'FLIGHT', 'DEPARTTIME', '', '', '_', ''),
(32, 'c9', 'FLIGHT', 'ARRIVALTIME', '', '', '_', ''),
(33, 'c9', 'AIRCRAFT', 'FlightRange', '', '', '_', ''),
(34, 'c9', 'FLIGHT', 'BID', '', '', '_', ''),
(35, 'c9', 'RESERVE', 'USER_ID', '', '', '_', ''),
(36, 'c9', 'RESERVE', 'RID', '', '', '_', ''),
(37, 'c9', 'RESERVE', 'FID', '', '', '_', ''),
(38, 'c9', 'FLIGHT', 'ORIGIN_BID', '', '', '_', ''),
(39, 'c9', 'FLIGHT', 'DEST_BID', '', '', '_', ''),
(40, 'c9', 'AIRCRAFT', 'QUANTITY', '', '', '_', ''),
(41, 'c9', 'AIRCRAFT', 'AVAILABLE', '', '', '_', ''),
(42, 'c9', 'AIRCRAFT', 'CAPACITY', '', '', '_', ''),
(43, 'c9', 'AIRCRAFT', 'MILEAGE', '', '', '_', ''),
(44, 'c9', 'AIRCRAFT', 'FLIGHT_RANGE', '', '', '_', ''),
(45, 'c9', 'AIRCRAFT', 'CLASS', '', '', '_', ''),
(46, 'c9', 'AIRCRAFT', 'SERVICES', '', '', '_', ''),
(47, 'c9', 'AIRCRAFT', 'PRICE', '', '', '_', ''),
(48, 'c9', 'AIRCRAFT', 'MODEL', '', '', '_', ''),
(49, 'c9', 'FLIGHT', 'AID', '', '', '_', '');

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_coords`
--

CREATE TABLE IF NOT EXISTS `pma__designer_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `v` tinyint(4) DEFAULT NULL,
  `h` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE IF NOT EXISTS `pma__history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`db`,`table`,`timevalue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE IF NOT EXISTS `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`page_nr`),
  KEY `db_name` (`db_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE IF NOT EXISTS `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('adushaj', '[{"db":"c9","table":"BRANCH"},{"db":"c9","table":"AIRCRAFT"},{"db":"c9","table":"USERS"},{"db":"c9","table":"RESERVE"},{"db":"c9","table":"FLIGHT"}]'),
('root', '[{"db":"c9","table":"FLIGHT"},{"db":"c9","table":"RESERVE"},{"db":"c9","table":"USERS"},{"db":"c9","table":"BRANCH"},{"db":"c9","table":"AIRCRAFT"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE IF NOT EXISTS `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  KEY `foreign_field` (`foreign_db`,`foreign_table`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

--
-- Dumping data for table `pma__relation`
--

INSERT INTO `pma__relation` (`master_db`, `master_table`, `master_field`, `foreign_db`, `foreign_table`, `foreign_field`) VALUES
('c9', 'FLIGHT', 'DEST_BID', 'c9', 'BRANCH', 'BID'),
('c9', 'FLIGHT', 'ORIGIN_BID', 'c9', 'BRANCH', 'BID');

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE IF NOT EXISTS `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float unsigned NOT NULL DEFAULT '0',
  `y` float unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE IF NOT EXISTS `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE IF NOT EXISTS `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`,`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE IF NOT EXISTS `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`db_name`,`table_name`,`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE IF NOT EXISTS `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_bookmark`
--

CREATE TABLE IF NOT EXISTS `pma_bookmark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_column_info`
--

CREATE TABLE IF NOT EXISTS `pma_column_info` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_designer_coords`
--

CREATE TABLE IF NOT EXISTS `pma_designer_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `v` tinyint(4) DEFAULT NULL,
  `h` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma_history`
--

CREATE TABLE IF NOT EXISTS `pma_history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`db`,`table`,`timevalue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_pdf_pages`
--

CREATE TABLE IF NOT EXISTS `pma_pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`page_nr`),
  KEY `db_name` (`db_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_recent`
--

CREATE TABLE IF NOT EXISTS `pma_recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma_relation`
--

CREATE TABLE IF NOT EXISTS `pma_relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  KEY `foreign_field` (`foreign_db`,`foreign_table`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_coords`
--

CREATE TABLE IF NOT EXISTS `pma_table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float unsigned NOT NULL DEFAULT '0',
  `y` float unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_info`
--

CREATE TABLE IF NOT EXISTS `pma_table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_uiprefs`
--

CREATE TABLE IF NOT EXISTS `pma_table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`,`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma_tracking`
--

CREATE TABLE IF NOT EXISTS `pma_tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`db_name`,`table_name`,`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_userconfig`
--

CREATE TABLE IF NOT EXISTS `pma_userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
