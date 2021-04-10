<?php
include 'CuentaBancaria.php';
include "../1a/Persona.php";

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
    echo "1) Ingresar datos persona. \n";
    echo "2) Ingresar datos cuenta bancaria. \n";
    echo "3) Mostrar datos cuenta bancaria. \n";
    echo "4) Depositar dinero. \n";
    echo "5) Retirar dinero. \n";
    echo "0) Salir del programa. \n";
    echo "--------------------------------------------------------------\n";

    // Ingreso y lectura de la opcion
    echo "Ingrese una opcion: ";
    $opcion = (int) trim(fgets(STDIN));

    return $opcion;
}

/**
 * Realiza la carga de valores de una persona
 * @return obj $persona
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

    $persona = new Persona($nombre, $apellido, $tipoDocumento, $numeroDocumento);

    return $persona;
}

/**
 * Realiza la carga de valores de una cuenta bancaria
 * @param obj $datosPersona
 * @return obj $cuentaBancaria
 */
function cargarDatosCuentaBancaria($datosPersona)
{
    /**
     * Declaracion de variables
     * int $numeroCuenta
     * float $saldo, $interes
     */
    echo "Ingrese el numero de cuenta: ";
    $numeroCuenta = (int) trim(fgets(STDIN));
    echo "Ingrese el saldo actual: ";
    $saldoCuenta = trim(fgets(STDIN));
    echo "Ingrese el interes anual: ";
    $interesAnual = trim(fgets(STDIN));

    $cuentaBancaria = new CuentaBancaria($numeroCuenta, $datosPersona, $saldoCuenta, $interesAnual);

    return $cuentaBancaria;
}

/**
 * PROGRAMA PRINCIPAL
 * obj $cuentaBancaria, $persona
 * float $cantidadDineroOperacion
 * boolean $dineroRetirado
 */

do {
    $opcion = menu();

    switch ($opcion) {
        case 0:
            echo "Fin del programa! \n";
            break;
        case 1:
            $persona = cargarDatosPersona();
            break;
        case 2:
            $cuentaBancaria = cargarDatosCuentaBancaria($persona);
            break;
        case 3:
            echo $cuentaBancaria . "\n";
            break;
        case 4:
            echo "Ingrese la cantidad de dinero que desea depositar: ";
            $cantidadDineroOperacion = trim(fgets(STDIN));

            $cuentaBancaria->depositar($cantidadDineroOperacion);
            echo $cuentaBancaria . "\n";
            break;
        case 5:
            echo "Ingrese la cantidad de dinero que desea retirar: ";
            $cantidadDineroOperacion = trim(fgets(STDIN));

            $dineroRetirado = $cuentaBancaria->retirar($cantidadDineroOperacion);

            if ($dineroRetirado) {
                echo $cuentaBancaria . "\n";
            } else {
                echo "Saldo insuficiente. \n";
            }
            break;
        default:
            echo "Opcion incorrecta. Verifique por favor! \n";
            break;
    }

} while ($opcion != 0);

$cuenta->actualizarSaldo();
echo "\n----------------------\n";

echo $cuenta;
echo "\n Ingrese la cantidad de dinero que deposita: ";
$cant = trim(fgets(STDIN));
$cuenta->depositar($cant);
echo "\n----------------------\n";

echo $cuenta;
echo "\n Ingrese la cantidad de dinero que retira: ";
$retira = trim(fgets(STDIN));
$cuenta->retirar($retira);
echo "Se pudo hacer la operacion su saldo es: " . $cuenta->getSaldoActual();
echo "\n----------------------\n";
echo $cuenta;
