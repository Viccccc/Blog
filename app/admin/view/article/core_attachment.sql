/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : blog_edu

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-10-25 22:55:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `core_attachment`
-- ----------------------------
DROP TABLE IF EXISTS `core_attachment`;
CREATE TABLE `core_attachment` (
  `id` int(11) DEFAULT NULL,
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT '会员id',
  `name` varchar(80) NOT NULL,
  `filename` varchar(300) NOT NULL COMMENT '文件名',
  `path` varchar(300) NOT NULL COMMENT '相对路径',
  `extension` varchar(10) NOT NULL DEFAULT '' COMMENT '类型',
  `createtime` int(10) NOT NULL COMMENT '上传时间',
  `size` mediumint(9) NOT NULL COMMENT '文件大小',
  `data` varchar(100) NOT NULL DEFAULT '' COMMENT '辅助信息',
  `siteid` int(11) NOT NULL COMMENT '站点编号',
  `is_member` tinyint(1) NOT NULL COMMENT '1 前台 2 后台',
  `hash` char(50) NOT NULL DEFAULT '' COMMENT '标识用于区分资源',
  PRIMARY KEY (`uid`),
  KEY `uid` (`uid`),
  KEY `data` (`data`),
  KEY `extension` (`extension`),
  KEY `hash` (`hash`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='附件';

-- ----------------------------
-- Records of core_attachment
-- ----------------------------
