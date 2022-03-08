-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-03-2022 a las 02:35:17
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
  `ID_PS` varchar(8) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Total` float(10,2) NOT NULL,
  PRIMARY KEY (`ID_Detalle`),
  KEY `ID_Tiket` (`ID_Tiket`),
  KEY `ID_PS` (`ID_PS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

DROP TABLE IF EXISTS `familia`;
CREATE TABLE IF NOT EXISTS `familia` (
  `ID_Familia` varchar(8) NOT NULL,
  `Nombre_Sucursal` varchar(120) NOT NULL,
  PRIMARY KEY (`ID_Familia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `ID_PS` varchar(8) NOT NULL,
  `ID_Sucursal` varchar(8) NOT NULL,
  `ID_Producto` varchar(8) NOT NULL,
  `Precio` float(10,2) NOT NULL,
  PRIMARY KEY (`ID_PS`),
  KEY `ID_Sucursal` (`ID_Sucursal`),
  KEY `ID_Producto` (`ID_Producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `ID_Producto` varchar(8) NOT NULL,
  `Descripcion` varchar(120) NOT NULL,
  `Imagen` longblob NOT NULL,
  `ID_Familia` varchar(8) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`ID_Producto`),
  KEY `ID_Familia` (`ID_Familia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
  `ID_Sucursal` varchar(8) NOT NULL,
  `Nombre_Sucursal` varchar(120) NOT NULL,
  PRIMARY KEY (`ID_Sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `Activo` int(1) NOT NULL DEFAULT '0',
  `Acceso` int(1) NOT NULL DEFAULT '0',
  `ID_Sucursal` varchar(8) NOT NULL,
  PRIMARY KEY (`ID_Usuario`),
  KEY `ID_Sucursal` (`ID_Sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`ID_Tiket`) REFERENCES `tiket` (`ID_Tiket`),
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`ID_PS`) REFERENCES `precio_sucursal` (`ID_PS`);

--
-- Filtros para la tabla `precio_sucursal`
--
ALTER TABLE `precio_sucursal`
  ADD CONSTRAINT `precio_sucursal_ibfk_1` FOREIGN KEY (`ID_Sucursal`) REFERENCES `sucursal` (`ID_Sucursal`),
  ADD CONSTRAINT `precio_sucursal_ibfk_2` FOREIGN KEY (`ID_Producto`) REFERENCES `producto` (`ID_Producto`);

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
