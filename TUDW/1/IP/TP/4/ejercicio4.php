<?php
/**
* Calcula la altura de un  triangulo equilatero
* @param number $lado
* @return number $resultado
*/
function calcularAlturaTriangulo(float $lado) {
    // float a, b, c
    $a = $lado * $lado;
    $b = ($lado / 2) * ($lado / 2);
    $c = $a - $b;
    $resultado = sqrt($c);
    return $resultado;
}

/**
* Calcula el perimetro de un triangulo equilatero
* @param number $lado
* @return number $resultado
*/
function calcularPerimetro (float $lado) {
    $resultado = $lado + $lado + $lado;
    return $resultado;
}

/**
* Calcula el area de un triangulo equilatero
* @param number $base
* @param number $altura
* @return number $resultado
*/
function calcularArea (float $base, float $altura) {
    $resultado = ($base * $altura) / 2;
    return $resultado;
}

// Este programa lee el valor de un lado de un triangulo equilatero, utiliza funciones para calcular el area y perimetro, y las imprime por pantalla 
// float $lado, $altura, $resultadoPerimetro, $resultadoArea
echo "Ingrese el valor de un lado del triangulo equilatero: ";
$lado = trim(fgets(STDIN));

// Calculo la altura del triangulo equilatero a traves de su funcion
$altura = calcularAlturaTriangulo($lado);

// Invoco las funciones y son asignadas a su variable correspondiente
$resultadoPerimetro = calcularPerimetro($lado);
$resultadoArea = calcularArea($lado, $altura);

// Imprimo los resultados por pantalla
echo "El perimetro de este triangulo equilatero es: ".$resultadoPerimetro."\n";
echo "El area de este triangulo equilatero es: ".$resultadoArea."\n";
?>