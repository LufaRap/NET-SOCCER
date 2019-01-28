-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2018 a las 23:11:55
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `futbol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` int(11) NOT NULL,
  `USER_ADMIN` varchar(20) NOT NULL,
  `PASS_ADMIN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `USER_ADMIN`, `PASS_ADMIN`) VALUES
(1, 'admin', '123'),
(2, 'admin2', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `id_calen` int(11) NOT NULL,
  `equipo1_calen` varchar(50) NOT NULL,
  `equipo2_calen` varchar(50) NOT NULL,
  `fecha_calen` date NOT NULL,
  `hora_calen` time NOT NULL,
  `estadio_calen` varchar(50) NOT NULL,
  `jornada_calen` int(11) NOT NULL,
  `partido_calen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `ID_EQUI` int(11) NOT NULL,
  `NOM_EQUI` varchar(50) NOT NULL,
  `NOMDIR_EQUI` varchar(50) NOT NULL,
  `CEDULA_DIR` varchar(10) NOT NULL,
  `FotoEquipo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `goles`
--

CREATE TABLE `goles` (
  `ID_GOL` int(11) NOT NULL,
  `ID_JUG` int(11) NOT NULL,
  `NUM_GOL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `ID_JUG` int(11) NOT NULL,
  `ID_EQUI` int(11) NOT NULL,
  `NOM_JUG` varchar(50) NOT NULL,
  `APEL_JUG` varchar(50) NOT NULL,
  `CEDIDEN_JUG` varchar(10) NOT NULL,
  `GENERO_JUG` varchar(25) NOT NULL,
  `EDAD` int(11) NOT NULL,
  `DORSAL_JUG` int(11) NOT NULL,
  `POS_JUG` varchar(15) NOT NULL,
  `FotoJugador` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `ID_PART` int(11) NOT NULL,
  `NOMEQUIPO1` varchar(50) NOT NULL,
  `NOMEQUIPO2` varchar(50) NOT NULL,
  `GOLEQUI1` int(11) NOT NULL,
  `GOLEQUI2` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `HORA` varchar(20) DEFAULT NULL,
  `ESTADIO` varchar(40) DEFAULT NULL,
  `jornada` int(11) NOT NULL,
  `partido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posiciones`
--

CREATE TABLE `posiciones` (
  `ID_POSIC` int(11) NOT NULL,
  `NOM_EQUIP` varchar(50) NOT NULL,
  `PUNTOS` int(11) NOT NULL,
  `GFAVOR` int(11) DEFAULT NULL,
  `GCONTRA` int(11) DEFAULT NULL,
  `GDIFER` int(11) DEFAULT NULL,
  `NUMPARTI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sorteo`
--

CREATE TABLE `sorteo` (
  `idE1` int(5) NOT NULL,
  `idE2` int(5) NOT NULL,
  `jornada` int(5) NOT NULL,
  `partido` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sorteo`
--

INSERT INTO `sorteo` (`idE1`, `idE2`, `jornada`, `partido`) VALUES
(1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta_amarilla`
--

CREATE TABLE `tarjeta_amarilla` (
  `ID_TARJET` int(11) NOT NULL,
  `ID_JUG` int(11) NOT NULL,
  `NUMTARJAM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta_roja`
--

CREATE TABLE `tarjeta_roja` (
  `ID_TARJETR` int(11) NOT NULL,
  `ID_JUG` int(11) NOT NULL,
  `NUMTARJR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo`
--

CREATE TABLE `torneo` (
  `id_Torneo` int(2) NOT NULL,
  `NombTorneo` varchar(40) NOT NULL,
  `NombLigaB` varchar(40) NOT NULL,
  `FechaInicio` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_derrotaslocal`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_derrotaslocal` (
`NOMEQUIPO1` varchar(50)
,`jornada` int(11)
,`partido` int(11)
,`GOLESCONTRA` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_derrotasvisit`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_derrotasvisit` (
`NOMEQUIPO2` varchar(50)
,`jornada` int(11)
,`partido` int(11)
,`GOLESCONTRA` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_empateslocal`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_empateslocal` (
`NOMEQUIPO1` varchar(50)
,`jornada` int(11)
,`partido` int(11)
,`GOLESAFAVOR` int(11)
,`1` int(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_empatesvisit`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_empatesvisit` (
`NOMEQUIPO2` varchar(50)
,`jornada` int(11)
,`partido` int(11)
,`GOLESAFAVOR` int(11)
,`1` int(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_ganadorlocal`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_ganadorlocal` (
`NOMEQUIPO1` varchar(50)
,`jornada` int(11)
,`partido` int(11)
,`GOLESAFAVOR` int(11)
,`3` int(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_ganadorvisit`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_ganadorvisit` (
`NOMEQUIPO2` varchar(50)
,`jornada` int(11)
,`partido` int(11)
,`GOLESAFAVOR` bigint(12)
,`3` int(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_jornadas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_jornadas` (
`jornada` int(5)
,`Nom_Equi1` varchar(50)
,`Nom_Equi2` varchar(50)
,`partido` bigint(67)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_jornadas1`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_jornadas1` (
`Nom_Equi1` varchar(50)
,`jornada` int(5)
,`partido` int(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_jornadas2`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_jornadas2` (
`Nom_Equi2` varchar(50)
,`jornada` int(5)
,`partido` int(100)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `view_derrotaslocal`
--
DROP TABLE IF EXISTS `view_derrotaslocal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_derrotaslocal`  AS  select `partidos`.`NOMEQUIPO1` AS `NOMEQUIPO1`,`partidos`.`jornada` AS `jornada`,`partidos`.`partido` AS `partido`,`partidos`.`GOLEQUI2` AS `GOLESCONTRA` from `partidos` where (`partidos`.`GOLEQUI1` < `partidos`.`GOLEQUI2`) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_derrotasvisit`
--
DROP TABLE IF EXISTS `view_derrotasvisit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_derrotasvisit`  AS  select `partidos`.`NOMEQUIPO2` AS `NOMEQUIPO2`,`partidos`.`jornada` AS `jornada`,`partidos`.`partido` AS `partido`,`partidos`.`GOLEQUI1` AS `GOLESCONTRA` from `partidos` where (`partidos`.`GOLEQUI1` > `partidos`.`GOLEQUI2`) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_empateslocal`
--
DROP TABLE IF EXISTS `view_empateslocal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_empateslocal`  AS  select `partidos`.`NOMEQUIPO1` AS `NOMEQUIPO1`,`partidos`.`jornada` AS `jornada`,`partidos`.`partido` AS `partido`,`partidos`.`GOLEQUI1` AS `GOLESAFAVOR`,1 AS `1` from `partidos` where (`partidos`.`GOLEQUI1` = `partidos`.`GOLEQUI2`) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_empatesvisit`
--
DROP TABLE IF EXISTS `view_empatesvisit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_empatesvisit`  AS  select `partidos`.`NOMEQUIPO2` AS `NOMEQUIPO2`,`partidos`.`jornada` AS `jornada`,`partidos`.`partido` AS `partido`,`partidos`.`GOLEQUI2` AS `GOLESAFAVOR`,1 AS `1` from `partidos` where (`partidos`.`GOLEQUI1` = `partidos`.`GOLEQUI2`) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_ganadorlocal`
--
DROP TABLE IF EXISTS `view_ganadorlocal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_ganadorlocal`  AS  select `partidos`.`NOMEQUIPO1` AS `NOMEQUIPO1`,`partidos`.`jornada` AS `jornada`,`partidos`.`partido` AS `partido`,`partidos`.`GOLEQUI1` AS `GOLESAFAVOR`,3 AS `3` from `partidos` where (`partidos`.`GOLEQUI1` > `partidos`.`GOLEQUI2`) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_ganadorvisit`
--
DROP TABLE IF EXISTS `view_ganadorvisit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_ganadorvisit`  AS  select `partidos`.`NOMEQUIPO2` AS `NOMEQUIPO2`,`partidos`.`jornada` AS `jornada`,`partidos`.`partido` AS `partido`,(`partidos`.`GOLEQUI2` - `partidos`.`GOLEQUI1`) AS `GOLESAFAVOR`,3 AS `3` from `partidos` where (`partidos`.`GOLEQUI1` < `partidos`.`GOLEQUI2`) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_jornadas`
--
DROP TABLE IF EXISTS `view_jornadas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jornadas`  AS  select `view_jornadas1`.`jornada` AS `jornada`,`view_jornadas1`.`Nom_Equi1` AS `Nom_Equi1`,`view_jornadas2`.`Nom_Equi2` AS `Nom_Equi2`,(`view_jornadas1`.`partido` - 1) AS `partido` from (`view_jornadas1` join `view_jornadas2` on(((`view_jornadas1`.`jornada` = `view_jornadas2`.`jornada`) and (`view_jornadas1`.`partido` = `view_jornadas2`.`partido`)))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_jornadas1`
--
DROP TABLE IF EXISTS `view_jornadas1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jornadas1`  AS  select `equipo`.`NOM_EQUI` AS `Nom_Equi1`,`sorteo`.`jornada` AS `jornada`,`sorteo`.`partido` AS `partido` from (`sorteo` join `equipo`) where (`sorteo`.`idE1` = `equipo`.`ID_EQUI`) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_jornadas2`
--
DROP TABLE IF EXISTS `view_jornadas2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jornadas2`  AS  select `equipo`.`NOM_EQUI` AS `Nom_Equi2`,`sorteo`.`jornada` AS `jornada`,`sorteo`.`partido` AS `partido` from (`sorteo` join `equipo`) where (`sorteo`.`idE2` = `equipo`.`ID_EQUI`) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`id_calen`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`ID_EQUI`);

--
-- Indices de la tabla `goles`
--
ALTER TABLE `goles`
  ADD PRIMARY KEY (`ID_GOL`),
  ADD KEY `FK_RELATIONSHIP_5` (`ID_JUG`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`ID_JUG`),
  ADD KEY `FK_PERTENECE` (`ID_EQUI`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`ID_PART`);

--
-- Indices de la tabla `posiciones`
--
ALTER TABLE `posiciones`
  ADD PRIMARY KEY (`ID_POSIC`);

--
-- Indices de la tabla `tarjeta_amarilla`
--
ALTER TABLE `tarjeta_amarilla`
  ADD PRIMARY KEY (`ID_TARJET`),
  ADD KEY `FK_TIENE` (`ID_JUG`);

--
-- Indices de la tabla `tarjeta_roja`
--
ALTER TABLE `tarjeta_roja`
  ADD PRIMARY KEY (`ID_TARJETR`),
  ADD KEY `FK_TIENEN` (`ID_JUG`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calendario`
--
ALTER TABLE `calendario`
  MODIFY `id_calen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `ID_EQUI` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `goles`
--
ALTER TABLE `goles`
  MODIFY `ID_GOL` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
  MODIFY `ID_JUG` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `ID_PART` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `posiciones`
--
ALTER TABLE `posiciones`
  MODIFY `ID_POSIC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tarjeta_amarilla`
--
ALTER TABLE `tarjeta_amarilla`
  MODIFY `ID_TARJET` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tarjeta_roja`
--
ALTER TABLE `tarjeta_roja`
  MODIFY `ID_TARJETR` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `goles`
--
ALTER TABLE `goles`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_JUG`) REFERENCES `jugador` (`ID_JUG`);

--
-- Filtros para la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD CONSTRAINT `FK_PERTENECE` FOREIGN KEY (`ID_EQUI`) REFERENCES `equipo` (`ID_EQUI`);

--
-- Filtros para la tabla `tarjeta_amarilla`
--
ALTER TABLE `tarjeta_amarilla`
  ADD CONSTRAINT `FK_TIENE` FOREIGN KEY (`ID_JUG`) REFERENCES `jugador` (`ID_JUG`);

--
-- Filtros para la tabla `tarjeta_roja`
--
ALTER TABLE `tarjeta_roja`
  ADD CONSTRAINT `FK_TIENEN` FOREIGN KEY (`ID_JUG`) REFERENCES `jugador` (`ID_JUG`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
