-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 09-07-2021 a las 16:11:45
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `panal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apiario`
--

DROP TABLE IF EXISTS `apiario`;
CREATE TABLE IF NOT EXISTS `apiario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `municipio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vereda` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `finca` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacoras`
--

DROP TABLE IF EXISTS `bitacoras`;
CREATE TABLE IF NOT EXISTS `bitacoras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bitacora` text COLLATE utf8_spanish_ci NOT NULL,
  `actividad` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `calificacion` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colmena`
--

DROP TABLE IF EXISTS `colmena`;
CREATE TABLE IF NOT EXISTS `colmena` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero` int NOT NULL,
  `cajas` int NOT NULL,
  `tamaño` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `alimentador` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion`
--

DROP TABLE IF EXISTS `produccion`;
CREATE TABLE IF NOT EXISTS `produccion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_apiarioP` int NOT NULL,
  `total` int NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_apiarioP` (`id_apiarioP`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rendimiento`
--

DROP TABLE IF EXISTS `rendimiento`;
CREATE TABLE IF NOT EXISTS `rendimiento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `calificacion` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

DROP TABLE IF EXISTS `tareas`;
CREATE TABLE IF NOT EXISTS `tareas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tarea` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `contraseña` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `rol` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

#obtener todos los apiairos que le pertenecen al usuario 
SELECT ap.*  FROM user_api up
INNER JOIN  apiario ap ON up.id_apiariosU = ap.id
INNER JOIN usuario us ON up.id_usuarioA = us.id 
WHERE us.id = 1;

#obtener todos los usurios que pertenecen a ese apiario
SELECT us.*  FROM user_api up
INNER JOIN  apiario ap ON up.id_apiariosU = ap.id
INNER JOIN usuario us ON up.id_usuarioA = us.id 
WHERE ap.id = 1;

#contar el total de colmenas que tiene un apiario
SELECT count(id) FROM  colmena WHERE id_apiarioC = 1;

#sumar el toral de la mier recolectada en el apiario
SELECT SUM(peso) AS 'total' FROM  produccion WHERE id_apiarioP = 1;