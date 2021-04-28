<?php
/**
 * Programa principal
 * Este programa lee sueldos y luego calcula el promedio de sueldo en la empresa
 * float $sueldo, $sumaSueldos, $promedioSueldos
 * int $cantidadSueldos 
 * string $otroSueldo
 */
// Inicilizo a $sumaSueldos y $promedioSueldos en 0
$sumaSueldos = 0;
$promedioSueldos = 0;

 // Ingreso y lectura de valores
 echo "Ingrese el sueldo de un empleado: ";
 $sueldo = trim(fgets(STDIN));

// Sumo el sueldo a la sumatoria de sueldos y aumento en 1 la cantidad de sueldos
$sumaSueldos = $sumaSueldos + $sueldo;
$cantidadSueldos++;

 echo "Tiene otro sueldo para ingresar? (si/no): ";
 $otroSueldo = trim(fgets(STDIN));

 // Mientas $otroSueldo sea distinto a "no" va a seguir pidiendo mas sueldos
 if ($otroSueldo == "si") {
     do{
        echo "Ingrese el sueldo de otro empleado:  ";
        $sueldo = trim(fgets(STDIN));
        // Sumo el sueldo a la sumatoria de sueldos y aumento en 1 la cantidad de sueldos
        $sumaSueldos = $sumaSueldos + $sueldo;
        $cantidadSueldos++;
        echo "Tiene otro sueldo para ingresar? (si/no): ";
        $otroSueldo = trim(fgets(STDIN));
     } while ($otroSueldo == "si");
     // Calculo el promedio de sueldos y lo muestro por pantalla
    $promedioSueldos = $sumaSueldos / $cantidadSueldos;
    echo "El promedio de sueldos para esta empresa es: $".$promedioSueldos;
 } else {
    $promedioSueldos = $sumaSueldos / $cantidadSueldos;
    echo "El promedio de sueldos para esta empresa es: $".$promedioSueldos;
 }

?>