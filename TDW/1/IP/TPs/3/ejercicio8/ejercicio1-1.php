<?php
// Realiza la suma de tres variables
// int $a, $b, $c, $resultado
echo "Ingrese un número: ";
$a = trim(fgets(STDIN));
echo "Ingrese un número: ";
$b = trim(fgets(STDIN));
echo "Ingrese un número: ";
$c = trim(fgets(STDIN));
$resultado = $a + $b + $c;
echo "El resultado es: ".$resultado;
?>