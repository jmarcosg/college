<?php
/**
* Convierte una cantidad N de horas, minutos y segundos a un total M de segundos solamente
* @param number $horas
* @param number $minutos
* @param number $segundos
* @return number $resultado
*/
function convertirTiempo (int $horas, int $minutos, int $segundos) {
    $horas = $horas * 3600;
    $minutos = $minutos * 60;
    $resultado = $horas + $minutos + segundos;
    return $resultado;
}

/**
* Calcula la velocidad basado en la distancia y el tiempo recibido por parametro
* @param number $distancia
* @param number $tiempo
* @return number $resultado
*/
function calcularVelocidad (float $distancia, int $tiempo) {
    // La velocidad de calcula tal que es igual a la distancia sobre tiempo
    $resultado = $distancia / $tiempo;
    return $resultado;
}

// Este programa horas, minutos, segundos y distancia para luego calcular la velocidad a traves de funciones
// int $horas1, $horas2, $minutos1, $minutos2, $segundos1, $segundos2, $tiempoTotalSegundos1, $tiempoTotalSegundos2
// float $distancia, $velocidad1, $velocidad2

// Ingreso y lectura de valores para el primer ciclista
echo "Ingrese la distancia de la carrera en metros: ";
$distancia = trim(fgets(STDIN));
echo "Ingrese las horas que tardo el primer ciclista: ";
$horas1 = trim(fgets(STDIN));
echo "Ahora ingrese los minutos: ";
$minutos1 = trim(fgets(STDIN));
echo "Por ultimo, ingrese los segundos: ";
$segundos1 = trim(fgets(STDIN));

// Ingreso y lectura de valores para el segundo ciclista
echo "Ingrese las horas que tardo el segundo ciclista: ";
$horas2 = trim(fgets(STDIN));
echo "Ahora ingrese los minutos: ";
$minutos2 = trim(fgets(STDIN));
echo "Por ultimo, ingrese los segundos: ";
$segundos2 = trim(fgets(STDIN));

// Invoco a la funcion para convertir el tiempo de ambos ciclistas solamente en segundos
$tiempoTotalSegundos1 = convertirTiempo($horas1, $minutos1, $segundos1);
$tiempoTotalSegundos2 = convertirTiempo($horas2, $minutos2, $segundos2);

// Ahora, invoco a la funcion para calcular la velocidad de ambos ciclistas
$velocidad1 = calcularVelocidad($distancia, $tiempoTotalSegundos1);
$velocidad2 = calcularVelocidad($distancia, $tiempoTotalSegundos2);

// Devuelvo e imprimo en pantalla los valores
echo "La velocidad del ciclista 1 fue: ".$velocidad1."m/seg \n";
echo "La velocidad del ciclista 2 fue: ".$velocidad2."m/seg \n";
?>