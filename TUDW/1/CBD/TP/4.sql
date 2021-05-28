/* EJ 2B*/
SELECT titulo, actor
FROM peliculas

titulo				actor
Elsa y Fred			China Zorrilla
Mision imposible	Tom Cruise
Mision imposible 2	Tom Cruise
Mujer bonita		Julia R.

/* EJ 2C*/
SELECT nombre, documento
FROM empleados

total empleados = Showing rows 0 - 2 ( 3 total, Query took 0.0002 sec)

/* EJ 2C count testing 1 */
SELECT nombre, documento, count(*)
FROM empleados
GROUP BY nombre, documento

nombre			documento	count(*)
Ana Acosta		24345678	1
Juan Perez		22345678	1
Marcos Torres	27345678	1

/* EJ 2C count testing 2 */
SELECT COUNT( * )
FROM empleados
GROUP BY nombre, documento

count(*)
1
1
1

/* EJ 2C count testing 3 */
SELECT COUNT( * )
FROM empleados

COUNT( * )
3

/* EJ 2C count testing 4 */
SELECT nombre, documento, COUNT( * )
FROM empleados

nombre		documento	count(*)
Juan Perez	22345678	3

/* EJ 2D */
SELECT nombre, fechanacimiento
FROM empleados

nombre			fechanacimiento
Juan Perez		1970-03-20
Ana Acosta		1975-06-25
Marcos Torres	1980-12-14

/* EJ 2E */
SELECT *
FROM empleados
WHERE nombre = "Juan Perez"

documento	nombre		sexo	domicilio		sueldobasico	fechanacimiento
22345678	Juan Perez	m		Sarmiento 123	300				1970-03-20

/* EJ 2F */
SELECT *
FROM empleados
WHERE fechanacimiento < '1991-01-01'

SELECT *
FROM empleados
WHERE DATEDIFF( CURRENT_DATE( ) , fechanacimiento ) / 365 > 30 

documento	nombre			sexo	domicilio		sueldobasico	fechanacimiento
22345678	Juan Perez		m		Sarmiento 123	300				1970-03-20
24345678	Ana Acosta		f		Colon 134		500				1975-06-25
27345678	Marcos Torres	m		Urquiza 479		800				1980-12-14

/* EJ 2G */
SELECT codigo, descripcion, precio
FROM articulos
WHERE nombre = 'teclado'

codigo	descripcion		precio
4		ingles Biswal	100
5		español Biswal	90

/* EJ 2H */
SELECT nombre, descripcion, precio
FROM articulos
WHERE precio <> 100

nombre		descripcion			precio
impresora	Epson Stylus C45	400.8
impresora	Epson Stylus C85	500
monitor		Samsung 14			800
teclado		español Biswal		90

// Esta consulta no funciona
SELECT nombre, descripcion, precio
FROM articulos
WHERE precio IS NOT NULL

/* EJ 2I */
SELECT titulo, autor
FROM libros
WHERE autor = "Borges" OR autor = "Jose Hernandez"

titulo			autor
Cervantes		Borges
El aleph		Borges
Martin Fierro	Jose Hernandez

/* EJ 2J */
SELECT titulo, actor, duracion
FROM peliculas
WHERE actor = 'Tom Cruise' AND duracion > 150

titulo				actor		duracion
Mision imposible 2	Tom Cruise	180

/* EJ 2K*/
SELECT nombre, descripcion, precio
FROM articulos
WHERE precio < 100

nombre		descripcion		precio
teclado		español Biswal	90

/* EJ 2L */
/*RECORDAR: Utilizar "" en varchar. NO ''*/
INSERT INTO agenda( nombre, domicilio, telefono )
VALUES (
"Pedro Quiroga", "Jujuy 323", 4234537
), (
"Juan Ruiz", "Aconcagua 638", 4758797
)

/*ANTES*/
nombre			domicilio		telefono
Alberto Mores	Colon 123		4234567
Fernando Lopez	Urquiza 333		4545454
Juan Torres		Avellaneda 135	4458787
Lopez Ana		Sucre 309		4252587
Mariana Lopez	Urquiza 333		4545454
Peralta Susana	Gral. Paz 1234	4123456
Suarez Mariana	Sarmiento 643	4445544

/*DESPUES*/
nombre			domicilio		telefono
Alberto Mores	Colon 123		4234567
Juan Ruiz		Aconcagua 638	4758797   /*NUEVO INGRESO*/
Fernando Lopez	Urquiza 333		4545454
Juan Torres		Avellaneda 135	4458787
Lopez Ana		Sucre 309		4252587
Mariana Lopez	Urquiza 333		4545454
Pedro Quiroga	Jujuy 323		4234537   /*NUEVO INGRESO*/
Peralta Susana	Gral. Paz 1234	4123456
Suarez Mariana	Sarmiento 643	4445544

/* EJ 2M */
SELECT count(*) AS 'cantContactos'
FROM agenda

cantContactos
9

/* EJ 2N */
UPDATE agenda
SET telefono = 9876543
WHERE nombre = 'Suarez Mariana'

nombre			domicilio		telefono
Alberto Mores	Colon 123		4234567
Juan Ruiz		Aconcagua 638	4758797
Fernando Lopez	Urquiza 333		4545454
Juan Torres		Avellaneda 135	4458787
Lopez Ana		Sucre 309		4252587
Mariana Lopez	Urquiza 333		4545454
Pedro Quiroga	Jujuy 323		4234537
Peralta Susana	Gral. Paz 1234	4123456
Suarez Mariana	Sarmiento 643	9876543

/* EJ 2O */
UPDATE libros 
SET autor = "Adrian Paenza"
WHERE autor = 'Paenza'

/*ANTES*/
titulo					autor			editorial	edicion
Aprenda PHP				Mario Molina	Emece		2
Cervantes				Borges			Paidos		3
El aleph				Borges			Planeta		1
Martin Fierro			Jose Hernandez	Emece		1
Matematica estas ahí	Paenza			Paidos		2

/*DESPUES*/
titulo					autor			editorial	edicion
Aprenda PHP				Mario Molina	Emece		2
Cervantes				Borges			Paidos		3
El aleph				Borges			Planeta		1
Martin Fierro			Jose Hernandez	Emece		1
Matematica estas ahí	Adrian Paenza	Paidos		2

/* EJ 2P */
DELETE 
FROM agenda 
WHERE nombre = 'Alberto Mores'

/*ANTES*/
nombre			domicilio		telefono
Alberto Mores	Colon 123		4234567
Juan Ruiz		Aconcagua 638	4758797
Fernando Lopez	Urquiza 333		4545454
Juan Torres		Avellaneda 135	4458787
Lopez Ana		Sucre 309		4252587
Mariana Lopez	Urquiza 333		4545454
Pedro Quiroga	Jujuy 323		4234537
Peralta Susana	Gral. Paz 1234	4123456
Suarez Mariana	Sarmiento 643	9876543

/*DESPUES*/
nombre			domicilio		telefono
Juan Ruiz		Aconcagua 638	4758797
Fernando Lopez	Urquiza 333		4545454
Juan Torres		Avellaneda 135	4458787
Lopez Ana		Sucre 309		4252587
Mariana Lopez	Urquiza 333		4545454
Pedro Quiroga	Jujuy 323		4234537
Peralta Susana	Gral. Paz 1234	4123456
Suarez Mariana	Sarmiento 643	9876543

/* EJ 2Q */
DELETE 
FROM articulos 
WHERE nombre = 'impresora'

/*ANTES*/
codigo	nombre		descripcion			precio	ultimafechacompra
1		impresora	Epson Stylus C45	400.8	2008-02-08
2		impresora	Epson Stylus C85	500		2008-01-22
3		monitor		Samsung 14			800		2007-12-24
4		teclado		ingles Biswal		100		2008-03-08
5		teclado		español Biswal		90		2007-11-27

/*DESPUES*/
codigo	nombre		descripcion			precio	ultimafechacompra
3		monitor		Samsung 14			800		2007-12-24
4		teclado		ingles Biswal		100		2008-03-08
5		teclado		español Biswal		90		2007-11-27
