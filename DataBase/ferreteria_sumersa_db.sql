-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-05-2022 a las 20:50:28
-- Versión del servidor: 5.7.36
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ferreteria_sumersa_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

DROP TABLE IF EXISTS `carrito`;
CREATE TABLE IF NOT EXISTS `carrito` (
  `id_carrito` varchar(255) NOT NULL,
  `correlativo` varchar(10) NOT NULL,
  `codigo_producto` varchar(11) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `id_estado_pago` int(1) NOT NULL DEFAULT '0',
  `precio` float(11,2) NOT NULL,
  `siglas_sucursal` varchar(2) NOT NULL,
  KEY `sp_ibfk_1` (`id_estado_pago`),
  KEY `xp_ibfk_1` (`codigo_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `Acceso` int(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`DUI`),
  KEY `cliente_access_ibfk_1` (`Acceso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`DUI`, `Nombre`, `Apellido`, `Telefono`, `Correo`, `Clave`, `Direccion`, `Verificado`, `Hash_Active`, `Acceso`) VALUES
('01234234-1', 'Juan', 'Ceballos', '7005-9988', 'jm@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'Apopa', 1, '1543843a4723ed2ab08e18053ae6dc5b', 2),
('02345678-9', 'Jose', 'Perales', '7005-9988', 'jj@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'Ciudad Delgado, San Salvador', 1, '1543843a4723ed2ab08e18053ae6dc5b', 2),
('9-87654321', 'Justo', 'Lopez', '7755-4433', 'jl@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'Ciudad Delgado, SS', 1, '1543843a4723ed2ab08e18053ae6dc5b', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

DROP TABLE IF EXISTS `detalles`;
CREATE TABLE IF NOT EXISTS `detalles` (
  `id_session` varchar(255) NOT NULL,
  `codigo_producto` varchar(11) NOT NULL,
  `codigo_cliente` varchar(125) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `total` float(8,2) NOT NULL,
  `codigo_factura` varchar(11) NOT NULL,
  KEY `cod_prod_ibfk_1` (`codigo_producto`),
  KEY `facc_client_ibfk_1` (`codigo_cliente`),
  KEY `cod_fac_ibfk_1` (`codigo_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalles`
--

INSERT INTO `detalles` (`id_session`, `codigo_producto`, `codigo_cliente`, `cantidad`, `total`, `codigo_factura`) VALUES
('d8ed4211d675ad36d8746f91d8bb46d46470ac13', 'PROD50074', '01234234-1', 2, 42.38, 'F906153688'),
('d8ed4211d675ad36d8746f91d8bb46d46470ac13', 'PROD50074', '01234234-1', 2, 42.38, 'F658945670'),
('d8ed4211d675ad36d8746f91d8bb46d46470ac13', 'PROD50074', '01234234-1', 1, 21.19, 'F276215445'),
('541d3d7377a40520278d6e85500e31f3aa75f0a9', 'PROD18408', '02345678-9', 1, 10.50, 'F668880026');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_pago`
--

DROP TABLE IF EXISTS `estado_pago`;
CREATE TABLE IF NOT EXISTS `estado_pago` (
  `id_estado_pago` int(1) NOT NULL,
  `estado_pago` varchar(25) NOT NULL,
  PRIMARY KEY (`id_estado_pago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado_pago`
--

INSERT INTO `estado_pago` (`id_estado_pago`, `estado_pago`) VALUES
(0, 'Pendiente'),
(1, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

DROP TABLE IF EXISTS `facturas`;
CREATE TABLE IF NOT EXISTS `facturas` (
  `id_factura` varchar(10) NOT NULL,
  `codigo_cliente` varchar(125) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_factura`),
  KEY `fac_client_ibfk_1` (`codigo_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id_factura`, `codigo_cliente`, `fecha`) VALUES
('F276215445', '01234234-1', '2022-05-05 14:33:46'),
('F658945670', '01234234-1', '2022-05-05 12:23:54'),
('F668880026', '02345678-9', '2022-05-05 14:40:13'),
('F906153688', '01234234-1', '2022-05-05 12:03:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

DROP TABLE IF EXISTS `familia`;
CREATE TABLE IF NOT EXISTS `familia` (
  `ID_Familia` varchar(8) NOT NULL,
  `Nombre_Familia` varchar(120) NOT NULL,
  `Estado_Familia` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID_Familia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `familia`
--

INSERT INTO `familia` (`ID_Familia`, `Nombre_Familia`, `Estado_Familia`) VALUES
('F094', 'FERRETERIA', 1),
('F153', 'TECHO', 1),
('F251', 'PINTURA', 1),
('F264', 'OFFSET', 1),
('F315', 'FOTANERIA', 1),
('F856', 'ELECTRICO', 1),
('F899', 'CONSTRUCCIÓN', 1);

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
('PC005', 10.50, NULL, NULL, 10.78, NULL, NULL, 1, NULL, NULL, 345, NULL, NULL, 'PROD18408'),
('PC018', NULL, NULL, NULL, 46.00, NULL, NULL, NULL, NULL, NULL, 23, NULL, NULL, 'PROD22359'),
('PC148', 1.56, NULL, NULL, 1.58, NULL, NULL, 100, NULL, NULL, 56, NULL, NULL, 'PROD58697'),
('PC170', 21.19, NULL, NULL, 21.19, NULL, NULL, 123, NULL, NULL, 45, NULL, NULL, 'PROD50074'),
('PC299', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PROD26302'),
('PC408', NULL, NULL, NULL, 16.75, NULL, NULL, NULL, NULL, NULL, 55, NULL, NULL, 'PROD50917'),
('PC454', NULL, NULL, NULL, NULL, NULL, 40.51, NULL, NULL, NULL, NULL, NULL, 34, 'PROD31994'),
('PC491', NULL, NULL, NULL, 14.69, NULL, NULL, NULL, NULL, NULL, 134, NULL, NULL, 'PROD56442'),
('PC523', NULL, 5.47, NULL, NULL, NULL, NULL, NULL, 34, NULL, NULL, NULL, NULL, 'PROD69310'),
('PC539', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PROD75390'),
('PC542', 10.50, 12.50, NULL, NULL, NULL, NULL, 15, 56, NULL, NULL, NULL, NULL, 'PROD12063'),
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
  `Estado_Producto` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID_Producto`),
  KEY `ID_Familia` (`ID_Familia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_Producto`, `Descripcion`, `Nombrep`, `Imagen`, `ID_Familia`, `Estado_Producto`) VALUES
('PROD12063', 'REPELLO Y ACABADO MONOCAPA CON HIDRÓFUGO INTEGRADO, IDEAL PARA PAREDES EXTERIORES CON RESISTENCIA ALTA A LA INTEMPERIE,ACABADO RÚSTICO Y USO EN EXTERIORES', 'ADEBLOCK STUCCO GRIS 40 KG', 'PROD12063.jpg', 'F899', 1),
('PROD18408', 'FABRICADO CON MATERIAL BAJO NORMAS ASTM 924 Y 792', 'CAPOTE ZINC ROOFTEC 1.22MT 26', 'PROD18408.jpg', 'F153', 1),
('PROD22359', 'ALTA RESISTENCIA A LOS RAYONES, ABSORCIÓN DE SONIDO Y LAMINA CALIBRE 24', 'FREGADERO ACERO INOX  38 X38 FOSSET49208', 'PROD22359.jpg', 'F315', 1),
('PROD26302', 'Teclado', 'Teclado mecánico', 'PROD26302.png', 'F856', 1),
('PROD31994', 'MATERIAL ACERO, 3 AMPLIAS REPISAS, MEDIDAS 22.8 X 59.8 X 9.45 PULG', 'ORGANIZADOR PARA BAÑO FOSET ', 'PROD31994.jpg', 'F315', 1),
('PROD34734', 'BROCA PARA PERFORAR ACERO CONVENCIONAL, METALES, PLÁSTICO Y MADERA, 1/16 PULGADAS, ACERO DE ALTA VELOCIDAD, MATERIALES DE ALTA CALIDAD, ÁNGULO DE PUNTA DE 135 GRADOS', 'BROCA HIERRO A/V TR11110 1/16', 'PROD34734.jpg', 'F094', 1),
('PROD36833', 'CUERPO TERMINAL PARA ACOMETIDA', 'CUERPO TERMINAL 1  PULG', 'PROD36833.jpg', 'F856', 1),
('PROD42816', 'AYUDA A MANTENER LAS TOALLAS AL ALCANCE DE LA MANO, IDEAL PARA USAR EN DORMITORIOS Y BAÑOS', 'TOALLERO BARRA CROM 5/8 X18', 'PROD42816.jpg', 'F315', 1),
('PROD50074', 'EXCELENTE ADERENCIA,ALTO BRILLO Y BUEN CUBRIMIENTO', 'PINT DURA ACEITE 2609 AZUL', 'PROD50074.jpg', 'F251', 1),
('PROD50917', 'BARRA DE PROTECCIÓN ANTE CORTO CIRCUITOS O FALLAS DEL SISTEMA ELÉCTRICO, FABRICACIÓN SEGÚN NORMAS INTERNACIONALES, LONGITUD TOTAL DE 2.7 MTS, INSTALACIÓN BAJO TIERRA, ALTA CONDUCTIVIDAD Y RESISTIVIDAD', 'BARRA COOPERWELL 5/8 X2', 'PROD50917.jpg', 'F856', 1),
('PROD56442', 'LÁMINA DE FIBROCEMENTO PARA CUBIERTAS DE TECHOS CON ACABADO ESTÉTICO. MODERNA TECNOLOGÍA DE ALTA DURABILIDAD CON VENTAJAS DE REDUCCIÓN DEL CALOR Y RUIDO, ESPESOR 5 MM, MEDIDAS 3 X 5 PIES, PINTADO A UNA CARA', 'LAM GALV ESPAÑOL 26 ROJA 5.46MT', 'PROD56442.jpg', 'F153', 1),
('PROD56908', 'EXCELENTE ADERENCIA,ALTO BRILLO Y BUEN CUBRIMIENTO', 'PINT CLASICA ESMALTE 1927 ROJO TEJA', 'PROD56908.jpg', 'F251', 1),
('PROD58697', 'APLICACION DIRECTA, EXELENTE BRILLO Y NIVELAMIENTO', 'PINT CLASICA ESMALTE 1915 ROSADO', 'PROD58697.jpg', 'F251', 1),
('PROD66492', 'ABRAZADERA GALVANIZADA CON PERNOS, DIÁMETRO DE ABERTURA DE 5 A 7 PULGADAS, PERNO GALVANIZADO DE 1/2 PULGADA DE DIÁMETRO Y 4.1/2 PULGADAS DE LARGO, IDEAL PARA POSTES DE CABLEADO ELÉCTRICO', 'ABRAZADERA GALV P/POSTE 3 A 5', 'PROD66492.jpg', 'F856', 1),
('PROD69310', 'PERFECTA PARA MEZCLA COMO REPELLOS, CONCRETO Y PINTURA, SE ADAPTA FACILMENTE A DIFERENTES SUPERFICIES', 'CAL HIDRATADA 44 LB', 'PROD69310.jpg', 'F899', 1),
('PROD75390', 'FÁCIL INSTALACIÓN', 'LAM GAL. TEJA TOLEDO PLUS 4.55M', 'PROD75390.jpg', 'F153', 1),
('PROD80888', 'ALAMBRE GALVANIZADO LISO, CALIBRE 12', 'ALAMBRE GALV CAL 12', 'PROD80888.jpg', 'F899', 1),
('PROD85309', 'RODO PARA PORTON CON BALERO', 'RODO P/PORTON NAC 3', 'PROD85309.jpg', 'F094', 1),
('PROD94622', 'BROCAS TACTIX FABRICADAS EN ACERO HSS, ALTA RESISTENCIA Y PERFORACIONES LIMPIAS Y RÁPIDAS EN MÚLTIPLES SUPERFICIES.', 'BROCA HIERRO A/V TR11114 3/32', 'PROD94622.jpg', 'F094', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
  `ID_Sucursal` int(1) NOT NULL AUTO_INCREMENT,
  `Nombre_Sucursal` varchar(120) NOT NULL,
  `Siglas` varchar(2) NOT NULL,
  `Estado_Sucursal` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID_Sucursal`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`ID_Sucursal`, `Nombre_Sucursal`, `Siglas`, `Estado_Sucursal`) VALUES
(1, 'Santa Tecla', 'ST', 1),
(2, 'San Salvador', 'SS', 1),
(3, 'Lourdes', 'LO', 1),
(4, 'Opico', 'OP', 1),
(5, 'Zaragoza', 'ZA', 1),
(6, 'Santa Ana', 'SA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo_usuario` int(1) NOT NULL,
  `nombre_tipo_usuario` varchar(25) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `nombre_tipo_usuario`) VALUES
(0, 'Usuario'),
(1, 'Super Usuario'),
(2, 'Cliente');

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
  `Verificado` int(1) NOT NULL DEFAULT '1',
  `Estado` int(1) NOT NULL DEFAULT '1',
  `Acceso` int(1) NOT NULL DEFAULT '0',
  `ID_Sucursal` int(1) NOT NULL,
  `Hash_Active` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Usuario`),
  KEY `ID_Sucursal` (`ID_Sucursal`),
  KEY `usuario1_ibfk_1` (`Acceso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `Nombre`, `Apellido`, `Correo`, `Clave`, `Verificado`, `Estado`, `Acceso`, `ID_Sucursal`, `Hash_Active`) VALUES
('E025', 'Hiroki', 'Kimura', 'Hiroki@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 1, 1, 0, 4, '670033913ff8547ceed712ae4c5d5a2d'),
('E182', 'Pedro', 'Castillo', 'pedro@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 1, 0, 0, 5, '4bf2c2304abdd62f7d39a314d478439c'),
('E196', 'Gissela', 'Serrano', 'gisselaverenice@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 1, 1, 0, 1, 'de1cc7002631e0643a540bf907a36562'),
('E318', 'Luis', 'Ulloa', 'serranogissela0@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 1, 1, 0, 2, '54ba05ed452c29d13ed7d2a752e2c32f'),
('E390', 'Santiago', 'Menendez', 'santiago@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 1, 1, 1, 6, '085a2f56bfb27cb2e44ef3c457591b96'),
('E486', 'Jony', 'Morales', 'jony25@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 1, 1, 0, 1, '95bf5763251f491480a0c1e5b76a16d8'),
('E494', 'Juan', 'Perez', 'juan@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 1, 1, 0, 2, '95bf5763251f491480a0c1e5b76a16d8'),
('E741', 'susan', 'zelaya', 'susan@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 1, 1, 0, 6, '10181139efb3351f1eff8251990ff12a'),
('E838', 'Diego', 'Maradona', 'diego@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 1, 0, 0, 6, 'e744f91c29ec99f0e662c9177946c627'),
('E912', 'Pablo', 'gonzalez', 'pablo@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 1, 1, 0, 4, '95bf5763251f491480a0c1e5b76a16d8');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_access_ibfk_1` FOREIGN KEY (`Acceso`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);

--
-- Filtros para la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD CONSTRAINT `cod_fac_ibfk_1` FOREIGN KEY (`codigo_factura`) REFERENCES `facturas` (`id_factura`),
  ADD CONSTRAINT `facc_client_ibfk_1` FOREIGN KEY (`codigo_cliente`) REFERENCES `cliente` (`DUI`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `fac_client_ibfk_1` FOREIGN KEY (`codigo_cliente`) REFERENCES `cliente` (`DUI`);

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
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario1_ibfk_1` FOREIGN KEY (`Acceso`) REFERENCES `tipo_usuario` (`id_tipo_usuario`),
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_Sucursal`) REFERENCES `sucursal` (`ID_Sucursal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
