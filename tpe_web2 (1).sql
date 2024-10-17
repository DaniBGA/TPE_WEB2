-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2024 a las 03:57:12
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
  `marca` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `marca`, `descripcion`) VALUES
(1, 'Audi', 'Audi es una empresa multinacional alemana fabricante de automóviles de gama alta de lujo y deportivos. Su sede central se encuentra en Ingolstadt, Baviera y forma parte desde 1965 del Grupo Volkswagen. '),
(2, 'BMW', 'BMW pronunciación alemana:[be-em-ve] es un fabricante alemán de automóviles y motocicletas de alta gama y lujo, cuya sede se encuentra en Múnich. Sus subsidiarias son Mini, Rolls-Royce, BMW i y BMW Bank.'),
(3, 'ford', 'Ford Motor Company es una empresa multinacional fabricante de automóviles de origen estadounidense. Con su sede central ubicada en Dearborn, Estados Unidos, se ha expandido a nivel mundial destacándose principalmente por la producción de automóviles, vehículos comerciales y automóviles de carreras.'),
(4, 'Toyota', 'Toyota Motor Corporation ​ es una empresa japonesa de fabricación de automóviles. Fundada en 1933 por Kiichiro Toyoda, su sede principal está ubicada en Toyota y Bunkyō aunque, por su carácter multinacional, cuenta con fábricas y sedes en varios países.​ '),
(5, 'Volkswagen', 'Volkswagen es un fabricante de automóviles con sede en Wolfsburgo, Baja Sajonia, Alemania.​ Volkswagen es la marca original y más vendida del Grupo Volkswagen, primer fabricante de autos en el mundo en 2020.​Volkswagen significa «automóvil del pueblo» en alemán.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` int(11) NOT NULL,
  `motor` varchar(100) NOT NULL,
  `kilometros` int(11) NOT NULL,
  `Detalles` text NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID`, `Nombre`, `marca`, `modelo`, `motor`, `kilometros`, `Detalles`, `precio`) VALUES
(1, 'Audi TT', 'Audi', 2012, ' motores turbo de cuatro cilindros con potencias de entre 150 y 225 CV y una unidad V6 con 250 CV.', 0, 'Que el Audi TT Coupé es un auténtico atleta es algo que vas a notar a primera vista. Y lo harás gracias a sus características destacadas, como la parrilla Audi Singleframe tridimensional, las grandes tomas de aire laterales en el frontal o los tubos de escape en posición central y simétrica en la parte trasera. Opcionalmente, también tenés a disposición una amplia gama de llantas. El interior del vehículo prolonga las líneas definidas del Audi TT Coupé. Aferrate al volante de cuero de tres radios desde tu asiento deportivo. O también podés elegir de forma opcional los asientos deportivos S, y el apoyo lumbar de 4 posiciones.', 23000),
(5, 'Audi a9', 'Audi', 2013, 'v6', 2200, 'Paragolpes rayado, Neumaticos: 60%', 9000),
(6, 'Audi RS', 'Audi', 2020, 'v6', 100, 'bolillero a revisar', 13000),
(7, 'Audi a8', 'Audi', 2021, 'v8', 0, 'nuevo', 40000),
(8, 'Ford Focus', 'ford', 2020, 'F8', 2000, 'gomas gastadas', 10000);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
