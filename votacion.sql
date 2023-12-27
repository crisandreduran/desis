-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-12-2023 a las 10:45:14
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
-- Base de datos: `votacion`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListComunaByRegion` (IN `idRegion` INT)   BEGIN
    SELECT * FROM comuna WHERE id_region=idRegion ORDER BY comuna;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidato`
--

CREATE TABLE `candidato` (
  `id` int(11) NOT NULL,
  `candidato` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `candidato`
--

INSERT INTO `candidato` (`id`, `candidato`) VALUES
(1, 'INFORMATICO'),
(2, 'REDES'),
(3, 'TECNICO'),
(4, 'DEVELOPER'),
(5, 'BASE DE DATOS'),
(6, 'JEFE PROYECTO'),
(7, 'SEGURIDAD'),
(8, 'SCRUM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE `comuna` (
  `id` int(11) NOT NULL,
  `comuna` varchar(255) NOT NULL,
  `id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comuna`
--

INSERT INTO `comuna` (`id`, `comuna`, `id_region`) VALUES
(1, 'Arica', 1),
(2, 'Camarones', 1),
(3, 'Putre', 1),
(4, 'General Lagos', 1),
(5, 'Iquique', 2),
(6, 'Alto Hospicio', 2),
(7, 'Pozo Almonte', 2),
(8, 'Camiña', 2),
(9, 'Colchane', 2),
(10, 'Huara', 2),
(11, 'Pica', 2),
(12, 'Antofagasta', 3),
(13, 'Mejillones', 3),
(14, 'Sierra Gorda', 3),
(15, 'Taltal', 3),
(16, 'Calama', 3),
(17, 'Ollagüe', 3),
(18, 'San Pedro de Atacama', 3),
(19, 'Tocopilla', 3),
(20, 'María Elena', 3),
(21, 'Copiapó', 4),
(22, 'Caldera', 4),
(23, 'Tierra Amarilla', 4),
(24, 'Chañaral', 4),
(25, 'Diego de Almagro', 4),
(26, 'Vallenar', 4),
(27, 'Alto del Carmen', 4),
(28, 'Freirina', 4),
(29, 'Huasco', 4),
(30, 'La Serena', 5),
(31, 'Coquimbo', 5),
(32, 'Andacollo', 5),
(33, 'La Higuera', 5),
(34, 'Paihuano', 5),
(35, 'Vicuña', 5),
(36, 'Illapel', 5),
(37, 'Canela', 5),
(38, 'Los Vilos', 5),
(39, 'Salamanca', 5),
(40, 'Ovalle', 5),
(41, 'Combarbalá', 5),
(42, 'Monte Patria', 5),
(43, 'Punitaqui', 5),
(44, 'Río Hurtado', 5),
(45, 'Valparaíso', 6),
(46, 'Casablanca', 6),
(47, 'Concón', 6),
(48, 'Juan Fernández', 6),
(49, 'Puchuncaví', 6),
(50, 'Quintero', 6),
(51, 'Viña del Mar', 6),
(52, 'Isla de Pascua', 6),
(53, 'Los Andes', 6),
(54, 'Calle Larga', 6),
(55, 'Rinconada', 6),
(56, 'San Esteban', 6),
(57, 'La Ligua', 6),
(58, 'Cabildo', 6),
(59, 'Papudo', 6),
(60, 'Petorca', 6),
(61, 'Zapallar', 6),
(62, 'Quillota', 6),
(63, 'La Calera', 6),
(64, 'Hijuelas', 6),
(65, 'La Cruz', 6),
(66, 'Nogales', 6),
(67, 'San Antonio', 6),
(68, 'Algarrobo', 6),
(69, 'Cartagena', 6),
(70, 'El Quisco', 6),
(71, 'El Tabo', 6),
(72, 'Santo Domingo', 6),
(73, 'San Felipe', 6),
(74, 'Catemu', 6),
(75, 'Llay-Llay', 6),
(76, 'Panquehue', 6),
(77, 'Putaendo', 6),
(78, 'Santa María', 6),
(79, 'Quilpué', 6),
(80, 'Limache', 6),
(81, 'Olmué', 6),
(82, 'Villa Alemana', 6),
(83, 'Rancagua', 7),
(84, 'Codegua', 7),
(85, 'Coinco', 7),
(86, 'Coltauco', 7),
(87, 'Doñihue', 7),
(88, 'Graneros', 7),
(89, 'Las Cabras', 7),
(90, 'Machalí', 7),
(91, 'Malloa', 7),
(92, 'Mostazal', 7),
(93, 'Olivar', 7),
(94, 'Peumo', 7),
(95, 'Pichidegua', 7),
(96, 'Quinta de Tilcoco', 7),
(97, 'Rengo', 7),
(98, 'Requínoa', 7),
(99, 'San Vicente', 7),
(100, 'Pichilemu', 7),
(101, 'La Estrella', 7),
(102, 'Litueche', 7),
(103, 'Marchigüe', 7),
(104, 'Navidad', 7),
(105, 'Paredones', 7),
(106, 'San Fernando', 7),
(107, 'Chépica', 7),
(108, 'Chimbarongo', 7),
(109, 'Lolol', 7),
(110, 'Nancagua', 7),
(111, 'Palmilla', 7),
(112, 'Peralillo', 7),
(113, 'Placilla', 7),
(114, 'Pumanque', 7),
(115, 'Santa Cruz', 7),
(116, 'Talca', 8),
(117, 'Constitución', 8),
(118, 'Curepto', 8),
(119, 'Empedrado', 8),
(120, 'Maule', 8),
(121, 'Pelarco', 8),
(122, 'Pencahue', 8),
(123, 'Río Claro', 8),
(124, 'San Clemente', 8),
(125, 'San Rafael', 8),
(126, 'Cauquenes', 8),
(127, 'Chanco', 8),
(128, 'Pelluhue', 8),
(129, 'Curicó', 8),
(130, 'Hualañé', 8),
(131, 'Licantén', 8),
(132, 'Molina', 8),
(133, 'Rauco', 8),
(134, 'Romeral', 8),
(135, 'Sagrada Familia', 8),
(136, 'Teno', 8),
(137, 'Vichuquén', 8),
(138, 'Linares', 8),
(139, 'Colbún', 8),
(140, 'Longaví', 8),
(141, 'Parral', 8),
(142, 'Retiro', 8),
(143, 'San Javier', 8),
(144, 'Villa Alegre', 8),
(145, 'Yerbas Buenas', 8),
(146, 'Chillán', 9),
(147, 'Bulnes', 9),
(148, 'Chillán Viejo', 9),
(149, 'El Carmen', 9),
(150, 'Pemuco', 9),
(151, 'Pinto', 9),
(152, 'Quillón', 9),
(153, 'San Ignacio', 9),
(154, 'Yungay', 9),
(155, 'Quirihue', 9),
(156, 'Cobquecura', 9),
(157, 'Coelemu', 9),
(158, 'Ninhue', 9),
(159, 'Portezuelo', 9),
(160, 'Ránquil', 9),
(161, 'Treguaco', 9),
(162, 'San Carlos', 9),
(163, 'Coihueco', 9),
(164, 'Ñiquén', 9),
(165, 'San Fabián', 9),
(166, 'San Nicolás', 9),
(167, 'Concepción', 10),
(168, 'Coronel', 10),
(169, 'Chiguayante', 10),
(170, 'Florida', 10),
(171, 'Hualqui', 10),
(172, 'Lota', 10),
(173, 'Penco', 10),
(174, 'San Pedro de La Paz', 10),
(175, 'Santa Juana', 10),
(176, 'Talcahuano', 10),
(177, 'Tomé', 10),
(178, 'Hualpén', 10),
(179, 'Lebu', 10),
(180, 'Arauco', 10),
(181, 'Cañete', 10),
(182, 'Contulmo', 10),
(183, 'Curanilahue', 10),
(184, 'Los Álamos', 10),
(185, 'Tirúa', 10),
(186, 'Los Ángeles', 10),
(187, 'Antuco', 10),
(188, 'Cabrero', 10),
(189, 'Laja', 10),
(190, 'Mulchén', 10),
(191, 'Nacimiento', 10),
(192, 'Negrete', 10),
(193, 'Quilaco', 10),
(194, 'Quilleco', 10),
(195, 'San Rosendo', 10),
(196, 'Santa Bárbara', 10),
(197, 'Tucapel', 10),
(198, 'Yumbel', 10),
(199, 'Alto Biobío', 10),
(200, 'Temuco', 11),
(201, 'Carahue', 11),
(202, 'Cunco', 11),
(203, 'Curarrehue', 11),
(204, 'Freire', 11),
(205, 'Galvarino', 11),
(206, 'Gorbea', 11),
(207, 'Lautaro', 11),
(208, 'Loncoche', 11),
(209, 'Melipeuco', 11),
(210, 'Nueva Imperial', 11),
(211, 'Padre Las Casas', 11),
(212, 'Perquenco', 11),
(213, 'Pitrufquén', 11),
(214, 'Pucón', 11),
(215, 'Saavedra', 11),
(216, 'Teodoro Schmidt', 11),
(217, 'Toltén', 11),
(218, 'Vilcún', 11),
(219, 'Villarrica', 11),
(220, 'Cholchol', 11),
(221, 'Angol', 11),
(222, 'Collipulli', 11),
(223, 'Curacautín', 11),
(224, 'Ercilla', 11),
(225, 'Lonquimay', 11),
(226, 'Los Sauces', 11),
(227, 'Lumaco', 11),
(228, 'Purén', 11),
(229, 'Renaico', 11),
(230, 'Traiguén', 11),
(231, 'Victoria', 11),
(232, 'Valdivia', 12),
(233, 'Corral', 12),
(234, 'Lanco', 12),
(235, 'Los Lagos', 12),
(236, 'Máfil', 12),
(237, 'Mariquina', 12),
(238, 'Paillaco', 12),
(239, 'Panguipulli', 12),
(240, 'La Unión', 12),
(241, 'Futrono', 12),
(242, 'Lago Ranco', 12),
(243, 'Río Bueno', 12),
(244, 'Puerto Montt', 13),
(245, 'Calbuco', 13),
(246, 'Cochamó', 13),
(247, 'Fresia', 13),
(248, 'Frutillar', 13),
(249, 'Los Muermos', 13),
(250, 'Llanquihue', 13),
(251, 'Maullín', 13),
(252, 'Puerto Varas', 13),
(253, 'Castro', 13),
(254, 'Ancud', 13),
(255, 'Chonchi', 13),
(256, 'Curaco de Vélez', 13),
(257, 'Dalcahue', 13),
(258, 'Puqueldón', 13),
(259, 'Queilén', 13),
(260, 'Quellón', 13),
(261, 'Quemchi', 13),
(262, 'Quinchao', 13),
(263, 'Osorno', 13),
(264, 'Puerto Octay', 13),
(265, 'Purranque', 13),
(266, 'Puyehue', 13),
(267, 'Río Negro', 13),
(268, 'San Juan de la Costa', 13),
(269, 'San Pablo', 13),
(270, 'Chaitén', 13),
(271, 'Futaleufú', 13),
(272, 'Hualaihué', 13),
(273, 'Palena', 13),
(274, 'Coyhaique', 14),
(275, 'Lago Verde', 14),
(276, 'Aysén', 14),
(277, 'Cisnes', 14),
(278, 'Guaitecas', 14),
(279, 'Cochrane', 14),
(280, 'O\'Higgins', 14),
(281, 'Tortel', 14),
(282, 'Chile Chico', 14),
(283, 'Río Ibáñez', 14),
(284, 'Punta Arenas', 14),
(285, 'Laguna Blanca', 14),
(286, 'Río Verde', 14),
(287, 'San Gregorio', 14),
(288, 'Cabo de Hornos', 14),
(289, 'Antártica', 14),
(290, 'Porvenir', 14),
(291, 'Primavera', 14),
(292, 'Timaukel', 14),
(293, 'Natales', 14),
(294, 'Torres del Paine', 14),
(295, 'Santiago', 16),
(296, 'Cerrillos', 16),
(297, 'Cerro Navia', 16),
(298, 'Conchalí', 16),
(299, 'El Bosque', 16),
(300, 'Estación Central', 16),
(301, 'Huechuraba', 16),
(302, 'Independencia', 16),
(303, 'La Cisterna', 16),
(304, 'La Florida', 16),
(305, 'La Granja', 16),
(306, 'La Pintana', 16),
(307, 'La Reina', 16),
(308, 'Las Condes', 16),
(309, 'Lo Barnechea', 16),
(310, 'Lo Espejo', 16),
(311, 'Lo Prado', 16),
(312, 'Macul', 16),
(313, 'Maipú', 16),
(314, 'Ñuñoa', 16),
(315, 'Pedro Aguirre Cerda', 16),
(316, 'Peñalolén', 16),
(317, 'Providencia', 16),
(318, 'Pudahuel', 16),
(319, 'Quilicura', 16),
(320, 'Quinta Normal', 16),
(321, 'Recoleta', 16),
(322, 'Renca', 16),
(323, 'San Joaquín', 16),
(324, 'San Miguel', 16),
(325, 'San Ramón', 16),
(326, 'Vitacura', 16),
(327, 'Puente Alto', 16),
(328, 'Pirque', 16),
(329, 'San José de Maipo', 16),
(330, 'Colina', 16),
(331, 'Lampa', 16),
(332, 'Til Til', 16),
(333, 'San Bernardo', 16),
(334, 'Buin', 16),
(335, 'Calera de Tango', 16),
(336, 'Paine', 16),
(337, 'Melipilla', 16),
(338, 'Alhué', 16),
(339, 'Curacaví', 16),
(340, 'María Pinto', 16),
(341, 'San Pedro', 16),
(342, 'Talagante', 16),
(343, 'El Monte', 16),
(344, 'Isla de Maipo', 16),
(345, 'Padre Hurtado', 16),
(346, 'Peñaflor', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `region` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`id`, `region`) VALUES
(1, 'ARICA Y PARINACOTA'),
(2, 'TARAPACÁ'),
(3, 'ANTOFAGASTA'),
(4, 'ATACAMA'),
(5, 'COQUIMBO'),
(6, 'VALPARAÍSO'),
(7, 'LIBERTADOR GRAL. BERNARDO O\'HIGGINS'),
(8, 'MAULE'),
(9, 'BIOBÍO'),
(10, 'ARAUCANÍA'),
(11, 'LOS RÍOS'),
(12, 'LOS LAGOS'),
(13, 'AISÉN'),
(14, 'MAGALLANES Y DE LA ANTÁRTICA CHILENA'),
(16, 'METROPOLITANA DE SANTIAGO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votantes`
--

CREATE TABLE `votantes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `rut` varchar(20) NOT NULL,
  `id_region` varchar(11) NOT NULL,
  `id_comuna` varchar(11) NOT NULL,
  `candidato` varchar(255) NOT NULL,
  `entero` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `votantes`
--

INSERT INTO `votantes` (`id`, `nombres`, `alias`, `rut`, `id_region`, `id_comuna`, `candidato`, `entero`, `email`) VALUES
(1, 'crsi', 'cris2023', '12.497.806-8', '13', '254', 'BASE DE DATOS', 'Web,Amigo,', 'vbg@bnh.com'),
(2, 'cris', 'cris345', '12497806-8', '12', '6', 'redes', 'algo,otro', 'cdb@bdgh.com'),
(3, 'cris', 'cris345', '12497806-5', '12', '6', 'redes', 'algo,otro', 'cdb@bdgh.com'),
(4, 'cris', 'cris345', '12497806-8', '12', '6', 'redes', 'algo,otro', 'cdb@bdgh.com'),
(5, 'cris', 'cris345', '12497806-3', '12', '6', 'redes', 'algo,otro', 'cdb@bdgh.com'),
(6, 'sajfhksjfh', 'jhjdskfhdjk3', '11111111-1', '12', '234', 'REDES', 'Web,Amigo,', 'cdv@eerr.cl'),
(7, 'dfag', 'dfgfdg546456', '22222222-2', '15', '290', 'JEFE PROYECTO', 'Web,Redes Sociales,', 'wqew@dkkd.cl'),
(8, 'por ultimo', 'ahora21', '44444444-4', '16', '297', 'DEVELOPER', 'Web,Redes Sociales,', '44@dkdd.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `candidato`
--
ALTER TABLE `candidato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `votantes`
--
ALTER TABLE `votantes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `candidato`
--
ALTER TABLE `candidato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `comuna`
--
ALTER TABLE `comuna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT de la tabla `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `votantes`
--
ALTER TABLE `votantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
