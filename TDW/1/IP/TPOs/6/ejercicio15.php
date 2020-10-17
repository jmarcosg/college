<?php
/**
 * Esta funcion calcula el promedio de multiplos sobre la cantidad de numeros ingresados
 * @param int $cantMultiplos
 * @param int $cantNumerosIngresados
 * @return float $promedio
 */
function calcularPromedioMultiplos ($cantMultiplos, $cantNumerosIngresados) {
    $promedio = ($cantMultiplos * 100) / $cantNumerosIngresados;
    return $promedio;
}

/**
 * Esta funcion verifica si un numero es multiplo de otro
 * @param int $num
 * @param int $multip
 * @return boolean $esMultiploDe
 */
function verificarMultiplo ($num, $multiplo) {
    // int $calcularMultiplo

    // Calculo si $num es multiplo de $multiplo
    $calcularMultiplo = $multiplo % $num;

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
 * Luego muestra por pantalla el porcentaje de multiplos que hubieron en la serie de numeros con respecto al numero principal
 * int $numero, $posibleMultiplo, $cantidadMultiplos, $cantidadNumerosIngresados 
 * float $promedioMultiplos
 * boolean $esMultiplo
 */
// Inicializo variables
$cantidadMultiplos = 0;
$posibleMultiplo = 0;

 // Ingreso y lectura de valores
 echo "Ingrese un numero: ";
 $numero = (int)trim(fgets(STDIN));

 do {
     echo "Ingrese un posible multiplo: ";
     $posibleMultiplo = (int)trim(fgets(STDIN));
     if ($posibleMultiplo <> -1) {
        // Aumento en 1 la cantidad de numeros ingresados
        $cantidadNumerosIngresados++;
         // Invoco a la funcion para verificar si el numero ingresado es multiplo y luego si lo es aumento su valor en 1
        $esMultiplo = verificarMultiplo($numero, $posibleMultiplo);
        if ($esMultiplo) {
           $cantidadMultiplos++;
        }
     }
} while ($posibleMultiplo <> -1);
// Invoco a la funcion para calcular el promedio de multiplos ingresados y almaceno su valor
$promedioMultiplos = calcularPromedioMultiplos($cantidadMultiplos, $cantidadNumerosIngresados);

// Muestro por pantalla el resultado final
echo "El promedio de multiplos de ".$numero." ingresados es: %".$promedioMultiplos;
?>