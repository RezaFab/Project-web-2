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

 Date: 26/09/2021 21:02:26
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

-- ----------------------------
-- Table structure for tbl_cs
-- ----------------------------
DROP TABLE IF EXISTS `tbl_cs`;
CREATE TABLE `tbl_cs`  (
  `cs_id` int(11) NOT NULL AUTO_INCREMENT,
  `cs_nama` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cs_nohp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cs_daerah` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cs_foto` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cs_status` int(11) NOT NULL,
  PRIMARY KEY (`cs_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_cs
-- ----------------------------
INSERT INTO `tbl_cs` VALUES (1, 'nama', '6281232600700', 'Jakarta 1', '1.jpeg', 1);
INSERT INTO `tbl_cs` VALUES (2, 'nama', '6285967068047', 'Jakarta 2', 'default.png', 1);
INSERT INTO `tbl_cs` VALUES (3, 'nama', '6282118394404', 'Surabaya 1', '3.jpg', 1);
INSERT INTO `tbl_cs` VALUES (4, 'nama', '6282334999234', 'Surabaya 2', '4.jpg', 1);

-- ----------------------------
-- Table structure for tbl_design
-- ----------------------------
DROP TABLE IF EXISTS `tbl_design`;
CREATE TABLE `tbl_design`  (
  `design_id` int(11) NOT NULL AUTO_INCREMENT,
  `design_user_id` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `design_nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `design_design` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `design_image` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `design_width` int(11) NOT NULL,
  `design_height` int(11) NOT NULL,
  `design_category` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`design_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 88 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_design
-- ----------------------------
INSERT INTO `tbl_design` VALUES (85, 'A-1606672667', 'text', '{\"version\":\"2.3.6\",\"objects\":[{\"type\":\"textbox\",\"version\":\"2.3.6\",\"originX\":\"left\",\"originY\":\"top\",\"left\":128,\"top\":76.33,\"width\":300,\"height\":22.6,\"fill\":\"#5dc2d5\",\"stroke\":null,\"strokeWidth\":1,\"strokeDashArray\":null,\"strokeLineCap\":\"butt\",\"strokeLineJoin\":\"miter\",\"strokeMiterLimit\":4,\"scaleX\":4.04,\"scaleY\":4.04,\"angle\":1,\"flipX\":false,\"flipY\":false,\"opacity\":1,\"shadow\":null,\"visible\":true,\"clipTo\":null,\"backgroundColor\":\"\",\"fillRule\":\"nonzero\",\"paintFirst\":\"fill\",\"globalCompositeOperation\":\"source-over\",\"transformMatrix\":null,\"skewX\":0,\"skewY\":0,\"text\":\"Lorem ipsum dolor sit amet,\",\"fontSize\":20,\"fontWeight\":\"\",\"fontFamily\":\"helvetica\",\"fontStyle\":\"normal\",\"lineHeight\":1.16,\"underline\":false,\"overline\":false,\"linethrough\":false,\"textAlign\":\"left\",\"textBackgroundColor\":\"\",\"charSpacing\":0,\"minWidth\":20,\"styles\":{}},{\"type\":\"textbox\",\"version\":\"2.3.6\",\"originX\":\"left\",\"originY\":\"top\",\"left\":185,\"top\":457,\"width\":300,\"height\":22.6,\"fill\":\"#8fd240\",\"stroke\":null,\"strokeWidth\":1,\"strokeDashArray\":null,\"strokeLineCap\":\"butt\",\"strokeLineJoin\":\"miter\",\"strokeMiterLimit\":4,\"scaleX\":5.03,\"scaleY\":5.03,\"angle\":-9,\"flipX\":false,\"flipY\":false,\"opacity\":1,\"shadow\":null,\"visible\":true,\"clipTo\":null,\"backgroundColor\":\"\",\"fillRule\":\"nonzero\",\"paintFirst\":\"fill\",\"globalCompositeOperation\":\"source-over\",\"transformMatrix\":null,\"skewX\":0,\"skewY\":0,\"text\":\"Lorem ipsum dolor sit amet,\",\"fontSize\":20,\"fontWeight\":\"\",\"fontFamily\":\"helvetica\",\"fontStyle\":\"normal\",\"lineHeight\":1.16,\"underline\":false,\"overline\":false,\"linethrough\":false,\"textAlign\":\"left\",\"textBackgroundColor\":\"\",\"charSpacing\":0,\"minWidth\":20,\"styles\":{}}]}', '600091c3762e2.png', 2000, 1000, 'ONLINE SHOP');
INSERT INTO `tbl_design` VALUES (86, 'A-1606672667', 'robot biru', '{\"version\":\"2.3.6\",\"objects\":[{\"type\":\"rect\",\"version\":\"2.3.6\",\"originX\":\"left\",\"originY\":\"top\",\"left\":999.33,\"top\":-30.5,\"width\":50,\"height\":50,\"fill\":\"#0704e7\",\"stroke\":null,\"strokeWidth\":1,\"strokeDashArray\":null,\"strokeLineCap\":\"butt\",\"strokeLineJoin\":\"miter\",\"strokeMiterLimit\":4,\"scaleX\":20.72,\"scaleY\":20.72,\"angle\":0,\"flipX\":false,\"flipY\":false,\"opacity\":1,\"shadow\":null,\"visible\":true,\"clipTo\":null,\"backgroundColor\":\"\",\"fillRule\":\"nonzero\",\"paintFirst\":\"fill\",\"globalCompositeOperation\":\"source-over\",\"transformMatrix\":null,\"skewX\":0,\"skewY\":0,\"rx\":0,\"ry\":0},{\"type\":\"image\",\"version\":\"2.3.6\",\"originX\":\"left\",\"originY\":\"top\",\"left\":690,\"top\":170,\"width\":600,\"height\":600,\"fill\":\"rgb(0,0,0)\",\"stroke\":null,\"strokeWidth\":0,\"strokeDashArray\":null,\"strokeLineCap\":\"butt\",\"strokeLineJoin\":\"miter\",\"strokeMiterLimit\":4,\"scaleX\":1,\"scaleY\":1,\"angle\":0,\"flipX\":false,\"flipY\":false,\"opacity\":1,\"shadow\":null,\"visible\":true,\"clipTo\":null,\"backgroundColor\":\"\",\"fillRule\":\"nonzero\",\"paintFirst\":\"fill\",\"globalCompositeOperation\":\"source-over\",\"transformMatrix\":null,\"skewX\":0,\"skewY\":0,\"crossOrigin\":\"\",\"cropX\":0,\"cropY\":0,\"src\":\"http://localhost/ucard/image_assets/printio.png\",\"filters\":[]}]}', '60009260da7a8.png', 2000, 1000, 'Custom');
INSERT INTO `tbl_design` VALUES (87, 'A-1606672667', 'monyet', '{\"version\":\"2.3.6\",\"objects\":[{\"type\":\"image\",\"version\":\"2.3.6\",\"originX\":\"left\",\"originY\":\"top\",\"left\":456.67,\"top\":-88.33,\"width\":708,\"height\":472,\"fill\":\"rgb(0,0,0)\",\"stroke\":null,\"strokeWidth\":0,\"strokeDashArray\":null,\"strokeLineCap\":\"butt\",\"strokeLineJoin\":\"miter\",\"strokeMiterLimit\":4,\"scaleX\":2.27,\"scaleY\":2.27,\"angle\":0,\"flipX\":false,\"flipY\":false,\"opacity\":1,\"shadow\":null,\"visible\":true,\"clipTo\":null,\"backgroundColor\":\"\",\"fillRule\":\"nonzero\",\"paintFirst\":\"fill\",\"globalCompositeOperation\":\"source-over\",\"transformMatrix\":null,\"skewX\":0,\"skewY\":0,\"crossOrigin\":\"\",\"cropX\":0,\"cropY\":0,\"src\":\"http://localhost/ucard/image_assets/pantai2.jpg\",\"filters\":[]},{\"type\":\"textbox\",\"version\":\"2.3.6\",\"originX\":\"left\",\"originY\":\"top\",\"left\":777.48,\"top\":191.72,\"width\":300,\"height\":22.6,\"fill\":\"#ffffff\",\"stroke\":null,\"strokeWidth\":1,\"strokeDashArray\":null,\"strokeLineCap\":\"butt\",\"strokeLineJoin\":\"miter\",\"strokeMiterLimit\":4,\"scaleX\":3.96,\"scaleY\":3.96,\"angle\":359.53,\"flipX\":false,\"flipY\":false,\"opacity\":1,\"shadow\":null,\"visible\":true,\"clipTo\":null,\"backgroundColor\":\"\",\"fillRule\":\"nonzero\",\"paintFirst\":\"fill\",\"globalCompositeOperation\":\"source-over\",\"transformMatrix\":null,\"skewX\":0,\"skewY\":0,\"text\":\"WELCOME TO UCARD\",\"fontSize\":20,\"fontWeight\":\"bold\",\"fontFamily\":\"helvetica\",\"fontStyle\":\"normal\",\"lineHeight\":1.16,\"underline\":false,\"overline\":false,\"linethrough\":false,\"textAlign\":\"left\",\"textBackgroundColor\":\"\",\"charSpacing\":0,\"minWidth\":20,\"styles\":{}},{\"type\":\"image\",\"version\":\"2.3.6\",\"originX\":\"left\",\"originY\":\"top\",\"left\":78.44,\"top\":19.56,\"width\":4761,\"height\":6735,\"fill\":\"rgb(0,0,0)\",\"stroke\":null,\"strokeWidth\":0,\"strokeDashArray\":null,\"strokeLineCap\":\"butt\",\"strokeLineJoin\":\"miter\",\"strokeMiterLimit\":4,\"scaleX\":0.16,\"scaleY\":0.16,\"angle\":0,\"flipX\":false,\"flipY\":false,\"opacity\":1,\"shadow\":null,\"visible\":true,\"clipTo\":null,\"backgroundColor\":\"\",\"fillRule\":\"nonzero\",\"paintFirst\":\"fill\",\"globalCompositeOperation\":\"source-over\",\"transformMatrix\":null,\"skewX\":0,\"skewY\":0,\"crossOrigin\":\"\",\"cropX\":0,\"cropY\":0,\"src\":\"http://localhost/ucard/image_user/Untitled%20design.png\",\"filters\":[]}],\"background\":\"#ffffff\"}', '6001ddc4f3d77.png', 2000, 1000, 'Custom');

-- ----------------------------
-- Table structure for tbl_design_kirim
-- ----------------------------
DROP TABLE IF EXISTS `tbl_design_kirim`;
CREATE TABLE `tbl_design_kirim`  (
  `design_id` int(11) NOT NULL AUTO_INCREMENT,
  `design_transaksi_id` int(11) NOT NULL,
  `design_image` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`design_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 86 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_design_kirim
-- ----------------------------
INSERT INTO `tbl_design_kirim` VALUES (38, 66, '273.jpg');
INSERT INTO `tbl_design_kirim` VALUES (39, 67, 'IMG-20190908-WA0043.jpg');
INSERT INTO `tbl_design_kirim` VALUES (47, 68, '10.jpg');
INSERT INTO `tbl_design_kirim` VALUES (48, 95, 'burjo warmindo.PNG');
INSERT INTO `tbl_design_kirim` VALUES (50, 96, 'Rekap Nilai SMKN 1 Wonogiri.xlsx');
INSERT INTO `tbl_design_kirim` VALUES (51, 96, 'PPKN Tugas Mandiri 6.4.pdf');
INSERT INTO `tbl_design_kirim` VALUES (53, 97, 'chat.txt');
INSERT INTO `tbl_design_kirim` VALUES (54, 97, 'ACES 8 MARET 21.png');
INSERT INTO `tbl_design_kirim` VALUES (55, 97, 'ACES 8 MARET 21.png');
INSERT INTO `tbl_design_kirim` VALUES (56, 97, 'CARA MEMAHAMI DENGAN MUDAH STOCHASTIC CHART-1.pdf');
INSERT INTO `tbl_design_kirim` VALUES (57, 97, 'chat.txt');
INSERT INTO `tbl_design_kirim` VALUES (58, 98, 'btr domba.jpg');
INSERT INTO `tbl_design_kirim` VALUES (59, 98, 'BRPT RABU 3-2-21.png');
INSERT INTO `tbl_design_kirim` VALUES (60, 98, 'chat.txt');
INSERT INTO `tbl_design_kirim` VALUES (62, 99, 'chat.txt');
INSERT INTO `tbl_design_kirim` VALUES (63, 99, 'Book1.xlsx');
INSERT INTO `tbl_design_kirim` VALUES (66, 99, 'Tugas Mandiri 3.1.pdf');
INSERT INTO `tbl_design_kirim` VALUES (69, 103, 'chat (2).txt');
INSERT INTO `tbl_design_kirim` VALUES (70, 103, '18.UNISBANK.jpg');
INSERT INTO `tbl_design_kirim` VALUES (71, 104, 'advokasi.jpg');
INSERT INTO `tbl_design_kirim` VALUES (72, 105, 'Bincang Permi 2.png');
INSERT INTO `tbl_design_kirim` VALUES (73, 106, 'Bincang Permi 2.png');
INSERT INTO `tbl_design_kirim` VALUES (74, 107, 'Bincang Permi 2.png');
INSERT INTO `tbl_design_kirim` VALUES (75, 108, '');
INSERT INTO `tbl_design_kirim` VALUES (76, 110, 'FORM PENGAJUAN POTONGAN SPP (Respons).xlsx');
INSERT INTO `tbl_design_kirim` VALUES (77, 111, 'TugasRSAKelA1R1_DimasAzrialAkbar_1801530103_.docx');
INSERT INTO `tbl_design_kirim` VALUES (78, 111, 'Kerupuk.docx');
INSERT INTO `tbl_design_kirim` VALUES (79, 114, 'DAFTAR PERBAIKAN SMKN 1 Wonogiri.docx');
INSERT INTO `tbl_design_kirim` VALUES (80, 120, 'pai 1.JPG');
INSERT INTO `tbl_design_kirim` VALUES (81, 121, 'milih keyword.xlsx');
INSERT INTO `tbl_design_kirim` VALUES (82, 121, 'wahid 1.jpeg');
INSERT INTO `tbl_design_kirim` VALUES (83, 124, 'deletable.xlsx');
INSERT INTO `tbl_design_kirim` VALUES (84, 124, '5_6172297707240030609.pdf');
INSERT INTO `tbl_design_kirim` VALUES (85, 125, 'Screenshot_20201023_081256.jpg');

-- ----------------------------
-- Table structure for tbl_image
-- ----------------------------
DROP TABLE IF EXISTS `tbl_image`;
CREATE TABLE `tbl_image`  (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_admin_id` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`image_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_image
-- ----------------------------
INSERT INTO `tbl_image` VALUES (1, 'A-1606672667', 'logo.png');
INSERT INTO `tbl_image` VALUES (2, 'A-1606672667', 'printio.png');
INSERT INTO `tbl_image` VALUES (4, 'A-1606672667', 'perahu.jpg');
INSERT INTO `tbl_image` VALUES (5, 'A-1606672667', 'mountain1.jpg');
INSERT INTO `tbl_image` VALUES (6, 'A-1606672667', 'mountain2.jpg');
INSERT INTO `tbl_image` VALUES (7, 'A-1606672667', 'mountain3.jpg');
INSERT INTO `tbl_image` VALUES (8, 'A-1606672667', 'pantai.jpg');
INSERT INTO `tbl_image` VALUES (9, 'A-1606672667', 'pantai2.jpg');
INSERT INTO `tbl_image` VALUES (10, 'A-1606672667', 'logo-kartuidcard-white.png');
INSERT INTO `tbl_image` VALUES (11, 'A-1606672667', 'logo-kartuidcard-blue.png');
INSERT INTO `tbl_image` VALUES (12, 'A-1606672667', 'icon.png');

-- ----------------------------
-- Table structure for tbl_pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pelanggan`;
CREATE TABLE `tbl_pelanggan`  (
  `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT,
  `pelanggan_nohp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pelanggan_nama` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pelanggan_email` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pelanggan_lahir` date NOT NULL,
  `pelanggan_password` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pelanggan_alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pelanggan_refrensi` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pelanggan_telephone` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pelanggan_kecamatan` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pelanggan_kabupaten` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pelanggan_kodepost` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pelanggan_status` int(11) NOT NULL,
  `pelanggan_resetcode` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pelanggan_resetcode_expire` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`pelanggan_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_pelanggan
-- ----------------------------
INSERT INTO `tbl_pelanggan` VALUES (25, '6283839009856', 'Amarizky Yoga Pratama', 'amarizky02@gmail.com', '2000-06-09', 'cbfdb78cc34ea59e6b77941c7efd6dfe', 'Jalan Brantas No.22 01/03 Kebondalem, Pemalang, Pemalang, Central Java', 'Google/website', '083839009856', 'Pemalang', 'Pemalang', '52312', 1, 'Y7OLP88c', '2021-09-03 05:57:01');
INSERT INTO `tbl_pelanggan` VALUES (28, '628597499159', 'Reza Fabriza Lesmana', 'reza@gmail.com', '1984-11-19', 'bb98b1d0b523d5e783f931550d7702b6', 'Komplek AKPOL BLOK C No.2', 'Google/website', '08597499159', 'Gajah Mungkur', '628597499159', '50232', 1, NULL, NULL);

-- ----------------------------
-- Table structure for tbl_product
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product`  (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_kode` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_category` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_image` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `product_nama` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_keunggulan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `product_keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `product_harga` int(11) NOT NULL,
  PRIMARY KEY (`product_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_product
-- ----------------------------
INSERT INTO `tbl_product` VALUES (1, 'P1', 'AKSESORIS ID CARD, PERKANTORAN', 'Chasing ID Card.jpg', 'Chasing ID Card', 'Chasing ID Card atau yang biasa disebut dengan frame card holder adalah salah satu produk aksesoris produk id card dari UCard yang memiliki fungsi untuk menempatkan id card yang berguna untuk melidungi kartu agar tidak mudah rusak.', 'Full Color\r\nProses Cepat\r\nKualitas Premium\r\nHarga Kompetitif', '', 5000);
INSERT INTO `tbl_product` VALUES (3, 'P2', 'AKSESORIS ID CARD, PERKANTORAN', 'Logo Resin.jpg', 'Logo Resin', 'Logo Resin merupakan Logo dari sebuah perusahaan yang di tempelkan di Yoyo ID Card Anda. Guna untuk mempercantik tampilan ID Card Anda', 'Full Color\r\nProses Cepat\r\nKualitas Premium\r\nHarga Kompetitif', '', 2450);
INSERT INTO `tbl_product` VALUES (4, 'P3', 'AKSESORIS ID CARD, PENDIDIKAN, PERKANTORAN', 'Tali ID Card.jpg', 'Tali ID Card', 'Tali ID Card atau Lanyard biasa digunakan seseorang yang bekerja sebagai panitia event  atau para karyawan yang bekerja di sebuah perusahaan. Fungsi dari Tali ID Card yaitu digunakan untuk menggantung ID card.  Karena karyawan atau panitia event harus menggunakan tanda pengenal agar mudah di kenali.', 'Variasi Warna Tali Lengkap\r\nHarga Kompetitif\r\nFinishing Beragam\r\nBahan Polyester Berkualitas\r\nPengait Besi Berkualitas\r\nProses Cepat', 'Bahan : Tali Polyester dan Tisu Ukuran : 90cm x 2cm , 90cm x 1,5cm , 90cm x 1cm Tambahan : Pengait Besi , Tanpa Stopper , Plus Stopper Teknik : Teknik Sablon dan Teknik Printing', 2450);
INSERT INTO `tbl_product` VALUES (5, 'P4', 'AKSESORIS ID CARD, PERKANTORAN', 'Yoyo Putar ID Card.jpg', 'Yoyo Putar ID Card', 'Yoyo ID Card adalah aksesories yang menyerupai bandul yang biasanya disematkan pada saku bagian atas pakaian. Yoyo id card biasanya berbentuk bentuk bulat,  Diameter yoyo sangat beragam namun pada umumnya berdiameter 3cm. Yang fungsinya untuk menggantungkan ide card Anda.', 'Tersedia Berbagai Pilihan Warna\r\nKualitas Terbaik\r\nAwet\r\nJaminan Harga Terbaik', NULL, 2450);
INSERT INTO `tbl_product` VALUES (6, 'P5', 'AKSESORIS ID CARD, PERKANTORAN', 'Yoyo Standar ID Card.jpg', 'Yoyo Standar ID Card', 'Yoyo id card adalah aksesories id card yang menyerupai bandul yang biasanya disematkan pada saku bagian atas pakaian. Yoyo id card biasanya berbentuk bentuk bulat,  Diameter yoyo sangat beragam namun pada umumnya berdiameter 3cm.', 'Tersedia Berbagai Pilihan Warna\r\nKualitas Terbaik\r\nAwet\r\nJaminan Harga Terbaik', NULL, 2450);
INSERT INTO `tbl_product` VALUES (7, 'P6', 'ANGGOTA PARTAI, CETAK KARTU PVC, HOTEL & APARTMENT, KARAOKE, KESEHATAN, KLINIK KECANTIKAN, KOMUNITAS, ONLINE SHOP, PARKING SYSTEM, PERGUDANGAN (WAREHOUSE), PERKANTORAN, PERPUSTAKAAN, RESTAURANT, RETAIL, TEMPAT HIBURAN', 'Cetak Kartu E-Money.jpg', 'Cetak Kartu E-Money\r\n', 'Kartu E-Money merupakan uang elektronik yang sering kali kita gunakan untuk membayar tol, transportasi umum, bayar parkir kendaraan, atau juga bisa digunakan untuk berbelanja. Contoh kartu e-money seperti TapCash BNI, E-money Mandiri, Brizzi BRI, Flazz BCA. Untuk pengisiannya dengan cara kita top up saldo E-Money melalui m-banking, atau minimarket.', 'Jaminan Harga Terbaik\r\nAnti Mengelupas\r\nHasil Timbul\r\nLebih Eksklusif\r\nGaransi Hasil Cetak', 'Material : PVC Polyvinyl Chloride (Standar ATM)\r\nSize : 5,4cm x 8,5cm\r\nTechnical : UV Print\r\nDesign : Full Color (Dua Sisi)\r\nPersonalized : Customized', 2450);
INSERT INTO `tbl_product` VALUES (8, 'P7', 'ANGGOTA PARTAI, CETAK KARTU NAMA, HOTEL & APARTMENT, KLINIK KECANTIKAN, KOMUNITAS, ONLINE SHOP, PENDIDIKAN, PERKANTORAN, RETAIL, TEMPAT HIBURAN', 'Cetak Kartu Nama PVC 2 Sisi.jpg', 'Cetak Kartu Nama PVC 2 Sisi', 'Kartu Nama ini terbuat dari bahan dasar PVC yang berarti kartu nama ini awet, tahan luntur jika terkena air, atau tidak robek. Kartu ini memiliki 2 sisi bagian depan dan belakang, yang dapat memberi banyak informasi didalam kartu tersebut.', 'Lebih Eksklusif\r\nAnti Luntur\r\nTahan Lama\r\nHarga Kompetitif\r\nAnti Air', 'Material : PVC Polyvinyl Chloride\r\nColor of Material : White\r\nDesign : Full Color (Dua Sisi)\r\nSize : 5,4cm x 8,5cm\r\nThick : 0,25mm\r\nTechnical : Digital Print / Offset Print\r\nPersonalized : Customized', 2450);
INSERT INTO `tbl_product` VALUES (9, 'P8', 'ANGGOTA PARTAI, CETAK KARTU NAMA, HOTEL & APARTMENT, KARAOKE, KLINIK KECANTIKAN, KOMUNITAS, ONLINE SHOP, PENDIDIKAN, RESTAURANT, RETAIL', 'Cetak Kartu Nama Transparan Doff.jpg', 'Cetak Kartu Nama Transparan Doff', 'Kartu nama transparan ini menggunakan lapisan laminasi yang mana membuat kartu nama Anda tampil lebih elegan. Cocok bagi Anda yang memiliki rekan bisnis atau pun pelanggan prioritas sebab kartu dapat menunjang image Anda di mata para rekan bisnis maupun customer.', 'Lebih Eksklusif\r\nAnti Luntur\r\nTahan Lama\r\nHarga Kompetitif\r\nAnti Air', 'Material : PVC Polyvinyl Chloride Transparent\r\nDesign : Full Color (Satu Sisi)\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nLaminas: Doff\r\nPersonalized : Customized', 2450);
INSERT INTO `tbl_product` VALUES (10, 'P9', 'ANGGOTA PARTAI, CETAK KARTU NAMA, HOTEL & APARTMENT, KLINIK KECANTIKAN, KOMUNITAS, ONLINE SHOP, PERKANTORAN', 'Cetak Kartu Nama Transparan Glossy.jpg', 'Cetak Kartu Nama Transparan Glossy', 'Kartu nama transparan ini menggunakan laminasi Glossy. Kartu ini berbeda dengan kartu nama lainnya yang membuat kartu ini lebih elegan. Cocok bagi Anda yang ingin tampil lebih eksklusif. Karena kartu berguna untuk meningkatkan image Anda di mata para rekan bisnis maupun customer.', 'Lebih Eksklusif\r\nAnti Luntur\r\nTahan Lama\r\nHarga Kompetitif\r\nAnti Air', 'Material : PVC Polyvinyl Chloride Transparent\r\nDesign : Full Color (Satu Sisi)\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nLaminasi: Glossy\r\nPersonalized : Customized', 2450);
INSERT INTO `tbl_product` VALUES (11, 'P10', 'ANGGOTA PARTAI, CETAK KARTU PVC', 'Cetak Kartu Partai Caleg.jpg', 'Cetak Kartu Partai/ Caleg', 'Kartu Partai/caleg di gunakan untuk para anggota partai politik. Biasanya kartu ini digunakan untuk promosi atau souvenir.', 'Anti Mengelupas\r\nAnti Luntur\r\nTahan Lama\r\nHarga Kompetitif\r\nKualitas Setara ATM', 'Material : PVC Polyvinyl Chloride (Standar ATM)\r\nColor of Material : White / Silver / Gold\r\nDesign : Full Color (Dua Sisi)\r\nSize : 5,4cm x 8,5cm\r\nThick : 0,83mm\r\nTechnical : Digital Print / Offset Print\r\nPersonalized : Customized', 2450);
INSERT INTO `tbl_product` VALUES (12, 'P11', 'ANGGOTA PARTAI, CETAK KARTU PVC, HOTEL & APARTMENT, HOTEL MANAGEMENT, KARAOKE, KESEHATAN, KLINIK KECANTIKAN, KOMUNITAS, ONLINE SHOP, PABRIK & MANUFACTURING, PARKING SYSTEM, PERGUDANGAN (WAREHOUSE), PERKANTORAN, PERPUSTAKAAN, RESTAURANT, RETAIL, TEMPAT HIBURAN', 'Cetak Kartu Pegawai ID Card.jpg', 'Cetak Kartu Pegawai/ ID Card', 'Kartu Pegawai / Id Card merupakan sebuah tanda pengenal dari sebuah perusahaan. Kartu ID Card berfungsi untuk mengetahui identitas dan jabatan orang tersebut. Biasanya isi dari kartu Id Card adalah nama, foto, jabatan, nama perusahaan, dan sebagainya.', 'Free Personalisasi\r\nAnti Luntur\r\nAnti Mengelupas\r\nHarga Kompetitif\r\nKualitas Setara ATM', 'Spesifikasi Kartu ID Card :\r\nMaterial : PVC Polyvinyl Chloride (Standar ATM)\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nThick : 0,83mm\r\nDesign : Full Color (Dua Sisi)\r\nPersonalized : Photo & Data Staff', 2450);
INSERT INTO `tbl_product` VALUES (13, 'P12', 'ANGGOTA PARTAI, FINISHING KARTU, HOTEL & APARTMENT, KARAOKE, KESEHATAN, KLINIK KECANTIKAN, KOMUNITAS, PABRIK & MANUFACTURING, PARKING SYSTEM, PENDIDIKAN, PERGUDANGAN (WAREHOUSE), PERKANTORAN, PERPUSTAKAAN, RESTAURANT, RETAIL, TEMPAT HIBURAN', 'Emboss.jpg', 'Emboss', 'Emboss adalah proses menatah kartu, atau membuat kartu jadi bertekstur. Dengan emboss, bagian tertentu pada kertas akan terasa timbul. Contohnya seperti angka / kode pada kartu yang terletak di kartu ATM. Dimana untuk finishing pewarnaan foil setelah embossing terdapat 2 warna yaitu gold dan silver yang biasanya kita ketahui.', 'Lebih Eksklusif\r\nAnti Luntur\r\nTahan Lama\r\nHarga Kompetitif\r\nStandar ATM', 'Material : PVC Polyvinyl Chloride\r\nColor of Material : White\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nThick : 0,83mm\r\nDesign : Full Color (Dua Sisi)\r\nPersonalized : Customized\r\nFinishing : Emboss', 2450);
INSERT INTO `tbl_product` VALUES (14, 'P13', 'CARD READER & ENCORDER', 'Card Reader RFID Mifare.jpg', 'Card Reader RFID Mifare', 'Reader smart card mifare S50 ini dapat membaca jenis kartu RFID. Cara penggunaannya cukup mudah dengan sistem plug and play device ini sudah dapat digunakan untuk membaca kode di dalamnya. Keunggulan dari pembaca ini adalah bahwa yang dikemas dalam plastik, memiliki LED dan buzzer untuk menunjukkan bila kartu dapat dibaca', NULL, NULL, 2450);
INSERT INTO `tbl_product` VALUES (15, 'P14', 'CARD READER & ENCORDER', 'Card Reader RFID Proximity.jpg', 'Card Reader RFID Proximity', 'Reader EM4100 smart card Proximity ini dapat membaca jenis kartu RFID. Cara penggunaannya cukup mudah dengan sistem plug and play device ini sudah dapat digunakan untuk membaca kode di dalamnya. Keunggulan dari pembaca ini adalah bahwa yang dikemas dalam plastik, memiliki LED dan buzzer untuk menunjukkan bila kartu dapat dibaca', NULL, NULL, 2450);
INSERT INTO `tbl_product` VALUES (16, 'P15', 'CARD READER & ENCORDER', 'Encorder Magnetik.jpg', 'Encorder Magnetik', 'Encorder Magnetik untuk membaca dan menulis kartu magnetic (visa, master, debit, id card, member card, dll.) dengan tingkat kehandalan dan presisi tinggi. Interface USB yang tidak membutuhkan driver khusus dan mampu membaca berbagai jenis standar magnetic. Sangat sesuai digunakan untuk pembacaan kartu kredit/debit serta kartu pelanggan toko anda.', NULL, NULL, 2450);
INSERT INTO `tbl_product` VALUES (17, 'P16', 'CETAK FLASHDISK CARD, HOTEL & APARTMENT, HOTEL MANAGEMENT, ONLINE SHOP, PABRIK & MANUFACTURING, PENDIDIKAN, PERKANTORAN', 'Flashdisk Card.jpg', 'Flashdisk Card 16GB', 'Kini flashdisk berbentuk kartu atm sudah ada. Untuk memudahkan kita menyimpan agar tidak mudah hilang karena bisa di simpan di dompet. Dan kita bisa custom sendiri desain dari kartu flashdisk tersebut. Kartu flashdisk ini cocok untuk dijadikan sebuah souvenir, merchandize, kepada rekan kerja kita.', 'Tersedia Berbagai Kapasitas\r\nLebih Eksklusif\r\nTahan Lama\r\nMudah Disimpan\r\nHarga Kompetitif', 'Size : 5,5×8,5cm\r\nThick : 1mm\r\nDesign : Full Color (Dua Sisi)\r\nCapacity : 16gb', 2450);
INSERT INTO `tbl_product` VALUES (18, 'P17', 'CETAK FLASHDISK CARD, HOTEL & APARTMENT, HOTEL MANAGEMENT, ONLINE SHOP, PABRIK & MANUFACTURING, PENDIDIKAN, PERKANTORAN', 'Flashdisk Card.jpg', 'Flashdisk Card 8GB', 'Kini flashdisk berbentuk kartu atm sudah ada. Untuk memudahkan kita menyimpan agar tidak mudah hilang karena bisa di simpan di dompet. Dan kita bisa custom sendiri desain dari kartu flashdisk tersebut. Kartu flashdisk ini cocok untuk dijadikan sebuah souvenir, merchandize, kepada rekan kerja kita.', 'Tersedia Berbagai Kapasitas\r\nLebih Eksklusif\r\nTahan Lama\r\nMudah Disimpan\r\nHarga Kompetitif', 'Size : 5,5×8,5cm\r\nThick : 1mm\r\nDesign : Full Color (Dua Sisi)\r\nCapacity : 8gb', 2450);
INSERT INTO `tbl_product` VALUES (19, 'P18', 'CETAK FLASHDISK CARD, HOTEL & APARTMENT, HOTEL MANAGEMENT, ONLINE SHOP, PABRIK & MANUFACTURING, PENDIDIKAN, PERKANTORAN', 'Flashdisk Card.jpg', 'Flashdisk Card 4GB', 'Kini flashdisk berbentuk kartu atm sudah ada. Untuk memudahkan kita menyimpan agar tidak mudah hilang karena bisa di simpan di dompet. Dan kita bisa custom sendiri desain dari kartu flashdisk tersebut. Kartu flashdisk ini cocok untuk dijadikan sebuah souvenir, merchandize, kepada rekan kerja kita.', 'Tersedia Berbagai Kapasitas\r\nLebih Eksklusif\r\nTahan Lama\r\nMudah Disimpan\r\nHarga Kompetitif', 'Size : 5,5×8,5cm\r\nThick : 1mm\r\nDesign : Full Color (Dua Sisi)\r\nCapacity : 4gb', 2450);
INSERT INTO `tbl_product` VALUES (20, 'P19', 'CETAK KARTU NAMA, HOTEL & APARTMENT, HOTEL MANAGEMENT, KLINIK KECANTIKAN, KOMUNITAS, ONLINE SHOP, PENDIDIKAN, PERKANTORAN, RETAIL, TEMPAT HIBURAN', 'Cetak Kartu Nama PVC 1 Sisi.jpg', 'Cetak Kartu Nama PVC 1 Sisi', 'Kartu Nama ini berbahan dasar PVC. Yang berarti kartu nama ini sangat awet dan tahan lama. Tak perlu khawatir untuk luntur kena air, atau robek. Kartu Nama PVC ini membuat kartu nama Anda menjadi lebih ekslusif.', 'Lebih Eksklusif\r\nAnti Luntur\r\nTahan Lama\r\nHarga Kompetitif\r\nAnti Air', 'Material : PVC Polyvinyl Chloride\r\nColor of Material : White\r\nDesign : Full Color (Satu Sisi)\r\nSize : 5,4cm x 8,5cm\r\nThick : 0,25mm\r\nTechnical : Digital Print / Offset Print\r\nPersonalized : Customized', 2450);
INSERT INTO `tbl_product` VALUES (21, 'P20', 'CETAK KARTU PVC, HOTEL & APARTMENT, KESEHATAN, KLINIK KECANTIKAN, PABRIK & MANUFACTURING, PARKING SYSTEM, PENDIDIKAN, PERGUDANGAN (WAREHOUSE), PERKANTORAN, PERPUSTAKAAN, TEMPAT HIBURAN', 'Cetak Kartu Akses.jpg', 'Cetak Kartu Akses', 'Kartu Akses berfungsi sebagai alat akses untuk menuju area seperti pabrik, apartement, kamar hotel, perusahaan swasta, dan lain sebagainya yang tidak bisa semua orang bisa memasuki area tersebut. Kartu akses ini memiliki 3 jenis teknologi yaitu sistem scan barcode, sistem swipe magnetic atau sistem tap RFID', 'Chip Bergaransi\r\nLebih Eksklusif\r\nAnti Mengelupas\r\nHarga Kompetitif\r\nKualitas Setara Credit Card', 'Material : PVC Polyvinyl Chloride (Standar ATM)\r\nColor of Material : White / Silver / Gold\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nThick : 0,83mm\r\nSystem : Barcode / Magnetic Stripe / RFID System\r\nDesign : Full Color (Dua Sisi)\r\nPersonalized : Blanko or Full Data Customized', 2450);
INSERT INTO `tbl_product` VALUES (22, 'P21', 'CETAK KARTU PVC, KESEHATAN, ONLINE SHOP, PABRIK & MANUFACTURING, PERGUDANGAN (WAREHOUSE), RETAIL', 'Cetak Kartu Asuransi.jpg', 'Cetak Kartu Asuransi', 'Kartu Asuransi merupakan kartu yang di gunakan bahwa Anda sebagai pemegang polis asuransi tersebut. Kartu tersebut berfungsi sebagai saat Anda klaim melakukan pengobatan di rumah sakit atau lainnya. Dalam Kartu Asuransi biasanya berisi informasi nama pemegang polis disertai nomor polis.', 'Anti Mengelupas\r\nAnti Luntur\r\nTahan Lama\r\nHarga Kompetitif\r\nKualitas Setara ATM', 'Material : PVC Polyvinyl Chloride (Standar ATM)\r\nColor of Material : White / Silver / Gold\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nThick : 0,83mm\r\nDesign : Full Color (Dua Sisi)\r\nPersonalized : Nama & Nomor Pemegang Polis', 2450);
INSERT INTO `tbl_product` VALUES (23, 'P22', 'CETAK KARTU PVC, ONLINE SHOP, PABRIK & MANUFACTURING, RETAIL', 'Cetak Kartu Garansi.jpg', 'Cetak Kartu Garansi', 'Kartu Garansi merupakan kartu yang menjamin produk tersebut bebas dari kerusakan yang di jamin oleh produsen. Biasanya kartu ini diberikan setelah Anda membeli produk elektronik, spare part, consumer good dsb dimana adanya risiko kerusakan.  Kartu ini biasanya untuk penambahan informasi seperti nama atau keterangan lainnya, toko mencetaknya sendiri dengan ID Card Printer.', 'Anti Mengelupas\r\nAnti Luntur\r\nTahan Lama\r\nHarga Kompetitif\r\nKualitas Setara ATM', 'Material : PVC Polyvinyl Chloride (Standar ATM)\r\nColor of Material : White / Silver / Gold\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nThick : 0,83mm\r\nDesign : Full Color (Dua Sisi)\r\nPersonalized : Customized', 2450);
INSERT INTO `tbl_product` VALUES (24, 'P23', 'CETAK KARTU PVC, HOTEL & APARTMENT, HOTEL MANAGEMENT, KARAOKE, KLINIK KECANTIKAN, RESTAURANT, RETAIL, TEMPAT HIBURAN', 'Cetak Kartu Gold.jpg', 'Cetak Kartu Gold', 'Kartu Gold adalah jenis kartu yang memiliki warna gold memberi kesan elegan.  Kartu ini merupakan inovasi terbaru dan masih jarang digunakan di kalangan masyarakat. Biasanya kartu ini digunakan untuk kartu privilege, kartu VIP, priority card, atau kartu member prioritas sehingga terkesan lebih eksklusif.', 'Lebih Eksklusif\r\nAnti Mengelupas\r\nAnti Luntur\r\nHarga Kompetitif\r\nKualitas Setara Credit Card', 'Material : PVC Polyvinyl Chloride (Standar ATM)\r\nColor of Material : Gold\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nThick : 0,83mm\r\nDesign : Full Color (Dua Sisi)', 2450);
INSERT INTO `tbl_product` VALUES (25, 'P24', 'CETAK KARTU PVC, HOTEL & APARTMENT, HOTEL MANAGEMENT', 'Cetak Kartu Hotel Swipe.jpg', 'Cetak Kartu Hotel Swipe', 'Kartu hotel swipe merupakan kartu pengganti kunci manual untuk kamar hotel. Dengan cara kita hanya swipe kartu tersebut ke pintu kamar hotel untuk mendapatkan akses kamar. Dan biasanya tidak untuk akses ke kamar saja namun ke lift, aksek outdoor seperti kolam renang, dan sebagainya.\r\n\r\n', 'Anti Mengelupas\r\nAnti Luntur\r\nTahan Lama\r\nHarga Kompetitif\r\nKualitas Setara ATM', 'Material : PVC Polyvinyl Chloride (Standar ATM)\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nMedia : Magnetic LOCO / HICO\r\nThick : 0,83mm\r\nDesign : Full Color (Dua Sisi)\r\nPersonalized : Customized', 2450);
INSERT INTO `tbl_product` VALUES (26, 'P25', 'CETAK KARTU PVC, HOTEL & APARTMENT, HOTEL MANAGEMENT', 'Cetak Kartu Hotel Tap.jpg', 'Cetak Kartu Hotel Tap', 'Kartu hotel tap adalah kartu akses yang berfungsi sebagai pengganti kunci manual. Yang mana pada sistem lock sudah terintegrasi dengan software sistem Hotel. Kini sudah ada teknologi kartu RFID yang kita hanya perlu tap kartu tersebut untuk mendapatkan akses.', 'Chip Bergaransi\r\nLebih Eksklusif\r\nAnti Mengelupas\r\nHarga Kompetitif\r\nKualitas Setara Credit Card', 'Material : PVC Polyvinyl Chloride (Standar ATM)\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nMedia : RFID Mifare / Proximity\r\nThick : 0,9mm\r\nDesign : Full Color (Dua Sisi)\r\nPersonalized : Customized', 2450);
INSERT INTO `tbl_product` VALUES (27, 'P26', 'CETAK KARTU PVC', 'Cetak Kartu ID Card.jpg', 'Cetak Kartu ID Card', 'Kartu id card merupakan sebuah tanda pengenal dari sebuah perusahaan. Kartu ID Card berfungsi untuk mengetahui identitas dan jabatan orang tersebut. Biasanya isi dari kartu Id Card adalah nama, foto, jabatan, nama perusahaan, dan sebagainya.', 'Lebih Ekslusif\r\nAnti Baret\r\nTahan Lama\r\nHarga Kompetitif\r\nKualitas Setara Kredit Card', 'Material : PVC Polyvinyl Chloride (Standar ATM)\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nThick : 0,83mm\r\nDesign : Full Color (Dua Sisi)\r\nPersonalized : Photo & Data Staff\r\n\r\nBerat	56 kg\r\nDimensi	122 × 121 × 451 cm', 2450);
INSERT INTO `tbl_product` VALUES (28, 'P27', 'CETAK KARTU PVC, HOTEL & APARTMENT, HOTEL MANAGEMENT, KARAOKE, KESEHATAN, KLINIK KECANTIKAN, PENDIDIKAN, PERKANTORAN, PERPUSTAKAAN, RESTAURANT, RETAIL, TEMPAT HIBURAN', 'Cetak Kartu Magnetik.jpg', 'Cetak Kartu Magnetik', 'Kartu magnetik adalah Kartu PVC yang ditambahkan dengan striping magnetik yang tak lain fungsi magnetik tersebut untuk menyimpan data . Cara penggunannya yaitu dengan sistem swipe (gesek), tersedia 2 jenis stripes magnetik. Diantaranya ialah HICO & LOCO. HICO mempunyai ciri berwarna hitam pekat sedangkan magnetik LOCO berwarna cokelat.', 'Lebih Eksklusif\r\nAnti Baret\r\nTahan Lama\r\nHarga Kompetitif\r\nKualitas Setara Credit Card', 'Material : PVC Polyvinyl Chloride (Standar ATM)\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nThick : 0,83mm\r\nDesign : Full Color (Dua Sisi)\r\nPersonalized : Customized', 2450);
INSERT INTO `tbl_product` VALUES (29, 'P28', 'CETAK KARTU PVC, PENDIDIKAN, PERPUSTAKAAN', 'Cetak Kartu Mahasiswa.jpg', 'Cetak Kartu Mahasiswa', 'Kartu Mahasiswa merupakan kartu identitas yang wajib dimiliki seorang mahasiswa baik perguruan tinggi swasta maupun perguruan tinggi negeri. Kartu ini biasanya untuk penambahan informasi seperti nama atau keterangan lainnya, perguruan tinggi mencetaknya sendiri dengan ID Card Printer.', 'Anti Mengelupas\r\nAnti Baret\r\nAnti Luntur\r\nTahan Lama\r\nHarga Kompetitif', 'Material : PVC Polyvinyl Chloride (Standar ATM)\r\nColor of Material : White / Silver / Gold\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nThick : 0,83mm\r\nDesign : Full Color (Dua Sisi)\r\nPersonalized : Customized', 2450);
INSERT INTO `tbl_product` VALUES (30, 'P29', 'CETAK KARTU PVC, KARAOKE, KLINIK KECANTIKAN, KOMUNITAS, ONLINE SHOP, PERPUSTAKAAN, RESTAURANT, RETAIL, TEMPAT HIBURAN', 'Cetak Kartu Member.jpg', 'Cetak Kartu Member', 'Kartu Member adalah kartu yang sering di gunakan oleh sebuah perusahaan, seperti perusahaan retail, salon, restaurant atau lainnya untuk memberi untuk memberi reward kepada pelanggannya. Member Card juga digunakan untuk kebutuhan dari sebuah organisasi, club, dan sebagainya . Kartu Member untuk sebuah organisasi biasanya berisi identitas seseorang atau data mengenai nama dan nomor keanggotaannya.', 'Lebih Eksklusif\r\nAnti Baret\r\nTahan Lama\r\nHarga Kompetitif\r\nKualitas Setara Credit Card', 'Material : PVC Polyvinyl Chloride (Standar ATM)\r\nColor of Material : White / Silver / Gold\r\nDesign : Full Color (Dua Sisi)\r\nSize : 5,4cm x 8,5cm\r\nThick : 0,83mm\r\nTechnical : Digital Print / Offset Print\r\nPersonalized : Nomorator / Barcode / Nama Pelanggan', 2450);
INSERT INTO `tbl_product` VALUES (31, 'P30', 'CETAK KARTU PVC', 'Cetak Kartu NPWP.jpg', 'Cetak Kartu NPWP', 'Nomor Pokok Wajib Pajak (NPWP) wajib dimiliki warga Indonesia.Baik perseorangan maupun badan usaha. NPWP ini digunakan sebagai sarana administrasi acuan untuk membayar pajak. Kartu NPWP biasanya terdiri dari Kop Pajak, Nomor NPWP, Nama, Alamat dan Tanggal Terdarfar kartu tersebut.', 'Anti Mengelupas\r\nAnti Luntur\r\nTahan Lama\r\nHarga Kompetitif\r\nKualitas Setara ATM', 'Material : PVC Polyvinyl Chloride (Standar ATM)\r\nColor of Material : White / Silver / Gold\r\nDesign : Full Color (Dua Sisi)\r\nSize : 5,4cm x 8,5cm\r\nThick : 0,83mm\r\nTechnical : Digital Print / Offset Print\r\nPersonalized : Customized', 2450);
INSERT INTO `tbl_product` VALUES (32, 'P31', 'CETAK KARTU PVC, HOTEL & APARTMENT, HOTEL MANAGEMENT, KARAOKE, KESEHATAN, KLINIK KECANTIKAN, PABRIK & MANUFACTURING, PARKING SYSTEM, PERGUDANGAN (WAREHOUSE), PERKANTORAN, PERPUSTAKAAN, RESTAURANT, RETAIL, TEMPAT HIBURAN', 'Cetak Kartu Parkir.jpg', 'Cetak Kartu Parkir', 'Kartu Parkir merupakan kartu yang menunjukkan bahwa Anda sedang parkir kendaraan di suatu area. Biasanya banyak diaplikasikan di pusat perbelanjaan (mall), rumah sakit, hotel, instansi pemerintah, kantor swasta hingga di lingkungan pendidikan seperti sekolah dan universitas.', 'Anti Mengelupas\r\nAnti Luntur\r\nTahan Lama\r\nHarga Kompetitif\r\nKualitas Setara ATM', 'Material : PVC Polyvinyl Chloride (Standar ATM)\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nThick : 0,83mm\r\nDesign : Full Color (Dua Sisi)\r\nPersonalized : Customized', 2450);
INSERT INTO `tbl_product` VALUES (33, 'P32', 'CETAK KARTU PVC, KESEHATAN', 'Cetak Kartu Pasien.jpg', 'Cetak Kartu Pasien', 'Kartu Pasien adalah kartu yang wajib dimiliki oleh pasien sebuah rumah sakit, klinik, atau puskesmas. Fungsi dari Kartu Pasien adalah untuk  me-manajemen data pasien guna mempermudah saat hendak melakukan pemeriksaan, pengobatan ataupun check up.', 'Anti Mengelupas\r\nAnti Baret\r\nAnti Luntur\r\nTahan Lama\r\nHarga Kompetitif', 'Material : PVC Polyvinyl Chloride (Standar ATM)\r\nColor of Material : White / Silver / Gold\r\nDesign : Full Color (Dua Sisi)\r\nSize : 5,4cm x 8,5cm\r\nThick : 0,83mm\r\nTechnical : Digital Print / Offset Print\r\nPersonalized : Customized', 2450);
INSERT INTO `tbl_product` VALUES (34, 'P33', 'CETAK KARTU PVC, PENDIDIKAN, PERPUSTAKAAN', 'Cetak Kartu Pelajar.jpg', 'Cetak Kartu Pelajar', 'Kartu Pelajar merupakan kartu identitas siswa yang wajib dimiliki. Yang digunakan di sekolah-sekolah baik SD, SMP ataupun SMA. Kartu Pelajar biasanya berisi informasi dari data siswa seperti foto, kelas, nama siswa, NIS, alamat dan lainnya.', 'Free Personalisasi\r\nAnti Luntur\r\nAnti Mengelupas\r\nHarga Kompetitif\r\nKualitas Setara ATM', 'Spesifikasi Kartu Pelajar :\r\nMaterial : PVC Polyvinyl Chloride (Standar ATM)\r\nDesign : Full Color (Dua Sisi)\r\nSize : 5,4cm x 8,5cm\r\nThick : 0,83mm\r\nTechnical : Digital Print / Offset Print\r\nPersonalized : Photo & Data Pelajar', 2450);
INSERT INTO `tbl_product` VALUES (35, 'P34', 'CETAK KARTU PVC, ID CARD PRINTER, KESEHATAN, KLINIK KECANTIKAN, PERKANTORAN, PERPUSTAKAAN, RETAIL', 'Cetak Kartu Pre Printed Blanko.jpg', 'Cetak Kartu Pre Printed/ Blanko', 'Kartu pre printed merupakan kartu yang berisikan background suatu perusahaan yang belum tercantum sebuah informasi . Biasanya untuk penambahan informasi seperti nama atau keterangan lainnya, perusahaan mencetaknya sendiri dengan ID Card Printer . Kartu ini paling sering digunakan oleh rumah sakit untuk mencetak kartu pasien.', 'Anti Mengelupas\r\nAnti Baret\r\nAnti Luntur\r\nTahan Lama\r\nHarga Kompetitif', 'Material : PVC Polyvinyl Chloride (Standar ATM)\r\nColor of Material : White / Silver / Gold\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nThick : 0,83mm\r\nDesign : Full Color (Dua Sisi)\r\nPersonalized : Customized', 2450);
INSERT INTO `tbl_product` VALUES (36, 'P35', 'CETAK KARTU PVC, HOTEL & APARTMENT, KARAOKE, KLINIK KECANTIKAN, RESTAURANT, RETAIL, TEMPAT HIBURAN', 'Cetak Kartu Silver.jpg', 'Cetak Kartu Silver', 'Kartu Silver merupakan inovasi terbaru dari jenis kartu, yang mana memiliki warna silver. Yang membuat kartu tersebut tampil lebih mewah.  Kartu ini masih sangat jarang di gunakan oleh kalangan masyarakat. Biasanya kartu ini digunakan untuk kartu VIP, Privilege, atau Member Prioritas yang membuat kesan eksklusif.', 'Lebih Eksklusif\r\nAnti Mengelupas\r\nAnti Luntur\r\nHarga Kompetitif\r\nKualitas Setara Credit Card', 'Material : PVC Polyvinyl Chloride (Standar ATM)\r\nColor of Material : Silver\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nThick : 0,83mm\r\nDesign : Full Color (Dua Sisi)', 2450);
INSERT INTO `tbl_product` VALUES (37, 'P36', 'CETAK KARTU PVC, HOTEL & APARTMENT, KARAOKE, KOMUNITAS, PARKING SYSTEM, PENDIDIKAN, PERGUDANGAN (WAREHOUSE), PERKANTORAN, PERPUSTAKAAN, TEMPAT HIBURAN', 'Cetak Kartu Visitor.jpg', 'Cetak Kartu Visitor', 'Kartu Visitor adalah kartu yang biasanya diberikan oleh receptionis / security untuk tamu yang hendak mengunjungi sebuah perusahaan dan melakukan pertemuan dengan salah seorang staff di perusahaan terkait. Fungsi lain dari Kartu Visitor ini agar bisa membedakan antara tamu dengan staff dari perusahaan tersebut.\r\n\r\n', 'Anti Mengelupas\r\nAnti Luntur\r\nTahan Lama\r\nHarga Kompetitif\r\nKualitas Setara ATM', 'Material : PVC Polyvinyl Chloride (Standar ATM)\r\nColor of Material : White / Silver / Gold\r\nDesign : Full Color (Dua Sisi)\r\nSize : 5,4cm x 8,5cm\r\nThick : 0,83mm\r\nTechnical : Digital Print / Offset Print\r\nPersonalized : Nomorator', 2450);
INSERT INTO `tbl_product` VALUES (38, 'P37', 'CETAK KARTU RFID', 'Cetak Kartu RFID Mifare.jpg', 'Cetak Kartu RFID Mifare', 'Kartu RFID Mifare merupakan smart card dimana di dalam kartu juga tertanam mikro chip yang memiliki memori untuk menyimpan data dan ukuran ketebalannya yaitu 0,96mm. Frekuensi yang dimiliki kartu mifare adalah 13,56Mhz. Sedangkan memorinya terdiri dari 1K, 4K dan 8K. Cara penggunaannnya yaitu hanya cukup hanya di tap mesin reader yang telah disikronisasikan.', 'Chip Bergaransi\r\nLebih Eksklusif\r\nAnti Mengelupas\r\nHarga Kompetitif\r\nKualitas Setara Credit Card', 'Material : PVC Polyvinyl Chloride\r\nColor of Material : White\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nThick : 0,96mm\r\nChip : Mifare S50\r\nFrekuensi : 13,56MHz\r\nMemory : 1K\r\nDesign : Full Color (Dua Sisi)\r\nPersonalized : Customized', 2450);
INSERT INTO `tbl_product` VALUES (39, 'P38', 'CETAK KARTU RFID', 'Cetak Kartu RFID Proximity.jpg', 'Cetak Kartu RFID Proximity', 'Kartu RFID proximity adalah kartu yang di dalamnya telah tertanam mikro chip yang memiliki frekuensi 125Khz. Kartu jenis proximity ini tidak terdapat memory yang mendukung pengguna untuk mengisikan data. Namun di dalam kartu tersebut sudah terdapat nomor unik yang dapat disinkronisasikan.', 'Chip Bergaransi\r\nLebih Eksklusif\r\nAnti Mengelupas\r\nHarga Kompetitif\r\nKualitas Setara Credit Card', 'Material : PVC Polyvinyl Chloride\r\nColor of Material : White\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nThick : 0,96mm\r\nChip : Proximity EM4100\r\nFrekuensi : 125KHz\r\nDesign : Full Color (Dua Sisi)\r\nPersonalized : Customized', 2450);
INSERT INTO `tbl_product` VALUES (40, 'P39', 'FINISHING KARTU', 'Hologram.jpg', 'Hologram', 'Hologram berguna untuk menunjukkan keaslian dari suatu produk, yang hanya bisa di deteksi mesin UV, maka kartu Anda tidak mudah di duplikasikan oleh pihak yang tidak bertanggung jawab. Kami menyediakan 2 macam jenis hologram yaitu 2D dan 3D yang bisa disesuaikan dengan kebutuhan Anda.', 'Lebih Eksklusif\r\nAda pilihan 2D dan 3D\r\nKualitas Terbaik\r\nProses Cepat\r\nStandar ATM', 'Material : PVC Polyvinyl Chloride\r\nColor of Material : White\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nThick : 0,83mm\r\nDesign : Full Color (Dua Sisi)\r\nPersonalized : Customized\r\nFinishing : Hologram', 2450);
INSERT INTO `tbl_product` VALUES (41, 'P40', 'FINISHING KARTU', 'HotPrint.jpg', 'HotPrint', 'Hotprint adalah  teknik finishing ini melibatkan kertas tinta emas atau perak yang membuat teks atau logo menjadi warna mengkilap. Biasanya di terapkan pada logo suatu perusahaan atau teks.', 'Lebih Eksklusif\r\nAnti Luntur\r\nTahan Lama\r\nHarga Kompetitif\r\nStandar ATM', 'Material : PVC Polyvinyl Chloride\r\nColor of Material : White\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nThick : 0,83mm\r\nDesign : Full Color (Dua Sisi)\r\nPersonalized : Customized\r\nFinishing : Hot Print', 2450);
INSERT INTO `tbl_product` VALUES (42, 'P41', 'FINISHING KARTU, KARAOKE, KOMUNITAS, ONLINE SHOP, TEMPAT HIBURAN', 'Kartu Gosok.jpg', 'Kartu Gosok', 'Kartu gosok atau scratch card biasanya digunakan menyembunyikan PIN atau pun kode rahasia lainnya. Cara penggunaan dengan menggosok bagian yang tertutup menggunakan koin, kartu ini biasanya digunakan untuk voucher, kartu hotspot dan sebagainya.', 'Lebih Eksklusif\r\nAnti Luntur\r\nTahan Lama\r\nHarga Kompetitif\r\nStandar ATM', 'Material : PVC Polyvinyl Chloride\r\nColor of Material : White\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nThick : 0,83mm\r\nDesign : Full Color (Dua Sisi)\r\nPersonalized : Customized\r\nFinishing : Label Gosok', 2450);
INSERT INTO `tbl_product` VALUES (43, 'P42', 'FINISHING KARTU, KOMUNITAS, PERKANTORAN', 'Signature Panel.jpg', 'Signature Panel', 'Signature Panel merupakan area kosong yang biasanya di gunakan untuk menulis tanda tangan pemilik kartu menggunakan bolpoint atau menulis informasi penting lainnya di kartu.', 'Lebih Eksklusif\r\nAnti Luntur\r\nTahan Lama\r\nHarga Kompetitif\r\nStandar ATM', 'Material : PVC Polyvinyl Chloride\r\nColor of Material : White\r\nSize : 5,4cm x 8,5cm\r\nTechnical : Digital Print / Offset Print\r\nThick : 0,83mm\r\nDesign : Full Color (Dua Sisi)\r\nPersonalized : Customized\r\nFinishing : Signature Panel', 2450);
INSERT INTO `tbl_product` VALUES (44, 'P43', 'ID CARD PRINTER', 'Datacard CD 800.jpg', 'Datacard CD 800', 'Datacard SD800 adalah printer ID Card terbaru yang memiliki berbagai kelebihan di banding dengan yang lain di kelasnya diantaranya kapasitas yang lebih besar dan speed lebih cepat dalam pencetakan, juga menghasilkan gambar yang sangat tajam.', NULL, 'Spesifikasi :\r\n– Print Method : Dye Sublimation (Direct-to-Card)\r\n– Resolution : 300 dpi\r\n– Accepted Card Size : CR-80 (53.9885.6mm)\r\n– Accepted Card Thickness : 0.25-1.00mm (10-40mil)\r\n– Accepted Card Type : PVC or polyester cards with polished PVC finish\r\n– Input Hopper Card Capacity : 100 cards (0.76mm/30mil)\r\n– Driver Compatible OS : WinXP, Vista, Win7 (32/64bit), Win8 (32/64bit), Win10\r\nMac OS X 10.6 or above\r\n– Interface : USB 2.0 + LAN (Ethernet)\r\n– Power : 24.5V, 100W DC Adapter\r\n– Optional Encoding Modules : Contact smart IC card encoding module, Contactless (RFID) encoding module, ISO14443A, ISO14443B, ISO15693, Magnetic stripe card encoding module ISO7811 (Hi-co & Low-co)', 2450);
INSERT INTO `tbl_product` VALUES (45, 'P44', 'ID CARD PRINTER', 'Datacard CD 868.jpg', 'Datacard CD 868', 'Datacard CD868 adalah printer Dual Sided keluaran terbaru dari Datacard yang menggantikan generasi sebelumnya yaitu Datacard SD360. Menyediakan kemudahan pengguna dalam melakukan operasional yang luar biasa, cepat, dan efisien. Menghasilkan kualitas cetak full color yang berkualitas tinggi dan daya tahan yang lebih kuat.', NULL, 'Spesifikasi\r\n\r\n– Print Method : Dye Sublimation (Direct-to-Card)\r\n– Pencetakan dua-sisi SD360\r\n– Resolution : 300 dpi / 256 warna per warna panel\r\n– Accepted Card Size : CR-80 (53.9885.6mm)\r\n– Accepted Card Thickness : 0.25-1.00mm (10-40mil)\r\n– Accepted Card Type : PVC or polyester cards with polished PVC finish\r\n– Input Hopper Card Capacity : 100 cards (0.76mm/30mil)\r\n– Driver Compatible OS : WinXP, Vista, Win7 (32/64bit), Win8 (32/64bit), Win10\r\nMac OS X 10.6 or above\r\n– Interface : USB 2.0 & Ethernet (LAN)\r\n– Kecepatan cetak :\r\n4,2 detik (monokrom (K) satu-sisi kartu)\r\n18 detik (penuh warna (YMCKO) satu-sisi kartu)\r\n24 detik (penuh warna (YMCKOK) dual-sisi kartu)\r\n– Power : 24.5V, 100W DC Adapter\r\n\r\n*APABILA ADA CACAT / KERUSAKAN PRODUK BISA LANGSUNG KIRIM KEMBALI\r\n\r\n==============================================\r\nBARANG ORIGINAL GARANSI RESMI DATACARD 1 TAHUN\r\n==============================================', 2450);
INSERT INTO `tbl_product` VALUES (46, 'P45', 'ID CARD PRINTER', 'Datacard SD 160.jpg', 'Datacard SD 160', 'ID Card printer Datacard CD 168, printer kartu id card dengan bentuk yang sederhana, harga terjangkau yang serta dapat melakukan pencetakan dengan cepat. Printer Datacard CD168 memberikan perpaduan sempurna dari keterjangkauan, keamanan dan kesederhanaan. Keluaran terbaru Datacard CD168 telah terbukti menjadikan Kartu yang Berkualitas.', NULL, 'Spesifikasi\r\n\r\n– Print Method : Dye Sublimation (Direct-to-Card)\r\n– Resolution : 300 dpi\r\n– Accepted Card Size : CR-80 (53.9885.6mm)\r\n– Accepted Card Thickness : 0.25-1.00mm (10-40mil)\r\n– Accepted Card Type : PVC or polyester cards with polished PVC finish\r\n– Input Hopper Card Capacity : 100 cards (0.76mm/30mil)\r\n– Driver Compatible OS : WinXP, Vista, Win7 (32/64bit), Win8 (32/64bit), Win10\r\nMac OS X 10.6 or above\r\n– Interface : USB2.0\r\n– Power : 24.5V, 100W DC Adapter\r\n– Optional Encoding Modules : Contact smart IC card encoding module, Contactless (RFID) encoding module, ISO14443A, ISO14443B, ISO15693, Magnetic stripe card encoding module ISO7811 (Hi-co & Low-co)\r\n\r\n*APABILA ADA CACAT / KERUSAKAN PRODUK BISA LANGSUNG KIRIM KEMBALI\r\n\r\n==============================================\r\nBARANG ORIGINAL GARANSI RESMI DATACARD 1 TAHUN\r\n==============================================', 2450);
INSERT INTO `tbl_product` VALUES (47, 'P46', 'ID CARD PRINTER', 'Datacard SD 260.jpg', 'Datacard SD 260', 'Datacard SD260 adalah printer ID Card terbaru yang memiliki berbagai kelebihan di banding dengan yang lain di kelasnya diantaranya kapasitas yang lebih besar dan speed lebih cepat dalam pencetakan, juga menghasilkan gambar yang sangat tajam.\r\nDengan rata-rata 200 cetak full color/jam, printer Datacard SD260 33% lebih cepat dari printer lain dikelasnya.\r\n\r\n', NULL, 'Spesifikasi\r\n\r\n– Print Method : Dye Sublimation (Direct-to-Card)\r\n– Resolution : 300 dpi\r\n– Accepted Card Size : CR-80 (53.9885.6mm)\r\n– Accepted Card Thickness : 0.25-1.00mm (10-40mil)\r\n– Accepted Card Type : PVC or polyester cards with polished PVC finish\r\n– Input Hopper Card Capacity : 100 cards (0.76mm/30mil)\r\n– Driver Compatible OS : WinXP, Vista, Win7 (32/64bit), Win8 (32/64bit), Win10\r\nMac OS X 10.6 or above\r\n– Interface : USB 2.0 + LAN (Ethernet)\r\n– Power : 24.5V, 100W DC Adapter\r\n– Optional Encoding Modules : Contact smart IC card encoding module, Contactless (RFID) encoding module, ISO14443A, ISO14443B, ISO15693, Magnetic stripe card encoding module ISO7811 (Hi-co & Low-co)', 2450);
INSERT INTO `tbl_product` VALUES (48, 'P47', 'ID CARD PRINTER', 'Datacard SD 360.jpg', 'Datacard SD 360', 'Datacard SD360 adalah printer Dual Sided keluaran terbaru dari Datacard yang menggantikan generasi sebelumnya yaitu Datacard SP55. Menyediakan kemudahan pengguna dalam melakukan operasional yang luar biasa, cepat, dan efisien. Menghasilkan kualitas cetak full color yang berkualitas tinggi dan daya tahan yang lebih kuat.', NULL, 'Spesifikasi\r\n\r\n– Print Method : Dye Sublimation (Direct-to-Card)\r\n– Pencetakan dua-sisi SD360\r\n– Resolution : 300 dpi / 256 warna per warna panel\r\n– Accepted Card Size : CR-80 (53.9885.6mm)\r\n– Accepted Card Thickness : 0.25-1.00mm (10-40mil)\r\n– Accepted Card Type : PVC or polyester cards with polished PVC finish\r\n– Input Hopper Card Capacity : 100 cards (0.76mm/30mil)\r\n– Driver Compatible OS : WinXP, Vista, Win7 (32/64bit), Win8 (32/64bit), Win10\r\nMac OS X 10.6 or above\r\n– Interface : USB 2.0 & Ethernet\r\n– Kecepatan cetak :\r\n4,2 detik (monokrom (K) satu-sisi kartu)\r\n18 detik (penuh warna (YMCKO) satu-sisi kartu)\r\n24 detik (penuh warna (YMCKOK) dual-sisi kartu)\r\n– Power : 24.5V, 100W DC Adapter', 2450);
INSERT INTO `tbl_product` VALUES (49, 'P48', 'ID CARD PRINTER', 'Evolis Primacy.jpg', 'Evolis Primacy', 'Evolis Primacy adalah printer canggih keluaran terbaru buatan perancis yang mudah digunakan, fleksibel, dan mempunyai kecepatan printing yang lebih cepat dari generasi sebelumnya. Tidak hanya menggantikan Evolis Pebble dan Evolis Dualys.\r\n\r\nCocok untuk pencetakan :\r\n\r\n+ Kartu Member\r\n+ Kartu Pasien\r\n+ Kartu ID Pegawai / Karyawan\r\n+ Kartu Mahasiswa, dll', NULL, 'Spesifikasi\r\n\r\n– Print Method : Dye Sublimation dan Monokhrom\r\n– Resolution : 300 dpi (11,8 dots/mm)\r\n– Accepted Card Size : CR-80 (53.9885.6mm)\r\n– Accepted Card Thickness : 0.25 – 1.25 mm (10-40mil)\r\n– Types of cards : All PVC, Composite PVC cards, PET, ABS and special varnished cards\r\n– Input Hopper Card Capacity : 100 cards (0.76mm/30mil)\r\n– Memory : 16 MB\r\n– Driver Compatible OS : WinXP, Vista, Win7 (32/64bit), Win8 (32/64bit), Win10\r\nMac OS X 10.6 or above\r\n– Interface : USB2.0, Ethernet (Optional Module)\r\n– Power : 24.5V, 100W DC Adapter\r\n– Optional Encoding Modules : Contact smart IC card encoding module, Contactless (RFID) encoding module, ISO14443A, ISO14443B, ISO15693, Magnetic stripe card encoding module ISO7811 (Hi-co & Low-co)\r\n\r\nUntuk spesifikasi lengkap bisa di cek di website www jualbarcode com\r\n\r\nDISTRIBUTOR RESMI EVOLIS\r\n*APABILA ADA CACAT / KERUSAKAN PRODUK BISA LANGSUNG KIRIM KEMBALI\r\n\r\n===========================================\r\nBARANG ORIGINAL GARANSI RESMI EVOLIS 1 TAHUN\r\n===========================================', 2450);
INSERT INTO `tbl_product` VALUES (50, 'P49', 'ID CARD PRINTER', 'Evolis Zenius.jpg', 'Evolis Zenius', 'Evolis Zenius adalah printer canggih keluaran terbaru tahun 2012 buatan perancis yang mudah digunakan, fleksibel, dan mempunyai kecepatan printing yang lebih cepat dari generasi sebelumnya. Tidak hanya menggantikan Evolis Pebble dan Evolis Dualys, Evolis Zenius menggabungkan fitur yang terbaik dari masing-masing printer terdahulu.\r\n\r\nPERBEDAAN EVOLIS CLASSIC RED DENGAN EVOLIS EXPERT\r\n– Port : USB & Ethernet\r\n– Fitur Magnetic Encoding', NULL, 'Spesifikasi\r\n\r\n– Print Method : Dye Sublimation dan Monochrome\r\n– Resolution : 300 dpi (11,8 dots/mm)\r\n– Accepted Card Size : CR-80 (53.9885.6mm)\r\n– Accepted Card Thickness : 0.25 – 1.25 mm (10-40mil)\r\n– Types of cards : All PVC, Composite PVC cards, PET, ABS\r\n– Memory : 16 MB\r\n– Driver Compatible OS : WinXP, Vista, Win7 (32/64bit), Win8 (32/64bit), Win10\r\nMac OS X 10.6 or above\r\n– Interface : USB 2.0\r\n– Performa mencetak :\r\n+ Warna: dari 120 hingga 150 kartu per jam\r\n+ Satu warna: dari 400 hingga 500 kartu per jam\r\n\r\nUntuk spesifikasi lengkap bisa di cek di website www jualbarcode com\r\n\r\nDISTRIBUTOR RESMI EVOLIS\r\n*APABILA ADA CACAT / KERUSAKAN PRODUK BISA LANGSUNG KIRIM KEMBALI\r\n\r\n===========================================\r\nBARANG ORIGINAL GARANSI RESMI EVOLIS 1 TAHUN\r\n===========================================', 2450);
INSERT INTO `tbl_product` VALUES (51, 'P50', 'ID CARD PRINTER', 'Fargo C50.jpg', 'Fargo C50', 'Printer kartu ID Fargo C50 dirancang untuk Perusahaan dengan dana minimal. Ukuran printer yang kecil memungkinkan untuk dengan mudah masuk ke dalam setiap lingkungan kerja, dari meja anda ke ruang tunggu. Meskipun ukurannya kecil, Fargo C50 menghasilkan kartu ID kualitas cepat, mengambil hanya 24 detik untuk mencetak penuh warna satu-sisi kartu ID.\r\n\r\nID Card Printer Fargo C50 merupakan solusi untuk kebutuhan pencetakan ID Card / cetak kartu bisnis, Rumah Sakit, sekolah, pemerintah daerah.', NULL, 'Spesifikasi\r\n\r\n– Print Method : Print Method- Dye sublimation / resin thermal transfer.\r\n– Resolution : 300dpi continuous tone\r\n– Accepted Card Size : CR-80 (53.9885.6mm) , CR-79 adhesive back (3.313 L x 2.063 W / 84.1 mm L x 52.4 mm W).\r\n– Accepted Card Thickness : 0.25-1.00mm (10-40mil)\r\n– Accepted Card Type : PVC or polyester cards with polished PVC finish\r\n– Print Speed : 24 seconds per card / 150 cards per hour (YMCKO)\r\n– Input Hopper Card Capacity : 50 cards (0.76mm/30mil)\r\n– Memory : 32MB\r\n– Driver Compatible OS : WinXP, Vista, Win7 (32/64bit), Win8 (32/64bit), Win10\r\nMac OS X 10.6 or above\r\n– Interface : USB2.0\r\n– Power : 24.5V, 100W DC Adapter\r\n\r\n*APABILA ADA CACAT / KERUSAKAN PRODUK BISA LANGSUNG KIRIM KEMBALI\r\n\r\n===========================================\r\nBARANG ORIGINAL GARANSI RESMI FARGO 1 TAHUN\r\n===========================================', 2450);
INSERT INTO `tbl_product` VALUES (52, 'P51', 'ID CARD PRINTER', 'Fargo DTC 1250e.jpg', 'Fargo DTC 1250e', 'ID Card Printer Fargo DTC1250e, Untuk kebutuhan pencetakan ID Card yang lebih mudah. Solusi ideal untuk cetak kartu bisnis, sekolah, pemerintah daerah kecil dll. Mencetak ID Card Full Color dan memungkinkan anda menciptakan keanggotaan pribadi. Bentuknya yang kecil mudah ditempatkan di ruang sempit.', NULL, 'Spesifikasi\r\n\r\n– Print Method : Print Method- Dye sublimation / resin thermal transfer.\r\n– Resolution : 300dpi continuous tone\r\n– Accepted Card Size : CR-80 (53.9885.6mm) , CR-79 adhesive back (3.313 L x 2.063 W / 84.1 mm L x 52.4 mm W).\r\n– Accepted Card Thickness : 0.25-1.00mm (10-40mil)\r\n– Accepted Card Type : PVC or polyester cards with polished PVC finish\r\n– Input Hopper Card Capacity : 100 cards (0.76mm/30mil)\r\n– Memory : 32MB\r\n– Driver Compatible OS : WinXP, Vista, Win7 (32/64bit), Win8 (32/64bit), Win10\r\nMac OS X 10.6 or above\r\n– Interface : USB2.0, Ethernet (Optional Module)\r\n– Power : 24.5V, 100W DC Adapter\r\n– Optional Encoding Modules : Contact smart IC card encoding module, Contactless (RFID) encoding module, ISO14443A, ISO14443B, ISO15693, Magnetic stripe card encoding module ISO7811 (Hi-co & Low-co)\r\n\r\n*APABILA ADA CACAT / KERUSAKAN PRODUK BISA LANGSUNG KIRIM KEMBALI\r\n\r\n================================\r\nBARANG ORIGINAL GARANSI 1 TAHUN\r\n================================', 2450);
INSERT INTO `tbl_product` VALUES (53, 'P52', 'ID CARD PRINTER', 'Fargo DTC 4500e – Dual Side.jpg', 'Fargo DTC 4500e – Dual Side', '\r\nDUAL SIDE ( Dua Sisi Sekali Print )\r\nDUPLEX\r\n\r\nID Card Printer Fargo DTC4500e, Untuk kebutuhan pencetakan ID Card yang lebih mudah. Solusi ideal untuk cetak kartu bisnis, sekolah, pemerintah daerah dll. Mencetak ID Card Full Color dan memungkinkan anda menciptakan keanggotaan pribadi atau menggunakan kunci keamanan. ID Card Printer ini sangat cepat disbanding printer lainnya. Bentuknya yang kecil mudah ditempatkan di ruang sempit.', NULL, 'Spesifikasi\r\n\r\n– Print Method : Print Method- Dye sublimation / resin thermal transfer.\r\n– Resolution : 300dpi\r\n– Accepted Card Size : CR-80 , CR-79 adhesive back\r\n– Print Speed: 16 seconds per card / 225 cards per hour (YMCKO)\r\n– Card capacity: 200 card input (with dual input hopper), 100 card output\r\n– Included Software: Embedded Swift ID badging application and FARGO Workbench printer maintenance and diagnostic software with Color Assist spot-color matching\r\n– Driver Compatible OS : WinXP, Vista, Win7 (32/64bit), Win8 (32/64bit), Win10\r\nMac OS X 10.6 or above\r\n– Interface : USB2.0, Ethernet (Optional Module)\r\n– Data protection: AES-256 encryption on the printer over a secure network\r\n\r\n*APABILA ADA CACAT / KERUSAKAN PRODUK BISA LANGSUNG KIRIM KEMBALI\r\n\r\n===========================================\r\nBARANG ORIGINAL GARANSI RESMI FARGO 1 TAHUN\r\n===========================================', 2450);
INSERT INTO `tbl_product` VALUES (54, 'P53', 'ID CARD PRINTER', 'Fargo DTC 4500e – Single Side.jpg', 'Fargo DTC 4500e – Single Side', 'ID Card Printer Fargo DTC4500e, Untuk kebutuhan pencetakan ID Card yang lebih mudah. Solusi ideal untuk cetak kartu bisnis, sekolah, pemerintah daerah kecil dll. Mencetak ID Card Full Color dan memungkinkan anda menciptakan keanggotaan pribadi atau menggunakan kunci keamanan. ID Card Printer ini sangat cepat disbanding printer lainnya. Bentuknya yang kecil mudah ditempatkan di ruang sempit.', NULL, 'Spesifikasi\r\n\r\n– Print Method : Print Method- Dye sublimation / resin thermal transfer.\r\n– Resolution : 300dpi\r\n– Accepted Card Size : CR-80 , CR-79 adhesive back\r\n– Print Speed: 16 seconds per card / 225 cards per hour (YMCKO)\r\n– Card capacity: 200 card input (with dual input hopper), 100 card output\r\n– Included Software: Embedded Swift ID badging application and FARGO Workbench printer maintenance and diagnostic software with Color Assist spot-color matching\r\n– Driver Compatible OS : WinXP, Vista, Win7 (32/64bit), Win8 (32/64bit), Win10\r\nMac OS X 10.6 or above\r\n– Interface : USB2.0, Ethernet (Optional Module)\r\n– Data protection: AES-256 encryption on the printer over a secure network\r\n\r\n*APABILA ADA CACAT / KERUSAKAN PRODUK BISA LANGSUNG KIRIM KEMBALI\r\n\r\n===========================================\r\nBARANG ORIGINAL GARANSI RESMI FARGO 1 TAHUN\r\n===========================================', 2450);
INSERT INTO `tbl_product` VALUES (55, 'P54', '', 'Fargo HDP 5000 – Dual Side.jpg', 'Fargo HDP 5000 – Dual Side', 'HDP5000 adalah printer kartu ID plastik transfer ulang dengan Built-in High Definition Printing ™, yang memberikan kualitas cetak superior, bahkan pada kartu dengan permukaan yang seperti kontrol akses dan kartu proximity. Printer ini sangat ideal bagi mereka yang perlu mengeluarkan kartu ID definisi tinggi dan aman secara rutin.\r\n\r\nHigh Definition Printing ™ memberikan kualitas cetak yang superior\r\nMencetak ke kartu CR80 standar dan kartu proximity\r\nGaransi pabrik tiga tahun', NULL, 'Highlight Spesifikasi :\r\n– Kemampuan Pencetakan : Pencetakan Dua Sisi\r\n– Teknologi Cetak : Pencetakan Transfer Terbalik\r\n– Kecepatan Cetak : Kartu Satu Sisi Dicetak Hanya dalam 24 Detik dan Hanya 35 Detik untuk Kartu Laminated\r\n– Input / Output : 200/200\r\n– Garansi : 3 Tahun\r\n\r\nApa yang termasuk :\r\n– Printer Kartu ID Satu Sisi Fargo HDP5000\r\n– kabel USB\r\n– Kabel listrik\r\n– Driver Microsoft Windows\r\n\r\n* Harap dicatat, baik pita warna Fargo 84051 YMCK, dan Fargo 84053 Retransfer film harus dibeli pada titik penjualan. Tidak ada pita yang disertakan dengan printer.', 2450);
INSERT INTO `tbl_product` VALUES (56, 'P55', 'ID CARD PRINTER', 'HITI CS 200e.jpg', 'HITI CS 200e', 'ID Card printer HITI CS-200E, Printer khusus untuk mencetak ID Card, member card dll. HITI CS-200E memiliki desain unik dan menarik dengan perpaduan warna putih, silver, dan orange. Kualitas hasil cetakan pun tidak diragukan lagi, tentu akan sangat memuaskan', NULL, 'Spesifikasi :\r\n\r\n– Model Name : CS-200e ID Card Printer\r\n– Print Method : Dye Sublimation (Direct-to-Card)\r\n– Resolution : 300dpi continuous tone\r\n– Accepted Card Size : CR-80 (53.9885.6mm)\r\n– Accepted Card Thickness : 0.25-1.00mm (10-40mil)\r\n– Accepted Card Type : PVC or polyester cards with polished PVC finish\r\n– Input Hopper Card Capacity : 100 cards (0.76mm/30mil)\r\n– Memory : 64MB\r\n– Driver Compatible OS : WinXP, Vista, Win7 (32/64bit), Win8 (32/64bit), Win10\r\nMac OS X 10.6 or above\r\n– Interface : USB2.0, Ethernet (Optional Module)\r\n– Power : 24.5V, 100W DC Adapter\r\n– Optional Encoding Modules : Contact smart IC card encoding module, Contactless (RFID) encoding module, ISO14443A, ISO14443B, ISO15693, Magnetic stripe card encoding module ISO7811 (Hi-co & Low-co)\r\n\r\n*APABILA ADA CACAT / KERUSAKAN PRODUK BISA LANGSUNG KIRIM KEMBALI\r\n\r\n================================\r\nBARANG ORIGINAL GARANSI 1 TAHUN\r\n================================', 2450);
INSERT INTO `tbl_product` VALUES (57, 'P56', 'ID CARD PRINTER', 'Zebra ZC100 – Simplek (Satu Sisi).jpg', 'Zebra ZC100 – Simplek (Satu Sisi)', 'Printer Kartu ZC100\r\nGENERASI BERIKUTNYA DARI PENCETAKAN KARTU SINGLE-SIDE\r\n\r\nSalah satu printer kartu yang paling intuitif dan mudah digunakan di pasaran – ZC100 secara otomatis menyesuaikan dengan ketebalan kartu apa pun, inovasi membuat perubahan pita hampir tanpa bukti, driver printer baru menawarkan pengguna grafis yang unik antarmuka yang membawa tingkat kesederhanaan baru untuk mengendalikan proses pencetakan. Dan, Print DNA menawarkan koleksi solusi bernilai tinggi yang membuatnya lebih mudah untuk mengintegrasikan pencetakan kartu ke dalam aplikasi Anda, mendesain kartu, dan mendukung printer An', NULL, 'Highlight Spesifikasi :\r\n– PRINT TECHNOLOGY : Direct-to-Card Printer\r\n– PRINT CAPABILITIES : Single-sided\r\n– PRINT SPEED :Color – 150 cph / Mono – 700 cph\r\n– MAX. IMAGES PER RIBBON ROLL : Colour – 200 / Mono – 2000\r\n– COMMUNICATIONS INTERFACE : Standard – USB 2.0\r\n\r\nApa yang termasuk :\r\n– Printer Kartu ID Satu Sisi Zebra ZC100\r\n– kabel USB\r\n– Kabel listrik\r\n– Driver Microsoft Windows\r\n\r\n* Harap dicatat, baik pita warna Zebra ZC100,harus dibeli pada titik penjualan. Tidak ada pita yang disertakan dengan printer.', 2450);
INSERT INTO `tbl_product` VALUES (58, 'P57', 'ID CARD PRINTER', 'Zebra ZXP Series 3.jpg', 'Zebra ZXP Series 3', 'Zebra ZXP3 merupakan printer dengan teknologi direct-to-card (menarik untuk kartu) yang dapat memberikan peforma cetak yang luar biasa dengan tekhnologi canggih yang terdapat di Zebra ZXP series 3.\r\nPrinter ini juga memiliki teknologi yang bernama Zebra ZRaster yaitu teknologi yang dapat mengolah gambar secara optimal dengan kecepatan pencetakan yang cepat. Dan Printer ID Card Zebra ZXP3 pertama keluar dengan pita ribbon berperforma tinggi yang mempunyai formulasi khusus dibuat untuk high speed, mencetak dengan kualitas tinggi.\r\nPrinter Zebra ZXP3 menggunakan desain yang kompak dan kokoh. Printer ini sangat cocok di dalam ruangan (kantor) atau di luar ruangan (lapangan).', '', 'Spesifikasi :\r\n\r\n– Resolusi : 300 dpi (11,8 dots / mm) resolusi\r\n– Metode Cetak : Dye Sublimasi\r\n– Memori : Standar 32 MB memori\r\n– Kecepatan Cetak : 27 detik / kartu (YMCKO / warna penuh)\r\n– Tampilan : 16-karakter layar LCD\r\n– Input Kartu : 100 kartu (30 mil)\r\n– Output Kartu : 45 kartu (30 mil)\r\n– Jenis Kartu : CR80 (85.6mm X 54mm) / CR79 Adhesive\r\n– Konektivitas : USB 2.0\r\n\r\n*APABILA ADA CACAT / KERUSAKAN PRODUK BISA LANGSUNG KIRIM KEMBALI\r\n\r\n===========================================\r\nBARANG ORIGINAL GARANSI RESMI ZEBRA 1 TAHUN\r\n===========================================', 2450);

-- ----------------------------
-- Table structure for tbl_product_category
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_category`;
CREATE TABLE `tbl_product_category`  (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_kode` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `category_nama` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_product_category
-- ----------------------------
INSERT INTO `tbl_product_category` VALUES (1, 'C1', 'AKSESORIS ID CARD');
INSERT INTO `tbl_product_category` VALUES (2, 'C2', 'ANGGOTA PARTAI');
INSERT INTO `tbl_product_category` VALUES (3, 'C3', 'CARD READER & ENCORDER');
INSERT INTO `tbl_product_category` VALUES (4, 'C4', 'CETAK FLASHDISK CARD');
INSERT INTO `tbl_product_category` VALUES (5, 'C5', 'CETAK KARTU NAMA');
INSERT INTO `tbl_product_category` VALUES (6, 'C6', 'CETAK KARTU PVC');
INSERT INTO `tbl_product_category` VALUES (7, 'C7', 'CETAK KARTU RFID');
INSERT INTO `tbl_product_category` VALUES (8, 'C8', 'FINISHING KARTU');
INSERT INTO `tbl_product_category` VALUES (9, 'C9', 'HOTEL & APARTMENT');
INSERT INTO `tbl_product_category` VALUES (10, 'C10', 'HOTEL MANAGEMENT');
INSERT INTO `tbl_product_category` VALUES (11, 'C11', 'ID CARD PRINTER');
INSERT INTO `tbl_product_category` VALUES (12, 'C12', 'KARAOKE');
INSERT INTO `tbl_product_category` VALUES (13, 'C13', 'KESEHATAN');
INSERT INTO `tbl_product_category` VALUES (14, 'C14', 'KLINIK KECANTIKAN');
INSERT INTO `tbl_product_category` VALUES (15, 'C15', 'KOMUNITAS');
INSERT INTO `tbl_product_category` VALUES (16, 'C16', 'ONLINE SHOP');
INSERT INTO `tbl_product_category` VALUES (17, 'C17', 'PABRIK & MANUFACTURING');
INSERT INTO `tbl_product_category` VALUES (18, 'C18', 'PARKING SYSTEM');
INSERT INTO `tbl_product_category` VALUES (19, 'C19', 'PENDIDIKAN');
INSERT INTO `tbl_product_category` VALUES (20, 'C20', 'PERGUDANGAN (WAREHOUSE)');
INSERT INTO `tbl_product_category` VALUES (21, 'C21', 'PERKANTORAN');
INSERT INTO `tbl_product_category` VALUES (22, 'C22', 'PERPUSTAKAAN');
INSERT INTO `tbl_product_category` VALUES (23, 'C23', 'RESTAURANT');
INSERT INTO `tbl_product_category` VALUES (24, 'C24', 'RETAIL');
INSERT INTO `tbl_product_category` VALUES (25, 'C25', 'TEMPAT HIBURAN');

-- ----------------------------
-- Table structure for tbl_status
-- ----------------------------
DROP TABLE IF EXISTS `tbl_status`;
CREATE TABLE `tbl_status`  (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_status` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_urut` int(11) NOT NULL,
  `status_icon` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_jangka_waktu` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`status_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_status
-- ----------------------------
INSERT INTO `tbl_status` VALUES (1, 'VERIFIKASI', 'Menunggu konfirmasi pesanan anda', 1, 'fa fa-check', NULL);
INSERT INTO `tbl_status` VALUES (2, 'KIRIM DESIGN', 'Anda dapat mengirim design, memilih template atau membuat design di aplikasi kami', 2, 'fa fa-image', 3);
INSERT INTO `tbl_status` VALUES (3, 'PEMBAYARAN', 'Melakukan pembayaran sesuai dengan harga yang di setujui', 3, 'fa fa-credit-card', 1);
INSERT INTO `tbl_status` VALUES (4, 'APPROVAL', 'Menunggu Konfirmasi Pelanggan', 4, 'fa fa-check', NULL);
INSERT INTO `tbl_status` VALUES (5, 'CETAK PRODUK', 'Sedang meyektak pesanan anda', 5, 'fa fa-print', NULL);
INSERT INTO `tbl_status` VALUES (6, 'AMBIL / KIRIM', 'Pesanan bisa di ambil atau dikirim ke alamat anda', 6, 'fa fa-truck', NULL);
INSERT INTO `tbl_status` VALUES (51, 'PRODUKSI 1', 'Proses produksi tahap 1', 1, '1', NULL);
INSERT INTO `tbl_status` VALUES (52, 'PRODUKSI 2', 'Proses produksi tahap 2', 2, '2', NULL);
INSERT INTO `tbl_status` VALUES (53, 'PRODUKSI 3', 'Proses produksi tahap 3', 3, '3', NULL);
INSERT INTO `tbl_status` VALUES (54, 'PRODUKSI 4', 'Proses produksi tahap 4', 4, '4', NULL);
INSERT INTO `tbl_status` VALUES (55, 'PRODUKSI 5', 'Proses produksi tahap 5', 5, '5', NULL);

-- ----------------------------
-- Table structure for tbl_status_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_status_transaksi`;
CREATE TABLE `tbl_status_transaksi`  (
  `transaksi_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaksi_status_id` int(11) NOT NULL,
  `transaksi_produksi_status_id` int(1) NOT NULL DEFAULT 0,
  `transaksi_order_id` int(11) NOT NULL,
  `transaksi_status` int(11) NULL DEFAULT NULL,
  `transaksi_keterangan` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `transaksi_tanggal` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `transaksi_tanggal_hangus` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`transaksi_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 429 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_status_transaksi
-- ----------------------------
INSERT INTO `tbl_status_transaksi` VALUES (163, 1, 1, 67, 1, '', '1612841530', '1612841530');
INSERT INTO `tbl_status_transaksi` VALUES (164, 2, 1, 67, 1, '', '1612841651', '1613100851');
INSERT INTO `tbl_status_transaksi` VALUES (165, 3, 1, 67, 1, '', '1612841783', '1612928183');
INSERT INTO `tbl_status_transaksi` VALUES (169, 4, 1, 67, 1, '', '1612888965', '1612888965');
INSERT INTO `tbl_status_transaksi` VALUES (170, 5, 1, 67, 1, 'Sudah Diterima', '1612889045', '1612889045');
INSERT INTO `tbl_status_transaksi` VALUES (171, 1, 1, 68, 1, '', '1620908224', '1620908224');
INSERT INTO `tbl_status_transaksi` VALUES (172, 2, 1, 68, 1, '', '1620909962', '1621169162');
INSERT INTO `tbl_status_transaksi` VALUES (173, 3, 1, 68, 1, '', '1620913552', '1620999952');
INSERT INTO `tbl_status_transaksi` VALUES (174, 4, 1, 68, 1, '', '1620915071', '1620915071');
INSERT INTO `tbl_status_transaksi` VALUES (175, 5, 1, 68, 1, 'Sudah Diterima', '1620915107', '1620915107');
INSERT INTO `tbl_status_transaksi` VALUES (176, 1, 1, 69, 1, 'diterima', '1621015809', '1621015809');
INSERT INTO `tbl_status_transaksi` VALUES (177, 2, 1, 69, 1, 'gagal', '1621017600', '1621276800');
INSERT INTO `tbl_status_transaksi` VALUES (178, 1, 1, 70, 1, '', '1621017708', '1621017708');
INSERT INTO `tbl_status_transaksi` VALUES (181, 1, 1, 72, 1, '', '1621018374', '1621018374');
INSERT INTO `tbl_status_transaksi` VALUES (184, 1, 1, 74, 1, '', '1621018765', '1621018765');
INSERT INTO `tbl_status_transaksi` VALUES (185, 2, 1, 74, 1, '', '1621018774', '1621277974');
INSERT INTO `tbl_status_transaksi` VALUES (186, 3, 1, 74, 1, '', '1621019587', '1621105987');
INSERT INTO `tbl_status_transaksi` VALUES (187, 4, 1, 74, 1, '', '1621019807', '1621019807');
INSERT INTO `tbl_status_transaksi` VALUES (188, 5, 1, 74, 1, 'Sudah Diterima', '1621019937', '1621019937');
INSERT INTO `tbl_status_transaksi` VALUES (189, 1, 1, 75, 1, '', '1621020161', '1621020161');
INSERT INTO `tbl_status_transaksi` VALUES (190, 2, 1, 75, 1, '', '1621020169', '1621279369');
INSERT INTO `tbl_status_transaksi` VALUES (191, 3, 1, 75, 1, '', '1621020483', '1621106883');
INSERT INTO `tbl_status_transaksi` VALUES (192, 1, 1, 76, 1, '', '1621020697', '1621020697');
INSERT INTO `tbl_status_transaksi` VALUES (193, 1, 1, 77, 1, '', '1621020755', '1621020755');
INSERT INTO `tbl_status_transaksi` VALUES (194, 2, 1, 77, 1, '', '1621020761', '1621279961');
INSERT INTO `tbl_status_transaksi` VALUES (195, 1, 1, 78, 1, '', '1621020843', '1621020843');
INSERT INTO `tbl_status_transaksi` VALUES (196, 2, 1, 78, 1, '', '1621020853', '1621280053');
INSERT INTO `tbl_status_transaksi` VALUES (197, 3, 1, 78, 1, '', '1621020857', '1621107257');
INSERT INTO `tbl_status_transaksi` VALUES (198, 4, 1, 78, 1, '', '1621020897', '1621020897');
INSERT INTO `tbl_status_transaksi` VALUES (199, 5, 1, 78, 1, 'Sudah Diterima', '1621020927', '1621020927');
INSERT INTO `tbl_status_transaksi` VALUES (200, 1, 1, 79, 1, '', '1621021413', '1621021413');
INSERT INTO `tbl_status_transaksi` VALUES (201, 2, 1, 79, 1, '', '1621021421', '1621280621');
INSERT INTO `tbl_status_transaksi` VALUES (202, 3, 1, 79, 1, '', '1621021427', '1621107827');
INSERT INTO `tbl_status_transaksi` VALUES (203, 4, 1, 79, 1, '', '1621021431', '1621021431');
INSERT INTO `tbl_status_transaksi` VALUES (204, 5, 1, 79, 1, 'Sudah Diterima', '1621021436', '1621021436');
INSERT INTO `tbl_status_transaksi` VALUES (205, 1, 1, 80, 1, '', '1621022175', '1621022175');
INSERT INTO `tbl_status_transaksi` VALUES (206, 2, 1, 80, 1, '', '1621022182', '1621281382');
INSERT INTO `tbl_status_transaksi` VALUES (207, 3, 1, 80, 1, '', '1621022196', '1621108596');
INSERT INTO `tbl_status_transaksi` VALUES (208, 4, 1, 80, 1, '', '1621022200', '1621022200');
INSERT INTO `tbl_status_transaksi` VALUES (209, 5, 1, 80, 1, 'Sudah Diterima', '1621022205', '1621022205');
INSERT INTO `tbl_status_transaksi` VALUES (210, 1, 1, 81, 1, '', '1621022417', '1621022417');
INSERT INTO `tbl_status_transaksi` VALUES (211, 2, 1, 81, 1, '', '1621022427', '1621281627');
INSERT INTO `tbl_status_transaksi` VALUES (212, 3, 1, 81, 1, '', '1621022431', '1621108831');
INSERT INTO `tbl_status_transaksi` VALUES (213, 4, 1, 81, 1, '', '1621022438', '1621022438');
INSERT INTO `tbl_status_transaksi` VALUES (214, 5, 1, 81, 1, 'Sudah Diterima', '1621022454', '1621022454');
INSERT INTO `tbl_status_transaksi` VALUES (228, 1, 1, 95, 1, '', '1621652246', '1621652246');
INSERT INTO `tbl_status_transaksi` VALUES (229, 2, 1, 95, 1, '', '1621653025', '1621912225');
INSERT INTO `tbl_status_transaksi` VALUES (230, 3, 1, 95, 1, '', '1621653250', '1621739650');
INSERT INTO `tbl_status_transaksi` VALUES (231, 4, 1, 95, 1, '', '1621655440', '1621655440');
INSERT INTO `tbl_status_transaksi` VALUES (232, 5, 1, 95, 1, 'Sudah Diterima', '1621655456', '1621655456');
INSERT INTO `tbl_status_transaksi` VALUES (239, 1, 1, 99, 1, '', '1621664843', '1621664843');
INSERT INTO `tbl_status_transaksi` VALUES (240, 2, 1, 99, 1, '', '1621664962', '1621924162');
INSERT INTO `tbl_status_transaksi` VALUES (241, 1, 1, 100, 1, '', '1621739058', '1621739058');
INSERT INTO `tbl_status_transaksi` VALUES (242, 2, 1, 100, 4, NULL, '1621739070', '1621998270');
INSERT INTO `tbl_status_transaksi` VALUES (243, 1, 1, 101, 1, '', '1621744409', '1621744409');
INSERT INTO `tbl_status_transaksi` VALUES (244, 2, 1, 101, 4, NULL, '1621744741', '1622003941');
INSERT INTO `tbl_status_transaksi` VALUES (245, 3, 1, 99, 1, '', '1622208857', '1622295257');
INSERT INTO `tbl_status_transaksi` VALUES (246, 4, 1, 99, 1, '', '1622208923', '1622208923');
INSERT INTO `tbl_status_transaksi` VALUES (247, 5, 1, 99, 1, 'Sudah Diterima', '1622208954', '1622208954');
INSERT INTO `tbl_status_transaksi` VALUES (248, 1, 1, 102, 1, '', '1622264428', '1622264428');
INSERT INTO `tbl_status_transaksi` VALUES (249, 2, 1, 102, 1, '', '1622265731', '1622524931');
INSERT INTO `tbl_status_transaksi` VALUES (250, 3, 1, 102, 1, '', '1622265748', '1622352148');
INSERT INTO `tbl_status_transaksi` VALUES (251, 4, 1, 102, 1, '', '1622265987', '1622265987');
INSERT INTO `tbl_status_transaksi` VALUES (252, 5, 1, 102, 1, 'Sudah Diterima', '1622266460', '1622266460');
INSERT INTO `tbl_status_transaksi` VALUES (253, 1, 1, 103, 1, '', '1622266617', '1622266617');
INSERT INTO `tbl_status_transaksi` VALUES (254, 2, 1, 103, 1, '', '1622266704', '1622525904');
INSERT INTO `tbl_status_transaksi` VALUES (255, 3, 1, 103, 1, '', '1622266827', '1622353227');
INSERT INTO `tbl_status_transaksi` VALUES (256, 4, 1, 103, 1, '', '1622266880', '1622266880');
INSERT INTO `tbl_status_transaksi` VALUES (257, 5, 1, 103, 1, 'Sudah Diterima', '1622267244', '1622267244');
INSERT INTO `tbl_status_transaksi` VALUES (258, 1, 1, 104, 1, '', '1622270285', '1622270285');
INSERT INTO `tbl_status_transaksi` VALUES (259, 2, 1, 104, 1, '', '1622270321', '1622529521');
INSERT INTO `tbl_status_transaksi` VALUES (260, 3, 1, 104, 1, '', '1622275494', '1622361894');
INSERT INTO `tbl_status_transaksi` VALUES (261, 4, 1, 104, 1, '', '1622443830', '1622443830');
INSERT INTO `tbl_status_transaksi` VALUES (262, 5, 1, 104, 1, 'Sudah Diterima', '1622443836', '1622443836');
INSERT INTO `tbl_status_transaksi` VALUES (263, 1, 1, 105, 1, '', '1622802497', '1622802497');
INSERT INTO `tbl_status_transaksi` VALUES (264, 2, 1, 105, 1, '', '1622802515', '1623061715');
INSERT INTO `tbl_status_transaksi` VALUES (265, 3, 1, 105, 1, '', '1622802580', '1622888980');
INSERT INTO `tbl_status_transaksi` VALUES (266, 1, 1, 106, 1, '', '1622803145', '1622803145');
INSERT INTO `tbl_status_transaksi` VALUES (267, 2, 1, 106, 1, '', '1622888016', '1623147216');
INSERT INTO `tbl_status_transaksi` VALUES (268, 3, 1, 106, 1, '', '1622888673', '1622975073');
INSERT INTO `tbl_status_transaksi` VALUES (269, 4, 1, 105, 1, '', '1622888687', '1622888687');
INSERT INTO `tbl_status_transaksi` VALUES (270, 5, 1, 105, 1, 'Sudah Diterima', '1622888711', '1622888711');
INSERT INTO `tbl_status_transaksi` VALUES (271, 4, 1, 106, 1, '', '1622903222', '1622903222');
INSERT INTO `tbl_status_transaksi` VALUES (272, 5, 1, 106, 1, 'Sudah Diterima', '1622903228', '1622903228');
INSERT INTO `tbl_status_transaksi` VALUES (273, 1, 1, 107, 1, '', '1622906668', '1622906668');
INSERT INTO `tbl_status_transaksi` VALUES (274, 2, 1, 107, 1, '', '1622906682', '1623165882');
INSERT INTO `tbl_status_transaksi` VALUES (275, 3, 1, 107, 1, '', '1622906717', '1622993117');
INSERT INTO `tbl_status_transaksi` VALUES (276, 4, 1, 107, 1, '', '1622906847', '1622906847');
INSERT INTO `tbl_status_transaksi` VALUES (277, 5, 1, 107, 1, 'Sudah Diterima', '1622906860', '1622906860');
INSERT INTO `tbl_status_transaksi` VALUES (278, 1, 1, 108, 1, '', '1622907724', '1622907724');
INSERT INTO `tbl_status_transaksi` VALUES (279, 2, 1, 108, 1, '', '1622907859', '1623167059');
INSERT INTO `tbl_status_transaksi` VALUES (280, 3, 1, 108, 1, '', '1622907902', '1622994302');
INSERT INTO `tbl_status_transaksi` VALUES (281, 4, 1, 108, 1, '', '1622907948', '1622907948');
INSERT INTO `tbl_status_transaksi` VALUES (282, 5, 1, 108, 1, 'Sudah Diterima', '1622907953', '1622907953');
INSERT INTO `tbl_status_transaksi` VALUES (286, 1, 1, 110, 1, '', '1622985753', '1622985753');
INSERT INTO `tbl_status_transaksi` VALUES (287, 2, 1, 110, 1, '', '1622985762', '1623244962');
INSERT INTO `tbl_status_transaksi` VALUES (288, 3, 1, 110, 4, NULL, '1622986185', '1623072585');
INSERT INTO `tbl_status_transaksi` VALUES (289, 1, 1, 111, 1, '', '1623035631', '1623035631');
INSERT INTO `tbl_status_transaksi` VALUES (290, 2, 1, 111, 1, '', '1623035655', '1623294855');
INSERT INTO `tbl_status_transaksi` VALUES (291, 3, 1, 111, 1, '', '1623035910', '1623122310');
INSERT INTO `tbl_status_transaksi` VALUES (292, 3, 1, 111, 1, '', '1623036136', '1623122536');
INSERT INTO `tbl_status_transaksi` VALUES (293, 4, 1, 111, 1, '', '1623036542', '1623036542');
INSERT INTO `tbl_status_transaksi` VALUES (294, 5, 1, 111, 1, 'Sudah Diterima', '1623036570', '1623036570');
INSERT INTO `tbl_status_transaksi` VALUES (295, 1, 1, 112, 1, '', '1623046890', '1623046890');
INSERT INTO `tbl_status_transaksi` VALUES (296, 2, 1, 112, 1, '', '1623049161', '1623308361');
INSERT INTO `tbl_status_transaksi` VALUES (297, 3, 1, 112, 1, '', '1623049307', '1623135707');
INSERT INTO `tbl_status_transaksi` VALUES (298, 4, 1, 112, 1, '', '1623049652', '1623049652');
INSERT INTO `tbl_status_transaksi` VALUES (299, 5, 1, 112, 1, 'Sudah Diterima', '1623050777', '1623050777');
INSERT INTO `tbl_status_transaksi` VALUES (300, 1, 1, 113, 1, '', '1623138239', '1623138239');
INSERT INTO `tbl_status_transaksi` VALUES (301, 2, 1, 113, 1, '', '1623138256', '1623397456');
INSERT INTO `tbl_status_transaksi` VALUES (302, 3, 1, 113, 1, '', '1623138405', '1623224805');
INSERT INTO `tbl_status_transaksi` VALUES (306, 1, 1, 115, 1, '', '1623213990', '1623213990');
INSERT INTO `tbl_status_transaksi` VALUES (307, 2, 1, 115, 4, NULL, '1623215827', '1623475027');
INSERT INTO `tbl_status_transaksi` VALUES (308, 4, 1, 113, 1, '', '1623217418', '1623217418');
INSERT INTO `tbl_status_transaksi` VALUES (309, 5, 1, 113, 1, 'Sudah Diterima', '1623217426', '1623217426');
INSERT INTO `tbl_status_transaksi` VALUES (311, 1, 1, 117, 1, '', '1623237685', '1623237685');
INSERT INTO `tbl_status_transaksi` VALUES (312, 1, 1, 118, 1, '', '1623238903', '1623238903');
INSERT INTO `tbl_status_transaksi` VALUES (314, 1, 1, 120, 1, '', '1629257103', '1629257103');
INSERT INTO `tbl_status_transaksi` VALUES (315, 2, 1, 120, 1, '', '1629257142', '1629516342');
INSERT INTO `tbl_status_transaksi` VALUES (316, 3, 1, 120, 4, NULL, '1629257219', '1629343619');
INSERT INTO `tbl_status_transaksi` VALUES (317, 1, 1, 121, 1, '', '1629259779', '1629259779');
INSERT INTO `tbl_status_transaksi` VALUES (318, 2, 1, 121, 1, '', '1629259859', '1629519059');
INSERT INTO `tbl_status_transaksi` VALUES (319, 3, 1, 121, 1, '', '1629260375', '1629346775');
INSERT INTO `tbl_status_transaksi` VALUES (320, 4, 1, 121, 1, '', '1629260537', '1629260537');
INSERT INTO `tbl_status_transaksi` VALUES (321, 5, 1, 121, 1, 'Sudah Diterima', '1629260805', '1629260805');
INSERT INTO `tbl_status_transaksi` VALUES (323, 1, 1, 123, 1, '', '1629720814', '1629720814');
INSERT INTO `tbl_status_transaksi` VALUES (324, 2, 1, 123, 1, '', '1629724210', '1629983410');
INSERT INTO `tbl_status_transaksi` VALUES (325, 3, 1, 123, 1, '', '1629724932', '1629811332');
INSERT INTO `tbl_status_transaksi` VALUES (326, 4, 1, 123, 1, '', '1629724996', '1629724996');
INSERT INTO `tbl_status_transaksi` VALUES (327, 5, 1, 123, NULL, NULL, '1629727498', '1629727498');
INSERT INTO `tbl_status_transaksi` VALUES (328, 1, 1, 124, 1, '', '1630642533', '1630642533');
INSERT INTO `tbl_status_transaksi` VALUES (329, 2, 1, 124, 1, '', '1630642631', '1630901831');
INSERT INTO `tbl_status_transaksi` VALUES (330, 3, 1, 124, 1, '', '1630642889', '1630729289');
INSERT INTO `tbl_status_transaksi` VALUES (331, 4, 1, 124, 1, '', '1630643297', '1630643297');
INSERT INTO `tbl_status_transaksi` VALUES (332, 5, 1, 124, 1, 'Sudah Diterima', '1630643464', '1630643464');
INSERT INTO `tbl_status_transaksi` VALUES (333, 2, 1, 117, 4, NULL, '1630651614', '1630910814');
INSERT INTO `tbl_status_transaksi` VALUES (334, 1, 1, 125, 1, '', '1630651714', '1630651714');
INSERT INTO `tbl_status_transaksi` VALUES (335, 2, 1, 125, 1, '', '1630651779', '1630910979');
INSERT INTO `tbl_status_transaksi` VALUES (336, 3, 1, 125, 1, '', '1630651800', '1630738200');
INSERT INTO `tbl_status_transaksi` VALUES (337, 4, 1, 125, NULL, NULL, '1630651807', '1630651807');
INSERT INTO `tbl_status_transaksi` VALUES (338, 1, 1, 126, 1, '', '1630652861', '1630652861');
INSERT INTO `tbl_status_transaksi` VALUES (339, 2, 1, 126, 1, '', '1630653972', '1630913172');
INSERT INTO `tbl_status_transaksi` VALUES (340, 3, 1, 126, 1, '', '1630653986', '1630740386');
INSERT INTO `tbl_status_transaksi` VALUES (341, 4, 1, 126, 1, '', '1630654012', '1630654012');
INSERT INTO `tbl_status_transaksi` VALUES (342, 5, 1, 126, NULL, NULL, '1630654018', '1630654018');
INSERT INTO `tbl_status_transaksi` VALUES (343, 1, 1, 127, 1, '', '1630655285', '1630655285');
INSERT INTO `tbl_status_transaksi` VALUES (344, 2, 1, 127, 1, '', '1630655297', '1630914497');
INSERT INTO `tbl_status_transaksi` VALUES (345, 3, 1, 127, 1, '', '1630655304', '1630741704');
INSERT INTO `tbl_status_transaksi` VALUES (346, 1, 1, 128, 1, '', '1630655496', '1630655496');
INSERT INTO `tbl_status_transaksi` VALUES (347, 4, 1, 127, 1, '', '1630656798', '1630656798');
INSERT INTO `tbl_status_transaksi` VALUES (348, 5, 1, 127, NULL, NULL, '1630657009', '1630657009');
INSERT INTO `tbl_status_transaksi` VALUES (349, 2, 1, 128, 1, '', '1630657062', '1630916262');
INSERT INTO `tbl_status_transaksi` VALUES (350, 3, 1, 128, 1, '', '1630657102', '1630743502');
INSERT INTO `tbl_status_transaksi` VALUES (351, 4, 1, 128, NULL, NULL, '1630657124', '1630657124');
INSERT INTO `tbl_status_transaksi` VALUES (352, 1, 1, 129, 1, '', '1630657575', '1630657575');
INSERT INTO `tbl_status_transaksi` VALUES (353, 2, 1, 129, 1, '', '1630657586', '1630916786');
INSERT INTO `tbl_status_transaksi` VALUES (354, 3, 1, 129, 1, '', '1630657591', '1630743991');
INSERT INTO `tbl_status_transaksi` VALUES (355, 4, 1, 129, 1, '', '1630657597', '1630657597');
INSERT INTO `tbl_status_transaksi` VALUES (356, 5, 1, 129, 1, 'Sudah Diterima', '1630657603', '1630657603');
INSERT INTO `tbl_status_transaksi` VALUES (358, 1, 1, 131, 1, '', '1630659782', '1630659782');
INSERT INTO `tbl_status_transaksi` VALUES (359, 1, 1, 132, 1, '', '1630659797', '1630659797');
INSERT INTO `tbl_status_transaksi` VALUES (360, 2, 1, 131, 1, '', '1630659823', '1630919023');
INSERT INTO `tbl_status_transaksi` VALUES (361, 2, 1, 132, 1, '', '1630659832', '1630919032');
INSERT INTO `tbl_status_transaksi` VALUES (362, 3, 1, 132, 1, '', '1630659847', '1630746247');
INSERT INTO `tbl_status_transaksi` VALUES (363, 3, 1, 131, 4, NULL, '1630659857', '1630746257');
INSERT INTO `tbl_status_transaksi` VALUES (365, 4, 1, 132, 1, '', '1630661000', '1630661000');
INSERT INTO `tbl_status_transaksi` VALUES (366, 5, 1, 132, NULL, NULL, '1630661006', '1630661006');
INSERT INTO `tbl_status_transaksi` VALUES (369, 1, 1, 136, 2, NULL, '1631022052', '1631022052');
INSERT INTO `tbl_status_transaksi` VALUES (370, 1, 1, 137, 2, NULL, '1631022230', '1631022230');
INSERT INTO `tbl_status_transaksi` VALUES (371, 1, 1, 138, 2, NULL, '1631022308', '1631022308');
INSERT INTO `tbl_status_transaksi` VALUES (372, 1, 1, 139, 2, NULL, '1631022433', '1631022433');
INSERT INTO `tbl_status_transaksi` VALUES (373, 1, 1, 140, 2, NULL, '1631022608', '1631022608');
INSERT INTO `tbl_status_transaksi` VALUES (374, 1, 1, 141, 2, NULL, '1631022752', '1631022752');
INSERT INTO `tbl_status_transaksi` VALUES (375, 1, 1, 142, 2, NULL, '1631022948', '1631022948');
INSERT INTO `tbl_status_transaksi` VALUES (376, 1, 1, 143, 2, NULL, '1631023045', '1631023045');
INSERT INTO `tbl_status_transaksi` VALUES (377, 1, 1, 144, 2, NULL, '1631023199', '1631023199');
INSERT INTO `tbl_status_transaksi` VALUES (378, 1, 1, 145, 2, NULL, '1631023272', '1631023272');
INSERT INTO `tbl_status_transaksi` VALUES (379, 1, 1, 146, 2, NULL, '1631027349', '1631027349');
INSERT INTO `tbl_status_transaksi` VALUES (380, 1, 1, 147, 2, NULL, '1631114881', '1631114881');
INSERT INTO `tbl_status_transaksi` VALUES (381, 1, 1, 148, 2, NULL, '1631116568', '1631116568');
INSERT INTO `tbl_status_transaksi` VALUES (382, 1, 1, 149, 2, NULL, '1631116923', '1631116923');
INSERT INTO `tbl_status_transaksi` VALUES (383, 2, 1, 118, 1, '', '1631117988', '1631377188');
INSERT INTO `tbl_status_transaksi` VALUES (384, 3, 1, 118, 1, '', '1631117992', '1631204392');
INSERT INTO `tbl_status_transaksi` VALUES (385, 4, 1, 118, 1, '', '1631117997', '1631117997');
INSERT INTO `tbl_status_transaksi` VALUES (386, 5, 1, 118, 1, '', '1631118004', '1631118004');
INSERT INTO `tbl_status_transaksi` VALUES (388, 1, 0, 155, 1, '', '1631595022', '1631595022');
INSERT INTO `tbl_status_transaksi` VALUES (390, 1, 0, 156, 1, '', '1631600998', '1631600998');
INSERT INTO `tbl_status_transaksi` VALUES (392, 1, 0, 157, 1, '', '1631633690', '1631633690');
INSERT INTO `tbl_status_transaksi` VALUES (393, 1, 0, 158, 1, '', '1631633934', '1631633934');
INSERT INTO `tbl_status_transaksi` VALUES (394, 2, 0, 158, 1, '', '1631633944', '1631893144');
INSERT INTO `tbl_status_transaksi` VALUES (395, 3, 0, 158, 1, '', '1631633968', '1631720368');
INSERT INTO `tbl_status_transaksi` VALUES (396, 4, 0, 158, 1, '', '1631633978', '1631633978');
INSERT INTO `tbl_status_transaksi` VALUES (397, 6, 55, 159, 1, '', '1631682200', '1631682200');
INSERT INTO `tbl_status_transaksi` VALUES (398, 6, 55, 159, 1, '', '1631682211', '1631941411');
INSERT INTO `tbl_status_transaksi` VALUES (399, 6, 55, 159, 1, '', '1631682219', '1631768619');
INSERT INTO `tbl_status_transaksi` VALUES (400, 6, 55, 159, 1, '', '1631682229', '1631682229');
INSERT INTO `tbl_status_transaksi` VALUES (401, 5, 55, 159, NULL, NULL, '1631682669', '1631682669');
INSERT INTO `tbl_status_transaksi` VALUES (402, 1, 0, 160, 1, '', '1631724966', '1631724966');
INSERT INTO `tbl_status_transaksi` VALUES (403, 2, 0, 160, 1, '', '1631725020', '1631984220');
INSERT INTO `tbl_status_transaksi` VALUES (404, 1, 0, 161, 1, '', '1631725531', '1631725531');
INSERT INTO `tbl_status_transaksi` VALUES (405, 2, 0, 161, 1, '', '1631725596', '1631984796');
INSERT INTO `tbl_status_transaksi` VALUES (406, 3, 0, 161, 1, '', '1631725604', '1631812004');
INSERT INTO `tbl_status_transaksi` VALUES (407, 4, 0, 161, 1, '', '1631725612', '1631725612');
INSERT INTO `tbl_status_transaksi` VALUES (408, 5, 0, 161, NULL, NULL, '1631725618', '1631725618');
INSERT INTO `tbl_status_transaksi` VALUES (409, 1, 0, 162, 1, '', '1631725773', '1631725773');
INSERT INTO `tbl_status_transaksi` VALUES (410, 2, 0, 162, 1, '', '1631725783', '1631984983');
INSERT INTO `tbl_status_transaksi` VALUES (411, 3, 0, 162, 1, '', '1631725796', '1631812196');
INSERT INTO `tbl_status_transaksi` VALUES (412, 4, 0, 162, 1, '', '1631725804', '1631725804');
INSERT INTO `tbl_status_transaksi` VALUES (413, 5, 51, 162, NULL, NULL, '1631725826', '1631725826');
INSERT INTO `tbl_status_transaksi` VALUES (414, 5, 52, 162, NULL, NULL, '1631725921', '1631725921');
INSERT INTO `tbl_status_transaksi` VALUES (415, 5, 53, 162, NULL, NULL, '1631726168', '1631726168');
INSERT INTO `tbl_status_transaksi` VALUES (416, 5, 54, 162, NULL, NULL, '1631726173', '1631726173');
INSERT INTO `tbl_status_transaksi` VALUES (417, 5, 55, 162, 1, NULL, '1631726177', '1631726177');
INSERT INTO `tbl_status_transaksi` VALUES (418, 6, 55, 162, 1, 'Sudah Diterima', '1631726183', '1631726183');
INSERT INTO `tbl_status_transaksi` VALUES (419, 1, 0, 163, 1, '', '1631727472', '1631727472');
INSERT INTO `tbl_status_transaksi` VALUES (420, 2, 0, 163, 1, '', '1631727489', '1631986689');
INSERT INTO `tbl_status_transaksi` VALUES (421, 3, 0, 163, 1, '', '1631727498', '1631813898');
INSERT INTO `tbl_status_transaksi` VALUES (422, 4, 0, 163, 1, '', '1631727513', '1631727513');
INSERT INTO `tbl_status_transaksi` VALUES (423, 5, 51, 163, 1, NULL, '1631727524', '1631727524');
INSERT INTO `tbl_status_transaksi` VALUES (424, 5, 52, 163, 1, NULL, '1631727536', '1631727536');
INSERT INTO `tbl_status_transaksi` VALUES (425, 5, 53, 163, 1, NULL, '1631727540', '1631727540');
INSERT INTO `tbl_status_transaksi` VALUES (426, 5, 54, 163, 1, NULL, '1631727545', '1631727545');
INSERT INTO `tbl_status_transaksi` VALUES (427, 5, 55, 163, 1, NULL, '1631727552', '1631727552');
INSERT INTO `tbl_status_transaksi` VALUES (428, 6, 55, 163, NULL, NULL, '1631727557', '1631727557');

-- ----------------------------
-- Table structure for tbl_status_transaksi_copy1
-- ----------------------------
DROP TABLE IF EXISTS `tbl_status_transaksi_copy1`;
CREATE TABLE `tbl_status_transaksi_copy1`  (
  `transaksi_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaksi_status_id` int(11) NOT NULL,
  `transaksi_order_id` int(11) NOT NULL,
  `transaksi_status` int(11) NULL DEFAULT NULL,
  `transaksi_keterangan` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `transaksi_tanggal` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `transaksi_tanggal_hangus` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`transaksi_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 387 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_status_transaksi_copy1
-- ----------------------------
INSERT INTO `tbl_status_transaksi_copy1` VALUES (163, 1, 67, 1, '', '1612841530', '1612841530');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (164, 2, 67, 1, '', '1612841651', '1613100851');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (165, 3, 67, 1, '', '1612841783', '1612928183');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (169, 4, 67, 1, '', '1612888965', '1612888965');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (170, 5, 67, 1, 'Sudah Diterima', '1612889045', '1612889045');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (171, 1, 68, 1, '', '1620908224', '1620908224');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (172, 2, 68, 1, '', '1620909962', '1621169162');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (173, 3, 68, 1, '', '1620913552', '1620999952');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (174, 4, 68, 1, '', '1620915071', '1620915071');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (175, 5, 68, 1, 'Sudah Diterima', '1620915107', '1620915107');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (176, 1, 69, 1, 'diterima', '1621015809', '1621015809');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (177, 2, 69, 1, 'gagal', '1621017600', '1621276800');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (178, 1, 70, 1, '', '1621017708', '1621017708');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (181, 1, 72, 1, '', '1621018374', '1621018374');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (184, 1, 74, 1, '', '1621018765', '1621018765');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (185, 2, 74, 1, '', '1621018774', '1621277974');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (186, 3, 74, 1, '', '1621019587', '1621105987');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (187, 4, 74, 1, '', '1621019807', '1621019807');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (188, 5, 74, 1, 'Sudah Diterima', '1621019937', '1621019937');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (189, 1, 75, 1, '', '1621020161', '1621020161');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (190, 2, 75, 1, '', '1621020169', '1621279369');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (191, 3, 75, 1, '', '1621020483', '1621106883');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (192, 1, 76, 1, '', '1621020697', '1621020697');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (193, 1, 77, 1, '', '1621020755', '1621020755');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (194, 2, 77, 1, '', '1621020761', '1621279961');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (195, 1, 78, 1, '', '1621020843', '1621020843');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (196, 2, 78, 1, '', '1621020853', '1621280053');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (197, 3, 78, 1, '', '1621020857', '1621107257');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (198, 4, 78, 1, '', '1621020897', '1621020897');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (199, 5, 78, 1, 'Sudah Diterima', '1621020927', '1621020927');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (200, 1, 79, 1, '', '1621021413', '1621021413');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (201, 2, 79, 1, '', '1621021421', '1621280621');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (202, 3, 79, 1, '', '1621021427', '1621107827');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (203, 4, 79, 1, '', '1621021431', '1621021431');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (204, 5, 79, 1, 'Sudah Diterima', '1621021436', '1621021436');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (205, 1, 80, 1, '', '1621022175', '1621022175');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (206, 2, 80, 1, '', '1621022182', '1621281382');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (207, 3, 80, 1, '', '1621022196', '1621108596');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (208, 4, 80, 1, '', '1621022200', '1621022200');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (209, 5, 80, 1, 'Sudah Diterima', '1621022205', '1621022205');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (210, 1, 81, 1, '', '1621022417', '1621022417');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (211, 2, 81, 1, '', '1621022427', '1621281627');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (212, 3, 81, 1, '', '1621022431', '1621108831');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (213, 4, 81, 1, '', '1621022438', '1621022438');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (214, 5, 81, 1, 'Sudah Diterima', '1621022454', '1621022454');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (228, 1, 95, 1, '', '1621652246', '1621652246');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (229, 2, 95, 1, '', '1621653025', '1621912225');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (230, 3, 95, 1, '', '1621653250', '1621739650');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (231, 4, 95, 1, '', '1621655440', '1621655440');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (232, 5, 95, 1, 'Sudah Diterima', '1621655456', '1621655456');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (239, 1, 99, 1, '', '1621664843', '1621664843');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (240, 2, 99, 1, '', '1621664962', '1621924162');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (241, 1, 100, 1, '', '1621739058', '1621739058');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (242, 2, 100, 4, NULL, '1621739070', '1621998270');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (243, 1, 101, 1, '', '1621744409', '1621744409');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (244, 2, 101, 4, NULL, '1621744741', '1622003941');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (245, 3, 99, 1, '', '1622208857', '1622295257');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (246, 4, 99, 1, '', '1622208923', '1622208923');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (247, 5, 99, 1, 'Sudah Diterima', '1622208954', '1622208954');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (248, 1, 102, 1, '', '1622264428', '1622264428');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (249, 2, 102, 1, '', '1622265731', '1622524931');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (250, 3, 102, 1, '', '1622265748', '1622352148');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (251, 4, 102, 1, '', '1622265987', '1622265987');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (252, 5, 102, 1, 'Sudah Diterima', '1622266460', '1622266460');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (253, 1, 103, 1, '', '1622266617', '1622266617');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (254, 2, 103, 1, '', '1622266704', '1622525904');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (255, 3, 103, 1, '', '1622266827', '1622353227');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (256, 4, 103, 1, '', '1622266880', '1622266880');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (257, 5, 103, 1, 'Sudah Diterima', '1622267244', '1622267244');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (258, 1, 104, 1, '', '1622270285', '1622270285');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (259, 2, 104, 1, '', '1622270321', '1622529521');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (260, 3, 104, 1, '', '1622275494', '1622361894');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (261, 4, 104, 1, '', '1622443830', '1622443830');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (262, 5, 104, 1, 'Sudah Diterima', '1622443836', '1622443836');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (263, 1, 105, 1, '', '1622802497', '1622802497');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (264, 2, 105, 1, '', '1622802515', '1623061715');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (265, 3, 105, 1, '', '1622802580', '1622888980');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (266, 1, 106, 1, '', '1622803145', '1622803145');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (267, 2, 106, 1, '', '1622888016', '1623147216');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (268, 3, 106, 1, '', '1622888673', '1622975073');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (269, 4, 105, 1, '', '1622888687', '1622888687');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (270, 5, 105, 1, 'Sudah Diterima', '1622888711', '1622888711');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (271, 4, 106, 1, '', '1622903222', '1622903222');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (272, 5, 106, 1, 'Sudah Diterima', '1622903228', '1622903228');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (273, 1, 107, 1, '', '1622906668', '1622906668');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (274, 2, 107, 1, '', '1622906682', '1623165882');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (275, 3, 107, 1, '', '1622906717', '1622993117');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (276, 4, 107, 1, '', '1622906847', '1622906847');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (277, 5, 107, 1, 'Sudah Diterima', '1622906860', '1622906860');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (278, 1, 108, 1, '', '1622907724', '1622907724');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (279, 2, 108, 1, '', '1622907859', '1623167059');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (280, 3, 108, 1, '', '1622907902', '1622994302');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (281, 4, 108, 1, '', '1622907948', '1622907948');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (282, 5, 108, 1, 'Sudah Diterima', '1622907953', '1622907953');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (286, 1, 110, 1, '', '1622985753', '1622985753');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (287, 2, 110, 1, '', '1622985762', '1623244962');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (288, 3, 110, 4, NULL, '1622986185', '1623072585');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (289, 1, 111, 1, '', '1623035631', '1623035631');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (290, 2, 111, 1, '', '1623035655', '1623294855');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (291, 3, 111, 1, '', '1623035910', '1623122310');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (292, 3, 111, 1, '', '1623036136', '1623122536');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (293, 4, 111, 1, '', '1623036542', '1623036542');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (294, 5, 111, 1, 'Sudah Diterima', '1623036570', '1623036570');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (295, 1, 112, 1, '', '1623046890', '1623046890');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (296, 2, 112, 1, '', '1623049161', '1623308361');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (297, 3, 112, 1, '', '1623049307', '1623135707');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (298, 4, 112, 1, '', '1623049652', '1623049652');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (299, 5, 112, 1, 'Sudah Diterima', '1623050777', '1623050777');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (300, 1, 113, 1, '', '1623138239', '1623138239');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (301, 2, 113, 1, '', '1623138256', '1623397456');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (302, 3, 113, 1, '', '1623138405', '1623224805');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (306, 1, 115, 1, '', '1623213990', '1623213990');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (307, 2, 115, 4, NULL, '1623215827', '1623475027');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (308, 4, 113, 1, '', '1623217418', '1623217418');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (309, 5, 113, 1, 'Sudah Diterima', '1623217426', '1623217426');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (311, 1, 117, 1, '', '1623237685', '1623237685');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (312, 1, 118, 1, '', '1623238903', '1623238903');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (313, 1, 119, 2, NULL, '1623238935', '1623238935');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (314, 1, 120, 1, '', '1629257103', '1629257103');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (315, 2, 120, 1, '', '1629257142', '1629516342');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (316, 3, 120, 4, NULL, '1629257219', '1629343619');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (317, 1, 121, 1, '', '1629259779', '1629259779');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (318, 2, 121, 1, '', '1629259859', '1629519059');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (319, 3, 121, 1, '', '1629260375', '1629346775');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (320, 4, 121, 1, '', '1629260537', '1629260537');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (321, 5, 121, 1, 'Sudah Diterima', '1629260805', '1629260805');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (322, 1, 122, 2, NULL, '1629261835', '1629261835');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (323, 1, 123, 1, '', '1629720814', '1629720814');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (324, 2, 123, 1, '', '1629724210', '1629983410');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (325, 3, 123, 1, '', '1629724932', '1629811332');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (326, 4, 123, 1, '', '1629724996', '1629724996');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (327, 5, 123, NULL, NULL, '1629727498', '1629727498');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (328, 1, 124, 1, '', '1630642533', '1630642533');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (329, 2, 124, 1, '', '1630642631', '1630901831');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (330, 3, 124, 1, '', '1630642889', '1630729289');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (331, 4, 124, 1, '', '1630643297', '1630643297');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (332, 5, 124, 1, 'Sudah Diterima', '1630643464', '1630643464');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (333, 2, 117, 4, NULL, '1630651614', '1630910814');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (334, 1, 125, 1, '', '1630651714', '1630651714');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (335, 2, 125, 1, '', '1630651779', '1630910979');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (336, 3, 125, 1, '', '1630651800', '1630738200');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (337, 4, 125, NULL, NULL, '1630651807', '1630651807');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (338, 1, 126, 1, '', '1630652861', '1630652861');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (339, 2, 126, 1, '', '1630653972', '1630913172');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (340, 3, 126, 1, '', '1630653986', '1630740386');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (341, 4, 126, 1, '', '1630654012', '1630654012');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (342, 5, 126, NULL, NULL, '1630654018', '1630654018');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (343, 1, 127, 1, '', '1630655285', '1630655285');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (344, 2, 127, 1, '', '1630655297', '1630914497');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (345, 3, 127, 1, '', '1630655304', '1630741704');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (346, 1, 128, 1, '', '1630655496', '1630655496');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (347, 4, 127, 1, '', '1630656798', '1630656798');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (348, 5, 127, NULL, NULL, '1630657009', '1630657009');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (349, 2, 128, 1, '', '1630657062', '1630916262');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (350, 3, 128, 1, '', '1630657102', '1630743502');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (351, 4, 128, NULL, NULL, '1630657124', '1630657124');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (352, 1, 129, 1, '', '1630657575', '1630657575');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (353, 2, 129, 1, '', '1630657586', '1630916786');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (354, 3, 129, 1, '', '1630657591', '1630743991');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (355, 4, 129, 1, '', '1630657597', '1630657597');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (356, 5, 129, 1, 'Sudah Diterima', '1630657603', '1630657603');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (357, 1, 130, 2, NULL, '1630659358', '1630659358');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (358, 1, 131, 1, '', '1630659782', '1630659782');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (359, 1, 132, 1, '', '1630659797', '1630659797');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (360, 2, 131, 1, '', '1630659823', '1630919023');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (361, 2, 132, 1, '', '1630659832', '1630919032');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (362, 3, 132, 1, '', '1630659847', '1630746247');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (363, 3, 131, 4, NULL, '1630659857', '1630746257');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (364, 1, 133, 2, NULL, '1630660536', '1630660536');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (365, 4, 132, 1, '', '1630661000', '1630661000');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (366, 5, 132, NULL, NULL, '1630661006', '1630661006');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (367, 1, 134, 2, NULL, '1631021510', '1631021510');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (368, 1, 135, 2, NULL, '1631022024', '1631022024');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (369, 1, 136, 2, NULL, '1631022052', '1631022052');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (370, 1, 137, 2, NULL, '1631022230', '1631022230');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (371, 1, 138, 2, NULL, '1631022308', '1631022308');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (372, 1, 139, 2, NULL, '1631022433', '1631022433');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (373, 1, 140, 2, NULL, '1631022608', '1631022608');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (374, 1, 141, 2, NULL, '1631022752', '1631022752');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (375, 1, 142, 2, NULL, '1631022948', '1631022948');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (376, 1, 143, 2, NULL, '1631023045', '1631023045');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (377, 1, 144, 2, NULL, '1631023199', '1631023199');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (378, 1, 145, 2, NULL, '1631023272', '1631023272');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (379, 1, 146, 2, NULL, '1631027349', '1631027349');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (380, 1, 147, 2, NULL, '1631114881', '1631114881');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (381, 1, 148, 2, NULL, '1631116568', '1631116568');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (382, 1, 149, 2, NULL, '1631116923', '1631116923');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (383, 2, 118, 1, '', '1631117988', '1631377188');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (384, 3, 118, 1, '', '1631117992', '1631204392');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (385, 4, 118, 1, '', '1631117997', '1631117997');
INSERT INTO `tbl_status_transaksi_copy1` VALUES (386, 5, 118, 1, '', '1631118004', '1631118004');

-- ----------------------------
-- Table structure for tbl_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_transaksi`;
CREATE TABLE `tbl_transaksi`  (
  `transaksi_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaksi_nohp` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `transaksi_product_id` int(11) NOT NULL,
  `transaksi_tanggal` date NULL DEFAULT NULL,
  `transaksi_jumlah` int(11) NOT NULL,
  `transaksi_keterangan` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `transaksi_harga` int(11) NULL DEFAULT NULL,
  `transaksi_bank` int(11) NULL DEFAULT NULL,
  `transaksi_atas_nama` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `transaksi_bukti` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `transaksi_paket` int(11) NULL DEFAULT NULL,
  `transaksi_terima` int(11) NULL DEFAULT NULL,
  `transaksi_new` int(11) NOT NULL,
  `transaksi_resi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `transaksi_ongkir` int(11) NULL DEFAULT NULL,
  `transaksi_link_desain` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `transaksi_dibayar` int(11) NOT NULL DEFAULT 0,
  `transaksi_personalisasi` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `transaksi_coating` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `transaksi_finishing` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `transaksi_function` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `transaksi_packaging` varchar(64) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`transaksi_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 164 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_transaksi
-- ----------------------------
INSERT INTO `tbl_transaksi` VALUES (67, '62895360698523', 7, '2021-02-09', 60, 'Kartu atm bahan ok', 147000, 1, 'Mahesa anugrah mulyo', '65d53075bc18828a739ae43583a3c49d.jpg', 1, 1, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (68, '6283839009856', 1, '2021-05-13', 100, '', 500000, 4, 'Yoha', '58ef25b53060f377181e9a2f8adcc2b6.jpg', 1, 1, 0, '12345', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (74, '6283839009856', 12, '2021-05-14', 5, '5', 12250, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (78, '6283839009856', 3, '2021-05-14', 21, '21', 51450, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (79, '6283839009856', 5, '2021-05-14', 20, '20', 49000, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (80, '6283839009856', 5, '2021-05-14', 100, '100', 245000, NULL, NULL, NULL, 2, 1, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (81, '6283839009856', 3, '2021-05-14', 1, '1', 2450, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (95, '6283839009856', 5, '2021-05-22', 25, 'weqweqweqwqwesaddsf', 61250, 1, 'Reza Fabriza Lesmana', 'a9c0899c2e4cc3d9cb65c141f07939e2.PNG', 2, 1, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (99, '6283839009856', 5, '2021-05-22', 50, 'sad', 122500, NULL, NULL, NULL, 2, 1, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (100, '6283839009856', 12, '2021-05-23', 100, '', 245000, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (101, '6283839009856', 13, '2021-05-23', 9899, 'asdasdsadasdsad', 24252550, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (102, '6283839009856', 4, '2021-05-29', 500, 'awokawokawok', 1225000, NULL, NULL, NULL, 2, 1, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (103, '6283839009856', 13, '2021-05-29', 750, 'asdadwaeawe', 1837500, 1, 'Yoha', '8a3ce6aaab4c515694d9fc44fd0a5054.png', 2, 1, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (104, '6283839009856', 17, '2021-05-29', 750, 'asdawesad', 1837500, 4, 'duit', '9fa5b8c2e3f8f6a49cc68aeb8a071db6.png', 1, 1, 0, '21323413423', 19000, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (105, '6283839009856', 5, '2021-06-04', 500, 'asdawe', 1225000, NULL, NULL, NULL, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (106, '6283839009856', 1, '2021-06-04', 700, 'asdasd', 3500000, NULL, NULL, NULL, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (107, '6283839009856', 4, '2021-06-05', 500, 'sadasdawe', 1225000, NULL, NULL, NULL, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (108, '6283839009856', 1, '2021-06-05', 10, '', 50000, NULL, NULL, NULL, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (110, '6283839009856', 8, '2021-06-06', 750, 'adbkabd', 1837500, NULL, NULL, NULL, 2, 0, 0, NULL, 50000, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (111, '6283839009856', 8, '2021-06-07', 10, '', 24500, 4, 'reja', 'Elsword Market.xlsx', 1, 1, 0, '3264352', 18000, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (112, '6283839009856', 18, '2021-06-07', 1, '', 2450, NULL, NULL, NULL, 2, 1, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (113, '6283839009856', 5, '2021-06-08', 100, '', 245000, NULL, NULL, NULL, 1, 1, 0, 'asxasxw', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (117, '6283839009856', 9, '2021-06-09', 750, 'afveawyvy', 1837500, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (115, '6283839009856', 5, '2021-06-09', 500, 'ssefsefs', 1225000, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'yogabangsat.com', 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (118, '6283839009856', 16, '2021-06-09', 10, 'sdasdwda', 24500, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (120, '6283839009856', 12, '2021-08-18', 300, '', 735000, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'https://www.youtube.com/watch?v=mqFNYZRxETg', 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (121, '6283839009856', 8, '2021-08-18', 300, 'test', 735000, 1, 'Reza Fabriza Lesmana', '77ba420a61d1cf11f451c4652bbfdac0.jpg', 1, 1, 0, '123456789', 36000, 'https://www.youtube.com/watch?v=mqFNYZRxETg', 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (159, '6283839009856', 4, '2021-09-15', 99, '99', 242550, NULL, NULL, NULL, 1, NULL, 0, NULL, 0, NULL, 0, '1', '1', '1', '1', '1');
INSERT INTO `tbl_transaksi` VALUES (123, '6283839009856', 8, '2021-08-23', 1, '', 2450, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (124, '628597499159', 7, '2021-09-03', 300, 'test', 735000, 1, '', 'fb9be9ca62c8d50bf7dfac4979f1d649.jpg', 1, 1, 0, 'Jne - 12345678', 250000, 'https://uptobox.com/u0lju6no0ujz', 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (125, '628597499159', 1, '2021-09-03', 500, 'test', 2500000, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (126, '628597499159', 3, '2021-09-03', 500, 'test', 1225000, NULL, NULL, NULL, 1, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (127, '628597499159', 3, '2021-09-03', 500, 'dfvds', 1225000, NULL, NULL, NULL, 1, NULL, 0, NULL, 25000, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (128, '628597499159', 7, '2021-09-03', 500, 'sdfsdf', 1225000, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (129, '628597499159', 9, '2021-09-03', 500, '343453', 1225000, NULL, NULL, NULL, 2, 1, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (131, '628597499159', 4, '2021-09-03', 20, 'test', 49000, NULL, NULL, NULL, 2, 0, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (132, '628597499159', 8, '2021-09-03', 20, 'test', 49000, NULL, NULL, NULL, 1, NULL, 0, '', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (158, '6283839009856', 3, '2021-09-14', 99, '99', 242550, NULL, NULL, NULL, 1, NULL, 0, NULL, 0, NULL, 0, '1', '1', '1', '1', '1');
INSERT INTO `tbl_transaksi` VALUES (157, '6283839009856', 1, '2021-09-14', 99, '99', 495000, NULL, NULL, NULL, 1, NULL, 0, NULL, 0, NULL, 0, '1', '1', '1', '1', '1');
INSERT INTO `tbl_transaksi` VALUES (136, '628597499159', 5, '2021-09-07', 124124, 'sadwdwae', 304103800, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (137, '628597499159', 1, '2021-09-07', 0, 'sefrqBA', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (138, '628597499159', 1, '2021-09-07', 3242342, 'srfwr', 2147483647, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (139, '628597499159', 9, '2021-09-07', 800, 'guvilgul', 1960000, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (140, '628597499159', 7, '2021-09-07', 700, 'etgrtgdtg', 1715000, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (141, '628597499159', 5, '2021-09-07', 555, 'fseefesr', 1359750, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transaksi` VALUES (147, '628597499159', 4, '2021-09-08', 80, 'eadwae', 196000, NULL, NULL, NULL, 1, NULL, 0, NULL, 0, NULL, 0, '3', '2', '6', '3', '2');
INSERT INTO `tbl_transaksi` VALUES (148, '628597499159', 17, '2021-09-08', 999, '23423Adraw', 2447550, NULL, NULL, NULL, 1, NULL, 0, NULL, 0, NULL, 0, '3', '2', NULL, '4', '3');
INSERT INTO `tbl_transaksi` VALUES (149, '628597499159', 7, '2021-09-08', 500, 'adw2eda', 1225000, NULL, NULL, NULL, 2, NULL, 0, NULL, 0, NULL, 0, '2', '1', '8', '3', '6');
INSERT INTO `tbl_transaksi` VALUES (150, '6283839009856', 1, '2021-09-12', 12, '', 60000, NULL, NULL, NULL, 2, NULL, 0, NULL, 0, NULL, 0, '1', '1', '2', '4', '5');
INSERT INTO `tbl_transaksi` VALUES (151, '6283839009856', 4, '2021-09-12', 4564, '', 11181800, NULL, NULL, NULL, 2, NULL, 0, NULL, 0, NULL, 0, '1', '1', '1', '1', '1');
INSERT INTO `tbl_transaksi` VALUES (152, '6283839009856', 5, '2021-09-14', 99, '90', 242550, NULL, NULL, NULL, 1, NULL, 0, NULL, 0, NULL, 0, '1', '1', '1', '1', '1');
INSERT INTO `tbl_transaksi` VALUES (153, '6283839009856', 9, '2021-09-14', 99, '99', 242550, NULL, NULL, NULL, 1, NULL, 0, NULL, 0, NULL, 0, '1', '1', '1', '1', '1');
INSERT INTO `tbl_transaksi` VALUES (156, '6283839009856', 1, '2021-09-14', 99, '99', 495000, NULL, NULL, NULL, 1, NULL, 0, NULL, 0, NULL, 0, '1', '1', '1', '1', '1');
INSERT INTO `tbl_transaksi` VALUES (155, '6283839009856', 13, '2021-09-14', 99, '99', 242550, NULL, NULL, NULL, 1, NULL, 0, NULL, 0, NULL, 0, '1', '1', '1', '1', '1');
INSERT INTO `tbl_transaksi` VALUES (160, '6283839009856', 4, '2021-09-15', 99, '99', 242550, NULL, NULL, NULL, 1, NULL, 0, NULL, 0, NULL, 0, '1', '1', '1', '1', '1');
INSERT INTO `tbl_transaksi` VALUES (161, '6283839009856', 1, '2021-09-15', 99, '99', 495000, NULL, NULL, NULL, 1, NULL, 0, NULL, 0, NULL, 0, '1', '1', '1', '1', '1');
INSERT INTO `tbl_transaksi` VALUES (162, '6283839009856', 1, '2021-09-15', 99, '99', 495000, NULL, NULL, NULL, 1, 1, 0, NULL, 0, NULL, 0, '1', '1', '1', '1', '1');
INSERT INTO `tbl_transaksi` VALUES (163, '6283839009856', 3, '2021-09-15', 99, '99', 242550, NULL, NULL, NULL, 1, NULL, 0, '123', 0, NULL, 0, '1', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for tbl_user_design
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user_design`;
CREATE TABLE `tbl_user_design`  (
  `design_id` int(11) NOT NULL AUTO_INCREMENT,
  `design_user_id` int(11) NOT NULL,
  `design_nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `design_design` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `design_image` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `design_width` int(11) NOT NULL,
  `design_height` int(11) NOT NULL,
  `design_category` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `design_transaksi_id` int(11) NOT NULL,
  PRIMARY KEY (`design_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 57 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user_design
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_verifikasi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_verifikasi`;
CREATE TABLE `tbl_verifikasi`  (
  `verif_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `transaksi_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `verif_pesanan` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `verif_desain` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `verif_pembayaran` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `verif_approval` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `verif_cetak` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `verif_kirimambil` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`verif_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_verifikasi
-- ----------------------------
INSERT INTO `tbl_verifikasi` VALUES (1, 73, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (2, 74, 'admin', 'desain', 'pembayaran', NULL, 'cetak', 'kirimambil');
INSERT INTO `tbl_verifikasi` VALUES (3, 74, 'admin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (4, 74, 'admin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (5, 75, 'admin', 'admin', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (7, 76, 'admin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (8, 77, 'admin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (9, 78, 'admin', 'admin', 'admin', NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (10, 79, 'admin', 'admin', 'admin', NULL, 'admin', 'admin');
INSERT INTO `tbl_verifikasi` VALUES (11, 80, 'admin', 'admin', 'admin', NULL, 'admin', NULL);
INSERT INTO `tbl_verifikasi` VALUES (12, 81, 'admin', 'admin', 'admin', NULL, 'admin', 'Amarizky Yoga Pratama');
INSERT INTO `tbl_verifikasi` VALUES (13, 95, 'admin', 'admin', 'admin', NULL, 'admin', 'admin');
INSERT INTO `tbl_verifikasi` VALUES (14, 96, 'admin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (15, 97, 'admin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (16, 98, 'admin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (17, 99, 'admin', 'admin', 'admin', NULL, 'admin', 'Amarizky Yoga Pratama');
INSERT INTO `tbl_verifikasi` VALUES (18, 100, 'admin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (19, 101, 'admin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (20, 102, 'admin', 'admin', 'admin', NULL, 'admin', 'Amarizky Yoga Pratama');
INSERT INTO `tbl_verifikasi` VALUES (21, 103, 'admin', 'admin', 'admin', NULL, 'admin', 'Amarizky Yoga Pratama');
INSERT INTO `tbl_verifikasi` VALUES (22, 104, 'admin', 'admin', 'admin', NULL, 'admin', 'Amarizky Yoga Pratama');
INSERT INTO `tbl_verifikasi` VALUES (23, 105, 'admin', 'admin', 'admin', NULL, 'admin', 'Amarizky Yoga Pratama');
INSERT INTO `tbl_verifikasi` VALUES (24, 106, 'admin', 'admin', 'admin', NULL, 'admin', 'Amarizky Yoga Pratama');
INSERT INTO `tbl_verifikasi` VALUES (25, 107, 'admin', 'admin', 'admin', NULL, 'admin', 'Amarizky Yoga Pratama');
INSERT INTO `tbl_verifikasi` VALUES (26, 108, 'admin', 'admin', 'admin', NULL, 'admin', 'Amarizky Yoga Pratama');
INSERT INTO `tbl_verifikasi` VALUES (27, 109, 'admin', 'admin', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (28, 110, 'admin', 'admin', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (29, 111, 'admin', 'admin', 'admin', NULL, 'admin', 'Amarizky Yoga Pratama');
INSERT INTO `tbl_verifikasi` VALUES (30, 112, 'admin', 'admin', 'admin', NULL, 'admin', 'admin');
INSERT INTO `tbl_verifikasi` VALUES (31, 113, 'admin', 'admin', 'admin', NULL, 'admin', 'admin');
INSERT INTO `tbl_verifikasi` VALUES (32, 114, 'admin', 'admin', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (33, 115, 'admin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (34, 120, 'admin', 'admin', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (35, 121, 'admin', 'admin', 'admin', NULL, 'admin', 'Amarizky Yoga Pratama');
INSERT INTO `tbl_verifikasi` VALUES (36, 123, 'admin', 'admin', 'admin', NULL, 'admin', NULL);
INSERT INTO `tbl_verifikasi` VALUES (37, 124, 'admin', 'admin', 'admin', NULL, 'admin', 'Reza Fabriza Lesmana');
INSERT INTO `tbl_verifikasi` VALUES (38, 117, 'admin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (39, 125, 'admin', 'admin', 'admin', NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (40, 126, 'admin', 'admin', 'admin', NULL, 'admin', NULL);
INSERT INTO `tbl_verifikasi` VALUES (41, 127, 'admin', 'admin', 'admin', NULL, 'admin', NULL);
INSERT INTO `tbl_verifikasi` VALUES (42, 128, 'admin', 'admin', 'admin', NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (43, 129, 'admin', 'admin', 'admin', NULL, 'admin', 'admin');
INSERT INTO `tbl_verifikasi` VALUES (44, 131, 'admin', 'admin', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (45, 132, 'admin', 'admin', 'admin', NULL, 'admin', NULL);
INSERT INTO `tbl_verifikasi` VALUES (46, 118, 'admin', 'admin', 'admin', NULL, 'admin', NULL);
INSERT INTO `tbl_verifikasi` VALUES (47, 155, 'admin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (48, 156, 'admin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (49, 157, 'admin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (50, 158, 'admin', 'admin', 'admin', NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (51, 159, 'admin', 'admin', 'admin', 'admin', NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (52, 160, 'admin', 'admin', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (53, 161, 'admin', 'admin', 'admin', 'admin', NULL, NULL);
INSERT INTO `tbl_verifikasi` VALUES (54, 162, 'admin', 'admin', 'admin', 'admin', 'admin', 'Amarizky Yoga Pratama');
INSERT INTO `tbl_verifikasi` VALUES (55, 163, 'admin', 'admin', 'admin', 'admin', 'admin', NULL);

-- ----------------------------
-- Table structure for tbl_your_image
-- ----------------------------
DROP TABLE IF EXISTS `tbl_your_image`;
CREATE TABLE `tbl_your_image`  (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_user_id` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`image_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_your_image
-- ----------------------------
INSERT INTO `tbl_your_image` VALUES (27, '28', 'Untitled design.png');
INSERT INTO `tbl_your_image` VALUES (28, '28', 'Desain tanpa judul.png');
INSERT INTO `tbl_your_image` VALUES (29, '28', 'P9HtDp-instagram-logo-png-icon-transparent.png');
INSERT INTO `tbl_your_image` VALUES (30, '28', 'oprec bem u baru.jpg');
INSERT INTO `tbl_your_image` VALUES (32, '28', 'logo-kartuidcard-white.png');

SET FOREIGN_KEY_CHECKS = 1;
