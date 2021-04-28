<?php
/**
 * Esta funcion calcula si es numero recibido por parametro es multiplo de 2
 * @param int $numero
 * @return boolean $esMultiplo
 */
function esMultiploDe2 (int $numero) {
    // boolean $esMultiplo
    $esMultiplo = $numero % 2 == 0;
    return $esMultiplo;
}

// Este programa lee un numero y luego se imprime por pantalla si es multiplo de 2
// int $numero
// string $mensaje
// boolean $esMultiplo
echo "Ingrese un numero: ";
$numero = trim(fgets(STDIN));

// Invoco a la funcion para calcular si es multiplo de 2 y le asigno el valor a $esMultiplo
$esMultiplo = esMultiploDe2($numero);

// Devuelvo un mensaje dependiendo de si es true o false
$mensaje = $esMultiplo ? $numero." es multiplo de 2" : $numero." no es multiplo de 2";
echo $mensaje;
?>