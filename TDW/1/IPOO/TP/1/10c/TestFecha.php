<?php
include 'Fecha.php';

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
    echo "1) Mostrar fecha. \n";
    echo "2) Mostrar fecha extendida. \n";
    echo "3) Incrementar fecha. \n";
    echo "0) Salir del programa. \n";
    echo "--------------------------------------------------------------\n";

    // Ingreso y lectura de la opcion
    echo "Ingrese una opcion: ";
    $opcion = (int) trim(fgets(STDIN));

    return $opcion;
}

/**
 * PROGRAMA PRINCIPAL
 * int $dia, $mes, $anio, $opcion, $cantDias
 * boolean $fechaExtendida
 */

// Inicializacion de valores
$fechaExtendida = false;

// Ingreso y lectura de valores
echo "Inicio de ingreso de fecha \n";
echo "Ingrese el dia: ";
$dia = (int) trim(fgets(STDIN));
echo "Ingrese el mes: ";
$mes = (int) trim(fgets(STDIN));
echo "Ingrese el año: ";
$anio = (int) trim(fgets(STDIN));

$fecha = new Fecha($dia, $mes, $anio);

do {
    $opcion = menu();

    switch ($opcion) {
        case 0:
            echo "Fin del programa! \n";
            break;
        case 1:
            echo $fecha . "\n";
            break;
        case 2:
            echo $fecha->mostrarFechaExtendida();
            break;
        case 3:
            echo "Ingrese la cantidad de dias a incrementar: ";
            $cantDias = (int) trim(fgets(STDIN));
            $fecha->incrementarDia($cantDias);
            echo $fecha . "\n";
            break;
        default:
            echo "Verifique su seleccion. \n";
            break;
    }
} while ($opcion != 0);
