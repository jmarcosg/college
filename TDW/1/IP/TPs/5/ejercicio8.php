<?php
/**
 * Esta funcion verfica quienes de las personas recibidas por parametro son contemporaneas
 * Para que sean contemporaneas tienen que tener la misma edad
 * @param string $nomb1
 * @param int $ed1
 * @param string $nomb2
 * @param int $ed2
 * @param string $nomb3
 * @param int $ed3
 */
function verificarContemporaneos($nomb1, $ed1, $nomb2, $ed2, $nomb3, $ed3) {
    // Condiciones para verificar quienes son contemporaneos
    // Condicion para cuando las tres personas tengan la misma edad
    if ($ed1 == $ed2 && $ed2 == $ed3) {
        echo $nomb1.", ".$nomb2." y ".$nomb3." son contemporaneos";
    } elseif ($ed1 == $ed2 && $ed2 <> $ed3) {
        echo $nomb1." y ".$nomb2." son contemporaneos";
    } elseif ($ed1 == $ed3 && $ed3 <> $ed2) {
        echo $nomb1." y ".$nomb3." son contemporaneos";
    } elseif ($ed2 == $ed3 && $ed3 <> $ed1) {
        echo $nomb2." y ".$nomb3." son contemporaneos";
    } else {
        echo "Ninguna persona es contemporanea";
    }
}

// Este programa lee las edades de tres personas y muestra quienes son contemporaneos
// int $edad1, $edad2, $edad3
// string $nombre1, $nombre2, $nombre3

// Ingreso y lectura de valores
echo "Ingrese el nombre de la primer persona: ";
$nombre1 = trim(fgets(STDIN));
echo "Ingrese la edad de ".$nombre1.": ";
$edad1 = (int)(fgets(STDIN));
echo "Ingrese el nombre de la segunda persona: ";
$nombre2 = trim(fgets(STDIN));
echo "Ingrese la edad de ".$nombre2.": ";
$edad2 = (int)(fgets(STDIN));
echo "Ingrese el nombre de la tercer persona: ";
$nombre3 = trim(fgets(STDIN));
echo "Ingrese la edad de ".$nombre3.": ";
$edad3 = (int)(fgets(STDIN));

// Invoco a la funcion para verificar quienes son contemporaneos
verificarContemporaneos($nombre1, $edad1, $nombre2, $edad2, $nombre3, $edad3);
?>