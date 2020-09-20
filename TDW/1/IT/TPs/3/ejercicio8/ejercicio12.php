<?php
// Este programa calcula la edad aproximada de una persona
// int $anioActual, $anioNacimiento, $edadAproximada

// Ingreso y lectura de valores
echo "Ingrese el año de nacimiento: ";
$anioNacimiento = trim(fgets(STDIN));
echo "Ingrese el año actual: ";
$anioActual = trim(fgets(STDIN));

// Calculo la edad aproximada
$edadAproximada = $anioActual - $anioNacimiento;

// Devuelvo el valor
echo "La edad aproximada de esta persona es: ".$edadAproximada." años";
?>