<?php
include_once 'ORM/BaseDatos.php';
include_once 'ORM/Teatro.php';
include_once 'ORM/Funcion.php';
include_once 'ORM/Cine.php';
include_once 'ORM/Musical.php';
include_once 'ORM/ObraTeatral.php';
include_once 'transacciones/abmTeatro.php';
include_once 'transacciones/abmFuncion.php';
include_once 'transacciones/abmCine.php';
include_once 'transacciones/abmMusical.php';
include_once 'transacciones/abmObraTeatral.php';
main();

function main()
{
    /**
     * Declaracion de variables
     * int $opcion
     */

    do {
        $opcion = menu();

        switch ($opcion) {
            case 0:
                echo "Fin del programa!\n";
                break;
            case 1:
                crearTeatro();
                break;
            case 2:
                modificarNombreTeatro();
                break;
            case 3:
                modificarDireccionTeatro();
                break;
            case 4:
                modificarCiudadTeatro();
                break;
            case 5:
                crearFuncion();
                break;
            case 6:
                modificarNombreFuncion();
                break;
            case 7:
                modificarPrecioFuncion();
                break;
            case 8:
                obtenerCostoTeatro();
                break;
            case 9:
                mostrarDatosTeatro();
                break;
            case 10:
                mostrarDatosFunciones();
                break;
            case 11:
                borrarFuncion();
                break;
            case 12:
                borrarTeatro();
                break;
            default:
                echo "\e[1;37;41mOPCION INVALIDA\e[0m\n";
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
    echo "\e[1;37;47m|--------------------------------------|\e[0m\n";
    echo "OPCIONES\n";
    echo "1) Crear teatro\n";
    echo "2) Modificar nombre de un teatro\n";
    echo "3) Modificar direccion de un teatro\n";
    echo "4) Modificar ciudad de un teatro\n";
    echo "5) Agregar funcion\n";
    echo "6) Modificar nombre de una funcion\n";
    echo "7) Modificar precio de una funcion\n";
    echo "8) Obtener costo total del teatro\n";
    echo "9) Mostrar datos del teatro\n";
    echo "10) Mostrar datos de las funciones\n";
    echo "11) Borrar una funcion\n";
    echo "12) Borrar un teatro\n";
    echo "0) Finalizar programa\n";
    echo "\e[1;37;47m|--------------------------------------|\e[0m\n";

    // Ingreso y lectura de la opcion
    echo "Ingrese una opcion: ";
    $opcion = (int) trim(fgets(STDIN));

    return $opcion;
}

// METODOS UNICOS

/**
 * Retorna un teatro con el que se desea trabajar
 * @return object $objTeatro
 */
function seleccionarTeatro()
{
    $abmTeatro = new abmTeatro();

    echo $abmTeatro->listarTeatros();
    echo "Seleccione el ID de un teatro: ";
    $id = trim(fgets(STDIN));
    $objTeatro = $abmTeatro->traerTeatro($id);

    return $objTeatro;
}

/**
 * Retorna una funcion con el que se desea trabajar
 * @return object $objTeatro
 */
function seleccionarFuncion()
{
    $abmFuncion = new abmFuncion();

    echo $abmFuncion->listarFunciones();
    echo "Ingrese el ID de una funcion: ";
    $id = trim(fgets(STDIN));
    $objFuncion = $abmFuncion->traerFuncion($id);

    return $objFuncion;
}

/**
 * Convierte un horario hh:mm a un total de segundos
 * @param int $horas, $minutos
 * @return int $segundosTotales
 */
function pasarASegundos($horas, $minutos)
{
    $segundosTotales = ($horas * 3600) + ($minutos * 60);

    return $segundosTotales;
}

// METODOS TEATRO

/**
 * Opcion 1
 * Realiza la creacion y carga de datos del teatro
 */
function crearTeatro()
{
    $abmTeatro = new abmTeatro();

    // Ingreso y lectura de valores del teatro
    echo "Ingrese el nombre del teatro: ";
    $nombre = trim(fgets(STDIN));
    echo "Ingrese la direccion del teatro: ";
    $direccion = trim(fgets(STDIN));
    echo "Ingrese la ciudad del teatro: ";
    $ciudad = trim(fgets(STDIN));

    $teatroCargado = $abmTeatro->agregarTeatro($nombre, $direccion, $ciudad);

    if ($teatroCargado) {
        echo "\e[1;37;42mTeatro cargado correctamente\e[0m\n";
    } else {
        echo "\e[1;37;41mError al intentar cargar el teatro\e[0m\n";
    }
}

/**
 * Opcion 2
 * Modifica el nombre de un teatro
 */
function modificarNombreTeatro()
{
    $abmTeatro = new abmTeatro();
    $objTeatro = seleccionarTeatro();

    echo "Ingrese el nuevo nombre del teatro: ";
    $nuevoNombre = trim(fgets(STDIN));

    $nombreModificado = $abmTeatro->modificarNombre($objTeatro, $nuevoNombre);

    if ($nombreModificado) {
        echo "\e[1;37;42mEl nombre ha sido modificado correctamente\e[0m\n";
    } else {
        echo "\e[1;37;41mError al intentar modificar el nombre del teatro\e[0m\n";
    }
}

/**
 * Opcion 3
 * Modifica la direccion de un teatro
 */
function modificarDireccionTeatro()
{
    $abmTeatro = new abmTeatro();
    $objTeatro = seleccionarTeatro();

    echo "Ingrese la nueva direccion del teatro \n";
    $nuevaDireccion = trim(fgets(STDIN));

    $direccionModificada = $abmTeatro->modificarDireccion($objTeatro, $nuevaDireccion);

    if ($direccionModificada) {
        echo "\e[1;37;42mLa direccion ha sido modificado correctamente\e[0m\n";
    } else {
        echo "\e[1;37;41mError al intentar modificar la direccion del teatro\e[0m\n";
    }
}

/**
 * Opcion 4
 * Modifica la ciudad de un teatro
 */
function modificarCiudadTeatro()
{
    $abmTeatro = new abmTeatro();
    $objTeatro = seleccionarTeatro();

    echo "Ingrese la nueva ciudad del teatro \n";
    $nuevaCiudad = trim(fgets(STDIN));

    $ciudadModificada = $abmTeatro->modificarDireccion($objTeatro, $nuevaCiudad);

    if ($ciudadModificada) {
        echo "\e[1;37;42mLa ciudad ha sido modificado correctamente\e[0m\n";
    } else {
        echo "\e[1;37;41mError al intentar modificar la ciudad del teatro\e[0m\n";
    }
}

/**
 * Opcion 8
 * Muestra el costo total de un teatro para un mes seleccionado
 */
function obtenerCostoTeatro()
{
    $abmTeatro = new abmTeatro();
    $objTeatro = seleccionarTeatro();

    echo "Ingrese el numero del mes (1-12) del que quiera conocer el costo: ";
    $mes = trim(fgets(STDIN));
    $costoFinal = $abmTeatro->darCostoTeatro($objTeatro, $mes);

    echo "Teatro: " . $objTeatro->getNombre() . ". Costo del mes " . $mes . ": $" . round($costoFinal, 2) . "\n" . "\n";
}

/**
 * Opcion 9
 * Lista la informacion de todos los teatros
 */
function mostrarDatosTeatro()
{
    $abmTeatro = new abmTeatro();
    echo $abmTeatro->listarTeatros();
}

/**
 * Opcion 12
 * Elimina un teatro
 */
function borrarTeatro()
{
    $abmTeatro = new abmTeatro();
    $objTeatro = seleccionarTeatro();

    $teatroEliminado = $abmTeatro->eliminarTeatro($objTeatro);

    if ($teatroEliminado) {
        echo "\e[1;37;42mEl teatro ha sido eliminado correctamente\e[0m\n";
    } else {
        echo "\e[1;37;41mError al intentar eliminar el teatro\e[0m\n";
    }
}

// METODOS FUNCIONES

/**
 * OPCION 5
 * Realiza la creacion de funciones en la bd
 */
function crearFuncion()
{
    $objTeatro = seleccionarTeatro();

    $funcionCargada = cargarDatosFuncion($objTeatro);

    if ($funcionCargada) {
        echo "\e[1;37;42mLa funcion ha sido cargada correctamente\e[0m\n";
    } else {
        echo "\e[1;37;41mError al intentar cargar la funcion\e[0m\n";
    }
}

/**
 * Realiza la carga de datos de una funcion del metodo crearFuncion
 * @return boolean $funcionCargada
 */
function cargarDatosFuncion($objTeatro)
{
    $abmTeatro = new abmTeatro();

    echo "Ingrese el tipo de funcion a cargar (cine / musical / obra): ";
    $tipoFuncion = trim(fgets(STDIN));
    echo "Ingrese nombre de la funcion: ";
    $nombre = trim(fgets(STDIN));
    echo "Ingrese la fecha de la funcion (numeros)\n";
    echo "Dia: ";
    $dia = (int) trim(fgets(STDIN));
    echo "Mes: ";
    $mes = (int) trim(fgets(STDIN));
    echo "Año: ";
    $anio = (int) trim(fgets(STDIN));
    echo "Ingrese el horario de la funcion (numeros)\n";
    echo "Hora: ";
    $horaInicio = (int) trim(fgets(STDIN));
    echo "Minutos: ";
    $minutosInicio = (int) trim(fgets(STDIN));
    echo "Ingrese la duracion de la funcion: " . "\n";
    echo "Hora: ";
    $horaDuracion = (int) trim(fgets(STDIN));
    echo "Minutos: ";
    $minutosDuracion = (int) trim(fgets(STDIN));
    echo "Ingrese precio de la funcion: $";
    $precio = trim(fgets(STDIN));

    $horarioInicio = pasarASegundos($horaInicio, $minutosInicio);
    $duracion = pasarASegundos($horaDuracion, $minutosDuracion);
    $fecha = $anio . "-" . $mes . "-" . $dia;

    // Creo un arreglo asociativo con todas las posibles claves que hay entre todos los tipos de funciones
    $datosFuncion = ["tipo_funcion" => $tipoFuncion,
        "nombre" => $nombre,
        "fecha" => $fecha,
        "horario_inicio" => $horarioInicio,
        "duracion" => $duracion,
        "precio" => $precio,
        "teatro" => $objTeatro,
        "director" => "",
        "cantidad_personas" => 0,
        "genero" => "",
        "pais_origen" => "",
        "autor" => "",
    ];

    if (strtolower($tipoFuncion) == "musical") {
        echo "Ingrese el director del musical: ";
        $director = trim(fgets(STDIN));
        echo "Cantidad de personas en escena: ";
        $cantidadPersonas = trim(fgets(STDIN));

        $datosFuncion["director"] = $director;
        $datosFuncion["cantidad_personas"] = $cantidadPersonas;
    } else if (strtolower($tipoFuncion) == "cine") {
        echo "Ingrese el genero de la pelicula: ";
        $genero = trim(fgets(STDIN));
        echo "Ingrese el pais de origen: ";
        $paisOrigen = trim(fgets(STDIN));

        $datosFuncion["genero"] = $genero;
        $datosFuncion["pais_origen"] = $paisOrigen;
    } else if (strtolower($tipoFuncion) == "obra") {
        echo "Ingrese el autor de la obra teatral: ";
        $autor = trim(fgets(STDIN));

        $datosFuncion["autor"] = $autor;
    }

    $funcionCargada = $abmTeatro->cargarFuncion($datosFuncion);

    return $funcionCargada;
}

/**
 * Opcion 6
 * Modifica el nombre de una funcion
 */
function modificarNombreFuncion()
{
    $objFuncion = seleccionarFuncion();
    $abmFuncion = new abmFuncion();

    echo "Ingrese el nuevo nombre de la funcion: ";
    $nuevoNombre = trim(fgets(STDIN));
    $nombreModificado = $abmFuncion->modificarNombre($objFuncion, $nuevoNombre);

    if ($nombreModificado) {
        echo "\e[1;37;42mEl nombre ha sido modificado correctamente\e[0m\n";
    } else {
        echo "\e[1;37;41mError al intentar modificar el nombre del teatro\e[0m\n";
    }
}

/**
 * Opcion 7
 * Modifica el precio de una funcion
 */
function modificarPrecioFuncion()
{
    $abmFuncion = new abmFuncion();
    $objFuncion = seleccionarFuncion();

    echo "Ingrese el nuevo precio de la funcion: ";
    $nuevoPrecio = trim(fgets(STDIN));
    $precioModificado = $abmFuncion->modificarPrecio($objFuncion, $nuevoPrecio);

    if ($precioModificado) {
        echo "\e[1;37;42mEl precio ha sido modificado correctamente\e[0m\n";
    } else {
        echo "\e[1;37;41mError al intentar modificar el precio de la funcion\e[0m\n";
    }
}

/**
 * Opcion 10
 * Lista la informacion de todas las funciones
 */
function mostrarDatosFunciones()
{
    $abmCine = new abmCine();
    echo $abmCine->listarFunciones();

    $abmMusical = new abmMusical();
    echo $abmMusical->listarFunciones();

    $abmObraTeatral = new abmObraTeatral();
    echo $abmObraTeatral->listarFunciones();
}

/**
 * Opcion 11
 * Elimina una funcion
 */
function borrarFuncion()
{
    $abmFuncion = new abmFuncion();
    echo $abmFuncion->listarFunciones();
    echo "Ingrese el ID de la funcion a eliminar: ";
    $id = (int) trim(fgets(STDIN));

    $abmCine = new abmCine();
    $funcionEliminada = $abmCine->eliminarFuncion($id);

    if (!$funcionEliminada) {
        $abmMusical = new abmMusical();
        $funcionEliminada = $abmMusical->eliminarFuncion($id);

        if (!$funcionEliminada) {
            $abmObraTeatro = new abmObraTeatral();
            $funcionEliminada = $abmObraTeatro->eliminarFuncion($id);
        }
    }

    if ($funcionEliminada) {
        echo "\e[1;37;42mLa funcion ha sido eliminada correctamente\e[0m\n";
    } else {
        echo "\e[1;37;41mError al intentar eliminar la funcion\e[0m\n";
    }
}
