
delete from trabajan;
delete from participan;
delete from deporte_olimpico;
delete from jjoo;
delete from persona;
delete from lugar;
delete from deportista;
delete from personal_olimpico;



insert into lugar(idLugar,ciudad) values 
(1,'Neuquen'),
(2,'Londres'),
(3,'Paris'),
(4,'Washington'),
(5,'Pekin'),
(6,'Mendoza'),
(7,'Atenas'),
(8,'Sidney'),
(9,'Kingstown');

insert into jjoo(anio, eslogan, idLugar) values 
(2012,'Olimpiadas de la Paz',2),
(2008,'Olimpiadas de la Igualdad',5),
(2004,'Olimpiadas del Trabajo Digno',7),
(2000,'Olimpiadas por los Derechos de los Niños',8);


insert into persona(idPersona, nombre, apellido, fecha_nacimiento, idLugar) values 
(1,'Pedro','Guerra','1994-10-10',1),
(2,'Juana','Avila','1996-03-12',6),
(3,'Luis','Lopez','1990-02-25',1),
(4,'Tomas','Lincoln','1985-04-20',4),
(5,'Jonhatan','Rambert','1987-07-31',8),
(6,'Anna','Guerra','1994-12-10',8),
(7,'Justin','Gatlin','1996-04-15',4),
(8,'Erik','Kynard','1992-02-25',4),
(9,'Usain','Bolt','1980-04-20',9),
(10,'Yohan','Blake','1989-07-25',9),
(11,'Chris','Brown','1986-11-12',9),
(12,'Lucas','Nino','1994-08-10',6),
(13,'Mohamed','Farah','1995-07-13',2),
(14,'Lucas','Nino','1980-06-12',2),
(15,'Michael','Tinsley','1981-08-15',2),
(16,'Ding','Chen','1982-10-16',5),
(17,'Qieyang','Shenjie','1983-11-17',5),
(18,'Zou','Shiming','1984-12-18',5),
(19,'Rena','Cancan','1985-01-19',5),
(20,'Fabio', 'Garcia', '1990-02-25', 4);

insert into deportista(idPersonaDeportista, peso, genero) values
(16,60,'MASCULINO'),
(17,55,'FEMENINO'),
(18,72,'MASCULINO'),
(2,59,'FEMENINO'),
(3,50,'MASCULINO'),
(5,80,'MASCULINO'),
(7,68,'MASCULINO'),
(8,62,'MASCULINO'),
(9,60,'MASCULINO'),
(11,69,'MASCULINO'),
(12,78,'MASCULINO'),
(15,72,'MASCULINO');

insert into personal_olimpico(idPersonaOlimpico, telefono) values 
(19,'233445564'),
(4,'678445565'),
(10,'453445345'),
(13,'893445230'),
(6,'673445498'),
(14,'043445908'),
(1,'543445213'),
(3,'12141589'),
(18,'29526412');

insert into deporte_olimpico(nombreDeporte, anio_jjoo) values 
('Atletismo',2012),
('Boxeo',2012),
('Tenis',2012),
('Atletismo',2008),
('Boxeo',2008),
('Ciclismo',2008),
('Boxeo',2004),
('Tenis',2004),
('Ciclismo',2004),
('Esgrima',2004),
('Boxeo',2000),
('Tenis',2000),
('Judo',2000),
('Voley',2000),
('Atletismo',2000),
('Ciclismo',2012);


insert into trabajan(idPersonaOlimpico, anio_jjoo, funcion) values 
(19,2012,'cadete'),
(4,2012,'coordinador'),
(10,2008,'coordinador'),
(13,2008,'limpieza'),
(6,2004,'limpieza'),
(14,2004,'coordinador'),
(1,2000,'coordinador'),
(18,2000,'ayudante'),
(18,2008,'vocero');


insert into participan(idPersonaDeportista, nombreDeporte, anio_jjoo, numeroOlimpico) values 
(16,'Atletismo',2012,1),
(17,'Atletismo',2012,2),
(18,'Boxeo',2012,1),
(2,'Ciclismo',2008,3),
(3,'Ciclismo',2008,4),
(5,'Judo',2000,4),
(7,'Esgrima',2004,2),
(8,'Esgrima',2004,3),
(9,'Tenis',2012,1),
(11,'Tenis',2012,2),
(12,'Judo',2000,2),
(15,'Tenis',2004,1),
(2,'Ciclismo',2012,10),
(3,'Ciclismo',2012,13),
(18,'Boxeo',2008,20),
(18,'Boxeo',2000,20);

