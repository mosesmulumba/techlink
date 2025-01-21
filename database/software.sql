DROP TABLE IF EXISTS `software`;
CREATE TABLE IF NOT EXISTS `software` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(100) DEFAULT NULL,
  `softwaretype` varchar(100) DEFAULT NULL,
  `softwareversion` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
