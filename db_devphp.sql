/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100428
 Source Host           : localhost:3306
 Source Schema         : db_devphp

 Target Server Type    : MySQL
 Target Server Version : 100428
 File Encoding         : 65001

 Date: 03/09/2023 19:13:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pegawai
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pegawai
-- ----------------------------
INSERT INTO `pegawai` VALUES (1, 'HRD', 'Jl. Contoh 123', '1693736918_52eb76b093d2a268f2f7.jpg');
INSERT INTO `pegawai` VALUES (2, 'Pegawai 12', 'Jl. Contoh 456', '1693737850_7d965324a2acbf05c38b.jpg');
INSERT INTO `pegawai` VALUES (3, 'pegawai 2', 'Jl. Contoh 789', NULL);
INSERT INTO `pegawai` VALUES (4, 'Reza Fabriza Lesmana', 'Jl.Kartini VII A No.3', '1693737109_0c4b67e0bc8b22067031.jpg');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'user1', '$2y$10$qMonPc4qq4y5XShEyZZ9e.c0pRyya5KznDWcW7bFHuM5zqA2hCAMG', 'HRD', 'Indonesia');
INSERT INTO `users` VALUES (2, 'reza', '$2y$10$hLdCRF4RLN4TxFgycBGFPO9EF6p/SR8i6MzpXu0ZWYFX0.1s7hX5F6', 'Reza Fabriza Lesmana', 'JL.Kartini VIIA No.3');
INSERT INTO `users` VALUES (3, 'fabriza', '$2y$10$hLdCRF4RLN4TxFgycBGFPO9EF6p/SR8i6MzpXu0ZWYFX0.1s7hX5F6', 'Reza Fabriza Lesmana', 'Komplek AKPOl BLOK C NO.2');
INSERT INTO `users` VALUES (4, 'rezalesmana', '$2y$10$pNljKHONlghimyN7ttVpPeQ4sCPBV//aOFtV0V3afaoRwyk90cT9G', 'Reza Fabriza Lesmana', 'Jl. Maleer utara');

SET FOREIGN_KEY_CHECKS = 1;
