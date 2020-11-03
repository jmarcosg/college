<?php
/**
 * Esta funcion realiza la sumatoria de fracciones
 * Las sumatoria de fracciones es tal que N/M, donde N es el numero inicial (2) y M van a ser la cantidad de ciclos que el usuario quiera realizar
 * N se calcula tal que es la suma de N+M y M va aumentando de a 1
 * @param int $num
 * @return float $res
 */
function calcularSumatoria ($num) {
    // int $n, $j
    // Inicializo a $n en 2 como dicta la formula  
    $n = 2;

    // Calculo la sumatoria
    for ($j = 1; $j <= $num; $j++){
        $res = $res + ($n / $j);
        $n = $n + $j;
    }

    return $res;
}

/**
 * Programa principal
 *  Lee un numero N para luego invocar a la funcion que calcula la sumatoria
 * int $numero
 * float $resultado
 */

 // Ingreso y lectura de valores
 echo "Ingrese un numero: ";
 $numero = (int)trim(fgets(STDIN));

 // Invoco a la funcion para calcular la sumatoria y almaceno su resultado
$resultado = calcularSumatoria($numero);

// Muestro por pantalla el resultado
echo "El resultado de la sumatoria para ".$numero." es: ".$resultado;
?>