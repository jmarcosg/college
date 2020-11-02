<?php
/**
 * MODULO menu
 * Este modulo imprime las opciones que se pueden realizar
 */
function menu()
{
    echo "Ingrese la opcion que desea realizar: \n";
    echo "1: Imprimir los digitos de un numero en orden inverso \n";
    echo "2: Imprimir la suma de los digitos de un numero \n";
    echo "3: Imprimir si el numero es par o impar \n";
    echo "4: Imprimir la cantidad de divisores propios del numero \n";
    echo "0: SALIR \n";
}

/**
 * MODULO opciones
 * Este modulo recibe por parametro una de las opciones elegidas por el usuario y ejecuta la accion
 * @param int $op
 */
function opciones($op)
{
    switch ($op) {
        case 1:
            imprimirInverso();
            break;
        case 2:
            imprimirSumatoria();
            break;
        case 3:
            parOImpar();
            break;
        case 4:
            divisoresPropios();
            break;
        default:
            echo "Opcion invalida \n";
            break;
    }
}

/**
 * MODULO imprimirInverso
 * Este modulo lee un numero e imprime ese numero de forma invertida
 */
function imprimirInverso()
{
    //int $num, $aux
    //String $invertido
    echo "Ingrese un numero: ";
    $num = trim(fgets(STDIN));
    $invertido = 0;
    $i = 1;
    $aux = $num;

    while ($aux != 0) {
        $invertido = ($invertido * 10) + $aux % 10;
        $aux = (int) ($aux / 10);
    }
    echo "El numero " . $num . " invertido es: " . $invertido . "\n";
}

/**
 * MODULO imprimirSumatoria
 * Este modulo lee un numero e imprime la sumatoria de sus digitos
 */
function imprimirSumatoria()
{
//int $num, $sumatoria, $aux
    echo "Ingrese un numero: ";
    $num = trim(fgets(STDIN));
    $aux = $num;
    $sumatoria = 0;

    while ($aux != 0) {
        $sumatoria += $aux % 10;
        $aux = (int) ($aux / 10);
    }

    echo "La sumatoria de los digitos de " . $num . " es: " . $sumatoria . "\n";
}

/**
 * MODULO parOImpar
 * Este modulo lee un numero e imprime si es par o impar
 */
function parOImpar()
{
    //int $num
    echo "Ingrese un numero: ";
    $num = trim(fgets(STDIN));
    if ($num % 2 == 0) {
        echo "El numero es par \n";
    } else {
        echo "El numero es impar \n";
    }
}

/**
 * MODULO divisoresPropios
 * Este modulo lee un numero e imprime la cantidad de divisores propios que tiene
 */
function divisoresPropios()
{
    //int $num, $i, $contador
    //String $divisores
    echo "Ingrese un numero: ";
    $divisores = "(";
    $num = trim(fgets(STDIN));
    $i = (int) ($num / 2);
    $contador = 0;

    for ($j = 1; $j <= $i; $j++) {
        if ($num % $j == 0) {
            $divisores .= $j . ",";
            $contador++;
        }
    }
    $divisores .= ")";

    echo "El numero " . $num . " tiene " . $contador . " divisores " . $divisores . "\n";
}

/**
 * PROGRAMA PRINCIPAL
 * Este programa muestra un menu de opciones con distintas operaciones a realizar para un numero que se ingrese
 * int $opcion, $num
 */

do {
    menu();
    $opcion = trim(fgets(STDIN));
    if ($opcion != 0) {
        opciones($opcion);
    }
} while ($opcion != 0);

if ($opcion == 0) {
    echo "Programa finalizado.";
}
