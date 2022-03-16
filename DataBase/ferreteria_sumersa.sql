-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-03-2022 a las 06:57:37
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
-- Estructura de tabla para la tabla `cantidad_sucursal`
--

DROP TABLE IF EXISTS `cantidad_sucursal`;
CREATE TABLE IF NOT EXISTS `cantidad_sucursal` (
  `ID_Cantidad` varchar(8) NOT NULL,
  `Cantidad_ST` int(11) NOT NULL,
  `Cantidad_SS` int(11) NOT NULL,
  `Cantidad_LO` int(11) NOT NULL,
  `Cantidad_OP` int(11) NOT NULL,
  `Cantidad_ZA` int(11) NOT NULL,
  `Cantidad_SA` int(11) NOT NULL,
  `ID_Producto` varchar(8) NOT NULL,
  PRIMARY KEY (`ID_Cantidad`),
  KEY `ID_Producto` (`ID_Producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cantidad_sucursal`
--

INSERT INTO `cantidad_sucursal` (`ID_Cantidad`, `Cantidad_ST`, `Cantidad_SS`, `Cantidad_LO`, `Cantidad_OP`, `Cantidad_ZA`, `Cantidad_SA`, `ID_Producto`) VALUES
('C001', 55, 44, 22, 22, 22, 222, 'P001');

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
  PRIMARY KEY (`DUI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('F037', 'Techo'),
('F115', 'Electrico'),
('F477', 'Fontaneria'),
('F707', 'Construccion'),
('F860', 'Ferreteria'),
('F916', 'Pintura');

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
-- Estructura de tabla para la tabla `precio_sucursal`
--

DROP TABLE IF EXISTS `precio_sucursal`;
CREATE TABLE IF NOT EXISTS `precio_sucursal` (
  `ID_Precio` varchar(8) NOT NULL,
  `Precio_ST` float(10,2) NOT NULL,
  `Precio_SS` float(10,2) NOT NULL,
  `Precio_LO` float(10,2) NOT NULL,
  `Precio_OP` float(10,2) NOT NULL,
  `Precio_ZA` float(10,2) NOT NULL,
  `Precio_SA` float(10,2) NOT NULL,
  `ID_Producto` varchar(8) NOT NULL,
  PRIMARY KEY (`ID_Precio`),
  KEY `ID_Producto` (`ID_Producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `precio_sucursal`
--

INSERT INTO `precio_sucursal` (`ID_Precio`, `Precio_ST`, `Precio_SS`, `Precio_LO`, `Precio_OP`, `Precio_ZA`, `Precio_SA`, `ID_Producto`) VALUES
('P001', 12.00, 22.00, 3.00, 45.00, 32.00, 54.00, 'P001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `ID_Producto` varchar(8) NOT NULL,
  `Descripcion` varchar(600) NOT NULL,
  `Nombrep` varchar(120) NOT NULL,
  `Imagen` varchar(15) NOT NULL,
  `ID_Familia` varchar(8) NOT NULL,
  PRIMARY KEY (`ID_Producto`),
  KEY `ID_Familia` (`ID_Familia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_Producto`, `Descripcion`, `Nombrep`, `Imagen`, `ID_Familia`) VALUES
('P001', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, corporis maiores doloremque obcaecati expedita eius laudantium consequatur qui nihil, asperiores autem distinctio repellendus esse, assumenda amet perferendis animi sunt vitae?', 'lampara', 'PROD00005.webp', 'F037');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
  `ID_Sucursal` int(1) NOT NULL AUTO_INCREMENT,
  `Nombre_Sucursal` varchar(120) NOT NULL,
  PRIMARY KEY (`ID_Sucursal`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`ID_Usuario`),
  KEY `ID_Sucursal` (`ID_Sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `Nombre`, `Apellido`, `Correo`, `Clave`, `Verificado`, `Estado`, `Acceso`, `ID_Sucursal`) VALUES
('E210', 'Gissela', 'Serrano', 'gisselaverenice@gmail.com', '$2y$10$n9crKxTCoM9DWAlzgDymmuKErHtT3IV9/ataeteuFeTx2cBPcoNeW', 0, 1, 0, 3),
('E274', 'Susan', 'Zelaya', 'susan15@gmail.com', '$2y$10$RiRBiUOjezK20.ZGq7h2e..H4aESEpbzaKDaaOvoX5pTcBPsS79/6', 0, 0, 0, 2),
('E466', 'Jony', 'Morales', 'jony25@gmail.com', '$2y$10$L0Fkvs/ujxPLG4wiM2MR7emC8.qMBiQXb3L2PKuDSoiG5b0NWePPG', 0, 1, 0, 6);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cantidad_sucursal`
--
ALTER TABLE `cantidad_sucursal`
  ADD CONSTRAINT `cantidad_sucursal_ibfk_1` FOREIGN KEY (`ID_Producto`) REFERENCES `producto` (`ID_Producto`);

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`ID_Tiket`) REFERENCES `tiket` (`ID_Tiket`),
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`ID_Precio`) REFERENCES `precio_sucursal` (`ID_Precio`);

--
-- Filtros para la tabla `precio_sucursal`
--
ALTER TABLE `precio_sucursal`
  ADD CONSTRAINT `precio_sucursal_ibfk_1` FOREIGN KEY (`ID_Producto`) REFERENCES `producto` (`ID_Producto`);

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
