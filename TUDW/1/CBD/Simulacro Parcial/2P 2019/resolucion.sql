-- Creacion de tablas
CREATE TABLE IF NOT EXISTS `jjoo` (
  `anio` int(11) NOT NULL,
  `eslogan` varchar(150) NOT NULL,
  `idLugar` int(11) NOT NULL,
  PRIMARY KEY (`anio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `persona` (
  `idPersona` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `fecha_nacimiento` varchar(150) NOT NULL,
  `idLugar` int(11) NOT NULL,
  PRIMARY KEY (`idPersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `deportista` (
  `idPersonaDeportista` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `altura` int(11) NOT NULL,
  `genero` varchar(150) NOT NULL,
  PRIMARY KEY (`idPersonaDeportista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `personal_olimpico` (
  `idPersonaOlimpico` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  PRIMARY KEY (`idPersonaOlimpico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `deporte_olimpico` (
  `nombreDeporte` varchar(150) NOT NULL,
  `anio_jjoo` int(11) NOT NULL,
  PRIMARY KEY (`nombreDeporte`, `anio_jjoo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `lugar` (
  `idLugar` int(11) NOT NULL,
  `ciudad` varchar(150) NOT NULL,
  PRIMARY KEY (`idLugar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `trabajan` (
  `idPersonaOlimpico` int(11) NOT NULL,
  `anio_jjoo` int(11) NOT NULL,
  `funcion` varchar(150) NOT NULL,
  PRIMARY KEY (`idPersonaOlimpico`, `anio_jjoo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `participan` (
  `idPersonaDeportista` int(11) NOT NULL,
  `nombreDeporte` varchar(150) NOT NULL,
  `anio_jjoo` int(11) NOT NULL,
  `numeroOlimpico` int(11) NOT NULL,
  PRIMARY KEY (`idPersonaDeportista`, `nombreDeporte`, `anio_jjoo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Añado claves foraneas
ALTER TABLE jjoo
  ADD CONSTRAINT jjoo_ibfk_1 FOREIGN KEY (idLugar) REFERENCES lugar (idLugar);
  
ALTER TABLE persona
  ADD CONSTRAINT persona_ibfk_1 FOREIGN KEY (idLugar) REFERENCES lugar (idLugar);

ALTER TABLE deportista
  ADD CONSTRAINT deportista_ibfk_1 FOREIGN KEY (idPersonaDeportista) REFERENCES persona (idPersona);

ALTER TABLE personal_olimpico
  ADD CONSTRAINT personal_olimpico_ibfk_1 FOREIGN KEY (idPersonaOlimpico) REFERENCES persona (idPersona);
  
ALTER TABLE deporte_olimpico
  ADD CONSTRAINT deporte_olimpico_ibfk_1 FOREIGN KEY (anio_jjoo) REFERENCES jjoo (anio);
  
ALTER TABLE trabajan
  ADD CONSTRAINT trabajan_ibfk_2 FOREIGN KEY (idPersonaOlimpico) REFERENCES persona (idPersona),
  ADD CONSTRAINT trabajan_ibfk_1 FOREIGN KEY (anio_jjoo) REFERENCES jjoo (anio);
  
ALTER TABLE participan
  ADD CONSTRAINT participan_ibfk_3 FOREIGN KEY (idPersonaDeportista) REFERENCES deportista (idPersonaDeportista),
  ADD CONSTRAINT participan_ibfk_2 FOREIGN KEY (nombreDeporte) REFERENCES deporte_olimpico (nombreDeporte),
  ADD CONSTRAINT participan_ibfk_1 FOREIGN KEY (anio_jjoo) REFERENCES jjoo (anio);
  