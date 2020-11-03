<?php
/**
 * PROGRAMA PRINCIPAL
 * Este programa lee una secuencia de palabras y luego muestra una oracion con las palabras ingresadas pero invertida
 * String $palabra, $oracion
 */

// Inicializo varaiables
$oracion = "";

do {
    echo "Ingrese una palabra: ";
    $palabra = trim(fgets(STDIN));
    if ($palabra != "." && $oracion != "") {
        $oracion = $palabra . " " . $oracion;
    } else if ($palabra != ".") {
        $oracion = $palabra . $oracion;
    } else {
        $oracion = $palabra . $oracion;
    }
} while ($palabra != ".");

echo $oracion;
