<?php
// Este programa calcula el promedio de tres notas
// float $nota1, $nota2, $nota3, $promedio

// Ingreso y lectura de valores
echo "Ingrese la primer nota: ";
$nota1 = trim(fgets(STDIN));
echo "Ingrese la segunda nota: ";
$nota2 = trim(fgets(STDIN));
echo "Ingrese la tercer nota: ";
$nota3 = trim(fgets(STDIN));

// Calculo promedio
$promedio = ($nota1 + $nota2 + $nota3) / 3;

// Devolucion de valor
echo "El promedio es: ".$promedio;
?>