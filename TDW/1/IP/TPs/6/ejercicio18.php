<?php
/**
 * Programa principal
 * Este programa lee palabras y despues muestra por pantalla una oracion formada con las palabras ingresadas
 * String $palabra, $oracion
 */

// Inicializo variables
$oracion = "";

echo "Inicio de ingreso de palabras. Ingrese " . " para terminar el programa. \n";

do {
    echo "Ingrese una palabra: ";
    $palabra = trim(fgets(STDIN));

    if ($palabra != "." && $oracion != "") {
        $oracion .= " " . $palabra;
    } else if ($palabra != ".") {
        $oracion .= $palabra;
    } else {
        $oracion .= $palabra;
    }
} while ($palabra != ".");

echo "La oracion formada es: " . $oracion;
