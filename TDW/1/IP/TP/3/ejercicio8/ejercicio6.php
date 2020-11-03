<?php
// Este programa intercambia el valor de dos variables entre si
// int $numero1, $numero2, $aux

// Ingreso y lectura de valores
echo "Ingrese el primer numero: ";
$numero1 = trim(fgets(STDIN));
echo "Ingrese el segundo numero: ";
$numero2 = trim(fgets(STDIN));

// Muestro el valor de cada variable previo al intercambio
echo "El numero 1 es: ".$numero1."\n";
echo "El numero 2 es: ".$numero2."\n";

// Intercambio el valor de las variables entre sí
$aux = $numero1;
$numero1 = $numero2;
$numero2 = $aux;

// Devolucion de valores
echo "El numero 1 ahora es: ".$numero1."\n";
echo "El numero 2 ahora es: ".$numero2."\n";
?>