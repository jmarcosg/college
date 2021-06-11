-- TEORÍA ----------------------------------------------------------
--1 B
--2 C
--3 D
--4 D
-- PRÁCTICA --------------------------------------------------------
--
-- Estructura de tabla para la tabla `taller`
--
CREATE TABLE IF NOT EXISTS `taller` (
  `cuit` bigint(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `ciudad` varchar(150) NOT NULL,
  PRIMARY KEY (`cuit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `taller`
--

INSERT INTO `taller` (`cuit`, `nombre`, `ciudad`) VALUES
(20384986515, 'Lo de Pepe', 'Cipolletti'),
(23324926113, 'Mechafast', 'Neuquen'),
(20374996912, 'Tuercas', 'Allen'),
(30344986213, 'Pistones', 'Roca'),
(23334981714, 'Carburando', 'Plottier');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--
CREATE TABLE IF NOT EXISTS `propietario` (
  `tipodoc` varchar(10) NOT NULL,
  `nrodoc` bigint(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `ciudad` varchar(150) NOT NULL,
  PRIMARY KEY (`tipodoc`, `nrodoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`tipodoc`, `nrodoc`, `nombre`, `apellido`, `ciudad`) VALUES
('DNI', 33396486, 'Pepe', 'Suarez', 'Cipolletti'),
('DNI', 35104375, 'Juan', 'Roishe', 'Roca'),
('DNI', 31292431, 'Romina', 'Weller', 'Allen'),
('DNI', 32054333, 'Federico', 'Mesti', 'Centenario'),
('DNI', 37639701, 'Juana', 'Garces', 'Plottier');  -- EJERCICIO 2A

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--
CREATE TABLE IF NOT EXISTS `vehiculo` (
  `patente` varchar(10) NOT NULL,
  `marca` varchar(70) NOT NULL,
  `modelo` varchar(70) NOT NULL,
  `anio` bigint(11) NOT NULL,
  `color` varchar(70) NOT NULL,
  `tipodoc` varchar(10) NOT NULL,
  `nrodoc` bigint(11) NOT NULL,
  PRIMARY KEY (`patente`),
  FOREIGN KEY (`tipodoc`, `nrodoc`) REFERENCES `propietario` (`tipodoc`, `nrodoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`patente`, `marca`, `modelo`, `anio`, `color`, `tipodoc`, `nrodoc`) VALUES
('AB287HL', 'Toyota', 'Hilux', 2017, 'Blanco', 'DNI', 37639701), -- EJERCICIO 2A
('FRO426', 'Fiat', 'Uno', 2014, 'Negro', 'DNI', 32054333),
('BN626HN', 'Chevrolet', 'Onix', 2019, 'Rojo', 'DNI', 31292431),
('AS272LK', 'Nissan', 'Versa', 2019, 'Gris', 'DNI', 35104375),
('BQ182YK', 'Volkswagen', 'Gol', 2020, 'Blanco', 'DNI', 33396486);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--
CREATE TABLE IF NOT EXISTS `viaje` (
  `nroViaje` varchar(10) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `ciudad` varchar(150) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  PRIMARY KEY (`nroViaje`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`nroviaje`, `fecha`, `ciudad`, `descripcion`) VALUES
('V1', '2018-02-14', 'Rio Negro', 'Playas, mar, calor'),
('V2', '2015-01-23', 'Buenos Aires', 'Playas, mar'),
('V3', '2015-05-04', 'Nuequen', 'Montaña, lago, nieve'),
('V4', '2019-04-02', 'Nuequen', 'Aguas termales, excursiones'),
('V5', '2018-06-02', 'Cordoba', 'Partido Futbol'); -- EJERCICIO 2A

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parte`
--
CREATE TABLE IF NOT EXISTS `parte` (
  `idParte` varchar(10) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  PRIMARY KEY (`idParte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parte`
--
INSERT INTO `parte` (`idparte`, `descripcion`) VALUES
('P1', 'Tuerca'),
('P2', 'Arandela'),
('P3', 'Piston'),
('P4', 'Correa'),
('P5', 'Liquido para luces de giro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantiene`
--
CREATE TABLE IF NOT EXISTS `mantiene` (
  `patente` varchar(10) NOT NULL,
  `cuit` bigint(11) NOT NULL,
  `idParte` varchar(10) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  PRIMARY KEY (`patente`, `idParte`, `fecha`),
  FOREIGN KEY (`patente`) REFERENCES `vehiculo` (`patente`),
  FOREIGN KEY (`cuit`) REFERENCES `taller` (`cuit`),
  FOREIGN KEY (`idParte`) REFERENCES `parte` (`idParte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mantiene`
--
INSERT INTO `mantiene` (`patente`, `cuit`, `idparte`, `fecha`) VALUES
('BN626HN', 23324926113, 'P1', '2019-04-17'),
('BN626HN', 23324926113, 'P2', '2019-04-17'),
('FRO426', 20374996912, 'P4', '2018-10-23'),
('AB287HL', 20384986515, 'P3', '2017-06-12'),
('AS272LK', 23334981714, 'P5', '2019-03-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participa`
--
CREATE TABLE IF NOT EXISTS `participa` (
  `patente` varchar(10) NOT NULL,
  `nroViaje` varchar(10) NOT NULL,
  PRIMARY KEY (`patente`, `nroViaje`),
  FOREIGN KEY (`patente`) REFERENCES `vehiculo` (`patente`),
  FOREIGN KEY (`nroViaje`) REFERENCES `viaje` (`nroViaje`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `participa`
--
INSERT INTO `participa` (`patente`, `nroviaje`) VALUES
('BN626HN', 'V3'),
('BN626HN', 'V2'),
('AS272LK', 'V3'),
('AB287HL', 'V1'),
('AS272LK', 'V5');

-- EJERCICIO 2A
INSERT INTO `propietario` (`tipodoc`, `nrodoc`, `nombre`, `apellido`, `ciudad`) VALUES
('DNI', 37639701, 'Juana', 'Garces', 'Plottier');

INSERT INTO `vehiculo` (`patente`, `marca`, `modelo`, `anio`, `color`, `tipodoc`, `nrodoc`) VALUES
('AB287HL', 'Toyota', 'Hilux', 2017, 'Blanco', 'DNI', 37639701);

INSERT INTO `viaje` (`nroviaje`, `fecha`, `ciudad`, `descripcion`) VALUES
('V5', '2018-06-02', 'Cordoba', 'Partido Futbol');

-- EJERICIO 2B 
-- Debido a como esta armada la estructura de mi tabla `parte`, la ejecución de ésta actualización tiene un resultado fracasado.
-- #1451 - Cannot delete or update a parent row: a foreign key constraint fails (`cbd_test_p2`.`mantiene`, CONSTRAINT `mantiene_ibfk_3` FOREIGN KEY (`idParte`) REFERENCES `parte` (`idParte`))


-- EJERCICIO 2C
-- Al querer ejecutar DELETE FROM vehiculo where marca='Fiat'; da un error que no se puede borrar o actualizar una parent row. Ésto es debido a que estamos no trabajando en cascada, ya que si la query se hubiera ejecutado de manera correcta nos hubiera borrado esa fila tanto de vehiculo como tambíen de mantiene y participa.


-- EJERCICIO 3A
SELECT vehiculo.patente, propietario.nombre, viaje.fecha 
FROM vehiculo 
INNER JOIN propietario ON vehiculo.tipodoc = propietario.tipodoc and vehiculo.nrodoc=propietario.nrodoc 
INNER JOIN participa ON vehiculo.patente = participa.patente 
INNER JOIN viaje on participa.nroviaje=viaje.nroviaje 
WHERE YEAR(viaje.fecha) = 2015

--  patente	    nombre	  	  fecha 	
--  AS272LK 	Juan 	 	  2015-05-04
--  BN626HN 	Romina 	   	  2015-01-23
--  BN626HN 	Romina 	   	  2015-05-04


-- EJERCICIO 3B
SELECT taller.nombre, COUNT(mantiene.idparte), taller.ciudad 
FROM mantiene 
INNER JOIN taller ON mantiene.cuit = taller.cuit 
INNER JOIN vehiculo ON mantiene.patente = vehiculo.patente 
INNER JOIN propietario ON vehiculo.tipodoc = propietario.tipodoc and vehiculo.nrodoc = propietario.nrodoc 
WHERE propietario.ciudad = taller.ciudad

--  nombre 	COUNT(mantiene.idparte) 	ciudad 	
--  NULL 	0 	                        NULL 


-- EJERCICIO 3C
SELECT COUNT(viaje.nroViaje) 
FROM viaje 
INNER JOIN participa ON viaje.nroViaje = participa.nroViaje
INNER JOIN vehiculo ON participa.patente = vehiculo.patente 
WHERE viaje.ciudad = 'Nuequen' and vehiculo.anio = YEAR(viaje.fecha)

--  COUNT(viaje.nroViaje) 	
--  1