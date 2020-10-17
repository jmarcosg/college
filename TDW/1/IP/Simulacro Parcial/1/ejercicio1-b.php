<?php
/**
 * Esta funcion calcula y retorna un mensaje si una coordenada XY esta dentro de una circunferencia
 * Las coordenadas XY y el radio de la circunferencia son recibidas por parametro
 * Para esto, el radio determina la circunferencia y X2 e Y2 son los puntos a verificar
 * @param int $x1
 * @param int $y1
 * @param int $x2
 * @param int $y2
 * @param int $radio   
 */ 
function calcularPuntos ($x1, $x2, $y1, $y2, $radio) {
    // int $xCentro, $yCentro
    // Calculo los valores del centro de X e Y
    $xCentro = $x1 + $radio;
    $yCentro = $y1 + $radio;

    // Verifico si X2 e Y2 estan dentro de la circunferencia
    if ($x2 <= $xCentro && $y2 <= $yCentro) {
        echo "dentro";
    } else {
        echo "fuera";
    }
}

/**
 * Este programa lee el valor de dos coordenadas XY y un radio
 * Luego muestra por pantalla si las coordenadas ingresadas estan dentro de la circunferencia
 * int $puntoX1, $puntoY1, $puntoX2, $puntoY2, $radio 
 */

 // Ingreso y lectura de valores
 echo "Ingrese el punto X del centro: ";
 $puntoX1 = (int)trim(fgets(STDIN));
 echo "Ingrese el punto Y del centro ";
 $puntoY1 = (int)trim(fgets(STDIN));
 echo "Ingrese el radio de la circunferencia: ";
 $radio = (int)trim(fgets(STDIN));
 echo "Ingrese un punto X cualquiera: ";
$puntoX2 = (int)trim(fgets(STDIN));
echo "Ingrese un punto Y cualquiera: ";
$puntoY2 = (int)trim(fgets(STDIN));

 // Invoco a la funcion para calcular y mostrar si los puntos ingresados estan dentro de la circunferencia
calcularPuntos($puntoX1, $puntoY1, $puntoX2, $puntoY2, $radio);

?>