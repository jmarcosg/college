<?php
// Ejercicio 8 (ejercio 3 de de TP2_B)
// Este algoritmo calcula diferentes fórmulas de circunferencias
// float radio, diametro, perimetro, superficie, volumen, superficieEsfera, pi
$pi = 3.1415;

// Escritura y lectura de variables
echo "Ingrese el radio de la circunferencia: ";
$radio = trim(fgets(STDIN));

// Calculos
$diametro = 2 * $radio;
$perimetro = $diametro * $pi;
$superficie = $pi * ($radio * $radio);
$volumen = (4/3) * $pi * ($radio * $radio * $radio);
$superficieEsfera = 4 * $pi * ($radio * $radio);

// Devolucion de resultados
echo "El diametro de la circunferencia es: ".$diametro;
echo "El perimetro de la circunferencia es: ".$perimetro;
echo "La superficie de la circunferencia es: ".$superficie;
echo "El volumen de la esfera es: ".$volumen;
echo "La superficie de la esfera es: ".$superficieEsfera;
?>