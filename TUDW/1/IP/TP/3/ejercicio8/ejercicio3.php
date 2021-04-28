<?php
// Este algoritmo calcula diferentes fórmulas de circunferencias
// float $radio, $diametro, $perimetro, $superficie, $volumen, $superficieEsfera

// Escritura y lectura de variables
echo "Ingrese el radio de la circunferencia: ";
$radio = trim(fgets(STDIN));

// Calculos
$diametro = 2 * $radio;
$perimetro = $diametro * M_PI;
$superficie = M_PI * ($radio * $radio);
$volumen = (4/3) * M_PI * ($radio * $radio * $radio);
$superficieEsfera = 4 * M_PI * ($radio * $radio);

// Devolucion de resultados
echo "El diametro de la circunferencia es: ".$diametro."\n";
echo "El perimetro de la circunferencia es: ".$perimetro."\n";
echo "La superficie de la circunferencia es: ".$superficie."\n";
echo "El volumen de la esfera es: ".$volumen."\n";
echo "La superficie de la esfera es: ".$superficieEsfera."\n";
?>