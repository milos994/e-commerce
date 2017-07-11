/*
Navicat MySQL Data Transfer

Source Server         : milos
Source Server Version : 100124
Source Host           : localhost:3306
Source Database       : e-commerce

Target Server Type    : MYSQL
Target Server Version : 100124
File Encoding         : 65001

Date: 2017-07-11 02:37:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` char(128) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '1F57F00AA4E509A452917AC20399189B135AFDDED7455B69E24148A3F49A3D79984FA299B7EF7C96CBB8AF744C6ECCC854E518C807CB168CD31090F40ACE63AA');
INSERT INTO `admin` VALUES ('2', 'milos', '1F57F00AA4E509A452917AC20399189B135AFDDED7455B69E24148A3F49A3D79984FA299B7EF7C96CBB8AF744C6ECCC854E518C807CB168CD31090F40ACE63AA');

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `cart_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cart_id`),
  KEY `fk_cart_1` (`user_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cart
-- ----------------------------

-- ----------------------------
-- Table structure for cart_product
-- ----------------------------
DROP TABLE IF EXISTS `cart_product`;
CREATE TABLE `cart_product` (
  `cart_product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cart_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cart_product_id`),
  KEY `cart_product_ibfk_2` (`product_id`),
  KEY `cart_product_ibfk_3` (`cart_id`),
  CONSTRAINT `cart_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cart_product_ibfk_3` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cart_product
-- ----------------------------

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cart_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('made','paid','completed') NOT NULL DEFAULT 'made',
  PRIMARY KEY (`order_id`),
  KEY `cart_id` (`cart_id`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `short_text` varchar(255) NOT NULL,
  `prikaz_sata` enum('Analogni','Digitalni') NOT NULL,
  `long_text` text NOT NULL,
  `active` enum('y','n') NOT NULL DEFAULT 'y',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` int(11) NOT NULL,
  `product_category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_ibfk_1` (`product_category_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`product_category_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('8', 'Frank Muller', 'Frank Muller elegantni muski sat.', 'Analogni', 'Frank Muller elegantni muski sat iz 2017 godine je namenjen za ozbiljne muskarce.', 'y', '2017-07-11 01:53:59', '10999', '4');
INSERT INTO `product` VALUES ('14', 'Armani 4H', 'Armani 4H muski sat.', 'Analogni', 'Armani 4H muski sat iz zimske kolekcije.', '', '2017-07-11 01:54:41', '10998', '4');
INSERT INTO `product` VALUES ('16', 'Jacques Lemans', 'Jacques Lemans', 'Analogni', 'Jacques Lemans novi elegantni muski sat.', 'y', '2017-07-11 01:54:56', '10998', '4');
INSERT INTO `product` VALUES ('37', 'Fossil 1Z', 'Fossil 1Z zenski sat', 'Analogni', 'Fossil 1-z zenski sat za ozbiljne dame', 'y', '2017-07-11 01:56:38', '9998', '5');
INSERT INTO `product` VALUES ('38', 'Armani 98h', 'Armani 98h zenski sat.', 'Analogni', 'Armani 98h eleganti zenski sat roze boje.', 'y', '2017-07-11 01:58:09', '9988', '5');
INSERT INTO `product` VALUES ('39', 'Citizen 98gh', 'Citizen 98gh', 'Analogni', 'Citizen 98gh sportski muski sat.', 'y', '2017-07-11 02:01:31', '9988', '4');
INSERT INTO `product` VALUES ('40', 'Michael Kors G998', 'Michael Kors G998', 'Analogni', 'Michael Kors G998 zenski eleganti sat.', 'y', '2017-07-11 02:02:10', '8999', '5');
INSERT INTO `product` VALUES ('41', 'Michael Kors G988', 'Michael Kors G988', 'Analogni', 'Michael Kors G988 zenski sat sa metalnom narukvicom.', 'y', '2017-07-11 02:02:53', '9988', '5');
INSERT INTO `product` VALUES ('42', 'SOliver M98', 'SOliver M98', 'Analogni', 'SOliver M98 muski sat sa metalnom narukvicom.', 'y', '2017-07-11 02:03:34', '10899', '4');
INSERT INTO `product` VALUES ('43', 'Fossil MN998', 'Fossil MN998', 'Analogni', 'Fossil MN998 musku sat izradjen od veoma kvalitetnog materijala.', 'y', '2017-07-11 02:04:39', '8998', '4');

-- ----------------------------
-- Table structure for product_category
-- ----------------------------
DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
  `product_category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(64) NOT NULL,
  `slug` varchar(64) NOT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_category
-- ----------------------------
INSERT INTO `product_category` VALUES ('4', 'Muski', 'muski');
INSERT INTO `product_category` VALUES ('5', 'Zenski', 'zenski');
INSERT INTO `product_category` VALUES ('22', 'Deciji', 'deciji');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` char(128) NOT NULL,
  `active` enum('y','n') NOT NULL DEFAULT 'y',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'korisnik', 'korisnik', 'korisnik@singimail.rs', 'korisnik', '1F57F00AA4E509A452917AC20399189B135AFDDED7455B69E24148A3F49A3D79984FA299B7EF7C96CBB8AF744C6ECCC854E518C807CB168CD31090F40ACE63AA', 'y', '2017-07-09 19:19:26', '');
INSERT INTO `user` VALUES ('9', 'Milos', 'Nesovanovic', 'milos.nesovanovic.13@singimail.rs', 'milos10', '1f57f00aa4e509a452917ac20399189b135afdded7455b69e24148a3f49a3d79984fa299b7ef7c96cbb8af744c6eccc854e518c807cb168cd31090f40ace63aa', 'y', '2017-07-09 22:57:06', '');
