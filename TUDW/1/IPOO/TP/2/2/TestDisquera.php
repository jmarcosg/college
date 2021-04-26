<?php
include 'Persona.php';
include 'Disquera.php';

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
    echo "1) Ingresar datos dueño. \n";
    echo "2) Ingresar datos disquera. \n";
    echo "3) Ver si la disquera esta abierta. \n";
    echo "4) Abrir disquera. \n";
    echo "5) Cerrar disquera. \n";
    echo "0) Salir del programa. \n";
    echo "--------------------------------------------------------------\n";

    // Ingreso y lectura de la opcion
    echo "Ingrese una opcion: ";
    $opcion = (int) trim(fgets(STDIN));

    return $opcion;
}

/**
 * Realiza la carga de valores del dueño de la disquera
 * @return obj $duenio
 */
function cargarDatosPersona()
{
    /**
     * Declaracion de variables
     * string $nombre, $apellido, $tipoDocumento
     * int $numeroDocumento
     */

    echo "Ingrese el apellido de la persona: ";
    $apellido = trim(fgets(STDIN));
    echo "Ingrese el nombre de la persona: ";
    $nombre = trim(fgets(STDIN));
    echo "Ingrese el tipo de documento: ";
    $tipoDocumento = trim(fgets(STDIN));
    echo "Ingrese (sin comas, ni puntos) el numero de documento: ";
    $numeroDocumento = (int) trim(fgets(STDIN));

    $duenio = new Persona($nombre, $apellido, $tipoDocumento, $numeroDocumento);

    return $duenio;
}

/**
 * Realiza la carga de valores de una disquera
 * @param obj $datosDuenio
 * @return obj $disquera
 */
function cargarDatosDisquera($datosDuenio)
{
    /**
     * Declaracion de variables
     * string $nombreTienda, $direccion, $estado
     * array $horaApertura, $horaCierre
     * boolean $horariosCorrectos
     */

    // Inicializacion de variables
    $estado = "Cerrado";

    echo "Ingrese el nombre de la tienda: ";
    $nombreTienda = trim(fgets(STDIN));
    echo "Ingrese la direccion: ";
    $direccion = trim(fgets(STDIN));
    echo "Horario de apertura (hh:mm) \n";
    $horaApertura = cargarHorario();
    echo "Hora de cierre (hh:mm) \n";
    $horaCierre = cargarHorario();

    // Verifico si los horarios ingresados son correctos

    if ($horariosCorrectos) {
        $disquera = new Disquera($nombreTienda, $direccion, $horaApertura, $horaCierre, $estado);
        return $disquera;
    } else {
        echo "Error! Verifique horarios ingresados! \n";
    }
}

/**
 * Realiza la carga de horarios de una disquera
 * @return array $horario
 */
function cargarHorario()
{
    /**
     * Declaracion de variables
     * array $horario
     * int $horas, $minutos
     * boolean $horarioCorrecto
     */

    echo "Ingrese las horas: ";
    $horas = (int) trim(fgets(STDIN));
    echo "Ingrese los minutos: ";
    $minutos = (int) trim(fgets(STDIN));

    $horarioCorrecto = verificarHorario($horas, $minutos);

    if ($horarioCorrecto) {
        $horario[] = [$horas, $minutos];
        return $horario;
    } else {
        echo "Verifique que el horario ingresado sea correcto (formato 24hs)";
    }
}

/**
 * Verifica que las horas y los minutos ingresados sean correctos
 * @param int $horas
 * @param int $minutos
 */
function verificarHorario($horas, $minutos)
{
    /**
     * Declaracion de variables
     * boolean $horarioCorrecto
     */

    // Inicioalizacion de variables
    $horarioCorrecto = false;

    if ($horas >= 0 && $horas <= 23) {
        if ($minutos >= 0 && $minutos <= 59) {
            $horarioCorrecto = true;
        }
    }

    return $horarioCorrecto;
}

/**
 * PROGRAMA PRINCIPAL
 * Declaracion de variables
 * int $opcion. $horas, $minutos
 */

do {
    $opcion = menu();

    switch ($opcion) {
        case 0:
            "Fin del programa! \n";
            break;
        case 1:
            cargarDatosPersona();
            break;
        case 2:
            cargarDatosDisquera();
            break;
        case 3: // Ver si la disquera esta abierta
            echo "Ingrese la hora: ";
            $hora = (int) trim(fgets(STDIN));
            echo "Ingrese los minutos: ";
            $minutos = (int) trim(fgets(STDIN));
            break;
        case 4: // Abrir disquera.
            break;
        case 5: // Cerrar disquera.
            break;
        default:
            echo "Opcion incorrecta. Verifique por favor. \n";
            break;
    }
} while ($opcion != 0);
