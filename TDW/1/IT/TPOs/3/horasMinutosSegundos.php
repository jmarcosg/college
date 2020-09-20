<?php
// Ejercicio 9B
// Este algoritmo pasa una cantidad X de segundos a horas, minutos y segundos.
// int segundos, minutos, horas, segundosAux
echo "Ingrese la cantidad total de segundos: ";
$segundos = trim(fgets(STDIN));
$segundosAux = $segundos;

$minutos = $segundosAux / 60;
$segundosAux = $segundos % 60;
$horas = $minutos / 60;
$minutos = $minutos % 60;

echo $segundos." segundos son: " .(int)$horas. " horas ". (int)$minutos. " minutos " . $segundosAux. " segundos";
?>