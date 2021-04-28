<?php
/**
 * PROGRAMA PRINCIPAL
 * Este programa lee una secuencia de letras y luego muestra la cantidad de vocales que fueron ingresadas
 * int $cantidadVocales, $cantidadA, $cantidadE, $cantidadI, $cantidadO, $cantidadU;
 * String $letra
 */

// Inicializo variables
$cantidadVocales = 0;
$cantidadA = 0;
$cantidadE = 0;
$cantidadI = 0;
$cantidadO = 0;
$cantidadU = 0;

echo "Inicio de ingreso de secuencia de letras. Ingrese - para finalizar el programa. \n";
do {
    echo "Ingrese una letra: ";
    $letra = trim(fgets(STDIN));

    if ($letra == "a" || $letra == "e" || $letra == "i" || $letra == "o" || $letra == "u") {
        $cantidadVocales++;
        if ($letra == "a" || $letra == "A") {
            $cantidadA++;
        } else if ($letra == "e" || $letra == "E") {
            $cantidadE++;
        } else if ($letra == "i" || $letra == "I") {
            $cantidadI++;
        } else if ($letra == "o" || $letra == "O") {
            $cantidadO++;
        } else if ($letra == "u" || $letra == "U") {
            $cantidadU++;
        }
    }
} while ($letra != "-");

echo "Cantidad de vocales ingresadas: " . $cantidadVocales . "\n";
echo "Cantidad de A ingresadas: " . $cantidadA . "\n";
echo "Cantidad de E ingresadas: " . $cantidadE . "\n";
echo "Cantidad de I ingresadas: " . $cantidadI . "\n";
echo "Cantidad de O ingresadas: " . $cantidadO . "\n";
echo "Cantidad de U ingresadas: " . $cantidadU . "\n";
