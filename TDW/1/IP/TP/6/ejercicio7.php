<?php
/**
 * Esta funcion recibe un numero entero y muestra si es par o impar
 * @param int $num
 * @return boolean $paridad
 */
function verificarParImpar ($num) {
    // int $calcularPar
    // Inicializo a $paridad en false indicando que es impar
    $paridad = false;

    // Calculo si el numero recibido es par o impar
    $calcularPar = $num % 2;

    // $paridad va a cambiar de valor si el calculo anterior es igual a 0
    if ($calcularPar == 0) {
        $paridad = true;
    }
    return $paridad;
}

/**
 * Programa principal
 * Lee una serie de numeros y muestra por pantalla si son pares o impares
 * int $cantidadNumeros, $i, $numero
 * boolean $esPar
 */

 // Ingreso y lectura de la cantidad de numeros a ingresar
 echo "Ingrese la cantidad de numeros a ingresar: ";
 $cantidadNumeros = (int)trim(fgets(STDIN));

for ($i = 0; $i < $cantidadNumeros; $i++) {
    echo "Ingrese un numero: ";
    $numero = (int)trim(fgets(STDIN));
    $esPar = verificarParImpar($numero);
    if ($esPar) {
        echo $numero." es par \n";
    } else {
        echo $numero." es impar \n";
    }
}
?>