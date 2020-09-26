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
echo "Cuantos metros tenés hasta la esquina?: ";
$cateto1 = trim(fgets(STDIN));
echo "Cuántos te faltan para llegar a lo de tu amigo/a?: ";
$cateto2 = trim(fgets(STDIN));

// Devolucion de valores
echo "Si se pudiera ir en línea recta, tendrias que recorrer: ".calcularHipotenusa($cateto1, $cateto2)." metros";
?>