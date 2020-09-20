<?php
// Este programa hace la conversion de grados centigrados a Fahrenheit
// float $gradosC, $gradosF

// Ingreso y lectura de los grados centigrados
echo "Ingrese los grados centigrados: ";
$gradosC = trim(fgets(STDIN));

// Realizo la conversion
$gradosF = ($gradosC * 9 / 5) + 32;

// Devolucion de la conversion
echo $gradosC."°C a grados Fahrenheit es: ".$gradosF."°F";
?>