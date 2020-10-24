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
 * Esta funcion calcula la sumatoria de todos los numeros impares entre A y B
 * @param int $numA
 * @param int $numB
 * @param boolean $aPar 
 * @return int $total
 */
function calcularSumatoriaImpares ($numA, $numB, $aPar){
    // int $i
    $total = 0;

    // Si $numA es par la repetitiva for tiene que arrancar en i+1 para asi poder arrancar desde los impares
    if ($aPar) {
        $i = $numA + 1;
    } else {
        $i = $numA;
    }

    for ($i; $i <= $numB; $i = $i++){
        if ($i % 2 == 1) {
            $total = $total + $i;
        }
    }
}

/**
 * Programa principal
 * Lee dos numeros A y B, luego muestra por pantalla la suma de los numeros impares naturales entre ellos
 * int $numeroA, $numeroB, $i, $totalSumatoria
 * boolean $aEsPar
 */
// Ingreso y lectura de valores
echo "Ingrese el primer numero: ";
$numeroA = (int)trim(fgets(STDIN));
echo "Ingrese el segundo numero: ";
$numeroB = (int)trim(fgets(STDIN));

// Invoco a la funcion para vericar si $numeroA es par para asi saber de donde arrancar $i
$aEsPar = verificarParImpar($numeroA);

// Invoco a la funcion para calcular la sumatoria de los numeros impares y almaceno su valor
$totalSumatoria = calcularSumatoriaImpares($numeroA, $numeroB, $aEsPar);

// Muestro por pantalla el resultado
echo "La sumatoria de los numeros impares entre ".$numeroA." y ".$numeroB." es: ".$totalSumatoria;
?>