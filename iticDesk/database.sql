CREATE DATABASE IF NOT EXISTS manuel_perez_iticdesk;
USE manuel_perez_iticdesk;

CREATE USER IF NOT EXISTS 'manuel'@'localhost' IDENTIFIED BY 'manuel';
GRANT ALL PRIVILEGES ON . TO 'manuel'@'localhost' WITH GRANT OPTION;

FLUSH PRIVILEGES;

-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-02-2025 a las 17:09:16
-- Versión del servidor: 8.0.40-0ubuntu0.24.04.1
-- Versión de PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `manuel_perez_iticdesk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencies`
--

CREATE TABLE `incidencies` (
  `id` int NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `prioritat` enum('I','II','III','IV') NOT NULL,
  `titol` varchar(100) NOT NULL,
  `descripcio` text NOT NULL,
  `usuari_email` varchar(100) NOT NULL,
  `data_creacio` datetime DEFAULT CURRENT_TIMESTAMP,
  `estat` enum('Oberta','Gestio','Tancada','Reoberta') DEFAULT 'Oberta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `incidencies`
--

INSERT INTO `incidencies` (`id`, `referencia`, `prioritat`, `titol`, `descripcio`, `usuari_email`, `data_creacio`, `estat`) VALUES
(1, 'INC005', 'II', 'Projector sense senyal', 'El projector de l’aula 3 no detecta cap entrada de vídeo.', 'erictorrente@gmail.com', '2025-02-26 18:08:49', 'Gestio'),
(2, 'INC006', 'I', 'Fallada en el servidor de correu', 'Els correus electrònics no s’estan enviant ni rebent correctament.', 'manuelperez@gmail.com', '2025-02-26 18:08:49', 'Oberta'),
(3, 'INC003', 'I', 'Caiguda del sistema de xarxa', 'La xarxa interna ha deixat de funcionar i afecta a totes les aules.', 'aaronrodriguez@gmail.com', '2025-02-26 18:08:49', 'Oberta'),
(4, 'INC004', 'II', 'Error d’accés a l’aplicació', 'Diversos usuaris no poden iniciar sessió en l’aplicació de gestió.', 'alexramos@gmail.com', '2025-02-26 18:08:49', 'Gestio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

CREATE TABLE `usuaris` (
  `id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `cognom` varchar(100) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rol` enum('professor','administrador') NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`id`, `nom`, `cognom`, `dni`, `email`, `rol`, `password`) VALUES
(1, 'eric', 'torrente', '19015812P', 'erictorrente@gmail.com', 'professor', 'eric'),
(2, 'manuel', 'perez', '89329423I', 'manuelperez@gmail.com', 'administrador', 'manuel'),
(3, 'aaron', 'rodriguez', '76335459P', 'aaronrodriguez@gmail.com', 'professor', 'aaron'),
(4, 'alex', 'ramos', '54864520M', 'alexramos@gmail.com', 'administrador', 'alex');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencies`
--
ALTER TABLE `incidencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referencia` (`referencia`),
  ADD KEY `usuari_email` (`usuari_email`);

--
-- Indices de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencies`
--
ALTER TABLE `incidencies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidencies`
--
ALTER TABLE `incidencies`
  ADD CONSTRAINT `incidencies_ibfk_1` FOREIGN KEY (`usuari_email`) REFERENCES `usuaris` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
