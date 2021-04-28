<?php
/**
 * Esta funcion se encarga de leer e insertar temperaturas dentro del arreglo
 * @param int $cantTemps
 * @return float $temperaturas
 */
function leerTemperaturas($cantTemps)
{
    // Declaracion de variables
    // int $i, $nroTemperatura

    // Inicializacion de variables
    $temperaturas = [];
    $nroTemperatura = 1;

    for ($i = 0; $i < $cantTemps; $i++) {
        echo "Ingrese la temperatura " . $nroTemperatura . ": ";
        $temperaturas[$i] = trim(fgets(STDIN));
        $nroTemperatura++;
    }

    return $temperaturas;
}

/**
 * PROGRAMA PRINCIPAL
 * Este programa muestra un arreglo de N temperaturas, donde N es la cantidad de temperaturas a ser ingresadas
 * array float $arregloTemperaturas
 * int $cantidadTemperaturas, $numeroTemperatura
 */

// Inicializo variables
$arregloTemperaturas = [];
$numeroTemperatura = 1;

// Ingreso y lectura de la cantidad de temperaturas a ser ingresadas
echo "Cuantas temperaturas va a ingresar?: ";
$cantidadTemperaturas = (int) trim(fgets(STDIN));

// Llamo a la funcion leerTemperaturas para realizar el ingreso de valores dentro del arreglo de temperaturas
$arregloTemperaturas = leerTemperaturas($cantidadTemperaturas);

// Recorro el arreglo y voy mostrando por pantalla las temperaturas que hay dentro del arreglo
for ($i = 0; $i < $cantidadTemperaturas; $i++) {
    echo "La temperatura " . $numeroTemperatura . " es: " . $arregloTemperaturas[$i] . "\n";
    $numeroTemperatura++;
}
