<?php
include 'Teatro.php';
include 'Funciones.php';

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
    echo "1) Ingresar datos funciones. \n";
    echo "2) Mostrar datos teatro. \n";
    echo "3) Modificar nombre del teatro. \n";
    echo "4) Modificar direccion del teatro. \n";
    echo "5) Modificar datos de una funcion. \n";
    echo "--------------------------------------------------------------\n";

    // Ingreso y lectura de la opcion
    echo "Ingrese una opcion: ";
    $opcion = (int) trim(fgets(STDIN));

    return $opcion;
}

/**
 * Realiza la carga de datos en el objeto Funciones
 * @param obj $teatro
 */
function cargarDatosFunciones($teatro)
{
    /**
     * Declaracion de variables
     * obj $funcion
     * array $funcionesTeatro
     * string $nombreFuncion, $horarioInicioFuncion
     * int $duracionFuncion, $cantidadFunciones
     * float $precioFuncion
     * boolean $funcionYaExistente. $funcionSolapada
     */

    // Ingreso y lectura de valores

    while ($agregarNuevaFuncion != "s") {
        do {
            echo "Ingrese el nombre de la funcion: ";
            $nombreFuncion = trim(fgets(STDIN));

            // Verifico si la funcion ingresada ya existe en alguna posicion de la coleccion
            $funcionYaExistente = $teatro->buscarFuncion($nombreFuncion);

            if ($funcionYaExistente > -1) {
                echo "Se esta agregando una nueva funcion!\n";
            } else {
                echo "La funcion: '" . $nombreFuncion . "' ya existe!\n";
            }
        } while ($funcionYaExistente != -1);

        echo "Ingrese el horario de inicio de la funcion (hh:mm): ";
        $horarioInicioFuncion = (int) trim(fgets(STDIN));
        echo "Ingrese la duracion de la funcion (en minutos): ";
        $duracionFuncion = trim(fgets(STDIN));
        echo "Ingrese el precio de la funcion: ";
        $precioFuncion = trim(fgets(STDIN));

        $funcion = new Funcion($nombreFuncion, $horarioInicioFuncion, $duracionFuncion, $precioFuncion);

        // Verifico si la funcion se solapa con otra en ese mismo horario
        $funcionSolapada = $teatro->verificarSolapamiento($funcion);

        while ($funcionSolapada) {
            echo "Ingrese un nuevo horario de inicio de la funcion (hh:mm): ";
            $horarioInicioFuncion = trim(fgets(STDIN));
            $funcion->setHorario($horarioInicioFuncion);

            // Verifico de nuevo si se vuelve a solapar la funcion
            $funcionSolapada = $teatro->verificarSolapamiento($funcion);
        }

        // Agrego en la ultima posicion del arreglo de funciones la funcion ingresada
        $funcionesTeatro = $teatro->getFuncionesTeatro();
        $cantidadFunciones = count($funcionesTeatro);
        $funcionesTeatro[$cantidadFunciones] = $funcion;
        $teatro->setFunciones($funcionesTeatro);

        echo "Desea ingresar otra funcion? (s/n): ";
        $agregarNuevaFuncion = trim(fgets(STDIN));
    }

}

/**
 * Modifica los datos de una funcion
 * @param obj $teatro
 */
function modificarDatosFuncion($teatro)
{
    /**
     * Declaracion de variables
     * array $coleccionFuncionesTeatro
     * string $funcionBuscada, $nuevoNombreFuncion, $nuevoHorarioFuncion
     * int $numeroFuncion, $nuevaDuracionFuncion
     * float $nuevoPrecioFuncion
     */

    echo "Ingrese el nombre de la funcion a modificar: ";
    $funcionBuscada = trim(fgets(STDIN));
    $numeroFuncion = $teatro->buscarFuncion($funcionBuscada);

    if ($numeroFuncion >= 0) {
        $coleccionFuncionesTeatro = $teatro->getFuncionesTeatro();

        // Ingreso y lectura de valores
        echo "Ingrese el nuevo nombre de la funcion: ";
        $nuevoNombreFuncion = trim(fgets(STDIN));
        echo "Ingrese el nuevo horario (hh:mm): ";
        $nuevoHorarioFuncion = trim(fgets(STDIN));
        echo "Ingrese la nueva duracion (en minutos): ";
        $nuevaDuracionFuncion = (int) trim(fgets(STDIN));
        echo "Ingrese el nuevo precio: ";
        $nuevoPrecioFuncion = trim(fgets(STDIN));

        // Reemplazo por los nuevos valores
        $coleccionFuncionesTeatro[$numeroFuncion]->setNombre($nuevoNombreFuncion);
        $coleccionFuncionesTeatro[$numeroFuncion]->setHorario($nuevoHorarioFuncion);
        $coleccionFuncionesTeatro[$numeroFuncion]->setDuracion($nuevaDuracionFuncion);
        $coleccionFuncionesTeatro[$numeroFuncion]->setPrecio($nuevoPrecioFuncion);

        // Mando los nuevos valores al objeto
        $teatro->setFunciones($coleccionFuncionesTeatro);
    }
}

/**
 * Realiza la carga de datos en el objeto Teatro
 * @return obj $teatro
 */
function cargarDatosTeatro()
{
    /**
     * Declaracion de variables
     * string $nombreTeatro, $direccionTeatro
     */
    echo "Ingrese el nombre del teatro: ";
    $nombreTeatro = trim(fgets(STDIN));
    echo "Ingrese la direccion del teatro: ";
    $direccionTeatro = trim(fgets(STDIN));

    $teatro = new Teatro($nombreTeatro, $direccionTeatro);

    return $teatro;
}

/**
 * Cambia el nombre del teatro
 * @param obj $teatro
 */
function modificarNombreTeatro($teatro)
{
    /**
     * Declaracion de variables
     * string $nuevoNombreTeatro
     */

    // Ingreso y lectura de valores
    echo "Ingrese el nuevo nombre del teatro: ";
    $nuevoNombreTeatro = trim(fgets(STDIN));

    // Reemplazo el nombre anterior por el nuevo
    $teatro->setNombre($nuevoNombreTeatro);
}

/**
 * Cambia la direccion del teatro
 * @param obj $teatro
 */
function modificarDireccionTeatro($teatro)
{
    /**
     * Declaracion de variables
     * string $nuevaDireccionTeatro
     */

    // Ingreso y lectura de valores
    echo "Ingrese la nueva direccion del teatro: ";
    $nuevaDireccionTeatro = trim(fgets(STDIN));

    // Reemplazo el nombre anterior por el nuevo
    $teatro->setDireccion($nuevaDireccionTeatro);
}

/**
 * PROGRAMA PRINCIPAL
 * obj $datosTeatro
 * int $opcion, $cantidadFunciones
 */

// Cargo valores al objeto teatro
$datosTeatro = cargarDatosTeatro();

do {
    $opcion = menu();
    // Busco la cantidad de funciones que hay en la coleccion
    $cantidadFunciones = count($teatro->getFuncionesTeatro());

    switch ($opcion) {
        case 0:
            echo "Fin del programa! \n";
            break;
        case 1: // Ingresar datos funciones
            cargarDatosFunciones($teatro);
            break;
        case 2: // Mostrar funciones
            if ($cantidadFunciones > 0) {
                echo $teatro;
            } else {
                echo "No se han ingresado funciones... Todavia...\n";
            }
            break;
        case 3: // Modificar nombre del teatro
            modificarNombreTeatro($datosTeatro);
            break;
        case 4: // Modificar direccion del teatro
            modificarDireccionTeatro($datosTeatro);
            break;
        case 5: // Modificar datos de una funcion del teatro
            modificarDatosFuncion($datosTeatro);
            break;
        default:
            echo "Opcion incorrecta, verifique por favor! \n";
            break;
    }
} while ($opcion != 0);
