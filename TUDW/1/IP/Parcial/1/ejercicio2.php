<?php
/**
 * Esta función calcula el costo del servicio
 * El mismo se calcula tal que si la distancia a recorrer es menor 1.5 km, costo = 65.50
 * Si la distancia a recorrer es entre 1.5(inclusive) y 4.5, costo = 98.60
 * Si la distancia a recorrer es entre 4.5(inclusive) y 10, costo = 156.00
 * Si la distancia a recorrer es mayor a 10km, costo = 170.50 + (6.50 por cada km excedente)
 * @param float $distancia
 * @return float $total 
 */
function calcularCostoServicio ($distancia) {
    // int $kmExcedidos
    $total = -1; 
    // Inicializo a $total en -1 por si el usuario ingresa un valor negativo de distancia  

    // Condiciones de costos dependiendo de la distancia a recorrer
    if ($distancia > 0 && $distancia < 1.5) {
        $total  = 65.50;
    } elseif ($distancia >= 1.5 && $distancia < 4.5) {
        $total =  98.60;
    } elseif ($distancia >= 4.5 && $distancia <= 10) {
        $total = 156.00;
    } elseif ($distancia > 10) {
        // Calculo los km a excederse
        $kmExcedidos = $distancia - 10;
        // Calculo el total
        $total = 170.50 + ($kmExcedidos * 6.50);
    } else {
        $total;
    }
    return $total;
}

/**
 * Esta funcion calcula el valor de descuento al total en funcion del dia de la semana, si tiene cupon de descuento y forma de pago
 * Si paga con credito y es VI/SA, descuento del 25%. Caso contrario, descuento del 3%
 * Cualquier otro medio de pago, descuento del 5%
 * Si tiene cupon se suma un 10% de descuento
 * @param float $monto
 * @param string $dia
 * @param string $poseeCupon
 * @param string $metodoPago
 * @return float $desc
 */
function calcularDescuento ($monto, $dia, $poseeCupon, $metodoPago) {
    // Condiciones para los distintos tipos de casos para aplicar descuento
    if ($metodoPago = "CREDITO") {
        if ($dia == "VI" || $dia == "SA") {
            if ($poseeCupon == "SI") {
                $desc = $monto * 0.35;
            } else {
                $desc = $monto * 0.25;
            }
        } else {
            if ($poseeCupon == "SI") {
                $desc = $monto * 0.13;
            } else {
                $desc = $monto * 0.03;
            }
        }
    } else {
        if ($poseeCupon == "SI") {
            $desc = $monto * 0.15;
        } else {
            $desc = $monto * 0.05;
        }
    }
    return $desc;
}

/**
 * Este programa lee la distancia a recorrer, dia, forma de pago y posecion de un cupon de descuento
 * Luego muestra por pantalla su costo, descuento y valor final
 */
// float $distanciaARecorrer, $costoParcial, $costoFinal, $descuento
// string $diaSemana, $tieneCupon, $formaPago
echo "Ingrese la distancia a recorrer: ";
$distanciaARecorrer = trim(fgets(STDIN));
echo "Ingrese el dia de la semana (LU,MA,MI,JU,VI,SA,DO): ";
$diaSemana = trim(fgets(STDIN));
echo "Ingrese la forma de pago (EFECTIVO, CREDITO, DEBITO): ";
$formaPago = trim(fgets(STDIN));
echo 'Posee un cupon de descuento?(SI,NO): ';
$tieneCupon = trim(fgets(STDIN));

// Invoco a la funcion para calcular el costo del recorrido
$costoParcial = calcularCostoServicio($distanciaARecorrer);

// Invoco a la funcion para calcular el descuento
$descuento = calcularDescuento($costoParcial, $diaSemana, $tieneCupon, $formaPago);

// Calculo el valor final
$costoFinal = $costoParcial - $descuento;

echo "Para una distancia ".$distanciaARecorrer." el costo es $".$costoParcial.", con un descuento de $".$descuento.", el valor final es $".$costoFinal;
?>