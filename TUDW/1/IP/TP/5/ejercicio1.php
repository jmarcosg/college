<?php
/**
 * Esta funcion calcula si un numero es par o impar
 * Luego, muestra por pantalla el resultado
 * Un numero es par si al dividirlo por dos el resto es igual a 0
 * @param int $num
 * @return boolean $esParImpar
 */
function esPar ($num) {
    // int $calculo
    $calculo = ($num % 2);

    // Si $calculo es igual a 0 es par, de lo contrario impar
    if ($calculo == 0) {
        $esParImpar = true;
    } else {
        $esParImpar = false;
    }
    return $esParImpar;
}

// Este programa lee un numero, luego lo utiliza en una funcion para mostrar si es par o impar
// int $numero
// boolean $esParImpar

// Ingreso y lectura de valores
echo "Ingrese un numero entero: ";
$numero = (int)trim(fgets(STDIN));

// Invoco a la funcion para calcular y mostrar si es par o no el numero ingresado
$esParImpar = esPar($numero);

// Si el resultado de $esParImpar es true muestra que es par, de lo contrario muestra que es impar
if ($esParImpar) {
    echo "el nro ".$numero." es: par";
} else {
    echo "el nro ".$numero." es: impar";
}
?>