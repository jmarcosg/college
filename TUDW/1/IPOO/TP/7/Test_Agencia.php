<?php

include_once 'Destinos.php';
include_once 'PaquetesTuristicos.php';
include_once 'Ventas.php';
include_once 'VentasOnLine.php';
include_once 'Agencia.php';
include_once 'Cliente.php';

$destino = new Destinos(1, "Bariloche", 250);
$paqueteTuristico1 = new PaquetesTuristicos("23/05/2014", 3, $destino, 25);
$paqueteTuristico2 = new PaquetesTuristicos("24/05/2014", 3, $destino, 25);
$paqueteTuristico3 = new PaquetesTuristicos("25/05/2014", 3, $destino, 25);
$agencia = new Agencia([], [], []);

$paqueteIncorporado1 = $agencia->incorporarPaquete($paqueteTuristico1);
$paqueteIncorporado2 = $agencia->incorporarPaquete($paqueteTuristico2);
$paqueteIncorporado3 = $agencia->incorporarPaquete($paqueteTuristico3);
if ($paqueteIncorporado1) {
    echo "Paquete incorparado \n";
} else {
    echo "Paquete no incorporado \n";
}

if ($paqueteIncorporado2) {
    echo "Paquete incorparado \n";
} else {
    echo "Paquete no incorporado \n";
}

if ($paqueteIncorporado3) {
    echo "Paquete incorparado \n";
} else {
    echo "Paquete no incorporado \n";
}

echo "\n";

$paqueteIncorporado1 = $agencia->incorporarPaquete($paqueteTuristico1);
$paqueteIncorporado2 = $agencia->incorporarPaquete($paqueteTuristico2);
$paqueteIncorporado3 = $agencia->incorporarPaquete($paqueteTuristico3);
if ($paqueteIncorporado1) {
    echo "Paquete incorparado \n";
} else {
    echo "Paquete no incorporado \n";
}

if ($paqueteIncorporado2) {
    echo "Paquete incorparado \n";
} else {
    echo "Paquete no incorporado \n";
}

if ($paqueteIncorporado3) {
    echo "Paquete incorparado \n";
} else {
    echo "Paquete no incorporado \n";
}

$cliente = new Cliente(27898654, "Pepito", "Perez", "DNI");
$venta = $agencia->incorporarVenta($paqueteTuristico1, $cliente, 5, false);
echo $venta . "\n";

echo $agencia;
