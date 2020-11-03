<?php
// Este programa calcula el area de un rectangulo
// float $base, $altura, $area

// Ingreso y lectura de valores
echo "Ingrese la base: ";
$base = trim(fgets(STDIN));
echo "Ingrese la altura: ";
$altura = trim(fgets(STIND));

// Calculo el area
$area = $base * $altura;

// Devuelvo el valor
echo "El area del rectangulo es: ".$area."cm2"
?>