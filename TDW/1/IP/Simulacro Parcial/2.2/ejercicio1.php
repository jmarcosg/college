<?php
/**
 * Programa principal
 * Este programa lee una serie de valores de candidatos a un club y luego muestra por pantalla distintos resultados
 * int $edad, $puntaje, $edadMayor, $puntajeMayor, $cantidadCandidatos, $cantidadAprobadosCatA, $cantidadAprobadosCatB, $cantidadAprobadosCatC, $sumatoriaEdades
 * float $promedioEdadCandidatos
 * String $nombre, $nombreMayor, $continuar
 */

// Inicializo variables
$cantidadCandidatos = 0;
$cantidadAprobadosCatA = 0;
$cantidadAprobadosCatB = 0;
$cantidadAprobadosCatC = 0;
$edadMayor = 0;
$puntajeMayor = 0;
$promedioEdadCandidatos = 0;
$sumatoriaEdades = 0;
$nombreMayor = "-";

echo "Bievenido al Club MENSA. \n";

do {
    // Ingreso y lectura de valores
    echo "Ingrese el nombre del candidato: ";
    $nombre = trim(fgets(STDIN));
    echo "Ingrese la edad: ";
    $edad = (int) trim(fgets(STDIN));
    echo "Ingrese el puntaje: ";
    $puntaje = (int) trim(fgets(STDIN));

    // Verfico la distintas condiciones y armo las categorias dependiendo del puntaje del candidato
    if ($puntaje >= 74) {
        if ($puntaje >= 91 && $puntaje <= 100) {
            $cantidadAprobadosCatA++;
        } else if ($puntaje >= 81 && $puntaje <= 90) {
            $cantidadAprobadosCatB++;
        } else if ($puntaje >= 74 && $puntaje <= 80) {
            $cantidadAprobadosCatC;
        }
    }

    // Si $puntaje es mayor a $puntaje entonces ese candidato va a ser el mejor
    if ($puntaje > $puntajeMayor) {
        $nombreMayor = $nombre;
        $edadMayor = $edad;
        $puntajeMayor = $puntaje;
    }

    // Le sumo $edad a $sumatoriaEdades y tambien aumento en 1 la cantidad de candidatos ingresados
    $sumatoriaEdades += $edad;
    $cantidadCandidatos++;

    echo "Desea ingresar otro candidato? (si/no): ";
    $continuar = trim(fgets(STDIN));
} while ($continuar != "no");

// Calculo el promedio de edad de los candidatos ingresados
$promedioEdadCandidatos = $sumatoriaEdades / $cantidadCandidatos;

// Devuelvo los resultados por pantalla
echo "El promedio de edad de los candidatos es: " . $promedioEdadCandidatos . " años. \n";
echo "El mejor candidato fue " . $nombreMayor . " de " . $edadMayor . " años con " . $puntajeMayor . " puntos. \n";
echo "Cantidad de candidatos de categoría A: " . $cantidadAprobadosCatA . "\n";
echo "Cantidad de candidatos de categoría B: " . $cantidadAprobadosCatB . "\n";
echo "Cantidad de candidatos de categoría C: " . $cantidadAprobadosCatC . "\n";
