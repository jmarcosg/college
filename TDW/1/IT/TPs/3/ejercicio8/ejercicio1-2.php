<?php
// Realiza el cuadrado de un numero
// int vNumero, vCuadrado
echo "Ingrese un número: ";
$vNumero = trim(fgets(STDIN));
$vCuadrado = $vNumero * $vNumero;
echo "El cuadrado de ".$vNumero." es: ".$vCuadrado;
?>