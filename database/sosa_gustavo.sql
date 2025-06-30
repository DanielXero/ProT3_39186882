-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2025 a las 03:54:58
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
-- Base de datos: `sosa_gustavo`
--
CREATE DATABASE IF NOT EXISTS `sosa_gustavo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `sosa_gustavo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--
-- Creación: 19-06-2025 a las 19:41:01
--

CREATE TABLE `roles` (
  `id_rol` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2025-06-19 20:05:12', '2025-06-19 20:05:12'),
(2, 'cliente', '2025-06-19 20:05:12', '2025-06-19 20:05:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--
-- Creación: 21-06-2025 a las 16:50:24
-- Última actualización: 30-06-2025 a las 01:49:57
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL DEFAULT 2,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `baja` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `rol_id`, `nombre`, `apellido`, `email`, `password`, `telefono`, `baja`, `created_at`, `updated_at`) VALUES
(4, 1, 'Juan', 'Perez', 'Perez@gmail.com', '$2y$10$np.ZEv1PQ9sYGClrfoK05uyhxoLTBJgj.X5KRbbNPS4b1sOOnWxi.', '2131232131', 0, '2025-06-30 02:17:25', '2025-06-30 04:14:23'),
(5, 2, 'José', 'Garcian', 'jGarcia@gmail.com', '$2y$10$WB3kdNfkyPYfq0MwJi9Ea.4bC/wD.T.JV/MYolSVz0Czb24PrfqL.', '12312312321', 0, '2025-06-30 02:22:01', '2025-06-30 04:15:29'),
(6, 2, 'Ruben', 'Ruiz', 'RRuiz@gmail.com', '$2y$10$aOkuKZkcDyla7iQVcJJGF.71pybgjiywVMFJ.tfY9mdAzoulqaEmi', '1232131231', 0, '2025-06-30 02:46:47', '2025-06-30 04:15:48'),
(7, 2, 'Admin', 'Principal', 'admin@zhennova.com', '$2y$10$rPoJJDW3REjVYMn7O92xiuRe4DB4d704Eaj86y1tv21xBWKJPiJGW', '5491112345678', 0, '2025-06-30 04:47:17', '2025-06-30 04:47:17'),
(8, 2, 'Admin', 'Secundario', 'admin2@zhennova.com', '$2y$10$OlRbxhZP5JrOV7jHagwAoua8NQu3IBqpqBk89nazqxq0QCnT4RpYW', '5493700123456', 0, '2025-06-30 04:48:16', '2025-06-30 04:48:16'),
(9, 2, 'Juan', 'Perez', 'juan.perez@example.com', '$2y$10$pDykGcgRRZfgPf/rmUXDiuKZBpl/ySNh14oBPi21nlprbZfvRd/W.', '5491198765432', 0, '2025-06-30 04:49:17', '2025-06-30 04:49:17'),
(10, 2, 'Ana', 'Gomez', 'ana.gomez@example.com', '$2y$10$U/CSjzm7/MSJSIvDMkQ1q.7aqufuOQE2jaOP3SKykEXRYpreMhbLW', '5493760789012', 0, '2025-06-30 04:49:57', '2025-06-30 04:49:57');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `unique_rol_descripcion` (`descripcion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
