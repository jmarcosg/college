<?php
/**
 * Esta funcion recibe por parametro un numero que va a ser el que corte la secuencia de ingreso de numeros
 * @param int $numeroQueCorta
 * @return int $sumatoria
 */
function sumaFiltrada($numeroQueCorta)
{
    // int $suma, $num

    // Inicializo variables
    $sumatoria = 0;

    do {
        echo "Ingrese un numero: ";
        $num = trim(fgets(STDIN));
        if ($num != $numeroQueCorta) {
            $sumatoria += $num;
        }
    } while ($num != $numeroQueCorta);

    return $sumatoria;
}

/**
 * Programa principal
 * Este programa lee un numero que va a ser el que corte el ciclo de ingreso de numero en la funcion, luego muestra la sumatoria de los numeros ingresados
 * int $numero, $sumatoriaNumeros
 */

// Inicializo variables
$sumatoriaNumeros = 0;

echo "Ingrese el numero que finalize el programa: ";
$numero = (int) trim(fgets(STDIN));

$sumatoriaNumeros = sumaFiltrada($numero);

// Devuelvo el resultado
echo "La sumatoria de los numeros ingresados es: " . $sumatoriaNumeros;
