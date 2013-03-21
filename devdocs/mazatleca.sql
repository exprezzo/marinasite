/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : mazatleca

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2013-03-21 15:23:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cms_categorias_publicaciones`
-- ----------------------------
DROP TABLE IF EXISTS `cms_categorias_publicaciones`;
CREATE TABLE `cms_categorias_publicaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_categorias_publicaciones
-- ----------------------------
INSERT INTO `cms_categorias_publicaciones` VALUES ('1', 'Programacion');
INSERT INTO `cms_categorias_publicaciones` VALUES ('2', 'Diseño Web');
INSERT INTO `cms_categorias_publicaciones` VALUES ('3', 'Seguridad');
INSERT INTO `cms_categorias_publicaciones` VALUES ('4', 'Marketing');
INSERT INTO `cms_categorias_publicaciones` VALUES ('5', 'Entretenimiento');
INSERT INTO `cms_categorias_publicaciones` VALUES ('6', 'Gaming');

-- ----------------------------
-- Table structure for `cms_menus`
-- ----------------------------
DROP TABLE IF EXISTS `cms_menus`;
CREATE TABLE `cms_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` char(25) NOT NULL,
  `target` char(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_menus
-- ----------------------------
INSERT INTO `cms_menus` VALUES ('1', 'Home', 'home');
INSERT INTO `cms_menus` VALUES ('2', 'Acerca de', 'about');
INSERT INTO `cms_menus` VALUES ('3', 'Projects', 'projects');
INSERT INTO `cms_menus` VALUES ('4', 'Contacto', 'contacs');
INSERT INTO `cms_menus` VALUES ('5', 'Site Map', 'sitemap');

-- ----------------------------
-- Table structure for `cms_paginas`
-- ----------------------------
DROP TABLE IF EXISTS `cms_paginas`;
CREATE TABLE `cms_paginas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto_menu` char(255) DEFAULT NULL,
  `contenido` blob NOT NULL,
  `orden` int(11) unsigned DEFAULT NULL,
  `codigo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_paginas
-- ----------------------------
INSERT INTO `cms_paginas` VALUES ('1', 'home', 0x3C703E0A093C666F6E7420636F6C6F723D5C22236666303030305C223E3C7370616E207374796C653D5C22666F6E742D73697A653A20343770783B5C223E3C696D6720616C743D5C22706C6179615C22207372633D5C22687474703A2F2F7777772E69666F6E646F732E6E65742F77702D636F6E74656E742F75706C6F6164732F323031312F31322F506C6179615F7061726164697369616361312D353530783431322E6A70675C22207374796C653D5C2277696474683A2032303070783B206865696768743A2031353070783B206D617267696E3A203070743B20626F726465722D77696474683A203070743B20626F726465722D7374796C653A20736F6C69643B666C6F61743A6C6566743B5C22202F3E3C7370616E207374796C653D5C22666F6E742D73697A653A323270783B5C223E4D617A61746C6563612E20266971756573743B517565206573203C2F7370616E3E3C2F7370616E3E3C2F666F6E743E3C7370616E207374796C653D5C22666F6E742D73697A653A323270783B5C223E3C7370616E207374796C653D5C22636F6C6F723A2072676228302C203132382C2030293B5C223E6573746F203C2F7370616E3E3C666F6E7420636F6C6F723D5C22236666303030305C223E6465206D617A61746C6563613F3C2F666F6E743E3C2F7370616E3E3C2F703E0A3C703E0A09657320756E612074656D706C61746520656E636F6E747261646F20656E20696E7465726E65743C2F703E0A3C703E0A09657320756E20636D732061206C61206D65646964613C2F703E0A3C703E0A09266E6273703B3C2F703E0A, '1', 'page_1');
INSERT INTO `cms_paginas` VALUES ('2', 'Docs', 0x3C703E0A093C7370616E207374796C653D5C22666F6E742D73697A653A343870783B5C223E3C7370616E207374796C653D5C22636F6C6F723A233030666630303B5C223E3C7370616E207374796C653D5C226261636B67726F756E642D636F6C6F723A2072676228302C203132382C2030293B205C223E443C2F7370616E3E3C2F7370616E3E6F633C7370616E207374796C653D5C22636F6C6F723A233266346634663B5C223E3C7370616E207374796C653D5C226261636B67726F756E642D636F6C6F723A20726762283233382C203133302C20323338293B205C223E756D656E3C2F7370616E3E3C2F7370616E3E746163696F6E206465206D617A61746C6563613C2F7370616E3E3C2F703E0A, '2', 'page_2');
INSERT INTO `cms_paginas` VALUES ('3', 'Download', 0x3C703E0A093C7370616E207374796C653D5C22666F6E742D73697A653A343870783B5C223E446573636172676120656C20636F6469676F206675656E7465206465736465203C7370616E207374796C653D5C22636F6C6F723A236164643865363B5C223E3C7370616E207374796C653D5C226261636B67726F756E642D636F6C6F723A207267622837352C20302C20313330293B205C223E4769744875623C2F7370616E3E3C2F7370616E3E3C2F7370616E3E3C2F703E0A, '3', 'page_3');
INSERT INTO `cms_paginas` VALUES ('4', 'Contacto', 0x3C703E0A093C7370616E207374796C653D5C22666F6E742D73697A653A343870783B5C223E496E666F726D6163696F6E20646520636F6E746163746F3C2F7370616E3E3C2F703E0A, '4', 'page_4');
INSERT INTO `cms_paginas` VALUES ('5', 'Help', 0x3C703E0A093C7370616E207374796C653D5C22666F6E742D73697A653A343870783B5C223E45737461206573206C612070266161637574653B67696E61206465203C7370616E207374796C653D5C22636F6C6F723A236666303030303B5C223E3C7370616E207374796C653D5C226261636B67726F756E642D636F6C6F723A233030383030303B5C223E61797564613C2F7370616E3E3C2F7370616E3E3C2F7370616E3E3C2F703E0A, '5', 'page_5');
INSERT INTO `cms_paginas` VALUES ('6', 'Administrar', 0x3C703E0A093C6120687265663D5C22687474703A2F2F6D617A61746C6563612F6D656E752F696E6465782E68746D6C5C223E496E696369616C20656C20434D533C2F613E3C2F703E0A, '2147483647', 'page_6');

-- ----------------------------
-- Table structure for `cms_publicaciones`
-- ----------------------------
DROP TABLE IF EXISTS `cms_publicaciones`;
CREATE TABLE `cms_publicaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` char(255) DEFAULT NULL,
  `contenido` text,
  `fecha` datetime DEFAULT NULL,
  `autor` char(255) DEFAULT NULL,
  `fk_autor` int(11) DEFAULT NULL,
  `fk_categoria` int(11) DEFAULT NULL,
  `enPortada` tinyint(1) DEFAULT NULL,
  `imagen` char(255) DEFAULT NULL,
  `posx` int(11) DEFAULT NULL,
  `posy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_publicaciones
-- ----------------------------
INSERT INTO `cms_publicaciones` VALUES ('1', 'Te va a gustar JsFiddle..', '<img src=\"https://github.com/jsfiddle/jsfiddle-chrome-app/diff_blob/9121ec0c9bcbbaa3b7c5c5c6767f9273ea8d71ea/media/screenshot-logo.png?raw=true\" style=\"float: left; margin: 0px 10px 10px 0px; width: 352px; height: 242px;\" alt=\"\"><p>Si, apenas me doy cuenta de que JSFIDDLE es la onda, si les gusta la programación o el diseño web, no te pierdas de esta herramienta.</p>\n', '2013-03-16 09:14:39', 'Cesar Octavio', '1', '2', '1', 'http://doc.jsfiddle.net/_downloads/jsfiddle-desktop-1440x900-a.png', '582', '507');
INSERT INTO `cms_publicaciones` VALUES ('3', 'Ã¡lbum de The Beatles, cumple 50 aÃ±os', '<p><img src=\"http://blu.stb.s-msn.com/i/0A/DC9A2B8D5EECC15245FFB643CC15.jpg\" style=\"float: left; margin: 0px 10px 10px 0px;\" alt=\"\">Londres, 21 mar (EFE).- \"Please Please Me\", el á á primer disco de la banda británica The Beatles que supuso un antes y un después en la historia de la música, celebra mañana el 50 aniversario de su publicación, con temas imborrables como \"Twist And Shout\" o \"P.S. I Love You\".</p><p>Catorce canciones componen el álbum debut del cuarteto de Liverpool que dio origen a la \"Beatlemanía\" y cambió las vidas de John Lennon, Paul McCartney, George Harrison y Ringo Starr.</p><p>La salida comercial de \"Please Please Me\" siguió los éxitos del sencillo homónimo y de \"Love Me Do\", que los \"Fabulosos Cuatro\" interpretaban en directo en el mítico local \"The Cavern\" de su ciudad natal, Liverpool.</p><p>El disco trepó por las listas de ventas y el 11 de mayo de 1963 alcanzó el número uno en el Reino Unido, posición que conservó durante 30 semanas hasta ser desbancado precisamente por el segundo trabajo del cuarteto, \"With The Beatles\".</p><p>El emblemático estudio londinense Abbey Road, lugar de peregrinación para los seguidores de la banda, fue el escenario de la grabación de \"Please Please Me\" como lo sería posteriormente de \"Sgt. Pepper\'s Lonely Hearts Club Band\" o \"The White Album\", entre otros.</p><p>El 11 de febrero de 1963, el productor George Martin, apodado \"el quinto beatle\", reunió a Lennon, McCartney, Harrison y Starr para una maratoniana sesión de grabación que se alargaría 585 minutos, es decir, 9 horas y 45 minutos.</p><p>Ese día, la banda británica grabó diez canciones de \"Please Please Me\" a pesar del resfriado de John Lennon, que sentía la garganta dolorida y como \"papel de lija\".</p><p>Por temor a no concluir el disco si el músico y compositor perdía la voz, se dejó la canción \"Twist And Shout\" para el final de la intensa sesión, que había comenzado a las diez de la mañana con el tema \"There\'s A Place\".</p><p>Tras trece tomas, los músicos prosiguieron con \"I Saw Her Standing There\" y \"Hold Me Tight\", finalmente desechada para el primer álbum pero que se incluyó en su segundo disco.</p><p>Lennon puso voz a la mayoría de los temas que se grabaron en Abbey Road, si bien McCartney se le sumó en \"Misery\" y George Harrison se estrenó en \"Do You Want To Know a Secret\" y \"Chains\".</p><p>El batería, Ringo Starr, que se había incorporado a la banda en 1962 propuesto por George Martin, dejó las baquetas por el micrófono en una canción, \"Boys\", inaugurando una tradición que se mantendría hasta el último álbum de The Beatles, \"Abbey Road\".</p><p>En términos económicos, \"Please Please Me\" no pudo ser más rentable puesto que sólo costó 400 libras (468 euros), una cifra pequeña si se compara con el presupuesto de 75.000 dólares (58.000 euros) de \"Sgt. Pepper\'s\" en 1967.</p><p>El fotógrafo Angus McBean se encargó de la portada del disco, en la que se ve a los \"Fabulosos Cuatro\" en las escaleras de la sede londinense de la compañía discográfica EMI, una imagen que recrearon de nuevo para la portada de \"Get Back\" (1969).</p><p>\"Please Please Me\" (1963) fue el comienzo de una carrera de doce álbumes de estudio que The Beatles sacaron al mercado desde su nacimiento oficial en 1962 hasta el 10 de abril de 1970, cuando McCartney informó de la separación de la banda en un comunicado.</p><p>Medio siglo después, canciones como \"Twist And Shout\" o \"I Saw You Standing There\" siguen conquistando a los seguidores del grupo que mantiene el honor de ser el que más discos ha vendido en la historia, un récord estimado en alrededor de mil millones de copias.</p><p>Por Paula Díaz</p><p>Copyright (c) Agencia EFE, S.A. 2011, todos los derechos reservados</p>\n										', '2013-03-21 09:35:49', 'Zesar X', '1', '5', null, 'http://www.wallpaper4me.com/images/wallpapers/thebeatles-181393.jpeg', '270', '414');

-- ----------------------------
-- Table structure for `system_users`
-- ----------------------------
DROP TABLE IF EXISTS `system_users`;
CREATE TABLE `system_users` (
  `nick` char(255) NOT NULL,
  `pass` blob,
  `email` char(255) NOT NULL,
  `rol` int(11) DEFAULT '1',
  `fbid` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL DEFAULT '0',
  `picture` varchar(255) DEFAULT NULL,
  `originalName` char(255) DEFAULT NULL,
  `bio` varchar(150) DEFAULT NULL,
  `allowFavorites` tinyint(1) DEFAULT '1',
  `allowShared` tinyint(1) DEFAULT '1',
  `allowLiked` tinyint(1) DEFAULT '1',
  `keepLoged` tinyint(1) DEFAULT '0',
  `request` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nick` (`nick`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system_users
-- ----------------------------
INSERT INTO `system_users` VALUES ('zesar1', 0x1E398E80A894F4559B8CB0E74C8BEBBA, 'cbibriesca@hotmail.com', '2', null, '1', 'Zesar X', 'pic_1.jpg', 'retro_blue_background.jpg', 'sdfas ad asdasd a dasd ad asd asd asd asd as asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd  as as as dasd sad asd asd asd asd asd asd as', '0', '1', '1', '1', '1355958733');
INSERT INTO `system_users` VALUES ('cesarx', 0x1E398E80A894F4559B8CB0E74C8BEBBA, 'cesar@correo.com', '1', null, '2', '0', null, null, 'asdf', '1', '1', '1', '1', null);
INSERT INTO `system_users` VALUES ('asdfasdf', 0x1E398E80A894F4559B8CB0E74C8BEBBA, 'asd@asd.com', '1', null, '3', '0', null, null, 'asdf', '1', '1', '1', '1', null);
INSERT INTO `system_users` VALUES ('username', 0x1E398E80A894F4559B8CB0E74C8BEBBA, 'asdf@sadf.com', '1', null, '5', 'name', null, null, 'asdf', '1', '1', '1', '1', null);
INSERT INTO `system_users` VALUES ('asd', 0x7F1300B33D82209DB71110F778FA07C4, '', '1', null, '16', '0', null, null, null, '1', '1', '1', '0', null);
