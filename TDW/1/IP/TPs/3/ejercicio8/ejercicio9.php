<?php
// Este programa calcula el resto de la division entre dos numeros
// int $numerador, $divisor, $resultadoEnteroDivision
// float $resultadoDivision, $resto

// Ingreso y lectura de valores
echo "Ingrese el numerador: ";
$numerador = trim(fgets(STDIN));
echo "Ingrese el divisor: ";
$divisor = trim(fgets(STDIN));

// Calculo el resto
$resultadoDivision = $numerador / $divisor;
$resultadoEnteroDivision = (int)$numerador / $divisor;
$resto = $resultadoDivision - $resultadoEnteroDivision;
$resto = $resto * $divisor;

// Devolución de valor
echo "El resto de dividir ".$numerador." por ".$divisor." es: ".$resto;
?>