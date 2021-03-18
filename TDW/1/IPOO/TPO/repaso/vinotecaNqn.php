<?php
/**
 * Esta funcion almacena arreglos asociativos de vinos
 * @return array $coleccionVinos
 */
function vinos()
{
    /**
     * Declaracion de variables
     * array $coleccionVinos
     */

    // Inicializacion de variables
    $coleccionVinos = [];

    // Predefino valores dentro de los arreglos
    $coleccionVinos = [
        "Malbec" => [
            0 => ["anio" => 2018, "unidades" => 3, "precioPorUnidad" => 700],
            1 => ["anio" => 2016, "unidades" => 8, "precioPorUnidad" => 500],
            2 => ["anio" => 2019, "unidades" => 6, "precioPorUnidad" => 600],
        ],
        "Cabernet Sauvignon" => [
            0 => ["anio" => 2018, "unidades" => 4, "precioPorUnidad" => 800],
            1 => ["anio" => 2015, "unidades" => 10, "precioPorUnidad" => 550],
            2 => ["anio" => 2020, "unidades" => 7, "precioPorUnidad" => 670],
        ],
        "Merlot" => [
            0 => ["anio" => 2019, "unidades" => 5, "precioPorUnidad" => 750],
            1 => ["anio" => 2016, "unidades" => 9, "precioPorUnidad" => 575],
            2 => ["anio" => 2018, "unidades" => 8, "precioPorUnidad" => 660],
        ],
    ];

    return $coleccionVinos;
}

/**
 * Muestra por pantalla el arreglo seleccionado
 * @param array $vinoteca
 * @param string $variedadUva
 */
function listarVinos($vinoteca, $variedadUva)
{
    echo "Datos vinoteca " . $variedadUva . "\n";
    for ($i = 0; $i < count($vinoteca[$variedadUva]); $i++) {
        echo "Año: " . $vinoteca[$variedadUva][$i]["anio"] . "; Unidades: " . $vinoteca[$variedadUva][$i]["unidades"] . "; Precio por unidad: $" . $vinoteca[$variedadUva][$i]["precioPorUnidad"] . "\n";
    }
}

/**
 * Calcula el precio promedio de una botella de vino de una uva previamente seleciconada
 * Ademas muestra el precio promedio y la cantidad de botellas disponibles
 * @param array $vinoteca
 * @param string $variedadUva
 */
function promedioCantidad($vinoteca, $variedadUva)
{
    /**
     * Declaracion de variables
     * array $datosVinos
     * int $i, $cantBotellas
     * float $precioTotal, $precioPromedio
     */

    // Inicializacion variables
    $cantBotellas = 0;
    $precioPromedio = 0;
    $precioTotal = 0;

    // Recorro de manera exhaustiva el arreglo de cierto tipo de uva sumando a contadores exclusivos la cantidad de botellas y el precio total
    for ($i = 0; $i < count($vinoteca[$variedadUva]); $i++) {
        $cantBotellas += $vinoteca[$variedadUva][$i]["unidades"];
        $precioTotal += $vinoteca[$variedadUva][$i]["precioPorUnidad"];
    }

    // Calculo el precio promedio
    $precioPromedio = $precioTotal / $cantBotellas;

    // Armo un nuevo arreglo que contenga los datos previamente obtenidos
    $datosVinos = [
        "totalBotellas" => $cantBotellas,
        "precioPromedio" => number_format($precioPromedio, 2),
    ];

    // Muestro por pantalla los resultados obtenidos
    echo "Total de botellas de " . $variedadUva . ": " . $datosVinos["totalBotellas"] . "; Precio promedio: $" . $datosVinos["precioPromedio"] . "\n";

}

/**
 * Esta funcion muestra por pantalla el menu de usuario y obtiene una opcion de menú
 * @return int $opcion
 */
function seleccionarOpcion()
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
    echo "1) Listar vinos. \n";
    echo "2) Mostrar precio promedio por variedad de vino. \n";
    echo "0) Salir del programa. \n";
    echo "--------------------------------------------------------------\n";

    // Ingreso y lectura de la opcion
    echo "Ingrese una opcion: ";
    $opcion = (int) trim(fgets(STDIN));

    return $opcion;
}

/**
 * PROGRAMA PRINCIPAL
 * int $opcion
 * array $arregloVinos
 * string $variedadUva
 */

// Inicializacion de variables
$arregloVinos = vinos(); // Le asigno la coleccion de vinos

do {
    $opcion = seleccionarOpcion();

    switch ($opcion) {
        case 0: // Salida del menu
            echo "Fin del programa! \n";
            break;
        case 1: // Listar vinos
            echo "Variedades de uva \n";
            echo "a) Malbec \n";
            echo "b) Cabernet Sauvignon \n";
            echo "c) Merlot \n";
            echo "Ingrese la opcion: ";
            $variedadUva = trim(fgets(STDIN));

            // Reemplazo el string de la seleccion por un string de la variedad de vino correspondiente
            switch ($variedadUva) {
                case "a":
                    $variedadUva = "Malbec";
                    listarVinos($arregloVinos, $variedadUva);
                    break;
                case "b":
                    $variedadUva = "Cabernet Sauvignon";
                    listarVinos($arregloVinos, $variedadUva);
                    break;
                case "c":
                    $variedadUva = "Merlot";
                    listarVinos($arregloVinos, $variedadUva);
                    break;
                default:
                    echo "Verifique su seleccion por favor. \n";
            }
            break;
        case 2: // Promediar precios vinos
            echo "Variedades de uva \n";
            echo "a) Malbec \n";
            echo "b) Cabernet Sauvignon \n";
            echo "c) Merlot \n";
            echo "Ingrese la opcion: ";
            $variedadUva = trim(fgets(STDIN));

            // Reemplazo el string de la seleccion por un string de la variedad de vino correspondiente
            switch ($variedadUva) {
                case "a":
                    $variedadUva = "Malbec";
                    promedioCantidad($arregloVinos, $variedadUva);
                    break;
                case "b":
                    $variedadUva = "Cabernet Sauvignon";
                    promedioCantidad($arregloVinos, $variedadUva);
                    break;
                case "c":
                    $variedadUva = "Merlot";
                    promedioCantidad($arregloVinos, $variedadUva);
                    break;
                default:
                    echo "Verifique su seleccion por favor. \n";
            }
            break;
        default:
            echo "Verifique su seleccion por favor. \n";
    }
} while ($opcion != 0);
