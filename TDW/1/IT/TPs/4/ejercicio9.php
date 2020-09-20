<?php
/**
 * Esta funcion calcula el diametro de la circunferencia
 * @param number $radio
 * @return number $diametro
 */
function calcularDiametro (float $radio) {
    $diametro = $radio * 2;
    return $diametro;
}

/**
 * Esta funcion calcula la superficie de la circunferencia
 * @param number $radio
 * @return number $superficie
 */
function calcularSuperficieCircunferencia (float $radio) {
    $superficie = M_PI * ($radio * $radio);
    return $superficie;
}

// Este programa lee la base y altura de un cilindro, luego a traves de funciones realiza distintos tipos de calculos
// float $radio, $altura, $diametro, $superficieCircunferencia
echo "Ingrese el radio del cilindro: ";
$radio = trim(fgets(STDIN));
echo "Ingrese la altura del cilindro: ";
$altura = trim(fgets(STDIN));

// Calculo el diametro de la circunferencia usando su funcion 
$diametro = calcularDiametro($radio);

// Calculo la superficie de la circunferencia usando su funcion
$superficieCircunferencia = calcularSuperficieCircunferencia ($radio);


?>