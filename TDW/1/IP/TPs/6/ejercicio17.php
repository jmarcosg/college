<?php
/**
 * Programa principal
 * Este programa lee una secuencia de numeros y muestra por pantalla si esta ordenado de forma creciente
 * int $antecedente, $consecuente
 * boolean $creciente, $decreciente
 */

// Inicializo varialbes
$decreciente = false;
$creciente = true;

// Ingreso y lectura de variables
echo "Ingrese un numero: ";
$antecedente = (int) trim(fgets(STDIN));

do {
    echo "Ingrese otro numero: ";
    $consecuente = (int) trim(fgets(STDIN));
    if ($consecuente != -1) {
        if ($consecuente < $antecedente && $creciente) {
            $creciente = false;
            $decreciente = true;
        } else if ($consecuente >= $antecedente && $creciente) {
            $antecedente = $consecuente;
        } else if ($consecuente >= $antecedente && $decreciente) {
            $decreciente = false;
        }
    }

} while ($consecuente != -1);

if ($creciente && !$decreciente) {
    echo "Los numeros fueron ingresados de forma creciente";
} else if (!$creciente && $decreciente) {
    echo "Los numeros fueron ingresados de forma decreciente";
} else {
    echo "Los numeros fueron ingresados de forma desordenada";
}
