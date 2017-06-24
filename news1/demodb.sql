

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `typeid` int(10) unsigned NOT NULL,
  `price` double(6,2) unsigned NOT NULL,
  `total` int(10) unsigned NOT NULL,
  `pic` varchar(32) NOT NULL,
  `note` text,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `keywords` varchar(64) NOT NULL,--
  `author` varchar(16) NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------


-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `path` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('1', '新闻', '0', '0,');
INSERT INTO `type` VALUES ('2', '体育', '0', '0,');
INSERT INTO `type` VALUES ('3', '国内新闻', '1', '0,1,');
INSERT INTO `type` VALUES ('4', '国外新闻', '1', '0,1,');
INSERT INTO `type` VALUES ('5', '十九大召开', '3', '0,1,3,');
INSERT INTO `type` VALUES ('6', '国外体育', '2', '0,2,');
INSERT INTO `type` VALUES ('7', '国内体育', '2', '0,2,');
INSERT INTO `type` VALUES ('8', 'NBA', '6', '0,2,6,');
INSERT INTO `type` VALUES ('9', '中国足球', '7', '0,2,7,');
