<?php
/**
 * Esta funcion verifica si el numero ingresado es un Natural
 * Los numeros naturales son aquellos que son mayores a 0
 * @param int $num
 * @return boolean $esNatural
 */
function verificarNumeroNatural ($num) {
    // Inicializo a $esNatural en true
    $esNatural = true;

    // Si el numero recibido es menor a 1 no es Natural
    if ($num < 1) {
        $esNatural = false;
    }

    return $esNatural;
}

/**
 * @param int $num
 * @return boolean $bandera
 */
function esNroElegido2 ($num) {
    // int $umbral, $i
    // boolean $bandera

    $umbral = ((int)($num / 2)) + 1;
    $bandera = true;
    $i = 2;

    while ($bandera && $i < $umbral) {
        $bandera = !($num % $i == 0);
        $i++;
    }

    return $bandera;
}

/**
 * Esta funcion suma numeros primos
 * @param int $num
 * @return boolean $suma
 */
function sumaNumerosPrimos ($num) {
    // int $suma, $i
    $suma = 0;

    for ($i = 2; $i <= $num; $i++){
        if(esNroElegido2($i)){
            $suma += $i;
        }
    }

    return $suma;
}

/**
 * Programa principal
 * Lee un numero y luego, a traves de funciones, muestra por pantalla la sumatoria de numeros primos
 * int $numero, $sumatoria
 * boolean $esNumeroNatural 
 */

 // Inicializo variables
 $sumatoria = 0;

 // Ingreso y lectura de valores
echo "Ingrese un numero: ";
$numero = (int)trim(fgets(STDIN));

// Verifico a traves de la funcion verificarNumeroNatural si el numero ingresado es un Natural
$esNumeroNatural = verificarNumeroNatural($numero);

// Si es Natural, realiza la sumatoria. De lo contrario, muestra error
if ($esNumeroNatural) {
    $sumatoria = $sumatoria + sumaNumerosPrimos($numero);
    echo "El resultado de la sumatoria de primos para ",$numero," es: ",$sumatoria;
} else {
    echo "El numero ingresado tiene que ser un Natural";
}
?>