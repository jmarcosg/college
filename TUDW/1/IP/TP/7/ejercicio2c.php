<?php
/**
 * Esta funcion recibe por parametro el arreglo de valores y retorna la sumatoria de todos los celulares
 * @param array float $arreglo
 * @return float $sumatoria
 */
function sumarValores($arreglo)
{
    // Inicializo variables
    $sumatoria = 0;

    // Recorro el arreglo sumando lo valores de los elementos en posicion i
    for ($i = 0; $i < count($arreglo); $i++) {
        $sumatoria += $arreglo[$i];
    }

    return $sumatoria;
}

/**
 * Esta funcion muestra por pantalla al usuario un menu con el cual va a poder interactuar desde el programa principal
 */
function menu()
{
    echo "Menu de opciones \n";
    echo "1) Nombre y valor de un celular. \n";
    echo "2) Sumar valores de celulares. \n";
    echo "0) Salir. \n";
}

/**
 * PROGRAMA PRINCIPAL
 * Este programa contiene dos arreglos predefinidos, uno de celulares y otro de los precios de los mismos. Luego en un menu de opciones, se muesrtan las tres funciones que se pueden realizar
 * array String $celulares
 * array float $valores
 * int $numeroCelular, $cantidadValores, $opcion
 * float $sumaCelulares
 */

// Predefino los arreglos
$celulares = ["Moto G6", "Samsung J7", "LG K9", "iPhone SE", "Galaxy A9"];
$valores = [22030.90, 10500.00, 27999.00, 38105.00, 17000.80];

// Inicializo variables
$sumaCelulares = 0;

do {
    menu();
    echo "\n";
    echo "Ingrese una opcion a realizar: ";
    $opcion = (int) trim(fgets(STDIN));

    switch ($opcion) {
        case 0:
            echo "\n";
            echo "Gracias por haber utilizado este programa!\n";
            break;
        case 1:
            // Ingreso y lectura de valores
            echo "Ingrese el numero del celular que desee mostrar: ";
            $numeroCelular = (int) trim(fgets(STDIN));

            // Muestro el celular y valor elegido dentro del arreglo
            echo "El celular elegido fue " . $celulares[$numeroCelular] . " y su costo es $" . $valores[$numeroCelular] . "\n";
            break;
        case 2:
            // Llamo a la funcion para realizar la sumatoria de los valores de celulares y almaceno su resultado
            $sumaCelulares = sumarValores($valores);
            echo "La suma de todos los celulares es: $" . $sumaCelulares . "\n";
            break;
        default:
            echo "Opcion incorrecta. Verifique por favor. \n";
    }
} while ($opcion != 0);

echo "Fin del programa!";
