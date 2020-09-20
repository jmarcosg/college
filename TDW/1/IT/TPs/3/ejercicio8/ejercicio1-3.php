<?php
// Este programa calcula la ganancia de un empleado dependiendo de las horas trabajadas y el valor de la hora
// string $nombre
// float $horasTrab, $valorHora, $ganancia

// Ingreso y lectura de valores
echo "Ingrese empleado: ";
$nombre = trim(fgets(STDIN));
echo "Ingrese las horas trabajadas: ";
$horasTrab = trim(fgets(STDIN));
echo "Ingrese el valor de la hora: ";
$valorHora = trim(fgets(STDIN));

// Calculo de ganancia
$ganancia = $horasTrab * $valorHora;

// Devolucion de valor
echo $nombre." obtuvo $".$ganancia;
?>