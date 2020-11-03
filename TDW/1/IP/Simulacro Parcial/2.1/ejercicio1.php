<?php
/**
 * @param int $num
 * @return boolean $bandera
 */
function esNroElegido1 ($num) {
    // int $umbral, $i
    // boolean $bandera
    $umbral = 0;
    $bandera = true;

    $umbral = ((int)($num / 2)) + 1;

    for ($i = 2; $i <= $umbral; $i++) {
        if ($num % $i == 0) {
            $bandera = false;
        }
    }

    return $bandera;
}

/**
 * @param int $num
 * @return boolean $bandera
 */
function esNroElegido2 ($num) {
    // int $umbral, $i
    // boolean $bandera

    $umbral = ((int)($num / 2)) + 1;
    $bandera = true;
    $i = 2;

    while ($bandera && $i < $umbral) {
        $bandera = !($num % $i == 0);
        $i++;
    }

    return $bandera;
}

/**
 * Programa principal
 * int $numero, $opcion
 * boolean $resultadoBandera
 */

 echo "Ingrese un numero entero: ";
 $numero = (int)trim(fgets(STDIN));

 do {
    echo "Menu \n";
    echo "Opcion 1: Usar modulo 1 \n";
    echo "Opcion 2: Usar modulo 2 \n";
    echo "Opcion 3: Finalizar programa \n";
    echo "Ingrese una opcion: ";
    $opcion = (int)trim(fgets(STDIN));

    if ($opcion == 1) {
        $resultadoBandera = esNroElegido1 ($numero);
        echo "Resultado modulo 1: ",$resultadoBandera,"\n";
    } else if ($opcion == 2) {
        $resultadoBandera = esNroElegido2 ($numero);
        echo "Resultado modulo 2: ",$resultadoBandera,"\n";
    }
 } while ($opcion <> 3);

 echo "Fin del programa. Gracias por usarme :)";
?>