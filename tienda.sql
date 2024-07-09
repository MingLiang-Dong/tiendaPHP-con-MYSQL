-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2024 a las 13:42:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(16) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `imagen` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `descripcion`, `imagen`) VALUES
(1, 'audio y hifi', 'https://th.bing.com/th/id/R.e0d4bad25a55cfcea319f6a30d94968a?rik=3B89I5aHNEbVew&pid=ImgRaw&r=0'),
(2, 'Televisiones', 'https://conceptodefinicion.de/wp-content/uploads/2017/11/Televisi%C3%B3n2.jpg'),
(4, 'Electrodomésticos', 'https://th.bing.com/th/id/OIP.7dgAPuV2BKQ0GS3FQQAElAHaEj?rs=1&pid=ImgDetMain');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `los_pedidos`
--

CREATE TABLE `los_pedidos` (
  `i_pedido` int(16) NOT NULL,
  `user` varchar(16) NOT NULL,
  `id_producto` int(16) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `cantidad` int(16) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `los_pedidos`
--

INSERT INTO `los_pedidos` (`i_pedido`, `user`, `id_producto`, `descripcion`, `cantidad`, `precio`) VALUES
(15, 'a', 1, 'APPLE AirPods Pro (2023 2ª gen), Conexión USB-C, Inalámbricos, Bluetooth®, Estuche de carga inalámbrica, Chip H2, Siri, Blanco', 2, 265.99),
(17, 'a', 1, 'APPLE AirPods Pro (2023 2ª gen), Conexión USB-C, Inalámbricos, Bluetooth®, Estuche de carga inalámbrica, Chip H2, Siri, Blanco', 1, 265.99),
(18, 'a', 1, 'APPLE AirPods Pro (2023 2ª gen), Conexión USB-C, Inalámbricos, Bluetooth®, Estuche de carga inalámbrica, Chip H2, Siri, Blanco', 1, 265.99),
(18, 'a', 3, 'Auriculares inalámbricos - Sony WH-CH720NB, Cancelación ruido (Noise Cancelling), 35h, Carga Rápida, Con Asistente, Bluetooth, De Diadema, ANC, Negro', 1, 79.99),
(18, 'a', 4, 'TV Neo QLED 85\" - Samsung TQ85QN85DBTXXC, UHD 4K, Procesador NQ4 AI Gen2, Smart TV, DVB-T2 (H.265), Carbon Silver', 1, 3399),
(18, 'a', 345, 'Horno - Balay 3HB4131X2, Multifunción, Aqualisis, 7 funciones, 71 L, Inox', 1, 15),
(19, 'ming', 3, 'Auriculares inalámbricos - Sony WH-CH720NB, Cancelación ruido (Noise Cancelling), 35h, Carga Rápida, Con Asistente, Bluetooth, De Diadema, ANC, Negro', 3, 79.99),
(19, 'ming', 4, 'TV Neo QLED 85\" - Samsung TQ85QN85DBTXXC, UHD 4K, Procesador NQ4 AI Gen2, Smart TV, DVB-T2 (H.265), Carbon Silver', 1, 3399);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `i_pedido` int(16) NOT NULL,
  `user` varchar(16) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`i_pedido`, `user`, `fecha`, `total`) VALUES
(5, 'a', '2024-05-13 23:45:17', 531.98),
(6, 'a', '2024-05-13 23:47:09', 797.97),
(7, 'a', '2024-05-13 23:52:23', 531.98),
(8, 'a', '2024-05-13 23:53:54', 265.99),
(10, 'a', '2024-05-13 23:55:05', 265.99),
(11, 'a', '2024-05-13 23:55:24', 797.97),
(12, 'a', '2024-05-13 23:58:00', 797.97),
(13, 'a', '2024-05-13 23:59:33', 797.97),
(14, 'a', '2024-05-13 23:59:54', 265.99),
(15, 'a', '2024-05-15 16:42:11', 531.98),
(16, 'a', '2024-05-15 17:11:23', 0),
(17, 'a', '2024-05-15 17:23:45', 265.99),
(18, 'a', '2024-05-15 23:51:45', 3759.98),
(19, 'ming', '2024-05-16 10:47:11', 3638.97);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(16) NOT NULL,
  `id_categoria` int(16) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `precio` float NOT NULL,
  `stock` int(16) NOT NULL,
  `imagen` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_categoria`, `descripcion`, `precio`, `stock`, `imagen`) VALUES
(1, 1, 'APPLE AirPods Pro (2023 2ª gen), Conexión USB-C, Inalámbricos, Bluetooth®, Estuche de carga inalámbrica, Chip H2, Siri, Blanco', 265.99, 1, 'https://assets.mmsrg.com/isr/166325/c1/-/ASSET_MMS_130520747?x=536&y=402&format=jpg&quality=80&sp=yes&strip=yes&trim&ex=536&ey=402&align=center&resizesource&unsharp=1.5x1+0.7+0.02&cox=0&coy=0&cdx=536&cdy=402'),
(2, 1, 'Altavoz de gran potencia - Vieta Pro Mini Thunder, 100W, IPX6, True Wireless, Hasta 15hs, Negro', 99.99, 50, 'https://assets.mmsrg.com/isr/166325/c1/-/ASSET_MMS_106932971?x=536&y=402&format=jpg&quality=80&sp=yes&strip=yes&trim&ex=536&ey=402&align=center&resizesource&unsharp=1.5x1+0.7+0.02&cox=0&coy=0&cdx=536&cdy=402'),
(3, 1, 'Auriculares inalámbricos - Sony WH-CH720NB, Cancelación ruido (Noise Cancelling), 35h, Carga Rápida, Con Asistente, Bluetooth, De Diadema, ANC, Negro', 79.99, 6, 'https://assets.mmsrg.com/isr/166325/c1/-/ASSET_MMS_102583607?x=536&y=402&format=jpg&quality=80&sp=yes&strip=yes&trim&ex=536&ey=402&align=center&resizesource&unsharp=1.5x1+0.7+0.02&cox=0&coy=0&cdx=536&cdy=402'),
(4, 2, 'TV Neo QLED 85º - Samsung TQ8QN85DBTXXC, UHD 4K, Procesador NQ4 AI Gen2, Smart TV, DVB-T2 (H.265), Carbon Silver', 3399, 18, 'https://assets.mmsrg.com/isr/166325/c1/-/ASSET_MMS_139320930?x=536&y=402&format=jpg&quality=80&sp=yes&strip=yes&trim&ex=536&ey=402&align=center&resizesource&unsharp=1.5x1+0.7+0.02&cox=0&coy=0&cdx=536&cdy=402'),
(5, 2, 'TV LED 55º - Xiaomi TV P1E, UHD 4K, Smart TV, HDR10, Google Assistant, Dolby Audio™, DTS-HD®, Negro', 309, 25, 'https://assets.mmsrg.com/isr/166325/c1/-/ASSET_MMS_97531426?x=536&y=402&format=jpg&quality=80&sp=yes&strip=yes&trim&ex=536&ey=402&align=center&resizesource&unsharp=1.5x1+0.7+0.02&cox=0&coy=0&cdx=536&cdy=402'),
(6, 4, 'Lavadora', 398, 25, 'https://assets.mmsrg.com/isr/166325/c1/-/ASSET_MMS_136549603?x=536&y=402&format=jpg&quality=80&sp=yes&strip=yes&trim&ex=536&ey=402&align=center&resizesource&unsharp=1.5x1+0.7+0.02&cox=0&coy=0&cdx=536&cdy=402'),
(7, 4, 'Frigorífico combi - Samsung SMART AI RB38C776CS9/EF, No Frost, 203 cm, 390l, All-Around Cooling, Metal Cooling,WiFi, Inox', 24, 57, 'https://assets.mmsrg.com/isr/166325/c1/-/ASSET_MMS_106839997?x=536&y=402&format=jpg&quality=80&sp=yes&strip=yes&trim&ex=536&ey=402&align=center&resizesource&unsharp=1.5x1+0.7+0.02&cox=0&coy=0&cdx=536&cdy=402'),
(24, 2, 'samsumg', 23, 300, 'https://media.cecotec.cloud/02615/tv-a2-series-alu20065_9qkp1w_1.png:md'),
(345, 4, 'Horno - Balay 3HB4131X2, Multifunción, Aqualisis, 7 funciones, 71 L, Inox', 15, 308, 'https://assets.mmsrg.com/isr/166325/c1/-/ASSET_MMS_93916794?x=536&y=402&format=jpg&quality=80&sp=yes&strip=yes&trim&ex=536&ey=402&align=center&resizesource&unsharp=1.5x1+0.7+0.02&cox=0&coy=0&cdx=536&cdy=402');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `rol` varchar(10) NOT NULL,
  `email` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user`, `password`, `rol`, `email`) VALUES
('a', 'a', 'user', 'a@gmail.com'),
('admin', '1234', 'admin', ''),
('juan', 'juan1234', 'user', ''),
('ming', '1234', 'user', 'ming@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `los_pedidos`
--
ALTER TABLE `los_pedidos`
  ADD PRIMARY KEY (`i_pedido`,`user`,`id_producto`),
  ADD KEY `USER` (`user`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`i_pedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `i_pedido` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `los_pedidos`
--
ALTER TABLE `los_pedidos`
  ADD CONSTRAINT `USER` FOREIGN KEY (`user`) REFERENCES `usuarios` (`user`),
  ADD CONSTRAINT `fk12` FOREIGN KEY (`i_pedido`) REFERENCES `pedidos` (`i_pedido`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
