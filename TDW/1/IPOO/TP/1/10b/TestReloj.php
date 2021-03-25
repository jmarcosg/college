<?php
include 'Reloj.php';

/**
 * Esta funcion muestra por pantalla el menu de usuario y obtiene una opcion de menú
 * @return int $opcion
 */
function menu()
{
    /**
     * Declaracion de variables
     * int $opcion
     */

    /**
     * Menu que se muestra al usuario
     * Se controla la opcion ingresada desde el programa principal en el switch correspondiete
     */
    echo "--------------------------------------------------------------\n";
    echo "1) Incrementar. \n";
    echo "2) Poner a cero. \n";
    echo "0) Apagar cronometro. \n";
    echo "--------------------------------------------------------------\n";

    // Ingreso y lectura de la opcion
    echo "Ingrese una opcion: ";
    $opcion = (int) trim(fgets(STDIN));

    return $opcion;
}

/**
 * PROGRAMA PRINCIPAL
 * int $horas, $minutos, $segundos, $opcion
 */

// Inicializacion de variables
$horas = 23;
$minutos = 59;
$segundos = 56;

$cronometro = new Reloj($horas, $minutos, $segundos);
echo $cronometro . "\n";

do {
    $opcion = menu();

    switch ($opcion) {
        case 0:
            echo "Cronomentro apagado! \n";
            break;
        case 1:
            $cronometro->incremento();
            echo $cronometro . "\n";
            break;
        case 2:
            $cronometro->puestaACero();
            echo $cronometro . "\n";
            break;
    }
} while ($opcion != 0);
