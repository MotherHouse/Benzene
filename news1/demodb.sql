/*
Navicat MySQL Data Transfer

Source Server         : eryun
Source Server Version : 50622
Source Host           : 112.124.109.87:3306
Source Database       : demodb

Target Server Type    : MYSQL
Target Server Version : 50622
File Encoding         : 65001

Date: 2016-09-26 15:35:28
*/

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
INSERT INTO `goods` VALUES ('7', '范德萨', '1', '88.00', '1000', '201609260942297599.png', '可以的', '1474854149');
INSERT INTO `goods` VALUES ('5', 'ddd', '1', '11.00', '11', '201609260333188393.jpg', '范德萨分', '1474831998');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `keywords` varchar(64) NOT NULL,
  `author` varchar(16) NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', '做一个善良的人', '做一个善良的人', '做一个善良的人', '1474873680', '做一个善良的人做一个善良的人做一个善良的人做一个善良的人做一个善良的人做一个善良的人');
INSERT INTO `news` VALUES ('2', '素材火，你好。', '做一个善良的人', '做一个善良的人', '1474873694', '做一个善良的人');
INSERT INTO `news` VALUES ('3', '素材火，你好。', '做一个善良的人', '做一个善良的人', '1474873697', '做一个善良的人');
INSERT INTO `news` VALUES ('4', '素材火，你好。', '做一个善良的人', '做一个善良的人', '1474873699', '做一个善良的人');
INSERT INTO `news` VALUES ('5', '素材火，你好。', '做一个善良的人', '做一个善良的人', '1474873701', '做一个善良的人');
INSERT INTO `news` VALUES ('6', '素材火，你好。', '做一个善良的人', '做一个善良的人', '1474873893', '做一个善良的人');
INSERT INTO `news` VALUES ('7', '素材火，你好。', '做一个善良的人', '做一个善良的人', '1474873895', '做一个善良的人');

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
