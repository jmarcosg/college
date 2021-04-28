<?php
/**
 * Esta funcion calcula el costo del alquiler cuando se recorren entre 300 Km y 1000 Km
 * El costo para esta situacion es igual a 850 + 10.5 por cada Km mayor a 300 
 * @param float $km
 * @return float $costoTotal
 */
function menor1000 ($km) {
    // int $costoBase
    // float $excesoKm
    $costoBase = 850;

    // Calculo el exceso de km mayores a 300
    $excesoKm = $km - 300;

    // Calculo el costo total a pagar
    $costoTotal = $costoBase + (10.5 * $excesoKm);
    return $costoTotal;
}

/**
 * Esta funcion calcula el costo del alquiler cuando se recorren mas de 1000 Km.
 * El costo para esta situacion es igual a 850 + 10.5 por cada Km mayor a 300 y menor a 1000 + 8.5 por cada Km mayor a 1000
 * @param float $km
 * @return float $costoTotal
 */
function mayor1000 ($km) {
    // int $costoBase
    // float $excesoKm1, $excesoKm2, $costo1, $costo2
    $costoBase = 850;

    // Calculo el exceso de Km entre 300 y 1000
    $excesoKm1 = $km - 1300;
    $costo1 = $costoBase + (10.5 * $excesoKm1);

    // Condicion segun la cantidad de Km de exceso del resultado de $excesoKm
    if ($excesoKm1 > 1000) {
        $excesoKm2 = $excesoKm1 - 1000;
        // Calculo el costo para el exceso de Km mayor a 1000
        $costo2 = 8.5 * $excesoKm2;
    }

    // Calculo el costo total a pagar
    $costoTotal = $costo1 + $costo2;
    return $costoTotal;
}

// Este programa lee  la cantidad de km recorridos por un automovil y luego muestra el costo del alquiler
// float $kmRecorridos, $costo

// Ingreso y lectura de Km
echo "Ingrese la cantidad de Km recorridos: ";
$kmRecorridos = trim(fgets(STDIN));

// Condiciones donde dependiendo de los km recorridos va a mostrar cierto costo
if ($kmRecorridos > 0 && $kmRecorridos <= 300 ) {
    echo "Debe pagar $850";
} elseif ($kmRecorridos > 300 && $kmRecorridos <= 1000) {
    $costo = menor1000($kmRecorridos);
    echo "Debe pagar $".$costo;
} elseif ($kmRecorridos > 1000) {
    $costo = mayor1000($kmRecorridos);
    echo "Debe pagar $".$costo;
} else {
    echo "Cantidad de Km erronea.";
}
?>