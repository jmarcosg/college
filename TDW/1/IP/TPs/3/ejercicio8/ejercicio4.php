<?
/**
 * Este algoritmo calcula cuanto se debera abona en cada cuota,
 * dependiendo de: la suma, cantidad de cuotas y porcentaje de interes
 */
// float $sumaDinero, $porcentajeInteres, $abonoCuota
// int $cantidadCuotas

// Ingreso y lectura de valores
echo "Ingrese la suma de dinero: ";
$sumaDinero = trim(fgets(STDIN));
echo "Ingrese la cantidad de cuotas: ";
$cantidadCuotas = trim(fgets(STDIN));
echo "Ingrese el porcentaje de interes: ";
$porcentajeInteres = trim(fgets(STDIN));

// Calculo el abono por cuota
$abonoCuota = ($sumaDinero / $cantidadCuotas) + (($sumaDinero * $porcentajeInteres) / 100);

// Devolucion de valor
echo "Se debera pagar $".$abonoCuota." por cuota";
?>