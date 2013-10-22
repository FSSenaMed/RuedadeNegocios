/*
Navicat MySQL Data Transfer

Source Server         : Mysql
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : db_ruedadenegocios

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2013-08-08 11:44:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_categoria
-- ----------------------------
DROP TABLE IF EXISTS `tbl_categoria`;
CREATE TABLE `tbl_categoria` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `porne_estado` int(11) DEFAULT '1',
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tbl_categoria
-- ----------------------------
INSERT INTO `tbl_categoria` VALUES ('1', 'Lo que vendo', '1');
INSERT INTO `tbl_categoria` VALUES ('2', 'Lo que compro', '1');

-- ----------------------------
-- Table structure for tbl_cita
-- ----------------------------
DROP TABLE IF EXISTS `tbl_cita`;
CREATE TABLE `tbl_cita` (
  `cita_id` int(11) NOT NULL,
  `cita_hora` varchar(10) COLLATE utf8_bin NOT NULL,
  `registro_idEmp1` int(11) NOT NULL,
  `registro_idEmp2` int(11) NOT NULL,
  `historico` int(11) NOT NULL,
  PRIMARY KEY (`cita_id`),
  KEY `fk_tcitaempresa` (`registro_idEmp2`),
  KEY `fk_regi_emp1` (`registro_idEmp1`),
  KEY `fk_regi_emp2` (`registro_idEmp2`),
  KEY `fk_rgi_emp2` (`registro_idEmp2`),
  KEY `fk_histocita` (`historico`),
  CONSTRAINT `fk_histocita` FOREIGN KEY (`historico`) REFERENCES `tbl_historico` (`histo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_regi_emp2` FOREIGN KEY (`registro_idEmp2`) REFERENCES `tbl_registro` (`registro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rgi_emp2` FOREIGN KEY (`registro_idEmp2`) REFERENCES `tbl_registro` (`registro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tbl_cita
-- ----------------------------
INSERT INTO `tbl_cita` VALUES ('1', '08:40:00', '1', '2', '1');

-- ----------------------------
-- Table structure for tbl_departamento
-- ----------------------------
DROP TABLE IF EXISTS `tbl_departamento`;
CREATE TABLE `tbl_departamento` (
  `dep_id` varchar(2) COLLATE utf8_bin NOT NULL,
  `dep_nombre` varchar(80) COLLATE utf8_bin NOT NULL,
  `dep_estado` bit(1) NOT NULL,
  PRIMARY KEY (`dep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tbl_departamento
-- ----------------------------
INSERT INTO `tbl_departamento` VALUES ('05', 'ANTIOQUIA', '');
INSERT INTO `tbl_departamento` VALUES ('08', 'ATLÁNTICO', '');
INSERT INTO `tbl_departamento` VALUES ('11', 'BOGOTÁ', '');
INSERT INTO `tbl_departamento` VALUES ('13', 'BOLÍVAR', '');
INSERT INTO `tbl_departamento` VALUES ('15', 'BOYACÁ', '');
INSERT INTO `tbl_departamento` VALUES ('17', 'CALDAS', '');
INSERT INTO `tbl_departamento` VALUES ('18', 'CAQUETÁ', '');
INSERT INTO `tbl_departamento` VALUES ('19', 'CAUCA', '');
INSERT INTO `tbl_departamento` VALUES ('20', 'CESAR', '');
INSERT INTO `tbl_departamento` VALUES ('23', 'CÓRDOBA', '');
INSERT INTO `tbl_departamento` VALUES ('25', 'CUNDINAMARCA', '');
INSERT INTO `tbl_departamento` VALUES ('27', 'CHOCÓ', '');
INSERT INTO `tbl_departamento` VALUES ('41', 'HUILA', '');
INSERT INTO `tbl_departamento` VALUES ('44', 'LA GUAJIRA', '');
INSERT INTO `tbl_departamento` VALUES ('47', 'META', '');
INSERT INTO `tbl_departamento` VALUES ('50', 'MAGDALENA', '');
INSERT INTO `tbl_departamento` VALUES ('52', 'NORTE DE SANTANDER', '');
INSERT INTO `tbl_departamento` VALUES ('54', 'NARIÑO', '');
INSERT INTO `tbl_departamento` VALUES ('63', 'QUINDÍO', '');
INSERT INTO `tbl_departamento` VALUES ('66', 'RISARALDA', '');
INSERT INTO `tbl_departamento` VALUES ('68', 'SANTANDER', '');
INSERT INTO `tbl_departamento` VALUES ('70', 'SUCRE', '');
INSERT INTO `tbl_departamento` VALUES ('73', 'TOLIMA', '');
INSERT INTO `tbl_departamento` VALUES ('76', 'VALLEDELCAUCA', '');
INSERT INTO `tbl_departamento` VALUES ('81', 'ARAUCA', '');
INSERT INTO `tbl_departamento` VALUES ('85', 'CASANARE', '');
INSERT INTO `tbl_departamento` VALUES ('86', 'PUTUMAYO', '');
INSERT INTO `tbl_departamento` VALUES ('88', 'ARCHIPIÉLAGO DE SAN ANDRÉS, PROVIDENCIA Y SANTA CATALINA', '');
INSERT INTO `tbl_departamento` VALUES ('91', 'AMAZONAS', '');
INSERT INTO `tbl_departamento` VALUES ('94', 'GUAINÍA', '');
INSERT INTO `tbl_departamento` VALUES ('95', 'GUAVIARE', '');
INSERT INTO `tbl_departamento` VALUES ('97', 'VAUPÉS', '');
INSERT INTO `tbl_departamento` VALUES ('99', 'VICHADA', '');

-- ----------------------------
-- Table structure for tbl_historico
-- ----------------------------
DROP TABLE IF EXISTS `tbl_historico`;
CREATE TABLE `tbl_historico` (
  `histo_id` int(11) NOT NULL,
  `histo_horainic` time NOT NULL,
  `mesa_id` int(11) NOT NULL,
  PRIMARY KEY (`histo_id`),
  KEY `fk_mesahistoria` (`mesa_id`),
  CONSTRAINT `fk_mesahistoria` FOREIGN KEY (`mesa_id`) REFERENCES `tbl_mesa` (`mesa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tbl_historico
-- ----------------------------
INSERT INTO `tbl_historico` VALUES ('1', '08:40:00', '1');
INSERT INTO `tbl_historico` VALUES ('2', '09:00:00', '1');
INSERT INTO `tbl_historico` VALUES ('3', '09:00:00', '2');

-- ----------------------------
-- Table structure for tbl_mesa
-- ----------------------------
DROP TABLE IF EXISTS `tbl_mesa`;
CREATE TABLE `tbl_mesa` (
  `mesa_id` int(11) NOT NULL,
  `mesa_numero` varchar(45) COLLATE utf8_bin NOT NULL,
  `mesa_estado` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`mesa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tbl_mesa
-- ----------------------------
INSERT INTO `tbl_mesa` VALUES ('1', '1', '1');
INSERT INTO `tbl_mesa` VALUES ('2', '2', '1');
INSERT INTO `tbl_mesa` VALUES ('3', '3', '1');

-- ----------------------------
-- Table structure for tbl_municipio
-- ----------------------------
DROP TABLE IF EXISTS `tbl_municipio`;
CREATE TABLE `tbl_municipio` (
  `mun_id` int(11) NOT NULL AUTO_INCREMENT,
  `dep_codigo` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `mun_codigo` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `mun_nombre` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `mun_estado` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`mun_id`),
  KEY `fk_dpto` (`dep_codigo`),
  CONSTRAINT `fk_dpto` FOREIGN KEY (`dep_codigo`) REFERENCES `tbl_departamento` (`dep_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1124 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tbl_municipio
-- ----------------------------
INSERT INTO `tbl_municipio` VALUES ('1', '05', '001', 'MEDELLÍN', '1');
INSERT INTO `tbl_municipio` VALUES ('2', '05', '002', 'ABEJORRAL', '1');
INSERT INTO `tbl_municipio` VALUES ('3', '05', '004', 'ABRIAQUÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('4', '05', '021', 'ALEJANDRÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('5', '05', '030', 'AMAGÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('6', '05', '031', 'AMALFI', '1');
INSERT INTO `tbl_municipio` VALUES ('7', '05', '034', 'ANDES', '1');
INSERT INTO `tbl_municipio` VALUES ('8', '05', '036', 'ANGELÓPOLIS', '1');
INSERT INTO `tbl_municipio` VALUES ('9', '05', '038', 'ANGOSTURA', '1');
INSERT INTO `tbl_municipio` VALUES ('10', '05', '040', 'ANORÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('11', '05', '042', 'SANTAFÉ DE ANTIOQUIA', '1');
INSERT INTO `tbl_municipio` VALUES ('12', '05', '044', 'ANZÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('13', '05', '045', 'APARTADÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('14', '05', '051', 'ARBOLETES', '1');
INSERT INTO `tbl_municipio` VALUES ('15', '05', '055', 'ARGELIA', '1');
INSERT INTO `tbl_municipio` VALUES ('16', '05', '059', 'ARMENIA', '1');
INSERT INTO `tbl_municipio` VALUES ('17', '05', '079', 'BARBOSA', '1');
INSERT INTO `tbl_municipio` VALUES ('18', '05', '086', 'BELMIRA', '1');
INSERT INTO `tbl_municipio` VALUES ('19', '05', '088', 'BELLO', '1');
INSERT INTO `tbl_municipio` VALUES ('20', '05', '091', 'BETANIA', '1');
INSERT INTO `tbl_municipio` VALUES ('21', '05', '093', 'BETULIA', '1');
INSERT INTO `tbl_municipio` VALUES ('22', '05', '101', 'tbl_municipio BOLÍVAR', '1');
INSERT INTO `tbl_municipio` VALUES ('23', '05', '107', 'BRICEÑO', '1');
INSERT INTO `tbl_municipio` VALUES ('24', '05', '113', 'BURITICÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('25', '05', '120', 'CÁCERES', '1');
INSERT INTO `tbl_municipio` VALUES ('26', '05', '125', 'CAICEDO', '1');
INSERT INTO `tbl_municipio` VALUES ('27', '05', '129', 'CALDAS', '1');
INSERT INTO `tbl_municipio` VALUES ('28', '05', '134', 'CAMPAMENTO', '1');
INSERT INTO `tbl_municipio` VALUES ('29', '05', '138', 'CAÑASGORDAS', '1');
INSERT INTO `tbl_municipio` VALUES ('30', '05', '142', 'CARACOLÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('31', '05', '145', 'CARAMANTA', '1');
INSERT INTO `tbl_municipio` VALUES ('32', '05', '147', 'CAREPA', '1');
INSERT INTO `tbl_municipio` VALUES ('33', '05', '148', 'CARMEN DE VIBORAL', '1');
INSERT INTO `tbl_municipio` VALUES ('34', '05', '150', 'CAROLINA DEL PRÍNCIPE', '1');
INSERT INTO `tbl_municipio` VALUES ('35', '05', '154', 'CAUCASIA', '1');
INSERT INTO `tbl_municipio` VALUES ('36', '05', '172', 'CHIGORODÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('37', '05', '190', 'CISNEROS', '1');
INSERT INTO `tbl_municipio` VALUES ('38', '05', '197', 'COCORNÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('39', '05', '206', 'CONCEPCIÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('40', '05', '209', 'CONCORDIA', '1');
INSERT INTO `tbl_municipio` VALUES ('41', '05', '212', 'COPACABANA', '1');
INSERT INTO `tbl_municipio` VALUES ('42', '05', '234', 'DABEIBA', '1');
INSERT INTO `tbl_municipio` VALUES ('43', '05', '237', 'DON MATÍAS', '1');
INSERT INTO `tbl_municipio` VALUES ('44', '05', '240', 'EBÉJICO', '1');
INSERT INTO `tbl_municipio` VALUES ('45', '05', '250', 'EL BAGRE', '1');
INSERT INTO `tbl_municipio` VALUES ('46', '05', '264', 'ENTRERRÍOS', '1');
INSERT INTO `tbl_municipio` VALUES ('47', '05', '266', 'ENVIGADO', '1');
INSERT INTO `tbl_municipio` VALUES ('48', '05', '282', 'FREDONIA', '1');
INSERT INTO `tbl_municipio` VALUES ('49', '05', '284', 'FRONTINO', '1');
INSERT INTO `tbl_municipio` VALUES ('50', '05', '306', 'GIRALDO', '1');
INSERT INTO `tbl_municipio` VALUES ('51', '05', '308', 'GIRARDOTA', '1');
INSERT INTO `tbl_municipio` VALUES ('52', '05', '310', 'GÓMEZ PLATA', '1');
INSERT INTO `tbl_municipio` VALUES ('53', '05', '313', 'GRANADA', '1');
INSERT INTO `tbl_municipio` VALUES ('54', '05', '315', 'GUADALUPE', '1');
INSERT INTO `tbl_municipio` VALUES ('55', '05', '318', 'GUARNE', '1');
INSERT INTO `tbl_municipio` VALUES ('56', '05', '321', 'GUATAPÉ', '1');
INSERT INTO `tbl_municipio` VALUES ('57', '05', '347', 'HELICONIA', '1');
INSERT INTO `tbl_municipio` VALUES ('58', '05', '353', 'HISPANIA', '1');
INSERT INTO `tbl_municipio` VALUES ('59', '05', '360', 'ITAGÜÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('60', '05', '361', 'ITUANGO', '1');
INSERT INTO `tbl_municipio` VALUES ('61', '05', '364', 'JARDÍN', '1');
INSERT INTO `tbl_municipio` VALUES ('62', '05', '368', 'JERICÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('63', '05', '376', 'LA CEJA', '1');
INSERT INTO `tbl_municipio` VALUES ('64', '05', '380', 'LA ESTRELLA', '1');
INSERT INTO `tbl_municipio` VALUES ('65', '05', '390', 'LA PINTADA', '1');
INSERT INTO `tbl_municipio` VALUES ('66', '05', '400', 'LA UNIÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('67', '05', '411', 'LIBORINA', '1');
INSERT INTO `tbl_municipio` VALUES ('68', '05', '425', 'MACEO', '1');
INSERT INTO `tbl_municipio` VALUES ('69', '05', '440', 'MARINILLA', '1');
INSERT INTO `tbl_municipio` VALUES ('70', '05', '467', 'MONTEBELLO', '1');
INSERT INTO `tbl_municipio` VALUES ('71', '05', '475', 'MURINDÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('72', '05', '480', 'MUTATÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('73', '05', '483', 'NARIÑO', '1');
INSERT INTO `tbl_municipio` VALUES ('74', '05', '490', 'NECHÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('75', '05', '495', 'NECOCLÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('76', '05', '501', 'OLAYA', '1');
INSERT INTO `tbl_municipio` VALUES ('77', '05', '541', 'EL PEÑOL', '1');
INSERT INTO `tbl_municipio` VALUES ('78', '05', '543', 'PEQUE', '1');
INSERT INTO `tbl_municipio` VALUES ('79', '05', '576', 'PUEBLORRICO', '1');
INSERT INTO `tbl_municipio` VALUES ('80', '05', '579', 'PUERTO BERRÍO', '1');
INSERT INTO `tbl_municipio` VALUES ('81', '05', '585', 'PUERTO NARE', '1');
INSERT INTO `tbl_municipio` VALUES ('82', '05', '591', 'PUERTO TRIUNFO', '1');
INSERT INTO `tbl_municipio` VALUES ('83', '05', '604', 'REMEDIOS', '1');
INSERT INTO `tbl_municipio` VALUES ('84', '05', '607', 'EL RETIRO', '1');
INSERT INTO `tbl_municipio` VALUES ('85', '05', '615', 'RIONEGRO', '1');
INSERT INTO `tbl_municipio` VALUES ('86', '05', '628', 'SABANALARGA', '1');
INSERT INTO `tbl_municipio` VALUES ('87', '05', '631', 'SABANETA', '1');
INSERT INTO `tbl_municipio` VALUES ('88', '05', '642', 'SALGAR', '1');
INSERT INTO `tbl_municipio` VALUES ('89', '05', '647', 'SAN ANDRÉS DE CUERQUIA', '1');
INSERT INTO `tbl_municipio` VALUES ('90', '05', '649', 'SAN CARLOS', '1');
INSERT INTO `tbl_municipio` VALUES ('91', '05', '652', 'SAN FRANCISCO', '1');
INSERT INTO `tbl_municipio` VALUES ('92', '05', '656', 'SAN JERÓNIMO', '1');
INSERT INTO `tbl_municipio` VALUES ('93', '05', '658', 'SAN JOSÉ DE LA MONTAÑA', '1');
INSERT INTO `tbl_municipio` VALUES ('94', '05', '659', 'SAN JUAN DE URABÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('95', '05', '660', 'SAN LUIS', '1');
INSERT INTO `tbl_municipio` VALUES ('96', '05', '664', 'SAN PEDRO DE LOS MILAGROS', '1');
INSERT INTO `tbl_municipio` VALUES ('97', '05', '665', 'SAN PEDRO DE URABÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('98', '05', '667', 'SAN RAFAEL', '1');
INSERT INTO `tbl_municipio` VALUES ('99', '05', '670', 'SAN ROQUE', '1');
INSERT INTO `tbl_municipio` VALUES ('100', '05', '674', 'SAN VICENTE', '1');
INSERT INTO `tbl_municipio` VALUES ('101', '05', '679', 'SANTA BÁRBARA', '1');
INSERT INTO `tbl_municipio` VALUES ('102', '05', '686', 'SANTA ROSA DE OSOS', '1');
INSERT INTO `tbl_municipio` VALUES ('103', '05', '690', 'SANTO DOMINGO', '1');
INSERT INTO `tbl_municipio` VALUES ('104', '05', '697', 'EL SANTUARIO', '1');
INSERT INTO `tbl_municipio` VALUES ('105', '05', '736', 'SEGOVIA', '1');
INSERT INTO `tbl_municipio` VALUES ('106', '05', '756', 'SONSÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('107', '05', '761', 'SOPETRÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('108', '05', '789', 'TÁMESIS', '1');
INSERT INTO `tbl_municipio` VALUES ('109', '05', '790', 'TARAZÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('110', '05', '792', 'TARSO', '1');
INSERT INTO `tbl_municipio` VALUES ('111', '05', '809', 'TITIRIBÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('112', '05', '819', 'TOLEDO', '1');
INSERT INTO `tbl_municipio` VALUES ('113', '05', '837', 'TURBO', '1');
INSERT INTO `tbl_municipio` VALUES ('114', '05', '842', 'URAMITA', '1');
INSERT INTO `tbl_municipio` VALUES ('115', '05', '847', 'URRAO', '1');
INSERT INTO `tbl_municipio` VALUES ('116', '05', '854', 'VALDIVIA', '1');
INSERT INTO `tbl_municipio` VALUES ('117', '05', '856', 'VALPARAÍSO', '1');
INSERT INTO `tbl_municipio` VALUES ('118', '05', '858', 'VEGACHÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('119', '05', '861', 'VENECIA', '1');
INSERT INTO `tbl_municipio` VALUES ('120', '05', '873', 'VIGÍA DEL FUERTE', '1');
INSERT INTO `tbl_municipio` VALUES ('121', '05', '885', 'YALÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('122', '05', '887', 'YARUMAL', '1');
INSERT INTO `tbl_municipio` VALUES ('123', '05', '890', 'YOLOMBÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('124', '05', '893', 'YONDÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('125', '05', '895', 'ZARAGOZA', '1');
INSERT INTO `tbl_municipio` VALUES ('126', '08', '001', 'BARRANQUILLA', '1');
INSERT INTO `tbl_municipio` VALUES ('127', '08', '078', 'BARANOA', '1');
INSERT INTO `tbl_municipio` VALUES ('128', '08', '137', 'CAMPO DE LA CRUZ', '1');
INSERT INTO `tbl_municipio` VALUES ('129', '08', '141', 'CANDELARIA', '1');
INSERT INTO `tbl_municipio` VALUES ('130', '08', '296', 'GALAPA', '1');
INSERT INTO `tbl_municipio` VALUES ('131', '08', '372', 'JUAN DE ACOSTA', '1');
INSERT INTO `tbl_municipio` VALUES ('132', '08', '421', 'LURUACO', '1');
INSERT INTO `tbl_municipio` VALUES ('133', '08', '433', 'MALAMBO', '1');
INSERT INTO `tbl_municipio` VALUES ('134', '08', '436', 'MANATÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('135', '08', '520', 'PALMAR DE VARELA', '1');
INSERT INTO `tbl_municipio` VALUES ('136', '08', '549', 'PIOJÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('137', '08', '558', 'POLONUEVO', '1');
INSERT INTO `tbl_municipio` VALUES ('138', '08', '560', 'PONEDERA', '1');
INSERT INTO `tbl_municipio` VALUES ('139', '08', '573', 'PUERTO COLOMBIA', '1');
INSERT INTO `tbl_municipio` VALUES ('140', '08', '606', 'REPELÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('141', '08', '634', 'SABANAGRANDE', '1');
INSERT INTO `tbl_municipio` VALUES ('142', '08', '638', 'SABANALARGA', '1');
INSERT INTO `tbl_municipio` VALUES ('143', '08', '675', 'SANTA LUCÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('144', '08', '685', 'SANTO TOMÁS', '1');
INSERT INTO `tbl_municipio` VALUES ('145', '08', '758', 'SOLEDAD', '1');
INSERT INTO `tbl_municipio` VALUES ('146', '08', '770', 'SUÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('147', '08', '832', 'TUBARÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('148', '08', '849', 'USIACURÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('149', '11', '001', 'BOGOTÁ D.C.', '1');
INSERT INTO `tbl_municipio` VALUES ('150', '13', '001', 'CARTAGENA DE INDIAS', '1');
INSERT INTO `tbl_municipio` VALUES ('151', '13', '006', 'ACHÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('152', '13', '030', 'ALTOS DEL ROSARIO', '1');
INSERT INTO `tbl_municipio` VALUES ('153', '13', '042', 'ARENAL', '1');
INSERT INTO `tbl_municipio` VALUES ('154', '13', '052', 'ARJONA', '1');
INSERT INTO `tbl_municipio` VALUES ('155', '13', '062', 'ARROYOHONDO', '1');
INSERT INTO `tbl_municipio` VALUES ('156', '13', '074', 'BARRANCO DE LOBA', '1');
INSERT INTO `tbl_municipio` VALUES ('157', '13', '999', 'BRAZUELO DE PAPAYAL', '1');
INSERT INTO `tbl_municipio` VALUES ('158', '13', '140', 'CALAMAR', '1');
INSERT INTO `tbl_municipio` VALUES ('159', '13', '160', 'CANTAGALLO', '1');
INSERT INTO `tbl_municipio` VALUES ('160', '13', '188', 'CICUCO', '1');
INSERT INTO `tbl_municipio` VALUES ('161', '13', '212', 'CÓRDOBA', '1');
INSERT INTO `tbl_municipio` VALUES ('162', '13', '222', 'CLEMENCIA', '1');
INSERT INTO `tbl_municipio` VALUES ('163', '13', '244', 'EL CARMEN DE BOLÍVAR', '1');
INSERT INTO `tbl_municipio` VALUES ('164', '13', '248', 'EL GUAMO', '1');
INSERT INTO `tbl_municipio` VALUES ('165', '13', '268', 'EL PEÑÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('166', '13', '300', 'HATILLO DE LOBA', '1');
INSERT INTO `tbl_municipio` VALUES ('167', '13', '430', 'MAGANGUÉ', '1');
INSERT INTO `tbl_municipio` VALUES ('168', '13', '433', 'MAHATES', '1');
INSERT INTO `tbl_municipio` VALUES ('169', '13', '440', 'MARGARITA', '1');
INSERT INTO `tbl_municipio` VALUES ('170', '13', '442', 'MARÍA LA BAJA', '1');
INSERT INTO `tbl_municipio` VALUES ('171', '13', '458', 'MONTECRISTO', '1');
INSERT INTO `tbl_municipio` VALUES ('172', '13', '468', 'SANTA CRUZ DE MOMPOX', '1');
INSERT INTO `tbl_municipio` VALUES ('173', '13', '490', 'NOROSÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('174', '13', '473', 'MORALES', '1');
INSERT INTO `tbl_municipio` VALUES ('175', '13', '549', 'PINILLOS', '1');
INSERT INTO `tbl_municipio` VALUES ('176', '13', '580', 'REGIDOR', '1');
INSERT INTO `tbl_municipio` VALUES ('177', '13', '600', 'RÍO VIEJO', '1');
INSERT INTO `tbl_municipio` VALUES ('178', '13', '620', 'SAN CRISTÓBAL', '1');
INSERT INTO `tbl_municipio` VALUES ('179', '13', '647', 'SAN ESTANISLAO', '1');
INSERT INTO `tbl_municipio` VALUES ('180', '13', '650', 'SAN FERNANDO', '1');
INSERT INTO `tbl_municipio` VALUES ('181', '13', '654', 'SAN JACINTO', '1');
INSERT INTO `tbl_municipio` VALUES ('182', '13', '655', 'SAN JACINTO DEL CAUCA', '1');
INSERT INTO `tbl_municipio` VALUES ('183', '13', '657', 'SAN JUAN NEPOMUCENO', '1');
INSERT INTO `tbl_municipio` VALUES ('184', '13', '667', 'SAN MARTÍN DE LOBA', '1');
INSERT INTO `tbl_municipio` VALUES ('185', '13', '670', 'SAN PABLO', '1');
INSERT INTO `tbl_municipio` VALUES ('186', '13', '673', 'SANTA CATALINA', '1');
INSERT INTO `tbl_municipio` VALUES ('187', '13', '683', 'SANTA ROSA', '1');
INSERT INTO `tbl_municipio` VALUES ('188', '13', '688', 'SANTA ROSA DEL SUR', '1');
INSERT INTO `tbl_municipio` VALUES ('189', '13', '744', 'SIMITÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('190', '13', '760', 'SOPLAVIENTO', '1');
INSERT INTO `tbl_municipio` VALUES ('191', '13', '780', 'TALAIGUA NUEVO', '1');
INSERT INTO `tbl_municipio` VALUES ('192', '13', '810', 'TIQUISIO', '1');
INSERT INTO `tbl_municipio` VALUES ('193', '13', '836', 'TURBACO', '1');
INSERT INTO `tbl_municipio` VALUES ('194', '13', '838', 'TURBANÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('195', '13', '873', 'VILLANUEVA', '1');
INSERT INTO `tbl_municipio` VALUES ('196', '13', '894', 'ZAMBRANO', '1');
INSERT INTO `tbl_municipio` VALUES ('197', '15', '001', 'TUNJA', '1');
INSERT INTO `tbl_municipio` VALUES ('198', '15', '022', 'ALMEIDA', '1');
INSERT INTO `tbl_municipio` VALUES ('199', '15', '047', 'AQUITANIA', '1');
INSERT INTO `tbl_municipio` VALUES ('200', '15', '051', 'ARCABUCO', '1');
INSERT INTO `tbl_municipio` VALUES ('201', '15', '087', 'BELÉN', '1');
INSERT INTO `tbl_municipio` VALUES ('202', '15', '090', 'BERBEO', '1');
INSERT INTO `tbl_municipio` VALUES ('203', '15', '092', 'BETÉITIVA', '1');
INSERT INTO `tbl_municipio` VALUES ('204', '15', '097', 'BOAVITA', '1');
INSERT INTO `tbl_municipio` VALUES ('205', '15', '104', 'BOYACÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('206', '15', '106', 'BRICEÑO', '1');
INSERT INTO `tbl_municipio` VALUES ('207', '15', '109', 'BUENAVISTA', '1');
INSERT INTO `tbl_municipio` VALUES ('208', '15', '114', 'BUSBANZÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('209', '15', '131', 'CALDAS', '1');
INSERT INTO `tbl_municipio` VALUES ('210', '15', '135', 'CAMPOHERMOSO', '1');
INSERT INTO `tbl_municipio` VALUES ('211', '15', '162', 'CERINZA', '1');
INSERT INTO `tbl_municipio` VALUES ('212', '15', '172', 'CHINAVITA', '1');
INSERT INTO `tbl_municipio` VALUES ('213', '15', '176', 'CHIQUINQUIRÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('214', '15', '180', 'CHISCAS', '1');
INSERT INTO `tbl_municipio` VALUES ('215', '15', '183', 'CHITA', '1');
INSERT INTO `tbl_municipio` VALUES ('216', '15', '185', 'CHITARAQUE', '1');
INSERT INTO `tbl_municipio` VALUES ('217', '15', '187', 'CHIVATÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('218', '15', '189', 'CIÉNEGA', '1');
INSERT INTO `tbl_municipio` VALUES ('219', '15', '204', 'CÓMBITA', '1');
INSERT INTO `tbl_municipio` VALUES ('220', '15', '212', 'COPER', '1');
INSERT INTO `tbl_municipio` VALUES ('221', '15', '215', 'CORRALES', '1');
INSERT INTO `tbl_municipio` VALUES ('222', '15', '218', 'COVARACHÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('223', '15', '223', 'CUBARÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('224', '15', '224', 'CUCAITA', '1');
INSERT INTO `tbl_municipio` VALUES ('225', '15', '226', 'CUÍTIVA', '1');
INSERT INTO `tbl_municipio` VALUES ('226', '15', '232', 'CHÍQUIZA', '1');
INSERT INTO `tbl_municipio` VALUES ('227', '15', '236', 'CHIVOR', '1');
INSERT INTO `tbl_municipio` VALUES ('228', '15', '238', 'DUITAMA', '1');
INSERT INTO `tbl_municipio` VALUES ('229', '15', '244', 'EL COCUY', '1');
INSERT INTO `tbl_municipio` VALUES ('230', '15', '248', 'EL ESPINO', '1');
INSERT INTO `tbl_municipio` VALUES ('231', '15', '272', 'FIRAVITOBA', '1');
INSERT INTO `tbl_municipio` VALUES ('232', '15', '276', 'FLORESTA', '1');
INSERT INTO `tbl_municipio` VALUES ('233', '15', '293', 'GACHANTIVÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('234', '15', '296', 'GÁMEZA', '1');
INSERT INTO `tbl_municipio` VALUES ('235', '15', '299', 'GARAGOA', '1');
INSERT INTO `tbl_municipio` VALUES ('236', '15', '317', 'GUACAMAYAS', '1');
INSERT INTO `tbl_municipio` VALUES ('237', '15', '322', 'GUATEQUE', '1');
INSERT INTO `tbl_municipio` VALUES ('238', '15', '325', 'GUAYATÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('239', '15', '332', 'GÜICÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('240', '15', '362', 'IZA', '1');
INSERT INTO `tbl_municipio` VALUES ('241', '15', '367', 'JENESANO', '1');
INSERT INTO `tbl_municipio` VALUES ('242', '15', '368', 'JERICÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('243', '15', '377', 'LABRANZAGRANDE', '1');
INSERT INTO `tbl_municipio` VALUES ('244', '15', '380', 'LA CAPILLA', '1');
INSERT INTO `tbl_municipio` VALUES ('245', '15', '401', 'LA UVITA', '1');
INSERT INTO `tbl_municipio` VALUES ('246', '15', '403', 'LA VICTORIA', '1');
INSERT INTO `tbl_municipio` VALUES ('247', '15', '407', 'VILLA DE LEYVA', '1');
INSERT INTO `tbl_municipio` VALUES ('248', '15', '425', 'MACANAL', '1');
INSERT INTO `tbl_municipio` VALUES ('249', '15', '442', 'MARIPÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('250', '15', '455', 'MIRAFLORES', '1');
INSERT INTO `tbl_municipio` VALUES ('251', '15', '464', 'MONGUA', '1');
INSERT INTO `tbl_municipio` VALUES ('252', '15', '466', 'MONGUÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('253', '15', '469', 'MONIQUIRÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('254', '15', '476', 'MOTAVITA', '1');
INSERT INTO `tbl_municipio` VALUES ('255', '15', '480', 'MUZO', '1');
INSERT INTO `tbl_municipio` VALUES ('256', '15', '491', 'NOBSA', '1');
INSERT INTO `tbl_municipio` VALUES ('257', '15', '494', 'NUEVO COLÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('258', '15', '500', 'OICATÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('259', '15', '507', 'OTANCHE', '1');
INSERT INTO `tbl_municipio` VALUES ('260', '15', '511', 'PACHAVITA', '1');
INSERT INTO `tbl_municipio` VALUES ('261', '15', '514', 'PÁEZ', '1');
INSERT INTO `tbl_municipio` VALUES ('262', '15', '516', 'PAIPA', '1');
INSERT INTO `tbl_municipio` VALUES ('263', '15', '518', 'PAJARITO', '1');
INSERT INTO `tbl_municipio` VALUES ('264', '15', '522', 'PANQUEBA', '1');
INSERT INTO `tbl_municipio` VALUES ('265', '15', '531', 'PAUNA', '1');
INSERT INTO `tbl_municipio` VALUES ('266', '15', '533', 'PAYA', '1');
INSERT INTO `tbl_municipio` VALUES ('267', '15', '537', 'PAZ DE RÍO', '1');
INSERT INTO `tbl_municipio` VALUES ('268', '15', '542', 'PESCA', '1');
INSERT INTO `tbl_municipio` VALUES ('269', '15', '550', 'PISBA', '1');
INSERT INTO `tbl_municipio` VALUES ('270', '15', '572', 'PUERTO BOYACÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('271', '15', '580', 'QUÍPAMA', '1');
INSERT INTO `tbl_municipio` VALUES ('272', '15', '599', 'RAMIRIQUÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('273', '15', '600', 'RÁQUIRA', '1');
INSERT INTO `tbl_municipio` VALUES ('274', '15', '621', 'RONDÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('275', '15', '632', 'SABOYÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('276', '15', '638', 'SÁCHICA', '1');
INSERT INTO `tbl_municipio` VALUES ('277', '15', '646', 'SAMACÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('278', '15', '660', 'SAN EDUARDO', '1');
INSERT INTO `tbl_municipio` VALUES ('279', '15', '664', 'SAN JOSÉ DE PARE', '1');
INSERT INTO `tbl_municipio` VALUES ('280', '15', '667', 'SAN LUIS DE GACENO', '1');
INSERT INTO `tbl_municipio` VALUES ('281', '15', '673', 'SAN MATEO', '1');
INSERT INTO `tbl_municipio` VALUES ('282', '15', '676', 'SAN MIGUEL DE SEMA', '1');
INSERT INTO `tbl_municipio` VALUES ('283', '15', '681', 'SAN PABLO DE BORBUR', '1');
INSERT INTO `tbl_municipio` VALUES ('284', '15', '686', 'SANTANA', '1');
INSERT INTO `tbl_municipio` VALUES ('285', '15', '690', 'SANTA MARÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('286', '15', '693', 'SANTA ROSA DE VITERBO', '1');
INSERT INTO `tbl_municipio` VALUES ('287', '15', '696', 'SANTA SOFÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('288', '15', '720', 'SATIVANORTE', '1');
INSERT INTO `tbl_municipio` VALUES ('289', '15', '723', 'SATIVASUR', '1');
INSERT INTO `tbl_municipio` VALUES ('290', '15', '740', 'SIACHOQUE', '1');
INSERT INTO `tbl_municipio` VALUES ('291', '15', '753', 'SOATÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('292', '15', '755', 'SOCOTÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('293', '15', '757', 'SOCHA', '1');
INSERT INTO `tbl_municipio` VALUES ('294', '15', '759', 'SOGAMOSO', '1');
INSERT INTO `tbl_municipio` VALUES ('295', '15', '761', 'SOMONDOCO', '1');
INSERT INTO `tbl_municipio` VALUES ('296', '15', '762', 'SORA', '1');
INSERT INTO `tbl_municipio` VALUES ('297', '15', '763', 'SOTAQUIRÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('298', '15', '764', 'SORACÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('299', '15', '774', 'SUSACÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('300', '15', '776', 'SUTAMARCHÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('301', '15', '778', 'SUTATENZA', '1');
INSERT INTO `tbl_municipio` VALUES ('302', '15', '790', 'TASCO', '1');
INSERT INTO `tbl_municipio` VALUES ('303', '15', '798', 'TENZA', '1');
INSERT INTO `tbl_municipio` VALUES ('304', '15', '804', 'TIBANÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('305', '15', '806', 'TIBASOSA', '1');
INSERT INTO `tbl_municipio` VALUES ('306', '15', '808', 'TINJACÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('307', '15', '810', 'TIPACOQUE', '1');
INSERT INTO `tbl_municipio` VALUES ('308', '15', '814', 'TOCA', '1');
INSERT INTO `tbl_municipio` VALUES ('309', '15', '816', 'TOGÜÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('310', '15', '820', 'TÓPAGA', '1');
INSERT INTO `tbl_municipio` VALUES ('311', '15', '822', 'TOTA', '1');
INSERT INTO `tbl_municipio` VALUES ('312', '15', '832', 'TUNUNGUÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('313', '15', '835', 'TURMEQUÉ', '1');
INSERT INTO `tbl_municipio` VALUES ('314', '15', '837', 'TUTA', '1');
INSERT INTO `tbl_municipio` VALUES ('315', '15', '839', 'TUTAZÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('316', '15', '842', 'UMBITA', '1');
INSERT INTO `tbl_municipio` VALUES ('317', '15', '861', 'VENTAQUEMADA', '1');
INSERT INTO `tbl_municipio` VALUES ('318', '15', '879', 'VIRACACHÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('319', '15', '897', 'ZETAQUIRA', '1');
INSERT INTO `tbl_municipio` VALUES ('320', '17', '001', 'MANIZALES', '1');
INSERT INTO `tbl_municipio` VALUES ('321', '17', '013', 'AGUADAS', '1');
INSERT INTO `tbl_municipio` VALUES ('322', '17', '042', 'ANSERMA', '1');
INSERT INTO `tbl_municipio` VALUES ('323', '17', '050', 'ARANZAZU', '1');
INSERT INTO `tbl_municipio` VALUES ('324', '17', '088', 'BELALCÁZAR', '1');
INSERT INTO `tbl_municipio` VALUES ('325', '17', '174', 'CHINCHINÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('326', '17', '272', 'FILADELFIA', '1');
INSERT INTO `tbl_municipio` VALUES ('327', '17', '380', 'LA DORADA', '1');
INSERT INTO `tbl_municipio` VALUES ('328', '17', '388', 'LA MERCED', '1');
INSERT INTO `tbl_municipio` VALUES ('329', '17', '433', 'MANZANARES', '1');
INSERT INTO `tbl_municipio` VALUES ('330', '17', '442', 'MARMATO', '1');
INSERT INTO `tbl_municipio` VALUES ('331', '17', '444', 'MARQUETALIA', '1');
INSERT INTO `tbl_municipio` VALUES ('332', '17', '446', 'MARULANDA', '1');
INSERT INTO `tbl_municipio` VALUES ('333', '17', '486', 'NEIRA', '1');
INSERT INTO `tbl_municipio` VALUES ('334', '17', '495', 'NORCASIA', '1');
INSERT INTO `tbl_municipio` VALUES ('335', '17', '513', 'PÁCORA', '1');
INSERT INTO `tbl_municipio` VALUES ('336', '17', '524', 'PALESTINA', '1');
INSERT INTO `tbl_municipio` VALUES ('337', '17', '541', 'PENSILVANIA', '1');
INSERT INTO `tbl_municipio` VALUES ('338', '17', '614', 'RIOSUCIO', '1');
INSERT INTO `tbl_municipio` VALUES ('339', '17', '616', 'RISARALDA', '1');
INSERT INTO `tbl_municipio` VALUES ('340', '17', '653', 'SALAMINA', '1');
INSERT INTO `tbl_municipio` VALUES ('341', '17', '662', 'SAMANÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('342', '17', '665', 'SAN JOSÉ', '1');
INSERT INTO `tbl_municipio` VALUES ('343', '17', '777', 'SUPÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('344', '17', '867', 'VICTORIA', '1');
INSERT INTO `tbl_municipio` VALUES ('345', '17', '873', 'VILLAMARÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('346', '17', '877', 'VITERBO', '1');
INSERT INTO `tbl_municipio` VALUES ('347', '18', '001', 'FLORENCIA', '1');
INSERT INTO `tbl_municipio` VALUES ('348', '18', '029', 'ALBANIA', '1');
INSERT INTO `tbl_municipio` VALUES ('349', '18', '094', 'BELÉN DE LOS ANDAQUÍES', '1');
INSERT INTO `tbl_municipio` VALUES ('350', '18', '150', 'CARTAGENA DEL CHAIRÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('351', '18', '205', 'CURILLO', '1');
INSERT INTO `tbl_municipio` VALUES ('352', '18', '247', 'EL DONCELLO', '1');
INSERT INTO `tbl_municipio` VALUES ('353', '18', '256', 'EL PAUJIL', '1');
INSERT INTO `tbl_municipio` VALUES ('354', '18', '410', 'LA MONTAÑITA', '1');
INSERT INTO `tbl_municipio` VALUES ('355', '18', '460', 'PUERTO MILÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('356', '18', '479', 'MORELIA', '1');
INSERT INTO `tbl_municipio` VALUES ('357', '18', '592', 'PUERTO RICO', '1');
INSERT INTO `tbl_municipio` VALUES ('358', '18', '610', 'SAN JOSÉ DEL FRAGUA', '1');
INSERT INTO `tbl_municipio` VALUES ('359', '18', '753', 'SAN VICENTE DEL CAGUÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('360', '18', '756', 'SOLANO', '1');
INSERT INTO `tbl_municipio` VALUES ('361', '18', '785', 'SOLITA', '1');
INSERT INTO `tbl_municipio` VALUES ('362', '18', '860', 'VALPARAÍSO', '1');
INSERT INTO `tbl_municipio` VALUES ('363', '19', '001', 'POPAYÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('364', '19', '022', 'ALMAGUER', '1');
INSERT INTO `tbl_municipio` VALUES ('365', '19', '050', 'ARGELIA', '1');
INSERT INTO `tbl_municipio` VALUES ('366', '19', '075', 'BALBOA', '1');
INSERT INTO `tbl_municipio` VALUES ('367', '19', '100', 'BOLÍVAR', '1');
INSERT INTO `tbl_municipio` VALUES ('368', '19', '110', 'BUENOS AIRES', '1');
INSERT INTO `tbl_municipio` VALUES ('369', '19', '130', 'CAJIBÍO', '1');
INSERT INTO `tbl_municipio` VALUES ('370', '19', '137', 'CALDONÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('371', '19', '142', 'CALOTO', '1');
INSERT INTO `tbl_municipio` VALUES ('372', '19', '212', 'CORINTO', '1');
INSERT INTO `tbl_municipio` VALUES ('373', '19', '256', 'EL TAMBO', '1');
INSERT INTO `tbl_municipio` VALUES ('374', '19', '290', 'FLORENCIA', '1');
INSERT INTO `tbl_municipio` VALUES ('375', '19', '300', 'GUACHENÉ', '1');
INSERT INTO `tbl_municipio` VALUES ('376', '19', '318', 'GUAPÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('377', '19', '355', 'INZÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('378', '19', '364', 'JAMBALÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('379', '19', '392', 'LA SIERRA', '1');
INSERT INTO `tbl_municipio` VALUES ('380', '19', '397', 'LA VEGA', '1');
INSERT INTO `tbl_municipio` VALUES ('381', '19', '418', 'LÓPEZ DE MICAY', '1');
INSERT INTO `tbl_municipio` VALUES ('382', '19', '450', 'MERCADERES', '1');
INSERT INTO `tbl_municipio` VALUES ('383', '19', '455', 'MIRANDA', '1');
INSERT INTO `tbl_municipio` VALUES ('384', '19', '473', 'MORALES', '1');
INSERT INTO `tbl_municipio` VALUES ('385', '19', '513', 'PADILLA', '1');
INSERT INTO `tbl_municipio` VALUES ('386', '19', '517', 'PÁEZ', '1');
INSERT INTO `tbl_municipio` VALUES ('387', '19', '532', 'PATÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('388', '19', '533', 'PIAMONTE', '1');
INSERT INTO `tbl_municipio` VALUES ('389', '19', '548', 'PIENDAMÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('390', '19', '573', 'PUERTO TEJADA', '1');
INSERT INTO `tbl_municipio` VALUES ('391', '19', '585', 'PURACÉ', '1');
INSERT INTO `tbl_municipio` VALUES ('392', '19', '622', 'ROSAS', '1');
INSERT INTO `tbl_municipio` VALUES ('393', '19', '693', 'SAN SEBASTIÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('394', '19', '698', 'SANTANDER DE QUILICHAO', '1');
INSERT INTO `tbl_municipio` VALUES ('395', '19', '701', 'SANTA ROSA', '1');
INSERT INTO `tbl_municipio` VALUES ('396', '19', '743', 'SILVIA', '1');
INSERT INTO `tbl_municipio` VALUES ('397', '19', '760', 'SOTARÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('398', '19', '780', 'SUÁREZ', '1');
INSERT INTO `tbl_municipio` VALUES ('399', '19', '785', 'SUCRE', '1');
INSERT INTO `tbl_municipio` VALUES ('400', '19', '807', 'TIMBÍO', '1');
INSERT INTO `tbl_municipio` VALUES ('401', '19', '809', 'TIMBIQUÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('402', '19', '821', 'TORIBÍO', '1');
INSERT INTO `tbl_municipio` VALUES ('403', '19', '824', 'TOTORÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('404', '19', '845', 'VILLA RICA', '1');
INSERT INTO `tbl_municipio` VALUES ('405', '20', '001', 'VALLEDUPAR', '1');
INSERT INTO `tbl_municipio` VALUES ('406', '20', '011', 'AGUACHICA', '1');
INSERT INTO `tbl_municipio` VALUES ('407', '20', '013', 'AGUSTÍN CODAZZI', '1');
INSERT INTO `tbl_municipio` VALUES ('408', '20', '032', 'ASTREA', '1');
INSERT INTO `tbl_municipio` VALUES ('409', '20', '045', 'BECERRIL', '1');
INSERT INTO `tbl_municipio` VALUES ('410', '20', '060', 'BOSCONIA', '1');
INSERT INTO `tbl_municipio` VALUES ('411', '20', '175', 'CHIMICHAGUA', '1');
INSERT INTO `tbl_municipio` VALUES ('412', '20', '178', 'CHIRIGUANÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('413', '20', '228', 'CURUMANÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('414', '20', '238', 'EL COPEY', '1');
INSERT INTO `tbl_municipio` VALUES ('415', '20', '250', 'EL PASO', '1');
INSERT INTO `tbl_municipio` VALUES ('416', '20', '295', 'GAMARRA', '1');
INSERT INTO `tbl_municipio` VALUES ('417', '20', '310', 'GONZÁLEZ', '1');
INSERT INTO `tbl_municipio` VALUES ('418', '20', '383', 'LA GLORIA', '1');
INSERT INTO `tbl_municipio` VALUES ('419', '20', '400', 'LA JAGUA DE IBIRICO', '1');
INSERT INTO `tbl_municipio` VALUES ('420', '20', '443', 'MANAURE BALCÓN DEL CESAR', '1');
INSERT INTO `tbl_municipio` VALUES ('421', '20', '517', 'PAILITAS', '1');
INSERT INTO `tbl_municipio` VALUES ('422', '20', '550', 'PELAYA', '1');
INSERT INTO `tbl_municipio` VALUES ('423', '20', '570', 'PUEBLO BELLO', '1');
INSERT INTO `tbl_municipio` VALUES ('424', '20', '614', 'RÍO DE ORO', '1');
INSERT INTO `tbl_municipio` VALUES ('425', '20', '621', 'LA PAZ', '1');
INSERT INTO `tbl_municipio` VALUES ('426', '20', '710', 'SAN ALBERTO', '1');
INSERT INTO `tbl_municipio` VALUES ('427', '20', '750', 'SAN DIEGO', '1');
INSERT INTO `tbl_municipio` VALUES ('428', '20', '770', 'SAN MARTÍN', '1');
INSERT INTO `tbl_municipio` VALUES ('429', '20', '787', 'TAMALAMEQUE', '1');
INSERT INTO `tbl_municipio` VALUES ('430', '23', '001', 'MONTERÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('431', '23', '068', 'AYAPEL', '1');
INSERT INTO `tbl_municipio` VALUES ('432', '23', '079', 'BUENAVISTA', '1');
INSERT INTO `tbl_municipio` VALUES ('433', '23', '090', 'CANALETE', '1');
INSERT INTO `tbl_municipio` VALUES ('434', '23', '162', 'CERETÉ', '1');
INSERT INTO `tbl_municipio` VALUES ('435', '23', '168', 'CHIMÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('436', '23', '182', 'CHINÚ', '1');
INSERT INTO `tbl_municipio` VALUES ('437', '23', '189', 'CIÉNAGA DE ORO', '1');
INSERT INTO `tbl_municipio` VALUES ('438', '23', '300', 'COTORRA', '1');
INSERT INTO `tbl_municipio` VALUES ('439', '23', '350', 'LA APARTADA', '1');
INSERT INTO `tbl_municipio` VALUES ('440', '23', '417', 'SANTA CRUZ DE LORICA', '1');
INSERT INTO `tbl_municipio` VALUES ('441', '23', '419', 'LOS CÓRDOBAS', '1');
INSERT INTO `tbl_municipio` VALUES ('442', '23', '464', 'MOMIL', '1');
INSERT INTO `tbl_municipio` VALUES ('443', '23', '466', 'MONTELÍBANO', '1');
INSERT INTO `tbl_municipio` VALUES ('444', '23', '500', 'MOÑITOS', '1');
INSERT INTO `tbl_municipio` VALUES ('445', '23', '555', 'PLANETA RICA', '1');
INSERT INTO `tbl_municipio` VALUES ('446', '23', '570', 'PUEBLO NUEVO', '1');
INSERT INTO `tbl_municipio` VALUES ('447', '23', '574', 'PUERTO ESCONDIDO', '1');
INSERT INTO `tbl_municipio` VALUES ('448', '23', '580', 'PUERTO LIBERTADOR', '1');
INSERT INTO `tbl_municipio` VALUES ('449', '23', '586', 'PURÍSIMA', '1');
INSERT INTO `tbl_municipio` VALUES ('450', '23', '660', 'SAHAGÚN', '1');
INSERT INTO `tbl_municipio` VALUES ('451', '23', '670', 'SAN ANDRÉS DE SOTAVENTO', '1');
INSERT INTO `tbl_municipio` VALUES ('452', '23', '672', 'SAN ANTERO', '1');
INSERT INTO `tbl_municipio` VALUES ('453', '23', '675', 'SAN BERNARDO DEL VIENTO', '1');
INSERT INTO `tbl_municipio` VALUES ('454', '23', '678', 'SAN CARLOS', '1');
INSERT INTO `tbl_municipio` VALUES ('455', '23', '682', 'SAN JOSÉ DE URÉ', '1');
INSERT INTO `tbl_municipio` VALUES ('456', '23', '686', 'SAN PELAYO', '1');
INSERT INTO `tbl_municipio` VALUES ('457', '23', '807', 'TIERRALTA', '1');
INSERT INTO `tbl_municipio` VALUES ('458', '23', '815', 'TUCHÍN', '1');
INSERT INTO `tbl_municipio` VALUES ('459', '23', '855', 'VALENCIA', '1');
INSERT INTO `tbl_municipio` VALUES ('460', '25', '001', 'AGUA DE DIOS', '1');
INSERT INTO `tbl_municipio` VALUES ('461', '25', '019', 'ALBÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('462', '25', '035', 'ANAPOIMA', '1');
INSERT INTO `tbl_municipio` VALUES ('463', '25', '040', 'ANOLAIMA', '1');
INSERT INTO `tbl_municipio` VALUES ('464', '25', '053', 'ARBELÁEZ', '1');
INSERT INTO `tbl_municipio` VALUES ('465', '25', '086', 'BELTRÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('466', '25', '095', 'BITUIMA', '1');
INSERT INTO `tbl_municipio` VALUES ('467', '25', '099', 'BOJACÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('468', '25', '120', 'CABRERA', '1');
INSERT INTO `tbl_municipio` VALUES ('469', '25', '123', 'CACHIPAY', '1');
INSERT INTO `tbl_municipio` VALUES ('470', '25', '126', 'CAJICÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('471', '25', '148', 'CAPARRAPÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('472', '25', '151', 'CÁQUEZA', '1');
INSERT INTO `tbl_municipio` VALUES ('473', '25', '154', 'CARMEN DE CARUPA', '1');
INSERT INTO `tbl_municipio` VALUES ('474', '25', '168', 'CHAGUANÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('475', '25', '175', 'CHÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('476', '25', '178', 'CHIPAQUE', '1');
INSERT INTO `tbl_municipio` VALUES ('477', '25', '181', 'CHOACHÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('478', '25', '183', 'CHOCONTÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('479', '25', '200', 'COGUA', '1');
INSERT INTO `tbl_municipio` VALUES ('480', '25', '214', 'COTA', '1');
INSERT INTO `tbl_municipio` VALUES ('481', '25', '224', 'CUCUNUBÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('482', '25', '245', 'EL COLEGIO', '1');
INSERT INTO `tbl_municipio` VALUES ('483', '25', '258', 'EL PEÑÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('484', '25', '260', 'EL ROSAL', '1');
INSERT INTO `tbl_municipio` VALUES ('485', '25', '269', 'FACATATIVÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('486', '25', '279', 'FÓMEQUE', '1');
INSERT INTO `tbl_municipio` VALUES ('487', '25', '281', 'FOSCA', '1');
INSERT INTO `tbl_municipio` VALUES ('488', '25', '286', 'FUNZA', '1');
INSERT INTO `tbl_municipio` VALUES ('489', '25', '288', 'FÚQUENE', '1');
INSERT INTO `tbl_municipio` VALUES ('490', '25', '290', 'FUSAGASUGÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('491', '25', '293', 'GACHALÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('492', '25', '295', 'GACHANCIPÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('493', '25', '297', 'GACHETÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('494', '25', '299', 'GAMA', '1');
INSERT INTO `tbl_municipio` VALUES ('495', '25', '307', 'GIRARDOT', '1');
INSERT INTO `tbl_municipio` VALUES ('496', '25', '312', 'GRANADA', '1');
INSERT INTO `tbl_municipio` VALUES ('497', '25', '317', 'GUACHETÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('498', '25', '320', 'GUADUAS', '1');
INSERT INTO `tbl_municipio` VALUES ('499', '25', '322', 'GUASCA', '1');
INSERT INTO `tbl_municipio` VALUES ('500', '25', '324', 'GUATAQUÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('501', '25', '326', 'GUATAVITA', '1');
INSERT INTO `tbl_municipio` VALUES ('502', '25', '328', 'GUAYABAL DE SÍQUIMA', '1');
INSERT INTO `tbl_municipio` VALUES ('503', '25', '335', 'GUAYABETAL', '1');
INSERT INTO `tbl_municipio` VALUES ('504', '25', '339', 'GUTIÉRREZ', '1');
INSERT INTO `tbl_municipio` VALUES ('505', '25', '368', 'JERUSALÉN', '1');
INSERT INTO `tbl_municipio` VALUES ('506', '25', '372', 'JUNÍN', '1');
INSERT INTO `tbl_municipio` VALUES ('507', '25', '377', 'LA CALERA', '1');
INSERT INTO `tbl_municipio` VALUES ('508', '25', '386', 'LA MESA', '1');
INSERT INTO `tbl_municipio` VALUES ('509', '25', '394', 'LA PALMA', '1');
INSERT INTO `tbl_municipio` VALUES ('510', '25', '398', 'LA PEÑA', '1');
INSERT INTO `tbl_municipio` VALUES ('511', '25', '402', 'LA VEGA', '1');
INSERT INTO `tbl_municipio` VALUES ('512', '25', '407', 'LENGUAZAQUE', '1');
INSERT INTO `tbl_municipio` VALUES ('513', '25', '426', 'MACHETÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('514', '25', '430', 'MADRID', '1');
INSERT INTO `tbl_municipio` VALUES ('515', '25', '436', 'MANTA', '1');
INSERT INTO `tbl_municipio` VALUES ('516', '25', '438', 'MEDINA', '1');
INSERT INTO `tbl_municipio` VALUES ('517', '25', '473', 'MOSQUERA', '1');
INSERT INTO `tbl_municipio` VALUES ('518', '25', '483', 'NARIÑO', '1');
INSERT INTO `tbl_municipio` VALUES ('519', '25', '486', 'NEMOCÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('520', '25', '488', 'NILO', '1');
INSERT INTO `tbl_municipio` VALUES ('521', '25', '489', 'NIMAIMA', '1');
INSERT INTO `tbl_municipio` VALUES ('522', '25', '491', 'NOCAIMA', '1');
INSERT INTO `tbl_municipio` VALUES ('523', '25', '506', 'VENECIA', '1');
INSERT INTO `tbl_municipio` VALUES ('524', '25', '513', 'PACHO', '1');
INSERT INTO `tbl_municipio` VALUES ('525', '25', '518', 'PAIME', '1');
INSERT INTO `tbl_municipio` VALUES ('526', '25', '524', 'PANDI', '1');
INSERT INTO `tbl_municipio` VALUES ('527', '25', '530', 'PARATEBUENO', '1');
INSERT INTO `tbl_municipio` VALUES ('528', '25', '535', 'PASCA', '1');
INSERT INTO `tbl_municipio` VALUES ('529', '25', '572', 'PUERTO SALGAR', '1');
INSERT INTO `tbl_municipio` VALUES ('530', '25', '580', 'PULÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('531', '25', '592', 'QUEBRADANEGRA', '1');
INSERT INTO `tbl_municipio` VALUES ('532', '25', '594', 'QUETAME', '1');
INSERT INTO `tbl_municipio` VALUES ('533', '25', '596', 'QUIPILE', '1');
INSERT INTO `tbl_municipio` VALUES ('534', '25', '599', 'APULO', '1');
INSERT INTO `tbl_municipio` VALUES ('535', '25', '612', 'RICAURTE', '1');
INSERT INTO `tbl_municipio` VALUES ('536', '25', '645', 'SAN ANTONIO DEL TEQUENDAMA', '1');
INSERT INTO `tbl_municipio` VALUES ('537', '25', '649', 'SAN BERNARDO', '1');
INSERT INTO `tbl_municipio` VALUES ('538', '25', '653', 'SAN CAYETANO', '1');
INSERT INTO `tbl_municipio` VALUES ('539', '25', '658', 'SAN FRANCISCO', '1');
INSERT INTO `tbl_municipio` VALUES ('540', '25', '662', 'SAN JUAN DE RIOSECO', '1');
INSERT INTO `tbl_municipio` VALUES ('541', '25', '718', 'SASAIMA', '1');
INSERT INTO `tbl_municipio` VALUES ('542', '25', '736', 'SESQUILÉ', '1');
INSERT INTO `tbl_municipio` VALUES ('543', '25', '740', 'SIBATÉ', '1');
INSERT INTO `tbl_municipio` VALUES ('544', '25', '743', 'SILVANIA', '1');
INSERT INTO `tbl_municipio` VALUES ('545', '25', '745', 'SIMIJACA', '1');
INSERT INTO `tbl_municipio` VALUES ('546', '25', '754', 'SOACHA', '1');
INSERT INTO `tbl_municipio` VALUES ('547', '25', '758', 'SOPÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('548', '25', '769', 'SUBACHOQUE', '1');
INSERT INTO `tbl_municipio` VALUES ('549', '25', '772', 'SUESCA', '1');
INSERT INTO `tbl_municipio` VALUES ('550', '25', '777', 'SUPATÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('551', '25', '779', 'SUSA', '1');
INSERT INTO `tbl_municipio` VALUES ('552', '25', '781', 'SUTATAUSA', '1');
INSERT INTO `tbl_municipio` VALUES ('553', '25', '785', 'TABIO', '1');
INSERT INTO `tbl_municipio` VALUES ('554', '25', '793', 'TAUSA', '1');
INSERT INTO `tbl_municipio` VALUES ('555', '25', '797', 'TENA', '1');
INSERT INTO `tbl_municipio` VALUES ('556', '25', '799', 'TENJO', '1');
INSERT INTO `tbl_municipio` VALUES ('557', '25', '805', 'TIBACUY', '1');
INSERT INTO `tbl_municipio` VALUES ('558', '25', '807', 'TIBIRITA', '1');
INSERT INTO `tbl_municipio` VALUES ('559', '25', '815', 'TOCAIMA', '1');
INSERT INTO `tbl_municipio` VALUES ('560', '25', '817', 'TOCANCIPÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('561', '25', '823', 'TOPAIPÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('562', '25', '839', 'UBALÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('563', '25', '841', 'UBAQUE', '1');
INSERT INTO `tbl_municipio` VALUES ('564', '25', '843', 'VILLA DE SAN DIEGO DE UBATÉ', '1');
INSERT INTO `tbl_municipio` VALUES ('565', '25', '845', 'UNE', '1');
INSERT INTO `tbl_municipio` VALUES ('566', '25', '851', 'ÚTICA', '1');
INSERT INTO `tbl_municipio` VALUES ('567', '25', '862', 'VERGARA', '1');
INSERT INTO `tbl_municipio` VALUES ('568', '25', '867', 'VIANÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('569', '25', '871', 'VILLAGÓMEZ', '1');
INSERT INTO `tbl_municipio` VALUES ('570', '25', '873', 'VILLAPINZÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('571', '25', '875', 'VILLETA', '1');
INSERT INTO `tbl_municipio` VALUES ('572', '25', '878', 'VIOTÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('573', '25', '885', 'YACOPÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('574', '25', '898', 'ZIPACÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('575', '25', '899', 'ZIPAQUIRÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('576', '27', '001', 'QUIBDÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('577', '27', '006', 'ACANDÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('578', '27', '025', 'ALTO BAUDÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('579', '27', '050', 'ATRATO', '1');
INSERT INTO `tbl_municipio` VALUES ('580', '27', '073', 'BAGADÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('581', '27', '075', 'BAHÍA SOLANO', '1');
INSERT INTO `tbl_municipio` VALUES ('582', '27', '077', 'BAJO BAUDÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('583', '27', '099', 'BOJAYÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('584', '27', '135', 'EL CANTÓN DE SAN PABLO', '1');
INSERT INTO `tbl_municipio` VALUES ('585', '27', '150', 'EL CARMEN DEL DARIÉN', '1');
INSERT INTO `tbl_municipio` VALUES ('586', '27', '160', 'CÉRTEGUI', '1');
INSERT INTO `tbl_municipio` VALUES ('587', '27', '205', 'CONDOTO', '1');
INSERT INTO `tbl_municipio` VALUES ('588', '27', '245', 'EL CARMEN DE ATRATO', '1');
INSERT INTO `tbl_municipio` VALUES ('589', '27', '250', 'EL LITORAL DE SAN JUAN', '1');
INSERT INTO `tbl_municipio` VALUES ('590', '27', '361', 'ISTMINA', '1');
INSERT INTO `tbl_municipio` VALUES ('591', '27', '372', 'JURADÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('592', '27', '413', 'LLORÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('593', '27', '425', 'MEDIO ATRATO', '1');
INSERT INTO `tbl_municipio` VALUES ('594', '27', '430', 'MEDIO BAUDÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('595', '27', '450', 'MEDIO SAN JUAN', '1');
INSERT INTO `tbl_municipio` VALUES ('596', '27', '491', 'NÓVITA', '1');
INSERT INTO `tbl_municipio` VALUES ('597', '27', '495', 'NUQUÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('598', '27', '580', 'RÍO IRÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('599', '27', '600', 'RÍO QUITO', '1');
INSERT INTO `tbl_municipio` VALUES ('600', '27', '615', 'RIOSUCIO', '1');
INSERT INTO `tbl_municipio` VALUES ('601', '27', '660', 'SAN JOSÉ DEL PALMAR', '1');
INSERT INTO `tbl_municipio` VALUES ('602', '27', '745', 'SIPÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('603', '27', '787', 'TADÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('604', '27', '800', 'UNGUÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('605', '27', '810', 'UNIÓN PANAMERICANA', '1');
INSERT INTO `tbl_municipio` VALUES ('606', '41', '001', 'NEIVA', '1');
INSERT INTO `tbl_municipio` VALUES ('607', '41', '006', 'ACEVEDO', '1');
INSERT INTO `tbl_municipio` VALUES ('608', '41', '013', 'AGRADO', '1');
INSERT INTO `tbl_municipio` VALUES ('609', '41', '016', 'AIPE', '1');
INSERT INTO `tbl_municipio` VALUES ('610', '41', '020', 'ALGECIRAS', '1');
INSERT INTO `tbl_municipio` VALUES ('611', '41', '026', 'ALTAMIRA', '1');
INSERT INTO `tbl_municipio` VALUES ('612', '41', '078', 'BARAYA', '1');
INSERT INTO `tbl_municipio` VALUES ('613', '41', '132', 'CAMPOALEGRE', '1');
INSERT INTO `tbl_municipio` VALUES ('614', '41', '206', 'COLOMBIA', '1');
INSERT INTO `tbl_municipio` VALUES ('615', '41', '244', 'ELÍAS', '1');
INSERT INTO `tbl_municipio` VALUES ('616', '41', '298', 'GARZÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('617', '41', '306', 'GIGANTE', '1');
INSERT INTO `tbl_municipio` VALUES ('618', '41', '319', 'GUADALUPE', '1');
INSERT INTO `tbl_municipio` VALUES ('619', '41', '349', 'HOBO', '1');
INSERT INTO `tbl_municipio` VALUES ('620', '41', '357', 'ÍQUIRA', '1');
INSERT INTO `tbl_municipio` VALUES ('621', '41', '359', 'ISNOS', '1');
INSERT INTO `tbl_municipio` VALUES ('622', '41', '378', 'LA ARGENTINA', '1');
INSERT INTO `tbl_municipio` VALUES ('623', '41', '396', 'LA PLATA', '1');
INSERT INTO `tbl_municipio` VALUES ('624', '41', '483', 'NÁTAGA', '1');
INSERT INTO `tbl_municipio` VALUES ('625', '41', '503', 'OPORAPA', '1');
INSERT INTO `tbl_municipio` VALUES ('626', '41', '518', 'PAICOL', '1');
INSERT INTO `tbl_municipio` VALUES ('627', '41', '524', 'PALERMO', '1');
INSERT INTO `tbl_municipio` VALUES ('628', '41', '530', 'PALESTINA', '1');
INSERT INTO `tbl_municipio` VALUES ('629', '41', '548', 'PITAL', '1');
INSERT INTO `tbl_municipio` VALUES ('630', '41', '551', 'PITALITO', '1');
INSERT INTO `tbl_municipio` VALUES ('631', '41', '615', 'RIVERA', '1');
INSERT INTO `tbl_municipio` VALUES ('632', '41', '660', 'SALADOBLANCO', '1');
INSERT INTO `tbl_municipio` VALUES ('633', '41', '668', 'SAN AGUSTÍN', '1');
INSERT INTO `tbl_municipio` VALUES ('634', '41', '676', 'SANTA MARÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('635', '41', '770', 'SUAZA', '1');
INSERT INTO `tbl_municipio` VALUES ('636', '41', '791', 'TARQUI', '1');
INSERT INTO `tbl_municipio` VALUES ('637', '41', '797', 'TESALIA', '1');
INSERT INTO `tbl_municipio` VALUES ('638', '41', '799', 'TELLO', '1');
INSERT INTO `tbl_municipio` VALUES ('639', '41', '801', 'TERUEL', '1');
INSERT INTO `tbl_municipio` VALUES ('640', '41', '807', 'TIMANÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('641', '41', '872', 'VILLAVIEJA', '1');
INSERT INTO `tbl_municipio` VALUES ('642', '41', '885', 'YAGUARÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('643', '44', '001', 'RIOHACHA', '1');
INSERT INTO `tbl_municipio` VALUES ('644', '44', '035', 'ALBANIA', '1');
INSERT INTO `tbl_municipio` VALUES ('645', '44', '078', 'BARRANCAS', '1');
INSERT INTO `tbl_municipio` VALUES ('646', '44', '090', 'DIBULLA', '1');
INSERT INTO `tbl_municipio` VALUES ('647', '44', '098', 'DISTRACCIÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('648', '44', '110', 'EL MOLINO', '1');
INSERT INTO `tbl_municipio` VALUES ('649', '44', '279', 'FONSECA', '1');
INSERT INTO `tbl_municipio` VALUES ('650', '44', '378', 'HATONUEVO', '1');
INSERT INTO `tbl_municipio` VALUES ('651', '44', '420', 'LA JAGUA DEL PILAR', '1');
INSERT INTO `tbl_municipio` VALUES ('652', '44', '430', 'MAICAO', '1');
INSERT INTO `tbl_municipio` VALUES ('653', '44', '560', 'MANAURE', '1');
INSERT INTO `tbl_municipio` VALUES ('654', '44', '650', 'SAN JUAN DEL CESAR', '1');
INSERT INTO `tbl_municipio` VALUES ('655', '44', '847', 'URIBIA', '1');
INSERT INTO `tbl_municipio` VALUES ('656', '44', '855', 'URUMITA', '1');
INSERT INTO `tbl_municipio` VALUES ('657', '44', '874', 'VILLANUEVA', '1');
INSERT INTO `tbl_municipio` VALUES ('658', '47', '001', 'SANTA MARTA', '1');
INSERT INTO `tbl_municipio` VALUES ('659', '47', '030', 'ALGARROBO', '1');
INSERT INTO `tbl_municipio` VALUES ('660', '47', '053', 'ARACATACA', '1');
INSERT INTO `tbl_municipio` VALUES ('661', '47', '058', 'ARIGUANÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('662', '47', '161', 'CERRO DE SAN ANTONIO', '1');
INSERT INTO `tbl_municipio` VALUES ('663', '47', '170', 'CHIBOLO', '1');
INSERT INTO `tbl_municipio` VALUES ('664', '47', '189', 'CIÉNAGA', '1');
INSERT INTO `tbl_municipio` VALUES ('665', '47', '205', 'CONCORDIA', '1');
INSERT INTO `tbl_municipio` VALUES ('666', '47', '245', 'EL BANCO', '1');
INSERT INTO `tbl_municipio` VALUES ('667', '47', '258', 'EL PIÑÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('668', '47', '268', 'EL RETÉN', '1');
INSERT INTO `tbl_municipio` VALUES ('669', '47', '288', 'FUNDACIÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('670', '47', '318', 'GUAMAL', '1');
INSERT INTO `tbl_municipio` VALUES ('671', '47', '460', 'NUEVA GRANADA', '1');
INSERT INTO `tbl_municipio` VALUES ('672', '47', '541', 'PEDRAZA', '1');
INSERT INTO `tbl_municipio` VALUES ('673', '47', '545', 'PIJIÑO DEL CARMEN', '1');
INSERT INTO `tbl_municipio` VALUES ('674', '47', '551', 'PIVIJAY', '1');
INSERT INTO `tbl_municipio` VALUES ('675', '47', '555', 'PLATO', '1');
INSERT INTO `tbl_municipio` VALUES ('676', '47', '570', 'PUEBLO VIEJO', '1');
INSERT INTO `tbl_municipio` VALUES ('677', '47', '605', 'REMOLINO', '1');
INSERT INTO `tbl_municipio` VALUES ('678', '47', '660', 'SABANAS DE SAN ANGEL', '1');
INSERT INTO `tbl_municipio` VALUES ('679', '47', '675', 'SALAMINA', '1');
INSERT INTO `tbl_municipio` VALUES ('680', '47', '692', 'SAN SEBASTIÁN DE BUENAVISTA', '1');
INSERT INTO `tbl_municipio` VALUES ('681', '47', '703', 'SAN ZENÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('682', '47', '707', 'SANTA ANA', '1');
INSERT INTO `tbl_municipio` VALUES ('683', '47', '720', 'SANTA BÁRBARA DE PINTO', '1');
INSERT INTO `tbl_municipio` VALUES ('684', '47', '745', 'SITIONUEVO', '1');
INSERT INTO `tbl_municipio` VALUES ('685', '47', '798', 'TENERIFE', '1');
INSERT INTO `tbl_municipio` VALUES ('686', '47', '960', 'ZAPAYÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('687', '47', '980', 'ZONA BANANERA', '1');
INSERT INTO `tbl_municipio` VALUES ('688', '50', '001', 'VILLAVICENCIO', '1');
INSERT INTO `tbl_municipio` VALUES ('689', '50', '006', 'ACACÍAS', '1');
INSERT INTO `tbl_municipio` VALUES ('690', '50', '110', 'BARRANCA DE UPÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('691', '50', '124', 'CABUYARO', '1');
INSERT INTO `tbl_municipio` VALUES ('692', '50', '150', 'CASTILLA LA NUEVA', '1');
INSERT INTO `tbl_municipio` VALUES ('693', '50', '223', 'CUBARRAL', '1');
INSERT INTO `tbl_municipio` VALUES ('694', '50', '226', 'CUMARAL', '1');
INSERT INTO `tbl_municipio` VALUES ('695', '50', '245', 'EL CALVARIO', '1');
INSERT INTO `tbl_municipio` VALUES ('696', '50', '251', 'EL CASTILLO', '1');
INSERT INTO `tbl_municipio` VALUES ('697', '50', '270', 'EL DORADO', '1');
INSERT INTO `tbl_municipio` VALUES ('698', '50', '287', 'FUENTE DE ORO', '1');
INSERT INTO `tbl_municipio` VALUES ('699', '50', '313', 'GRANADA', '1');
INSERT INTO `tbl_municipio` VALUES ('700', '50', '318', 'GUAMAL', '1');
INSERT INTO `tbl_municipio` VALUES ('701', '50', '325', 'MAPIRIPÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('702', '50', '330', 'MESETAS', '1');
INSERT INTO `tbl_municipio` VALUES ('703', '50', '350', 'LA MACARENA', '1');
INSERT INTO `tbl_municipio` VALUES ('704', '50', '370', 'LA URIBE', '1');
INSERT INTO `tbl_municipio` VALUES ('705', '50', '400', 'LEJANÍAS', '1');
INSERT INTO `tbl_municipio` VALUES ('706', '50', '450', 'PUERTO CONCORDIA', '1');
INSERT INTO `tbl_municipio` VALUES ('707', '50', '568', 'PUERTO GAITÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('708', '50', '573', 'PUERTO LÓPEZ', '1');
INSERT INTO `tbl_municipio` VALUES ('709', '50', '577', 'PUERTO LLERAS', '1');
INSERT INTO `tbl_municipio` VALUES ('710', '50', '590', 'PUERTO RICO', '1');
INSERT INTO `tbl_municipio` VALUES ('711', '50', '606', 'RESTREPO', '1');
INSERT INTO `tbl_municipio` VALUES ('712', '50', '680', 'SAN CARLOS DE GUAROA', '1');
INSERT INTO `tbl_municipio` VALUES ('713', '50', '683', 'SAN JUAN DE ARAMA', '1');
INSERT INTO `tbl_municipio` VALUES ('714', '50', '686', 'SAN JUANITO', '1');
INSERT INTO `tbl_municipio` VALUES ('715', '50', '689', 'SAN MARTÍN', '1');
INSERT INTO `tbl_municipio` VALUES ('716', '50', '711', 'VISTA HERMOSA', '1');
INSERT INTO `tbl_municipio` VALUES ('717', '52', '001', 'SAN JUAN DE PASTO', '1');
INSERT INTO `tbl_municipio` VALUES ('718', '52', '019', 'SAN JOSÉ DE ALBÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('719', '52', '022', 'ALDANA', '1');
INSERT INTO `tbl_municipio` VALUES ('720', '52', '036', 'ANCUYÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('721', '52', '051', 'ARBOLEDA', '1');
INSERT INTO `tbl_municipio` VALUES ('722', '52', '079', 'BARBACOAS', '1');
INSERT INTO `tbl_municipio` VALUES ('723', '52', '083', 'BELÉN', '1');
INSERT INTO `tbl_municipio` VALUES ('724', '52', '110', 'BUESACO', '1');
INSERT INTO `tbl_municipio` VALUES ('725', '52', '203', 'COLÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('726', '52', '207', 'CONSACÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('727', '52', '210', 'CONTADERO', '1');
INSERT INTO `tbl_municipio` VALUES ('728', '52', '215', 'CÓRDOBA', '1');
INSERT INTO `tbl_municipio` VALUES ('729', '52', '224', 'CUASPUD', '1');
INSERT INTO `tbl_municipio` VALUES ('730', '52', '227', 'CUMBAL', '1');
INSERT INTO `tbl_municipio` VALUES ('731', '52', '233', 'CUMBITARA', '1');
INSERT INTO `tbl_municipio` VALUES ('732', '52', '240', 'CHACHAGÜÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('733', '52', '250', 'EL CHARCO', '1');
INSERT INTO `tbl_municipio` VALUES ('734', '52', '254', 'EL PEÑOL', '1');
INSERT INTO `tbl_municipio` VALUES ('735', '52', '256', 'EL ROSARIO', '1');
INSERT INTO `tbl_municipio` VALUES ('736', '52', '258', 'EL TABLÓN DE GÓMEZ', '1');
INSERT INTO `tbl_municipio` VALUES ('737', '52', '260', 'EL TAMBO', '1');
INSERT INTO `tbl_municipio` VALUES ('738', '52', '287', 'FUNES', '1');
INSERT INTO `tbl_municipio` VALUES ('739', '52', '317', 'GUACHUCAL', '1');
INSERT INTO `tbl_municipio` VALUES ('740', '52', '320', 'GUAITARILLA', '1');
INSERT INTO `tbl_municipio` VALUES ('741', '52', '323', 'GUALMATÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('742', '52', '352', 'ILES', '1');
INSERT INTO `tbl_municipio` VALUES ('743', '52', '354', 'IMUÉS', '1');
INSERT INTO `tbl_municipio` VALUES ('744', '52', '356', 'IPIALES', '1');
INSERT INTO `tbl_municipio` VALUES ('745', '52', '378', 'LA CRUZ', '1');
INSERT INTO `tbl_municipio` VALUES ('746', '52', '381', 'LA FLORIDA', '1');
INSERT INTO `tbl_municipio` VALUES ('747', '52', '385', 'LA LLANADA', '1');
INSERT INTO `tbl_municipio` VALUES ('748', '52', '390', 'LA TOLA', '1');
INSERT INTO `tbl_municipio` VALUES ('749', '52', '399', 'LA UNIÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('750', '52', '405', 'LEIVA', '1');
INSERT INTO `tbl_municipio` VALUES ('751', '52', '411', 'LINARES', '1');
INSERT INTO `tbl_municipio` VALUES ('752', '52', '418', 'LOS ANDES', '1');
INSERT INTO `tbl_municipio` VALUES ('753', '52', '427', 'MAGÜÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('754', '52', '435', 'MALLAMA', '1');
INSERT INTO `tbl_municipio` VALUES ('755', '52', '473', 'MOSQUERA', '1');
INSERT INTO `tbl_municipio` VALUES ('756', '52', '480', 'NARIÑO', '1');
INSERT INTO `tbl_municipio` VALUES ('757', '52', '490', 'OLAYA HERRERA', '1');
INSERT INTO `tbl_municipio` VALUES ('758', '52', '506', 'OSPINA', '1');
INSERT INTO `tbl_municipio` VALUES ('759', '52', '520', 'FRANCISCO PIZARRO', '1');
INSERT INTO `tbl_municipio` VALUES ('760', '52', '540', 'POLICARPA', '1');
INSERT INTO `tbl_municipio` VALUES ('761', '52', '560', 'POTOSÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('762', '52', '565', 'PROVIDENCIA', '1');
INSERT INTO `tbl_municipio` VALUES ('763', '52', '573', 'PUERRES', '1');
INSERT INTO `tbl_municipio` VALUES ('764', '52', '585', 'PUPIALES', '1');
INSERT INTO `tbl_municipio` VALUES ('765', '52', '612', 'RICAURTE', '1');
INSERT INTO `tbl_municipio` VALUES ('766', '52', '621', 'ROBERTO PAYÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('767', '52', '678', 'SAMANIEGO', '1');
INSERT INTO `tbl_municipio` VALUES ('768', '52', '683', 'SANDONÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('769', '52', '685', 'SAN BERNARDO', '1');
INSERT INTO `tbl_municipio` VALUES ('770', '52', '687', 'SAN LORENZO', '1');
INSERT INTO `tbl_municipio` VALUES ('771', '52', '693', 'SAN PABLO', '1');
INSERT INTO `tbl_municipio` VALUES ('772', '52', '694', 'SAN PEDRO DE CARTAGO', '1');
INSERT INTO `tbl_municipio` VALUES ('773', '52', '696', 'SANTA BÁRBARA', '1');
INSERT INTO `tbl_municipio` VALUES ('774', '52', '699', 'SANTACRUZ', '1');
INSERT INTO `tbl_municipio` VALUES ('775', '52', '720', 'SAPUYES', '1');
INSERT INTO `tbl_municipio` VALUES ('776', '52', '786', 'TAMINANGO', '1');
INSERT INTO `tbl_municipio` VALUES ('777', '52', '788', 'TANGUA', '1');
INSERT INTO `tbl_municipio` VALUES ('778', '52', '835', 'SAN ANDRÉS DE TUMACO', '1');
INSERT INTO `tbl_municipio` VALUES ('779', '52', '838', 'TÚQUERRES', '1');
INSERT INTO `tbl_municipio` VALUES ('780', '52', '885', 'YACUANQUER', '1');
INSERT INTO `tbl_municipio` VALUES ('781', '54', '001', 'CÚCUTA', '1');
INSERT INTO `tbl_municipio` VALUES ('782', '54', '003', 'ABREGO', '1');
INSERT INTO `tbl_municipio` VALUES ('783', '54', '051', 'ARBOLEDAS', '1');
INSERT INTO `tbl_municipio` VALUES ('784', '54', '099', 'BOCHALEMA', '1');
INSERT INTO `tbl_municipio` VALUES ('785', '54', '109', 'BUCARASICA', '1');
INSERT INTO `tbl_municipio` VALUES ('786', '54', '125', 'CÁCHIRA', '1');
INSERT INTO `tbl_municipio` VALUES ('787', '54', '128', 'CÁCOTA', '1');
INSERT INTO `tbl_municipio` VALUES ('788', '54', '172', 'CHINÁCOTA', '1');
INSERT INTO `tbl_municipio` VALUES ('789', '54', '174', 'CHITAGÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('790', '54', '206', 'CONVENCIÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('791', '54', '223', 'CUCUTILLA', '1');
INSERT INTO `tbl_municipio` VALUES ('792', '54', '239', 'DURANÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('793', '54', '245', 'EL CARMEN', '1');
INSERT INTO `tbl_municipio` VALUES ('794', '54', '250', 'EL TARRA', '1');
INSERT INTO `tbl_municipio` VALUES ('795', '54', '261', 'EL ZULIA', '1');
INSERT INTO `tbl_municipio` VALUES ('796', '54', '313', 'GRAMALOTE', '1');
INSERT INTO `tbl_municipio` VALUES ('797', '54', '344', 'HACARÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('798', '54', '347', 'HERRÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('799', '54', '377', 'LABATECA', '1');
INSERT INTO `tbl_municipio` VALUES ('800', '54', '385', 'LA ESPERANZA', '1');
INSERT INTO `tbl_municipio` VALUES ('801', '54', '398', 'LA PLAYA DE BELÉN', '1');
INSERT INTO `tbl_municipio` VALUES ('802', '54', '405', 'LOS PATIOS', '1');
INSERT INTO `tbl_municipio` VALUES ('803', '54', '418', 'LOURDES', '1');
INSERT INTO `tbl_municipio` VALUES ('804', '54', '480', 'MUTISCUA', '1');
INSERT INTO `tbl_municipio` VALUES ('805', '54', '498', 'OCAÑA', '1');
INSERT INTO `tbl_municipio` VALUES ('806', '54', '518', 'PAMPLONA', '1');
INSERT INTO `tbl_municipio` VALUES ('807', '54', '520', 'PAMPLONITA', '1');
INSERT INTO `tbl_municipio` VALUES ('808', '54', '553', 'PUERTO SANTANDER', '1');
INSERT INTO `tbl_municipio` VALUES ('809', '54', '599', 'RAGONVALIA', '1');
INSERT INTO `tbl_municipio` VALUES ('810', '54', '660', 'SALAZAR DE LAS PALMAS', '1');
INSERT INTO `tbl_municipio` VALUES ('811', '54', '670', 'SAN CALIXTO', '1');
INSERT INTO `tbl_municipio` VALUES ('812', '54', '673', 'SAN CAYETANO', '1');
INSERT INTO `tbl_municipio` VALUES ('813', '54', '680', 'SANTIAGO', '1');
INSERT INTO `tbl_municipio` VALUES ('814', '54', '720', 'SARDINATA', '1');
INSERT INTO `tbl_municipio` VALUES ('815', '54', '743', 'SANTO DOMINGO DE SILOS', '1');
INSERT INTO `tbl_municipio` VALUES ('816', '54', '800', 'TEORAMA', '1');
INSERT INTO `tbl_municipio` VALUES ('817', '54', '810', 'TIBÚ', '1');
INSERT INTO `tbl_municipio` VALUES ('818', '54', '820', 'TOLEDO', '1');
INSERT INTO `tbl_municipio` VALUES ('819', '54', '871', 'VILLA CARO', '1');
INSERT INTO `tbl_municipio` VALUES ('820', '54', '874', 'VILLA DEL ROSARIO', '1');
INSERT INTO `tbl_municipio` VALUES ('821', '63', '001', 'ARMENIA', '1');
INSERT INTO `tbl_municipio` VALUES ('822', '63', '111', 'BUENAVISTA', '1');
INSERT INTO `tbl_municipio` VALUES ('823', '63', '130', 'CALARCÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('824', '63', '190', 'CIRCASIA', '1');
INSERT INTO `tbl_municipio` VALUES ('825', '63', '212', 'CÓRDOBA', '1');
INSERT INTO `tbl_municipio` VALUES ('826', '63', '272', 'FILANDIA', '1');
INSERT INTO `tbl_municipio` VALUES ('827', '63', '302', 'GÉNOVA', '1');
INSERT INTO `tbl_municipio` VALUES ('828', '63', '401', 'LA TEBAIDA', '1');
INSERT INTO `tbl_municipio` VALUES ('829', '63', '470', 'MONTENEGRO', '1');
INSERT INTO `tbl_municipio` VALUES ('830', '63', '548', 'PIJAO', '1');
INSERT INTO `tbl_municipio` VALUES ('831', '63', '594', 'QUIMBAYA', '1');
INSERT INTO `tbl_municipio` VALUES ('832', '63', '690', 'SALENTO', '1');
INSERT INTO `tbl_municipio` VALUES ('833', '66', '001', 'PEREIRA', '1');
INSERT INTO `tbl_municipio` VALUES ('834', '66', '045', 'APÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('835', '66', '075', 'BALBOA', '1');
INSERT INTO `tbl_municipio` VALUES ('836', '66', '088', 'BELÉN DE UMBRÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('837', '66', '170', 'DOSQUEBRADAS', '1');
INSERT INTO `tbl_municipio` VALUES ('838', '66', '318', 'GUATICA', '1');
INSERT INTO `tbl_municipio` VALUES ('839', '66', '383', 'LA CELIA', '1');
INSERT INTO `tbl_municipio` VALUES ('840', '66', '400', 'LA VIRGINIA', '1');
INSERT INTO `tbl_municipio` VALUES ('841', '66', '440', 'MARSELLA', '1');
INSERT INTO `tbl_municipio` VALUES ('842', '66', '456', 'MISTRATÓ', '1');
INSERT INTO `tbl_municipio` VALUES ('843', '66', '572', 'PUEBLO RICO', '1');
INSERT INTO `tbl_municipio` VALUES ('844', '66', '594', 'QUINCHÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('845', '66', '682', 'SANTA ROSA DE CABAL', '1');
INSERT INTO `tbl_municipio` VALUES ('846', '66', '687', 'SANTUARIO', '1');
INSERT INTO `tbl_municipio` VALUES ('847', '68', '001', 'BUCARAMANGA', '1');
INSERT INTO `tbl_municipio` VALUES ('848', '68', '013', 'AGUADA', '1');
INSERT INTO `tbl_municipio` VALUES ('849', '68', '020', 'ALBANIA', '1');
INSERT INTO `tbl_municipio` VALUES ('850', '68', '051', 'ARATOCA', '1');
INSERT INTO `tbl_municipio` VALUES ('851', '68', '077', 'BARBOSA', '1');
INSERT INTO `tbl_municipio` VALUES ('852', '68', '079', 'BARICHARA', '1');
INSERT INTO `tbl_municipio` VALUES ('853', '68', '081', 'BARRANCABERMEJA', '1');
INSERT INTO `tbl_municipio` VALUES ('854', '68', '092', 'BETULIA', '1');
INSERT INTO `tbl_municipio` VALUES ('855', '68', '101', 'BOLÍVAR', '1');
INSERT INTO `tbl_municipio` VALUES ('856', '68', '121', 'CABRERA', '1');
INSERT INTO `tbl_municipio` VALUES ('857', '68', '132', 'CALIFORNIA', '1');
INSERT INTO `tbl_municipio` VALUES ('858', '68', '147', 'CAPITANEJO', '1');
INSERT INTO `tbl_municipio` VALUES ('859', '68', '152', 'CARCASÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('860', '68', '160', 'CEPITÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('861', '68', '162', 'CERRITO', '1');
INSERT INTO `tbl_municipio` VALUES ('862', '68', '167', 'CHARALÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('863', '68', '169', 'CHARTA', '1');
INSERT INTO `tbl_municipio` VALUES ('864', '68', '176', 'CHIMA', '1');
INSERT INTO `tbl_municipio` VALUES ('865', '68', '179', 'CHIPATÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('866', '68', '190', 'CIMITARRA', '1');
INSERT INTO `tbl_municipio` VALUES ('867', '68', '207', 'CONCEPCIÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('868', '68', '209', 'CONFINES', '1');
INSERT INTO `tbl_municipio` VALUES ('869', '68', '211', 'CONTRATACIÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('870', '68', '217', 'COROMORO', '1');
INSERT INTO `tbl_municipio` VALUES ('871', '68', '229', 'CURITÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('872', '68', '235', 'EL CARMEN DE CHUCURÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('873', '68', '245', 'EL GUACAMAYO', '1');
INSERT INTO `tbl_municipio` VALUES ('874', '68', '250', 'EL PEÑÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('875', '68', '255', 'EL PLAYÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('876', '68', '264', 'ENCINO', '1');
INSERT INTO `tbl_municipio` VALUES ('877', '68', '266', 'ENCISO', '1');
INSERT INTO `tbl_municipio` VALUES ('878', '68', '271', 'FLORIÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('879', '68', '276', 'FLORIDABLANCA', '1');
INSERT INTO `tbl_municipio` VALUES ('880', '68', '296', 'GALÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('881', '68', '298', 'GÁMBITA', '1');
INSERT INTO `tbl_municipio` VALUES ('882', '68', '307', 'GIRÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('883', '68', '318', 'GUACA', '1');
INSERT INTO `tbl_municipio` VALUES ('884', '68', '320', 'GUADALUPE', '1');
INSERT INTO `tbl_municipio` VALUES ('885', '68', '322', 'GUAPOTÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('886', '68', '324', 'GUAVATÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('887', '68', '327', 'GÜEPSA', '1');
INSERT INTO `tbl_municipio` VALUES ('888', '68', '344', 'HATO', '1');
INSERT INTO `tbl_municipio` VALUES ('889', '68', '368', 'JESÚS MARÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('890', '68', '370', 'JORDÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('891', '68', '377', 'LA BELLEZA', '1');
INSERT INTO `tbl_municipio` VALUES ('892', '68', '385', 'LANDÁZURI', '1');
INSERT INTO `tbl_municipio` VALUES ('893', '68', '397', 'LA PAZ', '1');
INSERT INTO `tbl_municipio` VALUES ('894', '68', '406', 'LEBRIJA', '1');
INSERT INTO `tbl_municipio` VALUES ('895', '68', '418', 'LOS SANTOS', '1');
INSERT INTO `tbl_municipio` VALUES ('896', '68', '425', 'MACARAVITA', '1');
INSERT INTO `tbl_municipio` VALUES ('897', '68', '432', 'MÁLAGA', '1');
INSERT INTO `tbl_municipio` VALUES ('898', '68', '444', 'MATANZA', '1');
INSERT INTO `tbl_municipio` VALUES ('899', '68', '464', 'MOGOTES', '1');
INSERT INTO `tbl_municipio` VALUES ('900', '68', '468', 'MOLAGAVITA', '1');
INSERT INTO `tbl_municipio` VALUES ('901', '68', '498', 'OCAMONTE', '1');
INSERT INTO `tbl_municipio` VALUES ('902', '68', '500', 'OIBA', '1');
INSERT INTO `tbl_municipio` VALUES ('903', '68', '502', 'ONZAGA', '1');
INSERT INTO `tbl_municipio` VALUES ('904', '68', '522', 'PALMAR', '1');
INSERT INTO `tbl_municipio` VALUES ('905', '68', '524', 'PALMAS DEL SOCORRO', '1');
INSERT INTO `tbl_municipio` VALUES ('906', '68', '533', 'PÁRAMO', '1');
INSERT INTO `tbl_municipio` VALUES ('907', '68', '547', 'PIEDECUESTA', '1');
INSERT INTO `tbl_municipio` VALUES ('908', '68', '549', 'PINCHOTE', '1');
INSERT INTO `tbl_municipio` VALUES ('909', '68', '572', 'PUENTE NACIONAL', '1');
INSERT INTO `tbl_municipio` VALUES ('910', '68', '573', 'PUERTO PARRA', '1');
INSERT INTO `tbl_municipio` VALUES ('911', '68', '575', 'PUERTO WILCHES', '1');
INSERT INTO `tbl_municipio` VALUES ('912', '68', '615', 'RIONEGRO', '1');
INSERT INTO `tbl_municipio` VALUES ('913', '68', '655', 'SABANA DE TORRES', '1');
INSERT INTO `tbl_municipio` VALUES ('914', '68', '669', 'SAN ANDRÉS', '1');
INSERT INTO `tbl_municipio` VALUES ('915', '68', '673', 'SAN BENITO', '1');
INSERT INTO `tbl_municipio` VALUES ('916', '68', '679', 'SAN GIL', '1');
INSERT INTO `tbl_municipio` VALUES ('917', '68', '682', 'SAN JOAQUÍN', '1');
INSERT INTO `tbl_municipio` VALUES ('918', '68', '684', 'SAN JOSÉ DE MIRANDA', '1');
INSERT INTO `tbl_municipio` VALUES ('919', '68', '686', 'SAN MIGUEL', '1');
INSERT INTO `tbl_municipio` VALUES ('920', '68', '689', 'SAN VICENTE DE CHUCURÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('921', '68', '705', 'SANTA BÁRBARA', '1');
INSERT INTO `tbl_municipio` VALUES ('922', '68', '720', 'SANTA HELENA DEL OPÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('923', '68', '745', 'SIMACOTA', '1');
INSERT INTO `tbl_municipio` VALUES ('924', '68', '755', 'SOCORRO', '1');
INSERT INTO `tbl_municipio` VALUES ('925', '68', '770', 'SUAITA', '1');
INSERT INTO `tbl_municipio` VALUES ('926', '68', '773', 'SUCRE', '1');
INSERT INTO `tbl_municipio` VALUES ('927', '68', '780', 'SURATÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('928', '68', '820', 'TONA', '1');
INSERT INTO `tbl_municipio` VALUES ('929', '68', '855', 'VALLE DE SAN JOSÉ', '1');
INSERT INTO `tbl_municipio` VALUES ('930', '68', '861', 'VÉLEZ', '1');
INSERT INTO `tbl_municipio` VALUES ('931', '68', '867', 'VETAS', '1');
INSERT INTO `tbl_municipio` VALUES ('932', '68', '872', 'VILLANUEVA', '1');
INSERT INTO `tbl_municipio` VALUES ('933', '68', '895', 'ZAPATOCA', '1');
INSERT INTO `tbl_municipio` VALUES ('934', '70', '001', 'SINCELEJO', '1');
INSERT INTO `tbl_municipio` VALUES ('935', '70', '110', 'BUENAVISTA', '1');
INSERT INTO `tbl_municipio` VALUES ('936', '70', '124', 'CAIMITO', '1');
INSERT INTO `tbl_municipio` VALUES ('937', '70', '204', 'COLOSO', '1');
INSERT INTO `tbl_municipio` VALUES ('938', '70', '215', 'COROZAL', '1');
INSERT INTO `tbl_municipio` VALUES ('939', '70', '221', 'COVEÑAS', '1');
INSERT INTO `tbl_municipio` VALUES ('940', '70', '230', 'CHALÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('941', '70', '233', 'EL ROBLE', '1');
INSERT INTO `tbl_municipio` VALUES ('942', '70', '235', 'GALERAS', '1');
INSERT INTO `tbl_municipio` VALUES ('943', '70', '265', 'GUARANDA', '1');
INSERT INTO `tbl_municipio` VALUES ('944', '70', '400', 'LA UNIÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('945', '70', '418', 'LOS PALMITOS', '1');
INSERT INTO `tbl_municipio` VALUES ('946', '70', '429', 'MAJAGUAL', '1');
INSERT INTO `tbl_municipio` VALUES ('947', '70', '473', 'MORROA', '1');
INSERT INTO `tbl_municipio` VALUES ('948', '70', '508', 'OVEJAS', '1');
INSERT INTO `tbl_municipio` VALUES ('949', '70', '523', 'PALMITO', '1');
INSERT INTO `tbl_municipio` VALUES ('950', '70', '670', 'SAMPUÉS', '1');
INSERT INTO `tbl_municipio` VALUES ('951', '70', '678', 'SAN BENITO ABAD', '1');
INSERT INTO `tbl_municipio` VALUES ('952', '70', '702', 'SAN JUAN DE BETULIA', '1');
INSERT INTO `tbl_municipio` VALUES ('953', '70', '708', 'SAN MARCOS', '1');
INSERT INTO `tbl_municipio` VALUES ('954', '70', '713', 'SAN ONOFRE', '1');
INSERT INTO `tbl_municipio` VALUES ('955', '70', '717', 'SAN PEDRO', '1');
INSERT INTO `tbl_municipio` VALUES ('956', '70', '742', 'SAN LUIS DE SINCÉ', '1');
INSERT INTO `tbl_municipio` VALUES ('957', '70', '771', 'SUCRE', '1');
INSERT INTO `tbl_municipio` VALUES ('958', '70', '820', 'SANTIAGO DE TOLÚ', '1');
INSERT INTO `tbl_municipio` VALUES ('959', '70', '823', 'TOLÚVIEJO', '1');
INSERT INTO `tbl_municipio` VALUES ('960', '73', '001', 'IBAGUÉ', '1');
INSERT INTO `tbl_municipio` VALUES ('961', '73', '024', 'ALPUJARRA', '1');
INSERT INTO `tbl_municipio` VALUES ('962', '73', '026', 'ALVARADO', '1');
INSERT INTO `tbl_municipio` VALUES ('963', '73', '030', 'AMBALEMA', '1');
INSERT INTO `tbl_municipio` VALUES ('964', '73', '043', 'ANZOÁTEGUI', '1');
INSERT INTO `tbl_municipio` VALUES ('965', '73', '055', 'ARMERO', '1');
INSERT INTO `tbl_municipio` VALUES ('966', '73', '067', 'ATACO', '1');
INSERT INTO `tbl_municipio` VALUES ('967', '73', '124', 'CAJAMARCA', '1');
INSERT INTO `tbl_municipio` VALUES ('968', '73', '148', 'CARMEN DE APICALÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('969', '73', '152', 'CASABIANCA', '1');
INSERT INTO `tbl_municipio` VALUES ('970', '73', '168', 'CHAPARRAL', '1');
INSERT INTO `tbl_municipio` VALUES ('971', '73', '200', 'COELLO', '1');
INSERT INTO `tbl_municipio` VALUES ('972', '73', '217', 'COYAIMA', '1');
INSERT INTO `tbl_municipio` VALUES ('973', '73', '226', 'CUNDAY', '1');
INSERT INTO `tbl_municipio` VALUES ('974', '73', '236', 'DOLORES', '1');
INSERT INTO `tbl_municipio` VALUES ('975', '73', '268', 'ESPINAL', '1');
INSERT INTO `tbl_municipio` VALUES ('976', '73', '270', 'FALAN', '1');
INSERT INTO `tbl_municipio` VALUES ('977', '73', '275', 'FLANDES', '1');
INSERT INTO `tbl_municipio` VALUES ('978', '73', '283', 'FRESNO', '1');
INSERT INTO `tbl_municipio` VALUES ('979', '73', '319', 'GUAMO', '1');
INSERT INTO `tbl_municipio` VALUES ('980', '73', '347', 'HERVEO', '1');
INSERT INTO `tbl_municipio` VALUES ('981', '73', '349', 'HONDA', '1');
INSERT INTO `tbl_municipio` VALUES ('982', '73', '352', 'ICONONZO', '1');
INSERT INTO `tbl_municipio` VALUES ('983', '73', '408', 'LÉRIDA', '1');
INSERT INTO `tbl_municipio` VALUES ('984', '73', '411', 'LÍBANO', '1');
INSERT INTO `tbl_municipio` VALUES ('985', '73', '443', 'MARIQUITA', '1');
INSERT INTO `tbl_municipio` VALUES ('986', '73', '449', 'MELGAR', '1');
INSERT INTO `tbl_municipio` VALUES ('987', '73', '461', 'MURILLO', '1');
INSERT INTO `tbl_municipio` VALUES ('988', '73', '483', 'NATAGAIMA', '1');
INSERT INTO `tbl_municipio` VALUES ('989', '73', '504', 'ORTEGA', '1');
INSERT INTO `tbl_municipio` VALUES ('990', '73', '520', 'PALOCABILDO', '1');
INSERT INTO `tbl_municipio` VALUES ('991', '73', '547', 'PIEDRAS', '1');
INSERT INTO `tbl_municipio` VALUES ('992', '73', '555', 'PLANADAS', '1');
INSERT INTO `tbl_municipio` VALUES ('993', '73', '563', 'PRADO', '1');
INSERT INTO `tbl_municipio` VALUES ('994', '73', '585', 'PURIFICACIÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('995', '73', '616', 'RIOBLANCO', '1');
INSERT INTO `tbl_municipio` VALUES ('996', '73', '622', 'RONCESVALLES', '1');
INSERT INTO `tbl_municipio` VALUES ('997', '73', '624', 'ROVIRA', '1');
INSERT INTO `tbl_municipio` VALUES ('998', '73', '671', 'SALDAÑA', '1');
INSERT INTO `tbl_municipio` VALUES ('999', '73', '675', 'SAN ANTONIO', '1');
INSERT INTO `tbl_municipio` VALUES ('1000', '73', '678', 'SAN LUIS', '1');
INSERT INTO `tbl_municipio` VALUES ('1001', '73', '686', 'SANTA ISABEL', '1');
INSERT INTO `tbl_municipio` VALUES ('1002', '73', '770', 'SUÁREZ', '1');
INSERT INTO `tbl_municipio` VALUES ('1003', '73', '854', 'VALLE DE SAN JUAN', '1');
INSERT INTO `tbl_municipio` VALUES ('1004', '73', '861', 'VENADILLO', '1');
INSERT INTO `tbl_municipio` VALUES ('1005', '73', '870', 'VILLAHERMOSA', '1');
INSERT INTO `tbl_municipio` VALUES ('1006', '73', '873', 'VILLARRICA', '1');
INSERT INTO `tbl_municipio` VALUES ('1007', '76', '001', 'CALI', '1');
INSERT INTO `tbl_municipio` VALUES ('1008', '76', '020', 'ALCALÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('1009', '76', '036', 'ANDALUCÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('1010', '76', '041', 'ANSERMANUEVO', '1');
INSERT INTO `tbl_municipio` VALUES ('1011', '76', '054', 'ARGELIA', '1');
INSERT INTO `tbl_municipio` VALUES ('1012', '76', '100', 'BOLÍVAR', '1');
INSERT INTO `tbl_municipio` VALUES ('1013', '76', '109', 'BUENAVENTURA', '1');
INSERT INTO `tbl_municipio` VALUES ('1014', '76', '111', 'GUADALAJARA DE BUGA', '1');
INSERT INTO `tbl_municipio` VALUES ('1015', '76', '113', 'BUGALAGRANDE', '1');
INSERT INTO `tbl_municipio` VALUES ('1016', '76', '122', 'CAICEDONIA', '1');
INSERT INTO `tbl_municipio` VALUES ('1017', '76', '126', 'CALIMA', '1');
INSERT INTO `tbl_municipio` VALUES ('1018', '76', '130', 'CANDELARIA', '1');
INSERT INTO `tbl_municipio` VALUES ('1019', '76', '147', 'CARTAGO', '1');
INSERT INTO `tbl_municipio` VALUES ('1020', '76', '233', 'DAGUA', '1');
INSERT INTO `tbl_municipio` VALUES ('1021', '76', '243', 'EL ÁGUILA', '1');
INSERT INTO `tbl_municipio` VALUES ('1022', '76', '246', 'EL CAIRO', '1');
INSERT INTO `tbl_municipio` VALUES ('1023', '76', '248', 'EL CERRITO', '1');
INSERT INTO `tbl_municipio` VALUES ('1024', '76', '250', 'EL DOVIO', '1');
INSERT INTO `tbl_municipio` VALUES ('1025', '76', '275', 'FLORIDA', '1');
INSERT INTO `tbl_municipio` VALUES ('1026', '76', '306', 'GINEBRA', '1');
INSERT INTO `tbl_municipio` VALUES ('1027', '76', '318', 'GUACARÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('1028', '76', '364', 'JAMUNDÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('1029', '76', '377', 'LA CUMBRE', '1');
INSERT INTO `tbl_municipio` VALUES ('1030', '76', '400', 'LA UNIÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('1031', '76', '403', 'LA VICTORIA', '1');
INSERT INTO `tbl_municipio` VALUES ('1032', '76', '497', 'OBANDO', '1');
INSERT INTO `tbl_municipio` VALUES ('1033', '76', '520', 'PALMIRA', '1');
INSERT INTO `tbl_municipio` VALUES ('1034', '76', '563', 'PRADERA', '1');
INSERT INTO `tbl_municipio` VALUES ('1035', '76', '606', 'RESTREPO', '1');
INSERT INTO `tbl_municipio` VALUES ('1036', '76', '616', 'RIOFRÍO', '1');
INSERT INTO `tbl_municipio` VALUES ('1037', '76', '622', 'ROLDANILLO', '1');
INSERT INTO `tbl_municipio` VALUES ('1038', '76', '670', 'SAN PEDRO', '1');
INSERT INTO `tbl_municipio` VALUES ('1039', '76', '736', 'SEVILLA', '1');
INSERT INTO `tbl_municipio` VALUES ('1040', '76', '823', 'TORO', '1');
INSERT INTO `tbl_municipio` VALUES ('1041', '76', '828', 'TRUJILLO', '1');
INSERT INTO `tbl_municipio` VALUES ('1042', '76', '834', 'TULUÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('1043', '76', '845', 'ULLOA', '1');
INSERT INTO `tbl_municipio` VALUES ('1044', '76', '863', 'VERSALLES', '1');
INSERT INTO `tbl_municipio` VALUES ('1045', '76', '869', 'VIJES', '1');
INSERT INTO `tbl_municipio` VALUES ('1046', '76', '890', 'YOTOCO', '1');
INSERT INTO `tbl_municipio` VALUES ('1047', '76', '892', 'YUMBO', '1');
INSERT INTO `tbl_municipio` VALUES ('1048', '76', '895', 'ZARZAL', '1');
INSERT INTO `tbl_municipio` VALUES ('1049', '81', '001', 'ARAUCA', '1');
INSERT INTO `tbl_municipio` VALUES ('1050', '81', '065', 'ARAUQUITA', '1');
INSERT INTO `tbl_municipio` VALUES ('1051', '81', '220', 'CRAVO NORTE', '1');
INSERT INTO `tbl_municipio` VALUES ('1052', '81', '300', 'FORTUL', '1');
INSERT INTO `tbl_municipio` VALUES ('1053', '81', '591', 'PUERTO RONDÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('1054', '81', '736', 'SARAVENA', '1');
INSERT INTO `tbl_municipio` VALUES ('1055', '81', '794', 'TAME', '1');
INSERT INTO `tbl_municipio` VALUES ('1056', '85', '001', 'YOPAL', '1');
INSERT INTO `tbl_municipio` VALUES ('1057', '85', '010', 'AGUAZUL', '1');
INSERT INTO `tbl_municipio` VALUES ('1058', '85', '015', 'CHÁMEZA', '1');
INSERT INTO `tbl_municipio` VALUES ('1059', '85', '125', 'HATO COROZAL', '1');
INSERT INTO `tbl_municipio` VALUES ('1060', '85', '136', 'LA SALINA', '1');
INSERT INTO `tbl_municipio` VALUES ('1061', '85', '139', 'MANÍ', '1');
INSERT INTO `tbl_municipio` VALUES ('1062', '85', '162', 'MONTERREY', '1');
INSERT INTO `tbl_municipio` VALUES ('1063', '85', '225', 'NUNCHÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('1064', '85', '230', 'OROCUÉ', '1');
INSERT INTO `tbl_municipio` VALUES ('1065', '85', '250', 'PAZ DE ARIPORO', '1');
INSERT INTO `tbl_municipio` VALUES ('1066', '85', '263', 'PORE', '1');
INSERT INTO `tbl_municipio` VALUES ('1067', '85', '279', 'RECETOR', '1');
INSERT INTO `tbl_municipio` VALUES ('1068', '85', '300', 'SABANALARGA', '1');
INSERT INTO `tbl_municipio` VALUES ('1069', '85', '315', 'SÁCAMA', '1');
INSERT INTO `tbl_municipio` VALUES ('1070', '85', '325', 'SAN LUIS DE PALENQUE', '1');
INSERT INTO `tbl_municipio` VALUES ('1071', '85', '400', 'TÁMARA', '1');
INSERT INTO `tbl_municipio` VALUES ('1072', '85', '410', 'TAURAMENA', '1');
INSERT INTO `tbl_municipio` VALUES ('1073', '85', '430', 'TRINIDAD', '1');
INSERT INTO `tbl_municipio` VALUES ('1074', '85', '440', 'VILLANUEVA', '1');
INSERT INTO `tbl_municipio` VALUES ('1075', '86', '001', 'MOCOA', '1');
INSERT INTO `tbl_municipio` VALUES ('1076', '86', '219', 'COLÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('1077', '86', '320', 'ORITO', '1');
INSERT INTO `tbl_municipio` VALUES ('1078', '86', '568', 'PUERTO ASÍS', '1');
INSERT INTO `tbl_municipio` VALUES ('1079', '86', '569', 'PUERTO CAICEDO', '1');
INSERT INTO `tbl_municipio` VALUES ('1080', '86', '571', 'PUERTO GUZMÁN', '1');
INSERT INTO `tbl_municipio` VALUES ('1081', '86', '573', 'PUERTO LEGUIZAMO', '1');
INSERT INTO `tbl_municipio` VALUES ('1082', '86', '749', 'SIBUNDOY', '1');
INSERT INTO `tbl_municipio` VALUES ('1083', '86', '755', 'SAN FRANCISCO', '1');
INSERT INTO `tbl_municipio` VALUES ('1084', '86', '757', 'SAN MIGUEL', '1');
INSERT INTO `tbl_municipio` VALUES ('1085', '86', '760', 'SANTIAGO', '1');
INSERT INTO `tbl_municipio` VALUES ('1086', '86', '865', 'VALLE DEL GUAMUEZ', '1');
INSERT INTO `tbl_municipio` VALUES ('1087', '86', '885', 'VILLA GARZÓN', '1');
INSERT INTO `tbl_municipio` VALUES ('1088', '88', '001', 'SAN ANDRÉS', '1');
INSERT INTO `tbl_municipio` VALUES ('1089', '88', '564', 'PROVIDENCIA Y SANTA CATALINA', '1');
INSERT INTO `tbl_municipio` VALUES ('1090', '91', '001', 'LETICIA', '1');
INSERT INTO `tbl_municipio` VALUES ('1091', '91', '263', 'EL ENCANTO', '1');
INSERT INTO `tbl_municipio` VALUES ('1092', '91', '405', 'LA CHORRERA', '1');
INSERT INTO `tbl_municipio` VALUES ('1093', '91', '407', 'LA PEDRERA', '1');
INSERT INTO `tbl_municipio` VALUES ('1094', '91', '430', 'LA VICTORIA', '1');
INSERT INTO `tbl_municipio` VALUES ('1095', '91', '460', 'MIRITÍ-PARANÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('1096', '91', '530', 'PUERTO ALEGRÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('1097', '91', '536', 'PUERTO ARICA', '1');
INSERT INTO `tbl_municipio` VALUES ('1098', '91', '540', 'PUERTO NARIÑO', '1');
INSERT INTO `tbl_municipio` VALUES ('1099', '91', '669', 'PUERTO SANTANDER', '1');
INSERT INTO `tbl_municipio` VALUES ('1100', '91', '798', 'TARAPACÁ', '1');
INSERT INTO `tbl_municipio` VALUES ('1101', '94', '001', 'INÍRIDA', '1');
INSERT INTO `tbl_municipio` VALUES ('1102', '94', '343', 'BARRANCOMINAS', '1');
INSERT INTO `tbl_municipio` VALUES ('1103', '94', '663', 'MAPIRIPANA', '1');
INSERT INTO `tbl_municipio` VALUES ('1104', '94', '883', 'SAN FELIPE', '1');
INSERT INTO `tbl_municipio` VALUES ('1105', '94', '884', 'PUERTO COLOMBIA', '1');
INSERT INTO `tbl_municipio` VALUES ('1106', '94', '885', 'LA GUADALUPE', '1');
INSERT INTO `tbl_municipio` VALUES ('1107', '94', '886', 'CACAHUAL', '1');
INSERT INTO `tbl_municipio` VALUES ('1108', '94', '887', 'PANA PANA', '1');
INSERT INTO `tbl_municipio` VALUES ('1109', '94', '888', 'MORICHAL NUEVO', '1');
INSERT INTO `tbl_municipio` VALUES ('1110', '95', '001', 'SAN JOSÉ DEL GUAVIARE', '1');
INSERT INTO `tbl_municipio` VALUES ('1111', '95', '015', 'CALAMAR', '1');
INSERT INTO `tbl_municipio` VALUES ('1112', '95', '025', 'EL RETORNO', '1');
INSERT INTO `tbl_municipio` VALUES ('1113', '95', '200', 'MIRAFLORES', '1');
INSERT INTO `tbl_municipio` VALUES ('1114', '97', '001', 'MITÚ', '1');
INSERT INTO `tbl_municipio` VALUES ('1115', '97', '161', 'CARURÚ', '1');
INSERT INTO `tbl_municipio` VALUES ('1116', '97', '511', 'PACOA', '1');
INSERT INTO `tbl_municipio` VALUES ('1117', '97', '666', 'TARAIRA', '1');
INSERT INTO `tbl_municipio` VALUES ('1118', '97', '777', 'PAPUNAUA', '1');
INSERT INTO `tbl_municipio` VALUES ('1119', '97', '889', 'YAVARATÉ', '1');
INSERT INTO `tbl_municipio` VALUES ('1120', '99', '001', 'PUERTO CARREÑO', '1');
INSERT INTO `tbl_municipio` VALUES ('1121', '99', '524', 'LA PRIMAVERA', '1');
INSERT INTO `tbl_municipio` VALUES ('1122', '99', '624', 'SANTA ROSALÍA', '1');
INSERT INTO `tbl_municipio` VALUES ('1123', '99', '773', 'CUMARIBO', '1');

-- ----------------------------
-- Table structure for tbl_participante
-- ----------------------------
DROP TABLE IF EXISTS `tbl_participante`;
CREATE TABLE `tbl_participante` (
  `part_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '		',
  `parti_imagen` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `parti_nombreempresa` varchar(45) COLLATE utf8_bin NOT NULL COMMENT '	',
  `parti_nit` varchar(45) COLLATE utf8_bin NOT NULL,
  `parti_nom_represantante` varchar(45) COLLATE utf8_bin NOT NULL,
  `parti_direccion` varchar(60) COLLATE utf8_bin NOT NULL,
  `parti_departamento` varchar(2) COLLATE utf8_bin NOT NULL,
  `parti_ciudad` int(11) NOT NULL COMMENT '	',
  `parti_email` varchar(45) COLLATE utf8_bin NOT NULL,
  `parti_telefono` varchar(45) COLLATE utf8_bin NOT NULL,
  `parti_celular` varchar(45) COLLATE utf8_bin NOT NULL,
  `parti_fax` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `parti_web` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `parti_ntrabajadores` varchar(45) COLLATE utf8_bin NOT NULL,
  `parti_sector` int(11) NOT NULL,
  PRIMARY KEY (`part_id`),
  UNIQUE KEY `rueda_nombreempresa_UNIQUE` (`parti_nombreempresa`),
  KEY `fk01_partisector` (`parti_sector`),
  KEY `fk_tbl_partidepart` (`parti_departamento`),
  KEY `fk_partimuni` (`parti_ciudad`),
  CONSTRAINT `fk01_partisector` FOREIGN KEY (`parti_sector`) REFERENCES `tbl_sectoremp` (`sec_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_partimuni` FOREIGN KEY (`parti_ciudad`) REFERENCES `tbl_municipio` (`mun_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tbl_participante
-- ----------------------------
INSERT INTO `tbl_participante` VALUES ('1', '/images/linux', 'linux', '1232535', 'tux', '12342556', '05', '1', 'ajklasjkl@jalkjdaklj', '1233456', '4555', '234892468976', 'alkdjajld@aljdlaj.com', '123', '14');
INSERT INTO `tbl_participante` VALUES ('2', '/images/lkjlñjkh', 'lkjlñjkh', 'lkj', 'klj', 'lkj', '11', '149', 'ajlñkaj@jaldajkl', '2134124234', '5555', '41242', 'alkjfalkdjkl.comaskldfjalkjf', '2', '13');
INSERT INTO `tbl_participante` VALUES ('3', '/images/hucamaya', 'hucamaya', '44123', 'lito paralta', 'cfar4 66b', '54', '805', 'dfdf@łsfrsdf', '1123123', '', '45454545', 'www.clim.com', '12', '14');
INSERT INTO `tbl_participante` VALUES ('4', '/images/kghfjfhg', 'kghfjfhg', 'gfdhdgh', 'dfdfdf', 'sdsdfsf', '54', '797', 'sdgfdfghdh', '47545', '4545', '78545fhyj', 'dgfrsdg', '12', '15');
INSERT INTO `tbl_participante` VALUES ('5', '/images/camilo', 'camilo', '45555', 'camilo celiooo', 'dgfsh', '54', '798', 'rgfgdfddf', '564', 'sasas', 'asas', 'gfhfhfh', '150', '14');
INSERT INTO `tbl_participante` VALUES ('6', '/images/fdssdf', 'fdssdf', '8544754', 'dfdfdfd', 'erererer', '54', '797', 'fddfdfd', '564545', '4545454', '4545', 'fgfdf', '150', '14');
INSERT INTO `tbl_participante` VALUES ('7', '/images/ererer', 'ererer', '4545454', 'sfdsff', 'sdfsefsf', '50', '706', 'gfgfgf', '545454', '454545', '4545454', 'dffdfd', '1-10', '13');
INSERT INTO `tbl_participante` VALUES ('8', '/images/dedede', 'dedede', '454545', 'faddfa', 'dfdafd', '08', '140', 'sdsdsds', '88787878', '78787878', '8787878', 'sdfsfsdf', '1-10', '14');
INSERT INTO `tbl_participante` VALUES ('10', '/images/sssas', 'sssas', '4444565', 'wrwarw', 'wt', '50', '702', 'ajklasjkl@jalkjdaklj', '547647', '4545', '234892468976', 'sdfsfsdf', '1-10', '7');
INSERT INTO `tbl_participante` VALUES ('11', '/images/raertrwt', 'raertrwt', '477777877', 'erererer', 'ererere', '11', '149', 'fdfdfdfdfdfd', '75678857', '7878787', '787878', 'fddgf', '1-10', '8');
INSERT INTO `tbl_participante` VALUES ('12', '/images/vivir', 'vivir', '8945584', 'sebastian alvarez', 'car34 no 85-69', '15', '215', 'sabaduuu@hotmail.com', '5256987454', '3112565978', '7898854563', 'www.vivir.com', '0', '9');
INSERT INTO `tbl_participante` VALUES ('14', '/images/hulaaaa', 'hulaaaa', '789456458', 'lili montoya', 'gfhshf', '11', '149', 'fssfdf', '58985656', '5656565', '565655', 'dfdgffg', 'Female', '11');
INSERT INTO `tbl_participante` VALUES ('15', '/images/zxfsdfg', 'zxfsdfg', '55656565', 'gdgg', 'gffhfh', '52', '717', 'fhgffh', '56454', '452355', '45646454', 'xvdgd', 'Female', '14');
INSERT INTO `tbl_participante` VALUES ('16', '/images/bbbb', 'bbbb', '44444444999', 'ddddddddd', 'ddddddddddd', '63', '821', 'ddddddddddddddddd', '55555555555', '55555555', '555555555555', 'dddddddddddd', '11-25', '12');
INSERT INTO `tbl_participante` VALUES ('17', '/images/rrrrrrrr', 'rrrrrrrr', '333333333', 'rrrrrrrrrrrrrrrrrrrrr', 'rrrrrrrrrrrrrrrr', '41', '606', 'rrrrrrrrrrrrrrrrrrr', '33333333333333', '3333333333333', '33333333', 'rrrrrrrrrrrrrrrrrrrrrr', '50-100', '14');
INSERT INTO `tbl_participante` VALUES ('18', '/images/gfhgh', 'gfhgh', '4545', 'dgdsfg', 'dgrsdg', '54', '781', 'dgdfgf', '7845', '5454', 'zcs<c', 'zs<fszdf', 'Mas de 100', '14');
INSERT INTO `tbl_participante` VALUES ('19', '/images/nologo.jpg', 'giterre', '147777', 'plas', 'sss', '05', '1', 'sss', '4444', '4444', '4444', 'ffff', '26-50', '13');
INSERT INTO `tbl_participante` VALUES ('21', '/images/yuyuyuyuyu', 'yuyuyuyuyu', '5445596969', 'jujujujuj', 'jujujuj', '52', '717', 'jujujuj', '141414', '414141', '444444444', 'jujuju', '50-100', '10');
INSERT INTO `tbl_participante` VALUES ('22', '/images/sd', 'sd', '544444', 'ds', 's', '63', '823', 'sabaduuu@hotmail.com', 'efrse', 'sds', 'mjmj', 'jjj', '50-100', '14');
INSERT INTO `tbl_participante` VALUES ('23', '/images/tropico de cancer', 'tropico de cancer', '14898989', 'marta blandon', 'Carr34 #45-54', '20', '405', 'sabaduuu@hotmail.com', '14253666', '66565656', '', '', '26-50', '13');
INSERT INTO `tbl_participante` VALUES ('24', '/images/ss', 'ss', 'sss', 'ss', 'ss', '54', '781', 'ss@dd.com', 'ss', 'sss', 'ss', 'sss', '26-50', '16');
INSERT INTO `tbl_participante` VALUES ('25', '/images/ll', 'll', '1221', 'ererer', 'kilo', '25', '460', 'weew@gfg.co', '88787878', '7676', '767', '', '50-100', '15');
INSERT INTO `tbl_participante` VALUES ('26', '/images/nologo.jpg', 'alguna', '321456978', '35143543514534', '12po12', '05', '1', 'alejo.jko@abc.com', '3645867786', '654647867687', '', '', '1-10', '7');
INSERT INTO `tbl_participante` VALUES ('27', '/images/gyug', 'gyug', '6786', '68768', '876876', '05', '1', 'jgjhg@hotmail.es', '446', '64654', '5465', '65465', '26-50', '8');
INSERT INTO `tbl_participante` VALUES ('28', '/images/prueba1', 'prueba1', '5467890', 'tolis', 'asdfasdfasdf lkja sdf', '05', '1', 'asdfasd@dfasdfas.com', '4523452345', '345234523425', '34523452345', '', '1-10', '15');

-- ----------------------------
-- Table structure for tbl_producto
-- ----------------------------
DROP TABLE IF EXISTS `tbl_producto`;
CREATE TABLE `tbl_producto` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_producto` varchar(60) COLLATE utf8_bin NOT NULL,
  `prod_descripcion` varchar(120) COLLATE utf8_bin DEFAULT NULL,
  `prod_sector` int(11) NOT NULL,
  `parti_id` int(11) NOT NULL,
  `prod_estado` varchar(45) COLLATE utf8_bin DEFAULT '1',
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `fk_prudusuario` (`parti_id`),
  KEY `fk_prodtip` (`id_categoria`),
  KEY `fk_prodcategoria` (`id_categoria`),
  KEY `fk_prodsector` (`prod_sector`),
  CONSTRAINT `fk_prodcategoria` FOREIGN KEY (`id_categoria`) REFERENCES `tbl_categoria` (`cate_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_prodsector` FOREIGN KEY (`prod_sector`) REFERENCES `tbl_sectoremp` (`sec_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_prudusuario` FOREIGN KEY (`parti_id`) REFERENCES `tbl_participante` (`part_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tbl_producto
-- ----------------------------
INSERT INTO `tbl_producto` VALUES ('29', 'akljakljaljk', 'klalkjalkjlkj', '7', '26', '1', '1');
INSERT INTO `tbl_producto` VALUES ('30', 'hngfhfgh', 'fghgfhgfh', '8', '27', '1', '1');
INSERT INTO `tbl_producto` VALUES ('31', 'fghgfhfgh', 'fghfgh', '8', '27', '1', '1');
INSERT INTO `tbl_producto` VALUES ('32', 'dfsdfsdf', 'sdfsdfsdf', '9', '27', '1', '2');

-- ----------------------------
-- Table structure for tbl_productoparticipante
-- ----------------------------
DROP TABLE IF EXISTS `tbl_productoparticipante`;
CREATE TABLE `tbl_productoparticipante` (
  `pp_id` int(11) NOT NULL AUTO_INCREMENT,
  `parti_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  PRIMARY KEY (`pp_id`),
  KEY `fk_pp_participante` (`parti_id`),
  KEY `fk_pp_producto` (`prod_id`),
  CONSTRAINT `fk_pp_participante` FOREIGN KEY (`parti_id`) REFERENCES `tbl_participante` (`part_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pp_producto` FOREIGN KEY (`prod_id`) REFERENCES `tbl_producto` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tbl_productoparticipante
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_registro
-- ----------------------------
DROP TABLE IF EXISTS `tbl_registro`;
CREATE TABLE `tbl_registro` (
  `registro_id` int(11) NOT NULL AUTO_INCREMENT,
  `rueda_id` int(11) NOT NULL,
  `parti_id` int(11) NOT NULL,
  PRIMARY KEY (`registro_id`),
  KEY `fk_rueda-registro` (`rueda_id`),
  KEY `fk_paric-registro` (`parti_id`),
  CONSTRAINT `fk_paric?registro` FOREIGN KEY (`parti_id`) REFERENCES `tbl_participante` (`part_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rueda?registro` FOREIGN KEY (`rueda_id`) REFERENCES `tbl_ruedanegocios` (`rueda_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tbl_registro
-- ----------------------------
INSERT INTO `tbl_registro` VALUES ('1', '1', '1');
INSERT INTO `tbl_registro` VALUES ('2', '1', '2');
INSERT INTO `tbl_registro` VALUES ('3', '1', '3');
INSERT INTO `tbl_registro` VALUES ('4', '1', '26');
INSERT INTO `tbl_registro` VALUES ('5', '1', '27');
INSERT INTO `tbl_registro` VALUES ('6', '1', '28');

-- ----------------------------
-- Table structure for tbl_rol
-- ----------------------------
DROP TABLE IF EXISTS `tbl_rol`;
CREATE TABLE `tbl_rol` (
  `rol_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `rol_name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `rol_estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`rol_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tbl_rol
-- ----------------------------
INSERT INTO `tbl_rol` VALUES ('1', 'Administrador', '');
INSERT INTO `tbl_rol` VALUES ('2', 'Organizador', '');
INSERT INTO `tbl_rol` VALUES ('3', 'Participante', '');

-- ----------------------------
-- Table structure for tbl_ruedanegocios
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ruedanegocios`;
CREATE TABLE `tbl_ruedanegocios` (
  `rueda_id` int(11) NOT NULL AUTO_INCREMENT,
  `rueda_fechaCreacion` date NOT NULL,
  `rueda_fechainiregistro` datetime NOT NULL,
  `rueda_fechafinregistro` datetime NOT NULL,
  `rueda_descripcion` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `dep_id` varchar(45) COLLATE utf8_bin NOT NULL,
  `rueda_diaEvento` date NOT NULL,
  `rueda_tiempocita` time NOT NULL,
  `rueda_horinicio` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rueda_horfin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rueda_estado` bit(1) NOT NULL DEFAULT b'1',
  `rueda_tiempoinduccion` timestamp NULL DEFAULT NULL,
  `rueda_horinicioalmuerzo` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rueda_horfinalmuerzo` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`rueda_id`),
  KEY `fk_rueda-departamento` (`dep_id`),
  CONSTRAINT `fk_rueda?departamento` FOREIGN KEY (`dep_id`) REFERENCES `tbl_departamento` (`dep_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tbl_ruedanegocios
-- ----------------------------
INSERT INTO `tbl_ruedanegocios` VALUES ('1', '2013-08-22', '2013-08-22 00:00:00', '2013-08-26 00:00:00', 'rueda de negocios agosto 2013', '05', '2013-08-28', '00:20:00', '2013-07-31 08:00:00', '2013-07-31 17:00:00', '', '2013-06-30 00:40:00', '2013-06-30 12:00:00', '2013-06-30 13:00:00');
INSERT INTO `tbl_ruedanegocios` VALUES ('2', '2013-08-22', '2013-08-23 00:00:00', '2013-08-27 00:00:00', 'esta muy buen purochocuanos', '05', '2013-07-31', '00:40:00', '2013-07-31 11:05:27', '2013-07-30 17:29:32', '', '2013-07-30 00:30:00', '2013-07-30 15:29:32', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for tbl_sectoremp
-- ----------------------------
DROP TABLE IF EXISTS `tbl_sectoremp`;
CREATE TABLE `tbl_sectoremp` (
  `sec_id` int(11) NOT NULL AUTO_INCREMENT,
  `sec_nombre` varchar(60) COLLATE utf8_bin NOT NULL,
  `sec_estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`sec_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tbl_sectoremp
-- ----------------------------
INSERT INTO `tbl_sectoremp` VALUES ('7', 'Servicios metalmecánicos, repuestos, accesorios', '1');
INSERT INTO `tbl_sectoremp` VALUES ('8', 'Textiles, confeccion, diseño y moda', '1');
INSERT INTO `tbl_sectoremp` VALUES ('9', 'Restaurantes, hoteleria y turismo', '1');
INSERT INTO `tbl_sectoremp` VALUES ('10', 'Productos químicos, farmaceuticos y de limpieza', '1');
INSERT INTO `tbl_sectoremp` VALUES ('11', 'Servicios empresariales', '1');
INSERT INTO `tbl_sectoremp` VALUES ('12', 'Industrias creativas y culturales', '1');
INSERT INTO `tbl_sectoremp` VALUES ('13', 'Desarrollo de software y TI', '1');
INSERT INTO `tbl_sectoremp` VALUES ('14', 'Construcción', '1');
INSERT INTO `tbl_sectoremp` VALUES ('15', 'Servicios en salud', '1');
INSERT INTO `tbl_sectoremp` VALUES ('16', 'Producción de alimentos procesados', '1');

-- ----------------------------
-- Table structure for tbl_usuario
-- ----------------------------
DROP TABLE IF EXISTS `tbl_usuario`;
CREATE TABLE `tbl_usuario` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '		',
  `user_identificacion` varchar(30) COLLATE utf8_bin NOT NULL,
  `user_nombre` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `user_apellidos` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `user_fecnac` date DEFAULT NULL,
  `user_telefono` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  `user_celular` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `user_direccion` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_username` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `user_passwd` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `rol_codigo` int(11) DEFAULT NULL,
  `user_estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_perfil` (`rol_codigo`),
  CONSTRAINT `fk_perfil` FOREIGN KEY (`rol_codigo`) REFERENCES `tbl_rol` (`rol_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tbl_usuario
-- ----------------------------
INSERT INTO `tbl_usuario` VALUES ('1', '123456789', 'Lalo', 'Lamnda', '1986-10-05', '45678945', '3212154878', 'Av Siempre Viva 123', 'cosa@cosa.com', 'lalo', 'lamnda', '2', '');
