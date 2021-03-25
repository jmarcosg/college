<?php
include 'Calculadora.php';

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
    echo "1) Suma. \n";
    echo "2) Resta. \n";
    echo "3) Multiplicación. \n";
    echo "4) División. \n";
    echo "0) Salir del programa. \n";
    echo "--------------------------------------------------------------\n";

    // Ingreso y lectura de la opcion
    echo "Ingrese una opcion: ";
    $opcion = (int) trim(fgets(STDIN));

    return $opcion;
}

/**
 * PRGRAMA PRINCIPAL
 * Declaracion de variables
 * float $numero1, $numero2
 * int $operacion
 */

// Ingreso y lectura de valores
echo "Ingrese el primer numero: ";
$numero1 = trim(fgets(STDIN));
echo "Ingrese el segundo numero: ";
$numero2 = trim(fgets(STDIN));

$nums = new Calculadora($numero1, $numero2);

do {
    $opcion = menu();

    switch ($opcion) {
        case 0:
            echo "Fin del programa! \n";
            break;
        case 1:
            echo "El resultado de la suma de " . $numero1 . " y " . $numero2 . " es: " . $nums->sumar($numero1, $numero2) . "\n";
            break;
        case 2:
            echo "El resultado de la resta de " . $numero1 . " y " . $numero2 . " es: " . $nums->restar($numero1, $numero2) . "\n";
            break;
        case 3:
            echo "El resultado de multiplicar " . $numero1 . " por " . $numero2 . " es: " . $nums->multiplicar($numero1, $numero2) . "\n";
            break;
        case 4:
            echo "El resultado de dividir " . $numero1 . " por " . $numero2 . " es: " . $nums->dividir($numero1, $numero2) . "\n";
            break;
    }
} while ($opcion != 0);
