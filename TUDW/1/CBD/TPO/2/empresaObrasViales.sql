--
-- Estructura de tabla para la tabla `vehiculo`
--
CREATE TABLE `vehiculo` (
  `matricula` varchar(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `anio` int(4) NOT NULL, 
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculo`
--
INSERT INTO `vehiculo` (`matricula`, `marca`, `modelo`, `anio`) VALUES
('IVD 052', 'Fiat', 'Uno', 2009),
('JJU 451', 'Fiat', 'Strada', 2010),
('AA 000 AA', 'Volkswagen', 'Amarok', 2010),
('AC 156 OC', 'Iveco', 'Cursor', 2019),
('BD 861 KF', 'Volvo', 'FMX', 2009),
('DCF 235', 'Chevrolet', 'Corsa', 2005);

--
-- Estructura de tabla para la tabla `cantera`
--
CREATE TABLE `cantera` (
  `id` varchar(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `coordenada_latitud` varchar(50) NOT NULL,
  `coordenada_longitud` varchar(50) NOT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cantera`
--
INSERT INTO `cantera` (`id`, `nombre`, `coordenada_latitud`, `coordenada_longitud`) VALUES
("1", "La Roca", "-38.9514", "-68.0592"),
("2", "Rocatti Hnos", "-38.9417", "-68"),
("3", "Piedrossi", "-38.9522", "-68.2269"),
("4", "Dwayne Johnson", "-39.025", "-67.575"),
("5", "Tutti Materiali", "-38.83", "-68.1211"),
("6", "Mandale Mezcla", "-38.8253", "-68.0617");

--
-- Estructura de tabla para la tabla `ruta`
--
CREATE TABLE `ruta` (
  `id` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ruta`
--
INSERT INTO `ruta` (`id`,`nombre`, `tipo`) VALUES
('RN40', 'Ruta Nacional 40' , 'Nacional' ),
('RN9', 'Ruta Nacional 9', 'Nacional'),
('RN5', 'Ruta Nacional 5 ', 'Provincial'),
('RN8', 'Ruta Nacional 8', 'Nacional'),
('RN22', 'Ruta Nacional 22', 'Provinvial'),
('RP10', 'Ruta Privincial 10', 'Provincial');

--
-- Estructura de tabla para la tabla `inspector`
--
CREATE TABLE `inspector` (
  `dni` bigint(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` bigint(30) NOT NULL,
  `mail` varchar(100) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inspector`
--
INSERT INTO `inspector` (`dni`, `nombre`, `telefono`, `mail`) VALUES
(18654389, 'Juan', 155486253, 'juaninspector@gmail.com'),
(21536874, 'Jose', 156328947, 'joseinspector@outlook.com'),
(35641289, 'Pablo', 15423685, 'pabloinspector@gmail.com'),
(40101010, 'Diego', 155101010, 'eldiegoinspector@gmail.com'),
(16256846, 'Antonio', 156489523, 'antonioinspector@live.com'),
(25639845, 'Ricardo', 154235895, 'ricardoinspector@hotmail.com');

--
-- Estructura de tabla para la tabla `auto`
--
CREATE TABLE `auto` (
  `matricula` varchar(11) NOT NULL,
  `sedan` boolean NOT NULL,
  PRIMARY KEY (`matricula`),
  FOREIGN KEY (`matricula`) REFERENCES `vehiculo`(`matricula`)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `auto`
--
INSERT INTO `auto` (`matricula`, `sedan`) VALUES
("IVD 052", 0),
("DCF 235", 1);

--
-- Estructura de tabla para la tabla `camioneta`
--
CREATE TABLE `camioneta` (
  `matricula` varchar(11) NOT NULL,
  `capacidad_carga` double(4,2) NOT NULL,
  `doble_cabina` boolean NOT NULL, 
  PRIMARY KEY (`matricula`),
  FOREIGN KEY (`matricula`) REFERENCES `vehiculo`(`matricula`)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `camioneta`
--
INSERT INTO `camioneta` (`matricula`, `capacidad_carga`, `doble_cabina`) VALUES
("AA 000 AA", 1147, 0),
("JJU 451", 650, 0);

--
-- Estructura de tabla para la tabla `camion`
--
CREATE TABLE `camion` (
  `matricula` varchar(11) NOT NULL,
  `capacidad_carga` double(4,2) NOT NULL,
  `cantidad_ejes` int(2) NOT NULL,
  `grua_incorporada` boolean NOT NULL, 
  PRIMARY KEY (`matricula`),
  FOREIGN KEY (`matricula`) REFERENCES `vehiculo`(`matricula`)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `camion`
--
INSERT INTO `camion` (`matricula`, `capacidad_carga`, `cantidad_ejes`, `grua_incorporada`) VALUES
("AC 156 OC", 7100, 2, 0),
("BD 861 KF", 9000, 4, 0);


--
-- Estructura de tabla para la tabla `material`
--
CREATE TABLE `material` (
  `id` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `id_cantera` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_cantera`) REFERENCES `cantera`(`id`)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `material`
--
INSERT INTO `material` (`id`, `tipo`, `id_cantera`) VALUES
('P001', 'piedra', '1'),
('A001', 'arena', '1'),
('P002', 'piedra', '6'),
('A002', 'arena', '5'),
('P003', 'piedra', '1'),
('A003', 'arena', '3');

--
-- Estructura de tabla para la tabla `obra`
--
CREATE TABLE `obra` (
  `id` varchar(50) NOT NULL,
  `fecha_contratacion` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `id_ruta` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_ruta`) REFERENCES `ruta`(`id`)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `obra`
--
INSERT INTO `obra` (`id`, `fecha_contratacion`, `nombre`, `descripcion`, `id_ruta`) VALUES
("O001", "2019-04-25", "Mantenimiento", "Pavimentado, arreglo baches, pintura", "RN22"),
("O002", "2020-08-12", "Construccion", "Pavimentado, cordon cuneta, iluminacion", "RP10"),
("O003", "2019-07-05", "Mantenimiento", "Pavimentado, construccion cordon cuneta", "RN5"),
("O004", "2021-02-12", "Mantenimiento", "Pavimentado, iluminacion", "RN40"),
("O005", "2020-05-05", "Mantenimiento", "Pavimentado, arreglo baches", "RN8"),
("O006", "2019-03-29", "Mantenimiento", "Pavimentado, arreglo baches", "RN9");

--
-- Estructura de tabla para la tabla `tendido`
--
CREATE TABLE `tendido` (
  `id` varchar(50) NOT NULL,
  `kilometraje_inicial` bigint(50) NOT NULL,
  `kilometraje_final` varchar(50) NOT NULL,
  `jornada_trabajo` varchar(50) NOT NULL, 
  `id_material` varchar(50) NOT NULL,
  `id_obra` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_material`) REFERENCES `material`(`id`) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (`id_obra`) REFERENCES `obra`(`id`)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tendido`
--
INSERT INTO `tendido` (`id`, `kilometraje_inicial`, `kilometraje_final`, `jornada_trabajo`, `id_material`, `id_obra`) VALUES
("T001", 250, 500, "2019-04-25", "P001", "O001"),
("T002", 15, 150, "2020-08-12", "P002", "O002"),
("T003", 250, 500, "2019-07-05", "A001", "O003"),
("T004", 73, 121, "2021-02-12", "P003", "O004"),
("T005", 100, 125, "2020-05-05", "A002", "O005"),
("T006", 25, 35, "2019-03-29", "P003", "O006");

--
-- Estructura de tabla para la tabla `boleta`
--
CREATE TABLE `boleta` (
  `numero` bigint(20) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `monto` bigint(50) NOT NULL,
  `peso` double(4,2) NOT NULL,
  `id_cantera` varchar(11) NOT NULL,
  PRIMARY KEY (`numero`),
  FOREIGN KEY (`id_cantera`) REFERENCES `cantera`(`id`)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `boleta`
--
INSERT INTO `boleta` (`numero`, `fecha`, `monto`, `peso`, `id_cantera`) VALUES
(1, '2020-03-12', 12300, 2350.20, '1'),
(2, '2019-02-14', 15321, 1562.32, '6'),
(3, '2021-07-02', 2500, 100.00, '5'),
(4, '2020-12-25', 9658, 7564.54, '1'),
(5, '2019-09-30', 6387, 7685.50, '3'),
(6, '2021-01-15', 8796, 9845.65, '1');

--
-- Estructura de tabla para la tabla `jornada`
--
CREATE TABLE `jornada` (
  `numero_jornada` bigint(15) NOT NULL,
  `total_jornales` bigint(15) NOT NULL,
  `costo_jornal` bigint(30) NOT NULL,
  `id_obra` varchar(50) NOT NULL,
  PRIMARY KEY (`numero_jornada`),
  FOREIGN KEY (`id_obra`) REFERENCES `obra`(`id`)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jornada`
--
INSERT INTO `jornada` (`numero_jornada`, `total_jornales`, `costo_jornal`, `id_obra`) VALUES
(10, 20000, 2000, 'O001'),
(15, 15000, 1000, 'O002'),
(13, 26000, 2000, 'O003'),
(14, 1500, 100, 'O004'),
(20, 40000, 2000, 'O005'),
(5, 50000, 10000, 'O006');

--
-- Estructura de tabla para la tabla `asigna`
--
CREATE TABLE `asigna` (
  `dni_inspector` bigint(15) NOT NULL,
  `matricula_vehiculo` varchar(11) NOT NULL,
  FOREIGN KEY (`dni_inspector`) REFERENCES `inspector`(`dni`) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (`matricula_vehiculo`) REFERENCES `vehiculo`(`matricula`)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asigna`
--
INSERT INTO `asigna` (`dni_inspector`, `matricula_vehiculo`) VALUES
(18654389, 'IVD 052'),
(21536874, 'JJU 451'),
(35641289, 'AA 000 AA'),
(40101010, 'IVD 052'),
(16256846, 'DCF 235'),
(25639845, 'JJU 451');

--
-- Estructura de tabla para la tabla `trabaja`
--
CREATE TABLE `trabaja` (
  `dni_inspector` bigint(15) NOT NULL,
  `id_obra` varchar(50) NOT NULL,
  FOREIGN KEY (`dni_inspector`) REFERENCES `inspector`(`dni`) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (`id_obra`) REFERENCES `obra`(`id`)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabaja`
--
INSERT INTO `trabaja` (`dni_inspector`, `id_obra`) VALUES
(18654389, 'O001'),
(21536874, 'O002'),
(35641289, 'O003'),
(40101010, 'O004'),
(16256846, 'O005'),
(25639845, 'O006');

--
-- Estructura de tabla para la tabla `registra`
--
CREATE TABLE `registra` (
  `matricula_vehiculo` varchar(11) NOT NULL,
  `numero_boleta` bigint(20) NOT NULL,
  FOREIGN KEY (`matricula_vehiculo`) REFERENCES `camion`(`matricula`) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (`numero_boleta`) REFERENCES `boleta`(`numero`)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registra`
--
INSERT INTO `registra` (`matricula_vehiculo`, `numero_boleta`) VALUES
('AC 156 OC', 1),
('AC 156 OC', 2),
('AC 156 OC', 3),
('BD 861 KF', 4),
('BD 861 KF', 5),
('BD 861 KF', 6);

--
-- Estructura de tabla para la tabla `incluye`
--
CREATE TABLE `incluye` (
  `id_material` varchar(50) NOT NULL,
  `numero_boleta` bigint(20) NOT NULL,
  FOREIGN KEY (`id_material`) REFERENCES `material`(`id`),
  FOREIGN KEY (`numero_boleta`) REFERENCES `boleta`(`numero`)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `incluye`
--
INSERT INTO `incluye` (`id_material`, `numero_boleta`) VALUES
('P001', 1),
('A001', 2),
('P002', 3),
('A002', 4),
('P003', 5),
('A003', 6);


-------------------------------------------------------------------------------------------------
-----------------------------------------Consultas-----------------------------------------------
-------------------------------------------------------------------------------------------------

/*
EJERCICIO 3
Escribir la sentencia SQL para eliminar los datos de la tabla vehículo cuando la marca
corresponda a ‘fiat’. Justifique en que casos, al ejecutar la sentencia arrojaría un error
*/
DELETE FROM `vehiculo` 
WHERE marca = "Fiat" 

-- obs: Esta sentencia funciona debido a que las claves foraneas estan definidas en cascada para la actualizacion y eliminacion
/*
La sentencia arrojaria error en los casos en que las claves foraneas no esten definidas en cascada,
ya que no haria ninguna modificacion dentro de la base de datos
*/   


/*
EJERCICIO 4
Actualizar los datos de la tabla vehículo ya que las patentes cambiaron. De ahora en más se
les debe agregar una letra ‘A’ a todas las patentes como prefijo. ¿Es posible realizar esto?
Indique en que casos si y en qué casos no
*/
UPDATE vehiculo 
SET matricula = CONCAT('A', matricula) 

-- obs: Esta sentencia funciona debido a que las claves foraneas estan definidas en cascada para la actualizacion y eliminacion
/*
La sentencia arrojaria error en los casos en que las claves foraneas no esten definidas en cascada,
ya que no haria ninguna modificacion dentro de la base de datos
*/

/*
EJERCICIO 5
Listar el dni, nombre de los inspectores cuyo email sea de “gmail” 
y el teléfono corresponda al código de área con inicio “0299”
*/
SELECT dni, nombre, mail, telefono
FROM inspector
WHERE mail LIKE "%@gmail%" AND telefono LIKE "299%"


/*
EJERCICIO 6
Listar el identificador, nombre de obra, numero de jornada 
de las jornadas de obra cuyo total de jornada sea superior a 20000
*/
SELECT *
FROM jornada
WHERE total_jornales > 20000

/*
EJERCICIO 7
Listar la cantidad de boletas que hay por día, 
siempre que las boletas sean de la cantera ‘La Roca’
*/
SELECT numero, fecha, monto, peso, COUNT(*)
FROM boleta 
INNER JOIN cantera as c ON c.id = boleta.id_cantera
WHERE c.nombre = "La Roca"
GROUP BY fecha

/*
EJERCICIO 8
Mostrar la fecha de la primera boleta por cantera.
Debe incluir en el listado el nombre de la cantera
*/
SELECT boleta.numero, c.nombre, MIN(fecha)
FROM boleta
INNER JOIN cantera AS c ON c.id = boleta.id_cantera
GROUP BY c.id