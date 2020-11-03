<?php
/**
 * Programa principal
 * Este programa itera ingreso y lectura de numeros hasta que se ingrese el 0
 * Luego, muestra la suma se todos los numeros ingresados
 * int $numero, $sumaNumeros 
 */
// Inicializo a $sumaNumeros en 0
$sumaNumeros = 0;

echo "Ingrese un numero: ";
$numero = (int)trim(fgets(STDIN));

while ($numero <> 0) {
    $sumaNumeros = $sumaNumeros + $numero;
    echo "Ingrese otro numero: ";
    $numero = (int)trim(fgets(STDIN));
}

echo "La suma de todos los numeros ingresados es: ".$sumaNumeros;
?>