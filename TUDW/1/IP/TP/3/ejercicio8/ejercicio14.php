<?php
// Este programa calcula el IMC de una persona
// float $pesoPersona, $alturaPersona, $imc

// Ingreso y lectura de valores
echo "Ingrese el peso de la persona en kg: ";
$pesoPersona = trim(fgets(STDIN));
echo "Ingrese la altura de la persona en m: ";
$alturaPersona = trim(fgets(STDIN));

// Calculo el IMC
$imc = $pesoPersona / ($alturaPersona * $alturaPersona);

// Devuelvo el IMC
echo "El IMC de esta persona es: ".$imc;
?>