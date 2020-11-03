<?php
/**
 * Esta funcion calcula la productividad para los meses: Enero, Febrero y Marzo
 * @param int $articulosProd
 * @return int $resultado
 */
function productividadEFM ($articulosProd) {
    // int $factor
    $factor = 15;

    // Calculo la productividad del mes
    $resultado = $articulosProd * $factor;

    return $resultado;
}

/**
 * Esta funcion calcula la productividad para los meses: Abril, Mayor y Junio
 * @param int $articulosProd
 * @return int $resultado
 */
function productividadAMJ ($articulosProd) {
    // int $factor
    $factor = 17;

    // Calculo la productividad del mes
    $resultado = $articulosProd * $factor;

    return $resultado;
}

/**
 * Esta funcion calcula la productividad para los meses: Julio y Agosto
 * @param int $articulosProd
 * @return int $resultado
 */
function productividadJA ($articulosProd) {
    // int $factor
    $factor = 19;

    // Calculo la productividad del mes
    $resultado = $articulosProd * $factor;

    return $resultado;
}

/**
 * Esta funcion calcula la productividad para los meses: Septiembre, Octubre y Noviembre
 * @param int $articulosProd
 * @return int $resultado
 */
function productividadSON ($articulosProd) {
    // int $factor
    $factor = 20;

    // Calculo la productividad del mes
    $resultado = $articulosProd * $factor;

    return $resultado;
}

/**
 * Esta funcion calcula la productividad para el mes de Diciembre
 * @param int $articulosProd
 * @return int $resultado
 */
function productividadD ($articulosProd) {
    // int $factor
    $factor = 21;

    // Calculo la productividad del mes
    $resultado = $articulosProd * $factor;

    return $resultado;
}

// Este programa muestra el control de productividad de una empresa
// int $articulosProducidos, $productividad
// string $mes
echo "Ingrese el mes a consultar: ";
$mes = trim(fgets(STDIN));
echo "Ingrese la cantidad de articulos producidos en el mes: ";
$articulosProducidos = (int)trim(fgets(STDIN));

// Condiciones para utlizar la funcion correspondiente segun el mes ingresado
if ($mes == "enero" || $mes == "febrero" || $mes == "marzo") {
    $productividad = productividadEFM($articulosProducidos);
    echo "La productividad para el mes de ".$mes." fue: ".$productividad;
} elseif ($mes == "abril" || $mes == "mayo" || $mes == "junio") {
    $productividad = productividadAMJ($articulosProducidos);
    echo "La productividad para el mes de ".$mes." fue: ".$productividad;
} elseif ($mes == "julio" || $mes == "agosto") {
    $productividad = productividadJA($articulosProducidos);
    echo "La productividad para el mes de".$mes. "fue: ".$productividad;
} elseif ($mes == "septiembre" || $mes == "octubre" || $mes == "noviembre") {
    $productividad = productividadSON($articulosProducidos);
    echo "La productividad para el mes de".$mes."fue: ".$productividad;
} elseif ($mes == "diciembre") {
    $productividad = productividadD($articulosProducidos);
    echo "La productividad para el mes de ".$mes."fue: ".$productividad;
} else {
    echo "Mes invalido. Por favor, verifique de ingresar un mes valido y en minusculas.";
}

?>