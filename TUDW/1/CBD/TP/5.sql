-- 2A

SELECT idproducto, descripcion, precio, stock
FROM productos
order BY descripcion

-- 2B

SELECT oficinas.ciudad,oficinas.provincia, empleados.*
FROM empleados
INNER JOIN oficinas ON empleados.oficina = oficinas.oficina

-- version reducida

SELECT o.ciudad,o.provincia, e.*
FROM empleados e
INNER JOIN oficinas o ON e.oficina = o.oficina

-- 2C

SELECT e.nombre, COUNT(*) 
FROM empleados e 
INNER JOIN clientes c ON c.empleadorepresentante = e.numemp GROUP BY e.numemp

-- 2D
SELECT * FROM 
`pedidos` 
ORDER BY fechapedido DESC

-- 2E
SELECT SUM(ventas)
FROM empleados
where oficina=12

-- 2F

SELECT o.oficina, o.ciudad, e.nombre
FROM empleados e
INNER JOIN oficinas o ON e.oficina=o.oficina

-- 2G
SELECT o.*,e.nombre
FROM oficinas o
INNER JOIN empleados e ON e.jefe=o.director
ORDER BY o.ciudad

-- 2H
SELECT p.codigo,p.numpedido,p.fechapedido,e.nombre
FROM pedidos p
INNER JOIN empleados e ON p.empleado=e.numemp
WHERE p.cliente=2106

-- 2I

SELECT p.codigo,p.numpedido,p.fechapedido,c.nombre
FROM pedidos p
INNER JOIN clientes c ON p.cliente=c.numclie
WHERE p.empleado=103

-- 2J
SELECT p.numpedido,p.fechapedido,i.cantidad,pr.descripcion
FROM pedidos p
INNER JOIN itemspedidos i ON p.codigo=i.codigopedido
INNER JOIN productos pr on i.idproducto=pr.idproducto
ORDER BY p.fechapedido

-- 2K
UPDATE `clientes` 
SET `empleadorepresentante`='108',`limitecredito`='50000' 
WHERE numclie=2103

-- 2L
UPDATE productos
SET stock=25
WHERE idproducto=41024