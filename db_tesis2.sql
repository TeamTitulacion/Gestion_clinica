/*
 Navicat Premium Data Transfer

 Source Server         : xampp
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : db_tesis2

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 12/05/2022 19:34:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_antecedente_familiar
-- ----------------------------
DROP TABLE IF EXISTS `tbl_antecedente_familiar`;
CREATE TABLE `tbl_antecedente_familiar`  (
  `id_antecedente_fami` int(3) NOT NULL AUTO_INCREMENT,
  `anf_ementales` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `anf_acongenitas` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `anf_diabetes` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `anf_cancer` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `anf_tuberculosis` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `anf_hemo_cuagu` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `anf_policitemia` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `anf_leucemia` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `anf_ecardio` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `anf_alcohol` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `anf_ets` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `anf_consan` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_paciente` int(3) NOT NULL,
  PRIMARY KEY (`id_antecedente_fami`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_antecedente_familiar
-- ----------------------------
INSERT INTO `tbl_antecedente_familiar` VALUES (1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3);

-- ----------------------------
-- Table structure for tbl_antecedente_paciente
-- ----------------------------
DROP TABLE IF EXISTS `tbl_antecedente_paciente`;
CREATE TABLE `tbl_antecedente_paciente`  (
  `id_antecedente_paciente` int(3) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(3) NOT NULL,
  `id_antecedente` int(3) NOT NULL,
  `atp_observacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_antecedente_paciente`) USING BTREE,
  INDEX `fk_paciente_antecedentepac`(`id_paciente`) USING BTREE,
  INDEX `fk_antecente_antecedentepac`(`id_antecedente`) USING BTREE,
  CONSTRAINT `fk_antecente_antecedentepac` FOREIGN KEY (`id_antecedente`) REFERENCES `tbl_antecente_medico` (`id_atencedentes`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_paciente_antecedentepac` FOREIGN KEY (`id_paciente`) REFERENCES `tbl_paciente` (`id_paciente`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_antecedentesp
-- ----------------------------
DROP TABLE IF EXISTS `tbl_antecedentesp`;
CREATE TABLE `tbl_antecedentesp`  (
  `id_antecedentes` int(3) NOT NULL AUTO_INCREMENT,
  `ant_detalle` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ant_observaciones` varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ant_tipo` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_paciente` int(3) NOT NULL,
  PRIMARY KEY (`id_antecedentes`) USING BTREE,
  INDEX `FK_pac_ant`(`id_paciente`) USING BTREE,
  CONSTRAINT `FK_pac_ant` FOREIGN KEY (`id_paciente`) REFERENCES `tbl_pacientep` (`id_paciente`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_antecedentesp
-- ----------------------------
INSERT INTO `tbl_antecedentesp` VALUES (1, 'atm', 'oclusion', '1', 1);
INSERT INTO `tbl_antecedentesp` VALUES (2, NULL, NULL, NULL, 3);

-- ----------------------------
-- Table structure for tbl_antecente_medico
-- ----------------------------
DROP TABLE IF EXISTS `tbl_antecente_medico`;
CREATE TABLE `tbl_antecente_medico`  (
  `id_atencedentes` int(3) NOT NULL AUTO_INCREMENT,
  `ant_tmactual` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_tmedicamentos` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_alergias` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_cardiopatia` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_aparterial` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_embarazo` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_diabetes` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_hepatitis` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_irradiaciones` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_dsanguineas` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_freumatica` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_erenales` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_inmunosupresion` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_tranemocional` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_tgastricos` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_epilepsia` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_trespiratorio` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_cirugia` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_eoral` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_otras` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_vicios` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ant_observaciones` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  PRIMARY KEY (`id_atencedentes`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_antecente_medico
-- ----------------------------
INSERT INTO `tbl_antecente_medico` VALUES (1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3);

-- ----------------------------
-- Table structure for tbl_atencion
-- ----------------------------
DROP TABLE IF EXISTS `tbl_atencion`;
CREATE TABLE `tbl_atencion`  (
  `id_atencion` int(3) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(3) NOT NULL,
  `id_medico` int(3) NOT NULL,
  `ate_estatura` float(3, 0) NULL DEFAULT NULL,
  `ate_peso` float(3, 0) NULL DEFAULT NULL,
  `ate_presion_arterial` float(3, 0) NULL DEFAULT NULL,
  `ate_pulso` float(3, 0) NULL DEFAULT NULL,
  `ate_frecuencia_respiratoria` float(3, 0) NULL DEFAULT NULL,
  `ate_motivo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ate_antecedentes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ate_tratamiento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ate_plan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ate_cita` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_atencion`) USING BTREE,
  INDEX `fk_paciente_atencion`(`id_paciente`) USING BTREE,
  INDEX `fk_medico_atencion`(`id_medico`) USING BTREE,
  CONSTRAINT `fk_medico_atencion` FOREIGN KEY (`id_medico`) REFERENCES `tbl_medico` (`id_medico`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_paciente_atencion` FOREIGN KEY (`id_paciente`) REFERENCES `tbl_paciente` (`id_paciente`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_categoria
-- ----------------------------
DROP TABLE IF EXISTS `tbl_categoria`;
CREATE TABLE `tbl_categoria`  (
  `id_categoria` int(3) NOT NULL AUTO_INCREMENT,
  `cat_detalle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_categoria`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_categoria
-- ----------------------------
INSERT INTO `tbl_categoria` VALUES (1, 'odontologo General');
INSERT INTO `tbl_categoria` VALUES (2, 'cirujano');
INSERT INTO `tbl_categoria` VALUES (3, 'Cirugía oral');
INSERT INTO `tbl_categoria` VALUES (4, 'Implantologia oral');
INSERT INTO `tbl_categoria` VALUES (5, 'Periodoncia');
INSERT INTO `tbl_categoria` VALUES (6, 'Odontopediatria');

-- ----------------------------
-- Table structure for tbl_citas
-- ----------------------------
DROP TABLE IF EXISTS `tbl_citas`;
CREATE TABLE `tbl_citas`  (
  `id_cita` int(11) NOT NULL AUTO_INCREMENT,
  `cit_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cit_start` datetime(0) NULL DEFAULT NULL,
  `id_medico` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  PRIMARY KEY (`id_cita`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 95 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_citas
-- ----------------------------
INSERT INTO `tbl_citas` VALUES (89, 'Radiografia dentala', '2022-02-28 01:50:00', 2, 3);
INSERT INTO `tbl_citas` VALUES (92, 'Radiografia dentala', '2022-03-01 09:00:00', 2, 1);
INSERT INTO `tbl_citas` VALUES (93, 'Radiografia dentala', '2022-03-01 11:00:00', 2, 3);
INSERT INTO `tbl_citas` VALUES (94, 'cita del Sr,pineida', '2022-03-10 10:00:00', 3, 1);

-- ----------------------------
-- Table structure for tbl_cuerpop
-- ----------------------------
DROP TABLE IF EXISTS `tbl_cuerpop`;
CREATE TABLE `tbl_cuerpop`  (
  `id_cuerpo` int(3) NOT NULL AUTO_INCREMENT,
  `cue_fecha` date NULL DEFAULT NULL,
  `cue_motivo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cue_nacompanante` varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cue_telefonoacomp` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cue_vih` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cue_vihdiagnostico` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cue_vihfecha` date NULL DEFAULT NULL,
  `cue_motivo_act` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cue_enfermedad` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_encabezado` int(3) NOT NULL,
  PRIMARY KEY (`id_cuerpo`) USING BTREE,
  INDEX `FK_enc_cue`(`id_encabezado`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_cuerpop
-- ----------------------------
INSERT INTO `tbl_cuerpop` VALUES (14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33);
INSERT INTO `tbl_cuerpop` VALUES (15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 34);
INSERT INTO `tbl_cuerpop` VALUES (16, '2022-01-12', 'Chequeo', '', '', '2', '', '0000-00-00', NULL, NULL, 35);

-- ----------------------------
-- Table structure for tbl_diagnosticop
-- ----------------------------
DROP TABLE IF EXISTS `tbl_diagnosticop`;
CREATE TABLE `tbl_diagnosticop`  (
  `id_diagnostico` int(3) NOT NULL AUTO_INCREMENT,
  `dia_detalle` varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `dia_pronostico` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `dia_tipo` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_cuerpo` int(3) NOT NULL,
  PRIMARY KEY (`id_diagnostico`) USING BTREE,
  INDEX `FK_cue_dia`(`id_cuerpo`) USING BTREE,
  CONSTRAINT `FK_cue_dia` FOREIGN KEY (`id_cuerpo`) REFERENCES `tbl_cuerpop` (`id_cuerpo`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_diagnosticop
-- ----------------------------
INSERT INTO `tbl_diagnosticop` VALUES (1, NULL, NULL, NULL, 16);

-- ----------------------------
-- Table structure for tbl_dientesp
-- ----------------------------
DROP TABLE IF EXISTS `tbl_dientesp`;
CREATE TABLE `tbl_dientesp`  (
  `id_dientes` int(3) NOT NULL AUTO_INCREMENT,
  `die_numero` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `die_tratamiento` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `die_filtro` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_cuerpo` int(3) NOT NULL,
  PRIMARY KEY (`id_dientes`) USING BTREE,
  INDEX `FK_cue_die`(`id_cuerpo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_dientesp
-- ----------------------------
INSERT INTO `tbl_dientesp` VALUES (3, NULL, NULL, NULL, 14);
INSERT INTO `tbl_dientesp` VALUES (4, NULL, NULL, NULL, 15);
INSERT INTO `tbl_dientesp` VALUES (5, NULL, NULL, NULL, 16);

-- ----------------------------
-- Table structure for tbl_documento
-- ----------------------------
DROP TABLE IF EXISTS `tbl_documento`;
CREATE TABLE `tbl_documento`  (
  `id_documento` int(1) NOT NULL AUTO_INCREMENT,
  `doc_detalle` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_documento`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_documento
-- ----------------------------
INSERT INTO `tbl_documento` VALUES (1, 'DNI');
INSERT INTO `tbl_documento` VALUES (2, 'Pasaporte');

-- ----------------------------
-- Table structure for tbl_encabezadop
-- ----------------------------
DROP TABLE IF EXISTS `tbl_encabezadop`;
CREATE TABLE `tbl_encabezadop`  (
  ` id_encabezado` int(3) NOT NULL AUTO_INCREMENT,
  `enc_nhistoria` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_medico` int(3) NOT NULL,
  `enc_fechaelab` date NOT NULL,
  `id_paciente` int(3) NOT NULL,
  PRIMARY KEY (` id_encabezado`) USING BTREE,
  INDEX `FK_pac_enc`(`id_paciente`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_encabezadop
-- ----------------------------
INSERT INTO `tbl_encabezadop` VALUES (33, 'CMD1727185298-1', 2, '2022-04-03', 1);
INSERT INTO `tbl_encabezadop` VALUES (34, 'CMD1727185298-2', 2, '2022-04-03', 1);
INSERT INTO `tbl_encabezadop` VALUES (35, 'CMD1727185297-1', 4, '2022-05-12', 3);

-- ----------------------------
-- Table structure for tbl_examen_estomatologico
-- ----------------------------
DROP TABLE IF EXISTS `tbl_examen_estomatologico`;
CREATE TABLE `tbl_examen_estomatologico`  (
  `id_examen` int(3) NOT NULL AUTO_INCREMENT,
  `exa_detalle` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_examen`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_examenesp
-- ----------------------------
DROP TABLE IF EXISTS `tbl_examenesp`;
CREATE TABLE `tbl_examenesp`  (
  `id_examenes` int(3) NOT NULL AUTO_INCREMENT,
  `exa_detalle` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `exa_radiografia` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `exa_categoria` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_cuerpo` int(3) NOT NULL,
  PRIMARY KEY (`id_examenes`) USING BTREE,
  INDEX `FK_cue_exa`(`id_cuerpo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_examenesp
-- ----------------------------
INSERT INTO `tbl_examenesp` VALUES (3, NULL, NULL, NULL, 14);
INSERT INTO `tbl_examenesp` VALUES (4, NULL, NULL, NULL, 15);
INSERT INTO `tbl_examenesp` VALUES (5, NULL, NULL, NULL, 16);

-- ----------------------------
-- Table structure for tbl_haccionprevp
-- ----------------------------
DROP TABLE IF EXISTS `tbl_haccionprevp`;
CREATE TABLE `tbl_haccionprevp`  (
  `id_haccionprev` int(3) NOT NULL AUTO_INCREMENT,
  `hac_estado` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hac_detalle` varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hac_frecuencia` varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_cuerpo` int(3) NOT NULL,
  PRIMARY KEY (`id_haccionprev`) USING BTREE,
  INDEX `FK_cue_hac`(`id_cuerpo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_haccionprevp
-- ----------------------------
INSERT INTO `tbl_haccionprevp` VALUES (3, NULL, NULL, NULL, 14);
INSERT INTO `tbl_haccionprevp` VALUES (4, NULL, NULL, NULL, 15);
INSERT INTO `tbl_haccionprevp` VALUES (5, NULL, NULL, NULL, 16);

-- ----------------------------
-- Table structure for tbl_medico
-- ----------------------------
DROP TABLE IF EXISTS `tbl_medico`;
CREATE TABLE `tbl_medico`  (
  `id_medico` int(3) NOT NULL AUTO_INCREMENT,
  `med_nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `med_apellido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `med_sexo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `med_cumpleanos` date NULL DEFAULT NULL,
  `med_direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `med_telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `med_estado` int(1) NULL DEFAULT NULL,
  `med_imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_categoria` int(1) NOT NULL,
  `id_perfil` int(3) NOT NULL,
  `med_usuario` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `med_password` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_medico`) USING BTREE,
  INDEX `fk_categoria_medico`(`id_categoria`) USING BTREE,
  INDEX `fk_sexo_medico`(`med_sexo`) USING BTREE,
  INDEX `fk_perfil_medico`(`id_perfil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_medico
-- ----------------------------
INSERT INTO `tbl_medico` VALUES (1, 'Jhony', 'Sanchez', '1', '1998-12-31', 's50', '0983128485', 0, 'descarga.png', 1, 1, 'gabo2108', '2108');
INSERT INTO `tbl_medico` VALUES (2, 'Ismael', 'Pineida', '1', '2000-06-02', 'ITSS', '0987654321', 0, 'calabera con patineta.png', 1, 1, 'dragomir', 'I$mael2000');
INSERT INTO `tbl_medico` VALUES (3, 'Andrez', 'Verdesoto', '1', '2022-03-09', 'prueba', '0987654321', 1, '1042104.jpg', 3, 3, 'root', 'usbw');
INSERT INTO `tbl_medico` VALUES (4, 'actualizado', 'prueba', '1', '2022-03-09', 'prueba', '0987654321', 0, 'C:fakepathdesencanto-wallpaper.jpg', 2, 2, 'root', 'usbw');
INSERT INTO `tbl_medico` VALUES (5, 'actualizado', 'prueba', '1', '2022-03-09', 'prueba', '0987654321', 1, 'desencanto-wallpaper.jpg', 2, 2, 'root', 'usbw');
INSERT INTO `tbl_medico` VALUES (6, 'actualizado', 'prueba', '1', '2022-03-09', 'prueba', '0987654321', 1, '1043004.png', 2, 2, 'root', 'usbw');
INSERT INTO `tbl_medico` VALUES (7, 'actualizado', 'prueba', '1', '2022-03-09', 'prueba', '0987654321', 1, '1042104.jpg', 2, 2, 'root', 'usbw');

-- ----------------------------
-- Table structure for tbl_observacionesp
-- ----------------------------
DROP TABLE IF EXISTS `tbl_observacionesp`;
CREATE TABLE `tbl_observacionesp`  (
  `id_observaciones` int(3) NOT NULL AUTO_INCREMENT,
  `obs_detalle` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_antecedentes` int(3) NULL DEFAULT NULL,
  `id_placa` int(3) NULL DEFAULT NULL,
  PRIMARY KEY (`id_observaciones`) USING BTREE,
  INDEX `FK_ant_obs`(`id_antecedentes`) USING BTREE,
  INDEX `FK_plac_obs`(`id_placa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_paciente
-- ----------------------------
DROP TABLE IF EXISTS `tbl_paciente`;
CREATE TABLE `tbl_paciente`  (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `pac_apellido` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pac_nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pac_fecha_nacimiento` date NOT NULL,
  `pac_sexo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pac_estado_civil` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_documento` int(1) NOT NULL,
  `pac_num_documento` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pac_direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pac_telefono` int(10) NULL DEFAULT NULL,
  `pac_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pac_ocupacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pac_responsable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pac_alergias` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pac_intervenciones` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pac_sangre` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pac_nhistoria` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_paciente`) USING BTREE,
  INDEX `fk_sexo_paciente`(`pac_sexo`) USING BTREE,
  INDEX `fk_documento_paciente`(`id_documento`) USING BTREE,
  INDEX `fk_estcivil_paciente`(`pac_estado_civil`) USING BTREE,
  INDEX `fk_sangre_paciente`(`pac_sangre`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_paciente
-- ----------------------------
INSERT INTO `tbl_paciente` VALUES (1, 'Pineida', 'Jorge', '1967-12-06', '1', 'casado', 1, '1723549828', 'Av.calle', 987654321, 'correo@dominio.com', 'Docente', 'Susana flores', 'niguna', 'ninguna', 'O+', 'CMD1723549828-1');
INSERT INTO `tbl_paciente` VALUES (2, 'Velarde', 'Cristina', '1999-06-17', '2', 'Soltero', 1, '1786572390', 'Moran Valverde', NULL, 'cristina.v@gmail.com', 'Policia', NULL, NULL, NULL, 'A+', 'CMD1712961588-1');

-- ----------------------------
-- Table structure for tbl_pacientep
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pacientep`;
CREATE TABLE `tbl_pacientep`  (
  `id_paciente` int(3) NOT NULL AUTO_INCREMENT,
  `pac_nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pac_apellido` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pac_sexo` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pac_dni` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pac_nacimiento` date NULL DEFAULT NULL,
  `pac_sangre` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pac_estado_civil` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pac_direccion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pac_correo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pac_telefono` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_paciente`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_pacientep
-- ----------------------------
INSERT INTO `tbl_pacientep` VALUES (1, 'Jose', 'Soto', '1', '1727185298', '1998-04-01', 'O Negativo', 'Soltero', 'Av. malglar alto', 'test@mail.com', '0983128485');
INSERT INTO `tbl_pacientep` VALUES (3, 'Elizabeth', 'Andrade', '2', '1727185297', '2004-05-12', 'AB Negativ', 'Soltero', 'd', 'test@mail.com', '0983128485');

-- ----------------------------
-- Table structure for tbl_perfil
-- ----------------------------
DROP TABLE IF EXISTS `tbl_perfil`;
CREATE TABLE `tbl_perfil`  (
  `id_perfil` int(3) NOT NULL AUTO_INCREMENT,
  `per_detalle` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_perfil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_perfil
-- ----------------------------
INSERT INTO `tbl_perfil` VALUES (1, 'Admin');
INSERT INTO `tbl_perfil` VALUES (2, 'Medico');
INSERT INTO `tbl_perfil` VALUES (3, 'Secretaria');
INSERT INTO `tbl_perfil` VALUES (4, 'Especialista');

-- ----------------------------
-- Table structure for tbl_placabacp
-- ----------------------------
DROP TABLE IF EXISTS `tbl_placabacp`;
CREATE TABLE `tbl_placabacp`  (
  `id_placa` int(3) NOT NULL AUTO_INCREMENT,
  `pla_fecha` date NULL DEFAULT NULL,
  `pla_numero` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pla_porcentaje` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pla_tipo` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_cuerpo` int(3) NOT NULL,
  PRIMARY KEY (`id_placa`) USING BTREE,
  INDEX `FK_cue_plac`(`id_cuerpo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_placabacp
-- ----------------------------
INSERT INTO `tbl_placabacp` VALUES (3, NULL, NULL, NULL, NULL, 14);
INSERT INTO `tbl_placabacp` VALUES (4, NULL, NULL, NULL, NULL, 15);
INSERT INTO `tbl_placabacp` VALUES (5, NULL, NULL, NULL, NULL, 16);

-- ----------------------------
-- Table structure for tbl_ptratamientop
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ptratamientop`;
CREATE TABLE `tbl_ptratamientop`  (
  `id_ptratamiento` int(3) NOT NULL AUTO_INCREMENT,
  `ptr_observaciones` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ptr_detalle` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_cuerpo` int(3) NOT NULL,
  PRIMARY KEY (`id_ptratamiento`) USING BTREE,
  INDEX `FK_cue_ptr`(`id_cuerpo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_ptratamientop
-- ----------------------------
INSERT INTO `tbl_ptratamientop` VALUES (3, NULL, NULL, 14);
INSERT INTO `tbl_ptratamientop` VALUES (4, NULL, NULL, 15);
INSERT INTO `tbl_ptratamientop` VALUES (5, NULL, NULL, 16);

-- ----------------------------
-- Table structure for tbl_signosvitalesp
-- ----------------------------
DROP TABLE IF EXISTS `tbl_signosvitalesp`;
CREATE TABLE `tbl_signosvitalesp`  (
  `id_signosvitales` int(3) NOT NULL AUTO_INCREMENT,
  `sig_estatura` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sig_temperatura` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sig_peso` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sig_pulso` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sig_tensionarterial` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sig_frecuenciarespiratoria` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_cuerpo` int(3) NOT NULL,
  PRIMARY KEY (`id_signosvitales`) USING BTREE,
  INDEX `FK_cue_sig`(`id_cuerpo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_signosvitalesp
-- ----------------------------
INSERT INTO `tbl_signosvitalesp` VALUES (3, NULL, NULL, NULL, NULL, NULL, NULL, 14);
INSERT INTO `tbl_signosvitalesp` VALUES (4, NULL, NULL, NULL, NULL, NULL, NULL, 15);
INSERT INTO `tbl_signosvitalesp` VALUES (5, '160', '', '', '', '', '', 16);

-- ----------------------------
-- Table structure for tbl_visitas
-- ----------------------------
DROP TABLE IF EXISTS `tbl_visitas`;
CREATE TABLE `tbl_visitas`  (
  `id_Visitas` int(11) NOT NULL AUTO_INCREMENT,
  `vis_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `vis_fecha` datetime(0) NOT NULL,
  PRIMARY KEY (`id_Visitas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 83 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_visitas
-- ----------------------------
INSERT INTO `tbl_visitas` VALUES (1, '192.168.2.10', '2022-03-08 00:00:00');
INSERT INTO `tbl_visitas` VALUES (2, '192.187.10.1', '2022-02-27 00:00:00');
INSERT INTO `tbl_visitas` VALUES (3, '192.187.10.1', '2022-03-01 00:00:00');
INSERT INTO `tbl_visitas` VALUES (4, '192.187.10.1', '2022-03-01 00:00:00');
INSERT INTO `tbl_visitas` VALUES (12, '::1', '2022-03-09 16:18:14');
INSERT INTO `tbl_visitas` VALUES (16, '::1', '2022-03-09 16:45:14');
INSERT INTO `tbl_visitas` VALUES (17, '::1', '2022-03-09 21:45:14');
INSERT INTO `tbl_visitas` VALUES (18, '::1', '2022-03-10 02:45:14');
INSERT INTO `tbl_visitas` VALUES (19, '::1', '2022-03-10 07:45:14');
INSERT INTO `tbl_visitas` VALUES (20, '::1', '2022-03-10 12:45:14');
INSERT INTO `tbl_visitas` VALUES (21, '::1', '2022-03-10 17:45:14');
INSERT INTO `tbl_visitas` VALUES (22, '::1', '2022-03-10 22:45:14');
INSERT INTO `tbl_visitas` VALUES (23, '::1', '2022-03-11 03:45:14');
INSERT INTO `tbl_visitas` VALUES (24, '::1', '2022-03-11 08:45:14');
INSERT INTO `tbl_visitas` VALUES (25, '::1', '2022-03-11 13:45:14');
INSERT INTO `tbl_visitas` VALUES (26, '::1', '2022-03-11 18:45:14');
INSERT INTO `tbl_visitas` VALUES (27, '::1', '2022-03-11 23:45:14');
INSERT INTO `tbl_visitas` VALUES (28, '::1', '2022-03-12 04:45:14');
INSERT INTO `tbl_visitas` VALUES (29, '::1', '2022-03-12 09:45:14');
INSERT INTO `tbl_visitas` VALUES (30, '::1', '2022-03-12 14:45:14');
INSERT INTO `tbl_visitas` VALUES (31, '::1', '2022-03-12 19:45:14');
INSERT INTO `tbl_visitas` VALUES (32, '::1', '2022-03-13 00:45:14');
INSERT INTO `tbl_visitas` VALUES (33, '::1', '2022-03-13 05:45:14');
INSERT INTO `tbl_visitas` VALUES (34, '::1', '2022-03-13 10:45:14');
INSERT INTO `tbl_visitas` VALUES (35, '::1', '2022-03-13 15:45:14');
INSERT INTO `tbl_visitas` VALUES (36, '::1', '2022-03-13 20:45:14');
INSERT INTO `tbl_visitas` VALUES (37, '::1', '2022-03-14 01:45:14');
INSERT INTO `tbl_visitas` VALUES (38, '::1', '2022-03-14 06:45:14');
INSERT INTO `tbl_visitas` VALUES (39, '::1', '2022-03-14 11:45:14');
INSERT INTO `tbl_visitas` VALUES (40, '::1', '2022-03-14 16:45:14');
INSERT INTO `tbl_visitas` VALUES (41, '::1', '2022-03-14 21:45:14');
INSERT INTO `tbl_visitas` VALUES (42, '::1', '2022-03-15 02:45:14');
INSERT INTO `tbl_visitas` VALUES (43, '::1', '2022-03-15 07:45:14');
INSERT INTO `tbl_visitas` VALUES (44, '::1', '2022-03-15 12:45:14');
INSERT INTO `tbl_visitas` VALUES (45, '::1', '2022-03-15 17:45:14');
INSERT INTO `tbl_visitas` VALUES (46, '::1', '2022-03-15 22:45:14');
INSERT INTO `tbl_visitas` VALUES (47, '::1', '2022-03-16 03:45:14');
INSERT INTO `tbl_visitas` VALUES (48, '::1', '2022-03-16 08:45:14');
INSERT INTO `tbl_visitas` VALUES (49, '::1', '2022-03-16 13:45:14');
INSERT INTO `tbl_visitas` VALUES (50, '::1', '2022-03-16 18:45:14');
INSERT INTO `tbl_visitas` VALUES (51, '::1', '2022-03-16 23:45:14');
INSERT INTO `tbl_visitas` VALUES (52, '::1', '2022-03-17 04:45:14');
INSERT INTO `tbl_visitas` VALUES (53, '::1', '2022-03-17 09:45:14');
INSERT INTO `tbl_visitas` VALUES (54, '::1', '2022-03-17 14:45:14');
INSERT INTO `tbl_visitas` VALUES (55, '::1', '2022-03-17 19:45:14');
INSERT INTO `tbl_visitas` VALUES (56, '::1', '2022-03-18 00:45:14');
INSERT INTO `tbl_visitas` VALUES (57, '::1', '2022-03-18 05:45:14');
INSERT INTO `tbl_visitas` VALUES (58, '::1', '2022-03-18 10:45:14');
INSERT INTO `tbl_visitas` VALUES (59, '::1', '2022-03-18 15:45:14');
INSERT INTO `tbl_visitas` VALUES (60, '::1', '2022-03-18 20:45:14');
INSERT INTO `tbl_visitas` VALUES (61, '::1', '2022-03-19 01:45:14');
INSERT INTO `tbl_visitas` VALUES (62, '::1', '2022-03-19 06:45:14');
INSERT INTO `tbl_visitas` VALUES (63, '::1', '2022-03-19 11:45:14');
INSERT INTO `tbl_visitas` VALUES (64, '::1', '2022-03-19 16:45:14');
INSERT INTO `tbl_visitas` VALUES (65, '::1', '2022-03-19 21:45:14');
INSERT INTO `tbl_visitas` VALUES (66, '::1', '2022-03-20 02:45:14');
INSERT INTO `tbl_visitas` VALUES (67, '::1', '2022-03-20 07:45:14');
INSERT INTO `tbl_visitas` VALUES (68, '::1', '2022-03-20 12:45:14');
INSERT INTO `tbl_visitas` VALUES (69, '::1', '2022-03-20 17:45:14');
INSERT INTO `tbl_visitas` VALUES (70, '::1', '2022-03-20 22:45:14');
INSERT INTO `tbl_visitas` VALUES (71, '::1', '2022-03-21 03:45:14');
INSERT INTO `tbl_visitas` VALUES (72, '::1', '2022-03-21 08:45:14');
INSERT INTO `tbl_visitas` VALUES (73, '::1', '2022-03-21 13:45:14');
INSERT INTO `tbl_visitas` VALUES (74, '::1', '2022-03-21 18:45:14');
INSERT INTO `tbl_visitas` VALUES (75, '::1', '2022-04-08 17:28:36');
INSERT INTO `tbl_visitas` VALUES (76, '::1', '2022-04-08 17:28:36');
INSERT INTO `tbl_visitas` VALUES (77, '::1', '2022-04-05 00:00:00');
INSERT INTO `tbl_visitas` VALUES (78, '::1', '2022-04-05 05:00:00');
INSERT INTO `tbl_visitas` VALUES (79, '::1', '2022-04-05 10:00:00');
INSERT INTO `tbl_visitas` VALUES (80, '::1', '2022-04-05 15:00:00');
INSERT INTO `tbl_visitas` VALUES (81, '::1', '2022-05-12 17:43:16');
INSERT INTO `tbl_visitas` VALUES (82, '::1', '2022-05-11 02:00:00');

SET FOREIGN_KEY_CHECKS = 1;
