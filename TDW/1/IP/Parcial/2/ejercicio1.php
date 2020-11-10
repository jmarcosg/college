<?php
/**
 * Esta funcion lee los sintomas que posee una persona sospechosa de COVID y devuelve la cantidad de sintomas que posee
 * @return int $cantSintomas
 */
function contarCantidadSintomas()
{
    // String $tieneSintoma

    // Inicializo variables
    $cantSintomas = 0;

    // Ingreso y lectura de sintomas
    echo "Esta persona tiene fiebre? (si/no): ";
    $tieneSintoma = trim(fgets(STDIN));
    if ($tieneSintoma = "si") {
        $cantSintomas++;
    }

    echo "Esta persona tiene dificultad para respirar? (si/no): ";
    $tieneSintoma = trim(fgets(STDIN));
    if ($tieneSintoma = "si") {
        $cantSintomas++;
    }

    echo "Esta persona tiene tos seca? (si/no): ";
    $tieneSintoma = trim(fgets(STDIN));
    if ($tieneSintoma = "si") {
        $cantSintomas++;
    }

    echo "Esta persona tiene pérdida del olfato o del gusto? (si/no): ";
    $tieneSintoma = trim(fgets(STDIN));
    if ($tieneSintoma = "si") {
        $cantSintomas++;
    }

    return $cantSintomas;
}

/**
 * Esta funcion calcular el porcentaje de casos sospechosos de la ciudad de Neuquén
 * @param int $cantSospechososNQN
 * @param int $cantPersonasIngresadas
 * @return float $porcentaje
 */
function calcularPorcentajeSospechososNQN($cantSospechososNQN, $cantPersonasIngresadas)
{
    // Inicializo al porcentaje en 0
    $porcentaje = 0;

    // Calculo el porcentaje
    $porcentaje = $cantSospechososNQN / $cantPersonasIngresadas;

    return $porcentaje;
}

/**
 * Esta funcion calcula el promedio de edad de las personas sospechosas de COVID
 * @param int $cantSospechosos
 * @param int $sumaEdades
 * @return float $promedio
 */
function calcularPromedioEdadSospechosos($cantSospechosos, $sumaEdades)
{
    // Inicializo a promedio
    $promedio = 0;

    //Calculo el promedio
    $promedio = $sumaEdades / $cantSospechosos;

    return $promedio;
}

/**
 * PROGRAMA PRINCIPAL
 * Este programa lee distintos datos de una persona para sumar a una base de datos de COVID en la ciudad de Neuquen. Luego, muestra distintos resultados para los datos ingresados.
 * int $edadPersona, $cantidadSintomas, $cantidadSospechosos, $cantidadSospechososNQN, $cantidadNoSospechosos, $cantidadPersonasIngresadas, $mayorEdadSospechoso, $sumatoriaEdadSospechosos
 * float $promedioEdadSospechosos, $porcentajeSospechososNQN
 * String $nombrePersona, $ciudadResidencia, $hayDatos, $mayorNombreSospechoso, $mayorCiudadSospechoso
 */

// Inicializo variables
$cantidadSospechosos = 0;
$cantidadSospechososNQN = 0;
$cantidadNoSospechosos = 0;
$cantidadPersonasIngresadas = 0;
$mayorEdadSospechoso = 0;
$mayorCiudadSospechoso = "";
$mayorNombreSospechoso = "";
$promedioEdadSospechosos = 0;
$porcentajeSospechososNQN = 0;
$sumatoriaEdadSospechosos = 0;

echo "Bienvenido/a a 0800-COVID de la Provincia de Neuquén.\n";
echo "Tiene datos para ingresar? (si/no): ";
$hayDatos = trim(fgets(STDIN));

// Mientras la respuesta a si hay datos sea distinta de no, se van a ingresar datos
while ($hayDatos != "no") {
    // Ingreso y lectura de datos de la persona
    echo "Ingrese el nombre: ";
    $nombrePersona = trim(fgets(STDIN));
    echo "Ingrese la edad de la persona: ";
    $edadPersona = (int) trim(fgets(STDIN));
    echo "Ingrese la ciudad en que reside: ";
    $ciudadResidencia = trim(fgets(STDIN));

    // Invoco a la funcion para ver cuales sintomas tiene la persona ingresada y almaceno la cantidad que posee
    $cantidadSintomas = contarCantidadSintomas();

    // Para que una persona sea sospechosa de COVID tiene que tener al menos 2 sintomas relacionados al virus
    if ($cantidadSintomas >= 2) {
        // Si la persona sospechosa de COVID es la mayor de edad, reemplazo los valores de $mayorEdadSospechoso, $mayorNombreSospechoso y $mayorCiudadSospechoso
        if ($edadPersona > $mayorEdadSospechoso) {
            $mayorEdadSospechoso = $edadPersona;
            $mayorNombreSospechoso = $nombrePersona;
            $mayorCiudadSospechoso = $ciudadResidencia;
        }

        // Se hace una sumatoria de las edades de casos sospechosos
        $sumatoriaEdadSospechosos += $edadPersona;

        // Además, si la persona es residente la ciudad de Neuquén se aumenta en 1 la cantidad de sospechosos de dicha ciudad
        if ($ciudadResidencia == "Neuquén") {
            $cantidadSospechososNQN++;
        }

        // Aumento en 1 la cantidad de casos sospechosos de COVID
        $cantidadSospechosos++;
    } else {
        $cantidadNoSospechosos++;
    }

    // Aumento en 1 la cantidad de personas ingresadas
    $cantidadPersonasIngresadas++;

    echo "Tiene más datos para ingresar? (si/no): ";
    $hayDatos = trim(fgets(STDIN));
}

// Si no hay más datos que ingresar y la cantidad de personas ingresadas es distinto de 0 va a calcular los promedios y porcentajes correspondientes
if ($hayDatos == "no" && $cantidadPersonasIngresadas == 0) {
    echo "No hay datos para analizar.";
} else if ($hayDatos == "no" && $cantidadPersonasIngresadas != 0) {
    // Calculo el porcentaje y promedio a través de sus funciones correspondientes
    $porcentajeSospechososNQN = calcularPorcentajeSospechososNQN($cantidadSospechososNQN, $cantidadPersonasIngresadas);
    $promedioEdadSospechosos = calcularPromedioEdadSospechosos($cantidadSospechosos, $sumatoriaEdadSospechosos);

    // Devuelvo los valores mostrandolos en pantalla
    // Muestro por pantalla el caso de la persona de mayor edad, su nombre y lugar de residencia
    echo "La persona de mayor edad con caso sospechoso de COVID es: " . $mayorNombreSospechoso . " de " . $mayorEdadSospechoso . " años de la ciudad de " . $mayorCiudadSospechoso . ". \n";

    // Muestro por pantalla el total de personas no sospechosas
    echo "Cantidad de personas no sospechosas de COVID: " . $cantidadNoSospechosos;

    // Si hay el porcentaje de casos sospechosos en la ciudad de Nuequén es mayor a 0, va a mostrar el porcentaje, de lo contrario no hay casos.
    if ($porcentajeSospechososNQN > 0) {
        echo $porcentajeSospechososNQN . "% de casos sospechosos en la ciudad de Neuquén. \n";
    } else if ($porcentajeSospechososNQN == 0) {
        echo "No hay casos sospechosos en la ciudad de Neuquén. \n";
    }

    // Muestro por pantalla el promedio de edad de personas sospechosas de COVID
    echo "El promedio de edad de personas sospechosas de COVID es: " . $promedioEdadSospechosos . " años.";
}
