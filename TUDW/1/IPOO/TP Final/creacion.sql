--
-- Estructura de tabla para la tabla `teatro`
--
CREATE TABLE IF NOT EXISTS `teatro` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `ciudad` varchar(150) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `funcion`
--
CREATE TABLE IF NOT EXISTS `funcion` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `horario_inicio` varchar(150) NOT NULL,
  `duracion` int(9) NOT NULL,
  `precio` double(5,2) NOT NULL,
  `tipo` varchar(150) NOT NULL,
  `id_teatro` bigint(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_teatro`) REFERENCES `teatro` (`id`)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `obra_teatral`
--
CREATE TABLE IF NOT EXISTS `obra_teatral` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_funcion` bigint(11) NOT NULL,
  `autor` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_funcion`) REFERENCES `funcion` (`id`)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `musical`
--
CREATE TABLE IF NOT EXISTS `musical` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_funcion` bigint(11) NOT NULL,
  `director` varchar(150) NOT NULL,
  `cantidad_personas` bigint(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_funcion`) REFERENCES `funcion` (`id`)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `cine`
--
CREATE TABLE IF NOT EXISTS `cine` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_funcion` bigint(11) NOT NULL,
  `genero` varchar(150) NOT NULL,
  `origen` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_funcion`) REFERENCES `funcion` (`id`)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;