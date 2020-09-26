<?php
/**
 * Esta funcion calcula la hipotenusa de un triagulo rectangulo a partir de los catetos indicados por parametro
 * @param int cat1
 * @param int cat2
 */
function calcularHipotenusa ($cat1, $cat2) {
    // int $hip, a, b
    $a = $cat1 * $cat1;
    $b = $cat2 * $cat2;
    $hip = sqrt($a + $b);
    return $hip;
}

// Ingreso los valores de los catetos
// float cateto1, cateto2
echo "Ingrese el valor del primero cateto: ";
$cateto1 = trim(fgets(STDIN));
echo "Ingrese el valor del segundo cateto: ";
$cateto2 = trim(fgets(STDIN));

// Devolucion de valores
echo "El valor de la hipotenusa es: ".calcularHipotenusa($cateto1, $cateto2);
?>