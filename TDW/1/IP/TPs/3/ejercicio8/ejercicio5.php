<?php
// Este programa muestra el porcentaje que se deberia aplicar a un sueldo inicial para obtener el sueldo deseado
// float $sueldoInicial, $sueldoDeseado, $porcentajeAumento

// Ingreso y lectura de valores
echo "Ingrese el sueldo inicial: ";
$sueldoInicial = trim(fgets(STDIN));
echo "Ingrese el sueldo deseado: ";
$sueldoDeseado = trim(fgets(STDIN));

// Calculos para averiguar el porcentaje de aumento
$porcentajeAumento = ($sueldoDeseado * 100) / $sueldoInicial;
$porcentajeAumento = $porcentajeAumento - 100;

// Devolucion de valor
echo "El porcentaje a aplicar deberia ser del %".$porcentajeAumento;
?>