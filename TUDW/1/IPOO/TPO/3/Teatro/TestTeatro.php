<?php
include_once 'Teatro.php';
include_once 'Funcion.php';
include_once 'Obra.php';
include_once 'Musical.php';
include_once 'Cine.php';
main();

function main()
{
    /**
     * Declaracion de variables
     * string $nombreTeatro, $direccionTeatro
     * int $opcion, $cantidadFunciones
     */

    echo "Ingrese el nombre del teatro: ";
    $nombreTeatro = trim(fgets(STDIN));
    echo "Ingrese la direccion del teatro: ";
    $direccionTeatro = trim(fgets(STDIN));

    $teatro = new Teatro($nombreTeatro, $direccionTeatro);

    do {
        $teatro->ordenarFuncionesCronologicamente();
        // Busco la cantidad de funciones que hay en la coleccion
        $cantidadFunciones = count($teatro->getColFuncionesTeatro());

        $opcion = menu();

        switch ($opcion) {
            case 0:
                echo "Fin del programa! \n";
                break;
            case 1: // Ingresar datos funciones
                cargarDatosFunciones($teatro);
                break;
            case 2: // Mostrar datos teatro
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
            case 6: // Mostrar costos
                mostarCostos($teatro);
                break;
            default:
                echo "Opcion incorrecta, verifique por favor! \n";
                break;
        }
    } while ($opcion != 0);
}

/**
 * Esta funcion muestra por pantalla el menu de usuario y ejecuta la opcion seleccionada
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
    echo "6) Mostrar costos. \n";
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
     * string $nombreFuncion, $horarioInicioFuncion, $nombreDirector, $generoPelicula, $paisOrigenPelicula
     * char $tipoFuncion
     * int $duracionFuncion, $cantidadFunciones, $cantidadPersonasEscena
     * float $precioFuncion
     * boolean $funcionYaExistente. $funcionSolapada
     */

    do {
        echo "(o = obra; m = musical; c = cine) \n";
        echo "Que tipo de función desea ingresar? (o/m/c): ";
        $tipoFuncion = trim(fgets(STDIN));
    } while ($tipoFuncion != 'o' && $tipoFuncion != 'm' && $tipoFuncion != 'c');

    do {
        echo "Ingrese el nombre de la funcion: ";
        $nombreFuncion = trim(fgets(STDIN));

        // Verifico si la funcion ingresada ya existe en alguna posicion de la coleccion
        $funcionYaExistente = $teatro->buscarFuncion($nombreFuncion);
    } while ($funcionYaExistente != -1);

    echo "Ingrese el horario de inicio de la funcion (hh:mm): ";
    $horarioInicioFuncion = trim(fgets(STDIN));
    echo "Ingrese la duracion de la funcion (en minutos): ";
    $duracionFuncion = (int) trim(fgets(STDIN));
    echo "Ingrese el precio de la funcion: ";
    $precioFuncion = trim(fgets(STDIN));

    switch ($tipoFuncion) {
        case 'o':
            $funcion = new Obra($nombreFuncion, $horarioInicioFuncion, $duracionFuncion, $precioFuncion);
            break;
        case 'm':
            echo "Ingrese el nombre del director: ";
            $nombreDirector = trim(fgets(STDIN));
            echo "Ingrese la cantidad de personas en escena: ";
            $cantidadPersonasEscena = (int) trim(fgets(STDIN));
            $funcion = new Musical($nombreFuncion, $horarioInicioFuncion, $duracionFuncion, $precioFuncion, $nombreDirector, $cantidadPersonasEscena);
            break;
        case 'c':
            echo "Ingrese el genero de la pelicula: ";
            $generoPelicula = trim(fgets(STDIN));
            echo "Ingrese el pais de origen de la misma: ";
            $paisOrigenPelicula = trim(fgets(STDIN));
            $funcion = new Cine($nombreFuncion, $horarioInicioFuncion, $duracionFuncion, $precioFuncion, $generoPelicula, $paisOrigenPelicula);
            break;
    }

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
    $funcionesTeatro = $teatro->getColFuncionesTeatro();
    $cantidadFunciones = count($funcionesTeatro);
    $funcionesTeatro[$cantidadFunciones] = $funcion;
    $teatro->setColFuncionesTeatro($funcionesTeatro);
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
        $coleccionFuncionesTeatro = $teatro->getColFuncionesTeatro();

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
        $teatro->setColFuncionesTeatro($coleccionFuncionesTeatro);
    }
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
 * Muestra el costo total sumado de todas las funciones que hay en el teatro
 */
function mostarCostos($teatro)
{
    $costoTotal = $teatro->darCosto();
    echo "Costo total del teatro: $" . $costoTotal . "\n";
}
