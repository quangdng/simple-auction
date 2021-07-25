/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 50509
 Source Host           : localhost
 Source Database       : simpleauction

 Target Server Type    : MySQL
 Target Server Version : 50509
 File Encoding         : utf-8

 Date: 01/13/2012 21:27:14 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `admin_Name` varchar(255) NOT NULL,
  `admin_Password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_ID`),
  UNIQUE KEY `Unique_Name` (`admin_Name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `admin`
-- ----------------------------
BEGIN;
INSERT INTO `admin` VALUES ('1', 'admin', 'admin');
COMMIT;

-- ----------------------------
--  Table structure for `bid`
-- ----------------------------
DROP TABLE IF EXISTS `bid`;
CREATE TABLE `bid` (
  `bid_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `item_ID` int(11) NOT NULL,
  `user_Name` varchar(255) NOT NULL,
  `item_Name` varchar(255) NOT NULL,
  `bid_Date` varchar(255) NOT NULL,
  `bid_Price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`bid_ID`),
  KEY `user_ID` (`user_ID`),
  KEY `item_ID` (`item_ID`),
  CONSTRAINT `item_ID` FOREIGN KEY (`item_ID`) REFERENCES `items` (`item_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_ID` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `items`
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `item_ID` int(11) NOT NULL AUTO_INCREMENT,
  `item_Name` varchar(255) NOT NULL,
  `item_Description` longtext NOT NULL,
  `item_Close_Date` varchar(255) DEFAULT NULL,
  `item_Increment_Price` decimal(10,2) NOT NULL,
  `item_Actual_Price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `item_Status` int(1) NOT NULL DEFAULT '0',
  `item_Comments` varchar(255) DEFAULT NULL,
  `item_Path` varchar(255) DEFAULT NULL,
  `admin_ID` smallint(6) NOT NULL,
  `user_Name` varchar(255) DEFAULT 'None',
  PRIMARY KEY (`item_ID`),
  KEY `admin_ID` (`admin_ID`),
  CONSTRAINT `admin_ID` FOREIGN KEY (`admin_ID`) REFERENCES `admin` (`admin_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_Name` varchar(255) NOT NULL,
  `user_RealName` varchar(255) DEFAULT NULL,
  `user_Password` varchar(255) NOT NULL,
  `user_Address` varchar(255) DEFAULT NULL,
  `user_Postal` varchar(255) DEFAULT NULL,
  `user_Email` varchar(255) NOT NULL,
  `user_Phone` varchar(50) NOT NULL,
  `user_Credit` int(11) DEFAULT '10',
  `user_Date` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`user_ID`),
  UNIQUE KEY `Unique_Email` (`user_Email`),
  UNIQUE KEY `Unique_Phone` (`user_Phone`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

SET FOREIGN_KEY_CHECKS = 1;
