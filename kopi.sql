/*
 Navicat Premium Data Transfer

 Source Server         : Databse
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : kopi

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 16/06/2021 23:32:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for absensi
-- ----------------------------
DROP TABLE IF EXISTS `absensi`;
CREATE TABLE `absensi`  (
  `id_absen` int NOT NULL,
  `id_user` int NULL DEFAULT NULL,
  `id_outlet` int NULL DEFAULT NULL,
  `id_jadwal` int NULL DEFAULT NULL,
  `checkin` timestamp NULL DEFAULT NULL,
  `checkout` timestamp NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_absen`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of absensi
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bahan_baku
-- ----------------------------
INSERT INTO `bahan_baku` VALUES (1, 'Kopi arjuna', 10, 'sudah terbayar', 2);
INSERT INTO `bahan_baku` VALUES (2, 'Kopi arjuna', 10, 'sudah terbayar', 2);

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
  `jam_masuk` time NULL DEFAULT NULL,
  `jam_selesai` time NULL DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jadwal_shift
-- ----------------------------
INSERT INTO `jadwal_shift` VALUES (1, 3, 2, '20:00:00', '09:00:00');
INSERT INTO `jadwal_shift` VALUES (2, 8, 2, '09:00:00', '22:00:00');
INSERT INTO `jadwal_shift` VALUES (3, 12, 2, '08:00:00', '22:00:00');
INSERT INTO `jadwal_shift` VALUES (4, 12, 2, '08:00:00', '22:00:00');
INSERT INTO `jadwal_shift` VALUES (5, 13, 2, '09:00:00', '22:00:00');
INSERT INTO `jadwal_shift` VALUES (6, 13, 2, '09:00:00', '22:00:00');

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu_bar
-- ----------------------------
INSERT INTO `menu_bar` VALUES (1, 'Coffe Latte edit', 2, 1000001, 'tersedia');
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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengeluaran
-- ----------------------------
INSERT INTO `pengeluaran` VALUES (1, 'Beli Gula ', 1000000, 'credit', '2', '2021-05-30');
INSERT INTO `pengeluaran` VALUES (2, 'Beli Nasi', 100000, 'debit', '1', '2021-05-30');

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
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
