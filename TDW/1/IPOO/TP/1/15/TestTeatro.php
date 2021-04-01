<?php
include 'Teatro.php';

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
    echo "1) Ingresar datos teatro. \n";
    echo "2) Mostrar funciones. \n";
    echo "3) Mostrar datos teatro. \n";
    echo "4) Modificar datos teatro. \n";
    echo "5) Modificar datos de una funcion. \n";
    echo "--------------------------------------------------------------\n";

    // Ingreso y lectura de la opcion
    echo "Ingrese una opcion: ";
    $opcion = (int) trim(fgets(STDIN));

    return $opcion;
}

/**
 * PROGRAMA PRINCIPAL
 * int $opcion, $i, $numeroFuncion
 * float $precioFuncion
 * array $funcionesTeatro
 * string $direccionTeatro, $nombreFuncion, $nombreTeatro
 */

// Inicializacion de variables
$funcionesTeatro = [];

do {
    $opcion = menu();

    switch ($opcion) {
        case 0:
            echo "Fin del programa! \n";
            break;
        case 1: //Ingresar datos teatro
            // Ingreso y lectura de valores
            echo "Ingrese el nombre del teatro: ";
            $nombreTeatro = trim(fgets(STDIN));
            echo "Ingrese la direccion del teatro: ";
            $direccionTeatro = trim(fgets(STDIN));

            // Armo un array con una cantidad 4 de funciones con su nombre y precio correspondiente
            for ($i = 0; $i < 4; $i++) {
                echo "Ingrese el nombre de la funcion: ";
                $funcionesTeatro[$i]["nombre"] = trim(fgets(STDIN));
                echo "Ingrese el precio de la funcion: ";
                $funcionesTeatro[$i]["precio"] = trim(fgets(STDIN));
            }

            $teatro = new Teatro($nombreTeatro, $direccionTeatro, $funcionesTeatro);
            break;
        case 2: // Listar funciones del teatro
            print_r($teatro->getFunciones());
            break;
        case 3: // Mostrar datos del teatro (nombre y direccion)
            echo $teatro . "\n";
            break;
        case 4: // Modificar datos del teatro (nombre y direccion)
            echo "Ingrese el nuevo nombre del teatro: ";
            $nombreTeatro = trim(fgets(STDIN));
            echo "Ingrese la nueva direccion del teatro: ";
            $direccionTeatro = trim(fgets(STDIN));

            $teatro->setNombreTeatro($nombreTeatro);
            $teatro->setDireccionTeatro($direccionTeatro);
            break;
        case 5: // Modificar datos de una funcion (nombre y precio)
            echo "Ingrese el nombre de la funcion a modificar: ";
            $nombreFuncion = trim(fgets(STDIN));
            $numeroFuncion = $teatro->buscarFuncion($nombreFuncion);

            // Si el numero de la funcion buscada esta dentro del margen, se prodece a modificar los valores. De lo contrario, error
            if ($numeroFuncion >= 0 && $numeroFuncion <= 3) {
                echo "Ingrese el nuevo nombre de la funcion: ";
                $nombreFuncion = trim(fgets(STDIN));
                echo "Ingrese el precio de la funcion: ";
                $precioFuncion = trim(fgets(STDIN));
                $teatro->modificarFuncion($numeroFuncion, $nombreFuncion, $precioFuncion);
            } else {
                echo "No se ha encontrado una funcion con ese nombre, verifique por favor. \n";
            }
            break;
        default:
            echo "Opcion incorrecta, verifique por favor! \n";
            break;
    }
} while ($opcion != 0);
