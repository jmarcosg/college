<?php
/**
 * PROGRAMA PRINCIPAL
 * Este programa lee palabras y muestra por pantalla la posicion en que se encuentra junto con la palabra
 * int $numeroPalabra
 * String $palabra
 */

// Inicializo variables
$numeroPalabra = 0;

echo "Inicio de ingreso de secuencia de palabras. Ingrese . para finalizar el programa. \n";
// Ingreso y lectura de valores
do {
    echo "Ingrese una palabra: ";
    $palabra = trim(fgets(STDIN));
    $numeroPalabra++;

    // Muestro por pantalla el numero de la palabra junto con la palabra ingresada
    echo "La palabra número " . $numeroPalabra . " es: " . $palabra . "\n";
} while ($palabra != ".");
