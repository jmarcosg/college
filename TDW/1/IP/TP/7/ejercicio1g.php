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
        echo "La temperatura " . $numElemento . " es: " . $arreglo[$i] . "\n";
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
 * Esta funcion compara temperaturas dentro de un arreglo y devuelve la menor de ellas
 * @param float $arreglo
 * @param int $cantElementos
 * @return float $tempMinima
 */
function minTemperatura($arreglo, $cantElementos)
{
    // Declaracion de variables
    // float $tempMaxima

    // Inicializacion de variables
    $tempMaxima = 0;
    $tempMinima = 0;

    // Recorro el arreglo buscando la temperatura maxima
    for ($i = 0; $i < $cantElementos; $i++) {
        // Si el elemento en la posicion i es mayor a la temperatura maxima, va a ser la nueva temperatura maxima
        if ($arreglo[$i] > $tempMaxima) {
            $tempMaxima = $arreglo[$i];
        }

        // Si la temperatura minima es menor a la maxima y ademas el elemento en posicion i es menor a la maxima es la nueva temperatura minima
        if ($tempMinima < $tempMaxima && $arreglo[$i] < $tempMaxima) {
            $tempMinima = $arreglo[$i];
        }
    }

    return $tempMinima;
}

/**
 * Esta funcion compara temperaturas dentro de un arreglo y devuelve la mayor de ellas
 * @param float $arreglo
 * @param int $cantElementos
 * @return float $tempMaxima
 */
function maxTemperatura($arreglo, $cantElementos)
{
    // Declaracion de variables
    // float $tempMinima

    // Inicializacion de variables
    $tempMaxima = 0;
    $tempMinima = 0;

    // Recorro el arreglo buscando la temperatura maxima
    for ($i = 0; $i < $cantElementos; $i++) {
        // Si el elemento en la posicion i es mayor a la temperatura maxima, va a ser la nueva temperatura maxima
        if ($arreglo[$i] > $tempMaxima) {
            $tempMaxima = $arreglo[$i];
        }
    }

    return $tempMaxima;
}

/**
 * Esta funcion utiliza a un arreglo asociativo para formar un nuevo arreglo donde se van a mostrar los dos extremos de temperaturas (minima y maxima), para esto hace uso del arreglo indexado anterior y de funciones anteriores
 * @param float $arreglo
 * @param int $cantElementos
 * @return float $arregloAsociativo
 */
function extemosTemperatura($arreglo, $cantElementos)
{
    // Declaracion de variables
    // float $tempMinima, $tempMaxima

    // Inicializacion de variables
    $tempMaxima = 0;
    $tempMinima = 0;

    // Recorro el arreglo buscando la temperatura maxima
    for ($i = 0; $i < $cantElementos; $i++) {
        // Si el elemento en la posicion i es mayor a la temperatura maxima, va a ser la nueva temperatura maxima
        if ($arreglo[$i] > $tempMaxima) {
            $tempMaxima = $arreglo[$i];
        }

        // Si la temperatura minima es menor a la maxima y ademas el elemento en posicion i es menor a la maxima es la nueva temperatura minima
        if ($tempMinima < $tempMaxima && $arreglo[$i] < $tempMaxima) {
            $tempMinima = $arreglo[$i];
        }
    }

    // Recorro el arreglo buscando la temperatura maxima
    for ($i = 0; $i < $cantElementos; $i++) {
        // Si el elemento en la posicion i es mayor a la temperatura maxima, va a ser la nueva temperatura maxima
        if ($arreglo[$i] > $tempMaxima) {
            $tempMaxima = $arreglo[$i];
        }
    }

    // Armo el nuevo arreglo asociativo
    $arregloAsociativo = [
        "Temperatura minima" => $tempMinima,
        "Temperatura maxima" => $tempMaxima,
    ];

    return $arregloAsociativo;
}

/**
 * PROGRAMA PRINCIPAL
 * Este programa muestra un arreglo de N temperaturas, donde N es la cantidad de temperaturas a ser ingresadas
 * array float $arregloTemperaturas, $arregloAsociativoTemperaturas
 * int $cantidadTemperaturas, $numeroTemperatura
 * float $promedioTemperaturas, $temperaturaMinima, $temperaturaMaxima
 */

// Inicializo variables
$arregloTemperaturas = [];
$arregloAsociativoTemperaturas = [];
$numeroTemperatura = 1;
$temperaturaMaxima = 0;
$temperaturaMinima = 0;

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

// Llamo a la funcion para ver cual es la menor temperatura ingresada y almaceno el valor
$temperaturaMinima = minTemperatura($arregloTemperaturas, $cantidadTemperaturas);
// Muestro por pantalla cual es la menor temperatura ingresada
echo "La menor temperatura ingresada fue: " . $temperaturaMinima . "°C \n";

// Llamo a la funcion para ver cual es la mayor temperatura ingresada y almaceno el valor
$temperaturaMaxima = maxTemperatura($arregloTemperaturas, $cantidadTemperaturas);
echo "La mayor temperatura ingresada fue: " . $temperaturaMaxima . "°C \n";

// Llamo a la funcion para ver cuales son los extremos de las temperaturas ingresadas y almaceno su valor
$arregloAsociativoTemperaturas = extemosTemperatura($arregloTemperaturas, $cantidadTemperaturas);
// Muestro el arreglo asociativo
foreach ($arregloAsociativoTemperaturas as $key => $value) {
    echo $key . " es " . $value . "°C\n";
}
