-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2021 a las 18:39:02
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fuencafreaksfactory`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `editado` datetime NOT NULL,
  `super_usuario` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_admin`, `usuario`, `nombre`, `password`, `editado`, `super_usuario`) VALUES
(69, 'jesus', 'Jesús Martínez', '$2y$08$gTDlzbNw9owKERA5SEJRruJKq/2ChtiZ.pd2IUYIKgif352GbL.Zm', '0000-00-00 00:00:00', 1),
(71, 'iramos', 'Ismael', '$2y$08$HKZUbDZbR7Wp5KUYNspd0.WDDl0GZXa3mMPgDcN/4LnF5nxmCJCKO', '0000-00-00 00:00:00', 1),
(72, 'admin', 'Administrador Total', '$2y$08$CKUPX4lwUbLNQDy.e559nuXfLa.ZdsszwdwzwVCPm3NKkIH8OeWAK', '2021-06-10 14:04:20', 1),
(73, 'administrador', 'Administrador Parcial', '$2y$08$LIG0ImqcAdOA0JlvDto5YuZwzzbkafmdnQF0QuVYHGatACiyBYf.G', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_evento`
--

CREATE TABLE `categoria_evento` (
  `id_categoria` tinyint(10) NOT NULL,
  `cat_evento` varchar(50) NOT NULL,
  `icono` varchar(25) NOT NULL,
  `editado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria_evento`
--

INSERT INTO `categoria_evento` (`id_categoria`, `cat_evento`, `icono`, `editado`) VALUES
(1, 'Juego_de_Mesa', 'fas fa-chess-pawn', '2021-05-30 08:33:21'),
(2, 'Juego_de_Rol', 'fas fa-dice-d20', '2021-05-30 08:33:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores_de_juego`
--

CREATE TABLE `directores_de_juego` (
  `id_director` tinyint(10) NOT NULL,
  `nombre_director` varchar(30) NOT NULL,
  `apellido_director` varchar(30) NOT NULL,
  `descripcion_director` text NOT NULL,
  `foto_url` varchar(100) NOT NULL,
  `editado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `directores_de_juego`
--

INSERT INTO `directores_de_juego` (`id_director`, `nombre_director`, `apellido_director`, `descripcion_director`, `foto_url`, `editado`) VALUES
(4, 'Alvaro', '\"AltruNoExiste\"', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla augue mi, efficitur vitae turpis et, suscipit tempus neque. Duis interdum nibh ut nisl faucibus vulputate. Nunc euismod nisi quis nunc facilisis vulputate. Mauris tempus justo ut felis lacinia lobortis. Ut gravida justo ac felis hendrerit, id commodo lectus semper.', 'director1.jpg', '2021-06-07 13:27:49'),
(5, 'Ismael', 'Ramos Galindo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla augue mi, efficitur vitae turpis et, suscipit tempus neque. Duis interdum nibh ut nisl faucibus vulputate. Nunc euismod nisi quis nunc facilisis vulputate. Mauris tempus justo ut felis lacinia lobortis. Ut gravida justo ac felis hendrerit, id commodo lectus semper.', 'director3.jpg', '2021-06-07 13:27:22'),
(6, 'Paula', 'Romero Muñoz', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla augue mi, efficitur vitae turpis et, suscipit tempus neque. Duis interdum nibh ut nisl faucibus vulputate. Nunc euismod nisi quis nunc facilisis vulputate. Mauris tempus justo ut felis lacinia lobortis. Ut gravida justo ac felis hendrerit, id commodo lectus semper.', 'director2.jpg', '2021-06-07 22:01:35'),
(7, 'Mikel', 'García', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla augue mi, efficitur vitae turpis et, suscipit tempus neque. Duis interdum nibh ut nisl faucibus vulputate. Nunc euismod nisi quis nunc facilisis vulputate. Mauris tempus justo ut felis lacinia lobortis. Ut gravida justo ac felis hendrerit, id commodo lectus semper.', 'director4.jpg', '2021-06-11 14:13:06'),
(8, 'Christopher', 'Sean Fuentes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla augue mi, efficitur vitae turpis et, suscipit tempus neque. Duis interdum nibh ut nisl faucibus vulputate. Nunc euismod nisi quis nunc facilisis vulputate. Mauris tempus justo ut felis lacinia lobortis. Ut gravida justo ac felis hendrerit, id commodo lectus semper.', 'director5.jpg', '2021-06-07 13:32:29'),
(9, 'Jesús', 'Martínez Tripiana', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla augue mi, efficitur vitae turpis et, suscipit tempus neque. Duis interdum nibh ut nisl faucibus vulputate. Nunc euismod nisi quis nunc facilisis vulputate. Mauris tempus justo ut felis lacinia lobortis. Ut gravida justo ac felis hendrerit, id commodo lectus semper.', 'director6.jpg', '2021-06-07 19:35:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` tinyint(10) NOT NULL,
  `nombre_evento` varchar(60) NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` time NOT NULL,
  `id_cat_evento` tinyint(10) NOT NULL,
  `id_direct` tinyint(10) NOT NULL,
  `editado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_direct`, `editado`) VALUES
(3, 'Dungeons & Dragons - Descenso al Averno', '2021-07-09', '12:00:00', 2, 4, '2021-05-30 15:16:37'),
(4, 'Dungeons & Dragons - La Tumba de la Aniquilación', '2021-07-09', '13:00:00', 2, 5, '2021-05-30 15:16:37'),
(5, 'La llamada de Cthulhu - La casa Corbitt', '2021-07-10', '20:00:00', 2, 6, '2021-05-30 15:16:37'),
(6, 'La Llamada de Cthulhu - Muerte en Luxor', '2021-07-10', '22:00:00', 2, 9, '2021-05-30 15:16:37'),
(7, 'Pathfinder - Nosotroz zer Goblinz', '2021-07-09', '11:00:00', 2, 5, '2021-05-30 15:16:37'),
(8, 'Nuestro Último Verano - VHS', '2021-07-09', '14:00:00', 2, 7, '2021-05-30 15:16:37'),
(9, 'Aquelarre - Asesinato en la ciudad', '2021-07-10', '09:00:00', 2, 8, '2021-06-05 21:18:53'),
(10, 'Star Wars - Al filo del Imperio', '2021-07-09', '21:00:00', 2, 4, '2021-05-30 15:16:37'),
(11, 'Mutant Year Zero - Un nuevo renacer', '2021-07-11', '23:00:00', 2, 6, '2021-05-30 15:16:37'),
(12, 'Dungeons & Dragons - La Maldición de Stradh', '2021-07-09', '23:30:00', 2, 9, '2021-05-30 15:16:37'),
(13, 'Brass Birmingham', '2021-07-10', '10:00:00', 1, 6, '2021-05-30 15:16:37'),
(14, 'Lords of Waterdeep', '2021-07-11', '13:00:00', 1, 5, '2021-05-30 15:16:37'),
(15, 'Dinosaur Island', '2021-07-11', '16:00:00', 1, 4, '2021-05-30 15:16:37'),
(16, 'Rush M.D.', '2021-07-11', '10:00:00', 1, 7, '2021-05-30 15:16:37'),
(17, 'Viajes por la Tierra Media', '2021-07-11', '20:00:00', 1, 9, '2021-05-30 15:16:37'),
(18, 'Fábulas de Peluche', '2021-07-10', '17:00:00', 1, 8, '2021-05-30 15:16:37'),
(20, 'Terraforming Mars', '2021-07-10', '13:00:00', 1, 4, '2021-05-30 15:16:37'),
(21, 'Feudum', '2021-07-10', '16:00:00', 1, 6, '2021-05-30 15:16:37'),
(22, 'Fallout', '2021-07-09', '13:00:00', 1, 5, '2021-05-30 15:16:37'),
(23, 'Nuestro Ultimo Verano', '2021-07-10', '21:15:00', 2, 5, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

CREATE TABLE `participantes` (
  `id_participante` bigint(20) UNSIGNED NOT NULL,
  `nombre_participante` varchar(50) NOT NULL,
  `apellido_participante` varchar(50) NOT NULL,
  `email_participante` varchar(100) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `opciones_articulos` longtext NOT NULL,
  `eventos_seleccionados` longtext NOT NULL,
  `regalo` int(11) NOT NULL,
  `total_pago` varchar(50) NOT NULL,
  `pagado` int(11) NOT NULL,
  `editado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `participantes`
--

INSERT INTO `participantes` (`id_participante`, `nombre_participante`, `apellido_participante`, `email_participante`, `fecha_registro`, `opciones_articulos`, `eventos_seleccionados`, `regalo`, `total_pago`, `pagado`, `editado`) VALUES
(23, 'Jesús', 'Martinez Tripiana', 'jj@mm.es', '2021-06-09 22:14:49', '{\"partidas\":3,\"camisas\":\"2\",\"pegatinas\":\"3\"}', '{\"eventos\":[\"7\",\"3\",\"8\"]}', 2, '39.6', 1, '2021-06-09 22:15:21'),
(24, 'Jorge', 'Lopez', 'jorge@lopez.es', '2021-06-10 13:14:52', '{\"partidas\":3,\"camisas\":\"1\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"22\",\"23\",\"6\"]}', 1, '26.3', 0, '0000-00-00 00:00:00'),
(25, 'Jorge', 'Lopez', 'jorge@lopez.es', '2021-06-10 13:27:04', '{\"partidas\":3,\"camisas\":\"1\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"22\",\"23\",\"6\"]}', 1, '26.3', 0, '0000-00-00 00:00:00'),
(27, 'prueba', 'prueba', '', '2021-06-10 13:46:32', '{\"partidas\":5,\"camisas\":\"2\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"7\",\"3\",\"4\",\"8\",\"10\"]}', 1, '40.6', 1, '0000-00-00 00:00:00'),
(28, 'prueba ', '3 part', '', '2021-06-11 13:49:48', '{\"partidas\":3,\"camisas\":\"2\",\"pegatinas\":\"2\"}', '{\"eventos\":[\"22\",\"3\",\"4\"]}', 1, '37.6', 1, '0000-00-00 00:00:00'),
(30, 'Jorge', 'Lopez', 'jorge@lopez.es', '2021-06-12 13:14:52', '{\"partidas\":3,\"camisas\":\"1\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"22\",\"23\",\"6\"]}', 1, '26.3', 0, '0000-00-00 00:00:00'),
(31, 'Jorge', 'Lopez', 'jorge@lopez.es', '2021-06-13 13:27:04', '{\"partidas\":3,\"camisas\":\"1\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"22\",\"23\",\"6\"]}', 1, '26.3', 0, '0000-00-00 00:00:00'),
(32, 'prueba', 'prueba', '', '2021-06-13 13:46:32', '{\"partidas\":5,\"camisas\":\"2\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"7\",\"3\",\"4\",\"8\",\"10\"]}', 1, '40.6', 1, '0000-00-00 00:00:00'),
(33, 'prueba ', '3 part', '', '2021-06-13 13:49:48', '{\"partidas\":3,\"camisas\":\"2\",\"pegatinas\":\"2\"}', '{\"eventos\":[\"22\",\"3\",\"4\"]}', 1, '37.6', 1, '0000-00-00 00:00:00'),
(34, 'Jesús', 'Martinez Tripiana', 'jj@mm.es', '2021-06-13 22:14:49', '{\"partidas\":3,\"camisas\":\"2\",\"pegatinas\":\"3\"}', '{\"eventos\":[\"7\",\"3\",\"8\"]}', 2, '39.6', 1, '2021-06-09 22:15:21'),
(35, 'Jorge', 'Lopez', 'jorge@lopez.es', '2021-06-13 22:14:49', '{\"partidas\":3,\"camisas\":\"1\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"22\",\"23\",\"6\"]}', 1, '26.3', 0, '0000-00-00 00:00:00'),
(36, 'Jorge', 'Lopez', 'jorge@lopez.es', '2021-06-13 22:14:49', '{\"partidas\":3,\"camisas\":\"1\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"22\",\"23\",\"6\"]}', 1, '26.3', 0, '0000-00-00 00:00:00'),
(37, 'prueba', 'prueba', '', '2021-06-15 13:46:32', '{\"partidas\":5,\"camisas\":\"2\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"7\",\"3\",\"4\",\"8\",\"10\"]}', 1, '40.6', 1, '0000-00-00 00:00:00'),
(38, 'prueba ', '3 part', '', '2021-06-15 13:46:32', '{\"partidas\":3,\"camisas\":\"2\",\"pegatinas\":\"2\"}', '{\"eventos\":[\"22\",\"3\",\"4\"]}', 1, '37.6', 1, '0000-00-00 00:00:00'),
(39, 'Jorge', 'Lopez', 'jorge@lopez.es', '2021-06-16 13:14:52', '{\"partidas\":3,\"camisas\":\"1\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"22\",\"23\",\"6\"]}', 1, '26.3', 0, '0000-00-00 00:00:00'),
(40, 'Jorge', 'Lopez', 'jorge@lopez.es', '2021-06-16 13:14:52', '{\"partidas\":3,\"camisas\":\"1\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"22\",\"23\",\"6\"]}', 1, '26.3', 0, '0000-00-00 00:00:00'),
(41, 'prueba', 'prueba', '', '2021-06-16 13:14:52', '{\"partidas\":5,\"camisas\":\"2\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"7\",\"3\",\"4\",\"8\",\"10\"]}', 1, '40.6', 1, '0000-00-00 00:00:00'),
(42, 'prueba ', '3 part', '', '2021-06-16 13:14:52', '{\"partidas\":3,\"camisas\":\"2\",\"pegatinas\":\"2\"}', '{\"eventos\":[\"22\",\"3\",\"4\"]}', 1, '37.6', 1, '0000-00-00 00:00:00'),
(43, 'Jesús', 'Martinez Tripiana', 'jj@mm.es', '2021-06-16 13:14:52', '{\"partidas\":3,\"camisas\":\"2\",\"pegatinas\":\"3\"}', '{\"eventos\":[\"7\",\"3\",\"8\"]}', 2, '39.6', 1, '2021-06-09 22:15:21'),
(44, 'Jorge', 'Lopez', 'jorge@lopez.es', '2021-06-17 13:14:52', '{\"partidas\":3,\"camisas\":\"1\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"22\",\"23\",\"6\"]}', 1, '26.3', 0, '0000-00-00 00:00:00'),
(45, 'Jorge', 'Lopez', 'jorge@lopez.es', '2021-06-18 13:27:04', '{\"partidas\":3,\"camisas\":\"1\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"22\",\"23\",\"6\"]}', 1, '26.3', 0, '0000-00-00 00:00:00'),
(46, 'prueba', 'prueba', '', '2021-06-18 13:46:32', '{\"partidas\":5,\"camisas\":\"2\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"7\",\"3\",\"4\",\"8\",\"10\"]}', 1, '40.6', 1, '0000-00-00 00:00:00'),
(47, 'prueba ', '3 part', '', '2021-06-21 13:49:48', '{\"partidas\":3,\"camisas\":\"2\",\"pegatinas\":\"2\"}', '{\"eventos\":[\"22\",\"3\",\"4\"]}', 1, '37.6', 1, '0000-00-00 00:00:00'),
(48, 'Jorge', 'Lopez', 'jorge@lopez.es', '2021-06-22 13:14:52', '{\"partidas\":3,\"camisas\":\"1\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"22\",\"23\",\"6\"]}', 1, '26.3', 0, '0000-00-00 00:00:00'),
(49, 'Jorge', 'Lopez', 'jorge@lopez.es', '2021-06-22 13:27:04', '{\"partidas\":3,\"camisas\":\"1\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"22\",\"23\",\"6\"]}', 1, '26.3', 0, '0000-00-00 00:00:00'),
(50, 'prueba', 'prueba', '', '2021-06-10 13:46:32', '{\"partidas\":5,\"camisas\":\"2\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"7\",\"3\",\"4\",\"8\",\"10\"]}', 1, '40.6', 1, '0000-00-00 00:00:00'),
(51, 'prueba ', '3 part', '', '2021-06-10 13:49:48', '{\"partidas\":3,\"camisas\":\"2\",\"pegatinas\":\"2\"}', '{\"eventos\":[\"22\",\"3\",\"4\"]}', 1, '37.6', 1, '0000-00-00 00:00:00'),
(52, 'Jesús', 'Martinez Tripiana', 'jj@mm.es', '2021-06-09 22:14:49', '{\"partidas\":3,\"camisas\":\"2\",\"pegatinas\":\"3\"}', '{\"eventos\":[\"7\",\"3\",\"8\"]}', 2, '39.6', 1, '2021-06-09 22:15:21'),
(53, 'Jorge', 'Lopez', 'jorge@lopez.es', '2021-06-10 13:14:52', '{\"partidas\":3,\"camisas\":\"1\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"22\",\"23\",\"6\"]}', 1, '26.3', 0, '0000-00-00 00:00:00'),
(54, 'Jorge', 'Lopez', 'jorge@lopez.es', '2021-06-10 13:27:04', '{\"partidas\":3,\"camisas\":\"1\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"22\",\"23\",\"6\"]}', 1, '26.3', 0, '0000-00-00 00:00:00'),
(55, 'prueba', 'prueba', '', '2021-06-10 13:46:32', '{\"partidas\":5,\"camisas\":\"2\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"7\",\"3\",\"4\",\"8\",\"10\"]}', 1, '40.6', 1, '0000-00-00 00:00:00'),
(56, 'prueba ', '3 part', '', '2021-06-10 13:49:48', '{\"partidas\":3,\"camisas\":\"2\",\"pegatinas\":\"2\"}', '{\"eventos\":[\"22\",\"3\",\"4\"]}', 1, '37.6', 1, '0000-00-00 00:00:00'),
(57, 'Jorge', 'Lopez', 'jorge@lopez.es', '2021-06-10 13:14:52', '{\"partidas\":3,\"camisas\":\"1\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"22\",\"23\",\"6\"]}', 1, '26.3', 0, '0000-00-00 00:00:00'),
(58, 'Jorge', 'Lopez', 'jorge@lopez.es', '2021-06-10 13:27:04', '{\"partidas\":3,\"camisas\":\"1\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"22\",\"23\",\"6\"]}', 1, '26.3', 0, '0000-00-00 00:00:00'),
(59, 'prueba', 'prueba', '', '2021-06-10 13:46:32', '{\"partidas\":5,\"camisas\":\"2\",\"pegatinas\":\"1\"}', '{\"eventos\":[\"7\",\"3\",\"4\",\"8\",\"10\"]}', 1, '40.6', 1, '0000-00-00 00:00:00'),
(60, 'prueba ', '3 part', '', '2021-06-10 13:49:48', '{\"partidas\":3,\"camisas\":\"2\",\"pegatinas\":\"2\"}', '{\"eventos\":[\"22\",\"3\",\"4\"]}', 1, '37.6', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regalos`
--

CREATE TABLE `regalos` (
  `id_regalo` int(11) NOT NULL,
  `nombre_regalo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `regalos`
--

INSERT INTO `regalos` (`id_regalo`, `nombre_regalo`) VALUES
(1, 'Pegatinas'),
(2, 'Pulsera'),
(3, 'Llavero');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `directores_de_juego`
--
ALTER TABLE `directores_de_juego`
  ADD PRIMARY KEY (`id_director`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_cat_evento` (`id_cat_evento`),
  ADD KEY `id_direct` (`id_direct`);

--
-- Indices de la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id_participante`),
  ADD KEY `regalo` (`regalo`);

--
-- Indices de la tabla `regalos`
--
ALTER TABLE `regalos`
  ADD PRIMARY KEY (`id_regalo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  MODIFY `id_categoria` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `directores_de_juego`
--
ALTER TABLE `directores_de_juego`
  MODIFY `id_director` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id_participante` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `regalos`
--
ALTER TABLE `regalos`
  MODIFY `id_regalo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cat_evento`) REFERENCES `categoria_evento` (`id_categoria`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_direct`) REFERENCES `directores_de_juego` (`id_director`);

--
-- Filtros para la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD CONSTRAINT `participantes_ibfk_1` FOREIGN KEY (`regalo`) REFERENCES `regalos` (`id_regalo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
