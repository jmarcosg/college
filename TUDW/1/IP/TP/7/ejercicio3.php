<?php
/**
 * Esta funcion realiza la carga de datos/valores al arreglo asociativo a traves de un ciclo interactivo
 * @param array $arreglo
 * @return array $arreglo
 */
function leerDatosCirco($arreglo)
{
    // Declaracion de variables
    // String $continuar

    // Inicializacion de variables
    $arreglo = [];

    echo "Desea ingresar datos? (si/no): ";
    $continuar = trim(fgets(STDIN));

    while ($continuar != "no") {
        // Ingreso y lectura de valores
        echo "Ingrese el nombre del circo: ";
        $arreglo["nombre"] = trim(fgets(STDIN));
        echo "Ingrese la fecha de inicio del circo (dd/mm/aa): ";
        $arreglo["fInicio"] = trim(fgets(STDIN));
        echo "Ingrese el valor de la entrada: ";
        $arreglo["valorEntrada"] = trim(fgets(STDIN));
        echo "Ingrese la cantidad de payasos que hay en el circo: ";
        $arreglo["cantPayasos"] = (int) trim(fgets(STDIN));

        // Si tengo mas datos continua el ingreso, de lo contrario devuelve el arreglo
        echo "Tiene mas datos para ingresar? (si/no): ";
        $continuar = trim(fgets(STDIN));
    }

    return $arreglo;
}

/**
 * PROGRAMA PRINCIPAL
 * Este programa hace uso de la funcion leerDatosCirco para almacenar valores en un arreglo asoociativo, luego muestra por pantalla el contenido del mismo
 * array asociativo $arregloCirco
 */

// Inicializo variables
$arregloCirco = [];

// Llamo a la funcion para cargar datos al arreglo y los almaceno en $arregloCirco
$arregloCirco = leerDatosCirco($arregloCirco);

// Muestro por pantalla el arreglo asociativo que se formo indicando tanto las claves como sus valores correspondientes
print_r($arregloCirco);
