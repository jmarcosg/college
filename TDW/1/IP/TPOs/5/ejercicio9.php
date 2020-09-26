<?php
/**
 * Esta funcion calcula el IMC de la persona recibida por parametro
 * El IMC se calcula como masa sobre estatura al cuadrado
 * @param float $est
 * @param float $masa
 * @return float $resultado
 */
function calcularIMC ($est, $masa) {
    $resultado = $masa / ($est * $est);
    return $resultado;
}

/**
 * Esta funcion clasifica al IMC de la persona segun la OMS
 * @param float $imc
 */
function clasificarIMC ($imc) {
    if ($imc < 18.5) {
        echo "Clasificación: Bajo Peso";
    } elseif ($imc >= 18.5 && $imc < 25) {
        echo "Clasificación: Normal";
    } elseif ($imc >= 25 && $imc < 30) {
        echo "Clasificación: Sobrepeso";
    } elseif ($imc >= 30 && $imc < 35) {
        echo "Clasificación: Obesidad leve";
    } elseif ($imc >= 35 && $imc <40) {
        echo "Clasificación: Obesidad media";
    } else {
        echo "Clasificación: Obesidad mórbida";
    }
}

// Este programa lee los kg y estatura de una persona y muestra su IMC
// float $estatura, $kg, $imc

// Ingreso y lectura de valores
echo "Ingrese la estatura de la persona en metros: ";
$estatura = trim(fgets(STDIN));
echo "Ingrese el peso de la persona: ";
$kg = trim(fgets(STDIN));

// Invoco la funcion para calcular el IMC de la persona ingresada
$imc = calcularIMC($estatura, $kg);

// Dependiendo del resultado del IMC va a ser la clasificacion de la persona
clasificarIMC($imc);
?>