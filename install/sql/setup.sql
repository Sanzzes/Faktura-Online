SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `synetics_clients`
-- ----------------------------
DROP TABLE IF EXISTS `synetics_clients`;
CREATE TABLE `synetics_clients` (
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
  `synetics_clients_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`synetics_clients_id`),
  KEY `synetics_clients_clientno` (`synetics_clients_clientno`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of synetics_clients
-- ----------------------------
INSERT INTO `synetics_clients` VALUES ('1000', 'Synetics', '', '', 'Humboldtstrasse', '101', 'Düsseldorf', '40237', 'info@synetics.de', '0049211699310', '0', '0', null, '1');

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
  PRIMARY KEY (`synetics_data_ID`),
  KEY `fk_synetics_data_synetics_system1` (`synetics_data_system_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of synetics_data
-- ----------------------------

-- ----------------------------
-- Table structure for `synetics_projects`
-- ----------------------------
DROP TABLE IF EXISTS `synetics_projects`;
CREATE TABLE `synetics_projects` (
  `synetics_projects__ID` int(11) NOT NULL AUTO_INCREMENT,
  `synetics_projects_projectname` varchar(45) CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT NULL,
  `synetics_projects_projecleader` int(11) DEFAULT NULL,
  `synetics_projects_contactpersonclient` varchar(45) CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT NULL,
  `synetics_projects_cost` int(11) DEFAULT NULL,
  `synetics_projects_drivecost` int(11) DEFAULT NULL,
  `synetics_projects_description` text CHARACTER SET latin1 COLLATE latin1_german2_ci,
  `synetics_clients_synetics_clients_clientno` int(11) NOT NULL,
  `synetics_projects_costrate` int(11) NOT NULL,
  `synetics_projects_drivecostrate` int(11) NOT NULL,
  PRIMARY KEY (`synetics_projects__ID`),
  KEY `synetics_projects_clients` (`synetics_clients_synetics_clients_clientno`),
  KEY `synetics_projects_leader` (`synetics_projects_projecleader`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of synetics_projects
-- ----------------------------
INSERT INTO `synetics_projects` VALUES ('1', 'Inhouse', '0', '', '0', '0', '', '0', '0', '0');
INSERT INTO `synetics_projects` VALUES ('2', 'PRE-SALES', '0', '', '0', '0', '', '0', '0', '0');
INSERT INTO `synetics_projects` VALUES ('3', 'Senior', '0', '', '141', '70', '', '0', '0', '0');
INSERT INTO `synetics_projects` VALUES ('4', 'Junior', '0', '', '110', '55', '', '0', '0', '0');
INSERT INTO `synetics_projects` VALUES ('5', 'i-doit Schulung', '0', '', '1350', '0', '', '0', '2', '0');

-- ----------------------------
-- Table structure for `synetics_settings`
-- ----------------------------
DROP TABLE IF EXISTS `synetics_settings`;
CREATE TABLE `synetics_settings` (
  `synetics_settings_kmset` float(11,2) DEFAULT NULL,
  `synetics_settings_dayworktime` int(11) DEFAULT '8'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of synetics_settings
-- ----------------------------
INSERT INTO `synetics_settings` VALUES ('0.40', '28800');

-- ----------------------------
-- Table structure for `synetics_system`
-- ----------------------------
DROP TABLE IF EXISTS `synetics_system`;
CREATE TABLE `synetics_system` (
  `synetics_system__ID` int(11) NOT NULL AUTO_INCREMENT,
  `synetics_system_surname` varchar(45) DEFAULT NULL,
  `synetics_system_name` varchar(45) DEFAULT NULL,
  `synetics_system_street` varchar(45) DEFAULT NULL,
  `synetics_system_no` int(11) DEFAULT NULL,
  `synetics_system_city` varchar(45) DEFAULT NULL,
  `synetics_system_zipcode` int(11) DEFAULT NULL,
  `synetics_system_tele` int(11) DEFAULT NULL,
  `synetics_system_mobile` int(11) DEFAULT NULL,
  `synetics_system_mail` varchar(45) DEFAULT NULL,
  `synetics_system_username` varchar(45) DEFAULT NULL,
  `synetics_system_password` varchar(45) DEFAULT NULL,
  `synetics_system_rights` int(45) DEFAULT NULL,
  PRIMARY KEY (`synetics_system__ID`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
