-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 15-03-2025 a las 18:45:28
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tesla`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `nombre`, `descripcion`) VALUES
(1, 'Vehículos', 'Modelos'),
(2, 'Tienda', 'Accesorios y otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `pedido_id` int(11) NOT NULL,
  `numero_id` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `enviado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`pedido_id`, `numero_id`, `fecha`, `enviado`) VALUES
(2, 2, '2024-10-15 20:31:01', 0),
(3, 2, '2024-10-15 20:31:17', 0),
(4, 2, '2024-10-20 19:35:28', 0),
(5, 2, '2024-10-21 17:34:19', 0),
(6, 2, '2024-11-04 16:32:19', 0),
(7, 2, '2024-11-04 16:53:33', 0),
(8, 2, '2024-11-04 16:55:34', 0),
(9, 4, '2025-02-18 18:50:21', 0),
(10, NULL, '2025-02-18 23:21:57', 0),
(11, NULL, '2025-02-18 23:38:02', 0),
(12, 2, '2025-02-19 18:24:31', 0),
(13, 4, '2025-02-24 00:30:01', 0),
(14, 4, '2025-02-24 12:51:06', 0),
(15, 2, '2025-02-24 12:56:16', 0),
(16, 2, '2025-02-24 20:16:51', 0),
(17, 2, '2025-02-24 20:24:29', 0),
(18, 2, '2025-02-24 20:25:25', 0),
(19, 2, '2025-02-24 20:25:28', 0),
(20, 2, '2025-02-24 20:25:52', 0),
(21, 4, '2025-03-05 19:32:09', 0),
(22, 4, '2025-03-05 19:32:36', 0),
(23, NULL, '2025-03-05 19:37:54', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_productos`
--

CREATE TABLE `pedidos_productos` (
  `pedido_producto_id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` int(11) NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `imagen_url` varchar(255) DEFAULT NULL,
  `precio` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `nombre`, `descripcion`, `categoria_id`, `stock`, `imagen_url`, `precio`) VALUES
(1, 'MODEL S', 'Sedán eléctrico de lujo que combina potencia, tecnología avanzada y un diseño atractivo. Ideal para aquellos que buscan un vehículo de alto rendimiento sin sacrificar el confort y la sostenibilidad.', 1, 1000, '/img/modelS.jpg', '93970€'),
(2, 'MODEL 3', 'Sedán eléctrico compacto que ofrece un equilibrio perfecto entre rendimiento, eficiencia y tecnología. Con una autonomía de hasta 566 km y una aceleración de 0 a 100 km/h en aproximadamente 5.3 segundos, es ideal para la conducción diaria.', 1, 1000, '/img/model3.png', '36470€'),
(3, 'MODEL X', 'SUV eléctrico de lujo que destaca por su innovador diseño y características de alto rendimiento. Autonomía de hasta 561 km y la capacidad de acelerar de 0 a 100 km/h en 3.8 segundos, ofrece un rendimiento excepcional para un vehículo de su tamaño.', 1, 1000, '/img/modelX.jpg', '100970€'),
(4, 'MODEL Y', 'SUV compacto totalmente eléctrico que combina versatilidad y rendimiento. Con una autonomía de hasta 531 km y capacidad para acelerar de 0 a 100 km/h en tan solo 3.5 segundos en su versión Performance, es ideal para familias y aventuras.', 1, 1000, '/img/Model-Y.jpg', '40970€'),
(5, 'Cybertruck', 'Camioneta eléctrica de diseño futurista y robusto, fabricada con una estructura de acero inoxidable de alta resistencia y vidrio blindado. Capacidad de remolque de hasta 6,350 kg y autonomía de hasta 800 km.', 1, 1000, '/img/cybertruck.jpg', '56200€'),
(6, 'Cyberquad', 'Cyberquad para niños', 2, 1000, '/img/cyberquad.jpg', '1690€'),
(7, 'Botella', 'Botella on the road P2M', 2, 1000, '/img/botella.png', '49€'),
(8, 'Salero y Pimentero Tesla', 'Condimente sus desayunos, comidas o cenas.\nLos saleros y pimenteros Tesla están fabricados en acero inoxidable y se adhieren magnéticamente a la base de silicona sin BPA para formar la silueta del rayo de Tesla.', 2, 1000, '/img/salpimentero.png', '49€');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `numero_id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`numero_id`, `email`, `pw`) VALUES
(2, 'lola@gmail.com', '$2y$10$PJd4JgA5xKza.fBgwHWXfegq.EBTFSXp3qkF0617H5z//8E36m9GK'),
(3, 'hola@gmail.com', '$2y$10$mcuibMNe9u3w8HDZAJwR0e8m4Ib5bVN.X4diuKFPnJ3oi8qWDF2OK'),
(4, 'mateosbalibreaandres@gmail.com', '$2y$10$DKI/lj3rbBQ/GjmcO/VFp.dfo58gs5nhCupnc/D60CJJgh2cDzezu');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`pedido_id`),
  ADD KEY `numero_id` (`numero_id`);

--
-- Indices de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  ADD PRIMARY KEY (`pedido_producto_id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`numero_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `pedido_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  MODIFY `pedido_producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `numero_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`numero_id`) REFERENCES `usuarios` (`numero_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  ADD CONSTRAINT `pedidos_productos_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`pedido_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedidos_productos_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`categoria_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
