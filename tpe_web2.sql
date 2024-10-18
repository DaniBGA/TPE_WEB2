-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2024 a las 19:12:17
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
-- Base de datos: `tpe_web2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `marca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `marca`) VALUES
(1, 'Audi'),
(2, 'BMW'),
(3, 'ford'),
(4, 'Toyota'),
(5, 'Volkswagen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `imagen` varchar(300) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` int(11) NOT NULL,
  `motor` varchar(100) NOT NULL,
  `kilometros` int(11) NOT NULL,
  `detalles` text NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID`, `nombre`, `imagen`, `marca`, `modelo`, `motor`, `kilometros`, `detalles`, `precio`) VALUES
(1, 'Audi TT', 'https://upload.wikimedia.org/wikipedia/commons/f/f5/Audi_TT_Coupé_2.0_TFSI_quattro_S-line_%288S%29_–_Frontansicht%2C_3._April_2015%2C_Düsseldorf.jpg', 'Audi', 2012, ' motores turbo de cuatro cilindros con potencias de entre 150 y 225 CV y una unidad V6 con 250 CV.', 0, 'Que el Audi TT Coupé es un auténtico atleta es algo que vas a notar a primera vista. Y lo harás gracias a sus características destacadas, como la parrilla Audi Singleframe tridimensional, las grandes tomas de aire laterales en el frontal o los tubos de escape en posición central y simétrica en la parte trasera. Opcionalmente, también tenés a disposición una amplia gama de llantas. El interior del vehículo prolonga las líneas definidas del Audi TT Coupé. Aferrate al volante de cuero de tres radios desde tu asiento deportivo. O también podés elegir de forma opcional los asientos deportivos S, y el apoyo lumbar de 4 posiciones.', 23000),
(5, 'Audi a9', '', 'Audi', 2013, 'v6', 2200, 'Paragolpes rayado, Neumaticos: 60%', 9000),
(6, 'Audi RS', '', 'Audi', 2020, 'v6', 100, 'bolillero a revisar', 13000),
(7, 'Audi a8', '', 'Audi', 2021, 'v8', 0, 'nuevo', 40000),
(8, 'Ford Focus', '', 'ford', 2020, 'F8', 2000, 'gomas gastadas', 10000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$NgJFD3PHdR9p7CHiZEZ9xuCfJPF69gNvL0zvuLa2ea5yS/EjgKaMi', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `marca` (`marca`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `marca` (`marca`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`marca`) REFERENCES `categoria` (`marca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
