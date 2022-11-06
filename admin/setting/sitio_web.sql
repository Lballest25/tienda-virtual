-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2022 a las 19:46:56
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sitio_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos_disponibles`
--

CREATE TABLE `juegos_disponibles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `juegos_disponibles`
--

INSERT INTO `juegos_disponibles` (`id`, `nombre`, `imagen`, `precio`, `cantidad`) VALUES
(6, 'GTA', '1648495792_gta 5.png', '150000', 2),
(7, 'mortal Kombat', '1648495841_Mortal Kombat.jpg', '100000', 4),
(8, 'Hitman', '1648501008_Hitman 2.jpg', '120000', 12),
(9, 'Assassin creed', '1648501102_assasin creed.jpg', '220000', 5),
(10, 'Dragon ball', '1648501144_dragon ball.jpg', '140000', 7),
(11, 'Call of duty', '1648501183_Call of duty.jpg', '160000', 9),
(12, '2k22', '1648501249_wwe.jpg', '180000', 9),
(13, 'FIFA 22', '1648511835_FIFA 22.jpg', '200000', 3),
(70, 'nombre', '', '120000', 2),
(75, 'nombre', 'Array', '140000', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, 'lballest', '123'),
(2, 'dtorres', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `juegos_disponibles`
--
ALTER TABLE `juegos_disponibles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juegos_disponibles`
--
ALTER TABLE `juegos_disponibles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
