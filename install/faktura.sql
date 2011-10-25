/*
Navicat MySQL Data Transfer

Target Server Type    : MYSQL
Target Server Version : 50158
File Encoding         : 65001

Date: 2011-10-25 10:14:53
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `synetics_city`
-- ----------------------------
DROP TABLE IF EXISTS `synetics_city`;
CREATE TABLE `synetics_city` (
  `synetics_city_id` int(11) NOT NULL AUTO_INCREMENT,
  `synetics_city_name` varchar(200) NOT NULL,
  PRIMARY KEY (`synetics_city_id`,`synetics_city_name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of synetics_city
-- ----------------------------
INSERT INTO synetics_city VALUES ('1', 'Musterstadt');

-- ----------------------------
-- Table structure for `synetics_clients`
-- ----------------------------
DROP TABLE IF EXISTS `synetics_clients`;
CREATE TABLE `synetics_clients` (
  `synetics_clients_id` int(11) NOT NULL AUTO_INCREMENT,
  `synetics_clients_clientno` bigint(45) DEFAULT NULL,
  `synetics_clients_client` varchar(45) DEFAULT NULL,
  `synetics_clients_name` varchar(45) DEFAULT NULL,
  `synetics_clients_surname` varchar(45) DEFAULT NULL,
  `synetics_clients_street` varchar(45) DEFAULT NULL,
  `synetics_clients_no` int(11) DEFAULT NULL,
  `synetics_clients_city` varchar(45) DEFAULT NULL,
  `synetics_clients_zipcode` int(11) DEFAULT NULL,
  `synetics_clients_mail` varchar(45) DEFAULT NULL,
  `synetics_clients_tel` varchar(45) DEFAULT NULL,
  `synetics_clients_mobile` bigint(45) DEFAULT NULL,
  `synetics_clients_fax` bigint(45) DEFAULT NULL,
  `synetics_clients_projects` bigint(45) DEFAULT NULL,
  PRIMARY KEY (`synetics_clients_id`),
  KEY `synetics_clients_clientno` (`synetics_clients_clientno`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of synetics_clients
-- ----------------------------
INSERT INTO synetics_clients VALUES ('1', '11', 'Wochenende', '', '', '', '0', 'Düsseldorf', '0', '', '', '0', '0', null);
INSERT INTO synetics_clients VALUES ('2', '22', 'Feiertag', '', '', '', '0', 'Düsseldorf', '0', '', '', '0', '0', null);
INSERT INTO synetics_clients VALUES ('3', '33', 'Krank', '', '', '', '0', 'Düsseldorf', '0', '', '', '0', '0', null);
INSERT INTO synetics_clients VALUES ('4', '44', 'Urlaub', '', '', '', '0', 'Düsseldorf', '0', '', '', '0', '0', null);

-- ----------------------------
-- Table structure for `synetics_data`
-- ----------------------------
DROP TABLE IF EXISTS `synetics_data`;
CREATE TABLE `synetics_data` (
  `synetics_data_ID` int(11) NOT NULL AUTO_INCREMENT,
  `synetics_data_date` int(11) DEFAULT NULL,
  `synetics_data_client` int(45) DEFAULT NULL,
  `synetics_data_city` varchar(45) DEFAULT NULL,
  `synetics_data_outjourneyex` int(11) DEFAULT '1303768800',
  `synetics_data_outjourneyto` int(11) DEFAULT '1303768800',
  `synetics_data_worktimefrom` int(11) DEFAULT '1303768800',
  `synetics_data_worktimeto` int(11) DEFAULT '1303768800',
  `synetics_data_pause` int(11) DEFAULT '1303768800',
  `synetics_data_wtpause` int(11) DEFAULT '1303768800',
  `synetics_data_servicehourrate` int(11) DEFAULT NULL,
  `synetics_data_servicedayrate` int(11) DEFAULT NULL,
  `synetics_data_whichcar` int(11) DEFAULT NULL,
  `synetics_data_driveoverall` int(11) DEFAULT NULL,
  `synetics_data_drivehourrate` int(11) DEFAULT NULL,
  `synetics_data_km` int(11) DEFAULT NULL,
  `synetics_data_kmrate` int(11) DEFAULT NULL,
  `synetics_data_hotel` int(11) DEFAULT '0',
  `synetics_data_hotelgarni` int(3) NOT NULL,
  `synetics_data_expenses` int(11) DEFAULT '0',
  `synetics_data_oil` int(11) DEFAULT '0',
  `synetics_data_train` int(11) DEFAULT '0',
  `synetics_data_airfare` int(11) DEFAULT '0',
  `synetics_data_rentalcar` int(11) DEFAULT '0',
  `synetics_data_parking` int(11) DEFAULT '0',
  `synetics_data_taxi` int(11) DEFAULT '0',
  `synetics_data_freight` int(11) DEFAULT '0',
  `synetics_data_hospitality` int(11) DEFAULT '0',
  `synetics_data_citytrain` int(11) DEFAULT '0',
  `synetics_data_foodoverall` float(11,2) DEFAULT '0.00',
  `synetics_data_returnjourneyex` int(11) DEFAULT '1303768800',
  `synetics_data_text` text,
  `synetics_data_returnjourneyto` int(11) DEFAULT '1303768800',
  `synetics_data_system_id` int(11) DEFAULT NULL,
  `synetics_data_projects_id` int(11) DEFAULT NULL,
  `synetics_data_process_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`synetics_data_ID`),
  KEY `fk_synetics_data_synetics_system1` (`synetics_data_system_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of synetics_data
-- ----------------------------

-- ----------------------------
-- Table structure for `synetics_distribution`
-- ----------------------------
DROP TABLE IF EXISTS `synetics_distribution`;
CREATE TABLE `synetics_distribution` (
  `synetics_distribution_ID` int(11) NOT NULL AUTO_INCREMENT,
  `synetics_distribution_kmrate` int(11) DEFAULT NULL,
  `synetics_distribution_hotel` int(11) DEFAULT '0',
  `synetics_distribution_oil` int(11) DEFAULT '0',
  `synetics_distribution_train` int(11) DEFAULT '0',
  `synetics_distribution_airfare` int(11) DEFAULT '0',
  `synetics_distribution_rentalcar` int(11) DEFAULT '0',
  `synetics_distribution_parking` int(11) DEFAULT '0',
  `synetics_distribution_taxi` int(11) DEFAULT '0',
  `synetics_distribution_freight` int(11) DEFAULT '0',
  `synetics_distribution_hospitality` int(11) DEFAULT '0',
  `synetics_distribution_citytrain` int(11) DEFAULT '0',
  `synetics_distribution_DataID` int(11) DEFAULT '0',
  PRIMARY KEY (`synetics_distribution_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of synetics_distribution
-- ----------------------------

-- ----------------------------
-- Table structure for `synetics_holiday`
-- ----------------------------
DROP TABLE IF EXISTS `synetics_holiday`;
CREATE TABLE `synetics_holiday` (
  `synetics_holiday_id` int(11) NOT NULL AUTO_INCREMENT,
  `synetics_holiday_appid` int(11) NOT NULL,
  `synetics_holiday_apporder` int(11) NOT NULL,
  `synetics_holiday_appfromper` varchar(11) NOT NULL,
  `synetics_holiday_appfrom` bigint(20) NOT NULL,
  `synetics_holiday_appto` bigint(20) NOT NULL,
  `synetics_holiday_days` int(11) NOT NULL,
  `synetics_holiday_accepted` int(11) NOT NULL,
  PRIMARY KEY (`synetics_holiday_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of synetics_holiday
-- ----------------------------

-- ----------------------------
-- Table structure for `synetics_process`
-- ----------------------------
DROP TABLE IF EXISTS `synetics_process`;
CREATE TABLE `synetics_process` (
  `synetics_process_id` int(11) NOT NULL AUTO_INCREMENT,
  `synetics_process_name` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`synetics_process_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of synetics_process
-- ----------------------------
INSERT INTO synetics_process VALUES ('1', 'Beispiel 1');
INSERT INTO synetics_process VALUES ('2', 'Beispiel 2');

-- ----------------------------
-- Table structure for `synetics_projects`
-- ----------------------------
DROP TABLE IF EXISTS `synetics_projects`;
CREATE TABLE `synetics_projects` (
  `synetics_projects__ID` int(11) NOT NULL AUTO_INCREMENT,
  `synetics_projects_projectname` varchar(45) NOT NULL,
  `synetics_projects_projecleader` int(11) NOT NULL,
  `synetics_projects_contactpersonclient` varchar(45) NOT NULL,
  `synetics_projects_cost` int(11) NOT NULL,
  `synetics_projects_drivecost` int(11) NOT NULL,
  `synetics_projects_description` text NOT NULL,
  `synetics_projects_costrate` int(11) NOT NULL,
  `synetics_projects_drivecostrate` int(11) NOT NULL,
  `synetics_clients_synetics_clients_clientno` int(11) NOT NULL,
  PRIMARY KEY (`synetics_projects__ID`),
  KEY `synetics_projects_clients` (`synetics_clients_synetics_clients_clientno`),
  KEY `synetics_projects_leader` (`synetics_projects_projecleader`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of synetics_projects
-- ----------------------------

-- ----------------------------
-- Table structure for `synetics_settings`
-- ----------------------------
DROP TABLE IF EXISTS `synetics_settings`;
CREATE TABLE `synetics_settings` (
  `synetics_settings_kmset` float(11,2) DEFAULT NULL,
  `synetics_settings_kmsetper` float(11,2) DEFAULT NULL,
  `synetics_settings_dayworktime` int(11) DEFAULT '8',
  `synetics_settings_daypause` int(11) DEFAULT NULL,
  `synetics_settings_maxlisten` int(11) DEFAULT NULL,
  `synetics_settings_holidayid` int(11) DEFAULT NULL,
  `synetics_settings_weekendid` int(11) DEFAULT NULL,
  `synetics_settings_illid` int(11) DEFAULT NULL,
  `synetics_settings_freeid` int(11) DEFAULT NULL,
  `synetics_settings_appid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of synetics_settings
-- ----------------------------
INSERT INTO synetics_settings VALUES ('0.40', '0.30', '28800', '108000', '16', '2', '1', '3', '4', '1');

-- ----------------------------
-- Table structure for `synetics_system`
-- ----------------------------
DROP TABLE IF EXISTS `synetics_system`;
CREATE TABLE `synetics_system` (
  `synetics_system__ID` int(11) NOT NULL AUTO_INCREMENT,
  `synetics_system_name` varchar(45) DEFAULT NULL,
  `synetics_system_street` varchar(45) DEFAULT NULL,
  `synetics_system_city` varchar(45) DEFAULT NULL,
  `synetics_system_zipcode` int(11) DEFAULT NULL,
  `synetics_system_tele` varchar(200) DEFAULT NULL,
  `synetics_system_weekwork` int(11) DEFAULT NULL,
  `synetics_system_weekhour` float(11,1) DEFAULT '0.0',
  `synetics_system_mail` varchar(45) DEFAULT NULL,
  `synetics_system_pw` varchar(200) DEFAULT NULL,
  `synetics_system_username` varchar(45) DEFAULT NULL,
  `synetics_system_rights` int(45) DEFAULT NULL,
  PRIMARY KEY (`synetics_system__ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of synetics_system
-- ----------------------------
INSERT INTO synetics_system VALUES ('1', 'Admin', '', '', null, '', null, null, '', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2');
