<?php
// Este programa realiza el cuadrado de un numero
// float $numero, $resultado

// Ingreso y lectura del numero
echo "Ingrese un numero: ";
$numero = trim(fgets(STDIN));

// Realizo el cuadrado del numero
$resultado = $numero * $numero;

// Devuelvo el resultado
echo "El cuadrado de ".$numero." es: ".$resultado;
?>