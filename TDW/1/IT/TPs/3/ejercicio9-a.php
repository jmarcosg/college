<?php
//PROGRAMA calculoPitagoras
//Este programa realiza el calculo de Pitagoras
//float cateto1, cateto2, hipotenusa, aux
echo "Ingrese la longitud de uno de los lados: ";
$cateto1 = trim(fgets(STDIN));
echo "Ingrese la longitud del otro lado: ";
$cateto2 = trim(fgets(STDIN));

$aux = (($cateto1 * $cateto1) + ($cateto2 * $cateto2));
$hipotenusa = sqrt($aux);

echo "La hipotenusa del triangulo mide: ".$hipotenusa;
?>