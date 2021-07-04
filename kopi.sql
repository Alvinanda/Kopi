/*
 Navicat Premium Data Transfer

 Source Server         : Databse
 Source Server Type    : MySQL
 Source Server Version : 100419
 Source Host           : localhost:3306
 Source Schema         : kopi

 Target Server Type    : MySQL
 Target Server Version : 100419
 File Encoding         : 65001

 Date: 04/07/2021 14:36:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for absensi
-- ----------------------------
DROP TABLE IF EXISTS `absensi`;
CREATE TABLE `absensi`  (
  `id_absen` int NOT NULL AUTO_INCREMENT,
  `id_user` int NULL DEFAULT NULL,
  `id_outlet` int NULL DEFAULT NULL,
  `id_jadwal` int NULL DEFAULT NULL,
  `checkin` timestamp NULL DEFAULT NULL,
  `checkout` timestamp NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_absen`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of absensi
-- ----------------------------
INSERT INTO `absensi` VALUES (1, 3, 2, 15, '2021-06-28 18:30:37', '2021-06-29 15:04:05', 'sudah divalidasi');
INSERT INTO `absensi` VALUES (2, 3, 2, 15, '2021-06-29 15:03:18', '2021-06-29 15:04:05', 'sudah divalidasi');
INSERT INTO `absensi` VALUES (3, 14, 2, 14, '2021-06-30 20:16:30', NULL, 'belum divalidasi');

-- ----------------------------
-- Table structure for bahan_baku
-- ----------------------------
DROP TABLE IF EXISTS `bahan_baku`;
CREATE TABLE `bahan_baku`  (
  `id_bahan` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah` int NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `outlet` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_bahan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bahan_baku
-- ----------------------------
INSERT INTO `bahan_baku` VALUES (1, 'Kopi arjuna', 10, 'sudah terbayar', 2);
INSERT INTO `bahan_baku` VALUES (2, 'Kopi arjuna', 10, 'sudah terbayar', 2);

-- ----------------------------
-- Table structure for detail_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `detail_penjualan`;
CREATE TABLE `detail_penjualan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_penjualan` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_menu` int NULL DEFAULT NULL,
  `jumlah` int NULL DEFAULT NULL,
  `id_outlet` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_penjualan
-- ----------------------------
INSERT INTO `detail_penjualan` VALUES (1, '20210702288', 5, 2, 2);
INSERT INTO `detail_penjualan` VALUES (2, '20210702288', 1, 2, 2);
INSERT INTO `detail_penjualan` VALUES (3, '20210702288', 1, 4, 2);
INSERT INTO `detail_penjualan` VALUES (4, '20210702288', 1, 1, 2);
INSERT INTO `detail_penjualan` VALUES (7, '20210703214', 1, 2, 2);
INSERT INTO `detail_penjualan` VALUES (10, '20210703214', 1, 1, 2);
INSERT INTO `detail_penjualan` VALUES (11, '20210703214', 1, 1, 2);

-- ----------------------------
-- Table structure for hari
-- ----------------------------
DROP TABLE IF EXISTS `hari`;
CREATE TABLE `hari`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `hari` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hari_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hari
-- ----------------------------
INSERT INTO `hari` VALUES (1, 'minggu', 'Sunday');
INSERT INTO `hari` VALUES (2, 'senin', 'Monday');
INSERT INTO `hari` VALUES (3, 'selasa', 'Tuesday');
INSERT INTO `hari` VALUES (4, 'rabu', 'Wednesday');
INSERT INTO `hari` VALUES (5, 'kamis', 'Thrusday');
INSERT INTO `hari` VALUES (6, 'jumat', 'Friday');
INSERT INTO `hari` VALUES (7, 'sabtu', 'Saturday');

-- ----------------------------
-- Table structure for inventaris
-- ----------------------------
DROP TABLE IF EXISTS `inventaris`;
CREATE TABLE `inventaris`  (
  `id_barang` int NOT NULL,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah` int NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_outlet` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of inventaris
-- ----------------------------

-- ----------------------------
-- Table structure for jadwal_shift
-- ----------------------------
DROP TABLE IF EXISTS `jadwal_shift`;
CREATE TABLE `jadwal_shift`  (
  `id_jadwal` int NOT NULL AUTO_INCREMENT,
  `id_user` int NULL DEFAULT NULL,
  `id_outlet` int NULL DEFAULT NULL,
  `kode_shift` int NULL DEFAULT NULL,
  `hari` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jadwal_shift
-- ----------------------------
INSERT INTO `jadwal_shift` VALUES (10, 3, 2, 2, 3);
INSERT INTO `jadwal_shift` VALUES (13, 15, 2, 2, 3);
INSERT INTO `jadwal_shift` VALUES (14, 14, 2, 2, 4);
INSERT INTO `jadwal_shift` VALUES (15, 3, 2, 1, 1);

-- ----------------------------
-- Table structure for menu_bar
-- ----------------------------
DROP TABLE IF EXISTS `menu_bar`;
CREATE TABLE `menu_bar`  (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `outlet` int NULL DEFAULT NULL,
  `harga` int NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_menu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of menu_bar
-- ----------------------------
INSERT INTO `menu_bar` VALUES (1, 'Coffe Latte edit', 2, 10000, 'tersedia');
INSERT INTO `menu_bar` VALUES (4, 'Kopi susu', 1, 1000, 'tersedia');
INSERT INTO `menu_bar` VALUES (5, 'Kopi Arjuna class D 10 gram edit', 2, 1000, 'tersedia');

-- ----------------------------
-- Table structure for menu_retail
-- ----------------------------
DROP TABLE IF EXISTS `menu_retail`;
CREATE TABLE `menu_retail`  (
  `id_retail` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga` int NULL DEFAULT NULL,
  `outlet` int NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_retail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of menu_retail
-- ----------------------------
INSERT INTO `menu_retail` VALUES (1, 'Kopi Arjuna class D 10 gram', 1000, 2, 'tersedia');
INSERT INTO `menu_retail` VALUES (3, 'asdasd', 213123, 2, 'asd');

-- ----------------------------
-- Table structure for outlet
-- ----------------------------
DROP TABLE IF EXISTS `outlet`;
CREATE TABLE `outlet`  (
  `id_outlet` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_berdiri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jam_buka` time NULL DEFAULT NULL,
  `jam_tutup` time NULL DEFAULT NULL,
  PRIMARY KEY (`id_outlet`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of outlet
-- ----------------------------
INSERT INTO `outlet` VALUES (12, 'Kidjang', 'sunan kali jaga', '12/28/2020', 'aktif', '20:00:00', '10:00:00');
INSERT INTO `outlet` VALUES (101, 'Remboeg', 'jalan gunung kelud', '06/03/2021', 'aktif', '00:00:00', '12:00:00');
INSERT INTO `outlet` VALUES (111, 'Brewok', 'jalan kapuas', '2019/03/29', 'aktif', '08:00:00', '22:00:00');
INSERT INTO `outlet` VALUES (1011, 'Koopen', 'jalan setasiun', '06/03/2021', 'aktif', '20:00:00', '00:00:00');

-- ----------------------------
-- Table structure for pengeluaran
-- ----------------------------
DROP TABLE IF EXISTS `pengeluaran`;
CREATE TABLE `pengeluaran`  (
  `id_pengeluaran` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `total` int NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `outlet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_transaksi` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_pengeluaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pengeluaran
-- ----------------------------
INSERT INTO `pengeluaran` VALUES (1, 'Beli Gula ', 1000000, 'credit', '2', '2021-05-30');
INSERT INTO `pengeluaran` VALUES (2, 'Beli Nasi', 100000, 'debit', '1', '2021-05-30');

-- ----------------------------
-- Table structure for penjualan
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan`  (
  `id_penjualan` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pembeli` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT NULL,
  `id_user` int NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_outlet` int NULL DEFAULT NULL,
  `star_member` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_penjualan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penjualan
-- ----------------------------
INSERT INTO `penjualan` VALUES ('20210702224', 'sisil', '2021-07-02 21:05:57', 14, 'Belum Dibayar', 2, 'Tidak');
INSERT INTO `penjualan` VALUES ('20210702288', 'sisil', '2021-07-02 21:06:08', 14, 'Belum Dibayar', 2, 'Tidak');
INSERT INTO `penjualan` VALUES ('20210703214', 'juni', '2021-07-03 11:58:30', 14, 'Sudah Dibayar', 2, 'Tidak');

-- ----------------------------
-- Table structure for shift
-- ----------------------------
DROP TABLE IF EXISTS `shift`;
CREATE TABLE `shift`  (
  `id_shift` int NOT NULL AUTO_INCREMENT,
  `kode_shift` int NULL DEFAULT NULL,
  `jam_masuk` time NULL DEFAULT NULL,
  `jam_selesai` time NULL DEFAULT NULL,
  `outlet` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_shift`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of shift
-- ----------------------------
INSERT INTO `shift` VALUES (1, 1, '08:00:00', '17:00:00', 2);
INSERT INTO `shift` VALUES (3, 2, '17:00:00', '00:00:00', 2);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `nomor_telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `outlet` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'alvin', '1234', 'disini', 'pria', '2021-06-08', '08123456789', 'aktif', 'holding', 1);
INSERT INTO `user` VALUES (2, 'nanda', '1234', 'kono', 'L', '2021-06-07', NULL, 'aktif', 'owner', 2);
INSERT INTO `user` VALUES (3, 'Jon', '1234', 'kana', 'L', '2021-06-13', NULL, 'atif', 'manajer', 2);
INSERT INTO `user` VALUES (4, 'Jin', '1234', 'langsep', 'L', '2021-06-06', NULL, 'aktif', 'staff', 4);
INSERT INTO `user` VALUES (8, 'huhu', '1234', 'jalan kendal payak', 'L', '2011-07-01', NULL, 'aktif', 'staff', 1);
INSERT INTO `user` VALUES (12, 'tom', '1234', 'jalan gunung kelud 23', 'pria', '2019-02-28', '08162+656', 'aktif', 'staff', 1);
INSERT INTO `user` VALUES (13, 'tim', '1234', 'ajaaa', 'pria', '2019-03-22', '12321`', 'aktif', 'staff', 12);
INSERT INTO `user` VALUES (14, 'joss 2', '1234', 'jalan kendal payak 23', 'pria', '1999-03-12', '12313', 'aktif', 'staff', 2);
INSERT INTO `user` VALUES (15, 'joss', '1234', 'jalan kendal payak 23', 'pria', '1899-10-31', '1231231', 'aktif', 'manajer', 2);
INSERT INTO `user` VALUES (23, 'jeje', '*********', 'jauuuuh', 'pria', '2021-05-03', '12321513515841', 'aktif', 'star member', 2);

SET FOREIGN_KEY_CHECKS = 1;
