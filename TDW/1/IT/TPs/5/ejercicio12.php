<?php
/**
 * Esta funcion recibe por parametro un numero de un dado y retorna el numero de la cara opuesta
 * Las caras opuestas son: 1-6, 2-5, 3-4
 * @param int $num
 * @return int $numOpuesto
 */
function averiguarNumeroOpuesto($num) {
    if ($num == 1) {
        $numOpuesto = 6;
    } elseif ($num == 2) {
        $numOpuesto = 5;
    } elseif ($num == 3) {
        $numOpuesto = 4;
    } elseif ($num == 4) {
        $numOpuesto = 3;
    } elseif ($num == 5) {
        $numOpuesto = 2;
    } else {
        $numOpuesto = 1;
    }
    return $numOpuesto;
}

// Este programa lee el numero de una cara de un dado y muestra por pantalla el numero de la cara opuesta
// int $numero, numeroCaraOpuesta

// Ingreso y lecura del numero
echo "Ingrece un numero del dado: ";
$numero = (int)trim(fgets(STDIN));

// Verifico que el numero ingresado esté dentro de los números aceptados para el dado
if ($numero >= 1 && $numero <= 6) {
    // Invoco a la funcion para averiguar el numero que esta en la cara opuesta del dado
    $numeroCaraOpuesta = averiguarNumeroOpuesto($numero);
    // Muestro o no por pantalla el numero de la cara opuesta
    echo "En la cara opuesta esta el ".$numeroCaraOpuesta;
} else {
    echo "ERROR: Numero incorrecto. Este es un dado de 6 caras.";
}


?>