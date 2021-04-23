<?php
include 'Persona.php';
include 'Cuota.php';
include 'Prestamo.php';
include 'Financiera.php';

$financiera = new Financiera("Money", "Av. Arg 1234");

$persona1 = new Persona("Pepe", "Florez", 12344556, "Bs As 12", "dir@mail.com", 299444567, 40000);
$persona2 = new Persona("Luis", "Suarez", 12346556, "Bs As 123", "dir@mail.com", 2994455, 4000);

$prestamo1 = new Prestamo(1, 50000, 3, 0.1, $persona1);
$prestamo2 = new Prestamo(2, 10000, 4, 0.1, $persona2);
$prestamo3 = new Prestamo(3, 10000, 2, 0.1, $persona2);

// Inciso 3
echo "Inciso 3 \n";
$financiera->incorporarPrestamo($prestamo1);
$financiera->incorporarPrestamo($prestamo2);
$financiera->incorporarPrestamo($prestamo3);

// Inciso 4
echo "Inciso 4 \n";
echo $financiera . "\n";

// Inciso 5
echo "Inciso 5 \n";
$financiera->otorgarPrestamoSiCalifica() . "\n";

// Inciso 6
echo "Inciso 6 \n";
echo $financiera . "\n";

// Inciso 7
echo "Inciso 7 \n";
$objCuota = $financiera->informarCuotaPagar(2) . "\n";

// Inciso 8
echo "Inciso 8 \n";
echo $objCuota . "\n";

// Inciso 9
echo "Inciso 9 \n";
echo $objCuota->darMontoFinalCuota() . "\n";

// Inciso 10
echo "Inciso 10 \n";
$objCuota->setCancelada(true);

// Inciso 11
echo "Inciso 11 \n";
$objCuota = $financiera->informarCuotaPagar(2) . "\n";

// Inciso 12
echo "Inciso 12 \n";
echo $objCuota . "\n";
