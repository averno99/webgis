/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : webgis

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 25/10/2021 15:26:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for data_produksi
-- ----------------------------
DROP TABLE IF EXISTS `data_produksi`;
CREATE TABLE `data_produksi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_petani` int NOT NULL,
  `komoditas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `luas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `panen_kg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_petani`(`id_petani`) USING BTREE,
  CONSTRAINT `data_produksi_ibfk_1` FOREIGN KEY (`id_petani`) REFERENCES `petani` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of data_produksi
-- ----------------------------
INSERT INTO `data_produksi` VALUES (7, 19, 'Padi', '1', '3000', '4700');

-- ----------------------------
-- Table structure for gapoktan
-- ----------------------------
DROP TABLE IF EXISTS `gapoktan`;
CREATE TABLE `gapoktan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `geojson` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gapoktan_dibuat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gapoktan_diubah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of gapoktan
-- ----------------------------
INSERT INTO `gapoktan` VALUES (1, 'Mekar Jaya', '02_Titik_Poktan_Pal_IX.geojson', '', 'Admin WEBGIS');
INSERT INTO `gapoktan` VALUES (2, 'Madiun Bersatu', '01_Titik_Poktan_Parit_Keladi.geojson', '', 'Admin WEBGIS');
INSERT INTO `gapoktan` VALUES (5, 'Cahaya Rezeki', '03_Titik_Poktan_Sungai_Itik.geojson', '', 'Admin WEBGIS');

-- ----------------------------
-- Table structure for infrastruktur
-- ----------------------------
DROP TABLE IF EXISTS `infrastruktur`;
CREATE TABLE `infrastruktur`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_poktan` int NOT NULL,
  `infra_pertanian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_poktan`(`id_poktan`) USING BTREE,
  CONSTRAINT `infrastruktur_ibfk_1` FOREIGN KEY (`id_poktan`) REFERENCES `poktan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 57 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of infrastruktur
-- ----------------------------

-- ----------------------------
-- Table structure for keleng_adminis
-- ----------------------------
DROP TABLE IF EXISTS `keleng_adminis`;
CREATE TABLE `keleng_adminis`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_poktan` int NOT NULL,
  `adminis_kelompok` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_poktan`(`id_poktan`) USING BTREE,
  CONSTRAINT `keleng_adminis_ibfk_1` FOREIGN KEY (`id_poktan`) REFERENCES `poktan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 93 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of keleng_adminis
-- ----------------------------

-- ----------------------------
-- Table structure for lokasi_pertanian
-- ----------------------------
DROP TABLE IF EXISTS `lokasi_pertanian`;
CREATE TABLE `lokasi_pertanian`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_petani` int NOT NULL,
  `luas_lahan_sendiri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `luas_lahan_sewa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `lokasi_pertanian_ibfk_1`(`id_petani`) USING BTREE,
  CONSTRAINT `lokasi_pertanian_ibfk_1` FOREIGN KEY (`id_petani`) REFERENCES `petani` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of lokasi_pertanian
-- ----------------------------
INSERT INTO `lokasi_pertanian` VALUES (19, 15, '', '', '', '-0.053873808754345', '109.237929140735048');
INSERT INTO `lokasi_pertanian` VALUES (22, 13, '', '', '', '-0.039042', '109.328433');

-- ----------------------------
-- Table structure for petani
-- ----------------------------
DROP TABLE IF EXISTS `petani`;
CREATE TABLE `petani`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_anggota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pekerjaan_utama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pengolah_lahan` int NOT NULL,
  `tanam` int NOT NULL,
  `pemeliharaan` int NOT NULL,
  `panen` int NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_keluarga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jml_anggota_keluarga` int NOT NULL,
  `jml_tanggungan` int NOT NULL,
  `pendidikan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `riwayat_pelatihan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_poktan` int NOT NULL,
  `status_post` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `periode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `petani_dibuat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `petani_diubah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of petani
-- ----------------------------
INSERT INTO `petani` VALUES (13, 'Coba', 'Coba', 'AAA', 'Coba', '', '', 0, 0, 0, 0, '', '', 0, 0, '', '', '', '', 12, '', '', '', '');
INSERT INTO `petani` VALUES (15, 'Suwarji', 'Suwarji', 'B01', '', 'Anggota Kelompok Tani', '', 0, 0, 0, 0, 'Perempuan', '', 0, 0, 'Sarjana', '', '', '', 19, 'Belum Di Post', '2021', 'Admin WEBGIS', 'Admin WEBGIS');
INSERT INTO `petani` VALUES (16, 'Suwaji', 'Suwaji', 'C10', '', 'Anggota Kelompok Tani', '', 0, 0, 0, 0, 'Laki-Laki', '', 0, 0, 'Sarjana', '', '', 'rehan.PNG', 13, 'Belum Di Post', '2021', 'Admin WEBGIS', '');
INSERT INTO `petani` VALUES (17, 'Sumarni', 'Sumarni', 'A03', '', 'Anggota Kelompok Tani', '', 0, 0, 0, 0, 'Perempuan', '', 0, 0, 'SMU/SMK', '', '', '', 24, 'Belum Di Post', '2021', 'Admin WEBGIS', '');
INSERT INTO `petani` VALUES (18, 'Suparman', 'Suparman', 'D14', '', 'Anggota Kelompok Tani', '', 0, 0, 0, 0, 'Laki-Laki', '', 0, 0, 'SLTP', '', '', '', 14, 'Belum Di Post', '2021', 'Admin WEBGIS', '');
INSERT INTO `petani` VALUES (19, 'Halim', 'Halim', 'A07', 'Anggota', 'Anggota Kelompok Tani', 'Petani', 1, 20, 0, 20, 'Laki-Laki', 'Kepala Keluarga', 4, 3, 'SD', '0', '', 'foto.jpeg', 15, 'Belum Di Post', '2021', 'Admin WEBGIS', 'Admin WEBGIS');
INSERT INTO `petani` VALUES (20, 'Saidi', 'Saidi', 'H21', '', 'Anggota Kelompok Tani', '', 0, 0, 0, 0, 'Laki-Laki', '', 0, 0, 'Sarjana', '', '', '', 25, 'Belum Di Post', '2021', 'Admin WEBGIS', 'Admin WEBGIS');
INSERT INTO `petani` VALUES (21, 'Tahir', 'Tahir', 'H20', '', '', '', 0, 0, 0, 0, '', '', 0, 0, '', '', '', '', 25, 'Belum Di Post', '', 'Admin WEBGIS', '');

-- ----------------------------
-- Table structure for poktan
-- ----------------------------
DROP TABLE IF EXISTS `poktan`;
CREATE TABLE `poktan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_gapoktan` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_ketua` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pengukuhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kecamatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `desa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dusun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rw` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `luas_lahan` int NOT NULL,
  `komoditas_unggul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `geojson` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lng` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `warna` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_post` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `poktan_dibuat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `poktan_diubah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_gapoktan`(`id_gapoktan`) USING BTREE,
  CONSTRAINT `poktan_ibfk_1` FOREIGN KEY (`id_gapoktan`) REFERENCES `gapoktan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of poktan
-- ----------------------------
INSERT INTO `poktan` VALUES (12, 1, 'Bersatu Karya Tani 1', 'Arif', 'Terdaftar', 'Ada', 'Kubu', 'Pal IX', '', '', '', 0, 'Kopi', 'poktan_pal_9_barsatu_karyatani1.geojson', '-0.042398118132664', '109.240541483907734', '#c64e4e', 'Belum Di Post', 'Admin WEBGIS', 'Admin WEBGIS');
INSERT INTO `poktan` VALUES (13, 1, 'Baru Muncul', 'Alex', 'Terdaftar', 'Ada', 'Kotabaru', 'Pal IX', '', '', '', 0, 'Kopi', 'poktan_pal_9_barumuncul.geojson', '-0.041742046415129', '109.238372255676964', '#ed0707', 'Belum Di Post', 'Admin WEBGIS', 'Admin WEBGIS');
INSERT INTO `poktan` VALUES (14, 1, 'Tunas Baru 3', 'Mikael', 'Terdaftar', 'Ada', 'Kotabaru', 'Pal IX', '', '', '', 523, 'Kopi', 'poktan_pal_9_tunasbaru3.geojson', '-0.044507886246792', '109.244674119839175', '#e60fdf', 'Belum Di Post', 'Admin WEBGIS', 'Admin WEBGIS');
INSERT INTO `poktan` VALUES (15, 1, 'Tunas Baru 4', 'Arif', 'Terdaftar', 'Ada', 'Pontianak', 'Pal IX', '', '', '', 0, '', 'poktan_pal_9_tunasbaru4.geojson', '-0.053873808754345', '109.237929140735048', '#a309f6', 'Belum Di Post', 'Admin WEBGIS', '');
INSERT INTO `poktan` VALUES (16, 1, 'Tunas Mekar 2', 'Arif', 'Terdaftar', 'Ada', 'Kubu', 'Pal IX', '', '', '', 0, '', 'poktan_pal_9_tunasmekar2.geojson', '-0.048898840374912', '109.239713301212149', '#152bcb', 'Belum Di Post', 'Admin WEBGIS', 'Admin WEBGIS');
INSERT INTO `poktan` VALUES (18, 1, 'Tunas Muda 1', 'Alex', 'Belum Terdaftar', 'Tidak Ada', 'Pontianak', 'Pal IX', '', '', '', 0, '', 'poktan_pal_9_tunasmuda1.geojson', '-0.044546002998214', '109.242796869264325', '#0e94d8', 'Belum Di Post', 'Admin WEBGIS', 'Admin WEBGIS');
INSERT INTO `poktan` VALUES (19, 2, 'Karya Bersama', 'Arif', 'Terdaftar', 'Tidak Ada', 'Kotabaru', 'Parit Keladi', '', '', '', 0, '', 'poktan_parit_keladi_karyabersama.geojson', '-0.045296660929112', '109.2357151975839', '#10eb00', 'Belum Di Post', 'Admin WEBGIS', '');
INSERT INTO `poktan` VALUES (20, 2, 'Sidodadi', 'Alex', 'Terdaftar', 'Ada', 'Kubu', 'Parit Keladi', '', '', '', 0, '', 'poktan_parit_keladi_sidodadi.geojson', '-0.045789627127577', '109.230822588802369', '#befa19', 'Belum Di Post', 'Admin WEBGIS', '');
INSERT INTO `poktan` VALUES (21, 2, 'Sidoharjo', 'Arif', 'Terdaftar', 'Ada', 'Kotabaru', 'Parit Keladi', '', '', '', 0, '', 'poktan_parit_keladi_sidoharjo.geojson', '-0.042492045468218', '109.230100640668695', '#eecb1b', 'Belum Di Post', 'Admin WEBGIS', '');
INSERT INTO `poktan` VALUES (22, 2, 'Sinar Maju 1', 'Arif', 'Terdaftar', 'Ada', 'Kotabaru', 'Parit Keladi', '', '', '', 0, '', 'poktan_parit_keladi_sinarmaju1.geojson', '-0.046635254300193', '109.225193040410829', '#ef4f0b', 'Belum Di Post', 'Admin WEBGIS', 'Admin WEBGIS');
INSERT INTO `poktan` VALUES (23, 2, 'Sinar Maju 2', 'Alex', '', '', 'Pontianak', 'Parit Keladi', '', '', '', 0, '', 'poktan_parit_keladi_sinarmaju2.geojson', '-0.047794637766968', '109.220957591308562', '#d4de4f', 'Belum Di Post', 'Admin WEBGIS', '');
INSERT INTO `poktan` VALUES (24, 2, 'Usaha Bersama', 'Arif', '', '', 'Kubu', 'Parit Keladi', '', '', '', 0, '', 'poktan_parit_keladi_usahabersama.geojson', '-0.041428091959757', '109.235463847463265', '#b32929', 'Belum Di Post', 'Admin WEBGIS', '');
INSERT INTO `poktan` VALUES (25, 5, 'Usaha Tani 3', 'Cahaya', 'Terdaftar', 'Ada', 'Sungai Kakap', 'Sungai Itik', '', '', '', 0, '', 'poktan_sei_itik_usaha_tani3.geojson', '-0.039330677346296', '109.220500009772252', '#227262', 'Belum Di Post', 'Admin WEBGIS', 'Admin WEBGIS');
INSERT INTO `poktan` VALUES (26, 5, 'Usaha Tani 2', 'Herman', 'Terdaftar', 'Ada', 'Sungai Kakap', 'Sungai Itik', '', '', '', 0, '', 'poktan_sei_itik_usaha_tani2.geojson', '-0.040997346606836', '109.223358821536095', '#cce12d', 'Belum Di Post', 'Admin WEBGIS', 'Admin WEBGIS');
INSERT INTO `poktan` VALUES (27, 5, 'Usaha Tani 1', 'Rezeki', 'Terdaftar', 'Ada', 'Sungai Kakap', 'Sungai Itik', '', '', '', 0, '', 'poktan_sei_itik_usaha_tani1.geojson', '-0.040037427749984', '109.228855759437479', '#f27521', 'Belum Di Post', 'Admin WEBGIS', 'Admin WEBGIS');
INSERT INTO `poktan` VALUES (28, 5, 'Cempaka', '', '', '', '', 'Sungai Itik', '', '', '', 0, '', 'poktan_sei_itik_cempaka.geojson', '-0.037882703064278', '109.225083613803719', '#87b30f', 'Belum Di Post', 'Admin WEBGIS', '');
INSERT INTO `poktan` VALUES (29, 5, 'Sri Kencana', 'Sri', 'Terdaftar', 'Ada', 'Sungai Kakap', 'Sungai Itik', '', '', '', 0, '', 'poktan_sei_itik_srikencana.geojson', '-0.036164803868136', '109.230837889525773', '#8bea3e', 'Belum Di Post', 'Admin WEBGIS', 'Admin WEBGIS');
INSERT INTO `poktan` VALUES (30, 5, 'Maju Bersama', '', '', '', '', 'Sungai Itik', '', '', '', 0, '', 'poktan_sei_itik_majubersama.geojson', '-0.034746361235535', '109.227806928316099', '#8d3535', 'Belum Di Post', 'Admin WEBGIS', '');
INSERT INTO `poktan` VALUES (31, 5, 'Abdi Tani', '', '', '', '', 'Sungai Itik', '', '', '', 0, '', 'poktan_sei_itik_abditani.geojson', '-0.033450987142567', '109.225064866815146', '#d638ac', 'Sudah Di Post', 'Admin WEBGIS', '');
INSERT INTO `poktan` VALUES (32, 5, 'Bina Tani', '', '', '', '', 'Sungai Itik', '', '', '', 0, '', 'poktan_sei_itik_binatani.geojson', '-0.03024536153919', '109.229786800447158', '#5723a4', 'Belum Di Post', 'Admin WEBGIS', '');

-- ----------------------------
-- Table structure for prasarana_petani
-- ----------------------------
DROP TABLE IF EXISTS `prasarana_petani`;
CREATE TABLE `prasarana_petani`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_petani` int NOT NULL,
  `status_pemilik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_petani`(`id_petani`) USING BTREE,
  CONSTRAINT `prasarana_petani_ibfk_1` FOREIGN KEY (`id_petani`) REFERENCES `petani` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of prasarana_petani
-- ----------------------------
INSERT INTO `prasarana_petani` VALUES (7, 19, 'Penggarap');

-- ----------------------------
-- Table structure for produksi_pertanian
-- ----------------------------
DROP TABLE IF EXISTS `produksi_pertanian`;
CREATE TABLE `produksi_pertanian`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_petani` int NOT NULL,
  `jenis_usaha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_lahan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sistem_pertanian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_komoditas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jadwal_tanam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jadwal_panen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sistem_pengairan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_petani`(`id_petani`) USING BTREE,
  CONSTRAINT `produksi_pertanian_ibfk_1` FOREIGN KEY (`id_petani`) REFERENCES `petani` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of produksi_pertanian
-- ----------------------------
INSERT INTO `produksi_pertanian` VALUES (6, 19, 'Tanaman Pangan', 'Sawah', 'Monokultur', 'Padi tadah hujan', '2 Kali (IP 200%)', '2', '2', 'Tadah Hujan');

-- ----------------------------
-- Table structure for sarana_pertanian
-- ----------------------------
DROP TABLE IF EXISTS `sarana_pertanian`;
CREATE TABLE `sarana_pertanian`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_petani` int NOT NULL,
  `sarana` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sarana_pertanian_ibfk_1`(`id_petani`) USING BTREE,
  CONSTRAINT `sarana_pertanian_ibfk_1` FOREIGN KEY (`id_petani`) REFERENCES `petani` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sarana_pertanian
-- ----------------------------
INSERT INTO `sarana_pertanian` VALUES (14, 19, 'Cangkul', 1, 'Unit');
INSERT INTO `sarana_pertanian` VALUES (15, 19, 'Handspayer', 1, 'Unit');
INSERT INTO `sarana_pertanian` VALUES (16, 19, 'Kendaraan Roda Dua/Empat', 0, 'Unit');
INSERT INTO `sarana_pertanian` VALUES (17, 19, 'Pengunaan Pupuk (dalam 1 Musim Tanam)', 4, 'Unit');

-- ----------------------------
-- Table structure for susun_kelompok
-- ----------------------------
DROP TABLE IF EXISTS `susun_kelompok`;
CREATE TABLE `susun_kelompok`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_poktan` int NOT NULL,
  `id_petani` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_petani`(`id_petani`) USING BTREE,
  INDEX `id_poktan`(`id_poktan`) USING BTREE,
  CONSTRAINT `susun_kelompok_ibfk_1` FOREIGN KEY (`id_petani`) REFERENCES `petani` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `susun_kelompok_ibfk_2` FOREIGN KEY (`id_poktan`) REFERENCES `poktan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of susun_kelompok
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_dibuat` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', '$2y$10$5K7CjCPX12R3vcX2q/LO5OYySO3W4ZUHlusTkM8DzTMnwsV75XhIW', 'Admin WEBGIS', 'Admin', 'Aktif', '100_1.jpg', 1633927543);
INSERT INTO `user` VALUES (2, 'superadmin', '$2y$10$5K7CjCPX12R3vcX2q/LO5OYySO3W4ZUHlusTkM8DzTMnwsV75XhIW', 'Fernanda', 'Super Admin', 'Aktif', '3171051495.jpg', 1633927543);
INSERT INTO `user` VALUES (4, 'iqbal', '$2y$10$odrd6fSQ4V2k1udruKdY9uGnyCH567UgWAilDxgNCN8zEac0.8ugm', 'Iqbal Fernanda', 'Admin', 'Aktif', 'unnamed.jpg', 1633927543);

SET FOREIGN_KEY_CHECKS = 1;
