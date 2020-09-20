<?php
// Este programa muestra cuanto se tardo en realizar el backup
// float $tiempoSegundos, $aux
// int $tiempoEmpleado, $minutos, $segundos

// Ingreso y lectura de valores
echo "Ingrese el tiempo empleado en segundos: ";
$tiempoSegundos = trim(fgets(STDIN));

// Calculos para el tiempo empleado
$tiempoEmpleado = $tiempoSegundos / 60;
$minutos = (int)$tiempoEmpleado; // $minutos tiene la parte entera de $tiempoEmpleado
$aux = $minutos - $tiempoEmpleado;
$segundos = $aux * 100;

// Devolucion de valores
echo "La copia tardo ".$minutos.":".$segundos;
?>