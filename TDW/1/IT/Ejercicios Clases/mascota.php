<?php
/**
 * Esta funcion calcula la dosis de tranquilizante para un perro
 * @param float $peso
 * @return int $totalDosis
 */
function calcularDosisPerro($peso) {
    if ($peso < 10) {
        $totalDosis = 1 * $peso;
    } else {
        $totalDosis = 1 * ($peso / 2);
    }
    return $totalDosis;
}

/**
 * Esta funcion calcula la dosis de tranquilizante para un gato
 * @param int $edad
 * @return int $totalDosis
 */
function calcularDosisGato($edad) {
    if ($edad < 2) {
        $totalDosis = 2;
    } else {
        $totalDosis = 5;
    }
    return $totalDosis;
}

// Este programa lee que mascota tiene el usuario y su peso, luego se calcula la dosis de tranquilizante
// string $tipoMascota
// float $pesoMascota
// int $edadMascota, $dosis

// Ingreso y leo el tipo de mascota
echo "Que mascota tiene el cliente?: ";
$tipoMascota = trim(fgets(STDIN));

// Condiciones para los distintos tipos de mascotas
if ($tipoMascota == "perro") {
    // Leo el peso de la mascota
    echo "Ingrese el peso de la mascota: ";
    $pesoMascota = trim(fgets(STDIN));
    //Invoco a la funcion para calcular la dosis
    $dosis = (int)calcularDosisPerro($pesoMascota);
    // Imprimo por pantalla la dosis necesaria
    echo "La dosis para esta mascota es: ".$dosis." gotas.";
} elseif ($tipoMascota == "gato") {
    // Leo la edad de la mascota
    echo "Ingrese la edad de la mascota: ";
    $edadMascota = trim(fgets(STDIN));
    //Invoco a la funcion para calcular la dosis
    $dosis = calcularDosisGato($edadMascota);
    // Imprimo por pantalla la dosis necesaria
    echo "La dosis para esta mascota es: ".$dosis." gotas.";
} else {
    echo "Este tranquilizante es sólo para perros y gatos";
}

?>