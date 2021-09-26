/*
 Navicat Premium Data Transfer

 Source Server         : localhost_x8
 Source Server Type    : MariaDB
 Source Server Version : 100419
 Source Host           : localhost:3306
 Source Schema         : ucard

 Target Server Type    : MariaDB
 Target Server Version : 100419
 File Encoding         : 65001

 Date: 26/09/2021 21:05:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_bank
-- ----------------------------
DROP TABLE IF EXISTS `tbl_bank`;
CREATE TABLE `tbl_bank`  (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_nama` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bank_atas_nama` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bank_no_rek` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bank_image` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`bank_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_bank
-- ----------------------------
INSERT INTO `tbl_bank` VALUES (1, 'BCA', 'MUHAMAD EKO', '87243798232', 'bca.png');
INSERT INTO `tbl_bank` VALUES (2, 'BRI', 'MUHAMAD EKO', '83278942792', 'bri.png');
INSERT INTO `tbl_bank` VALUES (3, 'MANDIRI', 'MUHAMAD EKO', '9239232343', 'mandiri.png');
INSERT INTO `tbl_bank` VALUES (4, 'TUNAI', '-', '-', 'tunai.jpg');

SET FOREIGN_KEY_CHECKS = 1;
