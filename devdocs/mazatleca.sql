/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : mazatleca

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2013-03-17 22:04:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cms_categorias_publicaciones`
-- ----------------------------
DROP TABLE IF EXISTS `cms_categorias_publicaciones`;
CREATE TABLE `cms_categorias_publicaciones` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nombre` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_categorias_publicaciones
-- ----------------------------
INSERT INTO `cms_categorias_publicaciones` VALUES ('1', 'Programacion');
INSERT INTO `cms_categorias_publicaciones` VALUES ('2', 'Diseño Web');
INSERT INTO `cms_categorias_publicaciones` VALUES ('3', 'Seguridad');
INSERT INTO `cms_categorias_publicaciones` VALUES ('4', 'Marketing');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_publicaciones
-- ----------------------------
INSERT INTO `cms_publicaciones` VALUES ('1', 'Te va a gustar JsFiddle', '<img src=\"https://github.com/jsfiddle/jsfiddle-chrome-app/diff_blob/9121ec0c9bcbbaa3b7c5c5c6767f9273ea8d71ea/media/screenshot-logo.png?raw=true\" style=\"float: left; margin: 0px 10px 10px 0px; width: 352px; height: 242px;\" alt=\"\">Me gusta encontrar herramientas web como esta, desde que la encontre formï¿½ parte de mi trabajo diario, gracias a este par: Piotr y Oskar, ya publicare en otro post que mas tienen por ahi estos dos personajes.\n<div>Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;Lorem Ipsum Dolor Sit Ame.&nbsp;</div>', '2013-03-16 09:14:39', 'Cesar Octavio', '1', '1');
INSERT INTO `cms_publicaciones` VALUES ('12', 'Esta es mi nueva publicacion desde el cms', 'Y claro aqui esta el contenido;<img src=\"http://blogs.microsoft.co.il/blogs/gilf/CSS3Logo_406A9E5E.jpg\" style=\"float: right; margin: 0px 0px 10px 10px;\" alt=\"\">&nbsp;&nbsp;Y claro aqui esta el contenido;Y claro aqui esta el contenido;Y claro aqui esta el', '2013-03-17 18:20:22', null, null, null);
INSERT INTO `cms_publicaciones` VALUES ('13', 'estos vatos', '<span style=\"line-height: 1.45em;vertical-align: top;\"><iframe width=\"560\" height=\"315\" src=\"http://www.youtube.com/embed/GUw8KuGzHWQ\" frameborder=\"0\" allowfullscreen=\"\" style=\"float: left; margin: 0px 10px 10px 0px;\"></iframe>She opens her case, starts putting together her instrument. \"Joe studied at a conservatory inÂ </span><i style=\"line-height: 1.45em;\">Fronce</i><span style=\"line-height: 1.45em;\">. Did he tell you?\" Of course she doesn\'t sayÂ </span><i style=\"line-height: 1.45em;\">France</i><span style=\"line-height: 1.45em;\">Â so it rhymes with dance like a normal English-speaking human being. I can feel Sarah bristling beside me. She has zero tolerance for Rachel ever since she got first chair over me, but Sarah doesnâ€˜t know what really happened â€” no one does.</span><p>Rachel\'s tightening the ligature on her mouthpiece like she\'s trying to asphyxiate her clarinet. \"Joe was aÂ <i>fabulous</i>Â second in your absence.\" she says, drawing out the wordÂ <i>fabulous</i>Â from here to the Eiffel Tower.</p><p>I don\'t fire-breathe at her: \"Glad everything worked out for you, Rachel.\" I don\'t say a word, just wish I could curl into a ball and roll away. Sarah, on the other hand, looks like she wishes there were a battle-ax handy.</p><p>The room has become a clamor of random notes and scales. \"Finish up tuning, I want to start at the bell today,\" Mr. James calls from theÂ piano. \"And take out your pencils. lâ€™ve made some changes to the arrangement.\"</p><p></p>\n					', '2013-03-17 18:45:06', null, '1', '1');

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
