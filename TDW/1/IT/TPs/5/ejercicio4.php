<?php
/**
 * Esta funcion cuanta la cantidad de cifras en un numero
 * @param int $num
 * @return int $resultado
 */
function contarCifras ($num) {
    // 

}

/**
 * Esta funcion determina si un numero recibido por parametro es capicua
 * @param int $num
 */
function numeroCapicua ($num) {
    // int $centenas, $decenas, $unidades
}

// Este programa lee un numero de 3 cifras y luego muestra si es o no capicua
// int $numero, $cantCifras

// Ingreso y lectura de valores
echo "Ingrese un numero: ";
$numero = trim(fgets(STDIN));

// Invoco a la funcion para contar la cantidad de cifras del numero ingresado
$cantCifras = contarCifras($numero);

// Condicion dependiendo de si un numero es de tres cifras o no
if ($cantCifras == 3) {
    numeroCapicua($numero);
} else {
    echo "ERROR! El numero ingresado no es de tres cifras";
}
?>