--
-- Estructura de tabla para la tabla `vehiculo`
--
CREATE TABLE IF NOT EXISTS `vehiculo` (
  `matricula` varchar(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `anio` int(4) NOT NULL, 
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `auto`
--
CREATE TABLE IF NOT EXISTS `auto` (
  `matricula` varchar(11) NOT NULL,
  `sedan` boolean NOT NULL,
  PRIMARY KEY (`matricula`),
  FOREIGN KEY (`matricula`) REFERENCES `vehiculo`(`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `camioneta`
--
CREATE TABLE IF NOT EXISTS `camioneta` (
  `matricula` varchar(11) NOT NULL,
  `capacidad_carga` double(4,2) NOT NULL,
  `doble_cabina` boolean NOT NULL, 
  PRIMARY KEY (`matricula`),
  FOREIGN KEY (`matricula`) REFERENCES `vehiculo`(`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `camion`
--
CREATE TABLE IF NOT EXISTS `camion` (
  `matricula` varchar(11) NOT NULL,
  `capacidad_carga` double(4,2) NOT NULL,
  `cantidad_ejes` int(2) NOT NULL,
  `grua_incorporada` boolean NOT NULL, 
  PRIMARY KEY (`matricula`),
  FOREIGN KEY (`matricula`) REFERENCES `vehiculo`(`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `cantera`
--
CREATE TABLE IF NOT EXISTS `cantera` (
  `id` varchar(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `coordenada_latitud` varchar(50) NOT NULL,
  `coordenada_longitud` varchar(50) NOT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `material`
--
CREATE TABLE IF NOT EXISTS `material` (
  `id` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `id_cantera` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_cantera`) REFERENCES `cantera`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `ruta`
--
CREATE TABLE IF NOT EXISTS `ruta` (
  `id` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `obra`
--
CREATE TABLE IF NOT EXISTS `obra` (
  `id` varchar(50) NOT NULL,
  `fecha_contratacion` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `id_ruta` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_ruta`) REFERENCES `ruta`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `tendido`
--
CREATE TABLE IF NOT EXISTS `tendido` (
  `id` varchar(50) NOT NULL,
  `kilometraje_inicial` bigint(50) NOT NULL,
  `kilometraje_final` varchar(50) NOT NULL,
  `jornada_trabajo` varchar(50) NOT NULL, 
  `id_material` varchar(50) NOT NULL,
  `id_obra` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_material`) REFERENCES `material`(`id`),
  FOREIGN KEY (`id_obra`) REFERENCES `obra`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `boleta`
--
CREATE TABLE IF NOT EXISTS `boleta` (
  `numero` bigint(20) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `monto` bigint(50) NOT NULL,
  `peso` double(4,2) NOT NULL,
  `id_cantera` varchar(11) NOT NULL,
  `matricula_camion` varchar(11) NOT NULL,
  PRIMARY KEY (`numero`),
  FOREIGN KEY (`id_cantera`) REFERENCES `cantera`(`id`),
  FOREIGN KEY (`matricula_camion`) REFERENCES `camion`(`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `inspector`
--
CREATE TABLE IF NOT EXISTS `inspector` (
  `dni` bigint(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` bigint(30) NOT NULL,
  `mail` varchar(100) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `jornada`
--
CREATE TABLE IF NOT EXISTS `jornada` (
  `numero_jornada` bigint(15) NOT NULL,
  `total_jornales` bigint(15) NOT NULL,
  `costo_jornal` bigint(30) NOT NULL,
  `id_obra` varchar(50) NOT NULL,
  PRIMARY KEY (`numero_jornada`),
  FOREIGN KEY (`id_obra`) REFERENCES `obra`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `viaja`
--
CREATE TABLE IF NOT EXISTS `viaja` (
  `id_cantera` varchar(11) NOT NULL,
  `matricula_camion` varchar(11) NOT NULL,
  FOREIGN KEY (`id_cantera`) REFERENCES `cantera`(`id`),
  FOREIGN KEY (`matricula_camion`) REFERENCES `camion`(`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `asigna`
--
CREATE TABLE IF NOT EXISTS `asigna` (
  `dni_inspector` bigint(15) NOT NULL,
  `matricula_vehiculo` varchar(11) NOT NULL,
  FOREIGN KEY (`dni_inspector`) REFERENCES `inspector`(`dni`),
  FOREIGN KEY (`matricula_vehiculo`) REFERENCES `vehiculo`(`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `trabaja`
--
CREATE TABLE IF NOT EXISTS `trabaja` (
  `dni_inspector` bigint(15) NOT NULL,
  `id_obra` varchar(50) NOT NULL,
  FOREIGN KEY (`dni_inspector`) REFERENCES `inspector`(`dni`),
  FOREIGN KEY (`id_obra`) REFERENCES `obra`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
