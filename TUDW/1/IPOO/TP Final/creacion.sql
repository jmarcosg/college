--
-- Estructura de tabla para la tabla `teatro`
--
create table if not exists `teatro`(
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL, 
  `direccion` varchar(100) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  PRIMARY KEY(id)
);

--
-- Estructura de tabla para la tabla `funcion`
--
CREATE TABLE IF NOT EXISTS `funcion` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `horario_inicio` varchar(6) NOT NULL,
  `duracion` int(4) NOT NULL,
  `precio` double(12,2) NOT NULL,
  `costo_sala` double(12,2) NOT NULL,
  `idTeatro` bigint(11) NOT NULL,
  PRIMARY KEY(`id`),
  FOREIGN KEY(`idTeatro`) REFERENCES `teatro`(`id`)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `obra_teatral`
--
CREATE TABLE IF NOT EXISTS `obra_teatral` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES `funcion` (`id`)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `musical`
--
CREATE TABLE IF NOT EXISTS `musical` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `director` varchar(150) NOT NULL,
  `cantidad_personas` bigint(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES `funcion` (`id`)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `cine`
--
CREATE TABLE IF NOT EXISTS `cine` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(150) NOT NULL,
  `pais_origen` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES `funcion` (`id`)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;