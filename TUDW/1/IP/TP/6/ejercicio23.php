<?php
/**
 * MODULO verificarPrimo
 * Este modulo recibe un numero por parametro e imprime si es primo o no
 *
 * @param int $num
 * @return boolean $esPrimo
 */
function verificarPrimo($num)
{
    // int $i

    // Inicializo variables
    $i = 1;
    $esPrimo = true;

    while ($esPrimo && $i <= $num) {
        if ($i != 1 && $i != $num && $num % $i == 0) {
            $esPrimo = false;
        } else {
            $i++;
        }
    }
    return $esPrimo;
}

/**
 * MODULO calcularFactorial
 * Este modulo recibe un numero por parametro e imprime su factorial
 * @param int $num
 * @return int $factorial
 */
function calcularFactorial($num)
{
    // int $factorial
    // Inicializo a factorial en 1 ya que es el caso base
    $factorial = 1;

    for ($i = 1; $i <= $num; $i++) {
        $factorial *= $i;
    }
    return $factorial;
}

/**
 * MODULO calcularDivisores
 * Este modulo recibe un numero por parametro e imprime sus divisores
 * @param int $num
 */
function mostrarDivisores($num)
{
    // String $divisores
    // Inicializo a $divisores en ( para armar el principio del mensaje a mostrar
    $divisores = "(";

    for ($i = 1; $i <= $num / 2; $i++) {
        if ($num % $i == 0) {
            $divisores .= $i . ",";
        }
    }
    $divisores .= $num . ")";
    echo "Los divisores de " . $num . " son: " . $divisores . "\n";
}

/**
 * PROGRAMA PRINCIPAL
 * Este programa lee una secuencia de numeros hasta que se ingresa un 0, luego muestra si el numero ingresado es primo, su factorial y una lista de sus divisores
 * int $numero, $resultadoFactorial
 * booelan $esNumeroPrimo
 */

// Inicializo variables
$esNumeroPrimo = false;
$resultadoFactorial = 0;

do {
    echo "Ingrese un numero entero: ";
    $numero = (int) trim(fgets(STDIN));

    // Si el numero ingresado es distinto de 0 devuelvo valores, de lo contrario finalizo el programa
    if ($numero != 0) {
        // Verifico si el numero ingresado es primo a traves de su funcion y almoceno su valor
        $esNumeroPrimo = verificarPrimo($numero);
        if ($esNumeroPrimo) {
            echo "El numero " . $numero . " es primo \n";
        } else {
            echo "El numero " . $numero . " no es primo \n";
        }

        // Calculo el factorial del numero ingresado a traves de su funcion y almaceno su valor
        $resultadoFactorial = calcularFactorial($numero);
        echo $numero . "! = " . $resultadoFactorial . "\n";

        // Calculo los divisores del numero ingresado a traves de su funcion y la misma muestra a los divisores
        mostrarDivisores($numero);
    }
} while ($numero != 0);

if ($numero == 0) {
    echo "Programa finalizado.";
}
