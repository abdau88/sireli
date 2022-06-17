/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 100139
 Source Host           : localhost:3306
 Source Schema         : sireli

 Target Server Type    : MySQL
 Target Server Version : 100139
 File Encoding         : 65001

 Date: 16/03/2020 15:43:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_dosen
-- ----------------------------
DROP TABLE IF EXISTS `tb_dosen`;
CREATE TABLE `tb_dosen`  (
  `NIDN` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `NPAK_NIP` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Nama_Dosen` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_jurusan` int(2) NULL DEFAULT NULL,
  PRIMARY KEY (`NIDN`, `NPAK_NIP`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_dosen
-- ----------------------------
INSERT INTO `tb_dosen` VALUES ('', '04.17.8028', 'Taufan Ratri Harjanto, S.T., M.Eng.', 4);
INSERT INTO `tb_dosen` VALUES ('', '04.17.8031', 'Saipul Bahri, S.T., M.Eng.', 4);
INSERT INTO `tb_dosen` VALUES ('', '04.17.8032', 'Nurlinda Ayu Triwuri, S.T., M.Eng.', 4);
INSERT INTO `tb_dosen` VALUES ('', '04.17.8037', 'Devi Taufiq Nurrohman, S.Si., M.Sc.', 3);
INSERT INTO `tb_dosen` VALUES ('', '05.12.3012', 'Eka Dyah Puspitasari, S.Pd., M.Hum.', 1);
INSERT INTO `tb_dosen` VALUES ('', '05.16.8018', 'Lutfi Syafirullah, S.T. M.Kom.', 1);
INSERT INTO `tb_dosen` VALUES ('', '05.16.8019', 'Betti Widianingsih, S.S., M.Hum.', 3);
INSERT INTO `tb_dosen` VALUES ('', '08.001', 'Dr.Eng. Agus Santoso', 2);
INSERT INTO `tb_dosen` VALUES ('', '08.002', 'Pujono, S.T., M.Eng.', 2);
INSERT INTO `tb_dosen` VALUES ('', '08.003', 'Bayu Aji Girawan, S.T., M.T.', 2);
INSERT INTO `tb_dosen` VALUES ('', '08.004', 'Mohammad Nurhilal, S.T., M.Pd., M.T.', 2);
INSERT INTO `tb_dosen` VALUES ('', '08.005', 'Dian Prabowo, S.T., M.T.', 2);
INSERT INTO `tb_dosen` VALUES ('', '08.006', 'Ipung Kurniawan, S.T., M.T.', 2);
INSERT INTO `tb_dosen` VALUES ('', '08.008', 'Arif Ainur Rafiq, ST.,M.T., M.Sc.', 3);
INSERT INTO `tb_dosen` VALUES ('', '08.010', 'Sugeng Dwi Riyanto, S.T., M.T.', 3);
INSERT INTO `tb_dosen` VALUES ('', '08.011', 'Purwiyanto, S.T., M.Eng.', 3);
INSERT INTO `tb_dosen` VALUES ('', '08.013', 'Nur wahyu Rahadi, S.Kom., M.Eng.', 1);
INSERT INTO `tb_dosen` VALUES ('', '08.014', 'Antonius Agung Hartono, S.T., M.Eng.', 1);
INSERT INTO `tb_dosen` VALUES ('', '08.018', 'Isa Bahroni, S.Kom, M.Eng', 1);
INSERT INTO `tb_dosen` VALUES ('', '08.16.8020', 'Oto Prasadi, S.Pi., M.Si', 2);
INSERT INTO `tb_dosen` VALUES ('', '08.16.8021', 'Khoeruddin Wittriansyah, S.Kel., M.Si', 2);
INSERT INTO `tb_dosen` VALUES ('', '08.17.8040', 'Ayu Pramita, S.T., M.M., M.Eng.', 4);
INSERT INTO `tb_dosen` VALUES ('', '09.08.1004', 'Fadillah, M.P.', 2);
INSERT INTO `tb_dosen` VALUES ('', '09.08.1011', 'Ganjar Ndaru Ikhtiagung, S.E., M.M. ', 2);
INSERT INTO `tb_dosen` VALUES ('', '09.08.3001', 'Joko Setia Pribadi, S.T., M.Eng.', 2);
INSERT INTO `tb_dosen` VALUES ('', '09.08.3002', 'Dwi Novia Prasetyanti, S.Kom.M.Cs.', 1);
INSERT INTO `tb_dosen` VALUES ('', '09.10.3008', 'Abdul Rohman Supriyono, S.T., M.Kom.', 1);
INSERT INTO `tb_dosen` VALUES ('', '09.10.3011', 'Rostika Listyaningrum, S.Si., M.Si.', 1);
INSERT INTO `tb_dosen` VALUES ('', '10.10.1029', 'Andriansyah Zakaria, M.Kom.', 1);
INSERT INTO `tb_dosen` VALUES ('', '198403102019032010', 'Rosita Dwityaningsih, S.Si., M.Eng.', 4);
INSERT INTO `tb_dosen` VALUES ('', '198403242019031005', 'Jenal Sodikin, S.T., M.T.', 2);
INSERT INTO `tb_dosen` VALUES ('', '198405072019031011', 'Andesita Prihantara, S.T., M.Eng.', 1);
INSERT INTO `tb_dosen` VALUES ('', '198408302019031003', 'Supriyono, S.T., M.T.', 3);
INSERT INTO `tb_dosen` VALUES ('', '198410252019032010', 'Theresia Evila Purwanti Sri Rahayu, S.T., M.Eng.', 4);
INSERT INTO `tb_dosen` VALUES ('', '198412012018032001', 'Cahya Vikasari, S.T., M.Eng', 1);
INSERT INTO `tb_dosen` VALUES ('', '198503182019031013', 'Riyadi Purwanto, S.T., M.Eng.', 1);
INSERT INTO `tb_dosen` VALUES ('', '198506242019032013', 'Ardhita Fajar Pratiwi, S.T., M.Eng.', 3);
INSERT INTO `tb_dosen` VALUES ('', '198506272019031006', 'Oman Somantri, S.Kom., M.Kom.', 1);
INSERT INTO `tb_dosen` VALUES ('', '198509172019031005', 'Galih Mustiko Aji, S.T., M.T.', 3);
INSERT INTO `tb_dosen` VALUES ('', '198509172019032015', 'Ratih Hafsarah Maharrani, S.Kom., M.Kom.', 1);
INSERT INTO `tb_dosen` VALUES ('', '198601112019032008', 'Ari Kristiningsih, S.Kel., M.Si.', 2);
INSERT INTO `tb_dosen` VALUES ('', '198603212019031007', 'Zaenurrohman, S.T., M.T.', 3);
INSERT INTO `tb_dosen` VALUES ('', '198604092019032011', 'Hera Susanti, S.T., M.Eng.', 3);
INSERT INTO `tb_dosen` VALUES ('', '198604282019031005', 'Muhamad Yusuf, S.ST., M.T.', 3);
INSERT INTO `tb_dosen` VALUES ('', '198605142019032008', 'Annisa Romadloni, S.Hum., M.A.', 1);
INSERT INTO `tb_dosen` VALUES ('', '198612272019032010', 'Ulikaryani, S.Si., M.Eng.', 2);
INSERT INTO `tb_dosen` VALUES ('', '198711052019032014', 'Murni Handayani, S.P., M.Sc.', 2);
INSERT INTO `tb_dosen` VALUES ('', '198711172018031001', 'Annas Setiawan Prabowo, S.Kom., M.Eng.', 1);
INSERT INTO `tb_dosen` VALUES ('', '198803312019032017', 'Hety Dwi hastuti, S.E., M.Si.', 2);
INSERT INTO `tb_dosen` VALUES ('', '198805072019031009', 'Dodi Satriawan, S.T., M.Eng.', 4);
INSERT INTO `tb_dosen` VALUES ('', '198809132019032012', 'Laura Sari, S.Si., M.Sc.', 1);
INSERT INTO `tb_dosen` VALUES ('', '198810102019032020', 'Linda Perdana Wanti, S.Kom., M.Kom.', 1);
INSERT INTO `tb_dosen` VALUES ('', '198811152019031008', 'Nur Wachid Adi Prasetya, S.Kom., M.Kom.', 1);
INSERT INTO `tb_dosen` VALUES ('', '198906272019032020', 'Mardiyana, S.Pi., M.Si.', 2);
INSERT INTO `tb_dosen` VALUES ('', '198909272019032013', 'Sari Widya Utami, S.P., M.Sc.', 2);
INSERT INTO `tb_dosen` VALUES ('', '198910282019031019', 'Roy Aries Permana Tarigan, S.T., M.T.', 2);
INSERT INTO `tb_dosen` VALUES ('', '198912122019031014', 'Arif Sumardiono, S.Pd., M.T.', 3);
INSERT INTO `tb_dosen` VALUES ('', '199005012019031013', 'Unggul Satria Jati, S.T., M.T.', 2);
INSERT INTO `tb_dosen` VALUES ('', '199007292019032026', 'Fadhillah Hazrina, S.T., M.Eng.', 3);
INSERT INTO `tb_dosen` VALUES ('', '199008082019031017', 'Prih Diantono Abda\'u, S.Kom., M.Kom.', 1);
INSERT INTO `tb_dosen` VALUES ('', '199008292019032013', 'Erna Alimudin, S.T., M.Eng.', 3);
INSERT INTO `tb_dosen` VALUES ('', '199012122019031016', 'Afrizal Abdi Musyafiq, S.Si., M.Eng.', 3);
INSERT INTO `tb_dosen` VALUES ('', '199103052019031017', 'Nur Akhlis Sarihidaya Laksana, S.Pd., M.T.', 2);
INSERT INTO `tb_dosen` VALUES ('', '199106022019031015', 'Radhi Ariawan, S.T., M.Eng.', 2);
INSERT INTO `tb_dosen` VALUES ('', '199109162019031013', 'Agus Susanto, S.Kom., M.Kom.', 1);
INSERT INTO `tb_dosen` VALUES ('', '199201032019032022', 'Ilma Fadlilah, S.Si., M.Eng.', 4);
INSERT INTO `tb_dosen` VALUES ('', '199206302019031011', 'Vicky Prasetia, S.ST., M.Eng.', 3);
INSERT INTO `tb_dosen` VALUES ('', '199207062019031014', 'Saepul Rahmat, S.Pd., M.T.', 3);
INSERT INTO `tb_dosen` VALUES ('', '199211052019032021', 'Novita Asma Ilahi, S.Pd., M.Si.', 3);
INSERT INTO `tb_dosen` VALUES ('', '199211132019031009', 'Hendi Purnata, S.Pd., M.T.', 3);
INSERT INTO `tb_dosen` VALUES ('', '199303242019031011', 'Muhammad Nur Faiz, S.Kom., M.Kom.', 1);
INSERT INTO `tb_dosen` VALUES ('', '199307142019032026', 'Santi Purwaningrum, S.Kom., M.Kom.', 1);
INSERT INTO `tb_dosen` VALUES ('', '199505082019032022', 'Riyani Prima Dewi, S.T., M.T.', 3);

SET FOREIGN_KEY_CHECKS = 1;
