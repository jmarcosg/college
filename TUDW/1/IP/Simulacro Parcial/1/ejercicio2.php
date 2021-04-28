<?php
/**
 * Esta funcion verifica si el tipo de publicacion recibido por parametro es o no una publicidad
 * Si lo es, retorna un booleano true, de lo contrario un false
 * @param string $publicacion
 * @return boolean $publicidad
 */
function esPublicidad ($publicacion) {
    // Verifico si es una publicidad
    if ($publicacion == "publicidad") {
        $publicidad = true;
    } else {
        $publicidad = false;
    }
    return $publicidad;
}

/**
 * Esta funcion recibe por parametro el tipo de publicidad y la cantidad de caracteres
 * Luego retorna el costo de la publicacion
 * @param string $tipo
 * @param int $cantCaract
 * @return float $costo 
 */
function calcularCostoPublicidad ($tipo, $cantCaract) {
    // Verifico el tipo de publicidad
    $costo = -1;
    if ($tipo == "negro") {
        if ($cantCaract > 0 && $cantCaract <= 300) {
            $costo = 556.50;
        } elseif ($cantCaract > 300 && $cantCaract <= 500) {
            $costo = 950;
        } elseif ($cantCaract > 500) {
            $costo = 2300;
        }
    } elseif ($tipo == "color") {
        if ($cantCaract > 0 && $cantCaract <= 300) {
            $costo = 556.50 * 1.1;
        } elseif ($cantCaract > 300 && $cantCaract <= 500) {
            $costo = 950 * 1.1;
        } elseif ($cantCaract > 500) {
            $costo = 2300 * 1.1;
        }
    }
    return $costo;
}

/**
 * Esta funcion recibe por parametro la cantidad de lineas de un clasificado y muestra su costo
 * @param int $cantL
 * @return float $costo
 */
function calcularCostoClasificado ($cantL) {
    // int $cantLineasExtra
    // Verifico la cantidad de lineas
    $costo = -1;
    if ($cantL > 0 && $cantL <= 3) {
        $costo = 150.00;
    } elseif ($cantL > 3) {
        // Calculo la cantidad de lineas extra
        $cantLineasExtra = $cantL - 3;
        // Calculo el costo
        $costo = 150.00 + (25 * $cantLineasExtra);
    }
    return $costo;
}
/**
 * Este programa lee el tipo de publicacion de un cliente en un diario y muestra por pantalla el costo de la misma
 * string $tipoPublicacion, $tipoPublicidad
 * int $cantidadLineas, $cantidadCaracteres, $costoClasificado, $costoPublicidad
 * boolean $publicidad
 */

// Ingreso y lectura de valores
echo "Ingrese el tipo de publicacion (clasificado/publicidad): ";
$tipoPublicacion = trim(fgets(STDIN));

// Invoco al modulo para verificar el tipo de publicacion
$publicidad = esPublicidad($tipoPublicacion);

// Si es publicidad muestra un costo X, si es clasificado un costo Y, de lo contrario da error
if ($publicidad) {
    echo "Ingrese el tipo de publicidad (negro/color): ";
    $tipoPublicidad = trim(fgets(STDIN));
    echo "Ingrese la cantidad de caracteres: ";
    $cantidadCaracteres = (int)trim(fgets(STDIN));
    // Invoco a la funcion para calcular el costo y asigno su retorno a $costoPublicidad
    $costoPublicidad = calcularCostoPublicidad($tipoPublicidad, $cantidadCaracteres);
    // Muestro por pantalla el resultado
    echo "El costo de la publicidad es : $".$costoPublicidad;
} elseif ($tipoPublicacion == "clasificado") {
    echo "Ingrese la cantidad de lineas: ";
    $cantidadLineas = (int)trim(fgets(STDIN));
    // Invoco a la funcion para calcular el costo y asigno su retorno a $costoClasificado
    $costoClasificado = calcularCostoClasificado($cantidadLineas);
    // Muestro por pantalla el resultado
    echo "El costo del clasificado es : $".$costoClasificado;
} else {
    echo "ERROR! Verifique valores!";
}
?>