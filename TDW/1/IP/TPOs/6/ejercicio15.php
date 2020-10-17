<?php
/**
 * Esta funcion calcula el promedio de multiplos sobre la cantidad de numeros ingresados
 * @param int $cantMultiplos
 * @param int $cantNumerosIngresados
 * @return float $promedio
 */
function calcularPromedioMultiplos ($cantMultiplos, $cantNumerosIngresados) {
    $promedio = ($cantidadMultiplos * 100) / $cantidadNumerosIngresados;
    return $promedio;
}

/**
 * Esta funcion verifica si un numero es multiplo de otro que recibe por parametro
 * @param int $num
 * @param int $multip
 * @return boolean $esMultiploDe
 */
function verificarMultiplo ($num, $multip) {
    // int $calcularMultiplo

    // Calculo si $num es multiplo de $multip
    $calcularMultiplo = $multip % $num;

    // Si $calcularMultiplo == 0 es multiplo, por lo tanto true
    if ($calcularMultiplo == 0) {
        $esMultiploDe = true;
    } else {
        $esMultiploDe = false;
    }
    return $esMultiploDe;
}

/**
 * Programa principal
 * Este programa lee un numero principal y luego una serie de numeros aleatorios
 * Luego muestra por pantalla la cantidad de multiplos que hubieron en la serie de numeros con respecto al numero principal
 * int $numero, $multiplo, $cantidadMultiplos, $cantidadNumerosIngresados, $promedioMultiplos
 * boolean $esMultiplo
 */
// Inicializo variables
$cantidadMultiplos = 0;
$multiplo = 0;

 // Ingreso y lectura de valores
 echo "Ingrese un numero: ";
 $numero = trim(fgets(STDIN));

 do {
     echo "Ingrese un posible multiplo: ";
     $multiplo = trim(fgets(STDIN));
     if ($multiplo <> -1) {
        // Aumento en 1 la cantidad de numeros ingresados
        $cantidadNumerosIngresados++;
         // Invoco a la funcion para verificar si el numero ingresado es multiplo y luego si lo es aumento su valor en 1
        $esMultiplo = verificarMultiplo($numero, $multiplo);
        if ($esMultiplo) {
           $cantidadMultiplos++;
        }
     }
} while ($multiplo <> -1);

// test para verificar la cantidad que tengo de cada cosa
echo "cant num ing: ".$cantidadNumerosIngresados;
echo "cant mult: ".$cantidadMultiplos;

// Invoco a la funcion para calcular el promedio de multiplos ingresados y almaceno su valor
$promedioMultiplos = calcularPromedioMultiplos($cantidadMultiplos, $cantidadNumerosIngresados);

// Muestro por pantalla el resultado final
echo "El promedio de multiplos de ".$numero." ingresados es: %".$promedioMultiplos;
?>