-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2020 a las 14:56:27
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `abd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalacion`
--


DROP TABLE IF EXISTS `instalacion`;
CREATE TABLE `instalacion` (
  `idInstalacion` int(15) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `PrecioPorHora` int(15) NOT NULL,
  `idPolideportivo` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `instalacion` (`idInstalacion`, `Nombre`, `PrecioPorHora`, `idPolideportivo`) VALUES
(1, 'Campo Futbol 7', 35, 1),
(2, 'Pista de Padel', 8, 1),
(3, 'Pista de Tenis', 8, 2),
(4, 'Pista de Bádminton', 5, 2),
(5, 'Pista de Voleyball', 7, 3),
(6, 'Pista de Padel', 9, 3),
(7, 'Campo de Futbol sala', 18, 3);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `polideportivo`
--
DROP TABLE IF EXISTS `polideportivo`;
CREATE TABLE `polideportivo` (
  `id` int(15) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Ubicacion` varchar(255) NOT NULL,
  `Telefono` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `polideportivo` (`id`, `Nombre`, `Ubicacion`, `Telefono`) VALUES
(1, 'San Vicente de Paúl', 'Plaza San Vicente de Paúl','912554633'),
(2, 'Samaranch', 'Paseo Imperial', '912554644'),
(3, 'Las Cruces','Avenida de los Poblados', '912554655'),
(4, 'Orcasitas', 'Avenida Rafael Ibarra','912554666');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--
DROP TABLE IF EXISTS `reserva`;
CREATE TABLE `reserva` (
  `fecha` datetime NOT NULL,
  `idReserva` int(15) NOT NULL,
  `idInstalacion` int(15) NOT NULL,
  `horasReservadas` int(15) NOT NULL,
  `precioTotal` int(15) NOT NULL,
  `DNI` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `reserva` (`fecha`, `idReserva`, `idInstalacion`, `horasReservadas`, `precioTotal`, `DNI`) VALUES
('2020-05-31 14:00:00', 1, 2,2, 70, '50259206L' ),
('2020-05-31 14:00:00', 2, 3,1, 8, '50259206L' );
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `instalaciones`
--
ALTER TABLE `instalacion`
  ADD PRIMARY KEY (`idInstalacion`),
  ADD KEY `idPolideportivo` (`idPolideportivo`);

--
-- Indices de la tabla `polideportivo`
--
ALTER TABLE `polideportivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idReserva`,`fecha`),
  ADD KEY `reserva_idInstalacion` (`idInstalacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `instalaciones`
--
ALTER TABLE `instalacion`
  MODIFY `idInstalacion` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `polideportivo`
--
ALTER TABLE `polideportivo`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idReserva` int(15) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `instalaciones`
--
ALTER TABLE `instalacion`
  ADD CONSTRAINT `instalacion_idPolideportivo` FOREIGN KEY (`idPolideportivo`) REFERENCES `polideportivo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_idInstalacion` FOREIGN KEY (`idInstalacion`) REFERENCES `instalacion` (`idInstalacion`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
