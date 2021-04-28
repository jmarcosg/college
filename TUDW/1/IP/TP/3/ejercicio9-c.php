  
<?php
//PROGRAMA calcularVelocidad
/*Este algoritmo calcula la velocidad de un vehiculo segun
la distancia recorrida y el tiempo que tardo en recorrer esa distancia*/
//float distancia, tiempo, velocidad
echo "Ingrese la distancia recorrida: ";
$distancia = trim(fgets(STDIN));
echo "Ingrese el tiempo transcurrido: ";
$tiempo = trim(fgets(STDIN));

$velocidad = ($distancia / $tiempo);

echo "La velocidad es de: ". $velocidad;
?>