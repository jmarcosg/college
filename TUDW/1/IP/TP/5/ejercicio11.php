<?php
/**
 * Esta funcion calcula el valor del discriminante en una ecuacion cuadratica
 * El valor se calcula tal que b al cuadrado - 4ac
 * @param float $a
 * @param float $b 
 * @param float $c 
 * @return float $resultado 
 */
function calcularDiscriminante($a, $b, $c) {
    $resultado = ($b * $b) - (4 * $a * $c);
    return $resultado;
}

/**
 * Esta funcion calcula las raices de una ecuacion cuadratica
 * Para calcular las raices se lo hace tal que
 * x1 = [-b + raizCuadrada(discriminante)] / 2a
 * x2 = [-b - raizCuadrada(discriminante)] / 2a
 * @param float $a 
 * @param float $b 
 * @param float $c 
 * @param float $disc
 */
function calcularBascara ($a, $b, $c, $disc) {
    // float $x1, $x2
    $x1 = (-1 * $b) + (sqrt($disc));
    $x2 = (-1 * $b) - (sqrt($disc));

    // Devuelvo los valores
    echo "x1: ".$x1."\n";
    echo "x2: ".$x2."\n";
}

// Este programa lee tres valores de una ecuacion de grado 2 y muestra las raices de la misma
// float $coeficienteA, $coeficienteB, $coeficienteC, $discriminante

// Ingreso y lectura de valores
echo "Ingrese el valor de a: ";
$coeficienteA = trim(fgets(STDIN));
echo "Ingrese el valor de b: ";
$coeficienteB = trim(fgets(STDIN));
echo "Ingrese el valor de c: ";
$coeficienteC = trim(fgets(STDIN));

// Invoco a la funcion para calcular el valor del discriminante
$discriminante = calcularDiscriminante($coeficienteA, $coeficienteB, $coeficienteC);

// Si el discriminante es mayor o igual a 0 se puede realizar Bascara
if ($discriminante >= 0) {
    calcularBascara ($coeficienteA, $coeficienteB, $coeficienteC, $discriminante);
} else {
    echo "Como el discriminante en menor a 0, no se puede realizar Bascara";
}
?>