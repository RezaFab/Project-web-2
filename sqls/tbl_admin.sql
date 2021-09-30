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

 Date: 29/09/2021 17:10:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_admin
-- ----------------------------
DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE `tbl_admin`  (
  `admin_id` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `admin_nama` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `admin_email` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `admin_nohp` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `admin_password` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `admin_perm_dashboard` tinyint(1) NOT NULL DEFAULT 1,
  `admin_perm_order` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_orderverifikasi` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_orderkirimdesign` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_orderpembayaran` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_orderapproval` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_ordercetakproduk` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_orderkirimambil` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_orderhistory` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_data` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_datapelanggan` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_dataproduk` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_datapenjualan` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_category` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_produk` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_template` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_templateassets` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_templatepelanggan` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_image` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_imageassets` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_imagepelanggan` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_pelanggan` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_customerservices` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_status` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_bank` tinyint(1) NOT NULL DEFAULT 0,
  `admin_perm_admin` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`admin_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_admin
-- ----------------------------
INSERT INTO `tbl_admin` VALUES ('A-1606672667', 'admin', 'admin@gmail.com', '62895360698523', '21232f297a57a5a743894a0e4a801fc3', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);
INSERT INTO `tbl_admin` VALUES ('A-1632644325', 'Yoga', 'yoga@edu.unisbank.ac.id', '6283839009856', 'd41d8cd98f00b204e9800998ecf8427e', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

SET FOREIGN_KEY_CHECKS = 1;
