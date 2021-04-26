<?php
/**
 * Esta funcion realiza la carga de valores dentro de un arreglo asociativo
 * @param array $arreglo
 * @return array $arreglo
 */
function cargarMascotas($arreglo)
{
    // Declaracion de variables
    // String $continuar
    // int $i

    // Inicializacion de variables
    $arreglo = [];
    $i = 0;

    echo "Desea ingresar datos? (si/no): ";
    $continuar = trim(fgets(STDIN));

    while ($continuar != "no") {
        // Ingreso y lectura de valores
        echo "Ingrese el nombre de la mascota: ";
        $arreglo[$i]["nombre"] = trim(fgets(STDIN));
        echo "Ingrese la edad de la mascota: ";
        $arreglo[$i]["edad"] = (int) trim(fgets(STDIN));
        echo "Ingrese el tipo de mascota: ";
        $arreglo[$i]["tipo"] = trim(fgets(STDIN));

        $i++;
        // Si tengo mas datos continua el ingreso, de lo contrario devuelve el arreglo
        echo "Tiene mas datos para ingresar? (si/no): ";
        $continuar = trim(fgets(STDIN));
    }

    return $arreglo;
}

/**
 * Esta funcion muestra por pantalla un arreglo asociativo de una veterinaria que recibe por paramentro
 * @param array $arreglo
 */
function listarArregloAsociativo($arreglo)
{
    // Declaracion de variables
    // int $numeroMascota, $i

    // Inicializacion de variables
    $numeroMascota = 1;

    // Muestro al arreglo por pantalla
    for ($i = 0; $i < count($arreglo); $i++) {
        echo "Mascota " . $numeroMascota . ": " . $arreglo[$i]["nombre"] . " es un " . $arreglo[$i]["tipo"] . " de " . $arreglo[$i]["edad"] . " años. \n";
        $numeroMascota++;
    }
}

/**
 * Esta funcion busca en un arreglo a la primer edad menor a otra que determine el usuario
 * Para esto, se hace uso de un recorrido parcial
 * @param array $arreglo
 * @param int $edadDeterminada
 * @return int $primerEdadMenor
 */
function buscarPrimerMenorA($arreglo, $edadDeterminada)
{
    // Declaracion de variables
    // int $i, $primerMenorEdad, $longitudArreglo

    // Inicializacion de variables
    $longitudArreglo = count($arreglo);
    $i = 0;
    $primerEdadMenor = 9999;

    // Realizo un recorrido parcial del arreglo, en donde a la primer incidencia de que haya una edad menor a la determinada
    while ($i < $longitudArreglo && $primerEdadMenor < $edadDeterminada) {
        if ($arreglo[$i]["edad"] < $edadDeterminada && $primerEdadMenor < $edadDeterminada) {
            $primerEdadMenor = $arreglo[$i]["edad"];
        }

        $i++;
    }

    return $primerEdadMenor;
}

/**
 * Esta funcion muestra por pantalla al usuario un menu con el cual va a poder interactuar desde el programa principal
 */
function menuPrincipal()
{
    echo "Menu de opciones \n";
    echo "1) Cargar datos en el arreglo. \n";
    echo "0) Salir. \n";
}

/**
 * Esta funcion muestra por pantalla un menu que contiene distintas funciones con las cuales el usuario puede interactuar a traves del programa principal
 */
function menuFunciones()
{
    echo "Funciones que puede realizar: \n";
    echo "1) Listar arreglo. \n";
    echo "2) Buscar primer edad menor. \n";
    echo "0) Salir. \n";
}

/**
 * PROGRAMA PRINCIPAL
 * Este programa hace uso de la funcion cargarMascotas para almacenar valores dentro de un arreglo asociativo de una veterinaria
 * Luego, muestra por pantalla todas las mascotas con su nombre, edad y tipo
 * array asociativo $arregloVeterinaria
 * int $edadDeterminada, $edadMenor, $opcion
 */

// Inicializacion de variables
$arregloVeterinaria = [];

do {
    menuPrincipal();
    echo "\n";
    echo "Ingrese una opcion: ";
    $opcion = (int) trim(fgets(STDIN));

    if ($opcion == 1) {
        // Llamo a la funcion que realiza la carga de valores dentro del arreglo asociativo y almaceno los mismos en $arregloVeterinaria
        $arregloVeterinaria = cargarMascotas($arregloVeterinaria);

        do {
            menuFunciones();
            echo "\n";
            echo "Ingrese una opcion a realizar: ";
            $opcion = (int) trim(fgets(STDIN));

            switch ($opcion) {
                case 0:
                    echo "Gracias por haber usado el programa! \n";
                    break;
                case 1:
                    listarArregloAsociativo($arregloVeterinaria);
                    echo "\n";
                    break;
                case 2:
                    echo "Ingrese una edad: ";
                    $edadDeterminada = (int) trim(fgets(STDIN));

                    if ($edadDeterminada > 0) {
                        echo "Buscando la primer edad menor que " . $edadDeterminada . "... \n";
                        $edadMenor = buscarPrimerMenorA($arregloVeterinaria, $edadDeterminada);
                        echo "La primer edad menor que " . $edadDeterminada . " es: " . $edadMenor . "\n";
                    } else {
                        echo "Verifique sus datos. \n";
                    }
                    break;
                default:
                    echo "Opcion incorrecta. Verifique por favor. \n";
                    break;
            }
        } while ($opcion != 0);
    }

} while ($opcion != 0);

echo "Fin del programa!";
