<?php
/**
* Calcula la base elevada al exponente de dos numeros recibidos por parametro
* @param number $base
* @param number $exponente
* @return number $resultado
*/
function calcularPotencia (int $base, int $exponente) {
    $resultado = pow($base, $exponente);
    return $resultado;
}

/**
* Calcula la raiz cuadrada de un número recibido por parametro
* @param number $numero
* @return number $resultado
*/
function calcularRaiz (int $numero) {
    $resultado = sqrt($numero);
    return $resultado;
}

/**
* Calcula el valor absoluto de un número recibido por parametro
* @param number $numero
* @return number $resultado
*/
function calcularValorAbsoluto (int $numero) {
    $resultado = abs($numero);
    return $resultado;
}

// Este programa lee dos numeros y realiza tres funciones matematicas a traves de sus modulos
// int $numeroM, $numeroN, $resultadoPotencia, $resultadoRaiz, $resultadoValorAbsoluto
echo "Ingrese el numero M: ";
$numeroM = trim(fgets(STDIN));
echo "Ingrese el numero N: ";
$numeroN = trim(fgets(STDIN));

// Invoco las funciones y son asignadas a su variable correspondiente
$resultadoPotencia = calcularPotencia($numeroM, $numeroN);
$resultadoRaiz = calcularRaiz($numeroM);
$resultadoValorAbsoluto = calcularValorAbsoluto($numeroM);

// Imprimo en pantalla los resultados
echo $numeroM." elevado a ".$numeroN." es: ".$resultadoPotencia."\n";
echo "La raiz cuadrada de ".$numeroM." es: ".$resultadoRaiz."\n";
echo "El valor absoluto de ".$numeroM." es: ".$resultadoValorAbsoluto."\n";
?>