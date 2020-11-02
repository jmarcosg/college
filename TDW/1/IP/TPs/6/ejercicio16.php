<?php
/**
 * Programa principal
 * Este programa lee un numero y una secuencia de numeros, si en la secuencia se encuentra el primer numero ingresado muestra por pantalla "Número encontrado" sino "Número no encontrado"
 * int $numero, $numeroEnSecuencia
 * boolean $numeroEncontrado
 */

// Inicializo a $numeroEncontrado
$numeroEncontrado = false;

// Ingreso y lectura de valores
echo "Ingrese un numero: ";
$numero = (int) trim(fgets(STDIN));

echo "Inicio de secuencia de numeros. Ingrese -1 para finalizar. \n";
do {
    echo "Ingrese otro numero: ";
    $numeroEnSecuencia = (int) trim(fgets(STDIN));

    // Si el numero ingresado en secuencia es igual al numero principal $numeroEncontrado = true
    if ($numeroEnSecuencia == $numero) {
        $numeroEncontrado = true;
    }
} while ($numeroEnSecuencia != -1);

// Si el numero fue encontrado se muestra un mensaje en pantalla apropiado, de lo contrario otro mensaje
if ($numeroEncontrado) {
    echo "Número encontrado";
} else {
    echo "Número no encontrado";
}
