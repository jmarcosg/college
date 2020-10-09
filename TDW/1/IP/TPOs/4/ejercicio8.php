<?php
/**
 * Esta funcion calcula la proporcion de agua destilada en loratadina y betametasona
 * La proporcion es 10% en loratadina + 15%en betametasona
 * @param float $loratadina;
 * @param float $betametasona;
 * @return float $aguaDestilada;
 */
function calcAguaDestilada(float $loratadina, float $betametasona) {
    $aguaDestilada = ($loratadina * 0.1 + $betametasona * 0.15);
    return $aguaDestilada;
}

// Este programa lee los valores de dos farmacos para luego elaborar la proporcion de agua destilada en el antialergico
// float $cantLoratadina, $cantBetametasona, $cantAguaDestilada

// Ingreso y lectura de valores
echo "Ingrese la cantidad de loratadina: ";
$cantLoratadina = trim(fgets(STDIN));
echo "Ingrese la cantidad de betametasona: ";
$cantBetametasona = trim(fgets(STDIN));

// Invoco a la funcion para calcular la proporcion de agua destilada en las cantidades leidas
$cantAguaDestilada = calcAguaDestilada($cantLoratadina, $cantBetametasona);

// Devuelvo e imprimo en pantalla cantidad necesaria
echo "La cantidad de agua destilada necesaria es: ".$cantAguaDestilada;
?>