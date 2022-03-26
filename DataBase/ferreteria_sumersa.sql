-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-03-2022 a las 06:14:46
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ferreteria_sumersa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `DUI` varchar(125) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Apellido` varchar(255) NOT NULL,
  `Telefono` varchar(255) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Clave` varchar(255) NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Verificado` int(1) NOT NULL DEFAULT '0',
  `Hash_Active` varchar(100) NOT NULL,
  PRIMARY KEY (`DUI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`DUI`, `Nombre`, `Apellido`, `Telefono`, `Correo`, `Clave`, `Direccion`, `Verificado`, `Hash_Active`) VALUES
('12345678-9', 'Jony', 'Lopez', '7005-9988', 'jj@gmail.com', '$2y$10$.pmNtBClNzlICB3h31VlD.FayXlYiyO4jrj9J.eSbsrjVb26/Pqm.', 'Ciudad Delgado, San Salvador', 1, '95bf5763251f491480a0c1e5b76a16d8'),
('9-87654321', 'Justo', 'Lopez', '7755-4433', 'jl@gmail.com', '$2y$10$.pmNtBClNzlICB3h31VlD.FayXlYiyO4jrj9J.eSbsrjVb26/Pqm.', 'Ciudad Delgado, SS', 1, '95bf5763251f491480a0c1e5b76a16d8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

DROP TABLE IF EXISTS `detalle`;
CREATE TABLE IF NOT EXISTS `detalle` (
  `ID_Detalle` varchar(8) NOT NULL,
  `ID_Tiket` varchar(8) NOT NULL,
  `ID_Precio` varchar(8) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Total` float(10,2) NOT NULL,
  PRIMARY KEY (`ID_Detalle`),
  KEY `ID_Tiket` (`ID_Tiket`),
  KEY `ID_Precio` (`ID_Precio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

DROP TABLE IF EXISTS `familia`;
CREATE TABLE IF NOT EXISTS `familia` (
  `ID_Familia` varchar(8) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`ID_Familia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `familia`
--

INSERT INTO `familia` (`ID_Familia`, `Nombre`) VALUES
('F094', 'FERRETERIA'),
('F153', 'TECHO'),
('F251', 'PINTURA'),
('F315', 'FOTANERIA'),
('F856', 'ELECTRICO'),
('F899', 'CONSTRUCCIÓN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

DROP TABLE IF EXISTS `pago`;
CREATE TABLE IF NOT EXISTS `pago` (
  `ID_Pago` varchar(8) NOT NULL,
  `Tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Pago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio_cantidad`
--

DROP TABLE IF EXISTS `precio_cantidad`;
CREATE TABLE IF NOT EXISTS `precio_cantidad` (
  `ID_PC` varchar(8) NOT NULL,
  `Precio_ST` float(10,2) DEFAULT NULL,
  `Precio_SS` float(10,2) DEFAULT NULL,
  `Precio_LO` float(10,2) DEFAULT NULL,
  `Precio_OP` float(10,2) DEFAULT NULL,
  `Precio_ZA` float(10,2) DEFAULT NULL,
  `Precio_SA` float(10,2) DEFAULT NULL,
  `Cantidad_ST` int(11) DEFAULT NULL,
  `Cantidad_SS` int(11) DEFAULT NULL,
  `Cantidad_LO` int(11) DEFAULT NULL,
  `Cantidad_OP` int(11) DEFAULT NULL,
  `Cantidad_ZA` int(11) DEFAULT NULL,
  `Cantidad_SA` int(11) DEFAULT NULL,
  `ID_Producto` varchar(11) NOT NULL,
  PRIMARY KEY (`ID_PC`),
  KEY `ID_Producto` (`ID_Producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `precio_cantidad`
--

INSERT INTO `precio_cantidad` (`ID_PC`, `Precio_ST`, `Precio_SS`, `Precio_LO`, `Precio_OP`, `Precio_ZA`, `Precio_SA`, `Cantidad_ST`, `Cantidad_SS`, `Cantidad_LO`, `Cantidad_OP`, `Cantidad_ZA`, `Cantidad_SA`, `ID_Producto`) VALUES
('PC005', NULL, NULL, NULL, 10.78, NULL, NULL, NULL, NULL, NULL, 345, NULL, NULL, 'PROD18408'),
('PC018', NULL, NULL, NULL, 46.00, NULL, NULL, NULL, NULL, NULL, 23, NULL, NULL, 'PROD22359'),
('PC148', 1.56, NULL, NULL, 1.58, NULL, NULL, 100, NULL, NULL, 56, NULL, NULL, 'PROD58697'),
('PC170', 21.19, NULL, NULL, 21.19, NULL, NULL, 123, NULL, NULL, 45, NULL, NULL, 'PROD50074'),
('PC408', NULL, NULL, NULL, 16.75, NULL, NULL, NULL, NULL, NULL, 55, NULL, NULL, 'PROD50917'),
('PC454', NULL, NULL, NULL, NULL, NULL, 40.51, NULL, NULL, NULL, NULL, NULL, 34, 'PROD31994'),
('PC491', NULL, NULL, NULL, 14.69, NULL, NULL, NULL, NULL, NULL, 134, NULL, NULL, 'PROD56442'),
('PC523', NULL, 5.47, NULL, NULL, NULL, NULL, NULL, 34, NULL, NULL, NULL, NULL, 'PROD69310'),
('PC539', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PROD75390'),
('PC542', NULL, 12.50, NULL, NULL, NULL, NULL, NULL, 56, NULL, NULL, NULL, NULL, 'PROD12063'),
('PC636', NULL, NULL, NULL, 1.17, NULL, NULL, NULL, NULL, NULL, 44, NULL, NULL, 'PROD80888'),
('PC689', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PROD56908'),
('PC707', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PROD66492'),
('PC732', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PROD34734'),
('PC794', NULL, NULL, NULL, 0.67, NULL, NULL, NULL, NULL, NULL, 45, NULL, NULL, 'PROD94622'),
('PC806', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PROD36833'),
('PC907', NULL, NULL, NULL, 26.53, NULL, NULL, NULL, NULL, NULL, 678, NULL, NULL, 'PROD85309'),
('PC983', NULL, NULL, NULL, NULL, NULL, 17.96, NULL, NULL, NULL, NULL, NULL, 23, 'PROD42816');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `ID_Producto` varchar(11) NOT NULL,
  `Descripcion` varchar(1000) NOT NULL,
  `Nombrep` varchar(1000) NOT NULL,
  `Imagen` varchar(15) NOT NULL,
  `ID_Familia` varchar(8) NOT NULL,
  PRIMARY KEY (`ID_Producto`),
  KEY `ID_Familia` (`ID_Familia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_Producto`, `Descripcion`, `Nombrep`, `Imagen`, `ID_Familia`) VALUES
('PROD12063', 'REPELLO Y ACABADO MONOCAPA CON HIDRÓFUGO INTEGRADO, IDEAL PARA PAREDES EXTERIORES CON RESISTENCIA ALTA A LA INTEMPERIE,ACABADO RÚSTICO Y USO EN EXTERIORES', 'ADEBLOCK STUCCO GRIS 40 KG', 'PROD12063.jpg', 'F899'),
('PROD18408', 'FABRICADO CON MATERIAL BAJO NORMAS ASTM 924 Y 792', 'CAPOTE ZINC ROOFTEC 1.22MT 26', 'PROD18408.jpg', 'F153'),
('PROD22359', 'ALTA RESISTENCIA A LOS RAYONES, ABSORCIÓN DE SONIDO Y LAMINA CALIBRE 24', 'FREGADERO ACERO INOX  38 X38 FOSSET49208', 'PROD22359.jpg', 'F315'),
('PROD31994', 'MATERIAL ACERO, 3 AMPLIAS REPISAS, MEDIDAS 22.8 X 59.8 X 9.45 PULG', 'ORGANIZADOR PARA BAÑO FOSET ', 'PROD31994.jpg', 'F315'),
('PROD34734', 'BROCA PARA PERFORAR ACERO CONVENCIONAL, METALES, PLÁSTICO Y MADERA, 1/16 PULGADAS, ACERO DE ALTA VELOCIDAD, MATERIALES DE ALTA CALIDAD, ÁNGULO DE PUNTA DE 135 GRADOS', 'BROCA HIERRO A/V TR11110 1/16', 'PROD34734.jpg', 'F094'),
('PROD36833', 'CUERPO TERMINAL PARA ACOMETIDA', 'CUERPO TERMINAL 1  PULG', 'PROD36833.jpg', 'F856'),
('PROD42816', 'AYUDA A MANTENER LAS TOALLAS AL ALCANCE DE LA MANO, IDEAL PARA USAR EN DORMITORIOS Y BAÑOS', 'TOALLERO BARRA CROM 5/8 X18', 'PROD42816.jpg', 'F315'),
('PROD50074', 'EXCELENTE ADERENCIA,ALTO BRILLO Y BUEN CUBRIMIENTO', 'PINT DURA ACEITE 2609 AZUL', 'PROD50074.jpg', 'F251'),
('PROD50917', 'BARRA DE PROTECCIÓN ANTE CORTO CIRCUITOS O FALLAS DEL SISTEMA ELÉCTRICO, FABRICACIÓN SEGÚN NORMAS INTERNACIONALES, LONGITUD TOTAL DE 2.7 MTS, INSTALACIÓN BAJO TIERRA, ALTA CONDUCTIVIDAD Y RESISTIVIDAD', 'BARRA COOPERWELL 5/8 X2', 'PROD50917.jpg', 'F856'),
('PROD56442', 'LÁMINA DE FIBROCEMENTO PARA CUBIERTAS DE TECHOS CON ACABADO ESTÉTICO. MODERNA TECNOLOGÍA DE ALTA DURABILIDAD CON VENTAJAS DE REDUCCIÓN DEL CALOR Y RUIDO, ESPESOR 5 MM, MEDIDAS 3 X 5 PIES, PINTADO A UNA CARA', 'LAM GALV ESPAÑOL 26 ROJA 5.46MT', 'PROD56442.jpg', 'F153'),
('PROD56908', 'EXCELENTE ADERENCIA,ALTO BRILLO Y BUEN CUBRIMIENTO', 'PINT CLASICA ESMALTE 1927 ROJO TEJA', 'PROD56908.jpg', 'F251'),
('PROD58697', 'APLICACION DIRECTA, EXELENTE BRILLO Y NIVELAMIENTO', 'PINT CLASICA ESMALTE 1915 ROSADO', 'PROD58697.jpg', 'F251'),
('PROD66492', 'ABRAZADERA GALVANIZADA CON PERNOS, DIÁMETRO DE ABERTURA DE 5 A 7 PULGADAS, PERNO GALVANIZADO DE 1/2 PULGADA DE DIÁMETRO Y 4.1/2 PULGADAS DE LARGO, IDEAL PARA POSTES DE CABLEADO ELÉCTRICO', 'ABRAZADERA GALV P/POSTE 3 A 5', 'PROD66492.jpg', 'F856'),
('PROD69310', 'PERFECTA PARA MEZCLA COMO REPELLOS, CONCRETO Y PINTURA, SE ADAPTA FACILMENTE A DIFERENTES SUPERFICIES', 'CAL HIDRATADA 44 LB', 'PROD69310.jpg', 'F899'),
('PROD75390', 'FÁCIL INSTALACIÓN', 'LAM GAL. TEJA TOLEDO PLUS 4.55M', 'PROD75390.jpg', 'F153'),
('PROD80888', 'ALAMBRE GALVANIZADO LISO, CALIBRE 12', 'ALAMBRE GALV CAL 12', 'PROD80888.jpg', 'F899'),
('PROD85309', 'RODO PARA PORTON CON BALERO', 'RODO P/PORTON NAC 3', 'PROD85309.jpg', 'F094'),
('PROD94622', 'BROCAS TACTIX FABRICADAS EN ACERO HSS, ALTA RESISTENCIA Y PERFORACIONES LIMPIAS Y RÁPIDAS EN MÚLTIPLES SUPERFICIES.', 'BROCA HIERRO A/V TR11114 3/32', 'PROD94622.jpg', 'F094');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
  `ID_Sucursal` int(1) NOT NULL AUTO_INCREMENT,
  `Nombre_Sucursal` varchar(120) NOT NULL,
  PRIMARY KEY (`ID_Sucursal`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`ID_Sucursal`, `Nombre_Sucursal`) VALUES
(1, 'Santa Tecla'),
(2, 'San Salvador'),
(3, 'Lourdes'),
(4, 'Opico'),
(5, 'Zaragoza'),
(6, 'Santa Ana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiket`
--

DROP TABLE IF EXISTS `tiket`;
CREATE TABLE IF NOT EXISTS `tiket` (
  `ID_Tiket` varchar(8) NOT NULL,
  `DUI` varchar(120) NOT NULL,
  `ID_Pago` varchar(8) NOT NULL,
  PRIMARY KEY (`ID_Tiket`),
  KEY `DUI` (`DUI`),
  KEY `ID_Pago` (`ID_Pago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_Usuario` varchar(8) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `Apellido` varchar(120) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Clave` varchar(255) NOT NULL,
  `Verificado` int(1) NOT NULL DEFAULT '0',
  `Estado` int(1) NOT NULL DEFAULT '1',
  `Acceso` int(1) NOT NULL DEFAULT '0',
  `ID_Sucursal` int(1) NOT NULL,
  `Hash_Active` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_Usuario`),
  KEY `ID_Sucursal` (`ID_Sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `Nombre`, `Apellido`, `Correo`, `Clave`, `Verificado`, `Estado`, `Acceso`, `ID_Sucursal`, `Hash_Active`) VALUES
('E025', 'Hiroki', 'Kimura', 'Hiroki@gmail.com', '$2y$10$fCvpighhmzyvUv2VU.wl2OgIDRj3atklCW9hAJ/5WD7jexI7Z5oYq', 1, 1, 0, 4, '670033913ff8547ceed712ae4c5d5a2d'),
('E182', 'Pedro', 'Castillo', 'pedro@gmail.com', '$2y$10$ZluBGt/GyxRDw/cGy1PMSedPOB7TuIZeKzEmgGpeo/A5pkqHmwTbe', 1, 1, 0, 5, '4bf2c2304abdd62f7d39a314d478439c'),
('E196', 'Gissela', 'Serrano', 'gisselaverenice@gmail.com', '$2y$10$OOa//wpORcGN4E2wiLY0feChoWi4JL9sevJsrKcDbU4KY.PK6uXre', 1, 1, 0, 1, 'de1cc7002631e0643a540bf907a36562'),
('E318', 'Luis', 'Ulloa', 'serranogissela0@gmail.com', '$2y$10$sfRVYdMS0awPFKwzahdczOLusv5ZmCLoRPjNWksRrhlC1EEaBsV1C', 1, 1, 0, 2, '54ba05ed452c29d13ed7d2a752e2c32f'),
('E390', 'Santiago', 'Melendez', 'santiago@gmail.com', '$2y$10$ZluBGt/GyxRDw/cGy1PMSedPOB7TuIZeKzEmgGpeo/A5pkqHmwTbe', 1, 1, 1, 6, '085a2f56bfb27cb2e44ef3c457591b96'),
('E486', 'Jony', 'Morales', 'jony25@gmail.com', '$2y$10$ZluBGt/GyxRDw/cGy1PMSedPOB7TuIZeKzEmgGpeo/A5pkqHmwTbe', 1, 1, 0, 3, '95bf5763251f491480a0c1e5b76a16d8'),
('E494', 'Juan', 'Lopez', 'juan@gmail.com', '$2y$10$ZluBGt/GyxRDw/cGy1PMSedPOB7TuIZeKzEmgGpeo/A5pkqHmwTbe', 1, 1, 0, 2, '95bf5763251f491480a0c1e5b76a16d8'),
('E741', 'susan', 'zelay', 'susan@gmail.com', '$2y$10$/QsvXcXlgdHjqrGy9qcwWuk1yYC4c1bAhIv5LW75qXebO845WfdSy', 1, 1, 0, 6, '10181139efb3351f1eff8251990ff12a'),
('E912', 'Pablo', 'gonzalez', 'pablo@gmail.com', '$2y$10$gp6LBFg6iLCig5WJXpfFreW19XFzxEq1doUDb9Neb9zZxYC3K6Jq2', 0, 0, 0, 4, '95bf5763251f491480a0c1e5b76a16d8');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`ID_Tiket`) REFERENCES `tiket` (`ID_Tiket`),
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`ID_Precio`) REFERENCES `precio_cantidad` (`ID_PC`);

--
-- Filtros para la tabla `precio_cantidad`
--
ALTER TABLE `precio_cantidad`
  ADD CONSTRAINT `precio_cantidad_ibfk_1` FOREIGN KEY (`ID_Producto`) REFERENCES `producto` (`ID_Producto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`ID_Familia`) REFERENCES `familia` (`ID_Familia`);

--
-- Filtros para la tabla `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`DUI`) REFERENCES `cliente` (`DUI`),
  ADD CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`ID_Pago`) REFERENCES `pago` (`ID_Pago`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_Sucursal`) REFERENCES `sucursal` (`ID_Sucursal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
