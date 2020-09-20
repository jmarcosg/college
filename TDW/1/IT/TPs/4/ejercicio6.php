<?php
/**
 * Esta funcion calcula la superficie circular
 * @param number $radioMenor
 * @return number $resultado
 */
function calcularSuperficieCircular (float $radioMenor) {
    $resultado = M_PI * ($radioMenor * $radioMenor);
    return $resultado;
}

/**
 * Esta funcion calcula la superficie de la corona circular
 * @param number $radioMenor
 * @param number $radioMenor
 * @return number $resultado
 */
function calcularSuperficieCoronaCircular (float $radioMenor, float $radioMayor) {
    $resultado = M_PI * (($radioMayor * $radioMayor) - ($radioMenor * $radioMenor));
    return $resultado;
}

/** 
 * Este programa lee los valores del radio menor y mayor respectivamente 
 * Luego son enviados a sus funciones respectivas para calcular las superficies
 */ 
// float $radioMenor, $radioMayor, $resultadoSupMenor, $resultadoSupMayor
// Ingreso y lectura de valores
echo "Ingrese el radio menor: ";
$radioMenor = trim(fgets(STDIN));
echo "Ingrese el radio mayor: ";
$radioMayor = trim (fgets(STDIN));

// Invocacion de funciones y asignacion de resultados
$resultadoSupMenor = calcularSuperficieCircular($radioMenor);
$resultadoSupMayor = calcularSuperficieCoronaCircular($radioMenor, $radioMayor);

// Devolucion de valores
echo "La superficie circular es: ".$resultadoSupMenor."\n";
echo "La superficie de la corona circular es: ".$resultadoSupMayor."\n";

?>