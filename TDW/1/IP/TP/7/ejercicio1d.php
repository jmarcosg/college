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
 * Esta funcion se encarga de listar (mostrar por pantalla) un arreglo
 * @param float $arreglo
 * @param int $cantElementos
 */
function listarTemperaturas($arreglo, $cantElementos)
{
    // Declaracion de variables
    // int $numElemento

    // Inicializo variables
    $numElemento = 1;

    // Recorro el arreglo y voy mostrando por pantalla los elementos que hay dentro del arreglo
    for ($i = 0; $i < $cantElementos; $i++) {
        echo "La temperatura " . $numElemento . " es: " . $arreglo[$i] . "°C \n";
        $numElemento++;
    }
}

/**
 * Esta funcion calcula el promedio de las temperaturas que hay dentro de un arreglo
 * @param float $arreglo
 * @param int $cantElementos
 * @return float $promedio
 */
function promTemperaturas($arreglo, $cantElementos)
{
    // Declaracion de variables
    // float $sumaTemperaturas

    // Inicializacion de variables
    $sumaTemperaturas = 0;

    // Primero realizo la sumatoria de las temperaturas que hayan dentro del arreglo
    for ($i = 0; $i < $cantElementos; $i++) {
        $sumaTemperaturas += $arreglo[$i];
    }

    // Calculo el promedio
    $promedio = $sumaTemperaturas / $cantElementos;

    return $promedio;
}

/**
 * Esta funcion calcula el porcentaje de temperaturas mayores a una que ingresa por parametro
 * @param float $arreglo
 * @param int $cantElementos
 * @param float $tempDeterminada
 * @return float $porcentaje
 */
function porcTemperaturasSuperiores($arreglo, $cantElementos, $tempDeterminada)
{
    // Declaracion de variables
    // int $i, $cantidadTemperaturasSuperiores

    // Inicializo variables
    $porcentaje = 0;
    $cantidadTemperaturasSuperiores = 0;

    // Recorro el arreglo buscando la temperaturas mayores a $tempDeterminada, si el elemento en posicion i lo es, aumento en 1 el contador
    for ($i = 0; $i < $cantElementos; $i++) {
        if ($arreglo[$i] > $tempDeterminada) {
            $cantidadTemperaturasSuperiores++;
        }
    }

    // Calculo el porcentaje si la cantidad de temperaturas superiores es mayor a 0, de lo contrario retorno 0
    if ($cantidadTemperaturasSuperiores > 0) {
        $porcentaje = $cantidadTemperaturasSuperiores / $cantElementos;
        $porcentaje = $porcentaje * 100;
    }

    return $porcentaje;
}

/**
 * PROGRAMA PRINCIPAL
 * Este programa muestra un arreglo de N temperaturas, donde N es la cantidad de temperaturas a ser ingresadas
 * array float $arregloTemperaturas
 * int $cantidadTemperaturas, $numeroTemperatura
 * float $promedioTemperaturas, $porcentajeTemperaturasMayores, $temperaturaDeterminada
 */

// Inicializo variables
$arregloTemperaturas = [];
$numeroTemperatura = 1;

// Ingreso y lectura de la cantidad de temperaturas a ser ingresadas
echo "Cuantas temperaturas va a ingresar?: ";
$cantidadTemperaturas = (int) trim(fgets(STDIN));

// Llamo a la funcion leerTemperaturas para realizar el ingreso de valores dentro del arreglo de temperaturas
$arregloTemperaturas = leerTemperaturas($cantidadTemperaturas);

// Llamo a la funcion para listar las temperaturas del arreglo
listarTemperaturas($arregloTemperaturas, $cantidadTemperaturas);

// Llamo a la funcion para calcular el promedio de las temperaturas del arreglo
$promedioTemperaturas = promTemperaturas($arregloTemperaturas, $cantidadTemperaturas);
// Muestro por pantalla el resultado
echo "El promedio de las temperaturas ingresadas es: " . $promedioTemperaturas . "°C \n";

// Ingreso y lectura de la temperatura determinada
echo "Ingrese una temperatura: ";
$temperaturaDeterminada = trim(fgets(STDIN));
// Llamo a la funcion para mostrar el porcentaje de temperaturas mayores a una determinada
$porcentajeTemperaturasMayores = porcTemperaturasSuperiores($arregloTemperaturas, $cantidadTemperaturas, $temperaturaDeterminada);
// Muestro por pantalla el resultado
echo "El porcentaje de temperaturas mayores a " . $temperaturaDeterminada . "°C es: " . $porcentajeTemperaturasMayores . "%. \n";
