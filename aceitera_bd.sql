-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-04-2022 a las 06:32:31
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aceitera_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CATEGORIAS`
--

CREATE TABLE `CATEGORIAS` (
  `ID_CATEGORIA` int(11) NOT NULL,
  `CATEGORIA` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ESTATUS` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `CATEGORIAS`
--

INSERT INTO `CATEGORIAS` (`ID_CATEGORIA`, `CATEGORIA`, `ESTATUS`) VALUES
(1, 'ACEITES', 1),
(2, 'FILTROS', 1),
(3, 'FAJAS', 1),
(4, 'LUBRICANTES', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PRODUCTO`
--

CREATE TABLE `PRODUCTO` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `PRODUCTO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `UM` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `DESCRIPCION` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `PRC_VENTA` double NOT NULL,
  `PRC_COSTO` double NOT NULL,
  `MARCA` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `CATEGORIA` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ESTATUS` tinyint(4) NOT NULL DEFAULT 1,
  `EXISTENCIA` double NOT NULL,
  `INGRESOS` double NOT NULL,
  `SALIDAS` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `PRODUCTO`
--

INSERT INTO `PRODUCTO` (`ID_PRODUCTO`, `PRODUCTO`, `UM`, `DESCRIPCION`, `PRC_VENTA`, `PRC_COSTO`, `MARCA`, `CATEGORIA`, `ESTATUS`, `EXISTENCIA`, `INGRESOS`, `SALIDAS`) VALUES
(1, 'ACEITE 20W50', 'GLN', 'ACEITE DE MOTOR', 125, 75.5, 'CASTROL', 'ACEITES', 1, 10, 20, 10),
(2, 'ACEITE 10W30', 'GLN', 'ACEITE INDUSTRIAL', 154, 123.75, 'CASTROL', 'ACEITES', 1, 5, 7, 5),
(3, 'PASTILLAS SUZIK GN 125', 'PAQUETE', 'JUEGO DE PASTILLAS PARA MOTOCICLETA SUZUKI', 275, 225, 'SUZUKI', 'REPUESTOS', 1, 5, 7, 2),
(4, 'ACEITE ', 'GLN', 'ACEITE DE MOTOR', 127.35, 100.45, 'MOTUL', 'ACEITES', 1, 3, 4, 1),
(5, 'FAJA 123X23X45', 'UN', 'FAJA DE ALTERNADOR', 115, 100, 'MOTUL', 'FAJAS', 1, 3, 4, 1),
(6, 'FAJA 34X234X54', 'UN', 'FAJA DE CARRO ', 234.75, 215.3, 'KINGSMAN', 'FAJAS', 1, 2, 3, 1),
(7, 'FILTRO DE ACEITE', 'UN', 'FILTRO DE ACEITE 123402-33', 77, 43.25, 'MOTUL', 'FILTROS', 1, 6, 10, 4),
(8, 'ACEITE ', 'GLN', 'ACEITE DE MOTOR', 127.35, 100.45, 'MOTUL', 'ACEITES', 1, 3, 4, 1),
(9, 'ACEITE ', 'GLN', 'ACEITE DE MOTOR', 127.35, 100.45, 'MOTUL', 'ACEITES', 1, 3, 4, 1),
(10, 'ACEITE ', 'GLN', 'ACEITE DE MOTOR', 127.35, 100.45, 'MOTUL', 'ACEITES', 1, 3, 4, 1),
(11, 'CENTURY LIQUIDO ', 'GLN', 'LIQUIDO DE FRENO', 65, 45, 'PRODIN', 'LUBRICANTES', 1, 0, 0, 0),
(12, 'CENTURY LIQUIDO ', 'GLN', 'LIQUIDO DE FRENO', 65, 45, 'PRODIN', 'FILTROS', 0, 0, 0, 0),
(13, 'ACEITE TEST ', 'LT', 'aceite para motocicleta', 124, 103, 'Motul', 'ACEITES', 0, 0, 0, 0),
(14, 'filtro 23443 ', 'GLN', 'filtro de aire', 65, 45, 'PRODIN', 'FILTROS', 0, 0, 0, 0),
(15, 'filtro 23443 ', 'GLN', 'filtro de aire', 124, 103, 'DEMOTOR', 'FILTROS', 0, 0, 0, 0),
(16, 'FAJA 33422 ', 'GLN', 'FAJA PARA ALTERNADOR TOYOTA', 65, 45, 'FAJAS DE GUATEMALA', 'FAJAS', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `UM`
--

CREATE TABLE `UM` (
  `ID_UM` int(11) NOT NULL,
  `UNIDAD_MEDIDA` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `DESCRIPCION` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ESTATUS` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `UM`
--

INSERT INTO `UM` (`ID_UM`, `UNIDAD_MEDIDA`, `DESCRIPCION`, `ESTATUS`) VALUES
(1, 'GLN', 'GALONES', 1),
(2, 'LT', 'LITRO', 1),
(3, 'UN', 'UNIDADES', 1),
(4, 'DOC', 'DOCENA', 1),
(5, '2X1', 'PAQUETE 2 POR UNO', 1),
(6, 'PACK', 'PAQUETE DE 10 UNIDADES', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIOS`
--

CREATE TABLE `USUARIOS` (
  `ID_USER` int(11) NOT NULL,
  `USER` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `PASSWORD` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `APELLIDOS` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TIPO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ESTATUS` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `USUARIOS`
--

INSERT INTO `USUARIOS` (`ID_USER`, `USER`, `PASSWORD`, `NOMBRE`, `APELLIDOS`, `TIPO`, `ESTATUS`) VALUES
(1, 'admin', 'admin', 'Julio César', 'Cabrera López', 'ADMINISTRADOR', 0),
(2, 'jcabrera', 'jc12345', 'Julio', 'Cabrera', 'VENTAS', 1),
(3, 'ventas', 'ventas', 'Vendedor 1', 'Vendedor', 'VENTAS', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `CATEGORIAS`
--
ALTER TABLE `CATEGORIAS`
  ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Indices de la tabla `PRODUCTO`
--
ALTER TABLE `PRODUCTO`
  ADD PRIMARY KEY (`ID_PRODUCTO`);

--
-- Indices de la tabla `UM`
--
ALTER TABLE `UM`
  ADD PRIMARY KEY (`ID_UM`);

--
-- Indices de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `CATEGORIAS`
--
ALTER TABLE `CATEGORIAS`
  MODIFY `ID_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `PRODUCTO`
--
ALTER TABLE `PRODUCTO`
  MODIFY `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `UM`
--
ALTER TABLE `UM`
  MODIFY `ID_UM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
