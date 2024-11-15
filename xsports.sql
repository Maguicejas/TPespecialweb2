-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2024 a las 03:29:09
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `xsports`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `ID_Actividad` int(11) NOT NULL,
  `deporte` varchar(45) NOT NULL,
  `horario` time NOT NULL,
  `fecha` date NOT NULL,
  `Profesor` varchar(80) NOT NULL,
  `ID_Club` int(11) NOT NULL,
  `ID_Categoria` int(11) NOT NULL,
  `suspendida` tinyint(4) NOT NULL DEFAULT 0,
  `img` varchar(1000) NOT NULL,
  `Calificación` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`ID_Actividad`, `deporte`, `horario`, `fecha`, `Profesor`, `ID_Club`, `ID_Categoria`, `suspendida`, `img`, `Calificación`) VALUES
(2, 'Funcional', '17:10:00', '2024-09-16', 'Julieta Brandi', 8, 2, 0, '', 5),
(3, 'Musculación', '07:00:00', '2024-09-16', 'Tomás Diaz', 8, 2, 0, '', 5),
(4, 'Pilates', '16:00:00', '2024-09-20', 'Lucio Alegre', 9, 2, 0, '', 0),
(5, 'Natación', '17:30:00', '2024-10-17', 'Pedro Bueno', 8, 1, 0, '', 4),
(6, 'Fútbol', '17:30:00', '2010-10-24', 'Juan Diez', 9, 3, 0, '', 0),
(7, 'Vóley', '18:30:00', '2015-10-24', 'Valentin Lopez/ Sol Gonzales ', 8, 3, 0, '', 5),
(8, 'Básquetbol', '18:30:00', '2015-10-24', 'Bautista Carriego/Juan Berdutti', 9, 3, 0, '', 0),
(10, 'Natación niños', '16:30:00', '2022-10-24', 'Juliana Lopez/Bruno Canne', 9, 1, 0, '', 0),
(17, 'HIP HOP', '18:30:00', '2017-10-24', 'Valentino Mirasol', 9, 4, 0, '', 0),
(18, 'Zumba', '19:00:00', '2018-10-24', 'Lucia Spenetti', 9, 4, 0, '', 0),
(19, 'Danzas clásicas', '17:00:00', '2015-10-24', 'Soledad Arcos', 8, 4, 0, '', 5),
(20, 'Danza juvenil', '17:30:00', '2019-10-24', 'Fernanda Gago', 8, 4, 0, '', 0),
(21, 'Tenis', '14:30:00', '2023-10-24', 'Juana Otero', 9, 5, 0, '', 0),
(22, 'Padel', '13:00:00', '2023-10-24', 'Tomás Diaz', 9, 5, 0, '', 0),
(23, 'Meditación con la naturaleza', '15:30:00', '2023-10-24', 'Luz de Sol', 10, 5, 0, '', 0),
(24, 'Running', '18:30:00', '2025-10-24', 'Luciano Grande', 8, 6, 0, '', 4),
(25, 'Salto de longitud', '18:30:00', '2025-10-24', 'Fermín Juanes', 8, 6, 0, '', 0),
(26, 'Carreras con vallas', '17:30:00', '2024-10-24', 'Florencia Fernandez', 9, 6, 0, '', 0),
(37, 'Natacion grupal', '17:13:00', '2024-10-23', 'Luis Mendez', 8, 3, 0, '', 0),
(38, 'Hockey damas', '16:00:00', '2024-10-23', 'Juliana Mara', 9, 8, 0, '', 0),
(41, 'Boxeo', '16:33:00', '2024-10-18', 'Jorge Busto', 9, 26, 0, 'https://th.bing.com/th/id/R.d372783dbbac1289652c3ac94a4499f6?rik=FbPS2bmx5ouZ%2fA&pid=ImgRaw&r=0', 5),
(42, 'Spinning acuático', '09:30:00', '2024-10-17', 'Luisina Fernandez', 10, 1, 0, '', 0),
(46, 'Box funcional', '19:30:00', '2024-10-18', 'Juan Cruz Caponetti', 10, 26, 0, '', 0),
(50, 'Taekwondo', '18:07:00', '2024-10-28', 'Martin Chan', 8, 26, 0, '', 0),
(56, 'Ritmos', '17:00:00', '2024-09-16', 'Tomás Diaz', 10, 4, 0, '', 5),
(58, 'Salsa', '17:00:00', '2024-09-16', 'Tomás Diaz', 9, 4, 0, '', 5),
(61, 'Ritmo libre', '17:00:00', '2024-09-16', 'Franco Gilona', 8, 4, 0, '', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_Categoria` int(11) NOT NULL,
  `nombreCate` varchar(100) NOT NULL,
  `suspendida` tinyint(4) DEFAULT 0,
  `imagen` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_Categoria`, `nombreCate`, `suspendida`, `imagen`) VALUES
(1, 'Deportes acuáticos', 0, ''),
(2, 'Deportes de fuerza', 0, ''),
(3, 'Deportes en grupo', 0, ''),
(4, 'Danza', 0, ''),
(5, 'Deportes al aire libre', 0, ''),
(6, 'Atletismo ', 0, ''),
(8, 'Hockey', 0, ''),
(26, 'Lucha Libre', 0, 'https://th.bing.com/th/id/OIP.xlMzgbG-b9IgmdChgb1IWgHaE8?rs=1&pid=ImgDetMain');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `club`
--

CREATE TABLE `club` (
  `ID_Club` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `formaPago` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `club`
--

INSERT INTO `club` (`ID_Club`, `nombre`, `direccion`, `formaPago`) VALUES
(8, 'Xsports', 'Av.Brasil 234', 'Efectivo'),
(9, 'Xsports', 'Av.Brasil 234', 'Débito'),
(10, 'Xsports', 'Av.Brasil 234', 'Crédito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_U` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contraseña` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_U`, `email`, `contraseña`) VALUES
(1, 'usuario@1', '$2y$10$xQop0wF1YJ/dKhZcWDqHceUM96S04u73zGeJtU80a1GmM.H5H0EHC'),
(2, 'webadmin', '$2y$10$XeZnA4eIE9i6iu3LZzaJT.k1NXHQSAV4isXbvNTn4BHyalSORTKva');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`ID_Actividad`),
  ADD KEY `Categoria` (`ID_Categoria`),
  ADD KEY `ID_Club` (`ID_Club`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_Categoria`);

--
-- Indices de la tabla `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`ID_Club`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_U`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `ID_Actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_U` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`ID_Categoria`) REFERENCES `categoria` (`ID_Categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `actividad_ibfk_2` FOREIGN KEY (`ID_Club`) REFERENCES `club` (`ID_Club`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
