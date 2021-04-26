<?php
/**
 * Calcula el cuadrado de un numero indicado por parametro
 * @param int num
 */
function calcularCuadrado ($num) {
    // int $resultado
    $resultado = $num * $num;
    return $resultado;
}

// int numero
// Se ingresa un numero para luego calcular el cuadrado del mismo
echo "Ingrese un numero: ";
$numero = trim(fgets(STDIN));

// Devolucion del resultado
echo "El cuadrado de ".$numero." es: ".calcularCuadrado($numero);
?>