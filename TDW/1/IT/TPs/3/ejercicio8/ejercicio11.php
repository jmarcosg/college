<?php
// Este programa calcula cuanto es el porcenta X de Y
// float $numeroX, $numeroY, $porcentaje

// Ingreso y lectura de valores
echo "Ingrese el numero X: ";
$numeroX = trim(fgets(STDIN));
echo "Ingrese el numero Y: ";
$numeroY = trim(fgets(STDIN));

// Calculo el porcentaje
$porcentaje = ($numeroX * 100) / $numeroY;

// Devolucion del valor
echo "El porcentaje que resprensenta ".$numeroX." de ".$numeroY." es: %".$porcentaje;
?>