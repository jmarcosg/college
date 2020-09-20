<?php
/**
 * Calcula la edad de una persona, a traves de el año actual y de nacimiento indicados por parametro
 * @param int $anioAct
 * @param int $anioNac
 */
function calcularEdad ($anioAct, $anioNac) {
    // int edadAprox
    $edadAprox = $anioAct - $anioNac;
    return $edadAprox;
}

// int $anioActual, $anioNacimiento, edadAproximada
echo "Ingrese el año actual: ";
$anioActual = trim(fgets(STDIN));
echo "Ingrese el año de nacimiento: ";
$anioNacimiento = trim(fgets(STDIN));

// Devolucion de edad
echo "La edad aproximada es: ".calcularEdad($anioActual, $anioNacimiento);
?>