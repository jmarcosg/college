<?php
/**
 * Esta funcion calcula si un numero es multiplo del otro
 * @param int $num1
 * @param int $num2
 * @return boolean $resultado
 */
function multiploDe ($num1, $num2) {
    // int $resto
    $resto = ($num1 % $num2);

    // Si el resto es 0 significa que es multiplo, de lo contrario no lo es
    if ($resto == 0) {
        $resultado = true;
    } else {
        $resultado = false;
    }

    return $resultado;
}

// Este programa lee dos numeros y luego determina si el primer numero es multiplo del segundo
// int $numero1, $numero2
// boolean $esMultiplo

// Ingreso y lectura de valores
echo "Ingrese el primer numero: ";
$numero1 = (int)trim(fgets(STDIN));
echo "Ingrese el segundo numero: ";
$numero2 = (int)trim(fgets(STDIN));

// Invoco a la funcion para saber si un numero es multiplo del otro
$esMultiplo = multiploDe($numero1, $numero2);

// Devuelvo un resultado dependiendo del resultado de la funcion
if ($esMultiplo == true) {
    echo $numero1." es multiplo de ".$numero2."?: true";
} else {
    echo $numero1." es multiplo de ".$numero2."?: false";
}
?>