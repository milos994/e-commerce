/*
Navicat MySQL Data Transfer

Source Server         : milos
Source Server Version : 100124
Source Host           : localhost:3306
Source Database       : e-commerce

Target Server Type    : MYSQL
Target Server Version : 100124
File Encoding         : 65001

Date: 2017-07-10 10:06:42
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
  `cart_product_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cart_id`),
  KEY `fk_cart_1` (`user_id`),
  KEY `cart_product_id` (`cart_product_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cart_product_id`) REFERENCES `cart_product` (`cart_product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cart_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cart
-- ----------------------------

-- ----------------------------
-- Table structure for cart_product
-- ----------------------------
DROP TABLE IF EXISTS `cart_product`;
CREATE TABLE `cart_product` (
  `cart_product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cart_product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `cart_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cart_product
-- ----------------------------
INSERT INTO `cart_product` VALUES ('4', '8', '2017-07-10 01:20:08');
INSERT INTO `cart_product` VALUES ('5', '14', '2017-07-10 01:23:23');
INSERT INTO `cart_product` VALUES ('6', '16', '2017-07-10 01:23:28');
INSERT INTO `cart_product` VALUES ('7', '8', '2017-07-10 01:24:52');
INSERT INTO `cart_product` VALUES ('8', '8', '2017-07-10 01:25:05');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('8', 'Frank Muller', 'adasda', 'Analogni', 'sda dsdasdas das das ada sda sdasd asdas dasd asd a', 'y', '2017-07-09 22:24:49', '10999', '4');
INSERT INTO `product` VALUES ('14', 'Armani', 'Armani muski sat', 'Analogni', 'Armani muski sat ', '', '2017-07-09 15:12:54', '10999', '4');
INSERT INTO `product` VALUES ('16', 'Jacques Lemans', 'Jacques Lemans muski sat.', 'Analogni', 'Jacques Lemans novi elegantni muski sat.', 'y', '2017-07-09 23:51:07', '10998', '4');

-- ----------------------------
-- Table structure for product_category
-- ----------------------------
DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
  `product_category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(64) NOT NULL,
  `slug` varchar(64) NOT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

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
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` char(128) NOT NULL,
  `active` enum('y','n') NOT NULL DEFAULT 'y',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'korisnik', 'korisnik', 'korisnik@singimail.rs', 'korisnik', '1F57F00AA4E509A452917AC20399189B135AFDDED7455B69E24148A3F49A3D79984FA299B7EF7C96CBB8AF744C6ECCC854E518C807CB168CD31090F40ACE63AA', 'y', '2017-07-09 19:19:26', '');
INSERT INTO `user` VALUES ('9', 'Milos', 'Nesovanovic', 'milos.nesovanovic.13@singimail.rs', 'milos10', '1f57f00aa4e509a452917ac20399189b135afdded7455b69e24148a3f49a3d79984fa299b7ef7c96cbb8af744c6eccc854e518c807cb168cd31090f40ace63aa', 'y', '2017-07-09 22:57:06', '');
