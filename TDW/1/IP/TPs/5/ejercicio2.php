<?php
/**
 * Esta funcion calcula si $numero1 es mayor que $numero2
 * @param int $num1
 * @param int $num2
 * @return boolean $esMayor
 */
function mayorMenor ($num1, $num2) {
    if ($num1 > $num2) {
        $esMayor = true;
    } else {
        $esMayor = false;
    }
    return $esMayor;
}

// Este programa lee dos numeros y luego muestra si el primer numero es mayor que el segundo
// int $numero1, $numero2
// boolean $esMayor

// Ingreso y lectura de valores
echo "Ingrese el primer numero: ";
$numero1 = trim(fgets(STDIN));
echo "Ingrese el segundo numero: ";
$numero2 = trim(fgets(STDIN));

// Invoco a la funcion para saber si $numero1 es mayor que $numero2
$esMayor = mayorMenor($numero1, $numero2);

// Devuelvo el resultado
if ($esMayor) {
    echo $numero1." es mayor que ".$numero2."? true";
} else {
    echo $numero1." es mayor que ".$numero2."? false";
}

?>